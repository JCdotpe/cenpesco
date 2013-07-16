<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Revision extends CI_Controller {

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
			if($role->role_id == 8 && $role->rolename == 'Monitoreo de campo'){
				$flag = TRUE;
				break;
			}
		}
		//If not author is the maintenance guy!
		if (!$flag) {
			show_404();
			die();
		}
		$this->load->model('pesca_piloto_model');	
		$this->load->model('ubigeo_model');	
		$this->load->model('marco_model');	
		$this->load->model('revision_model');	
		$this->load->model('ccpp_model');	
	}

	public function index()
	{
			$data['nav'] = TRUE;
			//regular
			//$data['departamentos'] = $this->ubigeo_piloto_model->get_dptos();
			$data['title'] = 'Revision';

			//cabecera
			foreach ($this->marco_model->get_odei($this->tank_auth->get_ubigeo())->result() as $key ) {
				$odei[] = $key->ODEI_COD;
			}
			$data['departamento'] = $this->marco_model->get_dpto_by_odei($odei); 
			
			$data['formularios'] =  array(	-1 => '-',
										 1 => 'F. PESCADOR',
										 2 => 'F. ACUICULTOR',
										 3 => 'F. COMUNIDADES' );
			//regular
			$data['option'] = 3;
			$data['tables'] = $this->revision_model->get_todo($odei);
			$data['main_content'] = 'monitoreo/revision_view';
	        $this->load->view('backend/includes/template', $data);
	}

	public function grabar()
	{
		$is_ajax = $this->input->post('ajax');
		if($is_ajax){

			$od = $this->marco_model->get_odei_by_sede_dep($this->tank_auth->get_ubigeo(),$this->input->post('CCDD'));
			
				$ODEI_COD = $od->row('ODEI_COD');
				$NOM_ODEI = $od->row('NOM_ODEI');
				$NOM_SEDE= $od->row('NOM_SEDE');

				$CCDD = $this->input->post('CCDD');
				$CCPP = $this->input->post('CCPP');
				$CCDI = $this->input->post('CCDI');
				$COD_CCPP = $this->input->post('COD_CCPP');

				$registro = array(	
					'SEDE_COD'	=> $this->tank_auth->get_ubigeo(),
					'NOM_SEDE'	=> $NOM_SEDE,				
					'ODEI_COD'	=> $ODEI_COD,
					'NOM_ODEI'	=> $NOM_ODEI,					
					'CCDD' => $CCDD,
					'NOM_DD' => $this->input->post('NOM_DD'),
					'CCPP'=> $CCPP,
					'NOM_PP' => $this->input->post('NOM_PP'),
					'CCDI'=> $CCDI,
					'NOM_DI' => $this->input->post('NOM_DI'),
					'COD_CCPP'=> $COD_CCPP,
					'NOM_CCPP'=> $this->input->post('NOM_CCPP'),
		            'F_D' => $this->input->post('F_D'),
					'F_M' => $this->input->post('F_M'),
					'NOM' => $this->input->post('NOM'),
					'CARGO' => $this->input->post('CARGO'),
					'F_PES' => $this->input->post('F_PES'),
					'F_ACU' => $this->input->post('F_ACU'),
					'F_COM' => $this->input->post('F_COM'),
					'SEC' => $this->input->post('SECC'),
					'PREG_N' => $this->input->post('PREG_N'),
					'E_CONC' => $this->input->post('E_CONC'),
					'E_DILIG' => $this->input->post('E_DILIG'),
					'E_OMI' => $this->input->post('E_OMI'),
					'DES_E' => $this->input->post('DES_E'),
					'activo'=>1,
					'user_id'=>$this->tank_auth->get_user_id(),
					'created'=> date('Y-m-d H:i:s'),
					'last_ip' => $this->input->ip_address(),
					'user_agent' => $this->agent->agent_string(),
					);
				$revision = $this->revision_model->consulta_ccpp($CCDD,$CCPP,$CCDI,$COD_CCPP);

			if ($this->tank_auth->get_ubigeo()<99) {

				if ($od->num_rows() == 1){
					
					if($revision >= 1){
						$datos['operacion'] = 0; // ya existe el centro poblado
					}else{
						$filas = $this->revision_model->insertar($registro);
						if ($filas ==1) {
							$datos['operacion'] = 1;	// guardado exitosamente				
						}else {
							$datos['operacion'] = 8; // no se guardo		
						}
					}
				}else {
					$datos['operacion'] = 7; //ODEI en doble ubigeo
				}

			}else{
					$datos['operacion'] = 99; // no usuario piloto
			}	





			// $datos['secciones'] = $udra;	
			$data['datos'] = $datos;
			$this->load->view('backend/json/json_view', $data);		
			//redirect('digitacion/revision');

		}else{
			show_404();;
		}
	}



	function get_todo(){
			//$data['nav'] = TRUE;
		//cabecera
		foreach ($this->marco_model->get_odei($this->tank_auth->get_ubigeo())->result() as $key ) {
			$odei[] = $key->ODEI_COD;
		}
		
		//regular
		$data['tables'] = $this->revision_model->get_todo($odei);
		$data['main_content'] = 'monitoreo/revision_tabla_view';
        $this->load->view('backend/includes/template', $data);

	}



}




/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */