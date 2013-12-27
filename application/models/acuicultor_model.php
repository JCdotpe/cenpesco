<?php 
/**
* 
*/
class Acuicultor_model extends CI_MODEL
{

  /////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
  // T A B U L A D O S  ///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
  /////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

function get_tabulado_100()
{     /* TABULADO N° 101 - sexo*/
      $q = $this->db->query('
          select 
          DEP.CCDD, DEPARTAMENTO,  C0.t AS TOTAL,  
          COALESCE(C1.t,0) as HOMBRE, COALESCE(C2.t,0) as MUJER, COALESCE(C3.t,0) as NEP 
          from (select  distinct(departamento), ccdd from departamentos_tab order by departamento) as DEP 
          left join (select ccdd,  count(*) as t  from acu_seccion1 a inner join acu_seccion2 s on a.id1 = s.id2  where S2_4 is not null group by nom_dd) as C0 on DEP.ccdd  = C0.ccdd 
          left join (select ccdd,  count(*) as t  from acu_seccion1 a inner join acu_seccion2 s on a.id1 = s.id2  where S2_4 = 1 group by nom_dd ) as C1 on DEP.ccdd  = C1.ccdd 
          left join (select ccdd,  count(*) as t  from acu_seccion1 a inner join acu_seccion2 s on a.id1 = s.id2  where S2_4 = 2 group by nom_dd ) as C2 on DEP.ccdd  = C2.ccdd 
          left join (select ccdd,  count(*) as t  from acu_seccion1 a inner join acu_seccion2 s on a.id1 = s.id2  where S2_4 = 9 group by nom_dd ) as C3 on DEP.ccdd  = C3.ccdd  ;
        ');
      return $q;
}

function get_tabulado_101()
{          /* TABULADO N° 101 - tipo de persona*/
      $q = $this->db->query("
          select 
          DEP.CCDD, DEPARTAMENTO,  C0.t AS TOTAL,  
          COALESCE(C1.t,0) as 'NATURAL', COALESCE(C2.t,0) as JURIDICA, COALESCE(C3.t,0) as NEP 
          from (select  distinct(departamento), ccdd from departamentos_tab order by departamento) as DEP 
          left join (select ccdd,  count(*) as t  from acu_seccion1 a inner join acu_seccion2 s on a.id1 = s.id2  where S2_2 is not null group by nom_dd) as C0 on DEP.ccdd  = C0.ccdd 
          left join (select ccdd,  count(*) as t  from acu_seccion1 a inner join acu_seccion2 s on a.id1 = s.id2  where S2_2 = 1 group by nom_dd ) as C1 on DEP.ccdd  = C1.ccdd 
          left join (select ccdd,  count(*) as t  from acu_seccion1 a inner join acu_seccion2 s on a.id1 = s.id2  where S2_2 = 2 group by nom_dd ) as C2 on DEP.ccdd  = C2.ccdd 
          left join (select ccdd,  count(*) as t  from acu_seccion1 a inner join acu_seccion2 s on a.id1 = s.id2  where S2_2 = 9 group by nom_dd ) as C3 on DEP.ccdd  = C3.ccdd  ;
        ");
      return $q;
}

function get_tabulado_102()
{          /* TABULADO N° 102 - lugar de nacimiento*/
      $q = $this->db->query('
          select 
          DEP.CCDD, DEPARTAMENTO,  COALESCE(C0.t,0) AS TOTAL,  
          COALESCE(C1.t,0) as AMAZONAS, COALESCE(C2.t,0) as ANCASH, COALESCE(C3.t,0) as APURIMAC, COALESCE(C4.t,0) as AREQUIPA, COALESCE(C5.t,0) as AYACUCHO,
          COALESCE(C6.t,0) as CAJAMARCA, COALESCE(C7.t,0) as CALLAO, COALESCE(C8.t,0) as CUSCO, COALESCE(C9.t,0) as HUANCAVELICA, COALESCE(C10.t,0) as HUANUCO, COALESCE(C11.t,0) as ICA,
          COALESCE(C12.t,0) as JUNIN, COALESCE(C13.t,0) as LA_LIBERTAD, COALESCE(C14.t,0) as LAMBAYEQUE, COALESCE(C15.t,0) as LIMA, COALESCE(C16.t,0) as LORETO,
          COALESCE(C17.t,0) as MADRE_DE_DIOS, COALESCE(C18.t,0) as MOQUEGUA, COALESCE(C19.t,0) as PASCO, COALESCE(C20.t,0) as PIURA, COALESCE(C21.t,0) as PUNO,
          COALESCE(C22.t,0) as SAN_MARTIN, COALESCE(C23.t,0) as TACNA, COALESCE(C24.t,0) as TUMBES, COALESCE(C25.t,0) as UCAYALI, COALESCE(C26.t,0) as OTROS_PAISES       
          from (select  distinct(departamento), ccdd from departamentos_tab order by departamento) as DEP 
          left join (select ccdd,  count(*) as t  from acu_seccion1 a inner join acu_seccion2 s on a.id1 = s.id2  where s2_11_dd_cod is not null   group by nom_dd) as C0 on DEP.ccdd  = C0.ccdd 
          left join (select ccdd,  count(*) as t  from acu_seccion1 a inner join acu_seccion2 s on a.id1 = s.id2  where s2_11_dd_cod = 01 group by nom_dd ) as C1 on DEP.ccdd  = C1.ccdd 
          left join (select ccdd,  count(*) as t  from acu_seccion1 a inner join acu_seccion2 s on a.id1 = s.id2  where s2_11_dd_cod = 02 group by nom_dd ) as C2 on DEP.ccdd  = C2.ccdd 
          left join (select ccdd,  count(*) as t  from acu_seccion1 a inner join acu_seccion2 s on a.id1 = s.id2  where s2_11_dd_cod = 03 group by nom_dd ) as C3 on DEP.ccdd  = C3.ccdd 
          left join (select ccdd,  count(*) as t  from acu_seccion1 a inner join acu_seccion2 s on a.id1 = s.id2  where s2_11_dd_cod = 04 group by nom_dd ) as C4 on DEP.ccdd  = C4.ccdd 
          left join (select ccdd,  count(*) as t  from acu_seccion1 a inner join acu_seccion2 s on a.id1 = s.id2  where s2_11_dd_cod = 05 group by nom_dd ) as C5 on DEP.ccdd  = C5.ccdd 
          left join (select ccdd,  count(*) as t  from acu_seccion1 a inner join acu_seccion2 s on a.id1 = s.id2  where s2_11_dd_cod = 06 group by nom_dd ) as C6 on DEP.ccdd  = C6.ccdd 
          left join (select ccdd,  count(*) as t  from acu_seccion1 a inner join acu_seccion2 s on a.id1 = s.id2  where s2_11_dd_cod = 07 group by nom_dd ) as C7 on DEP.ccdd  = C7.ccdd 
          left join (select ccdd,  count(*) as t  from acu_seccion1 a inner join acu_seccion2 s on a.id1 = s.id2  where s2_11_dd_cod = 08 group by nom_dd ) as C8 on DEP.ccdd  = C8.ccdd 
          left join (select ccdd,  count(*) as t  from acu_seccion1 a inner join acu_seccion2 s on a.id1 = s.id2  where s2_11_dd_cod = 09 group by nom_dd ) as C9 on DEP.ccdd  = C9.ccdd 
          left join (select ccdd,  count(*) as t  from acu_seccion1 a inner join acu_seccion2 s on a.id1 = s.id2  where s2_11_dd_cod = 10 group by nom_dd ) as C10 on DEP.ccdd  = C10.ccdd 
          left join (select ccdd,  count(*) as t  from acu_seccion1 a inner join acu_seccion2 s on a.id1 = s.id2  where s2_11_dd_cod = 11 group by nom_dd ) as C11 on DEP.ccdd  = C11.ccdd 
          left join (select ccdd,  count(*) as t  from acu_seccion1 a inner join acu_seccion2 s on a.id1 = s.id2  where s2_11_dd_cod = 12 group by nom_dd ) as C12 on DEP.ccdd  = C12.ccdd 
          left join (select ccdd,  count(*) as t  from acu_seccion1 a inner join acu_seccion2 s on a.id1 = s.id2  where s2_11_dd_cod = 13 group by nom_dd ) as C13 on DEP.ccdd  = C13.ccdd 
          left join (select ccdd,  count(*) as t  from acu_seccion1 a inner join acu_seccion2 s on a.id1 = s.id2  where s2_11_dd_cod = 14 group by nom_dd ) as C14 on DEP.ccdd  = C14.ccdd 
          left join (select ccdd,  count(*) as t  from acu_seccion1 a inner join acu_seccion2 s on a.id1 = s.id2  where s2_11_dd_cod = 15 group by nom_dd ) as C15 on DEP.ccdd  = C15.ccdd 
          left join (select ccdd,  count(*) as t  from acu_seccion1 a inner join acu_seccion2 s on a.id1 = s.id2  where s2_11_dd_cod = 16 group by nom_dd ) as C16 on DEP.ccdd  = C16.ccdd 
          left join (select ccdd,  count(*) as t  from acu_seccion1 a inner join acu_seccion2 s on a.id1 = s.id2  where s2_11_dd_cod = 17 group by nom_dd ) as C17 on DEP.ccdd  = C17.ccdd 
          left join (select ccdd,  count(*) as t  from acu_seccion1 a inner join acu_seccion2 s on a.id1 = s.id2  where s2_11_dd_cod = 18 group by nom_dd ) as C18 on DEP.ccdd  = C18.ccdd 
          left join (select ccdd,  count(*) as t  from acu_seccion1 a inner join acu_seccion2 s on a.id1 = s.id2  where s2_11_dd_cod = 19 group by nom_dd ) as C19 on DEP.ccdd  = C19.ccdd 
          left join (select ccdd,  count(*) as t  from acu_seccion1 a inner join acu_seccion2 s on a.id1 = s.id2  where s2_11_dd_cod = 20 group by nom_dd ) as C20 on DEP.ccdd  = C20.ccdd 
          left join (select ccdd,  count(*) as t  from acu_seccion1 a inner join acu_seccion2 s on a.id1 = s.id2  where s2_11_dd_cod = 21 group by nom_dd ) as C21 on DEP.ccdd  = C21.ccdd 
          left join (select ccdd,  count(*) as t  from acu_seccion1 a inner join acu_seccion2 s on a.id1 = s.id2  where s2_11_dd_cod = 22 group by nom_dd ) as C22 on DEP.ccdd  = C22.ccdd 
          left join (select ccdd,  count(*) as t  from acu_seccion1 a inner join acu_seccion2 s on a.id1 = s.id2  where s2_11_dd_cod = 23 group by nom_dd ) as C23 on DEP.ccdd  = C23.ccdd 
          left join (select ccdd,  count(*) as t  from acu_seccion1 a inner join acu_seccion2 s on a.id1 = s.id2  where s2_11_dd_cod = 24 group by nom_dd ) as C24 on DEP.ccdd  = C24.ccdd 
          left join (select ccdd,  count(*) as t  from acu_seccion1 a inner join acu_seccion2 s on a.id1 = s.id2  where s2_11_dd_cod = 25 group by nom_dd ) as C25 on DEP.ccdd  = C25.ccdd 
          left join (select ccdd,  count(*) as t  from acu_seccion1 a inner join acu_seccion2 s on a.id1 = s.id2  where s2_11_dd_cod > 25 and s2_11_dd_cod<>4028 group by nom_dd ) as C26 on DEP.ccdd  = C26.ccdd ;
        ');
      return $q;
}

function get_tabulado_103()
{          /* TABULADO N° 103 - lugar de residencia en el 2007*/
      $q = $this->db->query('
          select 
          DEP.CCDD, DEPARTAMENTO,  COALESCE(C0.t,0) AS TOTAL,  
          COALESCE(C1.t,0) as AMAZONAS, COALESCE(C2.t,0) as ANCASH, COALESCE(C3.t,0) as APURIMAC, COALESCE(C4.t,0) as AREQUIPA, COALESCE(C5.t,0) as AYACUCHO,
          COALESCE(C6.t,0) as CAJAMARCA, COALESCE(C7.t,0) as CALLAO, COALESCE(C8.t,0) as CUSCO, COALESCE(C9.t,0) as HUANCAVELICA, COALESCE(C10.t,0) as HUANUCO, COALESCE(C11.t,0) as ICA,
          COALESCE(C12.t,0) as JUNIN, COALESCE(C13.t,0) as LA_LIBERTAD, COALESCE(C14.t,0) as LAMBAYEQUE, COALESCE(C15.t,0) as LIMA, COALESCE(C16.t,0) as LORETO,
          COALESCE(C17.t,0) as MADRE_DE_DIOS, COALESCE(C18.t,0) as MOQUEGUA, COALESCE(C19.t,0) as PASCO, COALESCE(C20.t,0) as PIURA, COALESCE(C21.t,0) as PUNO,
          COALESCE(C22.t,0) as SAN_MARTIN, COALESCE(C23.t,0) as TACNA, COALESCE(C24.t,0) as TUMBES, COALESCE(C25.t,0) as UCAYALI, COALESCE(C26.t,0) as OTROS_PAISES         
          from (select  distinct(departamento), ccdd from departamentos_tab order by departamento) as DEP 
          left join (select ccdd,  count(*) as t  from acu_seccion1 a inner join acu_seccion2 s on a.id1 = s.id2  where s2_12_dd_cod is not null  and  s2_12_dd_cod between 1 and 25 group by nom_dd) as C0 on DEP.ccdd  = C0.ccdd 
          left join (select ccdd,  count(*) as t  from acu_seccion1 a inner join acu_seccion2 s on a.id1 = s.id2  where s2_12_dd_cod = 01 group by nom_dd ) as C1 on DEP.ccdd  = C1.ccdd 
          left join (select ccdd,  count(*) as t  from acu_seccion1 a inner join acu_seccion2 s on a.id1 = s.id2  where s2_12_dd_cod = 02 group by nom_dd ) as C2 on DEP.ccdd  = C2.ccdd 
          left join (select ccdd,  count(*) as t  from acu_seccion1 a inner join acu_seccion2 s on a.id1 = s.id2  where s2_12_dd_cod = 03 group by nom_dd ) as C3 on DEP.ccdd  = C3.ccdd 
          left join (select ccdd,  count(*) as t  from acu_seccion1 a inner join acu_seccion2 s on a.id1 = s.id2  where s2_12_dd_cod = 04 group by nom_dd ) as C4 on DEP.ccdd  = C4.ccdd 
          left join (select ccdd,  count(*) as t  from acu_seccion1 a inner join acu_seccion2 s on a.id1 = s.id2  where s2_12_dd_cod = 05 group by nom_dd ) as C5 on DEP.ccdd  = C5.ccdd 
          left join (select ccdd,  count(*) as t  from acu_seccion1 a inner join acu_seccion2 s on a.id1 = s.id2  where s2_12_dd_cod = 06 group by nom_dd ) as C6 on DEP.ccdd  = C6.ccdd 
          left join (select ccdd,  count(*) as t  from acu_seccion1 a inner join acu_seccion2 s on a.id1 = s.id2  where s2_12_dd_cod = 07 group by nom_dd ) as C7 on DEP.ccdd  = C7.ccdd 
          left join (select ccdd,  count(*) as t  from acu_seccion1 a inner join acu_seccion2 s on a.id1 = s.id2  where s2_12_dd_cod = 08 group by nom_dd ) as C8 on DEP.ccdd  = C8.ccdd 
          left join (select ccdd,  count(*) as t  from acu_seccion1 a inner join acu_seccion2 s on a.id1 = s.id2  where s2_12_dd_cod = 09 group by nom_dd ) as C9 on DEP.ccdd  = C9.ccdd 
          left join (select ccdd,  count(*) as t  from acu_seccion1 a inner join acu_seccion2 s on a.id1 = s.id2  where s2_12_dd_cod = 10 group by nom_dd ) as C10 on DEP.ccdd  = C10.ccdd 
          left join (select ccdd,  count(*) as t  from acu_seccion1 a inner join acu_seccion2 s on a.id1 = s.id2  where s2_12_dd_cod = 11 group by nom_dd ) as C11 on DEP.ccdd  = C11.ccdd 
          left join (select ccdd,  count(*) as t  from acu_seccion1 a inner join acu_seccion2 s on a.id1 = s.id2  where s2_12_dd_cod = 12 group by nom_dd ) as C12 on DEP.ccdd  = C12.ccdd 
          left join (select ccdd,  count(*) as t  from acu_seccion1 a inner join acu_seccion2 s on a.id1 = s.id2  where s2_12_dd_cod = 13 group by nom_dd ) as C13 on DEP.ccdd  = C13.ccdd 
          left join (select ccdd,  count(*) as t  from acu_seccion1 a inner join acu_seccion2 s on a.id1 = s.id2  where s2_12_dd_cod = 14 group by nom_dd ) as C14 on DEP.ccdd  = C14.ccdd 
          left join (select ccdd,  count(*) as t  from acu_seccion1 a inner join acu_seccion2 s on a.id1 = s.id2  where s2_12_dd_cod = 15 group by nom_dd ) as C15 on DEP.ccdd  = C15.ccdd 
          left join (select ccdd,  count(*) as t  from acu_seccion1 a inner join acu_seccion2 s on a.id1 = s.id2  where s2_12_dd_cod = 16 group by nom_dd ) as C16 on DEP.ccdd  = C16.ccdd 
          left join (select ccdd,  count(*) as t  from acu_seccion1 a inner join acu_seccion2 s on a.id1 = s.id2  where s2_12_dd_cod = 17 group by nom_dd ) as C17 on DEP.ccdd  = C17.ccdd 
          left join (select ccdd,  count(*) as t  from acu_seccion1 a inner join acu_seccion2 s on a.id1 = s.id2  where s2_12_dd_cod = 18 group by nom_dd ) as C18 on DEP.ccdd  = C18.ccdd 
          left join (select ccdd,  count(*) as t  from acu_seccion1 a inner join acu_seccion2 s on a.id1 = s.id2  where s2_12_dd_cod = 19 group by nom_dd ) as C19 on DEP.ccdd  = C19.ccdd 
          left join (select ccdd,  count(*) as t  from acu_seccion1 a inner join acu_seccion2 s on a.id1 = s.id2  where s2_12_dd_cod = 20 group by nom_dd ) as C20 on DEP.ccdd  = C20.ccdd 
          left join (select ccdd,  count(*) as t  from acu_seccion1 a inner join acu_seccion2 s on a.id1 = s.id2  where s2_12_dd_cod = 21 group by nom_dd ) as C21 on DEP.ccdd  = C21.ccdd 
          left join (select ccdd,  count(*) as t  from acu_seccion1 a inner join acu_seccion2 s on a.id1 = s.id2  where s2_12_dd_cod = 22 group by nom_dd ) as C22 on DEP.ccdd  = C22.ccdd 
          left join (select ccdd,  count(*) as t  from acu_seccion1 a inner join acu_seccion2 s on a.id1 = s.id2  where s2_12_dd_cod = 23 group by nom_dd ) as C23 on DEP.ccdd  = C23.ccdd 
          left join (select ccdd,  count(*) as t  from acu_seccion1 a inner join acu_seccion2 s on a.id1 = s.id2  where s2_12_dd_cod = 24 group by nom_dd ) as C24 on DEP.ccdd  = C24.ccdd 
          left join (select ccdd,  count(*) as t  from acu_seccion1 a inner join acu_seccion2 s on a.id1 = s.id2  where s2_12_dd_cod = 25 group by nom_dd ) as C25 on DEP.ccdd  = C25.ccdd 
          left join (select ccdd,  count(*) as t  from acu_seccion1 a inner join acu_seccion2 s on a.id1 = s.id2  where s2_12_dd_cod > 25 and s2_12_dd_cod<>4028 group by nom_dd ) as C26 on DEP.ccdd  = C26.ccdd ;
        ');
      return $q;
}



function get_tabulado_104()
{          /* TABULADO N° 104 ---------------- NIVEL DE estudios------------------------*/
      $q = $this->db->query('
          select 
          DEP.CCDD, DEPARTAMENTO,  C0.t AS TOTAL,  
          COALESCE(C1.t,0) as SIN_NIVEL, COALESCE(C2.t,0) as INICIAL, COALESCE(C3.t,0) as PRIMARIA, COALESCE(C4.t,0) as SECUNDARIA, COALESCE(C5.t,0) as SUP_NO_UNI_INC,
          COALESCE(C6.t,0) as SUP_NO_UNI_COM, COALESCE(C7.t,0) as SUP_UNI_INC, COALESCE(C8.t,0) as SUP_UNI_COM, COALESCE(C9.t,0) NEP
          from (select  distinct(departamento), ccdd from departamentos_tab order by departamento) as DEP 
          left join (select ccdd,  count(*) as t  from acu_seccion1 a inner join acu_seccion2 s on a.id1 = s.id2  where s2_13 is not null group by nom_dd ) as C0 on DEP.ccdd  = C0.ccdd 
          left join (select ccdd,  count(*) as t  from acu_seccion1 a inner join acu_seccion2 s on a.id1 = s.id2  where s2_13 = 1 group by nom_dd ) as C1 on DEP.ccdd  = C1.ccdd 
          left join (select ccdd,  count(*) as t  from acu_seccion1 a inner join acu_seccion2 s on a.id1 = s.id2  where s2_13 = 2 group by nom_dd ) as C2 on DEP.ccdd  = C2.ccdd 
          left join (select ccdd,  count(*) as t  from acu_seccion1 a inner join acu_seccion2 s on a.id1 = s.id2  where s2_13 = 3 group by nom_dd ) as C3 on DEP.ccdd  = C3.ccdd 
          left join (select ccdd,  count(*) as t  from acu_seccion1 a inner join acu_seccion2 s on a.id1 = s.id2  where s2_13 = 4 group by nom_dd ) as C4 on DEP.ccdd  = C4.ccdd 
          left join (select ccdd,  count(*) as t  from acu_seccion1 a inner join acu_seccion2 s on a.id1 = s.id2  where s2_13 = 5 group by nom_dd ) as C5 on DEP.ccdd  = C5.ccdd 
          left join (select ccdd,  count(*) as t  from acu_seccion1 a inner join acu_seccion2 s on a.id1 = s.id2  where s2_13 = 6 group by nom_dd ) as C6 on DEP.ccdd  = C6.ccdd 
          left join (select ccdd,  count(*) as t  from acu_seccion1 a inner join acu_seccion2 s on a.id1 = s.id2  where s2_13 = 7 group by nom_dd ) as C7 on DEP.ccdd  = C7.ccdd 
          left join (select ccdd,  count(*) as t  from acu_seccion1 a inner join acu_seccion2 s on a.id1 = s.id2  where s2_13 = 8 group by nom_dd ) as C8 on DEP.ccdd  = C8.ccdd 
          left join (select ccdd,  count(*) as t  from acu_seccion1 a inner join acu_seccion2 s on a.id1 = s.id2  where s2_13 = 9 group by nom_dd ) as C9 on DEP.ccdd  = C9.ccdd ;
        ');
      return $q;
}



function get_tabulado_105()
{          /* TABULADO N° 105 - tipo de actividad*/
      $q = $this->db->query("
          select 
          DEP.CCDD, DEPARTAMENTO,  C0.t AS TOTAL,  
          COALESCE(C1.t,0) as SI, COALESCE(C2.t,0) as 'NO',  COALESCE(C3.t,0) NEP
          from (select  distinct(departamento), ccdd from departamentos_tab order by departamento) as DEP 
          left join (select ccdd,  count(*) as t  from acu_seccion1 a inner join acu_seccion2 s on a.id1 = s.id2  where s2_14 is not null group by nom_dd ) as C0 on DEP.ccdd  = C0.ccdd 
          left join (select ccdd,  count(*) as t  from acu_seccion1 a inner join acu_seccion2 s on a.id1 = s.id2  where s2_14 = 1 group by nom_dd ) as C1 on DEP.ccdd  = C1.ccdd 
          left join (select ccdd,  count(*) as t  from acu_seccion1 a inner join acu_seccion2 s on a.id1 = s.id2  where s2_14 = 2 group by nom_dd ) as C2 on DEP.ccdd  = C2.ccdd 
          left join (select ccdd,  count(*) as t  from acu_seccion1 a inner join acu_seccion2 s on a.id1 = s.id2  where s2_14 = 9 group by nom_dd ) as C3 on DEP.ccdd  = C3.ccdd ;
        ");
      return $q;
}


function get_tabulado_106()
{          /* TABULADO N° 106 - OTRO ACTIVIDAD*/
      $q = $this->db->query('
          select 
          DEP.CCDD, DEPARTAMENTO,  C0.t AS TOTAL,  
          COALESCE(C1.t,0) as AGRICOLA, COALESCE(C2.t,0) as PECUARIA, COALESCE(C3.t,0) as PESCA, COALESCE(C4.t,0) as CAZA, COALESCE(C5.t,0) as CONSTRUCCION,
          COALESCE(C6.t,0) as COMERCIO, COALESCE(C7.t,0) as OTRO, COALESCE(C8.t,0) as NO_TIENE, COALESCE(C9.t,0) NEP
          from (select  distinct(departamento), ccdd from departamentos_tab order by departamento) as DEP 
          left join (select ccdd,  count(*) as t  from acu_seccion1 a inner join acu_seccion2 s on a.id1 = s.id2  where s2_15_1 is not null group by nom_dd ) as C0 on DEP.ccdd  = C0.ccdd 
          left join (select ccdd,  count(*) as t  from acu_seccion1 a inner join acu_seccion2 s on a.id1 = s.id2  where s2_15_1 = 1 group by nom_dd ) as C1 on DEP.ccdd  = C1.ccdd 
          left join (select ccdd,  count(*) as t  from acu_seccion1 a inner join acu_seccion2 s on a.id1 = s.id2  where s2_15_2 = 1 group by nom_dd ) as C2 on DEP.ccdd  = C2.ccdd 
          left join (select ccdd,  count(*) as t  from acu_seccion1 a inner join acu_seccion2 s on a.id1 = s.id2  where s2_15_3 = 1 group by nom_dd ) as C3 on DEP.ccdd  = C3.ccdd 
          left join (select ccdd,  count(*) as t  from acu_seccion1 a inner join acu_seccion2 s on a.id1 = s.id2  where s2_15_4 = 1 group by nom_dd ) as C4 on DEP.ccdd  = C4.ccdd 
          left join (select ccdd,  count(*) as t  from acu_seccion1 a inner join acu_seccion2 s on a.id1 = s.id2  where s2_15_5 = 1 group by nom_dd ) as C5 on DEP.ccdd  = C5.ccdd 
          left join (select ccdd,  count(*) as t  from acu_seccion1 a inner join acu_seccion2 s on a.id1 = s.id2  where s2_15_6 = 1 group by nom_dd ) as C6 on DEP.ccdd  = C6.ccdd 
          left join (select ccdd,  count(*) as t  from acu_seccion1 a inner join acu_seccion2 s on a.id1 = s.id2  where s2_15_7 = 1 group by nom_dd ) as C7 on DEP.ccdd  = C7.ccdd 
          left join (select ccdd,  count(*) as t  from acu_seccion1 a inner join acu_seccion2 s on a.id1 = s.id2  where s2_15_8 = 1 group by nom_dd ) as C8 on DEP.ccdd  = C8.ccdd 
          left join (select ccdd,  count(*) as t  from acu_seccion1 a inner join acu_seccion2 s on a.id1 = s.id2  where s2_15_8 = 9 group by nom_dd ) as C9 on DEP.ccdd  = C9.ccdd ;
                  ');
      return $q;
}


function get_tabulado_107()
{          /* TABULADO N° 107 ------------------------RAZON DE ELECCION  --------------------------------------*/
      $q = $this->db->query('
          select 
          DEP.CCDD, DEPARTAMENTO,  C0.t AS TOTAL,  
          COALESCE(C1.t,0) as T_FAMILIAR, COALESCE(C2.t,0) as P_DESARROLLO, COALESCE(C3.t,0) as N_ECONOMICA, COALESCE(C4.t,0) as OTRO, COALESCE(C5.t,0) NEP
          from (select  distinct(departamento), ccdd from departamentos_tab order by departamento) as DEP 
          left join (select ccdd,  count(*) as t  from acu_seccion1 a inner join acu_seccion2 s on a.id1 = s.id2  where s2_16 is not null group by nom_dd ) as C0 on DEP.ccdd  = C0.ccdd 
          left join (select ccdd,  count(*) as t  from acu_seccion1 a inner join acu_seccion2 s on a.id1 = s.id2  where s2_16 = 1 group by nom_dd ) as C1 on DEP.ccdd  = C1.ccdd 
          left join (select ccdd,  count(*) as t  from acu_seccion1 a inner join acu_seccion2 s on a.id1 = s.id2  where s2_16 = 2 group by nom_dd ) as C2 on DEP.ccdd  = C2.ccdd 
          left join (select ccdd,  count(*) as t  from acu_seccion1 a inner join acu_seccion2 s on a.id1 = s.id2  where s2_16 = 3 group by nom_dd ) as C3 on DEP.ccdd  = C3.ccdd 
          left join (select ccdd,  count(*) as t  from acu_seccion1 a inner join acu_seccion2 s on a.id1 = s.id2  where s2_16 = 4 group by nom_dd ) as C4 on DEP.ccdd  = C4.ccdd 
          left join (select ccdd,  count(*) as t  from acu_seccion1 a inner join acu_seccion2 s on a.id1 = s.id2  where s2_16 = 9 group by nom_dd ) as C5 on DEP.ccdd  = C5.ccdd ;
        ');
      return $q;
}

function get_tabulado_108()
{          /* TABULADO N° 108 ------------------------AÑOS DE ACTIVIDAD  --------------------------------------*/           
      $q = $this->db->query("
          select 
          DEP.CCDD, DEPARTAMENTO,  C0.t AS TOTAL,  
          COALESCE(C1.t,0) as '0_1', COALESCE(C2.t,0) as '2_5', COALESCE(C3.t,0) as '6_10', COALESCE(C4.t,0) as MAS_10, COALESCE(C5.t,0) NEP
          from (select  distinct(departamento), ccdd from departamentos_tab order by departamento) as DEP 
          left join (select ccdd,  count(*) as t  from acu_seccion1 a inner join acu_seccion2 s on a.id1 = s.id2  where s2_17 is not null group by nom_dd ) as C0 on DEP.ccdd  = C0.ccdd 
          left join (select ccdd,  count(*) as t  from acu_seccion1 a inner join acu_seccion2 s on a.id1 = s.id2  where s2_17 = 1 group by nom_dd ) as C1 on DEP.ccdd  = C1.ccdd 
          left join (select ccdd,  count(*) as t  from acu_seccion1 a inner join acu_seccion2 s on a.id1 = s.id2  where s2_17 = 2 group by nom_dd ) as C2 on DEP.ccdd  = C2.ccdd 
          left join (select ccdd,  count(*) as t  from acu_seccion1 a inner join acu_seccion2 s on a.id1 = s.id2  where s2_17 = 3 group by nom_dd ) as C3 on DEP.ccdd  = C3.ccdd 
          left join (select ccdd,  count(*) as t  from acu_seccion1 a inner join acu_seccion2 s on a.id1 = s.id2  where s2_17 = 4 group by nom_dd ) as C4 on DEP.ccdd  = C4.ccdd 
          left join (select ccdd,  count(*) as t  from acu_seccion1 a inner join acu_seccion2 s on a.id1 = s.id2  where s2_17 = 9 group by nom_dd ) as C5 on DEP.ccdd  = C5.ccdd ;
        ");
      return $q;
}

function get_tabulado_109()
{          /* TABULADO N° 109  ------------------------ PROGRAMA SOCIAL  --------------------------------------*/
      $q = $this->db->query('
          select 
          DEP.CCDD, DEPARTAMENTO,  C0.t AS TOTAL,  
          COALESCE(C1.t,0) as V_LECHE, COALESCE(C2.t,0) as C_POPULAR, COALESCE(C3.t,0) as QALI_WARMA, COALESCE(C4.t,0) as SIS, COALESCE(C5.t,0) as P_JUNTOS,
          COALESCE(C6.t,0) as P_65, COALESCE(C7.t,0) as CUNA_MAS, COALESCE(C8.t,0) as OTRO, COALESCE(C9.t,0) NINGUNO, COALESCE(C10.t,0) NEP
          from (select  distinct(departamento), ccdd from departamentos_tab order by departamento) as DEP 
          left join (select ccdd,  count(*) as t  from acu_seccion1 a inner join acu_seccion2 s on a.id1 = s.id2  where s2_18_1 is not null group by nom_dd ) as C0 on DEP.ccdd  = C0.ccdd 
          left join (select ccdd,  count(*) as t  from acu_seccion1 a inner join acu_seccion2 s on a.id1 = s.id2  where s2_18_1 = 1 group by nom_dd ) as C1 on DEP.ccdd  = C1.ccdd 
          left join (select ccdd,  count(*) as t  from acu_seccion1 a inner join acu_seccion2 s on a.id1 = s.id2  where s2_18_2 = 1 group by nom_dd ) as C2 on DEP.ccdd  = C2.ccdd 
          left join (select ccdd,  count(*) as t  from acu_seccion1 a inner join acu_seccion2 s on a.id1 = s.id2  where s2_18_3 = 1 group by nom_dd ) as C3 on DEP.ccdd  = C3.ccdd 
          left join (select ccdd,  count(*) as t  from acu_seccion1 a inner join acu_seccion2 s on a.id1 = s.id2  where s2_18_4 = 1 group by nom_dd ) as C4 on DEP.ccdd  = C4.ccdd 
          left join (select ccdd,  count(*) as t  from acu_seccion1 a inner join acu_seccion2 s on a.id1 = s.id2  where s2_18_5 = 1 group by nom_dd ) as C5 on DEP.ccdd  = C5.ccdd 
          left join (select ccdd,  count(*) as t  from acu_seccion1 a inner join acu_seccion2 s on a.id1 = s.id2  where s2_18_6 = 1 group by nom_dd ) as C6 on DEP.ccdd  = C6.ccdd 
          left join (select ccdd,  count(*) as t  from acu_seccion1 a inner join acu_seccion2 s on a.id1 = s.id2  where s2_18_7 = 1 group by nom_dd ) as C7 on DEP.ccdd  = C7.ccdd 
          left join (select ccdd,  count(*) as t  from acu_seccion1 a inner join acu_seccion2 s on a.id1 = s.id2  where s2_18_8 = 1 group by nom_dd ) as C8 on DEP.ccdd  = C8.ccdd 
          left join (select ccdd,  count(*) as t  from acu_seccion1 a inner join acu_seccion2 s on a.id1 = s.id2  where s2_18_9 = 1 group by nom_dd ) as C9 on DEP.ccdd  = C9.ccdd 
          left join (select ccdd,  count(*) as t  from acu_seccion1 a inner join acu_seccion2 s on a.id1 = s.id2  where s2_18_9 = 9 group by nom_dd ) as C10 on DEP.ccdd  = C10.ccdd ;
        ');
      return $q;
}

function get_tabulado_110()
{/* TABULADO N° 110  ------------------------ ESTADO CIVIL  --------------------------------------*/
      $q = $this->db->query('
          select 
          DEP.CCDD, DEPARTAMENTO,  C0.t AS TOTAL,  
          COALESCE(C1.t,0) as CONVIVIENTE, COALESCE(C2.t,0) as CASADO, COALESCE(C3.t,0) as SEPARADO, COALESCE(C4.t,0) as VIUDO, COALESCE(C5.t,0) as DIVORCIADO,
          COALESCE(C6.t,0) as SOLTERO, COALESCE(C7.t,0) NEP
          from (select  distinct(departamento), ccdd from departamentos_tab order by departamento) as DEP 
          left join (select ccdd,  count(*) as t  from acu_seccion1 a inner join acu_seccion2 s on a.id1 = s.id2  where s2_19 is not null group by nom_dd ) as C0 on DEP.ccdd  = C0.ccdd 
          left join (select ccdd,  count(*) as t  from acu_seccion1 a inner join acu_seccion2 s on a.id1 = s.id2  where s2_19 = 1 group by nom_dd ) as C1 on DEP.ccdd  = C1.ccdd 
          left join (select ccdd,  count(*) as t  from acu_seccion1 a inner join acu_seccion2 s on a.id1 = s.id2  where s2_19 = 2 group by nom_dd ) as C2 on DEP.ccdd  = C2.ccdd 
          left join (select ccdd,  count(*) as t  from acu_seccion1 a inner join acu_seccion2 s on a.id1 = s.id2  where s2_19 = 3 group by nom_dd ) as C3 on DEP.ccdd  = C3.ccdd 
          left join (select ccdd,  count(*) as t  from acu_seccion1 a inner join acu_seccion2 s on a.id1 = s.id2  where s2_19 = 4 group by nom_dd ) as C4 on DEP.ccdd  = C4.ccdd 
          left join (select ccdd,  count(*) as t  from acu_seccion1 a inner join acu_seccion2 s on a.id1 = s.id2  where s2_19 = 5 group by nom_dd ) as C5 on DEP.ccdd  = C5.ccdd 
          left join (select ccdd,  count(*) as t  from acu_seccion1 a inner join acu_seccion2 s on a.id1 = s.id2  where s2_19 = 6 group by nom_dd ) as C6 on DEP.ccdd  = C6.ccdd 
          left join (select ccdd,  count(*) as t  from acu_seccion1 a inner join acu_seccion2 s on a.id1 = s.id2  where s2_19 = 9 group by nom_dd ) as C7 on DEP.ccdd  = C7.ccdd;
                  ');
      return $q;
}

function get_tabulado_111()
{/* TABULADO N° 111 ---------------- NIVEL DE estudios CONYUGUE------------------------*/
      $q = $this->db->query('
          select 
          DEP.CCDD, DEPARTAMENTO,  C0.t AS TOTAL,  
          COALESCE(C1.t,0) as SIN_NIVEL, COALESCE(C2.t,0) as INICIAL, COALESCE(C3.t,0) as PRIMARIA, COALESCE(C4.t,0) as SECUNDARIA, COALESCE(C5.t,0) as SUP_NO_UNI_INC,
          COALESCE(C6.t,0) as SUP_NO_UNI_COM, COALESCE(C7.t,0) as SUP_UNI_INC, COALESCE(C8.t,0) as SUP_UNI_COM, COALESCE(C9.t,0) NEP
          from (select  distinct(departamento), ccdd from departamentos_tab order by departamento) as DEP 
          left join (select ccdd,  count(*) as t  from acu_seccion1 a inner join acu_seccion2 s on a.id1 = s.id2  where s2_20 is not null group by nom_dd ) as C0 on DEP.ccdd  = C0.ccdd 
          left join (select ccdd,  count(*) as t  from acu_seccion1 a inner join acu_seccion2 s on a.id1 = s.id2  where s2_20 = 1 group by nom_dd ) as C1 on DEP.ccdd  = C1.ccdd 
          left join (select ccdd,  count(*) as t  from acu_seccion1 a inner join acu_seccion2 s on a.id1 = s.id2  where s2_20 = 2 group by nom_dd ) as C2 on DEP.ccdd  = C2.ccdd 
          left join (select ccdd,  count(*) as t  from acu_seccion1 a inner join acu_seccion2 s on a.id1 = s.id2  where s2_20 = 3 group by nom_dd ) as C3 on DEP.ccdd  = C3.ccdd 
          left join (select ccdd,  count(*) as t  from acu_seccion1 a inner join acu_seccion2 s on a.id1 = s.id2  where s2_20 = 4 group by nom_dd ) as C4 on DEP.ccdd  = C4.ccdd 
          left join (select ccdd,  count(*) as t  from acu_seccion1 a inner join acu_seccion2 s on a.id1 = s.id2  where s2_20 = 5 group by nom_dd ) as C5 on DEP.ccdd  = C5.ccdd 
          left join (select ccdd,  count(*) as t  from acu_seccion1 a inner join acu_seccion2 s on a.id1 = s.id2  where s2_20 = 6 group by nom_dd ) as C6 on DEP.ccdd  = C6.ccdd 
          left join (select ccdd,  count(*) as t  from acu_seccion1 a inner join acu_seccion2 s on a.id1 = s.id2  where s2_20 = 7 group by nom_dd ) as C7 on DEP.ccdd  = C7.ccdd 
          left join (select ccdd,  count(*) as t  from acu_seccion1 a inner join acu_seccion2 s on a.id1 = s.id2  where s2_20 = 8 group by nom_dd ) as C8 on DEP.ccdd  = C8.ccdd 
          left join (select ccdd,  count(*) as t  from acu_seccion1 a inner join acu_seccion2 s on a.id1 = s.id2  where s2_20 = 9 group by nom_dd ) as C9 on DEP.ccdd  = C9.ccdd ;
        ');
      return $q;
}

function get_tabulado_112()
{/* TABULADO N° 112  ------------------------ OTRA ACTIVIDAD DEL CONYUGUE  --------------------------------------*/
      $q = $this->db->query("
          select 
          DEP.CCDD, DEPARTAMENTO,  C0.t AS TOTAL,  
          COALESCE(C1.t,0) as C_HOGAR, COALESCE(C2.t,0) as AGRICOLA, COALESCE(C3.t,0) as PECUARIA, COALESCE(C4.t,0) as ACUICOLA, COALESCE(C5.t,0) as PESCA,
          COALESCE(C6.t,0) as CAZA, COALESCE(C7.t,0) CONSTRUCCION, COALESCE(C8.t,0) COMERCIO, COALESCE(C9.t,0) OTRO, COALESCE(C10.t,0) NEP
          from (select  distinct(departamento), ccdd from departamentos_tab order by departamento) as DEP 
          left join (select ccdd,  count(*) as t  from acu_seccion1 a inner join acu_seccion2 s on a.id1 = s.id2  where s2_21_1 is not null group by nom_dd ) as C0 on DEP.ccdd  = C0.ccdd 
          left join (select ccdd,  count(*) as t  from acu_seccion1 a inner join acu_seccion2 s on a.id1 = s.id2  where s2_21_1 = 1 group by nom_dd ) as C1 on DEP.ccdd  = C1.ccdd 
          left join (select ccdd,  count(*) as t  from acu_seccion1 a inner join acu_seccion2 s on a.id1 = s.id2  where s2_21_2 = 1 group by nom_dd ) as C2 on DEP.ccdd  = C2.ccdd 
          left join (select ccdd,  count(*) as t  from acu_seccion1 a inner join acu_seccion2 s on a.id1 = s.id2  where s2_21_3 = 1 group by nom_dd ) as C3 on DEP.ccdd  = C3.ccdd 
          left join (select ccdd,  count(*) as t  from acu_seccion1 a inner join acu_seccion2 s on a.id1 = s.id2  where s2_21_4 = 1 group by nom_dd ) as C4 on DEP.ccdd  = C4.ccdd 
          left join (select ccdd,  count(*) as t  from acu_seccion1 a inner join acu_seccion2 s on a.id1 = s.id2  where s2_21_5 = 1 group by nom_dd ) as C5 on DEP.ccdd  = C5.ccdd 
          left join (select ccdd,  count(*) as t  from acu_seccion1 a inner join acu_seccion2 s on a.id1 = s.id2  where s2_21_6 = 1 group by nom_dd ) as C6 on DEP.ccdd  = C6.ccdd 
          left join (select ccdd,  count(*) as t  from acu_seccion1 a inner join acu_seccion2 s on a.id1 = s.id2  where s2_21_7 = 1 group by nom_dd ) as C7 on DEP.ccdd  = C7.ccdd
          left join (select ccdd,  count(*) as t  from acu_seccion1 a inner join acu_seccion2 s on a.id1 = s.id2  where s2_21_8 = 1 group by nom_dd ) as C8 on DEP.ccdd  = C8.ccdd
          left join (select ccdd,  count(*) as t  from acu_seccion1 a inner join acu_seccion2 s on a.id1 = s.id2  where s2_21_9 = 1 group by nom_dd ) as C9 on DEP.ccdd  = C9.ccdd
          left join (select ccdd,  count(*) as t  from acu_seccion1 a inner join acu_seccion2 s on a.id1 = s.id2  where s2_21_9 = 9 group by nom_dd ) as C10 on DEP.ccdd  = C10.ccdd;
        ");
      return $q;
}

function get_tabulado_113()
{/* TABULADO N° 113 ------------------- TENENCIA DE HIJOS -------------------------------*/
      $q = $this->db->query("
          select 
          DEP.CCDD, DEPARTAMENTO,  C0.t AS TOTAL,  
          COALESCE(C1.t,0) as SI, COALESCE(C2.t,0) as 'NO',  COALESCE(C3.t,0) NEP
          from (select  distinct(departamento), ccdd from departamentos_tab order by departamento) as DEP 
          left join (select ccdd,  count(*) as t  from acu_seccion1 a inner join acu_seccion2 s on a.id1 = s.id2  where s2_22 is not null group by nom_dd ) as C0 on DEP.ccdd  = C0.ccdd 
          left join (select ccdd,  count(*) as t  from acu_seccion1 a inner join acu_seccion2 s on a.id1 = s.id2  where s2_22 = 1 group by nom_dd ) as C1 on DEP.ccdd  = C1.ccdd 
          left join (select ccdd,  count(*) as t  from acu_seccion1 a inner join acu_seccion2 s on a.id1 = s.id2  where s2_22 = 2 group by nom_dd ) as C2 on DEP.ccdd  = C2.ccdd 
          left join (select ccdd,  count(*) as t  from acu_seccion1 a inner join acu_seccion2 s on a.id1 = s.id2  where s2_22 = 9 group by nom_dd ) as C3 on DEP.ccdd  = C3.ccdd ;
        ");
      return $q;
}

function get_tabulado_114()
{/* TABULADO N° 114  ------------------------ NUMERO DE HIJOS  --------------------------------------*/
      $q = $this->db->query("
          select 
          DEP.CCDD, DEPARTAMENTO,  C0.t AS TOTAL,  
          COALESCE(C1.t,0) as '1_hijos', COALESCE(C2.t,0) as '2_hijos', COALESCE(C3.t,0) as '3_hijos', COALESCE(C4.t,0) as '4_hijos', COALESCE(C5.t,0) as '5_hijos',
          COALESCE(C6.t,0) as '6_hijos', COALESCE(C7.t,0) '7_hijos', COALESCE(C8.t,0) '8_hijos', COALESCE(C9.t,0) '9_hijos', COALESCE(C10.t,0) '10_mas', COALESCE(C11.t,0) NEP
          from (select  distinct(departamento), ccdd from departamentos_tab order by departamento) as DEP 
          left join (select ccdd,  count(*) as t  from acu_seccion1 a inner join acu_seccion2 s on a.id1 = s.id2  where s2_23 is not null group by nom_dd ) as C0 on DEP.ccdd  = C0.ccdd 
          left join (select ccdd,  count(*) as t  from acu_seccion1 a inner join acu_seccion2 s on a.id1 = s.id2  where s2_23 = 1 group by nom_dd ) as C1 on DEP.ccdd  = C1.ccdd 
          left join (select ccdd,  count(*) as t  from acu_seccion1 a inner join acu_seccion2 s on a.id1 = s.id2  where s2_23 = 2 group by nom_dd ) as C2 on DEP.ccdd  = C2.ccdd 
          left join (select ccdd,  count(*) as t  from acu_seccion1 a inner join acu_seccion2 s on a.id1 = s.id2  where s2_23 = 3 group by nom_dd ) as C3 on DEP.ccdd  = C3.ccdd 
          left join (select ccdd,  count(*) as t  from acu_seccion1 a inner join acu_seccion2 s on a.id1 = s.id2  where s2_23 = 4 group by nom_dd ) as C4 on DEP.ccdd  = C4.ccdd 
          left join (select ccdd,  count(*) as t  from acu_seccion1 a inner join acu_seccion2 s on a.id1 = s.id2  where s2_23 = 5 group by nom_dd ) as C5 on DEP.ccdd  = C5.ccdd 
          left join (select ccdd,  count(*) as t  from acu_seccion1 a inner join acu_seccion2 s on a.id1 = s.id2  where s2_23 = 6 group by nom_dd ) as C6 on DEP.ccdd  = C6.ccdd 
          left join (select ccdd,  count(*) as t  from acu_seccion1 a inner join acu_seccion2 s on a.id1 = s.id2  where s2_23 = 7 group by nom_dd ) as C7 on DEP.ccdd  = C7.ccdd
          left join (select ccdd,  count(*) as t  from acu_seccion1 a inner join acu_seccion2 s on a.id1 = s.id2  where s2_23 = 8 group by nom_dd ) as C8 on DEP.ccdd  = C8.ccdd
          left join (select ccdd,  count(*) as t  from acu_seccion1 a inner join acu_seccion2 s on a.id1 = s.id2  where s2_23 = 9 group by nom_dd ) as C9 on DEP.ccdd  = C9.ccdd
          left join (select ccdd,  count(*) as t  from acu_seccion1 a inner join acu_seccion2 s on a.id1 = s.id2  where s2_23 >= 10 AND s2_23 <99 group by nom_dd ) as C10 on DEP.ccdd  = C10.ccdd
          left join (select ccdd,  count(*) as t  from acu_seccion1 a inner join acu_seccion2 s on a.id1 = s.id2  where s2_23 = 99 group by nom_dd ) as C11 on DEP.ccdd  = C11.ccdd;
        ");
      return $q;
}

function get_tabulado_115()
{/* TABULADO N° 115  ------------------------ SEXO DE HIJOS  --------------------------------------*/
      $q = $this->db->query('
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
          left join (select ccdd,  count(*) as t  from acu_seccion1 c inner join acu_seccion2 s on c.id1 = s.id2  where S2_24_3_1 = 1 group by nom_dd) as C1 on DEP.ccdd  = C1.ccdd 
          left join (select ccdd,  count(*) as t  from acu_seccion1 c inner join acu_seccion2 s on c.id1 = s.id2  where S2_24_3_2 = 1 group by nom_dd) as C2 on DEP.ccdd  = C2.ccdd 
          left join (select ccdd,  count(*) as t  from acu_seccion1 c inner join acu_seccion2 s on c.id1 = s.id2  where S2_24_3_3 = 1 group by nom_dd) as C3 on DEP.ccdd  = C3.ccdd
          left join (select ccdd,  count(*) as t  from acu_seccion1 c inner join acu_seccion2 s on c.id1 = s.id2  where S2_24_3_4 = 1 group by nom_dd) as C4 on DEP.ccdd  = C4.ccdd  
          left join (select ccdd,  count(*) as t  from acu_seccion1 c inner join acu_seccion2 s on c.id1 = s.id2  where S2_24_3_5 = 1 group by nom_dd) as C5 on DEP.ccdd  = C5.ccdd  
          left join (select ccdd,  count(*) as t  from acu_seccion1 c inner join acu_seccion2 s on c.id1 = s.id2  where S2_24_3_6 = 1 group by nom_dd) as C6 on DEP.ccdd  = C6.ccdd  
          left join (select ccdd,  count(*) as t  from acu_seccion1 c inner join acu_seccion2 s on c.id1 = s.id2  where S2_24_3_7 = 1 group by nom_dd) as C7 on DEP.ccdd  = C7.ccdd  
          left join (select ccdd,  count(*) as t  from acu_seccion1 c inner join acu_seccion2 s on c.id1 = s.id2  where S2_24_3_8 = 1 group by nom_dd) as C8 on DEP.ccdd  = C8.ccdd  
          left join (select ccdd,  count(*) as t  from acu_seccion1 c inner join acu_seccion2 s on c.id1 = s.id2  where S2_24_3_9 = 1 group by nom_dd) as C9 on DEP.ccdd  = C9.ccdd  
          left join (select ccdd,  count(*) as t  from acu_seccion1 c inner join acu_seccion2 s on c.id1 = s.id2  where S2_24_3_10 = 1 group by nom_dd) as C10 on DEP.ccdd  = C10.ccdd  
          left join (select ccdd,  count(*) as t  from acu_seccion1 c inner join acu_seccion2 s on c.id1 = s.id2  where S2_24_3_1 = 2 group by nom_dd) as C11 on DEP.ccdd  = C11.ccdd 
          left join (select ccdd,  count(*) as t  from acu_seccion1 c inner join acu_seccion2 s on c.id1 = s.id2  where S2_24_3_2 = 2 group by nom_dd) as C12 on DEP.ccdd  = C12.ccdd 
          left join (select ccdd,  count(*) as t  from acu_seccion1 c inner join acu_seccion2 s on c.id1 = s.id2  where S2_24_3_3 = 2 group by nom_dd) as C13 on DEP.ccdd  = C13.ccdd
          left join (select ccdd,  count(*) as t  from acu_seccion1 c inner join acu_seccion2 s on c.id1 = s.id2  where S2_24_3_4 = 2 group by nom_dd) as C14 on DEP.ccdd  = C14.ccdd  
          left join (select ccdd,  count(*) as t  from acu_seccion1 c inner join acu_seccion2 s on c.id1 = s.id2  where S2_24_3_5 = 2 group by nom_dd) as C15 on DEP.ccdd  = C15.ccdd  
          left join (select ccdd,  count(*) as t  from acu_seccion1 c inner join acu_seccion2 s on c.id1 = s.id2  where S2_24_3_6 = 2 group by nom_dd) as C16 on DEP.ccdd  = C16.ccdd  
          left join (select ccdd,  count(*) as t  from acu_seccion1 c inner join acu_seccion2 s on c.id1 = s.id2  where S2_24_3_7 = 2 group by nom_dd) as C17 on DEP.ccdd  = C17.ccdd  
          left join (select ccdd,  count(*) as t  from acu_seccion1 c inner join acu_seccion2 s on c.id1 = s.id2  where S2_24_3_8 = 2 group by nom_dd) as C18 on DEP.ccdd  = C18.ccdd  
          left join (select ccdd,  count(*) as t  from acu_seccion1 c inner join acu_seccion2 s on c.id1 = s.id2  where S2_24_3_9 = 2 group by nom_dd) as C19 on DEP.ccdd  = C19.ccdd  
          left join (select ccdd,  count(*) as t  from acu_seccion1 c inner join acu_seccion2 s on c.id1 = s.id2  where S2_24_3_10 = 2 group by nom_dd) as C20 on DEP.ccdd  = C20.ccdd 
          left join (select ccdd,  count(*) as t  from acu_seccion1 c inner join acu_seccion2 s on c.id1 = s.id2  where S2_24_3_1 = 9 group by nom_dd) as C21 on DEP.ccdd  = C21.ccdd 
          left join (select ccdd,  count(*) as t  from acu_seccion1 c inner join acu_seccion2 s on c.id1 = s.id2  where S2_24_3_2 = 9 group by nom_dd) as C22 on DEP.ccdd  = C22.ccdd 
          left join (select ccdd,  count(*) as t  from acu_seccion1 c inner join acu_seccion2 s on c.id1 = s.id2  where S2_24_3_3 = 9 group by nom_dd) as C23 on DEP.ccdd  = C23.ccdd
          left join (select ccdd,  count(*) as t  from acu_seccion1 c inner join acu_seccion2 s on c.id1 = s.id2  where S2_24_3_4 = 9 group by nom_dd) as C24 on DEP.ccdd  = C24.ccdd  
          left join (select ccdd,  count(*) as t  from acu_seccion1 c inner join acu_seccion2 s on c.id1 = s.id2  where S2_24_3_5 = 9 group by nom_dd) as C25 on DEP.ccdd  = C25.ccdd  
          left join (select ccdd,  count(*) as t  from acu_seccion1 c inner join acu_seccion2 s on c.id1 = s.id2  where S2_24_3_6 = 9 group by nom_dd) as C26 on DEP.ccdd  = C26.ccdd  
          left join (select ccdd,  count(*) as t  from acu_seccion1 c inner join acu_seccion2 s on c.id1 = s.id2  where S2_24_3_7 = 9 group by nom_dd) as C27 on DEP.ccdd  = C27.ccdd  
          left join (select ccdd,  count(*) as t  from acu_seccion1 c inner join acu_seccion2 s on c.id1 = s.id2  where S2_24_3_8 = 9 group by nom_dd) as C28 on DEP.ccdd  = C28.ccdd  
          left join (select ccdd,  count(*) as t  from acu_seccion1 c inner join acu_seccion2 s on c.id1 = s.id2  where S2_24_3_9 = 9 group by nom_dd) as C29 on DEP.ccdd  = C29.ccdd  
          left join (select ccdd,  count(*) as t  from acu_seccion1 c inner join acu_seccion2 s on c.id1 = s.id2  where S2_24_3_10 = 9 group by nom_dd) as C30 on DEP.ccdd  = C30.ccdd  ; 
        ');
      return $q;
}

function get_tabulado_116()
{          /* TABULADO N° 116  ------------------------ EDAD DE HIJOS  --------------------------------------*/       
      $q = $this->db->query("
          SELECT  table1.CCDD, table1.DEPARTAMENTO, (MENOS_1 + 1_5 + 6_10 +  11_15 + 16_20 + MAS_20 + NEP) as TOTAL, MENOS_1,1_5, 6_10, 11_15, 16_20, MAS_20, NEP FROM
          (select 
          DEP.CCDD, DEPARTAMENTO, ( COALESCE(C1.t,0) + COALESCE(C2.t,0) + COALESCE(C3.t,0) +  COALESCE(C4.t,0) +  COALESCE(C5.t,0) +  
          COALESCE(C6.t,0) + COALESCE(C7.t,0) + COALESCE(C8.t,0) +  COALESCE(C9.t,0)  + COALESCE(C10.t,0)  ) AS MENOS_1

          from (select  distinct(departamento), ccdd from departamentos_tab order by departamento) as DEP 
          left join (select ccdd,  count(*) as t  from acu_seccion1 c inner join acu_seccion2 s on c.id1 = s.id2  where s2_24_4_1a = 0 and s2_24_4_1m is not null group by nom_dd) as C1 on DEP.ccdd  = C1.ccdd 
          left join (select ccdd,  count(*) as t  from acu_seccion1 c inner join acu_seccion2 s on c.id1 = s.id2  where s2_24_4_2a = 0 and s2_24_4_2m is not null group by nom_dd) as C2 on DEP.ccdd  = C2.ccdd 
          left join (select ccdd,  count(*) as t  from acu_seccion1 c inner join acu_seccion2 s on c.id1 = s.id2  where s2_24_4_3a = 0 and s2_24_4_3m is not null group by nom_dd) as C3 on DEP.ccdd  = C3.ccdd
          left join (select ccdd,  count(*) as t  from acu_seccion1 c inner join acu_seccion2 s on c.id1 = s.id2  where s2_24_4_4a = 0 and s2_24_4_4m is not null group by nom_dd) as C4 on DEP.ccdd  = C4.ccdd  
          left join (select ccdd,  count(*) as t  from acu_seccion1 c inner join acu_seccion2 s on c.id1 = s.id2  where s2_24_4_5a = 0 and s2_24_4_5m is not null group by nom_dd) as C5 on DEP.ccdd  = C5.ccdd  
          left join (select ccdd,  count(*) as t  from acu_seccion1 c inner join acu_seccion2 s on c.id1 = s.id2  where s2_24_4_6a = 0 and s2_24_4_6m is not null group by nom_dd) as C6 on DEP.ccdd  = C6.ccdd  
          left join (select ccdd,  count(*) as t  from acu_seccion1 c inner join acu_seccion2 s on c.id1 = s.id2  where s2_24_4_7a = 0 and s2_24_4_7m is not null group by nom_dd) as C7 on DEP.ccdd  = C7.ccdd  
          left join (select ccdd,  count(*) as t  from acu_seccion1 c inner join acu_seccion2 s on c.id1 = s.id2  where s2_24_4_8a = 0 and s2_24_4_8m is not null group by nom_dd) as C8 on DEP.ccdd  = C8.ccdd  
          left join (select ccdd,  count(*) as t  from acu_seccion1 c inner join acu_seccion2 s on c.id1 = s.id2  where s2_24_4_9a = 0 and s2_24_4_9m is not null group by nom_dd) as C9 on DEP.ccdd  = C9.ccdd  
          left join (select ccdd,  count(*) as t  from acu_seccion1 c inner join acu_seccion2 s on c.id1 = s.id2  where s2_24_4_10a = 0 and s2_24_4_10m is not null group by nom_dd) as C10 on DEP.ccdd  = C10.ccdd  ) as table1 
          inner join 
          (select 
          DEP.CCDD, DEPARTAMENTO, ( COALESCE(C11.t,0) + COALESCE(C12.t,0) + COALESCE(C13.t,0) +  COALESCE(C14.t,0) +  COALESCE(C15.t,0) +  
          COALESCE(C16.t,0) + COALESCE(C17.t,0) + COALESCE(C18.t,0) +  COALESCE(C19.t,0)  + COALESCE(C20.t,0) ) as '1_5' 
          from (select  distinct(departamento), ccdd from departamentos_tab order by departamento) as DEP 
          left join (select ccdd,  count(*) as t  from acu_seccion1 c inner join acu_seccion2 s on c.id1 = s.id2  where S2_24_4_1a between 1 and 5 group by nom_dd) as C11 on DEP.ccdd  = C11.ccdd 
          left join (select ccdd,  count(*) as t  from acu_seccion1 c inner join acu_seccion2 s on c.id1 = s.id2  where S2_24_4_2a between 1 and 5 group by nom_dd) as C12 on DEP.ccdd  = C12.ccdd 
          left join (select ccdd,  count(*) as t  from acu_seccion1 c inner join acu_seccion2 s on c.id1 = s.id2  where S2_24_4_3a between 1 and 5 group by nom_dd) as C13 on DEP.ccdd  = C13.ccdd
          left join (select ccdd,  count(*) as t  from acu_seccion1 c inner join acu_seccion2 s on c.id1 = s.id2  where S2_24_4_4a between 1 and 5 group by nom_dd) as C14 on DEP.ccdd  = C14.ccdd  
          left join (select ccdd,  count(*) as t  from acu_seccion1 c inner join acu_seccion2 s on c.id1 = s.id2  where S2_24_4_5a between 1 and 5 group by nom_dd) as C15 on DEP.ccdd  = C15.ccdd  
          left join (select ccdd,  count(*) as t  from acu_seccion1 c inner join acu_seccion2 s on c.id1 = s.id2  where S2_24_4_6a between 1 and 5 group by nom_dd) as C16 on DEP.ccdd  = C16.ccdd  
          left join (select ccdd,  count(*) as t  from acu_seccion1 c inner join acu_seccion2 s on c.id1 = s.id2  where S2_24_4_7a between 1 and 5 group by nom_dd) as C17 on DEP.ccdd  = C17.ccdd  
          left join (select ccdd,  count(*) as t  from acu_seccion1 c inner join acu_seccion2 s on c.id1 = s.id2  where S2_24_4_8a between 1 and 5 group by nom_dd) as C18 on DEP.ccdd  = C18.ccdd  
          left join (select ccdd,  count(*) as t  from acu_seccion1 c inner join acu_seccion2 s on c.id1 = s.id2  where S2_24_4_9a between 1 and 5 group by nom_dd) as C19 on DEP.ccdd  = C19.ccdd  
          left join (select ccdd,  count(*) as t  from acu_seccion1 c inner join acu_seccion2 s on c.id1 = s.id2  where S2_24_4_10a between 1 and 5 group by nom_dd) as C20 on DEP.ccdd  = C20.ccdd ) as table2
          on table1.ccdd = table2.ccdd
          INNER JOIN 
          (select 
          DEP.CCDD, DEPARTAMENTO, (COALESCE(C21.t,0) + COALESCE(C22.t,0) + COALESCE(C23.t,0) + COALESCE(C24.t,0) + COALESCE(C25.t,0) +
          COALESCE(C26.t,0) + COALESCE(C27.t,0) + COALESCE(C28.t,0) + COALESCE(C29.t,0) + COALESCE(C30.t,0)  ) AS '6_10'
          from (select  distinct(departamento), ccdd from departamentos_tab order by departamento) as DEP 
          left join (select ccdd,  count(*) as t  from acu_seccion1 c inner join acu_seccion2 s on c.id1 = s.id2  where S2_24_4_1a between 6 and 10 group by nom_dd) as C21 on DEP.ccdd  = C21.ccdd 
          left join (select ccdd,  count(*) as t  from acu_seccion1 c inner join acu_seccion2 s on c.id1 = s.id2  where S2_24_4_2a between 6 and 10 group by nom_dd) as C22 on DEP.ccdd  = C22.ccdd 
          left join (select ccdd,  count(*) as t  from acu_seccion1 c inner join acu_seccion2 s on c.id1 = s.id2  where S2_24_4_3a between 6 and 10 group by nom_dd) as C23 on DEP.ccdd  = C23.ccdd 
          left join (select ccdd,  count(*) as t  from acu_seccion1 c inner join acu_seccion2 s on c.id1 = s.id2  where S2_24_4_4a between 6 and 10 group by nom_dd) as C24 on DEP.ccdd  = C24.ccdd  
          left join (select ccdd,  count(*) as t  from acu_seccion1 c inner join acu_seccion2 s on c.id1 = s.id2  where S2_24_4_5a between 6 and 10 group by nom_dd) as C25 on DEP.ccdd  = C25.ccdd  
          left join (select ccdd,  count(*) as t  from acu_seccion1 c inner join acu_seccion2 s on c.id1 = s.id2  where S2_24_4_6a between 6 and 10 group by nom_dd) as C26 on DEP.ccdd  = C26.ccdd  
          left join (select ccdd,  count(*) as t  from acu_seccion1 c inner join acu_seccion2 s on c.id1 = s.id2  where S2_24_4_7a between 6 and 10 group by nom_dd) as C27 on DEP.ccdd  = C27.ccdd  
          left join (select ccdd,  count(*) as t  from acu_seccion1 c inner join acu_seccion2 s on c.id1 = s.id2  where S2_24_4_8a between 6 and 10 group by nom_dd) as C28 on DEP.ccdd  = C28.ccdd  
          left join (select ccdd,  count(*) as t  from acu_seccion1 c inner join acu_seccion2 s on c.id1 = s.id2  where S2_24_4_9a between 6 and 10 group by nom_dd) as C29 on DEP.ccdd  = C29.ccdd  
          left join (select ccdd,  count(*) as t  from acu_seccion1 c inner join acu_seccion2 s on c.id1 = s.id2  where S2_24_4_10a between 6 and 10 group by nom_dd) as C30 on DEP.ccdd  = C30.ccdd ) as table3
          on table1.ccdd = table3.ccdd
          INNER JOIN 
          (select 
          DEP.CCDD, DEPARTAMENTO, (COALESCE(C31.t,0) + COALESCE(C32.t,0) + COALESCE(C33.t,0) + COALESCE(C34.t,0) + COALESCE(C35.t,0) +
          COALESCE(C36.t,0) + COALESCE(C37.t,0) + COALESCE(C38.t,0) + COALESCE(C39.t,0) + COALESCE(C40.t,0)  ) AS '11_15'  
          from (select  distinct(departamento), ccdd from departamentos_tab order by departamento) as DEP 
          left join (select ccdd,  count(*) as t  from acu_seccion1 c inner join acu_seccion2 s on c.id1 = s.id2  where S2_24_4_1a between 11 and 15 group by nom_dd) as C31 on DEP.ccdd  = C31.ccdd 
          left join (select ccdd,  count(*) as t  from acu_seccion1 c inner join acu_seccion2 s on c.id1 = s.id2  where S2_24_4_2a between 11 and 15 group by nom_dd) as C32 on DEP.ccdd  = C32.ccdd 
          left join (select ccdd,  count(*) as t  from acu_seccion1 c inner join acu_seccion2 s on c.id1 = s.id2  where S2_24_4_3a between 11 and 15 group by nom_dd) as C33 on DEP.ccdd  = C33.ccdd 
          left join (select ccdd,  count(*) as t  from acu_seccion1 c inner join acu_seccion2 s on c.id1 = s.id2  where S2_24_4_4a between 11 and 15 group by nom_dd) as C34 on DEP.ccdd  = C34.ccdd  
          left join (select ccdd,  count(*) as t  from acu_seccion1 c inner join acu_seccion2 s on c.id1 = s.id2  where S2_24_4_5a between 11 and 15 group by nom_dd) as C35 on DEP.ccdd  = C35.ccdd  
          left join (select ccdd,  count(*) as t  from acu_seccion1 c inner join acu_seccion2 s on c.id1 = s.id2  where S2_24_4_6a between 11 and 15 group by nom_dd) as C36 on DEP.ccdd  = C36.ccdd  
          left join (select ccdd,  count(*) as t  from acu_seccion1 c inner join acu_seccion2 s on c.id1 = s.id2  where S2_24_4_7a between 11 and 15 group by nom_dd) as C37 on DEP.ccdd  = C37.ccdd  
          left join (select ccdd,  count(*) as t  from acu_seccion1 c inner join acu_seccion2 s on c.id1 = s.id2  where S2_24_4_8a between 11 and 15 group by nom_dd) as C38 on DEP.ccdd  = C38.ccdd  
          left join (select ccdd,  count(*) as t  from acu_seccion1 c inner join acu_seccion2 s on c.id1 = s.id2  where S2_24_4_9a between 11 and 15 group by nom_dd) as C39 on DEP.ccdd  = C39.ccdd  
          left join (select ccdd,  count(*) as t  from acu_seccion1 c inner join acu_seccion2 s on c.id1 = s.id2  where S2_24_4_10a between 11 and 15 group by nom_dd) as C40 on DEP.ccdd  = C40.ccdd ) as table4
          on table1.ccdd = table4.ccdd
          INNER JOIN 
          (select 
          DEP.CCDD, DEPARTAMENTO, (COALESCE(C41.t,0) + COALESCE(C42.t,0) + COALESCE(C43.t,0) + COALESCE(C44.t,0) + COALESCE(C45.t,0) +
          COALESCE(C46.t,0) + COALESCE(C47.t,0) + COALESCE(C48.t,0) + COALESCE(C49.t,0) + COALESCE(C50.t,0)  ) AS '16_20'
          from (select  distinct(departamento), ccdd from departamentos_tab order by departamento) as DEP 
          left join (select ccdd,  count(*) as t  from acu_seccion1 c inner join acu_seccion2 s on c.id1 = s.id2  where S2_24_4_1a between 16 and 20 group by nom_dd) as C41 on DEP.ccdd  = C41.ccdd 
          left join (select ccdd,  count(*) as t  from acu_seccion1 c inner join acu_seccion2 s on c.id1 = s.id2  where S2_24_4_2a between 16 and 20 group by nom_dd) as C42 on DEP.ccdd  = C42.ccdd 
          left join (select ccdd,  count(*) as t  from acu_seccion1 c inner join acu_seccion2 s on c.id1 = s.id2  where S2_24_4_3a between 16 and 20 group by nom_dd) as C43 on DEP.ccdd  = C43.ccdd 
          left join (select ccdd,  count(*) as t  from acu_seccion1 c inner join acu_seccion2 s on c.id1 = s.id2  where S2_24_4_4a between 16 and 20 group by nom_dd) as C44 on DEP.ccdd  = C44.ccdd  
          left join (select ccdd,  count(*) as t  from acu_seccion1 c inner join acu_seccion2 s on c.id1 = s.id2  where S2_24_4_5a between 16 and 20 group by nom_dd) as C45 on DEP.ccdd  = C45.ccdd  
          left join (select ccdd,  count(*) as t  from acu_seccion1 c inner join acu_seccion2 s on c.id1 = s.id2  where S2_24_4_6a between 16 and 20 group by nom_dd) as C46 on DEP.ccdd  = C46.ccdd  
          left join (select ccdd,  count(*) as t  from acu_seccion1 c inner join acu_seccion2 s on c.id1 = s.id2  where S2_24_4_7a between 16 and 20 group by nom_dd) as C47 on DEP.ccdd  = C47.ccdd  
          left join (select ccdd,  count(*) as t  from acu_seccion1 c inner join acu_seccion2 s on c.id1 = s.id2  where S2_24_4_8a between 16 and 20 group by nom_dd) as C48 on DEP.ccdd  = C48.ccdd  
          left join (select ccdd,  count(*) as t  from acu_seccion1 c inner join acu_seccion2 s on c.id1 = s.id2  where S2_24_4_9a between 16 and 20 group by nom_dd) as C49 on DEP.ccdd  = C49.ccdd  
          left join (select ccdd,  count(*) as t  from acu_seccion1 c inner join acu_seccion2 s on c.id1 = s.id2  where S2_24_4_10a between 16 and 20 group by nom_dd) as C50 on DEP.ccdd  = C50.ccdd) as table5
          on table1.ccdd = table5.ccdd
          INNER JOIN 
          (select 
          DEP.CCDD, DEPARTAMENTO, (COALESCE(C51.t,0) + COALESCE(C52.t,0) + COALESCE(C53.t,0) + COALESCE(C54.t,0) + COALESCE(C55.t,0) +
          COALESCE(C56.t,0) + COALESCE(C57.t,0) + COALESCE(C58.t,0) + COALESCE(C59.t,0) + COALESCE(C60.t,0)  ) AS MAS_20
          from (select  distinct(departamento), ccdd from departamentos_tab order by departamento) as DEP 
          left join (select ccdd,  count(*) as t  from acu_seccion1 c inner join acu_seccion2 s on c.id1 = s.id2  where S2_24_4_1a between 21 and 98 group by nom_dd) as C51 on DEP.ccdd  = C51.ccdd 
          left join (select ccdd,  count(*) as t  from acu_seccion1 c inner join acu_seccion2 s on c.id1 = s.id2  where S2_24_4_2a between 21 and 98 group by nom_dd) as C52 on DEP.ccdd  = C52.ccdd 
          left join (select ccdd,  count(*) as t  from acu_seccion1 c inner join acu_seccion2 s on c.id1 = s.id2  where S2_24_4_3a between 21 and 98 group by nom_dd) as C53 on DEP.ccdd  = C53.ccdd 
          left join (select ccdd,  count(*) as t  from acu_seccion1 c inner join acu_seccion2 s on c.id1 = s.id2  where S2_24_4_4a between 21 and 98 group by nom_dd) as C54 on DEP.ccdd  = C54.ccdd  
          left join (select ccdd,  count(*) as t  from acu_seccion1 c inner join acu_seccion2 s on c.id1 = s.id2  where S2_24_4_5a between 21 and 98 group by nom_dd) as C55 on DEP.ccdd  = C55.ccdd  
          left join (select ccdd,  count(*) as t  from acu_seccion1 c inner join acu_seccion2 s on c.id1 = s.id2  where S2_24_4_6a between 21 and 98 group by nom_dd) as C56 on DEP.ccdd  = C56.ccdd  
          left join (select ccdd,  count(*) as t  from acu_seccion1 c inner join acu_seccion2 s on c.id1 = s.id2  where S2_24_4_7a between 21 and 98 group by nom_dd) as C57 on DEP.ccdd  = C57.ccdd  
          left join (select ccdd,  count(*) as t  from acu_seccion1 c inner join acu_seccion2 s on c.id1 = s.id2  where S2_24_4_8a between 21 and 98 group by nom_dd) as C58 on DEP.ccdd  = C58.ccdd  
          left join (select ccdd,  count(*) as t  from acu_seccion1 c inner join acu_seccion2 s on c.id1 = s.id2  where S2_24_4_9a between 21 and 98 group by nom_dd) as C59 on DEP.ccdd  = C59.ccdd  
          left join (select ccdd,  count(*) as t  from acu_seccion1 c inner join acu_seccion2 s on c.id1 = s.id2  where S2_24_4_10a between 21 and 98 group by nom_dd) as C60 on DEP.ccdd  = C60.ccdd ) as table6
          on table1.ccdd = table6.ccdd
          INNER JOIN 
          (select 
          DEP.CCDD, DEPARTAMENTO, (COALESCE(C61.t,0) + COALESCE(C62.t,0) + COALESCE(C63.t,0) + COALESCE(C64.t,0) + COALESCE(C65.t,0) +
          COALESCE(C66.t,0) + COALESCE(C67.t,0) + COALESCE(C68.t,0) + COALESCE(C69.t,0) + COALESCE(C70.t,0)  )  NEP 
          from (select  distinct(departamento), ccdd from departamentos_tab order by departamento) as DEP 
          left join (select ccdd,  count(*) as t  from acu_seccion1 c inner join acu_seccion2 s on c.id1 = s.id2  where S2_24_4_1a = 99 group by nom_dd) as C61 on DEP.ccdd  = C61.ccdd 
          left join (select ccdd,  count(*) as t  from acu_seccion1 c inner join acu_seccion2 s on c.id1 = s.id2  where S2_24_4_2a = 99 group by nom_dd) as C62 on DEP.ccdd  = C62.ccdd 
          left join (select ccdd,  count(*) as t  from acu_seccion1 c inner join acu_seccion2 s on c.id1 = s.id2  where S2_24_4_3a = 99 group by nom_dd) as C63 on DEP.ccdd  = C63.ccdd 
          left join (select ccdd,  count(*) as t  from acu_seccion1 c inner join acu_seccion2 s on c.id1 = s.id2  where S2_24_4_4a = 99 group by nom_dd) as C64 on DEP.ccdd  = C64.ccdd  
          left join (select ccdd,  count(*) as t  from acu_seccion1 c inner join acu_seccion2 s on c.id1 = s.id2  where S2_24_4_5a = 99 group by nom_dd) as C65 on DEP.ccdd  = C65.ccdd  
          left join (select ccdd,  count(*) as t  from acu_seccion1 c inner join acu_seccion2 s on c.id1 = s.id2  where S2_24_4_6a = 99 group by nom_dd) as C66 on DEP.ccdd  = C66.ccdd  
          left join (select ccdd,  count(*) as t  from acu_seccion1 c inner join acu_seccion2 s on c.id1 = s.id2  where S2_24_4_7a = 99 group by nom_dd) as C67 on DEP.ccdd  = C67.ccdd  
          left join (select ccdd,  count(*) as t  from acu_seccion1 c inner join acu_seccion2 s on c.id1 = s.id2  where S2_24_4_8a = 99 group by nom_dd) as C68 on DEP.ccdd  = C68.ccdd  
          left join (select ccdd,  count(*) as t  from acu_seccion1 c inner join acu_seccion2 s on c.id1 = s.id2  where S2_24_4_9a = 99 group by nom_dd) as C69 on DEP.ccdd  = C69.ccdd  
          left join (select ccdd,  count(*) as t  from acu_seccion1 c inner join acu_seccion2 s on c.id1 = s.id2  where S2_24_4_10a = 99 group by nom_dd) as C70 on DEP.ccdd  = C70.ccdd ) AS table7
          on table1.ccdd = table7.ccdd;
        ");
      return $q;
}

function get_tabulado_117()
{          /* TABULADO N° 117  ------------------------ HIJOS VIVEN CON PESCADOR  --------------------------------------*/    
      $q = $this->db->query("
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
          left join (select ccdd,  count(*) as t  from acu_seccion1 c inner join acu_seccion2 s on c.id1 = s.id2  where S2_24_5_1 = 1 group by nom_dd) as C1 on DEP.ccdd  = C1.ccdd 
          left join (select ccdd,  count(*) as t  from acu_seccion1 c inner join acu_seccion2 s on c.id1 = s.id2  where S2_24_5_2 = 1 group by nom_dd) as C2 on DEP.ccdd  = C2.ccdd 
          left join (select ccdd,  count(*) as t  from acu_seccion1 c inner join acu_seccion2 s on c.id1 = s.id2  where S2_24_5_3 = 1 group by nom_dd) as C3 on DEP.ccdd  = C3.ccdd
          left join (select ccdd,  count(*) as t  from acu_seccion1 c inner join acu_seccion2 s on c.id1 = s.id2  where S2_24_5_4 = 1 group by nom_dd) as C4 on DEP.ccdd  = C4.ccdd  
          left join (select ccdd,  count(*) as t  from acu_seccion1 c inner join acu_seccion2 s on c.id1 = s.id2  where S2_24_5_5 = 1 group by nom_dd) as C5 on DEP.ccdd  = C5.ccdd  
          left join (select ccdd,  count(*) as t  from acu_seccion1 c inner join acu_seccion2 s on c.id1 = s.id2  where S2_24_5_6 = 1 group by nom_dd) as C6 on DEP.ccdd  = C6.ccdd  
          left join (select ccdd,  count(*) as t  from acu_seccion1 c inner join acu_seccion2 s on c.id1 = s.id2  where S2_24_5_7 = 1 group by nom_dd) as C7 on DEP.ccdd  = C7.ccdd  
          left join (select ccdd,  count(*) as t  from acu_seccion1 c inner join acu_seccion2 s on c.id1 = s.id2  where S2_24_5_8 = 1 group by nom_dd) as C8 on DEP.ccdd  = C8.ccdd  
          left join (select ccdd,  count(*) as t  from acu_seccion1 c inner join acu_seccion2 s on c.id1 = s.id2  where S2_24_5_9 = 1 group by nom_dd) as C9 on DEP.ccdd  = C9.ccdd  
          left join (select ccdd,  count(*) as t  from acu_seccion1 c inner join acu_seccion2 s on c.id1 = s.id2  where S2_24_5_10 = 1 group by nom_dd) as C10 on DEP.ccdd  = C10.ccdd  
          left join (select ccdd,  count(*) as t  from acu_seccion1 c inner join acu_seccion2 s on c.id1 = s.id2  where S2_24_5_1 = 2 group by nom_dd) as C11 on DEP.ccdd  = C11.ccdd 
          left join (select ccdd,  count(*) as t  from acu_seccion1 c inner join acu_seccion2 s on c.id1 = s.id2  where S2_24_5_2 = 2 group by nom_dd) as C12 on DEP.ccdd  = C12.ccdd 
          left join (select ccdd,  count(*) as t  from acu_seccion1 c inner join acu_seccion2 s on c.id1 = s.id2  where S2_24_5_3 = 2 group by nom_dd) as C13 on DEP.ccdd  = C13.ccdd
          left join (select ccdd,  count(*) as t  from acu_seccion1 c inner join acu_seccion2 s on c.id1 = s.id2  where S2_24_5_4 = 2 group by nom_dd) as C14 on DEP.ccdd  = C14.ccdd  
          left join (select ccdd,  count(*) as t  from acu_seccion1 c inner join acu_seccion2 s on c.id1 = s.id2  where S2_24_5_5 = 2 group by nom_dd) as C15 on DEP.ccdd  = C15.ccdd  
          left join (select ccdd,  count(*) as t  from acu_seccion1 c inner join acu_seccion2 s on c.id1 = s.id2  where S2_24_5_6 = 2 group by nom_dd) as C16 on DEP.ccdd  = C16.ccdd  
          left join (select ccdd,  count(*) as t  from acu_seccion1 c inner join acu_seccion2 s on c.id1 = s.id2  where S2_24_5_7 = 2 group by nom_dd) as C17 on DEP.ccdd  = C17.ccdd  
          left join (select ccdd,  count(*) as t  from acu_seccion1 c inner join acu_seccion2 s on c.id1 = s.id2  where S2_24_5_8 = 2 group by nom_dd) as C18 on DEP.ccdd  = C18.ccdd  
          left join (select ccdd,  count(*) as t  from acu_seccion1 c inner join acu_seccion2 s on c.id1 = s.id2  where S2_24_5_9 = 2 group by nom_dd) as C19 on DEP.ccdd  = C19.ccdd  
          left join (select ccdd,  count(*) as t  from acu_seccion1 c inner join acu_seccion2 s on c.id1 = s.id2  where S2_24_5_10 = 2 group by nom_dd) as C20 on DEP.ccdd  = C20.ccdd 
          left join (select ccdd,  count(*) as t  from acu_seccion1 c inner join acu_seccion2 s on c.id1 = s.id2  where S2_24_5_1 = 9 group by nom_dd) as C21 on DEP.ccdd  = C21.ccdd 
          left join (select ccdd,  count(*) as t  from acu_seccion1 c inner join acu_seccion2 s on c.id1 = s.id2  where S2_24_5_2 = 9 group by nom_dd) as C22 on DEP.ccdd  = C22.ccdd 
          left join (select ccdd,  count(*) as t  from acu_seccion1 c inner join acu_seccion2 s on c.id1 = s.id2  where S2_24_5_3 = 9 group by nom_dd) as C23 on DEP.ccdd  = C23.ccdd
          left join (select ccdd,  count(*) as t  from acu_seccion1 c inner join acu_seccion2 s on c.id1 = s.id2  where S2_24_5_4 = 9 group by nom_dd) as C24 on DEP.ccdd  = C24.ccdd  
          left join (select ccdd,  count(*) as t  from acu_seccion1 c inner join acu_seccion2 s on c.id1 = s.id2  where S2_24_5_5 = 9 group by nom_dd) as C25 on DEP.ccdd  = C25.ccdd  
          left join (select ccdd,  count(*) as t  from acu_seccion1 c inner join acu_seccion2 s on c.id1 = s.id2  where S2_24_5_6 = 9 group by nom_dd) as C26 on DEP.ccdd  = C26.ccdd  
          left join (select ccdd,  count(*) as t  from acu_seccion1 c inner join acu_seccion2 s on c.id1 = s.id2  where S2_24_5_7 = 9 group by nom_dd) as C27 on DEP.ccdd  = C27.ccdd  
          left join (select ccdd,  count(*) as t  from acu_seccion1 c inner join acu_seccion2 s on c.id1 = s.id2  where S2_24_5_8 = 9 group by nom_dd) as C28 on DEP.ccdd  = C28.ccdd  
          left join (select ccdd,  count(*) as t  from acu_seccion1 c inner join acu_seccion2 s on c.id1 = s.id2  where S2_24_5_9 = 9 group by nom_dd) as C29 on DEP.ccdd  = C29.ccdd  
          left join (select ccdd,  count(*) as t  from acu_seccion1 c inner join acu_seccion2 s on c.id1 = s.id2  where S2_24_5_10 = 9 group by nom_dd) as C30 on DEP.ccdd  = C30.ccdd  ;
        ");
      return $q;
}

function get_tabulado_118()
{          /* TABULADO N° 118  ------------------------ HIJOS  DEPENDEN DEL PESCADOR  --------------------------------------*/    
      $q = $this->db->query("
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
          left join (select ccdd,  count(*) as t  from acu_seccion1 c inner join acu_seccion2 s on c.id1 = s.id2  where S2_24_6_1 = 1 group by nom_dd) as C1 on DEP.ccdd  = C1.ccdd 
          left join (select ccdd,  count(*) as t  from acu_seccion1 c inner join acu_seccion2 s on c.id1 = s.id2  where S2_24_6_2 = 1 group by nom_dd) as C2 on DEP.ccdd  = C2.ccdd 
          left join (select ccdd,  count(*) as t  from acu_seccion1 c inner join acu_seccion2 s on c.id1 = s.id2  where S2_24_6_3 = 1 group by nom_dd) as C3 on DEP.ccdd  = C3.ccdd
          left join (select ccdd,  count(*) as t  from acu_seccion1 c inner join acu_seccion2 s on c.id1 = s.id2  where S2_24_6_4 = 1 group by nom_dd) as C4 on DEP.ccdd  = C4.ccdd  
          left join (select ccdd,  count(*) as t  from acu_seccion1 c inner join acu_seccion2 s on c.id1 = s.id2  where S2_24_6_5 = 1 group by nom_dd) as C5 on DEP.ccdd  = C5.ccdd  
          left join (select ccdd,  count(*) as t  from acu_seccion1 c inner join acu_seccion2 s on c.id1 = s.id2  where S2_24_6_6 = 1 group by nom_dd) as C6 on DEP.ccdd  = C6.ccdd  
          left join (select ccdd,  count(*) as t  from acu_seccion1 c inner join acu_seccion2 s on c.id1 = s.id2  where S2_24_6_7 = 1 group by nom_dd) as C7 on DEP.ccdd  = C7.ccdd  
          left join (select ccdd,  count(*) as t  from acu_seccion1 c inner join acu_seccion2 s on c.id1 = s.id2  where S2_24_6_8 = 1 group by nom_dd) as C8 on DEP.ccdd  = C8.ccdd  
          left join (select ccdd,  count(*) as t  from acu_seccion1 c inner join acu_seccion2 s on c.id1 = s.id2  where S2_24_6_9 = 1 group by nom_dd) as C9 on DEP.ccdd  = C9.ccdd  
          left join (select ccdd,  count(*) as t  from acu_seccion1 c inner join acu_seccion2 s on c.id1 = s.id2  where S2_24_6_10 = 1 group by nom_dd) as C10 on DEP.ccdd  = C10.ccdd  
          left join (select ccdd,  count(*) as t  from acu_seccion1 c inner join acu_seccion2 s on c.id1 = s.id2  where S2_24_6_1 = 2 group by nom_dd) as C11 on DEP.ccdd  = C11.ccdd 
          left join (select ccdd,  count(*) as t  from acu_seccion1 c inner join acu_seccion2 s on c.id1 = s.id2  where S2_24_6_2 = 2 group by nom_dd) as C12 on DEP.ccdd  = C12.ccdd 
          left join (select ccdd,  count(*) as t  from acu_seccion1 c inner join acu_seccion2 s on c.id1 = s.id2  where S2_24_6_3 = 2 group by nom_dd) as C13 on DEP.ccdd  = C13.ccdd
          left join (select ccdd,  count(*) as t  from acu_seccion1 c inner join acu_seccion2 s on c.id1 = s.id2  where S2_24_6_4 = 2 group by nom_dd) as C14 on DEP.ccdd  = C14.ccdd  
          left join (select ccdd,  count(*) as t  from acu_seccion1 c inner join acu_seccion2 s on c.id1 = s.id2  where S2_24_6_5 = 2 group by nom_dd) as C15 on DEP.ccdd  = C15.ccdd  
          left join (select ccdd,  count(*) as t  from acu_seccion1 c inner join acu_seccion2 s on c.id1 = s.id2  where S2_24_6_6 = 2 group by nom_dd) as C16 on DEP.ccdd  = C16.ccdd  
          left join (select ccdd,  count(*) as t  from acu_seccion1 c inner join acu_seccion2 s on c.id1 = s.id2  where S2_24_6_7 = 2 group by nom_dd) as C17 on DEP.ccdd  = C17.ccdd  
          left join (select ccdd,  count(*) as t  from acu_seccion1 c inner join acu_seccion2 s on c.id1 = s.id2  where S2_24_6_8 = 2 group by nom_dd) as C18 on DEP.ccdd  = C18.ccdd  
          left join (select ccdd,  count(*) as t  from acu_seccion1 c inner join acu_seccion2 s on c.id1 = s.id2  where S2_24_6_9 = 2 group by nom_dd) as C19 on DEP.ccdd  = C19.ccdd  
          left join (select ccdd,  count(*) as t  from acu_seccion1 c inner join acu_seccion2 s on c.id1 = s.id2  where S2_24_6_10 = 2 group by nom_dd) as C20 on DEP.ccdd  = C20.ccdd 
          left join (select ccdd,  count(*) as t  from acu_seccion1 c inner join acu_seccion2 s on c.id1 = s.id2  where S2_24_6_1 = 9 group by nom_dd) as C21 on DEP.ccdd  = C21.ccdd 
          left join (select ccdd,  count(*) as t  from acu_seccion1 c inner join acu_seccion2 s on c.id1 = s.id2  where S2_24_6_2 = 9 group by nom_dd) as C22 on DEP.ccdd  = C22.ccdd 
          left join (select ccdd,  count(*) as t  from acu_seccion1 c inner join acu_seccion2 s on c.id1 = s.id2  where S2_24_6_3 = 9 group by nom_dd) as C23 on DEP.ccdd  = C23.ccdd
          left join (select ccdd,  count(*) as t  from acu_seccion1 c inner join acu_seccion2 s on c.id1 = s.id2  where S2_24_6_4 = 9 group by nom_dd) as C24 on DEP.ccdd  = C24.ccdd  
          left join (select ccdd,  count(*) as t  from acu_seccion1 c inner join acu_seccion2 s on c.id1 = s.id2  where S2_24_6_5 = 9 group by nom_dd) as C25 on DEP.ccdd  = C25.ccdd  
          left join (select ccdd,  count(*) as t  from acu_seccion1 c inner join acu_seccion2 s on c.id1 = s.id2  where S2_24_6_6 = 9 group by nom_dd) as C26 on DEP.ccdd  = C26.ccdd  
          left join (select ccdd,  count(*) as t  from acu_seccion1 c inner join acu_seccion2 s on c.id1 = s.id2  where S2_24_6_7 = 9 group by nom_dd) as C27 on DEP.ccdd  = C27.ccdd  
          left join (select ccdd,  count(*) as t  from acu_seccion1 c inner join acu_seccion2 s on c.id1 = s.id2  where S2_24_6_8 = 9 group by nom_dd) as C28 on DEP.ccdd  = C28.ccdd  
          left join (select ccdd,  count(*) as t  from acu_seccion1 c inner join acu_seccion2 s on c.id1 = s.id2  where S2_24_6_9 = 9 group by nom_dd) as C29 on DEP.ccdd  = C29.ccdd  
          left join (select ccdd,  count(*) as t  from acu_seccion1 c inner join acu_seccion2 s on c.id1 = s.id2  where S2_24_6_10 = 9 group by nom_dd) as C30 on DEP.ccdd  = C30.ccdd  ;
        ");
      return $q;
}

function get_tabulado_119()
{          /* TABULADO N° 119  ------------------------ HIJOS   DEL PESCADOR CON LIMITACIONES  --------------------------------------*/
      $q = $this->db->query("
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
          left join (select ccdd,  count(*) as t  from acu_seccion1 c inner join acu_seccion2 s on c.id1 = s.id2  where S2_24_7_1 = 1 group by nom_dd) as C1 on DEP.ccdd  = C1.ccdd 
          left join (select ccdd,  count(*) as t  from acu_seccion1 c inner join acu_seccion2 s on c.id1 = s.id2  where S2_24_7_2 = 1 group by nom_dd) as C2 on DEP.ccdd  = C2.ccdd 
          left join (select ccdd,  count(*) as t  from acu_seccion1 c inner join acu_seccion2 s on c.id1 = s.id2  where S2_24_7_3 = 1 group by nom_dd) as C3 on DEP.ccdd  = C3.ccdd
          left join (select ccdd,  count(*) as t  from acu_seccion1 c inner join acu_seccion2 s on c.id1 = s.id2  where S2_24_7_4 = 1 group by nom_dd) as C4 on DEP.ccdd  = C4.ccdd  
          left join (select ccdd,  count(*) as t  from acu_seccion1 c inner join acu_seccion2 s on c.id1 = s.id2  where S2_24_7_5 = 1 group by nom_dd) as C5 on DEP.ccdd  = C5.ccdd  
          left join (select ccdd,  count(*) as t  from acu_seccion1 c inner join acu_seccion2 s on c.id1 = s.id2  where S2_24_7_6 = 1 group by nom_dd) as C6 on DEP.ccdd  = C6.ccdd  
          left join (select ccdd,  count(*) as t  from acu_seccion1 c inner join acu_seccion2 s on c.id1 = s.id2  where S2_24_7_7 = 1 group by nom_dd) as C7 on DEP.ccdd  = C7.ccdd  
          left join (select ccdd,  count(*) as t  from acu_seccion1 c inner join acu_seccion2 s on c.id1 = s.id2  where S2_24_7_8 = 1 group by nom_dd) as C8 on DEP.ccdd  = C8.ccdd  
          left join (select ccdd,  count(*) as t  from acu_seccion1 c inner join acu_seccion2 s on c.id1 = s.id2  where S2_24_7_9 = 1 group by nom_dd) as C9 on DEP.ccdd  = C9.ccdd  
          left join (select ccdd,  count(*) as t  from acu_seccion1 c inner join acu_seccion2 s on c.id1 = s.id2  where S2_24_7_10 = 1 group by nom_dd) as C10 on DEP.ccdd  = C10.ccdd  
          left join (select ccdd,  count(*) as t  from acu_seccion1 c inner join acu_seccion2 s on c.id1 = s.id2  where S2_24_7_1 = 2 group by nom_dd) as C11 on DEP.ccdd  = C11.ccdd 
          left join (select ccdd,  count(*) as t  from acu_seccion1 c inner join acu_seccion2 s on c.id1 = s.id2  where S2_24_7_2 = 2 group by nom_dd) as C12 on DEP.ccdd  = C12.ccdd 
          left join (select ccdd,  count(*) as t  from acu_seccion1 c inner join acu_seccion2 s on c.id1 = s.id2  where S2_24_7_3 = 2 group by nom_dd) as C13 on DEP.ccdd  = C13.ccdd
          left join (select ccdd,  count(*) as t  from acu_seccion1 c inner join acu_seccion2 s on c.id1 = s.id2  where S2_24_7_4 = 2 group by nom_dd) as C14 on DEP.ccdd  = C14.ccdd  
          left join (select ccdd,  count(*) as t  from acu_seccion1 c inner join acu_seccion2 s on c.id1 = s.id2  where S2_24_7_5 = 2 group by nom_dd) as C15 on DEP.ccdd  = C15.ccdd  
          left join (select ccdd,  count(*) as t  from acu_seccion1 c inner join acu_seccion2 s on c.id1 = s.id2  where S2_24_7_6 = 2 group by nom_dd) as C16 on DEP.ccdd  = C16.ccdd  
          left join (select ccdd,  count(*) as t  from acu_seccion1 c inner join acu_seccion2 s on c.id1 = s.id2  where S2_24_7_7 = 2 group by nom_dd) as C17 on DEP.ccdd  = C17.ccdd  
          left join (select ccdd,  count(*) as t  from acu_seccion1 c inner join acu_seccion2 s on c.id1 = s.id2  where S2_24_7_8 = 2 group by nom_dd) as C18 on DEP.ccdd  = C18.ccdd  
          left join (select ccdd,  count(*) as t  from acu_seccion1 c inner join acu_seccion2 s on c.id1 = s.id2  where S2_24_7_9 = 2 group by nom_dd) as C19 on DEP.ccdd  = C19.ccdd  
          left join (select ccdd,  count(*) as t  from acu_seccion1 c inner join acu_seccion2 s on c.id1 = s.id2  where S2_24_7_10 = 2 group by nom_dd) as C20 on DEP.ccdd  = C20.ccdd 
          left join (select ccdd,  count(*) as t  from acu_seccion1 c inner join acu_seccion2 s on c.id1 = s.id2  where S2_24_7_1 = 9 group by nom_dd) as C21 on DEP.ccdd  = C21.ccdd 
          left join (select ccdd,  count(*) as t  from acu_seccion1 c inner join acu_seccion2 s on c.id1 = s.id2  where S2_24_7_2 = 9 group by nom_dd) as C22 on DEP.ccdd  = C22.ccdd 
          left join (select ccdd,  count(*) as t  from acu_seccion1 c inner join acu_seccion2 s on c.id1 = s.id2  where S2_24_7_3 = 9 group by nom_dd) as C23 on DEP.ccdd  = C23.ccdd
          left join (select ccdd,  count(*) as t  from acu_seccion1 c inner join acu_seccion2 s on c.id1 = s.id2  where S2_24_7_4 = 9 group by nom_dd) as C24 on DEP.ccdd  = C24.ccdd  
          left join (select ccdd,  count(*) as t  from acu_seccion1 c inner join acu_seccion2 s on c.id1 = s.id2  where S2_24_7_5 = 9 group by nom_dd) as C25 on DEP.ccdd  = C25.ccdd  
          left join (select ccdd,  count(*) as t  from acu_seccion1 c inner join acu_seccion2 s on c.id1 = s.id2  where S2_24_7_6 = 9 group by nom_dd) as C26 on DEP.ccdd  = C26.ccdd  
          left join (select ccdd,  count(*) as t  from acu_seccion1 c inner join acu_seccion2 s on c.id1 = s.id2  where S2_24_7_7 = 9 group by nom_dd) as C27 on DEP.ccdd  = C27.ccdd  
          left join (select ccdd,  count(*) as t  from acu_seccion1 c inner join acu_seccion2 s on c.id1 = s.id2  where S2_24_7_8 = 9 group by nom_dd) as C28 on DEP.ccdd  = C28.ccdd  
          left join (select ccdd,  count(*) as t  from acu_seccion1 c inner join acu_seccion2 s on c.id1 = s.id2  where S2_24_7_9 = 9 group by nom_dd) as C29 on DEP.ccdd  = C29.ccdd  
          left join (select ccdd,  count(*) as t  from acu_seccion1 c inner join acu_seccion2 s on c.id1 = s.id2  where S2_24_7_10 = 9 group by nom_dd) as C30 on DEP.ccdd  = C30.ccdd  ;
        ");
      return $q;
}

function get_tabulado_120()
{      /* TABULADO N° 120  ------------------------ NIVEL DE ESTUDIOS DE LOS HIJOS  --------------------------------------*/
               
      $q = $this->db->query("
      SELECT  table1.CCDD, table1.DEPARTAMENTO, 
      (SIN_NIVEL + INICIAL + PRIMARIA_INC +  PRIMARIA_COM  + SECUNDARIA_INC + SECUNDARIA_COM + SUPERIOR_NO_UNI_INC + SUPERIOR_NO_UNI_COM +
      SUPERIOR_UNI_INC + SUPERIOR_UNI_COM + NEP) as TOTAL, SIN_NIVEL, INICIAL, PRIMARIA_INC,  PRIMARIA_COM ,  SECUNDARIA_INC, SECUNDARIA_COM, SUPERIOR_NO_UNI_INC, SUPERIOR_NO_UNI_COM,
      SUPERIOR_UNI_INC, SUPERIOR_UNI_COM, NEP FROM
      (select 
      DEP.CCDD, DEPARTAMENTO, ( COALESCE(C1.t,0) + COALESCE(C2.t,0) + COALESCE(C3.t,0) +  COALESCE(C4.t,0) +  COALESCE(C5.t,0) +  
      COALESCE(C6.t,0) + COALESCE(C7.t,0) + COALESCE(C8.t,0) +  COALESCE(C9.t,0)  + COALESCE(C10.t,0)  ) AS SIN_NIVEL
      from (select  distinct(departamento), ccdd from departamentos_tab order by departamento) as DEP 
      left join (select ccdd,  count(*) as t  from acu_seccion1 c inner join acu_seccion2 s on c.id1 = s.id2  where s2_24_8_1 = 1  group by nom_dd) as C1 on DEP.ccdd  = C1.ccdd 
      left join (select ccdd,  count(*) as t  from acu_seccion1 c inner join acu_seccion2 s on c.id1 = s.id2  where s2_24_8_2 = 1  group by nom_dd) as C2 on DEP.ccdd  = C2.ccdd 
      left join (select ccdd,  count(*) as t  from acu_seccion1 c inner join acu_seccion2 s on c.id1 = s.id2  where s2_24_8_3 = 1  group by nom_dd) as C3 on DEP.ccdd  = C3.ccdd
      left join (select ccdd,  count(*) as t  from acu_seccion1 c inner join acu_seccion2 s on c.id1 = s.id2  where s2_24_8_4 = 1  group by nom_dd) as C4 on DEP.ccdd  = C4.ccdd  
      left join (select ccdd,  count(*) as t  from acu_seccion1 c inner join acu_seccion2 s on c.id1 = s.id2  where s2_24_8_5 = 1  group by nom_dd) as C5 on DEP.ccdd  = C5.ccdd  
      left join (select ccdd,  count(*) as t  from acu_seccion1 c inner join acu_seccion2 s on c.id1 = s.id2  where s2_24_8_6 = 1  group by nom_dd) as C6 on DEP.ccdd  = C6.ccdd  
      left join (select ccdd,  count(*) as t  from acu_seccion1 c inner join acu_seccion2 s on c.id1 = s.id2  where s2_24_8_7 = 1  group by nom_dd) as C7 on DEP.ccdd  = C7.ccdd  
      left join (select ccdd,  count(*) as t  from acu_seccion1 c inner join acu_seccion2 s on c.id1 = s.id2  where s2_24_8_8 = 1  group by nom_dd) as C8 on DEP.ccdd  = C8.ccdd  
      left join (select ccdd,  count(*) as t  from acu_seccion1 c inner join acu_seccion2 s on c.id1 = s.id2  where s2_24_8_9 = 1  group by nom_dd) as C9 on DEP.ccdd  = C9.ccdd  
      left join (select ccdd,  count(*) as t  from acu_seccion1 c inner join acu_seccion2 s on c.id1 = s.id2  where s2_24_8_10 = 1  group by nom_dd) as C10 on DEP.ccdd  = C10.ccdd  ) as table1 
      inner join 
      (select 
      DEP.CCDD, DEPARTAMENTO, ( COALESCE(C1.t,0) + COALESCE(C2.t,0) + COALESCE(C3.t,0) +  COALESCE(C4.t,0) +  COALESCE(C5.t,0) +  
      COALESCE(C6.t,0) + COALESCE(C7.t,0) + COALESCE(C8.t,0) +  COALESCE(C9.t,0)  + COALESCE(C10.t,0)  ) as INICIAL
      from (select  distinct(departamento), ccdd from departamentos_tab order by departamento) as DEP 
      left join (select ccdd,  count(*) as t  from acu_seccion1 c inner join acu_seccion2 s on c.id1 = s.id2  where s2_24_8_1 = 2  group by nom_dd) as C1 on DEP.ccdd  = C1.ccdd 
      left join (select ccdd,  count(*) as t  from acu_seccion1 c inner join acu_seccion2 s on c.id1 = s.id2  where s2_24_8_2 = 2  group by nom_dd) as C2 on DEP.ccdd  = C2.ccdd 
      left join (select ccdd,  count(*) as t  from acu_seccion1 c inner join acu_seccion2 s on c.id1 = s.id2  where s2_24_8_3 = 2  group by nom_dd) as C3 on DEP.ccdd  = C3.ccdd
      left join (select ccdd,  count(*) as t  from acu_seccion1 c inner join acu_seccion2 s on c.id1 = s.id2  where s2_24_8_4 = 2  group by nom_dd) as C4 on DEP.ccdd  = C4.ccdd  
      left join (select ccdd,  count(*) as t  from acu_seccion1 c inner join acu_seccion2 s on c.id1 = s.id2  where s2_24_8_5 = 2  group by nom_dd) as C5 on DEP.ccdd  = C5.ccdd  
      left join (select ccdd,  count(*) as t  from acu_seccion1 c inner join acu_seccion2 s on c.id1 = s.id2  where s2_24_8_6 = 2  group by nom_dd) as C6 on DEP.ccdd  = C6.ccdd  
      left join (select ccdd,  count(*) as t  from acu_seccion1 c inner join acu_seccion2 s on c.id1 = s.id2  where s2_24_8_7 = 2  group by nom_dd) as C7 on DEP.ccdd  = C7.ccdd  
      left join (select ccdd,  count(*) as t  from acu_seccion1 c inner join acu_seccion2 s on c.id1 = s.id2  where s2_24_8_8 = 2  group by nom_dd) as C8 on DEP.ccdd  = C8.ccdd  
      left join (select ccdd,  count(*) as t  from acu_seccion1 c inner join acu_seccion2 s on c.id1 = s.id2  where s2_24_8_9 = 2  group by nom_dd) as C9 on DEP.ccdd  = C9.ccdd  
      left join (select ccdd,  count(*) as t  from acu_seccion1 c inner join acu_seccion2 s on c.id1 = s.id2  where s2_24_8_10 = 2  group by nom_dd) as C10 on DEP.ccdd  = C10.ccdd  ) as table2 
      on table1.ccdd = table2.ccdd
      inner join 
      (select 
      DEP.CCDD, DEPARTAMENTO, ( COALESCE(C1.t,0) + COALESCE(C2.t,0) + COALESCE(C3.t,0) +  COALESCE(C4.t,0) +  COALESCE(C5.t,0) +  
      COALESCE(C6.t,0) + COALESCE(C7.t,0) + COALESCE(C8.t,0) +  COALESCE(C9.t,0)  + COALESCE(C10.t,0)  ) as PRIMARIA_INC
      from (select  distinct(departamento), ccdd from departamentos_tab order by departamento) as DEP 
      left join (select ccdd,  count(*) as t  from acu_seccion1 c inner join acu_seccion2 s on c.id1 = s.id2  where s2_24_8_1 = 3  group by nom_dd) as C1 on DEP.ccdd  = C1.ccdd 
      left join (select ccdd,  count(*) as t  from acu_seccion1 c inner join acu_seccion2 s on c.id1 = s.id2  where s2_24_8_2 = 3  group by nom_dd) as C2 on DEP.ccdd  = C2.ccdd 
      left join (select ccdd,  count(*) as t  from acu_seccion1 c inner join acu_seccion2 s on c.id1 = s.id2  where s2_24_8_3 = 3  group by nom_dd) as C3 on DEP.ccdd  = C3.ccdd
      left join (select ccdd,  count(*) as t  from acu_seccion1 c inner join acu_seccion2 s on c.id1 = s.id2  where s2_24_8_4 = 3  group by nom_dd) as C4 on DEP.ccdd  = C4.ccdd  
      left join (select ccdd,  count(*) as t  from acu_seccion1 c inner join acu_seccion2 s on c.id1 = s.id2  where s2_24_8_5 = 3  group by nom_dd) as C5 on DEP.ccdd  = C5.ccdd  
      left join (select ccdd,  count(*) as t  from acu_seccion1 c inner join acu_seccion2 s on c.id1 = s.id2  where s2_24_8_6 = 3  group by nom_dd) as C6 on DEP.ccdd  = C6.ccdd  
      left join (select ccdd,  count(*) as t  from acu_seccion1 c inner join acu_seccion2 s on c.id1 = s.id2  where s2_24_8_7 = 3  group by nom_dd) as C7 on DEP.ccdd  = C7.ccdd  
      left join (select ccdd,  count(*) as t  from acu_seccion1 c inner join acu_seccion2 s on c.id1 = s.id2  where s2_24_8_8 = 3  group by nom_dd) as C8 on DEP.ccdd  = C8.ccdd  
      left join (select ccdd,  count(*) as t  from acu_seccion1 c inner join acu_seccion2 s on c.id1 = s.id2  where s2_24_8_9 = 3  group by nom_dd) as C9 on DEP.ccdd  = C9.ccdd  
      left join (select ccdd,  count(*) as t  from acu_seccion1 c inner join acu_seccion2 s on c.id1 = s.id2  where s2_24_8_10 = 3  group by nom_dd) as C10 on DEP.ccdd  = C10.ccdd  ) as table3 
      on table1.ccdd = table3.ccdd
      inner join 
      (select 
      DEP.CCDD, DEPARTAMENTO, ( COALESCE(C1.t,0) + COALESCE(C2.t,0) + COALESCE(C3.t,0) +  COALESCE(C4.t,0) +  COALESCE(C5.t,0) +  
      COALESCE(C6.t,0) + COALESCE(C7.t,0) + COALESCE(C8.t,0) +  COALESCE(C9.t,0)  + COALESCE(C10.t,0)  ) as PRIMARIA_COM
      from (select  distinct(departamento), ccdd from departamentos_tab order by departamento) as DEP 
      left join (select ccdd,  count(*) as t  from acu_seccion1 c inner join acu_seccion2 s on c.id1 = s.id2  where s2_24_8_1 = 4  group by nom_dd) as C1 on DEP.ccdd  = C1.ccdd 
      left join (select ccdd,  count(*) as t  from acu_seccion1 c inner join acu_seccion2 s on c.id1 = s.id2  where s2_24_8_2 = 4  group by nom_dd) as C2 on DEP.ccdd  = C2.ccdd 
      left join (select ccdd,  count(*) as t  from acu_seccion1 c inner join acu_seccion2 s on c.id1 = s.id2  where s2_24_8_3 = 4  group by nom_dd) as C3 on DEP.ccdd  = C3.ccdd
      left join (select ccdd,  count(*) as t  from acu_seccion1 c inner join acu_seccion2 s on c.id1 = s.id2  where s2_24_8_4 = 4  group by nom_dd) as C4 on DEP.ccdd  = C4.ccdd  
      left join (select ccdd,  count(*) as t  from acu_seccion1 c inner join acu_seccion2 s on c.id1 = s.id2  where s2_24_8_5 = 4  group by nom_dd) as C5 on DEP.ccdd  = C5.ccdd  
      left join (select ccdd,  count(*) as t  from acu_seccion1 c inner join acu_seccion2 s on c.id1 = s.id2  where s2_24_8_6 = 4  group by nom_dd) as C6 on DEP.ccdd  = C6.ccdd  
      left join (select ccdd,  count(*) as t  from acu_seccion1 c inner join acu_seccion2 s on c.id1 = s.id2  where s2_24_8_7 = 4  group by nom_dd) as C7 on DEP.ccdd  = C7.ccdd  
      left join (select ccdd,  count(*) as t  from acu_seccion1 c inner join acu_seccion2 s on c.id1 = s.id2  where s2_24_8_8 = 4  group by nom_dd) as C8 on DEP.ccdd  = C8.ccdd  
      left join (select ccdd,  count(*) as t  from acu_seccion1 c inner join acu_seccion2 s on c.id1 = s.id2  where s2_24_8_9 = 4  group by nom_dd) as C9 on DEP.ccdd  = C9.ccdd  
      left join (select ccdd,  count(*) as t  from acu_seccion1 c inner join acu_seccion2 s on c.id1 = s.id2  where s2_24_8_10 = 4  group by nom_dd) as C10 on DEP.ccdd  = C10.ccdd  ) as table4 
      on table1.ccdd = table4.ccdd
      inner join 
      (select 
      DEP.CCDD, DEPARTAMENTO, ( COALESCE(C1.t,0) + COALESCE(C2.t,0) + COALESCE(C3.t,0) +  COALESCE(C4.t,0) +  COALESCE(C5.t,0) +  
      COALESCE(C6.t,0) + COALESCE(C7.t,0) + COALESCE(C8.t,0) +  COALESCE(C9.t,0)  + COALESCE(C10.t,0)  ) as SECUNDARIA_INC
      from (select  distinct(departamento), ccdd from departamentos_tab order by departamento) as DEP 
      left join (select ccdd,  count(*) as t  from acu_seccion1 c inner join acu_seccion2 s on c.id1 = s.id2  where s2_24_8_1 = 5  group by nom_dd) as C1 on DEP.ccdd  = C1.ccdd 
      left join (select ccdd,  count(*) as t  from acu_seccion1 c inner join acu_seccion2 s on c.id1 = s.id2  where s2_24_8_2 = 5  group by nom_dd) as C2 on DEP.ccdd  = C2.ccdd 
      left join (select ccdd,  count(*) as t  from acu_seccion1 c inner join acu_seccion2 s on c.id1 = s.id2  where s2_24_8_3 = 5  group by nom_dd) as C3 on DEP.ccdd  = C3.ccdd
      left join (select ccdd,  count(*) as t  from acu_seccion1 c inner join acu_seccion2 s on c.id1 = s.id2  where s2_24_8_4 = 5  group by nom_dd) as C4 on DEP.ccdd  = C4.ccdd  
      left join (select ccdd,  count(*) as t  from acu_seccion1 c inner join acu_seccion2 s on c.id1 = s.id2  where s2_24_8_5 = 5  group by nom_dd) as C5 on DEP.ccdd  = C5.ccdd  
      left join (select ccdd,  count(*) as t  from acu_seccion1 c inner join acu_seccion2 s on c.id1 = s.id2  where s2_24_8_6 = 5  group by nom_dd) as C6 on DEP.ccdd  = C6.ccdd  
      left join (select ccdd,  count(*) as t  from acu_seccion1 c inner join acu_seccion2 s on c.id1 = s.id2  where s2_24_8_7 = 5  group by nom_dd) as C7 on DEP.ccdd  = C7.ccdd  
      left join (select ccdd,  count(*) as t  from acu_seccion1 c inner join acu_seccion2 s on c.id1 = s.id2  where s2_24_8_8 = 5  group by nom_dd) as C8 on DEP.ccdd  = C8.ccdd  
      left join (select ccdd,  count(*) as t  from acu_seccion1 c inner join acu_seccion2 s on c.id1 = s.id2  where s2_24_8_9 = 5  group by nom_dd) as C9 on DEP.ccdd  = C9.ccdd  
      left join (select ccdd,  count(*) as t  from acu_seccion1 c inner join acu_seccion2 s on c.id1 = s.id2  where s2_24_8_10 = 5  group by nom_dd) as C10 on DEP.ccdd  = C10.ccdd  ) as table5 
      on table1.ccdd = table5.ccdd
      inner join 
      (select 
      DEP.CCDD, DEPARTAMENTO, ( COALESCE(C1.t,0) + COALESCE(C2.t,0) + COALESCE(C3.t,0) +  COALESCE(C4.t,0) +  COALESCE(C5.t,0) +  
      COALESCE(C6.t,0) + COALESCE(C7.t,0) + COALESCE(C8.t,0) +  COALESCE(C9.t,0)  + COALESCE(C10.t,0)  ) as SECUNDARIA_COM
      from (select  distinct(departamento), ccdd from departamentos_tab order by departamento) as DEP 
      left join (select ccdd,  count(*) as t  from acu_seccion1 c inner join acu_seccion2 s on c.id1 = s.id2  where s2_24_8_1 = 6  group by nom_dd) as C1 on DEP.ccdd  = C1.ccdd 
      left join (select ccdd,  count(*) as t  from acu_seccion1 c inner join acu_seccion2 s on c.id1 = s.id2  where s2_24_8_2 = 6  group by nom_dd) as C2 on DEP.ccdd  = C2.ccdd 
      left join (select ccdd,  count(*) as t  from acu_seccion1 c inner join acu_seccion2 s on c.id1 = s.id2  where s2_24_8_3 = 6  group by nom_dd) as C3 on DEP.ccdd  = C3.ccdd
      left join (select ccdd,  count(*) as t  from acu_seccion1 c inner join acu_seccion2 s on c.id1 = s.id2  where s2_24_8_4 = 6  group by nom_dd) as C4 on DEP.ccdd  = C4.ccdd  
      left join (select ccdd,  count(*) as t  from acu_seccion1 c inner join acu_seccion2 s on c.id1 = s.id2  where s2_24_8_5 = 6  group by nom_dd) as C5 on DEP.ccdd  = C5.ccdd  
      left join (select ccdd,  count(*) as t  from acu_seccion1 c inner join acu_seccion2 s on c.id1 = s.id2  where s2_24_8_6 = 6  group by nom_dd) as C6 on DEP.ccdd  = C6.ccdd  
      left join (select ccdd,  count(*) as t  from acu_seccion1 c inner join acu_seccion2 s on c.id1 = s.id2  where s2_24_8_7 = 6  group by nom_dd) as C7 on DEP.ccdd  = C7.ccdd  
      left join (select ccdd,  count(*) as t  from acu_seccion1 c inner join acu_seccion2 s on c.id1 = s.id2  where s2_24_8_8 = 6  group by nom_dd) as C8 on DEP.ccdd  = C8.ccdd  
      left join (select ccdd,  count(*) as t  from acu_seccion1 c inner join acu_seccion2 s on c.id1 = s.id2  where s2_24_8_9 = 6  group by nom_dd) as C9 on DEP.ccdd  = C9.ccdd  
      left join (select ccdd,  count(*) as t  from acu_seccion1 c inner join acu_seccion2 s on c.id1 = s.id2  where s2_24_8_10 = 6  group by nom_dd) as C10 on DEP.ccdd  = C10.ccdd  ) as table6 
      on table1.ccdd = table6.ccdd
      inner join 
      (select 
      DEP.CCDD, DEPARTAMENTO, ( COALESCE(C1.t,0) + COALESCE(C2.t,0) + COALESCE(C3.t,0) +  COALESCE(C4.t,0) +  COALESCE(C5.t,0) +  
      COALESCE(C6.t,0) + COALESCE(C7.t,0) + COALESCE(C8.t,0) +  COALESCE(C9.t,0)  + COALESCE(C10.t,0)  ) as SUPERIOR_NO_UNI_INC
      from (select  distinct(departamento), ccdd from departamentos_tab order by departamento) as DEP 
      left join (select ccdd,  count(*) as t  from acu_seccion1 c inner join acu_seccion2 s on c.id1 = s.id2  where s2_24_8_1 = 7  group by nom_dd) as C1 on DEP.ccdd  = C1.ccdd 
      left join (select ccdd,  count(*) as t  from acu_seccion1 c inner join acu_seccion2 s on c.id1 = s.id2  where s2_24_8_2 = 7  group by nom_dd) as C2 on DEP.ccdd  = C2.ccdd 
      left join (select ccdd,  count(*) as t  from acu_seccion1 c inner join acu_seccion2 s on c.id1 = s.id2  where s2_24_8_3 = 7  group by nom_dd) as C3 on DEP.ccdd  = C3.ccdd
      left join (select ccdd,  count(*) as t  from acu_seccion1 c inner join acu_seccion2 s on c.id1 = s.id2  where s2_24_8_4 = 7  group by nom_dd) as C4 on DEP.ccdd  = C4.ccdd  
      left join (select ccdd,  count(*) as t  from acu_seccion1 c inner join acu_seccion2 s on c.id1 = s.id2  where s2_24_8_5 = 7  group by nom_dd) as C5 on DEP.ccdd  = C5.ccdd  
      left join (select ccdd,  count(*) as t  from acu_seccion1 c inner join acu_seccion2 s on c.id1 = s.id2  where s2_24_8_6 = 7  group by nom_dd) as C6 on DEP.ccdd  = C6.ccdd  
      left join (select ccdd,  count(*) as t  from acu_seccion1 c inner join acu_seccion2 s on c.id1 = s.id2  where s2_24_8_7 = 7  group by nom_dd) as C7 on DEP.ccdd  = C7.ccdd  
      left join (select ccdd,  count(*) as t  from acu_seccion1 c inner join acu_seccion2 s on c.id1 = s.id2  where s2_24_8_8 = 7  group by nom_dd) as C8 on DEP.ccdd  = C8.ccdd  
      left join (select ccdd,  count(*) as t  from acu_seccion1 c inner join acu_seccion2 s on c.id1 = s.id2  where s2_24_8_9 = 7  group by nom_dd) as C9 on DEP.ccdd  = C9.ccdd  
      left join (select ccdd,  count(*) as t  from acu_seccion1 c inner join acu_seccion2 s on c.id1 = s.id2  where s2_24_8_10 = 7  group by nom_dd) as C10 on DEP.ccdd  = C10.ccdd  ) as table7 
      on table1.ccdd = table7.ccdd
      inner join 
      (select 
      DEP.CCDD, DEPARTAMENTO, ( COALESCE(C1.t,0) + COALESCE(C2.t,0) + COALESCE(C3.t,0) +  COALESCE(C4.t,0) +  COALESCE(C5.t,0) +  
      COALESCE(C6.t,0) + COALESCE(C7.t,0) + COALESCE(C8.t,0) +  COALESCE(C9.t,0)  + COALESCE(C10.t,0)  )as SUPERIOR_NO_UNI_COM
      from (select  distinct(departamento), ccdd from departamentos_tab order by departamento) as DEP 
      left join (select ccdd,  count(*) as t  from acu_seccion1 c inner join acu_seccion2 s on c.id1 = s.id2  where s2_24_8_1 = 8  group by nom_dd) as C1 on DEP.ccdd  = C1.ccdd 
      left join (select ccdd,  count(*) as t  from acu_seccion1 c inner join acu_seccion2 s on c.id1 = s.id2  where s2_24_8_2 = 8  group by nom_dd) as C2 on DEP.ccdd  = C2.ccdd 
      left join (select ccdd,  count(*) as t  from acu_seccion1 c inner join acu_seccion2 s on c.id1 = s.id2  where s2_24_8_3 = 8  group by nom_dd) as C3 on DEP.ccdd  = C3.ccdd
      left join (select ccdd,  count(*) as t  from acu_seccion1 c inner join acu_seccion2 s on c.id1 = s.id2  where s2_24_8_4 = 8  group by nom_dd) as C4 on DEP.ccdd  = C4.ccdd  
      left join (select ccdd,  count(*) as t  from acu_seccion1 c inner join acu_seccion2 s on c.id1 = s.id2  where s2_24_8_5 = 8  group by nom_dd) as C5 on DEP.ccdd  = C5.ccdd  
      left join (select ccdd,  count(*) as t  from acu_seccion1 c inner join acu_seccion2 s on c.id1 = s.id2  where s2_24_8_6 = 8  group by nom_dd) as C6 on DEP.ccdd  = C6.ccdd  
      left join (select ccdd,  count(*) as t  from acu_seccion1 c inner join acu_seccion2 s on c.id1 = s.id2  where s2_24_8_7 = 8  group by nom_dd) as C7 on DEP.ccdd  = C7.ccdd  
      left join (select ccdd,  count(*) as t  from acu_seccion1 c inner join acu_seccion2 s on c.id1 = s.id2  where s2_24_8_8 = 8  group by nom_dd) as C8 on DEP.ccdd  = C8.ccdd  
      left join (select ccdd,  count(*) as t  from acu_seccion1 c inner join acu_seccion2 s on c.id1 = s.id2  where s2_24_8_9 = 8  group by nom_dd) as C9 on DEP.ccdd  = C9.ccdd  
      left join (select ccdd,  count(*) as t  from acu_seccion1 c inner join acu_seccion2 s on c.id1 = s.id2  where s2_24_8_10 = 8  group by nom_dd) as C10 on DEP.ccdd  = C10.ccdd  ) as table8 
      on table1.ccdd = table8.ccdd
      inner join 
      (select 
      DEP.CCDD, DEPARTAMENTO, ( COALESCE(C1.t,0) + COALESCE(C2.t,0) + COALESCE(C3.t,0) +  COALESCE(C4.t,0) +  COALESCE(C5.t,0) +  
      COALESCE(C6.t,0) + COALESCE(C7.t,0) + COALESCE(C8.t,0) +  COALESCE(C9.t,0)  + COALESCE(C10.t,0)  ) as SUPERIOR_UNI_INC
      from (select  distinct(departamento), ccdd from departamentos_tab order by departamento) as DEP 
      left join (select ccdd,  count(*) as t  from acu_seccion1 c inner join acu_seccion2 s on c.id1 = s.id2  where s2_24_8_1 = 9  group by nom_dd) as C1 on DEP.ccdd  = C1.ccdd 
      left join (select ccdd,  count(*) as t  from acu_seccion1 c inner join acu_seccion2 s on c.id1 = s.id2  where s2_24_8_2 = 9  group by nom_dd) as C2 on DEP.ccdd  = C2.ccdd 
      left join (select ccdd,  count(*) as t  from acu_seccion1 c inner join acu_seccion2 s on c.id1 = s.id2  where s2_24_8_3 = 9  group by nom_dd) as C3 on DEP.ccdd  = C3.ccdd
      left join (select ccdd,  count(*) as t  from acu_seccion1 c inner join acu_seccion2 s on c.id1 = s.id2  where s2_24_8_4 = 9  group by nom_dd) as C4 on DEP.ccdd  = C4.ccdd  
      left join (select ccdd,  count(*) as t  from acu_seccion1 c inner join acu_seccion2 s on c.id1 = s.id2  where s2_24_8_5 = 9  group by nom_dd) as C5 on DEP.ccdd  = C5.ccdd  
      left join (select ccdd,  count(*) as t  from acu_seccion1 c inner join acu_seccion2 s on c.id1 = s.id2  where s2_24_8_6 = 9  group by nom_dd) as C6 on DEP.ccdd  = C6.ccdd  
      left join (select ccdd,  count(*) as t  from acu_seccion1 c inner join acu_seccion2 s on c.id1 = s.id2  where s2_24_8_7 = 9  group by nom_dd) as C7 on DEP.ccdd  = C7.ccdd  
      left join (select ccdd,  count(*) as t  from acu_seccion1 c inner join acu_seccion2 s on c.id1 = s.id2  where s2_24_8_8 = 9  group by nom_dd) as C8 on DEP.ccdd  = C8.ccdd  
      left join (select ccdd,  count(*) as t  from acu_seccion1 c inner join acu_seccion2 s on c.id1 = s.id2  where s2_24_8_9 = 9  group by nom_dd) as C9 on DEP.ccdd  = C9.ccdd  
      left join (select ccdd,  count(*) as t  from acu_seccion1 c inner join acu_seccion2 s on c.id1 = s.id2  where s2_24_8_10 = 9  group by nom_dd) as C10 on DEP.ccdd  = C10.ccdd  ) as table9 
      on table1.ccdd = table9.ccdd
      inner join 
      (select 
      DEP.CCDD, DEPARTAMENTO, ( COALESCE(C1.t,0) + COALESCE(C2.t,0) + COALESCE(C3.t,0) +  COALESCE(C4.t,0) +  COALESCE(C5.t,0) +  
      COALESCE(C6.t,0) + COALESCE(C7.t,0) + COALESCE(C8.t,0) +  COALESCE(C9.t,0)  + COALESCE(C10.t,0)  ) as SUPERIOR_UNI_COM
      from (select  distinct(departamento), ccdd from departamentos_tab order by departamento) as DEP 
      left join (select ccdd,  count(*) as t  from acu_seccion1 c inner join acu_seccion2 s on c.id1 = s.id2  where s2_24_8_1 = 10  group by nom_dd) as C1 on DEP.ccdd  = C1.ccdd 
      left join (select ccdd,  count(*) as t  from acu_seccion1 c inner join acu_seccion2 s on c.id1 = s.id2  where s2_24_8_2 = 10  group by nom_dd) as C2 on DEP.ccdd  = C2.ccdd 
      left join (select ccdd,  count(*) as t  from acu_seccion1 c inner join acu_seccion2 s on c.id1 = s.id2  where s2_24_8_3 = 10  group by nom_dd) as C3 on DEP.ccdd  = C3.ccdd
      left join (select ccdd,  count(*) as t  from acu_seccion1 c inner join acu_seccion2 s on c.id1 = s.id2  where s2_24_8_4 = 10  group by nom_dd) as C4 on DEP.ccdd  = C4.ccdd  
      left join (select ccdd,  count(*) as t  from acu_seccion1 c inner join acu_seccion2 s on c.id1 = s.id2  where s2_24_8_5 = 10  group by nom_dd) as C5 on DEP.ccdd  = C5.ccdd  
      left join (select ccdd,  count(*) as t  from acu_seccion1 c inner join acu_seccion2 s on c.id1 = s.id2  where s2_24_8_6 = 10  group by nom_dd) as C6 on DEP.ccdd  = C6.ccdd  
      left join (select ccdd,  count(*) as t  from acu_seccion1 c inner join acu_seccion2 s on c.id1 = s.id2  where s2_24_8_7 = 10  group by nom_dd) as C7 on DEP.ccdd  = C7.ccdd  
      left join (select ccdd,  count(*) as t  from acu_seccion1 c inner join acu_seccion2 s on c.id1 = s.id2  where s2_24_8_8 = 10  group by nom_dd) as C8 on DEP.ccdd  = C8.ccdd  
      left join (select ccdd,  count(*) as t  from acu_seccion1 c inner join acu_seccion2 s on c.id1 = s.id2  where s2_24_8_9 = 10  group by nom_dd) as C9 on DEP.ccdd  = C9.ccdd  
      left join (select ccdd,  count(*) as t  from acu_seccion1 c inner join acu_seccion2 s on c.id1 = s.id2  where s2_24_8_10 = 10  group by nom_dd) as C10 on DEP.ccdd  = C10.ccdd  ) as table10 
      on table1.ccdd = table10.ccdd
      inner join 
      (select 
      DEP.CCDD, DEPARTAMENTO, ( COALESCE(C1.t,0) + COALESCE(C2.t,0) + COALESCE(C3.t,0) +  COALESCE(C4.t,0) +  COALESCE(C5.t,0) +  
      COALESCE(C6.t,0) + COALESCE(C7.t,0) + COALESCE(C8.t,0) +  COALESCE(C9.t,0)  + COALESCE(C10.t,0)  ) as NEP
      from (select  distinct(departamento), ccdd from departamentos_tab order by departamento) as DEP 
      left join (select ccdd,  count(*) as t  from acu_seccion1 c inner join acu_seccion2 s on c.id1 = s.id2  where s2_24_8_1 = 99  group by nom_dd) as C1 on DEP.ccdd  = C1.ccdd 
      left join (select ccdd,  count(*) as t  from acu_seccion1 c inner join acu_seccion2 s on c.id1 = s.id2  where s2_24_8_2 = 99  group by nom_dd) as C2 on DEP.ccdd  = C2.ccdd 
      left join (select ccdd,  count(*) as t  from acu_seccion1 c inner join acu_seccion2 s on c.id1 = s.id2  where s2_24_8_3 = 99  group by nom_dd) as C3 on DEP.ccdd  = C3.ccdd
      left join (select ccdd,  count(*) as t  from acu_seccion1 c inner join acu_seccion2 s on c.id1 = s.id2  where s2_24_8_4 = 99  group by nom_dd) as C4 on DEP.ccdd  = C4.ccdd  
      left join (select ccdd,  count(*) as t  from acu_seccion1 c inner join acu_seccion2 s on c.id1 = s.id2  where s2_24_8_5 = 99  group by nom_dd) as C5 on DEP.ccdd  = C5.ccdd  
      left join (select ccdd,  count(*) as t  from acu_seccion1 c inner join acu_seccion2 s on c.id1 = s.id2  where s2_24_8_6 = 99  group by nom_dd) as C6 on DEP.ccdd  = C6.ccdd  
      left join (select ccdd,  count(*) as t  from acu_seccion1 c inner join acu_seccion2 s on c.id1 = s.id2  where s2_24_8_7 = 99  group by nom_dd) as C7 on DEP.ccdd  = C7.ccdd  
      left join (select ccdd,  count(*) as t  from acu_seccion1 c inner join acu_seccion2 s on c.id1 = s.id2  where s2_24_8_8 = 99  group by nom_dd) as C8 on DEP.ccdd  = C8.ccdd  
      left join (select ccdd,  count(*) as t  from acu_seccion1 c inner join acu_seccion2 s on c.id1 = s.id2  where s2_24_8_9 = 99  group by nom_dd) as C9 on DEP.ccdd  = C9.ccdd  
      left join (select ccdd,  count(*) as t  from acu_seccion1 c inner join acu_seccion2 s on c.id1 = s.id2  where s2_24_8_10 = 99  group by nom_dd) as C10 on DEP.ccdd  = C10.ccdd  ) as table11 
      on table1.ccdd = table11.ccdd;
        ");
      return $q;
}

function get_tabulado_121()
{          /* TABULADO N° 121  ------------------------ HIJOS   DEL PESCADOR ASISTEN AL COLEGIO  --------------------------------------*/    
      $q = $this->db->query("
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
          left join (select ccdd,  count(*) as t  from acu_seccion1 c inner join acu_seccion2 s on c.id1 = s.id2  where S2_24_9_1 = 1 group by nom_dd) as C1 on DEP.ccdd  = C1.ccdd 
          left join (select ccdd,  count(*) as t  from acu_seccion1 c inner join acu_seccion2 s on c.id1 = s.id2  where S2_24_9_2 = 1 group by nom_dd) as C2 on DEP.ccdd  = C2.ccdd 
          left join (select ccdd,  count(*) as t  from acu_seccion1 c inner join acu_seccion2 s on c.id1 = s.id2  where S2_24_9_3 = 1 group by nom_dd) as C3 on DEP.ccdd  = C3.ccdd
          left join (select ccdd,  count(*) as t  from acu_seccion1 c inner join acu_seccion2 s on c.id1 = s.id2  where S2_24_9_4 = 1 group by nom_dd) as C4 on DEP.ccdd  = C4.ccdd  
          left join (select ccdd,  count(*) as t  from acu_seccion1 c inner join acu_seccion2 s on c.id1 = s.id2  where S2_24_9_5 = 1 group by nom_dd) as C5 on DEP.ccdd  = C5.ccdd  
          left join (select ccdd,  count(*) as t  from acu_seccion1 c inner join acu_seccion2 s on c.id1 = s.id2  where S2_24_9_6 = 1 group by nom_dd) as C6 on DEP.ccdd  = C6.ccdd  
          left join (select ccdd,  count(*) as t  from acu_seccion1 c inner join acu_seccion2 s on c.id1 = s.id2  where S2_24_9_7 = 1 group by nom_dd) as C7 on DEP.ccdd  = C7.ccdd  
          left join (select ccdd,  count(*) as t  from acu_seccion1 c inner join acu_seccion2 s on c.id1 = s.id2  where S2_24_9_8 = 1 group by nom_dd) as C8 on DEP.ccdd  = C8.ccdd  
          left join (select ccdd,  count(*) as t  from acu_seccion1 c inner join acu_seccion2 s on c.id1 = s.id2  where S2_24_9_9 = 1 group by nom_dd) as C9 on DEP.ccdd  = C9.ccdd  
          left join (select ccdd,  count(*) as t  from acu_seccion1 c inner join acu_seccion2 s on c.id1 = s.id2  where S2_24_9_10 = 1 group by nom_dd) as C10 on DEP.ccdd  = C10.ccdd  
          left join (select ccdd,  count(*) as t  from acu_seccion1 c inner join acu_seccion2 s on c.id1 = s.id2  where S2_24_9_1 = 2 group by nom_dd) as C11 on DEP.ccdd  = C11.ccdd 
          left join (select ccdd,  count(*) as t  from acu_seccion1 c inner join acu_seccion2 s on c.id1 = s.id2  where S2_24_9_2 = 2 group by nom_dd) as C12 on DEP.ccdd  = C12.ccdd 
          left join (select ccdd,  count(*) as t  from acu_seccion1 c inner join acu_seccion2 s on c.id1 = s.id2  where S2_24_9_3 = 2 group by nom_dd) as C13 on DEP.ccdd  = C13.ccdd
          left join (select ccdd,  count(*) as t  from acu_seccion1 c inner join acu_seccion2 s on c.id1 = s.id2  where S2_24_9_4 = 2 group by nom_dd) as C14 on DEP.ccdd  = C14.ccdd  
          left join (select ccdd,  count(*) as t  from acu_seccion1 c inner join acu_seccion2 s on c.id1 = s.id2  where S2_24_9_5 = 2 group by nom_dd) as C15 on DEP.ccdd  = C15.ccdd  
          left join (select ccdd,  count(*) as t  from acu_seccion1 c inner join acu_seccion2 s on c.id1 = s.id2  where S2_24_9_6 = 2 group by nom_dd) as C16 on DEP.ccdd  = C16.ccdd  
          left join (select ccdd,  count(*) as t  from acu_seccion1 c inner join acu_seccion2 s on c.id1 = s.id2  where S2_24_9_7 = 2 group by nom_dd) as C17 on DEP.ccdd  = C17.ccdd  
          left join (select ccdd,  count(*) as t  from acu_seccion1 c inner join acu_seccion2 s on c.id1 = s.id2  where S2_24_9_8 = 2 group by nom_dd) as C18 on DEP.ccdd  = C18.ccdd  
          left join (select ccdd,  count(*) as t  from acu_seccion1 c inner join acu_seccion2 s on c.id1 = s.id2  where S2_24_9_9 = 2 group by nom_dd) as C19 on DEP.ccdd  = C19.ccdd  
          left join (select ccdd,  count(*) as t  from acu_seccion1 c inner join acu_seccion2 s on c.id1 = s.id2  where S2_24_9_10 = 2 group by nom_dd) as C20 on DEP.ccdd  = C20.ccdd 
          left join (select ccdd,  count(*) as t  from acu_seccion1 c inner join acu_seccion2 s on c.id1 = s.id2  where S2_24_9_1 = 9 group by nom_dd) as C21 on DEP.ccdd  = C21.ccdd 
          left join (select ccdd,  count(*) as t  from acu_seccion1 c inner join acu_seccion2 s on c.id1 = s.id2  where S2_24_9_2 = 9 group by nom_dd) as C22 on DEP.ccdd  = C22.ccdd 
          left join (select ccdd,  count(*) as t  from acu_seccion1 c inner join acu_seccion2 s on c.id1 = s.id2  where S2_24_9_3 = 9 group by nom_dd) as C23 on DEP.ccdd  = C23.ccdd
          left join (select ccdd,  count(*) as t  from acu_seccion1 c inner join acu_seccion2 s on c.id1 = s.id2  where S2_24_9_4 = 9 group by nom_dd) as C24 on DEP.ccdd  = C24.ccdd  
          left join (select ccdd,  count(*) as t  from acu_seccion1 c inner join acu_seccion2 s on c.id1 = s.id2  where S2_24_9_5 = 9 group by nom_dd) as C25 on DEP.ccdd  = C25.ccdd  
          left join (select ccdd,  count(*) as t  from acu_seccion1 c inner join acu_seccion2 s on c.id1 = s.id2  where S2_24_9_6 = 9 group by nom_dd) as C26 on DEP.ccdd  = C26.ccdd  
          left join (select ccdd,  count(*) as t  from acu_seccion1 c inner join acu_seccion2 s on c.id1 = s.id2  where S2_24_9_7 = 9 group by nom_dd) as C27 on DEP.ccdd  = C27.ccdd  
          left join (select ccdd,  count(*) as t  from acu_seccion1 c inner join acu_seccion2 s on c.id1 = s.id2  where S2_24_9_8 = 9 group by nom_dd) as C28 on DEP.ccdd  = C28.ccdd  
          left join (select ccdd,  count(*) as t  from acu_seccion1 c inner join acu_seccion2 s on c.id1 = s.id2  where S2_24_9_9 = 9 group by nom_dd) as C29 on DEP.ccdd  = C29.ccdd  
          left join (select ccdd,  count(*) as t  from acu_seccion1 c inner join acu_seccion2 s on c.id1 = s.id2  where S2_24_9_10 = 9 group by nom_dd) as C30 on DEP.ccdd  = C30.ccdd  ;
        ");
      return $q;
}

function get_tabulado_122()
{          /* TABULADO N° 122  ------------------------ HIJOS   DEL PESCADOR TIPO COLEGIO  QUE ASISTEN  --------------------------------------*/    
      $q = $this->db->query("
          select 
          DEP.CCDD, DEPARTAMENTO, ( COALESCE(C1.t,0) + COALESCE(C2.t,0) + COALESCE(C3.t,0) +  COALESCE(C4.t,0) +  COALESCE(C5.t,0) +  
          COALESCE(C6.t,0) + COALESCE(C7.t,0) + COALESCE(C8.t,0) +  COALESCE(C9.t,0)  + COALESCE(C10.t,0) +
          COALESCE(C11.t,0) + COALESCE(C12.t,0) + COALESCE(C13.t,0) + COALESCE(C14.t,0) + COALESCE(C15.t,0) +
          COALESCE(C16.t,0) + COALESCE(C17.t,0) + COALESCE(C18.t,0) + COALESCE(C19.t,0) + COALESCE(C20.t,0) +
          COALESCE(C21.t,0) + COALESCE(C22.t,0) + COALESCE(C23.t,0) + COALESCE(C24.t,0) + COALESCE(C25.t,0) +
          COALESCE(C26.t,0) + COALESCE(C27.t,0) + COALESCE(C28.t,0) + COALESCE(C29.t,0) + COALESCE(C30.t,0)   ) AS TOTAL,
          ( COALESCE(C1.t,0) + COALESCE(C2.t,0) + COALESCE(C3.t,0) +  COALESCE(C4.t,0) +  COALESCE(C5.t,0) +  
          COALESCE(C6.t,0) + COALESCE(C7.t,0) + COALESCE(C8.t,0) +  COALESCE(C9.t,0)  + COALESCE(C10.t,0) ) as 'ESTATAL',  
          (COALESCE(C11.t,0) + COALESCE(C12.t,0) + COALESCE(C13.t,0) + COALESCE(C14.t,0) + COALESCE(C15.t,0) +
          COALESCE(C16.t,0) + COALESCE(C17.t,0) + COALESCE(C18.t,0) + COALESCE(C19.t,0) + COALESCE(C20.t,0)  ) AS 'PRIVADA',  
          (COALESCE(C21.t,0) + COALESCE(C22.t,0) + COALESCE(C23.t,0) + COALESCE(C24.t,0) + COALESCE(C25.t,0) +
          COALESCE(C26.t,0) + COALESCE(C27.t,0) + COALESCE(C28.t,0) + COALESCE(C29.t,0) + COALESCE(C30.t,0)  ) AS NEP
          from (select  distinct(departamento), ccdd from departamentos_tab order by departamento) as DEP 
          left join (select ccdd,  count(*) as t  from acu_seccion1 c inner join acu_seccion2 s on c.id1 = s.id2  where S2_24_10_1 = 1 group by nom_dd) as C1 on DEP.ccdd  = C1.ccdd 
          left join (select ccdd,  count(*) as t  from acu_seccion1 c inner join acu_seccion2 s on c.id1 = s.id2  where S2_24_10_2 = 1 group by nom_dd) as C2 on DEP.ccdd  = C2.ccdd 
          left join (select ccdd,  count(*) as t  from acu_seccion1 c inner join acu_seccion2 s on c.id1 = s.id2  where S2_24_10_3 = 1 group by nom_dd) as C3 on DEP.ccdd  = C3.ccdd
          left join (select ccdd,  count(*) as t  from acu_seccion1 c inner join acu_seccion2 s on c.id1 = s.id2  where S2_24_10_4 = 1 group by nom_dd) as C4 on DEP.ccdd  = C4.ccdd  
          left join (select ccdd,  count(*) as t  from acu_seccion1 c inner join acu_seccion2 s on c.id1 = s.id2  where S2_24_10_5 = 1 group by nom_dd) as C5 on DEP.ccdd  = C5.ccdd  
          left join (select ccdd,  count(*) as t  from acu_seccion1 c inner join acu_seccion2 s on c.id1 = s.id2  where S2_24_10_6 = 1 group by nom_dd) as C6 on DEP.ccdd  = C6.ccdd  
          left join (select ccdd,  count(*) as t  from acu_seccion1 c inner join acu_seccion2 s on c.id1 = s.id2  where S2_24_10_7 = 1 group by nom_dd) as C7 on DEP.ccdd  = C7.ccdd  
          left join (select ccdd,  count(*) as t  from acu_seccion1 c inner join acu_seccion2 s on c.id1 = s.id2  where S2_24_10_8 = 1 group by nom_dd) as C8 on DEP.ccdd  = C8.ccdd  
          left join (select ccdd,  count(*) as t  from acu_seccion1 c inner join acu_seccion2 s on c.id1 = s.id2  where S2_24_10_9 = 1 group by nom_dd) as C9 on DEP.ccdd  = C9.ccdd  
          left join (select ccdd,  count(*) as t  from acu_seccion1 c inner join acu_seccion2 s on c.id1 = s.id2  where S2_24_10_10 = 1 group by nom_dd) as C10 on DEP.ccdd  = C10.ccdd  
          left join (select ccdd,  count(*) as t  from acu_seccion1 c inner join acu_seccion2 s on c.id1 = s.id2  where S2_24_10_1 = 2 group by nom_dd) as C11 on DEP.ccdd  = C11.ccdd 
          left join (select ccdd,  count(*) as t  from acu_seccion1 c inner join acu_seccion2 s on c.id1 = s.id2  where S2_24_10_2 = 2 group by nom_dd) as C12 on DEP.ccdd  = C12.ccdd 
          left join (select ccdd,  count(*) as t  from acu_seccion1 c inner join acu_seccion2 s on c.id1 = s.id2  where S2_24_10_3 = 2 group by nom_dd) as C13 on DEP.ccdd  = C13.ccdd
          left join (select ccdd,  count(*) as t  from acu_seccion1 c inner join acu_seccion2 s on c.id1 = s.id2  where S2_24_10_4 = 2 group by nom_dd) as C14 on DEP.ccdd  = C14.ccdd  
          left join (select ccdd,  count(*) as t  from acu_seccion1 c inner join acu_seccion2 s on c.id1 = s.id2  where S2_24_10_5 = 2 group by nom_dd) as C15 on DEP.ccdd  = C15.ccdd  
          left join (select ccdd,  count(*) as t  from acu_seccion1 c inner join acu_seccion2 s on c.id1 = s.id2  where S2_24_10_6 = 2 group by nom_dd) as C16 on DEP.ccdd  = C16.ccdd  
          left join (select ccdd,  count(*) as t  from acu_seccion1 c inner join acu_seccion2 s on c.id1 = s.id2  where S2_24_10_7 = 2 group by nom_dd) as C17 on DEP.ccdd  = C17.ccdd  
          left join (select ccdd,  count(*) as t  from acu_seccion1 c inner join acu_seccion2 s on c.id1 = s.id2  where S2_24_10_8 = 2 group by nom_dd) as C18 on DEP.ccdd  = C18.ccdd  
          left join (select ccdd,  count(*) as t  from acu_seccion1 c inner join acu_seccion2 s on c.id1 = s.id2  where S2_24_10_9 = 2 group by nom_dd) as C19 on DEP.ccdd  = C19.ccdd  
          left join (select ccdd,  count(*) as t  from acu_seccion1 c inner join acu_seccion2 s on c.id1 = s.id2  where S2_24_10_10 = 2 group by nom_dd) as C20 on DEP.ccdd  = C20.ccdd 
          left join (select ccdd,  count(*) as t  from acu_seccion1 c inner join acu_seccion2 s on c.id1 = s.id2  where S2_24_10_1 = 9 group by nom_dd) as C21 on DEP.ccdd  = C21.ccdd 
          left join (select ccdd,  count(*) as t  from acu_seccion1 c inner join acu_seccion2 s on c.id1 = s.id2  where S2_24_10_2 = 9 group by nom_dd) as C22 on DEP.ccdd  = C22.ccdd 
          left join (select ccdd,  count(*) as t  from acu_seccion1 c inner join acu_seccion2 s on c.id1 = s.id2  where S2_24_10_3 = 9 group by nom_dd) as C23 on DEP.ccdd  = C23.ccdd
          left join (select ccdd,  count(*) as t  from acu_seccion1 c inner join acu_seccion2 s on c.id1 = s.id2  where S2_24_10_4 = 9 group by nom_dd) as C24 on DEP.ccdd  = C24.ccdd  
          left join (select ccdd,  count(*) as t  from acu_seccion1 c inner join acu_seccion2 s on c.id1 = s.id2  where S2_24_10_5 = 9 group by nom_dd) as C25 on DEP.ccdd  = C25.ccdd  
          left join (select ccdd,  count(*) as t  from acu_seccion1 c inner join acu_seccion2 s on c.id1 = s.id2  where S2_24_10_6 = 9 group by nom_dd) as C26 on DEP.ccdd  = C26.ccdd  
          left join (select ccdd,  count(*) as t  from acu_seccion1 c inner join acu_seccion2 s on c.id1 = s.id2  where S2_24_10_7 = 9 group by nom_dd) as C27 on DEP.ccdd  = C27.ccdd  
          left join (select ccdd,  count(*) as t  from acu_seccion1 c inner join acu_seccion2 s on c.id1 = s.id2  where S2_24_10_8 = 9 group by nom_dd) as C28 on DEP.ccdd  = C28.ccdd  
          left join (select ccdd,  count(*) as t  from acu_seccion1 c inner join acu_seccion2 s on c.id1 = s.id2  where S2_24_10_9 = 9 group by nom_dd) as C29 on DEP.ccdd  = C29.ccdd  
          left join (select ccdd,  count(*) as t  from acu_seccion1 c inner join acu_seccion2 s on c.id1 = s.id2  where S2_24_10_10 = 9 group by nom_dd) as C30 on DEP.ccdd  = C30.ccdd  ;
        ");
      return $q;
}

function get_tabulado_123()
{          /* TABULADO N° 123  ------------------------ ACTIVIDAD DE LOS HIJOS  --------------------------------------*/         
      $q = $this->db->query("
          SELECT  table1.CCDD, table1.DEPARTAMENTO, 
          (AGRICOLA + PECUARIA + ACUICOLA +  PESCA  + CAZA + CONSTRUCCION + COMERCIO + OTRA +
          NINGUNA  + NEP) as TOTAL, AGRICOLA, PECUARIA, ACUICOLA,  PESCA ,  CAZA, CONSTRUCCION, COMERCIO, OTRA,
          NINGUNA, NEP FROM
          (select 
          DEP.CCDD, DEPARTAMENTO, ( COALESCE(C1.t,0) + COALESCE(C2.t,0) + COALESCE(C3.t,0) +  COALESCE(C4.t,0) +  COALESCE(C5.t,0) +  
          COALESCE(C6.t,0) + COALESCE(C7.t,0) + COALESCE(C8.t,0) +  COALESCE(C9.t,0)  + COALESCE(C10.t,0)  ) AS AGRICOLA
          from (select  distinct(departamento), ccdd from departamentos_tab order by departamento) as DEP 
          left join (select ccdd,  count(*) as t  from acu_seccion1 c inner join acu_seccion2 s on c.id1 = s.id2  where s2_24_11_1 = 1  group by nom_dd) as C1 on DEP.ccdd  = C1.ccdd 
          left join (select ccdd,  count(*) as t  from acu_seccion1 c inner join acu_seccion2 s on c.id1 = s.id2  where s2_24_11_2 = 1  group by nom_dd) as C2 on DEP.ccdd  = C2.ccdd 
          left join (select ccdd,  count(*) as t  from acu_seccion1 c inner join acu_seccion2 s on c.id1 = s.id2  where s2_24_11_3 = 1  group by nom_dd) as C3 on DEP.ccdd  = C3.ccdd
          left join (select ccdd,  count(*) as t  from acu_seccion1 c inner join acu_seccion2 s on c.id1 = s.id2  where s2_24_11_4 = 1  group by nom_dd) as C4 on DEP.ccdd  = C4.ccdd  
          left join (select ccdd,  count(*) as t  from acu_seccion1 c inner join acu_seccion2 s on c.id1 = s.id2  where s2_24_11_5 = 1  group by nom_dd) as C5 on DEP.ccdd  = C5.ccdd  
          left join (select ccdd,  count(*) as t  from acu_seccion1 c inner join acu_seccion2 s on c.id1 = s.id2  where s2_24_11_6 = 1  group by nom_dd) as C6 on DEP.ccdd  = C6.ccdd  
          left join (select ccdd,  count(*) as t  from acu_seccion1 c inner join acu_seccion2 s on c.id1 = s.id2  where s2_24_11_7 = 1  group by nom_dd) as C7 on DEP.ccdd  = C7.ccdd  
          left join (select ccdd,  count(*) as t  from acu_seccion1 c inner join acu_seccion2 s on c.id1 = s.id2  where s2_24_11_8 = 1  group by nom_dd) as C8 on DEP.ccdd  = C8.ccdd  
          left join (select ccdd,  count(*) as t  from acu_seccion1 c inner join acu_seccion2 s on c.id1 = s.id2  where s2_24_11_9 = 1  group by nom_dd) as C9 on DEP.ccdd  = C9.ccdd  
          left join (select ccdd,  count(*) as t  from acu_seccion1 c inner join acu_seccion2 s on c.id1 = s.id2  where s2_24_11_10 = 1  group by nom_dd) as C10 on DEP.ccdd  = C10.ccdd  ) as table1 
          inner join 
          (select 
          DEP.CCDD, DEPARTAMENTO, ( COALESCE(C1.t,0) + COALESCE(C2.t,0) + COALESCE(C3.t,0) +  COALESCE(C4.t,0) +  COALESCE(C5.t,0) +  
          COALESCE(C6.t,0) + COALESCE(C7.t,0) + COALESCE(C8.t,0) +  COALESCE(C9.t,0)  + COALESCE(C10.t,0)  ) as PECUARIA
          from (select  distinct(departamento), ccdd from departamentos_tab order by departamento) as DEP 
          left join (select ccdd,  count(*) as t  from acu_seccion1 c inner join acu_seccion2 s on c.id1 = s.id2  where s2_24_11_1 = 2  group by nom_dd) as C1 on DEP.ccdd  = C1.ccdd 
          left join (select ccdd,  count(*) as t  from acu_seccion1 c inner join acu_seccion2 s on c.id1 = s.id2  where s2_24_11_2 = 2  group by nom_dd) as C2 on DEP.ccdd  = C2.ccdd 
          left join (select ccdd,  count(*) as t  from acu_seccion1 c inner join acu_seccion2 s on c.id1 = s.id2  where s2_24_11_3 = 2  group by nom_dd) as C3 on DEP.ccdd  = C3.ccdd
          left join (select ccdd,  count(*) as t  from acu_seccion1 c inner join acu_seccion2 s on c.id1 = s.id2  where s2_24_11_4 = 2  group by nom_dd) as C4 on DEP.ccdd  = C4.ccdd  
          left join (select ccdd,  count(*) as t  from acu_seccion1 c inner join acu_seccion2 s on c.id1 = s.id2  where s2_24_11_5 = 2  group by nom_dd) as C5 on DEP.ccdd  = C5.ccdd  
          left join (select ccdd,  count(*) as t  from acu_seccion1 c inner join acu_seccion2 s on c.id1 = s.id2  where s2_24_11_6 = 2  group by nom_dd) as C6 on DEP.ccdd  = C6.ccdd  
          left join (select ccdd,  count(*) as t  from acu_seccion1 c inner join acu_seccion2 s on c.id1 = s.id2  where s2_24_11_7 = 2  group by nom_dd) as C7 on DEP.ccdd  = C7.ccdd  
          left join (select ccdd,  count(*) as t  from acu_seccion1 c inner join acu_seccion2 s on c.id1 = s.id2  where s2_24_11_8 = 2  group by nom_dd) as C8 on DEP.ccdd  = C8.ccdd  
          left join (select ccdd,  count(*) as t  from acu_seccion1 c inner join acu_seccion2 s on c.id1 = s.id2  where s2_24_11_9 = 2  group by nom_dd) as C9 on DEP.ccdd  = C9.ccdd  
          left join (select ccdd,  count(*) as t  from acu_seccion1 c inner join acu_seccion2 s on c.id1 = s.id2  where s2_24_11_10 = 2  group by nom_dd) as C10 on DEP.ccdd  = C10.ccdd  ) as table2 
          on table1.ccdd = table2.ccdd
          inner join 
          (select 
          DEP.CCDD, DEPARTAMENTO, ( COALESCE(C1.t,0) + COALESCE(C2.t,0) + COALESCE(C3.t,0) +  COALESCE(C4.t,0) +  COALESCE(C5.t,0) +  
          COALESCE(C6.t,0) + COALESCE(C7.t,0) + COALESCE(C8.t,0) +  COALESCE(C9.t,0)  + COALESCE(C10.t,0)  ) as ACUICOLA
          from (select  distinct(departamento), ccdd from departamentos_tab order by departamento) as DEP 
          left join (select ccdd,  count(*) as t  from acu_seccion1 c inner join acu_seccion2 s on c.id1 = s.id2  where s2_24_11_1 = 3  group by nom_dd) as C1 on DEP.ccdd  = C1.ccdd 
          left join (select ccdd,  count(*) as t  from acu_seccion1 c inner join acu_seccion2 s on c.id1 = s.id2  where s2_24_11_2 = 3  group by nom_dd) as C2 on DEP.ccdd  = C2.ccdd 
          left join (select ccdd,  count(*) as t  from acu_seccion1 c inner join acu_seccion2 s on c.id1 = s.id2  where s2_24_11_3 = 3  group by nom_dd) as C3 on DEP.ccdd  = C3.ccdd
          left join (select ccdd,  count(*) as t  from acu_seccion1 c inner join acu_seccion2 s on c.id1 = s.id2  where s2_24_11_4 = 3  group by nom_dd) as C4 on DEP.ccdd  = C4.ccdd  
          left join (select ccdd,  count(*) as t  from acu_seccion1 c inner join acu_seccion2 s on c.id1 = s.id2  where s2_24_11_5 = 3  group by nom_dd) as C5 on DEP.ccdd  = C5.ccdd  
          left join (select ccdd,  count(*) as t  from acu_seccion1 c inner join acu_seccion2 s on c.id1 = s.id2  where s2_24_11_6 = 3  group by nom_dd) as C6 on DEP.ccdd  = C6.ccdd  
          left join (select ccdd,  count(*) as t  from acu_seccion1 c inner join acu_seccion2 s on c.id1 = s.id2  where s2_24_11_7 = 3  group by nom_dd) as C7 on DEP.ccdd  = C7.ccdd  
          left join (select ccdd,  count(*) as t  from acu_seccion1 c inner join acu_seccion2 s on c.id1 = s.id2  where s2_24_11_8 = 3  group by nom_dd) as C8 on DEP.ccdd  = C8.ccdd  
          left join (select ccdd,  count(*) as t  from acu_seccion1 c inner join acu_seccion2 s on c.id1 = s.id2  where s2_24_11_9 = 3  group by nom_dd) as C9 on DEP.ccdd  = C9.ccdd  
          left join (select ccdd,  count(*) as t  from acu_seccion1 c inner join acu_seccion2 s on c.id1 = s.id2  where s2_24_11_10 = 3  group by nom_dd) as C10 on DEP.ccdd  = C10.ccdd  ) as table3 
          on table1.ccdd = table3.ccdd
          inner join 
          (select 
          DEP.CCDD, DEPARTAMENTO, ( COALESCE(C1.t,0) + COALESCE(C2.t,0) + COALESCE(C3.t,0) +  COALESCE(C4.t,0) +  COALESCE(C5.t,0) +  
          COALESCE(C6.t,0) + COALESCE(C7.t,0) + COALESCE(C8.t,0) +  COALESCE(C9.t,0)  + COALESCE(C10.t,0)  ) as PESCA
          from (select  distinct(departamento), ccdd from departamentos_tab order by departamento) as DEP 
          left join (select ccdd,  count(*) as t  from acu_seccion1 c inner join acu_seccion2 s on c.id1 = s.id2  where s2_24_11_1 = 4  group by nom_dd) as C1 on DEP.ccdd  = C1.ccdd 
          left join (select ccdd,  count(*) as t  from acu_seccion1 c inner join acu_seccion2 s on c.id1 = s.id2  where s2_24_11_2 = 4  group by nom_dd) as C2 on DEP.ccdd  = C2.ccdd 
          left join (select ccdd,  count(*) as t  from acu_seccion1 c inner join acu_seccion2 s on c.id1 = s.id2  where s2_24_11_3 = 4  group by nom_dd) as C3 on DEP.ccdd  = C3.ccdd
          left join (select ccdd,  count(*) as t  from acu_seccion1 c inner join acu_seccion2 s on c.id1 = s.id2  where s2_24_11_4 = 4  group by nom_dd) as C4 on DEP.ccdd  = C4.ccdd  
          left join (select ccdd,  count(*) as t  from acu_seccion1 c inner join acu_seccion2 s on c.id1 = s.id2  where s2_24_11_5 = 4  group by nom_dd) as C5 on DEP.ccdd  = C5.ccdd  
          left join (select ccdd,  count(*) as t  from acu_seccion1 c inner join acu_seccion2 s on c.id1 = s.id2  where s2_24_11_6 = 4  group by nom_dd) as C6 on DEP.ccdd  = C6.ccdd  
          left join (select ccdd,  count(*) as t  from acu_seccion1 c inner join acu_seccion2 s on c.id1 = s.id2  where s2_24_11_7 = 4  group by nom_dd) as C7 on DEP.ccdd  = C7.ccdd  
          left join (select ccdd,  count(*) as t  from acu_seccion1 c inner join acu_seccion2 s on c.id1 = s.id2  where s2_24_11_8 = 4  group by nom_dd) as C8 on DEP.ccdd  = C8.ccdd  
          left join (select ccdd,  count(*) as t  from acu_seccion1 c inner join acu_seccion2 s on c.id1 = s.id2  where s2_24_11_9 = 4  group by nom_dd) as C9 on DEP.ccdd  = C9.ccdd  
          left join (select ccdd,  count(*) as t  from acu_seccion1 c inner join acu_seccion2 s on c.id1 = s.id2  where s2_24_11_10 = 4  group by nom_dd) as C10 on DEP.ccdd  = C10.ccdd  ) as table4 
          on table1.ccdd = table4.ccdd
          inner join 
          (select 
          DEP.CCDD, DEPARTAMENTO, ( COALESCE(C1.t,0) + COALESCE(C2.t,0) + COALESCE(C3.t,0) +  COALESCE(C4.t,0) +  COALESCE(C5.t,0) +  
          COALESCE(C6.t,0) + COALESCE(C7.t,0) + COALESCE(C8.t,0) +  COALESCE(C9.t,0)  + COALESCE(C10.t,0)  ) as CAZA
          from (select  distinct(departamento), ccdd from departamentos_tab order by departamento) as DEP 
          left join (select ccdd,  count(*) as t  from acu_seccion1 c inner join acu_seccion2 s on c.id1 = s.id2  where s2_24_11_1 = 5  group by nom_dd) as C1 on DEP.ccdd  = C1.ccdd 
          left join (select ccdd,  count(*) as t  from acu_seccion1 c inner join acu_seccion2 s on c.id1 = s.id2  where s2_24_11_2 = 5  group by nom_dd) as C2 on DEP.ccdd  = C2.ccdd 
          left join (select ccdd,  count(*) as t  from acu_seccion1 c inner join acu_seccion2 s on c.id1 = s.id2  where s2_24_11_3 = 5  group by nom_dd) as C3 on DEP.ccdd  = C3.ccdd
          left join (select ccdd,  count(*) as t  from acu_seccion1 c inner join acu_seccion2 s on c.id1 = s.id2  where s2_24_11_4 = 5  group by nom_dd) as C4 on DEP.ccdd  = C4.ccdd  
          left join (select ccdd,  count(*) as t  from acu_seccion1 c inner join acu_seccion2 s on c.id1 = s.id2  where s2_24_11_5 = 5  group by nom_dd) as C5 on DEP.ccdd  = C5.ccdd  
          left join (select ccdd,  count(*) as t  from acu_seccion1 c inner join acu_seccion2 s on c.id1 = s.id2  where s2_24_11_6 = 5  group by nom_dd) as C6 on DEP.ccdd  = C6.ccdd  
          left join (select ccdd,  count(*) as t  from acu_seccion1 c inner join acu_seccion2 s on c.id1 = s.id2  where s2_24_11_7 = 5  group by nom_dd) as C7 on DEP.ccdd  = C7.ccdd  
          left join (select ccdd,  count(*) as t  from acu_seccion1 c inner join acu_seccion2 s on c.id1 = s.id2  where s2_24_11_8 = 5  group by nom_dd) as C8 on DEP.ccdd  = C8.ccdd  
          left join (select ccdd,  count(*) as t  from acu_seccion1 c inner join acu_seccion2 s on c.id1 = s.id2  where s2_24_11_9 = 5  group by nom_dd) as C9 on DEP.ccdd  = C9.ccdd  
          left join (select ccdd,  count(*) as t  from acu_seccion1 c inner join acu_seccion2 s on c.id1 = s.id2  where s2_24_11_10 = 5  group by nom_dd) as C10 on DEP.ccdd  = C10.ccdd  ) as table5 
          on table1.ccdd = table5.ccdd
          inner join 
          (select 
          DEP.CCDD, DEPARTAMENTO, ( COALESCE(C1.t,0) + COALESCE(C2.t,0) + COALESCE(C3.t,0) +  COALESCE(C4.t,0) +  COALESCE(C5.t,0) +  
          COALESCE(C6.t,0) + COALESCE(C7.t,0) + COALESCE(C8.t,0) +  COALESCE(C9.t,0)  + COALESCE(C10.t,0)  ) as CONSTRUCCION
          from (select  distinct(departamento), ccdd from departamentos_tab order by departamento) as DEP 
          left join (select ccdd,  count(*) as t  from acu_seccion1 c inner join acu_seccion2 s on c.id1 = s.id2  where s2_24_11_1 = 6  group by nom_dd) as C1 on DEP.ccdd  = C1.ccdd 
          left join (select ccdd,  count(*) as t  from acu_seccion1 c inner join acu_seccion2 s on c.id1 = s.id2  where s2_24_11_2 = 6  group by nom_dd) as C2 on DEP.ccdd  = C2.ccdd 
          left join (select ccdd,  count(*) as t  from acu_seccion1 c inner join acu_seccion2 s on c.id1 = s.id2  where s2_24_11_3 = 6  group by nom_dd) as C3 on DEP.ccdd  = C3.ccdd
          left join (select ccdd,  count(*) as t  from acu_seccion1 c inner join acu_seccion2 s on c.id1 = s.id2  where s2_24_11_4 = 6  group by nom_dd) as C4 on DEP.ccdd  = C4.ccdd  
          left join (select ccdd,  count(*) as t  from acu_seccion1 c inner join acu_seccion2 s on c.id1 = s.id2  where s2_24_11_5 = 6  group by nom_dd) as C5 on DEP.ccdd  = C5.ccdd  
          left join (select ccdd,  count(*) as t  from acu_seccion1 c inner join acu_seccion2 s on c.id1 = s.id2  where s2_24_11_6 = 6  group by nom_dd) as C6 on DEP.ccdd  = C6.ccdd  
          left join (select ccdd,  count(*) as t  from acu_seccion1 c inner join acu_seccion2 s on c.id1 = s.id2  where s2_24_11_7 = 6  group by nom_dd) as C7 on DEP.ccdd  = C7.ccdd  
          left join (select ccdd,  count(*) as t  from acu_seccion1 c inner join acu_seccion2 s on c.id1 = s.id2  where s2_24_11_8 = 6  group by nom_dd) as C8 on DEP.ccdd  = C8.ccdd  
          left join (select ccdd,  count(*) as t  from acu_seccion1 c inner join acu_seccion2 s on c.id1 = s.id2  where s2_24_11_9 = 6  group by nom_dd) as C9 on DEP.ccdd  = C9.ccdd  
          left join (select ccdd,  count(*) as t  from acu_seccion1 c inner join acu_seccion2 s on c.id1 = s.id2  where s2_24_11_10 = 6  group by nom_dd) as C10 on DEP.ccdd  = C10.ccdd  ) as table6 
          on table1.ccdd = table6.ccdd
          inner join 
          (select 
          DEP.CCDD, DEPARTAMENTO, ( COALESCE(C1.t,0) + COALESCE(C2.t,0) + COALESCE(C3.t,0) +  COALESCE(C4.t,0) +  COALESCE(C5.t,0) +  
          COALESCE(C6.t,0) + COALESCE(C7.t,0) + COALESCE(C8.t,0) +  COALESCE(C9.t,0)  + COALESCE(C10.t,0)  ) as COMERCIO
          from (select  distinct(departamento), ccdd from departamentos_tab order by departamento) as DEP 
          left join (select ccdd,  count(*) as t  from acu_seccion1 c inner join acu_seccion2 s on c.id1 = s.id2  where s2_24_11_1 = 7  group by nom_dd) as C1 on DEP.ccdd  = C1.ccdd 
          left join (select ccdd,  count(*) as t  from acu_seccion1 c inner join acu_seccion2 s on c.id1 = s.id2  where s2_24_11_2 = 7  group by nom_dd) as C2 on DEP.ccdd  = C2.ccdd 
          left join (select ccdd,  count(*) as t  from acu_seccion1 c inner join acu_seccion2 s on c.id1 = s.id2  where s2_24_11_3 = 7  group by nom_dd) as C3 on DEP.ccdd  = C3.ccdd
          left join (select ccdd,  count(*) as t  from acu_seccion1 c inner join acu_seccion2 s on c.id1 = s.id2  where s2_24_11_4 = 7  group by nom_dd) as C4 on DEP.ccdd  = C4.ccdd  
          left join (select ccdd,  count(*) as t  from acu_seccion1 c inner join acu_seccion2 s on c.id1 = s.id2  where s2_24_11_5 = 7  group by nom_dd) as C5 on DEP.ccdd  = C5.ccdd  
          left join (select ccdd,  count(*) as t  from acu_seccion1 c inner join acu_seccion2 s on c.id1 = s.id2  where s2_24_11_6 = 7  group by nom_dd) as C6 on DEP.ccdd  = C6.ccdd  
          left join (select ccdd,  count(*) as t  from acu_seccion1 c inner join acu_seccion2 s on c.id1 = s.id2  where s2_24_11_7 = 7  group by nom_dd) as C7 on DEP.ccdd  = C7.ccdd  
          left join (select ccdd,  count(*) as t  from acu_seccion1 c inner join acu_seccion2 s on c.id1 = s.id2  where s2_24_11_8 = 7  group by nom_dd) as C8 on DEP.ccdd  = C8.ccdd  
          left join (select ccdd,  count(*) as t  from acu_seccion1 c inner join acu_seccion2 s on c.id1 = s.id2  where s2_24_11_9 = 7  group by nom_dd) as C9 on DEP.ccdd  = C9.ccdd  
          left join (select ccdd,  count(*) as t  from acu_seccion1 c inner join acu_seccion2 s on c.id1 = s.id2  where s2_24_11_10 = 7  group by nom_dd) as C10 on DEP.ccdd  = C10.ccdd  ) as table7 
          on table1.ccdd = table7.ccdd
          inner join 
          (select 
          DEP.CCDD, DEPARTAMENTO, ( COALESCE(C1.t,0) + COALESCE(C2.t,0) + COALESCE(C3.t,0) +  COALESCE(C4.t,0) +  COALESCE(C5.t,0) +  
          COALESCE(C6.t,0) + COALESCE(C7.t,0) + COALESCE(C8.t,0) +  COALESCE(C9.t,0)  + COALESCE(C10.t,0)  )as OTRA
          from (select  distinct(departamento), ccdd from departamentos_tab order by departamento) as DEP 
          left join (select ccdd,  count(*) as t  from acu_seccion1 c inner join acu_seccion2 s on c.id1 = s.id2  where s2_24_11_1 = 8  group by nom_dd) as C1 on DEP.ccdd  = C1.ccdd 
          left join (select ccdd,  count(*) as t  from acu_seccion1 c inner join acu_seccion2 s on c.id1 = s.id2  where s2_24_11_2 = 8  group by nom_dd) as C2 on DEP.ccdd  = C2.ccdd 
          left join (select ccdd,  count(*) as t  from acu_seccion1 c inner join acu_seccion2 s on c.id1 = s.id2  where s2_24_11_3 = 8  group by nom_dd) as C3 on DEP.ccdd  = C3.ccdd
          left join (select ccdd,  count(*) as t  from acu_seccion1 c inner join acu_seccion2 s on c.id1 = s.id2  where s2_24_11_4 = 8  group by nom_dd) as C4 on DEP.ccdd  = C4.ccdd  
          left join (select ccdd,  count(*) as t  from acu_seccion1 c inner join acu_seccion2 s on c.id1 = s.id2  where s2_24_11_5 = 8  group by nom_dd) as C5 on DEP.ccdd  = C5.ccdd  
          left join (select ccdd,  count(*) as t  from acu_seccion1 c inner join acu_seccion2 s on c.id1 = s.id2  where s2_24_11_6 = 8  group by nom_dd) as C6 on DEP.ccdd  = C6.ccdd  
          left join (select ccdd,  count(*) as t  from acu_seccion1 c inner join acu_seccion2 s on c.id1 = s.id2  where s2_24_11_7 = 8  group by nom_dd) as C7 on DEP.ccdd  = C7.ccdd  
          left join (select ccdd,  count(*) as t  from acu_seccion1 c inner join acu_seccion2 s on c.id1 = s.id2  where s2_24_11_8 = 8  group by nom_dd) as C8 on DEP.ccdd  = C8.ccdd  
          left join (select ccdd,  count(*) as t  from acu_seccion1 c inner join acu_seccion2 s on c.id1 = s.id2  where s2_24_11_9 = 8  group by nom_dd) as C9 on DEP.ccdd  = C9.ccdd  
          left join (select ccdd,  count(*) as t  from acu_seccion1 c inner join acu_seccion2 s on c.id1 = s.id2  where s2_24_11_10 = 8  group by nom_dd) as C10 on DEP.ccdd  = C10.ccdd  ) as table8 
          on table1.ccdd = table8.ccdd
          inner join 
          (select 
          DEP.CCDD, DEPARTAMENTO, ( COALESCE(C1.t,0) + COALESCE(C2.t,0) + COALESCE(C3.t,0) +  COALESCE(C4.t,0) +  COALESCE(C5.t,0) +  
          COALESCE(C6.t,0) + COALESCE(C7.t,0) + COALESCE(C8.t,0) +  COALESCE(C9.t,0)  + COALESCE(C10.t,0)  ) as NINGUNA
          from (select  distinct(departamento), ccdd from departamentos_tab order by departamento) as DEP 
          left join (select ccdd,  count(*) as t  from acu_seccion1 c inner join acu_seccion2 s on c.id1 = s.id2  where s2_24_11_1 = 9  group by nom_dd) as C1 on DEP.ccdd  = C1.ccdd 
          left join (select ccdd,  count(*) as t  from acu_seccion1 c inner join acu_seccion2 s on c.id1 = s.id2  where s2_24_11_2 = 9  group by nom_dd) as C2 on DEP.ccdd  = C2.ccdd 
          left join (select ccdd,  count(*) as t  from acu_seccion1 c inner join acu_seccion2 s on c.id1 = s.id2  where s2_24_11_3 = 9  group by nom_dd) as C3 on DEP.ccdd  = C3.ccdd
          left join (select ccdd,  count(*) as t  from acu_seccion1 c inner join acu_seccion2 s on c.id1 = s.id2  where s2_24_11_4 = 9  group by nom_dd) as C4 on DEP.ccdd  = C4.ccdd  
          left join (select ccdd,  count(*) as t  from acu_seccion1 c inner join acu_seccion2 s on c.id1 = s.id2  where s2_24_11_5 = 9  group by nom_dd) as C5 on DEP.ccdd  = C5.ccdd  
          left join (select ccdd,  count(*) as t  from acu_seccion1 c inner join acu_seccion2 s on c.id1 = s.id2  where s2_24_11_6 = 9  group by nom_dd) as C6 on DEP.ccdd  = C6.ccdd  
          left join (select ccdd,  count(*) as t  from acu_seccion1 c inner join acu_seccion2 s on c.id1 = s.id2  where s2_24_11_7 = 9  group by nom_dd) as C7 on DEP.ccdd  = C7.ccdd  
          left join (select ccdd,  count(*) as t  from acu_seccion1 c inner join acu_seccion2 s on c.id1 = s.id2  where s2_24_11_8 = 9  group by nom_dd) as C8 on DEP.ccdd  = C8.ccdd  
          left join (select ccdd,  count(*) as t  from acu_seccion1 c inner join acu_seccion2 s on c.id1 = s.id2  where s2_24_11_9 = 9  group by nom_dd) as C9 on DEP.ccdd  = C9.ccdd  
          left join (select ccdd,  count(*) as t  from acu_seccion1 c inner join acu_seccion2 s on c.id1 = s.id2  where s2_24_11_10 = 9  group by nom_dd) as C10 on DEP.ccdd  = C10.ccdd  ) as table9 
          on table1.ccdd = table9.ccdd
          inner join 
          (select 
          DEP.CCDD, DEPARTAMENTO, ( COALESCE(C1.t,0) + COALESCE(C2.t,0) + COALESCE(C3.t,0) +  COALESCE(C4.t,0) +  COALESCE(C5.t,0) +  
          COALESCE(C6.t,0) + COALESCE(C7.t,0) + COALESCE(C8.t,0) +  COALESCE(C9.t,0)  + COALESCE(C10.t,0)  ) as NEP
          from (select  distinct(departamento), ccdd from departamentos_tab order by departamento) as DEP 
          left join (select ccdd,  count(*) as t  from acu_seccion1 c inner join acu_seccion2 s on c.id1 = s.id2  where s2_24_11_1 = 99  group by nom_dd) as C1 on DEP.ccdd  = C1.ccdd 
          left join (select ccdd,  count(*) as t  from acu_seccion1 c inner join acu_seccion2 s on c.id1 = s.id2  where s2_24_11_2 = 99  group by nom_dd) as C2 on DEP.ccdd  = C2.ccdd 
          left join (select ccdd,  count(*) as t  from acu_seccion1 c inner join acu_seccion2 s on c.id1 = s.id2  where s2_24_11_3 = 99  group by nom_dd) as C3 on DEP.ccdd  = C3.ccdd
          left join (select ccdd,  count(*) as t  from acu_seccion1 c inner join acu_seccion2 s on c.id1 = s.id2  where s2_24_11_4 = 99  group by nom_dd) as C4 on DEP.ccdd  = C4.ccdd  
          left join (select ccdd,  count(*) as t  from acu_seccion1 c inner join acu_seccion2 s on c.id1 = s.id2  where s2_24_11_5 = 99  group by nom_dd) as C5 on DEP.ccdd  = C5.ccdd  
          left join (select ccdd,  count(*) as t  from acu_seccion1 c inner join acu_seccion2 s on c.id1 = s.id2  where s2_24_11_6 = 99  group by nom_dd) as C6 on DEP.ccdd  = C6.ccdd  
          left join (select ccdd,  count(*) as t  from acu_seccion1 c inner join acu_seccion2 s on c.id1 = s.id2  where s2_24_11_7 = 99  group by nom_dd) as C7 on DEP.ccdd  = C7.ccdd  
          left join (select ccdd,  count(*) as t  from acu_seccion1 c inner join acu_seccion2 s on c.id1 = s.id2  where s2_24_11_8 = 99  group by nom_dd) as C8 on DEP.ccdd  = C8.ccdd  
          left join (select ccdd,  count(*) as t  from acu_seccion1 c inner join acu_seccion2 s on c.id1 = s.id2  where s2_24_11_9 = 99  group by nom_dd) as C9 on DEP.ccdd  = C9.ccdd  
          left join (select ccdd,  count(*) as t  from acu_seccion1 c inner join acu_seccion2 s on c.id1 = s.id2  where s2_24_11_10 = 99  group by nom_dd) as C10 on DEP.ccdd  = C10.ccdd  ) as table10 
          on table1.ccdd = table10.ccdd;
        ");
      return $q;
}

function get_tabulado_124()
{          /* TABULADO N° 124 ---------------- LA VIVIEDSA que ocupa------------------------*/
      $q = $this->db->query("
          select 
          DEP.CCDD, DEPARTAMENTO,  C0.t AS TOTAL,  
          COALESCE(C1.t,0) as ALQUILADA, COALESCE(C2.t,0) as PROPIA_INV, COALESCE(C3.t,0) as PROPIA_PAG, COALESCE(C4.t,0) as PROPIA_TOT, COALESCE(C5.t,0) as CEDIDA,
          COALESCE(C6.t,0) as OTRA, COALESCE(C7.t,0) as NEP
          from (select  distinct(departamento), ccdd from departamentos_tab order by departamento) as DEP 
          left join (select ccdd,  count(*) as t  from acu_seccion1 a inner join acu_seccion3 s on a.id1 = s.id3  where s3_100 is not null group by nom_dd ) as C0 on DEP.ccdd  = C0.ccdd 
          left join (select ccdd,  count(*) as t  from acu_seccion1 a inner join acu_seccion3 s on a.id1 = s.id3  where s3_100 = 1 group by nom_dd ) as C1 on DEP.ccdd  = C1.ccdd 
          left join (select ccdd,  count(*) as t  from acu_seccion1 a inner join acu_seccion3 s on a.id1 = s.id3  where s3_100 = 2 group by nom_dd ) as C2 on DEP.ccdd  = C2.ccdd 
          left join (select ccdd,  count(*) as t  from acu_seccion1 a inner join acu_seccion3 s on a.id1 = s.id3  where s3_100 = 3 group by nom_dd ) as C3 on DEP.ccdd  = C3.ccdd 
          left join (select ccdd,  count(*) as t  from acu_seccion1 a inner join acu_seccion3 s on a.id1 = s.id3  where s3_100 = 4 group by nom_dd ) as C4 on DEP.ccdd  = C4.ccdd 
          left join (select ccdd,  count(*) as t  from acu_seccion1 a inner join acu_seccion3 s on a.id1 = s.id3  where s3_100 = 5 group by nom_dd ) as C5 on DEP.ccdd  = C5.ccdd 
          left join (select ccdd,  count(*) as t  from acu_seccion1 a inner join acu_seccion3 s on a.id1 = s.id3  where s3_100 = 6 group by nom_dd ) as C6 on DEP.ccdd  = C6.ccdd 
          left join (select ccdd,  count(*) as t  from acu_seccion1 a inner join acu_seccion3 s on a.id1 = s.id3  where s3_100 = 9 group by nom_dd ) as C7 on DEP.ccdd  = C7.ccdd  ;
        ");
      return $q;
}

function get_tabulado_125()
{          
      $q = $this->db->query("
          /* TABULADO N° 125 ---------------- MATERIAL PAREDES------------------------*/
          select 
          DEP.CCDD, DEPARTAMENTO,  C0.t AS TOTAL,  
          COALESCE(C1.t,0) as LADRILLO, COALESCE(C2.t,0) as PIEDRA, COALESCE(C3.t,0) as ADOBE, COALESCE(C4.t,0) as CAÑA, COALESCE(C5.t,0) as PIEDRA_BARRO,
          COALESCE(C6.t,0) as MADERA, COALESCE(C7.t,0) as ESTERA, COALESCE(C8.t,0) as OTRA, COALESCE(C9.t,0) NEP
          from (select  distinct(departamento), ccdd from departamentos_tab order by departamento) as DEP 
          left join (select ccdd,  count(*) as t  from acu_seccion1 a inner join acu_seccion3 s on a.id1 = s.id3  where S3_200 is not null group by nom_dd ) as C0 on DEP.ccdd  = C0.ccdd 
          left join (select ccdd,  count(*) as t  from acu_seccion1 a inner join acu_seccion3 s on a.id1 = s.id3  where S3_200 = 1 group by nom_dd ) as C1 on DEP.ccdd  = C1.ccdd 
          left join (select ccdd,  count(*) as t  from acu_seccion1 a inner join acu_seccion3 s on a.id1 = s.id3  where S3_200 = 2 group by nom_dd ) as C2 on DEP.ccdd  = C2.ccdd 
          left join (select ccdd,  count(*) as t  from acu_seccion1 a inner join acu_seccion3 s on a.id1 = s.id3  where S3_200 = 3 group by nom_dd ) as C3 on DEP.ccdd  = C3.ccdd 
          left join (select ccdd,  count(*) as t  from acu_seccion1 a inner join acu_seccion3 s on a.id1 = s.id3  where S3_200 = 4 group by nom_dd ) as C4 on DEP.ccdd  = C4.ccdd 
          left join (select ccdd,  count(*) as t  from acu_seccion1 a inner join acu_seccion3 s on a.id1 = s.id3  where S3_200 = 5 group by nom_dd ) as C5 on DEP.ccdd  = C5.ccdd 
          left join (select ccdd,  count(*) as t  from acu_seccion1 a inner join acu_seccion3 s on a.id1 = s.id3  where S3_200 = 6 group by nom_dd ) as C6 on DEP.ccdd  = C6.ccdd 
          left join (select ccdd,  count(*) as t  from acu_seccion1 a inner join acu_seccion3 s on a.id1 = s.id3  where S3_200 = 7 group by nom_dd ) as C7 on DEP.ccdd  = C7.ccdd 
          left join (select ccdd,  count(*) as t  from acu_seccion1 a inner join acu_seccion3 s on a.id1 = s.id3  where S3_200 = 8 group by nom_dd ) as C8 on DEP.ccdd  = C8.ccdd 
          left join (select ccdd,  count(*) as t  from acu_seccion1 a inner join acu_seccion3 s on a.id1 = s.id3  where S3_200 = 9 group by nom_dd ) as C9 on DEP.ccdd  = C9.ccdd ;
        ");
      return $q;
}

function get_tabulado_126()
{            
      $q = $this->db->query("
          /* TABULADO N° 126 ---------------- MATERIAL PISOS------------------------*/
          select 
          DEP.CCDD, DEPARTAMENTO,  C0.t AS TOTAL,  
          COALESCE(C1.t,0) as PARQUET, COALESCE(C2.t,0) as LAMINAS, COALESCE(C3.t,0) as LOSETAS, COALESCE(C4.t,0) as MADERA, COALESCE(C5.t,0) as CEMENTO,
          COALESCE(C6.t,0) as TIERRA, COALESCE(C7.t,0) as OTRA, COALESCE(C8.t,0) as  NEP
          from (select  distinct(departamento), ccdd from departamentos_tab order by departamento) as DEP 
          left join (select ccdd,  count(*) as t  from acu_seccion1 a inner join acu_seccion3 s on a.id1 = s.id3  where S3_300 is not null group by nom_dd ) as C0 on DEP.ccdd  = C0.ccdd 
          left join (select ccdd,  count(*) as t  from acu_seccion1 a inner join acu_seccion3 s on a.id1 = s.id3  where S3_300 = 1 group by nom_dd ) as C1 on DEP.ccdd  = C1.ccdd 
          left join (select ccdd,  count(*) as t  from acu_seccion1 a inner join acu_seccion3 s on a.id1 = s.id3  where S3_300 = 2 group by nom_dd ) as C2 on DEP.ccdd  = C2.ccdd 
          left join (select ccdd,  count(*) as t  from acu_seccion1 a inner join acu_seccion3 s on a.id1 = s.id3  where S3_300 = 3 group by nom_dd ) as C3 on DEP.ccdd  = C3.ccdd 
          left join (select ccdd,  count(*) as t  from acu_seccion1 a inner join acu_seccion3 s on a.id1 = s.id3  where S3_300 = 4 group by nom_dd ) as C4 on DEP.ccdd  = C4.ccdd 
          left join (select ccdd,  count(*) as t  from acu_seccion1 a inner join acu_seccion3 s on a.id1 = s.id3  where S3_300 = 5 group by nom_dd ) as C5 on DEP.ccdd  = C5.ccdd 
          left join (select ccdd,  count(*) as t  from acu_seccion1 a inner join acu_seccion3 s on a.id1 = s.id3  where S3_300 = 6 group by nom_dd ) as C6 on DEP.ccdd  = C6.ccdd 
          left join (select ccdd,  count(*) as t  from acu_seccion1 a inner join acu_seccion3 s on a.id1 = s.id3  where S3_300 = 7 group by nom_dd ) as C7 on DEP.ccdd  = C7.ccdd 
          left join (select ccdd,  count(*) as t  from acu_seccion1 a inner join acu_seccion3 s on a.id1 = s.id3  where S3_300 = 9 group by nom_dd ) as C8 on DEP.ccdd  = C8.ccdd;
        ");
      return $q;
}

function get_tabulado_127()
{   
      $q = $this->db->query("
          /* TABULADO N° 127 ---------------- MATERIAL TECHOS------------------------*/
          select 
          DEP.CCDD, DEPARTAMENTO,  C0.t AS TOTAL,  
          COALESCE(C1.t,0) as CONCRETO, COALESCE(C2.t,0) as MADERA, COALESCE(C3.t,0) as TEJAS, COALESCE(C4.t,0) as PLANCHAS, COALESCE(C5.t,0) as CAÑA,
          COALESCE(C6.t,0) as ESTERA, COALESCE(C7.t,0) as PAJA, COALESCE(C8.t,0) as OTRA, COALESCE(C9.t,0) NEP
          from (select  distinct(departamento), ccdd from departamentos_tab order by departamento) as DEP 
          left join (select ccdd,  count(*) as t  from acu_seccion1 a inner join acu_seccion3 s on a.id1 = s.id3  where S3_400 is not null group by nom_dd ) as C0 on DEP.ccdd  = C0.ccdd 
          left join (select ccdd,  count(*) as t  from acu_seccion1 a inner join acu_seccion3 s on a.id1 = s.id3  where S3_400 = 1 group by nom_dd ) as C1 on DEP.ccdd  = C1.ccdd 
          left join (select ccdd,  count(*) as t  from acu_seccion1 a inner join acu_seccion3 s on a.id1 = s.id3  where S3_400 = 2 group by nom_dd ) as C2 on DEP.ccdd  = C2.ccdd 
          left join (select ccdd,  count(*) as t  from acu_seccion1 a inner join acu_seccion3 s on a.id1 = s.id3  where S3_400 = 3 group by nom_dd ) as C3 on DEP.ccdd  = C3.ccdd 
          left join (select ccdd,  count(*) as t  from acu_seccion1 a inner join acu_seccion3 s on a.id1 = s.id3  where S3_400 = 4 group by nom_dd ) as C4 on DEP.ccdd  = C4.ccdd 
          left join (select ccdd,  count(*) as t  from acu_seccion1 a inner join acu_seccion3 s on a.id1 = s.id3  where S3_400 = 5 group by nom_dd ) as C5 on DEP.ccdd  = C5.ccdd 
          left join (select ccdd,  count(*) as t  from acu_seccion1 a inner join acu_seccion3 s on a.id1 = s.id3  where S3_400 = 6 group by nom_dd ) as C6 on DEP.ccdd  = C6.ccdd 
          left join (select ccdd,  count(*) as t  from acu_seccion1 a inner join acu_seccion3 s on a.id1 = s.id3  where S3_400 = 7 group by nom_dd ) as C7 on DEP.ccdd  = C7.ccdd 
          left join (select ccdd,  count(*) as t  from acu_seccion1 a inner join acu_seccion3 s on a.id1 = s.id3  where S3_400 = 8 group by nom_dd ) as C8 on DEP.ccdd  = C8.ccdd 
          left join (select ccdd,  count(*) as t  from acu_seccion1 a inner join acu_seccion3 s on a.id1 = s.id3  where S3_400 = 9 group by nom_dd ) as C9 on DEP.ccdd  = C9.ccdd ;
        ");
      return $q;
}

function get_tabulado_128()
{               
      $q = $this->db->query("
          /* TABULADO N° 128 ---------------- ABASTECIMIENTO AGUA VIVIENDA------------------------*/
          select 
          DEP.CCDD, DEPARTAMENTO,  C0.t AS TOTAL,  
          COALESCE(C1.t,0) as AGUA_POTABLE, COALESCE(C2.t,0) as MADERA, COALESCE(C3.t,0) as TEJAS, COALESCE(C4.t,0) as PLANCHAS, COALESCE(C5.t,0) as CAÑA,
          COALESCE(C6.t,0) as ESTERA, COALESCE(C7.t,0) as PAJA, COALESCE(C8.t,0) as OTRA, COALESCE(C9.t,0) NEP
          from (select  distinct(departamento), ccdd from departamentos_tab order by departamento) as DEP 
          left join (select ccdd,  count(*) as t  from acu_seccion1 a inner join acu_seccion3 s on a.id1 = s.id3  where S3_500 is not null group by nom_dd ) as C0 on DEP.ccdd  = C0.ccdd 
          left join (select ccdd,  count(*) as t  from acu_seccion1 a inner join acu_seccion3 s on a.id1 = s.id3  where S3_500 = 1 group by nom_dd ) as C1 on DEP.ccdd  = C1.ccdd 
          left join (select ccdd,  count(*) as t  from acu_seccion1 a inner join acu_seccion3 s on a.id1 = s.id3  where S3_500 = 2 group by nom_dd ) as C2 on DEP.ccdd  = C2.ccdd 
          left join (select ccdd,  count(*) as t  from acu_seccion1 a inner join acu_seccion3 s on a.id1 = s.id3  where S3_500 = 3 group by nom_dd ) as C3 on DEP.ccdd  = C3.ccdd 
          left join (select ccdd,  count(*) as t  from acu_seccion1 a inner join acu_seccion3 s on a.id1 = s.id3  where S3_500 = 4 group by nom_dd ) as C4 on DEP.ccdd  = C4.ccdd 
          left join (select ccdd,  count(*) as t  from acu_seccion1 a inner join acu_seccion3 s on a.id1 = s.id3  where S3_500 = 5 group by nom_dd ) as C5 on DEP.ccdd  = C5.ccdd 
          left join (select ccdd,  count(*) as t  from acu_seccion1 a inner join acu_seccion3 s on a.id1 = s.id3  where S3_500 = 6 group by nom_dd ) as C6 on DEP.ccdd  = C6.ccdd 
          left join (select ccdd,  count(*) as t  from acu_seccion1 a inner join acu_seccion3 s on a.id1 = s.id3  where S3_500 = 7 group by nom_dd ) as C7 on DEP.ccdd  = C7.ccdd 
          left join (select ccdd,  count(*) as t  from acu_seccion1 a inner join acu_seccion3 s on a.id1 = s.id3  where S3_500 = 8 group by nom_dd ) as C8 on DEP.ccdd  = C8.ccdd 
          left join (select ccdd,  count(*) as t  from acu_seccion1 a inner join acu_seccion3 s on a.id1 = s.id3  where S3_500 = 9 group by nom_dd ) as C9 on DEP.ccdd  = C9.ccdd ;
        ");
      return $q;
}

function get_tabulado_129()
{       
      $q = $this->db->query("
          /* TABULADO N° 129 -AGUA TODOS LOS DIAS*/
          select 
          DEP.CCDD, DEPARTAMENTO,  C0.t AS TOTAL,  
          COALESCE(C1.t,0) as SI, COALESCE(C2.t,0) as 'NO',  COALESCE(C3.t,0) NEP
          from (select  distinct(departamento), ccdd from departamentos_tab order by departamento) as DEP 
          left join (select ccdd,  count(*) as t  from acu_seccion1 a inner join acu_seccion3 s on a.id1 = s.id3  where S3_600 is not null group by nom_dd ) as C0 on DEP.ccdd  = C0.ccdd 
          left join (select ccdd,  count(*) as t  from acu_seccion1 a inner join acu_seccion3 s on a.id1 = s.id3  where S3_600 = 1 group by nom_dd ) as C1 on DEP.ccdd  = C1.ccdd 
          left join (select ccdd,  count(*) as t  from acu_seccion1 a inner join acu_seccion3 s on a.id1 = s.id3  where S3_600 = 2 group by nom_dd ) as C2 on DEP.ccdd  = C2.ccdd 
          left join (select ccdd,  count(*) as t  from acu_seccion1 a inner join acu_seccion3 s on a.id1 = s.id3  where S3_600 = 9 group by nom_dd ) as C3 on DEP.ccdd  = C3.ccdd ;
        ");
      return $q;
}

function get_tabulado_130()
{    
      $q = $this->db->query("
          /* TABULADO N° 130 ----------------TIPO DE SERVICIO DE LA VIVIEDA------------------------*/
          select 
          DEP.CCDD, DEPARTAMENTO,  C0.t AS TOTAL,  
          COALESCE(C1.t,0) as DESAGUE_EN_VIVIENDA, COALESCE(C2.t,0) as DESAGUE_NO_VIVIENDA, COALESCE(C3.t,0) as LETRINA, COALESCE(C4.t,0) as POZO_SEPTICO, COALESCE(C5.t,0) as POZO_CIEGO,
          COALESCE(C6.t,0) as RIO, COALESCE(C7.t,0) as NO_TIENE, COALESCE(C8.t,0) as  NEP
          from (select  distinct(departamento), ccdd from departamentos_tab order by departamento) as DEP 
          left join (select ccdd,  count(*) as t  from acu_seccion1 a inner join acu_seccion3 s on a.id1 = s.id3  where S3_700 is not null group by nom_dd ) as C0 on DEP.ccdd  = C0.ccdd 
          left join (select ccdd,  count(*) as t  from acu_seccion1 a inner join acu_seccion3 s on a.id1 = s.id3  where S3_700 = 1 group by nom_dd ) as C1 on DEP.ccdd  = C1.ccdd 
          left join (select ccdd,  count(*) as t  from acu_seccion1 a inner join acu_seccion3 s on a.id1 = s.id3  where S3_700 = 2 group by nom_dd ) as C2 on DEP.ccdd  = C2.ccdd 
          left join (select ccdd,  count(*) as t  from acu_seccion1 a inner join acu_seccion3 s on a.id1 = s.id3  where S3_700 = 3 group by nom_dd ) as C3 on DEP.ccdd  = C3.ccdd 
          left join (select ccdd,  count(*) as t  from acu_seccion1 a inner join acu_seccion3 s on a.id1 = s.id3  where S3_700 = 4 group by nom_dd ) as C4 on DEP.ccdd  = C4.ccdd 
          left join (select ccdd,  count(*) as t  from acu_seccion1 a inner join acu_seccion3 s on a.id1 = s.id3  where S3_700 = 5 group by nom_dd ) as C5 on DEP.ccdd  = C5.ccdd 
          left join (select ccdd,  count(*) as t  from acu_seccion1 a inner join acu_seccion3 s on a.id1 = s.id3  where S3_700 = 6 group by nom_dd ) as C6 on DEP.ccdd  = C6.ccdd 
          left join (select ccdd,  count(*) as t  from acu_seccion1 a inner join acu_seccion3 s on a.id1 = s.id3  where S3_700 = 7 group by nom_dd ) as C7 on DEP.ccdd  = C7.ccdd 
          left join (select ccdd,  count(*) as t  from acu_seccion1 a inner join acu_seccion3 s on a.id1 = s.id3  where S3_700 = 9 group by nom_dd ) as C8 on DEP.ccdd  = C8.ccdd;
        ");
      return $q;
}

function get_tabulado_131()
{              
      $q = $this->db->query("
          /* TABULADO N° 131 --------- ALUMBRADO TODOS LOS DIAS -----------------*/
          select 
          DEP.CCDD, DEPARTAMENTO,  C0.t AS TOTAL,  
          COALESCE(C1.t,0) as SI, COALESCE(C2.t,0) as 'NO',  COALESCE(C3.t,0) NEP
          from (select  distinct(departamento), ccdd from departamentos_tab order by departamento) as DEP 
          left join (select ccdd,  count(*) as t  from acu_seccion1 a inner join acu_seccion3 s on a.id1 = s.id3  where S3_800 is not null group by nom_dd ) as C0 on DEP.ccdd  = C0.ccdd 
          left join (select ccdd,  count(*) as t  from acu_seccion1 a inner join acu_seccion3 s on a.id1 = s.id3  where S3_800 = 1 group by nom_dd ) as C1 on DEP.ccdd  = C1.ccdd 
          left join (select ccdd,  count(*) as t  from acu_seccion1 a inner join acu_seccion3 s on a.id1 = s.id3  where S3_800 = 2 group by nom_dd ) as C2 on DEP.ccdd  = C2.ccdd 
          left join (select ccdd,  count(*) as t  from acu_seccion1 a inner join acu_seccion3 s on a.id1 = s.id3  where S3_800 = 9 group by nom_dd ) as C3 on DEP.ccdd  = C3.ccdd ;

        ");
      return $q;
}

function get_tabulado_132()
{             
      $q = $this->db->query("
          /* TABULADO N° 132 -------------------------- ELECTRODOMESTICOS-------------------------*/
          select 
          DEP.CCDD, DEPARTAMENTO,  C0.t AS TOTAL,  
          COALESCE(C1.t,0) as EQUIPO, COALESCE(C2.t,0) as TELEVISOR, COALESCE(C3.t,0) as DVD, COALESCE(C4.t,0) as LICUADORA, COALESCE(C5.t,0) as REFRIGERADORA,
          COALESCE(C6.t,0) as PLANCHA, COALESCE(C7.t,0) as COCINA, COALESCE(C8.t,0) as COMPUTADORA, COALESCE(C9.t,0) LAVADORA, COALESCE(C10.t,0) MICROHONDAS, COALESCE(C11.t,0) NINGUNO, COALESCE(C12.t,0) NEP
          from (select  distinct(departamento), ccdd from departamentos_tab order by departamento) as DEP 
          left join (select ccdd,  count(*) as t  from acu_seccion1 a inner join acu_seccion3 s on a.id1 = s.id3  where S3_901 is not null group by nom_dd ) as C0 on DEP.ccdd  = C0.ccdd 
          left join (select ccdd,  count(*) as t  from acu_seccion1 a inner join acu_seccion3 s on a.id1 = s.id3  where S3_901 = 1 group by nom_dd ) as C1 on DEP.ccdd  = C1.ccdd 
          left join (select ccdd,  count(*) as t  from acu_seccion1 a inner join acu_seccion3 s on a.id1 = s.id3  where S3_902 = 1 group by nom_dd ) as C2 on DEP.ccdd  = C2.ccdd 
          left join (select ccdd,  count(*) as t  from acu_seccion1 a inner join acu_seccion3 s on a.id1 = s.id3  where S3_903 = 1 group by nom_dd ) as C3 on DEP.ccdd  = C3.ccdd 
          left join (select ccdd,  count(*) as t  from acu_seccion1 a inner join acu_seccion3 s on a.id1 = s.id3  where S3_904 = 1 group by nom_dd ) as C4 on DEP.ccdd  = C4.ccdd 
          left join (select ccdd,  count(*) as t  from acu_seccion1 a inner join acu_seccion3 s on a.id1 = s.id3  where S3_905 = 1 group by nom_dd ) as C5 on DEP.ccdd  = C5.ccdd 
          left join (select ccdd,  count(*) as t  from acu_seccion1 a inner join acu_seccion3 s on a.id1 = s.id3  where S3_906 = 1 group by nom_dd ) as C6 on DEP.ccdd  = C6.ccdd 
          left join (select ccdd,  count(*) as t  from acu_seccion1 a inner join acu_seccion3 s on a.id1 = s.id3  where S3_907 = 1 group by nom_dd ) as C7 on DEP.ccdd  = C7.ccdd 
          left join (select ccdd,  count(*) as t  from acu_seccion1 a inner join acu_seccion3 s on a.id1 = s.id3  where S3_908 = 1 group by nom_dd ) as C8 on DEP.ccdd  = C8.ccdd 
          left join (select ccdd,  count(*) as t  from acu_seccion1 a inner join acu_seccion3 s on a.id1 = s.id3  where S3_909 = 1 group by nom_dd ) as C9 on DEP.ccdd  = C9.ccdd 
          left join (select ccdd,  count(*) as t  from acu_seccion1 a inner join acu_seccion3 s on a.id1 = s.id3  where S3_910 = 1 group by nom_dd ) as C10 on DEP.ccdd  = C10.ccdd 
          left join (select ccdd,  count(*) as t  from acu_seccion1 a inner join acu_seccion3 s on a.id1 = s.id3  where S3_911 = 1 group by nom_dd ) as C11 on DEP.ccdd  = C11.ccdd 
          left join (select ccdd,  count(*) as t  from acu_seccion1 a inner join acu_seccion3 s on a.id1 = s.id3  where S3_911 = 9 group by nom_dd ) as C12 on DEP.ccdd  = C12.ccdd ;
        ");
      return $q;
}

function get_tabulado_133()
{   
      $q = $this->db->query("
          /* TABULADO N° 133 -------------------------- SERVICIOS DE COMUNICACION-------------------------*/
          select 
          DEP.CCDD, DEPARTAMENTO, COALESCE(C0.t ,0) AS TOTAL,
          COALESCE(C1.t,0) as FIJA, COALESCE(C2.t,0) as CELULAR, COALESCE(C3.t,0) as INTERNET, COALESCE(C4.t,0) as CABLE, COALESCE(C5.t,0) as NINGUNO,
          COALESCE(C6.t,0) as NEP
          from (select  distinct(departamento), ccdd from departamentos_tab order by departamento) as DEP 
          left join (select ccdd,  count(*) as t  from acu_seccion1 a inner join acu_seccion3 s on a.id1 = s.id3  where S3_1001 is not null group by nom_dd ) as C0 on DEP.ccdd  = C0.ccdd 
          left join (select ccdd,  count(*) as t  from acu_seccion1 a inner join acu_seccion3 s on a.id1 = s.id3  where S3_1001 = 1 group by nom_dd ) as C1 on DEP.ccdd  = C1.ccdd 
          left join (select ccdd,  count(*) as t  from acu_seccion1 a inner join acu_seccion3 s on a.id1 = s.id3  where S3_1002 = 1 group by nom_dd ) as C2 on DEP.ccdd  = C2.ccdd 
          left join (select ccdd,  count(*) as t  from acu_seccion1 a inner join acu_seccion3 s on a.id1 = s.id3  where S3_1003 = 1 group by nom_dd ) as C3 on DEP.ccdd  = C3.ccdd 
          left join (select ccdd,  count(*) as t  from acu_seccion1 a inner join acu_seccion3 s on a.id1 = s.id3  where S3_1004 = 1 group by nom_dd ) as C4 on DEP.ccdd  = C4.ccdd 
          left join (select ccdd,  count(*) as t  from acu_seccion1 a inner join acu_seccion3 s on a.id1 = s.id3  where S3_1005 = 1 group by nom_dd ) as C5 on DEP.ccdd  = C5.ccdd 
          left join (select ccdd,  count(*) as t  from acu_seccion1 a inner join acu_seccion3 s on a.id1 = s.id3  where S3_1005 = 9 group by nom_dd ) as C6 on DEP.ccdd  = C6.ccdd ;
        ");
      return $q;
}

function get_tabulado_134()
{   
      $q = $this->db->query("
          /* TABULADO N° 134 --------- ESPACIO0 PARA OTROS INGRESOS -----------------*/
          select 
          DEP.CCDD, DEPARTAMENTO,  COALESCE(C0.t ,0) AS TOTAL,
          COALESCE(C1.t,0) as SI, COALESCE(C2.t,0) as 'NO',  COALESCE(C3.t,0) NEP
          from (select  distinct(departamento), ccdd from departamentos_tab order by departamento) as DEP 
          left join (select ccdd,  count(*) as t  from acu_seccion1 a inner join acu_seccion3 s on a.id1 = s.id3  where S3_1100 is not null group by nom_dd ) as C0 on DEP.ccdd  = C0.ccdd 
          left join (select ccdd,  count(*) as t  from acu_seccion1 a inner join acu_seccion3 s on a.id1 = s.id3  where S3_1100 = 1 group by nom_dd ) as C1 on DEP.ccdd  = C1.ccdd 
          left join (select ccdd,  count(*) as t  from acu_seccion1 a inner join acu_seccion3 s on a.id1 = s.id3  where S3_1100 = 2 group by nom_dd ) as C2 on DEP.ccdd  = C2.ccdd 
          left join (select ccdd,  count(*) as t  from acu_seccion1 a inner join acu_seccion3 s on a.id1 = s.id3  where S3_1100 = 9 group by nom_dd ) as C3 on DEP.ccdd  = C3.ccdd ;
        ");
      return $q;
}

function get_tabulado_135()
{ 
      $q = $this->db->query("
          /* TABULADO N° 135 ---------------- MEDIO DE TRANSPORTE------------------------*/
          select 
          DEP.CCDD, DEPARTAMENTO,  COALESCE(C0.t ,0) AS TOTAL,  
          COALESCE(C1.t,0) as PIE, COALESCE(C2.t,0) as ACEMILA, COALESCE(C3.t,0) as MOTO, COALESCE(C4.t,0) as AUTO, COALESCE(C5.t,0) as OMNIBUS,
          COALESCE(C6.t,0) as BOTE, COALESCE(C7.t,0) as CANOA, COALESCE(C8.t,0) as NINGUNO, COALESCE(C9.t,0) NEP
          from (select  distinct(departamento), ccdd from departamentos_tab order by departamento) as DEP 
          left join (select ccdd,  count(*) as t  from acu_seccion1 a inner join acu_seccion4 s on a.id1 = s.id4  where S4_2 is not null group by nom_dd ) as C0 on DEP.ccdd  = C0.ccdd 
          left join (select ccdd,  count(*) as t  from acu_seccion1 a inner join acu_seccion4 s on a.id1 = s.id4  where S4_2 = 1 group by nom_dd ) as C1 on DEP.ccdd  = C1.ccdd 
          left join (select ccdd,  count(*) as t  from acu_seccion1 a inner join acu_seccion4 s on a.id1 = s.id4  where S4_2 = 2 group by nom_dd ) as C2 on DEP.ccdd  = C2.ccdd 
          left join (select ccdd,  count(*) as t  from acu_seccion1 a inner join acu_seccion4 s on a.id1 = s.id4  where S4_2 = 3 group by nom_dd ) as C3 on DEP.ccdd  = C3.ccdd 
          left join (select ccdd,  count(*) as t  from acu_seccion1 a inner join acu_seccion4 s on a.id1 = s.id4  where S4_2 = 4 group by nom_dd ) as C4 on DEP.ccdd  = C4.ccdd 
          left join (select ccdd,  count(*) as t  from acu_seccion1 a inner join acu_seccion4 s on a.id1 = s.id4  where S4_2 = 5 group by nom_dd ) as C5 on DEP.ccdd  = C5.ccdd 
          left join (select ccdd,  count(*) as t  from acu_seccion1 a inner join acu_seccion4 s on a.id1 = s.id4  where S4_2 = 6 group by nom_dd ) as C6 on DEP.ccdd  = C6.ccdd 
          left join (select ccdd,  count(*) as t  from acu_seccion1 a inner join acu_seccion4 s on a.id1 = s.id4  where S4_2 = 7 group by nom_dd ) as C7 on DEP.ccdd  = C7.ccdd 
          left join (select ccdd,  count(*) as t  from acu_seccion1 a inner join acu_seccion4 s on a.id1 = s.id4  where S4_2 = 8 group by nom_dd ) as C8 on DEP.ccdd  = C8.ccdd 
          left join (select ccdd,  count(*) as t  from acu_seccion1 a inner join acu_seccion4 s on a.id1 = s.id4  where S4_2 = 9 group by nom_dd ) as C9 on DEP.ccdd  = C9.ccdd ;
        ");
      return $q;
}

function get_tabulado_136()
{ 
      $q = $this->db->query("
          /* TABULADO N° 136 -------------------------- ORIGEN DEL AGUA-------------------------*/
          select 
          DEP.CCDD, DEPARTAMENTO,  COALESCE(C0.t ,0) AS TOTAL, 
          COALESCE(C1.t,0) as LAGO, COALESCE(C2.t,0) as RIO, COALESCE(C3.t,0) as MANANTIAL, COALESCE(C4.t,0) as ESTERO, COALESCE(C5.t,0) as OTRO,
          COALESCE(C6.t,0) as NEP
          from (select  distinct(departamento), ccdd from departamentos_tab order by departamento) as DEP 
          left join (select ccdd,  count(*) as t  from acu_seccion1 a inner join acu_seccion5 s on a.id1 = s.id5  where S5_1_1 is not null group by nom_dd ) as C0 on DEP.ccdd  = C0.ccdd 
          left join (select ccdd,  count(*) as t  from acu_seccion1 a inner join acu_seccion5 s on a.id1 = s.id5  where S5_1_1 = 1 group by nom_dd ) as C1 on DEP.ccdd  = C1.ccdd 
          left join (select ccdd,  count(*) as t  from acu_seccion1 a inner join acu_seccion5 s on a.id1 = s.id5  where S5_1_2 = 1 group by nom_dd ) as C2 on DEP.ccdd  = C2.ccdd 
          left join (select ccdd,  count(*) as t  from acu_seccion1 a inner join acu_seccion5 s on a.id1 = s.id5  where S5_1_3 = 1 group by nom_dd ) as C3 on DEP.ccdd  = C3.ccdd 
          left join (select ccdd,  count(*) as t  from acu_seccion1 a inner join acu_seccion5 s on a.id1 = s.id5  where S5_1_4 = 1 group by nom_dd ) as C4 on DEP.ccdd  = C4.ccdd 
          left join (select ccdd,  count(*) as t  from acu_seccion1 a inner join acu_seccion5 s on a.id1 = s.id5  where S5_1_5 = 1 group by nom_dd ) as C5 on DEP.ccdd  = C5.ccdd 
          left join (select ccdd,  count(*) as t  from acu_seccion1 a inner join acu_seccion5 s on a.id1 = s.id5  where S5_1_5 = 9 group by nom_dd ) as C6 on DEP.ccdd  = C6.ccdd ;
        ");
      return $q;
}

function get_tabulado_137()
{  
      $q = $this->db->query("
          /* TABULADO N° 137 -------------------------- REGIMEN TENENCIA-------------------------*/
          select 
          DEP.CCDD, DEPARTAMENTO,  COALESCE(C0.t ,0) AS TOTAL,
          COALESCE(C1.t,0) as CONCESION, COALESCE(C2.t,0) as ARRENDAMIENTO, COALESCE(C3.t,0) as PROPIO, COALESCE(C4.t,0) as OTRO, COALESCE(C5.t,0) as  NEP
          from (select  distinct(departamento), ccdd from departamentos_tab order by departamento) as DEP 
          left join (select ccdd,  count(*) as t  from acu_seccion1 a inner join acu_seccion5 s on a.id1 = s.id5  where S5_2_1 is not null group by nom_dd ) as C0 on DEP.ccdd  = C0.ccdd 
          left join (select ccdd,  count(*) as t  from acu_seccion1 a inner join acu_seccion5 s on a.id1 = s.id5  where S5_2_1 = 1 group by nom_dd ) as C1 on DEP.ccdd  = C1.ccdd 
          left join (select ccdd,  count(*) as t  from acu_seccion1 a inner join acu_seccion5 s on a.id1 = s.id5  where S5_2_2 = 1 group by nom_dd ) as C2 on DEP.ccdd  = C2.ccdd 
          left join (select ccdd,  count(*) as t  from acu_seccion1 a inner join acu_seccion5 s on a.id1 = s.id5  where S5_2_3 = 1 group by nom_dd ) as C3 on DEP.ccdd  = C3.ccdd 
          left join (select ccdd,  count(*) as t  from acu_seccion1 a inner join acu_seccion5 s on a.id1 = s.id5  where S5_2_4 = 1 group by nom_dd ) as C4 on DEP.ccdd  = C4.ccdd 
          left join (select ccdd,  count(*) as t  from acu_seccion1 a inner join acu_seccion5 s on a.id1 = s.id5  where S5_2_4 = 9 group by nom_dd ) as C5 on DEP.ccdd  = C5.ccdd ;
        ");
      return $q;
}

function get_tabulado_138()
{   
      $q = $this->db->query("
          /* TABULADO N° 138 --------- CUENTA CON PERMISO-----------------*/
          select 
          DEP.CCDD, DEPARTAMENTO,  COALESCE(C0.t ,0) AS TOTAL,  
          COALESCE(C1.t,0) as SI, COALESCE(C2.t,0) as 'NO',  COALESCE(C3.t,0) NEP
          from (select  distinct(departamento), ccdd from departamentos_tab order by departamento) as DEP 
          left join (select ccdd,  count(*) as t  from acu_seccion1 a inner join acu_seccion5 s on a.id1 = s.id5  where s5_3 is not null group by nom_dd ) as C0 on DEP.ccdd  = C0.ccdd 
          left join (select ccdd,  count(*) as t  from acu_seccion1 a inner join acu_seccion5 s on a.id1 = s.id5  where s5_3 = 1 group by nom_dd ) as C1 on DEP.ccdd  = C1.ccdd 
          left join (select ccdd,  count(*) as t  from acu_seccion1 a inner join acu_seccion5 s on a.id1 = s.id5  where s5_3 = 2 group by nom_dd ) as C2 on DEP.ccdd  = C2.ccdd 
          left join (select ccdd,  count(*) as t  from acu_seccion1 a inner join acu_seccion5 s on a.id1 = s.id5  where s5_3 = 9 group by nom_dd ) as C3 on DEP.ccdd  = C3.ccdd ;
        ");
      return $q;
}

function get_tabulado_139()
{    
      $q = $this->db->query("
          /* TABULADO N° 139 -------------------------- TIEMPO EN TRAMITE -------------------------*/
          select 
          DEP.CCDD, DEPARTAMENTO,  COALESCE(C0.t ,0) AS TOTAL,  
          COALESCE(C1.t,0) as 2_MESES, COALESCE(C2.t,0) as 3_5_MESES, COALESCE(C3.t,0) as 6_12_MESES, COALESCE(C4.t,0) as MAS_12_MESES, COALESCE(C5.t,0) as  NEP
          from (select  distinct(departamento), ccdd from departamentos_tab order by departamento) as DEP 
          left join (select ccdd,  count(*) as t  from acu_seccion1 a inner join acu_seccion5 s on a.id1 = s.id5  where S5_4 = 1 is not null group by nom_dd ) as C0 on DEP.ccdd  = C0.ccdd 
          left join (select ccdd,  count(*) as t  from acu_seccion1 a inner join acu_seccion5 s on a.id1 = s.id5  where S5_4 = 1  group by nom_dd ) as C1 on DEP.ccdd  = C1.ccdd 
          left join (select ccdd,  count(*) as t  from acu_seccion1 a inner join acu_seccion5 s on a.id1 = s.id5  where S5_4 = 2  group by nom_dd ) as C2 on DEP.ccdd  = C2.ccdd 
          left join (select ccdd,  count(*) as t  from acu_seccion1 a inner join acu_seccion5 s on a.id1 = s.id5  where S5_4 = 3  group by nom_dd ) as C3 on DEP.ccdd  = C3.ccdd 
          left join (select ccdd,  count(*) as t  from acu_seccion1 a inner join acu_seccion5 s on a.id1 = s.id5  where S5_4 = 4  group by nom_dd ) as C4 on DEP.ccdd  = C4.ccdd 
          left join (select ccdd,  count(*) as t  from acu_seccion1 a inner join acu_seccion5 s on a.id1 = s.id5  where S5_4 = 9  group by nom_dd ) as C5 on DEP.ccdd  = C5.ccdd ;
        ");
      return $q;
}

function get_tabulado_140()
{   
      $q = $this->db->query("
          /* TABULADO N° 140 -------------------------- POR QUE NO CUENTA -------------------------*/
          select 
          DEP.CCDD, DEPARTAMENTO,  COALESCE(C0.t ,0) AS TOTAL,    
          COALESCE(C1.t,0) as NO_INTERES, COALESCE(C2.t,0) as RAZONES_E, COALESCE(C3.t,0) as TRAMITES_E, COALESCE(C4.t,0) as NO_CONOCE, COALESCE(C5.t,0) as OTRO,
          COALESCE(C6.t,0) as NEP
          from (select  distinct(departamento), ccdd from departamentos_tab order by departamento) as DEP 
          left join (select ccdd,  count(*) as t  from acu_seccion1 a inner join acu_seccion5 s on a.id1 = s.id5  where S5_5_1 is not null group by nom_dd ) as C0 on DEP.ccdd  = C0.ccdd 
          left join (select ccdd,  count(*) as t  from acu_seccion1 a inner join acu_seccion5 s on a.id1 = s.id5  where S5_5_1 = 1 group by nom_dd ) as C1 on DEP.ccdd  = C1.ccdd 
          left join (select ccdd,  count(*) as t  from acu_seccion1 a inner join acu_seccion5 s on a.id1 = s.id5  where S5_5_2 = 1 group by nom_dd ) as C2 on DEP.ccdd  = C2.ccdd 
          left join (select ccdd,  count(*) as t  from acu_seccion1 a inner join acu_seccion5 s on a.id1 = s.id5  where S5_5_3 = 1 group by nom_dd ) as C3 on DEP.ccdd  = C3.ccdd 
          left join (select ccdd,  count(*) as t  from acu_seccion1 a inner join acu_seccion5 s on a.id1 = s.id5  where S5_5_4 = 1 group by nom_dd ) as C4 on DEP.ccdd  = C4.ccdd 
          left join (select ccdd,  count(*) as t  from acu_seccion1 a inner join acu_seccion5 s on a.id1 = s.id5  where S5_5_5 = 1 group by nom_dd ) as C5 on DEP.ccdd  = C5.ccdd 
          left join (select ccdd,  count(*) as t  from acu_seccion1 a inner join acu_seccion5 s on a.id1 = s.id5  where S5_5_5 = 9 group by nom_dd ) as C6 on DEP.ccdd  = C6.ccdd ;        
                  ");
      return $q;
}

function get_tabulado_141()
{
      $q = $this->db->query("
          /* TABULADO N° 141 --------- CUENTA CON AUTORIZACION -----------------*/
          select 
          DEP.CCDD, DEPARTAMENTO,  COALESCE(C0.t ,0) AS TOTAL,  
          COALESCE(C1.t,0) as SI, COALESCE(C2.t,0) as 'NO',  COALESCE(C3.t,0) NEP
          from (select  distinct(departamento), ccdd from departamentos_tab order by departamento) as DEP 
          left join (select ccdd,  count(*) as t  from acu_seccion1 a inner join acu_seccion5 s on a.id1 = s.id5  where s5_6 is not null group by nom_dd ) as C0 on DEP.ccdd  = C0.ccdd 
          left join (select ccdd,  count(*) as t  from acu_seccion1 a inner join acu_seccion5 s on a.id1 = s.id5  where s5_6 = 1 group by nom_dd ) as C1 on DEP.ccdd  = C1.ccdd 
          left join (select ccdd,  count(*) as t  from acu_seccion1 a inner join acu_seccion5 s on a.id1 = s.id5  where s5_6 = 2 group by nom_dd ) as C2 on DEP.ccdd  = C2.ccdd 
          left join (select ccdd,  count(*) as t  from acu_seccion1 a inner join acu_seccion5 s on a.id1 = s.id5  where s5_6 = 9 group by nom_dd ) as C3 on DEP.ccdd  = C3.ccdd ;
        ");
      return $q;
}

function get_tabulado_142()
{  
      $q = $this->db->query("
          /* TABULADO N° 142 -------------------------- TIEMPO EN AUTORIZACION -------------------------*/
          select 
          DEP.CCDD, DEPARTAMENTO,  COALESCE(C0.t ,0) AS TOTAL,  
          COALESCE(C1.t,0) as 2_MESES, COALESCE(C2.t,0) as 3_5_MESES, COALESCE(C3.t,0) as 6_12_MESES, COALESCE(C4.t,0) as MAS_12_MESES, COALESCE(C5.t,0) as  NEP
          from (select  distinct(departamento), ccdd from departamentos_tab order by departamento) as DEP 
          left join (select ccdd,  count(*) as t  from acu_seccion1 a inner join acu_seccion5 s on a.id1 = s.id5  where S5_7 = 1 is not null group by nom_dd ) as C0 on DEP.ccdd  = C0.ccdd 
          left join (select ccdd,  count(*) as t  from acu_seccion1 a inner join acu_seccion5 s on a.id1 = s.id5  where S5_7 = 1  group by nom_dd ) as C1 on DEP.ccdd  = C1.ccdd 
          left join (select ccdd,  count(*) as t  from acu_seccion1 a inner join acu_seccion5 s on a.id1 = s.id5  where S5_7 = 2  group by nom_dd ) as C2 on DEP.ccdd  = C2.ccdd 
          left join (select ccdd,  count(*) as t  from acu_seccion1 a inner join acu_seccion5 s on a.id1 = s.id5  where S5_7 = 3  group by nom_dd ) as C3 on DEP.ccdd  = C3.ccdd 
          left join (select ccdd,  count(*) as t  from acu_seccion1 a inner join acu_seccion5 s on a.id1 = s.id5  where S5_7 = 4  group by nom_dd ) as C4 on DEP.ccdd  = C4.ccdd 
          left join (select ccdd,  count(*) as t  from acu_seccion1 a inner join acu_seccion5 s on a.id1 = s.id5  where S5_7 = 9  group by nom_dd ) as C5 on DEP.ccdd  = C5.ccdd ;
        ");
      return $q;
}

function get_tabulado_143()
{   
      $q = $this->db->query("
          /* TABULADO N° 143 -------------------------- TIPO DE MANEJO -------------------------*/
          select 
          DEP.CCDD, DEPARTAMENTO,  COALESCE(C0.t ,0) AS TOTAL,    
          COALESCE(C1.t,0) as EXTENSIVO, COALESCE(C2.t,0) as SEMI_INTENSIVO, COALESCE(C3.t,0) as INTENSIVO, COALESCE(C4.t,0)  as NEP
          from (select  distinct(departamento), ccdd from departamentos_tab order by departamento) as DEP 
          left join (select ccdd,  count(*) as t  from acu_seccion1 a inner join acu_seccion5 s on a.id1 = s.id5  where S5_9_1 is not null group by nom_dd ) as C0 on DEP.ccdd  = C0.ccdd 
          left join (select ccdd,  count(*) as t  from acu_seccion1 a inner join acu_seccion5 s on a.id1 = s.id5  where S5_9_1 = 1 group by nom_dd ) as C1 on DEP.ccdd  = C1.ccdd 
          left join (select ccdd,  count(*) as t  from acu_seccion1 a inner join acu_seccion5 s on a.id1 = s.id5  where S5_9_2 = 1 group by nom_dd ) as C2 on DEP.ccdd  = C2.ccdd 
          left join (select ccdd,  count(*) as t  from acu_seccion1 a inner join acu_seccion5 s on a.id1 = s.id5  where S5_9_3 = 1 group by nom_dd ) as C3 on DEP.ccdd  = C3.ccdd 
          left join (select ccdd,  count(*) as t  from acu_seccion1 a inner join acu_seccion5 s on a.id1 = s.id5  where S5_9_3 = 9 group by nom_dd ) as C4 on DEP.ccdd  = C4.ccdd ;
        ");
      return $q;
}

function get_tabulado_144()
{  
      $q = $this->db->query("
          /* TABULADO N° 144 -------------------------- ESPECIES DE CULTIUVO-------------------------*/
          select 
          DEP.CCDD, DEPARTAMENTO,  COALESCE(C0.t ,0) AS TOTAL, 
          COALESCE(C1.t,0) as TRUCHA, COALESCE(C2.t,0) as TILAPIA, COALESCE(C3.t,0) as BOQUICHICO, COALESCE(C4.t,0) as PAICHE, COALESCE(C5.t,0) as GAMITANA,
          COALESCE(C6.t,0) as PACO, COALESCE(C7.t,0) as CHURRO, COALESCE(C8.t,0) as GIGANTE, COALESCE(C9.t,0) LANGOSTINO, COALESCE(C10.t,0) CARPA, 
          COALESCE(C11.t,0) CARACHAMA, COALESCE(C12.t,0) SABALO, COALESCE(C13.t,0) PECES_ORNA, (COALESCE(C14.t,0)  + COALESCE(C15.t,0)) OTRO, COALESCE(C16.t,0) NEP
          from (select  distinct(departamento), ccdd from departamentos_tab order by departamento) as DEP 
          left join (select ccdd,  count(*) as t  from acu_seccion1 a inner join acu_seccion5 s on a.id1 = s.id5  where S5_10_1 is not null group by nom_dd ) as C0 on DEP.ccdd  = C0.ccdd 
          left join (select ccdd,  count(*) as t  from acu_seccion1 a inner join acu_seccion5 s on a.id1 = s.id5  where S5_10_1 = 1 group by nom_dd ) as C1 on DEP.ccdd  = C1.ccdd 
          left join (select ccdd,  count(*) as t  from acu_seccion1 a inner join acu_seccion5 s on a.id1 = s.id5  where S5_10_2 = 1 group by nom_dd ) as C2 on DEP.ccdd  = C2.ccdd 
          left join (select ccdd,  count(*) as t  from acu_seccion1 a inner join acu_seccion5 s on a.id1 = s.id5  where S5_10_3 = 1 group by nom_dd ) as C3 on DEP.ccdd  = C3.ccdd 
          left join (select ccdd,  count(*) as t  from acu_seccion1 a inner join acu_seccion5 s on a.id1 = s.id5  where S5_10_4 = 1 group by nom_dd ) as C4 on DEP.ccdd  = C4.ccdd 
          left join (select ccdd,  count(*) as t  from acu_seccion1 a inner join acu_seccion5 s on a.id1 = s.id5  where S5_10_5 = 1 group by nom_dd ) as C5 on DEP.ccdd  = C5.ccdd 
          left join (select ccdd,  count(*) as t  from acu_seccion1 a inner join acu_seccion5 s on a.id1 = s.id5  where S5_10_6 = 1 group by nom_dd ) as C6 on DEP.ccdd  = C6.ccdd 
          left join (select ccdd,  count(*) as t  from acu_seccion1 a inner join acu_seccion5 s on a.id1 = s.id5  where S5_10_7 = 1 group by nom_dd ) as C7 on DEP.ccdd  = C7.ccdd 
          left join (select ccdd,  count(*) as t  from acu_seccion1 a inner join acu_seccion5 s on a.id1 = s.id5  where S5_10_8 = 1 group by nom_dd ) as C8 on DEP.ccdd  = C8.ccdd 
          left join (select ccdd,  count(*) as t  from acu_seccion1 a inner join acu_seccion5 s on a.id1 = s.id5  where S5_10_9 = 1 group by nom_dd ) as C9 on DEP.ccdd  = C9.ccdd 
          left join (select ccdd,  count(*) as t  from acu_seccion1 a inner join acu_seccion5 s on a.id1 = s.id5  where S5_10_10 = 1 group by nom_dd ) as C10 on DEP.ccdd  = C10.ccdd 
          left join (select ccdd,  count(*) as t  from acu_seccion1 a inner join acu_seccion5 s on a.id1 = s.id5  where S5_10_11 = 1 group by nom_dd ) as C11 on DEP.ccdd  = C11.ccdd 
          left join (select ccdd,  count(*) as t  from acu_seccion1 a inner join acu_seccion5 s on a.id1 = s.id5  where S5_10_12 = 1 group by nom_dd ) as C12 on DEP.ccdd  = C12.ccdd 
          left join (select ccdd,  count(*) as t  from acu_seccion1 a inner join acu_seccion5 s on a.id1 = s.id5  where S5_10_13 = 1 group by nom_dd ) as C13 on DEP.ccdd  = C13.ccdd 
          left join (select ccdd,  count(*) as t  from acu_seccion1 a inner join acu_seccion5 s on a.id1 = s.id5  where S5_10_14 = 1 group by nom_dd ) as C14 on DEP.ccdd  = C14.ccdd 
          left join (select ccdd,  count(*) as t  from acu_seccion1 a inner join acu_seccion5 s on a.id1 = s.id5  where S5_10_15 = 1 group by nom_dd ) as C15 on DEP.ccdd  = C15.ccdd 
          left join (select ccdd,  count(*) as t  from acu_seccion1 a inner join acu_seccion5 s on a.id1 = s.id5  where S5_10_15 = 9 group by nom_dd ) as C16 on DEP.ccdd  = C16.ccdd ;
        ");
      return $q;
}

function get_tabulado_145()
{ 
      $q = $this->db->query("
          /* TABULADO N° 145 -------------------------- TIPO DE MANEJO -------------------------*/
          select 
          DEP.CCDD, DEPARTAMENTO,  COALESCE(C0.t ,0) AS TOTAL,    
          COALESCE(C1.t,0) as MONOCULTIVO, COALESCE(C2.t,0) as POLICULTIVO, COALESCE(C3.t,0) as CULTIVO_ASOCIADO, COALESCE(C4.t,0)  as NEP
          from (select  distinct(departamento), ccdd from departamentos_tab order by departamento) as DEP 
          left join (select ccdd,  count(*) as t  from acu_seccion1 a inner join acu_seccion5 s on a.id1 = s.id5  where S5_11_1 is not null group by nom_dd ) as C0 on DEP.ccdd  = C0.ccdd 
          left join (select ccdd,  count(*) as t  from acu_seccion1 a inner join acu_seccion5 s on a.id1 = s.id5  where S5_11_1 = 1 group by nom_dd ) as C1 on DEP.ccdd  = C1.ccdd 
          left join (select ccdd,  count(*) as t  from acu_seccion1 a inner join acu_seccion5 s on a.id1 = s.id5  where S5_11_2 = 1 group by nom_dd ) as C2 on DEP.ccdd  = C2.ccdd 
          left join (select ccdd,  count(*) as t  from acu_seccion1 a inner join acu_seccion5 s on a.id1 = s.id5  where S5_11_3 = 1 group by nom_dd ) as C3 on DEP.ccdd  = C3.ccdd 
          left join (select ccdd,  count(*) as t  from acu_seccion1 a inner join acu_seccion5 s on a.id1 = s.id5  where S5_11_3 = 9 group by nom_dd ) as C4 on DEP.ccdd  = C4.ccdd ;
        ");
      return $q;
}

function get_tabulado_146()
{   
      $q = $this->db->query("
          /* TABULADO N° 146 -------------------------- TIPO DE MANEJO -------------------------*/
          select 
          DEP.CCDD, DEPARTAMENTO,  COALESCE(C0.t ,0) AS TOTAL,    
          COALESCE(C1.t,0) as SUBSISTENCIA, COALESCE(C2.t,0) as MENOR_ESCALA, COALESCE(C3.t,0) as MAYOR_ESCALA, COALESCE(C4.t,0)  as NEP
          from (select  distinct(departamento), ccdd from departamentos_tab order by departamento) as DEP 
          left join (select ccdd,  count(*) as t  from acu_seccion1 a inner join acu_seccion5 s on a.id1 = s.id5  where S5_12 is not null group by nom_dd ) as C0 on DEP.ccdd  = C0.ccdd 
          left join (select ccdd,  count(*) as t  from acu_seccion1 a inner join acu_seccion5 s on a.id1 = s.id5  where S5_12 = 1 group by nom_dd ) as C1 on DEP.ccdd  = C1.ccdd 
          left join (select ccdd,  count(*) as t  from acu_seccion1 a inner join acu_seccion5 s on a.id1 = s.id5  where S5_12 = 2 group by nom_dd ) as C2 on DEP.ccdd  = C2.ccdd 
          left join (select ccdd,  count(*) as t  from acu_seccion1 a inner join acu_seccion5 s on a.id1 = s.id5  where S5_12 = 3 group by nom_dd ) as C3 on DEP.ccdd  = C3.ccdd 
          left join (select ccdd,  count(*) as t  from acu_seccion1 a inner join acu_seccion5 s on a.id1 = s.id5  where S5_12 = 9 group by nom_dd ) as C4 on DEP.ccdd  = C4.ccdd ;
        ");
      return $q;
}

function get_tabulado_147()
{     
      $q = $this->db->query("
          /* TABULADO N° 147 -------------------------- TIPO INSTALACIONES -------------------------*/
          select 
          DEP.CCDD, DEPARTAMENTO,  COALESCE(C0.t ,0) AS TOTAL, 
          COALESCE(C1.t,0) as ESTANQUES_N, COALESCE(C2.t,0) as ESTANQUES_A, COALESCE(C3.t,0) as JAULAS_A, COALESCE(C4.t,0) as JAULAS_M, COALESCE(C5.t,0) as TANQUES,
          COALESCE(C6.t,0) as ARTESAS, COALESCE(C7.t,0) as INCUBADORAS, COALESCE(C8.t,0) as OTRO, COALESCE(C9.t,0)  NEP
          from (select  distinct(departamento), ccdd from departamentos_tab order by departamento) as DEP 
          left join (select ccdd,  count(*) as t  from acu_seccion1 a inner join acu_seccion5 s on a.id1 = s.id5  where S5_13_1 is not null group by nom_dd ) as C0 on DEP.ccdd  = C0.ccdd 
          left join (select ccdd,  count(*) as t  from acu_seccion1 a inner join acu_seccion5 s on a.id1 = s.id5  where S5_13_1 = 1 group by nom_dd ) as C1 on DEP.ccdd  = C1.ccdd 
          left join (select ccdd,  count(*) as t  from acu_seccion1 a inner join acu_seccion5 s on a.id1 = s.id5  where S5_13_2 = 1 group by nom_dd ) as C2 on DEP.ccdd  = C2.ccdd 
          left join (select ccdd,  count(*) as t  from acu_seccion1 a inner join acu_seccion5 s on a.id1 = s.id5  where S5_13_3 = 1 group by nom_dd ) as C3 on DEP.ccdd  = C3.ccdd 
          left join (select ccdd,  count(*) as t  from acu_seccion1 a inner join acu_seccion5 s on a.id1 = s.id5  where S5_13_4 = 1 group by nom_dd ) as C4 on DEP.ccdd  = C4.ccdd 
          left join (select ccdd,  count(*) as t  from acu_seccion1 a inner join acu_seccion5 s on a.id1 = s.id5  where S5_13_5 = 1 group by nom_dd ) as C5 on DEP.ccdd  = C5.ccdd 
          left join (select ccdd,  count(*) as t  from acu_seccion1 a inner join acu_seccion5 s on a.id1 = s.id5  where S5_13_6 = 1 group by nom_dd ) as C6 on DEP.ccdd  = C6.ccdd 
          left join (select ccdd,  count(*) as t  from acu_seccion1 a inner join acu_seccion5 s on a.id1 = s.id5  where S5_13_7 = 1 group by nom_dd ) as C7 on DEP.ccdd  = C7.ccdd 
          left join (select ccdd,  count(*) as t  from acu_seccion1 a inner join acu_seccion5 s on a.id1 = s.id5  where S5_13_8 = 1 group by nom_dd ) as C8 on DEP.ccdd  = C8.ccdd 
          left join (select ccdd,  count(*) as t  from acu_seccion1 a inner join acu_seccion5 s on a.id1 = s.id5  where S5_13_8 = 9 group by nom_dd ) as C9 on DEP.ccdd  = C9.ccdd;

        ");
      return $q;
}

function get_tabulado_148()
{         
      $q = $this->db->query("


        ");
      return $q;
}

function get_tabulado_149()
{         
      $q = $this->db->query("
          /* TABULADO N° 149 -------------------------- ETAPA CULTIVOS  -------------------------*/
          select 
          DEP.CCDD, DEPARTAMENTO,  COALESCE(C0.t ,0) AS TOTAL,  
          COALESCE(C1.t,0) as REPRODUCTORES, COALESCE(C2.t,0) as INCUBACION, COALESCE(C3.t,0) as ALEVINOS, COALESCE(C4.t,0) as JUVENILES, COALESCE(C5.t,0) as CULTIVO,
          COALESCE(C6.t,0) as PROCESAMIENTO_P, COALESCE(C7.t,0) as NEP
          from (select  distinct(departamento), ccdd from departamentos_tab order by departamento) as DEP 
          left join (select ccdd,  count(*) as t  from acu_seccion1 a inner join acu_seccion5 s on a.id1 = s.id5  where S5_14_1 is not null group by nom_dd ) as C0 on DEP.ccdd  = C0.ccdd 
          left join (select ccdd,  count(*) as t  from acu_seccion1 a inner join acu_seccion5 s on a.id1 = s.id5  where S5_14_1 = 1 group by nom_dd ) as C1 on DEP.ccdd  = C1.ccdd 
          left join (select ccdd,  count(*) as t  from acu_seccion1 a inner join acu_seccion5 s on a.id1 = s.id5  where S5_14_2 = 1 group by nom_dd ) as C2 on DEP.ccdd  = C2.ccdd 
          left join (select ccdd,  count(*) as t  from acu_seccion1 a inner join acu_seccion5 s on a.id1 = s.id5  where S5_14_3 = 1 group by nom_dd ) as C3 on DEP.ccdd  = C3.ccdd 
          left join (select ccdd,  count(*) as t  from acu_seccion1 a inner join acu_seccion5 s on a.id1 = s.id5  where S5_14_4 = 1 group by nom_dd ) as C4 on DEP.ccdd  = C4.ccdd 
          left join (select ccdd,  count(*) as t  from acu_seccion1 a inner join acu_seccion5 s on a.id1 = s.id5  where S5_14_5 = 1 group by nom_dd ) as C5 on DEP.ccdd  = C5.ccdd 
          left join (select ccdd,  count(*) as t  from acu_seccion1 a inner join acu_seccion5 s on a.id1 = s.id5  where S5_14_6 = 1 group by nom_dd ) as C6 on DEP.ccdd  = C6.ccdd 
          left join (select ccdd,  count(*) as t  from acu_seccion1 a inner join acu_seccion5 s on a.id1 = s.id5  where S5_14_6 = 9 group by nom_dd ) as C7 on DEP.ccdd  = C7.ccdd;
        ");
      return $q;
}

function get_tabulado_150()
{          
      $q = $this->db->query("
          /* TABULADO N° 150 --------- ORIGEN SEMILLA -----------------*/
          select 
          DEP.CCDD, DEPARTAMENTO,  COALESCE(C0.t ,0) AS TOTAL,  
          COALESCE(C1.t,0) as NACIONAL, COALESCE(C2.t,0) as EXTRANERO,  COALESCE(C3.t,0) NEP
          from (select  distinct(departamento), ccdd from departamentos_tab order by departamento) as DEP 
          left join (select ccdd,  count(*) as t  from acu_seccion1 a inner join acu_seccion5 s on a.id1 = s.id5  where s5_15_1 is not null group by nom_dd ) as C0 on DEP.ccdd  = C0.ccdd 
          left join (select ccdd,  count(*) as t  from acu_seccion1 a inner join acu_seccion5 s on a.id1 = s.id5  where s5_15_1 = 1 group by nom_dd ) as C1 on DEP.ccdd  = C1.ccdd 
          left join (select ccdd,  count(*) as t  from acu_seccion1 a inner join acu_seccion5 s on a.id1 = s.id5  where s5_15_2 = 1 group by nom_dd ) as C2 on DEP.ccdd  = C2.ccdd 
          left join (select ccdd,  count(*) as t  from acu_seccion1 a inner join acu_seccion5 s on a.id1 = s.id5  where s5_15_2 = 9 group by nom_dd ) as C3 on DEP.ccdd  = C3.ccdd ;
        ");
      return $q;
}

function get_tabulado_151()
{ 
      $q = $this->db->query("
          /* TABULADO N° 151 -------------------------- ALIMENTOS EN CULTIVO -------------------------*/
          select 
          DEP.CCDD, DEPARTAMENTO,  COALESCE(C0.t ,0) AS TOTAL, 
          COALESCE(C1.t,0) as PLANCTON, COALESCE(C2.t,0) as ALEVINOS, COALESCE(C3.t,0) as HOJUELAS, COALESCE(C4.t,0) as PELLET, COALESCE(C5.t,0) as EXTRUSADO,
          COALESCE(C6.t,0) as PRE_MEZCLAS, COALESCE(C7.t,0) as BIOFLOC, COALESCE(C8.t,0) as PREBIOTICOS, COALESCE(C9.t,0) OTRO, COALESCE(C10.t,0)  NEP
          from (select  distinct(departamento), ccdd from departamentos_tab order by departamento) as DEP 
          left join (select ccdd,  count(*) as t  from acu_seccion1 a inner join acu_seccion5 s on a.id1 = s.id5  where S5_16_1 is not null group by nom_dd ) as C0 on DEP.ccdd  = C0.ccdd 
          left join (select ccdd,  count(*) as t  from acu_seccion1 a inner join acu_seccion5 s on a.id1 = s.id5  where S5_16_1 = 1 group by nom_dd ) as C1 on DEP.ccdd  = C1.ccdd 
          left join (select ccdd,  count(*) as t  from acu_seccion1 a inner join acu_seccion5 s on a.id1 = s.id5  where S5_16_2 = 1 group by nom_dd ) as C2 on DEP.ccdd  = C2.ccdd 
          left join (select ccdd,  count(*) as t  from acu_seccion1 a inner join acu_seccion5 s on a.id1 = s.id5  where S5_16_3 = 1 group by nom_dd ) as C3 on DEP.ccdd  = C3.ccdd 
          left join (select ccdd,  count(*) as t  from acu_seccion1 a inner join acu_seccion5 s on a.id1 = s.id5  where S5_16_4 = 1 group by nom_dd ) as C4 on DEP.ccdd  = C4.ccdd 
          left join (select ccdd,  count(*) as t  from acu_seccion1 a inner join acu_seccion5 s on a.id1 = s.id5  where S5_16_5 = 1 group by nom_dd ) as C5 on DEP.ccdd  = C5.ccdd 
          left join (select ccdd,  count(*) as t  from acu_seccion1 a inner join acu_seccion5 s on a.id1 = s.id5  where S5_16_6 = 1 group by nom_dd ) as C6 on DEP.ccdd  = C6.ccdd 
          left join (select ccdd,  count(*) as t  from acu_seccion1 a inner join acu_seccion5 s on a.id1 = s.id5  where S5_16_7 = 1 group by nom_dd ) as C7 on DEP.ccdd  = C7.ccdd 
          left join (select ccdd,  count(*) as t  from acu_seccion1 a inner join acu_seccion5 s on a.id1 = s.id5  where S5_16_8 = 1 group by nom_dd ) as C8 on DEP.ccdd  = C8.ccdd 
          left join (select ccdd,  count(*) as t  from acu_seccion1 a inner join acu_seccion5 s on a.id1 = s.id5  where S5_16_9 = 1 group by nom_dd ) as C9 on DEP.ccdd  = C9.ccdd 
          left join (select ccdd,  count(*) as t  from acu_seccion1 a inner join acu_seccion5 s on a.id1 = s.id5  where S5_16_9 = 9 group by nom_dd ) as C10 on DEP.ccdd  = C10.ccdd ;
        ");
      return $q;
}

function get_tabulado_152()
{
      $q = $this->db->query("
          /* TABULADO N° 152  -------------------------- PROBLEMAS EN ACTIVIDAD -------------------------*/
          select 
          DEP.CCDD, DEPARTAMENTO,  COALESCE(C0.t ,0) AS TOTAL, 
          COALESCE(C1.t,0) as CLIMATICOS, COALESCE(C2.t,0) as CONTAMINACION, COALESCE(C3.t,0) as FINANCIAMIENTO, COALESCE(C4.t,0) as ALTOS_COSTOS, COALESCE(C5.t,0) as MECANISMOS,
          COALESCE(C6.t,0) as CAPACITACION, COALESCE(C7.t,0) as INFRAESTRUCTURA, COALESCE(C8.t,0) as VIAS_ACCESO, COALESCE(C9.t,0) INSEGURIDAD, COALESCE(C10.t,0) COSTOS_ALIMENTOS, 
          COALESCE(C11.t,0) COSTOS_SEMILLAS, COALESCE(C12.t,0) ENFERMEDADES_PECES, COALESCE(C13.t,0) DIFICULTAD_A, COALESCE(C14.t,0)  as PROMOCION, COALESCE(C15.t,0) as OTRO, 
          COALESCE(C16.t,0) NINGUNO, COALESCE(C17.t,0) NEP
          from (select  distinct(departamento), ccdd from departamentos_tab order by departamento) as DEP 
          left join (select ccdd,  count(*) as t  from acu_seccion1 a inner join acu_seccion5 s on a.id1 = s.id5  where S5_17_1 is not null group by nom_dd ) as C0 on DEP.ccdd  = C0.ccdd 
          left join (select ccdd,  count(*) as t  from acu_seccion1 a inner join acu_seccion5 s on a.id1 = s.id5  where S5_17_1 = 1 group by nom_dd ) as C1 on DEP.ccdd  = C1.ccdd 
          left join (select ccdd,  count(*) as t  from acu_seccion1 a inner join acu_seccion5 s on a.id1 = s.id5  where S5_17_2 = 1 group by nom_dd ) as C2 on DEP.ccdd  = C2.ccdd 
          left join (select ccdd,  count(*) as t  from acu_seccion1 a inner join acu_seccion5 s on a.id1 = s.id5  where S5_17_3 = 1 group by nom_dd ) as C3 on DEP.ccdd  = C3.ccdd 
          left join (select ccdd,  count(*) as t  from acu_seccion1 a inner join acu_seccion5 s on a.id1 = s.id5  where S5_17_4 = 1 group by nom_dd ) as C4 on DEP.ccdd  = C4.ccdd 
          left join (select ccdd,  count(*) as t  from acu_seccion1 a inner join acu_seccion5 s on a.id1 = s.id5  where S5_17_5 = 1 group by nom_dd ) as C5 on DEP.ccdd  = C5.ccdd 
          left join (select ccdd,  count(*) as t  from acu_seccion1 a inner join acu_seccion5 s on a.id1 = s.id5  where S5_17_6 = 1 group by nom_dd ) as C6 on DEP.ccdd  = C6.ccdd 
          left join (select ccdd,  count(*) as t  from acu_seccion1 a inner join acu_seccion5 s on a.id1 = s.id5  where S5_17_7 = 1 group by nom_dd ) as C7 on DEP.ccdd  = C7.ccdd 
          left join (select ccdd,  count(*) as t  from acu_seccion1 a inner join acu_seccion5 s on a.id1 = s.id5  where S5_17_8 = 1 group by nom_dd ) as C8 on DEP.ccdd  = C8.ccdd 
          left join (select ccdd,  count(*) as t  from acu_seccion1 a inner join acu_seccion5 s on a.id1 = s.id5  where S5_17_9 = 1 group by nom_dd ) as C9 on DEP.ccdd  = C9.ccdd 
          left join (select ccdd,  count(*) as t  from acu_seccion1 a inner join acu_seccion5 s on a.id1 = s.id5  where S5_17_10 = 1 group by nom_dd ) as C10 on DEP.ccdd  = C10.ccdd 
          left join (select ccdd,  count(*) as t  from acu_seccion1 a inner join acu_seccion5 s on a.id1 = s.id5  where S5_17_11 = 1 group by nom_dd ) as C11 on DEP.ccdd  = C11.ccdd 
          left join (select ccdd,  count(*) as t  from acu_seccion1 a inner join acu_seccion5 s on a.id1 = s.id5  where S5_17_12 = 1 group by nom_dd ) as C12 on DEP.ccdd  = C12.ccdd 
          left join (select ccdd,  count(*) as t  from acu_seccion1 a inner join acu_seccion5 s on a.id1 = s.id5  where S5_17_13 = 1 group by nom_dd ) as C13 on DEP.ccdd  = C13.ccdd 
          left join (select ccdd,  count(*) as t  from acu_seccion1 a inner join acu_seccion5 s on a.id1 = s.id5  where S5_17_14 = 1 group by nom_dd ) as C14 on DEP.ccdd  = C14.ccdd 
          left join (select ccdd,  count(*) as t  from acu_seccion1 a inner join acu_seccion5 s on a.id1 = s.id5  where S5_17_15 = 1 group by nom_dd ) as C15 on DEP.ccdd  = C15.ccdd 
          left join (select ccdd,  count(*) as t  from acu_seccion1 a inner join acu_seccion5 s on a.id1 = s.id5  where S5_17_16 = 1 group by nom_dd ) as C16 on DEP.ccdd  = C16.ccdd 
          left join (select ccdd,  count(*) as t  from acu_seccion1 a inner join acu_seccion5 s on a.id1 = s.id5  where S5_17_16 = 9 group by nom_dd ) as C17 on DEP.ccdd  = C17.ccdd ;
        ");
      return $q;
}

function get_tabulado_153()
{
      $q = $this->db->query("
          /* TABULADO N° 153 -------------------------- PARTICIPACION ORGANIZACION  -------------------------*/
          select 
          DEP.CCDD, DEPARTAMENTO,  COALESCE(C0.t ,0) AS TOTAL, 
          COALESCE(C1.t,0) as SINDICATO, COALESCE(C2.t,0) as GREMIO, COALESCE(C3.t,0) as ASOCIACION, COALESCE(C4.t,0) as ORGANIZACION_C, COALESCE(C5.t,0) as CONSORCIO,
          COALESCE(C6.t,0) as COOPERATIVA, COALESCE(C7.t,0) as OTRO, COALESCE(C8.t,0) as NINGUNA, COALESCE(C9.t,0)  NEP
          from (select  distinct(departamento), ccdd from departamentos_tab order by departamento) as DEP 
          left join (select ccdd,  count(*) as t  from acu_seccion1 a inner join acu_seccion6 s on a.id1 = s.id6  where S6_1_1 is not null group by nom_dd ) as C0 on DEP.ccdd  = C0.ccdd 
          left join (select ccdd,  count(*) as t  from acu_seccion1 a inner join acu_seccion6 s on a.id1 = s.id6  where S6_1_1 = 1 group by nom_dd ) as C1 on DEP.ccdd  = C1.ccdd 
          left join (select ccdd,  count(*) as t  from acu_seccion1 a inner join acu_seccion6 s on a.id1 = s.id6  where S6_1_2 = 1 group by nom_dd ) as C2 on DEP.ccdd  = C2.ccdd 
          left join (select ccdd,  count(*) as t  from acu_seccion1 a inner join acu_seccion6 s on a.id1 = s.id6  where S6_1_3 = 1 group by nom_dd ) as C3 on DEP.ccdd  = C3.ccdd 
          left join (select ccdd,  count(*) as t  from acu_seccion1 a inner join acu_seccion6 s on a.id1 = s.id6  where S6_1_4 = 1 group by nom_dd ) as C4 on DEP.ccdd  = C4.ccdd 
          left join (select ccdd,  count(*) as t  from acu_seccion1 a inner join acu_seccion6 s on a.id1 = s.id6  where S6_1_5 = 1 group by nom_dd ) as C5 on DEP.ccdd  = C5.ccdd 
          left join (select ccdd,  count(*) as t  from acu_seccion1 a inner join acu_seccion6 s on a.id1 = s.id6  where S6_1_6 = 1 group by nom_dd ) as C6 on DEP.ccdd  = C6.ccdd 
          left join (select ccdd,  count(*) as t  from acu_seccion1 a inner join acu_seccion6 s on a.id1 = s.id6  where S6_1_7 = 1 group by nom_dd ) as C7 on DEP.ccdd  = C7.ccdd 
          left join (select ccdd,  count(*) as t  from acu_seccion1 a inner join acu_seccion6 s on a.id1 = s.id6  where S6_1_8 = 1 group by nom_dd ) as C8 on DEP.ccdd  = C8.ccdd 
          left join (select ccdd,  count(*) as t  from acu_seccion1 a inner join acu_seccion6 s on a.id1 = s.id6  where S6_1_8 = 9 group by nom_dd ) as C9 on DEP.ccdd  = C9.ccdd;

        ");
      return $q;
}

function get_tabulado_154()
{
      $q = $this->db->query("
          /* TABULADO N° 154 -------------------------- BENEFICIADOS  -------------------------*/
          select 
          DEP.CCDD, DEPARTAMENTO,  COALESCE(C0.t ,0) AS TOTAL, 
          COALESCE(C1.t,0) as INGRESOS, COALESCE(C2.t,0) as COSTOS, COALESCE(C3.t,0) as TECNICA, COALESCE(C4.t,0) as MERCADO, COALESCE(C5.t,0) as OTRO,
          COALESCE(C6.t,0) as NINGUNO, COALESCE(C7.t,0) as  NEP
          from (select  distinct(departamento), ccdd from departamentos_tab order by departamento) as DEP 
          left join (select ccdd,  count(*) as t  from acu_seccion1 a inner join acu_seccion6 s on a.id1 = s.id6  where S6_2_1 is not null group by nom_dd ) as C0 on DEP.ccdd  = C0.ccdd 
          left join (select ccdd,  count(*) as t  from acu_seccion1 a inner join acu_seccion6 s on a.id1 = s.id6  where S6_2_1 = 1 group by nom_dd ) as C1 on DEP.ccdd  = C1.ccdd 
          left join (select ccdd,  count(*) as t  from acu_seccion1 a inner join acu_seccion6 s on a.id1 = s.id6  where S6_2_2 = 1 group by nom_dd ) as C2 on DEP.ccdd  = C2.ccdd 
          left join (select ccdd,  count(*) as t  from acu_seccion1 a inner join acu_seccion6 s on a.id1 = s.id6  where S6_2_3 = 1 group by nom_dd ) as C3 on DEP.ccdd  = C3.ccdd 
          left join (select ccdd,  count(*) as t  from acu_seccion1 a inner join acu_seccion6 s on a.id1 = s.id6  where S6_2_4 = 1 group by nom_dd ) as C4 on DEP.ccdd  = C4.ccdd 
          left join (select ccdd,  count(*) as t  from acu_seccion1 a inner join acu_seccion6 s on a.id1 = s.id6  where S6_2_5 = 1 group by nom_dd ) as C5 on DEP.ccdd  = C5.ccdd 
          left join (select ccdd,  count(*) as t  from acu_seccion1 a inner join acu_seccion6 s on a.id1 = s.id6  where S6_2_6 = 1 group by nom_dd ) as C6 on DEP.ccdd  = C6.ccdd 
          left join (select ccdd,  count(*) as t  from acu_seccion1 a inner join acu_seccion6 s on a.id1 = s.id6  where S6_2_6 = 9 group by nom_dd ) as C7 on DEP.ccdd  = C7.ccdd ;
        ");
      return $q;
}

function get_tabulado_155()
{
      $q = $this->db->query("
          /* TABULADO N° 155 --------- TIENE TRABAJADORES -----------------*/
          select 
          DEP.CCDD, DEPARTAMENTO,  COALESCE(C0.t ,0) AS TOTAL,  
          COALESCE(C1.t,0) as SI, COALESCE(C2.t,0) as 'NO',  COALESCE(C3.t,0) NEP
          from (select  distinct(departamento), ccdd from departamentos_tab order by departamento) as DEP 
          left join (select ccdd,  count(*) as t  from acu_seccion1 a inner join acu_seccion7 s on a.id1 = s.id7  where s7_1 is not null group by nom_dd ) as C0 on DEP.ccdd  = C0.ccdd 
          left join (select ccdd,  count(*) as t  from acu_seccion1 a inner join acu_seccion7 s on a.id1 = s.id7  where s7_1 = 1 group by nom_dd ) as C1 on DEP.ccdd  = C1.ccdd 
          left join (select ccdd,  count(*) as t  from acu_seccion1 a inner join acu_seccion7 s on a.id1 = s.id7  where s7_1 = 2 group by nom_dd ) as C2 on DEP.ccdd  = C2.ccdd 
          left join (select ccdd,  count(*) as t  from acu_seccion1 a inner join acu_seccion7 s on a.id1 = s.id7  where s7_1 = 9 group by nom_dd ) as C3 on DEP.ccdd  = C3.ccdd ;
        ");
      return $q;
}

function get_tabulado_156()
{
      $q = $this->db->query("
          /* TABULADO N° 156 --------- SEXO TRABAJADORES -----------------*/
          select 
          DEP.CCDD, DEPARTAMENTO,  COALESCE(C0.t ,0) AS TOTAL,  
          COALESCE(C1.t,0) as HOMBRE, COALESCE(C2.t,0) as MUJER
          from (select  distinct(departamento), ccdd from departamentos_tab order by departamento) as DEP 
          left join (select ccdd,  sum(s7_1_t) as t  from acu_seccion1 a inner join acu_seccion7 s on a.id1 = s.id7  where s7_1_t is not null group by nom_dd ) as C0 on DEP.ccdd  = C0.ccdd 
          left join (select ccdd,  sum(s7_1_h) as t  from acu_seccion1 a inner join acu_seccion7 s on a.id1 = s.id7  where s7_1_h  is not null group by nom_dd ) as C1 on DEP.ccdd  = C1.ccdd 
          left join (select ccdd,  sum(s7_1_m) as t  from acu_seccion1 a inner join acu_seccion7 s on a.id1 = s.id7  where s7_1_m  is not null group by nom_dd ) as C2 on DEP.ccdd  = C2.ccdd ;
        ");
      return $q;
}

function get_tabulado_157()
{
      $q = $this->db->query("
          /* TABULADO N° 157 --------- situacion TRABAJADORES -----------------*/
          select 
          DEP.CCDD, DEPARTAMENTO,  (  COALESCE(C1.t,0) + COALESCE(C2.t,0)  ) AS TOTAL,  
          COALESCE(C1.t,0) as PERMANENTES, COALESCE(C2.t,0) as EVENTUALES
          from (select  distinct(departamento), ccdd from departamentos_tab order by departamento) as DEP 
          left join (select ccdd,  sum(s7_1_t_p) as t  from acu_seccion1 a inner join acu_seccion7 s on a.id1 = s.id7  where s7_1_t_p  is not null group by nom_dd ) as C1 on DEP.ccdd  = C1.ccdd 
          left join (select ccdd,  sum(s7_1_t_e) as t  from acu_seccion1 a inner join acu_seccion7 s on a.id1 = s.id7  where s7_1_t_e  is not null group by nom_dd ) as C2 on DEP.ccdd  = C2.ccdd ;
        ");
      return $q;
}

function get_tabulado_158()
{
      $q = $this->db->query("
          /* TABULADO N° 158 --------- SEXO TRABAJADORES permanentes -----------------*/
          select 
          DEP.CCDD, DEPARTAMENTO,  COALESCE(C0.t ,0) AS TOTAL,  
          COALESCE(C1.t,0) as HOMBRE, COALESCE(C2.t,0) as MUJER
          from (select  distinct(departamento), ccdd from departamentos_tab order by departamento) as DEP 
          left join (select ccdd,  sum(s7_1_t_p) as t  from acu_seccion1 a inner join acu_seccion7 s on a.id1 = s.id7  where s7_1_t_p is not null group by nom_dd ) as C0 on DEP.ccdd  = C0.ccdd 
          left join (select ccdd,  sum(s7_1_h_p) as t  from acu_seccion1 a inner join acu_seccion7 s on a.id1 = s.id7  where s7_1_h_p  is not null group by nom_dd ) as C1 on DEP.ccdd  = C1.ccdd 
          left join (select ccdd,  sum(s7_1_m_p) as t  from acu_seccion1 a inner join acu_seccion7 s on a.id1 = s.id7  where s7_1_m_p  is not null group by nom_dd ) as C2 on DEP.ccdd  = C2.ccdd ;
        ");
      return $q;
}

function get_tabulado_159()
{
      $q = $this->db->query("
          /* TABULADO N° 159 --------- SEXO TRABAJADORES eventuales -----------------*/
          select 
          DEP.CCDD, DEPARTAMENTO,  COALESCE(C0.t ,0) AS TOTAL,  
          COALESCE(C1.t,0) as HOMBRE, COALESCE(C2.t,0) as MUJER
          from (select  distinct(departamento), ccdd from departamentos_tab order by departamento) as DEP 
          left join (select ccdd,  sum(s7_1_t_e) as t  from acu_seccion1 a inner join acu_seccion7 s on a.id1 = s.id7  where s7_1_t_e is not null group by nom_dd ) as C0 on DEP.ccdd  = C0.ccdd 
          left join (select ccdd,  sum(s7_1_h_e) as t  from acu_seccion1 a inner join acu_seccion7 s on a.id1 = s.id7  where s7_1_h_e  is not null group by nom_dd ) as C1 on DEP.ccdd  = C1.ccdd 
          left join (select ccdd,  sum(s7_1_m_e) as t  from acu_seccion1 a inner join acu_seccion7 s on a.id1 = s.id7  where s7_1_m_e  is not null group by nom_dd ) as C2 on DEP.ccdd  = C2.ccdd ;
        ");
      return $q;
}

function get_tabulado_160()
{
      $q = $this->db->query("
          /* TABULADO N° 160 ---------  TRABAJADORES con seguro -----------------*/
          select 
          DEP.CCDD, DEPARTAMENTO,  COALESCE(C0.t ,0) AS TOTAL,  
          COALESCE(C1.t,0) as SI, COALESCE(C2.t,0) as 'NO',  COALESCE(C3.t,0) NEP
          from (select  distinct(departamento), ccdd from departamentos_tab order by departamento) as DEP 
          left join (select ccdd,  count(*) as t  from acu_seccion1 a inner join acu_seccion7 s on a.id1 = s.id7  where s7_2 is not null group by nom_dd ) as C0 on DEP.ccdd  = C0.ccdd 
          left join (select ccdd,  count(*) as t  from acu_seccion1 a inner join acu_seccion7 s on a.id1 = s.id7  where s7_2 = 1 group by nom_dd ) as C1 on DEP.ccdd  = C1.ccdd 
          left join (select ccdd,  count(*) as t  from acu_seccion1 a inner join acu_seccion7 s on a.id1 = s.id7  where s7_2 = 2 group by nom_dd ) as C2 on DEP.ccdd  = C2.ccdd 
          left join (select ccdd,  count(*) as t  from acu_seccion1 a inner join acu_seccion7 s on a.id1 = s.id7  where s7_2 = 9 group by nom_dd ) as C3 on DEP.ccdd  = C3.ccdd ;
        ");
      return $q;
}

function get_tabulado_161()
{
      $q = $this->db->query("
          /* TABULADO N° 161 ---------  TRABAJADORES con seguro -----------------*/
          select 
          DEP.CCDD, DEPARTAMENTO,  COALESCE(C0.t ,0) AS TOTAL,  
          COALESCE(C1.t,0) as SI, COALESCE(C2.t,0) as 'NO',  COALESCE(C3.t,0) NEP
          from (select  distinct(departamento), ccdd from departamentos_tab order by departamento) as DEP 
          left join (select ccdd,  count(*) as t  from acu_seccion1 a inner join acu_seccion7 s on a.id1 = s.id7  where s7_3 is not null group by nom_dd ) as C0 on DEP.ccdd  = C0.ccdd 
          left join (select ccdd,  count(*) as t  from acu_seccion1 a inner join acu_seccion7 s on a.id1 = s.id7  where s7_3 = 1 group by nom_dd ) as C1 on DEP.ccdd  = C1.ccdd 
          left join (select ccdd,  count(*) as t  from acu_seccion1 a inner join acu_seccion7 s on a.id1 = s.id7  where s7_3 = 2 group by nom_dd ) as C2 on DEP.ccdd  = C2.ccdd 
          left join (select ccdd,  count(*) as t  from acu_seccion1 a inner join acu_seccion7 s on a.id1 = s.id7  where s7_3 = 9 group by nom_dd ) as C3 on DEP.ccdd  = C3.ccdd ;
        ");
      return $q;
}

function get_tabulado_162()
{
      $q = $this->db->query("
          /* TABULADO N° 162 ---------  ayduante sin remuneracion -----------------*/
          select 
          DEP.CCDD, DEPARTAMENTO,  COALESCE(C0.t ,0) AS TOTAL,  
          COALESCE(C1.t,0) as SI, COALESCE(C2.t,0) as 'NO',  COALESCE(C3.t,0) NEP
          from (select  distinct(departamento), ccdd from departamentos_tab order by departamento) as DEP 
          left join (select ccdd,  count(*) as t  from acu_seccion1 a inner join acu_seccion7 s on a.id1 = s.id7  where s7_4 is not null group by nom_dd ) as C0 on DEP.ccdd  = C0.ccdd 
          left join (select ccdd,  count(*) as t  from acu_seccion1 a inner join acu_seccion7 s on a.id1 = s.id7  where s7_4 = 1 group by nom_dd ) as C1 on DEP.ccdd  = C1.ccdd 
          left join (select ccdd,  count(*) as t  from acu_seccion1 a inner join acu_seccion7 s on a.id1 = s.id7  where s7_4 = 2 group by nom_dd ) as C2 on DEP.ccdd  = C2.ccdd 
          left join (select ccdd,  count(*) as t  from acu_seccion1 a inner join acu_seccion7 s on a.id1 = s.id7  where s7_4 = 9 group by nom_dd ) as C3 on DEP.ccdd  = C3.ccdd ;
        ");
      return $q;
}

function get_tabulado_163()
{//repetyido con 162
      $q = $this->db->query("

        ");
      return $q;
}

function get_tabulado_164()
{
      $q = $this->db->query("
          /* TABULADO N° 164 -------------------------- FINANCIAMIENTO  -------------------------*/
          select 
          DEP.CCDD, DEPARTAMENTO,  COALESCE(C0.t ,0) AS TOTAL, 
          COALESCE(C1.t,0) as TERCEROS, COALESCE(C2.t,0) as PROPIO, COALESCE(C3.t,0) as NO_FINANCIA, COALESCE(C4.t,0) as NO_TRABAJO, COALESCE(C5.t,0) as  NEP
          from (select  distinct(departamento), ccdd from departamentos_tab order by departamento) as DEP 
          left join (select ccdd,  count(*) as t  from acu_seccion1 a inner join acu_seccion8 s on a.id1 = s.id8  where S8_1_1 is not null group by nom_dd ) as C0 on DEP.ccdd  = C0.ccdd 
          left join (select ccdd,  count(*) as t  from acu_seccion1 a inner join acu_seccion8 s on a.id1 = s.id8  where S8_1_1 = 1 group by nom_dd ) as C1 on DEP.ccdd  = C1.ccdd 
          left join (select ccdd,  count(*) as t  from acu_seccion1 a inner join acu_seccion8 s on a.id1 = s.id8  where S8_1_2 = 1 group by nom_dd ) as C2 on DEP.ccdd  = C2.ccdd 
          left join (select ccdd,  count(*) as t  from acu_seccion1 a inner join acu_seccion8 s on a.id1 = s.id8  where S8_1_3 = 1 group by nom_dd ) as C3 on DEP.ccdd  = C3.ccdd 
          left join (select ccdd,  count(*) as t  from acu_seccion1 a inner join acu_seccion8 s on a.id1 = s.id8  where S8_1_4 = 1 group by nom_dd ) as C4 on DEP.ccdd  = C4.ccdd 
          left join (select ccdd,  count(*) as t  from acu_seccion1 a inner join acu_seccion8 s on a.id1 = s.id8  where S8_1_4 = 9 group by nom_dd ) as C5 on DEP.ccdd  = C5.ccdd;
        ");
      return $q;
}

function get_tabulado_165()
{
      $q = $this->db->query("
          /* TABULADO N° 165 -------------------------- FINANCIMIENTO OTORGADO POR  -------------------------*/
          select 
          DEP.CCDD, DEPARTAMENTO,  COALESCE(C0.t ,0) AS TOTAL, 
          COALESCE(C1.t,0) as FONDEPES, COALESCE(C2.t,0) as BANCO, COALESCE(C3.t,0) as FINANCIERA, COALESCE(C4.t,0) as COMERCIANTES, COALESCE(C5.t,0) as PARIENTE,
          COALESCE(C6.t,0) as CAJA_RURAL, COALESCE(C7.t,0) as EDPYME, COALESCE(C8.t,0) as OTRO, COALESCE(C9.t,0)  NEP
          from (select  distinct(departamento), ccdd from departamentos_tab order by departamento) as DEP 
          left join (select ccdd,  count(*) as t  from acu_seccion1 a inner join acu_seccion8 s on a.id1 = s.id8  where S8_2_1 is not null group by nom_dd ) as C0 on DEP.ccdd  = C0.ccdd 
          left join (select ccdd,  count(*) as t  from acu_seccion1 a inner join acu_seccion8 s on a.id1 = s.id8  where S8_2_1 = 1 group by nom_dd ) as C1 on DEP.ccdd  = C1.ccdd 
          left join (select ccdd,  count(*) as t  from acu_seccion1 a inner join acu_seccion8 s on a.id1 = s.id8  where S8_2_2 = 1 group by nom_dd ) as C2 on DEP.ccdd  = C2.ccdd 
          left join (select ccdd,  count(*) as t  from acu_seccion1 a inner join acu_seccion8 s on a.id1 = s.id8  where S8_2_3 = 1 group by nom_dd ) as C3 on DEP.ccdd  = C3.ccdd 
          left join (select ccdd,  count(*) as t  from acu_seccion1 a inner join acu_seccion8 s on a.id1 = s.id8  where S8_2_4 = 1 group by nom_dd ) as C4 on DEP.ccdd  = C4.ccdd 
          left join (select ccdd,  count(*) as t  from acu_seccion1 a inner join acu_seccion8 s on a.id1 = s.id8  where S8_2_5 = 1 group by nom_dd ) as C5 on DEP.ccdd  = C5.ccdd 
          left join (select ccdd,  count(*) as t  from acu_seccion1 a inner join acu_seccion8 s on a.id1 = s.id8  where S8_2_6 = 1 group by nom_dd ) as C6 on DEP.ccdd  = C6.ccdd 
          left join (select ccdd,  count(*) as t  from acu_seccion1 a inner join acu_seccion8 s on a.id1 = s.id8  where S8_2_7 = 1 group by nom_dd ) as C7 on DEP.ccdd  = C7.ccdd 
          left join (select ccdd,  count(*) as t  from acu_seccion1 a inner join acu_seccion8 s on a.id1 = s.id8  where S8_2_8 = 1 group by nom_dd ) as C8 on DEP.ccdd  = C8.ccdd 
          left join (select ccdd,  count(*) as t  from acu_seccion1 a inner join acu_seccion8 s on a.id1 = s.id8  where S8_2_8 = 9 group by nom_dd ) as C9 on DEP.ccdd  = C9.ccdd;
        ");
      return $q;
}

function get_tabulado_166()
{
      $q = $this->db->query("
          /* TABULADO N° 166 -------------------------- RECIBII COMO --------------------------------*/
          select 
          DEP.CCDD, DEPARTAMENTO,  COALESCE(C0.t ,0) AS TOTAL,  
          COALESCE(C1.t,0) as EFECTIVO, COALESCE(C2.t,0) as ESPECIE,  COALESCE(C3.t,0) NEP
          from (select  distinct(departamento), ccdd from departamentos_tab order by departamento) as DEP 
          left join (select ccdd,  count(*) as t  from acu_seccion1 a inner join acu_seccion8 s on a.id1 = s.id8  where S8_3_1 is not null group by nom_dd ) as C0 on DEP.ccdd  = C0.ccdd 
          left join (select ccdd,  count(*) as t  from acu_seccion1 a inner join acu_seccion8 s on a.id1 = s.id8  where S8_3_1 = 1 group by nom_dd ) as C1 on DEP.ccdd  = C1.ccdd 
          left join (select ccdd,  count(*) as t  from acu_seccion1 a inner join acu_seccion8 s on a.id1 = s.id8  where S8_3_2 = 1 group by nom_dd ) as C2 on DEP.ccdd  = C2.ccdd 
          left join (select ccdd,  count(*) as t  from acu_seccion1 a inner join acu_seccion8 s on a.id1 = s.id8  where S8_3_2 = 9 group by nom_dd ) as C3 on DEP.ccdd  = C3.ccdd ;
        ");
      return $q;
}

function get_tabulado_167()
{
      $q = $this->db->query("
          /* TABULADO N° 167 -------------------------- FINANCIAMIENTO EN ESPECIE -------------------------*/
          select 
          DEP.CCDD, DEPARTAMENTO,  COALESCE(C0.t ,0) AS TOTAL, 
          COALESCE(C1.t,0) as INSUMOS, COALESCE(C2.t,0) as MAQUINARIAS, COALESCE(C3.t,0) as PECES, COALESCE(C4.t,0) as OTRO, COALESCE(C5.t,0) as  NEP
          from (select  distinct(departamento), ccdd from departamentos_tab order by departamento) as DEP 
          left join (select ccdd,  count(*) as t  from acu_seccion1 a inner join acu_seccion8 s on a.id1 = s.id8  where S8_4_1 is not null group by nom_dd ) as C0 on DEP.ccdd  = C0.ccdd 
          left join (select ccdd,  count(*) as t  from acu_seccion1 a inner join acu_seccion8 s on a.id1 = s.id8  where S8_4_1 = 1 group by nom_dd ) as C1 on DEP.ccdd  = C1.ccdd 
          left join (select ccdd,  count(*) as t  from acu_seccion1 a inner join acu_seccion8 s on a.id1 = s.id8  where S8_4_2 = 1 group by nom_dd ) as C2 on DEP.ccdd  = C2.ccdd 
          left join (select ccdd,  count(*) as t  from acu_seccion1 a inner join acu_seccion8 s on a.id1 = s.id8  where S8_4_3 = 1 group by nom_dd ) as C3 on DEP.ccdd  = C3.ccdd 
          left join (select ccdd,  count(*) as t  from acu_seccion1 a inner join acu_seccion8 s on a.id1 = s.id8  where S8_4_4 = 1 group by nom_dd ) as C4 on DEP.ccdd  = C4.ccdd 
          left join (select ccdd,  count(*) as t  from acu_seccion1 a inner join acu_seccion8 s on a.id1 = s.id8  where S8_4_4 = 9 group by nom_dd ) as C5 on DEP.ccdd  = C5.ccdd;
        ");
      return $q;
}

function get_tabulado_168()
{
      $q = $this->db->query("
          /* TABULADO N° 168 -------------------------- FINANCIMIENTO LO INVIRTIO PARA  -------------------------*/
          select 
          DEP.CCDD, DEPARTAMENTO,  COALESCE(C0.t ,0) AS TOTAL, 
          COALESCE(C1.t,0) as INSUMOS, COALESCE(C2.t,0) as MAQUINARIAS, COALESCE(C3.t,0) as PECES, COALESCE(C4.t,0) as INFRAESTRUCTURA, COALESCE(C5.t,0) as CAPACITACION,
          COALESCE(C6.t,0) as TECNOLOGIA, COALESCE(C7.t,0) as PROMOCION, COALESCE(C8.t,0) as  NEP
          from (select  distinct(departamento), ccdd from departamentos_tab order by departamento) as DEP 
          left join (select ccdd,  count(*) as t  from acu_seccion1 a inner join acu_seccion8 s on a.id1 = s.id8  where S8_5_1 is not null group by nom_dd ) as C0 on DEP.ccdd  = C0.ccdd 
          left join (select ccdd,  count(*) as t  from acu_seccion1 a inner join acu_seccion8 s on a.id1 = s.id8  where S8_5_1 = 1 group by nom_dd ) as C1 on DEP.ccdd  = C1.ccdd 
          left join (select ccdd,  count(*) as t  from acu_seccion1 a inner join acu_seccion8 s on a.id1 = s.id8  where S8_5_2 = 1 group by nom_dd ) as C2 on DEP.ccdd  = C2.ccdd 
          left join (select ccdd,  count(*) as t  from acu_seccion1 a inner join acu_seccion8 s on a.id1 = s.id8  where S8_5_3 = 1 group by nom_dd ) as C3 on DEP.ccdd  = C3.ccdd 
          left join (select ccdd,  count(*) as t  from acu_seccion1 a inner join acu_seccion8 s on a.id1 = s.id8  where S8_5_4 = 1 group by nom_dd ) as C4 on DEP.ccdd  = C4.ccdd 
          left join (select ccdd,  count(*) as t  from acu_seccion1 a inner join acu_seccion8 s on a.id1 = s.id8  where S8_5_5 = 1 group by nom_dd ) as C5 on DEP.ccdd  = C5.ccdd 
          left join (select ccdd,  count(*) as t  from acu_seccion1 a inner join acu_seccion8 s on a.id1 = s.id8  where S8_5_6 = 1 group by nom_dd ) as C6 on DEP.ccdd  = C6.ccdd 
          left join (select ccdd,  count(*) as t  from acu_seccion1 a inner join acu_seccion8 s on a.id1 = s.id8  where S8_5_7 = 1 group by nom_dd ) as C7 on DEP.ccdd  = C7.ccdd 
          left join (select ccdd,  count(*) as t  from acu_seccion1 a inner join acu_seccion8 s on a.id1 = s.id8  where S8_5_7 = 9 group by nom_dd ) as C8 on DEP.ccdd  = C8.ccdd ;
        ");
      return $q;
}

function get_tabulado_169()
{
      $q = $this->db->query("
          /* TABULADO N° 169 -------------------------- DESTINO DE PECES -------------------------*/
          select 
          DEP.CCDD, DEPARTAMENTO,  COALESCE(C0.t ,0) AS TOTAL, 
          COALESCE(C1.t,0) as VENTA, COALESCE(C2.t,0) as AUTOCONSUMO, COALESCE(C3.t,0) as TRUEQUE, COALESCE(C4.t,0) as OTRO, COALESCE(C5.t,0) as  NEP
          from (select  distinct(departamento), ccdd from departamentos_tab order by departamento) as DEP 
          left join (select ccdd,  count(*) as t  from acu_seccion1 a inner join acu_seccion8 s on a.id1 = s.id8  where S8_6_1 is not null group by nom_dd ) as C0 on DEP.ccdd  = C0.ccdd 
          left join (select ccdd,  count(*) as t  from acu_seccion1 a inner join acu_seccion8 s on a.id1 = s.id8  where S8_6_1 = 1 group by nom_dd ) as C1 on DEP.ccdd  = C1.ccdd 
          left join (select ccdd,  count(*) as t  from acu_seccion1 a inner join acu_seccion8 s on a.id1 = s.id8  where S8_6_2 = 1 group by nom_dd ) as C2 on DEP.ccdd  = C2.ccdd 
          left join (select ccdd,  count(*) as t  from acu_seccion1 a inner join acu_seccion8 s on a.id1 = s.id8  where S8_6_3 = 1 group by nom_dd ) as C3 on DEP.ccdd  = C3.ccdd 
          left join (select ccdd,  count(*) as t  from acu_seccion1 a inner join acu_seccion8 s on a.id1 = s.id8  where S8_6_4 = 1 group by nom_dd ) as C4 on DEP.ccdd  = C4.ccdd 
          left join (select ccdd,  count(*) as t  from acu_seccion1 a inner join acu_seccion8 s on a.id1 = s.id8  where S8_6_4 = 9 group by nom_dd ) as C5 on DEP.ccdd  = C5.ccdd;
        ");
      return $q;
}

function get_tabulado_170()
{
      $q = $this->db->query("
          /* TABULADO N° 170  -------------------------- ESPECIES QUE COSECHO -------------------------*/
          select 
          DEP.CCDD, DEPARTAMENTO,  COALESCE(C0.t ,0) AS TOTAL, 
          COALESCE(C1.t,0) as TRUCHA, COALESCE(C2.t,0) as TILAPIA, COALESCE(C3.t,0) as BOQUICHICO, COALESCE(C4.t,0) as PAICHE, COALESCE(C5.t,0) as GAMITANA,
          COALESCE(C6.t,0) as PACO, COALESCE(C7.t,0) as CHURRO, COALESCE(C8.t,0) as GIGANTE, COALESCE(C9.t,0) LANGOSTINO, COALESCE(C10.t,0) CARPA, 
          COALESCE(C11.t,0) CARACHAMA, COALESCE(C12.t,0) SABALO, ( COALESCE(C13.t,0)  + COALESCE(C14.t,0) ) OTRO, COALESCE(C15.t,0) NEP
          from (select  distinct(departamento), ccdd from departamentos_tab order by departamento) as DEP 
          left join (select ccdd,  count(*) as t  from acu_seccion1 a inner join acu_seccion8 s on a.id1 = s.id8  where S8_7_1 is not null group by nom_dd ) as C0 on DEP.ccdd  = C0.ccdd 
          left join (select ccdd,  count(*) as t  from acu_seccion1 a inner join acu_seccion8 s on a.id1 = s.id8  where S8_7_1 = 1 group by nom_dd ) as C1 on DEP.ccdd  = C1.ccdd 
          left join (select ccdd,  count(*) as t  from acu_seccion1 a inner join acu_seccion8 s on a.id1 = s.id8  where S8_7_2 = 1 group by nom_dd ) as C2 on DEP.ccdd  = C2.ccdd 
          left join (select ccdd,  count(*) as t  from acu_seccion1 a inner join acu_seccion8 s on a.id1 = s.id8  where S8_7_3 = 1 group by nom_dd ) as C3 on DEP.ccdd  = C3.ccdd 
          left join (select ccdd,  count(*) as t  from acu_seccion1 a inner join acu_seccion8 s on a.id1 = s.id8  where S8_7_4 = 1 group by nom_dd ) as C4 on DEP.ccdd  = C4.ccdd 
          left join (select ccdd,  count(*) as t  from acu_seccion1 a inner join acu_seccion8 s on a.id1 = s.id8  where S8_7_5 = 1 group by nom_dd ) as C5 on DEP.ccdd  = C5.ccdd 
          left join (select ccdd,  count(*) as t  from acu_seccion1 a inner join acu_seccion8 s on a.id1 = s.id8  where S8_7_6 = 1 group by nom_dd ) as C6 on DEP.ccdd  = C6.ccdd 
          left join (select ccdd,  count(*) as t  from acu_seccion1 a inner join acu_seccion8 s on a.id1 = s.id8  where S8_7_7 = 1 group by nom_dd ) as C7 on DEP.ccdd  = C7.ccdd 
          left join (select ccdd,  count(*) as t  from acu_seccion1 a inner join acu_seccion8 s on a.id1 = s.id8  where S8_7_8 = 1 group by nom_dd ) as C8 on DEP.ccdd  = C8.ccdd 
          left join (select ccdd,  count(*) as t  from acu_seccion1 a inner join acu_seccion8 s on a.id1 = s.id8  where S8_7_9 = 1 group by nom_dd ) as C9 on DEP.ccdd  = C9.ccdd 
          left join (select ccdd,  count(*) as t  from acu_seccion1 a inner join acu_seccion8 s on a.id1 = s.id8  where S8_7_10 = 1 group by nom_dd ) as C10 on DEP.ccdd  = C10.ccdd 
          left join (select ccdd,  count(*) as t  from acu_seccion1 a inner join acu_seccion8 s on a.id1 = s.id8  where S8_7_11 = 1 group by nom_dd ) as C11 on DEP.ccdd  = C11.ccdd 
          left join (select ccdd,  count(*) as t  from acu_seccion1 a inner join acu_seccion8 s on a.id1 = s.id8  where S8_7_12 = 1 group by nom_dd ) as C12 on DEP.ccdd  = C12.ccdd 
          left join (select ccdd,  count(*) as t  from acu_seccion1 a inner join acu_seccion8 s on a.id1 = s.id8  where S8_7_13 = 1 group by nom_dd ) as C13 on DEP.ccdd  = C13.ccdd 
          left join (select ccdd,  count(*) as t  from acu_seccion1 a inner join acu_seccion8 s on a.id1 = s.id8  where S8_7_14 = 1 group by nom_dd ) as C14 on DEP.ccdd  = C14.ccdd 
          left join (select ccdd,  count(*) as t  from acu_seccion1 a inner join acu_seccion8 s on a.id1 = s.id8  where S8_7_14 = 9 group by nom_dd ) as C15 on DEP.ccdd  = C15.ccdd  ;
        ");
      return $q;
}

function get_tabulado_171()
{
      $q = $this->db->query("
          /* TABULADO N° 171 -------------------------- LUGAR DE VENTAS -------------------------*/
          select 
          DEP.CCDD, DEPARTAMENTO,  COALESCE(C0.t ,0) AS TOTAL, 
          COALESCE(C1.t,0) as CENTRO_CULTIVO, COALESCE(C2.t,0) as FERIA, COALESCE(C3.t,0) as MERCADO, COALESCE(C4.t,0) as  NEP
          from (select  distinct(departamento), ccdd from departamentos_tab order by departamento) as DEP 
          left join (select ccdd,  count(*) as t  from acu_seccion1 a inner join acu_seccion8 s on a.id1 = s.id8  where S8_10_1 is not null group by nom_dd ) as C0 on DEP.ccdd  = C0.ccdd 
          left join (select ccdd,  count(*) as t  from acu_seccion1 a inner join acu_seccion8 s on a.id1 = s.id8  where S8_10_1 = 1 group by nom_dd ) as C1 on DEP.ccdd  = C1.ccdd 
          left join (select ccdd,  count(*) as t  from acu_seccion1 a inner join acu_seccion8 s on a.id1 = s.id8  where S8_10_2 = 1 group by nom_dd ) as C2 on DEP.ccdd  = C2.ccdd 
          left join (select ccdd,  count(*) as t  from acu_seccion1 a inner join acu_seccion8 s on a.id1 = s.id8  where S8_10_3 = 1 group by nom_dd ) as C3 on DEP.ccdd  = C3.ccdd 
          left join (select ccdd,  count(*) as t  from acu_seccion1 a inner join acu_seccion8 s on a.id1 = s.id8  where S8_10_3 = 9 group by nom_dd ) as C4 on DEP.ccdd  = C4.ccdd;
        ");
      return $q;
}

function get_tabulado_172()
{
      $q = $this->db->query("
          /* TABULADO N° 172 -------------------------- AGENTES DE COMERCIALIZACION  -------------------------*/
          select 
          DEP.CCDD, DEPARTAMENTO,  COALESCE(C0.t ,0) AS TOTAL, 
          COALESCE(C1.t,0) as INSUMOS, COALESCE(C2.t,0) as MAQUINARIAS, COALESCE(C3.t,0) as PECES, COALESCE(C4.t,0) as INFRAESTRUCTURA, COALESCE(C5.t,0) as CAPACITACION,
          COALESCE(C6.t,0) as TECNOLOGIA, COALESCE(C7.t,0) as  NEP
          from (select  distinct(departamento), ccdd from departamentos_tab order by departamento) as DEP 
          left join (select ccdd,  count(*) as t  from acu_seccion1 a inner join acu_seccion8 s on a.id1 = s.id8  where S8_11_1 is not null group by nom_dd ) as C0 on DEP.ccdd  = C0.ccdd 
          left join (select ccdd,  count(*) as t  from acu_seccion1 a inner join acu_seccion8 s on a.id1 = s.id8  where S8_11_1 = 1 group by nom_dd ) as C1 on DEP.ccdd  = C1.ccdd 
          left join (select ccdd,  count(*) as t  from acu_seccion1 a inner join acu_seccion8 s on a.id1 = s.id8  where S8_11_2 = 1 group by nom_dd ) as C2 on DEP.ccdd  = C2.ccdd 
          left join (select ccdd,  count(*) as t  from acu_seccion1 a inner join acu_seccion8 s on a.id1 = s.id8  where S8_11_3 = 1 group by nom_dd ) as C3 on DEP.ccdd  = C3.ccdd 
          left join (select ccdd,  count(*) as t  from acu_seccion1 a inner join acu_seccion8 s on a.id1 = s.id8  where S8_11_4 = 1 group by nom_dd ) as C4 on DEP.ccdd  = C4.ccdd 
          left join (select ccdd,  count(*) as t  from acu_seccion1 a inner join acu_seccion8 s on a.id1 = s.id8  where S8_11_5 = 1 group by nom_dd ) as C5 on DEP.ccdd  = C5.ccdd 
          left join (select ccdd,  count(*) as t  from acu_seccion1 a inner join acu_seccion8 s on a.id1 = s.id8  where S8_11_6 = 1 group by nom_dd ) as C6 on DEP.ccdd  = C6.ccdd 
          left join (select ccdd,  count(*) as t  from acu_seccion1 a inner join acu_seccion8 s on a.id1 = s.id8  where S8_11_6 = 9 group by nom_dd ) as C7 on DEP.ccdd  = C7.ccdd ;
        ");
      return $q;
}

function get_tabulado_173()
{
      $q = $this->db->query("
          /* TABULADO N° 173 -------------------------- TIPO PRODUCTO  -------------------------*/
          select 
          DEP.CCDD, DEPARTAMENTO,  COALESCE(C0.t ,0) AS TOTAL, 
          COALESCE(C1.t,0) as FRESCO, COALESCE(C2.t,0) as REFRIGERADO, COALESCE(C3.t,0) as CONSERVA, COALESCE(C4.t,0) as CONGELADO, COALESCE(C5.t,0) as CURADO,
          COALESCE(C6.t,0) as NEP
          from (select  distinct(departamento), ccdd from departamentos_tab order by departamento) as DEP 
          left join (select ccdd,  count(*) as t  from acu_seccion1 a inner join acu_seccion8 s on a.id1 = s.id8  where S8_12_1 is not null group by nom_dd ) as C0 on DEP.ccdd  = C0.ccdd 
          left join (select ccdd,  count(*) as t  from acu_seccion1 a inner join acu_seccion8 s on a.id1 = s.id8  where S8_12_1 = 1 group by nom_dd ) as C1 on DEP.ccdd  = C1.ccdd 
          left join (select ccdd,  count(*) as t  from acu_seccion1 a inner join acu_seccion8 s on a.id1 = s.id8  where S8_12_2 = 1 group by nom_dd ) as C2 on DEP.ccdd  = C2.ccdd 
          left join (select ccdd,  count(*) as t  from acu_seccion1 a inner join acu_seccion8 s on a.id1 = s.id8  where S8_12_3 = 1 group by nom_dd ) as C3 on DEP.ccdd  = C3.ccdd 
          left join (select ccdd,  count(*) as t  from acu_seccion1 a inner join acu_seccion8 s on a.id1 = s.id8  where S8_12_4 = 1 group by nom_dd ) as C4 on DEP.ccdd  = C4.ccdd 
          left join (select ccdd,  count(*) as t  from acu_seccion1 a inner join acu_seccion8 s on a.id1 = s.id8  where S8_12_5 = 1 group by nom_dd ) as C5 on DEP.ccdd  = C5.ccdd 
          left join (select ccdd,  count(*) as t  from acu_seccion1 a inner join acu_seccion8 s on a.id1 = s.id8  where S8_12_5 = 9 group by nom_dd ) as C6 on DEP.ccdd  = C6.ccdd ;
        ");
      return $q;
}

function get_tabulado_174()
{
      $q = $this->db->query("
          /* TABULADO N° 174 -------------------------- TIPO PRESENTACION PRODUCTO  -------------------------*/
          select 
          DEP.CCDD, DEPARTAMENTO,  COALESCE(C0.t ,0) AS TOTAL, 
          COALESCE(C1.t,0) as ENTERO, COALESCE(C2.t,0) as EVISCERADO, COALESCE(C3.t,0) as FILETE, COALESCE(C4.t,0) as COLA, COALESCE(C5.t,0) as OTRO,
          COALESCE(C6.t,0) as NEP
          from (select  distinct(departamento), ccdd from departamentos_tab order by departamento) as DEP 
          left join (select ccdd,  count(*) as t  from acu_seccion1 a inner join acu_seccion8 s on a.id1 = s.id8  where S8_13_1 is not null group by nom_dd ) as C0 on DEP.ccdd  = C0.ccdd 
          left join (select ccdd,  count(*) as t  from acu_seccion1 a inner join acu_seccion8 s on a.id1 = s.id8  where S8_13_1 = 1 group by nom_dd ) as C1 on DEP.ccdd  = C1.ccdd 
          left join (select ccdd,  count(*) as t  from acu_seccion1 a inner join acu_seccion8 s on a.id1 = s.id8  where S8_13_2 = 1 group by nom_dd ) as C2 on DEP.ccdd  = C2.ccdd 
          left join (select ccdd,  count(*) as t  from acu_seccion1 a inner join acu_seccion8 s on a.id1 = s.id8  where S8_13_3 = 1 group by nom_dd ) as C3 on DEP.ccdd  = C3.ccdd 
          left join (select ccdd,  count(*) as t  from acu_seccion1 a inner join acu_seccion8 s on a.id1 = s.id8  where S8_13_4 = 1 group by nom_dd ) as C4 on DEP.ccdd  = C4.ccdd 
          left join (select ccdd,  count(*) as t  from acu_seccion1 a inner join acu_seccion8 s on a.id1 = s.id8  where S8_13_5 = 1 group by nom_dd ) as C5 on DEP.ccdd  = C5.ccdd 
          left join (select ccdd,  count(*) as t  from acu_seccion1 a inner join acu_seccion8 s on a.id1 = s.id8  where S8_13_5 = 9 group by nom_dd ) as C6 on DEP.ccdd  = C6.ccdd ;
        ");
      return $q;
}

function get_tabulado_175()
{
      $q = $this->db->query("
          /* TABULADO N° 175 -------------------------- FORMAS DE COMERCIALIZACION  -------------------------*/
          select 
          DEP.CCDD, DEPARTAMENTO,  COALESCE(C0.t ,0) AS TOTAL, 
          COALESCE(C1.t,0) as INDIVIDUALMENTE, COALESCE(C2.t,0) as ASOCIACION, COALESCE(C3.t,0) as ORGANIZACION, COALESCE(C4.t,0) as COMITE, COALESCE(C5.t,0) as CONSORCIO,
          COALESCE(C6.t,0) as COOPERATIVA, COALESCE(C7.t,0) as  NEP
          from (select  distinct(departamento), ccdd from departamentos_tab order by departamento) as DEP 
          left join (select ccdd,  count(*) as t  from acu_seccion1 a inner join acu_seccion8 s on a.id1 = s.id8  where S8_14_1 is not null group by nom_dd ) as C0 on DEP.ccdd  = C0.ccdd 
          left join (select ccdd,  count(*) as t  from acu_seccion1 a inner join acu_seccion8 s on a.id1 = s.id8  where S8_14_1 = 1 group by nom_dd ) as C1 on DEP.ccdd  = C1.ccdd 
          left join (select ccdd,  count(*) as t  from acu_seccion1 a inner join acu_seccion8 s on a.id1 = s.id8  where S8_14_2 = 1 group by nom_dd ) as C2 on DEP.ccdd  = C2.ccdd 
          left join (select ccdd,  count(*) as t  from acu_seccion1 a inner join acu_seccion8 s on a.id1 = s.id8  where S8_14_3 = 1 group by nom_dd ) as C3 on DEP.ccdd  = C3.ccdd 
          left join (select ccdd,  count(*) as t  from acu_seccion1 a inner join acu_seccion8 s on a.id1 = s.id8  where S8_14_4 = 1 group by nom_dd ) as C4 on DEP.ccdd  = C4.ccdd 
          left join (select ccdd,  count(*) as t  from acu_seccion1 a inner join acu_seccion8 s on a.id1 = s.id8  where S8_14_5 = 1 group by nom_dd ) as C5 on DEP.ccdd  = C5.ccdd 
          left join (select ccdd,  count(*) as t  from acu_seccion1 a inner join acu_seccion8 s on a.id1 = s.id8  where S8_14_6 = 1 group by nom_dd ) as C6 on DEP.ccdd  = C6.ccdd 
          left join (select ccdd,  count(*) as t  from acu_seccion1 a inner join acu_seccion8 s on a.id1 = s.id8  where S8_14_6 = 9 group by nom_dd ) as C7 on DEP.ccdd  = C7.ccdd ;
        ");
      return $q;
}

function get_tabulado_176()
{
      $q = $this->db->query("
          /* TABULADO N° 176 -------------------------- PROMEDIO MENSUAL  -------------------------*/
          select 
          DEP.CCDD, DEPARTAMENTO,  COALESCE(C0.t ,0) AS TOTAL, 
          COALESCE(C1.t,0) as HASTA_2000, COALESCE(C2.t,0) as 2001_HASTA_5000, COALESCE(C3.t,0) as 5001_HASTA_10000, COALESCE(C4.t,0) as 10001_HASTA_20000, COALESCE(C5.t,0) as MAS_20000,
          COALESCE(C6.t,0) as NEP
          from (select  distinct(departamento), ccdd from departamentos_tab order by departamento) as DEP 
          left join (select ccdd,  count(*) as t  from acu_seccion1 a inner join acu_seccion8 s on a.id1 = s.id8  where S8_15 is not null group by nom_dd ) as C0 on DEP.ccdd  = C0.ccdd 
          left join (select ccdd,  count(*) as t  from acu_seccion1 a inner join acu_seccion8 s on a.id1 = s.id8  where S8_15 = 1 group by nom_dd ) as C1 on DEP.ccdd  = C1.ccdd 
          left join (select ccdd,  count(*) as t  from acu_seccion1 a inner join acu_seccion8 s on a.id1 = s.id8  where S8_15 = 2 group by nom_dd ) as C2 on DEP.ccdd  = C2.ccdd 
          left join (select ccdd,  count(*) as t  from acu_seccion1 a inner join acu_seccion8 s on a.id1 = s.id8  where S8_15 = 3 group by nom_dd ) as C3 on DEP.ccdd  = C3.ccdd 
          left join (select ccdd,  count(*) as t  from acu_seccion1 a inner join acu_seccion8 s on a.id1 = s.id8  where S8_15 = 4 group by nom_dd ) as C4 on DEP.ccdd  = C4.ccdd 
          left join (select ccdd,  count(*) as t  from acu_seccion1 a inner join acu_seccion8 s on a.id1 = s.id8  where S8_15 = 5 group by nom_dd ) as C5 on DEP.ccdd  = C5.ccdd 
          left join (select ccdd,  count(*) as t  from acu_seccion1 a inner join acu_seccion8 s on a.id1 = s.id8  where S8_15 = 9 group by nom_dd ) as C6 on DEP.ccdd  = C6.ccdd ;
        ");
      return $q;
}

function get_tabulado_177()
{
      $q = $this->db->query("
          /* TABULADO N° 177 ---------  CONOCE SEGURO SALUD -----------------*/
          select 
          DEP.CCDD, DEPARTAMENTO,  COALESCE(C0.t ,0) AS TOTAL,  
          COALESCE(C1.t,0) as SI, COALESCE(C2.t,0) as 'NO',  COALESCE(C3.t,0) NEP
          from (select  distinct(departamento), ccdd from departamentos_tab order by departamento) as DEP 
          left join (select ccdd,  count(*) as t  from acu_seccion1 a inner join acu_seccion9 s on a.id1 = s.id9  where s9_1 is not null group by nom_dd ) as C0 on DEP.ccdd  = C0.ccdd 
          left join (select ccdd,  count(*) as t  from acu_seccion1 a inner join acu_seccion9 s on a.id1 = s.id9  where s9_1 = 1 group by nom_dd ) as C1 on DEP.ccdd  = C1.ccdd 
          left join (select ccdd,  count(*) as t  from acu_seccion1 a inner join acu_seccion9 s on a.id1 = s.id9  where s9_1 = 2 group by nom_dd ) as C2 on DEP.ccdd  = C2.ccdd 
          left join (select ccdd,  count(*) as t  from acu_seccion1 a inner join acu_seccion9 s on a.id1 = s.id9  where s9_1 = 9 group by nom_dd ) as C3 on DEP.ccdd  = C3.ccdd ;
        ");
      return $q;
}

function get_tabulado_178()
{
      $q = $this->db->query("
          /* TABULADO N° 178 -------------------------- CUALES CONOCE -------------------------*/
          select 
          DEP.CCDD, DEPARTAMENTO,  COALESCE(C0.t ,0) AS TOTAL, 
          COALESCE(C1.t,0) as ESSALUD, COALESCE(C2.t,0) as SIS, COALESCE(C3.t,0) as EPS, COALESCE(C4.t,0) as OTRO, COALESCE(C5.t,0) as  NEP
          from (select  distinct(departamento), ccdd from departamentos_tab order by departamento) as DEP 
          left join (select ccdd,  count(*) as t  from acu_seccion1 a inner join acu_seccion9 s on a.id1 = s.id9  where S9_2_1 is not null group by nom_dd ) as C0 on DEP.ccdd  = C0.ccdd 
          left join (select ccdd,  count(*) as t  from acu_seccion1 a inner join acu_seccion9 s on a.id1 = s.id9  where S9_2_1 = 1 group by nom_dd ) as C1 on DEP.ccdd  = C1.ccdd 
          left join (select ccdd,  count(*) as t  from acu_seccion1 a inner join acu_seccion9 s on a.id1 = s.id9  where S9_2_2 = 1 group by nom_dd ) as C2 on DEP.ccdd  = C2.ccdd 
          left join (select ccdd,  count(*) as t  from acu_seccion1 a inner join acu_seccion9 s on a.id1 = s.id9  where S9_2_3 = 1 group by nom_dd ) as C3 on DEP.ccdd  = C3.ccdd 
          left join (select ccdd,  count(*) as t  from acu_seccion1 a inner join acu_seccion9 s on a.id1 = s.id9  where S9_2_4 = 1 group by nom_dd ) as C4 on DEP.ccdd  = C4.ccdd 
          left join (select ccdd,  count(*) as t  from acu_seccion1 a inner join acu_seccion9 s on a.id1 = s.id9  where S9_2_4 = 9 group by nom_dd ) as C5 on DEP.ccdd  = C5.ccdd;
        ");
      return $q;
}

function get_tabulado_179()
{
      $q = $this->db->query("
          /* TABULADO N° 179 ---------  AFILIADO A ESSALUD -----------------*/
          select 
          DEP.CCDD, DEPARTAMENTO,  COALESCE(C0.t ,0) AS TOTAL,  
          COALESCE(C1.t,0) as SI, COALESCE(C2.t,0) as 'NO',  COALESCE(C3.t,0) NEP
          from (select  distinct(departamento), ccdd from departamentos_tab order by departamento) as DEP 
          left join (select ccdd,  count(*) as t  from acu_seccion1 a inner join acu_seccion9 s on a.id1 = s.id9  where S9_2_1 =1 group by nom_dd ) as C0 on DEP.ccdd  = C0.ccdd 
          left join (select ccdd,  count(*) as t  from acu_seccion1 a inner join acu_seccion9 s on a.id1 = s.id9  where S9_2_1_a = 1 group by nom_dd ) as C1 on DEP.ccdd  = C1.ccdd 
          left join (select ccdd,  count(*) as t  from acu_seccion1 a inner join acu_seccion9 s on a.id1 = s.id9  where S9_2_1_a = 2 group by nom_dd ) as C2 on DEP.ccdd  = C2.ccdd 
          left join (select ccdd,  count(*) as t  from acu_seccion1 a inner join acu_seccion9 s on a.id1 = s.id9  where S9_2_1_a = 9 group by nom_dd ) as C3 on DEP.ccdd  = C3.ccdd ;
        ");
      return $q;
}

function get_tabulado_180()
{
      $q = $this->db->query("
          /* TABULADO N° 180 ---------  AFILIADO A SIS -----------------*/
          select 
          DEP.CCDD, DEPARTAMENTO,  COALESCE(C0.t ,0) AS TOTAL,  
          COALESCE(C1.t,0) as SI, COALESCE(C2.t,0) as 'NO',  COALESCE(C3.t,0) NEP
          from (select  distinct(departamento), ccdd from departamentos_tab order by departamento) as DEP 
          left join (select ccdd,  count(*) as t  from acu_seccion1 a inner join acu_seccion9 s on a.id1 = s.id9  where S9_2_2 =1 group by nom_dd ) as C0 on DEP.ccdd  = C0.ccdd 
          left join (select ccdd,  count(*) as t  from acu_seccion1 a inner join acu_seccion9 s on a.id1 = s.id9  where S9_2_2_a = 1 group by nom_dd ) as C1 on DEP.ccdd  = C1.ccdd 
          left join (select ccdd,  count(*) as t  from acu_seccion1 a inner join acu_seccion9 s on a.id1 = s.id9  where S9_2_2_a = 2 group by nom_dd ) as C2 on DEP.ccdd  = C2.ccdd 
          left join (select ccdd,  count(*) as t  from acu_seccion1 a inner join acu_seccion9 s on a.id1 = s.id9  where S9_2_2_a = 9 group by nom_dd ) as C3 on DEP.ccdd  = C3.ccdd ;
        ");
      return $q;
}

function get_tabulado_181()
{
      $q = $this->db->query("
          /* TABULADO N° 181 ---------  AFILIADO A EPS  -----------------*/
          select 
          DEP.CCDD, DEPARTAMENTO,  COALESCE(C0.t ,0) AS TOTAL,  
          COALESCE(C1.t,0) as SI, COALESCE(C2.t,0) as 'NO',  COALESCE(C3.t,0) NEP
          from (select  distinct(departamento), ccdd from departamentos_tab order by departamento) as DEP 
          left join (select ccdd,  count(*) as t  from acu_seccion1 a inner join acu_seccion9 s on a.id1 = s.id9  where S9_2_3 =1 group by nom_dd ) as C0 on DEP.ccdd  = C0.ccdd 
          left join (select ccdd,  count(*) as t  from acu_seccion1 a inner join acu_seccion9 s on a.id1 = s.id9  where S9_2_3_a = 1 group by nom_dd ) as C1 on DEP.ccdd  = C1.ccdd 
          left join (select ccdd,  count(*) as t  from acu_seccion1 a inner join acu_seccion9 s on a.id1 = s.id9  where S9_2_3_a = 2 group by nom_dd ) as C2 on DEP.ccdd  = C2.ccdd 
          left join (select ccdd,  count(*) as t  from acu_seccion1 a inner join acu_seccion9 s on a.id1 = s.id9  where S9_2_3_a = 9 group by nom_dd ) as C3 on DEP.ccdd  = C3.ccdd ;
        ");
      return $q;
}

function get_tabulado_182()
{
      $q = $this->db->query("
          /* TABULADO N° 182 -------------------------- CONOCE SEGURO -------------------------*/
          select 
          DEP.CCDD, DEPARTAMENTO,  COALESCE(C0.t ,0) AS TOTAL, 
          COALESCE(C1.t,0) as VIDA, COALESCE(C2.t,0) as PENSIONES, COALESCE(C3.t,0) as NO_ESTA, COALESCE(C4.t,0) as  NEP
          from (select  distinct(departamento), ccdd from departamentos_tab order by departamento) as DEP 
          left join (select ccdd,  count(*) as t  from acu_seccion1 a inner join acu_seccion9 s on a.id1 = s.id9  where S9_3_1 is not null group by nom_dd ) as C0 on DEP.ccdd  = C0.ccdd 
          left join (select ccdd,  count(*) as t  from acu_seccion1 a inner join acu_seccion9 s on a.id1 = s.id9  where S9_3_1 = 1 group by nom_dd ) as C1 on DEP.ccdd  = C1.ccdd 
          left join (select ccdd,  count(*) as t  from acu_seccion1 a inner join acu_seccion9 s on a.id1 = s.id9  where S9_3_2 = 1 group by nom_dd ) as C2 on DEP.ccdd  = C2.ccdd 
          left join (select ccdd,  count(*) as t  from acu_seccion1 a inner join acu_seccion9 s on a.id1 = s.id9  where S9_3_3 = 1 group by nom_dd ) as C3 on DEP.ccdd  = C3.ccdd 
          left join (select ccdd,  count(*) as t  from acu_seccion1 a inner join acu_seccion9 s on a.id1 = s.id9  where S9_3_3 = 9 group by nom_dd ) as C4 on DEP.ccdd  = C4.ccdd ;
        ");
      return $q;
}

function get_tabulado_183()
{
      $q = $this->db->query("
          /* TABULADO N° 183  -------------------------- EN 12 MESE ENFERMEDAD -------------------------*/
          select 
          DEP.CCDD, DEPARTAMENTO,  COALESCE(C0.t ,0) AS TOTAL,  
          COALESCE(C1.t,0) as SI, COALESCE(C2.t,0) as 'NO',  COALESCE(C3.t,0) NEP
          from (select  distinct(departamento), ccdd from departamentos_tab order by departamento) as DEP 
          left join (select ccdd,  count(*) as t  from acu_seccion1 a inner join acu_seccion9 s on a.id1 = s.id9  where S9_4_1 is not null group by nom_dd ) as C0 on DEP.ccdd  = C0.ccdd 
          left join (select ccdd,  count(*) as t  from acu_seccion1 a inner join acu_seccion9 s on a.id1 = s.id9  where S9_4_1 = 1 group by nom_dd ) as C1 on DEP.ccdd  = C1.ccdd 
          left join (select ccdd,  count(*) as t  from acu_seccion1 a inner join acu_seccion9 s on a.id1 = s.id9  where S9_4_1 = 2 group by nom_dd ) as C2 on DEP.ccdd  = C2.ccdd 
          left join (select ccdd,  count(*) as t  from acu_seccion1 a inner join acu_seccion9 s on a.id1 = s.id9  where S9_4_1 = 9 group by nom_dd ) as C3 on DEP.ccdd  = C3.ccdd ;
        ");
      return $q;
}

function get_tabulado_184()
{
      $q = $this->db->query("
          /* TABULADO N° 184  -------------------------- EN 12 MESE ACCIDENTE -------------------------*/
          select 
          DEP.CCDD, DEPARTAMENTO,  COALESCE(C0.t ,0) AS TOTAL,  
          COALESCE(C1.t,0) as SI, COALESCE(C2.t,0) as 'NO',  COALESCE(C3.t,0) NEP
          from (select  distinct(departamento), ccdd from departamentos_tab order by departamento) as DEP 
          left join (select ccdd,  count(*) as t  from acu_seccion1 a inner join acu_seccion9 s on a.id1 = s.id9  where S9_5_1 is not null group by nom_dd ) as C0 on DEP.ccdd  = C0.ccdd 
          left join (select ccdd,  count(*) as t  from acu_seccion1 a inner join acu_seccion9 s on a.id1 = s.id9  where S9_5_1 = 1 group by nom_dd ) as C1 on DEP.ccdd  = C1.ccdd 
          left join (select ccdd,  count(*) as t  from acu_seccion1 a inner join acu_seccion9 s on a.id1 = s.id9  where S9_5_1 = 2 group by nom_dd ) as C2 on DEP.ccdd  = C2.ccdd 
          left join (select ccdd,  count(*) as t  from acu_seccion1 a inner join acu_seccion9 s on a.id1 = s.id9  where S9_5_1 = 9 group by nom_dd ) as C3 on DEP.ccdd  = C3.ccdd ;
        ");
      return $q;
}

function get_tabulado_185()
{
      $q = $this->db->query("
          /* TABULADO N° 185 --------------------------  DIFICULTADES O LIMITACIONES   -------------------------*/
          select 
          DEP.CCDD, DEPARTAMENTO,  COALESCE(C0.t ,0) AS TOTAL, 
          COALESCE(C1.t,0) as VER, COALESCE(C2.t,0) as OIR, COALESCE(C3.t,0) as HABLAR, COALESCE(C4.t,0) as MANOS_PIES, COALESCE(C5.t,0) as OTRA,
          COALESCE(C6.t,0) as NINGUNA, COALESCE(C7.t,0) as  NEP
          from (select  distinct(departamento), ccdd from departamentos_tab order by departamento) as DEP 
          left join (select ccdd,  count(*) as t  from acu_seccion1 a inner join acu_seccion9 s on a.id1 = s.id9  where S9_6_1 is not null group by nom_dd ) as C0 on DEP.ccdd  = C0.ccdd 
          left join (select ccdd,  count(*) as t  from acu_seccion1 a inner join acu_seccion9 s on a.id1 = s.id9  where S9_6_1 = 1 group by nom_dd ) as C1 on DEP.ccdd  = C1.ccdd 
          left join (select ccdd,  count(*) as t  from acu_seccion1 a inner join acu_seccion9 s on a.id1 = s.id9  where S9_6_2 = 1 group by nom_dd ) as C2 on DEP.ccdd  = C2.ccdd 
          left join (select ccdd,  count(*) as t  from acu_seccion1 a inner join acu_seccion9 s on a.id1 = s.id9  where S9_6_3 = 1 group by nom_dd ) as C3 on DEP.ccdd  = C3.ccdd 
          left join (select ccdd,  count(*) as t  from acu_seccion1 a inner join acu_seccion9 s on a.id1 = s.id9  where S9_6_4 = 1 group by nom_dd ) as C4 on DEP.ccdd  = C4.ccdd 
          left join (select ccdd,  count(*) as t  from acu_seccion1 a inner join acu_seccion9 s on a.id1 = s.id9  where S9_6_5 = 1 group by nom_dd ) as C5 on DEP.ccdd  = C5.ccdd 
          left join (select ccdd,  count(*) as t  from acu_seccion1 a inner join acu_seccion9 s on a.id1 = s.id9  where S9_6_6 = 1 group by nom_dd ) as C6 on DEP.ccdd  = C6.ccdd 
          left join (select ccdd,  count(*) as t  from acu_seccion1 a inner join acu_seccion9 s on a.id1 = s.id9  where S9_6_6 = 9 group by nom_dd ) as C7 on DEP.ccdd  = C7.ccdd ;
        ");
      return $q;
}

function get_tabulado_186()
{
      $q = $this->db->query("
          /* TABULADO N° 186  -------------------------- CONOCE TEMAS ACUICULOS -------------------------*/
          select 
          DEP.CCDD, DEPARTAMENTO,  COALESCE(C0.t ,0) AS TOTAL, 
          COALESCE(C1.t,0) as NORMATIVIDAD, COALESCE(C2.t,0) as SANITARIAS, COALESCE(C3.t,0) as TECNOLOGIA, COALESCE(C4.t,0) as AMBIENTAL, COALESCE(C5.t,0) as PRODUCCION,
          COALESCE(C6.t,0) as RESIDUOS, COALESCE(C7.t,0) as FORMALIZACION, COALESCE(C8.t,0) as COMERCIALIZACION, COALESCE(C9.t,0) GESTION, COALESCE(C10.t,0) BIOCOMERCIO, 
          COALESCE(C11.t,0) NO_CONOCE, COALESCE(C12.t,0)  NEP
          from (select  distinct(departamento), ccdd from departamentos_tab order by departamento) as DEP 
          left join (select ccdd,  count(*) as t  from acu_seccion1 a inner join acu_seccion10 s on a.id1 = s.id10  where S10_1_1 is not null group by nom_dd ) as C0 on DEP.ccdd  = C0.ccdd 
          left join (select ccdd,  count(*) as t  from acu_seccion1 a inner join acu_seccion10 s on a.id1 = s.id10  where S10_1_1 = 1 group by nom_dd ) as C1 on DEP.ccdd  = C1.ccdd 
          left join (select ccdd,  count(*) as t  from acu_seccion1 a inner join acu_seccion10 s on a.id1 = s.id10  where S10_1_2 = 1 group by nom_dd ) as C2 on DEP.ccdd  = C2.ccdd 
          left join (select ccdd,  count(*) as t  from acu_seccion1 a inner join acu_seccion10 s on a.id1 = s.id10  where S10_1_3 = 1 group by nom_dd ) as C3 on DEP.ccdd  = C3.ccdd 
          left join (select ccdd,  count(*) as t  from acu_seccion1 a inner join acu_seccion10 s on a.id1 = s.id10  where S10_1_4 = 1 group by nom_dd ) as C4 on DEP.ccdd  = C4.ccdd 
          left join (select ccdd,  count(*) as t  from acu_seccion1 a inner join acu_seccion10 s on a.id1 = s.id10  where S10_1_5 = 1 group by nom_dd ) as C5 on DEP.ccdd  = C5.ccdd 
          left join (select ccdd,  count(*) as t  from acu_seccion1 a inner join acu_seccion10 s on a.id1 = s.id10  where S10_1_6 = 1 group by nom_dd ) as C6 on DEP.ccdd  = C6.ccdd 
          left join (select ccdd,  count(*) as t  from acu_seccion1 a inner join acu_seccion10 s on a.id1 = s.id10  where S10_1_7 = 1 group by nom_dd ) as C7 on DEP.ccdd  = C7.ccdd 
          left join (select ccdd,  count(*) as t  from acu_seccion1 a inner join acu_seccion10 s on a.id1 = s.id10  where S10_1_8 = 1 group by nom_dd ) as C8 on DEP.ccdd  = C8.ccdd 
          left join (select ccdd,  count(*) as t  from acu_seccion1 a inner join acu_seccion10 s on a.id1 = s.id10  where S10_1_9 = 1 group by nom_dd ) as C9 on DEP.ccdd  = C9.ccdd 
          left join (select ccdd,  count(*) as t  from acu_seccion1 a inner join acu_seccion10 s on a.id1 = s.id10  where S10_1_10 = 1 group by nom_dd ) as C10 on DEP.ccdd  = C10.ccdd 
          left join (select ccdd,  count(*) as t  from acu_seccion1 a inner join acu_seccion10 s on a.id1 = s.id10  where S10_1_11 = 1 group by nom_dd ) as C11 on DEP.ccdd  = C11.ccdd 
          left join (select ccdd,  count(*) as t  from acu_seccion1 a inner join acu_seccion10 s on a.id1 = s.id10  where S10_1_11 = 9 group by nom_dd ) as C12 on DEP.ccdd  = C12.ccdd;
        ");
      return $q;
}

function get_tabulado_187()
{
      $q = $this->db->query("
          /* TABULADO N° 187  -------------------------- RECIBIO CAPACITACION  -------------------------*/
          select 
          DEP.CCDD, DEPARTAMENTO,  COALESCE(C0.t ,0) AS TOTAL,  
          COALESCE(C1.t,0) as SI, COALESCE(C2.t,0) as 'NO',  COALESCE(C3.t,0) NEP
          from (select  distinct(departamento), ccdd from departamentos_tab order by departamento) as DEP 
          left join (select ccdd,  count(*) as t  from acu_seccion1 a inner join acu_seccion10 s on a.id1 = s.id10  where S10_2  is not null group by  nom_dd ) as C0 on DEP.ccdd  = C0.ccdd 
          left join (select ccdd,  count(*) as t  from acu_seccion1 a inner join acu_seccion10 s on a.id1 = s.id10  where S10_2 = 1 group by nom_dd ) as C1 on DEP.ccdd  = C1.ccdd 
          left join (select ccdd,  count(*) as t  from acu_seccion1 a inner join acu_seccion10 s on a.id1 = s.id10  where S10_2 = 2 group by nom_dd ) as C2 on DEP.ccdd  = C2.ccdd 
          left join (select ccdd,  count(*) as t  from acu_seccion1 a inner join acu_seccion10 s on a.id1 = s.id10  where S10_2 = 9 group by nom_dd ) as C3 on DEP.ccdd  = C3.ccdd ;
        ");
      return $q;
}

function get_tabulado_188()
{
      $q = $this->db->query("
          /* TABULADO N° 188  -------------------------- QUIEN BRINDO CAPACITACION -------------------------*/
          select 
          DEP.CCDD, DEPARTAMENTO,  COALESCE(C0.t ,0) AS TOTAL, 
          COALESCE(C1.t,0) as PRODUCE, COALESCE(C2.t,0) as FONDEPES, COALESCE(C3.t,0) as IIAP, COALESCE(C4.t,0) as MINAM, COALESCE(C5.t,0) as SANIPES,
          COALESCE(C6.t,0) as IMARPE, COALESCE(C7.t,0) as DIREPRO, COALESCE(C8.t,0) as GB, COALESCE(C9.t,0) ONG, COALESCE(C10.t,0) OTRO, 
          COALESCE(C11.t,0) NEP
          from (select  distinct(departamento), ccdd from departamentos_tab order by departamento) as DEP 
          left join (select ccdd,  count(*) as t  from acu_seccion1 a inner join acu_seccion10 s on a.id1 = s.id10  where S10_3_1 is not null group by nom_dd ) as C0 on DEP.ccdd  = C0.ccdd 
          left join (select ccdd,  count(*) as t  from acu_seccion1 a inner join acu_seccion10 s on a.id1 = s.id10  where S10_3_1 = 1 group by nom_dd ) as C1 on DEP.ccdd  = C1.ccdd 
          left join (select ccdd,  count(*) as t  from acu_seccion1 a inner join acu_seccion10 s on a.id1 = s.id10  where S10_3_2 = 1 group by nom_dd ) as C2 on DEP.ccdd  = C2.ccdd 
          left join (select ccdd,  count(*) as t  from acu_seccion1 a inner join acu_seccion10 s on a.id1 = s.id10  where S10_3_3 = 1 group by nom_dd ) as C3 on DEP.ccdd  = C3.ccdd 
          left join (select ccdd,  count(*) as t  from acu_seccion1 a inner join acu_seccion10 s on a.id1 = s.id10  where S10_3_4 = 1 group by nom_dd ) as C4 on DEP.ccdd  = C4.ccdd 
          left join (select ccdd,  count(*) as t  from acu_seccion1 a inner join acu_seccion10 s on a.id1 = s.id10  where S10_3_5 = 1 group by nom_dd ) as C5 on DEP.ccdd  = C5.ccdd 
          left join (select ccdd,  count(*) as t  from acu_seccion1 a inner join acu_seccion10 s on a.id1 = s.id10  where S10_3_6 = 1 group by nom_dd ) as C6 on DEP.ccdd  = C6.ccdd 
          left join (select ccdd,  count(*) as t  from acu_seccion1 a inner join acu_seccion10 s on a.id1 = s.id10  where S10_3_7 = 1 group by nom_dd ) as C7 on DEP.ccdd  = C7.ccdd 
          left join (select ccdd,  count(*) as t  from acu_seccion1 a inner join acu_seccion10 s on a.id1 = s.id10  where S10_3_8 = 1 group by nom_dd ) as C8 on DEP.ccdd  = C8.ccdd 
          left join (select ccdd,  count(*) as t  from acu_seccion1 a inner join acu_seccion10 s on a.id1 = s.id10  where S10_3_9 = 1 group by nom_dd ) as C9 on DEP.ccdd  = C9.ccdd 
          left join (select ccdd,  count(*) as t  from acu_seccion1 a inner join acu_seccion10 s on a.id1 = s.id10  where S10_3_10 = 1 group by nom_dd ) as C10 on DEP.ccdd  = C10.ccdd 
          left join (select ccdd,  count(*) as t  from acu_seccion1 a inner join acu_seccion10 s on a.id1 = s.id10  where S10_3_10 = 9 group by nom_dd ) as C11 on DEP.ccdd  = C11.ccdd ;
        ");
      return $q;
}

function get_tabulado_189()
{
      $q = $this->db->query("
          /* TABULADO N° 189  -------------------------- QUE TEMAS SE CAPACITO -------------------------*/
          select 
          DEP.CCDD, DEPARTAMENTO,  COALESCE(C0.t ,0) AS TOTAL, 
          COALESCE(C1.t,0) as NORMATIVIDAD, COALESCE(C2.t,0) as SANITARIAS, COALESCE(C3.t,0) as TECNOLOGIA, COALESCE(C4.t,0) as AMBIENTAL, COALESCE(C5.t,0) as PRODUCCION,
          COALESCE(C6.t,0) as RESIDUOS, COALESCE(C7.t,0) as FORMALIZACION, COALESCE(C8.t,0) as COMERCIALIZACION, COALESCE(C9.t,0) GESTION, COALESCE(C10.t,0) BIOCOMERCIO, 
          COALESCE(C11.t,0) NO_CONOCE, COALESCE(C12.t,0)  NEP
          from (select  distinct(departamento), ccdd from departamentos_tab order by departamento) as DEP 
          left join (select ccdd,  count(*) as t  from acu_seccion1 a inner join acu_seccion10 s on a.id1 = s.id10  where S10_4_1 is not null group by nom_dd ) as C0 on DEP.ccdd  = C0.ccdd 
          left join (select ccdd,  count(*) as t  from acu_seccion1 a inner join acu_seccion10 s on a.id1 = s.id10  where S10_4_1 = 1 group by nom_dd ) as C1 on DEP.ccdd  = C1.ccdd 
          left join (select ccdd,  count(*) as t  from acu_seccion1 a inner join acu_seccion10 s on a.id1 = s.id10  where S10_4_2 = 1 group by nom_dd ) as C2 on DEP.ccdd  = C2.ccdd 
          left join (select ccdd,  count(*) as t  from acu_seccion1 a inner join acu_seccion10 s on a.id1 = s.id10  where S10_4_3 = 1 group by nom_dd ) as C3 on DEP.ccdd  = C3.ccdd 
          left join (select ccdd,  count(*) as t  from acu_seccion1 a inner join acu_seccion10 s on a.id1 = s.id10  where S10_4_4 = 1 group by nom_dd ) as C4 on DEP.ccdd  = C4.ccdd 
          left join (select ccdd,  count(*) as t  from acu_seccion1 a inner join acu_seccion10 s on a.id1 = s.id10  where S10_4_5 = 1 group by nom_dd ) as C5 on DEP.ccdd  = C5.ccdd 
          left join (select ccdd,  count(*) as t  from acu_seccion1 a inner join acu_seccion10 s on a.id1 = s.id10  where S10_4_6 = 1 group by nom_dd ) as C6 on DEP.ccdd  = C6.ccdd 
          left join (select ccdd,  count(*) as t  from acu_seccion1 a inner join acu_seccion10 s on a.id1 = s.id10  where S10_4_7 = 1 group by nom_dd ) as C7 on DEP.ccdd  = C7.ccdd 
          left join (select ccdd,  count(*) as t  from acu_seccion1 a inner join acu_seccion10 s on a.id1 = s.id10  where S10_4_8 = 1 group by nom_dd ) as C8 on DEP.ccdd  = C8.ccdd 
          left join (select ccdd,  count(*) as t  from acu_seccion1 a inner join acu_seccion10 s on a.id1 = s.id10  where S10_4_9 = 1 group by nom_dd ) as C9 on DEP.ccdd  = C9.ccdd 
          left join (select ccdd,  count(*) as t  from acu_seccion1 a inner join acu_seccion10 s on a.id1 = s.id10  where S10_4_10 = 1 group by nom_dd ) as C10 on DEP.ccdd  = C10.ccdd 
          left join (select ccdd,  count(*) as t  from acu_seccion1 a inner join acu_seccion10 s on a.id1 = s.id10  where S10_4_11 = 1 group by nom_dd ) as C11 on DEP.ccdd  = C11.ccdd 
          left join (select ccdd,  count(*) as t  from acu_seccion1 a inner join acu_seccion10 s on a.id1 = s.id10  where S10_4_11 = 9 group by nom_dd ) as C12 on DEP.ccdd  = C12.ccdd;
        ");
      return $q;
}

function get_tabulado_190()
{
      $q = $this->db->query("
          /* TABULADO N° 190  -------------------------- RECIBIO ASITENCIA TECNICA  -------------------------*/
          select 
          DEP.CCDD, DEPARTAMENTO,  COALESCE(C0.t ,0) AS TOTAL,  
          COALESCE(C1.t,0) as SI, COALESCE(C2.t,0) as 'NO',  COALESCE(C3.t,0) NEP
          from (select  distinct(departamento), ccdd from departamentos_tab order by departamento) as DEP 
          left join (select ccdd,  count(*) as t  from acu_seccion1 a inner join acu_seccion10 s on a.id1 = s.id10  where S10_6  is not null group by  nom_dd ) as C0 on DEP.ccdd  = C0.ccdd 
          left join (select ccdd,  count(*) as t  from acu_seccion1 a inner join acu_seccion10 s on a.id1 = s.id10  where S10_6 = 1 group by nom_dd ) as C1 on DEP.ccdd  = C1.ccdd 
          left join (select ccdd,  count(*) as t  from acu_seccion1 a inner join acu_seccion10 s on a.id1 = s.id10  where S10_6 = 2 group by nom_dd ) as C2 on DEP.ccdd  = C2.ccdd 
          left join (select ccdd,  count(*) as t  from acu_seccion1 a inner join acu_seccion10 s on a.id1 = s.id10  where S10_6 = 9 group by nom_dd ) as C3 on DEP.ccdd  = C3.ccdd ;
        ");
      return $q;
}

function get_tabulado_191()
{
      $q = $this->db->query("
          /* TABULADO N° 191  -------------------------- QUE TIPO DE ASISTENCIA -------------------------*/
          select 
          DEP.CCDD, DEPARTAMENTO,  COALESCE(C0.t ,0) AS TOTAL, 
          COALESCE(C1.t,0) as SANIDAD, COALESCE(C2.t,0) as FINANCIERO, COALESCE(C3.t,0) as PRODUCTOS, COALESCE(C4.t,0) as PROCESOS, COALESCE(C5.t,0) as ASOCIATIVIDAD,
          COALESCE(C6.t,0) as FORMALIZACION, COALESCE(C7.t,0) as COMERCIALIZACION, COALESCE(C8.t,0) as OTRO, COALESCE(C9.t,0)  NEP
          from (select  distinct(departamento), ccdd from departamentos_tab order by departamento) as DEP 
          left join (select ccdd,  count(*) as t  from acu_seccion1 a inner join acu_seccion10 s on a.id1 = s.id10  where S10_7_1 is not null group by nom_dd ) as C0 on DEP.ccdd  = C0.ccdd 
          left join (select ccdd,  count(*) as t  from acu_seccion1 a inner join acu_seccion10 s on a.id1 = s.id10  where S10_7_1 = 1 group by nom_dd ) as C1 on DEP.ccdd  = C1.ccdd 
          left join (select ccdd,  count(*) as t  from acu_seccion1 a inner join acu_seccion10 s on a.id1 = s.id10  where S10_7_2 = 1 group by nom_dd ) as C2 on DEP.ccdd  = C2.ccdd 
          left join (select ccdd,  count(*) as t  from acu_seccion1 a inner join acu_seccion10 s on a.id1 = s.id10  where S10_7_3 = 1 group by nom_dd ) as C3 on DEP.ccdd  = C3.ccdd 
          left join (select ccdd,  count(*) as t  from acu_seccion1 a inner join acu_seccion10 s on a.id1 = s.id10  where S10_7_4 = 1 group by nom_dd ) as C4 on DEP.ccdd  = C4.ccdd 
          left join (select ccdd,  count(*) as t  from acu_seccion1 a inner join acu_seccion10 s on a.id1 = s.id10  where S10_7_5 = 1 group by nom_dd ) as C5 on DEP.ccdd  = C5.ccdd 
          left join (select ccdd,  count(*) as t  from acu_seccion1 a inner join acu_seccion10 s on a.id1 = s.id10  where S10_7_6 = 1 group by nom_dd ) as C6 on DEP.ccdd  = C6.ccdd 
          left join (select ccdd,  count(*) as t  from acu_seccion1 a inner join acu_seccion10 s on a.id1 = s.id10  where S10_7_7 = 1 group by nom_dd ) as C7 on DEP.ccdd  = C7.ccdd 
          left join (select ccdd,  count(*) as t  from acu_seccion1 a inner join acu_seccion10 s on a.id1 = s.id10  where S10_7_8 = 1 group by nom_dd ) as C8 on DEP.ccdd  = C8.ccdd 
          left join (select ccdd,  count(*) as t  from acu_seccion1 a inner join acu_seccion10 s on a.id1 = s.id10  where S10_7_8 = 9 group by nom_dd ) as C9 on DEP.ccdd  = C9.ccdd ;
        ");
      return $q;
}

function get_tabulado_192()
{
      $q = $this->db->query("
          /* TABULADO N° 192  -------------------------- QUIEN BRINDO CAPACITACION -------------------------*/
          select 
          DEP.CCDD, DEPARTAMENTO,  COALESCE(C0.t ,0) AS TOTAL, 
          COALESCE(C1.t,0) as PRODUCE, COALESCE(C2.t,0) as FONDEPES, COALESCE(C3.t,0) as IIAP, COALESCE(C4.t,0) as MINAM, COALESCE(C5.t,0) as SANIPES,
          COALESCE(C6.t,0) as IMARPE, COALESCE(C7.t,0) as DIREPRO, COALESCE(C8.t,0) as GB, COALESCE(C9.t,0) ONG, COALESCE(C10.t,0) OTRO, 
          COALESCE(C11.t,0) NEP
          from (select  distinct(departamento), ccdd from departamentos_tab order by departamento) as DEP 
          left join (select ccdd,  count(*) as t  from acu_seccion1 a inner join acu_seccion10 s on a.id1 = s.id10  where S10_8_1 is not null group by nom_dd ) as C0 on DEP.ccdd  = C0.ccdd 
          left join (select ccdd,  count(*) as t  from acu_seccion1 a inner join acu_seccion10 s on a.id1 = s.id10  where S10_8_1 = 1 group by nom_dd ) as C1 on DEP.ccdd  = C1.ccdd 
          left join (select ccdd,  count(*) as t  from acu_seccion1 a inner join acu_seccion10 s on a.id1 = s.id10  where S10_8_2 = 1 group by nom_dd ) as C2 on DEP.ccdd  = C2.ccdd 
          left join (select ccdd,  count(*) as t  from acu_seccion1 a inner join acu_seccion10 s on a.id1 = s.id10  where S10_8_3 = 1 group by nom_dd ) as C3 on DEP.ccdd  = C3.ccdd 
          left join (select ccdd,  count(*) as t  from acu_seccion1 a inner join acu_seccion10 s on a.id1 = s.id10  where S10_8_4 = 1 group by nom_dd ) as C4 on DEP.ccdd  = C4.ccdd 
          left join (select ccdd,  count(*) as t  from acu_seccion1 a inner join acu_seccion10 s on a.id1 = s.id10  where S10_8_5 = 1 group by nom_dd ) as C5 on DEP.ccdd  = C5.ccdd 
          left join (select ccdd,  count(*) as t  from acu_seccion1 a inner join acu_seccion10 s on a.id1 = s.id10  where S10_8_6 = 1 group by nom_dd ) as C6 on DEP.ccdd  = C6.ccdd 
          left join (select ccdd,  count(*) as t  from acu_seccion1 a inner join acu_seccion10 s on a.id1 = s.id10  where S10_8_7 = 1 group by nom_dd ) as C7 on DEP.ccdd  = C7.ccdd 
          left join (select ccdd,  count(*) as t  from acu_seccion1 a inner join acu_seccion10 s on a.id1 = s.id10  where S10_8_8 = 1 group by nom_dd ) as C8 on DEP.ccdd  = C8.ccdd 
          left join (select ccdd,  count(*) as t  from acu_seccion1 a inner join acu_seccion10 s on a.id1 = s.id10  where S10_8_9 = 1 group by nom_dd ) as C9 on DEP.ccdd  = C9.ccdd 
          left join (select ccdd,  count(*) as t  from acu_seccion1 a inner join acu_seccion10 s on a.id1 = s.id10  where S10_8_10 = 1 group by nom_dd ) as C10 on DEP.ccdd  = C10.ccdd 
          left join (select ccdd,  count(*) as t  from acu_seccion1 a inner join acu_seccion10 s on a.id1 = s.id10  where S10_8_10 = 9 group by nom_dd ) as C11 on DEP.ccdd  = C11.ccdd ;
        ");
      return $q;
}

function get_tabulado_193()
{
      $q = $this->db->query("
          /* TABULADO N° 193  -------------------------- TIENE EMBARCACIONES  -------------------------*/
          select 
          DEP.CCDD, DEPARTAMENTO,  COALESCE(C0.t ,0) AS TOTAL,  
          COALESCE(C1.t,0) as SI, COALESCE(C2.t,0) as 'NO',  COALESCE(C3.t,0) NEP
          from (select  distinct(departamento), ccdd from departamentos_tab order by departamento) as DEP 
          left join (select ccdd,  count(*) as t  from acu_seccion1 a inner join acu_seccion10 s on a.id1 = s.id10  where S10_10  is not null group by  nom_dd ) as C0 on DEP.ccdd  = C0.ccdd 
          left join (select ccdd,  count(*) as t  from acu_seccion1 a inner join acu_seccion10 s on a.id1 = s.id10  where S10_10 = 1 group by nom_dd ) as C1 on DEP.ccdd  = C1.ccdd 
          left join (select ccdd,  count(*) as t  from acu_seccion1 a inner join acu_seccion10 s on a.id1 = s.id10  where S10_10 = 2 group by nom_dd ) as C2 on DEP.ccdd  = C2.ccdd 
          left join (select ccdd,  count(*) as t  from acu_seccion1 a inner join acu_seccion10 s on a.id1 = s.id10  where S10_10 = 9 group by nom_dd ) as C3 on DEP.ccdd  = C3.ccdd ;
        ");
      return $q;
}

function get_tabulado_194()
{
      $q = $this->db->query("
          /* TABULADO N° 194  -------------------------- CALIFICACION APOYO AL MINISTERIO  -------------------------*/
          select 
          DEP.CCDD, DEPARTAMENTO,  COALESCE(C0.t ,0) AS TOTAL, 
          COALESCE(C1.t,0) as MUY_MALO, COALESCE(C2.t,0) as MALO, COALESCE(C3.t,0) as REGULAR, COALESCE(C4.t,0) as BUENO, COALESCE(C5.t,0) as MUY_BUENO,
          COALESCE(C6.t,0) as NO_CONOCE, COALESCE(C7.t,0) as NEP
          from (select  distinct(departamento), ccdd from departamentos_tab order by departamento) as DEP 
          left join (select ccdd,  count(*) as t  from acu_seccion1 a inner join acu_seccion10 s on a.id1 = s.id10  where S10_11_1 is not null group by nom_dd ) as C0 on DEP.ccdd  = C0.ccdd 
          left join (select ccdd,  count(*) as t  from acu_seccion1 a inner join acu_seccion10 s on a.id1 = s.id10  where S10_11_1 = 1 group by nom_dd ) as C1 on DEP.ccdd  = C1.ccdd 
          left join (select ccdd,  count(*) as t  from acu_seccion1 a inner join acu_seccion10 s on a.id1 = s.id10  where S10_11_1 = 2 group by nom_dd ) as C2 on DEP.ccdd  = C2.ccdd 
          left join (select ccdd,  count(*) as t  from acu_seccion1 a inner join acu_seccion10 s on a.id1 = s.id10  where S10_11_1 = 3 group by nom_dd ) as C3 on DEP.ccdd  = C3.ccdd 
          left join (select ccdd,  count(*) as t  from acu_seccion1 a inner join acu_seccion10 s on a.id1 = s.id10  where S10_11_1 = 4 group by nom_dd ) as C4 on DEP.ccdd  = C4.ccdd 
          left join (select ccdd,  count(*) as t  from acu_seccion1 a inner join acu_seccion10 s on a.id1 = s.id10  where S10_11_1 = 5 group by nom_dd ) as C5 on DEP.ccdd  = C5.ccdd 
          left join (select ccdd,  count(*) as t  from acu_seccion1 a inner join acu_seccion10 s on a.id1 = s.id10  where S10_11_1 = 6 group by nom_dd ) as C6 on DEP.ccdd  = C6.ccdd 
          left join (select ccdd,  count(*) as t  from acu_seccion1 a inner join acu_seccion10 s on a.id1 = s.id10  where S10_11_1 = 9 group by nom_dd ) as C7 on DEP.ccdd  = C7.ccdd ;
        ");
      return $q;
}

function get_tabulado_195()
{
      $q = $this->db->query("
          /* TABULADO N° 195  -------------------------- CALIFICACION APOYO AL FONDEPES  -------------------------*/
          select 
          DEP.CCDD, DEPARTAMENTO,  COALESCE(C0.t ,0) AS TOTAL, 
          COALESCE(C1.t,0) as MUY_MALO, COALESCE(C2.t,0) as MALO, COALESCE(C3.t,0) as REGULAR, COALESCE(C4.t,0) as BUENO, COALESCE(C5.t,0) as MUY_BUENO,
          COALESCE(C6.t,0) as NO_CONOCE, COALESCE(C7.t,0) as NEP
          from (select  distinct(departamento), ccdd from departamentos_tab order by departamento) as DEP 
          left join (select ccdd,  count(*) as t  from acu_seccion1 a inner join acu_seccion10 s on a.id1 = s.id10  where S10_11_2 is not null group by nom_dd ) as C0 on DEP.ccdd  = C0.ccdd 
          left join (select ccdd,  count(*) as t  from acu_seccion1 a inner join acu_seccion10 s on a.id1 = s.id10  where S10_11_2 = 1 group by nom_dd ) as C1 on DEP.ccdd  = C1.ccdd 
          left join (select ccdd,  count(*) as t  from acu_seccion1 a inner join acu_seccion10 s on a.id1 = s.id10  where S10_11_2 = 2 group by nom_dd ) as C2 on DEP.ccdd  = C2.ccdd 
          left join (select ccdd,  count(*) as t  from acu_seccion1 a inner join acu_seccion10 s on a.id1 = s.id10  where S10_11_2 = 3 group by nom_dd ) as C3 on DEP.ccdd  = C3.ccdd 
          left join (select ccdd,  count(*) as t  from acu_seccion1 a inner join acu_seccion10 s on a.id1 = s.id10  where S10_11_2 = 4 group by nom_dd ) as C4 on DEP.ccdd  = C4.ccdd 
          left join (select ccdd,  count(*) as t  from acu_seccion1 a inner join acu_seccion10 s on a.id1 = s.id10  where S10_11_2 = 5 group by nom_dd ) as C5 on DEP.ccdd  = C5.ccdd 
          left join (select ccdd,  count(*) as t  from acu_seccion1 a inner join acu_seccion10 s on a.id1 = s.id10  where S10_11_2 = 6 group by nom_dd ) as C6 on DEP.ccdd  = C6.ccdd 
          left join (select ccdd,  count(*) as t  from acu_seccion1 a inner join acu_seccion10 s on a.id1 = s.id10  where S10_11_2 = 9 group by nom_dd ) as C7 on DEP.ccdd  = C7.ccdd ;
        ");
      return $q;
}

function get_tabulado_196()
{
      $q = $this->db->query("
          /* TABULADO N° 196  -------------------------- CALIFICACION APOYO AL ITP  -------------------------*/
          select 
          DEP.CCDD, DEPARTAMENTO,  COALESCE(C0.t ,0) AS TOTAL, 
          COALESCE(C1.t,0) as MUY_MALO, COALESCE(C2.t,0) as MALO, COALESCE(C3.t,0) as REGULAR, COALESCE(C4.t,0) as BUENO, COALESCE(C5.t,0) as MUY_BUENO,
          COALESCE(C6.t,0) as NO_CONOCE, COALESCE(C7.t,0) as NEP
          from (select  distinct(departamento), ccdd from departamentos_tab order by departamento) as DEP 
          left join (select ccdd,  count(*) as t  from acu_seccion1 a inner join acu_seccion10 s on a.id1 = s.id10  where S10_11_3 is not null group by nom_dd ) as C0 on DEP.ccdd  = C0.ccdd 
          left join (select ccdd,  count(*) as t  from acu_seccion1 a inner join acu_seccion10 s on a.id1 = s.id10  where S10_11_3 = 1 group by nom_dd ) as C1 on DEP.ccdd  = C1.ccdd 
          left join (select ccdd,  count(*) as t  from acu_seccion1 a inner join acu_seccion10 s on a.id1 = s.id10  where S10_11_3 = 2 group by nom_dd ) as C2 on DEP.ccdd  = C2.ccdd 
          left join (select ccdd,  count(*) as t  from acu_seccion1 a inner join acu_seccion10 s on a.id1 = s.id10  where S10_11_3 = 3 group by nom_dd ) as C3 on DEP.ccdd  = C3.ccdd 
          left join (select ccdd,  count(*) as t  from acu_seccion1 a inner join acu_seccion10 s on a.id1 = s.id10  where S10_11_3 = 4 group by nom_dd ) as C4 on DEP.ccdd  = C4.ccdd 
          left join (select ccdd,  count(*) as t  from acu_seccion1 a inner join acu_seccion10 s on a.id1 = s.id10  where S10_11_3 = 5 group by nom_dd ) as C5 on DEP.ccdd  = C5.ccdd 
          left join (select ccdd,  count(*) as t  from acu_seccion1 a inner join acu_seccion10 s on a.id1 = s.id10  where S10_11_3 = 6 group by nom_dd ) as C6 on DEP.ccdd  = C6.ccdd 
          left join (select ccdd,  count(*) as t  from acu_seccion1 a inner join acu_seccion10 s on a.id1 = s.id10  where S10_11_3 = 9 group by nom_dd ) as C7 on DEP.ccdd  = C7.ccdd ;
        ");
      return $q;
}

function get_tabulado_197()
{
      $q = $this->db->query("
          /* TABULADO N° 197  -------------------------- CALIFICACION APOYO AL IMARPE  -------------------------*/
          select 
          DEP.CCDD, DEPARTAMENTO,  COALESCE(C0.t ,0) AS TOTAL, 
          COALESCE(C1.t,0) as MUY_MALO, COALESCE(C2.t,0) as MALO, COALESCE(C3.t,0) as REGULAR, COALESCE(C4.t,0) as BUENO, COALESCE(C5.t,0) as MUY_BUENO,
          COALESCE(C6.t,0) as NO_CONOCE, COALESCE(C7.t,0) as NEP
          from (select  distinct(departamento), ccdd from departamentos_tab order by departamento) as DEP 
          left join (select ccdd,  count(*) as t  from acu_seccion1 a inner join acu_seccion10 s on a.id1 = s.id10  where S10_11_4 is not null group by nom_dd ) as C0 on DEP.ccdd  = C0.ccdd 
          left join (select ccdd,  count(*) as t  from acu_seccion1 a inner join acu_seccion10 s on a.id1 = s.id10  where S10_11_4 = 1 group by nom_dd ) as C1 on DEP.ccdd  = C1.ccdd 
          left join (select ccdd,  count(*) as t  from acu_seccion1 a inner join acu_seccion10 s on a.id1 = s.id10  where S10_11_4 = 2 group by nom_dd ) as C2 on DEP.ccdd  = C2.ccdd 
          left join (select ccdd,  count(*) as t  from acu_seccion1 a inner join acu_seccion10 s on a.id1 = s.id10  where S10_11_4 = 3 group by nom_dd ) as C3 on DEP.ccdd  = C3.ccdd 
          left join (select ccdd,  count(*) as t  from acu_seccion1 a inner join acu_seccion10 s on a.id1 = s.id10  where S10_11_4 = 4 group by nom_dd ) as C4 on DEP.ccdd  = C4.ccdd 
          left join (select ccdd,  count(*) as t  from acu_seccion1 a inner join acu_seccion10 s on a.id1 = s.id10  where S10_11_4 = 5 group by nom_dd ) as C5 on DEP.ccdd  = C5.ccdd 
          left join (select ccdd,  count(*) as t  from acu_seccion1 a inner join acu_seccion10 s on a.id1 = s.id10  where S10_11_4 = 6 group by nom_dd ) as C6 on DEP.ccdd  = C6.ccdd 
          left join (select ccdd,  count(*) as t  from acu_seccion1 a inner join acu_seccion10 s on a.id1 = s.id10  where S10_11_4 = 9 group by nom_dd ) as C7 on DEP.ccdd  = C7.ccdd ;
        ");
      return $q;
}

function get_tabulado_198()
{
      $q = $this->db->query("
          /* TABULADO N° 198  -------------------------- CALIFICACION APOYO AL MINAM  -------------------------*/
          select 
          DEP.CCDD, DEPARTAMENTO,  COALESCE(C0.t ,0) AS TOTAL, 
          COALESCE(C1.t,0) as MUY_MALO, COALESCE(C2.t,0) as MALO, COALESCE(C3.t,0) as REGULAR, COALESCE(C4.t,0) as BUENO, COALESCE(C5.t,0) as MUY_BUENO,
          COALESCE(C6.t,0) as NO_CONOCE, COALESCE(C7.t,0) as NEP
          from (select  distinct(departamento), ccdd from departamentos_tab order by departamento) as DEP 
          left join (select ccdd,  count(*) as t  from acu_seccion1 a inner join acu_seccion10 s on a.id1 = s.id10  where S10_11_5 is not null group by nom_dd ) as C0 on DEP.ccdd  = C0.ccdd 
          left join (select ccdd,  count(*) as t  from acu_seccion1 a inner join acu_seccion10 s on a.id1 = s.id10  where S10_11_5 = 1 group by nom_dd ) as C1 on DEP.ccdd  = C1.ccdd 
          left join (select ccdd,  count(*) as t  from acu_seccion1 a inner join acu_seccion10 s on a.id1 = s.id10  where S10_11_5 = 2 group by nom_dd ) as C2 on DEP.ccdd  = C2.ccdd 
          left join (select ccdd,  count(*) as t  from acu_seccion1 a inner join acu_seccion10 s on a.id1 = s.id10  where S10_11_5 = 3 group by nom_dd ) as C3 on DEP.ccdd  = C3.ccdd 
          left join (select ccdd,  count(*) as t  from acu_seccion1 a inner join acu_seccion10 s on a.id1 = s.id10  where S10_11_5 = 4 group by nom_dd ) as C4 on DEP.ccdd  = C4.ccdd 
          left join (select ccdd,  count(*) as t  from acu_seccion1 a inner join acu_seccion10 s on a.id1 = s.id10  where S10_11_5 = 5 group by nom_dd ) as C5 on DEP.ccdd  = C5.ccdd 
          left join (select ccdd,  count(*) as t  from acu_seccion1 a inner join acu_seccion10 s on a.id1 = s.id10  where S10_11_5 = 6 group by nom_dd ) as C6 on DEP.ccdd  = C6.ccdd 
          left join (select ccdd,  count(*) as t  from acu_seccion1 a inner join acu_seccion10 s on a.id1 = s.id10  where S10_11_5 = 9 group by nom_dd ) as C7 on DEP.ccdd  = C7.ccdd ;
        ");
      return $q;
}
function get_tabulado_199()
{
      $q = $this->db->query("
          /* TABULADO N° 199  -------------------------- CALIFICACION APOYO AL SANPES  -------------------------*/
          select 
          DEP.CCDD, DEPARTAMENTO,  COALESCE(C0.t ,0) AS TOTAL, 
          COALESCE(C1.t,0) as MUY_MALO, COALESCE(C2.t,0) as MALO, COALESCE(C3.t,0) as REGULAR, COALESCE(C4.t,0) as BUENO, COALESCE(C5.t,0) as MUY_BUENO,
          COALESCE(C6.t,0) as NO_CONOCE, COALESCE(C7.t,0) as NEP
          from (select  distinct(departamento), ccdd from departamentos_tab order by departamento) as DEP 
          left join (select ccdd,  count(*) as t  from acu_seccion1 a inner join acu_seccion10 s on a.id1 = s.id10  where S10_11_6 is not null group by nom_dd ) as C0 on DEP.ccdd  = C0.ccdd 
          left join (select ccdd,  count(*) as t  from acu_seccion1 a inner join acu_seccion10 s on a.id1 = s.id10  where S10_11_6 = 1 group by nom_dd ) as C1 on DEP.ccdd  = C1.ccdd 
          left join (select ccdd,  count(*) as t  from acu_seccion1 a inner join acu_seccion10 s on a.id1 = s.id10  where S10_11_6 = 2 group by nom_dd ) as C2 on DEP.ccdd  = C2.ccdd 
          left join (select ccdd,  count(*) as t  from acu_seccion1 a inner join acu_seccion10 s on a.id1 = s.id10  where S10_11_6 = 3 group by nom_dd ) as C3 on DEP.ccdd  = C3.ccdd 
          left join (select ccdd,  count(*) as t  from acu_seccion1 a inner join acu_seccion10 s on a.id1 = s.id10  where S10_11_6 = 4 group by nom_dd ) as C4 on DEP.ccdd  = C4.ccdd 
          left join (select ccdd,  count(*) as t  from acu_seccion1 a inner join acu_seccion10 s on a.id1 = s.id10  where S10_11_6 = 5 group by nom_dd ) as C5 on DEP.ccdd  = C5.ccdd 
          left join (select ccdd,  count(*) as t  from acu_seccion1 a inner join acu_seccion10 s on a.id1 = s.id10  where S10_11_6 = 6 group by nom_dd ) as C6 on DEP.ccdd  = C6.ccdd 
          left join (select ccdd,  count(*) as t  from acu_seccion1 a inner join acu_seccion10 s on a.id1 = s.id10  where S10_11_6 = 9 group by nom_dd ) as C7 on DEP.ccdd  = C7.ccdd ;
        ");
      return $q;
}

  /////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
  // T A B U L A D O S  ///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
  /////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////



  /////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
  // P A R A   E X P O  R T A R ///////////////////////////////////////////////////////////////////////////////////////////////////////////////////
  /////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
   

  /////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
  // P A R A   E X P O  R T A R ///////////////////////////////////////////////////////////////////////////////////////////////////////////////////
  /////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////


}
?>