<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Informe extends CI_Controller {

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
		$this->load->model('marco_model');	
		$this->load->model('ubigeo_piloto_model');	
		$this->load->model('empadronador_model');	
		$this->load->model('supervisor_model');	
		$this->load->model('inform_model');	
	}


	public function index()
	{	
			$data['combo3'] = $this->config->item('c_sino');

			$data['combo2'] = array(
								-1=> '-',
								1 => 'EXCELENTE',
								2 => 'BUENO',
								3 => 'REGULAR',
								4 => 'MALO',
								5 => 'MUY MALO'
				);		
			$data['combo4'] = array(
								-1 => '-',
								1 => 'PESCADOR',
								2 => 'ACUICULTOR',
								3 => 'COMUNIDADES',
				);	

			$data['formus'] = $this->inform_model->get_a();


			$data['sups'] = $this->supervisor_model->get_sup();
			//cabecera
			// $data['departamentox'] = $this->ubigeo_model->get_dptos();
			foreach ($this->marco_model->get_odei($this->tank_auth->get_ubigeo())->result() as $key ) {
				$odei[] = $key->ODEI_COD;
			}			

			//get empadronadores by odei
			$data['emps'] = $this->empadronador_model->get_emp_by_odei($odei);

			$data['departamento'] =  $this->marco_model->get_dpto_by_odei($odei); 
			
			$data['nav'] = TRUE;
			//regular
			$data['departamentos'] = $this->ubigeo_model->get_dptos();
			$data['pais']=$this->pais_model->select_pais();
			$data['title'] = 'Informe de Supervisión';
			$data['main_content'] = 'digitacion/informe_view';
	        $this->load->view('backend/includes/template', $data);

	}

}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */