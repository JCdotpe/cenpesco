<?php 

/**
* 
*/
class Universidades_model extends CI_MODEL
{
	
	function select_uni()
	{
		$this->db->select('id, detalle');
		$this->db->order_by('detalle','asc');
		$un=$this->db->get('universidades');
		return $un;
	}
}

