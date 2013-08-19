<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Registro_avance extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		$this->load->helper(array('form', 'url'));
		$this->load->library('form_validation');
		$this->load->library('security');
		$this->load->library('tank_auth');
		$this->lang->load('tank_auth');	
		$this->load->model('udra_registro_model');
		$this->load->model('pesca_piloto_model');
		$this->load->model('marco_model');
		$this->load->helper('date');
		// date_default_timezone_set('America/Lima');		

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
			$data['title'] = 'ODEI';
			$data['user_id']	= $this->tank_auth->get_user_id();
			$data['username']	= $this->tank_auth->get_username();
			$data['main_content'] = 'digitacion/avance_digitacion/registro_by_odei_view';
			$data['option'] = 31;

			foreach ($this->marco_model->get_odei($this->tank_auth->get_ubigeo())->result() as $key ) {//get ODEIS que tiene el usuario
				$odei[] = $key->ODEI_COD;
			}					
			$data['tables'] = $this->marco_model->get_registro_by_odei($odei); //get forms por ODEIS, 
			$data['udra'] = $this->udra_registro_model->get_udra_total_by_odei($odei); //get forms por ODEIS, 

			$data['formularios'] = $this->udra_registro_model->get_n_formularios_by_odei(); //N° formularios ingresados en pescador completos
		
	    	$this->load->view('backend/includes/template', $data);	
	
	}

	public function provincia()
	{
			$data['nav'] = TRUE;
			$data['title'] = 'PROVINCIA';
			$data['user_id']	= $this->tank_auth->get_user_id();
			$data['username']	= $this->tank_auth->get_username();
			$data['main_content'] = 'digitacion/avance_digitacion/registro_by_prov_view';
			$data['option'] = 32;			

			foreach ($this->marco_model->get_odei($this->tank_auth->get_ubigeo())->result() as $key ) {//get ODEIS que tiene el usuario
				$odei[] = $key->ODEI_COD;
			}					
			$data['tables'] = $this->marco_model->get_registro_by_prov($odei); //get forms por ODEIS, 
			$data['udra'] = $this->udra_registro_model->get_udra_total_by_prov($odei); //get forms por ODEIS, 

			$data['formularios'] = $this->udra_registro_model->get_n_formularios_by_prov(); //N° formularios ingresados en pescador completos
		
	    	$this->load->view('backend/includes/template', $data);	
	
	}

	public function distrito()
	{
			$data['nav'] = TRUE;
			$data['title'] = 'DISTRITO';
			$data['user_id']	= $this->tank_auth->get_user_id();
			$data['username']	= $this->tank_auth->get_username();
			$data['main_content'] = 'digitacion/avance_digitacion/registro_by_dist_view';
			$data['option'] = 33;			

			foreach ($this->marco_model->get_odei($this->tank_auth->get_ubigeo())->result() as $key ) {//get ODEIS que tiene el usuario
				$odei[] = $key->ODEI_COD;
			}					
			$data['tables'] = $this->marco_model->get_registro_by_dist($odei); //get forms por ODEIS, 
			$data['udra'] = $this->udra_registro_model->get_udra_total_by_dist($odei); //get forms por ODEIS, 

			$data['formularios'] = $this->udra_registro_model->get_n_formularios_by_dist(); //N° formularios ingresados en pescador completos
		
	    	$this->load->view('backend/includes/template', $data);	
			
	}

	public function centro_poblado()
	{
			$data['nav'] = TRUE;
			$data['title'] = 'DISTRITO';
			$data['user_id']	= $this->tank_auth->get_user_id();
			$data['username']	= $this->tank_auth->get_username();
			$data['main_content'] = 'digitacion/avance_digitacion/registro_by_ccpp_view';
			$data['option'] = 34;			

			foreach ($this->marco_model->get_odei($this->tank_auth->get_ubigeo())->result() as $key ) {//get ODEIS que tiene el usuario
				$odei[] = $key->ODEI_COD;
			}					
			$data['tables'] = $this->marco_model->get_registro_by_ccpp($odei); //get forms por ODEIS, 
			$data['udra'] = $this->udra_registro_model->get_udra_total_by_ccpp($odei); //get forms por ODEIS, 

			$data['formularios'] = $this->udra_registro_model->get_n_formularios_by_ccpp(); //N° formularios ingresados en pescador completos
		
	    	$this->load->view('backend/includes/template', $data);	
	}


}
