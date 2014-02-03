<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Pescador extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		$this->load->helper(array('form', 'url'));
		$this->load->library('form_validation');
		$this->load->library('security');
		$this->load->library('tank_auth');
		$this->load->library('table');
		$this->lang->load('tank_auth');	
		$this->load->model('tabulados_model');
		$this->load->model('marco_model');
		$this->load->model('ubigeo_model');
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
		//dando restricciones para los comentarios 
	    $u_id = $this->tank_auth->get_user_id();
	    $this->restriccion = ( ($u_id == 259) || ($u_id == 266) || ($u_id == 269) || ($u_id == 262) || ($u_id == 267) || ($u_id == 258) || ($u_id == 260) ) ? FALSE : TRUE ;


	}
	public function texto()
	{
		$texto = $this->input->post('texto');
		$texto_2 = $this->input->post('texto_2');
		$preg = $this->input->post('preg');
		$is_ajax = $this->input->post('ajax');
		if ($is_ajax) {
			if( !is_null($this->tabulados_model->get_texto(1,$preg)->row()->texto) ){
					$c_data['user_id'] = $this->tank_auth->get_user_id();
					$c_data['texto'] = $texto;
					$c_data['texto_2'] = $texto_2;
				$this->tabulados_model->update_texto(1,$preg,$c_data);	
			}else{
					$c_data['user_id'] = $this->tank_auth->get_user_id();
					$c_data['pregunta'] = $preg;
					$c_data['tipo'] = 1;
					$c_data['texto'] = $texto;				
					$c_data['texto_2'] = $texto_2;				
				$this->tabulados_model->insert_texto($c_data);	
			}
		}else{
			show_404();;
		}			
	}

	public function metadata()
	{
		$txt_tabulado 		= $this->input->post('txt_tabulado');
		$txt_contenido 		= $this->input->post('txt_contenido');
		$txt_casos 			= $this->input->post('txt_casos');
		$txt_variables 		= $this->input->post('txt_variables');
		$txt_alternativas 	= $this->input->post('txt_alternativas');
		$txt_otro 			= $this->input->post('txt_otro');
		$txt_faltantes 		= $this->input->post('txt_faltantes');
		$txt_productor 		= $this->input->post('txt_productor');
		$txt_definiciones 	= $this->input->post('txt_definiciones');		
		$preg 				= $this->input->post('preg');
		$is_ajax = $this->input->post('ajax');
		if ($is_ajax) {//modifica
			if( $this->tabulados_model->get_metadata(1,$preg)->num_rows() == 1 ){
					$c_data['tabulado'] 	= ($txt_tabulado == '') ? NULL : $txt_tabulado;
					$c_data['contenido'] 	= ($txt_contenido == '') ? NULL : $txt_contenido;
					$c_data['casos'] 		= ($txt_casos == '') ? NULL : $txt_casos;
					$c_data['variable'] 	= ($txt_variables == '') ? NULL : $txt_variables;
					$c_data['alternativas'] = ($txt_alternativas == '') ? NULL : $txt_alternativas;
					$c_data['otro'] 		= ($txt_otro == '') ? NULL : $txt_otro;
					$c_data['faltantes'] 	= ($txt_faltantes == '') ? NULL : $txt_faltantes;
					$c_data['productor'] 	= ($txt_productor == '') ? NULL : $txt_productor;
					$c_data['definiciones'] = ($txt_definiciones == '') ? NULL : $txt_definiciones;
					$c_data['last_modified']= date('Y-m-d H:i:s');
					$c_data['last_user_id'] = $this->tank_auth->get_user_id();					
				$this->tabulados_model->update_metadata(1,$preg,$c_data);	
			}else{//inserta nuevo
					$c_data['tipo'] 		= 1;
					$c_data['pregunta'] 	= $preg;
					$c_data['tabulado'] 	= ($txt_tabulado == '') ? NULL : $txt_tabulado;
					$c_data['contenido'] 	= ($txt_contenido == '') ? NULL : $txt_contenido;
					$c_data['casos'] 		= ($txt_casos == '') ? NULL : $txt_casos;
					$c_data['variable'] 	= ($txt_variables == '') ? NULL : $txt_variables;
					$c_data['alternativas'] = ($txt_alternativas == '') ? NULL : $txt_alternativas;
					$c_data['otro'] 		= ($txt_otro == '') ? NULL : $txt_otro;
					$c_data['faltantes'] 	= ($txt_faltantes == '') ? NULL : $txt_faltantes;
					$c_data['productor'] 	= ($txt_productor == '') ? NULL : $txt_productor;
					$c_data['definiciones'] = ($txt_definiciones == '') ? NULL : $txt_definiciones;
					$c_data['user_id'] 		= $this->tank_auth->get_user_id();
				$this->tabulados_model->insert_metadata($c_data);	
			}
		}else{
			show_404();;
		}			
	}


	public function reporte1()
	{
			$data['restriccion'] = $this->restriccion ;
			$data['nav'] = TRUE;
			$data['title'] = 'Tabulados Pescador';	
			$data['nom_tabulados'] = $this->tabulados_model->get_nombre_tabulados();
			$data['opcion'] = 1;		
			$data['tables'] = $this->tabulados_model->get_report1();

			$texto = ($this->tabulados_model->get_texto(1,$data['opcion'])->num_rows() > 0)  ?  $texto = $this->tabulados_model->get_texto(1,$data['opcion'])->row()->texto  :  '';
			$data['texto'] =  $texto; 
			$texto_2 = ($this->tabulados_model->get_texto(1,$data['opcion'])->num_rows() > 0)  ?  $texto_2 = $this->tabulados_model->get_texto(1,$data['opcion'])->row()->texto_2  :  '';
			$data['texto_2'] =  $texto_2; 
			$data['nombres_mapa'] = $this->tabulados_model->get_nombre_mapa($data['opcion']); // nombre de los tabulados
			$data['respuesta_unica'] = $this->tabulados_model->get_tipo_respuesta($data['opcion']);

			$metadata = $this->tabulados_model->get_metadata(1,$data['opcion']); 
			$data['txt_tabulado'] 	= ( $metadata->num_rows()==1 )  ?  $metadata->row()->tabulado  :  ''; 
			$data['txt_contenido'] 	= ( $metadata->num_rows()==1 )  ?  $metadata->row()->contenido  :  ''; 
			$data['txt_casos'] 		= ( $metadata->num_rows()==1 )  ?  $metadata->row()->casos  :  ''; 
			$data['txt_variables'] 	= ( $metadata->num_rows()==1 )  ?  $metadata->row()->variable  :  ''; 
			$data['txt_alternativas'] = ( $metadata->num_rows()==1 )  ?  $metadata->row()->alternativas  :  ''; 
			$data['txt_otro'] 		= ( $metadata->num_rows()==1 )  ?  $metadata->row()->otro  :  ''; 
			$data['txt_faltantes'] 	= ( $metadata->num_rows()==1 )  ?  $metadata->row()->faltantes  :  ''; 
			$data['txt_productor'] 	= ( $metadata->num_rows()==1 )  ?  $metadata->row()->productor :  ''; 
			$data['txt_definiciones'] = ( $metadata->num_rows()==1 )  ?  $metadata->row()->definiciones  :  '';	

			$data['main_content'] = 'tabulados/pescador/reporte1_view';

			$this->load->view('backend/includes/template', $data);		
	}


	public function reporte2()
	{
			$data['restriccion'] = $this->restriccion ;
			$data['nav'] = TRUE;
			$data['title'] = 'Tabulados Pescador';	
			$data['nom_tabulados'] = $this->tabulados_model->get_nombre_tabulados();
			$data['opcion'] = 2;		
			$data['tables'] = $this->tabulados_model->get_report2();

			$texto = ($this->tabulados_model->get_texto(1,$data['opcion'])->num_rows() > 0)  ?  $texto = $this->tabulados_model->get_texto(1,$data['opcion'])->row()->texto  :  '';
			$data['texto'] =  $texto; 
			$texto_2 = ($this->tabulados_model->get_texto(1,$data['opcion'])->num_rows() > 0)  ?  $texto_2 = $this->tabulados_model->get_texto(1,$data['opcion'])->row()->texto_2  :  '';
			$data['texto_2'] =  $texto_2; 
			$data['nombres_mapa'] = $this->tabulados_model->get_nombre_mapa($data['opcion']); // nombre de los tabulados
			$data['respuesta_unica'] = $this->tabulados_model->get_tipo_respuesta($data['opcion']);

			$metadata = $this->tabulados_model->get_metadata(1,$data['opcion']); 
			$data['txt_tabulado'] 	= ( $metadata->num_rows()==1 )  ?  $metadata->row()->tabulado  :  ''; 
			$data['txt_contenido'] 	= ( $metadata->num_rows()==1 )  ?  $metadata->row()->contenido  :  ''; 
			$data['txt_casos'] 		= ( $metadata->num_rows()==1 )  ?  $metadata->row()->casos  :  ''; 
			$data['txt_variables'] 	= ( $metadata->num_rows()==1 )  ?  $metadata->row()->variable  :  ''; 
			$data['txt_alternativas'] = ( $metadata->num_rows()==1 )  ?  $metadata->row()->alternativas  :  ''; 
			$data['txt_otro'] 		= ( $metadata->num_rows()==1 )  ?  $metadata->row()->otro  :  ''; 
			$data['txt_faltantes'] 	= ( $metadata->num_rows()==1 )  ?  $metadata->row()->faltantes  :  ''; 
			$data['txt_productor'] 	= ( $metadata->num_rows()==1 )  ?  $metadata->row()->productor :  ''; 
			$data['txt_definiciones'] = ( $metadata->num_rows()==1 )  ?  $metadata->row()->definiciones  :  '';	

			$data['main_content'] = 'tabulados/pescador/reporte2_view';

			$this->load->view('backend/includes/template', $data);		
	}

	public function reporte3()
	{
			$data['restriccion'] = $this->restriccion ;
			$data['nav'] = TRUE;
			$data['title'] = 'Tabulados Pescador';	
			$data['nom_tabulados'] = $this->tabulados_model->get_nombre_tabulados();
			$data['opcion'] = 3;		
			$data['tables'] = $this->tabulados_model->get_report3();

			$texto = ($this->tabulados_model->get_texto(1,$data['opcion'])->num_rows() > 0)  ?  $texto = $this->tabulados_model->get_texto(1,$data['opcion'])->row()->texto  :  '';
			$data['texto'] =  $texto; 
			$texto_2 = ($this->tabulados_model->get_texto(1,$data['opcion'])->num_rows() > 0)  ?  $texto_2 = $this->tabulados_model->get_texto(1,$data['opcion'])->row()->texto_2  :  '';
			$data['texto_2'] =  $texto_2; 
			$data['nombres_mapa'] = $this->tabulados_model->get_nombre_mapa($data['opcion']); // nombre de los tabulados
			$data['respuesta_unica'] = $this->tabulados_model->get_tipo_respuesta($data['opcion']);

			$metadata = $this->tabulados_model->get_metadata(1,$data['opcion']); 
			$data['txt_tabulado'] 	= ( $metadata->num_rows()==1 )  ?  $metadata->row()->tabulado  :  ''; 
			$data['txt_contenido'] 	= ( $metadata->num_rows()==1 )  ?  $metadata->row()->contenido  :  ''; 
			$data['txt_casos'] 		= ( $metadata->num_rows()==1 )  ?  $metadata->row()->casos  :  ''; 
			$data['txt_variables'] 	= ( $metadata->num_rows()==1 )  ?  $metadata->row()->variable  :  ''; 
			$data['txt_alternativas'] = ( $metadata->num_rows()==1 )  ?  $metadata->row()->alternativas  :  ''; 
			$data['txt_otro'] 		= ( $metadata->num_rows()==1 )  ?  $metadata->row()->otro  :  ''; 
			$data['txt_faltantes'] 	= ( $metadata->num_rows()==1 )  ?  $metadata->row()->faltantes  :  ''; 
			$data['txt_productor'] 	= ( $metadata->num_rows()==1 )  ?  $metadata->row()->productor :  ''; 
			$data['txt_definiciones'] = ( $metadata->num_rows()==1 )  ?  $metadata->row()->definiciones  :  '';	

			$data['main_content'] = 'tabulados/pescador/reporte3_view';

			$this->load->view('backend/includes/template', $data);	
	}

	public function reporte4()
	{
			$data['restriccion'] = $this->restriccion ;
			$data['nav'] = TRUE;
			$data['title'] = 'Tabulados Pescador';	
			$data['nom_tabulados'] = $this->tabulados_model->get_nombre_tabulados();
			$data['opcion'] = 4;		
			$data['tables'] = $this->tabulados_model->get_report4();

			$texto = ($this->tabulados_model->get_texto(1,$data['opcion'])->num_rows() > 0)  ?  $texto = $this->tabulados_model->get_texto(1,$data['opcion'])->row()->texto  :  '';
			$data['texto'] =  $texto; 
			$texto_2 = ($this->tabulados_model->get_texto(1,$data['opcion'])->num_rows() > 0)  ?  $texto_2 = $this->tabulados_model->get_texto(1,$data['opcion'])->row()->texto_2  :  '';
			$data['texto_2'] =  $texto_2; 
			$data['nombres_mapa'] = $this->tabulados_model->get_nombre_mapa($data['opcion']); // nombre de los tabulados
			$data['respuesta_unica'] = $this->tabulados_model->get_tipo_respuesta($data['opcion']);

			$metadata = $this->tabulados_model->get_metadata(1,$data['opcion']); 
			$data['txt_tabulado'] 	= ( $metadata->num_rows()==1 )  ?  $metadata->row()->tabulado  :  ''; 
			$data['txt_contenido'] 	= ( $metadata->num_rows()==1 )  ?  $metadata->row()->contenido  :  ''; 
			$data['txt_casos'] 		= ( $metadata->num_rows()==1 )  ?  $metadata->row()->casos  :  ''; 
			$data['txt_variables'] 	= ( $metadata->num_rows()==1 )  ?  $metadata->row()->variable  :  ''; 
			$data['txt_alternativas'] = ( $metadata->num_rows()==1 )  ?  $metadata->row()->alternativas  :  ''; 
			$data['txt_otro'] 		= ( $metadata->num_rows()==1 )  ?  $metadata->row()->otro  :  ''; 
			$data['txt_faltantes'] 	= ( $metadata->num_rows()==1 )  ?  $metadata->row()->faltantes  :  ''; 
			$data['txt_productor'] 	= ( $metadata->num_rows()==1 )  ?  $metadata->row()->productor :  ''; 
			$data['txt_definiciones'] = ( $metadata->num_rows()==1 )  ?  $metadata->row()->definiciones  :  '';	

			$data['main_content'] = 'tabulados/pescador/reporte4_view';

			$this->load->view('backend/includes/template', $data);	
	}

	public function reporte5()
	{
			$data['restriccion'] = $this->restriccion ;
			$data['nav'] = TRUE;
			$data['title'] = 'Tabulados Pescador';	
			$data['nom_tabulados'] = $this->tabulados_model->get_nombre_tabulados();
			$data['opcion'] = 5;		
			$data['tables'] = $this->tabulados_model->get_report5();

			$texto = ($this->tabulados_model->get_texto(1,$data['opcion'])->num_rows() > 0)  ?  $texto = $this->tabulados_model->get_texto(1,$data['opcion'])->row()->texto  :  '';
			$data['texto'] =  $texto; 
			$texto_2 = ($this->tabulados_model->get_texto(1,$data['opcion'])->num_rows() > 0)  ?  $texto_2 = $this->tabulados_model->get_texto(1,$data['opcion'])->row()->texto_2  :  '';
			$data['texto_2'] =  $texto_2; 
			$data['nombres_mapa'] = $this->tabulados_model->get_nombre_mapa($data['opcion']); // nombre de los tabulados
			$data['respuesta_unica'] = $this->tabulados_model->get_tipo_respuesta($data['opcion']);

			$metadata = $this->tabulados_model->get_metadata(1,$data['opcion']); 
			$data['txt_tabulado'] 	= ( $metadata->num_rows()==1 )  ?  $metadata->row()->tabulado  :  ''; 
			$data['txt_contenido'] 	= ( $metadata->num_rows()==1 )  ?  $metadata->row()->contenido  :  ''; 
			$data['txt_casos'] 		= ( $metadata->num_rows()==1 )  ?  $metadata->row()->casos  :  ''; 
			$data['txt_variables'] 	= ( $metadata->num_rows()==1 )  ?  $metadata->row()->variable  :  ''; 
			$data['txt_alternativas'] = ( $metadata->num_rows()==1 )  ?  $metadata->row()->alternativas  :  ''; 
			$data['txt_otro'] 		= ( $metadata->num_rows()==1 )  ?  $metadata->row()->otro  :  ''; 
			$data['txt_faltantes'] 	= ( $metadata->num_rows()==1 )  ?  $metadata->row()->faltantes  :  ''; 
			$data['txt_productor'] 	= ( $metadata->num_rows()==1 )  ?  $metadata->row()->productor :  ''; 
			$data['txt_definiciones'] = ( $metadata->num_rows()==1 )  ?  $metadata->row()->definiciones  :  '';	

			$data['main_content'] = 'tabulados/pescador/reporte5_view';

			$this->load->view('backend/includes/template', $data);	
	}


	public function reporte6()
	{
			$data['restriccion'] = $this->restriccion ;
			$data['nav'] = TRUE;
			$data['title'] = 'Tabulados Pescador';	
			$data['nom_tabulados'] = $this->tabulados_model->get_nombre_tabulados();
			$data['opcion'] = 6;		
			$data['tables'] = $this->tabulados_model->get_report6();

			$texto = ($this->tabulados_model->get_texto(1,$data['opcion'])->num_rows() > 0)  ?  $texto = $this->tabulados_model->get_texto(1,$data['opcion'])->row()->texto  :  '';
			$data['texto'] =  $texto; 
			$texto_2 = ($this->tabulados_model->get_texto(1,$data['opcion'])->num_rows() > 0)  ?  $texto_2 = $this->tabulados_model->get_texto(1,$data['opcion'])->row()->texto_2  :  '';
			$data['texto_2'] =  $texto_2; 
			$data['nombres_mapa'] = $this->tabulados_model->get_nombre_mapa($data['opcion']); // nombre de los tabulados
			$data['respuesta_unica'] = $this->tabulados_model->get_tipo_respuesta($data['opcion']);

			$metadata = $this->tabulados_model->get_metadata(1,$data['opcion']); 
			$data['txt_tabulado'] 	= ( $metadata->num_rows()==1 )  ?  $metadata->row()->tabulado  :  ''; 
			$data['txt_contenido'] 	= ( $metadata->num_rows()==1 )  ?  $metadata->row()->contenido  :  ''; 
			$data['txt_casos'] 		= ( $metadata->num_rows()==1 )  ?  $metadata->row()->casos  :  ''; 
			$data['txt_variables'] 	= ( $metadata->num_rows()==1 )  ?  $metadata->row()->variable  :  ''; 
			$data['txt_alternativas'] = ( $metadata->num_rows()==1 )  ?  $metadata->row()->alternativas  :  ''; 
			$data['txt_otro'] 		= ( $metadata->num_rows()==1 )  ?  $metadata->row()->otro  :  ''; 
			$data['txt_faltantes'] 	= ( $metadata->num_rows()==1 )  ?  $metadata->row()->faltantes  :  ''; 
			$data['txt_productor'] 	= ( $metadata->num_rows()==1 )  ?  $metadata->row()->productor :  ''; 
			$data['txt_definiciones'] = ( $metadata->num_rows()==1 )  ?  $metadata->row()->definiciones  :  '';	

			$data['main_content'] = 'tabulados/pescador/reporte6_view';

			$this->load->view('backend/includes/template', $data);	
	}

	public function reporte7()
	{
			$data['restriccion'] = $this->restriccion ;
			$data['nav'] = TRUE;
			$data['title'] = 'Tabulados Pescador';	
			$data['nom_tabulados'] = $this->tabulados_model->get_nombre_tabulados();
			$data['opcion'] = 7;		
			$data['tables'] = $this->tabulados_model->get_report7();

			$texto = ($this->tabulados_model->get_texto(1,$data['opcion'])->num_rows() > 0)  ?  $texto = $this->tabulados_model->get_texto(1,$data['opcion'])->row()->texto  :  '';
			$data['texto'] =  $texto; 
			$texto_2 = ($this->tabulados_model->get_texto(1,$data['opcion'])->num_rows() > 0)  ?  $texto_2 = $this->tabulados_model->get_texto(1,$data['opcion'])->row()->texto_2  :  '';
			$data['texto_2'] =  $texto_2; 
			$data['nombres_mapa'] = $this->tabulados_model->get_nombre_mapa($data['opcion']); // nombre de los tabulados
			$data['respuesta_unica'] = $this->tabulados_model->get_tipo_respuesta($data['opcion']);

			$metadata = $this->tabulados_model->get_metadata(1,$data['opcion']); 
			$data['txt_tabulado'] 	= ( $metadata->num_rows()==1 )  ?  $metadata->row()->tabulado  :  ''; 
			$data['txt_contenido'] 	= ( $metadata->num_rows()==1 )  ?  $metadata->row()->contenido  :  ''; 
			$data['txt_casos'] 		= ( $metadata->num_rows()==1 )  ?  $metadata->row()->casos  :  ''; 
			$data['txt_variables'] 	= ( $metadata->num_rows()==1 )  ?  $metadata->row()->variable  :  ''; 
			$data['txt_alternativas'] = ( $metadata->num_rows()==1 )  ?  $metadata->row()->alternativas  :  ''; 
			$data['txt_otro'] 		= ( $metadata->num_rows()==1 )  ?  $metadata->row()->otro  :  ''; 
			$data['txt_faltantes'] 	= ( $metadata->num_rows()==1 )  ?  $metadata->row()->faltantes  :  ''; 
			$data['txt_productor'] 	= ( $metadata->num_rows()==1 )  ?  $metadata->row()->productor :  ''; 
			$data['txt_definiciones'] = ( $metadata->num_rows()==1 )  ?  $metadata->row()->definiciones  :  '';	

			$data['main_content'] = 'tabulados/pescador/reporte7_view';

			$this->load->view('backend/includes/template', $data);	
	}

	public function reporte8()
	{
			$data['restriccion'] = $this->restriccion ;
			$data['nav'] = TRUE;
			$data['title'] = 'Tabulados Pescador';	
			$data['nom_tabulados'] = $this->tabulados_model->get_nombre_tabulados();
			$data['opcion'] = 8;		
			$data['tables'] = $this->tabulados_model->get_report8();

			$texto = ($this->tabulados_model->get_texto(1,$data['opcion'])->num_rows() > 0)  ?  $texto = $this->tabulados_model->get_texto(1,$data['opcion'])->row()->texto  :  '';
			$data['texto'] =  $texto; 
			$texto_2 = ($this->tabulados_model->get_texto(1,$data['opcion'])->num_rows() > 0)  ?  $texto_2 = $this->tabulados_model->get_texto(1,$data['opcion'])->row()->texto_2  :  '';
			$data['texto_2'] =  $texto_2; 
			$data['nombres_mapa'] = $this->tabulados_model->get_nombre_mapa($data['opcion']); // nombre de los tabulados
			$data['respuesta_unica'] = $this->tabulados_model->get_tipo_respuesta($data['opcion']);

			$metadata = $this->tabulados_model->get_metadata(1,$data['opcion']); 
			$data['txt_tabulado'] 	= ( $metadata->num_rows()==1 )  ?  $metadata->row()->tabulado  :  ''; 
			$data['txt_contenido'] 	= ( $metadata->num_rows()==1 )  ?  $metadata->row()->contenido  :  ''; 
			$data['txt_casos'] 		= ( $metadata->num_rows()==1 )  ?  $metadata->row()->casos  :  ''; 
			$data['txt_variables'] 	= ( $metadata->num_rows()==1 )  ?  $metadata->row()->variable  :  ''; 
			$data['txt_alternativas'] = ( $metadata->num_rows()==1 )  ?  $metadata->row()->alternativas  :  ''; 
			$data['txt_otro'] 		= ( $metadata->num_rows()==1 )  ?  $metadata->row()->otro  :  ''; 
			$data['txt_faltantes'] 	= ( $metadata->num_rows()==1 )  ?  $metadata->row()->faltantes  :  ''; 
			$data['txt_productor'] 	= ( $metadata->num_rows()==1 )  ?  $metadata->row()->productor :  ''; 
			$data['txt_definiciones'] = ( $metadata->num_rows()==1 )  ?  $metadata->row()->definiciones  :  '';	

			$data['main_content'] = 'tabulados/pescador/reporte8_view';

			$this->load->view('backend/includes/template', $data);	
	}



	public function reporte9()
	{
			$data['restriccion'] = $this->restriccion ;
			$data['nav'] = TRUE;
			$data['title'] = 'Tabulados Pescador';	
			$data['nom_tabulados'] = $this->tabulados_model->get_nombre_tabulados();
			$data['opcion'] = 9;		
			$data['tables'] = $this->tabulados_model->get_report9();

			$texto = ($this->tabulados_model->get_texto(1,$data['opcion'])->num_rows() > 0)  ?  $texto = $this->tabulados_model->get_texto(1,$data['opcion'])->row()->texto  :  '';
			$data['texto'] =  $texto; 
			$texto_2 = ($this->tabulados_model->get_texto(1,$data['opcion'])->num_rows() > 0)  ?  $texto_2 = $this->tabulados_model->get_texto(1,$data['opcion'])->row()->texto_2  :  '';
			$data['texto_2'] =  $texto_2; 
			$data['nombres_mapa'] = $this->tabulados_model->get_nombre_mapa($data['opcion']); // nombre de los tabulados
			$data['respuesta_unica'] = $this->tabulados_model->get_tipo_respuesta($data['opcion']);

			$metadata = $this->tabulados_model->get_metadata(1,$data['opcion']); 
			$data['txt_tabulado'] 	= ( $metadata->num_rows()==1 )  ?  $metadata->row()->tabulado  :  ''; 
			$data['txt_contenido'] 	= ( $metadata->num_rows()==1 )  ?  $metadata->row()->contenido  :  ''; 
			$data['txt_casos'] 		= ( $metadata->num_rows()==1 )  ?  $metadata->row()->casos  :  ''; 
			$data['txt_variables'] 	= ( $metadata->num_rows()==1 )  ?  $metadata->row()->variable  :  ''; 
			$data['txt_alternativas'] = ( $metadata->num_rows()==1 )  ?  $metadata->row()->alternativas  :  ''; 
			$data['txt_otro'] 		= ( $metadata->num_rows()==1 )  ?  $metadata->row()->otro  :  ''; 
			$data['txt_faltantes'] 	= ( $metadata->num_rows()==1 )  ?  $metadata->row()->faltantes  :  ''; 
			$data['txt_productor'] 	= ( $metadata->num_rows()==1 )  ?  $metadata->row()->productor :  ''; 
			$data['txt_definiciones'] = ( $metadata->num_rows()==1 )  ?  $metadata->row()->definiciones  :  '';	

			$data['main_content'] = 'tabulados/pescador/reporte9_view';

			$this->load->view('backend/includes/template', $data);	
	}

	public function reporte10()
	{
			$data['restriccion'] = $this->restriccion ;
			$data['nav'] = TRUE;
			$data['title'] = 'Tabulados Pescador';	
			$data['nom_tabulados'] = $this->tabulados_model->get_nombre_tabulados();
			$data['opcion'] = 10;		
			$data['tables'] = $this->tabulados_model->get_report10();

			$texto = ($this->tabulados_model->get_texto(1,$data['opcion'])->num_rows() > 0)  ?  $texto = $this->tabulados_model->get_texto(1,$data['opcion'])->row()->texto  :  '';
			$data['texto'] =  $texto; 
			$texto_2 = ($this->tabulados_model->get_texto(1,$data['opcion'])->num_rows() > 0)  ?  $texto_2 = $this->tabulados_model->get_texto(1,$data['opcion'])->row()->texto_2  :  '';
			$data['texto_2'] =  $texto_2; 
			$data['nombres_mapa'] = $this->tabulados_model->get_nombre_mapa($data['opcion']); // nombre de los tabulados
			$data['respuesta_unica'] = $this->tabulados_model->get_tipo_respuesta($data['opcion']);

			$metadata = $this->tabulados_model->get_metadata(1,$data['opcion']); 
			$data['txt_tabulado'] 	= ( $metadata->num_rows()==1 )  ?  $metadata->row()->tabulado  :  ''; 
			$data['txt_contenido'] 	= ( $metadata->num_rows()==1 )  ?  $metadata->row()->contenido  :  ''; 
			$data['txt_casos'] 		= ( $metadata->num_rows()==1 )  ?  $metadata->row()->casos  :  ''; 
			$data['txt_variables'] 	= ( $metadata->num_rows()==1 )  ?  $metadata->row()->variable  :  ''; 
			$data['txt_alternativas'] = ( $metadata->num_rows()==1 )  ?  $metadata->row()->alternativas  :  ''; 
			$data['txt_otro'] 		= ( $metadata->num_rows()==1 )  ?  $metadata->row()->otro  :  ''; 
			$data['txt_faltantes'] 	= ( $metadata->num_rows()==1 )  ?  $metadata->row()->faltantes  :  ''; 
			$data['txt_productor'] 	= ( $metadata->num_rows()==1 )  ?  $metadata->row()->productor :  ''; 
			$data['txt_definiciones'] = ( $metadata->num_rows()==1 )  ?  $metadata->row()->definiciones  :  '';	

			$data['main_content'] = 'tabulados/pescador/reporte10_view';

			$this->load->view('backend/includes/template', $data);	
	}


	public function reporte11()
	{
			$data['restriccion'] = $this->restriccion ;
			$data['nav'] = TRUE;
			$data['title'] = 'Tabulados Pescador';	
			$data['nom_tabulados'] = $this->tabulados_model->get_nombre_tabulados();
			$data['opcion'] = 11;		
			$data['tables'] = $this->tabulados_model->get_report11();

			$texto = ($this->tabulados_model->get_texto(1,$data['opcion'])->num_rows() > 0)  ?  $texto = $this->tabulados_model->get_texto(1,$data['opcion'])->row()->texto  :  '';
			$data['texto'] =  $texto; 
			$texto_2 = ($this->tabulados_model->get_texto(1,$data['opcion'])->num_rows() > 0)  ?  $texto_2 = $this->tabulados_model->get_texto(1,$data['opcion'])->row()->texto_2  :  '';
			$data['texto_2'] =  $texto_2; 
			$data['nombres_mapa'] = $this->tabulados_model->get_nombre_mapa($data['opcion']); // nombre de los tabulados
			$data['respuesta_unica'] = $this->tabulados_model->get_tipo_respuesta($data['opcion']);

			$metadata = $this->tabulados_model->get_metadata(1,$data['opcion']); 
			$data['txt_tabulado'] 	= ( $metadata->num_rows()==1 )  ?  $metadata->row()->tabulado  :  ''; 
			$data['txt_contenido'] 	= ( $metadata->num_rows()==1 )  ?  $metadata->row()->contenido  :  ''; 
			$data['txt_casos'] 		= ( $metadata->num_rows()==1 )  ?  $metadata->row()->casos  :  ''; 
			$data['txt_variables'] 	= ( $metadata->num_rows()==1 )  ?  $metadata->row()->variable  :  ''; 
			$data['txt_alternativas'] = ( $metadata->num_rows()==1 )  ?  $metadata->row()->alternativas  :  ''; 
			$data['txt_otro'] 		= ( $metadata->num_rows()==1 )  ?  $metadata->row()->otro  :  ''; 
			$data['txt_faltantes'] 	= ( $metadata->num_rows()==1 )  ?  $metadata->row()->faltantes  :  ''; 
			$data['txt_productor'] 	= ( $metadata->num_rows()==1 )  ?  $metadata->row()->productor :  ''; 
			$data['txt_definiciones'] = ( $metadata->num_rows()==1 )  ?  $metadata->row()->definiciones  :  '';	

			$data['main_content'] = 'tabulados/pescador/reporte11_view';

			$this->load->view('backend/includes/template', $data);	
	}

	public function reporte12()
	{
			$data['restriccion'] = $this->restriccion ;
			$data['nav'] = TRUE;
			$data['title'] = 'Tabulados Pescador';	
			$data['nom_tabulados'] = $this->tabulados_model->get_nombre_tabulados();
			$data['opcion'] = 12;		
			$data['tables'] = $this->tabulados_model->get_report12();

			$texto = ($this->tabulados_model->get_texto(1,$data['opcion'])->num_rows() > 0)  ?  $texto = $this->tabulados_model->get_texto(1,$data['opcion'])->row()->texto  :  '';
			$data['texto'] =  $texto; 
			$texto_2 = ($this->tabulados_model->get_texto(1,$data['opcion'])->num_rows() > 0)  ?  $texto_2 = $this->tabulados_model->get_texto(1,$data['opcion'])->row()->texto_2  :  '';
			$data['texto_2'] =  $texto_2; 
			$data['nombres_mapa'] = $this->tabulados_model->get_nombre_mapa($data['opcion']); // nombre de los tabulados
			$data['respuesta_unica'] = $this->tabulados_model->get_tipo_respuesta($data['opcion']);

			$metadata = $this->tabulados_model->get_metadata(1,$data['opcion']); 
			$data['txt_tabulado'] 	= ( $metadata->num_rows()==1 )  ?  $metadata->row()->tabulado  :  ''; 
			$data['txt_contenido'] 	= ( $metadata->num_rows()==1 )  ?  $metadata->row()->contenido  :  ''; 
			$data['txt_casos'] 		= ( $metadata->num_rows()==1 )  ?  $metadata->row()->casos  :  ''; 
			$data['txt_variables'] 	= ( $metadata->num_rows()==1 )  ?  $metadata->row()->variable  :  ''; 
			$data['txt_alternativas'] = ( $metadata->num_rows()==1 )  ?  $metadata->row()->alternativas  :  ''; 
			$data['txt_otro'] 		= ( $metadata->num_rows()==1 )  ?  $metadata->row()->otro  :  ''; 
			$data['txt_faltantes'] 	= ( $metadata->num_rows()==1 )  ?  $metadata->row()->faltantes  :  ''; 
			$data['txt_productor'] 	= ( $metadata->num_rows()==1 )  ?  $metadata->row()->productor :  ''; 
			$data['txt_definiciones'] = ( $metadata->num_rows()==1 )  ?  $metadata->row()->definiciones  :  '';	

			$data['main_content'] = 'tabulados/pescador/reporte12_view';

			$this->load->view('backend/includes/template', $data);	
	}

	public function reporte13()
	{
			$data['restriccion'] = $this->restriccion ;
			$data['nav'] = TRUE;
			$data['title'] = 'Tabulados Pescador';	
			$data['nom_tabulados'] = $this->tabulados_model->get_nombre_tabulados();
			$data['opcion'] = 13;		
			$data['tables'] = $this->tabulados_model->get_report13();

			$texto = ($this->tabulados_model->get_texto(1,$data['opcion'])->num_rows() > 0)  ?  $texto = $this->tabulados_model->get_texto(1,$data['opcion'])->row()->texto  :  '';
			$data['texto'] =  $texto; 
			$texto_2 = ($this->tabulados_model->get_texto(1,$data['opcion'])->num_rows() > 0)  ?  $texto_2 = $this->tabulados_model->get_texto(1,$data['opcion'])->row()->texto_2  :  '';
			$data['texto_2'] =  $texto_2; 
			$data['nombres_mapa'] = $this->tabulados_model->get_nombre_mapa($data['opcion']); // nombre de los tabulados
			$data['respuesta_unica'] = $this->tabulados_model->get_tipo_respuesta($data['opcion']);

			$metadata = $this->tabulados_model->get_metadata(1,$data['opcion']); 
			$data['txt_tabulado'] 	= ( $metadata->num_rows()==1 )  ?  $metadata->row()->tabulado  :  ''; 
			$data['txt_contenido'] 	= ( $metadata->num_rows()==1 )  ?  $metadata->row()->contenido  :  ''; 
			$data['txt_casos'] 		= ( $metadata->num_rows()==1 )  ?  $metadata->row()->casos  :  ''; 
			$data['txt_variables'] 	= ( $metadata->num_rows()==1 )  ?  $metadata->row()->variable  :  ''; 
			$data['txt_alternativas'] = ( $metadata->num_rows()==1 )  ?  $metadata->row()->alternativas  :  ''; 
			$data['txt_otro'] 		= ( $metadata->num_rows()==1 )  ?  $metadata->row()->otro  :  ''; 
			$data['txt_faltantes'] 	= ( $metadata->num_rows()==1 )  ?  $metadata->row()->faltantes  :  ''; 
			$data['txt_productor'] 	= ( $metadata->num_rows()==1 )  ?  $metadata->row()->productor :  ''; 
			$data['txt_definiciones'] = ( $metadata->num_rows()==1 )  ?  $metadata->row()->definiciones  :  '';	

			$data['main_content'] = 'tabulados/pescador/reporte13_view';

			$this->load->view('backend/includes/template', $data);		
	}

	public function reporte14()
	{
			$data['restriccion'] = $this->restriccion ;
			$data['nav'] = TRUE;
			$data['title'] = 'Tabulados Pescador';	
			$data['nom_tabulados'] = $this->tabulados_model->get_nombre_tabulados();
			$data['opcion'] = 14;		
			$data['tables'] = $this->tabulados_model->get_report14();

			$texto = ($this->tabulados_model->get_texto(1,$data['opcion'])->num_rows() > 0)  ?  $texto = $this->tabulados_model->get_texto(1,$data['opcion'])->row()->texto  :  '';
			$data['texto'] =  $texto; 
			$texto_2 = ($this->tabulados_model->get_texto(1,$data['opcion'])->num_rows() > 0)  ?  $texto_2 = $this->tabulados_model->get_texto(1,$data['opcion'])->row()->texto_2  :  '';
			$data['texto_2'] =  $texto_2; 
			$data['nombres_mapa'] = $this->tabulados_model->get_nombre_mapa($data['opcion']); // nombre de los tabulados
			$data['respuesta_unica'] = $this->tabulados_model->get_tipo_respuesta($data['opcion']);

			$metadata = $this->tabulados_model->get_metadata(1,$data['opcion']); 
			$data['txt_tabulado'] 	= ( $metadata->num_rows()==1 )  ?  $metadata->row()->tabulado  :  ''; 
			$data['txt_contenido'] 	= ( $metadata->num_rows()==1 )  ?  $metadata->row()->contenido  :  ''; 
			$data['txt_casos'] 		= ( $metadata->num_rows()==1 )  ?  $metadata->row()->casos  :  ''; 
			$data['txt_variables'] 	= ( $metadata->num_rows()==1 )  ?  $metadata->row()->variable  :  ''; 
			$data['txt_alternativas'] = ( $metadata->num_rows()==1 )  ?  $metadata->row()->alternativas  :  ''; 
			$data['txt_otro'] 		= ( $metadata->num_rows()==1 )  ?  $metadata->row()->otro  :  ''; 
			$data['txt_faltantes'] 	= ( $metadata->num_rows()==1 )  ?  $metadata->row()->faltantes  :  ''; 
			$data['txt_productor'] 	= ( $metadata->num_rows()==1 )  ?  $metadata->row()->productor :  ''; 
			$data['txt_definiciones'] = ( $metadata->num_rows()==1 )  ?  $metadata->row()->definiciones  :  '';	

			$data['main_content'] = 'tabulados/pescador/reporte14_view';

			$this->load->view('backend/includes/template', $data);
	}

	public function reporte15()
	{
			$data['restriccion'] = $this->restriccion ;
			$data['nav'] = TRUE;
			$data['title'] = 'Tabulados Pescador';	
			$data['nom_tabulados'] = $this->tabulados_model->get_nombre_tabulados();
			$data['opcion'] = 15;		
			$data['tables'] = $this->tabulados_model->get_report15();

			$texto = ($this->tabulados_model->get_texto(1,$data['opcion'])->num_rows() > 0)  ?  $texto = $this->tabulados_model->get_texto(1,$data['opcion'])->row()->texto  :  '';
			$data['texto'] =  $texto; 
			$texto_2 = ($this->tabulados_model->get_texto(1,$data['opcion'])->num_rows() > 0)  ?  $texto_2 = $this->tabulados_model->get_texto(1,$data['opcion'])->row()->texto_2  :  '';
			$data['texto_2'] =  $texto_2; 
			$data['nombres_mapa'] = $this->tabulados_model->get_nombre_mapa($data['opcion']); // nombre de los tabulados
			$data['respuesta_unica'] = $this->tabulados_model->get_tipo_respuesta($data['opcion']);

			$metadata = $this->tabulados_model->get_metadata(1,$data['opcion']); 
			$data['txt_tabulado'] 	= ( $metadata->num_rows()==1 )  ?  $metadata->row()->tabulado  :  ''; 
			$data['txt_contenido'] 	= ( $metadata->num_rows()==1 )  ?  $metadata->row()->contenido  :  ''; 
			$data['txt_casos'] 		= ( $metadata->num_rows()==1 )  ?  $metadata->row()->casos  :  ''; 
			$data['txt_variables'] 	= ( $metadata->num_rows()==1 )  ?  $metadata->row()->variable  :  ''; 
			$data['txt_alternativas'] = ( $metadata->num_rows()==1 )  ?  $metadata->row()->alternativas  :  ''; 
			$data['txt_otro'] 		= ( $metadata->num_rows()==1 )  ?  $metadata->row()->otro  :  ''; 
			$data['txt_faltantes'] 	= ( $metadata->num_rows()==1 )  ?  $metadata->row()->faltantes  :  ''; 
			$data['txt_productor'] 	= ( $metadata->num_rows()==1 )  ?  $metadata->row()->productor :  ''; 
			$data['txt_definiciones'] = ( $metadata->num_rows()==1 )  ?  $metadata->row()->definiciones  :  '';	

			$data['main_content'] = 'tabulados/pescador/reporte15_view';

			$this->load->view('backend/includes/template', $data);	
	}



	public function reporte16()
	{
			$data['restriccion'] = $this->restriccion ;
			$data['nav'] = TRUE;
			$data['title'] = 'Tabulados Pescador';	
			$data['nom_tabulados'] = $this->tabulados_model->get_nombre_tabulados();
			$data['opcion'] = 16;		
			$data['tables'] = $this->tabulados_model->get_report16();

			$texto = ($this->tabulados_model->get_texto(1,$data['opcion'])->num_rows() > 0)  ?  $texto = $this->tabulados_model->get_texto(1,$data['opcion'])->row()->texto  :  '';
			$data['texto'] =  $texto; 
			$texto_2 = ($this->tabulados_model->get_texto(1,$data['opcion'])->num_rows() > 0)  ?  $texto_2 = $this->tabulados_model->get_texto(1,$data['opcion'])->row()->texto_2  :  '';
			$data['texto_2'] =  $texto_2; 
			$data['nombres_mapa'] = $this->tabulados_model->get_nombre_mapa($data['opcion']); // nombre de los tabulados
			$data['respuesta_unica'] = $this->tabulados_model->get_tipo_respuesta($data['opcion']);

			$metadata = $this->tabulados_model->get_metadata(1,$data['opcion']); 
			$data['txt_tabulado'] 	= ( $metadata->num_rows()==1 )  ?  $metadata->row()->tabulado  :  ''; 
			$data['txt_contenido'] 	= ( $metadata->num_rows()==1 )  ?  $metadata->row()->contenido  :  ''; 
			$data['txt_casos'] 		= ( $metadata->num_rows()==1 )  ?  $metadata->row()->casos  :  ''; 
			$data['txt_variables'] 	= ( $metadata->num_rows()==1 )  ?  $metadata->row()->variable  :  ''; 
			$data['txt_alternativas'] = ( $metadata->num_rows()==1 )  ?  $metadata->row()->alternativas  :  ''; 
			$data['txt_otro'] 		= ( $metadata->num_rows()==1 )  ?  $metadata->row()->otro  :  ''; 
			$data['txt_faltantes'] 	= ( $metadata->num_rows()==1 )  ?  $metadata->row()->faltantes  :  ''; 
			$data['txt_productor'] 	= ( $metadata->num_rows()==1 )  ?  $metadata->row()->productor :  ''; 
			$data['txt_definiciones'] = ( $metadata->num_rows()==1 )  ?  $metadata->row()->definiciones  :  '';	

			$data['main_content'] = 'tabulados/pescador/reporte16_view';

			$this->load->view('backend/includes/template', $data);		
	}

	public function reporte17()
	{
			$data['restriccion'] = $this->restriccion ;
			$data['nav'] = TRUE;
			$data['title'] = 'Tabulados Pescador';	
			$data['nom_tabulados'] = $this->tabulados_model->get_nombre_tabulados();
			$data['opcion'] = 17;		
			$data['tables'] = $this->tabulados_model->get_report17();

			$texto = ($this->tabulados_model->get_texto(1,$data['opcion'])->num_rows() > 0)  ?  $texto = $this->tabulados_model->get_texto(1,$data['opcion'])->row()->texto  :  '';
			$data['texto'] =  $texto; 
			$texto_2 = ($this->tabulados_model->get_texto(1,$data['opcion'])->num_rows() > 0)  ?  $texto_2 = $this->tabulados_model->get_texto(1,$data['opcion'])->row()->texto_2  :  '';
			$data['texto_2'] =  $texto_2; 
			$data['nombres_mapa'] = $this->tabulados_model->get_nombre_mapa($data['opcion']); // nombre de los tabulados
			$data['respuesta_unica'] = $this->tabulados_model->get_tipo_respuesta($data['opcion']);

			$metadata = $this->tabulados_model->get_metadata(1,$data['opcion']); 
			$data['txt_tabulado'] 	= ( $metadata->num_rows()==1 )  ?  $metadata->row()->tabulado  :  ''; 
			$data['txt_contenido'] 	= ( $metadata->num_rows()==1 )  ?  $metadata->row()->contenido  :  ''; 
			$data['txt_casos'] 		= ( $metadata->num_rows()==1 )  ?  $metadata->row()->casos  :  ''; 
			$data['txt_variables'] 	= ( $metadata->num_rows()==1 )  ?  $metadata->row()->variable  :  ''; 
			$data['txt_alternativas'] = ( $metadata->num_rows()==1 )  ?  $metadata->row()->alternativas  :  ''; 
			$data['txt_otro'] 		= ( $metadata->num_rows()==1 )  ?  $metadata->row()->otro  :  ''; 
			$data['txt_faltantes'] 	= ( $metadata->num_rows()==1 )  ?  $metadata->row()->faltantes  :  ''; 
			$data['txt_productor'] 	= ( $metadata->num_rows()==1 )  ?  $metadata->row()->productor :  ''; 
			$data['txt_definiciones'] = ( $metadata->num_rows()==1 )  ?  $metadata->row()->definiciones  :  '';	

			$data['main_content'] = 'tabulados/pescador/reporte17_view';

			$this->load->view('backend/includes/template', $data);		
	}



	public function reporte18()
	{
			$data['restriccion'] = $this->restriccion ;
			$data['nav'] = TRUE;
			$data['title'] = 'Tabulados Pescador';	
			$data['nom_tabulados'] = $this->tabulados_model->get_nombre_tabulados();
			$data['opcion'] = 18;		
			$data['tables'] = $this->tabulados_model->get_report18();

			$texto = ($this->tabulados_model->get_texto(1,$data['opcion'])->num_rows() > 0)  ?  $texto = $this->tabulados_model->get_texto(1,$data['opcion'])->row()->texto  :  '';
			$data['texto'] =  $texto; 
			$texto_2 = ($this->tabulados_model->get_texto(1,$data['opcion'])->num_rows() > 0)  ?  $texto_2 = $this->tabulados_model->get_texto(1,$data['opcion'])->row()->texto_2  :  '';
			$data['texto_2'] =  $texto_2; 
			$data['nombres_mapa'] = $this->tabulados_model->get_nombre_mapa($data['opcion']); // nombre de los tabulados
			$data['respuesta_unica'] = $this->tabulados_model->get_tipo_respuesta($data['opcion']);

			$metadata = $this->tabulados_model->get_metadata(1,$data['opcion']); 
			$data['txt_tabulado'] 	= ( $metadata->num_rows()==1 )  ?  $metadata->row()->tabulado  :  ''; 
			$data['txt_contenido'] 	= ( $metadata->num_rows()==1 )  ?  $metadata->row()->contenido  :  ''; 
			$data['txt_casos'] 		= ( $metadata->num_rows()==1 )  ?  $metadata->row()->casos  :  ''; 
			$data['txt_variables'] 	= ( $metadata->num_rows()==1 )  ?  $metadata->row()->variable  :  ''; 
			$data['txt_alternativas'] = ( $metadata->num_rows()==1 )  ?  $metadata->row()->alternativas  :  ''; 
			$data['txt_otro'] 		= ( $metadata->num_rows()==1 )  ?  $metadata->row()->otro  :  ''; 
			$data['txt_faltantes'] 	= ( $metadata->num_rows()==1 )  ?  $metadata->row()->faltantes  :  ''; 
			$data['txt_productor'] 	= ( $metadata->num_rows()==1 )  ?  $metadata->row()->productor :  ''; 
			$data['txt_definiciones'] = ( $metadata->num_rows()==1 )  ?  $metadata->row()->definiciones  :  '';	

			$data['main_content'] = 'tabulados/pescador/reporte18_view';

			$this->load->view('backend/includes/template', $data);	
	}

	public function reporte19()
	{
			$data['restriccion'] = $this->restriccion ;
			$data['nav'] = TRUE;
			$data['title'] = 'Tabulados Pescador';	
			$data['nom_tabulados'] = $this->tabulados_model->get_nombre_tabulados();
			$data['opcion'] = 19;		
			$data['tables'] = $this->tabulados_model->get_report19();

			$texto = ($this->tabulados_model->get_texto(1,$data['opcion'])->num_rows() > 0)  ?  $texto = $this->tabulados_model->get_texto(1,$data['opcion'])->row()->texto  :  '';
			$data['texto'] =  $texto; 
			$texto_2 = ($this->tabulados_model->get_texto(1,$data['opcion'])->num_rows() > 0)  ?  $texto_2 = $this->tabulados_model->get_texto(1,$data['opcion'])->row()->texto_2  :  '';
			$data['texto_2'] =  $texto_2; 
			$data['nombres_mapa'] = $this->tabulados_model->get_nombre_mapa($data['opcion']); // nombre de los tabulados
			$data['respuesta_unica'] = $this->tabulados_model->get_tipo_respuesta($data['opcion']);

			$metadata = $this->tabulados_model->get_metadata(1,$data['opcion']); 
			$data['txt_tabulado'] 	= ( $metadata->num_rows()==1 )  ?  $metadata->row()->tabulado  :  ''; 
			$data['txt_contenido'] 	= ( $metadata->num_rows()==1 )  ?  $metadata->row()->contenido  :  ''; 
			$data['txt_casos'] 		= ( $metadata->num_rows()==1 )  ?  $metadata->row()->casos  :  ''; 
			$data['txt_variables'] 	= ( $metadata->num_rows()==1 )  ?  $metadata->row()->variable  :  ''; 
			$data['txt_alternativas'] = ( $metadata->num_rows()==1 )  ?  $metadata->row()->alternativas  :  ''; 
			$data['txt_otro'] 		= ( $metadata->num_rows()==1 )  ?  $metadata->row()->otro  :  ''; 
			$data['txt_faltantes'] 	= ( $metadata->num_rows()==1 )  ?  $metadata->row()->faltantes  :  ''; 
			$data['txt_productor'] 	= ( $metadata->num_rows()==1 )  ?  $metadata->row()->productor :  ''; 
			$data['txt_definiciones'] = ( $metadata->num_rows()==1 )  ?  $metadata->row()->definiciones  :  '';	

			$data['main_content'] = 'tabulados/pescador/reporte19_view';

			$this->load->view('backend/includes/template', $data);
	}

	public function reporte20()
	{
			$data['restriccion'] = $this->restriccion ;
			$data['nav'] = TRUE;
			$data['title'] = 'Tabulados Pescador';	
			$data['nom_tabulados'] = $this->tabulados_model->get_nombre_tabulados();
			$data['opcion'] = 20;		
			$data['tables'] = $this->tabulados_model->get_report20();

			$texto = ($this->tabulados_model->get_texto(1,$data['opcion'])->num_rows() > 0)  ?  $texto = $this->tabulados_model->get_texto(1,$data['opcion'])->row()->texto  :  '';
			$data['texto'] =  $texto; 
			$texto_2 = ($this->tabulados_model->get_texto(1,$data['opcion'])->num_rows() > 0)  ?  $texto_2 = $this->tabulados_model->get_texto(1,$data['opcion'])->row()->texto_2  :  '';
			$data['texto_2'] =  $texto_2; 
			$data['nombres_mapa'] = $this->tabulados_model->get_nombre_mapa($data['opcion']); // nombre de los tabulados
			$data['respuesta_unica'] = $this->tabulados_model->get_tipo_respuesta($data['opcion']);

			$metadata = $this->tabulados_model->get_metadata(1,$data['opcion']); 
			$data['txt_tabulado'] 	= ( $metadata->num_rows()==1 )  ?  $metadata->row()->tabulado  :  ''; 
			$data['txt_contenido'] 	= ( $metadata->num_rows()==1 )  ?  $metadata->row()->contenido  :  ''; 
			$data['txt_casos'] 		= ( $metadata->num_rows()==1 )  ?  $metadata->row()->casos  :  ''; 
			$data['txt_variables'] 	= ( $metadata->num_rows()==1 )  ?  $metadata->row()->variable  :  ''; 
			$data['txt_alternativas'] = ( $metadata->num_rows()==1 )  ?  $metadata->row()->alternativas  :  ''; 
			$data['txt_otro'] 		= ( $metadata->num_rows()==1 )  ?  $metadata->row()->otro  :  ''; 
			$data['txt_faltantes'] 	= ( $metadata->num_rows()==1 )  ?  $metadata->row()->faltantes  :  ''; 
			$data['txt_productor'] 	= ( $metadata->num_rows()==1 )  ?  $metadata->row()->productor :  ''; 
			$data['txt_definiciones'] = ( $metadata->num_rows()==1 )  ?  $metadata->row()->definiciones  :  '';	

			$data['main_content'] = 'tabulados/pescador/reporte20_view';

			$this->load->view('backend/includes/template', $data);	
	}

	public function reporte21()
	{
			$data['restriccion'] = $this->restriccion ;
			$data['nav'] = TRUE;
			$data['title'] = 'Tabulados Pescador';	
			$data['nom_tabulados'] = $this->tabulados_model->get_nombre_tabulados();
			$data['opcion'] = 21;		
			$data['tables'] = $this->tabulados_model->get_report21();

			$texto = ($this->tabulados_model->get_texto(1,$data['opcion'])->num_rows() > 0)  ?  $texto = $this->tabulados_model->get_texto(1,$data['opcion'])->row()->texto  :  '';
			$data['texto'] =  $texto; 
			$texto_2 = ($this->tabulados_model->get_texto(1,$data['opcion'])->num_rows() > 0)  ?  $texto_2 = $this->tabulados_model->get_texto(1,$data['opcion'])->row()->texto_2  :  '';
			$data['texto_2'] =  $texto_2; 
			$data['nombres_mapa'] = $this->tabulados_model->get_nombre_mapa($data['opcion']); // nombre de los tabulados
			$data['respuesta_unica'] = $this->tabulados_model->get_tipo_respuesta($data['opcion']);

			$metadata = $this->tabulados_model->get_metadata(1,$data['opcion']); 
			$data['txt_tabulado'] 	= ( $metadata->num_rows()==1 )  ?  $metadata->row()->tabulado  :  ''; 
			$data['txt_contenido'] 	= ( $metadata->num_rows()==1 )  ?  $metadata->row()->contenido  :  ''; 
			$data['txt_casos'] 		= ( $metadata->num_rows()==1 )  ?  $metadata->row()->casos  :  ''; 
			$data['txt_variables'] 	= ( $metadata->num_rows()==1 )  ?  $metadata->row()->variable  :  ''; 
			$data['txt_alternativas'] = ( $metadata->num_rows()==1 )  ?  $metadata->row()->alternativas  :  ''; 
			$data['txt_otro'] 		= ( $metadata->num_rows()==1 )  ?  $metadata->row()->otro  :  ''; 
			$data['txt_faltantes'] 	= ( $metadata->num_rows()==1 )  ?  $metadata->row()->faltantes  :  ''; 
			$data['txt_productor'] 	= ( $metadata->num_rows()==1 )  ?  $metadata->row()->productor :  ''; 
			$data['txt_definiciones'] = ( $metadata->num_rows()==1 )  ?  $metadata->row()->definiciones  :  '';	

			$data['main_content'] = 'tabulados/pescador/reporte21_view';

			$this->load->view('backend/includes/template', $data);	
	}

	public function reporte22()
	{
			$data['restriccion'] = $this->restriccion ;
			$data['nav'] = TRUE;
			$data['title'] = 'Tabulados Pescador';	
			$data['nom_tabulados'] = $this->tabulados_model->get_nombre_tabulados();
			$data['opcion'] = 22;		
			$data['tables'] = $this->tabulados_model->get_report22();

			$texto = ($this->tabulados_model->get_texto(1,$data['opcion'])->num_rows() > 0)  ?  $texto = $this->tabulados_model->get_texto(1,$data['opcion'])->row()->texto  :  '';
			$data['texto'] =  $texto; 
			$texto_2 = ($this->tabulados_model->get_texto(1,$data['opcion'])->num_rows() > 0)  ?  $texto_2 = $this->tabulados_model->get_texto(1,$data['opcion'])->row()->texto_2  :  '';
			$data['texto_2'] =  $texto_2; 
			$data['nombres_mapa'] = $this->tabulados_model->get_nombre_mapa($data['opcion']); // nombre de los tabulados
			$data['respuesta_unica'] = $this->tabulados_model->get_tipo_respuesta($data['opcion']);

			$metadata = $this->tabulados_model->get_metadata(1,$data['opcion']); 
			$data['txt_tabulado'] 	= ( $metadata->num_rows()==1 )  ?  $metadata->row()->tabulado  :  ''; 
			$data['txt_contenido'] 	= ( $metadata->num_rows()==1 )  ?  $metadata->row()->contenido  :  ''; 
			$data['txt_casos'] 		= ( $metadata->num_rows()==1 )  ?  $metadata->row()->casos  :  ''; 
			$data['txt_variables'] 	= ( $metadata->num_rows()==1 )  ?  $metadata->row()->variable  :  ''; 
			$data['txt_alternativas'] = ( $metadata->num_rows()==1 )  ?  $metadata->row()->alternativas  :  ''; 
			$data['txt_otro'] 		= ( $metadata->num_rows()==1 )  ?  $metadata->row()->otro  :  ''; 
			$data['txt_faltantes'] 	= ( $metadata->num_rows()==1 )  ?  $metadata->row()->faltantes  :  ''; 
			$data['txt_productor'] 	= ( $metadata->num_rows()==1 )  ?  $metadata->row()->productor :  ''; 
			$data['txt_definiciones'] = ( $metadata->num_rows()==1 )  ?  $metadata->row()->definiciones  :  '';	

			$data['main_content'] = 'tabulados/pescador/reporte22_view';

			$this->load->view('backend/includes/template', $data);	
	}

	public function reporte23()
	{
			$data['restriccion'] = $this->restriccion ;
			$data['nav'] = TRUE;
			$data['title'] = 'Tabulados Pescador';	
			$data['nom_tabulados'] = $this->tabulados_model->get_nombre_tabulados();
			$data['opcion'] = 23;		
			$data['tables'] = $this->tabulados_model->get_report23();

			$texto = ($this->tabulados_model->get_texto(1,$data['opcion'])->num_rows() > 0)  ?  $texto = $this->tabulados_model->get_texto(1,$data['opcion'])->row()->texto  :  '';
			$data['texto'] =  $texto; 
			$texto_2 = ($this->tabulados_model->get_texto(1,$data['opcion'])->num_rows() > 0)  ?  $texto_2 = $this->tabulados_model->get_texto(1,$data['opcion'])->row()->texto_2  :  '';
			$data['texto_2'] =  $texto_2; 
			$data['nombres_mapa'] = $this->tabulados_model->get_nombre_mapa($data['opcion']); // nombre de los tabulados
			$data['respuesta_unica'] = $this->tabulados_model->get_tipo_respuesta($data['opcion']);

			$metadata = $this->tabulados_model->get_metadata(1,$data['opcion']); 
			$data['txt_tabulado'] 	= ( $metadata->num_rows()==1 )  ?  $metadata->row()->tabulado  :  ''; 
			$data['txt_contenido'] 	= ( $metadata->num_rows()==1 )  ?  $metadata->row()->contenido  :  ''; 
			$data['txt_casos'] 		= ( $metadata->num_rows()==1 )  ?  $metadata->row()->casos  :  ''; 
			$data['txt_variables'] 	= ( $metadata->num_rows()==1 )  ?  $metadata->row()->variable  :  ''; 
			$data['txt_alternativas'] = ( $metadata->num_rows()==1 )  ?  $metadata->row()->alternativas  :  ''; 
			$data['txt_otro'] 		= ( $metadata->num_rows()==1 )  ?  $metadata->row()->otro  :  ''; 
			$data['txt_faltantes'] 	= ( $metadata->num_rows()==1 )  ?  $metadata->row()->faltantes  :  ''; 
			$data['txt_productor'] 	= ( $metadata->num_rows()==1 )  ?  $metadata->row()->productor :  ''; 
			$data['txt_definiciones'] = ( $metadata->num_rows()==1 )  ?  $metadata->row()->definiciones  :  '';	

			$data['main_content'] = 'tabulados/pescador/reporte23_view';

			$this->load->view('backend/includes/template', $data);
	}


	public function reporte24()
	{
			$data['restriccion'] = $this->restriccion ;
			$data['nav'] = TRUE;
			$data['title'] = 'Tabulados Pescador';	
			$data['nom_tabulados'] = $this->tabulados_model->get_nombre_tabulados();
			$data['opcion'] = 24;		
			$data['tables'] = $this->tabulados_model->get_report24();

			$texto = ($this->tabulados_model->get_texto(1,$data['opcion'])->num_rows() > 0)  ?  $texto = $this->tabulados_model->get_texto(1,$data['opcion'])->row()->texto  :  '';
			$data['texto'] =  $texto; 
			$texto_2 = ($this->tabulados_model->get_texto(1,$data['opcion'])->num_rows() > 0)  ?  $texto_2 = $this->tabulados_model->get_texto(1,$data['opcion'])->row()->texto_2  :  '';
			$data['texto_2'] =  $texto_2; 
			$data['nombres_mapa'] = $this->tabulados_model->get_nombre_mapa($data['opcion']); // nombre de los tabulados
			$data['respuesta_unica'] = $this->tabulados_model->get_tipo_respuesta($data['opcion']);

			$metadata = $this->tabulados_model->get_metadata(1,$data['opcion']); 
			$data['txt_tabulado'] 	= ( $metadata->num_rows()==1 )  ?  $metadata->row()->tabulado  :  ''; 
			$data['txt_contenido'] 	= ( $metadata->num_rows()==1 )  ?  $metadata->row()->contenido  :  ''; 
			$data['txt_casos'] 		= ( $metadata->num_rows()==1 )  ?  $metadata->row()->casos  :  ''; 
			$data['txt_variables'] 	= ( $metadata->num_rows()==1 )  ?  $metadata->row()->variable  :  ''; 
			$data['txt_alternativas'] = ( $metadata->num_rows()==1 )  ?  $metadata->row()->alternativas  :  ''; 
			$data['txt_otro'] 		= ( $metadata->num_rows()==1 )  ?  $metadata->row()->otro  :  ''; 
			$data['txt_faltantes'] 	= ( $metadata->num_rows()==1 )  ?  $metadata->row()->faltantes  :  ''; 
			$data['txt_productor'] 	= ( $metadata->num_rows()==1 )  ?  $metadata->row()->productor :  ''; 
			$data['txt_definiciones'] = ( $metadata->num_rows()==1 )  ?  $metadata->row()->definiciones  :  '';	

			$data['main_content'] = 'tabulados/pescador/reporte24_view';

			$this->load->view('backend/includes/template', $data);	
	}



	public function reporte25()
	{
			$data['restriccion'] = $this->restriccion ;
			$data['nav'] = TRUE;
			$data['title'] = 'Tabulados Pescador';	
			$data['nom_tabulados'] = $this->tabulados_model->get_nombre_tabulados();
			$data['opcion'] = 25;		
			$data['tables'] = $this->tabulados_model->get_report25();

			$texto = ($this->tabulados_model->get_texto(1,$data['opcion'])->num_rows() > 0)  ?  $texto = $this->tabulados_model->get_texto(1,$data['opcion'])->row()->texto  :  '';
			$data['texto'] =  $texto; 
			$texto_2 = ($this->tabulados_model->get_texto(1,$data['opcion'])->num_rows() > 0)  ?  $texto_2 = $this->tabulados_model->get_texto(1,$data['opcion'])->row()->texto_2  :  '';
			$data['texto_2'] =  $texto_2; 
			$data['nombres_mapa'] = $this->tabulados_model->get_nombre_mapa($data['opcion']); // nombre de los tabulados
			$data['respuesta_unica'] = $this->tabulados_model->get_tipo_respuesta($data['opcion']);

			$metadata = $this->tabulados_model->get_metadata(1,$data['opcion']); 
			$data['txt_tabulado'] 	= ( $metadata->num_rows()==1 )  ?  $metadata->row()->tabulado  :  ''; 
			$data['txt_contenido'] 	= ( $metadata->num_rows()==1 )  ?  $metadata->row()->contenido  :  ''; 
			$data['txt_casos'] 		= ( $metadata->num_rows()==1 )  ?  $metadata->row()->casos  :  ''; 
			$data['txt_variables'] 	= ( $metadata->num_rows()==1 )  ?  $metadata->row()->variable  :  ''; 
			$data['txt_alternativas'] = ( $metadata->num_rows()==1 )  ?  $metadata->row()->alternativas  :  ''; 
			$data['txt_otro'] 		= ( $metadata->num_rows()==1 )  ?  $metadata->row()->otro  :  ''; 
			$data['txt_faltantes'] 	= ( $metadata->num_rows()==1 )  ?  $metadata->row()->faltantes  :  ''; 
			$data['txt_productor'] 	= ( $metadata->num_rows()==1 )  ?  $metadata->row()->productor :  ''; 
			$data['txt_definiciones'] = ( $metadata->num_rows()==1 )  ?  $metadata->row()->definiciones  :  '';	

			$data['main_content'] = 'tabulados/pescador/reporte25_view';

			$this->load->view('backend/includes/template', $data);
	}

	public function reporte26()
	{
			$data['restriccion'] = $this->restriccion ;
			$data['nav'] = TRUE;
			$data['title'] = 'Tabulados Pescador';	
			$data['nom_tabulados'] = $this->tabulados_model->get_nombre_tabulados();
			$data['opcion'] = 26;		
			$data['tables'] = $this->tabulados_model->get_report26();

			$texto = ($this->tabulados_model->get_texto(1,$data['opcion'])->num_rows() > 0)  ?  $texto = $this->tabulados_model->get_texto(1,$data['opcion'])->row()->texto  :  '';
			$data['texto'] =  $texto; 
			$texto_2 = ($this->tabulados_model->get_texto(1,$data['opcion'])->num_rows() > 0)  ?  $texto_2 = $this->tabulados_model->get_texto(1,$data['opcion'])->row()->texto_2  :  '';
			$data['texto_2'] =  $texto_2; 
			$data['nombres_mapa'] = $this->tabulados_model->get_nombre_mapa($data['opcion']); // nombre de los tabulados
			$data['respuesta_unica'] = $this->tabulados_model->get_tipo_respuesta($data['opcion']);

			$metadata = $this->tabulados_model->get_metadata(1,$data['opcion']); 
			$data['txt_tabulado'] 	= ( $metadata->num_rows()==1 )  ?  $metadata->row()->tabulado  :  ''; 
			$data['txt_contenido'] 	= ( $metadata->num_rows()==1 )  ?  $metadata->row()->contenido  :  ''; 
			$data['txt_casos'] 		= ( $metadata->num_rows()==1 )  ?  $metadata->row()->casos  :  ''; 
			$data['txt_variables'] 	= ( $metadata->num_rows()==1 )  ?  $metadata->row()->variable  :  ''; 
			$data['txt_alternativas'] = ( $metadata->num_rows()==1 )  ?  $metadata->row()->alternativas  :  ''; 
			$data['txt_otro'] 		= ( $metadata->num_rows()==1 )  ?  $metadata->row()->otro  :  ''; 
			$data['txt_faltantes'] 	= ( $metadata->num_rows()==1 )  ?  $metadata->row()->faltantes  :  ''; 
			$data['txt_productor'] 	= ( $metadata->num_rows()==1 )  ?  $metadata->row()->productor :  ''; 
			$data['txt_definiciones'] = ( $metadata->num_rows()==1 )  ?  $metadata->row()->definiciones  :  '';	

			$data['main_content'] = 'tabulados/pescador/reporte26_view';

			$this->load->view('backend/includes/template', $data);	
	}


	public function reporte27()
	{
			$data['restriccion'] = $this->restriccion ;
			$data['nav'] = TRUE;
			$data['title'] = 'Tabulados Pescador';	
			$data['nom_tabulados'] = $this->tabulados_model->get_nombre_tabulados();
			$data['opcion'] = 27;		
			$data['tables'] = $this->tabulados_model->get_report27();

			$texto = ($this->tabulados_model->get_texto(1,$data['opcion'])->num_rows() > 0)  ?  $texto = $this->tabulados_model->get_texto(1,$data['opcion'])->row()->texto  :  '';
			$data['texto'] =  $texto; 
			$texto_2 = ($this->tabulados_model->get_texto(1,$data['opcion'])->num_rows() > 0)  ?  $texto_2 = $this->tabulados_model->get_texto(1,$data['opcion'])->row()->texto_2  :  '';
			$data['texto_2'] =  $texto_2; 
			$data['nombres_mapa'] = $this->tabulados_model->get_nombre_mapa($data['opcion']); // nombre de los tabulados
			$data['respuesta_unica'] = $this->tabulados_model->get_tipo_respuesta($data['opcion']);

			$metadata = $this->tabulados_model->get_metadata(1,$data['opcion']); 
			$data['txt_tabulado'] 	= ( $metadata->num_rows()==1 )  ?  $metadata->row()->tabulado  :  ''; 
			$data['txt_contenido'] 	= ( $metadata->num_rows()==1 )  ?  $metadata->row()->contenido  :  ''; 
			$data['txt_casos'] 		= ( $metadata->num_rows()==1 )  ?  $metadata->row()->casos  :  ''; 
			$data['txt_variables'] 	= ( $metadata->num_rows()==1 )  ?  $metadata->row()->variable  :  ''; 
			$data['txt_alternativas'] = ( $metadata->num_rows()==1 )  ?  $metadata->row()->alternativas  :  ''; 
			$data['txt_otro'] 		= ( $metadata->num_rows()==1 )  ?  $metadata->row()->otro  :  ''; 
			$data['txt_faltantes'] 	= ( $metadata->num_rows()==1 )  ?  $metadata->row()->faltantes  :  ''; 
			$data['txt_productor'] 	= ( $metadata->num_rows()==1 )  ?  $metadata->row()->productor :  ''; 
			$data['txt_definiciones'] = ( $metadata->num_rows()==1 )  ?  $metadata->row()->definiciones  :  '';	

			$data['main_content'] = 'tabulados/pescador/reporte27_view';

			$this->load->view('backend/includes/template', $data);	
	}



	public function reporte28()
	{
			$data['restriccion'] = $this->restriccion ;
			$data['nav'] = TRUE;
			$data['title'] = 'Tabulados Pescador';	
			$data['nom_tabulados'] = $this->tabulados_model->get_nombre_tabulados();
			$data['opcion'] = 28;		
			$data['tables'] = $this->tabulados_model->get_report28();

			$texto = ($this->tabulados_model->get_texto(1,$data['opcion'])->num_rows() > 0)  ?  $texto = $this->tabulados_model->get_texto(1,$data['opcion'])->row()->texto  :  '';
			$data['texto'] =  $texto; 
			$texto_2 = ($this->tabulados_model->get_texto(1,$data['opcion'])->num_rows() > 0)  ?  $texto_2 = $this->tabulados_model->get_texto(1,$data['opcion'])->row()->texto_2  :  '';
			$data['texto_2'] =  $texto_2; 
			$data['nombres_mapa'] = $this->tabulados_model->get_nombre_mapa($data['opcion']); // nombre de los tabulados
			$data['respuesta_unica'] = $this->tabulados_model->get_tipo_respuesta($data['opcion']);

			$metadata = $this->tabulados_model->get_metadata(1,$data['opcion']); 
			$data['txt_tabulado'] 	= ( $metadata->num_rows()==1 )  ?  $metadata->row()->tabulado  :  ''; 
			$data['txt_contenido'] 	= ( $metadata->num_rows()==1 )  ?  $metadata->row()->contenido  :  ''; 
			$data['txt_casos'] 		= ( $metadata->num_rows()==1 )  ?  $metadata->row()->casos  :  ''; 
			$data['txt_variables'] 	= ( $metadata->num_rows()==1 )  ?  $metadata->row()->variable  :  ''; 
			$data['txt_alternativas'] = ( $metadata->num_rows()==1 )  ?  $metadata->row()->alternativas  :  ''; 
			$data['txt_otro'] 		= ( $metadata->num_rows()==1 )  ?  $metadata->row()->otro  :  ''; 
			$data['txt_faltantes'] 	= ( $metadata->num_rows()==1 )  ?  $metadata->row()->faltantes  :  ''; 
			$data['txt_productor'] 	= ( $metadata->num_rows()==1 )  ?  $metadata->row()->productor :  ''; 
			$data['txt_definiciones'] = ( $metadata->num_rows()==1 )  ?  $metadata->row()->definiciones  :  '';	

			$data['main_content'] = 'tabulados/pescador/reporte28_view';

			$this->load->view('backend/includes/template', $data);	
	}


	public function reporte29()
	{
			$data['restriccion'] = $this->restriccion ;
			$data['nav'] = TRUE;
			$data['title'] = 'Tabulados Pescador';	
			$data['nom_tabulados'] = $this->tabulados_model->get_nombre_tabulados();
			$data['opcion'] = 29;		
			$data['tables'] = $this->tabulados_model->get_report29();

			$texto = ($this->tabulados_model->get_texto(1,$data['opcion'])->num_rows() > 0)  ?  $texto = $this->tabulados_model->get_texto(1,$data['opcion'])->row()->texto  :  '';
			$data['texto'] =  $texto; 
			$texto_2 = ($this->tabulados_model->get_texto(1,$data['opcion'])->num_rows() > 0)  ?  $texto_2 = $this->tabulados_model->get_texto(1,$data['opcion'])->row()->texto_2  :  '';
			$data['texto_2'] =  $texto_2; 
			$data['nombres_mapa'] = $this->tabulados_model->get_nombre_mapa($data['opcion']); // nombre de los tabulados
			$data['respuesta_unica'] = $this->tabulados_model->get_tipo_respuesta($data['opcion']);

			$metadata = $this->tabulados_model->get_metadata(1,$data['opcion']); 
			$data['txt_tabulado'] 	= ( $metadata->num_rows()==1 )  ?  $metadata->row()->tabulado  :  ''; 
			$data['txt_contenido'] 	= ( $metadata->num_rows()==1 )  ?  $metadata->row()->contenido  :  ''; 
			$data['txt_casos'] 		= ( $metadata->num_rows()==1 )  ?  $metadata->row()->casos  :  ''; 
			$data['txt_variables'] 	= ( $metadata->num_rows()==1 )  ?  $metadata->row()->variable  :  ''; 
			$data['txt_alternativas'] = ( $metadata->num_rows()==1 )  ?  $metadata->row()->alternativas  :  ''; 
			$data['txt_otro'] 		= ( $metadata->num_rows()==1 )  ?  $metadata->row()->otro  :  ''; 
			$data['txt_faltantes'] 	= ( $metadata->num_rows()==1 )  ?  $metadata->row()->faltantes  :  ''; 
			$data['txt_productor'] 	= ( $metadata->num_rows()==1 )  ?  $metadata->row()->productor :  ''; 
			$data['txt_definiciones'] = ( $metadata->num_rows()==1 )  ?  $metadata->row()->definiciones  :  '';	

			$data['main_content'] = 'tabulados/pescador/reporte29_view';

			$this->load->view('backend/includes/template', $data);		
	}

	public function reporte30()
	{
			$data['restriccion'] = $this->restriccion ;
			$data['nav'] = TRUE;
			$data['title'] = 'Tabulados Pescador';	
			$data['nom_tabulados'] = $this->tabulados_model->get_nombre_tabulados();
			$data['opcion'] = 30;		
			$data['tables'] = $this->tabulados_model->get_report30();

			$texto = ($this->tabulados_model->get_texto(1,$data['opcion'])->num_rows() > 0)  ?  $texto = $this->tabulados_model->get_texto(1,$data['opcion'])->row()->texto  :  '';
			$data['texto'] =  $texto; 
			$texto_2 = ($this->tabulados_model->get_texto(1,$data['opcion'])->num_rows() > 0)  ?  $texto_2 = $this->tabulados_model->get_texto(1,$data['opcion'])->row()->texto_2  :  '';
			$data['texto_2'] =  $texto_2; 
			$data['nombres_mapa'] = $this->tabulados_model->get_nombre_mapa($data['opcion']); // nombre de los tabulados
			$data['respuesta_unica'] = $this->tabulados_model->get_tipo_respuesta($data['opcion']);

			$metadata = $this->tabulados_model->get_metadata(1,$data['opcion']); 
			$data['txt_tabulado'] 	= ( $metadata->num_rows()==1 )  ?  $metadata->row()->tabulado  :  ''; 
			$data['txt_contenido'] 	= ( $metadata->num_rows()==1 )  ?  $metadata->row()->contenido  :  ''; 
			$data['txt_casos'] 		= ( $metadata->num_rows()==1 )  ?  $metadata->row()->casos  :  ''; 
			$data['txt_variables'] 	= ( $metadata->num_rows()==1 )  ?  $metadata->row()->variable  :  ''; 
			$data['txt_alternativas'] = ( $metadata->num_rows()==1 )  ?  $metadata->row()->alternativas  :  ''; 
			$data['txt_otro'] 		= ( $metadata->num_rows()==1 )  ?  $metadata->row()->otro  :  ''; 
			$data['txt_faltantes'] 	= ( $metadata->num_rows()==1 )  ?  $metadata->row()->faltantes  :  ''; 
			$data['txt_productor'] 	= ( $metadata->num_rows()==1 )  ?  $metadata->row()->productor :  ''; 
			$data['txt_definiciones'] = ( $metadata->num_rows()==1 )  ?  $metadata->row()->definiciones  :  '';	

			$data['main_content'] = 'tabulados/pescador/reporte30_view';

			$this->load->view('backend/includes/template', $data);	
	}

	public function reporte31()
	{
			$data['restriccion'] = $this->restriccion ;
			$data['nav'] = TRUE;
			$data['title'] = 'Tabulados Pescador';	
			$data['nom_tabulados'] = $this->tabulados_model->get_nombre_tabulados();
			$data['opcion'] = 31;		
			$data['tables'] = $this->tabulados_model->get_report31();

			$texto = ($this->tabulados_model->get_texto(1,$data['opcion'])->num_rows() > 0)  ?  $texto = $this->tabulados_model->get_texto(1,$data['opcion'])->row()->texto  :  '';
			$data['texto'] =  $texto; 
			$texto_2 = ($this->tabulados_model->get_texto(1,$data['opcion'])->num_rows() > 0)  ?  $texto_2 = $this->tabulados_model->get_texto(1,$data['opcion'])->row()->texto_2  :  '';
			$data['texto_2'] =  $texto_2; 
			$data['nombres_mapa'] = $this->tabulados_model->get_nombre_mapa($data['opcion']); // nombre de los tabulados
			$data['respuesta_unica'] = $this->tabulados_model->get_tipo_respuesta($data['opcion']);

			$metadata = $this->tabulados_model->get_metadata(1,$data['opcion']); 
			$data['txt_tabulado'] 	= ( $metadata->num_rows()==1 )  ?  $metadata->row()->tabulado  :  ''; 
			$data['txt_contenido'] 	= ( $metadata->num_rows()==1 )  ?  $metadata->row()->contenido  :  ''; 
			$data['txt_casos'] 		= ( $metadata->num_rows()==1 )  ?  $metadata->row()->casos  :  ''; 
			$data['txt_variables'] 	= ( $metadata->num_rows()==1 )  ?  $metadata->row()->variable  :  ''; 
			$data['txt_alternativas'] = ( $metadata->num_rows()==1 )  ?  $metadata->row()->alternativas  :  ''; 
			$data['txt_otro'] 		= ( $metadata->num_rows()==1 )  ?  $metadata->row()->otro  :  ''; 
			$data['txt_faltantes'] 	= ( $metadata->num_rows()==1 )  ?  $metadata->row()->faltantes  :  ''; 
			$data['txt_productor'] 	= ( $metadata->num_rows()==1 )  ?  $metadata->row()->productor :  ''; 
			$data['txt_definiciones'] = ( $metadata->num_rows()==1 )  ?  $metadata->row()->definiciones  :  '';	

			$data['main_content'] = 'tabulados/pescador/reporte31_view';

			$this->load->view('backend/includes/template', $data);	
	}

	public function reporte32()
	{
			$data['restriccion'] = $this->restriccion ;
			$data['nav'] = TRUE;
			$data['title'] = 'Tabulados Pescador';	
			$data['nom_tabulados'] = $this->tabulados_model->get_nombre_tabulados();
			$data['opcion'] = 32;		
			$data['tables'] = $this->tabulados_model->get_report32();

			$texto = ($this->tabulados_model->get_texto(1,$data['opcion'])->num_rows() > 0)  ?  $texto = $this->tabulados_model->get_texto(1,$data['opcion'])->row()->texto  :  '';
			$data['texto'] =  $texto; 
			$texto_2 = ($this->tabulados_model->get_texto(1,$data['opcion'])->num_rows() > 0)  ?  $texto_2 = $this->tabulados_model->get_texto(1,$data['opcion'])->row()->texto_2  :  '';
			$data['texto_2'] =  $texto_2; 
			$data['nombres_mapa'] = $this->tabulados_model->get_nombre_mapa($data['opcion']); // nombre de los tabulados
			$data['respuesta_unica'] = $this->tabulados_model->get_tipo_respuesta($data['opcion']);

			$metadata = $this->tabulados_model->get_metadata(1,$data['opcion']); 
			$data['txt_tabulado'] 	= ( $metadata->num_rows()==1 )  ?  $metadata->row()->tabulado  :  ''; 
			$data['txt_contenido'] 	= ( $metadata->num_rows()==1 )  ?  $metadata->row()->contenido  :  ''; 
			$data['txt_casos'] 		= ( $metadata->num_rows()==1 )  ?  $metadata->row()->casos  :  ''; 
			$data['txt_variables'] 	= ( $metadata->num_rows()==1 )  ?  $metadata->row()->variable  :  ''; 
			$data['txt_alternativas'] = ( $metadata->num_rows()==1 )  ?  $metadata->row()->alternativas  :  ''; 
			$data['txt_otro'] 		= ( $metadata->num_rows()==1 )  ?  $metadata->row()->otro  :  ''; 
			$data['txt_faltantes'] 	= ( $metadata->num_rows()==1 )  ?  $metadata->row()->faltantes  :  ''; 
			$data['txt_productor'] 	= ( $metadata->num_rows()==1 )  ?  $metadata->row()->productor :  ''; 
			$data['txt_definiciones'] = ( $metadata->num_rows()==1 )  ?  $metadata->row()->definiciones  :  '';	

			$data['main_content'] = 'tabulados/pescador/reporte32_view';

			$this->load->view('backend/includes/template', $data);
	}

	public function reporte33()
	{
			$data['restriccion'] = $this->restriccion ;
			$data['nav'] = TRUE;
			$data['title'] = 'Tabulados Pescador';	
			$data['nom_tabulados'] = $this->tabulados_model->get_nombre_tabulados();
			$data['opcion'] = 33;		
			$data['tables'] = $this->tabulados_model->get_report33();

			$texto = ($this->tabulados_model->get_texto(1,$data['opcion'])->num_rows() > 0)  ?  $texto = $this->tabulados_model->get_texto(1,$data['opcion'])->row()->texto  :  '';
			$data['texto'] =  $texto; 
			$texto_2 = ($this->tabulados_model->get_texto(1,$data['opcion'])->num_rows() > 0)  ?  $texto_2 = $this->tabulados_model->get_texto(1,$data['opcion'])->row()->texto_2  :  '';
			$data['texto_2'] =  $texto_2; 
			$data['nombres_mapa'] = $this->tabulados_model->get_nombre_mapa($data['opcion']); // nombre de los tabulados
			$data['respuesta_unica'] = $this->tabulados_model->get_tipo_respuesta($data['opcion']);

			$metadata = $this->tabulados_model->get_metadata(1,$data['opcion']); 
			$data['txt_tabulado'] 	= ( $metadata->num_rows()==1 )  ?  $metadata->row()->tabulado  :  ''; 
			$data['txt_contenido'] 	= ( $metadata->num_rows()==1 )  ?  $metadata->row()->contenido  :  ''; 
			$data['txt_casos'] 		= ( $metadata->num_rows()==1 )  ?  $metadata->row()->casos  :  ''; 
			$data['txt_variables'] 	= ( $metadata->num_rows()==1 )  ?  $metadata->row()->variable  :  ''; 
			$data['txt_alternativas'] = ( $metadata->num_rows()==1 )  ?  $metadata->row()->alternativas  :  ''; 
			$data['txt_otro'] 		= ( $metadata->num_rows()==1 )  ?  $metadata->row()->otro  :  ''; 
			$data['txt_faltantes'] 	= ( $metadata->num_rows()==1 )  ?  $metadata->row()->faltantes  :  ''; 
			$data['txt_productor'] 	= ( $metadata->num_rows()==1 )  ?  $metadata->row()->productor :  ''; 
			$data['txt_definiciones'] = ( $metadata->num_rows()==1 )  ?  $metadata->row()->definiciones  :  '';	

			$data['main_content'] = 'tabulados/pescador/reporte33_view';

			$this->load->view('backend/includes/template', $data);
	}


	public function reporte34()
	{
			$data['restriccion'] = $this->restriccion ;
			$data['nav'] = TRUE;
			$data['title'] = 'Tabulados Pescador';	
			$data['nom_tabulados'] = $this->tabulados_model->get_nombre_tabulados();
			$data['opcion'] = 34;		
			$data['tables'] = $this->tabulados_model->get_report34();

			$texto = ($this->tabulados_model->get_texto(1,$data['opcion'])->num_rows() > 0)  ?  $texto = $this->tabulados_model->get_texto(1,$data['opcion'])->row()->texto  :  '';
			$data['texto'] =  $texto; 
			$texto_2 = ($this->tabulados_model->get_texto(1,$data['opcion'])->num_rows() > 0)  ?  $texto_2 = $this->tabulados_model->get_texto(1,$data['opcion'])->row()->texto_2  :  '';
			$data['texto_2'] =  $texto_2; 
			$data['nombres_mapa'] = $this->tabulados_model->get_nombre_mapa($data['opcion']); // nombre de los tabulados
			$data['respuesta_unica'] = $this->tabulados_model->get_tipo_respuesta($data['opcion']);

			$metadata = $this->tabulados_model->get_metadata(1,$data['opcion']); 
			$data['txt_tabulado'] 	= ( $metadata->num_rows()==1 )  ?  $metadata->row()->tabulado  :  ''; 
			$data['txt_contenido'] 	= ( $metadata->num_rows()==1 )  ?  $metadata->row()->contenido  :  ''; 
			$data['txt_casos'] 		= ( $metadata->num_rows()==1 )  ?  $metadata->row()->casos  :  ''; 
			$data['txt_variables'] 	= ( $metadata->num_rows()==1 )  ?  $metadata->row()->variable  :  ''; 
			$data['txt_alternativas'] = ( $metadata->num_rows()==1 )  ?  $metadata->row()->alternativas  :  ''; 
			$data['txt_otro'] 		= ( $metadata->num_rows()==1 )  ?  $metadata->row()->otro  :  ''; 
			$data['txt_faltantes'] 	= ( $metadata->num_rows()==1 )  ?  $metadata->row()->faltantes  :  ''; 
			$data['txt_productor'] 	= ( $metadata->num_rows()==1 )  ?  $metadata->row()->productor :  ''; 
			$data['txt_definiciones'] = ( $metadata->num_rows()==1 )  ?  $metadata->row()->definiciones  :  '';	

			$data['main_content'] = 'tabulados/pescador/reporte34_view';

			$this->load->view('backend/includes/template', $data);
	}


	public function reporte35()
	{
			$data['restriccion'] = $this->restriccion ;
			$data['nav'] = TRUE;
			$data['title'] = 'Tabulados Pescador';	
			$data['nom_tabulados'] = $this->tabulados_model->get_nombre_tabulados();
			$data['opcion'] = 35;		
			$data['tables'] = $this->tabulados_model->get_report35();

			$texto = ($this->tabulados_model->get_texto(1,$data['opcion'])->num_rows() > 0)  ?  $texto = $this->tabulados_model->get_texto(1,$data['opcion'])->row()->texto  :  '';
			$data['texto'] =  $texto; 
			$texto_2 = ($this->tabulados_model->get_texto(1,$data['opcion'])->num_rows() > 0)  ?  $texto_2 = $this->tabulados_model->get_texto(1,$data['opcion'])->row()->texto_2  :  '';
			$data['texto_2'] =  $texto_2; 
			$data['nombres_mapa'] = $this->tabulados_model->get_nombre_mapa($data['opcion']); // nombre de los tabulados
			$data['respuesta_unica'] = $this->tabulados_model->get_tipo_respuesta($data['opcion']);

			$metadata = $this->tabulados_model->get_metadata(1,$data['opcion']); 
			$data['txt_tabulado'] 	= ( $metadata->num_rows()==1 )  ?  $metadata->row()->tabulado  :  ''; 
			$data['txt_contenido'] 	= ( $metadata->num_rows()==1 )  ?  $metadata->row()->contenido  :  ''; 
			$data['txt_casos'] 		= ( $metadata->num_rows()==1 )  ?  $metadata->row()->casos  :  ''; 
			$data['txt_variables'] 	= ( $metadata->num_rows()==1 )  ?  $metadata->row()->variable  :  ''; 
			$data['txt_alternativas'] = ( $metadata->num_rows()==1 )  ?  $metadata->row()->alternativas  :  ''; 
			$data['txt_otro'] 		= ( $metadata->num_rows()==1 )  ?  $metadata->row()->otro  :  ''; 
			$data['txt_faltantes'] 	= ( $metadata->num_rows()==1 )  ?  $metadata->row()->faltantes  :  ''; 
			$data['txt_productor'] 	= ( $metadata->num_rows()==1 )  ?  $metadata->row()->productor :  ''; 
			$data['txt_definiciones'] = ( $metadata->num_rows()==1 )  ?  $metadata->row()->definiciones  :  '';	

			$data['main_content'] = 'tabulados/pescador/reporte35_view';

			$this->load->view('backend/includes/template', $data);		
	}


	public function reporte36()
	{
			$data['restriccion'] = $this->restriccion ;
			$data['nav'] = TRUE;
			$data['title'] = 'Tabulados Pescador';	
			$data['nom_tabulados'] = $this->tabulados_model->get_nombre_tabulados();
			$data['opcion'] = 36;		
			$data['tables'] = $this->tabulados_model->get_report36();

			$texto = ($this->tabulados_model->get_texto(1,$data['opcion'])->num_rows() > 0)  ?  $texto = $this->tabulados_model->get_texto(1,$data['opcion'])->row()->texto  :  '';
			$data['texto'] =  $texto; 
			$texto_2 = ($this->tabulados_model->get_texto(1,$data['opcion'])->num_rows() > 0)  ?  $texto_2 = $this->tabulados_model->get_texto(1,$data['opcion'])->row()->texto_2  :  '';
			$data['texto_2'] =  $texto_2; 
			$data['nombres_mapa'] = $this->tabulados_model->get_nombre_mapa($data['opcion']); // nombre de los tabulados
			$data['respuesta_unica'] = $this->tabulados_model->get_tipo_respuesta($data['opcion']);

			$metadata = $this->tabulados_model->get_metadata(1,$data['opcion']); 
			$data['txt_tabulado'] 	= ( $metadata->num_rows()==1 )  ?  $metadata->row()->tabulado  :  ''; 
			$data['txt_contenido'] 	= ( $metadata->num_rows()==1 )  ?  $metadata->row()->contenido  :  ''; 
			$data['txt_casos'] 		= ( $metadata->num_rows()==1 )  ?  $metadata->row()->casos  :  ''; 
			$data['txt_variables'] 	= ( $metadata->num_rows()==1 )  ?  $metadata->row()->variable  :  ''; 
			$data['txt_alternativas'] = ( $metadata->num_rows()==1 )  ?  $metadata->row()->alternativas  :  ''; 
			$data['txt_otro'] 		= ( $metadata->num_rows()==1 )  ?  $metadata->row()->otro  :  ''; 
			$data['txt_faltantes'] 	= ( $metadata->num_rows()==1 )  ?  $metadata->row()->faltantes  :  ''; 
			$data['txt_productor'] 	= ( $metadata->num_rows()==1 )  ?  $metadata->row()->productor :  ''; 
			$data['txt_definiciones'] = ( $metadata->num_rows()==1 )  ?  $metadata->row()->definiciones  :  '';	

			$data['main_content'] = 'tabulados/pescador/reporte36_view';

			$this->load->view('backend/includes/template', $data);		
	}

	public function reporte37()
	{
			$data['restriccion'] = $this->restriccion ;
			$data['nav'] = TRUE;
			$data['title'] = 'Tabulados Pescador';	
			$data['nom_tabulados'] = $this->tabulados_model->get_nombre_tabulados();
			$data['opcion'] = 37;		
			$data['tables'] = $this->tabulados_model->get_report37();

			$texto = ($this->tabulados_model->get_texto(1,$data['opcion'])->num_rows() > 0)  ?  $texto = $this->tabulados_model->get_texto(1,$data['opcion'])->row()->texto  :  '';
			$data['texto'] =  $texto; 
			$texto_2 = ($this->tabulados_model->get_texto(1,$data['opcion'])->num_rows() > 0)  ?  $texto_2 = $this->tabulados_model->get_texto(1,$data['opcion'])->row()->texto_2  :  '';
			$data['texto_2'] =  $texto_2; 
			$data['nombres_mapa'] = $this->tabulados_model->get_nombre_mapa($data['opcion']); // nombre de los tabulados
			$data['respuesta_unica'] = $this->tabulados_model->get_tipo_respuesta($data['opcion']);

			$metadata = $this->tabulados_model->get_metadata(1,$data['opcion']); 
			$data['txt_tabulado'] 	= ( $metadata->num_rows()==1 )  ?  $metadata->row()->tabulado  :  ''; 
			$data['txt_contenido'] 	= ( $metadata->num_rows()==1 )  ?  $metadata->row()->contenido  :  ''; 
			$data['txt_casos'] 		= ( $metadata->num_rows()==1 )  ?  $metadata->row()->casos  :  ''; 
			$data['txt_variables'] 	= ( $metadata->num_rows()==1 )  ?  $metadata->row()->variable  :  ''; 
			$data['txt_alternativas'] = ( $metadata->num_rows()==1 )  ?  $metadata->row()->alternativas  :  ''; 
			$data['txt_otro'] 		= ( $metadata->num_rows()==1 )  ?  $metadata->row()->otro  :  ''; 
			$data['txt_faltantes'] 	= ( $metadata->num_rows()==1 )  ?  $metadata->row()->faltantes  :  ''; 
			$data['txt_productor'] 	= ( $metadata->num_rows()==1 )  ?  $metadata->row()->productor :  ''; 
			$data['txt_definiciones'] = ( $metadata->num_rows()==1 )  ?  $metadata->row()->definiciones  :  '';	

			$data['main_content'] = 'tabulados/pescador/reporte37_view';

			$this->load->view('backend/includes/template', $data);	
	}

	public function reporte38()
	{
			$data['restriccion'] = $this->restriccion ;
			$data['nav'] = TRUE;
			$data['title'] = 'Tabulados Pescador';	
			$data['nom_tabulados'] = $this->tabulados_model->get_nombre_tabulados();
			$data['opcion'] = 38;		
			$data['tables'] = $this->tabulados_model->get_report38();

			$texto = ($this->tabulados_model->get_texto(1,$data['opcion'])->num_rows() > 0)  ?  $texto = $this->tabulados_model->get_texto(1,$data['opcion'])->row()->texto  :  '';
			$data['texto'] =  $texto; 
			$texto_2 = ($this->tabulados_model->get_texto(1,$data['opcion'])->num_rows() > 0)  ?  $texto_2 = $this->tabulados_model->get_texto(1,$data['opcion'])->row()->texto_2  :  '';
			$data['texto_2'] =  $texto_2; 
			$data['nombres_mapa'] = $this->tabulados_model->get_nombre_mapa($data['opcion']); // nombre de los tabulados
			$data['respuesta_unica'] = $this->tabulados_model->get_tipo_respuesta($data['opcion']);

			$metadata = $this->tabulados_model->get_metadata(1,$data['opcion']); 
			$data['txt_tabulado'] 	= ( $metadata->num_rows()==1 )  ?  $metadata->row()->tabulado  :  ''; 
			$data['txt_contenido'] 	= ( $metadata->num_rows()==1 )  ?  $metadata->row()->contenido  :  ''; 
			$data['txt_casos'] 		= ( $metadata->num_rows()==1 )  ?  $metadata->row()->casos  :  ''; 
			$data['txt_variables'] 	= ( $metadata->num_rows()==1 )  ?  $metadata->row()->variable  :  ''; 
			$data['txt_alternativas'] = ( $metadata->num_rows()==1 )  ?  $metadata->row()->alternativas  :  ''; 
			$data['txt_otro'] 		= ( $metadata->num_rows()==1 )  ?  $metadata->row()->otro  :  ''; 
			$data['txt_faltantes'] 	= ( $metadata->num_rows()==1 )  ?  $metadata->row()->faltantes  :  ''; 
			$data['txt_productor'] 	= ( $metadata->num_rows()==1 )  ?  $metadata->row()->productor :  ''; 
			$data['txt_definiciones'] = ( $metadata->num_rows()==1 )  ?  $metadata->row()->definiciones  :  '';	

			$data['main_content'] = 'tabulados/pescador/reporte38_view';

			$this->load->view('backend/includes/template', $data);	
	}

	public function reporte39()
	{
			$data['restriccion'] = $this->restriccion ;
			$data['nav'] = TRUE;
			$data['title'] = 'Tabulados Pescador';	
			$data['nom_tabulados'] = $this->tabulados_model->get_nombre_tabulados();
			$data['opcion'] = 39;		
			$data['tables'] = $this->tabulados_model->get_report39();

			$texto = ($this->tabulados_model->get_texto(1,$data['opcion'])->num_rows() > 0)  ?  $texto = $this->tabulados_model->get_texto(1,$data['opcion'])->row()->texto  :  '';
			$data['texto'] =  $texto; 
			$texto_2 = ($this->tabulados_model->get_texto(1,$data['opcion'])->num_rows() > 0)  ?  $texto_2 = $this->tabulados_model->get_texto(1,$data['opcion'])->row()->texto_2  :  '';
			$data['texto_2'] =  $texto_2; 
			$data['nombres_mapa'] = $this->tabulados_model->get_nombre_mapa($data['opcion']); // nombre de los tabulados
			$data['respuesta_unica'] = $this->tabulados_model->get_tipo_respuesta($data['opcion']);

			$metadata = $this->tabulados_model->get_metadata(1,$data['opcion']); 
			$data['txt_tabulado'] 	= ( $metadata->num_rows()==1 )  ?  $metadata->row()->tabulado  :  ''; 
			$data['txt_contenido'] 	= ( $metadata->num_rows()==1 )  ?  $metadata->row()->contenido  :  ''; 
			$data['txt_casos'] 		= ( $metadata->num_rows()==1 )  ?  $metadata->row()->casos  :  ''; 
			$data['txt_variables'] 	= ( $metadata->num_rows()==1 )  ?  $metadata->row()->variable  :  ''; 
			$data['txt_alternativas'] = ( $metadata->num_rows()==1 )  ?  $metadata->row()->alternativas  :  ''; 
			$data['txt_otro'] 		= ( $metadata->num_rows()==1 )  ?  $metadata->row()->otro  :  ''; 
			$data['txt_faltantes'] 	= ( $metadata->num_rows()==1 )  ?  $metadata->row()->faltantes  :  ''; 
			$data['txt_productor'] 	= ( $metadata->num_rows()==1 )  ?  $metadata->row()->productor :  ''; 
			$data['txt_definiciones'] = ( $metadata->num_rows()==1 )  ?  $metadata->row()->definiciones  :  '';	

			$data['main_content'] = 'tabulados/pescador/reporte39_view';

			$this->load->view('backend/includes/template', $data);	
	}


	public function reporte40()
	{
			$data['restriccion'] = $this->restriccion ;
			$data['nav'] = TRUE;
			$data['title'] = 'Tabulados Pescador';	
			$data['nom_tabulados'] = $this->tabulados_model->get_nombre_tabulados();
			$data['opcion'] = 40;		
			$data['tables'] = $this->tabulados_model->get_report40();

			$texto = ($this->tabulados_model->get_texto(1,$data['opcion'])->num_rows() > 0)  ?  $texto = $this->tabulados_model->get_texto(1,$data['opcion'])->row()->texto  :  '';
			$data['texto'] =  $texto; 
			$texto_2 = ($this->tabulados_model->get_texto(1,$data['opcion'])->num_rows() > 0)  ?  $texto_2 = $this->tabulados_model->get_texto(1,$data['opcion'])->row()->texto_2  :  '';
			$data['texto_2'] =  $texto_2; 
			$data['nombres_mapa'] = $this->tabulados_model->get_nombre_mapa($data['opcion']); // nombre de los tabulados
			$data['respuesta_unica'] = $this->tabulados_model->get_tipo_respuesta($data['opcion']);

			$metadata = $this->tabulados_model->get_metadata(1,$data['opcion']); 
			$data['txt_tabulado'] 	= ( $metadata->num_rows()==1 )  ?  $metadata->row()->tabulado  :  ''; 
			$data['txt_contenido'] 	= ( $metadata->num_rows()==1 )  ?  $metadata->row()->contenido  :  ''; 
			$data['txt_casos'] 		= ( $metadata->num_rows()==1 )  ?  $metadata->row()->casos  :  ''; 
			$data['txt_variables'] 	= ( $metadata->num_rows()==1 )  ?  $metadata->row()->variable  :  ''; 
			$data['txt_alternativas'] = ( $metadata->num_rows()==1 )  ?  $metadata->row()->alternativas  :  ''; 
			$data['txt_otro'] 		= ( $metadata->num_rows()==1 )  ?  $metadata->row()->otro  :  ''; 
			$data['txt_faltantes'] 	= ( $metadata->num_rows()==1 )  ?  $metadata->row()->faltantes  :  ''; 
			$data['txt_productor'] 	= ( $metadata->num_rows()==1 )  ?  $metadata->row()->productor :  ''; 
			$data['txt_definiciones'] = ( $metadata->num_rows()==1 )  ?  $metadata->row()->definiciones  :  '';	

			$data['main_content'] = 'tabulados/pescador/reporte40_view';

			$this->load->view('backend/includes/template', $data);		
	}


	public function reporte41()
	{
			$data['restriccion'] = $this->restriccion ;
			$data['nav'] = TRUE;
			$data['title'] = 'Tabulados Pescador';	
			$data['nom_tabulados'] = $this->tabulados_model->get_nombre_tabulados();
			$data['opcion'] = 41;		
			$data['tables'] = $this->tabulados_model->get_report41();

			$texto = ($this->tabulados_model->get_texto(1,$data['opcion'])->num_rows() > 0)  ?  $texto = $this->tabulados_model->get_texto(1,$data['opcion'])->row()->texto  :  '';
			$data['texto'] =  $texto; 
			$texto_2 = ($this->tabulados_model->get_texto(1,$data['opcion'])->num_rows() > 0)  ?  $texto_2 = $this->tabulados_model->get_texto(1,$data['opcion'])->row()->texto_2  :  '';
			$data['texto_2'] =  $texto_2; 
			$data['nombres_mapa'] = $this->tabulados_model->get_nombre_mapa($data['opcion']); // nombre de los tabulados
			$data['respuesta_unica'] = $this->tabulados_model->get_tipo_respuesta($data['opcion']);

			$metadata = $this->tabulados_model->get_metadata(1,$data['opcion']); 
			$data['txt_tabulado'] 	= ( $metadata->num_rows()==1 )  ?  $metadata->row()->tabulado  :  ''; 
			$data['txt_contenido'] 	= ( $metadata->num_rows()==1 )  ?  $metadata->row()->contenido  :  ''; 
			$data['txt_casos'] 		= ( $metadata->num_rows()==1 )  ?  $metadata->row()->casos  :  ''; 
			$data['txt_variables'] 	= ( $metadata->num_rows()==1 )  ?  $metadata->row()->variable  :  ''; 
			$data['txt_alternativas'] = ( $metadata->num_rows()==1 )  ?  $metadata->row()->alternativas  :  ''; 
			$data['txt_otro'] 		= ( $metadata->num_rows()==1 )  ?  $metadata->row()->otro  :  ''; 
			$data['txt_faltantes'] 	= ( $metadata->num_rows()==1 )  ?  $metadata->row()->faltantes  :  ''; 
			$data['txt_productor'] 	= ( $metadata->num_rows()==1 )  ?  $metadata->row()->productor :  ''; 
			$data['txt_definiciones'] = ( $metadata->num_rows()==1 )  ?  $metadata->row()->definiciones  :  '';	

			$data['main_content'] = 'tabulados/pescador/reporte41_view';

			$this->load->view('backend/includes/template', $data);
	}

	public function reporte42()
	{
			$data['restriccion'] = $this->restriccion ;
			$data['nav'] = TRUE;
			$data['title'] = 'Tabulados Pescador';	
			$data['nom_tabulados'] = $this->tabulados_model->get_nombre_tabulados();
			$data['opcion'] = 42;		
			$data['tables'] = $this->tabulados_model->get_report42();

			$texto = ($this->tabulados_model->get_texto(1,$data['opcion'])->num_rows() > 0)  ?  $texto = $this->tabulados_model->get_texto(1,$data['opcion'])->row()->texto  :  '';
			$data['texto'] =  $texto; 
			$texto_2 = ($this->tabulados_model->get_texto(1,$data['opcion'])->num_rows() > 0)  ?  $texto_2 = $this->tabulados_model->get_texto(1,$data['opcion'])->row()->texto_2  :  '';
			$data['texto_2'] =  $texto_2; 
			$data['nombres_mapa'] = $this->tabulados_model->get_nombre_mapa($data['opcion']); // nombre de los tabulados
			$data['respuesta_unica'] = $this->tabulados_model->get_tipo_respuesta($data['opcion']);

			$metadata = $this->tabulados_model->get_metadata(1,$data['opcion']); 
			$data['txt_tabulado'] 	= ( $metadata->num_rows()==1 )  ?  $metadata->row()->tabulado  :  ''; 
			$data['txt_contenido'] 	= ( $metadata->num_rows()==1 )  ?  $metadata->row()->contenido  :  ''; 
			$data['txt_casos'] 		= ( $metadata->num_rows()==1 )  ?  $metadata->row()->casos  :  ''; 
			$data['txt_variables'] 	= ( $metadata->num_rows()==1 )  ?  $metadata->row()->variable  :  ''; 
			$data['txt_alternativas'] = ( $metadata->num_rows()==1 )  ?  $metadata->row()->alternativas  :  ''; 
			$data['txt_otro'] 		= ( $metadata->num_rows()==1 )  ?  $metadata->row()->otro  :  ''; 
			$data['txt_faltantes'] 	= ( $metadata->num_rows()==1 )  ?  $metadata->row()->faltantes  :  ''; 
			$data['txt_productor'] 	= ( $metadata->num_rows()==1 )  ?  $metadata->row()->productor :  ''; 
			$data['txt_definiciones'] = ( $metadata->num_rows()==1 )  ?  $metadata->row()->definiciones  :  '';	

			$data['main_content'] = 'tabulados/pescador/reporte42_view';

			$this->load->view('backend/includes/template', $data);	
	}

	public function reporte43()
	{
			$data['restriccion'] = $this->restriccion ;
			$data['nav'] = TRUE;
			$data['title'] = 'Tabulados Pescador';	
			$data['nom_tabulados'] = $this->tabulados_model->get_nombre_tabulados();
			$data['opcion'] = 43;		
			$data['tables'] = $this->tabulados_model->get_report43();

			$texto = ($this->tabulados_model->get_texto(1,$data['opcion'])->num_rows() > 0)  ?  $texto = $this->tabulados_model->get_texto(1,$data['opcion'])->row()->texto  :  '';
			$data['texto'] =  $texto; 
			$texto_2 = ($this->tabulados_model->get_texto(1,$data['opcion'])->num_rows() > 0)  ?  $texto_2 = $this->tabulados_model->get_texto(1,$data['opcion'])->row()->texto_2  :  '';
			$data['texto_2'] =  $texto_2; 
			$data['nombres_mapa'] = $this->tabulados_model->get_nombre_mapa($data['opcion']); // nombre de los tabulados
			$data['respuesta_unica'] = $this->tabulados_model->get_tipo_respuesta($data['opcion']);

			$metadata = $this->tabulados_model->get_metadata(1,$data['opcion']); 
			$data['txt_tabulado'] 	= ( $metadata->num_rows()==1 )  ?  $metadata->row()->tabulado  :  ''; 
			$data['txt_contenido'] 	= ( $metadata->num_rows()==1 )  ?  $metadata->row()->contenido  :  ''; 
			$data['txt_casos'] 		= ( $metadata->num_rows()==1 )  ?  $metadata->row()->casos  :  ''; 
			$data['txt_variables'] 	= ( $metadata->num_rows()==1 )  ?  $metadata->row()->variable  :  ''; 
			$data['txt_alternativas'] = ( $metadata->num_rows()==1 )  ?  $metadata->row()->alternativas  :  ''; 
			$data['txt_otro'] 		= ( $metadata->num_rows()==1 )  ?  $metadata->row()->otro  :  ''; 
			$data['txt_faltantes'] 	= ( $metadata->num_rows()==1 )  ?  $metadata->row()->faltantes  :  ''; 
			$data['txt_productor'] 	= ( $metadata->num_rows()==1 )  ?  $metadata->row()->productor :  ''; 
			$data['txt_definiciones'] = ( $metadata->num_rows()==1 )  ?  $metadata->row()->definiciones  :  '';	

			$data['main_content'] = 'tabulados/pescador/reporte43_view';

			$this->load->view('backend/includes/template', $data);		
	}

	public function reporte44()
	{
			$data['restriccion'] = $this->restriccion ;
			$data['nav'] = TRUE;
			$data['title'] = 'Tabulados Pescador';	
			$data['nom_tabulados'] = $this->tabulados_model->get_nombre_tabulados();
			$data['opcion'] = 44;		
			$data['tables'] = $this->tabulados_model->get_report44();

			$texto = ($this->tabulados_model->get_texto(1,$data['opcion'])->num_rows() > 0)  ?  $texto = $this->tabulados_model->get_texto(1,$data['opcion'])->row()->texto  :  '';
			$data['texto'] =  $texto; 
			$texto_2 = ($this->tabulados_model->get_texto(1,$data['opcion'])->num_rows() > 0)  ?  $texto_2 = $this->tabulados_model->get_texto(1,$data['opcion'])->row()->texto_2  :  '';
			$data['texto_2'] =  $texto_2; 
			$data['nombres_mapa'] = $this->tabulados_model->get_nombre_mapa($data['opcion']); // nombre de los tabulados
			$data['respuesta_unica'] = $this->tabulados_model->get_tipo_respuesta($data['opcion']);

			$metadata = $this->tabulados_model->get_metadata(1,$data['opcion']); 
			$data['txt_tabulado'] 	= ( $metadata->num_rows()==1 )  ?  $metadata->row()->tabulado  :  ''; 
			$data['txt_contenido'] 	= ( $metadata->num_rows()==1 )  ?  $metadata->row()->contenido  :  ''; 
			$data['txt_casos'] 		= ( $metadata->num_rows()==1 )  ?  $metadata->row()->casos  :  ''; 
			$data['txt_variables'] 	= ( $metadata->num_rows()==1 )  ?  $metadata->row()->variable  :  ''; 
			$data['txt_alternativas'] = ( $metadata->num_rows()==1 )  ?  $metadata->row()->alternativas  :  ''; 
			$data['txt_otro'] 		= ( $metadata->num_rows()==1 )  ?  $metadata->row()->otro  :  ''; 
			$data['txt_faltantes'] 	= ( $metadata->num_rows()==1 )  ?  $metadata->row()->faltantes  :  ''; 
			$data['txt_productor'] 	= ( $metadata->num_rows()==1 )  ?  $metadata->row()->productor :  ''; 
			$data['txt_definiciones'] = ( $metadata->num_rows()==1 )  ?  $metadata->row()->definiciones  :  '';	

			$data['main_content'] = 'tabulados/pescador/reporte44_view';

			$this->load->view('backend/includes/template', $data);	
	}


	public function reporte45()
	{
			$data['restriccion'] = $this->restriccion ;
			$data['nav'] = TRUE;
			$data['title'] = 'Tabulados Pescador';	
			$data['nom_tabulados'] = $this->tabulados_model->get_nombre_tabulados();
			$data['opcion'] = 45;		
			$data['tables'] = $this->tabulados_model->get_report45();

			$texto = ($this->tabulados_model->get_texto(1,$data['opcion'])->num_rows() > 0)  ?  $texto = $this->tabulados_model->get_texto(1,$data['opcion'])->row()->texto  :  '';
			$data['texto'] =  $texto; 
			$texto_2 = ($this->tabulados_model->get_texto(1,$data['opcion'])->num_rows() > 0)  ?  $texto_2 = $this->tabulados_model->get_texto(1,$data['opcion'])->row()->texto_2  :  '';
			$data['texto_2'] =  $texto_2; 
			$data['nombres_mapa'] = $this->tabulados_model->get_nombre_mapa($data['opcion']); // nombre de los tabulados
			$data['respuesta_unica'] = $this->tabulados_model->get_tipo_respuesta($data['opcion']);

			$metadata = $this->tabulados_model->get_metadata(1,$data['opcion']); 
			$data['txt_tabulado'] 	= ( $metadata->num_rows()==1 )  ?  $metadata->row()->tabulado  :  ''; 
			$data['txt_contenido'] 	= ( $metadata->num_rows()==1 )  ?  $metadata->row()->contenido  :  ''; 
			$data['txt_casos'] 		= ( $metadata->num_rows()==1 )  ?  $metadata->row()->casos  :  ''; 
			$data['txt_variables'] 	= ( $metadata->num_rows()==1 )  ?  $metadata->row()->variable  :  ''; 
			$data['txt_alternativas'] = ( $metadata->num_rows()==1 )  ?  $metadata->row()->alternativas  :  ''; 
			$data['txt_otro'] 		= ( $metadata->num_rows()==1 )  ?  $metadata->row()->otro  :  ''; 
			$data['txt_faltantes'] 	= ( $metadata->num_rows()==1 )  ?  $metadata->row()->faltantes  :  ''; 
			$data['txt_productor'] 	= ( $metadata->num_rows()==1 )  ?  $metadata->row()->productor :  ''; 
			$data['txt_definiciones'] = ( $metadata->num_rows()==1 )  ?  $metadata->row()->definiciones  :  '';	

			$data['main_content'] = 'tabulados/pescador/reporte45_view';

			$this->load->view('backend/includes/template', $data);		
	}

	public function reporte46()
	{
			$data['restriccion'] = $this->restriccion ;
			$data['nav'] = TRUE;
			$data['title'] = 'Tabulados Pescador';	
			$data['nom_tabulados'] = $this->tabulados_model->get_nombre_tabulados();
			$data['opcion'] = 46;		
			$data['tables'] = $this->tabulados_model->get_report46();

			$texto = ($this->tabulados_model->get_texto(1,$data['opcion'])->num_rows() > 0)  ?  $texto = $this->tabulados_model->get_texto(1,$data['opcion'])->row()->texto  :  '';
			$data['texto'] =  $texto; 
			$texto_2 = ($this->tabulados_model->get_texto(1,$data['opcion'])->num_rows() > 0)  ?  $texto_2 = $this->tabulados_model->get_texto(1,$data['opcion'])->row()->texto_2  :  '';
			$data['texto_2'] =  $texto_2; 
			$data['nombres_mapa'] = $this->tabulados_model->get_nombre_mapa($data['opcion']); // nombre de los tabulados
			$data['respuesta_unica'] = $this->tabulados_model->get_tipo_respuesta($data['opcion']);

			$metadata = $this->tabulados_model->get_metadata(1,$data['opcion']); 
			$data['txt_tabulado'] 	= ( $metadata->num_rows()==1 )  ?  $metadata->row()->tabulado  :  ''; 
			$data['txt_contenido'] 	= ( $metadata->num_rows()==1 )  ?  $metadata->row()->contenido  :  ''; 
			$data['txt_casos'] 		= ( $metadata->num_rows()==1 )  ?  $metadata->row()->casos  :  ''; 
			$data['txt_variables'] 	= ( $metadata->num_rows()==1 )  ?  $metadata->row()->variable  :  ''; 
			$data['txt_alternativas'] = ( $metadata->num_rows()==1 )  ?  $metadata->row()->alternativas  :  ''; 
			$data['txt_otro'] 		= ( $metadata->num_rows()==1 )  ?  $metadata->row()->otro  :  ''; 
			$data['txt_faltantes'] 	= ( $metadata->num_rows()==1 )  ?  $metadata->row()->faltantes  :  ''; 
			$data['txt_productor'] 	= ( $metadata->num_rows()==1 )  ?  $metadata->row()->productor :  ''; 
			$data['txt_definiciones'] = ( $metadata->num_rows()==1 )  ?  $metadata->row()->definiciones  :  '';	

			$data['main_content'] = 'tabulados/pescador/reporte46_view';

			$this->load->view('backend/includes/template', $data);	
	}

	public function reporte47()
	{
			$data['restriccion'] = $this->restriccion ;
			$data['nav'] = TRUE;
			$data['title'] = 'Tabulados Pescador';	
			$data['nom_tabulados'] = $this->tabulados_model->get_nombre_tabulados();
			$data['opcion'] = 47;		
			$data['tables'] = $this->tabulados_model->get_report47();

			$texto = ($this->tabulados_model->get_texto(1,$data['opcion'])->num_rows() > 0)  ?  $texto = $this->tabulados_model->get_texto(1,$data['opcion'])->row()->texto  :  '';
			$data['texto'] =  $texto; 
			$texto_2 = ($this->tabulados_model->get_texto(1,$data['opcion'])->num_rows() > 0)  ?  $texto_2 = $this->tabulados_model->get_texto(1,$data['opcion'])->row()->texto_2  :  '';
			$data['texto_2'] =  $texto_2; 
			$data['nombres_mapa'] = $this->tabulados_model->get_nombre_mapa($data['opcion']); // nombre de los tabulados
			$data['respuesta_unica'] = $this->tabulados_model->get_tipo_respuesta($data['opcion']);

			$metadata = $this->tabulados_model->get_metadata(1,$data['opcion']); 
			$data['txt_tabulado'] 	= ( $metadata->num_rows()==1 )  ?  $metadata->row()->tabulado  :  ''; 
			$data['txt_contenido'] 	= ( $metadata->num_rows()==1 )  ?  $metadata->row()->contenido  :  ''; 
			$data['txt_casos'] 		= ( $metadata->num_rows()==1 )  ?  $metadata->row()->casos  :  ''; 
			$data['txt_variables'] 	= ( $metadata->num_rows()==1 )  ?  $metadata->row()->variable  :  ''; 
			$data['txt_alternativas'] = ( $metadata->num_rows()==1 )  ?  $metadata->row()->alternativas  :  ''; 
			$data['txt_otro'] 		= ( $metadata->num_rows()==1 )  ?  $metadata->row()->otro  :  ''; 
			$data['txt_faltantes'] 	= ( $metadata->num_rows()==1 )  ?  $metadata->row()->faltantes  :  ''; 
			$data['txt_productor'] 	= ( $metadata->num_rows()==1 )  ?  $metadata->row()->productor :  ''; 
			$data['txt_definiciones'] = ( $metadata->num_rows()==1 )  ?  $metadata->row()->definiciones  :  '';	

			$data['main_content'] = 'tabulados/pescador/reporte47_view';

			$this->load->view('backend/includes/template', $data);		
	}

	public function reporte48()
	{
			$data['restriccion'] = $this->restriccion ;
			$data['nav'] = TRUE;
			$data['title'] = 'Tabulados Pescador';	
			$data['nom_tabulados'] = $this->tabulados_model->get_nombre_tabulados();
			$data['opcion'] = 48;		
			$data['tables'] = $this->tabulados_model->get_report48();

			$texto = ($this->tabulados_model->get_texto(1,$data['opcion'])->num_rows() > 0)  ?  $texto = $this->tabulados_model->get_texto(1,$data['opcion'])->row()->texto  :  '';
			$data['texto'] =  $texto; 
			$texto_2 = ($this->tabulados_model->get_texto(1,$data['opcion'])->num_rows() > 0)  ?  $texto_2 = $this->tabulados_model->get_texto(1,$data['opcion'])->row()->texto_2  :  '';
			$data['texto_2'] =  $texto_2; 
			$data['nombres_mapa'] = $this->tabulados_model->get_nombre_mapa($data['opcion']); // nombre de los tabulados
			$data['respuesta_unica'] = $this->tabulados_model->get_tipo_respuesta($data['opcion']);

			$metadata = $this->tabulados_model->get_metadata(1,$data['opcion']); 
			$data['txt_tabulado'] 	= ( $metadata->num_rows()==1 )  ?  $metadata->row()->tabulado  :  ''; 
			$data['txt_contenido'] 	= ( $metadata->num_rows()==1 )  ?  $metadata->row()->contenido  :  ''; 
			$data['txt_casos'] 		= ( $metadata->num_rows()==1 )  ?  $metadata->row()->casos  :  ''; 
			$data['txt_variables'] 	= ( $metadata->num_rows()==1 )  ?  $metadata->row()->variable  :  ''; 
			$data['txt_alternativas'] = ( $metadata->num_rows()==1 )  ?  $metadata->row()->alternativas  :  ''; 
			$data['txt_otro'] 		= ( $metadata->num_rows()==1 )  ?  $metadata->row()->otro  :  ''; 
			$data['txt_faltantes'] 	= ( $metadata->num_rows()==1 )  ?  $metadata->row()->faltantes  :  ''; 
			$data['txt_productor'] 	= ( $metadata->num_rows()==1 )  ?  $metadata->row()->productor :  ''; 
			$data['txt_definiciones'] = ( $metadata->num_rows()==1 )  ?  $metadata->row()->definiciones  :  '';	

			$data['main_content'] = 'tabulados/pescador/reporte48_view';

			$this->load->view('backend/includes/template', $data);	
	}
	public function reporte49()
	{
			$data['restriccion'] = $this->restriccion ;
			$data['nav'] = TRUE;
			$data['title'] = 'Tabulados Pescador';	
			$data['nom_tabulados'] = $this->tabulados_model->get_nombre_tabulados();
			$data['opcion'] = 49;		
			$data['tables'] = $this->tabulados_model->get_report49();

			$texto = ($this->tabulados_model->get_texto(1,$data['opcion'])->num_rows() > 0)  ?  $texto = $this->tabulados_model->get_texto(1,$data['opcion'])->row()->texto  :  '';
			$data['texto'] =  $texto; 
			$texto_2 = ($this->tabulados_model->get_texto(1,$data['opcion'])->num_rows() > 0)  ?  $texto_2 = $this->tabulados_model->get_texto(1,$data['opcion'])->row()->texto_2  :  '';
			$data['texto_2'] =  $texto_2; 
			$data['nombres_mapa'] = $this->tabulados_model->get_nombre_mapa($data['opcion']); // nombre de los tabulados
			$data['respuesta_unica'] = $this->tabulados_model->get_tipo_respuesta($data['opcion']);

			$metadata = $this->tabulados_model->get_metadata(1,$data['opcion']); 
			$data['txt_tabulado'] 	= ( $metadata->num_rows()==1 )  ?  $metadata->row()->tabulado  :  ''; 
			$data['txt_contenido'] 	= ( $metadata->num_rows()==1 )  ?  $metadata->row()->contenido  :  ''; 
			$data['txt_casos'] 		= ( $metadata->num_rows()==1 )  ?  $metadata->row()->casos  :  ''; 
			$data['txt_variables'] 	= ( $metadata->num_rows()==1 )  ?  $metadata->row()->variable  :  ''; 
			$data['txt_alternativas'] = ( $metadata->num_rows()==1 )  ?  $metadata->row()->alternativas  :  ''; 
			$data['txt_otro'] 		= ( $metadata->num_rows()==1 )  ?  $metadata->row()->otro  :  ''; 
			$data['txt_faltantes'] 	= ( $metadata->num_rows()==1 )  ?  $metadata->row()->faltantes  :  ''; 
			$data['txt_productor'] 	= ( $metadata->num_rows()==1 )  ?  $metadata->row()->productor :  ''; 
			$data['txt_definiciones'] = ( $metadata->num_rows()==1 )  ?  $metadata->row()->definiciones  :  '';	

			$data['main_content'] = 'tabulados/pescador/reporte49_view';

			$this->load->view('backend/includes/template', $data);		
	}


	public function reporte50()
	{
			$data['restriccion'] = $this->restriccion ;
			$data['nav'] = TRUE;
			$data['title'] = 'Tabulados Pescador';	
			$data['nom_tabulados'] = $this->tabulados_model->get_nombre_tabulados();
			$data['opcion'] = 50;		
			$data['tables'] = $this->tabulados_model->get_report50();

			$texto = ($this->tabulados_model->get_texto(1,$data['opcion'])->num_rows() > 0)  ?  $texto = $this->tabulados_model->get_texto(1,$data['opcion'])->row()->texto  :  '';
			$data['texto'] =  $texto; 
			$texto_2 = ($this->tabulados_model->get_texto(1,$data['opcion'])->num_rows() > 0)  ?  $texto_2 = $this->tabulados_model->get_texto(1,$data['opcion'])->row()->texto_2  :  '';
			$data['texto_2'] =  $texto_2; 
			$data['nombres_mapa'] = $this->tabulados_model->get_nombre_mapa($data['opcion']); // nombre de los tabulados
			$data['respuesta_unica'] = $this->tabulados_model->get_tipo_respuesta($data['opcion']);

			$metadata = $this->tabulados_model->get_metadata(1,$data['opcion']); 
			$data['txt_tabulado'] 	= ( $metadata->num_rows()==1 )  ?  $metadata->row()->tabulado  :  ''; 
			$data['txt_contenido'] 	= ( $metadata->num_rows()==1 )  ?  $metadata->row()->contenido  :  ''; 
			$data['txt_casos'] 		= ( $metadata->num_rows()==1 )  ?  $metadata->row()->casos  :  ''; 
			$data['txt_variables'] 	= ( $metadata->num_rows()==1 )  ?  $metadata->row()->variable  :  ''; 
			$data['txt_alternativas'] = ( $metadata->num_rows()==1 )  ?  $metadata->row()->alternativas  :  ''; 
			$data['txt_otro'] 		= ( $metadata->num_rows()==1 )  ?  $metadata->row()->otro  :  ''; 
			$data['txt_faltantes'] 	= ( $metadata->num_rows()==1 )  ?  $metadata->row()->faltantes  :  ''; 
			$data['txt_productor'] 	= ( $metadata->num_rows()==1 )  ?  $metadata->row()->productor :  ''; 
			$data['txt_definiciones'] = ( $metadata->num_rows()==1 )  ?  $metadata->row()->definiciones  :  '';	

			$data['main_content'] = 'tabulados/pescador/reporte50_view';

			$this->load->view('backend/includes/template', $data);	
	}


	public function reporte51()
	{
			$data['restriccion'] = $this->restriccion ;
			$data['nav'] = TRUE;
			$data['title'] = 'Tabulados Pescador';	
			$data['nom_tabulados'] = $this->tabulados_model->get_nombre_tabulados();
			$data['opcion'] = 51;		
			$data['tables'] = $this->tabulados_model->get_report51();

			$texto = ($this->tabulados_model->get_texto(1,$data['opcion'])->num_rows() > 0)  ?  $texto = $this->tabulados_model->get_texto(1,$data['opcion'])->row()->texto  :  '';
			$data['texto'] =  $texto; 
			$texto_2 = ($this->tabulados_model->get_texto(1,$data['opcion'])->num_rows() > 0)  ?  $texto_2 = $this->tabulados_model->get_texto(1,$data['opcion'])->row()->texto_2  :  '';
			$data['texto_2'] =  $texto_2; 
			$data['nombres_mapa'] = $this->tabulados_model->get_nombre_mapa($data['opcion']); // nombre de los tabulados
			$data['respuesta_unica'] = $this->tabulados_model->get_tipo_respuesta($data['opcion']);

			$metadata = $this->tabulados_model->get_metadata(1,$data['opcion']); 
			$data['txt_tabulado'] 	= ( $metadata->num_rows()==1 )  ?  $metadata->row()->tabulado  :  ''; 
			$data['txt_contenido'] 	= ( $metadata->num_rows()==1 )  ?  $metadata->row()->contenido  :  ''; 
			$data['txt_casos'] 		= ( $metadata->num_rows()==1 )  ?  $metadata->row()->casos  :  ''; 
			$data['txt_variables'] 	= ( $metadata->num_rows()==1 )  ?  $metadata->row()->variable  :  ''; 
			$data['txt_alternativas'] = ( $metadata->num_rows()==1 )  ?  $metadata->row()->alternativas  :  ''; 
			$data['txt_otro'] 		= ( $metadata->num_rows()==1 )  ?  $metadata->row()->otro  :  ''; 
			$data['txt_faltantes'] 	= ( $metadata->num_rows()==1 )  ?  $metadata->row()->faltantes  :  ''; 
			$data['txt_productor'] 	= ( $metadata->num_rows()==1 )  ?  $metadata->row()->productor :  ''; 
			$data['txt_definiciones'] = ( $metadata->num_rows()==1 )  ?  $metadata->row()->definiciones  :  '';	

			$data['main_content'] = 'tabulados/pescador/reporte51_view';

			$this->load->view('backend/includes/template', $data);		
	}


	public function reporte52()
	{
			$data['restriccion'] = $this->restriccion ;
			$data['nav'] = TRUE;
			$data['title'] = 'Tabulados Pescador';	
			$data['nom_tabulados'] = $this->tabulados_model->get_nombre_tabulados();
			$data['opcion'] = 52;		
			$data['tables'] = $this->tabulados_model->get_report52();

			$texto = ($this->tabulados_model->get_texto(1,$data['opcion'])->num_rows() > 0)  ?  $texto = $this->tabulados_model->get_texto(1,$data['opcion'])->row()->texto  :  '';
			$data['texto'] =  $texto; 
			$texto_2 = ($this->tabulados_model->get_texto(1,$data['opcion'])->num_rows() > 0)  ?  $texto_2 = $this->tabulados_model->get_texto(1,$data['opcion'])->row()->texto_2  :  '';
			$data['texto_2'] =  $texto_2; 
			$data['nombres_mapa'] = $this->tabulados_model->get_nombre_mapa($data['opcion']); // nombre de los tabulados
			$data['respuesta_unica'] = $this->tabulados_model->get_tipo_respuesta($data['opcion']);

			$metadata = $this->tabulados_model->get_metadata(1,$data['opcion']); 
			$data['txt_tabulado'] 	= ( $metadata->num_rows()==1 )  ?  $metadata->row()->tabulado  :  ''; 
			$data['txt_contenido'] 	= ( $metadata->num_rows()==1 )  ?  $metadata->row()->contenido  :  ''; 
			$data['txt_casos'] 		= ( $metadata->num_rows()==1 )  ?  $metadata->row()->casos  :  ''; 
			$data['txt_variables'] 	= ( $metadata->num_rows()==1 )  ?  $metadata->row()->variable  :  ''; 
			$data['txt_alternativas'] = ( $metadata->num_rows()==1 )  ?  $metadata->row()->alternativas  :  ''; 
			$data['txt_otro'] 		= ( $metadata->num_rows()==1 )  ?  $metadata->row()->otro  :  ''; 
			$data['txt_faltantes'] 	= ( $metadata->num_rows()==1 )  ?  $metadata->row()->faltantes  :  ''; 
			$data['txt_productor'] 	= ( $metadata->num_rows()==1 )  ?  $metadata->row()->productor :  ''; 
			$data['txt_definiciones'] = ( $metadata->num_rows()==1 )  ?  $metadata->row()->definiciones  :  '';	

			$data['main_content'] = 'tabulados/pescador/reporte52_view';

			$this->load->view('backend/includes/template', $data);	
	}


	public function reporte53()
	{
			$data['restriccion'] = $this->restriccion ;
			$data['nav'] = TRUE;
			$data['title'] = 'Tabulados Pescador';	
			$data['nom_tabulados'] = $this->tabulados_model->get_nombre_tabulados();
			$data['opcion'] = 53;		
			$data['tables'] = $this->tabulados_model->get_report53();

			$texto = ($this->tabulados_model->get_texto(1,$data['opcion'])->num_rows() > 0)  ?  $texto = $this->tabulados_model->get_texto(1,$data['opcion'])->row()->texto  :  '';
			$data['texto'] =  $texto; 
			$texto_2 = ($this->tabulados_model->get_texto(1,$data['opcion'])->num_rows() > 0)  ?  $texto_2 = $this->tabulados_model->get_texto(1,$data['opcion'])->row()->texto_2  :  '';
			$data['texto_2'] =  $texto_2; 
			$data['nombres_mapa'] = $this->tabulados_model->get_nombre_mapa($data['opcion']); // nombre de los tabulados
			$data['respuesta_unica'] = $this->tabulados_model->get_tipo_respuesta($data['opcion']);

			$metadata = $this->tabulados_model->get_metadata(1,$data['opcion']); 
			$data['txt_tabulado'] 	= ( $metadata->num_rows()==1 )  ?  $metadata->row()->tabulado  :  ''; 
			$data['txt_contenido'] 	= ( $metadata->num_rows()==1 )  ?  $metadata->row()->contenido  :  ''; 
			$data['txt_casos'] 		= ( $metadata->num_rows()==1 )  ?  $metadata->row()->casos  :  ''; 
			$data['txt_variables'] 	= ( $metadata->num_rows()==1 )  ?  $metadata->row()->variable  :  ''; 
			$data['txt_alternativas'] = ( $metadata->num_rows()==1 )  ?  $metadata->row()->alternativas  :  ''; 
			$data['txt_otro'] 		= ( $metadata->num_rows()==1 )  ?  $metadata->row()->otro  :  ''; 
			$data['txt_faltantes'] 	= ( $metadata->num_rows()==1 )  ?  $metadata->row()->faltantes  :  ''; 
			$data['txt_productor'] 	= ( $metadata->num_rows()==1 )  ?  $metadata->row()->productor :  ''; 
			$data['txt_definiciones'] = ( $metadata->num_rows()==1 )  ?  $metadata->row()->definiciones  :  '';	

			$data['main_content'] = 'tabulados/pescador/reporte53_view';

			$this->load->view('backend/includes/template', $data);		
	}

	public function reporte54()
	{
			$data['restriccion'] = $this->restriccion ;
			$data['nav'] = TRUE;
			$data['title'] = 'Tabulados Pescador';	
			$data['nom_tabulados'] = $this->tabulados_model->get_nombre_tabulados();
			$data['opcion'] = 54;		
			$data['tables'] = $this->tabulados_model->get_report54();

			$texto = ($this->tabulados_model->get_texto(1,$data['opcion'])->num_rows() > 0)  ?  $texto = $this->tabulados_model->get_texto(1,$data['opcion'])->row()->texto  :  '';
			$data['texto'] =  $texto; 
			$texto_2 = ($this->tabulados_model->get_texto(1,$data['opcion'])->num_rows() > 0)  ?  $texto_2 = $this->tabulados_model->get_texto(1,$data['opcion'])->row()->texto_2  :  '';
			$data['texto_2'] =  $texto_2; 
			$data['nombres_mapa'] = $this->tabulados_model->get_nombre_mapa($data['opcion']); // nombre de los tabulados
			$data['respuesta_unica'] = $this->tabulados_model->get_tipo_respuesta($data['opcion']);

			$metadata = $this->tabulados_model->get_metadata(1,$data['opcion']); 
			$data['txt_tabulado'] 	= ( $metadata->num_rows()==1 )  ?  $metadata->row()->tabulado  :  ''; 
			$data['txt_contenido'] 	= ( $metadata->num_rows()==1 )  ?  $metadata->row()->contenido  :  ''; 
			$data['txt_casos'] 		= ( $metadata->num_rows()==1 )  ?  $metadata->row()->casos  :  ''; 
			$data['txt_variables'] 	= ( $metadata->num_rows()==1 )  ?  $metadata->row()->variable  :  ''; 
			$data['txt_alternativas'] = ( $metadata->num_rows()==1 )  ?  $metadata->row()->alternativas  :  ''; 
			$data['txt_otro'] 		= ( $metadata->num_rows()==1 )  ?  $metadata->row()->otro  :  ''; 
			$data['txt_faltantes'] 	= ( $metadata->num_rows()==1 )  ?  $metadata->row()->faltantes  :  ''; 
			$data['txt_productor'] 	= ( $metadata->num_rows()==1 )  ?  $metadata->row()->productor :  ''; 
			$data['txt_definiciones'] = ( $metadata->num_rows()==1 )  ?  $metadata->row()->definiciones  :  '';	

			$data['main_content'] = 'tabulados/pescador/reporte54_view';

			$this->load->view('backend/includes/template', $data);			
	}

	public function reporte55()
	{
			$data['restriccion'] = $this->restriccion ;
			$data['nav'] = TRUE;
			$data['title'] = 'Tabulados Pescador';	
			$data['nom_tabulados'] = $this->tabulados_model->get_nombre_tabulados();
			$data['opcion'] = 55;		
			$data['tables'] = $this->tabulados_model->get_report55();

			$texto = ($this->tabulados_model->get_texto(1,$data['opcion'])->num_rows() > 0)  ?  $texto = $this->tabulados_model->get_texto(1,$data['opcion'])->row()->texto  :  '';
			$data['texto'] =  $texto; 
			$texto_2 = ($this->tabulados_model->get_texto(1,$data['opcion'])->num_rows() > 0)  ?  $texto_2 = $this->tabulados_model->get_texto(1,$data['opcion'])->row()->texto_2  :  '';
			$data['texto_2'] =  $texto_2; 
			$data['nombres_mapa'] = $this->tabulados_model->get_nombre_mapa($data['opcion']); // nombre de los tabulados
			$data['respuesta_unica'] = $this->tabulados_model->get_tipo_respuesta($data['opcion']);

			$metadata = $this->tabulados_model->get_metadata(1,$data['opcion']); 
			$data['txt_tabulado'] 	= ( $metadata->num_rows()==1 )  ?  $metadata->row()->tabulado  :  ''; 
			$data['txt_contenido'] 	= ( $metadata->num_rows()==1 )  ?  $metadata->row()->contenido  :  ''; 
			$data['txt_casos'] 		= ( $metadata->num_rows()==1 )  ?  $metadata->row()->casos  :  ''; 
			$data['txt_variables'] 	= ( $metadata->num_rows()==1 )  ?  $metadata->row()->variable  :  ''; 
			$data['txt_alternativas'] = ( $metadata->num_rows()==1 )  ?  $metadata->row()->alternativas  :  ''; 
			$data['txt_otro'] 		= ( $metadata->num_rows()==1 )  ?  $metadata->row()->otro  :  ''; 
			$data['txt_faltantes'] 	= ( $metadata->num_rows()==1 )  ?  $metadata->row()->faltantes  :  ''; 
			$data['txt_productor'] 	= ( $metadata->num_rows()==1 )  ?  $metadata->row()->productor :  ''; 
			$data['txt_definiciones'] = ( $metadata->num_rows()==1 )  ?  $metadata->row()->definiciones  :  '';	

			$data['main_content'] = 'tabulados/pescador/reporte55_view';

			$this->load->view('backend/includes/template', $data);		
	}

	public function reporte56()
	{
			$data['restriccion'] = $this->restriccion ;
			$data['nav'] = TRUE;
			$data['title'] = 'Tabulados Pescador';	
			$data['nom_tabulados'] = $this->tabulados_model->get_nombre_tabulados();
			$data['opcion'] = 56;		
			$data['tables'] = $this->tabulados_model->get_report56();

			$texto = ($this->tabulados_model->get_texto(1,$data['opcion'])->num_rows() > 0)  ?  $texto = $this->tabulados_model->get_texto(1,$data['opcion'])->row()->texto  :  '';
			$data['texto'] =  $texto; 
			$texto_2 = ($this->tabulados_model->get_texto(1,$data['opcion'])->num_rows() > 0)  ?  $texto_2 = $this->tabulados_model->get_texto(1,$data['opcion'])->row()->texto_2  :  '';
			$data['texto_2'] =  $texto_2; 
			$data['nombres_mapa'] = $this->tabulados_model->get_nombre_mapa($data['opcion']); // nombre de los tabulados
			$data['respuesta_unica'] = $this->tabulados_model->get_tipo_respuesta($data['opcion']);

			$metadata = $this->tabulados_model->get_metadata(1,$data['opcion']); 
			$data['txt_tabulado'] 	= ( $metadata->num_rows()==1 )  ?  $metadata->row()->tabulado  :  ''; 
			$data['txt_contenido'] 	= ( $metadata->num_rows()==1 )  ?  $metadata->row()->contenido  :  ''; 
			$data['txt_casos'] 		= ( $metadata->num_rows()==1 )  ?  $metadata->row()->casos  :  ''; 
			$data['txt_variables'] 	= ( $metadata->num_rows()==1 )  ?  $metadata->row()->variable  :  ''; 
			$data['txt_alternativas'] = ( $metadata->num_rows()==1 )  ?  $metadata->row()->alternativas  :  ''; 
			$data['txt_otro'] 		= ( $metadata->num_rows()==1 )  ?  $metadata->row()->otro  :  ''; 
			$data['txt_faltantes'] 	= ( $metadata->num_rows()==1 )  ?  $metadata->row()->faltantes  :  ''; 
			$data['txt_productor'] 	= ( $metadata->num_rows()==1 )  ?  $metadata->row()->productor :  ''; 
			$data['txt_definiciones'] = ( $metadata->num_rows()==1 )  ?  $metadata->row()->definiciones  :  '';	

			$data['main_content'] = 'tabulados/pescador/reporte56_view';

			$this->load->view('backend/includes/template', $data);		
	}


	public function reporte57()
	{
			$data['restriccion'] = $this->restriccion ;
			$data['nav'] = TRUE;
			$data['title'] = 'Tabulados Pescador';	
			$data['nom_tabulados'] = $this->tabulados_model->get_nombre_tabulados();
			$data['opcion'] = 57;		
			$data['tables'] = $this->tabulados_model->get_report57();

			$texto = ($this->tabulados_model->get_texto(1,$data['opcion'])->num_rows() > 0)  ?  $texto = $this->tabulados_model->get_texto(1,$data['opcion'])->row()->texto  :  '';
			$data['texto'] =  $texto; 
			$texto_2 = ($this->tabulados_model->get_texto(1,$data['opcion'])->num_rows() > 0)  ?  $texto_2 = $this->tabulados_model->get_texto(1,$data['opcion'])->row()->texto_2  :  '';
			$data['texto_2'] =  $texto_2; 
			$data['nombres_mapa'] = $this->tabulados_model->get_nombre_mapa($data['opcion']); // nombre de los tabulados
			$data['respuesta_unica'] = $this->tabulados_model->get_tipo_respuesta($data['opcion']);

			$metadata = $this->tabulados_model->get_metadata(1,$data['opcion']); 
			$data['txt_tabulado'] 	= ( $metadata->num_rows()==1 )  ?  $metadata->row()->tabulado  :  ''; 
			$data['txt_contenido'] 	= ( $metadata->num_rows()==1 )  ?  $metadata->row()->contenido  :  ''; 
			$data['txt_casos'] 		= ( $metadata->num_rows()==1 )  ?  $metadata->row()->casos  :  ''; 
			$data['txt_variables'] 	= ( $metadata->num_rows()==1 )  ?  $metadata->row()->variable  :  ''; 
			$data['txt_alternativas'] = ( $metadata->num_rows()==1 )  ?  $metadata->row()->alternativas  :  ''; 
			$data['txt_otro'] 		= ( $metadata->num_rows()==1 )  ?  $metadata->row()->otro  :  ''; 
			$data['txt_faltantes'] 	= ( $metadata->num_rows()==1 )  ?  $metadata->row()->faltantes  :  ''; 
			$data['txt_productor'] 	= ( $metadata->num_rows()==1 )  ?  $metadata->row()->productor :  ''; 
			$data['txt_definiciones'] = ( $metadata->num_rows()==1 )  ?  $metadata->row()->definiciones  :  '';	

			$data['main_content'] = 'tabulados/pescador/reporte57_view';

			$this->load->view('backend/includes/template', $data);		
	}

	public function reporte58()
	{
			$data['restriccion'] = $this->restriccion ;
			$data['nav'] = TRUE;
			$data['title'] = 'Tabulados Pescador';	
			$data['nom_tabulados'] = $this->tabulados_model->get_nombre_tabulados();
			$data['opcion'] = 58;		
			$data['tables'] = $this->tabulados_model->get_report58();

			$texto = ($this->tabulados_model->get_texto(1,$data['opcion'])->num_rows() > 0)  ?  $texto = $this->tabulados_model->get_texto(1,$data['opcion'])->row()->texto  :  '';
			$data['texto'] =  $texto; 
			$texto_2 = ($this->tabulados_model->get_texto(1,$data['opcion'])->num_rows() > 0)  ?  $texto_2 = $this->tabulados_model->get_texto(1,$data['opcion'])->row()->texto_2  :  '';
			$data['texto_2'] =  $texto_2; 
			$data['nombres_mapa'] = $this->tabulados_model->get_nombre_mapa($data['opcion']); // nombre de los tabulados
			$data['respuesta_unica'] = $this->tabulados_model->get_tipo_respuesta($data['opcion']);

			$metadata = $this->tabulados_model->get_metadata(1,$data['opcion']); 
			$data['txt_tabulado'] 	= ( $metadata->num_rows()==1 )  ?  $metadata->row()->tabulado  :  ''; 
			$data['txt_contenido'] 	= ( $metadata->num_rows()==1 )  ?  $metadata->row()->contenido  :  ''; 
			$data['txt_casos'] 		= ( $metadata->num_rows()==1 )  ?  $metadata->row()->casos  :  ''; 
			$data['txt_variables'] 	= ( $metadata->num_rows()==1 )  ?  $metadata->row()->variable  :  ''; 
			$data['txt_alternativas'] = ( $metadata->num_rows()==1 )  ?  $metadata->row()->alternativas  :  ''; 
			$data['txt_otro'] 		= ( $metadata->num_rows()==1 )  ?  $metadata->row()->otro  :  ''; 
			$data['txt_faltantes'] 	= ( $metadata->num_rows()==1 )  ?  $metadata->row()->faltantes  :  ''; 
			$data['txt_productor'] 	= ( $metadata->num_rows()==1 )  ?  $metadata->row()->productor :  ''; 
			$data['txt_definiciones'] = ( $metadata->num_rows()==1 )  ?  $metadata->row()->definiciones  :  '';	

			$data['main_content'] = 'tabulados/pescador/reporte58_view';

			$this->load->view('backend/includes/template', $data);		
	}

	public function reporte59()
	{
			$data['restriccion'] = $this->restriccion ;
			$data['nav'] = TRUE;
			$data['title'] = 'Tabulados Pescador';	
			$data['nom_tabulados'] = $this->tabulados_model->get_nombre_tabulados();
			$data['opcion'] = 59;		
			$data['tables'] = $this->tabulados_model->get_report59();

			$texto = ($this->tabulados_model->get_texto(1,$data['opcion'])->num_rows() > 0)  ?  $texto = $this->tabulados_model->get_texto(1,$data['opcion'])->row()->texto  :  '';
			$data['texto'] =  $texto; 
			$texto_2 = ($this->tabulados_model->get_texto(1,$data['opcion'])->num_rows() > 0)  ?  $texto_2 = $this->tabulados_model->get_texto(1,$data['opcion'])->row()->texto_2  :  '';
			$data['texto_2'] =  $texto_2; 
			$data['nombres_mapa'] = $this->tabulados_model->get_nombre_mapa($data['opcion']); // nombre de los tabulados
			$data['respuesta_unica'] = $this->tabulados_model->get_tipo_respuesta($data['opcion']);

			$metadata = $this->tabulados_model->get_metadata(1,$data['opcion']); 
			$data['txt_tabulado'] 	= ( $metadata->num_rows()==1 )  ?  $metadata->row()->tabulado  :  ''; 
			$data['txt_contenido'] 	= ( $metadata->num_rows()==1 )  ?  $metadata->row()->contenido  :  ''; 
			$data['txt_casos'] 		= ( $metadata->num_rows()==1 )  ?  $metadata->row()->casos  :  ''; 
			$data['txt_variables'] 	= ( $metadata->num_rows()==1 )  ?  $metadata->row()->variable  :  ''; 
			$data['txt_alternativas'] = ( $metadata->num_rows()==1 )  ?  $metadata->row()->alternativas  :  ''; 
			$data['txt_otro'] 		= ( $metadata->num_rows()==1 )  ?  $metadata->row()->otro  :  ''; 
			$data['txt_faltantes'] 	= ( $metadata->num_rows()==1 )  ?  $metadata->row()->faltantes  :  ''; 
			$data['txt_productor'] 	= ( $metadata->num_rows()==1 )  ?  $metadata->row()->productor :  ''; 
			$data['txt_definiciones'] = ( $metadata->num_rows()==1 )  ?  $metadata->row()->definiciones  :  '';	

			$data['main_content'] = 'tabulados/pescador/reporte59_view';

			$this->load->view('backend/includes/template', $data);			
	}


	public function reporte60()
	{
			$data['restriccion'] = $this->restriccion ;
			$data['nav'] = TRUE;
			$data['title'] = 'Tabulados Pescador';	
			$data['nom_tabulados'] = $this->tabulados_model->get_nombre_tabulados();
			$data['opcion'] = 60;		
			$data['tables'] = $this->tabulados_model->get_report60();

			$texto = ($this->tabulados_model->get_texto(1,$data['opcion'])->num_rows() > 0)  ?  $texto = $this->tabulados_model->get_texto(1,$data['opcion'])->row()->texto  :  '';
			$data['texto'] =  $texto; 
			$texto_2 = ($this->tabulados_model->get_texto(1,$data['opcion'])->num_rows() > 0)  ?  $texto_2 = $this->tabulados_model->get_texto(1,$data['opcion'])->row()->texto_2  :  '';
			$data['texto_2'] =  $texto_2; 
			$data['nombres_mapa'] = $this->tabulados_model->get_nombre_mapa($data['opcion']); // nombre de los tabulados
			$data['respuesta_unica'] = $this->tabulados_model->get_tipo_respuesta($data['opcion']);

			$metadata = $this->tabulados_model->get_metadata(1,$data['opcion']); 
			$data['txt_tabulado'] 	= ( $metadata->num_rows()==1 )  ?  $metadata->row()->tabulado  :  ''; 
			$data['txt_contenido'] 	= ( $metadata->num_rows()==1 )  ?  $metadata->row()->contenido  :  ''; 
			$data['txt_casos'] 		= ( $metadata->num_rows()==1 )  ?  $metadata->row()->casos  :  ''; 
			$data['txt_variables'] 	= ( $metadata->num_rows()==1 )  ?  $metadata->row()->variable  :  ''; 
			$data['txt_alternativas'] = ( $metadata->num_rows()==1 )  ?  $metadata->row()->alternativas  :  ''; 
			$data['txt_otro'] 		= ( $metadata->num_rows()==1 )  ?  $metadata->row()->otro  :  ''; 
			$data['txt_faltantes'] 	= ( $metadata->num_rows()==1 )  ?  $metadata->row()->faltantes  :  ''; 
			$data['txt_productor'] 	= ( $metadata->num_rows()==1 )  ?  $metadata->row()->productor :  ''; 
			$data['txt_definiciones'] = ( $metadata->num_rows()==1 )  ?  $metadata->row()->definiciones  :  '';	

			$data['main_content'] = 'tabulados/pescador/reporte60_view';

			$this->load->view('backend/includes/template', $data);			
	}

	public function reporte61()
	{
			$data['restriccion'] = $this->restriccion ;
			$data['nav'] = TRUE;
			$data['title'] = 'Tabulados Pescador';	
			$data['nom_tabulados'] = $this->tabulados_model->get_nombre_tabulados();
			$data['opcion'] = 61;		
			$data['tables'] = $this->tabulados_model->get_report61();

			$texto = ($this->tabulados_model->get_texto(1,$data['opcion'])->num_rows() > 0)  ?  $texto = $this->tabulados_model->get_texto(1,$data['opcion'])->row()->texto  :  '';
			$data['texto'] =  $texto; 
			$texto_2 = ($this->tabulados_model->get_texto(1,$data['opcion'])->num_rows() > 0)  ?  $texto_2 = $this->tabulados_model->get_texto(1,$data['opcion'])->row()->texto_2  :  '';
			$data['texto_2'] =  $texto_2; 
			$data['nombres_mapa'] = $this->tabulados_model->get_nombre_mapa($data['opcion']); // nombre de los tabulados
			$data['respuesta_unica'] = $this->tabulados_model->get_tipo_respuesta($data['opcion']);

			$metadata = $this->tabulados_model->get_metadata(1,$data['opcion']); 
			$data['txt_tabulado'] 	= ( $metadata->num_rows()==1 )  ?  $metadata->row()->tabulado  :  ''; 
			$data['txt_contenido'] 	= ( $metadata->num_rows()==1 )  ?  $metadata->row()->contenido  :  ''; 
			$data['txt_casos'] 		= ( $metadata->num_rows()==1 )  ?  $metadata->row()->casos  :  ''; 
			$data['txt_variables'] 	= ( $metadata->num_rows()==1 )  ?  $metadata->row()->variable  :  ''; 
			$data['txt_alternativas'] = ( $metadata->num_rows()==1 )  ?  $metadata->row()->alternativas  :  ''; 
			$data['txt_otro'] 		= ( $metadata->num_rows()==1 )  ?  $metadata->row()->otro  :  ''; 
			$data['txt_faltantes'] 	= ( $metadata->num_rows()==1 )  ?  $metadata->row()->faltantes  :  ''; 
			$data['txt_productor'] 	= ( $metadata->num_rows()==1 )  ?  $metadata->row()->productor :  ''; 
			$data['txt_definiciones'] = ( $metadata->num_rows()==1 )  ?  $metadata->row()->definiciones  :  '';	

			$data['main_content'] = 'tabulados/pescador/reporte61_view';

			$this->load->view('backend/includes/template', $data);			
	}

	public function reporte62()
	{
			$data['restriccion'] = $this->restriccion ;
			$data['nav'] = TRUE;
			$data['title'] = 'Tabulados Pescador';	
			$data['nom_tabulados'] = $this->tabulados_model->get_nombre_tabulados();
			$data['opcion'] = 62;		
			$data['tables'] = $this->tabulados_model->get_report62();

			$texto = ($this->tabulados_model->get_texto(1,$data['opcion'])->num_rows() > 0)  ?  $texto = $this->tabulados_model->get_texto(1,$data['opcion'])->row()->texto  :  '';
			$data['texto'] =  $texto; 
			$texto_2 = ($this->tabulados_model->get_texto(1,$data['opcion'])->num_rows() > 0)  ?  $texto_2 = $this->tabulados_model->get_texto(1,$data['opcion'])->row()->texto_2  :  '';
			$data['texto_2'] =  $texto_2; 
			$data['nombres_mapa'] = $this->tabulados_model->get_nombre_mapa($data['opcion']); // nombre de los tabulados
			$data['respuesta_unica'] = $this->tabulados_model->get_tipo_respuesta($data['opcion']);

			$metadata = $this->tabulados_model->get_metadata(1,$data['opcion']); 
			$data['txt_tabulado'] 	= ( $metadata->num_rows()==1 )  ?  $metadata->row()->tabulado  :  ''; 
			$data['txt_contenido'] 	= ( $metadata->num_rows()==1 )  ?  $metadata->row()->contenido  :  ''; 
			$data['txt_casos'] 		= ( $metadata->num_rows()==1 )  ?  $metadata->row()->casos  :  ''; 
			$data['txt_variables'] 	= ( $metadata->num_rows()==1 )  ?  $metadata->row()->variable  :  ''; 
			$data['txt_alternativas'] = ( $metadata->num_rows()==1 )  ?  $metadata->row()->alternativas  :  ''; 
			$data['txt_otro'] 		= ( $metadata->num_rows()==1 )  ?  $metadata->row()->otro  :  ''; 
			$data['txt_faltantes'] 	= ( $metadata->num_rows()==1 )  ?  $metadata->row()->faltantes  :  ''; 
			$data['txt_productor'] 	= ( $metadata->num_rows()==1 )  ?  $metadata->row()->productor :  ''; 
			$data['txt_definiciones'] = ( $metadata->num_rows()==1 )  ?  $metadata->row()->definiciones  :  '';	

			$data['main_content'] = 'tabulados/pescador/reporte62_view';

			$this->load->view('backend/includes/template', $data);			
	}

	public function reporte63()
	{
			$data['restriccion'] = $this->restriccion ;
			$data['nav'] = TRUE;
			$data['title'] = 'Tabulados Pescador';	
			$data['nom_tabulados'] = $this->tabulados_model->get_nombre_tabulados();
			$data['opcion'] = 63;		
			$data['tables'] = $this->tabulados_model->get_report63();

			$texto = ($this->tabulados_model->get_texto(1,$data['opcion'])->num_rows() > 0)  ?  $texto = $this->tabulados_model->get_texto(1,$data['opcion'])->row()->texto  :  '';
			$data['texto'] =  $texto; 
			$texto_2 = ($this->tabulados_model->get_texto(1,$data['opcion'])->num_rows() > 0)  ?  $texto_2 = $this->tabulados_model->get_texto(1,$data['opcion'])->row()->texto_2  :  '';
			$data['texto_2'] =  $texto_2; 
			$data['nombres_mapa'] = $this->tabulados_model->get_nombre_mapa($data['opcion']); // nombre de los tabulados
			$data['respuesta_unica'] = $this->tabulados_model->get_tipo_respuesta($data['opcion']);

			$metadata = $this->tabulados_model->get_metadata(1,$data['opcion']); 
			$data['txt_tabulado'] 	= ( $metadata->num_rows()==1 )  ?  $metadata->row()->tabulado  :  ''; 
			$data['txt_contenido'] 	= ( $metadata->num_rows()==1 )  ?  $metadata->row()->contenido  :  ''; 
			$data['txt_casos'] 		= ( $metadata->num_rows()==1 )  ?  $metadata->row()->casos  :  ''; 
			$data['txt_variables'] 	= ( $metadata->num_rows()==1 )  ?  $metadata->row()->variable  :  ''; 
			$data['txt_alternativas'] = ( $metadata->num_rows()==1 )  ?  $metadata->row()->alternativas  :  ''; 
			$data['txt_otro'] 		= ( $metadata->num_rows()==1 )  ?  $metadata->row()->otro  :  ''; 
			$data['txt_faltantes'] 	= ( $metadata->num_rows()==1 )  ?  $metadata->row()->faltantes  :  ''; 
			$data['txt_productor'] 	= ( $metadata->num_rows()==1 )  ?  $metadata->row()->productor :  ''; 
			$data['txt_definiciones'] = ( $metadata->num_rows()==1 )  ?  $metadata->row()->definiciones  :  '';	

			$data['main_content'] = 'tabulados/pescador/reporte63_view';

			$this->load->view('backend/includes/template', $data);			
	}

	public function reporte64()
	{
			$data['restriccion'] = $this->restriccion ;
			$data['nav'] = TRUE;
			$data['title'] = 'Tabulados Pescador';	
			$data['nom_tabulados'] = $this->tabulados_model->get_nombre_tabulados();
			$data['opcion'] = 64;		
			$data['tables'] = $this->tabulados_model->get_report64();

			$texto = ($this->tabulados_model->get_texto(1,$data['opcion'])->num_rows() > 0)  ?  $texto = $this->tabulados_model->get_texto(1,$data['opcion'])->row()->texto  :  '';
			$data['texto'] =  $texto; 
			$texto_2 = ($this->tabulados_model->get_texto(1,$data['opcion'])->num_rows() > 0)  ?  $texto_2 = $this->tabulados_model->get_texto(1,$data['opcion'])->row()->texto_2  :  '';
			$data['texto_2'] =  $texto_2; 
			$data['nombres_mapa'] = $this->tabulados_model->get_nombre_mapa($data['opcion']); // nombre de los tabulados
			$data['respuesta_unica'] = $this->tabulados_model->get_tipo_respuesta($data['opcion']);

			$metadata = $this->tabulados_model->get_metadata(1,$data['opcion']); 
			$data['txt_tabulado'] 	= ( $metadata->num_rows()==1 )  ?  $metadata->row()->tabulado  :  ''; 
			$data['txt_contenido'] 	= ( $metadata->num_rows()==1 )  ?  $metadata->row()->contenido  :  ''; 
			$data['txt_casos'] 		= ( $metadata->num_rows()==1 )  ?  $metadata->row()->casos  :  ''; 
			$data['txt_variables'] 	= ( $metadata->num_rows()==1 )  ?  $metadata->row()->variable  :  ''; 
			$data['txt_alternativas'] = ( $metadata->num_rows()==1 )  ?  $metadata->row()->alternativas  :  ''; 
			$data['txt_otro'] 		= ( $metadata->num_rows()==1 )  ?  $metadata->row()->otro  :  ''; 
			$data['txt_faltantes'] 	= ( $metadata->num_rows()==1 )  ?  $metadata->row()->faltantes  :  ''; 
			$data['txt_productor'] 	= ( $metadata->num_rows()==1 )  ?  $metadata->row()->productor :  ''; 
			$data['txt_definiciones'] = ( $metadata->num_rows()==1 )  ?  $metadata->row()->definiciones  :  '';	

			$data['main_content'] = 'tabulados/pescador/reporte64_view';

			$this->load->view('backend/includes/template', $data);				
	}

	public function reporte65()
	{
			$data['restriccion'] = $this->restriccion ;
			$data['nav'] = TRUE;
			$data['title'] = 'Tabulados Pescador';	
			$data['nom_tabulados'] = $this->tabulados_model->get_nombre_tabulados();
			$data['opcion'] = 65;		
			$data['tables'] = $this->tabulados_model->get_report65();

			$texto = ($this->tabulados_model->get_texto(1,$data['opcion'])->num_rows() > 0)  ?  $texto = $this->tabulados_model->get_texto(1,$data['opcion'])->row()->texto  :  '';
			$data['texto'] =  $texto; 
			$texto_2 = ($this->tabulados_model->get_texto(1,$data['opcion'])->num_rows() > 0)  ?  $texto_2 = $this->tabulados_model->get_texto(1,$data['opcion'])->row()->texto_2  :  '';
			$data['texto_2'] =  $texto_2; 
			$data['nombres_mapa'] = $this->tabulados_model->get_nombre_mapa($data['opcion']); // nombre de los tabulados
			$data['respuesta_unica'] = $this->tabulados_model->get_tipo_respuesta($data['opcion']);

			$metadata = $this->tabulados_model->get_metadata(1,$data['opcion']); 
			$data['txt_tabulado'] 	= ( $metadata->num_rows()==1 )  ?  $metadata->row()->tabulado  :  ''; 
			$data['txt_contenido'] 	= ( $metadata->num_rows()==1 )  ?  $metadata->row()->contenido  :  ''; 
			$data['txt_casos'] 		= ( $metadata->num_rows()==1 )  ?  $metadata->row()->casos  :  ''; 
			$data['txt_variables'] 	= ( $metadata->num_rows()==1 )  ?  $metadata->row()->variable  :  ''; 
			$data['txt_alternativas'] = ( $metadata->num_rows()==1 )  ?  $metadata->row()->alternativas  :  ''; 
			$data['txt_otro'] 		= ( $metadata->num_rows()==1 )  ?  $metadata->row()->otro  :  ''; 
			$data['txt_faltantes'] 	= ( $metadata->num_rows()==1 )  ?  $metadata->row()->faltantes  :  ''; 
			$data['txt_productor'] 	= ( $metadata->num_rows()==1 )  ?  $metadata->row()->productor :  ''; 
			$data['txt_definiciones'] = ( $metadata->num_rows()==1 )  ?  $metadata->row()->definiciones  :  '';	

			$data['main_content'] = 'tabulados/pescador/reporte65_view';

			$this->load->view('backend/includes/template', $data);			
	}


	public function reporte66()
	{
			$data['restriccion'] = $this->restriccion ;
			$data['nav'] = TRUE;
			$data['title'] = 'Tabulados Pescador';	
			$data['nom_tabulados'] = $this->tabulados_model->get_nombre_tabulados();
			$data['opcion'] = 66;		
			$data['tables'] = $this->tabulados_model->get_report66();

			$texto = ($this->tabulados_model->get_texto(1,$data['opcion'])->num_rows() > 0)  ?  $texto = $this->tabulados_model->get_texto(1,$data['opcion'])->row()->texto  :  '';
			$data['texto'] =  $texto; 
			$texto_2 = ($this->tabulados_model->get_texto(1,$data['opcion'])->num_rows() > 0)  ?  $texto_2 = $this->tabulados_model->get_texto(1,$data['opcion'])->row()->texto_2  :  '';
			$data['texto_2'] =  $texto_2; 
			$data['nombres_mapa'] = $this->tabulados_model->get_nombre_mapa($data['opcion']); // nombre de los tabulados
			$data['respuesta_unica'] = $this->tabulados_model->get_tipo_respuesta($data['opcion']);

			$metadata = $this->tabulados_model->get_metadata(1,$data['opcion']); 
			$data['txt_tabulado'] 	= ( $metadata->num_rows()==1 )  ?  $metadata->row()->tabulado  :  ''; 
			$data['txt_contenido'] 	= ( $metadata->num_rows()==1 )  ?  $metadata->row()->contenido  :  ''; 
			$data['txt_casos'] 		= ( $metadata->num_rows()==1 )  ?  $metadata->row()->casos  :  ''; 
			$data['txt_variables'] 	= ( $metadata->num_rows()==1 )  ?  $metadata->row()->variable  :  ''; 
			$data['txt_alternativas'] = ( $metadata->num_rows()==1 )  ?  $metadata->row()->alternativas  :  ''; 
			$data['txt_otro'] 		= ( $metadata->num_rows()==1 )  ?  $metadata->row()->otro  :  ''; 
			$data['txt_faltantes'] 	= ( $metadata->num_rows()==1 )  ?  $metadata->row()->faltantes  :  ''; 
			$data['txt_productor'] 	= ( $metadata->num_rows()==1 )  ?  $metadata->row()->productor :  ''; 
			$data['txt_definiciones'] = ( $metadata->num_rows()==1 )  ?  $metadata->row()->definiciones  :  '';	

			$data['main_content'] = 'tabulados/pescador/reporte66_view';

			$this->load->view('backend/includes/template', $data);			
	}

	public function reporte67()
	{
			$data['restriccion'] = $this->restriccion ;
			$data['nav'] = TRUE;
			$data['title'] = 'Tabulados Pescador';	
			$data['nom_tabulados'] = $this->tabulados_model->get_nombre_tabulados();
			$data['opcion'] = 67;		
			$data['tables'] = $this->tabulados_model->get_report67();

			$texto = ($this->tabulados_model->get_texto(1,$data['opcion'])->num_rows() > 0)  ?  $texto = $this->tabulados_model->get_texto(1,$data['opcion'])->row()->texto  :  '';
			$data['texto'] =  $texto; 
			$texto_2 = ($this->tabulados_model->get_texto(1,$data['opcion'])->num_rows() > 0)  ?  $texto_2 = $this->tabulados_model->get_texto(1,$data['opcion'])->row()->texto_2  :  '';
			$data['texto_2'] =  $texto_2; 
			$data['nombres_mapa'] = $this->tabulados_model->get_nombre_mapa($data['opcion']); // nombre de los tabulados
			$data['respuesta_unica'] = $this->tabulados_model->get_tipo_respuesta($data['opcion']);

			$metadata = $this->tabulados_model->get_metadata(1,$data['opcion']); 
			$data['txt_tabulado'] 	= ( $metadata->num_rows()==1 )  ?  $metadata->row()->tabulado  :  ''; 
			$data['txt_contenido'] 	= ( $metadata->num_rows()==1 )  ?  $metadata->row()->contenido  :  ''; 
			$data['txt_casos'] 		= ( $metadata->num_rows()==1 )  ?  $metadata->row()->casos  :  ''; 
			$data['txt_variables'] 	= ( $metadata->num_rows()==1 )  ?  $metadata->row()->variable  :  ''; 
			$data['txt_alternativas'] = ( $metadata->num_rows()==1 )  ?  $metadata->row()->alternativas  :  ''; 
			$data['txt_otro'] 		= ( $metadata->num_rows()==1 )  ?  $metadata->row()->otro  :  ''; 
			$data['txt_faltantes'] 	= ( $metadata->num_rows()==1 )  ?  $metadata->row()->faltantes  :  ''; 
			$data['txt_productor'] 	= ( $metadata->num_rows()==1 )  ?  $metadata->row()->productor :  ''; 
			$data['txt_definiciones'] = ( $metadata->num_rows()==1 )  ?  $metadata->row()->definiciones  :  '';	

			$data['main_content'] = 'tabulados/pescador/reporte67_view';

			$this->load->view('backend/includes/template', $data);		
	}
	public function reporte68()
	{
			$data['restriccion'] = $this->restriccion ;
			$data['nav'] = TRUE;
			$data['title'] = 'Tabulados Pescador';	
			$data['nom_tabulados'] = $this->tabulados_model->get_nombre_tabulados();
			$data['opcion'] = 68;		
			$data['tables'] = $this->tabulados_model->get_report68();

			$texto = ($this->tabulados_model->get_texto(1,$data['opcion'])->num_rows() > 0)  ?  $texto = $this->tabulados_model->get_texto(1,$data['opcion'])->row()->texto  :  '';
			$data['texto'] =  $texto; 
			$texto_2 = ($this->tabulados_model->get_texto(1,$data['opcion'])->num_rows() > 0)  ?  $texto_2 = $this->tabulados_model->get_texto(1,$data['opcion'])->row()->texto_2  :  '';
			$data['texto_2'] =  $texto_2; 
			$data['nombres_mapa'] = $this->tabulados_model->get_nombre_mapa($data['opcion']); // nombre de los tabulados
			$data['respuesta_unica'] = $this->tabulados_model->get_tipo_respuesta($data['opcion']);

			$metadata = $this->tabulados_model->get_metadata(1,$data['opcion']); 
			$data['txt_tabulado'] 	= ( $metadata->num_rows()==1 )  ?  $metadata->row()->tabulado  :  ''; 
			$data['txt_contenido'] 	= ( $metadata->num_rows()==1 )  ?  $metadata->row()->contenido  :  ''; 
			$data['txt_casos'] 		= ( $metadata->num_rows()==1 )  ?  $metadata->row()->casos  :  ''; 
			$data['txt_variables'] 	= ( $metadata->num_rows()==1 )  ?  $metadata->row()->variable  :  ''; 
			$data['txt_alternativas'] = ( $metadata->num_rows()==1 )  ?  $metadata->row()->alternativas  :  ''; 
			$data['txt_otro'] 		= ( $metadata->num_rows()==1 )  ?  $metadata->row()->otro  :  ''; 
			$data['txt_faltantes'] 	= ( $metadata->num_rows()==1 )  ?  $metadata->row()->faltantes  :  ''; 
			$data['txt_productor'] 	= ( $metadata->num_rows()==1 )  ?  $metadata->row()->productor :  ''; 
			$data['txt_definiciones'] = ( $metadata->num_rows()==1 )  ?  $metadata->row()->definiciones  :  '';	

			$data['main_content'] = 'tabulados/pescador/reporte68_view';

			$this->load->view('backend/includes/template', $data);			
	}


	public function reporte69()
	{
			$data['restriccion'] = $this->restriccion ;
			$data['nav'] = TRUE;
			$data['title'] = 'Tabulados Pescador';	
			$data['nom_tabulados'] = $this->tabulados_model->get_nombre_tabulados();
			$data['opcion'] = 69;		
			$data['tables'] = $this->tabulados_model->get_report69();

			$texto = ($this->tabulados_model->get_texto(1,$data['opcion'])->num_rows() > 0)  ?  $texto = $this->tabulados_model->get_texto(1,$data['opcion'])->row()->texto  :  '';
			$data['texto'] =  $texto; 
			$texto_2 = ($this->tabulados_model->get_texto(1,$data['opcion'])->num_rows() > 0)  ?  $texto_2 = $this->tabulados_model->get_texto(1,$data['opcion'])->row()->texto_2  :  '';
			$data['texto_2'] =  $texto_2; 
			$data['nombres_mapa'] = $this->tabulados_model->get_nombre_mapa($data['opcion']); // nombre de los tabulados
			$data['respuesta_unica'] = $this->tabulados_model->get_tipo_respuesta($data['opcion']);

			$metadata = $this->tabulados_model->get_metadata(1,$data['opcion']); 
			$data['txt_tabulado'] 	= ( $metadata->num_rows()==1 )  ?  $metadata->row()->tabulado  :  ''; 
			$data['txt_contenido'] 	= ( $metadata->num_rows()==1 )  ?  $metadata->row()->contenido  :  ''; 
			$data['txt_casos'] 		= ( $metadata->num_rows()==1 )  ?  $metadata->row()->casos  :  ''; 
			$data['txt_variables'] 	= ( $metadata->num_rows()==1 )  ?  $metadata->row()->variable  :  ''; 
			$data['txt_alternativas'] = ( $metadata->num_rows()==1 )  ?  $metadata->row()->alternativas  :  ''; 
			$data['txt_otro'] 		= ( $metadata->num_rows()==1 )  ?  $metadata->row()->otro  :  ''; 
			$data['txt_faltantes'] 	= ( $metadata->num_rows()==1 )  ?  $metadata->row()->faltantes  :  ''; 
			$data['txt_productor'] 	= ( $metadata->num_rows()==1 )  ?  $metadata->row()->productor :  ''; 
			$data['txt_definiciones'] = ( $metadata->num_rows()==1 )  ?  $metadata->row()->definiciones  :  '';	

			$data['main_content'] = 'tabulados/pescador/reporte69_view';

			$this->load->view('backend/includes/template', $data);		
	}



	public function reporte70()
	{
			$data['restriccion'] = $this->restriccion ;
			$data['nav'] = TRUE;
			$data['title'] = 'Tabulados Pescador';	
			$data['nom_tabulados'] = $this->tabulados_model->get_nombre_tabulados();
			$data['opcion'] = 70;		
			$data['tables'] = $this->tabulados_model->get_report70();

			$texto = ($this->tabulados_model->get_texto(1,$data['opcion'])->num_rows() > 0)  ?  $texto = $this->tabulados_model->get_texto(1,$data['opcion'])->row()->texto  :  '';
			$data['texto'] =  $texto; 
			$texto_2 = ($this->tabulados_model->get_texto(1,$data['opcion'])->num_rows() > 0)  ?  $texto_2 = $this->tabulados_model->get_texto(1,$data['opcion'])->row()->texto_2  :  '';
			$data['texto_2'] =  $texto_2; 
			$data['nombres_mapa'] = $this->tabulados_model->get_nombre_mapa($data['opcion']); // nombre de los tabulados
			$data['respuesta_unica'] = $this->tabulados_model->get_tipo_respuesta($data['opcion']);

			$metadata = $this->tabulados_model->get_metadata(1,$data['opcion']); 
			$data['txt_tabulado'] 	= ( $metadata->num_rows()==1 )  ?  $metadata->row()->tabulado  :  ''; 
			$data['txt_contenido'] 	= ( $metadata->num_rows()==1 )  ?  $metadata->row()->contenido  :  ''; 
			$data['txt_casos'] 		= ( $metadata->num_rows()==1 )  ?  $metadata->row()->casos  :  ''; 
			$data['txt_variables'] 	= ( $metadata->num_rows()==1 )  ?  $metadata->row()->variable  :  ''; 
			$data['txt_alternativas'] = ( $metadata->num_rows()==1 )  ?  $metadata->row()->alternativas  :  ''; 
			$data['txt_otro'] 		= ( $metadata->num_rows()==1 )  ?  $metadata->row()->otro  :  ''; 
			$data['txt_faltantes'] 	= ( $metadata->num_rows()==1 )  ?  $metadata->row()->faltantes  :  ''; 
			$data['txt_productor'] 	= ( $metadata->num_rows()==1 )  ?  $metadata->row()->productor :  ''; 
			$data['txt_definiciones'] = ( $metadata->num_rows()==1 )  ?  $metadata->row()->definiciones  :  '';	

			$data['main_content'] = 'tabulados/pescador/reporte70_view';

			$this->load->view('backend/includes/template', $data);			
	}


	public function reporte71()
	{
			$data['restriccion'] = $this->restriccion ;
			$data['nav'] = TRUE;
			$data['title'] = 'Tabulados Pescador';	
			$data['nom_tabulados'] = $this->tabulados_model->get_nombre_tabulados();
			$data['opcion'] = 71;		
			$data['tables'] = $this->tabulados_model->get_report71();

			$texto = ($this->tabulados_model->get_texto(1,$data['opcion'])->num_rows() > 0)  ?  $texto = $this->tabulados_model->get_texto(1,$data['opcion'])->row()->texto  :  '';
			$data['texto'] =  $texto; 
			$texto_2 = ($this->tabulados_model->get_texto(1,$data['opcion'])->num_rows() > 0)  ?  $texto_2 = $this->tabulados_model->get_texto(1,$data['opcion'])->row()->texto_2  :  '';
			$data['texto_2'] =  $texto_2; 
			$data['nombres_mapa'] = $this->tabulados_model->get_nombre_mapa($data['opcion']); // nombre de los tabulados
			$data['respuesta_unica'] = $this->tabulados_model->get_tipo_respuesta($data['opcion']);

			$metadata = $this->tabulados_model->get_metadata(1,$data['opcion']); 
			$data['txt_tabulado'] 	= ( $metadata->num_rows()==1 )  ?  $metadata->row()->tabulado  :  ''; 
			$data['txt_contenido'] 	= ( $metadata->num_rows()==1 )  ?  $metadata->row()->contenido  :  ''; 
			$data['txt_casos'] 		= ( $metadata->num_rows()==1 )  ?  $metadata->row()->casos  :  ''; 
			$data['txt_variables'] 	= ( $metadata->num_rows()==1 )  ?  $metadata->row()->variable  :  ''; 
			$data['txt_alternativas'] = ( $metadata->num_rows()==1 )  ?  $metadata->row()->alternativas  :  ''; 
			$data['txt_otro'] 		= ( $metadata->num_rows()==1 )  ?  $metadata->row()->otro  :  ''; 
			$data['txt_faltantes'] 	= ( $metadata->num_rows()==1 )  ?  $metadata->row()->faltantes  :  ''; 
			$data['txt_productor'] 	= ( $metadata->num_rows()==1 )  ?  $metadata->row()->productor :  ''; 
			$data['txt_definiciones'] = ( $metadata->num_rows()==1 )  ?  $metadata->row()->definiciones  :  '';	

			$data['main_content'] = 'tabulados/pescador/reporte71_view';

			$this->load->view('backend/includes/template', $data);			
	}


	public function reporte72()
	{
			$data['restriccion'] = $this->restriccion ;
			$data['nav'] = TRUE;
			$data['title'] = 'Tabulados Pescador';	
			$data['nom_tabulados'] = $this->tabulados_model->get_nombre_tabulados();
			$data['opcion'] = 72;		
			$data['tables'] = $this->tabulados_model->get_report72();

			$texto = ($this->tabulados_model->get_texto(1,$data['opcion'])->num_rows() > 0)  ?  $texto = $this->tabulados_model->get_texto(1,$data['opcion'])->row()->texto  :  '';
			$data['texto'] =  $texto; 
			$texto_2 = ($this->tabulados_model->get_texto(1,$data['opcion'])->num_rows() > 0)  ?  $texto_2 = $this->tabulados_model->get_texto(1,$data['opcion'])->row()->texto_2  :  '';
			$data['texto_2'] =  $texto_2; 
			$data['nombres_mapa'] = $this->tabulados_model->get_nombre_mapa($data['opcion']); // nombre de los tabulados
			$data['respuesta_unica'] = $this->tabulados_model->get_tipo_respuesta($data['opcion']);

			$metadata = $this->tabulados_model->get_metadata(1,$data['opcion']); 
			$data['txt_tabulado'] 	= ( $metadata->num_rows()==1 )  ?  $metadata->row()->tabulado  :  ''; 
			$data['txt_contenido'] 	= ( $metadata->num_rows()==1 )  ?  $metadata->row()->contenido  :  ''; 
			$data['txt_casos'] 		= ( $metadata->num_rows()==1 )  ?  $metadata->row()->casos  :  ''; 
			$data['txt_variables'] 	= ( $metadata->num_rows()==1 )  ?  $metadata->row()->variable  :  ''; 
			$data['txt_alternativas'] = ( $metadata->num_rows()==1 )  ?  $metadata->row()->alternativas  :  ''; 
			$data['txt_otro'] 		= ( $metadata->num_rows()==1 )  ?  $metadata->row()->otro  :  ''; 
			$data['txt_faltantes'] 	= ( $metadata->num_rows()==1 )  ?  $metadata->row()->faltantes  :  ''; 
			$data['txt_productor'] 	= ( $metadata->num_rows()==1 )  ?  $metadata->row()->productor :  ''; 
			$data['txt_definiciones'] = ( $metadata->num_rows()==1 )  ?  $metadata->row()->definiciones  :  '';	

			$data['main_content'] = 'tabulados/pescador/reporte72_view';

			$this->load->view('backend/includes/template', $data);				
	}

	public function reporte73()
	{
			$data['restriccion'] = $this->restriccion ;
			$data['nav'] = TRUE;
			$data['title'] = 'Tabulados Pescador';	
			$data['nom_tabulados'] = $this->tabulados_model->get_nombre_tabulados();
			$data['opcion'] = 73;		
			$data['tables'] = $this->tabulados_model->get_report73();

			$texto = ($this->tabulados_model->get_texto(1,$data['opcion'])->num_rows() > 0)  ?  $texto = $this->tabulados_model->get_texto(1,$data['opcion'])->row()->texto  :  '';
			$data['texto'] =  $texto; 
			$texto_2 = ($this->tabulados_model->get_texto(1,$data['opcion'])->num_rows() > 0)  ?  $texto_2 = $this->tabulados_model->get_texto(1,$data['opcion'])->row()->texto_2  :  '';
			$data['texto_2'] =  $texto_2; 
			$data['nombres_mapa'] = $this->tabulados_model->get_nombre_mapa($data['opcion']); // nombre de los tabulados
			$data['respuesta_unica'] = $this->tabulados_model->get_tipo_respuesta($data['opcion']);

			$metadata = $this->tabulados_model->get_metadata(1,$data['opcion']); 
			$data['txt_tabulado'] 	= ( $metadata->num_rows()==1 )  ?  $metadata->row()->tabulado  :  ''; 
			$data['txt_contenido'] 	= ( $metadata->num_rows()==1 )  ?  $metadata->row()->contenido  :  ''; 
			$data['txt_casos'] 		= ( $metadata->num_rows()==1 )  ?  $metadata->row()->casos  :  ''; 
			$data['txt_variables'] 	= ( $metadata->num_rows()==1 )  ?  $metadata->row()->variable  :  ''; 
			$data['txt_alternativas'] = ( $metadata->num_rows()==1 )  ?  $metadata->row()->alternativas  :  ''; 
			$data['txt_otro'] 		= ( $metadata->num_rows()==1 )  ?  $metadata->row()->otro  :  ''; 
			$data['txt_faltantes'] 	= ( $metadata->num_rows()==1 )  ?  $metadata->row()->faltantes  :  ''; 
			$data['txt_productor'] 	= ( $metadata->num_rows()==1 )  ?  $metadata->row()->productor :  ''; 
			$data['txt_definiciones'] = ( $metadata->num_rows()==1 )  ?  $metadata->row()->definiciones  :  '';	

			$data['main_content'] = 'tabulados/pescador/reporte73_view';

			$this->load->view('backend/includes/template', $data);				
	}

	public function reporte74()
	{
			$data['restriccion'] = $this->restriccion ;
			$data['nav'] = TRUE;
			$data['title'] = 'Tabulados Pescador';	
			$data['nom_tabulados'] = $this->tabulados_model->get_nombre_tabulados();
			$data['opcion'] = 74;		
			$data['tables'] = $this->tabulados_model->get_report74();

			$texto = ($this->tabulados_model->get_texto(1,$data['opcion'])->num_rows() > 0)  ?  $texto = $this->tabulados_model->get_texto(1,$data['opcion'])->row()->texto  :  '';
			$data['texto'] =  $texto; 
			$texto_2 = ($this->tabulados_model->get_texto(1,$data['opcion'])->num_rows() > 0)  ?  $texto_2 = $this->tabulados_model->get_texto(1,$data['opcion'])->row()->texto_2  :  '';
			$data['texto_2'] =  $texto_2; 
			$data['nombres_mapa'] = $this->tabulados_model->get_nombre_mapa($data['opcion']); // nombre de los tabulados
			$data['respuesta_unica'] = $this->tabulados_model->get_tipo_respuesta($data['opcion']);

			$metadata = $this->tabulados_model->get_metadata(1,$data['opcion']); 
			$data['txt_tabulado'] 	= ( $metadata->num_rows()==1 )  ?  $metadata->row()->tabulado  :  ''; 
			$data['txt_contenido'] 	= ( $metadata->num_rows()==1 )  ?  $metadata->row()->contenido  :  ''; 
			$data['txt_casos'] 		= ( $metadata->num_rows()==1 )  ?  $metadata->row()->casos  :  ''; 
			$data['txt_variables'] 	= ( $metadata->num_rows()==1 )  ?  $metadata->row()->variable  :  ''; 
			$data['txt_alternativas'] = ( $metadata->num_rows()==1 )  ?  $metadata->row()->alternativas  :  ''; 
			$data['txt_otro'] 		= ( $metadata->num_rows()==1 )  ?  $metadata->row()->otro  :  ''; 
			$data['txt_faltantes'] 	= ( $metadata->num_rows()==1 )  ?  $metadata->row()->faltantes  :  ''; 
			$data['txt_productor'] 	= ( $metadata->num_rows()==1 )  ?  $metadata->row()->productor :  ''; 
			$data['txt_definiciones'] = ( $metadata->num_rows()==1 )  ?  $metadata->row()->definiciones  :  '';	

			$data['main_content'] = 'tabulados/pescador/reporte74_view';

			$this->load->view('backend/includes/template', $data);				
	}

	public function reporte75()
	{
			$data['restriccion'] = $this->restriccion ;
			$data['nav'] = TRUE;
			$data['title'] = 'Tabulados Pescador';	
			$data['nom_tabulados'] = $this->tabulados_model->get_nombre_tabulados();
			$data['opcion'] = 75;		
			$data['tables'] = $this->tabulados_model->get_report75();

			$texto = ($this->tabulados_model->get_texto(1,$data['opcion'])->num_rows() > 0)  ?  $texto = $this->tabulados_model->get_texto(1,$data['opcion'])->row()->texto  :  '';
			$data['texto'] =  $texto; 
			$texto_2 = ($this->tabulados_model->get_texto(1,$data['opcion'])->num_rows() > 0)  ?  $texto_2 = $this->tabulados_model->get_texto(1,$data['opcion'])->row()->texto_2  :  '';
			$data['texto_2'] =  $texto_2; 
			$data['nombres_mapa'] = $this->tabulados_model->get_nombre_mapa($data['opcion']); // nombre de los tabulados
			$data['respuesta_unica'] = $this->tabulados_model->get_tipo_respuesta($data['opcion']);

			$metadata = $this->tabulados_model->get_metadata(1,$data['opcion']); 
			$data['txt_tabulado'] 	= ( $metadata->num_rows()==1 )  ?  $metadata->row()->tabulado  :  ''; 
			$data['txt_contenido'] 	= ( $metadata->num_rows()==1 )  ?  $metadata->row()->contenido  :  ''; 
			$data['txt_casos'] 		= ( $metadata->num_rows()==1 )  ?  $metadata->row()->casos  :  ''; 
			$data['txt_variables'] 	= ( $metadata->num_rows()==1 )  ?  $metadata->row()->variable  :  ''; 
			$data['txt_alternativas'] = ( $metadata->num_rows()==1 )  ?  $metadata->row()->alternativas  :  ''; 
			$data['txt_otro'] 		= ( $metadata->num_rows()==1 )  ?  $metadata->row()->otro  :  ''; 
			$data['txt_faltantes'] 	= ( $metadata->num_rows()==1 )  ?  $metadata->row()->faltantes  :  ''; 
			$data['txt_productor'] 	= ( $metadata->num_rows()==1 )  ?  $metadata->row()->productor :  ''; 
			$data['txt_definiciones'] = ( $metadata->num_rows()==1 )  ?  $metadata->row()->definiciones  :  '';	

			$data['main_content'] = 'tabulados/pescador/reporte75_view';

			$this->load->view('backend/includes/template', $data);					
	}

	public function reporte76()
	{
			$data['restriccion'] = $this->restriccion ;
			$data['nav'] = TRUE;
			$data['title'] = 'Tabulados Pescador';	
			$data['nom_tabulados'] = $this->tabulados_model->get_nombre_tabulados();
			$data['opcion'] = 76;		
			$data['tables'] = $this->tabulados_model->get_report76();

			$texto = ($this->tabulados_model->get_texto(1,$data['opcion'])->num_rows() > 0)  ?  $texto = $this->tabulados_model->get_texto(1,$data['opcion'])->row()->texto  :  '';
			$data['texto'] =  $texto; 
			$texto_2 = ($this->tabulados_model->get_texto(1,$data['opcion'])->num_rows() > 0)  ?  $texto_2 = $this->tabulados_model->get_texto(1,$data['opcion'])->row()->texto_2  :  '';
			$data['texto_2'] =  $texto_2; 
			$data['nombres_mapa'] = $this->tabulados_model->get_nombre_mapa($data['opcion']); // nombre de los tabulados
			$data['respuesta_unica'] = $this->tabulados_model->get_tipo_respuesta($data['opcion']);

			$metadata = $this->tabulados_model->get_metadata(1,$data['opcion']); 
			$data['txt_tabulado'] 	= ( $metadata->num_rows()==1 )  ?  $metadata->row()->tabulado  :  ''; 
			$data['txt_contenido'] 	= ( $metadata->num_rows()==1 )  ?  $metadata->row()->contenido  :  ''; 
			$data['txt_casos'] 		= ( $metadata->num_rows()==1 )  ?  $metadata->row()->casos  :  ''; 
			$data['txt_variables'] 	= ( $metadata->num_rows()==1 )  ?  $metadata->row()->variable  :  ''; 
			$data['txt_alternativas'] = ( $metadata->num_rows()==1 )  ?  $metadata->row()->alternativas  :  ''; 
			$data['txt_otro'] 		= ( $metadata->num_rows()==1 )  ?  $metadata->row()->otro  :  ''; 
			$data['txt_faltantes'] 	= ( $metadata->num_rows()==1 )  ?  $metadata->row()->faltantes  :  ''; 
			$data['txt_productor'] 	= ( $metadata->num_rows()==1 )  ?  $metadata->row()->productor :  ''; 
			$data['txt_definiciones'] = ( $metadata->num_rows()==1 )  ?  $metadata->row()->definiciones  :  '';	

			$data['main_content'] = 'tabulados/pescador/reporte76_view';

			$this->load->view('backend/includes/template', $data);					
	}

	public function reporte77()
	{
			$data['restriccion'] = $this->restriccion ;
			$data['nav'] = TRUE;
			$data['title'] = 'Tabulados Pescador';	
			$data['nom_tabulados'] = $this->tabulados_model->get_nombre_tabulados();
			$data['opcion'] = 77;		
			$data['tables'] = $this->tabulados_model->get_report77();

			$texto = ($this->tabulados_model->get_texto(1,$data['opcion'])->num_rows() > 0)  ?  $texto = $this->tabulados_model->get_texto(1,$data['opcion'])->row()->texto  :  '';
			$data['texto'] =  $texto; 
			$texto_2 = ($this->tabulados_model->get_texto(1,$data['opcion'])->num_rows() > 0)  ?  $texto_2 = $this->tabulados_model->get_texto(1,$data['opcion'])->row()->texto_2  :  '';
			$data['texto_2'] =  $texto_2; 
			$data['nombres_mapa'] = $this->tabulados_model->get_nombre_mapa($data['opcion']); // nombre de los tabulados
			$data['respuesta_unica'] = $this->tabulados_model->get_tipo_respuesta($data['opcion']);

			$metadata = $this->tabulados_model->get_metadata(1,$data['opcion']); 
			$data['txt_tabulado'] 	= ( $metadata->num_rows()==1 )  ?  $metadata->row()->tabulado  :  ''; 
			$data['txt_contenido'] 	= ( $metadata->num_rows()==1 )  ?  $metadata->row()->contenido  :  ''; 
			$data['txt_casos'] 		= ( $metadata->num_rows()==1 )  ?  $metadata->row()->casos  :  ''; 
			$data['txt_variables'] 	= ( $metadata->num_rows()==1 )  ?  $metadata->row()->variable  :  ''; 
			$data['txt_alternativas'] = ( $metadata->num_rows()==1 )  ?  $metadata->row()->alternativas  :  ''; 
			$data['txt_otro'] 		= ( $metadata->num_rows()==1 )  ?  $metadata->row()->otro  :  ''; 
			$data['txt_faltantes'] 	= ( $metadata->num_rows()==1 )  ?  $metadata->row()->faltantes  :  ''; 
			$data['txt_productor'] 	= ( $metadata->num_rows()==1 )  ?  $metadata->row()->productor :  ''; 
			$data['txt_definiciones'] = ( $metadata->num_rows()==1 )  ?  $metadata->row()->definiciones  :  '';	

			$data['main_content'] = 'tabulados/pescador/reporte77_view';

			$this->load->view('backend/includes/template', $data);				
	}

	public function reporte78()
	{
			$data['restriccion'] = $this->restriccion ;
			$data['nav'] = TRUE;
			$data['title'] = 'Tabulados Pescador';	
			$data['nom_tabulados'] = $this->tabulados_model->get_nombre_tabulados();
			$data['opcion'] = 78;		
			$data['tables'] = $this->tabulados_model->get_report78();

			$texto = ($this->tabulados_model->get_texto(1,$data['opcion'])->num_rows() > 0)  ?  $texto = $this->tabulados_model->get_texto(1,$data['opcion'])->row()->texto  :  '';
			$data['texto'] =  $texto; 
			$texto_2 = ($this->tabulados_model->get_texto(1,$data['opcion'])->num_rows() > 0)  ?  $texto_2 = $this->tabulados_model->get_texto(1,$data['opcion'])->row()->texto_2  :  '';
			$data['texto_2'] =  $texto_2; 
			$data['nombres_mapa'] = $this->tabulados_model->get_nombre_mapa($data['opcion']); // nombre de los tabulados
			$data['respuesta_unica'] = $this->tabulados_model->get_tipo_respuesta($data['opcion']);

			$metadata = $this->tabulados_model->get_metadata(1,$data['opcion']); 
			$data['txt_tabulado'] 	= ( $metadata->num_rows()==1 )  ?  $metadata->row()->tabulado  :  ''; 
			$data['txt_contenido'] 	= ( $metadata->num_rows()==1 )  ?  $metadata->row()->contenido  :  ''; 
			$data['txt_casos'] 		= ( $metadata->num_rows()==1 )  ?  $metadata->row()->casos  :  ''; 
			$data['txt_variables'] 	= ( $metadata->num_rows()==1 )  ?  $metadata->row()->variable  :  ''; 
			$data['txt_alternativas'] = ( $metadata->num_rows()==1 )  ?  $metadata->row()->alternativas  :  ''; 
			$data['txt_otro'] 		= ( $metadata->num_rows()==1 )  ?  $metadata->row()->otro  :  ''; 
			$data['txt_faltantes'] 	= ( $metadata->num_rows()==1 )  ?  $metadata->row()->faltantes  :  ''; 
			$data['txt_productor'] 	= ( $metadata->num_rows()==1 )  ?  $metadata->row()->productor :  ''; 
			$data['txt_definiciones'] = ( $metadata->num_rows()==1 )  ?  $metadata->row()->definiciones  :  '';	

			$data['main_content'] = 'tabulados/pescador/reporte78_view';

			$this->load->view('backend/includes/template', $data);			
	}


	public function reporte79()
	{
			$data['restriccion'] = $this->restriccion ;
			$data['nav'] = TRUE;
			$data['title'] = 'Tabulados Pescador';	
			$data['nom_tabulados'] = $this->tabulados_model->get_nombre_tabulados();
			$data['opcion'] = 79;		
			$data['tables'] = $this->tabulados_model->get_report79();

			$texto = ($this->tabulados_model->get_texto(1,$data['opcion'])->num_rows() > 0)  ?  $texto = $this->tabulados_model->get_texto(1,$data['opcion'])->row()->texto  :  '';
			$data['texto'] =  $texto; 
			$texto_2 = ($this->tabulados_model->get_texto(1,$data['opcion'])->num_rows() > 0)  ?  $texto_2 = $this->tabulados_model->get_texto(1,$data['opcion'])->row()->texto_2  :  '';
			$data['texto_2'] =  $texto_2; 
			$data['nombres_mapa'] = $this->tabulados_model->get_nombre_mapa($data['opcion']); // nombre de los tabulados
			$data['respuesta_unica'] = $this->tabulados_model->get_tipo_respuesta($data['opcion']);

			$metadata = $this->tabulados_model->get_metadata(1,$data['opcion']); 
			$data['txt_tabulado'] 	= ( $metadata->num_rows()==1 )  ?  $metadata->row()->tabulado  :  ''; 
			$data['txt_contenido'] 	= ( $metadata->num_rows()==1 )  ?  $metadata->row()->contenido  :  ''; 
			$data['txt_casos'] 		= ( $metadata->num_rows()==1 )  ?  $metadata->row()->casos  :  ''; 
			$data['txt_variables'] 	= ( $metadata->num_rows()==1 )  ?  $metadata->row()->variable  :  ''; 
			$data['txt_alternativas'] = ( $metadata->num_rows()==1 )  ?  $metadata->row()->alternativas  :  ''; 
			$data['txt_otro'] 		= ( $metadata->num_rows()==1 )  ?  $metadata->row()->otro  :  ''; 
			$data['txt_faltantes'] 	= ( $metadata->num_rows()==1 )  ?  $metadata->row()->faltantes  :  ''; 
			$data['txt_productor'] 	= ( $metadata->num_rows()==1 )  ?  $metadata->row()->productor :  ''; 
			$data['txt_definiciones'] = ( $metadata->num_rows()==1 )  ?  $metadata->row()->definiciones  :  '';	

			$data['main_content'] = 'tabulados/pescador/reporte79_view';

			$this->load->view('backend/includes/template', $data);				
	}

	public function reporte80()
	{
			$data['restriccion'] = $this->restriccion ;
			$data['nav'] = TRUE;
			$data['title'] = 'Tabulados Pescador';	
			$data['nom_tabulados'] = $this->tabulados_model->get_nombre_tabulados();
			$data['opcion'] = 80;		
			$data['tables'] = $this->tabulados_model->get_report80();

			$texto = ($this->tabulados_model->get_texto(1,$data['opcion'])->num_rows() > 0)  ?  $texto = $this->tabulados_model->get_texto(1,$data['opcion'])->row()->texto  :  '';
			$data['texto'] =  $texto; 
			$texto_2 = ($this->tabulados_model->get_texto(1,$data['opcion'])->num_rows() > 0)  ?  $texto_2 = $this->tabulados_model->get_texto(1,$data['opcion'])->row()->texto_2  :  '';
			$data['texto_2'] =  $texto_2; 
			$data['nombres_mapa'] = $this->tabulados_model->get_nombre_mapa($data['opcion']); // nombre de los tabulados
			$data['respuesta_unica'] = $this->tabulados_model->get_tipo_respuesta($data['opcion']);

			$metadata = $this->tabulados_model->get_metadata(1,$data['opcion']); 
			$data['txt_tabulado'] 	= ( $metadata->num_rows()==1 )  ?  $metadata->row()->tabulado  :  ''; 
			$data['txt_contenido'] 	= ( $metadata->num_rows()==1 )  ?  $metadata->row()->contenido  :  ''; 
			$data['txt_casos'] 		= ( $metadata->num_rows()==1 )  ?  $metadata->row()->casos  :  ''; 
			$data['txt_variables'] 	= ( $metadata->num_rows()==1 )  ?  $metadata->row()->variable  :  ''; 
			$data['txt_alternativas'] = ( $metadata->num_rows()==1 )  ?  $metadata->row()->alternativas  :  ''; 
			$data['txt_otro'] 		= ( $metadata->num_rows()==1 )  ?  $metadata->row()->otro  :  ''; 
			$data['txt_faltantes'] 	= ( $metadata->num_rows()==1 )  ?  $metadata->row()->faltantes  :  ''; 
			$data['txt_productor'] 	= ( $metadata->num_rows()==1 )  ?  $metadata->row()->productor :  ''; 
			$data['txt_definiciones'] = ( $metadata->num_rows()==1 )  ?  $metadata->row()->definiciones  :  '';	

			$data['main_content'] = 'tabulados/pescador/reporte80_view';

			$this->load->view('backend/includes/template', $data);				
	}

	public function reporte81()
	{
			$data['restriccion'] = $this->restriccion ;
			$data['nav'] = TRUE;
			$data['title'] = 'Tabulados Pescador';	
			$data['nom_tabulados'] = $this->tabulados_model->get_nombre_tabulados();
			$data['opcion'] = 81;		
			$data['tables'] = $this->tabulados_model->get_report81();

			$texto = ($this->tabulados_model->get_texto(1,$data['opcion'])->num_rows() > 0)  ?  $texto = $this->tabulados_model->get_texto(1,$data['opcion'])->row()->texto  :  '';
			$data['texto'] =  $texto; 
			$texto_2 = ($this->tabulados_model->get_texto(1,$data['opcion'])->num_rows() > 0)  ?  $texto_2 = $this->tabulados_model->get_texto(1,$data['opcion'])->row()->texto_2  :  '';
			$data['texto_2'] =  $texto_2; 
			$data['nombres_mapa'] = $this->tabulados_model->get_nombre_mapa($data['opcion']); // nombre de los tabulados
			$data['respuesta_unica'] = $this->tabulados_model->get_tipo_respuesta($data['opcion']);

			$metadata = $this->tabulados_model->get_metadata(1,$data['opcion']); 
			$data['txt_tabulado'] 	= ( $metadata->num_rows()==1 )  ?  $metadata->row()->tabulado  :  ''; 
			$data['txt_contenido'] 	= ( $metadata->num_rows()==1 )  ?  $metadata->row()->contenido  :  ''; 
			$data['txt_casos'] 		= ( $metadata->num_rows()==1 )  ?  $metadata->row()->casos  :  ''; 
			$data['txt_variables'] 	= ( $metadata->num_rows()==1 )  ?  $metadata->row()->variable  :  ''; 
			$data['txt_alternativas'] = ( $metadata->num_rows()==1 )  ?  $metadata->row()->alternativas  :  ''; 
			$data['txt_otro'] 		= ( $metadata->num_rows()==1 )  ?  $metadata->row()->otro  :  ''; 
			$data['txt_faltantes'] 	= ( $metadata->num_rows()==1 )  ?  $metadata->row()->faltantes  :  ''; 
			$data['txt_productor'] 	= ( $metadata->num_rows()==1 )  ?  $metadata->row()->productor :  ''; 
			$data['txt_definiciones'] = ( $metadata->num_rows()==1 )  ?  $metadata->row()->definiciones  :  '';	

			$data['main_content'] = 'tabulados/pescador/reporte81_view';

			$this->load->view('backend/includes/template', $data);		
	}

	public function reporte82()
	{
			$data['restriccion'] = $this->restriccion ;
			$data['nav'] = TRUE;
			$data['title'] = 'Tabulados Pescador';	
			$data['nom_tabulados'] = $this->tabulados_model->get_nombre_tabulados();
			$data['opcion'] = 82;		
			$data['tables'] = $this->tabulados_model->get_report82();

			$texto = ($this->tabulados_model->get_texto(1,$data['opcion'])->num_rows() > 0)  ?  $texto = $this->tabulados_model->get_texto(1,$data['opcion'])->row()->texto  :  '';
			$data['texto'] =  $texto; 
			$texto_2 = ($this->tabulados_model->get_texto(1,$data['opcion'])->num_rows() > 0)  ?  $texto_2 = $this->tabulados_model->get_texto(1,$data['opcion'])->row()->texto_2  :  '';
			$data['texto_2'] =  $texto_2; 
			$data['nombres_mapa'] = $this->tabulados_model->get_nombre_mapa($data['opcion']); // nombre de los tabulados
			$data['respuesta_unica'] = $this->tabulados_model->get_tipo_respuesta($data['opcion']);

			$metadata = $this->tabulados_model->get_metadata(1,$data['opcion']); 
			$data['txt_tabulado'] 	= ( $metadata->num_rows()==1 )  ?  $metadata->row()->tabulado  :  ''; 
			$data['txt_contenido'] 	= ( $metadata->num_rows()==1 )  ?  $metadata->row()->contenido  :  ''; 
			$data['txt_casos'] 		= ( $metadata->num_rows()==1 )  ?  $metadata->row()->casos  :  ''; 
			$data['txt_variables'] 	= ( $metadata->num_rows()==1 )  ?  $metadata->row()->variable  :  ''; 
			$data['txt_alternativas'] = ( $metadata->num_rows()==1 )  ?  $metadata->row()->alternativas  :  ''; 
			$data['txt_otro'] 		= ( $metadata->num_rows()==1 )  ?  $metadata->row()->otro  :  ''; 
			$data['txt_faltantes'] 	= ( $metadata->num_rows()==1 )  ?  $metadata->row()->faltantes  :  ''; 
			$data['txt_productor'] 	= ( $metadata->num_rows()==1 )  ?  $metadata->row()->productor :  ''; 
			$data['txt_definiciones'] = ( $metadata->num_rows()==1 )  ?  $metadata->row()->definiciones  :  '';	

			$data['main_content'] = 'tabulados/pescador/reporte82_view';

			$this->load->view('backend/includes/template', $data);		
	}

	public function reporte83()
	{
			$data['restriccion'] = $this->restriccion ;
			$data['nav'] = TRUE;
			$data['title'] = 'Tabulados Pescador';	
			$data['nom_tabulados'] = $this->tabulados_model->get_nombre_tabulados();
			$data['opcion'] = 83;		
			$data['tables'] = $this->tabulados_model->get_report83();

			$texto = ($this->tabulados_model->get_texto(1,$data['opcion'])->num_rows() > 0)  ?  $texto = $this->tabulados_model->get_texto(1,$data['opcion'])->row()->texto  :  '';
			$data['texto'] =  $texto; 
			$texto_2 = ($this->tabulados_model->get_texto(1,$data['opcion'])->num_rows() > 0)  ?  $texto_2 = $this->tabulados_model->get_texto(1,$data['opcion'])->row()->texto_2  :  '';
			$data['texto_2'] =  $texto_2; 
			$data['nombres_mapa'] = $this->tabulados_model->get_nombre_mapa($data['opcion']); // nombre de los tabulados
			$data['respuesta_unica'] = $this->tabulados_model->get_tipo_respuesta($data['opcion']);

			$metadata = $this->tabulados_model->get_metadata(1,$data['opcion']); 
			$data['txt_tabulado'] 	= ( $metadata->num_rows()==1 )  ?  $metadata->row()->tabulado  :  ''; 
			$data['txt_contenido'] 	= ( $metadata->num_rows()==1 )  ?  $metadata->row()->contenido  :  ''; 
			$data['txt_casos'] 		= ( $metadata->num_rows()==1 )  ?  $metadata->row()->casos  :  ''; 
			$data['txt_variables'] 	= ( $metadata->num_rows()==1 )  ?  $metadata->row()->variable  :  ''; 
			$data['txt_alternativas'] = ( $metadata->num_rows()==1 )  ?  $metadata->row()->alternativas  :  ''; 
			$data['txt_otro'] 		= ( $metadata->num_rows()==1 )  ?  $metadata->row()->otro  :  ''; 
			$data['txt_faltantes'] 	= ( $metadata->num_rows()==1 )  ?  $metadata->row()->faltantes  :  ''; 
			$data['txt_productor'] 	= ( $metadata->num_rows()==1 )  ?  $metadata->row()->productor :  ''; 
			$data['txt_definiciones'] = ( $metadata->num_rows()==1 )  ?  $metadata->row()->definiciones  :  '';	

			$data['main_content'] = 'tabulados/pescador/reporte83_view';

			$this->load->view('backend/includes/template', $data);		
	}

	public function reporte84()
	{
			$data['restriccion'] = $this->restriccion ;
			$data['nav'] = TRUE;
			$data['title'] = 'Tabulados Pescador';	
			$data['nom_tabulados'] = $this->tabulados_model->get_nombre_tabulados();
			$data['opcion'] = 84;		
			$data['tables'] = $this->tabulados_model->get_report84();

			$texto = ($this->tabulados_model->get_texto(1,$data['opcion'])->num_rows() > 0)  ?  $texto = $this->tabulados_model->get_texto(1,$data['opcion'])->row()->texto  :  '';
			$data['texto'] =  $texto; 
			$texto_2 = ($this->tabulados_model->get_texto(1,$data['opcion'])->num_rows() > 0)  ?  $texto_2 = $this->tabulados_model->get_texto(1,$data['opcion'])->row()->texto_2  :  '';
			$data['texto_2'] =  $texto_2; 
			$data['nombres_mapa'] = $this->tabulados_model->get_nombre_mapa($data['opcion']); // nombre de los tabulados
			$data['respuesta_unica'] = $this->tabulados_model->get_tipo_respuesta($data['opcion']);

			$metadata = $this->tabulados_model->get_metadata(1,$data['opcion']); 
			$data['txt_tabulado'] 	= ( $metadata->num_rows()==1 )  ?  $metadata->row()->tabulado  :  ''; 
			$data['txt_contenido'] 	= ( $metadata->num_rows()==1 )  ?  $metadata->row()->contenido  :  ''; 
			$data['txt_casos'] 		= ( $metadata->num_rows()==1 )  ?  $metadata->row()->casos  :  ''; 
			$data['txt_variables'] 	= ( $metadata->num_rows()==1 )  ?  $metadata->row()->variable  :  ''; 
			$data['txt_alternativas'] = ( $metadata->num_rows()==1 )  ?  $metadata->row()->alternativas  :  ''; 
			$data['txt_otro'] 		= ( $metadata->num_rows()==1 )  ?  $metadata->row()->otro  :  ''; 
			$data['txt_faltantes'] 	= ( $metadata->num_rows()==1 )  ?  $metadata->row()->faltantes  :  ''; 
			$data['txt_productor'] 	= ( $metadata->num_rows()==1 )  ?  $metadata->row()->productor :  ''; 
			$data['txt_definiciones'] = ( $metadata->num_rows()==1 )  ?  $metadata->row()->definiciones  :  '';	

			$data['main_content'] = 'tabulados/pescador/reporte84_view';

			$this->load->view('backend/includes/template', $data);			
	}

	public function reporte85()
	{
			$data['restriccion'] = $this->restriccion ;
			$data['nav'] = TRUE;
			$data['title'] = 'Tabulados Pescador';	
			$data['nom_tabulados'] = $this->tabulados_model->get_nombre_tabulados();
			$data['opcion'] = 85;		
			$data['tables'] = $this->tabulados_model->get_report85();

			$texto = ($this->tabulados_model->get_texto(1,$data['opcion'])->num_rows() > 0)  ?  $texto = $this->tabulados_model->get_texto(1,$data['opcion'])->row()->texto  :  '';
			$data['texto'] =  $texto; 
			$texto_2 = ($this->tabulados_model->get_texto(1,$data['opcion'])->num_rows() > 0)  ?  $texto_2 = $this->tabulados_model->get_texto(1,$data['opcion'])->row()->texto_2  :  '';
			$data['texto_2'] =  $texto_2; 
			$data['nombres_mapa'] = $this->tabulados_model->get_nombre_mapa($data['opcion']); // nombre de los tabulados
			$data['respuesta_unica'] = $this->tabulados_model->get_tipo_respuesta($data['opcion']);

			$metadata = $this->tabulados_model->get_metadata(1,$data['opcion']); 
			$data['txt_tabulado'] 	= ( $metadata->num_rows()==1 )  ?  $metadata->row()->tabulado  :  ''; 
			$data['txt_contenido'] 	= ( $metadata->num_rows()==1 )  ?  $metadata->row()->contenido  :  ''; 
			$data['txt_casos'] 		= ( $metadata->num_rows()==1 )  ?  $metadata->row()->casos  :  ''; 
			$data['txt_variables'] 	= ( $metadata->num_rows()==1 )  ?  $metadata->row()->variable  :  ''; 
			$data['txt_alternativas'] = ( $metadata->num_rows()==1 )  ?  $metadata->row()->alternativas  :  ''; 
			$data['txt_otro'] 		= ( $metadata->num_rows()==1 )  ?  $metadata->row()->otro  :  ''; 
			$data['txt_faltantes'] 	= ( $metadata->num_rows()==1 )  ?  $metadata->row()->faltantes  :  ''; 
			$data['txt_productor'] 	= ( $metadata->num_rows()==1 )  ?  $metadata->row()->productor :  ''; 
			$data['txt_definiciones'] = ( $metadata->num_rows()==1 )  ?  $metadata->row()->definiciones  :  '';	

			$data['main_content'] = 'tabulados/pescador/reporte85_view';

			$this->load->view('backend/includes/template', $data);	
	}


	public function reporte86()
	{
			$data['restriccion'] = $this->restriccion ;
			$data['nav'] = TRUE;
			$data['title'] = 'Tabulados Pescador';	
			$data['nom_tabulados'] = $this->tabulados_model->get_nombre_tabulados();
			$data['opcion'] = 86;		
			$data['tables'] = $this->tabulados_model->get_report86();

			$texto = ($this->tabulados_model->get_texto(1,$data['opcion'])->num_rows() > 0)  ?  $texto = $this->tabulados_model->get_texto(1,$data['opcion'])->row()->texto  :  '';
			$data['texto'] =  $texto; 
			$texto_2 = ($this->tabulados_model->get_texto(1,$data['opcion'])->num_rows() > 0)  ?  $texto_2 = $this->tabulados_model->get_texto(1,$data['opcion'])->row()->texto_2  :  '';
			$data['texto_2'] =  $texto_2; 
			$data['nombres_mapa'] = $this->tabulados_model->get_nombre_mapa($data['opcion']); // nombre de los tabulados
			$data['respuesta_unica'] = $this->tabulados_model->get_tipo_respuesta($data['opcion']);

			$metadata = $this->tabulados_model->get_metadata(1,$data['opcion']); 
			$data['txt_tabulado'] 	= ( $metadata->num_rows()==1 )  ?  $metadata->row()->tabulado  :  ''; 
			$data['txt_contenido'] 	= ( $metadata->num_rows()==1 )  ?  $metadata->row()->contenido  :  ''; 
			$data['txt_casos'] 		= ( $metadata->num_rows()==1 )  ?  $metadata->row()->casos  :  ''; 
			$data['txt_variables'] 	= ( $metadata->num_rows()==1 )  ?  $metadata->row()->variable  :  ''; 
			$data['txt_alternativas'] = ( $metadata->num_rows()==1 )  ?  $metadata->row()->alternativas  :  ''; 
			$data['txt_otro'] 		= ( $metadata->num_rows()==1 )  ?  $metadata->row()->otro  :  ''; 
			$data['txt_faltantes'] 	= ( $metadata->num_rows()==1 )  ?  $metadata->row()->faltantes  :  ''; 
			$data['txt_productor'] 	= ( $metadata->num_rows()==1 )  ?  $metadata->row()->productor :  ''; 
			$data['txt_definiciones'] = ( $metadata->num_rows()==1 )  ?  $metadata->row()->definiciones  :  '';	

			$data['main_content'] = 'tabulados/pescador/reporte86_view';

			$this->load->view('backend/includes/template', $data);		
	}


	public function reporte87()
	{
			$data['restriccion'] = $this->restriccion ;
			$data['nav'] = TRUE;
			$data['title'] = 'Tabulados Pescador';	
			$data['nom_tabulados'] = $this->tabulados_model->get_nombre_tabulados();
			$data['opcion'] = 87;		
			$data['tables'] = $this->tabulados_model->get_report87();

			$texto = ($this->tabulados_model->get_texto(1,$data['opcion'])->num_rows() > 0)  ?  $texto = $this->tabulados_model->get_texto(1,$data['opcion'])->row()->texto  :  '';
			$data['texto'] =  $texto; 
			$texto_2 = ($this->tabulados_model->get_texto(1,$data['opcion'])->num_rows() > 0)  ?  $texto_2 = $this->tabulados_model->get_texto(1,$data['opcion'])->row()->texto_2  :  '';
			$data['texto_2'] =  $texto_2; 
			$data['nombres_mapa'] = $this->tabulados_model->get_nombre_mapa($data['opcion']); // nombre de los tabulados
			$data['respuesta_unica'] = $this->tabulados_model->get_tipo_respuesta($data['opcion']);

			$metadata = $this->tabulados_model->get_metadata(1,$data['opcion']); 
			$data['txt_tabulado'] 	= ( $metadata->num_rows()==1 )  ?  $metadata->row()->tabulado  :  ''; 
			$data['txt_contenido'] 	= ( $metadata->num_rows()==1 )  ?  $metadata->row()->contenido  :  ''; 
			$data['txt_casos'] 		= ( $metadata->num_rows()==1 )  ?  $metadata->row()->casos  :  ''; 
			$data['txt_variables'] 	= ( $metadata->num_rows()==1 )  ?  $metadata->row()->variable  :  ''; 
			$data['txt_alternativas'] = ( $metadata->num_rows()==1 )  ?  $metadata->row()->alternativas  :  ''; 
			$data['txt_otro'] 		= ( $metadata->num_rows()==1 )  ?  $metadata->row()->otro  :  ''; 
			$data['txt_faltantes'] 	= ( $metadata->num_rows()==1 )  ?  $metadata->row()->faltantes  :  ''; 
			$data['txt_productor'] 	= ( $metadata->num_rows()==1 )  ?  $metadata->row()->productor :  ''; 
			$data['txt_definiciones'] = ( $metadata->num_rows()==1 )  ?  $metadata->row()->definiciones  :  '';	

			$data['main_content'] = 'tabulados/pescador/reporte87_view';

			$this->load->view('backend/includes/template', $data);		
	}


	public function reporte88()
	{
			$data['restriccion'] = $this->restriccion ;
			$data['nav'] = TRUE;
			$data['title'] = 'Tabulados Pescador';	
			$data['nom_tabulados'] = $this->tabulados_model->get_nombre_tabulados();
			$data['opcion'] = 88;		
			$data['tables'] = $this->tabulados_model->get_report88();

			$texto = ($this->tabulados_model->get_texto(1,$data['opcion'])->num_rows() > 0)  ?  $texto = $this->tabulados_model->get_texto(1,$data['opcion'])->row()->texto  :  '';
			$data['texto'] =  $texto; 
			$texto_2 = ($this->tabulados_model->get_texto(1,$data['opcion'])->num_rows() > 0)  ?  $texto_2 = $this->tabulados_model->get_texto(1,$data['opcion'])->row()->texto_2  :  '';
			$data['texto_2'] =  $texto_2; 
			$data['nombres_mapa'] = $this->tabulados_model->get_nombre_mapa($data['opcion']); // nombre de los tabulados
			$data['respuesta_unica'] = $this->tabulados_model->get_tipo_respuesta($data['opcion']);

			$metadata = $this->tabulados_model->get_metadata(1,$data['opcion']); 
			$data['txt_tabulado'] 	= ( $metadata->num_rows()==1 )  ?  $metadata->row()->tabulado  :  ''; 
			$data['txt_contenido'] 	= ( $metadata->num_rows()==1 )  ?  $metadata->row()->contenido  :  ''; 
			$data['txt_casos'] 		= ( $metadata->num_rows()==1 )  ?  $metadata->row()->casos  :  ''; 
			$data['txt_variables'] 	= ( $metadata->num_rows()==1 )  ?  $metadata->row()->variable  :  ''; 
			$data['txt_alternativas'] = ( $metadata->num_rows()==1 )  ?  $metadata->row()->alternativas  :  ''; 
			$data['txt_otro'] 		= ( $metadata->num_rows()==1 )  ?  $metadata->row()->otro  :  ''; 
			$data['txt_faltantes'] 	= ( $metadata->num_rows()==1 )  ?  $metadata->row()->faltantes  :  ''; 
			$data['txt_productor'] 	= ( $metadata->num_rows()==1 )  ?  $metadata->row()->productor :  ''; 
			$data['txt_definiciones'] = ( $metadata->num_rows()==1 )  ?  $metadata->row()->definiciones  :  '';	

			$data['main_content'] = 'tabulados/pescador/reporte88_view';

			$this->load->view('backend/includes/template', $data);		
	}

	public function reporte89()
	{
			$data['restriccion'] = $this->restriccion ;
			$data['nav'] = TRUE;
			$data['title'] = 'Tabulados Pescador';	
			$data['nom_tabulados'] = $this->tabulados_model->get_nombre_tabulados();
			$data['opcion'] = 89;		
			$data['tables'] = $this->tabulados_model->get_report89();

			$texto = ($this->tabulados_model->get_texto(1,$data['opcion'])->num_rows() > 0)  ?  $texto = $this->tabulados_model->get_texto(1,$data['opcion'])->row()->texto  :  '';
			$data['texto'] =  $texto; 
			$texto_2 = ($this->tabulados_model->get_texto(1,$data['opcion'])->num_rows() > 0)  ?  $texto_2 = $this->tabulados_model->get_texto(1,$data['opcion'])->row()->texto_2  :  '';
			$data['texto_2'] =  $texto_2; 
			$data['nombres_mapa'] = $this->tabulados_model->get_nombre_mapa($data['opcion']); // nombre de los tabulados
			$data['respuesta_unica'] = $this->tabulados_model->get_tipo_respuesta($data['opcion']);

			$metadata = $this->tabulados_model->get_metadata(1,$data['opcion']); 
			$data['txt_tabulado'] 	= ( $metadata->num_rows()==1 )  ?  $metadata->row()->tabulado  :  ''; 
			$data['txt_contenido'] 	= ( $metadata->num_rows()==1 )  ?  $metadata->row()->contenido  :  ''; 
			$data['txt_casos'] 		= ( $metadata->num_rows()==1 )  ?  $metadata->row()->casos  :  ''; 
			$data['txt_variables'] 	= ( $metadata->num_rows()==1 )  ?  $metadata->row()->variable  :  ''; 
			$data['txt_alternativas'] = ( $metadata->num_rows()==1 )  ?  $metadata->row()->alternativas  :  ''; 
			$data['txt_otro'] 		= ( $metadata->num_rows()==1 )  ?  $metadata->row()->otro  :  ''; 
			$data['txt_faltantes'] 	= ( $metadata->num_rows()==1 )  ?  $metadata->row()->faltantes  :  ''; 
			$data['txt_productor'] 	= ( $metadata->num_rows()==1 )  ?  $metadata->row()->productor :  ''; 
			$data['txt_definiciones'] = ( $metadata->num_rows()==1 )  ?  $metadata->row()->definiciones  :  '';	

			$data['main_content'] = 'tabulados/pescador/reporte89_view';

			$this->load->view('backend/includes/template', $data);		
	}



	public function reporte90()
	{
			$data['restriccion'] = $this->restriccion ;
			$data['nav'] = TRUE;
			$data['title'] = 'Tabulados Pescador';	
			$data['nom_tabulados'] = $this->tabulados_model->get_nombre_tabulados();
			$data['opcion'] = 90;		
			$data['tables'] = $this->tabulados_model->get_report90();

			$texto = ($this->tabulados_model->get_texto(1,$data['opcion'])->num_rows() > 0)  ?  $texto = $this->tabulados_model->get_texto(1,$data['opcion'])->row()->texto  :  '';
			$data['texto'] =  $texto; 
			$texto_2 = ($this->tabulados_model->get_texto(1,$data['opcion'])->num_rows() > 0)  ?  $texto_2 = $this->tabulados_model->get_texto(1,$data['opcion'])->row()->texto_2  :  '';
			$data['texto_2'] =  $texto_2; 
			$data['nombres_mapa'] = $this->tabulados_model->get_nombre_mapa($data['opcion']); // nombre de los tabulados
			$data['respuesta_unica'] = $this->tabulados_model->get_tipo_respuesta($data['opcion']);

			$metadata = $this->tabulados_model->get_metadata(1,$data['opcion']); 
			$data['txt_tabulado'] 	= ( $metadata->num_rows()==1 )  ?  $metadata->row()->tabulado  :  ''; 
			$data['txt_contenido'] 	= ( $metadata->num_rows()==1 )  ?  $metadata->row()->contenido  :  ''; 
			$data['txt_casos'] 		= ( $metadata->num_rows()==1 )  ?  $metadata->row()->casos  :  ''; 
			$data['txt_variables'] 	= ( $metadata->num_rows()==1 )  ?  $metadata->row()->variable  :  ''; 
			$data['txt_alternativas'] = ( $metadata->num_rows()==1 )  ?  $metadata->row()->alternativas  :  ''; 
			$data['txt_otro'] 		= ( $metadata->num_rows()==1 )  ?  $metadata->row()->otro  :  ''; 
			$data['txt_faltantes'] 	= ( $metadata->num_rows()==1 )  ?  $metadata->row()->faltantes  :  ''; 
			$data['txt_productor'] 	= ( $metadata->num_rows()==1 )  ?  $metadata->row()->productor :  ''; 
			$data['txt_definiciones'] = ( $metadata->num_rows()==1 )  ?  $metadata->row()->definiciones  :  '';	

			$data['main_content'] = 'tabulados/pescador/reporte90_view';

			$this->load->view('backend/includes/template', $data);		
	}


	public function reporte91()
	{
			$data['restriccion'] = $this->restriccion ;
			$data['nav'] = TRUE;
			$data['title'] = 'Tabulados Pescador';	
			$data['nom_tabulados'] = $this->tabulados_model->get_nombre_tabulados();
			$data['opcion'] = 91;		
			$data['tables'] = $this->tabulados_model->get_report91();

			$texto = ($this->tabulados_model->get_texto(1,$data['opcion'])->num_rows() > 0)  ?  $texto = $this->tabulados_model->get_texto(1,$data['opcion'])->row()->texto  :  '';
			$data['texto'] =  $texto; 
			$texto_2 = ($this->tabulados_model->get_texto(1,$data['opcion'])->num_rows() > 0)  ?  $texto_2 = $this->tabulados_model->get_texto(1,$data['opcion'])->row()->texto_2  :  '';
			$data['texto_2'] =  $texto_2; 
			$data['nombres_mapa'] = $this->tabulados_model->get_nombre_mapa($data['opcion']); // nombre de los tabulados
			$data['respuesta_unica'] = $this->tabulados_model->get_tipo_respuesta($data['opcion']);

			$metadata = $this->tabulados_model->get_metadata(1,$data['opcion']); 
			$data['txt_tabulado'] 	= ( $metadata->num_rows()==1 )  ?  $metadata->row()->tabulado  :  ''; 
			$data['txt_contenido'] 	= ( $metadata->num_rows()==1 )  ?  $metadata->row()->contenido  :  ''; 
			$data['txt_casos'] 		= ( $metadata->num_rows()==1 )  ?  $metadata->row()->casos  :  ''; 
			$data['txt_variables'] 	= ( $metadata->num_rows()==1 )  ?  $metadata->row()->variable  :  ''; 
			$data['txt_alternativas'] = ( $metadata->num_rows()==1 )  ?  $metadata->row()->alternativas  :  ''; 
			$data['txt_otro'] 		= ( $metadata->num_rows()==1 )  ?  $metadata->row()->otro  :  ''; 
			$data['txt_faltantes'] 	= ( $metadata->num_rows()==1 )  ?  $metadata->row()->faltantes  :  ''; 
			$data['txt_productor'] 	= ( $metadata->num_rows()==1 )  ?  $metadata->row()->productor :  ''; 
			$data['txt_definiciones'] = ( $metadata->num_rows()==1 )  ?  $metadata->row()->definiciones  :  '';	

			$data['main_content'] = 'tabulados/pescador/reporte91_view';

			$this->load->view('backend/includes/template', $data);		
	}


	public function reporte92()
	{
			$data['restriccion'] = $this->restriccion ;
			$data['nav'] = TRUE;
			$data['title'] = 'Tabulados Pescador';	
			$data['nom_tabulados'] = $this->tabulados_model->get_nombre_tabulados();
			$data['opcion'] = 92;		
			$data['tables'] = $this->tabulados_model->get_report92();

			$texto = ($this->tabulados_model->get_texto(1,$data['opcion'])->num_rows() > 0)  ?  $texto = $this->tabulados_model->get_texto(1,$data['opcion'])->row()->texto  :  '';
			$data['texto'] =  $texto; 
			$texto_2 = ($this->tabulados_model->get_texto(1,$data['opcion'])->num_rows() > 0)  ?  $texto_2 = $this->tabulados_model->get_texto(1,$data['opcion'])->row()->texto_2  :  '';
			$data['texto_2'] =  $texto_2; 
			$data['nombres_mapa'] = $this->tabulados_model->get_nombre_mapa($data['opcion']); // nombre de los tabulados
			$data['respuesta_unica'] = $this->tabulados_model->get_tipo_respuesta($data['opcion']);

			$metadata = $this->tabulados_model->get_metadata(1,$data['opcion']); 
			$data['txt_tabulado'] 	= ( $metadata->num_rows()==1 )  ?  $metadata->row()->tabulado  :  ''; 
			$data['txt_contenido'] 	= ( $metadata->num_rows()==1 )  ?  $metadata->row()->contenido  :  ''; 
			$data['txt_casos'] 		= ( $metadata->num_rows()==1 )  ?  $metadata->row()->casos  :  ''; 
			$data['txt_variables'] 	= ( $metadata->num_rows()==1 )  ?  $metadata->row()->variable  :  ''; 
			$data['txt_alternativas'] = ( $metadata->num_rows()==1 )  ?  $metadata->row()->alternativas  :  ''; 
			$data['txt_otro'] 		= ( $metadata->num_rows()==1 )  ?  $metadata->row()->otro  :  ''; 
			$data['txt_faltantes'] 	= ( $metadata->num_rows()==1 )  ?  $metadata->row()->faltantes  :  ''; 
			$data['txt_productor'] 	= ( $metadata->num_rows()==1 )  ?  $metadata->row()->productor :  ''; 
			$data['txt_definiciones'] = ( $metadata->num_rows()==1 )  ?  $metadata->row()->definiciones  :  '';	

			$data['main_content'] = 'tabulados/pescador/reporte92_view';

			$this->load->view('backend/includes/template', $data);		
	}

	public function reporte93()
	{
			$data['restriccion'] = $this->restriccion ;
			$data['nav'] = TRUE;
			$data['title'] = 'Tabulados Pescador';	
			$data['nom_tabulados'] = $this->tabulados_model->get_nombre_tabulados();
			$data['opcion'] = 93;		
			$data['tables'] = $this->tabulados_model->get_report93();

			$texto = ($this->tabulados_model->get_texto(1,$data['opcion'])->num_rows() > 0)  ?  $texto = $this->tabulados_model->get_texto(1,$data['opcion'])->row()->texto  :  '';
			$data['texto'] =  $texto; 
			$texto_2 = ($this->tabulados_model->get_texto(1,$data['opcion'])->num_rows() > 0)  ?  $texto_2 = $this->tabulados_model->get_texto(1,$data['opcion'])->row()->texto_2  :  '';
			$data['texto_2'] =  $texto_2; 
			$data['nombres_mapa'] = $this->tabulados_model->get_nombre_mapa($data['opcion']); // nombre de los tabulados
			$data['respuesta_unica'] = $this->tabulados_model->get_tipo_respuesta($data['opcion']);

			$metadata = $this->tabulados_model->get_metadata(1,$data['opcion']); 
			$data['txt_tabulado'] 	= ( $metadata->num_rows()==1 )  ?  $metadata->row()->tabulado  :  ''; 
			$data['txt_contenido'] 	= ( $metadata->num_rows()==1 )  ?  $metadata->row()->contenido  :  ''; 
			$data['txt_casos'] 		= ( $metadata->num_rows()==1 )  ?  $metadata->row()->casos  :  ''; 
			$data['txt_variables'] 	= ( $metadata->num_rows()==1 )  ?  $metadata->row()->variable  :  ''; 
			$data['txt_alternativas'] = ( $metadata->num_rows()==1 )  ?  $metadata->row()->alternativas  :  ''; 
			$data['txt_otro'] 		= ( $metadata->num_rows()==1 )  ?  $metadata->row()->otro  :  ''; 
			$data['txt_faltantes'] 	= ( $metadata->num_rows()==1 )  ?  $metadata->row()->faltantes  :  ''; 
			$data['txt_productor'] 	= ( $metadata->num_rows()==1 )  ?  $metadata->row()->productor :  ''; 
			$data['txt_definiciones'] = ( $metadata->num_rows()==1 )  ?  $metadata->row()->definiciones  :  '';	

			$data['main_content'] = 'tabulados/pescador/reporte93_view';

			$this->load->view('backend/includes/template', $data);		
	}

	public function reporte94()
	{
			$data['restriccion'] = $this->restriccion ;
			$data['nav'] = TRUE;
			$data['title'] = 'Tabulados Pescador';	
			$data['nom_tabulados'] = $this->tabulados_model->get_nombre_tabulados();
			$data['opcion'] = 94;		
			$data['tables'] = $this->tabulados_model->get_report94();

			$texto = ($this->tabulados_model->get_texto(1,$data['opcion'])->num_rows() > 0)  ?  $texto = $this->tabulados_model->get_texto(1,$data['opcion'])->row()->texto  :  '';
			$data['texto'] =  $texto; 
			$texto_2 = ($this->tabulados_model->get_texto(1,$data['opcion'])->num_rows() > 0)  ?  $texto_2 = $this->tabulados_model->get_texto(1,$data['opcion'])->row()->texto_2  :  '';
			$data['texto_2'] =  $texto_2; 
			$data['nombres_mapa'] = $this->tabulados_model->get_nombre_mapa($data['opcion']); // nombre de los tabulados
			$data['respuesta_unica'] = $this->tabulados_model->get_tipo_respuesta($data['opcion']);

			$metadata = $this->tabulados_model->get_metadata(1,$data['opcion']); 
			$data['txt_tabulado'] 	= ( $metadata->num_rows()==1 )  ?  $metadata->row()->tabulado  :  ''; 
			$data['txt_contenido'] 	= ( $metadata->num_rows()==1 )  ?  $metadata->row()->contenido  :  ''; 
			$data['txt_casos'] 		= ( $metadata->num_rows()==1 )  ?  $metadata->row()->casos  :  ''; 
			$data['txt_variables'] 	= ( $metadata->num_rows()==1 )  ?  $metadata->row()->variable  :  ''; 
			$data['txt_alternativas'] = ( $metadata->num_rows()==1 )  ?  $metadata->row()->alternativas  :  ''; 
			$data['txt_otro'] 		= ( $metadata->num_rows()==1 )  ?  $metadata->row()->otro  :  ''; 
			$data['txt_faltantes'] 	= ( $metadata->num_rows()==1 )  ?  $metadata->row()->faltantes  :  ''; 
			$data['txt_productor'] 	= ( $metadata->num_rows()==1 )  ?  $metadata->row()->productor :  ''; 
			$data['txt_definiciones'] = ( $metadata->num_rows()==1 )  ?  $metadata->row()->definiciones  :  '';	

			$data['main_content'] = 'tabulados/pescador/reporte94_view';

			$this->load->view('backend/includes/template', $data);		
	}


	public function reporte95()
	{
			$data['restriccion'] = $this->restriccion ;
			$data['nav'] = TRUE;
			$data['title'] = 'Tabulados Pescador';	
			$data['nom_tabulados'] = $this->tabulados_model->get_nombre_tabulados();
			$data['opcion'] = 95;		
			$data['tables'] = $this->tabulados_model->get_report95();

			$texto = ($this->tabulados_model->get_texto(1,$data['opcion'])->num_rows() > 0)  ?  $texto = $this->tabulados_model->get_texto(1,$data['opcion'])->row()->texto  :  '';
			$data['texto'] =  $texto; 
			$texto_2 = ($this->tabulados_model->get_texto(1,$data['opcion'])->num_rows() > 0)  ?  $texto_2 = $this->tabulados_model->get_texto(1,$data['opcion'])->row()->texto_2  :  '';
			$data['texto_2'] =  $texto_2; 
			$data['nombres_mapa'] = $this->tabulados_model->get_nombre_mapa($data['opcion']); // nombre de los tabulados
			$data['respuesta_unica'] = $this->tabulados_model->get_tipo_respuesta($data['opcion']);

			$metadata = $this->tabulados_model->get_metadata(1,$data['opcion']); 
			$data['txt_tabulado'] 	= ( $metadata->num_rows()==1 )  ?  $metadata->row()->tabulado  :  ''; 
			$data['txt_contenido'] 	= ( $metadata->num_rows()==1 )  ?  $metadata->row()->contenido  :  ''; 
			$data['txt_casos'] 		= ( $metadata->num_rows()==1 )  ?  $metadata->row()->casos  :  ''; 
			$data['txt_variables'] 	= ( $metadata->num_rows()==1 )  ?  $metadata->row()->variable  :  ''; 
			$data['txt_alternativas'] = ( $metadata->num_rows()==1 )  ?  $metadata->row()->alternativas  :  ''; 
			$data['txt_otro'] 		= ( $metadata->num_rows()==1 )  ?  $metadata->row()->otro  :  ''; 
			$data['txt_faltantes'] 	= ( $metadata->num_rows()==1 )  ?  $metadata->row()->faltantes  :  ''; 
			$data['txt_productor'] 	= ( $metadata->num_rows()==1 )  ?  $metadata->row()->productor :  ''; 
			$data['txt_definiciones'] = ( $metadata->num_rows()==1 )  ?  $metadata->row()->definiciones  :  '';	

			$data['main_content'] = 'tabulados/pescador/reporte95_view';

			$this->load->view('backend/includes/template', $data);			
	}



	public function reporte96()
	{
			$data['restriccion'] = $this->restriccion ;
			$data['nav'] = TRUE;
			$data['title'] = 'Tabulados Pescador';	
			$data['nom_tabulados'] = $this->tabulados_model->get_nombre_tabulados();
			$data['opcion'] = 96;		
			$data['tables'] = $this->tabulados_model->get_report96();

			$texto = ($this->tabulados_model->get_texto(1,$data['opcion'])->num_rows() > 0)  ?  $texto = $this->tabulados_model->get_texto(1,$data['opcion'])->row()->texto  :  '';
			$data['texto'] =  $texto; 
			$texto_2 = ($this->tabulados_model->get_texto(1,$data['opcion'])->num_rows() > 0)  ?  $texto_2 = $this->tabulados_model->get_texto(1,$data['opcion'])->row()->texto_2  :  '';
			$data['texto_2'] =  $texto_2; 
			$data['nombres_mapa'] = $this->tabulados_model->get_nombre_mapa($data['opcion']); // nombre de los tabulados
			$data['respuesta_unica'] = $this->tabulados_model->get_tipo_respuesta($data['opcion']);

			$metadata = $this->tabulados_model->get_metadata(1,$data['opcion']); 
			$data['txt_tabulado'] 	= ( $metadata->num_rows()==1 )  ?  $metadata->row()->tabulado  :  ''; 
			$data['txt_contenido'] 	= ( $metadata->num_rows()==1 )  ?  $metadata->row()->contenido  :  ''; 
			$data['txt_casos'] 		= ( $metadata->num_rows()==1 )  ?  $metadata->row()->casos  :  ''; 
			$data['txt_variables'] 	= ( $metadata->num_rows()==1 )  ?  $metadata->row()->variable  :  ''; 
			$data['txt_alternativas'] = ( $metadata->num_rows()==1 )  ?  $metadata->row()->alternativas  :  ''; 
			$data['txt_otro'] 		= ( $metadata->num_rows()==1 )  ?  $metadata->row()->otro  :  ''; 
			$data['txt_faltantes'] 	= ( $metadata->num_rows()==1 )  ?  $metadata->row()->faltantes  :  ''; 
			$data['txt_productor'] 	= ( $metadata->num_rows()==1 )  ?  $metadata->row()->productor :  ''; 
			$data['txt_definiciones'] = ( $metadata->num_rows()==1 )  ?  $metadata->row()->definiciones  :  '';	

			$data['main_content'] = 'tabulados/pescador/reporte96_view';

			$this->load->view('backend/includes/template', $data);		
	}


	public function reporte97()
	{
			$data['restriccion'] = $this->restriccion ;
			$data['nav'] = TRUE;
			$data['title'] = 'Tabulados Pescador';	
			$data['nom_tabulados'] = $this->tabulados_model->get_nombre_tabulados();
			$data['opcion'] = 97;		
			$data['tables'] = $this->tabulados_model->get_report97();

			$texto = ($this->tabulados_model->get_texto(1,$data['opcion'])->num_rows() > 0)  ?  $texto = $this->tabulados_model->get_texto(1,$data['opcion'])->row()->texto  :  '';
			$data['texto'] =  $texto; 
			$texto_2 = ($this->tabulados_model->get_texto(1,$data['opcion'])->num_rows() > 0)  ?  $texto_2 = $this->tabulados_model->get_texto(1,$data['opcion'])->row()->texto_2  :  '';
			$data['texto_2'] =  $texto_2; 
			$data['nombres_mapa'] = $this->tabulados_model->get_nombre_mapa($data['opcion']); // nombre de los tabulados
			$data['respuesta_unica'] = $this->tabulados_model->get_tipo_respuesta($data['opcion']);

			$metadata = $this->tabulados_model->get_metadata(1,$data['opcion']); 
			$data['txt_tabulado'] 	= ( $metadata->num_rows()==1 )  ?  $metadata->row()->tabulado  :  ''; 
			$data['txt_contenido'] 	= ( $metadata->num_rows()==1 )  ?  $metadata->row()->contenido  :  ''; 
			$data['txt_casos'] 		= ( $metadata->num_rows()==1 )  ?  $metadata->row()->casos  :  ''; 
			$data['txt_variables'] 	= ( $metadata->num_rows()==1 )  ?  $metadata->row()->variable  :  ''; 
			$data['txt_alternativas'] = ( $metadata->num_rows()==1 )  ?  $metadata->row()->alternativas  :  ''; 
			$data['txt_otro'] 		= ( $metadata->num_rows()==1 )  ?  $metadata->row()->otro  :  ''; 
			$data['txt_faltantes'] 	= ( $metadata->num_rows()==1 )  ?  $metadata->row()->faltantes  :  ''; 
			$data['txt_productor'] 	= ( $metadata->num_rows()==1 )  ?  $metadata->row()->productor :  ''; 
			$data['txt_definiciones'] = ( $metadata->num_rows()==1 )  ?  $metadata->row()->definiciones  :  '';	

			$data['main_content'] = 'tabulados/pescador/reporte97_view';

			$this->load->view('backend/includes/template', $data);		
	}


	public function reporte98()
	{
			$data['restriccion'] = $this->restriccion ;
			$data['nav'] = TRUE;
			$data['title'] = 'Tabulados Pescador';	
			$data['nom_tabulados'] = $this->tabulados_model->get_nombre_tabulados();
			$data['opcion'] = 98;		
			$data['tables'] = $this->tabulados_model->get_report98();

			$texto = ($this->tabulados_model->get_texto(1,$data['opcion'])->num_rows() > 0)  ?  $texto = $this->tabulados_model->get_texto(1,$data['opcion'])->row()->texto  :  '';
			$data['texto'] =  $texto; 
			$texto_2 = ($this->tabulados_model->get_texto(1,$data['opcion'])->num_rows() > 0)  ?  $texto_2 = $this->tabulados_model->get_texto(1,$data['opcion'])->row()->texto_2  :  '';
			$data['texto_2'] =  $texto_2; 
			$data['nombres_mapa'] = $this->tabulados_model->get_nombre_mapa($data['opcion']); // nombre de los tabulados
			$data['respuesta_unica'] = $this->tabulados_model->get_tipo_respuesta($data['opcion']);

			$metadata = $this->tabulados_model->get_metadata(1,$data['opcion']); 
			$data['txt_tabulado'] 	= ( $metadata->num_rows()==1 )  ?  $metadata->row()->tabulado  :  ''; 
			$data['txt_contenido'] 	= ( $metadata->num_rows()==1 )  ?  $metadata->row()->contenido  :  ''; 
			$data['txt_casos'] 		= ( $metadata->num_rows()==1 )  ?  $metadata->row()->casos  :  ''; 
			$data['txt_variables'] 	= ( $metadata->num_rows()==1 )  ?  $metadata->row()->variable  :  ''; 
			$data['txt_alternativas'] = ( $metadata->num_rows()==1 )  ?  $metadata->row()->alternativas  :  ''; 
			$data['txt_otro'] 		= ( $metadata->num_rows()==1 )  ?  $metadata->row()->otro  :  ''; 
			$data['txt_faltantes'] 	= ( $metadata->num_rows()==1 )  ?  $metadata->row()->faltantes  :  ''; 
			$data['txt_productor'] 	= ( $metadata->num_rows()==1 )  ?  $metadata->row()->productor :  ''; 
			$data['txt_definiciones'] = ( $metadata->num_rows()==1 )  ?  $metadata->row()->definiciones  :  '';	

			$data['main_content'] = 'tabulados/pescador/reporte98_view';

			$this->load->view('backend/includes/template', $data);		
	}


	public function reporte99()
	{
			$data['restriccion'] = $this->restriccion ;
			$data['nav'] = TRUE;
			$data['title'] = 'Tabulados Pescador';	
			$data['nom_tabulados'] = $this->tabulados_model->get_nombre_tabulados();
			$data['opcion'] = 99;		
			$data['tables'] = $this->tabulados_model->get_report99();

			$texto = ($this->tabulados_model->get_texto(1,$data['opcion'])->num_rows() > 0)  ?  $texto = $this->tabulados_model->get_texto(1,$data['opcion'])->row()->texto  :  '';
			$data['texto'] =  $texto; 
			$texto_2 = ($this->tabulados_model->get_texto(1,$data['opcion'])->num_rows() > 0)  ?  $texto_2 = $this->tabulados_model->get_texto(1,$data['opcion'])->row()->texto_2  :  '';
			$data['texto_2'] =  $texto_2; 
			$data['nombres_mapa'] = $this->tabulados_model->get_nombre_mapa($data['opcion']); // nombre de los tabulados
			$data['respuesta_unica'] = $this->tabulados_model->get_tipo_respuesta($data['opcion']);

			$metadata = $this->tabulados_model->get_metadata(1,$data['opcion']); 
			$data['txt_tabulado'] 	= ( $metadata->num_rows()==1 )  ?  $metadata->row()->tabulado  :  ''; 
			$data['txt_contenido'] 	= ( $metadata->num_rows()==1 )  ?  $metadata->row()->contenido  :  ''; 
			$data['txt_casos'] 		= ( $metadata->num_rows()==1 )  ?  $metadata->row()->casos  :  ''; 
			$data['txt_variables'] 	= ( $metadata->num_rows()==1 )  ?  $metadata->row()->variable  :  ''; 
			$data['txt_alternativas'] = ( $metadata->num_rows()==1 )  ?  $metadata->row()->alternativas  :  ''; 
			$data['txt_otro'] 		= ( $metadata->num_rows()==1 )  ?  $metadata->row()->otro  :  ''; 
			$data['txt_faltantes'] 	= ( $metadata->num_rows()==1 )  ?  $metadata->row()->faltantes  :  ''; 
			$data['txt_productor'] 	= ( $metadata->num_rows()==1 )  ?  $metadata->row()->productor :  ''; 
			$data['txt_definiciones'] = ( $metadata->num_rows()==1 )  ?  $metadata->row()->definiciones  :  '';	

			$data['main_content'] = 'tabulados/pescador/reporte99_view';

			$this->load->view('backend/includes/template', $data);		
	}

	public function reporte100()
	{
			$data['restriccion'] = $this->restriccion ;
			$data['nav'] = TRUE;
			$data['title'] = 'Tabulados Pescador';	
			$data['nom_tabulados'] = $this->tabulados_model->get_nombre_tabulados();
			$data['opcion'] = 100;		
			$data['tables'] = $this->tabulados_model->get_report100();

			$texto = ($this->tabulados_model->get_texto(1,$data['opcion'])->num_rows() > 0)  ?  $texto = $this->tabulados_model->get_texto(1,$data['opcion'])->row()->texto  :  '';
			$data['texto'] =  $texto; 
			$texto_2 = ($this->tabulados_model->get_texto(1,$data['opcion'])->num_rows() > 0)  ?  $texto_2 = $this->tabulados_model->get_texto(1,$data['opcion'])->row()->texto_2  :  '';
			$data['texto_2'] =  $texto_2; 
			$data['nombres_mapa'] = $this->tabulados_model->get_nombre_mapa($data['opcion']); // nombre de los tabulados
			$data['respuesta_unica'] = $this->tabulados_model->get_tipo_respuesta($data['opcion']);

			$metadata = $this->tabulados_model->get_metadata(1,$data['opcion']); 
			$data['txt_tabulado'] 	= ( $metadata->num_rows()==1 )  ?  $metadata->row()->tabulado  :  ''; 
			$data['txt_contenido'] 	= ( $metadata->num_rows()==1 )  ?  $metadata->row()->contenido  :  ''; 
			$data['txt_casos'] 		= ( $metadata->num_rows()==1 )  ?  $metadata->row()->casos  :  ''; 
			$data['txt_variables'] 	= ( $metadata->num_rows()==1 )  ?  $metadata->row()->variable  :  ''; 
			$data['txt_alternativas'] = ( $metadata->num_rows()==1 )  ?  $metadata->row()->alternativas  :  ''; 
			$data['txt_otro'] 		= ( $metadata->num_rows()==1 )  ?  $metadata->row()->otro  :  ''; 
			$data['txt_faltantes'] 	= ( $metadata->num_rows()==1 )  ?  $metadata->row()->faltantes  :  ''; 
			$data['txt_productor'] 	= ( $metadata->num_rows()==1 )  ?  $metadata->row()->productor :  ''; 
			$data['txt_definiciones'] = ( $metadata->num_rows()==1 )  ?  $metadata->row()->definiciones  :  '';	

			$data['main_content'] = 'tabulados/pescador/reporte100_view';

			$this->load->view('backend/includes/template', $data);		
	}

	public function reporte101()
	{
			$data['restriccion'] = $this->restriccion ;
			$data['nav'] = TRUE;
			$data['title'] = 'Tabulados Pescador';	
			$data['nom_tabulados'] = $this->tabulados_model->get_nombre_tabulados();
			$data['opcion'] = 101;		
			$data['tables'] = $this->tabulados_model->get_report101();

			$texto = ($this->tabulados_model->get_texto(1,$data['opcion'])->num_rows() > 0)  ?  $texto = $this->tabulados_model->get_texto(1,$data['opcion'])->row()->texto  :  '';
			$data['texto'] =  $texto; 
			$texto_2 = ($this->tabulados_model->get_texto(1,$data['opcion'])->num_rows() > 0)  ?  $texto_2 = $this->tabulados_model->get_texto(1,$data['opcion'])->row()->texto_2  :  '';
			$data['texto_2'] =  $texto_2; 
			$data['nombres_mapa'] = $this->tabulados_model->get_nombre_mapa($data['opcion']); // nombre de los tabulados
			$data['respuesta_unica'] = $this->tabulados_model->get_tipo_respuesta($data['opcion']);

			$metadata = $this->tabulados_model->get_metadata(1,$data['opcion']); 
			$data['txt_tabulado'] 	= ( $metadata->num_rows()==1 )  ?  $metadata->row()->tabulado  :  ''; 
			$data['txt_contenido'] 	= ( $metadata->num_rows()==1 )  ?  $metadata->row()->contenido  :  ''; 
			$data['txt_casos'] 		= ( $metadata->num_rows()==1 )  ?  $metadata->row()->casos  :  ''; 
			$data['txt_variables'] 	= ( $metadata->num_rows()==1 )  ?  $metadata->row()->variable  :  ''; 
			$data['txt_alternativas'] = ( $metadata->num_rows()==1 )  ?  $metadata->row()->alternativas  :  ''; 
			$data['txt_otro'] 		= ( $metadata->num_rows()==1 )  ?  $metadata->row()->otro  :  ''; 
			$data['txt_faltantes'] 	= ( $metadata->num_rows()==1 )  ?  $metadata->row()->faltantes  :  ''; 
			$data['txt_productor'] 	= ( $metadata->num_rows()==1 )  ?  $metadata->row()->productor :  ''; 
			$data['txt_definiciones'] = ( $metadata->num_rows()==1 )  ?  $metadata->row()->definiciones  :  '';	

			$data['main_content'] = 'tabulados/pescador/reporte101_view';

			$this->load->view('backend/includes/template', $data);		
	}

}

