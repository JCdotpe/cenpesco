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


    function get_print(){
       $q = $this->db->query('
SELECT
`pescador`.`id`,
`pescador`.`NFORM`,
`pescador`.`CCDD`,
`pescador`.`NOM_DD`,
`pescador`.`CCPP`,
`pescador`.`NOM_PP`,
`pescador`.`CCDI`,
`pescador`.`NOM_DI`,
`pescador`.`COD_CCPP`,
`pescador`.`NOM_CCPP`,
`pesc_seccion2`.`S2_1_AP`,
`pesc_seccion2`.`S2_1_AM`,
`pesc_seccion2`.`S2_1_NOM`,
`pesc_seccion2`.`S2_2D`,
`pesc_seccion2`.`S2_2M`,
`pesc_seccion2`.`S2_2A`,
`pesc_seccion2`.`S2_3`,
`pesc_seccion2`.`S2_4`,
`pesc_seccion2`.`S2_5`,
`pesc_seccion2`.`S2_6`,
`pesc_seccion2`.`S2_7`,
`pesc_seccion2`.`S2_8`,
`pesc_seccion2`.`S2_9_DD`,
`pesc_seccion2`.`S2_9_DD_COD`,
`pesc_seccion2`.`S2_9_PP`,
`pesc_seccion2`.`S2_9_PP_COD`,
`pesc_seccion2`.`S2_9_DI`,
`pesc_seccion2`.`S2_9_DI_COD`,
`pesc_seccion2`.`S2_9_CCPP`,
`pesc_seccion2`.`S2_9_CCPP_COD`,
`pesc_seccion2`.`TIPVIA`,
`pesc_seccion2`.`NOMVIA`,
`pesc_seccion2`.`PTANUM`,
`pesc_seccion2`.`BLOCK`,
`pesc_seccion2`.`INT`,
`pesc_seccion2`.`PISO`,
`pesc_seccion2`.`MZ`,
`pesc_seccion2`.`LOTE`,
`pesc_seccion2`.`KM`,
`pesc_seccion2`.`S2_10_DD`,
`pesc_seccion2`.`S2_10_DD_COD`,
`pesc_seccion2`.`S2_10_PP`,
`pesc_seccion2`.`S2_10_PP_COD`,
`pesc_seccion2`.`S2_10_DI`,
`pesc_seccion2`.`S2_10_DI_COD`,
`pesc_seccion2`.`S2_11_DD`,
`pesc_seccion2`.`S2_11_DD_COD`,
`pesc_seccion2`.`S2_11_PP`,
`pesc_seccion2`.`S2_11_PP_COD`,
`pesc_seccion2`.`S2_11_DI`,
`pesc_seccion2`.`S2_11_DI_COD`,
`pesc_seccion2`.`S2_12`,
`pesc_seccion2`.`S2_12G`,
`pesc_seccion2`.`S2_12A`,
`pesc_seccion2`.`S2_13`,
`pesc_seccion2`.`S2_14`,
`pesc_seccion2`.`S2_14_O`,
`pesc_seccion2`.`S2_15_1`,
`pesc_seccion2`.`S2_15_2`,
`pesc_seccion2`.`S2_15_3`,
`pesc_seccion2`.`S2_15_3_O`,
`pesc_seccion2`.`S2_16`,
`pesc_seccion2`.`S2_17`,
`pesc_seccion2`.`S2_18`,
`pesc_seccion2`.`S2_18G`,
`pesc_seccion2`.`S2_18A`,
`pesc_seccion2`.`S2_19_1`,
`pesc_seccion2`.`S2_19_2`,
`pesc_seccion2`.`S2_19_3`,
`pesc_seccion2`.`S2_19_4`,
`pesc_seccion2`.`S2_19_5`,
`pesc_seccion2`.`S2_19_5_O`,
`pesc_seccion2`.`S2_20`,
`pesc_seccion2`.`S2_21`,
`pesc_seccion2`.`S2_22_1_1`,
`pesc_seccion2`.`S2_22_2_1`,
`pesc_seccion2`.`S2_22_3_1`,
`pesc_seccion2`.`S2_22_4_1`,
`pesc_seccion2`.`S2_22_5_1`,
`pesc_seccion2`.`S2_22_6_1`,
`pesc_seccion2`.`S2_22_7_1`,
`pesc_seccion2`.`S2_22_8_1`,
`pesc_seccion2`.`S2_22_9_1`,
`pesc_seccion2`.`S2_22_1_2`,
`pesc_seccion2`.`S2_22_2_2`,
`pesc_seccion2`.`S2_22_3_2`,
`pesc_seccion2`.`S2_22_4_2`,
`pesc_seccion2`.`S2_22_5_2`,
`pesc_seccion2`.`S2_22_6_2`,
`pesc_seccion2`.`S2_22_7_2`,
`pesc_seccion2`.`S2_22_8_2`,
`pesc_seccion2`.`S2_22_9_2`,
`pesc_seccion2`.`S2_22_1_3`,
`pesc_seccion2`.`S2_22_2_3`,
`pesc_seccion2`.`S2_22_3_3`,
`pesc_seccion2`.`S2_22_4_3`,
`pesc_seccion2`.`S2_22_5_3`,
`pesc_seccion2`.`S2_22_6_3`,
`pesc_seccion2`.`S2_22_7_3`,
`pesc_seccion2`.`S2_22_8_3`,
`pesc_seccion2`.`S2_22_9_3`,
`pesc_seccion2`.`S2_22_1_4`,
`pesc_seccion2`.`S2_22_2_4`,
`pesc_seccion2`.`S2_22_3_4`,
`pesc_seccion2`.`S2_22_4_4`,
`pesc_seccion2`.`S2_22_5_4`,
`pesc_seccion2`.`S2_22_6_4`,
`pesc_seccion2`.`S2_22_7_4`,
`pesc_seccion2`.`S2_22_8_4`,
`pesc_seccion2`.`S2_22_9_4`,
`pesc_seccion2`.`S2_22_1_5`,
`pesc_seccion2`.`S2_22_2_5`,
`pesc_seccion2`.`S2_22_3_5`,
`pesc_seccion2`.`S2_22_4_5`,
`pesc_seccion2`.`S2_22_5_5`,
`pesc_seccion2`.`S2_22_6_5`,
`pesc_seccion2`.`S2_22_7_5`,
`pesc_seccion2`.`S2_22_8_5`,
`pesc_seccion2`.`S2_22_9_5`,
`pesc_seccion2`.`S2_22_1_6`,
`pesc_seccion2`.`S2_22_2_6`,
`pesc_seccion2`.`S2_22_3_6`,
`pesc_seccion2`.`S2_22_4_6`,
`pesc_seccion2`.`S2_22_5_6`,
`pesc_seccion2`.`S2_22_6_6`,
`pesc_seccion2`.`S2_22_7_6`,
`pesc_seccion2`.`S2_22_8_6`,
`pesc_seccion2`.`S2_22_9_6`,
`pesc_seccion2`.`S2_22_1_7`,
`pesc_seccion2`.`S2_22_2_7`,
`pesc_seccion2`.`S2_22_3_7`,
`pesc_seccion2`.`S2_22_4_7`,
`pesc_seccion2`.`S2_22_5_7`,
`pesc_seccion2`.`S2_22_6_7`,
`pesc_seccion2`.`S2_22_7_7`,
`pesc_seccion2`.`S2_22_8_7`,
`pesc_seccion2`.`S2_22_9_7`,
`pesc_seccion2`.`S2_22_1_8`,
`pesc_seccion2`.`S2_22_2_8`,
`pesc_seccion2`.`S2_22_3_8`,
`pesc_seccion2`.`S2_22_4_8`,
`pesc_seccion2`.`S2_22_5_8`,
`pesc_seccion2`.`S2_22_6_8`,
`pesc_seccion2`.`S2_22_7_8`,
`pesc_seccion2`.`S2_22_8_8`,
`pesc_seccion2`.`S2_22_9_8`,
`pesc_seccion2`.`S2_22_1_9`,
`pesc_seccion2`.`S2_22_2_9`,
`pesc_seccion2`.`S2_22_3_9`,
`pesc_seccion2`.`S2_22_4_9`,
`pesc_seccion2`.`S2_22_5_9`,
`pesc_seccion2`.`S2_22_6_9`,
`pesc_seccion2`.`S2_22_7_9`,
`pesc_seccion2`.`S2_22_8_9`,
`pesc_seccion2`.`S2_22_9_9`,
`pesc_seccion2`.`S2_22_1_10`,
`pesc_seccion2`.`S2_22_2_10`,
`pesc_seccion2`.`S2_22_3_10`,
`pesc_seccion2`.`S2_22_4_10`,
`pesc_seccion2`.`S2_22_5_10`,
`pesc_seccion2`.`S2_22_6_10`,
`pesc_seccion2`.`S2_22_7_10`,
`pesc_seccion2`.`S2_22_8_10`,
`pesc_seccion2`.`S2_22_9_10`,
`pesc_seccion3`.`S3_100`,
`pesc_seccion3`.`S3_100_O`,
`pesc_seccion3`.`S3_200`,
`pesc_seccion3`.`S3_200_O`,
`pesc_seccion3`.`S3_300`,
`pesc_seccion3`.`S3_300_O`,
`pesc_seccion3`.`S3_300A`,
`pesc_seccion3`.`S3_300A_O`,
`pesc_seccion3`.`S3_400`,
`pesc_seccion3`.`S3_400_O`,
`pesc_seccion3`.`S3_500`,
`pesc_seccion3`.`S3_500A`,
`pesc_seccion3`.`S3_500B`,
`pesc_seccion3`.`S3_500C`,
`pesc_seccion3`.`S3_600`,
`pesc_seccion3`.`S3_701`,
`pesc_seccion3`.`S3_702`,
`pesc_seccion3`.`S3_703`,
`pesc_seccion3`.`S3_704`,
`pesc_seccion3`.`S3_705`,
`pesc_seccion3`.`S3_706`,
`pesc_seccion3`.`S3_707`,
`pesc_seccion3`.`S3_708`,
`pesc_seccion3`.`S3_709`,
`pesc_seccion3`.`S3_710`,
`pesc_seccion3`.`S3_711`,
`pesc_seccion3`.`S3_801`,
`pesc_seccion3`.`S3_802`,
`pesc_seccion3`.`S3_803`,
`pesc_seccion3`.`S3_804`,
`pesc_seccion3`.`S3_805`,
`pesc_seccion3`.`S3_900`,
`pesc_seccion3`.`S3_900E`,
`pesc_seccion3`.`S3_900E_COD`,
`pesc_seccion4`.`S4_1`,
`pesc_seccion4`.`S4_2_1`,
`pesc_seccion4`.`S4_2_1_1`,
`pesc_seccion4`.`S4_2_2`,
`pesc_seccion4`.`S4_2_2_1`,
`pesc_seccion4`.`S4_2_3`,
`pesc_seccion4`.`S4_2_3_1`,
`pesc_seccion4`.`S4_2_4`,
`pesc_seccion4`.`S4_2_4_O`,
`pesc_seccion4`.`S4_2_4_1`,
`pesc_seccion4`.`S4_3_1`,
`pesc_seccion4`.`S4_3_2`,
`pesc_seccion4`.`S4_3_3`,
`pesc_seccion4`.`S4_4_1`,
`pesc_seccion4`.`S4_4_1_1`,
`pesc_seccion4`.`S4_4_1_2`,
`pesc_seccion4`.`S4_4_1_3`,
`pesc_seccion4`.`S4_4_1_4`,
`pesc_seccion4`.`S4_4_1_5`,
`pesc_seccion4`.`S4_4_1_6`,
`pesc_seccion4`.`S4_4_1_7`,
`pesc_seccion4`.`S4_4_1_8`,
`pesc_seccion4`.`S4_4_1_9`,
`pesc_seccion4`.`S4_4_1_10`,
`pesc_seccion4`.`S4_4_1_11`,
`pesc_seccion4`.`S4_4_1_12`,
`pesc_seccion4`.`S4_5_1`,
`pesc_seccion4`.`S4_5_1_1`,
`pesc_seccion4`.`S4_5_1_2`,
`pesc_seccion4`.`S4_5_1_3`,
`pesc_seccion4`.`S4_5_1_4`,
`pesc_seccion4`.`S4_5_1_5`,
`pesc_seccion4`.`S4_5_1_6`,
`pesc_seccion4`.`S4_5_1_7`,
`pesc_seccion4`.`S4_5_1_8`,
`pesc_seccion4`.`S4_5_1_9`,
`pesc_seccion4`.`S4_5_1_10`,
`pesc_seccion4`.`S4_5_1_11`,
`pesc_seccion4`.`S4_5_1_12`,
`pesc_seccion4`.`S4_6_1`,
`pesc_seccion4`.`S4_6_2`,
`pesc_seccion4`.`S4_6_3`,
`pesc_seccion4`.`S4_6_4`,
`pesc_seccion4`.`S4_6_5`,
`pesc_seccion4`.`S4_6_6`,
`pesc_seccion5`.`S5_1_1`,
`pesc_seccion5`.`S5_1_1_1`,
`pesc_seccion5`.`S5_1_2`,
`pesc_seccion5`.`S5_1_2_1`,
`pesc_seccion5`.`S5_1_3`,
`pesc_seccion5`.`S5_1_3_1`,
`pesc_seccion5`.`S5_1_4`,
`pesc_seccion5`.`S5_1_4_1`,
`pesc_seccion5`.`S5_1_5`,
`pesc_seccion5`.`S5_1_5_1`,
`pesc_seccion5`.`S5_1_6`,
`pesc_seccion5`.`S5_1_6_1`,
`pesc_seccion5`.`S5_1_7`,
`pesc_seccion5`.`S5_1_7_1`,
`pesc_seccion5`.`S5_1_8`,
`pesc_seccion5`.`S5_1_8_1`,
`pesc_seccion5`.`S5_1_9`,
`pesc_seccion5`.`S5_1_9_O`,
`pesc_seccion5`.`S5_1_9_1`,
`pesc_seccion5`.`S5_2_1`,
`pesc_seccion5`.`S5_2_2`,
`pesc_seccion5`.`S5_2_3`,
`pesc_seccion5`.`S5_2_4`,
`pesc_seccion5`.`S5_2_5`,
`pesc_seccion5`.`S5_2_5_O`,
`pesc_seccion5`.`S5_2_6`,
`pesc_seccion5`.`S5_2_7`,
`pesc_seccion5`.`S5_2_8`,
`pesc_seccion5`.`S5_2_9`,
`pesc_seccion5`.`S5_2_10`,
`pesc_seccion5`.`S5_2_11`,
`pesc_seccion5`.`S5_2_12`,
`pesc_seccion5`.`S5_2_12_O`,
`pesc_seccion5`.`S5_2_13`,
`pesc_seccion5`.`S5_2_14`,
`pesc_seccion5`.`S5_2_15`,
`pesc_seccion5`.`S5_2_16`,
`pesc_seccion5`.`S5_2_17`,
`pesc_seccion5`.`S5_2_17_O`,
`pesc_seccion5`.`S5_2_18`,
`pesc_seccion5`.`S5_2_19`,
`pesc_seccion5`.`S5_2_20`,
`pesc_seccion5`.`S5_2_21`,
`pesc_seccion5`.`S5_2_21_O`,
`pesc_seccion5`.`S5_3_1`,
`pesc_seccion5`.`S5_3_2`,
`pesc_seccion5`.`S5_3_3`,
`pesc_seccion5`.`S5_3_4`,
`pesc_seccion5`.`S5_3_5`,
`pesc_seccion5`.`S5_3_6`,
`pesc_seccion5`.`S5_3_7`,
`pesc_seccion5`.`S5_3_8`,
`pesc_seccion5`.`S5_3_9`,
`pesc_seccion5`.`S5_3_10`,
`pesc_seccion5`.`S5_3_11`,
`pesc_seccion5`.`S5_3_12`,
`pesc_seccion5`.`S5_3_13`,
`pesc_seccion5`.`S5_3_14`,
`pesc_seccion5`.`S5_3_15`,
`pesc_seccion5`.`S5_3_16`,
`pesc_seccion5`.`S5_3_17`,
`pesc_seccion5`.`S5_3_18`,
`pesc_seccion5`.`S5_3_19`,
`pesc_seccion5`.`S5_3_20`,
`pesc_seccion5`.`S5_3_21`,
`pesc_seccion5`.`S5_3_21_O`,
`pesc_seccion5`.`S5_3_22`,
`pesc_seccion5`.`S5_3_22_O`,
`pesc_seccion5`.`S5_3_23`,
`pesc_seccion5`.`S5_3_23_O`,
`pesc_seccion5`.`S5_3_24`,
`pesc_seccion5`.`S5_3_24_O`,
`pesc_seccion5`.`S5_4_1`,
`pesc_seccion5`.`S5_4_2`,
`pesc_seccion5`.`S5_4_3`,
`pesc_seccion5`.`S5_4_4`,
`pesc_seccion5`.`S5_4_5`,
`pesc_seccion5`.`S5_4_6`,
`pesc_seccion5`.`S5_4_7`,
`pesc_seccion5`.`S5_4_7_O`,
`pesc_seccion5`.`S5_4_8`,
`pesc_seccion5`.`S5_5_1`,
`pesc_seccion5`.`S5_5_2`,
`pesc_seccion5`.`S5_5_3`,
`pesc_seccion5`.`S5_5_4`,
`pesc_seccion5`.`S5_5_5`,
`pesc_seccion5`.`S5_5_5_O`,
`pesc_seccion6`.`S6_1`,
`pesc_seccion6`.`S6_2_1`,
`pesc_seccion6`.`S6_2_2`,
`pesc_seccion6`.`S6_2_3`,
`pesc_seccion6`.`S6_3`,
`pesc_seccion6`.`S6_4`,
`pesc_seccion7`.`S7_101`,
`pesc_seccion7`.`S7_101A`,
`pesc_seccion7`.`S7_102`,
`pesc_seccion7`.`S7_102A`,
`pesc_seccion7`.`S7_103`,
`pesc_seccion7`.`S7_104`,
`pesc_seccion7`.`S7_201`,
`pesc_seccion7`.`S7_202`,
`pesc_seccion7`.`S7_203`,
`pesc_seccion7`.`S7_204`,
`pesc_seccion7`.`S7_204_O`,
`pesc_seccion7`.`S7_3_1`,
`pesc_seccion7`.`S7_4_1_1`,
`pesc_seccion7`.`S7_4_2_1`,
`pesc_seccion7`.`S7_4_3_1`,
`pesc_seccion7`.`S7_4_4_1`,
`pesc_seccion7`.`S7_4_5_1`,
`pesc_seccion7`.`S7_5_1`,
`pesc_seccion7`.`S7_3_2`,
`pesc_seccion7`.`S7_4_1_2`,
`pesc_seccion7`.`S7_4_2_2`,
`pesc_seccion7`.`S7_4_3_2`,
`pesc_seccion7`.`S7_4_4_2`,
`pesc_seccion7`.`S7_4_5_2`,
`pesc_seccion7`.`S7_5_2`,
`pesc_seccion7`.`S7_3_3`,
`pesc_seccion7`.`S7_4_1_3`,
`pesc_seccion7`.`S7_4_2_3`,
`pesc_seccion7`.`S7_4_3_3`,
`pesc_seccion7`.`S7_4_4_3`,
`pesc_seccion7`.`S7_4_5_3`,
`pesc_seccion7`.`S7_5_3`,
`pesc_seccion7`.`S7_3_4`,
`pesc_seccion7`.`S7_4_1_4`,
`pesc_seccion7`.`S7_4_2_4`,
`pesc_seccion7`.`S7_4_3_4`,
`pesc_seccion7`.`S7_4_4_4`,
`pesc_seccion7`.`S7_4_5_4`,
`pesc_seccion7`.`S7_5_4`,
`pesc_seccion7`.`S7_3_5`,
`pesc_seccion7`.`S7_4_1_5`,
`pesc_seccion7`.`S7_4_2_5`,
`pesc_seccion7`.`S7_4_3_5`,
`pesc_seccion7`.`S7_4_4_5`,
`pesc_seccion7`.`S7_4_5_5`,
`pesc_seccion7`.`S7_5_5`,
`pesc_seccion7`.`S7_3_6`,
`pesc_seccion7`.`S7_4_1_6`,
`pesc_seccion7`.`S7_4_2_6`,
`pesc_seccion7`.`S7_4_3_6`,
`pesc_seccion7`.`S7_4_4_6`,
`pesc_seccion7`.`S7_4_5_6`,
`pesc_seccion7`.`S7_5_6`,
`pesc_seccion7`.`S7_3_7`,
`pesc_seccion7`.`S7_4_1_7`,
`pesc_seccion7`.`S7_4_2_7`,
`pesc_seccion7`.`S7_4_3_7`,
`pesc_seccion7`.`S7_4_4_7`,
`pesc_seccion7`.`S7_4_5_7`,
`pesc_seccion7`.`S7_5_7`,
`pesc_seccion7`.`S7_3_8`,
`pesc_seccion7`.`S7_4_1_8`,
`pesc_seccion7`.`S7_4_2_8`,
`pesc_seccion7`.`S7_4_3_8`,
`pesc_seccion7`.`S7_4_4_8`,
`pesc_seccion7`.`S7_4_5_8`,
`pesc_seccion7`.`S7_5_8`,
`pesc_seccion7`.`S7_3_9`,
`pesc_seccion7`.`S7_4_1_9`,
`pesc_seccion7`.`S7_4_2_9`,
`pesc_seccion7`.`S7_4_3_9`,
`pesc_seccion7`.`S7_4_4_9`,
`pesc_seccion7`.`S7_4_5_9`,
`pesc_seccion7`.`S7_5_9`,
`pesc_seccion7`.`S7_3_10`,
`pesc_seccion7`.`S7_4_1_10`,
`pesc_seccion7`.`S7_4_2_10`,
`pesc_seccion7`.`S7_4_3_10`,
`pesc_seccion7`.`S7_4_4_10`,
`pesc_seccion7`.`S7_4_5_10`,
`pesc_seccion7`.`S7_5_10`,
`pesc_seccion7`.`S7_3_11`,
`pesc_seccion7`.`S7_4_1_11`,
`pesc_seccion7`.`S7_4_2_11`,
`pesc_seccion7`.`S7_4_3_11`,
`pesc_seccion7`.`S7_4_4_11`,
`pesc_seccion7`.`S7_4_5_11`,
`pesc_seccion7`.`S7_5_11`,
`pesc_seccion7`.`S7_3_12`,
`pesc_seccion7`.`S7_4_1_12`,
`pesc_seccion7`.`S7_4_2_12`,
`pesc_seccion7`.`S7_4_3_12`,
`pesc_seccion7`.`S7_4_4_12`,
`pesc_seccion7`.`S7_4_5_12`,
`pesc_seccion7`.`S7_5_12`,
`pesc_seccion7`.`TOT_V`,
`pesc_seccion7`.`TOT_A`,
`pesc_seccion7`.`TOT_T`,
`pesc_seccion7`.`TOT_P`,
`pesc_seccion7`.`TOT_O`,
`pesc_seccion7`.`TOT_G`,
`pesc_seccion7`.`S7_6_1`,
`pesc_seccion7`.`S7_6_2`,
`pesc_seccion7`.`S7_6_3`,
`pesc_seccion7`.`S7_6_4`,
`pesc_seccion7`.`S7_6_5`,
`pesc_seccion7`.`S7_6_6`,
`pesc_seccion7`.`S7_6_6_O`,
`pesc_seccion7`.`S7_7_1`,
`pesc_seccion7`.`S7_7_2`,
`pesc_seccion7`.`S7_7_3`,
`pesc_seccion7`.`S7_7_4`,
`pesc_seccion8`.`S8_1_1`,
`pesc_seccion8`.`S8_1_2`,
`pesc_seccion8`.`S8_1_3`,
`pesc_seccion8`.`S8_1_4`,
`pesc_seccion8`.`S8_1_5`,
`pesc_seccion8`.`S8_1_6`,
`pesc_seccion8`.`S8_2`,
`pesc_seccion8`.`S8_3_1`,
`pesc_seccion8`.`S8_3_2`,
`pesc_seccion8`.`S8_3_3`,
`pesc_seccion8`.`S8_3_4`,
`pesc_seccion8`.`S8_3_5`,
`pesc_seccion8`.`S8_3_5_O`,
`pesc_seccion8`.`S8_4_1`,
`pesc_seccion8`.`S8_4_1A`,
`pesc_seccion8`.`S8_4_1B`,
`pesc_seccion8`.`S8_4_2`,
`pesc_seccion8`.`S8_4_2A`,
`pesc_seccion8`.`S8_4_2B`,
`pesc_seccion8`.`S8_4_3`,
`pesc_seccion8`.`S8_4_3A`,
`pesc_seccion8`.`S8_4_3B`,
`pesc_seccion8`.`S8_4_4`,
`pesc_seccion8`.`S8_4_4A`,
`pesc_seccion8`.`S8_4_4B`,
`pesc_seccion8`.`S8_4_5`,
`pesc_seccion8`.`S8_4_5A`,
`pesc_seccion8`.`S8_4_5B`,
`pesc_seccion8`.`S8_4_6`,
`pesc_seccion8`.`S8_4_6A`,
`pesc_seccion8`.`S8_4_6B`,
`pesc_seccion8`.`S8_4_7`,
`pesc_seccion8`.`S8_4_7A`,
`pesc_seccion8`.`S8_4_7B`,
`pesc_seccion8`.`S8_4_8`,
`pesc_seccion8`.`S8_4_8_O`,
`pesc_seccion8`.`S8_4_8A`,
`pesc_seccion8`.`S8_4_8B`,
`pesc_info`.`OBS`,
`pesc_info`.`F_D`,
`pesc_info`.`F_M`,
`pesc_info`.`F_A`,
`pesc_info`.`RES`,
`pesc_info`.`EMP`,
`pesc_info`.`EMP_DNI`
FROM `cenpesco`.`pescador`
INNER JOIN `cenpesco`.`pesc_seccion2` ON  `pescador`.`id`= `pesc_seccion2`.`pescador_id`
INNER JOIN `cenpesco`.`pesc_seccion3` ON  `pescador`.`id`= `pesc_seccion3`.`pescador_id`
INNER JOIN `cenpesco`.`pesc_seccion4` ON  `pescador`.`id`= `pesc_seccion4`.`pescador_id`
INNER JOIN `cenpesco`.`pesc_seccion5` ON  `pescador`.`id`= `pesc_seccion5`.`pescador_id`
INNER JOIN `cenpesco`.`pesc_seccion6` ON  `pescador`.`id`= `pesc_seccion6`.`pescador_id`
INNER JOIN `cenpesco`.`pesc_seccion7` ON  `pescador`.`id`= `pesc_seccion7`.`pescador_id`
INNER JOIN `cenpesco`.`pesc_seccion8` ON  `pescador`.`id`= `pesc_seccion8`.`pescador_id`
INNER JOIN `cenpesco`.`pesc_info` ON  `pescador`.`id`= `pesc_info`.`pescador_id`

');
        return $q;  
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