<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Datatables
{
	/*
	 * $sTable: Source table in database.
	 * $aColumns: Columns in source table.
	 * $idColumn: The ID column within columns.
	 */
	public function getData($sTable, $aColumns, $idColumn, $condition)
	{
		// Loads CodeIgniter's Database Configuration
		$CI =& get_instance();
		$CI->load->database();
		
		// Paging
		if(isset($_GET['iDisplayStart']) && $_GET['iDisplayLength'] != '-1')
		{
			$CI->db->limit($CI->db->escape_str($_GET['iDisplayLength']), $CI->db->escape_str($_GET['iDisplayStart']));
		}
		
		// Ordering
		if(isset($_GET['iSortCol_0']))
		{
			for($i=0; $i<intval($_GET['iSortingCols']); $i++)
			{
				if($_GET['bSortable_'.intval($_GET['iSortCol_'.$i])] == 'true')
				{
					$CI->db->order_by($aColumns[intval($CI->db->escape_str($_GET['iSortCol_'.$i]))], $CI->db->escape_str($_GET['sSortDir_'.$i]));
				}
			}
		}
		
		// Individual column filtering
		if(isset($_GET['sSearch']) && !empty($_GET['sSearch']))
		{
			for($i=0; $i<count($aColumns); $i++)
			{
				if(isset($_GET['bSearchable_'.$i]) && $_GET['bSearchable_'.$i] == 'true')
				{
					$CI->db->or_like($aColumns[$i], $CI->db->escape_like_str($_GET['sSearch']));
				}
			}
		}
		
		// Select data
		$CI->db->select('SQL_CALC_FOUND_ROWS '.str_replace(' , ', ' ', implode(', ', $aColumns)), false);

		/***************************************************************************************************************/
		/*Condiciones*/
		switch($condition){
			case 'seguimiento_adm':
				$rResult = $CI->db->where('estado',1);
				break;
		}
		
		/***************************************************************************************************************/

		$rResult = $CI->db->get($sTable);
		
		// Data set length after filtering
		$CI->db->select('FOUND_ROWS() AS found_rows');
		$iFilteredTotal = $CI->db->get()->row()->found_rows;
		
		// Total data set length
		/***************************************************************************************************************/
		/*Condiciones*/
		switch($condition){
			case 'seguimiento_adm':
				$iTotal = $CI->db->where('estado',1);
				break;
		}
		
		/***************************************************************************************************************/
		//$iTotal = $CI->db->count_all($sTable);
		$iTotal = $CI->db->count_all_results($sTable);
		// Output
		$output = array(
			'sEcho' => intval($_GET['sEcho']),
			'iTotalRecords' => $iTotal,
			'iTotalDisplayRecords' => $iFilteredTotal,
			'aaData' => array()
		);
		
		foreach($rResult->result_array() as $aRow)
		{
			$row = array();
			
			foreach($aColumns as $col)
			{
				$row[] = $aRow[$col];
				if ($col == $idColumn) { $row['DT_RowId'] = $aRow[$col]; } // Sets DT_RowId
			}
			
			$output['aaData'][] = $row;
		}
		
		return json_encode($output);
	}
}
?>