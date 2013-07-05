<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Tabulados extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		$this->load->helper(array('form', 'url'));
		$this->load->library('form_validation');
		$this->load->library('security');
		$this->load->library('tank_auth');
		$this->lang->load('tank_auth');		
	}


	public function index()
	{

		if (!$this->tank_auth->is_logged_in()) {
			redirect('/auth/login/');
		} else {
			$data['nav'] = TRUE;
			$data['title'] = 'Tabulados';
			$data['user_id']	= $this->tank_auth->get_user_id();
			$data['username']	= $this->tank_auth->get_username();
			$data['main_content'] = 'tabulados/index_view';
	        $this->load->view('backend/includes/template', $data);
		}

	}
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */