<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Consulta extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		$this->load->library('form_validation');
		$this->load->library('security');
		$this->load->library('tank_auth');	
		$this->lang->load('tank_auth');	
		$this->load->model('regs_model');
		// if (!$this->tank_auth->is_logged_in()) {
		// 	redirect('');
		// }
	}


	public function index(){
			$data['nav'] = TRUE;
			$data['title'] = 'Convocatoria - Módulo de Consulta';
			$data['recaptcha_html'] = $this->_create_recaptcha();
			$data['main_content'] = 'convocatoria/consulta_view';
			$data['errors'] = array();
			$this->form_validation->set_rules('dni','DNI','required|xss_clean');
			$this->form_validation->set_rules('recaptcha_response_field', 'Código de confirmación', 'trim|xss_clean|required|callback__check_recaptcha');
			$cargos = $this->config->item('c_cargos');
			if($this->form_validation->run() === TRUE){
				$dni = $this->input->post('dni');
				$res = $this->regs_model->consulta_dni($dni);
				if($res->num_rows() > 0){
					$show = '';
					switch($res->row()->estado){
						case 1:
							$show = 'actualmente inscrito para el cargo de <b>' . $cargos[$res->row()->cargo] . '</b>.';
							break;
						case 2:
							$show = 'apto para capacitación. Presentarse el día 18/05/2013 a las 8:00 am en la ODEI con su Curriculum para el curso de capacitación.';
							break;							
					}
					$data['msg'] = 'El estado de su postulación se encuentra ' . $show;
					
				}else{
					$data['msg'] = 'No esta inscrito en esta Convocatoria';	
				}
				$data['main_content'] = 'backend/general/message_view';
				$this->load->view('backend/includes/template', $data);	
			}else{
        		//Carga el form vacío
        		$this->load->view('backend/includes/template', $data);	
        	}
		
	}


	function _check_recaptcha()
	{
		$this->load->helper('recaptcha');

		$resp = recaptcha_check_answer($this->config->item('recaptcha_private_key', 'tank_auth'),
				$_SERVER['REMOTE_ADDR'],
				$_POST['recaptcha_challenge_field'],
				$_POST['recaptcha_response_field']);

		if (!$resp->is_valid) {
			$this->form_validation->set_message('_check_recaptcha', $this->lang->line('auth_incorrect_captcha'));
			return FALSE;
		}
		return TRUE;
	}

	function _create_recaptcha()
	{
		$this->load->helper('recaptcha');

		// Add custom theme so we can get only image
		//$options = "<script>var RecaptchaOptions = {theme: 'custom', custom_theme_widget: 'recaptcha_widget'};</script>\n";
		$options = "<script>var RecaptchaOptions = {theme: 'red'};</script>\n";

		// Get reCAPTCHA JS and non-JS HTML
		$html = recaptcha_get_html($this->config->item('recaptcha_public_key', 'tank_auth'));

		return $options.$html;
	}
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */