<?php 

class Tiempos_acuicultor_model extends CI_MODEL
{
	
	function insert_registro_pescadores ($data)
	{
		$this->db->insert('tiempos_acuicultor',$data);
		return $this->db->affected_rows();
	}

	//si  CCPP fue registrado
	function get_centro_poblado($dep, $prov,$dist,$ccpp)
	{	
		$condicion = 'CCDD ="'. $dep .'" AND CCPP="'. $prov .'" AND CCDI="'. $dist .'" AND COD_CCPP="'. $ccpp.'"';
    	$this->db->where($condicion);
    	$q = $this->db->get('tiempos_acuicultor');
		return $q->num_rows();
	}	

	function get_pescadores()
	{	
    	$q = $this->db->get('tiempos_acuicultor');
		return $q->result();
	}		

}


