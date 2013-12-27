<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Digitacion extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		$this->load->library('form_validation');
		$this->load->library('security');
		$this->load->library('tank_auth');
		$this->lang->load('tank_auth');		
		$this->load->model('usuarios_permisos_model');

		//User is logged in
		if (!$this->tank_auth->is_logged_in()) {
			redirect('/auth/login/');
		}

		//Check user privileges 
		$roles = $this->tank_auth->get_roles();
		$flag = FALSE;
		foreach ($roles as $role) {
			if($role->role_id == 5 && $role->rolename == 'Digitación'){
				$flag = TRUE;
				break;
			}
		}

		//If not author is the maintenance guy!
		if (!$flag) {
			show_404();
			die();
		}


		$this->load->model('pais_model');	
		$this->load->model('pesca_piloto_model');	
		$this->load->model('ubigeo_model');	
		$this->load->model('ubigeo_piloto_model');	
	}

	public function index()
	{
			// $data['departamento'] = $this->ubigeo_piloto_model->get_dpto_by_code($this->tank_auth->get_ubigeo());
			//$data['option'] = 1; 
			//$data['pais']=$this->pais_model->select_pais();
			$data['nav'] = TRUE;
			$data['title'] = 'Digitacion';
			$data['main_content'] = 'digitacion/index_view';
			//$data['usuarios'] = $this->usuarios_permisos_model->get_users_by_tipo(6);
			$data['usuarios'] = $this->usuarios_permisos_model->get_users_by_id($this->tank_auth->get_user_id());
			$data['sedes'] = $this->usuarios_permisos_model->get_sedes_operativas();
			$u_id = $this->tank_auth->get_user_id();
			//$data['restriccion'] = ( ($u_id == 270) || ($u_id == 271) || ($u_id == 272) || ($u_id == 174) ) ? FALSE : TRUE ;
			$data['restriccion'] = FALSE ;
			//tipo de usuarios
			$u_tipo = $this->tank_auth->get_user_tipo();
			$data['tipo_global'] = ( ($u_tipo == 2) || ($u_tipo == 0) ) ? TRUE : FALSE ;
			$this->load->view('backend/includes/template', $data);
	}


	public function actualizar_sede_user()
	{
		$is_ajax = $this->input->post('ajax');
		if ($is_ajax) {


			$usuario = explode('-', $this->input->post('usuario'));
			$nombre = explode(' ', $this->input->post('nombre'));
			$data = array(
				'user_id' 		=> $usuario[0],
				'user_name'		=> $nombre[0],
				'user_dni'		=> $usuario[1],
				'sede_cod'		=> $this->input->post('sede'),
				'nom_sede'		=> $this->input->post('nom_sede'),
				'supervisor_id' => $this->tank_auth->get_user_id(),
				'observacion' 	=> $this->input->post('OBS'),
				'fecha' 		=> date('Y-m-d H:i:s'),
				);
			
			$insertados = 0;
			$afectados	= $this->usuarios_permisos_model->update_user_ubigeo($usuario[0], $usuario[1], $this->input->post('sede')); // actualiza SEDE
			if($afectados == 1)
			{
				$insertados = $this->usuarios_permisos_model->insert_historial_user_sede($data); //guarda el historial
			}
			$da['insertados'] = $insertados;
			$da['afectados'] = $afectados;
			$datos['datos'] = $da;
			$this->load->view('backend/json/json_view', $datos);
			//echo json_encode($insertados);

		} 
	}
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */