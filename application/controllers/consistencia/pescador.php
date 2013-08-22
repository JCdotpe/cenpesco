<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Pescador extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		$this->load->helper(array('form', 'url'));
		$this->load->library('form_validation');
		$this->load->library('security');
		$this->load->library('tank_auth');
		$this->lang->load('tank_auth');	
		$this->load->model('pescador_model');
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
			$data['tables'] = $this->pescador_model->get_report1(); 
			$data['opcion'] = 1;
			$data['main_content'] = 'consistencia/pescador/reporte1_view';
			$this->load->view('backend/includes/template', $data);		
	}

	public function reporte2()
	{
			$data['nav'] = TRUE;
			$data['title'] = 'Consistencia';
			$data['user_id']	= $this->tank_auth->get_user_id();
			$data['username']	= $this->tank_auth->get_username();				
			$data['tables'] = $this->pescador_model->get_report2(); 
			$data['opcion'] = 2;
			$data['main_content'] = 'consistencia/pescador/reporte2_view';
			$this->load->view('backend/includes/template', $data);		
	}

	public function reporte3()
	{
			$data['nav'] = TRUE;
			$data['title'] = 'Consistencia';
			$data['user_id']	= $this->tank_auth->get_user_id();
			$data['username']	= $this->tank_auth->get_username();				
			$data['tables'] = $this->pescador_model->get_report3(); 
			$data['opcion'] = 3;
			$data['main_content'] = 'consistencia/pescador/reporte3_view';
			$this->load->view('backend/includes/template', $data);		
	}

	public function reporte4()
	{
			$data['nav'] = TRUE;
			$data['title'] = 'Consistencia';
			$data['user_id']	= $this->tank_auth->get_user_id();
			$data['username']	= $this->tank_auth->get_username();				
			$data['tables'] = $this->pescador_model->get_report4(); 
			$data['opcion'] = 4;
			$data['main_content'] = 'consistencia/pescador/reporte4_view';
			$this->load->view('backend/includes/template', $data);		
	}
	public function reporte5()
	{
			$data['nav'] = TRUE;
			$data['title'] = 'Consistencia';
			$data['user_id']	= $this->tank_auth->get_user_id();
			$data['username']	= $this->tank_auth->get_username();				
			$data['tables'] = $this->pescador_model->get_report5(); 
			$data['opcion'] = 5;
			$data['main_content'] = 'consistencia/pescador/reporte5_view';
			$this->load->view('backend/includes/template', $data);		
	}

	public function reporte6()
	{
			$data['nav'] = TRUE;
			$data['title'] = 'Consistencia';
			$data['user_id']	= $this->tank_auth->get_user_id();
			$data['username']	= $this->tank_auth->get_username();				
			$data['tables'] = $this->pescador_model->get_report6(); 
			$data['opcion'] = 6;
			$data['main_content'] = 'consistencia/pescador/reporte6_view';
			$this->load->view('backend/includes/template', $data);		
	}
	
	public function reporte7()
	{
			$data['nav'] = TRUE;
			$data['title'] = 'Consistencia';
			$data['user_id']	= $this->tank_auth->get_user_id();
			$data['username']	= $this->tank_auth->get_username();				
			$data['tables'] = $this->pescador_model->get_report7(); 
			$data['opcion'] = 7;
			$data['main_content'] = 'consistencia/pescador/reporte7_view';
			$this->load->view('backend/includes/template', $data);		
	}

	public function reporte8()
	{
			$data['nav'] = TRUE;
			$data['title'] = 'Consistencia';
			$data['user_id']	= $this->tank_auth->get_user_id();
			$data['username']	= $this->tank_auth->get_username();				
			$data['tables'] = $this->pescador_model->get_report8(); 
			$data['opcion'] = 8;
			$data['main_content'] = 'consistencia/pescador/reporte8_view';
			$this->load->view('backend/includes/template', $data);		
	}

	public function reporte9()
	{
			$data['nav'] = TRUE;
			$data['title'] = 'Consistencia';
			$data['user_id']	= $this->tank_auth->get_user_id();
			$data['username']	= $this->tank_auth->get_username();				
			$data['tables'] = $this->pescador_model->get_report9(); 
			$data['opcion'] = 9;
			$data['main_content'] = 'consistencia/pescador/reporte9_view';
			$this->load->view('backend/includes/template', $data);		
	}

	public function reporte10()
	{
			$data['nav'] = TRUE;
			$data['title'] = 'Consistencia';
			$data['user_id']	= $this->tank_auth->get_user_id();
			$data['username']	= $this->tank_auth->get_username();				
			$data['tables'] = $this->pescador_model->get_report10(); 
			$data['opcion'] = 10;
			$data['main_content'] = 'consistencia/pescador/reporte10_view';
			$this->load->view('backend/includes/template', $data);		
	}

	public function reporte11()
	{
			$data['nav'] = TRUE;
			$data['title'] = 'Consistencia';
			$data['user_id']	= $this->tank_auth->get_user_id();
			$data['username']	= $this->tank_auth->get_username();				
			$data['tables'] = $this->pescador_model->get_report11(); 
			$data['opcion'] = 11;
			$data['main_content'] = 'consistencia/pescador/reporte11_view';
			$this->load->view('backend/includes/template', $data);		
	}



	// function to_excel(){
	// 	$this->load->helper('excel');
 //        $query = $this->udra_comunidad_model->get_all_export();
 //        to_excel($query, 'Udra_Comunidad');
	// }


}