<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Inform_ajax extends CI_Controller {

	function __construct()
	{
		parent::__construct();

		$this->load->library('form_validation');
		$this->load->library('security');
		$this->load->library('tank_auth');
		$this->lang->load('tank_auth');	
		$this->load->model('inform_model');

	}

	public function index()
	{
		show_404();
	}

	public function get_ajax_dep($c)
	{
		// $this->output->cache(30);
		$s = $this->input->post('code');
		$is_ajax = $this->input->post('ajax');
		if ($is_ajax) {
			$data['datos'] = $this->inform_model->get_dep($s)->result();
			$this->load->view('backend/json/json_view', $data);
		}else {
			show_404();			
		}
	}

	public function get_ajax_prov($c)
	{
		// $this->output->cache(30);
		$s = $this->input->post('odei');
		$t = $this->input->post('dep');
		$is_ajax = $this->input->post('ajax');
		if ($is_ajax) {
			$data['datos'] = $this->inform_model->get_prov($s,$t)->result();
			$this->load->view('backend/json/json_view', $data);
		}else {
			show_404();			
		}
	}

	public function get_ajax_dist($c)
	{
		// $this->output->cache(30);
		$s = $this->input->post('odei');
		$t = $this->input->post('dep');
		$u = $this->input->post('prov');
		$is_ajax = $this->input->post('ajax');
		if ($is_ajax) {
			$data['datos'] = $this->inform_model->get_dist($s,$t,$u)->result();
			$this->load->view('backend/json/json_view', $data);
		}else {
			show_404();			
		}
	}

	public function get_ajax_ccpp($c)
	{
		// $this->output->cache(30);
		$s = $this->input->post('odei');
		$t = $this->input->post('dep');
		$u = $this->input->post('prov');
		$v = $this->input->post('dist');
		$is_ajax = $this->input->post('ajax');
		if ($is_ajax) {
			$data['datos'] = $this->inform_model->get_ccpp($s,$t,$u,$v)->result();
			$this->load->view('backend/json/json_view', $data);
		}else {
			show_404();			
		}
	}

	public function get_ajax_a()
	{
		// $this->output->cache(30);
		$is_ajax = $this->input->post('ajax');
		if ($is_ajax) {
			$data['datos'] = $this->inform_model->get_a()->result();
			$this->load->view('backend/json/json_view', $data);
		}else {
			show_404();			
		}
	}


	public function get_ajax_b($c)
	{
		// $this->output->cache(30);
		$s = $this->input->post('cl');
		$is_ajax = $this->input->post('ajax');
		if ($is_ajax) {
			$data['datos'] = $this->inform_model->get_b($s)->result();
			$this->load->view('backend/json/json_view', $data);
		}else {
			show_404();			
		}
	}


	public function get_ajax_c($c)
	{
		// $this->output->cache(30);
		$cl = $this->input->post('cl');
		$ft = $this->input->post('ft');
		$is_ajax = $this->input->post('ajax');
		if ($is_ajax) {
			$data['datos'] = $this->inform_model->get_c($cl,$ft)->result();
			$this->load->view('backend/json/json_view', $data);
		}else {
			show_404();			
		}
	}	
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */