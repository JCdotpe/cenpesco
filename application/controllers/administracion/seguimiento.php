<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Seguimiento extends CI_Controller {
	protected $user_id = NULL;
	function __construct()
	{
		parent::__construct();
		$this->load->helper(array('form', 'url'));
		$this->load->library('form_validation');
		$this->load->library('security');
		$this->load->library('tank_auth');
		$this->lang->load('tank_auth');		

		if (!$this->tank_auth->is_logged_in()) {
			redirect('/auth/login/');
		}

		//Check user privileges 
		$roles = $this->tank_auth->get_roles();
		$flag = FALSE;
		foreach ($roles as $role) {
			if($role->role_id == 7 && $role->rolename == 'Administracion'){
				$flag = TRUE;
				break;
			}
		}

		//If not author is the maintenance guy!
		if (!$flag) {
			show_404();
			die();
		}
		$this->user_id	= $this->tank_auth->get_user_id();
		$this->load->model('transaccion_model');
		$this->load->model('seguimiento_adm_model');
		$this->load->library('datatables');
	}


	public function index()
	{
		if (!$this->tank_auth->is_logged_in()) {
			redirect('/auth/login/');
		} else {
			$data['nav'] = TRUE;
			$data['title'] = 'Administración';
			// $data['regs'] = $this->seguimiento_adm_model->get_regs();
			// $data['f_regs'] = $this->seguimiento_adm_model->get_fields_regs();
			$data['main_content'] = 'administracion/seguimiento_view';
	        $this->load->view('backend/includes/template', $data);
		}

	}


	public function get()
	{
		$data['datos'] = $this->datatables->getData('seguimiento_adm', array('num', 'requerimiento', 'fecha_sol', 'auto_oted', 'n_oficio', 'f_oficio', 'actividad', 'partida', 'monto', 'secretaria', 'otpp', 'ota', 'personal', 'abastecimiento', 'financiera', 'tesoreria', 'pagaduria','porcentaje','demora', 'fecha_concluido', 'observaciones'), 'num','seguimiento_adm');		
		echo $data['datos'];
	}	

	public function save()
	{
		$requerimiento = $this->input->post('requerimiento');
		$code = $this->seguimiento_adm_model->insert($requerimiento);
		//Transaccion
		$this->transaccion_model->insert_transaccion(array('user_id' => $this->user_id, 'table' => 'seguimiento_adm', 'key' => $code, 'action' => 1));
	}

	public function edit()
	{
		$code = $this->input->post('code');
		$attr = $this->input->post('columnname');
		$newval = $this->input->post('value');
		$this->seguimiento_adm_model->update($code, $attr, $newval);
		//Transaccion
		$this->transaccion_model->insert_transaccion(array('user_id' => $this->user_id, 'table' => 'seguimiento_adm', 'key' => $code, 'action' => 2));		
	}	

	public function delete()
	{
		$code = $this->input->post('code');
		$this->seguimiento_adm_model->delete($code);
		//Transaccion
		$this->transaccion_model->insert_transaccion(array('user_id' => $this->user_id, 'table' => 'seguimiento_adm', 'key' => $code, 'action' => 3));	
	}

}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */