<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Segmentacion extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		$this->output->nocache();
		$this->load->library('form_validation');
		$this->load->library('security');
		$this->load->library('tank_auth');
		$this->lang->load('tank_auth');	
		//User is logged in
		if (!$this->tank_auth->is_logged_in()) {
			redirect('/auth/login/');
		}

		//Check user privileges 
		$roles = $this->tank_auth->get_roles();
		$flag = FALSE;
		foreach ($roles as $role) {
			if($role->role_id == 3 && $role->rolename == 'Rutas y Segmentación'){
				$flag = TRUE;
				break;
			}
		}

		//If not author is the maintenance guy!
		if (!$flag) {
			show_404();
			die();
		}
		$this->load->model('marco_model');	
	}


	public function index()
	{
			$data['nav'] = TRUE;
			//$data['onload'] = 'init()';
			//$data['fluid'] = TRUE;
			$data['title'] = 'Rutas y Segmentación';

			$data['sede'] = $this->marco_model->get_sede(); 

			$data['main_content'] = 'segmentacion/index_view';
			//$data['main_content'] = 'segmentacion/leaf_view';
	        $this->load->view('backend/includes/template', $data);
	        //$this->load->view('segmentacion/openlayers_view', $data);

	}


}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */