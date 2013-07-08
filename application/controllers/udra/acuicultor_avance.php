<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Acuicultor_avance extends CI_Controller {

	protected $secciones = array(
					2 => 'acuicultura_2',
					3 => 'acuicultura_3',
	);

	function __construct()
	{

		parent::__construct();
		$this->load->helper(array('form', 'url'));
		$this->load->library('form_validation');
		$this->load->library('security');
		$this->load->library('tank_auth');
		$this->lang->load('tank_auth');	
		$this->load->model('udra_acuicultor_model');
		$this->load->model('pesca_piloto_model');
		$this->load->model('marco_model');
		$this->load->helper('date');
		date_default_timezone_set('America/Lima');
		if (!$this->tank_auth->is_logged_in()) {
			// redirect('/auth/login/');
			//No loging enviar a bienvenida cenpesco
			redirect('/auth/login/');
		}

		//Check user privileges 
		$roles = $this->tank_auth->get_roles();
		$flag = FALSE;
		foreach ($roles as $role) {
			if($role->role_id == 4 && $role->rolename == 'UDRA'){
				$flag = TRUE;
				break;
			}
		}

		//If not author is BENDER!
		if (!$flag) {
			show_404();
			die();
		}						
	}

	public function index()
	{
		$data['nav'] = TRUE;
		$data['title'] = 'Avance UDRA';
		$data['user_id']	= $this->tank_auth->get_user_id();
		$data['username']	= $this->tank_auth->get_username();
		foreach ($this->marco_model->get_odei($this->tank_auth->get_ubigeo())->result() as $key ) {
			$odei[] = $key->ODEI_COD;
		}				
		//$departamento	 = $this->marco_model->get_dpto_by_odei($odei);		
		$data['tables'] = $this->udra_acuicultor_model->get_acuicultores_by_sede($odei); 
		$data['main_content'] = 'udra/acuicultor_avance_view';
		$data['option'] = 4;
				
		$seccion_completos = NULL;
		$seccion_incompletos = NULL;

		$forms = $this->udra_acuicultor_model->get_forms($odei); // obtiene los ID de forms ingresados en 1ra tabla
		if($forms->num_rows() > 0){
	
			foreach($forms->result() as $filas){
				
				$i = 0;
				foreach($this->secciones as $tabla){
					
					$rega = $this->udra_acuicultor_model->get_regs_a($tabla,$filas->id); //recorre las demas tablas, si es que hay el ID 
					//echo $rega->num_rows(); echo '<br>';
					if ($rega->num_rows() >0){
						$i++;
					}
				}
				if ($i == 2){
					$seccion_completos[] = $filas->id;

				}else{
					$seccion_incompletos[] = $filas->id;
				}
			}
		}
		// var_dump($seccion_completos);
		$data['formularios'] = $this->udra_acuicultor_model->get_n_formularios($seccion_completos); 			
		if (count($seccion_incompletos)>0){
			$data['formularios_inc'] = $this->udra_acuicultor_model->get_n_formularios($seccion_incompletos); 
		}else{
			$data['formularios_inc'] = NULL;
		}

		$data['udra_total'] = $this->udra_acuicultor_model->get_formularios_total($departamento); 
		$data['registros_total'] = $this->udra_acuicultor_model->get_registros_total($seccion_completos); 		
     	$this->load->view('backend/includes/template', $data);
	}
}
