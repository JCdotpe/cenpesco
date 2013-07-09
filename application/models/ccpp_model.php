<?php
class Ccpp_model extends CI_Model{

    function get_dptos(){
    	$this->db->select('COD_DD, DEPARTAMENTO');
    	$this->db->order_by('DEPARTAMENTO','asc');
    	$q = $this->db->get('ccpp');
		return $q;
    }    

    function get_provs($dpto){
    	$this->db->distinct('COD_PP');
		$this->db->select ('COD_DD, COD_PP,PROVINCIA');
		$this->db->where('COD_DD',$dpto);
		$this->db->order_by('PROVINCIA','asc');
		$q = $this->db->get('ccpp');
		return $q;
    }

	function get_dis($dep,$prov)
	{
		$this->db->distinct('COD_DI');
		$this->db->select ('COD_DI,DISTRITO');
		$this->db->where('COD_PP',$prov);
		$this->db->where('COD_DD',$dep);
		$this->db->order_by('DISTRITO','asc');
		$q = $this->db->get('ccpp');
		return $q;
	}

	function get_ccpp($dep,$prov,$dist)
	{
		$this->db->select ('COD_CCPP,CENTRO_POBLADO');
		$this->db->where('COD_DI',$dist);
		$this->db->where('COD_PP',$prov);
		$this->db->where('COD_DD',$dep);
		$this->db->order_by('CENTRO_POBLADO','asc');
		$q = $this->db->get('ccpp');
		return $q;
	}
		
 }
