<?php 
/**
* 
*/
class Registro_pescadores_model extends CI_MODEL
{
	
	function insert_registro_pescadores ($data)
	{
		$this->db->insert('registro_pescadores',$data);
		return $this->db->affected_rows();
	}

	function get_cod() //nuevo codigo MASTER
	{
		$this->db->select_max('id_reg','id_reg');
		$q = $this->db->get('registro_pescadores');
		return $q->row('id_reg');
	}
	function get_cod_reg($dep,$prov,$dist,$cod_ccpp,$cod_ccpp_proc) //BUSCA ID_REG
	{	
		$this->db->select('id_reg');		
		$this->db->where('CCDD',$dep);
		$this->db->where('CCPP',$prov);
		$this->db->where('CCDI',$dist);
		$this->db->where('COD_CCPP',$cod_ccpp);
		$this->db->where('CCPP_CODPROC',$cod_ccpp_proc);
		$q = $this->db->get('registro_pescadores');
		return $q->row('id_reg');
	}

	function get_num_filas($cod)
	{
		$this->db->where('T_F_D',$cod);
		$this->db->select('T_F_D');
		$q = $this->db->get('registro_pescadores');
		return $q->row('T_F_D');
	}

		function get_num_total($cod)
	{
		$this->db->where('id_reg',$cod);
		$this->db->select('T_F_D');
		$q = $this->db->get('registro_pescadores');
		return $q->row('T_F_D');
	}	

	function get_detalles($cod)
	{
		$this->db->where('id_reg',$cod);
		$q = $this->db->get('registro_pescadores');
		return $q;
	}	

	//si CCPP ya fue registrado
	function get_centro_poblado($dep, $prov,$dist,$ccpp)
	{	
		$condicion = 'CCDD ="'. $dep .'" AND CCPP="'. $prov .'" AND CCDI="'. $dist .'" AND CCPP_CODPROC="'. $ccpp.'"';
    	$this->db->where($condicion);
    	$q = $this->db->get('registro_pescadores');
		return $q->num_rows();
	}	


	function get_pescadores_t($id)
	{
    	$this->db->where('id_reg',$id);
		$this->db->select('T_PES');    	
    	$q = $this->db->get('registro_pescadores');
		return $q->row('T_PES');
	}	
	function get_acuicultores_t($id)
	{
    	$this->db->where('id_reg',$id);
		$this->db->select('T_ACUI');    	
    	$q = $this->db->get('registro_pescadores');
		return $q->row('T_ACUI');
	}
	function get_pes_acuicultores_t($id)
	{
    	$this->db->where('id_reg',$id);
		$this->db->select('T_PES_ACUI');    	
    	$q = $this->db->get('registro_pescadores');
		return $q->row('T_PES_ACUI');
	}	
	function get_embarcaciones_t($id)
	{
    	$this->db->where('id_reg',$id);
		$this->db->select('T_EMB');    	
    	$q = $this->db->get('registro_pescadores');
		return $q->row('T_EMB');
	}	
	function update_resumen($registros,$id)
	{
		$this->db->where('id_reg',$id);
    	$this->db->update('registro_pescadores',$registros);
		return $this->db->affected_rows();
	}

	function select_todo($sedes)
	{
		foreach($sedes->result() as $filas){
            $sede[] = ($filas->ODEI_COD);
		}
		$this->db->where_in('ODEI_COD',$sede);
		$this->db->select('SEDE_COD,NOM_SEDE,ODEI_COD,NOM_ODEI,NOM_DD,CCDD,NOM_PP,CCPP,NOM_DI,CCDI,NOM_CCPP,COD_CCPP,NOM_AUT,DNI_AUT,F_D,F_M,F_A,T_F_D,T_PES,T_ACUI,T_PES_ACUI,T_EMB,NOM_EMP,DNI_EMP,
							P1,P2,P3,P4,P5,P6,P7,P8,P9,P10,P11,P12,P13,P14,P15');
		$this->db->from('registro_pescadores r');
		$this->db->join('registro_pescadores_dat d','r.id_reg=d.id_reg','inner');
		$this->db->order_by('NOM_DD');
    	$q = $this->db->get();
		return $q;
	}	
	function select_by_dep($departamento)
	{
		foreach($departamento->result() as $filas){
            $deps[] = ($filas->COD_DEPARTAMENTO);
		}
		$this->db->where_in('CCDD',$deps);
		$this->db->select('NOM_DD,CCDD,NOM_PP,CCPP,NOM_DI, CCDI,NOM_CCPP, COD_CCPP,T_F_D,T_PES,T_ACUI,T_EMB');
		$this->db->order_by('NOM_DD');
    	$q = $this->db->get('registro_pescadores');
		return $q;
	}	

	function select_by_resumen($departamento)
	{
		foreach($departamento->result() as $filas){
            $deps[] = ($filas->COD_DEPARTAMENTO);
		}
		$this->db->where_in('CCDD',$deps);
		$this->db->select_sum('T_PES','PESCADORES');
		$this->db->select_sum('T_ACUI','ACUICULTORES');
		$this->db->select_sum('T_EMB','EMBARCACIONES');
    	$q = $this->db->get('registro_pescadores');
		return $q;
	}	

	//CONSULTA EN UDRA si el CCPP fue ingresado
    function consulta_udra($dep,$prov,$dist,$ccpp)
    {
        $this->db->select('FORMULARIOS');
        $this->db->where('CCDD',$dep);
        $this->db->where('CCPP',$prov);
        $this->db->where('CCDI',$dist);
        $this->db->where('COD_CCPP',$ccpp);       
        $q = $this->db->get('udra_registro');
        return $q;
    }
}


