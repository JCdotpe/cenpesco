<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Comunidad_avance extends CI_Controller {
	protected $secciones = array(
					2 => 'Seccion II',
					3 => 'Seccion III',
					4 => 'Seccion IV',
					5 => 'Seccion V',
					6 => 'Seccion VI',
					7 => 'Seccion VII',
					8 => 'Seccion VIII',
					9 => 'Info',
	);
	function __construct()
	{
		parent::__construct();
		$this->load->helper(array('form', 'url'));
		$this->load->library('form_validation');
		$this->load->library('security');
		$this->load->library('tank_auth');
		$this->lang->load('tank_auth');	
		$this->load->model('udra_comunidad_model');
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
			$data['tables'] = $this->marco_model->get_comunidad_by_odei($odei); //get forms por ODEIS, 
			$data['udra'] = $this->udra_comunidad_model->get_udra_total_by_odei($odei); //get forms por ODEIS, 

			$data['main_content'] = 'digitacion/avance_digitacion/comunidad_by_odei_view';
			$data['option'] = 21;
					
			$seccion_completos = array();
			$seccion_incompletos = array();

			$forms = $this->udra_comunidad_model->get_forms_by_odei( $odei );//get forms por ODEI, ingresados en PESCADOR 

			if($forms->num_rows() > 0){
		
				foreach($forms->result() as $filas){//busca en todas las tablas de pescador
					$i = 0;
					$table = null;
					foreach($this->secciones as $s=>$k){
						$table = 'comunidad_seccion' . $s;
						if($s == 9){
							$table = 'comunidad_info';
						}
						  $rega = $this->udra_comunidad_model->get_regs_a($table,$filas->id);//recorre cada tabla
						if ($rega->num_rows() >0){
							$i++;
						}
					}echo $i;
					if ($i == 8){
						$seccion_completos[] = $filas->id; //guarda los ID de formularios completos en todas las secciones

					}else{
						$seccion_incompletos[] = $filas->id; //guarda los ID de formularios incompletos
					}
				}//var_dump($seccion_completos);echo '<br>';
			}

			if (count($seccion_completos)>0){
			 	$data['formularios'] = $this->udra_comunidad_model->get_n_formularios_by_odei($seccion_completos); //N° formularios ingresados en pescador completos
			}
			else{
				$data['formularios'] = NULL;
			}			
			if (count($seccion_incompletos)>0){
			 $data['formularios_inc'] = $this->udra_comunidad_model->get_n_formularios_by_odei($seccion_incompletos); //N° formularios ingresados en pescador incompletos
			}else{
				$data['formularios_inc'] = NULL;
			}

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
			$data['tables'] = $this->marco_model->get_comunidad_by_prov($odei); //get forms por ODEIS, 
			$data['udra'] = $this->udra_comunidad_model->get_udra_total_by_prov($odei); //get forms por ODEIS, 

			$data['main_content'] = 'digitacion/avance_digitacion/comunidad_by_prov_view';
			$data['option'] = 22;
					
			$seccion_completos = array();
			$seccion_incompletos = array();

			$forms = $this->udra_comunidad_model->get_forms_by_odei( $odei );//get forms por ODEI, ingresados en PESCADOR 

			if($forms->num_rows() > 0){
		
				foreach($forms->result() as $filas){//busca en todas las tablas de pescador
					$i = 0;
					$table = null;
					foreach($this->secciones as $s=>$k){
						$table = 'comunidad_seccion' . $s;
						if($s == 9){
							$table = 'comunidad_info';
						}
						  $rega = $this->udra_comunidad_model->get_regs_a($table,$filas->id);//recorre cada tabla
						if ($rega->num_rows() >0){
							$i++;
						}
					}
					if ($i == 8){
						$seccion_completos[] = $filas->id; //guarda los ID de formularios completos en todas las secciones

					}else{
						$seccion_incompletos[] = $filas->id; //guarda los ID de formularios incompletos
					}
				}//var_dump($seccion_completos);echo '<br>';
			}

			if (count($seccion_completos)>0){
			 	$data['formularios'] = $this->udra_comunidad_model->get_n_formularios_by_prov($seccion_completos); //N° formularios ingresados en pescador completos
			}else{
				$data['formularios'] = NULL;
			}			
			if (count($seccion_incompletos)>0){
			 $data['formularios_inc'] = $this->udra_comunidad_model->get_n_formularios_by_prov($seccion_incompletos); //N° formularios ingresados en pescador incompletos
			}else{
				$data['formularios_inc'] = NULL;
			}

	    	$this->load->view('backend/includes/template', $data);	
	
	}

	public function distrito()
	{
			$data['nav'] = TRUE;
			$data['title'] = 'DISTRITO';
			$data['user_id']	= $this->tank_auth->get_user_id();
			$data['username']	= $this->tank_auth->get_username();

			foreach ($this->marco_model->get_odei($this->tank_auth->get_ubigeo())->result() as $key ) {//get ODEIS que tiene el usuario
				$odei[] = $key->ODEI_COD;
			}					
			$data['tables'] = $this->marco_model->get_comunidad_by_dist($odei); //get forms por ODEIS, 
			$data['udra'] = $this->udra_comunidad_model->get_udra_total_by_dist($odei); //get forms por ODEIS, 

			$data['main_content'] = 'digitacion/avance_digitacion/comunidad_by_dist_view';
			$data['option'] = 23;
					
			$seccion_completos = array();
			$seccion_incompletos = array();

			$forms = $this->udra_comunidad_model->get_forms_by_odei( $odei );//get forms por ODEI, ingresados en PESCADOR 

			if($forms->num_rows() > 0){
		
				foreach($forms->result() as $filas){//busca en todas las tablas de pescador
					$i = 0;
					$table = null;
					foreach($this->secciones as $s=>$k){
						$table = 'comunidad_seccion' . $s;
						if($s == 9){
							$table = 'comunidad_info';
						}
						  $rega = $this->udra_comunidad_model->get_regs_a($table,$filas->id);//recorre cada tabla
						if ($rega->num_rows() >0){
							$i++;
						}
					}
					if ($i == 8){
						$seccion_completos[] = $filas->id; //guarda los ID de formularios completos en todas las secciones

					}else{
						$seccion_incompletos[] = $filas->id; //guarda los ID de formularios incompletos
					}
				}//var_dump($seccion_completos);echo '<br>';
			}

			if (count($seccion_completos)>0){
			 	$data['formularios'] = $this->udra_comunidad_model->get_n_formularios_by_dist($seccion_completos); //N° formularios ingresados en COMUNIDAD completos
			}else{
				$data['formularios'] = NULL;
			}			
			if (count($seccion_incompletos)>0){
			 $data['formularios_inc'] = $this->udra_comunidad_model->get_n_formularios_by_dist($seccion_incompletos); //N° formularios ingresados en COMUNIDAD incompletos
			}else{
				$data['formularios_inc'] = NULL;
			}

	    	$this->load->view('backend/includes/template', $data);		
			
	}

	public function centro_poblado()
	{
			$data['nav'] = TRUE;
			$data['title'] = 'CENTRO POBLADO';
			$data['user_id']	= $this->tank_auth->get_user_id();
			$data['username']	= $this->tank_auth->get_username();

			foreach ($this->marco_model->get_odei($this->tank_auth->get_ubigeo())->result() as $key ) {//get ODEIS que tiene el usuario
				$odei[] = $key->ODEI_COD;
			}					
			$data['tables'] = $this->marco_model->get_comunidad_by_ccpp($odei); //get MARCO por CENTRO POBLADO, 
			$data['udra'] = $this->udra_comunidad_model->get_udra_total_by_ccpp($odei); //get forms por CENTRO POBLADO, 

			$data['main_content'] = 'digitacion/avance_digitacion/comunidad_by_ccpp_view';
			$data['option'] = 24;
					
			$seccion_completos = array();
			$seccion_incompletos = array();

			$forms = $this->udra_comunidad_model->get_forms_by_odei( $odei );//get forms por ODEI, ingresados en COMUNIDAD 

			if($forms->num_rows() > 0){
		
				foreach($forms->result() as $filas){//busca en todas las tablas de pescador
					$i = 0;
					$table = null;
					foreach($this->secciones as $s=>$k){
						$table = 'comunidad_seccion' . $s;
						if($s == 9){
							$table = 'comunidad_info';
						}
						  $rega = $this->udra_comunidad_model->get_regs_a($table,$filas->id);//recorre cada tabla
						if ($rega->num_rows() >0){
							$i++;
						}
					}
					if ($i == 8){
						$seccion_completos[] = $filas->id; //guarda los ID de formularios completos en todas las secciones

					}else{
						$seccion_incompletos[] = $filas->id; //guarda los ID de formularios incompletos
					}
				}//var_dump($seccion_completos);echo '<br>';
			}

			if (count($seccion_completos)>0){
			 	$data['formularios'] = $this->udra_comunidad_model->get_n_formularios_by_ccpp($seccion_completos); //N° formularios ingresados en COMUNIDAD completos
			}else{
				$data['formularios'] = NULL;
			}			
			if (count($seccion_incompletos)>0){
			 $data['formularios_inc'] = $this->udra_comunidad_model->get_n_formularios_by_ccpp($seccion_incompletos); //N° formularios ingresados en COMUNIDAD incompletos
			}else{
				$data['formularios_inc'] = NULL;
			}

	    	$this->load->view('backend/includes/template', $data);		
	}


}
