<?php
class Ubigeo_model extends CI_Model{

    function get_dptos(){
    	$this->db->select('COD_DEPARTAMENTO, DES_DISTRITO, CENTRO');
    	$this->db->where('ID_PROVINCIA',0);
    	$this->db->where('ID_DISTRITO',0);
    	$this->db->where('COD_DEPARTAMENTO !=','99');
    	$this->db->where('COD_DEPARTAMENTO !=','00');
    	$this->db->where_not_in('ID_DEPARTAMENTO', array(0,26,27));
    	$this->db->order_by('DES_DISTRITO','asc');
    	$q = $this->db->get('ubigeo');
		return $q;
    }    

    function get_odeis(){
        $this->db->select('object as COD_DEPARTAMENTO,text as DES_DISTRITO');
        $this->db->where('class',10);
        $this->db->where('object != "-1"');
        $this->db->order_by('text asc');
        $q = $this->db->get('class');
        return $q;
    } 

    function get_odei_by_code($code){
        $this->output->cache(9999999999);
    	$this->db->select('object as id_odei,text as odei');
    	$this->db->where('feature',$code);
        $this->db->where('class',10);
    	$q = $this->db->get('class');
		return $q;
    } 
    
    function get_dpto_by_code($code){
    	$this->db->select('COD_DEPARTAMENTO, DES_DISTRITO, CENTRO');
    	$this->db->where('COD_DEPARTAMENTO',$code);
    	$this->db->where('ID_PROVINCIA',0);
    	$this->db->where('ID_DISTRITO',0);
    	$this->db->where('COD_DEPARTAMENTO !=','99');
    	$this->db->where('COD_DEPARTAMENTO !=','00');
    	$this->db->where_not_in('ID_DEPARTAMENTO', array(0,26,27));
    	$this->db->order_by('DES_DISTRITO','asc');
    	$q = $this->db->get('ubigeo');
		return $q;
    }    

    function get_provs($dpto){

		$this->db->select ('COD_DEPARTAMENTO, COD_PROVINCIA,ID_PROVINCIA, DES_DISTRITO');
		$this->db->where('ID_PROVINCIA !=',0);
		$this->db->where('ID_DISTRITO',0);
		$this->db->where('COD_DEPARTAMENTO',$dpto);
		$this->db->order_by('DES_DISTRITO','asc');
		$q = $this->db->get('ubigeo');
		return $q;
    }


	function get_dis($prov,$dep)
	{
		$this->db->select ('COD_PROVINCIA, COD_DISTRITO, DES_DISTRITO');
		$this->db->where('ID_DISTRITO !=',0);
		$this->db->where('COD_PROVINCIA',$prov);
		$this->db->where('ID_DEPARTAMENTO',$dep);
		$this->db->order_by('DES_DISTRITO','asc');
		$q = $this->db->get('ubigeo');
		return $q;
	}


	function get_kml_dep()
	{
    	$this->db->select('COD_DEPARTAMENTO, DES_DISTRITO, GCOORD, CENTRO');
    	$this->db->where_not_in('ID_DEPARTAMENTO', array(0,26,27));
    	$this->db->where('ID_PROVINCIA',0);
    	$this->db->where('ID_DISTRITO',0);
    	$this->db->where('COD_DEPARTAMENTO !=','99');
    	$this->db->order_by('DES_DISTRITO','asc');
    	$q = $this->db->get('ubigeo');
		return $q;	
	}	


	function get_ubigeo()
	{	
		//$this->db->where('UBIGEO','010000');
		$q = $this->db->get('ubigeo');
		return $q;

	}
	function insert_gcoord($u,$data)
	{
    	$this->db->where('UBIGEO',$u);		
		$q = $this->db->update('ubigeo', $data);
		return $this->db->affected_rows() > 0;	
	}		
 }
