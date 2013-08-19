<?php
class Marco_model extends CI_Model{

  //   function get_dptos(){
  //   	$this->db->select('COD_DEPARTAMENTO, DES_DISTRITO');
  //   	$this->db->where_in('ID_DEPARTAMENTO', array(16,20,21));
  //   	$this->db->where('ID_PROVINCIA',0);
  //   	$this->db->where('ID_DISTRITO',0);
  //   	$this->db->where('COD_DEPARTAMENTO !=','99');
  //   	$this->db->order_by('DES_DISTRITO','asc');
  //   	$q = $this->db->get('marco');
		// return $q;
  //   }   

    function get_cod_odei_by_sede_dep($sede, $dep){// obtiene ODEI_COD mediante SEDE_COD y CCDD
        if ($sede == 99){$sede_s = range(1,26);}else{$sede_s = $sede;}
        $this->db->distinct('ODEI_COD');
        $this->db->where_in('SEDE_COD',$sede_s);
        $this->db->where('CCDD',$dep);
        $q = $this->db->get('marco');
        return $q;
    }

    function get_odei_by_sede_dep ($sede,$dep)//saca el ODEI, segun DEP y SEDE
    {   
        $this->db->distinct('ODEI_COD');
        $this->db->select('ODEI_COD,NOM_ODEI,NOM_SEDE');    
        $this->db->where('SEDE_COD',$sede);
        $this->db->where('CCDD',$dep);
        $q = $this->db->get('marco');
        return $q;
    }



    function get_sede(){
    	$this->db->select('SEDE_COD,NOM_SEDE');
    	$this->db->distinct('SEDE_COD');
    	$this->db->order_by('NOM_SEDE');
    	$q = $this->db->get('marco');
    	return $q;
    }
    function get_sede_by_cod($cod){
        $this->db->select('SEDE_COD,NOM_SEDE');
        $this->db->where_in('SEDE_COD',$cod);
        $this->db->distinct('SEDE_COD');
        $this->db->order_by('NOM_SEDE');
        $q = $this->db->get('marco');
        return $q;
    }    
    function get_dep_by_sede($sede){
    	$this->db->select('CCDD,DEPARTAMENTO');
    	$this->db->distinct('CCDD');
    	$this->db->where('SEDE_COD',$sede);
    	$this->db->order_by('DEPARTAMENTO');
    	$q = $this->db->get('marco');
    	return $q;
    }

    function get_odei ($sede){
		if ($sede == 99){ $sedes = range(1,26);}else{ $sedes = $sede;}
		$this->db->distinct('ODEI_COD');
    	$this->db->select('ODEI_COD');
    	$this->db->where_in('SEDE_COD',$sedes);
    	$this->db->order_by('SEDE_COD','asc');
    	$q = $this->db->get('marco');
		return $q;
    }      
    function get_dpto_by_odei ($odei){
		$this->db->distinct('CCDD');
    	$this->db->select('SEDE_COD, NOM_SEDE, ODEI_COD, NOM_ODEI, CCDD, DEPARTAMENTO');
    	$this->db->where_in('ODEI_COD',$odei);
    	$this->db->order_by('DEPARTAMENTO','asc');
    	$q = $this->db->get('marco');
		return $q;
    }    

    function get_prov_by_odei ($sede,$odei,$dep){
    	$this->db->distinct('CCPP');
		$this->db->select('SEDE_COD, NOM_SEDE, ODEI_COD, NOM_ODEI,CCPP, PROVINCIA');
    	if ($sede < 99) {
    		$this->db->where_in('SEDE_COD',$sede);	
    	    $this->db->where_in('ODEI_COD',$odei); }		
		$this->db->where('CCDD',$dep);
		$this->db->order_by('PROVINCIA','asc');
		$q = $this->db->get('marco');
		return $q;
    }

	function get_dist_by_odei($sede,$odei,$prov,$dep)
	{
		$this->db->distinct('CCDI');
		$this->db->select ('CCDI,DISTRITO');
		if ($sede < 99) {	
			$this->db->where('SEDE_COD',$sede);
			$this->db->where_in('ODEI_COD',$odei); 	}	
		$this->db->where('CCDD',$dep);
		$this->db->where('CCPP',$prov);
		$this->db->order_by('DISTRITO','asc');
		$q = $this->db->get('marco');
		return $q;
	}
	function get_ccpp_by_odei ($sede,$odei,$dep,$prov,$dist)
	{	
		$this->db->distinct('CODCCPP');
		$this->db->select('CODCCPP,CENTRO_POBLADO');
		if ($sede < 99) {	
			$this->db->where('SEDE_COD',$sede);
			$this->db->where_in('ODEI_COD',$odei); 	}	
		$this->db->where('CCDD',$dep);
		$this->db->where('CCPP',$prov);
		$this->db->where('CCDI',$dist);
    	$q = $this->db->get('marco');
		return $q;
	}	
	
//*********************************************************************************************
//*********************************************************************************************
    function get_prov_by_sede ($sede,$dep){
        $this->db->distinct('CCPP');
        $this->db->select('CCPP, PROVINCIA');
        $this->db->where('SEDE_COD',$sede);  
        $this->db->where('CCDD',$dep);
        $this->db->order_by('PROVINCIA','asc');
        $q = $this->db->get('marco');
        return $q;
    }

    function get_dist_by_sede($sede,$dep,$prov)
    {
        $this->db->distinct('CCDI');
        $this->db->select ('CCDI,DISTRITO');
        $this->db->where('SEDE_COD',$sede);
        $this->db->where('CCDD',$dep);
        $this->db->where('CCPP',$prov);
        $this->db->order_by('DISTRITO','asc');
        $q = $this->db->get('marco');
        return $q;
    }
    function get_ccpp_by_sede ($sede,$dep,$prov,$dist)
    {   
        $this->db->distinct('CODCCPP');
        $this->db->select('CODCCPP,CENTRO_POBLADO');
        $this->db->where('SEDE_COD',$sede);
        $this->db->where('CCDD',$dep);
        $this->db->where('CCPP',$prov);
        $this->db->where('CCDI',$dist);
        $q = $this->db->get('marco');
        return $q;
    }   



//** para reportes de digitacion 

    function get_pescadores_by_odei($cod)
    {   
        $this->db->select('SEDE_COD, ODEI_COD, NOM_ODEI, sum(PEA_PESCADOR) as TOTAL_PES ');
        $this->db->where_in('ODEI_COD',$cod);
        $this->db->group_by('ODEI_COD');
        $this->db->order_by('NOM_ODEI');
        $q = $this->db->get('marco');
        return $q->result();
    }      


    function get_pescadores_by_dist($cod)
    {   
        $this->db->select('SEDE_COD, ODEI_COD, NOM_ODEI, sum(PEA_PESCADOR) as TOTAL_PES ');
        $this->db->where_in('ODEI_COD',$cod);
        $this->db->group_by('ODEI_COD');
        $this->db->order_by('NOM_ODEI');
        $q = $this->db->get('marco');
        return $q->result();
    }     

 }
