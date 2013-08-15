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

    function update_sub_ruta($sede,$dep,$equipo,$ruta,$sub_ruta,$cc_ccpp,$cc_ccpp_num,$data){
        $this->db->where('COD_REG',$sede.$dep.$equipo.$ruta.$sub_ruta.$cc_ccpp.$cc_ccpp_num);
        $this->db->where('CCSE',$sede);
        $this->db->where('CCDD',$dep);
        // $this->db->where('CCPP',$prov);
        // $this->db->where('CCDI',$dist);
        $this->db->where('EQP',$equipo);
        $this->db->where('RUTA',$ruta);
        $this->db->where('SUB_R',$sub_ruta);        
        $this->db->where('CC_CCPP',$cc_ccpp);  
        $this->db->where('CC_CCPP_NUM',$cc_ccpp_num);;
        $this->db->where('activo',1);          
        $this->db->update('avance_campo_subrutas', $data);
        return $this->db->affected_rows() > 0;
    }   

    function get_fields(){ //obtiene NOMBRE de campos
        $q = $this->db->list_fields('avance_campo_subrutas');
        return $q;
    }   

    function consulta($sede,$dep,$equipo,$ruta,$sub_ruta,$cc_ccpp,$cc_ccpp_num)
    {
        $this->db->where('COD_REG',$sede.$dep.$equipo.$ruta.$sub_ruta.$cc_ccpp.$cc_ccpp_num);
        $this->db->where('CCSE',$sede);
        $this->db->where('CCDD',$dep);
        $this->db->where('EQP',$equipo);
        $this->db->where('RUTA',$ruta);
        $this->db->where('SUB_R',$sub_ruta);        
        $this->db->where('CC_CCPP',$cc_ccpp);  
        $this->db->where('CC_CCPP_NUM',$cc_ccpp_num);  
        $this->db->where('activo',1);        
        $q = $this->db->get('avance_campo_subrutas');
        return $q;
    }
    function consulta_sub_ruta($sede,$dep,$equipo,$ruta,$sub_ruta)//
    {
        $this->db->where('COD',$sede.$dep.$equipo.$ruta.$sub_ruta);
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


    // para reporte EXCEL*******************************************

        //todos lo departamentos
    function get_all_dep()
    {
        $sql = "select distinct(CCDD), DEPARTAMENTO from marco order by departamento";
        $q = $this->db->query($sql);
        return $q;
    }
        // para registro    
    function get_num_ccpp(){
        $this->db->distinct('COD_REG as TOTAL');
        $this->db->where('activo',1);
        $q = $this->db->get('avance_campo_subrutas');
        return $q;
    }

    function get_num_reg(){ //TOTAL DE CCCPP registrados (REG = 1)
        $this->db->distinct('COD_REG as TOTAL');
        $this->db->where('REG',1);
        $this->db->where('activo',1);
        $q = $this->db->get('avance_campo_subrutas');
        return $q;
    }

    function get_num_ccpp_by_dep(){
        // $this->db->distinct('COD_REG as TOTAL');
        // $this->db->select('CCDD,NOM_DD');
        // $this->db->where('activo',1);
        // $this->db->group_by('CCDD');
        // $q = $this->db->get('avance_campo_subrutas'); 
        // return $q;      

        $sql = "select count(distinct(cod_reg)) as TOTAL, CCDD,NOM_DD from avance_campo_subrutas where activo=1 group by CCDD";   
        $q = $this->db->query($sql);
        return $q;
    }

    function get_num_reg_by_dep(){
        // $this->db->distinct('COD_REG as TOTAL');
        // $this->db->select('CCDD,NOM_DD');
        // $this->db->where('REG',1);
        // $this->db->where('activo',1);
        // $this->db->group_by('CCDD');
        // $q = $this->db->get('avance_campo_subrutas');    
        // return $q;    
        $sql = "select count(distinct(cod_reg)) as TOTAL, CCDD,NOM_DD from avance_campo_subrutas where  reg=1  and activo=1 group by CCDD";   
        $q = $this->db->query($sql);
        return $q;

    }

        // para pescador
    function get_pescadores() // total de pescadores NACIONAL
    {
        $sql = "select sum(NUM_P) TOTAL from avance_campo_subrutas where activo = 1 ";
        $q = $this->db->query($sql);
        return $q;
    }    

    function get_pescadores_totales() //total de formularios
    {
        $sql =  "select  sum(P3_P) TOT_FORM,  sum(P4_P) COMPLETAS, sum(P5_P) INCOMPLETAS, sum(P6_P) RECHAZO, sum(P7_P) OTRO
                 from (select DISTINCT(COD), CCDD, NOM_DD, P3_P, P4_P, P5_P, P6_P, P7_P from avance_campo_subrutas where    activo=1 group by CCDD, COD) 
                 as sub ";

        $q = $this->db->query($sql);
        return $q;
    }

    function get_pescadores_by_dep() //total de formularios by CCDD
    {
        $sql = "select sum(NUM_P) TOTAL, CCDD, NOM_DD from avance_campo_subrutas where activo = 1 group by CCDD ";
        $q = $this->db->query($sql);
        return $q;
    }

    function get_pescadores_totales_by_dep()
    {
        $sql =  "select  sum(P3_P) TOT_FORM, CCDD, NOM_DD, sum(P4_P) COMPLETAS, sum(P5_P) INCOMPLETAS, sum(P6_P) RECHAZO, sum(P7_P) OTRO
                from (select DISTINCT(COD), CCDD, NOM_DD, P3_P, P4_P, P5_P, P6_P, P7_P from avance_campo_subrutas where    activo=1 group by CCDD, COD) 
                as sub group by CCDD";
        $q = $this->db->query($sql);
        return $q;
    }

        // para acuicultor
    function get_acuicultores() // total acuicultores NACIONAL
    {
        $sql = "select sum(NUM_A) TOTAL from avance_campo_subrutas where activo = 1 ";
        $q = $this->db->query($sql);
        return $q;
    }    

    function get_acuicultores_totales() //total de formularios
    {
        $sql =  "select  sum(P3_A) TOT_FORM,  sum(P4_A) COMPLETAS, sum(P5_A) INCOMPLETAS, sum(P6_A) RECHAZO, sum(P7_A) OTRO
                 from (select DISTINCT(COD), CCDD, NOM_DD, P3_A, P4_A, P5_A, P6_A, P7_A from avance_campo_subrutas where    activo=1 group by CCDD, COD) 
                 as sub ";

        $q = $this->db->query($sql);
        return $q;
    }

    function get_acuicultores_by_dep()
    {
        $sql = "select sum(NUM_A) TOTAL, CCDD, NOM_DD from avance_campo_subrutas where activo = 1 group by CCDD ";
        $q = $this->db->query($sql);
        return $q;
    }

    function get_acuicultores_totales_by_dep()
    {
        $sql =  "select  sum(P3_A) TOT_FORM, CCDD, NOM_DD, sum(P4_A) COMPLETAS, sum(P5_A) INCOMPLETAS, sum(P6_A) RECHAZO, sum(P7_A) OTRO
                from (select DISTINCT(COD), CCDD, NOM_DD, P3_A, P4_A, P5_A, P6_A, P7_A from avance_campo_subrutas where    activo=1 group by CCDD, COD) 
                as sub group by CCDD";
        $q = $this->db->query($sql);
        return $q;
    }

    // para comunidades ***************************************************************************************************
    function get_comunidades()
    {
        $sql = "select sum(NUM_C) TOTAL from avance_campo_subrutas where activo = 1 ";
        $q = $this->db->query($sql);
        return $q;
    }    

    function get_comunidades_totales() //total de formularios
    {
        $sql =  "select  sum(P3_C) TOT_FORM,  sum(P4_C) COMPLETAS, sum(P5_C) INCOMPLETAS, sum(P6_C) RECHAZO, sum(P7_C) OTRO
                 from (select DISTINCT(COD), CCDD, NOM_DD, P3_C, P4_C, P5_C, P6_C, P7_C from avance_campo_subrutas where    activo=1 group by CCDD, COD) 
                 as sub ";
        $q = $this->db->query($sql);
        return $q;
    }

    function get_comunidades_by_dep()
    {
        $sql = "select sum(NUM_C) TOTAL, CCDD, NOM_DD from avance_campo_subrutas where activo = 1 group by CCDD ";
        $q = $this->db->query($sql);
        return $q;
    }

    function get_comunidades_totales_by_dep()
    {
        $sql =  "select  sum(P3_C) TOT_FORM, CCDD, NOM_DD, sum(P4_C) COMPLETAS, sum(P5_C) INCOMPLETAS, sum(P6_C) RECHAZO, sum(P7_C) OTRO
                from (select DISTINCT(COD), CCDD, NOM_DD, P3_C, P4_C, P5_C, P6_C, P7_C from avance_campo_subrutas where    activo=1 group by CCDD, COD) 
                as sub group by CCDD";
        $q = $this->db->query($sql);
        return $q;
    }

    // para reporte especial avance_trabajo_campo ******************************************************************************
    function get_all_avance_trabajo_campo()//datos fijos de AVANCE_TRABAJO_cAMPO 
    {
        $q = $this->db->get('avance_trabajo_campo');
        return $q;
    }    

    function total_trab_by_odei() //total CCCPP trabajado por ODEI
    {
        $sql = "select count(distinct(cod_reg)) as TOTAL, CCSE ,COD_ODEI from avance_campo_subrutas where reg=1  and  activo=1 group by COD_ODEI";
        $q = $this->db->query($sql);
        return $q;
    }

    function total_trab_pes_by_odei() // total pescadores por ODEI
    {
        $sql = "select sum(NUM_P) TOTAL, COD_ODEI, CCDD, NOM_DD from avance_campo_subrutas where activo = 1 group by COD_ODEI ";
        $q = $this->db->query($sql);
        return $q;
    }


    function total_trab_acui_by_odei() //total acuicultores por ODEI
    {
        $sql = "select sum(NUM_A) TOTAL, COD_ODEI, CCDD, NOM_DD from avance_campo_subrutas where activo = 1 group by COD_ODEI ";
        $q = $this->db->query($sql);
        return $q;
    }

    function total_trab_pes_totales_by_odei() // total formulario pescador por ODEI
    {
        $sql =  "select  sum(P3_P) TOT_FORM, COD_ODEI, sum(P4_P) COMPLETAS, sum(P5_P) INCOMPLETAS, sum(P6_P) RECHAZO, sum(P7_P) OTRO
                 from (select DISTINCT(COD), COD_ODEI, CCDD, NOM_DD, P3_P, P4_P, P5_P, P6_P, P7_P from avance_campo_subrutas where    activo=1 group by COD_ODEI, COD) 
                 as sub group by COD_ODEI";

        $q = $this->db->query($sql);
        return $q;
    }

    function total_trab_acui_totales_by_odei() // total formulario ACUICULTOR por ODEI
    {
        $sql =  "select  sum(P3_A) TOT_FORM, COD_ODEI,  sum(P4_A) COMPLETAS, sum(P5_A) INCOMPLETAS, sum(P6_A) RECHAZO, sum(P7_A) OTRO
                 from (select DISTINCT(COD), COD_ODEI, CCDD, NOM_DD, P3_A, P4_A, P5_A, P6_A, P7_A from avance_campo_subrutas where    activo=1 group by COD_ODEI, COD) 
                 as sub group by COD_ODEI ";

        $q = $this->db->query($sql);
        return $q;
    }


    function total_trab_com_totales_by_odei() //total formulario COMUNIDADES por ODEI
    {
        $sql =  "select  sum(P3_C) TOT_FORM,COD_ODEI,  CCDD, NOM_DD, sum(P4_C) COMPLETAS, sum(P5_C) INCOMPLETAS, sum(P6_C) RECHAZO, sum(P7_C) OTRO
                from (select DISTINCT(COD), COD_ODEI, CCDD, NOM_DD, P3_C, P4_C, P5_C, P6_C, P7_C from avance_campo_subrutas where    activo=1 group by COD_ODEI, COD) 
                as sub group by COD_ODEI";
        $q = $this->db->query($sql);
        return $q;
    }


}

?>