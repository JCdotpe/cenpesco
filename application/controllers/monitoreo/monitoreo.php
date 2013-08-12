<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Monitoreo extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		$this->load->helper(array('form', 'url'));
		$this->load->library('form_validation');
		$this->load->library('security');
		$this->load->library('tank_auth');
		$this->lang->load('tank_auth');		

		if (!$this->tank_auth->is_logged_in()) {
			// redirect('/auth/login/');
			//No loging enviar a bienvenida cenpesco
			redirect('/auth/login/');
		}

		//Check user privileges 
		$roles = $this->tank_auth->get_roles();
		$flag = FALSE;
		foreach ($roles as $role) {
			if($role->role_id == 8 && $role->rolename == 'Monitoreo de campo'){
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
			$data['title'] = 'Monitoreo de campo';
			$data['user_id']	= $this->tank_auth->get_user_id();
			$data['username']	= $this->tank_auth->get_username();
			$data['main_content'] = 'monitoreo/index_view';
			$data['reporte'] = $this->tank_auth->get_ubigeo();
			redirect('/monitoreo/avance_empadronador');
	        //$this->load->view('backend/includes/template', $data);
	}
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */