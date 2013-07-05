<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Tiempos_pescador extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		$this->load->helper(array('form', 'url'));
		$this->load->library('form_validation');
		$this->load->library('security');
		$this->load->library('tank_auth');
		$this->lang->load('tank_auth');	
		$this->load->model('pesca_piloto_model');
		$this->load->model('tiempos_pescador_model');
		date_default_timezone_set('America/Lima');	
		$this->load->helper('date');				
		$this->load->model('ubigeo_piloto_model');

		if (!$this->tank_auth->is_logged_in()) {
			// redirect('/auth/login/');
			//No loging enviar a bienvenida cenpesco
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

		//If not author is BENDER!
		if (!$flag) {
			show_404();
			die();
		}	

	}


	public function index()
	{

		if (!$this->tank_auth->is_logged_in()) {
			redirect('/auth/login/');
		} else {
			$data['nav'] = TRUE;
			$data['title'] = 'Tiempos pescador';	
			$data['main_content'] = 'digitacion/tiempos_pescador_view';
			$data['option'] = 2;
			$data['departamento'] = $this->ubigeo_piloto_model->get_dpto_by_code($this->tank_auth->get_ubigeo()); //PILOTO

			//VALIDA si el CCPP ya fue registrado
			// $dep = $this->input->post('CCDD');
			// $prov = $this->input->post('CCPP');
			// $dist = $this->input->post('CCDI');
			// $ccpp = $this->input->post('COD_CCPP');
			// if($this->tiempos_pescador_model->get_centro_poblado($dep,$prov,$dist,$ccpp) > 0){
			// 	$this->session->set_flashdata('msgbox',3);
			// 	redirect('/digitacion/tiempos_pescador');
			// }



			$this->form_validation->set_rules('NOM_DD_f','DEPARTAMENTO','required|alpha_numeric');
			$this->form_validation->set_rules('CCDD','CODIGO','required|numeric');
			$this->form_validation->set_rules('NOM_PP_f','PROVINCIA','required|alpha_numeric');
			$this->form_validation->set_rules('CCPP','CODIGO','required|numeric');
			$this->form_validation->set_rules('NOM_DI_f','DISTRITO','required|alpha_numeric');
			$this->form_validation->set_rules('CCDI','CODIGO','required|numeric');
			$this->form_validation->set_rules('NOM_CCPP_f','CENTRO POBLADO','required|alpha_numeric');
			$this->form_validation->set_rules('COD_CCPP','CODIGO','required|numeric');
			$this->form_validation->set_rules('N_FORM','FORMULARIO','required|numeric');

			$this->form_validation->set_rules('NOM_OBS','','');
			$this->form_validation->set_rules('NOM_ENC','','');
			$this->form_validation->set_rules('DIA','DIA','numeric');
			$this->form_validation->set_rules('MES','DIA','numeric');
			$this->form_validation->set_rules('RES','DIA','numeric');

			$this->form_validation->set_rules('S1_H_I','HORA INICIAL','numeric');
			$this->form_validation->set_rules('S1_M_I','MINUTO INICIAL','numeric');
			$this->form_validation->set_rules('S1_H_F','HORA FINAL','numeric');
			$this->form_validation->set_rules('S1_M_F','MINUTO INICIAL','numeric');
			$this->form_validation->set_rules('S1_T','HORA INICIAL','numeric');

			$this->form_validation->set_rules('S2_H_I','HORA INICIAL','numeric');
			$this->form_validation->set_rules('S2_M_I','MINUTO INICIAL','numeric');
			$this->form_validation->set_rules('S2_H_F','HORA FINAL','numeric');
			$this->form_validation->set_rules('S2_M_F','MINUTO INICIAL','numeric');
			$this->form_validation->set_rules('S2_T','HORA INICIAL','numeric');
			$this->form_validation->set_rules('S22_2_1','LECTURA','numeric');
			$this->form_validation->set_rules('S22_2_2','COMPRENSION','numeric');
			$this->form_validation->set_rules('S22_2_3','RESPUESTA','numeric');
			$this->form_validation->set_rules('S22_2_4','DELIGENCIAMIENTO','numeric');
			$this->form_validation->set_rules('S22_3_1','LECTURA','numeric');
			$this->form_validation->set_rules('S22_3_2','COMPRENSION','numeric');
			$this->form_validation->set_rules('S22_3_3','RESPUESTA','numeric');
			$this->form_validation->set_rules('S22_3_4','DELIGENCIAMIENTO','numeric');
			$this->form_validation->set_rules('S22_5_1','LECTURA','numeric');
			$this->form_validation->set_rules('S22_5_2','COMPRENSION','numeric');
			$this->form_validation->set_rules('S22_5_3','RESPUESTA','numeric');
			$this->form_validation->set_rules('S22_5_4','DELIGENCIAMIENTO','numeric');
			$this->form_validation->set_rules('S22_9_1','LECTURA','numeric');
			$this->form_validation->set_rules('S22_9_2','COMPRENSION','numeric');
			$this->form_validation->set_rules('S22_9_3','RESPUESTA','numeric');
			$this->form_validation->set_rules('S22_9_4','DELIGENCIAMIENTO','numeric');

			$this->form_validation->set_rules('S3_H_I','HORA INICIAL','numeric');
			$this->form_validation->set_rules('S3_M_I','MINUTO INICIAL','numeric');
			$this->form_validation->set_rules('S3_H_F','HORA FINAL','numeric');
			$this->form_validation->set_rules('S3_M_F','MINUTO INICIAL','numeric');
			$this->form_validation->set_rules('S3_T','HORA INICIAL','numeric');

			$this->form_validation->set_rules('S4_H_I','HORA INICIAL','numeric');
			$this->form_validation->set_rules('S4_M_I','MINUTO INICIAL','numeric');
			$this->form_validation->set_rules('S4_H_F','HORA FINAL','numeric');
			$this->form_validation->set_rules('S4_M_F','MINUTO INICIAL','numeric');
			$this->form_validation->set_rules('S4_T','HORA INICIAL','numeric');

			$this->form_validation->set_rules('S5_H_I','HORA INICIAL','numeric');
			$this->form_validation->set_rules('S5_M_I','MINUTO INICIAL','numeric');
			$this->form_validation->set_rules('S5_H_F','HORA FINAL','numeric');
			$this->form_validation->set_rules('S5_M_F','MINUTO INICIAL','numeric');
			$this->form_validation->set_rules('S5_T','HORA INICIAL','numeric');
			$this->form_validation->set_rules('S5_1_1','LECTURA','numeric');
			$this->form_validation->set_rules('S5_1_2','COMPRENSION','numeric');
			$this->form_validation->set_rules('S5_1_3','RESPUESTA','numeric');
			$this->form_validation->set_rules('S5_1_4','DELIGENCIAMIENTO','numeric');
			$this->form_validation->set_rules('S5_2_1','LECTURA','numeric');
			$this->form_validation->set_rules('S5_2_2','COMPRENSION','numeric');
			$this->form_validation->set_rules('S5_2_3','RESPUESTA','numeric');
			$this->form_validation->set_rules('S5_2_4','DELIGENCIAMIENTO','numeric');
			$this->form_validation->set_rules('S5_5_1','LECTURA','numeric');
			$this->form_validation->set_rules('S5_5_2','COMPRENSION','numeric');
			$this->form_validation->set_rules('S5_5_3','RESPUESTA','numeric');
			$this->form_validation->set_rules('S5_5_4','DELIGENCIAMIENTO','numeric');

			$this->form_validation->set_rules('S6_H_I','HORA INICIAL','numeric');
			$this->form_validation->set_rules('S6_M_I','MINUTO INICIAL','numeric');
			$this->form_validation->set_rules('S6_H_F','HORA FINAL','numeric');
			$this->form_validation->set_rules('S6_M_F','MINUTO INICIAL','numeric');
			$this->form_validation->set_rules('S6_T','HORA INICIAL','numeric');

			$this->form_validation->set_rules('S7_H_I','HORA INICIAL','numeric');
			$this->form_validation->set_rules('S7_M_I','MINUTO INICIAL','numeric');
			$this->form_validation->set_rules('S7_H_F','HORA FINAL','numeric');
			$this->form_validation->set_rules('S7_M_F','MINUTO INICIAL','numeric');
			$this->form_validation->set_rules('S7_T','HORA INICIAL','numeric');
			$this->form_validation->set_rules('S7_3_1','LECTURA','numeric');
			$this->form_validation->set_rules('S7_3_2','COMPRENSION','numeric');
			$this->form_validation->set_rules('S7_3_3','RESPUESTA','numeric');
			$this->form_validation->set_rules('S7_3_4','DELIGENCIAMIENTO','numeric');
			$this->form_validation->set_rules('S7_4_1','LECTURA','numeric');
			$this->form_validation->set_rules('S7_4_2','COMPRENSION','numeric');
			$this->form_validation->set_rules('S7_4_3','RESPUESTA','numeric');
			$this->form_validation->set_rules('S7_4_4','DELIGENCIAMIENTO','numeric');
			$this->form_validation->set_rules('S7_5_1','LECTURA','numeric');
			$this->form_validation->set_rules('S7_5_2','COMPRENSION','numeric');
			$this->form_validation->set_rules('S7_5_3','RESPUESTA','numeric');
			$this->form_validation->set_rules('S7_5_4','DELIGENCIAMIENTO','numeric');

			$this->form_validation->set_rules('S8_H_I','HORA INICIAL','numeric');
			$this->form_validation->set_rules('S8_M_I','MINUTO INICIAL','numeric');
			$this->form_validation->set_rules('S8_H_F','HORA FINAL','numeric');
			$this->form_validation->set_rules('S8_M_F','MINUTO INICIAL','numeric');
			$this->form_validation->set_rules('S8_T','HORA INICIAL','numeric');

			$this->form_validation->set_rules('S8_H_I','HORA INICIAL','numeric');
			$this->form_validation->set_rules('S8_M_I','MINUTO INICIAL','numeric');
			$this->form_validation->set_rules('S8_H_F','HORA FINAL','numeric');
			$this->form_validation->set_rules('S8_M_F','MINUTO INICIAL','numeric');
			$this->form_validation->set_rules('S8_T','HORA INICIAL','numeric');

			$this->form_validation->set_rules('S9_H_I','HORA INICIAL','numeric');
			$this->form_validation->set_rules('S9_M_I','MINUTO INICIAL','numeric');
			$this->form_validation->set_rules('S9_H_F','HORA FINAL','numeric');
			$this->form_validation->set_rules('S9_M_F','MINUTO INICIAL','numeric');
			$this->form_validation->set_rules('S9_T','HORA INICIAL','numeric');
			$this->form_validation->set_rules('S9_7_1','LECTURA','numeric');
			$this->form_validation->set_rules('S9_7_2','COMPRENSION','numeric');
			$this->form_validation->set_rules('S9_7_3','RESPUESTA','numeric');
			$this->form_validation->set_rules('S9_7_4','DELIGENCIAMIENTO','numeric');
			$this->form_validation->set_rules('S9_10_1','LECTURA','numeric');
			$this->form_validation->set_rules('S9_10_2','COMPRENSION','numeric');
			$this->form_validation->set_rules('S9_10_3','RESPUESTA','numeric');
			$this->form_validation->set_rules('S9_10_4','DELIGENCIAMIENTO','numeric');
			$this->form_validation->set_rules('S9_11_1','LECTURA','numeric');
			$this->form_validation->set_rules('S9_11_2','COMPRENSION','numeric');
			$this->form_validation->set_rules('S9_11_3','RESPUESTA','numeric');
			$this->form_validation->set_rules('S9_11_4','DELIGENCIAMIENTO','numeric');
			$this->form_validation->set_rules('S9_12_1','LECTURA','numeric');
			$this->form_validation->set_rules('S9_12_2','COMPRENSION','numeric');
			$this->form_validation->set_rules('S9_12_3','RESPUESTA','numeric');
			$this->form_validation->set_rules('S9_12_4','DELIGENCIAMIENTO','numeric');

			$this->form_validation->set_rules('T_ENT','TOTAL ENTREVISTA','numeric');
			$this->form_validation->set_rules('OBS','OBSERVACION','');



	        if ($this->form_validation->run() === TRUE) {

	    		$registros = array(
					
			'NOM_DD'	=> $this->input->post('NOM_DD'),
			'CCDD'		=> $this->input->post('CCDD'),
			'NOM_PP'	=> $this->input->post('NOM_PP'),
			'CCPP'		=> $this->input->post('CCPP'),
			'NOM_DI'	=> $this->input->post('NOM_DI'),
			'CCDI'		=> $this->input->post('CCDI'),
			'NOM_CCPP'	=> $this->input->post('NOM_CCPP'),
			'COD_CCPP'	=> $this->input->post('COD_CCPP'),
			'N_FORM'	=> $this->input->post('N_FORM'),

			'NOM_OBS' 	=> strtoupper($this->input->post('NOM_OBS')),
			'NOM_ENC' 	=> strtoupper($this->input->post('NOM_ENC')),
			'DIA' 		=> $this->input->post('DIA'),
			'MES' 		=> $this->input->post('MES'),
			'RES' 		=> $this->input->post('RES'),

			'S1_H_I'	=> $this->input->post('S1_H_I'),
			'S1_M_I'	=> $this->input->post('S1_M_I'),
			'S1_H_F'	=> $this->input->post('S1_H_F'),
			'S1_M_F'	=> $this->input->post('S1_M_F'),
			'S1_T'		=> $this->input->post('S1_T'),

			'S2_H_I'	=> $this->input->post('S2_H_I'),
			'S2_M_I'	=> $this->input->post('S2_M_I'),
			'S2_H_F'	=> $this->input->post('S2_H_F'),
			'S2_M_F'	=> $this->input->post('S2_M_F'),
			'S2_T'		=> $this->input->post('S2_T'),
			'S22_2_1'	=> $this->input->post('S22_2_1'),
			'S22_2_2'	=> $this->input->post('S22_2_2'),
			'S22_2_3'	=> $this->input->post('S22_2_3'),
			'S22_2_4'	=> $this->input->post('S22_2_4'),
			'S22_3_1'	=> $this->input->post('S22_3_1'),
			'S22_3_2'	=> $this->input->post('S22_3_2'),
			'S22_3_3'	=> $this->input->post('S22_3_3'),
			'S22_3_4'	=> $this->input->post('S22_3_4'),
			'S22_5_1'	=> $this->input->post('S22_5_1'),
			'S22_5_2'	=> $this->input->post('S22_5_2'),
			'S22_5_3'	=> $this->input->post('S22_5_3'),
			'S22_5_4'	=> $this->input->post('S22_5_4'),
			'S22_9_1'	=> $this->input->post('S22_9_1'),
			'S22_9_2'	=> $this->input->post('S22_9_2'),
			'S22_9_3'	=> $this->input->post('S22_9_3'),
			'S22_9_4'	=> $this->input->post('S22_9_4'),

			'S3_H_I'	=> $this->input->post('S3_H_I'),
			'S3_M_I'	=> $this->input->post('S3_M_I'),
			'S3_H_F'	=> $this->input->post('S3_H_F'),
			'S3_M_F'	=> $this->input->post('S3_M_F'),
			'S3_T'		=> $this->input->post('S3_T'),

			'S4_H_I'	=> $this->input->post('S4_H_I'),
			'S4_M_I'	=> $this->input->post('S4_M_I'),
			'S4_H_F'	=> $this->input->post('S4_H_F'),
			'S4_M_F'	=> $this->input->post('S4_M_F'),
			'S4_T'		=> $this->input->post('S4_T'),

			'S5_H_I'	=> $this->input->post('S5_H_I'),
			'S5_M_I'	=> $this->input->post('S5_M_I'),
			'S5_H_F'	=> $this->input->post('S5_H_F'),
			'S5_M_F'	=> $this->input->post('S5_M_F'),
			'S5_T'		=> $this->input->post('S5_T'),
			'S5_1_1'	=> $this->input->post('S5_1_1'),
			'S5_1_2'	=> $this->input->post('S5_1_2'),
			'S5_1_3'	=> $this->input->post('S5_1_3'),
			'S5_1_4'	=> $this->input->post('S5_1_4'),
			'S5_2_1'	=> $this->input->post('S5_2_1'),
			'S5_2_2'	=> $this->input->post('S5_2_2'),
			'S5_2_3'	=> $this->input->post('S5_2_3'),
			'S5_2_4'	=> $this->input->post('S5_2_4'),
			'S5_5_1'	=> $this->input->post('S5_5_1'),
			'S5_5_2'	=> $this->input->post('S5_5_2'),
			'S5_5_3'	=> $this->input->post('S5_5_3'),
			'S5_5_4'	=> $this->input->post('S5_5_4'),

			'S6_H_I'	=> $this->input->post('S6_H_I'),
			'S6_M_I'	=> $this->input->post('S6_M_I'),
			'S6_H_F'	=> $this->input->post('S6_H_F'),
			'S6_M_F'	=> $this->input->post('S6_M_F'),
			'S6_T'		=> $this->input->post('S6_T'),

			'S7_H_I'	=> $this->input->post('S7_H_I'),
			'S7_M_I'	=> $this->input->post('S7_M_I'),
			'S7_H_F'	=> $this->input->post('S7_H_F'),
			'S7_M_F'	=> $this->input->post('S7_M_F'),
			'S7_T'		=> $this->input->post('S7_T'),
			'S7_3_1'	=> $this->input->post('S7_3_1'),
			'S7_3_2'	=> $this->input->post('S7_3_2'),
			'S7_3_3'	=> $this->input->post('S7_3_3'),
			'S7_3_4'	=> $this->input->post('S7_3_4'),
			'S7_4_1'	=> $this->input->post('S7_4_1'),
			'S7_4_2'	=> $this->input->post('S7_4_2'),
			'S7_4_3'	=> $this->input->post('S7_4_3'),
			'S7_4_4'	=> $this->input->post('S7_4_4'),
			'S7_5_1'	=> $this->input->post('S7_5_1'),
			'S7_5_2'	=> $this->input->post('S7_5_2'),
			'S7_5_3'	=> $this->input->post('S7_5_3'),
			'S7_5_4'	=> $this->input->post('S7_5_4'),

			'S8_H_I'	=> $this->input->post('S8_H_I'),
			'S8_M_I'	=> $this->input->post('S8_M_I'),
			'S8_H_F'	=> $this->input->post('S8_H_F'),
			'S8_M_F'	=> $this->input->post('S8_M_F'),
			'S8_T'		=> $this->input->post('S8_T'),

			'S9_H_I'	=> $this->input->post('S9_H_I'),
			'S9_M_I'	=> $this->input->post('S9_M_I'),
			'S9_H_F'	=> $this->input->post('S9_H_F'),
			'S9_M_F'	=> $this->input->post('S9_M_F'),
			'S9_T'		=> $this->input->post('S9_T'),
			'S9_7_1'	=> $this->input->post('S9_7_1'),
			'S9_7_2'	=> $this->input->post('S9_7_2'),
			'S9_7_3'	=> $this->input->post('S9_7_3'),
			'S9_7_4'	=> $this->input->post('S9_7_4'),
			'S9_10_1'	=> $this->input->post('S9_10_1'),
			'S9_10_2'	=> $this->input->post('S9_10_2'),
			'S9_10_3'	=> $this->input->post('S9_10_3'),
			'S9_10_4'	=> $this->input->post('S9_10_4'),
			'S9_11_1'	=> $this->input->post('S9_11_1'),
			'S9_11_2'	=> $this->input->post('S9_11_2'),
			'S9_11_3'	=> $this->input->post('S9_11_3'),
			'S9_11_4'	=> $this->input->post('S9_11_4'),
			'S9_12_1'	=> $this->input->post('S9_12_1'),
			'S9_12_2'	=> $this->input->post('S9_12_2'),
			'S9_12_3'	=> $this->input->post('S9_12_3'),
			'S9_12_4'	=> $this->input->post('S9_12_4'),

			'T_ENT'		=> $this->input->post('T_ENT'),
			'OBS'		=> $this->input->post('OBS'),
			'USUARIO'		=> $this->tank_auth->get_user_id(),
			'FECHA'			=> date('y-m-d H:i:s',now())
	
					);
			$afectados = $this->tiempos_pescador_model->insert_registro_pescadores($registros);
				if ($afectados > 0){
					$this->session->set_flashdata('msgbox',1);
				}elseif ($afectados === 0) {
					$this->session->set_flashdata('msgbox',2);
				}
				
				redirect('/digitacion/tiempos_pescador');

			}
	        else{
	 			$data['datos'] = $this->form_validation->error_array();
        		$this->load->view('backend/includes/template', $data);	        					
	        }




		}

	}

	public function report_excel()
	{
		$this->load->helper('excel');
		$query = $this->tiempos_pescador_model->get_todo();
		to_excel($query,'Pescador_tiempos');
	}

}

