<?php 
/**
* 
*/
class Empadronador_jefe_model extends CI_MODEL
{

    function get_nombres_by_odei($odei){
        $this->db->select('NOMBRE, DNI');
        $this->db->order_by('NOMBRE');
        $this->db->where_in('ODEI_COD',$odei);
        $q = $this->db->get('empadronador_jefe');
        return $q;
    }

	
 

}
?>