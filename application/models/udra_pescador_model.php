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

	function get_pescadores_by_odei($user, $odeis)
	{	
		($user == 99) ? '' : $this->db->where('SEDE_COD',$user)  ;
		$this->db->where_in('ODEI_COD',$odeis);
		$this->db->order_by('DEPARTAMENTO');
		$this->db->order_by('PROVINCIA');		
		$this->db->order_by('DISTRITO');		
		$this->db->order_by('CENTRO_POBLADO');
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

	function update_nform($dep, $prov,$dist,$ccpp, $set)
	{	
		$condicion = 'CCDD ="'. $dep .'" AND CCPP="'. $prov .'" AND CCDI="'. $dist .'" AND COD_CCPP="'. $ccpp.'"';
    	$this->db->where($condicion);
    	$this->db->update('udra_pescador', $set);
    	return $this->db->affected_rows();
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

	function get_forms_sec_info()//formularios de la ultima seccion para contar como formularios completos
	{
		$q = $this->db->query('
			select distinct(id) from pescador c1 
			inner join pesc_seccion2 c2 on c1.id = c2.pescador_id
			inner join pesc_seccion3 c3 on c1.id = c3.pescador_id
			inner join pesc_seccion4 c4 on c1.id = c4.pescador_id
			inner join pesc_seccion5 c5 on c1.id = c5.pescador_id
			inner join pesc_seccion6 c6 on c1.id = c6.pescador_id
			inner join pesc_seccion7 c7 on c1.id = c7.pescador_id
			inner join pesc_seccion8 c8 on c1.id = c8.pescador_id
			inner join pesc_seccion9 c9 on c1.id = c9.pescador_id
			inner join pesc_info c10  on c1.id = c10.pescador_id
			');
		return $q;
	}
function get_id_forms()
{
		// $q = $this->db->query('
		// 	select distinct(id) from pescador 
		// 	');
		$q = $this->db->query('
			SELECT distinct(id)
			FROM pescador c1 
			LEFT JOIN    pesc_seccion2  c2 ON c1.id = c2.pescador_id
			LEFT JOIN    pesc_seccion3  c3 ON c1.id = c3.pescador_id
			LEFT JOIN    pesc_seccion4  c4 ON c1.id = c4.pescador_id
			LEFT JOIN    pesc_seccion5  c5 ON c1.id = c5.pescador_id
			LEFT JOIN    pesc_seccion6  c6 ON c1.id = c6.pescador_id
			LEFT JOIN    pesc_seccion7  c7 ON c1.id = c7.pescador_id
			LEFT JOIN    pesc_seccion8  c8 ON c1.id = c8.pescador_id
			LEFT JOIN    pesc_seccion9  c9 ON c1.id = c9.pescador_id
			LEFT JOIN    pesc_info   c10       ON c1.id = c10.pescador_id
			WHERE   
			c2.pescador_id IS NULL OR
			c3.pescador_id IS NULL OR
			c4.pescador_id IS NULL OR
			c5.pescador_id IS NULL OR
			c6.pescador_id IS NULL OR
			c7.pescador_id IS NULL OR
			c8.pescador_id IS NULL OR
			c9.pescador_id IS NULL OR
			c10.pescador_id IS NULL ;
			');
		return $q;
}

	function get_n_formularios_by_odei($odeis, $forms )// cuenta por ODEI, la cantidad de formularios 
	{	
		$this->db->select('SEDE_COD, ODEI_COD, NOM_ODEI, count(id) as TOTAL_DIG ');
		$this->db->where_in('ODEI_COD',$odeis);
		$this->db->where_in('id',$forms);
		$this->db->group_by('ODEI_COD');
    	$q = $this->db->get('pescador');
		return $q;
	}	

	function get_forms_incompletos($forms)//  formularios incompletos
	{	
		$this->db->select('c.id,  sede_cod, nom_sede, odei_cod, nom_odei, ccdd, nom_dd, ccpp, nom_pp, ccdi, nom_di, cod_ccpp, nom_ccpp, nform,  users.user_id, users.nombres, created');
		$this->db->from('( select  u.id, p.user_id, p.nombres, p.ubigeo  from users u inner join user_profiles p on u.id = p.user_id) as users');
		$this->db->join('pescador c ','c.user_id = users.id', 'inner');
		$this->db->where_in('c.id',$forms);
		$this->db->order_by('nom_sede');		
		$this->db->order_by('created');
		$q = $this->db->get();
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

	function get_n_formularios_by_prov($odeis, $forms)// cuenta por ODEI, la cantidad de formularios 
	{	
		$this->db->select('SEDE_COD, ODEI_COD, NOM_ODEI, CCPP, count(id) as TOTAL_DIG ');
		$this->db->where_in('ODEI_COD',$odeis);
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

	function get_n_formularios_by_dist($odeis, $forms)// cuenta por distrito, la cantidad de formularios 
	{	
		$this->db->select('SEDE_COD, ODEI_COD, NOM_ODEI, CCPP,CCDI, count(id) as TOTAL_DIG ');
		$this->db->where_in('ODEI_COD',$odeis);
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

	function get_n_formularios_by_ccpp($odeis,$forms)// cuenta por CCPP, la cantidad de formularios 
	{	
		$this->db->select('SEDE_COD, ODEI_COD, NOM_ODEI, CCPP,CCDI,COD_CCPP, count(id) as TOTAL_DIG ');
		$this->db->where_in('ODEI_COD',$odeis);
		$this->db->where_in('id',$forms);
		$this->db->group_by('ODEI_COD');
		$this->db->group_by('CCPP');
		$this->db->group_by('CCDI');
		$this->db->group_by('COD_CCPP');
    	$q = $this->db->get('pescador');
		return $q;
	}

	function get_avance_gby_ccpp_by_odei($odeis){/* AVANCE COMUNIDAD - CCPP */
		$q = $this->db->query("
						select m.ODEI_COD,m. NOM_ODEI, m.CCPP, m.PROVINCIA ,  m.CCDI, m.DISTRITO, m. CODCCPP, m.CENTRO_POBLADO , m.PEA_PESCADOR MARCO, COALESCE(u.FORMULARIOS,0) UDRA, COALESCE(d.DIG,0) DIGITACION  
						from marco m 
						left join udra_pescador u ON  m.ODEI_COD = u.ODEI_COD AND m.CCPP = u.CCPP AND m.CCDI = u.CCDI AND m.CODCCPP = u.COD_CCPP  
						left join (
									select distinct(id), ODEI_COD, CCPP, CCDI, COD_CCPP, count(*) DIG from pescador c1 
									inner join pesc_seccion2 c2 on c1.id = c2.pescador_id
									inner join pesc_seccion3 c3 on c1.id = c3.pescador_id
									inner join pesc_seccion4 c4 on c1.id = c4.pescador_id
									inner join pesc_seccion5 c5 on c1.id = c5.pescador_id
									inner join pesc_seccion6 c6 on c1.id = c6.pescador_id
									inner join pesc_seccion7 c7 on c1.id = c7.pescador_id
									inner join pesc_seccion8 c8 on c1.id = c8.pescador_id
									inner join pesc_seccion9 c9 on c1.id = c9.pescador_id
									inner join pesc_info     c10 on c1.id = c10.pescador_id GROUP BY ODEI_COD, CCPP, CCDI, COD_CCPP  ) d 
									ON  m.ODEI_COD = d.ODEI_COD  COLLATE utf8_unicode_ci AND m.CCPP = d.CCPP  COLLATE utf8_unicode_ci AND m.CCDI = d.CCDI COLLATE utf8_unicode_ci AND m.CODCCPP = d.COD_CCPP  COLLATE utf8_unicode_ci
						WHERE m.ODEI_COD IN (". join($odeis,',') . ")
						order by m.NOM_ODEI, m.PROVINCIA, m.DISTRITO, m.CENTRO_POBLADO;			
					");
		return $q;
	}



	// PARA RESULTADO DEL EMPADRONAMIENTO
	function get_dig_res_completo_by_odei($forms)
	{
		$this->db->select('ODEI_COD, NOM_ODEI, count(*) as COMPLETO');
		$this->db->where_in('pescador_id', $forms);
		$this->db->where('RES',1);	
		$this->db->from('pescador');
		$this->db->join('pesc_info','pescador.id=pesc_info.pescador_id', 'inner');
		$this->db->group_by('NOM_ODEI');
		return $q = $this->db->get();
	}
	function get_dig_res_incompleto_by_odei($forms)
	{
		$this->db->select('ODEI_COD, NOM_ODEI, count(*) as INCOMPLETO');
		$this->db->where_in('pescador_id', $forms);
		$this->db->where('RES',2);
		$this->db->from('pescador');
		$this->db->join('pesc_info','pescador.id=pesc_info.pescador_id', 'inner');
		$this->db->group_by('NOM_ODEI');
		return $q = $this->db->get();
	}
	function get_dig_res_rechazo_by_odei($forms)
	{
		$this->db->select('ODEI_COD, NOM_ODEI, count(*) as RECHAZO');
		$this->db->where_in('pescador_id', $forms);
		$this->db->where('RES',3);
		$this->db->from('pescador');
		$this->db->join('pesc_info','pescador.id=pesc_info.pescador_id', 'inner');
		$this->db->group_by('NOM_ODEI');
		return $q = $this->db->get();
	}
}


