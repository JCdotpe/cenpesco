<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Cp_ajax extends CI_Controller {

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
		
		$this->load->model('pesca_model');
		$this->load->model('ubigeo_model');	
	}


	public function index()
	{
		show_404();
	}

	//Centros poblados por dpto
	public function get_cp($c)
	{
		$this->output->cache(30);
		$code = $this->input->post('code');
		$is_ajax = $this->input->post('ajax');
		if($is_ajax){
			$data['datos'] = $this->pesca_model->get_cp_by_dpto($code)->result();
			$this->load->view('backend/json/json_view', $data);	
		}else{
			show_404();;
		}
	}	

	//Centros poblados por dpto
	public function get_cp_piloto()
	{
		$is_ajax = $this->input->post('ajax');
		if($is_ajax){
			$data['datos'] = $this->pesca_model->get_cp_piloto()->result();
			$this->load->view('backend/json/json_view', $data);	
		}else{
			show_404();;
		}
	}	


}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */