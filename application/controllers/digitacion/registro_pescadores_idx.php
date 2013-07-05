<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Registro_pescadores_idx extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		$this->load->helper(array('form', 'url'));
		$this->load->library('form_validation');
		$this->load->library('security');
		$this->load->library('tank_auth');
		$this->lang->load('tank_auth');	
		$this->load->model('ubigeo_model');	
		$this->load->model('pais_model');

		if (!$this->tank_auth->is_logged_in()) {
			// redirect('/auth/login/');
			//No loging enviar a bienvenida cenpesco
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

		//If not author is BENDER!
		if (!$flag) {
			show_404();
			die();
		}	


	}


	public function index()
	{

		if (!$this->tank_auth->is_logged_in()) {
			redirect('/auth/login/');
		} else {
			$data['nav'] = TRUE;
			$data['title'] = 'Registro de Pescadores y Acuicultores';	
			$data['main_content'] = 'digitacion/registro_pescadores_view';
			// $data['departamento'] = $this->ubigeo_model->get_dptos();
			// $data['pais']=$this->pais_model->select_pais();

	        $this->load->view('backend/includes/template', $data);
		}

	}
}
