<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Capacitacion extends CI_Controller {
	
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
			if($role->role_id == 2 && $role->rolename == 'Capacitación'){
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
			$data['title'] = 'Capacitación';
			$data['user_id']	= $this->tank_auth->get_user_id();
			$data['username']	= $this->tank_auth->get_username();
			$data['main_content'] = 'capacitacion/index_view';
	        $this->load->view('backend/includes/template', $data);
		}

	}
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */