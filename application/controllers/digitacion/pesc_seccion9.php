<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Pesc_seccion9 extends CI_Controller {
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
		$this->load->model('ubigeo_piloto_model');	
		$this->load->model('pescador_model');	
	}


	public function index()
	{
		$is_ajax = $this->input->post('ajax');
		if($is_ajax){
			
			$fields = $this->pescador_model->get_fields('pesc_seccion9');
			$embs = $this->input->post('S9_2');
			$flag = 1; 
			$msg = 'Se ha registrado satisfactoriamente la Seccion IX';

			$c_data['S9_1'] = $this->input->post('S9_1');
			$c_data['S9_2'] = $embs;
			$c_data['pescador_id'] = $this->input->post('pescador_id');
			$c_data['user_id'] = $this->tank_auth->get_user_id();
			$c_data['created'] = date('Y-m-d H:i:s');
			$c_data['last_ip'] =  $this->input->ip_address();
			$c_data['user_agent'] = $this->agent->agent_string();			

			if(!is_null($embs) && $embs!=0 && is_numeric($embs) && $embs != ''){
				for ($i=1; $i <= $embs; $i++) { 
					foreach ($fields as $a=>$b) {
						if(!in_array($b, array('id','S9_1','S9_2','pescador_id','user_id','last_ip','user_agent','created','modified'))){
							$c_data[$b] = $this->input->post($b . '_' . $i);
						}
					}	

					if(!$this->pescador_model->insert_pesc_seccion('pesc_seccion9',$c_data)){
						$flag = 0;
						$msg = 'Error ingresando embarcacion ' . $i . ', por favor intentalo nuevamente';
						break;
					}		
				}
			}else{
					if(!$this->pescador_model->insert_no_emb($c_data)){
						$flag = 0;
						$msg = 'Error en el registro, por favor intentalo nuevamente';
						break;
					}	
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