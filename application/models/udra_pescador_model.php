<?php 

class Udra_pescador_model extends CI_MODEL
{
	
	function insert_registro_pescadores ($data)
	{
		$this->db->insert('udra_pescador',$data);
		return $this->db->affected_rows();
	}

	//si  CCPP fue registrado
	function get_centro_poblado($dep, $prov,$dist,$ccpp)
	{	
		$condicion = 'CCDD ="'. $dep .'" AND CCPP="'. $prov .'" AND CCDI="'. $dist .'" AND COD_CCPP="'. $ccpp.'"';
    	$this->db->where($condicion);
    	$q = $this->db->get('udra_pescador');
		return $q->num_rows();
	}	

	function get_pescadores_by_odei($cod)
	{	
		if ($cod == 99){ $cod = range(1,26); }
		$this->db->where_in('SEDE_COD',$cod);
		$this->db->order_by('DEPARTAMENTO');
    	$q = $this->db->get('udra_pescador');
		return $q->result();
	}	


	function get_n_formularios($forms)// cuenta por DEP, la cantidad de formularios registrados en todas las secciones
	{	
		$this->db->select('COUNT(NFORM) as NFORM,CCDD,CCPP,CCDI ,COD_CCPP');
		$this->db->where_in('id',$forms);
		$this->db->group_by('CCDD,CCPP,CCDI ,COD_CCPP');
    	$q = $this->db->get('pescador');
		return $q;
	}		

	


	function get_regs_a($table,$num) //verifica si todas las secciones de pescador fueron ingresadas
	{	
		$this->db->where('pescador_id',$num);
    	$q = $this->db->get($table);
		return $q;
	}	

	function get_todo() // obtiene toda la tabla
	{	
    	$q = $this->db->get('udra_pescador');
		return $q;
	}	




	function get_registros_total($forms)// cuenta  la cantidad de formularios registrados en todas las secciones
	{	
		$this->db->select('COUNT(NFORM) as NFORM');
		$this->db->where_in('id',$forms);
    	$q = $this->db->get('pescador');
		return $q;
	}		

	function get_all_export(){
		$q = $this->db->get('udra_pescador');
		return $q;
	}

// ******************************************************************************
// para REPORTES
// ******************************************************************************

	function get_formularios_total_by_odei($cod)// obtiene el total de formularios declarados en UDRA
	{	
		$this->db->select('SEDE_COD, ODEI_COD, NOM_ODEI, sum(FORMULARIOS) as TOTAL_FORM ');
		$this->db->where_in('ODEI_COD',$cod);
		$this->db->group_by('ODEI_COD');
    	$q = $this->db->get('udra_pescador');
		return $q;
	}	

	function get_forms_by_odei($cod) // obtiene todos los registros formulario registrados inicialmente
	{	
		//if ($cod == 99){ $cod = range(1,26); }
		$this->db->where_in('ODEI_COD',$cod);		
		$this->db->select('id,SEDE_COD,ODEI_COD,CCDD,CCPP,CCDI ,COD_CCPP');
    	$q = $this->db->get('pescador');
		return $q;
	}	

	function get_n_formularios_by_odei($forms)// cuenta por ODEI, la cantidad de formularios 
	{	
		$this->db->select('SEDE_COD, ODEI_COD, NOM_ODEI, count(id) as TOTAL_DIG ');
		$this->db->where_in('id',$forms);
		$this->db->group_by('ODEI_COD');
    	$q = $this->db->get('pescador');
		return $q;
	}	

	// PROVINCIA
	function get_formularios_total_by_prov($cod)// obtiene el total de formularios declarados en UDRA por Provincia
	{	
		$this->db->select('SEDE_COD, ODEI_COD, NOM_ODEI, CCPP, PROVINCIA, sum(FORMULARIOS) as TOTAL_FORM ');
		$this->db->where_in('ODEI_COD',$cod);
		$this->db->group_by('ODEI_COD');
		$this->db->group_by('CCPP');
    	$q = $this->db->get('udra_pescador');
		return $q;
	}	

	function get_n_formularios_by_prov($forms)// cuenta por ODEI, la cantidad de formularios 
	{	
		$this->db->select('SEDE_COD, ODEI_COD, NOM_ODEI, CCPP, count(id) as TOTAL_DIG ');
		$this->db->where_in('id',$forms);
		$this->db->group_by('ODEI_COD');
		$this->db->group_by('CCPP');
    	$q = $this->db->get('pescador');
		return $q;
	}

	//DISTRITO
	function get_formularios_total_by_dist($cod)// obtiene el total de formularios declarados en UDRA por Provincia
	{	
		$this->db->select('SEDE_COD, ODEI_COD, NOM_ODEI, CCPP, PROVINCIA, CCDI, sum(FORMULARIOS) as TOTAL_FORM ');
		$this->db->where_in('ODEI_COD',$cod);
		$this->db->group_by('ODEI_COD');
		$this->db->group_by('CCPP');
		$this->db->group_by('CCDI');
    	$q = $this->db->get('udra_pescador');
		return $q;
	}	

	function get_n_formularios_by_dist($forms)// cuenta por distrito, la cantidad de formularios 
	{	
		$this->db->select('SEDE_COD, ODEI_COD, NOM_ODEI, CCPP,CCDI, count(id) as TOTAL_DIG ');
		$this->db->where_in('id',$forms);
		$this->db->group_by('ODEI_COD');
		$this->db->group_by('CCPP');
		$this->db->group_by('CCDI');
    	$q = $this->db->get('pescador');
		return $q;
	}

	//CENTRO POBLADO
	function get_formularios_total_by_ccpp($cod)// obtiene el total de formularios declarados en UDRA por CENTRO_POBLADO
	{	
		$this->db->select('SEDE_COD, ODEI_COD, NOM_ODEI, CCPP, PROVINCIA, CCDI,COD_CCPP, sum(FORMULARIOS) as TOTAL_FORM ');
		$this->db->where_in('ODEI_COD',$cod);
		$this->db->group_by('ODEI_COD');
		$this->db->group_by('CCPP');
		$this->db->group_by('CCDI');
		$this->db->group_by('COD_CCPP');
    	$q = $this->db->get('udra_pescador');
		return $q;
	}	

	function get_n_formularios_by_ccpp($forms)// cuenta por CCPP, la cantidad de formularios 
	{	
		$this->db->select('SEDE_COD, ODEI_COD, NOM_ODEI, CCPP,CCDI,COD_CCPP, count(id) as TOTAL_DIG ');
		$this->db->where_in('id',$forms);
		$this->db->group_by('ODEI_COD');
		$this->db->group_by('CCPP');
		$this->db->group_by('CCDI');
		$this->db->group_by('COD_CCPP');
    	$q = $this->db->get('pescador');
		return $q;
	}

}


