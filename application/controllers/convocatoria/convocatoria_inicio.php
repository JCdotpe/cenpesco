<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Convocatoria_inicio extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		$this->load->helper(array('form', 'url'));
		$this->load->library('form_validation');
		$this->load->library('security');
		$this->load->library('tank_auth');
		$this->lang->load('tank_auth');	
		$this->load->model('regs_model');
		redirect('');
	}

	public function index()
	{
			$data['nav'] = TRUE;
			$data['title'] = 'Convocatoria';
			$data['loreto'] = $this->regs_model->get_regs_by_state(16);
			$data['piura'] = $this->regs_model->get_regs_by_state(20);
			$data['puno'] = $this->regs_model->get_regs_by_state(21);
			$data['main_content'] = 'convocatoria/seleccionados_form';
	  		$this->load->view('backend/includes/template', $data);
	}
}
