<?php 
/**
* 
*/
class Observacion_campo_model extends CI_MODEL
{
	
	function consulta_ccpp($dep,$prov,$dist,$ccpp)
	{
        $this->db->where('CCDD',$dep);
        $this->db->where('CCPP',$prov);
        $this->db->where('CCDI',$dist);
        $this->db->where('COD_CCPP',$ccpp);
        $this->db->where('activo',1);        
        $q = $this->db->get('observacion_campo');
		return $q->num_rows();
	}

    function get_todo($odei){   
        $this->db->select('SEDE_COD,NOM_SEDE,ODEI_COD,NOM_ODEI,CCDD,NOM_DD,CCPP,NOM_PP,CCDI,NOM_DI,COD_CCPP,NOM_CCPP,F_D,F_M,
                        NOM,CARGO,F_PES,F_ACU,F_COM,SEC,PREG_N,E_CONC,E_DILIG,E_PREG,E_SOND,E_OMI,DES_E');
        $this->db->where_in('SEDE_COD',$odei);
        $q = $this->db->get('observacion_campo');
        return $q;

    }

    function insertar($data){
		$this->db->insert('observacion_campo', $data);
		return $this->db->affected_rows();
    }   

 
  

}
?>