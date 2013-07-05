<?php 
/**
* 
*/
class Proyectos_inei_model extends CI_MODEL
{
	
	function select_proj()
	{
		$this->db->select('SECU_FUNC_SFU, DESC_META_SFU');
		$this->db->order_by('DESC_META_SFU','asc');
		$q=$this->db->get('proyectos_inei');
		return $q;
	}
}
?>