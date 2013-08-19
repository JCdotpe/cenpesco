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
			if($role->role_id == 5 && $role->rolename == 'Digitación'){
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
			$data['title'] = 'ODEI';
			$data['user_id']	= $this->tank_auth->get_user_id();
			$data['username']	= $this->tank_auth->get_username();

			foreach ($this->marco_model->get_odei($this->tank_auth->get_ubigeo())->result() as $key ) {//get ODEIS que tiene el usuario
				$odei[] = $key->ODEI_COD;
			}					
			$data['tables'] = $this->marco_model->get_pescadores_by_odei($odei); //get forms por ODEIS, 
			$data['udra'] = $this->udra_pescador_model->get_formularios_total_by_odei($odei); //get forms por ODEIS, 

			$data['main_content'] = 'digitacion/pescador_avance_view';
			$data['option'] = 1;
					

			$seccion_completos = array();
			$seccion_incompletos = array();

			$forms = $this->udra_pescador_model->get_forms_by_odei( $odei );//get forms por ODEI, ingresados en PESCADOR 

			if($forms->num_rows() > 0){
		
				foreach($forms->result() as $filas){//busca en todas las tablas de pescador
					
					$i = 0;
					$table = null;
					foreach($this->secciones as $s=>$k){
						$table = 'pesc_seccion' . $s;
						if($s == 10){
							$table = 'pesc_info';
						}
						  $rega = $this->udra_pescador_model->get_regs_a($table,$filas->id);//recorre cada tabla
						if ($rega->num_rows() >0){
							$i++;
						}
						//var_dump($rega->result());echo '<br>';
					}
					if ($i == 9){
						$seccion_completos[] = $filas->id; //guarda los ID de formularios completos en todas las secciones

					}else{
						$seccion_incompletos[] = $filas->id; //guarda los ID de formularios incompletos
					}
				}//var_dump($seccion_completos);echo '<br>';
			}

			if (count($seccion_completos)>0){
			 	$data['formularios'] = $this->udra_pescador_model->get_n_formularios_by_odei($seccion_completos); 
			}else{
				$data['formularios'] = NULL;
			}			
			if (count($seccion_incompletos)>0){
			 $data['formularios_inc'] = $this->udra_pescador_model->get_n_formularios_by_odei($seccion_incompletos); 
			}else{
				$data['formularios_inc'] = NULL;
			}
			$data['udra_total'] = $this->udra_pescador_model->get_formularios_total_by_odei( $this->tank_auth->get_ubigeo() ); 
			//$data['registros_total'] = $this->udra_pescador_model->get_registros_total($seccion_completos); 
	    	$this->load->view('backend/includes/template', $data);	
	

	}

	public function provincia()
	{
			$data['nav'] = TRUE;
			$data['title'] = 'PROVINCIA';
			$data['user_id']	= $this->tank_auth->get_user_id();
			$data['username']	= $this->tank_auth->get_username();

			foreach ($this->marco_model->get_odei($this->tank_auth->get_ubigeo())->result() as $key ) {//get ODEIS que tiene el usuario
				$odei[] = $key->ODEI_COD;
			}					
			$data['tables'] = $this->marco_model->get_pescadores_by_dist($odei); //get forms por ODEIS, 
			$data['udra'] = $this->udra_pescador_model->get_formularios_total_by_dist($odei); //get forms por ODEIS, 

			$data['main_content'] = 'digitacion/pescador_avance_by_provincia_view';
			$data['option'] = 1;
					

			$seccion_completos = array();
			$seccion_incompletos = array();

			$forms = $this->udra_pescador_model->get_forms_by_odei( $odei );//get forms por ODEI, ingresados en PESCADOR 

			if($forms->num_rows() > 0){
		
				foreach($forms->result() as $filas){//busca en todas las tablas de pescador
					
					$i = 0;
					$table = null;
					foreach($this->secciones as $s=>$k){
						$table = 'pesc_seccion' . $s;
						if($s == 10){
							$table = 'pesc_info';
						}
						  $rega = $this->udra_pescador_model->get_regs_a($table,$filas->id);//recorre cada tabla
						if ($rega->num_rows() >0){
							$i++;
						}
						//var_dump($rega->result());echo '<br>';
					}
					if ($i == 9){
						$seccion_completos[] = $filas->id; //guarda los ID de formularios completos en todas las secciones

					}else{
						$seccion_incompletos[] = $filas->id; //guarda los ID de formularios incompletos
					}
				}//var_dump($seccion_completos);echo '<br>';
			}

			if (count($seccion_completos)>0){
			 	$data['formularios'] = $this->udra_pescador_model->get_n_formularios_by_odei($seccion_completos); 
			}else{
				$data['formularios'] = NULL;
			}			
			if (count($seccion_incompletos)>0){
			 $data['formularios_inc'] = $this->udra_pescador_model->get_n_formularios_by_odei($seccion_incompletos); 
			}else{
				$data['formularios_inc'] = NULL;
			}
			$data['udra_total'] = $this->udra_pescador_model->get_formularios_total_by_odei( $this->tank_auth->get_ubigeo() ); 
			//$data['registros_total'] = $this->udra_pescador_model->get_registros_total($seccion_completos); 
	    	$this->load->view('backend/includes/template', $data);	
	
	}

	public function distrito()
	{
			$data['nav'] = TRUE;
			$data['title'] = 'Avance Pescador por provincia';
			$data['user_id']	= $this->tank_auth->get_user_id();
			$data['username']	= $this->tank_auth->get_username();
			//$this->ubigeo_piloto_model->get_dpto_by_code($this->tank_auth->get_ubigeo()); //PILOTO
			$data['tables'] = $this->udra_pescador_model->get_pescadores_by_odei(  $this->tank_auth->get_ubigeo() ); //get forms por ODEI, y por COD_SEDE del usuario

			$data['main_content'] = 'digitacion/pescador_avance_by_distrito_view';
			$data['option'] = 3;

	    	$this->load->view('backend/includes/template', $data);				
	}

}