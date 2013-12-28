<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Bpr extends CI_Controller {
	
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
			if($role->role_id == 11 && $role->rolename == 'Blog de preguntas'){
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
			redirect('http://cenpesco.dontemplates.com/bpr');
		
		}

	}
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */