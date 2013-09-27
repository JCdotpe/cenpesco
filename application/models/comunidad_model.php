<?php 
/**
* 
*/
class Comunidad_model extends CI_MODEL
{
    function consulta_udra($dep,$prov,$dist,$ccpp)
    {
        $this->db->select('FORMULARIOS');
        $this->db->where('CCDD',$dep);
        $this->db->where('CCPP',$prov);
        $this->db->where('CCDI',$dist);
        $this->db->where('COD_CCPP',$ccpp);       
        $q = $this->db->get('udra_comunidad');
        return $q;
    }	

	function consulta($nro,$dep,$prov,$dist,$ccpp)
	{
		$this->db->select('id');
		$this->db->where('id',$dep . $prov . $dist . $ccpp . $nro);
        $this->db->where('NFORM',$nro);
        $this->db->where('CCDD',$dep);
        $this->db->where('CCPP',$prov);
        $this->db->where('CCDI',$dist);
        $this->db->where('COD_CCPP',$ccpp);
        $this->db->where('activo',1);        
        $q = $this->db->get('comunidad');
		return $q;
	}

    function consulta_in_seccion($cod,$seccion)
    {
        //$this->db->select('comunidad_id');
        $this->db->where('comunidad_id',$cod);
        $q = $this->db->get($seccion);
        return $q;
    }
    function insert_comunidad($data){
		$this->db->insert('comunidad', $data);
		return $this->db->affected_rows() > 0;
    }   

    function seccion_disponible($NFORM,$CCDD,$CCPP,$CCDI,$COD_CCPP,$seccion){
		$this->db->select('s.comunidad_id');
		$this->db->from('comunidad c');
        $this->db->join($seccion . ' s','s.comunidad_id = c.id','inner');
        $this->db->where('c.NFORM',$NFORM);
        $this->db->where('c.CCDD',$CCDD);
        $this->db->where('c.CCPP',$CCPP);
        $this->db->where('c.CCDI',$CCDI);
        $this->db->where('c.COD_CCPP',$COD_CCPP);
        $this->db->where('c.activo',1);        
        $q = $this->db->get();
		return $q->num_rows();
    }   
    
    function get_fields($table){ //obtiene NOMBRE de campos
        $q = $this->db->list_fields($table);
        return $q;
    }   


    function insert_comunidad_seccion($table,$data){//inserta en las tablas de las secciones comunidades
        $this->db->insert($table, $data);
        return $this->db->affected_rows() > 0;
    }   


    function update_comunidad_seccion($table,$data,$id){//update en las tablas de las secciones comunidades
        $this->db->where('comunidad_id',$id);
        $this->db->update($table, $data);
        return $this->db->affected_rows() > 0;
    }   

    function get_all_by_seccion($table,$id){//update en las tablas de las secciones comunidades
        $this->db->where('comunidad_id',$id);
        $q = $this->db->get($table);
        return $q;
    }   


    function insert_no_emb($data){
        $this->db->insert('pesc_seccion9', $data);
        return $this->db->affected_rows() > 0;
    } 



    function get_ccpp($dpto,$prov,$dist)
    {
        $sql = 'SELECT SUBSTRING(CCPP, 7) as CCPP, CENTRO_POBLADO FROM (marco_pesca) WHERE CCPP LIKE ? ORDER BY CENTRO_POBLADO asc';
        $q = $this->db->query($sql, array( $dpto . $prov . $dist .'%'));

        // $this->db->select('SUBSTRING("CCPP",7) as CCPP');
        // $this->db->select('CENTRO_POBLADO');
        // $this->db->like('CCPP',$dpto.$prov.$dist,'after');
        // $this->db->order_by('CENTRO_POBLADO','asc');
        // $q = $this->db->get('marco_pesca');
        return $q;
    }    

  /////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
  // C O N S I S T E N C I A  /////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
  /////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
      function get_report_1(){ //generar reporte cuando  N < 0.3 or  N > 10
        $sql = '
              select id,NFORM, SEDE_COD, NOM_SEDE, CCDD, NOM_DD, CCPP, NOM_PP, CCDI, NOM_DI, COD_CCPP, NOM_CCPP, 
              S3_21_1_1_H,S3_21_2_1_M,S3_21_1_2_H,S3_21_2_2_M,S3_21_1_3_H,S3_21_2_3_M,S3_21_1_4_H,
              S3_21_2_4_M,S3_21_1_5_H,S3_21_2_5_M,S3_21_1_6_H,S3_21_2_6_M,S3_21_1_7_H,S3_21_2_7_M,
              S3_21_1_8_H,S3_21_2_8_M,S3_21_1_9_H,S3_21_2_9_M
              from comunidad c inner join comunidad_seccion3 s3 on c.id = s3.comunidad_id
              where 
              S3_21_1_1_H + (S3_21_2_1_M/60) +
              S3_21_1_2_H + (S3_21_2_2_M/60) +
              S3_21_1_3_H + (S3_21_2_3_M/60) +
              S3_21_1_4_H + (S3_21_2_4_M/60) +
              S3_21_1_5_H + (S3_21_2_5_M/60) +
              S3_21_1_6_H + (S3_21_2_6_M/60) +
              S3_21_1_7_H + (S3_21_2_7_M/60) +
              S3_21_1_8_H + (S3_21_2_8_M/60) +
              S3_21_1_9_H + (S3_21_2_9_M/60) > 10 or
              S3_21_1_1_H + (S3_21_2_1_M/60) +
              S3_21_1_2_H + (S3_21_2_2_M/60) +
              S3_21_1_3_H + (S3_21_2_3_M/60) +
              S3_21_1_4_H + (S3_21_2_4_M/60) +
              S3_21_1_5_H + (S3_21_2_5_M/60) +
              S3_21_1_6_H + (S3_21_2_6_M/60) +
              S3_21_1_7_H + (S3_21_2_7_M/60) +
              S3_21_1_8_H + (S3_21_2_8_M/60) +
              S3_21_1_9_H + (S3_21_2_9_M/60) < 0.3 
              order by NOM_SEDE, NOM_DD, NOM_PP,  NOM_DI, NOM_CCPP;
              ';
        $q = $this->db->query($sql);
        return $q;
      }

      function get_report_2(){
        $sql = '
              select id,NFORM, SEDE_COD, NOM_SEDE, CCDD, NOM_DD, CCPP, NOM_PP, CCDI, NOM_DI, COD_CCPP, NOM_CCPP,  
              S4_1, S4_1_C
              from comunidad c inner join comunidad_seccion4 s4 on c.id = s4.comunidad_id
              where S4_1=1 AND  S4_1_C>10
              order by NOM_SEDE, NOM_DD, NOM_PP,  NOM_DI, NOM_CCPP;
              ';
        $q = $this->db->query($sql);
        return $q;
      }

      function get_report_3(){
        $sql = '
              select id,NFORM, SEDE_COD, NOM_SEDE, CCDD, NOM_DD, CCPP, NOM_PP, CCDI, NOM_DI, COD_CCPP, NOM_CCPP,  
              S4_1_C, S4_2_1, S4_2_2, S4_2_3, S4_2_4, S4_2_5
              from comunidad c inner join comunidad_seccion4 s4 on c.id = s4.comunidad_id
              where ( S4_1_C=1 and ( (S4_2_1=1 or S4_2_2=1 or S4_2_3=1) and  (S4_2_4=1 or S4_2_5=1) ) ) 
              or ( S4_1_C=2 and  ( (S4_2_1=1 or S4_2_2=1 or S4_2_3=1) and (S4_2_4=1 or S4_2_5=1) ) )
              order by NOM_SEDE, NOM_DD, NOM_PP,  NOM_DI, NOM_CCPP;
              ';
        $q = $this->db->query($sql);
        return $q;
      }

      function get_report_4(){
        $sql = '
              select id,NFORM, SEDE_COD, NOM_SEDE, CCDD, NOM_DD, CCPP, NOM_PP, CCDI, NOM_DI, COD_CCPP, NOM_CCPP,  
              S7_1_1, S7_2_9
              from comunidad c inner join comunidad_seccion7 s7 on c.id = s7.comunidad_id
              where (S7_1_1 = 1 and  S7_2_9=1) OR  (S7_1_1 = 0 and S7_2_9 = 0)
              order by NOM_SEDE, NOM_DD, NOM_PP,  NOM_DI, NOM_CCPP;
              ';
        $q = $this->db->query($sql);
        return $q;
      }

      function get_report_5(){
        $sql = '
              select id,NFORM, SEDE_COD, NOM_SEDE, CCDD, NOM_DD, CCPP, NOM_PP, CCDI, NOM_DI, COD_CCPP, NOM_CCPP,  
              S7_1_2, S7_7_16
              from comunidad c inner join comunidad_seccion7 s7 on c.id = s7.comunidad_id
              where (S7_1_2 = 1 and  S7_7_16=1) OR  (S7_1_2 = 0 and S7_7_16 = 0)
              order by NOM_SEDE, NOM_DD, NOM_PP,  NOM_DI, NOM_CCPP;
              ';
        $q = $this->db->query($sql);
        return $q;
      }

