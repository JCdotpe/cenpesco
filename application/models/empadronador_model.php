<?php 


class Empadronador_model extends CI_MODEL
{
	
	function get_emp_by_odei($s)
	{
		$this->db->where_in('ODEI_COD',$s);
		$q = $this->db->get('empadronador_jefe');
		return $q;
	}
}