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
		$this->load->model('ccpp_model');	
		$this->load->model('marco_model');	
		$this->load->model('empadronador_model');	
		// $this->load->library('export');
		// $this->load->helper('csv');
	}


	public function index()
	{

			$data['ecivil'] = array(
								-1=> '-',
								1 => 'Conviviente',
								2 => 'Casado(a)',
								3 => 'Separado(a)',
								4 => 'Viudo(a)',
								5 => 'Divorciado(a)',
								6 => 'Soltero(a)',
				);		
			$data['tac'] = array(
								-1 => '-',
								1 => 'Pesca',
								2 => 'Acuicola',
								3 => 'Ambas',
				);					
			//cabecera
			// $data['departamentox'] = $this->ubigeo_model->get_dptos();
			foreach ($this->marco_model->get_odei($this->tank_auth->get_ubigeo())->result() as $key ) {
				$odei[] = $key->ODEI_COD;
			}			

			//get empadronadores by odei
			$data['emps'] = $this->empadronador_model->get_emp_by_odei($odei);

			$data['departamento'] =  $this->marco_model->get_dpto_by_odei($odei); 
			$data['ubigeo'] = $this->tank_auth->get_ubigeo();
			$data['nav'] = TRUE;
			//regular
			$data['departamentos'] = $this->ubigeo_model->get_dptos();
			$data['pais']=$this->pais_model->select_pais();
			$data['title'] = 'Formulario Pescador';
			$data['main_content'] = 'digitacion/pescador_view';
	        $this->load->view('backend/includes/template', $data);

	}

	public function consulta()
	{
		$is_ajax = $this->input->post('ajax');
		if($is_ajax){
			$NFORM = $idf = sprintf("%05d", $this->input->post('NFORM'));
			$CCDD = $this->input->post('CCDD');
			$CCPP = $this->input->post('CCPP');
			$CCDI = $this->input->post('CCDI');
			$COD_CCPP = $this->input->post('COD_CCPP');

			$udra = $this->pescador_model->consulta_udra($CCDD,$CCPP,$CCDI,$COD_CCPP);
			$flag = 0;
			$mysections = null;
			$infosections = null;
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
							$mysections[$s] = $alter->num_rows();
							$infosections[$s] = $alter->row();
							// $fsections[$s] = $this->pescador_model->get_fields($regtble);
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
			// $datos['fsecciones'] = $fsections;	
			$datos['infosecciones'] = $infosections;

			//get odeis by sede
			// foreach ($this->marco_model->get_odei($this->tank_auth->get_ubigeo())->result() as $key ) {
			// 	$odei[] = $key->ODEI_COD;
			// }	


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
			$od = $this->marco_model->get_odei_by_sede_dep($this->tank_auth->get_ubigeo(),$this->input->post('CCDD'));
			if ($od->num_rows() == 1){
				$ODEI_COD = $od->row('ODEI_COD');
				$NOM_ODEI = $od->row('NOM_ODEI');
				$NOM_SEDE= $od->row('NOM_SEDE');				
			}else{
    				// $this->session->set_flashdata('msgbox','error_odei');
        // 			redirect('/digitacion');					
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
					'TAC'=> $this->input->post('TAC'),
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
        // $this->export->to_excel($query, 'Pescadores');
        to_excel($query, 'Pescadores');
        // query_to_csv($query, TRUE, 'Pescadores.csv');
	}
	
	// function to_excel_emb(){
	// 	$this->load->helper('excel');
 //        $query = $this->pescador_model->get_print_emb();
 //        to_excel($query, 'Embarcaciones');
	// }

}




/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */