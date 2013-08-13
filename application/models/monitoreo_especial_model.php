<?php 
/**
* 
*/
class Monitoreo_especial_model extends CI_MODEL
{


    function get_equipo($sede,$dep)
    {
        $sql =    "select distinct(equipo) from monitoreo_especial where nom_sede = (select distinct(nom_sede) from marco where sede_cod = '". $sede."')
                and departamento = (select distinct(departamento) from marco where ccdd = '". $dep ."')" ;
        $q = $this->db->query($sql);
        return $q;
    }
     function get_ruta($sede,$dep,$equipo)
    {
        $sql =    "select distinct(ruta) from monitoreo_especial where nom_sede = (select distinct(nom_sede) from marco where sede_cod = '". $sede."')
                and departamento = (select distinct(departamento) from marco where ccdd = '". $dep ."') and equipo = ". $equipo  ;
        $q = $this->db->query($sql);
        return $q;
    } 
    function get_sub_ruta($sede,$dep,$equipo,$ruta)
    {
        $sql =    "select distinct(SUB_RUTA) from monitoreo_especial where nom_sede = (select distinct(nom_sede) from marco where sede_cod = '". $sede."')
                and departamento = (select distinct(departamento) from marco where ccdd = '". $dep ."') and equipo = ". $equipo ." and ruta =" .$ruta  ;
        $q = $this->db->query($sql);
        return $q;
    }

    
    function get_all($sede,$dep,$equipo,$ruta,$sub_ruta)
    {
        $sql = "select N, NOM_SEDE, DEPARTAMENTO, EQUIPO, RUTA, SUB_RUTA, EMPADRONADOR_INICIAL,TIPO_INI ,
            (select distinct(COD_PP) from ccpp p  where   p.departamento = e.departamento and p.provincia = e.provincia   and e.distrito = p.distrito) as CCPP, e.PROVINCIA,
            (select distinct(COD_DI) from ccpp p  where   p.departamento = e.departamento and p.provincia = e.provincia   and e.distrito = p.distrito) as CCDI, e. DISTRITO
            from monitoreo_especial  e where nom_sede = (select distinct(nom_sede) from marco where sede_cod ='". $sede ."')
            and departamento = (select distinct(departamento) from marco where ccdd ='". $dep."') and equipo =".$equipo. " and ruta =".$ruta." and sub_ruta=".$sub_ruta  ;
        $q = $this->db->query($sql);
        return $q;
    }
    function get_ccpp_by_sub_ruta($sede,$dep,$equipo,$ruta,$sub_ruta)
    {
       $sql =   "select  
                ccpp_subruta_1, ccpp_subruta_2, ccpp_subruta_3  ,ccpp_subruta_4 ,ccpp_subruta_5 ,ccpp_subruta_6 ,ccpp_subruta_7,    ccpp_subruta_8, ccpp_subruta_9, 
                ccpp_subruta_10,    ccpp_subruta_11,    ccpp_subruta_12,    ccpp_subruta_13, ccpp_subruta_14,   ccpp_subruta_15,    ccpp_subruta_16,    ccpp_subruta_17,    
                ccpp_subruta_18,    ccpp_subruta_19,    ccpp_subruta_20,    ccpp_subruta_21,    ccpp_subruta_22,    ccpp_subruta_23,    ccpp_subruta_24 ,ccpp_subruta_25,
                ccpp_subruta_26 ccpp_subruta_27,    ccpp_subruta_28,    ccpp_subruta_29,    ccpp_subruta_30  FROM  monitoreo_especial 
                where nom_sede = (select distinct(nom_sede) from marco where sede_cod = '".$sede."')
                and departamento = (select distinct(departamento) from marco where ccdd = '".$dep."') and equipo = ".$equipo." and ruta = ".$ruta." and sub_ruta=".$sub_ruta ;
        $qqq = $this->db->query($sql);
        $ccpps = null;
        foreach ($qqq->result() as $value) {
            foreach ($value as $key ) {
                if ( !($key=='') ) {
                     $ccpps[] = $key;
                }                
            }
        } 
        //obtener los CENTROS POBLADOS segun la numeración de CCPPs
        $this->db->where('SEDE_COD',$sede);
        $this->db->where_in('num_centro_poblado',$ccpps);
        $p = $this->db->get('centros_poblados');
        return $p;
    }


}
?>