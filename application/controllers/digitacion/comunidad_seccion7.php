<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Comunidad_seccion7 extends CI_Controller {
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
		$this->load->model('comunidad_model');	
	}

	public function index()
	{
		$is_ajax = $this->input->post('ajax');
		if($is_ajax){

					$id = $this->input->post('comunidad_id');
					$fields = $this->comunidad_model->get_fields('comunidad_seccion7');
					foreach ($fields as $a=>$b) {
						if(!in_array($b, array('user_id','last_ip','user_agent','created','modified'))){
							$c_data[$b] =  ($this->input->post($b) == '' ) ? NULL : $this->input->post($b) ;
						}
					}	

			if ($this->comunidad_model->consulta_in_seccion($id,'comunidad_seccion7')->num_rows() == 0) {
				// inserta nuevo registro
					$c_data['user_id'] = $this->tank_auth->get_user_id();
					$c_data['created'] = date('Y-m-d H:i:s');
					$c_data['last_ip'] =  $this->input->ip_address();
					$c_data['user_agent'] = $this->agent->agent_string();
					$flag = 0;
					$msg = 'Error inesperado, por favor intentalo nuevamente';
					if($this->comunidad_model->insert_comunidad_seccion('comunidad_seccion7',$c_data) > 0){
						$flag = 1;
						$msg = 'Se ha registrado satisfactoriamente la Seccion VII';
					}

			} else {
				// actualiza
					$c_data['user_id'] = $this->tank_auth->get_user_id();
					$c_data['last_ip'] =  $this->input->ip_address();
					$c_data['modified'] = date('Y-m-d H:i:s');
					$c_data['user_agent'] = $this->agent->agent_string();
					$flag = 0;
					$msg = 'Error inesperado, por favor intentalo nuevamente';
					if($this->comunidad_model->update_comunidad_seccion('comunidad_seccion7',$c_data,$id) > 0){
						$flag = 1;
						$msg = 'Se ha modificado satisfactoriamente la Seccion VII';
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