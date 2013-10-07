<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class General_avance_by_seguimiento extends CI_Controller {
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
	protected $secciones_com = array(
					2 => 'Seccion II',
					3 => 'Seccion III',
					4 => 'Seccion IV',
					5 => 'Seccion V',
					6 => 'Seccion VI',
					7 => 'Seccion VII',
					8 => 'Seccion VIII',
					9 => 'Seccion IX',
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
		$this->load->model('udra_registro_model');
		$this->load->model('udra_comunidad_model');
		$this->load->model('avance_campo_subrutas_model');
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
			$data['main_content'] = 'digitacion/avance_digitacion/digitacion_vs_seguimiento_by_odei_view';
			$data['option'] = 42;

			foreach ($this->marco_model->get_odei($this->tank_auth->get_ubigeo())->result() as $key ) {//get ODEIS que tiene el usuario
				$odei[] = $key->ODEI_COD;
			}					
			$registros	= $this->marco_model->get_general_by_odei($odei); //get PEA por ODEIS, 
			$registros_udra_reg	= $this->udra_registro_model->get_udra_total_by_odei($odei); //get forms por ODEIS, 
			$registros_udra_pes	= $this->udra_pescador_model->get_formularios_total_by_odei($odei); //get forms por ODEIS, 						
			$registros_udra_acui = $this->udra_acuicultor_model->get_udra_total_by_odei($odei); //get forms por ODEIS, 
			$registros_udra_com	= $this->udra_comunidad_model->get_udra_total_by_odei($odei); //get forms por ODEIS, 

			$registros_dig_reg = $this->udra_registro_model->get_n_formularios_by_odei($odei); 
			// $registros_dig_pes = $this->udra_pescador_model->get_forms_by_odei( $odei );//get forms por ODEI, ingresados en PESCADOR 
			// $registros_dig_acui = $this->udra_acuicultor_model->get_forms_by_odei( $odei );//get forms por ODEI, ingresados en ACUICULTOR 
			// $registros_dig_com = $this->udra_comunidad_model->get_forms_by_odei( $odei );//get forms por ODEI, ingresados en COMUNIDAD 

			$total_trab_pes_totales_by_odei		= $this->avance_campo_subrutas_model->total_trab_pes_totales_by_odei();		// TOTALES de formulario PESCADOR por ODEI
			$total_trab_acui_totales_by_odei	= $this->avance_campo_subrutas_model->total_trab_acui_totales_by_odei();	// TOTALES de formulario ACUICULTOR por ODEI
			$total_trab_com_totales_by_odei		= $this->avance_campo_subrutas_model->total_trab_com_totales_by_odei();		// TOTALES de formulario COMUNIDAD por ODEI


			//PESCADOR, recorrido en tablas, buscando formularios completos
				// if($registros_dig_pes->num_rows() > 0){
				// 	$seccion_completos_pes = array();			
				// 	foreach($registros_dig_pes->result() as $filas){//busca en todas las tablas de pescador
				// 		$i = 0;
				// 		$table = null;
				// 		foreach($this->secciones as $s=>$k){
				// 			$table = 'pesc_seccion' . $s;
				// 			if($s == 10){ $table = 'pesc_info'; }

				// 			$rega = $this->udra_pescador_model->get_regs_a($table,$filas->id);//recorre cada tabla
				// 			if ( $rega->num_rows() >0 ){ $i++; }
				// 		}
				// 		if ($i == 9){
				// 			$seccion_completos_pes[] = $filas->id; //guarda los ID de formularios completos en todas las secciones
				// 		}else{
				// 			$seccion_incompletos_pes[] = $filas->id; //guarda los ID de formularios incompletos
				// 		}
				// 	}
				// }
				foreach ( $this->udra_pescador_model->get_forms_sec_info()->result() as $value) {
					$seccion_completos_pes[] = $value->id;
				}
				if (count($seccion_completos_pes)>0){ $formularios_dig_pes = $this->udra_pescador_model->get_n_formularios_by_odei($odei, $seccion_completos_pes); }
				else { $formularios_dig_pes = NULL;	}		

			// ACUICULTOR, recorrido en tablas, buscando formularios completos
				// if($registros_dig_acui->num_rows() > 0){
				// 	$seccion_completos_acui = array();
				// 	foreach($registros_dig_acui->result() as $filas){//busca en todas las tablas de pescador
				// 		$a = 0;
				// 		$table = null;
				// 		foreach($this->secciones as $s=>$k){
				// 			$table = 'acu_seccion' . $s;

				// 			$rega = $this->udra_acuicultor_model->get_regs_a($table,$filas->id1, $s);//recorre cada tabla
				// 			if ($rega->num_rows() >0){$a++;	}
				// 		}
				// 		if ($a == 9){
				// 			$seccion_completos_acui[] = $filas->id1; //guarda los ID de formularios completos en todas las secciones
				// 		}else{
				// 			$seccion_incompletos_acui[] = $filas->id1; //guarda los ID de formularios incompletos
				// 		}
				// 	}
				// }
				foreach ( $this->udra_acuicultor_model->get_forms_sec_info()->result() as $filas) {
					$seccion_completos_acui[] = $filas->id1;
				}					
				if (count($seccion_completos_acui)>0){ $formularios_dig_acui = $this->udra_acuicultor_model->get_n_formularios_by_odei($odei, $seccion_completos_acui); }
				else{ $formularios_dig_acui = NULL;	}	

			//COMUNIDAD, recorrido en tablas, buscando formularios completos
				// if($registros_dig_com->num_rows() > 0){
				// 	$seccion_completos_com = array();
				// 	foreach($registros_dig_com->result() as $filas){//busca en todas las tablas de pescador
				// 		$i = 0;
				// 		$table = null;
				// 		foreach($this->secciones_com as $s=>$k){
				// 			$table = 'comunidad_seccion' . $s;
				// 			if($s == 9){ $table = 'comunidad_info';	}

				// 			$rega = $this->udra_comunidad_model->get_regs_a($table,$filas->id);//recorre cada tabla
				// 			if ($rega->num_rows() >0){ $i++; }
				// 		}
				// 		if ($i == 8){
				// 			$seccion_completos_com[] = $filas->id; //guarda los ID de formularios completos en todas las secciones
				// 		}else{
				// 			$seccion_incompletos_com[] = $filas->id; //guarda los ID de formularios incompletos
				// 		}
				// 	}
				// }
				foreach ( $this->udra_comunidad_model->get_forms_sec_info()->result() as $value) {
					$seccion_completos_com[] = $value->id;
				}					
				if (count($seccion_completos_com)>0){ $formularios_dig_com = $this->udra_comunidad_model->get_n_formularios_by_odei($odei, $seccion_completos_com); } //N° formularios ingresados en pescador completos
				else { $formularios_dig_com = NULL; }	



			$filas = array();
			$tablas = array();

				$nac_udra_reg =  null;
				$nac_dig_reg = null;
				$nac_udra_pes = null;
				$nac_dig_pes = null;
				$nac_udra_acui = null;
				$nac_dig_acui = null;
				$nac_udra_com = null;				
				$nac_dig_com = null;
				$nac_seg_trab_pes_totales = null;
				$nac_seg_trab_acui_totales = null;
				$nac_seg_trab_com_totales = null;

				$filas['ODEI_COD'] = '';
				$filas['NOM_ODEI'] = 'NACIONAL';

				foreach ($registros_udra_reg->result() as $reg) {
				 	$nac_udra_reg = $nac_udra_reg +  $reg->TOTAL_FORM ;
				} 
				$filas['REG_UDRA'] = $nac_udra_reg;
				foreach ($registros_dig_reg->result() as $reg) {
				 	$nac_dig_reg = $nac_dig_reg + $reg->TOTAL_DIG; 
				} 
				$filas['REG_DIG'] = $nac_dig_reg;
				$filas['REG_AVANCE'] = ($nac_udra_reg>0) ? number_format( (($nac_dig_reg*100)/$nac_udra_reg),2,'.','') : 0 ;
				// PESCADOR ********************************************************************************************************
				foreach ($registros_udra_pes->result() as $pes) {
				 	 $nac_udra_pes = $nac_udra_pes + $pes->TOTAL_FORM; 
				} 
				$filas['PES_UDRA'] = $nac_udra_pes;

				if (isset($formularios_dig_pes)) {
					foreach ($formularios_dig_pes->result() as $pes) {
					 	 $nac_dig_pes = $nac_dig_pes + $pes->TOTAL_DIG; 
					} 
				} 
				$filas['PES_DIG'] = $nac_dig_pes;
				$filas['PES_AVANCE'] = ($nac_udra_pes>0) ? number_format( (($nac_dig_pes*100)/$nac_udra_pes),2,'.','') : 0 ;
				// ACUICULTOR ******************************************************************************************************
				foreach ($registros_udra_acui->result() as $acui) {
				 	 $nac_udra_acui =  $nac_udra_acui + $acui->TOTAL_FORM;
				} 
				$filas['ACUI_UDRA'] = $nac_udra_acui;

				if (isset($formularios_dig_acui)) {
					foreach ($formularios_dig_acui->result() as $acui) {
					 	$nac_dig_acui = $nac_dig_acui + $acui->TOTAL_DIG;  
					} 
				} 
				$filas['ACUI_DIG'] = $nac_dig_acui;
				$filas['ACUI_AVANCE'] = ($nac_udra_acui>0) ? number_format( (($nac_dig_acui*100)/$nac_udra_acui),2,'.','') : 0 ;
				// COMUNIDAD *******************************************************************************************************
				foreach ($registros_udra_com->result() as $com) {
				 	$nac_udra_com = $nac_udra_com + $com->TOTAL_FORM; 
				} 
				$filas['COM_UDRA'] = $nac_udra_com;

				if (isset($formularios_dig_com)) {
					foreach ($formularios_dig_com->result() as $com) {
					 	$nac_dig_com = $nac_dig_com + $com->TOTAL_DIG;
					} 
				} 
				$filas['COM_DIG'] = $nac_dig_com;
				$filas['COM_AVANCE'] = ($nac_udra_com>0) ? number_format( (($nac_dig_com*100)/$nac_udra_com),2,'.','') : 0 ;
				// TOTALES *********************************************************************************************************
				$nac_udra_total = $nac_udra_reg + $nac_udra_pes + $nac_udra_acui + $nac_udra_com;
				$filas['UDRA_TOTAL'] = $nac_udra_total;
				$nac_dig_total = $nac_dig_reg + $nac_dig_pes + $nac_dig_acui + $nac_dig_com;
				$filas['DIG_TOTAL'] = $nac_dig_total;
				$filas['AVANCE_TOTAL'] = ( $nac_udra_total>0 ) ? number_format( ( ($nac_dig_total*100)/$nac_udra_total ), 2,'.','') : 0 ;
				// AVANCE CAMPO SUB RUTAS, SEGUIMIENTO *****************************************************************************
				foreach ($total_trab_pes_totales_by_odei->result() as  $seg) {
					$nac_seg_trab_pes_totales = $nac_seg_trab_pes_totales + $seg->TOT_FORM  ; 
				}	
				$filas['SEG_PES'] = $nac_seg_trab_pes_totales;

				foreach ($total_trab_acui_totales_by_odei->result() as  $seg) {
					$nac_seg_trab_acui_totales = $nac_seg_trab_acui_totales + $seg->TOT_FORM  ; 
				}	
				$filas['SEG_ACUI'] = $nac_seg_trab_acui_totales;

				foreach ($total_trab_com_totales_by_odei->result() as  $seg) {
					$nac_seg_trab_com_totales = $nac_seg_trab_com_totales + $seg->TOT_FORM  ;
				}
				$filas['SEG_COM'] = $nac_seg_trab_com_totales;
				// TOTALES DIGITACION VS SEGUIMIENTO *******************************************************************************
				$filas['SEG_AVAN_PES'] =  ( $nac_seg_trab_pes_totales > 0 ) ? number_format( ( ($nac_dig_pes*100)/$nac_seg_trab_pes_totales ),2, '.','' ) : 0 ;
				$filas['SEG_AVAN_ACUI'] =  ( $nac_seg_trab_acui_totales > 0 ) ? number_format( ( ($nac_dig_acui*100)/$nac_seg_trab_acui_totales ),2, '.','' ) : 0 ;
				$filas['SEG_AVAN_COM'] =  ( $nac_seg_trab_com_totales > 0 ) ? number_format( ( ($nac_dig_com*100)/$nac_seg_trab_com_totales ),2, '.','' ) : 0 ;

				$tablas[] = $filas;//agrega un registro a la tabla

			foreach ($registros as $key => $value) {
				$udra_reg = null;
				$dig_reg = null;
				$udra_pes = null;
				$dig_pes = null;
				$udra_acui = null;
				$dig_acui = null;	
				$udra_com = null;
				$dig_com = null;	
				$seg_trab_pes_totales = null;
				$seg_trab_acui_totales = null;
				$seg_trab_com_totales = null;
				$filas = null; // nuevo  registro				

				$filas['ODEI_COD'] = $value->ODEI_COD;
				$filas['NOM_ODEI'] = $value->NOM_ODEI;
				// REGISTRO DE PESCADORES Y ACUICULTORES **************************************************************************
				foreach ($registros_udra_reg->result() as $reg) {
				 	if ( $value->ODEI_COD == $reg->ODEI_COD) { $udra_reg = $reg->TOTAL_FORM; break; }
				} 
				if ( !is_numeric($udra_reg) ){ $udra_reg = 0; }
				$filas['REG_UDRA'] = $udra_reg;

				foreach ($registros_dig_reg->result() as $reg) {
				 	if ( $value->ODEI_COD == $reg->ODEI_COD) { $dig_reg = $reg->TOTAL_DIG; break; }
				} 
				if ( !is_numeric($dig_reg) ){ $dig_reg = 0; }
				$filas['REG_DIG'] = $dig_reg;
				$filas['REG_AVANCE'] = ($udra_reg>0) ? number_format( (($dig_reg*100)/$udra_reg),2,'.','') : 0 ;

				// PESCADOR ********************************************************************************************************
				foreach ($registros_udra_pes->result() as $pes) {
				 	if ( $value->ODEI_COD == $pes->ODEI_COD) { $udra_pes = $pes->TOTAL_FORM; break; }
				} 
				if ( !is_numeric($udra_pes) ){ $udra_pes = 0; }
				$filas['PES_UDRA'] = $udra_pes;

				if (isset($formularios_dig_pes)) {
					foreach ($formularios_dig_pes->result() as $pes) {
					 	if ( $value->ODEI_COD == $pes->ODEI_COD) { $dig_pes = $pes->TOTAL_DIG; break; }
					} 
				} 
				if ( !is_numeric($dig_pes) ){ $dig_pes = 0; }
				$filas['PES_DIG'] = $dig_pes;
				$filas['PES_AVANCE'] = ($udra_pes>0) ? number_format( (($dig_pes*100)/$udra_pes),2,'.','') : 0 ;

				// ACUICULTOR ******************************************************************************************************
				foreach ($registros_udra_acui->result() as $acui) {
				 	if ( $value->ODEI_COD == $acui->ODEI_COD) { $udra_acui = $acui->TOTAL_FORM; break; }
				} 
				if ( !is_numeric($udra_acui) ){ $udra_acui = 0; }
				$filas['ACUI_UDRA'] = $udra_acui;

				if (isset($formularios_dig_acui)) {
					foreach ($formularios_dig_acui->result() as $acui) {
					 	if ( $value->ODEI_COD == $acui->ODEI_COD) { $dig_acui = $acui->TOTAL_DIG; break; }
					} 
				} 
				if ( !is_numeric($dig_acui) ){ $dig_acui = 0; }
				$filas['ACUI_DIG'] = $dig_acui;
				$filas['ACUI_AVANCE'] = ($udra_acui>0) ? number_format( (($dig_acui*100)/$udra_acui),2,'.','') : 0 ;

				// COMUNIDAD *******************************************************************************************************
				foreach ($registros_udra_com->result() as $com) {
				 	if ( $value->ODEI_COD == $com->ODEI_COD) { $udra_com = $com->TOTAL_FORM; break; }
				} 
				if ( !is_numeric($udra_com) ){ $udra_com = 0; }
				$filas['COM_UDRA'] = $udra_com;

				if (isset($formularios_dig_com)) {
					foreach ($formularios_dig_com->result() as $com) {
					 	if ( $value->ODEI_COD == $com->ODEI_COD) { $dig_com = $com->TOTAL_DIG; break; }
					} 
				} 
				if ( !is_numeric($dig_com) ){ $dig_com = 0; }
				$filas['COM_DIG'] = $dig_com;
				$filas['COM_AVANCE'] = ($udra_com>0) ? number_format( (($dig_com*100)/$udra_com),2,'.','') : 0 ;
				// TOTALES *********************************************************************************************************
				$udra_total = $udra_reg + $udra_pes + $udra_acui + $udra_com;
				$filas['UDRA_TOTAL'] = $udra_total;
				$dig_total = $dig_reg + $dig_pes + $dig_acui + $dig_com;
				$filas['DIG_TOTAL'] = $dig_total;
				$filas['AVANCE_TOTAL'] = ( $udra_total>0 ) ? number_format( ( ($dig_total*100)/$udra_total ), 2,'.','') : 0 ;
			
				// AVANCE CAMPO SUB RUTAS, SEGUIMIENTO *****************************************************************************
				foreach ($total_trab_pes_totales_by_odei->result() as  $seg) {
					if ($value->ODEI_COD == $seg->COD_ODEI){ $seg_trab_pes_totales = $seg->TOT_FORM  ; break; }
				}	
				if ( !is_numeric($seg_trab_pes_totales) ){ $seg_trab_pes_totales = 0; }
				$filas['SEG_PES'] = $seg_trab_pes_totales;

				foreach ($total_trab_acui_totales_by_odei->result() as  $seg) {
					if ($value->ODEI_COD == $seg->COD_ODEI){ $seg_trab_acui_totales = $seg->TOT_FORM  ; break; }
				}	
				if ( !is_numeric($seg_trab_acui_totales) ){ $seg_trab_acui_totales = 0; }
				$filas['SEG_ACUI'] = $seg_trab_acui_totales;

				foreach ($total_trab_com_totales_by_odei->result() as  $seg) {
					if ($value->ODEI_COD == $seg->COD_ODEI){ $seg_trab_com_totales = $seg->TOT_FORM  ; break; }
				}
				if ( !is_numeric($seg_trab_com_totales) ){ $seg_trab_com_totales = 0; }
				$filas['SEG_COM'] = $seg_trab_com_totales;

				// TOTALES DIGITACION VS SEGUIMIENTO *******************************************************************************
				$filas['SEG_AVAN_PES'] =  ( $seg_trab_pes_totales > 0 ) ? number_format( ( ($dig_pes*100)/$seg_trab_pes_totales ),2, '.','' ) : 0 ;
				$filas['SEG_AVAN_ACUI'] =  ( $seg_trab_acui_totales > 0 ) ? number_format( ( ($dig_acui*100)/$seg_trab_acui_totales ),2, '.','' ) : 0 ;
				$filas['SEG_AVAN_COM'] =  ( $seg_trab_com_totales > 0 ) ? number_format( ( ($dig_com*100)/$seg_trab_com_totales ),2, '.','' ) : 0 ;

				$tablas[] = $filas;//agrega un registro a la tabla

			}

					
			//var_dump($tablas);
			//var_dump($data['udra_acui']->result());
			//var_dump($data['udra_pes']->result());







	
			

			$data['tables'] = $tablas;
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
