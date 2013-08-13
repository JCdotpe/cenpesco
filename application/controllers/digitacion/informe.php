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
					'activo'=>1,
					'user_id'=>$this->tank_auth->get_user_id(),
					'created'=> date('Y-m-d H:i:s'),
					'last_ip' => $this->input->ip_address(),
					'user_agent' => $this->agent->agent_string()									
			);

			$flag = 0;
			$varia = $this->inform_model->consulta($INF_N,$DNI_SUP,$ODEI_COD,$DEP_COD,$PROV_COD,$DIST_COD,$CCPPCOD);
				if($varia->num_rows() > 0){
					//actualizar
						$flag = 1;
						//get secciones
						$datos['errors'] = $this->inform_model->consulta($varia->row()->id);
				}else{
						$flag = $this->inform_model->inserta($varia->row()->id);
					//insert
						$flag = 2;
				}
			$datos['flag'] = $flag;		

			$data['datos'] = $datos;
			$this->load->view('backend/json/json_view', $data);		

		}else{
			show_404();;
		}

	}	



}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */