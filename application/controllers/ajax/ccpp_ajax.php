<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Ccpp_ajax extends CI_Controller {

	function __construct()
	{
		parent::__construct();

		$this->load->library('form_validation');
		$this->load->library('security');
		$this->load->library('tank_auth');
		$this->lang->load('tank_auth');	
		
		$this->load->model('pesca_model');
		$this->load->model('ccpp_model');	
		$this->load->model('pescador_model');
	}


	public function index()
	{
		show_404();
	}

	//Centros poblados por dpto
	public function get_ajax_prov($c)
	{
		$this->output->cache(9999999999);
		$code = $this->input->post('code');
		$is_ajax = $this->input->post('ajax');
		if($is_ajax){
			$data['datos'] = $this->ccpp_model->get_provs($code)->result();
			$this->load->view('backend/json/json_view', $data);		
		}else{
			show_404();
		}
	}		

	public function get_ajax_dist($c)
	{
		$this->output->cache(9999999999);
		$code = $this->input->post('code');
		$dep = $this->input->post('dep');
		$is_ajax = $this->input->post('ajax');
		if($is_ajax){
			$data['datos'] = $this->ccpp_model->get_dis($dep,$code)->result();
			$this->load->view('backend/json/json_view', $data);	
		}else{
			show_404();
		}
	}		

	public function get_ajax_ccpp($c)
	{
		$this->output->cache(30);
		$code = $this->input->post('code');
		$prov = $this->input->post('prov');
		$dep = $this->input->post('dep');
		$is_ajax = $this->input->post('ajax');
		if($is_ajax){
			$data['datos'] = $this->ccpp_model->get_ccpp($dep,$prov,$code)->result();
			$this->load->view('backend/json/json_view', $data);	
		}else{
			show_404();
		}
	}


	public function get_ajax_ccpp_all($c)
	{
		$this->output->cache(30);
		$code = $this->input->post('code');
		$prov = $this->input->post('prov');
		$dep = $this->input->post('dep');
		$is_ajax = $this->input->post('ajax');
		if($is_ajax){
			$data['datos'] = $this->pescador_model->get_ccpp($dep,$prov,$code)->result();
			$this->load->view('backend/json/json_view', $data);	
		}else{
			show_404();
		}
	}			
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */