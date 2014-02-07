<?php 
/**
* 
*/
class Tabulados_model extends CI_MODEL
{


    //METADATA
    function get_metadata ($tipo,$preg){
        $this->db->where('tipo', $tipo);
        $this->db->where('pregunta', $preg);
        $q = $this->db->get('metadata');
        return $q;   
    }   

    function insert_metadata($d)
    {     
        $q = $this->db->insert('metadata', $d);
        return $this->db->affected_rows() > 0;
    }

    function update_metadata($tipo,$preg,$texto)
    {
        $this->db->where('tipo', $tipo);
        $this->db->where('pregunta', $preg);        
        $this->db->update('metadata', $texto);
        return $this->db->affected_rows() > 0;
    }
    //METADATA


    //TEXTO COMENTARIOS
    function get_texto ($tipo,$preg){
        $this->db->select('texto,texto_2');
        $this->db->where('tipo', $tipo);
        $this->db->where('pregunta', $preg);
        $q = $this->db->get('tabulados');
        return $q;   
    }   

    function insert_texto($d)
    {     
        $q = $this->db->insert('tabulados', $d);
        return $this->db->affected_rows() > 0;
    }

    function update_texto($tipo,$preg,$texto)
    {
        $this->db->where('tipo', $tipo);
        $this->db->where('pregunta', $preg);        
        $this->db->update('tabulados', $texto);
        return $this->db->affected_rows() > 0;
    }
    //TEXTO COMENTARIOS

    //NOMBRE GRAFICOS

    function get_nombre_mapa($cuadro)
    {
        $this->db->where('nu_cuadro',$cuadro);
        $q = $this->db->get('tabulados_nombre_mapa');
        return $q;
    }


    //NOMBRE GRAFICOS


function get_dptos (){
	$q = $this->db->query('
		select  distinct(DEPARTAMENTO), CCDD from departamentos_tab order by DEPARTAMENTO; 
    ');
    return $q;	 	
}   


    function get_nombre_tabulados()
    {
    $q = $this->db->query('
        select * from tabulados_nombre order by n; 
    ');
    return $q;
    }
    //TIPO DE GRAFICO
function get_tipo_respuesta($nu_tab){
    $this->db->select('fl_respuesta');
    $this->db->where('nu_cuadro',$nu_tab);
    $q = $this->db->get('tabulados_tipo_respuesta');
    if ($q->num_rows()==1) {
        if ($q->row('fl_respuesta') == 'UNICO' || $q->row('fl_respuesta') == 'ÚNICO') {
            return true;
        }else{
            return false;
        }
    }else{
        return false;
    }
}



/* TABULADO 01*/
// function get_report1($a = null, $b = null){
//     $this->db->select('p.CCDD,p.NOM_DD,COUNT(p.id) as num');
//     $this->db->from('pescador p');
//     if(!is_null($a)){
//     	$this->db->where('p.TAC',$a);
//     }
//     if(is_null($b)){
//     	$this->db->group_by('p.NOM_DD');
//     }
//     $q = $this->db->get();
//     return $q;
// }
function get_report1(){//( coalesce(c1.t,0) + coalesce(c2.t,0) + coalesce( C3.t,0)) TOTAL,
        /* //total de pescadores y acuicultores, incluyendo los ambos en cada uno*/
    $q = $this->db->query('
        select  DEP.CCDD, DEPARTAMENTO,   coalesce(C1.t,0) PESCADOR, (coalesce(C2.t,0) -  coalesce(C3.t,0) ) ACUICULTOR, coalesce(C3.t,0) AMBOS 
        from (select  distinct(departamento), ccdd from departamentos_tab order by departamento) as DEP
        left join (select ccdd, count(*) as t from pescador p inner join  pesc_info s on p.id = s.pescador_id where  tac=1 and res!=3 group by ccdd) as C1 on DEP.ccdd = C1.ccdd
        left join (select ccdd, count(*) as t from acu_seccion1 group by ccdd) as C2  on DEP.ccdd = C2.ccdd     
        left join (select ccdd, count(*) as t from pescador p inner join  pesc_info s on p.id = s.pescador_id where  tac=3 and res!=3 group by ccdd) as C3 on DEP.ccdd = C3.ccdd;       
                    ');
        
    // $q = $this->db->query('
    //     select  DEP.CCDD, DEPARTAMENTO, ( coalesce(c1.t,0) + coalesce(c2.t,0) ) TOTAL,  coalesce(c1.t,0) PESCADOR, (coalesce(c2.t,0)) ACUICULTOR, coalesce(C3.t,0) AMBOS
    //     from (select  distinct(departamento), ccdd from departamentos_tab order by departamento) as DEP
    //     left join (select ccdd, count(*) as t from pescador p inner join  pesc_info s on p.id = s.pescador_id  group by ccdd) as C1 on DEP.ccdd = C1.ccdd
    //     left join (select ccdd, count(*) as t from acu_seccion1 group by ccdd) as C2  on DEP.ccdd = C2.ccdd     
    //     left join (select ccdd, count(*) as t from pescador p inner join  pesc_info s on p.id = s.pescador_id where  tac=0 and res!=0 group by ccdd) as C3 on DEP.ccdd = C3.ccdd;         
    //                 ');

    return $q;
}


//S2_3
function get_report2(){
    $q = $this->db->query('
        select 
        DEP.CCDD, DEPARTAMENTO,  C0.t AS TOTAL,  
        COALESCE(C1.t,0) as HOMBRE, COALESCE(C2.t,0) as MUJER, COALESCE(C3.t,0) as NEP 
        from (select  distinct(departamento), ccdd from departamentos_tab order by departamento) as DEP 
        left join (select ccdd,  count(*) as t  from pescador a inner join pesc_seccion2 s on a.id = s.pescador_id  where S2_3 is not null group by nom_dd) as C0 on DEP.ccdd  = C0.ccdd 
        left join (select ccdd,  count(*) as t  from pescador a inner join pesc_seccion2 s on a.id = s.pescador_id  where S2_3 = 1 group by nom_dd ) as C1 on DEP.ccdd  = C1.ccdd 
        left join (select ccdd,  count(*) as t  from pescador a inner join pesc_seccion2 s on a.id = s.pescador_id  where S2_3 = 2 group by nom_dd ) as C2 on DEP.ccdd  = C2.ccdd 
        left join (select ccdd,  count(*) as t  from pescador a inner join pesc_seccion2 s on a.id = s.pescador_id  where S2_3 = 9 group by nom_dd ) as C3 on DEP.ccdd  = C3.ccdd  ;
                    ');
    return $q;
}

function get_report3(){
    $q = $this->db->query("     
        /* TABULADO N° 03 ---------------- grupo de edades ------------------------ new()*/
        select 
        DEP.CCDD, DEPARTAMENTO,  COALESCE(C0.t,0) AS TOTAL,  
        COALESCE(C1.t,0) as '8_19', COALESCE(C2.t,0) as '20_31', COALESCE(C3.t,0) as '32_43', COALESCE(C4.t,0) as '44_55', COALESCE(C5.t,0) as '56_67',
        COALESCE(C6.t,0) as '68_MAS', COALESCE(C7.t,0) as  NEP
        from (select  distinct(departamento), ccdd from departamentos_tab order by departamento) as DEP 
        left join (select ccdd,  count(*) as t  from pescador a inner join pesc_seccion2 s on a.id = s.pescador_id  where s2_2A is not null group by nom_dd ) as C0 on DEP.ccdd  = C0.ccdd 
        left join (select ccdd,  count(*) as t  from pescador a inner join pesc_seccion2 s on a.id = s.pescador_id  where s2_2A != 9999 and (2013 - s2_2A)  between 8 and 19 group by nom_dd ) as C1 on DEP.ccdd  = C1.ccdd 
        left join (select ccdd,  count(*) as t  from pescador a inner join pesc_seccion2 s on a.id = s.pescador_id  where s2_2A != 9999 and(2013 - s2_2A)  between 20 and 31 group by nom_dd ) as C2 on DEP.ccdd  = C2.ccdd 
        left join (select ccdd,  count(*) as t  from pescador a inner join pesc_seccion2 s on a.id = s.pescador_id  where s2_2A != 9999 and(2013 - s2_2A)  between 32 and 43 group by nom_dd ) as C3 on DEP.ccdd  = C3.ccdd 
        left join (select ccdd,  count(*) as t  from pescador a inner join pesc_seccion2 s on a.id = s.pescador_id  where s2_2A != 9999 and(2013 - s2_2A)  between 44 and 55 group by nom_dd  ) as C4 on DEP.ccdd  = C4.ccdd 
        left join (select ccdd,  count(*) as t  from pescador a inner join pesc_seccion2 s on a.id = s.pescador_id  where s2_2A != 9999 and(2013 - s2_2A)  between 56 and 67 group by nom_dd ) as C5 on DEP.ccdd  = C5.ccdd 
        left join (select ccdd,  count(*) as t  from pescador a inner join pesc_seccion2 s on a.id = s.pescador_id  where s2_2A != 9999 and(2013 - s2_2A)  between 68 and 98 group by nom_dd  ) as C6 on DEP.ccdd  = C6.ccdd 
        left join (select ccdd,  count(*) as t  from pescador a inner join pesc_seccion2 s on a.id = s.pescador_id  where s2_2A = 9999 group by nom_dd  ) as C7 on DEP.ccdd  = C7.ccdd ;
        ");
    return $q;
}


function get_report4(){ /* TABULADO N° 03 - lugar de nacimiento*/
	$q = $this->db->query("       
        select 
        DEP.CCDD, DEPARTAMENTO,  COALESCE(C0.t,0) AS TOTAL,  
        COALESCE(C1.t,0) as AMAZONAS, COALESCE(C2.t,0) as ANCASH, COALESCE(C3.t,0) as APURIMAC, COALESCE(C4.t,0) as AREQUIPA, COALESCE(C5.t,0) as AYACUCHO,
        COALESCE(C6.t,0) as CAJAMARCA, COALESCE(C7.t,0) as CALLAO, COALESCE(C8.t,0) as CUSCO, COALESCE(C9.t,0) as HUANCAVELICA, COALESCE(C10.t,0) as HUANUCO, COALESCE(C11.t,0) as ICA,
        COALESCE(C12.t,0) as JUNIN, COALESCE(C13.t,0) as LA_LIBERTAD, COALESCE(C14.t,0) as LAMBAYEQUE, COALESCE(C15.t,0) as LIMA, COALESCE(C16.t,0) as LORETO,
        COALESCE(C17.t,0) as MADRE_DE_DIOS, COALESCE(C18.t,0) as MOQUEGUA, COALESCE(C19.t,0) as PASCO, COALESCE(C20.t,0) as PIURA, COALESCE(C21.t,0) as PUNO,
        COALESCE(C22.t,0) as SAN_MARTIN, COALESCE(C23.t,0) as TACNA, COALESCE(C24.t,0) as TUMBES, COALESCE(C25.t,0) as UCAYALI, COALESCE(C26.t,0) as OTROS_PAISES       
        from (select  distinct(departamento), ccdd from departamentos_tab order by departamento) as DEP 
        left join (select ccdd,  count(*) as t  from pescador a inner join pesc_seccion2 s on a.id = s.pescador_id  where s2_10_dd_cod is not null   group by nom_dd) as C0 on DEP.ccdd  = C0.ccdd 
        left join (select ccdd,  count(*) as t  from pescador a inner join pesc_seccion2 s on a.id = s.pescador_id  where s2_10_dd_cod = 01 group by nom_dd ) as C1 on DEP.ccdd  = C1.ccdd 
        left join (select ccdd,  count(*) as t  from pescador a inner join pesc_seccion2 s on a.id = s.pescador_id  where s2_10_dd_cod = 02 group by nom_dd ) as C2 on DEP.ccdd  = C2.ccdd 
        left join (select ccdd,  count(*) as t  from pescador a inner join pesc_seccion2 s on a.id = s.pescador_id  where s2_10_dd_cod = 03 group by nom_dd ) as C3 on DEP.ccdd  = C3.ccdd 
        left join (select ccdd,  count(*) as t  from pescador a inner join pesc_seccion2 s on a.id = s.pescador_id  where s2_10_dd_cod = 04 group by nom_dd ) as C4 on DEP.ccdd  = C4.ccdd 
        left join (select ccdd,  count(*) as t  from pescador a inner join pesc_seccion2 s on a.id = s.pescador_id  where s2_10_dd_cod = 05 group by nom_dd ) as C5 on DEP.ccdd  = C5.ccdd 
        left join (select ccdd,  count(*) as t  from pescador a inner join pesc_seccion2 s on a.id = s.pescador_id  where s2_10_dd_cod = 06 group by nom_dd ) as C6 on DEP.ccdd  = C6.ccdd 
        left join (select ccdd,  count(*) as t  from pescador a inner join pesc_seccion2 s on a.id = s.pescador_id  where s2_10_dd_cod = 07 group by nom_dd ) as C7 on DEP.ccdd  = C7.ccdd 
        left join (select ccdd,  count(*) as t  from pescador a inner join pesc_seccion2 s on a.id = s.pescador_id  where s2_10_dd_cod = 08 group by nom_dd ) as C8 on DEP.ccdd  = C8.ccdd 
        left join (select ccdd,  count(*) as t  from pescador a inner join pesc_seccion2 s on a.id = s.pescador_id  where s2_10_dd_cod = 09 group by nom_dd ) as C9 on DEP.ccdd  = C9.ccdd 
        left join (select ccdd,  count(*) as t  from pescador a inner join pesc_seccion2 s on a.id = s.pescador_id  where s2_10_dd_cod = 10 group by nom_dd ) as C10 on DEP.ccdd  = C10.ccdd 
        left join (select ccdd,  count(*) as t  from pescador a inner join pesc_seccion2 s on a.id = s.pescador_id  where s2_10_dd_cod = 11 group by nom_dd ) as C11 on DEP.ccdd  = C11.ccdd 
        left join (select ccdd,  count(*) as t  from pescador a inner join pesc_seccion2 s on a.id = s.pescador_id  where s2_10_dd_cod = 12 group by nom_dd ) as C12 on DEP.ccdd  = C12.ccdd 
        left join (select ccdd,  count(*) as t  from pescador a inner join pesc_seccion2 s on a.id = s.pescador_id  where s2_10_dd_cod = 13 group by nom_dd ) as C13 on DEP.ccdd  = C13.ccdd 
        left join (select ccdd,  count(*) as t  from pescador a inner join pesc_seccion2 s on a.id = s.pescador_id  where s2_10_dd_cod = 14 group by nom_dd ) as C14 on DEP.ccdd  = C14.ccdd 
        left join (select ccdd,  count(*) as t  from pescador a inner join pesc_seccion2 s on a.id = s.pescador_id  where s2_10_dd_cod = 15 group by nom_dd ) as C15 on DEP.ccdd  = C15.ccdd 
        left join (select ccdd,  count(*) as t  from pescador a inner join pesc_seccion2 s on a.id = s.pescador_id  where s2_10_dd_cod = 16 group by nom_dd ) as C16 on DEP.ccdd  = C16.ccdd 
        left join (select ccdd,  count(*) as t  from pescador a inner join pesc_seccion2 s on a.id = s.pescador_id  where s2_10_dd_cod = 17 group by nom_dd ) as C17 on DEP.ccdd  = C17.ccdd 
        left join (select ccdd,  count(*) as t  from pescador a inner join pesc_seccion2 s on a.id = s.pescador_id  where s2_10_dd_cod = 18 group by nom_dd ) as C18 on DEP.ccdd  = C18.ccdd 
        left join (select ccdd,  count(*) as t  from pescador a inner join pesc_seccion2 s on a.id = s.pescador_id  where s2_10_dd_cod = 19 group by nom_dd ) as C19 on DEP.ccdd  = C19.ccdd 
        left join (select ccdd,  count(*) as t  from pescador a inner join pesc_seccion2 s on a.id = s.pescador_id  where s2_10_dd_cod = 20 group by nom_dd ) as C20 on DEP.ccdd  = C20.ccdd 
        left join (select ccdd,  count(*) as t  from pescador a inner join pesc_seccion2 s on a.id = s.pescador_id  where s2_10_dd_cod = 21 group by nom_dd ) as C21 on DEP.ccdd  = C21.ccdd 
        left join (select ccdd,  count(*) as t  from pescador a inner join pesc_seccion2 s on a.id = s.pescador_id  where s2_10_dd_cod = 22 group by nom_dd ) as C22 on DEP.ccdd  = C22.ccdd 
        left join (select ccdd,  count(*) as t  from pescador a inner join pesc_seccion2 s on a.id = s.pescador_id  where s2_10_dd_cod = 23 group by nom_dd ) as C23 on DEP.ccdd  = C23.ccdd 
        left join (select ccdd,  count(*) as t  from pescador a inner join pesc_seccion2 s on a.id = s.pescador_id  where s2_10_dd_cod = 24 group by nom_dd ) as C24 on DEP.ccdd  = C24.ccdd 
        left join (select ccdd,  count(*) as t  from pescador a inner join pesc_seccion2 s on a.id = s.pescador_id  where s2_10_dd_cod = 25 group by nom_dd ) as C25 on DEP.ccdd  = C25.ccdd 
        left join (select ccdd,  count(*) as t  from pescador a inner join pesc_seccion2 s on a.id = s.pescador_id  where s2_10_dd_cod > 25 and s2_10_dd_cod<>4028 group by nom_dd ) as C26 on DEP.ccdd  = C26.ccdd ;        
        ");
    return $q;
}

function get_report5(){/* TABULADO N° 04 - en el 2007*/
    $q = $this->db->query("       
        select 
        DEP.CCDD, DEPARTAMENTO,  COALESCE(C0.t,0) AS TOTAL,  
        COALESCE(C1.t,0) as AMAZONAS, COALESCE(C2.t,0) as ANCASH, COALESCE(C3.t,0) as APURIMAC, COALESCE(C4.t,0) as AREQUIPA, COALESCE(C5.t,0) as AYACUCHO,
        COALESCE(C6.t,0) as CAJAMARCA, COALESCE(C7.t,0) as CALLAO, COALESCE(C8.t,0) as CUSCO, COALESCE(C9.t,0) as HUANCAVELICA, COALESCE(C10.t,0) as HUANUCO, COALESCE(C11.t,0) as ICA,
        COALESCE(C12.t,0) as JUNIN, COALESCE(C13.t,0) as LA_LIBERTAD, COALESCE(C14.t,0) as LAMBAYEQUE, COALESCE(C15.t,0) as LIMA, COALESCE(C16.t,0) as LORETO,
        COALESCE(C17.t,0) as MADRE_DE_DIOS, COALESCE(C18.t,0) as MOQUEGUA, COALESCE(C19.t,0) as PASCO, COALESCE(C20.t,0) as PIURA, COALESCE(C21.t,0) as PUNO,
        COALESCE(C22.t,0) as SAN_MARTIN, COALESCE(C23.t,0) as TACNA, COALESCE(C24.t,0) as TUMBES, COALESCE(C25.t,0) as UCAYALI, COALESCE(C26.t,0) as OTROS_PAISES       
        from (select  distinct(departamento), ccdd from departamentos_tab order by departamento) as DEP 
        left join (select ccdd,  count(*) as t  from pescador a inner join pesc_seccion2 s on a.id = s.pescador_id  where s2_11_dd_cod is not null   group by nom_dd) as C0 on DEP.ccdd  = C0.ccdd 
        left join (select ccdd,  count(*) as t  from pescador a inner join pesc_seccion2 s on a.id = s.pescador_id  where s2_11_dd_cod = 01 group by nom_dd ) as C1 on DEP.ccdd  = C1.ccdd 
        left join (select ccdd,  count(*) as t  from pescador a inner join pesc_seccion2 s on a.id = s.pescador_id  where s2_11_dd_cod = 02 group by nom_dd ) as C2 on DEP.ccdd  = C2.ccdd 
        left join (select ccdd,  count(*) as t  from pescador a inner join pesc_seccion2 s on a.id = s.pescador_id  where s2_11_dd_cod = 03 group by nom_dd ) as C3 on DEP.ccdd  = C3.ccdd 
        left join (select ccdd,  count(*) as t  from pescador a inner join pesc_seccion2 s on a.id = s.pescador_id  where s2_11_dd_cod = 04 group by nom_dd ) as C4 on DEP.ccdd  = C4.ccdd 
        left join (select ccdd,  count(*) as t  from pescador a inner join pesc_seccion2 s on a.id = s.pescador_id  where s2_11_dd_cod = 05 group by nom_dd ) as C5 on DEP.ccdd  = C5.ccdd 
        left join (select ccdd,  count(*) as t  from pescador a inner join pesc_seccion2 s on a.id = s.pescador_id  where s2_11_dd_cod = 06 group by nom_dd ) as C6 on DEP.ccdd  = C6.ccdd 
        left join (select ccdd,  count(*) as t  from pescador a inner join pesc_seccion2 s on a.id = s.pescador_id  where s2_11_dd_cod = 07 group by nom_dd ) as C7 on DEP.ccdd  = C7.ccdd 
        left join (select ccdd,  count(*) as t  from pescador a inner join pesc_seccion2 s on a.id = s.pescador_id  where s2_11_dd_cod = 08 group by nom_dd ) as C8 on DEP.ccdd  = C8.ccdd 
        left join (select ccdd,  count(*) as t  from pescador a inner join pesc_seccion2 s on a.id = s.pescador_id  where s2_11_dd_cod = 09 group by nom_dd ) as C9 on DEP.ccdd  = C9.ccdd 
        left join (select ccdd,  count(*) as t  from pescador a inner join pesc_seccion2 s on a.id = s.pescador_id  where s2_11_dd_cod = 10 group by nom_dd ) as C10 on DEP.ccdd  = C10.ccdd 
        left join (select ccdd,  count(*) as t  from pescador a inner join pesc_seccion2 s on a.id = s.pescador_id  where s2_11_dd_cod = 11 group by nom_dd ) as C11 on DEP.ccdd  = C11.ccdd 
        left join (select ccdd,  count(*) as t  from pescador a inner join pesc_seccion2 s on a.id = s.pescador_id  where s2_11_dd_cod = 12 group by nom_dd ) as C12 on DEP.ccdd  = C12.ccdd 
        left join (select ccdd,  count(*) as t  from pescador a inner join pesc_seccion2 s on a.id = s.pescador_id  where s2_11_dd_cod = 13 group by nom_dd ) as C13 on DEP.ccdd  = C13.ccdd 
        left join (select ccdd,  count(*) as t  from pescador a inner join pesc_seccion2 s on a.id = s.pescador_id  where s2_11_dd_cod = 14 group by nom_dd ) as C14 on DEP.ccdd  = C14.ccdd 
        left join (select ccdd,  count(*) as t  from pescador a inner join pesc_seccion2 s on a.id = s.pescador_id  where s2_11_dd_cod = 15 group by nom_dd ) as C15 on DEP.ccdd  = C15.ccdd 
        left join (select ccdd,  count(*) as t  from pescador a inner join pesc_seccion2 s on a.id = s.pescador_id  where s2_11_dd_cod = 16 group by nom_dd ) as C16 on DEP.ccdd  = C16.ccdd 
        left join (select ccdd,  count(*) as t  from pescador a inner join pesc_seccion2 s on a.id = s.pescador_id  where s2_11_dd_cod = 17 group by nom_dd ) as C17 on DEP.ccdd  = C17.ccdd 
        left join (select ccdd,  count(*) as t  from pescador a inner join pesc_seccion2 s on a.id = s.pescador_id  where s2_11_dd_cod = 18 group by nom_dd ) as C18 on DEP.ccdd  = C18.ccdd 
        left join (select ccdd,  count(*) as t  from pescador a inner join pesc_seccion2 s on a.id = s.pescador_id  where s2_11_dd_cod = 19 group by nom_dd ) as C19 on DEP.ccdd  = C19.ccdd 
        left join (select ccdd,  count(*) as t  from pescador a inner join pesc_seccion2 s on a.id = s.pescador_id  where s2_11_dd_cod = 20 group by nom_dd ) as C20 on DEP.ccdd  = C20.ccdd 
        left join (select ccdd,  count(*) as t  from pescador a inner join pesc_seccion2 s on a.id = s.pescador_id  where s2_11_dd_cod = 21 group by nom_dd ) as C21 on DEP.ccdd  = C21.ccdd 
        left join (select ccdd,  count(*) as t  from pescador a inner join pesc_seccion2 s on a.id = s.pescador_id  where s2_11_dd_cod = 22 group by nom_dd ) as C22 on DEP.ccdd  = C22.ccdd 
        left join (select ccdd,  count(*) as t  from pescador a inner join pesc_seccion2 s on a.id = s.pescador_id  where s2_11_dd_cod = 23 group by nom_dd ) as C23 on DEP.ccdd  = C23.ccdd 
        left join (select ccdd,  count(*) as t  from pescador a inner join pesc_seccion2 s on a.id = s.pescador_id  where s2_11_dd_cod = 24 group by nom_dd ) as C24 on DEP.ccdd  = C24.ccdd 
        left join (select ccdd,  count(*) as t  from pescador a inner join pesc_seccion2 s on a.id = s.pescador_id  where s2_11_dd_cod = 25 group by nom_dd ) as C25 on DEP.ccdd  = C25.ccdd 
        left join (select ccdd,  count(*) as t  from pescador a inner join pesc_seccion2 s on a.id = s.pescador_id  where s2_11_dd_cod > 25 and s2_11_dd_cod<>4028 group by nom_dd ) as C26 on DEP.ccdd  = C26.ccdd ;  
        ");
    return $q;
}

function get_report6(){
	$q = $this->db->query("
        /* TABULADO N° 05 ---------------- NIVEL DE estudios------------------------*/
        select 
        DEP.CCDD, DEPARTAMENTO,  C0.t AS TOTAL,  
        COALESCE(C1.t,0) as SIN_NIVEL, COALESCE(C2.t,0) as INICIAL, COALESCE(C3.t,0) as PRIMARIA, COALESCE(C4.t,0) as SECUNDARIA, COALESCE(C5.t,0) as SUP_NO_UNI_INC,
        COALESCE(C6.t,0) as SUP_NO_UNI_COM, COALESCE(C7.t,0) as SUP_UNI_INC, COALESCE(C8.t,0) as SUP_UNI_COM, COALESCE(C9.t,0) NEP
        from (select  distinct(departamento), ccdd from departamentos_tab order by departamento) as DEP 
        left join (select ccdd,  count(*) as t  from pescador a inner join pesc_seccion2 s on a.id = s.pescador_id  where s2_12 is not null group by nom_dd ) as C0 on DEP.ccdd  = C0.ccdd 
        left join (select ccdd,  count(*) as t  from pescador a inner join pesc_seccion2 s on a.id = s.pescador_id  where s2_12 = 1 group by nom_dd ) as C1 on DEP.ccdd  = C1.ccdd 
        left join (select ccdd,  count(*) as t  from pescador a inner join pesc_seccion2 s on a.id = s.pescador_id  where s2_12 = 2 group by nom_dd ) as C2 on DEP.ccdd  = C2.ccdd 
        left join (select ccdd,  count(*) as t  from pescador a inner join pesc_seccion2 s on a.id = s.pescador_id  where s2_12 = 3 group by nom_dd ) as C3 on DEP.ccdd  = C3.ccdd 
        left join (select ccdd,  count(*) as t  from pescador a inner join pesc_seccion2 s on a.id = s.pescador_id  where s2_12 = 4 group by nom_dd ) as C4 on DEP.ccdd  = C4.ccdd 
        left join (select ccdd,  count(*) as t  from pescador a inner join pesc_seccion2 s on a.id = s.pescador_id  where s2_12 = 5 group by nom_dd ) as C5 on DEP.ccdd  = C5.ccdd 
        left join (select ccdd,  count(*) as t  from pescador a inner join pesc_seccion2 s on a.id = s.pescador_id  where s2_12 = 6 group by nom_dd ) as C6 on DEP.ccdd  = C6.ccdd 
        left join (select ccdd,  count(*) as t  from pescador a inner join pesc_seccion2 s on a.id = s.pescador_id  where s2_12 = 7 group by nom_dd ) as C7 on DEP.ccdd  = C7.ccdd 
        left join (select ccdd,  count(*) as t  from pescador a inner join pesc_seccion2 s on a.id = s.pescador_id  where s2_12 = 8 group by nom_dd ) as C8 on DEP.ccdd  = C8.ccdd 
        left join (select ccdd,  count(*) as t  from pescador a inner join pesc_seccion2 s on a.id = s.pescador_id  where s2_12 = 9 group by nom_dd ) as C9 on DEP.ccdd  = C9.ccdd ;
        ");
    return $q;
}

function get_report7(){
    $q = $this->db->query("
        /* TABULADO N° 06 - tipo de actividad*/
        select 
        DEP.CCDD, DEPARTAMENTO,  C0.t AS TOTAL,  
        COALESCE(C1.t,0) as SI, COALESCE(C2.t,0) as 'NO',  COALESCE(C3.t,0) NEP
        from (select  distinct(departamento), ccdd from departamentos_tab order by departamento) as DEP 
        left join (select ccdd,  count(*) as t  from pescador a inner join pesc_seccion2 s on a.id = s.pescador_id  where s2_13 is not null group by nom_dd ) as C0 on DEP.ccdd  = C0.ccdd 
        left join (select ccdd,  count(*) as t  from pescador a inner join pesc_seccion2 s on a.id = s.pescador_id  where s2_13 = 1 group by nom_dd ) as C1 on DEP.ccdd  = C1.ccdd 
        left join (select ccdd,  count(*) as t  from pescador a inner join pesc_seccion2 s on a.id = s.pescador_id  where s2_13 = 2 group by nom_dd ) as C2 on DEP.ccdd  = C2.ccdd 
        left join (select ccdd,  count(*) as t  from pescador a inner join pesc_seccion2 s on a.id = s.pescador_id  where s2_13 = 9 group by nom_dd ) as C3 on DEP.ccdd  = C3.ccdd ;
        ");
    return $q;
}


function get_report8(){
    $q = $this->db->query("
        /* TABULADO N° 07 - OTRO ACTIVIDAD*/
        select 
        DEP.CCDD, DEPARTAMENTO,  C0.t AS TOTAL,  
        COALESCE(C1.t,0) as AGRICOLA, COALESCE(C2.t,0) as PECUARIA, COALESCE(C3.t,0) as PESCA, COALESCE(C4.t,0) as CAZA, COALESCE(C5.t,0) as CONSTRUCCION,
        COALESCE(C6.t,0) as COMERCIO, COALESCE(C7.t,0) as OTRO, COALESCE(C8.t,0) as NO_TIENE, COALESCE(C9.t,0) NEP
        from (select  distinct(departamento), ccdd from departamentos_tab order by departamento) as DEP 
        left join (select ccdd,  count(*) as t  from pescador a inner join pesc_seccion2 s on a.id = s.pescador_id  where s2_14_1 is not null group by nom_dd ) as C0 on DEP.ccdd  = C0.ccdd 
        left join (select ccdd,  count(*) as t  from pescador a inner join pesc_seccion2 s on a.id = s.pescador_id  where s2_14_1 = 1 group by nom_dd ) as C1 on DEP.ccdd  = C1.ccdd 
        left join (select ccdd,  count(*) as t  from pescador a inner join pesc_seccion2 s on a.id = s.pescador_id  where s2_14_2 = 1 group by nom_dd ) as C2 on DEP.ccdd  = C2.ccdd 
        left join (select ccdd,  count(*) as t  from pescador a inner join pesc_seccion2 s on a.id = s.pescador_id  where s2_14_3 = 1 group by nom_dd ) as C3 on DEP.ccdd  = C3.ccdd 
        left join (select ccdd,  count(*) as t  from pescador a inner join pesc_seccion2 s on a.id = s.pescador_id  where s2_14_4 = 1 group by nom_dd ) as C4 on DEP.ccdd  = C4.ccdd 
        left join (select ccdd,  count(*) as t  from pescador a inner join pesc_seccion2 s on a.id = s.pescador_id  where s2_14_5 = 1 group by nom_dd ) as C5 on DEP.ccdd  = C5.ccdd 
        left join (select ccdd,  count(*) as t  from pescador a inner join pesc_seccion2 s on a.id = s.pescador_id  where s2_14_6 = 1 group by nom_dd ) as C6 on DEP.ccdd  = C6.ccdd 
        left join (select ccdd,  count(*) as t  from pescador a inner join pesc_seccion2 s on a.id = s.pescador_id  where s2_14_7 = 1 group by nom_dd ) as C7 on DEP.ccdd  = C7.ccdd 
        left join (select ccdd,  count(*) as t  from pescador a inner join pesc_seccion2 s on a.id = s.pescador_id  where s2_14_8 = 1 group by nom_dd ) as C8 on DEP.ccdd  = C8.ccdd 
        left join (select ccdd,  count(*) as t  from pescador a inner join pesc_seccion2 s on a.id = s.pescador_id  where s2_14_8 = 9 group by nom_dd ) as C9 on DEP.ccdd  = C9.ccdd ;
        ");
    return $q;
}


function get_report9(){
    $q = $this->db->query("
        /* TABULADO N° 08 ------------------------RAZON DE ELECCION  --------------------------------------*/
        select 
        DEP.CCDD, DEPARTAMENTO,  C0.t AS TOTAL,  
        COALESCE(C1.t,0) as T_FAMILIAR, COALESCE(C2.t,0) as P_DESARROLLO, COALESCE(C3.t,0) as N_ECONOMICA, COALESCE(C4.t,0) as AFICCION, COALESCE(C5.t,0) OTRO, COALESCE(C6.t,0) NEP
        from (select  distinct(departamento), ccdd from departamentos_tab order by departamento) as DEP 
        left join (select ccdd,  count(*) as t  from pescador a inner join pesc_seccion2 s on a.id = s.pescador_id  where s2_15 is not null group by nom_dd ) as C0 on DEP.ccdd  = C0.ccdd 
        left join (select ccdd,  count(*) as t  from pescador a inner join pesc_seccion2 s on a.id = s.pescador_id  where s2_15 = 1 group by nom_dd ) as C1 on DEP.ccdd  = C1.ccdd 
        left join (select ccdd,  count(*) as t  from pescador a inner join pesc_seccion2 s on a.id = s.pescador_id  where s2_15 = 2 group by nom_dd ) as C2 on DEP.ccdd  = C2.ccdd 
        left join (select ccdd,  count(*) as t  from pescador a inner join pesc_seccion2 s on a.id = s.pescador_id  where s2_15 = 3 group by nom_dd ) as C3 on DEP.ccdd  = C3.ccdd 
        left join (select ccdd,  count(*) as t  from pescador a inner join pesc_seccion2 s on a.id = s.pescador_id  where s2_15 = 4 group by nom_dd ) as C4 on DEP.ccdd  = C4.ccdd 
        left join (select ccdd,  count(*) as t  from pescador a inner join pesc_seccion2 s on a.id = s.pescador_id  where s2_15 = 5 group by nom_dd ) as C5 on DEP.ccdd  = C5.ccdd 
        left join (select ccdd,  count(*) as t  from pescador a inner join pesc_seccion2 s on a.id = s.pescador_id  where s2_15 = 9 group by nom_dd ) as C6 on DEP.ccdd  = C6.ccdd ;
        ");
    return $q;
}

function get_report10(){
    $q = $this->db->query("
        /* TABULADO N° 09 ------------------------AÑOS DE ACTIVIDAD  --------------------------------------*/
        select 
        DEP.CCDD, DEPARTAMENTO,  C0.t AS TOTAL,  
        COALESCE(C1.t,0) as '0_1', COALESCE(C2.t,0) as '2_5', COALESCE(C3.t,0) as '6_10', COALESCE(C4.t,0) as MAS_10, COALESCE(C5.t,0) NEP
        from (select  distinct(departamento), ccdd from departamentos_tab order by departamento) as DEP 
        left join (select ccdd,  count(*) as t  from pescador a inner join pesc_seccion2 s on a.id = s.pescador_id  where s2_16 is not null group by nom_dd ) as C0 on DEP.ccdd  = C0.ccdd 
        left join (select ccdd,  count(*) as t  from pescador a inner join pesc_seccion2 s on a.id = s.pescador_id  where s2_16 = 1 group by nom_dd ) as C1 on DEP.ccdd  = C1.ccdd 
        left join (select ccdd,  count(*) as t  from pescador a inner join pesc_seccion2 s on a.id = s.pescador_id  where s2_16 = 2 group by nom_dd ) as C2 on DEP.ccdd  = C2.ccdd 
        left join (select ccdd,  count(*) as t  from pescador a inner join pesc_seccion2 s on a.id = s.pescador_id  where s2_16 = 3 group by nom_dd ) as C3 on DEP.ccdd  = C3.ccdd 
        left join (select ccdd,  count(*) as t  from pescador a inner join pesc_seccion2 s on a.id = s.pescador_id  where s2_16 = 4 group by nom_dd ) as C4 on DEP.ccdd  = C4.ccdd 
        left join (select ccdd,  count(*) as t  from pescador a inner join pesc_seccion2 s on a.id = s.pescador_id  where s2_16 = 9 group by nom_dd ) as C5 on DEP.ccdd  = C5.ccdd ;
        ");
    return $q;
}


function get_report11(){
    $q = $this->db->query("
        /* TABULADO N° 10  ------------------------ PROGRAMA SOCIAL  --------------------------------------*/
        select 
        DEP.CCDD, DEPARTAMENTO,  C0.t AS TOTAL,  
        COALESCE(C1.t,0) as V_LECHE, COALESCE(C2.t,0) as C_POPULAR, COALESCE(C3.t,0) as QALI_WARMA, COALESCE(C4.t,0) as SIS, COALESCE(C5.t,0) as P_JUNTOS,
        COALESCE(C6.t,0) as P_65, COALESCE(C7.t,0) as CUNA_MAS, COALESCE(C8.t,0) as FISE, COALESCE(C9.t,0) TECHO_DIGNO, COALESCE(C10.t,0) OTRO, COALESCE(C11.t,0) NINGUNO, COALESCE(C12.t,0) NEP
        from (select  distinct(departamento), ccdd from departamentos_tab order by departamento) as DEP 
        left join (select ccdd,  count(*) as t  from pescador a inner join pesc_seccion2 s on a.id = s.pescador_id  where s2_17_1 is not null group by nom_dd ) as C0 on DEP.ccdd  = C0.ccdd 
        left join (select ccdd,  count(*) as t  from pescador a inner join pesc_seccion2 s on a.id = s.pescador_id  where s2_17_1 = 1 group by nom_dd ) as C1 on DEP.ccdd  = C1.ccdd 
        left join (select ccdd,  count(*) as t  from pescador a inner join pesc_seccion2 s on a.id = s.pescador_id  where s2_17_2 = 1 group by nom_dd ) as C2 on DEP.ccdd  = C2.ccdd 
        left join (select ccdd,  count(*) as t  from pescador a inner join pesc_seccion2 s on a.id = s.pescador_id  where s2_17_3 = 1 group by nom_dd ) as C3 on DEP.ccdd  = C3.ccdd 
        left join (select ccdd,  count(*) as t  from pescador a inner join pesc_seccion2 s on a.id = s.pescador_id  where s2_17_4 = 1 group by nom_dd ) as C4 on DEP.ccdd  = C4.ccdd 
        left join (select ccdd,  count(*) as t  from pescador a inner join pesc_seccion2 s on a.id = s.pescador_id  where s2_17_5 = 1 group by nom_dd ) as C5 on DEP.ccdd  = C5.ccdd 
        left join (select ccdd,  count(*) as t  from pescador a inner join pesc_seccion2 s on a.id = s.pescador_id  where s2_17_6 = 1 group by nom_dd ) as C6 on DEP.ccdd  = C6.ccdd 
        left join (select ccdd,  count(*) as t  from pescador a inner join pesc_seccion2 s on a.id = s.pescador_id  where s2_17_7 = 1 group by nom_dd ) as C7 on DEP.ccdd  = C7.ccdd 
        left join (select ccdd,  count(*) as t  from pescador a inner join pesc_seccion2 s on a.id = s.pescador_id  where s2_17_8 = 1 group by nom_dd ) as C8 on DEP.ccdd  = C8.ccdd 
        left join (select ccdd,  count(*) as t  from pescador a inner join pesc_seccion2 s on a.id = s.pescador_id  where s2_17_9 = 1 group by nom_dd ) as C9 on DEP.ccdd  = C9.ccdd 
        left join (select ccdd,  count(*) as t  from pescador a inner join pesc_seccion2 s on a.id = s.pescador_id  where s2_17_10 = 1 group by nom_dd ) as C10 on DEP.ccdd  = C10.ccdd 
        left join (select ccdd,  count(*) as t  from pescador a inner join pesc_seccion2 s on a.id = s.pescador_id  where s2_17_11 = 1 group by nom_dd ) as C11 on DEP.ccdd  = C11.ccdd 
        left join (select ccdd,  count(*) as t  from pescador a inner join pesc_seccion2 s on a.id = s.pescador_id  where s2_17_11 = 9 group by nom_dd ) as C12 on DEP.ccdd  = C12.ccdd ;
        ");
    return $q;
}

function get_report12(){
    $q = $this->db->query("
        /* TABULADO N° 11  ------------------------ ESTADO CIVIL  --------------------------------------*/
        select 
        DEP.CCDD, DEPARTAMENTO,  C0.t AS TOTAL,  
        COALESCE(C1.t,0) as CONVIVIENTE, COALESCE(C2.t,0) as CASADO, COALESCE(C3.t,0) as SEPARADO, COALESCE(C4.t,0) as VIUDO, COALESCE(C5.t,0) as DIVORCIADO,
        COALESCE(C6.t,0) as SOLTERO, COALESCE(C7.t,0) NEP
        from (select  distinct(departamento), ccdd from departamentos_tab order by departamento) as DEP 
        left join (select ccdd,  count(*) as t  from pescador a inner join pesc_seccion2 s on a.id = s.pescador_id  where s2_18 is not null group by nom_dd ) as C0 on DEP.ccdd  = C0.ccdd 
        left join (select ccdd,  count(*) as t  from pescador a inner join pesc_seccion2 s on a.id = s.pescador_id  where s2_18 = 1 group by nom_dd ) as C1 on DEP.ccdd  = C1.ccdd 
        left join (select ccdd,  count(*) as t  from pescador a inner join pesc_seccion2 s on a.id = s.pescador_id  where s2_18 = 2 group by nom_dd ) as C2 on DEP.ccdd  = C2.ccdd 
        left join (select ccdd,  count(*) as t  from pescador a inner join pesc_seccion2 s on a.id = s.pescador_id  where s2_18 = 3 group by nom_dd ) as C3 on DEP.ccdd  = C3.ccdd 
        left join (select ccdd,  count(*) as t  from pescador a inner join pesc_seccion2 s on a.id = s.pescador_id  where s2_18 = 4 group by nom_dd ) as C4 on DEP.ccdd  = C4.ccdd 
        left join (select ccdd,  count(*) as t  from pescador a inner join pesc_seccion2 s on a.id = s.pescador_id  where s2_18 = 5 group by nom_dd ) as C5 on DEP.ccdd  = C5.ccdd 
        left join (select ccdd,  count(*) as t  from pescador a inner join pesc_seccion2 s on a.id = s.pescador_id  where s2_18 = 6 group by nom_dd ) as C6 on DEP.ccdd  = C6.ccdd 
        left join (select ccdd,  count(*) as t  from pescador a inner join pesc_seccion2 s on a.id = s.pescador_id  where s2_18 = 9 group by nom_dd ) as C7 on DEP.ccdd  = C7.ccdd;
        ");
    return $q;
}


function get_report13(){
    $q = $this->db->query("
        /* TABULADO N° 12 ---------------- NIVEL DE estudios CONYUGUE------------------------*/
        select 
        DEP.CCDD, DEPARTAMENTO,  C0.t AS TOTAL,  
        COALESCE(C1.t,0) as SIN_NIVEL, COALESCE(C2.t,0) as INICIAL, COALESCE(C3.t,0) as PRIMARIA, COALESCE(C4.t,0) as SECUNDARIA, COALESCE(C5.t,0) as SUP_NO_UNI_INC,
        COALESCE(C6.t,0) as SUP_NO_UNI_COM, COALESCE(C7.t,0) as SUP_UNI_INC, COALESCE(C8.t,0) as SUP_UNI_COM, COALESCE(C9.t,0) NEP
        from (select  distinct(departamento), ccdd from departamentos_tab order by departamento) as DEP 
        left join (select ccdd,  count(*) as t  from pescador a inner join pesc_seccion2 s on a.id = s.pescador_id  where s2_19 is not null group by nom_dd ) as C0 on DEP.ccdd  = C0.ccdd 
        left join (select ccdd,  count(*) as t  from pescador a inner join pesc_seccion2 s on a.id = s.pescador_id  where s2_19 = 1 group by nom_dd ) as C1 on DEP.ccdd  = C1.ccdd 
        left join (select ccdd,  count(*) as t  from pescador a inner join pesc_seccion2 s on a.id = s.pescador_id  where s2_19 = 2 group by nom_dd ) as C2 on DEP.ccdd  = C2.ccdd 
        left join (select ccdd,  count(*) as t  from pescador a inner join pesc_seccion2 s on a.id = s.pescador_id  where s2_19 = 3 group by nom_dd ) as C3 on DEP.ccdd  = C3.ccdd 
        left join (select ccdd,  count(*) as t  from pescador a inner join pesc_seccion2 s on a.id = s.pescador_id  where s2_19 = 4 group by nom_dd ) as C4 on DEP.ccdd  = C4.ccdd 
        left join (select ccdd,  count(*) as t  from pescador a inner join pesc_seccion2 s on a.id = s.pescador_id  where s2_19 = 5 group by nom_dd ) as C5 on DEP.ccdd  = C5.ccdd 
        left join (select ccdd,  count(*) as t  from pescador a inner join pesc_seccion2 s on a.id = s.pescador_id  where s2_19 = 6 group by nom_dd ) as C6 on DEP.ccdd  = C6.ccdd 
        left join (select ccdd,  count(*) as t  from pescador a inner join pesc_seccion2 s on a.id = s.pescador_id  where s2_19 = 7 group by nom_dd ) as C7 on DEP.ccdd  = C7.ccdd 
        left join (select ccdd,  count(*) as t  from pescador a inner join pesc_seccion2 s on a.id = s.pescador_id  where s2_19 = 8 group by nom_dd ) as C8 on DEP.ccdd  = C8.ccdd 
        left join (select ccdd,  count(*) as t  from pescador a inner join pesc_seccion2 s on a.id = s.pescador_id  where s2_19 = 9 group by nom_dd ) as C9 on DEP.ccdd  = C9.ccdd ;
        ");
    return $q;
}

function get_report14(){
    $q = $this->db->query("
        /* TABULADO N° 13  ------------------------ OTRA ACTIVIDAD DEL CONYUGUE  --------------------------------------*/
        select 
        DEP.CCDD, DEPARTAMENTO,  C0.t AS TOTAL,  
        COALESCE(C1.t,0) as C_HOGAR, COALESCE(C2.t,0) as AGRICOLA, COALESCE(C3.t,0) as PECUARIA, COALESCE(C4.t,0) as ACUICOLA, COALESCE(C5.t,0) as PESCA,
        COALESCE(C6.t,0) as CAZA, COALESCE(C7.t,0) CONSTRUCCION, COALESCE(C8.t,0) COMERCIO, COALESCE(C9.t,0) OTRO, COALESCE(C10.t,0) NEP
        from (select  distinct(departamento), ccdd from departamentos_tab order by departamento) as DEP 
        left join (select ccdd,  count(*) as t  from pescador a inner join pesc_seccion2 s on a.id = s.pescador_id  where s2_20_1 is not null group by nom_dd ) as C0 on DEP.ccdd  = C0.ccdd 
        left join (select ccdd,  count(*) as t  from pescador a inner join pesc_seccion2 s on a.id = s.pescador_id  where s2_20_1 = 1 group by nom_dd ) as C1 on DEP.ccdd  = C1.ccdd 
        left join (select ccdd,  count(*) as t  from pescador a inner join pesc_seccion2 s on a.id = s.pescador_id  where s2_20_2 = 1 group by nom_dd ) as C2 on DEP.ccdd  = C2.ccdd 
        left join (select ccdd,  count(*) as t  from pescador a inner join pesc_seccion2 s on a.id = s.pescador_id  where s2_20_3 = 1 group by nom_dd ) as C3 on DEP.ccdd  = C3.ccdd 
        left join (select ccdd,  count(*) as t  from pescador a inner join pesc_seccion2 s on a.id = s.pescador_id  where s2_20_4 = 1 group by nom_dd ) as C4 on DEP.ccdd  = C4.ccdd 
        left join (select ccdd,  count(*) as t  from pescador a inner join pesc_seccion2 s on a.id = s.pescador_id  where s2_20_5 = 1 group by nom_dd ) as C5 on DEP.ccdd  = C5.ccdd 
        left join (select ccdd,  count(*) as t  from pescador a inner join pesc_seccion2 s on a.id = s.pescador_id  where s2_20_6 = 1 group by nom_dd ) as C6 on DEP.ccdd  = C6.ccdd 
        left join (select ccdd,  count(*) as t  from pescador a inner join pesc_seccion2 s on a.id = s.pescador_id  where s2_20_7 = 1 group by nom_dd ) as C7 on DEP.ccdd  = C7.ccdd
        left join (select ccdd,  count(*) as t  from pescador a inner join pesc_seccion2 s on a.id = s.pescador_id  where s2_20_8 = 1 group by nom_dd ) as C8 on DEP.ccdd  = C8.ccdd
        left join (select ccdd,  count(*) as t  from pescador a inner join pesc_seccion2 s on a.id = s.pescador_id  where s2_20_9 = 1 group by nom_dd ) as C9 on DEP.ccdd  = C9.ccdd
        left join (select ccdd,  count(*) as t  from pescador a inner join pesc_seccion2 s on a.id = s.pescador_id  where s2_20_9 = 9 group by nom_dd ) as C10 on DEP.ccdd  = C10.ccdd;
        ");
    return $q;
}


function get_report15(){
    $q = $this->db->query("
        /* TABULADO N° 14 ------------------- TENENCIA DE HIJOS -------------------------------*/
        select 
        DEP.CCDD, DEPARTAMENTO,  C0.t AS TOTAL,  
        COALESCE(C1.t,0) as SI, COALESCE(C2.t,0) as 'NO',  COALESCE(C3.t,0) NEP
        from (select  distinct(departamento), ccdd from departamentos_tab order by departamento) as DEP 
        left join (select ccdd,  count(*) as t  from pescador a inner join pesc_seccion2 s on a.id = s.pescador_id  where s2_21 is not null group by nom_dd ) as C0 on DEP.ccdd  = C0.ccdd 
        left join (select ccdd,  count(*) as t  from pescador a inner join pesc_seccion2 s on a.id = s.pescador_id  where s2_21 = 1 group by nom_dd ) as C1 on DEP.ccdd  = C1.ccdd 
        left join (select ccdd,  count(*) as t  from pescador a inner join pesc_seccion2 s on a.id = s.pescador_id  where s2_21 = 2 group by nom_dd ) as C2 on DEP.ccdd  = C2.ccdd 
        left join (select ccdd,  count(*) as t  from pescador a inner join pesc_seccion2 s on a.id = s.pescador_id  where s2_21 = 9 group by nom_dd ) as C3 on DEP.ccdd  = C3.ccdd ;
        ");
    return $q;
}

function get_report16(){
    $q = $this->db->query("
        /* TABULADO N° 15  ------------------------ NUMERO DE HIJOS  --------------------------------------*/
        select 
        DEP.CCDD, DEPARTAMENTO,  C0.t AS TOTAL,  
        COALESCE(C1.t,0) as '1_hijos', COALESCE(C2.t,0) as '2_hijos', COALESCE(C3.t,0) as '3_hijos', COALESCE(C4.t,0) as '4_hijos', COALESCE(C5.t,0) as '5_hijos',
        COALESCE(C6.t,0) as '6_hijos', COALESCE(C7.t,0) '7_hijos', COALESCE(C8.t,0) '8_hijos', COALESCE(C9.t,0) '9_hijos', COALESCE(C10.t,0) '10_mas', COALESCE(C11.t,0) NEP
        from (select  distinct(departamento), ccdd from departamentos_tab order by departamento) as DEP 
        left join (select ccdd,  count(*) as t  from pescador a inner join pesc_seccion2 s on a.id = s.pescador_id  where s2_22 is not null group by nom_dd ) as C0 on DEP.ccdd  = C0.ccdd 
        left join (select ccdd,  count(*) as t  from pescador a inner join pesc_seccion2 s on a.id = s.pescador_id  where s2_22 = 1 group by nom_dd ) as C1 on DEP.ccdd  = C1.ccdd 
        left join (select ccdd,  count(*) as t  from pescador a inner join pesc_seccion2 s on a.id = s.pescador_id  where s2_22 = 2 group by nom_dd ) as C2 on DEP.ccdd  = C2.ccdd 
        left join (select ccdd,  count(*) as t  from pescador a inner join pesc_seccion2 s on a.id = s.pescador_id  where s2_22 = 3 group by nom_dd ) as C3 on DEP.ccdd  = C3.ccdd 
        left join (select ccdd,  count(*) as t  from pescador a inner join pesc_seccion2 s on a.id = s.pescador_id  where s2_22 = 4 group by nom_dd ) as C4 on DEP.ccdd  = C4.ccdd 
        left join (select ccdd,  count(*) as t  from pescador a inner join pesc_seccion2 s on a.id = s.pescador_id  where s2_22 = 5 group by nom_dd ) as C5 on DEP.ccdd  = C5.ccdd 
        left join (select ccdd,  count(*) as t  from pescador a inner join pesc_seccion2 s on a.id = s.pescador_id  where s2_22 = 6 group by nom_dd ) as C6 on DEP.ccdd  = C6.ccdd 
        left join (select ccdd,  count(*) as t  from pescador a inner join pesc_seccion2 s on a.id = s.pescador_id  where s2_22 = 7 group by nom_dd ) as C7 on DEP.ccdd  = C7.ccdd
        left join (select ccdd,  count(*) as t  from pescador a inner join pesc_seccion2 s on a.id = s.pescador_id  where s2_22 = 8 group by nom_dd ) as C8 on DEP.ccdd  = C8.ccdd
        left join (select ccdd,  count(*) as t  from pescador a inner join pesc_seccion2 s on a.id = s.pescador_id  where s2_22 = 9 group by nom_dd ) as C9 on DEP.ccdd  = C9.ccdd
        left join (select ccdd,  count(*) as t  from pescador a inner join pesc_seccion2 s on a.id = s.pescador_id  where s2_22 >= 10 AND s2_22 <99 group by nom_dd ) as C10 on DEP.ccdd  = C10.ccdd
        left join (select ccdd,  count(*) as t  from pescador a inner join pesc_seccion2 s on a.id = s.pescador_id  where s2_22 = 99 group by nom_dd ) as C11 on DEP.ccdd  = C11.ccdd;
        ");
    return $q;
}

function get_report17(){
    $q = $this->db->query("
        /* TABULADO N° 16  ------------------------ SEXO DE HIJOS  --------------------------------------*/
        select 
        DEP.CCDD, DEPARTAMENTO, ( COALESCE(C1.t,0) + COALESCE(C2.t,0) + COALESCE(C3.t,0) +  COALESCE(C4.t,0) +  COALESCE(C5.t,0) +  
        COALESCE(C6.t,0) + COALESCE(C7.t,0) + COALESCE(C8.t,0) +  COALESCE(C9.t,0)  + COALESCE(C10.t,0) +
        COALESCE(C11.t,0) + COALESCE(C12.t,0) + COALESCE(C13.t,0) + COALESCE(C14.t,0) + COALESCE(C15.t,0) +
        COALESCE(C16.t,0) + COALESCE(C17.t,0) + COALESCE(C18.t,0) + COALESCE(C19.t,0) + COALESCE(C20.t,0) +
        COALESCE(C21.t,0) + COALESCE(C22.t,0) + COALESCE(C23.t,0) + COALESCE(C24.t,0) + COALESCE(C25.t,0) +
        COALESCE(C26.t,0) + COALESCE(C27.t,0) + COALESCE(C28.t,0) + COALESCE(C29.t,0) + COALESCE(C30.t,0)   ) AS TOTAL,
        ( COALESCE(C1.t,0) + COALESCE(C2.t,0) + COALESCE(C3.t,0) +  COALESCE(C4.t,0) +  COALESCE(C5.t,0) +  
        COALESCE(C6.t,0) + COALESCE(C7.t,0) + COALESCE(C8.t,0) +  COALESCE(C9.t,0)  + COALESCE(C10.t,0) ) as HOMBRE,  
        (COALESCE(C11.t,0) + COALESCE(C12.t,0) + COALESCE(C13.t,0) + COALESCE(C14.t,0) + COALESCE(C15.t,0) +
        COALESCE(C16.t,0) + COALESCE(C17.t,0) + COALESCE(C18.t,0) + COALESCE(C19.t,0) + COALESCE(C20.t,0)  ) AS MUJER,  
        (COALESCE(C21.t,0) + COALESCE(C22.t,0) + COALESCE(C23.t,0) + COALESCE(C24.t,0) + COALESCE(C25.t,0) +
        COALESCE(C26.t,0) + COALESCE(C27.t,0) + COALESCE(C28.t,0) + COALESCE(C29.t,0) + COALESCE(C30.t,0)  ) AS NEP
        from (select  distinct(departamento), ccdd from departamentos_tab order by departamento) as DEP 
        left join (select ccdd,  count(*) as t  from pescador c inner join pesc_seccion2 s on c.id = s.pescador_id  where s2_23_3_1 = 1 group by nom_dd) as C1 on DEP.ccdd  = C1.ccdd 
        left join (select ccdd,  count(*) as t  from pescador c inner join pesc_seccion2 s on c.id = s.pescador_id  where s2_23_3_2 = 1 group by nom_dd) as C2 on DEP.ccdd  = C2.ccdd 
        left join (select ccdd,  count(*) as t  from pescador c inner join pesc_seccion2 s on c.id = s.pescador_id  where s2_23_3_3 = 1 group by nom_dd) as C3 on DEP.ccdd  = C3.ccdd
        left join (select ccdd,  count(*) as t  from pescador c inner join pesc_seccion2 s on c.id = s.pescador_id  where s2_23_3_4 = 1 group by nom_dd) as C4 on DEP.ccdd  = C4.ccdd  
        left join (select ccdd,  count(*) as t  from pescador c inner join pesc_seccion2 s on c.id = s.pescador_id  where s2_23_3_5 = 1 group by nom_dd) as C5 on DEP.ccdd  = C5.ccdd  
        left join (select ccdd,  count(*) as t  from pescador c inner join pesc_seccion2 s on c.id = s.pescador_id  where s2_23_3_6 = 1 group by nom_dd) as C6 on DEP.ccdd  = C6.ccdd  
        left join (select ccdd,  count(*) as t  from pescador c inner join pesc_seccion2 s on c.id = s.pescador_id  where s2_23_3_7 = 1 group by nom_dd) as C7 on DEP.ccdd  = C7.ccdd  
        left join (select ccdd,  count(*) as t  from pescador c inner join pesc_seccion2 s on c.id = s.pescador_id  where s2_23_3_8 = 1 group by nom_dd) as C8 on DEP.ccdd  = C8.ccdd  
        left join (select ccdd,  count(*) as t  from pescador c inner join pesc_seccion2 s on c.id = s.pescador_id  where s2_23_3_9 = 1 group by nom_dd) as C9 on DEP.ccdd  = C9.ccdd  
        left join (select ccdd,  count(*) as t  from pescador c inner join pesc_seccion2 s on c.id = s.pescador_id  where s2_23_3_10 = 1 group by nom_dd) as C10 on DEP.ccdd  = C10.ccdd  
        left join (select ccdd,  count(*) as t  from pescador c inner join pesc_seccion2 s on c.id = s.pescador_id  where s2_23_3_1 = 2 group by nom_dd) as C11 on DEP.ccdd  = C11.ccdd 
        left join (select ccdd,  count(*) as t  from pescador c inner join pesc_seccion2 s on c.id = s.pescador_id  where s2_23_3_2 = 2 group by nom_dd) as C12 on DEP.ccdd  = C12.ccdd 
        left join (select ccdd,  count(*) as t  from pescador c inner join pesc_seccion2 s on c.id = s.pescador_id  where s2_23_3_3 = 2 group by nom_dd) as C13 on DEP.ccdd  = C13.ccdd
        left join (select ccdd,  count(*) as t  from pescador c inner join pesc_seccion2 s on c.id = s.pescador_id  where s2_23_3_4 = 2 group by nom_dd) as C14 on DEP.ccdd  = C14.ccdd  
        left join (select ccdd,  count(*) as t  from pescador c inner join pesc_seccion2 s on c.id = s.pescador_id  where s2_23_3_5 = 2 group by nom_dd) as C15 on DEP.ccdd  = C15.ccdd  
        left join (select ccdd,  count(*) as t  from pescador c inner join pesc_seccion2 s on c.id = s.pescador_id  where s2_23_3_6 = 2 group by nom_dd) as C16 on DEP.ccdd  = C16.ccdd  
        left join (select ccdd,  count(*) as t  from pescador c inner join pesc_seccion2 s on c.id = s.pescador_id  where s2_23_3_7 = 2 group by nom_dd) as C17 on DEP.ccdd  = C17.ccdd  
        left join (select ccdd,  count(*) as t  from pescador c inner join pesc_seccion2 s on c.id = s.pescador_id  where s2_23_3_8 = 2 group by nom_dd) as C18 on DEP.ccdd  = C18.ccdd  
        left join (select ccdd,  count(*) as t  from pescador c inner join pesc_seccion2 s on c.id = s.pescador_id  where s2_23_3_9 = 2 group by nom_dd) as C19 on DEP.ccdd  = C19.ccdd  
        left join (select ccdd,  count(*) as t  from pescador c inner join pesc_seccion2 s on c.id = s.pescador_id  where s2_23_3_10 = 2 group by nom_dd) as C20 on DEP.ccdd  = C20.ccdd 
        left join (select ccdd,  count(*) as t  from pescador c inner join pesc_seccion2 s on c.id = s.pescador_id  where s2_23_3_1 = 9 group by nom_dd) as C21 on DEP.ccdd  = C21.ccdd 
        left join (select ccdd,  count(*) as t  from pescador c inner join pesc_seccion2 s on c.id = s.pescador_id  where s2_23_3_2 = 9 group by nom_dd) as C22 on DEP.ccdd  = C22.ccdd 
        left join (select ccdd,  count(*) as t  from pescador c inner join pesc_seccion2 s on c.id = s.pescador_id  where s2_23_3_3 = 9 group by nom_dd) as C23 on DEP.ccdd  = C23.ccdd
        left join (select ccdd,  count(*) as t  from pescador c inner join pesc_seccion2 s on c.id = s.pescador_id  where s2_23_3_4 = 9 group by nom_dd) as C24 on DEP.ccdd  = C24.ccdd  
        left join (select ccdd,  count(*) as t  from pescador c inner join pesc_seccion2 s on c.id = s.pescador_id  where s2_23_3_5 = 9 group by nom_dd) as C25 on DEP.ccdd  = C25.ccdd  
        left join (select ccdd,  count(*) as t  from pescador c inner join pesc_seccion2 s on c.id = s.pescador_id  where s2_23_3_6 = 9 group by nom_dd) as C26 on DEP.ccdd  = C26.ccdd  
        left join (select ccdd,  count(*) as t  from pescador c inner join pesc_seccion2 s on c.id = s.pescador_id  where s2_23_3_7 = 9 group by nom_dd) as C27 on DEP.ccdd  = C27.ccdd  
        left join (select ccdd,  count(*) as t  from pescador c inner join pesc_seccion2 s on c.id = s.pescador_id  where s2_23_3_8 = 9 group by nom_dd) as C28 on DEP.ccdd  = C28.ccdd  
        left join (select ccdd,  count(*) as t  from pescador c inner join pesc_seccion2 s on c.id = s.pescador_id  where s2_23_3_9 = 9 group by nom_dd) as C29 on DEP.ccdd  = C29.ccdd  
        left join (select ccdd,  count(*) as t  from pescador c inner join pesc_seccion2 s on c.id = s.pescador_id  where s2_23_3_10 = 9 group by nom_dd) as C30 on DEP.ccdd  = C30.ccdd  ;
        ");
    return $q;
}

function get_report18(){
    $q = $this->db->query("
        /* TABULADO N° 17  ------------------------ EDAD DE HIJOS  --------------------------------------*/
        SELECT  table1.CCDD, table1.DEPARTAMENTO, (MENOS_1 + 1_5 + 6_10 +  11_15 + 16_20 + MAS_20 + NEP) as TOTAL, MENOS_1,1_5, 6_10, 11_15, 16_20, MAS_20, NEP FROM
        (select 
        DEP.CCDD, DEPARTAMENTO, ( COALESCE(C1.t,0) + COALESCE(C2.t,0) + COALESCE(C3.t,0) +  COALESCE(C4.t,0) +  COALESCE(C5.t,0) +  
        COALESCE(C6.t,0) + COALESCE(C7.t,0) + COALESCE(C8.t,0) +  COALESCE(C9.t,0)  + COALESCE(C10.t,0)  ) AS MENOS_1
        from (select  distinct(departamento), ccdd from departamentos_tab order by departamento) as DEP 
        left join (select ccdd,  count(*) as t  from pescador c inner join pesc_seccion2 s on c.id = s.pescador_id  where s2_23_4_1a = 0 and s2_23_4_1m is not null group by nom_dd) as C1 on DEP.ccdd  = C1.ccdd 
        left join (select ccdd,  count(*) as t  from pescador c inner join pesc_seccion2 s on c.id = s.pescador_id  where s2_23_4_2a = 0 and s2_23_4_2m is not null group by nom_dd) as C2 on DEP.ccdd  = C2.ccdd 
        left join (select ccdd,  count(*) as t  from pescador c inner join pesc_seccion2 s on c.id = s.pescador_id  where s2_23_4_3a = 0 and s2_23_4_3m is not null group by nom_dd) as C3 on DEP.ccdd  = C3.ccdd
        left join (select ccdd,  count(*) as t  from pescador c inner join pesc_seccion2 s on c.id = s.pescador_id  where s2_23_4_4a = 0 and s2_23_4_4m is not null group by nom_dd) as C4 on DEP.ccdd  = C4.ccdd  
        left join (select ccdd,  count(*) as t  from pescador c inner join pesc_seccion2 s on c.id = s.pescador_id  where s2_23_4_5a = 0 and s2_23_4_5m is not null group by nom_dd) as C5 on DEP.ccdd  = C5.ccdd  
        left join (select ccdd,  count(*) as t  from pescador c inner join pesc_seccion2 s on c.id = s.pescador_id  where s2_23_4_6a = 0 and s2_23_4_6m is not null group by nom_dd) as C6 on DEP.ccdd  = C6.ccdd  
        left join (select ccdd,  count(*) as t  from pescador c inner join pesc_seccion2 s on c.id = s.pescador_id  where s2_23_4_7a = 0 and s2_23_4_7m is not null group by nom_dd) as C7 on DEP.ccdd  = C7.ccdd  
        left join (select ccdd,  count(*) as t  from pescador c inner join pesc_seccion2 s on c.id = s.pescador_id  where s2_23_4_8a = 0 and s2_23_4_8m is not null group by nom_dd) as C8 on DEP.ccdd  = C8.ccdd  
        left join (select ccdd,  count(*) as t  from pescador c inner join pesc_seccion2 s on c.id = s.pescador_id  where s2_23_4_9a = 0 and s2_23_4_9m is not null group by nom_dd) as C9 on DEP.ccdd  = C9.ccdd  
        left join (select ccdd,  count(*) as t  from pescador c inner join pesc_seccion2 s on c.id = s.pescador_id  where s2_23_4_10a = 0 and s2_23_4_10m is not null group by nom_dd) as C10 on DEP.ccdd  = C10.ccdd  ) as table1 
        inner join 
        (select 
        DEP.CCDD, DEPARTAMENTO, ( COALESCE(C11.t,0) + COALESCE(C12.t,0) + COALESCE(C13.t,0) +  COALESCE(C14.t,0) +  COALESCE(C15.t,0) +  
        COALESCE(C16.t,0) + COALESCE(C17.t,0) + COALESCE(C18.t,0) +  COALESCE(C19.t,0)  + COALESCE(C20.t,0) ) as '1_5' 
        from (select  distinct(departamento), ccdd from departamentos_tab order by departamento) as DEP 
        left join (select ccdd,  count(*) as t  from pescador c inner join pesc_seccion2 s on c.id = s.pescador_id  where s2_23_4_1a between 1 and 5 group by nom_dd) as C11 on DEP.ccdd  = C11.ccdd 
        left join (select ccdd,  count(*) as t  from pescador c inner join pesc_seccion2 s on c.id = s.pescador_id  where s2_23_4_2a between 1 and 5 group by nom_dd) as C12 on DEP.ccdd  = C12.ccdd 
        left join (select ccdd,  count(*) as t  from pescador c inner join pesc_seccion2 s on c.id = s.pescador_id  where s2_23_4_3a between 1 and 5 group by nom_dd) as C13 on DEP.ccdd  = C13.ccdd
        left join (select ccdd,  count(*) as t  from pescador c inner join pesc_seccion2 s on c.id = s.pescador_id  where s2_23_4_4a between 1 and 5 group by nom_dd) as C14 on DEP.ccdd  = C14.ccdd  
        left join (select ccdd,  count(*) as t  from pescador c inner join pesc_seccion2 s on c.id = s.pescador_id  where s2_23_4_5a between 1 and 5 group by nom_dd) as C15 on DEP.ccdd  = C15.ccdd  
        left join (select ccdd,  count(*) as t  from pescador c inner join pesc_seccion2 s on c.id = s.pescador_id  where s2_23_4_6a between 1 and 5 group by nom_dd) as C16 on DEP.ccdd  = C16.ccdd  
        left join (select ccdd,  count(*) as t  from pescador c inner join pesc_seccion2 s on c.id = s.pescador_id  where s2_23_4_7a between 1 and 5 group by nom_dd) as C17 on DEP.ccdd  = C17.ccdd  
        left join (select ccdd,  count(*) as t  from pescador c inner join pesc_seccion2 s on c.id = s.pescador_id  where s2_23_4_8a between 1 and 5 group by nom_dd) as C18 on DEP.ccdd  = C18.ccdd  
        left join (select ccdd,  count(*) as t  from pescador c inner join pesc_seccion2 s on c.id = s.pescador_id  where s2_23_4_9a between 1 and 5 group by nom_dd) as C19 on DEP.ccdd  = C19.ccdd  
        left join (select ccdd,  count(*) as t  from pescador c inner join pesc_seccion2 s on c.id = s.pescador_id  where s2_23_4_10a between 1 and 5 group by nom_dd) as C20 on DEP.ccdd  = C20.ccdd ) as table2
        on table1.ccdd = table2.ccdd
        INNER JOIN 
        (select 
        DEP.CCDD, DEPARTAMENTO, (COALESCE(C21.t,0) + COALESCE(C22.t,0) + COALESCE(C23.t,0) + COALESCE(C24.t,0) + COALESCE(C25.t,0) +
        COALESCE(C26.t,0) + COALESCE(C27.t,0) + COALESCE(C28.t,0) + COALESCE(C29.t,0) + COALESCE(C30.t,0)  ) AS '6_10'
        from (select  distinct(departamento), ccdd from departamentos_tab order by departamento) as DEP 
        left join (select ccdd,  count(*) as t  from pescador c inner join pesc_seccion2 s on c.id = s.pescador_id  where s2_23_4_1a between 6 and 10 group by nom_dd) as C21 on DEP.ccdd  = C21.ccdd 
        left join (select ccdd,  count(*) as t  from pescador c inner join pesc_seccion2 s on c.id = s.pescador_id  where s2_23_4_2a between 6 and 10 group by nom_dd) as C22 on DEP.ccdd  = C22.ccdd 
        left join (select ccdd,  count(*) as t  from pescador c inner join pesc_seccion2 s on c.id = s.pescador_id  where s2_23_4_3a between 6 and 10 group by nom_dd) as C23 on DEP.ccdd  = C23.ccdd 
        left join (select ccdd,  count(*) as t  from pescador c inner join pesc_seccion2 s on c.id = s.pescador_id  where s2_23_4_4a between 6 and 10 group by nom_dd) as C24 on DEP.ccdd  = C24.ccdd  
        left join (select ccdd,  count(*) as t  from pescador c inner join pesc_seccion2 s on c.id = s.pescador_id  where s2_23_4_5a between 6 and 10 group by nom_dd) as C25 on DEP.ccdd  = C25.ccdd  
        left join (select ccdd,  count(*) as t  from pescador c inner join pesc_seccion2 s on c.id = s.pescador_id  where s2_23_4_6a between 6 and 10 group by nom_dd) as C26 on DEP.ccdd  = C26.ccdd  
        left join (select ccdd,  count(*) as t  from pescador c inner join pesc_seccion2 s on c.id = s.pescador_id  where s2_23_4_7a between 6 and 10 group by nom_dd) as C27 on DEP.ccdd  = C27.ccdd  
        left join (select ccdd,  count(*) as t  from pescador c inner join pesc_seccion2 s on c.id = s.pescador_id  where s2_23_4_8a between 6 and 10 group by nom_dd) as C28 on DEP.ccdd  = C28.ccdd  
        left join (select ccdd,  count(*) as t  from pescador c inner join pesc_seccion2 s on c.id = s.pescador_id  where s2_23_4_9a between 6 and 10 group by nom_dd) as C29 on DEP.ccdd  = C29.ccdd  
        left join (select ccdd,  count(*) as t  from pescador c inner join pesc_seccion2 s on c.id = s.pescador_id  where s2_23_4_10a between 6 and 10 group by nom_dd) as C30 on DEP.ccdd  = C30.ccdd ) as table3
        on table1.ccdd = table3.ccdd
        INNER JOIN 
        (select 
        DEP.CCDD, DEPARTAMENTO, (COALESCE(C31.t,0) + COALESCE(C32.t,0) + COALESCE(C33.t,0) + COALESCE(C34.t,0) + COALESCE(C35.t,0) +
        COALESCE(C36.t,0) + COALESCE(C37.t,0) + COALESCE(C38.t,0) + COALESCE(C39.t,0) + COALESCE(C40.t,0)  ) AS '11_15'  
        from (select  distinct(departamento), ccdd from departamentos_tab order by departamento) as DEP 
        left join (select ccdd,  count(*) as t  from pescador c inner join pesc_seccion2 s on c.id = s.pescador_id  where s2_23_4_1a between 11 and 15 group by nom_dd) as C31 on DEP.ccdd  = C31.ccdd 
        left join (select ccdd,  count(*) as t  from pescador c inner join pesc_seccion2 s on c.id = s.pescador_id  where s2_23_4_2a between 11 and 15 group by nom_dd) as C32 on DEP.ccdd  = C32.ccdd 
        left join (select ccdd,  count(*) as t  from pescador c inner join pesc_seccion2 s on c.id = s.pescador_id  where s2_23_4_3a between 11 and 15 group by nom_dd) as C33 on DEP.ccdd  = C33.ccdd 
        left join (select ccdd,  count(*) as t  from pescador c inner join pesc_seccion2 s on c.id = s.pescador_id  where s2_23_4_4a between 11 and 15 group by nom_dd) as C34 on DEP.ccdd  = C34.ccdd  
        left join (select ccdd,  count(*) as t  from pescador c inner join pesc_seccion2 s on c.id = s.pescador_id  where s2_23_4_5a between 11 and 15 group by nom_dd) as C35 on DEP.ccdd  = C35.ccdd  
        left join (select ccdd,  count(*) as t  from pescador c inner join pesc_seccion2 s on c.id = s.pescador_id  where s2_23_4_6a between 11 and 15 group by nom_dd) as C36 on DEP.ccdd  = C36.ccdd  
        left join (select ccdd,  count(*) as t  from pescador c inner join pesc_seccion2 s on c.id = s.pescador_id  where s2_23_4_7a between 11 and 15 group by nom_dd) as C37 on DEP.ccdd  = C37.ccdd  
        left join (select ccdd,  count(*) as t  from pescador c inner join pesc_seccion2 s on c.id = s.pescador_id  where s2_23_4_8a between 11 and 15 group by nom_dd) as C38 on DEP.ccdd  = C38.ccdd  
        left join (select ccdd,  count(*) as t  from pescador c inner join pesc_seccion2 s on c.id = s.pescador_id  where s2_23_4_9a between 11 and 15 group by nom_dd) as C39 on DEP.ccdd  = C39.ccdd  
        left join (select ccdd,  count(*) as t  from pescador c inner join pesc_seccion2 s on c.id = s.pescador_id  where s2_23_4_10a between 11 and 15 group by nom_dd) as C40 on DEP.ccdd  = C40.ccdd ) as table4
        on table1.ccdd = table4.ccdd
        INNER JOIN 
        (select 
        DEP.CCDD, DEPARTAMENTO, (COALESCE(C41.t,0) + COALESCE(C42.t,0) + COALESCE(C43.t,0) + COALESCE(C44.t,0) + COALESCE(C45.t,0) +
        COALESCE(C46.t,0) + COALESCE(C47.t,0) + COALESCE(C48.t,0) + COALESCE(C49.t,0) + COALESCE(C50.t,0)  ) AS '16_20'
        from (select  distinct(departamento), ccdd from departamentos_tab order by departamento) as DEP 
        left join (select ccdd,  count(*) as t  from pescador c inner join pesc_seccion2 s on c.id = s.pescador_id  where s2_23_4_1a between 16 and 20 group by nom_dd) as C41 on DEP.ccdd  = C41.ccdd 
        left join (select ccdd,  count(*) as t  from pescador c inner join pesc_seccion2 s on c.id = s.pescador_id  where s2_23_4_2a between 16 and 20 group by nom_dd) as C42 on DEP.ccdd  = C42.ccdd 
        left join (select ccdd,  count(*) as t  from pescador c inner join pesc_seccion2 s on c.id = s.pescador_id  where s2_23_4_3a between 16 and 20 group by nom_dd) as C43 on DEP.ccdd  = C43.ccdd 
        left join (select ccdd,  count(*) as t  from pescador c inner join pesc_seccion2 s on c.id = s.pescador_id  where s2_23_4_4a between 16 and 20 group by nom_dd) as C44 on DEP.ccdd  = C44.ccdd  
        left join (select ccdd,  count(*) as t  from pescador c inner join pesc_seccion2 s on c.id = s.pescador_id  where s2_23_4_5a between 16 and 20 group by nom_dd) as C45 on DEP.ccdd  = C45.ccdd  
        left join (select ccdd,  count(*) as t  from pescador c inner join pesc_seccion2 s on c.id = s.pescador_id  where s2_23_4_6a between 16 and 20 group by nom_dd) as C46 on DEP.ccdd  = C46.ccdd  
        left join (select ccdd,  count(*) as t  from pescador c inner join pesc_seccion2 s on c.id = s.pescador_id  where s2_23_4_7a between 16 and 20 group by nom_dd) as C47 on DEP.ccdd  = C47.ccdd  
        left join (select ccdd,  count(*) as t  from pescador c inner join pesc_seccion2 s on c.id = s.pescador_id  where s2_23_4_8a between 16 and 20 group by nom_dd) as C48 on DEP.ccdd  = C48.ccdd  
        left join (select ccdd,  count(*) as t  from pescador c inner join pesc_seccion2 s on c.id = s.pescador_id  where s2_23_4_9a between 16 and 20 group by nom_dd) as C49 on DEP.ccdd  = C49.ccdd  
        left join (select ccdd,  count(*) as t  from pescador c inner join pesc_seccion2 s on c.id = s.pescador_id  where s2_23_4_10a between 16 and 20 group by nom_dd) as C50 on DEP.ccdd  = C50.ccdd) as table5
        on table1.ccdd = table5.ccdd
        INNER JOIN 
        (select 
        DEP.CCDD, DEPARTAMENTO, (COALESCE(C51.t,0) + COALESCE(C52.t,0) + COALESCE(C53.t,0) + COALESCE(C54.t,0) + COALESCE(C55.t,0) +
        COALESCE(C56.t,0) + COALESCE(C57.t,0) + COALESCE(C58.t,0) + COALESCE(C59.t,0) + COALESCE(C60.t,0)  ) AS MAS_20
        from (select  distinct(departamento), ccdd from departamentos_tab order by departamento) as DEP 
        left join (select ccdd,  count(*) as t  from pescador c inner join pesc_seccion2 s on c.id = s.pescador_id  where s2_23_4_1a between 21 and 98 group by nom_dd) as C51 on DEP.ccdd  = C51.ccdd 
        left join (select ccdd,  count(*) as t  from pescador c inner join pesc_seccion2 s on c.id = s.pescador_id  where s2_23_4_2a between 21 and 98 group by nom_dd) as C52 on DEP.ccdd  = C52.ccdd 
        left join (select ccdd,  count(*) as t  from pescador c inner join pesc_seccion2 s on c.id = s.pescador_id  where s2_23_4_3a between 21 and 98 group by nom_dd) as C53 on DEP.ccdd  = C53.ccdd 
        left join (select ccdd,  count(*) as t  from pescador c inner join pesc_seccion2 s on c.id = s.pescador_id  where s2_23_4_4a between 21 and 98 group by nom_dd) as C54 on DEP.ccdd  = C54.ccdd  
        left join (select ccdd,  count(*) as t  from pescador c inner join pesc_seccion2 s on c.id = s.pescador_id  where s2_23_4_5a between 21 and 98 group by nom_dd) as C55 on DEP.ccdd  = C55.ccdd  
        left join (select ccdd,  count(*) as t  from pescador c inner join pesc_seccion2 s on c.id = s.pescador_id  where s2_23_4_6a between 21 and 98 group by nom_dd) as C56 on DEP.ccdd  = C56.ccdd  
        left join (select ccdd,  count(*) as t  from pescador c inner join pesc_seccion2 s on c.id = s.pescador_id  where s2_23_4_7a between 21 and 98 group by nom_dd) as C57 on DEP.ccdd  = C57.ccdd  
        left join (select ccdd,  count(*) as t  from pescador c inner join pesc_seccion2 s on c.id = s.pescador_id  where s2_23_4_8a between 21 and 98 group by nom_dd) as C58 on DEP.ccdd  = C58.ccdd  
        left join (select ccdd,  count(*) as t  from pescador c inner join pesc_seccion2 s on c.id = s.pescador_id  where s2_23_4_9a between 21 and 98 group by nom_dd) as C59 on DEP.ccdd  = C59.ccdd  
        left join (select ccdd,  count(*) as t  from pescador c inner join pesc_seccion2 s on c.id = s.pescador_id  where s2_23_4_10a between 21 and 98 group by nom_dd) as C60 on DEP.ccdd  = C60.ccdd ) as table6
        on table1.ccdd = table6.ccdd
        INNER JOIN 
        (select 
        DEP.CCDD, DEPARTAMENTO, (COALESCE(C61.t,0) + COALESCE(C62.t,0) + COALESCE(C63.t,0) + COALESCE(C64.t,0) + COALESCE(C65.t,0) +
        COALESCE(C66.t,0) + COALESCE(C67.t,0) + COALESCE(C68.t,0) + COALESCE(C69.t,0) + COALESCE(C70.t,0)  )  NEP 
        from (select  distinct(departamento), ccdd from departamentos_tab order by departamento) as DEP 
        left join (select ccdd,  count(*) as t  from pescador c inner join pesc_seccion2 s on c.id = s.pescador_id  where s2_23_4_1a = 99 group by nom_dd) as C61 on DEP.ccdd  = C61.ccdd 
        left join (select ccdd,  count(*) as t  from pescador c inner join pesc_seccion2 s on c.id = s.pescador_id  where s2_23_4_2a = 99 group by nom_dd) as C62 on DEP.ccdd  = C62.ccdd 
        left join (select ccdd,  count(*) as t  from pescador c inner join pesc_seccion2 s on c.id = s.pescador_id  where s2_23_4_3a = 99 group by nom_dd) as C63 on DEP.ccdd  = C63.ccdd 
        left join (select ccdd,  count(*) as t  from pescador c inner join pesc_seccion2 s on c.id = s.pescador_id  where s2_23_4_4a = 99 group by nom_dd) as C64 on DEP.ccdd  = C64.ccdd  
        left join (select ccdd,  count(*) as t  from pescador c inner join pesc_seccion2 s on c.id = s.pescador_id  where s2_23_4_5a = 99 group by nom_dd) as C65 on DEP.ccdd  = C65.ccdd  
        left join (select ccdd,  count(*) as t  from pescador c inner join pesc_seccion2 s on c.id = s.pescador_id  where s2_23_4_6a = 99 group by nom_dd) as C66 on DEP.ccdd  = C66.ccdd  
        left join (select ccdd,  count(*) as t  from pescador c inner join pesc_seccion2 s on c.id = s.pescador_id  where s2_23_4_7a = 99 group by nom_dd) as C67 on DEP.ccdd  = C67.ccdd  
        left join (select ccdd,  count(*) as t  from pescador c inner join pesc_seccion2 s on c.id = s.pescador_id  where s2_23_4_8a = 99 group by nom_dd) as C68 on DEP.ccdd  = C68.ccdd  
        left join (select ccdd,  count(*) as t  from pescador c inner join pesc_seccion2 s on c.id = s.pescador_id  where s2_23_4_9a = 99 group by nom_dd) as C69 on DEP.ccdd  = C69.ccdd  
        left join (select ccdd,  count(*) as t  from pescador c inner join pesc_seccion2 s on c.id = s.pescador_id  where s2_23_4_10a = 99 group by nom_dd) as C70 on DEP.ccdd  = C70.ccdd ) AS table7
        on table1.ccdd = table7.ccdd;
        ");
    return $q;
}

function get_report19(){
    $q = $this->db->query("
        /* TABULADO N° 18  ------------------------ HIJOS VIVEN CON PESCADOR  --------------------------------------*/
        select 
        DEP.CCDD, DEPARTAMENTO, ( COALESCE(C1.t,0) + COALESCE(C2.t,0) + COALESCE(C3.t,0) +  COALESCE(C4.t,0) +  COALESCE(C5.t,0) +  
        COALESCE(C6.t,0) + COALESCE(C7.t,0) + COALESCE(C8.t,0) +  COALESCE(C9.t,0)  + COALESCE(C10.t,0) +
        COALESCE(C11.t,0) + COALESCE(C12.t,0) + COALESCE(C13.t,0) + COALESCE(C14.t,0) + COALESCE(C15.t,0) +
        COALESCE(C16.t,0) + COALESCE(C17.t,0) + COALESCE(C18.t,0) + COALESCE(C19.t,0) + COALESCE(C20.t,0) +
        COALESCE(C21.t,0) + COALESCE(C22.t,0) + COALESCE(C23.t,0) + COALESCE(C24.t,0) + COALESCE(C25.t,0) +
        COALESCE(C26.t,0) + COALESCE(C27.t,0) + COALESCE(C28.t,0) + COALESCE(C29.t,0) + COALESCE(C30.t,0)   ) AS TOTAL,
        ( COALESCE(C1.t,0) + COALESCE(C2.t,0) + COALESCE(C3.t,0) +  COALESCE(C4.t,0) +  COALESCE(C5.t,0) +  
        COALESCE(C6.t,0) + COALESCE(C7.t,0) + COALESCE(C8.t,0) +  COALESCE(C9.t,0)  + COALESCE(C10.t,0) ) as 'SI',  
        (COALESCE(C11.t,0) + COALESCE(C12.t,0) + COALESCE(C13.t,0) + COALESCE(C14.t,0) + COALESCE(C15.t,0) +
        COALESCE(C16.t,0) + COALESCE(C17.t,0) + COALESCE(C18.t,0) + COALESCE(C19.t,0) + COALESCE(C20.t,0)  ) AS 'NO',  
        (COALESCE(C21.t,0) + COALESCE(C22.t,0) + COALESCE(C23.t,0) + COALESCE(C24.t,0) + COALESCE(C25.t,0) +
        COALESCE(C26.t,0) + COALESCE(C27.t,0) + COALESCE(C28.t,0) + COALESCE(C29.t,0) + COALESCE(C30.t,0)  ) AS NEP
        from (select  distinct(departamento), ccdd from departamentos_tab order by departamento) as DEP 
        left join (select ccdd,  count(*) as t  from pescador c inner join pesc_seccion2 s on c.id = s.pescador_id  where s2_23_5_1 = 1 group by nom_dd) as C1 on DEP.ccdd  = C1.ccdd 
        left join (select ccdd,  count(*) as t  from pescador c inner join pesc_seccion2 s on c.id = s.pescador_id  where s2_23_5_2 = 1 group by nom_dd) as C2 on DEP.ccdd  = C2.ccdd 
        left join (select ccdd,  count(*) as t  from pescador c inner join pesc_seccion2 s on c.id = s.pescador_id  where s2_23_5_3 = 1 group by nom_dd) as C3 on DEP.ccdd  = C3.ccdd
        left join (select ccdd,  count(*) as t  from pescador c inner join pesc_seccion2 s on c.id = s.pescador_id  where s2_23_5_4 = 1 group by nom_dd) as C4 on DEP.ccdd  = C4.ccdd  
        left join (select ccdd,  count(*) as t  from pescador c inner join pesc_seccion2 s on c.id = s.pescador_id  where s2_23_5_5 = 1 group by nom_dd) as C5 on DEP.ccdd  = C5.ccdd  
        left join (select ccdd,  count(*) as t  from pescador c inner join pesc_seccion2 s on c.id = s.pescador_id  where s2_23_5_6 = 1 group by nom_dd) as C6 on DEP.ccdd  = C6.ccdd  
        left join (select ccdd,  count(*) as t  from pescador c inner join pesc_seccion2 s on c.id = s.pescador_id  where s2_23_5_7 = 1 group by nom_dd) as C7 on DEP.ccdd  = C7.ccdd  
        left join (select ccdd,  count(*) as t  from pescador c inner join pesc_seccion2 s on c.id = s.pescador_id  where s2_23_5_8 = 1 group by nom_dd) as C8 on DEP.ccdd  = C8.ccdd  
        left join (select ccdd,  count(*) as t  from pescador c inner join pesc_seccion2 s on c.id = s.pescador_id  where s2_23_5_9 = 1 group by nom_dd) as C9 on DEP.ccdd  = C9.ccdd  
        left join (select ccdd,  count(*) as t  from pescador c inner join pesc_seccion2 s on c.id = s.pescador_id  where s2_23_5_10 = 1 group by nom_dd) as C10 on DEP.ccdd  = C10.ccdd  
        left join (select ccdd,  count(*) as t  from pescador c inner join pesc_seccion2 s on c.id = s.pescador_id  where s2_23_5_1 = 2 group by nom_dd) as C11 on DEP.ccdd  = C11.ccdd 
        left join (select ccdd,  count(*) as t  from pescador c inner join pesc_seccion2 s on c.id = s.pescador_id  where s2_23_5_2 = 2 group by nom_dd) as C12 on DEP.ccdd  = C12.ccdd 
        left join (select ccdd,  count(*) as t  from pescador c inner join pesc_seccion2 s on c.id = s.pescador_id  where s2_23_5_3 = 2 group by nom_dd) as C13 on DEP.ccdd  = C13.ccdd
        left join (select ccdd,  count(*) as t  from pescador c inner join pesc_seccion2 s on c.id = s.pescador_id  where s2_23_5_4 = 2 group by nom_dd) as C14 on DEP.ccdd  = C14.ccdd  
        left join (select ccdd,  count(*) as t  from pescador c inner join pesc_seccion2 s on c.id = s.pescador_id  where s2_23_5_5 = 2 group by nom_dd) as C15 on DEP.ccdd  = C15.ccdd  
        left join (select ccdd,  count(*) as t  from pescador c inner join pesc_seccion2 s on c.id = s.pescador_id  where s2_23_5_6 = 2 group by nom_dd) as C16 on DEP.ccdd  = C16.ccdd  
        left join (select ccdd,  count(*) as t  from pescador c inner join pesc_seccion2 s on c.id = s.pescador_id  where s2_23_5_7 = 2 group by nom_dd) as C17 on DEP.ccdd  = C17.ccdd  
        left join (select ccdd,  count(*) as t  from pescador c inner join pesc_seccion2 s on c.id = s.pescador_id  where s2_23_5_8 = 2 group by nom_dd) as C18 on DEP.ccdd  = C18.ccdd  
        left join (select ccdd,  count(*) as t  from pescador c inner join pesc_seccion2 s on c.id = s.pescador_id  where s2_23_5_9 = 2 group by nom_dd) as C19 on DEP.ccdd  = C19.ccdd  
        left join (select ccdd,  count(*) as t  from pescador c inner join pesc_seccion2 s on c.id = s.pescador_id  where s2_23_5_10 = 2 group by nom_dd) as C20 on DEP.ccdd  = C20.ccdd 
        left join (select ccdd,  count(*) as t  from pescador c inner join pesc_seccion2 s on c.id = s.pescador_id  where s2_23_5_1 = 9 group by nom_dd) as C21 on DEP.ccdd  = C21.ccdd 
        left join (select ccdd,  count(*) as t  from pescador c inner join pesc_seccion2 s on c.id = s.pescador_id  where s2_23_5_2 = 9 group by nom_dd) as C22 on DEP.ccdd  = C22.ccdd 
        left join (select ccdd,  count(*) as t  from pescador c inner join pesc_seccion2 s on c.id = s.pescador_id  where s2_23_5_3 = 9 group by nom_dd) as C23 on DEP.ccdd  = C23.ccdd
        left join (select ccdd,  count(*) as t  from pescador c inner join pesc_seccion2 s on c.id = s.pescador_id  where s2_23_5_4 = 9 group by nom_dd) as C24 on DEP.ccdd  = C24.ccdd  
        left join (select ccdd,  count(*) as t  from pescador c inner join pesc_seccion2 s on c.id = s.pescador_id  where s2_23_5_5 = 9 group by nom_dd) as C25 on DEP.ccdd  = C25.ccdd  
        left join (select ccdd,  count(*) as t  from pescador c inner join pesc_seccion2 s on c.id = s.pescador_id  where s2_23_5_6 = 9 group by nom_dd) as C26 on DEP.ccdd  = C26.ccdd  
        left join (select ccdd,  count(*) as t  from pescador c inner join pesc_seccion2 s on c.id = s.pescador_id  where s2_23_5_7 = 9 group by nom_dd) as C27 on DEP.ccdd  = C27.ccdd  
        left join (select ccdd,  count(*) as t  from pescador c inner join pesc_seccion2 s on c.id = s.pescador_id  where s2_23_5_8 = 9 group by nom_dd) as C28 on DEP.ccdd  = C28.ccdd  
        left join (select ccdd,  count(*) as t  from pescador c inner join pesc_seccion2 s on c.id = s.pescador_id  where s2_23_5_9 = 9 group by nom_dd) as C29 on DEP.ccdd  = C29.ccdd  
        left join (select ccdd,  count(*) as t  from pescador c inner join pesc_seccion2 s on c.id = s.pescador_id  where s2_23_5_10 = 9 group by nom_dd) as C30 on DEP.ccdd  = C30.ccdd  ;
        ");
    return $q;
}

function get_report20(){
    $q = $this->db->query("
        /* TABULADO N° 19  ------------------------ HIJOS  DEPENDEN DEL PESCADOR  --------------------------------------*/
        select 
        DEP.CCDD, DEPARTAMENTO, ( COALESCE(C1.t,0) + COALESCE(C2.t,0) + COALESCE(C3.t,0) +  COALESCE(C4.t,0) +  COALESCE(C5.t,0) +  
        COALESCE(C6.t,0) + COALESCE(C7.t,0) + COALESCE(C8.t,0) +  COALESCE(C9.t,0)  + COALESCE(C10.t,0) +
        COALESCE(C11.t,0) + COALESCE(C12.t,0) + COALESCE(C13.t,0) + COALESCE(C14.t,0) + COALESCE(C15.t,0) +
        COALESCE(C16.t,0) + COALESCE(C17.t,0) + COALESCE(C18.t,0) + COALESCE(C19.t,0) + COALESCE(C20.t,0) +
        COALESCE(C21.t,0) + COALESCE(C22.t,0) + COALESCE(C23.t,0) + COALESCE(C24.t,0) + COALESCE(C25.t,0) +
        COALESCE(C26.t,0) + COALESCE(C27.t,0) + COALESCE(C28.t,0) + COALESCE(C29.t,0) + COALESCE(C30.t,0)   ) AS TOTAL,
        ( COALESCE(C1.t,0) + COALESCE(C2.t,0) + COALESCE(C3.t,0) +  COALESCE(C4.t,0) +  COALESCE(C5.t,0) +  
        COALESCE(C6.t,0) + COALESCE(C7.t,0) + COALESCE(C8.t,0) +  COALESCE(C9.t,0)  + COALESCE(C10.t,0) ) as 'SI',  
        (COALESCE(C11.t,0) + COALESCE(C12.t,0) + COALESCE(C13.t,0) + COALESCE(C14.t,0) + COALESCE(C15.t,0) +
        COALESCE(C16.t,0) + COALESCE(C17.t,0) + COALESCE(C18.t,0) + COALESCE(C19.t,0) + COALESCE(C20.t,0)  ) AS 'NO',  
        (COALESCE(C21.t,0) + COALESCE(C22.t,0) + COALESCE(C23.t,0) + COALESCE(C24.t,0) + COALESCE(C25.t,0) +
        COALESCE(C26.t,0) + COALESCE(C27.t,0) + COALESCE(C28.t,0) + COALESCE(C29.t,0) + COALESCE(C30.t,0)  ) AS NEP
        from (select  distinct(departamento), ccdd from departamentos_tab order by departamento) as DEP 
        left join (select ccdd,  count(*) as t  from pescador c inner join pesc_seccion2 s on c.id = s.pescador_id  where s2_23_6_1 = 1 group by nom_dd) as C1 on DEP.ccdd  = C1.ccdd 
        left join (select ccdd,  count(*) as t  from pescador c inner join pesc_seccion2 s on c.id = s.pescador_id  where s2_23_6_2 = 1 group by nom_dd) as C2 on DEP.ccdd  = C2.ccdd 
        left join (select ccdd,  count(*) as t  from pescador c inner join pesc_seccion2 s on c.id = s.pescador_id  where s2_23_6_3 = 1 group by nom_dd) as C3 on DEP.ccdd  = C3.ccdd
        left join (select ccdd,  count(*) as t  from pescador c inner join pesc_seccion2 s on c.id = s.pescador_id  where s2_23_6_4 = 1 group by nom_dd) as C4 on DEP.ccdd  = C4.ccdd  
        left join (select ccdd,  count(*) as t  from pescador c inner join pesc_seccion2 s on c.id = s.pescador_id  where s2_23_6_5 = 1 group by nom_dd) as C5 on DEP.ccdd  = C5.ccdd  
        left join (select ccdd,  count(*) as t  from pescador c inner join pesc_seccion2 s on c.id = s.pescador_id  where s2_23_6_6 = 1 group by nom_dd) as C6 on DEP.ccdd  = C6.ccdd  
        left join (select ccdd,  count(*) as t  from pescador c inner join pesc_seccion2 s on c.id = s.pescador_id  where s2_23_6_7 = 1 group by nom_dd) as C7 on DEP.ccdd  = C7.ccdd  
        left join (select ccdd,  count(*) as t  from pescador c inner join pesc_seccion2 s on c.id = s.pescador_id  where s2_23_6_8 = 1 group by nom_dd) as C8 on DEP.ccdd  = C8.ccdd  
        left join (select ccdd,  count(*) as t  from pescador c inner join pesc_seccion2 s on c.id = s.pescador_id  where s2_23_6_9 = 1 group by nom_dd) as C9 on DEP.ccdd  = C9.ccdd  
        left join (select ccdd,  count(*) as t  from pescador c inner join pesc_seccion2 s on c.id = s.pescador_id  where s2_23_6_10 = 1 group by nom_dd) as C10 on DEP.ccdd  = C10.ccdd  
        left join (select ccdd,  count(*) as t  from pescador c inner join pesc_seccion2 s on c.id = s.pescador_id  where s2_23_6_1 = 2 group by nom_dd) as C11 on DEP.ccdd  = C11.ccdd 
        left join (select ccdd,  count(*) as t  from pescador c inner join pesc_seccion2 s on c.id = s.pescador_id  where s2_23_6_2 = 2 group by nom_dd) as C12 on DEP.ccdd  = C12.ccdd 
        left join (select ccdd,  count(*) as t  from pescador c inner join pesc_seccion2 s on c.id = s.pescador_id  where s2_23_6_3 = 2 group by nom_dd) as C13 on DEP.ccdd  = C13.ccdd
        left join (select ccdd,  count(*) as t  from pescador c inner join pesc_seccion2 s on c.id = s.pescador_id  where s2_23_6_4 = 2 group by nom_dd) as C14 on DEP.ccdd  = C14.ccdd  
        left join (select ccdd,  count(*) as t  from pescador c inner join pesc_seccion2 s on c.id = s.pescador_id  where s2_23_6_5 = 2 group by nom_dd) as C15 on DEP.ccdd  = C15.ccdd  
        left join (select ccdd,  count(*) as t  from pescador c inner join pesc_seccion2 s on c.id = s.pescador_id  where s2_23_6_6 = 2 group by nom_dd) as C16 on DEP.ccdd  = C16.ccdd  
        left join (select ccdd,  count(*) as t  from pescador c inner join pesc_seccion2 s on c.id = s.pescador_id  where s2_23_6_7 = 2 group by nom_dd) as C17 on DEP.ccdd  = C17.ccdd  
        left join (select ccdd,  count(*) as t  from pescador c inner join pesc_seccion2 s on c.id = s.pescador_id  where s2_23_6_8 = 2 group by nom_dd) as C18 on DEP.ccdd  = C18.ccdd  
        left join (select ccdd,  count(*) as t  from pescador c inner join pesc_seccion2 s on c.id = s.pescador_id  where s2_23_6_9 = 2 group by nom_dd) as C19 on DEP.ccdd  = C19.ccdd  
        left join (select ccdd,  count(*) as t  from pescador c inner join pesc_seccion2 s on c.id = s.pescador_id  where s2_23_6_10 = 2 group by nom_dd) as C20 on DEP.ccdd  = C20.ccdd 
        left join (select ccdd,  count(*) as t  from pescador c inner join pesc_seccion2 s on c.id = s.pescador_id  where s2_23_6_1 = 9 group by nom_dd) as C21 on DEP.ccdd  = C21.ccdd 
        left join (select ccdd,  count(*) as t  from pescador c inner join pesc_seccion2 s on c.id = s.pescador_id  where s2_23_6_2 = 9 group by nom_dd) as C22 on DEP.ccdd  = C22.ccdd 
        left join (select ccdd,  count(*) as t  from pescador c inner join pesc_seccion2 s on c.id = s.pescador_id  where s2_23_6_3 = 9 group by nom_dd) as C23 on DEP.ccdd  = C23.ccdd
        left join (select ccdd,  count(*) as t  from pescador c inner join pesc_seccion2 s on c.id = s.pescador_id  where s2_23_6_4 = 9 group by nom_dd) as C24 on DEP.ccdd  = C24.ccdd  
        left join (select ccdd,  count(*) as t  from pescador c inner join pesc_seccion2 s on c.id = s.pescador_id  where s2_23_6_5 = 9 group by nom_dd) as C25 on DEP.ccdd  = C25.ccdd  
        left join (select ccdd,  count(*) as t  from pescador c inner join pesc_seccion2 s on c.id = s.pescador_id  where s2_23_6_6 = 9 group by nom_dd) as C26 on DEP.ccdd  = C26.ccdd  
        left join (select ccdd,  count(*) as t  from pescador c inner join pesc_seccion2 s on c.id = s.pescador_id  where s2_23_6_7 = 9 group by nom_dd) as C27 on DEP.ccdd  = C27.ccdd  
        left join (select ccdd,  count(*) as t  from pescador c inner join pesc_seccion2 s on c.id = s.pescador_id  where s2_23_6_8 = 9 group by nom_dd) as C28 on DEP.ccdd  = C28.ccdd  
        left join (select ccdd,  count(*) as t  from pescador c inner join pesc_seccion2 s on c.id = s.pescador_id  where s2_23_6_9 = 9 group by nom_dd) as C29 on DEP.ccdd  = C29.ccdd  
        left join (select ccdd,  count(*) as t  from pescador c inner join pesc_seccion2 s on c.id = s.pescador_id  where s2_23_6_10 = 9 group by nom_dd) as C30 on DEP.ccdd  = C30.ccdd  ;
        ");
    return $q;
}

function get_report21(){
    $q = $this->db->query("
        /* TABULADO N° 20  ------------------------ HIJOS   DEL PESCADOR CON LIMITACIONES  --------------------------------------*/
        select 
        DEP.CCDD, DEPARTAMENTO, ( COALESCE(C1.t,0) + COALESCE(C2.t,0) + COALESCE(C3.t,0) +  COALESCE(C4.t,0) +  COALESCE(C5.t,0) +  
        COALESCE(C6.t,0) + COALESCE(C7.t,0) + COALESCE(C8.t,0) +  COALESCE(C9.t,0)  + COALESCE(C10.t,0) +
        COALESCE(C11.t,0) + COALESCE(C12.t,0) + COALESCE(C13.t,0) + COALESCE(C14.t,0) + COALESCE(C15.t,0) +
        COALESCE(C16.t,0) + COALESCE(C17.t,0) + COALESCE(C18.t,0) + COALESCE(C19.t,0) + COALESCE(C20.t,0) +
        COALESCE(C21.t,0) + COALESCE(C22.t,0) + COALESCE(C23.t,0) + COALESCE(C24.t,0) + COALESCE(C25.t,0) +
        COALESCE(C26.t,0) + COALESCE(C27.t,0) + COALESCE(C28.t,0) + COALESCE(C29.t,0) + COALESCE(C30.t,0)   ) AS TOTAL,
        ( COALESCE(C1.t,0) + COALESCE(C2.t,0) + COALESCE(C3.t,0) +  COALESCE(C4.t,0) +  COALESCE(C5.t,0) +  
        COALESCE(C6.t,0) + COALESCE(C7.t,0) + COALESCE(C8.t,0) +  COALESCE(C9.t,0)  + COALESCE(C10.t,0) ) as 'SI',  
        (COALESCE(C11.t,0) + COALESCE(C12.t,0) + COALESCE(C13.t,0) + COALESCE(C14.t,0) + COALESCE(C15.t,0) +
        COALESCE(C16.t,0) + COALESCE(C17.t,0) + COALESCE(C18.t,0) + COALESCE(C19.t,0) + COALESCE(C20.t,0)  ) AS 'NO',  
        (COALESCE(C21.t,0) + COALESCE(C22.t,0) + COALESCE(C23.t,0) + COALESCE(C24.t,0) + COALESCE(C25.t,0) +
        COALESCE(C26.t,0) + COALESCE(C27.t,0) + COALESCE(C28.t,0) + COALESCE(C29.t,0) + COALESCE(C30.t,0)  ) AS NEP
        from (select  distinct(departamento), ccdd from departamentos_tab order by departamento) as DEP 
        left join (select ccdd,  count(*) as t  from pescador c inner join pesc_seccion2 s on c.id = s.pescador_id  where s2_23_7_1 = 1 group by nom_dd) as C1 on DEP.ccdd  = C1.ccdd 
        left join (select ccdd,  count(*) as t  from pescador c inner join pesc_seccion2 s on c.id = s.pescador_id  where s2_23_7_2 = 1 group by nom_dd) as C2 on DEP.ccdd  = C2.ccdd 
        left join (select ccdd,  count(*) as t  from pescador c inner join pesc_seccion2 s on c.id = s.pescador_id  where s2_23_7_3 = 1 group by nom_dd) as C3 on DEP.ccdd  = C3.ccdd
        left join (select ccdd,  count(*) as t  from pescador c inner join pesc_seccion2 s on c.id = s.pescador_id  where s2_23_7_4 = 1 group by nom_dd) as C4 on DEP.ccdd  = C4.ccdd  
        left join (select ccdd,  count(*) as t  from pescador c inner join pesc_seccion2 s on c.id = s.pescador_id  where s2_23_7_5 = 1 group by nom_dd) as C5 on DEP.ccdd  = C5.ccdd  
        left join (select ccdd,  count(*) as t  from pescador c inner join pesc_seccion2 s on c.id = s.pescador_id  where s2_23_7_6 = 1 group by nom_dd) as C6 on DEP.ccdd  = C6.ccdd  
        left join (select ccdd,  count(*) as t  from pescador c inner join pesc_seccion2 s on c.id = s.pescador_id  where s2_23_7_7 = 1 group by nom_dd) as C7 on DEP.ccdd  = C7.ccdd  
        left join (select ccdd,  count(*) as t  from pescador c inner join pesc_seccion2 s on c.id = s.pescador_id  where s2_23_7_8 = 1 group by nom_dd) as C8 on DEP.ccdd  = C8.ccdd  
        left join (select ccdd,  count(*) as t  from pescador c inner join pesc_seccion2 s on c.id = s.pescador_id  where s2_23_7_9 = 1 group by nom_dd) as C9 on DEP.ccdd  = C9.ccdd  
        left join (select ccdd,  count(*) as t  from pescador c inner join pesc_seccion2 s on c.id = s.pescador_id  where s2_23_7_10 = 1 group by nom_dd) as C10 on DEP.ccdd  = C10.ccdd  
        left join (select ccdd,  count(*) as t  from pescador c inner join pesc_seccion2 s on c.id = s.pescador_id  where s2_23_7_1 = 2 group by nom_dd) as C11 on DEP.ccdd  = C11.ccdd 
        left join (select ccdd,  count(*) as t  from pescador c inner join pesc_seccion2 s on c.id = s.pescador_id  where s2_23_7_2 = 2 group by nom_dd) as C12 on DEP.ccdd  = C12.ccdd 
        left join (select ccdd,  count(*) as t  from pescador c inner join pesc_seccion2 s on c.id = s.pescador_id  where s2_23_7_3 = 2 group by nom_dd) as C13 on DEP.ccdd  = C13.ccdd
        left join (select ccdd,  count(*) as t  from pescador c inner join pesc_seccion2 s on c.id = s.pescador_id  where s2_23_7_4 = 2 group by nom_dd) as C14 on DEP.ccdd  = C14.ccdd  
        left join (select ccdd,  count(*) as t  from pescador c inner join pesc_seccion2 s on c.id = s.pescador_id  where s2_23_7_5 = 2 group by nom_dd) as C15 on DEP.ccdd  = C15.ccdd  
        left join (select ccdd,  count(*) as t  from pescador c inner join pesc_seccion2 s on c.id = s.pescador_id  where s2_23_7_6 = 2 group by nom_dd) as C16 on DEP.ccdd  = C16.ccdd  
        left join (select ccdd,  count(*) as t  from pescador c inner join pesc_seccion2 s on c.id = s.pescador_id  where s2_23_7_7 = 2 group by nom_dd) as C17 on DEP.ccdd  = C17.ccdd  
        left join (select ccdd,  count(*) as t  from pescador c inner join pesc_seccion2 s on c.id = s.pescador_id  where s2_23_7_8 = 2 group by nom_dd) as C18 on DEP.ccdd  = C18.ccdd  
        left join (select ccdd,  count(*) as t  from pescador c inner join pesc_seccion2 s on c.id = s.pescador_id  where s2_23_7_9 = 2 group by nom_dd) as C19 on DEP.ccdd  = C19.ccdd  
        left join (select ccdd,  count(*) as t  from pescador c inner join pesc_seccion2 s on c.id = s.pescador_id  where s2_23_7_10 = 2 group by nom_dd) as C20 on DEP.ccdd  = C20.ccdd 
        left join (select ccdd,  count(*) as t  from pescador c inner join pesc_seccion2 s on c.id = s.pescador_id  where s2_23_7_1 = 9 group by nom_dd) as C21 on DEP.ccdd  = C21.ccdd 
        left join (select ccdd,  count(*) as t  from pescador c inner join pesc_seccion2 s on c.id = s.pescador_id  where s2_23_7_2 = 9 group by nom_dd) as C22 on DEP.ccdd  = C22.ccdd 
        left join (select ccdd,  count(*) as t  from pescador c inner join pesc_seccion2 s on c.id = s.pescador_id  where s2_23_7_3 = 9 group by nom_dd) as C23 on DEP.ccdd  = C23.ccdd
        left join (select ccdd,  count(*) as t  from pescador c inner join pesc_seccion2 s on c.id = s.pescador_id  where s2_23_7_4 = 9 group by nom_dd) as C24 on DEP.ccdd  = C24.ccdd  
        left join (select ccdd,  count(*) as t  from pescador c inner join pesc_seccion2 s on c.id = s.pescador_id  where s2_23_7_5 = 9 group by nom_dd) as C25 on DEP.ccdd  = C25.ccdd  
        left join (select ccdd,  count(*) as t  from pescador c inner join pesc_seccion2 s on c.id = s.pescador_id  where s2_23_7_6 = 9 group by nom_dd) as C26 on DEP.ccdd  = C26.ccdd  
        left join (select ccdd,  count(*) as t  from pescador c inner join pesc_seccion2 s on c.id = s.pescador_id  where s2_23_7_7 = 9 group by nom_dd) as C27 on DEP.ccdd  = C27.ccdd  
        left join (select ccdd,  count(*) as t  from pescador c inner join pesc_seccion2 s on c.id = s.pescador_id  where s2_23_7_8 = 9 group by nom_dd) as C28 on DEP.ccdd  = C28.ccdd  
        left join (select ccdd,  count(*) as t  from pescador c inner join pesc_seccion2 s on c.id = s.pescador_id  where s2_23_7_9 = 9 group by nom_dd) as C29 on DEP.ccdd  = C29.ccdd  
        left join (select ccdd,  count(*) as t  from pescador c inner join pesc_seccion2 s on c.id = s.pescador_id  where s2_23_7_10 = 9 group by nom_dd) as C30 on DEP.ccdd  = C30.ccdd  ;
        ");
    return $q;
}

function get_report22(){
    $q = $this->db->query("
        /* TABULADO N° 21  ------------------------ NIVEL DE ESTUDIOS DE LOS HIJOS  --------------------------------------*/
        SELECT  table1.CCDD, table1.DEPARTAMENTO, 
        (SIN_NIVEL + INICIAL + PRIMARIA_INC +  PRIMARIA_COM  + SECUNDARIA_INC + SECUNDARIA_COM + SUPERIOR_NO_UNI_INC + SUPERIOR_NO_UNI_COM +
        SUPERIOR_UNI_INC + SUPERIOR_UNI_COM + NEP) as TOTAL, SIN_NIVEL, INICIAL, PRIMARIA_INC,  PRIMARIA_COM ,  SECUNDARIA_INC, SECUNDARIA_COM, SUPERIOR_NO_UNI_INC, SUPERIOR_NO_UNI_COM,
        SUPERIOR_UNI_INC, SUPERIOR_UNI_COM, NEP FROM
        (select 
        DEP.CCDD, DEPARTAMENTO, ( COALESCE(C1.t,0) + COALESCE(C2.t,0) + COALESCE(C3.t,0) +  COALESCE(C4.t,0) +  COALESCE(C5.t,0) +  
        COALESCE(C6.t,0) + COALESCE(C7.t,0) + COALESCE(C8.t,0) +  COALESCE(C9.t,0)  + COALESCE(C10.t,0)  ) AS SIN_NIVEL
        from (select  distinct(departamento), ccdd from departamentos_tab order by departamento) as DEP 
        left join (select ccdd,  count(*) as t  from pescador c inner join pesc_seccion2 s on c.id = s.pescador_id  where s2_23_8_1 = 1  group by nom_dd) as C1 on DEP.ccdd  = C1.ccdd 
        left join (select ccdd,  count(*) as t  from pescador c inner join pesc_seccion2 s on c.id = s.pescador_id  where s2_23_8_2 = 1  group by nom_dd) as C2 on DEP.ccdd  = C2.ccdd 
        left join (select ccdd,  count(*) as t  from pescador c inner join pesc_seccion2 s on c.id = s.pescador_id  where s2_23_8_3 = 1  group by nom_dd) as C3 on DEP.ccdd  = C3.ccdd
        left join (select ccdd,  count(*) as t  from pescador c inner join pesc_seccion2 s on c.id = s.pescador_id  where s2_23_8_4 = 1  group by nom_dd) as C4 on DEP.ccdd  = C4.ccdd  
        left join (select ccdd,  count(*) as t  from pescador c inner join pesc_seccion2 s on c.id = s.pescador_id  where s2_23_8_5 = 1  group by nom_dd) as C5 on DEP.ccdd  = C5.ccdd  
        left join (select ccdd,  count(*) as t  from pescador c inner join pesc_seccion2 s on c.id = s.pescador_id  where s2_23_8_6 = 1  group by nom_dd) as C6 on DEP.ccdd  = C6.ccdd  
        left join (select ccdd,  count(*) as t  from pescador c inner join pesc_seccion2 s on c.id = s.pescador_id  where s2_23_8_7 = 1  group by nom_dd) as C7 on DEP.ccdd  = C7.ccdd  
        left join (select ccdd,  count(*) as t  from pescador c inner join pesc_seccion2 s on c.id = s.pescador_id  where s2_23_8_8 = 1  group by nom_dd) as C8 on DEP.ccdd  = C8.ccdd  
        left join (select ccdd,  count(*) as t  from pescador c inner join pesc_seccion2 s on c.id = s.pescador_id  where s2_23_8_9 = 1  group by nom_dd) as C9 on DEP.ccdd  = C9.ccdd  
        left join (select ccdd,  count(*) as t  from pescador c inner join pesc_seccion2 s on c.id = s.pescador_id  where s2_23_8_10 = 1  group by nom_dd) as C10 on DEP.ccdd  = C10.ccdd  ) as table1 
        inner join 
        (select 
        DEP.CCDD, DEPARTAMENTO, ( COALESCE(C1.t,0) + COALESCE(C2.t,0) + COALESCE(C3.t,0) +  COALESCE(C4.t,0) +  COALESCE(C5.t,0) +  
        COALESCE(C6.t,0) + COALESCE(C7.t,0) + COALESCE(C8.t,0) +  COALESCE(C9.t,0)  + COALESCE(C10.t,0)  ) as INICIAL
        from (select  distinct(departamento), ccdd from departamentos_tab order by departamento) as DEP 
        left join (select ccdd,  count(*) as t  from pescador c inner join pesc_seccion2 s on c.id = s.pescador_id  where s2_23_8_1 = 2  group by nom_dd) as C1 on DEP.ccdd  = C1.ccdd 
        left join (select ccdd,  count(*) as t  from pescador c inner join pesc_seccion2 s on c.id = s.pescador_id  where s2_23_8_2 = 2  group by nom_dd) as C2 on DEP.ccdd  = C2.ccdd 
        left join (select ccdd,  count(*) as t  from pescador c inner join pesc_seccion2 s on c.id = s.pescador_id  where s2_23_8_3 = 2  group by nom_dd) as C3 on DEP.ccdd  = C3.ccdd
        left join (select ccdd,  count(*) as t  from pescador c inner join pesc_seccion2 s on c.id = s.pescador_id  where s2_23_8_4 = 2  group by nom_dd) as C4 on DEP.ccdd  = C4.ccdd  
        left join (select ccdd,  count(*) as t  from pescador c inner join pesc_seccion2 s on c.id = s.pescador_id  where s2_23_8_5 = 2  group by nom_dd) as C5 on DEP.ccdd  = C5.ccdd  
        left join (select ccdd,  count(*) as t  from pescador c inner join pesc_seccion2 s on c.id = s.pescador_id  where s2_23_8_6 = 2  group by nom_dd) as C6 on DEP.ccdd  = C6.ccdd  
        left join (select ccdd,  count(*) as t  from pescador c inner join pesc_seccion2 s on c.id = s.pescador_id  where s2_23_8_7 = 2  group by nom_dd) as C7 on DEP.ccdd  = C7.ccdd  
        left join (select ccdd,  count(*) as t  from pescador c inner join pesc_seccion2 s on c.id = s.pescador_id  where s2_23_8_8 = 2  group by nom_dd) as C8 on DEP.ccdd  = C8.ccdd  
        left join (select ccdd,  count(*) as t  from pescador c inner join pesc_seccion2 s on c.id = s.pescador_id  where s2_23_8_9 = 2  group by nom_dd) as C9 on DEP.ccdd  = C9.ccdd  
        left join (select ccdd,  count(*) as t  from pescador c inner join pesc_seccion2 s on c.id = s.pescador_id  where s2_23_8_10 = 2  group by nom_dd) as C10 on DEP.ccdd  = C10.ccdd  ) as table2 
        on table1.ccdd = table2.ccdd
        inner join 
        (select 
        DEP.CCDD, DEPARTAMENTO, ( COALESCE(C1.t,0) + COALESCE(C2.t,0) + COALESCE(C3.t,0) +  COALESCE(C4.t,0) +  COALESCE(C5.t,0) +  
        COALESCE(C6.t,0) + COALESCE(C7.t,0) + COALESCE(C8.t,0) +  COALESCE(C9.t,0)  + COALESCE(C10.t,0)  ) as PRIMARIA_INC
        from (select  distinct(departamento), ccdd from departamentos_tab order by departamento) as DEP 
        left join (select ccdd,  count(*) as t  from pescador c inner join pesc_seccion2 s on c.id = s.pescador_id  where s2_23_8_1 = 3  group by nom_dd) as C1 on DEP.ccdd  = C1.ccdd 
        left join (select ccdd,  count(*) as t  from pescador c inner join pesc_seccion2 s on c.id = s.pescador_id  where s2_23_8_2 = 3  group by nom_dd) as C2 on DEP.ccdd  = C2.ccdd 
        left join (select ccdd,  count(*) as t  from pescador c inner join pesc_seccion2 s on c.id = s.pescador_id  where s2_23_8_3 = 3  group by nom_dd) as C3 on DEP.ccdd  = C3.ccdd
        left join (select ccdd,  count(*) as t  from pescador c inner join pesc_seccion2 s on c.id = s.pescador_id  where s2_23_8_4 = 3  group by nom_dd) as C4 on DEP.ccdd  = C4.ccdd  
        left join (select ccdd,  count(*) as t  from pescador c inner join pesc_seccion2 s on c.id = s.pescador_id  where s2_23_8_5 = 3  group by nom_dd) as C5 on DEP.ccdd  = C5.ccdd  
        left join (select ccdd,  count(*) as t  from pescador c inner join pesc_seccion2 s on c.id = s.pescador_id  where s2_23_8_6 = 3  group by nom_dd) as C6 on DEP.ccdd  = C6.ccdd  
        left join (select ccdd,  count(*) as t  from pescador c inner join pesc_seccion2 s on c.id = s.pescador_id  where s2_23_8_7 = 3  group by nom_dd) as C7 on DEP.ccdd  = C7.ccdd  
        left join (select ccdd,  count(*) as t  from pescador c inner join pesc_seccion2 s on c.id = s.pescador_id  where s2_23_8_8 = 3  group by nom_dd) as C8 on DEP.ccdd  = C8.ccdd  
        left join (select ccdd,  count(*) as t  from pescador c inner join pesc_seccion2 s on c.id = s.pescador_id  where s2_23_8_9 = 3  group by nom_dd) as C9 on DEP.ccdd  = C9.ccdd  
        left join (select ccdd,  count(*) as t  from pescador c inner join pesc_seccion2 s on c.id = s.pescador_id  where s2_23_8_10 = 3  group by nom_dd) as C10 on DEP.ccdd  = C10.ccdd  ) as table3 
        on table1.ccdd = table3.ccdd
        inner join 
        (select 
        DEP.CCDD, DEPARTAMENTO, ( COALESCE(C1.t,0) + COALESCE(C2.t,0) + COALESCE(C3.t,0) +  COALESCE(C4.t,0) +  COALESCE(C5.t,0) +  
        COALESCE(C6.t,0) + COALESCE(C7.t,0) + COALESCE(C8.t,0) +  COALESCE(C9.t,0)  + COALESCE(C10.t,0)  ) as PRIMARIA_COM
        from (select  distinct(departamento), ccdd from departamentos_tab order by departamento) as DEP 
        left join (select ccdd,  count(*) as t  from pescador c inner join pesc_seccion2 s on c.id = s.pescador_id  where s2_23_8_1 = 4  group by nom_dd) as C1 on DEP.ccdd  = C1.ccdd 
        left join (select ccdd,  count(*) as t  from pescador c inner join pesc_seccion2 s on c.id = s.pescador_id  where s2_23_8_2 = 4  group by nom_dd) as C2 on DEP.ccdd  = C2.ccdd 
        left join (select ccdd,  count(*) as t  from pescador c inner join pesc_seccion2 s on c.id = s.pescador_id  where s2_23_8_3 = 4  group by nom_dd) as C3 on DEP.ccdd  = C3.ccdd
        left join (select ccdd,  count(*) as t  from pescador c inner join pesc_seccion2 s on c.id = s.pescador_id  where s2_23_8_4 = 4  group by nom_dd) as C4 on DEP.ccdd  = C4.ccdd  
        left join (select ccdd,  count(*) as t  from pescador c inner join pesc_seccion2 s on c.id = s.pescador_id  where s2_23_8_5 = 4  group by nom_dd) as C5 on DEP.ccdd  = C5.ccdd  
        left join (select ccdd,  count(*) as t  from pescador c inner join pesc_seccion2 s on c.id = s.pescador_id  where s2_23_8_6 = 4  group by nom_dd) as C6 on DEP.ccdd  = C6.ccdd  
        left join (select ccdd,  count(*) as t  from pescador c inner join pesc_seccion2 s on c.id = s.pescador_id  where s2_23_8_7 = 4  group by nom_dd) as C7 on DEP.ccdd  = C7.ccdd  
        left join (select ccdd,  count(*) as t  from pescador c inner join pesc_seccion2 s on c.id = s.pescador_id  where s2_23_8_8 = 4  group by nom_dd) as C8 on DEP.ccdd  = C8.ccdd  
        left join (select ccdd,  count(*) as t  from pescador c inner join pesc_seccion2 s on c.id = s.pescador_id  where s2_23_8_9 = 4  group by nom_dd) as C9 on DEP.ccdd  = C9.ccdd  
        left join (select ccdd,  count(*) as t  from pescador c inner join pesc_seccion2 s on c.id = s.pescador_id  where s2_23_8_10 = 4  group by nom_dd) as C10 on DEP.ccdd  = C10.ccdd  ) as table4 
        on table1.ccdd = table4.ccdd
        inner join 
        (select 
        DEP.CCDD, DEPARTAMENTO, ( COALESCE(C1.t,0) + COALESCE(C2.t,0) + COALESCE(C3.t,0) +  COALESCE(C4.t,0) +  COALESCE(C5.t,0) +  
        COALESCE(C6.t,0) + COALESCE(C7.t,0) + COALESCE(C8.t,0) +  COALESCE(C9.t,0)  + COALESCE(C10.t,0)  ) as SECUNDARIA_INC
        from (select  distinct(departamento), ccdd from departamentos_tab order by departamento) as DEP 
        left join (select ccdd,  count(*) as t  from pescador c inner join pesc_seccion2 s on c.id = s.pescador_id  where s2_23_8_1 = 5  group by nom_dd) as C1 on DEP.ccdd  = C1.ccdd 
        left join (select ccdd,  count(*) as t  from pescador c inner join pesc_seccion2 s on c.id = s.pescador_id  where s2_23_8_2 = 5  group by nom_dd) as C2 on DEP.ccdd  = C2.ccdd 
        left join (select ccdd,  count(*) as t  from pescador c inner join pesc_seccion2 s on c.id = s.pescador_id  where s2_23_8_3 = 5  group by nom_dd) as C3 on DEP.ccdd  = C3.ccdd
        left join (select ccdd,  count(*) as t  from pescador c inner join pesc_seccion2 s on c.id = s.pescador_id  where s2_23_8_4 = 5  group by nom_dd) as C4 on DEP.ccdd  = C4.ccdd  
        left join (select ccdd,  count(*) as t  from pescador c inner join pesc_seccion2 s on c.id = s.pescador_id  where s2_23_8_5 = 5  group by nom_dd) as C5 on DEP.ccdd  = C5.ccdd  
        left join (select ccdd,  count(*) as t  from pescador c inner join pesc_seccion2 s on c.id = s.pescador_id  where s2_23_8_6 = 5  group by nom_dd) as C6 on DEP.ccdd  = C6.ccdd  
        left join (select ccdd,  count(*) as t  from pescador c inner join pesc_seccion2 s on c.id = s.pescador_id  where s2_23_8_7 = 5  group by nom_dd) as C7 on DEP.ccdd  = C7.ccdd  
        left join (select ccdd,  count(*) as t  from pescador c inner join pesc_seccion2 s on c.id = s.pescador_id  where s2_23_8_8 = 5  group by nom_dd) as C8 on DEP.ccdd  = C8.ccdd  
        left join (select ccdd,  count(*) as t  from pescador c inner join pesc_seccion2 s on c.id = s.pescador_id  where s2_23_8_9 = 5  group by nom_dd) as C9 on DEP.ccdd  = C9.ccdd  
        left join (select ccdd,  count(*) as t  from pescador c inner join pesc_seccion2 s on c.id = s.pescador_id  where s2_23_8_10 = 5  group by nom_dd) as C10 on DEP.ccdd  = C10.ccdd  ) as table5 
        on table1.ccdd = table5.ccdd
        inner join 
        (select 
        DEP.CCDD, DEPARTAMENTO, ( COALESCE(C1.t,0) + COALESCE(C2.t,0) + COALESCE(C3.t,0) +  COALESCE(C4.t,0) +  COALESCE(C5.t,0) +  
        COALESCE(C6.t,0) + COALESCE(C7.t,0) + COALESCE(C8.t,0) +  COALESCE(C9.t,0)  + COALESCE(C10.t,0)  ) as SECUNDARIA_COM
        from (select  distinct(departamento), ccdd from departamentos_tab order by departamento) as DEP 
        left join (select ccdd,  count(*) as t  from pescador c inner join pesc_seccion2 s on c.id = s.pescador_id  where s2_23_8_1 = 6  group by nom_dd) as C1 on DEP.ccdd  = C1.ccdd 
        left join (select ccdd,  count(*) as t  from pescador c inner join pesc_seccion2 s on c.id = s.pescador_id  where s2_23_8_2 = 6  group by nom_dd) as C2 on DEP.ccdd  = C2.ccdd 
        left join (select ccdd,  count(*) as t  from pescador c inner join pesc_seccion2 s on c.id = s.pescador_id  where s2_23_8_3 = 6  group by nom_dd) as C3 on DEP.ccdd  = C3.ccdd
        left join (select ccdd,  count(*) as t  from pescador c inner join pesc_seccion2 s on c.id = s.pescador_id  where s2_23_8_4 = 6  group by nom_dd) as C4 on DEP.ccdd  = C4.ccdd  
        left join (select ccdd,  count(*) as t  from pescador c inner join pesc_seccion2 s on c.id = s.pescador_id  where s2_23_8_5 = 6  group by nom_dd) as C5 on DEP.ccdd  = C5.ccdd  
        left join (select ccdd,  count(*) as t  from pescador c inner join pesc_seccion2 s on c.id = s.pescador_id  where s2_23_8_6 = 6  group by nom_dd) as C6 on DEP.ccdd  = C6.ccdd  
        left join (select ccdd,  count(*) as t  from pescador c inner join pesc_seccion2 s on c.id = s.pescador_id  where s2_23_8_7 = 6  group by nom_dd) as C7 on DEP.ccdd  = C7.ccdd  
        left join (select ccdd,  count(*) as t  from pescador c inner join pesc_seccion2 s on c.id = s.pescador_id  where s2_23_8_8 = 6  group by nom_dd) as C8 on DEP.ccdd  = C8.ccdd  
        left join (select ccdd,  count(*) as t  from pescador c inner join pesc_seccion2 s on c.id = s.pescador_id  where s2_23_8_9 = 6  group by nom_dd) as C9 on DEP.ccdd  = C9.ccdd  
        left join (select ccdd,  count(*) as t  from pescador c inner join pesc_seccion2 s on c.id = s.pescador_id  where s2_23_8_10 = 6  group by nom_dd) as C10 on DEP.ccdd  = C10.ccdd  ) as table6 
        on table1.ccdd = table6.ccdd
        inner join 
        (select 
        DEP.CCDD, DEPARTAMENTO, ( COALESCE(C1.t,0) + COALESCE(C2.t,0) + COALESCE(C3.t,0) +  COALESCE(C4.t,0) +  COALESCE(C5.t,0) +  
        COALESCE(C6.t,0) + COALESCE(C7.t,0) + COALESCE(C8.t,0) +  COALESCE(C9.t,0)  + COALESCE(C10.t,0)  ) as SUPERIOR_NO_UNI_INC
        from (select  distinct(departamento), ccdd from departamentos_tab order by departamento) as DEP 
        left join (select ccdd,  count(*) as t  from pescador c inner join pesc_seccion2 s on c.id = s.pescador_id  where s2_23_8_1 = 7  group by nom_dd) as C1 on DEP.ccdd  = C1.ccdd 
        left join (select ccdd,  count(*) as t  from pescador c inner join pesc_seccion2 s on c.id = s.pescador_id  where s2_23_8_2 = 7  group by nom_dd) as C2 on DEP.ccdd  = C2.ccdd 
        left join (select ccdd,  count(*) as t  from pescador c inner join pesc_seccion2 s on c.id = s.pescador_id  where s2_23_8_3 = 7  group by nom_dd) as C3 on DEP.ccdd  = C3.ccdd
        left join (select ccdd,  count(*) as t  from pescador c inner join pesc_seccion2 s on c.id = s.pescador_id  where s2_23_8_4 = 7  group by nom_dd) as C4 on DEP.ccdd  = C4.ccdd  
        left join (select ccdd,  count(*) as t  from pescador c inner join pesc_seccion2 s on c.id = s.pescador_id  where s2_23_8_5 = 7  group by nom_dd) as C5 on DEP.ccdd  = C5.ccdd  
        left join (select ccdd,  count(*) as t  from pescador c inner join pesc_seccion2 s on c.id = s.pescador_id  where s2_23_8_6 = 7  group by nom_dd) as C6 on DEP.ccdd  = C6.ccdd  
        left join (select ccdd,  count(*) as t  from pescador c inner join pesc_seccion2 s on c.id = s.pescador_id  where s2_23_8_7 = 7  group by nom_dd) as C7 on DEP.ccdd  = C7.ccdd  
        left join (select ccdd,  count(*) as t  from pescador c inner join pesc_seccion2 s on c.id = s.pescador_id  where s2_23_8_8 = 7  group by nom_dd) as C8 on DEP.ccdd  = C8.ccdd  
        left join (select ccdd,  count(*) as t  from pescador c inner join pesc_seccion2 s on c.id = s.pescador_id  where s2_23_8_9 = 7  group by nom_dd) as C9 on DEP.ccdd  = C9.ccdd  
        left join (select ccdd,  count(*) as t  from pescador c inner join pesc_seccion2 s on c.id = s.pescador_id  where s2_23_8_10 = 7  group by nom_dd) as C10 on DEP.ccdd  = C10.ccdd  ) as table7 
        on table1.ccdd = table7.ccdd
        inner join 
        (select 
        DEP.CCDD, DEPARTAMENTO, ( COALESCE(C1.t,0) + COALESCE(C2.t,0) + COALESCE(C3.t,0) +  COALESCE(C4.t,0) +  COALESCE(C5.t,0) +  
        COALESCE(C6.t,0) + COALESCE(C7.t,0) + COALESCE(C8.t,0) +  COALESCE(C9.t,0)  + COALESCE(C10.t,0)  )as SUPERIOR_NO_UNI_COM
        from (select  distinct(departamento), ccdd from departamentos_tab order by departamento) as DEP 
        left join (select ccdd,  count(*) as t  from pescador c inner join pesc_seccion2 s on c.id = s.pescador_id  where s2_23_8_1 = 8  group by nom_dd) as C1 on DEP.ccdd  = C1.ccdd 
        left join (select ccdd,  count(*) as t  from pescador c inner join pesc_seccion2 s on c.id = s.pescador_id  where s2_23_8_2 = 8  group by nom_dd) as C2 on DEP.ccdd  = C2.ccdd 
        left join (select ccdd,  count(*) as t  from pescador c inner join pesc_seccion2 s on c.id = s.pescador_id  where s2_23_8_3 = 8  group by nom_dd) as C3 on DEP.ccdd  = C3.ccdd
        left join (select ccdd,  count(*) as t  from pescador c inner join pesc_seccion2 s on c.id = s.pescador_id  where s2_23_8_4 = 8  group by nom_dd) as C4 on DEP.ccdd  = C4.ccdd  
        left join (select ccdd,  count(*) as t  from pescador c inner join pesc_seccion2 s on c.id = s.pescador_id  where s2_23_8_5 = 8  group by nom_dd) as C5 on DEP.ccdd  = C5.ccdd  
        left join (select ccdd,  count(*) as t  from pescador c inner join pesc_seccion2 s on c.id = s.pescador_id  where s2_23_8_6 = 8  group by nom_dd) as C6 on DEP.ccdd  = C6.ccdd  
        left join (select ccdd,  count(*) as t  from pescador c inner join pesc_seccion2 s on c.id = s.pescador_id  where s2_23_8_7 = 8  group by nom_dd) as C7 on DEP.ccdd  = C7.ccdd  
        left join (select ccdd,  count(*) as t  from pescador c inner join pesc_seccion2 s on c.id = s.pescador_id  where s2_23_8_8 = 8  group by nom_dd) as C8 on DEP.ccdd  = C8.ccdd  
        left join (select ccdd,  count(*) as t  from pescador c inner join pesc_seccion2 s on c.id = s.pescador_id  where s2_23_8_9 = 8  group by nom_dd) as C9 on DEP.ccdd  = C9.ccdd  
        left join (select ccdd,  count(*) as t  from pescador c inner join pesc_seccion2 s on c.id = s.pescador_id  where s2_23_8_10 = 8  group by nom_dd) as C10 on DEP.ccdd  = C10.ccdd  ) as table8 
        on table1.ccdd = table8.ccdd
        inner join 
        (select 
        DEP.CCDD, DEPARTAMENTO, ( COALESCE(C1.t,0) + COALESCE(C2.t,0) + COALESCE(C3.t,0) +  COALESCE(C4.t,0) +  COALESCE(C5.t,0) +  
        COALESCE(C6.t,0) + COALESCE(C7.t,0) + COALESCE(C8.t,0) +  COALESCE(C9.t,0)  + COALESCE(C10.t,0)  ) as SUPERIOR_UNI_INC
        from (select  distinct(departamento), ccdd from departamentos_tab order by departamento) as DEP 
        left join (select ccdd,  count(*) as t  from pescador c inner join pesc_seccion2 s on c.id = s.pescador_id  where s2_23_8_1 = 9  group by nom_dd) as C1 on DEP.ccdd  = C1.ccdd 
        left join (select ccdd,  count(*) as t  from pescador c inner join pesc_seccion2 s on c.id = s.pescador_id  where s2_23_8_2 = 9  group by nom_dd) as C2 on DEP.ccdd  = C2.ccdd 
        left join (select ccdd,  count(*) as t  from pescador c inner join pesc_seccion2 s on c.id = s.pescador_id  where s2_23_8_3 = 9  group by nom_dd) as C3 on DEP.ccdd  = C3.ccdd
        left join (select ccdd,  count(*) as t  from pescador c inner join pesc_seccion2 s on c.id = s.pescador_id  where s2_23_8_4 = 9  group by nom_dd) as C4 on DEP.ccdd  = C4.ccdd  
        left join (select ccdd,  count(*) as t  from pescador c inner join pesc_seccion2 s on c.id = s.pescador_id  where s2_23_8_5 = 9  group by nom_dd) as C5 on DEP.ccdd  = C5.ccdd  
        left join (select ccdd,  count(*) as t  from pescador c inner join pesc_seccion2 s on c.id = s.pescador_id  where s2_23_8_6 = 9  group by nom_dd) as C6 on DEP.ccdd  = C6.ccdd  
        left join (select ccdd,  count(*) as t  from pescador c inner join pesc_seccion2 s on c.id = s.pescador_id  where s2_23_8_7 = 9  group by nom_dd) as C7 on DEP.ccdd  = C7.ccdd  
        left join (select ccdd,  count(*) as t  from pescador c inner join pesc_seccion2 s on c.id = s.pescador_id  where s2_23_8_8 = 9  group by nom_dd) as C8 on DEP.ccdd  = C8.ccdd  
        left join (select ccdd,  count(*) as t  from pescador c inner join pesc_seccion2 s on c.id = s.pescador_id  where s2_23_8_9 = 9  group by nom_dd) as C9 on DEP.ccdd  = C9.ccdd  
        left join (select ccdd,  count(*) as t  from pescador c inner join pesc_seccion2 s on c.id = s.pescador_id  where s2_23_8_10 = 9  group by nom_dd) as C10 on DEP.ccdd  = C10.ccdd  ) as table9 
        on table1.ccdd = table9.ccdd
        inner join 
        (select 
        DEP.CCDD, DEPARTAMENTO, ( COALESCE(C1.t,0) + COALESCE(C2.t,0) + COALESCE(C3.t,0) +  COALESCE(C4.t,0) +  COALESCE(C5.t,0) +  
        COALESCE(C6.t,0) + COALESCE(C7.t,0) + COALESCE(C8.t,0) +  COALESCE(C9.t,0)  + COALESCE(C10.t,0)  ) as SUPERIOR_UNI_COM
        from (select  distinct(departamento), ccdd from departamentos_tab order by departamento) as DEP 
        left join (select ccdd,  count(*) as t  from pescador c inner join pesc_seccion2 s on c.id = s.pescador_id  where s2_23_8_1 = 10  group by nom_dd) as C1 on DEP.ccdd  = C1.ccdd 
        left join (select ccdd,  count(*) as t  from pescador c inner join pesc_seccion2 s on c.id = s.pescador_id  where s2_23_8_2 = 10  group by nom_dd) as C2 on DEP.ccdd  = C2.ccdd 
        left join (select ccdd,  count(*) as t  from pescador c inner join pesc_seccion2 s on c.id = s.pescador_id  where s2_23_8_3 = 10  group by nom_dd) as C3 on DEP.ccdd  = C3.ccdd
        left join (select ccdd,  count(*) as t  from pescador c inner join pesc_seccion2 s on c.id = s.pescador_id  where s2_23_8_4 = 10  group by nom_dd) as C4 on DEP.ccdd  = C4.ccdd  
        left join (select ccdd,  count(*) as t  from pescador c inner join pesc_seccion2 s on c.id = s.pescador_id  where s2_23_8_5 = 10  group by nom_dd) as C5 on DEP.ccdd  = C5.ccdd  
        left join (select ccdd,  count(*) as t  from pescador c inner join pesc_seccion2 s on c.id = s.pescador_id  where s2_23_8_6 = 10  group by nom_dd) as C6 on DEP.ccdd  = C6.ccdd  
        left join (select ccdd,  count(*) as t  from pescador c inner join pesc_seccion2 s on c.id = s.pescador_id  where s2_23_8_7 = 10  group by nom_dd) as C7 on DEP.ccdd  = C7.ccdd  
        left join (select ccdd,  count(*) as t  from pescador c inner join pesc_seccion2 s on c.id = s.pescador_id  where s2_23_8_8 = 10  group by nom_dd) as C8 on DEP.ccdd  = C8.ccdd  
        left join (select ccdd,  count(*) as t  from pescador c inner join pesc_seccion2 s on c.id = s.pescador_id  where s2_23_8_9 = 10  group by nom_dd) as C9 on DEP.ccdd  = C9.ccdd  
        left join (select ccdd,  count(*) as t  from pescador c inner join pesc_seccion2 s on c.id = s.pescador_id  where s2_23_8_10 = 10  group by nom_dd) as C10 on DEP.ccdd  = C10.ccdd  ) as table10 
        on table1.ccdd = table10.ccdd
        inner join 
        (select 
        DEP.CCDD, DEPARTAMENTO, ( COALESCE(C1.t,0) + COALESCE(C2.t,0) + COALESCE(C3.t,0) +  COALESCE(C4.t,0) +  COALESCE(C5.t,0) +  
        COALESCE(C6.t,0) + COALESCE(C7.t,0) + COALESCE(C8.t,0) +  COALESCE(C9.t,0)  + COALESCE(C10.t,0)  ) as NEP
        from (select  distinct(departamento), ccdd from departamentos_tab order by departamento) as DEP 
        left join (select ccdd,  count(*) as t  from pescador c inner join pesc_seccion2 s on c.id = s.pescador_id  where s2_23_8_1 = 99  group by nom_dd) as C1 on DEP.ccdd  = C1.ccdd 
        left join (select ccdd,  count(*) as t  from pescador c inner join pesc_seccion2 s on c.id = s.pescador_id  where s2_23_8_2 = 99  group by nom_dd) as C2 on DEP.ccdd  = C2.ccdd 
        left join (select ccdd,  count(*) as t  from pescador c inner join pesc_seccion2 s on c.id = s.pescador_id  where s2_23_8_3 = 99  group by nom_dd) as C3 on DEP.ccdd  = C3.ccdd
        left join (select ccdd,  count(*) as t  from pescador c inner join pesc_seccion2 s on c.id = s.pescador_id  where s2_23_8_4 = 99  group by nom_dd) as C4 on DEP.ccdd  = C4.ccdd  
        left join (select ccdd,  count(*) as t  from pescador c inner join pesc_seccion2 s on c.id = s.pescador_id  where s2_23_8_5 = 99  group by nom_dd) as C5 on DEP.ccdd  = C5.ccdd  
        left join (select ccdd,  count(*) as t  from pescador c inner join pesc_seccion2 s on c.id = s.pescador_id  where s2_23_8_6 = 99  group by nom_dd) as C6 on DEP.ccdd  = C6.ccdd  
        left join (select ccdd,  count(*) as t  from pescador c inner join pesc_seccion2 s on c.id = s.pescador_id  where s2_23_8_7 = 99  group by nom_dd) as C7 on DEP.ccdd  = C7.ccdd  
        left join (select ccdd,  count(*) as t  from pescador c inner join pesc_seccion2 s on c.id = s.pescador_id  where s2_23_8_8 = 99  group by nom_dd) as C8 on DEP.ccdd  = C8.ccdd  
        left join (select ccdd,  count(*) as t  from pescador c inner join pesc_seccion2 s on c.id = s.pescador_id  where s2_23_8_9 = 99  group by nom_dd) as C9 on DEP.ccdd  = C9.ccdd  
        left join (select ccdd,  count(*) as t  from pescador c inner join pesc_seccion2 s on c.id = s.pescador_id  where s2_23_8_10 = 99  group by nom_dd) as C10 on DEP.ccdd  = C10.ccdd  ) as table11 
        on table1.ccdd = table11.ccdd;
        ");
    return $q;
}

function get_report23(){
    $q = $this->db->query("
        /* TABULADO N° 22  ------------------------ HIJOS   DEL PESCADOR ASISTEN AL COLEGIO  --------------------------------------*/
        select 
        DEP.CCDD, DEPARTAMENTO, ( COALESCE(C1.t,0) + COALESCE(C2.t,0) + COALESCE(C3.t,0) +  COALESCE(C4.t,0) +  COALESCE(C5.t,0) +  
        COALESCE(C6.t,0) + COALESCE(C7.t,0) + COALESCE(C8.t,0) +  COALESCE(C9.t,0)  + COALESCE(C10.t,0) +
        COALESCE(C11.t,0) + COALESCE(C12.t,0) + COALESCE(C13.t,0) + COALESCE(C14.t,0) + COALESCE(C15.t,0) +
        COALESCE(C16.t,0) + COALESCE(C17.t,0) + COALESCE(C18.t,0) + COALESCE(C19.t,0) + COALESCE(C20.t,0) +
        COALESCE(C21.t,0) + COALESCE(C22.t,0) + COALESCE(C23.t,0) + COALESCE(C24.t,0) + COALESCE(C25.t,0) +
        COALESCE(C26.t,0) + COALESCE(C27.t,0) + COALESCE(C28.t,0) + COALESCE(C29.t,0) + COALESCE(C30.t,0) ) AS TOTAL,
        ( COALESCE(C1.t,0) + COALESCE(C2.t,0) + COALESCE(C3.t,0) +  COALESCE(C4.t,0) +  COALESCE(C5.t,0) +  
        COALESCE(C6.t,0) + COALESCE(C7.t,0) + COALESCE(C8.t,0) +  COALESCE(C9.t,0)  + COALESCE(C10.t,0) ) as 'SI',  
        (COALESCE(C11.t,0) + COALESCE(C12.t,0) + COALESCE(C13.t,0) + COALESCE(C14.t,0) + COALESCE(C15.t,0) +
        COALESCE(C16.t,0) + COALESCE(C17.t,0) + COALESCE(C18.t,0) + COALESCE(C19.t,0) + COALESCE(C20.t,0)  ) AS 'NO',  
        (COALESCE(C21.t,0) + COALESCE(C22.t,0) + COALESCE(C23.t,0) + COALESCE(C24.t,0) + COALESCE(C25.t,0) +
        COALESCE(C26.t,0) + COALESCE(C27.t,0) + COALESCE(C28.t,0) + COALESCE(C29.t,0) + COALESCE(C30.t,0)  ) AS NEP
        from (select  distinct(departamento), ccdd from departamentos_tab order by departamento) as DEP 
        left join (select ccdd,  count(*) as t  from pescador c inner join pesc_seccion2 s on c.id = s.pescador_id  where s2_23_9_1 = 1 group by nom_dd) as C1 on DEP.ccdd  = C1.ccdd 
        left join (select ccdd,  count(*) as t  from pescador c inner join pesc_seccion2 s on c.id = s.pescador_id  where s2_23_9_2 = 1 group by nom_dd) as C2 on DEP.ccdd  = C2.ccdd 
        left join (select ccdd,  count(*) as t  from pescador c inner join pesc_seccion2 s on c.id = s.pescador_id  where s2_23_9_3 = 1 group by nom_dd) as C3 on DEP.ccdd  = C3.ccdd
        left join (select ccdd,  count(*) as t  from pescador c inner join pesc_seccion2 s on c.id = s.pescador_id  where s2_23_9_4 = 1 group by nom_dd) as C4 on DEP.ccdd  = C4.ccdd  
        left join (select ccdd,  count(*) as t  from pescador c inner join pesc_seccion2 s on c.id = s.pescador_id  where s2_23_9_5 = 1 group by nom_dd) as C5 on DEP.ccdd  = C5.ccdd  
        left join (select ccdd,  count(*) as t  from pescador c inner join pesc_seccion2 s on c.id = s.pescador_id  where s2_23_9_6 = 1 group by nom_dd) as C6 on DEP.ccdd  = C6.ccdd  
        left join (select ccdd,  count(*) as t  from pescador c inner join pesc_seccion2 s on c.id = s.pescador_id  where s2_23_9_7 = 1 group by nom_dd) as C7 on DEP.ccdd  = C7.ccdd  
        left join (select ccdd,  count(*) as t  from pescador c inner join pesc_seccion2 s on c.id = s.pescador_id  where s2_23_9_8 = 1 group by nom_dd) as C8 on DEP.ccdd  = C8.ccdd  
        left join (select ccdd,  count(*) as t  from pescador c inner join pesc_seccion2 s on c.id = s.pescador_id  where s2_23_9_9 = 1 group by nom_dd) as C9 on DEP.ccdd  = C9.ccdd  
        left join (select ccdd,  count(*) as t  from pescador c inner join pesc_seccion2 s on c.id = s.pescador_id  where s2_23_9_10 = 1 group by nom_dd) as C10 on DEP.ccdd  = C10.ccdd  
        left join (select ccdd,  count(*) as t  from pescador c inner join pesc_seccion2 s on c.id = s.pescador_id  where s2_23_9_1 = 2 group by nom_dd) as C11 on DEP.ccdd  = C11.ccdd 
        left join (select ccdd,  count(*) as t  from pescador c inner join pesc_seccion2 s on c.id = s.pescador_id  where s2_23_9_2 = 2 group by nom_dd) as C12 on DEP.ccdd  = C12.ccdd 
        left join (select ccdd,  count(*) as t  from pescador c inner join pesc_seccion2 s on c.id = s.pescador_id  where s2_23_9_3 = 2 group by nom_dd) as C13 on DEP.ccdd  = C13.ccdd
        left join (select ccdd,  count(*) as t  from pescador c inner join pesc_seccion2 s on c.id = s.pescador_id  where s2_23_9_4 = 2 group by nom_dd) as C14 on DEP.ccdd  = C14.ccdd  
        left join (select ccdd,  count(*) as t  from pescador c inner join pesc_seccion2 s on c.id = s.pescador_id  where s2_23_9_5 = 2 group by nom_dd) as C15 on DEP.ccdd  = C15.ccdd  
        left join (select ccdd,  count(*) as t  from pescador c inner join pesc_seccion2 s on c.id = s.pescador_id  where s2_23_9_6 = 2 group by nom_dd) as C16 on DEP.ccdd  = C16.ccdd  
        left join (select ccdd,  count(*) as t  from pescador c inner join pesc_seccion2 s on c.id = s.pescador_id  where s2_23_9_7 = 2 group by nom_dd) as C17 on DEP.ccdd  = C17.ccdd  
        left join (select ccdd,  count(*) as t  from pescador c inner join pesc_seccion2 s on c.id = s.pescador_id  where s2_23_9_8 = 2 group by nom_dd) as C18 on DEP.ccdd  = C18.ccdd  
        left join (select ccdd,  count(*) as t  from pescador c inner join pesc_seccion2 s on c.id = s.pescador_id  where s2_23_9_9 = 2 group by nom_dd) as C19 on DEP.ccdd  = C19.ccdd  
        left join (select ccdd,  count(*) as t  from pescador c inner join pesc_seccion2 s on c.id = s.pescador_id  where s2_23_9_10 = 2 group by nom_dd) as C20 on DEP.ccdd  = C20.ccdd 
        left join (select ccdd,  count(*) as t  from pescador c inner join pesc_seccion2 s on c.id = s.pescador_id  where s2_23_9_1 = 9 group by nom_dd) as C21 on DEP.ccdd  = C21.ccdd 
        left join (select ccdd,  count(*) as t  from pescador c inner join pesc_seccion2 s on c.id = s.pescador_id  where s2_23_9_2 = 9 group by nom_dd) as C22 on DEP.ccdd  = C22.ccdd 
        left join (select ccdd,  count(*) as t  from pescador c inner join pesc_seccion2 s on c.id = s.pescador_id  where s2_23_9_3 = 9 group by nom_dd) as C23 on DEP.ccdd  = C23.ccdd
        left join (select ccdd,  count(*) as t  from pescador c inner join pesc_seccion2 s on c.id = s.pescador_id  where s2_23_9_4 = 9 group by nom_dd) as C24 on DEP.ccdd  = C24.ccdd  
        left join (select ccdd,  count(*) as t  from pescador c inner join pesc_seccion2 s on c.id = s.pescador_id  where s2_23_9_5 = 9 group by nom_dd) as C25 on DEP.ccdd  = C25.ccdd  
        left join (select ccdd,  count(*) as t  from pescador c inner join pesc_seccion2 s on c.id = s.pescador_id  where s2_23_9_6 = 9 group by nom_dd) as C26 on DEP.ccdd  = C26.ccdd  
        left join (select ccdd,  count(*) as t  from pescador c inner join pesc_seccion2 s on c.id = s.pescador_id  where s2_23_9_7 = 9 group by nom_dd) as C27 on DEP.ccdd  = C27.ccdd  
        left join (select ccdd,  count(*) as t  from pescador c inner join pesc_seccion2 s on c.id = s.pescador_id  where s2_23_9_8 = 9 group by nom_dd) as C28 on DEP.ccdd  = C28.ccdd  
        left join (select ccdd,  count(*) as t  from pescador c inner join pesc_seccion2 s on c.id = s.pescador_id  where s2_23_9_9 = 9 group by nom_dd) as C29 on DEP.ccdd  = C29.ccdd  
        left join (select ccdd,  count(*) as t  from pescador c inner join pesc_seccion2 s on c.id = s.pescador_id  where s2_23_9_10 = 9 group by nom_dd) as C30 on DEP.ccdd  = C30.ccdd  ;

        ");
    return $q;
}

function get_report24(){
    $q = $this->db->query("
        /* TABULADO N° 24  ------------------------ HIJOS   DEL PESCADOR TIPO COLEGIO  QUE ASISTEN  --------------------------------------*/
        select 
        DEP.CCDD, DEPARTAMENTO, ( COALESCE(C1.t,0) + COALESCE(C2.t,0) + COALESCE(C3.t,0) +  COALESCE(C4.t,0) +  COALESCE(C5.t,0) +  
        COALESCE(C6.t,0) + COALESCE(C7.t,0) + COALESCE(C8.t,0) +  COALESCE(C9.t,0)  + COALESCE(C10.t,0) +
        COALESCE(C11.t,0) + COALESCE(C12.t,0) + COALESCE(C13.t,0) + COALESCE(C14.t,0) + COALESCE(C15.t,0) +
        COALESCE(C16.t,0) + COALESCE(C17.t,0) + COALESCE(C18.t,0) + COALESCE(C19.t,0) + COALESCE(C20.t,0)  +
        COALESCE(C21.t,0) + COALESCE(C22.t,0) + COALESCE(C23.t,0) + COALESCE(C24.t,0) + COALESCE(C25.t,0) +
        COALESCE(C26.t,0) + COALESCE(C27.t,0) + COALESCE(C28.t,0) + COALESCE(C29.t,0) + COALESCE(C30.t,0)) AS TOTAL,
        ( COALESCE(C1.t,0) + COALESCE(C2.t,0) + COALESCE(C3.t,0) +  COALESCE(C4.t,0) +  COALESCE(C5.t,0) +  
        COALESCE(C6.t,0) + COALESCE(C7.t,0) + COALESCE(C8.t,0) +  COALESCE(C9.t,0)  + COALESCE(C10.t,0) ) as 'ESTATAL',  
        (COALESCE(C11.t,0) + COALESCE(C12.t,0) + COALESCE(C13.t,0) + COALESCE(C14.t,0) + COALESCE(C15.t,0) +
        COALESCE(C16.t,0) + COALESCE(C17.t,0) + COALESCE(C18.t,0) + COALESCE(C19.t,0) + COALESCE(C20.t,0)  ) AS 'PRIVADA',  
        (COALESCE(C21.t,0) + COALESCE(C22.t,0) + COALESCE(C23.t,0) + COALESCE(C24.t,0) + COALESCE(C25.t,0) +
        COALESCE(C26.t,0) + COALESCE(C27.t,0) + COALESCE(C28.t,0) + COALESCE(C29.t,0) + COALESCE(C30.t,0)  ) AS NEP
        from (select  distinct(departamento), ccdd from departamentos_tab order by departamento) as DEP 
        left join (select ccdd,  count(*) as t  from pescador c inner join pesc_seccion2 s on c.id = s.pescador_id  where s2_23_10_1 = 1 group by nom_dd) as C1 on DEP.ccdd  = C1.ccdd 
        left join (select ccdd,  count(*) as t  from pescador c inner join pesc_seccion2 s on c.id = s.pescador_id  where s2_23_10_2 = 1 group by nom_dd) as C2 on DEP.ccdd  = C2.ccdd 
        left join (select ccdd,  count(*) as t  from pescador c inner join pesc_seccion2 s on c.id = s.pescador_id  where s2_23_10_3 = 1 group by nom_dd) as C3 on DEP.ccdd  = C3.ccdd
        left join (select ccdd,  count(*) as t  from pescador c inner join pesc_seccion2 s on c.id = s.pescador_id  where s2_23_10_4 = 1 group by nom_dd) as C4 on DEP.ccdd  = C4.ccdd  
        left join (select ccdd,  count(*) as t  from pescador c inner join pesc_seccion2 s on c.id = s.pescador_id  where s2_23_10_5 = 1 group by nom_dd) as C5 on DEP.ccdd  = C5.ccdd  
        left join (select ccdd,  count(*) as t  from pescador c inner join pesc_seccion2 s on c.id = s.pescador_id  where s2_23_10_6 = 1 group by nom_dd) as C6 on DEP.ccdd  = C6.ccdd  
        left join (select ccdd,  count(*) as t  from pescador c inner join pesc_seccion2 s on c.id = s.pescador_id  where s2_23_10_7 = 1 group by nom_dd) as C7 on DEP.ccdd  = C7.ccdd  
        left join (select ccdd,  count(*) as t  from pescador c inner join pesc_seccion2 s on c.id = s.pescador_id  where s2_23_10_8 = 1 group by nom_dd) as C8 on DEP.ccdd  = C8.ccdd  
        left join (select ccdd,  count(*) as t  from pescador c inner join pesc_seccion2 s on c.id = s.pescador_id  where s2_23_10_9 = 1 group by nom_dd) as C9 on DEP.ccdd  = C9.ccdd  
        left join (select ccdd,  count(*) as t  from pescador c inner join pesc_seccion2 s on c.id = s.pescador_id  where s2_23_10_10 = 1 group by nom_dd) as C10 on DEP.ccdd  = C10.ccdd  
        left join (select ccdd,  count(*) as t  from pescador c inner join pesc_seccion2 s on c.id = s.pescador_id  where s2_23_10_1 = 2 group by nom_dd) as C11 on DEP.ccdd  = C11.ccdd 
        left join (select ccdd,  count(*) as t  from pescador c inner join pesc_seccion2 s on c.id = s.pescador_id  where s2_23_10_2 = 2 group by nom_dd) as C12 on DEP.ccdd  = C12.ccdd 
        left join (select ccdd,  count(*) as t  from pescador c inner join pesc_seccion2 s on c.id = s.pescador_id  where s2_23_10_3 = 2 group by nom_dd) as C13 on DEP.ccdd  = C13.ccdd
        left join (select ccdd,  count(*) as t  from pescador c inner join pesc_seccion2 s on c.id = s.pescador_id  where s2_23_10_4 = 2 group by nom_dd) as C14 on DEP.ccdd  = C14.ccdd  
        left join (select ccdd,  count(*) as t  from pescador c inner join pesc_seccion2 s on c.id = s.pescador_id  where s2_23_10_5 = 2 group by nom_dd) as C15 on DEP.ccdd  = C15.ccdd  
        left join (select ccdd,  count(*) as t  from pescador c inner join pesc_seccion2 s on c.id = s.pescador_id  where s2_23_10_6 = 2 group by nom_dd) as C16 on DEP.ccdd  = C16.ccdd  
        left join (select ccdd,  count(*) as t  from pescador c inner join pesc_seccion2 s on c.id = s.pescador_id  where s2_23_10_7 = 2 group by nom_dd) as C17 on DEP.ccdd  = C17.ccdd  
        left join (select ccdd,  count(*) as t  from pescador c inner join pesc_seccion2 s on c.id = s.pescador_id  where s2_23_10_8 = 2 group by nom_dd) as C18 on DEP.ccdd  = C18.ccdd  
        left join (select ccdd,  count(*) as t  from pescador c inner join pesc_seccion2 s on c.id = s.pescador_id  where s2_23_10_9 = 2 group by nom_dd) as C19 on DEP.ccdd  = C19.ccdd  
        left join (select ccdd,  count(*) as t  from pescador c inner join pesc_seccion2 s on c.id = s.pescador_id  where s2_23_10_10 = 2 group by nom_dd) as C20 on DEP.ccdd  = C20.ccdd 
        left join (select ccdd,  count(*) as t  from pescador c inner join pesc_seccion2 s on c.id = s.pescador_id  where s2_23_10_1 = 9 group by nom_dd) as C21 on DEP.ccdd  = C21.ccdd 
        left join (select ccdd,  count(*) as t  from pescador c inner join pesc_seccion2 s on c.id = s.pescador_id  where s2_23_10_2 = 9 group by nom_dd) as C22 on DEP.ccdd  = C22.ccdd 
        left join (select ccdd,  count(*) as t  from pescador c inner join pesc_seccion2 s on c.id = s.pescador_id  where s2_23_10_3 = 9 group by nom_dd) as C23 on DEP.ccdd  = C23.ccdd
        left join (select ccdd,  count(*) as t  from pescador c inner join pesc_seccion2 s on c.id = s.pescador_id  where s2_23_10_4 = 9 group by nom_dd) as C24 on DEP.ccdd  = C24.ccdd  
        left join (select ccdd,  count(*) as t  from pescador c inner join pesc_seccion2 s on c.id = s.pescador_id  where s2_23_10_5 = 9 group by nom_dd) as C25 on DEP.ccdd  = C25.ccdd  
        left join (select ccdd,  count(*) as t  from pescador c inner join pesc_seccion2 s on c.id = s.pescador_id  where s2_23_10_6 = 9 group by nom_dd) as C26 on DEP.ccdd  = C26.ccdd  
        left join (select ccdd,  count(*) as t  from pescador c inner join pesc_seccion2 s on c.id = s.pescador_id  where s2_23_10_7 = 9 group by nom_dd) as C27 on DEP.ccdd  = C27.ccdd  
        left join (select ccdd,  count(*) as t  from pescador c inner join pesc_seccion2 s on c.id = s.pescador_id  where s2_23_10_8 = 9 group by nom_dd) as C28 on DEP.ccdd  = C28.ccdd  
        left join (select ccdd,  count(*) as t  from pescador c inner join pesc_seccion2 s on c.id = s.pescador_id  where s2_23_10_9 = 9 group by nom_dd) as C29 on DEP.ccdd  = C29.ccdd  
        left join (select ccdd,  count(*) as t  from pescador c inner join pesc_seccion2 s on c.id = s.pescador_id  where s2_23_10_10 = 9 group by nom_dd) as C30 on DEP.ccdd  = C30.ccdd  ;
        ");
    return $q;
}

function get_report25(){
    $q = $this->db->query("
        /* TABULADO N° 24  ------------------------ ACTIVIDAD DE LOS HIJOS  --------------------------------------*/
        SELECT  table1.CCDD, table1.DEPARTAMENTO, 
        (AGRICOLA + PECUARIA + ACUICOLA +  PESCA  + CAZA + CONSTRUCCION + COMERCIO + OTRA +
        NINGUNA  + NEP) as TOTAL, AGRICOLA, PECUARIA, ACUICOLA,  PESCA ,  CAZA, CONSTRUCCION, COMERCIO, OTRA,
        NINGUNA, NEP FROM
        (select 
        DEP.CCDD, DEPARTAMENTO, ( COALESCE(C1.t,0) + COALESCE(C2.t,0) + COALESCE(C3.t,0) +  COALESCE(C4.t,0) +  COALESCE(C5.t,0) +  
        COALESCE(C6.t,0) + COALESCE(C7.t,0) + COALESCE(C8.t,0) +  COALESCE(C9.t,0)  + COALESCE(C10.t,0)  ) AS AGRICOLA
        from (select  distinct(departamento), ccdd from departamentos_tab order by departamento) as DEP 
        left join (select ccdd,  count(*) as t  from pescador c inner join pesc_seccion2 s on c.id = s.pescador_id  where s2_23_11_1 = 1  group by nom_dd) as C1 on DEP.ccdd  = C1.ccdd 
        left join (select ccdd,  count(*) as t  from pescador c inner join pesc_seccion2 s on c.id = s.pescador_id  where s2_23_11_2 = 1  group by nom_dd) as C2 on DEP.ccdd  = C2.ccdd 
        left join (select ccdd,  count(*) as t  from pescador c inner join pesc_seccion2 s on c.id = s.pescador_id  where s2_23_11_3 = 1  group by nom_dd) as C3 on DEP.ccdd  = C3.ccdd
        left join (select ccdd,  count(*) as t  from pescador c inner join pesc_seccion2 s on c.id = s.pescador_id  where s2_23_11_4 = 1  group by nom_dd) as C4 on DEP.ccdd  = C4.ccdd  
        left join (select ccdd,  count(*) as t  from pescador c inner join pesc_seccion2 s on c.id = s.pescador_id  where s2_23_11_5 = 1  group by nom_dd) as C5 on DEP.ccdd  = C5.ccdd  
        left join (select ccdd,  count(*) as t  from pescador c inner join pesc_seccion2 s on c.id = s.pescador_id  where s2_23_11_6 = 1  group by nom_dd) as C6 on DEP.ccdd  = C6.ccdd  
        left join (select ccdd,  count(*) as t  from pescador c inner join pesc_seccion2 s on c.id = s.pescador_id  where s2_23_11_7 = 1  group by nom_dd) as C7 on DEP.ccdd  = C7.ccdd  
        left join (select ccdd,  count(*) as t  from pescador c inner join pesc_seccion2 s on c.id = s.pescador_id  where s2_23_11_8 = 1  group by nom_dd) as C8 on DEP.ccdd  = C8.ccdd  
        left join (select ccdd,  count(*) as t  from pescador c inner join pesc_seccion2 s on c.id = s.pescador_id  where s2_23_11_9 = 1  group by nom_dd) as C9 on DEP.ccdd  = C9.ccdd  
        left join (select ccdd,  count(*) as t  from pescador c inner join pesc_seccion2 s on c.id = s.pescador_id  where s2_23_11_10 = 1  group by nom_dd) as C10 on DEP.ccdd  = C10.ccdd  ) as table1 
        inner join 
        (select 
        DEP.CCDD, DEPARTAMENTO, ( COALESCE(C1.t,0) + COALESCE(C2.t,0) + COALESCE(C3.t,0) +  COALESCE(C4.t,0) +  COALESCE(C5.t,0) +  
        COALESCE(C6.t,0) + COALESCE(C7.t,0) + COALESCE(C8.t,0) +  COALESCE(C9.t,0)  + COALESCE(C10.t,0)  ) as PECUARIA
        from (select  distinct(departamento), ccdd from departamentos_tab order by departamento) as DEP 
        left join (select ccdd,  count(*) as t  from pescador c inner join pesc_seccion2 s on c.id = s.pescador_id  where s2_23_11_1 = 2  group by nom_dd) as C1 on DEP.ccdd  = C1.ccdd 
        left join (select ccdd,  count(*) as t  from pescador c inner join pesc_seccion2 s on c.id = s.pescador_id  where s2_23_11_2 = 2  group by nom_dd) as C2 on DEP.ccdd  = C2.ccdd 
        left join (select ccdd,  count(*) as t  from pescador c inner join pesc_seccion2 s on c.id = s.pescador_id  where s2_23_11_3 = 2  group by nom_dd) as C3 on DEP.ccdd  = C3.ccdd
        left join (select ccdd,  count(*) as t  from pescador c inner join pesc_seccion2 s on c.id = s.pescador_id  where s2_23_11_4 = 2  group by nom_dd) as C4 on DEP.ccdd  = C4.ccdd  
        left join (select ccdd,  count(*) as t  from pescador c inner join pesc_seccion2 s on c.id = s.pescador_id  where s2_23_11_5 = 2  group by nom_dd) as C5 on DEP.ccdd  = C5.ccdd  
        left join (select ccdd,  count(*) as t  from pescador c inner join pesc_seccion2 s on c.id = s.pescador_id  where s2_23_11_6 = 2  group by nom_dd) as C6 on DEP.ccdd  = C6.ccdd  
        left join (select ccdd,  count(*) as t  from pescador c inner join pesc_seccion2 s on c.id = s.pescador_id  where s2_23_11_7 = 2  group by nom_dd) as C7 on DEP.ccdd  = C7.ccdd  
        left join (select ccdd,  count(*) as t  from pescador c inner join pesc_seccion2 s on c.id = s.pescador_id  where s2_23_11_8 = 2  group by nom_dd) as C8 on DEP.ccdd  = C8.ccdd  
        left join (select ccdd,  count(*) as t  from pescador c inner join pesc_seccion2 s on c.id = s.pescador_id  where s2_23_11_9 = 2  group by nom_dd) as C9 on DEP.ccdd  = C9.ccdd  
        left join (select ccdd,  count(*) as t  from pescador c inner join pesc_seccion2 s on c.id = s.pescador_id  where s2_23_11_10 = 2  group by nom_dd) as C10 on DEP.ccdd  = C10.ccdd  ) as table2 
        on table1.ccdd = table2.ccdd
        inner join 
        (select 
        DEP.CCDD, DEPARTAMENTO, ( COALESCE(C1.t,0) + COALESCE(C2.t,0) + COALESCE(C3.t,0) +  COALESCE(C4.t,0) +  COALESCE(C5.t,0) +  
        COALESCE(C6.t,0) + COALESCE(C7.t,0) + COALESCE(C8.t,0) +  COALESCE(C9.t,0)  + COALESCE(C10.t,0)  ) as ACUICOLA
        from (select  distinct(departamento), ccdd from departamentos_tab order by departamento) as DEP 
        left join (select ccdd,  count(*) as t  from pescador c inner join pesc_seccion2 s on c.id = s.pescador_id  where s2_23_11_1 = 3  group by nom_dd) as C1 on DEP.ccdd  = C1.ccdd 
        left join (select ccdd,  count(*) as t  from pescador c inner join pesc_seccion2 s on c.id = s.pescador_id  where s2_23_11_2 = 3  group by nom_dd) as C2 on DEP.ccdd  = C2.ccdd 
        left join (select ccdd,  count(*) as t  from pescador c inner join pesc_seccion2 s on c.id = s.pescador_id  where s2_23_11_3 = 3  group by nom_dd) as C3 on DEP.ccdd  = C3.ccdd
        left join (select ccdd,  count(*) as t  from pescador c inner join pesc_seccion2 s on c.id = s.pescador_id  where s2_23_11_4 = 3  group by nom_dd) as C4 on DEP.ccdd  = C4.ccdd  
        left join (select ccdd,  count(*) as t  from pescador c inner join pesc_seccion2 s on c.id = s.pescador_id  where s2_23_11_5 = 3  group by nom_dd) as C5 on DEP.ccdd  = C5.ccdd  
        left join (select ccdd,  count(*) as t  from pescador c inner join pesc_seccion2 s on c.id = s.pescador_id  where s2_23_11_6 = 3  group by nom_dd) as C6 on DEP.ccdd  = C6.ccdd  
        left join (select ccdd,  count(*) as t  from pescador c inner join pesc_seccion2 s on c.id = s.pescador_id  where s2_23_11_7 = 3  group by nom_dd) as C7 on DEP.ccdd  = C7.ccdd  
        left join (select ccdd,  count(*) as t  from pescador c inner join pesc_seccion2 s on c.id = s.pescador_id  where s2_23_11_8 = 3  group by nom_dd) as C8 on DEP.ccdd  = C8.ccdd  
        left join (select ccdd,  count(*) as t  from pescador c inner join pesc_seccion2 s on c.id = s.pescador_id  where s2_23_11_9 = 3  group by nom_dd) as C9 on DEP.ccdd  = C9.ccdd  
        left join (select ccdd,  count(*) as t  from pescador c inner join pesc_seccion2 s on c.id = s.pescador_id  where s2_23_11_10 = 3  group by nom_dd) as C10 on DEP.ccdd  = C10.ccdd  ) as table3 
        on table1.ccdd = table3.ccdd
        inner join 
        (select 
        DEP.CCDD, DEPARTAMENTO, ( COALESCE(C1.t,0) + COALESCE(C2.t,0) + COALESCE(C3.t,0) +  COALESCE(C4.t,0) +  COALESCE(C5.t,0) +  
        COALESCE(C6.t,0) + COALESCE(C7.t,0) + COALESCE(C8.t,0) +  COALESCE(C9.t,0)  + COALESCE(C10.t,0)  ) as PESCA
        from (select  distinct(departamento), ccdd from departamentos_tab order by departamento) as DEP 
        left join (select ccdd,  count(*) as t  from pescador c inner join pesc_seccion2 s on c.id = s.pescador_id  where s2_23_11_1 = 4  group by nom_dd) as C1 on DEP.ccdd  = C1.ccdd 
        left join (select ccdd,  count(*) as t  from pescador c inner join pesc_seccion2 s on c.id = s.pescador_id  where s2_23_11_2 = 4  group by nom_dd) as C2 on DEP.ccdd  = C2.ccdd 
        left join (select ccdd,  count(*) as t  from pescador c inner join pesc_seccion2 s on c.id = s.pescador_id  where s2_23_11_3 = 4  group by nom_dd) as C3 on DEP.ccdd  = C3.ccdd
        left join (select ccdd,  count(*) as t  from pescador c inner join pesc_seccion2 s on c.id = s.pescador_id  where s2_23_11_4 = 4  group by nom_dd) as C4 on DEP.ccdd  = C4.ccdd  
        left join (select ccdd,  count(*) as t  from pescador c inner join pesc_seccion2 s on c.id = s.pescador_id  where s2_23_11_5 = 4  group by nom_dd) as C5 on DEP.ccdd  = C5.ccdd  
        left join (select ccdd,  count(*) as t  from pescador c inner join pesc_seccion2 s on c.id = s.pescador_id  where s2_23_11_6 = 4  group by nom_dd) as C6 on DEP.ccdd  = C6.ccdd  
        left join (select ccdd,  count(*) as t  from pescador c inner join pesc_seccion2 s on c.id = s.pescador_id  where s2_23_11_7 = 4  group by nom_dd) as C7 on DEP.ccdd  = C7.ccdd  
        left join (select ccdd,  count(*) as t  from pescador c inner join pesc_seccion2 s on c.id = s.pescador_id  where s2_23_11_8 = 4  group by nom_dd) as C8 on DEP.ccdd  = C8.ccdd  
        left join (select ccdd,  count(*) as t  from pescador c inner join pesc_seccion2 s on c.id = s.pescador_id  where s2_23_11_9 = 4  group by nom_dd) as C9 on DEP.ccdd  = C9.ccdd  
        left join (select ccdd,  count(*) as t  from pescador c inner join pesc_seccion2 s on c.id = s.pescador_id  where s2_23_11_10 = 4  group by nom_dd) as C10 on DEP.ccdd  = C10.ccdd  ) as table4 
        on table1.ccdd = table4.ccdd
        inner join 
        (select 
        DEP.CCDD, DEPARTAMENTO, ( COALESCE(C1.t,0) + COALESCE(C2.t,0) + COALESCE(C3.t,0) +  COALESCE(C4.t,0) +  COALESCE(C5.t,0) +  
        COALESCE(C6.t,0) + COALESCE(C7.t,0) + COALESCE(C8.t,0) +  COALESCE(C9.t,0)  + COALESCE(C10.t,0)  ) as CAZA
        from (select  distinct(departamento), ccdd from departamentos_tab order by departamento) as DEP 
        left join (select ccdd,  count(*) as t  from pescador c inner join pesc_seccion2 s on c.id = s.pescador_id  where s2_23_11_1 = 5  group by nom_dd) as C1 on DEP.ccdd  = C1.ccdd 
        left join (select ccdd,  count(*) as t  from pescador c inner join pesc_seccion2 s on c.id = s.pescador_id  where s2_23_11_2 = 5  group by nom_dd) as C2 on DEP.ccdd  = C2.ccdd 
        left join (select ccdd,  count(*) as t  from pescador c inner join pesc_seccion2 s on c.id = s.pescador_id  where s2_23_11_3 = 5  group by nom_dd) as C3 on DEP.ccdd  = C3.ccdd
        left join (select ccdd,  count(*) as t  from pescador c inner join pesc_seccion2 s on c.id = s.pescador_id  where s2_23_11_4 = 5  group by nom_dd) as C4 on DEP.ccdd  = C4.ccdd  
        left join (select ccdd,  count(*) as t  from pescador c inner join pesc_seccion2 s on c.id = s.pescador_id  where s2_23_11_5 = 5  group by nom_dd) as C5 on DEP.ccdd  = C5.ccdd  
        left join (select ccdd,  count(*) as t  from pescador c inner join pesc_seccion2 s on c.id = s.pescador_id  where s2_23_11_6 = 5  group by nom_dd) as C6 on DEP.ccdd  = C6.ccdd  
        left join (select ccdd,  count(*) as t  from pescador c inner join pesc_seccion2 s on c.id = s.pescador_id  where s2_23_11_7 = 5  group by nom_dd) as C7 on DEP.ccdd  = C7.ccdd  
        left join (select ccdd,  count(*) as t  from pescador c inner join pesc_seccion2 s on c.id = s.pescador_id  where s2_23_11_8 = 5  group by nom_dd) as C8 on DEP.ccdd  = C8.ccdd  
        left join (select ccdd,  count(*) as t  from pescador c inner join pesc_seccion2 s on c.id = s.pescador_id  where s2_23_11_9 = 5  group by nom_dd) as C9 on DEP.ccdd  = C9.ccdd  
        left join (select ccdd,  count(*) as t  from pescador c inner join pesc_seccion2 s on c.id = s.pescador_id  where s2_23_11_10 = 5  group by nom_dd) as C10 on DEP.ccdd  = C10.ccdd  ) as table5 
        on table1.ccdd = table5.ccdd
        inner join 
        (select 
        DEP.CCDD, DEPARTAMENTO, ( COALESCE(C1.t,0) + COALESCE(C2.t,0) + COALESCE(C3.t,0) +  COALESCE(C4.t,0) +  COALESCE(C5.t,0) +  
        COALESCE(C6.t,0) + COALESCE(C7.t,0) + COALESCE(C8.t,0) +  COALESCE(C9.t,0)  + COALESCE(C10.t,0)  ) as CONSTRUCCION
        from (select  distinct(departamento), ccdd from departamentos_tab order by departamento) as DEP 
        left join (select ccdd,  count(*) as t  from pescador c inner join pesc_seccion2 s on c.id = s.pescador_id  where s2_23_11_1 = 6  group by nom_dd) as C1 on DEP.ccdd  = C1.ccdd 
        left join (select ccdd,  count(*) as t  from pescador c inner join pesc_seccion2 s on c.id = s.pescador_id  where s2_23_11_2 = 6  group by nom_dd) as C2 on DEP.ccdd  = C2.ccdd 
        left join (select ccdd,  count(*) as t  from pescador c inner join pesc_seccion2 s on c.id = s.pescador_id  where s2_23_11_3 = 6  group by nom_dd) as C3 on DEP.ccdd  = C3.ccdd
        left join (select ccdd,  count(*) as t  from pescador c inner join pesc_seccion2 s on c.id = s.pescador_id  where s2_23_11_4 = 6  group by nom_dd) as C4 on DEP.ccdd  = C4.ccdd  
        left join (select ccdd,  count(*) as t  from pescador c inner join pesc_seccion2 s on c.id = s.pescador_id  where s2_23_11_5 = 6  group by nom_dd) as C5 on DEP.ccdd  = C5.ccdd  
        left join (select ccdd,  count(*) as t  from pescador c inner join pesc_seccion2 s on c.id = s.pescador_id  where s2_23_11_6 = 6  group by nom_dd) as C6 on DEP.ccdd  = C6.ccdd  
        left join (select ccdd,  count(*) as t  from pescador c inner join pesc_seccion2 s on c.id = s.pescador_id  where s2_23_11_7 = 6  group by nom_dd) as C7 on DEP.ccdd  = C7.ccdd  
        left join (select ccdd,  count(*) as t  from pescador c inner join pesc_seccion2 s on c.id = s.pescador_id  where s2_23_11_8 = 6  group by nom_dd) as C8 on DEP.ccdd  = C8.ccdd  
        left join (select ccdd,  count(*) as t  from pescador c inner join pesc_seccion2 s on c.id = s.pescador_id  where s2_23_11_9 = 6  group by nom_dd) as C9 on DEP.ccdd  = C9.ccdd  
        left join (select ccdd,  count(*) as t  from pescador c inner join pesc_seccion2 s on c.id = s.pescador_id  where s2_23_11_10 = 6  group by nom_dd) as C10 on DEP.ccdd  = C10.ccdd  ) as table6 
        on table1.ccdd = table6.ccdd
        inner join 
        (select 
        DEP.CCDD, DEPARTAMENTO, ( COALESCE(C1.t,0) + COALESCE(C2.t,0) + COALESCE(C3.t,0) +  COALESCE(C4.t,0) +  COALESCE(C5.t,0) +  
        COALESCE(C6.t,0) + COALESCE(C7.t,0) + COALESCE(C8.t,0) +  COALESCE(C9.t,0)  + COALESCE(C10.t,0)  ) as COMERCIO
        from (select  distinct(departamento), ccdd from departamentos_tab order by departamento) as DEP 
        left join (select ccdd,  count(*) as t  from pescador c inner join pesc_seccion2 s on c.id = s.pescador_id  where s2_23_11_1 = 7  group by nom_dd) as C1 on DEP.ccdd  = C1.ccdd 
        left join (select ccdd,  count(*) as t  from pescador c inner join pesc_seccion2 s on c.id = s.pescador_id  where s2_23_11_2 = 7  group by nom_dd) as C2 on DEP.ccdd  = C2.ccdd 
        left join (select ccdd,  count(*) as t  from pescador c inner join pesc_seccion2 s on c.id = s.pescador_id  where s2_23_11_3 = 7  group by nom_dd) as C3 on DEP.ccdd  = C3.ccdd
        left join (select ccdd,  count(*) as t  from pescador c inner join pesc_seccion2 s on c.id = s.pescador_id  where s2_23_11_4 = 7  group by nom_dd) as C4 on DEP.ccdd  = C4.ccdd  
        left join (select ccdd,  count(*) as t  from pescador c inner join pesc_seccion2 s on c.id = s.pescador_id  where s2_23_11_5 = 7  group by nom_dd) as C5 on DEP.ccdd  = C5.ccdd  
        left join (select ccdd,  count(*) as t  from pescador c inner join pesc_seccion2 s on c.id = s.pescador_id  where s2_23_11_6 = 7  group by nom_dd) as C6 on DEP.ccdd  = C6.ccdd  
        left join (select ccdd,  count(*) as t  from pescador c inner join pesc_seccion2 s on c.id = s.pescador_id  where s2_23_11_7 = 7  group by nom_dd) as C7 on DEP.ccdd  = C7.ccdd  
        left join (select ccdd,  count(*) as t  from pescador c inner join pesc_seccion2 s on c.id = s.pescador_id  where s2_23_11_8 = 7  group by nom_dd) as C8 on DEP.ccdd  = C8.ccdd  
        left join (select ccdd,  count(*) as t  from pescador c inner join pesc_seccion2 s on c.id = s.pescador_id  where s2_23_11_9 = 7  group by nom_dd) as C9 on DEP.ccdd  = C9.ccdd  
        left join (select ccdd,  count(*) as t  from pescador c inner join pesc_seccion2 s on c.id = s.pescador_id  where s2_23_11_10 = 7  group by nom_dd) as C10 on DEP.ccdd  = C10.ccdd  ) as table7 
        on table1.ccdd = table7.ccdd
        inner join 
        (select 
        DEP.CCDD, DEPARTAMENTO, ( COALESCE(C1.t,0) + COALESCE(C2.t,0) + COALESCE(C3.t,0) +  COALESCE(C4.t,0) +  COALESCE(C5.t,0) +  
        COALESCE(C6.t,0) + COALESCE(C7.t,0) + COALESCE(C8.t,0) +  COALESCE(C9.t,0)  + COALESCE(C10.t,0)  )as OTRA
        from (select  distinct(departamento), ccdd from departamentos_tab order by departamento) as DEP 
        left join (select ccdd,  count(*) as t  from pescador c inner join pesc_seccion2 s on c.id = s.pescador_id  where s2_23_11_1 = 8  group by nom_dd) as C1 on DEP.ccdd  = C1.ccdd 
        left join (select ccdd,  count(*) as t  from pescador c inner join pesc_seccion2 s on c.id = s.pescador_id  where s2_23_11_2 = 8  group by nom_dd) as C2 on DEP.ccdd  = C2.ccdd 
        left join (select ccdd,  count(*) as t  from pescador c inner join pesc_seccion2 s on c.id = s.pescador_id  where s2_23_11_3 = 8  group by nom_dd) as C3 on DEP.ccdd  = C3.ccdd
        left join (select ccdd,  count(*) as t  from pescador c inner join pesc_seccion2 s on c.id = s.pescador_id  where s2_23_11_4 = 8  group by nom_dd) as C4 on DEP.ccdd  = C4.ccdd  
        left join (select ccdd,  count(*) as t  from pescador c inner join pesc_seccion2 s on c.id = s.pescador_id  where s2_23_11_5 = 8  group by nom_dd) as C5 on DEP.ccdd  = C5.ccdd  
        left join (select ccdd,  count(*) as t  from pescador c inner join pesc_seccion2 s on c.id = s.pescador_id  where s2_23_11_6 = 8  group by nom_dd) as C6 on DEP.ccdd  = C6.ccdd  
        left join (select ccdd,  count(*) as t  from pescador c inner join pesc_seccion2 s on c.id = s.pescador_id  where s2_23_11_7 = 8  group by nom_dd) as C7 on DEP.ccdd  = C7.ccdd  
        left join (select ccdd,  count(*) as t  from pescador c inner join pesc_seccion2 s on c.id = s.pescador_id  where s2_23_11_8 = 8  group by nom_dd) as C8 on DEP.ccdd  = C8.ccdd  
        left join (select ccdd,  count(*) as t  from pescador c inner join pesc_seccion2 s on c.id = s.pescador_id  where s2_23_11_9 = 8  group by nom_dd) as C9 on DEP.ccdd  = C9.ccdd  
        left join (select ccdd,  count(*) as t  from pescador c inner join pesc_seccion2 s on c.id = s.pescador_id  where s2_23_11_10 = 8  group by nom_dd) as C10 on DEP.ccdd  = C10.ccdd  ) as table8 
        on table1.ccdd = table8.ccdd
        inner join 
        (select 
        DEP.CCDD, DEPARTAMENTO, ( COALESCE(C1.t,0) + COALESCE(C2.t,0) + COALESCE(C3.t,0) +  COALESCE(C4.t,0) +  COALESCE(C5.t,0) +  
        COALESCE(C6.t,0) + COALESCE(C7.t,0) + COALESCE(C8.t,0) +  COALESCE(C9.t,0)  + COALESCE(C10.t,0)  ) as NINGUNA
        from (select  distinct(departamento), ccdd from departamentos_tab order by departamento) as DEP 
        left join (select ccdd,  count(*) as t  from pescador c inner join pesc_seccion2 s on c.id = s.pescador_id  where s2_23_11_1 = 9  group by nom_dd) as C1 on DEP.ccdd  = C1.ccdd 
        left join (select ccdd,  count(*) as t  from pescador c inner join pesc_seccion2 s on c.id = s.pescador_id  where s2_23_11_2 = 9  group by nom_dd) as C2 on DEP.ccdd  = C2.ccdd 
        left join (select ccdd,  count(*) as t  from pescador c inner join pesc_seccion2 s on c.id = s.pescador_id  where s2_23_11_3 = 9  group by nom_dd) as C3 on DEP.ccdd  = C3.ccdd
        left join (select ccdd,  count(*) as t  from pescador c inner join pesc_seccion2 s on c.id = s.pescador_id  where s2_23_11_4 = 9  group by nom_dd) as C4 on DEP.ccdd  = C4.ccdd  
        left join (select ccdd,  count(*) as t  from pescador c inner join pesc_seccion2 s on c.id = s.pescador_id  where s2_23_11_5 = 9  group by nom_dd) as C5 on DEP.ccdd  = C5.ccdd  
        left join (select ccdd,  count(*) as t  from pescador c inner join pesc_seccion2 s on c.id = s.pescador_id  where s2_23_11_6 = 9  group by nom_dd) as C6 on DEP.ccdd  = C6.ccdd  
        left join (select ccdd,  count(*) as t  from pescador c inner join pesc_seccion2 s on c.id = s.pescador_id  where s2_23_11_7 = 9  group by nom_dd) as C7 on DEP.ccdd  = C7.ccdd  
        left join (select ccdd,  count(*) as t  from pescador c inner join pesc_seccion2 s on c.id = s.pescador_id  where s2_23_11_8 = 9  group by nom_dd) as C8 on DEP.ccdd  = C8.ccdd  
        left join (select ccdd,  count(*) as t  from pescador c inner join pesc_seccion2 s on c.id = s.pescador_id  where s2_23_11_9 = 9  group by nom_dd) as C9 on DEP.ccdd  = C9.ccdd  
        left join (select ccdd,  count(*) as t  from pescador c inner join pesc_seccion2 s on c.id = s.pescador_id  where s2_23_11_10 = 9  group by nom_dd) as C10 on DEP.ccdd  = C10.ccdd  ) as table9 
        on table1.ccdd = table9.ccdd
        inner join 
        (select 
        DEP.CCDD, DEPARTAMENTO, ( COALESCE(C1.t,0) + COALESCE(C2.t,0) + COALESCE(C3.t,0) +  COALESCE(C4.t,0) +  COALESCE(C5.t,0) +  
        COALESCE(C6.t,0) + COALESCE(C7.t,0) + COALESCE(C8.t,0) +  COALESCE(C9.t,0)  + COALESCE(C10.t,0)  ) as NEP
        from (select  distinct(departamento), ccdd from departamentos_tab order by departamento) as DEP 
        left join (select ccdd,  count(*) as t  from pescador c inner join pesc_seccion2 s on c.id = s.pescador_id  where s2_23_11_1 = 99  group by nom_dd) as C1 on DEP.ccdd  = C1.ccdd 
        left join (select ccdd,  count(*) as t  from pescador c inner join pesc_seccion2 s on c.id = s.pescador_id  where s2_23_11_2 = 99  group by nom_dd) as C2 on DEP.ccdd  = C2.ccdd 
        left join (select ccdd,  count(*) as t  from pescador c inner join pesc_seccion2 s on c.id = s.pescador_id  where s2_23_11_3 = 99  group by nom_dd) as C3 on DEP.ccdd  = C3.ccdd
        left join (select ccdd,  count(*) as t  from pescador c inner join pesc_seccion2 s on c.id = s.pescador_id  where s2_23_11_4 = 99  group by nom_dd) as C4 on DEP.ccdd  = C4.ccdd  
        left join (select ccdd,  count(*) as t  from pescador c inner join pesc_seccion2 s on c.id = s.pescador_id  where s2_23_11_5 = 99  group by nom_dd) as C5 on DEP.ccdd  = C5.ccdd  
        left join (select ccdd,  count(*) as t  from pescador c inner join pesc_seccion2 s on c.id = s.pescador_id  where s2_23_11_6 = 99  group by nom_dd) as C6 on DEP.ccdd  = C6.ccdd  
        left join (select ccdd,  count(*) as t  from pescador c inner join pesc_seccion2 s on c.id = s.pescador_id  where s2_23_11_7 = 99  group by nom_dd) as C7 on DEP.ccdd  = C7.ccdd  
        left join (select ccdd,  count(*) as t  from pescador c inner join pesc_seccion2 s on c.id = s.pescador_id  where s2_23_11_8 = 99  group by nom_dd) as C8 on DEP.ccdd  = C8.ccdd  
        left join (select ccdd,  count(*) as t  from pescador c inner join pesc_seccion2 s on c.id = s.pescador_id  where s2_23_11_9 = 99  group by nom_dd) as C9 on DEP.ccdd  = C9.ccdd  
        left join (select ccdd,  count(*) as t  from pescador c inner join pesc_seccion2 s on c.id = s.pescador_id  where s2_23_11_10 = 99  group by nom_dd) as C10 on DEP.ccdd  = C10.ccdd  ) as table10 
        on table1.ccdd = table10.ccdd;
        ");
    return $q;
}

function get_report26(){// Oojo, se saca ka variable otro, segun SUSANNE  ---- COALESCE(C7.t,0) as OTRA,
    $q = $this->db->query("
        /* TABULADO N° 25 ---------------- LA VIVIEDSA que ocupa------------------------*/
        select 
        DEP.CCDD, DEPARTAMENTO,  C0.t AS TOTAL,  
        COALESCE(C1.t,0) as ALQUILADA, COALESCE(C2.t,0) as PROPIA_INV, COALESCE(C3.t,0) as PROPIA_PAG, COALESCE(C4.t,0) as PROPIA_TOT, COALESCE(C5.t,0) as CEDIDA,
        COALESCE(C6.t,0) as FAMILIAR,  COALESCE(C8.t,0) as NEP
        from (select  distinct(departamento), ccdd from departamentos_tab order by departamento) as DEP 
        left join (select ccdd,  count(*) as t  from pescador a inner join pesc_seccion3 s on a.id = s.pescador_id  where s3_100 is not null group by nom_dd ) as C0 on DEP.ccdd  = C0.ccdd 
        left join (select ccdd,  count(*) as t  from pescador a inner join pesc_seccion3 s on a.id = s.pescador_id  where s3_100 = 1 group by nom_dd ) as C1 on DEP.ccdd  = C1.ccdd 
        left join (select ccdd,  count(*) as t  from pescador a inner join pesc_seccion3 s on a.id = s.pescador_id  where s3_100 = 2 group by nom_dd ) as C2 on DEP.ccdd  = C2.ccdd 
        left join (select ccdd,  count(*) as t  from pescador a inner join pesc_seccion3 s on a.id = s.pescador_id  where s3_100 = 3 group by nom_dd ) as C3 on DEP.ccdd  = C3.ccdd 
        left join (select ccdd,  count(*) as t  from pescador a inner join pesc_seccion3 s on a.id = s.pescador_id  where s3_100 = 4 group by nom_dd ) as C4 on DEP.ccdd  = C4.ccdd 
        left join (select ccdd,  count(*) as t  from pescador a inner join pesc_seccion3 s on a.id = s.pescador_id  where s3_100 = 5 group by nom_dd ) as C5 on DEP.ccdd  = C5.ccdd 
        left join (select ccdd,  count(*) as t  from pescador a inner join pesc_seccion3 s on a.id = s.pescador_id  where s3_100 = 6 group by nom_dd ) as C6 on DEP.ccdd  = C6.ccdd 
        left join (select ccdd,  count(*) as t  from pescador a inner join pesc_seccion3 s on a.id = s.pescador_id  where s3_100 = 9 group by nom_dd ) as C8 on DEP.ccdd  = C8.ccdd  ;
        ");
    return $q;
}

function get_report27(){
    $q = $this->db->query("
        /* TABULADO N° 26 ---------------- MATERIAL PAREDES------------------------*/
        select 
        DEP.CCDD, DEPARTAMENTO,  C0.t AS TOTAL,  
        COALESCE(C1.t,0) as LADRILLO, COALESCE(C2.t,0) as PIEDRA, COALESCE(C3.t,0) as ADOBE, COALESCE(C4.t,0) as CANIA, COALESCE(C5.t,0) as PIEDRA_BARRO,
        COALESCE(C6.t,0) as MADERA, COALESCE(C7.t,0) as ESTERA, COALESCE(C8.t,0) as CANIA_SIN_BARRO, COALESCE(C9.t,0) OTRA, COALESCE(C10.t,0) NO_TIENE, COALESCE(C11.t,0) NEP
        from (select  distinct(departamento), ccdd from departamentos_tab order by departamento) as DEP 
        left join (select ccdd,  count(*) as t  from pescador a inner join pesc_seccion3 s on a.id = s.pescador_id  where S3_200 is not null group by nom_dd ) as C0 on DEP.ccdd  = C0.ccdd 
        left join (select ccdd,  count(*) as t  from pescador a inner join pesc_seccion3 s on a.id = s.pescador_id  where S3_200 = 1 group by nom_dd ) as C1 on DEP.ccdd  = C1.ccdd 
        left join (select ccdd,  count(*) as t  from pescador a inner join pesc_seccion3 s on a.id = s.pescador_id  where S3_200 = 2 group by nom_dd ) as C2 on DEP.ccdd  = C2.ccdd 
        left join (select ccdd,  count(*) as t  from pescador a inner join pesc_seccion3 s on a.id = s.pescador_id  where S3_200 = 3 group by nom_dd ) as C3 on DEP.ccdd  = C3.ccdd 
        left join (select ccdd,  count(*) as t  from pescador a inner join pesc_seccion3 s on a.id = s.pescador_id  where S3_200 = 4 group by nom_dd ) as C4 on DEP.ccdd  = C4.ccdd 
        left join (select ccdd,  count(*) as t  from pescador a inner join pesc_seccion3 s on a.id = s.pescador_id  where S3_200 = 5 group by nom_dd ) as C5 on DEP.ccdd  = C5.ccdd 
        left join (select ccdd,  count(*) as t  from pescador a inner join pesc_seccion3 s on a.id = s.pescador_id  where S3_200 = 6 group by nom_dd ) as C6 on DEP.ccdd  = C6.ccdd 
        left join (select ccdd,  count(*) as t  from pescador a inner join pesc_seccion3 s on a.id = s.pescador_id  where S3_200 = 7 group by nom_dd ) as C7 on DEP.ccdd  = C7.ccdd 
        left join (select ccdd,  count(*) as t  from pescador a inner join pesc_seccion3 s on a.id = s.pescador_id  where S3_200 = 8 group by nom_dd ) as C8 on DEP.ccdd  = C8.ccdd 
        left join (select ccdd,  count(*) as t  from pescador a inner join pesc_seccion3 s on a.id = s.pescador_id  where S3_200 = 9 group by nom_dd ) as C9 on DEP.ccdd  = C9.ccdd 
        left join (select ccdd,  count(*) as t  from pescador a inner join pesc_seccion3 s on a.id = s.pescador_id  where S3_200 = 10 group by nom_dd ) as C10 on DEP.ccdd  = C10.ccdd 
        left join (select ccdd,  count(*) as t  from pescador a inner join pesc_seccion3 s on a.id = s.pescador_id  where S3_200 = 99 group by nom_dd ) as C11 on DEP.ccdd  = C11.ccdd ;
        ");
    return $q;
}

function get_report28(){
    $q = $this->db->query("
        /* TABULADO N° 28 ---------------- MATERIAL PISOS------------------------*/
        select 
        DEP.CCDD, DEPARTAMENTO,  C0.t AS TOTAL,  
        COALESCE(C1.t,0) as PARQUET, COALESCE(C2.t,0) as LAMINAS, COALESCE(C3.t,0) as LOSETAS, COALESCE(C4.t,0) as MADERA, COALESCE(C5.t,0) as CEMENTO,
        COALESCE(C6.t,0) as TIERRA, COALESCE(C7.t,0) as TOTORA , COALESCE(C8.t,0) as  OTRA, COALESCE(C9.t,0) as  NEP
        from (select  distinct(departamento), ccdd from departamentos_tab order by departamento) as DEP 
        left join (select ccdd,  count(*) as t  from pescador a inner join pesc_seccion3 s on a.id = s.pescador_id  where S3_300 is not null group by nom_dd ) as C0 on DEP.ccdd  = C0.ccdd 
        left join (select ccdd,  count(*) as t  from pescador a inner join pesc_seccion3 s on a.id = s.pescador_id  where S3_300 = 1 group by nom_dd ) as C1 on DEP.ccdd  = C1.ccdd 
        left join (select ccdd,  count(*) as t  from pescador a inner join pesc_seccion3 s on a.id = s.pescador_id  where S3_300 = 2 group by nom_dd ) as C2 on DEP.ccdd  = C2.ccdd 
        left join (select ccdd,  count(*) as t  from pescador a inner join pesc_seccion3 s on a.id = s.pescador_id  where S3_300 = 3 group by nom_dd ) as C3 on DEP.ccdd  = C3.ccdd 
        left join (select ccdd,  count(*) as t  from pescador a inner join pesc_seccion3 s on a.id = s.pescador_id  where S3_300 = 4 group by nom_dd ) as C4 on DEP.ccdd  = C4.ccdd 
        left join (select ccdd,  count(*) as t  from pescador a inner join pesc_seccion3 s on a.id = s.pescador_id  where S3_300 = 5 group by nom_dd ) as C5 on DEP.ccdd  = C5.ccdd 
        left join (select ccdd,  count(*) as t  from pescador a inner join pesc_seccion3 s on a.id = s.pescador_id  where S3_300 = 6 group by nom_dd ) as C6 on DEP.ccdd  = C6.ccdd 
        left join (select ccdd,  count(*) as t  from pescador a inner join pesc_seccion3 s on a.id = s.pescador_id  where S3_300 = 7 group by nom_dd ) as C7 on DEP.ccdd  = C7.ccdd 
        left join (select ccdd,  count(*) as t  from pescador a inner join pesc_seccion3 s on a.id = s.pescador_id  where S3_300 = 8 group by nom_dd ) as C8 on DEP.ccdd  = C8.ccdd
        left join (select ccdd,  count(*) as t  from pescador a inner join pesc_seccion3 s on a.id = s.pescador_id  where S3_300 = 9 group by nom_dd ) as C9 on DEP.ccdd  = C9.ccdd;
        ");
    return $q;
}

function get_report29(){
    $q = $this->db->query("
        /* TABULADO N° 28 ---------------- MATERIAL TECHOS------------------------*/
        select 
        DEP.CCDD, DEPARTAMENTO,  C0.t AS TOTAL,  
        COALESCE(C1.t,0) as CONCRETO, COALESCE(C2.t,0) as MADERA, COALESCE(C3.t,0) as TEJAS, COALESCE(C4.t,0) as PLANCHAS, COALESCE(C5.t,0) as CAÑA,
        COALESCE(C6.t,0) as ESTERA, COALESCE(C7.t,0) as PAJA, COALESCE(C8.t,0) as OTRA, COALESCE(C9.t,0) NEP
        from (select  distinct(departamento), ccdd from departamentos_tab order by departamento) as DEP 
        left join (select ccdd,  count(*) as t  from pescador a inner join pesc_seccion3 s on a.id = s.pescador_id  where S3_400 is not null group by nom_dd ) as C0 on DEP.ccdd  = C0.ccdd 
        left join (select ccdd,  count(*) as t  from pescador a inner join pesc_seccion3 s on a.id = s.pescador_id  where S3_400 = 1 group by nom_dd ) as C1 on DEP.ccdd  = C1.ccdd 
        left join (select ccdd,  count(*) as t  from pescador a inner join pesc_seccion3 s on a.id = s.pescador_id  where S3_400 = 2 group by nom_dd ) as C2 on DEP.ccdd  = C2.ccdd 
        left join (select ccdd,  count(*) as t  from pescador a inner join pesc_seccion3 s on a.id = s.pescador_id  where S3_400 = 3 group by nom_dd ) as C3 on DEP.ccdd  = C3.ccdd 
        left join (select ccdd,  count(*) as t  from pescador a inner join pesc_seccion3 s on a.id = s.pescador_id  where S3_400 = 4 group by nom_dd ) as C4 on DEP.ccdd  = C4.ccdd 
        left join (select ccdd,  count(*) as t  from pescador a inner join pesc_seccion3 s on a.id = s.pescador_id  where S3_400 = 5 group by nom_dd ) as C5 on DEP.ccdd  = C5.ccdd 
        left join (select ccdd,  count(*) as t  from pescador a inner join pesc_seccion3 s on a.id = s.pescador_id  where S3_400 = 6 group by nom_dd ) as C6 on DEP.ccdd  = C6.ccdd 
        left join (select ccdd,  count(*) as t  from pescador a inner join pesc_seccion3 s on a.id = s.pescador_id  where S3_400 = 7 group by nom_dd ) as C7 on DEP.ccdd  = C7.ccdd 
        left join (select ccdd,  count(*) as t  from pescador a inner join pesc_seccion3 s on a.id = s.pescador_id  where S3_400 = 8 group by nom_dd ) as C8 on DEP.ccdd  = C8.ccdd 
        left join (select ccdd,  count(*) as t  from pescador a inner join pesc_seccion3 s on a.id = s.pescador_id  where S3_400 = 9 group by nom_dd ) as C9 on DEP.ccdd  = C9.ccdd ;
        ");
    return $q;
}

function get_report30(){
    $q = $this->db->query("
        /* TABULADO N° 29 ---------------- ABASTECIMIENTO AGUA VIVIENDA------------------------*/
        select 
        DEP.CCDD, DEPARTAMENTO,  C0.t AS TOTAL,  
        COALESCE(C1.t,0) as AGUA_POTABLE, COALESCE(C2.t,0) as MADERA, COALESCE(C3.t,0) as TEJAS, COALESCE(C4.t,0) as PLANCHAS, COALESCE(C5.t,0) as CAÑA,
        COALESCE(C6.t,0) as ESTERA, COALESCE(C7.t,0) as PAJA, COALESCE(C8.t,0) as OTRA, COALESCE(C9.t,0) NEP
        from (select  distinct(departamento), ccdd from departamentos_tab order by departamento) as DEP 
        left join (select ccdd,  count(*) as t  from pescador a inner join pesc_seccion3 s on a.id = s.pescador_id  where S3_500 is not null group by nom_dd ) as C0 on DEP.ccdd  = C0.ccdd 
        left join (select ccdd,  count(*) as t  from pescador a inner join pesc_seccion3 s on a.id = s.pescador_id  where S3_500 = 1 group by nom_dd ) as C1 on DEP.ccdd  = C1.ccdd 
        left join (select ccdd,  count(*) as t  from pescador a inner join pesc_seccion3 s on a.id = s.pescador_id  where S3_500 = 2 group by nom_dd ) as C2 on DEP.ccdd  = C2.ccdd 
        left join (select ccdd,  count(*) as t  from pescador a inner join pesc_seccion3 s on a.id = s.pescador_id  where S3_500 = 3 group by nom_dd ) as C3 on DEP.ccdd  = C3.ccdd 
        left join (select ccdd,  count(*) as t  from pescador a inner join pesc_seccion3 s on a.id = s.pescador_id  where S3_500 = 4 group by nom_dd ) as C4 on DEP.ccdd  = C4.ccdd 
        left join (select ccdd,  count(*) as t  from pescador a inner join pesc_seccion3 s on a.id = s.pescador_id  where S3_500 = 5 group by nom_dd ) as C5 on DEP.ccdd  = C5.ccdd 
        left join (select ccdd,  count(*) as t  from pescador a inner join pesc_seccion3 s on a.id = s.pescador_id  where S3_500 = 6 group by nom_dd ) as C6 on DEP.ccdd  = C6.ccdd 
        left join (select ccdd,  count(*) as t  from pescador a inner join pesc_seccion3 s on a.id = s.pescador_id  where S3_500 = 7 group by nom_dd ) as C7 on DEP.ccdd  = C7.ccdd 
        left join (select ccdd,  count(*) as t  from pescador a inner join pesc_seccion3 s on a.id = s.pescador_id  where S3_500 = 8 group by nom_dd ) as C8 on DEP.ccdd  = C8.ccdd 
        left join (select ccdd,  count(*) as t  from pescador a inner join pesc_seccion3 s on a.id = s.pescador_id  where S3_500 = 9 group by nom_dd ) as C9 on DEP.ccdd  = C9.ccdd ;
        ");
    return $q;
}

function get_report31(){
    $q = $this->db->query("
        /* TABULADO N° 30 -AGUA TODOS LOS DIAS*/
        select 
        DEP.CCDD, DEPARTAMENTO,  C0.t AS TOTAL,  
        COALESCE(C1.t,0) as SI, COALESCE(C2.t,0) as 'NO',  COALESCE(C3.t,0) NEP
        from (select  distinct(departamento), ccdd from departamentos_tab order by departamento) as DEP 
        left join (select ccdd,  count(*) as t  from pescador a inner join pesc_seccion3 s on a.id = s.pescador_id  where S3_600 is not null group by nom_dd ) as C0 on DEP.ccdd  = C0.ccdd 
        left join (select ccdd,  count(*) as t  from pescador a inner join pesc_seccion3 s on a.id = s.pescador_id  where S3_600 = 1 group by nom_dd ) as C1 on DEP.ccdd  = C1.ccdd 
        left join (select ccdd,  count(*) as t  from pescador a inner join pesc_seccion3 s on a.id = s.pescador_id  where S3_600 = 2 group by nom_dd ) as C2 on DEP.ccdd  = C2.ccdd 
        left join (select ccdd,  count(*) as t  from pescador a inner join pesc_seccion3 s on a.id = s.pescador_id  where S3_600 = 9 group by nom_dd ) as C3 on DEP.ccdd  = C3.ccdd ;
        ");
    return $q;
}

function get_report32(){
    $q = $this->db->query("
        /* TABULADO N° 31 ----------------TIPO DE SERVICIO DE LA VIVIEDA------------------------*/
        select 
        DEP.CCDD, DEPARTAMENTO,  C0.t AS TOTAL,  
        COALESCE(C1.t,0) as DESAGUE_EN_VIVIENDA, COALESCE(C2.t,0) as DESAGUE_NO_VIVIENDA, COALESCE(C3.t,0) as LETRINA, COALESCE(C4.t,0) as POZO_SEPTICO, COALESCE(C5.t,0) as POZO_CIEGO,
        COALESCE(C6.t,0) as RIO, COALESCE(C7.t,0) as NO_TIENE, COALESCE(C8.t,0) as  NEP
        from (select  distinct(departamento), ccdd from departamentos_tab order by departamento) as DEP 
        left join (select ccdd,  count(*) as t  from pescador a inner join pesc_seccion3 s on a.id = s.pescador_id  where S3_700 is not null group by nom_dd ) as C0 on DEP.ccdd  = C0.ccdd 
        left join (select ccdd,  count(*) as t  from pescador a inner join pesc_seccion3 s on a.id = s.pescador_id  where S3_700 = 1 group by nom_dd ) as C1 on DEP.ccdd  = C1.ccdd 
        left join (select ccdd,  count(*) as t  from pescador a inner join pesc_seccion3 s on a.id = s.pescador_id  where S3_700 = 2 group by nom_dd ) as C2 on DEP.ccdd  = C2.ccdd 
        left join (select ccdd,  count(*) as t  from pescador a inner join pesc_seccion3 s on a.id = s.pescador_id  where S3_700 = 3 group by nom_dd ) as C3 on DEP.ccdd  = C3.ccdd 
        left join (select ccdd,  count(*) as t  from pescador a inner join pesc_seccion3 s on a.id = s.pescador_id  where S3_700 = 4 group by nom_dd ) as C4 on DEP.ccdd  = C4.ccdd 
        left join (select ccdd,  count(*) as t  from pescador a inner join pesc_seccion3 s on a.id = s.pescador_id  where S3_700 = 5 group by nom_dd ) as C5 on DEP.ccdd  = C5.ccdd 
        left join (select ccdd,  count(*) as t  from pescador a inner join pesc_seccion3 s on a.id = s.pescador_id  where S3_700 = 6 group by nom_dd ) as C6 on DEP.ccdd  = C6.ccdd 
        left join (select ccdd,  count(*) as t  from pescador a inner join pesc_seccion3 s on a.id = s.pescador_id  where S3_700 = 7 group by nom_dd ) as C7 on DEP.ccdd  = C7.ccdd 
        left join (select ccdd,  count(*) as t  from pescador a inner join pesc_seccion3 s on a.id = s.pescador_id  where S3_700 = 9 group by nom_dd ) as C8 on DEP.ccdd  = C8.ccdd;
        ");
    return $q;
}

function get_report33(){
    $q = $this->db->query("
        /* TABULADO N° 32 --------- ALUMBRADO TODOS LOS DIAS -----------------*/
        select 
        DEP.CCDD, DEPARTAMENTO,  C0.t AS TOTAL,  
        COALESCE(C1.t,0) as SI, COALESCE(C2.t,0) as 'NO',  COALESCE(C3.t,0) NEP
        from (select  distinct(departamento), ccdd from departamentos_tab order by departamento) as DEP 
        left join (select ccdd,  count(*) as t  from pescador a inner join pesc_seccion3 s on a.id = s.pescador_id  where S3_800 is not null group by nom_dd ) as C0 on DEP.ccdd  = C0.ccdd 
        left join (select ccdd,  count(*) as t  from pescador a inner join pesc_seccion3 s on a.id = s.pescador_id  where S3_800 = 1 group by nom_dd ) as C1 on DEP.ccdd  = C1.ccdd 
        left join (select ccdd,  count(*) as t  from pescador a inner join pesc_seccion3 s on a.id = s.pescador_id  where S3_800 = 2 group by nom_dd ) as C2 on DEP.ccdd  = C2.ccdd 
        left join (select ccdd,  count(*) as t  from pescador a inner join pesc_seccion3 s on a.id = s.pescador_id  where S3_800 = 9 group by nom_dd ) as C3 on DEP.ccdd  = C3.ccdd ;
        ");
    return $q;
}

function get_report34(){
    $q = $this->db->query("
        /* TABULADO N° 33 -------------------------- ELECTRODOMESTICOS-------------------------*/
        select 
        DEP.CCDD, DEPARTAMENTO,  C0.t AS TOTAL,  
        COALESCE(C1.t,0) as EQUIPO, COALESCE(C2.t,0) as TELEVISOR, COALESCE(C3.t,0) as DVD, COALESCE(C4.t,0) as LICUADORA, COALESCE(C5.t,0) as REFRIGERADORA,
        COALESCE(C6.t,0) as PLANCHA, COALESCE(C7.t,0) as COCINA, COALESCE(C8.t,0) as COMPUTADORA, COALESCE(C9.t,0) LAVADORA, COALESCE(C10.t,0) MICROHONDAS, COALESCE(C11.t,0) NINGUNO, COALESCE(C12.t,0) NEP
        from (select  distinct(departamento), ccdd from departamentos_tab order by departamento) as DEP 
        left join (select ccdd,  count(*) as t  from pescador a inner join pesc_seccion3 s on a.id = s.pescador_id  where S3_901 is not null group by nom_dd ) as C0 on DEP.ccdd  = C0.ccdd 
        left join (select ccdd,  count(*) as t  from pescador a inner join pesc_seccion3 s on a.id = s.pescador_id  where S3_901 = 1 group by nom_dd ) as C1 on DEP.ccdd  = C1.ccdd 
        left join (select ccdd,  count(*) as t  from pescador a inner join pesc_seccion3 s on a.id = s.pescador_id  where S3_902 = 1 group by nom_dd ) as C2 on DEP.ccdd  = C2.ccdd 
        left join (select ccdd,  count(*) as t  from pescador a inner join pesc_seccion3 s on a.id = s.pescador_id  where S3_903 = 1 group by nom_dd ) as C3 on DEP.ccdd  = C3.ccdd 
        left join (select ccdd,  count(*) as t  from pescador a inner join pesc_seccion3 s on a.id = s.pescador_id  where S3_904 = 1 group by nom_dd ) as C4 on DEP.ccdd  = C4.ccdd 
        left join (select ccdd,  count(*) as t  from pescador a inner join pesc_seccion3 s on a.id = s.pescador_id  where S3_905 = 1 group by nom_dd ) as C5 on DEP.ccdd  = C5.ccdd 
        left join (select ccdd,  count(*) as t  from pescador a inner join pesc_seccion3 s on a.id = s.pescador_id  where S3_906 = 1 group by nom_dd ) as C6 on DEP.ccdd  = C6.ccdd 
        left join (select ccdd,  count(*) as t  from pescador a inner join pesc_seccion3 s on a.id = s.pescador_id  where S3_907 = 1 group by nom_dd ) as C7 on DEP.ccdd  = C7.ccdd 
        left join (select ccdd,  count(*) as t  from pescador a inner join pesc_seccion3 s on a.id = s.pescador_id  where S3_908 = 1 group by nom_dd ) as C8 on DEP.ccdd  = C8.ccdd 
        left join (select ccdd,  count(*) as t  from pescador a inner join pesc_seccion3 s on a.id = s.pescador_id  where S3_909 = 1 group by nom_dd ) as C9 on DEP.ccdd  = C9.ccdd 
        left join (select ccdd,  count(*) as t  from pescador a inner join pesc_seccion3 s on a.id = s.pescador_id  where S3_910 = 1 group by nom_dd ) as C10 on DEP.ccdd  = C10.ccdd 
        left join (select ccdd,  count(*) as t  from pescador a inner join pesc_seccion3 s on a.id = s.pescador_id  where S3_911 = 1 group by nom_dd ) as C11 on DEP.ccdd  = C11.ccdd 
        left join (select ccdd,  count(*) as t  from pescador a inner join pesc_seccion3 s on a.id = s.pescador_id  where S3_911 = 9 group by nom_dd ) as C12 on DEP.ccdd  = C12.ccdd ;
        ");
    return $q;
}

function get_report35(){
    $q = $this->db->query("
        /* TABULADO N° 34 -------------------------- SERVICIOS DE COMUNICACION-------------------------*/
        select 
        DEP.CCDD, DEPARTAMENTO, COALESCE(C0.t ,0) AS TOTAL,
        COALESCE(C1.t,0) as FIJA, COALESCE(C2.t,0) as CELULAR, COALESCE(C3.t,0) as INTERNET, COALESCE(C4.t,0) as CABLE, COALESCE(C5.t,0) as NINGUNO,
        COALESCE(C6.t,0) as NEP
        from (select  distinct(departamento), ccdd from departamentos_tab order by departamento) as DEP 
        left join (select ccdd,  count(*) as t  from pescador a inner join pesc_seccion3 s on a.id = s.pescador_id  where S3_1001 is not null group by nom_dd ) as C0 on DEP.ccdd  = C0.ccdd 
        left join (select ccdd,  count(*) as t  from pescador a inner join pesc_seccion3 s on a.id = s.pescador_id  where S3_1001 = 1 group by nom_dd ) as C1 on DEP.ccdd  = C1.ccdd 
        left join (select ccdd,  count(*) as t  from pescador a inner join pesc_seccion3 s on a.id = s.pescador_id  where S3_1002 = 1 group by nom_dd ) as C2 on DEP.ccdd  = C2.ccdd 
        left join (select ccdd,  count(*) as t  from pescador a inner join pesc_seccion3 s on a.id = s.pescador_id  where S3_1003 = 1 group by nom_dd ) as C3 on DEP.ccdd  = C3.ccdd 
        left join (select ccdd,  count(*) as t  from pescador a inner join pesc_seccion3 s on a.id = s.pescador_id  where S3_1004 = 1 group by nom_dd ) as C4 on DEP.ccdd  = C4.ccdd 
        left join (select ccdd,  count(*) as t  from pescador a inner join pesc_seccion3 s on a.id = s.pescador_id  where S3_1005 = 1 group by nom_dd ) as C5 on DEP.ccdd  = C5.ccdd 
        left join (select ccdd,  count(*) as t  from pescador a inner join pesc_seccion3 s on a.id = s.pescador_id  where S3_1005 = 9 group by nom_dd ) as C6 on DEP.ccdd  = C6.ccdd ;
        ");
    return $q;
}

function get_report36(){
    $q = $this->db->query("
        /* TABULADO N° 35 --------- ESPACIO0 PARA OTROS INGRESOS -----------------*/
        select 
        DEP.CCDD, DEPARTAMENTO,  COALESCE(C0.t ,0) AS TOTAL,
        COALESCE(C1.t,0) as SI, COALESCE(C2.t,0) as 'NO',  COALESCE(C3.t,0) NEP
        from (select  distinct(departamento), ccdd from departamentos_tab order by departamento) as DEP 
        left join (select ccdd,  count(*) as t  from pescador a inner join pesc_seccion3 s on a.id = s.pescador_id  where S3_1100 is not null group by nom_dd ) as C0 on DEP.ccdd  = C0.ccdd 
        left join (select ccdd,  count(*) as t  from pescador a inner join pesc_seccion3 s on a.id = s.pescador_id  where S3_1100 = 1 group by nom_dd ) as C1 on DEP.ccdd  = C1.ccdd 
        left join (select ccdd,  count(*) as t  from pescador a inner join pesc_seccion3 s on a.id = s.pescador_id  where S3_1100 = 2 group by nom_dd ) as C2 on DEP.ccdd  = C2.ccdd 
        left join (select ccdd,  count(*) as t  from pescador a inner join pesc_seccion3 s on a.id = s.pescador_id  where S3_1100 = 9 group by nom_dd ) as C3 on DEP.ccdd  = C3.ccdd ;
        ");
    return $q;
}

function get_report37(){
    $q = $this->db->query("
        /* TABULADO N° 36 ---------  CONOCE SEGURO SALUD -----------------*/
        select 
        DEP.CCDD, DEPARTAMENTO,  COALESCE(C0.t ,0) AS TOTAL,  
        COALESCE(C1.t,0) as SI, COALESCE(C2.t,0) as 'NO',  COALESCE(C3.t,0) NEP
        from (select  distinct(departamento), ccdd from departamentos_tab order by departamento) as DEP 
        left join (select ccdd,  count(*) as t  from pescador a inner join pesc_seccion4 s on a.id = s.pescador_id  where s4_1 is not null group by nom_dd ) as C0 on DEP.ccdd  = C0.ccdd 
        left join (select ccdd,  count(*) as t  from pescador a inner join pesc_seccion4 s on a.id = s.pescador_id  where s4_1 = 1 group by nom_dd ) as C1 on DEP.ccdd  = C1.ccdd 
        left join (select ccdd,  count(*) as t  from pescador a inner join pesc_seccion4 s on a.id = s.pescador_id  where s4_1 = 2 group by nom_dd ) as C2 on DEP.ccdd  = C2.ccdd 
        left join (select ccdd,  count(*) as t  from pescador a inner join pesc_seccion4 s on a.id = s.pescador_id  where s4_1 = 9 group by nom_dd ) as C3 on DEP.ccdd  = C3.ccdd ;
        ");
    return $q;
}

function get_report38(){
    $q = $this->db->query("
        /* TABULADO N° 37 -------------------------- CUALES CONOCE -------------------------*/
        select 
        DEP.CCDD, DEPARTAMENTO,  COALESCE(C0.t ,0) AS TOTAL, 
        COALESCE(C1.t,0) as PES_ESSALUD, COALESCE(C2.t,0) as SIS, COALESCE(C3.t,0) as EPS, COALESCE(C4.t,0) as ESSALUD, COALESCE(C5.t,0) as  OTRO, COALESCE(C6.t,0) as  NEP
        from (select  distinct(departamento), ccdd from departamentos_tab order by departamento) as DEP 
        left join (select ccdd,  count(*) as t  from pescador a inner join pesc_seccion4 s on a.id = s.pescador_id  where s4_2_1 is not null group by nom_dd ) as C0 on DEP.ccdd  = C0.ccdd 
        left join (select ccdd,  count(*) as t  from pescador a inner join pesc_seccion4 s on a.id = s.pescador_id  where s4_2_1 = 1 group by nom_dd ) as C1 on DEP.ccdd  = C1.ccdd 
        left join (select ccdd,  count(*) as t  from pescador a inner join pesc_seccion4 s on a.id = s.pescador_id  where s4_2_2 = 1 group by nom_dd ) as C2 on DEP.ccdd  = C2.ccdd 
        left join (select ccdd,  count(*) as t  from pescador a inner join pesc_seccion4 s on a.id = s.pescador_id  where s4_2_3 = 1 group by nom_dd ) as C3 on DEP.ccdd  = C3.ccdd 
        left join (select ccdd,  count(*) as t  from pescador a inner join pesc_seccion4 s on a.id = s.pescador_id  where s4_2_4 = 1 group by nom_dd ) as C4 on DEP.ccdd  = C4.ccdd 
        left join (select ccdd,  count(*) as t  from pescador a inner join pesc_seccion4 s on a.id = s.pescador_id  where s4_2_5 = 1 group by nom_dd ) as C5 on DEP.ccdd  = C5.ccdd
        left join (select ccdd,  count(*) as t  from pescador a inner join pesc_seccion4 s on a.id = s.pescador_id  where s4_2_5 = 9 group by nom_dd ) as C6 on DEP.ccdd  = C6.ccdd;
        ");
    return $q;
}

function get_report39(){
    $q = $this->db->query("
        /* TABULADO N° 38 ---------  AFILIADO A ESSALUD -----------------*/
        select 
        DEP.CCDD, DEPARTAMENTO,  COALESCE(C0.t ,0) AS TOTAL,  
        COALESCE(C1.t,0) as SI, COALESCE(C2.t,0) as 'NO',  COALESCE(C3.t,0) NEP
        from (select  distinct(departamento), ccdd from departamentos_tab order by departamento) as DEP 
        left join (select ccdd,  count(*) as t  from pescador a inner join pesc_seccion4 s on a.id = s.pescador_id  where s4_2_1 =1 group by nom_dd ) as C0 on DEP.ccdd  = C0.ccdd 
        left join (select ccdd,  count(*) as t  from pescador a inner join pesc_seccion4 s on a.id = s.pescador_id  where s4_2_1_1 = 1 group by nom_dd ) as C1 on DEP.ccdd  = C1.ccdd 
        left join (select ccdd,  count(*) as t  from pescador a inner join pesc_seccion4 s on a.id = s.pescador_id  where s4_2_1_1 = 2 group by nom_dd ) as C2 on DEP.ccdd  = C2.ccdd 
        left join (select ccdd,  count(*) as t  from pescador a inner join pesc_seccion4 s on a.id = s.pescador_id  where s4_2_1_1 = 9 group by nom_dd ) as C3 on DEP.ccdd  = C3.ccdd ;
        ");
    return $q;
}

function get_report40(){
    $q = $this->db->query("
        /* TABULADO N° 39 ---------  AFILIADO A SIS -----------------*/
        select 
        DEP.CCDD, DEPARTAMENTO,  COALESCE(C0.t ,0) AS TOTAL,  
        COALESCE(C1.t,0) as SI, COALESCE(C2.t,0) as 'NO',  COALESCE(C3.t,0) NEP
        from (select  distinct(departamento), ccdd from departamentos_tab order by departamento) as DEP 
        left join (select ccdd,  count(*) as t  from pescador a inner join pesc_seccion4 s on a.id = s.pescador_id  where s4_2_2 =1 group by nom_dd ) as C0 on DEP.ccdd  = C0.ccdd 
        left join (select ccdd,  count(*) as t  from pescador a inner join pesc_seccion4 s on a.id = s.pescador_id  where s4_2_2_1 = 1 group by nom_dd ) as C1 on DEP.ccdd  = C1.ccdd 
        left join (select ccdd,  count(*) as t  from pescador a inner join pesc_seccion4 s on a.id = s.pescador_id  where s4_2_2_1 = 2 group by nom_dd ) as C2 on DEP.ccdd  = C2.ccdd 
        left join (select ccdd,  count(*) as t  from pescador a inner join pesc_seccion4 s on a.id = s.pescador_id  where s4_2_2_1 = 9 group by nom_dd ) as C3 on DEP.ccdd  = C3.ccdd ;
        ");
    return $q;
}

function get_report41(){
    $q = $this->db->query("
        /* TABULADO N° 40 ---------  AFILIADO A EPS  -----------------*/
        select 
        DEP.CCDD, DEPARTAMENTO,  COALESCE(C0.t ,0) AS TOTAL,  
        COALESCE(C1.t,0) as SI, COALESCE(C2.t,0) as 'NO',  COALESCE(C3.t,0) NEP
        from (select  distinct(departamento), ccdd from departamentos_tab order by departamento) as DEP 
        left join (select ccdd,  count(*) as t  from pescador a inner join pesc_seccion4 s on a.id = s.pescador_id  where S4_2_3 =1 group by nom_dd ) as C0 on DEP.ccdd  = C0.ccdd 
        left join (select ccdd,  count(*) as t  from pescador a inner join pesc_seccion4 s on a.id = s.pescador_id  where S4_2_3_1 = 1 group by nom_dd ) as C1 on DEP.ccdd  = C1.ccdd 
        left join (select ccdd,  count(*) as t  from pescador a inner join pesc_seccion4 s on a.id = s.pescador_id  where S4_2_3_1 = 2 group by nom_dd ) as C2 on DEP.ccdd  = C2.ccdd 
        left join (select ccdd,  count(*) as t  from pescador a inner join pesc_seccion4 s on a.id = s.pescador_id  where S4_2_3_1 = 9 group by nom_dd ) as C3 on DEP.ccdd  = C3.ccdd ;
        ");
    return $q;
}

function get_report42(){
    $q = $this->db->query("
        /* TABULADO N° 42 ---------  AFILIADO A ESSALUD  ----------------- NEW*/
        select 
        DEP.CCDD, DEPARTAMENTO,  COALESCE(C0.t ,0) AS TOTAL,  
        COALESCE(C1.t,0) as SI, COALESCE(C2.t,0) as 'NO',  COALESCE(C3.t,0) NEP
        from (select  distinct(departamento), ccdd from departamentos_tab order by departamento) as DEP 
        left join (select ccdd,  count(*) as t  from pescador a inner join pesc_seccion4 s on a.id = s.pescador_id  where S4_2_4 =1 group by nom_dd ) as C0 on DEP.ccdd  = C0.ccdd 
        left join (select ccdd,  count(*) as t  from pescador a inner join pesc_seccion4 s on a.id = s.pescador_id  where S4_2_4_1 = 1 group by nom_dd ) as C1 on DEP.ccdd  = C1.ccdd 
        left join (select ccdd,  count(*) as t  from pescador a inner join pesc_seccion4 s on a.id = s.pescador_id  where S4_2_4_1 = 2 group by nom_dd ) as C2 on DEP.ccdd  = C2.ccdd 
        left join (select ccdd,  count(*) as t  from pescador a inner join pesc_seccion4 s on a.id = s.pescador_id  where S4_2_4_1 = 9 group by nom_dd ) as C3 on DEP.ccdd  = C3.ccdd ;        
        ");
    return $q;
}

function get_report43(){
    $q = $this->db->query("
        /* TABULADO N° 41 -------------------------- CONOCE SEGURO -------------------------*/
        select 
        DEP.CCDD, DEPARTAMENTO,  COALESCE(C0.t ,0) AS TOTAL, 
        COALESCE(C1.t,0) as VIDA, COALESCE(C2.t,0) as PENSIONES, COALESCE(C3.t,0) as NO_ESTA, COALESCE(C4.t,0) as  NEP
        from (select  distinct(departamento), ccdd from departamentos_tab order by departamento) as DEP 
        left join (select ccdd,  count(*) as t  from pescador a inner join pesc_seccion4 s on a.id = s.pescador_id  where s4_3_1 is not null group by nom_dd ) as C0 on DEP.ccdd  = C0.ccdd 
        left join (select ccdd,  count(*) as t  from pescador a inner join pesc_seccion4 s on a.id = s.pescador_id  where s4_3_1 = 1 group by nom_dd ) as C1 on DEP.ccdd  = C1.ccdd 
        left join (select ccdd,  count(*) as t  from pescador a inner join pesc_seccion4 s on a.id = s.pescador_id  where s4_3_2 = 1 group by nom_dd ) as C2 on DEP.ccdd  = C2.ccdd 
        left join (select ccdd,  count(*) as t  from pescador a inner join pesc_seccion4 s on a.id = s.pescador_id  where s4_3_3 = 1 group by nom_dd ) as C3 on DEP.ccdd  = C3.ccdd 
        left join (select ccdd,  count(*) as t  from pescador a inner join pesc_seccion4 s on a.id = s.pescador_id  where s4_3_3 = 9 group by nom_dd ) as C4 on DEP.ccdd  = C4.ccdd ;
        ");
    return $q;
}

function get_report44(){
    $q = $this->db->query("
        /* TABULADO N° 42  -------------------------- EN 12 MESE ENFERMEDAD -------------------------*/
        select 
        DEP.CCDD, DEPARTAMENTO,  COALESCE(C0.t ,0) AS TOTAL,  
        COALESCE(C1.t,0) as SI, COALESCE(C2.t,0) as 'NO',  COALESCE(C3.t,0) NEP
        from (select  distinct(departamento), ccdd from departamentos_tab order by departamento) as DEP 
        left join (select ccdd,  count(*) as t  from pescador a inner join pesc_seccion4 s on a.id = s.pescador_id  where s4_4_1 is not null group by nom_dd ) as C0 on DEP.ccdd  = C0.ccdd 
        left join (select ccdd,  count(*) as t  from pescador a inner join pesc_seccion4 s on a.id = s.pescador_id  where s4_4_1 = 1 group by nom_dd ) as C1 on DEP.ccdd  = C1.ccdd 
        left join (select ccdd,  count(*) as t  from pescador a inner join pesc_seccion4 s on a.id = s.pescador_id  where s4_4_1 = 2 group by nom_dd ) as C2 on DEP.ccdd  = C2.ccdd 
        left join (select ccdd,  count(*) as t  from pescador a inner join pesc_seccion4 s on a.id = s.pescador_id  where s4_4_1 = 9 group by nom_dd ) as C3 on DEP.ccdd  = C3.ccdd ;
        ");
    return $q;
}

function get_report45(){
    $q = $this->db->query("
        /* TABULADO N° 43  -------------------------- EN 12 MESE ACCIDENTE -------------------------*/
        select 
        DEP.CCDD, DEPARTAMENTO,  COALESCE(C0.t ,0) AS TOTAL,  
        COALESCE(C1.t,0) as SI, COALESCE(C2.t,0) as 'NO',  COALESCE(C3.t,0) NEP
        from (select  distinct(departamento), ccdd from departamentos_tab order by departamento) as DEP 
        left join (select ccdd,  count(*) as t  from pescador a inner join pesc_seccion4 s on a.id = s.pescador_id  where s4_5_1 is not null group by nom_dd ) as C0 on DEP.ccdd  = C0.ccdd 
        left join (select ccdd,  count(*) as t  from pescador a inner join pesc_seccion4 s on a.id = s.pescador_id  where s4_5_1 = 1 group by nom_dd ) as C1 on DEP.ccdd  = C1.ccdd 
        left join (select ccdd,  count(*) as t  from pescador a inner join pesc_seccion4 s on a.id = s.pescador_id  where s4_5_1 = 2 group by nom_dd ) as C2 on DEP.ccdd  = C2.ccdd 
        left join (select ccdd,  count(*) as t  from pescador a inner join pesc_seccion4 s on a.id = s.pescador_id  where s4_5_1 = 9 group by nom_dd ) as C3 on DEP.ccdd  = C3.ccdd ;
        ");
    return $q;
}



function get_report46(){
    $q = $this->db->query("
        /* TABULADO N° 44  --------------------------  DIFICULTADES O LIMITACIONES   -------------------------*/
        select 
        DEP.CCDD, DEPARTAMENTO,  COALESCE(C0.t ,0) AS TOTAL, 
        COALESCE(C1.t,0) as VER, COALESCE(C2.t,0) as OIR, COALESCE(C3.t,0) as HABLAR, COALESCE(C4.t,0) as MANOS_PIES, COALESCE(C5.t,0) as OTRA,
        COALESCE(C6.t,0) as NINGUNA, COALESCE(C7.t,0) as  NEP
        from (select  distinct(departamento), ccdd from departamentos_tab order by departamento) as DEP 
        left join (select ccdd,  count(*) as t  from pescador a inner join pesc_seccion4 s on a.id = s.pescador_id  where s4_6_1 is not null group by nom_dd ) as C0 on DEP.ccdd  = C0.ccdd 
        left join (select ccdd,  count(*) as t  from pescador a inner join pesc_seccion4 s on a.id = s.pescador_id  where s4_6_1 = 1 group by nom_dd ) as C1 on DEP.ccdd  = C1.ccdd 
        left join (select ccdd,  count(*) as t  from pescador a inner join pesc_seccion4 s on a.id = s.pescador_id  where s4_6_2 = 1 group by nom_dd ) as C2 on DEP.ccdd  = C2.ccdd 
        left join (select ccdd,  count(*) as t  from pescador a inner join pesc_seccion4 s on a.id = s.pescador_id  where s4_6_3 = 1 group by nom_dd ) as C3 on DEP.ccdd  = C3.ccdd 
        left join (select ccdd,  count(*) as t  from pescador a inner join pesc_seccion4 s on a.id = s.pescador_id  where s4_6_4 = 1 group by nom_dd ) as C4 on DEP.ccdd  = C4.ccdd 
        left join (select ccdd,  count(*) as t  from pescador a inner join pesc_seccion4 s on a.id = s.pescador_id  where s4_6_5 = 1 group by nom_dd ) as C5 on DEP.ccdd  = C5.ccdd 
        left join (select ccdd,  count(*) as t  from pescador a inner join pesc_seccion4 s on a.id = s.pescador_id  where s4_6_6 = 1 group by nom_dd ) as C6 on DEP.ccdd  = C6.ccdd 
        left join (select ccdd,  count(*) as t  from pescador a inner join pesc_seccion4 s on a.id = s.pescador_id  where s4_6_6 = 9 group by nom_dd ) as C7 on DEP.ccdd  = C7.ccdd ;
        ");
    return $q;
}


function get_report47(){
    $q = $this->db->query("
        /* TABULADO N° 45 -------------------------- FUENTE -------------------------*/
        select 
        DEP.CCDD, DEPARTAMENTO,  COALESCE(C0.t ,0) AS TOTAL, 
        COALESCE(C1.t,0) as RIO, COALESCE(C2.t,0) as LAGO, COALESCE(C3.t,0) as LAGUNA, COALESCE(C4.t,0) as MARISMA, COALESCE(C5.t,0) as QUEBRADA,
        COALESCE(C6.t,0) as COCHA, COALESCE(C7.t,0) as RESERVORIO, COALESCE(C8.t,0) as CANAL, COALESCE(C9.t,0)  OTRO, COALESCE(C10.t,0)  NEP
        from (select  distinct(departamento), ccdd from departamentos_tab order by departamento) as DEP 
        left join (select ccdd,  count(*) as t  from pescador a inner join pesc_seccion5 s on a.id = s.pescador_id  where s5_1_1 is not null group by nom_dd ) as C0 on DEP.ccdd  = C0.ccdd 
        left join (select ccdd,  count(*) as t  from pescador a inner join pesc_seccion5 s on a.id = s.pescador_id  where s5_1_1 = 1 group by nom_dd ) as C1 on DEP.ccdd  = C1.ccdd 
        left join (select ccdd,  count(*) as t  from pescador a inner join pesc_seccion5 s on a.id = s.pescador_id  where s5_1_2 = 1 group by nom_dd ) as C2 on DEP.ccdd  = C2.ccdd 
        left join (select ccdd,  count(*) as t  from pescador a inner join pesc_seccion5 s on a.id = s.pescador_id  where s5_1_3 = 1 group by nom_dd ) as C3 on DEP.ccdd  = C3.ccdd 
        left join (select ccdd,  count(*) as t  from pescador a inner join pesc_seccion5 s on a.id = s.pescador_id  where s5_1_4 = 1 group by nom_dd ) as C4 on DEP.ccdd  = C4.ccdd 
        left join (select ccdd,  count(*) as t  from pescador a inner join pesc_seccion5 s on a.id = s.pescador_id  where s5_1_5 = 1 group by nom_dd ) as C5 on DEP.ccdd  = C5.ccdd 
        left join (select ccdd,  count(*) as t  from pescador a inner join pesc_seccion5 s on a.id = s.pescador_id  where s5_1_6 = 1 group by nom_dd ) as C6 on DEP.ccdd  = C6.ccdd 
        left join (select ccdd,  count(*) as t  from pescador a inner join pesc_seccion5 s on a.id = s.pescador_id  where s5_1_7 = 1 group by nom_dd ) as C7 on DEP.ccdd  = C7.ccdd 
        left join (select ccdd,  count(*) as t  from pescador a inner join pesc_seccion5 s on a.id = s.pescador_id  where s5_1_8 = 1 group by nom_dd ) as C8 on DEP.ccdd  = C8.ccdd 
        left join (select ccdd,  count(*) as t  from pescador a inner join pesc_seccion5 s on a.id = s.pescador_id  where s5_1_9 = 1 group by nom_dd ) as C9 on DEP.ccdd  = C9.ccdd
        left join (select ccdd,  count(*) as t  from pescador a inner join pesc_seccion5 s on a.id = s.pescador_id  where s5_1_9 = 9 group by nom_dd ) as C10 on DEP.ccdd  = C10.ccdd;
        ");
    return $q;
}

function get_report48(){
    $q = $this->db->query("
        /* TABULADO N° 46 --------- ZONA PESCA  -----------------*/
        select 
        DEP.CCDD, DEPARTAMENTO,  COALESCE(C0.t ,0) AS TOTAL,  
        COALESCE(C1.t,0) as SI, COALESCE(C2.t,0) as 'NO',  COALESCE(C3.t,0) NEP
        from (select  distinct(departamento), ccdd from departamentos_tab order by departamento) as DEP 
        left join (select ccdd,  count(*) as t  from pescador a inner join pesc_seccion5 s on a.id = s.pescador_id  where s5_2_1 is not null group by nom_dd ) as C0 on DEP.ccdd  = C0.ccdd 
        left join (select ccdd,  count(*) as t  from pescador a inner join pesc_seccion5 s on a.id = s.pescador_id  where s5_2_1 = 1 group by nom_dd ) as C1 on DEP.ccdd  = C1.ccdd 
        left join (select ccdd,  count(*) as t  from pescador a inner join pesc_seccion5 s on a.id = s.pescador_id  where s5_2_2 = 1 group by nom_dd ) as C2 on DEP.ccdd  = C2.ccdd 
        left join (select ccdd,  count(*) as t  from pescador a inner join pesc_seccion5 s on a.id = s.pescador_id  where s5_2_2 = 9 group by nom_dd ) as C3 on DEP.ccdd  = C3.ccdd ;
        ");
    return $q;
}

function get_report49(){
    $q = $this->db->query("
        /* TABULADO N° 47 -------------------------- TIEMPO DESPLAZARSE  -------------------------*/
        select 
        DEP.CCDD, DEPARTAMENTO,  COALESCE(C0.t ,0) AS TOTAL, 
        COALESCE(C1.t,0) as MENOS_1, COALESCE(C2.t,0) as '1_3_DIAS', COALESCE(C3.t,0) as '4_6_DIAS', COALESCE(C4.t,0) as MAS_6_DIAS, COALESCE(C5.t,0) as  NEP
        from (select  distinct(departamento), ccdd from departamentos_tab order by departamento) as DEP 
        left join (select ccdd,  count(*) as t  from pescador a inner join pesc_seccion5 s on a.id = s.pescador_id  where S5_3 is not null group by nom_dd ) as C0 on DEP.ccdd  = C0.ccdd 
        left join (select ccdd,  count(*) as t  from pescador a inner join pesc_seccion5 s on a.id = s.pescador_id  where S5_3 = 1 group by nom_dd ) as C1 on DEP.ccdd  = C1.ccdd 
        left join (select ccdd,  count(*) as t  from pescador a inner join pesc_seccion5 s on a.id = s.pescador_id  where S5_3 = 2 group by nom_dd ) as C2 on DEP.ccdd  = C2.ccdd 
        left join (select ccdd,  count(*) as t  from pescador a inner join pesc_seccion5 s on a.id = s.pescador_id  where S5_3 = 3 group by nom_dd ) as C3 on DEP.ccdd  = C3.ccdd 
        left join (select ccdd,  count(*) as t  from pescador a inner join pesc_seccion5 s on a.id = s.pescador_id  where S5_3 = 4 group by nom_dd ) as C4 on DEP.ccdd  = C4.ccdd 
        left join (select ccdd,  count(*) as t  from pescador a inner join pesc_seccion5 s on a.id = s.pescador_id  where S5_3 = 9 group by nom_dd ) as C5 on DEP.ccdd  = C5.ccdd;
        ");
    return $q;
}


function get_report50(){
    $q = $this->db->query("
        /* TABULADO N° 48 -------------------------- TIEMPO FAENAS  -------------------------*/
        select 
        DEP.CCDD, DEPARTAMENTO,  COALESCE(C0.t ,0) AS TOTAL, 
        COALESCE(C1.t,0) as MENOS_1, COALESCE(C2.t,0) as '1_3_DIAS', COALESCE(C3.t,0) as '4_6_DIAS', COALESCE(C4.t,0) as MAS_6_DIAS, COALESCE(C5.t,0) as  NEP
        from (select  distinct(departamento), ccdd from departamentos_tab order by departamento) as DEP 
        left join (select ccdd,  count(*) as t  from pescador a inner join pesc_seccion5 s on a.id = s.pescador_id  where S5_4 is not null group by nom_dd ) as C0 on DEP.ccdd  = C0.ccdd 
        left join (select ccdd,  count(*) as t  from pescador a inner join pesc_seccion5 s on a.id = s.pescador_id  where S5_4 = 1 group by nom_dd ) as C1 on DEP.ccdd  = C1.ccdd 
        left join (select ccdd,  count(*) as t  from pescador a inner join pesc_seccion5 s on a.id = s.pescador_id  where S5_4 = 2 group by nom_dd ) as C2 on DEP.ccdd  = C2.ccdd 
        left join (select ccdd,  count(*) as t  from pescador a inner join pesc_seccion5 s on a.id = s.pescador_id  where S5_4 = 3 group by nom_dd ) as C3 on DEP.ccdd  = C3.ccdd 
        left join (select ccdd,  count(*) as t  from pescador a inner join pesc_seccion5 s on a.id = s.pescador_id  where S5_4 = 4 group by nom_dd ) as C4 on DEP.ccdd  = C4.ccdd 
        left join (select ccdd,  count(*) as t  from pescador a inner join pesc_seccion5 s on a.id = s.pescador_id  where S5_4 = 9 group by nom_dd ) as C5 on DEP.ccdd  = C5.ccdd;
        ");
    return $q;
}

function get_report51(){
    $q = $this->db->query("
        /* TABULADO N° 49 -------------------------- REDES  -------------------------*/
        select 
        DEP.CCDD, DEPARTAMENTO,  COALESCE(C0.t ,0) AS TOTAL, 
        COALESCE(C1.t,0) as AGALLERA, COALESCE(C2.t,0) as TRASMALLO, COALESCE(C3.t,0) as HONDERA, COALESCE(C4.t,0) as TARRAFA, COALESCE(C5.t,0) as ARRASTRADORA,
        COALESCE(C6.t,0) as CAPICCAHUANA, COALESCE(C7.t,0) as CHINCHORRO, COALESCE(C8.t,0) as AISSACCAHUANA, COALESCE(C9.t,0) OTRO, COALESCE(C10.t,0)  NEP
        from (select  distinct(departamento), ccdd from departamentos_tab order by departamento) as DEP 
        left join (select ccdd,  count(*) as t  from pescador a inner join pesc_seccion5 s on a.id = s.pescador_id  where s5_5_1 is not null group by nom_dd ) as C0 on DEP.ccdd  = C0.ccdd 
        left join (select ccdd,  count(*) as t  from pescador a inner join pesc_seccion5 s on a.id = s.pescador_id  where s5_5_1 = 1 group by nom_dd ) as C1 on DEP.ccdd  = C1.ccdd 
        left join (select ccdd,  count(*) as t  from pescador a inner join pesc_seccion5 s on a.id = s.pescador_id  where s5_5_2 = 1 group by nom_dd ) as C2 on DEP.ccdd  = C2.ccdd 
        left join (select ccdd,  count(*) as t  from pescador a inner join pesc_seccion5 s on a.id = s.pescador_id  where s5_5_3 = 1 group by nom_dd ) as C3 on DEP.ccdd  = C3.ccdd 
        left join (select ccdd,  count(*) as t  from pescador a inner join pesc_seccion5 s on a.id = s.pescador_id  where s5_5_4 = 1 group by nom_dd ) as C4 on DEP.ccdd  = C4.ccdd 
        left join (select ccdd,  count(*) as t  from pescador a inner join pesc_seccion5 s on a.id = s.pescador_id  where s5_5_5 = 1 group by nom_dd ) as C5 on DEP.ccdd  = C5.ccdd 
        left join (select ccdd,  count(*) as t  from pescador a inner join pesc_seccion5 s on a.id = s.pescador_id  where s5_5_6 = 1 group by nom_dd ) as C6 on DEP.ccdd  = C6.ccdd 
        left join (select ccdd,  count(*) as t  from pescador a inner join pesc_seccion5 s on a.id = s.pescador_id  where s5_5_7 = 1 group by nom_dd ) as C7 on DEP.ccdd  = C7.ccdd 
        left join (select ccdd,  count(*) as t  from pescador a inner join pesc_seccion5 s on a.id = s.pescador_id  where s5_5_8 = 1 group by nom_dd ) as C8 on DEP.ccdd  = C8.ccdd 
        left join (select ccdd,  count(*) as t  from pescador a inner join pesc_seccion5 s on a.id = s.pescador_id  where s5_5_9 = 1 group by nom_dd ) as C9 on DEP.ccdd  = C9.ccdd 
        left join (select ccdd,  count(*) as t  from pescador a inner join pesc_seccion5 s on a.id = s.pescador_id  where s5_5_9 = 9 group by nom_dd ) as C10 on DEP.ccdd  = C10.ccdd ;
        ");
    return $q;
}

function get_report52(){
    $q = $this->db->query("
        /* TABULADO N° 52 -------------------------- APAREJOS -------------------------*/
        select 
        DEP.CCDD, DEPARTAMENTO,  COALESCE(C0.t ,0) AS TOTAL, 
        COALESCE(C1.t,0) as LINEAS, COALESCE(C2.t,0) as ARPON, COALESCE(C3.t,0) as FARPA, COALESCE(C4.t,0) as ESPINELES, COALESCE(C5.t,0) as FLECHAS,
        COALESCE(C6.t,0) as OTRO,COALESCE(C6.t,0) as NEP
        from (select  distinct(departamento), ccdd from departamentos_tab order by departamento) as DEP 
        left join (select ccdd,  count(*) as t  from pescador a inner join pesc_seccion5 s on a.id = s.pescador_id  where s5_5_10 is not null group by nom_dd ) as C0 on DEP.ccdd  = C0.ccdd 
        left join (select ccdd,  count(*) as t  from pescador a inner join pesc_seccion5 s on a.id = s.pescador_id  where s5_5_10 = 1 group by nom_dd ) as C1 on DEP.ccdd  = C1.ccdd 
        left join (select ccdd,  count(*) as t  from pescador a inner join pesc_seccion5 s on a.id = s.pescador_id  where s5_5_11 = 1 group by nom_dd ) as C2 on DEP.ccdd  = C2.ccdd 
        left join (select ccdd,  count(*) as t  from pescador a inner join pesc_seccion5 s on a.id = s.pescador_id  where s5_5_12 = 1 group by nom_dd ) as C3 on DEP.ccdd  = C3.ccdd 
        left join (select ccdd,  count(*) as t  from pescador a inner join pesc_seccion5 s on a.id = s.pescador_id  where s5_5_13 = 1 group by nom_dd ) as C4 on DEP.ccdd  = C4.ccdd 
        left join (select ccdd,  count(*) as t  from pescador a inner join pesc_seccion5 s on a.id = s.pescador_id  where s5_5_14 = 1 group by nom_dd ) as C5 on DEP.ccdd  = C5.ccdd 
        left join (select ccdd,  count(*) as t  from pescador a inner join pesc_seccion5 s on a.id = s.pescador_id  where s5_5_15 = 1 group by nom_dd ) as C6 on DEP.ccdd  = C6.ccdd
        left join (select ccdd,  count(*) as t  from pescador a inner join pesc_seccion5 s on a.id = s.pescador_id  where s5_5_15 = 9 group by nom_dd ) as C7 on DEP.ccdd  = C7.ccdd;

        ");
    return $q;
}

function get_report53(){
    $q = $this->db->query("
        /* TABULADO N° 53 -------------------------- TRAMPA -------------------------*/
        select 
        DEP.CCDD, DEPARTAMENTO,  COALESCE(C0.t ,0) AS TOTAL,    
        COALESCE(C1.t,0) as NASA, COALESCE(C2.t,0) as TAPAJE, COALESCE(C3.t,0) as MANUAL, COALESCE(C4.t,0) as OTRO, COALESCE(C5.t,0)  as NEP
        from (select  distinct(departamento), ccdd from departamentos_tab order by departamento) as DEP 
        left join (select ccdd,  count(*) as t  from pescador a inner join pesc_seccion5 s on a.id = s.pescador_id  where S5_5_16 is not null group by nom_dd ) as C0 on DEP.ccdd  = C0.ccdd 
        left join (select ccdd,  count(*) as t  from pescador a inner join pesc_seccion5 s on a.id = s.pescador_id  where S5_5_16 = 1 group by nom_dd ) as C1 on DEP.ccdd  = C1.ccdd 
        left join (select ccdd,  count(*) as t  from pescador a inner join pesc_seccion5 s on a.id = s.pescador_id  where S5_5_17 = 1 group by nom_dd ) as C2 on DEP.ccdd  = C2.ccdd 
        left join (select ccdd,  count(*) as t  from pescador a inner join pesc_seccion5 s on a.id = s.pescador_id  where S5_5_18 = 1 group by nom_dd ) as C3 on DEP.ccdd  = C3.ccdd 
        left join (select ccdd,  count(*) as t  from pescador a inner join pesc_seccion5 s on a.id = s.pescador_id  where S5_5_19 = 1 group by nom_dd ) as C4 on DEP.ccdd  = C4.ccdd 
        left join (select ccdd,  count(*) as t  from pescador a inner join pesc_seccion5 s on a.id = s.pescador_id  where S5_5_19 = 9 group by nom_dd ) as C5 on DEP.ccdd  = C5.ccdd ;
        ");
    return $q;
}


function get_report54(){
    $q = $this->db->query("
                    select 
                    DEP.CCDD, DEPARTAMENTO,  COALESCE(C0.t ,0) AS TOTAL, 
                    COALESCE(C1.t,0) as Acarahuazu, COALESCE(C2.t,0) as Bagre, COALESCE(C3.t,0) as Boquichico, COALESCE(C4.t,0) as Camaron_rio, COALESCE(C5.t,0) as Carachama,
                    COALESCE(C6.t,0) as Carachi_amarillo, COALESCE(C7.t,0) as Doncella, COALESCE(C8.t,0) as Fasaco, COALESCE(C9.t,0) Lisa, COALESCE(C10.t,0) Palometa, 
                    COALESCE(C11.t,0) Pejerrey, COALESCE(C12.t,0) Sardina, COALESCE(C13.t,0) Tilapia, COALESCE(C14.t,0)  as Trucha, COALESCE(C15.t,0) as Zungaro
                    from (select  distinct(departamento), ccdd from departamentos_tab order by departamento) as DEP 
                    left join (select ccdd,  count(*) as t  from pescador a inner join pesc_seccion5 s on a.id = s.pescador_id  where S5_6_1 is not null group by nom_dd ) as C0 on DEP.ccdd  = C0.ccdd 
                    left join (select ccdd,  count(*) as t  from pescador a inner join pesc_seccion5 s on a.id = s.pescador_id  where S5_6_1 = 1 group by nom_dd ) as C1 on DEP.ccdd  = C1.ccdd 
                    left join (select ccdd,  count(*) as t  from pescador a inner join pesc_seccion5 s on a.id = s.pescador_id  where S5_6_2 = 1 group by nom_dd ) as C2 on DEP.ccdd  = C2.ccdd 
                    left join (select ccdd,  count(*) as t  from pescador a inner join pesc_seccion5 s on a.id = s.pescador_id  where S5_6_4 = 1 group by nom_dd ) as C3 on DEP.ccdd  = C3.ccdd 
                    left join (select ccdd,  count(*) as t  from pescador a inner join pesc_seccion5 s on a.id = s.pescador_id  where S5_6_6 = 1 group by nom_dd ) as C4 on DEP.ccdd  = C4.ccdd 
                    left join (select ccdd,  count(*) as t  from pescador a inner join pesc_seccion5 s on a.id = s.pescador_id  where S5_6_7 = 1 group by nom_dd ) as C5 on DEP.ccdd  = C5.ccdd 
                    left join (select ccdd,  count(*) as t  from pescador a inner join pesc_seccion5 s on a.id = s.pescador_id  where S5_6_8 = 1 group by nom_dd ) as C6 on DEP.ccdd  = C6.ccdd 
                    left join (select ccdd,  count(*) as t  from pescador a inner join pesc_seccion5 s on a.id = s.pescador_id  where S5_6_14 = 1 group by nom_dd ) as C7 on DEP.ccdd  = C7.ccdd 
                    left join (select ccdd,  count(*) as t  from pescador a inner join pesc_seccion5 s on a.id = s.pescador_id  where S5_6_16 = 1 group by nom_dd ) as C8 on DEP.ccdd  = C8.ccdd 
                    left join (select ccdd,  count(*) as t  from pescador a inner join pesc_seccion5 s on a.id = s.pescador_id  where S5_6_19 = 1 group by nom_dd ) as C9 on DEP.ccdd  = C9.ccdd 
                    left join (select ccdd,  count(*) as t  from pescador a inner join pesc_seccion5 s on a.id = s.pescador_id  where S5_6_27 = 1 group by nom_dd ) as C10 on DEP.ccdd  = C10.ccdd 
                    left join (select ccdd,  count(*) as t  from pescador a inner join pesc_seccion5 s on a.id = s.pescador_id  where S5_6_29 = 1 group by nom_dd ) as C11 on DEP.ccdd  = C11.ccdd 
                    left join (select ccdd,  count(*) as t  from pescador a inner join pesc_seccion5 s on a.id = s.pescador_id  where S5_6_32 = 1 group by nom_dd ) as C12 on DEP.ccdd  = C12.ccdd 
                    left join (select ccdd,  count(*) as t  from pescador a inner join pesc_seccion5 s on a.id = s.pescador_id  where S5_6_35 = 1 group by nom_dd ) as C13 on DEP.ccdd  = C13.ccdd 
                    left join (select ccdd,  count(*) as t  from pescador a inner join pesc_seccion5 s on a.id = s.pescador_id  where S5_6_36 = 1 group by nom_dd ) as C14 on DEP.ccdd  = C14.ccdd 
                    left join (select ccdd,  count(*) as t  from pescador a inner join pesc_seccion5 s on a.id = s.pescador_id  where S5_6_40 = 1 group by nom_dd ) as C15 on DEP.ccdd  = C15.ccdd;
        ");
    return $q;
}


function get_report55(){
    $q = $this->db->query("
        /* TABULADO N° 53 --------- CONDICION   -----------------*/
        select 
        DEP.CCDD, DEPARTAMENTO,  COALESCE(C0.t ,0) AS TOTAL,  
        COALESCE(C1.t,0) as EMBARCADO, COALESCE(C2.t,0) as NO_EMBARCADO,  COALESCE(C3.t,0) NEP
        from (select  distinct(departamento), ccdd from departamentos_tab order by departamento) as DEP 
        left join (select ccdd,  count(*) as t  from pescador a inner join pesc_seccion5 s on a.id = s.pescador_id  where s5_7 is not null group by nom_dd ) as C0 on DEP.ccdd  = C0.ccdd 
        left join (select ccdd,  count(*) as t  from pescador a inner join pesc_seccion5 s on a.id = s.pescador_id  where s5_7 = 1 group by nom_dd ) as C1 on DEP.ccdd  = C1.ccdd 
        left join (select ccdd,  count(*) as t  from pescador a inner join pesc_seccion5 s on a.id = s.pescador_id  where s5_7 = 2 group by nom_dd ) as C2 on DEP.ccdd  = C2.ccdd 
        left join (select ccdd,  count(*) as t  from pescador a inner join pesc_seccion5 s on a.id = s.pescador_id  where s5_7 = 9 group by nom_dd ) as C3 on DEP.ccdd  = C3.ccdd ;
        ");
    return $q;
}


function get_report56(){
    $q = $this->db->query("
        /* TABULADO N° 56 -------------------------- LUGAR DE DESEMBARQUE -------------------------*/
        select 
        DEP.CCDD, DEPARTAMENTO,  COALESCE(C0.t ,0) AS TOTAL,
        COALESCE(C1.t,0) as PUERTO, COALESCE(C2.t,0) as PLAYA, COALESCE(C3.t,0) as DESEMBARQUERO, COALESCE(C4.t,0) as RIBERA, COALESCE(C5.t,0) as  OTRO, COALESCE(C6.t,0) as  NEP
        from (select  distinct(departamento), ccdd from departamentos_tab order by departamento) as DEP 
        left join (select ccdd,  count(*) as t  from pescador a inner join pesc_seccion5 s on a.id = s.pescador_id  where s5_8_1 is not null group by nom_dd ) as C0 on DEP.ccdd  = C0.ccdd 
        left join (select ccdd,  count(*) as t  from pescador a inner join pesc_seccion5 s on a.id = s.pescador_id  where s5_8_1 = 1 group by nom_dd ) as C1 on DEP.ccdd  = C1.ccdd 
        left join (select ccdd,  count(*) as t  from pescador a inner join pesc_seccion5 s on a.id = s.pescador_id  where s5_8_2 = 1 group by nom_dd ) as C2 on DEP.ccdd  = C2.ccdd 
        left join (select ccdd,  count(*) as t  from pescador a inner join pesc_seccion5 s on a.id = s.pescador_id  where s5_8_3 = 1 group by nom_dd ) as C3 on DEP.ccdd  = C3.ccdd 
        left join (select ccdd,  count(*) as t  from pescador a inner join pesc_seccion5 s on a.id = s.pescador_id  where s5_8_4 = 1 group by nom_dd ) as C4 on DEP.ccdd  = C4.ccdd 
        left join (select ccdd,  count(*) as t  from pescador a inner join pesc_seccion5 s on a.id = s.pescador_id  where s5_8_5 = 1 group by nom_dd ) as C5 on DEP.ccdd  = C5.ccdd
        left join (select ccdd,  count(*) as t  from pescador a inner join pesc_seccion5 s on a.id = s.pescador_id  where s5_8_5 = 9 group by nom_dd ) as C6 on DEP.ccdd  = C6.ccdd;
        ");
    return $q;
}

function get_report57(){
    $q = $this->db->query("
        /* TABULADO N° 55  -------------------------- PROBLEMAS EN ACTIVIDAD -------------------------*/
        select 
        DEP.CCDD, DEPARTAMENTO,  COALESCE(C0.t ,0) AS TOTAL, 
        COALESCE(C1.t,0) as CLIMATICOS, COALESCE(C2.t,0) as CONTAMINACION, COALESCE(C3.t,0) as FINANCIAMIENTO, COALESCE(C4.t,0) as ALTOS_COSTOS, COALESCE(C5.t,0) as CONFLICTOS,
        COALESCE(C6.t,0) as FALTA_SISTEMAS, COALESCE(C7.t,0) as CAPACITACION, COALESCE(C8.t,0) as INFRAESTRUCTURA, COALESCE(C9.t,0) VIAS_ACCESO, COALESCE(C10.t,0) PESCA_INDISCRIMINADA, 
        COALESCE(C11.t,0) INSEGURIDAD, COALESCE(C12.t,0) TOXICOS, COALESCE(C13.t,0) EXPLOSIVOS,  COALESCE(C14.t,0) as OTRO, 
        COALESCE(C15.t,0) NINGUNO, COALESCE(C16.t,0) NEP
        from (select  distinct(departamento), ccdd from departamentos_tab order by departamento) as DEP 
        left join (select ccdd,  count(*) as t  from pescador a inner join pesc_seccion5 s on a.id = s.pescador_id  where s5_9_1 is not null group by nom_dd ) as C0 on DEP.ccdd  = C0.ccdd 
        left join (select ccdd,  count(*) as t  from pescador a inner join pesc_seccion5 s on a.id = s.pescador_id  where s5_9_1 = 1 group by nom_dd ) as C1 on DEP.ccdd  = C1.ccdd 
        left join (select ccdd,  count(*) as t  from pescador a inner join pesc_seccion5 s on a.id = s.pescador_id  where s5_9_2 = 1 group by nom_dd ) as C2 on DEP.ccdd  = C2.ccdd 
        left join (select ccdd,  count(*) as t  from pescador a inner join pesc_seccion5 s on a.id = s.pescador_id  where s5_9_3 = 1 group by nom_dd ) as C3 on DEP.ccdd  = C3.ccdd 
        left join (select ccdd,  count(*) as t  from pescador a inner join pesc_seccion5 s on a.id = s.pescador_id  where s5_9_4 = 1 group by nom_dd ) as C4 on DEP.ccdd  = C4.ccdd 
        left join (select ccdd,  count(*) as t  from pescador a inner join pesc_seccion5 s on a.id = s.pescador_id  where s5_9_5 = 1 group by nom_dd ) as C5 on DEP.ccdd  = C5.ccdd 
        left join (select ccdd,  count(*) as t  from pescador a inner join pesc_seccion5 s on a.id = s.pescador_id  where s5_9_6 = 1 group by nom_dd ) as C6 on DEP.ccdd  = C6.ccdd 
        left join (select ccdd,  count(*) as t  from pescador a inner join pesc_seccion5 s on a.id = s.pescador_id  where s5_9_7 = 1 group by nom_dd ) as C7 on DEP.ccdd  = C7.ccdd 
        left join (select ccdd,  count(*) as t  from pescador a inner join pesc_seccion5 s on a.id = s.pescador_id  where s5_9_8 = 1 group by nom_dd ) as C8 on DEP.ccdd  = C8.ccdd 
        left join (select ccdd,  count(*) as t  from pescador a inner join pesc_seccion5 s on a.id = s.pescador_id  where s5_9_9 = 1 group by nom_dd ) as C9 on DEP.ccdd  = C9.ccdd 
        left join (select ccdd,  count(*) as t  from pescador a inner join pesc_seccion5 s on a.id = s.pescador_id  where s5_9_10 = 1 group by nom_dd ) as C10 on DEP.ccdd  = C10.ccdd 
        left join (select ccdd,  count(*) as t  from pescador a inner join pesc_seccion5 s on a.id = s.pescador_id  where s5_9_11 = 1 group by nom_dd ) as C11 on DEP.ccdd  = C11.ccdd 
        left join (select ccdd,  count(*) as t  from pescador a inner join pesc_seccion5 s on a.id = s.pescador_id  where s5_9_12 = 1 group by nom_dd ) as C12 on DEP.ccdd  = C12.ccdd 
        left join (select ccdd,  count(*) as t  from pescador a inner join pesc_seccion5 s on a.id = s.pescador_id  where s5_9_13 = 1 group by nom_dd ) as C13 on DEP.ccdd  = C13.ccdd 
        left join (select ccdd,  count(*) as t  from pescador a inner join pesc_seccion5 s on a.id = s.pescador_id  where s5_9_14 = 1 group by nom_dd ) as C14 on DEP.ccdd  = C14.ccdd 
        left join (select ccdd,  count(*) as t  from pescador a inner join pesc_seccion5 s on a.id = s.pescador_id  where s5_9_15 = 1 group by nom_dd ) as C15 on DEP.ccdd  = C15.ccdd 
        left join (select ccdd,  count(*) as t  from pescador a inner join pesc_seccion5 s on a.id = s.pescador_id  where s5_9_15 = 9 group by nom_dd ) as C16 on DEP.ccdd  = C16.ccdd ;
        ");
    return $q;
}

function get_report58(){
    $q = $this->db->query("
        /* TABULADO N° 56 -------------------------- PERCEPCION  CANTIDAD -------------------------*/
        select 
        DEP.CCDD, DEPARTAMENTO,  COALESCE(C0.t ,0) AS TOTAL,    
        COALESCE(C1.t,0) as AUMENTO, COALESCE(C2.t,0) as DISMINUYO, COALESCE(C3.t,0) as IGUAL, COALESCE(C4.t,0)  as NEP
        from (select  distinct(departamento), ccdd from departamentos_tab order by departamento) as DEP 
        left join (select ccdd,  count(*) as t  from pescador a inner join pesc_seccion5 s on a.id = s.pescador_id  where S5_10_1 is not null group by nom_dd ) as C0 on DEP.ccdd  = C0.ccdd 
        left join (select ccdd,  count(*) as t  from pescador a inner join pesc_seccion5 s on a.id = s.pescador_id  where S5_10_1 = 1 group by nom_dd ) as C1 on DEP.ccdd  = C1.ccdd 
        left join (select ccdd,  count(*) as t  from pescador a inner join pesc_seccion5 s on a.id = s.pescador_id  where S5_10_1 = 2 group by nom_dd ) as C2 on DEP.ccdd  = C2.ccdd 
        left join (select ccdd,  count(*) as t  from pescador a inner join pesc_seccion5 s on a.id = s.pescador_id  where S5_10_1 = 3 group by nom_dd ) as C3 on DEP.ccdd  = C3.ccdd 
        left join (select ccdd,  count(*) as t  from pescador a inner join pesc_seccion5 s on a.id = s.pescador_id  where S5_10_1 = 9 group by nom_dd ) as C4 on DEP.ccdd  = C4.ccdd ;
        ");
    return $q;
}


function get_report59(){
    $q = $this->db->query("
        /* TABULADO N° 57 -------------------------- PERCEPCION  TAMAÑO -------------------------*/
        select 
        DEP.CCDD, DEPARTAMENTO,  COALESCE(C0.t ,0) AS TOTAL,    
        COALESCE(C1.t,0) as AUMENTO, COALESCE(C2.t,0) as DISMINUYO, COALESCE(C3.t,0) as IGUAL, COALESCE(C4.t,0)  as NEP
        from (select  distinct(departamento), ccdd from departamentos_tab order by departamento) as DEP 
        left join (select ccdd,  count(*) as t  from pescador a inner join pesc_seccion5 s on a.id = s.pescador_id  where S5_10_2 is not null group by nom_dd ) as C0 on DEP.ccdd  = C0.ccdd 
        left join (select ccdd,  count(*) as t  from pescador a inner join pesc_seccion5 s on a.id = s.pescador_id  where S5_10_2 = 1 group by nom_dd ) as C1 on DEP.ccdd  = C1.ccdd 
        left join (select ccdd,  count(*) as t  from pescador a inner join pesc_seccion5 s on a.id = s.pescador_id  where S5_10_2 = 2 group by nom_dd ) as C2 on DEP.ccdd  = C2.ccdd 
        left join (select ccdd,  count(*) as t  from pescador a inner join pesc_seccion5 s on a.id = s.pescador_id  where S5_10_2 = 3 group by nom_dd ) as C3 on DEP.ccdd  = C3.ccdd 
        left join (select ccdd,  count(*) as t  from pescador a inner join pesc_seccion5 s on a.id = s.pescador_id  where S5_10_2 = 9 group by nom_dd ) as C4 on DEP.ccdd  = C4.ccdd ;
        ");
    return $q;
}


function get_report60(){
    $q = $this->db->query("
        /* TABULADO N° 58 -------------------------- PERCEPCION  VARIEDAD -------------------------*/
        select 
        DEP.CCDD, DEPARTAMENTO,  COALESCE(C0.t ,0) AS TOTAL,    
        COALESCE(C1.t,0) as AUMENTO, COALESCE(C2.t,0) as DISMINUYO, COALESCE(C3.t,0) as IGUAL, COALESCE(C4.t,0)  as NEP
        from (select  distinct(departamento), ccdd from departamentos_tab order by departamento) as DEP 
        left join (select ccdd,  count(*) as t  from pescador a inner join pesc_seccion5 s on a.id = s.pescador_id  where S5_10_3 is not null group by nom_dd ) as C0 on DEP.ccdd  = C0.ccdd 
        left join (select ccdd,  count(*) as t  from pescador a inner join pesc_seccion5 s on a.id = s.pescador_id  where S5_10_3 = 1 group by nom_dd ) as C1 on DEP.ccdd  = C1.ccdd 
        left join (select ccdd,  count(*) as t  from pescador a inner join pesc_seccion5 s on a.id = s.pescador_id  where S5_10_3 = 2 group by nom_dd ) as C2 on DEP.ccdd  = C2.ccdd 
        left join (select ccdd,  count(*) as t  from pescador a inner join pesc_seccion5 s on a.id = s.pescador_id  where S5_10_3 = 3 group by nom_dd ) as C3 on DEP.ccdd  = C3.ccdd 
        left join (select ccdd,  count(*) as t  from pescador a inner join pesc_seccion5 s on a.id = s.pescador_id  where S5_10_3 = 9 group by nom_dd ) as C4 on DEP.ccdd  = C4.ccdd ;
        ");
    return $q;
}

function get_report61(){
    $q = $this->db->query("
        /* TABULADO N° 59 --------- PERTENECE ORGANIZACION  -----------------*/
        select 
        DEP.CCDD, DEPARTAMENTO,  COALESCE(C0.t ,0) AS TOTAL,  
        COALESCE(C1.t,0) as SI, COALESCE(C2.t,0) as 'NO',  COALESCE(C3.t,0) NEP
        from (select  distinct(departamento), ccdd from departamentos_tab order by departamento) as DEP 
        left join (select ccdd,  count(*) as t  from pescador a inner join pesc_seccion6 s on a.id = s.pescador_id  where s6_1 is not null group by nom_dd ) as C0 on DEP.ccdd  = C0.ccdd 
        left join (select ccdd,  count(*) as t  from pescador a inner join pesc_seccion6 s on a.id = s.pescador_id  where s6_1 = 1 group by nom_dd ) as C1 on DEP.ccdd  = C1.ccdd 
        left join (select ccdd,  count(*) as t  from pescador a inner join pesc_seccion6 s on a.id = s.pescador_id  where s6_1 = 2 group by nom_dd ) as C2 on DEP.ccdd  = C2.ccdd 
        left join (select ccdd,  count(*) as t  from pescador a inner join pesc_seccion6 s on a.id = s.pescador_id  where s6_1 = 9 group by nom_dd ) as C3 on DEP.ccdd  = C3.ccdd ;
        ");
    return $q;
}

function get_report62(){
    $q = $this->db->query("
        /* TABULADO N° 60 -------------------------- BENEFICIOS  -------------------------*/
        select 
        DEP.CCDD, DEPARTAMENTO,  COALESCE(C0.t ,0) AS TOTAL,  
        COALESCE(C1.t,0) as INGRESOS, COALESCE(C2.t,0) as COSTOS, COALESCE(C3.t,0) as ASISTENCIA, COALESCE(C4.t,0) as POSICIONAMIENTO, COALESCE(C5.t,0) as OTRO,
        COALESCE(C6.t,0) as NINGUNO, COALESCE(C7.t,0) as NEP
        from (select  distinct(departamento), ccdd from departamentos_tab order by departamento) as DEP 
        left join (select ccdd,  count(*) as t  from pescador a inner join pesc_seccion6 s on a.id = s.pescador_id  where S6_3_1 is not null group by nom_dd ) as C0 on DEP.ccdd  = C0.ccdd 
        left join (select ccdd,  count(*) as t  from pescador a inner join pesc_seccion6 s on a.id = s.pescador_id  where S6_3_1 = 1 group by nom_dd ) as C1 on DEP.ccdd  = C1.ccdd 
        left join (select ccdd,  count(*) as t  from pescador a inner join pesc_seccion6 s on a.id = s.pescador_id  where S6_3_2 = 1 group by nom_dd ) as C2 on DEP.ccdd  = C2.ccdd 
        left join (select ccdd,  count(*) as t  from pescador a inner join pesc_seccion6 s on a.id = s.pescador_id  where S6_3_3 = 1 group by nom_dd ) as C3 on DEP.ccdd  = C3.ccdd 
        left join (select ccdd,  count(*) as t  from pescador a inner join pesc_seccion6 s on a.id = s.pescador_id  where S6_3_4 = 1 group by nom_dd ) as C4 on DEP.ccdd  = C4.ccdd 
        left join (select ccdd,  count(*) as t  from pescador a inner join pesc_seccion6 s on a.id = s.pescador_id  where S6_3_5 = 1 group by nom_dd ) as C5 on DEP.ccdd  = C5.ccdd 
        left join (select ccdd,  count(*) as t  from pescador a inner join pesc_seccion6 s on a.id = s.pescador_id  where S6_3_6 = 1 group by nom_dd ) as C6 on DEP.ccdd  = C6.ccdd 
        left join (select ccdd,  count(*) as t  from pescador a inner join pesc_seccion6 s on a.id = s.pescador_id  where S6_3_6 = 9 group by nom_dd ) as C7 on DEP.ccdd  = C7.ccdd;
        ");
    return $q;
}

function get_report63(){
    $q = $this->db->query("
        /* TABULADO N° 61 --------- CUENTA CON PERMISO -----------------*/
        select 
        DEP.CCDD, DEPARTAMENTO,  COALESCE(C0.t ,0) AS TOTAL,  
        COALESCE(C1.t,0) as SI, COALESCE(C2.t,0) as 'NO',  COALESCE(C3.t,0) NEP
        from (select  distinct(departamento), ccdd from departamentos_tab order by departamento) as DEP 
        left join (select ccdd,  count(*) as t  from pescador a inner join pesc_seccion6 s on a.id = s.pescador_id  where S6_4 is not null group by nom_dd ) as C0 on DEP.ccdd  = C0.ccdd 
        left join (select ccdd,  count(*) as t  from pescador a inner join pesc_seccion6 s on a.id = s.pescador_id  where S6_4 = 1 group by nom_dd ) as C1 on DEP.ccdd  = C1.ccdd 
        left join (select ccdd,  count(*) as t  from pescador a inner join pesc_seccion6 s on a.id = s.pescador_id  where S6_4 = 2 group by nom_dd ) as C2 on DEP.ccdd  = C2.ccdd 
        left join (select ccdd,  count(*) as t  from pescador a inner join pesc_seccion6 s on a.id = s.pescador_id  where S6_4 = 9 group by nom_dd ) as C3 on DEP.ccdd  = C3.ccdd ;
        ");
    return $q;
}


function get_report64(){
    $q = $this->db->query("
        /* TABULADO N° 62 ---------   PERMISO VIGENTE  -----------------*/
        select 
        DEP.CCDD, DEPARTAMENTO,  COALESCE(C0.t ,0) AS TOTAL,  
        COALESCE(C1.t,0) as SI, COALESCE(C2.t,0) as 'NO',  COALESCE(C3.t,0) NEP
        from (select  distinct(departamento), ccdd from departamentos_tab order by departamento) as DEP 
        left join (select ccdd,  count(*) as t  from pescador a inner join pesc_seccion6 s on a.id = s.pescador_id  where S6_5 is not null group by nom_dd ) as C0 on DEP.ccdd  = C0.ccdd 
        left join (select ccdd,  count(*) as t  from pescador a inner join pesc_seccion6 s on a.id = s.pescador_id  where S6_5 = 1 group by nom_dd ) as C1 on DEP.ccdd  = C1.ccdd 
        left join (select ccdd,  count(*) as t  from pescador a inner join pesc_seccion6 s on a.id = s.pescador_id  where S6_5 = 2 group by nom_dd ) as C2 on DEP.ccdd  = C2.ccdd 
        left join (select ccdd,  count(*) as t  from pescador a inner join pesc_seccion6 s on a.id = s.pescador_id  where S6_5 = 9 group by nom_dd ) as C3 on DEP.ccdd  = C3.ccdd ;
        ");
    return $q;
}


function get_report65(){
    $q = $this->db->query("
        /* TABULADO N° 63 ---------   PERTENECE A MAS ORGANIZACIONES  -----------------*/
        select 
        DEP.CCDD, DEPARTAMENTO,  COALESCE(C0.t ,0) AS TOTAL,  
        COALESCE(C1.t,0) as SI, COALESCE(C2.t,0) as 'NO',  COALESCE(C3.t,0) NEP
        from (select  distinct(departamento), ccdd from departamentos_tab order by departamento) as DEP 
        left join (select ccdd,  count(*) as t  from pescador a inner join pesc_seccion6 s on a.id = s.pescador_id  where S6_6 is not null group by nom_dd ) as C0 on DEP.ccdd  = C0.ccdd 
        left join (select ccdd,  count(*) as t  from pescador a inner join pesc_seccion6 s on a.id = s.pescador_id  where S6_6 = 1 group by nom_dd ) as C1 on DEP.ccdd  = C1.ccdd 
        left join (select ccdd,  count(*) as t  from pescador a inner join pesc_seccion6 s on a.id = s.pescador_id  where S6_6 = 2 group by nom_dd ) as C2 on DEP.ccdd  = C2.ccdd 
        left join (select ccdd,  count(*) as t  from pescador a inner join pesc_seccion6 s on a.id = s.pescador_id  where S6_6 = 9 group by nom_dd ) as C3 on DEP.ccdd  = C3.ccdd ;
        ");
    return $q;
}

function get_report66(){
    $q = $this->db->query("
        /* TABULADO N° 64 -------------------------- COMO FINANCIO -------------------------*/
        select 
        DEP.CCDD, DEPARTAMENTO,  COALESCE(C0.t ,0) AS TOTAL,
        COALESCE(C1.t,0) as TERCEROS, COALESCE(C2.t,0) as PROPIO, COALESCE(C3.t,0) as NO_FINANCIA, COALESCE(C4.t,0) as NO_TRABAJO, COALESCE(C5.t,0) as  NEP
        from (select  distinct(departamento), ccdd from departamentos_tab order by departamento) as DEP 
        left join (select ccdd,  count(*) as t  from pescador a inner join pesc_seccion7 s on a.id = s.pescador_id  where S7_101 is not null group by nom_dd ) as C0 on DEP.ccdd  = C0.ccdd 
        left join (select ccdd,  count(*) as t  from pescador a inner join pesc_seccion7 s on a.id = s.pescador_id  where S7_101 = 1 group by nom_dd ) as C1 on DEP.ccdd  = C1.ccdd 
        left join (select ccdd,  count(*) as t  from pescador a inner join pesc_seccion7 s on a.id = s.pescador_id  where S7_102 = 1 group by nom_dd ) as C2 on DEP.ccdd  = C2.ccdd 
        left join (select ccdd,  count(*) as t  from pescador a inner join pesc_seccion7 s on a.id = s.pescador_id  where S7_103 = 1 group by nom_dd ) as C3 on DEP.ccdd  = C3.ccdd 
        left join (select ccdd,  count(*) as t  from pescador a inner join pesc_seccion7 s on a.id = s.pescador_id  where S7_104 = 1 group by nom_dd ) as C4 on DEP.ccdd  = C4.ccdd 
        left join (select ccdd,  count(*) as t  from pescador a inner join pesc_seccion7 s on a.id = s.pescador_id  where S7_104 = 9 group by nom_dd ) as C5 on DEP.ccdd  = C5.ccdd ;
        ");
    return $q;
}


function get_report67(){
    $q = $this->db->query("
        /* TABULADO N° 65 -------------------------- FUE OTORGADO   -------------------------*/
        select 
        DEP.CCDD, DEPARTAMENTO,  COALESCE(C0.t ,0) AS TOTAL, 
        COALESCE(C1.t,0) as PARIENTE, COALESCE(C2.t,0) as COMERCIANTE, COALESCE(C3.t,0) as CAJA, COALESCE(C4.t,0) as BANCO, COALESCE(C5.t,0) as FINANCIERA,
        COALESCE(C6.t,0) as OTRO, COALESCE(C7.t,0) as  NEP
        from (select  distinct(departamento), ccdd from departamentos_tab order by departamento) as DEP 
        left join (select ccdd,  count(*) as t  from pescador a inner join pesc_seccion7 s on a.id = s.pescador_id  where S7_201 is not null group by nom_dd ) as C0 on DEP.ccdd  = C0.ccdd 
        left join (select ccdd,  count(*) as t  from pescador a inner join pesc_seccion7 s on a.id = s.pescador_id  where S7_201 = 1 group by nom_dd ) as C1 on DEP.ccdd  = C1.ccdd 
        left join (select ccdd,  count(*) as t  from pescador a inner join pesc_seccion7 s on a.id = s.pescador_id  where S7_202 = 1 group by nom_dd ) as C2 on DEP.ccdd  = C2.ccdd 
        left join (select ccdd,  count(*) as t  from pescador a inner join pesc_seccion7 s on a.id = s.pescador_id  where S7_203 = 1 group by nom_dd ) as C3 on DEP.ccdd  = C3.ccdd 
        left join (select ccdd,  count(*) as t  from pescador a inner join pesc_seccion7 s on a.id = s.pescador_id  where S7_204 = 1 group by nom_dd ) as C4 on DEP.ccdd  = C4.ccdd 
        left join (select ccdd,  count(*) as t  from pescador a inner join pesc_seccion7 s on a.id = s.pescador_id  where S7_205 = 1 group by nom_dd ) as C5 on DEP.ccdd  = C5.ccdd 
        left join (select ccdd,  count(*) as t  from pescador a inner join pesc_seccion7 s on a.id = s.pescador_id  where S7_206 = 1 group by nom_dd ) as C6 on DEP.ccdd  = C6.ccdd 
        left join (select ccdd,  count(*) as t  from pescador a inner join pesc_seccion7 s on a.id = s.pescador_id  where S7_206 = 9 group by nom_dd ) as C7 on DEP.ccdd  = C7.ccdd ;
        ");
    return $q;
}


function get_report68(){
    $q = $this->db->query("
        /* TABULADO N° 66  -------------------------- MESES MAYOR PRODUCCION -------------------------*/
        select 
        DEP.CCDD, DEPARTAMENTO,  COALESCE(C0.t ,0) AS TOTAL, 
        COALESCE(C1.t,0) as AGO, COALESCE(C2.t,0) as SEP, COALESCE(C3.t,0) as OCT, COALESCE(C4.t,0) as NOV, COALESCE(C5.t,0) as DIC,
        COALESCE(C6.t,0) as ENE, COALESCE(C7.t,0) as FEB, COALESCE(C8.t,0) as MAR, COALESCE(C9.t,0) ABR, COALESCE(C10.t,0) MAY, 
        COALESCE(C11.t,0) JUN, COALESCE(C12.t,0) JUL, COALESCE(C13.t,0)  NEP
        from (select  distinct(departamento), ccdd from departamentos_tab order by departamento) as DEP 
        left join (select ccdd,  count(*) as t  from pescador a inner join pesc_seccion7 s on a.id = s.pescador_id  where S7_3_1 is not null group by nom_dd ) as C0 on DEP.ccdd  = C0.ccdd 
        left join (select ccdd,  count(*) as t  from pescador a inner join pesc_seccion7 s on a.id = s.pescador_id  where S7_3_1 = 1 group by nom_dd ) as C1 on DEP.ccdd  = C1.ccdd 
        left join (select ccdd,  count(*) as t  from pescador a inner join pesc_seccion7 s on a.id = s.pescador_id  where S7_3_2 = 1 group by nom_dd ) as C2 on DEP.ccdd  = C2.ccdd 
        left join (select ccdd,  count(*) as t  from pescador a inner join pesc_seccion7 s on a.id = s.pescador_id  where S7_3_3 = 1 group by nom_dd ) as C3 on DEP.ccdd  = C3.ccdd 
        left join (select ccdd,  count(*) as t  from pescador a inner join pesc_seccion7 s on a.id = s.pescador_id  where S7_3_4 = 1 group by nom_dd ) as C4 on DEP.ccdd  = C4.ccdd 
        left join (select ccdd,  count(*) as t  from pescador a inner join pesc_seccion7 s on a.id = s.pescador_id  where S7_3_5 = 1 group by nom_dd ) as C5 on DEP.ccdd  = C5.ccdd 
        left join (select ccdd,  count(*) as t  from pescador a inner join pesc_seccion7 s on a.id = s.pescador_id  where S7_3_6 = 1 group by nom_dd ) as C6 on DEP.ccdd  = C6.ccdd 
        left join (select ccdd,  count(*) as t  from pescador a inner join pesc_seccion7 s on a.id = s.pescador_id  where S7_3_7 = 1 group by nom_dd ) as C7 on DEP.ccdd  = C7.ccdd 
        left join (select ccdd,  count(*) as t  from pescador a inner join pesc_seccion7 s on a.id = s.pescador_id  where S7_3_8 = 1 group by nom_dd ) as C8 on DEP.ccdd  = C8.ccdd 
        left join (select ccdd,  count(*) as t  from pescador a inner join pesc_seccion7 s on a.id = s.pescador_id  where S7_3_9 = 1 group by nom_dd ) as C9 on DEP.ccdd  = C9.ccdd 
        left join (select ccdd,  count(*) as t  from pescador a inner join pesc_seccion7 s on a.id = s.pescador_id  where S7_3_10 = 1 group by nom_dd ) as C10 on DEP.ccdd  = C10.ccdd 
        left join (select ccdd,  count(*) as t  from pescador a inner join pesc_seccion7 s on a.id = s.pescador_id  where S7_3_11 = 1 group by nom_dd ) as C11 on DEP.ccdd  = C11.ccdd 
        left join (select ccdd,  count(*) as t  from pescador a inner join pesc_seccion7 s on a.id = s.pescador_id  where S7_3_12 = 1 group by nom_dd ) as C12 on DEP.ccdd  = C12.ccdd 
        left join (select ccdd,  count(*) as t  from pescador a inner join pesc_seccion7 s on a.id = s.pescador_id  where S7_3_12 = 9 group by nom_dd ) as C13 on DEP.ccdd  = C13.ccdd;
        ");
    return $q;
}

function get_report69(){
    $q = $this->db->query("
        /* TABULADO N° 67 -------------------------- DESTINO PESCA -------------------------*/
        select 
        DEP.CCDD, DEPARTAMENTO,  COALESCE(C0.t ,0) AS TOTAL,
        COALESCE(C1.t,0) as VENTA, COALESCE(C2.t,0) as AUTOCONSUMO, COALESCE(C3.t,0) as TRUEQUE, COALESCE(C4.t,0) as OTRO, COALESCE(C5.t,0) as  NEP
        from (select  distinct(departamento), ccdd from departamentos_tab order by departamento) as DEP 
        left join (select ccdd,  count(*) as t  from pescador a inner join pesc_seccion7 s on a.id = s.pescador_id  where S7_4_1 is not null group by nom_dd ) as C0 on DEP.ccdd  = C0.ccdd 
        left join (select ccdd,  count(*) as t  from pescador a inner join pesc_seccion7 s on a.id = s.pescador_id  where S7_4_1 = 1 group by nom_dd ) as C1 on DEP.ccdd  = C1.ccdd 
        left join (select ccdd,  count(*) as t  from pescador a inner join pesc_seccion7 s on a.id = s.pescador_id  where S7_4_2 = 1 group by nom_dd ) as C2 on DEP.ccdd  = C2.ccdd 
        left join (select ccdd,  count(*) as t  from pescador a inner join pesc_seccion7 s on a.id = s.pescador_id  where S7_4_3 = 1 group by nom_dd ) as C3 on DEP.ccdd  = C3.ccdd 
        left join (select ccdd,  count(*) as t  from pescador a inner join pesc_seccion7 s on a.id = s.pescador_id  where S7_4_4 = 1 group by nom_dd ) as C4 on DEP.ccdd  = C4.ccdd 
        left join (select ccdd,  count(*) as t  from pescador a inner join pesc_seccion7 s on a.id = s.pescador_id  where S7_4_4 = 9 group by nom_dd ) as C5 on DEP.ccdd  = C5.ccdd ;
        ");
    return $q;
}

function get_report70(){                    /* TABULADO N° 68 -------------------------- PECES QUE VENDIERON -------------------------*/
    $q = $this->db->query("
                    SELECT  table1.CCDD, table1.DEPARTAMENTO,  TOTAL,
                    Acarahuazu , Bagre , Boquichico , Camaron_rio , Carachama , Carachi_amarillo , Doncella , Fasaco  , Lisa , Palometa , Pejerrey , Sabalo , Tilapia , Trucha , Zungaro  FROM
                    (select 
                    DEP.CCDD, DEPARTAMENTO, COALESCE(C0.t,0) as TOTAL, ( COALESCE(C1.t,0) + COALESCE(C2.t,0) + COALESCE(C3.t,0) +  COALESCE(C4.t,0) +  COALESCE(C5.t,0) +  
                    COALESCE(C6.t,0) + COALESCE(C7.t,0) + COALESCE(C8.t,0) +  COALESCE(C9.t,0)  + COALESCE(C10.t,0)  ) AS Acarahuazu
                    from (select  distinct(departamento), ccdd from departamentos_tab order by departamento) as DEP 
                    left join (select ccdd,  count(*) as t  from pescador a inner join pesc_seccion7 s on a.id = s.pescador_id  where S7_5_1_c is not null group by nom_dd ) as C0 on DEP.ccdd  = C0.ccdd 
                    left join (select ccdd,  count(*) as t  from pescador a inner join pesc_seccion7 s on a.id = s.pescador_id  where S7_5_1_c = 1 group by nom_dd ) as C1 on DEP.ccdd  = C1.ccdd 
                    left join (select ccdd,  count(*) as t  from pescador a inner join pesc_seccion7 s on a.id = s.pescador_id  where S7_5_2_c = 1 group by nom_dd ) as C2 on DEP.ccdd  = C2.ccdd 
                    left join (select ccdd,  count(*) as t  from pescador a inner join pesc_seccion7 s on a.id = s.pescador_id  where S7_5_3_c = 1 group by nom_dd ) as C3 on DEP.ccdd  = C3.ccdd 
                    left join (select ccdd,  count(*) as t  from pescador a inner join pesc_seccion7 s on a.id = s.pescador_id  where S7_5_4_c = 1 group by nom_dd ) as C4 on DEP.ccdd  = C4.ccdd 
                    left join (select ccdd,  count(*) as t  from pescador a inner join pesc_seccion7 s on a.id = s.pescador_id  where S7_5_5_c = 1 group by nom_dd ) as C5 on DEP.ccdd  = C5.ccdd 
                    left join (select ccdd,  count(*) as t  from pescador a inner join pesc_seccion7 s on a.id = s.pescador_id  where S7_5_6_c = 1 group by nom_dd ) as C6 on DEP.ccdd  = C6.ccdd 
                    left join (select ccdd,  count(*) as t  from pescador a inner join pesc_seccion7 s on a.id = s.pescador_id  where S7_5_7_c = 1 group by nom_dd ) as C7 on DEP.ccdd  = C7.ccdd 
                    left join (select ccdd,  count(*) as t  from pescador a inner join pesc_seccion7 s on a.id = s.pescador_id  where S7_5_8_c = 1 group by nom_dd ) as C8 on DEP.ccdd  = C8.ccdd 
                    left join (select ccdd,  count(*) as t  from pescador a inner join pesc_seccion7 s on a.id = s.pescador_id  where S7_5_9_c = 1 group by nom_dd ) as C9 on DEP.ccdd  = C9.ccdd 
                    left join (select ccdd,  count(*) as t  from pescador a inner join pesc_seccion7 s on a.id = s.pescador_id  where S7_5_10_c = 1 group by nom_dd ) as C10 on DEP.ccdd  = C10.ccdd ) as table1
                    INNER JOIN
                    (select 
                    DEP.CCDD, DEPARTAMENTO, ( COALESCE(C1.t,0) + COALESCE(C2.t,0) + COALESCE(C3.t,0) +  COALESCE(C4.t,0) +  COALESCE(C5.t,0) +  
                    COALESCE(C6.t,0) + COALESCE(C7.t,0) + COALESCE(C8.t,0) +  COALESCE(C9.t,0)  + COALESCE(C10.t,0)  ) AS Bagre
                    from (select  distinct(departamento), ccdd from departamentos_tab order by departamento) as DEP 
                    left join (select ccdd,  count(*) as t  from pescador a inner join pesc_seccion7 s on a.id = s.pescador_id  where S7_5_1_c = 2 group by nom_dd ) as C1 on DEP.ccdd  = C1.ccdd 
                    left join (select ccdd,  count(*) as t  from pescador a inner join pesc_seccion7 s on a.id = s.pescador_id  where S7_5_2_c = 2 group by nom_dd ) as C2 on DEP.ccdd  = C2.ccdd 
                    left join (select ccdd,  count(*) as t  from pescador a inner join pesc_seccion7 s on a.id = s.pescador_id  where S7_5_3_c = 2 group by nom_dd ) as C3 on DEP.ccdd  = C3.ccdd 
                    left join (select ccdd,  count(*) as t  from pescador a inner join pesc_seccion7 s on a.id = s.pescador_id  where S7_5_4_c = 2 group by nom_dd ) as C4 on DEP.ccdd  = C4.ccdd 
                    left join (select ccdd,  count(*) as t  from pescador a inner join pesc_seccion7 s on a.id = s.pescador_id  where S7_5_5_c = 2 group by nom_dd ) as C5 on DEP.ccdd  = C5.ccdd 
                    left join (select ccdd,  count(*) as t  from pescador a inner join pesc_seccion7 s on a.id = s.pescador_id  where S7_5_6_c = 2 group by nom_dd ) as C6 on DEP.ccdd  = C6.ccdd 
                    left join (select ccdd,  count(*) as t  from pescador a inner join pesc_seccion7 s on a.id = s.pescador_id  where S7_5_7_c = 2 group by nom_dd ) as C7 on DEP.ccdd  = C7.ccdd 
                    left join (select ccdd,  count(*) as t  from pescador a inner join pesc_seccion7 s on a.id = s.pescador_id  where S7_5_8_c = 2 group by nom_dd ) as C8 on DEP.ccdd  = C8.ccdd 
                    left join (select ccdd,  count(*) as t  from pescador a inner join pesc_seccion7 s on a.id = s.pescador_id  where S7_5_9_c = 2 group by nom_dd ) as C9 on DEP.ccdd  = C9.ccdd 
                    left join (select ccdd,  count(*) as t  from pescador a inner join pesc_seccion7 s on a.id = s.pescador_id  where S7_5_10_c = 2 group by nom_dd ) as C10 on DEP.ccdd  = C10.ccdd ) as table2
                    on table1.ccdd = table2.ccdd 
                    INNER JOIN
                    (select 
                    DEP.CCDD, DEPARTAMENTO, ( COALESCE(C1.t,0) + COALESCE(C2.t,0) + COALESCE(C3.t,0) +  COALESCE(C4.t,0) +  COALESCE(C5.t,0) +  
                    COALESCE(C6.t,0) + COALESCE(C7.t,0) + COALESCE(C8.t,0) +  COALESCE(C9.t,0)  + COALESCE(C10.t,0)  ) AS Boquichico
                    from (select  distinct(departamento), ccdd from departamentos_tab order by departamento) as DEP 
                    left join (select ccdd,  count(*) as t  from pescador a inner join pesc_seccion7 s on a.id = s.pescador_id  where S7_5_1_c = 4 group by nom_dd ) as C1 on DEP.ccdd  = C1.ccdd 
                    left join (select ccdd,  count(*) as t  from pescador a inner join pesc_seccion7 s on a.id = s.pescador_id  where S7_5_2_c = 4 group by nom_dd ) as C2 on DEP.ccdd  = C2.ccdd 
                    left join (select ccdd,  count(*) as t  from pescador a inner join pesc_seccion7 s on a.id = s.pescador_id  where S7_5_3_c = 4 group by nom_dd ) as C3 on DEP.ccdd  = C3.ccdd 
                    left join (select ccdd,  count(*) as t  from pescador a inner join pesc_seccion7 s on a.id = s.pescador_id  where S7_5_4_c = 4 group by nom_dd ) as C4 on DEP.ccdd  = C4.ccdd 
                    left join (select ccdd,  count(*) as t  from pescador a inner join pesc_seccion7 s on a.id = s.pescador_id  where S7_5_5_c = 4 group by nom_dd ) as C5 on DEP.ccdd  = C5.ccdd 
                    left join (select ccdd,  count(*) as t  from pescador a inner join pesc_seccion7 s on a.id = s.pescador_id  where S7_5_6_c = 4 group by nom_dd ) as C6 on DEP.ccdd  = C6.ccdd 
                    left join (select ccdd,  count(*) as t  from pescador a inner join pesc_seccion7 s on a.id = s.pescador_id  where S7_5_7_c = 4 group by nom_dd ) as C7 on DEP.ccdd  = C7.ccdd 
                    left join (select ccdd,  count(*) as t  from pescador a inner join pesc_seccion7 s on a.id = s.pescador_id  where S7_5_8_c = 4 group by nom_dd ) as C8 on DEP.ccdd  = C8.ccdd 
                    left join (select ccdd,  count(*) as t  from pescador a inner join pesc_seccion7 s on a.id = s.pescador_id  where S7_5_9_c = 4 group by nom_dd ) as C9 on DEP.ccdd  = C9.ccdd 
                    left join (select ccdd,  count(*) as t  from pescador a inner join pesc_seccion7 s on a.id = s.pescador_id  where S7_5_10_c = 4 group by nom_dd ) as C10 on DEP.ccdd  = C10.ccdd ) as table3
                    on table1.ccdd = table3.ccdd 
                    INNER JOIN
                    (select 
                    DEP.CCDD, DEPARTAMENTO, ( COALESCE(C1.t,0) + COALESCE(C2.t,0) + COALESCE(C3.t,0) +  COALESCE(C4.t,0) +  COALESCE(C5.t,0) +  
                    COALESCE(C6.t,0) + COALESCE(C7.t,0) + COALESCE(C8.t,0) +  COALESCE(C9.t,0)  + COALESCE(C10.t,0)  ) AS Camaron_rio
                    from (select  distinct(departamento), ccdd from departamentos_tab order by departamento) as DEP 
                    left join (select ccdd,  count(*) as t  from pescador a inner join pesc_seccion7 s on a.id = s.pescador_id  where S7_5_1_c = 6 group by nom_dd ) as C1 on DEP.ccdd  = C1.ccdd 
                    left join (select ccdd,  count(*) as t  from pescador a inner join pesc_seccion7 s on a.id = s.pescador_id  where S7_5_2_c = 6 group by nom_dd ) as C2 on DEP.ccdd  = C2.ccdd 
                    left join (select ccdd,  count(*) as t  from pescador a inner join pesc_seccion7 s on a.id = s.pescador_id  where S7_5_3_c = 6 group by nom_dd ) as C3 on DEP.ccdd  = C3.ccdd 
                    left join (select ccdd,  count(*) as t  from pescador a inner join pesc_seccion7 s on a.id = s.pescador_id  where S7_5_4_c = 6 group by nom_dd ) as C4 on DEP.ccdd  = C4.ccdd 
                    left join (select ccdd,  count(*) as t  from pescador a inner join pesc_seccion7 s on a.id = s.pescador_id  where S7_5_5_c = 6 group by nom_dd ) as C5 on DEP.ccdd  = C5.ccdd 
                    left join (select ccdd,  count(*) as t  from pescador a inner join pesc_seccion7 s on a.id = s.pescador_id  where S7_5_6_c = 6 group by nom_dd ) as C6 on DEP.ccdd  = C6.ccdd 
                    left join (select ccdd,  count(*) as t  from pescador a inner join pesc_seccion7 s on a.id = s.pescador_id  where S7_5_7_c = 6 group by nom_dd ) as C7 on DEP.ccdd  = C7.ccdd 
                    left join (select ccdd,  count(*) as t  from pescador a inner join pesc_seccion7 s on a.id = s.pescador_id  where S7_5_8_c = 6 group by nom_dd ) as C8 on DEP.ccdd  = C8.ccdd 
                    left join (select ccdd,  count(*) as t  from pescador a inner join pesc_seccion7 s on a.id = s.pescador_id  where S7_5_9_c = 6 group by nom_dd ) as C9 on DEP.ccdd  = C9.ccdd 
                    left join (select ccdd,  count(*) as t  from pescador a inner join pesc_seccion7 s on a.id = s.pescador_id  where S7_5_10_c = 6 group by nom_dd ) as C10 on DEP.ccdd  = C10.ccdd ) as table4
                    on table1.ccdd = table4.ccdd 
                    INNER JOIN
                    (select 
                    DEP.CCDD, DEPARTAMENTO, ( COALESCE(C1.t,0) + COALESCE(C2.t,0) + COALESCE(C3.t,0) +  COALESCE(C4.t,0) +  COALESCE(C5.t,0) +  
                    COALESCE(C6.t,0) + COALESCE(C7.t,0) + COALESCE(C8.t,0) +  COALESCE(C9.t,0)  + COALESCE(C10.t,0)  ) AS Carachama
                    from (select  distinct(departamento), ccdd from departamentos_tab order by departamento) as DEP 
                    left join (select ccdd,  count(*) as t  from pescador a inner join pesc_seccion7 s on a.id = s.pescador_id  where S7_5_1_c = 7 group by nom_dd ) as C1 on DEP.ccdd  = C1.ccdd 
                    left join (select ccdd,  count(*) as t  from pescador a inner join pesc_seccion7 s on a.id = s.pescador_id  where S7_5_2_c = 7 group by nom_dd ) as C2 on DEP.ccdd  = C2.ccdd 
                    left join (select ccdd,  count(*) as t  from pescador a inner join pesc_seccion7 s on a.id = s.pescador_id  where S7_5_3_c = 7 group by nom_dd ) as C3 on DEP.ccdd  = C3.ccdd 
                    left join (select ccdd,  count(*) as t  from pescador a inner join pesc_seccion7 s on a.id = s.pescador_id  where S7_5_4_c = 7 group by nom_dd ) as C4 on DEP.ccdd  = C4.ccdd 
                    left join (select ccdd,  count(*) as t  from pescador a inner join pesc_seccion7 s on a.id = s.pescador_id  where S7_5_5_c = 7 group by nom_dd ) as C5 on DEP.ccdd  = C5.ccdd 
                    left join (select ccdd,  count(*) as t  from pescador a inner join pesc_seccion7 s on a.id = s.pescador_id  where S7_5_6_c = 7 group by nom_dd ) as C6 on DEP.ccdd  = C6.ccdd 
                    left join (select ccdd,  count(*) as t  from pescador a inner join pesc_seccion7 s on a.id = s.pescador_id  where S7_5_7_c = 7 group by nom_dd ) as C7 on DEP.ccdd  = C7.ccdd 
                    left join (select ccdd,  count(*) as t  from pescador a inner join pesc_seccion7 s on a.id = s.pescador_id  where S7_5_8_c = 7 group by nom_dd ) as C8 on DEP.ccdd  = C8.ccdd 
                    left join (select ccdd,  count(*) as t  from pescador a inner join pesc_seccion7 s on a.id = s.pescador_id  where S7_5_9_c = 7 group by nom_dd ) as C9 on DEP.ccdd  = C9.ccdd 
                    left join (select ccdd,  count(*) as t  from pescador a inner join pesc_seccion7 s on a.id = s.pescador_id  where S7_5_10_c = 7 group by nom_dd ) as C10 on DEP.ccdd  = C10.ccdd ) as table5
                    on table1.ccdd = table5.ccdd 
                    INNER JOIN
                    (select 
                    DEP.CCDD, DEPARTAMENTO, ( COALESCE(C1.t,0) + COALESCE(C2.t,0) + COALESCE(C3.t,0) +  COALESCE(C4.t,0) +  COALESCE(C5.t,0) +  
                    COALESCE(C6.t,0) + COALESCE(C7.t,0) + COALESCE(C8.t,0) +  COALESCE(C9.t,0)  + COALESCE(C10.t,0)  ) AS Carachi_amarillo
                    from (select  distinct(departamento), ccdd from departamentos_tab order by departamento) as DEP 
                    left join (select ccdd,  count(*) as t  from pescador a inner join pesc_seccion7 s on a.id = s.pescador_id  where S7_5_1_c = 8 group by nom_dd ) as C1 on DEP.ccdd  = C1.ccdd 
                    left join (select ccdd,  count(*) as t  from pescador a inner join pesc_seccion7 s on a.id = s.pescador_id  where S7_5_2_c = 8 group by nom_dd ) as C2 on DEP.ccdd  = C2.ccdd 
                    left join (select ccdd,  count(*) as t  from pescador a inner join pesc_seccion7 s on a.id = s.pescador_id  where S7_5_3_c = 8 group by nom_dd ) as C3 on DEP.ccdd  = C3.ccdd 
                    left join (select ccdd,  count(*) as t  from pescador a inner join pesc_seccion7 s on a.id = s.pescador_id  where S7_5_4_c = 8 group by nom_dd ) as C4 on DEP.ccdd  = C4.ccdd 
                    left join (select ccdd,  count(*) as t  from pescador a inner join pesc_seccion7 s on a.id = s.pescador_id  where S7_5_5_c = 8 group by nom_dd ) as C5 on DEP.ccdd  = C5.ccdd 
                    left join (select ccdd,  count(*) as t  from pescador a inner join pesc_seccion7 s on a.id = s.pescador_id  where S7_5_6_c = 8 group by nom_dd ) as C6 on DEP.ccdd  = C6.ccdd 
                    left join (select ccdd,  count(*) as t  from pescador a inner join pesc_seccion7 s on a.id = s.pescador_id  where S7_5_7_c = 8 group by nom_dd ) as C7 on DEP.ccdd  = C7.ccdd 
                    left join (select ccdd,  count(*) as t  from pescador a inner join pesc_seccion7 s on a.id = s.pescador_id  where S7_5_8_c = 8 group by nom_dd ) as C8 on DEP.ccdd  = C8.ccdd 
                    left join (select ccdd,  count(*) as t  from pescador a inner join pesc_seccion7 s on a.id = s.pescador_id  where S7_5_9_c = 8 group by nom_dd ) as C9 on DEP.ccdd  = C9.ccdd 
                    left join (select ccdd,  count(*) as t  from pescador a inner join pesc_seccion7 s on a.id = s.pescador_id  where S7_5_10_c = 8 group by nom_dd ) as C10 on DEP.ccdd  = C10.ccdd ) as table6
                    on table1.ccdd = table6.ccdd 
                    INNER JOIN
                    (select 
                    DEP.CCDD, DEPARTAMENTO, ( COALESCE(C1.t,0) + COALESCE(C2.t,0) + COALESCE(C3.t,0) +  COALESCE(C4.t,0) +  COALESCE(C5.t,0) +  
                    COALESCE(C6.t,0) + COALESCE(C7.t,0) + COALESCE(C8.t,0) +  COALESCE(C9.t,0)  + COALESCE(C10.t,0)  ) AS Doncella
                    from (select  distinct(departamento), ccdd from departamentos_tab order by departamento) as DEP 
                    left join (select ccdd,  count(*) as t  from pescador a inner join pesc_seccion7 s on a.id = s.pescador_id  where S7_5_1_c = 14 group by nom_dd ) as C1 on DEP.ccdd  = C1.ccdd 
                    left join (select ccdd,  count(*) as t  from pescador a inner join pesc_seccion7 s on a.id = s.pescador_id  where S7_5_2_c = 14 group by nom_dd ) as C2 on DEP.ccdd  = C2.ccdd 
                    left join (select ccdd,  count(*) as t  from pescador a inner join pesc_seccion7 s on a.id = s.pescador_id  where S7_5_3_c = 14 group by nom_dd ) as C3 on DEP.ccdd  = C3.ccdd 
                    left join (select ccdd,  count(*) as t  from pescador a inner join pesc_seccion7 s on a.id = s.pescador_id  where S7_5_4_c = 14 group by nom_dd ) as C4 on DEP.ccdd  = C4.ccdd 
                    left join (select ccdd,  count(*) as t  from pescador a inner join pesc_seccion7 s on a.id = s.pescador_id  where S7_5_5_c = 14 group by nom_dd ) as C5 on DEP.ccdd  = C5.ccdd 
                    left join (select ccdd,  count(*) as t  from pescador a inner join pesc_seccion7 s on a.id = s.pescador_id  where S7_5_6_c = 14 group by nom_dd ) as C6 on DEP.ccdd  = C6.ccdd 
                    left join (select ccdd,  count(*) as t  from pescador a inner join pesc_seccion7 s on a.id = s.pescador_id  where S7_5_7_c = 14 group by nom_dd ) as C7 on DEP.ccdd  = C7.ccdd 
                    left join (select ccdd,  count(*) as t  from pescador a inner join pesc_seccion7 s on a.id = s.pescador_id  where S7_5_8_c = 14 group by nom_dd ) as C8 on DEP.ccdd  = C8.ccdd 
                    left join (select ccdd,  count(*) as t  from pescador a inner join pesc_seccion7 s on a.id = s.pescador_id  where S7_5_9_c = 14 group by nom_dd ) as C9 on DEP.ccdd  = C9.ccdd 
                    left join (select ccdd,  count(*) as t  from pescador a inner join pesc_seccion7 s on a.id = s.pescador_id  where S7_5_10_c = 14 group by nom_dd ) as C10 on DEP.ccdd  = C10.ccdd ) as table7
                    on table1.ccdd = table7.ccdd 
                    INNER JOIN
                    (select 
                    DEP.CCDD, DEPARTAMENTO, ( COALESCE(C1.t,0) + COALESCE(C2.t,0) + COALESCE(C3.t,0) +  COALESCE(C4.t,0) +  COALESCE(C5.t,0) +  
                    COALESCE(C6.t,0) + COALESCE(C7.t,0) + COALESCE(C8.t,0) +  COALESCE(C9.t,0)  + COALESCE(C10.t,0)  ) AS Fasaco
                    from (select  distinct(departamento), ccdd from departamentos_tab order by departamento) as DEP 
                    left join (select ccdd,  count(*) as t  from pescador a inner join pesc_seccion7 s on a.id = s.pescador_id  where S7_5_1_c = 16 group by nom_dd ) as C1 on DEP.ccdd  = C1.ccdd 
                    left join (select ccdd,  count(*) as t  from pescador a inner join pesc_seccion7 s on a.id = s.pescador_id  where S7_5_2_c = 16 group by nom_dd ) as C2 on DEP.ccdd  = C2.ccdd 
                    left join (select ccdd,  count(*) as t  from pescador a inner join pesc_seccion7 s on a.id = s.pescador_id  where S7_5_3_c = 16 group by nom_dd ) as C3 on DEP.ccdd  = C3.ccdd 
                    left join (select ccdd,  count(*) as t  from pescador a inner join pesc_seccion7 s on a.id = s.pescador_id  where S7_5_4_c = 16 group by nom_dd ) as C4 on DEP.ccdd  = C4.ccdd 
                    left join (select ccdd,  count(*) as t  from pescador a inner join pesc_seccion7 s on a.id = s.pescador_id  where S7_5_5_c = 16 group by nom_dd ) as C5 on DEP.ccdd  = C5.ccdd 
                    left join (select ccdd,  count(*) as t  from pescador a inner join pesc_seccion7 s on a.id = s.pescador_id  where S7_5_6_c = 16 group by nom_dd ) as C6 on DEP.ccdd  = C6.ccdd 
                    left join (select ccdd,  count(*) as t  from pescador a inner join pesc_seccion7 s on a.id = s.pescador_id  where S7_5_7_c = 16 group by nom_dd ) as C7 on DEP.ccdd  = C7.ccdd 
                    left join (select ccdd,  count(*) as t  from pescador a inner join pesc_seccion7 s on a.id = s.pescador_id  where S7_5_8_c = 16 group by nom_dd ) as C8 on DEP.ccdd  = C8.ccdd 
                    left join (select ccdd,  count(*) as t  from pescador a inner join pesc_seccion7 s on a.id = s.pescador_id  where S7_5_9_c = 16 group by nom_dd ) as C9 on DEP.ccdd  = C9.ccdd 
                    left join (select ccdd,  count(*) as t  from pescador a inner join pesc_seccion7 s on a.id = s.pescador_id  where S7_5_10_c = 16 group by nom_dd ) as C10 on DEP.ccdd  = C10.ccdd ) as table8
                    on table1.ccdd = table8.ccdd 
                    INNER JOIN
                    (select 
                    DEP.CCDD, DEPARTAMENTO, ( COALESCE(C1.t,0) + COALESCE(C2.t,0) + COALESCE(C3.t,0) +  COALESCE(C4.t,0) +  COALESCE(C5.t,0) +  
                    COALESCE(C6.t,0) + COALESCE(C7.t,0) + COALESCE(C8.t,0) +  COALESCE(C9.t,0)  + COALESCE(C10.t,0)  ) AS Lisa
                    from (select  distinct(departamento), ccdd from departamentos_tab order by departamento) as DEP 
                    left join (select ccdd,  count(*) as t  from pescador a inner join pesc_seccion7 s on a.id = s.pescador_id  where S7_5_1_c = 19 group by nom_dd ) as C1 on DEP.ccdd  = C1.ccdd 
                    left join (select ccdd,  count(*) as t  from pescador a inner join pesc_seccion7 s on a.id = s.pescador_id  where S7_5_2_c = 19 group by nom_dd ) as C2 on DEP.ccdd  = C2.ccdd 
                    left join (select ccdd,  count(*) as t  from pescador a inner join pesc_seccion7 s on a.id = s.pescador_id  where S7_5_3_c = 19 group by nom_dd ) as C3 on DEP.ccdd  = C3.ccdd 
                    left join (select ccdd,  count(*) as t  from pescador a inner join pesc_seccion7 s on a.id = s.pescador_id  where S7_5_4_c = 19 group by nom_dd ) as C4 on DEP.ccdd  = C4.ccdd 
                    left join (select ccdd,  count(*) as t  from pescador a inner join pesc_seccion7 s on a.id = s.pescador_id  where S7_5_5_c = 19 group by nom_dd ) as C5 on DEP.ccdd  = C5.ccdd 
                    left join (select ccdd,  count(*) as t  from pescador a inner join pesc_seccion7 s on a.id = s.pescador_id  where S7_5_6_c = 19 group by nom_dd ) as C6 on DEP.ccdd  = C6.ccdd 
                    left join (select ccdd,  count(*) as t  from pescador a inner join pesc_seccion7 s on a.id = s.pescador_id  where S7_5_7_c = 19 group by nom_dd ) as C7 on DEP.ccdd  = C7.ccdd 
                    left join (select ccdd,  count(*) as t  from pescador a inner join pesc_seccion7 s on a.id = s.pescador_id  where S7_5_8_c = 19 group by nom_dd ) as C8 on DEP.ccdd  = C8.ccdd 
                    left join (select ccdd,  count(*) as t  from pescador a inner join pesc_seccion7 s on a.id = s.pescador_id  where S7_5_9_c = 19 group by nom_dd ) as C9 on DEP.ccdd  = C9.ccdd 
                    left join (select ccdd,  count(*) as t  from pescador a inner join pesc_seccion7 s on a.id = s.pescador_id  where S7_5_10_c = 19 group by nom_dd ) as C10 on DEP.ccdd  = C10.ccdd ) as table9
                    on table1.ccdd = table9.ccdd 
                    INNER JOIN
                    (select 
                    DEP.CCDD, DEPARTAMENTO, ( COALESCE(C1.t,0) + COALESCE(C2.t,0) + COALESCE(C3.t,0) +  COALESCE(C4.t,0) +  COALESCE(C5.t,0) +  
                    COALESCE(C6.t,0) + COALESCE(C7.t,0) + COALESCE(C8.t,0) +  COALESCE(C9.t,0)  + COALESCE(C10.t,0)  ) AS Palometa
                    from (select  distinct(departamento), ccdd from departamentos_tab order by departamento) as DEP 
                    left join (select ccdd,  count(*) as t  from pescador a inner join pesc_seccion7 s on a.id = s.pescador_id  where S7_5_1_c = 27 group by nom_dd ) as C1 on DEP.ccdd  = C1.ccdd 
                    left join (select ccdd,  count(*) as t  from pescador a inner join pesc_seccion7 s on a.id = s.pescador_id  where S7_5_2_c = 27 group by nom_dd ) as C2 on DEP.ccdd  = C2.ccdd 
                    left join (select ccdd,  count(*) as t  from pescador a inner join pesc_seccion7 s on a.id = s.pescador_id  where S7_5_3_c = 27 group by nom_dd ) as C3 on DEP.ccdd  = C3.ccdd 
                    left join (select ccdd,  count(*) as t  from pescador a inner join pesc_seccion7 s on a.id = s.pescador_id  where S7_5_4_c = 27 group by nom_dd ) as C4 on DEP.ccdd  = C4.ccdd 
                    left join (select ccdd,  count(*) as t  from pescador a inner join pesc_seccion7 s on a.id = s.pescador_id  where S7_5_5_c = 27 group by nom_dd ) as C5 on DEP.ccdd  = C5.ccdd 
                    left join (select ccdd,  count(*) as t  from pescador a inner join pesc_seccion7 s on a.id = s.pescador_id  where S7_5_6_c = 27 group by nom_dd ) as C6 on DEP.ccdd  = C6.ccdd 
                    left join (select ccdd,  count(*) as t  from pescador a inner join pesc_seccion7 s on a.id = s.pescador_id  where S7_5_7_c = 27 group by nom_dd ) as C7 on DEP.ccdd  = C7.ccdd 
                    left join (select ccdd,  count(*) as t  from pescador a inner join pesc_seccion7 s on a.id = s.pescador_id  where S7_5_8_c = 27 group by nom_dd ) as C8 on DEP.ccdd  = C8.ccdd 
                    left join (select ccdd,  count(*) as t  from pescador a inner join pesc_seccion7 s on a.id = s.pescador_id  where S7_5_9_c = 27 group by nom_dd ) as C9 on DEP.ccdd  = C9.ccdd 
                    left join (select ccdd,  count(*) as t  from pescador a inner join pesc_seccion7 s on a.id = s.pescador_id  where S7_5_10_c = 27 group by nom_dd ) as C10 on DEP.ccdd  = C10.ccdd ) as table10
                    on table1.ccdd = table10.ccdd 
                    INNER JOIN
                    (select 
                    DEP.CCDD, DEPARTAMENTO, ( COALESCE(C1.t,0) + COALESCE(C2.t,0) + COALESCE(C3.t,0) +  COALESCE(C4.t,0) +  COALESCE(C5.t,0) +  
                    COALESCE(C6.t,0) + COALESCE(C7.t,0) + COALESCE(C8.t,0) +  COALESCE(C9.t,0)  + COALESCE(C10.t,0)  ) AS Pejerrey
                    from (select  distinct(departamento), ccdd from departamentos_tab order by departamento) as DEP 
                    left join (select ccdd,  count(*) as t  from pescador a inner join pesc_seccion7 s on a.id = s.pescador_id  where S7_5_1_c = 29 group by nom_dd ) as C1 on DEP.ccdd  = C1.ccdd 
                    left join (select ccdd,  count(*) as t  from pescador a inner join pesc_seccion7 s on a.id = s.pescador_id  where S7_5_2_c = 29 group by nom_dd ) as C2 on DEP.ccdd  = C2.ccdd 
                    left join (select ccdd,  count(*) as t  from pescador a inner join pesc_seccion7 s on a.id = s.pescador_id  where S7_5_3_c = 29 group by nom_dd ) as C3 on DEP.ccdd  = C3.ccdd 
                    left join (select ccdd,  count(*) as t  from pescador a inner join pesc_seccion7 s on a.id = s.pescador_id  where S7_5_4_c = 29 group by nom_dd ) as C4 on DEP.ccdd  = C4.ccdd 
                    left join (select ccdd,  count(*) as t  from pescador a inner join pesc_seccion7 s on a.id = s.pescador_id  where S7_5_5_c = 29 group by nom_dd ) as C5 on DEP.ccdd  = C5.ccdd 
                    left join (select ccdd,  count(*) as t  from pescador a inner join pesc_seccion7 s on a.id = s.pescador_id  where S7_5_6_c = 29 group by nom_dd ) as C6 on DEP.ccdd  = C6.ccdd 
                    left join (select ccdd,  count(*) as t  from pescador a inner join pesc_seccion7 s on a.id = s.pescador_id  where S7_5_7_c = 29 group by nom_dd ) as C7 on DEP.ccdd  = C7.ccdd 
                    left join (select ccdd,  count(*) as t  from pescador a inner join pesc_seccion7 s on a.id = s.pescador_id  where S7_5_8_c = 29 group by nom_dd ) as C8 on DEP.ccdd  = C8.ccdd 
                    left join (select ccdd,  count(*) as t  from pescador a inner join pesc_seccion7 s on a.id = s.pescador_id  where S7_5_9_c = 29 group by nom_dd ) as C9 on DEP.ccdd  = C9.ccdd 
                    left join (select ccdd,  count(*) as t  from pescador a inner join pesc_seccion7 s on a.id = s.pescador_id  where S7_5_10_c = 29 group by nom_dd ) as C10 on DEP.ccdd  = C10.ccdd ) as table11
                    on table1.ccdd = table11.ccdd 
                    INNER JOIN
                    (select 
                    DEP.CCDD, DEPARTAMENTO, ( COALESCE(C1.t,0) + COALESCE(C2.t,0) + COALESCE(C3.t,0) +  COALESCE(C4.t,0) +  COALESCE(C5.t,0) +  
                    COALESCE(C6.t,0) + COALESCE(C7.t,0) + COALESCE(C8.t,0) +  COALESCE(C9.t,0)  + COALESCE(C10.t,0)  ) AS Sabalo
                    from (select  distinct(departamento), ccdd from departamentos_tab order by departamento) as DEP 
                    left join (select ccdd,  count(*) as t  from pescador a inner join pesc_seccion7 s on a.id = s.pescador_id  where S7_5_1_c = 31 group by nom_dd ) as C1 on DEP.ccdd  = C1.ccdd 
                    left join (select ccdd,  count(*) as t  from pescador a inner join pesc_seccion7 s on a.id = s.pescador_id  where S7_5_2_c = 31 group by nom_dd ) as C2 on DEP.ccdd  = C2.ccdd 
                    left join (select ccdd,  count(*) as t  from pescador a inner join pesc_seccion7 s on a.id = s.pescador_id  where S7_5_3_c = 31 group by nom_dd ) as C3 on DEP.ccdd  = C3.ccdd 
                    left join (select ccdd,  count(*) as t  from pescador a inner join pesc_seccion7 s on a.id = s.pescador_id  where S7_5_4_c = 31 group by nom_dd ) as C4 on DEP.ccdd  = C4.ccdd 
                    left join (select ccdd,  count(*) as t  from pescador a inner join pesc_seccion7 s on a.id = s.pescador_id  where S7_5_5_c = 31 group by nom_dd ) as C5 on DEP.ccdd  = C5.ccdd 
                    left join (select ccdd,  count(*) as t  from pescador a inner join pesc_seccion7 s on a.id = s.pescador_id  where S7_5_6_c = 31 group by nom_dd ) as C6 on DEP.ccdd  = C6.ccdd 
                    left join (select ccdd,  count(*) as t  from pescador a inner join pesc_seccion7 s on a.id = s.pescador_id  where S7_5_7_c = 31 group by nom_dd ) as C7 on DEP.ccdd  = C7.ccdd 
                    left join (select ccdd,  count(*) as t  from pescador a inner join pesc_seccion7 s on a.id = s.pescador_id  where S7_5_8_c = 31 group by nom_dd ) as C8 on DEP.ccdd  = C8.ccdd 
                    left join (select ccdd,  count(*) as t  from pescador a inner join pesc_seccion7 s on a.id = s.pescador_id  where S7_5_9_c = 31 group by nom_dd ) as C9 on DEP.ccdd  = C9.ccdd 
                    left join (select ccdd,  count(*) as t  from pescador a inner join pesc_seccion7 s on a.id = s.pescador_id  where S7_5_10_c = 31 group by nom_dd ) as C10 on DEP.ccdd  = C10.ccdd ) as table12
                    on table1.ccdd = table12.ccdd 
                    INNER JOIN
                    (select 
                    DEP.CCDD, DEPARTAMENTO, ( COALESCE(C1.t,0) + COALESCE(C2.t,0) + COALESCE(C3.t,0) +  COALESCE(C4.t,0) +  COALESCE(C5.t,0) +  
                    COALESCE(C6.t,0) + COALESCE(C7.t,0) + COALESCE(C8.t,0) +  COALESCE(C9.t,0)  + COALESCE(C10.t,0)  ) AS Tilapia
                    from (select  distinct(departamento), ccdd from departamentos_tab order by departamento) as DEP 
                    left join (select ccdd,  count(*) as t  from pescador a inner join pesc_seccion7 s on a.id = s.pescador_id  where S7_5_1_c = 35 group by nom_dd ) as C1 on DEP.ccdd  = C1.ccdd 
                    left join (select ccdd,  count(*) as t  from pescador a inner join pesc_seccion7 s on a.id = s.pescador_id  where S7_5_2_c = 35 group by nom_dd ) as C2 on DEP.ccdd  = C2.ccdd 
                    left join (select ccdd,  count(*) as t  from pescador a inner join pesc_seccion7 s on a.id = s.pescador_id  where S7_5_3_c = 35 group by nom_dd ) as C3 on DEP.ccdd  = C3.ccdd 
                    left join (select ccdd,  count(*) as t  from pescador a inner join pesc_seccion7 s on a.id = s.pescador_id  where S7_5_4_c = 35 group by nom_dd ) as C4 on DEP.ccdd  = C4.ccdd 
                    left join (select ccdd,  count(*) as t  from pescador a inner join pesc_seccion7 s on a.id = s.pescador_id  where S7_5_5_c = 35 group by nom_dd ) as C5 on DEP.ccdd  = C5.ccdd 
                    left join (select ccdd,  count(*) as t  from pescador a inner join pesc_seccion7 s on a.id = s.pescador_id  where S7_5_6_c = 35 group by nom_dd ) as C6 on DEP.ccdd  = C6.ccdd 
                    left join (select ccdd,  count(*) as t  from pescador a inner join pesc_seccion7 s on a.id = s.pescador_id  where S7_5_7_c = 35 group by nom_dd ) as C7 on DEP.ccdd  = C7.ccdd 
                    left join (select ccdd,  count(*) as t  from pescador a inner join pesc_seccion7 s on a.id = s.pescador_id  where S7_5_8_c = 35 group by nom_dd ) as C8 on DEP.ccdd  = C8.ccdd 
                    left join (select ccdd,  count(*) as t  from pescador a inner join pesc_seccion7 s on a.id = s.pescador_id  where S7_5_9_c = 35 group by nom_dd ) as C9 on DEP.ccdd  = C9.ccdd 
                    left join (select ccdd,  count(*) as t  from pescador a inner join pesc_seccion7 s on a.id = s.pescador_id  where S7_5_10_c = 35 group by nom_dd ) as C10 on DEP.ccdd  = C10.ccdd ) as table13
                    on table1.ccdd = table13.ccdd 
                    INNER JOIN
                    (select 
                    DEP.CCDD, DEPARTAMENTO, ( COALESCE(C1.t,0) + COALESCE(C2.t,0) + COALESCE(C3.t,0) +  COALESCE(C4.t,0) +  COALESCE(C5.t,0) +  
                    COALESCE(C6.t,0) + COALESCE(C7.t,0) + COALESCE(C8.t,0) +  COALESCE(C9.t,0)  + COALESCE(C10.t,0)  ) AS Trucha
                    from (select  distinct(departamento), ccdd from departamentos_tab order by departamento) as DEP 
                    left join (select ccdd,  count(*) as t  from pescador a inner join pesc_seccion7 s on a.id = s.pescador_id  where S7_5_1_c = 36 group by nom_dd ) as C1 on DEP.ccdd  = C1.ccdd 
                    left join (select ccdd,  count(*) as t  from pescador a inner join pesc_seccion7 s on a.id = s.pescador_id  where S7_5_2_c = 36 group by nom_dd ) as C2 on DEP.ccdd  = C2.ccdd 
                    left join (select ccdd,  count(*) as t  from pescador a inner join pesc_seccion7 s on a.id = s.pescador_id  where S7_5_3_c = 36 group by nom_dd ) as C3 on DEP.ccdd  = C3.ccdd 
                    left join (select ccdd,  count(*) as t  from pescador a inner join pesc_seccion7 s on a.id = s.pescador_id  where S7_5_4_c = 36 group by nom_dd ) as C4 on DEP.ccdd  = C4.ccdd 
                    left join (select ccdd,  count(*) as t  from pescador a inner join pesc_seccion7 s on a.id = s.pescador_id  where S7_5_5_c = 36 group by nom_dd ) as C5 on DEP.ccdd  = C5.ccdd 
                    left join (select ccdd,  count(*) as t  from pescador a inner join pesc_seccion7 s on a.id = s.pescador_id  where S7_5_6_c = 36 group by nom_dd ) as C6 on DEP.ccdd  = C6.ccdd 
                    left join (select ccdd,  count(*) as t  from pescador a inner join pesc_seccion7 s on a.id = s.pescador_id  where S7_5_7_c = 36 group by nom_dd ) as C7 on DEP.ccdd  = C7.ccdd 
                    left join (select ccdd,  count(*) as t  from pescador a inner join pesc_seccion7 s on a.id = s.pescador_id  where S7_5_8_c = 36 group by nom_dd ) as C8 on DEP.ccdd  = C8.ccdd 
                    left join (select ccdd,  count(*) as t  from pescador a inner join pesc_seccion7 s on a.id = s.pescador_id  where S7_5_9_c = 36 group by nom_dd ) as C9 on DEP.ccdd  = C9.ccdd 
                    left join (select ccdd,  count(*) as t  from pescador a inner join pesc_seccion7 s on a.id = s.pescador_id  where S7_5_10_c = 36 group by nom_dd ) as C10 on DEP.ccdd  = C10.ccdd ) as table14
                    on table1.ccdd = table14.ccdd 
                    INNER JOIN
                    (select 
                    DEP.CCDD, DEPARTAMENTO, ( COALESCE(C1.t,0) + COALESCE(C2.t,0) + COALESCE(C3.t,0) +  COALESCE(C4.t,0) +  COALESCE(C5.t,0) +  
                    COALESCE(C6.t,0) + COALESCE(C7.t,0) + COALESCE(C8.t,0) +  COALESCE(C9.t,0)  + COALESCE(C10.t,0)  ) AS Zungaro
                    from (select  distinct(departamento), ccdd from departamentos_tab order by departamento) as DEP 
                    left join (select ccdd,  count(*) as t  from pescador a inner join pesc_seccion7 s on a.id = s.pescador_id  where S7_5_1_c = 40 group by nom_dd ) as C1 on DEP.ccdd  = C1.ccdd 
                    left join (select ccdd,  count(*) as t  from pescador a inner join pesc_seccion7 s on a.id = s.pescador_id  where S7_5_2_c = 40 group by nom_dd ) as C2 on DEP.ccdd  = C2.ccdd 
                    left join (select ccdd,  count(*) as t  from pescador a inner join pesc_seccion7 s on a.id = s.pescador_id  where S7_5_3_c = 40 group by nom_dd ) as C3 on DEP.ccdd  = C3.ccdd 
                    left join (select ccdd,  count(*) as t  from pescador a inner join pesc_seccion7 s on a.id = s.pescador_id  where S7_5_4_c = 40 group by nom_dd ) as C4 on DEP.ccdd  = C4.ccdd 
                    left join (select ccdd,  count(*) as t  from pescador a inner join pesc_seccion7 s on a.id = s.pescador_id  where S7_5_5_c = 40 group by nom_dd ) as C5 on DEP.ccdd  = C5.ccdd 
                    left join (select ccdd,  count(*) as t  from pescador a inner join pesc_seccion7 s on a.id = s.pescador_id  where S7_5_6_c = 40 group by nom_dd ) as C6 on DEP.ccdd  = C6.ccdd 
                    left join (select ccdd,  count(*) as t  from pescador a inner join pesc_seccion7 s on a.id = s.pescador_id  where S7_5_7_c = 40 group by nom_dd ) as C7 on DEP.ccdd  = C7.ccdd 
                    left join (select ccdd,  count(*) as t  from pescador a inner join pesc_seccion7 s on a.id = s.pescador_id  where S7_5_8_c = 40 group by nom_dd ) as C8 on DEP.ccdd  = C8.ccdd 
                    left join (select ccdd,  count(*) as t  from pescador a inner join pesc_seccion7 s on a.id = s.pescador_id  where S7_5_9_c = 40 group by nom_dd ) as C9 on DEP.ccdd  = C9.ccdd 
                    left join (select ccdd,  count(*) as t  from pescador a inner join pesc_seccion7 s on a.id = s.pescador_id  where S7_5_10_c = 40 group by nom_dd ) as C10 on DEP.ccdd  = C10.ccdd ) as table15
                    on table1.ccdd = table15.ccdd;
        ");
    return $q;
}

function get_report71(){
    $q = $this->db->query("
        /* TABULADO N° 69 -------------------------- GANANCIA PROMEDIO   -------------------------*/
        select 
        DEP.CCDD, DEPARTAMENTO,  COALESCE(C0.t ,0) AS TOTAL, 
        COALESCE(C1.t,0) as 'HASTA_500', COALESCE(C2.t,0) as '501_1000', COALESCE(C3.t,0) as '1001_2000', COALESCE(C4.t,0) as '2001_3000', COALESCE(C5.t,0) as 'MAS_3000',
        COALESCE(C6.t,0) as  NEP
        from (select  distinct(departamento), ccdd from departamentos_tab order by departamento) as DEP 
        left join (select ccdd,  count(*) as t  from pescador a inner join pesc_seccion7 s on a.id = s.pescador_id  where S7_6_1 is not null group by nom_dd ) as C0 on DEP.ccdd  = C0.ccdd 
        left join (select ccdd,  count(*) as t  from pescador a inner join pesc_seccion7 s on a.id = s.pescador_id  where S7_6_1 = 1 group by nom_dd ) as C1 on DEP.ccdd  = C1.ccdd 
        left join (select ccdd,  count(*) as t  from pescador a inner join pesc_seccion7 s on a.id = s.pescador_id  where S7_6_1 = 2 group by nom_dd ) as C2 on DEP.ccdd  = C2.ccdd 
        left join (select ccdd,  count(*) as t  from pescador a inner join pesc_seccion7 s on a.id = s.pescador_id  where S7_6_1 = 3 group by nom_dd ) as C3 on DEP.ccdd  = C3.ccdd 
        left join (select ccdd,  count(*) as t  from pescador a inner join pesc_seccion7 s on a.id = s.pescador_id  where S7_6_1 = 4 group by nom_dd ) as C4 on DEP.ccdd  = C4.ccdd 
        left join (select ccdd,  count(*) as t  from pescador a inner join pesc_seccion7 s on a.id = s.pescador_id  where S7_6_1 = 5 group by nom_dd ) as C5 on DEP.ccdd  = C5.ccdd 
        left join (select ccdd,  count(*) as t  from pescador a inner join pesc_seccion7 s on a.id = s.pescador_id  where S7_6_1 = 9 group by nom_dd ) as C6 on DEP.ccdd  = C6.ccdd  ;
        ");
    return $q;
}



function get_report72(){
    $q = $this->db->query("
        /* TABULADO N° 70 -------------------------- DONDE VENDIO  -------------------------*/
        select 
        DEP.CCDD, DEPARTAMENTO,  COALESCE(C0.t ,0) AS TOTAL,
        COALESCE(C1.t,0) as DESEMBARQUE, COALESCE(C2.t,0) as FERIA, COALESCE(C3.t,0) as MERCADO, COALESCE(C4.t,0)  as  VIVIENDA, COALESCE(C5.t,0)  as  NEP
        from (select  distinct(departamento), ccdd from departamentos_tab order by departamento) as DEP 
        left join (select ccdd,  count(*) as t  from pescador a inner join pesc_seccion7 s on a.id = s.pescador_id  where S7_7_1 is not null group by nom_dd ) as C0 on DEP.ccdd  = C0.ccdd 
        left join (select ccdd,  count(*) as t  from pescador a inner join pesc_seccion7 s on a.id = s.pescador_id  where S7_7_1 = 1 group by nom_dd ) as C1 on DEP.ccdd  = C1.ccdd 
        left join (select ccdd,  count(*) as t  from pescador a inner join pesc_seccion7 s on a.id = s.pescador_id  where S7_7_2 = 1 group by nom_dd ) as C2 on DEP.ccdd  = C2.ccdd 
        left join (select ccdd,  count(*) as t  from pescador a inner join pesc_seccion7 s on a.id = s.pescador_id  where S7_7_3 = 1 group by nom_dd ) as C3 on DEP.ccdd  = C3.ccdd 
        left join (select ccdd,  count(*) as t  from pescador a inner join pesc_seccion7 s on a.id = s.pescador_id  where S7_7_4 = 1 group by nom_dd ) as C4 on DEP.ccdd  = C4.ccdd
        left join (select ccdd,  count(*) as t  from pescador a inner join pesc_seccion7 s on a.id = s.pescador_id  where S7_7_4 = 9 group by nom_dd ) as C5 on DEP.ccdd  = C5.ccdd;
        ");
    return $q;
}

function get_report73(){
    $q = $this->db->query("
        /* TABULADO N° 71 ----------------QUIEN VENDIO ------------------------*/
        select 
        DEP.CCDD, DEPARTAMENTO,  COALESCE(C0.t ,0) AS TOTAL,  
        COALESCE(C1.t,0) as PUBLICO, COALESCE(C2.t,0) as MINORISTA, COALESCE(C3.t,0) as MAYORISTA, COALESCE(C4.t,0) as NACIONAL, COALESCE(C5.t,0) as EXTRANJERO,
        COALESCE(C6.t,0) as HOTELES, COALESCE(C7.t,0) as  NEP
        from (select  distinct(departamento), ccdd from departamentos_tab order by departamento) as DEP 
        left join (select ccdd,  count(*) as t  from pescador a inner join pesc_seccion7 s on a.id = s.pescador_id  where S7_8_1 is not null group by nom_dd ) as C0 on DEP.ccdd  = C0.ccdd 
        left join (select ccdd,  count(*) as t  from pescador a inner join pesc_seccion7 s on a.id = s.pescador_id  where S7_8_1 = 1 group by nom_dd ) as C1 on DEP.ccdd  = C1.ccdd 
        left join (select ccdd,  count(*) as t  from pescador a inner join pesc_seccion7 s on a.id = s.pescador_id  where S7_8_2 = 1 group by nom_dd ) as C2 on DEP.ccdd  = C2.ccdd 
        left join (select ccdd,  count(*) as t  from pescador a inner join pesc_seccion7 s on a.id = s.pescador_id  where S7_8_3 = 1 group by nom_dd ) as C3 on DEP.ccdd  = C3.ccdd 
        left join (select ccdd,  count(*) as t  from pescador a inner join pesc_seccion7 s on a.id = s.pescador_id  where S7_8_4 = 1 group by nom_dd ) as C4 on DEP.ccdd  = C4.ccdd 
        left join (select ccdd,  count(*) as t  from pescador a inner join pesc_seccion7 s on a.id = s.pescador_id  where S7_8_5 = 1 group by nom_dd ) as C5 on DEP.ccdd  = C5.ccdd 
        left join (select ccdd,  count(*) as t  from pescador a inner join pesc_seccion7 s on a.id = s.pescador_id  where S7_8_6 = 1 group by nom_dd ) as C6 on DEP.ccdd  = C6.ccdd 
        left join (select ccdd,  count(*) as t  from pescador a inner join pesc_seccion7 s on a.id = s.pescador_id  where S7_8_6 = 9 group by nom_dd ) as C7 on DEP.ccdd  = C7.ccdd ;
        ");
    return $q;
}

function get_report74(){
    $q = $this->db->query("
        /* TABULADO N° 72 ----------------COMO VENDIO  ------------------------*/
        select 
        DEP.CCDD, DEPARTAMENTO,  COALESCE(C0.t ,0) AS TOTAL,  
        COALESCE(C1.t,0) as INDIVIDUAL, COALESCE(C2.t,0) as ASOCIACION, COALESCE(C3.t,0) as ORGANIZACION, COALESCE(C4.t,0) as COMITE, COALESCE(C5.t,0)  as  NEP
        from (select  distinct(departamento), ccdd from departamentos_tab order by departamento) as DEP 
        left join (select ccdd,  count(*) as t  from pescador a inner join pesc_seccion7 s on a.id = s.pescador_id  where S7_9_1 is not null group by nom_dd ) as C0 on DEP.ccdd  = C0.ccdd 
        left join (select ccdd,  count(*) as t  from pescador a inner join pesc_seccion7 s on a.id = s.pescador_id  where S7_9_1 = 1 group by nom_dd ) as C1 on DEP.ccdd  = C1.ccdd 
        left join (select ccdd,  count(*) as t  from pescador a inner join pesc_seccion7 s on a.id = s.pescador_id  where S7_9_2 = 1 group by nom_dd ) as C2 on DEP.ccdd  = C2.ccdd 
        left join (select ccdd,  count(*) as t  from pescador a inner join pesc_seccion7 s on a.id = s.pescador_id  where S7_9_3 = 1 group by nom_dd ) as C3 on DEP.ccdd  = C3.ccdd 
        left join (select ccdd,  count(*) as t  from pescador a inner join pesc_seccion7 s on a.id = s.pescador_id  where S7_9_4 = 1 group by nom_dd ) as C4 on DEP.ccdd  = C4.ccdd 
        left join (select ccdd,  count(*) as t  from pescador a inner join pesc_seccion7 s on a.id = s.pescador_id  where S7_9_4 = 9 group by nom_dd ) as C5 on DEP.ccdd  = C5.ccdd ;
        ");
    return $q;
}


function get_report75(){
    $q = $this->db->query("
        /* TABULADO N° 73 ---------------- PRESENTACION   ------------------------*/
        select 
        DEP.CCDD, DEPARTAMENTO,  COALESCE(C0.t ,0) AS TOTAL,  
        COALESCE(C1.t,0) as FRESCO, COALESCE(C2.t,0) as SALPRESO, COALESCE(C3.t,0) as SECO, COALESCE(C4.t,0) as OTRO, COALESCE(C5.t,0)  as  NEP
        from (select  distinct(departamento), ccdd from departamentos_tab order by departamento) as DEP 
        left join (select ccdd,  count(*) as t  from pescador a inner join pesc_seccion7 s on a.id = s.pescador_id  where S7_10_1 is not null group by nom_dd ) as C0 on DEP.ccdd  = C0.ccdd 
        left join (select ccdd,  count(*) as t  from pescador a inner join pesc_seccion7 s on a.id = s.pescador_id  where S7_10_1 = 1 group by nom_dd ) as C1 on DEP.ccdd  = C1.ccdd 
        left join (select ccdd,  count(*) as t  from pescador a inner join pesc_seccion7 s on a.id = s.pescador_id  where S7_10_2 = 1 group by nom_dd ) as C2 on DEP.ccdd  = C2.ccdd 
        left join (select ccdd,  count(*) as t  from pescador a inner join pesc_seccion7 s on a.id = s.pescador_id  where S7_10_3 = 1 group by nom_dd ) as C3 on DEP.ccdd  = C3.ccdd 
        left join (select ccdd,  count(*) as t  from pescador a inner join pesc_seccion7 s on a.id = s.pescador_id  where S7_10_4 = 1 group by nom_dd ) as C4 on DEP.ccdd  = C4.ccdd 
        left join (select ccdd,  count(*) as t  from pescador a inner join pesc_seccion7 s on a.id = s.pescador_id  where S7_10_4 = 1 group by nom_dd ) as C5 on DEP.ccdd  = C5.ccdd ;
        ");
    return $q;
}

function get_report76(){
    $q = $this->db->query("
        /* TABULADO N° 74  -------------------------- CONOCE TEMAS : -------------------------*/
        select 
        DEP.CCDD, DEPARTAMENTO,  COALESCE(C0.t ,0) AS TOTAL, 
        COALESCE(C1.t,0) as PESCA, COALESCE(C2.t,0) as NORMATIVIDAD, COALESCE(C3.t,0) as SANITARIAS, COALESCE(C4.t,0) as TECNOLOGIA, COALESCE(C5.t,0) as AMBIENTAL,
        COALESCE(C6.t,0) as FORMALIZACION, COALESCE(C7.t,0) as COMERCIALIZACION, COALESCE(C8.t,0) as GESTION, COALESCE(C9.t,0) NO_CONOCE, COALESCE(C10.t,0)  NEP
        from (select  distinct(departamento), ccdd from departamentos_tab order by departamento) as DEP 
        left join (select ccdd,  count(*) as t  from pescador a inner join pesc_seccion8 s on a.id = s.pescador_id  where S8_1_1 is not null group by nom_dd ) as C0 on DEP.ccdd  = C0.ccdd 
        left join (select ccdd,  count(*) as t  from pescador a inner join pesc_seccion8 s on a.id = s.pescador_id  where S8_1_1 = 1 group by nom_dd ) as C1 on DEP.ccdd  = C1.ccdd 
        left join (select ccdd,  count(*) as t  from pescador a inner join pesc_seccion8 s on a.id = s.pescador_id  where S8_1_2 = 1 group by nom_dd ) as C2 on DEP.ccdd  = C2.ccdd 
        left join (select ccdd,  count(*) as t  from pescador a inner join pesc_seccion8 s on a.id = s.pescador_id  where S8_1_3 = 1 group by nom_dd ) as C3 on DEP.ccdd  = C3.ccdd 
        left join (select ccdd,  count(*) as t  from pescador a inner join pesc_seccion8 s on a.id = s.pescador_id  where S8_1_4 = 1 group by nom_dd ) as C4 on DEP.ccdd  = C4.ccdd 
        left join (select ccdd,  count(*) as t  from pescador a inner join pesc_seccion8 s on a.id = s.pescador_id  where S8_1_5 = 1 group by nom_dd ) as C5 on DEP.ccdd  = C5.ccdd 
        left join (select ccdd,  count(*) as t  from pescador a inner join pesc_seccion8 s on a.id = s.pescador_id  where S8_1_6 = 1 group by nom_dd ) as C6 on DEP.ccdd  = C6.ccdd 
        left join (select ccdd,  count(*) as t  from pescador a inner join pesc_seccion8 s on a.id = s.pescador_id  where S8_1_7 = 1 group by nom_dd ) as C7 on DEP.ccdd  = C7.ccdd 
        left join (select ccdd,  count(*) as t  from pescador a inner join pesc_seccion8 s on a.id = s.pescador_id  where S8_1_8 = 1 group by nom_dd ) as C8 on DEP.ccdd  = C8.ccdd 
        left join (select ccdd,  count(*) as t  from pescador a inner join pesc_seccion8 s on a.id = s.pescador_id  where S8_1_9 = 1 group by nom_dd ) as C9 on DEP.ccdd  = C9.ccdd 
        left join (select ccdd,  count(*) as t  from pescador a inner join pesc_seccion8 s on a.id = s.pescador_id  where S8_1_9 = 9 group by nom_dd ) as C10 on DEP.ccdd  = C10.ccdd ;
        ");
    return $q;
}

function get_report77(){
    $q = $this->db->query("
        /* TABULADO N° 75  -------------------------- RECIBIO CAPACITACION  -------------------------*/
        select 
        DEP.CCDD, DEPARTAMENTO,  COALESCE(C0.t ,0) AS TOTAL,  
        COALESCE(C1.t,0) as SI, COALESCE(C2.t,0) as 'NO',  COALESCE(C3.t,0) NEP
        from (select  distinct(departamento), ccdd from departamentos_tab order by departamento) as DEP 
        left join (select ccdd,  count(*) as t  from pescador a inner join pesc_seccion8 s on a.id = s.pescador_id  where S8_2  is not null group by  nom_dd ) as C0 on DEP.ccdd  = C0.ccdd 
        left join (select ccdd,  count(*) as t  from pescador a inner join pesc_seccion8 s on a.id = s.pescador_id  where S8_2 = 1 group by nom_dd ) as C1 on DEP.ccdd  = C1.ccdd 
        left join (select ccdd,  count(*) as t  from pescador a inner join pesc_seccion8 s on a.id = s.pescador_id  where S8_2 = 2 group by nom_dd ) as C2 on DEP.ccdd  = C2.ccdd 
        left join (select ccdd,  count(*) as t  from pescador a inner join pesc_seccion8 s on a.id = s.pescador_id  where S8_2 = 9 group by nom_dd ) as C3 on DEP.ccdd  = C3.ccdd ;
        ");
    return $q;
}

function get_report78(){
    $q = $this->db->query("
        /* TABULADO N° 76  -------------------------- QUIEN BRINDO CAPACITACION -------------------------*/
        select 
        DEP.CCDD, DEPARTAMENTO,  COALESCE(C0.t ,0) AS TOTAL, 
        COALESCE(C1.t,0) as PRODUCE, COALESCE(C2.t,0) as FONDEPES, COALESCE(C3.t,0) as IIAP, COALESCE(C4.t,0) as MINAM, COALESCE(C5.t,0) as SANIPES,
        COALESCE(C6.t,0) as IMARPE, COALESCE(C7.t,0) as DIREPRO, COALESCE(C8.t,0) as GB, COALESCE(C9.t,0) ONG, COALESCE(C10.t,0) OTRO, 
        COALESCE(C11.t,0) NEP
        from (select  distinct(departamento), ccdd from departamentos_tab order by departamento) as DEP 
        left join (select ccdd,  count(*) as t  from pescador a inner join pesc_seccion8 s on a.id = s.pescador_id  where S8_3_1 is not null group by nom_dd ) as C0 on DEP.ccdd  = C0.ccdd 
        left join (select ccdd,  count(*) as t  from pescador a inner join pesc_seccion8 s on a.id = s.pescador_id  where S8_3_1 = 1 group by nom_dd ) as C1 on DEP.ccdd  = C1.ccdd 
        left join (select ccdd,  count(*) as t  from pescador a inner join pesc_seccion8 s on a.id = s.pescador_id  where S8_3_2 = 1 group by nom_dd ) as C2 on DEP.ccdd  = C2.ccdd 
        left join (select ccdd,  count(*) as t  from pescador a inner join pesc_seccion8 s on a.id = s.pescador_id  where S8_3_3 = 1 group by nom_dd ) as C3 on DEP.ccdd  = C3.ccdd 
        left join (select ccdd,  count(*) as t  from pescador a inner join pesc_seccion8 s on a.id = s.pescador_id  where S8_3_4 = 1 group by nom_dd ) as C4 on DEP.ccdd  = C4.ccdd 
        left join (select ccdd,  count(*) as t  from pescador a inner join pesc_seccion8 s on a.id = s.pescador_id  where S8_3_5 = 1 group by nom_dd ) as C5 on DEP.ccdd  = C5.ccdd 
        left join (select ccdd,  count(*) as t  from pescador a inner join pesc_seccion8 s on a.id = s.pescador_id  where S8_3_6 = 1 group by nom_dd ) as C6 on DEP.ccdd  = C6.ccdd 
        left join (select ccdd,  count(*) as t  from pescador a inner join pesc_seccion8 s on a.id = s.pescador_id  where S8_3_7 = 1 group by nom_dd ) as C7 on DEP.ccdd  = C7.ccdd 
        left join (select ccdd,  count(*) as t  from pescador a inner join pesc_seccion8 s on a.id = s.pescador_id  where S8_3_8 = 1 group by nom_dd ) as C8 on DEP.ccdd  = C8.ccdd 
        left join (select ccdd,  count(*) as t  from pescador a inner join pesc_seccion8 s on a.id = s.pescador_id  where S8_3_9 = 1 group by nom_dd ) as C9 on DEP.ccdd  = C9.ccdd 
        left join (select ccdd,  count(*) as t  from pescador a inner join pesc_seccion8 s on a.id = s.pescador_id  where S8_3_10 = 1 group by nom_dd ) as C10 on DEP.ccdd  = C10.ccdd 
        left join (select ccdd,  count(*) as t  from pescador a inner join pesc_seccion8 s on a.id = s.pescador_id  where S8_3_10 = 9 group by nom_dd ) as C11 on DEP.ccdd  = C11.ccdd ;
        ");
    return $q;
}

function get_report79(){
    $q = $this->db->query("
        /* TABULADO N° 77  -------------------------- CONOCE TEMAS : -------------------------*/
        select 
        DEP.CCDD, DEPARTAMENTO,  COALESCE(C0.t ,0) AS TOTAL, 
        COALESCE(C1.t,0) as PESCA, COALESCE(C2.t,0) as NORMATIVIDAD, COALESCE(C3.t,0) as SANITARIAS, COALESCE(C4.t,0) as TECNOLOGIA, COALESCE(C5.t,0) as AMBIENTAL,
        COALESCE(C6.t,0) as FORMALIZACION, COALESCE(C7.t,0) as COMERCIALIZACION, COALESCE(C8.t,0) as GESTION, COALESCE(C9.t,0) OTRO, COALESCE(C10.t,0)  NEP
        from (select  distinct(departamento), ccdd from departamentos_tab order by departamento) as DEP 
        left join (select ccdd,  count(*) as t  from pescador a inner join pesc_seccion8 s on a.id = s.pescador_id  where S8_4_1 is not null group by nom_dd ) as C0 on DEP.ccdd  = C0.ccdd 
        left join (select ccdd,  count(*) as t  from pescador a inner join pesc_seccion8 s on a.id = s.pescador_id  where S8_4_1 = 1 group by nom_dd ) as C1 on DEP.ccdd  = C1.ccdd 
        left join (select ccdd,  count(*) as t  from pescador a inner join pesc_seccion8 s on a.id = s.pescador_id  where S8_4_2 = 1 group by nom_dd ) as C2 on DEP.ccdd  = C2.ccdd 
        left join (select ccdd,  count(*) as t  from pescador a inner join pesc_seccion8 s on a.id = s.pescador_id  where S8_4_3 = 1 group by nom_dd ) as C3 on DEP.ccdd  = C3.ccdd 
        left join (select ccdd,  count(*) as t  from pescador a inner join pesc_seccion8 s on a.id = s.pescador_id  where S8_4_4 = 1 group by nom_dd ) as C4 on DEP.ccdd  = C4.ccdd 
        left join (select ccdd,  count(*) as t  from pescador a inner join pesc_seccion8 s on a.id = s.pescador_id  where S8_4_5 = 1 group by nom_dd ) as C5 on DEP.ccdd  = C5.ccdd 
        left join (select ccdd,  count(*) as t  from pescador a inner join pesc_seccion8 s on a.id = s.pescador_id  where S8_4_6 = 1 group by nom_dd ) as C6 on DEP.ccdd  = C6.ccdd 
        left join (select ccdd,  count(*) as t  from pescador a inner join pesc_seccion8 s on a.id = s.pescador_id  where S8_4_7 = 1 group by nom_dd ) as C7 on DEP.ccdd  = C7.ccdd 
        left join (select ccdd,  count(*) as t  from pescador a inner join pesc_seccion8 s on a.id = s.pescador_id  where S8_4_8 = 1 group by nom_dd ) as C8 on DEP.ccdd  = C8.ccdd 
        left join (select ccdd,  count(*) as t  from pescador a inner join pesc_seccion8 s on a.id = s.pescador_id  where S8_4_9 = 1 group by nom_dd ) as C9 on DEP.ccdd  = C9.ccdd 
        left join (select ccdd,  count(*) as t  from pescador a inner join pesc_seccion8 s on a.id = s.pescador_id  where S8_4_9 = 9 group by nom_dd ) as C10 on DEP.ccdd  = C10.ccdd ;
        ");
    return $q;
}

function get_report80(){
    $q = $this->db->query("
        /* TABULADO N° 78  -------------------------- CALIFICACION APOYO AL MINISTERIO  -------------------------*/
        select 
        DEP.CCDD, DEPARTAMENTO,  COALESCE(C0.t ,0) AS TOTAL, 
        COALESCE(C1.t,0) as MUY_BUENO, COALESCE(C2.t,0) as BUENO, COALESCE(C3.t,0) as REGULAR, COALESCE(C4.t,0) as MALO, COALESCE(C5.t,0) as MUY_MALO,
        COALESCE(C6.t,0) as NO_CONOCE, COALESCE(C7.t,0) as NEP
        from (select  distinct(departamento), ccdd from departamentos_tab order by departamento) as DEP 
        left join (select ccdd,  count(*) as t  from pescador a inner join pesc_seccion8 s on a.id = s.pescador_id  where S8_6_1 is not null group by nom_dd ) as C0 on DEP.ccdd  = C0.ccdd 
        left join (select ccdd,  count(*) as t  from pescador a inner join pesc_seccion8 s on a.id = s.pescador_id  where S8_6_1 = 1 group by nom_dd ) as C1 on DEP.ccdd  = C1.ccdd 
        left join (select ccdd,  count(*) as t  from pescador a inner join pesc_seccion8 s on a.id = s.pescador_id  where S8_6_1 = 2 group by nom_dd ) as C2 on DEP.ccdd  = C2.ccdd 
        left join (select ccdd,  count(*) as t  from pescador a inner join pesc_seccion8 s on a.id = s.pescador_id  where S8_6_1 = 3 group by nom_dd ) as C3 on DEP.ccdd  = C3.ccdd 
        left join (select ccdd,  count(*) as t  from pescador a inner join pesc_seccion8 s on a.id = s.pescador_id  where S8_6_1 = 4 group by nom_dd ) as C4 on DEP.ccdd  = C4.ccdd 
        left join (select ccdd,  count(*) as t  from pescador a inner join pesc_seccion8 s on a.id = s.pescador_id  where S8_6_1 = 5 group by nom_dd ) as C5 on DEP.ccdd  = C5.ccdd 
        left join (select ccdd,  count(*) as t  from pescador a inner join pesc_seccion8 s on a.id = s.pescador_id  where S8_6_1 = 6 group by nom_dd ) as C6 on DEP.ccdd  = C6.ccdd 
        left join (select ccdd,  count(*) as t  from pescador a inner join pesc_seccion8 s on a.id = s.pescador_id  where S8_6_1 = 9 group by nom_dd ) as C7 on DEP.ccdd  = C7.ccdd ;
        ");
    return $q;
}

function get_report81(){
    $q = $this->db->query("
        /* TABULADO N° 79  -------------------------- CALIFICACION APOYO AL FONDEPES  -------------------------*/
        select 
        DEP.CCDD, DEPARTAMENTO,  COALESCE(C0.t ,0) AS TOTAL, 
        COALESCE(C1.t,0) as MUY_BUENO, COALESCE(C2.t,0) as BUENO, COALESCE(C3.t,0) as REGULAR, COALESCE(C4.t,0) as MALO, COALESCE(C5.t,0) as MUY_MALO,
        COALESCE(C6.t,0) as NO_CONOCE, COALESCE(C7.t,0) as NEP
        from (select  distinct(departamento), ccdd from departamentos_tab order by departamento) as DEP 
        left join (select ccdd,  count(*) as t  from pescador a inner join pesc_seccion8 s on a.id = s.pescador_id  where S8_6_2 is not null group by nom_dd ) as C0 on DEP.ccdd  = C0.ccdd 
        left join (select ccdd,  count(*) as t  from pescador a inner join pesc_seccion8 s on a.id = s.pescador_id  where S8_6_2 = 1 group by nom_dd ) as C1 on DEP.ccdd  = C1.ccdd 
        left join (select ccdd,  count(*) as t  from pescador a inner join pesc_seccion8 s on a.id = s.pescador_id  where S8_6_2 = 2 group by nom_dd ) as C2 on DEP.ccdd  = C2.ccdd 
        left join (select ccdd,  count(*) as t  from pescador a inner join pesc_seccion8 s on a.id = s.pescador_id  where S8_6_2 = 3 group by nom_dd ) as C3 on DEP.ccdd  = C3.ccdd 
        left join (select ccdd,  count(*) as t  from pescador a inner join pesc_seccion8 s on a.id = s.pescador_id  where S8_6_2 = 4 group by nom_dd ) as C4 on DEP.ccdd  = C4.ccdd 
        left join (select ccdd,  count(*) as t  from pescador a inner join pesc_seccion8 s on a.id = s.pescador_id  where S8_6_2 = 5 group by nom_dd ) as C5 on DEP.ccdd  = C5.ccdd 
        left join (select ccdd,  count(*) as t  from pescador a inner join pesc_seccion8 s on a.id = s.pescador_id  where S8_6_2 = 6 group by nom_dd ) as C6 on DEP.ccdd  = C6.ccdd 
        left join (select ccdd,  count(*) as t  from pescador a inner join pesc_seccion8 s on a.id = s.pescador_id  where S8_6_2 = 9 group by nom_dd ) as C7 on DEP.ccdd  = C7.ccdd ;
        ");
    return $q;
}

function get_report82(){
    $q = $this->db->query("
        /* TABULADO N° 80  -------------------------- CALIFICACION APOYO AL ITP  -------------------------*/
        select 
        DEP.CCDD, DEPARTAMENTO,  COALESCE(C0.t ,0) AS TOTAL, 
        COALESCE(C1.t,0) as MUY_BUENO, COALESCE(C2.t,0) as BUENO, COALESCE(C3.t,0) as REGULAR, COALESCE(C4.t,0) as MALO, COALESCE(C5.t,0) as MUY_MALO,
        COALESCE(C6.t,0) as NO_CONOCE, COALESCE(C7.t,0) as NEP
        from (select  distinct(departamento), ccdd from departamentos_tab order by departamento) as DEP 
        left join (select ccdd,  count(*) as t  from pescador a inner join pesc_seccion8 s on a.id = s.pescador_id  where S8_6_3 is not null group by nom_dd ) as C0 on DEP.ccdd  = C0.ccdd 
        left join (select ccdd,  count(*) as t  from pescador a inner join pesc_seccion8 s on a.id = s.pescador_id  where S8_6_3 = 1 group by nom_dd ) as C1 on DEP.ccdd  = C1.ccdd 
        left join (select ccdd,  count(*) as t  from pescador a inner join pesc_seccion8 s on a.id = s.pescador_id  where S8_6_3 = 2 group by nom_dd ) as C2 on DEP.ccdd  = C2.ccdd 
        left join (select ccdd,  count(*) as t  from pescador a inner join pesc_seccion8 s on a.id = s.pescador_id  where S8_6_3 = 3 group by nom_dd ) as C3 on DEP.ccdd  = C3.ccdd 
        left join (select ccdd,  count(*) as t  from pescador a inner join pesc_seccion8 s on a.id = s.pescador_id  where S8_6_3 = 4 group by nom_dd ) as C4 on DEP.ccdd  = C4.ccdd 
        left join (select ccdd,  count(*) as t  from pescador a inner join pesc_seccion8 s on a.id = s.pescador_id  where S8_6_3 = 5 group by nom_dd ) as C5 on DEP.ccdd  = C5.ccdd 
        left join (select ccdd,  count(*) as t  from pescador a inner join pesc_seccion8 s on a.id = s.pescador_id  where S8_6_3 = 6 group by nom_dd ) as C6 on DEP.ccdd  = C6.ccdd 
        left join (select ccdd,  count(*) as t  from pescador a inner join pesc_seccion8 s on a.id = s.pescador_id  where S8_6_3 = 9 group by nom_dd ) as C7 on DEP.ccdd  = C7.ccdd ;
        ");
    return $q;
}


function get_report83(){
    $q = $this->db->query("
        /* TABULADO N° 81  -------------------------- CALIFICACION APOYO AL IMARPE  -------------------------*/
        select 
        DEP.CCDD, DEPARTAMENTO,  COALESCE(C0.t ,0) AS TOTAL, 
        COALESCE(C1.t,0) as MUY_BUENO, COALESCE(C2.t,0) as BUENO, COALESCE(C3.t,0) as REGULAR, COALESCE(C4.t,0) as MALO, COALESCE(C5.t,0) as MUY_MALO,
        COALESCE(C6.t,0) as NO_CONOCE, COALESCE(C7.t,0) as NEP
        from (select  distinct(departamento), ccdd from departamentos_tab order by departamento) as DEP 
        left join (select ccdd,  count(*) as t  from pescador a inner join pesc_seccion8 s on a.id = s.pescador_id  where S8_6_4 is not null group by nom_dd ) as C0 on DEP.ccdd  = C0.ccdd 
        left join (select ccdd,  count(*) as t  from pescador a inner join pesc_seccion8 s on a.id = s.pescador_id  where S8_6_4 = 1 group by nom_dd ) as C1 on DEP.ccdd  = C1.ccdd 
        left join (select ccdd,  count(*) as t  from pescador a inner join pesc_seccion8 s on a.id = s.pescador_id  where S8_6_4 = 2 group by nom_dd ) as C2 on DEP.ccdd  = C2.ccdd 
        left join (select ccdd,  count(*) as t  from pescador a inner join pesc_seccion8 s on a.id = s.pescador_id  where S8_6_4 = 3 group by nom_dd ) as C3 on DEP.ccdd  = C3.ccdd 
        left join (select ccdd,  count(*) as t  from pescador a inner join pesc_seccion8 s on a.id = s.pescador_id  where S8_6_4 = 4 group by nom_dd ) as C4 on DEP.ccdd  = C4.ccdd 
        left join (select ccdd,  count(*) as t  from pescador a inner join pesc_seccion8 s on a.id = s.pescador_id  where S8_6_4 = 5 group by nom_dd ) as C5 on DEP.ccdd  = C5.ccdd 
        left join (select ccdd,  count(*) as t  from pescador a inner join pesc_seccion8 s on a.id = s.pescador_id  where S8_6_4 = 6 group by nom_dd ) as C6 on DEP.ccdd  = C6.ccdd 
        left join (select ccdd,  count(*) as t  from pescador a inner join pesc_seccion8 s on a.id = s.pescador_id  where S8_6_4 = 9 group by nom_dd ) as C7 on DEP.ccdd  = C7.ccdd ;
        ");
    return $q;
}

function get_report84(){
    $q = $this->db->query("
        /* TABULADO N° 82  -------------------------- CALIFICACION APOYO AL MINAM  -------------------------*/
        select 
        DEP.CCDD, DEPARTAMENTO,  COALESCE(C0.t ,0) AS TOTAL, 
        COALESCE(C1.t,0) as MUY_BUENO, COALESCE(C2.t,0) as BUENO, COALESCE(C3.t,0) as REGULAR, COALESCE(C4.t,0) as MALO, COALESCE(C5.t,0) as MUY_MALO,
        COALESCE(C6.t,0) as NO_CONOCE, COALESCE(C7.t,0) as NEP
        from (select  distinct(departamento), ccdd from departamentos_tab order by departamento) as DEP 
        left join (select ccdd,  count(*) as t  from pescador a inner join pesc_seccion8 s on a.id = s.pescador_id  where S8_6_5 is not null group by nom_dd ) as C0 on DEP.ccdd  = C0.ccdd 
        left join (select ccdd,  count(*) as t  from pescador a inner join pesc_seccion8 s on a.id = s.pescador_id  where S8_6_5 = 1 group by nom_dd ) as C1 on DEP.ccdd  = C1.ccdd 
        left join (select ccdd,  count(*) as t  from pescador a inner join pesc_seccion8 s on a.id = s.pescador_id  where S8_6_5 = 2 group by nom_dd ) as C2 on DEP.ccdd  = C2.ccdd 
        left join (select ccdd,  count(*) as t  from pescador a inner join pesc_seccion8 s on a.id = s.pescador_id  where S8_6_5 = 3 group by nom_dd ) as C3 on DEP.ccdd  = C3.ccdd 
        left join (select ccdd,  count(*) as t  from pescador a inner join pesc_seccion8 s on a.id = s.pescador_id  where S8_6_5 = 4 group by nom_dd ) as C4 on DEP.ccdd  = C4.ccdd 
        left join (select ccdd,  count(*) as t  from pescador a inner join pesc_seccion8 s on a.id = s.pescador_id  where S8_6_5 = 5 group by nom_dd ) as C5 on DEP.ccdd  = C5.ccdd 
        left join (select ccdd,  count(*) as t  from pescador a inner join pesc_seccion8 s on a.id = s.pescador_id  where S8_6_5 = 6 group by nom_dd ) as C6 on DEP.ccdd  = C6.ccdd 
        left join (select ccdd,  count(*) as t  from pescador a inner join pesc_seccion8 s on a.id = s.pescador_id  where S8_6_5 = 9 group by nom_dd ) as C7 on DEP.ccdd  = C7.ccdd ;
        ");
    return $q;
}

function get_report85(){
    $q = $this->db->query("
        /* TABULADO N° 83  -------------------------- CALIFICACION APOYO AL SANPES  -------------------------*/
        select 
        DEP.CCDD, DEPARTAMENTO,  COALESCE(C0.t ,0) AS TOTAL, 
        COALESCE(C1.t,0) as MUY_BUENO, COALESCE(C2.t,0) as BUENO, COALESCE(C3.t,0) as REGULAR, COALESCE(C4.t,0) as MALO, COALESCE(C5.t,0) as MUY_MALO,
        COALESCE(C6.t,0) as NO_CONOCE, COALESCE(C7.t,0) as NEP
        from (select  distinct(departamento), ccdd from departamentos_tab order by departamento) as DEP 
        left join (select ccdd,  count(*) as t  from pescador a inner join pesc_seccion8 s on a.id = s.pescador_id  where S8_6_6 is not null group by nom_dd ) as C0 on DEP.ccdd  = C0.ccdd 
        left join (select ccdd,  count(*) as t  from pescador a inner join pesc_seccion8 s on a.id = s.pescador_id  where S8_6_6 = 1 group by nom_dd ) as C1 on DEP.ccdd  = C1.ccdd 
        left join (select ccdd,  count(*) as t  from pescador a inner join pesc_seccion8 s on a.id = s.pescador_id  where S8_6_6 = 2 group by nom_dd ) as C2 on DEP.ccdd  = C2.ccdd 
        left join (select ccdd,  count(*) as t  from pescador a inner join pesc_seccion8 s on a.id = s.pescador_id  where S8_6_6 = 3 group by nom_dd ) as C3 on DEP.ccdd  = C3.ccdd 
        left join (select ccdd,  count(*) as t  from pescador a inner join pesc_seccion8 s on a.id = s.pescador_id  where S8_6_6 = 4 group by nom_dd ) as C4 on DEP.ccdd  = C4.ccdd 
        left join (select ccdd,  count(*) as t  from pescador a inner join pesc_seccion8 s on a.id = s.pescador_id  where S8_6_6 = 5 group by nom_dd ) as C5 on DEP.ccdd  = C5.ccdd 
        left join (select ccdd,  count(*) as t  from pescador a inner join pesc_seccion8 s on a.id = s.pescador_id  where S8_6_6 = 6 group by nom_dd ) as C6 on DEP.ccdd  = C6.ccdd 
        left join (select ccdd,  count(*) as t  from pescador a inner join pesc_seccion8 s on a.id = s.pescador_id  where S8_6_6 = 9 group by nom_dd ) as C7 on DEP.ccdd  = C7.ccdd ;
        ");
    return $q;
}

function get_report86(){
    $q = $this->db->query("
        /* TABULADO N° 84 ---------  TRABAJA CON EMBARCACIONES  -----------------*/
        select 
        DEP.CCDD, DEPARTAMENTO,  COALESCE(C0.t ,0) AS TOTAL,  
        COALESCE(C1.t,0) as SI, COALESCE(C2.t,0) as 'NO',  COALESCE(C3.t,0) NEP
        from (select  distinct(departamento), ccdd from departamentos_tab order by departamento) as DEP 
        left join (select ccdd,  count(*) as t  from pescador a inner join pesc_seccion9 s on a.id = s.pescador_id  where s9_1 is not null group by nom_dd ) as C0 on DEP.ccdd  = C0.ccdd 
        left join (select ccdd,  count(*) as t  from pescador a inner join pesc_seccion9 s on a.id = s.pescador_id  where s9_1 = 1 group by nom_dd ) as C1 on DEP.ccdd  = C1.ccdd 
        left join (select ccdd,  count(*) as t  from pescador a inner join pesc_seccion9 s on a.id = s.pescador_id  where s9_1 = 2 group by nom_dd ) as C2 on DEP.ccdd  = C2.ccdd 
        left join (select ccdd,  count(*) as t  from pescador a inner join pesc_seccion9 s on a.id = s.pescador_id  where s9_1 = 9 group by nom_dd ) as C3 on DEP.ccdd  = C3.ccdd ;
        ");
    return $q;
}

function get_report87(){
    $q = $this->db->query("
        /* TABULADO N° 85  -------------------------- NUMERO EMBARCACIONES  -------------------------*/
        select 
        DEP.CCDD, DEPARTAMENTO,  COALESCE(C0.t ,0) AS TOTAL, 
        COALESCE(C1.t,0) as '_1', COALESCE(C2.t,0) as '_2', COALESCE(C3.t,0) as '_3', COALESCE(C4.t,0) as '_4', COALESCE(C5.t,0) as '_5',
        COALESCE(C6.t,0)  as NEP
        from (select  distinct(departamento), ccdd from departamentos_tab order by departamento) as DEP 
        left join (select ccdd,  count(*) as t  from pescador a inner join pesc_seccion9 s on a.id = s.pescador_id  where S9_2 is not null group by nom_dd ) as C0 on DEP.ccdd  = C0.ccdd 
        left join (select ccdd,  count(*) as t  from pescador a inner join pesc_seccion9 s on a.id = s.pescador_id  where S9_2 = 1 group by nom_dd ) as C1 on DEP.ccdd  = C1.ccdd 
        left join (select ccdd,  count(*) as t  from pescador a inner join pesc_seccion9 s on a.id = s.pescador_id  where S9_2 = 2 group by nom_dd ) as C2 on DEP.ccdd  = C2.ccdd 
        left join (select ccdd,  count(*) as t  from pescador a inner join pesc_seccion9 s on a.id = s.pescador_id  where S9_2 = 3 group by nom_dd ) as C3 on DEP.ccdd  = C3.ccdd 
        left join (select ccdd,  count(*) as t  from pescador a inner join pesc_seccion9 s on a.id = s.pescador_id  where S9_2 = 4 group by nom_dd ) as C4 on DEP.ccdd  = C4.ccdd 
        left join (select ccdd,  count(*) as t  from pescador a inner join pesc_seccion9 s on a.id = s.pescador_id  where S9_2 = 5 group by nom_dd ) as C5 on DEP.ccdd  = C5.ccdd 
        left join (select ccdd,  count(*) as t  from pescador a inner join pesc_seccion9 s on a.id = s.pescador_id  where S9_2 = 99 group by nom_dd ) as C6 on DEP.ccdd  = C6.ccdd  ;
        ");
    return $q;
}

function get_report88(){
    $q = $this->db->query("
        /* TABULADO N° 88 --------------------------  EMBARCACION  ES : -------------------------*/
        SELECT  table0.CCDD, table0.DEPARTAMENTO,  TOTAL,
        ALQUILADA , PRESTADA , PAGADA , PAGANDOLA , AUTOCONSTRUIDA , NEP    FROM
        (select 
        DEP.CCDD, DEPARTAMENTO, ( COALESCE(C1.t,0) + COALESCE(C2.t,0) + COALESCE(C3.t,0) +  COALESCE(C4.t,0) +  COALESCE(C5.t,0) ) AS TOTAL
        from (select  distinct(departamento), ccdd from departamentos_tab order by departamento) as DEP 
        left join (select ccdd,  count(*) as t  from pescador a inner join pesc_seccion9 s on a.id = s.pescador_id  where S9_4_1 IS NOT NULL group by nom_dd ) as C1 on DEP.ccdd  = C1.ccdd 
        left join (select ccdd,  count(*) as t  from pescador a inner join pesc_seccion9 s on a.id = s.pescador_id  where S9_4_2 IS NOT NULL group by nom_dd ) as C2 on DEP.ccdd  = C2.ccdd 
        left join (select ccdd,  count(*) as t  from pescador a inner join pesc_seccion9 s on a.id = s.pescador_id  where S9_4_3 IS NOT NULL group by nom_dd ) as C3 on DEP.ccdd  = C3.ccdd 
        left join (select ccdd,  count(*) as t  from pescador a inner join pesc_seccion9 s on a.id = s.pescador_id  where S9_4_4 IS NOT NULL group by nom_dd ) as C4 on DEP.ccdd  = C4.ccdd 
        left join (select ccdd,  count(*) as t  from pescador a inner join pesc_seccion9 s on a.id = s.pescador_id  where S9_4_5 IS NOT NULL group by nom_dd ) as C5 on DEP.ccdd  = C5.ccdd  ) as table0
        INNER JOIN
        (select 
        DEP.CCDD, DEPARTAMENTO,  ( COALESCE(C1.t,0) + COALESCE(C2.t,0) + COALESCE(C3.t,0) +  COALESCE(C4.t,0) +  COALESCE(C5.t,0)  ) AS ALQUILADA
        from (select  distinct(departamento), ccdd from departamentos_tab order by departamento) as DEP 
        left join (select ccdd,  count(*) as t  from pescador a inner join pesc_seccion9 s on a.id = s.pescador_id  where S9_4_1 = 1 group by nom_dd ) as C1 on DEP.ccdd  = C1.ccdd 
        left join (select ccdd,  count(*) as t  from pescador a inner join pesc_seccion9 s on a.id = s.pescador_id  where S9_4_2 = 1 group by nom_dd ) as C2 on DEP.ccdd  = C2.ccdd 
        left join (select ccdd,  count(*) as t  from pescador a inner join pesc_seccion9 s on a.id = s.pescador_id  where S9_4_3 = 1 group by nom_dd ) as C3 on DEP.ccdd  = C3.ccdd 
        left join (select ccdd,  count(*) as t  from pescador a inner join pesc_seccion9 s on a.id = s.pescador_id  where S9_4_4 = 1 group by nom_dd ) as C4 on DEP.ccdd  = C4.ccdd 
        left join (select ccdd,  count(*) as t  from pescador a inner join pesc_seccion9 s on a.id = s.pescador_id  where S9_4_5 = 1 group by nom_dd ) as C5 on DEP.ccdd  = C5.ccdd  ) as table1
        on table0.ccdd = table1.ccdd 
        INNER JOIN
        (select 
        DEP.CCDD, DEPARTAMENTO, ( COALESCE(C1.t,0) + COALESCE(C2.t,0) + COALESCE(C3.t,0) +  COALESCE(C4.t,0) +  COALESCE(C5.t,0)  ) AS PRESTADA
        from (select  distinct(departamento), ccdd from departamentos_tab order by departamento) as DEP 
        left join (select ccdd,  count(*) as t  from pescador a inner join pesc_seccion9 s on a.id = s.pescador_id  where S9_4_1 = 2 group by nom_dd ) as C1 on DEP.ccdd  = C1.ccdd 
        left join (select ccdd,  count(*) as t  from pescador a inner join pesc_seccion9 s on a.id = s.pescador_id  where S9_4_2 = 2 group by nom_dd ) as C2 on DEP.ccdd  = C2.ccdd 
        left join (select ccdd,  count(*) as t  from pescador a inner join pesc_seccion9 s on a.id = s.pescador_id  where S9_4_3 = 2 group by nom_dd ) as C3 on DEP.ccdd  = C3.ccdd 
        left join (select ccdd,  count(*) as t  from pescador a inner join pesc_seccion9 s on a.id = s.pescador_id  where S9_4_4 = 2 group by nom_dd ) as C4 on DEP.ccdd  = C4.ccdd 
        left join (select ccdd,  count(*) as t  from pescador a inner join pesc_seccion9 s on a.id = s.pescador_id  where S9_4_5 = 2 group by nom_dd ) as C5 on DEP.ccdd  = C5.ccdd ) as table2
        on table0.ccdd = table2.ccdd 
        INNER JOIN
        (select 
        DEP.CCDD, DEPARTAMENTO, ( COALESCE(C1.t,0) + COALESCE(C2.t,0) + COALESCE(C3.t,0) +  COALESCE(C4.t,0) +  COALESCE(C5.t,0)  ) AS PAGADA
        from (select  distinct(departamento), ccdd from departamentos_tab order by departamento) as DEP 
        left join (select ccdd,  count(*) as t  from pescador a inner join pesc_seccion9 s on a.id = s.pescador_id  where S9_4_1 = 3 group by nom_dd ) as C1 on DEP.ccdd  = C1.ccdd 
        left join (select ccdd,  count(*) as t  from pescador a inner join pesc_seccion9 s on a.id = s.pescador_id  where S9_4_2 = 3 group by nom_dd ) as C2 on DEP.ccdd  = C2.ccdd 
        left join (select ccdd,  count(*) as t  from pescador a inner join pesc_seccion9 s on a.id = s.pescador_id  where S9_4_3 = 3 group by nom_dd ) as C3 on DEP.ccdd  = C3.ccdd 
        left join (select ccdd,  count(*) as t  from pescador a inner join pesc_seccion9 s on a.id = s.pescador_id  where S9_4_4 = 3 group by nom_dd ) as C4 on DEP.ccdd  = C4.ccdd 
        left join (select ccdd,  count(*) as t  from pescador a inner join pesc_seccion9 s on a.id = s.pescador_id  where S9_4_5 = 3 group by nom_dd ) as C5 on DEP.ccdd  = C5.ccdd ) as table3
        on table0.ccdd = table3.ccdd 
        INNER JOIN
        (select 
        DEP.CCDD, DEPARTAMENTO, ( COALESCE(C1.t,0) + COALESCE(C2.t,0) + COALESCE(C3.t,0) +  COALESCE(C4.t,0) +  COALESCE(C5.t,0)  ) AS PAGANDOLA
        from (select  distinct(departamento), ccdd from departamentos_tab order by departamento) as DEP 
        left join (select ccdd,  count(*) as t  from pescador a inner join pesc_seccion9 s on a.id = s.pescador_id  where S9_4_1 = 4 group by nom_dd ) as C1 on DEP.ccdd  = C1.ccdd 
        left join (select ccdd,  count(*) as t  from pescador a inner join pesc_seccion9 s on a.id = s.pescador_id  where S9_4_2 = 4 group by nom_dd ) as C2 on DEP.ccdd  = C2.ccdd 
        left join (select ccdd,  count(*) as t  from pescador a inner join pesc_seccion9 s on a.id = s.pescador_id  where S9_4_3 = 4 group by nom_dd ) as C3 on DEP.ccdd  = C3.ccdd 
        left join (select ccdd,  count(*) as t  from pescador a inner join pesc_seccion9 s on a.id = s.pescador_id  where S9_4_4 = 4 group by nom_dd ) as C4 on DEP.ccdd  = C4.ccdd 
        left join (select ccdd,  count(*) as t  from pescador a inner join pesc_seccion9 s on a.id = s.pescador_id  where S9_4_5 = 4 group by nom_dd ) as C5 on DEP.ccdd  = C5.ccdd ) as table4
        on table0.ccdd = table4.ccdd 
        INNER JOIN
        (select 
        DEP.CCDD, DEPARTAMENTO, ( COALESCE(C1.t,0) + COALESCE(C2.t,0) + COALESCE(C3.t,0) +  COALESCE(C4.t,0) +  COALESCE(C5.t,0)  ) AS AUTOCONSTRUIDA
        from (select  distinct(departamento), ccdd from departamentos_tab order by departamento) as DEP 
        left join (select ccdd,  count(*) as t  from pescador a inner join pesc_seccion9 s on a.id = s.pescador_id  where S9_4_1 = 5 group by nom_dd ) as C1 on DEP.ccdd  = C1.ccdd 
        left join (select ccdd,  count(*) as t  from pescador a inner join pesc_seccion9 s on a.id = s.pescador_id  where S9_4_2 = 5 group by nom_dd ) as C2 on DEP.ccdd  = C2.ccdd 
        left join (select ccdd,  count(*) as t  from pescador a inner join pesc_seccion9 s on a.id = s.pescador_id  where S9_4_3 = 5 group by nom_dd ) as C3 on DEP.ccdd  = C3.ccdd 
        left join (select ccdd,  count(*) as t  from pescador a inner join pesc_seccion9 s on a.id = s.pescador_id  where S9_4_4 = 5 group by nom_dd ) as C4 on DEP.ccdd  = C4.ccdd 
        left join (select ccdd,  count(*) as t  from pescador a inner join pesc_seccion9 s on a.id = s.pescador_id  where S9_4_5 = 5 group by nom_dd ) as C5 on DEP.ccdd  = C5.ccdd ) as table5
        on table0.ccdd = table5.ccdd 
        INNER JOIN
        (select 
        DEP.CCDD, DEPARTAMENTO, ( COALESCE(C1.t,0) + COALESCE(C2.t,0) + COALESCE(C3.t,0) +  COALESCE(C4.t,0) +  COALESCE(C5.t,0)  ) AS NEP
        from (select  distinct(departamento), ccdd from departamentos_tab order by departamento) as DEP 
        left join (select ccdd,  count(*) as t  from pescador a inner join pesc_seccion9 s on a.id = s.pescador_id  where S9_4_1 = 9 group by nom_dd ) as C1 on DEP.ccdd  = C1.ccdd 
        left join (select ccdd,  count(*) as t  from pescador a inner join pesc_seccion9 s on a.id = s.pescador_id  where S9_4_2 = 9 group by nom_dd ) as C2 on DEP.ccdd  = C2.ccdd 
        left join (select ccdd,  count(*) as t  from pescador a inner join pesc_seccion9 s on a.id = s.pescador_id  where S9_4_3 = 9 group by nom_dd ) as C3 on DEP.ccdd  = C3.ccdd 
        left join (select ccdd,  count(*) as t  from pescador a inner join pesc_seccion9 s on a.id = s.pescador_id  where S9_4_4 = 9 group by nom_dd ) as C4 on DEP.ccdd  = C4.ccdd 
        left join (select ccdd,  count(*) as t  from pescador a inner join pesc_seccion9 s on a.id = s.pescador_id  where S9_4_5 = 9 group by nom_dd ) as C5 on DEP.ccdd  = C5.ccdd ) as table6
        on table0.ccdd = table6.ccdd ;
        ");
    return $q;
}

function get_report89(){
    $q = $this->db->query("
        /* TABULADO N° 89 -------------------------- TIPO EMBARCACION  -------------------------*/
        SELECT  table0.CCDD, table0.DEPARTAMENTO,  TOTAL,
        BOTE_PESCA , BOTE_COMERCIAL , CANOA , TOTORA , BALSA , PEQUE, OTRO, NEP    FROM
        (select 
        DEP.CCDD, DEPARTAMENTO, ( COALESCE(C1.t,0) + COALESCE(C2.t,0) + COALESCE(C3.t,0) +  COALESCE(C4.t,0) +  COALESCE(C5.t,0)  ) AS TOTAL
        from (select  distinct(departamento), ccdd from departamentos_tab order by departamento) as DEP 
        left join (select ccdd,  count(*) as t  from pescador a inner join pesc_seccion9 s on a.id = s.pescador_id  where S9_5_1 IS NOT NULL group by nom_dd ) as C1 on DEP.ccdd  = C1.ccdd 
        left join (select ccdd,  count(*) as t  from pescador a inner join pesc_seccion9 s on a.id = s.pescador_id  where S9_5_2 IS NOT NULL group by nom_dd ) as C2 on DEP.ccdd  = C2.ccdd 
        left join (select ccdd,  count(*) as t  from pescador a inner join pesc_seccion9 s on a.id = s.pescador_id  where S9_5_3 IS NOT NULL group by nom_dd ) as C3 on DEP.ccdd  = C3.ccdd 
        left join (select ccdd,  count(*) as t  from pescador a inner join pesc_seccion9 s on a.id = s.pescador_id  where S9_5_4 IS NOT NULL group by nom_dd ) as C4 on DEP.ccdd  = C4.ccdd 
        left join (select ccdd,  count(*) as t  from pescador a inner join pesc_seccion9 s on a.id = s.pescador_id  where S9_5_5 IS NOT NULL group by nom_dd ) as C5 on DEP.ccdd  = C5.ccdd  ) as table0
        INNER JOIN
        (select 
        DEP.CCDD, DEPARTAMENTO,  ( COALESCE(C1.t,0) + COALESCE(C2.t,0) + COALESCE(C3.t,0) +  COALESCE(C4.t,0) +  COALESCE(C5.t,0)  ) AS BOTE_PESCA
        from (select  distinct(departamento), ccdd from departamentos_tab order by departamento) as DEP 
        left join (select ccdd,  count(*) as t  from pescador a inner join pesc_seccion9 s on a.id = s.pescador_id  where S9_5_1 = 1 group by nom_dd ) as C1 on DEP.ccdd  = C1.ccdd 
        left join (select ccdd,  count(*) as t  from pescador a inner join pesc_seccion9 s on a.id = s.pescador_id  where S9_5_2 = 1 group by nom_dd ) as C2 on DEP.ccdd  = C2.ccdd 
        left join (select ccdd,  count(*) as t  from pescador a inner join pesc_seccion9 s on a.id = s.pescador_id  where S9_5_3 = 1 group by nom_dd ) as C3 on DEP.ccdd  = C3.ccdd 
        left join (select ccdd,  count(*) as t  from pescador a inner join pesc_seccion9 s on a.id = s.pescador_id  where S9_5_4 = 1 group by nom_dd ) as C4 on DEP.ccdd  = C4.ccdd 
        left join (select ccdd,  count(*) as t  from pescador a inner join pesc_seccion9 s on a.id = s.pescador_id  where S9_5_5 = 1 group by nom_dd ) as C5 on DEP.ccdd  = C5.ccdd ) as table1
        on table0.ccdd = table1.ccdd 
        INNER JOIN
        (select 
        DEP.CCDD, DEPARTAMENTO, ( COALESCE(C1.t,0) + COALESCE(C2.t,0) + COALESCE(C3.t,0) +  COALESCE(C4.t,0) +  COALESCE(C5.t,0)  ) AS BOTE_COMERCIAL
        from (select  distinct(departamento), ccdd from departamentos_tab order by departamento) as DEP 
        left join (select ccdd,  count(*) as t  from pescador a inner join pesc_seccion9 s on a.id = s.pescador_id  where S9_5_1 = 2 group by nom_dd ) as C1 on DEP.ccdd  = C1.ccdd 
        left join (select ccdd,  count(*) as t  from pescador a inner join pesc_seccion9 s on a.id = s.pescador_id  where S9_5_2 = 2 group by nom_dd ) as C2 on DEP.ccdd  = C2.ccdd 
        left join (select ccdd,  count(*) as t  from pescador a inner join pesc_seccion9 s on a.id = s.pescador_id  where S9_5_3 = 2 group by nom_dd ) as C3 on DEP.ccdd  = C3.ccdd 
        left join (select ccdd,  count(*) as t  from pescador a inner join pesc_seccion9 s on a.id = s.pescador_id  where S9_5_4 = 2 group by nom_dd ) as C4 on DEP.ccdd  = C4.ccdd 
        left join (select ccdd,  count(*) as t  from pescador a inner join pesc_seccion9 s on a.id = s.pescador_id  where S9_5_5 = 2 group by nom_dd ) as C5 on DEP.ccdd  = C5.ccdd ) as table2
        on table0.ccdd = table2.ccdd 
        INNER JOIN
        (select 
        DEP.CCDD, DEPARTAMENTO, ( COALESCE(C1.t,0) + COALESCE(C2.t,0) + COALESCE(C3.t,0) +  COALESCE(C4.t,0) +  COALESCE(C5.t,0)  ) AS CANOA
        from (select  distinct(departamento), ccdd from departamentos_tab order by departamento) as DEP 
        left join (select ccdd,  count(*) as t  from pescador a inner join pesc_seccion9 s on a.id = s.pescador_id  where S9_5_1 = 3 group by nom_dd ) as C1 on DEP.ccdd  = C1.ccdd 
        left join (select ccdd,  count(*) as t  from pescador a inner join pesc_seccion9 s on a.id = s.pescador_id  where S9_5_2 = 3 group by nom_dd ) as C2 on DEP.ccdd  = C2.ccdd 
        left join (select ccdd,  count(*) as t  from pescador a inner join pesc_seccion9 s on a.id = s.pescador_id  where S9_5_3 = 3 group by nom_dd ) as C3 on DEP.ccdd  = C3.ccdd 
        left join (select ccdd,  count(*) as t  from pescador a inner join pesc_seccion9 s on a.id = s.pescador_id  where S9_5_4 = 3 group by nom_dd ) as C4 on DEP.ccdd  = C4.ccdd 
        left join (select ccdd,  count(*) as t  from pescador a inner join pesc_seccion9 s on a.id = s.pescador_id  where S9_5_5 = 3 group by nom_dd ) as C5 on DEP.ccdd  = C5.ccdd ) as table3
        on table0.ccdd = table3.ccdd 
        INNER JOIN
        (select 
        DEP.CCDD, DEPARTAMENTO, ( COALESCE(C1.t,0) + COALESCE(C2.t,0) + COALESCE(C3.t,0) +  COALESCE(C4.t,0) +  COALESCE(C5.t,0)  ) AS TOTORA
        from (select  distinct(departamento), ccdd from departamentos_tab order by departamento) as DEP 
        left join (select ccdd,  count(*) as t  from pescador a inner join pesc_seccion9 s on a.id = s.pescador_id  where S9_5_1 = 4 group by nom_dd ) as C1 on DEP.ccdd  = C1.ccdd 
        left join (select ccdd,  count(*) as t  from pescador a inner join pesc_seccion9 s on a.id = s.pescador_id  where S9_5_2 = 4 group by nom_dd ) as C2 on DEP.ccdd  = C2.ccdd 
        left join (select ccdd,  count(*) as t  from pescador a inner join pesc_seccion9 s on a.id = s.pescador_id  where S9_5_3 = 4 group by nom_dd ) as C3 on DEP.ccdd  = C3.ccdd 
        left join (select ccdd,  count(*) as t  from pescador a inner join pesc_seccion9 s on a.id = s.pescador_id  where S9_5_4 = 4 group by nom_dd ) as C4 on DEP.ccdd  = C4.ccdd 
        left join (select ccdd,  count(*) as t  from pescador a inner join pesc_seccion9 s on a.id = s.pescador_id  where S9_5_5 = 4 group by nom_dd ) as C5 on DEP.ccdd  = C5.ccdd ) as table4
        on table0.ccdd = table4.ccdd 
        INNER JOIN
        (select 
        DEP.CCDD, DEPARTAMENTO, ( COALESCE(C1.t,0) + COALESCE(C2.t,0) + COALESCE(C3.t,0) +  COALESCE(C4.t,0) +  COALESCE(C5.t,0)  ) AS BALSA
        from (select  distinct(departamento), ccdd from departamentos_tab order by departamento) as DEP 
        left join (select ccdd,  count(*) as t  from pescador a inner join pesc_seccion9 s on a.id = s.pescador_id  where S9_5_1 = 5 group by nom_dd ) as C1 on DEP.ccdd  = C1.ccdd 
        left join (select ccdd,  count(*) as t  from pescador a inner join pesc_seccion9 s on a.id = s.pescador_id  where S9_5_2 = 5 group by nom_dd ) as C2 on DEP.ccdd  = C2.ccdd 
        left join (select ccdd,  count(*) as t  from pescador a inner join pesc_seccion9 s on a.id = s.pescador_id  where S9_5_3 = 5 group by nom_dd ) as C3 on DEP.ccdd  = C3.ccdd 
        left join (select ccdd,  count(*) as t  from pescador a inner join pesc_seccion9 s on a.id = s.pescador_id  where S9_5_4 = 5 group by nom_dd ) as C4 on DEP.ccdd  = C4.ccdd 
        left join (select ccdd,  count(*) as t  from pescador a inner join pesc_seccion9 s on a.id = s.pescador_id  where S9_5_5 = 5 group by nom_dd ) as C5 on DEP.ccdd  = C5.ccdd ) as table5
        on table0.ccdd = table5.ccdd 
        INNER JOIN
        (select 
        DEP.CCDD, DEPARTAMENTO, ( COALESCE(C1.t,0) + COALESCE(C2.t,0) + COALESCE(C3.t,0) +  COALESCE(C4.t,0) +  COALESCE(C5.t,0)  ) AS PEQUE
        from (select  distinct(departamento), ccdd from departamentos_tab order by departamento) as DEP 
        left join (select ccdd,  count(*) as t  from pescador a inner join pesc_seccion9 s on a.id = s.pescador_id  where S9_5_1 = 6 group by nom_dd ) as C1 on DEP.ccdd  = C1.ccdd 
        left join (select ccdd,  count(*) as t  from pescador a inner join pesc_seccion9 s on a.id = s.pescador_id  where S9_5_2 = 6 group by nom_dd ) as C2 on DEP.ccdd  = C2.ccdd 
        left join (select ccdd,  count(*) as t  from pescador a inner join pesc_seccion9 s on a.id = s.pescador_id  where S9_5_3 = 6 group by nom_dd ) as C3 on DEP.ccdd  = C3.ccdd 
        left join (select ccdd,  count(*) as t  from pescador a inner join pesc_seccion9 s on a.id = s.pescador_id  where S9_5_4 = 6 group by nom_dd ) as C4 on DEP.ccdd  = C4.ccdd 
        left join (select ccdd,  count(*) as t  from pescador a inner join pesc_seccion9 s on a.id = s.pescador_id  where S9_5_5 = 6 group by nom_dd ) as C5 on DEP.ccdd  = C5.ccdd ) as table6
        on table0.ccdd = table6.ccdd 
        INNER JOIN
        (select 
        DEP.CCDD, DEPARTAMENTO, ( COALESCE(C1.t,0) + COALESCE(C2.t,0) + COALESCE(C3.t,0) +  COALESCE(C4.t,0) +  COALESCE(C5.t,0)  ) AS OTRO
        from (select  distinct(departamento), ccdd from departamentos_tab order by departamento) as DEP 
        left join (select ccdd,  count(*) as t  from pescador a inner join pesc_seccion9 s on a.id = s.pescador_id  where S9_5_1 = 7 group by nom_dd ) as C1 on DEP.ccdd  = C1.ccdd 
        left join (select ccdd,  count(*) as t  from pescador a inner join pesc_seccion9 s on a.id = s.pescador_id  where S9_5_2 = 7 group by nom_dd ) as C2 on DEP.ccdd  = C2.ccdd 
        left join (select ccdd,  count(*) as t  from pescador a inner join pesc_seccion9 s on a.id = s.pescador_id  where S9_5_3 = 7 group by nom_dd ) as C3 on DEP.ccdd  = C3.ccdd 
        left join (select ccdd,  count(*) as t  from pescador a inner join pesc_seccion9 s on a.id = s.pescador_id  where S9_5_4 = 7 group by nom_dd ) as C4 on DEP.ccdd  = C4.ccdd 
        left join (select ccdd,  count(*) as t  from pescador a inner join pesc_seccion9 s on a.id = s.pescador_id  where S9_5_5 = 7 group by nom_dd ) as C5 on DEP.ccdd  = C5.ccdd ) as table7
        on table0.ccdd = table7.ccdd 
        INNER JOIN
        (select 
        DEP.CCDD, DEPARTAMENTO, ( COALESCE(C1.t,0) + COALESCE(C2.t,0) + COALESCE(C3.t,0) +  COALESCE(C4.t,0) +  COALESCE(C5.t,0)  ) AS NEP
        from (select  distinct(departamento), ccdd from departamentos_tab order by departamento) as DEP 
        left join (select ccdd,  count(*) as t  from pescador a inner join pesc_seccion9 s on a.id = s.pescador_id  where S9_5_1 = 9 group by nom_dd ) as C1 on DEP.ccdd  = C1.ccdd 
        left join (select ccdd,  count(*) as t  from pescador a inner join pesc_seccion9 s on a.id = s.pescador_id  where S9_5_2 = 9 group by nom_dd ) as C2 on DEP.ccdd  = C2.ccdd 
        left join (select ccdd,  count(*) as t  from pescador a inner join pesc_seccion9 s on a.id = s.pescador_id  where S9_5_3 = 9 group by nom_dd ) as C3 on DEP.ccdd  = C3.ccdd 
        left join (select ccdd,  count(*) as t  from pescador a inner join pesc_seccion9 s on a.id = s.pescador_id  where S9_5_4 = 9 group by nom_dd ) as C4 on DEP.ccdd  = C4.ccdd 
        left join (select ccdd,  count(*) as t  from pescador a inner join pesc_seccion9 s on a.id = s.pescador_id  where S9_5_5 = 9 group by nom_dd ) as C5 on DEP.ccdd  = C5.ccdd  ) as table8
        on table0.ccdd = table8.ccdd ;
        ");
    return $q;
}

function get_report90(){
    $q = $this->db->query("
        /* TABULADO N° 90 -------------------------- TIPO MATERIAL  -------------------------*/
        SELECT  table0.CCDD, table0.DEPARTAMENTO,  TOTAL,
        MADERA , FIBRA , ACERO , MADERA_FIBRA , MADERA_ACERO , ALUMINIO, TOTORA, PLASTICO, NEP    FROM
        (select 
        DEP.CCDD, DEPARTAMENTO, ( COALESCE(C1.t,0) + COALESCE(C2.t,0) + COALESCE(C3.t,0) +  COALESCE(C4.t,0) +  COALESCE(C5.t,0) ) AS TOTAL
        from (select  distinct(departamento), ccdd from departamentos_tab order by departamento) as DEP 
        left join (select ccdd,  count(*) as t  from pescador a inner join pesc_seccion9 s on a.id = s.pescador_id  where S9_6_1 IS NOT NULL group by nom_dd ) as C1 on DEP.ccdd  = C1.ccdd 
        left join (select ccdd,  count(*) as t  from pescador a inner join pesc_seccion9 s on a.id = s.pescador_id  where S9_6_2 IS NOT NULL group by nom_dd ) as C2 on DEP.ccdd  = C2.ccdd 
        left join (select ccdd,  count(*) as t  from pescador a inner join pesc_seccion9 s on a.id = s.pescador_id  where S9_6_3 IS NOT NULL group by nom_dd ) as C3 on DEP.ccdd  = C3.ccdd 
        left join (select ccdd,  count(*) as t  from pescador a inner join pesc_seccion9 s on a.id = s.pescador_id  where S9_6_4 IS NOT NULL group by nom_dd ) as C4 on DEP.ccdd  = C4.ccdd 
        left join (select ccdd,  count(*) as t  from pescador a inner join pesc_seccion9 s on a.id = s.pescador_id  where S9_6_5 IS NOT NULL group by nom_dd ) as C5 on DEP.ccdd  = C5.ccdd ) as table0
        INNER JOIN
        (select 
        DEP.CCDD, DEPARTAMENTO,  ( COALESCE(C1.t,0) + COALESCE(C2.t,0) + COALESCE(C3.t,0) +  COALESCE(C4.t,0) +  COALESCE(C5.t,0) )AS MADERA
        from (select  distinct(departamento), ccdd from departamentos_tab order by departamento) as DEP 
        left join (select ccdd,  count(*) as t  from pescador a inner join pesc_seccion9 s on a.id = s.pescador_id  where S9_6_1 = 1 group by nom_dd ) as C1 on DEP.ccdd  = C1.ccdd 
        left join (select ccdd,  count(*) as t  from pescador a inner join pesc_seccion9 s on a.id = s.pescador_id  where S9_6_2 = 1 group by nom_dd ) as C2 on DEP.ccdd  = C2.ccdd 
        left join (select ccdd,  count(*) as t  from pescador a inner join pesc_seccion9 s on a.id = s.pescador_id  where S9_6_3 = 1 group by nom_dd ) as C3 on DEP.ccdd  = C3.ccdd 
        left join (select ccdd,  count(*) as t  from pescador a inner join pesc_seccion9 s on a.id = s.pescador_id  where S9_6_4 = 1 group by nom_dd ) as C4 on DEP.ccdd  = C4.ccdd 
        left join (select ccdd,  count(*) as t  from pescador a inner join pesc_seccion9 s on a.id = s.pescador_id  where S9_6_5 = 1 group by nom_dd ) as C5 on DEP.ccdd  = C5.ccdd ) as table1
        on table0.ccdd = table1.ccdd 
        INNER JOIN
        (select 
        DEP.CCDD, DEPARTAMENTO, ( COALESCE(C1.t,0) + COALESCE(C2.t,0) + COALESCE(C3.t,0) +  COALESCE(C4.t,0) +  COALESCE(C5.t,0) ) AS FIBRA
        from (select  distinct(departamento), ccdd from departamentos_tab order by departamento) as DEP 
        left join (select ccdd,  count(*) as t  from pescador a inner join pesc_seccion9 s on a.id = s.pescador_id  where S9_6_1 = 2 group by nom_dd ) as C1 on DEP.ccdd  = C1.ccdd 
        left join (select ccdd,  count(*) as t  from pescador a inner join pesc_seccion9 s on a.id = s.pescador_id  where S9_6_2 = 2 group by nom_dd ) as C2 on DEP.ccdd  = C2.ccdd 
        left join (select ccdd,  count(*) as t  from pescador a inner join pesc_seccion9 s on a.id = s.pescador_id  where S9_6_3 = 2 group by nom_dd ) as C3 on DEP.ccdd  = C3.ccdd 
        left join (select ccdd,  count(*) as t  from pescador a inner join pesc_seccion9 s on a.id = s.pescador_id  where S9_6_4 = 2 group by nom_dd ) as C4 on DEP.ccdd  = C4.ccdd 
        left join (select ccdd,  count(*) as t  from pescador a inner join pesc_seccion9 s on a.id = s.pescador_id  where S9_6_5 = 2 group by nom_dd ) as C5 on DEP.ccdd  = C5.ccdd ) as table2
        on table0.ccdd = table2.ccdd 
        INNER JOIN
        (select 
        DEP.CCDD, DEPARTAMENTO, ( COALESCE(C1.t,0) + COALESCE(C2.t,0) + COALESCE(C3.t,0) +  COALESCE(C4.t,0) +  COALESCE(C5.t,0) ) AS ACERO
        from (select  distinct(departamento), ccdd from departamentos_tab order by departamento) as DEP 
        left join (select ccdd,  count(*) as t  from pescador a inner join pesc_seccion9 s on a.id = s.pescador_id  where S9_6_1 = 3 group by nom_dd ) as C1 on DEP.ccdd  = C1.ccdd 
        left join (select ccdd,  count(*) as t  from pescador a inner join pesc_seccion9 s on a.id = s.pescador_id  where S9_6_2 = 3 group by nom_dd ) as C2 on DEP.ccdd  = C2.ccdd 
        left join (select ccdd,  count(*) as t  from pescador a inner join pesc_seccion9 s on a.id = s.pescador_id  where S9_6_3 = 3 group by nom_dd ) as C3 on DEP.ccdd  = C3.ccdd 
        left join (select ccdd,  count(*) as t  from pescador a inner join pesc_seccion9 s on a.id = s.pescador_id  where S9_6_4 = 3 group by nom_dd ) as C4 on DEP.ccdd  = C4.ccdd 
        left join (select ccdd,  count(*) as t  from pescador a inner join pesc_seccion9 s on a.id = s.pescador_id  where S9_6_5 = 3 group by nom_dd ) as C5 on DEP.ccdd  = C5.ccdd ) as table3
        on table0.ccdd = table3.ccdd 
        INNER JOIN
        (select 
        DEP.CCDD, DEPARTAMENTO, ( COALESCE(C1.t,0) + COALESCE(C2.t,0) + COALESCE(C3.t,0) +  COALESCE(C4.t,0) +  COALESCE(C5.t,0) ) AS MADERA_FIBRA
        from (select  distinct(departamento), ccdd from departamentos_tab order by departamento) as DEP 
        left join (select ccdd,  count(*) as t  from pescador a inner join pesc_seccion9 s on a.id = s.pescador_id  where S9_6_1 = 4 group by nom_dd ) as C1 on DEP.ccdd  = C1.ccdd 
        left join (select ccdd,  count(*) as t  from pescador a inner join pesc_seccion9 s on a.id = s.pescador_id  where S9_6_2 = 4 group by nom_dd ) as C2 on DEP.ccdd  = C2.ccdd 
        left join (select ccdd,  count(*) as t  from pescador a inner join pesc_seccion9 s on a.id = s.pescador_id  where S9_6_3 = 4 group by nom_dd ) as C3 on DEP.ccdd  = C3.ccdd 
        left join (select ccdd,  count(*) as t  from pescador a inner join pesc_seccion9 s on a.id = s.pescador_id  where S9_6_4 = 4 group by nom_dd ) as C4 on DEP.ccdd  = C4.ccdd 
        left join (select ccdd,  count(*) as t  from pescador a inner join pesc_seccion9 s on a.id = s.pescador_id  where S9_6_5 = 4 group by nom_dd ) as C5 on DEP.ccdd  = C5.ccdd ) as table4
        on table0.ccdd = table4.ccdd 
        INNER JOIN
        (select 
        DEP.CCDD, DEPARTAMENTO, ( COALESCE(C1.t,0) + COALESCE(C2.t,0) + COALESCE(C3.t,0) +  COALESCE(C4.t,0) +  COALESCE(C5.t,0) ) AS MADERA_ACERO
        from (select  distinct(departamento), ccdd from departamentos_tab order by departamento) as DEP 
        left join (select ccdd,  count(*) as t  from pescador a inner join pesc_seccion9 s on a.id = s.pescador_id  where S9_6_1 = 5 group by nom_dd ) as C1 on DEP.ccdd  = C1.ccdd 
        left join (select ccdd,  count(*) as t  from pescador a inner join pesc_seccion9 s on a.id = s.pescador_id  where S9_6_2 = 5 group by nom_dd ) as C2 on DEP.ccdd  = C2.ccdd 
        left join (select ccdd,  count(*) as t  from pescador a inner join pesc_seccion9 s on a.id = s.pescador_id  where S9_6_3 = 5 group by nom_dd ) as C3 on DEP.ccdd  = C3.ccdd 
        left join (select ccdd,  count(*) as t  from pescador a inner join pesc_seccion9 s on a.id = s.pescador_id  where S9_6_4 = 5 group by nom_dd ) as C4 on DEP.ccdd  = C4.ccdd 
        left join (select ccdd,  count(*) as t  from pescador a inner join pesc_seccion9 s on a.id = s.pescador_id  where S9_6_5 = 5 group by nom_dd ) as C5 on DEP.ccdd  = C5.ccdd ) as table5
        on table0.ccdd = table5.ccdd 
        INNER JOIN
        (select 
        DEP.CCDD, DEPARTAMENTO, ( COALESCE(C1.t,0) + COALESCE(C2.t,0) + COALESCE(C3.t,0) +  COALESCE(C4.t,0) +  COALESCE(C5.t,0) ) AS ALUMINIO
        from (select  distinct(departamento), ccdd from departamentos_tab order by departamento) as DEP 
        left join (select ccdd,  count(*) as t  from pescador a inner join pesc_seccion9 s on a.id = s.pescador_id  where S9_6_1 = 6 group by nom_dd ) as C1 on DEP.ccdd  = C1.ccdd 
        left join (select ccdd,  count(*) as t  from pescador a inner join pesc_seccion9 s on a.id = s.pescador_id  where S9_6_2 = 6 group by nom_dd ) as C2 on DEP.ccdd  = C2.ccdd 
        left join (select ccdd,  count(*) as t  from pescador a inner join pesc_seccion9 s on a.id = s.pescador_id  where S9_6_3 = 6 group by nom_dd ) as C3 on DEP.ccdd  = C3.ccdd 
        left join (select ccdd,  count(*) as t  from pescador a inner join pesc_seccion9 s on a.id = s.pescador_id  where S9_6_4 = 6 group by nom_dd ) as C4 on DEP.ccdd  = C4.ccdd 
        left join (select ccdd,  count(*) as t  from pescador a inner join pesc_seccion9 s on a.id = s.pescador_id  where S9_6_5 = 6 group by nom_dd ) as C5 on DEP.ccdd  = C5.ccdd ) as table6
        on table0.ccdd = table6.ccdd 
        INNER JOIN
        (select 
        DEP.CCDD, DEPARTAMENTO, ( COALESCE(C1.t,0) + COALESCE(C2.t,0) + COALESCE(C3.t,0) +  COALESCE(C4.t,0) +  COALESCE(C5.t,0) ) AS TOTORA
        from (select  distinct(departamento), ccdd from departamentos_tab order by departamento) as DEP 
        left join (select ccdd,  count(*) as t  from pescador a inner join pesc_seccion9 s on a.id = s.pescador_id  where S9_6_1 = 7 group by nom_dd ) as C1 on DEP.ccdd  = C1.ccdd 
        left join (select ccdd,  count(*) as t  from pescador a inner join pesc_seccion9 s on a.id = s.pescador_id  where S9_6_2 = 7 group by nom_dd ) as C2 on DEP.ccdd  = C2.ccdd 
        left join (select ccdd,  count(*) as t  from pescador a inner join pesc_seccion9 s on a.id = s.pescador_id  where S9_6_3 = 7 group by nom_dd ) as C3 on DEP.ccdd  = C3.ccdd 
        left join (select ccdd,  count(*) as t  from pescador a inner join pesc_seccion9 s on a.id = s.pescador_id  where S9_6_4 = 7 group by nom_dd ) as C4 on DEP.ccdd  = C4.ccdd 
        left join (select ccdd,  count(*) as t  from pescador a inner join pesc_seccion9 s on a.id = s.pescador_id  where S9_6_5 = 7 group by nom_dd ) as C5 on DEP.ccdd  = C5.ccdd ) as table7
        on table0.ccdd = table7.ccdd 
        INNER JOIN
        (select 
        DEP.CCDD, DEPARTAMENTO, ( COALESCE(C1.t,0) + COALESCE(C2.t,0) + COALESCE(C3.t,0) +  COALESCE(C4.t,0) +  COALESCE(C5.t,0) ) AS PLASTICO
        from (select  distinct(departamento), ccdd from departamentos_tab order by departamento) as DEP 
        left join (select ccdd,  count(*) as t  from pescador a inner join pesc_seccion9 s on a.id = s.pescador_id  where S9_6_1 = 8 group by nom_dd ) as C1 on DEP.ccdd  = C1.ccdd 
        left join (select ccdd,  count(*) as t  from pescador a inner join pesc_seccion9 s on a.id = s.pescador_id  where S9_6_2 = 8 group by nom_dd ) as C2 on DEP.ccdd  = C2.ccdd 
        left join (select ccdd,  count(*) as t  from pescador a inner join pesc_seccion9 s on a.id = s.pescador_id  where S9_6_3 = 8 group by nom_dd ) as C3 on DEP.ccdd  = C3.ccdd 
        left join (select ccdd,  count(*) as t  from pescador a inner join pesc_seccion9 s on a.id = s.pescador_id  where S9_6_4 = 8 group by nom_dd ) as C4 on DEP.ccdd  = C4.ccdd 
        left join (select ccdd,  count(*) as t  from pescador a inner join pesc_seccion9 s on a.id = s.pescador_id  where S9_6_5 = 8 group by nom_dd ) as C5 on DEP.ccdd  = C5.ccdd ) as table8
        on table0.ccdd = table8.ccdd 
        INNER JOIN
        (select 
        DEP.CCDD, DEPARTAMENTO, ( COALESCE(C1.t,0) + COALESCE(C2.t,0) + COALESCE(C3.t,0) +  COALESCE(C4.t,0) +  COALESCE(C5.t,0) ) AS NEP
        from (select  distinct(departamento), ccdd from departamentos_tab order by departamento) as DEP 
        left join (select ccdd,  count(*) as t  from pescador a inner join pesc_seccion9 s on a.id = s.pescador_id  where S9_6_1 = 9 group by nom_dd ) as C1 on DEP.ccdd  = C1.ccdd 
        left join (select ccdd,  count(*) as t  from pescador a inner join pesc_seccion9 s on a.id = s.pescador_id  where S9_6_2 = 9 group by nom_dd ) as C2 on DEP.ccdd  = C2.ccdd 
        left join (select ccdd,  count(*) as t  from pescador a inner join pesc_seccion9 s on a.id = s.pescador_id  where S9_6_3 = 9 group by nom_dd ) as C3 on DEP.ccdd  = C3.ccdd 
        left join (select ccdd,  count(*) as t  from pescador a inner join pesc_seccion9 s on a.id = s.pescador_id  where S9_6_4 = 9 group by nom_dd ) as C4 on DEP.ccdd  = C4.ccdd 
        left join (select ccdd,  count(*) as t  from pescador a inner join pesc_seccion9 s on a.id = s.pescador_id  where S9_6_5 = 9 group by nom_dd ) as C5 on DEP.ccdd  = C5.ccdd ) as table9
        on table0.ccdd = table9.ccdd ;
        ");
    return $q;
}

function get_report91(){
    $q = $this->db->query("
        /* TABULADO N° 89 --------------------------  EMBARCACION  ESTADO : -------------------------*/
        SELECT  table0.CCDD, table0.DEPARTAMENTO,  TOTAL,
        OPERATIVA , REPARACION , ABANDONO , CONSTRUCCION , NEP    FROM
        (select 
        DEP.CCDD, DEPARTAMENTO, ( COALESCE(C1.t,0) + COALESCE(C2.t,0) + COALESCE(C3.t,0) +  COALESCE(C4.t,0) +  COALESCE(C5.t,0) ) AS TOTAL
        from (select  distinct(departamento), ccdd from departamentos_tab order by departamento) as DEP 
        left join (select ccdd,  count(*) as t  from pescador a inner join pesc_seccion9 s on a.id = s.pescador_id  where S9_7_1 IS NOT NULL group by nom_dd ) as C1 on DEP.ccdd  = C1.ccdd 
        left join (select ccdd,  count(*) as t  from pescador a inner join pesc_seccion9 s on a.id = s.pescador_id  where S9_7_2 IS NOT NULL group by nom_dd ) as C2 on DEP.ccdd  = C2.ccdd 
        left join (select ccdd,  count(*) as t  from pescador a inner join pesc_seccion9 s on a.id = s.pescador_id  where S9_7_3 IS NOT NULL group by nom_dd ) as C3 on DEP.ccdd  = C3.ccdd 
        left join (select ccdd,  count(*) as t  from pescador a inner join pesc_seccion9 s on a.id = s.pescador_id  where S9_7_4 IS NOT NULL group by nom_dd ) as C4 on DEP.ccdd  = C4.ccdd 
        left join (select ccdd,  count(*) as t  from pescador a inner join pesc_seccion9 s on a.id = s.pescador_id  where S9_7_5 IS NOT NULL group by nom_dd ) as C5 on DEP.ccdd  = C5.ccdd ) as table0
        INNER JOIN
        (select 
        DEP.CCDD, DEPARTAMENTO,  ( COALESCE(C1.t,0) + COALESCE(C2.t,0) + COALESCE(C3.t,0) +  COALESCE(C4.t,0) +  COALESCE(C5.t,0) ) AS OPERATIVA
        from (select  distinct(departamento), ccdd from departamentos_tab order by departamento) as DEP 
        left join (select ccdd,  count(*) as t  from pescador a inner join pesc_seccion9 s on a.id = s.pescador_id  where S9_7_1 = 1 group by nom_dd ) as C1 on DEP.ccdd  = C1.ccdd 
        left join (select ccdd,  count(*) as t  from pescador a inner join pesc_seccion9 s on a.id = s.pescador_id  where S9_7_2 = 1 group by nom_dd ) as C2 on DEP.ccdd  = C2.ccdd 
        left join (select ccdd,  count(*) as t  from pescador a inner join pesc_seccion9 s on a.id = s.pescador_id  where S9_7_3 = 1 group by nom_dd ) as C3 on DEP.ccdd  = C3.ccdd 
        left join (select ccdd,  count(*) as t  from pescador a inner join pesc_seccion9 s on a.id = s.pescador_id  where S9_7_4 = 1 group by nom_dd ) as C4 on DEP.ccdd  = C4.ccdd 
        left join (select ccdd,  count(*) as t  from pescador a inner join pesc_seccion9 s on a.id = s.pescador_id  where S9_7_5 = 1 group by nom_dd ) as C5 on DEP.ccdd  = C5.ccdd ) as table1
        on table0.ccdd = table1.ccdd 
        INNER JOIN
        (select 
        DEP.CCDD, DEPARTAMENTO, ( COALESCE(C1.t,0) + COALESCE(C2.t,0) + COALESCE(C3.t,0) +  COALESCE(C4.t,0) +  COALESCE(C5.t,0) ) AS REPARACION
        from (select  distinct(departamento), ccdd from departamentos_tab order by departamento) as DEP 
        left join (select ccdd,  count(*) as t  from pescador a inner join pesc_seccion9 s on a.id = s.pescador_id  where S9_7_1 = 2 group by nom_dd ) as C1 on DEP.ccdd  = C1.ccdd 
        left join (select ccdd,  count(*) as t  from pescador a inner join pesc_seccion9 s on a.id = s.pescador_id  where S9_7_2 = 2 group by nom_dd ) as C2 on DEP.ccdd  = C2.ccdd 
        left join (select ccdd,  count(*) as t  from pescador a inner join pesc_seccion9 s on a.id = s.pescador_id  where S9_7_3 = 2 group by nom_dd ) as C3 on DEP.ccdd  = C3.ccdd 
        left join (select ccdd,  count(*) as t  from pescador a inner join pesc_seccion9 s on a.id = s.pescador_id  where S9_7_4 = 2 group by nom_dd ) as C4 on DEP.ccdd  = C4.ccdd 
        left join (select ccdd,  count(*) as t  from pescador a inner join pesc_seccion9 s on a.id = s.pescador_id  where S9_7_5 = 2 group by nom_dd ) as C5 on DEP.ccdd  = C5.ccdd ) as table2
        on table0.ccdd = table2.ccdd 
        INNER JOIN
        (select 
        DEP.CCDD, DEPARTAMENTO, ( COALESCE(C1.t,0) + COALESCE(C2.t,0) + COALESCE(C3.t,0) +  COALESCE(C4.t,0) +  COALESCE(C5.t,0) ) AS ABANDONO
        from (select  distinct(departamento), ccdd from departamentos_tab order by departamento) as DEP 
        left join (select ccdd,  count(*) as t  from pescador a inner join pesc_seccion9 s on a.id = s.pescador_id  where S9_7_1 = 3 group by nom_dd ) as C1 on DEP.ccdd  = C1.ccdd 
        left join (select ccdd,  count(*) as t  from pescador a inner join pesc_seccion9 s on a.id = s.pescador_id  where S9_7_2 = 3 group by nom_dd ) as C2 on DEP.ccdd  = C2.ccdd 
        left join (select ccdd,  count(*) as t  from pescador a inner join pesc_seccion9 s on a.id = s.pescador_id  where S9_7_3 = 3 group by nom_dd ) as C3 on DEP.ccdd  = C3.ccdd 
        left join (select ccdd,  count(*) as t  from pescador a inner join pesc_seccion9 s on a.id = s.pescador_id  where S9_7_4 = 3 group by nom_dd ) as C4 on DEP.ccdd  = C4.ccdd 
        left join (select ccdd,  count(*) as t  from pescador a inner join pesc_seccion9 s on a.id = s.pescador_id  where S9_7_5 = 3 group by nom_dd ) as C5 on DEP.ccdd  = C5.ccdd ) as table3
        on table0.ccdd = table3.ccdd 
        INNER JOIN
        (select 
        DEP.CCDD, DEPARTAMENTO, ( COALESCE(C1.t,0) + COALESCE(C2.t,0) + COALESCE(C3.t,0) +  COALESCE(C4.t,0) +  COALESCE(C5.t,0) ) AS CONSTRUCCION
        from (select  distinct(departamento), ccdd from departamentos_tab order by departamento) as DEP 
        left join (select ccdd,  count(*) as t  from pescador a inner join pesc_seccion9 s on a.id = s.pescador_id  where S9_7_1 = 4 group by nom_dd ) as C1 on DEP.ccdd  = C1.ccdd 
        left join (select ccdd,  count(*) as t  from pescador a inner join pesc_seccion9 s on a.id = s.pescador_id  where S9_7_2 = 4 group by nom_dd ) as C2 on DEP.ccdd  = C2.ccdd 
        left join (select ccdd,  count(*) as t  from pescador a inner join pesc_seccion9 s on a.id = s.pescador_id  where S9_7_3 = 4 group by nom_dd ) as C3 on DEP.ccdd  = C3.ccdd 
        left join (select ccdd,  count(*) as t  from pescador a inner join pesc_seccion9 s on a.id = s.pescador_id  where S9_7_4 = 4 group by nom_dd ) as C4 on DEP.ccdd  = C4.ccdd 
        left join (select ccdd,  count(*) as t  from pescador a inner join pesc_seccion9 s on a.id = s.pescador_id  where S9_7_5 = 4 group by nom_dd ) as C5 on DEP.ccdd  = C5.ccdd ) as table4
        on table0.ccdd = table4.ccdd 
        INNER JOIN
        (select 
        DEP.CCDD, DEPARTAMENTO, ( COALESCE(C1.t,0) + COALESCE(C2.t,0) + COALESCE(C3.t,0) +  COALESCE(C4.t,0) +  COALESCE(C5.t,0) ) AS NEP
        from (select  distinct(departamento), ccdd from departamentos_tab order by departamento) as DEP 
        left join (select ccdd,  count(*) as t  from pescador a inner join pesc_seccion9 s on a.id = s.pescador_id  where S9_7_1 = 9 group by nom_dd ) as C1 on DEP.ccdd  = C1.ccdd 
        left join (select ccdd,  count(*) as t  from pescador a inner join pesc_seccion9 s on a.id = s.pescador_id  where S9_7_2 = 9 group by nom_dd ) as C2 on DEP.ccdd  = C2.ccdd 
        left join (select ccdd,  count(*) as t  from pescador a inner join pesc_seccion9 s on a.id = s.pescador_id  where S9_7_3 = 9 group by nom_dd ) as C3 on DEP.ccdd  = C3.ccdd 
        left join (select ccdd,  count(*) as t  from pescador a inner join pesc_seccion9 s on a.id = s.pescador_id  where S9_7_4 = 9 group by nom_dd ) as C4 on DEP.ccdd  = C4.ccdd 
        left join (select ccdd,  count(*) as t  from pescador a inner join pesc_seccion9 s on a.id = s.pescador_id  where S9_7_5 = 9 group by nom_dd ) as C5 on DEP.ccdd  = C5.ccdd ) as table5
        on table0.ccdd = table5.ccdd ;
        ");
    return $q;
}


function get_report92(){
    $q = $this->db->query("
        /* TABULADO N° 92  --------------------------  EMBARCACION EN MANTENIMIENTO : -------------------------*/
        SELECT  table0.CCDD, table0.DEPARTAMENTO,  TOTAL,
        _6_MESES , _11_MESES , _1_2_ANOS , _3_4_ANOS , _5_MAS, NEP    FROM
        (select 
        DEP.CCDD, DEPARTAMENTO, ( COALESCE(C1.t,0) + COALESCE(C2.t,0) + COALESCE(C3.t,0) +  COALESCE(C4.t,0) +  COALESCE(C5.t,0) ) AS TOTAL
        from (select  distinct(departamento), ccdd from departamentos_tab order by departamento) as DEP 
        left join (select ccdd,  count(*) as t  from pescador a inner join pesc_seccion9 s on a.id = s.pescador_id  where S9_9_1_A IS NOT NULL group by nom_dd ) as C1 on DEP.ccdd  = C1.ccdd 
        left join (select ccdd,  count(*) as t  from pescador a inner join pesc_seccion9 s on a.id = s.pescador_id  where S9_9_2_A IS NOT NULL group by nom_dd ) as C2 on DEP.ccdd  = C2.ccdd 
        left join (select ccdd,  count(*) as t  from pescador a inner join pesc_seccion9 s on a.id = s.pescador_id  where S9_9_3_A IS NOT NULL group by nom_dd ) as C3 on DEP.ccdd  = C3.ccdd 
        left join (select ccdd,  count(*) as t  from pescador a inner join pesc_seccion9 s on a.id = s.pescador_id  where S9_9_4_A IS NOT NULL group by nom_dd ) as C4 on DEP.ccdd  = C4.ccdd 
        left join (select ccdd,  count(*) as t  from pescador a inner join pesc_seccion9 s on a.id = s.pescador_id  where S9_9_5_A IS NOT NULL group by nom_dd ) as C5 on DEP.ccdd  = C5.ccdd ) as table0
        INNER JOIN
        (select 
        DEP.CCDD, DEPARTAMENTO,  ( COALESCE(C1.t,0) + COALESCE(C2.t,0) + COALESCE(C3.t,0) +  COALESCE(C4.t,0) +  COALESCE(C5.t,0) ) AS _6_MESES
        from (select  distinct(departamento), ccdd from departamentos_tab order by departamento) as DEP 
        left join (select ccdd,  count(*) as t  from pescador a inner join pesc_seccion9 s on a.id = s.pescador_id  where S9_9_1_A = 0 AND S9_9_1_M <6 group by nom_dd ) as C1 on DEP.ccdd  = C1.ccdd 
        left join (select ccdd,  count(*) as t  from pescador a inner join pesc_seccion9 s on a.id = s.pescador_id  where S9_9_2_A = 0 AND S9_9_2_M <6 group by nom_dd ) as C2 on DEP.ccdd  = C2.ccdd 
        left join (select ccdd,  count(*) as t  from pescador a inner join pesc_seccion9 s on a.id = s.pescador_id  where S9_9_3_A = 0 AND S9_9_3_M <6 group by nom_dd ) as C3 on DEP.ccdd  = C3.ccdd 
        left join (select ccdd,  count(*) as t  from pescador a inner join pesc_seccion9 s on a.id = s.pescador_id  where S9_9_4_A = 0 AND S9_9_4_M <6 group by nom_dd ) as C4 on DEP.ccdd  = C4.ccdd 
        left join (select ccdd,  count(*) as t  from pescador a inner join pesc_seccion9 s on a.id = s.pescador_id  where S9_9_5_A = 0 AND S9_9_5_M <6 group by nom_dd ) as C5 on DEP.ccdd  = C5.ccdd ) as table1
        on table0.ccdd = table1.ccdd 
        INNER JOIN
        (select 
        DEP.CCDD, DEPARTAMENTO, ( COALESCE(C1.t,0) + COALESCE(C2.t,0) + COALESCE(C3.t,0) +  COALESCE(C4.t,0) +  COALESCE(C5.t,0) ) AS _11_MESES
        from (select  distinct(departamento), ccdd from departamentos_tab order by departamento) as DEP 
        left join (select ccdd,  count(*) as t  from pescador a inner join pesc_seccion9 s on a.id = s.pescador_id  where S9_9_1_A = 0 AND S9_9_1_M >= 6 AND S9_9_1_M <=11 group by nom_dd ) as C1 on DEP.ccdd  = C1.ccdd 
        left join (select ccdd,  count(*) as t  from pescador a inner join pesc_seccion9 s on a.id = s.pescador_id  where S9_9_2_A = 0 AND S9_9_2_M >= 6 AND S9_9_2_M <=11 group by nom_dd ) as C2 on DEP.ccdd  = C2.ccdd 
        left join (select ccdd,  count(*) as t  from pescador a inner join pesc_seccion9 s on a.id = s.pescador_id  where S9_9_3_A = 0 AND S9_9_3_M >= 6 AND S9_9_3_M <=11 group by nom_dd ) as C3 on DEP.ccdd  = C3.ccdd 
        left join (select ccdd,  count(*) as t  from pescador a inner join pesc_seccion9 s on a.id = s.pescador_id  where S9_9_4_A = 0 AND S9_9_4_M >= 6 AND S9_9_4_M <=11 group by nom_dd ) as C4 on DEP.ccdd  = C4.ccdd 
        left join (select ccdd,  count(*) as t  from pescador a inner join pesc_seccion9 s on a.id = s.pescador_id  where S9_9_5_A = 0 AND S9_9_5_M >= 6 AND S9_9_5_M <=11 group by nom_dd ) as C5 on DEP.ccdd  = C5.ccdd ) as table2
        on table0.ccdd = table2.ccdd 
        INNER JOIN
        (select 
        DEP.CCDD, DEPARTAMENTO, ( COALESCE(C1.t,0) + COALESCE(C2.t,0) + COALESCE(C3.t,0) +  COALESCE(C4.t,0) +  COALESCE(C5.t,0) ) AS _1_2_ANOS
        from (select  distinct(departamento), ccdd from departamentos_tab order by departamento) as DEP 
        left join (select ccdd,  count(*) as t  from pescador a inner join pesc_seccion9 s on a.id = s.pescador_id  where S9_9_1_A >=1 AND S9_9_1_A <= 2 group by nom_dd ) as C1 on DEP.ccdd  = C1.ccdd 
        left join (select ccdd,  count(*) as t  from pescador a inner join pesc_seccion9 s on a.id = s.pescador_id  where S9_9_2_A >=1 AND S9_9_2_A <= 2 group by nom_dd ) as C2 on DEP.ccdd  = C2.ccdd 
        left join (select ccdd,  count(*) as t  from pescador a inner join pesc_seccion9 s on a.id = s.pescador_id  where S9_9_3_A >=1 AND S9_9_3_A <= 2 group by nom_dd ) as C3 on DEP.ccdd  = C3.ccdd 
        left join (select ccdd,  count(*) as t  from pescador a inner join pesc_seccion9 s on a.id = s.pescador_id  where S9_9_4_A >=1 AND S9_9_4_A <= 2 group by nom_dd ) as C4 on DEP.ccdd  = C4.ccdd 
        left join (select ccdd,  count(*) as t  from pescador a inner join pesc_seccion9 s on a.id = s.pescador_id  where S9_9_5_A >=1 AND S9_9_5_A <= 2 group by nom_dd ) as C5 on DEP.ccdd  = C5.ccdd ) as table3
        on table0.ccdd = table3.ccdd 
        INNER JOIN
        (select 
        DEP.CCDD, DEPARTAMENTO, ( COALESCE(C1.t,0) + COALESCE(C2.t,0) + COALESCE(C3.t,0) +  COALESCE(C4.t,0) +  COALESCE(C5.t,0) ) AS _3_4_ANOS
        from (select  distinct(departamento), ccdd from departamentos_tab order by departamento) as DEP 
        left join (select ccdd,  count(*) as t  from pescador a inner join pesc_seccion9 s on a.id = s.pescador_id  where S9_9_1_A >= 3 AND  S9_9_1_A <= 4  group by nom_dd ) as C1 on DEP.ccdd  = C1.ccdd 
        left join (select ccdd,  count(*) as t  from pescador a inner join pesc_seccion9 s on a.id = s.pescador_id  where S9_9_2_A >= 3 AND  S9_9_2_A <= 4  group by nom_dd ) as C2 on DEP.ccdd  = C2.ccdd 
        left join (select ccdd,  count(*) as t  from pescador a inner join pesc_seccion9 s on a.id = s.pescador_id  where S9_9_3_A >= 3 AND  S9_9_3_A <= 4  group by nom_dd ) as C3 on DEP.ccdd  = C3.ccdd 
        left join (select ccdd,  count(*) as t  from pescador a inner join pesc_seccion9 s on a.id = s.pescador_id  where S9_9_4_A >= 3 AND  S9_9_4_A <= 4  group by nom_dd ) as C4 on DEP.ccdd  = C4.ccdd 
        left join (select ccdd,  count(*) as t  from pescador a inner join pesc_seccion9 s on a.id = s.pescador_id  where S9_9_5_A >= 3 AND  S9_9_5_A <= 4  group by nom_dd ) as C5 on DEP.ccdd  = C5.ccdd ) as table4
        on table0.ccdd = table4.ccdd 
        INNER JOIN
        (select 
        DEP.CCDD, DEPARTAMENTO, ( COALESCE(C1.t,0) + COALESCE(C2.t,0) + COALESCE(C3.t,0) +  COALESCE(C4.t,0) +  COALESCE(C5.t,0) ) AS _5_MAS
        from (select  distinct(departamento), ccdd from departamentos_tab order by departamento) as DEP 
        left join (select ccdd,  count(*) as t  from pescador a inner join pesc_seccion9 s on a.id = s.pescador_id  where S9_9_1_A >= 5 AND S9_9_1_A < 99 group by nom_dd ) as C1 on DEP.ccdd  = C1.ccdd 
        left join (select ccdd,  count(*) as t  from pescador a inner join pesc_seccion9 s on a.id = s.pescador_id  where S9_9_2_A >= 5 AND S9_9_2_A < 99 group by nom_dd ) as C2 on DEP.ccdd  = C2.ccdd 
        left join (select ccdd,  count(*) as t  from pescador a inner join pesc_seccion9 s on a.id = s.pescador_id  where S9_9_3_A >= 5 AND S9_9_3_A < 99 group by nom_dd ) as C3 on DEP.ccdd  = C3.ccdd 
        left join (select ccdd,  count(*) as t  from pescador a inner join pesc_seccion9 s on a.id = s.pescador_id  where S9_9_4_A >= 5 AND S9_9_4_A < 99 group by nom_dd ) as C4 on DEP.ccdd  = C4.ccdd 
        left join (select ccdd,  count(*) as t  from pescador a inner join pesc_seccion9 s on a.id = s.pescador_id  where S9_9_5_A >= 5 AND S9_9_5_A < 99 group by nom_dd ) as C5 on DEP.ccdd  = C5.ccdd ) as table5
        on table0.ccdd = table5.ccdd 
        INNER JOIN
        (select 
        DEP.CCDD, DEPARTAMENTO, ( COALESCE(C1.t,0) + COALESCE(C2.t,0) + COALESCE(C3.t,0) +  COALESCE(C4.t,0) +  COALESCE(C5.t,0) ) AS NEP
        from (select  distinct(departamento), ccdd from departamentos_tab order by departamento) as DEP 
        left join (select ccdd,  count(*) as t  from pescador a inner join pesc_seccion9 s on a.id = s.pescador_id  where S9_9_1_A = 99 AND S9_9_1_M = 99  group by nom_dd ) as C1 on DEP.ccdd  = C1.ccdd 
        left join (select ccdd,  count(*) as t  from pescador a inner join pesc_seccion9 s on a.id = s.pescador_id  where S9_9_2_A = 99 AND S9_9_2_M = 99  group by nom_dd ) as C2 on DEP.ccdd  = C2.ccdd 
        left join (select ccdd,  count(*) as t  from pescador a inner join pesc_seccion9 s on a.id = s.pescador_id  where S9_9_3_A = 99 AND S9_9_3_M = 99  group by nom_dd ) as C3 on DEP.ccdd  = C3.ccdd 
        left join (select ccdd,  count(*) as t  from pescador a inner join pesc_seccion9 s on a.id = s.pescador_id  where S9_9_4_A = 99 AND S9_9_4_M = 99  group by nom_dd ) as C4 on DEP.ccdd  = C4.ccdd 
        left join (select ccdd,  count(*) as t  from pescador a inner join pesc_seccion9 s on a.id = s.pescador_id  where S9_9_5_A = 99 AND S9_9_5_M = 99  group by nom_dd ) as C5 on DEP.ccdd  = C5.ccdd ) as table6
        on table0.ccdd = table6.ccdd 
        ");
    return $q;
}

function get_report93(){
    $q = $this->db->query("
        /* TABULADO N° 91 --------------------------  EMBARCACION  PERMISO : -------------------------*/
        SELECT  table0.CCDD, table0.DEPARTAMENTO,  TOTAL,
        _SI , _NO , NEP    FROM
        (select 
        DEP.CCDD, DEPARTAMENTO, ( COALESCE(C1.t,0) + COALESCE(C2.t,0) + COALESCE(C3.t,0) +  COALESCE(C4.t,0) +  COALESCE(C5.t,0) ) AS TOTAL
        from (select  distinct(departamento), ccdd from departamentos_tab order by departamento) as DEP 
        left join (select ccdd,  count(*) as t  from pescador a inner join pesc_seccion9 s on a.id = s.pescador_id  where S9_11_1 IS NOT NULL group by nom_dd ) as C1 on DEP.ccdd  = C1.ccdd 
        left join (select ccdd,  count(*) as t  from pescador a inner join pesc_seccion9 s on a.id = s.pescador_id  where S9_11_2 IS NOT NULL group by nom_dd ) as C2 on DEP.ccdd  = C2.ccdd 
        left join (select ccdd,  count(*) as t  from pescador a inner join pesc_seccion9 s on a.id = s.pescador_id  where S9_11_3 IS NOT NULL group by nom_dd ) as C3 on DEP.ccdd  = C3.ccdd 
        left join (select ccdd,  count(*) as t  from pescador a inner join pesc_seccion9 s on a.id = s.pescador_id  where S9_11_4 IS NOT NULL group by nom_dd ) as C4 on DEP.ccdd  = C4.ccdd 
        left join (select ccdd,  count(*) as t  from pescador a inner join pesc_seccion9 s on a.id = s.pescador_id  where S9_11_5 IS NOT NULL group by nom_dd ) as C5 on DEP.ccdd  = C5.ccdd ) as table0
        INNER JOIN
        (select 
        DEP.CCDD, DEPARTAMENTO,  ( COALESCE(C1.t,0) + COALESCE(C2.t,0) + COALESCE(C3.t,0) +  COALESCE(C4.t,0) +  COALESCE(C5.t,0) ) AS _SI
        from (select  distinct(departamento), ccdd from departamentos_tab order by departamento) as DEP 
        left join (select ccdd,  count(*) as t  from pescador a inner join pesc_seccion9 s on a.id = s.pescador_id  where S9_11_1 = 1 group by nom_dd ) as C1 on DEP.ccdd  = C1.ccdd 
        left join (select ccdd,  count(*) as t  from pescador a inner join pesc_seccion9 s on a.id = s.pescador_id  where S9_11_2 = 1 group by nom_dd ) as C2 on DEP.ccdd  = C2.ccdd 
        left join (select ccdd,  count(*) as t  from pescador a inner join pesc_seccion9 s on a.id = s.pescador_id  where S9_11_3 = 1 group by nom_dd ) as C3 on DEP.ccdd  = C3.ccdd 
        left join (select ccdd,  count(*) as t  from pescador a inner join pesc_seccion9 s on a.id = s.pescador_id  where S9_11_4 = 1 group by nom_dd ) as C4 on DEP.ccdd  = C4.ccdd 
        left join (select ccdd,  count(*) as t  from pescador a inner join pesc_seccion9 s on a.id = s.pescador_id  where S9_11_5 = 1 group by nom_dd ) as C5 on DEP.ccdd  = C5.ccdd ) as table1
        on table0.ccdd = table1.ccdd 
        INNER JOIN
        (select 
        DEP.CCDD, DEPARTAMENTO, ( COALESCE(C1.t,0) + COALESCE(C2.t,0) + COALESCE(C3.t,0) +  COALESCE(C4.t,0) +  COALESCE(C5.t,0) ) AS _NO
        from (select  distinct(departamento), ccdd from departamentos_tab order by departamento) as DEP 
        left join (select ccdd,  count(*) as t  from pescador a inner join pesc_seccion9 s on a.id = s.pescador_id  where S9_11_1 = 2 group by nom_dd ) as C1 on DEP.ccdd  = C1.ccdd 
        left join (select ccdd,  count(*) as t  from pescador a inner join pesc_seccion9 s on a.id = s.pescador_id  where S9_11_2 = 2 group by nom_dd ) as C2 on DEP.ccdd  = C2.ccdd 
        left join (select ccdd,  count(*) as t  from pescador a inner join pesc_seccion9 s on a.id = s.pescador_id  where S9_11_3 = 2 group by nom_dd ) as C3 on DEP.ccdd  = C3.ccdd 
        left join (select ccdd,  count(*) as t  from pescador a inner join pesc_seccion9 s on a.id = s.pescador_id  where S9_11_4 = 2 group by nom_dd ) as C4 on DEP.ccdd  = C4.ccdd 
        left join (select ccdd,  count(*) as t  from pescador a inner join pesc_seccion9 s on a.id = s.pescador_id  where S9_11_5 = 2 group by nom_dd ) as C5 on DEP.ccdd  = C5.ccdd ) as table2
        on table0.ccdd = table2.ccdd 
        INNER JOIN
        (select 
        DEP.CCDD, DEPARTAMENTO, ( COALESCE(C1.t,0) + COALESCE(C2.t,0) + COALESCE(C3.t,0) +  COALESCE(C4.t,0) +  COALESCE(C5.t,0) ) AS NEP
        from (select  distinct(departamento), ccdd from departamentos_tab order by departamento) as DEP 
        left join (select ccdd,  count(*) as t  from pescador a inner join pesc_seccion9 s on a.id = s.pescador_id  where S9_11_1 = 9 group by nom_dd ) as C1 on DEP.ccdd  = C1.ccdd 
        left join (select ccdd,  count(*) as t  from pescador a inner join pesc_seccion9 s on a.id = s.pescador_id  where S9_11_2 = 9 group by nom_dd ) as C2 on DEP.ccdd  = C2.ccdd 
        left join (select ccdd,  count(*) as t  from pescador a inner join pesc_seccion9 s on a.id = s.pescador_id  where S9_11_3 = 9 group by nom_dd ) as C3 on DEP.ccdd  = C3.ccdd 
        left join (select ccdd,  count(*) as t  from pescador a inner join pesc_seccion9 s on a.id = s.pescador_id  where S9_11_4 = 9 group by nom_dd ) as C4 on DEP.ccdd  = C4.ccdd 
        left join (select ccdd,  count(*) as t  from pescador a inner join pesc_seccion9 s on a.id = s.pescador_id  where S9_11_5 = 9 group by nom_dd ) as C5 on DEP.ccdd  = C5.ccdd ) as table3
        on table0.ccdd = table3.ccdd ;
        ");
    return $q;
}

function get_report94(){
    $q = $this->db->query("
        /* TABULADO N° 94 --------------------------  EMBARCACION  PROTOCOLO : -------------------------*/
        SELECT  table0.CCDD, table0.DEPARTAMENTO,  TOTAL,
        _SI , _NO , NEP    FROM
        (select 
        DEP.CCDD, DEPARTAMENTO, ( COALESCE(C1.t,0) + COALESCE(C2.t,0) + COALESCE(C3.t,0) +  COALESCE(C4.t,0) +  COALESCE(C5.t,0) ) AS TOTAL
        from (select  distinct(departamento), ccdd from departamentos_tab order by departamento) as DEP 
        left join (select ccdd,  count(*) as t  from pescador a inner join pesc_seccion9 s on a.id = s.pescador_id  where S9_12_1 IS NOT NULL group by nom_dd ) as C1 on DEP.ccdd  = C1.ccdd 
        left join (select ccdd,  count(*) as t  from pescador a inner join pesc_seccion9 s on a.id = s.pescador_id  where S9_12_2 IS NOT NULL group by nom_dd ) as C2 on DEP.ccdd  = C2.ccdd 
        left join (select ccdd,  count(*) as t  from pescador a inner join pesc_seccion9 s on a.id = s.pescador_id  where S9_12_3 IS NOT NULL group by nom_dd ) as C3 on DEP.ccdd  = C3.ccdd 
        left join (select ccdd,  count(*) as t  from pescador a inner join pesc_seccion9 s on a.id = s.pescador_id  where S9_12_4 IS NOT NULL group by nom_dd ) as C4 on DEP.ccdd  = C4.ccdd 
        left join (select ccdd,  count(*) as t  from pescador a inner join pesc_seccion9 s on a.id = s.pescador_id  where S9_12_5 IS NOT NULL group by nom_dd ) as C5 on DEP.ccdd  = C5.ccdd ) as table0
        INNER JOIN
        (select 
        DEP.CCDD, DEPARTAMENTO,  ( COALESCE(C1.t,0) + COALESCE(C2.t,0) + COALESCE(C3.t,0) +  COALESCE(C4.t,0) +  COALESCE(C5.t,0) ) AS _SI
        from (select  distinct(departamento), ccdd from departamentos_tab order by departamento) as DEP 
        left join (select ccdd,  count(*) as t  from pescador a inner join pesc_seccion9 s on a.id = s.pescador_id  where S9_12_1 = 1 group by nom_dd ) as C1 on DEP.ccdd  = C1.ccdd 
        left join (select ccdd,  count(*) as t  from pescador a inner join pesc_seccion9 s on a.id = s.pescador_id  where S9_12_2 = 1 group by nom_dd ) as C2 on DEP.ccdd  = C2.ccdd 
        left join (select ccdd,  count(*) as t  from pescador a inner join pesc_seccion9 s on a.id = s.pescador_id  where S9_12_3 = 1 group by nom_dd ) as C3 on DEP.ccdd  = C3.ccdd 
        left join (select ccdd,  count(*) as t  from pescador a inner join pesc_seccion9 s on a.id = s.pescador_id  where S9_12_4 = 1 group by nom_dd ) as C4 on DEP.ccdd  = C4.ccdd 
        left join (select ccdd,  count(*) as t  from pescador a inner join pesc_seccion9 s on a.id = s.pescador_id  where S9_12_5 = 1 group by nom_dd ) as C5 on DEP.ccdd  = C5.ccdd ) as table1
        on table0.ccdd = table1.ccdd 
        INNER JOIN
        (select 
        DEP.CCDD, DEPARTAMENTO, ( COALESCE(C1.t,0) + COALESCE(C2.t,0) + COALESCE(C3.t,0) +  COALESCE(C4.t,0) +  COALESCE(C5.t,0) ) AS _NO
        from (select  distinct(departamento), ccdd from departamentos_tab order by departamento) as DEP 
        left join (select ccdd,  count(*) as t  from pescador a inner join pesc_seccion9 s on a.id = s.pescador_id  where S9_12_1 = 2 group by nom_dd ) as C1 on DEP.ccdd  = C1.ccdd 
        left join (select ccdd,  count(*) as t  from pescador a inner join pesc_seccion9 s on a.id = s.pescador_id  where S9_12_2 = 2 group by nom_dd ) as C2 on DEP.ccdd  = C2.ccdd 
        left join (select ccdd,  count(*) as t  from pescador a inner join pesc_seccion9 s on a.id = s.pescador_id  where S9_12_3 = 2 group by nom_dd ) as C3 on DEP.ccdd  = C3.ccdd 
        left join (select ccdd,  count(*) as t  from pescador a inner join pesc_seccion9 s on a.id = s.pescador_id  where S9_12_4 = 2 group by nom_dd ) as C4 on DEP.ccdd  = C4.ccdd 
        left join (select ccdd,  count(*) as t  from pescador a inner join pesc_seccion9 s on a.id = s.pescador_id  where S9_12_5 = 2 group by nom_dd ) as C5 on DEP.ccdd  = C5.ccdd ) as table2
        on table0.ccdd = table2.ccdd 
        INNER JOIN
        (select 
        DEP.CCDD, DEPARTAMENTO, ( COALESCE(C1.t,0) + COALESCE(C2.t,0) + COALESCE(C3.t,0) +  COALESCE(C4.t,0) +  COALESCE(C5.t,0) ) AS NEP
        from (select  distinct(departamento), ccdd from departamentos_tab order by departamento) as DEP 
        left join (select ccdd,  count(*) as t  from pescador a inner join pesc_seccion9 s on a.id = s.pescador_id  where S9_12_1 = 9 group by nom_dd ) as C1 on DEP.ccdd  = C1.ccdd 
        left join (select ccdd,  count(*) as t  from pescador a inner join pesc_seccion9 s on a.id = s.pescador_id  where S9_12_2 = 9 group by nom_dd ) as C2 on DEP.ccdd  = C2.ccdd 
        left join (select ccdd,  count(*) as t  from pescador a inner join pesc_seccion9 s on a.id = s.pescador_id  where S9_12_3 = 9 group by nom_dd ) as C3 on DEP.ccdd  = C3.ccdd 
        left join (select ccdd,  count(*) as t  from pescador a inner join pesc_seccion9 s on a.id = s.pescador_id  where S9_12_4 = 9 group by nom_dd ) as C4 on DEP.ccdd  = C4.ccdd 
        left join (select ccdd,  count(*) as t  from pescador a inner join pesc_seccion9 s on a.id = s.pescador_id  where S9_12_5 = 9 group by nom_dd ) as C5 on DEP.ccdd  = C5.ccdd ) as table3
        on table0.ccdd = table3.ccdd ;
        ");
    return $q;
}


function get_report95(){
    $q = $this->db->query("
        /* TABULADO N° 95 --------------------------  EMBARCACION  PROTOCOLO : -------------------------*/
        SELECT  table0.CCDD, table0.DEPARTAMENTO,  TOTAL,
        _SI , _NO , NEP    FROM
        (select 
        DEP.CCDD, DEPARTAMENTO, ( COALESCE(C1.t,0) + COALESCE(C2.t,0) + COALESCE(C3.t,0) +  COALESCE(C4.t,0) +  COALESCE(C5.t,0) ) AS TOTAL
        from (select  distinct(departamento), ccdd from departamentos_tab order by departamento) as DEP 
        left join (select ccdd,  count(*) as t  from pescador a inner join pesc_seccion9 s on a.id = s.pescador_id  where S9_13_1 IS NOT NULL group by nom_dd ) as C1 on DEP.ccdd  = C1.ccdd 
        left join (select ccdd,  count(*) as t  from pescador a inner join pesc_seccion9 s on a.id = s.pescador_id  where S9_13_2 IS NOT NULL group by nom_dd ) as C2 on DEP.ccdd  = C2.ccdd 
        left join (select ccdd,  count(*) as t  from pescador a inner join pesc_seccion9 s on a.id = s.pescador_id  where S9_13_3 IS NOT NULL group by nom_dd ) as C3 on DEP.ccdd  = C3.ccdd 
        left join (select ccdd,  count(*) as t  from pescador a inner join pesc_seccion9 s on a.id = s.pescador_id  where S9_13_4 IS NOT NULL group by nom_dd ) as C4 on DEP.ccdd  = C4.ccdd 
        left join (select ccdd,  count(*) as t  from pescador a inner join pesc_seccion9 s on a.id = s.pescador_id  where S9_13_5 IS NOT NULL group by nom_dd ) as C5 on DEP.ccdd  = C5.ccdd ) as table0
        INNER JOIN
        (select 
        DEP.CCDD, DEPARTAMENTO,  ( COALESCE(C1.t,0) + COALESCE(C2.t,0) + COALESCE(C3.t,0) +  COALESCE(C4.t,0) +  COALESCE(C5.t,0) ) AS _SI
        from (select  distinct(departamento), ccdd from departamentos_tab order by departamento) as DEP 
        left join (select ccdd,  count(*) as t  from pescador a inner join pesc_seccion9 s on a.id = s.pescador_id  where S9_13_1 = 1 group by nom_dd ) as C1 on DEP.ccdd  = C1.ccdd 
        left join (select ccdd,  count(*) as t  from pescador a inner join pesc_seccion9 s on a.id = s.pescador_id  where S9_13_2 = 1 group by nom_dd ) as C2 on DEP.ccdd  = C2.ccdd 
        left join (select ccdd,  count(*) as t  from pescador a inner join pesc_seccion9 s on a.id = s.pescador_id  where S9_13_3 = 1 group by nom_dd ) as C3 on DEP.ccdd  = C3.ccdd 
        left join (select ccdd,  count(*) as t  from pescador a inner join pesc_seccion9 s on a.id = s.pescador_id  where S9_13_4 = 1 group by nom_dd ) as C4 on DEP.ccdd  = C4.ccdd 
        left join (select ccdd,  count(*) as t  from pescador a inner join pesc_seccion9 s on a.id = s.pescador_id  where S9_13_5 = 1 group by nom_dd ) as C5 on DEP.ccdd  = C5.ccdd ) as table1
        on table0.ccdd = table1.ccdd 
        INNER JOIN
        (select 
        DEP.CCDD, DEPARTAMENTO, ( COALESCE(C1.t,0) + COALESCE(C2.t,0) + COALESCE(C3.t,0) +  COALESCE(C4.t,0) +  COALESCE(C5.t,0) ) AS _NO
        from (select  distinct(departamento), ccdd from departamentos_tab order by departamento) as DEP 
        left join (select ccdd,  count(*) as t  from pescador a inner join pesc_seccion9 s on a.id = s.pescador_id  where S9_13_1 = 2 group by nom_dd ) as C1 on DEP.ccdd  = C1.ccdd 
        left join (select ccdd,  count(*) as t  from pescador a inner join pesc_seccion9 s on a.id = s.pescador_id  where S9_13_2 = 2 group by nom_dd ) as C2 on DEP.ccdd  = C2.ccdd 
        left join (select ccdd,  count(*) as t  from pescador a inner join pesc_seccion9 s on a.id = s.pescador_id  where S9_13_3 = 2 group by nom_dd ) as C3 on DEP.ccdd  = C3.ccdd 
        left join (select ccdd,  count(*) as t  from pescador a inner join pesc_seccion9 s on a.id = s.pescador_id  where S9_13_4 = 2 group by nom_dd ) as C4 on DEP.ccdd  = C4.ccdd 
        left join (select ccdd,  count(*) as t  from pescador a inner join pesc_seccion9 s on a.id = s.pescador_id  where S9_13_5 = 2 group by nom_dd ) as C5 on DEP.ccdd  = C5.ccdd ) as table2
        on table0.ccdd = table2.ccdd 
        INNER JOIN
        (select 
        DEP.CCDD, DEPARTAMENTO, ( COALESCE(C1.t,0) + COALESCE(C2.t,0) + COALESCE(C3.t,0) +  COALESCE(C4.t,0) +  COALESCE(C5.t,0) ) AS NEP
        from (select  distinct(departamento), ccdd from departamentos_tab order by departamento) as DEP 
        left join (select ccdd,  count(*) as t  from pescador a inner join pesc_seccion9 s on a.id = s.pescador_id  where S9_13_1 = 9 group by nom_dd ) as C1 on DEP.ccdd  = C1.ccdd 
        left join (select ccdd,  count(*) as t  from pescador a inner join pesc_seccion9 s on a.id = s.pescador_id  where S9_13_2 = 9 group by nom_dd ) as C2 on DEP.ccdd  = C2.ccdd 
        left join (select ccdd,  count(*) as t  from pescador a inner join pesc_seccion9 s on a.id = s.pescador_id  where S9_13_3 = 9 group by nom_dd ) as C3 on DEP.ccdd  = C3.ccdd 
        left join (select ccdd,  count(*) as t  from pescador a inner join pesc_seccion9 s on a.id = s.pescador_id  where S9_13_4 = 9 group by nom_dd ) as C4 on DEP.ccdd  = C4.ccdd 
        left join (select ccdd,  count(*) as t  from pescador a inner join pesc_seccion9 s on a.id = s.pescador_id  where S9_13_5 = 9 group by nom_dd ) as C5 on DEP.ccdd  = C5.ccdd ) as table3
        on table0.ccdd = table3.ccdd ;
        ");
    return $q;
}


function get_report96(){
    $q = $this->db->query("
        /* TABULADO N° 96 --------------------------  SE DESPLAZA : -------------------------*/
        SELECT  table0.CCDD, table0.DEPARTAMENTO,  TOTAL,
        REMO , VELA , MOTOR ,  NEP    FROM
        (select 
        DEP.CCDD, DEPARTAMENTO, ( COALESCE(C1.t,0) + COALESCE(C2.t,0) + COALESCE(C3.t,0) +  COALESCE(C4.t,0) +  COALESCE(C5.t,0) ) AS TOTAL
        from (select  distinct(departamento), ccdd from departamentos_tab order by departamento) as DEP 
        left join (select ccdd,  count(*) as t  from pescador a inner join pesc_seccion9 s on a.id = s.pescador_id  where S9_15_1 IS NOT NULL group by nom_dd ) as C1 on DEP.ccdd  = C1.ccdd 
        left join (select ccdd,  count(*) as t  from pescador a inner join pesc_seccion9 s on a.id = s.pescador_id  where S9_15_2 IS NOT NULL group by nom_dd ) as C2 on DEP.ccdd  = C2.ccdd 
        left join (select ccdd,  count(*) as t  from pescador a inner join pesc_seccion9 s on a.id = s.pescador_id  where S9_15_3 IS NOT NULL group by nom_dd ) as C3 on DEP.ccdd  = C3.ccdd 
        left join (select ccdd,  count(*) as t  from pescador a inner join pesc_seccion9 s on a.id = s.pescador_id  where S9_15_4 IS NOT NULL group by nom_dd ) as C4 on DEP.ccdd  = C4.ccdd 
        left join (select ccdd,  count(*) as t  from pescador a inner join pesc_seccion9 s on a.id = s.pescador_id  where S9_15_5 IS NOT NULL group by nom_dd ) as C5 on DEP.ccdd  = C5.ccdd ) as table0
        INNER JOIN
        (select 
        DEP.CCDD, DEPARTAMENTO,  ( COALESCE(C1.t,0) + COALESCE(C2.t,0) + COALESCE(C3.t,0) +  COALESCE(C4.t,0) +  COALESCE(C5.t,0) ) AS REMO
        from (select  distinct(departamento), ccdd from departamentos_tab order by departamento) as DEP 
        left join (select ccdd,  count(*) as t  from pescador a inner join pesc_seccion9 s on a.id = s.pescador_id  where S9_15_1 = 1 group by nom_dd ) as C1 on DEP.ccdd  = C1.ccdd 
        left join (select ccdd,  count(*) as t  from pescador a inner join pesc_seccion9 s on a.id = s.pescador_id  where S9_15_2 = 1 group by nom_dd ) as C2 on DEP.ccdd  = C2.ccdd 
        left join (select ccdd,  count(*) as t  from pescador a inner join pesc_seccion9 s on a.id = s.pescador_id  where S9_15_3 = 1 group by nom_dd ) as C3 on DEP.ccdd  = C3.ccdd 
        left join (select ccdd,  count(*) as t  from pescador a inner join pesc_seccion9 s on a.id = s.pescador_id  where S9_15_4 = 1 group by nom_dd ) as C4 on DEP.ccdd  = C4.ccdd 
        left join (select ccdd,  count(*) as t  from pescador a inner join pesc_seccion9 s on a.id = s.pescador_id  where S9_15_5 = 1 group by nom_dd ) as C5 on DEP.ccdd  = C5.ccdd ) as table1
        on table0.ccdd = table1.ccdd 
        INNER JOIN
        (select 
        DEP.CCDD, DEPARTAMENTO, ( COALESCE(C1.t,0) + COALESCE(C2.t,0) + COALESCE(C3.t,0) +  COALESCE(C4.t,0) +  COALESCE(C5.t,0) ) AS VELA
        from (select  distinct(departamento), ccdd from departamentos_tab order by departamento) as DEP 
        left join (select ccdd,  count(*) as t  from pescador a inner join pesc_seccion9 s on a.id = s.pescador_id  where S9_15_1 = 2 group by nom_dd ) as C1 on DEP.ccdd  = C1.ccdd 
        left join (select ccdd,  count(*) as t  from pescador a inner join pesc_seccion9 s on a.id = s.pescador_id  where S9_15_2 = 2 group by nom_dd ) as C2 on DEP.ccdd  = C2.ccdd 
        left join (select ccdd,  count(*) as t  from pescador a inner join pesc_seccion9 s on a.id = s.pescador_id  where S9_15_3 = 2 group by nom_dd ) as C3 on DEP.ccdd  = C3.ccdd 
        left join (select ccdd,  count(*) as t  from pescador a inner join pesc_seccion9 s on a.id = s.pescador_id  where S9_15_4 = 2 group by nom_dd ) as C4 on DEP.ccdd  = C4.ccdd 
        left join (select ccdd,  count(*) as t  from pescador a inner join pesc_seccion9 s on a.id = s.pescador_id  where S9_15_5 = 2 group by nom_dd ) as C5 on DEP.ccdd  = C5.ccdd ) as table2
        on table0.ccdd = table2.ccdd 
        INNER JOIN
        (select 
        DEP.CCDD, DEPARTAMENTO, ( COALESCE(C1.t,0) + COALESCE(C2.t,0) + COALESCE(C3.t,0) +  COALESCE(C4.t,0) +  COALESCE(C5.t,0) ) AS MOTOR
        from (select  distinct(departamento), ccdd from departamentos_tab order by departamento) as DEP 
        left join (select ccdd,  count(*) as t  from pescador a inner join pesc_seccion9 s on a.id = s.pescador_id  where S9_15_1 = 3 group by nom_dd ) as C1 on DEP.ccdd  = C1.ccdd 
        left join (select ccdd,  count(*) as t  from pescador a inner join pesc_seccion9 s on a.id = s.pescador_id  where S9_15_2 = 3 group by nom_dd ) as C2 on DEP.ccdd  = C2.ccdd 
        left join (select ccdd,  count(*) as t  from pescador a inner join pesc_seccion9 s on a.id = s.pescador_id  where S9_15_3 = 3 group by nom_dd ) as C3 on DEP.ccdd  = C3.ccdd 
        left join (select ccdd,  count(*) as t  from pescador a inner join pesc_seccion9 s on a.id = s.pescador_id  where S9_15_4 = 3 group by nom_dd ) as C4 on DEP.ccdd  = C4.ccdd 
        left join (select ccdd,  count(*) as t  from pescador a inner join pesc_seccion9 s on a.id = s.pescador_id  where S9_15_5 = 3 group by nom_dd ) as C5 on DEP.ccdd  = C5.ccdd ) as table3
        on table0.ccdd = table3.ccdd 
        INNER JOIN
        (select 
        DEP.CCDD, DEPARTAMENTO, ( COALESCE(C1.t,0) + COALESCE(C2.t,0) + COALESCE(C3.t,0) +  COALESCE(C4.t,0) +  COALESCE(C5.t,0) ) AS NEP
        from (select  distinct(departamento), ccdd from departamentos_tab order by departamento) as DEP 
        left join (select ccdd,  count(*) as t  from pescador a inner join pesc_seccion9 s on a.id = s.pescador_id  where S9_15_1 = 9 group by nom_dd ) as C1 on DEP.ccdd  = C1.ccdd 
        left join (select ccdd,  count(*) as t  from pescador a inner join pesc_seccion9 s on a.id = s.pescador_id  where S9_15_2 = 9 group by nom_dd ) as C2 on DEP.ccdd  = C2.ccdd 
        left join (select ccdd,  count(*) as t  from pescador a inner join pesc_seccion9 s on a.id = s.pescador_id  where S9_15_3 = 9 group by nom_dd ) as C3 on DEP.ccdd  = C3.ccdd 
        left join (select ccdd,  count(*) as t  from pescador a inner join pesc_seccion9 s on a.id = s.pescador_id  where S9_15_4 = 9 group by nom_dd ) as C4 on DEP.ccdd  = C4.ccdd 
        left join (select ccdd,  count(*) as t  from pescador a inner join pesc_seccion9 s on a.id = s.pescador_id  where S9_15_5 = 9 group by nom_dd ) as C5 on DEP.ccdd  = C5.ccdd ) as table4
        on table0.ccdd = table4.ccdd ;
        ");
    return $q;
}

function get_report97(){
    $q = $this->db->query("
        /* TABULADO N° 95 --------------------------  EMBARCACION  MOTOR : -------------------------*/
        SELECT  table0.CCDD, table0.DEPARTAMENTO,  TOTAL,
        MARINO , AUTOMOTRIZ , NEP    FROM
        (select 
        DEP.CCDD, DEPARTAMENTO, ( COALESCE(C1.t,0) + COALESCE(C2.t,0) + COALESCE(C3.t,0) +  COALESCE(C4.t,0) +  COALESCE(C5.t,0) ) AS TOTAL
        from (select  distinct(departamento), ccdd from departamentos_tab order by departamento) as DEP 
        left join (select ccdd,  count(*) as t  from pescador a inner join pesc_seccion9 s on a.id = s.pescador_id  where S9_16_1 IS NOT NULL group by nom_dd ) as C1 on DEP.ccdd  = C1.ccdd 
        left join (select ccdd,  count(*) as t  from pescador a inner join pesc_seccion9 s on a.id = s.pescador_id  where S9_16_2 IS NOT NULL group by nom_dd ) as C2 on DEP.ccdd  = C2.ccdd 
        left join (select ccdd,  count(*) as t  from pescador a inner join pesc_seccion9 s on a.id = s.pescador_id  where S9_16_3 IS NOT NULL group by nom_dd ) as C3 on DEP.ccdd  = C3.ccdd 
        left join (select ccdd,  count(*) as t  from pescador a inner join pesc_seccion9 s on a.id = s.pescador_id  where S9_16_4 IS NOT NULL group by nom_dd ) as C4 on DEP.ccdd  = C4.ccdd 
        left join (select ccdd,  count(*) as t  from pescador a inner join pesc_seccion9 s on a.id = s.pescador_id  where S9_16_5 IS NOT NULL group by nom_dd ) as C5 on DEP.ccdd  = C5.ccdd ) as table0
        INNER JOIN
        (select 
        DEP.CCDD, DEPARTAMENTO,  ( COALESCE(C1.t,0) + COALESCE(C2.t,0) + COALESCE(C3.t,0) +  COALESCE(C4.t,0) +  COALESCE(C5.t,0) ) AS MARINO
        from (select  distinct(departamento), ccdd from departamentos_tab order by departamento) as DEP 
        left join (select ccdd,  count(*) as t  from pescador a inner join pesc_seccion9 s on a.id = s.pescador_id  where S9_16_1 = 1 group by nom_dd ) as C1 on DEP.ccdd  = C1.ccdd 
        left join (select ccdd,  count(*) as t  from pescador a inner join pesc_seccion9 s on a.id = s.pescador_id  where S9_16_2 = 1 group by nom_dd ) as C2 on DEP.ccdd  = C2.ccdd 
        left join (select ccdd,  count(*) as t  from pescador a inner join pesc_seccion9 s on a.id = s.pescador_id  where S9_16_3 = 1 group by nom_dd ) as C3 on DEP.ccdd  = C3.ccdd 
        left join (select ccdd,  count(*) as t  from pescador a inner join pesc_seccion9 s on a.id = s.pescador_id  where S9_16_4 = 1 group by nom_dd ) as C4 on DEP.ccdd  = C4.ccdd 
        left join (select ccdd,  count(*) as t  from pescador a inner join pesc_seccion9 s on a.id = s.pescador_id  where S9_16_5 = 1 group by nom_dd ) as C5 on DEP.ccdd  = C5.ccdd ) as table1
        on table0.ccdd = table1.ccdd 
        INNER JOIN
        (select 
        DEP.CCDD, DEPARTAMENTO, ( COALESCE(C1.t,0) + COALESCE(C2.t,0) + COALESCE(C3.t,0) +  COALESCE(C4.t,0) +  COALESCE(C5.t,0) ) AS AUTOMOTRIZ
        from (select  distinct(departamento), ccdd from departamentos_tab order by departamento) as DEP 
        left join (select ccdd,  count(*) as t  from pescador a inner join pesc_seccion9 s on a.id = s.pescador_id  where S9_16_1 = 2 group by nom_dd ) as C1 on DEP.ccdd  = C1.ccdd 
        left join (select ccdd,  count(*) as t  from pescador a inner join pesc_seccion9 s on a.id = s.pescador_id  where S9_16_2 = 2 group by nom_dd ) as C2 on DEP.ccdd  = C2.ccdd 
        left join (select ccdd,  count(*) as t  from pescador a inner join pesc_seccion9 s on a.id = s.pescador_id  where S9_16_3 = 2 group by nom_dd ) as C3 on DEP.ccdd  = C3.ccdd 
        left join (select ccdd,  count(*) as t  from pescador a inner join pesc_seccion9 s on a.id = s.pescador_id  where S9_16_4 = 2 group by nom_dd ) as C4 on DEP.ccdd  = C4.ccdd 
        left join (select ccdd,  count(*) as t  from pescador a inner join pesc_seccion9 s on a.id = s.pescador_id  where S9_16_5 = 2 group by nom_dd ) as C5 on DEP.ccdd  = C5.ccdd ) as table2
        on table0.ccdd = table2.ccdd 
        INNER JOIN
        (select 
        DEP.CCDD, DEPARTAMENTO, ( COALESCE(C1.t,0) + COALESCE(C2.t,0) + COALESCE(C3.t,0) +  COALESCE(C4.t,0) +  COALESCE(C5.t,0) ) AS NEP
        from (select  distinct(departamento), ccdd from departamentos_tab order by departamento) as DEP 
        left join (select ccdd,  count(*) as t  from pescador a inner join pesc_seccion9 s on a.id = s.pescador_id  where S9_16_1 = 9 group by nom_dd ) as C1 on DEP.ccdd  = C1.ccdd 
        left join (select ccdd,  count(*) as t  from pescador a inner join pesc_seccion9 s on a.id = s.pescador_id  where S9_16_2 = 9 group by nom_dd ) as C2 on DEP.ccdd  = C2.ccdd 
        left join (select ccdd,  count(*) as t  from pescador a inner join pesc_seccion9 s on a.id = s.pescador_id  where S9_16_3 = 9 group by nom_dd ) as C3 on DEP.ccdd  = C3.ccdd 
        left join (select ccdd,  count(*) as t  from pescador a inner join pesc_seccion9 s on a.id = s.pescador_id  where S9_16_4 = 9 group by nom_dd ) as C4 on DEP.ccdd  = C4.ccdd 
        left join (select ccdd,  count(*) as t  from pescador a inner join pesc_seccion9 s on a.id = s.pescador_id  where S9_16_5 = 9 group by nom_dd ) as C5 on DEP.ccdd  = C5.ccdd ) as table3
        on table0.ccdd = table3.ccdd ;
        ");
    return $q;
}


function get_report98(){
    $q = $this->db->query("
        /* TABULADO N° 98 --------------------------  EMBARCACION  TIPO COMBUSTIBLE : -------------------------*/
        SELECT  table0.CCDD, table0.DEPARTAMENTO,  TOTAL,
        GASOLINA , PETROLEO , NEP    FROM
        (select 
        DEP.CCDD, DEPARTAMENTO, ( COALESCE(C1.t,0) + COALESCE(C2.t,0) + COALESCE(C3.t,0) +  COALESCE(C4.t,0) +  COALESCE(C5.t,0) ) AS TOTAL
        from (select  distinct(departamento), ccdd from departamentos_tab order by departamento) as DEP 
        left join (select ccdd,  count(*) as t  from pescador a inner join pesc_seccion9 s on a.id = s.pescador_id  where S9_18_1 IS NOT NULL group by nom_dd ) as C1 on DEP.ccdd  = C1.ccdd 
        left join (select ccdd,  count(*) as t  from pescador a inner join pesc_seccion9 s on a.id = s.pescador_id  where S9_18_2 IS NOT NULL group by nom_dd ) as C2 on DEP.ccdd  = C2.ccdd 
        left join (select ccdd,  count(*) as t  from pescador a inner join pesc_seccion9 s on a.id = s.pescador_id  where S9_18_3 IS NOT NULL group by nom_dd ) as C3 on DEP.ccdd  = C3.ccdd 
        left join (select ccdd,  count(*) as t  from pescador a inner join pesc_seccion9 s on a.id = s.pescador_id  where S9_18_4 IS NOT NULL group by nom_dd ) as C4 on DEP.ccdd  = C4.ccdd 
        left join (select ccdd,  count(*) as t  from pescador a inner join pesc_seccion9 s on a.id = s.pescador_id  where S9_18_5 IS NOT NULL group by nom_dd ) as C5 on DEP.ccdd  = C5.ccdd ) as table0
        INNER JOIN
        (select 
        DEP.CCDD, DEPARTAMENTO,  ( COALESCE(C1.t,0) + COALESCE(C2.t,0) + COALESCE(C3.t,0) +  COALESCE(C4.t,0) +  COALESCE(C5.t,0) ) AS GASOLINA
        from (select  distinct(departamento), ccdd from departamentos_tab order by departamento) as DEP 
        left join (select ccdd,  count(*) as t  from pescador a inner join pesc_seccion9 s on a.id = s.pescador_id  where S9_18_1 = 1 group by nom_dd ) as C1 on DEP.ccdd  = C1.ccdd 
        left join (select ccdd,  count(*) as t  from pescador a inner join pesc_seccion9 s on a.id = s.pescador_id  where S9_18_2 = 1 group by nom_dd ) as C2 on DEP.ccdd  = C2.ccdd 
        left join (select ccdd,  count(*) as t  from pescador a inner join pesc_seccion9 s on a.id = s.pescador_id  where S9_18_3 = 1 group by nom_dd ) as C3 on DEP.ccdd  = C3.ccdd 
        left join (select ccdd,  count(*) as t  from pescador a inner join pesc_seccion9 s on a.id = s.pescador_id  where S9_18_4 = 1 group by nom_dd ) as C4 on DEP.ccdd  = C4.ccdd 
        left join (select ccdd,  count(*) as t  from pescador a inner join pesc_seccion9 s on a.id = s.pescador_id  where S9_18_5 = 1 group by nom_dd ) as C5 on DEP.ccdd  = C5.ccdd ) as table1
        on table0.ccdd = table1.ccdd 
        INNER JOIN
        (select 
        DEP.CCDD, DEPARTAMENTO, ( COALESCE(C1.t,0) + COALESCE(C2.t,0) + COALESCE(C3.t,0) +  COALESCE(C4.t,0) +  COALESCE(C5.t,0) ) AS PETROLEO
        from (select  distinct(departamento), ccdd from departamentos_tab order by departamento) as DEP 
        left join (select ccdd,  count(*) as t  from pescador a inner join pesc_seccion9 s on a.id = s.pescador_id  where S9_18_1 = 2 group by nom_dd ) as C1 on DEP.ccdd  = C1.ccdd 
        left join (select ccdd,  count(*) as t  from pescador a inner join pesc_seccion9 s on a.id = s.pescador_id  where S9_18_2 = 2 group by nom_dd ) as C2 on DEP.ccdd  = C2.ccdd 
        left join (select ccdd,  count(*) as t  from pescador a inner join pesc_seccion9 s on a.id = s.pescador_id  where S9_18_3 = 2 group by nom_dd ) as C3 on DEP.ccdd  = C3.ccdd 
        left join (select ccdd,  count(*) as t  from pescador a inner join pesc_seccion9 s on a.id = s.pescador_id  where S9_18_4 = 2 group by nom_dd ) as C4 on DEP.ccdd  = C4.ccdd 
        left join (select ccdd,  count(*) as t  from pescador a inner join pesc_seccion9 s on a.id = s.pescador_id  where S9_18_5 = 2 group by nom_dd ) as C5 on DEP.ccdd  = C5.ccdd ) as table2
        on table0.ccdd = table2.ccdd 
        INNER JOIN
        (select 
        DEP.CCDD, DEPARTAMENTO, ( COALESCE(C1.t,0) + COALESCE(C2.t,0) + COALESCE(C3.t,0) +  COALESCE(C4.t,0) +  COALESCE(C5.t,0) ) AS NEP
        from (select  distinct(departamento), ccdd from departamentos_tab order by departamento) as DEP 
        left join (select ccdd,  count(*) as t  from pescador a inner join pesc_seccion9 s on a.id = s.pescador_id  where S9_18_1 = 9 group by nom_dd ) as C1 on DEP.ccdd  = C1.ccdd 
        left join (select ccdd,  count(*) as t  from pescador a inner join pesc_seccion9 s on a.id = s.pescador_id  where S9_18_2 = 9 group by nom_dd ) as C2 on DEP.ccdd  = C2.ccdd 
        left join (select ccdd,  count(*) as t  from pescador a inner join pesc_seccion9 s on a.id = s.pescador_id  where S9_18_3 = 9 group by nom_dd ) as C3 on DEP.ccdd  = C3.ccdd 
        left join (select ccdd,  count(*) as t  from pescador a inner join pesc_seccion9 s on a.id = s.pescador_id  where S9_18_4 = 9 group by nom_dd ) as C4 on DEP.ccdd  = C4.ccdd 
        left join (select ccdd,  count(*) as t  from pescador a inner join pesc_seccion9 s on a.id = s.pescador_id  where S9_18_5 = 9 group by nom_dd ) as C5 on DEP.ccdd  = C5.ccdd ) as table3
        on table0.ccdd = table3.ccdd ;
        ");
    return $q;
}

function get_report99(){
    $q = $this->db->query("
        /* TABULADO N° 97 --------------------------  EMBARCACION TIPO BODEGA : -------------------------*/
        SELECT  table0.CCDD, table0.DEPARTAMENTO,  TOTAL,
        ABIERTO , TABICADO_A , TABICADO_C , CAJON , NEP    FROM
        (select 
        DEP.CCDD, DEPARTAMENTO, ( COALESCE(C1.t,0) + COALESCE(C2.t,0) + COALESCE(C3.t,0) +  COALESCE(C4.t,0) +  COALESCE(C5.t,0) ) AS TOTAL
        from (select  distinct(departamento), ccdd from departamentos_tab order by departamento) as DEP 
        left join (select ccdd,  count(*) as t  from pescador a inner join pesc_seccion9 s on a.id = s.pescador_id  where S9_20_1_T IS NOT NULL group by nom_dd ) as C1 on DEP.ccdd  = C1.ccdd 
        left join (select ccdd,  count(*) as t  from pescador a inner join pesc_seccion9 s on a.id = s.pescador_id  where S9_20_2_T IS NOT NULL group by nom_dd ) as C2 on DEP.ccdd  = C2.ccdd 
        left join (select ccdd,  count(*) as t  from pescador a inner join pesc_seccion9 s on a.id = s.pescador_id  where S9_20_3_T IS NOT NULL group by nom_dd ) as C3 on DEP.ccdd  = C3.ccdd 
        left join (select ccdd,  count(*) as t  from pescador a inner join pesc_seccion9 s on a.id = s.pescador_id  where S9_20_4_T IS NOT NULL group by nom_dd ) as C4 on DEP.ccdd  = C4.ccdd 
        left join (select ccdd,  count(*) as t  from pescador a inner join pesc_seccion9 s on a.id = s.pescador_id  where S9_20_5_T IS NOT NULL group by nom_dd ) as C5 on DEP.ccdd  = C5.ccdd ) as table0
        INNER JOIN
        (select 
        DEP.CCDD, DEPARTAMENTO,  ( COALESCE(C1.t,0) + COALESCE(C2.t,0) + COALESCE(C3.t,0) +  COALESCE(C4.t,0) +  COALESCE(C5.t,0) ) AS ABIERTO
        from (select  distinct(departamento), ccdd from departamentos_tab order by departamento) as DEP 
        left join (select ccdd,  count(*) as t  from pescador a inner join pesc_seccion9 s on a.id = s.pescador_id  where S9_20_1_T = 1 group by nom_dd ) as C1 on DEP.ccdd  = C1.ccdd 
        left join (select ccdd,  count(*) as t  from pescador a inner join pesc_seccion9 s on a.id = s.pescador_id  where S9_20_2_T = 1 group by nom_dd ) as C2 on DEP.ccdd  = C2.ccdd 
        left join (select ccdd,  count(*) as t  from pescador a inner join pesc_seccion9 s on a.id = s.pescador_id  where S9_20_3_T = 1 group by nom_dd ) as C3 on DEP.ccdd  = C3.ccdd 
        left join (select ccdd,  count(*) as t  from pescador a inner join pesc_seccion9 s on a.id = s.pescador_id  where S9_20_4_T = 1 group by nom_dd ) as C4 on DEP.ccdd  = C4.ccdd 
        left join (select ccdd,  count(*) as t  from pescador a inner join pesc_seccion9 s on a.id = s.pescador_id  where S9_20_5_T = 1 group by nom_dd ) as C5 on DEP.ccdd  = C5.ccdd ) as table1
        on table0.ccdd = table1.ccdd 
        INNER JOIN
        (select 
        DEP.CCDD, DEPARTAMENTO, ( COALESCE(C1.t,0) + COALESCE(C2.t,0) + COALESCE(C3.t,0) +  COALESCE(C4.t,0) +  COALESCE(C5.t,0) ) AS TABICADO_A
        from (select  distinct(departamento), ccdd from departamentos_tab order by departamento) as DEP 
        left join (select ccdd,  count(*) as t  from pescador a inner join pesc_seccion9 s on a.id = s.pescador_id  where S9_20_1_T = 2 group by nom_dd ) as C1 on DEP.ccdd  = C1.ccdd 
        left join (select ccdd,  count(*) as t  from pescador a inner join pesc_seccion9 s on a.id = s.pescador_id  where S9_20_2_T = 2 group by nom_dd ) as C2 on DEP.ccdd  = C2.ccdd 
        left join (select ccdd,  count(*) as t  from pescador a inner join pesc_seccion9 s on a.id = s.pescador_id  where S9_20_3_T = 2 group by nom_dd ) as C3 on DEP.ccdd  = C3.ccdd 
        left join (select ccdd,  count(*) as t  from pescador a inner join pesc_seccion9 s on a.id = s.pescador_id  where S9_20_4_T = 2 group by nom_dd ) as C4 on DEP.ccdd  = C4.ccdd 
        left join (select ccdd,  count(*) as t  from pescador a inner join pesc_seccion9 s on a.id = s.pescador_id  where S9_20_5_T = 2 group by nom_dd ) as C5 on DEP.ccdd  = C5.ccdd ) as table2
        on table0.ccdd = table2.ccdd 
        INNER JOIN
        (select 
        DEP.CCDD, DEPARTAMENTO, ( COALESCE(C1.t,0) + COALESCE(C2.t,0) + COALESCE(C3.t,0) +  COALESCE(C4.t,0) +  COALESCE(C5.t,0) ) AS TABICADO_C
        from (select  distinct(departamento), ccdd from departamentos_tab order by departamento) as DEP 
        left join (select ccdd,  count(*) as t  from pescador a inner join pesc_seccion9 s on a.id = s.pescador_id  where S9_20_1_T = 3 group by nom_dd ) as C1 on DEP.ccdd  = C1.ccdd 
        left join (select ccdd,  count(*) as t  from pescador a inner join pesc_seccion9 s on a.id = s.pescador_id  where S9_20_2_T = 3 group by nom_dd ) as C2 on DEP.ccdd  = C2.ccdd 
        left join (select ccdd,  count(*) as t  from pescador a inner join pesc_seccion9 s on a.id = s.pescador_id  where S9_20_3_T = 3 group by nom_dd ) as C3 on DEP.ccdd  = C3.ccdd 
        left join (select ccdd,  count(*) as t  from pescador a inner join pesc_seccion9 s on a.id = s.pescador_id  where S9_20_4_T = 3 group by nom_dd ) as C4 on DEP.ccdd  = C4.ccdd 
        left join (select ccdd,  count(*) as t  from pescador a inner join pesc_seccion9 s on a.id = s.pescador_id  where S9_20_5_T = 3 group by nom_dd ) as C5 on DEP.ccdd  = C5.ccdd ) as table3
        on table0.ccdd = table3.ccdd 
        INNER JOIN
        (select 
        DEP.CCDD, DEPARTAMENTO, ( COALESCE(C1.t,0) + COALESCE(C2.t,0) + COALESCE(C3.t,0) +  COALESCE(C4.t,0) +  COALESCE(C5.t,0) ) AS CAJON
        from (select  distinct(departamento), ccdd from departamentos_tab order by departamento) as DEP 
        left join (select ccdd,  count(*) as t  from pescador a inner join pesc_seccion9 s on a.id = s.pescador_id  where S9_20_1_T = 4 group by nom_dd ) as C1 on DEP.ccdd  = C1.ccdd 
        left join (select ccdd,  count(*) as t  from pescador a inner join pesc_seccion9 s on a.id = s.pescador_id  where S9_20_2_T = 4 group by nom_dd ) as C2 on DEP.ccdd  = C2.ccdd 
        left join (select ccdd,  count(*) as t  from pescador a inner join pesc_seccion9 s on a.id = s.pescador_id  where S9_20_3_T = 4 group by nom_dd ) as C3 on DEP.ccdd  = C3.ccdd 
        left join (select ccdd,  count(*) as t  from pescador a inner join pesc_seccion9 s on a.id = s.pescador_id  where S9_20_4_T = 4 group by nom_dd ) as C4 on DEP.ccdd  = C4.ccdd 
        left join (select ccdd,  count(*) as t  from pescador a inner join pesc_seccion9 s on a.id = s.pescador_id  where S9_20_5_T = 4 group by nom_dd ) as C5 on DEP.ccdd  = C5.ccdd ) as table4
        on table0.ccdd = table4.ccdd 
        INNER JOIN
        (select 
        DEP.CCDD, DEPARTAMENTO, ( COALESCE(C1.t,0) + COALESCE(C2.t,0) + COALESCE(C3.t,0) +  COALESCE(C4.t,0) +  COALESCE(C5.t,0) ) AS NEP
        from (select  distinct(departamento), ccdd from departamentos_tab order by departamento) as DEP 
        left join (select ccdd,  count(*) as t  from pescador a inner join pesc_seccion9 s on a.id = s.pescador_id  where S9_20_1_T = 9 group by nom_dd ) as C1 on DEP.ccdd  = C1.ccdd 
        left join (select ccdd,  count(*) as t  from pescador a inner join pesc_seccion9 s on a.id = s.pescador_id  where S9_20_2_T = 9 group by nom_dd ) as C2 on DEP.ccdd  = C2.ccdd 
        left join (select ccdd,  count(*) as t  from pescador a inner join pesc_seccion9 s on a.id = s.pescador_id  where S9_20_3_T = 9 group by nom_dd ) as C3 on DEP.ccdd  = C3.ccdd 
        left join (select ccdd,  count(*) as t  from pescador a inner join pesc_seccion9 s on a.id = s.pescador_id  where S9_20_4_T = 9 group by nom_dd ) as C4 on DEP.ccdd  = C4.ccdd 
        left join (select ccdd,  count(*) as t  from pescador a inner join pesc_seccion9 s on a.id = s.pescador_id  where S9_20_5_T = 9 group by nom_dd ) as C5 on DEP.ccdd  = C5.ccdd ) as table5
        on table0.ccdd = table5.ccdd ;
        ");
    return $q;
}

function get_report100(){
    $q = $this->db->query("
        /* TABULADO N° 100 --------------------------  BODEGA INSULADA : -------------------------*/
        SELECT  table0.CCDD, table0.DEPARTAMENTO,  TOTAL,
        _SI , _NO , NEP    FROM
        (select 
        DEP.CCDD, DEPARTAMENTO, ( COALESCE(C1.t,0) + COALESCE(C2.t,0) + COALESCE(C3.t,0) +  COALESCE(C4.t,0) +  COALESCE(C5.t,0) ) AS TOTAL
        from (select  distinct(departamento), ccdd from departamentos_tab order by departamento) as DEP 
        left join (select ccdd,  count(*) as t  from pescador a inner join pesc_seccion9 s on a.id = s.pescador_id  where S9_21_1 IS NOT NULL group by nom_dd ) as C1 on DEP.ccdd  = C1.ccdd 
        left join (select ccdd,  count(*) as t  from pescador a inner join pesc_seccion9 s on a.id = s.pescador_id  where S9_21_2 IS NOT NULL group by nom_dd ) as C2 on DEP.ccdd  = C2.ccdd 
        left join (select ccdd,  count(*) as t  from pescador a inner join pesc_seccion9 s on a.id = s.pescador_id  where S9_21_3 IS NOT NULL group by nom_dd ) as C3 on DEP.ccdd  = C3.ccdd 
        left join (select ccdd,  count(*) as t  from pescador a inner join pesc_seccion9 s on a.id = s.pescador_id  where S9_21_4 IS NOT NULL group by nom_dd ) as C4 on DEP.ccdd  = C4.ccdd 
        left join (select ccdd,  count(*) as t  from pescador a inner join pesc_seccion9 s on a.id = s.pescador_id  where S9_21_5 IS NOT NULL group by nom_dd ) as C5 on DEP.ccdd  = C5.ccdd ) as table0
        INNER JOIN
        (select 
        DEP.CCDD, DEPARTAMENTO,  ( COALESCE(C1.t,0) + COALESCE(C2.t,0) + COALESCE(C3.t,0) +  COALESCE(C4.t,0) +  COALESCE(C5.t,0) ) AS _SI
        from (select  distinct(departamento), ccdd from departamentos_tab order by departamento) as DEP 
        left join (select ccdd,  count(*) as t  from pescador a inner join pesc_seccion9 s on a.id = s.pescador_id  where S9_21_1 = 1 group by nom_dd ) as C1 on DEP.ccdd  = C1.ccdd 
        left join (select ccdd,  count(*) as t  from pescador a inner join pesc_seccion9 s on a.id = s.pescador_id  where S9_21_2 = 1 group by nom_dd ) as C2 on DEP.ccdd  = C2.ccdd 
        left join (select ccdd,  count(*) as t  from pescador a inner join pesc_seccion9 s on a.id = s.pescador_id  where S9_21_3 = 1 group by nom_dd ) as C3 on DEP.ccdd  = C3.ccdd 
        left join (select ccdd,  count(*) as t  from pescador a inner join pesc_seccion9 s on a.id = s.pescador_id  where S9_21_4 = 1 group by nom_dd ) as C4 on DEP.ccdd  = C4.ccdd 
        left join (select ccdd,  count(*) as t  from pescador a inner join pesc_seccion9 s on a.id = s.pescador_id  where S9_21_5 = 1 group by nom_dd ) as C5 on DEP.ccdd  = C5.ccdd ) as table1
        on table0.ccdd = table1.ccdd 
        INNER JOIN
        (select 
        DEP.CCDD, DEPARTAMENTO, ( COALESCE(C1.t,0) + COALESCE(C2.t,0) + COALESCE(C3.t,0) +  COALESCE(C4.t,0) +  COALESCE(C5.t,0) ) AS _NO
        from (select  distinct(departamento), ccdd from departamentos_tab order by departamento) as DEP 
        left join (select ccdd,  count(*) as t  from pescador a inner join pesc_seccion9 s on a.id = s.pescador_id  where S9_21_1 = 2 group by nom_dd ) as C1 on DEP.ccdd  = C1.ccdd 
        left join (select ccdd,  count(*) as t  from pescador a inner join pesc_seccion9 s on a.id = s.pescador_id  where S9_21_2 = 2 group by nom_dd ) as C2 on DEP.ccdd  = C2.ccdd 
        left join (select ccdd,  count(*) as t  from pescador a inner join pesc_seccion9 s on a.id = s.pescador_id  where S9_21_3 = 2 group by nom_dd ) as C3 on DEP.ccdd  = C3.ccdd 
        left join (select ccdd,  count(*) as t  from pescador a inner join pesc_seccion9 s on a.id = s.pescador_id  where S9_21_4 = 2 group by nom_dd ) as C4 on DEP.ccdd  = C4.ccdd 
        left join (select ccdd,  count(*) as t  from pescador a inner join pesc_seccion9 s on a.id = s.pescador_id  where S9_21_5 = 2 group by nom_dd ) as C5 on DEP.ccdd  = C5.ccdd ) as table2
        on table0.ccdd = table2.ccdd 
        INNER JOIN
        (select 
        DEP.CCDD, DEPARTAMENTO, ( COALESCE(C1.t,0) + COALESCE(C2.t,0) + COALESCE(C3.t,0) +  COALESCE(C4.t,0) +  COALESCE(C5.t,0) ) AS NEP
        from (select  distinct(departamento), ccdd from departamentos_tab order by departamento) as DEP 
        left join (select ccdd,  count(*) as t  from pescador a inner join pesc_seccion9 s on a.id = s.pescador_id  where S9_21_1 = 9 group by nom_dd ) as C1 on DEP.ccdd  = C1.ccdd 
        left join (select ccdd,  count(*) as t  from pescador a inner join pesc_seccion9 s on a.id = s.pescador_id  where S9_21_2 = 9 group by nom_dd ) as C2 on DEP.ccdd  = C2.ccdd 
        left join (select ccdd,  count(*) as t  from pescador a inner join pesc_seccion9 s on a.id = s.pescador_id  where S9_21_3 = 9 group by nom_dd ) as C3 on DEP.ccdd  = C3.ccdd 
        left join (select ccdd,  count(*) as t  from pescador a inner join pesc_seccion9 s on a.id = s.pescador_id  where S9_21_4 = 9 group by nom_dd ) as C4 on DEP.ccdd  = C4.ccdd 
        left join (select ccdd,  count(*) as t  from pescador a inner join pesc_seccion9 s on a.id = s.pescador_id  where S9_21_5 = 9 group by nom_dd ) as C5 on DEP.ccdd  = C5.ccdd ) as table3
        on table0.ccdd = table3.ccdd ;
        ");
    return $q;
}

function get_report101(){
    $q = $this->db->query("
        /* TABULADO N° 101 --------------------------  TIPO HIELO : -------------------------*/
        SELECT  table0.CCDD, table0.DEPARTAMENTO,  TOTAL,
        BLOQUE , ESCAMA , NO_UTILIZA  , NEP    FROM
        (select 
        DEP.CCDD, DEPARTAMENTO, ( COALESCE(C1.t,0) + COALESCE(C2.t,0) + COALESCE(C3.t,0) +  COALESCE(C4.t,0) +  COALESCE(C5.t,0) ) AS TOTAL
        from (select  distinct(departamento), ccdd from departamentos_tab order by departamento) as DEP 
        left join (select ccdd,  count(*) as t  from pescador a inner join pesc_seccion9 s on a.id = s.pescador_id  where S9_23_1 IS NOT NULL group by nom_dd ) as C1 on DEP.ccdd  = C1.ccdd 
        left join (select ccdd,  count(*) as t  from pescador a inner join pesc_seccion9 s on a.id = s.pescador_id  where S9_23_2 IS NOT NULL group by nom_dd ) as C2 on DEP.ccdd  = C2.ccdd 
        left join (select ccdd,  count(*) as t  from pescador a inner join pesc_seccion9 s on a.id = s.pescador_id  where S9_23_3 IS NOT NULL group by nom_dd ) as C3 on DEP.ccdd  = C3.ccdd 
        left join (select ccdd,  count(*) as t  from pescador a inner join pesc_seccion9 s on a.id = s.pescador_id  where S9_23_4 IS NOT NULL group by nom_dd ) as C4 on DEP.ccdd  = C4.ccdd 
        left join (select ccdd,  count(*) as t  from pescador a inner join pesc_seccion9 s on a.id = s.pescador_id  where S9_23_5 IS NOT NULL group by nom_dd ) as C5 on DEP.ccdd  = C5.ccdd ) as table0
        INNER JOIN
        (select 
        DEP.CCDD, DEPARTAMENTO,  ( COALESCE(C1.t,0) + COALESCE(C2.t,0) + COALESCE(C3.t,0) +  COALESCE(C4.t,0) +  COALESCE(C5.t,0) ) AS BLOQUE
        from (select  distinct(departamento), ccdd from departamentos_tab order by departamento) as DEP 
        left join (select ccdd,  count(*) as t  from pescador a inner join pesc_seccion9 s on a.id = s.pescador_id  where S9_23_1 = 1 group by nom_dd ) as C1 on DEP.ccdd  = C1.ccdd 
        left join (select ccdd,  count(*) as t  from pescador a inner join pesc_seccion9 s on a.id = s.pescador_id  where S9_23_2 = 1 group by nom_dd ) as C2 on DEP.ccdd  = C2.ccdd 
        left join (select ccdd,  count(*) as t  from pescador a inner join pesc_seccion9 s on a.id = s.pescador_id  where S9_23_3 = 1 group by nom_dd ) as C3 on DEP.ccdd  = C3.ccdd 
        left join (select ccdd,  count(*) as t  from pescador a inner join pesc_seccion9 s on a.id = s.pescador_id  where S9_23_4 = 1 group by nom_dd ) as C4 on DEP.ccdd  = C4.ccdd 
        left join (select ccdd,  count(*) as t  from pescador a inner join pesc_seccion9 s on a.id = s.pescador_id  where S9_23_5 = 1 group by nom_dd ) as C5 on DEP.ccdd  = C5.ccdd ) as table1
        on table0.ccdd = table1.ccdd 
        INNER JOIN
        (select 
        DEP.CCDD, DEPARTAMENTO, ( COALESCE(C1.t,0) + COALESCE(C2.t,0) + COALESCE(C3.t,0) +  COALESCE(C4.t,0) +  COALESCE(C5.t,0) ) AS ESCAMA
        from (select  distinct(departamento), ccdd from departamentos_tab order by departamento) as DEP 
        left join (select ccdd,  count(*) as t  from pescador a inner join pesc_seccion9 s on a.id = s.pescador_id  where S9_23_1 = 2 group by nom_dd ) as C1 on DEP.ccdd  = C1.ccdd 
        left join (select ccdd,  count(*) as t  from pescador a inner join pesc_seccion9 s on a.id = s.pescador_id  where S9_23_2 = 2 group by nom_dd ) as C2 on DEP.ccdd  = C2.ccdd 
        left join (select ccdd,  count(*) as t  from pescador a inner join pesc_seccion9 s on a.id = s.pescador_id  where S9_23_3 = 2 group by nom_dd ) as C3 on DEP.ccdd  = C3.ccdd 
        left join (select ccdd,  count(*) as t  from pescador a inner join pesc_seccion9 s on a.id = s.pescador_id  where S9_23_4 = 2 group by nom_dd ) as C4 on DEP.ccdd  = C4.ccdd 
        left join (select ccdd,  count(*) as t  from pescador a inner join pesc_seccion9 s on a.id = s.pescador_id  where S9_23_5 = 2 group by nom_dd ) as C5 on DEP.ccdd  = C5.ccdd ) as table2
        on table0.ccdd = table2.ccdd 
        INNER JOIN
        (select 
        DEP.CCDD, DEPARTAMENTO, ( COALESCE(C1.t,0) + COALESCE(C2.t,0) + COALESCE(C3.t,0) +  COALESCE(C4.t,0) +  COALESCE(C5.t,0) ) AS NO_UTILIZA
        from (select  distinct(departamento), ccdd from departamentos_tab order by departamento) as DEP 
        left join (select ccdd,  count(*) as t  from pescador a inner join pesc_seccion9 s on a.id = s.pescador_id  where S9_23_1 = 3 group by nom_dd ) as C1 on DEP.ccdd  = C1.ccdd 
        left join (select ccdd,  count(*) as t  from pescador a inner join pesc_seccion9 s on a.id = s.pescador_id  where S9_23_2 = 3 group by nom_dd ) as C2 on DEP.ccdd  = C2.ccdd 
        left join (select ccdd,  count(*) as t  from pescador a inner join pesc_seccion9 s on a.id = s.pescador_id  where S9_23_3 = 3 group by nom_dd ) as C3 on DEP.ccdd  = C3.ccdd 
        left join (select ccdd,  count(*) as t  from pescador a inner join pesc_seccion9 s on a.id = s.pescador_id  where S9_23_4 = 3 group by nom_dd ) as C4 on DEP.ccdd  = C4.ccdd 
        left join (select ccdd,  count(*) as t  from pescador a inner join pesc_seccion9 s on a.id = s.pescador_id  where S9_23_5 = 3 group by nom_dd ) as C5 on DEP.ccdd  = C5.ccdd ) as table3
        on table0.ccdd = table3.ccdd 
        INNER JOIN
        (select 
        DEP.CCDD, DEPARTAMENTO, ( COALESCE(C1.t,0) + COALESCE(C2.t,0) + COALESCE(C3.t,0) +  COALESCE(C4.t,0) +  COALESCE(C5.t,0) ) AS NEP
        from (select  distinct(departamento), ccdd from departamentos_tab order by departamento) as DEP 
        left join (select ccdd,  count(*) as t  from pescador a inner join pesc_seccion9 s on a.id = s.pescador_id  where S9_23_1 = 9 group by nom_dd ) as C1 on DEP.ccdd  = C1.ccdd 
        left join (select ccdd,  count(*) as t  from pescador a inner join pesc_seccion9 s on a.id = s.pescador_id  where S9_23_2 = 9 group by nom_dd ) as C2 on DEP.ccdd  = C2.ccdd 
        left join (select ccdd,  count(*) as t  from pescador a inner join pesc_seccion9 s on a.id = s.pescador_id  where S9_23_3 = 9 group by nom_dd ) as C3 on DEP.ccdd  = C3.ccdd 
        left join (select ccdd,  count(*) as t  from pescador a inner join pesc_seccion9 s on a.id = s.pescador_id  where S9_23_4 = 9 group by nom_dd ) as C4 on DEP.ccdd  = C4.ccdd 
        left join (select ccdd,  count(*) as t  from pescador a inner join pesc_seccion9 s on a.id = s.pescador_id  where S9_23_5 = 9 group by nom_dd ) as C5 on DEP.ccdd  = C5.ccdd ) as table5
        on table0.ccdd = table5.ccdd ;
        ");
    return $q;
}




}
?>