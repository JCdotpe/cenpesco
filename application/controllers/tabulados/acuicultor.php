<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Acuicultor extends CI_Controller {

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
		$this->load->model('tabulados_model');
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
			$u_id = $this->tank_auth->get_user_id();
			// $u_id = $this->tank_auth->get_user_id();
			// $data['restriccion'] = ( ($u_id == 259) || ($u_id == 266) || ($u_id == 269) ) ? FALSE : TRUE ;
			$data['user_id'] = ( ($u_id == 259) || ($u_id == 266) || ($u_id == 269) ) ? FALSE : TRUE ;
			$data['nav'] = TRUE;
			$data['title'] = 'Tabulados';	
			// $data['opcion'] = 200;		
			// $data['tables'] = $this->comunidad_model->get_tabulado_200();
			// $texto = ($this->tabulados_model->get_texto(3,$data['opcion'])->num_rows() > 0)  ?  $texto = $this->tabulados_model->get_texto(3,$data['opcion'])->row()->texto  :  '';
			// $data['texto'] =  $texto; 			
			$data['main_content'] = 'tabulados/acuicultor/reporte_100_view';

			$this->load->view('backend/includes/template', $data);		
	}

	

}
