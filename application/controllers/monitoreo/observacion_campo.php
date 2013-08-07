<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class observacion_campo extends CI_Controller {


	function __construct()
	{
		parent::__construct();
		$this->output->nocache();
		$this->load->library('form_validation');
		$this->load->library('security');
		$this->load->library('tank_auth');
		$this->lang->load('tank_auth');		
		$this->load->library('PHPExcel');		

		//User is logged in
		if (!$this->tank_auth->is_logged_in()) {
			redirect('/auth/login/');
		}

		//Check user privileges 
		$roles = $this->tank_auth->get_roles();
		$flag = FALSE;
		foreach ($roles as $role) {
			if($role->role_id == 8 && $role->rolename == 'Monitoreo de campo'){
				$flag = TRUE;
				break;
			}
		}

		//If not author is the maintenance guy!
		if (!$flag) {
			show_404();
			die();
		}

		$this->load->model('pesca_piloto_model');	
		$this->load->model('ubigeo_model');	
		$this->load->model('marco_model');	
		$this->load->model('observacion_campo_model');	
		$this->load->model('ccpp_model');	

	}


	public function index()
	{
			$data['nav'] = TRUE;
			//regular
			//$data['departamentos'] = $this->ubigeo_piloto_model->get_dptos();
			$data['title'] = 'Observacion de Campo';

			//cabecera
			foreach ($this->marco_model->get_odei($this->tank_auth->get_ubigeo())->result() as $key ) {
				$odei[] = $key->ODEI_COD;
			}
			$data['departamento'] = $this->marco_model->get_dpto_by_odei($odei); 
			
			$data['cargos'] =  array(	-1 => '-',
										 1 => 'COORDINADOR DEPARTAMENTAL',
										 2 => 'SUPERVISOR NACIONAL',
										 3 => 'JEFE DE BRIGADA' );
			$data['option'] = 2;
			$data['reporte'] = $this->tank_auth->get_ubigeo();
			$data['tables'] = $this->observacion_campo_model->get_todo($odei);
			$data['main_content'] = 'monitoreo/observacion_campo_view';
	        $this->load->view('backend/includes/template', $data);

	}

	public function grabar()
	{
		$is_ajax = $this->input->post('ajax');
		if($is_ajax){

				$od = $this->marco_model->get_odei_by_sede_dep($this->tank_auth->get_ubigeo(),$this->input->post('CCDD'));
			
				$ODEI_COD = $od->row('ODEI_COD');
				$NOM_ODEI = $od->row('NOM_ODEI');
				$NOM_SEDE= $od->row('NOM_SEDE');

				$CCDD = $this->input->post('CCDD');
				$CCPP = $this->input->post('CCPP');
				$CCDI = $this->input->post('CCDI');
				$COD_CCPP = $this->input->post('COD_CCPP');

				$registro = array(	
					'SEDE_COD'	=> $this->tank_auth->get_ubigeo(),
					'NOM_SEDE'	=> $NOM_SEDE,				
					'ODEI_COD'	=> $ODEI_COD,
					'NOM_ODEI'	=> $NOM_ODEI,					
					'CCDD' => $CCDD,
					'NOM_DD' => $this->input->post('NOM_DD'),
					'CCPP'=> $CCPP,
					'NOM_PP' => $this->input->post('NOM_PP'),
					'CCDI'=> $CCDI,
					'NOM_DI' => $this->input->post('NOM_DI'),
					'COD_CCPP'=> $COD_CCPP,
					'NOM_CCPP'=> $this->input->post('NOM_CCPP'),
		            'F_D' => $this->input->post('F_D'),
					'F_M' => $this->input->post('F_M'),
					'NOM' => $this->input->post('NOM'),
					'CARGO' => $this->input->post('CARGO'),
					'F_PES' => $this->input->post('F_PES'),
					'F_ACU' => $this->input->post('F_ACU'),
					'F_COM' => $this->input->post('F_COM'),
					'SEC' => $this->input->post('SECC'),
					'PREG_N' => $this->input->post('PREG_N'),
					'E_CONC' => $this->input->post('E_CONC'),
					'E_DILIG' => $this->input->post('E_DILIG'),
					'E_PREG' => $this->input->post('E_PREG'),
					'E_SOND' => $this->input->post('E_SOND'),
					'E_OMI' => $this->input->post('E_OMI'),
					'DES_E' => $this->input->post('DES_E'),
					'activo'=>1,
					'user_id'=>$this->tank_auth->get_user_id(),
					'created'=> date('Y-m-d H:i:s'),
					'last_ip' => $this->input->ip_address(),
					'user_agent' => $this->agent->agent_string(),
					);
				$revision = $this->observacion_campo_model->consulta_ccpp($CCDD,$CCPP,$CCDI,$COD_CCPP);

			if ($this->tank_auth->get_ubigeo()<99) {

				if ($od->num_rows() == 1){
					
					//if($revision >= 1){
						//$datos['operacion'] = 0; // ya existe el centro poblado
					//}else{
						$filas = $this->observacion_campo_model->insertar($registro);
						if ($filas ==1) {
							$datos['operacion'] = 1;	// guardado exitosamente				
						}else {
							$datos['operacion'] = 8; // no se guardo		
						}
					//}
				}else {
					$datos['operacion'] = 7; // ODEI en doble ubigeo
				}

			}else{
					$datos['operacion'] = 99; //no usuario piloto
			}	

			// $datos['secciones'] = $udra;	
			$data['datos'] = $datos;
			$this->load->view('backend/json/json_view', $data);		
			//redirect('digitacion/revision');

		}else{
			show_404();;
		}
	}

	 function secciones($form)
	{
		if ($form == 1){
			$datos['secciones'] = range(1,9);
		}else if ($form == 2) {
			$datos['secciones'] = range(1,10);
		}else if ($form == 3) {
			$datos['secciones'] = range(1,8);
		}
		$data['datos'] = $datos;
		$this->load->view('backend/json/json_view', $data);	
	}

	 function preguntas()
	{
		$d = $this->input->post('seccion');
		$form = substr($d, 0,1);
		if (strlen($d) == 2) { $seccion = substr($d,1,2); } else{ $seccion = substr($d,1,3);  };

		if ($form == 1){// pescador
			if ($seccion == 1) { $datos['preguntas'] = range(1,4); } 
			else if ($seccion == 2) { $datos['preguntas'] = range(1,8); 
									  array_push($datos['preguntas'], 9.1, 9.2, 9.3, 9.4, 9.5);
									  array_push($datos['preguntas'], 10,11,12,13,14,15,16,17,18,19,20,21,22);
									  array_push($datos['preguntas'],23.1, 23.2, 23.3, 23.4, 23.5, 23.6, 23.7, 23.8, 23.9, '23.10');
			} 
			else if ($seccion == 3) { $datos['preguntas'] = range(1,11); } 
			else if ($seccion == 4) { $datos['preguntas'] = range(1,6); } 
			else if ($seccion == 5) { $datos['preguntas'] = range(1,10); } 
			else if ($seccion == 6) { $datos['preguntas'] = range(1,6); } 
			else if ($seccion == 7) { $datos['preguntas'] = range(1,10); } 
			else if ($seccion == 8) { $datos['preguntas'] = range(1,6); } 
			else if ($seccion == 9) { $datos['preguntas'] = range(1,9) ;
									  array_push($datos['preguntas'], 10.1, 10.2, 10.3 );
									  array_push($datos['preguntas'], 11,12,13,14,15,16,17,18,19,20,21);
									  array_push($datos['preguntas'], 22.1, 22.2, 22.3,23);
			} 
		}else if ($form == 2) {//acuicultor
			if ($seccion == 1) { $datos['preguntas'] = range(1,4); } 
			else if ($seccion == 2) { $datos['preguntas'] = range(1,9); 
									  array_push($datos['preguntas'], 10.1, 10.2, 10.3, 10.4, 10.5 );
									  array_push($datos['preguntas'], 11,12,13,14,15,16,17,18,19,20,21,22,23);
									  array_push($datos['preguntas'], 24.1, 24.2, 24.3, 24.4, 24.5, 24.6, 24.7, 24.8, 24.9, 24.10, 24.11);
			} 
			else if ($seccion == 3) { $datos['preguntas'] = range(1,11); } 
			else if ($seccion == 4) { $datos['preguntas'] = range(1,3); } 
			else if ($seccion == 5) { $datos['preguntas'] = range(1,17); } 
			else if ($seccion == 6) { $datos['preguntas'] = range(1,2); } 
			else if ($seccion == 7) { $datos['preguntas'] = range(1,4); } 
			else if ($seccion == 8) { $datos['preguntas'] = range(1,15); } 
			else if ($seccion == 9) { $datos['preguntas'] = range(1,6); } 
			else if ($seccion == 10) { $datos['preguntas'] = range(1,11); } 
		}else if ($form == 3) {//comunidad
			if ($seccion == 1) { $datos['preguntas'] = range(1,4); } 
			else if ($seccion == 2) { $datos['preguntas'] = range(1,10); } 
			else if ($seccion == 3) { $datos['preguntas'] = range(1,22); } 
			else if ($seccion == 4) { $datos['preguntas'] = range(1,3); } 
			else if ($seccion == 5) { $datos['preguntas'] = range(1,3); } 
			else if ($seccion == 6) { $datos['preguntas'] = range(1,4); } 
			else if ($seccion == 7) { $datos['preguntas'] = range(1,16); } 
			else if ($seccion == 8) { $datos['preguntas'] = range(1,4); } 
		}
		$data['datos'] = $datos;
		$this->load->view('backend/json/json_view', $data);	
	}


	function get_todo(){
			//$data['nav'] = TRUE;
		//cabecera
		foreach ($this->marco_model->get_odei($this->tank_auth->get_ubigeo())->result() as $key ) {
			$odei[] = $key->ODEI_COD;
		}
		
		//regular
		$data['tables'] = $this->observacion_campo_model->get_todo($odei);
		$data['main_content'] = 'monitoreo/observacion_campo_tabla_view';
        $this->load->view('backend/includes/template', $data);

	}


    public function export(){

		foreach ($this->marco_model->get_odei($this->tank_auth->get_ubigeo())->result() as $key ) {
			$odei[] = $key->ODEI_COD;
		}
		$registros = $this->observacion_campo_model->get_todo($odei);    	

		// pestaña
		$sheet = $this->phpexcel->getActiveSheet(0);
		

		// ANCHO Y ALTURA DE COLUMNAS DEL FILE
			$sheet->getColumnDimension('A')->setWidth(10);
			$sheet->getColumnDimension('B')->setWidth(25);
			$sheet->getColumnDimension('D')->setWidth(25);
			$sheet->getColumnDimension('F')->setWidth(25);
			$sheet->getColumnDimension('H')->setWidth(25);
			$sheet->getColumnDimension('K')->setWidth(15);
			$sheet->getColumnDimension('J')->setWidth(25);
			$sheet->getColumnDimension('L')->setWidth(35);
			$sheet->getColumnDimension('O')->setWidth(35);
			$sheet->getColumnDimension('Q')->setWidth(15);
			$sheet->getColumnDimension('R')->setWidth(15);
			$sheet->getColumnDimension('S')->setWidth(15);
			$sheet->getColumnDimension('V')->setWidth(12);
			$sheet->getColumnDimension('W')->setWidth(12);
			$sheet->getColumnDimension('X')->setWidth(12);
			$sheet->getColumnDimension('Y')->setWidth(12);
			$sheet->getColumnDimension('Z')->setWidth(12);
			$sheet->getColumnDimension('AA')->setWidth(50);
			$sheet->getRowDimension(6)->setRowHeight(20);
		// ANCHO Y ALTURA DE COLUMNAS DEL FILE

		// TITULOS
			$sheet->setCellValue('A2','INSTITUTO NACIONAL DE ESTADÍSTICA E INFORMATICA');
			$sheet->mergeCells('A2:AA2');
			$sheet->setCellValue('A3','PRIMER CENSO NACIONAL DE PESCA CONTINENTAL' );
			$sheet->mergeCells('A3:AA3');
			$sheet->setCellValue('A4','REPORTE DE OBSERVACIÓN EN CAMPO ' );
			$sheet->mergeCells('A4:AA4');
			$sheet->getStyle('A2:AA4')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);	
			$sheet->getStyle('A2:AA4')->getFont()->getColor()->setARGB(PHPExcel_Style_Color::COLOR_BLACK);
			$sheet->getStyle('A2:AA2')->getFont()->setname('Arial black')->setSize(16);	
			$sheet->getStyle('A3:AA4')->getFont()->setname('Arial')->setSize(16);	

			// LOGO
	          $objDrawing = new PHPExcel_Worksheet_Drawing();
	          $objDrawing->setWorksheet($sheet);
	          $objDrawing->setName("inei");
	          $objDrawing->setDescription("Inei");
	          $objDrawing->setPath("img/inei.jpeg");
	          $objDrawing->setCoordinates('B1');
	          $objDrawing->setHeight(80);
	          $objDrawing->setOffsetX(1);
	          $objDrawing->setOffsetY(5);

	          $objDrawing2 = new PHPExcel_Worksheet_Drawing();
	          $objDrawing2->setWorksheet($sheet);
	          $objDrawing2->setName("produce");
	          $objDrawing2->setDescription("Produce");
	          $objDrawing2->setPath("img/produce.jpg");
	          $objDrawing2->setCoordinates('Y1');
	          $objDrawing2->setHeight(73);
	          $objDrawing2->setOffsetX(1);
	          $objDrawing2->setOffsetY(5);
		// TITULOS

		// CABECERA ESPECIAL
			/*$sheet->setCellValue('P5','COMUNIDADES');
			$sheet->mergeCells('P5:S5');
			$sheet->setCellValue('T5','PESCADOR ' );
			$sheet->mergeCells('T5:X5');
			$sheet->setCellValue('Y5','ACUICULTOR ' );
			$sheet->mergeCells('Y5:AC5');
			$sheet->getStyle('A5:AC5')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);	
			$sheet->getStyle('A5:AC5')->getFont()->getColor()->setARGB(PHPExcel_Style_Color::COLOR_BLACK);
			$sheet->getStyle('A5:AC5')->getFont()->setname('Arial')->setSize(13);	
			$sheet->getStyle("P5:AC5")->applyFromArray(array(
			'borders' => array(
						'allborders' => array(
										'style' => PHPExcel_Style_Border::BORDER_THIN)
					)
			));*/
		// CABECERA ESPECIAL

		// CABECERA
			// INICIO DE LA  cabecera
			$cab = 6;	
				
			// NOMBRE CABECERAS
					$sheet->setCellValue('A'.$cab,'COD');
					$sheet->setCellValue('B'.$cab,'SEDE');
					$sheet->setCellValue('C'.$cab,'COD' );
					$sheet->setCellValue('D'.$cab,'ODEI' );
					$sheet->setCellValue('E'.$cab,'CCDD' );
					$sheet->setCellValue('F'.$cab,'DEPARTAMENTO' );
					$sheet->setCellValue('G'.$cab,'CCPP' );
					$sheet->setCellValue('H'.$cab,'PROVINCIA' );
					$sheet->setCellValue('I'.$cab,'CCDI' );
					$sheet->setCellValue('J'.$cab,'DISTRITO' );
					$sheet->setCellValue('K'.$cab,'COD_CCPP' );
					$sheet->setCellValue('L'.$cab,'CENTRO POBLADO' );
					$sheet->setCellValue('M'.$cab,'DIA ' );
					$sheet->setCellValue('N'.$cab, 'MES' );
					$sheet->setCellValue('O'.$cab, 'NOMBRES Y APELLIDOS' );
					$sheet->setCellValue('P'.$cab, 'CARGO' );
					$sheet->setCellValue('Q'.$cab, 'N. F. PESC.' );
					$sheet->setCellValue('R'.$cab, 'N. F. ACUI.' );
					$sheet->setCellValue('S'.$cab, 'N. F. COMU.' );
					$sheet->setCellValue('T'.$cab, 'SECC.' );
					$sheet->setCellValue('U'.$cab, 'PREG.' );
					$sheet->setCellValue('V'.$cab, 'E_CONC.' );
					$sheet->setCellValue('W'.$cab, 'E_DILIG.' );
					$sheet->setCellValue('X'.$cab,'E_PREG');
					$sheet->setCellValue('Y'.$cab,' E_SOND');
					$sheet->setCellValue('Z'.$cab,' E_OMI.');
					$sheet->setCellValue('AA'.$cab,' DESCRIPCIÓN DEL ERROR');
			// NOMBRE CABECERAS

			// ESTILOS  CABECERAS
				$sheet->getStyle("A".$cab.":AA".$cab)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);	
				$sheet->getStyle("A".$cab.":AA".$cab)->getFont()->getColor()->setARGB(PHPExcel_Style_Color::COLOR_RED);
				$sheet->getStyle("A".$cab.":AA".$cab)->getFont()->setname('Arial')->setSize(11);
		     	$headStyle = $this->phpexcel->getActiveSheet()->getStyle("A".$cab.":AA".$cab);
		        $headStyle->getFill()->setFillType(PHPExcel_Style_Fill::FILL_SOLID)->getStartColor()->setARGB('#FF9900');

				$sheet->getStyle("A".$cab.":AA".$cab)->applyFromArray(array(
				'borders' => array(
							'allborders' => array(
											'style' => PHPExcel_Style_Border::BORDER_THIN)
						)
				));
			// ESTILOS  CABECERAS
		// CABECERA

	    // CUERPO
			$total = $registros->num_rows()+ $cab;
			$numberStyle1 = $this->phpexcel->getActiveSheet(0)->getStyle('A3:A'.$total);
			$numberStyle1->getNumberFormat()->setFormatCode('00');

			$numberStyle2 = $this->phpexcel->getActiveSheet(0)->getStyle('C3:C'.$total);
			$numberStyle2->getNumberFormat()->setFormatCode('00');

			$numberStyle2 = $this->phpexcel->getActiveSheet(0)->getStyle('E3:E'.$total);
			$numberStyle2->getNumberFormat()->setFormatCode('00');

			$numberStyle3 = $this->phpexcel->getActiveSheet(0)->getStyle('G3:G'.$total);
			$numberStyle3->getNumberFormat()->setFormatCode('00');		

			$numberStyle4 = $this->phpexcel->getActiveSheet(0)->getStyle('I3:I'.$total);
			$numberStyle4->getNumberFormat()->setFormatCode('00');

			$numberStyle2 = $this->phpexcel->getActiveSheet(0)->getStyle('K3:K'.$total);
			$numberStyle2->getNumberFormat()->setFormatCode('0000');

			$numberStyle3 = $this->phpexcel->getActiveSheet(0)->getStyle('M3:M'.$total);
			$numberStyle3->getNumberFormat()->setFormatCode('00');	

			$numberStyle3 = $this->phpexcel->getActiveSheet(0)->getStyle('N3:N'.$total);
			$numberStyle3->getNumberFormat()->setFormatCode('00');	

			//bordes cuerpo
			$sheet->getStyle("A".($cab+1).":AA".$total)->applyFromArray(array(
			'borders' => array(
						'allborders' => array(
										'style' => PHPExcel_Style_Border::BORDER_THIN)
					)
			));

			// EXPORTACION A EXCEL
	 			
			$row = $cab;
			$col = 0;
			 foreach($registros->result() as $filas){
			    $row ++;
				 foreach($filas as $cols){
			  		$sheet->getCellByColumnAndRow($col++, $row)->setValue($cols);
				 }
				 $col =0;
			}
 		// CUERPO

		// SALIDA EXCEL
			//$objPHPExcel->getActiveSheet()->setCellValueExplicitByColumnAndRow($numColum,$numRow,$products[$i][$colName], PHPExcel_Cell_DataType::TYPE_STRING);

			// Propiedades del archivo excel
				$sheet->setTitle("Observación en campo");
				$this->phpexcel->getProperties()
				->setTitle("Observación en campo")
				->setDescription("Observación en campo");

			header("Content-Type: application/vnd.ms-excel");
			$nombreArchivo = 'ObservacionCampo_'.date('YmdHis');
			header("Content-Disposition: attachment; filename=\"$nombreArchivo.xls\"");
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