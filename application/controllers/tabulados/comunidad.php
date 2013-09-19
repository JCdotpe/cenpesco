<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Comunidad extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		$this->load->helper(array('form', 'url'));
		$this->load->library('form_validation');
		$this->load->library('security');
		$this->load->library('tank_auth');
		$this->load->library('table');
		$this->lang->load('tank_auth');	
		$this->load->model('comunidad_model');
		$this->load->model('marco_model');
		$this->load->model('ubigeo_model');
		$this->load->helper('date');
		date_default_timezone_set('America/Lima');		
	    $tmpl = array ( 'table_open'  => '<table class="table table-bordered table-striped table-submit table-condensed" style="background-color:#fff">' );
	    $this->table->set_template($tmpl);
		if (!$this->tank_auth->is_logged_in()) {
			// redirect('/auth/login/');
			//No loging enviar a bienvenida cenpesco
			redirect('/auth/login/');
		}

		//Check user privileges 
		$roles = $this->tank_auth->get_roles();
		$flag = FALSE;
		foreach ($roles as $role) {
			if($role->role_id == 6 && $role->rolename == 'Tabulados'){
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
			$data['title'] = 'Tabulados';	
			$data['opcion'] = 1;		
			$data['tables'] = $this->comunidad_model->get_tabulado_1();
			$data['main_content'] = 'tabulados/comunidad/reporte_1_view';

			$this->load->view('backend/includes/template', $data);		
	}

	public function reporte_2()
	{
			$data['nav'] = TRUE;
			$data['title'] = 'Tabulados';	
			$data['opcion'] = 2;		
			$data['tables'] = $this->comunidad_model->get_tabulado_2();
			$data['main_content'] = 'tabulados/comunidad/reporte_2_view';

			$this->load->view('backend/includes/template', $data);		
	}


	public function reporte_3()
	{
			$data['nav'] = TRUE;
			$data['title'] = 'Tabulados';	
			$data['opcion'] = 3;		
			$data['tables'] = $this->comunidad_model->get_tabulado_3();
			$data['main_content'] = 'tabulados/comunidad/reporte_3_view';

			$this->load->view('backend/includes/template', $data);		
	}

	public function reporte_4()
	{
			$data['nav'] = TRUE;
			$data['title'] = 'Tabulados';	
			$data['opcion'] = 4;		
			$data['tables'] = $this->comunidad_model->get_tabulado_4();
			$data['main_content'] = 'tabulados/comunidad/reporte_4_view';

			$this->load->view('backend/includes/template', $data);		
	}

	public function reporte_5()
	{
			$data['nav'] = TRUE;
			$data['title'] = 'Tabulados';	
			$data['opcion'] = 5;		
			$data['tables'] = $this->comunidad_model->get_tabulado_5();
			$data['main_content'] = 'tabulados/comunidad/reporte_5_view';

			$this->load->view('backend/includes/template', $data);		
	}

	public function reporte_6()
	{
			$data['nav'] = TRUE;
			$data['title'] = 'Tabulados';	
			$data['opcion'] = 6;		
			$data['tables'] = $this->comunidad_model->get_tabulado_6();
			$data['main_content'] = 'tabulados/comunidad/reporte_6_view';

			$this->load->view('backend/includes/template', $data);		
	}


	public function reporte_7()
	{
			$data['nav'] = TRUE;
			$data['title'] = 'Tabulados';	
			$data['opcion'] = 7;		
			$data['tables'] = $this->comunidad_model->get_tabulado_7();
			$data['main_content'] = 'tabulados/comunidad/reporte_7_view';

			$this->load->view('backend/includes/template', $data);		
	}
	public function reporte_8()
	{
			$data['nav'] = TRUE;
			$data['title'] = 'Tabulados';	
			$data['opcion'] = 8;		
			$data['tables'] = $this->comunidad_model->get_tabulado_8();
			$data['main_content'] = 'tabulados/comunidad/reporte_8_view';

			$this->load->view('backend/includes/template', $data);		
	}
}
