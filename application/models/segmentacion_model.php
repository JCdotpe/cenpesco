<?php 

class Segmentacion_model extends CI_MODEL {


	 public function get_empadronador($sede, $dep, $equi, $ruta)
	{
		
		$q = $this->db->query("select  DISTINCT(SEDE_OPERATIVA),  DEPARTAMENTO_SEDE,  EQUIPO,  RUTA,  NOMBRE_Y_APELLIDOS_DEL_EMPADRONADOR,  DATE_FORMAT(FECHA_UPDATE ,'%d/%m/%Y %H:%i') as FECHA_UPDATE from data_empadronador  
		where sede_operativa = (select  distinct(nom_sede) from marco where sede_cod = '". $sede ."') 
		and departamento_sede = (select  distinct(departamento) from marco where ccdd = '". $dep ."') 
		and equipo = ". $equi ."
		and ruta = ". $ruta);
		return $q;

	}

	 public function get_all_empadronador($sede, $dep, $equi, $ruta)
	{
		
		$q = $this->db->query("select 
			  DEPARTAMENTO,
			  PROVINCIA,
			  DISTRITO,
			  CENTRO_POBLADO,
			  PUNTO_CONCENTRACION,
			  POBLACION_ESTIMADA,
			  TIPO_EMPADRONAMIENTO,
			  FECHA_INICIO,
			  FECHA_FINAL,
			  TRASLADO,
			  TRABAJO,
			  VIAJE_SEDE_ODEI,
			  RETROALIMENTACION,
			  TOTAL_DE_DIAS,
			  MOV_LOCAL decim,
			  PASAJE_TRASLADO,
			  GASTO_OPERATIVO,
			  MOVILIDAD_LOCAL_S,
			  PASAJE_TRASLADO_2,
			  GASTOS_OPERATIVO_S,
			  PASAJE_S,
			  TOTAL_S,
			  CCPP_CV1,
			  CCPP_CV2,
			  CCPP_CV3,
			  CCPP_CV4,
			  CCPP_CV5,
			  CCPP_CV6,
			  CCPP_CV7,
			  CCPP_CV8,
			  CCPP_CV9,
			  CCPP_CV10,
			  CCPP_CV11,
			  CCPP_CV12,
			  CCPP_CV13,
			  CCPP_CV14,
			  CCPP_CV15,
			  CCPP_CV16,
			  CCPP_CV17,
			  CCPP_CV18,
			  CCPP_CV19,
			  CCPP_CV20,
			  CCPP_CV21,
			  CCPP_CV22,
			  CCPP_CV23
			from data_empadronador  
			where sede_operativa = (select  distinct(nom_sede) from marco where sede_cod = '". $sede ."') 
			and departamento_sede = (select  distinct(departamento) from marco where ccdd = '". $dep ."') 
			and equipo = ". $equi ."
			and ruta = ". $ruta);
		return $q;

 
	}



	 public function get_jefe($sede, $dep, $equi)
	{
		
		$q = $this->db->query("select  DISTINCT(SEDE_OPERATIVA),  DEPARTAMENTO_SEDE,  EQUIPO,  NOMBRE_Y_APELLIDOS_DEL_JEFE_DE_EQUIPO,  DATE_FORMAT(FECHA_UPDATE ,'%d/%m/%Y %H:%i') as FECHA_UPDATE from data_jefe_equipo 
		where sede_operativa = (select  distinct(nom_sede) from marco where sede_cod = '". $sede ."') 
		and departamento_sede = (select  distinct(departamento) from marco where ccdd = '". $dep ."') 
		and equipo = ". $equi );
		return $q;

	}

	 public function get_all_jefe($sede, $dep, $equi)
	{
		
		$q = $this->db->query("select 
			  DEPARTAMENTO,
			  PROVINCIA,
			  DISTRITO,
			  CENTRO_POBLADO,
			  PUNTO_CONCENTRACION,			  
			  POBLACION_ESTIMADA,
			  TIPO_EMPADRONAMIENTO,
			  FECHA_INICIO,
			  FECHA_FINAL,
			  TRASLADO,
			  SUPERVISION,
			  VIAJE_SEDE_ODEI,
			  RETROALIMENTACION,
			  TOTAL_DIAS,
			  MOV_LOCAL,
			  PASAJE_TRASLADO,
			  GASTO_OPERATIVO,
			  MOVILIDAD_LOCAL_S,
			  PASAJE_TRASLADO_2,
			  GASTOS_OPERATIVO_S,
			  PASAJE_S,
			  TOTAL_S,
			  CCPP_CV1,
			  CCPP_CV2,
			  CCPP_CV3,
			  CCPP_CV4,
			  CCPP_CV5,
			  CCPP_CV6,
			  CCPP_CV7,
			  CCPP_CV8,
			  CCPP_CV9,
			  CCPP_CV10,
			  CCPP_CV11,
			  CCPP_CV12,
			  CCPP_CV13,
			  CCPP_CV14,
			  CCPP_CV15,
			  CCPP_CV16,
			  CCPP_CV17,
			  CCPP_CV18,
			  CCPP_CV19,
			  CCPP_CV20,
			  CCPP_CV21,
			  CCPP_CV22,
			  CCPP_CV23
			from data_jefe_equipo  
			where sede_operativa = (select  distinct(nom_sede) from marco where sede_cod = '". $sede ."') 
			and departamento_sede = (select  distinct(departamento) from marco where ccdd = '". $dep ."') 
			and equipo = ". $equi);
		return $q;


	}









}