<?php 
/**
* 
*/
class Registro_pescadores_dat_model extends CI_MODEL
{
	
	function insert_registro_pescadores ($data)
	{
		$this->db->insert('registro_pescadores_dat',$data);
		return $this->db->affected_rows();
	}

	function get_num_filas($cod)
	{
		$this->db->where('id_reg',$cod);
		$q = $this->db->get('registro_pescadores_dat');
		return $q->num_rows();
	}	

	function get_detalles($cod)
	{
		$this->db->where('id_reg',$cod);
		$this->db->select('P1,P2,P3,P4,P5,P6,P7,P8,P9,P10,P11,P12,P13,P14,P15');
		$q = $this->db->get('registro_pescadores_dat');
		return $q->result();
	}

		function get_filas_ccpp($cod)
	{	
		$this->db->where('id_reg',$cod);
		$this->db->select('id_reg');
		$q = $this->db->get('registro_pescadores');

		return $q->result_array();
	}

		function get_pescadores_i($id)
	{	
		$this->db->where('id_reg',$id);
		$this->db->where('P5',1);
		$this->db->select('P5');
		$q = $this->db->get('registro_pescadores_dat');
		return $q->num_rows();
	}
		function get_acuicultores_i($id)
	{	
		$this->db->where('id_reg',$id);
		$this->db->where('P5',2);
		$this->db->select('P5');
		$q = $this->db->get('registro_pescadores_dat');
		return $q->num_rows();
	}
		function get_pes_acuicultores_i($id)
	{	
		$this->db->where('id_reg',$id);
		$this->db->where('P5',3);
		$this->db->select('P5');
		$q = $this->db->get('registro_pescadores_dat');
		return $q->num_rows();
	}	
		function get_embarcaciones_i($id)
	{	
		$this->db->where('id_reg',$id);
		$this->db->select_sum('P15');
		$q = $this->db->get('registro_pescadores_dat');
		return $q->row('P15');
	}

}


