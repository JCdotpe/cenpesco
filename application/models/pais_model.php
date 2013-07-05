<?php 
/**
* 
*/
class Pais_model extends CI_MODEL
{
	
	function select_pais ()
	{
		$this->db->where_not_in('codigo', array(3000, 4000,5000,6000,7000,3099,4099,5099,6099,7099));
		$q=$this->db->get('pais');
		return $q;
	}
}




