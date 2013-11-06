<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Comunidad extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		$this->load->helper(array('form', 'url'));
		$this->load->library('form_validation');
		$this->load->library('security');
		$this->load->library('tank_auth');
		$this->load->library('table');
		$this->lang->load('tank_auth');	
		$this->load->model('comunidad_model');
		$this->load->model('marco_model');
		$this->load->model('tabulados_model');
		$this->load->helper('date');
		date_default_timezone_set('America/Lima');		
	    $tmpl = array ( 'table_open'  => '<table class="table table-bordered table-striped table-submit table-condensed" style="background-color:#fff">' );
	    $this->table->set_template($tmpl);
		if (!$this->tank_auth->is_logged_in()) {
			// redirect('/auth/login/');
			//No loging enviar a bienvenida cenpesco
			redirect('/auth/login/');
		}

		//Check user privileges 
		$roles = $this->tank_auth->get_roles();
		$flag = FALSE;
		foreach ($roles as $role) {
			if($role->role_id == 6 && $role->rolename == 'Tabulados'){
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

	public function texto()
	{
		$texto = $this->input->post('texto');
		$preg = $this->input->post('preg');
		$is_ajax = $this->input->post('ajax');
		if ($is_ajax) {
			if( $this->tabulados_model->get_texto(3,$preg)->num_rows() == 1 ){
					$c_data['user_id'] = $this->tank_auth->get_user_id();
					$c_data['texto'] = $texto;
				$this->tabulados_model->update_texto(3,$preg,$c_data);	
			}else{
					$c_data['user_id'] = $this->tank_auth->get_user_id();
					$c_data['tipo'] = 3;
					$c_data['pregunta'] = $preg;
					$c_data['texto'] = $texto;
				$this->tabulados_model->insert_texto($c_data);	
			}
		}else{
			show_404();
		}			
	}


	public function index()
	{
			$u_id = $this->tank_auth->get_user_id();
			$data['restriccion'] = ( ($u_id == 259) || ($u_id == 266) || ($u_id == 269) ) ? FALSE : TRUE ;
			$data['nav'] = TRUE;
			$data['title'] = 'Tabulados';	
			$data['opcion'] = 200;		
			$data['tables'] = $this->comunidad_model->get_tabulado_200();
			$texto = ($this->tabulados_model->get_texto(3,$data['opcion'])->num_rows() > 0)  ?  $texto = $this->tabulados_model->get_texto(3,$data['opcion'])->row()->texto  :  '';
			$data['texto'] =  $texto; 			
			$data['main_content'] = 'tabulados/comunidad/reporte_200_view';

			$this->load->view('backend/includes/template', $data);		
	}

	public function reporte_201()
	{	
			$u_id = $this->tank_auth->get_user_id();
			$data['restriccion'] = ( ($u_id == 259) || ($u_id == 266) || ($u_id == 269) ) ? FALSE : TRUE ;
			$data['nav'] = TRUE;
			$data['title'] = 'Tabulados';	
			$data['opcion'] = 201;		
			$data['tables'] = $this->comunidad_model->get_tabulado_201();
			$texto = ($this->tabulados_model->get_texto(3,$data['opcion'])->num_rows() > 0)  ?  $texto = $this->tabulados_model->get_texto(3,$data['opcion'])->row()->texto  :  '';
			$data['texto'] =  $texto; 			
			$data['main_content'] = 'tabulados/comunidad/reporte_201_view';

			$this->load->view('backend/includes/template', $data);		
	}


	public function reporte_202()
	{
			$u_id = $this->tank_auth->get_user_id();
			$data['restriccion'] = ( ($u_id == 259) || ($u_id == 266) || ($u_id == 269) ) ? FALSE : TRUE ;			
			$data['nav'] = TRUE;
			$data['title'] = 'Tabulados';	
			$data['opcion'] = 202;		
			$data['tables'] = $this->comunidad_model->get_tabulado_202();
			$texto = ($this->tabulados_model->get_texto(3,$data['opcion'])->num_rows() > 0)  ?  $texto = $this->tabulados_model->get_texto(3,$data['opcion'])->row()->texto  :  '';
			$data['texto'] =  $texto; 			
			$data['main_content'] = 'tabulados/comunidad/reporte_202_view';

			$this->load->view('backend/includes/template', $data);		
	}

	public function reporte_203()
	{
			$u_id = $this->tank_auth->get_user_id();
			$data['restriccion'] = ( ($u_id == 259) || ($u_id == 266) || ($u_id == 269) ) ? FALSE : TRUE ;		
			$data['nav'] = TRUE;
			$data['title'] = 'Tabulados';	
			$data['opcion'] = 203;		
			$data['tables'] = $this->comunidad_model->get_tabulado_203();
			$texto = ($this->tabulados_model->get_texto(3,$data['opcion'])->num_rows() > 0)  ?  $texto = $this->tabulados_model->get_texto(3,$data['opcion'])->row()->texto  :  '';
			$data['texto'] =  $texto; 			
			$data['main_content'] = 'tabulados/comunidad/reporte_203_view';

			$this->load->view('backend/includes/template', $data);		
	}

	public function reporte_204()
	{
			$u_id = $this->tank_auth->get_user_id();
			$data['restriccion'] = ( ($u_id == 259) || ($u_id == 266) || ($u_id == 269) ) ? FALSE : TRUE ;		
			$data['nav'] = TRUE;
			$data['title'] = 'Tabulados';	
			$data['opcion'] = 204;		
			$data['tables'] = $this->comunidad_model->get_tabulado_204();
			$texto = ($this->tabulados_model->get_texto(3,$data['opcion'])->num_rows() > 0)  ?  $texto = $this->tabulados_model->get_texto(3,$data['opcion'])->row()->texto  :  '';
			$data['texto'] =  $texto; 			
			$data['main_content'] = 'tabulados/comunidad/reporte_204_view';

			$this->load->view('backend/includes/template', $data);		
	}

	public function reporte_205()
	{
			$u_id = $this->tank_auth->get_user_id();
			$data['restriccion'] = ( ($u_id == 259) || ($u_id == 266) || ($u_id == 269) ) ? FALSE : TRUE ;		
			$data['nav'] = TRUE;
			$data['title'] = 'Tabulados';	
			$data['opcion'] = 205;		
			$data['tables'] = $this->comunidad_model->get_tabulado_205();
			$texto = ($this->tabulados_model->get_texto(3,$data['opcion'])->num_rows() > 0)  ?  $texto = $this->tabulados_model->get_texto(3,$data['opcion'])->row()->texto  :  '';
			$data['texto'] =  $texto; 			
			$data['main_content'] = 'tabulados/comunidad/reporte_205_view';

			$this->load->view('backend/includes/template', $data);		
	}


	public function reporte_206()
	{
			$u_id = $this->tank_auth->get_user_id();
			$data['restriccion'] = ( ($u_id == 259) || ($u_id == 266) || ($u_id == 269) ) ? FALSE : TRUE ;		
			$data['nav'] = TRUE;
			$data['title'] = 'Tabulados';	
			$data['opcion'] = 206;		
			$data['tables'] = $this->comunidad_model->get_tabulado_206();
			$texto = ($this->tabulados_model->get_texto(3,$data['opcion'])->num_rows() > 0)  ?  $texto = $this->tabulados_model->get_texto(3,$data['opcion'])->row()->texto  :  '';
			$data['texto'] =  $texto; 			
			$data['main_content'] = 'tabulados/comunidad/reporte_206_view';

			$this->load->view('backend/includes/template', $data);		
	}
	public function reporte_207()
	{
			$u_id = $this->tank_auth->get_user_id();
			$data['restriccion'] = ( ($u_id == 259) || ($u_id == 266) || ($u_id == 269) ) ? FALSE : TRUE ;		
			$data['nav'] = TRUE;
			$data['title'] = 'Tabulados';	
			$data['opcion'] = 207;		
			$data['tables'] = $this->comunidad_model->get_tabulado_207();
			$texto = ($this->tabulados_model->get_texto(3,$data['opcion'])->num_rows() > 0)  ?  $texto = $this->tabulados_model->get_texto(3,$data['opcion'])->row()->texto  :  '';
			$data['texto'] =  $texto; 			
			$data['main_content'] = 'tabulados/comunidad/reporte_207_view';

			$this->load->view('backend/includes/template', $data);		
	}
	public function reporte_208()
	{
			$u_id = $this->tank_auth->get_user_id();
			$data['restriccion'] = ( ($u_id == 259) || ($u_id == 266) || ($u_id == 269) ) ? FALSE : TRUE ;		
			$data['nav'] = TRUE;
			$data['title'] = 'Tabulados';	
			$data['opcion'] = 208;		
			$data['tables'] = $this->comunidad_model->get_tabulado_208();
			$texto = ($this->tabulados_model->get_texto(3,$data['opcion'])->num_rows() > 0)  ?  $texto = $this->tabulados_model->get_texto(3,$data['opcion'])->row()->texto  :  '';
			$data['texto'] =  $texto; 			
			$data['main_content'] = 'tabulados/comunidad/reporte_208_view';

			$this->load->view('backend/includes/template', $data);		
	}	
	public function reporte_209()
	{
			$u_id = $this->tank_auth->get_user_id();
			$data['restriccion'] = ( ($u_id == 259) || ($u_id == 266) || ($u_id == 269) ) ? FALSE : TRUE ;		
			$data['nav'] = TRUE;
			$data['title'] = 'Tabulados';	
			$data['opcion'] = 209;		
			$data['tables'] = $this->comunidad_model->get_tabulado_209();
			$texto = ($this->tabulados_model->get_texto(3,$data['opcion'])->num_rows() > 0)  ?  $texto = $this->tabulados_model->get_texto(3,$data['opcion'])->row()->texto  :  '';
			$data['texto'] =  $texto; 			
			$data['main_content'] = 'tabulados/comunidad/reporte_209_view';

			$this->load->view('backend/includes/template', $data);		
	}		

	public function reporte_210()
	{
			$u_id = $this->tank_auth->get_user_id();
			$data['restriccion'] = ( ($u_id == 259) || ($u_id == 266) || ($u_id == 269) ) ? FALSE : TRUE ;		
			$data['nav'] = TRUE;
			$data['title'] = 'Tabulados';	
			$data['opcion'] = 210;		
			$data['tables'] = $this->comunidad_model->get_tabulado_210();
			$texto = ($this->tabulados_model->get_texto(3,$data['opcion'])->num_rows() > 0)  ?  $texto = $this->tabulados_model->get_texto(3,$data['opcion'])->row()->texto  :  '';
			$data['texto'] =  $texto; 			
			$data['main_content'] = 'tabulados/comunidad/reporte_210_view';

			$this->load->view('backend/includes/template', $data);		
	}

	public function reporte_211()
	{
			$u_id = $this->tank_auth->get_user_id();
			$data['restriccion'] = ( ($u_id == 259) || ($u_id == 266) || ($u_id == 269) ) ? FALSE : TRUE ;		
			$data['nav'] = TRUE;
			$data['title'] = 'Tabulados';	
			$data['opcion'] = 211;		
			$data['tables'] = $this->comunidad_model->get_tabulado_211();
			$texto = ($this->tabulados_model->get_texto(3,$data['opcion'])->num_rows() > 0)  ?  $texto = $this->tabulados_model->get_texto(3,$data['opcion'])->row()->texto  :  '';
			$data['texto'] =  $texto; 			
			$data['main_content'] = 'tabulados/comunidad/reporte_211_view';

			$this->load->view('backend/includes/template', $data);		
	}


	public function reporte_212()
	{
			$u_id = $this->tank_auth->get_user_id();
			$data['restriccion'] = ( ($u_id == 259) || ($u_id == 266) || ($u_id == 269) ) ? FALSE : TRUE ;		
			$data['nav'] = TRUE;
			$data['title'] = 'Tabulados';	
			$data['opcion'] = 212;		
			$data['tables'] = $this->comunidad_model->get_tabulado_212();
			$texto = ($this->tabulados_model->get_texto(3,$data['opcion'])->num_rows() > 0)  ?  $texto = $this->tabulados_model->get_texto(3,$data['opcion'])->row()->texto  :  '';
			$data['texto'] =  $texto; 			
			$data['main_content'] = 'tabulados/comunidad/reporte_212_view';

			$this->load->view('backend/includes/template', $data);		
	}

	public function reporte_213()
	{
			$u_id = $this->tank_auth->get_user_id();
			$data['restriccion'] = ( ($u_id == 259) || ($u_id == 266) || ($u_id == 269) ) ? FALSE : TRUE ;		
			$data['nav'] = TRUE;
			$data['title'] = 'Tabulados';	
			$data['opcion'] = 213;		
			$data['tables'] = $this->comunidad_model->get_tabulado_213();
			$texto = ($this->tabulados_model->get_texto(3,$data['opcion'])->num_rows() > 0)  ?  $texto = $this->tabulados_model->get_texto(3,$data['opcion'])->row()->texto  :  '';
			$data['texto'] =  $texto; 			
			$data['main_content'] = 'tabulados/comunidad/reporte_213_view';

			$this->load->view('backend/includes/template', $data);		
	}

	public function reporte_214()
	{
			$u_id = $this->tank_auth->get_user_id();
			$data['restriccion'] = ( ($u_id == 259) || ($u_id == 266) || ($u_id == 269) ) ? FALSE : TRUE ;		
			$data['nav'] = TRUE;
			$data['title'] = 'Tabulados';	
			$data['opcion'] = 214;		
			$data['tables'] = $this->comunidad_model->get_tabulado_214();
			$texto = ($this->tabulados_model->get_texto(3,$data['opcion'])->num_rows() > 0)  ?  $texto = $this->tabulados_model->get_texto(3,$data['opcion'])->row()->texto  :  '';
			$data['texto'] =  $texto; 			
			$data['main_content'] = 'tabulados/comunidad/reporte_214_view';

			$this->load->view('backend/includes/template', $data);		
	}

	public function reporte_215()
	{
			$u_id = $this->tank_auth->get_user_id();
			$data['restriccion'] = ( ($u_id == 259) || ($u_id == 266) || ($u_id == 269) ) ? FALSE : TRUE ;		
			$data['nav'] = TRUE;
			$data['title'] = 'Tabulados';	
			$data['opcion'] = 215;		
			$data['tables'] = $this->comunidad_model->get_tabulado_215();
			$texto = ($this->tabulados_model->get_texto(3,$data['opcion'])->num_rows() > 0)  ?  $texto = $this->tabulados_model->get_texto(3,$data['opcion'])->row()->texto  :  '';
			$data['texto'] =  $texto; 			
			$data['main_content'] = 'tabulados/comunidad/reporte_215_view';

			$this->load->view('backend/includes/template', $data);		
	}


	public function reporte_216()
	{
			$u_id = $this->tank_auth->get_user_id();
			$data['restriccion'] = ( ($u_id == 259) || ($u_id == 266) || ($u_id == 269) ) ? FALSE : TRUE ;		
			$data['nav'] = TRUE;
			$data['title'] = 'Tabulados';	
			$data['opcion'] = 216;		
			$data['tables'] = $this->comunidad_model->get_tabulado_216();
			$texto = ($this->tabulados_model->get_texto(3,$data['opcion'])->num_rows() > 0)  ?  $texto = $this->tabulados_model->get_texto(3,$data['opcion'])->row()->texto  :  '';
			$data['texto'] =  $texto; 			
			$data['main_content'] = 'tabulados/comunidad/reporte_216_view';

			$this->load->view('backend/includes/template', $data);		
	}
	public function reporte_217()
	{
			$u_id = $this->tank_auth->get_user_id();
			$data['restriccion'] = ( ($u_id == 259) || ($u_id == 266) || ($u_id == 269) ) ? FALSE : TRUE ;		
			$data['nav'] = TRUE;
			$data['title'] = 'Tabulados';	
			$data['opcion'] = 217;		
			$data['tables'] = $this->comunidad_model->get_tabulado_217();
			$texto = ($this->tabulados_model->get_texto(3,$data['opcion'])->num_rows() > 0)  ?  $texto = $this->tabulados_model->get_texto(3,$data['opcion'])->row()->texto  :  '';
			$data['texto'] =  $texto; 			
			$data['main_content'] = 'tabulados/comunidad/reporte_217_view';

			$this->load->view('backend/includes/template', $data);		
	}
	public function reporte_218()
	{
			$u_id = $this->tank_auth->get_user_id();
			$data['restriccion'] = ( ($u_id == 259) || ($u_id == 266) || ($u_id == 269) ) ? FALSE : TRUE ;		
			$data['nav'] = TRUE;
			$data['title'] = 'Tabulados';	
			$data['opcion'] = 218;		
			$data['tables'] = $this->comunidad_model->get_tabulado_218();
			$texto = ($this->tabulados_model->get_texto(3,$data['opcion'])->num_rows() > 0)  ?  $texto = $this->tabulados_model->get_texto(3,$data['opcion'])->row()->texto  :  '';
			$data['texto'] =  $texto; 			
			$data['main_content'] = 'tabulados/comunidad/reporte_218_view';

			$this->load->view('backend/includes/template', $data);		
	}	
	public function reporte_219()
	{
			$u_id = $this->tank_auth->get_user_id();
			$data['restriccion'] = ( ($u_id == 259) || ($u_id == 266) || ($u_id == 269) ) ? FALSE : TRUE ;		
			$data['nav'] = TRUE;
			$data['title'] = 'Tabulados';	
			$data['opcion'] = 219;		
			$data['tables'] = $this->comunidad_model->get_tabulado_219();
			$texto = ($this->tabulados_model->get_texto(3,$data['opcion'])->num_rows() > 0)  ?  $texto = $this->tabulados_model->get_texto(3,$data['opcion'])->row()->texto  :  '';
			$data['texto'] =  $texto; 			
			$data['main_content'] = 'tabulados/comunidad/reporte_219_view';

			$this->load->view('backend/includes/template', $data);		
	}	

	public function reporte_220()
	{
			$u_id = $this->tank_auth->get_user_id();
			$data['restriccion'] = ( ($u_id == 259) || ($u_id == 266) || ($u_id == 269) ) ? FALSE : TRUE ;		
			$data['nav'] = TRUE;
			$data['title'] = 'Tabulados';	
			$data['opcion'] = 220;		
			$data['tables'] = $this->comunidad_model->get_tabulado_220();
			$texto = ($this->tabulados_model->get_texto(3,$data['opcion'])->num_rows() > 0)  ?  $texto = $this->tabulados_model->get_texto(3,$data['opcion'])->row()->texto  :  '';
			$data['texto'] =  $texto; 			
			$data['main_content'] = 'tabulados/comunidad/reporte_220_view';

			$this->load->view('backend/includes/template', $data);		
	}

	public function reporte_221()
	{
			$u_id = $this->tank_auth->get_user_id();
			$data['restriccion'] = ( ($u_id == 259) || ($u_id == 266) || ($u_id == 269) ) ? FALSE : TRUE ;		
			$data['nav'] = TRUE;
			$data['title'] = 'Tabulados';	
			$data['opcion'] = 221;		
			$data['tables'] = $this->comunidad_model->get_tabulado_221();
			$texto = ($this->tabulados_model->get_texto(3,$data['opcion'])->num_rows() > 0)  ?  $texto = $this->tabulados_model->get_texto(3,$data['opcion'])->row()->texto  :  '';
			$data['texto'] =  $texto; 			
			$data['main_content'] = 'tabulados/comunidad/reporte_221_view';

			$this->load->view('backend/includes/template', $data);		
	}


	public function reporte_222()
	{
			$u_id = $this->tank_auth->get_user_id();
			$data['restriccion'] = ( ($u_id == 259) || ($u_id == 266) || ($u_id == 269) ) ? FALSE : TRUE ;		
			$data['nav'] = TRUE;
			$data['title'] = 'Tabulados';	
			$data['opcion'] = 222;		
			$data['tables'] = $this->comunidad_model->get_tabulado_222();
			$texto = ($this->tabulados_model->get_texto(3,$data['opcion'])->num_rows() > 0)  ?  $texto = $this->tabulados_model->get_texto(3,$data['opcion'])->row()->texto  :  '';
			$data['texto'] =  $texto; 			
			$data['main_content'] = 'tabulados/comunidad/reporte_222_view';

			$this->load->view('backend/includes/template', $data);		
	}

	public function reporte_223()
	{
			$u_id = $this->tank_auth->get_user_id();
			$data['restriccion'] = ( ($u_id == 259) || ($u_id == 266) || ($u_id == 269) ) ? FALSE : TRUE ;		
			$data['nav'] = TRUE;
			$data['title'] = 'Tabulados';	
			$data['opcion'] = 223;		
			$data['tables'] = $this->comunidad_model->get_tabulado_223();
			$texto = ($this->tabulados_model->get_texto(3,$data['opcion'])->num_rows() > 0)  ?  $texto = $this->tabulados_model->get_texto(3,$data['opcion'])->row()->texto  :  '';
			$data['texto'] =  $texto; 			
			$data['main_content'] = 'tabulados/comunidad/reporte_223_view';

			$this->load->view('backend/includes/template', $data);		
	}

	public function reporte_224()
	{
			$u_id = $this->tank_auth->get_user_id();
			$data['restriccion'] = ( ($u_id == 259) || ($u_id == 266) || ($u_id == 269) ) ? FALSE : TRUE ;		
			$data['nav'] = TRUE;
			$data['title'] = 'Tabulados';	
			$data['opcion'] = 224;		
			$data['tables'] = $this->comunidad_model->get_tabulado_224();
			$texto = ($this->tabulados_model->get_texto(3,$data['opcion'])->num_rows() > 0)  ?  $texto = $this->tabulados_model->get_texto(3,$data['opcion'])->row()->texto  :  '';
			$data['texto'] =  $texto; 			
			$data['main_content'] = 'tabulados/comunidad/reporte_224_view';

			$this->load->view('backend/includes/template', $data);		
	}

	public function reporte_225()
	{
			$u_id = $this->tank_auth->get_user_id();
			$data['restriccion'] = ( ($u_id == 259) || ($u_id == 266) || ($u_id == 269) ) ? FALSE : TRUE ;		
			$data['nav'] = TRUE;
			$data['title'] = 'Tabulados';	
			$data['opcion'] = 225;		
			$data['tables'] = $this->comunidad_model->get_tabulado_225();
			$texto = ($this->tabulados_model->get_texto(3,$data['opcion'])->num_rows() > 0)  ?  $texto = $this->tabulados_model->get_texto(3,$data['opcion'])->row()->texto  :  '';
			$data['texto'] =  $texto; 			
			$data['main_content'] = 'tabulados/comunidad/reporte_225_view';

			$this->load->view('backend/includes/template', $data);		
	}


	public function reporte_226()
	{
			$u_id = $this->tank_auth->get_user_id();
			$data['restriccion'] = ( ($u_id == 259) || ($u_id == 266) || ($u_id == 269) ) ? FALSE : TRUE ;		
			$data['nav'] = TRUE;
			$data['title'] = 'Tabulados';	
			$data['opcion'] = 226;		
			$data['tables'] = $this->comunidad_model->get_tabulado_226();
			$texto = ($this->tabulados_model->get_texto(3,$data['opcion'])->num_rows() > 0)  ?  $texto = $this->tabulados_model->get_texto(3,$data['opcion'])->row()->texto  :  '';
			$data['texto'] =  $texto; 			
			$data['main_content'] = 'tabulados/comunidad/reporte_226_view';

			$this->load->view('backend/includes/template', $data);		
	}
	public function reporte_227()
	{
			$u_id = $this->tank_auth->get_user_id();
			$data['restriccion'] = ( ($u_id == 259) || ($u_id == 266) || ($u_id == 269) ) ? FALSE : TRUE ;		
			$data['nav'] = TRUE;
			$data['title'] = 'Tabulados';	
			$data['opcion'] = 227;		
			$data['tables'] = $this->comunidad_model->get_tabulado_227();
			$texto = ($this->tabulados_model->get_texto(3,$data['opcion'])->num_rows() > 0)  ?  $texto = $this->tabulados_model->get_texto(3,$data['opcion'])->row()->texto  :  '';
			$data['texto'] =  $texto; 			
			$data['main_content'] = 'tabulados/comunidad/reporte_227_view';

			$this->load->view('backend/includes/template', $data);		
	}
	public function reporte_228()
	{
			$u_id = $this->tank_auth->get_user_id();
			$data['restriccion'] = ( ($u_id == 259) || ($u_id == 266) || ($u_id == 269) ) ? FALSE : TRUE ;		
			$data['nav'] = TRUE;
			$data['title'] = 'Tabulados';	
			$data['opcion'] = 228;		
			$data['tables'] = $this->comunidad_model->get_tabulado_228();
			$texto = ($this->tabulados_model->get_texto(3,$data['opcion'])->num_rows() > 0)  ?  $texto = $this->tabulados_model->get_texto(3,$data['opcion'])->row()->texto  :  '';
			$data['texto'] =  $texto; 			
			$data['main_content'] = 'tabulados/comunidad/reporte_228_view';

			$this->load->view('backend/includes/template', $data);		
	}	
	public function reporte_229()
	{
			$u_id = $this->tank_auth->get_user_id();
			$data['restriccion'] = ( ($u_id == 259) || ($u_id == 266) || ($u_id == 269) ) ? FALSE : TRUE ;		
			$data['nav'] = TRUE;
			$data['title'] = 'Tabulados';	
			$data['opcion'] = 229;		
			$data['tables'] = $this->comunidad_model->get_tabulado_229();
			$texto = ($this->tabulados_model->get_texto(3,$data['opcion'])->num_rows() > 0)  ?  $texto = $this->tabulados_model->get_texto(3,$data['opcion'])->row()->texto  :  '';
			$data['texto'] =  $texto; 			
			$data['main_content'] = 'tabulados/comunidad/reporte_229_view';

			$this->load->view('backend/includes/template', $data);		
	}		
	public function reporte_230()
	{
			$u_id = $this->tank_auth->get_user_id();
			$data['restriccion'] = ( ($u_id == 259) || ($u_id == 266) || ($u_id == 269) ) ? FALSE : TRUE ;		
			$data['nav'] = TRUE;
			$data['title'] = 'Tabulados';	
			$data['opcion'] = 230;		
			$data['tables'] = $this->comunidad_model->get_tabulado_230();
			$texto = ($this->tabulados_model->get_texto(3,$data['opcion'])->num_rows() > 0)  ?  $texto = $this->tabulados_model->get_texto(3,$data['opcion'])->row()->texto  :  '';
			$data['texto'] =  $texto; 			
			$data['main_content'] = 'tabulados/comunidad/reporte_230_view';

			$this->load->view('backend/includes/template', $data);		
	}
	public function reporte_231()
	{
			$u_id = $this->tank_auth->get_user_id();
			$data['restriccion'] = ( ($u_id == 259) || ($u_id == 266) || ($u_id == 269) ) ? FALSE : TRUE ;		
			$data['nav'] = TRUE;
			$data['title'] = 'Tabulados';	
			$data['opcion'] = 231;		
			$data['tables'] = $this->comunidad_model->get_tabulado_231();
			$texto = ($this->tabulados_model->get_texto(3,$data['opcion'])->num_rows() > 0)  ?  $texto = $this->tabulados_model->get_texto(3,$data['opcion'])->row()->texto  :  '';
			$data['texto'] =  $texto; 			
			$data['main_content'] = 'tabulados/comunidad/reporte_231_view';

			$this->load->view('backend/includes/template', $data);		
	}	

	public function reporte_232()
	{
			$u_id = $this->tank_auth->get_user_id();
			$data['restriccion'] = ( ($u_id == 259) || ($u_id == 266) || ($u_id == 269) ) ? FALSE : TRUE ;		
			$data['nav'] = TRUE;
			$data['title'] = 'Tabulados';	
			$data['opcion'] = 232;		
			$data['tables'] = $this->comunidad_model->get_tabulado_232();
			$texto = ($this->tabulados_model->get_texto(3,$data['opcion'])->num_rows() > 0)  ?  $texto = $this->tabulados_model->get_texto(3,$data['opcion'])->row()->texto  :  '';
			$data['texto'] =  $texto; 			
			$data['main_content'] = 'tabulados/comunidad/reporte_232_view';

			$this->load->view('backend/includes/template', $data);		
	}	

	public function reporte_233()
	{
			$u_id = $this->tank_auth->get_user_id();
			$data['restriccion'] = ( ($u_id == 259) || ($u_id == 266) || ($u_id == 269) ) ? FALSE : TRUE ;		
			$data['nav'] = TRUE;
			$data['title'] = 'Tabulados';	
			$data['opcion'] = 233;		
			$data['tables'] = $this->comunidad_model->get_tabulado_233();
			$texto = ($this->tabulados_model->get_texto(3,$data['opcion'])->num_rows() > 0)  ?  $texto = $this->tabulados_model->get_texto(3,$data['opcion'])->row()->texto  :  '';
			$data['texto'] =  $texto; 			
			$data['main_content'] = 'tabulados/comunidad/reporte_233_view';

			$this->load->view('backend/includes/template', $data);		
	}
	public function reporte_234()
	{
			$u_id = $this->tank_auth->get_user_id();
			$data['restriccion'] = ( ($u_id == 259) || ($u_id == 266) || ($u_id == 269) ) ? FALSE : TRUE ;		
			$data['nav'] = TRUE;
			$data['title'] = 'Tabulados';	
			$data['opcion'] = 234;		
			$data['tables'] = $this->comunidad_model->get_tabulado_234();
			$texto = ($this->tabulados_model->get_texto(3,$data['opcion'])->num_rows() > 0)  ?  $texto = $this->tabulados_model->get_texto(3,$data['opcion'])->row()->texto  :  '';
			$data['texto'] =  $texto; 			
			$data['main_content'] = 'tabulados/comunidad/reporte_234_view';

			$this->load->view('backend/includes/template', $data);		
	}	

	public function reporte_235()
	{
			$u_id = $this->tank_auth->get_user_id();
			$data['restriccion'] = ( ($u_id == 259) || ($u_id == 266) || ($u_id == 269) ) ? FALSE : TRUE ;		
			$data['nav'] = TRUE;
			$data['title'] = 'Tabulados';	
			$data['opcion'] = 235;		
			$data['tables'] = $this->comunidad_model->get_tabulado_235();
			$texto = ($this->tabulados_model->get_texto(3,$data['opcion'])->num_rows() > 0)  ?  $texto = $this->tabulados_model->get_texto(3,$data['opcion'])->row()->texto  :  '';
			$data['texto'] =  $texto; 			
			$data['main_content'] = 'tabulados/comunidad/reporte_235_view';

			$this->load->view('backend/includes/template', $data);		
	}	

	public function reporte_236()
	{
			$u_id = $this->tank_auth->get_user_id();
			$data['restriccion'] = ( ($u_id == 259) || ($u_id == 266) || ($u_id == 269) ) ? FALSE : TRUE ;		
			$data['nav'] = TRUE;
			$data['title'] = 'Tabulados';	
			$data['opcion'] = 236;		
			$data['tables'] = $this->comunidad_model->get_tabulado_236();
			$texto = ($this->tabulados_model->get_texto(3,$data['opcion'])->num_rows() > 0)  ?  $texto = $this->tabulados_model->get_texto(3,$data['opcion'])->row()->texto  :  '';
			$data['texto'] =  $texto; 			
			$data['main_content'] = 'tabulados/comunidad/reporte_236_view';

			$this->load->view('backend/includes/template', $data);		
	}	
	public function reporte_237()
	{
			$u_id = $this->tank_auth->get_user_id();
			$data['restriccion'] = ( ($u_id == 259) || ($u_id == 266) || ($u_id == 269) ) ? FALSE : TRUE ;		
			$data['nav'] = TRUE;
			$data['title'] = 'Tabulados';	
			$data['opcion'] = 237;		
			$data['tables'] = $this->comunidad_model->get_tabulado_237();
			$texto = ($this->tabulados_model->get_texto(3,$data['opcion'])->num_rows() > 0)  ?  $texto = $this->tabulados_model->get_texto(3,$data['opcion'])->row()->texto  :  '';
			$data['texto'] =  $texto; 			
			$data['main_content'] = 'tabulados/comunidad/reporte_237_view';

			$this->load->view('backend/includes/template', $data);		
	}
	public function reporte_238()
	{
			$u_id = $this->tank_auth->get_user_id();
			$data['restriccion'] = ( ($u_id == 259) || ($u_id == 266) || ($u_id == 269) ) ? FALSE : TRUE ;		
			$data['nav'] = TRUE;
			$data['title'] = 'Tabulados';	
			$data['opcion'] = 238;		
			$data['tables'] = $this->comunidad_model->get_tabulado_238();
			$texto = ($this->tabulados_model->get_texto(3,$data['opcion'])->num_rows() > 0)  ?  $texto = $this->tabulados_model->get_texto(3,$data['opcion'])->row()->texto  :  '';
			$data['texto'] =  $texto; 			
			$data['main_content'] = 'tabulados/comunidad/reporte_238_view';

			$this->load->view('backend/includes/template', $data);		
	}	

	public function reporte_239()
	{
			$u_id = $this->tank_auth->get_user_id();
			$data['restriccion'] = ( ($u_id == 259) || ($u_id == 266) || ($u_id == 269) ) ? FALSE : TRUE ;		
			$data['nav'] = TRUE;
			$data['title'] = 'Tabulados';	
			$data['opcion'] = 239;		
			$data['tables'] = $this->comunidad_model->get_tabulado_239();
			$texto = ($this->tabulados_model->get_texto(3,$data['opcion'])->num_rows() > 0)  ?  $texto = $this->tabulados_model->get_texto(3,$data['opcion'])->row()->texto  :  '';
			$data['texto'] =  $texto; 			
			$data['main_content'] = 'tabulados/comunidad/reporte_239_view';

			$this->load->view('backend/includes/template', $data);		
	}	

	public function reporte_240()
	{
			$u_id = $this->tank_auth->get_user_id();
			$data['restriccion'] = ( ($u_id == 259) || ($u_id == 266) || ($u_id == 269) ) ? FALSE : TRUE ;		
			$data['nav'] = TRUE;
			$data['title'] = 'Tabulados';	
			$data['opcion'] = 240;		
			$data['tables'] = $this->comunidad_model->get_tabulado_240();
			$texto = ($this->tabulados_model->get_texto(3,$data['opcion'])->num_rows() > 0)  ?  $texto = $this->tabulados_model->get_texto(3,$data['opcion'])->row()->texto  :  '';
			$data['texto'] =  $texto; 			
			$data['main_content'] = 'tabulados/comunidad/reporte_240_view';

			$this->load->view('backend/includes/template', $data);		
	}

	public function reporte_241()
	{
			$u_id = $this->tank_auth->get_user_id();
			$data['restriccion'] = ( ($u_id == 259) || ($u_id == 266) || ($u_id == 269) ) ? FALSE : TRUE ;		
			$data['nav'] = TRUE;
			$data['title'] = 'Tabulados';	
			$data['opcion'] = 241;		
			$data['tables'] = $this->comunidad_model->get_tabulado_241();
			$texto = ($this->tabulados_model->get_texto(3,$data['opcion'])->num_rows() > 0)  ?  $texto = $this->tabulados_model->get_texto(3,$data['opcion'])->row()->texto  :  '';
			$data['texto'] =  $texto; 			
			$data['main_content'] = 'tabulados/comunidad/reporte_241_view';

			$this->load->view('backend/includes/template', $data);		
	}

	public function reporte_242()
	{
			$u_id = $this->tank_auth->get_user_id();
			$data['restriccion'] = ( ($u_id == 259) || ($u_id == 266) || ($u_id == 269) ) ? FALSE : TRUE ;		
			$data['nav'] = TRUE;
			$data['title'] = 'Tabulados';	
			$data['opcion'] = 242;		
			$data['tables'] = $this->comunidad_model->get_tabulado_242();
			$texto = ($this->tabulados_model->get_texto(3,$data['opcion'])->num_rows() > 0)  ?  $texto = $this->tabulados_model->get_texto(3,$data['opcion'])->row()->texto  :  '';
			$data['texto'] =  $texto; 			
			$data['main_content'] = 'tabulados/comunidad/reporte_242_view';

			$this->load->view('backend/includes/template', $data);		
	}

	public function reporte_243()
	{
			$u_id = $this->tank_auth->get_user_id();
			$data['restriccion'] = ( ($u_id == 259) || ($u_id == 266) || ($u_id == 269) ) ? FALSE : TRUE ;		
			$data['nav'] = TRUE;
			$data['title'] = 'Tabulados';	
			$data['opcion'] = 243;		
			$data['tables'] = $this->comunidad_model->get_tabulado_243();
			$texto = ($this->tabulados_model->get_texto(3,$data['opcion'])->num_rows() > 0)  ?  $texto = $this->tabulados_model->get_texto(3,$data['opcion'])->row()->texto  :  '';
			$data['texto'] =  $texto; 			
			$data['main_content'] = 'tabulados/comunidad/reporte_243_view';

			$this->load->view('backend/includes/template', $data);		
	}

	public function reporte_244()
	{
			$u_id = $this->tank_auth->get_user_id();
			$data['restriccion'] = ( ($u_id == 259) || ($u_id == 266) || ($u_id == 269) ) ? FALSE : TRUE ;		
			$data['nav'] = TRUE;
			$data['title'] = 'Tabulados';	
			$data['opcion'] = 244;		
			$data['tables'] = $this->comunidad_model->get_tabulado_244();
			$texto = ($this->tabulados_model->get_texto(3,$data['opcion'])->num_rows() > 0)  ?  $texto = $this->tabulados_model->get_texto(3,$data['opcion'])->row()->texto  :  '';
			$data['texto'] =  $texto; 			
			$data['main_content'] = 'tabulados/comunidad/reporte_244_view';

			$this->load->view('backend/includes/template', $data);		
	}

	public function reporte_245()
	{
			$u_id = $this->tank_auth->get_user_id();
			$data['restriccion'] = ( ($u_id == 259) || ($u_id == 266) || ($u_id == 269) ) ? FALSE : TRUE ;		
			$data['nav'] = TRUE;
			$data['title'] = 'Tabulados';	
			$data['opcion'] = 245;		
			$data['tables'] = $this->comunidad_model->get_tabulado_245();
			$texto = ($this->tabulados_model->get_texto(3,$data['opcion'])->num_rows() > 0)  ?  $texto = $this->tabulados_model->get_texto(3,$data['opcion'])->row()->texto  :  '';
			$data['texto'] =  $texto; 			
			$data['main_content'] = 'tabulados/comunidad/reporte_245_view';

			$this->load->view('backend/includes/template', $data);		
	}
	public function reporte_246()
	{
			$u_id = $this->tank_auth->get_user_id();
			$data['restriccion'] = ( ($u_id == 259) || ($u_id == 266) || ($u_id == 269) ) ? FALSE : TRUE ;		
			$data['nav'] = TRUE;
			$data['title'] = 'Tabulados';	
			$data['opcion'] = 246;		
			$data['tables'] = $this->comunidad_model->get_tabulado_246();
			$texto = ($this->tabulados_model->get_texto(3,$data['opcion'])->num_rows() > 0)  ?  $texto = $this->tabulados_model->get_texto(3,$data['opcion'])->row()->texto  :  '';
			$data['texto'] =  $texto; 			
			$data['main_content'] = 'tabulados/comunidad/reporte_246_view';

			$this->load->view('backend/includes/template', $data);		
	}

	public function reporte_247()
	{
			$u_id = $this->tank_auth->get_user_id();
			$data['restriccion'] = ( ($u_id == 259) || ($u_id == 266) || ($u_id == 269) ) ? FALSE : TRUE ;		
			$data['nav'] = TRUE;
			$data['title'] = 'Tabulados';	
			$data['opcion'] = 247;		
			$data['tables'] = $this->comunidad_model->get_tabulado_247();
			$texto = ($this->tabulados_model->get_texto(3,$data['opcion'])->num_rows() > 0)  ?  $texto = $this->tabulados_model->get_texto(3,$data['opcion'])->row()->texto  :  '';
			$data['texto'] =  $texto; 			
			$data['main_content'] = 'tabulados/comunidad/reporte_247_view';

			$this->load->view('backend/includes/template', $data);		
	}

	public function reporte_248()
	{
			$u_id = $this->tank_auth->get_user_id();
			$data['restriccion'] = ( ($u_id == 259) || ($u_id == 266) || ($u_id == 269) ) ? FALSE : TRUE ;		
			$data['nav'] = TRUE;
			$data['title'] = 'Tabulados';	
			$data['opcion'] = 248;		
			$data['tables'] = $this->comunidad_model->get_tabulado_248();
			$texto = ($this->tabulados_model->get_texto(3,$data['opcion'])->num_rows() > 0)  ?  $texto = $this->tabulados_model->get_texto(3,$data['opcion'])->row()->texto  :  '';
			$data['texto'] =  $texto; 			
			$data['main_content'] = 'tabulados/comunidad/reporte_248_view';

			$this->load->view('backend/includes/template', $data);		
	}

	public function reporte_249()
	{
			$u_id = $this->tank_auth->get_user_id();
			$data['restriccion'] = ( ($u_id == 259) || ($u_id == 266) || ($u_id == 269) ) ? FALSE : TRUE ;		
			$data['nav'] = TRUE;
			$data['title'] = 'Tabulados';	
			$data['opcion'] = 249;		
			$data['tables'] = $this->comunidad_model->get_tabulado_249();
			$texto = ($this->tabulados_model->get_texto(3,$data['opcion'])->num_rows() > 0)  ?  $texto = $this->tabulados_model->get_texto(3,$data['opcion'])->row()->texto  :  '';
			$data['texto'] =  $texto; 			
			$data['main_content'] = 'tabulados/comunidad/reporte_249_view';

			$this->load->view('backend/includes/template', $data);		
	}

	public function reporte_250()
	{
			$u_id = $this->tank_auth->get_user_id();
			$data['restriccion'] = ( ($u_id == 259) || ($u_id == 266) || ($u_id == 269) ) ? FALSE : TRUE ;		
			$data['nav'] = TRUE;
			$data['title'] = 'Tabulados';	
			$data['opcion'] = 250;		
			$data['tables'] = $this->comunidad_model->get_tabulado_250();
			$texto = ($this->tabulados_model->get_texto(3,$data['opcion'])->num_rows() > 0)  ?  $texto = $this->tabulados_model->get_texto(3,$data['opcion'])->row()->texto  :  '';
			$data['texto'] =  $texto; 			
			$data['main_content'] = 'tabulados/comunidad/reporte_250_view';

			$this->load->view('backend/includes/template', $data);		
	}

	public function reporte_251()
	{
			$u_id = $this->tank_auth->get_user_id();
			$data['restriccion'] = ( ($u_id == 259) || ($u_id == 266) || ($u_id == 269) ) ? FALSE : TRUE ;		
			$data['nav'] = TRUE;
			$data['title'] = 'Tabulados';	
			$data['opcion'] = 251;		
			$data['tables'] = $this->comunidad_model->get_tabulado_251();
			$texto = ($this->tabulados_model->get_texto(3,$data['opcion'])->num_rows() > 0)  ?  $texto = $this->tabulados_model->get_texto(3,$data['opcion'])->row()->texto  :  '';
			$data['texto'] =  $texto; 			
			$data['main_content'] = 'tabulados/comunidad/reporte_251_view';

			$this->load->view('backend/includes/template', $data);		
	}

	public function reporte_252()
	{
			$u_id = $this->tank_auth->get_user_id();
			$data['restriccion'] = ( ($u_id == 259) || ($u_id == 266) || ($u_id == 269) ) ? FALSE : TRUE ;		
			$data['nav'] = TRUE;
			$data['title'] = 'Tabulados';	
			$data['opcion'] = 252;		
			$data['tables'] = $this->comunidad_model->get_tabulado_252();
			$texto = ($this->tabulados_model->get_texto(3,$data['opcion'])->num_rows() > 0)  ?  $texto = $this->tabulados_model->get_texto(3,$data['opcion'])->row()->texto  :  '';
			$data['texto'] =  $texto; 			
			$data['main_content'] = 'tabulados/comunidad/reporte_252_view';

			$this->load->view('backend/includes/template', $data);		
	}

}
