<?php 
/**
* 
*/
class Pescador_model extends CI_MODEL
{
	
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
        $q = $this->db->get('pescador');
		return $q;
	}

    function consulta_in_seccion($cod,$seccion)
    {
        //$this->db->select('comunidad_id');
        $this->db->where('pescador_id',$cod);
        $q = $this->db->get($seccion);
        return $q;
    }
    
    function insert_pesc($data){
		$this->db->insert('pescador', $data);
		return $this->db->affected_rows() > 0;
    }   
 

    function seccion_disponible($NFORM,$CCDD,$CCPP,$CCDI,$COD_CCPP,$seccion){
		$this->db->select('s.*');
		$this->db->from('pescador p');
        $this->db->join($seccion . ' s','s.pescador_id = p.id','inner');
        $this->db->where('p.NFORM',$NFORM);
        $this->db->where('p.CCDD',$CCDD);
        $this->db->where('p.CCPP',$CCPP);
        $this->db->where('p.CCDI',$CCDI);
        $this->db->where('p.COD_CCPP',$COD_CCPP);
        $this->db->where('p.activo',1);        
        $q = $this->db->get();
		return $q;
    }   


    function get_fields($table){
        $q = $this->db->list_fields($table);
        return $q;
    }   

    function insert_pesc_seccion($table,$data){
        $this->db->insert($table, $data);
        return $this->db->affected_rows() > 0;
    }   

    function update_pesc_seccion($table,$data,$id){//update 
        $this->db->where('pescador_id',$id);
        $this->db->update($table, $data);
        return $this->db->affected_rows() > 0;
    }  

    function insert_no_emb($data){
        $this->db->insert('pesc_seccion9', $data);
        return $this->db->affected_rows() > 0;
    } 

    function consulta_udra($dep,$prov,$dist,$ccpp)
    {
        $this->db->select('FORMULARIOS');
        $this->db->where('CCDD',$dep);
        $this->db->where('CCPP',$prov);
        $this->db->where('CCDI',$dist);
        $this->db->where('COD_CCPP',$ccpp);       
        $q = $this->db->get('udra_pescador');
        return $q;
    }

    function get_ccpp($dpto,$prov,$dist)
    {
        $sql = 'SELECT SUBSTRING(idcartogr, 7) as CCPP, CENTRO_POBLADO FROM (ccpp) WHERE idcartogr LIKE ? ORDER BY CENTRO_POBLADO asc';
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
`pescador`.`SEDE_COD`,
`pescador`.`NOM_SEDE`,
`pescador`.`ODEI_COD`,
`pescador`.`NOM_ODEI`,
`pescador`.`NFORM`,
`pescador`.`CCDD`,
`pescador`.`NOM_DD`,
`pescador`.`CCPP`,
`pescador`.`NOM_PP`,
`pescador`.`CCDI`,
`pescador`.`NOM_DI`,
`pescador`.`COD_CCPP`,
`pescador`.`NOM_CCPP`,
`pescador`.`TAC`,
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
`pesc_seccion2`.`S2_10_PAIS`,
`pesc_seccion2`.`S2_10_PAIS_COD`,
`pesc_seccion2`.`S2_10_DD`,
`pesc_seccion2`.`S2_10_DD_COD`,
`pesc_seccion2`.`S2_10_PP`,
`pesc_seccion2`.`S2_10_PP_COD`,
`pesc_seccion2`.`S2_10_PP_O`,
`pesc_seccion2`.`S2_10_DI`,
`pesc_seccion2`.`S2_10_DI_COD`,
`pesc_seccion2`.`S2_10_DI_O`,
`pesc_seccion2`.`S2_11_PAIS`,
`pesc_seccion2`.`S2_11_PAIS_COD`,
`pesc_seccion2`.`S2_11_DD`,
`pesc_seccion2`.`S2_11_DD_COD`,
`pesc_seccion2`.`S2_11_PP`,
`pesc_seccion2`.`S2_11_PP_COD`,
`pesc_seccion2`.`S2_11_PP_O`,
`pesc_seccion2`.`S2_11_DI`,
`pesc_seccion2`.`S2_11_DI_COD`,
`pesc_seccion2`.`S2_11_DI_O`,
`pesc_seccion2`.`S2_12`,
`pesc_seccion2`.`S2_12G`,
`pesc_seccion2`.`S2_12A`,
`pesc_seccion2`.`S2_13`,
`pesc_seccion2`.`S2_14_1`,
`pesc_seccion2`.`S2_14_2`,
`pesc_seccion2`.`S2_14_3`,
`pesc_seccion2`.`S2_14_4`,
`pesc_seccion2`.`S2_14_5`,
`pesc_seccion2`.`S2_14_6`,
`pesc_seccion2`.`S2_14_7`,
`pesc_seccion2`.`S2_14_7_O`,
`pesc_seccion2`.`S2_14_8`,
`pesc_seccion2`.`S2_15`,
`pesc_seccion2`.`S2_15_O`,
`pesc_seccion2`.`S2_16`,
`pesc_seccion2`.`S2_17_1`,
`pesc_seccion2`.`S2_17_2`,
`pesc_seccion2`.`S2_17_3`,
`pesc_seccion2`.`S2_17_4`,
`pesc_seccion2`.`S2_17_5`,
`pesc_seccion2`.`S2_17_6`,
`pesc_seccion2`.`S2_17_7`,
`pesc_seccion2`.`S2_17_8`,
`pesc_seccion2`.`S2_17_8_O`,
`pesc_seccion2`.`S2_17_9`,
`pesc_seccion2`.`S2_18`,
`pesc_seccion2`.`S2_19`,
`pesc_seccion2`.`S2_19G`,
`pesc_seccion2`.`S2_19A`,
`pesc_seccion2`.`S2_20_1`,
`pesc_seccion2`.`S2_20_2`,
`pesc_seccion2`.`S2_20_3`,
`pesc_seccion2`.`S2_20_4`,
`pesc_seccion2`.`S2_20_5`,
`pesc_seccion2`.`S2_20_6`,
`pesc_seccion2`.`S2_20_7`,
`pesc_seccion2`.`S2_20_8`,
`pesc_seccion2`.`S2_20_9`,
`pesc_seccion2`.`S2_20_9_O`,
`pesc_seccion2`.`S2_21`,
`pesc_seccion2`.`S2_22`,
`pesc_seccion2`.`S2_23_1_1`,
`pesc_seccion2`.`S2_23_2_1`,
`pesc_seccion2`.`S2_23_3_1`,
`pesc_seccion2`.`S2_23_4_1A`,
`pesc_seccion2`.`S2_23_4_1M`,
`pesc_seccion2`.`S2_23_5_1`,
`pesc_seccion2`.`S2_23_6_1`,
`pesc_seccion2`.`S2_23_7_1`,
`pesc_seccion2`.`S2_23_8_1`,
`pesc_seccion2`.`S2_23_9_1`,
`pesc_seccion2`.`S2_23_10_1`,
`pesc_seccion2`.`S2_23_11_1`,
`pesc_seccion2`.`S2_23_11_1_O`,
`pesc_seccion2`.`S2_23_1_2`,
`pesc_seccion2`.`S2_23_2_2`,
`pesc_seccion2`.`S2_23_3_2`,
`pesc_seccion2`.`S2_23_4_2A`,
`pesc_seccion2`.`S2_23_4_2M`,
`pesc_seccion2`.`S2_23_5_2`,
`pesc_seccion2`.`S2_23_6_2`,
`pesc_seccion2`.`S2_23_7_2`,
`pesc_seccion2`.`S2_23_8_2`,
`pesc_seccion2`.`S2_23_9_2`,
`pesc_seccion2`.`S2_23_10_2`,
`pesc_seccion2`.`S2_23_11_2`,
`pesc_seccion2`.`S2_23_11_2_O`,
`pesc_seccion2`.`S2_23_1_3`,
`pesc_seccion2`.`S2_23_2_3`,
`pesc_seccion2`.`S2_23_3_3`,
`pesc_seccion2`.`S2_23_4_3A`,
`pesc_seccion2`.`S2_23_4_3M`,
`pesc_seccion2`.`S2_23_5_3`,
`pesc_seccion2`.`S2_23_6_3`,
`pesc_seccion2`.`S2_23_7_3`,
`pesc_seccion2`.`S2_23_8_3`,
`pesc_seccion2`.`S2_23_9_3`,
`pesc_seccion2`.`S2_23_10_3`,
`pesc_seccion2`.`S2_23_11_3`,
`pesc_seccion2`.`S2_23_11_3_O`,
`pesc_seccion2`.`S2_23_1_4`,
`pesc_seccion2`.`S2_23_2_4`,
`pesc_seccion2`.`S2_23_3_4`,
`pesc_seccion2`.`S2_23_4_4A`,
`pesc_seccion2`.`S2_23_4_4M`,
`pesc_seccion2`.`S2_23_5_4`,
`pesc_seccion2`.`S2_23_6_4`,
`pesc_seccion2`.`S2_23_7_4`,
`pesc_seccion2`.`S2_23_8_4`,
`pesc_seccion2`.`S2_23_9_4`,
`pesc_seccion2`.`S2_23_10_4`,
`pesc_seccion2`.`S2_23_11_4`,
`pesc_seccion2`.`S2_23_11_4_O`,
`pesc_seccion2`.`S2_23_1_5`,
`pesc_seccion2`.`S2_23_2_5`,
`pesc_seccion2`.`S2_23_3_5`,
`pesc_seccion2`.`S2_23_4_5A`,
`pesc_seccion2`.`S2_23_4_5M`,
`pesc_seccion2`.`S2_23_5_5`,
`pesc_seccion2`.`S2_23_6_5`,
`pesc_seccion2`.`S2_23_7_5`,
`pesc_seccion2`.`S2_23_8_5`,
`pesc_seccion2`.`S2_23_9_5`,
`pesc_seccion2`.`S2_23_10_5`,
`pesc_seccion2`.`S2_23_11_5`,
`pesc_seccion2`.`S2_23_11_5_O`,
`pesc_seccion2`.`S2_23_1_6`,
`pesc_seccion2`.`S2_23_2_6`,
`pesc_seccion2`.`S2_23_3_6`,
`pesc_seccion2`.`S2_23_4_6A`,
`pesc_seccion2`.`S2_23_4_6M`,
`pesc_seccion2`.`S2_23_5_6`,
`pesc_seccion2`.`S2_23_6_6`,
`pesc_seccion2`.`S2_23_7_6`,
`pesc_seccion2`.`S2_23_8_6`,
`pesc_seccion2`.`S2_23_9_6`,
`pesc_seccion2`.`S2_23_10_6`,
`pesc_seccion2`.`S2_23_11_6`,
`pesc_seccion2`.`S2_23_11_6_O`,
`pesc_seccion2`.`S2_23_1_7`,
`pesc_seccion2`.`S2_23_2_7`,
`pesc_seccion2`.`S2_23_3_7`,
`pesc_seccion2`.`S2_23_4_7A`,
`pesc_seccion2`.`S2_23_4_7M`,
`pesc_seccion2`.`S2_23_5_7`,
`pesc_seccion2`.`S2_23_6_7`,
`pesc_seccion2`.`S2_23_7_7`,
`pesc_seccion2`.`S2_23_8_7`,
`pesc_seccion2`.`S2_23_9_7`,
`pesc_seccion2`.`S2_23_10_7`,
`pesc_seccion2`.`S2_23_11_7`,
`pesc_seccion2`.`S2_23_11_7_O`,
`pesc_seccion2`.`S2_23_1_8`,
`pesc_seccion2`.`S2_23_2_8`,
`pesc_seccion2`.`S2_23_3_8`,
`pesc_seccion2`.`S2_23_4_8A`,
`pesc_seccion2`.`S2_23_4_8M`,
`pesc_seccion2`.`S2_23_5_8`,
`pesc_seccion2`.`S2_23_6_8`,
`pesc_seccion2`.`S2_23_7_8`,
`pesc_seccion2`.`S2_23_8_8`,
`pesc_seccion2`.`S2_23_9_8`,
`pesc_seccion2`.`S2_23_10_8`,
`pesc_seccion2`.`S2_23_11_8`,
`pesc_seccion2`.`S2_23_11_8_O`,
`pesc_seccion2`.`S2_23_1_9`,
`pesc_seccion2`.`S2_23_2_9`,
`pesc_seccion2`.`S2_23_3_9`,
`pesc_seccion2`.`S2_23_4_9A`,
`pesc_seccion2`.`S2_23_4_9M`,
`pesc_seccion2`.`S2_23_5_9`,
`pesc_seccion2`.`S2_23_6_9`,
`pesc_seccion2`.`S2_23_7_9`,
`pesc_seccion2`.`S2_23_8_9`,
`pesc_seccion2`.`S2_23_9_9`,
`pesc_seccion2`.`S2_23_10_9`,
`pesc_seccion2`.`S2_23_11_9`,
`pesc_seccion2`.`S2_23_11_9_O`,
`pesc_seccion2`.`S2_23_1_10`,
`pesc_seccion2`.`S2_23_2_10`,
`pesc_seccion2`.`S2_23_3_10`,
`pesc_seccion2`.`S2_23_4_10A`,
`pesc_seccion2`.`S2_23_4_10M`,
`pesc_seccion2`.`S2_23_5_10`,
`pesc_seccion2`.`S2_23_6_10`,
`pesc_seccion2`.`S2_23_7_10`,
`pesc_seccion2`.`S2_23_8_10`,
`pesc_seccion2`.`S2_23_9_10`,
`pesc_seccion2`.`S2_23_10_10`,
`pesc_seccion2`.`S2_23_11_10`,
`pesc_seccion2`.`S2_23_11_10_O`,
`pesc_seccion3`.`S3_100`,
`pesc_seccion3`.`S3_100_O`,
`pesc_seccion3`.`S3_200`,
`pesc_seccion3`.`S3_200_O`,
`pesc_seccion3`.`S3_300`,
`pesc_seccion3`.`S3_300_O`,
`pesc_seccion3`.`S3_400`,
`pesc_seccion3`.`S3_400_O`,
`pesc_seccion3`.`S3_500`,
`pesc_seccion3`.`S3_500_O`,
`pesc_seccion3`.`S3_600`,
`pesc_seccion3`.`S3_600A`,
`pesc_seccion3`.`S3_600B`,
`pesc_seccion3`.`S3_600C`,
`pesc_seccion3`.`S3_700`,
`pesc_seccion3`.`S3_800`,
`pesc_seccion3`.`S3_901`,
`pesc_seccion3`.`S3_902`,
`pesc_seccion3`.`S3_903`,
`pesc_seccion3`.`S3_904`,
`pesc_seccion3`.`S3_905`,
`pesc_seccion3`.`S3_906`,
`pesc_seccion3`.`S3_907`,
`pesc_seccion3`.`S3_908`,
`pesc_seccion3`.`S3_909`,
`pesc_seccion3`.`S3_910`,
`pesc_seccion3`.`S3_911`,
`pesc_seccion3`.`S3_1001`,
`pesc_seccion3`.`S3_1002`,
`pesc_seccion3`.`S3_1003`,
`pesc_seccion3`.`S3_1004`,
`pesc_seccion3`.`S3_1005`,
`pesc_seccion3`.`S3_1100`,
`pesc_seccion3`.`S3_1100E`,
`pesc_seccion3`.`S3_1100E_COD`,
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
`pesc_seccion4`.`S4_3_1_1`,
`pesc_seccion4`.`S4_3_2`,
`pesc_seccion4`.`S4_3_2_1`,
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
`pesc_seccion5`.`S5_1_8_O`,
`pesc_seccion5`.`S5_1_8_1`,
`pesc_seccion5`.`S5_2_1`,
`pesc_seccion5`.`S5_2_2`,
`pesc_seccion5`.`S5_2_DD`,
`pesc_seccion5`.`S5_2_DD_COD`,
`pesc_seccion5`.`S5_2_PP`,
`pesc_seccion5`.`S5_2_PP_COD`,
`pesc_seccion5`.`S5_2_DI`,
`pesc_seccion5`.`S5_2_DI_COD`,
`pesc_seccion5`.`S5_2_CCPP`,
`pesc_seccion5`.`S5_2_CCPP_COD`,
`pesc_seccion5`.`S5_3`,
`pesc_seccion5`.`S5_3_H`,
`pesc_seccion5`.`S5_3_M`,
`pesc_seccion5`.`S5_4`,
`pesc_seccion5`.`S5_4_H`,
`pesc_seccion5`.`S5_4_M`,
`pesc_seccion5`.`S5_5_1`,
`pesc_seccion5`.`S5_5_1_C`,
`pesc_seccion5`.`S5_5_1_1`,
`pesc_seccion5`.`S5_5_1_2`,
`pesc_seccion5`.`S5_5_1_3`,
`pesc_seccion5`.`S5_5_1_4`,
`pesc_seccion5`.`S5_5_1_5`,
`pesc_seccion5`.`S5_5_2`,
`pesc_seccion5`.`S5_5_2_C`,
`pesc_seccion5`.`S5_5_2_1`,
`pesc_seccion5`.`S5_5_2_2`,
`pesc_seccion5`.`S5_5_2_3`,
`pesc_seccion5`.`S5_5_2_4`,
`pesc_seccion5`.`S5_5_2_5`,
`pesc_seccion5`.`S5_5_3`,
`pesc_seccion5`.`S5_5_3_C`,
`pesc_seccion5`.`S5_5_3_1`,
`pesc_seccion5`.`S5_5_3_2`,
`pesc_seccion5`.`S5_5_3_3`,
`pesc_seccion5`.`S5_5_3_4`,
`pesc_seccion5`.`S5_5_3_5`,
`pesc_seccion5`.`S5_5_4`,
`pesc_seccion5`.`S5_5_4_C`,
`pesc_seccion5`.`S5_5_4_1`,
`pesc_seccion5`.`S5_5_4_2`,
`pesc_seccion5`.`S5_5_4_3`,
`pesc_seccion5`.`S5_5_4_4`,
`pesc_seccion5`.`S5_5_4_5`,
`pesc_seccion5`.`S5_5_5`,
`pesc_seccion5`.`S5_5_5_C`,
`pesc_seccion5`.`S5_5_5_1`,
`pesc_seccion5`.`S5_5_5_2`,
`pesc_seccion5`.`S5_5_5_3`,
`pesc_seccion5`.`S5_5_5_4`,
`pesc_seccion5`.`S5_5_5_5`,
`pesc_seccion5`.`S5_5_6`,
`pesc_seccion5`.`S5_5_6_C`,
`pesc_seccion5`.`S5_5_6_1`,
`pesc_seccion5`.`S5_5_6_2`,
`pesc_seccion5`.`S5_5_6_3`,
`pesc_seccion5`.`S5_5_6_4`,
`pesc_seccion5`.`S5_5_6_5`,
`pesc_seccion5`.`S5_5_7`,
`pesc_seccion5`.`S5_5_7_C`,
`pesc_seccion5`.`S5_5_7_1`,
`pesc_seccion5`.`S5_5_7_2`,
`pesc_seccion5`.`S5_5_7_3`,
`pesc_seccion5`.`S5_5_7_4`,
`pesc_seccion5`.`S5_5_7_5`,
`pesc_seccion5`.`S5_5_8`,
`pesc_seccion5`.`S5_5_8_C`,
`pesc_seccion5`.`S5_5_8_1`,
`pesc_seccion5`.`S5_5_8_2`,
`pesc_seccion5`.`S5_5_8_3`,
`pesc_seccion5`.`S5_5_8_4`,
`pesc_seccion5`.`S5_5_8_5`,
`pesc_seccion5`.`S5_5_9`,
`pesc_seccion5`.`S5_5_9_O`,
`pesc_seccion5`.`S5_5_9_C`,
`pesc_seccion5`.`S5_5_9_1`,
`pesc_seccion5`.`S5_5_9_2`,
`pesc_seccion5`.`S5_5_9_3`,
`pesc_seccion5`.`S5_5_9_4`,
`pesc_seccion5`.`S5_5_9_5`,
`pesc_seccion5`.`S5_5_10`,
`pesc_seccion5`.`S5_5_10_C`,
`pesc_seccion5`.`S5_5_11`,
`pesc_seccion5`.`S5_5_11_C`,
`pesc_seccion5`.`S5_5_12`,
`pesc_seccion5`.`S5_5_12_C`,
`pesc_seccion5`.`S5_5_13`,
`pesc_seccion5`.`S5_5_13_C`,
`pesc_seccion5`.`S5_5_14`,
`pesc_seccion5`.`S5_5_14_O`,
`pesc_seccion5`.`S5_5_14_C`,
`pesc_seccion5`.`S5_5_15`,
`pesc_seccion5`.`S5_5_16`,
`pesc_seccion5`.`S5_5_17`,
`pesc_seccion5`.`S5_5_17_O`,
`pesc_seccion5`.`S5_6_1`,
`pesc_seccion5`.`S5_6_1_C`,
`pesc_seccion5`.`S5_6_2`,
`pesc_seccion5`.`S5_6_2_C`,
`pesc_seccion5`.`S5_6_3`,
`pesc_seccion5`.`S5_6_3_C`,
`pesc_seccion5`.`S5_6_4`,
`pesc_seccion5`.`S5_6_4_C`,
`pesc_seccion5`.`S5_6_5`,
`pesc_seccion5`.`S5_6_5_C`,
`pesc_seccion5`.`S5_6_6`,
`pesc_seccion5`.`S5_6_6_C`,
`pesc_seccion5`.`S5_6_7`,
`pesc_seccion5`.`S5_6_7_C`,
`pesc_seccion5`.`S5_6_8`,
`pesc_seccion5`.`S5_6_8_C`,
`pesc_seccion5`.`S5_6_9`,
`pesc_seccion5`.`S5_6_9_C`,
`pesc_seccion5`.`S5_6_10`,
`pesc_seccion5`.`S5_6_10_C`,
`pesc_seccion5`.`S5_6_11`,
`pesc_seccion5`.`S5_6_11_C`,
`pesc_seccion5`.`S5_6_12`,
`pesc_seccion5`.`S5_6_12_C`,
`pesc_seccion5`.`S5_6_13`,
`pesc_seccion5`.`S5_6_13_C`,
`pesc_seccion5`.`S5_6_14`,
`pesc_seccion5`.`S5_6_14_C`,
`pesc_seccion5`.`S5_6_15`,
`pesc_seccion5`.`S5_6_15_C`,
`pesc_seccion5`.`S5_6_16`,
`pesc_seccion5`.`S5_6_16_C`,
`pesc_seccion5`.`S5_6_17`,
`pesc_seccion5`.`S5_6_17_C`,
`pesc_seccion5`.`S5_6_18`,
`pesc_seccion5`.`S5_6_18_C`,
`pesc_seccion5`.`S5_6_19`,
`pesc_seccion5`.`S5_6_19_C`,
`pesc_seccion5`.`S5_6_20`,
`pesc_seccion5`.`S5_6_20_C`,
`pesc_seccion5`.`S5_6_21`,
`pesc_seccion5`.`S5_6_21_C`,
`pesc_seccion5`.`S5_6_22`,
`pesc_seccion5`.`S5_6_22_C`,
`pesc_seccion5`.`S5_6_23`,
`pesc_seccion5`.`S5_6_23_C`,
`pesc_seccion5`.`S5_6_24`,
`pesc_seccion5`.`S5_6_24_C`,
`pesc_seccion5`.`S5_6_25`,
`pesc_seccion5`.`S5_6_25_C`,
`pesc_seccion5`.`S5_6_26`,
`pesc_seccion5`.`S5_6_26_C`,
`pesc_seccion5`.`S5_6_27`,
`pesc_seccion5`.`S5_6_27_C`,
`pesc_seccion5`.`S5_6_28`,
`pesc_seccion5`.`S5_6_28_C`,
`pesc_seccion5`.`S5_6_29`,
`pesc_seccion5`.`S5_6_29_C`,
`pesc_seccion5`.`S5_6_30`,
`pesc_seccion5`.`S5_6_30_C`,
`pesc_seccion5`.`S5_6_31`,
`pesc_seccion5`.`S5_6_31_C`,
`pesc_seccion5`.`S5_6_32`,
`pesc_seccion5`.`S5_6_32_C`,
`pesc_seccion5`.`S5_6_33`,
`pesc_seccion5`.`S5_6_33_C`,
`pesc_seccion5`.`S5_6_34`,
`pesc_seccion5`.`S5_6_34_C`,
`pesc_seccion5`.`S5_6_35`,
`pesc_seccion5`.`S5_6_35_C`,
`pesc_seccion5`.`S5_6_36`,
`pesc_seccion5`.`S5_6_36_C`,
`pesc_seccion5`.`S5_6_37`,
`pesc_seccion5`.`S5_6_37_C`,
`pesc_seccion5`.`S5_6_38`,
`pesc_seccion5`.`S5_6_38_C`,
`pesc_seccion5`.`S5_6_39`,
`pesc_seccion5`.`S5_6_39_C`,
`pesc_seccion5`.`S5_6_40`,
`pesc_seccion5`.`S5_6_40_C`,
`pesc_seccion5`.`S5_6_41`,
`pesc_seccion5`.`S5_6_41_O`,
`pesc_seccion5`.`S5_6_41_C`,
`pesc_seccion5`.`S5_6_42`,
`pesc_seccion5`.`S5_6_42_C`,
`pesc_seccion5`.`S5_6_43`,
`pesc_seccion5`.`S5_6_43_C`,
`pesc_seccion5`.`S5_6_44`,
`pesc_seccion5`.`S5_6_44_C`,
`pesc_seccion5`.`S5_6_45`,
`pesc_seccion5`.`S5_6_45_C`,
`pesc_seccion5`.`S5_6_46`,
`pesc_seccion5`.`S5_6_46_C`,
`pesc_seccion5`.`S5_6_47`,
`pesc_seccion5`.`S5_6_47_C`,
`pesc_seccion5`.`S5_6_48`,
`pesc_seccion5`.`S5_6_48_C`,
`pesc_seccion5`.`S5_6_49`,
`pesc_seccion5`.`S5_6_49_O`,
`pesc_seccion5`.`S5_6_49_C`,
`pesc_seccion5`.`S5_7`,
`pesc_seccion5`.`S5_8_1`,
`pesc_seccion5`.`S5_8_1_1`,
`pesc_seccion5`.`S5_8_2`,
`pesc_seccion5`.`S5_8_2_1`,
`pesc_seccion5`.`S5_8_3`,
`pesc_seccion5`.`S5_8_3_1`,
`pesc_seccion5`.`S5_8_4`,
`pesc_seccion5`.`S5_8_4_O`,
`pesc_seccion5`.`S5_8_4_1`,
`pesc_seccion5`.`S5_9_1`,
`pesc_seccion5`.`S5_9_2`,
`pesc_seccion5`.`S5_9_3`,
`pesc_seccion5`.`S5_9_4`,
`pesc_seccion5`.`S5_9_5`,
`pesc_seccion5`.`S5_9_6`,
`pesc_seccion5`.`S5_9_7`,
`pesc_seccion5`.`S5_9_8`,
`pesc_seccion5`.`S5_9_9`,
`pesc_seccion5`.`S5_9_10`,
`pesc_seccion5`.`S5_9_11`,
`pesc_seccion5`.`S5_9_12`,
`pesc_seccion5`.`S5_9_13`,
`pesc_seccion5`.`S5_9_14`,
`pesc_seccion5`.`S5_9_14_O`,
`pesc_seccion5`.`S5_9_15`,
`pesc_seccion5`.`S5_10_1`,
`pesc_seccion5`.`S5_10_2`,
`pesc_seccion5`.`S5_10_3`,
`pesc_seccion6`.`S6_1`,
`pesc_seccion6`.`S6_2`,
`pesc_seccion6`.`S6_3_1`,
`pesc_seccion6`.`S6_3_2`,
`pesc_seccion6`.`S6_3_3`,
`pesc_seccion6`.`S6_3_4`,
`pesc_seccion6`.`S6_3_5`,
`pesc_seccion6`.`S6_3_5_O`,
`pesc_seccion6`.`S6_3_6`,
`pesc_seccion6`.`S6_4`,
`pesc_seccion6`.`S6_5`,
`pesc_seccion6`.`S6_6`,
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
`pesc_seccion7`.`S7_205`,
`pesc_seccion7`.`S7_206`,
`pesc_seccion7`.`S7_206_O`,
`pesc_seccion7`.`S7_3_1`,
`pesc_seccion7`.`S7_3_1_C`,
`pesc_seccion7`.`S7_3_2`,
`pesc_seccion7`.`S7_3_2_C`,
`pesc_seccion7`.`S7_3_3`,
`pesc_seccion7`.`S7_3_3_C`,
`pesc_seccion7`.`S7_3_4`,
`pesc_seccion7`.`S7_3_4_C`,
`pesc_seccion7`.`S7_3_5`,
`pesc_seccion7`.`S7_3_5_C`,
`pesc_seccion7`.`S7_3_6`,
`pesc_seccion7`.`S7_3_6_C`,
`pesc_seccion7`.`S7_3_7`,
`pesc_seccion7`.`S7_3_7_C`,
`pesc_seccion7`.`S7_3_8`,
`pesc_seccion7`.`S7_3_8_C`,
`pesc_seccion7`.`S7_3_9`,
`pesc_seccion7`.`S7_3_9_C`,
`pesc_seccion7`.`S7_3_10`,
`pesc_seccion7`.`S7_3_10_C`,
`pesc_seccion7`.`S7_3_11`,
`pesc_seccion7`.`S7_3_11_C`,
`pesc_seccion7`.`S7_3_12`,
`pesc_seccion7`.`S7_3_12_C`,
`pesc_seccion7`.`S7_4_1`,
`pesc_seccion7`.`S7_4_1_1`,
`pesc_seccion7`.`S7_4_2`,
`pesc_seccion7`.`S7_4_2_1`,
`pesc_seccion7`.`S7_4_3`,
`pesc_seccion7`.`S7_4_3_1`,
`pesc_seccion7`.`S7_4_4`,
`pesc_seccion7`.`S7_4_4_O`,
`pesc_seccion7`.`S7_4_4_1`,
`pesc_seccion7`.`S7_4_T`,
`pesc_seccion7`.`S7_5_1`,
`pesc_seccion7`.`S7_5_1_C`,
`pesc_seccion7`.`S7_5_1_P`,
`pesc_seccion7`.`S7_5_2`,
`pesc_seccion7`.`S7_5_2_C`,
`pesc_seccion7`.`S7_5_2_P`,
`pesc_seccion7`.`S7_5_3`,
`pesc_seccion7`.`S7_5_3_C`,
`pesc_seccion7`.`S7_5_3_P`,
`pesc_seccion7`.`S7_5_4`,
`pesc_seccion7`.`S7_5_4_C`,
`pesc_seccion7`.`S7_5_4_P`,
`pesc_seccion7`.`S7_5_5`,
`pesc_seccion7`.`S7_5_5_C`,
`pesc_seccion7`.`S7_5_5_P`,
`pesc_seccion7`.`S7_5_6`,
`pesc_seccion7`.`S7_5_6_C`,
`pesc_seccion7`.`S7_5_6_P`,
`pesc_seccion7`.`S7_5_7`,
`pesc_seccion7`.`S7_5_7_C`,
`pesc_seccion7`.`S7_5_7_P`,
`pesc_seccion7`.`S7_5_8`,
`pesc_seccion7`.`S7_5_8_C`,
`pesc_seccion7`.`S7_5_8_P`,
`pesc_seccion7`.`S7_5_9`,
`pesc_seccion7`.`S7_5_9_C`,
`pesc_seccion7`.`S7_5_9_P`,
`pesc_seccion7`.`S7_5_10`,
`pesc_seccion7`.`S7_5_10_C`,
`pesc_seccion7`.`S7_5_10_P`,
`pesc_seccion7`.`S7_6_1`,
`pesc_seccion7`.`S7_7_1`,
`pesc_seccion7`.`S7_7_2`,
`pesc_seccion7`.`S7_7_3`,
`pesc_seccion7`.`S7_8_1`,
`pesc_seccion7`.`S7_8_2`,
`pesc_seccion7`.`S7_8_3`,
`pesc_seccion7`.`S7_8_4`,
`pesc_seccion7`.`S7_8_5`,
`pesc_seccion7`.`S7_8_6`,
`pesc_seccion7`.`S7_9_1`,
`pesc_seccion7`.`S7_9_2`,
`pesc_seccion7`.`S7_9_3`,
`pesc_seccion7`.`S7_9_4`,
`pesc_seccion7`.`S7_10_1`,
`pesc_seccion7`.`S7_10_2`,
`pesc_seccion7`.`S7_10_3`,
`pesc_seccion7`.`S7_10_4`,
`pesc_seccion7`.`S7_10_4_O`,
`pesc_seccion8`.`S8_1_1`,
`pesc_seccion8`.`S8_1_2`,
`pesc_seccion8`.`S8_1_3`,
`pesc_seccion8`.`S8_1_4`,
`pesc_seccion8`.`S8_1_5`,
`pesc_seccion8`.`S8_1_6`,
`pesc_seccion8`.`S8_1_7`,
`pesc_seccion8`.`S8_1_8`,
`pesc_seccion8`.`S8_1_9`,
`pesc_seccion8`.`S8_2`,
`pesc_seccion8`.`S8_3_1`,
`pesc_seccion8`.`S8_3_2`,
`pesc_seccion8`.`S8_3_3`,
`pesc_seccion8`.`S8_3_4`,
`pesc_seccion8`.`S8_3_5`,
`pesc_seccion8`.`S8_3_6`,
`pesc_seccion8`.`S8_3_7`,
`pesc_seccion8`.`S8_3_8`,
`pesc_seccion8`.`S8_3_9`,
`pesc_seccion8`.`S8_3_10`,
`pesc_seccion8`.`S8_3_10_O`,
`pesc_seccion8`.`S8_4_1`,
`pesc_seccion8`.`S8_4_1A`,
`pesc_seccion8`.`S8_4_1L`,
`pesc_seccion8`.`S8_4_2`,
`pesc_seccion8`.`S8_4_2A`,
`pesc_seccion8`.`S8_4_2L`,
`pesc_seccion8`.`S8_4_3`,
`pesc_seccion8`.`S8_4_3A`,
`pesc_seccion8`.`S8_4_3L`,
`pesc_seccion8`.`S8_4_4`,
`pesc_seccion8`.`S8_4_4A`,
`pesc_seccion8`.`S8_4_4L`,
`pesc_seccion8`.`S8_4_5`,
`pesc_seccion8`.`S8_4_5A`,
`pesc_seccion8`.`S8_4_5L`,
`pesc_seccion8`.`S8_4_6`,
`pesc_seccion8`.`S8_4_6A`,
`pesc_seccion8`.`S8_4_6L`,
`pesc_seccion8`.`S8_4_7`,
`pesc_seccion8`.`S8_4_7A`,
`pesc_seccion8`.`S8_4_7L`,
`pesc_seccion8`.`S8_4_8`,
`pesc_seccion8`.`S8_4_8A`,
`pesc_seccion8`.`S8_4_8L`,
`pesc_seccion8`.`S8_4_9`,
`pesc_seccion8`.`S8_4_9_O`,
`pesc_seccion8`.`S8_4_9A`,
`pesc_seccion8`.`S8_4_9L`,
`pesc_seccion8`.`S8_5_1`,
`pesc_seccion8`.`S8_5_2`,
`pesc_seccion8`.`S8_5_3`,
`pesc_seccion8`.`S8_6_1`,
`pesc_seccion8`.`S8_6_2`,
`pesc_seccion8`.`S8_6_3`,
`pesc_seccion8`.`S8_6_4`,
`pesc_seccion8`.`S8_6_5`,
`pesc_seccion8`.`S8_6_6`,
`pesc_seccion9`.`S9_1`,
`pesc_seccion9`.`S9_2`,
`pesc_seccion9`.`S9_3_1`,
`pesc_seccion9`.`S9_4_1`,
`pesc_seccion9`.`S9_5_1`,
`pesc_seccion9`.`S9_5_1_O`,
`pesc_seccion9`.`S9_6_1`,
`pesc_seccion9`.`S9_7_1`,
`pesc_seccion9`.`S9_8_1`,
`pesc_seccion9`.`S9_9_1_A`,
`pesc_seccion9`.`S9_9_1_M`,
`pesc_seccion9`.`S9_10_1_MED`,
`pesc_seccion9`.`S9_10_1_1`,
`pesc_seccion9`.`S9_10_1_2`,
`pesc_seccion9`.`S9_10_1_3`,
`pesc_seccion9`.`S9_11_1`,
`pesc_seccion9`.`S9_12_1`,
`pesc_seccion9`.`S9_13_1`,
`pesc_seccion9`.`S9_14_1`,
`pesc_seccion9`.`S9_15_1`,
`pesc_seccion9`.`S9_16_1`,
`pesc_seccion9`.`S9_17_1`,
`pesc_seccion9`.`S9_18_1`,
`pesc_seccion9`.`S9_19_1`,
`pesc_seccion9`.`S9_20_1_T`,
`pesc_seccion9`.`S9_20_1_C`,
`pesc_seccion9`.`S9_21_1`,
`pesc_seccion9`.`S9_22_1_MED`,
`pesc_seccion9`.`S9_22_1_1`,
`pesc_seccion9`.`S9_22_1_2`,
`pesc_seccion9`.`S9_22_1_3`,
`pesc_seccion9`.`S9_23_1`,
`pesc_seccion9`.`S9_3_2`,
`pesc_seccion9`.`S9_4_2`,
`pesc_seccion9`.`S9_5_2`,
`pesc_seccion9`.`S9_5_2_O`,
`pesc_seccion9`.`S9_6_2`,
`pesc_seccion9`.`S9_7_2`,
`pesc_seccion9`.`S9_8_2`,
`pesc_seccion9`.`S9_9_2_A`,
`pesc_seccion9`.`S9_9_2_M`,
`pesc_seccion9`.`S9_10_2_MED`,
`pesc_seccion9`.`S9_10_2_1`,
`pesc_seccion9`.`S9_10_2_2`,
`pesc_seccion9`.`S9_10_2_3`,
`pesc_seccion9`.`S9_11_2`,
`pesc_seccion9`.`S9_12_2`,
`pesc_seccion9`.`S9_13_2`,
`pesc_seccion9`.`S9_14_2`,
`pesc_seccion9`.`S9_15_2`,
`pesc_seccion9`.`S9_16_2`,
`pesc_seccion9`.`S9_17_2`,
`pesc_seccion9`.`S9_18_2`,
`pesc_seccion9`.`S9_19_2`,
`pesc_seccion9`.`S9_20_2_T`,
`pesc_seccion9`.`S9_20_2_C`,
`pesc_seccion9`.`S9_21_2`,
`pesc_seccion9`.`S9_22_2_MED`,
`pesc_seccion9`.`S9_22_2_1`,
`pesc_seccion9`.`S9_22_2_2`,
`pesc_seccion9`.`S9_22_2_3`,
`pesc_seccion9`.`S9_23_2`,
`pesc_seccion9`.`S9_3_3`,
`pesc_seccion9`.`S9_4_3`,
`pesc_seccion9`.`S9_5_3`,
`pesc_seccion9`.`S9_5_3_O`,
`pesc_seccion9`.`S9_6_3`,
`pesc_seccion9`.`S9_7_3`,
`pesc_seccion9`.`S9_8_3`,
`pesc_seccion9`.`S9_9_3_A`,
`pesc_seccion9`.`S9_9_3_M`,
`pesc_seccion9`.`S9_10_3_MED`,
`pesc_seccion9`.`S9_10_3_1`,
`pesc_seccion9`.`S9_10_3_2`,
`pesc_seccion9`.`S9_10_3_3`,
`pesc_seccion9`.`S9_11_3`,
`pesc_seccion9`.`S9_12_3`,
`pesc_seccion9`.`S9_13_3`,
`pesc_seccion9`.`S9_14_3`,
`pesc_seccion9`.`S9_15_3`,
`pesc_seccion9`.`S9_16_3`,
`pesc_seccion9`.`S9_17_3`,
`pesc_seccion9`.`S9_18_3`,
`pesc_seccion9`.`S9_19_3`,
`pesc_seccion9`.`S9_20_3_T`,
`pesc_seccion9`.`S9_20_3_C`,
`pesc_seccion9`.`S9_21_3`,
`pesc_seccion9`.`S9_22_3_MED`,
`pesc_seccion9`.`S9_22_3_1`,
`pesc_seccion9`.`S9_22_3_2`,
`pesc_seccion9`.`S9_22_3_3`,
`pesc_seccion9`.`S9_23_3`,
`pesc_seccion9`.`S9_3_4`,
`pesc_seccion9`.`S9_4_4`,
`pesc_seccion9`.`S9_5_4`,
`pesc_seccion9`.`S9_5_4_O`,
`pesc_seccion9`.`S9_6_4`,
`pesc_seccion9`.`S9_7_4`,
`pesc_seccion9`.`S9_8_4`,
`pesc_seccion9`.`S9_9_4_A`,
`pesc_seccion9`.`S9_9_4_M`,
`pesc_seccion9`.`S9_10_4_MED`,
`pesc_seccion9`.`S9_10_4_1`,
`pesc_seccion9`.`S9_10_4_2`,
`pesc_seccion9`.`S9_10_4_3`,
`pesc_seccion9`.`S9_11_4`,
`pesc_seccion9`.`S9_12_4`,
`pesc_seccion9`.`S9_13_4`,
`pesc_seccion9`.`S9_14_4`,
`pesc_seccion9`.`S9_15_4`,
`pesc_seccion9`.`S9_16_4`,
`pesc_seccion9`.`S9_17_4`,
`pesc_seccion9`.`S9_18_4`,
`pesc_seccion9`.`S9_19_4`,
`pesc_seccion9`.`S9_20_4_T`,
`pesc_seccion9`.`S9_20_4_C`,
`pesc_seccion9`.`S9_21_4`,
`pesc_seccion9`.`S9_22_4_MED`,
`pesc_seccion9`.`S9_22_4_1`,
`pesc_seccion9`.`S9_22_4_2`,
`pesc_seccion9`.`S9_22_4_3`,
`pesc_seccion9`.`S9_23_4`,
`pesc_seccion9`.`S9_3_5`,
`pesc_seccion9`.`S9_4_5`,
`pesc_seccion9`.`S9_5_5`,
`pesc_seccion9`.`S9_5_5_O`,
`pesc_seccion9`.`S9_6_5`,
`pesc_seccion9`.`S9_7_5`,
`pesc_seccion9`.`S9_8_5`,
`pesc_seccion9`.`S9_9_5_A`,
`pesc_seccion9`.`S9_9_5_M`,
`pesc_seccion9`.`S9_10_5_MED`,
`pesc_seccion9`.`S9_10_5_1`,
`pesc_seccion9`.`S9_10_5_2`,
`pesc_seccion9`.`S9_10_5_3`,
`pesc_seccion9`.`S9_11_5`,
`pesc_seccion9`.`S9_12_5`,
`pesc_seccion9`.`S9_13_5`,
`pesc_seccion9`.`S9_14_5`,
`pesc_seccion9`.`S9_15_5`,
`pesc_seccion9`.`S9_16_5`,
`pesc_seccion9`.`S9_17_5`,
`pesc_seccion9`.`S9_18_5`,
`pesc_seccion9`.`S9_19_5`,
`pesc_seccion9`.`S9_20_5_T`,
`pesc_seccion9`.`S9_20_5_C`,
`pesc_seccion9`.`S9_21_5`,
`pesc_seccion9`.`S9_22_5_MED`,
`pesc_seccion9`.`S9_22_5_1`,
`pesc_seccion9`.`S9_22_5_2`,
`pesc_seccion9`.`S9_22_5_3`,
`pesc_seccion9`.`S9_23_5`,
`pesc_seccion9`.`S9_1_6`,
`pesc_seccion9`.`S9_2_6`,
`pesc_seccion9`.`S9_3_6`,
`pesc_seccion9`.`S9_4_6`,
`pesc_seccion9`.`S9_5_6`,
`pesc_seccion9`.`S9_5_6_O`,
`pesc_seccion9`.`S9_6_6`,
`pesc_seccion9`.`S9_7_6`,
`pesc_seccion9`.`S9_8_6`,
`pesc_seccion9`.`S9_9_6_A`,
`pesc_seccion9`.`S9_9_6_M`,
`pesc_seccion9`.`S9_10_6_MED`,
`pesc_seccion9`.`S9_10_6_1`,
`pesc_seccion9`.`S9_10_6_2`,
`pesc_seccion9`.`S9_10_6_3`,
`pesc_seccion9`.`S9_11_6`,
`pesc_seccion9`.`S9_12_6`,
`pesc_seccion9`.`S9_13_6`,
`pesc_seccion9`.`S9_14_6`,
`pesc_seccion9`.`S9_15_6`,
`pesc_seccion9`.`S9_16_6`,
`pesc_seccion9`.`S9_17_6`,
`pesc_seccion9`.`S9_18_6`,
`pesc_seccion9`.`S9_19_6`,
`pesc_seccion9`.`S9_20_6_T`,
`pesc_seccion9`.`S9_20_6_C`,
`pesc_seccion9`.`S9_21_6`,
`pesc_seccion9`.`S9_22_6_MED`,
`pesc_seccion9`.`S9_22_6_1`,
`pesc_seccion9`.`S9_22_6_2`,
`pesc_seccion9`.`S9_22_6_3`,
`pesc_seccion9`.`S9_23_6`,
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
INNER JOIN `cenpesco`.`pesc_seccion9` ON  `pescador`.`id`= `pesc_seccion9`.`pescador_id`
INNER JOIN `cenpesco`.`pesc_info` ON  `pescador`.`id`= `pesc_info`.`pescador_id`

');
        return $q;  
    }


