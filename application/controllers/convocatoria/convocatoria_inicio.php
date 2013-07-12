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
		$this->load->model('ubigeo_model');
		// redirect('');
	}

	public function index()
	{
			$data['nav'] = TRUE;
			$data['title'] = 'Convocatoria';
			$odeis=
			$data['odeis'] = $this->ubigeo_model->get_odeis();
			foreach($data['odeis']->result() as $o){
				$datos[$o->COD_DEPARTAMENTO] = $this->regs_model->get_regs_by_state_odei($o->COD_DEPARTAMENTO);
				$datos[$o->COD_DEPARTAMENTO]->nombre = $o->DES_DISTRITO;
			}
			$data['dd'] = $datos;
			$data['main_content'] = 'convocatoria/seleccionados_form';
	  		$this->load->view('backend/includes/template', $data);
	}
}
