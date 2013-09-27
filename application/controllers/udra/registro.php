<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Registro extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		$this->load->helper(array('form', 'url'));
		$this->load->library('form_validation');
		$this->load->library('security');
		$this->load->library('tank_auth');
		$this->lang->load('tank_auth');	
		$this->load->model('udra_registro_model');
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
			$data['title'] = 'UDRA';
			$data['user_id']	= $this->tank_auth->get_user_id();
			$data['username']	= $this->tank_auth->get_username();
			foreach ($this->marco_model->get_odei($this->tank_auth->get_ubigeo())->result() as $key ) {
				$odeis[] = $key->ODEI_COD;
			}				
			$data['departamento'] = $this->marco_model->get_dpto_by_odei($odeis); 
			$data['tables'] = $this->udra_registro_model->get_acuicultores_by_sede($this->tank_auth->get_ubigeo(), $odeis ); 
			$data['main_content'] = 'udra/registro_view';
			$data['option'] = 4;
			$data['error'] = 0;
			$data['sede_cod'] = $this->tank_auth->get_ubigeo();

			$this->form_validation->set_rules('NOM_DD_f','DEPARTAMENTO','required|alpha_numeric');
			$this->form_validation->set_rules('CCDD','CODIGO','required|numeric');
			$this->form_validation->set_rules('NOM_PP_f','PROVINCIA','required|alpha_numeric');
			$this->form_validation->set_rules('CCPP','CODIGO','required|numeric');
			$this->form_validation->set_rules('NOM_DI_f','DISTRITO','required|alpha_numeric');
			$this->form_validation->set_rules('CCDI','CODIGO','required|numeric');

			$this->form_validation->set_rules('NOM_CCPP_f','CENTRO POBLADO','required|alpha_numeric');
			$this->form_validation->set_rules('COD_CCPP','CODIGO','required|numeric|centro_poblado'); //regla que valida si el CCPP fue registrado
			$this->form_validation->set_rules('FORMULARIOS','required|numeric');		



	    if ($this->form_validation->run() === TRUE) {
	    		//VALIDA USUARIO NO PILOTO
			if ($this->tank_auth->get_ubigeo()<99) {//VALIDA si el CCPP ya fue registrado
				
				$dep = $this->input->post('CCDD');
				$prov = $this->input->post('CCPP');
				$dist = $this->input->post('CCDI');
				$ccpp = $this->input->post('COD_CCPP');
				if($this->udra_registro_model->get_centro_poblado($dep,$prov,$dist,$ccpp) > 0){
					$this->session->set_flashdata('msgbox',3);
					redirect('/udra/registro');
				}else{
					$od = $this->marco_model->get_odei_by_sede_dep($this->tank_auth->get_ubigeo(),$this->input->post('CCDD'));
					if ($od->num_rows() == 1){
						$ODEI_COD = $od->row('ODEI_COD');
						$NOM_ODEI = $od->row('NOM_ODEI');
						$NOM_SEDE= $od->row('NOM_SEDE');

			    		$registros = array(
							'SEDE_COD'	=> $this->tank_auth->get_ubigeo(),
							'NOM_SEDE'	=> $NOM_SEDE,		    			
							'ODEI_COD'	=> $ODEI_COD,
							'NOM_ODEI'	=> $NOM_ODEI,					
							'DEPARTAMENTO'	=> $this->input->post('NOM_DD'),
							'CCDD'		=> $this->input->post('CCDD'),
							'PROVINCIA'	=> $this->input->post('NOM_PP'),
							'CCPP'		=> $this->input->post('CCPP'),
							'DISTRITO'	=> $this->input->post('NOM_DI'),
							'CCDI'		=> $this->input->post('CCDI'),

							'CENTRO_POBLADO'=> $this->input->post('NOM_CCPP'),
							'COD_CCPP'		=> $this->input->post('COD_CCPP'),
							'FORMULARIOS'	=> $this->input->post('formularios'),
							'USUARIO'		=> $this->tank_auth->get_user_id(),
							'FECHA'			=> date('y-m-d H:i:s',now())
							);

		    			$afectados = $this->udra_registro_model->insert_registro($registros);
						
						if ($afectados>0){
							$this->session->set_flashdata('msgbox',1);
						}elseif ($afectados===0) {
							$this->session->set_flashdata('msgbox',2);;
						}
						redirect('/udra/registro');
					}else{
		    				$this->session->set_flashdata('msgbox','error_odei');
		        			redirect('/udra/registro');					
					}
				}
			}else{
			$this->session->set_flashdata('msgbox','no_piloto');
			redirect('/udra/registro');
			}
		}else{
					
 			$data['datos'] = $this->form_validation->error_array();
    		$this->load->view('backend/includes/template', $data);				
	        
	    }
		
	}

	function to_excel(){
		$this->load->helper('excel');
        $query = $this->udra_registro_model->get_all_export();
        to_excel($query, 'Udra_Registro');
	}


}