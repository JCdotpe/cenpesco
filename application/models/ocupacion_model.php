<?php 

/**
* 
*/
class Ocupacion_model extends CI_MODEL
{
	
	function select_ocupa()
	{
		$this->db->select('codigo, detalle');
		$this->db->order_by('detalle','asc');
		$q=$this->db->get('ocupacion');
		return $q;
	}
}

