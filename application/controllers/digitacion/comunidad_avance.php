<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Comunidad_avance extends CI_Controller {
	protected $secciones = array(
					2 => 'Seccion II',
					3 => 'Seccion III',
					4 => 'Seccion IV',
					5 => 'Seccion V',
					6 => 'Seccion VI',
					7 => 'Seccion VII',
					8 => 'Seccion VIII',
					9 => 'Info',
	);
	function __construct()
	{
		parent::__construct();
		$this->load->helper(array('form', 'url'));
		$this->load->library('form_validation');
		$this->load->library('security');
		$this->load->library('tank_auth');
		$this->lang->load('tank_auth');	
		$this->load->model('udra_comunidad_model');
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

			foreach ($this->marco_model->get_odei($this->tank_auth->get_ubigeo())->result() as $key ) {//get ODEIS que tiene el usuario
				$odei[] = $key->ODEI_COD;
			}					
			$data['tables'] = $this->marco_model->get_comunidad_by_odei($odei); //get forms por ODEIS, 
			$data['udra'] = $this->udra_comunidad_model->get_udra_total_by_odei($odei); //get forms por ODEIS, 

			$data['main_content'] = 'digitacion/avance_digitacion/comunidad_by_odei_view';
			$data['option'] = 21;
					
			$seccion_completos = array();
			$seccion_incompletos = array();

			// $forms = $this->udra_comunidad_model->get_forms_by_odei( $odei );//get forms por ODEI, ingresados en PESCADOR 

			// if($forms->num_rows() > 0){
		
			// 	foreach($forms->result() as $filas){//busca en todas las tablas de pescador
			// 		$i = 0;
			// 		$table = null;
			// 		foreach($this->secciones as $s=>$k){
			// 			$table = 'comunidad_seccion' . $s;
			// 			if($s == 9){
			// 				$table = 'comunidad_info';
			// 			}
			// 			  $rega = $this->udra_comunidad_model->get_regs_a($table,$filas->id);//recorre cada tabla
			// 			if ($rega->num_rows() >0){
			// 				$i++;
			// 			}
			// 		}//echo $i;
			// 		if ($i == 8){
			// 			$seccion_completos[] = $filas->id; //guarda los ID de formularios completos en todas las secciones

			// 		}else{
			// 			$seccion_incompletos[] = $filas->id; //guarda los ID de formularios incompletos
			// 		}
			// 	}//var_dump($seccion_completos);echo '<br>';
			// }
			foreach ( $this->udra_comunidad_model->get_forms_sec_info()->result() as $value) {
				$seccion_completos[] = $value->id;
			}	
			if (count($seccion_completos)>0){
			 	$data['formularios'] = $this->udra_comunidad_model->get_n_formularios_by_odei($odei, $seccion_completos); //N° formularios ingresados en pescador completos
			}
			else{
				$data['formularios'] = NULL;
			}			
			// if (count($seccion_incompletos)>0){
			//  $data['formularios_inc'] = $this->udra_comunidad_model->get_n_formularios_by_odei($seccion_incompletos); //N° formularios ingresados en pescador incompletos
			// }else{
			// 	$data['formularios_inc'] = NULL;
			// }

	    	$this->load->view('backend/includes/template', $data);	
	
	}

	public function provincia()
	{
			$data['nav'] = TRUE;
			$data['title'] = 'PROVINCIA';
			$data['user_id']	= $this->tank_auth->get_user_id();
			$data['username']	= $this->tank_auth->get_username();

			foreach ($this->marco_model->get_odei($this->tank_auth->get_ubigeo())->result() as $key ) {//get ODEIS que tiene el usuario
				$odei[] = $key->ODEI_COD;
			}					
			$data['tables'] = $this->marco_model->get_comunidad_by_prov($odei); //get forms por ODEIS, 
			$data['udra'] = $this->udra_comunidad_model->get_udra_total_by_prov($odei); //get forms por ODEIS, 

			$data['main_content'] = 'digitacion/avance_digitacion/comunidad_by_prov_view';
			$data['option'] = 22;
					
			$seccion_completos = array();
			$seccion_incompletos = array();

			// $forms = $this->udra_comunidad_model->get_forms_by_odei( $odei );//get forms por ODEI, ingresados en PESCADOR 
			// if($forms->num_rows() > 0){
		
			// 	foreach($forms->result() as $filas){//busca en todas las tablas de pescador
			// 		$i = 0;
			// 		$table = null;
			// 		foreach($this->secciones as $s=>$k){
			// 			$table = 'comunidad_seccion' . $s;
			// 			if($s == 9){
			// 				$table = 'comunidad_info';
			// 			}
			// 			  $rega = $this->udra_comunidad_model->get_regs_a($table,$filas->id);//recorre cada tabla
			// 			if ($rega->num_rows() >0){
			// 				$i++;
			// 			}
			// 		}
			// 		if ($i == 8){
			// 			$seccion_completos[] = $filas->id; //guarda los ID de formularios completos en todas las secciones

			// 		}else{
			// 			$seccion_incompletos[] = $filas->id; //guarda los ID de formularios incompletos
			// 		}
			// 	}//var_dump($seccion_completos);echo '<br>';
			// }
			foreach ( $this->udra_comunidad_model->get_forms_sec_info()->result() as $value) {
				$seccion_completos[] = $value->id;
			}	
			if (count($seccion_completos)>0){
			 	$data['formularios'] = $this->udra_comunidad_model->get_n_formularios_by_prov($odei, $seccion_completos); //N° formularios ingresados en pescador completos
			}else{
				$data['formularios'] = NULL;
			}			
			// if (count($seccion_incompletos)>0){
			//  $data['formularios_inc'] = $this->udra_comunidad_model->get_n_formularios_by_prov($seccion_incompletos); //N° formularios ingresados en pescador incompletos
			// }else{
			// 	$data['formularios_inc'] = NULL;
			// }

	    	$this->load->view('backend/includes/template', $data);	
	
	}

	public function distrito()
	{
			$data['nav'] = TRUE;
			$data['title'] = 'DISTRITO';
			$data['user_id']	= $this->tank_auth->get_user_id();
			$data['username']	= $this->tank_auth->get_username();

			foreach ($this->marco_model->get_odei($this->tank_auth->get_ubigeo())->result() as $key ) {//get ODEIS que tiene el usuario
				$odei[] = $key->ODEI_COD;
			}					
			$data['tables'] = $this->marco_model->get_comunidad_by_dist($odei); //get forms por ODEIS, 
			$data['udra'] = $this->udra_comunidad_model->get_udra_total_by_dist($odei); //get forms por ODEIS, 

			$data['main_content'] = 'digitacion/avance_digitacion/comunidad_by_dist_view';
			$data['option'] = 23;
					
			$seccion_completos = array();
			$seccion_incompletos = array();

			// $forms = $this->udra_comunidad_model->get_forms_by_odei( $odei );//get forms por ODEI, ingresados en PESCADOR 
			// if($forms->num_rows() > 0){
		
			// 	foreach($forms->result() as $filas){//busca en todas las tablas de pescador
			// 		$i = 0;
			// 		$table = null;
			// 		foreach($this->secciones as $s=>$k){
			// 			$table = 'comunidad_seccion' . $s;
			// 			if($s == 9){
			// 				$table = 'comunidad_info';
			// 			}
			// 			  $rega = $this->udra_comunidad_model->get_regs_a($table,$filas->id);//recorre cada tabla
			// 			if ($rega->num_rows() >0){
			// 				$i++;
			// 			}
			// 		}
			// 		if ($i == 8){
			// 			$seccion_completos[] = $filas->id; //guarda los ID de formularios completos en todas las secciones

			// 		}else{
			// 			$seccion_incompletos[] = $filas->id; //guarda los ID de formularios incompletos
			// 		}
			// 	}//var_dump($seccion_completos);echo '<br>';
			// }
			foreach ( $this->udra_comunidad_model->get_forms_sec_info()->result() as $value) {
				$seccion_completos[] = $value->id;
			}	
			if (count($seccion_completos)>0){
			 	$data['formularios'] = $this->udra_comunidad_model->get_n_formularios_by_dist($odei, $seccion_completos); //N° formularios ingresados en COMUNIDAD completos
			}else{
				$data['formularios'] = NULL;
			}			
			// if (count($seccion_incompletos)>0){
			//  $data['formularios_inc'] = $this->udra_comunidad_model->get_n_formularios_by_dist($seccion_incompletos); //N° formularios ingresados en COMUNIDAD incompletos
			// }else{
			// 	$data['formularios_inc'] = NULL;
			// }

	    	$this->load->view('backend/includes/template', $data);		
			
	}

	public function centro_poblado()
	{
			$data['nav'] = TRUE;
			$data['title'] = 'CENTRO POBLADO';
			$data['user_id']	= $this->tank_auth->get_user_id();
			$data['username']	= $this->tank_auth->get_username();

			foreach ($this->marco_model->get_odei($this->tank_auth->get_ubigeo())->result() as $key ) {//get ODEIS que tiene el usuario
				$odei[] = $key->ODEI_COD;
			}					
			//$data['tables'] = $this->marco_model->get_comunidad_by_ccpp($odei); //get MARCO por CENTRO POBLADO, 
			$data['tables'] = $this->udra_comunidad_model->get_avance_gby_ccpp_by_odei($odei);
			//$data['udra'] = $this->udra_comunidad_model->get_udra_total_by_ccpp($odei); //get forms por CENTRO POBLADO, 

			$data['main_content'] = 'digitacion/avance_digitacion/comunidad_by_ccpp_view';
			$data['option'] = 24;
			$data['ubigeo'] = $this->tank_auth->get_ubigeo();
					
			$seccion_completos = array();
			$seccion_incompletos = array();

			// $forms = $this->udra_comunidad_model->get_forms_by_odei( $odei );//get forms por ODEI, ingresados en COMUNIDAD 
			// if($forms->num_rows() > 0){
		
			// 	foreach($forms->result() as $filas){//busca en todas las tablas de pescador
			// 		$i = 0;
			// 		$table = null;
			// 		foreach($this->secciones as $s=>$k){
			// 			$table = 'comunidad_seccion' . $s;
			// 			if($s == 9){
			// 				$table = 'comunidad_info';
			// 			}
			// 			  $rega = $this->udra_comunidad_model->get_regs_a($table,$filas->id);//recorre cada tabla
			// 			if ($rega->num_rows() >0){
			// 				$i++;
			// 			}
			// 		}
			// 		if ($i == 8){
			// 			$seccion_completos[] = $filas->id; //guarda los ID de formularios completos en todas las secciones

			// 		}else{
			// 			$seccion_incompletos[] = $filas->id; //guarda los ID de formularios incompletos
			// 		}
			// 	}//var_dump($seccion_completos);echo '<br>';
			// }
			// foreach ( $this->udra_comunidad_model->get_forms_sec_info()->result() as $value) {
			// 	$seccion_completos[] = $value->id;
			// }	
			// if (count($seccion_completos)>0){
			//  	$data['formularios'] = $this->udra_comunidad_model->get_n_formularios_by_ccpp($odei, $seccion_completos); //N° formularios ingresados en COMUNIDAD completos
			// }else{
			// 	$data['formularios'] = NULL;
			// }			
			// if (count($seccion_incompletos)>0){
			//  $data['formularios_inc'] = $this->udra_comunidad_model->get_n_formularios_by_ccpp($seccion_incompletos); //N° formularios ingresados en COMUNIDAD incompletos
			// }else{
			// 	$data['formularios_inc'] = NULL;
			// }

	    	$this->load->view('backend/includes/template', $data);		
	}

	public function forms_incompletos()
	{

			$data['nav'] = TRUE;
			$data['title'] = 'INCOMPLETOS';
			$data['user_id']	= $this->tank_auth->get_user_id();
			$data['username']	= $this->tank_auth->get_username();

			foreach ($this->marco_model->get_odei($this->tank_auth->get_ubigeo())->result() as $key ) {//get ODEIS que tiene el usuario
				$odei[] = $key->ODEI_COD;
			}					
			$data['tables'] = $this->marco_model->get_comunidad_by_odei($odei); //get forms por ODEIS, 
			$data['udra'] = $this->udra_comunidad_model->get_udra_total_by_odei($odei); //get forms por ODEIS, 

			$data['main_content'] = 'digitacion/avance_digitacion/comunidad_incompletos_view';
			$data['option'] = 25;
					
			$seccion_completos = array();
			$seccion_incompletos = array();

			// $forms = $this->udra_comunidad_model->get_forms_by_odei( $odei );//get forms por ODEI, ingresados en PESCADOR 

			// if($forms->num_rows() > 0){
		
			// 	foreach($forms->result() as $filas){//busca en todas las tablas de pescador
			// 		$i = 0;
			// 		$table = null;
			// 		foreach($this->secciones as $s=>$k){
			// 			$table = 'comunidad_seccion' . $s;
			// 			if($s == 9){
			// 				$table = 'comunidad_info';
			// 			}
			// 			  $rega = $this->udra_comunidad_model->get_regs_a($table,$filas->id);//recorre cada tabla
			// 			if ($rega->num_rows() >0){
			// 				$i++;
			// 			}
			// 		}//echo $i;
			// 		if ($i == 8){
			// 			$seccion_completos[] = $filas->id; //guarda los ID de formularios completos en todas las secciones

			// 		}else{
			// 			$seccion_incompletos[] = $filas->id; //guarda los ID de formularios incompletos
			// 		}
			// 	}//var_dump($forms);echo '<br>';
			// }
			foreach ( $this->udra_comunidad_model->get_forms_sec_info()->result() as $value) {
				$seccion_completos[] = $value->id;
			}
			foreach ( $this->udra_comunidad_model->get_id_forms()->result() as $value) {
				if (!in_array($value->id, $seccion_completos)) {
					$seccion_incompletos[] = $value->id;

				}
			}
			// if (count($seccion_completos)>0){
			//  	$data['formularios'] = $this->udra_comunidad_model->get_n_formularios_by_odei($seccion_completos); //N° formularios ingresados en pescador completos
			// }
			// else{
			// 	$data['formularios'] = NULL;
			// }			
			if (count($seccion_incompletos)>0){
			 $data['formularios_inc'] = $this->udra_comunidad_model->get_forms_incompletos($seccion_incompletos); //N° formularios ingresados en pescador incompletos
			}else{
				$data['formularios_inc'] = NULL;
			}
			//var_dump( $seccion_incompletos );echo '<br>';
	    	$this->load->view('backend/includes/template', $data);	
	
	}


	function export()
	{

			foreach ($this->marco_model->get_odei($this->tank_auth->get_ubigeo())->result() as $key ) {//get ODEIS que tiene el usuario
				$odei[] = $key->ODEI_COD;
			}

			//$tables = $this->marco_model->get_comunidad_by_ccpp($odei); 
			$tables = $this->udra_comunidad_model->get_avance_gby_ccpp_by_odei($odei); 
			$udra = $this->udra_comunidad_model->get_udra_total_by_ccpp($odei); //get forms por ODEIS,  	

 			$seccion_completos = array();

			foreach ( $this->udra_comunidad_model->get_forms_sec_info()->result() as $value) {
				$seccion_completos[] = $value->id;
			}	
			if (count($seccion_completos)>0){
			 	$formularios = $this->udra_comunidad_model->get_n_formularios_by_ccpp($odei, $seccion_completos); //N° formularios ingresados en COMUNIDAD completos
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
				$sheet->setCellValue('J1','MARCO COMUNIDADES ' );
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
				
				$tot_marco 	= 0;
				$tot_udra 	= 0;
				$tot_dig 	= 0;
				foreach($tables->result() as $row){ //TOTAL MARCO
					$tot_marco 	+= $row->MARCO;
					$tot_udra 	+= $row->UDRA;
					$tot_dig 	+= $row->DIGITACION;
				}
				// foreach ($udra->result() as $key ) {// TOTAL UDRA
				// 	$total_2 +=  $key->TOTAL_FORM; 
				// }
				// $sheet->setCellValue('K2', $total_2);

				// foreach ($formularios->result() as $key ) { //TOTAL DIGITADOS
				// 	$total_3 +=   $key->TOTAL_DIG;
				// }
				$sheet->setCellValue('I2','TOTAL' );
				$sheet->setCellValue('J2', $tot_marco);
				$sheet->setCellValue('K2', $tot_udra);	
				$sheet->setCellValue('L2', $tot_dig);
				$sheet->setCellValue('M2', ($tot_udra>0) ? number_format( ($tot_dig*100)/$tot_udra , 2,'.' ,'') : 0 );// %avance dig							
				$sheet->setCellValue('N2', ($tot_marco>0) ? number_format( ($tot_udra*100)/$tot_marco , 2,'.' ,'') : 0 ); //  % udra y marco							

			// TOTALES

			// EXPORTACION A EXCEL
			$celda = 2;
			$col = 1;

			$i = 1;

			foreach($tables->result() as $row){
					$nform_udra = 0;
					$nform_com = 0;

					$celda++;

					// foreach ($formularios->result() as $key ) {

					// 	if ( ($row->ODEI_COD == $key->ODEI_COD) && ($row->CCPP == $key->CCPP) && ($row->CCDI == $key->CCDI) && ($row->CODCCPP == $key->COD_CCPP)  ){
					// 		$nform_com =  $key->TOTAL_DIG; 
					// 		break;
					// 	}
					// }
						
					// foreach ($udra->result() as $key_1 ) {
					// 	if ( ($row->ODEI_COD == $key_1->ODEI_COD) && ($row->CCPP == $key_1->CCPP) && ($row->CCDI == $key_1->CCDI) && ($row->CODCCPP == $key_1->COD_CCPP) ){
					// 		$nform_udra =  $key_1->TOTAL_FORM; 
					// 		break; 
					// 	}
					// }

					// foreach ($udra->result() as $key_1 ) {
					// 	if ( ($row->ODEI_COD == $key_1->ODEI_COD) && ($row->CCPP == $key_1->CCPP) && ($row->CCDI == $key_1->CCDI) && ($row->CODCCPP == $key_1->COD_CCPP) ){
					// 		$nform_com =  $key_1->TOTAL_FORM; 
					// 		break; 
					// 	}
					// }

					$sheet->setCellValue('A'.$celda, $i++);
					$sheet->setCellValue('B'.$celda, $row->ODEI_COD);
					$sheet->setCellValue('C'.$celda, $row->NOM_ODEI);
					$sheet->setCellValue('D'.$celda, $row->CCPP);
					$sheet->setCellValue('E'.$celda, $row->PROVINCIA);
					$sheet->setCellValue('F'.$celda, $row->CCDI);
					$sheet->setCellValue('G'.$celda, $row->DISTRITO);
					$sheet->setCellValue('H'.$celda, $row->CODCCPP);
					$sheet->setCellValue('I'.$celda, $row->CENTRO_POBLADO);
					$sheet->setCellValue('J'.$celda, $row->MARCO);
					$sheet->setCellValue('K'.$celda, $row->UDRA );					
					$sheet->setCellValue('L'.$celda, $row->DIGITACION );
					$sheet->setCellValue('M'.$celda, ( ( $row->UDRA>0) ?  number_format( ($row->DIGITACION * 100)/$row->UDRA , 2,'.' ,'') : 0 ) );								
					$sheet->setCellValue('N'.$celda, ( ( $row->MARCO>0) ? number_format( ($row->UDRA * 100)/$row->MARCO , 2,'.' ,'') : 0 ) );						


			}//echo $udra->num_rows() . ' - ' . $formularios->num_rows();

 		// CUERPO

		// SALIDA EXCEL
			//$objPHPExcel->getActiveSheet()->setCellValueExplicitByColumnAndRow($numColum,$numRow,$products[$i][$colName], PHPExcel_Cell_DataType::TYPE_STRING);
			// Propiedades del archivo excel
				$sheet->setTitle("Comunidad");
				$this->phpexcel->getProperties()
				->setTitle("Avance")
				->setDescription("Avance Comunidad");

			header("Content-Type: application/vnd.ms-excel");
			$nombreArchivo = 'AVANCE_COMUNIDAD'.date('YmdHis');
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
