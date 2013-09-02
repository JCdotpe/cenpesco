<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class General_avance extends CI_Controller {
	protected $secciones = array(
					2 => 'Seccion II',
					3 => 'Seccion III',
					4 => 'Seccion IV',
					5 => 'Seccion V',
					6 => 'Seccion VI',
					7 => 'Seccion VII',
					8 => 'Seccion VIII',
					9 => 'Seccion IX',
					10 => 'Info',
	);
	function __construct()
	{
		parent::__construct();
		$this->load->helper(array('form', 'url'));
		$this->load->library('form_validation');
		$this->load->library('security');
		$this->load->library('tank_auth');
		$this->lang->load('tank_auth');	
		$this->load->model('udra_acuicultor_model');
		$this->load->model('udra_pescador_model');
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
			$data['title'] = 'GENERAL';
			$data['user_id']	= $this->tank_auth->get_user_id();
			$data['username']	= $this->tank_auth->get_username();

			foreach ($this->marco_model->get_odei($this->tank_auth->get_ubigeo())->result() as $key ) {//get ODEIS que tiene el usuario
				$odei[] = $key->ODEI_COD;
			}					
			$data['tables'] = $this->marco_model->get_general_by_odei($odei); //get PEA por ODEIS, 
			$data['udra_acui'] = $this->udra_acuicultor_model->get_udra_total_by_odei($odei); //get forms por ODEIS, 
			$data['udra_pes'] = $this->udra_pescador_model->get_formularios_total_by_odei($odei); //get forms por ODEIS, 

			$data['main_content'] = 'digitacion/avance_digitacion/general_by_odei_view';
			$data['option'] = 41;
					
			//var_dump($data['tables']);
			//var_dump($data['udra_acui']->result());
			//var_dump($data['udra_pes']->result());

			// ACUICULTOR
				$seccion_completos_acui = array();
				$seccion_incompletos_acui = array();

				$forms_acui = $this->udra_acuicultor_model->get_forms_by_odei( $odei );//get forms por ODEI, ingresados en PESCADOR 
				//var_dump($forms->result());

				if($forms_acui->num_rows() > 0){
			
					foreach($forms_acui->result() as $filas){//busca en todas las tablas de pescador
						
						$a = 0;
						$table = null;
						foreach($this->secciones as $s=>$k){
							$table = 'acu_seccion' . $s;
								//$cod = $filas->id1.$s;echo $cod.'<br>';
							  $rega = $this->udra_acuicultor_model->get_regs_a($table,$filas->id1, $s);//recorre cada tabla
							if ($rega->num_rows() >0){
								$a++;
							}
							//var_dump($rega->num_rows());echo '<br>';
						}//echo $a.'<br>';
						if ($a == 9){
							$seccion_completos_acui[] = $filas->id1; //guarda los ID de formularios completos en todas las secciones

						}else{
							$seccion_incompletos_acui[] = $filas->id1; //guarda los ID de formularios incompletos
						}
					}
				}//var_dump($seccion_completos);echo '<br>';

				if (count($seccion_completos_acui)>0){
				 	$data['formularios_acui'] = $this->udra_acuicultor_model->get_n_formularios_by_odei($seccion_completos_acui); 
				}else{
					$data['formularios_acui'] = NULL;
				}			
				if (count($seccion_incompletos_acui)>0){
				 $data['formularios_inc_acui'] = $this->udra_acuicultor_model->get_n_formularios_by_odei($seccion_incompletos_acui); 
				}else{
					$data['formularios_inc_acui'] = NULL;
				}


			// PESCADOR
				$seccion_completos_pes = array();
				$seccion_incompletos_pes = array();

				$forms_pes = $this->udra_pescador_model->get_forms_by_odei( $odei );//get forms por ODEI, ingresados en PESCADOR 

				if($forms_pes->num_rows() > 0){
			
					foreach($forms_pes->result() as $filas){//busca en todas las tablas de pescador
						
						$i = 0;
						$table = null;
						foreach($this->secciones as $s=>$k){
							$table = 'pesc_seccion' . $s;
							if($s == 10){
								$table = 'pesc_info';
							}
							  $rega = $this->udra_pescador_model->get_regs_a($table,$filas->id);//recorre cada tabla
							if ($rega->num_rows() >0){
								$i++;
							}
							//var_dump($rega->result());echo '<br>';
						}
						if ($i == 9){
							$seccion_completos_pes[] = $filas->id; //guarda los ID de formularios completos en todas las secciones

						}else{
							$seccion_incompletos_pes[] = $filas->id; //guarda los ID de formularios incompletos
						}
					}//var_dump($seccion_completos);echo '<br>';
				}

				if (count($seccion_completos_pes)>0){
				 	$data['formularios_pes'] = $this->udra_pescador_model->get_n_formularios_by_odei($seccion_completos_pes); 
				}else{
					$data['formularios_pes'] = NULL;
				}			
				if (count($seccion_incompletos_pes)>0){
				 $data['formularios_inc_pes'] = $this->udra_pescador_model->get_n_formularios_by_odei($seccion_incompletos_pes); 
				}else{
					$data['formularios_inc_pes'] = NULL;
				}				


			//$data['udra_total'] = $this->udra_acuicultor_model->get_udra_total_by_odei( $this->tank_auth->get_ubigeo() ); 
			//var_dump($data['formularios_inc']->result());echo '<br>';
			//$data['registros_total'] = $this->udra_acuicultor_model->get_registros_total($seccion_completos); 
	    	$this->load->view('backend/includes/template', $data);	
	

	}


	function export()
	{

			foreach ($this->marco_model->get_odei($this->tank_auth->get_ubigeo())->result() as $key ) {//get ODEIS que tiene el usuario
				$odei[] = $key->ODEI_COD;
			}

			$tables = $this->marco_model->get_acuicultores_by_ccpp($odei); 
			$udra = $this->udra_acuicultor_model->get_udra_total_by_ccpp($odei); //get UDRA por ODEIS,  	


 			$seccion_completos = array();
			$forms = $this->udra_acuicultor_model->get_forms_by_odei( $odei );//get forms por ODEI, ingresados en COMUNIDAD 

			if($forms->num_rows() > 0){
		
				foreach($forms->result() as $filas){//busca en todas las tablas de pescador
					
					$i = 0;
					$table = null;
					foreach($this->secciones as $s=>$k){
						$table = 'acu_seccion' . $s;
							//$cod = $filas->id1.$s;echo $cod.'<br>';
						  $rega = $this->udra_acuicultor_model->get_regs_a($table,$filas->id1, $s);//recorre cada tabla
						if ($rega->num_rows() >0){
							$i++;
						}
						//var_dump($rega->num_rows());echo '<br>';
					}//echo $i.'<br>';
					if ($i == 9){
						$seccion_completos[] = $filas->id1; //guarda los ID de formularios completos en todas las secciones

					}else{
						$seccion_incompletos[] = $filas->id1; //guarda los ID de formularios incompletos
					}
				}
			}//var_dump($seccion_completos);echo '<br>';
			//var_dump($seccion_incompletos);echo '<br>';

			if (count($seccion_completos)>0){
			 	$formularios = $this->udra_acuicultor_model->get_n_formularios_by_ccpp($seccion_completos); //N° formularios ingresados en COMUNIDAD completos
			}else{
				$formularios = NULL;
			}	

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
				$sheet->setCellValue('J1','PEA ACUICULTOR ' );
				$sheet->setCellValue('K1','UDRA' );
				$sheet->setCellValue('L1','DIGITACION' );
				$sheet->setCellValue('M1','% AVANCE DE DIGITACION' );
				$sheet->setCellValue('N1','% COMPARATIVO DE UDRA Y MARCO' );
																																		
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
				$total_1 = 0;
				$total_2 = 0;
				$total_3 = 0;
				foreach($tables as $row){ //TOTAL MARCO
					$total_1 = $total_1 + $row->TOTAL_ACUI;
				}
				$sheet->setCellValue('J2', $total_1);

				foreach ($udra->result() as $key ) {// TOTAL UDRA
						$total_2 = $total_2 +  $key->TOTAL_FORM; 
				}
				$sheet->setCellValue('K2', $total_2);

				foreach ($formularios->result() as $key ) { //TOTAL DIGITADOS
						$total_3 = $total_3 +  $key->TOTAL_DIG;
				}	
				$sheet->setCellValue('L2', $total_3);

				if ( $total_2>0){
					$sheet->setCellValue('M2', number_format( ($total_3*100)/$total_2 , 2,'.' ,'') );								
				}else{
					$sheet->setCellValue('M2', 0 );		
				}

				if ( $total_1>0){
					$sheet->setCellValue('N2', number_format( ($total_2*100)/$total_1 , 2,'.' ,'') );									
				}else{
					$sheet->setCellValue('N2', 0 );	
				}
			// TOTALES


			// EXPORTACION A EXCEL
			$celda = 2;
			$col = 1;


			$i = 1;
			$nform_udra = null;
			$nform_acui = null;
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
				$sheet->setCellValue('J'.$celda, $row->TOTAL_ACUI);

					//udra
					if (isset($udra)){
						foreach ($udra->result() as $key ) {
							if ( ($row->ODEI_COD == $key->ODEI_COD) && ($row->CCPP == $key->CCPP) && ($row->CCDI == $key->CCDI) && ($row->CODCCPP == $key->COD_CCPP) ){
								$nform_udra =  $key->TOTAL_FORM; break;
							}
						}
						if (is_numeric($nform_udra)){
							$sheet->setCellValue('K'.$celda, $nform_udra);
						}else{
							$sheet->setCellValue('K'.$celda, 0);
						}
					}else{
							$sheet->setCellValue('K'.$celda, 0);
					}
					//ACUICULTOR
					if (isset($formularios)){
						foreach ($formularios->result() as $key ) {
							if ( ($row->ODEI_COD == $key->ODEI_COD) && ($row->CCPP == $key->CCPP) && ($row->CCDI == $key->CCDI) && ($row->CODCCPP == $key->COD_CCPP)  ){
								$nform_acui =  $key->TOTAL_DIG;
								break;
							}
						}
						if (is_numeric($nform_acui)){
							$sheet->setCellValue('L'.$celda, $nform_acui);
						}else{
							$sheet->setCellValue('L'.$celda, 0);
						}

					}else{
							$sheet->setCellValue('L'.$celda, 0);
					}
					//TOTAL AVANCE
					if ( $nform_udra>0){
						$sheet->setCellValue('M'.$celda, number_format( ($nform_acui*100)/$nform_udra , 2,'.' ,'') );								
					}else{
						$sheet->setCellValue('M'.$celda, 0);
					}
					//TOTAL UDRA Y MARCO
					if ( $row->TOTAL_ACUI>0){
						$sheet->setCellValue('N'.$celda, number_format( ($nform_udra*100)/$row->TOTAL_ACUI , 2,'.' ,'') );						
					}else{
						$sheet->setCellValue('N'.$celda, 0);
					}

					$nform_udra = null;
					$nform_acui = null;

			}

 		// CUERPO

		// SALIDA EXCEL
			//$objPHPExcel->getActiveSheet()->setCellValueExplicitByColumnAndRow($numColum,$numRow,$products[$i][$colName], PHPExcel_Cell_DataType::TYPE_STRING);
			// Propiedades del archivo excel
				$sheet->setTitle("ACUICULTOR");
				$this->phpexcel->getProperties()
				->setTitle("Avance")
				->setDescription("Avance ACUICULTOR");

			header("Content-Type: application/vnd.ms-excel");
			$nombreArchivo = 'AVANCE_ACUICULTOR_'.date('YmdHis');
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
