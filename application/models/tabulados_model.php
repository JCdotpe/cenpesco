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
        $this->db->select('texto');
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
function get_dptos (){
	$q = $this->db->query('
		select  distinct(DEPARTAMENTO), CCDD from departamentos_tab order by DEPARTAMENTO; 
    ');
    return $q;	 	
}   


    function get_nombre_tabulados()
    {
    $q = $this->db->query('
        select * from nombre_tabulados order by n; 
    ');
    return $q;
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
    $q = $this->db->query('
        select  DEP.CCDD, DEPARTAMENTO,   coalesce(c1.t,0) PESCADOR, (coalesce(c2.t,0) -  coalesce(C3.t,0) ) ACUICULTOR, coalesce(C3.t,0) AMBOS 
        from (select  distinct(departamento), ccdd from departamentos_tab order by departamento) as DEP
        left join (select ccdd, count(*) as t from pescador p inner join  pesc_info s on p.id = s.pescador_id where  tac=1 and res!=3 group by ccdd) as C1 on DEP.ccdd = C1.ccdd
        left join (select ccdd, count(*) as t from acu_seccion1 group by ccdd) as C2  on DEP.ccdd = C2.ccdd     
        left join (select ccdd, count(*) as t from pescador p inner join  pesc_info s on p.id = s.pescador_id where  tac=3 and res!=3 group by ccdd) as C3 on DEP.ccdd = C3.ccdd;
                    ');
    return $q;
}


//S2_3
function get_report2($a = null, $b = null){
	$this->db->select('p.CCDD,p.NOM_DD,COUNT(p2.S2_3) as num');
	$this->db->from('pescador p');
    $this->db->join('pesc_seccion2 p2','p.id = p2.pescador_id','left');
	if(!is_null($a)){
    	$this->db->where('p2.S2_3',$a);
    }
    if(is_null($b)){
    	$this->db->group_by('p.NOM_DD');
    }
    $q = $this->db->get();
    return $q;
}


function get_report3($a = null, $b = null){ /* TABULADO N° 03 - lugar de nacimiento*/
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

function get_report4(){/* TABULADO N° 04 - en el 2007*/
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

function get_report5($a = null, $b = null){
	$this->db->select('COUNT(p.CCDD) as num');
	$this->db->from('pescador p');
    $this->db->join('pesc_seccion2 p2','p.id = p2.pescador_id','left');
    $this->db->where('p2.S2_12',$a);        
    if(!is_null($b)){
    $this->db->where('p.CCDD',$b);
    }   
    $q = $this->db->get();
    return $q;
}

function get_report6($a = null, $b = null){
    $this->db->select('COUNT(p.CCDD) as num');
    $this->db->from('pescador p');
    $this->db->join('pesc_seccion2 p2','p.id = p2.pescador_id','left');
    $this->db->where('p2.S2_13',$a);        
    if(!is_null($b)){
    $this->db->where('p.CCDD',$b);
    }   
    $q = $this->db->get();
    return $q;
}


function get_report7($a = null, $b = null){
    $this->db->select('COUNT(p.CCDD) as num');
    $this->db->from('pescador p');
    $this->db->join('pesc_seccion2 p2','p.id = p2.pescador_id','left');
        if ($a>=1 && $a<=8) {
    $this->db->where('p2.S2_14_' . $a,1); }
        else if($a==9){ 
    $this->db->where('p2.S2_14_1',9);}
        else if($a==999){ 
    $this->db->where('p2.S2_14_1 is not null');}           
    if(!is_null($b)){
    $this->db->where('p.CCDD',$b);
    }   
    $q = $this->db->get();
    return $q;
}


function get_report8($a = null, $b = null){
    $this->db->select('COUNT(p.CCDD) as num');
    $this->db->from('pescador p');
    $this->db->join('pesc_seccion2 p2','p.id = p2.pescador_id','left');
    $this->db->where('p2.S2_15',$a);        
    if(!is_null($b)){
    $this->db->where('p.CCDD',$b);
    }   
    $q = $this->db->get();
    return $q;
}

function get_report9($a = null, $b = null){
    $this->db->select('COUNT(p.CCDD) as num');
    $this->db->from('pescador p');
    $this->db->join('pesc_seccion2 p2','p.id = p2.pescador_id','left'); 
    if($a == 1)
        $this->db->where('p2.S2_16',1); 
    if($a == 2){
        $this->db->where('p2.S2_16',2);                  
        //$this->db->where('p2.S2_16 <=',5);                  
    }
    if($a == 3){
        $this->db->where('p2.S2_16 ',3);                  
        //$this->db->where('p2.S2_16 <=',10);                  
    }   
    if($a == 4){               
        $this->db->where('p2.S2_16',4);                  
    }     
    if($a == 5){               
        $this->db->where('p2.S2_16',9);                  
    }     
    if(!is_null($b)){
    $this->db->where('p.CCDD',$b);
    }   
    $q = $this->db->get();
    return $q;
}


function get_report10($a = null, $b = null){
    $this->db->select('COUNT(p.CCDD) as num');
    $this->db->from('pescador p');
    $this->db->join('pesc_seccion2 p2','p.id = p2.pescador_id','left');
        if ($a>=1 && $a<=9) {
    $this->db->where('p2.S2_17_' . $a,1); }
        else if($a==10){ 
    $this->db->where('p2.S2_17_1',9);}  
        else if($a==999){ 
    $this->db->where('p2.S2_17_1 is not null');}       
    if(!is_null($b)){
    $this->db->where('p.CCDD',$b);
    }   
    $q = $this->db->get();
    return $q;
}

function get_report11($a = null, $b = null){
    $this->db->select('COUNT(p.CCDD) as num');
    $this->db->from('pescador p');
    $this->db->join('pesc_seccion2 p2','p.id = p2.pescador_id','left');
    $this->db->where('p2.S2_18',$a);        
    if(!is_null($b)){
    $this->db->where('p.CCDD',$b);
    }   
    $q = $this->db->get();
    return $q;
}


function get_report12($a = null, $b = null){
    $this->db->select('COUNT(p.CCDD) as num');
    $this->db->from('pescador p');
    $this->db->join('pesc_seccion2 p2','p.id = p2.pescador_id','left');
    $this->db->where('p2.S2_19',$a);        
    if(!is_null($b)){
    $this->db->where('p.CCDD',$b);
    }   
    $q = $this->db->get();
    return $q;
}

function get_report13($a = null, $b = null){
    $this->db->select('COUNT(p.CCDD) as num');
    $this->db->from('pescador p');
    $this->db->join('pesc_seccion2 p2','p.id = p2.pescador_id','left');
        if ($a>=1 && $a<=9) {
    $this->db->where('p2.S2_20_' . $a,1); }
        else if($a==10){ 
    $this->db->where('p2.S2_20_1',9);}  
        else if($a==999){ 
    $this->db->where('p2.S2_20_1 is not null');}      
    if(!is_null($b)){
    $this->db->where('p.CCDD',$b);
    }   
    $q = $this->db->get();
    return $q;
}


function get_report14($a = null, $b = null){
    $this->db->select('COUNT(p.CCDD) as num');
    $this->db->from('pescador p');
    $this->db->join('pesc_seccion2 p2','p.id = p2.pescador_id','left');
    $this->db->where('p2.S2_21',$a);        
    if(!is_null($b)){
    $this->db->where('p.CCDD',$b);
    }   
    $q = $this->db->get();
    return $q;
}

function get_report15($a = null, $b = null){
    $this->db->select('COUNT(p.CCDD) as num');
    $this->db->from('pescador p');
    $this->db->join('pesc_seccion2 p2','p.id = p2.pescador_id','left');
    $this->db->where('p2.S2_22',$a);        
    if(!is_null($b)){
    $this->db->where('p.CCDD',$b);
    }   
    $q = $this->db->get();
    return $q;
}

function get_report16($a = null){
    $this->db->select('p2.S2_23_3_1,p2.S2_23_3_2,p2.S2_23_3_3,p2.S2_23_3_4,p2.S2_23_3_5,p2.S2_23_3_6,p2.S2_23_3_7,p2.S2_23_3_8,p2.S2_23_3_9,p2.S2_23_3_10');
    $this->db->from('pescador p');
    $this->db->join('pesc_seccion2 p2','p.id = p2.pescador_id','left');     
    if(!is_null($a)){
    $this->db->where('p.CCDD',$a);
    }   
    $q = $this->db->get();
    return $q;
}

function get_report17($a = null){
    $this->db->select('p2.S2_23_4_1A,p2.S2_23_4_2A,p2.S2_23_4_3A,p2.S2_23_4_4A,p2.S2_23_4_5A,p2.S2_23_4_6A,p2.S2_23_4_7A,p2.S2_23_4_8A,p2.S2_23_4_9A,p2.S2_23_4_10A');
    $this->db->from('pescador p');
    $this->db->join('pesc_seccion2 p2','p.id = p2.pescador_id','left');     
    if(!is_null($a)){
    $this->db->where('p.CCDD',$a);
    }   
    $q = $this->db->get();
    return $q;
}

function get_report18($a = null){
    $this->db->select('p2.S2_23_5_1,p2.S2_23_5_2,p2.S2_23_5_3,p2.S2_23_5_4,p2.S2_23_5_5,p2.S2_23_5_6,p2.S2_23_5_7,p2.S2_23_5_8,p2.S2_23_5_9,p2.S2_23_5_10');
    $this->db->from('pescador p');
    $this->db->join('pesc_seccion2 p2','p.id = p2.pescador_id','left');     
    if(!is_null($a)){
    $this->db->where('p.CCDD',$a);
    }   
    $q = $this->db->get();
    return $q;
}

function get_report19($a = null){
    $this->db->select('p2.S2_23_6_1,p2.S2_23_6_2,p2.S2_23_6_3,p2.S2_23_6_4,p2.S2_23_6_5,p2.S2_23_6_6,p2.S2_23_6_7,p2.S2_23_6_8,p2.S2_23_6_9,p2.S2_23_6_10');
    $this->db->from('pescador p');
    $this->db->join('pesc_seccion2 p2','p.id = p2.pescador_id','left');     
    if(!is_null($a)){
    $this->db->where('p.CCDD',$a);
    }   
    $q = $this->db->get();
    return $q;
}

function get_report20($a = null){
    $this->db->select('p2.S2_23_7_1,p2.S2_23_7_2,p2.S2_23_7_3,p2.S2_23_7_4,p2.S2_23_7_5,p2.S2_23_7_6,p2.S2_23_7_7,p2.S2_23_7_8,p2.S2_23_7_9,p2.S2_23_7_10');
    $this->db->from('pescador p');
    $this->db->join('pesc_seccion2 p2','p.id = p2.pescador_id','left');     
    if(!is_null($a)){
    $this->db->where('p.CCDD',$a);
    }   
    $q = $this->db->get();
    return $q;
}

function get_report21($a = null){
    $this->db->select('p2.S2_23_8_1,p2.S2_23_8_2,p2.S2_23_8_3,p2.S2_23_8_4,p2.S2_23_8_5,p2.S2_23_8_6,p2.S2_23_8_7,p2.S2_23_8_8,p2.S2_23_8_9,p2.S2_23_8_10');
    $this->db->from('pescador p');
    $this->db->join('pesc_seccion2 p2','p.id = p2.pescador_id','left');     
    if(!is_null($a)){
    $this->db->where('p.CCDD',$a);
    }   
    $q = $this->db->get();
    return $q;
}

function get_report22($a = null){
    $this->db->select('p2.S2_23_9_1,p2.S2_23_9_2,p2.S2_23_9_3,p2.S2_23_9_4,p2.S2_23_9_5,p2.S2_23_9_6,p2.S2_23_9_7,p2.S2_23_9_8,p2.S2_23_9_9,p2.S2_23_9_10');
    $this->db->from('pescador p');
    $this->db->join('pesc_seccion2 p2','p.id = p2.pescador_id','left');     
    if(!is_null($a)){
    $this->db->where('p.CCDD',$a);
    }   
    $q = $this->db->get();
    return $q;
}

function get_report23($a = null){
    $this->db->select('p2.S2_23_10_1,p2.S2_23_10_2,p2.S2_23_10_3,p2.S2_23_10_4,p2.S2_23_10_5,p2.S2_23_10_6,p2.S2_23_10_7,p2.S2_23_10_8,p2.S2_23_10_9,p2.S2_23_10_10');
    $this->db->from('pescador p');
    $this->db->join('pesc_seccion2 p2','p.id = p2.pescador_id','left');     
    if(!is_null($a)){
    $this->db->where('p.CCDD',$a);
    }   
    $q = $this->db->get();
    return $q;
}

function get_report24($a = null){
    $this->db->select('p2.S2_23_11_1,p2.S2_23_11_2,p2.S2_23_11_3,p2.S2_23_11_4,p2.S2_23_11_5,p2.S2_23_11_6,p2.S2_23_11_7,p2.S2_23_11_8,p2.S2_23_11_9,p2.S2_23_11_10');
    $this->db->from('pescador p');
    $this->db->join('pesc_seccion2 p2','p.id = p2.pescador_id','left');     
    if(!is_null($a)){
    $this->db->where('p.CCDD',$a);
    }   
    $q = $this->db->get();
    return $q;
}

function get_report25($a = null, $b = null){
    $this->db->select('COUNT(p.CCDD) as num');
    $this->db->from('pescador p');
    $this->db->join('pesc_seccion3 p3','p.id = p3.pescador_id','left');
    $this->db->where('p3.S3_100',$a);        
    if(!is_null($b)){
    $this->db->where('p.CCDD',$b);
    }   
    $q = $this->db->get();
    return $q;
}

function get_report26($a = null, $b = null){
    $this->db->select('COUNT(p.CCDD) as num');
    $this->db->from('pescador p');
    $this->db->join('pesc_seccion3 p3','p.id = p3.pescador_id','left');
    $this->db->where('p3.S3_200',$a);        
    if(!is_null($b)){
    $this->db->where('p.CCDD',$b);
    }   
    $q = $this->db->get();
    return $q;
}

function get_report27($a = null, $b = null){
    $this->db->select('COUNT(p.CCDD) as num');
    $this->db->from('pescador p');
    $this->db->join('pesc_seccion3 p3','p.id = p3.pescador_id','left');
    $this->db->where('p3.S3_300',$a);        
    if(!is_null($b)){
    $this->db->where('p.CCDD',$b);
    }   
    $q = $this->db->get();
    return $q;
}
function get_report28($a = null, $b = null){
    $this->db->select('COUNT(p.CCDD) as num');
    $this->db->from('pescador p');
    $this->db->join('pesc_seccion3 p3','p.id = p3.pescador_id','left');
    $this->db->where('p3.S3_400',$a);        
    if(!is_null($b)){
    $this->db->where('p.CCDD',$b);
    }   
    $q = $this->db->get();
    return $q;
}

function get_report29($a = null, $b = null){
    $this->db->select('COUNT(p.CCDD) as num');
    $this->db->from('pescador p');
    $this->db->join('pesc_seccion3 p3','p.id = p3.pescador_id','left');
    $this->db->where('p3.S3_500',$a);        
    if(!is_null($b)){
    $this->db->where('p.CCDD',$b);
    }   
    $q = $this->db->get();
    return $q;
}

function get_report30($a = null, $b = null){
    $this->db->select('COUNT(p.CCDD) as num');
    $this->db->from('pescador p');
    $this->db->join('pesc_seccion3 p3','p.id = p3.pescador_id','left');
    $this->db->where('p3.S3_600',$a);        
    if(!is_null($b)){
    $this->db->where('p.CCDD',$b);
    }   
    $q = $this->db->get();
    return $q;
}

function get_report31($a = null, $b = null){
    $this->db->select('COUNT(p.CCDD) as num');
    $this->db->from('pescador p');
    $this->db->join('pesc_seccion3 p3','p.id = p3.pescador_id','left');
    $this->db->where('p3.S3_700',$a);        
    if(!is_null($b)){
    $this->db->where('p.CCDD',$b);
    }   
    $q = $this->db->get();
    return $q;
}

function get_report32($a = null, $b = null){
    $this->db->select('COUNT(p.CCDD) as num');
    $this->db->from('pescador p');
    $this->db->join('pesc_seccion3 p3','p.id = p3.pescador_id','left');
    $this->db->where('p3.S3_800',$a);        
    if(!is_null($b)){
    $this->db->where('p.CCDD',$b);
    }   
    $q = $this->db->get();
    return $q;
}

function get_report33($a = null, $b = null){
    $aa = sprintf("%02d",$a);
    $this->db->select('COUNT(p.CCDD) as num');
    $this->db->from('pescador p');
    $this->db->join('pesc_seccion3 p3','p.id = p3.pescador_id','left');
        if ($a>=1 && $a<=11) {    
    $this->db->where('p3.S3_9' . $aa,1);  }
        else if ($a==12) {    
    $this->db->where('p3.S3_901',9);  } 
        else if ($a==999) {    
    $this->db->where('p3.S3_901 is not null');  }     
    if(!is_null($b)){
    $this->db->where('p.CCDD',$b);
    }   
    $q = $this->db->get();
    return $q;
}

function get_report34($a = null, $b = null){
    $aa = sprintf("%02d",$a);
    $this->db->select('COUNT(p.CCDD) as num');
    $this->db->from('pescador p');
    $this->db->join('pesc_seccion3 p3','p.id = p3.pescador_id','left');
        if ($a>=1 && $a<=5) {   
    $this->db->where('p3.S3_10' . $aa,1);  } 
        else if ($a==6) {    
    $this->db->where('p3.S3_1001',9);  } 
        else if ($a==999) {  
    $this->db->where('p3.S3_1001 is not null');  }         
    if(!is_null($b)){
    $this->db->where('p.CCDD',$b);
    }   
    $q = $this->db->get();
    return $q;
}

function get_report35($a = null, $b = null){
    $this->db->select('COUNT(p.CCDD) as num');
    $this->db->from('pescador p');
    $this->db->join('pesc_seccion3 p3','p.id = p3.pescador_id','left');
    $this->db->where('p3.S3_1100',$a);        
    if(!is_null($b)){
    $this->db->where('p.CCDD',$b);
    }   
    $q = $this->db->get();
    return $q;
}

function get_report36($a = null, $b = null){
    $this->db->select('COUNT(p.CCDD) as num');
    $this->db->from('pescador p');
    $this->db->join('pesc_seccion4 p4','p.id = p4.pescador_id','left');
    $this->db->where('p4.S4_1',$a);        
    if(!is_null($b)){
    $this->db->where('p.CCDD',$b);
    }   
    $q = $this->db->get();
    return $q;
}

function get_report37($a = null, $b = null){
    $this->db->select('COUNT(p.CCDD) as num');
    $this->db->from('pescador p');
    $this->db->join('pesc_seccion4 p4','p.id = p4.pescador_id','left');
        if ($a>=1 && $a<=4) {   
    $this->db->where('p4.S4_2_' . $a,1);   }  
        else if ($a==5) {   
    $this->db->where('p4.S4_2_1',9);   } 
        else if ($a==999) {   
    $this->db->where('p4.S4_2_1 is not null');   }   
    if(!is_null($b)){
    $this->db->where('p.CCDD',$b);
    }   
    $q = $this->db->get();
    return $q;
}

function get_report38($a = null, $b = null){
    $this->db->select('COUNT(p.CCDD) as num');
    $this->db->from('pescador p');
    $this->db->join('pesc_seccion4 p4','p.id = p4.pescador_id','left');
    $this->db->where('p4.S4_2_1',1);        
    $this->db->where('p4.S4_2_1_1',$a);        
    if(!is_null($b)){
    $this->db->where('p.CCDD',$b);
    }   
    $q = $this->db->get();
    return $q;
}

function get_report39($a = null, $b = null){
    $this->db->select('COUNT(p.CCDD) as num');
    $this->db->from('pescador p');
    $this->db->join('pesc_seccion4 p4','p.id = p4.pescador_id','left');
    $this->db->where('p4.S4_2_2',1);        
    $this->db->where('p4.S4_2_2_1',$a);        
    if(!is_null($b)){
    $this->db->where('p.CCDD',$b);
    }   
    $q = $this->db->get();
    return $q;
}

function get_report40($a = null, $b = null){
    $this->db->select('COUNT(p.CCDD) as num');
    $this->db->from('pescador p');
    $this->db->join('pesc_seccion4 p4','p.id = p4.pescador_id','left');
    $this->db->where('p4.S4_2_3',1);        
    $this->db->where('p4.S4_2_3_1',$a);        
    if(!is_null($b)){
    $this->db->where('p.CCDD',$b);
    }   
    $q = $this->db->get();
    return $q;
}



function get_report41($a = null, $b = null){
    $this->db->select('COUNT(p.CCDD) as num');
    $this->db->from('pescador p');
    $this->db->join('pesc_seccion4 p4','p.id = p4.pescador_id','left');
        if ($a>=1 && $a<=3) {  
    $this->db->where('p4.S4_3_' . $a,1);   } 
        if ($a==4) {   
    $this->db->where('p4.S4_3_1',9);   } 
        if ($a==999) {   
    $this->db->where('p4.S4_3_1 is not null');   } 
    if(!is_null($b)){
    $this->db->where('p.CCDD',$b);
    }   
    $q = $this->db->get();
    return $q;
}

function get_report42($a = null, $b = null){
    $this->db->select('COUNT(p.CCDD) as num');
    $this->db->from('pescador p');
    $this->db->join('pesc_seccion4 p4','p.id = p4.pescador_id','left');     
    $this->db->where('p4.S4_4_1',$a);        
    if(!is_null($b)){
    $this->db->where('p.CCDD',$b);
    }   
    $q = $this->db->get();
    return $q;
}

function get_report43($a = null, $b = null){
    $this->db->select('COUNT(p.CCDD) as num');
    $this->db->from('pescador p');
    $this->db->join('pesc_seccion4 p4','p.id = p4.pescador_id','left');     
    $this->db->where('p4.S4_5_1',$a);        
    if(!is_null($b)){
    $this->db->where('p.CCDD',$b);
    }   
    $q = $this->db->get();
    return $q;
}



function get_report44($a = null, $b = null){
    $this->db->select('COUNT(p.CCDD) as num');
    $this->db->from('pescador p');
    $this->db->join('pesc_seccion4 p4','p.id = p4.pescador_id','left');
        if ($a>=1 && $a<=6) {  
    $this->db->where('p4.S4_6_' . $a,1); }
        if ($a==7) {  
    $this->db->where('p4.S4_6_1',9); }  
        if ($a==999) {  
    $this->db->where('p4.S4_6_1 is not null'); }       
    if(!is_null($b)){
    $this->db->where('p.CCDD',$b);
    }   
    $q = $this->db->get();
    return $q;
}


function get_report45($a = null, $b = null){
    $this->db->select('COUNT(p.CCDD) as num');
    $this->db->from('pescador p');
    $this->db->join('pesc_seccion5 p5','p.id = p5.pescador_id','left');
        if ($a>=1 && $a<=8) {  
    $this->db->where('p5.S5_1_' . $a,1);  } 
        if ($a==9) {  
    $this->db->where('p5.S5_1_1',9);  } 
        if ($a==999) {  
    $this->db->where('p5.S5_1_1 is not null');  }   
    if(!is_null($b)){
    $this->db->where('p.CCDD',$b);
    }   
    $q = $this->db->get();
    return $q;
}

function get_report46($a = null, $b = null){
    $this->db->select('COUNT(p.CCDD) as num');
    $this->db->from('pescador p');
    $this->db->join('pesc_seccion5 p5','p.id = p5.pescador_id','left');
        if ($a>=1 && $a<=2) {  
    $this->db->where('p5.S5_2_' . $a,1);    }  
        if ($a==3) {  
    $this->db->where('p5.S5_2_1', 9);  }  
        if ($a==999) {  
    $this->db->where('p5.S5_2_1 is not null');  }   
    if(!is_null($b)){
    $this->db->where('p.CCDD',$b);
    }   
    $q = $this->db->get();
    return $q;
}


function get_report47($a = null, $b = null){
    $this->db->select('COUNT(p.CCDD) as num');
    $this->db->from('pescador p');
    $this->db->join('pesc_seccion5 p5','p.id = p5.pescador_id','left');     
    $this->db->where('p5.S5_3',$a);      
    if(!is_null($b)){
    $this->db->where('p.CCDD',$b);
    }   
    $q = $this->db->get();
    return $q;
}


function get_report48($a = null, $b = null){
    $this->db->select('COUNT(p.CCDD) as num');
    $this->db->from('pescador p');
    $this->db->join('pesc_seccion5 p5','p.id = p5.pescador_id','left');     
    $this->db->where('p5.S5_4',$a);      
    if(!is_null($b)){
    $this->db->where('p.CCDD',$b);
    }   
    $q = $this->db->get();
    return $q;
}

function get_report49($a = null, $b = null){
    $this->db->select('COUNT(p.CCDD) as num');
    $this->db->from('pescador p');
    $this->db->join('pesc_seccion5 p5','p.id = p5.pescador_id','left');
        if ($a>=1 && $a<=9) {  
    $this->db->where('p5.S5_5_' . $a,1); }
        if ($a==10) {  
    $this->db->where('p5.S5_5_1',9); }    
        if ($a==999) {  
    $this->db->where('p5.S5_5_1 is not null'); }  
    if(!is_null($b)){
    $this->db->where('p.CCDD',$b);
    }   
    $q = $this->db->get();
    return $q;
}

function get_report50($a = null, $b = null){
    $this->db->select('COUNT(p.CCDD) as num');
    $this->db->from('pescador p');
    $this->db->join('pesc_seccion5 p5','p.id = p5.pescador_id','left');
        if ($a>=0 && $a<=4) {  
    $this->db->where('p5.S5_5_1' . $a,1);  }
        if ($a==5) {  
    $this->db->where('p5.S5_5_10',9);  }    
        if ($a==999) {  
    $this->db->where('p5.S5_5_10 is not null'); }    
    if(!is_null($b)){
    $this->db->where('p.CCDD',$b);
    }   
    $q = $this->db->get();
    return $q;
}

function get_report51($a = null, $b = null){
    $this->db->select('COUNT(p.CCDD) as num');
    $this->db->from('pescador p');
    $this->db->join('pesc_seccion5 p5','p.id = p5.pescador_id','left');
        if ($a>=5 && $a<=7) {  
    $this->db->where('p5.S5_5_1' . $a,1); }
        if ($a==8) {  
    $this->db->where('p5.S5_5_15',9);  }    
        if ($a==999) {  
    $this->db->where('p5.S5_5_15 is not null'); }         
    if(!is_null($b)){
    $this->db->where('p.CCDD',$b);
    }   
    $q = $this->db->get();
    return $q;
}


function get_report52(){
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


function get_report53($a = null, $b = null){
    $this->db->select('COUNT(p.CCDD) as num');
    $this->db->from('pescador p');
    $this->db->join('pesc_seccion5 p5','p.id = p5.pescador_id','left');
    $this->db->where('p5.S5_7' ,$a);        
    if(!is_null($b)){
    $this->db->where('p.CCDD',$b);
    }   
    $q = $this->db->get();
    return $q;
}


function get_report54($a = null, $b = null){
    $this->db->select('COUNT(p.CCDD) as num');
    $this->db->from('pescador p');
    $this->db->join('pesc_seccion5 p5','p.id = p5.pescador_id','left');
        if ($a>=1 && $a<=4) {
    $this->db->where('p5.S5_8_' . $a,1); }
        if ($a==5) {
    $this->db->where('p5.S5_8_1',9); }  
        if ($a==999) {
    $this->db->where('p5.S5_8_1 is not null'); }        
    if(!is_null($b)){
    $this->db->where('p.CCDD',$b);
    }   
    $q = $this->db->get();
    return $q;
}

function get_report55($a = null, $b = null){
    $this->db->select('COUNT(p.CCDD) as num');
    $this->db->from('pescador p');
    $this->db->join('pesc_seccion5 p5','p.id = p5.pescador_id','left');
        if ($a>=1 && $a<=15) {
    $this->db->where('p5.S5_9_' . $a,1); }
        if ($a==16) {
    $this->db->where('p5.S5_9_1',9); }   
        if ($a==999) {
    $this->db->where('p5.S5_9_1 is not null'); }   
    if(!is_null($b)){
    $this->db->where('p.CCDD',$b);
    }   
    $q = $this->db->get();
    return $q;
}

function get_report56($a = null, $b = null){
    $this->db->select('COUNT(p.CCDD) as num');
    $this->db->from('pescador p');
    $this->db->join('pesc_seccion5 p5','p.id = p5.pescador_id','left');
    $this->db->where('p5.S5_10_1' ,$a);        
        if(!is_null($b)){
    $this->db->where('p.CCDD',$b); }   
    $q = $this->db->get();
    return $q;
}


function get_report57($a = null, $b = null){
    $this->db->select('COUNT(p.CCDD) as num');
    $this->db->from('pescador p');
    $this->db->join('pesc_seccion5 p5','p.id = p5.pescador_id','left');
    $this->db->where('p5.S5_10_2' ,$a);        
    if(!is_null($b)){
    $this->db->where('p.CCDD',$b);
    }   
    $q = $this->db->get();
    return $q;
}


function get_report58($a = null, $b = null){
    $this->db->select('COUNT(p.CCDD) as num');
    $this->db->from('pescador p');
    $this->db->join('pesc_seccion5 p5','p.id = p5.pescador_id','left');
    $this->db->where('p5.S5_10_3' ,$a);        
    if(!is_null($b)){
    $this->db->where('p.CCDD',$b);
    }   
    $q = $this->db->get();
    return $q;
}

function get_report59($a = null, $b = null){
    $this->db->select('COUNT(p.CCDD) as num');
    $this->db->from('pescador p');
    $this->db->join('pesc_seccion6 p6','p.id = p6.pescador_id','left');
    $this->db->where('p6.S6_1' ,$a);        
    if(!is_null($b)){
    $this->db->where('p.CCDD',$b);
    }   
    $q = $this->db->get();
    return $q;
}

function get_report60($a = null, $b = null){
    $this->db->select('COUNT(p.CCDD) as num');
    $this->db->from('pescador p');
    $this->db->join('pesc_seccion6 p6','p.id = p6.pescador_id','left');
        if ($a>=1 && $a<=6) {
    $this->db->where('p6.S6_3_' . $a,1);  }   
        if ($a == 7) {
    $this->db->where('p6.S6_3_1',9);  }  
        if ($a == 999) {
    $this->db->where('p6.S6_3_1 is not null');  }    
    if(!is_null($b)){
    $this->db->where('p.CCDD',$b);
    }   
    $q = $this->db->get();
    return $q;
}

function get_report61($a = null, $b = null){
    $this->db->select('COUNT(p.CCDD) as num');
    $this->db->from('pescador p');
    $this->db->join('pesc_seccion6 p6','p.id = p6.pescador_id','left');
    $this->db->where('p6.S6_4',$a);        
    if(!is_null($b)){
    $this->db->where('p.CCDD',$b);
    }   
    $q = $this->db->get();
    return $q;
}


function get_report62($a = null, $b = null){
    $this->db->select('COUNT(p.CCDD) as num');
    $this->db->from('pescador p');
    $this->db->join('pesc_seccion6 p6','p.id = p6.pescador_id','left');
    $this->db->where('p6.S6_5',$a);        
    if(!is_null($b)){
    $this->db->where('p.CCDD',$b);
    }   
    $q = $this->db->get();
    return $q;
}


function get_report63($a = null, $b = null){
    $this->db->select('COUNT(p.CCDD) as num');
    $this->db->from('pescador p');
    $this->db->join('pesc_seccion6 p6','p.id = p6.pescador_id','left');
    $this->db->where('p6.S6_6',$a);        
    if(!is_null($b)){
    $this->db->where('p.CCDD',$b);
    }   
    $q = $this->db->get();
    return $q;
}

function get_report64($a = null, $b = null){
    $this->db->select('COUNT(p.CCDD) as num');
    $this->db->from('pescador p');
    $this->db->join('pesc_seccion7 p7','p.id = p7.pescador_id','left');
        if ($a>=1 && $a<=4) {
    $this->db->where('p7.S7_10' . $a,1);  }
        if ($a==5) {
    $this->db->where('p7.S7_101',9);  }  
        if ($a==999) {
    $this->db->where('p7.S7_101 is not null');  }      
    if(!is_null($b)){
    $this->db->where('p.CCDD',$b);
    }   
    $q = $this->db->get();
    return $q;
}


function get_report65($a = null, $b = null){
    $this->db->select('COUNT(p.CCDD) as num');
    $this->db->from('pescador p');
    $this->db->join('pesc_seccion7 p7','p.id = p7.pescador_id','left');
    $this->db->where('p7.S7_101',1); 
        if ($a>=1 && $a<=6) {       
    $this->db->where('p7.S7_20' . $a,1);  }
        if ($a==7) {       
    $this->db->where('p7.S7_201',9);  } 
        if ($a==999) {       
    $this->db->where('p7.S7_201 is not null');  } 
    if(!is_null($b)){
    $this->db->where('p.CCDD',$b);
    }   
    $q = $this->db->get();
    return $q;
}


function get_report66($a = null, $b = null){
    $this->db->select('COUNT(p.CCDD) as num');
    $this->db->from('pescador p');
    $this->db->join('pesc_seccion7 p7','p.id = p7.pescador_id','left');   
        if ($a>=1 && $a<=12) { 
    $this->db->where('p7.S7_3_' . $a,1); }
        if ($a==13) { 
    $this->db->where('p7.S7_3_1',9); }  
        if ($a==999) { 
    $this->db->where('p7.S7_3_1 is not null'); }          
    if(!is_null($b)){
    $this->db->where('p.CCDD',$b);
    }   
    $q = $this->db->get();
    return $q;
}

function get_report67($a = null, $b = null){
    $this->db->select('COUNT(p.CCDD) as num');
    $this->db->from('pescador p');
    $this->db->join('pesc_seccion7 p7','p.id = p7.pescador_id','left');  
        if ($a>=1 && $a<=4) {    
    $this->db->where('p7.S7_4_' . $a,1); }      
        if ($a==5) {    
    $this->db->where('p7.S7_4_1',9); }   
        if ($a==999) {    
    $this->db->where('p7.S7_4_1 is not null'); }   
    if(!is_null($b)){
    $this->db->where('p.CCDD',$b);
    }   
    $q = $this->db->get();
    return $q;
}

function get_report68(){                    /* TABULADO N° 68 -------------------------- PECES QUE VENDIERON -------------------------*/
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

function get_report69($a = null, $b = null){
    $this->db->select('COUNT(p.CCDD) as num');
    $this->db->from('pescador p');
    $this->db->join('pesc_seccion7 p7','p.id = p7.pescador_id','left');     
    $this->db->where('p7.S7_6_1',$a);        
    if(!is_null($b)){
    $this->db->where('p.CCDD',$b);
    }   
    $q = $this->db->get();
    return $q;
}





function get_report70($a = null, $b = null){
    $this->db->select('COUNT(p.CCDD) as num');
    $this->db->from('pescador p');
    $this->db->join('pesc_seccion7 p7','p.id = p7.pescador_id','left');   
        if ($a>=1 && $a<=4) {     
    $this->db->where('p7.S7_7_' . $a,1); }   
        if ($a==5) {     
    $this->db->where('p7.S7_7_1',9); } 
        if ($a==999) {     
    $this->db->where('p7.S7_7_1 is not null'); }      
    if(!is_null($b)){
    $this->db->where('p.CCDD',$b);
    }   
    $q = $this->db->get();
    return $q;
}

function get_report71($a = null, $b = null){
    $this->db->select('COUNT(p.CCDD) as num');
    $this->db->from('pescador p');
    $this->db->join('pesc_seccion7 p7','p.id = p7.pescador_id','left');   
        if ($a>=1 && $a<=6) {    
    $this->db->where('p7.S7_8_' . $a,1);   }    
        if ($a==7) {    
    $this->db->where('p7.S7_8_1',9);   }  
        if ($a==999) {    
    $this->db->where('p7.S7_8_1 is not null');   }  
    if(!is_null($b)){
    $this->db->where('p.CCDD',$b);
    }   
    $q = $this->db->get();
    return $q;
}

function get_report72($a = null, $b = null){
    $this->db->select('COUNT(p.CCDD) as num');
    $this->db->from('pescador p');
    $this->db->join('pesc_seccion7 p7','p.id = p7.pescador_id','left'); 
        if ($a>=1 && $a<=4) {      
    $this->db->where('p7.S7_9_' . $a,1);    }   
        if ($a==5) {      
    $this->db->where('p7.S7_9_1' ,9);    }  
        if ($a==999) {      
    $this->db->where('p7.S7_9_1 is not null');    }  
    if(!is_null($b)){
    $this->db->where('p.CCDD',$b);
    }   
    $q = $this->db->get();
    return $q;
}


function get_report73($a = null, $b = null){
    $this->db->select('COUNT(p.CCDD) as num');
    $this->db->from('pescador p');
    $this->db->join('pesc_seccion7 p7','p.id = p7.pescador_id','left');  
        if ($a>=1 && $a<=4) {    
    $this->db->where('p7.S7_10_' . $a,1);    }
        if ($a==5) {    
    $this->db->where('p7.S7_10_1',9);    } 
        if ($a==999) {    
    $this->db->where('p7.S7_10_1 is not null');    } 
    if(!is_null($b)){
    $this->db->where('p.CCDD',$b);
    }   
    $q = $this->db->get();
    return $q;
}

function get_report74($a = null, $b = null){
    $this->db->select('COUNT(p.CCDD) as num');
    $this->db->from('pescador p');
    $this->db->join('pesc_seccion8 p8','p.id = p8.pescador_id','left'); 
        if ($a>=1 && $a<=9) {     
    $this->db->where('p8.S8_1_' . $a,1); } 
        if ($a==10) {     
    $this->db->where('p8.S8_1_1' ,9); } 
        if ($a==999) {     
    $this->db->where('p8.S8_1_1 is not null'); }         
    if(!is_null($b)){
    $this->db->where('p.CCDD',$b);
    }   
    $q = $this->db->get();
    return $q;
}

function get_report75($a = null, $b = null){
    $this->db->select('COUNT(p.CCDD) as num');
    $this->db->from('pescador p');
    $this->db->join('pesc_seccion8 p8','p.id = p8.pescador_id','left');     
    $this->db->where('p8.S8_2', $a);        
    if(!is_null($b)){
    $this->db->where('p.CCDD',$b);
    }   
    $q = $this->db->get();
    return $q;
}

function get_report76($a = null, $b = null){
    $this->db->select('COUNT(p.CCDD) as num');
    $this->db->from('pescador p');
    $this->db->join('pesc_seccion8 p8','p.id = p8.pescador_id','left');   
        if ($a>=1 && $a<=10) { 
    $this->db->where('p8.S8_3_' . $a, 1); }  
        if ($a==11) { 
    $this->db->where('p8.S8_3_1', 9); } 
        if ($a==999) { 
    $this->db->where('p8.S8_3_1 is not null'); }      
    if(!is_null($b)){
    $this->db->where('p.CCDD',$b);
    }   
    $q = $this->db->get();
    return $q;
}

function get_report77($a = null, $b = null){
    $this->db->select('COUNT(p.CCDD) as num');
    $this->db->from('pescador p');
    $this->db->join('pesc_seccion8 p8','p.id = p8.pescador_id','left');    
        if ($a>=1 && $a<=9) {  
    $this->db->where('p8.S8_4_' . $a, 1);  }   
        if ($a==10) {   
    $this->db->where('p8.S8_4_1' , 9);  }  
        if ($a==999) {   
    $this->db->where('p8.S8_4_1 is not null');  } 
    if(!is_null($b)){
    $this->db->where('p.CCDD',$b);
    }   
    $q = $this->db->get();
    return $q;
}

function get_report78($a = null, $b = null){
    $this->db->select('COUNT(p.CCDD) as num');
    $this->db->from('pescador p');
    $this->db->join('pesc_seccion8 p8','p.id = p8.pescador_id','left');     
    $this->db->where('p8.S8_6_1' , $a);        
    if(!is_null($b)){
    $this->db->where('p.CCDD',$b);
    }   
    $q = $this->db->get();
    return $q;
}

function get_report79($a = null, $b = null){
    $this->db->select('COUNT(p.CCDD) as num');
    $this->db->from('pescador p');
    $this->db->join('pesc_seccion8 p8','p.id = p8.pescador_id','left');     
    $this->db->where('p8.S8_6_2' , $a);        
    if(!is_null($b)){
    $this->db->where('p.CCDD',$b);
    }   
    $q = $this->db->get();
    return $q;
}

function get_report80($a = null, $b = null){
    $this->db->select('COUNT(p.CCDD) as num');
    $this->db->from('pescador p');
    $this->db->join('pesc_seccion8 p8','p.id = p8.pescador_id','left');     
    $this->db->where('p8.S8_6_3' , $a);        
    if(!is_null($b)){
    $this->db->where('p.CCDD',$b);
    }   
    $q = $this->db->get();
    return $q;
}


function get_report81($a = null, $b = null){
    $this->db->select('COUNT(p.CCDD) as num');
    $this->db->from('pescador p');
    $this->db->join('pesc_seccion8 p8','p.id = p8.pescador_id','left');     
    $this->db->where('p8.S8_6_4' , $a);        
    if(!is_null($b)){
    $this->db->where('p.CCDD',$b);
    }   
    $q = $this->db->get();
    return $q;
}

function get_report82($a = null, $b = null){
    $this->db->select('COUNT(p.CCDD) as num');
    $this->db->from('pescador p');
    $this->db->join('pesc_seccion8 p8','p.id = p8.pescador_id','left');     
    $this->db->where('p8.S8_6_5' , $a);        
    if(!is_null($b)){
    $this->db->where('p.CCDD',$b);
    }   
    $q = $this->db->get();
    return $q;
}

function get_report83($a = null, $b = null){
    $this->db->select('COUNT(p.CCDD) as num');
    $this->db->from('pescador p');
    $this->db->join('pesc_seccion8 p8','p.id = p8.pescador_id','left');     
    $this->db->where('p8.S8_6_6' , $a);        
    if(!is_null($b)){
    $this->db->where('p.CCDD',$b);
    }   
    $q = $this->db->get();
    return $q;
}

function get_report84($a = null, $b = null){
    $this->db->select('COUNT(p.CCDD) as num');
    $this->db->from('pescador p');
    $this->db->join('pesc_seccion9 p9','p.id = p9.pescador_id','left');     
    $this->db->where('p9.S9_1' , $a);        
    if(!is_null($b)){
    $this->db->where('p.CCDD',$b);
    }   
    $q = $this->db->get();
    return $q;
}

function get_report85($a = null, $b = null){
    $this->db->select('COUNT(p.CCDD) as num');
    $this->db->from('pescador p');
    $this->db->join('pesc_seccion9 p9','p.id = p9.pescador_id','left');     
    $this->db->where('p9.S9_2' , $a);        
    if(!is_null($b)){
    $this->db->where('p.CCDD',$b);
    }   
    $q = $this->db->get();
    return $q;
}

function get_report86($a = null){
    $this->db->select('p9.S9_4_1,p9.S9_4_2,p9.S9_4_3,p9.S9_4_4,p9.S9_4_5,p9.S9_4_6');
    $this->db->from('pescador p');
    $this->db->join('pesc_seccion9 p9','p.id = p9.pescador_id','left');     
    if(!is_null($a)){
    $this->db->where('p.CCDD',$a);
    }   
    $q = $this->db->get();
    return $q;
}

function get_report87($a = null){
    $this->db->select('p9.S9_5_1,p9.S9_5_2,p9.S9_5_3,p9.S9_5_4,p9.S9_5_5,p9.S9_5_6');
    $this->db->from('pescador p');
    $this->db->join('pesc_seccion9 p9','p.id = p9.pescador_id','left');     
    if(!is_null($a)){
    $this->db->where('p.CCDD',$a);
    }   
    $q = $this->db->get();
    return $q;
}

function get_report88($a = null){
    $this->db->select('p9.S9_6_1,p9.S9_6_2,p9.S9_6_3,p9.S9_6_4,p9.S9_6_5,p9.S9_6_6');
    $this->db->from('pescador p');
    $this->db->join('pesc_seccion9 p9','p.id = p9.pescador_id','left');     
    if(!is_null($a)){
    $this->db->where('p.CCDD',$a);
    }   
    $q = $this->db->get();
    return $q;
}

function get_report89($a = null){
    $this->db->select('p9.S9_7_1,p9.S9_7_2,p9.S9_7_3,p9.S9_7_4,p9.S9_7_5,p9.S9_7_6');
    $this->db->from('pescador p');
    $this->db->join('pesc_seccion9 p9','p.id = p9.pescador_id','left');     
    if(!is_null($a)){
    $this->db->where('p.CCDD',$a);
    }   
    $q = $this->db->get();
    return $q;
}


function get_report90($a = null){
    $this->db->select('p9.S9_9_1_A,p9.S9_9_1_M,p9.S9_9_2_A,p9.S9_9_2_M,p9.S9_9_3_A,p9.S9_9_3_M,p9.S9_9_4_A,p9.S9_9_4_M,p9.S9_9_5_A,p9.S9_9_5_M,p9.S9_9_6_A,p9.S9_9_6_M');
    $this->db->from('pescador p');
    $this->db->join('pesc_seccion9 p9','p.id = p9.pescador_id','left');     
    if(!is_null($a)){
    $this->db->where('p.CCDD',$a);
    }   
    $q = $this->db->get();
    return $q;
}

function get_report91($a = null){
        $this->db->select('p9.S9_11_1,p9.S9_11_2,p9.S9_11_3,p9.S9_11_4,p9.S9_11_5,p9.S9_11_6');
    $this->db->from('pescador p');
    $this->db->join('pesc_seccion9 p9','p.id = p9.pescador_id','left');     
    if(!is_null($a)){
    $this->db->where('p.CCDD',$a);
    }   
    $q = $this->db->get();
    return $q;
}

function get_report92($a = null){
        $this->db->select('p9.S9_12_1,p9.S9_12_2,p9.S9_12_3,p9.S9_12_4,p9.S9_12_5,p9.S9_12_6');
    $this->db->from('pescador p');
    $this->db->join('pesc_seccion9 p9','p.id = p9.pescador_id','left');     
    if(!is_null($a)){
    $this->db->where('p.CCDD',$a);
    }   
    $q = $this->db->get();
    return $q;
}


function get_report93($a = null){
        $this->db->select('p9.S9_13_1,p9.S9_13_2,p9.S9_13_3,p9.S9_13_4,p9.S9_13_5,p9.S9_13_6');
    $this->db->from('pescador p');
    $this->db->join('pesc_seccion9 p9','p.id = p9.pescador_id','left');     
    if(!is_null($a)){
    $this->db->where('p.CCDD',$a);
    }   
    $q = $this->db->get();
    return $q;
}


function get_report94($a = null){
        $this->db->select('p9.S9_15_1,p9.S9_15_2,p9.S9_15_3,p9.S9_15_4,p9.S9_15_5,p9.S9_15_6');
    $this->db->from('pescador p');
    $this->db->join('pesc_seccion9 p9','p.id = p9.pescador_id','left');     
    if(!is_null($a)){
    $this->db->where('p.CCDD',$a);
    }   
    $q = $this->db->get();
    return $q;
}

function get_report95($a = null){
        $this->db->select('p9.S9_16_1,p9.S9_16_2,p9.S9_16_3,p9.S9_16_4,p9.S9_16_5,p9.S9_16_6');
    $this->db->from('pescador p');
    $this->db->join('pesc_seccion9 p9','p.id = p9.pescador_id','left');     
    if(!is_null($a)){
    $this->db->where('p.CCDD',$a);
    }   
    $q = $this->db->get();
    return $q;
}


function get_report96($a = null){
        $this->db->select('p9.S9_18_1,p9.S9_18_2,p9.S9_18_3,p9.S9_18_4,p9.S9_18_5,p9.S9_18_6');
    $this->db->from('pescador p');
    $this->db->join('pesc_seccion9 p9','p.id = p9.pescador_id','left');     
    if(!is_null($a)){
    $this->db->where('p.CCDD',$a);
    }   
    $q = $this->db->get();
    return $q;
}

function get_report97($a = null){
        $this->db->select('p9.S9_20_1_T,p9.S9_20_2_T,p9.S9_20_3_T,p9.S9_20_4_T,p9.S9_20_5_T,p9.S9_20_6_T');
    $this->db->from('pescador p');
    $this->db->join('pesc_seccion9 p9','p.id = p9.pescador_id','left');     
    if(!is_null($a)){
    $this->db->where('p.CCDD',$a);
    }   
    $q = $this->db->get();
    return $q;
}

function get_report98($a = null){
        $this->db->select('p9.S9_21_1,p9.S9_21_2,p9.S9_21_3,p9.S9_21_4,p9.S9_21_5,p9.S9_21_6');
    $this->db->from('pescador p');
    $this->db->join('pesc_seccion9 p9','p.id = p9.pescador_id','left');     
    if(!is_null($a)){
    $this->db->where('p.CCDD',$a);
    }   
    $q = $this->db->get();
    return $q;
}

function get_report99($a = null){
        $this->db->select('p9.S9_23_1,p9.S9_23_2,p9.S9_23_3,p9.S9_23_4,p9.S9_23_5,p9.S9_23_6');
    $this->db->from('pescador p');
    $this->db->join('pesc_seccion9 p9','p.id = p9.pescador_id','left');     
    if(!is_null($a)){
    $this->db->where('p.CCDD',$a);
    }   
    $q = $this->db->get();
    return $q;
}
}
?>