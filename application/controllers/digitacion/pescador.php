<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Pescador extends CI_Controller {
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
	}


	public function index()
	{
			//cabecera
			$data['departamentox'] = $this->ubigeo_model->get_dptos();
			$data['departamento'] = $this->ubigeo_piloto_model->get_dpto_by_code($this->tank_auth->get_ubigeo());
			
			$data['nav'] = TRUE;
			//regular
			$data['departamentos'] = $this->ubigeo_piloto_model->get_dptos();
			$data['pais']=$this->pais_model->select_pais();
			$data['title'] = 'Formulario Pescador';
			$data['main_content'] = 'digitacion/pescador_view';
	        $this->load->view('backend/includes/template', $data);

	}

	public function consulta()
	{
		$is_ajax = $this->input->post('ajax');
		if($is_ajax){
			$NFORM = $this->input->post('NFORM');
			$CCDD = $this->input->post('CCDD');
			$CCPP = $this->input->post('CCPP');
			$CCDI = $this->input->post('CCDI');
			$COD_CCPP = $this->input->post('COD_CCPP');

			$udra = $this->pescador_model->consulta_udra($CCDD,$CCPP,$CCDI,$COD_CCPP);
			$flag = 0;
			$mysections = null;
			if($udra->num_rows() > 0){
				if($NFORM <= $udra->row()->FORMULARIOS && $NFORM > 0){
					$varia = $this->pescador_model->consulta($NFORM,$CCDD,$CCPP,$CCDI,$COD_CCPP);
					if($varia->num_rows() > 0){
						$flag = 1;
						//get secciones
						foreach($this->secciones as $s=>$k){
							$regtble = 'pesc_seccion' . $s;
							if($s == 10){
								$regtble = 'pesc_info';
							}
							$alter = $this->pescador_model->seccion_disponible($NFORM,$CCDD,$CCPP,$CCDI,$COD_CCPP,$regtble);
							$mysections[$s] = $alter;
						}
					$datos['idx'] = $varia->row()->id;
					}
				}else{
					$flag = 2;	
				}
			}else{
				$flag = 3;
			}
			$datos['flag'] = $flag;		
			// $datos['secciones'] = $udra;	
			$datos['secciones'] = $mysections;	
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
			$c_data = array(
					'id' =>  $this->input->post('CCDD') . $this->input->post('CCPP') . $this->input->post('CCDI') . $this->input->post('COD_CCPP') . $this->input->post('NFORM'),
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
			if($this->pescador_model->insert_pesc($c_data) > 0){
				$flag = 1;
				$msg = 'Se ha registrado satisfactoriamente';
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
        $query = $this->pescador_model->get_print();
        to_excel($query, 'Pescadores');
	}
	
	function to_excel_emb(){
		$this->load->helper('excel');
        $query = $this->pescador_model->get_print_emb();
        to_excel($query, 'Embarcaciones');
	}

}




/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */