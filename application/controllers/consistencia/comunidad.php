<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Comunidad extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		$this->load->helper(array('form', 'url'));
		$this->load->library('form_validation');
		$this->load->library('security');
		$this->load->library('tank_auth');
		$this->lang->load('tank_auth');	
		$this->load->model('comunidad_model');
		$this->load->model('marco_model');
		$this->load->helper('date');
		date_default_timezone_set('America/Lima');		

		if (!$this->tank_auth->is_logged_in()) {
			// redirect('/auth/login/');
			//No loging enviar a bienvenida cenpesco
			redirect('/auth/login/');
		}

		//Check user privileges 
		$roles = $this->tank_auth->get_roles();
		$flag = FALSE;
		foreach ($roles as $role) {
			if($role->role_id == 10 && $role->rolename == 'Consistencia'){
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
			$data['title'] = 'Consistencia';
			$data['user_id']	= $this->tank_auth->get_user_id();
			$data['username']	= $this->tank_auth->get_username();				
			$data['tables'] = $this->comunidad_model->get_report_1(); 
			$data['opcion'] = 1;
			$data['main_content'] = 'consistencia/comunidad/reporte_1_view';
			$this->load->view('backend/includes/template', $data);		
	}
	public function reporte_2()
	{
			$data['nav'] = TRUE;
			$data['title'] = 'Consistencia';
			$data['user_id']	= $this->tank_auth->get_user_id();
			$data['username']	= $this->tank_auth->get_username();				
			$data['tables'] = $this->comunidad_model->get_report_2(); 
			$data['opcion'] = 2;
			$data['main_content'] = 'consistencia/comunidad/reporte_2_view';
			$this->load->view('backend/includes/template', $data);		
	}
	function to_excel(){
		$this->load->helper('excel');
        $query = $this->udra_comunidad_model->get_all_export();
        to_excel($query, 'Udra_Comunidad');
	}


}