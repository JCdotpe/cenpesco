<?php 
/**
* 
*/
class Pea_model extends CI_MODEL
{
    
    var $tabla;
    function __construct()
    {
        parent::__construct();
        $this->tabla = 'pea p';  
    }  
	
	function get_pea()
	{
		$q = $this->db->get($this->tabla);
		return $q;
	}

    function num_pea_capacitar()
    {
        $this->db->select_sum('pea_capacitar');
        $this->db->from($this->tabla);
        $q = $this->db->get();
        return $q;
    }

    function get_pea_ubigeo_by_dep(){
        $this->db->select('p.*');
        $this->db->select('p.CENTRO, p.SEDE');
        $this->db->from($this->tabla);
        // $this->db->join('ubigeo u','u.COD_DEPARTAMENTO = p.ubigeo and ID_PROVINCIA = 0 and ID_DISTRITO = 0','left');
        $this->db->group_by('p.id');
        $this->db->order_by('p.id','asc');
        $q = $this->db->get();
        return $q;
    } 


}