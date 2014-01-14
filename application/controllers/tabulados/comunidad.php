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

		//restriccion en los comentarios por usuario
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
			if( $this->tabulados_model->get_texto(3,$preg)->num_rows() == 1 ){
					$c_data['user_id'] = $this->tank_auth->get_user_id();
					$c_data['texto'] = $texto;
					$c_data['texto_2'] = $texto_2;
				$this->tabulados_model->update_texto(3,$preg,$c_data);	
			}else{
					$c_data['user_id'] = $this->tank_auth->get_user_id();
					$c_data['tipo'] = 3;
					$c_data['pregunta'] = $preg;
					$c_data['texto'] = $texto;
					$c_data['texto_2'] = $texto_2;
				$this->tabulados_model->insert_texto($c_data);	
			}
		}else{
			show_404();
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
			if( $this->tabulados_model->get_metadata(3,$preg)->num_rows() == 1 ){
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
				 echo $this->tabulados_model->update_metadata(3,$preg,$c_data);	
				 
			}else{//inserta nuevo
					$c_data['tipo'] 		= 3;
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
				echo $this->tabulados_model->insert_metadata($c_data);	
			}
		}else{
			show_404();;
		}			
	}

	public function reporte_198()
	{
			$data['restriccion'] = $this->restriccion;	
			$data['nav'] = TRUE;
			$data['title'] = 'Tabulados Comunidad';	
			$data['nom_tabulados'] = $this->tabulados_model->get_nombre_tabulados();	
			$data['opcion'] = 198;		
			$data['tables'] = $this->comunidad_model->get_tabulado_200();
			$texto = ($this->tabulados_model->get_texto(3,$data['opcion'])->num_rows() > 0)  ?  $texto = $this->tabulados_model->get_texto(3,$data['opcion'])->row()->texto  :  '';
			$data['texto'] =  $texto; 
			$texto_2 = ($this->tabulados_model->get_texto(3,$data['opcion'])->num_rows() > 0)  ?  $texto_2 = $this->tabulados_model->get_texto(3,$data['opcion'])->row()->texto_2  :  '';
			$data['texto_2'] =  $texto_2; 		

			$metadata = $this->tabulados_model->get_metadata(3,$data['opcion']); 
			$data['txt_tabulado'] 	= ( $metadata->num_rows()==1 )  ?  $metadata->row()->tabulado  :  ''; 
			$data['txt_contenido'] 	= ( $metadata->num_rows()==1 )  ?  $metadata->row()->contenido  :  ''; 
			$data['txt_casos'] 		= ( $metadata->num_rows()==1 )  ?  $metadata->row()->casos  :  ''; 
			$data['txt_variables'] 	= ( $metadata->num_rows()==1 )  ?  $metadata->row()->variable  :  ''; 
			$data['txt_alternativas'] = ( $metadata->num_rows()==1 )  ?  $metadata->row()->alternativas  :  ''; 
			$data['txt_otro'] 		= ( $metadata->num_rows()==1 )  ?  $metadata->row()->otro  :  ''; 
			$data['txt_faltantes'] 	= ( $metadata->num_rows()==1 )  ?  $metadata->row()->faltantes  :  ''; 
			$data['txt_productor'] 	= ( $metadata->num_rows()==1 )  ?  $metadata->row()->productor :  ''; 
			$data['txt_definiciones'] = ( $metadata->num_rows()==1 )  ?  $metadata->row()->definiciones  :  '';

			$data['main_content'] = 'tabulados/comunidad/reporte_200_view';

			$this->load->view('backend/includes/template', $data);		
	}

	public function reporte_199()
	{	
			$data['restriccion'] = $this->restriccion;
			$data['nav'] = TRUE;
			$data['title'] = 'Tabulados Comunidad';	
			$data['nom_tabulados'] = $this->tabulados_model->get_nombre_tabulados();	
			$data['opcion'] = 199;		
			$data['tables'] = $this->comunidad_model->get_tabulado_201();
			$texto = ($this->tabulados_model->get_texto(3,$data['opcion'])->num_rows() > 0)  ?  $texto = $this->tabulados_model->get_texto(3,$data['opcion'])->row()->texto  :  '';
			$data['texto'] =  $texto; 
			$texto_2 = ($this->tabulados_model->get_texto(3,$data['opcion'])->num_rows() > 0)  ?  $texto_2 = $this->tabulados_model->get_texto(3,$data['opcion'])->row()->texto_2  :  '';
			$data['texto_2'] =  $texto_2; 		 		

			$metadata = $this->tabulados_model->get_metadata(3,$data['opcion']); 
			$data['txt_tabulado'] 	= ( $metadata->num_rows()==1 )  ?  $metadata->row()->tabulado  :  ''; 
			$data['txt_contenido'] 	= ( $metadata->num_rows()==1 )  ?  $metadata->row()->contenido  :  ''; 
			$data['txt_casos'] 		= ( $metadata->num_rows()==1 )  ?  $metadata->row()->casos  :  ''; 
			$data['txt_variables'] 	= ( $metadata->num_rows()==1 )  ?  $metadata->row()->variable  :  ''; 
			$data['txt_alternativas'] = ( $metadata->num_rows()==1 )  ?  $metadata->row()->alternativas  :  ''; 
			$data['txt_otro'] 		= ( $metadata->num_rows()==1 )  ?  $metadata->row()->otro  :  ''; 
			$data['txt_faltantes'] 	= ( $metadata->num_rows()==1 )  ?  $metadata->row()->faltantes  :  ''; 
			$data['txt_productor'] 	= ( $metadata->num_rows()==1 )  ?  $metadata->row()->productor :  ''; 
			$data['txt_definiciones'] = ( $metadata->num_rows()==1 )  ?  $metadata->row()->definiciones  :  '';
	
			$data['main_content'] = 'tabulados/comunidad/reporte_201_view';

			$this->load->view('backend/includes/template', $data);		
	}


	public function reporte_200()
	{
			$data['restriccion'] = $this->restriccion;			
			$data['nav'] = TRUE;
			$data['title'] = 'Tabulados Comunidad';	
			$data['nom_tabulados'] = $this->tabulados_model->get_nombre_tabulados();	
			$data['opcion'] = 200;		
			$data['tables'] = $this->comunidad_model->get_tabulado_202();
			$texto = ($this->tabulados_model->get_texto(3,$data['opcion'])->num_rows() > 0)  ?  $texto = $this->tabulados_model->get_texto(3,$data['opcion'])->row()->texto  :  '';
			$data['texto'] =  $texto; 
			$texto_2 = ($this->tabulados_model->get_texto(3,$data['opcion'])->num_rows() > 0)  ?  $texto_2 = $this->tabulados_model->get_texto(3,$data['opcion'])->row()->texto_2  :  '';
			$data['texto_2'] =  $texto_2;  		

			$metadata = $this->tabulados_model->get_metadata(3,$data['opcion']); 
			$data['txt_tabulado'] 	= ( $metadata->num_rows()==1 )  ?  $metadata->row()->tabulado  :  ''; 
			$data['txt_contenido'] 	= ( $metadata->num_rows()==1 )  ?  $metadata->row()->contenido  :  ''; 
			$data['txt_casos'] 		= ( $metadata->num_rows()==1 )  ?  $metadata->row()->casos  :  ''; 
			$data['txt_variables'] 	= ( $metadata->num_rows()==1 )  ?  $metadata->row()->variable  :  ''; 
			$data['txt_alternativas'] = ( $metadata->num_rows()==1 )  ?  $metadata->row()->alternativas  :  ''; 
			$data['txt_otro'] 		= ( $metadata->num_rows()==1 )  ?  $metadata->row()->otro  :  ''; 
			$data['txt_faltantes'] 	= ( $metadata->num_rows()==1 )  ?  $metadata->row()->faltantes  :  ''; 
			$data['txt_productor'] 	= ( $metadata->num_rows()==1 )  ?  $metadata->row()->productor :  ''; 
			$data['txt_definiciones'] = ( $metadata->num_rows()==1 )  ?  $metadata->row()->definiciones  :  '';
			
			$data['main_content'] = 'tabulados/comunidad/reporte_202_view';

			$this->load->view('backend/includes/template', $data);		
	}

	public function reporte_201()
	{
			$data['restriccion'] = $this->restriccion;		
			$data['nav'] = TRUE;
			$data['title'] = 'Tabulados Comunidad';	
			$data['nom_tabulados'] = $this->tabulados_model->get_nombre_tabulados();	
			$data['opcion'] = 201;		
			$data['tables'] = $this->comunidad_model->get_tabulado_203();
			$texto = ($this->tabulados_model->get_texto(3,$data['opcion'])->num_rows() > 0)  ?  $texto = $this->tabulados_model->get_texto(3,$data['opcion'])->row()->texto  :  '';
			$data['texto'] =  $texto; 
			$texto_2 = ($this->tabulados_model->get_texto(3,$data['opcion'])->num_rows() > 0)  ?  $texto_2 = $this->tabulados_model->get_texto(3,$data['opcion'])->row()->texto_2  :  '';
			$data['texto_2'] =  $texto_2; 	 		

			$metadata = $this->tabulados_model->get_metadata(3,$data['opcion']); 
			$data['txt_tabulado'] 	= ( $metadata->num_rows()==1 )  ?  $metadata->row()->tabulado  :  ''; 
			$data['txt_contenido'] 	= ( $metadata->num_rows()==1 )  ?  $metadata->row()->contenido  :  ''; 
			$data['txt_casos'] 		= ( $metadata->num_rows()==1 )  ?  $metadata->row()->casos  :  ''; 
			$data['txt_variables'] 	= ( $metadata->num_rows()==1 )  ?  $metadata->row()->variable  :  ''; 
			$data['txt_alternativas'] = ( $metadata->num_rows()==1 )  ?  $metadata->row()->alternativas  :  ''; 
			$data['txt_otro'] 		= ( $metadata->num_rows()==1 )  ?  $metadata->row()->otro  :  ''; 
			$data['txt_faltantes'] 	= ( $metadata->num_rows()==1 )  ?  $metadata->row()->faltantes  :  ''; 
			$data['txt_productor'] 	= ( $metadata->num_rows()==1 )  ?  $metadata->row()->productor :  ''; 
			$data['txt_definiciones'] = ( $metadata->num_rows()==1 )  ?  $metadata->row()->definiciones  :  '';
		
			$data['main_content'] = 'tabulados/comunidad/reporte_203_view';

			$this->load->view('backend/includes/template', $data);		
	}

	public function reporte_202()
	{
			$data['restriccion'] = $this->restriccion;	
			$data['nav'] = TRUE;
			$data['title'] = 'Tabulados Comunidad';	
			$data['nom_tabulados'] = $this->tabulados_model->get_nombre_tabulados();	
			$data['opcion'] = 202;		
			$data['tables'] = $this->comunidad_model->get_tabulado_204();
			$texto = ($this->tabulados_model->get_texto(3,$data['opcion'])->num_rows() > 0)  ?  $texto = $this->tabulados_model->get_texto(3,$data['opcion'])->row()->texto  :  '';
			$data['texto'] =  $texto; 
			$texto_2 = ($this->tabulados_model->get_texto(3,$data['opcion'])->num_rows() > 0)  ?  $texto_2 = $this->tabulados_model->get_texto(3,$data['opcion'])->row()->texto_2  :  '';
			$data['texto_2'] =  $texto_2;  		

			$metadata = $this->tabulados_model->get_metadata(3,$data['opcion']); 
			$data['txt_tabulado'] 	= ( $metadata->num_rows()==1 )  ?  $metadata->row()->tabulado  :  ''; 
			$data['txt_contenido'] 	= ( $metadata->num_rows()==1 )  ?  $metadata->row()->contenido  :  ''; 
			$data['txt_casos'] 		= ( $metadata->num_rows()==1 )  ?  $metadata->row()->casos  :  ''; 
			$data['txt_variables'] 	= ( $metadata->num_rows()==1 )  ?  $metadata->row()->variable  :  ''; 
			$data['txt_alternativas'] = ( $metadata->num_rows()==1 )  ?  $metadata->row()->alternativas  :  ''; 
			$data['txt_otro'] 		= ( $metadata->num_rows()==1 )  ?  $metadata->row()->otro  :  ''; 
			$data['txt_faltantes'] 	= ( $metadata->num_rows()==1 )  ?  $metadata->row()->faltantes  :  ''; 
			$data['txt_productor'] 	= ( $metadata->num_rows()==1 )  ?  $metadata->row()->productor :  ''; 
			$data['txt_definiciones'] = ( $metadata->num_rows()==1 )  ?  $metadata->row()->definiciones  :  '';
			
			$data['main_content'] = 'tabulados/comunidad/reporte_204_view';

			$this->load->view('backend/includes/template', $data);		
	}

	public function reporte_203()
	{
			$data['restriccion'] = $this->restriccion;		
			$data['nav'] = TRUE;
			$data['title'] = 'Tabulados Comunidad';	
			$data['nom_tabulados'] = $this->tabulados_model->get_nombre_tabulados();	
			$data['opcion'] = 203;		
			$data['tables'] = $this->comunidad_model->get_tabulado_205();
			$texto = ($this->tabulados_model->get_texto(3,$data['opcion'])->num_rows() > 0)  ?  $texto = $this->tabulados_model->get_texto(3,$data['opcion'])->row()->texto  :  '';
			$data['texto'] =  $texto; 
			$texto_2 = ($this->tabulados_model->get_texto(3,$data['opcion'])->num_rows() > 0)  ?  $texto_2 = $this->tabulados_model->get_texto(3,$data['opcion'])->row()->texto_2  :  '';
			$data['texto_2'] =  $texto_2; 		

			$metadata = $this->tabulados_model->get_metadata(3,$data['opcion']); 
			$data['txt_tabulado'] 	= ( $metadata->num_rows()==1 )  ?  $metadata->row()->tabulado  :  ''; 
			$data['txt_contenido'] 	= ( $metadata->num_rows()==1 )  ?  $metadata->row()->contenido  :  ''; 
			$data['txt_casos'] 		= ( $metadata->num_rows()==1 )  ?  $metadata->row()->casos  :  ''; 
			$data['txt_variables'] 	= ( $metadata->num_rows()==1 )  ?  $metadata->row()->variable  :  ''; 
			$data['txt_alternativas'] = ( $metadata->num_rows()==1 )  ?  $metadata->row()->alternativas  :  ''; 
			$data['txt_otro'] 		= ( $metadata->num_rows()==1 )  ?  $metadata->row()->otro  :  ''; 
			$data['txt_faltantes'] 	= ( $metadata->num_rows()==1 )  ?  $metadata->row()->faltantes  :  ''; 
			$data['txt_productor'] 	= ( $metadata->num_rows()==1 )  ?  $metadata->row()->productor :  ''; 
			$data['txt_definiciones'] = ( $metadata->num_rows()==1 )  ?  $metadata->row()->definiciones  :  '';
 			
			$data['main_content'] = 'tabulados/comunidad/reporte_205_view';

			$this->load->view('backend/includes/template', $data);		
	}


	public function reporte_204()
	{
			$data['restriccion'] = $this->restriccion;	
			$data['nav'] = TRUE;
			$data['title'] = 'Tabulados Comunidad';	
			$data['nom_tabulados'] = $this->tabulados_model->get_nombre_tabulados();	
			$data['opcion'] = 204;		
			$data['tables'] = $this->comunidad_model->get_tabulado_206();
			$texto = ($this->tabulados_model->get_texto(3,$data['opcion'])->num_rows() > 0)  ?  $texto = $this->tabulados_model->get_texto(3,$data['opcion'])->row()->texto  :  '';
			$data['texto'] =  $texto; 
			$texto_2 = ($this->tabulados_model->get_texto(3,$data['opcion'])->num_rows() > 0)  ?  $texto_2 = $this->tabulados_model->get_texto(3,$data['opcion'])->row()->texto_2  :  '';
			$data['texto_2'] =  $texto_2;  		

			$metadata = $this->tabulados_model->get_metadata(3,$data['opcion']); 
			$data['txt_tabulado'] 	= ( $metadata->num_rows()==1 )  ?  $metadata->row()->tabulado  :  ''; 
			$data['txt_contenido'] 	= ( $metadata->num_rows()==1 )  ?  $metadata->row()->contenido  :  ''; 
			$data['txt_casos'] 		= ( $metadata->num_rows()==1 )  ?  $metadata->row()->casos  :  ''; 
			$data['txt_variables'] 	= ( $metadata->num_rows()==1 )  ?  $metadata->row()->variable  :  ''; 
			$data['txt_alternativas'] = ( $metadata->num_rows()==1 )  ?  $metadata->row()->alternativas  :  ''; 
			$data['txt_otro'] 		= ( $metadata->num_rows()==1 )  ?  $metadata->row()->otro  :  ''; 
			$data['txt_faltantes'] 	= ( $metadata->num_rows()==1 )  ?  $metadata->row()->faltantes  :  ''; 
			$data['txt_productor'] 	= ( $metadata->num_rows()==1 )  ?  $metadata->row()->productor :  ''; 
			$data['txt_definiciones'] = ( $metadata->num_rows()==1 )  ?  $metadata->row()->definiciones  :  '';
			
			$data['main_content'] = 'tabulados/comunidad/reporte_206_view';

			$this->load->view('backend/includes/template', $data);		
	}
	public function reporte_205()
	{
			$data['restriccion'] = $this->restriccion;		
			$data['nav'] = TRUE;
			$data['title'] = 'Tabulados Comunidad';	
			$data['nom_tabulados'] = $this->tabulados_model->get_nombre_tabulados();	
			$data['opcion'] = 205;		
			$data['tables'] = $this->comunidad_model->get_tabulado_207();
			$texto = ($this->tabulados_model->get_texto(3,$data['opcion'])->num_rows() > 0)  ?  $texto = $this->tabulados_model->get_texto(3,$data['opcion'])->row()->texto  :  '';
			$data['texto'] =  $texto; 
			$texto_2 = ($this->tabulados_model->get_texto(3,$data['opcion'])->num_rows() > 0)  ?  $texto_2 = $this->tabulados_model->get_texto(3,$data['opcion'])->row()->texto_2  :  '';
			$data['texto_2'] =  $texto_2;  		

			$metadata = $this->tabulados_model->get_metadata(3,$data['opcion']); 
			$data['txt_tabulado'] 	= ( $metadata->num_rows()==1 )  ?  $metadata->row()->tabulado  :  ''; 
			$data['txt_contenido'] 	= ( $metadata->num_rows()==1 )  ?  $metadata->row()->contenido  :  ''; 
			$data['txt_casos'] 		= ( $metadata->num_rows()==1 )  ?  $metadata->row()->casos  :  ''; 
			$data['txt_variables'] 	= ( $metadata->num_rows()==1 )  ?  $metadata->row()->variable  :  ''; 
			$data['txt_alternativas'] = ( $metadata->num_rows()==1 )  ?  $metadata->row()->alternativas  :  ''; 
			$data['txt_otro'] 		= ( $metadata->num_rows()==1 )  ?  $metadata->row()->otro  :  ''; 
			$data['txt_faltantes'] 	= ( $metadata->num_rows()==1 )  ?  $metadata->row()->faltantes  :  ''; 
			$data['txt_productor'] 	= ( $metadata->num_rows()==1 )  ?  $metadata->row()->productor :  ''; 
			$data['txt_definiciones'] = ( $metadata->num_rows()==1 )  ?  $metadata->row()->definiciones  :  '';
			
			$data['main_content'] = 'tabulados/comunidad/reporte_207_view';

			$this->load->view('backend/includes/template', $data);		
	}
	public function reporte_206()
	{
			$data['restriccion'] = $this->restriccion;	
			$data['nav'] = TRUE;
			$data['title'] = 'Tabulados Comunidad';	
			$data['nom_tabulados'] = $this->tabulados_model->get_nombre_tabulados();	
			$data['opcion'] = 206;		
			$data['tables'] = $this->comunidad_model->get_tabulado_208();
			$texto = ($this->tabulados_model->get_texto(3,$data['opcion'])->num_rows() > 0)  ?  $texto = $this->tabulados_model->get_texto(3,$data['opcion'])->row()->texto  :  '';
			$data['texto'] =  $texto; 
			$texto_2 = ($this->tabulados_model->get_texto(3,$data['opcion'])->num_rows() > 0)  ?  $texto_2 = $this->tabulados_model->get_texto(3,$data['opcion'])->row()->texto_2  :  '';
			$data['texto_2'] =  $texto_2; 	 		

			$metadata = $this->tabulados_model->get_metadata(3,$data['opcion']); 
			$data['txt_tabulado'] 	= ( $metadata->num_rows()==1 )  ?  $metadata->row()->tabulado  :  ''; 
			$data['txt_contenido'] 	= ( $metadata->num_rows()==1 )  ?  $metadata->row()->contenido  :  ''; 
			$data['txt_casos'] 		= ( $metadata->num_rows()==1 )  ?  $metadata->row()->casos  :  ''; 
			$data['txt_variables'] 	= ( $metadata->num_rows()==1 )  ?  $metadata->row()->variable  :  ''; 
			$data['txt_alternativas'] = ( $metadata->num_rows()==1 )  ?  $metadata->row()->alternativas  :  ''; 
			$data['txt_otro'] 		= ( $metadata->num_rows()==1 )  ?  $metadata->row()->otro  :  ''; 
			$data['txt_faltantes'] 	= ( $metadata->num_rows()==1 )  ?  $metadata->row()->faltantes  :  ''; 
			$data['txt_productor'] 	= ( $metadata->num_rows()==1 )  ?  $metadata->row()->productor :  ''; 
			$data['txt_definiciones'] = ( $metadata->num_rows()==1 )  ?  $metadata->row()->definiciones  :  '';
		
			$data['main_content'] = 'tabulados/comunidad/reporte_208_view';

			$this->load->view('backend/includes/template', $data);		
	}	
	public function reporte_207()
	{
			$data['restriccion'] = $this->restriccion;	
			$data['nav'] = TRUE;
			$data['title'] = 'Tabulados Comunidad';	
			$data['nom_tabulados'] = $this->tabulados_model->get_nombre_tabulados();	
			$data['opcion'] = 207;		
			$data['tables'] = $this->comunidad_model->get_tabulado_209();
			$texto = ($this->tabulados_model->get_texto(3,$data['opcion'])->num_rows() > 0)  ?  $texto = $this->tabulados_model->get_texto(3,$data['opcion'])->row()->texto  :  '';
			$data['texto'] =  $texto; 
			$texto_2 = ($this->tabulados_model->get_texto(3,$data['opcion'])->num_rows() > 0)  ?  $texto_2 = $this->tabulados_model->get_texto(3,$data['opcion'])->row()->texto_2  :  '';
			$data['texto_2'] =  $texto_2; 	 		

			$metadata = $this->tabulados_model->get_metadata(3,$data['opcion']); 
			$data['txt_tabulado'] 	= ( $metadata->num_rows()==1 )  ?  $metadata->row()->tabulado  :  ''; 
			$data['txt_contenido'] 	= ( $metadata->num_rows()==1 )  ?  $metadata->row()->contenido  :  ''; 
			$data['txt_casos'] 		= ( $metadata->num_rows()==1 )  ?  $metadata->row()->casos  :  ''; 
			$data['txt_variables'] 	= ( $metadata->num_rows()==1 )  ?  $metadata->row()->variable  :  ''; 
			$data['txt_alternativas'] = ( $metadata->num_rows()==1 )  ?  $metadata->row()->alternativas  :  ''; 
			$data['txt_otro'] 		= ( $metadata->num_rows()==1 )  ?  $metadata->row()->otro  :  ''; 
			$data['txt_faltantes'] 	= ( $metadata->num_rows()==1 )  ?  $metadata->row()->faltantes  :  ''; 
			$data['txt_productor'] 	= ( $metadata->num_rows()==1 )  ?  $metadata->row()->productor :  ''; 
			$data['txt_definiciones'] = ( $metadata->num_rows()==1 )  ?  $metadata->row()->definiciones  :  '';
		
			$data['main_content'] = 'tabulados/comunidad/reporte_209_view';

			$this->load->view('backend/includes/template', $data);		
	}		

	public function reporte_208()
	{
			$data['restriccion'] = $this->restriccion;		
			$data['nav'] = TRUE;
			$data['title'] = 'Tabulados Comunidad';	
			$data['nom_tabulados'] = $this->tabulados_model->get_nombre_tabulados();	
			$data['opcion'] = 208;		
			$data['tables'] = $this->comunidad_model->get_tabulado_210();
			$texto = ($this->tabulados_model->get_texto(3,$data['opcion'])->num_rows() > 0)  ?  $texto = $this->tabulados_model->get_texto(3,$data['opcion'])->row()->texto  :  '';
			$data['texto'] =  $texto; 
			$texto_2 = ($this->tabulados_model->get_texto(3,$data['opcion'])->num_rows() > 0)  ?  $texto_2 = $this->tabulados_model->get_texto(3,$data['opcion'])->row()->texto_2  :  '';
			$data['texto_2'] =  $texto_2;  		

			$metadata = $this->tabulados_model->get_metadata(3,$data['opcion']); 
			$data['txt_tabulado'] 	= ( $metadata->num_rows()==1 )  ?  $metadata->row()->tabulado  :  ''; 
			$data['txt_contenido'] 	= ( $metadata->num_rows()==1 )  ?  $metadata->row()->contenido  :  ''; 
			$data['txt_casos'] 		= ( $metadata->num_rows()==1 )  ?  $metadata->row()->casos  :  ''; 
			$data['txt_variables'] 	= ( $metadata->num_rows()==1 )  ?  $metadata->row()->variable  :  ''; 
			$data['txt_alternativas'] = ( $metadata->num_rows()==1 )  ?  $metadata->row()->alternativas  :  ''; 
			$data['txt_otro'] 		= ( $metadata->num_rows()==1 )  ?  $metadata->row()->otro  :  ''; 
			$data['txt_faltantes'] 	= ( $metadata->num_rows()==1 )  ?  $metadata->row()->faltantes  :  ''; 
			$data['txt_productor'] 	= ( $metadata->num_rows()==1 )  ?  $metadata->row()->productor :  ''; 
			$data['txt_definiciones'] = ( $metadata->num_rows()==1 )  ?  $metadata->row()->definiciones  :  '';
			
			$data['main_content'] = 'tabulados/comunidad/reporte_210_view';

			$this->load->view('backend/includes/template', $data);		
	}

	public function reporte_209()
	{
			$data['restriccion'] = $this->restriccion;	
			$data['nav'] = TRUE;
			$data['title'] = 'Tabulados Comunidad';	
			$data['nom_tabulados'] = $this->tabulados_model->get_nombre_tabulados();	
			$data['opcion'] = 209;		
			$data['tables'] = $this->comunidad_model->get_tabulado_211();
			$texto = ($this->tabulados_model->get_texto(3,$data['opcion'])->num_rows() > 0)  ?  $texto = $this->tabulados_model->get_texto(3,$data['opcion'])->row()->texto  :  '';
			$data['texto'] =  $texto; 
			$texto_2 = ($this->tabulados_model->get_texto(3,$data['opcion'])->num_rows() > 0)  ?  $texto_2 = $this->tabulados_model->get_texto(3,$data['opcion'])->row()->texto_2  :  '';
			$data['texto_2'] =  $texto_2;  		

			$metadata = $this->tabulados_model->get_metadata(3,$data['opcion']); 
			$data['txt_tabulado'] 	= ( $metadata->num_rows()==1 )  ?  $metadata->row()->tabulado  :  ''; 
			$data['txt_contenido'] 	= ( $metadata->num_rows()==1 )  ?  $metadata->row()->contenido  :  ''; 
			$data['txt_casos'] 		= ( $metadata->num_rows()==1 )  ?  $metadata->row()->casos  :  ''; 
			$data['txt_variables'] 	= ( $metadata->num_rows()==1 )  ?  $metadata->row()->variable  :  ''; 
			$data['txt_alternativas'] = ( $metadata->num_rows()==1 )  ?  $metadata->row()->alternativas  :  ''; 
			$data['txt_otro'] 		= ( $metadata->num_rows()==1 )  ?  $metadata->row()->otro  :  ''; 
			$data['txt_faltantes'] 	= ( $metadata->num_rows()==1 )  ?  $metadata->row()->faltantes  :  ''; 
			$data['txt_productor'] 	= ( $metadata->num_rows()==1 )  ?  $metadata->row()->productor :  ''; 
			$data['txt_definiciones'] = ( $metadata->num_rows()==1 )  ?  $metadata->row()->definiciones  :  '';
			
			$data['main_content'] = 'tabulados/comunidad/reporte_211_view';

			$this->load->view('backend/includes/template', $data);		
	}


	public function reporte_210()
	{
			$data['restriccion'] = $this->restriccion;		
			$data['nav'] = TRUE;
			$data['title'] = 'Tabulados Comunidad';	
			$data['nom_tabulados'] = $this->tabulados_model->get_nombre_tabulados();	
			$data['opcion'] = 210;		
			$data['tables'] = $this->comunidad_model->get_tabulado_212();
			$texto = ($this->tabulados_model->get_texto(3,$data['opcion'])->num_rows() > 0)  ?  $texto = $this->tabulados_model->get_texto(3,$data['opcion'])->row()->texto  :  '';
			$data['texto'] =  $texto; 
			$texto_2 = ($this->tabulados_model->get_texto(3,$data['opcion'])->num_rows() > 0)  ?  $texto_2 = $this->tabulados_model->get_texto(3,$data['opcion'])->row()->texto_2  :  '';
			$data['texto_2'] =  $texto_2;  		

			$metadata = $this->tabulados_model->get_metadata(3,$data['opcion']); 
			$data['txt_tabulado'] 	= ( $metadata->num_rows()==1 )  ?  $metadata->row()->tabulado  :  ''; 
			$data['txt_contenido'] 	= ( $metadata->num_rows()==1 )  ?  $metadata->row()->contenido  :  ''; 
			$data['txt_casos'] 		= ( $metadata->num_rows()==1 )  ?  $metadata->row()->casos  :  ''; 
			$data['txt_variables'] 	= ( $metadata->num_rows()==1 )  ?  $metadata->row()->variable  :  ''; 
			$data['txt_alternativas'] = ( $metadata->num_rows()==1 )  ?  $metadata->row()->alternativas  :  ''; 
			$data['txt_otro'] 		= ( $metadata->num_rows()==1 )  ?  $metadata->row()->otro  :  ''; 
			$data['txt_faltantes'] 	= ( $metadata->num_rows()==1 )  ?  $metadata->row()->faltantes  :  ''; 
			$data['txt_productor'] 	= ( $metadata->num_rows()==1 )  ?  $metadata->row()->productor :  ''; 
			$data['txt_definiciones'] = ( $metadata->num_rows()==1 )  ?  $metadata->row()->definiciones  :  '';
			
			$data['main_content'] = 'tabulados/comunidad/reporte_212_view';

			$this->load->view('backend/includes/template', $data);		
	}

	public function reporte_211()
	{
			$data['restriccion'] = $this->restriccion;		
			$data['nav'] = TRUE;
			$data['title'] = 'Tabulados Comunidad';	
			$data['nom_tabulados'] = $this->tabulados_model->get_nombre_tabulados();	
			$data['opcion'] = 211;		
			$data['tables'] = $this->comunidad_model->get_tabulado_213();
			$texto = ($this->tabulados_model->get_texto(3,$data['opcion'])->num_rows() > 0)  ?  $texto = $this->tabulados_model->get_texto(3,$data['opcion'])->row()->texto  :  '';
			$data['texto'] =  $texto; 
			$texto_2 = ($this->tabulados_model->get_texto(3,$data['opcion'])->num_rows() > 0)  ?  $texto_2 = $this->tabulados_model->get_texto(3,$data['opcion'])->row()->texto_2  :  '';
			$data['texto_2'] =  $texto_2;  		

			$metadata = $this->tabulados_model->get_metadata(3,$data['opcion']); 
			$data['txt_tabulado'] 	= ( $metadata->num_rows()==1 )  ?  $metadata->row()->tabulado  :  ''; 
			$data['txt_contenido'] 	= ( $metadata->num_rows()==1 )  ?  $metadata->row()->contenido  :  ''; 
			$data['txt_casos'] 		= ( $metadata->num_rows()==1 )  ?  $metadata->row()->casos  :  ''; 
			$data['txt_variables'] 	= ( $metadata->num_rows()==1 )  ?  $metadata->row()->variable  :  ''; 
			$data['txt_alternativas'] = ( $metadata->num_rows()==1 )  ?  $metadata->row()->alternativas  :  ''; 
			$data['txt_otro'] 		= ( $metadata->num_rows()==1 )  ?  $metadata->row()->otro  :  ''; 
			$data['txt_faltantes'] 	= ( $metadata->num_rows()==1 )  ?  $metadata->row()->faltantes  :  ''; 
			$data['txt_productor'] 	= ( $metadata->num_rows()==1 )  ?  $metadata->row()->productor :  ''; 
			$data['txt_definiciones'] = ( $metadata->num_rows()==1 )  ?  $metadata->row()->definiciones  :  '';
			
			$data['main_content'] = 'tabulados/comunidad/reporte_213_view';

			$this->load->view('backend/includes/template', $data);		
	}

	public function reporte_212()
	{
			$data['restriccion'] = $this->restriccion;		
			$data['nav'] = TRUE;
			$data['title'] = 'Tabulados Comunidad';	
			$data['nom_tabulados'] = $this->tabulados_model->get_nombre_tabulados();	
			$data['opcion'] = 212;		
			$data['tables'] = $this->comunidad_model->get_tabulado_214();
			$texto = ($this->tabulados_model->get_texto(3,$data['opcion'])->num_rows() > 0)  ?  $texto = $this->tabulados_model->get_texto(3,$data['opcion'])->row()->texto  :  '';
			$data['texto'] =  $texto; 
			$texto_2 = ($this->tabulados_model->get_texto(3,$data['opcion'])->num_rows() > 0)  ?  $texto_2 = $this->tabulados_model->get_texto(3,$data['opcion'])->row()->texto_2  :  '';
			$data['texto_2'] =  $texto_2;  		

			$metadata = $this->tabulados_model->get_metadata(3,$data['opcion']); 
			$data['txt_tabulado'] 	= ( $metadata->num_rows()==1 )  ?  $metadata->row()->tabulado  :  ''; 
			$data['txt_contenido'] 	= ( $metadata->num_rows()==1 )  ?  $metadata->row()->contenido  :  ''; 
			$data['txt_casos'] 		= ( $metadata->num_rows()==1 )  ?  $metadata->row()->casos  :  ''; 
			$data['txt_variables'] 	= ( $metadata->num_rows()==1 )  ?  $metadata->row()->variable  :  ''; 
			$data['txt_alternativas'] = ( $metadata->num_rows()==1 )  ?  $metadata->row()->alternativas  :  ''; 
			$data['txt_otro'] 		= ( $metadata->num_rows()==1 )  ?  $metadata->row()->otro  :  ''; 
			$data['txt_faltantes'] 	= ( $metadata->num_rows()==1 )  ?  $metadata->row()->faltantes  :  ''; 
			$data['txt_productor'] 	= ( $metadata->num_rows()==1 )  ?  $metadata->row()->productor :  ''; 
			$data['txt_definiciones'] = ( $metadata->num_rows()==1 )  ?  $metadata->row()->definiciones  :  '';
			
			$data['main_content'] = 'tabulados/comunidad/reporte_214_view';

			$this->load->view('backend/includes/template', $data);		
	}

	public function reporte_213()
	{
			$data['restriccion'] = $this->restriccion;		
			$data['nav'] = TRUE;
			$data['title'] = 'Tabulados Comunidad';	
			$data['nom_tabulados'] = $this->tabulados_model->get_nombre_tabulados();	
			$data['opcion'] = 213;		
			$data['tables'] = $this->comunidad_model->get_tabulado_215();
			$texto = ($this->tabulados_model->get_texto(3,$data['opcion'])->num_rows() > 0)  ?  $texto = $this->tabulados_model->get_texto(3,$data['opcion'])->row()->texto  :  '';
			$data['texto'] =  $texto; 
			$texto_2 = ($this->tabulados_model->get_texto(3,$data['opcion'])->num_rows() > 0)  ?  $texto_2 = $this->tabulados_model->get_texto(3,$data['opcion'])->row()->texto_2  :  '';
			$data['texto_2'] =  $texto_2; 		

			$metadata = $this->tabulados_model->get_metadata(3,$data['opcion']); 
			$data['txt_tabulado'] 	= ( $metadata->num_rows()==1 )  ?  $metadata->row()->tabulado  :  ''; 
			$data['txt_contenido'] 	= ( $metadata->num_rows()==1 )  ?  $metadata->row()->contenido  :  ''; 
			$data['txt_casos'] 		= ( $metadata->num_rows()==1 )  ?  $metadata->row()->casos  :  ''; 
			$data['txt_variables'] 	= ( $metadata->num_rows()==1 )  ?  $metadata->row()->variable  :  ''; 
			$data['txt_alternativas'] = ( $metadata->num_rows()==1 )  ?  $metadata->row()->alternativas  :  ''; 
			$data['txt_otro'] 		= ( $metadata->num_rows()==1 )  ?  $metadata->row()->otro  :  ''; 
			$data['txt_faltantes'] 	= ( $metadata->num_rows()==1 )  ?  $metadata->row()->faltantes  :  ''; 
			$data['txt_productor'] 	= ( $metadata->num_rows()==1 )  ?  $metadata->row()->productor :  ''; 
			$data['txt_definiciones'] = ( $metadata->num_rows()==1 )  ?  $metadata->row()->definiciones  :  '';
			
			$data['main_content'] = 'tabulados/comunidad/reporte_215_view';

			$this->load->view('backend/includes/template', $data);		
	}


	public function reporte_214()
	{
			$data['restriccion'] = $this->restriccion;		
			$data['nav'] = TRUE;
			$data['title'] = 'Tabulados Comunidad';	
			$data['nom_tabulados'] = $this->tabulados_model->get_nombre_tabulados();	
			$data['opcion'] = 214;		
			$data['tables'] = $this->comunidad_model->get_tabulado_216();
			$texto = ($this->tabulados_model->get_texto(3,$data['opcion'])->num_rows() > 0)  ?  $texto = $this->tabulados_model->get_texto(3,$data['opcion'])->row()->texto  :  '';
			$data['texto'] =  $texto; 
			$texto_2 = ($this->tabulados_model->get_texto(3,$data['opcion'])->num_rows() > 0)  ?  $texto_2 = $this->tabulados_model->get_texto(3,$data['opcion'])->row()->texto_2  :  '';
			$data['texto_2'] =  $texto_2;  		

			$metadata = $this->tabulados_model->get_metadata(3,$data['opcion']); 
			$data['txt_tabulado'] 	= ( $metadata->num_rows()==1 )  ?  $metadata->row()->tabulado  :  ''; 
			$data['txt_contenido'] 	= ( $metadata->num_rows()==1 )  ?  $metadata->row()->contenido  :  ''; 
			$data['txt_casos'] 		= ( $metadata->num_rows()==1 )  ?  $metadata->row()->casos  :  ''; 
			$data['txt_variables'] 	= ( $metadata->num_rows()==1 )  ?  $metadata->row()->variable  :  ''; 
			$data['txt_alternativas'] = ( $metadata->num_rows()==1 )  ?  $metadata->row()->alternativas  :  ''; 
			$data['txt_otro'] 		= ( $metadata->num_rows()==1 )  ?  $metadata->row()->otro  :  ''; 
			$data['txt_faltantes'] 	= ( $metadata->num_rows()==1 )  ?  $metadata->row()->faltantes  :  ''; 
			$data['txt_productor'] 	= ( $metadata->num_rows()==1 )  ?  $metadata->row()->productor :  ''; 
			$data['txt_definiciones'] = ( $metadata->num_rows()==1 )  ?  $metadata->row()->definiciones  :  '';
			
			$data['main_content'] = 'tabulados/comunidad/reporte_216_view';

			$this->load->view('backend/includes/template', $data);		
	}
	public function reporte_215()
	{
			$data['restriccion'] = $this->restriccion;		
			$data['nav'] = TRUE;
			$data['title'] = 'Tabulados Comunidad';	
			$data['nom_tabulados'] = $this->tabulados_model->get_nombre_tabulados();	
			$data['opcion'] = 215;		
			$data['tables'] = $this->comunidad_model->get_tabulado_217();
			$texto = ($this->tabulados_model->get_texto(3,$data['opcion'])->num_rows() > 0)  ?  $texto = $this->tabulados_model->get_texto(3,$data['opcion'])->row()->texto  :  '';
			$data['texto'] =  $texto; 
			$texto_2 = ($this->tabulados_model->get_texto(3,$data['opcion'])->num_rows() > 0)  ?  $texto_2 = $this->tabulados_model->get_texto(3,$data['opcion'])->row()->texto_2  :  '';
			$data['texto_2'] =  $texto_2;  		

			$metadata = $this->tabulados_model->get_metadata(3,$data['opcion']); 
			$data['txt_tabulado'] 	= ( $metadata->num_rows()==1 )  ?  $metadata->row()->tabulado  :  ''; 
			$data['txt_contenido'] 	= ( $metadata->num_rows()==1 )  ?  $metadata->row()->contenido  :  ''; 
			$data['txt_casos'] 		= ( $metadata->num_rows()==1 )  ?  $metadata->row()->casos  :  ''; 
			$data['txt_variables'] 	= ( $metadata->num_rows()==1 )  ?  $metadata->row()->variable  :  ''; 
			$data['txt_alternativas'] = ( $metadata->num_rows()==1 )  ?  $metadata->row()->alternativas  :  ''; 
			$data['txt_otro'] 		= ( $metadata->num_rows()==1 )  ?  $metadata->row()->otro  :  ''; 
			$data['txt_faltantes'] 	= ( $metadata->num_rows()==1 )  ?  $metadata->row()->faltantes  :  ''; 
			$data['txt_productor'] 	= ( $metadata->num_rows()==1 )  ?  $metadata->row()->productor :  ''; 
			$data['txt_definiciones'] = ( $metadata->num_rows()==1 )  ?  $metadata->row()->definiciones  :  '';
			
			$data['main_content'] = 'tabulados/comunidad/reporte_217_view';

			$this->load->view('backend/includes/template', $data);		
	}
	public function reporte_216()
	{
			$data['restriccion'] = $this->restriccion;			
			$data['nav'] = TRUE;
			$data['title'] = 'Tabulados Comunidad';	
			$data['nom_tabulados'] = $this->tabulados_model->get_nombre_tabulados();	
			$data['opcion'] = 216;		
			$data['tables'] = $this->comunidad_model->get_tabulado_218();
			$texto = ($this->tabulados_model->get_texto(3,$data['opcion'])->num_rows() > 0)  ?  $texto = $this->tabulados_model->get_texto(3,$data['opcion'])->row()->texto  :  '';
			$data['texto'] =  $texto; 
			$texto_2 = ($this->tabulados_model->get_texto(3,$data['opcion'])->num_rows() > 0)  ?  $texto_2 = $this->tabulados_model->get_texto(3,$data['opcion'])->row()->texto_2  :  '';
			$data['texto_2'] =  $texto_2;  		

			$metadata = $this->tabulados_model->get_metadata(3,$data['opcion']); 
			$data['txt_tabulado'] 	= ( $metadata->num_rows()==1 )  ?  $metadata->row()->tabulado  :  ''; 
			$data['txt_contenido'] 	= ( $metadata->num_rows()==1 )  ?  $metadata->row()->contenido  :  ''; 
			$data['txt_casos'] 		= ( $metadata->num_rows()==1 )  ?  $metadata->row()->casos  :  ''; 
			$data['txt_variables'] 	= ( $metadata->num_rows()==1 )  ?  $metadata->row()->variable  :  ''; 
			$data['txt_alternativas'] = ( $metadata->num_rows()==1 )  ?  $metadata->row()->alternativas  :  ''; 
			$data['txt_otro'] 		= ( $metadata->num_rows()==1 )  ?  $metadata->row()->otro  :  ''; 
			$data['txt_faltantes'] 	= ( $metadata->num_rows()==1 )  ?  $metadata->row()->faltantes  :  ''; 
			$data['txt_productor'] 	= ( $metadata->num_rows()==1 )  ?  $metadata->row()->productor :  ''; 
			$data['txt_definiciones'] = ( $metadata->num_rows()==1 )  ?  $metadata->row()->definiciones  :  '';
			
			$data['main_content'] = 'tabulados/comunidad/reporte_218_view';

			$this->load->view('backend/includes/template', $data);		
	}	
	public function reporte_217()
	{
			$data['restriccion'] = $this->restriccion;		
			$data['nav'] = TRUE;
			$data['title'] = 'Tabulados Comunidad';	
			$data['nom_tabulados'] = $this->tabulados_model->get_nombre_tabulados();	
			$data['opcion'] = 217;		
			$data['tables'] = $this->comunidad_model->get_tabulado_219();
			$texto = ($this->tabulados_model->get_texto(3,$data['opcion'])->num_rows() > 0)  ?  $texto = $this->tabulados_model->get_texto(3,$data['opcion'])->row()->texto  :  '';
			$data['texto'] =  $texto; 
			$texto_2 = ($this->tabulados_model->get_texto(3,$data['opcion'])->num_rows() > 0)  ?  $texto_2 = $this->tabulados_model->get_texto(3,$data['opcion'])->row()->texto_2  :  '';
			$data['texto_2'] =  $texto_2;  		

			$metadata = $this->tabulados_model->get_metadata(3,$data['opcion']); 
			$data['txt_tabulado'] 	= ( $metadata->num_rows()==1 )  ?  $metadata->row()->tabulado  :  ''; 
			$data['txt_contenido'] 	= ( $metadata->num_rows()==1 )  ?  $metadata->row()->contenido  :  ''; 
			$data['txt_casos'] 		= ( $metadata->num_rows()==1 )  ?  $metadata->row()->casos  :  ''; 
			$data['txt_variables'] 	= ( $metadata->num_rows()==1 )  ?  $metadata->row()->variable  :  ''; 
			$data['txt_alternativas'] = ( $metadata->num_rows()==1 )  ?  $metadata->row()->alternativas  :  ''; 
			$data['txt_otro'] 		= ( $metadata->num_rows()==1 )  ?  $metadata->row()->otro  :  ''; 
			$data['txt_faltantes'] 	= ( $metadata->num_rows()==1 )  ?  $metadata->row()->faltantes  :  ''; 
			$data['txt_productor'] 	= ( $metadata->num_rows()==1 )  ?  $metadata->row()->productor :  ''; 
			$data['txt_definiciones'] = ( $metadata->num_rows()==1 )  ?  $metadata->row()->definiciones  :  '';
			
			$data['main_content'] = 'tabulados/comunidad/reporte_219_view';

			$this->load->view('backend/includes/template', $data);		
	}	

	public function reporte_218()
	{
			$data['restriccion'] = $this->restriccion;		
			$data['nav'] = TRUE;
			$data['title'] = 'Tabulados Comunidad';	
			$data['nom_tabulados'] = $this->tabulados_model->get_nombre_tabulados();	
			$data['opcion'] = 218;		
			$data['tables'] = $this->comunidad_model->get_tabulado_220();
			$texto = ($this->tabulados_model->get_texto(3,$data['opcion'])->num_rows() > 0)  ?  $texto = $this->tabulados_model->get_texto(3,$data['opcion'])->row()->texto  :  '';
			$data['texto'] =  $texto; 
			$texto_2 = ($this->tabulados_model->get_texto(3,$data['opcion'])->num_rows() > 0)  ?  $texto_2 = $this->tabulados_model->get_texto(3,$data['opcion'])->row()->texto_2  :  '';
			$data['texto_2'] =  $texto_2; 		

			$metadata = $this->tabulados_model->get_metadata(3,$data['opcion']); 
			$data['txt_tabulado'] 	= ( $metadata->num_rows()==1 )  ?  $metadata->row()->tabulado  :  ''; 
			$data['txt_contenido'] 	= ( $metadata->num_rows()==1 )  ?  $metadata->row()->contenido  :  ''; 
			$data['txt_casos'] 		= ( $metadata->num_rows()==1 )  ?  $metadata->row()->casos  :  ''; 
			$data['txt_variables'] 	= ( $metadata->num_rows()==1 )  ?  $metadata->row()->variable  :  ''; 
			$data['txt_alternativas'] = ( $metadata->num_rows()==1 )  ?  $metadata->row()->alternativas  :  ''; 
			$data['txt_otro'] 		= ( $metadata->num_rows()==1 )  ?  $metadata->row()->otro  :  ''; 
			$data['txt_faltantes'] 	= ( $metadata->num_rows()==1 )  ?  $metadata->row()->faltantes  :  ''; 
			$data['txt_productor'] 	= ( $metadata->num_rows()==1 )  ?  $metadata->row()->productor :  ''; 
			$data['txt_definiciones'] = ( $metadata->num_rows()==1 )  ?  $metadata->row()->definiciones  :  '';
 			
			$data['main_content'] = 'tabulados/comunidad/reporte_220_view';

			$this->load->view('backend/includes/template', $data);		
	}

	public function reporte_219()
	{
			$data['restriccion'] = $this->restriccion;		
			$data['nav'] = TRUE;
			$data['title'] = 'Tabulados Comunidad';	
			$data['nom_tabulados'] = $this->tabulados_model->get_nombre_tabulados();	
			$data['opcion'] = 219;		
			$data['tables'] = $this->comunidad_model->get_tabulado_221();
			$texto = ($this->tabulados_model->get_texto(3,$data['opcion'])->num_rows() > 0)  ?  $texto = $this->tabulados_model->get_texto(3,$data['opcion'])->row()->texto  :  '';
			$data['texto'] =  $texto; 
			$texto_2 = ($this->tabulados_model->get_texto(3,$data['opcion'])->num_rows() > 0)  ?  $texto_2 = $this->tabulados_model->get_texto(3,$data['opcion'])->row()->texto_2  :  '';
			$data['texto_2'] =  $texto_2;  		

			$metadata = $this->tabulados_model->get_metadata(3,$data['opcion']); 
			$data['txt_tabulado'] 	= ( $metadata->num_rows()==1 )  ?  $metadata->row()->tabulado  :  ''; 
			$data['txt_contenido'] 	= ( $metadata->num_rows()==1 )  ?  $metadata->row()->contenido  :  ''; 
			$data['txt_casos'] 		= ( $metadata->num_rows()==1 )  ?  $metadata->row()->casos  :  ''; 
			$data['txt_variables'] 	= ( $metadata->num_rows()==1 )  ?  $metadata->row()->variable  :  ''; 
			$data['txt_alternativas'] = ( $metadata->num_rows()==1 )  ?  $metadata->row()->alternativas  :  ''; 
			$data['txt_otro'] 		= ( $metadata->num_rows()==1 )  ?  $metadata->row()->otro  :  ''; 
			$data['txt_faltantes'] 	= ( $metadata->num_rows()==1 )  ?  $metadata->row()->faltantes  :  ''; 
			$data['txt_productor'] 	= ( $metadata->num_rows()==1 )  ?  $metadata->row()->productor :  ''; 
			$data['txt_definiciones'] = ( $metadata->num_rows()==1 )  ?  $metadata->row()->definiciones  :  '';
			
			$data['main_content'] = 'tabulados/comunidad/reporte_221_view';

			$this->load->view('backend/includes/template', $data);		
	}


	public function reporte_220()
	{
			$data['restriccion'] = $this->restriccion;		
			$data['nav'] = TRUE;
			$data['title'] = 'Tabulados Comunidad';	
			$data['nom_tabulados'] = $this->tabulados_model->get_nombre_tabulados();	
			$data['opcion'] = 220;		
			$data['tables'] = $this->comunidad_model->get_tabulado_222();
			$texto = ($this->tabulados_model->get_texto(3,$data['opcion'])->num_rows() > 0)  ?  $texto = $this->tabulados_model->get_texto(3,$data['opcion'])->row()->texto  :  '';
			$data['texto'] =  $texto; 
			$texto_2 = ($this->tabulados_model->get_texto(3,$data['opcion'])->num_rows() > 0)  ?  $texto_2 = $this->tabulados_model->get_texto(3,$data['opcion'])->row()->texto_2  :  '';
			$data['texto_2'] =  $texto_2;  		

			$metadata = $this->tabulados_model->get_metadata(3,$data['opcion']); 
			$data['txt_tabulado'] 	= ( $metadata->num_rows()==1 )  ?  $metadata->row()->tabulado  :  ''; 
			$data['txt_contenido'] 	= ( $metadata->num_rows()==1 )  ?  $metadata->row()->contenido  :  ''; 
			$data['txt_casos'] 		= ( $metadata->num_rows()==1 )  ?  $metadata->row()->casos  :  ''; 
			$data['txt_variables'] 	= ( $metadata->num_rows()==1 )  ?  $metadata->row()->variable  :  ''; 
			$data['txt_alternativas'] = ( $metadata->num_rows()==1 )  ?  $metadata->row()->alternativas  :  ''; 
			$data['txt_otro'] 		= ( $metadata->num_rows()==1 )  ?  $metadata->row()->otro  :  ''; 
			$data['txt_faltantes'] 	= ( $metadata->num_rows()==1 )  ?  $metadata->row()->faltantes  :  ''; 
			$data['txt_productor'] 	= ( $metadata->num_rows()==1 )  ?  $metadata->row()->productor :  ''; 
			$data['txt_definiciones'] = ( $metadata->num_rows()==1 )  ?  $metadata->row()->definiciones  :  '';
			
			$data['main_content'] = 'tabulados/comunidad/reporte_222_view';

			$this->load->view('backend/includes/template', $data);		
	}

	public function reporte_221()
	{
			$data['restriccion'] = $this->restriccion;			
			$data['nav'] = TRUE;
			$data['title'] = 'Tabulados Comunidad';	
			$data['nom_tabulados'] = $this->tabulados_model->get_nombre_tabulados();	
			$data['opcion'] = 221;		
			$data['tables'] = $this->comunidad_model->get_tabulado_223();
			$texto = ($this->tabulados_model->get_texto(3,$data['opcion'])->num_rows() > 0)  ?  $texto = $this->tabulados_model->get_texto(3,$data['opcion'])->row()->texto  :  '';
			$data['texto'] =  $texto; 
			$texto_2 = ($this->tabulados_model->get_texto(3,$data['opcion'])->num_rows() > 0)  ?  $texto_2 = $this->tabulados_model->get_texto(3,$data['opcion'])->row()->texto_2  :  '';
			$data['texto_2'] =  $texto_2;  		

			$metadata = $this->tabulados_model->get_metadata(3,$data['opcion']); 
			$data['txt_tabulado'] 	= ( $metadata->num_rows()==1 )  ?  $metadata->row()->tabulado  :  ''; 
			$data['txt_contenido'] 	= ( $metadata->num_rows()==1 )  ?  $metadata->row()->contenido  :  ''; 
			$data['txt_casos'] 		= ( $metadata->num_rows()==1 )  ?  $metadata->row()->casos  :  ''; 
			$data['txt_variables'] 	= ( $metadata->num_rows()==1 )  ?  $metadata->row()->variable  :  ''; 
			$data['txt_alternativas'] = ( $metadata->num_rows()==1 )  ?  $metadata->row()->alternativas  :  ''; 
			$data['txt_otro'] 		= ( $metadata->num_rows()==1 )  ?  $metadata->row()->otro  :  ''; 
			$data['txt_faltantes'] 	= ( $metadata->num_rows()==1 )  ?  $metadata->row()->faltantes  :  ''; 
			$data['txt_productor'] 	= ( $metadata->num_rows()==1 )  ?  $metadata->row()->productor :  ''; 
			$data['txt_definiciones'] = ( $metadata->num_rows()==1 )  ?  $metadata->row()->definiciones  :  '';
			
			$data['main_content'] = 'tabulados/comunidad/reporte_223_view';

			$this->load->view('backend/includes/template', $data);		
	}

	public function reporte_222()
	{
			$data['restriccion'] = $this->restriccion;		
			$data['nav'] = TRUE;
			$data['title'] = 'Tabulados Comunidad';	
			$data['nom_tabulados'] = $this->tabulados_model->get_nombre_tabulados();	
			$data['opcion'] = 222;		
			$data['tables'] = $this->comunidad_model->get_tabulado_224();
			$texto = ($this->tabulados_model->get_texto(3,$data['opcion'])->num_rows() > 0)  ?  $texto = $this->tabulados_model->get_texto(3,$data['opcion'])->row()->texto  :  '';
			$data['texto'] =  $texto; 
			$texto_2 = ($this->tabulados_model->get_texto(3,$data['opcion'])->num_rows() > 0)  ?  $texto_2 = $this->tabulados_model->get_texto(3,$data['opcion'])->row()->texto_2  :  '';
			$data['texto_2'] =  $texto_2;  		

			$metadata = $this->tabulados_model->get_metadata(3,$data['opcion']); 
			$data['txt_tabulado'] 	= ( $metadata->num_rows()==1 )  ?  $metadata->row()->tabulado  :  ''; 
			$data['txt_contenido'] 	= ( $metadata->num_rows()==1 )  ?  $metadata->row()->contenido  :  ''; 
			$data['txt_casos'] 		= ( $metadata->num_rows()==1 )  ?  $metadata->row()->casos  :  ''; 
			$data['txt_variables'] 	= ( $metadata->num_rows()==1 )  ?  $metadata->row()->variable  :  ''; 
			$data['txt_alternativas'] = ( $metadata->num_rows()==1 )  ?  $metadata->row()->alternativas  :  ''; 
			$data['txt_otro'] 		= ( $metadata->num_rows()==1 )  ?  $metadata->row()->otro  :  ''; 
			$data['txt_faltantes'] 	= ( $metadata->num_rows()==1 )  ?  $metadata->row()->faltantes  :  ''; 
			$data['txt_productor'] 	= ( $metadata->num_rows()==1 )  ?  $metadata->row()->productor :  ''; 
			$data['txt_definiciones'] = ( $metadata->num_rows()==1 )  ?  $metadata->row()->definiciones  :  '';
			
			$data['main_content'] = 'tabulados/comunidad/reporte_224_view';

			$this->load->view('backend/includes/template', $data);		
	}

	public function reporte_223()
	{
			$data['restriccion'] = $this->restriccion;		
			$data['nav'] = TRUE;
			$data['title'] = 'Tabulados Comunidad';	
			$data['nom_tabulados'] = $this->tabulados_model->get_nombre_tabulados();	
			$data['opcion'] = 223;		
			$data['tables'] = $this->comunidad_model->get_tabulado_225();
			$texto = ($this->tabulados_model->get_texto(3,$data['opcion'])->num_rows() > 0)  ?  $texto = $this->tabulados_model->get_texto(3,$data['opcion'])->row()->texto  :  '';
			$data['texto'] =  $texto; 
			$texto_2 = ($this->tabulados_model->get_texto(3,$data['opcion'])->num_rows() > 0)  ?  $texto_2 = $this->tabulados_model->get_texto(3,$data['opcion'])->row()->texto_2  :  '';
			$data['texto_2'] =  $texto_2;  		

			$metadata = $this->tabulados_model->get_metadata(3,$data['opcion']); 
			$data['txt_tabulado'] 	= ( $metadata->num_rows()==1 )  ?  $metadata->row()->tabulado  :  ''; 
			$data['txt_contenido'] 	= ( $metadata->num_rows()==1 )  ?  $metadata->row()->contenido  :  ''; 
			$data['txt_casos'] 		= ( $metadata->num_rows()==1 )  ?  $metadata->row()->casos  :  ''; 
			$data['txt_variables'] 	= ( $metadata->num_rows()==1 )  ?  $metadata->row()->variable  :  ''; 
			$data['txt_alternativas'] = ( $metadata->num_rows()==1 )  ?  $metadata->row()->alternativas  :  ''; 
			$data['txt_otro'] 		= ( $metadata->num_rows()==1 )  ?  $metadata->row()->otro  :  ''; 
			$data['txt_faltantes'] 	= ( $metadata->num_rows()==1 )  ?  $metadata->row()->faltantes  :  ''; 
			$data['txt_productor'] 	= ( $metadata->num_rows()==1 )  ?  $metadata->row()->productor :  ''; 
			$data['txt_definiciones'] = ( $metadata->num_rows()==1 )  ?  $metadata->row()->definiciones  :  '';
			
			$data['main_content'] = 'tabulados/comunidad/reporte_225_view';

			$this->load->view('backend/includes/template', $data);		
	}


	public function reporte_224()
	{
			$data['restriccion'] = $this->restriccion;			
			$data['nav'] = TRUE;
			$data['title'] = 'Tabulados Comunidad';	
			$data['nom_tabulados'] = $this->tabulados_model->get_nombre_tabulados();	
			$data['opcion'] = 224;		
			$data['tables'] = $this->comunidad_model->get_tabulado_226();
			$texto = ($this->tabulados_model->get_texto(3,$data['opcion'])->num_rows() > 0)  ?  $texto = $this->tabulados_model->get_texto(3,$data['opcion'])->row()->texto  :  '';
			$data['texto'] =  $texto; 
			$texto_2 = ($this->tabulados_model->get_texto(3,$data['opcion'])->num_rows() > 0)  ?  $texto_2 = $this->tabulados_model->get_texto(3,$data['opcion'])->row()->texto_2  :  '';
			$data['texto_2'] =  $texto_2;  		

			$metadata = $this->tabulados_model->get_metadata(3,$data['opcion']); 
			$data['txt_tabulado'] 	= ( $metadata->num_rows()==1 )  ?  $metadata->row()->tabulado  :  ''; 
			$data['txt_contenido'] 	= ( $metadata->num_rows()==1 )  ?  $metadata->row()->contenido  :  ''; 
			$data['txt_casos'] 		= ( $metadata->num_rows()==1 )  ?  $metadata->row()->casos  :  ''; 
			$data['txt_variables'] 	= ( $metadata->num_rows()==1 )  ?  $metadata->row()->variable  :  ''; 
			$data['txt_alternativas'] = ( $metadata->num_rows()==1 )  ?  $metadata->row()->alternativas  :  ''; 
			$data['txt_otro'] 		= ( $metadata->num_rows()==1 )  ?  $metadata->row()->otro  :  ''; 
			$data['txt_faltantes'] 	= ( $metadata->num_rows()==1 )  ?  $metadata->row()->faltantes  :  ''; 
			$data['txt_productor'] 	= ( $metadata->num_rows()==1 )  ?  $metadata->row()->productor :  ''; 
			$data['txt_definiciones'] = ( $metadata->num_rows()==1 )  ?  $metadata->row()->definiciones  :  '';
			
			$data['main_content'] = 'tabulados/comunidad/reporte_226_view';

			$this->load->view('backend/includes/template', $data);		
	}
	public function reporte_225()
	{
			$data['restriccion'] = $this->restriccion;			
			$data['nav'] = TRUE;
			$data['title'] = 'Tabulados Comunidad';	
			$data['nom_tabulados'] = $this->tabulados_model->get_nombre_tabulados();	
			$data['opcion'] = 225;		
			$data['tables'] = $this->comunidad_model->get_tabulado_227();
			$texto = ($this->tabulados_model->get_texto(3,$data['opcion'])->num_rows() > 0)  ?  $texto = $this->tabulados_model->get_texto(3,$data['opcion'])->row()->texto  :  '';
			$data['texto'] =  $texto; 
			$texto_2 = ($this->tabulados_model->get_texto(3,$data['opcion'])->num_rows() > 0)  ?  $texto_2 = $this->tabulados_model->get_texto(3,$data['opcion'])->row()->texto_2  :  '';
			$data['texto_2'] =  $texto_2;  		

			$metadata = $this->tabulados_model->get_metadata(3,$data['opcion']); 
			$data['txt_tabulado'] 	= ( $metadata->num_rows()==1 )  ?  $metadata->row()->tabulado  :  ''; 
			$data['txt_contenido'] 	= ( $metadata->num_rows()==1 )  ?  $metadata->row()->contenido  :  ''; 
			$data['txt_casos'] 		= ( $metadata->num_rows()==1 )  ?  $metadata->row()->casos  :  ''; 
			$data['txt_variables'] 	= ( $metadata->num_rows()==1 )  ?  $metadata->row()->variable  :  ''; 
			$data['txt_alternativas'] = ( $metadata->num_rows()==1 )  ?  $metadata->row()->alternativas  :  ''; 
			$data['txt_otro'] 		= ( $metadata->num_rows()==1 )  ?  $metadata->row()->otro  :  ''; 
			$data['txt_faltantes'] 	= ( $metadata->num_rows()==1 )  ?  $metadata->row()->faltantes  :  ''; 
			$data['txt_productor'] 	= ( $metadata->num_rows()==1 )  ?  $metadata->row()->productor :  ''; 
			$data['txt_definiciones'] = ( $metadata->num_rows()==1 )  ?  $metadata->row()->definiciones  :  '';
			
			$data['main_content'] = 'tabulados/comunidad/reporte_227_view';

			$this->load->view('backend/includes/template', $data);		
	}
	public function reporte_226()
	{
			$data['restriccion'] = $this->restriccion;			
			$data['nav'] = TRUE;
			$data['title'] = 'Tabulados Comunidad';	
			$data['nom_tabulados'] = $this->tabulados_model->get_nombre_tabulados();	
			$data['opcion'] = 226;		
			$data['tables'] = $this->comunidad_model->get_tabulado_228();
			$texto = ($this->tabulados_model->get_texto(3,$data['opcion'])->num_rows() > 0)  ?  $texto = $this->tabulados_model->get_texto(3,$data['opcion'])->row()->texto  :  '';
			$data['texto'] =  $texto; 
			$texto_2 = ($this->tabulados_model->get_texto(3,$data['opcion'])->num_rows() > 0)  ?  $texto_2 = $this->tabulados_model->get_texto(3,$data['opcion'])->row()->texto_2  :  '';
			$data['texto_2'] =  $texto_2;  		

			$metadata = $this->tabulados_model->get_metadata(3,$data['opcion']); 
			$data['txt_tabulado'] 	= ( $metadata->num_rows()==1 )  ?  $metadata->row()->tabulado  :  ''; 
			$data['txt_contenido'] 	= ( $metadata->num_rows()==1 )  ?  $metadata->row()->contenido  :  ''; 
			$data['txt_casos'] 		= ( $metadata->num_rows()==1 )  ?  $metadata->row()->casos  :  ''; 
			$data['txt_variables'] 	= ( $metadata->num_rows()==1 )  ?  $metadata->row()->variable  :  ''; 
			$data['txt_alternativas'] = ( $metadata->num_rows()==1 )  ?  $metadata->row()->alternativas  :  ''; 
			$data['txt_otro'] 		= ( $metadata->num_rows()==1 )  ?  $metadata->row()->otro  :  ''; 
			$data['txt_faltantes'] 	= ( $metadata->num_rows()==1 )  ?  $metadata->row()->faltantes  :  ''; 
			$data['txt_productor'] 	= ( $metadata->num_rows()==1 )  ?  $metadata->row()->productor :  ''; 
			$data['txt_definiciones'] = ( $metadata->num_rows()==1 )  ?  $metadata->row()->definiciones  :  '';
			
			$data['main_content'] = 'tabulados/comunidad/reporte_228_view';

			$this->load->view('backend/includes/template', $data);		
	}	
	public function reporte_227()
	{
			$data['restriccion'] = $this->restriccion;			
			$data['nav'] = TRUE;
			$data['title'] = 'Tabulados Comunidad';	
			$data['nom_tabulados'] = $this->tabulados_model->get_nombre_tabulados();	
			$data['opcion'] = 227;		
			$data['tables'] = $this->comunidad_model->get_tabulado_229();
			$texto = ($this->tabulados_model->get_texto(3,$data['opcion'])->num_rows() > 0)  ?  $texto = $this->tabulados_model->get_texto(3,$data['opcion'])->row()->texto  :  '';
			$data['texto'] =  $texto; 
			$texto_2 = ($this->tabulados_model->get_texto(3,$data['opcion'])->num_rows() > 0)  ?  $texto_2 = $this->tabulados_model->get_texto(3,$data['opcion'])->row()->texto_2  :  '';
			$data['texto_2'] =  $texto_2;  		

			$metadata = $this->tabulados_model->get_metadata(3,$data['opcion']); 
			$data['txt_tabulado'] 	= ( $metadata->num_rows()==1 )  ?  $metadata->row()->tabulado  :  ''; 
			$data['txt_contenido'] 	= ( $metadata->num_rows()==1 )  ?  $metadata->row()->contenido  :  ''; 
			$data['txt_casos'] 		= ( $metadata->num_rows()==1 )  ?  $metadata->row()->casos  :  ''; 
			$data['txt_variables'] 	= ( $metadata->num_rows()==1 )  ?  $metadata->row()->variable  :  ''; 
			$data['txt_alternativas'] = ( $metadata->num_rows()==1 )  ?  $metadata->row()->alternativas  :  ''; 
			$data['txt_otro'] 		= ( $metadata->num_rows()==1 )  ?  $metadata->row()->otro  :  ''; 
			$data['txt_faltantes'] 	= ( $metadata->num_rows()==1 )  ?  $metadata->row()->faltantes  :  ''; 
			$data['txt_productor'] 	= ( $metadata->num_rows()==1 )  ?  $metadata->row()->productor :  ''; 
			$data['txt_definiciones'] = ( $metadata->num_rows()==1 )  ?  $metadata->row()->definiciones  :  '';
			
			$data['main_content'] = 'tabulados/comunidad/reporte_229_view';

			$this->load->view('backend/includes/template', $data);		
	}		
	public function reporte_228()
	{
			$data['restriccion'] = $this->restriccion;		
			$data['nav'] = TRUE;
			$data['title'] = 'Tabulados Comunidad';	
			$data['nom_tabulados'] = $this->tabulados_model->get_nombre_tabulados();	
			$data['opcion'] = 228;		
			$data['tables'] = $this->comunidad_model->get_tabulado_230();
			$texto = ($this->tabulados_model->get_texto(3,$data['opcion'])->num_rows() > 0)  ?  $texto = $this->tabulados_model->get_texto(3,$data['opcion'])->row()->texto  :  '';
			$data['texto'] =  $texto; 
			$texto_2 = ($this->tabulados_model->get_texto(3,$data['opcion'])->num_rows() > 0)  ?  $texto_2 = $this->tabulados_model->get_texto(3,$data['opcion'])->row()->texto_2  :  '';
			$data['texto_2'] =  $texto_2;  		

			$metadata = $this->tabulados_model->get_metadata(3,$data['opcion']); 
			$data['txt_tabulado'] 	= ( $metadata->num_rows()==1 )  ?  $metadata->row()->tabulado  :  ''; 
			$data['txt_contenido'] 	= ( $metadata->num_rows()==1 )  ?  $metadata->row()->contenido  :  ''; 
			$data['txt_casos'] 		= ( $metadata->num_rows()==1 )  ?  $metadata->row()->casos  :  ''; 
			$data['txt_variables'] 	= ( $metadata->num_rows()==1 )  ?  $metadata->row()->variable  :  ''; 
			$data['txt_alternativas'] = ( $metadata->num_rows()==1 )  ?  $metadata->row()->alternativas  :  ''; 
			$data['txt_otro'] 		= ( $metadata->num_rows()==1 )  ?  $metadata->row()->otro  :  ''; 
			$data['txt_faltantes'] 	= ( $metadata->num_rows()==1 )  ?  $metadata->row()->faltantes  :  ''; 
			$data['txt_productor'] 	= ( $metadata->num_rows()==1 )  ?  $metadata->row()->productor :  ''; 
			$data['txt_definiciones'] = ( $metadata->num_rows()==1 )  ?  $metadata->row()->definiciones  :  '';
			
			$data['main_content'] = 'tabulados/comunidad/reporte_230_view';

			$this->load->view('backend/includes/template', $data);		
	}
	public function reporte_229()
	{
			$data['restriccion'] = $this->restriccion;		
			$data['nav'] = TRUE;
			$data['title'] = 'Tabulados Comunidad';	
			$data['nom_tabulados'] = $this->tabulados_model->get_nombre_tabulados();	
			$data['opcion'] = 229;		
			$data['tables'] = $this->comunidad_model->get_tabulado_231();
			$texto = ($this->tabulados_model->get_texto(3,$data['opcion'])->num_rows() > 0)  ?  $texto = $this->tabulados_model->get_texto(3,$data['opcion'])->row()->texto  :  '';
			$data['texto'] =  $texto; 
			$texto_2 = ($this->tabulados_model->get_texto(3,$data['opcion'])->num_rows() > 0)  ?  $texto_2 = $this->tabulados_model->get_texto(3,$data['opcion'])->row()->texto_2  :  '';
			$data['texto_2'] =  $texto_2;  		

			$metadata = $this->tabulados_model->get_metadata(3,$data['opcion']); 
			$data['txt_tabulado'] 	= ( $metadata->num_rows()==1 )  ?  $metadata->row()->tabulado  :  ''; 
			$data['txt_contenido'] 	= ( $metadata->num_rows()==1 )  ?  $metadata->row()->contenido  :  ''; 
			$data['txt_casos'] 		= ( $metadata->num_rows()==1 )  ?  $metadata->row()->casos  :  ''; 
			$data['txt_variables'] 	= ( $metadata->num_rows()==1 )  ?  $metadata->row()->variable  :  ''; 
			$data['txt_alternativas'] = ( $metadata->num_rows()==1 )  ?  $metadata->row()->alternativas  :  ''; 
			$data['txt_otro'] 		= ( $metadata->num_rows()==1 )  ?  $metadata->row()->otro  :  ''; 
			$data['txt_faltantes'] 	= ( $metadata->num_rows()==1 )  ?  $metadata->row()->faltantes  :  ''; 
			$data['txt_productor'] 	= ( $metadata->num_rows()==1 )  ?  $metadata->row()->productor :  ''; 
			$data['txt_definiciones'] = ( $metadata->num_rows()==1 )  ?  $metadata->row()->definiciones  :  '';
			
			$data['main_content'] = 'tabulados/comunidad/reporte_231_view';

			$this->load->view('backend/includes/template', $data);		
	}	

	public function reporte_230()
	{
			$data['restriccion'] = $this->restriccion;		
			$data['nav'] = TRUE;
			$data['title'] = 'Tabulados Comunidad';	
			$data['nom_tabulados'] = $this->tabulados_model->get_nombre_tabulados();	
			$data['opcion'] = 230;		
			$data['tables'] = $this->comunidad_model->get_tabulado_232();
			$texto = ($this->tabulados_model->get_texto(3,$data['opcion'])->num_rows() > 0)  ?  $texto = $this->tabulados_model->get_texto(3,$data['opcion'])->row()->texto  :  '';
			$data['texto'] =  $texto; 
			$texto_2 = ($this->tabulados_model->get_texto(3,$data['opcion'])->num_rows() > 0)  ?  $texto_2 = $this->tabulados_model->get_texto(3,$data['opcion'])->row()->texto_2  :  '';
			$data['texto_2'] =  $texto_2;  		

			$metadata = $this->tabulados_model->get_metadata(3,$data['opcion']); 
			$data['txt_tabulado'] 	= ( $metadata->num_rows()==1 )  ?  $metadata->row()->tabulado  :  ''; 
			$data['txt_contenido'] 	= ( $metadata->num_rows()==1 )  ?  $metadata->row()->contenido  :  ''; 
			$data['txt_casos'] 		= ( $metadata->num_rows()==1 )  ?  $metadata->row()->casos  :  ''; 
			$data['txt_variables'] 	= ( $metadata->num_rows()==1 )  ?  $metadata->row()->variable  :  ''; 
			$data['txt_alternativas'] = ( $metadata->num_rows()==1 )  ?  $metadata->row()->alternativas  :  ''; 
			$data['txt_otro'] 		= ( $metadata->num_rows()==1 )  ?  $metadata->row()->otro  :  ''; 
			$data['txt_faltantes'] 	= ( $metadata->num_rows()==1 )  ?  $metadata->row()->faltantes  :  ''; 
			$data['txt_productor'] 	= ( $metadata->num_rows()==1 )  ?  $metadata->row()->productor :  ''; 
			$data['txt_definiciones'] = ( $metadata->num_rows()==1 )  ?  $metadata->row()->definiciones  :  '';
			
			$data['main_content'] = 'tabulados/comunidad/reporte_232_view';

			$this->load->view('backend/includes/template', $data);		
	}	

	public function reporte_231()
	{
			$data['restriccion'] = $this->restriccion;			
			$data['nav'] = TRUE;
			$data['title'] = 'Tabulados Comunidad';	
			$data['nom_tabulados'] = $this->tabulados_model->get_nombre_tabulados();	
			$data['opcion'] = 231;		
			$data['tables'] = $this->comunidad_model->get_tabulado_233();
			$texto = ($this->tabulados_model->get_texto(3,$data['opcion'])->num_rows() > 0)  ?  $texto = $this->tabulados_model->get_texto(3,$data['opcion'])->row()->texto  :  '';
			$data['texto'] =  $texto; 
			$texto_2 = ($this->tabulados_model->get_texto(3,$data['opcion'])->num_rows() > 0)  ?  $texto_2 = $this->tabulados_model->get_texto(3,$data['opcion'])->row()->texto_2  :  '';
			$data['texto_2'] =  $texto_2;  		

			$metadata = $this->tabulados_model->get_metadata(3,$data['opcion']); 
			$data['txt_tabulado'] 	= ( $metadata->num_rows()==1 )  ?  $metadata->row()->tabulado  :  ''; 
			$data['txt_contenido'] 	= ( $metadata->num_rows()==1 )  ?  $metadata->row()->contenido  :  ''; 
			$data['txt_casos'] 		= ( $metadata->num_rows()==1 )  ?  $metadata->row()->casos  :  ''; 
			$data['txt_variables'] 	= ( $metadata->num_rows()==1 )  ?  $metadata->row()->variable  :  ''; 
			$data['txt_alternativas'] = ( $metadata->num_rows()==1 )  ?  $metadata->row()->alternativas  :  ''; 
			$data['txt_otro'] 		= ( $metadata->num_rows()==1 )  ?  $metadata->row()->otro  :  ''; 
			$data['txt_faltantes'] 	= ( $metadata->num_rows()==1 )  ?  $metadata->row()->faltantes  :  ''; 
			$data['txt_productor'] 	= ( $metadata->num_rows()==1 )  ?  $metadata->row()->productor :  ''; 
			$data['txt_definiciones'] = ( $metadata->num_rows()==1 )  ?  $metadata->row()->definiciones  :  '';
			
			$data['main_content'] = 'tabulados/comunidad/reporte_233_view';

			$this->load->view('backend/includes/template', $data);		
	}
	public function reporte_232()
	{
			$data['restriccion'] = $this->restriccion;		
			$data['nav'] = TRUE;
			$data['title'] = 'Tabulados Comunidad';	
			$data['nom_tabulados'] = $this->tabulados_model->get_nombre_tabulados();	
			$data['opcion'] = 232;		
			$data['tables'] = $this->comunidad_model->get_tabulado_234();
			$texto = ($this->tabulados_model->get_texto(3,$data['opcion'])->num_rows() > 0)  ?  $texto = $this->tabulados_model->get_texto(3,$data['opcion'])->row()->texto  :  '';
			$data['texto'] =  $texto; 
			$texto_2 = ($this->tabulados_model->get_texto(3,$data['opcion'])->num_rows() > 0)  ?  $texto_2 = $this->tabulados_model->get_texto(3,$data['opcion'])->row()->texto_2  :  '';
			$data['texto_2'] =  $texto_2;  		

			$metadata = $this->tabulados_model->get_metadata(3,$data['opcion']); 
			$data['txt_tabulado'] 	= ( $metadata->num_rows()==1 )  ?  $metadata->row()->tabulado  :  ''; 
			$data['txt_contenido'] 	= ( $metadata->num_rows()==1 )  ?  $metadata->row()->contenido  :  ''; 
			$data['txt_casos'] 		= ( $metadata->num_rows()==1 )  ?  $metadata->row()->casos  :  ''; 
			$data['txt_variables'] 	= ( $metadata->num_rows()==1 )  ?  $metadata->row()->variable  :  ''; 
			$data['txt_alternativas'] = ( $metadata->num_rows()==1 )  ?  $metadata->row()->alternativas  :  ''; 
			$data['txt_otro'] 		= ( $metadata->num_rows()==1 )  ?  $metadata->row()->otro  :  ''; 
			$data['txt_faltantes'] 	= ( $metadata->num_rows()==1 )  ?  $metadata->row()->faltantes  :  ''; 
			$data['txt_productor'] 	= ( $metadata->num_rows()==1 )  ?  $metadata->row()->productor :  ''; 
			$data['txt_definiciones'] = ( $metadata->num_rows()==1 )  ?  $metadata->row()->definiciones  :  '';
			
			$data['main_content'] = 'tabulados/comunidad/reporte_234_view';

			$this->load->view('backend/includes/template', $data);		
	}	

	public function reporte_233()
	{
			$data['restriccion'] = $this->restriccion;		
			$data['nav'] = TRUE;
			$data['title'] = 'Tabulados Comunidad';	
			$data['nom_tabulados'] = $this->tabulados_model->get_nombre_tabulados();	
			$data['opcion'] = 233;		
			$data['tables'] = $this->comunidad_model->get_tabulado_235();
			$texto = ($this->tabulados_model->get_texto(3,$data['opcion'])->num_rows() > 0)  ?  $texto = $this->tabulados_model->get_texto(3,$data['opcion'])->row()->texto  :  '';
			$data['texto'] =  $texto; 
			$texto_2 = ($this->tabulados_model->get_texto(3,$data['opcion'])->num_rows() > 0)  ?  $texto_2 = $this->tabulados_model->get_texto(3,$data['opcion'])->row()->texto_2  :  '';
			$data['texto_2'] =  $texto_2;  		

			$metadata = $this->tabulados_model->get_metadata(3,$data['opcion']); 
			$data['txt_tabulado'] 	= ( $metadata->num_rows()==1 )  ?  $metadata->row()->tabulado  :  ''; 
			$data['txt_contenido'] 	= ( $metadata->num_rows()==1 )  ?  $metadata->row()->contenido  :  ''; 
			$data['txt_casos'] 		= ( $metadata->num_rows()==1 )  ?  $metadata->row()->casos  :  ''; 
			$data['txt_variables'] 	= ( $metadata->num_rows()==1 )  ?  $metadata->row()->variable  :  ''; 
			$data['txt_alternativas'] = ( $metadata->num_rows()==1 )  ?  $metadata->row()->alternativas  :  ''; 
			$data['txt_otro'] 		= ( $metadata->num_rows()==1 )  ?  $metadata->row()->otro  :  ''; 
			$data['txt_faltantes'] 	= ( $metadata->num_rows()==1 )  ?  $metadata->row()->faltantes  :  ''; 
			$data['txt_productor'] 	= ( $metadata->num_rows()==1 )  ?  $metadata->row()->productor :  ''; 
			$data['txt_definiciones'] = ( $metadata->num_rows()==1 )  ?  $metadata->row()->definiciones  :  '';
			
			$data['main_content'] = 'tabulados/comunidad/reporte_235_view';

			$this->load->view('backend/includes/template', $data);		
	}	

	public function reporte_234()
	{
			$data['restriccion'] = $this->restriccion;			
			$data['nav'] = TRUE;
			$data['title'] = 'Tabulados Comunidad';	
			$data['nom_tabulados'] = $this->tabulados_model->get_nombre_tabulados();	
			$data['opcion'] = 234;		
			$data['tables'] = $this->comunidad_model->get_tabulado_236();
			$texto = ($this->tabulados_model->get_texto(3,$data['opcion'])->num_rows() > 0)  ?  $texto = $this->tabulados_model->get_texto(3,$data['opcion'])->row()->texto  :  '';
			$data['texto'] =  $texto; 
			$texto_2 = ($this->tabulados_model->get_texto(3,$data['opcion'])->num_rows() > 0)  ?  $texto_2 = $this->tabulados_model->get_texto(3,$data['opcion'])->row()->texto_2  :  '';
			$data['texto_2'] =  $texto_2;  		

			$metadata = $this->tabulados_model->get_metadata(3,$data['opcion']); 
			$data['txt_tabulado'] 	= ( $metadata->num_rows()==1 )  ?  $metadata->row()->tabulado  :  ''; 
			$data['txt_contenido'] 	= ( $metadata->num_rows()==1 )  ?  $metadata->row()->contenido  :  ''; 
			$data['txt_casos'] 		= ( $metadata->num_rows()==1 )  ?  $metadata->row()->casos  :  ''; 
			$data['txt_variables'] 	= ( $metadata->num_rows()==1 )  ?  $metadata->row()->variable  :  ''; 
			$data['txt_alternativas'] = ( $metadata->num_rows()==1 )  ?  $metadata->row()->alternativas  :  ''; 
			$data['txt_otro'] 		= ( $metadata->num_rows()==1 )  ?  $metadata->row()->otro  :  ''; 
			$data['txt_faltantes'] 	= ( $metadata->num_rows()==1 )  ?  $metadata->row()->faltantes  :  ''; 
			$data['txt_productor'] 	= ( $metadata->num_rows()==1 )  ?  $metadata->row()->productor :  ''; 
			$data['txt_definiciones'] = ( $metadata->num_rows()==1 )  ?  $metadata->row()->definiciones  :  '';
			
			$data['main_content'] = 'tabulados/comunidad/reporte_236_view';

			$this->load->view('backend/includes/template', $data);		
	}	
	public function reporte_235()
	{
			$data['restriccion'] = $this->restriccion;		
			$data['nav'] = TRUE;
			$data['title'] = 'Tabulados Comunidad';	
			$data['nom_tabulados'] = $this->tabulados_model->get_nombre_tabulados();	
			$data['opcion'] = 235;		
			$data['tables'] = $this->comunidad_model->get_tabulado_237();
			$texto = ($this->tabulados_model->get_texto(3,$data['opcion'])->num_rows() > 0)  ?  $texto = $this->tabulados_model->get_texto(3,$data['opcion'])->row()->texto  :  '';
			$data['texto'] =  $texto; 
			$texto_2 = ($this->tabulados_model->get_texto(3,$data['opcion'])->num_rows() > 0)  ?  $texto_2 = $this->tabulados_model->get_texto(3,$data['opcion'])->row()->texto_2  :  '';
			$data['texto_2'] =  $texto_2; 		

			$metadata = $this->tabulados_model->get_metadata(3,$data['opcion']); 
			$data['txt_tabulado'] 	= ( $metadata->num_rows()==1 )  ?  $metadata->row()->tabulado  :  ''; 
			$data['txt_contenido'] 	= ( $metadata->num_rows()==1 )  ?  $metadata->row()->contenido  :  ''; 
			$data['txt_casos'] 		= ( $metadata->num_rows()==1 )  ?  $metadata->row()->casos  :  ''; 
			$data['txt_variables'] 	= ( $metadata->num_rows()==1 )  ?  $metadata->row()->variable  :  ''; 
			$data['txt_alternativas'] = ( $metadata->num_rows()==1 )  ?  $metadata->row()->alternativas  :  ''; 
			$data['txt_otro'] 		= ( $metadata->num_rows()==1 )  ?  $metadata->row()->otro  :  ''; 
			$data['txt_faltantes'] 	= ( $metadata->num_rows()==1 )  ?  $metadata->row()->faltantes  :  ''; 
			$data['txt_productor'] 	= ( $metadata->num_rows()==1 )  ?  $metadata->row()->productor :  ''; 
			$data['txt_definiciones'] = ( $metadata->num_rows()==1 )  ?  $metadata->row()->definiciones  :  '';
					
			$data['main_content'] = 'tabulados/comunidad/reporte_237_view';

			$this->load->view('backend/includes/template', $data);		
	}
	public function reporte_236()
	{
			$data['restriccion'] = $this->restriccion;		
			$data['nav'] = TRUE;
			$data['title'] = 'Tabulados Comunidad';	
			$data['nom_tabulados'] = $this->tabulados_model->get_nombre_tabulados();	
			$data['opcion'] = 236;		
			$data['tables'] = $this->comunidad_model->get_tabulado_238();
			$texto = ($this->tabulados_model->get_texto(3,$data['opcion'])->num_rows() > 0)  ?  $texto = $this->tabulados_model->get_texto(3,$data['opcion'])->row()->texto  :  '';
			$data['texto'] =  $texto; 
			$texto_2 = ($this->tabulados_model->get_texto(3,$data['opcion'])->num_rows() > 0)  ?  $texto_2 = $this->tabulados_model->get_texto(3,$data['opcion'])->row()->texto_2  :  '';
			$data['texto_2'] =  $texto_2;  		

			$metadata = $this->tabulados_model->get_metadata(3,$data['opcion']); 
			$data['txt_tabulado'] 	= ( $metadata->num_rows()==1 )  ?  $metadata->row()->tabulado  :  ''; 
			$data['txt_contenido'] 	= ( $metadata->num_rows()==1 )  ?  $metadata->row()->contenido  :  ''; 
			$data['txt_casos'] 		= ( $metadata->num_rows()==1 )  ?  $metadata->row()->casos  :  ''; 
			$data['txt_variables'] 	= ( $metadata->num_rows()==1 )  ?  $metadata->row()->variable  :  ''; 
			$data['txt_alternativas'] = ( $metadata->num_rows()==1 )  ?  $metadata->row()->alternativas  :  ''; 
			$data['txt_otro'] 		= ( $metadata->num_rows()==1 )  ?  $metadata->row()->otro  :  ''; 
			$data['txt_faltantes'] 	= ( $metadata->num_rows()==1 )  ?  $metadata->row()->faltantes  :  ''; 
			$data['txt_productor'] 	= ( $metadata->num_rows()==1 )  ?  $metadata->row()->productor :  ''; 
			$data['txt_definiciones'] = ( $metadata->num_rows()==1 )  ?  $metadata->row()->definiciones  :  '';
			
			$data['main_content'] = 'tabulados/comunidad/reporte_238_view';

			$this->load->view('backend/includes/template', $data);		
	}	

	public function reporte_237()
	{
			$data['restriccion'] = $this->restriccion;			
			$data['nav'] = TRUE;
			$data['title'] = 'Tabulados Comunidad';	
			$data['nom_tabulados'] = $this->tabulados_model->get_nombre_tabulados();	
			$data['opcion'] = 237;		
			$data['tables'] = $this->comunidad_model->get_tabulado_239();
			$texto = ($this->tabulados_model->get_texto(3,$data['opcion'])->num_rows() > 0)  ?  $texto = $this->tabulados_model->get_texto(3,$data['opcion'])->row()->texto  :  '';
			$data['texto'] =  $texto; 
			$texto_2 = ($this->tabulados_model->get_texto(3,$data['opcion'])->num_rows() > 0)  ?  $texto_2 = $this->tabulados_model->get_texto(3,$data['opcion'])->row()->texto_2  :  '';
			$data['texto_2'] =  $texto_2;  		

			$metadata = $this->tabulados_model->get_metadata(3,$data['opcion']); 
			$data['txt_tabulado'] 	= ( $metadata->num_rows()==1 )  ?  $metadata->row()->tabulado  :  ''; 
			$data['txt_contenido'] 	= ( $metadata->num_rows()==1 )  ?  $metadata->row()->contenido  :  ''; 
			$data['txt_casos'] 		= ( $metadata->num_rows()==1 )  ?  $metadata->row()->casos  :  ''; 
			$data['txt_variables'] 	= ( $metadata->num_rows()==1 )  ?  $metadata->row()->variable  :  ''; 
			$data['txt_alternativas'] = ( $metadata->num_rows()==1 )  ?  $metadata->row()->alternativas  :  ''; 
			$data['txt_otro'] 		= ( $metadata->num_rows()==1 )  ?  $metadata->row()->otro  :  ''; 
			$data['txt_faltantes'] 	= ( $metadata->num_rows()==1 )  ?  $metadata->row()->faltantes  :  ''; 
			$data['txt_productor'] 	= ( $metadata->num_rows()==1 )  ?  $metadata->row()->productor :  ''; 
			$data['txt_definiciones'] = ( $metadata->num_rows()==1 )  ?  $metadata->row()->definiciones  :  '';
			
			$data['main_content'] = 'tabulados/comunidad/reporte_239_view';

			$this->load->view('backend/includes/template', $data);		
	}	

	public function reporte_238()
	{
			$data['restriccion'] = $this->restriccion;			
			$data['nav'] = TRUE;
			$data['title'] = 'Tabulados Comunidad';	
			$data['nom_tabulados'] = $this->tabulados_model->get_nombre_tabulados();	
			$data['opcion'] = 238;		
			$data['tables'] = $this->comunidad_model->get_tabulado_240();
			$texto = ($this->tabulados_model->get_texto(3,$data['opcion'])->num_rows() > 0)  ?  $texto = $this->tabulados_model->get_texto(3,$data['opcion'])->row()->texto  :  '';
			$data['texto'] =  $texto; 
			$texto_2 = ($this->tabulados_model->get_texto(3,$data['opcion'])->num_rows() > 0)  ?  $texto_2 = $this->tabulados_model->get_texto(3,$data['opcion'])->row()->texto_2  :  '';
			$data['texto_2'] =  $texto_2;  		

			$metadata = $this->tabulados_model->get_metadata(3,$data['opcion']); 
			$data['txt_tabulado'] 	= ( $metadata->num_rows()==1 )  ?  $metadata->row()->tabulado  :  ''; 
			$data['txt_contenido'] 	= ( $metadata->num_rows()==1 )  ?  $metadata->row()->contenido  :  ''; 
			$data['txt_casos'] 		= ( $metadata->num_rows()==1 )  ?  $metadata->row()->casos  :  ''; 
			$data['txt_variables'] 	= ( $metadata->num_rows()==1 )  ?  $metadata->row()->variable  :  ''; 
			$data['txt_alternativas'] = ( $metadata->num_rows()==1 )  ?  $metadata->row()->alternativas  :  ''; 
			$data['txt_otro'] 		= ( $metadata->num_rows()==1 )  ?  $metadata->row()->otro  :  ''; 
			$data['txt_faltantes'] 	= ( $metadata->num_rows()==1 )  ?  $metadata->row()->faltantes  :  ''; 
			$data['txt_productor'] 	= ( $metadata->num_rows()==1 )  ?  $metadata->row()->productor :  ''; 
			$data['txt_definiciones'] = ( $metadata->num_rows()==1 )  ?  $metadata->row()->definiciones  :  '';
			
			$data['main_content'] = 'tabulados/comunidad/reporte_240_view';

			$this->load->view('backend/includes/template', $data);		
	}

	public function reporte_239()
	{
			$data['restriccion'] = $this->restriccion;	
			$data['nav'] = TRUE;
			$data['title'] = 'Tabulados Comunidad';	
			$data['nom_tabulados'] = $this->tabulados_model->get_nombre_tabulados();	
			$data['opcion'] = 239;		
			$data['tables'] = $this->comunidad_model->get_tabulado_241();
			$texto = ($this->tabulados_model->get_texto(3,$data['opcion'])->num_rows() > 0)  ?  $texto = $this->tabulados_model->get_texto(3,$data['opcion'])->row()->texto  :  '';
			$data['texto'] =  $texto; 
			$texto_2 = ($this->tabulados_model->get_texto(3,$data['opcion'])->num_rows() > 0)  ?  $texto_2 = $this->tabulados_model->get_texto(3,$data['opcion'])->row()->texto_2  :  '';
			$data['texto_2'] =  $texto_2;  		

			$metadata = $this->tabulados_model->get_metadata(3,$data['opcion']); 
			$data['txt_tabulado'] 	= ( $metadata->num_rows()==1 )  ?  $metadata->row()->tabulado  :  ''; 
			$data['txt_contenido'] 	= ( $metadata->num_rows()==1 )  ?  $metadata->row()->contenido  :  ''; 
			$data['txt_casos'] 		= ( $metadata->num_rows()==1 )  ?  $metadata->row()->casos  :  ''; 
			$data['txt_variables'] 	= ( $metadata->num_rows()==1 )  ?  $metadata->row()->variable  :  ''; 
			$data['txt_alternativas'] = ( $metadata->num_rows()==1 )  ?  $metadata->row()->alternativas  :  ''; 
			$data['txt_otro'] 		= ( $metadata->num_rows()==1 )  ?  $metadata->row()->otro  :  ''; 
			$data['txt_faltantes'] 	= ( $metadata->num_rows()==1 )  ?  $metadata->row()->faltantes  :  ''; 
			$data['txt_productor'] 	= ( $metadata->num_rows()==1 )  ?  $metadata->row()->productor :  ''; 
			$data['txt_definiciones'] = ( $metadata->num_rows()==1 )  ?  $metadata->row()->definiciones  :  '';
			
			$data['main_content'] = 'tabulados/comunidad/reporte_241_view';

			$this->load->view('backend/includes/template', $data);		
	}

	public function reporte_240()
	{
			$data['restriccion'] = $this->restriccion;		
			$data['nav'] = TRUE;
			$data['title'] = 'Tabulados Comunidad';	
			$data['nom_tabulados'] = $this->tabulados_model->get_nombre_tabulados();	
			$data['opcion'] = 240;		
			$data['tables'] = $this->comunidad_model->get_tabulado_242();
			$texto = ($this->tabulados_model->get_texto(3,$data['opcion'])->num_rows() > 0)  ?  $texto = $this->tabulados_model->get_texto(3,$data['opcion'])->row()->texto  :  '';
			$data['texto'] =  $texto; 
			$texto_2 = ($this->tabulados_model->get_texto(3,$data['opcion'])->num_rows() > 0)  ?  $texto_2 = $this->tabulados_model->get_texto(3,$data['opcion'])->row()->texto_2  :  '';
			$data['texto_2'] =  $texto_2;  		

			$metadata = $this->tabulados_model->get_metadata(3,$data['opcion']); 
			$data['txt_tabulado'] 	= ( $metadata->num_rows()==1 )  ?  $metadata->row()->tabulado  :  ''; 
			$data['txt_contenido'] 	= ( $metadata->num_rows()==1 )  ?  $metadata->row()->contenido  :  ''; 
			$data['txt_casos'] 		= ( $metadata->num_rows()==1 )  ?  $metadata->row()->casos  :  ''; 
			$data['txt_variables'] 	= ( $metadata->num_rows()==1 )  ?  $metadata->row()->variable  :  ''; 
			$data['txt_alternativas'] = ( $metadata->num_rows()==1 )  ?  $metadata->row()->alternativas  :  ''; 
			$data['txt_otro'] 		= ( $metadata->num_rows()==1 )  ?  $metadata->row()->otro  :  ''; 
			$data['txt_faltantes'] 	= ( $metadata->num_rows()==1 )  ?  $metadata->row()->faltantes  :  ''; 
			$data['txt_productor'] 	= ( $metadata->num_rows()==1 )  ?  $metadata->row()->productor :  ''; 
			$data['txt_definiciones'] = ( $metadata->num_rows()==1 )  ?  $metadata->row()->definiciones  :  '';
			
			$data['main_content'] = 'tabulados/comunidad/reporte_242_view';

			$this->load->view('backend/includes/template', $data);		
	}

	public function reporte_241()
	{
			$data['restriccion'] = $this->restriccion;		
			$data['nav'] = TRUE;
			$data['title'] = 'Tabulados Comunidad';	
			$data['nom_tabulados'] = $this->tabulados_model->get_nombre_tabulados();	
			$data['opcion'] = 241;		
			$data['tables'] = $this->comunidad_model->get_tabulado_243();
			$texto = ($this->tabulados_model->get_texto(3,$data['opcion'])->num_rows() > 0)  ?  $texto = $this->tabulados_model->get_texto(3,$data['opcion'])->row()->texto  :  '';
			$data['texto'] =  $texto; 
			$texto_2 = ($this->tabulados_model->get_texto(3,$data['opcion'])->num_rows() > 0)  ?  $texto_2 = $this->tabulados_model->get_texto(3,$data['opcion'])->row()->texto_2  :  '';
			$data['texto_2'] =  $texto_2;  		

			$metadata = $this->tabulados_model->get_metadata(3,$data['opcion']); 
			$data['txt_tabulado'] 	= ( $metadata->num_rows()==1 )  ?  $metadata->row()->tabulado  :  ''; 
			$data['txt_contenido'] 	= ( $metadata->num_rows()==1 )  ?  $metadata->row()->contenido  :  ''; 
			$data['txt_casos'] 		= ( $metadata->num_rows()==1 )  ?  $metadata->row()->casos  :  ''; 
			$data['txt_variables'] 	= ( $metadata->num_rows()==1 )  ?  $metadata->row()->variable  :  ''; 
			$data['txt_alternativas'] = ( $metadata->num_rows()==1 )  ?  $metadata->row()->alternativas  :  ''; 
			$data['txt_otro'] 		= ( $metadata->num_rows()==1 )  ?  $metadata->row()->otro  :  ''; 
			$data['txt_faltantes'] 	= ( $metadata->num_rows()==1 )  ?  $metadata->row()->faltantes  :  ''; 
			$data['txt_productor'] 	= ( $metadata->num_rows()==1 )  ?  $metadata->row()->productor :  ''; 
			$data['txt_definiciones'] = ( $metadata->num_rows()==1 )  ?  $metadata->row()->definiciones  :  '';
			
			$data['main_content'] = 'tabulados/comunidad/reporte_243_view';

			$this->load->view('backend/includes/template', $data);		
	}

	public function reporte_242()
	{
			$data['restriccion'] = $this->restriccion;		
			$data['nav'] = TRUE;
			$data['title'] = 'Tabulados Comunidad';	
			$data['nom_tabulados'] = $this->tabulados_model->get_nombre_tabulados();	
			$data['opcion'] = 242;		
			$data['tables'] = $this->comunidad_model->get_tabulado_244();
			$texto = ($this->tabulados_model->get_texto(3,$data['opcion'])->num_rows() > 0)  ?  $texto = $this->tabulados_model->get_texto(3,$data['opcion'])->row()->texto  :  '';
			$data['texto'] =  $texto; 
			$texto_2 = ($this->tabulados_model->get_texto(3,$data['opcion'])->num_rows() > 0)  ?  $texto_2 = $this->tabulados_model->get_texto(3,$data['opcion'])->row()->texto_2  :  '';
			$data['texto_2'] =  $texto_2;  		

			$metadata = $this->tabulados_model->get_metadata(3,$data['opcion']); 
			$data['txt_tabulado'] 	= ( $metadata->num_rows()==1 )  ?  $metadata->row()->tabulado  :  ''; 
			$data['txt_contenido'] 	= ( $metadata->num_rows()==1 )  ?  $metadata->row()->contenido  :  ''; 
			$data['txt_casos'] 		= ( $metadata->num_rows()==1 )  ?  $metadata->row()->casos  :  ''; 
			$data['txt_variables'] 	= ( $metadata->num_rows()==1 )  ?  $metadata->row()->variable  :  ''; 
			$data['txt_alternativas'] = ( $metadata->num_rows()==1 )  ?  $metadata->row()->alternativas  :  ''; 
			$data['txt_otro'] 		= ( $metadata->num_rows()==1 )  ?  $metadata->row()->otro  :  ''; 
			$data['txt_faltantes'] 	= ( $metadata->num_rows()==1 )  ?  $metadata->row()->faltantes  :  ''; 
			$data['txt_productor'] 	= ( $metadata->num_rows()==1 )  ?  $metadata->row()->productor :  ''; 
			$data['txt_definiciones'] = ( $metadata->num_rows()==1 )  ?  $metadata->row()->definiciones  :  '';
			
			$data['main_content'] = 'tabulados/comunidad/reporte_244_view';

			$this->load->view('backend/includes/template', $data);		
	}

	public function reporte_243()
	{
			$data['restriccion'] = $this->restriccion;		
			$data['nav'] = TRUE;
			$data['title'] = 'Tabulados Comunidad';	
			$data['nom_tabulados'] = $this->tabulados_model->get_nombre_tabulados();	
			$data['opcion'] = 243;		
			$data['tables'] = $this->comunidad_model->get_tabulado_245();
			$texto = ($this->tabulados_model->get_texto(3,$data['opcion'])->num_rows() > 0)  ?  $texto = $this->tabulados_model->get_texto(3,$data['opcion'])->row()->texto  :  '';
			$data['texto'] =  $texto; 
			$texto_2 = ($this->tabulados_model->get_texto(3,$data['opcion'])->num_rows() > 0)  ?  $texto_2 = $this->tabulados_model->get_texto(3,$data['opcion'])->row()->texto_2  :  '';
			$data['texto_2'] =  $texto_2;  		

			$metadata = $this->tabulados_model->get_metadata(3,$data['opcion']); 
			$data['txt_tabulado'] 	= ( $metadata->num_rows()==1 )  ?  $metadata->row()->tabulado  :  ''; 
			$data['txt_contenido'] 	= ( $metadata->num_rows()==1 )  ?  $metadata->row()->contenido  :  ''; 
			$data['txt_casos'] 		= ( $metadata->num_rows()==1 )  ?  $metadata->row()->casos  :  ''; 
			$data['txt_variables'] 	= ( $metadata->num_rows()==1 )  ?  $metadata->row()->variable  :  ''; 
			$data['txt_alternativas'] = ( $metadata->num_rows()==1 )  ?  $metadata->row()->alternativas  :  ''; 
			$data['txt_otro'] 		= ( $metadata->num_rows()==1 )  ?  $metadata->row()->otro  :  ''; 
			$data['txt_faltantes'] 	= ( $metadata->num_rows()==1 )  ?  $metadata->row()->faltantes  :  ''; 
			$data['txt_productor'] 	= ( $metadata->num_rows()==1 )  ?  $metadata->row()->productor :  ''; 
			$data['txt_definiciones'] = ( $metadata->num_rows()==1 )  ?  $metadata->row()->definiciones  :  '';
			
			$data['main_content'] = 'tabulados/comunidad/reporte_245_view';

			$this->load->view('backend/includes/template', $data);		
	}
	public function reporte_244()
	{
			$data['restriccion'] = $this->restriccion;		
			$data['nav'] = TRUE;
			$data['title'] = 'Tabulados Comunidad';	
			$data['nom_tabulados'] = $this->tabulados_model->get_nombre_tabulados();	
			$data['opcion'] = 244;		
			$data['tables'] = $this->comunidad_model->get_tabulado_246();
			$texto = ($this->tabulados_model->get_texto(3,$data['opcion'])->num_rows() > 0)  ?  $texto = $this->tabulados_model->get_texto(3,$data['opcion'])->row()->texto  :  '';
			$data['texto'] =  $texto; 
			$texto_2 = ($this->tabulados_model->get_texto(3,$data['opcion'])->num_rows() > 0)  ?  $texto_2 = $this->tabulados_model->get_texto(3,$data['opcion'])->row()->texto_2  :  '';
			$data['texto_2'] =  $texto_2;  		

			$metadata = $this->tabulados_model->get_metadata(3,$data['opcion']); 
			$data['txt_tabulado'] 	= ( $metadata->num_rows()==1 )  ?  $metadata->row()->tabulado  :  ''; 
			$data['txt_contenido'] 	= ( $metadata->num_rows()==1 )  ?  $metadata->row()->contenido  :  ''; 
			$data['txt_casos'] 		= ( $metadata->num_rows()==1 )  ?  $metadata->row()->casos  :  ''; 
			$data['txt_variables'] 	= ( $metadata->num_rows()==1 )  ?  $metadata->row()->variable  :  ''; 
			$data['txt_alternativas'] = ( $metadata->num_rows()==1 )  ?  $metadata->row()->alternativas  :  ''; 
			$data['txt_otro'] 		= ( $metadata->num_rows()==1 )  ?  $metadata->row()->otro  :  ''; 
			$data['txt_faltantes'] 	= ( $metadata->num_rows()==1 )  ?  $metadata->row()->faltantes  :  ''; 
			$data['txt_productor'] 	= ( $metadata->num_rows()==1 )  ?  $metadata->row()->productor :  ''; 
			$data['txt_definiciones'] = ( $metadata->num_rows()==1 )  ?  $metadata->row()->definiciones  :  '';
			
			$data['main_content'] = 'tabulados/comunidad/reporte_246_view';

			$this->load->view('backend/includes/template', $data);		
	}

	public function reporte_245()
	{
			$data['restriccion'] = $this->restriccion;			
			$data['nav'] = TRUE;
			$data['title'] = 'Tabulados Comunidad';	
			$data['nom_tabulados'] = $this->tabulados_model->get_nombre_tabulados();	
			$data['opcion'] = 245;		
			$data['tables'] = $this->comunidad_model->get_tabulado_247();
			$texto = ($this->tabulados_model->get_texto(3,$data['opcion'])->num_rows() > 0)  ?  $texto = $this->tabulados_model->get_texto(3,$data['opcion'])->row()->texto  :  '';
			$data['texto'] =  $texto; 
			$texto_2 = ($this->tabulados_model->get_texto(3,$data['opcion'])->num_rows() > 0)  ?  $texto_2 = $this->tabulados_model->get_texto(3,$data['opcion'])->row()->texto_2  :  '';
			$data['texto_2'] =  $texto_2; 		

			$metadata = $this->tabulados_model->get_metadata(3,$data['opcion']); 
			$data['txt_tabulado'] 	= ( $metadata->num_rows()==1 )  ?  $metadata->row()->tabulado  :  ''; 
			$data['txt_contenido'] 	= ( $metadata->num_rows()==1 )  ?  $metadata->row()->contenido  :  ''; 
			$data['txt_casos'] 		= ( $metadata->num_rows()==1 )  ?  $metadata->row()->casos  :  ''; 
			$data['txt_variables'] 	= ( $metadata->num_rows()==1 )  ?  $metadata->row()->variable  :  ''; 
			$data['txt_alternativas'] = ( $metadata->num_rows()==1 )  ?  $metadata->row()->alternativas  :  ''; 
			$data['txt_otro'] 		= ( $metadata->num_rows()==1 )  ?  $metadata->row()->otro  :  ''; 
			$data['txt_faltantes'] 	= ( $metadata->num_rows()==1 )  ?  $metadata->row()->faltantes  :  ''; 
			$data['txt_productor'] 	= ( $metadata->num_rows()==1 )  ?  $metadata->row()->productor :  ''; 
			$data['txt_definiciones'] = ( $metadata->num_rows()==1 )  ?  $metadata->row()->definiciones  :  '';
 			
			$data['main_content'] = 'tabulados/comunidad/reporte_247_view';

			$this->load->view('backend/includes/template', $data);		
	}

	public function reporte_246()
	{
			$data['restriccion'] = $this->restriccion;		
			$data['nav'] = TRUE;
			$data['title'] = 'Tabulados Comunidad';	
			$data['nom_tabulados'] = $this->tabulados_model->get_nombre_tabulados();	
			$data['opcion'] = 246;		
			$data['tables'] = $this->comunidad_model->get_tabulado_248();
			$texto = ($this->tabulados_model->get_texto(3,$data['opcion'])->num_rows() > 0)  ?  $texto = $this->tabulados_model->get_texto(3,$data['opcion'])->row()->texto  :  '';
			$data['texto'] =  $texto; 
			$texto_2 = ($this->tabulados_model->get_texto(3,$data['opcion'])->num_rows() > 0)  ?  $texto_2 = $this->tabulados_model->get_texto(3,$data['opcion'])->row()->texto_2  :  '';
			$data['texto_2'] =  $texto_2;  		

			$metadata = $this->tabulados_model->get_metadata(3,$data['opcion']); 
			$data['txt_tabulado'] 	= ( $metadata->num_rows()==1 )  ?  $metadata->row()->tabulado  :  ''; 
			$data['txt_contenido'] 	= ( $metadata->num_rows()==1 )  ?  $metadata->row()->contenido  :  ''; 
			$data['txt_casos'] 		= ( $metadata->num_rows()==1 )  ?  $metadata->row()->casos  :  ''; 
			$data['txt_variables'] 	= ( $metadata->num_rows()==1 )  ?  $metadata->row()->variable  :  ''; 
			$data['txt_alternativas'] = ( $metadata->num_rows()==1 )  ?  $metadata->row()->alternativas  :  ''; 
			$data['txt_otro'] 		= ( $metadata->num_rows()==1 )  ?  $metadata->row()->otro  :  ''; 
			$data['txt_faltantes'] 	= ( $metadata->num_rows()==1 )  ?  $metadata->row()->faltantes  :  ''; 
			$data['txt_productor'] 	= ( $metadata->num_rows()==1 )  ?  $metadata->row()->productor :  ''; 
			$data['txt_definiciones'] = ( $metadata->num_rows()==1 )  ?  $metadata->row()->definiciones  :  '';
			
			$data['main_content'] = 'tabulados/comunidad/reporte_248_view';

			$this->load->view('backend/includes/template', $data);		
	}

	public function reporte_247()
	{
			$data['restriccion'] = $this->restriccion;		
			$data['nav'] = TRUE;
			$data['title'] = 'Tabulados Comunidad';	
			$data['nom_tabulados'] = $this->tabulados_model->get_nombre_tabulados();	
			$data['opcion'] = 247;		
			$data['tables'] = $this->comunidad_model->get_tabulado_249();
			$texto = ($this->tabulados_model->get_texto(3,$data['opcion'])->num_rows() > 0)  ?  $texto = $this->tabulados_model->get_texto(3,$data['opcion'])->row()->texto  :  '';
			$data['texto'] =  $texto; 
			$texto_2 = ($this->tabulados_model->get_texto(3,$data['opcion'])->num_rows() > 0)  ?  $texto_2 = $this->tabulados_model->get_texto(3,$data['opcion'])->row()->texto_2  :  '';
			$data['texto_2'] =  $texto_2;  		

			$metadata = $this->tabulados_model->get_metadata(3,$data['opcion']); 
			$data['txt_tabulado'] 	= ( $metadata->num_rows()==1 )  ?  $metadata->row()->tabulado  :  ''; 
			$data['txt_contenido'] 	= ( $metadata->num_rows()==1 )  ?  $metadata->row()->contenido  :  ''; 
			$data['txt_casos'] 		= ( $metadata->num_rows()==1 )  ?  $metadata->row()->casos  :  ''; 
			$data['txt_variables'] 	= ( $metadata->num_rows()==1 )  ?  $metadata->row()->variable  :  ''; 
			$data['txt_alternativas'] = ( $metadata->num_rows()==1 )  ?  $metadata->row()->alternativas  :  ''; 
			$data['txt_otro'] 		= ( $metadata->num_rows()==1 )  ?  $metadata->row()->otro  :  ''; 
			$data['txt_faltantes'] 	= ( $metadata->num_rows()==1 )  ?  $metadata->row()->faltantes  :  ''; 
			$data['txt_productor'] 	= ( $metadata->num_rows()==1 )  ?  $metadata->row()->productor :  ''; 
			$data['txt_definiciones'] = ( $metadata->num_rows()==1 )  ?  $metadata->row()->definiciones  :  '';
			
			$data['main_content'] = 'tabulados/comunidad/reporte_249_view';

			$this->load->view('backend/includes/template', $data);		
	}

	public function reporte_248()
	{
			$data['restriccion'] = $this->restriccion;		
			$data['nav'] = TRUE;
			$data['title'] = 'Tabulados Comunidad';	
			$data['nom_tabulados'] = $this->tabulados_model->get_nombre_tabulados();	
			$data['opcion'] = 248;		
			$data['tables'] = $this->comunidad_model->get_tabulado_250();
			$texto = ($this->tabulados_model->get_texto(3,$data['opcion'])->num_rows() > 0)  ?  $texto = $this->tabulados_model->get_texto(3,$data['opcion'])->row()->texto  :  '';
			$data['texto'] =  $texto; 
			$texto_2 = ($this->tabulados_model->get_texto(3,$data['opcion'])->num_rows() > 0)  ?  $texto_2 = $this->tabulados_model->get_texto(3,$data['opcion'])->row()->texto_2  :  '';
			$data['texto_2'] =  $texto_2;  		

			$metadata = $this->tabulados_model->get_metadata(3,$data['opcion']); 
			$data['txt_tabulado'] 	= ( $metadata->num_rows()==1 )  ?  $metadata->row()->tabulado  :  ''; 
			$data['txt_contenido'] 	= ( $metadata->num_rows()==1 )  ?  $metadata->row()->contenido  :  ''; 
			$data['txt_casos'] 		= ( $metadata->num_rows()==1 )  ?  $metadata->row()->casos  :  ''; 
			$data['txt_variables'] 	= ( $metadata->num_rows()==1 )  ?  $metadata->row()->variable  :  ''; 
			$data['txt_alternativas'] = ( $metadata->num_rows()==1 )  ?  $metadata->row()->alternativas  :  ''; 
			$data['txt_otro'] 		= ( $metadata->num_rows()==1 )  ?  $metadata->row()->otro  :  ''; 
			$data['txt_faltantes'] 	= ( $metadata->num_rows()==1 )  ?  $metadata->row()->faltantes  :  ''; 
			$data['txt_productor'] 	= ( $metadata->num_rows()==1 )  ?  $metadata->row()->productor :  ''; 
			$data['txt_definiciones'] = ( $metadata->num_rows()==1 )  ?  $metadata->row()->definiciones  :  '';
			
			$data['main_content'] = 'tabulados/comunidad/reporte_250_view';

			$this->load->view('backend/includes/template', $data);		
	}

	public function reporte_249()
	{
			$data['restriccion'] = $this->restriccion;		
			$data['nav'] = TRUE;
			$data['title'] = 'Tabulados Comunidad';	
			$data['nom_tabulados'] = $this->tabulados_model->get_nombre_tabulados();	
			$data['opcion'] = 249;		
			$data['tables'] = $this->comunidad_model->get_tabulado_251();
			$texto = ($this->tabulados_model->get_texto(3,$data['opcion'])->num_rows() > 0)  ?  $texto = $this->tabulados_model->get_texto(3,$data['opcion'])->row()->texto  :  '';
			$data['texto'] =  $texto; 
			$texto_2 = ($this->tabulados_model->get_texto(3,$data['opcion'])->num_rows() > 0)  ?  $texto_2 = $this->tabulados_model->get_texto(3,$data['opcion'])->row()->texto_2  :  '';
			$data['texto_2'] =  $texto_2;  		

			$metadata = $this->tabulados_model->get_metadata(3,$data['opcion']); 
			$data['txt_tabulado'] 	= ( $metadata->num_rows()==1 )  ?  $metadata->row()->tabulado  :  ''; 
			$data['txt_contenido'] 	= ( $metadata->num_rows()==1 )  ?  $metadata->row()->contenido  :  ''; 
			$data['txt_casos'] 		= ( $metadata->num_rows()==1 )  ?  $metadata->row()->casos  :  ''; 
			$data['txt_variables'] 	= ( $metadata->num_rows()==1 )  ?  $metadata->row()->variable  :  ''; 
			$data['txt_alternativas'] = ( $metadata->num_rows()==1 )  ?  $metadata->row()->alternativas  :  ''; 
			$data['txt_otro'] 		= ( $metadata->num_rows()==1 )  ?  $metadata->row()->otro  :  ''; 
			$data['txt_faltantes'] 	= ( $metadata->num_rows()==1 )  ?  $metadata->row()->faltantes  :  ''; 
			$data['txt_productor'] 	= ( $metadata->num_rows()==1 )  ?  $metadata->row()->productor :  ''; 
			$data['txt_definiciones'] = ( $metadata->num_rows()==1 )  ?  $metadata->row()->definiciones  :  '';
			
			$data['main_content'] = 'tabulados/comunidad/reporte_251_view';

			$this->load->view('backend/includes/template', $data);		
	}

	public function reporte_250()
	{
			$data['restriccion'] = $this->restriccion;		
			$data['nav'] = TRUE;
			$data['title'] = 'Tabulados Comunidad';	
			$data['nom_tabulados'] = $this->tabulados_model->get_nombre_tabulados();	
			$data['opcion'] = 250;		
			$data['tables'] = $this->comunidad_model->get_tabulado_252();
			$texto = ($this->tabulados_model->get_texto(3,$data['opcion'])->num_rows() > 0)  ?  $texto = $this->tabulados_model->get_texto(3,$data['opcion'])->row()->texto  :  '';
			$data['texto'] =  $texto; 
			$texto_2 = ($this->tabulados_model->get_texto(3,$data['opcion'])->num_rows() > 0)  ?  $texto_2 = $this->tabulados_model->get_texto(3,$data['opcion'])->row()->texto_2  :  '';
			$data['texto_2'] =  $texto_2;  		

			$metadata = $this->tabulados_model->get_metadata(3,$data['opcion']); 
			$data['txt_tabulado'] 	= ( $metadata->num_rows()==1 )  ?  $metadata->row()->tabulado  :  ''; 
			$data['txt_contenido'] 	= ( $metadata->num_rows()==1 )  ?  $metadata->row()->contenido  :  ''; 
			$data['txt_casos'] 		= ( $metadata->num_rows()==1 )  ?  $metadata->row()->casos  :  ''; 
			$data['txt_variables'] 	= ( $metadata->num_rows()==1 )  ?  $metadata->row()->variable  :  ''; 
			$data['txt_alternativas'] = ( $metadata->num_rows()==1 )  ?  $metadata->row()->alternativas  :  ''; 
			$data['txt_otro'] 		= ( $metadata->num_rows()==1 )  ?  $metadata->row()->otro  :  ''; 
			$data['txt_faltantes'] 	= ( $metadata->num_rows()==1 )  ?  $metadata->row()->faltantes  :  ''; 
			$data['txt_productor'] 	= ( $metadata->num_rows()==1 )  ?  $metadata->row()->productor :  ''; 
			$data['txt_definiciones'] = ( $metadata->num_rows()==1 )  ?  $metadata->row()->definiciones  :  '';
			
			$data['main_content'] = 'tabulados/comunidad/reporte_252_view';

			$this->load->view('backend/includes/template', $data);		
	}

}
