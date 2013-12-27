<?php
class Seguimiento_adm_model extends CI_Model{

    function get_regs(){
    	$q = $this->db->get('seguimiento_adm');
		return $q;
    }   

    function get_fields_regs(){
        $q = $this->db->list_fields('seguimiento_adm');
        return $q;
    }

	function insert($req)
	{
		$newData = array(
						'requerimiento' => $req
					);
		$this->db->insert('seguimiento_adm', $newData);
		return $this->db->insert_id();
	}

	function update($code, $columnname, $newvalue)
	{
		if ($columnname != 'num') // One dirty hack to prevent the PK column to be updated
		{
			// $this->load->database();
			
			$newData = array(
							$columnname => $newvalue
						);
			$this->db->where('num', $code);
			$this->db->update('seguimiento_adm', $newData);
		}
	}
	
	function delete($code)
	{
			$newData = array(
							'estado' => 0
						);
			$this->db->where('num', $code);
			$this->db->update('seguimiento_adm', $newData);
	}
	

	function get_avance_fijo()
	{
		$q = $this->db->query('select * from avance_empadronador_fijo');
		return $q;

	}


 }