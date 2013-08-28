<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Registro_avance extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		$this->load->helper(array('form', 'url'));
		$this->load->library('form_validation');
		$this->load->library('security');
		$this->load->library('tank_auth');
		$this->lang->load('tank_auth');	
		$this->load->model('udra_registro_model');
		$this->load->model('pesca_piloto_model');
		$this->load->model('marco_model');
		$this->load->helper('date');
		$this->load->library('PHPExcel');
		// date_default_timezone_set('America/Lima');		

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

			$data['nav'] = TRUE;
			$data['title'] = 'ODEI';
			$data['user_id']	= $this->tank_auth->get_user_id();
			$data['username']	= $this->tank_auth->get_username();
			$data['main_content'] = 'digitacion/avance_digitacion/registro_by_odei_view';
			$data['option'] = 31;

			foreach ($this->marco_model->get_odei($this->tank_auth->get_ubigeo())->result() as $key ) {//get ODEIS que tiene el usuario
				$odei[] = $key->ODEI_COD;
			}					
			$data['tables'] = $this->marco_model->get_registro_by_odei($odei); //get forms por ODEIS, 
			$data['udra'] = $this->udra_registro_model->get_udra_total_by_odei($odei); //get forms por ODEIS, 

			$data['formularios'] = $this->udra_registro_model->get_n_formularios_by_odei($odei); //N° formularios ingresados en pescador completos
		
	    	$this->load->view('backend/includes/template', $data);	
	
	}

	public function provincia()
	{
			$data['nav'] = TRUE;
			$data['title'] = 'PROVINCIA';
			$data['user_id']	= $this->tank_auth->get_user_id();
			$data['username']	= $this->tank_auth->get_username();
			$data['main_content'] = 'digitacion/avance_digitacion/registro_by_prov_view';
			$data['option'] = 32;			

			foreach ($this->marco_model->get_odei($this->tank_auth->get_ubigeo())->result() as $key ) {//get ODEIS que tiene el usuario
				$odei[] = $key->ODEI_COD;
			}					
			$data['tables'] = $this->marco_model->get_registro_by_prov($odei); //get forms por ODEIS, 
			$data['udra'] = $this->udra_registro_model->get_udra_total_by_prov($odei); //get forms por ODEIS, 

			$data['formularios'] = $this->udra_registro_model->get_n_formularios_by_prov($odei); //N° formularios ingresados en pescador completos
		
	    	$this->load->view('backend/includes/template', $data);	
	
	}

	public function distrito()
	{
			$data['nav'] = TRUE;
			$data['title'] = 'DISTRITO';
			$data['user_id']	= $this->tank_auth->get_user_id();
			$data['username']	= $this->tank_auth->get_username();
			$data['main_content'] = 'digitacion/avance_digitacion/registro_by_dist_view';
			$data['option'] = 33;			

			foreach ($this->marco_model->get_odei($this->tank_auth->get_ubigeo())->result() as $key ) {//get ODEIS que tiene el usuario
				$odei[] = $key->ODEI_COD;
			}					
			$data['tables'] = $this->marco_model->get_registro_by_dist($odei); //get forms por ODEIS, 
			$data['udra'] = $this->udra_registro_model->get_udra_total_by_dist($odei); //get forms por ODEIS, 

			$data['formularios'] = $this->udra_registro_model->get_n_formularios_by_dist($odei); //N° formularios ingresados en pescador completos
		
	    	$this->load->view('backend/includes/template', $data);	
			
	}

	public function centro_poblado()
	{
			$data['nav'] = TRUE;
			$data['title'] = 'DISTRITO';
			$data['user_id']	= $this->tank_auth->get_user_id();
			$data['username']	= $this->tank_auth->get_username();
			$data['main_content'] = 'digitacion/avance_digitacion/registro_by_ccpp_view';
			$data['option'] = 34;
			$data['ubigeo'] = $this->tank_auth->get_ubigeo();			

			foreach ($this->marco_model->get_odei($this->tank_auth->get_ubigeo())->result() as $key ) {//get ODEIS que tiene el usuario
				$odei[] = $key->ODEI_COD;
			}					
			$data['tables'] = $this->marco_model->get_registro_by_ccpp($odei); //get forms por ODEIS, 
			$data['udra'] = $this->udra_registro_model->get_udra_total_by_ccpp($odei); //get forms por ODEIS, 

			$data['formularios'] = $this->udra_registro_model->get_n_formularios_by_ccpp($odei); //N° formularios ingresados en pescador completos
		
	    	$this->load->view('backend/includes/template', $data);	
	}




	function export()
	{
			foreach ($this->marco_model->get_odei($this->tank_auth->get_ubigeo())->result() as $key ) {//get ODEIS que tiene el usuario
				$odei[] = $key->ODEI_COD;
			}

			$tables = $this->marco_model->get_registro_by_ccpp($odei); 
			$udra = $this->udra_registro_model->get_udra_total_by_ccpp($odei); //get UDRA por ODEIS,  	CCPP

			 $formularios = $this->udra_registro_model->get_n_formularios_by_ccpp($odei); //N° formularios ingresados en REGISTRO completos

			//******************************************************************************************

			// pestaña
			$sheet = $this->phpexcel->getActiveSheet(0);
			
		// NOMBRE CABECERAS

				$sheet->setCellValue('A1','N');
				$sheet->setCellValue('B1','COD ODEI' );
				$sheet->setCellValue('C1','ODEI' );
				$sheet->setCellValue('D1','CCPP' );
				$sheet->setCellValue('E1','PROVINCIA' );
				$sheet->setCellValue('F1','CCDI' );
				$sheet->setCellValue('G1','DISTRITO' );
				$sheet->setCellValue('H1','COD_CCPP' );
				$sheet->setCellValue('I1','CENTRO POBLADO' );
				$sheet->setCellValue('J1','UDRA' );
				$sheet->setCellValue('K1','DIGITACION' );
				$sheet->setCellValue('L1','% AVANCE DE DIGITACION' );
																																		
		// NOMBRE CABECERAS


	    // CUERPO

			// FORMATO
				$sheet->getStyle('B')->getNumberFormat()->setFormatCode('00');// formato para codigo col B, 	
				$sheet->getStyle('D')->getNumberFormat()->setFormatCode('00');// formato para codigo col B, 	
				$sheet->getStyle('F')->getNumberFormat()->setFormatCode('00');// formato para codigo col B, 	
				$sheet->getStyle('H')->getNumberFormat()->setFormatCode('0000');// formato para codigo col B, 	
				$sheet->getStyle('A1')->getNumberFormat()->setFormatCode('');// formato para codigo col B, 	
			// FORMATO 

			//TOTALES
				$sheet->setCellValue('I2','TOTAL' );

				$total_2 = 0;
				$total_3 = 0;

				foreach ($udra->result() as $key ) {// TOTAL UDRA
						$total_2 = $total_2 +  $key->TOTAL_FORM; 
				}
				$sheet->setCellValue('J2', $total_2);

				foreach ($formularios->result() as $key ) { //TOTAL DIGITADOS
						$total_3 = $total_3 +  $key->TOTAL_DIG;
				}	
				$sheet->setCellValue('K2', $total_3);

				if ( $total_2>0){
					$sheet->setCellValue('L2', number_format( ($total_3*100)/$total_2 , 2,'.' ,'') );								
				}else{
					$sheet->setCellValue('L2', 0 );		
				}


			// TOTALES


			// EXPORTACION A EXCEL
			$celda = 2;
			$col = 1;


			$i = 1;
			$nform_udra = null;
			$nform_reg = null;
			foreach($tables as $row){
				$celda++;
				$sheet->setCellValue('A'.$celda, $i++);
				$sheet->setCellValue('B'.$celda, $row->ODEI_COD);
				$sheet->setCellValue('C'.$celda, $row->NOM_ODEI);
				$sheet->setCellValue('D'.$celda, $row->CCPP);
				$sheet->setCellValue('E'.$celda, $row->PROVINCIA);
				$sheet->setCellValue('F'.$celda, $row->CCDI);
				$sheet->setCellValue('G'.$celda, $row->DISTRITO);
				$sheet->setCellValue('H'.$celda, $row->CODCCPP);
				$sheet->setCellValue('I'.$celda, $row->CENTRO_POBLADO);


					if (isset($udra)){
						foreach ($udra->result() as $key ) {
							if ( ($row->ODEI_COD == $key->ODEI_COD) && ($row->CCPP == $key->CCPP) && ($row->CCDI == $key->CCDI) && ($row->CODCCPP == $key->COD_CCPP) ){
								$nform_udra =  $key->TOTAL_FORM; break;
							}
						}
						if (is_numeric($nform_udra)){
							$sheet->setCellValue('J'.$celda, $nform_udra);
						}else{
							$sheet->setCellValue('J'.$celda, 0);
						}
					}else{
							$sheet->setCellValue('J'.$celda, 0);
					}
					//REGISTRO
					if (isset($formularios)){
						foreach ($formularios->result() as $key ) {
							if ( ($row->ODEI_COD == $key->ODEI_COD) && ($row->CCPP == $key->CCPP) && ($row->CCDI == $key->CCDI) && ($row->CODCCPP == $key->CCPP_CODPROC)  ){
								$nform_reg =  $key->TOTAL_DIG;
								break;
							}
						}
						if (is_numeric($nform_reg)){
							$sheet->setCellValue('K'.$celda, $nform_reg);
						}else{
							$sheet->setCellValue('K'.$celda, 0);
						}

					}else{
							$sheet->setCellValue('K'.$celda, 0);
					}
					//TOTAL AVANCE
					if ( $nform_udra>0){
						$sheet->setCellValue('L'.$celda, number_format( ($nform_reg*100)/$nform_udra , 2,'.' ,'') );								
					}else{
						$sheet->setCellValue('L'.$celda, 0);
					}

					$nform_udra = null;
					$nform_reg = null;

			}

 		// CUERPO

		// SALIDA EXCEL
			//$objPHPExcel->getActiveSheet()->setCellValueExplicitByColumnAndRow($numColum,$numRow,$products[$i][$colName], PHPExcel_Cell_DataType::TYPE_STRING);
			// Propiedades del archivo excel
				$sheet->setTitle("AVANCE DIGITACION REGISTRO");
				$this->phpexcel->getProperties()
				->setTitle("Avance")
				->setDescription("Avance REGISTRO");

			header("Content-Type: application/vnd.ms-excel");
			$nombreArchivo = 'AVANCE_REGISTRO_'.date('YmdHis');
			header("Content-Disposition: attachment; filename=\"$nombreArchivo.xls\""); //EXCEL
			header("Cache-Control: max-age=0");
			
			// Genera Excel
			$writer = PHPExcel_IOFactory::createWriter($this->phpexcel, "Excel5");
			//$writer = new PHPExcel_Writer_Excel2007($this->phpexcel);

			$writer->save('php://output');
			exit;
		// SALIDA EXCEL

	}




}
