<?php	

/**
* 
*/
class Usuarios_permisos_model extends CI_Model
{
	
	function get_users_by_tipo($tipo)
	{
		$q = $this->db->query("
			select user_id, username, nombres, apellidos, dni  from user_profiles inner join users on user_profiles.user_id = users.id where tipo = ". $tipo . ";
			");
		return $q;
	}

	function get_users_by_id($id)
	{
		$q = $this->db->query("
			select user_id, username, nombres, apellidos, dni  from user_profiles inner join users on user_profiles.user_id = users.id where user_id = ". $id . ";
			");
		return $q;
	}

	function get_sedes_operativas()
	{
		$q = $this->db->query("
			select distinct(SEDE_COD), NOM_SEDE from marco;
			");
		return $q;
	}

	function update_user_ubigeo($user_id, $user_dni, $ubigeo)
	{
		$this->db->where('user_id',$user_id);
		$this->db->where('dni',$user_dni);
		$this->db->set('ubigeo', $ubigeo);
		$this->db->update('user_profiles');
		return $this->db->affected_rows();
	}

	function insert_historial_user_sede($data)
	{
		$this->db->insert('historial_user_sede', $data);
		return $this->db->affected_rows();
	}
}




?>