      function get_report_6(){
        $sql = '
              select id,NFORM, SEDE_COD, NOM_SEDE, CCDD, NOM_DD, CCPP, NOM_PP, CCDI, NOM_DI, COD_CCPP, NOM_CCPP,  
              S3_1_O, S3_4_4_O,  S3_6_5_O, S3_8_4_O, S3_10_5_O, S3_12_6_O, S3_16_5_O,  S3_17_8_O,  S3_17_9_O,  S3_18_7_O,  S3_18_8_O,  S3_19_4_O, 
              S5_2_7_O, S5_3_17_O, 
              S6_3_6_O, S6_4_15_O,
              S7_1_9_O, S7_2_8_O, S7_5_41_O, S7_5_49_O, S7_6_3_O, S7_7_14_O, S7_7_15_O, S7_8_18_O, S7_9_13_O, S7_10_9_O, S7_12_4_O, S7_13_12_O, S7_15_O,
              S8_2_12_O, S8_3_10_O
              from comunidad c 
              inner join comunidad_seccion3 s3 on c.id = s3.comunidad_id
              inner join comunidad_seccion5 s5 on c.id = s5.comunidad_id
              inner join comunidad_seccion6 s6 on c.id = s6.comunidad_id
              inner join comunidad_seccion7 s7 on c.id = s7.comunidad_id
              inner join comunidad_seccion8 s8 on c.id = s8.comunidad_id
              order by NOM_SEDE, NOM_DD, NOM_PP,  NOM_DI, NOM_CCPP;
              ';
        $q = $this->db->query($sql);
        return $q;
      }

  /////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
  // C O N S I S T E N C I A  /////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
  /////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

  /////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
  // T A B U L A D O S  ///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
  /////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

function get_tabulado_1()
{
      $q = $this->db->query('
          select 
          DEP.CCDD, DEPARTAMENTO, (COALESCE(CAS.t,0) + COALESCE(QUE.t,0) + COALESCE(AYM.t,0) + COALESCE(OTR.t,0)) AS TOTAL,  
          COALESCE(CAS.t,0) as CASTELLANO, COALESCE(QUE.t,0) as QUECHUA, COALESCE(AYM.t,0) as AYMARA,  COALESCE(OTR.t,0) as OTRO 
          from (select  distinct(departamento), ccdd from marco order by departamento) as DEP 
          left join (select ccdd,  count(*) as t  from comunidad c inner join comunidad_seccion3 s1 on c.id = s1.comunidad_id  where S3_1 = 1 group by nom_dd) as CAS on DEP.ccdd  = CAS.ccdd 
          left join (select ccdd,  count(*) as t  from comunidad c inner join comunidad_seccion3 s2 on c.id = s2.comunidad_id  where S3_1 = 2 group by nom_dd) as QUE on DEP.ccdd  = QUE.ccdd 
          left join (select ccdd,  count(*) as t  from comunidad c inner join comunidad_seccion3 s3 on c.id = s3.comunidad_id  where S3_1 = 3 group by nom_dd) as AYM on DEP.ccdd  = AYM.ccdd
          left join (select ccdd,  count(*) as t  from comunidad c inner join comunidad_seccion3 s3 on c.id = s3.comunidad_id  where S3_1 = 4 group by nom_dd) as OTR on DEP.ccdd  = OTR.ccdd ;
        ');
      return $q;
}

function get_tabulado_2()
{
      $q = $this->db->query("
          select 
          DEP.CCDD, DEPARTAMENTO, (COALESCE(AL_SI.t,0) + COALESCE(AL_NO.t,0) ) as TOTAL, COALESCE(AL_SI.t,0) as SI, COALESCE(AL_NO.t,0) as 'NO'
          from (select  distinct(departamento), ccdd from marco order by departamento) as DEP 
          left join (select ccdd,  count(*) as t  from comunidad c inner join comunidad_seccion3 s1 on c.id = s1.comunidad_id  where S3_2 = 1 group by nom_dd) as AL_SI    on DEP.ccdd  = AL_SI.ccdd 
          left join (select ccdd,  count(*) as t  from comunidad c inner join comunidad_seccion3 s2 on c.id = s2.comunidad_id  where S3_2 = 2 group by nom_dd) as AL_NO  on DEP.ccdd  = AL_NO.ccdd ;
        ");
      return $q;
}

function get_tabulado_3()
{
      $q = $this->db->query('
          select 
          DEP.CCDD, DEPARTAMENTO, (COALESCE(MM.t,0) + COALESCE(MA.t,0) + COALESCE(RE.t,0) +  COALESCE(BU.t,0) +  COALESCE(MB.t,0) ) AS TOTAL,  
          COALESCE(MM.t,0) as MUY_MALO, COALESCE(MA.t,0) as MALO, COALESCE(RE.t,0) as REGULAR,  COALESCE(BU.t,0) as BUENO,  COALESCE(MB.t,0) as MUY_BUENO
          from (select  distinct(departamento), ccdd from marco order by departamento) as DEP 
          left join (select ccdd,  count(*) as t  from comunidad c inner join comunidad_seccion3 s on c.id = s.comunidad_id  where S3_3 = 1 group by nom_dd) as MM on DEP.ccdd  = MM.ccdd 
          left join (select ccdd,  count(*) as t  from comunidad c inner join comunidad_seccion3 s on c.id = s.comunidad_id  where S3_3 = 2 group by nom_dd) as MA on DEP.ccdd  = MA.ccdd 
          left join (select ccdd,  count(*) as t  from comunidad c inner join comunidad_seccion3 s on c.id = s.comunidad_id  where S3_3 = 3 group by nom_dd) as RE on DEP.ccdd  = RE.ccdd
          left join (select ccdd,  count(*) as t  from comunidad c inner join comunidad_seccion3 s on c.id = s.comunidad_id  where S3_3 = 4 group by nom_dd) as BU on DEP.ccdd  = BU.ccdd 
          left join (select ccdd,  count(*) as t  from comunidad c inner join comunidad_seccion3 s on c.id = s.comunidad_id  where S3_3 = 5 group by nom_dd) as MB on DEP.ccdd  = MB.ccdd ;
        ');
      return $q;
}

function get_tabulado_4()
{
      $q = $this->db->query('
          select 
          DEP.CCDD, DEPARTAMENTO, (COALESCE(C1.t,0) + COALESCE(C2.t,0) + COALESCE(C3.t,0) +  COALESCE(C4.t,0) ) AS TOTAL,  
          COALESCE(C1.t,0) as INTERRUPCION, COALESCE(C2.t,0) as RESTRINGIDO, COALESCE(C3.t,0) as COSTO,  COALESCE(C4.t,0) as OTRA
          from (select  distinct(departamento), ccdd from marco order by departamento) as DEP 
          left join (select ccdd,  count(*) as t  from comunidad c inner join comunidad_seccion3 s on c.id = s.comunidad_id  where S3_4_1 = 1 group by nom_dd) as C1 on DEP.ccdd  = C1.ccdd 
          left join (select ccdd,  count(*) as t  from comunidad c inner join comunidad_seccion3 s on c.id = s.comunidad_id  where S3_4_2 = 1 group by nom_dd) as C2 on DEP.ccdd  = C2.ccdd 
          left join (select ccdd,  count(*) as t  from comunidad c inner join comunidad_seccion3 s on c.id = s.comunidad_id  where S3_4_3 = 1 group by nom_dd) as C3 on DEP.ccdd  = C3.ccdd
          left join (select ccdd,  count(*) as t  from comunidad c inner join comunidad_seccion3 s on c.id = s.comunidad_id  where S3_4_4 = 1 group by nom_dd) as C4 on DEP.ccdd  = C4.ccdd  ;
        ');
      return $q;
}



function get_tabulado_5()
{
      $q = $this->db->query('
          select 
          DEP.CCDD, DEPARTAMENTO, (COALESCE(C1.t,0) + COALESCE(C2.t,0) + COALESCE(C3.t,0)  ) AS TOTAL,  
          COALESCE(C1.t,0) as BIODIGESTOR, COALESCE(C2.t,0) as PANEL, COALESCE(C3.t,0) as NINGUNA
          from (select  distinct(departamento), ccdd from marco order by departamento) as DEP 
          left join (select ccdd,  count(*) as t  from comunidad c inner join comunidad_seccion3 s on c.id = s.comunidad_id  where S3_5_1 = 1 group by nom_dd) as C1 on DEP.ccdd  = C1.ccdd 
          left join (select ccdd,  count(*) as t  from comunidad c inner join comunidad_seccion3 s on c.id = s.comunidad_id  where S3_5_2 = 1 group by nom_dd) as C2 on DEP.ccdd  = C2.ccdd 
          left join (select ccdd,  count(*) as t  from comunidad c inner join comunidad_seccion3 s on c.id = s.comunidad_id  where S3_5_3 = 1 group by nom_dd) as C3 on DEP.ccdd  = C3.ccdd  ;
        ');
      return $q;
}



function get_tabulado_6()
{
      $q = $this->db->query('
          select 
          DEP.CCDD, DEPARTAMENTO, (COALESCE(C1.t,0) + COALESCE(C2.t,0) + COALESCE(C3.t,0) +  COALESCE(C4.t,0) +  COALESCE(C5.t,0) ) AS TOTAL,  
          COALESCE(C1.t,0) as RED, COALESCE(C2.t,0) as CAMION, COALESCE(C3.t,0) as POZO,  COALESCE(C4.t,0) as RIO,  COALESCE(C5.t,0) as OTRO
          from (select  distinct(departamento), ccdd from marco order by departamento) as DEP 
          left join (select ccdd,  count(*) as t  from comunidad c inner join comunidad_seccion3 s on c.id = s.comunidad_id  where S3_6_1 = 1 group by nom_dd) as C1 on DEP.ccdd  = C1.ccdd 
          left join (select ccdd,  count(*) as t  from comunidad c inner join comunidad_seccion3 s on c.id = s.comunidad_id  where S3_6_2 = 1 group by nom_dd) as C2 on DEP.ccdd  = C2.ccdd 
          left join (select ccdd,  count(*) as t  from comunidad c inner join comunidad_seccion3 s on c.id = s.comunidad_id  where S3_6_3 = 1 group by nom_dd) as C3 on DEP.ccdd  = C3.ccdd
          left join (select ccdd,  count(*) as t  from comunidad c inner join comunidad_seccion3 s on c.id = s.comunidad_id  where S3_6_4 = 1 group by nom_dd) as C4 on DEP.ccdd  = C4.ccdd  
          left join (select ccdd,  count(*) as t  from comunidad c inner join comunidad_seccion3 s on c.id = s.comunidad_id  where S3_6_5 = 1 group by nom_dd) as C5 on DEP.ccdd  = C5.ccdd  ;        
        ');
      return $q;
}


function get_tabulado_7()
{
      $q = $this->db->query('
          select 
          DEP.CCDD, DEPARTAMENTO, (COALESCE(C1.t,0) + COALESCE(C2.t,0) + COALESCE(C3.t,0) +  COALESCE(C4.t,0) +  COALESCE(C5.t,0) ) AS TOTAL,  
          COALESCE(C1.t,0) as MUY_MALO, COALESCE(C2.t,0) as MALO, COALESCE(C3.t,0) as REGULAR,  COALESCE(C4.t,0) as BUENO,  COALESCE(C5.t,0) as MUY_BUENO
          from (select  distinct(departamento), ccdd from marco order by departamento) as DEP 
          left join (select ccdd,  count(*) as t  from comunidad c inner join comunidad_seccion3 s on c.id = s.comunidad_id  where S3_7 = 1 group by nom_dd) as C1 on DEP.ccdd  = C1.ccdd 
          left join (select ccdd,  count(*) as t  from comunidad c inner join comunidad_seccion3 s on c.id = s.comunidad_id  where S3_7 = 2 group by nom_dd) as C2 on DEP.ccdd  = C2.ccdd 
          left join (select ccdd,  count(*) as t  from comunidad c inner join comunidad_seccion3 s on c.id = s.comunidad_id  where S3_7 = 3 group by nom_dd) as C3 on DEP.ccdd  = C3.ccdd
          left join (select ccdd,  count(*) as t  from comunidad c inner join comunidad_seccion3 s on c.id = s.comunidad_id  where S3_7 = 4 group by nom_dd) as C4 on DEP.ccdd  = C4.ccdd 
          left join (select ccdd,  count(*) as t  from comunidad c inner join comunidad_seccion3 s on c.id = s.comunidad_id  where S3_7 = 5 group by nom_dd) as C5 on DEP.ccdd  = C5.ccdd ;
        ');
      return $q;
}


function get_tabulado_8()
{
      $q = $this->db->query('
          select 
          DEP.CCDD, DEPARTAMENTO, (COALESCE(C1.t,0) + COALESCE(C2.t,0) + COALESCE(C3.t,0) +  COALESCE(C4.t,0) ) AS TOTAL,  
          COALESCE(C1.t,0) as INTERRUPCION, COALESCE(C2.t,0) as RESTRINGIDO, COALESCE(C3.t,0) as COSTO,  COALESCE(C4.t,0) as OTRA
          from (select  distinct(departamento), ccdd from marco order by departamento) as DEP 
          left join (select ccdd,  count(*) as t  from comunidad c inner join comunidad_seccion3 s on c.id = s.comunidad_id  where S3_8_1 = 1 group by nom_dd) as C1 on DEP.ccdd  = C1.ccdd 
          left join (select ccdd,  count(*) as t  from comunidad c inner join comunidad_seccion3 s on c.id = s.comunidad_id  where S3_8_2 = 1 group by nom_dd) as C2 on DEP.ccdd  = C2.ccdd 
          left join (select ccdd,  count(*) as t  from comunidad c inner join comunidad_seccion3 s on c.id = s.comunidad_id  where S3_8_3 = 1 group by nom_dd) as C3 on DEP.ccdd  = C3.ccdd
          left join (select ccdd,  count(*) as t  from comunidad c inner join comunidad_seccion3 s on c.id = s.comunidad_id  where S3_8_4 = 1 group by nom_dd) as C4 on DEP.ccdd  = C4.ccdd  ;        
        ');
      return $q;
}

function get_tabulado_9()
{           
      $q = $this->db->query('
          select 
          DEP.CCDD, DEPARTAMENTO, (COALESCE(C1.t,0) + COALESCE(C2.t,0) + COALESCE(C3.t,0) +  COALESCE(C4.t,0) +  COALESCE(C5.t,0) +  COALESCE(C6.t,0) ) AS TOTAL,  
          COALESCE(C1.t,0) as RED, COALESCE(C2.t,0) as LETRINA, COALESCE(C3.t,0) as SEPTICO,  COALESCE(C4.t,0) as CIEGO,  COALESCE(C5.t,0) as RIO,  COALESCE(C6.t,0) as NO_TIENEN
          from (select  distinct(departamento), ccdd from marco order by departamento) as DEP 
          left join (select ccdd,  count(*) as t  from comunidad c inner join comunidad_seccion3 s on c.id = s.comunidad_id  where S3_9_1 = 1 group by nom_dd) as C1 on DEP.ccdd  = C1.ccdd 
          left join (select ccdd,  count(*) as t  from comunidad c inner join comunidad_seccion3 s on c.id = s.comunidad_id  where S3_9_2 = 1 group by nom_dd) as C2 on DEP.ccdd  = C2.ccdd 
          left join (select ccdd,  count(*) as t  from comunidad c inner join comunidad_seccion3 s on c.id = s.comunidad_id  where S3_9_3 = 1 group by nom_dd) as C3 on DEP.ccdd  = C3.ccdd
          left join (select ccdd,  count(*) as t  from comunidad c inner join comunidad_seccion3 s on c.id = s.comunidad_id  where S3_9_4 = 1 group by nom_dd) as C4 on DEP.ccdd  = C4.ccdd  
          left join (select ccdd,  count(*) as t  from comunidad c inner join comunidad_seccion3 s on c.id = s.comunidad_id  where S3_9_5 = 1 group by nom_dd) as C5 on DEP.ccdd  = C5.ccdd  
          left join (select ccdd,  count(*) as t  from comunidad c inner join comunidad_seccion3 s on c.id = s.comunidad_id  where S3_9_6 = 1 group by nom_dd) as C6 on DEP.ccdd  = C6.ccdd  ;
        ');
      return $q;
}

function get_tabulado_10()
{           /* TABULADO N° 10 ---->destino del desague*/
      $q = $this->db->query('
          select 
          DEP.CCDD, DEPARTAMENTO, (COALESCE(C1.t,0) + COALESCE(C2.t,0) + COALESCE(C3.t,0) +  COALESCE(C4.t,0) +  COALESCE(C5.t,0) ) AS TOTAL,  
          COALESCE(C1.t,0) as RIO, COALESCE(C2.t,0) as BOSQUE, COALESCE(C3.t,0) as LAGUNA,  COALESCE(C4.t,0) as CANAL,  COALESCE(C5.t,0) as OTRO
          from (select  distinct(departamento), ccdd from marco order by departamento) as DEP 
          left join (select ccdd,  count(*) as t  from comunidad c inner join comunidad_seccion3 s on c.id = s.comunidad_id  where S3_10_1 = 1 group by nom_dd) as C1 on DEP.ccdd  = C1.ccdd 
          left join (select ccdd,  count(*) as t  from comunidad c inner join comunidad_seccion3 s on c.id = s.comunidad_id  where S3_10_2 = 1 group by nom_dd) as C2 on DEP.ccdd  = C2.ccdd 
          left join (select ccdd,  count(*) as t  from comunidad c inner join comunidad_seccion3 s on c.id = s.comunidad_id  where S3_10_3 = 1 group by nom_dd) as C3 on DEP.ccdd  = C3.ccdd
          left join (select ccdd,  count(*) as t  from comunidad c inner join comunidad_seccion3 s on c.id = s.comunidad_id  where S3_10_4 = 1 group by nom_dd) as C4 on DEP.ccdd  = C4.ccdd  
          left join (select ccdd,  count(*) as t  from comunidad c inner join comunidad_seccion3 s on c.id = s.comunidad_id  where S3_10_5 = 1 group by nom_dd) as C5 on DEP.ccdd  = C5.ccdd ;        
        ');
      return $q;
}

function get_tabulado_11()
{         /* TABULADO N° 11 ---->serviocios de la comunicacion */
      $q = $this->db->query('
          select 
          DEP.CCDD, DEPARTAMENTO, (COALESCE(C1.t,0) + COALESCE(C2.t,0) + COALESCE(C3.t,0) +  COALESCE(C4.t,0) +  COALESCE(C5.t,0) +  COALESCE(C6.t,0) ) AS TOTAL,  
          COALESCE(C1.t,0) as FIJA, COALESCE(C2.t,0) as PUBLICA, COALESCE(C3.t,0) as CELULAR,  COALESCE(C4.t,0) as INTERNET,  COALESCE(C5.t,0) as CABLE,  COALESCE(C6.t,0) as NINGUNO
          from (select  distinct(departamento), ccdd from marco order by departamento) as DEP 
          left join (select ccdd,  count(*) as t  from comunidad c inner join comunidad_seccion3 s on c.id = s.comunidad_id  where S3_11_1 = 1 group by nom_dd) as C1 on DEP.ccdd  = C1.ccdd 
          left join (select ccdd,  count(*) as t  from comunidad c inner join comunidad_seccion3 s on c.id = s.comunidad_id  where S3_11_2 = 1 group by nom_dd) as C2 on DEP.ccdd  = C2.ccdd 
          left join (select ccdd,  count(*) as t  from comunidad c inner join comunidad_seccion3 s on c.id = s.comunidad_id  where S3_11_3 = 1 group by nom_dd) as C3 on DEP.ccdd  = C3.ccdd
          left join (select ccdd,  count(*) as t  from comunidad c inner join comunidad_seccion3 s on c.id = s.comunidad_id  where S3_11_4 = 1 group by nom_dd) as C4 on DEP.ccdd  = C4.ccdd  
          left join (select ccdd,  count(*) as t  from comunidad c inner join comunidad_seccion3 s on c.id = s.comunidad_id  where S3_11_5 = 1 group by nom_dd) as C5 on DEP.ccdd  = C5.ccdd  
          left join (select ccdd,  count(*) as t  from comunidad c inner join comunidad_seccion3 s on c.id = s.comunidad_id  where S3_11_6 = 1 group by nom_dd) as C6 on DEP.ccdd  = C6.ccdd  ;
        ');
      return $q;
}

function get_tabulado_12()
{         /* TABULADO N° 12 ---->destino final basura */
      $q = $this->db->query('
          select 
          DEP.CCDD, DEPARTAMENTO, (COALESCE(C1.t,0) + COALESCE(C2.t,0) + COALESCE(C3.t,0) +  COALESCE(C4.t,0) +  COALESCE(C5.t,0) +  COALESCE(C6.t,0) ) AS TOTAL,  
          COALESCE(C1.t,0) as RELLENO, COALESCE(C2.t,0) as BOTADERO, COALESCE(C3.t,0) as VERTIDOS,  COALESCE(C4.t,0) as RECICLAJE,  COALESCE(C5.t,0) as QUEMADA,  COALESCE(C6.t,0) as OTRO
          from (select  distinct(departamento), ccdd from marco order by departamento) as DEP 
          left join (select ccdd,  count(*) as t  from comunidad c inner join comunidad_seccion3 s on c.id = s.comunidad_id  where S3_12_1 = 1 group by nom_dd) as C1 on DEP.ccdd  = C1.ccdd 
          left join (select ccdd,  count(*) as t  from comunidad c inner join comunidad_seccion3 s on c.id = s.comunidad_id  where S3_12_2 = 1 group by nom_dd) as C2 on DEP.ccdd  = C2.ccdd 
          left join (select ccdd,  count(*) as t  from comunidad c inner join comunidad_seccion3 s on c.id = s.comunidad_id  where S3_12_3 = 1 group by nom_dd) as C3 on DEP.ccdd  = C3.ccdd
          left join (select ccdd,  count(*) as t  from comunidad c inner join comunidad_seccion3 s on c.id = s.comunidad_id  where S3_12_4 = 1 group by nom_dd) as C4 on DEP.ccdd  = C4.ccdd  
          left join (select ccdd,  count(*) as t  from comunidad c inner join comunidad_seccion3 s on c.id = s.comunidad_id  where S3_12_5 = 1 group by nom_dd) as C5 on DEP.ccdd  = C5.ccdd  
          left join (select ccdd,  count(*) as t  from comunidad c inner join comunidad_seccion3 s on c.id = s.comunidad_id  where S3_12_6 = 1 group by nom_dd) as C6 on DEP.ccdd  = C6.ccdd  ;
        ');
      return $q;
}

function get_tabulado_13()
{         /* TABULADO N° 13 -------> existen minas */
      $q = $this->db->query("
          select 
          DEP.CCDD, DEPARTAMENTO, (COALESCE(C1.t,0) + COALESCE(C2.t,0) ) AS TOTAL,  
          COALESCE(C1.t,0) as SI, COALESCE(C2.t,0) as 'NO'
          from (select  distinct(departamento), ccdd from marco order by departamento) as DEP 
          left join (select ccdd,  count(*) as t  from comunidad c inner join comunidad_seccion3 s1 on c.id = s1.comunidad_id  where S3_13 = 1 group by nom_dd) as C1 on DEP.ccdd  = C1.ccdd 
          left join (select ccdd,  count(*) as t  from comunidad c inner join comunidad_seccion3 s2 on c.id = s2.comunidad_id  where S3_13 = 2 group by nom_dd) as C2 on DEP.ccdd  = C2.ccdd  ;
        ");
      return $q;
}

function get_tabulado_14()
{         /* TABULADO N° 14 -------> existen hidrocarburos */
      $q = $this->db->query("
          select 
          DEP.CCDD, DEPARTAMENTO, (COALESCE(C1.t,0) + COALESCE(C2.t,0) ) AS TOTAL,  
          COALESCE(C1.t,0) as SI, COALESCE(C2.t,0) as 'NO'
          from (select  distinct(departamento), ccdd from marco order by departamento) as DEP 
          left join (select ccdd,  count(*) as t  from comunidad c inner join comunidad_seccion3 s1 on c.id = s1.comunidad_id  where S3_14 = 1 group by nom_dd) as C1 on DEP.ccdd  = C1.ccdd 
          left join (select ccdd,  count(*) as t  from comunidad c inner join comunidad_seccion3 s2 on c.id = s2.comunidad_id  where S3_14 = 2 group by nom_dd) as C2 on DEP.ccdd  = C2.ccdd  ;
        ");
      return $q;
}

function get_tabulado_15()
{         /* TABULADO N° 15 -------> existen contaminacion */
      $q = $this->db->query("
          select 
          DEP.CCDD, DEPARTAMENTO, (COALESCE(C1.t,0) + COALESCE(C2.t,0) ) AS TOTAL,  
          COALESCE(C1.t,0) as SI, COALESCE(C2.t,0) as 'NO'
          from (select  distinct(departamento), ccdd from marco order by departamento) as DEP 
          left join (select ccdd,  count(*) as t  from comunidad c inner join comunidad_seccion3 s1 on c.id = s1.comunidad_id  where S3_15 = 1 group by nom_dd) as C1 on DEP.ccdd  = C1.ccdd 
          left join (select ccdd,  count(*) as t  from comunidad c inner join comunidad_seccion3 s2 on c.id = s2.comunidad_id  where S3_15 = 2 group by nom_dd) as C2 on DEP.ccdd  = C2.ccdd  ;        
        ");
      return $q;
}

function get_tabulado_16()
{       /* TABULADO N° 16 ---->tipo de contaminacion*/
      $q = $this->db->query('
          select 
          DEP.CCDD, DEPARTAMENTO, (COALESCE(C1.t,0) + COALESCE(C2.t,0) + COALESCE(C3.t,0) +  COALESCE(C4.t,0) +  COALESCE(C5.t,0) ) AS TOTAL,  
          COALESCE(C1.t,0) as RIO, COALESCE(C2.t,0) as SUELO, COALESCE(C3.t,0) as AIRE,  COALESCE(C4.t,0) as ACUSTICA,  COALESCE(C5.t,0) as OTRO
          from (select  distinct(departamento), ccdd from marco order by departamento) as DEP 
          left join (select ccdd,  count(*) as t  from comunidad c inner join comunidad_seccion3 s on c.id = s.comunidad_id  where S3_16_1 = 1 group by nom_dd) as C1 on DEP.ccdd  = C1.ccdd 
          left join (select ccdd,  count(*) as t  from comunidad c inner join comunidad_seccion3 s on c.id = s.comunidad_id  where S3_16_2 = 1 group by nom_dd) as C2 on DEP.ccdd  = C2.ccdd 
          left join (select ccdd,  count(*) as t  from comunidad c inner join comunidad_seccion3 s on c.id = s.comunidad_id  where S3_16_3 = 1 group by nom_dd) as C3 on DEP.ccdd  = C3.ccdd
          left join (select ccdd,  count(*) as t  from comunidad c inner join comunidad_seccion3 s on c.id = s.comunidad_id  where S3_16_4 = 1 group by nom_dd) as C4 on DEP.ccdd  = C4.ccdd  
          left join (select ccdd,  count(*) as t  from comunidad c inner join comunidad_seccion3 s on c.id = s.comunidad_id  where S3_16_5 = 1 group by nom_dd) as C5 on DEP.ccdd  = C5.ccdd ;        
        ');
      return $q;
}

function get_tabulado_17()
{         /* TABULADO N° 17 ---->origen contaminacion */
      $q = $this->db->query('
          select 
          DEP.CCDD, DEPARTAMENTO, (COALESCE(C1.t,0) + COALESCE(C2.t,0) + COALESCE(C3.t,0) +  COALESCE(C4.t,0) +  COALESCE(C5.t,0) +  COALESCE(C6.t,0) +  COALESCE(C7.t,0) +  COALESCE(C8.t,0) +  COALESCE(C9.t,0) ) AS TOTAL,   
          COALESCE(C1.t,0) as BASURA, COALESCE(C2.t,0) as DESAGUES, COALESCE(C3.t,0) as PETROLERAS,  COALESCE(C4.t,0) as MINERAS,  COALESCE(C5.t,0) as PESQUERAS,  COALESCE(C6.t,0) as AGRICOLAS,  
          COALESCE(C7.t,0) as DETERGENTE, (COALESCE(C8.t,0)  + COALESCE(C9.t,0) ) as OTRO
          from (select  distinct(departamento), ccdd from marco order by departamento) as DEP 
          left join (select ccdd,  count(*) as t  from comunidad c inner join comunidad_seccion3 s on c.id = s.comunidad_id  where S3_17_1 = 1 group by nom_dd) as C1 on DEP.ccdd  = C1.ccdd 
          left join (select ccdd,  count(*) as t  from comunidad c inner join comunidad_seccion3 s on c.id = s.comunidad_id  where S3_17_2 = 1 group by nom_dd) as C2 on DEP.ccdd  = C2.ccdd 
          left join (select ccdd,  count(*) as t  from comunidad c inner join comunidad_seccion3 s on c.id = s.comunidad_id  where S3_17_3 = 1 group by nom_dd) as C3 on DEP.ccdd  = C3.ccdd
          left join (select ccdd,  count(*) as t  from comunidad c inner join comunidad_seccion3 s on c.id = s.comunidad_id  where S3_17_4 = 1 group by nom_dd) as C4 on DEP.ccdd  = C4.ccdd  
          left join (select ccdd,  count(*) as t  from comunidad c inner join comunidad_seccion3 s on c.id = s.comunidad_id  where S3_17_5 = 1 group by nom_dd) as C5 on DEP.ccdd  = C5.ccdd  
          left join (select ccdd,  count(*) as t  from comunidad c inner join comunidad_seccion3 s on c.id = s.comunidad_id  where S3_17_6 = 1 group by nom_dd) as C6 on DEP.ccdd  = C6.ccdd 
          left join (select ccdd,  count(*) as t  from comunidad c inner join comunidad_seccion3 s on c.id = s.comunidad_id  where S3_17_7 = 1 group by nom_dd) as C7 on DEP.ccdd  = C7.ccdd 
          left join (select ccdd,  count(*) as t  from comunidad c inner join comunidad_seccion3 s on c.id = s.comunidad_id  where S3_17_8 = 1 group by nom_dd) as C8 on DEP.ccdd  = C8.ccdd 
          left join (select ccdd,  count(*) as t  from comunidad c inner join comunidad_seccion3 s on c.id = s.comunidad_id  where S3_17_9 = 1 group by nom_dd) as C9 on DEP.ccdd  = C9.ccdd  ;        
        ');
      return $q;
}

function get_tabulado_18()
{     /* TABULADO N° 18 ---->origen contaminacion */
      $q = $this->db->query('
          select 
          DEP.CCDD, DEPARTAMENTO, (COALESCE(C1.t,0) + COALESCE(C2.t,0) + COALESCE(C3.t,0) +  COALESCE(C4.t,0) +  COALESCE(C5.t,0) +  COALESCE(C6.t,0) +  COALESCE(C7.t,0) +  COALESCE(C8.t,0) ) AS TOTAL,  
          COALESCE(C1.t,0) as DEFORESTACION, COALESCE(C2.t,0) as ENFERMEDADES, COALESCE(C3.t,0) as MORTANDAD,  COALESCE(C4.t,0) as ALEJAMIENTO,  COALESCE(C5.t,0) as PERDIDA,  COALESCE(C6.t,0) as ALTERACION,  
          (COALESCE(C7.t,0) + COALESCE(C8.t,0)  ) as OTRO
          from (select  distinct(departamento), ccdd from marco order by departamento) as DEP 
          left join (select ccdd,  count(*) as t  from comunidad c inner join comunidad_seccion3 s on c.id = s.comunidad_id  where S3_18_1 = 1 group by nom_dd) as C1 on DEP.ccdd  = C1.ccdd 
          left join (select ccdd,  count(*) as t  from comunidad c inner join comunidad_seccion3 s on c.id = s.comunidad_id  where S3_18_2 = 1 group by nom_dd) as C2 on DEP.ccdd  = C2.ccdd 
          left join (select ccdd,  count(*) as t  from comunidad c inner join comunidad_seccion3 s on c.id = s.comunidad_id  where S3_18_3 = 1 group by nom_dd) as C3 on DEP.ccdd  = C3.ccdd
          left join (select ccdd,  count(*) as t  from comunidad c inner join comunidad_seccion3 s on c.id = s.comunidad_id  where S3_18_4 = 1 group by nom_dd) as C4 on DEP.ccdd  = C4.ccdd  
          left join (select ccdd,  count(*) as t  from comunidad c inner join comunidad_seccion3 s on c.id = s.comunidad_id  where S3_18_5 = 1 group by nom_dd) as C5 on DEP.ccdd  = C5.ccdd  
          left join (select ccdd,  count(*) as t  from comunidad c inner join comunidad_seccion3 s on c.id = s.comunidad_id  where S3_18_6 = 1 group by nom_dd) as C6 on DEP.ccdd  = C6.ccdd 
          left join (select ccdd,  count(*) as t  from comunidad c inner join comunidad_seccion3 s on c.id = s.comunidad_id  where S3_18_7 = 1 group by nom_dd) as C7 on DEP.ccdd  = C7.ccdd 
          left join (select ccdd,  count(*) as t  from comunidad c inner join comunidad_seccion3 s on c.id = s.comunidad_id  where S3_18_8 = 1 group by nom_dd) as C8 on DEP.ccdd  = C8.ccdd  ;        
        ');
      return $q;
}

function get_tabulado_19()
{       /* TABULADO N° 19 ---->tipo de violencia*/
      $q = $this->db->query('
          select 
          DEP.CCDD, DEPARTAMENTO, (COALESCE(C1.t,0) + COALESCE(C2.t,0) + COALESCE(C3.t,0) +  COALESCE(C4.t,0) +  COALESCE(C5.t,0) ) AS TOTAL,  
          COALESCE(C1.t,0) as DOMESTICA, COALESCE(C2.t,0) as SEXUAL, COALESCE(C3.t,0) as ASALTOS,  COALESCE(C4.t,0) as OTRO,  COALESCE(C5.t,0) as NINGUNA
          from (select  distinct(departamento), ccdd from marco order by departamento) as DEP 
          left join (select ccdd,  count(*) as t  from comunidad c inner join comunidad_seccion3 s on c.id = s.comunidad_id  where S3_19_1 = 1 group by nom_dd) as C1 on DEP.ccdd  = C1.ccdd 
          left join (select ccdd,  count(*) as t  from comunidad c inner join comunidad_seccion3 s on c.id = s.comunidad_id  where S3_19_2 = 1 group by nom_dd) as C2 on DEP.ccdd  = C2.ccdd 
          left join (select ccdd,  count(*) as t  from comunidad c inner join comunidad_seccion3 s on c.id = s.comunidad_id  where S3_19_3 = 1 group by nom_dd) as C3 on DEP.ccdd  = C3.ccdd
          left join (select ccdd,  count(*) as t  from comunidad c inner join comunidad_seccion3 s on c.id = s.comunidad_id  where S3_19_4 = 1 group by nom_dd) as C4 on DEP.ccdd  = C4.ccdd  
          left join (select ccdd,  count(*) as t  from comunidad c inner join comunidad_seccion3 s on c.id = s.comunidad_id  where S3_19_5 = 1 group by nom_dd) as C5 on DEP.ccdd  = C5.ccdd ;        
        ');
      return $q;
}

function get_tabulado_20()
{       /* TABULADO N° 20 ------->  existe centros educativos */
      $q = $this->db->query("
          select 
          DEP.CCDD, DEPARTAMENTO, (COALESCE(C1.t,0) + COALESCE(C2.t,0) ) AS TOTAL,  
          COALESCE(C1.t,0) as SI, COALESCE(C2.t,0) as 'NO'
          from (select  distinct(departamento), ccdd from marco order by departamento) as DEP 
          left join (select ccdd,  count(*) as t  from comunidad c inner join comunidad_seccion4 s on c.id = s.comunidad_id  where S4_1 = 1 group by nom_dd) as C1 on DEP.ccdd  = C1.ccdd 
          left join (select ccdd,  count(*) as t  from comunidad c inner join comunidad_seccion4 s on c.id = s.comunidad_id  where S4_1 = 2 group by nom_dd) as C2 on DEP.ccdd  = C2.ccdd  ;        
        ");
      return $q;
}

function get_tabulado_21()
{       
      $q = $this->db->query("
     
        ");
      return $q;
}

function get_tabulado_22()
{       
      $q = $this->db->query("
     
        ");
      return $q;
}

function get_tabulado_23()
{       
      $q = $this->db->query("
     
        ");
      return $q;
}

function get_tabulado_24()
{       
      $q = $this->db->query("
     
        ");
      return $q;
}

function get_tabulado_25()
{       
      $q = $this->db->query("
     
        ");
      return $q;
}

function get_tabulado_26()
{       
      $q = $this->db->query("
     
        ");
      return $q;
}

function get_tabulado_27()
{       
      $q = $this->db->query("
     
        ");
      return $q;
}

function get_tabulado_28()
{       
      $q = $this->db->query("
     
        ");
      return $q;
}

function get_tabulado_29()
{       
      $q = $this->db->query("
     
        ");
      return $q;
}

function get_tabulado_30()
{       
      $q = $this->db->query("
     
        ");
      return $q;
}

function get_tabulado_31()
{       
      $q = $this->db->query("
     
        ");
      return $q;
}

function get_tabulado_32()
{       
      $q = $this->db->query("
     
        ");
      return $q;
}

function get_tabulado_33()
{       
      $q = $this->db->query("
     
        ");
      return $q;
}

  /////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
  // T A B U L A D O S  ///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
  /////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////



  /////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
  // P A R A   E X P O  R T A R ///////////////////////////////////////////////////////////////////////////////////////////////////////////////////
  /////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
    function get_all(){

       $q = $this->db->query('
        SELECT

      `comunidad`.`id`,
      `comunidad`.`SEDE_COD`,
      `comunidad`.`NOM_SEDE`,
      `comunidad`.`ODEI_COD`,
      `comunidad`.`NOM_ODEI`,
      `comunidad`.`NFORM` ,
      `comunidad`.`CCDD`,
      `comunidad`.`NOM_DD` ,
      `comunidad`.`CCPP` ,
      `comunidad`.`NOM_PP` ,
      `comunidad`.`CCDI` ,
      `comunidad`.`NOM_DI` ,
      `comunidad`.`COD_CCPP`,
      `comunidad`.`NOM_CCPP`,
      `comunidad_seccion2`.`S2_1_AP` ,
      `comunidad_seccion2`.`S2_1_AM`,
      `comunidad_seccion2`.`S2_1_NOM`,
      `comunidad_seccion2`.`S2_2_CARGO`,
      `comunidad_seccion2`.`S2_3_A`,
      `comunidad_seccion2`.`S2_3_M`,
      `comunidad_seccion2`.`S2_4`,
      `comunidad_seccion2`.`S2_5`,
      `comunidad_seccion2`.`S2_6`,
      `comunidad_seccion2`.`S2_7`,
      `comunidad_seccion2`.`S2_8`,
      `comunidad_seccion2`.`S2_9`,
      `comunidad_seccion2`.`S2_10_DD`,
      `comunidad_seccion2`.`S2_10_DD_COD` ,
      `comunidad_seccion2`.`S2_10_PP` ,
      `comunidad_seccion2`.`S2_10_PP_COD`,
      `comunidad_seccion2`.`S2_10_DI` ,
      `comunidad_seccion2`.`S2_10_DI_COD`,
      `comunidad_seccion2`.`S2_10_CCPP` ,
      `comunidad_seccion2`.`S2_10_CCPP_COD`,
      `comunidad_seccion3`.`S3_1` ,
      `comunidad_seccion3`.`S3_1_O` ,
      `comunidad_seccion3`.`S3_2` ,
      `comunidad_seccion3`.`S3_3` ,
      `comunidad_seccion3`.`S3_4_1` ,
      `comunidad_seccion3`.`S3_4_2` ,
      `comunidad_seccion3`.`S3_4_3` ,
      `comunidad_seccion3`.`S3_4_4` ,
      `comunidad_seccion3`.`S3_4_4_O` ,
      `comunidad_seccion3`.`S3_5_1` ,
      `comunidad_seccion3`.`S3_5_2` ,
      `comunidad_seccion3`.`S3_5_3` ,
      `comunidad_seccion3`.`S3_6_1` ,
      `comunidad_seccion3`.`S3_6_2` ,
      `comunidad_seccion3`.`S3_6_3` ,
      `comunidad_seccion3`.`S3_6_4` ,
      `comunidad_seccion3`.`S3_6_5` ,
      `comunidad_seccion3`.`S3_6_5_O` ,
      `comunidad_seccion3`.`S3_7` ,
      `comunidad_seccion3`.`S3_8_1` ,
      `comunidad_seccion3`.`S3_8_2` ,
      `comunidad_seccion3`.`S3_8_3` ,
      `comunidad_seccion3`.`S3_8_4` ,
      `comunidad_seccion3`.`S3_8_4_O` ,
      `comunidad_seccion3`.`S3_9_1` ,
      `comunidad_seccion3`.`S3_9_2` ,
      `comunidad_seccion3`.`S3_9_3` ,
      `comunidad_seccion3`.`S3_9_4` ,
      `comunidad_seccion3`.`S3_9_5` ,
      `comunidad_seccion3`.`S3_9_6` ,
      `comunidad_seccion3`.`S3_10_1` ,
      `comunidad_seccion3`.`S3_10_2` ,
      `comunidad_seccion3`.`S3_10_3` ,
      `comunidad_seccion3`.`S3_10_4` ,
      `comunidad_seccion3`.`S3_10_5` ,
      `comunidad_seccion3`.`S3_10_5_O` ,
      `comunidad_seccion3`.`S3_11_1` ,
      `comunidad_seccion3`.`S3_11_2` ,
      `comunidad_seccion3`.`S3_11_3` ,
      `comunidad_seccion3`.`S3_11_4` ,
      `comunidad_seccion3`.`S3_11_5` ,
      `comunidad_seccion3`.`S3_11_6` ,
      `comunidad_seccion3`.`S3_12_1` ,
      `comunidad_seccion3`.`S3_12_2` ,
      `comunidad_seccion3`.`S3_12_3` ,
      `comunidad_seccion3`.`S3_12_4` ,
      `comunidad_seccion3`.`S3_12_5` ,
      `comunidad_seccion3`.`S3_12_6` ,
      `comunidad_seccion3`.`S3_12_6_O` ,
      `comunidad_seccion3`.`S3_13` ,
      `comunidad_seccion3`.`S3_14` ,
      `comunidad_seccion3`.`S3_15` ,
      `comunidad_seccion3`.`S3_16_1` ,
      `comunidad_seccion3`.`S3_16_2` ,
      `comunidad_seccion3`.`S3_16_3` ,
      `comunidad_seccion3`.`S3_16_4` ,
      `comunidad_seccion3`.`S3_16_5` ,
      `comunidad_seccion3`.`S3_16_5_O` ,
      `comunidad_seccion3`.`S3_17_1` ,
      `comunidad_seccion3`.`S3_17_2` ,
      `comunidad_seccion3`.`S3_17_3` ,
      `comunidad_seccion3`.`S3_17_4` ,
      `comunidad_seccion3`.`S3_17_5` ,
      `comunidad_seccion3`.`S3_17_6` ,
      `comunidad_seccion3`.`S3_17_7` ,
      `comunidad_seccion3`.`S3_17_8` ,
      `comunidad_seccion3`.`S3_17_8_O` ,
      `comunidad_seccion3`.`S3_17_9` ,
      `comunidad_seccion3`.`S3_17_9_O` ,
      `comunidad_seccion3`.`S3_18_1` ,
      `comunidad_seccion3`.`S3_18_2` ,
      `comunidad_seccion3`.`S3_18_3` ,
      `comunidad_seccion3`.`S3_18_4` ,
      `comunidad_seccion3`.`S3_18_5` ,
      `comunidad_seccion3`.`S3_18_6` ,
      `comunidad_seccion3`.`S3_18_7` ,
      `comunidad_seccion3`.`S3_18_7_O` ,
      `comunidad_seccion3`.`S3_18_8` ,
      `comunidad_seccion3`.`S3_18_8_O` ,
      `comunidad_seccion3`.`S3_19_1` ,
      `comunidad_seccion3`.`S3_19_2` ,
      `comunidad_seccion3`.`S3_19_3` ,
      `comunidad_seccion3`.`S3_19_4` ,
      `comunidad_seccion3`.`S3_19_4_O` ,
      `comunidad_seccion3`.`S3_19_5` ,
      `comunidad_seccion3`.`S3_20_1` ,
      `comunidad_seccion3`.`S3_21_1_1_H` ,
      `comunidad_seccion3`.`S3_21_2_1_M` ,
      `comunidad_seccion3`.`S3_22_1_V` ,
      `comunidad_seccion3`.`S3_20_2` ,
      `comunidad_seccion3`.`S3_21_1_2_H` ,
      `comunidad_seccion3`.`S3_21_2_2_M` ,
      `comunidad_seccion3`.`S3_22_2_V` ,
      `comunidad_seccion3`.`S3_20_3` ,
      `comunidad_seccion3`.`S3_21_1_3_H` ,
      `comunidad_seccion3`.`S3_21_2_3_M` ,
      `comunidad_seccion3`.`S3_22_3_V` ,
      `comunidad_seccion3`.`S3_20_4` ,
      `comunidad_seccion3`.`S3_21_1_4_H` ,
      `comunidad_seccion3`.`S3_21_2_4_M` ,
      `comunidad_seccion3`.`S3_22_4_V` ,
      `comunidad_seccion3`.`S3_20_5` ,
      `comunidad_seccion3`.`S3_21_1_5_H` ,
      `comunidad_seccion3`.`S3_21_2_5_M` ,
      `comunidad_seccion3`.`S3_22_5_V` ,
      `comunidad_seccion3`.`S3_20_6` ,
      `comunidad_seccion3`.`S3_21_1_6_H` ,
      `comunidad_seccion3`.`S3_21_2_6_M` ,
      `comunidad_seccion3`.`S3_20_7` ,
      `comunidad_seccion3`.`S3_21_1_7_H` ,
      `comunidad_seccion3`.`S3_21_2_7_M` ,
      `comunidad_seccion3`.`S3_20_8` ,
      `comunidad_seccion3`.`S3_21_1_8_H` ,
      `comunidad_seccion3`.`S3_21_2_8_M` ,
      `comunidad_seccion3`.`S3_20_9` ,
      `comunidad_seccion3`.`S3_21_1_9_H` ,
      `comunidad_seccion3`.`S3_21_2_9_M` ,
      `comunidad_seccion4`.`S4_1` ,
      `comunidad_seccion4`.`S4_1_C` ,
      `comunidad_seccion4`.`S4_2_1` ,
      `comunidad_seccion4`.`S4_2_2` ,
      `comunidad_seccion4`.`S4_2_3` ,
      `comunidad_seccion4`.`S4_2_4` ,
      `comunidad_seccion4`.`S4_2_5` ,
      `comunidad_seccion4`.`S4_3_1` ,
      `comunidad_seccion4`.`S4_3_2` ,
      `comunidad_seccion4`.`S4_3_3` ,
      `comunidad_seccion4`.`S4_3_4` ,
      `comunidad_seccion4`.`S4_3_5` ,
      `comunidad_seccion4`.`S4_3_6` ,
      `comunidad_seccion4`.`S4_3_7` ,
      `comunidad_seccion4`.`S4_3_8` ,
      `comunidad_seccion4`.`S4_3_9` ,
      `comunidad_seccion4`.`S4_3_10` ,
      `comunidad_seccion4`.`S4_3_11` ,
      `comunidad_seccion4`.`S4_3_12` ,
      `comunidad_seccion4`.`S4_3_13` ,

      `comunidad_seccion5`.`S5_1` ,
      `comunidad_seccion5`.`S5_2_1` ,
      `comunidad_seccion5`.`S5_2_2` ,
      `comunidad_seccion5`.`S5_2_3` ,
      `comunidad_seccion5`.`S5_2_4` ,
      `comunidad_seccion5`.`S5_2_5` ,
      `comunidad_seccion5`.`S5_2_6` ,
      `comunidad_seccion5`.`S5_2_7` ,
      `comunidad_seccion5`.`S5_2_7_O` ,
      `comunidad_seccion5`.`S5_3_1` ,
      `comunidad_seccion5`.`S5_3_2` ,
      `comunidad_seccion5`.`S5_3_3` ,
      `comunidad_seccion5`.`S5_3_4` ,
      `comunidad_seccion5`.`S5_3_5` ,
      `comunidad_seccion5`.`S5_3_6` ,
      `comunidad_seccion5`.`S5_3_7` ,
      `comunidad_seccion5`.`S5_3_8` ,
      `comunidad_seccion5`.`S5_3_9` ,
      `comunidad_seccion5`.`S5_3_10` ,
      `comunidad_seccion5`.`S5_3_11` ,
      `comunidad_seccion5`.`S5_3_12` ,
      `comunidad_seccion5`.`S5_3_13` ,
      `comunidad_seccion5`.`S5_3_14` ,
      `comunidad_seccion5`.`S5_3_15` ,
      `comunidad_seccion5`.`S5_3_16` ,
      `comunidad_seccion5`.`S5_3_17` ,
      `comunidad_seccion5`.`S5_3_17_O` ,

      `comunidad_seccion6`.`S6_1` ,
      `comunidad_seccion6`.`S6_2_1_A` ,
      `comunidad_seccion6`.`S6_2_2_A` ,
      `comunidad_seccion6`.`S6_2_3_A` ,
      `comunidad_seccion6`.`S6_3_1` ,
      `comunidad_seccion6`.`S6_3_2` ,
      `comunidad_seccion6`.`S6_3_3` ,
      `comunidad_seccion6`.`S6_3_4` ,
      `comunidad_seccion6`.`S6_3_5` ,
      `comunidad_seccion6`.`S6_3_6` ,
      `comunidad_seccion6`.`S6_3_6_O` ,
      `comunidad_seccion6`.`S6_3_7` ,
      `comunidad_seccion6`.`S6_4_1` ,
      `comunidad_seccion6`.`S6_4_2` ,
      `comunidad_seccion6`.`S6_4_3` ,
      `comunidad_seccion6`.`S6_4_4` ,
      `comunidad_seccion6`.`S6_4_5` ,
      `comunidad_seccion6`.`S6_4_6` ,
      `comunidad_seccion6`.`S6_4_7` ,
      `comunidad_seccion6`.`S6_4_8` ,
      `comunidad_seccion6`.`S6_4_9` ,
      `comunidad_seccion6`.`S6_4_10` ,
      `comunidad_seccion6`.`S6_4_11` ,
      `comunidad_seccion6`.`S6_4_12` ,
      `comunidad_seccion6`.`S6_4_13` ,
      `comunidad_seccion6`.`S6_4_14` ,
      `comunidad_seccion6`.`S6_4_15` ,
      `comunidad_seccion6`.`S6_4_15_O` ,

      `comunidad_seccion7`.`S7_1_1` ,
      `comunidad_seccion7`.`S7_1_2` ,
      `comunidad_seccion7`.`S7_1_3` ,
      `comunidad_seccion7`.`S7_1_4` ,
      `comunidad_seccion7`.`S7_1_5` ,
      `comunidad_seccion7`.`S7_1_6` ,
      `comunidad_seccion7`.`S7_1_7` ,
      `comunidad_seccion7`.`S7_1_8` ,
      `comunidad_seccion7`.`S7_1_9` ,
      `comunidad_seccion7`.`S7_1_9_O` ,
      `comunidad_seccion7`.`S7_2_1` ,
      `comunidad_seccion7`.`S7_2_1_F` ,
      `comunidad_seccion7`.`S7_2_2` ,
      `comunidad_seccion7`.`S7_2_2_F` ,
      `comunidad_seccion7`.`S7_2_3` ,
      `comunidad_seccion7`.`S7_2_3_F` ,
      `comunidad_seccion7`.`S7_2_4` ,
      `comunidad_seccion7`.`S7_2_4_F` ,
      `comunidad_seccion7`.`S7_2_5` ,
      `comunidad_seccion7`.`S7_2_5_F` ,
      `comunidad_seccion7`.`S7_2_6` ,
      `comunidad_seccion7`.`S7_2_6_F` ,
      `comunidad_seccion7`.`S7_2_7` ,
      `comunidad_seccion7`.`S7_2_7_F` ,
      `comunidad_seccion7`.`S7_2_8` ,
      `comunidad_seccion7`.`S7_2_8_O` ,
      `comunidad_seccion7`.`S7_2_8_F` ,
      `comunidad_seccion7`.`S7_2_9` ,
      `comunidad_seccion7`.`S7_3_1` ,
      `comunidad_seccion7`.`S7_3_2` ,
      `comunidad_seccion7`.`S7_3_3` ,
      `comunidad_seccion7`.`S7_3_4` ,
      `comunidad_seccion7`.`S7_3_5` ,
      `comunidad_seccion7`.`S7_3_6` ,
      `comunidad_seccion7`.`S7_3_7` ,
      `comunidad_seccion7`.`S7_3_8` ,
      `comunidad_seccion7`.`S7_3_9` ,
      `comunidad_seccion7`.`S7_3_10` ,
      `comunidad_seccion7`.`S7_3_11` ,
      `comunidad_seccion7`.`S7_3_12` ,
      `comunidad_seccion7`.`S7_4_1` ,
      `comunidad_seccion7`.`S7_4_2` ,
      `comunidad_seccion7`.`S7_4_3` ,
      `comunidad_seccion7`.`S7_4_4` ,
      `comunidad_seccion7`.`S7_4_5` ,
      `comunidad_seccion7`.`S7_4_6` ,
      `comunidad_seccion7`.`S7_4_7` ,
      `comunidad_seccion7`.`S7_4_8` ,
      `comunidad_seccion7`.`S7_4_9` ,
      `comunidad_seccion7`.`S7_4_10` ,
      `comunidad_seccion7`.`S7_4_11` ,
      `comunidad_seccion7`.`S7_4_12` ,
      `comunidad_seccion7`.`S7_5_1` ,
      `comunidad_seccion7`.`S7_5_2` ,
      `comunidad_seccion7`.`S7_5_3` ,
      `comunidad_seccion7`.`S7_5_4` ,
      `comunidad_seccion7`.`S7_5_5` ,
      `comunidad_seccion7`.`S7_5_6` ,
      `comunidad_seccion7`.`S7_5_7` ,
      `comunidad_seccion7`.`S7_5_8` ,
      `comunidad_seccion7`.`S7_5_9` ,
      `comunidad_seccion7`.`S7_5_10` ,
      `comunidad_seccion7`.`S7_5_11` ,
      `comunidad_seccion7`.`S7_5_12` ,
      `comunidad_seccion7`.`S7_5_13` ,
      `comunidad_seccion7`.`S7_5_14` ,
      `comunidad_seccion7`.`S7_5_15` ,
      `comunidad_seccion7`.`S7_5_16` ,
      `comunidad_seccion7`.`S7_5_17` ,
      `comunidad_seccion7`.`S7_5_18` ,
      `comunidad_seccion7`.`S7_5_19` ,
      `comunidad_seccion7`.`S7_5_20` ,
      `comunidad_seccion7`.`S7_5_21` ,
      `comunidad_seccion7`.`S7_5_22` ,
      `comunidad_seccion7`.`S7_5_23` ,
      `comunidad_seccion7`.`S7_5_24` ,
      `comunidad_seccion7`.`S7_5_25` ,
      `comunidad_seccion7`.`S7_5_26` ,
      `comunidad_seccion7`.`S7_5_27` ,
      `comunidad_seccion7`.`S7_5_28` ,
      `comunidad_seccion7`.`S7_5_29` ,
      `comunidad_seccion7`.`S7_5_30` ,
      `comunidad_seccion7`.`S7_5_31` ,
      `comunidad_seccion7`.`S7_5_32` ,
      `comunidad_seccion7`.`S7_5_33` ,
      `comunidad_seccion7`.`S7_5_34` ,
      `comunidad_seccion7`.`S7_5_35` ,
      `comunidad_seccion7`.`S7_5_36` ,
      `comunidad_seccion7`.`S7_5_37` ,
      `comunidad_seccion7`.`S7_5_38` ,
      `comunidad_seccion7`.`S7_5_39` ,
      `comunidad_seccion7`.`S7_5_40` ,
      `comunidad_seccion7`.`S7_5_41` ,
      `comunidad_seccion7`.`S7_5_41_O` ,
      `comunidad_seccion7`.`S7_5_42` ,
      `comunidad_seccion7`.`S7_5_43` ,
      `comunidad_seccion7`.`S7_5_44` ,
      `comunidad_seccion7`.`S7_5_45` ,
      `comunidad_seccion7`.`S7_5_46` ,
      `comunidad_seccion7`.`S7_5_47` ,
      `comunidad_seccion7`.`S7_5_48` ,
      `comunidad_seccion7`.`S7_5_49` ,
      `comunidad_seccion7`.`S7_5_49_O` ,
      `comunidad_seccion7`.`S7_6_1` ,
      `comunidad_seccion7`.`S7_6_2` ,
      `comunidad_seccion7`.`S7_6_3` ,
      `comunidad_seccion7`.`S7_6_3_O` ,
      `comunidad_seccion7`.`S7_6_4` ,
      `comunidad_seccion7`.`S7_7_1` ,
      `comunidad_seccion7`.`S7_7_2` ,
      `comunidad_seccion7`.`S7_7_3` ,
      `comunidad_seccion7`.`S7_7_4` ,
      `comunidad_seccion7`.`S7_7_5` ,
      `comunidad_seccion7`.`S7_7_6` ,
      `comunidad_seccion7`.`S7_7_7` ,
      `comunidad_seccion7`.`S7_7_8` ,
      `comunidad_seccion7`.`S7_7_9` ,
      `comunidad_seccion7`.`S7_7_10` ,
      `comunidad_seccion7`.`S7_7_11` ,
      `comunidad_seccion7`.`S7_7_12` ,
      `comunidad_seccion7`.`S7_7_13` ,
      `comunidad_seccion7`.`S7_7_14` ,
      `comunidad_seccion7`.`S7_7_14_O` ,
      `comunidad_seccion7`.`S7_7_15` ,
      `comunidad_seccion7`.`S7_7_15_O` ,
      `comunidad_seccion7`.`S7_7_16` ,
      `comunidad_seccion7`.`S7_8_1` ,
      `comunidad_seccion7`.`S7_8_2` ,
      `comunidad_seccion7`.`S7_8_3` ,
      `comunidad_seccion7`.`S7_8_4` ,
      `comunidad_seccion7`.`S7_8_5` ,
      `comunidad_seccion7`.`S7_8_6` ,
      `comunidad_seccion7`.`S7_8_7` ,
      `comunidad_seccion7`.`S7_8_8` ,
      `comunidad_seccion7`.`S7_8_9` ,
      `comunidad_seccion7`.`S7_8_10` ,
      `comunidad_seccion7`.`S7_8_11` ,
      `comunidad_seccion7`.`S7_8_12` ,
      `comunidad_seccion7`.`S7_8_13` ,
      `comunidad_seccion7`.`S7_8_14` ,
      `comunidad_seccion7`.`S7_8_15` ,
      `comunidad_seccion7`.`S7_8_16` ,
      `comunidad_seccion7`.`S7_8_17` ,
      `comunidad_seccion7`.`S7_8_18` ,
      `comunidad_seccion7`.`S7_8_18_O` ,
      `comunidad_seccion7`.`S7_8_19` ,
      `comunidad_seccion7`.`S7_9_1` ,
      `comunidad_seccion7`.`S7_9_2` ,
      `comunidad_seccion7`.`S7_9_3` ,
      `comunidad_seccion7`.`S7_9_4` ,
      `comunidad_seccion7`.`S7_9_5` ,
      `comunidad_seccion7`.`S7_9_6` ,
      `comunidad_seccion7`.`S7_9_7` ,
      `comunidad_seccion7`.`S7_9_8` ,
      `comunidad_seccion7`.`S7_9_9` ,
      `comunidad_seccion7`.`S7_9_10` ,
      `comunidad_seccion7`.`S7_9_11` ,
      `comunidad_seccion7`.`S7_9_12` ,
      `comunidad_seccion7`.`S7_9_13` ,
      `comunidad_seccion7`.`S7_9_13_O` ,
      `comunidad_seccion7`.`S7_10_1` ,
      `comunidad_seccion7`.`S7_10_2` ,
      `comunidad_seccion7`.`S7_10_3` ,
      `comunidad_seccion7`.`S7_10_4` ,
      `comunidad_seccion7`.`S7_10_5` ,
      `comunidad_seccion7`.`S7_10_6` ,
      `comunidad_seccion7`.`S7_10_7` ,
      `comunidad_seccion7`.`S7_10_8` ,
      `comunidad_seccion7`.`S7_10_9` ,
      `comunidad_seccion7`.`S7_10_9_O` ,
      `comunidad_seccion7`.`S7_11` ,
      `comunidad_seccion7`.`S7_12_1` ,
      `comunidad_seccion7`.`S7_12_1_N` ,
      `comunidad_seccion7`.`S7_12_2` ,
      `comunidad_seccion7`.`S7_12_2_N` ,
      `comunidad_seccion7`.`S7_12_3` ,
      `comunidad_seccion7`.`S7_12_3_N` ,
      `comunidad_seccion7`.`S7_12_4` ,
      `comunidad_seccion7`.`S7_12_4_O` ,
      `comunidad_seccion7`.`S7_12_4_N` ,
      `comunidad_seccion7`.`S7_13_1` ,
      `comunidad_seccion7`.`S7_13_2` ,
      `comunidad_seccion7`.`S7_13_3` ,
      `comunidad_seccion7`.`S7_13_4` ,
      `comunidad_seccion7`.`S7_13_5` ,
      `comunidad_seccion7`.`S7_13_6` ,
      `comunidad_seccion7`.`S7_13_7` ,
      `comunidad_seccion7`.`S7_13_8` ,
      `comunidad_seccion7`.`S7_13_9` ,
      `comunidad_seccion7`.`S7_13_10` ,
      `comunidad_seccion7`.`S7_13_11` ,
      `comunidad_seccion7`.`S7_13_12` ,
      `comunidad_seccion7`.`S7_13_12_O` ,
      `comunidad_seccion7`.`S7_14` ,
      `comunidad_seccion7`.`S7_15` ,
      `comunidad_seccion7`.`S7_15_O` ,
      `comunidad_seccion7`.`S7_16_1` ,
      `comunidad_seccion7`.`S7_16_2` ,
      `comunidad_seccion7`.`S7_16_3` ,
      `comunidad_seccion7`.`S7_16_4` ,
      `comunidad_seccion7`.`S7_16_5` ,

      `comunidad_seccion8`.`S8_1` ,
      `comunidad_seccion8`.`S8_2_1` ,
      `comunidad_seccion8`.`S8_2_1_1` ,
      `comunidad_seccion8`.`S8_2_2` ,
      `comunidad_seccion8`.`S8_2_2_1` ,
      `comunidad_seccion8`.`S8_2_3` ,
      `comunidad_seccion8`.`S8_2_3_1` ,
      `comunidad_seccion8`.`S8_2_4` ,
      `comunidad_seccion8`.`S8_2_4_1` ,
      `comunidad_seccion8`.`S8_2_5` ,
      `comunidad_seccion8`.`S8_2_5_1` ,
      `comunidad_seccion8`.`S8_2_6` ,
      `comunidad_seccion8`.`S8_2_6_1` ,
      `comunidad_seccion8`.`S8_2_7` ,
      `comunidad_seccion8`.`S8_2_7_1` ,
      `comunidad_seccion8`.`S8_2_8` ,
      `comunidad_seccion8`.`S8_2_8_1` ,
      `comunidad_seccion8`.`S8_2_9` ,
      `comunidad_seccion8`.`S8_2_9_1` ,
      `comunidad_seccion8`.`S8_2_10` ,
      `comunidad_seccion8`.`S8_2_10_1` ,
      `comunidad_seccion8`.`S8_2_11` ,
      `comunidad_seccion8`.`S8_2_11_1` ,
      `comunidad_seccion8`.`S8_2_12` ,
      `comunidad_seccion8`.`S8_2_12_O` ,
      `comunidad_seccion8`.`S8_2_12_1` ,
      `comunidad_seccion8`.`S8_3_1` ,
      `comunidad_seccion8`.`S8_3_2` ,
      `comunidad_seccion8`.`S8_3_3` ,
      `comunidad_seccion8`.`S8_3_4` ,
      `comunidad_seccion8`.`S8_3_5` ,
      `comunidad_seccion8`.`S8_3_6` ,
      `comunidad_seccion8`.`S8_3_7` ,
      `comunidad_seccion8`.`S8_3_8` ,
      `comunidad_seccion8`.`S8_3_9` ,
      `comunidad_seccion8`.`S8_3_10` ,
      `comunidad_seccion8`.`S8_3_10_O` ,
      `comunidad_seccion8`.`S8_4_1` ,
      `comunidad_seccion8`.`S8_4_2` ,
      `comunidad_seccion8`.`S8_4_3` ,
      `comunidad_seccion8`.`S8_4_4` ,
      `comunidad_seccion8`.`S8_4_5` ,
      `comunidad_seccion8`.`S8_4_6` ,

      `comunidad_info`.`OBS` ,
      `comunidad_info`.`F_D` ,
      `comunidad_info`.`F_M` ,
      `comunidad_info`.`F_A` ,
      `comunidad_info`.`RES` ,
      `comunidad_info`.`EMP` ,
      `comunidad_info`.`EMP_DNI` 

        FROM `cenpesco`.`comunidad`
        INNER JOIN `cenpesco`.`comunidad_seccion2` ON  `comunidad`.`id`= `comunidad_seccion2`.`comunidad_id`
        INNER JOIN `cenpesco`.`comunidad_seccion3` ON  `comunidad`.`id`= `comunidad_seccion3`.`comunidad_id`
        INNER JOIN `cenpesco`.`comunidad_seccion4` ON  `comunidad`.`id`= `comunidad_seccion4`.`comunidad_id`
        INNER JOIN `cenpesco`.`comunidad_seccion5` ON  `comunidad`.`id`= `comunidad_seccion5`.`comunidad_id`
        INNER JOIN `cenpesco`.`comunidad_seccion6` ON  `comunidad`.`id`= `comunidad_seccion6`.`comunidad_id`
        INNER JOIN `cenpesco`.`comunidad_seccion7` ON  `comunidad`.`id`= `comunidad_seccion7`.`comunidad_id`
        INNER JOIN `cenpesco`.`comunidad_seccion8` ON  `comunidad`.`id`= `comunidad_seccion8`.`comunidad_id`
        INNER JOIN `cenpesco`.`comunidad_info` ON  `comunidad`.`id`= `comunidad_info`.`comunidad_id`

        ');

        return $q;  
        // INNER JOIN `cenpesco`.`comunidad_seccion2` ON  `comunidad`.`id`= `comunidad_seccion2`.`comunidad_id`
        // INNER JOIN `cenpesco`.`comunidad_seccion3` ON  `comunidad`.`id`= `comunidad_seccion3`.`comunidad_id`
        // INNER JOIN `cenpesco`.`comunidad_seccion4` ON  `comunidad`.`id`= `comunidad_seccion4`.`comunidad_id`
        // INNER JOIN `cenpesco`.`comunidad_seccion5` ON  `comunidad`.`id`= `comunidad_seccion5`.`comunidad_id`
        // INNER JOIN `cenpesco`.`comunidad_seccion6` ON  `comunidad`.`id`= `comunidad_seccion6`.`comunidad_id`
        // INNER JOIN `cenpesco`.`comunidad_seccion7` ON  `comunidad`.`id`= `comunidad_seccion7`.`comunidad_id`
        // INNER JOIN `cenpesco`.`comunidad_seccion8` ON  `comunidad`.`id`= `comunidad_seccion8`.`comunidad_id`
        // INNER JOIN `cenpesco`.`comunidad_info` ON  `comunidad`.`id`= `comunidad_info`.`comunidad_id`

    }

  /////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
  // P A R A   E X P O  R T A R ///////////////////////////////////////////////////////////////////////////////////////////////////////////////////
  /////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////


}
?>