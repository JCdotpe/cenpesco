<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Consulta extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		$this->output->nocache();
		$this->load->library('form_validation');
		$this->load->library('security');
		$this->load->library('tank_auth');
		$this->lang->load('tank_auth');	

		$this->load->model('ubigeo_model');
		$this->load->model('marco_model');	
	}


	public function index()
	{
			//$data['nav'] = TRUE;
			//$data['onload'] = 'init()';
			//$data['fluid'] = TRUE;
			$data['title'] = 'Rutas y Segmentación';

			$data['sede'] = $this->marco_model->get_sede(); 
			$data['dptos'] = $this->ubigeo_model->get_dptos();
			$data['main_content'] = 'segmentacion/consulta_view';
			//$data['main_content'] = 'segmentacion/leaf_view';
	        $this->load->view('backend/includes/template', $data);
	        //$this->load->view('segmentacion/openlayers_view', $data);

	}


}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */