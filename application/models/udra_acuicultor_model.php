<?php 

class Udra_acuicultor_model extends CI_MODEL
{
	
	function insert_registro_acuicultores ($data)
	{
		$this->db->insert('udra_acuicultor',$data);
		return $this->db->affected_rows();
	}

	//si  CCPP fue registrado
	function get_centro_poblado($dep, $prov,$dist,$ccpp)
	{	
		$condicion = 'CCDD ="'. $dep .'" AND CCPP="'. $prov .'" AND CCDI="'. $dist .'" AND COD_CCPP="'. $ccpp.'"';
    	$this->db->where($condicion);
    	$q = $this->db->get('udra_acuicultor');
		return $q->num_rows();
	}	

	function get_acuicultores_by_sede($user,$odeis)
	{	
		($user == 99) ? '' : $this->db->where('SEDE_COD',$user)  ;
		$this->db->where_in('ODEI_COD',$odeis);
		$this->db->order_by('DEPARTAMENTO');		
    	$q = $this->db->get('udra_acuicultor');
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
			
	function get_formularios_total($departamento)// obtiene el total de formularios declarados en UDRA
	{	
		foreach($departamento->result() as $filas){
            $deps[] = ($filas->CCDD);
		}
		$this->db->where_in('CCDD',$deps);
    	$this->db->select_sum('FORMULARIOS');
    	$q = $this->db->get('udra_acuicultor');
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
		$q = $this->db->get('udra_acuicultor');
		return $q;
	}

	function update_nform($dep, $prov,$dist,$ccpp, $set)
	{	
		$condicion = 'CCDD ="'. $dep .'" AND CCPP="'. $prov .'" AND CCDI="'. $dist .'" AND COD_CCPP="'. $ccpp.'"';
    	$this->db->where($condicion);
    	$this->db->update('udra_acuicultor', $set);
    	return $this->db->affected_rows();
	}

// ******************************************************************************
// para REPORTES
// ******************************************************************************

	function get_regs_a($table,$num, $s) //verifica si todas las secciones de acuicultor fueron ingresadas
	{	
		$this->db->where('id'.$s,$num);
    	$q = $this->db->get($table);
		return $q;
	}
	function get_udra_total_by_odei($cod)// obtiene el total de formularios declarados en UDRA
	{	
		$this->db->select('SEDE_COD, ODEI_COD, NOM_ODEI, sum(FORMULARIOS) as TOTAL_FORM ');
		$this->db->where_in('ODEI_COD',$cod);
		$this->db->group_by('ODEI_COD');
    	$q = $this->db->get('udra_acuicultor');
		return $q;
	}	

	function get_forms_by_odei($cod) // obtiene todos los registros formulario registrados inicialmente
	{	
		//if ($cod == 99){ $cod = range(1,26); }
		$this->db->where_in('ODEI_COD',$cod);		
		$this->db->select('id1,SEDE_COD,ODEI_COD,CCDD,CCPP,CCDI ,COD_CCPP');
    	$q = $this->db->get('acu_seccion1');
		return $q;
	}	

	function get_forms_sec_info()//formularios de la ultima seccion para contar como formularios completos
	{
		$q = $this->db->query('
			select distinct(id1) from acu_seccion1 c1 
			inner join acu_seccion2 c2 on c1.id1 = c2.id2
			inner join acu_seccion3 c3 on c1.id1 = c3.id3
			inner join acu_seccion4 c4 on c1.id1 = c4.id4
			inner join acu_seccion5 c5 on c1.id1 = c5.id5
			inner join acu_seccion6 c6 on c1.id1 = c6.id6
			inner join acu_seccion7 c7 on c1.id1 = c7.id7
			inner join acu_seccion8 c8 on c1.id1 = c8.id8
			inner join acu_seccion9 c9 on c1.id1 = c9.id9
			inner join acu_seccion10 c10  on c1.id1 = c10.id10
			');
		return $q;
	}
function get_id_forms()
{
		$q = $this->db->query('
			select distinct(id1) from acu_seccion1 
			');
		return $q;
}
	function get_n_formularios_by_odei($forms)// cuenta por ODEI, la cantidad de formularios 
	{	
		$this->db->select('SEDE_COD, ODEI_COD, NOM_ODEI, count(id1) as TOTAL_DIG ');
		$this->db->where_in('id1',$forms);
		$this->db->group_by('ODEI_COD');
    	$q = $this->db->get('acu_seccion1');
		return $q;
	}	

	function get_forms_incompletos($forms)//  formularios incompletos
	{	
		$this->db->select('c.id1,  sede_cod, nom_sede, odei_cod, nom_odei, ccdd, nom_dd, ccpp, nom_pp, ccdi, nom_di, cod_ccpp, nom_ccpp, nform,  users.user_id, users.nombres, ff_rr1');
		$this->db->from('( select  u.id, p.user_id, p.nombres, p.ubigeo  from users u inner join user_profiles p on u.id = p.user_id) as users');
		$this->db->join('acu_seccion1 c ','c.user1 = users.id', 'inner');
		$this->db->where_in('c.id1',$forms);
		$this->db->order_by('nom_sede');		
		$this->db->order_by('ff_rr1');
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
    	$q = $this->db->get('udra_acuicultor');
		return $q;
	}	

	function get_n_formularios_by_prov($forms)// cuenta por ODEI, la cantidad de formularios 
	{	
		$this->db->select('SEDE_COD, ODEI_COD, NOM_ODEI, CCPP, count(id1) as TOTAL_DIG ');
		$this->db->where_in('id1',$forms);
		$this->db->group_by('ODEI_COD');
		$this->db->group_by('CCPP');
    	$q = $this->db->get('acu_seccion1');
		return $q;
	}

	//DISTRITO
	function get_udra_total_by_dist($cod)// obtiene el total de formularios declarados en UDRA por Provincia
	{	
		$this->db->select('SEDE_COD, ODEI_COD, NOM_ODEI, CCPP, PROVINCIA, CCDI, sum(FORMULARIOS) as TOTAL_FORM ');
		$this->db->where_in('ODEI_COD',$cod);
		$this->db->group_by('ODEI_COD');
		$this->db->group_by('CCPP');
		$this->db->group_by('CCDI');
    	$q = $this->db->get('udra_acuicultor');
		return $q;
	}	

	function get_n_formularios_by_dist($forms)// cuenta por distrito, la cantidad de formularios 
	{	
		$this->db->select('SEDE_COD, ODEI_COD, NOM_ODEI, CCPP,CCDI, count(id1) as TOTAL_DIG ');
		$this->db->where_in('id1',$forms);
		$this->db->group_by('ODEI_COD');
		$this->db->group_by('CCPP');
		$this->db->group_by('CCDI');
    	$q = $this->db->get('acu_seccion1');
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
    	$q = $this->db->get('udra_acuicultor');
		return $q;
	}	

	function get_n_formularios_by_ccpp($forms)// cuenta por CCPP, la cantidad de formularios 
	{	
		$this->db->select('SEDE_COD, ODEI_COD, NOM_ODEI, CCPP,CCDI,COD_CCPP, count(id1) as TOTAL_DIG ');
		$this->db->where_in('id1',$forms);
		$this->db->group_by('ODEI_COD');
		$this->db->group_by('CCPP');
		$this->db->group_by('CCDI');
		$this->db->group_by('COD_CCPP');
    	$q = $this->db->get('acu_seccion1');
		return $q;
	}

	// PARA RESULTADO DEL EMPADRONAMIENTO
	function get_dig_res_completo_by_odei($forms)
	{
		$this->db->select('ODEI_COD, NOM_ODEI, count(*) as COMPLETO');
		$this->db->where_in('id1', $forms);
		$this->db->where('RES',1);	
		$this->db->from('acu_seccion1');
		$this->db->join('acu_seccion10','acu_seccion1.id1=acu_seccion10.id10', 'inner');
		$this->db->group_by('NOM_ODEI');
		return $q = $this->db->get();
	}
	function get_dig_res_incompleto_by_odei($forms)
	{
		$this->db->select('ODEI_COD, NOM_ODEI, count(*) as INCOMPLETO');
		$this->db->where_in('id1', $forms);
		$this->db->where('RES',2);	
		$this->db->from('acu_seccion1');
		$this->db->join('acu_seccion10','acu_seccion1.id1=acu_seccion10.id10', 'inner');
		$this->db->group_by('NOM_ODEI');
		return $q = $this->db->get();
	}
	function get_dig_res_rechazo_by_odei($forms)
	{
		$this->db->select('ODEI_COD, NOM_ODEI, count(*) as RECHAZO');
		$this->db->where_in('id1', $forms);
		$this->db->where('RES',3);	
		$this->db->from('acu_seccion1');
		$this->db->join('acu_seccion10','acu_seccion1.id1=acu_seccion10.id10', 'inner');
		$this->db->group_by('NOM_ODEI');
		return $q = $this->db->get();
	}

}


