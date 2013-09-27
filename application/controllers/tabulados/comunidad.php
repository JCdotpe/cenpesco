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
	public function reporte_9()
	{
			$data['nav'] = TRUE;
			$data['title'] = 'Tabulados';	
			$data['opcion'] = 9;		
			$data['tables'] = $this->comunidad_model->get_tabulado_9();
			$data['main_content'] = 'tabulados/comunidad/reporte_9_view';

			$this->load->view('backend/includes/template', $data);		
	}	
	public function reporte_10()
	{
			$data['nav'] = TRUE;
			$data['title'] = 'Tabulados';	
			$data['opcion'] = 10;		
			$data['tables'] = $this->comunidad_model->get_tabulado_10();
			$data['main_content'] = 'tabulados/comunidad/reporte_10_view';

			$this->load->view('backend/includes/template', $data);		
	}		

	public function reporte_11()
	{
			$data['nav'] = TRUE;
			$data['title'] = 'Tabulados';	
			$data['opcion'] = 11;		
			$data['tables'] = $this->comunidad_model->get_tabulado_11();
			$data['main_content'] = 'tabulados/comunidad/reporte_11_view';

			$this->load->view('backend/includes/template', $data);		
	}

	public function reporte_12()
	{
			$data['nav'] = TRUE;
			$data['title'] = 'Tabulados';	
			$data['opcion'] = 12;		
			$data['tables'] = $this->comunidad_model->get_tabulado_12();
			$data['main_content'] = 'tabulados/comunidad/reporte_12_view';

			$this->load->view('backend/includes/template', $data);		
	}


	public function reporte_13()
	{
			$data['nav'] = TRUE;
			$data['title'] = 'Tabulados';	
			$data['opcion'] = 13;		
			$data['tables'] = $this->comunidad_model->get_tabulado_13();
			$data['main_content'] = 'tabulados/comunidad/reporte_13_view';

			$this->load->view('backend/includes/template', $data);		
	}

	public function reporte_14()
	{
			$data['nav'] = TRUE;
			$data['title'] = 'Tabulados';	
			$data['opcion'] = 14;		
			$data['tables'] = $this->comunidad_model->get_tabulado_14();
			$data['main_content'] = 'tabulados/comunidad/reporte_14_view';

			$this->load->view('backend/includes/template', $data);		
	}

	public function reporte_15()
	{
			$data['nav'] = TRUE;
			$data['title'] = 'Tabulados';	
			$data['opcion'] = 15;		
			$data['tables'] = $this->comunidad_model->get_tabulado_15();
			$data['main_content'] = 'tabulados/comunidad/reporte_15_view';

			$this->load->view('backend/includes/template', $data);		
	}

	public function reporte_16()
	{
			$data['nav'] = TRUE;
			$data['title'] = 'Tabulados';	
			$data['opcion'] = 16;		
			$data['tables'] = $this->comunidad_model->get_tabulado_16();
			$data['main_content'] = 'tabulados/comunidad/reporte_16_view';

			$this->load->view('backend/includes/template', $data);		
	}


	public function reporte_17()
	{
			$data['nav'] = TRUE;
			$data['title'] = 'Tabulados';	
			$data['opcion'] = 17;		
			$data['tables'] = $this->comunidad_model->get_tabulado_17();
			$data['main_content'] = 'tabulados/comunidad/reporte_17_view';

			$this->load->view('backend/includes/template', $data);		
	}
	public function reporte_18()
	{
			$data['nav'] = TRUE;
			$data['title'] = 'Tabulados';	
			$data['opcion'] = 18;		
			$data['tables'] = $this->comunidad_model->get_tabulado_18();
			$data['main_content'] = 'tabulados/comunidad/reporte_18_view';

			$this->load->view('backend/includes/template', $data);		
	}
	public function reporte_19()
	{
			$data['nav'] = TRUE;
			$data['title'] = 'Tabulados';	
			$data['opcion'] = 19;		
			$data['tables'] = $this->comunidad_model->get_tabulado_19();
			$data['main_content'] = 'tabulados/comunidad/reporte_19_view';

			$this->load->view('backend/includes/template', $data);		
	}	
	public function reporte_20()
	{
			$data['nav'] = TRUE;
			$data['title'] = 'Tabulados';	
			$data['opcion'] = 20;		
			$data['tables'] = $this->comunidad_model->get_tabulado_20();
			$data['main_content'] = 'tabulados/comunidad/reporte_20_view';

			$this->load->view('backend/includes/template', $data);		
	}	

	public function reporte_21()
	{
			$data['nav'] = TRUE;
			$data['title'] = 'Tabulados';	
			$data['opcion'] = 21;		
			$data['tables'] = $this->comunidad_model->get_tabulado_21();
			$data['main_content'] = 'tabulados/comunidad/reporte_21_view';

			$this->load->view('backend/includes/template', $data);		
	}

	public function reporte_22()
	{
			$data['nav'] = TRUE;
			$data['title'] = 'Tabulados';	
			$data['opcion'] = 22;		
			$data['tables'] = $this->comunidad_model->get_tabulado_22();
			$data['main_content'] = 'tabulados/comunidad/reporte_22_view';

			$this->load->view('backend/includes/template', $data);		
	}


	public function reporte_23()
	{
			$data['nav'] = TRUE;
			$data['title'] = 'Tabulados';	
			$data['opcion'] = 23;		
			$data['tables'] = $this->comunidad_model->get_tabulado_23();
			$data['main_content'] = 'tabulados/comunidad/reporte_23_view';

			$this->load->view('backend/includes/template', $data);		
	}

	public function reporte_24()
	{
			$data['nav'] = TRUE;
			$data['title'] = 'Tabulados';	
			$data['opcion'] = 24;		
			$data['tables'] = $this->comunidad_model->get_tabulado_24();
			$data['main_content'] = 'tabulados/comunidad/reporte_24_view';

			$this->load->view('backend/includes/template', $data);		
	}

	public function reporte_25()
	{
			$data['nav'] = TRUE;
			$data['title'] = 'Tabulados';	
			$data['opcion'] = 25;		
			$data['tables'] = $this->comunidad_model->get_tabulado_25();
			$data['main_content'] = 'tabulados/comunidad/reporte_25_view';

			$this->load->view('backend/includes/template', $data);		
	}

	public function reporte_26()
	{
			$data['nav'] = TRUE;
			$data['title'] = 'Tabulados';	
			$data['opcion'] = 26;		
			$data['tables'] = $this->comunidad_model->get_tabulado_26();
			$data['main_content'] = 'tabulados/comunidad/reporte_26_view';

			$this->load->view('backend/includes/template', $data);		
	}


	public function reporte_27()
	{
			$data['nav'] = TRUE;
			$data['title'] = 'Tabulados';	
			$data['opcion'] = 27;		
			$data['tables'] = $this->comunidad_model->get_tabulado_27();
			$data['main_content'] = 'tabulados/comunidad/reporte_27_view';

			$this->load->view('backend/includes/template', $data);		
	}
	public function reporte_28()
	{
			$data['nav'] = TRUE;
			$data['title'] = 'Tabulados';	
			$data['opcion'] = 28;		
			$data['tables'] = $this->comunidad_model->get_tabulado_28();
			$data['main_content'] = 'tabulados/comunidad/reporte_28_view';

			$this->load->view('backend/includes/template', $data);		
	}
	public function reporte_29()
	{
			$data['nav'] = TRUE;
			$data['title'] = 'Tabulados';	
			$data['opcion'] = 29;		
			$data['tables'] = $this->comunidad_model->get_tabulado_29();
			$data['main_content'] = 'tabulados/comunidad/reporte_29_view';

			$this->load->view('backend/includes/template', $data);		
	}	
	public function reporte_30()
	{
			$data['nav'] = TRUE;
			$data['title'] = 'Tabulados';	
			$data['opcion'] = 30;		
			$data['tables'] = $this->comunidad_model->get_tabulado_30();
			$data['main_content'] = 'tabulados/comunidad/reporte_30_view';

			$this->load->view('backend/includes/template', $data);		
	}		
	public function reporte_31()
	{
			$data['nav'] = TRUE;
			$data['title'] = 'Tabulados';	
			$data['opcion'] = 31;		
			$data['tables'] = $this->comunidad_model->get_tabulado_31();
			$data['main_content'] = 'tabulados/comunidad/reporte_31_view';

			$this->load->view('backend/includes/template', $data);		
	}
	public function reporte_32()
	{
			$data['nav'] = TRUE;
			$data['title'] = 'Tabulados';	
			$data['opcion'] = 32;		
			$data['tables'] = $this->comunidad_model->get_tabulado_32();
			$data['main_content'] = 'tabulados/comunidad/reporte_32_view';

			$this->load->view('backend/includes/template', $data);		
	}			
}
