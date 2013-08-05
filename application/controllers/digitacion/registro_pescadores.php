<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
session_start();
class Registro_pescadores extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		$this->load->helper(array('form', 'url'));
		$this->load->library('form_validation');
		$this->load->library('security');
		$this->load->library('tank_auth');
		$this->lang->load('tank_auth');	
		$this->load->model('ubigeo_model');	
		$this->load->model('marco_model');
		$this->load->model('pesca_piloto_model');
		$this->load->model('registro_pescadores_model');
		$this->load->model('registro_pescadores_dat_model');
		$this->load->library('table');
		$this->load->library('datatables');
		$this->load->model('ubigeo_piloto_model');
		$this->load->helper('date');
		date_default_timezone_set('America/Lima');	

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
		} 
		else {

			$data['nav'] = TRUE;
			$data['title'] = 'Formato de Registro';
			$data['main_content'] = 'digitacion/forms/registro_pescadores_form';
			$data['option'] = 'digitacion/registro_pescadores_view';
			  
			//$odei = array();
			foreach ($this->marco_model->get_odei($this->tank_auth->get_ubigeo())->result() as $key ) {
				$odei[] = $key->ODEI_COD;
			}
			$data['departamento'] = $this->marco_model->get_dpto_by_odei($odei); 
			$data['tables'] = NULL; // tabla vacia
			$data['opx'] = ''; // anchor oculto
			$data['num_filas'] 	= 0; //habilita btn registrar
			$data['num_filas_t']= 0; //habilita btn registrar			
			$data['error'] =0;
			$data['detalle'] = FALSE;

			$data['CCDD'] = '';
			$data['NOM_DD_c'] = '-';
			$data['CCPP'] = '';
			$data['NOM_PP_c'] = '-';
			$data['CCDI'] = '';
			$data['NOM_DI_c'] = '-';
			$data['COD_CCPP'] = '';
			$data['NOM_CCPP_c'] = '-';
			$data['CCPP_PROC_c'] = '';
			$data['CCPP_CODPROC'] = '-';			
			$data['CAT'] = '';
			$data['NOM_AUT'] = '';
			$data['DNI_AUT'] = '';
			$data['F_D'] = '';
			$data['F_M'] = '';
			$data['T_F_D'] = '';
			$data['T_PES'] = '';
			$data['T_ACUI'] = '';
			$data['T_PES_ACUI'] = '';
			$data['T_EMB'] = '';
			$data['NOM_EMP'] = '';
			$data['DNI_EMP'] = '';
			$data['OBS'] = '';

			$opcion = $this->input->post('send');

			if ($opcion==='Guardar'){

				if ($this->tank_auth->get_ubigeo()<99) {
				
					//VALIDA si el CCPP ya fue registrado				
					$dep = $this->input->post('CCDD');
					$prov = $this->input->post('CCPP');
					$dist = $this->input->post('CCDI');
					$ccpp = $this->input->post('CCPP_CODPROC');

					$udra = $this->registro_pescadores_model->consulta_udra($dep,$prov,$dist,$ccpp);
					if($udra->num_rows() == 0){
						$this->session->set_flashdata('msgbox','UDRA');
						redirect('/digitacion/registro_pescadores');
					}

					if($this->registro_pescadores_model->get_centro_poblado($dep,$prov,$dist,$ccpp) > 0){
						$this->session->set_flashdata('msgbox','CCPP');
						redirect('/digitacion/registro_pescadores');
					}

					$this->form_validation->set_rules('NOM_DD_f','DEPARTAMENTO','required|alpha_numeric');
					$this->form_validation->set_rules('CCDD','CODIGO','required|numeric');
					$this->form_validation->set_rules('NOM_PP_f','PROVINCIA','required|alpha_numeric');
					$this->form_validation->set_rules('CCPP','CODIGO','required|numeric');
					$this->form_validation->set_rules('NOM_DI_f','DISTRITO','required|alpha_numeric');
					$this->form_validation->set_rules('CCDI','CODIGO','required|numeric');
					$this->form_validation->set_rules('NOM_CCPP_f','CENTRO POBLADO','required|alpha_numeric');
					$this->form_validation->set_rules('COD_CCPP','CODIGO','required|numeric|centro_poblado');

					$this->form_validation->set_rules('CCPP_PROC_f','CENTRO POBLADO','required|alpha_numeric');
					$this->form_validation->set_rules('CCPP_CODPROC','CODIGO','required|numeric|centro_poblado');				

					$this->form_validation->set_rules('NOM_AUT','NOMBRES Y APELLIDOS','required');
					$this->form_validation->set_rules('DNI_AUT','CARGO DE LA AUTORIDAD','required');
					
					$this->form_validation->set_rules('F_D','Dia','required|numeric');
					$this->form_validation->set_rules('F_M','Mes','required|numeric');
					$this->form_validation->set_rules('F_A','Año','required|numeric');

					$this->form_validation->set_rules('T_F_D','TOTAL FILAS','required|numeric');
					$this->form_validation->set_rules('T_PES','TOTAL PESCADORES','required|numeric');
					$this->form_validation->set_rules('T_ACUI','TOTAL ACUICULTORES','required|numeric');
					$this->form_validation->set_rules('T_PES_ACUI','TOTAL ACUICULTORES','required|numeric');
					$this->form_validation->set_rules('T_EMB','TOTAL EMBARCACIONES','required|numeric');

					$this->form_validation->set_rules('NOM_EMP','NOMBRE EMPADRONADOR','required');
					$this->form_validation->set_rules('DNI_EMP','NOMBRE EMPADRONADOR','required|numeric|xss_clean');

					$od = $this->marco_model->get_odei_by_sede_dep($this->tank_auth->get_ubigeo(),$this->input->post('CCDD'));
					if ($od->num_rows() == 1){
						$ODEI_COD = $od->row('ODEI_COD');
						$NOM_ODEI = $od->row('NOM_ODEI');
						$NOM_SEDE= $od->row('NOM_SEDE');				
					}else{
		    				$this->session->set_flashdata('msgbox','error_odei');
		        			redirect('/digitacion/registro_pescadores');					
					}

			        if ($this->form_validation->run() === TRUE) {

			    		$registros = array(
							'SEDE_COD'	=> $this->tank_auth->get_ubigeo(),
							'NOM_SEDE'	=> $NOM_SEDE,				
							'ODEI_COD'	=> $ODEI_COD,
							'NOM_ODEI'	=> $NOM_ODEI,
							'NOM_DD'	=> $this->input->post('NOM_DD'),
							'CCDD'		=> $this->input->post('CCDD'),
							'NOM_PP'	=> $this->input->post('NOM_PP'),
							'CCPP'		=> $this->input->post('CCPP'),
							'NOM_DI'	=> $this->input->post('NOM_DI'),
							'CCDI'		=> $this->input->post('CCDI'),
							'NOM_CCPP'	=> $this->input->post('NOM_CCPP'),
							'COD_CCPP'	=> $this->input->post('COD_CCPP'),

							'CCPP_PROC'	=> $this->input->post('CCPP_PROC'),
							'CCPP_CODPROC'	=> $this->input->post('CCPP_CODPROC'),

							'NOM_AUT'	=> strtoupper($this->input->post('NOM_AUT')),
							'DNI_AUT'	=> strtoupper($this->input->post('DNI_AUT')),

							'F_D'	=> $this->input->post('F_D'),
							'F_M'	=> $this->input->post('F_M'),
							'F_A'	=> $this->input->post('F_A'),

							'T_F_D'	=> $this->input->post('T_F_D'),
							'T_PES'	=> $this->input->post('T_PES'),
							'T_ACUI'=> $this->input->post('T_ACUI'),
							'T_PES_ACUI'=> $this->input->post('T_ACUI'),
							'T_EMB'	=> $this->input->post('T_EMB'),

							'NOM_EMP'=> strtoupper($this->input->post('NOM_EMP')),
							'DNI_EMP'=> $this->input->post('DNI_EMP'),
							'USUARIO'=> $this->tank_auth->get_user_id(),
							'FECHA'	 => date('y-m-d H:i:s',now())						
							);

		    			$afectados = $this->registro_pescadores_model->insert_registro_pescadores($registros);

						$data['msg'] = 'Guardado exitosamente';
						if ($afectados===0){
							$data['msg']  = "Error al guardar, intente otra vez";
						}
						
						$id = $this->registro_pescadores_model->get_cod(); //codigo master de registro

						 redirect('/digitacion/registro_pescadores/detalle/'.$id, 'location');

					}
			        else{
							
			 			$data['datos'] = $this->form_validation->error_array();
			 			//$this->load->view('backend/json/json_view', $data);
		        		$this->load->view('backend/includes/template', $data);				
			        }
			    }else{
	    			$this->session->set_flashdata('msgbox','no_piloto');
        			redirect('/digitacion/registro_pescadores');	
			    }

		    }elseif ($opcion==='Filtrar'){

				$this->form_validation->set_rules('NOM_DD_2','DEPARTAMENTO','required|numeric');
				$this->form_validation->set_rules('NOM_PP_2','PROVINCIA','required|numeric');
				$this->form_validation->set_rules('NOM_DI_2','DISTRITO','required|numeric');
				$this->form_validation->set_rules('NOM_CCPP_2','CENTRO POBLADO','required|numeric');
				$this->form_validation->set_rules('CCPP_PROC_2','CENTRO POBLADO','required|numeric');
		
		        if ($this->form_validation->run() === TRUE) {
		        	
	    			$dep = $this->input->post('NOM_DD_2');
	    			$prov = $this->input->post('NOM_PP_2');
	    			$dist = $this->input->post('NOM_DI_2');
	    			$cod_ccpp = $this->input->post('NOM_CCPP_2');
	    			$cod_ccpp_proc = $this->input->post('CCPP_PROC_2');
	    			$id = $this->registro_pescadores_model->get_cod_reg($dep,$prov,$dist,$cod_ccpp, $cod_ccpp_proc);
	    			//echo '<script> alert("'.$cod.'");</script>';
	    			if (is_numeric($id)){
	    				redirect('/digitacion/registro_pescadores/detalle/'.$id, 'location');
	    			}else{
	    				$this->session->set_flashdata('msgbox','busca');
	        			redirect('/digitacion/registro_pescadores');
	    			}
				}
		        else{
		 			$data['datos'] = $this->form_validation->error_array();
	        		$this->load->view('backend/includes/template', $data);				
		        }
		    }
	        else{

				//Carga el form vacío
	 			$data['datos'] = $this->form_validation->error_array();
        		$this->load->view('backend/includes/template', $data);	
	        }
	    }

	}

	public function detalle($id)
	{

		$data['nav'] = TRUE;
		$data['title'] = 'Formato de Registro';
		$data['main_content'] = 'digitacion/forms/registro_pescadores_form';
		//$data['departamento'] = $this->pesca_piloto_model->get_dptos();
		//$data['departamento'] = $this->marco_model->get_dpto_by_odei($this->tank_auth->get_ubigeo()); 
		

		$data['opx'] = 1;  //habilitar anchor
		$data['error'] = 0;
		$data['detalle'] = TRUE;

		$cabecera = $this->registro_pescadores_model->get_detalles($id);
		$data['departamento'] = $cabecera;
		$data['CCDD'] = $cabecera->row('CCDD');
		//$data['NOM_DD_c'] = $cabecera->row('NOM_DD');
		$data['CCPP'] = $cabecera->row('CCPP');
		$data['NOM_PP_c'] = $cabecera->row('NOM_PP');
		$data['CCDI'] = $cabecera->row('CCDI');
		$data['NOM_DI_c'] = $cabecera->row('NOM_DI');
		$data['COD_CCPP'] = $cabecera->row('COD_CCPP');
		$data['NOM_CCPP_c'] = $cabecera->row('NOM_CCPP');
		$data['CCPP_PROC_c'] = $cabecera->row('CCPP_PROC');	
		$data['CCPP_CODPROC'] = $cabecera->row('CCPP_CODPROC');	
		$data['CAT'] = $cabecera->row('CAT');
		$data['NOM_AUT'] = $cabecera->row('NOM_AUT');
		$data['DNI_AUT'] = $cabecera->row('DNI_AUT');
		$data['F_D'] = $cabecera->row('F_D');
		$data['F_M'] = $cabecera->row('F_M');
		$data['T_F_D'] = $cabecera->row('T_F_D');
		$data['T_PES'] = $cabecera->row('T_PES');
		$data['T_ACUI'] = $cabecera->row('T_ACUI');
		$data['T_PES_ACUI'] = $cabecera->row('T_PES_ACUI');
		$data['T_EMB'] = $cabecera->row('T_EMB');
		$data['NOM_EMP'] = $cabecera->row('NOM_EMP');
		$data['DNI_EMP'] = $cabecera->row('DNI_EMP');
		$data['OBS'] = $cabecera->row('OBS');
	
		$data['tables'] = $this->registro_pescadores_dat_model->get_detalles($id);
		$opcion = $this->input->post('send');

		$num_filas 		= $this->registro_pescadores_dat_model->get_num_filas($id); // N° filas 
		$num_filas_t 	= $this->registro_pescadores_model->get_num_total($id); // N° TOTAL filas 
	
		$data['num_filas'] = $num_filas;
 		$data['num_filas_t'] = $num_filas_t;
 		
		if (($opcion==='Ingresar') && ($num_filas<$num_filas_t)){

			$contt = 0; // cuenta los campos vacion de tipo de via
			for ($i=8; $i <= 14 ; $i++) { 
			 	$ppp = $this->input->post('P'.$i);
			 	if(empty($ppp)){
			 		$contt++;
			 	}
			}

			$this->form_validation->set_rules('P2','NOMBRE Y APELLIDOS','required|validName');
			$this->form_validation->set_rules('P3','SEXO','numeric');
			$this->form_validation->set_rules('P4','DNI','required|numeric');
			$this->form_validation->set_rules('P5','OCUPACION','required|numeric');
			$this->form_validation->set_rules('P6','VIA','numeric');
			$this->form_validation->set_rules('P7','NOMBRE VIA','');
			$this->form_validation->set_rules('P8','PUERTA','');
			$this->form_validation->set_rules('P9','BLOCK','');
			$this->form_validation->set_rules('P10','INTERIOR','');
			if ($contt == 7){
				$this->form_validation->set_rules('P11','N° Puerta, Block, Interior, Piso N°, Manz. N°, Lote o KM','required');
			}
			$this->form_validation->set_rules('P12','MANZANA','');
			$this->form_validation->set_rules('P13','LOTE','numeric');
			$this->form_validation->set_rules('P14','KM','numeric');
			$this->form_validation->set_rules('P15','NUMERO','required|numeric');
			
        	if ($this->form_validation->run() === TRUE){
    		$registros = array(
				'id_reg'=> $id,
				'P1'	=> $num_filas +1,
				'P2'	=> strtoupper($this->input->post('P2')),
				'P3'	=> $this->input->post('P3'),
				'P4'	=> $this->input->post('P4'),
				'P5'	=> $this->input->post('P5'),
				'P6'	=> $this->input->post('P6'),
				'P7'	=> strtoupper($this->input->post('P7')),
				'P8'	=> $this->input->post('P8'),
				'P9'	=> $this->input->post('P9'),
				'P10'	=> $this->input->post('P10'),
				'P11'	=> ($this->input->post('P11') == '') ? NULL : $this->input->post('P11') ,
				'P12'	=> strtoupper($this->input->post('P12')),
				'P13'	=> $this->input->post('P13'),
				'P14'	=> $this->input->post('P14'),
				'P15'	=> $this->input->post('P15')   
				);

    			$afectados = $this->registro_pescadores_dat_model->insert_registro_pescadores($registros);
				
				$data['msg'] = 'Guardado exitosamente';
				if ($afectados===0){
					$data['msg']  = "Error al guardar, intente otra vez";
				}
				redirect('/digitacion/registro_pescadores/detalle/'.$id);
			}
		    else{
	 			$data['datos'] = $this->form_validation->error_array();
        		$this->load->view('backend/includes/template', $data);	
        	}

		}elseif($opcion==='Modificar'){
			
			$this->form_validation->set_rules('T_F_D_m','TOTAL FILAS','required|numeric');
			$this->form_validation->set_rules('T_PES_m','TOTAL PESCADORES','required|numeric');
			$this->form_validation->set_rules('T_ACUI_m','TOTAL ACUICULTORES','required|numeric');
			$this->form_validation->set_rules('T_PES_ACUI_m','TOTAL PESCADORES-ACUICULTORES','required|numeric');
			$this->form_validation->set_rules('T_EMB_m','TOTAL EMBARCACIONES','required|numeric');

			if ($this->form_validation->run()=== TRUE){

				$registros = array(
					'T_F_D' => $this->input->post('T_F_D_m'),
					'T_PES' => $this->input->post('T_PES_m'),
					'T_ACUI'=> $this->input->post('T_ACUI_m'),
					'T_PES_ACUI'=> $this->input->post('T_PES_ACUI_m'),
					'T_EMB' => $this->input->post('T_EMB_m')
					);

				$afectados = $this->registro_pescadores_model->update_resumen($registros,$id);
				if ($afectados ===0) {
					$this->session->set_flashdata('msgbox','actualiza_resumen');
				}
				redirect('/digitacion/registro_pescadores/detalle/'.$id);
			}else{
	 			$data['datos'] = $this->form_validation->error_array();
        		$this->load->view('backend/includes/template', $data);	
			}

		}elseif ($opcion==='Guardar') {
			$pes_t = $this->registro_pescadores_model->get_pescadores_t($id); //declaradas
			$pes_i = $this->registro_pescadores_dat_model->get_pescadores_i($id); //ingresadas
			$acui_t = $this->registro_pescadores_model->get_acuicultores_t($id);
			$pes_acui_i = $this->registro_pescadores_dat_model->get_pes_acuicultores_i($id);
			$pes_acui_t = $this->registro_pescadores_model->get_pes_acuicultores_t($id);
			$acui_i = $this->registro_pescadores_dat_model->get_acuicultores_i($id);			
			$emb_t = $this->registro_pescadores_model->get_embarcaciones_t($id);
			$emb_i = $this->registro_pescadores_dat_model->get_embarcaciones_i($id);

			$cabecera = $this->registro_pescadores_model->get_detalles($id);
			$data['obs'] = $cabecera->row('OBS');
			//echo '<script> alert("'.$pes_acui_t.'- '.$pes_acui_i. '");</script>';

			if($num_filas>$num_filas_t){ 
				$data['error'] = 1;
				$this->load->view('backend/includes/template', $data);
			}elseif($pes_i<>$pes_t){ 
				$data['error'] = 2;
				$this->load->view('backend/includes/template', $data);
			}elseif ($acui_i<>$acui_t) {
				$data['error'] = 3;
				$this->load->view('backend/includes/template', $data);
			}elseif ($pes_acui_i<>$pes_acui_t) {
				$data['error'] = 4;
				$this->load->view('backend/includes/template', $data);
			}elseif ($emb_i<>$emb_t) {
				$data['error'] = 5;
				$this->load->view('backend/includes/template', $data);
			}else{
				$registros = array('OBS' => $this->input->post('OBS'));
				$OBS = $this->input->post('OBS');
				$this->registro_pescadores_model->update_resumen($registros,$id);
				$this->session->set_flashdata('msgbox','guardado');
				redirect('digitacion/registro_pescadores/');
			}

		}else{
			//Carga el form vacío
			//echo '<script> alert("probando");</script>';
 			$data['datos'] = $this->form_validation->error_array();
    		$this->load->view('backend/includes/template', $data);	

        }

	}

}
