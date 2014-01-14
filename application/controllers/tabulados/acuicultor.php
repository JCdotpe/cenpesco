<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Acuicultor extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		$this->load->helper(array('form', 'url'));
		$this->load->library('form_validation');
		$this->load->library('security');
		$this->load->library('tank_auth');
		$this->load->library('table');
		$this->lang->load('tank_auth');	
		$this->load->model('acuicultor_model');
		$this->load->model('tabulados_model');
		$this->load->helper('date');
		date_default_timezone_set('America/Lima');		
	    $tmpl = array ( 'table_open'  => '<table class="table table-bordered table-striped table-submit table-condensed" style="background-color:#fff">' );
	    //$this->table->set_template($tmpl);
		//dando restricciones para los comentarios 
	    $u_id = $this->tank_auth->get_user_id();
	    $this->restriccion = ( ($u_id == 259) || ($u_id == 266) || ($u_id == 269) || ($u_id == 262) || ($u_id == 267) || ($u_id == 258) || ($u_id == 260) ) ? FALSE : TRUE ;


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
		$texto_2 = $this->input->post('texto_2');
		$preg = $this->input->post('preg');
		$is_ajax = $this->input->post('ajax');
		if ($is_ajax) {
			if( $this->tabulados_model->get_texto(2,$preg)->num_rows() == 1 ){
					$c_data['user_id'] = $this->tank_auth->get_user_id();
					$c_data['texto'] = $texto;
					$c_data['texto_2'] = $texto_2;
				$this->tabulados_model->update_texto(2,$preg,$c_data);	
			}else{
					$c_data['user_id'] = $this->tank_auth->get_user_id();
					$c_data['pregunta'] = $preg;
					$c_data['tipo'] = 2;
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
			if( $this->tabulados_model->get_metadata(2,$preg)->num_rows() == 1 ){
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
				$this->tabulados_model->update_metadata(2,$preg,$c_data);	
			}else{//inserta nuevo
					$c_data['tipo'] 		= 2;
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

	public function reporte_100()
	{
			$data['restriccion'] = $this->restriccion ;
			$data['nav'] = TRUE;
			$data['title'] = 'Tabulados Acuicultor';	
			$data['nom_tabulados'] = $this->tabulados_model->get_nombre_tabulados();	
			$data['opcion'] = 100;		
			$data['tables'] = $this->acuicultor_model->get_tabulado_100();

			$texto = ($this->tabulados_model->get_texto(2,$data['opcion'])->num_rows() > 0)  ?  $texto = $this->tabulados_model->get_texto(2,$data['opcion'])->row()->texto  :  '';
			$data['texto'] =  $texto; 
			$texto_2 = ($this->tabulados_model->get_texto(2,$data['opcion'])->num_rows() > 0)  ?  $texto_2 = $this->tabulados_model->get_texto(2,$data['opcion'])->row()->texto_2  :  '';
			$data['texto_2'] =  $texto_2;  			

			$metadata = $this->tabulados_model->get_metadata(2,$data['opcion']); 
			$data['txt_tabulado'] 	= ( $metadata->num_rows()==1 )  ?  $metadata->row()->tabulado  :  ''; 
			$data['txt_contenido'] 	= ( $metadata->num_rows()==1 )  ?  $metadata->row()->contenido  :  ''; 
			$data['txt_casos'] 		= ( $metadata->num_rows()==1 )  ?  $metadata->row()->casos  :  ''; 
			$data['txt_variables'] 	= ( $metadata->num_rows()==1 )  ?  $metadata->row()->variable  :  ''; 
			$data['txt_alternativas'] = ( $metadata->num_rows()==1 )  ?  $metadata->row()->alternativas  :  ''; 
			$data['txt_otro'] 		= ( $metadata->num_rows()==1 )  ?  $metadata->row()->otro  :  ''; 
			$data['txt_faltantes'] 	= ( $metadata->num_rows()==1 )  ?  $metadata->row()->faltantes  :  ''; 
			$data['txt_productor'] 	= ( $metadata->num_rows()==1 )  ?  $metadata->row()->productor :  ''; 
			$data['txt_definiciones'] = ( $metadata->num_rows()==1 )  ?  $metadata->row()->definiciones  :  '';	

			$data['main_content'] = 'tabulados/acuicultor/reporte_100_view';

			$this->load->view('backend/includes/template', $data);		
	}

	public function reporte_101()
	{
			$data['restriccion'] = $this->restriccion ;
			$data['nav'] = TRUE;
			$data['title'] = 'Tabulados Acuicultor';	
			$data['nom_tabulados'] = $this->tabulados_model->get_nombre_tabulados();	
			$data['opcion'] = 101;		
			$data['tables'] = $this->acuicultor_model->get_tabulado_101();

			$texto = ($this->tabulados_model->get_texto(2,$data['opcion'])->num_rows() > 0)  ?  $texto = $this->tabulados_model->get_texto(2,$data['opcion'])->row()->texto  :  '';
			$data['texto'] =  $texto; 
			$texto_2 = ($this->tabulados_model->get_texto(2,$data['opcion'])->num_rows() > 0)  ?  $texto_2 = $this->tabulados_model->get_texto(2,$data['opcion'])->row()->texto_2  :  '';
			$data['texto_2'] =  $texto_2; 

			$metadata = $this->tabulados_model->get_metadata(2,$data['opcion']); 
			$data['txt_tabulado'] 	= ( $metadata->num_rows()==1 )  ?  $metadata->row()->tabulado  :  ''; 
			$data['txt_contenido'] 	= ( $metadata->num_rows()==1 )  ?  $metadata->row()->contenido  :  ''; 
			$data['txt_casos'] 		= ( $metadata->num_rows()==1 )  ?  $metadata->row()->casos  :  ''; 
			$data['txt_variables'] 	= ( $metadata->num_rows()==1 )  ?  $metadata->row()->variable  :  ''; 
			$data['txt_alternativas'] = ( $metadata->num_rows()==1 )  ?  $metadata->row()->alternativas  :  ''; 
			$data['txt_otro'] 		= ( $metadata->num_rows()==1 )  ?  $metadata->row()->otro  :  ''; 
			$data['txt_faltantes'] 	= ( $metadata->num_rows()==1 )  ?  $metadata->row()->faltantes  :  ''; 
			$data['txt_productor'] 	= ( $metadata->num_rows()==1 )  ?  $metadata->row()->productor :  ''; 
			$data['txt_definiciones'] = ( $metadata->num_rows()==1 )  ?  $metadata->row()->definiciones  :  '';	

			$data['main_content'] = 'tabulados/acuicultor/reporte_101_view';

			$this->load->view('backend/includes/template', $data);		
	}
	

	public function reporte_102()
	{
			$data['restriccion'] = $this->restriccion ;
			$data['nav'] = TRUE;
			$data['title'] = 'Tabulados Acuicultor';	
			$data['nom_tabulados'] = $this->tabulados_model->get_nombre_tabulados();	
			$data['opcion'] = 102;		
			$data['tables'] = $this->acuicultor_model->get_tabulado_102();

			$texto = ($this->tabulados_model->get_texto(2,$data['opcion'])->num_rows() > 0)  ?  $texto = $this->tabulados_model->get_texto(2,$data['opcion'])->row()->texto  :  '';
			$data['texto'] =  $texto; 
			$texto_2 = ($this->tabulados_model->get_texto(2,$data['opcion'])->num_rows() > 0)  ?  $texto_2 = $this->tabulados_model->get_texto(2,$data['opcion'])->row()->texto_2  :  '';
			$data['texto_2'] =  $texto_2; 

			$metadata = $this->tabulados_model->get_metadata(2,$data['opcion']); 
			$data['txt_tabulado'] 	= ( $metadata->num_rows()==1 )  ?  $metadata->row()->tabulado  :  ''; 
			$data['txt_contenido'] 	= ( $metadata->num_rows()==1 )  ?  $metadata->row()->contenido  :  ''; 
			$data['txt_casos'] 		= ( $metadata->num_rows()==1 )  ?  $metadata->row()->casos  :  ''; 
			$data['txt_variables'] 	= ( $metadata->num_rows()==1 )  ?  $metadata->row()->variable  :  ''; 
			$data['txt_alternativas'] = ( $metadata->num_rows()==1 )  ?  $metadata->row()->alternativas  :  ''; 
			$data['txt_otro'] 		= ( $metadata->num_rows()==1 )  ?  $metadata->row()->otro  :  ''; 
			$data['txt_faltantes'] 	= ( $metadata->num_rows()==1 )  ?  $metadata->row()->faltantes  :  ''; 
			$data['txt_productor'] 	= ( $metadata->num_rows()==1 )  ?  $metadata->row()->productor :  ''; 
			$data['txt_definiciones'] = ( $metadata->num_rows()==1 )  ?  $metadata->row()->definiciones  :  '';	

			$data['main_content'] = 'tabulados/acuicultor/reporte_102_view';

			$this->load->view('backend/includes/template', $data);		
	}


	public function reporte_103()
	{
			$data['restriccion'] = $this->restriccion ;
			$data['nav'] = TRUE;
			$data['title'] = 'Tabulados Acuicultor';	
			$data['nom_tabulados'] = $this->tabulados_model->get_nombre_tabulados();	
			$data['opcion'] = 103;		
			$data['tables'] = $this->acuicultor_model->get_tabulado_103();

			$texto = ($this->tabulados_model->get_texto(2,$data['opcion'])->num_rows() > 0)  ?  $texto = $this->tabulados_model->get_texto(2,$data['opcion'])->row()->texto  :  '';
			$data['texto'] =  $texto; 
			$texto_2 = ($this->tabulados_model->get_texto(2,$data['opcion'])->num_rows() > 0)  ?  $texto_2 = $this->tabulados_model->get_texto(2,$data['opcion'])->row()->texto_2  :  '';
			$data['texto_2'] =  $texto_2; 

			$metadata = $this->tabulados_model->get_metadata(2,$data['opcion']); 
			$data['txt_tabulado'] 	= ( $metadata->num_rows()==1 )  ?  $metadata->row()->tabulado  :  ''; 
			$data['txt_contenido'] 	= ( $metadata->num_rows()==1 )  ?  $metadata->row()->contenido  :  ''; 
			$data['txt_casos'] 		= ( $metadata->num_rows()==1 )  ?  $metadata->row()->casos  :  ''; 
			$data['txt_variables'] 	= ( $metadata->num_rows()==1 )  ?  $metadata->row()->variable  :  ''; 
			$data['txt_alternativas'] = ( $metadata->num_rows()==1 )  ?  $metadata->row()->alternativas  :  ''; 
			$data['txt_otro'] 		= ( $metadata->num_rows()==1 )  ?  $metadata->row()->otro  :  ''; 
			$data['txt_faltantes'] 	= ( $metadata->num_rows()==1 )  ?  $metadata->row()->faltantes  :  ''; 
			$data['txt_productor'] 	= ( $metadata->num_rows()==1 )  ?  $metadata->row()->productor :  ''; 
			$data['txt_definiciones'] = ( $metadata->num_rows()==1 )  ?  $metadata->row()->definiciones  :  '';	

			$data['main_content'] = 'tabulados/acuicultor/reporte_103_view';

			$this->load->view('backend/includes/template', $data);		
	}


	public function reporte_104()
	{
			$data['restriccion'] = $this->restriccion ;
			$data['nav'] = TRUE;
			$data['title'] = 'Tabulados Acuicultor';	
			$data['nom_tabulados'] = $this->tabulados_model->get_nombre_tabulados();	
			$data['opcion'] = 104;		
			$data['tables'] = $this->acuicultor_model->get_tabulado_104();

			$texto = ($this->tabulados_model->get_texto(2,$data['opcion'])->num_rows() > 0)  ?  $texto = $this->tabulados_model->get_texto(2,$data['opcion'])->row()->texto  :  '';
			$data['texto'] =  $texto; 
			$texto_2 = ($this->tabulados_model->get_texto(2,$data['opcion'])->num_rows() > 0)  ?  $texto_2 = $this->tabulados_model->get_texto(2,$data['opcion'])->row()->texto_2  :  '';
			$data['texto_2'] =  $texto_2; 

			$metadata = $this->tabulados_model->get_metadata(2,$data['opcion']); 
			$data['txt_tabulado'] 	= ( $metadata->num_rows()==1 )  ?  $metadata->row()->tabulado  :  ''; 
			$data['txt_contenido'] 	= ( $metadata->num_rows()==1 )  ?  $metadata->row()->contenido  :  ''; 
			$data['txt_casos'] 		= ( $metadata->num_rows()==1 )  ?  $metadata->row()->casos  :  ''; 
			$data['txt_variables'] 	= ( $metadata->num_rows()==1 )  ?  $metadata->row()->variable  :  ''; 
			$data['txt_alternativas'] = ( $metadata->num_rows()==1 )  ?  $metadata->row()->alternativas  :  ''; 
			$data['txt_otro'] 		= ( $metadata->num_rows()==1 )  ?  $metadata->row()->otro  :  ''; 
			$data['txt_faltantes'] 	= ( $metadata->num_rows()==1 )  ?  $metadata->row()->faltantes  :  ''; 
			$data['txt_productor'] 	= ( $metadata->num_rows()==1 )  ?  $metadata->row()->productor :  ''; 
			$data['txt_definiciones'] = ( $metadata->num_rows()==1 )  ?  $metadata->row()->definiciones  :  '';	

			$data['main_content'] = 'tabulados/acuicultor/reporte_104_view';

			$this->load->view('backend/includes/template', $data);		
	}


	public function reporte_105()
	{
			$data['restriccion'] = $this->restriccion ;
			$data['nav'] = TRUE;
			$data['title'] = 'Tabulados Acuicultor';	
			$data['nom_tabulados'] = $this->tabulados_model->get_nombre_tabulados();	
			$data['opcion'] = 105;		
			$data['tables'] = $this->acuicultor_model->get_tabulado_105();

			$texto = ($this->tabulados_model->get_texto(2,$data['opcion'])->num_rows() > 0)  ?  $texto = $this->tabulados_model->get_texto(2,$data['opcion'])->row()->texto  :  '';
			$data['texto'] =  $texto; 
			$texto_2 = ($this->tabulados_model->get_texto(2,$data['opcion'])->num_rows() > 0)  ?  $texto_2 = $this->tabulados_model->get_texto(2,$data['opcion'])->row()->texto_2  :  '';
			$data['texto_2'] =  $texto_2; 

			$metadata = $this->tabulados_model->get_metadata(2,$data['opcion']); 
			$data['txt_tabulado'] 	= ( $metadata->num_rows()==1 )  ?  $metadata->row()->tabulado  :  ''; 
			$data['txt_contenido'] 	= ( $metadata->num_rows()==1 )  ?  $metadata->row()->contenido  :  ''; 
			$data['txt_casos'] 		= ( $metadata->num_rows()==1 )  ?  $metadata->row()->casos  :  ''; 
			$data['txt_variables'] 	= ( $metadata->num_rows()==1 )  ?  $metadata->row()->variable  :  ''; 
			$data['txt_alternativas'] = ( $metadata->num_rows()==1 )  ?  $metadata->row()->alternativas  :  ''; 
			$data['txt_otro'] 		= ( $metadata->num_rows()==1 )  ?  $metadata->row()->otro  :  ''; 
			$data['txt_faltantes'] 	= ( $metadata->num_rows()==1 )  ?  $metadata->row()->faltantes  :  ''; 
			$data['txt_productor'] 	= ( $metadata->num_rows()==1 )  ?  $metadata->row()->productor :  ''; 
			$data['txt_definiciones'] = ( $metadata->num_rows()==1 )  ?  $metadata->row()->definiciones  :  '';	

			$data['main_content'] = 'tabulados/acuicultor/reporte_105_view';

			$this->load->view('backend/includes/template', $data);		
	}

	public function reporte_106()
	{
			$data['restriccion'] = $this->restriccion ;
			$data['nav'] = TRUE;
			$data['title'] = 'Tabulados Acuicultor';	
			$data['nom_tabulados'] = $this->tabulados_model->get_nombre_tabulados();	
			$data['opcion'] = 106;		
			$data['tables'] = $this->acuicultor_model->get_tabulado_106();

			$texto = ($this->tabulados_model->get_texto(2,$data['opcion'])->num_rows() > 0)  ?  $texto = $this->tabulados_model->get_texto(2,$data['opcion'])->row()->texto  :  '';
			$data['texto'] =  $texto; 
			$texto_2 = ($this->tabulados_model->get_texto(2,$data['opcion'])->num_rows() > 0)  ?  $texto_2 = $this->tabulados_model->get_texto(2,$data['opcion'])->row()->texto_2  :  '';
			$data['texto_2'] =  $texto_2; 

			$metadata = $this->tabulados_model->get_metadata(2,$data['opcion']); 
			$data['txt_tabulado'] 	= ( $metadata->num_rows()==1 )  ?  $metadata->row()->tabulado  :  ''; 
			$data['txt_contenido'] 	= ( $metadata->num_rows()==1 )  ?  $metadata->row()->contenido  :  ''; 
			$data['txt_casos'] 		= ( $metadata->num_rows()==1 )  ?  $metadata->row()->casos  :  ''; 
			$data['txt_variables'] 	= ( $metadata->num_rows()==1 )  ?  $metadata->row()->variable  :  ''; 
			$data['txt_alternativas'] = ( $metadata->num_rows()==1 )  ?  $metadata->row()->alternativas  :  ''; 
			$data['txt_otro'] 		= ( $metadata->num_rows()==1 )  ?  $metadata->row()->otro  :  ''; 
			$data['txt_faltantes'] 	= ( $metadata->num_rows()==1 )  ?  $metadata->row()->faltantes  :  ''; 
			$data['txt_productor'] 	= ( $metadata->num_rows()==1 )  ?  $metadata->row()->productor :  ''; 
			$data['txt_definiciones'] = ( $metadata->num_rows()==1 )  ?  $metadata->row()->definiciones  :  '';	

			$data['main_content'] = 'tabulados/acuicultor/reporte_106_view';

			$this->load->view('backend/includes/template', $data);		
	}

	public function reporte_107()
	{
			$data['restriccion'] = $this->restriccion ;
			$data['nav'] = TRUE;
			$data['title'] = 'Tabulados Acuicultor';	
			$data['nom_tabulados'] = $this->tabulados_model->get_nombre_tabulados();	
			$data['opcion'] = 107;		
			$data['tables'] = $this->acuicultor_model->get_tabulado_107();

			$texto = ($this->tabulados_model->get_texto(2,$data['opcion'])->num_rows() > 0)  ?  $texto = $this->tabulados_model->get_texto(2,$data['opcion'])->row()->texto  :  '';
			$data['texto'] =  $texto; 
			$texto_2 = ($this->tabulados_model->get_texto(2,$data['opcion'])->num_rows() > 0)  ?  $texto_2 = $this->tabulados_model->get_texto(2,$data['opcion'])->row()->texto_2  :  '';
			$data['texto_2'] =  $texto_2; 

			$metadata = $this->tabulados_model->get_metadata(2,$data['opcion']); 
			$data['txt_tabulado'] 	= ( $metadata->num_rows()==1 )  ?  $metadata->row()->tabulado  :  ''; 
			$data['txt_contenido'] 	= ( $metadata->num_rows()==1 )  ?  $metadata->row()->contenido  :  ''; 
			$data['txt_casos'] 		= ( $metadata->num_rows()==1 )  ?  $metadata->row()->casos  :  ''; 
			$data['txt_variables'] 	= ( $metadata->num_rows()==1 )  ?  $metadata->row()->variable  :  ''; 
			$data['txt_alternativas'] = ( $metadata->num_rows()==1 )  ?  $metadata->row()->alternativas  :  ''; 
			$data['txt_otro'] 		= ( $metadata->num_rows()==1 )  ?  $metadata->row()->otro  :  ''; 
			$data['txt_faltantes'] 	= ( $metadata->num_rows()==1 )  ?  $metadata->row()->faltantes  :  ''; 
			$data['txt_productor'] 	= ( $metadata->num_rows()==1 )  ?  $metadata->row()->productor :  ''; 
			$data['txt_definiciones'] = ( $metadata->num_rows()==1 )  ?  $metadata->row()->definiciones  :  '';	

			$data['main_content'] = 'tabulados/acuicultor/reporte_107_view';

			$this->load->view('backend/includes/template', $data);		
	}

	public function reporte_108()
	{
			$data['restriccion'] = $this->restriccion ;
			$data['nav'] = TRUE;
			$data['title'] = 'Tabulados Acuicultor';	
			$data['nom_tabulados'] = $this->tabulados_model->get_nombre_tabulados();	
			$data['opcion'] = 108;		
			$data['tables'] = $this->acuicultor_model->get_tabulado_108();

			$texto = ($this->tabulados_model->get_texto(2,$data['opcion'])->num_rows() > 0)  ?  $texto = $this->tabulados_model->get_texto(2,$data['opcion'])->row()->texto  :  '';
			$data['texto'] =  $texto; 
			$texto_2 = ($this->tabulados_model->get_texto(2,$data['opcion'])->num_rows() > 0)  ?  $texto_2 = $this->tabulados_model->get_texto(2,$data['opcion'])->row()->texto_2  :  '';
			$data['texto_2'] =  $texto_2; 

			$metadata = $this->tabulados_model->get_metadata(2,$data['opcion']); 
			$data['txt_tabulado'] 	= ( $metadata->num_rows()==1 )  ?  $metadata->row()->tabulado  :  ''; 
			$data['txt_contenido'] 	= ( $metadata->num_rows()==1 )  ?  $metadata->row()->contenido  :  ''; 
			$data['txt_casos'] 		= ( $metadata->num_rows()==1 )  ?  $metadata->row()->casos  :  ''; 
			$data['txt_variables'] 	= ( $metadata->num_rows()==1 )  ?  $metadata->row()->variable  :  ''; 
			$data['txt_alternativas'] = ( $metadata->num_rows()==1 )  ?  $metadata->row()->alternativas  :  ''; 
			$data['txt_otro'] 		= ( $metadata->num_rows()==1 )  ?  $metadata->row()->otro  :  ''; 
			$data['txt_faltantes'] 	= ( $metadata->num_rows()==1 )  ?  $metadata->row()->faltantes  :  ''; 
			$data['txt_productor'] 	= ( $metadata->num_rows()==1 )  ?  $metadata->row()->productor :  ''; 
			$data['txt_definiciones'] = ( $metadata->num_rows()==1 )  ?  $metadata->row()->definiciones  :  '';	

			$data['main_content'] = 'tabulados/acuicultor/reporte_108_view';

			$this->load->view('backend/includes/template', $data);		
	}

	public function reporte_109()
	{
			$data['restriccion'] = $this->restriccion ;
			$data['nav'] = TRUE;
			$data['title'] = 'Tabulados Acuicultor';	
			$data['nom_tabulados'] = $this->tabulados_model->get_nombre_tabulados();	
			$data['opcion'] = 109;		
			$data['tables'] = $this->acuicultor_model->get_tabulado_109();

			$texto = ($this->tabulados_model->get_texto(2,$data['opcion'])->num_rows() > 0)  ?  $texto = $this->tabulados_model->get_texto(2,$data['opcion'])->row()->texto  :  '';
			$data['texto'] =  $texto; 
			$texto_2 = ($this->tabulados_model->get_texto(2,$data['opcion'])->num_rows() > 0)  ?  $texto_2 = $this->tabulados_model->get_texto(2,$data['opcion'])->row()->texto_2  :  '';
			$data['texto_2'] =  $texto_2; 

			$metadata = $this->tabulados_model->get_metadata(2,$data['opcion']); 
			$data['txt_tabulado'] 	= ( $metadata->num_rows()==1 )  ?  $metadata->row()->tabulado  :  ''; 
			$data['txt_contenido'] 	= ( $metadata->num_rows()==1 )  ?  $metadata->row()->contenido  :  ''; 
			$data['txt_casos'] 		= ( $metadata->num_rows()==1 )  ?  $metadata->row()->casos  :  ''; 
			$data['txt_variables'] 	= ( $metadata->num_rows()==1 )  ?  $metadata->row()->variable  :  ''; 
			$data['txt_alternativas'] = ( $metadata->num_rows()==1 )  ?  $metadata->row()->alternativas  :  ''; 
			$data['txt_otro'] 		= ( $metadata->num_rows()==1 )  ?  $metadata->row()->otro  :  ''; 
			$data['txt_faltantes'] 	= ( $metadata->num_rows()==1 )  ?  $metadata->row()->faltantes  :  ''; 
			$data['txt_productor'] 	= ( $metadata->num_rows()==1 )  ?  $metadata->row()->productor :  ''; 
			$data['txt_definiciones'] = ( $metadata->num_rows()==1 )  ?  $metadata->row()->definiciones  :  '';	

			$data['main_content'] = 'tabulados/acuicultor/reporte_109_view';

			$this->load->view('backend/includes/template', $data);		
	}

	public function reporte_110()
	{
			$data['restriccion'] = $this->restriccion ;
			$data['nav'] = TRUE;
			$data['title'] = 'Tabulados Acuicultor';	
			$data['nom_tabulados'] = $this->tabulados_model->get_nombre_tabulados();	
			$data['opcion'] = 110;		
			$data['tables'] = $this->acuicultor_model->get_tabulado_110();

			$texto = ($this->tabulados_model->get_texto(2,$data['opcion'])->num_rows() > 0)  ?  $texto = $this->tabulados_model->get_texto(2,$data['opcion'])->row()->texto  :  '';
			$data['texto'] =  $texto; 
			$texto_2 = ($this->tabulados_model->get_texto(2,$data['opcion'])->num_rows() > 0)  ?  $texto_2 = $this->tabulados_model->get_texto(2,$data['opcion'])->row()->texto_2  :  '';
			$data['texto_2'] =  $texto_2; 

			$metadata = $this->tabulados_model->get_metadata(2,$data['opcion']); 
			$data['txt_tabulado'] 	= ( $metadata->num_rows()==1 )  ?  $metadata->row()->tabulado  :  ''; 
			$data['txt_contenido'] 	= ( $metadata->num_rows()==1 )  ?  $metadata->row()->contenido  :  ''; 
			$data['txt_casos'] 		= ( $metadata->num_rows()==1 )  ?  $metadata->row()->casos  :  ''; 
			$data['txt_variables'] 	= ( $metadata->num_rows()==1 )  ?  $metadata->row()->variable  :  ''; 
			$data['txt_alternativas'] = ( $metadata->num_rows()==1 )  ?  $metadata->row()->alternativas  :  ''; 
			$data['txt_otro'] 		= ( $metadata->num_rows()==1 )  ?  $metadata->row()->otro  :  ''; 
			$data['txt_faltantes'] 	= ( $metadata->num_rows()==1 )  ?  $metadata->row()->faltantes  :  ''; 
			$data['txt_productor'] 	= ( $metadata->num_rows()==1 )  ?  $metadata->row()->productor :  ''; 
			$data['txt_definiciones'] = ( $metadata->num_rows()==1 )  ?  $metadata->row()->definiciones  :  '';	

			$data['main_content'] = 'tabulados/acuicultor/reporte_110_view';

			$this->load->view('backend/includes/template', $data);		
	}

	public function reporte_111()
	{
			$data['restriccion'] = $this->restriccion ;
			$data['nav'] = TRUE;
			$data['title'] = 'Tabulados Acuicultor';	
			$data['nom_tabulados'] = $this->tabulados_model->get_nombre_tabulados();	
			$data['opcion'] = 111;		
			$data['tables'] = $this->acuicultor_model->get_tabulado_111();

			$texto = ($this->tabulados_model->get_texto(2,$data['opcion'])->num_rows() > 0)  ?  $texto = $this->tabulados_model->get_texto(2,$data['opcion'])->row()->texto  :  '';
			$data['texto'] =  $texto; 
			$texto_2 = ($this->tabulados_model->get_texto(2,$data['opcion'])->num_rows() > 0)  ?  $texto_2 = $this->tabulados_model->get_texto(2,$data['opcion'])->row()->texto_2  :  '';
			$data['texto_2'] =  $texto_2; 

			$metadata = $this->tabulados_model->get_metadata(2,$data['opcion']); 
			$data['txt_tabulado'] 	= ( $metadata->num_rows()==1 )  ?  $metadata->row()->tabulado  :  ''; 
			$data['txt_contenido'] 	= ( $metadata->num_rows()==1 )  ?  $metadata->row()->contenido  :  ''; 
			$data['txt_casos'] 		= ( $metadata->num_rows()==1 )  ?  $metadata->row()->casos  :  ''; 
			$data['txt_variables'] 	= ( $metadata->num_rows()==1 )  ?  $metadata->row()->variable  :  ''; 
			$data['txt_alternativas'] = ( $metadata->num_rows()==1 )  ?  $metadata->row()->alternativas  :  ''; 
			$data['txt_otro'] 		= ( $metadata->num_rows()==1 )  ?  $metadata->row()->otro  :  ''; 
			$data['txt_faltantes'] 	= ( $metadata->num_rows()==1 )  ?  $metadata->row()->faltantes  :  ''; 
			$data['txt_productor'] 	= ( $metadata->num_rows()==1 )  ?  $metadata->row()->productor :  ''; 
			$data['txt_definiciones'] = ( $metadata->num_rows()==1 )  ?  $metadata->row()->definiciones  :  '';	

			$data['main_content'] = 'tabulados/acuicultor/reporte_111_view';

			$this->load->view('backend/includes/template', $data);		
	}

	public function reporte_112()
	{
			$data['restriccion'] = $this->restriccion ;
			$data['nav'] = TRUE;
			$data['title'] = 'Tabulados Acuicultor';	
			$data['nom_tabulados'] = $this->tabulados_model->get_nombre_tabulados();	
			$data['opcion'] = 112;		
			$data['tables'] = $this->acuicultor_model->get_tabulado_112();

			$texto = ($this->tabulados_model->get_texto(2,$data['opcion'])->num_rows() > 0)  ?  $texto = $this->tabulados_model->get_texto(2,$data['opcion'])->row()->texto  :  '';
			$data['texto'] =  $texto; 
			$texto_2 = ($this->tabulados_model->get_texto(2,$data['opcion'])->num_rows() > 0)  ?  $texto_2 = $this->tabulados_model->get_texto(2,$data['opcion'])->row()->texto_2  :  '';
			$data['texto_2'] =  $texto_2; 

			$metadata = $this->tabulados_model->get_metadata(2,$data['opcion']); 
			$data['txt_tabulado'] 	= ( $metadata->num_rows()==1 )  ?  $metadata->row()->tabulado  :  ''; 
			$data['txt_contenido'] 	= ( $metadata->num_rows()==1 )  ?  $metadata->row()->contenido  :  ''; 
			$data['txt_casos'] 		= ( $metadata->num_rows()==1 )  ?  $metadata->row()->casos  :  ''; 
			$data['txt_variables'] 	= ( $metadata->num_rows()==1 )  ?  $metadata->row()->variable  :  ''; 
			$data['txt_alternativas'] = ( $metadata->num_rows()==1 )  ?  $metadata->row()->alternativas  :  ''; 
			$data['txt_otro'] 		= ( $metadata->num_rows()==1 )  ?  $metadata->row()->otro  :  ''; 
			$data['txt_faltantes'] 	= ( $metadata->num_rows()==1 )  ?  $metadata->row()->faltantes  :  ''; 
			$data['txt_productor'] 	= ( $metadata->num_rows()==1 )  ?  $metadata->row()->productor :  ''; 
			$data['txt_definiciones'] = ( $metadata->num_rows()==1 )  ?  $metadata->row()->definiciones  :  '';	

			$data['main_content'] = 'tabulados/acuicultor/reporte_112_view';

			$this->load->view('backend/includes/template', $data);		
	}

	public function reporte_113()
	{
			$data['restriccion'] = $this->restriccion ;
			$data['nav'] = TRUE;
			$data['title'] = 'Tabulados Acuicultor';	
			$data['nom_tabulados'] = $this->tabulados_model->get_nombre_tabulados();	
			$data['opcion'] = 113;		
			$data['tables'] = $this->acuicultor_model->get_tabulado_113();

			$texto = ($this->tabulados_model->get_texto(2,$data['opcion'])->num_rows() > 0)  ?  $texto = $this->tabulados_model->get_texto(2,$data['opcion'])->row()->texto  :  '';
			$data['texto'] =  $texto; 
			$texto_2 = ($this->tabulados_model->get_texto(2,$data['opcion'])->num_rows() > 0)  ?  $texto_2 = $this->tabulados_model->get_texto(2,$data['opcion'])->row()->texto_2  :  '';
			$data['texto_2'] =  $texto_2; 

			$metadata = $this->tabulados_model->get_metadata(2,$data['opcion']); 
			$data['txt_tabulado'] 	= ( $metadata->num_rows()==1 )  ?  $metadata->row()->tabulado  :  ''; 
			$data['txt_contenido'] 	= ( $metadata->num_rows()==1 )  ?  $metadata->row()->contenido  :  ''; 
			$data['txt_casos'] 		= ( $metadata->num_rows()==1 )  ?  $metadata->row()->casos  :  ''; 
			$data['txt_variables'] 	= ( $metadata->num_rows()==1 )  ?  $metadata->row()->variable  :  ''; 
			$data['txt_alternativas'] = ( $metadata->num_rows()==1 )  ?  $metadata->row()->alternativas  :  ''; 
			$data['txt_otro'] 		= ( $metadata->num_rows()==1 )  ?  $metadata->row()->otro  :  ''; 
			$data['txt_faltantes'] 	= ( $metadata->num_rows()==1 )  ?  $metadata->row()->faltantes  :  ''; 
			$data['txt_productor'] 	= ( $metadata->num_rows()==1 )  ?  $metadata->row()->productor :  ''; 
			$data['txt_definiciones'] = ( $metadata->num_rows()==1 )  ?  $metadata->row()->definiciones  :  '';	

			$data['main_content'] = 'tabulados/acuicultor/reporte_113_view';

			$this->load->view('backend/includes/template', $data);		
	}

	public function reporte_114()
	{
			$data['restriccion'] = $this->restriccion ;
			$data['nav'] = TRUE;
			$data['title'] = 'Tabulados Acuicultor';	
			$data['nom_tabulados'] = $this->tabulados_model->get_nombre_tabulados();	
			$data['opcion'] = 114;		
			$data['tables'] = $this->acuicultor_model->get_tabulado_114();

			$texto = ($this->tabulados_model->get_texto(2,$data['opcion'])->num_rows() > 0)  ?  $texto = $this->tabulados_model->get_texto(2,$data['opcion'])->row()->texto  :  '';
			$data['texto'] =  $texto; 
			$texto_2 = ($this->tabulados_model->get_texto(2,$data['opcion'])->num_rows() > 0)  ?  $texto_2 = $this->tabulados_model->get_texto(2,$data['opcion'])->row()->texto_2  :  '';
			$data['texto_2'] =  $texto_2; 

			$metadata = $this->tabulados_model->get_metadata(2,$data['opcion']); 
			$data['txt_tabulado'] 	= ( $metadata->num_rows()==1 )  ?  $metadata->row()->tabulado  :  ''; 
			$data['txt_contenido'] 	= ( $metadata->num_rows()==1 )  ?  $metadata->row()->contenido  :  ''; 
			$data['txt_casos'] 		= ( $metadata->num_rows()==1 )  ?  $metadata->row()->casos  :  ''; 
			$data['txt_variables'] 	= ( $metadata->num_rows()==1 )  ?  $metadata->row()->variable  :  ''; 
			$data['txt_alternativas'] = ( $metadata->num_rows()==1 )  ?  $metadata->row()->alternativas  :  ''; 
			$data['txt_otro'] 		= ( $metadata->num_rows()==1 )  ?  $metadata->row()->otro  :  ''; 
			$data['txt_faltantes'] 	= ( $metadata->num_rows()==1 )  ?  $metadata->row()->faltantes  :  ''; 
			$data['txt_productor'] 	= ( $metadata->num_rows()==1 )  ?  $metadata->row()->productor :  ''; 
			$data['txt_definiciones'] = ( $metadata->num_rows()==1 )  ?  $metadata->row()->definiciones  :  '';	

			$data['main_content'] = 'tabulados/acuicultor/reporte_114_view';

			$this->load->view('backend/includes/template', $data);		
	}

	public function reporte_115()
	{
			$data['restriccion'] = $this->restriccion ;
			$data['nav'] = TRUE;
			$data['title'] = 'Tabulados Acuicultor';	
			$data['nom_tabulados'] = $this->tabulados_model->get_nombre_tabulados();	
			$data['opcion'] = 115;		
			$data['tables'] = $this->acuicultor_model->get_tabulado_115();

			$texto = ($this->tabulados_model->get_texto(2,$data['opcion'])->num_rows() > 0)  ?  $texto = $this->tabulados_model->get_texto(2,$data['opcion'])->row()->texto  :  '';
			$data['texto'] =  $texto; 
			$texto_2 = ($this->tabulados_model->get_texto(2,$data['opcion'])->num_rows() > 0)  ?  $texto_2 = $this->tabulados_model->get_texto(2,$data['opcion'])->row()->texto_2  :  '';
			$data['texto_2'] =  $texto_2; 

			$metadata = $this->tabulados_model->get_metadata(2,$data['opcion']); 
			$data['txt_tabulado'] 	= ( $metadata->num_rows()==1 )  ?  $metadata->row()->tabulado  :  ''; 
			$data['txt_contenido'] 	= ( $metadata->num_rows()==1 )  ?  $metadata->row()->contenido  :  ''; 
			$data['txt_casos'] 		= ( $metadata->num_rows()==1 )  ?  $metadata->row()->casos  :  ''; 
			$data['txt_variables'] 	= ( $metadata->num_rows()==1 )  ?  $metadata->row()->variable  :  ''; 
			$data['txt_alternativas'] = ( $metadata->num_rows()==1 )  ?  $metadata->row()->alternativas  :  ''; 
			$data['txt_otro'] 		= ( $metadata->num_rows()==1 )  ?  $metadata->row()->otro  :  ''; 
			$data['txt_faltantes'] 	= ( $metadata->num_rows()==1 )  ?  $metadata->row()->faltantes  :  ''; 
			$data['txt_productor'] 	= ( $metadata->num_rows()==1 )  ?  $metadata->row()->productor :  ''; 
			$data['txt_definiciones'] = ( $metadata->num_rows()==1 )  ?  $metadata->row()->definiciones  :  '';	

			$data['main_content'] = 'tabulados/acuicultor/reporte_115_view';

			$this->load->view('backend/includes/template', $data);		
	}

	public function reporte_116()
	{
			$data['restriccion'] = $this->restriccion ;
			$data['nav'] = TRUE;
			$data['title'] = 'Tabulados Acuicultor';	
			$data['nom_tabulados'] = $this->tabulados_model->get_nombre_tabulados();	
			$data['opcion'] = 116;		
			$data['tables'] = $this->acuicultor_model->get_tabulado_116();

			$texto = ($this->tabulados_model->get_texto(2,$data['opcion'])->num_rows() > 0)  ?  $texto = $this->tabulados_model->get_texto(2,$data['opcion'])->row()->texto  :  '';
			$data['texto'] =  $texto; 
			$texto_2 = ($this->tabulados_model->get_texto(2,$data['opcion'])->num_rows() > 0)  ?  $texto_2 = $this->tabulados_model->get_texto(2,$data['opcion'])->row()->texto_2  :  '';
			$data['texto_2'] =  $texto_2; 

			$metadata = $this->tabulados_model->get_metadata(2,$data['opcion']); 
			$data['txt_tabulado'] 	= ( $metadata->num_rows()==1 )  ?  $metadata->row()->tabulado  :  ''; 
			$data['txt_contenido'] 	= ( $metadata->num_rows()==1 )  ?  $metadata->row()->contenido  :  ''; 
			$data['txt_casos'] 		= ( $metadata->num_rows()==1 )  ?  $metadata->row()->casos  :  ''; 
			$data['txt_variables'] 	= ( $metadata->num_rows()==1 )  ?  $metadata->row()->variable  :  ''; 
			$data['txt_alternativas'] = ( $metadata->num_rows()==1 )  ?  $metadata->row()->alternativas  :  ''; 
			$data['txt_otro'] 		= ( $metadata->num_rows()==1 )  ?  $metadata->row()->otro  :  ''; 
			$data['txt_faltantes'] 	= ( $metadata->num_rows()==1 )  ?  $metadata->row()->faltantes  :  ''; 
			$data['txt_productor'] 	= ( $metadata->num_rows()==1 )  ?  $metadata->row()->productor :  ''; 
			$data['txt_definiciones'] = ( $metadata->num_rows()==1 )  ?  $metadata->row()->definiciones  :  '';	

			$data['main_content'] = 'tabulados/acuicultor/reporte_116_view';

			$this->load->view('backend/includes/template', $data);		
	}

	public function reporte_117()
	{
			$data['restriccion'] = $this->restriccion ;
			$data['nav'] = TRUE;
			$data['title'] = 'Tabulados Acuicultor';	
			$data['nom_tabulados'] = $this->tabulados_model->get_nombre_tabulados();	
			$data['opcion'] = 117;		
			$data['tables'] = $this->acuicultor_model->get_tabulado_117();

			$texto = ($this->tabulados_model->get_texto(2,$data['opcion'])->num_rows() > 0)  ?  $texto = $this->tabulados_model->get_texto(2,$data['opcion'])->row()->texto  :  '';
			$data['texto'] =  $texto; 
			$texto_2 = ($this->tabulados_model->get_texto(2,$data['opcion'])->num_rows() > 0)  ?  $texto_2 = $this->tabulados_model->get_texto(2,$data['opcion'])->row()->texto_2  :  '';
			$data['texto_2'] =  $texto_2; 

			$metadata = $this->tabulados_model->get_metadata(2,$data['opcion']); 
			$data['txt_tabulado'] 	= ( $metadata->num_rows()==1 )  ?  $metadata->row()->tabulado  :  ''; 
			$data['txt_contenido'] 	= ( $metadata->num_rows()==1 )  ?  $metadata->row()->contenido  :  ''; 
			$data['txt_casos'] 		= ( $metadata->num_rows()==1 )  ?  $metadata->row()->casos  :  ''; 
			$data['txt_variables'] 	= ( $metadata->num_rows()==1 )  ?  $metadata->row()->variable  :  ''; 
			$data['txt_alternativas'] = ( $metadata->num_rows()==1 )  ?  $metadata->row()->alternativas  :  ''; 
			$data['txt_otro'] 		= ( $metadata->num_rows()==1 )  ?  $metadata->row()->otro  :  ''; 
			$data['txt_faltantes'] 	= ( $metadata->num_rows()==1 )  ?  $metadata->row()->faltantes  :  ''; 
			$data['txt_productor'] 	= ( $metadata->num_rows()==1 )  ?  $metadata->row()->productor :  ''; 
			$data['txt_definiciones'] = ( $metadata->num_rows()==1 )  ?  $metadata->row()->definiciones  :  '';	

			$data['main_content'] = 'tabulados/acuicultor/reporte_117_view';

			$this->load->view('backend/includes/template', $data);		
	}
	

	public function reporte_118()
	{
			$data['restriccion'] = $this->restriccion ;
			$data['nav'] = TRUE;
			$data['title'] = 'Tabulados Acuicultor';	
			$data['nom_tabulados'] = $this->tabulados_model->get_nombre_tabulados();	
			$data['opcion'] = 118;		
			$data['tables'] = $this->acuicultor_model->get_tabulado_118();

			$texto = ($this->tabulados_model->get_texto(2,$data['opcion'])->num_rows() > 0)  ?  $texto = $this->tabulados_model->get_texto(2,$data['opcion'])->row()->texto  :  '';
			$data['texto'] =  $texto; 
			$texto_2 = ($this->tabulados_model->get_texto(2,$data['opcion'])->num_rows() > 0)  ?  $texto_2 = $this->tabulados_model->get_texto(2,$data['opcion'])->row()->texto_2  :  '';
			$data['texto_2'] =  $texto_2; 

			$metadata = $this->tabulados_model->get_metadata(2,$data['opcion']); 
			$data['txt_tabulado'] 	= ( $metadata->num_rows()==1 )  ?  $metadata->row()->tabulado  :  ''; 
			$data['txt_contenido'] 	= ( $metadata->num_rows()==1 )  ?  $metadata->row()->contenido  :  ''; 
			$data['txt_casos'] 		= ( $metadata->num_rows()==1 )  ?  $metadata->row()->casos  :  ''; 
			$data['txt_variables'] 	= ( $metadata->num_rows()==1 )  ?  $metadata->row()->variable  :  ''; 
			$data['txt_alternativas'] = ( $metadata->num_rows()==1 )  ?  $metadata->row()->alternativas  :  ''; 
			$data['txt_otro'] 		= ( $metadata->num_rows()==1 )  ?  $metadata->row()->otro  :  ''; 
			$data['txt_faltantes'] 	= ( $metadata->num_rows()==1 )  ?  $metadata->row()->faltantes  :  ''; 
			$data['txt_productor'] 	= ( $metadata->num_rows()==1 )  ?  $metadata->row()->productor :  ''; 
			$data['txt_definiciones'] = ( $metadata->num_rows()==1 )  ?  $metadata->row()->definiciones  :  '';	

			$data['main_content'] = 'tabulados/acuicultor/reporte_118_view';

			$this->load->view('backend/includes/template', $data);		
	}


	public function reporte_119()
	{
			$data['restriccion'] = $this->restriccion ;
			$data['nav'] = TRUE;
			$data['title'] = 'Tabulados Acuicultor';	
			$data['nom_tabulados'] = $this->tabulados_model->get_nombre_tabulados();	
			$data['opcion'] = 119;		
			$data['tables'] = $this->acuicultor_model->get_tabulado_119();

			$texto = ($this->tabulados_model->get_texto(2,$data['opcion'])->num_rows() > 0)  ?  $texto = $this->tabulados_model->get_texto(2,$data['opcion'])->row()->texto  :  '';
			$data['texto'] =  $texto; 
			$texto_2 = ($this->tabulados_model->get_texto(2,$data['opcion'])->num_rows() > 0)  ?  $texto_2 = $this->tabulados_model->get_texto(2,$data['opcion'])->row()->texto_2  :  '';
			$data['texto_2'] =  $texto_2; 

			$metadata = $this->tabulados_model->get_metadata(2,$data['opcion']); 
			$data['txt_tabulado'] 	= ( $metadata->num_rows()==1 )  ?  $metadata->row()->tabulado  :  ''; 
			$data['txt_contenido'] 	= ( $metadata->num_rows()==1 )  ?  $metadata->row()->contenido  :  ''; 
			$data['txt_casos'] 		= ( $metadata->num_rows()==1 )  ?  $metadata->row()->casos  :  ''; 
			$data['txt_variables'] 	= ( $metadata->num_rows()==1 )  ?  $metadata->row()->variable  :  ''; 
			$data['txt_alternativas'] = ( $metadata->num_rows()==1 )  ?  $metadata->row()->alternativas  :  ''; 
			$data['txt_otro'] 		= ( $metadata->num_rows()==1 )  ?  $metadata->row()->otro  :  ''; 
			$data['txt_faltantes'] 	= ( $metadata->num_rows()==1 )  ?  $metadata->row()->faltantes  :  ''; 
			$data['txt_productor'] 	= ( $metadata->num_rows()==1 )  ?  $metadata->row()->productor :  ''; 
			$data['txt_definiciones'] = ( $metadata->num_rows()==1 )  ?  $metadata->row()->definiciones  :  '';	

			$data['main_content'] = 'tabulados/acuicultor/reporte_119_view';

			$this->load->view('backend/includes/template', $data);		
	}


	public function reporte_120()
	{
			$data['restriccion'] = $this->restriccion ;
			$data['nav'] = TRUE;
			$data['title'] = 'Tabulados Acuicultor';	
			$data['nom_tabulados'] = $this->tabulados_model->get_nombre_tabulados();	
			$data['opcion'] = 120;		
			$data['tables'] = $this->acuicultor_model->get_tabulado_120();

			$texto = ($this->tabulados_model->get_texto(2,$data['opcion'])->num_rows() > 0)  ?  $texto = $this->tabulados_model->get_texto(2,$data['opcion'])->row()->texto  :  '';
			$data['texto'] =  $texto; 
			$texto_2 = ($this->tabulados_model->get_texto(2,$data['opcion'])->num_rows() > 0)  ?  $texto_2 = $this->tabulados_model->get_texto(2,$data['opcion'])->row()->texto_2  :  '';
			$data['texto_2'] =  $texto_2; 

			$metadata = $this->tabulados_model->get_metadata(2,$data['opcion']); 
			$data['txt_tabulado'] 	= ( $metadata->num_rows()==1 )  ?  $metadata->row()->tabulado  :  ''; 
			$data['txt_contenido'] 	= ( $metadata->num_rows()==1 )  ?  $metadata->row()->contenido  :  ''; 
			$data['txt_casos'] 		= ( $metadata->num_rows()==1 )  ?  $metadata->row()->casos  :  ''; 
			$data['txt_variables'] 	= ( $metadata->num_rows()==1 )  ?  $metadata->row()->variable  :  ''; 
			$data['txt_alternativas'] = ( $metadata->num_rows()==1 )  ?  $metadata->row()->alternativas  :  ''; 
			$data['txt_otro'] 		= ( $metadata->num_rows()==1 )  ?  $metadata->row()->otro  :  ''; 
			$data['txt_faltantes'] 	= ( $metadata->num_rows()==1 )  ?  $metadata->row()->faltantes  :  ''; 
			$data['txt_productor'] 	= ( $metadata->num_rows()==1 )  ?  $metadata->row()->productor :  ''; 
			$data['txt_definiciones'] = ( $metadata->num_rows()==1 )  ?  $metadata->row()->definiciones  :  '';	

			$data['main_content'] = 'tabulados/acuicultor/reporte_120_view';

			$this->load->view('backend/includes/template', $data);		
	}


	public function reporte_121()
	{
			$data['restriccion'] = $this->restriccion ;
			$data['nav'] = TRUE;
			$data['title'] = 'Tabulados Acuicultor';	
			$data['nom_tabulados'] = $this->tabulados_model->get_nombre_tabulados();	
			$data['opcion'] = 121;		
			$data['tables'] = $this->acuicultor_model->get_tabulado_121();

			$texto = ($this->tabulados_model->get_texto(2,$data['opcion'])->num_rows() > 0)  ?  $texto = $this->tabulados_model->get_texto(2,$data['opcion'])->row()->texto  :  '';
			$data['texto'] =  $texto; 
			$texto_2 = ($this->tabulados_model->get_texto(2,$data['opcion'])->num_rows() > 0)  ?  $texto_2 = $this->tabulados_model->get_texto(2,$data['opcion'])->row()->texto_2  :  '';
			$data['texto_2'] =  $texto_2; 

			$metadata = $this->tabulados_model->get_metadata(2,$data['opcion']); 
			$data['txt_tabulado'] 	= ( $metadata->num_rows()==1 )  ?  $metadata->row()->tabulado  :  ''; 
			$data['txt_contenido'] 	= ( $metadata->num_rows()==1 )  ?  $metadata->row()->contenido  :  ''; 
			$data['txt_casos'] 		= ( $metadata->num_rows()==1 )  ?  $metadata->row()->casos  :  ''; 
			$data['txt_variables'] 	= ( $metadata->num_rows()==1 )  ?  $metadata->row()->variable  :  ''; 
			$data['txt_alternativas'] = ( $metadata->num_rows()==1 )  ?  $metadata->row()->alternativas  :  ''; 
			$data['txt_otro'] 		= ( $metadata->num_rows()==1 )  ?  $metadata->row()->otro  :  ''; 
			$data['txt_faltantes'] 	= ( $metadata->num_rows()==1 )  ?  $metadata->row()->faltantes  :  ''; 
			$data['txt_productor'] 	= ( $metadata->num_rows()==1 )  ?  $metadata->row()->productor :  ''; 
			$data['txt_definiciones'] = ( $metadata->num_rows()==1 )  ?  $metadata->row()->definiciones  :  '';	

			$data['main_content'] = 'tabulados/acuicultor/reporte_121_view';

			$this->load->view('backend/includes/template', $data);		
	}

	public function reporte_122()
	{
			$data['restriccion'] = $this->restriccion ;
			$data['nav'] = TRUE;
			$data['title'] = 'Tabulados Acuicultor';	
			$data['nom_tabulados'] = $this->tabulados_model->get_nombre_tabulados();	
			$data['opcion'] = 122;		
			$data['tables'] = $this->acuicultor_model->get_tabulado_122();

			$texto = ($this->tabulados_model->get_texto(2,$data['opcion'])->num_rows() > 0)  ?  $texto = $this->tabulados_model->get_texto(2,$data['opcion'])->row()->texto  :  '';
			$data['texto'] =  $texto; 
			$texto_2 = ($this->tabulados_model->get_texto(2,$data['opcion'])->num_rows() > 0)  ?  $texto_2 = $this->tabulados_model->get_texto(2,$data['opcion'])->row()->texto_2  :  '';
			$data['texto_2'] =  $texto_2; 

			$metadata = $this->tabulados_model->get_metadata(2,$data['opcion']); 
			$data['txt_tabulado'] 	= ( $metadata->num_rows()==1 )  ?  $metadata->row()->tabulado  :  ''; 
			$data['txt_contenido'] 	= ( $metadata->num_rows()==1 )  ?  $metadata->row()->contenido  :  ''; 
			$data['txt_casos'] 		= ( $metadata->num_rows()==1 )  ?  $metadata->row()->casos  :  ''; 
			$data['txt_variables'] 	= ( $metadata->num_rows()==1 )  ?  $metadata->row()->variable  :  ''; 
			$data['txt_alternativas'] = ( $metadata->num_rows()==1 )  ?  $metadata->row()->alternativas  :  ''; 
			$data['txt_otro'] 		= ( $metadata->num_rows()==1 )  ?  $metadata->row()->otro  :  ''; 
			$data['txt_faltantes'] 	= ( $metadata->num_rows()==1 )  ?  $metadata->row()->faltantes  :  ''; 
			$data['txt_productor'] 	= ( $metadata->num_rows()==1 )  ?  $metadata->row()->productor :  ''; 
			$data['txt_definiciones'] = ( $metadata->num_rows()==1 )  ?  $metadata->row()->definiciones  :  '';	

			$data['main_content'] = 'tabulados/acuicultor/reporte_122_view';

			$this->load->view('backend/includes/template', $data);		
	}

	public function reporte_123()
	{
			$data['restriccion'] = $this->restriccion ;
			$data['nav'] = TRUE;
			$data['title'] = 'Tabulados Acuicultor';	
			$data['nom_tabulados'] = $this->tabulados_model->get_nombre_tabulados();	
			$data['opcion'] = 123;		
			$data['tables'] = $this->acuicultor_model->get_tabulado_123();

			$texto = ($this->tabulados_model->get_texto(2,$data['opcion'])->num_rows() > 0)  ?  $texto = $this->tabulados_model->get_texto(2,$data['opcion'])->row()->texto  :  '';
			$data['texto'] =  $texto; 
			$texto_2 = ($this->tabulados_model->get_texto(2,$data['opcion'])->num_rows() > 0)  ?  $texto_2 = $this->tabulados_model->get_texto(2,$data['opcion'])->row()->texto_2  :  '';
			$data['texto_2'] =  $texto_2; 

			$metadata = $this->tabulados_model->get_metadata(2,$data['opcion']); 
			$data['txt_tabulado'] 	= ( $metadata->num_rows()==1 )  ?  $metadata->row()->tabulado  :  ''; 
			$data['txt_contenido'] 	= ( $metadata->num_rows()==1 )  ?  $metadata->row()->contenido  :  ''; 
			$data['txt_casos'] 		= ( $metadata->num_rows()==1 )  ?  $metadata->row()->casos  :  ''; 
			$data['txt_variables'] 	= ( $metadata->num_rows()==1 )  ?  $metadata->row()->variable  :  ''; 
			$data['txt_alternativas'] = ( $metadata->num_rows()==1 )  ?  $metadata->row()->alternativas  :  ''; 
			$data['txt_otro'] 		= ( $metadata->num_rows()==1 )  ?  $metadata->row()->otro  :  ''; 
			$data['txt_faltantes'] 	= ( $metadata->num_rows()==1 )  ?  $metadata->row()->faltantes  :  ''; 
			$data['txt_productor'] 	= ( $metadata->num_rows()==1 )  ?  $metadata->row()->productor :  ''; 
			$data['txt_definiciones'] = ( $metadata->num_rows()==1 )  ?  $metadata->row()->definiciones  :  '';	

			$data['main_content'] = 'tabulados/acuicultor/reporte_123_view';

			$this->load->view('backend/includes/template', $data);		
	}

	public function reporte_124()
	{
			$data['restriccion'] = $this->restriccion ;
			$data['nav'] = TRUE;
			$data['title'] = 'Tabulados Acuicultor';	
			$data['nom_tabulados'] = $this->tabulados_model->get_nombre_tabulados();	
			$data['opcion'] = 124;		
			$data['tables'] = $this->acuicultor_model->get_tabulado_124();

			$texto = ($this->tabulados_model->get_texto(2,$data['opcion'])->num_rows() > 0)  ?  $texto = $this->tabulados_model->get_texto(2,$data['opcion'])->row()->texto  :  '';
			$data['texto'] =  $texto; 
			$texto_2 = ($this->tabulados_model->get_texto(2,$data['opcion'])->num_rows() > 0)  ?  $texto_2 = $this->tabulados_model->get_texto(2,$data['opcion'])->row()->texto_2  :  '';
			$data['texto_2'] =  $texto_2; 

			$metadata = $this->tabulados_model->get_metadata(2,$data['opcion']); 
			$data['txt_tabulado'] 	= ( $metadata->num_rows()==1 )  ?  $metadata->row()->tabulado  :  ''; 
			$data['txt_contenido'] 	= ( $metadata->num_rows()==1 )  ?  $metadata->row()->contenido  :  ''; 
			$data['txt_casos'] 		= ( $metadata->num_rows()==1 )  ?  $metadata->row()->casos  :  ''; 
			$data['txt_variables'] 	= ( $metadata->num_rows()==1 )  ?  $metadata->row()->variable  :  ''; 
			$data['txt_alternativas'] = ( $metadata->num_rows()==1 )  ?  $metadata->row()->alternativas  :  ''; 
			$data['txt_otro'] 		= ( $metadata->num_rows()==1 )  ?  $metadata->row()->otro  :  ''; 
			$data['txt_faltantes'] 	= ( $metadata->num_rows()==1 )  ?  $metadata->row()->faltantes  :  ''; 
			$data['txt_productor'] 	= ( $metadata->num_rows()==1 )  ?  $metadata->row()->productor :  ''; 
			$data['txt_definiciones'] = ( $metadata->num_rows()==1 )  ?  $metadata->row()->definiciones  :  '';	

			$data['main_content'] = 'tabulados/acuicultor/reporte_124_view';

			$this->load->view('backend/includes/template', $data);		
	}

	public function reporte_125()
	{
			$data['restriccion'] = $this->restriccion ;
			$data['nav'] = TRUE;
			$data['title'] = 'Tabulados Acuicultor';	
			$data['nom_tabulados'] = $this->tabulados_model->get_nombre_tabulados();	
			$data['opcion'] = 125;		
			$data['tables'] = $this->acuicultor_model->get_tabulado_125();

			$texto = ($this->tabulados_model->get_texto(2,$data['opcion'])->num_rows() > 0)  ?  $texto = $this->tabulados_model->get_texto(2,$data['opcion'])->row()->texto  :  '';
			$data['texto'] =  $texto; 
			$texto_2 = ($this->tabulados_model->get_texto(2,$data['opcion'])->num_rows() > 0)  ?  $texto_2 = $this->tabulados_model->get_texto(2,$data['opcion'])->row()->texto_2  :  '';
			$data['texto_2'] =  $texto_2; 

			$metadata = $this->tabulados_model->get_metadata(2,$data['opcion']); 
			$data['txt_tabulado'] 	= ( $metadata->num_rows()==1 )  ?  $metadata->row()->tabulado  :  ''; 
			$data['txt_contenido'] 	= ( $metadata->num_rows()==1 )  ?  $metadata->row()->contenido  :  ''; 
			$data['txt_casos'] 		= ( $metadata->num_rows()==1 )  ?  $metadata->row()->casos  :  ''; 
			$data['txt_variables'] 	= ( $metadata->num_rows()==1 )  ?  $metadata->row()->variable  :  ''; 
			$data['txt_alternativas'] = ( $metadata->num_rows()==1 )  ?  $metadata->row()->alternativas  :  ''; 
			$data['txt_otro'] 		= ( $metadata->num_rows()==1 )  ?  $metadata->row()->otro  :  ''; 
			$data['txt_faltantes'] 	= ( $metadata->num_rows()==1 )  ?  $metadata->row()->faltantes  :  ''; 
			$data['txt_productor'] 	= ( $metadata->num_rows()==1 )  ?  $metadata->row()->productor :  ''; 
			$data['txt_definiciones'] = ( $metadata->num_rows()==1 )  ?  $metadata->row()->definiciones  :  '';	

			$data['main_content'] = 'tabulados/acuicultor/reporte_125_view';

			$this->load->view('backend/includes/template', $data);		
	}

	public function reporte_126()
	{
			$data['restriccion'] = $this->restriccion ;
			$data['nav'] = TRUE;
			$data['title'] = 'Tabulados Acuicultor';	
			$data['nom_tabulados'] = $this->tabulados_model->get_nombre_tabulados();	
			$data['opcion'] = 126;		
			$data['tables'] = $this->acuicultor_model->get_tabulado_126();

			$texto = ($this->tabulados_model->get_texto(2,$data['opcion'])->num_rows() > 0)  ?  $texto = $this->tabulados_model->get_texto(2,$data['opcion'])->row()->texto  :  '';
			$data['texto'] =  $texto; 
			$texto_2 = ($this->tabulados_model->get_texto(2,$data['opcion'])->num_rows() > 0)  ?  $texto_2 = $this->tabulados_model->get_texto(2,$data['opcion'])->row()->texto_2  :  '';
			$data['texto_2'] =  $texto_2; 

			$metadata = $this->tabulados_model->get_metadata(2,$data['opcion']); 
			$data['txt_tabulado'] 	= ( $metadata->num_rows()==1 )  ?  $metadata->row()->tabulado  :  ''; 
			$data['txt_contenido'] 	= ( $metadata->num_rows()==1 )  ?  $metadata->row()->contenido  :  ''; 
			$data['txt_casos'] 		= ( $metadata->num_rows()==1 )  ?  $metadata->row()->casos  :  ''; 
			$data['txt_variables'] 	= ( $metadata->num_rows()==1 )  ?  $metadata->row()->variable  :  ''; 
			$data['txt_alternativas'] = ( $metadata->num_rows()==1 )  ?  $metadata->row()->alternativas  :  ''; 
			$data['txt_otro'] 		= ( $metadata->num_rows()==1 )  ?  $metadata->row()->otro  :  ''; 
			$data['txt_faltantes'] 	= ( $metadata->num_rows()==1 )  ?  $metadata->row()->faltantes  :  ''; 
			$data['txt_productor'] 	= ( $metadata->num_rows()==1 )  ?  $metadata->row()->productor :  ''; 
			$data['txt_definiciones'] = ( $metadata->num_rows()==1 )  ?  $metadata->row()->definiciones  :  '';	

			$data['main_content'] = 'tabulados/acuicultor/reporte_126_view';

			$this->load->view('backend/includes/template', $data);		
	}

	public function reporte_127()
	{
			$data['restriccion'] = $this->restriccion ;
			$data['nav'] = TRUE;
			$data['title'] = 'Tabulados Acuicultor';	
			$data['nom_tabulados'] = $this->tabulados_model->get_nombre_tabulados();	
			$data['opcion'] = 127;		
			$data['tables'] = $this->acuicultor_model->get_tabulado_127();

			$texto = ($this->tabulados_model->get_texto(2,$data['opcion'])->num_rows() > 0)  ?  $texto = $this->tabulados_model->get_texto(2,$data['opcion'])->row()->texto  :  '';
			$data['texto'] =  $texto; 
			$texto_2 = ($this->tabulados_model->get_texto(2,$data['opcion'])->num_rows() > 0)  ?  $texto_2 = $this->tabulados_model->get_texto(2,$data['opcion'])->row()->texto_2  :  '';
			$data['texto_2'] =  $texto_2; 

			$metadata = $this->tabulados_model->get_metadata(2,$data['opcion']); 
			$data['txt_tabulado'] 	= ( $metadata->num_rows()==1 )  ?  $metadata->row()->tabulado  :  ''; 
			$data['txt_contenido'] 	= ( $metadata->num_rows()==1 )  ?  $metadata->row()->contenido  :  ''; 
			$data['txt_casos'] 		= ( $metadata->num_rows()==1 )  ?  $metadata->row()->casos  :  ''; 
			$data['txt_variables'] 	= ( $metadata->num_rows()==1 )  ?  $metadata->row()->variable  :  ''; 
			$data['txt_alternativas'] = ( $metadata->num_rows()==1 )  ?  $metadata->row()->alternativas  :  ''; 
			$data['txt_otro'] 		= ( $metadata->num_rows()==1 )  ?  $metadata->row()->otro  :  ''; 
			$data['txt_faltantes'] 	= ( $metadata->num_rows()==1 )  ?  $metadata->row()->faltantes  :  ''; 
			$data['txt_productor'] 	= ( $metadata->num_rows()==1 )  ?  $metadata->row()->productor :  ''; 
			$data['txt_definiciones'] = ( $metadata->num_rows()==1 )  ?  $metadata->row()->definiciones  :  '';	

			$data['main_content'] = 'tabulados/acuicultor/reporte_127_view';

			$this->load->view('backend/includes/template', $data);		
	}

	public function reporte_128()
	{
			$data['restriccion'] = $this->restriccion ;
			$data['nav'] = TRUE;
			$data['title'] = 'Tabulados Acuicultor';	
			$data['nom_tabulados'] = $this->tabulados_model->get_nombre_tabulados();	
			$data['opcion'] = 128;		
			$data['tables'] = $this->acuicultor_model->get_tabulado_128();

			$texto = ($this->tabulados_model->get_texto(2,$data['opcion'])->num_rows() > 0)  ?  $texto = $this->tabulados_model->get_texto(2,$data['opcion'])->row()->texto  :  '';
			$data['texto'] =  $texto; 
			$texto_2 = ($this->tabulados_model->get_texto(2,$data['opcion'])->num_rows() > 0)  ?  $texto_2 = $this->tabulados_model->get_texto(2,$data['opcion'])->row()->texto_2  :  '';
			$data['texto_2'] =  $texto_2; 

			$metadata = $this->tabulados_model->get_metadata(2,$data['opcion']); 
			$data['txt_tabulado'] 	= ( $metadata->num_rows()==1 )  ?  $metadata->row()->tabulado  :  ''; 
			$data['txt_contenido'] 	= ( $metadata->num_rows()==1 )  ?  $metadata->row()->contenido  :  ''; 
			$data['txt_casos'] 		= ( $metadata->num_rows()==1 )  ?  $metadata->row()->casos  :  ''; 
			$data['txt_variables'] 	= ( $metadata->num_rows()==1 )  ?  $metadata->row()->variable  :  ''; 
			$data['txt_alternativas'] = ( $metadata->num_rows()==1 )  ?  $metadata->row()->alternativas  :  ''; 
			$data['txt_otro'] 		= ( $metadata->num_rows()==1 )  ?  $metadata->row()->otro  :  ''; 
			$data['txt_faltantes'] 	= ( $metadata->num_rows()==1 )  ?  $metadata->row()->faltantes  :  ''; 
			$data['txt_productor'] 	= ( $metadata->num_rows()==1 )  ?  $metadata->row()->productor :  ''; 
			$data['txt_definiciones'] = ( $metadata->num_rows()==1 )  ?  $metadata->row()->definiciones  :  '';	

			$data['main_content'] = 'tabulados/acuicultor/reporte_128_view';

			$this->load->view('backend/includes/template', $data);		
	}

	public function reporte_129()
	{
			$data['restriccion'] = $this->restriccion ;
			$data['nav'] = TRUE;
			$data['title'] = 'Tabulados Acuicultor';	
			$data['nom_tabulados'] = $this->tabulados_model->get_nombre_tabulados();	
			$data['opcion'] = 129;		
			$data['tables'] = $this->acuicultor_model->get_tabulado_129();

			$texto = ($this->tabulados_model->get_texto(2,$data['opcion'])->num_rows() > 0)  ?  $texto = $this->tabulados_model->get_texto(2,$data['opcion'])->row()->texto  :  '';
			$data['texto'] =  $texto; 
			$texto_2 = ($this->tabulados_model->get_texto(2,$data['opcion'])->num_rows() > 0)  ?  $texto_2 = $this->tabulados_model->get_texto(2,$data['opcion'])->row()->texto_2  :  '';
			$data['texto_2'] =  $texto_2; 

			$metadata = $this->tabulados_model->get_metadata(2,$data['opcion']); 
			$data['txt_tabulado'] 	= ( $metadata->num_rows()==1 )  ?  $metadata->row()->tabulado  :  ''; 
			$data['txt_contenido'] 	= ( $metadata->num_rows()==1 )  ?  $metadata->row()->contenido  :  ''; 
			$data['txt_casos'] 		= ( $metadata->num_rows()==1 )  ?  $metadata->row()->casos  :  ''; 
			$data['txt_variables'] 	= ( $metadata->num_rows()==1 )  ?  $metadata->row()->variable  :  ''; 
			$data['txt_alternativas'] = ( $metadata->num_rows()==1 )  ?  $metadata->row()->alternativas  :  ''; 
			$data['txt_otro'] 		= ( $metadata->num_rows()==1 )  ?  $metadata->row()->otro  :  ''; 
			$data['txt_faltantes'] 	= ( $metadata->num_rows()==1 )  ?  $metadata->row()->faltantes  :  ''; 
			$data['txt_productor'] 	= ( $metadata->num_rows()==1 )  ?  $metadata->row()->productor :  ''; 
			$data['txt_definiciones'] = ( $metadata->num_rows()==1 )  ?  $metadata->row()->definiciones  :  '';	

			$data['main_content'] = 'tabulados/acuicultor/reporte_129_view';

			$this->load->view('backend/includes/template', $data);		
	}

	public function reporte_130()
	{
			$data['restriccion'] = $this->restriccion ;
			$data['nav'] = TRUE;
			$data['title'] = 'Tabulados Acuicultor';	
			$data['nom_tabulados'] = $this->tabulados_model->get_nombre_tabulados();	
			$data['opcion'] = 130;		
			$data['tables'] = $this->acuicultor_model->get_tabulado_130();

			$texto = ($this->tabulados_model->get_texto(2,$data['opcion'])->num_rows() > 0)  ?  $texto = $this->tabulados_model->get_texto(2,$data['opcion'])->row()->texto  :  '';
			$data['texto'] =  $texto; 
			$texto_2 = ($this->tabulados_model->get_texto(2,$data['opcion'])->num_rows() > 0)  ?  $texto_2 = $this->tabulados_model->get_texto(2,$data['opcion'])->row()->texto_2  :  '';
			$data['texto_2'] =  $texto_2; 

			$metadata = $this->tabulados_model->get_metadata(2,$data['opcion']); 
			$data['txt_tabulado'] 	= ( $metadata->num_rows()==1 )  ?  $metadata->row()->tabulado  :  ''; 
			$data['txt_contenido'] 	= ( $metadata->num_rows()==1 )  ?  $metadata->row()->contenido  :  ''; 
			$data['txt_casos'] 		= ( $metadata->num_rows()==1 )  ?  $metadata->row()->casos  :  ''; 
			$data['txt_variables'] 	= ( $metadata->num_rows()==1 )  ?  $metadata->row()->variable  :  ''; 
			$data['txt_alternativas'] = ( $metadata->num_rows()==1 )  ?  $metadata->row()->alternativas  :  ''; 
			$data['txt_otro'] 		= ( $metadata->num_rows()==1 )  ?  $metadata->row()->otro  :  ''; 
			$data['txt_faltantes'] 	= ( $metadata->num_rows()==1 )  ?  $metadata->row()->faltantes  :  ''; 
			$data['txt_productor'] 	= ( $metadata->num_rows()==1 )  ?  $metadata->row()->productor :  ''; 
			$data['txt_definiciones'] = ( $metadata->num_rows()==1 )  ?  $metadata->row()->definiciones  :  '';	

			$data['main_content'] = 'tabulados/acuicultor/reporte_130_view';

			$this->load->view('backend/includes/template', $data);		
	}

	public function reporte_131()
	{
			$data['restriccion'] = $this->restriccion ;
			$data['nav'] = TRUE;
			$data['title'] = 'Tabulados Acuicultor';	
			$data['nom_tabulados'] = $this->tabulados_model->get_nombre_tabulados();	
			$data['opcion'] = 131;		
			$data['tables'] = $this->acuicultor_model->get_tabulado_131();

			$texto = ($this->tabulados_model->get_texto(2,$data['opcion'])->num_rows() > 0)  ?  $texto = $this->tabulados_model->get_texto(2,$data['opcion'])->row()->texto  :  '';
			$data['texto'] =  $texto; 
			$texto_2 = ($this->tabulados_model->get_texto(2,$data['opcion'])->num_rows() > 0)  ?  $texto_2 = $this->tabulados_model->get_texto(2,$data['opcion'])->row()->texto_2  :  '';
			$data['texto_2'] =  $texto_2; 

			$metadata = $this->tabulados_model->get_metadata(2,$data['opcion']); 
			$data['txt_tabulado'] 	= ( $metadata->num_rows()==1 )  ?  $metadata->row()->tabulado  :  ''; 
			$data['txt_contenido'] 	= ( $metadata->num_rows()==1 )  ?  $metadata->row()->contenido  :  ''; 
			$data['txt_casos'] 		= ( $metadata->num_rows()==1 )  ?  $metadata->row()->casos  :  ''; 
			$data['txt_variables'] 	= ( $metadata->num_rows()==1 )  ?  $metadata->row()->variable  :  ''; 
			$data['txt_alternativas'] = ( $metadata->num_rows()==1 )  ?  $metadata->row()->alternativas  :  ''; 
			$data['txt_otro'] 		= ( $metadata->num_rows()==1 )  ?  $metadata->row()->otro  :  ''; 
			$data['txt_faltantes'] 	= ( $metadata->num_rows()==1 )  ?  $metadata->row()->faltantes  :  ''; 
			$data['txt_productor'] 	= ( $metadata->num_rows()==1 )  ?  $metadata->row()->productor :  ''; 
			$data['txt_definiciones'] = ( $metadata->num_rows()==1 )  ?  $metadata->row()->definiciones  :  '';	

			$data['main_content'] = 'tabulados/acuicultor/reporte_131_view';

			$this->load->view('backend/includes/template', $data);		
	}

	public function reporte_132()
	{
			$data['restriccion'] = $this->restriccion ;
			$data['nav'] = TRUE;
			$data['title'] = 'Tabulados Acuicultor';	
			$data['nom_tabulados'] = $this->tabulados_model->get_nombre_tabulados();	
			$data['opcion'] = 132;		
			$data['tables'] = $this->acuicultor_model->get_tabulado_132();

			$texto = ($this->tabulados_model->get_texto(2,$data['opcion'])->num_rows() > 0)  ?  $texto = $this->tabulados_model->get_texto(2,$data['opcion'])->row()->texto  :  '';
			$data['texto'] =  $texto; 
			$texto_2 = ($this->tabulados_model->get_texto(2,$data['opcion'])->num_rows() > 0)  ?  $texto_2 = $this->tabulados_model->get_texto(2,$data['opcion'])->row()->texto_2  :  '';
			$data['texto_2'] =  $texto_2; 

			$metadata = $this->tabulados_model->get_metadata(2,$data['opcion']); 
			$data['txt_tabulado'] 	= ( $metadata->num_rows()==1 )  ?  $metadata->row()->tabulado  :  ''; 
			$data['txt_contenido'] 	= ( $metadata->num_rows()==1 )  ?  $metadata->row()->contenido  :  ''; 
			$data['txt_casos'] 		= ( $metadata->num_rows()==1 )  ?  $metadata->row()->casos  :  ''; 
			$data['txt_variables'] 	= ( $metadata->num_rows()==1 )  ?  $metadata->row()->variable  :  ''; 
			$data['txt_alternativas'] = ( $metadata->num_rows()==1 )  ?  $metadata->row()->alternativas  :  ''; 
			$data['txt_otro'] 		= ( $metadata->num_rows()==1 )  ?  $metadata->row()->otro  :  ''; 
			$data['txt_faltantes'] 	= ( $metadata->num_rows()==1 )  ?  $metadata->row()->faltantes  :  ''; 
			$data['txt_productor'] 	= ( $metadata->num_rows()==1 )  ?  $metadata->row()->productor :  ''; 
			$data['txt_definiciones'] = ( $metadata->num_rows()==1 )  ?  $metadata->row()->definiciones  :  '';	

			$data['main_content'] = 'tabulados/acuicultor/reporte_132_view';

			$this->load->view('backend/includes/template', $data);		
	}


	public function reporte_133()
	{
			$data['restriccion'] = $this->restriccion ;
			$data['nav'] = TRUE;
			$data['title'] = 'Tabulados Acuicultor';	
			$data['nom_tabulados'] = $this->tabulados_model->get_nombre_tabulados();	
			$data['opcion'] = 133;		
			$data['tables'] = $this->acuicultor_model->get_tabulado_133();

			$texto = ($this->tabulados_model->get_texto(2,$data['opcion'])->num_rows() > 0)  ?  $texto = $this->tabulados_model->get_texto(2,$data['opcion'])->row()->texto  :  '';
			$data['texto'] =  $texto; 
			$texto_2 = ($this->tabulados_model->get_texto(2,$data['opcion'])->num_rows() > 0)  ?  $texto_2 = $this->tabulados_model->get_texto(2,$data['opcion'])->row()->texto_2  :  '';
			$data['texto_2'] =  $texto_2; 

			$metadata = $this->tabulados_model->get_metadata(2,$data['opcion']); 
			$data['txt_tabulado'] 	= ( $metadata->num_rows()==1 )  ?  $metadata->row()->tabulado  :  ''; 
			$data['txt_contenido'] 	= ( $metadata->num_rows()==1 )  ?  $metadata->row()->contenido  :  ''; 
			$data['txt_casos'] 		= ( $metadata->num_rows()==1 )  ?  $metadata->row()->casos  :  ''; 
			$data['txt_variables'] 	= ( $metadata->num_rows()==1 )  ?  $metadata->row()->variable  :  ''; 
			$data['txt_alternativas'] = ( $metadata->num_rows()==1 )  ?  $metadata->row()->alternativas  :  ''; 
			$data['txt_otro'] 		= ( $metadata->num_rows()==1 )  ?  $metadata->row()->otro  :  ''; 
			$data['txt_faltantes'] 	= ( $metadata->num_rows()==1 )  ?  $metadata->row()->faltantes  :  ''; 
			$data['txt_productor'] 	= ( $metadata->num_rows()==1 )  ?  $metadata->row()->productor :  ''; 
			$data['txt_definiciones'] = ( $metadata->num_rows()==1 )  ?  $metadata->row()->definiciones  :  '';	

			$data['main_content'] = 'tabulados/acuicultor/reporte_133_view';

			$this->load->view('backend/includes/template', $data);		
	}
	

	public function reporte_134()
	{
			$data['restriccion'] = $this->restriccion ;
			$data['nav'] = TRUE;
			$data['title'] = 'Tabulados Acuicultor';	
			$data['nom_tabulados'] = $this->tabulados_model->get_nombre_tabulados();	
			$data['opcion'] = 134;		
			$data['tables'] = $this->acuicultor_model->get_tabulado_134();

			$texto = ($this->tabulados_model->get_texto(2,$data['opcion'])->num_rows() > 0)  ?  $texto = $this->tabulados_model->get_texto(2,$data['opcion'])->row()->texto  :  '';
			$data['texto'] =  $texto; 
			$texto_2 = ($this->tabulados_model->get_texto(2,$data['opcion'])->num_rows() > 0)  ?  $texto_2 = $this->tabulados_model->get_texto(2,$data['opcion'])->row()->texto_2  :  '';
			$data['texto_2'] =  $texto_2; 

			$metadata = $this->tabulados_model->get_metadata(2,$data['opcion']); 
			$data['txt_tabulado'] 	= ( $metadata->num_rows()==1 )  ?  $metadata->row()->tabulado  :  ''; 
			$data['txt_contenido'] 	= ( $metadata->num_rows()==1 )  ?  $metadata->row()->contenido  :  ''; 
			$data['txt_casos'] 		= ( $metadata->num_rows()==1 )  ?  $metadata->row()->casos  :  ''; 
			$data['txt_variables'] 	= ( $metadata->num_rows()==1 )  ?  $metadata->row()->variable  :  ''; 
			$data['txt_alternativas'] = ( $metadata->num_rows()==1 )  ?  $metadata->row()->alternativas  :  ''; 
			$data['txt_otro'] 		= ( $metadata->num_rows()==1 )  ?  $metadata->row()->otro  :  ''; 
			$data['txt_faltantes'] 	= ( $metadata->num_rows()==1 )  ?  $metadata->row()->faltantes  :  ''; 
			$data['txt_productor'] 	= ( $metadata->num_rows()==1 )  ?  $metadata->row()->productor :  ''; 
			$data['txt_definiciones'] = ( $metadata->num_rows()==1 )  ?  $metadata->row()->definiciones  :  '';	

			$data['main_content'] = 'tabulados/acuicultor/reporte_134_view';

			$this->load->view('backend/includes/template', $data);		
	}


	public function reporte_135()
	{
			$data['restriccion'] = $this->restriccion ;
			$data['nav'] = TRUE;
			$data['title'] = 'Tabulados Acuicultor';	
			$data['nom_tabulados'] = $this->tabulados_model->get_nombre_tabulados();	
			$data['opcion'] = 135;		
			$data['tables'] = $this->acuicultor_model->get_tabulado_135();

			$texto = ($this->tabulados_model->get_texto(2,$data['opcion'])->num_rows() > 0)  ?  $texto = $this->tabulados_model->get_texto(2,$data['opcion'])->row()->texto  :  '';
			$data['texto'] =  $texto; 
			$texto_2 = ($this->tabulados_model->get_texto(2,$data['opcion'])->num_rows() > 0)  ?  $texto_2 = $this->tabulados_model->get_texto(2,$data['opcion'])->row()->texto_2  :  '';
			$data['texto_2'] =  $texto_2; 

			$metadata = $this->tabulados_model->get_metadata(2,$data['opcion']); 
			$data['txt_tabulado'] 	= ( $metadata->num_rows()==1 )  ?  $metadata->row()->tabulado  :  ''; 
			$data['txt_contenido'] 	= ( $metadata->num_rows()==1 )  ?  $metadata->row()->contenido  :  ''; 
			$data['txt_casos'] 		= ( $metadata->num_rows()==1 )  ?  $metadata->row()->casos  :  ''; 
			$data['txt_variables'] 	= ( $metadata->num_rows()==1 )  ?  $metadata->row()->variable  :  ''; 
			$data['txt_alternativas'] = ( $metadata->num_rows()==1 )  ?  $metadata->row()->alternativas  :  ''; 
			$data['txt_otro'] 		= ( $metadata->num_rows()==1 )  ?  $metadata->row()->otro  :  ''; 
			$data['txt_faltantes'] 	= ( $metadata->num_rows()==1 )  ?  $metadata->row()->faltantes  :  ''; 
			$data['txt_productor'] 	= ( $metadata->num_rows()==1 )  ?  $metadata->row()->productor :  ''; 
			$data['txt_definiciones'] = ( $metadata->num_rows()==1 )  ?  $metadata->row()->definiciones  :  '';	

			$data['main_content'] = 'tabulados/acuicultor/reporte_135_view';

			$this->load->view('backend/includes/template', $data);		
	}


	public function reporte_136()
	{
			$data['restriccion'] = $this->restriccion ;
			$data['nav'] = TRUE;
			$data['title'] = 'Tabulados Acuicultor';	
			$data['nom_tabulados'] = $this->tabulados_model->get_nombre_tabulados();	
			$data['opcion'] = 136;		
			$data['tables'] = $this->acuicultor_model->get_tabulado_136();

			$texto = ($this->tabulados_model->get_texto(2,$data['opcion'])->num_rows() > 0)  ?  $texto = $this->tabulados_model->get_texto(2,$data['opcion'])->row()->texto  :  '';
			$data['texto'] =  $texto; 
			$texto_2 = ($this->tabulados_model->get_texto(2,$data['opcion'])->num_rows() > 0)  ?  $texto_2 = $this->tabulados_model->get_texto(2,$data['opcion'])->row()->texto_2  :  '';
			$data['texto_2'] =  $texto_2; 

			$metadata = $this->tabulados_model->get_metadata(2,$data['opcion']); 
			$data['txt_tabulado'] 	= ( $metadata->num_rows()==1 )  ?  $metadata->row()->tabulado  :  ''; 
			$data['txt_contenido'] 	= ( $metadata->num_rows()==1 )  ?  $metadata->row()->contenido  :  ''; 
			$data['txt_casos'] 		= ( $metadata->num_rows()==1 )  ?  $metadata->row()->casos  :  ''; 
			$data['txt_variables'] 	= ( $metadata->num_rows()==1 )  ?  $metadata->row()->variable  :  ''; 
			$data['txt_alternativas'] = ( $metadata->num_rows()==1 )  ?  $metadata->row()->alternativas  :  ''; 
			$data['txt_otro'] 		= ( $metadata->num_rows()==1 )  ?  $metadata->row()->otro  :  ''; 
			$data['txt_faltantes'] 	= ( $metadata->num_rows()==1 )  ?  $metadata->row()->faltantes  :  ''; 
			$data['txt_productor'] 	= ( $metadata->num_rows()==1 )  ?  $metadata->row()->productor :  ''; 
			$data['txt_definiciones'] = ( $metadata->num_rows()==1 )  ?  $metadata->row()->definiciones  :  '';	

			$data['main_content'] = 'tabulados/acuicultor/reporte_136_view';

			$this->load->view('backend/includes/template', $data);		
	}


	public function reporte_137()
	{
			$data['restriccion'] = $this->restriccion ;
			$data['nav'] = TRUE;
			$data['title'] = 'Tabulados Acuicultor';	
			$data['nom_tabulados'] = $this->tabulados_model->get_nombre_tabulados();	
			$data['opcion'] = 137;		
			$data['tables'] = $this->acuicultor_model->get_tabulado_137();

			$texto = ($this->tabulados_model->get_texto(2,$data['opcion'])->num_rows() > 0)  ?  $texto = $this->tabulados_model->get_texto(2,$data['opcion'])->row()->texto  :  '';
			$data['texto'] =  $texto; 
			$texto_2 = ($this->tabulados_model->get_texto(2,$data['opcion'])->num_rows() > 0)  ?  $texto_2 = $this->tabulados_model->get_texto(2,$data['opcion'])->row()->texto_2  :  '';
			$data['texto_2'] =  $texto_2; 

			$metadata = $this->tabulados_model->get_metadata(2,$data['opcion']); 
			$data['txt_tabulado'] 	= ( $metadata->num_rows()==1 )  ?  $metadata->row()->tabulado  :  ''; 
			$data['txt_contenido'] 	= ( $metadata->num_rows()==1 )  ?  $metadata->row()->contenido  :  ''; 
			$data['txt_casos'] 		= ( $metadata->num_rows()==1 )  ?  $metadata->row()->casos  :  ''; 
			$data['txt_variables'] 	= ( $metadata->num_rows()==1 )  ?  $metadata->row()->variable  :  ''; 
			$data['txt_alternativas'] = ( $metadata->num_rows()==1 )  ?  $metadata->row()->alternativas  :  ''; 
			$data['txt_otro'] 		= ( $metadata->num_rows()==1 )  ?  $metadata->row()->otro  :  ''; 
			$data['txt_faltantes'] 	= ( $metadata->num_rows()==1 )  ?  $metadata->row()->faltantes  :  ''; 
			$data['txt_productor'] 	= ( $metadata->num_rows()==1 )  ?  $metadata->row()->productor :  ''; 
			$data['txt_definiciones'] = ( $metadata->num_rows()==1 )  ?  $metadata->row()->definiciones  :  '';	

			$data['main_content'] = 'tabulados/acuicultor/reporte_137_view';

			$this->load->view('backend/includes/template', $data);		
	}

	public function reporte_138()
	{
			$data['restriccion'] = $this->restriccion ;
			$data['nav'] = TRUE;
			$data['title'] = 'Tabulados Acuicultor';	
			$data['nom_tabulados'] = $this->tabulados_model->get_nombre_tabulados();	
			$data['opcion'] = 138;		
			$data['tables'] = $this->acuicultor_model->get_tabulado_138();

			$texto = ($this->tabulados_model->get_texto(2,$data['opcion'])->num_rows() > 0)  ?  $texto = $this->tabulados_model->get_texto(2,$data['opcion'])->row()->texto  :  '';
			$data['texto'] =  $texto; 
			$texto_2 = ($this->tabulados_model->get_texto(2,$data['opcion'])->num_rows() > 0)  ?  $texto_2 = $this->tabulados_model->get_texto(2,$data['opcion'])->row()->texto_2  :  '';
			$data['texto_2'] =  $texto_2; 

			$metadata = $this->tabulados_model->get_metadata(2,$data['opcion']); 
			$data['txt_tabulado'] 	= ( $metadata->num_rows()==1 )  ?  $metadata->row()->tabulado  :  ''; 
			$data['txt_contenido'] 	= ( $metadata->num_rows()==1 )  ?  $metadata->row()->contenido  :  ''; 
			$data['txt_casos'] 		= ( $metadata->num_rows()==1 )  ?  $metadata->row()->casos  :  ''; 
			$data['txt_variables'] 	= ( $metadata->num_rows()==1 )  ?  $metadata->row()->variable  :  ''; 
			$data['txt_alternativas'] = ( $metadata->num_rows()==1 )  ?  $metadata->row()->alternativas  :  ''; 
			$data['txt_otro'] 		= ( $metadata->num_rows()==1 )  ?  $metadata->row()->otro  :  ''; 
			$data['txt_faltantes'] 	= ( $metadata->num_rows()==1 )  ?  $metadata->row()->faltantes  :  ''; 
			$data['txt_productor'] 	= ( $metadata->num_rows()==1 )  ?  $metadata->row()->productor :  ''; 
			$data['txt_definiciones'] = ( $metadata->num_rows()==1 )  ?  $metadata->row()->definiciones  :  '';	

			$data['main_content'] = 'tabulados/acuicultor/reporte_138_view';

			$this->load->view('backend/includes/template', $data);		
	}


	public function reporte_139()
	{
			$data['restriccion'] = $this->restriccion ;
			$data['nav'] = TRUE;
			$data['title'] = 'Tabulados Acuicultor';	
			$data['nom_tabulados'] = $this->tabulados_model->get_nombre_tabulados();	
			$data['opcion'] = 139;		
			$data['tables'] = $this->acuicultor_model->get_tabulado_139();

			$texto = ($this->tabulados_model->get_texto(2,$data['opcion'])->num_rows() > 0)  ?  $texto = $this->tabulados_model->get_texto(2,$data['opcion'])->row()->texto  :  '';
			$data['texto'] =  $texto; 
			$texto_2 = ($this->tabulados_model->get_texto(2,$data['opcion'])->num_rows() > 0)  ?  $texto_2 = $this->tabulados_model->get_texto(2,$data['opcion'])->row()->texto_2  :  '';
			$data['texto_2'] =  $texto_2; 

			$metadata = $this->tabulados_model->get_metadata(2,$data['opcion']); 
			$data['txt_tabulado'] 	= ( $metadata->num_rows()==1 )  ?  $metadata->row()->tabulado  :  ''; 
			$data['txt_contenido'] 	= ( $metadata->num_rows()==1 )  ?  $metadata->row()->contenido  :  ''; 
			$data['txt_casos'] 		= ( $metadata->num_rows()==1 )  ?  $metadata->row()->casos  :  ''; 
			$data['txt_variables'] 	= ( $metadata->num_rows()==1 )  ?  $metadata->row()->variable  :  ''; 
			$data['txt_alternativas'] = ( $metadata->num_rows()==1 )  ?  $metadata->row()->alternativas  :  ''; 
			$data['txt_otro'] 		= ( $metadata->num_rows()==1 )  ?  $metadata->row()->otro  :  ''; 
			$data['txt_faltantes'] 	= ( $metadata->num_rows()==1 )  ?  $metadata->row()->faltantes  :  ''; 
			$data['txt_productor'] 	= ( $metadata->num_rows()==1 )  ?  $metadata->row()->productor :  ''; 
			$data['txt_definiciones'] = ( $metadata->num_rows()==1 )  ?  $metadata->row()->definiciones  :  '';	

			$data['main_content'] = 'tabulados/acuicultor/reporte_139_view';

			$this->load->view('backend/includes/template', $data);		
	}
	

	public function reporte_140()
	{
			$data['restriccion'] = $this->restriccion ;
			$data['nav'] = TRUE;
			$data['title'] = 'Tabulados Acuicultor';	
			$data['nom_tabulados'] = $this->tabulados_model->get_nombre_tabulados();	
			$data['opcion'] = 140;		
			$data['tables'] = $this->acuicultor_model->get_tabulado_140();

			$texto = ($this->tabulados_model->get_texto(2,$data['opcion'])->num_rows() > 0)  ?  $texto = $this->tabulados_model->get_texto(2,$data['opcion'])->row()->texto  :  '';
			$data['texto'] =  $texto; 
			$texto_2 = ($this->tabulados_model->get_texto(2,$data['opcion'])->num_rows() > 0)  ?  $texto_2 = $this->tabulados_model->get_texto(2,$data['opcion'])->row()->texto_2  :  '';
			$data['texto_2'] =  $texto_2; 

			$metadata = $this->tabulados_model->get_metadata(2,$data['opcion']); 
			$data['txt_tabulado'] 	= ( $metadata->num_rows()==1 )  ?  $metadata->row()->tabulado  :  ''; 
			$data['txt_contenido'] 	= ( $metadata->num_rows()==1 )  ?  $metadata->row()->contenido  :  ''; 
			$data['txt_casos'] 		= ( $metadata->num_rows()==1 )  ?  $metadata->row()->casos  :  ''; 
			$data['txt_variables'] 	= ( $metadata->num_rows()==1 )  ?  $metadata->row()->variable  :  ''; 
			$data['txt_alternativas'] = ( $metadata->num_rows()==1 )  ?  $metadata->row()->alternativas  :  ''; 
			$data['txt_otro'] 		= ( $metadata->num_rows()==1 )  ?  $metadata->row()->otro  :  ''; 
			$data['txt_faltantes'] 	= ( $metadata->num_rows()==1 )  ?  $metadata->row()->faltantes  :  ''; 
			$data['txt_productor'] 	= ( $metadata->num_rows()==1 )  ?  $metadata->row()->productor :  ''; 
			$data['txt_definiciones'] = ( $metadata->num_rows()==1 )  ?  $metadata->row()->definiciones  :  '';	

			$data['main_content'] = 'tabulados/acuicultor/reporte_140_view';

			$this->load->view('backend/includes/template', $data);		
	}


	public function reporte_141()
	{
			$data['restriccion'] = $this->restriccion ;
			$data['nav'] = TRUE;
			$data['title'] = 'Tabulados Acuicultor';	
			$data['nom_tabulados'] = $this->tabulados_model->get_nombre_tabulados();	
			$data['opcion'] = 141;		
			$data['tables'] = $this->acuicultor_model->get_tabulado_141();

			$texto = ($this->tabulados_model->get_texto(2,$data['opcion'])->num_rows() > 0)  ?  $texto = $this->tabulados_model->get_texto(2,$data['opcion'])->row()->texto  :  '';
			$data['texto'] =  $texto; 
			$texto_2 = ($this->tabulados_model->get_texto(2,$data['opcion'])->num_rows() > 0)  ?  $texto_2 = $this->tabulados_model->get_texto(2,$data['opcion'])->row()->texto_2  :  '';
			$data['texto_2'] =  $texto_2; 

			$metadata = $this->tabulados_model->get_metadata(2,$data['opcion']); 
			$data['txt_tabulado'] 	= ( $metadata->num_rows()==1 )  ?  $metadata->row()->tabulado  :  ''; 
			$data['txt_contenido'] 	= ( $metadata->num_rows()==1 )  ?  $metadata->row()->contenido  :  ''; 
			$data['txt_casos'] 		= ( $metadata->num_rows()==1 )  ?  $metadata->row()->casos  :  ''; 
			$data['txt_variables'] 	= ( $metadata->num_rows()==1 )  ?  $metadata->row()->variable  :  ''; 
			$data['txt_alternativas'] = ( $metadata->num_rows()==1 )  ?  $metadata->row()->alternativas  :  ''; 
			$data['txt_otro'] 		= ( $metadata->num_rows()==1 )  ?  $metadata->row()->otro  :  ''; 
			$data['txt_faltantes'] 	= ( $metadata->num_rows()==1 )  ?  $metadata->row()->faltantes  :  ''; 
			$data['txt_productor'] 	= ( $metadata->num_rows()==1 )  ?  $metadata->row()->productor :  ''; 
			$data['txt_definiciones'] = ( $metadata->num_rows()==1 )  ?  $metadata->row()->definiciones  :  '';	

			$data['main_content'] = 'tabulados/acuicultor/reporte_141_view';

			$this->load->view('backend/includes/template', $data);		
	}


	public function reporte_142()
	{
			$data['restriccion'] = $this->restriccion ;
			$data['nav'] = TRUE;
			$data['title'] = 'Tabulados Acuicultor';	
			$data['nom_tabulados'] = $this->tabulados_model->get_nombre_tabulados();	
			$data['opcion'] = 142;		
			$data['tables'] = $this->acuicultor_model->get_tabulado_142();

			$texto = ($this->tabulados_model->get_texto(2,$data['opcion'])->num_rows() > 0)  ?  $texto = $this->tabulados_model->get_texto(2,$data['opcion'])->row()->texto  :  '';
			$data['texto'] =  $texto; 
			$texto_2 = ($this->tabulados_model->get_texto(2,$data['opcion'])->num_rows() > 0)  ?  $texto_2 = $this->tabulados_model->get_texto(2,$data['opcion'])->row()->texto_2  :  '';
			$data['texto_2'] =  $texto_2; 

			$metadata = $this->tabulados_model->get_metadata(2,$data['opcion']); 
			$data['txt_tabulado'] 	= ( $metadata->num_rows()==1 )  ?  $metadata->row()->tabulado  :  ''; 
			$data['txt_contenido'] 	= ( $metadata->num_rows()==1 )  ?  $metadata->row()->contenido  :  ''; 
			$data['txt_casos'] 		= ( $metadata->num_rows()==1 )  ?  $metadata->row()->casos  :  ''; 
			$data['txt_variables'] 	= ( $metadata->num_rows()==1 )  ?  $metadata->row()->variable  :  ''; 
			$data['txt_alternativas'] = ( $metadata->num_rows()==1 )  ?  $metadata->row()->alternativas  :  ''; 
			$data['txt_otro'] 		= ( $metadata->num_rows()==1 )  ?  $metadata->row()->otro  :  ''; 
			$data['txt_faltantes'] 	= ( $metadata->num_rows()==1 )  ?  $metadata->row()->faltantes  :  ''; 
			$data['txt_productor'] 	= ( $metadata->num_rows()==1 )  ?  $metadata->row()->productor :  ''; 
			$data['txt_definiciones'] = ( $metadata->num_rows()==1 )  ?  $metadata->row()->definiciones  :  '';	

			$data['main_content'] = 'tabulados/acuicultor/reporte_142_view';

			$this->load->view('backend/includes/template', $data);		
	}


	public function reporte_143()
	{
			$data['restriccion'] = $this->restriccion ;
			$data['nav'] = TRUE;
			$data['title'] = 'Tabulados Acuicultor';	
			$data['nom_tabulados'] = $this->tabulados_model->get_nombre_tabulados();	
			$data['opcion'] = 143;		
			$data['tables'] = $this->acuicultor_model->get_tabulado_143();

			$texto = ($this->tabulados_model->get_texto(2,$data['opcion'])->num_rows() > 0)  ?  $texto = $this->tabulados_model->get_texto(2,$data['opcion'])->row()->texto  :  '';
			$data['texto'] =  $texto; 
			$texto_2 = ($this->tabulados_model->get_texto(2,$data['opcion'])->num_rows() > 0)  ?  $texto_2 = $this->tabulados_model->get_texto(2,$data['opcion'])->row()->texto_2  :  '';
			$data['texto_2'] =  $texto_2; 

			$metadata = $this->tabulados_model->get_metadata(2,$data['opcion']); 
			$data['txt_tabulado'] 	= ( $metadata->num_rows()==1 )  ?  $metadata->row()->tabulado  :  ''; 
			$data['txt_contenido'] 	= ( $metadata->num_rows()==1 )  ?  $metadata->row()->contenido  :  ''; 
			$data['txt_casos'] 		= ( $metadata->num_rows()==1 )  ?  $metadata->row()->casos  :  ''; 
			$data['txt_variables'] 	= ( $metadata->num_rows()==1 )  ?  $metadata->row()->variable  :  ''; 
			$data['txt_alternativas'] = ( $metadata->num_rows()==1 )  ?  $metadata->row()->alternativas  :  ''; 
			$data['txt_otro'] 		= ( $metadata->num_rows()==1 )  ?  $metadata->row()->otro  :  ''; 
			$data['txt_faltantes'] 	= ( $metadata->num_rows()==1 )  ?  $metadata->row()->faltantes  :  ''; 
			$data['txt_productor'] 	= ( $metadata->num_rows()==1 )  ?  $metadata->row()->productor :  ''; 
			$data['txt_definiciones'] = ( $metadata->num_rows()==1 )  ?  $metadata->row()->definiciones  :  '';	

			$data['main_content'] = 'tabulados/acuicultor/reporte_143_view';

			$this->load->view('backend/includes/template', $data);		
	}

	public function reporte_144()
	{
			$data['restriccion'] = $this->restriccion ;
			$data['nav'] = TRUE;
			$data['title'] = 'Tabulados Acuicultor';	
			$data['nom_tabulados'] = $this->tabulados_model->get_nombre_tabulados();	
			$data['opcion'] = 144;		
			$data['tables'] = $this->acuicultor_model->get_tabulado_144();

			$texto = ($this->tabulados_model->get_texto(2,$data['opcion'])->num_rows() > 0)  ?  $texto = $this->tabulados_model->get_texto(2,$data['opcion'])->row()->texto  :  '';
			$data['texto'] =  $texto; 
			$texto_2 = ($this->tabulados_model->get_texto(2,$data['opcion'])->num_rows() > 0)  ?  $texto_2 = $this->tabulados_model->get_texto(2,$data['opcion'])->row()->texto_2  :  '';
			$data['texto_2'] =  $texto_2; 

			$metadata = $this->tabulados_model->get_metadata(2,$data['opcion']); 
			$data['txt_tabulado'] 	= ( $metadata->num_rows()==1 )  ?  $metadata->row()->tabulado  :  ''; 
			$data['txt_contenido'] 	= ( $metadata->num_rows()==1 )  ?  $metadata->row()->contenido  :  ''; 
			$data['txt_casos'] 		= ( $metadata->num_rows()==1 )  ?  $metadata->row()->casos  :  ''; 
			$data['txt_variables'] 	= ( $metadata->num_rows()==1 )  ?  $metadata->row()->variable  :  ''; 
			$data['txt_alternativas'] = ( $metadata->num_rows()==1 )  ?  $metadata->row()->alternativas  :  ''; 
			$data['txt_otro'] 		= ( $metadata->num_rows()==1 )  ?  $metadata->row()->otro  :  ''; 
			$data['txt_faltantes'] 	= ( $metadata->num_rows()==1 )  ?  $metadata->row()->faltantes  :  ''; 
			$data['txt_productor'] 	= ( $metadata->num_rows()==1 )  ?  $metadata->row()->productor :  ''; 
			$data['txt_definiciones'] = ( $metadata->num_rows()==1 )  ?  $metadata->row()->definiciones  :  '';	

			$data['main_content'] = 'tabulados/acuicultor/reporte_144_view';

			$this->load->view('backend/includes/template', $data);		
	}

	public function reporte_145()
	{
			$data['restriccion'] = $this->restriccion ;
			$data['nav'] = TRUE;
			$data['title'] = 'Tabulados Acuicultor';	
			$data['nom_tabulados'] = $this->tabulados_model->get_nombre_tabulados();	
			$data['opcion'] = 145;		
			$data['tables'] = $this->acuicultor_model->get_tabulado_145();

			$texto = ($this->tabulados_model->get_texto(2,$data['opcion'])->num_rows() > 0)  ?  $texto = $this->tabulados_model->get_texto(2,$data['opcion'])->row()->texto  :  '';
			$data['texto'] =  $texto; 
			$texto_2 = ($this->tabulados_model->get_texto(2,$data['opcion'])->num_rows() > 0)  ?  $texto_2 = $this->tabulados_model->get_texto(2,$data['opcion'])->row()->texto_2  :  '';
			$data['texto_2'] =  $texto_2; 

			$metadata = $this->tabulados_model->get_metadata(2,$data['opcion']); 
			$data['txt_tabulado'] 	= ( $metadata->num_rows()==1 )  ?  $metadata->row()->tabulado  :  ''; 
			$data['txt_contenido'] 	= ( $metadata->num_rows()==1 )  ?  $metadata->row()->contenido  :  ''; 
			$data['txt_casos'] 		= ( $metadata->num_rows()==1 )  ?  $metadata->row()->casos  :  ''; 
			$data['txt_variables'] 	= ( $metadata->num_rows()==1 )  ?  $metadata->row()->variable  :  ''; 
			$data['txt_alternativas'] = ( $metadata->num_rows()==1 )  ?  $metadata->row()->alternativas  :  ''; 
			$data['txt_otro'] 		= ( $metadata->num_rows()==1 )  ?  $metadata->row()->otro  :  ''; 
			$data['txt_faltantes'] 	= ( $metadata->num_rows()==1 )  ?  $metadata->row()->faltantes  :  ''; 
			$data['txt_productor'] 	= ( $metadata->num_rows()==1 )  ?  $metadata->row()->productor :  ''; 
			$data['txt_definiciones'] = ( $metadata->num_rows()==1 )  ?  $metadata->row()->definiciones  :  '';	

			$data['main_content'] = 'tabulados/acuicultor/reporte_145_view';

			$this->load->view('backend/includes/template', $data);		
	}

	public function reporte_146()
	{
			$data['restriccion'] = $this->restriccion ;
			$data['nav'] = TRUE;
			$data['title'] = 'Tabulados Acuicultor';	
			$data['nom_tabulados'] = $this->tabulados_model->get_nombre_tabulados();	
			$data['opcion'] = 146;		
			$data['tables'] = $this->acuicultor_model->get_tabulado_146();

			$texto = ($this->tabulados_model->get_texto(2,$data['opcion'])->num_rows() > 0)  ?  $texto = $this->tabulados_model->get_texto(2,$data['opcion'])->row()->texto  :  '';
			$data['texto'] =  $texto; 
			$texto_2 = ($this->tabulados_model->get_texto(2,$data['opcion'])->num_rows() > 0)  ?  $texto_2 = $this->tabulados_model->get_texto(2,$data['opcion'])->row()->texto_2  :  '';
			$data['texto_2'] =  $texto_2; 

			$metadata = $this->tabulados_model->get_metadata(2,$data['opcion']); 
			$data['txt_tabulado'] 	= ( $metadata->num_rows()==1 )  ?  $metadata->row()->tabulado  :  ''; 
			$data['txt_contenido'] 	= ( $metadata->num_rows()==1 )  ?  $metadata->row()->contenido  :  ''; 
			$data['txt_casos'] 		= ( $metadata->num_rows()==1 )  ?  $metadata->row()->casos  :  ''; 
			$data['txt_variables'] 	= ( $metadata->num_rows()==1 )  ?  $metadata->row()->variable  :  ''; 
			$data['txt_alternativas'] = ( $metadata->num_rows()==1 )  ?  $metadata->row()->alternativas  :  ''; 
			$data['txt_otro'] 		= ( $metadata->num_rows()==1 )  ?  $metadata->row()->otro  :  ''; 
			$data['txt_faltantes'] 	= ( $metadata->num_rows()==1 )  ?  $metadata->row()->faltantes  :  ''; 
			$data['txt_productor'] 	= ( $metadata->num_rows()==1 )  ?  $metadata->row()->productor :  ''; 
			$data['txt_definiciones'] = ( $metadata->num_rows()==1 )  ?  $metadata->row()->definiciones  :  '';	

			$data['main_content'] = 'tabulados/acuicultor/reporte_146_view';

			$this->load->view('backend/includes/template', $data);		
	}

	public function reporte_147()
	{
			$data['restriccion'] = $this->restriccion ;
			$data['nav'] = TRUE;
			$data['title'] = 'Tabulados Acuicultor';	
			$data['nom_tabulados'] = $this->tabulados_model->get_nombre_tabulados();	
			$data['opcion'] = 147;		
			$data['tables'] = $this->acuicultor_model->get_tabulado_147();

			$texto = ($this->tabulados_model->get_texto(2,$data['opcion'])->num_rows() > 0)  ?  $texto = $this->tabulados_model->get_texto(2,$data['opcion'])->row()->texto  :  '';
			$data['texto'] =  $texto; 
			$texto_2 = ($this->tabulados_model->get_texto(2,$data['opcion'])->num_rows() > 0)  ?  $texto_2 = $this->tabulados_model->get_texto(2,$data['opcion'])->row()->texto_2  :  '';
			$data['texto_2'] =  $texto_2; 

			$metadata = $this->tabulados_model->get_metadata(2,$data['opcion']); 
			$data['txt_tabulado'] 	= ( $metadata->num_rows()==1 )  ?  $metadata->row()->tabulado  :  ''; 
			$data['txt_contenido'] 	= ( $metadata->num_rows()==1 )  ?  $metadata->row()->contenido  :  ''; 
			$data['txt_casos'] 		= ( $metadata->num_rows()==1 )  ?  $metadata->row()->casos  :  ''; 
			$data['txt_variables'] 	= ( $metadata->num_rows()==1 )  ?  $metadata->row()->variable  :  ''; 
			$data['txt_alternativas'] = ( $metadata->num_rows()==1 )  ?  $metadata->row()->alternativas  :  ''; 
			$data['txt_otro'] 		= ( $metadata->num_rows()==1 )  ?  $metadata->row()->otro  :  ''; 
			$data['txt_faltantes'] 	= ( $metadata->num_rows()==1 )  ?  $metadata->row()->faltantes  :  ''; 
			$data['txt_productor'] 	= ( $metadata->num_rows()==1 )  ?  $metadata->row()->productor :  ''; 
			$data['txt_definiciones'] = ( $metadata->num_rows()==1 )  ?  $metadata->row()->definiciones  :  '';	

			$data['main_content'] = 'tabulados/acuicultor/reporte_147_view';

			$this->load->view('backend/includes/template', $data);		
	}
		// se corrio un tabulado
	public function reporte_148()
	{

			$data['restriccion'] = $this->restriccion ;
			$data['nav'] = TRUE;
			$data['title'] = 'Tabulados Acuicultor';	
			$data['nom_tabulados'] = $this->tabulados_model->get_nombre_tabulados();	
			$data['opcion'] = 148;		
			$data['tables'] = $this->acuicultor_model->get_tabulado_149();

			$texto = ($this->tabulados_model->get_texto(2,$data['opcion'])->num_rows() > 0)  ?  $texto = $this->tabulados_model->get_texto(2,$data['opcion'])->row()->texto  :  '';
			$data['texto'] =  $texto; 
			$texto_2 = ($this->tabulados_model->get_texto(2,$data['opcion'])->num_rows() > 0)  ?  $texto_2 = $this->tabulados_model->get_texto(2,$data['opcion'])->row()->texto_2  :  '';
			$data['texto_2'] =  $texto_2; 

			$metadata = $this->tabulados_model->get_metadata(2,$data['opcion']); 
			$data['txt_tabulado'] 	= ( $metadata->num_rows()==1 )  ?  $metadata->row()->tabulado  :  ''; 
			$data['txt_contenido'] 	= ( $metadata->num_rows()==1 )  ?  $metadata->row()->contenido  :  ''; 
			$data['txt_casos'] 		= ( $metadata->num_rows()==1 )  ?  $metadata->row()->casos  :  ''; 
			$data['txt_variables'] 	= ( $metadata->num_rows()==1 )  ?  $metadata->row()->variable  :  ''; 
			$data['txt_alternativas'] = ( $metadata->num_rows()==1 )  ?  $metadata->row()->alternativas  :  ''; 
			$data['txt_otro'] 		= ( $metadata->num_rows()==1 )  ?  $metadata->row()->otro  :  ''; 
			$data['txt_faltantes'] 	= ( $metadata->num_rows()==1 )  ?  $metadata->row()->faltantes  :  ''; 
			$data['txt_productor'] 	= ( $metadata->num_rows()==1 )  ?  $metadata->row()->productor :  ''; 
			$data['txt_definiciones'] = ( $metadata->num_rows()==1 )  ?  $metadata->row()->definiciones  :  '';	

			$data['main_content'] = 'tabulados/acuicultor/reporte_149_view';

			$this->load->view('backend/includes/template', $data);		
	}

	public function reporte_149()
	{
			$data['restriccion'] = $this->restriccion ;
			$data['nav'] = TRUE;
			$data['title'] = 'Tabulados Acuicultor';	
			$data['nom_tabulados'] = $this->tabulados_model->get_nombre_tabulados();	
			$data['opcion'] = 149;		
			$data['tables'] = $this->acuicultor_model->get_tabulado_150();

			$texto = ($this->tabulados_model->get_texto(2,$data['opcion'])->num_rows() > 0)  ?  $texto = $this->tabulados_model->get_texto(2,$data['opcion'])->row()->texto  :  '';
			$data['texto'] =  $texto; 
			$texto_2 = ($this->tabulados_model->get_texto(2,$data['opcion'])->num_rows() > 0)  ?  $texto_2 = $this->tabulados_model->get_texto(2,$data['opcion'])->row()->texto_2  :  '';
			$data['texto_2'] =  $texto_2; 

			$metadata = $this->tabulados_model->get_metadata(2,$data['opcion']); 
			$data['txt_tabulado'] 	= ( $metadata->num_rows()==1 )  ?  $metadata->row()->tabulado  :  ''; 
			$data['txt_contenido'] 	= ( $metadata->num_rows()==1 )  ?  $metadata->row()->contenido  :  ''; 
			$data['txt_casos'] 		= ( $metadata->num_rows()==1 )  ?  $metadata->row()->casos  :  ''; 
			$data['txt_variables'] 	= ( $metadata->num_rows()==1 )  ?  $metadata->row()->variable  :  ''; 
			$data['txt_alternativas'] = ( $metadata->num_rows()==1 )  ?  $metadata->row()->alternativas  :  ''; 
			$data['txt_otro'] 		= ( $metadata->num_rows()==1 )  ?  $metadata->row()->otro  :  ''; 
			$data['txt_faltantes'] 	= ( $metadata->num_rows()==1 )  ?  $metadata->row()->faltantes  :  ''; 
			$data['txt_productor'] 	= ( $metadata->num_rows()==1 )  ?  $metadata->row()->productor :  ''; 
			$data['txt_definiciones'] = ( $metadata->num_rows()==1 )  ?  $metadata->row()->definiciones  :  '';	

			$data['main_content'] = 'tabulados/acuicultor/reporte_150_view';

			$this->load->view('backend/includes/template', $data);		
	}

	public function reporte_150()
	{
			$data['restriccion'] = $this->restriccion ;
			$data['nav'] = TRUE;
			$data['title'] = 'Tabulados Acuicultor';	
			$data['nom_tabulados'] = $this->tabulados_model->get_nombre_tabulados();	
			$data['opcion'] = 150;		
			$data['tables'] = $this->acuicultor_model->get_tabulado_151();

			$texto = ($this->tabulados_model->get_texto(2,$data['opcion'])->num_rows() > 0)  ?  $texto = $this->tabulados_model->get_texto(2,$data['opcion'])->row()->texto  :  '';
			$data['texto'] =  $texto; 
			$texto_2 = ($this->tabulados_model->get_texto(2,$data['opcion'])->num_rows() > 0)  ?  $texto_2 = $this->tabulados_model->get_texto(2,$data['opcion'])->row()->texto_2  :  '';
			$data['texto_2'] =  $texto_2; 

			$metadata = $this->tabulados_model->get_metadata(2,$data['opcion']); 
			$data['txt_tabulado'] 	= ( $metadata->num_rows()==1 )  ?  $metadata->row()->tabulado  :  ''; 
			$data['txt_contenido'] 	= ( $metadata->num_rows()==1 )  ?  $metadata->row()->contenido  :  ''; 
			$data['txt_casos'] 		= ( $metadata->num_rows()==1 )  ?  $metadata->row()->casos  :  ''; 
			$data['txt_variables'] 	= ( $metadata->num_rows()==1 )  ?  $metadata->row()->variable  :  ''; 
			$data['txt_alternativas'] = ( $metadata->num_rows()==1 )  ?  $metadata->row()->alternativas  :  ''; 
			$data['txt_otro'] 		= ( $metadata->num_rows()==1 )  ?  $metadata->row()->otro  :  ''; 
			$data['txt_faltantes'] 	= ( $metadata->num_rows()==1 )  ?  $metadata->row()->faltantes  :  ''; 
			$data['txt_productor'] 	= ( $metadata->num_rows()==1 )  ?  $metadata->row()->productor :  ''; 
			$data['txt_definiciones'] = ( $metadata->num_rows()==1 )  ?  $metadata->row()->definiciones  :  '';	

			$data['main_content'] = 'tabulados/acuicultor/reporte_151_view';

			$this->load->view('backend/includes/template', $data);		
	}

	public function reporte_151()
	{
			$data['restriccion'] = $this->restriccion ;
			$data['nav'] = TRUE;
			$data['title'] = 'Tabulados Acuicultor';	
			$data['nom_tabulados'] = $this->tabulados_model->get_nombre_tabulados();	
			$data['opcion'] = 151;		
			$data['tables'] = $this->acuicultor_model->get_tabulado_152();

			$texto = ($this->tabulados_model->get_texto(2,$data['opcion'])->num_rows() > 0)  ?  $texto = $this->tabulados_model->get_texto(2,$data['opcion'])->row()->texto  :  '';
			$data['texto'] =  $texto; 
			$texto_2 = ($this->tabulados_model->get_texto(2,$data['opcion'])->num_rows() > 0)  ?  $texto_2 = $this->tabulados_model->get_texto(2,$data['opcion'])->row()->texto_2  :  '';
			$data['texto_2'] =  $texto_2; 

			$metadata = $this->tabulados_model->get_metadata(2,$data['opcion']); 
			$data['txt_tabulado'] 	= ( $metadata->num_rows()==1 )  ?  $metadata->row()->tabulado  :  ''; 
			$data['txt_contenido'] 	= ( $metadata->num_rows()==1 )  ?  $metadata->row()->contenido  :  ''; 
			$data['txt_casos'] 		= ( $metadata->num_rows()==1 )  ?  $metadata->row()->casos  :  ''; 
			$data['txt_variables'] 	= ( $metadata->num_rows()==1 )  ?  $metadata->row()->variable  :  ''; 
			$data['txt_alternativas'] = ( $metadata->num_rows()==1 )  ?  $metadata->row()->alternativas  :  ''; 
			$data['txt_otro'] 		= ( $metadata->num_rows()==1 )  ?  $metadata->row()->otro  :  ''; 
			$data['txt_faltantes'] 	= ( $metadata->num_rows()==1 )  ?  $metadata->row()->faltantes  :  ''; 
			$data['txt_productor'] 	= ( $metadata->num_rows()==1 )  ?  $metadata->row()->productor :  ''; 
			$data['txt_definiciones'] = ( $metadata->num_rows()==1 )  ?  $metadata->row()->definiciones  :  '';	

			$data['main_content'] = 'tabulados/acuicultor/reporte_152_view';

			$this->load->view('backend/includes/template', $data);		
	}

	public function reporte_152()
	{
			$data['restriccion'] = $this->restriccion ;
			$data['nav'] = TRUE;
			$data['title'] = 'Tabulados Acuicultor';	
			$data['nom_tabulados'] = $this->tabulados_model->get_nombre_tabulados();	
			$data['opcion'] = 152;		
			$data['tables'] = $this->acuicultor_model->get_tabulado_153();

			$texto = ($this->tabulados_model->get_texto(2,$data['opcion'])->num_rows() > 0)  ?  $texto = $this->tabulados_model->get_texto(2,$data['opcion'])->row()->texto  :  '';
			$data['texto'] =  $texto; 
			$texto_2 = ($this->tabulados_model->get_texto(2,$data['opcion'])->num_rows() > 0)  ?  $texto_2 = $this->tabulados_model->get_texto(2,$data['opcion'])->row()->texto_2  :  '';
			$data['texto_2'] =  $texto_2; 

			$metadata = $this->tabulados_model->get_metadata(2,$data['opcion']); 
			$data['txt_tabulado'] 	= ( $metadata->num_rows()==1 )  ?  $metadata->row()->tabulado  :  ''; 
			$data['txt_contenido'] 	= ( $metadata->num_rows()==1 )  ?  $metadata->row()->contenido  :  ''; 
			$data['txt_casos'] 		= ( $metadata->num_rows()==1 )  ?  $metadata->row()->casos  :  ''; 
			$data['txt_variables'] 	= ( $metadata->num_rows()==1 )  ?  $metadata->row()->variable  :  ''; 
			$data['txt_alternativas'] = ( $metadata->num_rows()==1 )  ?  $metadata->row()->alternativas  :  ''; 
			$data['txt_otro'] 		= ( $metadata->num_rows()==1 )  ?  $metadata->row()->otro  :  ''; 
			$data['txt_faltantes'] 	= ( $metadata->num_rows()==1 )  ?  $metadata->row()->faltantes  :  ''; 
			$data['txt_productor'] 	= ( $metadata->num_rows()==1 )  ?  $metadata->row()->productor :  ''; 
			$data['txt_definiciones'] = ( $metadata->num_rows()==1 )  ?  $metadata->row()->definiciones  :  '';	

			$data['main_content'] = 'tabulados/acuicultor/reporte_153_view';

			$this->load->view('backend/includes/template', $data);		
	}

	public function reporte_153()
	{
			$data['restriccion'] = $this->restriccion ;
			$data['nav'] = TRUE;
			$data['title'] = 'Tabulados Acuicultor';	
			$data['nom_tabulados'] = $this->tabulados_model->get_nombre_tabulados();	
			$data['opcion'] = 153;		
			$data['tables'] = $this->acuicultor_model->get_tabulado_154();

			$texto = ($this->tabulados_model->get_texto(2,$data['opcion'])->num_rows() > 0)  ?  $texto = $this->tabulados_model->get_texto(2,$data['opcion'])->row()->texto  :  '';
			$data['texto'] =  $texto; 
			$texto_2 = ($this->tabulados_model->get_texto(2,$data['opcion'])->num_rows() > 0)  ?  $texto_2 = $this->tabulados_model->get_texto(2,$data['opcion'])->row()->texto_2  :  '';
			$data['texto_2'] =  $texto_2; 

			$metadata = $this->tabulados_model->get_metadata(2,$data['opcion']); 
			$data['txt_tabulado'] 	= ( $metadata->num_rows()==1 )  ?  $metadata->row()->tabulado  :  ''; 
			$data['txt_contenido'] 	= ( $metadata->num_rows()==1 )  ?  $metadata->row()->contenido  :  ''; 
			$data['txt_casos'] 		= ( $metadata->num_rows()==1 )  ?  $metadata->row()->casos  :  ''; 
			$data['txt_variables'] 	= ( $metadata->num_rows()==1 )  ?  $metadata->row()->variable  :  ''; 
			$data['txt_alternativas'] = ( $metadata->num_rows()==1 )  ?  $metadata->row()->alternativas  :  ''; 
			$data['txt_otro'] 		= ( $metadata->num_rows()==1 )  ?  $metadata->row()->otro  :  ''; 
			$data['txt_faltantes'] 	= ( $metadata->num_rows()==1 )  ?  $metadata->row()->faltantes  :  ''; 
			$data['txt_productor'] 	= ( $metadata->num_rows()==1 )  ?  $metadata->row()->productor :  ''; 
			$data['txt_definiciones'] = ( $metadata->num_rows()==1 )  ?  $metadata->row()->definiciones  :  '';	

			$data['main_content'] = 'tabulados/acuicultor/reporte_154_view';

			$this->load->view('backend/includes/template', $data);		
	}

	public function reporte_154()
	{
			$data['restriccion'] = $this->restriccion ;
			$data['nav'] = TRUE;
			$data['title'] = 'Tabulados Acuicultor';	
			$data['nom_tabulados'] = $this->tabulados_model->get_nombre_tabulados();	
			$data['opcion'] = 154;		
			$data['tables'] = $this->acuicultor_model->get_tabulado_155();

			$texto = ($this->tabulados_model->get_texto(2,$data['opcion'])->num_rows() > 0)  ?  $texto = $this->tabulados_model->get_texto(2,$data['opcion'])->row()->texto  :  '';
			$data['texto'] =  $texto; 
			$texto_2 = ($this->tabulados_model->get_texto(2,$data['opcion'])->num_rows() > 0)  ?  $texto_2 = $this->tabulados_model->get_texto(2,$data['opcion'])->row()->texto_2  :  '';
			$data['texto_2'] =  $texto_2; 

			$metadata = $this->tabulados_model->get_metadata(2,$data['opcion']); 
			$data['txt_tabulado'] 	= ( $metadata->num_rows()==1 )  ?  $metadata->row()->tabulado  :  ''; 
			$data['txt_contenido'] 	= ( $metadata->num_rows()==1 )  ?  $metadata->row()->contenido  :  ''; 
			$data['txt_casos'] 		= ( $metadata->num_rows()==1 )  ?  $metadata->row()->casos  :  ''; 
			$data['txt_variables'] 	= ( $metadata->num_rows()==1 )  ?  $metadata->row()->variable  :  ''; 
			$data['txt_alternativas'] = ( $metadata->num_rows()==1 )  ?  $metadata->row()->alternativas  :  ''; 
			$data['txt_otro'] 		= ( $metadata->num_rows()==1 )  ?  $metadata->row()->otro  :  ''; 
			$data['txt_faltantes'] 	= ( $metadata->num_rows()==1 )  ?  $metadata->row()->faltantes  :  ''; 
			$data['txt_productor'] 	= ( $metadata->num_rows()==1 )  ?  $metadata->row()->productor :  ''; 
			$data['txt_definiciones'] = ( $metadata->num_rows()==1 )  ?  $metadata->row()->definiciones  :  '';	

			$data['main_content'] = 'tabulados/acuicultor/reporte_155_view';

			$this->load->view('backend/includes/template', $data);		
	}

	public function reporte_155()
	{
			$data['restriccion'] = $this->restriccion ;
			$data['nav'] = TRUE;
			$data['title'] = 'Tabulados Acuicultor';	
			$data['nom_tabulados'] = $this->tabulados_model->get_nombre_tabulados();	
			$data['opcion'] = 155;		
			$data['tables'] = $this->acuicultor_model->get_tabulado_156();

			$texto = ($this->tabulados_model->get_texto(2,$data['opcion'])->num_rows() > 0)  ?  $texto = $this->tabulados_model->get_texto(2,$data['opcion'])->row()->texto  :  '';
			$data['texto'] =  $texto; 
			$texto_2 = ($this->tabulados_model->get_texto(2,$data['opcion'])->num_rows() > 0)  ?  $texto_2 = $this->tabulados_model->get_texto(2,$data['opcion'])->row()->texto_2  :  '';
			$data['texto_2'] =  $texto_2; 

			$metadata = $this->tabulados_model->get_metadata(2,$data['opcion']); 
			$data['txt_tabulado'] 	= ( $metadata->num_rows()==1 )  ?  $metadata->row()->tabulado  :  ''; 
			$data['txt_contenido'] 	= ( $metadata->num_rows()==1 )  ?  $metadata->row()->contenido  :  ''; 
			$data['txt_casos'] 		= ( $metadata->num_rows()==1 )  ?  $metadata->row()->casos  :  ''; 
			$data['txt_variables'] 	= ( $metadata->num_rows()==1 )  ?  $metadata->row()->variable  :  ''; 
			$data['txt_alternativas'] = ( $metadata->num_rows()==1 )  ?  $metadata->row()->alternativas  :  ''; 
			$data['txt_otro'] 		= ( $metadata->num_rows()==1 )  ?  $metadata->row()->otro  :  ''; 
			$data['txt_faltantes'] 	= ( $metadata->num_rows()==1 )  ?  $metadata->row()->faltantes  :  ''; 
			$data['txt_productor'] 	= ( $metadata->num_rows()==1 )  ?  $metadata->row()->productor :  ''; 
			$data['txt_definiciones'] = ( $metadata->num_rows()==1 )  ?  $metadata->row()->definiciones  :  '';	

			$data['main_content'] = 'tabulados/acuicultor/reporte_156_view';

			$this->load->view('backend/includes/template', $data);		
	}
	

	public function reporte_156()
	{
			$data['restriccion'] = $this->restriccion ;
			$data['nav'] = TRUE;
			$data['title'] = 'Tabulados Acuicultor';	
			$data['nom_tabulados'] = $this->tabulados_model->get_nombre_tabulados();	
			$data['opcion'] = 156;		
			$data['tables'] = $this->acuicultor_model->get_tabulado_157();

			$texto = ($this->tabulados_model->get_texto(2,$data['opcion'])->num_rows() > 0)  ?  $texto = $this->tabulados_model->get_texto(2,$data['opcion'])->row()->texto  :  '';
			$data['texto'] =  $texto; 
			$texto_2 = ($this->tabulados_model->get_texto(2,$data['opcion'])->num_rows() > 0)  ?  $texto_2 = $this->tabulados_model->get_texto(2,$data['opcion'])->row()->texto_2  :  '';
			$data['texto_2'] =  $texto_2; 

			$metadata = $this->tabulados_model->get_metadata(2,$data['opcion']); 
			$data['txt_tabulado'] 	= ( $metadata->num_rows()==1 )  ?  $metadata->row()->tabulado  :  ''; 
			$data['txt_contenido'] 	= ( $metadata->num_rows()==1 )  ?  $metadata->row()->contenido  :  ''; 
			$data['txt_casos'] 		= ( $metadata->num_rows()==1 )  ?  $metadata->row()->casos  :  ''; 
			$data['txt_variables'] 	= ( $metadata->num_rows()==1 )  ?  $metadata->row()->variable  :  ''; 
			$data['txt_alternativas'] = ( $metadata->num_rows()==1 )  ?  $metadata->row()->alternativas  :  ''; 
			$data['txt_otro'] 		= ( $metadata->num_rows()==1 )  ?  $metadata->row()->otro  :  ''; 
			$data['txt_faltantes'] 	= ( $metadata->num_rows()==1 )  ?  $metadata->row()->faltantes  :  ''; 
			$data['txt_productor'] 	= ( $metadata->num_rows()==1 )  ?  $metadata->row()->productor :  ''; 
			$data['txt_definiciones'] = ( $metadata->num_rows()==1 )  ?  $metadata->row()->definiciones  :  '';	

			$data['main_content'] = 'tabulados/acuicultor/reporte_157_view';

			$this->load->view('backend/includes/template', $data);		
	}


	public function reporte_157()
	{
			$data['restriccion'] = $this->restriccion ;
			$data['nav'] = TRUE;
			$data['title'] = 'Tabulados Acuicultor';	
			$data['nom_tabulados'] = $this->tabulados_model->get_nombre_tabulados();	
			$data['opcion'] = 157;		
			$data['tables'] = $this->acuicultor_model->get_tabulado_158();

			$texto = ($this->tabulados_model->get_texto(2,$data['opcion'])->num_rows() > 0)  ?  $texto = $this->tabulados_model->get_texto(2,$data['opcion'])->row()->texto  :  '';
			$data['texto'] =  $texto; 
			$texto_2 = ($this->tabulados_model->get_texto(2,$data['opcion'])->num_rows() > 0)  ?  $texto_2 = $this->tabulados_model->get_texto(2,$data['opcion'])->row()->texto_2  :  '';
			$data['texto_2'] =  $texto_2; 

			$metadata = $this->tabulados_model->get_metadata(2,$data['opcion']); 
			$data['txt_tabulado'] 	= ( $metadata->num_rows()==1 )  ?  $metadata->row()->tabulado  :  ''; 
			$data['txt_contenido'] 	= ( $metadata->num_rows()==1 )  ?  $metadata->row()->contenido  :  ''; 
			$data['txt_casos'] 		= ( $metadata->num_rows()==1 )  ?  $metadata->row()->casos  :  ''; 
			$data['txt_variables'] 	= ( $metadata->num_rows()==1 )  ?  $metadata->row()->variable  :  ''; 
			$data['txt_alternativas'] = ( $metadata->num_rows()==1 )  ?  $metadata->row()->alternativas  :  ''; 
			$data['txt_otro'] 		= ( $metadata->num_rows()==1 )  ?  $metadata->row()->otro  :  ''; 
			$data['txt_faltantes'] 	= ( $metadata->num_rows()==1 )  ?  $metadata->row()->faltantes  :  ''; 
			$data['txt_productor'] 	= ( $metadata->num_rows()==1 )  ?  $metadata->row()->productor :  ''; 
			$data['txt_definiciones'] = ( $metadata->num_rows()==1 )  ?  $metadata->row()->definiciones  :  '';	

			$data['main_content'] = 'tabulados/acuicultor/reporte_158_view';

			$this->load->view('backend/includes/template', $data);		
	}


	public function reporte_158()
	{
			$data['restriccion'] = $this->restriccion ;
			$data['nav'] = TRUE;
			$data['title'] = 'Tabulados Acuicultor';	
			$data['nom_tabulados'] = $this->tabulados_model->get_nombre_tabulados();	
			$data['opcion'] = 158;		
			$data['tables'] = $this->acuicultor_model->get_tabulado_159();

			$texto = ($this->tabulados_model->get_texto(2,$data['opcion'])->num_rows() > 0)  ?  $texto = $this->tabulados_model->get_texto(2,$data['opcion'])->row()->texto  :  '';
			$data['texto'] =  $texto; 
			$texto_2 = ($this->tabulados_model->get_texto(2,$data['opcion'])->num_rows() > 0)  ?  $texto_2 = $this->tabulados_model->get_texto(2,$data['opcion'])->row()->texto_2  :  '';
			$data['texto_2'] =  $texto_2; 

			$metadata = $this->tabulados_model->get_metadata(2,$data['opcion']); 
			$data['txt_tabulado'] 	= ( $metadata->num_rows()==1 )  ?  $metadata->row()->tabulado  :  ''; 
			$data['txt_contenido'] 	= ( $metadata->num_rows()==1 )  ?  $metadata->row()->contenido  :  ''; 
			$data['txt_casos'] 		= ( $metadata->num_rows()==1 )  ?  $metadata->row()->casos  :  ''; 
			$data['txt_variables'] 	= ( $metadata->num_rows()==1 )  ?  $metadata->row()->variable  :  ''; 
			$data['txt_alternativas'] = ( $metadata->num_rows()==1 )  ?  $metadata->row()->alternativas  :  ''; 
			$data['txt_otro'] 		= ( $metadata->num_rows()==1 )  ?  $metadata->row()->otro  :  ''; 
			$data['txt_faltantes'] 	= ( $metadata->num_rows()==1 )  ?  $metadata->row()->faltantes  :  ''; 
			$data['txt_productor'] 	= ( $metadata->num_rows()==1 )  ?  $metadata->row()->productor :  ''; 
			$data['txt_definiciones'] = ( $metadata->num_rows()==1 )  ?  $metadata->row()->definiciones  :  '';	

			$data['main_content'] = 'tabulados/acuicultor/reporte_159_view';

			$this->load->view('backend/includes/template', $data);		
	}


	public function reporte_159()
	{
			$data['restriccion'] = $this->restriccion ;
			$data['nav'] = TRUE;
			$data['title'] = 'Tabulados Acuicultor';	
			$data['nom_tabulados'] = $this->tabulados_model->get_nombre_tabulados();	
			$data['opcion'] = 159;		
			$data['tables'] = $this->acuicultor_model->get_tabulado_160();

			$texto = ($this->tabulados_model->get_texto(2,$data['opcion'])->num_rows() > 0)  ?  $texto = $this->tabulados_model->get_texto(2,$data['opcion'])->row()->texto  :  '';
			$data['texto'] =  $texto; 
			$texto_2 = ($this->tabulados_model->get_texto(2,$data['opcion'])->num_rows() > 0)  ?  $texto_2 = $this->tabulados_model->get_texto(2,$data['opcion'])->row()->texto_2  :  '';
			$data['texto_2'] =  $texto_2; 

			$metadata = $this->tabulados_model->get_metadata(2,$data['opcion']); 
			$data['txt_tabulado'] 	= ( $metadata->num_rows()==1 )  ?  $metadata->row()->tabulado  :  ''; 
			$data['txt_contenido'] 	= ( $metadata->num_rows()==1 )  ?  $metadata->row()->contenido  :  ''; 
			$data['txt_casos'] 		= ( $metadata->num_rows()==1 )  ?  $metadata->row()->casos  :  ''; 
			$data['txt_variables'] 	= ( $metadata->num_rows()==1 )  ?  $metadata->row()->variable  :  ''; 
			$data['txt_alternativas'] = ( $metadata->num_rows()==1 )  ?  $metadata->row()->alternativas  :  ''; 
			$data['txt_otro'] 		= ( $metadata->num_rows()==1 )  ?  $metadata->row()->otro  :  ''; 
			$data['txt_faltantes'] 	= ( $metadata->num_rows()==1 )  ?  $metadata->row()->faltantes  :  ''; 
			$data['txt_productor'] 	= ( $metadata->num_rows()==1 )  ?  $metadata->row()->productor :  ''; 
			$data['txt_definiciones'] = ( $metadata->num_rows()==1 )  ?  $metadata->row()->definiciones  :  '';	

			$data['main_content'] = 'tabulados/acuicultor/reporte_160_view';

			$this->load->view('backend/includes/template', $data);		
	}

	public function reporte_160()
	{
			$data['restriccion'] = $this->restriccion ;
			$data['nav'] = TRUE;
			$data['title'] = 'Tabulados Acuicultor';	
			$data['nom_tabulados'] = $this->tabulados_model->get_nombre_tabulados();	
			$data['opcion'] = 160;		
			$data['tables'] = $this->acuicultor_model->get_tabulado_161();

			$texto = ($this->tabulados_model->get_texto(2,$data['opcion'])->num_rows() > 0)  ?  $texto = $this->tabulados_model->get_texto(2,$data['opcion'])->row()->texto  :  '';
			$data['texto'] =  $texto; 
			$texto_2 = ($this->tabulados_model->get_texto(2,$data['opcion'])->num_rows() > 0)  ?  $texto_2 = $this->tabulados_model->get_texto(2,$data['opcion'])->row()->texto_2  :  '';
			$data['texto_2'] =  $texto_2; 

			$metadata = $this->tabulados_model->get_metadata(2,$data['opcion']); 
			$data['txt_tabulado'] 	= ( $metadata->num_rows()==1 )  ?  $metadata->row()->tabulado  :  ''; 
			$data['txt_contenido'] 	= ( $metadata->num_rows()==1 )  ?  $metadata->row()->contenido  :  ''; 
			$data['txt_casos'] 		= ( $metadata->num_rows()==1 )  ?  $metadata->row()->casos  :  ''; 
			$data['txt_variables'] 	= ( $metadata->num_rows()==1 )  ?  $metadata->row()->variable  :  ''; 
			$data['txt_alternativas'] = ( $metadata->num_rows()==1 )  ?  $metadata->row()->alternativas  :  ''; 
			$data['txt_otro'] 		= ( $metadata->num_rows()==1 )  ?  $metadata->row()->otro  :  ''; 
			$data['txt_faltantes'] 	= ( $metadata->num_rows()==1 )  ?  $metadata->row()->faltantes  :  ''; 
			$data['txt_productor'] 	= ( $metadata->num_rows()==1 )  ?  $metadata->row()->productor :  ''; 
			$data['txt_definiciones'] = ( $metadata->num_rows()==1 )  ?  $metadata->row()->definiciones  :  '';	

			$data['main_content'] = 'tabulados/acuicultor/reporte_161_view';

			$this->load->view('backend/includes/template', $data);		
	}

	public function reporte_161()
	{
			$data['restriccion'] = $this->restriccion ;
			$data['nav'] = TRUE;
			$data['title'] = 'Tabulados Acuicultor';	
			$data['nom_tabulados'] = $this->tabulados_model->get_nombre_tabulados();	
			$data['opcion'] = 161;		
			$data['tables'] = $this->acuicultor_model->get_tabulado_162();

			$texto = ($this->tabulados_model->get_texto(2,$data['opcion'])->num_rows() > 0)  ?  $texto = $this->tabulados_model->get_texto(2,$data['opcion'])->row()->texto  :  '';
			$data['texto'] =  $texto; 
			$texto_2 = ($this->tabulados_model->get_texto(2,$data['opcion'])->num_rows() > 0)  ?  $texto_2 = $this->tabulados_model->get_texto(2,$data['opcion'])->row()->texto_2  :  '';
			$data['texto_2'] =  $texto_2; 

			$metadata = $this->tabulados_model->get_metadata(2,$data['opcion']); 
			$data['txt_tabulado'] 	= ( $metadata->num_rows()==1 )  ?  $metadata->row()->tabulado  :  ''; 
			$data['txt_contenido'] 	= ( $metadata->num_rows()==1 )  ?  $metadata->row()->contenido  :  ''; 
			$data['txt_casos'] 		= ( $metadata->num_rows()==1 )  ?  $metadata->row()->casos  :  ''; 
			$data['txt_variables'] 	= ( $metadata->num_rows()==1 )  ?  $metadata->row()->variable  :  ''; 
			$data['txt_alternativas'] = ( $metadata->num_rows()==1 )  ?  $metadata->row()->alternativas  :  ''; 
			$data['txt_otro'] 		= ( $metadata->num_rows()==1 )  ?  $metadata->row()->otro  :  ''; 
			$data['txt_faltantes'] 	= ( $metadata->num_rows()==1 )  ?  $metadata->row()->faltantes  :  ''; 
			$data['txt_productor'] 	= ( $metadata->num_rows()==1 )  ?  $metadata->row()->productor :  ''; 
			$data['txt_definiciones'] = ( $metadata->num_rows()==1 )  ?  $metadata->row()->definiciones  :  '';	

			$data['main_content'] = 'tabulados/acuicultor/reporte_162_view';

			$this->load->view('backend/includes/template', $data);		
	}
	//se corrio otro tabulado
	public function reporte_162()
	{
			$data['restriccion'] = $this->restriccion ;
			$data['nav'] = TRUE;
			$data['title'] = 'Tabulados Acuicultor';	
			$data['nom_tabulados'] = $this->tabulados_model->get_nombre_tabulados();	
			$data['opcion'] = 162;		
			$data['tables'] = $this->acuicultor_model->get_tabulado_164();

			$texto = ($this->tabulados_model->get_texto(2,$data['opcion'])->num_rows() > 0)  ?  $texto = $this->tabulados_model->get_texto(2,$data['opcion'])->row()->texto  :  '';
			$data['texto'] =  $texto; 
			$texto_2 = ($this->tabulados_model->get_texto(2,$data['opcion'])->num_rows() > 0)  ?  $texto_2 = $this->tabulados_model->get_texto(2,$data['opcion'])->row()->texto_2  :  '';
			$data['texto_2'] =  $texto_2; 

			$metadata = $this->tabulados_model->get_metadata(2,$data['opcion']); 
			$data['txt_tabulado'] 	= ( $metadata->num_rows()==1 )  ?  $metadata->row()->tabulado  :  ''; 
			$data['txt_contenido'] 	= ( $metadata->num_rows()==1 )  ?  $metadata->row()->contenido  :  ''; 
			$data['txt_casos'] 		= ( $metadata->num_rows()==1 )  ?  $metadata->row()->casos  :  ''; 
			$data['txt_variables'] 	= ( $metadata->num_rows()==1 )  ?  $metadata->row()->variable  :  ''; 
			$data['txt_alternativas'] = ( $metadata->num_rows()==1 )  ?  $metadata->row()->alternativas  :  ''; 
			$data['txt_otro'] 		= ( $metadata->num_rows()==1 )  ?  $metadata->row()->otro  :  ''; 
			$data['txt_faltantes'] 	= ( $metadata->num_rows()==1 )  ?  $metadata->row()->faltantes  :  ''; 
			$data['txt_productor'] 	= ( $metadata->num_rows()==1 )  ?  $metadata->row()->productor :  ''; 
			$data['txt_definiciones'] = ( $metadata->num_rows()==1 )  ?  $metadata->row()->definiciones  :  '';	

			$data['main_content'] = 'tabulados/acuicultor/reporte_164_view';

			$this->load->view('backend/includes/template', $data);		
	}

	public function reporte_163()
	{
			$data['restriccion'] = $this->restriccion ;
			$data['nav'] = TRUE;
			$data['title'] = 'Tabulados Acuicultor';	
			$data['nom_tabulados'] = $this->tabulados_model->get_nombre_tabulados();	
			$data['opcion'] = 163;		
			$data['tables'] = $this->acuicultor_model->get_tabulado_165();

			$texto = ($this->tabulados_model->get_texto(2,$data['opcion'])->num_rows() > 0)  ?  $texto = $this->tabulados_model->get_texto(2,$data['opcion'])->row()->texto  :  '';
			$data['texto'] =  $texto; 
			$texto_2 = ($this->tabulados_model->get_texto(2,$data['opcion'])->num_rows() > 0)  ?  $texto_2 = $this->tabulados_model->get_texto(2,$data['opcion'])->row()->texto_2  :  '';
			$data['texto_2'] =  $texto_2; 

			$metadata = $this->tabulados_model->get_metadata(2,$data['opcion']); 
			$data['txt_tabulado'] 	= ( $metadata->num_rows()==1 )  ?  $metadata->row()->tabulado  :  ''; 
			$data['txt_contenido'] 	= ( $metadata->num_rows()==1 )  ?  $metadata->row()->contenido  :  ''; 
			$data['txt_casos'] 		= ( $metadata->num_rows()==1 )  ?  $metadata->row()->casos  :  ''; 
			$data['txt_variables'] 	= ( $metadata->num_rows()==1 )  ?  $metadata->row()->variable  :  ''; 
			$data['txt_alternativas'] = ( $metadata->num_rows()==1 )  ?  $metadata->row()->alternativas  :  ''; 
			$data['txt_otro'] 		= ( $metadata->num_rows()==1 )  ?  $metadata->row()->otro  :  ''; 
			$data['txt_faltantes'] 	= ( $metadata->num_rows()==1 )  ?  $metadata->row()->faltantes  :  ''; 
			$data['txt_productor'] 	= ( $metadata->num_rows()==1 )  ?  $metadata->row()->productor :  ''; 
			$data['txt_definiciones'] = ( $metadata->num_rows()==1 )  ?  $metadata->row()->definiciones  :  '';	

			$data['main_content'] = 'tabulados/acuicultor/reporte_165_view';

			$this->load->view('backend/includes/template', $data);		
	}

	public function reporte_164()
	{
			$data['restriccion'] = $this->restriccion ;
			$data['nav'] = TRUE;
			$data['title'] = 'Tabulados Acuicultor';	
			$data['nom_tabulados'] = $this->tabulados_model->get_nombre_tabulados();	
			$data['opcion'] = 164;		
			$data['tables'] = $this->acuicultor_model->get_tabulado_166();

			$texto = ($this->tabulados_model->get_texto(2,$data['opcion'])->num_rows() > 0)  ?  $texto = $this->tabulados_model->get_texto(2,$data['opcion'])->row()->texto  :  '';
			$data['texto'] =  $texto; 
			$texto_2 = ($this->tabulados_model->get_texto(2,$data['opcion'])->num_rows() > 0)  ?  $texto_2 = $this->tabulados_model->get_texto(2,$data['opcion'])->row()->texto_2  :  '';
			$data['texto_2'] =  $texto_2; 

			$metadata = $this->tabulados_model->get_metadata(2,$data['opcion']); 
			$data['txt_tabulado'] 	= ( $metadata->num_rows()==1 )  ?  $metadata->row()->tabulado  :  ''; 
			$data['txt_contenido'] 	= ( $metadata->num_rows()==1 )  ?  $metadata->row()->contenido  :  ''; 
			$data['txt_casos'] 		= ( $metadata->num_rows()==1 )  ?  $metadata->row()->casos  :  ''; 
			$data['txt_variables'] 	= ( $metadata->num_rows()==1 )  ?  $metadata->row()->variable  :  ''; 
			$data['txt_alternativas'] = ( $metadata->num_rows()==1 )  ?  $metadata->row()->alternativas  :  ''; 
			$data['txt_otro'] 		= ( $metadata->num_rows()==1 )  ?  $metadata->row()->otro  :  ''; 
			$data['txt_faltantes'] 	= ( $metadata->num_rows()==1 )  ?  $metadata->row()->faltantes  :  ''; 
			$data['txt_productor'] 	= ( $metadata->num_rows()==1 )  ?  $metadata->row()->productor :  ''; 
			$data['txt_definiciones'] = ( $metadata->num_rows()==1 )  ?  $metadata->row()->definiciones  :  '';	

			$data['main_content'] = 'tabulados/acuicultor/reporte_166_view';

			$this->load->view('backend/includes/template', $data);		
	}

	public function reporte_165()
	{
			$data['restriccion'] = $this->restriccion ;
			$data['nav'] = TRUE;
			$data['title'] = 'Tabulados Acuicultor';	
			$data['nom_tabulados'] = $this->tabulados_model->get_nombre_tabulados();	
			$data['opcion'] = 165;		
			$data['tables'] = $this->acuicultor_model->get_tabulado_167();

			$texto = ($this->tabulados_model->get_texto(2,$data['opcion'])->num_rows() > 0)  ?  $texto = $this->tabulados_model->get_texto(2,$data['opcion'])->row()->texto  :  '';
			$data['texto'] =  $texto; 
			$texto_2 = ($this->tabulados_model->get_texto(2,$data['opcion'])->num_rows() > 0)  ?  $texto_2 = $this->tabulados_model->get_texto(2,$data['opcion'])->row()->texto_2  :  '';
			$data['texto_2'] =  $texto_2; 

			$metadata = $this->tabulados_model->get_metadata(2,$data['opcion']); 
			$data['txt_tabulado'] 	= ( $metadata->num_rows()==1 )  ?  $metadata->row()->tabulado  :  ''; 
			$data['txt_contenido'] 	= ( $metadata->num_rows()==1 )  ?  $metadata->row()->contenido  :  ''; 
			$data['txt_casos'] 		= ( $metadata->num_rows()==1 )  ?  $metadata->row()->casos  :  ''; 
			$data['txt_variables'] 	= ( $metadata->num_rows()==1 )  ?  $metadata->row()->variable  :  ''; 
			$data['txt_alternativas'] = ( $metadata->num_rows()==1 )  ?  $metadata->row()->alternativas  :  ''; 
			$data['txt_otro'] 		= ( $metadata->num_rows()==1 )  ?  $metadata->row()->otro  :  ''; 
			$data['txt_faltantes'] 	= ( $metadata->num_rows()==1 )  ?  $metadata->row()->faltantes  :  ''; 
			$data['txt_productor'] 	= ( $metadata->num_rows()==1 )  ?  $metadata->row()->productor :  ''; 
			$data['txt_definiciones'] = ( $metadata->num_rows()==1 )  ?  $metadata->row()->definiciones  :  '';	

			$data['main_content'] = 'tabulados/acuicultor/reporte_167_view';

			$this->load->view('backend/includes/template', $data);		
	}

	public function reporte_166()
	{
			$data['restriccion'] = $this->restriccion ;
			$data['nav'] = TRUE;
			$data['title'] = 'Tabulados Acuicultor';	
			$data['nom_tabulados'] = $this->tabulados_model->get_nombre_tabulados();	
			$data['opcion'] = 166;		
			$data['tables'] = $this->acuicultor_model->get_tabulado_168();

			$texto = ($this->tabulados_model->get_texto(2,$data['opcion'])->num_rows() > 0)  ?  $texto = $this->tabulados_model->get_texto(2,$data['opcion'])->row()->texto  :  '';
			$data['texto'] =  $texto; 
			$texto_2 = ($this->tabulados_model->get_texto(2,$data['opcion'])->num_rows() > 0)  ?  $texto_2 = $this->tabulados_model->get_texto(2,$data['opcion'])->row()->texto_2  :  '';
			$data['texto_2'] =  $texto_2; 

			$metadata = $this->tabulados_model->get_metadata(2,$data['opcion']); 
			$data['txt_tabulado'] 	= ( $metadata->num_rows()==1 )  ?  $metadata->row()->tabulado  :  ''; 
			$data['txt_contenido'] 	= ( $metadata->num_rows()==1 )  ?  $metadata->row()->contenido  :  ''; 
			$data['txt_casos'] 		= ( $metadata->num_rows()==1 )  ?  $metadata->row()->casos  :  ''; 
			$data['txt_variables'] 	= ( $metadata->num_rows()==1 )  ?  $metadata->row()->variable  :  ''; 
			$data['txt_alternativas'] = ( $metadata->num_rows()==1 )  ?  $metadata->row()->alternativas  :  ''; 
			$data['txt_otro'] 		= ( $metadata->num_rows()==1 )  ?  $metadata->row()->otro  :  ''; 
			$data['txt_faltantes'] 	= ( $metadata->num_rows()==1 )  ?  $metadata->row()->faltantes  :  ''; 
			$data['txt_productor'] 	= ( $metadata->num_rows()==1 )  ?  $metadata->row()->productor :  ''; 
			$data['txt_definiciones'] = ( $metadata->num_rows()==1 )  ?  $metadata->row()->definiciones  :  '';	

			$data['main_content'] = 'tabulados/acuicultor/reporte_168_view';

			$this->load->view('backend/includes/template', $data);		
	}

	public function reporte_167()
	{
			$data['restriccion'] = $this->restriccion ;
			$data['nav'] = TRUE;
			$data['title'] = 'Tabulados Acuicultor';	
			$data['nom_tabulados'] = $this->tabulados_model->get_nombre_tabulados();	
			$data['opcion'] = 167;		
			$data['tables'] = $this->acuicultor_model->get_tabulado_169();

			$texto = ($this->tabulados_model->get_texto(2,$data['opcion'])->num_rows() > 0)  ?  $texto = $this->tabulados_model->get_texto(2,$data['opcion'])->row()->texto  :  '';
			$data['texto'] =  $texto; 
			$texto_2 = ($this->tabulados_model->get_texto(2,$data['opcion'])->num_rows() > 0)  ?  $texto_2 = $this->tabulados_model->get_texto(2,$data['opcion'])->row()->texto_2  :  '';
			$data['texto_2'] =  $texto_2; 

			$metadata = $this->tabulados_model->get_metadata(2,$data['opcion']); 
			$data['txt_tabulado'] 	= ( $metadata->num_rows()==1 )  ?  $metadata->row()->tabulado  :  ''; 
			$data['txt_contenido'] 	= ( $metadata->num_rows()==1 )  ?  $metadata->row()->contenido  :  ''; 
			$data['txt_casos'] 		= ( $metadata->num_rows()==1 )  ?  $metadata->row()->casos  :  ''; 
			$data['txt_variables'] 	= ( $metadata->num_rows()==1 )  ?  $metadata->row()->variable  :  ''; 
			$data['txt_alternativas'] = ( $metadata->num_rows()==1 )  ?  $metadata->row()->alternativas  :  ''; 
			$data['txt_otro'] 		= ( $metadata->num_rows()==1 )  ?  $metadata->row()->otro  :  ''; 
			$data['txt_faltantes'] 	= ( $metadata->num_rows()==1 )  ?  $metadata->row()->faltantes  :  ''; 
			$data['txt_productor'] 	= ( $metadata->num_rows()==1 )  ?  $metadata->row()->productor :  ''; 
			$data['txt_definiciones'] = ( $metadata->num_rows()==1 )  ?  $metadata->row()->definiciones  :  '';	

			$data['main_content'] = 'tabulados/acuicultor/reporte_169_view';

			$this->load->view('backend/includes/template', $data);		
	}

	public function reporte_168()
	{
			$data['restriccion'] = $this->restriccion ;
			$data['nav'] = TRUE;
			$data['title'] = 'Tabulados Acuicultor';	
			$data['nom_tabulados'] = $this->tabulados_model->get_nombre_tabulados();	
			$data['opcion'] = 168;		
			$data['tables'] = $this->acuicultor_model->get_tabulado_170();

			$texto = ($this->tabulados_model->get_texto(2,$data['opcion'])->num_rows() > 0)  ?  $texto = $this->tabulados_model->get_texto(2,$data['opcion'])->row()->texto  :  '';
			$data['texto'] =  $texto; 
			$texto_2 = ($this->tabulados_model->get_texto(2,$data['opcion'])->num_rows() > 0)  ?  $texto_2 = $this->tabulados_model->get_texto(2,$data['opcion'])->row()->texto_2  :  '';
			$data['texto_2'] =  $texto_2; 

			$metadata = $this->tabulados_model->get_metadata(2,$data['opcion']); 
			$data['txt_tabulado'] 	= ( $metadata->num_rows()==1 )  ?  $metadata->row()->tabulado  :  ''; 
			$data['txt_contenido'] 	= ( $metadata->num_rows()==1 )  ?  $metadata->row()->contenido  :  ''; 
			$data['txt_casos'] 		= ( $metadata->num_rows()==1 )  ?  $metadata->row()->casos  :  ''; 
			$data['txt_variables'] 	= ( $metadata->num_rows()==1 )  ?  $metadata->row()->variable  :  ''; 
			$data['txt_alternativas'] = ( $metadata->num_rows()==1 )  ?  $metadata->row()->alternativas  :  ''; 
			$data['txt_otro'] 		= ( $metadata->num_rows()==1 )  ?  $metadata->row()->otro  :  ''; 
			$data['txt_faltantes'] 	= ( $metadata->num_rows()==1 )  ?  $metadata->row()->faltantes  :  ''; 
			$data['txt_productor'] 	= ( $metadata->num_rows()==1 )  ?  $metadata->row()->productor :  ''; 
			$data['txt_definiciones'] = ( $metadata->num_rows()==1 )  ?  $metadata->row()->definiciones  :  '';	

			$data['main_content'] = 'tabulados/acuicultor/reporte_170_view';

			$this->load->view('backend/includes/template', $data);		
	}

	public function reporte_169()
	{
			$data['restriccion'] = $this->restriccion ;
			$data['nav'] = TRUE;
			$data['title'] = 'Tabulados Acuicultor';	
			$data['nom_tabulados'] = $this->tabulados_model->get_nombre_tabulados();	
			$data['opcion'] = 169;		
			$data['tables'] = $this->acuicultor_model->get_tabulado_171();

			$texto = ($this->tabulados_model->get_texto(2,$data['opcion'])->num_rows() > 0)  ?  $texto = $this->tabulados_model->get_texto(2,$data['opcion'])->row()->texto  :  '';
			$data['texto'] =  $texto; 
			$texto_2 = ($this->tabulados_model->get_texto(2,$data['opcion'])->num_rows() > 0)  ?  $texto_2 = $this->tabulados_model->get_texto(2,$data['opcion'])->row()->texto_2  :  '';
			$data['texto_2'] =  $texto_2; 

			$metadata = $this->tabulados_model->get_metadata(2,$data['opcion']); 
			$data['txt_tabulado'] 	= ( $metadata->num_rows()==1 )  ?  $metadata->row()->tabulado  :  ''; 
			$data['txt_contenido'] 	= ( $metadata->num_rows()==1 )  ?  $metadata->row()->contenido  :  ''; 
			$data['txt_casos'] 		= ( $metadata->num_rows()==1 )  ?  $metadata->row()->casos  :  ''; 
			$data['txt_variables'] 	= ( $metadata->num_rows()==1 )  ?  $metadata->row()->variable  :  ''; 
			$data['txt_alternativas'] = ( $metadata->num_rows()==1 )  ?  $metadata->row()->alternativas  :  ''; 
			$data['txt_otro'] 		= ( $metadata->num_rows()==1 )  ?  $metadata->row()->otro  :  ''; 
			$data['txt_faltantes'] 	= ( $metadata->num_rows()==1 )  ?  $metadata->row()->faltantes  :  ''; 
			$data['txt_productor'] 	= ( $metadata->num_rows()==1 )  ?  $metadata->row()->productor :  ''; 
			$data['txt_definiciones'] = ( $metadata->num_rows()==1 )  ?  $metadata->row()->definiciones  :  '';	

			$data['main_content'] = 'tabulados/acuicultor/reporte_171_view';

			$this->load->view('backend/includes/template', $data);		
	}


	public function reporte_170()
	{
			$data['restriccion'] = $this->restriccion ;
			$data['nav'] = TRUE;
			$data['title'] = 'Tabulados Acuicultor';	
			$data['nom_tabulados'] = $this->tabulados_model->get_nombre_tabulados();	
			$data['opcion'] = 170;		
			$data['tables'] = $this->acuicultor_model->get_tabulado_172();

			$texto = ($this->tabulados_model->get_texto(2,$data['opcion'])->num_rows() > 0)  ?  $texto = $this->tabulados_model->get_texto(2,$data['opcion'])->row()->texto  :  '';
			$data['texto'] =  $texto; 
			$texto_2 = ($this->tabulados_model->get_texto(2,$data['opcion'])->num_rows() > 0)  ?  $texto_2 = $this->tabulados_model->get_texto(2,$data['opcion'])->row()->texto_2  :  '';
			$data['texto_2'] =  $texto_2; 

			$metadata = $this->tabulados_model->get_metadata(2,$data['opcion']); 
			$data['txt_tabulado'] 	= ( $metadata->num_rows()==1 )  ?  $metadata->row()->tabulado  :  ''; 
			$data['txt_contenido'] 	= ( $metadata->num_rows()==1 )  ?  $metadata->row()->contenido  :  ''; 
			$data['txt_casos'] 		= ( $metadata->num_rows()==1 )  ?  $metadata->row()->casos  :  ''; 
			$data['txt_variables'] 	= ( $metadata->num_rows()==1 )  ?  $metadata->row()->variable  :  ''; 
			$data['txt_alternativas'] = ( $metadata->num_rows()==1 )  ?  $metadata->row()->alternativas  :  ''; 
			$data['txt_otro'] 		= ( $metadata->num_rows()==1 )  ?  $metadata->row()->otro  :  ''; 
			$data['txt_faltantes'] 	= ( $metadata->num_rows()==1 )  ?  $metadata->row()->faltantes  :  ''; 
			$data['txt_productor'] 	= ( $metadata->num_rows()==1 )  ?  $metadata->row()->productor :  ''; 
			$data['txt_definiciones'] = ( $metadata->num_rows()==1 )  ?  $metadata->row()->definiciones  :  '';	

			$data['main_content'] = 'tabulados/acuicultor/reporte_172_view';

			$this->load->view('backend/includes/template', $data);		
	}
	

	public function reporte_171()
	{
			$data['restriccion'] = $this->restriccion ;
			$data['nav'] = TRUE;
			$data['title'] = 'Tabulados Acuicultor';	
			$data['nom_tabulados'] = $this->tabulados_model->get_nombre_tabulados();	
			$data['opcion'] = 171;		
			$data['tables'] = $this->acuicultor_model->get_tabulado_173();

			$texto = ($this->tabulados_model->get_texto(2,$data['opcion'])->num_rows() > 0)  ?  $texto = $this->tabulados_model->get_texto(2,$data['opcion'])->row()->texto  :  '';
			$data['texto'] =  $texto; 
			$texto_2 = ($this->tabulados_model->get_texto(2,$data['opcion'])->num_rows() > 0)  ?  $texto_2 = $this->tabulados_model->get_texto(2,$data['opcion'])->row()->texto_2  :  '';
			$data['texto_2'] =  $texto_2; 

			$metadata = $this->tabulados_model->get_metadata(2,$data['opcion']); 
			$data['txt_tabulado'] 	= ( $metadata->num_rows()==1 )  ?  $metadata->row()->tabulado  :  ''; 
			$data['txt_contenido'] 	= ( $metadata->num_rows()==1 )  ?  $metadata->row()->contenido  :  ''; 
			$data['txt_casos'] 		= ( $metadata->num_rows()==1 )  ?  $metadata->row()->casos  :  ''; 
			$data['txt_variables'] 	= ( $metadata->num_rows()==1 )  ?  $metadata->row()->variable  :  ''; 
			$data['txt_alternativas'] = ( $metadata->num_rows()==1 )  ?  $metadata->row()->alternativas  :  ''; 
			$data['txt_otro'] 		= ( $metadata->num_rows()==1 )  ?  $metadata->row()->otro  :  ''; 
			$data['txt_faltantes'] 	= ( $metadata->num_rows()==1 )  ?  $metadata->row()->faltantes  :  ''; 
			$data['txt_productor'] 	= ( $metadata->num_rows()==1 )  ?  $metadata->row()->productor :  ''; 
			$data['txt_definiciones'] = ( $metadata->num_rows()==1 )  ?  $metadata->row()->definiciones  :  '';	

			$data['main_content'] = 'tabulados/acuicultor/reporte_173_view';

			$this->load->view('backend/includes/template', $data);		
	}


	public function reporte_172()
	{
			$data['restriccion'] = $this->restriccion ;
			$data['nav'] = TRUE;
			$data['title'] = 'Tabulados Acuicultor';	
			$data['nom_tabulados'] = $this->tabulados_model->get_nombre_tabulados();	
			$data['opcion'] = 172;		
			$data['tables'] = $this->acuicultor_model->get_tabulado_174();

			$texto = ($this->tabulados_model->get_texto(2,$data['opcion'])->num_rows() > 0)  ?  $texto = $this->tabulados_model->get_texto(2,$data['opcion'])->row()->texto  :  '';
			$data['texto'] =  $texto; 
			$texto_2 = ($this->tabulados_model->get_texto(2,$data['opcion'])->num_rows() > 0)  ?  $texto_2 = $this->tabulados_model->get_texto(2,$data['opcion'])->row()->texto_2  :  '';
			$data['texto_2'] =  $texto_2; 

			$metadata = $this->tabulados_model->get_metadata(2,$data['opcion']); 
			$data['txt_tabulado'] 	= ( $metadata->num_rows()==1 )  ?  $metadata->row()->tabulado  :  ''; 
			$data['txt_contenido'] 	= ( $metadata->num_rows()==1 )  ?  $metadata->row()->contenido  :  ''; 
			$data['txt_casos'] 		= ( $metadata->num_rows()==1 )  ?  $metadata->row()->casos  :  ''; 
			$data['txt_variables'] 	= ( $metadata->num_rows()==1 )  ?  $metadata->row()->variable  :  ''; 
			$data['txt_alternativas'] = ( $metadata->num_rows()==1 )  ?  $metadata->row()->alternativas  :  ''; 
			$data['txt_otro'] 		= ( $metadata->num_rows()==1 )  ?  $metadata->row()->otro  :  ''; 
			$data['txt_faltantes'] 	= ( $metadata->num_rows()==1 )  ?  $metadata->row()->faltantes  :  ''; 
			$data['txt_productor'] 	= ( $metadata->num_rows()==1 )  ?  $metadata->row()->productor :  ''; 
			$data['txt_definiciones'] = ( $metadata->num_rows()==1 )  ?  $metadata->row()->definiciones  :  '';	

			$data['main_content'] = 'tabulados/acuicultor/reporte_174_view';

			$this->load->view('backend/includes/template', $data);		
	}


	public function reporte_173()
	{
			$data['restriccion'] = $this->restriccion ;
			$data['nav'] = TRUE;
			$data['title'] = 'Tabulados Acuicultor';	
			$data['nom_tabulados'] = $this->tabulados_model->get_nombre_tabulados();	
			$data['opcion'] = 173;		
			$data['tables'] = $this->acuicultor_model->get_tabulado_175();

			$texto = ($this->tabulados_model->get_texto(2,$data['opcion'])->num_rows() > 0)  ?  $texto = $this->tabulados_model->get_texto(2,$data['opcion'])->row()->texto  :  '';
			$data['texto'] =  $texto; 
			$texto_2 = ($this->tabulados_model->get_texto(2,$data['opcion'])->num_rows() > 0)  ?  $texto_2 = $this->tabulados_model->get_texto(2,$data['opcion'])->row()->texto_2  :  '';
			$data['texto_2'] =  $texto_2; 

			$metadata = $this->tabulados_model->get_metadata(2,$data['opcion']); 
			$data['txt_tabulado'] 	= ( $metadata->num_rows()==1 )  ?  $metadata->row()->tabulado  :  ''; 
			$data['txt_contenido'] 	= ( $metadata->num_rows()==1 )  ?  $metadata->row()->contenido  :  ''; 
			$data['txt_casos'] 		= ( $metadata->num_rows()==1 )  ?  $metadata->row()->casos  :  ''; 
			$data['txt_variables'] 	= ( $metadata->num_rows()==1 )  ?  $metadata->row()->variable  :  ''; 
			$data['txt_alternativas'] = ( $metadata->num_rows()==1 )  ?  $metadata->row()->alternativas  :  ''; 
			$data['txt_otro'] 		= ( $metadata->num_rows()==1 )  ?  $metadata->row()->otro  :  ''; 
			$data['txt_faltantes'] 	= ( $metadata->num_rows()==1 )  ?  $metadata->row()->faltantes  :  ''; 
			$data['txt_productor'] 	= ( $metadata->num_rows()==1 )  ?  $metadata->row()->productor :  ''; 
			$data['txt_definiciones'] = ( $metadata->num_rows()==1 )  ?  $metadata->row()->definiciones  :  '';	

			$data['main_content'] = 'tabulados/acuicultor/reporte_175_view';

			$this->load->view('backend/includes/template', $data);		
	}


	public function reporte_174()
	{
			$data['restriccion'] = $this->restriccion ;
			$data['nav'] = TRUE;
			$data['title'] = 'Tabulados Acuicultor';	
			$data['nom_tabulados'] = $this->tabulados_model->get_nombre_tabulados();	
			$data['opcion'] = 174;		
			$data['tables'] = $this->acuicultor_model->get_tabulado_176();

			$texto = ($this->tabulados_model->get_texto(2,$data['opcion'])->num_rows() > 0)  ?  $texto = $this->tabulados_model->get_texto(2,$data['opcion'])->row()->texto  :  '';
			$data['texto'] =  $texto; 
			$texto_2 = ($this->tabulados_model->get_texto(2,$data['opcion'])->num_rows() > 0)  ?  $texto_2 = $this->tabulados_model->get_texto(2,$data['opcion'])->row()->texto_2  :  '';
			$data['texto_2'] =  $texto_2; 

			$metadata = $this->tabulados_model->get_metadata(2,$data['opcion']); 
			$data['txt_tabulado'] 	= ( $metadata->num_rows()==1 )  ?  $metadata->row()->tabulado  :  ''; 
			$data['txt_contenido'] 	= ( $metadata->num_rows()==1 )  ?  $metadata->row()->contenido  :  ''; 
			$data['txt_casos'] 		= ( $metadata->num_rows()==1 )  ?  $metadata->row()->casos  :  ''; 
			$data['txt_variables'] 	= ( $metadata->num_rows()==1 )  ?  $metadata->row()->variable  :  ''; 
			$data['txt_alternativas'] = ( $metadata->num_rows()==1 )  ?  $metadata->row()->alternativas  :  ''; 
			$data['txt_otro'] 		= ( $metadata->num_rows()==1 )  ?  $metadata->row()->otro  :  ''; 
			$data['txt_faltantes'] 	= ( $metadata->num_rows()==1 )  ?  $metadata->row()->faltantes  :  ''; 
			$data['txt_productor'] 	= ( $metadata->num_rows()==1 )  ?  $metadata->row()->productor :  ''; 
			$data['txt_definiciones'] = ( $metadata->num_rows()==1 )  ?  $metadata->row()->definiciones  :  '';	

			$data['main_content'] = 'tabulados/acuicultor/reporte_176_view';

			$this->load->view('backend/includes/template', $data);		
	}

	public function reporte_175()
	{
			$data['restriccion'] = $this->restriccion ;
			$data['nav'] = TRUE;
			$data['title'] = 'Tabulados Acuicultor';	
			$data['nom_tabulados'] = $this->tabulados_model->get_nombre_tabulados();	
			$data['opcion'] = 175;		
			$data['tables'] = $this->acuicultor_model->get_tabulado_177();

			$texto = ($this->tabulados_model->get_texto(2,$data['opcion'])->num_rows() > 0)  ?  $texto = $this->tabulados_model->get_texto(2,$data['opcion'])->row()->texto  :  '';
			$data['texto'] =  $texto; 
			$texto_2 = ($this->tabulados_model->get_texto(2,$data['opcion'])->num_rows() > 0)  ?  $texto_2 = $this->tabulados_model->get_texto(2,$data['opcion'])->row()->texto_2  :  '';
			$data['texto_2'] =  $texto_2; 

			$metadata = $this->tabulados_model->get_metadata(2,$data['opcion']); 
			$data['txt_tabulado'] 	= ( $metadata->num_rows()==1 )  ?  $metadata->row()->tabulado  :  ''; 
			$data['txt_contenido'] 	= ( $metadata->num_rows()==1 )  ?  $metadata->row()->contenido  :  ''; 
			$data['txt_casos'] 		= ( $metadata->num_rows()==1 )  ?  $metadata->row()->casos  :  ''; 
			$data['txt_variables'] 	= ( $metadata->num_rows()==1 )  ?  $metadata->row()->variable  :  ''; 
			$data['txt_alternativas'] = ( $metadata->num_rows()==1 )  ?  $metadata->row()->alternativas  :  ''; 
			$data['txt_otro'] 		= ( $metadata->num_rows()==1 )  ?  $metadata->row()->otro  :  ''; 
			$data['txt_faltantes'] 	= ( $metadata->num_rows()==1 )  ?  $metadata->row()->faltantes  :  ''; 
			$data['txt_productor'] 	= ( $metadata->num_rows()==1 )  ?  $metadata->row()->productor :  ''; 
			$data['txt_definiciones'] = ( $metadata->num_rows()==1 )  ?  $metadata->row()->definiciones  :  '';	

			$data['main_content'] = 'tabulados/acuicultor/reporte_177_view';

			$this->load->view('backend/includes/template', $data);		
	}



	public function reporte_176()
	{
			$data['restriccion'] = $this->restriccion ;
			$data['nav'] = TRUE;
			$data['title'] = 'Tabulados Acuicultor';	
			$data['nom_tabulados'] = $this->tabulados_model->get_nombre_tabulados();	
			$data['opcion'] = 176;		
			$data['tables'] = $this->acuicultor_model->get_tabulado_178();

			$texto = ($this->tabulados_model->get_texto(2,$data['opcion'])->num_rows() > 0)  ?  $texto = $this->tabulados_model->get_texto(2,$data['opcion'])->row()->texto  :  '';
			$data['texto'] =  $texto; 
			$texto_2 = ($this->tabulados_model->get_texto(2,$data['opcion'])->num_rows() > 0)  ?  $texto_2 = $this->tabulados_model->get_texto(2,$data['opcion'])->row()->texto_2  :  '';
			$data['texto_2'] =  $texto_2; 

			$metadata = $this->tabulados_model->get_metadata(2,$data['opcion']); 
			$data['txt_tabulado'] 	= ( $metadata->num_rows()==1 )  ?  $metadata->row()->tabulado  :  ''; 
			$data['txt_contenido'] 	= ( $metadata->num_rows()==1 )  ?  $metadata->row()->contenido  :  ''; 
			$data['txt_casos'] 		= ( $metadata->num_rows()==1 )  ?  $metadata->row()->casos  :  ''; 
			$data['txt_variables'] 	= ( $metadata->num_rows()==1 )  ?  $metadata->row()->variable  :  ''; 
			$data['txt_alternativas'] = ( $metadata->num_rows()==1 )  ?  $metadata->row()->alternativas  :  ''; 
			$data['txt_otro'] 		= ( $metadata->num_rows()==1 )  ?  $metadata->row()->otro  :  ''; 
			$data['txt_faltantes'] 	= ( $metadata->num_rows()==1 )  ?  $metadata->row()->faltantes  :  ''; 
			$data['txt_productor'] 	= ( $metadata->num_rows()==1 )  ?  $metadata->row()->productor :  ''; 
			$data['txt_definiciones'] = ( $metadata->num_rows()==1 )  ?  $metadata->row()->definiciones  :  '';	

			$data['main_content'] = 'tabulados/acuicultor/reporte_178_view';

			$this->load->view('backend/includes/template', $data);		
	}

	public function reporte_177()
	{
			$data['restriccion'] = $this->restriccion ;
			$data['nav'] = TRUE;
			$data['title'] = 'Tabulados Acuicultor';	
			$data['nom_tabulados'] = $this->tabulados_model->get_nombre_tabulados();	
			$data['opcion'] = 177;		
			$data['tables'] = $this->acuicultor_model->get_tabulado_179();

			$texto = ($this->tabulados_model->get_texto(2,$data['opcion'])->num_rows() > 0)  ?  $texto = $this->tabulados_model->get_texto(2,$data['opcion'])->row()->texto  :  '';
			$data['texto'] =  $texto; 
			$texto_2 = ($this->tabulados_model->get_texto(2,$data['opcion'])->num_rows() > 0)  ?  $texto_2 = $this->tabulados_model->get_texto(2,$data['opcion'])->row()->texto_2  :  '';
			$data['texto_2'] =  $texto_2; 

			$metadata = $this->tabulados_model->get_metadata(2,$data['opcion']); 
			$data['txt_tabulado'] 	= ( $metadata->num_rows()==1 )  ?  $metadata->row()->tabulado  :  ''; 
			$data['txt_contenido'] 	= ( $metadata->num_rows()==1 )  ?  $metadata->row()->contenido  :  ''; 
			$data['txt_casos'] 		= ( $metadata->num_rows()==1 )  ?  $metadata->row()->casos  :  ''; 
			$data['txt_variables'] 	= ( $metadata->num_rows()==1 )  ?  $metadata->row()->variable  :  ''; 
			$data['txt_alternativas'] = ( $metadata->num_rows()==1 )  ?  $metadata->row()->alternativas  :  ''; 
			$data['txt_otro'] 		= ( $metadata->num_rows()==1 )  ?  $metadata->row()->otro  :  ''; 
			$data['txt_faltantes'] 	= ( $metadata->num_rows()==1 )  ?  $metadata->row()->faltantes  :  ''; 
			$data['txt_productor'] 	= ( $metadata->num_rows()==1 )  ?  $metadata->row()->productor :  ''; 
			$data['txt_definiciones'] = ( $metadata->num_rows()==1 )  ?  $metadata->row()->definiciones  :  '';	

			$data['main_content'] = 'tabulados/acuicultor/reporte_179_view';

			$this->load->view('backend/includes/template', $data);		
	}

	public function reporte_178()
	{
			$data['restriccion'] = $this->restriccion ;
			$data['nav'] = TRUE;
			$data['title'] = 'Tabulados Acuicultor';	
			$data['nom_tabulados'] = $this->tabulados_model->get_nombre_tabulados();	
			$data['opcion'] = 178;		
			$data['tables'] = $this->acuicultor_model->get_tabulado_180();

			$texto = ($this->tabulados_model->get_texto(2,$data['opcion'])->num_rows() > 0)  ?  $texto = $this->tabulados_model->get_texto(2,$data['opcion'])->row()->texto  :  '';
			$data['texto'] =  $texto; 
			$texto_2 = ($this->tabulados_model->get_texto(2,$data['opcion'])->num_rows() > 0)  ?  $texto_2 = $this->tabulados_model->get_texto(2,$data['opcion'])->row()->texto_2  :  '';
			$data['texto_2'] =  $texto_2; 

			$metadata = $this->tabulados_model->get_metadata(2,$data['opcion']); 
			$data['txt_tabulado'] 	= ( $metadata->num_rows()==1 )  ?  $metadata->row()->tabulado  :  ''; 
			$data['txt_contenido'] 	= ( $metadata->num_rows()==1 )  ?  $metadata->row()->contenido  :  ''; 
			$data['txt_casos'] 		= ( $metadata->num_rows()==1 )  ?  $metadata->row()->casos  :  ''; 
			$data['txt_variables'] 	= ( $metadata->num_rows()==1 )  ?  $metadata->row()->variable  :  ''; 
			$data['txt_alternativas'] = ( $metadata->num_rows()==1 )  ?  $metadata->row()->alternativas  :  ''; 
			$data['txt_otro'] 		= ( $metadata->num_rows()==1 )  ?  $metadata->row()->otro  :  ''; 
			$data['txt_faltantes'] 	= ( $metadata->num_rows()==1 )  ?  $metadata->row()->faltantes  :  ''; 
			$data['txt_productor'] 	= ( $metadata->num_rows()==1 )  ?  $metadata->row()->productor :  ''; 
			$data['txt_definiciones'] = ( $metadata->num_rows()==1 )  ?  $metadata->row()->definiciones  :  '';	

			$data['main_content'] = 'tabulados/acuicultor/reporte_180_view';

			$this->load->view('backend/includes/template', $data);		
	}

	public function reporte_179()
	{
			$data['restriccion'] = $this->restriccion ;
			$data['nav'] = TRUE;
			$data['title'] = 'Tabulados Acuicultor';	
			$data['nom_tabulados'] = $this->tabulados_model->get_nombre_tabulados();	
			$data['opcion'] = 179;		
			$data['tables'] = $this->acuicultor_model->get_tabulado_181();

			$texto = ($this->tabulados_model->get_texto(2,$data['opcion'])->num_rows() > 0)  ?  $texto = $this->tabulados_model->get_texto(2,$data['opcion'])->row()->texto  :  '';
			$data['texto'] =  $texto; 
			$texto_2 = ($this->tabulados_model->get_texto(2,$data['opcion'])->num_rows() > 0)  ?  $texto_2 = $this->tabulados_model->get_texto(2,$data['opcion'])->row()->texto_2  :  '';
			$data['texto_2'] =  $texto_2; 

			$metadata = $this->tabulados_model->get_metadata(2,$data['opcion']); 
			$data['txt_tabulado'] 	= ( $metadata->num_rows()==1 )  ?  $metadata->row()->tabulado  :  ''; 
			$data['txt_contenido'] 	= ( $metadata->num_rows()==1 )  ?  $metadata->row()->contenido  :  ''; 
			$data['txt_casos'] 		= ( $metadata->num_rows()==1 )  ?  $metadata->row()->casos  :  ''; 
			$data['txt_variables'] 	= ( $metadata->num_rows()==1 )  ?  $metadata->row()->variable  :  ''; 
			$data['txt_alternativas'] = ( $metadata->num_rows()==1 )  ?  $metadata->row()->alternativas  :  ''; 
			$data['txt_otro'] 		= ( $metadata->num_rows()==1 )  ?  $metadata->row()->otro  :  ''; 
			$data['txt_faltantes'] 	= ( $metadata->num_rows()==1 )  ?  $metadata->row()->faltantes  :  ''; 
			$data['txt_productor'] 	= ( $metadata->num_rows()==1 )  ?  $metadata->row()->productor :  ''; 
			$data['txt_definiciones'] = ( $metadata->num_rows()==1 )  ?  $metadata->row()->definiciones  :  '';	

			$data['main_content'] = 'tabulados/acuicultor/reporte_181_view';

			$this->load->view('backend/includes/template', $data);		
	}


	public function reporte_180()
	{
			$data['restriccion'] = $this->restriccion ;
			$data['nav'] = TRUE;
			$data['title'] = 'Tabulados Acuicultor';	
			$data['nom_tabulados'] = $this->tabulados_model->get_nombre_tabulados();	
			$data['opcion'] = 180;		
			$data['tables'] = $this->acuicultor_model->get_tabulado_182();

			$texto = ($this->tabulados_model->get_texto(2,$data['opcion'])->num_rows() > 0)  ?  $texto = $this->tabulados_model->get_texto(2,$data['opcion'])->row()->texto  :  '';
			$data['texto'] =  $texto; 
			$texto_2 = ($this->tabulados_model->get_texto(2,$data['opcion'])->num_rows() > 0)  ?  $texto_2 = $this->tabulados_model->get_texto(2,$data['opcion'])->row()->texto_2  :  '';
			$data['texto_2'] =  $texto_2; 

			$metadata = $this->tabulados_model->get_metadata(2,$data['opcion']); 
			$data['txt_tabulado'] 	= ( $metadata->num_rows()==1 )  ?  $metadata->row()->tabulado  :  ''; 
			$data['txt_contenido'] 	= ( $metadata->num_rows()==1 )  ?  $metadata->row()->contenido  :  ''; 
			$data['txt_casos'] 		= ( $metadata->num_rows()==1 )  ?  $metadata->row()->casos  :  ''; 
			$data['txt_variables'] 	= ( $metadata->num_rows()==1 )  ?  $metadata->row()->variable  :  ''; 
			$data['txt_alternativas'] = ( $metadata->num_rows()==1 )  ?  $metadata->row()->alternativas  :  ''; 
			$data['txt_otro'] 		= ( $metadata->num_rows()==1 )  ?  $metadata->row()->otro  :  ''; 
			$data['txt_faltantes'] 	= ( $metadata->num_rows()==1 )  ?  $metadata->row()->faltantes  :  ''; 
			$data['txt_productor'] 	= ( $metadata->num_rows()==1 )  ?  $metadata->row()->productor :  ''; 
			$data['txt_definiciones'] = ( $metadata->num_rows()==1 )  ?  $metadata->row()->definiciones  :  '';	

			$data['main_content'] = 'tabulados/acuicultor/reporte_182_view';

			$this->load->view('backend/includes/template', $data);		
	}


	public function reporte_181()
	{
			$data['restriccion'] = $this->restriccion ;
			$data['nav'] = TRUE;
			$data['title'] = 'Tabulados Acuicultor';	
			$data['nom_tabulados'] = $this->tabulados_model->get_nombre_tabulados();	
			$data['opcion'] = 181;		
			$data['tables'] = $this->acuicultor_model->get_tabulado_183();

			$texto = ($this->tabulados_model->get_texto(2,$data['opcion'])->num_rows() > 0)  ?  $texto = $this->tabulados_model->get_texto(2,$data['opcion'])->row()->texto  :  '';
			$data['texto'] =  $texto; 
			$texto_2 = ($this->tabulados_model->get_texto(2,$data['opcion'])->num_rows() > 0)  ?  $texto_2 = $this->tabulados_model->get_texto(2,$data['opcion'])->row()->texto_2  :  '';
			$data['texto_2'] =  $texto_2; 

			$metadata = $this->tabulados_model->get_metadata(2,$data['opcion']); 
			$data['txt_tabulado'] 	= ( $metadata->num_rows()==1 )  ?  $metadata->row()->tabulado  :  ''; 
			$data['txt_contenido'] 	= ( $metadata->num_rows()==1 )  ?  $metadata->row()->contenido  :  ''; 
			$data['txt_casos'] 		= ( $metadata->num_rows()==1 )  ?  $metadata->row()->casos  :  ''; 
			$data['txt_variables'] 	= ( $metadata->num_rows()==1 )  ?  $metadata->row()->variable  :  ''; 
			$data['txt_alternativas'] = ( $metadata->num_rows()==1 )  ?  $metadata->row()->alternativas  :  ''; 
			$data['txt_otro'] 		= ( $metadata->num_rows()==1 )  ?  $metadata->row()->otro  :  ''; 
			$data['txt_faltantes'] 	= ( $metadata->num_rows()==1 )  ?  $metadata->row()->faltantes  :  ''; 
			$data['txt_productor'] 	= ( $metadata->num_rows()==1 )  ?  $metadata->row()->productor :  ''; 
			$data['txt_definiciones'] = ( $metadata->num_rows()==1 )  ?  $metadata->row()->definiciones  :  '';	

			$data['main_content'] = 'tabulados/acuicultor/reporte_183_view';

			$this->load->view('backend/includes/template', $data);		
	}


	public function reporte_182()
	{
			$data['restriccion'] = $this->restriccion ;
			$data['nav'] = TRUE;
			$data['title'] = 'Tabulados Acuicultor';	
			$data['nom_tabulados'] = $this->tabulados_model->get_nombre_tabulados();	
			$data['opcion'] = 182;		
			$data['tables'] = $this->acuicultor_model->get_tabulado_184();

			$texto = ($this->tabulados_model->get_texto(2,$data['opcion'])->num_rows() > 0)  ?  $texto = $this->tabulados_model->get_texto(2,$data['opcion'])->row()->texto  :  '';
			$data['texto'] =  $texto; 
			$texto_2 = ($this->tabulados_model->get_texto(2,$data['opcion'])->num_rows() > 0)  ?  $texto_2 = $this->tabulados_model->get_texto(2,$data['opcion'])->row()->texto_2  :  '';
			$data['texto_2'] =  $texto_2; 

			$metadata = $this->tabulados_model->get_metadata(2,$data['opcion']); 
			$data['txt_tabulado'] 	= ( $metadata->num_rows()==1 )  ?  $metadata->row()->tabulado  :  ''; 
			$data['txt_contenido'] 	= ( $metadata->num_rows()==1 )  ?  $metadata->row()->contenido  :  ''; 
			$data['txt_casos'] 		= ( $metadata->num_rows()==1 )  ?  $metadata->row()->casos  :  ''; 
			$data['txt_variables'] 	= ( $metadata->num_rows()==1 )  ?  $metadata->row()->variable  :  ''; 
			$data['txt_alternativas'] = ( $metadata->num_rows()==1 )  ?  $metadata->row()->alternativas  :  ''; 
			$data['txt_otro'] 		= ( $metadata->num_rows()==1 )  ?  $metadata->row()->otro  :  ''; 
			$data['txt_faltantes'] 	= ( $metadata->num_rows()==1 )  ?  $metadata->row()->faltantes  :  ''; 
			$data['txt_productor'] 	= ( $metadata->num_rows()==1 )  ?  $metadata->row()->productor :  ''; 
			$data['txt_definiciones'] = ( $metadata->num_rows()==1 )  ?  $metadata->row()->definiciones  :  '';	

			$data['main_content'] = 'tabulados/acuicultor/reporte_184_view';

			$this->load->view('backend/includes/template', $data);		
	}


	public function reporte_183()
	{
			$data['restriccion'] = $this->restriccion ;
			$data['nav'] = TRUE;
			$data['title'] = 'Tabulados Acuicultor';	
			$data['nom_tabulados'] = $this->tabulados_model->get_nombre_tabulados();	
			$data['opcion'] = 183;		
			$data['tables'] = $this->acuicultor_model->get_tabulado_185();

			$texto = ($this->tabulados_model->get_texto(2,$data['opcion'])->num_rows() > 0)  ?  $texto = $this->tabulados_model->get_texto(2,$data['opcion'])->row()->texto  :  '';
			$data['texto'] =  $texto; 
			$texto_2 = ($this->tabulados_model->get_texto(2,$data['opcion'])->num_rows() > 0)  ?  $texto_2 = $this->tabulados_model->get_texto(2,$data['opcion'])->row()->texto_2  :  '';
			$data['texto_2'] =  $texto_2; 

			$metadata = $this->tabulados_model->get_metadata(2,$data['opcion']); 
			$data['txt_tabulado'] 	= ( $metadata->num_rows()==1 )  ?  $metadata->row()->tabulado  :  ''; 
			$data['txt_contenido'] 	= ( $metadata->num_rows()==1 )  ?  $metadata->row()->contenido  :  ''; 
			$data['txt_casos'] 		= ( $metadata->num_rows()==1 )  ?  $metadata->row()->casos  :  ''; 
			$data['txt_variables'] 	= ( $metadata->num_rows()==1 )  ?  $metadata->row()->variable  :  ''; 
			$data['txt_alternativas'] = ( $metadata->num_rows()==1 )  ?  $metadata->row()->alternativas  :  ''; 
			$data['txt_otro'] 		= ( $metadata->num_rows()==1 )  ?  $metadata->row()->otro  :  ''; 
			$data['txt_faltantes'] 	= ( $metadata->num_rows()==1 )  ?  $metadata->row()->faltantes  :  ''; 
			$data['txt_productor'] 	= ( $metadata->num_rows()==1 )  ?  $metadata->row()->productor :  ''; 
			$data['txt_definiciones'] = ( $metadata->num_rows()==1 )  ?  $metadata->row()->definiciones  :  '';	

			$data['main_content'] = 'tabulados/acuicultor/reporte_185_view';

			$this->load->view('backend/includes/template', $data);		
	}


	public function reporte_184()
	{
			$data['restriccion'] = $this->restriccion ;
			$data['nav'] = TRUE;
			$data['title'] = 'Tabulados Acuicultor';	
			$data['nom_tabulados'] = $this->tabulados_model->get_nombre_tabulados();	
			$data['opcion'] = 184;		
			$data['tables'] = $this->acuicultor_model->get_tabulado_186();

			$texto = ($this->tabulados_model->get_texto(2,$data['opcion'])->num_rows() > 0)  ?  $texto = $this->tabulados_model->get_texto(2,$data['opcion'])->row()->texto  :  '';
			$data['texto'] =  $texto; 
			$texto_2 = ($this->tabulados_model->get_texto(2,$data['opcion'])->num_rows() > 0)  ?  $texto_2 = $this->tabulados_model->get_texto(2,$data['opcion'])->row()->texto_2  :  '';
			$data['texto_2'] =  $texto_2; 

			$metadata = $this->tabulados_model->get_metadata(2,$data['opcion']); 
			$data['txt_tabulado'] 	= ( $metadata->num_rows()==1 )  ?  $metadata->row()->tabulado  :  ''; 
			$data['txt_contenido'] 	= ( $metadata->num_rows()==1 )  ?  $metadata->row()->contenido  :  ''; 
			$data['txt_casos'] 		= ( $metadata->num_rows()==1 )  ?  $metadata->row()->casos  :  ''; 
			$data['txt_variables'] 	= ( $metadata->num_rows()==1 )  ?  $metadata->row()->variable  :  ''; 
			$data['txt_alternativas'] = ( $metadata->num_rows()==1 )  ?  $metadata->row()->alternativas  :  ''; 
			$data['txt_otro'] 		= ( $metadata->num_rows()==1 )  ?  $metadata->row()->otro  :  ''; 
			$data['txt_faltantes'] 	= ( $metadata->num_rows()==1 )  ?  $metadata->row()->faltantes  :  ''; 
			$data['txt_productor'] 	= ( $metadata->num_rows()==1 )  ?  $metadata->row()->productor :  ''; 
			$data['txt_definiciones'] = ( $metadata->num_rows()==1 )  ?  $metadata->row()->definiciones  :  '';	

			$data['main_content'] = 'tabulados/acuicultor/reporte_186_view';

			$this->load->view('backend/includes/template', $data);		
	}


	public function reporte_185()
	{
			$data['restriccion'] = $this->restriccion ;
			$data['nav'] = TRUE;
			$data['title'] = 'Tabulados Acuicultor';	
			$data['nom_tabulados'] = $this->tabulados_model->get_nombre_tabulados();	
			$data['opcion'] = 185;		
			$data['tables'] = $this->acuicultor_model->get_tabulado_187();

			$texto = ($this->tabulados_model->get_texto(2,$data['opcion'])->num_rows() > 0)  ?  $texto = $this->tabulados_model->get_texto(2,$data['opcion'])->row()->texto  :  '';
			$data['texto'] =  $texto; 
			$texto_2 = ($this->tabulados_model->get_texto(2,$data['opcion'])->num_rows() > 0)  ?  $texto_2 = $this->tabulados_model->get_texto(2,$data['opcion'])->row()->texto_2  :  '';
			$data['texto_2'] =  $texto_2; 

			$metadata = $this->tabulados_model->get_metadata(2,$data['opcion']); 
			$data['txt_tabulado'] 	= ( $metadata->num_rows()==1 )  ?  $metadata->row()->tabulado  :  ''; 
			$data['txt_contenido'] 	= ( $metadata->num_rows()==1 )  ?  $metadata->row()->contenido  :  ''; 
			$data['txt_casos'] 		= ( $metadata->num_rows()==1 )  ?  $metadata->row()->casos  :  ''; 
			$data['txt_variables'] 	= ( $metadata->num_rows()==1 )  ?  $metadata->row()->variable  :  ''; 
			$data['txt_alternativas'] = ( $metadata->num_rows()==1 )  ?  $metadata->row()->alternativas  :  ''; 
			$data['txt_otro'] 		= ( $metadata->num_rows()==1 )  ?  $metadata->row()->otro  :  ''; 
			$data['txt_faltantes'] 	= ( $metadata->num_rows()==1 )  ?  $metadata->row()->faltantes  :  ''; 
			$data['txt_productor'] 	= ( $metadata->num_rows()==1 )  ?  $metadata->row()->productor :  ''; 
			$data['txt_definiciones'] = ( $metadata->num_rows()==1 )  ?  $metadata->row()->definiciones  :  '';	

			$data['main_content'] = 'tabulados/acuicultor/reporte_187_view';

			$this->load->view('backend/includes/template', $data);		
	}


	public function reporte_186()
	{
			$data['restriccion'] = $this->restriccion ;
			$data['nav'] = TRUE;
			$data['title'] = 'Tabulados Acuicultor';	
			$data['nom_tabulados'] = $this->tabulados_model->get_nombre_tabulados();	
			$data['opcion'] = 186;		
			$data['tables'] = $this->acuicultor_model->get_tabulado_188();

			$texto = ($this->tabulados_model->get_texto(2,$data['opcion'])->num_rows() > 0)  ?  $texto = $this->tabulados_model->get_texto(2,$data['opcion'])->row()->texto  :  '';
			$data['texto'] =  $texto; 
			$texto_2 = ($this->tabulados_model->get_texto(2,$data['opcion'])->num_rows() > 0)  ?  $texto_2 = $this->tabulados_model->get_texto(2,$data['opcion'])->row()->texto_2  :  '';
			$data['texto_2'] =  $texto_2; 

			$metadata = $this->tabulados_model->get_metadata(2,$data['opcion']); 
			$data['txt_tabulado'] 	= ( $metadata->num_rows()==1 )  ?  $metadata->row()->tabulado  :  ''; 
			$data['txt_contenido'] 	= ( $metadata->num_rows()==1 )  ?  $metadata->row()->contenido  :  ''; 
			$data['txt_casos'] 		= ( $metadata->num_rows()==1 )  ?  $metadata->row()->casos  :  ''; 
			$data['txt_variables'] 	= ( $metadata->num_rows()==1 )  ?  $metadata->row()->variable  :  ''; 
			$data['txt_alternativas'] = ( $metadata->num_rows()==1 )  ?  $metadata->row()->alternativas  :  ''; 
			$data['txt_otro'] 		= ( $metadata->num_rows()==1 )  ?  $metadata->row()->otro  :  ''; 
			$data['txt_faltantes'] 	= ( $metadata->num_rows()==1 )  ?  $metadata->row()->faltantes  :  ''; 
			$data['txt_productor'] 	= ( $metadata->num_rows()==1 )  ?  $metadata->row()->productor :  ''; 
			$data['txt_definiciones'] = ( $metadata->num_rows()==1 )  ?  $metadata->row()->definiciones  :  '';	

			$data['main_content'] = 'tabulados/acuicultor/reporte_188_view';

			$this->load->view('backend/includes/template', $data);		
	}


	public function reporte_187()
	{
			$data['restriccion'] = $this->restriccion ;
			$data['nav'] = TRUE;
			$data['title'] = 'Tabulados Acuicultor';	
			$data['nom_tabulados'] = $this->tabulados_model->get_nombre_tabulados();	
			$data['opcion'] = 187;		
			$data['tables'] = $this->acuicultor_model->get_tabulado_189();

			$texto = ($this->tabulados_model->get_texto(2,$data['opcion'])->num_rows() > 0)  ?  $texto = $this->tabulados_model->get_texto(2,$data['opcion'])->row()->texto  :  '';
			$data['texto'] =  $texto; 
			$texto_2 = ($this->tabulados_model->get_texto(2,$data['opcion'])->num_rows() > 0)  ?  $texto_2 = $this->tabulados_model->get_texto(2,$data['opcion'])->row()->texto_2  :  '';
			$data['texto_2'] =  $texto_2; 

			$metadata = $this->tabulados_model->get_metadata(2,$data['opcion']); 
			$data['txt_tabulado'] 	= ( $metadata->num_rows()==1 )  ?  $metadata->row()->tabulado  :  ''; 
			$data['txt_contenido'] 	= ( $metadata->num_rows()==1 )  ?  $metadata->row()->contenido  :  ''; 
			$data['txt_casos'] 		= ( $metadata->num_rows()==1 )  ?  $metadata->row()->casos  :  ''; 
			$data['txt_variables'] 	= ( $metadata->num_rows()==1 )  ?  $metadata->row()->variable  :  ''; 
			$data['txt_alternativas'] = ( $metadata->num_rows()==1 )  ?  $metadata->row()->alternativas  :  ''; 
			$data['txt_otro'] 		= ( $metadata->num_rows()==1 )  ?  $metadata->row()->otro  :  ''; 
			$data['txt_faltantes'] 	= ( $metadata->num_rows()==1 )  ?  $metadata->row()->faltantes  :  ''; 
			$data['txt_productor'] 	= ( $metadata->num_rows()==1 )  ?  $metadata->row()->productor :  ''; 
			$data['txt_definiciones'] = ( $metadata->num_rows()==1 )  ?  $metadata->row()->definiciones  :  '';	

			$data['main_content'] = 'tabulados/acuicultor/reporte_189_view';

			$this->load->view('backend/includes/template', $data);		
	}


	public function reporte_188()
	{
			$data['restriccion'] = $this->restriccion ;
			$data['nav'] = TRUE;
			$data['title'] = 'Tabulados Acuicultor';	
			$data['nom_tabulados'] = $this->tabulados_model->get_nombre_tabulados();	
			$data['opcion'] = 188;		
			$data['tables'] = $this->acuicultor_model->get_tabulado_190();

			$texto = ($this->tabulados_model->get_texto(2,$data['opcion'])->num_rows() > 0)  ?  $texto = $this->tabulados_model->get_texto(2,$data['opcion'])->row()->texto  :  '';
			$data['texto'] =  $texto; 
			$texto_2 = ($this->tabulados_model->get_texto(2,$data['opcion'])->num_rows() > 0)  ?  $texto_2 = $this->tabulados_model->get_texto(2,$data['opcion'])->row()->texto_2  :  '';
			$data['texto_2'] =  $texto_2; 

			$metadata = $this->tabulados_model->get_metadata(2,$data['opcion']); 
			$data['txt_tabulado'] 	= ( $metadata->num_rows()==1 )  ?  $metadata->row()->tabulado  :  ''; 
			$data['txt_contenido'] 	= ( $metadata->num_rows()==1 )  ?  $metadata->row()->contenido  :  ''; 
			$data['txt_casos'] 		= ( $metadata->num_rows()==1 )  ?  $metadata->row()->casos  :  ''; 
			$data['txt_variables'] 	= ( $metadata->num_rows()==1 )  ?  $metadata->row()->variable  :  ''; 
			$data['txt_alternativas'] = ( $metadata->num_rows()==1 )  ?  $metadata->row()->alternativas  :  ''; 
			$data['txt_otro'] 		= ( $metadata->num_rows()==1 )  ?  $metadata->row()->otro  :  ''; 
			$data['txt_faltantes'] 	= ( $metadata->num_rows()==1 )  ?  $metadata->row()->faltantes  :  ''; 
			$data['txt_productor'] 	= ( $metadata->num_rows()==1 )  ?  $metadata->row()->productor :  ''; 
			$data['txt_definiciones'] = ( $metadata->num_rows()==1 )  ?  $metadata->row()->definiciones  :  '';	

			$data['main_content'] = 'tabulados/acuicultor/reporte_190_view';

			$this->load->view('backend/includes/template', $data);		
	}

	public function reporte_189()
	{
			$data['restriccion'] = $this->restriccion ;
			$data['nav'] = TRUE;
			$data['title'] = 'Tabulados Acuicultor';	
			$data['nom_tabulados'] = $this->tabulados_model->get_nombre_tabulados();	
			$data['opcion'] = 189;		
			$data['tables'] = $this->acuicultor_model->get_tabulado_191();

			$texto = ($this->tabulados_model->get_texto(2,$data['opcion'])->num_rows() > 0)  ?  $texto = $this->tabulados_model->get_texto(2,$data['opcion'])->row()->texto  :  '';
			$data['texto'] =  $texto; 
			$texto_2 = ($this->tabulados_model->get_texto(2,$data['opcion'])->num_rows() > 0)  ?  $texto_2 = $this->tabulados_model->get_texto(2,$data['opcion'])->row()->texto_2  :  '';
			$data['texto_2'] =  $texto_2; 

			$metadata = $this->tabulados_model->get_metadata(2,$data['opcion']); 
			$data['txt_tabulado'] 	= ( $metadata->num_rows()==1 )  ?  $metadata->row()->tabulado  :  ''; 
			$data['txt_contenido'] 	= ( $metadata->num_rows()==1 )  ?  $metadata->row()->contenido  :  ''; 
			$data['txt_casos'] 		= ( $metadata->num_rows()==1 )  ?  $metadata->row()->casos  :  ''; 
			$data['txt_variables'] 	= ( $metadata->num_rows()==1 )  ?  $metadata->row()->variable  :  ''; 
			$data['txt_alternativas'] = ( $metadata->num_rows()==1 )  ?  $metadata->row()->alternativas  :  ''; 
			$data['txt_otro'] 		= ( $metadata->num_rows()==1 )  ?  $metadata->row()->otro  :  ''; 
			$data['txt_faltantes'] 	= ( $metadata->num_rows()==1 )  ?  $metadata->row()->faltantes  :  ''; 
			$data['txt_productor'] 	= ( $metadata->num_rows()==1 )  ?  $metadata->row()->productor :  ''; 
			$data['txt_definiciones'] = ( $metadata->num_rows()==1 )  ?  $metadata->row()->definiciones  :  '';	

			$data['main_content'] = 'tabulados/acuicultor/reporte_191_view';

			$this->load->view('backend/includes/template', $data);		
	}


	public function reporte_190()
	{
			$data['restriccion'] = $this->restriccion ;
			$data['nav'] = TRUE;
			$data['title'] = 'Tabulados Acuicultor';	
			$data['nom_tabulados'] = $this->tabulados_model->get_nombre_tabulados();	
			$data['opcion'] = 190;		
			$data['tables'] = $this->acuicultor_model->get_tabulado_192();

			$texto = ($this->tabulados_model->get_texto(2,$data['opcion'])->num_rows() > 0)  ?  $texto = $this->tabulados_model->get_texto(2,$data['opcion'])->row()->texto  :  '';
			$data['texto'] =  $texto; 
			$texto_2 = ($this->tabulados_model->get_texto(2,$data['opcion'])->num_rows() > 0)  ?  $texto_2 = $this->tabulados_model->get_texto(2,$data['opcion'])->row()->texto_2  :  '';
			$data['texto_2'] =  $texto_2; 

			$metadata = $this->tabulados_model->get_metadata(2,$data['opcion']); 
			$data['txt_tabulado'] 	= ( $metadata->num_rows()==1 )  ?  $metadata->row()->tabulado  :  ''; 
			$data['txt_contenido'] 	= ( $metadata->num_rows()==1 )  ?  $metadata->row()->contenido  :  ''; 
			$data['txt_casos'] 		= ( $metadata->num_rows()==1 )  ?  $metadata->row()->casos  :  ''; 
			$data['txt_variables'] 	= ( $metadata->num_rows()==1 )  ?  $metadata->row()->variable  :  ''; 
			$data['txt_alternativas'] = ( $metadata->num_rows()==1 )  ?  $metadata->row()->alternativas  :  ''; 
			$data['txt_otro'] 		= ( $metadata->num_rows()==1 )  ?  $metadata->row()->otro  :  ''; 
			$data['txt_faltantes'] 	= ( $metadata->num_rows()==1 )  ?  $metadata->row()->faltantes  :  ''; 
			$data['txt_productor'] 	= ( $metadata->num_rows()==1 )  ?  $metadata->row()->productor :  ''; 
			$data['txt_definiciones'] = ( $metadata->num_rows()==1 )  ?  $metadata->row()->definiciones  :  '';	

			$data['main_content'] = 'tabulados/acuicultor/reporte_192_view';

			$this->load->view('backend/includes/template', $data);		
	}


	public function reporte_191()
	{
			$data['restriccion'] = $this->restriccion ;
			$data['nav'] = TRUE;
			$data['title'] = 'Tabulados Acuicultor';	
			$data['nom_tabulados'] = $this->tabulados_model->get_nombre_tabulados();	
			$data['opcion'] = 191;		
			$data['tables'] = $this->acuicultor_model->get_tabulado_193();

			$texto = ($this->tabulados_model->get_texto(2,$data['opcion'])->num_rows() > 0)  ?  $texto = $this->tabulados_model->get_texto(2,$data['opcion'])->row()->texto  :  '';
			$data['texto'] =  $texto; 
			$texto_2 = ($this->tabulados_model->get_texto(2,$data['opcion'])->num_rows() > 0)  ?  $texto_2 = $this->tabulados_model->get_texto(2,$data['opcion'])->row()->texto_2  :  '';
			$data['texto_2'] =  $texto_2; 

			$metadata = $this->tabulados_model->get_metadata(2,$data['opcion']); 
			$data['txt_tabulado'] 	= ( $metadata->num_rows()==1 )  ?  $metadata->row()->tabulado  :  ''; 
			$data['txt_contenido'] 	= ( $metadata->num_rows()==1 )  ?  $metadata->row()->contenido  :  ''; 
			$data['txt_casos'] 		= ( $metadata->num_rows()==1 )  ?  $metadata->row()->casos  :  ''; 
			$data['txt_variables'] 	= ( $metadata->num_rows()==1 )  ?  $metadata->row()->variable  :  ''; 
			$data['txt_alternativas'] = ( $metadata->num_rows()==1 )  ?  $metadata->row()->alternativas  :  ''; 
			$data['txt_otro'] 		= ( $metadata->num_rows()==1 )  ?  $metadata->row()->otro  :  ''; 
			$data['txt_faltantes'] 	= ( $metadata->num_rows()==1 )  ?  $metadata->row()->faltantes  :  ''; 
			$data['txt_productor'] 	= ( $metadata->num_rows()==1 )  ?  $metadata->row()->productor :  ''; 
			$data['txt_definiciones'] = ( $metadata->num_rows()==1 )  ?  $metadata->row()->definiciones  :  '';	

			$data['main_content'] = 'tabulados/acuicultor/reporte_193_view';

			$this->load->view('backend/includes/template', $data);		
	}


	public function reporte_192()
	{
			$data['restriccion'] = $this->restriccion ;
			$data['nav'] = TRUE;
			$data['title'] = 'Tabulados Acuicultor';	
			$data['nom_tabulados'] = $this->tabulados_model->get_nombre_tabulados();	
			$data['opcion'] = 192;		
			$data['tables'] = $this->acuicultor_model->get_tabulado_194();

			$texto = ($this->tabulados_model->get_texto(2,$data['opcion'])->num_rows() > 0)  ?  $texto = $this->tabulados_model->get_texto(2,$data['opcion'])->row()->texto  :  '';
			$data['texto'] =  $texto; 
			$texto_2 = ($this->tabulados_model->get_texto(2,$data['opcion'])->num_rows() > 0)  ?  $texto_2 = $this->tabulados_model->get_texto(2,$data['opcion'])->row()->texto_2  :  '';
			$data['texto_2'] =  $texto_2; 

			$metadata = $this->tabulados_model->get_metadata(2,$data['opcion']); 
			$data['txt_tabulado'] 	= ( $metadata->num_rows()==1 )  ?  $metadata->row()->tabulado  :  ''; 
			$data['txt_contenido'] 	= ( $metadata->num_rows()==1 )  ?  $metadata->row()->contenido  :  ''; 
			$data['txt_casos'] 		= ( $metadata->num_rows()==1 )  ?  $metadata->row()->casos  :  ''; 
			$data['txt_variables'] 	= ( $metadata->num_rows()==1 )  ?  $metadata->row()->variable  :  ''; 
			$data['txt_alternativas'] = ( $metadata->num_rows()==1 )  ?  $metadata->row()->alternativas  :  ''; 
			$data['txt_otro'] 		= ( $metadata->num_rows()==1 )  ?  $metadata->row()->otro  :  ''; 
			$data['txt_faltantes'] 	= ( $metadata->num_rows()==1 )  ?  $metadata->row()->faltantes  :  ''; 
			$data['txt_productor'] 	= ( $metadata->num_rows()==1 )  ?  $metadata->row()->productor :  ''; 
			$data['txt_definiciones'] = ( $metadata->num_rows()==1 )  ?  $metadata->row()->definiciones  :  '';	

			$data['main_content'] = 'tabulados/acuicultor/reporte_194_view';

			$this->load->view('backend/includes/template', $data);		
	}


	public function reporte_193()
	{
			$data['restriccion'] = $this->restriccion ;
			$data['nav'] = TRUE;
			$data['title'] = 'Tabulados Acuicultor';	
			$data['nom_tabulados'] = $this->tabulados_model->get_nombre_tabulados();	
			$data['opcion'] = 193;		
			$data['tables'] = $this->acuicultor_model->get_tabulado_195();

			$texto = ($this->tabulados_model->get_texto(2,$data['opcion'])->num_rows() > 0)  ?  $texto = $this->tabulados_model->get_texto(2,$data['opcion'])->row()->texto  :  '';
			$data['texto'] =  $texto; 
			$texto_2 = ($this->tabulados_model->get_texto(2,$data['opcion'])->num_rows() > 0)  ?  $texto_2 = $this->tabulados_model->get_texto(2,$data['opcion'])->row()->texto_2  :  '';
			$data['texto_2'] =  $texto_2; 

			$metadata = $this->tabulados_model->get_metadata(2,$data['opcion']); 
			$data['txt_tabulado'] 	= ( $metadata->num_rows()==1 )  ?  $metadata->row()->tabulado  :  ''; 
			$data['txt_contenido'] 	= ( $metadata->num_rows()==1 )  ?  $metadata->row()->contenido  :  ''; 
			$data['txt_casos'] 		= ( $metadata->num_rows()==1 )  ?  $metadata->row()->casos  :  ''; 
			$data['txt_variables'] 	= ( $metadata->num_rows()==1 )  ?  $metadata->row()->variable  :  ''; 
			$data['txt_alternativas'] = ( $metadata->num_rows()==1 )  ?  $metadata->row()->alternativas  :  ''; 
			$data['txt_otro'] 		= ( $metadata->num_rows()==1 )  ?  $metadata->row()->otro  :  ''; 
			$data['txt_faltantes'] 	= ( $metadata->num_rows()==1 )  ?  $metadata->row()->faltantes  :  ''; 
			$data['txt_productor'] 	= ( $metadata->num_rows()==1 )  ?  $metadata->row()->productor :  ''; 
			$data['txt_definiciones'] = ( $metadata->num_rows()==1 )  ?  $metadata->row()->definiciones  :  '';	

			$data['main_content'] = 'tabulados/acuicultor/reporte_195_view';

			$this->load->view('backend/includes/template', $data);		
	}


	public function reporte_194()
	{
			$data['restriccion'] = $this->restriccion ;
			$data['nav'] = TRUE;
			$data['title'] = 'Tabulados Acuicultor';	
			$data['nom_tabulados'] = $this->tabulados_model->get_nombre_tabulados();	
			$data['opcion'] = 194;		
			$data['tables'] = $this->acuicultor_model->get_tabulado_196();

			$texto = ($this->tabulados_model->get_texto(2,$data['opcion'])->num_rows() > 0)  ?  $texto = $this->tabulados_model->get_texto(2,$data['opcion'])->row()->texto  :  '';
			$data['texto'] =  $texto; 
			$texto_2 = ($this->tabulados_model->get_texto(2,$data['opcion'])->num_rows() > 0)  ?  $texto_2 = $this->tabulados_model->get_texto(2,$data['opcion'])->row()->texto_2  :  '';
			$data['texto_2'] =  $texto_2; 

			$metadata = $this->tabulados_model->get_metadata(2,$data['opcion']); 
			$data['txt_tabulado'] 	= ( $metadata->num_rows()==1 )  ?  $metadata->row()->tabulado  :  ''; 
			$data['txt_contenido'] 	= ( $metadata->num_rows()==1 )  ?  $metadata->row()->contenido  :  ''; 
			$data['txt_casos'] 		= ( $metadata->num_rows()==1 )  ?  $metadata->row()->casos  :  ''; 
			$data['txt_variables'] 	= ( $metadata->num_rows()==1 )  ?  $metadata->row()->variable  :  ''; 
			$data['txt_alternativas'] = ( $metadata->num_rows()==1 )  ?  $metadata->row()->alternativas  :  ''; 
			$data['txt_otro'] 		= ( $metadata->num_rows()==1 )  ?  $metadata->row()->otro  :  ''; 
			$data['txt_faltantes'] 	= ( $metadata->num_rows()==1 )  ?  $metadata->row()->faltantes  :  ''; 
			$data['txt_productor'] 	= ( $metadata->num_rows()==1 )  ?  $metadata->row()->productor :  ''; 
			$data['txt_definiciones'] = ( $metadata->num_rows()==1 )  ?  $metadata->row()->definiciones  :  '';	

			$data['main_content'] = 'tabulados/acuicultor/reporte_196_view';

			$this->load->view('backend/includes/template', $data);		
	}


	public function reporte_195()
	{
			$data['restriccion'] = $this->restriccion ;
			$data['nav'] = TRUE;
			$data['title'] = 'Tabulados Acuicultor';	
			$data['nom_tabulados'] = $this->tabulados_model->get_nombre_tabulados();	
			$data['opcion'] = 195;		
			$data['tables'] = $this->acuicultor_model->get_tabulado_197();

			$texto = ($this->tabulados_model->get_texto(2,$data['opcion'])->num_rows() > 0)  ?  $texto = $this->tabulados_model->get_texto(2,$data['opcion'])->row()->texto  :  '';
			$data['texto'] =  $texto; 
			$texto_2 = ($this->tabulados_model->get_texto(2,$data['opcion'])->num_rows() > 0)  ?  $texto_2 = $this->tabulados_model->get_texto(2,$data['opcion'])->row()->texto_2  :  '';
			$data['texto_2'] =  $texto_2; 

			$metadata = $this->tabulados_model->get_metadata(2,$data['opcion']); 
			$data['txt_tabulado'] 	= ( $metadata->num_rows()==1 )  ?  $metadata->row()->tabulado  :  ''; 
			$data['txt_contenido'] 	= ( $metadata->num_rows()==1 )  ?  $metadata->row()->contenido  :  ''; 
			$data['txt_casos'] 		= ( $metadata->num_rows()==1 )  ?  $metadata->row()->casos  :  ''; 
			$data['txt_variables'] 	= ( $metadata->num_rows()==1 )  ?  $metadata->row()->variable  :  ''; 
			$data['txt_alternativas'] = ( $metadata->num_rows()==1 )  ?  $metadata->row()->alternativas  :  ''; 
			$data['txt_otro'] 		= ( $metadata->num_rows()==1 )  ?  $metadata->row()->otro  :  ''; 
			$data['txt_faltantes'] 	= ( $metadata->num_rows()==1 )  ?  $metadata->row()->faltantes  :  ''; 
			$data['txt_productor'] 	= ( $metadata->num_rows()==1 )  ?  $metadata->row()->productor :  ''; 
			$data['txt_definiciones'] = ( $metadata->num_rows()==1 )  ?  $metadata->row()->definiciones  :  '';	

			$data['main_content'] = 'tabulados/acuicultor/reporte_197_view';

			$this->load->view('backend/includes/template', $data);		
	}


	public function reporte_196()
	{
			$data['restriccion'] = $this->restriccion ;
			$data['nav'] = TRUE;
			$data['title'] = 'Tabulados Acuicultor';	
			$data['nom_tabulados'] = $this->tabulados_model->get_nombre_tabulados();	
			$data['opcion'] = 196;		
			$data['tables'] = $this->acuicultor_model->get_tabulado_198();

			$texto = ($this->tabulados_model->get_texto(2,$data['opcion'])->num_rows() > 0)  ?  $texto = $this->tabulados_model->get_texto(2,$data['opcion'])->row()->texto  :  '';
			$data['texto'] =  $texto; 
			$texto_2 = ($this->tabulados_model->get_texto(2,$data['opcion'])->num_rows() > 0)  ?  $texto_2 = $this->tabulados_model->get_texto(2,$data['opcion'])->row()->texto_2  :  '';
			$data['texto_2'] =  $texto_2; 

			$metadata = $this->tabulados_model->get_metadata(2,$data['opcion']); 
			$data['txt_tabulado'] 	= ( $metadata->num_rows()==1 )  ?  $metadata->row()->tabulado  :  ''; 
			$data['txt_contenido'] 	= ( $metadata->num_rows()==1 )  ?  $metadata->row()->contenido  :  ''; 
			$data['txt_casos'] 		= ( $metadata->num_rows()==1 )  ?  $metadata->row()->casos  :  ''; 
			$data['txt_variables'] 	= ( $metadata->num_rows()==1 )  ?  $metadata->row()->variable  :  ''; 
			$data['txt_alternativas'] = ( $metadata->num_rows()==1 )  ?  $metadata->row()->alternativas  :  ''; 
			$data['txt_otro'] 		= ( $metadata->num_rows()==1 )  ?  $metadata->row()->otro  :  ''; 
			$data['txt_faltantes'] 	= ( $metadata->num_rows()==1 )  ?  $metadata->row()->faltantes  :  ''; 
			$data['txt_productor'] 	= ( $metadata->num_rows()==1 )  ?  $metadata->row()->productor :  ''; 
			$data['txt_definiciones'] = ( $metadata->num_rows()==1 )  ?  $metadata->row()->definiciones  :  '';	

			$data['main_content'] = 'tabulados/acuicultor/reporte_198_view';

			$this->load->view('backend/includes/template', $data);		
	}


	public function reporte_197()
	{
			$data['restriccion'] = $this->restriccion ;
			$data['nav'] = TRUE;
			$data['title'] = 'Tabulados Acuicultor';	
			$data['nom_tabulados'] = $this->tabulados_model->get_nombre_tabulados();	
			$data['opcion'] = 197;		
			$data['tables'] = $this->acuicultor_model->get_tabulado_199();

			$texto = ($this->tabulados_model->get_texto(2,$data['opcion'])->num_rows() > 0)  ?  $texto = $this->tabulados_model->get_texto(2,$data['opcion'])->row()->texto  :  '';
			$data['texto'] =  $texto; 
			$texto_2 = ($this->tabulados_model->get_texto(2,$data['opcion'])->num_rows() > 0)  ?  $texto_2 = $this->tabulados_model->get_texto(2,$data['opcion'])->row()->texto_2  :  '';
			$data['texto_2'] =  $texto_2; 

			$metadata = $this->tabulados_model->get_metadata(2,$data['opcion']); 
			$data['txt_tabulado'] 	= ( $metadata->num_rows()==1 )  ?  $metadata->row()->tabulado  :  ''; 
			$data['txt_contenido'] 	= ( $metadata->num_rows()==1 )  ?  $metadata->row()->contenido  :  ''; 
			$data['txt_casos'] 		= ( $metadata->num_rows()==1 )  ?  $metadata->row()->casos  :  ''; 
			$data['txt_variables'] 	= ( $metadata->num_rows()==1 )  ?  $metadata->row()->variable  :  ''; 
			$data['txt_alternativas'] = ( $metadata->num_rows()==1 )  ?  $metadata->row()->alternativas  :  ''; 
			$data['txt_otro'] 		= ( $metadata->num_rows()==1 )  ?  $metadata->row()->otro  :  ''; 
			$data['txt_faltantes'] 	= ( $metadata->num_rows()==1 )  ?  $metadata->row()->faltantes  :  ''; 
			$data['txt_productor'] 	= ( $metadata->num_rows()==1 )  ?  $metadata->row()->productor :  ''; 
			$data['txt_definiciones'] = ( $metadata->num_rows()==1 )  ?  $metadata->row()->definiciones  :  '';	

			$data['main_content'] = 'tabulados/acuicultor/reporte_199_view';

			$this->load->view('backend/includes/template', $data);		
	}






	public function reporte_num($op)
	{
			$data['restriccion'] = $this->restriccion ;
			//$data['nav'] = TRUE;
			$data['title'] = 'Tabulados Acuicultor';	
			$data['nom_tabulados'] = $this->tabulados_model->get_nombre_tabulados();	
			$data['opcion'] = $op;	
			$get_tabulado = 'get_tabulado_'. $op . '()';	
			$data['tables'] = $this->acuicultor_model->get_tabulado.$op.'()';

			$texto = ($this->tabulados_model->get_texto(2,$data['opcion'])->num_rows() > 0)  ?  $texto = $this->tabulados_model->get_texto(2,$data['opcion'])->row()->texto  :  '';
			$data['texto'] =  $texto; 
			$texto_2 = ($this->tabulados_model->get_texto(2,$data['opcion'])->num_rows() > 0)  ?  $texto_2 = $this->tabulados_model->get_texto(2,$data['opcion'])->row()->texto_2  :  '';
			$data['texto_2'] =  $texto_2; 

			$metadata = $this->tabulados_model->get_metadata(2,$data['opcion']); 
			$data['txt_tabulado'] 	= ( $metadata->num_rows()==1 )  ?  $metadata->row()->tabulado  :  ''; 
			$data['txt_contenido'] 	= ( $metadata->num_rows()==1 )  ?  $metadata->row()->contenido  :  ''; 
			$data['txt_casos'] 		= ( $metadata->num_rows()==1 )  ?  $metadata->row()->casos  :  ''; 
			$data['txt_variables'] 	= ( $metadata->num_rows()==1 )  ?  $metadata->row()->variable  :  ''; 
			$data['txt_alternativas'] = ( $metadata->num_rows()==1 )  ?  $metadata->row()->alternativas  :  ''; 
			$data['txt_otro'] 		= ( $metadata->num_rows()==1 )  ?  $metadata->row()->otro  :  ''; 
			$data['txt_faltantes'] 	= ( $metadata->num_rows()==1 )  ?  $metadata->row()->faltantes  :  ''; 
			$data['txt_productor'] 	= ( $metadata->num_rows()==1 )  ?  $metadata->row()->productor :  ''; 
			$data['txt_definiciones'] = ( $metadata->num_rows()==1 )  ?  $metadata->row()->definiciones  :  '';	

			$data['main_content'] = 'tabulados/acuicultor/reporte_'. $op .'_view';

			$this->load->view('backend/includes/template', $data);		
	}


}
