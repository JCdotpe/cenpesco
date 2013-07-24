<?php 
/**
* 
*/
class Avance_campo_model extends CI_MODEL
{
	
	function consulta_ccpp($dep,$prov,$dist,$ccpp)
	{
        $this->db->where('CCDD',$dep);
        $this->db->where('CCPP',$prov);
        $this->db->where('CCDI',$dist);
        $this->db->where('COD_CCPP',$ccpp);
        $this->db->where('activo',1);        
        $q = $this->db->get('avance_campo');
		return $q->num_rows();
	}

    function get_todo($odei)
    {   $this->db->select('SEDE_COD,NOM_SEDE,ODEI_COD,NOM_ODEI,CCDD,NOM_DD,CCPP,NOM_PP,CCDI,NOM_DI,COD_CCPP,NOM_CCPP,F_D,F_M,NOM_BRI,
        C_TOTAL,C_COMP,C_INC,C_RECH,P_TOTAL,P_COMP,P_INC,P_RECH,E_TOTAL_P,A_TOTAL,A_COMP,A_INC,A_RECH,E_TOTAL_A' );
        $this->db->where_in('SEDE_COD',$odei);
        $q = $this->db->get('avance_campo');
        return $q;
    }



                    






    function insertar($data){
		$this->db->insert('avance_campo', $data);
		return $this->db->affected_rows();
    }   

 
  

}
?>