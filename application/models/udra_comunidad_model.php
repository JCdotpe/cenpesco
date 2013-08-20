<?php 

class Udra_comunidad_model extends CI_MODEL
{
	
	function insert_registro($data)
	{
		$this->db->insert('udra_comunidad',$data);
		return $this->db->affected_rows();
	}

	//si  CCPP fue registrado
	function get_centro_poblado($dep, $prov,$dist,$ccpp)
	{	
		$condicion = 'CCDD ="'. $dep .'" AND CCPP="'. $prov .'" AND CCDI="'. $dist .'" AND COD_CCPP="'. $ccpp.'"';
    	$this->db->where($condicion);
    	$q = $this->db->get('udra_comunidad');
		return $q->num_rows();
	}	

	function get_acuicultores_by_sede($user, $odeis)
	{	
		($user == 99) ? '' : $this->db->where('SEDE_COD',$user)  ;
		$this->db->where_in('ODEI_COD',$odeis);
		$this->db->order_by('DEPARTAMENTO');		
    	$q = $this->db->get('udra_comunidad');
		return $q->result();
	}		

	function get_n_formularios($forms)
	{	
		$this->db->select('COUNT(NFORM) as NFORM,CCDD,CCPP,CCDI ,COD_CCPP');
		$this->db->where_in('id',$forms);
		$this->db->group_by('CCDD,CCPP,CCDI ,COD_CCPP');
    	$q = $this->db->get('acuicultura_1');
		return $q;
	}	
	function get_forms($odei) // obtiene todos los registros formulario registrados en la primera tabla acuicultura_1
	{	
		// foreach($departamento->result() as $filas){
  //           $deps[] = ($filas->CCDD);
		// }		
		$this->db->where_in('ODEI_COD',$odei);		
		$this->db->select('id');
    	$q = $this->db->get('acuicultura_1');
		return $q;
	}	
	function get_regs_a($table,$num) //verifica si todas las secciones de acuicultor fueron ingresadas
	{	
		$this->db->where('comunidad_id',$num);
    	$q = $this->db->get($table);
		return $q;
	}			
	function get_formularios_total($departamento)// obtiene el total de formularios declarados en UDRA
	{	
		foreach($departamento->result() as $filas){
            $deps[] = ($filas->CCDD);
		}
		$this->db->where_in('CCDD',$deps);
    	$this->db->select_sum('FORMULARIOS');
    	$q = $this->db->get('udra_comunidad');
		return $q;
	}	
	function get_registros_total($forms)// cuenta  la cantidad de formularios registrados en todas las secciones
	{	
		$this->db->select('COUNT(NFORM) as NFORM');
		$this->db->where_in('id',$forms);
    	$q = $this->db->get('acuicultura_1');
		return $q;
	}

	function get_all_export(){
		$q = $this->db->get('udra_comunidad');
		return $q;
	}

// ******************************************************************************
// para AVANCE DIGITACION
// ******************************************************************************

	function get_forms_by_odei($cod) // obtiene todos los registros formulario registrados inicialmente
	{	
		$this->db->where_in('ODEI_COD',$cod);		
		$this->db->select('id,SEDE_COD,ODEI_COD,CCDD,CCPP,CCDI ,COD_CCPP');
    	$q = $this->db->get('comunidad');
		return $q;
	}	
	// ODEI
	function get_udra_total_by_odei($cod)// obtiene el total de formularios declarados en UDRA
	{	
		$this->db->select('SEDE_COD, ODEI_COD, NOM_ODEI, sum(FORMULARIOS) as TOTAL_FORM ');
		$this->db->where_in('ODEI_COD',$cod);
		$this->db->group_by('ODEI_COD');
    	$q = $this->db->get('udra_comunidad');
		return $q;
	}	

	function get_n_formularios_by_odei($forms)// cuenta por ODEI, la cantidad de formularios 
	{	
		$this->db->select('SEDE_COD, ODEI_COD, NOM_ODEI, count(id) as TOTAL_DIG ');
		$this->db->where_in('id',$forms);
		$this->db->group_by('ODEI_COD');
    	$q = $this->db->get('comunidad');
		return $q;
	}	

	// PROVINCIA
	function get_udra_total_by_prov($cod)// obtiene el total de formularios declarados en UDRA por Provincia
	{	
		$this->db->select('SEDE_COD, ODEI_COD, NOM_ODEI, CCPP, PROVINCIA, sum(FORMULARIOS) as TOTAL_FORM ');
		$this->db->where_in('ODEI_COD',$cod);
		$this->db->group_by('ODEI_COD');
		$this->db->group_by('CCPP');
    	$q = $this->db->get('udra_comunidad');
		return $q;
	}	

	function get_n_formularios_by_prov($forms)// cuenta por ODEI, la cantidad de formularios 
	{	
		$this->db->select('SEDE_COD, ODEI_COD, NOM_ODEI, CCPP, count(id) as TOTAL_DIG ');
		$this->db->where_in('id',$forms);
		$this->db->group_by('ODEI_COD');
		$this->db->group_by('CCPP');
    	$q = $this->db->get('comunidad');
		return $q;
	}

	//DISTRITO
	function get_udra_total_by_dist($cod)// obtiene N° total de formularios declarados en UDRA por DISTRITO
	{	
		$this->db->select('SEDE_COD, ODEI_COD, NOM_ODEI, CCPP, PROVINCIA, CCDI, sum(FORMULARIOS) as TOTAL_FORM ');
		$this->db->where_in('ODEI_COD',$cod);
		$this->db->group_by('ODEI_COD');
		$this->db->group_by('CCPP');
		$this->db->group_by('CCDI');
    	$q = $this->db->get('udra_comunidad');
		return $q;
	}	

	function get_n_formularios_by_dist($forms)// N°  por DISTRITO, la cantidad de formularios 
	{	
		$this->db->select('SEDE_COD, ODEI_COD, NOM_ODEI, CCPP,CCDI, count(id) as TOTAL_DIG ');
		$this->db->where_in('id',$forms);
		$this->db->group_by('ODEI_COD');
		$this->db->group_by('CCPP');
		$this->db->group_by('CCDI');
    	$q = $this->db->get('comunidad');
		return $q;
	}

	//CENTRO POBLADO
	function get_udra_total_by_ccpp($cod)// obtiene el total de formularios declarados en UDRA por CENTRO_POBLADO
	{	
		$this->db->select('SEDE_COD, ODEI_COD, NOM_ODEI, CCPP, PROVINCIA, CCDI,COD_CCPP, sum(FORMULARIOS) as TOTAL_FORM ');
		$this->db->where_in('ODEI_COD',$cod);
		$this->db->group_by('ODEI_COD');
		$this->db->group_by('CCPP');
		$this->db->group_by('CCDI');
		$this->db->group_by('COD_CCPP');
    	$q = $this->db->get('udra_comunidad');
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
    	$q = $this->db->get('comunidad');
		return $q;
	}



}


