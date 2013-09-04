<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Avance_empadronador extends CI_Controller {

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
		$this->output->nocache();
		$this->load->library('form_validation');
		$this->load->library('security');
		$this->load->library('tank_auth');
		$this->load->library('PHPExcel');
		////$this->load->library('PHPExcel/iofactory.php');
		//$this->load->library('/phpexcel/writer/excel2007');
	
		$this->lang->load('tank_auth');		

		//User is logged in
		if (!$this->tank_auth->is_logged_in()) {
			redirect('/auth/login/');
		}

		//Check user privileges 
		$roles = $this->tank_auth->get_roles();
		$flag = FALSE;
		foreach ($roles as $role) {
			if($role->role_id == 8 && $role->rolename == 'Seguimiento'){
				$flag = TRUE;
				break;
			}
		}

		//If not author is the maintenance guy!
		if (!$flag) {
			show_404();
			die();
		}

		$this->load->model('marco_model');	
		$this->load->model('monitoreo_especial_model');	
		$this->load->model('avance_campo_subrutas_model');	
		$this->load->model('registro_pescadores_model');	
		$this->load->model('ccpp_model');	
		$this->load->model('udra_registro_model');	
		$this->load->model('udra_pescador_model');	
		$this->load->model('udra_acuicultor_model');	
		$this->load->model('udra_comunidad_model');	
		$this->load->model('meta_marco_model');	

	}


	public function index()
	{
			$data['nav'] = TRUE;
			//regular
			//$data['departamentos'] = $this->ubigeo_piloto_model->get_dptos();
			$data['title'] = 'Revision';

			//cabecera
			foreach ($this->marco_model->get_odei($this->tank_auth->get_ubigeo())->result() as $key ) {
				$odei[] = $key->ODEI_COD;
			}
			$data['sede'] = $this->marco_model->get_sede(); 
			//$data['departamento'] = $this->marco_model->get_dpto_by_odei($odei); 
			//$data['jefe_brigada'] = $this->avance_campo_subrutas_model->get_jefe_by_odei($odei); 
			
			//regular
			//$data['tables'] = $this->avance_campo_subrutas_model->get_todo($odei);
			//$data['reporte'] = $this->tank_auth->get_ubigeo();
			//$data['main_content'] = 'seguimiento/avance_empadronador_view';
			$data['main_content'] = 'seguimiento/forms/avance_empadronador_form';
			$data['option'] = 5;
	        $this->load->view('backend/includes/template', $data);

	}
	public function consulta()
	{
		$is_ajax = $this->input->post('ajax');
		if ($is_ajax) {
			$sede 	= $this->input->post('sede');
			$dep 	= $this->input->post('dep');
			$equipo = $this->input->post('equipo');
			$ruta 	= $this->input->post('ruta');
			$sub_ruta = $this->input->post('sub_ruta');

			$consulta = $this->avance_campo_subrutas_model->consulta_sub_ruta($sede,$dep,$equipo,$ruta,$sub_ruta);// 
			$data['datos'] = $consulta->num_rows();// numero de registros
			$this->load->view('backend/json/json_view',$data);
		}
	}
	public function grabar()
	{
		$cont = 0;
		$is_ajax = $this->input->post('ajax');
		if($is_ajax){

			$sede 	= $this->input->post('CCSE');
			$dep 	= $this->input->post('CCDD');
			$equipo = $this->input->post('EQP');
			$ruta 	= $this->input->post('RUTA');
			$sub_ruta = $this->input->post('SUB_R');			
			$cc_ccpp = $this->input->post('CC_CCPP');	
			$cc_ccpp_num = $this->input->post('CC_CCPP_NUM');	

			$lista =  $this->avance_campo_subrutas_model->get_fields();

			foreach ($lista as $campo ) {
				if (!in_array($campo, array('user_id','last_ip','user_agent','created','modified','user_id_m','COD','COD_REG','activo','id'))) {
					$data_reg[$campo] = ($this->input->post($campo) == '') ? NULL : $this->input->post($campo);
					$cont++;
				}
			}

			$consulta = $this->avance_campo_subrutas_model->consulta($sede,$dep,$equipo,$ruta,$sub_ruta,$cc_ccpp,$cc_ccpp_num);

			if ($consulta->num_rows() == 0 ){ // inserta en la tabla

				// if ($this->tank_auth->get_ubigeo()==99) {
					//$cc_ccpp_num = ($this->input->post('CC_CCPP_NUM') == '') ?  $this->input->post('CC_CCPP') : $this->input->post('CC_CCPP_NUM');//si es vacio Cod de numeracion
					//$data_reg['CC_CCPP_NUM'] = $cc_ccpp_num;
					$data_reg['COD'] = ($sede.$dep.$equipo.$ruta.$sub_ruta);
					$data_reg['COD_REG'] = ($sede.$dep.$equipo.$ruta.$sub_ruta.$cc_ccpp.$cc_ccpp_num);
					$data_reg['user_id'] = $this->tank_auth->get_user_id();
					$data_reg['created'] = date('Y-m-d H:i:s');
					$data_reg['last_ip'] =  $this->input->ip_address();
					$data_reg['user_agent'] = $this->agent->agent_string();		
					$data_reg['activo'] = 1;		

					$guardado = $this->avance_campo_subrutas_model->insert_sub_ruta($data_reg);

					if ($guardado == 1){
						$datos = 'guardado';
					}else{
						$datos = 'no_guardado';
					}
				//}
			}else{ //actualiza

				// if ($this->tank_auth->get_ubigeo()==99) {
					$data_reg['user_id_m'] = $this->tank_auth->get_user_id();
					$data_reg['modified'] = date('Y-m-d H:i:s');
					$data_reg['last_ip'] =  $this->input->ip_address();
					$data_reg['user_agent'] = $this->agent->agent_string();		

					$guardado = $this->avance_campo_subrutas_model->update_sub_ruta($sede,$dep,$equipo,$ruta,$sub_ruta,$cc_ccpp,$cc_ccpp_num,$data_reg);

					if ($guardado == 1){
						$datos = 'modificado';
					}else{
						$datos = 'no_modificado';
					}
				//}	

			}

			$data['datos'] = $datos;
			$this->load->view('backend/json/json_view', $data);		
			
		}else{
			show_404();;
		}
	}

	public function editar(){

	}

	// LLENA COMBOS
		function get_ajax_equipo()
		{
			//$this->output->cache(30);		
			$sede = $this->input->post('sede');
			$dep = $this->input->post('dep');
			$datos = $this->monitoreo_especial_model->get_equipo($sede, $dep)->result();// envia array de equipos
			$data['datos'] = $datos;
			$this->load->view('backend/json/json_view',$data);
		}

		function get_ajax_ruta()
		{	
			//$this->output->cache(30);
			$sede = $this->input->post('sede');
			$dep = $this->input->post('dep');
			$equipo =  $this->input->post('equipo');

			$datos = $this->monitoreo_especial_model->get_ruta($sede, $dep,$equipo)->result(); //  array de rutas
			$data['datos'] = $datos;
			$this->load->view('backend/json/json_view',$data);
		}

		function get_ajax_sub_ruta()
		{	
			//$this->output->cache(30);
			$sede = $this->input->post('sede');
			$dep = $this->input->post('dep');
			$equipo =  $this->input->post('equipo');
			$ruta =  $this->input->post('ruta');

			$datos = $this->monitoreo_especial_model->get_sub_ruta($sede, $dep, $equipo, $ruta)->result(); //  array de sub_rutas
			$data['datos'] = $datos;
			$this->load->view('backend/json/json_view',$data);
		}	
	//

	//LLENAR EL DETALLE
	function get_ajax_all(){
		//$this->output->cache(30);
		$sede = $this->input->post('sede');
		$dep = $this->input->post('dep');
		$equipo = $this->input->post('equipo');
		$ruta =  $this->input->post('ruta');
		$sub_ruta =  $this->input->post('sub_ruta');
		$opcion =  $this->input->post('opcion');
		if ($opcion == 111){ // LLENA 
			$data['datos'] = $this->monitoreo_especial_model->get_all($sede,$dep,$equipo,$ruta,$sub_ruta)->result(); // envia la consulta_ccpp
		}else if($opcion == 222){
			$data['datos'] = $this->avance_campo_subrutas_model->get_all($sede,$dep,$equipo,$ruta,$sub_ruta)->result(); // la tabla AVANCE CAMPO SUBRATOS
		}

		$this->load->view('backend/json/json_view', $data);	

	}

	function get_ajax_ccpp_by_sub_ruta(){
		//$this->output->cache(30);
		$sede = $this->input->post('sede');
		$dep = $this->input->post('dep');
		$equipo = $this->input->post('equipo');
		$ruta =  $this->input->post('ruta');
		$sub_ruta =  $this->input->post('sub_ruta');
		
		$data['datos'] = $this->monitoreo_especial_model->get_ccpp_by_sub_ruta($sede,$dep,$equipo,$ruta,$sub_ruta)->result();
		$this->load->view('backend/json/json_view',$data);

	}

	function get_todo(){
			//$data['nav'] = TRUE;
		//cabecera
		foreach ($this->marco_model->get_odei($this->tank_auth->get_ubigeo())->result() as $key ) {
			$odei[] = $key->ODEI_COD;
		}
		
		//regular
		$data['tables'] = $this->avance_campo_subrutas_model->get_todo($odei);
		$data['main_content'] = 'seguimiento/avance_tabla_view';
        $this->load->view('backend/includes/template', $data);

	}


    public function export(){

    	//colores
    		//$color_celda_cabeceras = '27408B';

			$color_celda_cabeceras =   array(
				        'fill' => array(
				            'type' => PHPExcel_Style_Fill::FILL_SOLID,
				            'color' => array('rgb' => '27408B')
				        )
				    );    		
    	//colores
		// 	$data['pea_marco'] = ; // obtiene la PEA MARCO
		// 	$data['avance_campo'] = $this->avance_campo_model->get_reporte_avance(); // avance de PEA CAMPO
		// $filtros = $this->segmentacion_model->get_empadronador($sede, $dep, $equi, $ruta);   

	/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
	///////////  H O J A   1 ////////////////////////////////////////////////////////////////////////////////////////////////////////
	/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
		// pestaña
		$sheet = $this->phpexcel->createSheet(0);			
		//$sheet = $this->phpexcel->setActiveSheetIndex(0);
		//$sheet = $this->phpexcel->getActiveSheet(0);
		//$objWorksheet = $objPHPExcel->setActiveSheetIndex(1);



		$deps 			= $this->avance_campo_subrutas_model->get_all_dep();
		$total_ccpp 	= $this->avance_campo_subrutas_model->get_num_ccpp();    //TOTAL CCPP  nacional
		$total_reg  	= $this->avance_campo_subrutas_model->get_num_reg(); 	 //TOTAL CCPP con REG  nacional

		$total_ccpp_by_dep  = $this->avance_campo_subrutas_model->get_num_ccpp_by_dep(); //TOTAL CCPP by DEp	
		$total_reg_by_dep   = $this->avance_campo_subrutas_model->get_num_reg_by_dep(); //TOTAL CCPP con REG by DEp	


		
		// formato de la hoja
			//Set Orientation, size and scaling
			//$objPHPExcel->setActiveSheetIndex(0);
			//$sheet->getPageSetup()->setOrientation(PHPExcel_Worksheet_PageSetup::ORIENTATION_LANDSCAPE);// horizontal
			$sheet->getPageSetup()->setOrientation(PHPExcel_Worksheet_PageSetup::ORIENTATION_PORTRAIT); // vertical
			$sheet->getPageSetup()->setPaperSize(PHPExcel_Worksheet_PageSetup::PAPERSIZE_A4);
			$sheet->getPageSetup()->setFitToPage(false); // ajustar pagina
			$sheet->getPageSetup()->setFitToWidth(1);
			$sheet->getPageSetup()->setFitToHeight(0);		
			$sheet->setShowGridlines(false);// oculta lineas de cuadricula		
		// formato de la hoja

		// ANCHO Y ALTURA DE COLUMNAS DEL FILE
			$sheet->getColumnDimension('A')->setWidth(8);
			$sheet->getColumnDimension('B')->setWidth(40);
			$sheet->getColumnDimension('C')->setWidth(20);
			$sheet->getColumnDimension('D')->setWidth(20);
			$sheet->getColumnDimension('E')->setWidth(20);
			$sheet->getColumnDimension('F')->setWidth(20);


			$sheet->getRowDimension(4)->setRowHeight(2);
			$sheet->getRowDimension(6)->setRowHeight(2);
			$sheet->getRowDimension(16)->setRowHeight(100);
		// ANCHO Y ALTURA DE COLUMNAS DEL FILE

		// TITULOS
			$sheet->setCellValue('A3','INSTITUTO NACIONAL DE ESTADÍSTICA E INFORMATICA');
			$sheet->mergeCells('A3:E3');
			$sheet->setCellValue('A5','PRIMER CENSO NACIONAL DE PESCA CONTINENTAL' );
			$sheet->mergeCells('A5:E5');
			$sheet->setCellValue('A9','REPORTE DE REGISTRO' );
			$sheet->mergeCells('A9:E9');	
					
			$sheet->getStyle('A3:E9')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);	
			$sheet->getStyle('A3:E9')->getFont()->getColor()->setARGB(PHPExcel_Style_Color::COLOR_BLACK);
			$sheet->getStyle('A3:E9')->getFont()->setname('Arial black')->setSize(19);	
			$sheet->getStyle('A5:E9')->getFont()->setname('Arial ')->setSize(19);	
			$sheet->getStyle('A9')->getFont()->setname('Arial black')->setSize(16);	



			// LOGO
	          $objDrawing = new PHPExcel_Worksheet_Drawing();
	          $objDrawing->setWorksheet($sheet);
	          $objDrawing->setName("inei");
	          $objDrawing->setDescription("Inei");
	          $objDrawing->setPath("img/inei.jpeg");
	          $objDrawing->setCoordinates('A7');
	          $objDrawing->setHeight(60);
	          $objDrawing->setOffsetX(1);
	          $objDrawing->setOffsetY(5);

	          $objDrawing2 = new PHPExcel_Worksheet_Drawing();
	          $objDrawing2->setWorksheet($sheet);
	          $objDrawing2->setName("CENPESCO");
	          $objDrawing2->setDescription("CENPESCO");
	          $objDrawing2->setPath("img/cenpesco.jpg");
	          $objDrawing2->setCoordinates('E7');
	          $objDrawing2->setHeight(60);
	          $objDrawing2->setWidth(100);
	          $objDrawing2->setOffsetX(1);
	          $objDrawing2->setOffsetY(10);
		// TITULOS


		// CABECERA
			// INICIO DE LA  cabecera
			$cab = 16;	
				
			// NOMBRE CABECERAS

					$sheet->setCellValue('A'.$cab,'CCDD');
					//$sheet->mergeCells('B'.$cab.':B'.($cab+2));
					$sheet->setCellValue('B'.$cab,'DEPARTAMENTO' );
					//$sheet->mergeCells('C'.$cab.':C'.($cab+2));

					$sheet->setCellValue('C'.$cab,'TOTAL CENTROS POBLADOS' );
					//$sheet->mergeCells('D'.$cab.':D'.($cab+2));
					$sheet->setCellValue('D'.$cab,'TOTAL CENTROS POBLADOS CON REGISTRO' );
					//$sheet->mergeCells('E'.$cab.':E'.($cab+2));
					$sheet->setCellValue('E'.$cab,'TASA DE COBERTURA' );
					//$sheet->mergeCells('F'.$cab.':F'.($cab+2));

																																			
			// NOMBRE CABECERAS

			// ESTILOS  CABECERAS
				$sheet->getStyle("A".$cab.":E".($cab))->getAlignment()->setWrapText(true);// AJUSTA TEXTO A CELDA
				$sheet->getStyle("A".$cab.":E".($cab))->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);						
				$sheet->getStyle("A".$cab.":E".($cab))->getAlignment()->setVertical(PHPExcel_Style_Alignment::VERTICAL_CENTER);						
				$sheet->getStyle("A".$cab.":E".($cab))->getFont()->getColor()->setARGB(PHPExcel_Style_Color::COLOR_WHITE);
				$sheet->getStyle("A".$cab.":E".($cab))->getFont()->setname('Arial')->setSize(12);


		     	$headStyle = $this->phpexcel->getActiveSheet()->getStyle("A".$cab.":E".($cab));
		        //$headStyle->getFill()->setFillType(PHPExcel_Style_Fill::FILL_SOLID)->getStartColor()->setARGB('#FF9900');
				$headStyle->applyFromArray($color_celda_cabeceras);

				$sheet->getStyle("A".$cab.":E".($cab) )->applyFromArray(array(
				'borders' => array(
							'allborders' => array(
											'style' => PHPExcel_Style_Border::BORDER_THIN)
						)
				));

				//$sheet->getStyle('J16')->getFont()->setname('Arial Narrow')->setSize(9); // tamaño especial para esta celda
			// ESTILOS  CABECERAS
		// CABECERA

	    // CUERPO
			$total = $deps->num_rows() + ($cab+1); // total del cuerpo

			$sheet->getStyle("A".($cab+2).":E".$total)->getFont()->setname('Arial ')->setSize(11);

			//bordes cuerpo
			$sheet->getStyle("A".($cab+1).":E".($total) )->applyFromArray(array(
			'borders' => array(
						'allborders' => array(
										'style' => PHPExcel_Style_Border::BORDER_THIN)
					)
			));
			$sheet->getStyle('A'.($cab+2).':A'.$total)->getNumberFormat()->setFormatCode('00');
			// EXPORTACION A EXCEL
			$sheet->setCellValue('A'.($cab+1),'NACIONAL');
			$sheet->mergeCells('A'.($cab+1).':B'.($cab+1),'NACIONAL');
			$sheet->getStyle('A'.($cab+1) )->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);	
			$sheet->getStyle('A17:E17')->getFont()->setname('Arial black')->setSize(11);	
			$sheet->setCellValue('C'.($cab+1), $total_ccpp->num_rows() );
			$sheet->setCellValue('D'.($cab+1), $total_reg->num_rows() );
			$sheet->setCellValue('E'.($cab+1), number_format( ( ( $total_reg->num_rows()*100)/$total_ccpp->num_rows() ),2,'.',' ' ) );



			// **************************************************************************
			$row = $cab+1;// inicio de la fila del cuerpo
			$col = 1; // inicio del column
			$num = 0; // para numerar
			$cambio = FALSE; // para intercarlar colores registros
			$reg = null;
			$tot_ccpp = null;


			foreach($deps->result() as $celda){
				$row++;
				$sheet->setCellValue('A'.$row, $celda->CCDD);
				$sheet->setCellValue('B'.$row, $celda->DEPARTAMENTO);
				//$sheet->setCellValue('C'.$row, $celda->TOTAL);

				foreach ($total_ccpp_by_dep->result() as  $value) {
					if ($celda->CCDD == $value->CCDD){
						$tot_ccpp = $value->TOTAL  ; break;
					}
				}

				foreach ($total_reg_by_dep->result() as  $value) {
					if ($celda->CCDD == $value->CCDD){
						$reg = $value->TOTAL  ; break;
					}
				}

				if (is_numeric($tot_ccpp)){ 
					$sheet->setCellValue('C'.$row, $tot_ccpp);
					//$sheet->setCellValue('E'.$row, number_format(((($reg)*100)/($celda->TOTAL )) ,2,'.',' '));
					//$sheet->getStyle("E".$row.":E".$row)->getFont()->setname('Arial black')->setSize(9);
				}else{
					$sheet->setCellValue('C'.$row, 0 );
					//$sheet->setCellValue('E'.$row, 0);
				}	

				if (is_numeric($reg)){ 
					$sheet->setCellValue('D'.$row, $reg);
					//$sheet->setCellValue('E'.$row, number_format(((($reg)*100)/($tot_ccpp )) ,2,'.',' '));
					//$sheet->getStyle("E".$row.":E".$row)->getFont()->setname('Arial black')->setSize(9);
				}else{
					$sheet->setCellValue('D'.$row, 0 );
					//$sheet->setCellValue('E'.$row, 0);
				}
				if($tot_ccpp >0 ){
					$sheet->setCellValue('E'.$row, number_format( (($reg*100)/$tot_ccpp) ,2,'.',' '));
					//$sheet->setCellValue('E'.$row,  ());
					//$sheet->setCellValue('E'.$row,  '=(D'. $row .'*100)/C'. $row );
					//$sheet->setCellValue('E'.$row,  'fdfddf');
				}else{
					$sheet->setCellValue('E'.$row, '0.0');
				}


			
				$reg = null;
				$tot_ccpp = null;
			}
			$sheet->getStyle("E".($cab+2).":E".$total)->getFont()->setname('Arial black')->setSize(11);
			$sheet->getStyle('A3:E9')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);	//opcional


 		// CUERPO

	/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
	///////////  H O J A   1 ////////////////////////////////////////////////////////////////////////////////////////////////////////
	/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

	/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
	///////////  H O J A   2 ////////////////////////////////////////////////////////////////////////////////////////////////////////
	/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

		$deps 			= $this->avance_campo_subrutas_model->get_all_dep();		//DEPARTAMENTOS
		$total_pes	 	= $this->avance_campo_subrutas_model->get_pescadores();     //TOTAL PESCADORES  nacional
		$total_pes_tot 	= $this->avance_campo_subrutas_model->get_pescadores_totales(); 	 //TOTALES PESCADOR a  nacional

		$total_pes_by_dep 		= $this->avance_campo_subrutas_model->get_pescadores_by_dep();     		//TOTAL PESCADORES  nacional
		$total_pes_tot_by_dep 	= $this->avance_campo_subrutas_model->get_pescadores_totales_by_dep(); 	//TOTALES PESCADOR a  nacional

		// pestaña
		$sheet2 = $this->phpexcel->createSheet(1);	
		//$sheet2 = $this->phpexcel->setActiveSheetIndex(1);
		//$sheet = $this->phpexcel->getActiveSheet(1);
		
		// formato de la hoja
			// Set Orientation, size and scaling
			//$objPHPExcel->setActiveSheetIndex(0);
			//$sheet2->getPageSetup()->setOrientation(PHPExcel_Worksheet_PageSetup::ORIENTATION_LANDSCAPE);// horizontal
			$sheet2->getPageSetup()->setOrientation(PHPExcel_Worksheet_PageSetup::ORIENTATION_PORTRAIT); // vertical
			$sheet2->getPageSetup()->setPaperSize(PHPExcel_Worksheet_PageSetup::PAPERSIZE_A4);
			$sheet2->getPageSetup()->setFitToPage(false); // ajustar pagina
			$sheet2->getPageSetup()->setFitToWidth(1);
			$sheet2->getPageSetup()->setFitToHeight(0);		
			$sheet2->setShowGridlines(false);// oculta lineas de cuadricula		
		// formato de la hoja

		// ANCHO Y ALTURA DE COLUMNAS DEL FILE
			$sheet2->getColumnDimension('A')->setWidth(8);
			$sheet2->getColumnDimension('B')->setWidth(40);
			$sheet2->getColumnDimension('C')->setWidth(20);
			$sheet2->getColumnDimension('D')->setWidth(20);
			$sheet2->getColumnDimension('E')->setWidth(12);
			$sheet2->getColumnDimension('F')->setWidth(12);
			$sheet2->getColumnDimension('G')->setWidth(12);
			$sheet2->getColumnDimension('H')->setWidth(12);
			$sheet2->getColumnDimension('I')->setWidth(15);
			$sheet2->getColumnDimension('J')->setWidth(15);


			$sheet2->getRowDimension(4)->setRowHeight(2);
			$sheet2->getRowDimension(6)->setRowHeight(2);
			$sheet2->getRowDimension(16)->setRowHeight(100);
		// ANCHO Y ALTURA DE COLUMNAS DEL FILE

		// TITULOS
			$sheet2->setCellValue('A3','INSTITUTO NACIONAL DE ESTADÍSTICA E INFORMATICA');
			$sheet2->mergeCells('A3:J3');
			$sheet2->setCellValue('A5','PRIMER CENSO NACIONAL DE PESCA CONTINENTAL' );
			$sheet2->mergeCells('A5:J5');
			$sheet2->setCellValue('A9','REPORTE DE PESCADOR' );
			$sheet2->mergeCells('A9:J9');	
					
			$sheet2->getStyle('A3:J9')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);	
			$sheet2->getStyle('A3:J9')->getFont()->getColor()->setARGB(PHPExcel_Style_Color::COLOR_BLACK);
			$sheet2->getStyle('A3:J9')->getFont()->setname('Arial black')->setSize(25);	
			$sheet2->getStyle('A5:J9')->getFont()->setname('Arial ')->setSize(22);	
			$sheet2->getStyle('A9')->getFont()->setname('Arial black')->setSize(18);	



			// LOGO
	          $objDrawing = new PHPExcel_Worksheet_Drawing();
	          $objDrawing->setWorksheet($sheet2);
	          $objDrawing->setName("inei");
	          $objDrawing->setDescription("Inei");
	          $objDrawing->setPath("img/inei.jpeg");
	          $objDrawing->setCoordinates('A7');
	          $objDrawing->setHeight(60);
	          $objDrawing->setOffsetX(1);
	          $objDrawing->setOffsetY(5);

	          $objDrawing2 = new PHPExcel_Worksheet_Drawing();
	          $objDrawing2->setWorksheet($sheet2);
	          $objDrawing2->setName("CENPESCO");
	          $objDrawing2->setDescription("CENPESCO");
	          $objDrawing2->setPath("img/cenpesco.jpg");
	          $objDrawing2->setCoordinates('J7');
	          $objDrawing2->setHeight(60);
	          $objDrawing2->setWidth(100);
	          $objDrawing2->setOffsetX(1);
	          $objDrawing2->setOffsetY(10);
		// TITULOS


		// CABECERA
			// INICIO DE LA  cabecera
			$cab = 16;	
				
			// NOMBRE CABECERAS

					$sheet2->setCellValue('A'.$cab,'CCDD');
					//$sheet->mergeCells('B'.$cab.':B'.($cab+2));
					$sheet2->setCellValue('B'.$cab,'DEPARTAMENTO' );
					//$sheet->mergeCells('C'.$cab.':C'.($cab+2));
					$sheet2->setCellValue('C'.$cab,'TOTAL PESCADORES EN REGISTRO' );
					//$sheet->mergeCells('D'.$cab.':D'.($cab+2));
					$sheet2->setCellValue('D'.$cab,'TOTAL PESCADORES EMPADRONADOS' );
					//$sheet->mergeCells('E'.$cab.':E'.($cab+2));
					$sheet2->setCellValue('E'.$cab,'COMPLETO' );
					//$sheet->mergeCells('F'.$cab.':F'.($cab+2));
					$sheet2->setCellValue('F'.$cab,'IMCOMPLETO' );
					//$sheet->mergeCells('F'.$cab.':F'.($cab+2));
					$sheet2->setCellValue('G'.$cab,'RECHAZO' );
					//$sheet->mergeCells('F'.$cab.':F'.($cab+2));					
					$sheet2->setCellValue('H'.$cab,'OTRO' );
					//$sheet->mergeCells('F'.$cab.':F'.($cab+2));	
					$sheet2->setCellValue('I'.$cab,'TASA DE COBERTURA' );
					//$sheet->mergeCells('F'.$cab.':F'.($cab+2));	
					$sheet2->setCellValue('J'.$cab,'TASA NO RESPUESTA' );
					//$sheet->mergeCells('F'.$cab.':F'.($cab+2));	


			// NOMBRE CABECERAS

			// ESTILOS  CABECERAS
				$sheet2->getStyle("A".$cab.":J".($cab))->getAlignment()->setWrapText(true);// AJUSTA TEXTO A CELDA
				$sheet2->getStyle("A".$cab.":J".($cab))->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);						
				$sheet2->getStyle("A".$cab.":J".($cab))->getAlignment()->setVertical(PHPExcel_Style_Alignment::VERTICAL_CENTER);						
				$sheet2->getStyle("A".$cab.":J".($cab))->getFont()->getColor()->setARGB(PHPExcel_Style_Color::COLOR_WHITE);
				$sheet2->getStyle("A".$cab.":J".($cab))->getFont()->setname('Arial')->setSize(15);


		     	$headStyle = $this->phpexcel->getActiveSheet()->getStyle("A".$cab.":J".($cab));
		        //$headStyle->getFill()->setFillType(PHPExcel_Style_Fill::FILL_SOLID)->getStartColor()->setARGB('#FF9900');
				$headStyle->applyFromArray($color_celda_cabeceras);

				$sheet2->getStyle("A".$cab.":J".($cab) )->applyFromArray(array(
				'borders' => array(
							'allborders' => array(
											'style' => PHPExcel_Style_Border::BORDER_THIN)
						)
				));

				//$sheet->getStyle('J16')->getFont()->setname('Arial Narrow')->setSize(9); // tamaño especial para esta celda
			// ESTILOS  CABECERAS
		// CABECERA

	    // CUERPO
			$total = $deps->num_rows() + ($cab+1); // total del cuerpo

			$sheet2->getStyle("A".($cab+2).":J".$total)->getFont()->setname('Arial ')->setSize(14);

			//bordes cuerpo
			$sheet2->getStyle("A".($cab+1).":J".($total) )->applyFromArray(array(
			'borders' => array(
						'allborders' => array(
										'style' => PHPExcel_Style_Border::BORDER_THIN)
					)
			));
			$sheet2->getStyle('A'.($cab+2).':A'.$total)->getNumberFormat()->setFormatCode('00');
			// EXPORTACION A EXCEL
			$sheet2->setCellValue('A'.($cab+1),'NACIONAL');
			$sheet2->mergeCells('A'.($cab+1).':B'.($cab+1),'NACIONAL');
			$sheet2->getStyle('A'.($cab+1) )->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);	
			$sheet2->getStyle('A17:J17')->getFont()->setname('Arial black')->setSize(14);	
			$sheet2->setCellValue('C'.($cab+1), $total_pes->row('TOTAL') );
			$sheet2->setCellValue('D'.($cab+1), $total_pes_tot->row('TOT_FORM') );
			$sheet2->setCellValue('E'.($cab+1), $total_pes_tot->row('COMPLETAS') );
			$sheet2->setCellValue('F'.($cab+1), $total_pes_tot->row('INCOMPLETAS') );
			$sheet2->setCellValue('G'.($cab+1), $total_pes_tot->row('RECHAZO') );
			$sheet2->setCellValue('H'.($cab+1), $total_pes_tot->row('OTRO') );
			if ( $total_pes->row('TOTAL') > 0) {
				$sheet2->setCellValue('I'.($cab+1), number_format( ( ( $total_pes_tot->row('TOT_FORM')*100)/$total_pes->row('TOTAL') ),2,'.',' ' ) );
			} else {
				$sheet2->setCellValue('I'.($cab+1), '0' );
			}
			if ( $total_pes_tot->row('TOT_FORM') > 0 ) {
				$sheet2->setCellValue('J'.($cab+1), number_format( ( ( ( $total_pes_tot->row('RECHAZO') +  $total_pes_tot->row('OTRO') )*100)/$total_pes_tot->row('TOT_FORM') ),2,'.',' ' ) );
			} else {
				$sheet2->setCellValue('J'.($cab+1), '0' );
			}
			




			// **************************************************************************
			$row = $cab+1;// inicio de la fila del cuerpo
			$col = 1; // inicio del column
			$num = 0; // para numerar
			$cambio = FALSE; // para intercarlar colores registros
			$tot_reg = null;
			$tot_form = null;
			$tot_inc = null;
			$tot_com = null;
			$tot_rech = null;
			$tot_otro = null;


			foreach($deps->result() as $celda){
				$row++;
				$sheet2->setCellValue('A'.$row, $celda->CCDD);
				$sheet2->setCellValue('B'.$row, $celda->DEPARTAMENTO);

				foreach ($total_pes_by_dep->result() as  $value) {
					if ($celda->CCDD == $value->CCDD){
						$tot_reg = $value->TOTAL  ; break;
					}
				}
				foreach ($total_pes_tot_by_dep->result() as  $value) {
					if ($celda->CCDD == $value->CCDD){
						$tot_form = $value->TOT_FORM ; 
						$tot_com = $value->COMPLETAS ; 
						$tot_inc = $value->INCOMPLETAS ; 
						$tot_rech = $value->RECHAZO ; 
						$tot_otro = $value->OTRO ; break;
					}
				}

				if (is_numeric($tot_reg)){ 
					$sheet2->setCellValue('C'.$row, $tot_reg);
				}else{
					$sheet2->setCellValue('C'.$row, 0 );
				}	

				if (is_numeric($tot_form)){ 
					$sheet2->setCellValue('D'.$row, $tot_form);
				}else{
					$sheet2->setCellValue('D'.$row, 0 );
				}	

				if (is_numeric($tot_com)){ 
					$sheet2->setCellValue('E'.$row, $tot_com);
				}else{
					$sheet2->setCellValue('E'.$row, 0 );
				}

				if (is_numeric($tot_inc)){ 
					$sheet2->setCellValue('F'.$row, $tot_inc);
				}else{
					$sheet2->setCellValue('F'.$row, 0 );
				}

				if (is_numeric($tot_rech)){ 
					$sheet2->setCellValue('G'.$row, $tot_rech);
				}else{
					$sheet2->setCellValue('G'.$row, 0 );
				}

				if (is_numeric($tot_otro)){ 
					$sheet2->setCellValue('H'.$row, $tot_otro);
				}else{
					$sheet2->setCellValue('H'.$row, 0 );
				}

				if($tot_reg >0 ){
					$sheet2->setCellValue('I'.$row, number_format( (($tot_form*100)/$tot_reg) ,2,'.',' '));
				}else{
					$sheet2->setCellValue('I'.$row, '0.0');
				}

				if( $tot_form > 0 ){
					$sheet2->setCellValue('J'.$row, number_format( (( ($tot_rech + $tot_otro)*100)/$tot_form) ,2,'.',' '));
				}else{
					$sheet2->setCellValue('J'.$row, '0.0');
				}

				$tot_reg = null;
				$tot_form = null;
				$tot_inc = null;
				$tot_com = null;
				$tot_rech = null;
				$tot_otro = null;
			}
			$sheet2->getStyle("I".($cab+2).":J".$total)->getFont()->setname('Arial black')->setSize(14);// FORMATO negro al total
			$sheet2->getStyle('A3:J5')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);	//opcional 

 		// CUERPO

	/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
	///////////  H O J A   2 ////////////////////////////////////////////////////////////////////////////////////////////////////////
	/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////


	/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
	///////////  H O J A   3 ////////////////////////////////////////////////////////////////////////////////////////////////////////
	/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////


		$deps 			= $this->avance_campo_subrutas_model->get_all_dep();		//DEPARTAMENTOS
		$total_acui	 	= $this->avance_campo_subrutas_model->get_acuicultores();     //TOTAL PESCADORES  nacional
		$total_acui_tot = $this->avance_campo_subrutas_model->get_acuicultores_totales(); 	 //TOTALES PESCADOR a  nacional

		$total_acui_by_dep 		= $this->avance_campo_subrutas_model->get_acuicultores_by_dep();     		//TOTAL PESCADORES  nacional
		$total_acui_tot_by_dep 	= $this->avance_campo_subrutas_model->get_acuicultores_totales_by_dep(); 	//TOTALES PESCADOR a  nacional

		// pestaña
		$sheet3 = $this->phpexcel->createSheet(2);	
		//$sheet2 = $this->phpexcel->setActiveSheetIndex(1);
		//$sheet = $this->phpexcel->getActiveSheet(1);
		
		// formato de la hoja
			// Set Orientation, size and scaling
			//$objPHPExcel->setActiveSheetIndex(0);
			//$sheet3->getPageSetup()->setOrientation(PHPExcel_Worksheet_PageSetup::ORIENTATION_LANDSCAPE);// horizontal
			$sheet3->getPageSetup()->setOrientation(PHPExcel_Worksheet_PageSetup::ORIENTATION_PORTRAIT); // vertical
			$sheet3->getPageSetup()->setPaperSize(PHPExcel_Worksheet_PageSetup::PAPERSIZE_A4);
			$sheet3->getPageSetup()->setFitToPage(false); // ajustar pagina
			$sheet3->getPageSetup()->setFitToWidth(1);
			$sheet3->getPageSetup()->setFitToHeight(0);		
			$sheet3->setShowGridlines(false);// oculta lineas de cuadricula		
		// formato de la hoja

		// ANCHO Y ALTURA DE COLUMNAS DEL FILE
			$sheet3->getColumnDimension('A')->setWidth(8);
			$sheet3->getColumnDimension('B')->setWidth(40);
			$sheet3->getColumnDimension('C')->setWidth(20);
			$sheet3->getColumnDimension('D')->setWidth(20);
			$sheet3->getColumnDimension('E')->setWidth(12);
			$sheet3->getColumnDimension('F')->setWidth(12);
			$sheet3->getColumnDimension('G')->setWidth(12);
			$sheet3->getColumnDimension('H')->setWidth(12);
			$sheet3->getColumnDimension('I')->setWidth(15);
			$sheet3->getColumnDimension('J')->setWidth(15);


			$sheet3->getRowDimension(4)->setRowHeight(2);
			$sheet3->getRowDimension(6)->setRowHeight(2);
			$sheet3->getRowDimension(16)->setRowHeight(90);
		// ANCHO Y ALTURA DE COLUMNAS DEL FILE

		// TITULOS
			$sheet3->setCellValue('A3','INSTITUTO NACIONAL DE ESTADÍSTICA E INFORMATICA');
			$sheet3->mergeCells('A3:J3');
			$sheet3->setCellValue('A5','PRIMER CENSO NACIONAL DE PESCA CONTINENTAL' );
			$sheet3->mergeCells('A5:J5');
			$sheet3->setCellValue('A9','REPORTE DE ACUICULTOR' );
			$sheet3->mergeCells('A9:J9');	
					
			$sheet3->getStyle('A3:J9')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);	
			$sheet3->getStyle('A3:J9')->getFont()->getColor()->setARGB(PHPExcel_Style_Color::COLOR_BLACK);
			$sheet3->getStyle('A3:J9')->getFont()->setname('Arial black')->setSize(25);	
			$sheet3->getStyle('A5:J9')->getFont()->setname('Arial ')->setSize(22);	
			$sheet3->getStyle('A9')->getFont()->setname('Arial black')->setSize(18);	



			// LOGO
	          $objDrawing = new PHPExcel_Worksheet_Drawing();
	          $objDrawing->setWorksheet($sheet3);
	          $objDrawing->setName("inei");
	          $objDrawing->setDescription("Inei");
	          $objDrawing->setPath("img/inei.jpeg");
	          $objDrawing->setCoordinates('A7');
	          $objDrawing->setHeight(60);
	          $objDrawing->setOffsetX(1);
	          $objDrawing->setOffsetY(5);

	          $objDrawing2 = new PHPExcel_Worksheet_Drawing();
	          $objDrawing2->setWorksheet($sheet3);
	          $objDrawing2->setName("CENPESCO");
	          $objDrawing2->setDescription("CENPESCO");
	          $objDrawing2->setPath("img/cenpesco.jpg");
	          $objDrawing2->setCoordinates('J7');
	          $objDrawing2->setHeight(60);
	          $objDrawing2->setWidth(100);
	          $objDrawing2->setOffsetX(1);
	          $objDrawing2->setOffsetY(10);
		// TITULOS


		// CABECERA
			// INICIO DE LA  cabecera
			$cab = 16;	
				
			// NOMBRE CABECERAS

					$sheet3->setCellValue('A'.$cab,'CCDD');
					//$sheet->mergeCells('B'.$cab.':B'.($cab+2));
					$sheet3->setCellValue('B'.$cab,'DEPARTAMENTO' );
					//$sheet->mergeCells('C'.$cab.':C'.($cab+2));
					$sheet3->setCellValue('C'.$cab,'TOTAL ACUICULTORES EN REGISTRO' );
					//$sheet->mergeCells('D'.$cab.':D'.($cab+2));
					$sheet3->setCellValue('D'.$cab,'TOTAL ACUICULTORES EMPADRONADOS' );
					//$sheet->mergeCells('E'.$cab.':E'.($cab+2));
					$sheet3->setCellValue('E'.$cab,'COMPLETO' );
					//$sheet->mergeCells('F'.$cab.':F'.($cab+2));
					$sheet3->setCellValue('F'.$cab,'IMCOMPLETO' );
					//$sheet->mergeCells('F'.$cab.':F'.($cab+2));
					$sheet3->setCellValue('G'.$cab,'RECHAZO' );
					//$sheet->mergeCells('F'.$cab.':F'.($cab+2));					
					$sheet3->setCellValue('H'.$cab,'OTRO' );
					//$sheet->mergeCells('F'.$cab.':F'.($cab+2));	
					$sheet3->setCellValue('I'.$cab,'TASA DE COBERTURA' );
					//$sheet->mergeCells('F'.$cab.':F'.($cab+2));	
					$sheet3->setCellValue('J'.$cab,'TASA NO RESPUESTA' );
					//$sheet->mergeCells('F'.$cab.':F'.($cab+2));	


			// NOMBRE CABECERAS

			// ESTILOS  CABECERAS
				$sheet3->getStyle("A".$cab.":J".($cab))->getAlignment()->setWrapText(true);// AJUSTA TEXTO A CELDA
				$sheet3->getStyle("A".$cab.":J".($cab))->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);						
				$sheet3->getStyle("A".$cab.":J".($cab))->getAlignment()->setVertical(PHPExcel_Style_Alignment::VERTICAL_CENTER);						
				$sheet3->getStyle("A".$cab.":J".($cab))->getFont()->getColor()->setARGB(PHPExcel_Style_Color::COLOR_WHITE);
				$sheet3->getStyle("A".$cab.":J".($cab))->getFont()->setname('Arial')->setSize(15);


		     	$headStyle = $this->phpexcel->getActiveSheet()->getStyle("A".$cab.":J".($cab));
		        //$headStyle->getFill()->setFillType(PHPExcel_Style_Fill::FILL_SOLID)->getStartColor()->setARGB('#FF9900');
				$headStyle->applyFromArray($color_celda_cabeceras);

				$sheet3->getStyle("A".$cab.":J".($cab) )->applyFromArray(array(
				'borders' => array(
							'allborders' => array(
											'style' => PHPExcel_Style_Border::BORDER_THIN)
						)
				));

			// ESTILOS  CABECERAS
		// CABECERA

	    // CUERPO
			$total = $deps->num_rows() + ($cab+1); // total del cuerpo

			$sheet3->getStyle("A".($cab+2).":J".$total)->getFont()->setname('Arial ')->setSize(12);

			//bordes cuerpo
			$sheet3->getStyle("A".($cab+1).":J".($total) )->applyFromArray(array(
			'borders' => array(
						'allborders' => array(
										'style' => PHPExcel_Style_Border::BORDER_THIN)
					)
			));
			$sheet3->getStyle('A'.($cab+2).':A'.$total)->getNumberFormat()->setFormatCode('00');
			// EXPORTACION A EXCEL
			$sheet3->setCellValue('A'.($cab+1),'NACIONAL');
			$sheet3->mergeCells('A'.($cab+1).':B'.($cab+1),'NACIONAL');
			$sheet3->getStyle('A'.($cab+1) )->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);	
			$sheet3->getStyle('A17:J17')->getFont()->setname('Arial black')->setSize(14);	

			$sheet3->setCellValue('C'.($cab+1), $total_acui->row('TOTAL') );
			$sheet3->setCellValue('D'.($cab+1), $total_acui_tot->row('TOT_FORM') );
			$sheet3->setCellValue('E'.($cab+1), $total_acui_tot->row('COMPLETAS') );
			$sheet3->setCellValue('F'.($cab+1), $total_acui_tot->row('INCOMPLETAS') );
			$sheet3->setCellValue('G'.($cab+1), $total_acui_tot->row('RECHAZO') );
			$sheet3->setCellValue('H'.($cab+1), $total_acui_tot->row('OTRO') );
			$sheet3->setCellValue('I'.($cab+1), number_format( ( ( $total_acui_tot->row('TOT_FORM')*100)/$total_acui->row('TOTAL') ),2,'.',' ' ) );
			$sheet3->setCellValue('J'.($cab+1), number_format( ( ( ( $total_acui_tot->row('RECHAZO') +  $total_acui_tot->row('OTRO') )*100)/$total_acui_tot->row('TOT_FORM') ),2,'.',' ' ) );


			// **************************************************************************
			$row = $cab+1;// inicio de la fila del cuerpo
			$col = 1; // inicio del column
			$num = 0; // para numerar
			$cambio = FALSE; // para intercarlar colores registros
			$tot_reg = null;
			$tot_form = null;
			$tot_inc = null;
			$tot_com = null;
			$tot_rech = null;
			$tot_otro = null;


			foreach($deps->result() as $celda){
				$row++;
				$sheet3->setCellValue('A'.$row, $celda->CCDD);
				$sheet3->setCellValue('B'.$row, $celda->DEPARTAMENTO);

				foreach ($total_acui_by_dep->result() as  $value) {
					if ($celda->CCDD == $value->CCDD){
						$tot_reg = $value->TOTAL  ; break;
					}
				}
				foreach ($total_acui_tot_by_dep->result() as  $value) {
					if ($celda->CCDD == $value->CCDD){
						$tot_form = $value->TOT_FORM ; 
						$tot_com = $value->COMPLETAS ; 
						$tot_inc = $value->INCOMPLETAS ; 
						$tot_rech = $value->RECHAZO ; 
						$tot_otro = $value->OTRO ; break;
					}
				}

				if (is_numeric($tot_reg)){ 
					$sheet3->setCellValue('C'.$row, $tot_reg);
				}else{
					$sheet3->setCellValue('C'.$row, 0 );
				}	

				if (is_numeric($tot_form)){ 
					$sheet3->setCellValue('D'.$row, $tot_form);
				}else{
					$sheet3->setCellValue('D'.$row, 0 );
				}	

				if (is_numeric($tot_com)){ 
					$sheet3->setCellValue('E'.$row, $tot_com);
				}else{
					$sheet3->setCellValue('E'.$row, 0 );
				}

				if (is_numeric($tot_inc)){ 
					$sheet3->setCellValue('F'.$row, $tot_inc);
				}else{
					$sheet3->setCellValue('F'.$row, 0 );
				}

				if (is_numeric($tot_rech)){ 
					$sheet3->setCellValue('G'.$row, $tot_rech);
				}else{
					$sheet3->setCellValue('G'.$row, 0 );
				}

				if (is_numeric($tot_otro)){ 
					$sheet3->setCellValue('H'.$row, $tot_otro);
				}else{
					$sheet3->setCellValue('H'.$row, 0 );
				}

				if($tot_reg >0 ){
					$sheet3->setCellValue('I'.$row, number_format( (($tot_form*100)/$tot_reg) ,2,'.',' '));
				}else{
					$sheet3->setCellValue('I'.$row, '0.0');
				}

				if( $tot_form > 0 ){
					$sheet3->setCellValue('J'.$row, number_format( (( ($tot_rech + $tot_otro)*100)/$tot_form) ,2,'.',' '));
				}else{
					$sheet3->setCellValue('J'.$row, '0.0');
				}

				$tot_reg = null;
				$tot_form = null;
				$tot_inc = null;
				$tot_com = null;
				$tot_rech = null;
				$tot_otro = null;
			}
			$sheet3->getStyle("I".($cab+2).":J".$total)->getFont()->setname('Arial black')->setSize(14);// FORMATO negro al total
			$sheet3->getStyle('A3:J5')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);	//opcional 

 		// CUERPO

	/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
	///////////  H O J A   3 ////////////////////////////////////////////////////////////////////////////////////////////////////////
	/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////


	/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
	///////////  H O J A   4 ////////////////////////////////////////////////////////////////////////////////////////////////////////
	/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////


		$deps 			= $this->avance_campo_subrutas_model->get_all_dep();				//DEPARTAMENTOS
		$total_com	 	= $this->avance_campo_subrutas_model->get_comunidades();     		//TOTAL COMUNIDADES  nacional
		$total_com_tot 	= $this->avance_campo_subrutas_model->get_comunidades_totales(); 	//TOTALES COMUNIDADES a  nacional

		$total_com_by_dep 		= $this->avance_campo_subrutas_model->get_comunidades_by_dep();     		//TOTAL COMUNIDADES  nacional
		$total_com_tot_by_dep 	= $this->avance_campo_subrutas_model->get_comunidades_totales_by_dep(); 	//TOTALES COMUNIDADES a  nacional

		// pestaña
		$sheet4 = $this->phpexcel->createSheet(3);	
		//$sheet2 = $this->phpexcel->setActiveSheetIndex(1);
		//$sheet = $this->phpexcel->getActiveSheet(1);
		
		// formato de la hoja
			// Set Orientation, size and scaling
			//$objPHPExcel->setActiveSheetIndex(0);
			//$sheet4->getPageSetup()->setOrientation(PHPExcel_Worksheet_PageSetup::ORIENTATION_LANDSCAPE);// horizontal
			$sheet4->getPageSetup()->setOrientation(PHPExcel_Worksheet_PageSetup::ORIENTATION_PORTRAIT); // vertical
			$sheet4->getPageSetup()->setPaperSize(PHPExcel_Worksheet_PageSetup::PAPERSIZE_A4);
			$sheet4->getPageSetup()->setFitToPage(false); // ajustar pagina
			$sheet4->getPageSetup()->setFitToWidth(1);
			$sheet4->getPageSetup()->setFitToHeight(0);		
			$sheet4->setShowGridlines(false);// oculta lineas de cuadricula		
		// formato de la hoja

		// ANCHO Y ALTURA DE COLUMNAS DEL FILE
			$sheet4->getColumnDimension('A')->setWidth(8);
			$sheet4->getColumnDimension('B')->setWidth(40);
			$sheet4->getColumnDimension('C')->setWidth(20);
			$sheet4->getColumnDimension('D')->setWidth(20);
			$sheet4->getColumnDimension('E')->setWidth(12);
			$sheet4->getColumnDimension('F')->setWidth(12);
			$sheet4->getColumnDimension('G')->setWidth(12);
			$sheet4->getColumnDimension('H')->setWidth(12);
			$sheet4->getColumnDimension('I')->setWidth(15);
			$sheet4->getColumnDimension('J')->setWidth(15);


			$sheet4->getRowDimension(4)->setRowHeight(2);
			$sheet4->getRowDimension(6)->setRowHeight(2);
			$sheet4->getRowDimension(16)->setRowHeight(90);
		// ANCHO Y ALTURA DE COLUMNAS DEL FILE

		// TITULOS
			$sheet4->setCellValue('A3','INSTITUTO NACIONAL DE ESTADÍSTICA E INFORMATICA');
			$sheet4->mergeCells('A3:J3');
			$sheet4->setCellValue('A5','PRIMER CENSO NACIONAL DE PESCA CONTINENTAL' );
			$sheet4->mergeCells('A5:J5');
			$sheet4->setCellValue('A9','REPORTE DE COMUNIDADES' );
			$sheet4->mergeCells('A9:J9');	
					
			$sheet4->getStyle('A3:J9')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);	
			$sheet4->getStyle('A3:J9')->getFont()->getColor()->setARGB(PHPExcel_Style_Color::COLOR_BLACK);
			$sheet4->getStyle('A3:J9')->getFont()->setname('Arial black')->setSize(25);	
			$sheet4->getStyle('A5:J9')->getFont()->setname('Arial ')->setSize(22);	
			$sheet4->getStyle('A9')->getFont()->setname('Arial black')->setSize(18);	



			// LOGO
	          $objDrawing = new PHPExcel_Worksheet_Drawing();
	          $objDrawing->setWorksheet($sheet4);
	          $objDrawing->setName("inei");
	          $objDrawing->setDescription("Inei");
	          $objDrawing->setPath("img/inei.jpeg");
	          $objDrawing->setCoordinates('A7');
	          $objDrawing->setHeight(60);
	          $objDrawing->setOffsetX(1);
	          $objDrawing->setOffsetY(5);

	          $objDrawing2 = new PHPExcel_Worksheet_Drawing();
	          $objDrawing2->setWorksheet($sheet4);
	          $objDrawing2->setName("CENPESCO");
	          $objDrawing2->setDescription("CENPESCO");
	          $objDrawing2->setPath("img/cenpesco.jpg");
	          $objDrawing2->setCoordinates('J7');
	          $objDrawing2->setHeight(60);
	          $objDrawing2->setWidth(100);
	          $objDrawing2->setOffsetX(1);
	          $objDrawing2->setOffsetY(10);
		// TITULOS


		// CABECERA
			// INICIO DE LA  cabecera
			$cab = 16;	
				
			// NOMBRE CABECERAS

					$sheet4->setCellValue('A'.$cab,'CCDD');
					//$sheet->mergeCells('B'.$cab.':B'.($cab+2));
					$sheet4->setCellValue('B'.$cab,'DEPARTAMENTO' );
					//$sheet->mergeCells('C'.$cab.':C'.($cab+2));
					$sheet4->setCellValue('C'.$cab,'TOTAL COMUNIDADES EN REGISTRO' );
					//$sheet->mergeCells('D'.$cab.':D'.($cab+2));
					$sheet4->setCellValue('D'.$cab,'TOTAL COMUNIDADES EMPADRONADOS' );
					//$sheet->mergeCells('E'.$cab.':E'.($cab+2));
					$sheet4->setCellValue('E'.$cab,'COMPLETO' );
					//$sheet->mergeCells('F'.$cab.':F'.($cab+2));
					$sheet4->setCellValue('F'.$cab,'IMCOMPLETO' );
					//$sheet->mergeCells('F'.$cab.':F'.($cab+2));
					$sheet4->setCellValue('G'.$cab,'RECHAZO' );
					//$sheet->mergeCells('F'.$cab.':F'.($cab+2));					
					$sheet4->setCellValue('H'.$cab,'OTRO' );
					//$sheet->mergeCells('F'.$cab.':F'.($cab+2));	
					$sheet4->setCellValue('I'.$cab,'TASA DE COBERTURA' );
					//$sheet->mergeCells('F'.$cab.':F'.($cab+2));	
					$sheet4->setCellValue('J'.$cab,'TASA NO RESPUESTA' );
					//$sheet->mergeCells('F'.$cab.':F'.($cab+2));	


			// NOMBRE CABECERAS

			// ESTILOS  CABECERAS
				$sheet4->getStyle("A".$cab.":J".($cab))->getAlignment()->setWrapText(true);// AJUSTA TEXTO A CELDA
				$sheet4->getStyle("A".$cab.":J".($cab))->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);						
				$sheet4->getStyle("A".$cab.":J".($cab))->getAlignment()->setVertical(PHPExcel_Style_Alignment::VERTICAL_CENTER);						
				$sheet4->getStyle("A".$cab.":J".($cab))->getFont()->getColor()->setARGB(PHPExcel_Style_Color::COLOR_WHITE);
				$sheet4->getStyle("A".$cab.":J".($cab))->getFont()->setname('Arial')->setSize(15);


		     	$headStyle = $this->phpexcel->getActiveSheet()->getStyle("A".$cab.":J".($cab));
		        //$headStyle->getFill()->setFillType(PHPExcel_Style_Fill::FILL_SOLID)->getStartColor()->setARGB('#FF9900');
				$headStyle->applyFromArray($color_celda_cabeceras);

				$sheet3->getStyle("A".$cab.":J".($cab) )->applyFromArray(array(
				'borders' => array(
							'allborders' => array(
											'style' => PHPExcel_Style_Border::BORDER_THIN)
						)
				));

				//$sheet->getStyle('J16')->getFont()->setname('Arial Narrow')->setSize(9); // tamaño especial para esta celda
			// ESTILOS  CABECERAS
		// CABECERA

	    // CUERPO
			$total = $deps->num_rows() + ($cab+1); // total del cuerpo

			$sheet4->getStyle("A".($cab+2).":J".$total)->getFont()->setname('Arial ')->setSize(14);

			//bordes cuerpo
			$sheet4->getStyle("A".($cab).":J".($total) )->applyFromArray(array(
			'borders' => array(
						'allborders' => array(
										'style' => PHPExcel_Style_Border::BORDER_THIN)
					)
			));
			$sheet4->getStyle('A'.($cab+2).':A'.$total)->getNumberFormat()->setFormatCode('00');
			// EXPORTACION A EXCEL
			$sheet4->setCellValue('A'.($cab+1),'NACIONAL');
			$sheet4->mergeCells('A'.($cab+1).':B'.($cab+1),'NACIONAL');
			$sheet4->getStyle('A'.($cab+1) )->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);	
			$sheet4->getStyle('A17:J17')->getFont()->setname('Arial black')->setSize(14);	

			$sheet4->setCellValue('C'.($cab+1), $total_com->row('TOTAL') );
			$sheet4->setCellValue('D'.($cab+1), $total_com_tot->row('TOT_FORM') );
			$sheet4->setCellValue('E'.($cab+1), $total_com_tot->row('COMPLETAS') );
			$sheet4->setCellValue('F'.($cab+1), $total_com_tot->row('INCOMPLETAS') );
			$sheet4->setCellValue('G'.($cab+1), $total_com_tot->row('RECHAZO') );
			$sheet4->setCellValue('H'.($cab+1), $total_com_tot->row('OTRO') );
			$sheet4->setCellValue('I'.($cab+1), number_format( ( ( $total_com_tot->row('TOT_FORM')*100)/$total_com->row('TOTAL') ),2,'.',' ' ) );
			$sheet4->setCellValue('J'.($cab+1), number_format( ( ( ( $total_com_tot->row('RECHAZO') +  $total_com_tot->row('OTRO') )*100)/$total_com_tot->row('TOT_FORM') ),2,'.',' ' ) );



			// **************************************************************************
			$row = $cab+1;// inicio de la fila del cuerpo
			$col = 1; // inicio del column
			$num = 0; // para numerar
			$cambio = FALSE; // para intercarlar colores registros
			$tot_reg = null;
			$tot_form = null;
			$tot_inc = null;
			$tot_com = null;
			$tot_rech = null;
			$tot_otro = null;


			foreach($deps->result() as $celda){
				$row++;
				$sheet4->setCellValue('A'.$row, $celda->CCDD);
				$sheet4->setCellValue('B'.$row, $celda->DEPARTAMENTO);

				//Total de REG de Comunidades por DEP
				foreach ($total_com_by_dep->result() as  $value) {
					if ($celda->CCDD == $value->CCDD){
						$tot_reg = $value->TOTAL  ; break;
					}
				}
				// totales de resultado
				foreach ($total_com_tot_by_dep->result() as  $value) {
					if ($celda->CCDD == $value->CCDD){
						$tot_form = $value->TOT_FORM ; 
						$tot_com = $value->COMPLETAS ; 
						$tot_inc = $value->INCOMPLETAS ; 
						$tot_rech = $value->RECHAZO ; 
						$tot_otro = $value->OTRO ; break;
					}
				}

				if (is_numeric($tot_reg)){ 
					$sheet4->setCellValue('C'.$row, $tot_reg);
				}else{
					$sheet4->setCellValue('C'.$row, 0 );
				}	

				if (is_numeric($tot_form)){ 
					$sheet4->setCellValue('D'.$row, $tot_form);
				}else{
					$sheet4->setCellValue('D'.$row, 0 );
				}	

				if (is_numeric($tot_com)){ 
					$sheet4->setCellValue('E'.$row, $tot_com);
				}else{
					$sheet4->setCellValue('E'.$row, 0 );
				}

				if (is_numeric($tot_inc)){ 
					$sheet4->setCellValue('F'.$row, $tot_inc);
				}else{
					$sheet4->setCellValue('F'.$row, 0 );
				}

				if (is_numeric($tot_rech)){ 
					$sheet4->setCellValue('G'.$row, $tot_rech);
				}else{
					$sheet4->setCellValue('G'.$row, 0 );
				}

				if (is_numeric($tot_otro)){ 
					$sheet4->setCellValue('H'.$row, $tot_otro);
				}else{
					$sheet4->setCellValue('H'.$row, 0 );
				}

				if($tot_reg >0 ){
					$sheet4->setCellValue('I'.$row, number_format( (($tot_form*100)/$tot_reg) ,2,'.',' '));
				}else{
					$sheet4->setCellValue('I'.$row, '0.0');
				}

				if( $tot_form > 0 ){
					$sheet4->setCellValue('J'.$row, number_format( (( ($tot_rech + $tot_otro)*100)/$tot_form) ,2,'.',' '));
				}else{
					$sheet4->setCellValue('J'.$row, '0.0');
				}

				$tot_reg = null;
				$tot_form = null;
				$tot_inc = null;
				$tot_com = null;
				$tot_rech = null;
				$tot_otro = null;
			}
			$sheet4->getStyle("I".($cab+2).":J".$total)->getFont()->setname('Arial black')->setSize(14);// FORMATO negro al total
			$sheet4->getStyle('A3:J5')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);	//opcional 

 		// CUERPO

	/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
	///////////  H O J A   4 ////////////////////////////////////////////////////////////////////////////////////////////////////////
	/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////


	/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
	///////////  H O J A   5 ////////////////////////////////////////////////////////////////////////////////////////////////////////
	/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////


		$odeis_data			= $this->avance_campo_subrutas_model->get_all_avance_trabajo_campo();	// odeis, y su data
		$total_trab	 		= $this->avance_campo_subrutas_model->get_num_reg();     				// TOTAL CCPP con reg  nacional
		$total_trab_pes	 	= $this->avance_campo_subrutas_model->get_pescadores();     			// TOTAL PESCADORES  nacional		
		$total_trab_acui 	= $this->avance_campo_subrutas_model->get_acuicultores();     			// TOTAL ACUICULTORES  nacional
		$total_trab_pes_totales	 	= $this->avance_campo_subrutas_model->get_pescadores_totales();     	// TOTAL FORM PESCADORES  nacional		
		$total_trab_acui_totales 	= $this->avance_campo_subrutas_model->get_acuicultores_totales();     	// TOTAL FORM ACUICULTORES  nacional						
		$total_trab_com_totales 	= $this->avance_campo_subrutas_model->get_comunidades_totales();     	// TOTAL FORM COMUNIDADES  nacional						


		$total_trab_by_odei 		= $this->avance_campo_subrutas_model->total_trab_by_odei();     	// TOTAL CCPP  por ODEI
		$total_trab_pes_by_odei 	= $this->avance_campo_subrutas_model->total_trab_pes_by_odei();     // TOTAL PESCADORES  por ODEI
		$total_trab_acui_by_odei 	= $this->avance_campo_subrutas_model->total_trab_acui_by_odei();    // TOTAL ACUICULTORES  por ODEI
		$total_trab_pes_totales_by_odei		= $this->avance_campo_subrutas_model->total_trab_pes_totales_by_odei();		// TOTALES de formulario PESCADOR por ODEI
		$total_trab_acui_totales_by_odei	= $this->avance_campo_subrutas_model->total_trab_acui_totales_by_odei();	// TOTALES de formulario ACUICULTOR por ODEI
		$total_trab_com_totales_by_odei		= $this->avance_campo_subrutas_model->total_trab_com_totales_by_odei();		// TOTALES de formulario COMUNIDAD por ODEI


		// pestaña
		$sheet5 = $this->phpexcel->createSheet(4);	
		//$sheet2 = $this->phpexcel->setActiveSheetIndex(1);55
		//$sheet = $this->phpexcel->getActiveSheet(1);
		
		// formato de la hoja
			// Set Orientation, size and scaling
			//$objPHPExcel->setActiveSheetIndex(0);
			$sheet5->getPageSetup()->setOrientation(PHPExcel_Worksheet_PageSetup::ORIENTATION_LANDSCAPE);// horizontal
			//$sheet5->getPageSetup()->setOrientation(PHPExcel_Worksheet_PageSetup::ORIENTATION_PORTRAIT); // vertical
			$sheet5->getPageSetup()->setPaperSize(PHPExcel_Worksheet_PageSetup::PAPERSIZE_A4);
			$sheet5->getPageSetup()->setFitToPage(false); // ajustar pagina
			$sheet5->getPageSetup()->setFitToWidth(1);
			$sheet5->getPageSetup()->setFitToHeight(0);		
			$sheet5->setShowGridlines(false);// oculta lineas de cuadricula		
		// formato de la hoja

		// ANCHO Y ALTURA DE COLUMNAS DEL FILE
			$sheet5->getColumnDimension('A')->setWidth(8);
			$sheet5->getColumnDimension('B')->setWidth(35);
			$sheet5->getColumnDimension('C')->setWidth(20);
			$sheet5->getColumnDimension('D')->setWidth(20);
			$sheet5->getColumnDimension('E')->setWidth(12);
			$sheet5->getColumnDimension('F')->setWidth(14);
			$sheet5->getColumnDimension('G')->setWidth(14);
			$sheet5->getColumnDimension('H')->setWidth(12);
			$sheet5->getColumnDimension('I')->setWidth(15);
			$sheet5->getColumnDimension('J')->setWidth(15);
			$sheet5->getColumnDimension('K')->setWidth(15);
			$sheet5->getColumnDimension('L')->setWidth(15);
			$sheet5->getColumnDimension('M')->setWidth(11);
			$sheet5->getColumnDimension('N')->setWidth(15);
			$sheet5->getColumnDimension('O')->setWidth(15);
			$sheet5->getColumnDimension('P')->setWidth(15);
			$sheet5->getColumnDimension('Q')->setWidth(15);


			$sheet5->getRowDimension(4)->setRowHeight(2);
			$sheet5->getRowDimension(6)->setRowHeight(2);
			$sheet5->getRowDimension(16)->setRowHeight(70);
			$sheet5->getRowDimension(17)->setRowHeight(60);
		// ANCHO Y ALTURA DE COLUMNAS DEL FILE

		// TITULOS
			$sheet5->setCellValue('A3','INSTITUTO NACIONAL DE ESTADÍSTICA E INFORMATICA');
			$sheet5->mergeCells('A3:Q3');
			$sheet5->setCellValue('A5','PRIMER CENSO NACIONAL DE PESCA CONTINENTAL' );
			$sheet5->mergeCells('A5:Q5');
			$sheet5->setCellValue('A9','REPORTE DEL AVANCE DEL TRABAJO DE CAMPO ' );
			$sheet5->mergeCells('A9:Q9');	
					
			$sheet5->getStyle('A3:J9')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);	
			$sheet5->getStyle('A3:J9')->getFont()->getColor()->setARGB(PHPExcel_Style_Color::COLOR_BLACK);
			$sheet5->getStyle('A3:J9')->getFont()->setname('Arial black')->setSize(25);	
			$sheet5->getStyle('A5:J9')->getFont()->setname('Arial ')->setSize(22);	
			$sheet5->getStyle('A9')->getFont()->setname('Arial black')->setSize(18);	



			// LOGO
	          $objDrawing = new PHPExcel_Worksheet_Drawing();
	          $objDrawing->setWorksheet($sheet5);
	          $objDrawing->setName("inei");
	          $objDrawing->setDescription("Inei");
	          $objDrawing->setPath("img/inei.jpeg");
	          $objDrawing->setCoordinates('A7');
	          $objDrawing->setHeight(60);
	          $objDrawing->setOffsetX(1);
	          $objDrawing->setOffsetY(5);

	          $objDrawing2 = new PHPExcel_Worksheet_Drawing();
	          $objDrawing2->setWorksheet($sheet5);
	          $objDrawing2->setName("CENPESCO");
	          $objDrawing2->setDescription("CENPESCO");
	          $objDrawing2->setPath("img/cenpesco.jpg");
	          $objDrawing2->setCoordinates('Q7');
	          $objDrawing2->setHeight(60);
	          $objDrawing2->setWidth(100);
	          $objDrawing2->setOffsetX(1);
	          $objDrawing2->setOffsetY(10);
		// TITULOS


		// CABECERA
			// INICIO DE LA  cabecera
			$cab = 16;	
				
			// NOMBRE CABECERAS

					$sheet5->setCellValue('A'.$cab,'ODEI COD');
					$sheet5->mergeCells('A'.$cab.':A'.($cab+1));
					$sheet5->setCellValue('B'.$cab,'ODEI' );
					$sheet5->mergeCells('B'.$cab.':B'.($cab+1));
					$sheet5->setCellValue('C'.$cab,'PROVINCIAS' );
					$sheet5->mergeCells('C'.$cab.':C'.($cab+1));
					$sheet5->setCellValue('D'.$cab,'DISTRITOS' );
					$sheet5->mergeCells('D'.$cab.':D'.($cab+1));
					$sheet5->setCellValue('E'.$cab,'Centros Poblado' );
					$sheet5->mergeCells('E'.$cab.':E'.($cab+1));
					$sheet5->setCellValue('F'.$cab,'MARCO INICIAL' );
					$sheet5->mergeCells('F'.$cab.':G'.($cab));
						$sheet5->setCellValue('F'.($cab+1),'Pescador' );
						$sheet5->setCellValue('G'.($cab+1),'Acuicultor' );

					$sheet5->setCellValue('H'.$cab,'Centros Poblado Trabajados' );
					$sheet5->mergeCells('H'.$cab.':H'.($cab+1));					
					$sheet5->setCellValue('I'.$cab,'Avance de CCPP. %' );
					$sheet5->mergeCells('I'.$cab.':I'.($cab+1));	
					$sheet5->setCellValue('J'.$cab,'REGISTRO' );
					$sheet5->mergeCells('J'.$cab.':M'.($cab));	
						$sheet5->setCellValue('J'.($cab+1),'Pescador' );
						$sheet5->setCellValue('K'.($cab+1),'% de Marco' );
						$sheet5->setCellValue('L'.($cab+1),'Acuicultor' );
						$sheet5->setCellValue('M'.($cab+1),'% de Marco' );

					$sheet5->setCellValue('N'.$cab,'Formulario del Pescador' );
					$sheet5->mergeCells('N'.$cab.':N'.($cab+1));					
					$sheet5->setCellValue('O'.$cab,'Formulario del Acuicultor' );
					$sheet5->mergeCells('O'.$cab.':O'.($cab+1));	
					$sheet5->setCellValue('P'.$cab,'Formulario de la Comunidad' );
					$sheet5->mergeCells('P'.$cab.':P'.($cab+1));	
					$sheet5->setCellValue('Q'.$cab,'AVANCE %' );
					$sheet5->mergeCells('Q'.$cab.':Q'.($cab+1));	

			// NOMBRE CABECERAS

			// ESTILOS  CABECERAS
				$sheet5->getStyle("A".$cab.":Q".($cab+1))->getAlignment()->setWrapText(true);// AJUSTA TEXTO A CELDA
				$sheet5->getStyle("A".$cab.":Q".($cab+1))->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);						
				$sheet5->getStyle("A".$cab.":Q".($cab+1))->getAlignment()->setVertical(PHPExcel_Style_Alignment::VERTICAL_CENTER);						
				$sheet5->getStyle("A".$cab.":Q".($cab+1))->getFont()->getColor()->setARGB(PHPExcel_Style_Color::COLOR_WHITE);
				$sheet5->getStyle("A".$cab.":Q".($cab+1))->getFont()->setname('Arial')->setSize(15);


		     	$headStyle = $this->phpexcel->getActiveSheet()->getStyle("A".$cab.":Q".($cab+1));
		        //$headStyle->getFill()->setFillType(PHPExcel_Style_Fill::FILL_SOLID)->getStartColor()->setARGB('#FF9900');
				$headStyle->applyFromArray($color_celda_cabeceras);

				$sheet5->getStyle("A".$cab.":Q".($cab) )->applyFromArray(array(
				'borders' => array(
							'allborders' => array(
											'style' => PHPExcel_Style_Border::BORDER_THIN)
						)
				));

				//$sheet->getStyle('J16')->getFont()->setname('Arial Narrow')->setSize(9); // tamaño especial para esta celda
			// ESTILOS  CABECERAS
		// CABECERA

	    // CUERPO
			$total = $odeis_data->num_rows() + ($cab+1); // total del cuerpo

			$sheet5->getStyle("A".($cab+2).":Q".$total)->getFont()->setname('Arial ')->setSize(14);

			//bordes cuerpo
			$sheet5->getStyle("A".($cab).":Q".($total) )->applyFromArray(array(
			'borders' => array(
						'allborders' => array(
										'style' => PHPExcel_Style_Border::BORDER_THIN)
					)
			));
			$sheet5->getStyle('A'.($cab+2).':A'.$total)->getNumberFormat()->setFormatCode('00');// formato para codigo col A, 
			// EXPORTACION A EXCEL
			// $sheet5->setCellValue('A'.($cab+1),'NACIONAL');
			// $sheet5->mergeCells('A'.($cab+1).':B'.($cab+1),'NACIONAL');
			// $sheet5->getStyle('A'.($cab+1) )->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);	
			// $sheet5->getStyle('A17:J17')->getFont()->setname('Arial black')->setSize(14);	

			// $sheet5->setCellValue('C'.($cab+1), $total_com->row('TOTAL') );
			// $sheet5->setCellValue('D'.($cab+1), $total_com_tot->row('TOT_FORM') );
			// $sheet5->setCellValue('E'.($cab+1), $total_com_tot->row('COMPLETAS') );
			// $sheet5->setCellValue('F'.($cab+1), $total_com_tot->row('INCOMPLETAS') );
			// $sheet5->setCellValue('G'.($cab+1), $total_com_tot->row('RECHAZO') );
			// $sheet5->setCellValue('H'.($cab+1), $total_com_tot->row('OTRO') );
			// $sheet5->setCellValue('I'.($cab+1), number_format( ( ( $total_com_tot->row('TOT_FORM')*100)/$total_acui->row('TOTAL') ),2,'.',' ' ) );
			// $sheet5->setCellValue('J'.($cab+1), number_format( ( ( ( $total_com_tot->row('RECHAZO') +  $total_com_tot->row('OTRO') )*100)/$total_com_tot->row('TOT_FORM') ),2,'.',' ' ) );



			// **************************************************************************
			$row = $cab+1;// inicio de la fila del cuerpo
			$col = 1; // inicio del column
			$num = 0; // para numerar
			$cambio = FALSE; // para intercarlar colores registros
			$tot_trab = null;
			$tot_trab_pes = null;
			$tot_trab_acui = null;
			$tot_trab_pes_totales  = null;
			$tot_trab_acui_totales = null;
			$tot_trab_com_totales  = null;


			foreach($odeis_data->result() as $celda){
				$row++;
				$sheet5->setCellValue('A'.$row, $celda->ODEI_COD);
				$sheet5->setCellValue('B'.$row, $celda->NOM_ODEI);
				$sheet5->setCellValue('C'.$row, $celda->PROVINCIA);
				$sheet5->setCellValue('D'.$row, $celda->DISTRITO);
				$sheet5->setCellValue('E'.$row, $celda->CENTRO_POBLADO);
				$sheet5->setCellValue('F'.$row, $celda->PESCADOR);
				$sheet5->setCellValue('G'.$row, $celda->ACUICULTOR);

				//Total de REG de Comunidades por DEP
				if ( $celda->NOM_ODEI == 'TOTAL' ){
					$tot_trab 		= $total_trab->num_rows() ;  //jala el total de registros de CCPP			
					$tot_trab_pes 	= $total_trab_pes->row('TOTAL') ;  //jala el total de pescadores nacional			
					$tot_trab_acui 	= $total_trab_acui->row('TOTAL') ;  //jala el total de pescadores nacional			
					$tot_trab_pes_totales 	= $total_trab_pes_totales->row('TOT_FORM') ;  //jala el total FORM de pescadores nacional			
					$tot_trab_acui_totales 	= $total_trab_acui_totales->row('TOT_FORM') ;  //jala el total FORM de pescadores nacional			
					$tot_trab_com_totales 	= $total_trab_com_totales->row('TOT_FORM') ;  //jala el total FORM de pescadores nacional			
				}else{
					foreach ($total_trab_by_odei->result() as  $value) {

						if ($celda->ODEI_COD == $value->COD_ODEI){
							$tot_trab = $value->TOTAL  ; break;
						}
					}	
					foreach ($total_trab_pes_by_odei->result() as  $value) {

						if ($celda->ODEI_COD == $value->COD_ODEI){
							$tot_trab_pes = $value->TOTAL  ; break;
						}
					}	
					foreach ($total_trab_acui_by_odei->result() as  $value) {

						if ($celda->ODEI_COD == $value->COD_ODEI){
							$tot_trab_acui = $value->TOTAL  ; break;
						}
					}	
					foreach ($total_trab_pes_totales_by_odei->result() as  $value) {

						if ($celda->ODEI_COD == $value->COD_ODEI){
							$tot_trab_pes_totales = $value->TOT_FORM  ; break;
						}
					}	
					foreach ($total_trab_acui_totales_by_odei->result() as  $value) {

						if ($celda->ODEI_COD == $value->COD_ODEI){
							$tot_trab_acui_totales = $value->TOT_FORM  ; break;
						}
					}	
					foreach ($total_trab_com_totales_by_odei->result() as  $value) {

						if ($celda->ODEI_COD == $value->COD_ODEI){
							$tot_trab_com_totales = $value->TOT_FORM  ; break;
						}
					}																											
				}				


				if (is_numeric($tot_trab)){ //total de CCPP trabajados
					$sheet5->setCellValue('H'.$row, $tot_trab);
					$sheet5->setCellValue('I'.$row, number_format( (($tot_trab * 100)/$celda->CENTRO_POBLADO),2,'.',' ' ) );
				}else{
					$sheet5->setCellValue('H'.$row, 0 );
					$sheet5->setCellValue('I'.$row, 0);
				}	
				if (is_numeric($tot_trab_pes)){ //total de PESCADORES
					$sheet5->setCellValue('J'.$row, $tot_trab_pes);
					$sheet5->setCellValue('K'.$row, number_format( (($tot_trab_pes * 100)/$celda->PESCADOR),2,'.',' ' ) );
				}else{
					$sheet5->setCellValue('J'.$row, 0 );
					$sheet5->setCellValue('K'.$row, 0);
				}		
				if (is_numeric($tot_trab_acui)){ //total de ACUICULTORES
					$sheet5->setCellValue('L'.$row, $tot_trab_acui);
					$sheet5->setCellValue('M'.$row, number_format( (($tot_trab_acui * 100)/$celda->ACUICULTOR),2,'.',' ' ) );
				}else{
					$sheet5->setCellValue('L'.$row, 0 );
					$sheet5->setCellValue('M'.$row, 0);
				}	

				if (is_numeric($tot_trab_pes_totales)){ //total FORM de PESCADORES
					$sheet5->setCellValue('N'.$row, $tot_trab_pes_totales);
				}else{
					$sheet5->setCellValue('N'.$row, 0 );
				}	

				if (is_numeric($tot_trab_acui_totales)){ //total FORM de ACUICULTORES
					$sheet5->setCellValue('O'.$row, $tot_trab_acui_totales);
				}else{
					$sheet5->setCellValue('O'.$row, 0 );
				}		

				if (is_numeric($tot_trab_com_totales)){ //total FORM de COMUNIDADES
					$sheet5->setCellValue('P'.$row, $tot_trab_com_totales);
				}else{
					$sheet5->setCellValue('P'.$row, 0 );
				}		

				if( ( $tot_trab_pes + $tot_trab_acui ) > 0 ){ //AVANCE %
					$sheet5->setCellValue('Q'.$row, number_format( ( ( ($tot_trab_pes_totales  + $tot_trab_acui_totales)*100)/($tot_trab_pes + $tot_trab_acui) ) ,2,'.',' '));
				}else{
					$sheet5->setCellValue('Q'.$row, '0.0');
				}


				$tot_trab = null;
				$tot_trab_pes = null;
				$tot_trab_acui = null;
				$tot_trab_pes_totales 	= null;
				$tot_trab_acui_totales  = null;
				$tot_trab_com_totales   = null;

			}
			$sheet5->getStyle("A".($cab+2).":Q".($cab+2))->getFont()->setname('Arial black')->setSize(14);// FORMATO negro al total
			$sheet5->getStyle("Q".($cab+2).":Q".$total)->getFont()->setname('Arial black')->setSize(14);// FORMATO negro al total
			$sheet5->getStyle('A3:Q5')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);	//opcional 

 		// CUERPO

	/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
	///////////  H O J A   5 ////////////////////////////////////////////////////////////////////////////////////////////////////////
	/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////


	/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
	///////////  H O J A   6 ////////////////////////////////////////////////////////////////////////////////////////////////////////
	/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////


		$odeis_data			= $this->avance_campo_subrutas_model->get_all_avance_trabajo_campo();	// odeis, y su data
		$total_trab	 		= $this->avance_campo_subrutas_model->get_num_reg();     				// TOTAL CCPP con reg  nacional
		$total_trab_pes	 	= $this->avance_campo_subrutas_model->get_pescadores();     			// TOTAL PESCADORES  nacional		
		$total_trab_acui 	= $this->avance_campo_subrutas_model->get_acuicultores();     			// TOTAL ACUICULTORES  nacional
		$total_trab_pes_totales	 	= $this->avance_campo_subrutas_model->get_pescadores_totales();     	// TOTAL FORM PESCADORES  nacional		
		$total_trab_acui_totales 	= $this->avance_campo_subrutas_model->get_acuicultores_totales();     	// TOTAL FORM ACUICULTORES  nacional						
		$total_trab_com_totales 	= $this->avance_campo_subrutas_model->get_comunidades_totales();     	// TOTAL FORM COMUNIDADES  nacional						




		// pestaña
		$sheet6 = $this->phpexcel->createSheet(5);	
		//$sheet2 = $this->phpexcel->setActiveSheetIndex(1);55
		//$sheet = $this->phpexcel->getActiveSheet(1);
		
		// formato de la hoja
			// Set Orientation, size and scaling
			//$objPHPExcel->setActiveSheetIndex(0);
			$sheet6->getPageSetup()->setOrientation(PHPExcel_Worksheet_PageSetup::ORIENTATION_LANDSCAPE);// horizontal
			//$sheet6->getPageSetup()->setOrientation(PHPExcel_Worksheet_PageSetup::ORIENTATION_PORTRAIT); // vertical
			$sheet6->getPageSetup()->setPaperSize(PHPExcel_Worksheet_PageSetup::PAPERSIZE_A4);
			$sheet6->getPageSetup()->setFitToPage(false); // ajustar pagina
			$sheet6->getPageSetup()->setFitToWidth(1);
			$sheet6->getPageSetup()->setFitToHeight(0);		
			$sheet6->setShowGridlines(false);// oculta lineas de cuadricula		
		// formato de la hoja

		// ANCHO Y ALTURA DE COLUMNAS DEL FILE
			$sheet6->getColumnDimension('A')->setWidth(2);
			$sheet6->getColumnDimension('B')->setWidth(35);
			$sheet6->getColumnDimension('C')->setWidth(20);
			$sheet6->getColumnDimension('D')->setWidth(20);
			$sheet6->getColumnDimension('E')->setWidth(12);
			$sheet6->getColumnDimension('F')->setWidth(14);
			$sheet6->getColumnDimension('G')->setWidth(14);
			$sheet6->getColumnDimension('H')->setWidth(12);
			$sheet6->getColumnDimension('I')->setWidth(15);
			$sheet6->getColumnDimension('J')->setWidth(15);
			$sheet6->getColumnDimension('K')->setWidth(15);
			$sheet6->getColumnDimension('L')->setWidth(15);
			$sheet6->getColumnDimension('M')->setWidth(11);
			$sheet6->getColumnDimension('N')->setWidth(15);
			$sheet6->getColumnDimension('O')->setWidth(15);
			$sheet6->getColumnDimension('P')->setWidth(15);
			$sheet6->getColumnDimension('Q')->setWidth(15);
			$sheet6->getColumnDimension('R')->setWidth(15);
			$sheet6->getColumnDimension('S')->setWidth(15);
			$sheet6->getColumnDimension('T')->setWidth(15);
			$sheet6->getColumnDimension('U')->setWidth(15);
			$sheet6->getColumnDimension('V')->setWidth(15);


			$sheet6->getRowDimension(4)->setRowHeight(2);
			$sheet6->getRowDimension(6)->setRowHeight(2);
			$sheet6->getRowDimension(16)->setRowHeight(70);
			$sheet6->getRowDimension(17)->setRowHeight(60);
		// ANCHO Y ALTURA DE COLUMNAS DEL FILE

		// TITULOS
			$sheet6->setCellValue('A3','INSTITUTO NACIONAL DE ESTADÍSTICA E INFORMATICA');
			$sheet6->mergeCells('A3:V3');
			$sheet6->setCellValue('A5','PRIMER CENSO NACIONAL DE PESCA CONTINENTAL' );
			$sheet6->mergeCells('A5:V5');
			$sheet6->setCellValue('A9','REPORTE DEL AVANCE DEL TRABAJO DE CAMPO SEGUN MARCO PRODUCE' );
			$sheet6->mergeCells('A9:V9');	
					
			$sheet6->getStyle('A3:J9')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);	
			$sheet6->getStyle('A3:J9')->getFont()->getColor()->setARGB(PHPExcel_Style_Color::COLOR_BLACK);
			$sheet6->getStyle('A3:J9')->getFont()->setname('Arial black')->setSize(25);	
			$sheet6->getStyle('A5:J9')->getFont()->setname('Arial ')->setSize(22);	
			$sheet6->getStyle('A9')->getFont()->setname('Arial black')->setSize(18);	



			// LOGO
	          $objDrawing = new PHPExcel_Worksheet_Drawing();
	          $objDrawing->setWorksheet($sheet6);
	          $objDrawing->setName("inei");
	          $objDrawing->setDescription("Inei");
	          $objDrawing->setPath("img/inei.jpeg");
	          $objDrawing->setCoordinates('B7');
	          $objDrawing->setHeight(80);
	          $objDrawing->setOffsetX(1);
	          $objDrawing->setOffsetY(5);

	          $objDrawing2 = new PHPExcel_Worksheet_Drawing();
	          $objDrawing2->setWorksheet($sheet6);
	          $objDrawing2->setName("CENPESCO");
	          $objDrawing2->setDescription("CENPESCO");
	          $objDrawing2->setPath("img/cenpesco.jpg");
	          $objDrawing2->setCoordinates('U7');
	          $objDrawing2->setHeight(80);
	          $objDrawing2->setWidth(100);
	          $objDrawing2->setOffsetX(1);
	          $objDrawing2->setOffsetY(10);
		// TITULOS


		// CABECERA
			// INICIO DE LA  cabecera
			$cab = 16;	
				
			// NOMBRE CABECERAS

					// $sheet6->setCellValue('A'.$cab,'ODEI COD');
					// $sheet6->mergeCells('A'.$cab.':A'.($cab+1));
					$sheet6->setCellValue('B'.$cab,'NACIONAL' );
					$sheet6->mergeCells('B'.$cab.':B'.($cab+1));
					$sheet6->setCellValue('C'.$cab,'PROVINCIAS' );
					$sheet6->mergeCells('C'.$cab.':C'.($cab+1));
					$sheet6->setCellValue('D'.$cab,'DISTRITOS' );
					$sheet6->mergeCells('D'.$cab.':D'.($cab+1));
					$sheet6->setCellValue('E'.$cab,'Centros Poblado' );
					$sheet6->mergeCells('E'.$cab.':E'.($cab+1));
					$sheet6->setCellValue('F'.$cab,'MARCO INICIAL' );
					$sheet6->mergeCells('F'.$cab.':G'.($cab));
						$sheet6->setCellValue('F'.($cab+1),'Pescador' );
						$sheet6->setCellValue('G'.($cab+1),'Acuicultor' );

					$sheet6->setCellValue('H'.$cab,'Centros Poblado Trabajados' );
					$sheet6->mergeCells('H'.$cab.':H'.($cab+1));					
					$sheet6->setCellValue('I'.$cab,'Avance de CCPP. %' );
					$sheet6->mergeCells('I'.$cab.':I'.($cab+1));	
					$sheet6->setCellValue('J'.$cab,'REGISTRO' );
					$sheet6->mergeCells('J'.$cab.':M'.($cab));	
						$sheet6->setCellValue('J'.($cab+1),'Pescador' );
						$sheet6->setCellValue('K'.($cab+1),'% de Marco' );
						$sheet6->setCellValue('L'.($cab+1),'Acuicultor' );
						$sheet6->setCellValue('M'.($cab+1),'% de Marco' );

					$sheet6->setCellValue('N'.$cab,'Formulario del Pescador' );
					$sheet6->mergeCells('N'.$cab.':N'.($cab+1));					
					$sheet6->setCellValue('O'.$cab,'Formulario del Acuicultor' );
					$sheet6->mergeCells('O'.$cab.':O'.($cab+1));	
					$sheet6->setCellValue('P'.$cab,'Formulario de la Comunidad' );
					$sheet6->mergeCells('P'.$cab.':P'.($cab+1));	
					$sheet6->setCellValue('Q'.$cab,'AVANCE %' );
					$sheet6->mergeCells('Q'.$cab.':Q'.($cab+1));

					$sheet6->setCellValue('R'.$cab,'MARCO PRODUCE' );
					$sheet6->mergeCells('R'.$cab.':S'.($cab));
						$sheet6->setCellValue('R'.($cab+1),'Pescador' );
						$sheet6->setCellValue('S'.($cab+1),'Acuicultor' );

					$sheet6->setCellValue('T'.$cab,'% AVANCE  respecto marco PRODUCE pescador' );
					$sheet6->mergeCells('T'.$cab.':T'.($cab+1));
					$sheet6->setCellValue('U'.$cab,'% AVANCE respecto marco PRODUCE acuicultor');
					$sheet6->mergeCells('U'.$cab.':U'.($cab+1));	
					$sheet6->setCellValue('V'.$cab,'% AVANCE PRODUCE');
					$sheet6->mergeCells('V'.$cab.':V'.($cab+1));																
			// NOMBRE CABECERAS

			// ESTILOS  CABECERAS
				$sheet6->getStyle("B".$cab.":V".($cab+1))->getAlignment()->setWrapText(true);// AJUSTA TEXTO A CELDA
				$sheet6->getStyle("B".$cab.":V".($cab+1))->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);						
				$sheet6->getStyle("B".$cab.":V".($cab+1))->getAlignment()->setVertical(PHPExcel_Style_Alignment::VERTICAL_CENTER);						
				$sheet6->getStyle("B".$cab.":V".($cab+1))->getFont()->getColor()->setARGB(PHPExcel_Style_Color::COLOR_WHITE);
				$sheet6->getStyle("B".$cab.":V".($cab+1))->getFont()->setname('Arial')->setSize(15);


		     	$headStyle = $this->phpexcel->getActiveSheet()->getStyle("B".$cab.":V".($cab+1));
		        //$headStyle->getFill()->setFillType(PHPExcel_Style_Fill::FILL_SOLID)->getStartColor()->setARGB('#FF9900');
				$headStyle->applyFromArray($color_celda_cabeceras);

				$sheet6->getStyle("V".$cab.":V".($cab) )->applyFromArray(array(
				'borders' => array(
							'allborders' => array(
											'style' => PHPExcel_Style_Border::BORDER_THIN)
						)
				));

			// ESTILOS  CABECERAS
		// CABECERA

	    // CUERPO
			//$total = $odeis_data->num_rows() + ($cab+1); // total del cuerpo
			$total =  1 + ($cab+1); // total del cuerpo

			$sheet6->getStyle("B".($cab+2).":V".$total)->getFont()->setname('Arial ')->setSize(14);

			//bordes cuerpo
			$sheet6->getStyle("B".($cab).":V".($total) )->applyFromArray(array(
			'borders' => array(
						'allborders' => array(
										'style' => PHPExcel_Style_Border::BORDER_THIN)
					)
			));


			// **************************************************************************
			$row = $cab+1;// inicio de la fila del cuerpo
			$col = 1; // inicio del column
			$num = 0; // para numerar
			$cambio = FALSE; // para intercarlar colores registros
			$tot_trab = null;
			$tot_trab_pes = null;
			$tot_trab_acui = null;
			$tot_trab_pes_totales  = null;
			$tot_trab_acui_totales = null;
			$tot_trab_com_totales  = null;
			$marco_prod_pes = 20350;
			$marco_prod_acui = 2145;


			foreach($odeis_data->result() as $celda){
				$row++;
				$sheet6->setCellValue('A'.$row, $celda->ODEI_COD);
				$sheet6->setCellValue('B'.$row, $celda->NOM_ODEI);
				$sheet6->setCellValue('C'.$row, $celda->PROVINCIA);
				$sheet6->setCellValue('D'.$row, $celda->DISTRITO);
				$sheet6->setCellValue('E'.$row, $celda->CENTRO_POBLADO);
				$sheet6->setCellValue('F'.$row, $celda->PESCADOR);
				$sheet6->setCellValue('G'.$row, $celda->ACUICULTOR);

				//Total de REG de Comunidades por DEP
				if ( $celda->NOM_ODEI == 'TOTAL' ){
					$tot_trab 		= $total_trab->num_rows() ;  //jala el total de registros de CCPP			
					$tot_trab_pes 	= $total_trab_pes->row('TOTAL') ;  //jala el total de pescadores nacional			
					$tot_trab_acui 	= $total_trab_acui->row('TOTAL') ;  //jala el total de pescadores nacional			
					$tot_trab_pes_totales 	= $total_trab_pes_totales->row('TOT_FORM') ;  //jala el total FORM de pescadores nacional			
					$tot_trab_acui_totales 	= $total_trab_acui_totales->row('TOT_FORM') ;  //jala el total FORM de ACUICULTORES nacional			
					$tot_trab_com_totales 	= $total_trab_com_totales->row('TOT_FORM') ;  //jala el total FORM de COMUNIDADES nacional	
				}

				if (is_numeric($tot_trab)){ //total de CCPP trabajados
					$sheet6->setCellValue('H'.$row, $tot_trab);
					$sheet6->setCellValue('I'.$row, number_format( (($tot_trab * 100)/$celda->CENTRO_POBLADO),2,'.',' ' ) );
				}else{
					$sheet6->setCellValue('H'.$row, 0 );
					$sheet6->setCellValue('I'.$row, 0);
				}	
				if (is_numeric($tot_trab_pes)){ //total de PESCADORES
					$sheet6->setCellValue('J'.$row, $tot_trab_pes);
					$sheet6->setCellValue('K'.$row, number_format( (($tot_trab_pes * 100)/$celda->PESCADOR),2,'.',' ' ) );
				}else{
					$sheet6->setCellValue('J'.$row, 0 );
					$sheet6->setCellValue('K'.$row, 0);
				}		
				if (is_numeric($tot_trab_acui)){ //total de ACUICULTORES
					$sheet6->setCellValue('L'.$row, $tot_trab_acui);
					$sheet6->setCellValue('M'.$row, number_format( (($tot_trab_acui * 100)/$celda->ACUICULTOR),2,'.',' ' ) );
				}else{
					$sheet6->setCellValue('L'.$row, 0 );
					$sheet6->setCellValue('M'.$row, 0);
				}	

				if (is_numeric($tot_trab_pes_totales)){ //total FORM de PESCADORES
					$sheet6->setCellValue('N'.$row, $tot_trab_pes_totales);
				}else{
					$sheet6->setCellValue('N'.$row, 0 );
				}	

				if (is_numeric($tot_trab_acui_totales)){ //total FORM de ACUICULTORES
					$sheet6->setCellValue('O'.$row, $tot_trab_acui_totales);
				}else{
					$sheet6->setCellValue('O'.$row, 0 );
				}		

				if (is_numeric($tot_trab_com_totales)){ //total FORM de COMUNIDADES
					$sheet6->setCellValue('P'.$row, $tot_trab_com_totales);
				}else{
					$sheet6->setCellValue('P'.$row, 0 );
				}		

				if( ( $tot_trab_pes + $tot_trab_acui ) > 0 ){ //AVANCE %
					$sheet6->setCellValue('Q'.$row, number_format( ( ( ($tot_trab_pes_totales  + $tot_trab_acui_totales)*100)/($tot_trab_pes + $tot_trab_acui) ) ,2,'.',' '));
				}else{
					$sheet6->setCellValue('Q'.$row, '0.0');
				}

				$sheet6->setCellValue('R'.$row, $marco_prod_pes); // marco produce PESCADOR

				$sheet6->setCellValue('S'.$row, $marco_prod_acui); // marco produce ACUICULTOR

				//%avance marco produce PESCADOR
				$sheet6->setCellValue('T'.$row, number_format( ( ( ($tot_trab_pes_totales)*100)/($marco_prod_pes) ) ,2,'.',' '));

				//%avance marco produce PESCADOR
				$sheet6->setCellValue('U'.$row, number_format( ( ( ($tot_trab_acui_totales)*100)/($marco_prod_acui) ) ,2,'.',' '));

				//%avance  produce GENERAL
				$sheet6->setCellValue('V'.$row, number_format( ( ( ($tot_trab_pes_totales + $tot_trab_acui_totales)*100)/($marco_prod_pes + $marco_prod_acui) ) ,2,'.',' '));


				$tot_trab = null;
				$tot_trab_pes = null;
				$tot_trab_acui = null;
				$tot_trab_pes_totales 	= null;
				$tot_trab_acui_totales  = null;
				$tot_trab_com_totales   = null;

				if ( $celda->NOM_ODEI == 'TOTAL' ){ break;}//para bucle, solo mostrar TOTAL

			}
			$sheet6->getStyle("A".($cab+2).":V".($cab+2))->getFont()->setname('Arial black')->setSize(14);// FORMATO negro al total
			$sheet6->getStyle("V".($cab+2).":V".$total)->getFont()->setname('Arial black')->setSize(14);// FORMATO negro al total
			$sheet6->getStyle('A3:Q5')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);	//opcional 

 		// CUERPO

	/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
	///////////  H O J A   6 ////////////////////////////////////////////////////////////////////////////////////////////////////////
	/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////


	/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
	///////////  H O J A   7 ////////////////////////////////////////////////////////////////////////////////////////////////////////
	/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////


		$odeis_data			= $this->meta_marco_model->get_all();	// odeis, y su data de META MARCO
		$total_trab	 		= $this->avance_campo_subrutas_model->get_num_reg();     				// TOTAL CCPP con reg  nacional
		$total_trab_pes	 	= $this->avance_campo_subrutas_model->get_pescadores();     			// TOTAL PESCADORES  nacional		
		$total_trab_acui 	= $this->avance_campo_subrutas_model->get_acuicultores();     			// TOTAL ACUICULTORES  nacional
		$total_trab_pes_totales	 	= $this->avance_campo_subrutas_model->get_pescadores_totales();     	// TOTAL FORM PESCADORES  nacional		
		$total_trab_acui_totales 	= $this->avance_campo_subrutas_model->get_acuicultores_totales();     	// TOTAL FORM ACUICULTORES  nacional						
		$total_trab_com_totales 	= $this->avance_campo_subrutas_model->get_comunidades_totales();     	// TOTAL FORM COMUNIDADES  nacional						


		$total_trab_by_odei 		= $this->avance_campo_subrutas_model->total_trab_by_odei();     	// TOTAL CCPP  por ODEI
		$total_trab_pes_by_odei 	= $this->avance_campo_subrutas_model->total_trab_pes_by_odei();     // TOTAL PESCADORES  por ODEI
		$total_trab_acui_by_odei 	= $this->avance_campo_subrutas_model->total_trab_acui_by_odei();    // TOTAL ACUICULTORES  por ODEI
		$total_ccpp_no_coberturado_by_odei	= $this->registro_pescadores_model->ccpp_no_coberturado_by_odei();
		$total_trab_pes_totales_by_odei		= $this->avance_campo_subrutas_model->total_trab_pes_totales_by_odei();		// TOTALES de formulario PESCADOR por ODEI
		$total_trab_acui_totales_by_odei	= $this->avance_campo_subrutas_model->total_trab_acui_totales_by_odei();	// TOTALES de formulario ACUICULTOR por ODEI
		$total_trab_com_totales_by_odei		= $this->avance_campo_subrutas_model->total_trab_com_totales_by_odei();		// TOTALES de formulario COMUNIDAD por ODEI

		foreach ($this->marco_model->get_odei($this->tank_auth->get_ubigeo())->result() as $key ) {//get ODEIS que tiene el usuario
			$odei[] = $key->ODEI_COD;
		}	
		$registros_udra_reg	= $this->udra_registro_model->get_udra_total_by_odei($odei); //get forms por ODEIS, 
		$registros_udra_pes	= $this->udra_pescador_model->get_formularios_total_by_odei($odei); //get forms por ODEIS, 						
		$registros_udra_acui = $this->udra_acuicultor_model->get_udra_total_by_odei($odei); //get forms por ODEIS, 
		$registros_udra_com	= $this->udra_comunidad_model->get_udra_total_by_odei($odei); //get forms por ODEIS, 

		$registros_dig_pes = $this->udra_pescador_model->get_forms_by_odei( $odei );//get forms por ODEI, ingresados en PESCADOR 
		$registros_dig_acui = $this->udra_acuicultor_model->get_forms_by_odei( $odei );//get forms por ODEI, ingresados en ACUICULTOR 
		$registros_dig_com = $this->udra_comunidad_model->get_forms_by_odei( $odei );//get forms por ODEI, ingresados en COMUNIDAD 		


			//PESCADOR, recorrido en tablas, buscando formularios completos
				if($registros_dig_pes->num_rows() > 0){
					$seccion_completos_pes = array();			
					foreach($registros_dig_pes->result() as $filas){//busca en todas las tablas de pescador
						$i = 0;
						$table = null;
						foreach($this->secciones as $s=>$k){
							$table = 'pesc_seccion' . $s;
							if($s == 10){ $table = 'pesc_info'; }

							$rega = $this->udra_pescador_model->get_regs_a($table,$filas->id);//recorre cada tabla
							if ( $rega->num_rows() >0 ){ $i++; }
						}
						if ($i == 9){
							$seccion_completos_pes[] = $filas->id; //guarda los ID de formularios completos en todas las secciones
						}else{
							$seccion_incompletos_pes[] = $filas->id; //guarda los ID de formularios incompletos
						}
					}
				}

				if (count($seccion_completos_pes)>0){ $formularios_dig_pes = $this->udra_pescador_model->get_n_formularios_by_odei($seccion_completos_pes); }
				else { $formularios_dig_pes = NULL;	}		

			// ACUICULTOR, recorrido en tablas, buscando formularios completos
				if($registros_dig_acui->num_rows() > 0){
					$seccion_completos_acui = array();
					foreach($registros_dig_acui->result() as $filas){//busca en todas las tablas de pescador
						$a = 0;
						$table = null;
						foreach($this->secciones as $s=>$k){
							$table = 'acu_seccion' . $s;

							$rega = $this->udra_acuicultor_model->get_regs_a($table,$filas->id1, $s);//recorre cada tabla
							if ($rega->num_rows() >0){$a++;	}
						}
						if ($a == 9){
							$seccion_completos_acui[] = $filas->id1; //guarda los ID de formularios completos en todas las secciones
						}else{
							$seccion_incompletos_acui[] = $filas->id1; //guarda los ID de formularios incompletos
						}
					}
				}
				if (count($seccion_completos_acui)>0){ $formularios_dig_acui = $this->udra_acuicultor_model->get_n_formularios_by_odei($seccion_completos_acui); }
				else{ $formularios_dig_acui = NULL;	}	

			//COMUNIDAD, recorrido en tablas, buscando formularios completos
				if($registros_dig_com->num_rows() > 0){
					$seccion_completos_com = array();
					foreach($registros_dig_com->result() as $filas){//busca en todas las tablas de pescador
						$i = 0;
						$table = null;
						foreach($this->secciones_com as $s=>$k){
							$table = 'comunidad_seccion' . $s;
							if($s == 9){ $table = 'comunidad_info';	}

							$rega = $this->udra_comunidad_model->get_regs_a($table,$filas->id);//recorre cada tabla
							if ($rega->num_rows() >0){ $i++; }
						}
						if ($i == 8){
							$seccion_completos_com[] = $filas->id; //guarda los ID de formularios completos en todas las secciones
						}else{
							$seccion_incompletos_com[] = $filas->id; //guarda los ID de formularios incompletos
						}
					}
				}
				if (count($seccion_completos_com)>0){ $formularios_dig_com = $this->udra_comunidad_model->get_n_formularios_by_odei($seccion_completos_com); } //N° formularios ingresados en pescador completos
				else { $formularios_dig_com = NULL; }	

		// resultado de digitaicon
		$res_dig_completo_pes		= $this->udra_pescador_model->get_dig_res_completo_by_odei($seccion_completos_pes);
		$res_dig_incompleto_pes		= $this->udra_pescador_model->get_dig_res_incompleto_by_odei($seccion_completos_pes);
		$res_dig_rechazo_pes		= $this->udra_pescador_model->get_dig_res_rechazo_by_odei($seccion_completos_pes);
		$res_dig_completo_acui		= $this->udra_acuicultor_model->get_dig_res_completo_by_odei($seccion_completos_acui);
		$res_dig_incompleto_acui	= $this->udra_acuicultor_model->get_dig_res_incompleto_by_odei($seccion_completos_acui);
		$res_dig_rechazo_acui		= $this->udra_acuicultor_model->get_dig_res_rechazo_by_odei($seccion_completos_acui);
		$res_dig_completo_com		= $this->udra_comunidad_model->get_dig_res_completo_by_odei($seccion_completos_com);
		$res_dig_incompleto_com		= $this->udra_comunidad_model->get_dig_res_incompleto_by_odei($seccion_completos_com);
		$res_dig_rechazo_com		= $this->udra_comunidad_model->get_dig_res_rechazo_by_odei($seccion_completos_com);		

		// pestaña
		$sheet7 = $this->phpexcel->createSheet(6);	
		//$sheet2 = $this->phpexcel->setActiveSheetIndex(1);55
		//$sheet = $this->phpexcel->getActiveSheet(1);
		
		// formato de la hoja
			// Set Orientation, size and scaling
			//$objPHPExcel->setActiveSheetIndex(0);
			$sheet7->getPageSetup()->setOrientation(PHPExcel_Worksheet_PageSetup::ORIENTATION_LANDSCAPE);// horizontal
			//$sheet7->getPageSetup()->setOrientation(PHPExcel_Worksheet_PageSetup::ORIENTATION_PORTRAIT); // vertical
			$sheet7->getPageSetup()->setPaperSize(PHPExcel_Worksheet_PageSetup::PAPERSIZE_A3);
			$sheet7->getPageSetup()->setFitToPage(false); // ajustar pagina
			$sheet7->getPageSetup()->setFitToWidth(1);
			$sheet7->getPageSetup()->setFitToHeight(0);		
			$sheet7->setShowGridlines(false);// oculta lineas de cuadricula		

			// margin is set in inches (0.5cm)
			$margin = 0.5 / 2.54;
			//$sheet7->getPageMargins->setTop($margin);
			//$sheet7->getPageMargins->setBottom($margin);
			$sheet7->getPageMargins()->setLeft($margin);
			$sheet7->getPageMargins()->setRight($margin);


		// formato de la hoja

		// ANCHO Y ALTURA DE COLUMNAS DEL FILE
			$sheet7->getColumnDimension('A')->setWidth(8);
			$sheet7->getColumnDimension('B')->setWidth(35);
			$sheet7->getColumnDimension('C')->setWidth(20);
			$sheet7->getColumnDimension('D')->setWidth(20);
			$sheet7->getColumnDimension('E')->setWidth(12);
			$sheet7->getColumnDimension('F')->setWidth(14);
			$sheet7->getColumnDimension('G')->setWidth(14);
			$sheet7->getColumnDimension('H')->setWidth(12);
			$sheet7->getColumnDimension('I')->setWidth(15);
			$sheet7->getColumnDimension('J')->setWidth(13);
			$sheet7->getColumnDimension('K')->setWidth(15);
			// $sheet7->getColumnDimension('L')->setWidth(15);
			// $sheet7->getColumnDimension('M')->setWidth(11);
			// $sheet7->getColumnDimension('N')->setWidth(15);
			// $sheet7->getColumnDimension('O')->setWidth(15);
			// $sheet7->getColumnDimension('P')->setWidth(15);
			// $sheet7->getColumnDimension('Q')->setWidth(15);
			// $sheet7->getColumnDimension('R')->setWidth(15);
			// $sheet7->getColumnDimension('S')->setWidth(15);
			// $sheet7->getColumnDimension('T')->setWidth(15);
			// $sheet7->getColumnDimension('U')->setWidth(15);
			// $sheet7->getColumnDimension('V')->setWidth(15);
			// $sheet7->getColumnDimension('W')->setWidth(15);
			// $sheet7->getColumnDimension('X')->setWidth(15);
			// $sheet7->getColumnDimension('Y')->setWidth(15);
			// $sheet7->getColumnDimension('Z')->setWidth(15);
			// $sheet7->getColumnDimension('AA')->setWidth(15);
			// $sheet7->getColumnDimension('AB')->setWidth(15);
			// $sheet7->getColumnDimension('AC')->setWidth(15);
			// $sheet7->getColumnDimension('AD')->setWidth(15);


			$sheet7->getRowDimension(3)->setRowHeight(70);
			$sheet7->getRowDimension(4)->setRowHeight(2);
			$sheet7->getRowDimension(5)->setRowHeight(70);
			$sheet7->getRowDimension(16)->setRowHeight(30);
			$sheet7->getRowDimension(17)->setRowHeight(30);
			$sheet7->getRowDimension(18)->setRowHeight(110);
			$sheet7->getRowDimension(19)->setRowHeight(25);
		// ANCHO Y ALTURA DE COLUMNAS DEL FILE

		// TITULOS
			$sheet7->setCellValue('A3','INSTITUTO NACIONAL DE ESTADÍSTICA E INFORMATICA');
			$sheet7->mergeCells('A3:BI3');
			$sheet7->setCellValue('A5','PRIMER CENSO NACIONAL DE PESCA CONTINENTAL' );
			$sheet7->mergeCells('A5:BI5');
			$sheet7->setCellValue('A9','PROCESOS' );
			$sheet7->mergeCells('A9:BI9');	
					
			$sheet7->getStyle('A3:BI9')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);	
			$sheet7->getStyle('A3:BI9')->getFont()->getColor()->setARGB(PHPExcel_Style_Color::COLOR_BLACK);
			$sheet7->getStyle('A3:BI9')->getFont()->setname('Arial black')->setSize(50);	
			$sheet7->getStyle('A5:BI9')->getFont()->setname('Arial ')->setSize(42);	
			$sheet7->getStyle('A9')->getFont()->setname('Arial black')->setSize(35);	

			// LOGO
	          $objDrawing = new PHPExcel_Worksheet_Drawing();
	          $objDrawing->setWorksheet($sheet7);
	          $objDrawing->setName("inei");
	          $objDrawing->setDescription("Inei");
	          $objDrawing->setPath("img/inei.jpeg");
	          $objDrawing->setCoordinates('B6');
	          $objDrawing->setHeight(100);
	          $objDrawing->setWidth(220);
	          $objDrawing->setOffsetX(1);
	          $objDrawing->setOffsetY(5);

	          $objDrawing2 = new PHPExcel_Worksheet_Drawing();
	          $objDrawing2->setWorksheet($sheet7);
	          $objDrawing2->setName("CENPESCO");
	          $objDrawing2->setDescription("CENPESCO");
	          $objDrawing2->setPath("img/cenpesco.jpg");
	          $objDrawing2->setCoordinates('BE5');
	          $objDrawing2->setHeight(100);
	          $objDrawing2->setWidth(220);
	          $objDrawing2->setOffsetX(1);
	          $objDrawing2->setOffsetY(1);
		// TITULOS


		// CABECERA
			// INICIO DE LA  cabecera
			$cab = 16;	
				
			// NOMBRE CABECERAS

					$sheet7->setCellValue('A'.$cab,'ODEI COD');
					$sheet7->mergeCells('A'.$cab.':A'.($cab+2));
					$sheet7->setCellValue('B'.$cab,'ODEI' );
					$sheet7->mergeCells('B'.$cab.':B'.($cab+2));
					$sheet7->setCellValue('C'.$cab,'PROVINCIAS' );
					$sheet7->mergeCells('C'.$cab.':C'.($cab+2));
					$sheet7->setCellValue('D'.$cab,'DISTRITOS' );
					$sheet7->mergeCells('D'.$cab.':D'.($cab+2));
					$sheet7->setCellValue('E'.$cab,'Centros Poblado' );
					$sheet7->mergeCells('E'.$cab.':E'.($cab+2));
					$sheet7->setCellValue('F'.$cab,'META (MARCO)' );
					$sheet7->mergeCells('F'.($cab).':G'.($cab+1));
						$sheet7->setCellValue('F'.($cab+2),'Pescador' );
						$sheet7->setCellValue('G'.($cab+2),'Acuicultor' );
					$sheet7->setCellValue('H'.$cab,'Centros Poblado Trabajados' );
					$sheet7->mergeCells('H'.$cab.':H'.($cab+2));					
					$sheet7->setCellValue('I'.$cab,'Avance de CCPP. %' );
					$sheet7->mergeCells('I'.$cab.':I'.($cab+2));	
					$sheet7->setCellValue('J'.$cab,'Centros Poblados con Actas de no cobertura' );
					$sheet7->mergeCells('J'.$cab.':J'.($cab+2));					
					$sheet7->setCellValue('K'.$cab,'Avance de CCPP. %' );
					$sheet7->mergeCells('K'.$cab.':K'.($cab+2));
					$sheet7->setCellValue('L'.$cab,'SEGUIMIENTO' );
					$sheet7->mergeCells('L'.$cab.':S'.$cab);	
						$sheet7->setCellValue('L'.($cab+1),'REGISTRO' );
						$sheet7->mergeCells('L'.($cab+1).':O'.($cab+1));	
							$sheet7->setCellValue('L'.($cab+2),'Pescador' );
							$sheet7->setCellValue('M'.($cab+2),'% de Marco' );
							$sheet7->setCellValue('N'.($cab+2),'Acuicultor' );
							$sheet7->setCellValue('O'.($cab+2),'% de Marco' );
						$sheet7->setCellValue('P'.($cab+1),'FORMULARIO' );
						$sheet7->mergeCells('P'.($cab+1).':S'.($cab+1));	
							$sheet7->setCellValue('P'.($cab+2),'Pescador' );
							$sheet7->setCellValue('Q'.($cab+2),'Acuicultor' );
							$sheet7->setCellValue('R'.($cab+2),'Comunidad' );
							$sheet7->setCellValue('S'.($cab+2),'AVANCE %' );
					$sheet7->setCellValue('T'.$cab,'UDRA' );
					$sheet7->mergeCells('T'.($cab).':Y'.($cab+1));
						$sheet7->setCellValue('T'.($cab+2),'Pescador' );
						$sheet7->setCellValue('U'.($cab+2),'% de Marco' );
						$sheet7->setCellValue('V'.($cab+2),'Acuicultor' );
						$sheet7->setCellValue('W'.($cab+2),'% de Marco' );
						$sheet7->setCellValue('X'.($cab+2),'Comunidad' );
						$sheet7->setCellValue('Y'.($cab+2),'% de Marco' );
					$sheet7->setCellValue('Z'.$cab,'DIGITACIÓN' );
					$sheet7->mergeCells('Z'.($cab).':AE'.($cab+1));
						$sheet7->setCellValue('Z'.($cab+2),'Pescador' );
						$sheet7->setCellValue('AA'.($cab+2),'% de Marco' );
						$sheet7->setCellValue('AB'.($cab+2),'Acuicultor' );
						$sheet7->setCellValue('AC'.($cab+2),'% de Marco' );
						$sheet7->setCellValue('AD'.($cab+2),'Comunidad' );
						$sheet7->setCellValue('AE'.($cab+2),'% de Marco' );
					$sheet7->setCellValue('AF'.$cab,'RESULTADOS DEL PESCADOR' );
					$sheet7->mergeCells('AF'.($cab).':AJ'.($cab+1));
						$sheet7->setCellValue('AF'.($cab+2),'Completo' );
						$sheet7->setCellValue('AG'.($cab+2),'Imcompleto' );
						$sheet7->setCellValue('AH'.($cab+2),'Rechazo' );
						$sheet7->setCellValue('AI'.($cab+2),'Otro' );
						$sheet7->setCellValue('AJ'.($cab+2),'Tasa de no respuesta' );
					$sheet7->setCellValue('AK'.$cab,'RESULTADOS DEL ACUICULTOR' );
					$sheet7->mergeCells('AK'.($cab).':AO'.($cab+1));
						$sheet7->setCellValue('AK'.($cab+2),'Completo' );
						$sheet7->setCellValue('AL'.($cab+2),'Imcompleto' );
						$sheet7->setCellValue('AM'.($cab+2),'Rechazo' );
						$sheet7->setCellValue('AN'.($cab+2),'Otro' );
						$sheet7->setCellValue('AO'.($cab+2),'Tasa de no respuesta' );
					$sheet7->setCellValue('AP'.$cab,'RESULTADOS DE LA COMUNIDAD' );
					$sheet7->mergeCells('AP'.($cab).':AT'.($cab+1));
						$sheet7->setCellValue('AP'.($cab+2),'Completo' );
						$sheet7->setCellValue('AQ'.($cab+2),'Imcompleto' );
						$sheet7->setCellValue('AR'.($cab+2),'Rechazo' );
						$sheet7->setCellValue('AS'.($cab+2),'Otro' );
						$sheet7->setCellValue('AT'.($cab+2),'Tasa de no respuesta' );
					$sheet7->setCellValue('AU'.$cab,'CONSISTENCIA' );
					$sheet7->mergeCells('AU'.($cab).':AZ'.($cab+1));
						$sheet7->setCellValue('AU'.($cab+2),'Pescador' );
						$sheet7->setCellValue('AV'.($cab+2),'% de Marco' );
						$sheet7->setCellValue('AW'.($cab+2),'Acuicultor' );
						$sheet7->setCellValue('AX'.($cab+2),'% de Marco' );
						$sheet7->setCellValue('AY'.($cab+2),'Comunidad' );
						$sheet7->setCellValue('AZ'.($cab+2),'% de Marco' );
					$sheet7->setCellValue('BA'.$cab,'TABULADOS' );
					$sheet7->mergeCells('BA'.($cab).':BC'.($cab+1));
						$sheet7->setCellValue('BA'.($cab+2),'Pescador' );
						$sheet7->setCellValue('BB'.($cab+2),'Acuicultor' );
						$sheet7->setCellValue('BC'.($cab+2),'Comunidad' );
					$sheet7->setCellValue('BD'.$cab,'MAPAS TEMÁTICOS' );
					$sheet7->mergeCells('BD'.($cab).':BI'.($cab+1));
						$sheet7->setCellValue('BD'.($cab+2),'Pescador' );
						$sheet7->setCellValue('BE'.($cab+2),'%' );
						$sheet7->setCellValue('BF'.($cab+2),'Acuicultor' );
						$sheet7->setCellValue('BG'.($cab+2),'% ' );
						$sheet7->setCellValue('BH'.($cab+2),'Comunidad' );
						$sheet7->setCellValue('BI'.($cab+2),'% ' );						
			// NOMBRE CABECERAS

			// ESTILOS  CABECERAS
				$sheet7->getStyle("A".$cab.":BI".($cab+2))->getAlignment()->setWrapText(true);// AJUSTA TEXTO A CELDA
				$sheet7->getStyle("A".$cab.":BI".($cab+2))->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);						
				$sheet7->getStyle("A".$cab.":BI".($cab+2))->getAlignment()->setVertical(PHPExcel_Style_Alignment::VERTICAL_CENTER);						
				$sheet7->getStyle("A".$cab.":BI".($cab+2))->getFont()->getColor()->setARGB(PHPExcel_Style_Color::COLOR_WHITE);
				$sheet7->getStyle("A".$cab.":BI".($cab+2))->getFont()->setname('Arial')->setSize(15);


		     	$headStyle = $this->phpexcel->getActiveSheet()->getStyle("A".$cab.":BI".($cab+2));
		        //$headStyle->getFill()->setFillType(PHPExcel_Style_Fill::FILL_SOLID)->getStartColor()->setARGB('#FF9900');
				$headStyle->applyFromArray($color_celda_cabeceras);

				$sheet7->getStyle("A".$cab.":BI".($cab+2) )->applyFromArray(array(
				'borders' => array(
							'allborders' => array(
											'style' => PHPExcel_Style_Border::BORDER_THIN)
						)
				));

				//$sheet->getStyle('J16')->getFont()->setname('Arial Narrow')->setSize(9); // tamaño especial para esta celda
			// ESTILOS  CABECERAS
		// CABECERA

	    // CUERPO
			$total = $odeis_data->num_rows() + ($cab+2); // total del cuerpo

			$sheet7->getStyle("A".($cab+3).":BI".$total)->getFont()->setname('Arial Narrow')->setSize(14);

			//bordes cuerpo
			$sheet7->getStyle("A".($cab).":BI".($total) )->applyFromArray(array(
			'borders' => array(
						'allborders' => array(
										'style' => PHPExcel_Style_Border::BORDER_THIN)
					)
			));
			$sheet7->getStyle('A'.($cab+3).':A'.$total)->getNumberFormat()->setFormatCode('00');// formato para codigo col A, 

			// **************************************************************************
			$row = $cab+2;// inicio de la fila del cuerpo
			$col = 1; // inicio del column
			$num = 0; // para numerar
			$cambio = FALSE; // para intercarlar colores registros
			$proc_ccpp_no_cob = null;
			$proc_trab = null;
			$proc_trab_pes = null;
			$proc_trab_acui = null;
			$proc_trab_pes_totales  = null;
			$proc_trab_acui_totales = null;
			$proc_trab_com_totales  = null;
			$proc_udra_pes = null;
			$proc_udra_acui = null;
			$proc_udra_com = null;
			$proc_dig_pes = null;
			$proc_dig_acui = null;
			$proc_dig_com = null;
			$proc_dig_completo_pes = NULL;
			$proc_dig_incompleto_pes = NULL;
			$proc_dig_rechazo_pes = NULL;
			$proc_dig_otro_pes = NULL;
			$proc_dig_completo_acui = NULL;
			$proc_dig_incompleto_acui = NULL;
			$proc_dig_rechazo_acui = NULL;		
			$proc_dig_otro_acui = NULL;		
			$proc_dig_completo_com = NULL;
			$proc_dig_incompleto_com = NULL;
			$proc_dig_rechazo_com = NULL;		
			$proc_dig_otro_com = NULL;		

			foreach($odeis_data->result() as $celda){
				$row++;
				$sheet7->setCellValue('A'.$row, $celda->ODEI_COD);
				$sheet7->setCellValue('B'.$row, $celda->NOM_ODEI);
				$sheet7->setCellValue('C'.$row, $celda->PROVINCIA);
				$sheet7->setCellValue('D'.$row, $celda->DISTRITO);
				$sheet7->setCellValue('E'.$row, $celda->CENTRO_POBLADO);
				$sheet7->setCellValue('F'.$row, $celda->PESCADOR);
				$sheet7->setCellValue('G'.$row, $celda->ACUICULTOR);

				//Total de REG de Comunidades por DEP
				if ( $celda->NOM_ODEI == 'TOTAL' ){
					$proc_trab 		= $total_trab->num_rows() ;  //jala el total de registros de CCPP			
					$proc_trab_pes 	= $total_trab_pes->row('TOTAL') ;  //jala el total de pescadores nacional			
					$proc_trab_acui 	= $total_trab_acui->row('TOTAL') ;  //jala el total de pescadores nacional			
					$proc_trab_pes_totales 	= $total_trab_pes_totales->row('TOT_FORM') ;  //jala el total FORM de pescadores nacional			
					$proc_trab_acui_totales 	= $total_trab_acui_totales->row('TOT_FORM') ;  //jala el total FORM de pescadores nacional			
					$proc_trab_com_totales 	= $total_trab_com_totales->row('TOT_FORM') ;  //jala el total FORM de pescadores nacional	

					foreach ($total_ccpp_no_coberturado_by_odei->result() as $value) {// CCPP NO Coberturado
						$proc_ccpp_no_cob = $proc_ccpp_no_cob + $value->TOTAL;
					}	
					//UDRA ***************************************************************************
					foreach ($registros_udra_pes->result() as $pes) {
					 	$proc_udra_pes = $proc_udra_pes + $pes->TOTAL_FORM; 
					}
					foreach ($registros_udra_acui->result() as $acui) {
					 	$proc_udra_acui =  $proc_udra_acui + $acui->TOTAL_FORM;
					} 
					foreach ($registros_udra_com->result() as $com) {
					 	$proc_udra_com = $proc_udra_com + $com->TOTAL_FORM; 
					} 
					//DIGITACION
					if (isset($formularios_dig_pes)) { //pescador
						foreach ($formularios_dig_pes->result() as $pes) {
						 	 $proc_dig_pes = $proc_dig_pes + $pes->TOTAL_DIG; 
						} 
					} 					
					if (isset($formularios_dig_acui)) { // acuicultor
						foreach ($formularios_dig_acui->result() as $acui) {
						 	$proc_dig_acui = $proc_dig_acui + $acui->TOTAL_DIG;  
						} 
					} 
					if (isset($formularios_dig_com)) { // comunidad
						foreach ($formularios_dig_com->result() as $com) {
						 	$proc_dig_com = $proc_dig_com + $com->TOTAL_DIG;
						} 
					} 		
					// RESULTADO DIGITACION			
					if (isset($res_dig_completo_pes)) { 	// PESCADOR completo
						foreach ($res_dig_completo_pes->result() as $pes) {
							$proc_dig_completo_pes = $proc_dig_completo_pes + $pes->COMPLETO;
						}
					}
					if (isset($res_dig_incompleto_pes)) { 	// PESCADOR incompleto
						foreach ($res_dig_incompleto_pes->result() as $pes) {
							$proc_dig_incompleto_pes = $proc_dig_incompleto_pes + $pes->INCOMPLETO;
						}
					}		
					if (isset($res_dig_rechazo_pes)) { 		// PESCADOR rechazo
						foreach ($res_dig_rechazo_pes->result() as $pes) {
							$proc_dig_rechazo_pes = $proc_dig_rechazo_pes + $pes->RECHAZO;
						}
					}	
					if (isset($res_dig_completo_acui)) { 	// ACUICULTOR completo
						foreach ($res_dig_completo_acui->result() as $acui) {
							$proc_dig_completo_acui = $proc_dig_completo_acui + $acui->COMPLETO;
						}
					}
					if (isset($res_dig_incompleto_acui)) { 	// ACUICULTOR incompleto
						foreach ($res_dig_incompleto_acui->result() as $acui) {
							$proc_dig_incompleto_acui = $proc_dig_incompleto_acui + $acui->INCOMPLETO;
						}
					}		
					if (isset($res_dig_rechazo_acui)) { 	// ACUICULTOR rechazo
						foreach ($res_dig_rechazo_acui->result() as $acui) {
							$proc_dig_rechazo_acui = $proc_dig_rechazo_acui + $acui->RECHAZO;
						}
					}	
					if (isset($res_dig_completo_com)) { 	// COMUNIDAD completo
						foreach ($res_dig_completo_com->result() as $com) {
							$proc_dig_completo_com = $proc_dig_completo_com + $com->COMPLETO;
						}
					}
					if (isset($res_dig_incompleto_com)) { 	// COMUNIDAD incompleto
						foreach ($res_dig_incompleto_com->result() as $com) {
							$proc_dig_incompleto_com = $proc_dig_incompleto_com + $com->INCOMPLETO;
						}
					}		
					if (isset($res_dig_rechazo_com)) { 	// COMUNIDAD rechazo
						foreach ($res_dig_rechazo_com->result() as $com) {
							$proc_dig_rechazo_com = $proc_dig_rechazo_com + $com->RECHAZO;
						}
					}																			
				}else{
					foreach ($total_trab_by_odei->result() as  $value) {
						if ($celda->ODEI_COD == $value->COD_ODEI){
							$proc_trab = $value->TOTAL  ; break;
						}
					}	

					foreach ($total_ccpp_no_coberturado_by_odei->result() as $value) {// CCPP NO COBERTURADO
						if ($celda->ODEI_COD == $value->ODEI_COD) {
							$proc_ccpp_no_cob =  $value->TOTAL; break;
						}
						
					}

					foreach ($total_trab_pes_by_odei->result() as  $value) {

						if ($celda->ODEI_COD == $value->COD_ODEI){
							$proc_trab_pes = $value->TOTAL  ; break;
						}
					}	
					foreach ($total_trab_acui_by_odei->result() as  $value) {

						if ($celda->ODEI_COD == $value->COD_ODEI){
							$proc_trab_acui = $value->TOTAL  ; break;
						}
					}	
					foreach ($total_trab_pes_totales_by_odei->result() as  $value) {

						if ($celda->ODEI_COD == $value->COD_ODEI){
							$proc_trab_pes_totales = $value->TOT_FORM  ; break;
						}
					}	
					foreach ($total_trab_acui_totales_by_odei->result() as  $value) {
						if ($celda->ODEI_COD == $value->COD_ODEI){
							$proc_trab_acui_totales = $value->TOT_FORM  ; break;
						}
					}	
					foreach ($total_trab_com_totales_by_odei->result() as  $value) {
						if ($celda->ODEI_COD == $value->COD_ODEI){
							$proc_trab_com_totales = $value->TOT_FORM  ; break;
						}
					}		
					//UDRA ***************************************************************************
					foreach ($registros_udra_pes->result() as $pes) {
					 	if ( $celda->ODEI_COD == $pes->ODEI_COD) { $proc_udra_pes = $pes->TOTAL_FORM; break; }
					} 
					foreach ($registros_udra_acui->result() as $acui) {
						if ( $celda->ODEI_COD == $acui->ODEI_COD) { $proc_udra_acui = $acui->TOTAL_FORM; break; }
					} 					
					foreach ($registros_udra_com->result() as $com) {
						if ( $celda->ODEI_COD == $com->ODEI_COD) { $proc_udra_com =  $com->TOTAL_FORM; break; }
					 	
					} 
					//DIGITACION
					if (isset($formularios_dig_pes)) {
						foreach ($formularios_dig_pes->result() as $pes) {
							if ( $celda->ODEI_COD == $pes->ODEI_COD) { $proc_dig_pes =  $pes->TOTAL_DIG; break; }
						} 
					}	
					if (isset($formularios_dig_acui)) {
						foreach ($formularios_dig_acui->result() as $acui) {
							if ( $celda->ODEI_COD == $acui->ODEI_COD) { $proc_dig_acui = $acui->TOTAL_DIG;  }
						} 
					}
					if (isset($formularios_dig_com)) {
						foreach ($formularios_dig_com->result() as $com) {
							if ( $celda->ODEI_COD == $com->ODEI_COD) { $proc_dig_com = $com->TOTAL_DIG; break;}
						} 
					} 
					// RESULTADO DIGITACION
					if (isset($res_dig_completo_pes)) { // pescador completo
						foreach ($res_dig_completo_pes->result() as $pes) {
							if ( $celda->ODEI_COD == $pes->ODEI_COD) { $proc_dig_completo_pes =  $pes->COMPLETO; break; }
						}
					}	
					if (isset($res_dig_incompleto_pes)) { // pescador incompleto
						foreach ($res_dig_incompleto_pes->result() as $pes) {
							if ( $celda->ODEI_COD == $pes->ODEI_COD) { $proc_dig_incompleto_pes = $pes->INCOMPLETO; break; }
						}
					}	
					if (isset($res_dig_rechazo_pes)) { // pescador rechazo
						foreach ($res_dig_rechazo_pes->result() as $pes) {
							if ( $celda->ODEI_COD == $pes->ODEI_COD) { $proc_dig_rechazo_pes = $pes->INCOMPLETO; break; }
						}
					}
					if (isset($res_dig_completo_acui)) { 	// ACUICULTOR completo
						foreach ($res_dig_completo_acui->result() as $acui) {
							if ( $celda->ODEI_COD == $acui->ODEI_COD) { $proc_dig_completo_acui =  $acui->COMPLETO; break; }
						}
					}
					if (isset($res_dig_incompleto_acui)) { 	// ACUICULTOR incompleto
						foreach ($res_dig_incompleto_acui->result() as $acui) {
							if ( $celda->ODEI_COD == $acui->ODEI_COD) { $proc_dig_incompleto_acui =  $acui->INCOMPLETO; break; }
						}
					}		
					if (isset($res_dig_rechazo_acui)) { 	// ACUICULTOR rechazo
						foreach ($res_dig_rechazo_acui->result() as $acui) {
							if ( $celda->ODEI_COD == $acui->ODEI_COD) { $proc_dig_rechazo_acui =  $acui->RECHAZO; break; }
						}
					}	
					if (isset($res_dig_completo_com)) { 	// COMUNIDAD completo
						foreach ($res_dig_completo_com->result() as $com) {
							if ( $celda->ODEI_COD == $com->ODEI_COD) { $proc_dig_completo_com =  $com->COMPLETO; break; }
						}
					}
					if (isset($res_dig_incompleto_com)) { 	// COMUNIDAD incompleto
						foreach ($res_dig_incompleto_com->result() as $com) {
							if ( $celda->ODEI_COD == $com->ODEI_COD) { $proc_dig_incompleto_com =  $com->INCOMPLETO; break; }
						}
					}		
					if (isset($res_dig_rechazo_com)) { 	// COMUNIDAD rechazo
						foreach ($res_dig_rechazo_com->result() as $com) {
							if ( $celda->ODEI_COD == $com->ODEI_COD) { $proc_dig_rechazo_com =  $com->RECHAZO; break; }
						}
					}
				}				


				if (is_numeric($proc_trab)){ //total de CCPP trabajados
					$sheet7->setCellValue('H'.$row, $proc_trab);
					$sheet7->setCellValue('I'.$row, number_format( (($proc_trab * 100)/$celda->CENTRO_POBLADO),2,'.',' ' ) );
				}else{
					$sheet7->setCellValue('H'.$row, 0 );
					$sheet7->setCellValue('I'.$row, 0);
				}	
				if (is_numeric($proc_ccpp_no_cob)){ //total de CCPP no coberturados
					$sheet7->setCellValue('J'.$row, $proc_ccpp_no_cob);
					$sheet7->setCellValue('K'.$row, number_format( (($proc_ccpp_no_cob * 100)/$celda->CENTRO_POBLADO),2,'.',' ' ) );
				}else{
					$sheet7->setCellValue('J'.$row, 0 );
					$sheet7->setCellValue('K'.$row, 0);
				}	
				if (is_numeric($proc_trab_pes)){ //total de PESCADORES
					$sheet7->setCellValue('L'.$row, $proc_trab_pes);
					$sheet7->setCellValue('M'.$row, number_format( (($proc_trab_pes * 100)/$celda->PESCADOR),2,'.',' ' ) );
				}else{
					$sheet7->setCellValue('L'.$row, 0 );
					$sheet7->setCellValue('M'.$row, 0);
				}						
				if (is_numeric($proc_trab_acui)){ //total de ACUICULTORES
					$sheet7->setCellValue('N'.$row, $proc_trab_acui);
					$sheet7->setCellValue('O'.$row, number_format( (($proc_trab_acui * 100)/$celda->ACUICULTOR),2,'.',' ' ) );
				}else{
					$sheet7->setCellValue('N'.$row, 0 );
					$sheet7->setCellValue('O'.$row, 0);
				}	

				if (is_numeric($proc_trab_pes_totales)){ //total FORM de PESCADORES
					$sheet7->setCellValue('P'.$row, $proc_trab_pes_totales);
				}else{
					$sheet7->setCellValue('P'.$row, 0 );
				}	

				if (is_numeric($proc_trab_acui_totales)){ //total FORM de ACUICULTORES
					$sheet7->setCellValue('Q'.$row, $proc_trab_acui_totales);
				}else{
					$sheet7->setCellValue('Q'.$row, 0 );
				}		

				if (is_numeric($proc_trab_com_totales)){ //total FORM de COMUNIDADES
					$sheet7->setCellValue('R'.$row, $proc_trab_com_totales);
				}else{
					$sheet7->setCellValue('S'.$row, 0 );
				}		

				if( ( $proc_trab_pes + $proc_trab_acui ) > 0 ){ //AVANCE %
					$sheet7->setCellValue('S'.$row, number_format( ( ( ($proc_trab_pes_totales  + $proc_trab_acui_totales)*100)/($proc_trab_pes + $proc_trab_acui) ) ,2,'.',' '));
				}else{
					$sheet7->setCellValue('S'.$row, '0.0');
				}

				//UDRA ***************************************************************************
				if ( is_numeric($proc_udra_pes) ){
					$sheet7->setCellValue('T'.$row, $proc_udra_pes); 
					$sheet7->setCellValue('U'.$row, number_format( ( ( ($proc_udra_pes*100)/$celda->PESCADOR) ),2,'.','') ); 
				}else{
					$sheet7->setCellValue('T'.$row, 0); 
					$sheet7->setCellValue('U'.$row, 0); 
				}
				if ( is_numeric($proc_udra_acui) ){
					$sheet7->setCellValue('V'.$row, $proc_udra_acui); 
					$sheet7->setCellValue('W'.$row, number_format( ( ( ($proc_udra_acui*100)/$celda->ACUICULTOR) ),2,'.','') ); 
				}else{
					$sheet7->setCellValue('V'.$row, 0); 
					$sheet7->setCellValue('W'.$row, 0); 
				}
				if ( is_numeric($proc_udra_com) ){
					$sheet7->setCellValue('X'.$row, $proc_udra_com); 
					$sheet7->setCellValue('Y'.$row, number_format( ( ( ($proc_udra_com*100)/$celda->CENTRO_POBLADO) ),2,'.','') ); 
				}else{
					$sheet7->setCellValue('X'.$row, 0); 
					$sheet7->setCellValue('Y'.$row, 0); 
				}
				//DIGITACION **********************************************************************
				if ( is_numeric($proc_dig_pes) ){
					$sheet7->setCellValue('Z'.$row, $proc_dig_pes); 
					$sheet7->setCellValue('AA'.$row, number_format( ( ( ($proc_dig_pes*100)/$celda->PESCADOR) ),2,'.','') ); 
				}else{
					$sheet7->setCellValue('Z'.$row, 0); 
					$sheet7->setCellValue('AA'.$row, 0); 
				}
				if ( is_numeric($proc_dig_acui) ){
					$sheet7->setCellValue('AB'.$row, $proc_dig_acui); 
					$sheet7->setCellValue('AC'.$row, number_format( ( ( ($proc_dig_acui*100)/$celda->ACUICULTOR) ),2,'.','') ); 
				}else{
					$sheet7->setCellValue('AB'.$row, 0); 
					$sheet7->setCellValue('AC'.$row, 0); 
				}
				if ( is_numeric($proc_dig_com ) ){
					$sheet7->setCellValue('AD'.$row, $proc_dig_com); 
					$sheet7->setCellValue('AE'.$row, number_format( ( ( ($proc_dig_com*100)/$celda->CENTRO_POBLADO) ),2,'.','') ); 
				}else{
					$sheet7->setCellValue('AD'.$row, 0); 
					$sheet7->setCellValue('AE'.$row, 0); 
				}
				//RESULTADO DIGITACION
				if ( is_numeric($proc_dig_completo_pes) ){ // pescador completo
					$sheet7->setCellValue('AF'.$row, $proc_dig_completo_pes); 
				}else{
					$sheet7->setCellValue('AF'.$row, 0); 
				}
				if ( is_numeric($proc_dig_incompleto_pes) ){ // pescador incompleto
					$sheet7->setCellValue('AG'.$row, $proc_dig_incompleto_pes); 
				}else{
					$sheet7->setCellValue('AG'.$row, 0); 
				}
				if ( is_numeric($proc_dig_rechazo_pes) ){ // pescador rechazo
					$sheet7->setCellValue('AH'.$row, $proc_dig_rechazo_pes); 
				}else{
					$sheet7->setCellValue('AH'.$row, 0); 
				}
				if ( is_numeric($proc_dig_otro_pes) ){ // pescador otro
					$sheet7->setCellValue('AI'.$row, $proc_dig_otro_pes); 
				}else{
					$sheet7->setCellValue('AI'.$row, 0); 
				}
				if ( $proc_dig_pes>0) { // pescador tasa de no respuesta
					$sheet7->setCellValue('AJ'.$row,  number_format( (($proc_dig_otro_pes + $proc_dig_rechazo_pes)*100)/$proc_dig_pes,2,'.','') ); 
				} else {
					$sheet7->setCellValue('AJ'.$row, 0); 
				}
				if ( is_numeric($proc_dig_completo_acui) ){ 		// ACUICULTOR completo
					$sheet7->setCellValue('AK'.$row, $proc_dig_completo_acui); 
				}else{
					$sheet7->setCellValue('AK'.$row, 0); 
				}
				if ( is_numeric($proc_dig_incompleto_acui) ){ 	// ACUICULTOR incompleto
					$sheet7->setCellValue('AL'.$row, $proc_dig_incompleto_acui); 
				}else{
					$sheet7->setCellValue('AL'.$row, 0); 
				}
				if ( is_numeric($proc_dig_rechazo_acui) ){ 		// ACUICULTOR rechazo
					$sheet7->setCellValue('AM'.$row, $proc_dig_rechazo_acui); 
				}else{
					$sheet7->setCellValue('AM'.$row, 0); 
				}
				if ( is_numeric($proc_dig_otro_acui) ){ 			// ACUICULTOR otro
					$sheet7->setCellValue('AN'.$row, $proc_dig_otro_acui); 
				}else{
					$sheet7->setCellValue('AN'.$row, 0); 
				}
				if ( $proc_dig_acui>0) { 						// ACUICULTOR tasa de no respuesta
					$sheet7->setCellValue('AO'.$row,  number_format( (($proc_dig_rechazo_acui + $proc_dig_otro_acui)*100)/$proc_dig_acui,2,'.','') ); 
				} else {
					$sheet7->setCellValue('AO'.$row, 0); 
				}
				if ( is_numeric($proc_dig_completo_com) ){ 	// COMUNIDAD completo
					$sheet7->setCellValue('AP'.$row, $proc_dig_completo_com); 
				}else{
					$sheet7->setCellValue('AP'.$row, 0); 
				}
				if ( is_numeric($proc_dig_incompleto_com) ){ 	// COMUNIDAD incompleto
					$sheet7->setCellValue('AQ'.$row, $proc_dig_incompleto_com); 
				}else{
					$sheet7->setCellValue('AQ'.$row, 0); 
				}
				if ( is_numeric($proc_dig_rechazo_com) ){ 		// COMUNIDAD rechazo
					$sheet7->setCellValue('AR'.$row, $proc_dig_rechazo_com); 
				}else{
					$sheet7->setCellValue('AR'.$row, 0); 
				}
				if ( is_numeric($proc_dig_otro_com) ){ 		// COMUNIDAD otro
					$sheet7->setCellValue('AS'.$row, $proc_dig_otro_com); 
				}else{
					$sheet7->setCellValue('AS'.$row, 0); 
				}
				if ( $proc_dig_com>0) { 						// COMUNIDAD tasa de no respuesta
					$sheet7->setCellValue('AT'.$row,  number_format( (($proc_dig_rechazo_com + $proc_dig_otro_com)*100)/$proc_dig_com,2,'.','') ); 
				} else {
					$sheet7->setCellValue('AT'.$row, 0); 
				}

				$proc_ccpp_no_cob = null;
				$proc_trab = null;
				$proc_trab_pes = null;
				$proc_trab_acui = null;
				$proc_trab_pes_totales 	= null;
				$proc_trab_acui_totales  = null;
				$proc_trab_com_totales   = null;
				$proc_udra_pes = null;
				$proc_udra_acui = null;
				$proc_udra_com = null;		
				$proc_dig_pes = null;
				$proc_dig_acui = null;
				$proc_dig_com = null;						
				$proc_dig_completo_pes = NULL;
				$proc_dig_incompleto_pes = NULL;
				$proc_dig_rechazo_pes = NULL;
				$proc_dig_otro_pes = NULL;
				$proc_dig_completo_acui = NULL;
				$proc_dig_incompleto_acui = NULL;
				$proc_dig_rechazo_acui = NULL;		
				$proc_dig_otro_acui = NULL;		
				$proc_dig_completo_com = NULL;
				$proc_dig_incompleto_com = NULL;
				$proc_dig_rechazo_com = NULL;		
				$proc_dig_otro_com = NULL;	

			}
			$sheet7->getStyle("A".($cab+3).":BI".($cab+3))->getFont()->setname('Arial black')->setSize(13);// FORMATO negro al total
			//$sheet7->getStyle("Q".($cab+3).":Q".$total)->getFont()->setname('Arial black')->setSize(14);// FORMATO negro al total
			$sheet7->getStyle('A1')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);	//opcional 

 		// CUERPO

	/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
	///////////  H O J A   7 ////////////////////////////////////////////////////////////////////////////////////////////////////////
	/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////




		// SALIDA EXCEL
			//$objPHPExcel->getActiveSheet()->setCellValueExplicitByColumnAndRow($numColum,$numRow,$products[$i][$colName], PHPExcel_Cell_DataType::TYPE_STRING);
			// Propiedades del archivo excel
				$sheet->setTitle("Reporte-Registro");
				$sheet2->setTitle("Reporte-Pescador");
				$sheet3->setTitle("Reporte-Acuicultor");
				$sheet4->setTitle("Reporte-Comunidades");
				$sheet5->setTitle("Reporte-Avance-trabajo-campo");
				$sheet6->setTitle("Reporte-Avance-PRODUCE");
				$sheet7->setTitle("PROCESOS");
				$this->phpexcel->getProperties()
				->setTitle("Reporte de Avance de campo")
				->setDescription("Reporte de Avance de campo");

			header("Content-Type: application/vnd.ms-excel");
			$nombreArchivo = 'ReporteAvanceCampo_'.date('YmdHis');
			header("Content-Disposition: attachment; filename=\"$nombreArchivo.xls\""); //EXCEL
			header("Cache-Control: max-age=0");
			
			// Genera Excel
			$writer = PHPExcel_IOFactory::createWriter($this->phpexcel, "Excel5");
			//$writer = new PHPExcel_Writer_Excel2007($this->phpexcel);

			$writer->save('php://output');
			exit;
		// SALIDA EXCEL

 	}


	function to_excel(){
		$this->load->helper('excel');
        $query = $this->avance_campo_subrutas_model->get_all_export();
        to_excel($query, 'Avance_empadronador');
	}

	function to_excel2(){

		//$filtros = $this->segmentacion_model->get_empadronador($sede, $dep, $equi, $ruta);    	
		$registros = $this->avance_campo_subrutas_model->get_all_export();   	
 
		// pestaña
		$sheet = $this->phpexcel->getActiveSheet(0);
		
	    // CUERPO

			// EXPORTACION A EXCEL
			$row = 2;
			$col = 1;

			 foreach($registros->result() as $filas){
			    
				foreach($filas as $celdas){ // llena cada celda
			  		$sheet->getCellByColumnAndRow($col++, $row)->setValue($celdas);
				}
				$col = 1;
				$row ++;
			}

 		// CUERPO

		// SALIDA EXCEL
			//$objPHPExcel->getActiveSheet()->setCellValueExplicitByColumnAndRow($numColum,$numRow,$products[$i][$colName], PHPExcel_Cell_DataType::TYPE_STRING);
			// Propiedades del archivo excel
				$sheet->setTitle("empadronador");
				$this->phpexcel->getProperties()
				->setTitle("Avance")
				->setDescription("Avance empadronador");

			header("Content-Type: application/vnd.ms-excel");
			$nombreArchivo = 'Avance_Empadronador_'.date('YmdHis');
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




/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */