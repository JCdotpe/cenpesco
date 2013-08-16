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
      `comunidad_seccion3`.`S3_5_3_O` ,
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
      `comunidad_seccion4`.`S4_1_1` ,
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
        LEFT JOIN `cenpesco`.`comunidad_seccion2` ON  `comunidad`.`id`= `comunidad_seccion2`.`comunidad_id`
        LEFT JOIN `cenpesco`.`comunidad_seccion3` ON  `comunidad`.`id`= `comunidad_seccion3`.`comunidad_id`
        LEFT JOIN `cenpesco`.`comunidad_seccion4` ON  `comunidad`.`id`= `comunidad_seccion4`.`comunidad_id`
        LEFT JOIN `cenpesco`.`comunidad_seccion5` ON  `comunidad`.`id`= `comunidad_seccion5`.`comunidad_id`
        LEFT JOIN `cenpesco`.`comunidad_seccion6` ON  `comunidad`.`id`= `comunidad_seccion6`.`comunidad_id`
        LEFT JOIN `cenpesco`.`comunidad_seccion7` ON  `comunidad`.`id`= `comunidad_seccion7`.`comunidad_id`
        LEFT JOIN `cenpesco`.`comunidad_seccion8` ON  `comunidad`.`id`= `comunidad_seccion8`.`comunidad_id`
        LEFT JOIN `cenpesco`.`comunidad_info` ON  `comunidad`.`id`= `comunidad_info`.`comunidad_id`

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


function get_print_emb(){
       $q = $this->db->query('
SELECT
`pesc_seccion9`.`pescador_id`,
`pesc_seccion9`.`S9_1`,
`pesc_seccion9`.`S9_2`,
`pesc_seccion9`.`S9_3_1`,
`pesc_seccion9`.`S9_4_1`,
`pesc_seccion9`.`S9_5_1`,
`pesc_seccion9`.`S9_6_1`,
`pesc_seccion9`.`S9_7_1`,
`pesc_seccion9`.`S9_8_1`,
`pesc_seccion9`.`S9_9_1`,
`pesc_seccion9`.`S9_10_1_A`,
`pesc_seccion9`.`S9_10_1_M`,
`pesc_seccion9`.`S9_11_MED`,
`pesc_seccion9`.`S9_11_1`,
`pesc_seccion9`.`S9_11_2`,
`pesc_seccion9`.`S9_11_3`,
`pesc_seccion9`.`S9_12_MED`,
`pesc_seccion9`.`S9_12_1`,
`pesc_seccion9`.`S9_12_2`,
`pesc_seccion9`.`S9_12_3`
FROM `cenpesco`.`pesc_seccion9`
');
       return $q; 
}

}
?>