function get_print_emb(){
       $q = $this->db->query('
SELECT
`pesc_info`.`pescador_id`,
`pesc_info`.`OBS`,
`pesc_info`.`F_D`,
`pesc_info`.`F_M`,
`pesc_info`.`F_A`,
`pesc_info`.`RES`,
`pesc_info`.`EMP`,
`pesc_info`.`EMP_DNI`,
`pesc_info`.`user_id`,
`pesc_info`.`last_ip`,
`pesc_info`.`user_agent`,
`pesc_info`.`created`,
`pesc_info`.`modified`
FROM `cenpesco`.`pesc_info`;
');
       return $q; 
}






//consistencia

function get_report1(){
    $this->db->select('p.NOM_SEDE,p.NOM_DD,p.NOM_PP,p.NOM_DI,p.NOM_CCPP,p.NFORM,p2.S2_2A');
    $this->db->from('pescador p');
    $this->db->join('pesc_seccion2 p2', 'p.id = p2.pescador_id','join');
    $this->db->where('p2.S2_2A >',1997);
    $q = $this->db->get();
    return $q;
}

function get_report2(){
     $q = $this->db->query('
    select p.NOM_SEDE,p.NOM_DD,p.NOM_PP,p.NOM_DI,p.NOM_CCPP,p.NFORM,p2.S2_4 from pescador p inner join pesc_seccion2 p2 ON p.id=p2.pescador_id where p2.S2_4 in (
    select S2_4 from pesc_seccion2 group by S2_4 having count(*) > 1) and p2.S2_4 not in("77777777", "88888888", "99999999");
    ');
    return $q;
}

function get_report3(){
     $q = $this->db->query('
    select p.NOM_SEDE,p.NOM_DD,p.NOM_PP,p.NOM_DI,p.NOM_CCPP,p.NFORM,p2.S2_5 from pescador p inner join pesc_seccion2 p2 ON p.id=p2.pescador_id where p2.S2_5 in (
    select S2_5 from pesc_seccion2 group by S2_5 having count(*) > 1) and p2.S2_5 not in("77777777777", "88888888888", "99999999999");
    ');
    return $q;
}

function get_report4(){
    $this->db->select('p.NOM_SEDE,p.NOM_DD,p.NOM_PP,p.NOM_DI,p.NOM_CCPP,p.NFORM, p2.PTANUM, p2.BLOCK, p2.INT, p2.MZ, p2.LOTE, p2.KM');
    $this->db->from('pescador p');
    $this->db->join('pesc_seccion2 p2', 'p.id = p2.pescador_id','join');
    $this->db->where('p2.PTANUM',NULL);
    $this->db->where('p2.BLOCK',NULL);
    $this->db->where('p2.INT',NULL);
    $this->db->where('p2.MZ',NULL);
    $this->db->where('p2.LOTE',NULL);
    $this->db->where('p2.KM',NULL);
    $q = $this->db->get();
    return $q;
}

function get_report5(){
    $this->db->select('p.NOM_SEDE,p.NOM_DD,p.NOM_PP,p.NOM_DI,p.NOM_CCPP,p.NFORM,p2.S2_12, p2.S2_2A');
    $this->db->from('pescador p');
    $this->db->join('pesc_seccion2 p2', 'p.id = p2.pescador_id','join');
    $this->db->where('p2.S2_12',2);
    $this->db->where('p2.S2_2A <=',1963);
    $q = $this->db->get();
    return $q;
}

function get_report6(){
    $this->db->select('p.NOM_SEDE,p.NOM_DD,p.NOM_PP,p.NOM_DI,p.NOM_CCPP,p.NFORM,p2.S2_12,p2.S2_12A, p2.S2_2A');
    $this->db->from('pescador p');
    $this->db->join('pesc_seccion2 p2', 'p.id = p2.pescador_id','join');
    $this->db->where('p2.S2_12',3);
    $this->db->where('p2.S2_12A >=',1);
    $this->db->where('p2.S2_2A >',1968);
    $q = $this->db->get();
    return $q;
}

function get_report7(){
   $q = $this->db->query('
        SELECT `p`.`NOM_SEDE`, `p`.`NOM_DD`, `p`.`NOM_PP`, `p`.`NOM_DI`, `p`.`NOM_CCPP`, `p`.`NFORM`, `p2`.`S2_12`, `p2`.`S2_12A`, `p2`.`S2_2A` FROM (`pescador` p) JOIN `pesc_seccion2` p2 ON `p`.`id` = `p2`.`pescador_id` WHERE (`p2`.`S2_12` = 4 AND `p2`.`S2_12A` = 1 AND `p2`.`S2_2A` > 2001) OR (`p2`.`S2_12` = 4 AND `p2`.`S2_12A` = 2 AND `p2`.`S2_2A` > 2000) OR (`p2`.`S2_12` = 4 AND `p2`.`S2_12A` = 3 AND `p2`.`S2_2A` > 1999) OR (`p2`.`S2_12` = 4 AND `p2`.`S2_12A` = 4 AND `p2`.`S2_2A` > 1998) OR (`p2`.`S2_12` = 4 AND `p2`.`S2_12A` = 5 AND `p2`.`S2_2A` > 1997)    
    ');
    return $q;
}


function get_report8(){
    $q = $this->db->query('
    SELECT `p`.`NOM_SEDE`, `p`.`NOM_DD`, `p`.`NOM_PP`, `p`.`NOM_DI`, `p`.`NOM_CCPP`, `p`.`NFORM`, `p2`.`S2_12`, `p2`.`S2_2A` FROM (`pescador` p) JOIN `pesc_seccion2` p2 ON `p`.`id` = `p2`.`pescador_id` WHERE (`p2`.`S2_12` = 5 AND `p2`.`S2_2A` > 1997) OR (`p2`.`S2_12` = 6 AND `p2`.`S2_2A` > 1994) OR (`p2`.`S2_12` = 7 AND `p2`.`S2_2A` > 1997) OR (`p2`.`S2_12` = 8 AND `p2`.`S2_2A` > 1991)
    ');
    return $q;
}


function get_report9(){
    $this->db->select('p.NOM_SEDE,p.NOM_DD,p.NOM_PP,p.NOM_DI,p.NOM_CCPP,p.NFORM,p2.S2_13,p2.S2_14_8');
    $this->db->from('pescador p');
    $this->db->join('pesc_seccion2 p2', 'p.id = p2.pescador_id','join');
    $this->db->where('p2.S2_13',2);
    $this->db->where('p2.S2_14_8',1);
    $q = $this->db->get();
    return $q;
}

function get_report10(){
    $q = $this->db->query('
    SELECT `p`.`NOM_SEDE`, `p`.`NOM_DD`, `p`.`NOM_PP`, `p`.`NOM_DI`, `p`.`NOM_CCPP`, `p`.`NFORM`, `p2`.`S2_2A`, `p2`.`S2_22` FROM (`pescador` p) JOIN `pesc_seccion2` p2 ON `p`.`id` = `p2`.`pescador_id` WHERE (`p2`.`S2_22` > 2 AND `p2`.`S2_2A` > 1995) OR (`p2`.`S2_22` > 3 AND `p2`.`S2_2A` > 1993) OR (`p2`.`S2_22` > 4 AND `p2`.`S2_2A` > 1991) OR (`p2`.`S2_22` > 5 AND `p2`.`S2_2A` > 1987) OR (`p2`.`S2_22` > 6 AND `p2`.`S2_2A` > 1983) OR (`p2`.`S2_22` > 7 AND `p2`.`S2_2A` > 1978) OR (`p2`.`S2_22` > 8 AND `p2`.`S2_2A` > 1968) OR (`p2`.`S2_22` > 9 AND `p2`.`S2_2A` > 1953)
     ');
    return $q;
}

function get_report_cab(){
    $this->db->select('id');
    $this->db->from('pescador p');
    $q = $this->db->get();
    return $q;
}

function get_report11_son($id){
    $q = $this->db->query('
    SELECT `p`.`id`,`p`.`NOM_SEDE`, `p`.`NOM_DD`, `p`.`NOM_PP`, `p`.`NOM_DI`, `p`.`NOM_CCPP`, `p`.`NFORM`,
`pesc_seccion2`.`S2_23_1_1`,
`pesc_seccion2`.`S2_23_4_1A`,
`pesc_seccion2`.`S2_23_8_1`,

`pesc_seccion2`.`S2_23_1_2`,
`pesc_seccion2`.`S2_23_4_2A`,
`pesc_seccion2`.`S2_23_8_2`,

`pesc_seccion2`.`S2_23_1_3`,
`pesc_seccion2`.`S2_23_4_3A`,
`pesc_seccion2`.`S2_23_8_3`,

`pesc_seccion2`.`S2_23_1_4`,
`pesc_seccion2`.`S2_23_4_4A`,
`pesc_seccion2`.`S2_23_8_4`,

`pesc_seccion2`.`S2_23_1_5`,
`pesc_seccion2`.`S2_23_4_5A`,
`pesc_seccion2`.`S2_23_8_5`,

`pesc_seccion2`.`S2_23_1_6`,
`pesc_seccion2`.`S2_23_4_6A`,
`pesc_seccion2`.`S2_23_8_6`,

`pesc_seccion2`.`S2_23_1_7`,
`pesc_seccion2`.`S2_23_4_7A`,
`pesc_seccion2`.`S2_23_8_7`,

`pesc_seccion2`.`S2_23_1_8`,
`pesc_seccion2`.`S2_23_4_8A`,
`pesc_seccion2`.`S2_23_8_8`,

`pesc_seccion2`.`S2_23_1_9`,
`pesc_seccion2`.`S2_23_4_9A`,
`pesc_seccion2`.`S2_23_8_9`,

`pesc_seccion2`.`S2_23_1_10`,
`pesc_seccion2`.`S2_23_4_10A`,
`pesc_seccion2`.`S2_23_8_10`

    FROM (`pescador` p) left join pesc_seccion2 ON p.id = pesc_seccion2.pescador_id WHERE p.id = ?
     ',array($id));
    return $q;
}


function get_report12_son($id){
    $q = $this->db->query('
    SELECT `p`.`id`,`p`.`NOM_SEDE`, `p`.`NOM_DD`, `p`.`NOM_PP`, `p`.`NOM_DI`, `p`.`NOM_CCPP`, `p`.`NFORM`, pesc_seccion2.S2_2A,
`pesc_seccion2`.`S2_23_1_1`,
`pesc_seccion2`.`S2_23_4_1A`,

`pesc_seccion2`.`S2_23_1_2`,
`pesc_seccion2`.`S2_23_4_2A`,

`pesc_seccion2`.`S2_23_1_3`,
`pesc_seccion2`.`S2_23_4_3A`,

`pesc_seccion2`.`S2_23_1_4`,
`pesc_seccion2`.`S2_23_4_4A`,

`pesc_seccion2`.`S2_23_1_5`,
`pesc_seccion2`.`S2_23_4_5A`,

`pesc_seccion2`.`S2_23_1_6`,
`pesc_seccion2`.`S2_23_4_6A`,

`pesc_seccion2`.`S2_23_1_7`,
`pesc_seccion2`.`S2_23_4_7A`,

`pesc_seccion2`.`S2_23_1_8`,
`pesc_seccion2`.`S2_23_4_8A`,

`pesc_seccion2`.`S2_23_1_9`,
`pesc_seccion2`.`S2_23_4_9A`,

`pesc_seccion2`.`S2_23_1_10`,
`pesc_seccion2`.`S2_23_4_10A`

    FROM (`pescador` p) left join pesc_seccion2 ON p.id = pesc_seccion2.pescador_id WHERE p.id = ? 
     ',array($id));
    return $q;
}

function get_report13_son($id){
    $q = $this->db->query('
    SELECT `p`.`id`,`p`.`NOM_SEDE`, `p`.`NOM_DD`, `p`.`NOM_PP`, `p`.`NOM_DI`, `p`.`NOM_CCPP`, `p`.`NFORM`,
`pesc_seccion2`.`S2_23_1_1`,
`pesc_seccion2`.`S2_23_4_1A`,
`pesc_seccion2`.`S2_23_6_1`,

`pesc_seccion2`.`S2_23_1_2`,
`pesc_seccion2`.`S2_23_4_2A`,
`pesc_seccion2`.`S2_23_6_2`,

`pesc_seccion2`.`S2_23_1_3`,
`pesc_seccion2`.`S2_23_4_3A`,
`pesc_seccion2`.`S2_23_6_3`,

`pesc_seccion2`.`S2_23_1_4`,
`pesc_seccion2`.`S2_23_4_4A`,
`pesc_seccion2`.`S2_23_6_4`,

`pesc_seccion2`.`S2_23_1_5`,
`pesc_seccion2`.`S2_23_4_5A`,
`pesc_seccion2`.`S2_23_6_5`,

`pesc_seccion2`.`S2_23_1_6`,
`pesc_seccion2`.`S2_23_4_6A`,
`pesc_seccion2`.`S2_23_6_6`,

`pesc_seccion2`.`S2_23_1_7`,
`pesc_seccion2`.`S2_23_4_7A`,
`pesc_seccion2`.`S2_23_6_7`,

`pesc_seccion2`.`S2_23_1_8`,
`pesc_seccion2`.`S2_23_4_8A`,
`pesc_seccion2`.`S2_23_6_8`,

`pesc_seccion2`.`S2_23_1_9`,
`pesc_seccion2`.`S2_23_4_9A`,
`pesc_seccion2`.`S2_23_6_9`,

`pesc_seccion2`.`S2_23_1_10`,
`pesc_seccion2`.`S2_23_4_10A`,
`pesc_seccion2`.`S2_23_6_10`

    FROM (`pescador` p) left join pesc_seccion2 ON p.id = pesc_seccion2.pescador_id WHERE p.id = ? 
     ',array($id));
    return $q;
}




}
?>