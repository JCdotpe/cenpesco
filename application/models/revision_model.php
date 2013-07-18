<?php 
/**
* 
*/
class Revision_model extends CI_MODEL
{
	
	function consulta_ccpp($dep,$prov,$dist,$ccpp)
	{
        $this->db->where('CCDD',$dep);
        $this->db->where('CCPP',$prov);
        $this->db->where('CCDI',$dist);
        $this->db->where('COD_CCPP',$ccpp);
        $this->db->where('activo',1);        
        $q = $this->db->get('revision_gabinete');
		return $q->num_rows();
	}

    function get_todo($odei)
    {   
        $this->db->select('SEDE_COD,NOM_SEDE,ODEI_COD,NOM_ODEI,CCDD,NOM_DD,CCPP,NOM_PP,CCDI,NOM_DI,COD_CCPP,NOM_CCPP,F_D,F_M,
                        NOM,CARGO,F_PES,F_ACU,F_COM,SEC,PREG_N,E_CONC,E_DILIG,E_OMI,DES_E');
        $this->db->where_in('SEDE_COD',$odei);
        $q = $this->db->get('revision_gabinete');
        return $q;
    }

    function insertar($data){
		$this->db->insert('revision_gabinete', $data);
		return $this->db->affected_rows();
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


    function insert_comunidad_seccion($table,$data){//inserta en las tablas comunidades
        $this->db->insert($table, $data);
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
        $q = $this->db->get('udra_comunidad');
        return $q;
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






}
?>