<?php 
/**
* 
*/
class Avance_campo_subrutas_model extends CI_MODEL
{
 


    function insert_sub_ruta($data){
		$this->db->insert('avance_campo_subrutas', $data);
		return $this->db->affected_rows() > 0;
    }   

    function update_sub_ruta($sede,$dep,$prov,$dist,$cc_ccpp,$equipo,$ruta,$sub_ruta,$data){
        $this->db->where('COD_REG',$sede.$dep.$prov.$dist.$cc_ccpp.$equipo.$ruta.$sub_ruta);
        $this->db->where('CCSE',$sede);
        $this->db->where('CCDD',$dep);
        $this->db->where('CCPP',$prov);
        $this->db->where('CCDI',$dist);
        $this->db->where('CC_CCPP',$cc_ccpp);        
        $this->db->where('EQP',$equipo);
        $this->db->where('RUTA',$ruta);
        $this->db->where('SUB_R',$sub_ruta);
        $this->db->where('activo',1);          
        $this->db->update('avance_campo_subrutas', $data);
        return $this->db->affected_rows() > 0;
    }   


    function get_fields(){ //obtiene NOMBRE de campos
        $q = $this->db->list_fields('avance_campo_subrutas');
        return $q;
    }   

    function consulta($sede,$dep,$prov,$dist,$cc_ccpp,$equipo,$ruta,$sub_ruta)
    {
        $this->db->where('COD_REG',$sede.$dep.$prov.$dist.$cc_ccpp.$equipo.$ruta.$sub_ruta);
        $this->db->where('CCSE',$sede);
        $this->db->where('CCDD',$dep);
        $this->db->where('CCPP',$prov);
        $this->db->where('CCDI',$dist);
        $this->db->where('CC_CCPP',$cc_ccpp);        
        $this->db->where('EQP',$equipo);
        $this->db->where('RUTA',$ruta);
        $this->db->where('SUB_R',$sub_ruta);
        $this->db->where('activo',1);        
        $q = $this->db->get('avance_campo_subrutas');
        return $q;
    }
    function consulta_sub_ruta($sede,$dep,$equipo,$ruta,$sub_ruta)
    {
        $this->db->where('CCSE',$sede);
        $this->db->where('CCDD',$dep);
        $this->db->where('EQP',$equipo);
        $this->db->where('RUTA',$ruta);
        $this->db->where('SUB_R',$sub_ruta);
        $this->db->where('activo',1);        
        $q = $this->db->get('avance_campo_subrutas');
        return $q;
    }

    function get_all($sede,$dep,$equipo,$ruta,$sub_ruta)
    {
        //$sql = "select CCSE,NOM_SEDE,CCDD,NOM_DD,EQP,RUTA,SUB_R, CCPP, NOM_PP, CCDI, NOM_DI,EMP_IN,EMP_FIN
        $sql = "select *
            from avance_campo_subrutas   where CCSE = '". $sede ."'
            and CCDD = '". $dep."' and EQP =".$equipo. " and RUTA =".$ruta." and SUB_R=".$sub_ruta  ;
        $q = $this->db->query($sql);
        return $q;
    }




}
?>