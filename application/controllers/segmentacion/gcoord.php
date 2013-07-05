<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Gcoord extends CI_Controller {

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
			if($role->role_id == 3 && $role->rolename == 'Rutas y Segmentación'){
				$flag = TRUE;
				break;
			}
		}

		//If not author is the maintenance guy!
		if (!$flag) {
			show_404();
			die();
		}
		
		$this->load->model('pesca_model');
		$this->load->model('ubigeo_model');
	}


	private function index()
	{
			$data['nav'] = TRUE;
			//$data['onload'] = 'init()';
			//$data['fluid'] = TRUE;

			$ubigeo = $this->ubigeo_model->get_ubigeo()->result();

			$finala = '';
			$ubigeox = null;
			foreach($ubigeo as $u){
				$ubigeox =  $u->UBIGEO;
				$pieces = explode(",", $u->COORD);
				$count = count($pieces);
				$finala = '';
				for ($i = 0; $i < $count; $i++) {
					$comma = '';
					$prev = explode(" ", $pieces[$i]);
					$comma = ($i == $count-1) ? '' : ',';
					$finala .= $prev[1] . ' ' . $prev[0] . $comma;
				}
					$formdata = array('GCOORD' => $finala);
					$flag = $this->ubigeo_model->insert_gcoord($ubigeox,$formdata);
					echo (!$flag) ? '<br><br><br><br><br><br><br><br><br>ERROR <br>' . $ubigeox . '<br>' . $u->COORD . '<br><br><br><br><br><br><br><br>' . $finala . '<br><br>' : 'LISTO' ;				
			}



			$data['msg'] = 'HOLA' ;

			$data['main_content'] = 'backend/general/message_view';
			//$data['main_content'] = 'segmentacion/leaf_view';
	        $this->load->view('backend/includes/template', $data);
	        //$this->load->view('segmentacion/openlayers_view', $data);

	}


}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */