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

	public function reporte_3()
	{
			$data['nav'] = TRUE;
			$data['title'] = 'Consistencia';
			$data['user_id']	= $this->tank_auth->get_user_id();
			$data['username']	= $this->tank_auth->get_username();				
			$data['tables'] = $this->comunidad_model->get_report_3(); 
			$data['opcion'] = 3;
			$data['main_content'] = 'consistencia/comunidad/reporte_3_view';
			$this->load->view('backend/includes/template', $data);		
	}

	public function reporte_4()
	{
			$data['nav'] = TRUE;
			$data['title'] = 'Consistencia';
			$data['user_id']	= $this->tank_auth->get_user_id();
			$data['username']	= $this->tank_auth->get_username();				
			$data['tables'] = $this->comunidad_model->get_report_4(); 
			$data['opcion'] = 4;
			$data['main_content'] = 'consistencia/comunidad/reporte_4_view';
			$this->load->view('backend/includes/template', $data);		
	}

	public function reporte_5()
	{
			$data['nav'] = TRUE;
			$data['title'] = 'Consistencia';
			$data['user_id']	= $this->tank_auth->get_user_id();
			$data['username']	= $this->tank_auth->get_username();				
			$data['tables'] = $this->comunidad_model->get_report_5(); 
			$data['opcion'] = 5;
			$data['main_content'] = 'consistencia/comunidad/reporte_5_view';
			$this->load->view('backend/includes/template', $data);		
	}

	public function reporte_6()
	{
			$data['nav'] = TRUE;
			$data['title'] = 'Consistencia';
			$data['user_id']	= $this->tank_auth->get_user_id();
			$data['username']	= $this->tank_auth->get_username();				
			$data['opcion'] = 6;
			$data['main_content'] = 'consistencia/comunidad/reporte_6_view';
			$registros = $this->comunidad_model->get_report_6();

			$tablas = array();
			$tables = array();
			$otros = array(
			'S3_1_O', 'S3_4_4_O', 'S3_5_3_O', 'S3_6_5_O', 'S3_8_4_O','S3_10_5_O', 'S3_12_6_O',	'S3_16_5_O',	'S3_17_8_O',	'S3_17_9_O',	'S3_18_7_O',	'S3_18_8_O',	'S3_19_4_O', 
			'S5_2_7_O', 'S5_3_17_O', 
			'S6_3_6_O', 'S6_4_15_O',
			'S7_1_9_O', 'S7_2_8_O', 'S7_5_41_O', 'S7_5_49_O', 'S7_6_3_O', 'S7_7_14_O', 'S7_7_15_O', 'S7_8_18_O', 'S7_9_13_O', 'S7_10_9_O', 'S7_12_4_O', 'S7_13_12_O', 'S7_15_O',
			'S8_2_12_O', 'S8_3_10_O');
			$cont = 0;
			foreach ($registros->result() as $filas) {

				foreach ($filas as $key => $value) {
					if ( in_array($key, $otros) && !is_null($value)) {
						$tablas['SEDE_COD'] = $filas->SEDE_COD;
						$tablas['NOM_SEDE'] = $filas->NOM_SEDE;
						$tablas['CCDD'] = $filas->CCDD;
						$tablas['NOM_DD'] = $filas->NOM_DD;
						$tablas['CCPP'] = $filas->CCPP;
						$tablas['NOM_PP'] = $filas->NOM_PP;
						$tablas['CCDI'] = $filas->CCDI;
						$tablas['NOM_DI'] = $filas->NOM_DI;
						$tablas['COD_CCPP'] = $filas->COD_CCPP;
						$tablas['NOM_CCPP'] = $filas->NOM_CCPP;
						$tablas['NFORM'] = $filas->NFORM;
						$tablas[$key] = $value;													
						$tablas['id'] = $filas->id;
						$tables[$cont++] = $tablas;
						$tablas = null;
					} 
				}
				
			}
			//var_dump($tables);
			$data['tables'] = $tables; 
			$this->load->view('backend/includes/template', $data);		
	}

	function to_excel(){
		$this->load->helper('excel');
        $query = $this->udra_comunidad_model->get_all_export();
        to_excel($query, 'Udra_Comunidad');
	}


}