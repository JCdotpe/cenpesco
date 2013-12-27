<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Home extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		$this->load->helper(array('form', 'url'));
		$this->load->library('form_validation');
		$this->load->library('security');
		$this->load->library('tank_auth');
		$this->lang->load('tank_auth');
		$this->load->model('seguimiento_adm_model');		
	}


	public function index()
	{
		if (!$this->tank_auth->is_logged_in()) {
			// redirect('convocatoria/registro');
			//redirect('convocatoria/convocatoria_inicio');
			redirect('auth/login');
			// $data['convocatoria'] = TRUE;
			// $data['nav'] = TRUE;
			// $data['title'] = 'Inicio';
			// $data['main_content'] = 'convocatoria/bienvenida_view';
		 // 	$this->load->view('backend/includes/template', $data);
	    } else {
			$data['home'] = TRUE;
			$data['nav'] = TRUE;
			$data['title'] = 'Inicio';
			$data['main_content'] = 'backend/index_view';
	        $data['user_ubigeo']	= $this->tank_auth->get_ubigeo();
	        $data['tables'] = $this->seguimiento_adm_model->get_avance_fijo();			
	        $this->load->view('backend/includes/template', $data);

		}

	}
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */