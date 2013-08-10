<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Acuicultor extends CI_Controller {
	
	function __construct()
	{
		parent::__construct();
		$this->load->helper(array('form', 'url'));
		$this->load->library('form_validation');
		$this->load->library('security');
		$this->load->library('tank_auth');
		$this->lang->load('tank_auth');		
		if (!$this->tank_auth->is_logged_in()) {
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

		//If not author is the maintenance guy!
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
			$data['var'] = 1;
			//$data['fluid'] = TRUE;
			$data['title'] = 'Digitación';
			$data['user_id']	= $this->tank_auth->get_user_id();
			$data['user_ubigeo']	= $this->tank_auth->get_ubigeo();
			$data['main_content'] = 'digitacion/acuicultor_view.php';
	        $this->load->view('backend/includes/template', $data);
		}

	}
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */