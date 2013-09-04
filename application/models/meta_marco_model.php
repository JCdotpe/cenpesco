<?php 
/**
* 
*/
class Meta_marco_model extends CI_MODEL
{
 


    // para reporte especial avance_trabajo_campo ******************************************************************************
    function get_all()//datos fijos de AVANCE_TRABAJO_cAMPO 
    {
        $this->db->order_by('ODEI_COD');
        $q = $this->db->get('meta_marco');
        return $q;
    }    

    


}

?>