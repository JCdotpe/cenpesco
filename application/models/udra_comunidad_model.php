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
		$this->db->order_by('PROVINCIA');		
		$this->db->order_by('DISTRITO');		
		$this->db->order_by('CENTRO_POBLADO');		
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

	function update_nform($dep, $prov,$dist,$ccpp, $set)
	{	
		$condicion = 'CCDD ="'. $dep .'" AND CCPP="'. $prov .'" AND CCDI="'. $dist .'" AND COD_CCPP="'. $ccpp.'"';
    	$this->db->where($condicion);
    	$this->db->update('udra_comunidad', $set);
    	return $this->db->affected_rows();
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
	function get_forms_sec_info()//formularios de la ultima seccion para contar como formularios completos
	{
		$q = $this->db->query('
			select distinct(id) from comunidad c1 
			inner join comunidad_seccion2 c2 on c1.id = c2.comunidad_id
			inner join comunidad_seccion3 c3 on c1.id = c3.comunidad_id
			inner join comunidad_seccion4 c4 on c1.id = c4.comunidad_id
			inner join comunidad_seccion5 c5 on c1.id = c5.comunidad_id
			inner join comunidad_seccion6 c6 on c1.id = c6.comunidad_id
			inner join comunidad_seccion7 c7 on c1.id = c7.comunidad_id
			inner join comunidad_seccion8 c8 on c1.id = c8.comunidad_id
			inner join comunidad_info c9  on c1.id = c9.comunidad_id
			');
		return $q;
	}
	
	function get_id_forms()
	{
			$q = $this->db->query('
				select distinct(id) from comunidad 
				');
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

	function get_n_formularios_by_odei($odeis,$forms)// cuenta por ODEI, la cantidad de formularios 
	{	
		$this->db->select('SEDE_COD, ODEI_COD, NOM_ODEI, count(id) as TOTAL_DIG ');
		$this->db->where_in('ODEI_COD',$odeis);
		$this->db->where_in('id',$forms);
		$this->db->group_by('ODEI_COD');
    	$q = $this->db->get('comunidad');
		return $q;
	}	
	function get_forms_incompletos($forms)//  formularios incompletos
	{	
		$this->db->select('c.id,  sede_cod, nom_sede, odei_cod, nom_odei, ccdd, nom_dd, ccpp, nom_pp, ccdi, nom_di, cod_ccpp, nom_ccpp, nform,  users.user_id, users.nombres, created');
		$this->db->from('( select  u.id, p.user_id, p.nombres, p.ubigeo  from users u inner join user_profiles p on u.id = p.user_id) as users');
		$this->db->join('comunidad c ','c.user_id = users.id', 'inner');
		$this->db->where_in('c.id',$forms);
		$this->db->order_by('nom_sede');		
		$this->db->order_by('created');
		$q = $this->db->get();
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

	function get_n_formularios_by_prov($odeis,$forms)// cuenta por ODEI, la cantidad de formularios 
	{	
		$this->db->select('SEDE_COD, ODEI_COD, NOM_ODEI, CCPP, count(id) as TOTAL_DIG ');
		$this->db->where_in('ODEI_COD',$odeis);
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

	function get_n_formularios_by_dist($odeis,$forms)// N°  por DISTRITO, la cantidad de formularios 
	{	
		$this->db->select('SEDE_COD, ODEI_COD, NOM_ODEI, CCPP,CCDI, count(id) as TOTAL_DIG ');
		$this->db->where_in('ODEI_COD',$odeis);
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

	function get_n_formularios_by_ccpp($odeis,$forms)// cuenta por CCPP, la cantidad de formularios 
	{	
		$this->db->select('SEDE_COD, ODEI_COD, NOM_ODEI, CCPP,CCDI,COD_CCPP, count(id) as TOTAL_DIG ');
		$this->db->where_in('ODEI_COD',$odeis);
		$this->db->where_in('id',$forms);
		$this->db->group_by('ODEI_COD');
		$this->db->group_by('CCPP');
		$this->db->group_by('CCDI');
		$this->db->group_by('COD_CCPP');
    	$q = $this->db->get('comunidad');
		return $q;
	}

	function get_avance_gby_ccpp_by_odei($odeis){/* AVANCE COMUNIDAD - CCPP */
		$q = $this->db->query("
					select m.ODEI_COD,m. NOM_ODEI, m.CCPP, m.PROVINCIA ,  m.CCDI, m.DISTRITO, m. CODCCPP, m.CENTRO_POBLADO , m.MARCO_COMUNIDAD MARCO, COALESCE(u.FORMULARIOS,0) UDRA, COALESCE(d.DIG,0) DIGITACION  
					from marco m 
					left join udra_comunidad u ON  m.ODEI_COD = u.ODEI_COD AND m.CCPP = u.CCPP AND m.CCDI = u.CCDI AND m.CODCCPP = u.COD_CCPP  
					left join (
								select distinct(id), ODEI_COD, CCPP, CCDI, COD_CCPP, count(*) DIG from comunidad c1 
								inner join comunidad_seccion2 c2 on c1.id = c2.comunidad_id
								inner join comunidad_seccion3 c3 on c1.id = c3.comunidad_id
								inner join comunidad_seccion4 c4 on c1.id = c4.comunidad_id
								inner join comunidad_seccion5 c5 on c1.id = c5.comunidad_id
								inner join comunidad_seccion6 c6 on c1.id = c6.comunidad_id
								inner join comunidad_seccion7 c7 on c1.id = c7.comunidad_id
								inner join comunidad_seccion8 c8 on c1.id = c8.comunidad_id
								inner join comunidad_info c9  on c1.id = c9.comunidad_id GROUP BY ODEI_COD, CCPP, CCDI, COD_CCPP  ) d 
								ON  m.ODEI_COD = d.ODEI_COD  COLLATE utf8_unicode_ci AND m.CCPP = d.CCPP  COLLATE utf8_unicode_ci AND m.CCDI = d.CCDI COLLATE utf8_unicode_ci AND m.CODCCPP = d.COD_CCPP  COLLATE utf8_unicode_ci
					WHERE m.ODEI_COD IN (". join($odeis,',') .")
					order by m.NOM_ODEI, m.PROVINCIA, m.DISTRITO, m.CENTRO_POBLADO ;
					");
		return $q;
	}




	// PARA RESULTADO DEL EMPADRONAMIENTO
	function get_dig_res_completo_by_odei($forms)
	{
		$this->db->select('ODEI_COD, NOM_ODEI, count(*) as COMPLETO');
		$this->db->where_in('comunidad_id', $forms);
		$this->db->where('RES',1);	
		$this->db->from('comunidad');
		$this->db->join('comunidad_info','comunidad.id = comunidad_info.comunidad_id', 'inner');
		$this->db->group_by('NOM_ODEI');
		return $q = $this->db->get();
	}
	function get_dig_res_incompleto_by_odei($forms)
	{
		$this->db->select('ODEI_COD, NOM_ODEI, count(*) as INCOMPLETO');
		$this->db->where_in('comunidad_id', $forms);
		$this->db->where('RES',2);	
		$this->db->from('comunidad');
		$this->db->join('comunidad_info','comunidad.id = comunidad_info.comunidad_id', 'inner');
		$this->db->group_by('NOM_ODEI');
		return $q = $this->db->get();
	}
	function get_dig_res_rechazo_by_odei($forms)
	{
		$this->db->select('ODEI_COD, NOM_ODEI, count(*) as RECHAZO');
		$this->db->where_in('comunidad_id', $forms);
		$this->db->where('RES',3);	
		$this->db->from('comunidad');
		$this->db->join('comunidad_info','comunidad.id = comunidad_info.comunidad_id', 'inner');
		$this->db->group_by('NOM_ODEI');
		return $q = $this->db->get();
	}

}


