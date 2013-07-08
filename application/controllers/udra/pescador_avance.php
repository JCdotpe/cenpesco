<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Pescador_avance extends CI_Controller {
	protected $secciones = array(
					2 => 'Seccion II',
					3 => 'Seccion III',
					4 => 'Seccion IV',
					5 => 'Seccion V',
					6 => 'Seccion VI',
					7 => 'Seccion VII',
					8 => 'Seccion VIII',
					9 => 'Seccion IX',
					10 => 'Info',
	);
	function __construct()
	{
		parent::__construct();
		$this->load->helper(array('form', 'url'));
		$this->load->library('form_validation');
		$this->load->library('security');
		$this->load->library('tank_auth');
		$this->lang->load('tank_auth');	
		$this->load->model('udra_pescador_model');
		$this->load->model('pesca_piloto_model');
		$this->load->model('marco_model');
		$this->load->helper('date');
		// date_default_timezone_set('America/Lima');		

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
			$departamento = $this->ubigeo_piloto_model->get_dpto_by_code($this->tank_auth->get_ubigeo()); //PILOTO
			$data['tables'] = $this->udra_pescador_model->get_pescadores($departamento); 

			$data['main_content'] = 'udra/pescador_avance_view';
			$data['option'] = 5;
					

			$seccion_completos = array();
			$seccion_incompletos = array();

			$forms = $this->udra_pescador_model->get_forms($departamento);
			if($forms->num_rows() > 0){
		
				foreach($forms->result() as $filas){
					
					$i = 0;
					$table = null;
					foreach($this->secciones as $s=>$k){
						$table = 'pesc_seccion' . $s;
						if($s == 10){
							$table = 'pesc_info';
						}
						  $rega = $this->udra_pescador_model->get_regs_a($table,$filas->id);
						 if ($rega->num_rows() >0){
							$i++;
						}

					}
					if ($i == 9){
						$seccion_completos[] = $filas->id;

					}else{
						$seccion_incompletos[] = $filas->id;
					}
					//print ($i); echo '<br>';
				}//var_dump($seccion_completos);echo '<br>';
			}

			 $data['formularios'] = $this->udra_pescador_model->get_n_formularios($seccion_completos); 
			if (count($seccion_incompletos)>0){
			 $data['formularios_inc'] = $this->udra_pescador_model->get_n_formularios($seccion_incompletos); 
			}else{
				$data['formularios_inc'] = NULL;
			}
			$data['udra_total'] = $this->udra_pescador_model->get_formularios_total($departamento); 
			$data['registros_total'] = $this->udra_pescador_model->get_registros_total($seccion_completos); 
	    	$this->load->view('backend/includes/template', $data);	
	

		

	}

}
