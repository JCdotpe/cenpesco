<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Marco_ajax extends CI_Controller {

	function __construct()
	{
		parent::__construct();

		$this->load->library('form_validation');
		$this->load->library('security');
		$this->load->library('tank_auth');
		$this->lang->load('tank_auth');	
		$this->load->model('pesca_model');
		$this->load->model('pesca_piloto_model');
		$this->load->model('marco_model');
		$this->load->model('ubigeo_piloto_model');
	}

	public function index()
	{
		show_404();
	}

	public function get_ajax_dep($c)
	{
		$this->output->cache(30);
		$sede = $this->input->post('code');
		$is_ajax = $this->input->post('ajax');
		if ($is_ajax) {
			$data['datos'] = $this->marco_model->get_dep_by_sede($sede)->result();
			$this->load->view('backend/json/json_view', $data);
		}else {
			show_404();			
		}
	}
	public function get_ajax_equipo($c)
	{
		$this->output->cache(30);
		$sede = $this->input->post('code');
		$is_ajax = $this->input->post('ajax');
		if ($is_ajax) {
			$data['datos'] = $this->marco_model->get_dep_by_sede($sede)->result();
			$this->load->view('backend/json/json_view', $data);
		}else {
			show_404();			
		}
	}
	

	public function get_ajax_prov($c)
	{
		$this->output->cache(30);
		$sede = $this->tank_auth->get_ubigeo();
		$dep = $this->input->post('code');
		foreach ($this->marco_model->get_odei($sede)->result() as $key ) {
			$odei[] = $key->ODEI_COD;
		}		
		$is_ajax = $this->input->post('ajax');
		if($is_ajax){
			$data['datos'] = $this->marco_model->get_prov_by_odei($sede,$odei, $dep)->result();
			$this->load->view('backend/json/json_view', $data);		
		}else{
			show_404();
		}
	}		

	public function get_ajax_dist($c)
	{
		$this->output->cache(30);
		$sede = $this->tank_auth->get_ubigeo();
		foreach ($this->marco_model->get_odei($sede)->result() as $key ) {
			$odei[] = $key->ODEI_COD;
		}	
		$prov = $this->input->post('code');
		$dep = $this->input->post('dep');
		$is_ajax = $this->input->post('ajax');
		if($is_ajax){
			$data['datos'] = $this->marco_model->get_dist_by_odei($sede,$odei,$prov,$dep)->result();
			$this->load->view('backend/json/json_view', $data);	
		}else{
			show_404();
		}
	}	

	public function get_ajax_ccpp($c)
	{
		$this->output->cache(30);		
		$sede = $this->tank_auth->get_ubigeo();
		foreach ($this->marco_model->get_odei($sede)->result() as $key ) {
			$odei[] = $key->ODEI_COD;
		}			
		$dist = $this->input->post('code');
		$prov = $this->input->post('prov');
		$dep = $this->input->post('dep');
		$is_ajax = $this->input->post('ajax');
		if($is_ajax){
			$data['datos'] = $this->marco_model->get_ccpp_by_odei($sede,$odei,$dep,$prov,$dist)->result();
			$this->load->view('backend/json/json_view', $data);	
		}else{
			show_404();
		}
	}	



}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */