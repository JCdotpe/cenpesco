<?php 
/**
* 
*/
class Cargos_model extends CI_MODEL
{
	
	function select_cargo()
	{
		$this->db->order_by('CARGO','asc');
		$q=$this->db->get('cargo_funcional');
		return $q;
	}
}

