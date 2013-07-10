<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Resumen extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		$this->load->library('form_validation');
		$this->load->library('security');
		$this->load->library('tank_auth');
		$this->lang->load('tank_auth');	
		//User is logged in
		if (!$this->tank_auth->is_logged_in()) {
			// redirect('/auth/login/');
			//No loging enviar a bienvenida cenpesco
			redirect();
		}

		//Check user privileges 
		$roles = $this->tank_auth->get_roles();
		$flag = FALSE;
		foreach ($roles as $role) {
			if($role->role_id == 1 && $role->rolename == 'Convocatoria'){
				$flag = TRUE;
				break;
			}
		}

		//If not author is BENDER!
		if (!$flag) {
			show_404();
			die();
		}
		$this->load->model('cargos_model');
		$this->load->model('ocupacion_model');
		//$this->load->model('pais_model');
		$this->load->model('universidades_model');
		$this->load->model('proyectos_inei_model');			
		$this->load->model('pea_model');
		$this->load->model('regs_model');
		$this->load->model('ubigeo_model');	
	}


	public function index(){
			$data['option'] = 1;
			$data['nav'] = TRUE;
			$data['title'] = 'Convocatoria';
			//$data['pea'] = $this->pea_model->get_pea_regs_by_dep();
			$data['ptsdep'] = $this->pea_model->get_pea_ubigeo_by_dep();
			$nro = null;
			$nrocap = null;
			$nro_1 = null;
			$nro_3 = null;
			$nro_4 = null;
			foreach($data['ptsdep']->result() as $p){
				$nro[$p->SEDE_COD] = $this->regs_model->get_nro_regs_by_dep($p->SEDE_COD,0)->row();		
				$nrocap[$p->SEDE_COD] = $this->regs_model->get_nro_regs_by_dep($p->SEDE_COD,2)->row();	
				$nro_1[$p->SEDE_COD] = $this->regs_model->get_nro_regs_by_dep($p->SEDE_COD,0,1)->row();	
				$nro_3[$p->SEDE_COD] = $this->regs_model->get_nro_regs_by_dep($p->SEDE_COD,0,3)->row();	
				$nro_4[$p->SEDE_COD] = $this->regs_model->get_nro_regs_by_dep($p->SEDE_COD,0,4)->row();	
			}
			$data['nro'] = $nro;
			$data['nrocap'] = $nrocap;
			$data['nro_1'] = $nro_1;
			$data['nro_3'] = $nro_3;
			$data['nro_4'] = $nro_4;
			//$data['dptoskml'] = givemethefuckingkml($this->ubigeo_model->get_kml_dep()->result());
			$data['main_content'] = 'convocatoria/resumen_view';
	        $this->load->view('backend/includes/template', $data);

	}

	public function kml(){
			$data['msg'] = givemethefuckingkml('http://webinei.inei.gob.pe:8080/WS_REST/series/json/mapa/consulta2/tipo/departamento/ubigeo/99999');
	        $this->load->view('backend/general/message_view', $data);		
	}	
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */