<?php 
/**
* 
*/
class Inform_model extends CI_MODEL
{
	
	function get_a()
	{
		$this->db->select('class as val, text as nombre');
		$this->db->where_in('class',array('12','13','14'));
		$this->db->where('object',0);
		$this->db->where('feature',0);
		$this->db->order_by('text','asc');
		$q = $this->db->get('class');
		return $q;
	}
}

