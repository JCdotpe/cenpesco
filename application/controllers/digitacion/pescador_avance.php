<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Pescador_avance extends CI_Controller {
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
		$this->load->model('udra_pescador_model');
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
			$data['tables'] = $this->marco_model->get_pescadores_by_odei($odei); //get forms por ODEIS, 
			$data['udra'] = $this->udra_pescador_model->get_formularios_total_by_odei($odei); //get forms por ODEIS, 

			$data['main_content'] = 'digitacion/avance_digitacion/pescador_by_odei_view';
			$data['option'] = 1;
					

			$seccion_completos = array();
			$seccion_incompletos = array();

			// $forms = $this->udra_pescador_model->get_forms_by_odei( $odei );//get forms por ODEI, ingresados en PESCADOR 

			// if($forms->num_rows() > 0){
		
			// 	foreach($forms->result() as $filas){//busca en todas las tablas de pescador
					
			// 		$i = 0;
			// 		$table = null;
			// 		foreach($this->secciones as $s=>$k){
			// 			$table = 'pesc_seccion' . $s;
			// 			if($s == 10){
			// 				$table = 'pesc_info';
			// 			}
			// 			  $rega = $this->udra_pescador_model->get_regs_a($table,$filas->id);//recorre cada tabla
			// 			if ($rega->num_rows() >0){
			// 				$i++;
			// 			}
			// 			//var_dump($rega->result());echo '<br>';
			// 		}
			// 		if ($i == 9){
			// 			$seccion_completos[] = $filas->id; //guarda los ID de formularios completos en todas las secciones

			// 		}else{
			// 			$seccion_incompletos[] = $filas->id; //guarda los ID de formularios incompletos
			// 		}
			// 	}//var_dump($seccion_completos);echo '<br>';
			// }
			foreach ( $this->udra_pescador_model->get_forms_sec_info()->result() as $value) {
				$seccion_completos[] = $value->id;
			}
			if (count($seccion_completos)>0){
			 	$data['formularios'] = $this->udra_pescador_model->get_n_formularios_by_odei($odei, $seccion_completos); 
			}else{
				$data['formularios'] = NULL;
			}			
			// if (count($seccion_incompletos)>0){
			//  $data['formularios_inc'] = $this->udra_pescador_model->get_n_formularios_by_odei($seccion_incompletos); 
			// }else{
			// 	$data['formularios_inc'] = NULL;
			// }
			//$data['udra_total'] = $this->udra_pescador_model->get_formularios_total_by_odei( $this->tank_auth->get_ubigeo() ); 
			//$data['registros_total'] = $this->udra_pescador_model->get_registros_total($seccion_completos); 
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
			$data['tables'] = $this->marco_model->get_pescadores_by_prov($odei); //get forms por ODEIS, 
			$data['udra'] = $this->udra_pescador_model->get_formularios_total_by_prov($odei); //get forms por ODEIS, 

			$data['main_content'] = 'digitacion/avance_digitacion/pescador_by_prov_view';
			$data['option'] = 2;
					
			$seccion_completos = array();
			$seccion_incompletos = array();

			// $forms = $this->udra_pescador_model->get_forms_by_odei( $odei );//get forms por ODEI, ingresados en PESCADOR 

			// if($forms->num_rows() > 0){
		
			// 	foreach($forms->result() as $filas){//busca en todas las tablas de pescador
					
			// 		$i = 0;
			// 		$table = null;
			// 		foreach($this->secciones as $s=>$k){
			// 			$table = 'pesc_seccion' . $s;
			// 			if($s == 10){
			// 				$table = 'pesc_info';
			// 			}
			// 			  $rega = $this->udra_pescador_model->get_regs_a($table,$filas->id);//recorre cada tabla
			// 			if ($rega->num_rows() >0){
			// 				$i++;
			// 			}
			// 			//var_dump($rega->result());echo '<br>';
			// 		}
			// 		if ($i == 9){
			// 			$seccion_completos[] = $filas->id; //guarda los ID de formularios completos en todas las secciones

			// 		}else{
			// 			$seccion_incompletos[] = $filas->id; //guarda los ID de formularios incompletos
			// 		}
			// 	}//var_dump($seccion_completos);echo '<br>';
			// }
			foreach ( $this->udra_pescador_model->get_forms_sec_info()->result() as $value) {
				$seccion_completos[] = $value->id;
			}
			if (count($seccion_completos)>0){
			 	$data['formularios'] = $this->udra_pescador_model->get_n_formularios_by_prov($odei,$seccion_completos); //N° formularios ingresados en pescador completos
			}else{
				$data['formularios'] = NULL;
			}			
			// if (count($seccion_incompletos)>0){
			//  $data['formularios_inc'] = $this->udra_pescador_model->get_n_formularios_by_prov($seccion_incompletos); //N° formularios ingresados en pescador incompletos 
			// }else{
			// 	$data['formularios_inc'] = NULL;
			// }

			//$data['udra_total'] = $this->udra_pescador_model->get_formularios_total_by_odei( $this->tank_auth->get_ubigeo() ); 
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
			$data['tables'] = $this->marco_model->get_pescadores_by_dist($odei); //get forms por ODEIS, 
			$data['udra'] = $this->udra_pescador_model->get_formularios_total_by_dist($odei); //get forms por ODEIS, 

			$data['main_content'] = 'digitacion/avance_digitacion/pescador_by_dist_view';
			$data['option'] = 3;
					
			$seccion_completos = array();
			$seccion_incompletos = array();

			// $forms = $this->udra_pescador_model->get_forms_by_odei( $odei );//get forms por ODEI, ingresados en PESCADOR 

			// if($forms->num_rows() > 0){
		
			// 	foreach($forms->result() as $filas){//busca en todas las tablas de pescador
					
			// 		$i = 0;
			// 		$table = null;
			// 		foreach($this->secciones as $s=>$k){
			// 			$table = 'pesc_seccion' . $s;
			// 			if($s == 10){
			// 				$table = 'pesc_info';
			// 			}
			// 			  $rega = $this->udra_pescador_model->get_regs_a($table,$filas->id);//recorre cada tabla
			// 			if ($rega->num_rows() >0){
			// 				$i++;
			// 			}
			// 			//var_dump($rega->result());echo '<br>';
			// 		}
			// 		if ($i == 9){
			// 			$seccion_completos[] = $filas->id; //guarda los ID de formularios completos en todas las secciones

			// 		}else{
			// 			$seccion_incompletos[] = $filas->id; //guarda los ID de formularios incompletos
			// 		}
			// 	}//var_dump($seccion_completos);echo '<br>';
			// }
			foreach ( $this->udra_pescador_model->get_forms_sec_info()->result() as $value) {
				$seccion_completos[] = $value->id;
			}
			if (count($seccion_completos)>0){
			 	$data['formularios'] = $this->udra_pescador_model->get_n_formularios_by_dist($odei,$seccion_completos); //N° formularios ingresados en pescador completos
			}else{
				$data['formularios'] = NULL;
			}			
			// if (count($seccion_incompletos)>0){
			//  $data['formularios_inc'] = $this->udra_pescador_model->get_n_formularios_by_dist($seccion_incompletos); //N° formularios ingresados en pescador incompletos 
			// }else{
			// 	$data['formularios_inc'] = NULL;
			// }

			//$data['udra_total'] = $this->udra_pescador_model->get_formularios_total_by_odei( $this->tank_auth->get_ubigeo() ); 
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
			//$data['tables'] = $this->marco_model->get_pescadores_by_ccpp($odei); //get forms por ODEIS, 
			$data['tables'] = $this->udra_pescador_model->get_avance_gby_ccpp_by_odei($odei); //get forms por ODEIS, 
			//$data['udra'] = $this->udra_pescador_model->get_formularios_total_by_ccpp($odei); //get forms por ODEIS, 

			$data['main_content'] = 'digitacion/avance_digitacion/pescador_by_ccpp_view';
			$data['option'] = 4;
			$data['ubigeo'] = $this->tank_auth->get_ubigeo();
					
			// $seccion_completos = array();
			// $seccion_incompletos = array();

			// $forms = $this->udra_pescador_model->get_forms_by_odei( $odei );//get forms por ODEI, ingresados en PESCADOR 

			// if($forms->num_rows() > 0){
		
			// 	foreach($forms->result() as $filas){//busca en todas las tablas de pescador
					
			// 		$i = 0;
			// 		$table = null;
			// 		foreach($this->secciones as $s=>$k){
			// 			$table = 'pesc_seccion' . $s;
			// 			if($s == 10){
			// 				$table = 'pesc_info';
			// 			}
			// 			  $rega = $this->udra_pescador_model->get_regs_a($table,$filas->id);//recorre cada tabla
			// 			if ($rega->num_rows() >0){
			// 				$i++;
			// 			}
			// 			//var_dump($rega->result());echo '<br>';
			// 		}
			// 		if ($i == 9){
			// 			$seccion_completos[] = $filas->id; //guarda los ID de formularios completos en todas las secciones

			// 		}else{
			// 			$seccion_incompletos[] = $filas->id; //guarda los ID de formularios incompletos
			// 		}
			// 	}//var_dump($seccion_completos);echo '<br>';
			// }
			// foreach ( $this->udra_pescador_model->get_forms_sec_info()->result() as $value) {
			// 	$seccion_completos[] = $value->id;
			// }
			// if (count($seccion_completos)>0){
			//  	$data['formularios'] = $this->udra_pescador_model->get_n_formularios_by_ccpp($odei,$seccion_completos); //N° formularios ingresados en pescador completos
			// }else{
			// 	$data['formularios'] = NULL;
			// }			
			// if (count($seccion_incompletos)>0){
			//  $data['formularios_inc'] = $this->udra_pescador_model->get_n_formularios_by_ccpp($seccion_incompletos); //N° formularios ingresados en pescador incompletos 
			// }else{
			// 	$data['formularios_inc'] = NULL;
			// }

			//$data['udra_total'] = $this->udra_pescador_model->get_formularios_total_by_odei( $this->tank_auth->get_ubigeo() ); 
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
			$data['main_content'] = 'digitacion/avance_digitacion/pescador_incompletos_view';
			$data['option'] = 15;
					
			$seccion_completos = array();
			$seccion_incompletos = array();

			//$forms = $this->udra_pescador_model->get_forms_by_odei( $odei );//get forms por ODEI, ingresados en PESCADOR 

			// if($forms->num_rows() > 0){
		
			// 	foreach($forms->result() as $filas){//busca en todas las tablas de pescador
			// 		$i = 0;
			// 		$table = null;
			// 		foreach($this->secciones as $s=>$k){
			// 			$table = 'pesc_seccion' . $s;
			// 			if($s == 10){
			// 				$table = 'pesc_info';
			// 			}
			// 			  $rega = $this->udra_pescador_model->get_regs_a($table,$filas->id);//recorre cada tabla
			// 			if ($rega->num_rows() >0){
			// 				$i++;
			// 			}
			// 		}
			// 		if ($i == 9){
			// 			$seccion_completos[] = $filas->id; //guarda los ID de formularios completos en todas las secciones

			// 		}else{
			// 			$seccion_incompletos[] = $filas->id; //guarda los ID de formularios incompletos
			// 		}
			// 	}
			// }
			foreach ( $this->udra_pescador_model->get_forms_sec_info()->result() as $value) {
				$seccion_completos[] = $value->id;
			}
			foreach ( $this->udra_pescador_model->get_id_forms()->result() as $value) {
				if (!in_array($value->id, $seccion_completos)) {
					$seccion_incompletos[] = $value->id;

				}
			}			
			// if (count($seccion_completos)>0){
			//  	$data['formularios'] = $this->udra_pescador_model->get_n_formularios_by_odei($seccion_completos); 
			// }else{
			// 	$data['formularios'] = NULL;
			// }			
			if (count($seccion_incompletos)>0){
			 $data['formularios_inc'] = $this->udra_pescador_model->get_forms_incompletos($seccion_incompletos); 
			}else{
				$data['formularios_inc'] = NULL;
			}
			//var_dump($seccion_incompletos);echo '<br>';
	    	$this->load->view('backend/includes/template', $data);	
	
	}


	function export()
	{

			foreach ($this->marco_model->get_odei($this->tank_auth->get_ubigeo())->result() as $key ) {//get ODEIS que tiene el usuario
				$odei[] = $key->ODEI_COD;
			}

			//$tables = $this->marco_model->get_pescadores_by_ccpp($odei); 
			$tables = $this->udra_pescador_model->get_avance_gby_ccpp_by_odei($odei); 
			$udra = $this->udra_pescador_model->get_formularios_total_by_ccpp($odei); //get UDRA por ODEIS,  	


 			$seccion_completos = array();

			foreach ( $this->udra_pescador_model->get_forms_sec_info()->result() as $value) {
				$seccion_completos[] = $value->id;
			}
			if (count($seccion_completos)>0){
			 	$formularios = $this->udra_pescador_model->get_n_formularios_by_ccpp($odei,$seccion_completos); //N° formularios ingresados en COMUNIDAD completos
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
				$sheet->setCellValue('J1','PEA PESCADOR ' );
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



			// EXPORTACION A EXCEL
			$celda = 2;
			$col = 1;

			$i = 1;
			$tot_marco 	= 0;
			$tot_udra 	= 0;
			$tot_dig 	= 0;

			foreach($tables->result() as $row){
					$tot_marco 	+= $row->MARCO;
					$tot_udra 	+= $row->UDRA;
					$tot_dig 	+= $row->DIGITACION;

					$nform_udra = 0;
					$nform_com = 0;

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
					$sheet->setCellValue('J'.$celda, $row->MARCO);
					$sheet->setCellValue('K'.$celda, $row->UDRA );					
					$sheet->setCellValue('L'.$celda, $row->DIGITACION );
					$sheet->setCellValue('M'.$celda, ( ( $row->UDRA>0) ?  number_format( ($row->DIGITACION * 100)/$row->UDRA , 2,'.' ,'') : 0 ) );								
					$sheet->setCellValue('N'.$celda, ( ( $row->MARCO>0) ? number_format( ($row->UDRA * 100)/$row->MARCO , 2,'.' ,'') : 0 ) );			
			}
			//TOTALES

					$sheet->setCellValue('I2','TOTAL' );
					$sheet->setCellValue('J2', $tot_marco);
					$sheet->setCellValue('K2', $tot_udra);	
					$sheet->setCellValue('L2', $tot_dig);
					$sheet->setCellValue('M2', ($tot_udra>0) ? number_format( ($tot_dig*100)/$tot_udra , 2,'.' ,'') : 0 );// %avance dig							
					$sheet->setCellValue('N2', ($tot_marco>0) ? number_format( ($tot_udra*100)/$tot_marco , 2,'.' ,'') : 0 ); //  % udra y marco							

			// TOTALES

 		// CUERPO

		// SALIDA EXCEL
			//$objPHPExcel->getActiveSheet()->setCellValueExplicitByColumnAndRow($numColum,$numRow,$products[$i][$colName], PHPExcel_Cell_DataType::TYPE_STRING);
			// Propiedades del archivo excel
				$sheet->setTitle("PESCADOR");
				$this->phpexcel->getProperties()
				->setTitle("Avance")
				->setDescription("Avance pescador");

			header("Content-Type: application/vnd.ms-excel");
			$nombreArchivo = 'AVANCE_PESCADOR_'.date('YmdHis');
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
