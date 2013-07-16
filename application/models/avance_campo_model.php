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
    {   $this->db->where_in('SEDE_COD',$odei);
        $q = $this->db->get('avance_campo');
        return $q->result();
    }

    function insertar($data){
		$this->db->insert('avance_campo', $data);
		return $this->db->affected_rows();
    }   

 
  

}
?>