<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Registro_pescadores_rp1 extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		$this->load->helper(array('form', 'url'));
		$this->load->library('form_validation');
		$this->load->library('security');
		$this->load->library('tank_auth');
		$this->lang->load('tank_auth');	
		$this->load->model('marco_model');	
		$this->load->model('ubigeo_piloto_model');	
		$this->load->model('registro_pescadores_model');

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
			$data['nav'] = TRUE;
			$data['title'] = 'Reporte Registro de Pescadores y Acuicultores';	
			$data['main_content'] = 'digitacion/registro_pescadores_rp1_view';
			$data['opcion'] =1;
			$sedes = $this->marco_model->get_odei($this->tank_auth->get_ubigeo());// deps. que el usuario tiene habilitado
			$data['registros'] = $this->registro_pescadores_model->select_todo($sedes);

	        $this->load->view('backend/includes/template', $data);
	}

	public function report_excel()
	{
		$this->load->helper('excel');
		$departamento = $this->marco_model->get_odei($this->tank_auth->get_ubigeo()); 
		$query = $this->registro_pescadores_model->select_todo($departamento);
		to_excel($query,'Registro');
	}



}
