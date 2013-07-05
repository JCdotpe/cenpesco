<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Digitacion extends CI_Controller {

	function __construct()
	{
		parent::__construct();
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


		$this->load->model('pais_model');	
		$this->load->model('pesca_piloto_model');	
		$this->load->model('ubigeo_model');	
		$this->load->model('ubigeo_piloto_model');	
	}


	public function index()
	{
			//$data['test'] = array(1,2,3,4,5);
			// $data['departamento'] = $this->ubigeo_piloto_model->get_dpto_by_code($this->tank_auth->get_ubigeo());
			//$data['option'] = 1; 
			//$data['pais']=$this->pais_model->select_pais();
			$data['nav'] = TRUE;

			$data['title'] = 'Digitacion';
			$data['main_content'] = 'digitacion/index_view';
	        $this->load->view('backend/includes/template', $data);

	}
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */