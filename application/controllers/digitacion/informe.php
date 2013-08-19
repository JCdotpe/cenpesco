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
			if($role->role_id == 9 && $role->rolename == 'Informe de supervisión'){
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
			$data['comboe'] = json_encode($this->inform_model->get_a()->result_array());

			$data['sups'] = $this->supervisor_model->get_sup();
			$data['odeis'] = $this->inform_model->get_odei();
			
			$data['nav'] = TRUE;
			//regular
			$data['departamentos'] = $this->ubigeo_model->get_dptos();
			$data['pais']=$this->pais_model->select_pais();
			$data['title'] = 'Informe de Supervisión';
			$data['main_content'] = 'digitacion/informe_view';
	        $this->load->view('backend/includes/template', $data);

	}


	public function consulta()
	{
		$is_ajax = $this->input->post('ajax');
		if($is_ajax){
			$INF_N = $this->input->post('INF_N');
			$DNI_SUP = $this->input->post('DNI_SUP');
			$N_SUP = $this->input->post('N_SUP');
			$ODEI = $this->input->post('ODEI');
			$ODEI_COD = $this->input->post('ODEI_COD');
			$DEP = $this->input->post('DEP');
			$DEP_COD = $this->input->post('DEP_COD');
			$PROV = $this->input->post('PROV');
			$PROV_COD = $this->input->post('PROV_COD');
			$DIST = $this->input->post('DIST');
			$DIST_COD = $this->input->post('DIST_COD');
			$CCPP = $this->input->post('CCPP');
			$CCPPCOD = $this->input->post('CCPPCOD');
			$F_DIA = $this->input->post('F_DIA');
			$F_MES = $this->input->post('F_MES');

			$c_data = array(
					'INF_N'	=> $INF_N,
					'DNI_SUP'	=> $DNI_SUP,
					'N_SUP'	=> $N_SUP,
					'ODEI'	=> $ODEI,
					'ODEI_COD'	=> $ODEI_COD,
					'DEP'	=> $DEP,
					'DEP_COD'	=> $DEP_COD,
					'PROV'	=> $PROV,
					'PROV_COD'	=> $PROV_COD,
					'DIST'	=> $DIST,
					'DIST_COD'	=> $DIST_COD,
					'CCPP'	=> $CCPP,
					'CCPPCOD'	=> $CCPPCOD,
					'F_DIA'	=> $F_DIA,
					'F_MES'	=> $F_MES,
					'active'=>1,
					'user_id'=>$this->tank_auth->get_user_id(),
					'created'=> date('Y-m-d H:i:s'),
					'last_ip' => $this->input->ip_address(),
					'user_agent' => $this->agent->agent_string()									
			);

			$flag = 0;
			$datos['errors'] = null;
			$msg = 'Ha ocurrido un error, intente nuevamente.';
			$datos['isup'] = null;
			$varia = $this->inform_model->consulta($INF_N,$DNI_SUP,$ODEI_COD,$DEP_COD,$PROV_COD,$DIST_COD,$CCPPCOD);
				if($varia->num_rows() > 0){
						$flag = 1;
						$datos['errors'] = $this->inform_model->get_errors($varia->row()->id)->result();
						$datos['numerrors'] = $this->inform_model->get_errors($varia->row()->id)->num_rows();
						$datos['isup'] = $this->inform_model->get_isup($ODEI_COD,$DEP_COD,$PROV_COD,$DIST_COD,$CCPPCOD)->row();
						$datos['supform'] = $varia->row();		
						$msg = 'Por favor complete los campos a continuación.';
				}else{
						$fla = $this->inform_model->inserta($c_data);
						//error?
						if(!$fla){
							$flag = 3;
						}
						$flag = 2;
						$msg = 'Informe registrado satisfactoriamente.';

				}
			$datos['flag'] = $flag;		
			$datos['msg'] = $msg;		
			$data['datos'] = $datos;
			$this->load->view('backend/json/json_view', $data);		

		}else{
			show_404();;
		}

	}	





	public function actualiza()
	{
		$is_ajax = $this->input->post('ajax');
		if($is_ajax){		
			$id = $this->input->post('informid');
			$fields = $this->inform_model->get_fields();
			foreach ($fields as $a=>$b) {
				if(!in_array($b, array('id','INF_N','DNI_SUP','N_SUP','ODEI','ODEI_COD','DEP','DEP_COD','PROV','PROV_COD','DIST','DIST_COD','CCPP','CCPPCOD','F_DIA','F_MES','active' ,'user_id','last_ip','user_agent','created','modified'))){
					$c_data[$b] = ($this->input->post($b) == '') ? NULL : $this->input->post($b);
				}
			}	
			//insert errors
			$e_data['supervision_form_id'] = $id;
			$e_data['active'] = 1;
			for($i = 1; $i<=$this->input->post('nerror'); $i++) {
					$e_data['P14'] = ($this->input->post('P14_' . $i) == '') ? NULL : $this->input->post('P14_' . $i);
					$e_data['P15'] = ($this->input->post('P15_' . $i) == '') ? NULL : $this->input->post('P15_' . $i);
					$e_data['P16'] = ($this->input->post('P16_' . $i) == '') ? NULL : $this->input->post('P16_' . $i);
					$e_data['P17'] = ($this->input->post('P17_' . $i) == '') ? NULL : $this->input->post('P17_' . $i);
					$e_data['P18'] = ($this->input->post('P18_' . $i) == '') ? NULL : $this->input->post('P18_' . $i);
					$e_data['P19'] = ($this->input->post('P19_' . $i) == '') ? NULL : $this->input->post('P19_' . $i);
					$e_data['P20'] = ($this->input->post('P20_' . $i) == '') ? NULL : $this->input->post('P20_' . $i);
					$e_data['P21'] = ($this->input->post('P21_' . $i) == '') ? NULL : $this->input->post('P21_' . $i);
					$e_data['P22'] = ($this->input->post('P22_' . $i) == '') ? NULL : $this->input->post('P22_' . $i);
					$e_data['OBS_2'] = ($this->input->post('OBS_2_' . $i) == '') ? NULL : $this->input->post('OBS_2_' . $i);
					$letsee = $this->input->post('error_' . $i);
					if($letsee != ''){	
						$this->inform_model->actualiza_error($letsee, $e_data);
					}else{
						$this->inform_model->inserta_error($e_data);						
					}
			}		

			$c_data['user_id'] = $this->tank_auth->get_user_id();
			$c_data['created'] = date('Y-m-d H:i:s');
			$c_data['last_ip'] =  $this->input->ip_address();
			$c_data['user_agent'] = $this->agent->agent_string();

			$flag = 0;
			$msg = 'Error inesperado, por favor intentalo nuevamente';
			if($this->inform_model->actualiza($id,$c_data) > 0){
				$flag = 1;
				$msg = 'Se ha guardado satisfactoriamente.';
			}else{
				$flag = 2;	
				$msg = 'Ocurrio un error, intentelo nuevamente. ';
			}
			$datos['flag'] = $flag;	
			$datos['msg'] = $msg;	

			$data['datos'] = $datos;
			$this->load->view('backend/json/json_view', $data);		
		}else{
			show_404();;
		}			
	}











}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */