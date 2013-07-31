<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Pesc_info extends CI_Controller {
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

			$fields = $this->pescador_model->get_fields('pesc_info');
			$id = $this->input->post('pescador_id');
			foreach ($fields as $a=>$b) {
				if(!in_array($b, array('id','user_id','last_ip','user_agent','created','modified'))){
					$c_data[$b] = $this->input->post($b);
				}
			}	
			// $c_data['user_id'] = $this->tank_auth->get_user_id();
			// $c_data['created'] = date('Y-m-d H:i:s');
			// $c_data['last_ip'] =  $this->input->ip_address();
			// $c_data['user_agent'] = $this->agent->agent_string();

			//print_r($c_data);

			// $flag = 0;
			// $msg = 'Error inesperado, por favor intentalo nuevamente';
			// if($this->pescador_model->insert_pesc_seccion('pesc_info',$c_data) > 0){
			// 	$flag = 1;
			// 	$msg = 'Se ha registrado satisfactoriamente la Seccion de Informacion';
			// }
			if ($this->pescador_model->consulta_in_seccion($id,'pesc_info')->num_rows() == 0) {
				// inserta nuevo registro
					$c_data['user_id'] = $this->tank_auth->get_user_id();
					$c_data['created'] = date('Y-m-d H:i:s');
					$c_data['last_ip'] =  $this->input->ip_address();
					$c_data['user_agent'] = $this->agent->agent_string();
					$flag = 0;
					$msg = 'Error inesperado, por favor intentalo nuevamente';
					if($this->pescador_model->insert_pesc_seccion('pesc_info',$c_data) > 0){
						$flag = 1;
						$msg = 'Se ha registrado satisfactoriamente la Seccion Info';
					}
			} else {
				// actualiza
					$c_data['user_id'] = $this->tank_auth->get_user_id();
					$c_data['last_ip'] =  $this->input->ip_address();
					$c_data['modified'] = date('Y-m-d H:i:s');
					$c_data['user_agent'] = $this->agent->agent_string();
					$flag = 0;
					$msg = 'Error inesperado, por favor intentalo nuevamente';
					if($this->pescador_model->update_pesc_seccion('pesc_info',$c_data,$id) > 0){
						$flag = 1;
						$msg = 'Se ha modificado satisfactoriamente la Seccion Info';
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