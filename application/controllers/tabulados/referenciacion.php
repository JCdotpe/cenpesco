<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Referenciacion extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		$this->load->model('marco_model');		
		$this->load->model('referenciacion_model');		

	}


	public function index()
	{
			//$data['nav'] = FALSE;
			//$data['onload'] = 'init()';
			//$data['fluid'] = TRUE;
			$data['title'] = 'PERU';     
			// $data['sede'] = $this->marco_model->get_sede(); 
			$data['dptos'] = $this->referenciacion_model->get_pes_acu_by_dep();
			// $data['tot_dep'] = $this->referenciacion_model->get_pes_acu_by_dep()->result();// total pescadores y acuicultor por dep
			//$data['tot_prov'] = $this->referenciacion_model->get_pes_acu_by_prov()->result();// total pescadores y acuicultor por prov
			// $data['tot_dist'] = $this->referenciacion_model->get_pes_acu_by_dist()->result();// total pescadores y acuicultor por dist

			$data['main_content'] = 'tabulados/geo_view';
			//$data['main_content'] = 'segmentacion/leaf_view';
	        $this->load->view('backend/includes/template', $data);
	        //$this->load->view('segmentacion/openlayers_view', $data);

	}
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */