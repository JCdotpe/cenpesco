<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Comunidad extends CI_Controller {
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
		$this->output->nocache();
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
		$this->load->model('ubigeo_piloto_model');	
		$this->load->model('pescador_model');	
		$this->load->model('marco_model');	
		$this->load->model('comunidad_model');	
		$this->load->model('ccpp_model');	
		$this->load->model('empadronador_model');	
	}


	public function index()
	{
			//cabecera
			$data['departamentox'] = $this->ccpp_model->get_dptos();
			foreach ($this->marco_model->get_odei($this->tank_auth->get_ubigeo())->result() as $key ) {
				$odei[] = $key->ODEI_COD;
			}
			$data['departamento'] = $this->marco_model->get_dpto_by_odei($odei); 

			//get empadronadores by odei
			$data['emps'] = $this->empadronador_model->get_emp_by_odei($odei);			
			$data['nav'] = TRUE;
			//regular
			$data['departamentos'] = $this->ubigeo_piloto_model->get_dptos();
			//$data['pais']=$this->pais_model->select_pais();
			$data['title'] = 'Formulario Comunidad';
			$data['main_content'] = 'digitacion/comunidad_view';
	        $data['sede_cod'] = $this->tank_auth->get_ubigeo();			
	        $this->load->view('backend/includes/template', $data);

	}

	public function consulta()
	{
		$is_ajax = $this->input->post('ajax');
		if($is_ajax){
			$NFORM = $idf = sprintf("%05d", $this->input->post('NFORM'));
			//$NFORM = $this->input->post('NFORM');
			$CCDD = $this->input->post('CCDD');
			$CCPP = $this->input->post('CCPP');
			$CCDI = $this->input->post('CCDI');
			$COD_CCPP = $this->input->post('COD_CCPP');

			$udra = $this->comunidad_model->consulta_udra($CCDD,$CCPP,$CCDI,$COD_CCPP);
			$flag = 0;
			$mysections = null;
			$secciones_llenas = null;
			if($udra->num_rows() > 0){//valida si CCPP fue ingresado en UDRA
				if($NFORM <= $udra->row()->FORMULARIOS && $NFORM > 0){//valida el N° Form a ingresar esta dentro del rango de FORMS segun UDRA
					$varia = $this->comunidad_model->consulta($NFORM,$CCDD,$CCPP,$CCDI,$COD_CCPP); //
					if($varia->num_rows() > 0){// valida si fue ingresado en COMUNIDAD.,envia las secciones disponibles
						$flag = 1;
						//get secciones
						foreach($this->secciones as $s=>$k){
							$regtble = 'comunidad_seccion' . $s;
							if($s == 9){
								$regtble = 'comunidad_info';
							}
							$alter = $this->comunidad_model->seccion_disponible($NFORM,$CCDD,$CCPP,$CCDI,$COD_CCPP,$regtble);
							$mysections[$s] = $alter; //envia la secciones disponibles (0)
							if ($alter >=1){//si hay un registro en seccion, envia los campos
								$cod = ($CCDD.$CCPP.$CCDI.$COD_CCPP.$NFORM);
								if ($this->comunidad_model->consulta_in_seccion($cod,$regtble)->num_rows() >0 ){
									$secciones_llenas[] = $this->comunidad_model->consulta_in_seccion($cod,$regtble)->result() ;//envia los registros de cada seccion por JSON
								}
							}
						}

					$datos['secciones_llenas'] = $secciones_llenas;//envia el ID del registro por JSON
					$datos['idx'] = $varia->row()->id;//envia el ID del registro por JSON

					}
				}else{
					$flag = 2;	//no existe en udra
				}
			}else{
				$flag = 3;// si no fue ingresado
			}
			$datos['flag'] = $flag;				// envia					
			// $datos['secciones'] = $udra;	
			$datos['secciones'] = $mysections;	// envia SECCIONES disponibles en array por JSON
			$data['datos'] = $datos;
			$this->load->view('backend/json/json_view', $data);		

		}else{
			show_404();;
		}

	}	

	public function insertar()
	{
		$is_ajax = $this->input->post('ajax');
		if($is_ajax){

			if($this->tank_auth->get_ubigeo() != 99){

					$od = $this->marco_model->get_odei_by_sede_dep($this->tank_auth->get_ubigeo(),$this->input->post('CCDD'));
					if ($od->num_rows() == 1){
						$ODEI_COD = $od->row('ODEI_COD');
						$NOM_ODEI = $od->row('NOM_ODEI');
						$NOM_SEDE= $od->row('NOM_SEDE');				
					}else{
		    				$this->session->set_flashdata('msgbox','error_odei');
		        			redirect('/digitacion/registro_pescadores');					
					}			

					$idf = sprintf("%05d", $this->input->post('NFORM'));
					$c_data = array(
							'SEDE_COD'	=> $this->tank_auth->get_ubigeo(),
							'NOM_SEDE'	=> $NOM_SEDE,				
							'ODEI_COD'	=> $ODEI_COD,
							'NOM_ODEI'	=> $NOM_ODEI,
							'id' =>  $this->input->post('CCDD') . $this->input->post('CCPP') . $this->input->post('CCDI') . $this->input->post('COD_CCPP') . $idf,
							'NFORM' => $this->input->post('NFORM'),
							'CCDD' => $this->input->post('CCDD'),
							'NOM_DD' => $this->input->post('NOM_DD'),
							'CCPP'=> $this->input->post('CCPP'),
							'NOM_PP' => $this->input->post('NOM_PP'),
							'CCDI'=> $this->input->post('CCDI'),
							'NOM_DI' => $this->input->post('NOM_DI'),
							'COD_CCPP'=> $this->input->post('COD_CCPP'),
							'NOM_CCPP'=> $this->input->post('NOM_CCPP'),
							'activo'=>1,
							'user_id'=>$this->tank_auth->get_user_id(),
							'created'=> date('Y-m-d H:i:s'),
							'last_ip' => $this->input->ip_address(),
							'user_agent' => $this->agent->agent_string()									
					);

					$flag = 0;
					$msg = 'Error inesperado, por favor intentalo nuevamente';
					if($this->comunidad_model->insert_comunidad($c_data) > 0){
						$flag = 1;
						$msg = 'Se ha registrado satisfactoriamente';
					}

			}else{
					$flag = 2;
					$msg = 'El usuario con permisos generales no puede ingresar un nuevo formulario.';	
			}


			$datos['flag'] = $flag;	
			$datos['msg'] = $msg;		
			$data['datos'] = $datos;
			$this->load->view('backend/json/json_view', $data);		

		}else{
			show_404();;
		}

	}	

	function to_excel(){
		$this->load->helper('excel');
        $query = $this->comunidad_model->get_all();
        to_excel($query, 'Comunidades');
	}
	


}




/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */