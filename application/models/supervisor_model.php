<?php 
/**
* 
*/
class Supervisor_model extends CI_MODEL
{
	
	function get_sup()
	{
		$this->db->select('text as nombre, info as dni');
		$this->db->where('class',11);
		$this->db->where('active',1);
		$this->db->order_by('text','asc');
		$q = $this->db->get('class');
		return $q;
	}
}

