<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Consulta extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		$this->output->nocache();
		$this->load->library('form_validation');
		$this->load->library('security');
		$this->load->library('tank_auth');
		$this->lang->load('tank_auth');	
		$this->load->model('ubigeo_model');
		$this->load->model('marco_model');	
		$this->load->model('segmentacion_model');	
		$this->load->library('PHPExcel');			
	}

	public function index($tipo = null)
	{
			//$data['nav'] = TRUE;
			//$data['onload'] = 'init()';
			//$data['fluid'] = TRUE;
			$data['title'] = 'Rutas y Segmentación';
			$data['nofoot'] = TRUE;	
			$data['contclass'] = 'map_container';	
			foreach ($this->marco_model->get_odei($this->tank_auth->get_ubigeo())->result() as $key ) {
				$odei[] = $key->ODEI_COD;
			}			
			$data['sede'] = $this->marco_model->get_sede_by_cod($odei); 
			//$data['sede'] = $this->marco_model->get_sede(); 
			$data['dptos'] = $this->ubigeo_model->get_dptos();
			
			if (is_null($tipo)){
				$data['main_content'] = 'segmentacion/consulta_view';
			}else{
				$data['main_content'] = 'segmentacion/empadronador_view';
			}
			//$data['main_content'] = 'segmentacion/leaf_view';
	        $this->load->view('backend/includes/template', $data);
	        //$this->load->view('segmentacion/openlayers_view', $data);
	}

    public function export_emp($sede, $dep, $equi, $ruta){

    	//colores
    		//$color_celda_cabeceras = '27408B';

			$color_celda_cabeceras =   array(
				        'fill' => array(
				            'type' => PHPExcel_Style_Fill::FILL_SOLID,
				            'color' => array('rgb' => '27408B')
				        )
				    );    		
    	//colores

		$filtros = $this->segmentacion_model->get_empadronador($sede, $dep, $equi, $ruta);    	
		$registros = $this->segmentacion_model->get_all_empadronador($sede, $dep, $equi, $ruta);    	
		if ($registros->num_rows() === 0 ){
			$this->session->set_flashdata('msgbox',1);
			redirect('/segmentacion/consulta/index/1');			
		}   
		// pestaña
		$sheet = $this->phpexcel->getActiveSheet(0);
		
		// formato de la hoja
			// Set Orientation, size and scaling
			//$objPHPExcel->setActiveSheetIndex(0);
			$sheet->getPageSetup()->setOrientation(PHPExcel_Worksheet_PageSetup::ORIENTATION_LANDSCAPE);// horizontal
			//$sheet->getPageSetup()->setOrientation(PHPExcel_Worksheet_PageSetup::ORIENTATION_PORTRAIT); // vertical
			$sheet->getPageSetup()->setPaperSize(PHPExcel_Worksheet_PageSetup::PAPERSIZE_A3);
			$sheet->getPageSetup()->setFitToPage(false); // ajustar pagina
			$sheet->getPageSetup()->setFitToWidth(1);
			$sheet->getPageSetup()->setFitToHeight(0);		
			$sheet->setShowGridlines(false);// oculta lineas de cuadricula		
		// formato de la hoja

		// ANCHO Y ALTURA DE COLUMNAS DEL FILE
			$sheet->getColumnDimension('A')->setWidth(1);
			$sheet->getColumnDimension('B')->setWidth(4);
			$sheet->getColumnDimension('C')->setWidth(20);
			$sheet->getColumnDimension('D')->setWidth(20);
			$sheet->getColumnDimension('E')->setWidth(20);
			$sheet->getColumnDimension('F')->setWidth(20);
			$sheet->getColumnDimension('G')->setWidth(7);
			$sheet->getColumnDimension('H')->setWidth(7);
			$sheet->getColumnDimension('J')->setWidth(7);
			$sheet->getColumnDimension('K')->setWidth(7);
			$sheet->getColumnDimension('L')->setWidth(5);
			$sheet->getColumnDimension('M')->setWidth(5);
			$sheet->getColumnDimension('N')->setWidth(5);
			$sheet->getColumnDimension('O')->setWidth(5);
			$sheet->getColumnDimension('P')->setWidth(5);
			$sheet->getColumnDimension('Q')->setWidth(7);
			$sheet->getColumnDimension('R')->setWidth(7);
			$sheet->getColumnDimension('S')->setWidth(7);
			$sheet->getColumnDimension('T')->setWidth(9);
			$sheet->getColumnDimension('U')->setWidth(9);
			$sheet->getColumnDimension('V')->setWidth(9);
			$sheet->getColumnDimension('W')->setWidth(9);
			$sheet->getColumnDimension('X')->setWidth(9);
			$sheet->getColumnDimension('Y')->setWidth(5);
			$sheet->getColumnDimension('Z')->setWidth(5);
			$sheet->getColumnDimension('AA')->setWidth(5);
			$sheet->getColumnDimension('AB')->setWidth(5);
			$sheet->getColumnDimension('AC')->setWidth(5);
			$sheet->getColumnDimension('AD')->setWidth(5);
			$sheet->getColumnDimension('AE')->setWidth(5);
			$sheet->getColumnDimension('AF')->setWidth(5);
			$sheet->getColumnDimension('AG')->setWidth(5);
			$sheet->getColumnDimension('AH')->setWidth(5);
			$sheet->getColumnDimension('AI')->setWidth(5);
			$sheet->getColumnDimension('AJ')->setWidth(5);
			$sheet->getColumnDimension('AK')->setWidth(5);
			$sheet->getColumnDimension('AL')->setWidth(5);
			$sheet->getColumnDimension('AM')->setWidth(5);
			$sheet->getColumnDimension('AN')->setWidth(5);
			$sheet->getColumnDimension('AO')->setWidth(5);
			$sheet->getColumnDimension('AP')->setWidth(5);			
			$sheet->getColumnDimension('AQ')->setWidth(5);
			$sheet->getColumnDimension('AR')->setWidth(5);
			$sheet->getColumnDimension('AS')->setWidth(5);
			$sheet->getColumnDimension('AT')->setWidth(5);
			$sheet->getColumnDimension('AU')->setWidth(5);

			$sheet->getRowDimension(4)->setRowHeight(2);
			$sheet->getRowDimension(6)->setRowHeight(2);
			$sheet->getRowDimension(17)->setRowHeight(130);
		// ANCHO Y ALTURA DE COLUMNAS DEL FILE

		// TITULOS
			$sheet->setCellValue('A3','INSTITUTO NACIONAL DE ESTADÍSTICA E INFORMATICA');
			$sheet->mergeCells('A3:AU3');
			$sheet->setCellValue('A5','PRIMER CENSO NACIONAL DE PESCA CONTINENTAL' );
			$sheet->mergeCells('A5:AU5');
			$sheet->setCellValue('A7','PROGRAMACION DE RUTAS DEL EMPADRONADOR' );
			$sheet->mergeCells('A7:AU7');
			$sheet->getStyle('A3:AU7')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);	
			$sheet->getStyle('A3:AU7')->getFont()->getColor()->setARGB(PHPExcel_Style_Color::COLOR_BLACK);
			$sheet->getStyle('A3:AU3')->getFont()->setname('Arial black')->setSize(18);	
			$sheet->getStyle('A5:AU7')->getFont()->setname('Arial')->setSize(18);	

			// LOGO
	          $objDrawing = new PHPExcel_Worksheet_Drawing();
	          $objDrawing->setWorksheet($sheet);
	          $objDrawing->setName("inei");
	          $objDrawing->setDescription("Inei");
	          $objDrawing->setPath("img/inei.jpeg");
	          $objDrawing->setCoordinates('C2');
	          $objDrawing->setHeight(80);
	          $objDrawing->setOffsetX(1);
	          $objDrawing->setOffsetY(5);

	          $objDrawing2 = new PHPExcel_Worksheet_Drawing();
	          $objDrawing2->setWorksheet($sheet);
	          $objDrawing2->setName("CENPESCO");
	          $objDrawing2->setDescription("CENPESCO");
	          $objDrawing2->setPath("img/cenpesco.jpg");
	          $objDrawing2->setCoordinates('AQ2');
	          $objDrawing2->setHeight(100);
	          $objDrawing2->setWidth(100);
	          $objDrawing2->setOffsetX(1);
	          $objDrawing2->setOffsetY(10);
		// TITULOS

		// CABECERA ESPECIAL
					$sheet->setCellValue('B9','SEDE OPERATIVA:');
					$sheet->mergeCells('B9:C9');
					$sheet->setCellValue('B10','DEPARTAMENTO:');
					$sheet->mergeCells('B10:C10');
					$sheet->setCellValue('B11','EQUIPO - JEFE BRIGADA:');
					$sheet->mergeCells('B11:C11');
					$sheet->setCellValue('B12','RUTA - EMPADRONADOR:');
					$sheet->mergeCells('B12:C12');
					$sheet->setCellValue('D9',$filtros->row('SEDE_OPERATIVA'));
					$sheet->mergeCells('D9:E9');
					$sheet->setCellValue('D10',$filtros->row('DEPARTAMENTO_SEDE'));
					$sheet->mergeCells('D10:E10');
					$sheet->setCellValue('D11',$filtros->row('EQUIPO'));
					$sheet->mergeCells('D11:E11');
					$sheet->setCellValue('D12',$filtros->row('RUTA'));
					$sheet->mergeCells('D12:E12');

					$sheet->getStyle("D9:E12")->getAlignment()->setWrapText(true);// AJUSTA TEXTO A CELDA
			     	//$sheet->getStyle("B9:C12")->getFill()->setFillType(PHPExcel_Style_Fill::FILL_SOLID)->getStartColor()->setARGB('#FF9900');
			     	$sheet->getStyle("B9:C12")->applyFromArray($color_celda_cabeceras);
			     	$sheet->getStyle("D9:E12")->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);	
					$sheet->getStyle("B9:C12")->getFont()->getColor()->setARGB(PHPExcel_Style_Color::COLOR_WHITE);

					$sheet->getStyle("B9:E12")->applyFromArray(array(
					'borders' => array(
								'allborders' => array(
												'style' => PHPExcel_Style_Border::BORDER_THIN)
							)
					));
					$sheet->setCellValue('I10','NOMBRES Y APELLIDOS DEL COORDINADOR');
					$sheet->mergeCells('I10:S10');
			     	$sheet->getStyle('I10')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
					$sheet->getStyle('I10')->getFont()->getColor()->setARGB(PHPExcel_Style_Color::COLOR_WHITE);	
					$sheet->getStyle("I10")->applyFromArray($color_celda_cabeceras);	
													
					$sheet->mergeCells('I11:S11');
					$sheet->getStyle("I10:S11")->applyFromArray(array(
					'borders' => array(
								'allborders' => array(
												'style' => PHPExcel_Style_Border::BORDER_THIN)
							)
					));

					$sheet->setCellValue('U10','NOMBRES Y APELLIDOS DEL JEFE DE BRIGADA');
					$sheet->mergeCells('U10:AG10');
			     	$sheet->getStyle('U10')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
					$sheet->getStyle('U10')->getFont()->getColor()->setARGB(PHPExcel_Style_Color::COLOR_WHITE);	
					$sheet->getStyle("U10")->applyFromArray($color_celda_cabeceras);

					$sheet->mergeCells('U11:AG11');
					$sheet->getStyle("U10:AG11")->applyFromArray(array(
					'borders' => array(
								'allborders' => array(
												'style' => PHPExcel_Style_Border::BORDER_THIN)
							)
					));

					$sheet->setCellValue('AI10','NOMBRE Y APELLIDOS DEL EMPADRONADOR');
					$sheet->mergeCells('AI10:AU10');
					$sheet->setCellValue('AI11',$filtros->row('NOMBRE_Y_APELLIDOS_DEL_EMPADRONADOR'));
					$sheet->mergeCells('AI11:AU11');

			     	//$sheet->getStyle("Y10:AU10")->getFill()->setFillType(PHPExcel_Style_Fill::FILL_SOLID)->getStartColor()->setARGB('#FF9900');
			     	$sheet->getStyle("AI10:AU10")->applyFromArray($color_celda_cabeceras);
			     	
			     	$sheet->getStyle("AI10:AU10")->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
					$sheet->getStyle("AI10:AU10")->getFont()->getColor()->setARGB(PHPExcel_Style_Color::COLOR_WHITE);

					$sheet->getStyle("AI10:AU11")->applyFromArray(array(
					'borders' => array(
								'allborders' => array(
												'style' => PHPExcel_Style_Border::BORDER_THIN)
							)
					));


					$sheet->setCellValue('AQ13','FECHA BD');
					$sheet->mergeCells('AQ13:AU13');
					$sheet->getStyle('AQ13')->getFont()->getColor()->setARGB(PHPExcel_Style_Color::COLOR_WHITE);	
					$sheet->getStyle("AQ13")->applyFromArray($color_celda_cabeceras);

					$sheet->setCellValue('AQ14', $filtros->row('FECHA_UPDATE') );
					$sheet->getStyle('AQ14')->getNumberFormat()->setFormatCode('dd/mm/yyyy hh:mm:ss'); 
					$sheet->mergeCells('AQ14:AU14');
			     	$sheet->getStyle('AQ13:AQ14')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);					
					$sheet->getStyle("AQ13:AU14")->applyFromArray(array(
					'borders' => array(
								'allborders' => array(
												'style' => PHPExcel_Style_Border::BORDER_THIN)
							)
					));

					$sheet->getStyle('B9:AU12')->getFont()->setname('Arial')->setSize(12);	// TAMAÑO FUENTE CABECERAS
					$sheet->getStyle('B11:B12')->getFont()->setname('Arial')->setSize(10);	// TAMAÑO FUENTE  SOLO CABECERAS
		// CABECERA ESPECIAL

		// CABECERA
			// INICIO DE LA  cabecera
			$cab = 16;	
				
			// NOMBRE CABECERAS

					$sheet->setCellValue('B'.$cab,'N°');
					$sheet->mergeCells('B'.$cab.':B'.($cab+2));
					$sheet->setCellValue('C'.$cab,'Departamento' );
					$sheet->mergeCells('C'.$cab.':C'.($cab+2));

					$sheet->setCellValue('D'.$cab,'Provincia' );
					$sheet->mergeCells('D'.$cab.':D'.($cab+2));
					$sheet->setCellValue('E'.$cab,'Distrito' );
					$sheet->mergeCells('E'.$cab.':E'.($cab+2));
					$sheet->setCellValue('F'.$cab,'Centro Poblado' );
					$sheet->mergeCells('F'.$cab.':F'.($cab+2));
					$sheet->setCellValue('G'.$cab, 'Cod. Punto de Concentracion');
					$sheet->mergeCells('G'.$cab.':G'.($cab+2));	
					$sheet->setCellValue('H'.$cab,'Población Estimada' );
					$sheet->mergeCells('H'.$cab.':H'.($cab+2));
					$sheet->setCellValue('I'.$cab,'Tipo de Empadronamiento' );
					$sheet->mergeCells('I'.$cab.':I'.($cab+2));
					$sheet->setCellValue('J'.$cab,'Periodo de trabajo' );
					$sheet->mergeCells('J'.$cab.':K'.$cab);
						$sheet->setCellValue('J'.($cab+1),'Fecha Inicio' );
						$sheet->mergeCells('J'.($cab+1).':J'.($cab+2));
						$sheet->setCellValue('K'.($cab+1),'Fecha Final' );
						$sheet->mergeCells('K'.($cab+1).':K'.($cab+2));
					$sheet->setCellValue('L'.$cab,'Días de Operación de Campo' );
					$sheet->mergeCells('L'.$cab.':P'.$cab);
						$sheet->setCellValue('L'.($cab+1),'Traslado' );
						$sheet->mergeCells('L'.($cab+1).':L'.($cab+2));
						$sheet->setCellValue('M'.($cab+1),'Trabajo' );
						$sheet->mergeCells('M'.($cab+1).':M'.($cab+2));
						$sheet->setCellValue('N'.($cab+1),'Viaje Sede ODEI ' );
						$sheet->mergeCells('N'.($cab+1).':N'.($cab+2));
						$sheet->setCellValue('O'.($cab+1), 'Retroalimentaciòn' );
						$sheet->mergeCells('O'.($cab+1).':O'.($cab+2));
						$sheet->setCellValue('P'.($cab+1), 'TOTAL DE DIAS' );
						$sheet->mergeCells('P'.($cab+1).':P'.($cab+2));
					$sheet->setCellValue('Q'.$cab,'Monto Asignado' );
					$sheet->mergeCells('Q'.$cab.':S'.$cab);					
						$sheet->setCellValue('Q'.($cab+1), 'Mov. Local' );
						$sheet->mergeCells('Q'.($cab+1).':Q'.($cab+2));
						$sheet->setCellValue('R'.($cab+1), 'Pasaje Traslado' );
						$sheet->mergeCells('R'.($cab+1).':R'.($cab+2));
						$sheet->setCellValue('S'.($cab+1), 'Gasto operativo' );
						$sheet->mergeCells('S'.($cab+1).':S'.($cab+2));
					$sheet->setCellValue('T'.$cab,'Asignación de Fondos' );
					$sheet->mergeCells('T'.$cab.':X'.$cab);						
						$sheet->setCellValue('T'.($cab+1), 'Mov. Local' );
						$sheet->mergeCells('T'.($cab+1).':T'.($cab+2));
						$sheet->setCellValue('U'.($cab+1), 'Pasaje Traslado' );
						$sheet->mergeCells('U'.($cab+1).':U'.($cab+2));
						$sheet->setCellValue('V'.($cab+1), 'Gastos Operativos' );
						$sheet->mergeCells('V'.($cab+1).':V'.($cab+2));
						$sheet->setCellValue('W'.($cab+1), 'Pasaje' );
						$sheet->mergeCells('W'.($cab+1).':W'.($cab+2));
						$sheet->setCellValue('X'.($cab+1), 'TOTAL' );
						$sheet->mergeCells('X'.($cab+1).':X'.($cab+2));
					$sheet->setCellValue('Y'.$cab, 'Codigos de Centros Poblados Convocados');
					$sheet->mergeCells('Y16:AU17');
						$sheet->setCellValue('Y'.($cab+2), '1' );
						//$sheet->mergeCells('Y'.($cab+1).':Y'.($cab+2));
						$sheet->setCellValue('Z'.($cab+2), '2' );
						//$sheet->mergeCells('Z'.($cab+1).':Z'.($cab+2));
						$sheet->setCellValue('AA'.($cab+2), '3' );
						//$sheet->mergeCells('AA'.($cab+1).':AA'.($cab+2));
						$sheet->setCellValue('AB'.($cab+2), '4' );
						//$sheet->mergeCells('AB'.($cab+1).':AB'.($cab+2));
						$sheet->setCellValue('AC'.($cab+2), '5' );
						//$sheet->mergeCells('AC'.($cab+1).':AC'.($cab+2));
						$sheet->setCellValue('AD'.($cab+2), '6' );
						//$sheet->mergeCells('AD'.($cab+1).':AD'.($cab+2));
						$sheet->setCellValue('AE'.($cab+2), '7' );
						//$sheet->mergeCells('AE'.($cab+1).':AE'.($cab+2));
						$sheet->setCellValue('AF'.($cab+2), '8' );
						//$sheet->mergeCells('AF'.($cab+1).':AF'.($cab+2));
						$sheet->setCellValue('AG'.($cab+2), '9' );
						//$sheet->mergeCells('AG'.($cab+1).':AG'.($cab+2));
						$sheet->setCellValue('AH'.($cab+2), '10' );
						//$sheet->mergeCells('AH'.($cab+1).':AH'.($cab+2));
						$sheet->setCellValue('AI'.($cab+2), '11' );
						//$sheet->mergeCells('AI'.($cab+1).':AI'.($cab+2));
						$sheet->setCellValue('AJ'.($cab+2), '12' );
						//$sheet->mergeCells('AJ'.($cab+1).':AJ'.($cab+2));
						$sheet->setCellValue('AK'.($cab+2), '13' );
						//$sheet->mergeCells('AK'.($cab+1).':AK'.($cab+2));
						$sheet->setCellValue('AL'.($cab+2), '14' );
						//$sheet->mergeCells('AL'.($cab+1).':AL'.($cab+2));
						$sheet->setCellValue('AM'.($cab+2), '15' );
						//$sheet->mergeCells('AM'.($cab+1).':AM'.($cab+2));
						$sheet->setCellValue('AN'.($cab+2), '16' );
						//$sheet->mergeCells('AN'.($cab+1).':AN'.($cab+2));
						$sheet->setCellValue('AO'.($cab+2), '17' );
						//$sheet->mergeCells('AO'.($cab+1).':AO'.($cab+2));
						$sheet->setCellValue('AP'.($cab+2), '18' );
						//$sheet->mergeCells('AP'.($cab+1).':AP'.($cab+2));
						$sheet->setCellValue('AQ'.($cab+2), '19' );
						//$sheet->mergeCells('AQ'.($cab+1).':AQ'.($cab+2));
						$sheet->setCellValue('AR'.($cab+2), '20' );
						//$sheet->mergeCells('AR'.($cab+1).':AR'.($cab+2));	
						$sheet->setCellValue('AS'.($cab+2), '21' );
						//$sheet->mergeCells('AS'.($cab+1).':AS'.($cab+2));	
						$sheet->setCellValue('AT'.($cab+2), '22' );
						//$sheet->mergeCells('AT'.($cab+1).':AT'.($cab+2));	
						$sheet->setCellValue('AU'.($cab+2), '23' );
						//$sheet->mergeCells('AU'.($cab+1).':AU'.($cab+2));																																				
			// NOMBRE CABECERAS

			// ESTILOS  CABECERAS
				$sheet->getStyle("B".$cab.":AU".($cab+2))->getAlignment()->setWrapText(true);// AJUSTA TEXTO A CELDA
				$sheet->getStyle("B".$cab.":AU".($cab+2))->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);						
				$sheet->getStyle("B".$cab.":AU".($cab+2))->getAlignment()->setVertical(PHPExcel_Style_Alignment::VERTICAL_CENTER);						
				$sheet->getStyle("B".$cab.":AU".($cab+2))->getFont()->getColor()->setARGB(PHPExcel_Style_Color::COLOR_WHITE);
				$sheet->getStyle("B".$cab.":AU".($cab+2))->getFont()->setname('Arial')->setSize(9);

		     	$headStyle = $this->phpexcel->getActiveSheet()->getStyle("B".$cab.":AU".($cab+2));
		        //$headStyle->getFill()->setFillType(PHPExcel_Style_Fill::FILL_SOLID)->getStartColor()->setARGB('#FF9900');
				$headStyle->applyFromArray($color_celda_cabeceras);

				$sheet->getStyle("B".$cab.":AU".($cab+2))->applyFromArray(array(
				'borders' => array(
							'allborders' => array(
											'style' => PHPExcel_Style_Border::BORDER_THIN)
						)
				));
				$sheet->getStyle('J16')->getFont()->setname('Arial Narrow')->setSize(9); // tamaño especial para esta celda
			// ESTILOS  CABECERAS
		// CABECERA

	    // CUERPO
			$total = $registros->num_rows()+ ($cab+2);
			$numberStyle1 = $this->phpexcel->getActiveSheet(0)->getStyle('Q'.($cab+3).':X'.$total);
			$numberStyle1->getNumberFormat()->setFormatCode('0.00');

			$sheet->getStyle("A".($cab+3).":AU".$total)->getFont()->setname('Arial Narrow')->setSize(9);

			//bordes cuerpo
			$sheet->getStyle("B".($cab+3).":AU".$total)->applyFromArray(array(
			'borders' => array(
						'allborders' => array(
										'style' => PHPExcel_Style_Border::BORDER_THIN)
					)
			));

			// EXPORTACION A EXCEL
			$row = $cab+2;
			$col = 2;
			$num = 0;
			$cambio = FALSE;
			 foreach($registros->result() as $filas){
			    $row ++;
			    $num ++;
			    $sheet->getCellByColumnAndRow(1, $row)->setValue($num);// para numerar los registros
				foreach($filas as $cols){ // llena cada celda
			  		$sheet->getCellByColumnAndRow($col++, $row)->setValue($cols);
				}
				 $col = 2;
				 //dar formato de color intercalado a cada fila
				 if($cambio){
			     	$fila_color = $this->phpexcel->getActiveSheet()->getStyle("B".$row.":AU".$row);
			        //$fila_color->getFill()->setFillType(PHPExcel_Style_Fill::FILL_SOLID)->getStartColor()->setARGB('#CD5C5C');
					$fila_color->applyFromArray(
					    array(
					        'fill' => array(
					            'type' => PHPExcel_Style_Fill::FILL_SOLID,
					            'color' => array('rgb' => 'DCDCDC')
					        )
					    )
					);			        
			        $cambio = FALSE;	
				 }else{	$cambio = TRUE; }
				
			}

 		// CUERPO

		// PIE TOTALES
			$celda_s = $total+1 ; // inicio de pie de resumenes
			$sheet->setCellValue('B'.$celda_s,'TOTAL' );
			$sheet->mergeCells('B'.$celda_s.':K'.$celda_s);

			
			$inicio_s = $cab+3 ; // inicio suma  de resumenes	
			$fin_s = $total ; // fin suma de resumenes	

			$sheet->setCellValue('L'. $celda_s ,'=SUM(L'.$inicio_s.':L'.$fin_s.')');
			$sheet->setCellValue('M'. $celda_s ,'=SUM(M'.$inicio_s.':M'.$fin_s.')');
			$sheet->setCellValue('N'. $celda_s ,'=SUM(N'.$inicio_s.':N'.$fin_s.')');
			$sheet->setCellValue('O'. $celda_s ,'=SUM(O'.$inicio_s.':O'.$fin_s.')');
			$sheet->setCellValue('P'. $celda_s ,'=SUM(P'.$inicio_s.':P'.$fin_s.')');
			$sheet->setCellValue('T'. $celda_s ,'=SUM(T'.$inicio_s.':T'.$fin_s.')');
			$sheet->setCellValue('U'. $celda_s ,'=SUM(U'.$inicio_s.':U'.$fin_s.')');
			$sheet->setCellValue('V'. $celda_s ,'=SUM(V'.$inicio_s.':V'.$fin_s.')');
			$sheet->setCellValue('W'. $celda_s ,'=SUM(W'.$inicio_s.':W'.$fin_s.')');
			$sheet->setCellValue('X'. $celda_s ,'=SUM(X'.$inicio_s.':X'.$fin_s.')');

			$sheet->mergeCells('Q'.$celda_s.':S'.$celda_s);
			$sheet->mergeCells('Y'.$celda_s.':AU'.$celda_s);

	     	$sheet->getStyle('B'.$celda_s)->applyFromArray($color_celda_cabeceras);
	     	$sheet->getStyle('Q'.$celda_s)->applyFromArray($color_celda_cabeceras);
	     	$sheet->getStyle('Y'.$celda_s)->applyFromArray($color_celda_cabeceras);
	     	$sheet->getStyle('B'.$celda_s.':AU'.$celda_s)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);	
			$sheet->getStyle('B'.$celda_s)->getFont()->getColor()->setARGB(PHPExcel_Style_Color::COLOR_WHITE);

			$sheet->getStyle('B'.$celda_s.':AU'.$celda_s)->applyFromArray(array(
			'borders' => array(
						'allborders' => array(
										'style' => PHPExcel_Style_Border::BORDER_THIN)
					)
			));

			$numberStyle2 = $this->phpexcel->getActiveSheet(0)->getStyle('T'.$celda_s.':X'.$celda_s);
			$numberStyle2->getNumberFormat()->setFormatCode('0.00');
			$sheet->getStyle('T'.($total+2).':X'.($total+2))->getFont()->setname('Arial Narrow')->setSize(10);

			//fecha
			$sheet->setCellValue('B'.($celda_s +2),'IMPRESO:' );
			$sheet->mergeCells('B'.($celda_s +2).':C'.($celda_s +2));
	     	$sheet->getStyle('B'.($celda_s + 2))->applyFromArray($color_celda_cabeceras);
	     	$sheet->getStyle('B'.($celda_s + 2).':C'.($celda_s +2))->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);	
			$sheet->getStyle('B'.($celda_s + 2))->getFont()->getColor()->setARGB(PHPExcel_Style_Color::COLOR_WHITE);

			$sheet->setCellValue('D'.($celda_s +2), date('d/m/Y H:i:s') );
			//$sheet->getStyle('D'.($celda_s +2))->getNumberFormat()->setFormatCode(PHPExcel_Style_NumberFormat::FORMAT_DATE_DDMMYYYY); 
			$sheet->getStyle('D'.($celda_s +2))->getNumberFormat()->setFormatCode('d/m/Y H:i:s'); 
			$sheet->getStyle('B'.($celda_s +2).':D'.($celda_s +2))->applyFromArray(array(
			'borders' => array(
						'allborders' => array(
										'style' => PHPExcel_Style_Border::BORDER_THIN)
					)
			));
		// PIE TOTALES

		// SALIDA EXCEL
			//$objPHPExcel->getActiveSheet()->setCellValueExplicitByColumnAndRow($numColum,$numRow,$products[$i][$colName], PHPExcel_Cell_DataType::TYPE_STRING);
			// Propiedades del archivo excel
				$sheet->setTitle("Programacion-rutas-empadronador");
				$this->phpexcel->getProperties()
				->setTitle("Programación  de rutas empadronador")
				->setDescription("Programacion  de rutas empadronador");

			header("Content-Type: application/vnd.ms-excel");
			$nombreArchivo = 'ProgramacionRutasEmpadronador_'.date('YmdHis');
			header("Content-Disposition: attachment; filename=\"$nombreArchivo.xls\""); //EXCEL
			header("Cache-Control: max-age=0");
			
			// Genera Excel
			$writer = PHPExcel_IOFactory::createWriter($this->phpexcel, "Excel5");
			//$writer = new PHPExcel_Writer_Excel2007($this->phpexcel);

			$writer->save('php://output');
			exit;
		// SALIDA EXCEL

 	}
    public function export_jefe($sede, $dep, $equi){

		$filtros = $this->segmentacion_model->get_jefe($sede, $dep, $equi);    	
		$registros = $this->segmentacion_model->get_all_jefe($sede, $dep, $equi);
		if ($registros->num_rows() === 0 ){
			$this->session->set_flashdata('msgbox',1);
			redirect('/segmentacion/consulta');			
		}    	
		// pestaña
		$sheet = $this->phpexcel->getActiveSheet(0);

    	//colores
			$color_celda_cabeceras =   array(
				        'fill' => array(
				            'type' => PHPExcel_Style_Fill::FILL_SOLID,
				            'color' => array('rgb' => '27408B')
				        )
				    );    		
    	//colores


		// formato de la hoja
			// Set Orientation, size and scaling
			//$objPHPExcel->setActiveSheetIndex(0);
			$sheet->getPageSetup()->setOrientation(PHPExcel_Worksheet_PageSetup::ORIENTATION_LANDSCAPE);// horizontal
			//$sheet->getPageSetup()->setOrientation(PHPExcel_Worksheet_PageSetup::ORIENTATION_PORTRAIT); // vertical
			$sheet->getPageSetup()->setPaperSize(PHPExcel_Worksheet_PageSetup::PAPERSIZE_A3);
			$sheet->getPageSetup()->setFitToPage(false); // ajustar pagina
			$sheet->getPageSetup()->setFitToWidth(1);
			$sheet->getPageSetup()->setFitToHeight(0);
			$sheet->setShowGridlines(false);// oculta lineas de cuadricula				
		// formato de la hoja
		
		// ANCHO Y ALTURA DE COLUMNAS DEL FILE
			$sheet->getColumnDimension('A')->setWidth(1);
			$sheet->getColumnDimension('B')->setWidth(4);
			$sheet->getColumnDimension('C')->setWidth(20);
			$sheet->getColumnDimension('D')->setWidth(20);
			$sheet->getColumnDimension('E')->setWidth(20);
			$sheet->getColumnDimension('F')->setWidth(20);
			$sheet->getColumnDimension('G')->setWidth(7);
			$sheet->getColumnDimension('H')->setWidth(7);
			$sheet->getColumnDimension('J')->setWidth(7);
			$sheet->getColumnDimension('K')->setWidth(7);
			$sheet->getColumnDimension('L')->setWidth(5);
			$sheet->getColumnDimension('M')->setWidth(5);
			$sheet->getColumnDimension('N')->setWidth(5);
			$sheet->getColumnDimension('O')->setWidth(5);
			$sheet->getColumnDimension('P')->setWidth(5);
			$sheet->getColumnDimension('Q')->setWidth(7);
			$sheet->getColumnDimension('R')->setWidth(7);
			$sheet->getColumnDimension('S')->setWidth(7);
			$sheet->getColumnDimension('T')->setWidth(9);
			$sheet->getColumnDimension('U')->setWidth(9);
			$sheet->getColumnDimension('V')->setWidth(9);
			$sheet->getColumnDimension('W')->setWidth(9);
			$sheet->getColumnDimension('X')->setWidth(9);
			$sheet->getColumnDimension('Y')->setWidth(5);
			$sheet->getColumnDimension('Z')->setWidth(5);
			$sheet->getColumnDimension('AA')->setWidth(5);
			$sheet->getColumnDimension('AB')->setWidth(5);
			$sheet->getColumnDimension('AC')->setWidth(5);
			$sheet->getColumnDimension('AD')->setWidth(5);
			$sheet->getColumnDimension('AE')->setWidth(5);
			$sheet->getColumnDimension('AF')->setWidth(5);
			$sheet->getColumnDimension('AG')->setWidth(5);
			$sheet->getColumnDimension('AH')->setWidth(5);
			$sheet->getColumnDimension('AI')->setWidth(5);
			$sheet->getColumnDimension('AJ')->setWidth(5);
			$sheet->getColumnDimension('AK')->setWidth(5);
			$sheet->getColumnDimension('AL')->setWidth(5);
			$sheet->getColumnDimension('AM')->setWidth(5);
			$sheet->getColumnDimension('AN')->setWidth(5);
			$sheet->getColumnDimension('AO')->setWidth(5);
			$sheet->getColumnDimension('AP')->setWidth(5);			
			$sheet->getColumnDimension('AQ')->setWidth(5);
			$sheet->getColumnDimension('AR')->setWidth(5);
			$sheet->getColumnDimension('AS')->setWidth(5);
			$sheet->getColumnDimension('AT')->setWidth(5);
			$sheet->getColumnDimension('AU')->setWidth(5);

			$sheet->getRowDimension(4)->setRowHeight(2);
			$sheet->getRowDimension(6)->setRowHeight(2);
			$sheet->getRowDimension(17)->setRowHeight(130);
		// ANCHO Y ALTURA DE COLUMNAS DEL FILE

		// TITULOS
			$sheet->setCellValue('A3','INSTITUTO NACIONAL DE ESTADÍSTICA E INFORMATICA');
			$sheet->mergeCells('A3:AU3');
			$sheet->setCellValue('A5','PRIMER CENSO NACIONAL DE PESCA CONTINENTAL' );
			$sheet->mergeCells('A5:AU5');
			$sheet->setCellValue('A7','PROGRAMACION DE RUTAS DEL JEFE DE EQUIPO' );
			$sheet->mergeCells('A7:AU7');
			$sheet->getStyle('A3:AU7')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);	
			$sheet->getStyle('A3:AU7')->getFont()->getColor()->setARGB(PHPExcel_Style_Color::COLOR_BLACK);
			$sheet->getStyle('A3:AU3')->getFont()->setname('Arial black')->setSize(18);	
			$sheet->getStyle('A5:AU7')->getFont()->setname('Arial')->setSize(18);	

			// LOGO
	          $objDrawing = new PHPExcel_Worksheet_Drawing();
	          $objDrawing->setWorksheet($sheet);
	          $objDrawing->setName("inei");
	          $objDrawing->setDescription("Inei");
	          $objDrawing->setPath("img/inei.jpeg");
	          $objDrawing->setCoordinates('C2');
	          $objDrawing->setHeight(80);
	          $objDrawing->setOffsetX(1);
	          $objDrawing->setOffsetY(5);

	          $objDrawing2 = new PHPExcel_Worksheet_Drawing();
	          $objDrawing2->setWorksheet($sheet);
	          $objDrawing2->setName("CENPESCO");
	          $objDrawing2->setDescription("CENPESCO");
	          $objDrawing2->setPath("img/cenpesco.jpg");
	          $objDrawing2->setCoordinates('AQ2');
	          $objDrawing2->setHeight(100);
	          $objDrawing2->setWidth(100);
	          $objDrawing2->setOffsetX(1);
	          $objDrawing2->setOffsetY(10);
		// TITULOS

		// CABECERA ESPECIAL
					$sheet->setCellValue('B9','SEDE OPERATIVA:');
					$sheet->mergeCells('B9:C9');
					$sheet->setCellValue('B10','DEPARTAMENTO:');
					$sheet->mergeCells('B10:C10');
					$sheet->setCellValue('B11','EQUIPO - JEFE DE BRIGADA:');
					// $sheet->mergeCells('B11:C11');
					// $sheet->setCellValue('B12','RUTA:');
					$sheet->mergeCells('B12:C12');
					$sheet->setCellValue('D9',$filtros->row('SEDE_OPERATIVA'));
					$sheet->mergeCells('D9:E9');
					$sheet->setCellValue('D10',$filtros->row('DEPARTAMENTO_SEDE'));
					$sheet->mergeCells('D10:E10');
					$sheet->setCellValue('D11',$filtros->row('EQUIPO'));
					$sheet->mergeCells('D11:E11');
					// $sheet->setCellValue('D12',$filtros->row('RUTA'));
					// $sheet->mergeCells('D12:E12');

					$sheet->getStyle("D9:E11")->getAlignment()->setWrapText(true);// AJUSTA TEXTO A CELDA
			     	$sheet->getStyle("B9:C11")->applyFromArray($color_celda_cabeceras);
			     	$sheet->getStyle("D9:E11")->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);	
					$sheet->getStyle("B9:C11")->getFont()->getColor()->setARGB(PHPExcel_Style_Color::COLOR_WHITE);

					$sheet->getStyle("B9:E11")->applyFromArray(array(
					'borders' => array(
								'allborders' => array(
												'style' => PHPExcel_Style_Border::BORDER_THIN)
							)
					));

					$sheet->setCellValue('U10','NOMBRE Y APELLIDOS DEL COORDINADOR');
					$sheet->mergeCells('U10:AG10');
			     	$sheet->getStyle('U10')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
					$sheet->getStyle('U10')->getFont()->getColor()->setARGB(PHPExcel_Style_Color::COLOR_WHITE);	
					$sheet->getStyle("U10")->applyFromArray($color_celda_cabeceras);

					$sheet->mergeCells('U11:AG11');
					$sheet->getStyle("U10:AG11")->applyFromArray(array(
					'borders' => array(
								'allborders' => array(
												'style' => PHPExcel_Style_Border::BORDER_THIN)
							)
					));

					$sheet->setCellValue('AI10','NOMBRE Y APELLIDOS DEL JEFE DE EQUIPO');
					$sheet->mergeCells('AI10:AU10');
					$sheet->setCellValue('AI11',$filtros->row('NOMBRE_Y_APELLIDOS_DEL_JEFE_DE_EQUIPO'));
					$sheet->mergeCells('AI11:AU11');

			     	//$sheet->getStyle("Y10:AU10")->getFill()->setFillType(PHPExcel_Style_Fill::FILL_SOLID)->getStartColor()->setARGB('#FF9900');
			     	$sheet->getStyle("AI10:AU10")->applyFromArray($color_celda_cabeceras);
			     	
			     	$sheet->getStyle("AI10:AU10")->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
					$sheet->getStyle("AI10:AU10")->getFont()->getColor()->setARGB(PHPExcel_Style_Color::COLOR_WHITE);

					$sheet->getStyle("AI10:AU11")->applyFromArray(array(
					'borders' => array(
								'allborders' => array(
												'style' => PHPExcel_Style_Border::BORDER_THIN)
							)
					));


					$sheet->setCellValue('AQ13','FECHA BD');
					$sheet->mergeCells('AQ13:AU13');
					$sheet->getStyle('AQ13')->getFont()->getColor()->setARGB(PHPExcel_Style_Color::COLOR_WHITE);	
					$sheet->getStyle("AQ13")->applyFromArray($color_celda_cabeceras);

					$sheet->setCellValue('AQ14', $filtros->row('FECHA_UPDATE') );
					$sheet->mergeCells('AQ14:AU14');
			     	$sheet->getStyle('AQ13:AQ14')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);						
					$sheet->getStyle("AQ13:AU14")->applyFromArray(array(
					'borders' => array(
								'allborders' => array(
												'style' => PHPExcel_Style_Border::BORDER_THIN)
							)
					));

					$sheet->getStyle('B9:AU12')->getFont()->setname('Arial')->setSize(12);	// TAMAÑO FUENTE CABECERAS
					$sheet->getStyle('B11:B12')->getFont()->setname('Arial')->setSize(9);	// TAMAÑO FUENTE  SOLO CABECERAS

		// CABECERA ESPECIAL

		// CABECERA
			// INICIO DE LA  cabecera
			$cab = 16;	
				
			// NOMBRE CABECERAS

					$sheet->setCellValue('B'.$cab,'N°');
					$sheet->mergeCells('B'.$cab.':B'.($cab+2));
					$sheet->setCellValue('C'.$cab,'Departamento' );
					$sheet->mergeCells('C'.$cab.':C'.($cab+2));

					$sheet->setCellValue('D'.$cab,'Provincia' );
					$sheet->mergeCells('D'.$cab.':D'.($cab+2));
					$sheet->setCellValue('E'.$cab,'Distrito' );
					$sheet->mergeCells('E'.$cab.':E'.($cab+2));
					$sheet->setCellValue('F'.$cab,'Centro Poblado' );
					$sheet->mergeCells('F'.$cab.':F'.($cab+2));
					$sheet->setCellValue('G'.$cab, 'Cod. Punto de Concentracion');
					$sheet->mergeCells('G'.$cab.':G'.($cab+2));	
					$sheet->setCellValue('H'.$cab,'Población Estimada' );
					$sheet->mergeCells('H'.$cab.':H'.($cab+2));
					$sheet->setCellValue('I'.$cab,'Tipo de Empadronamiento' );
					$sheet->mergeCells('I'.$cab.':I'.($cab+2));
					$sheet->setCellValue('J'.$cab,'Periodo de trabajo' );
					$sheet->mergeCells('J'.$cab.':K'.$cab);
						$sheet->setCellValue('J'.($cab+1),'Fecha Inicio' );
						$sheet->mergeCells('J'.($cab+1).':J'.($cab+2));
						$sheet->setCellValue('K'.($cab+1),'Fecha Final' );
						$sheet->mergeCells('K'.($cab+1).':K'.($cab+2));
					$sheet->setCellValue('L'.$cab,'Días de Operación de Campo' );
					$sheet->mergeCells('L'.$cab.':P'.$cab);
						$sheet->setCellValue('L'.($cab+1),'Traslado' );
						$sheet->mergeCells('L'.($cab+1).':L'.($cab+2));
						$sheet->setCellValue('M'.($cab+1),'Supervisión' );
						$sheet->mergeCells('M'.($cab+1).':M'.($cab+2));
						$sheet->setCellValue('N'.($cab+1),'Viaje Sede ODEI ' );
						$sheet->mergeCells('N'.($cab+1).':N'.($cab+2));
						$sheet->setCellValue('O'.($cab+1), 'Retroalimentaciòn' );
						$sheet->mergeCells('O'.($cab+1).':O'.($cab+2));
						$sheet->setCellValue('P'.($cab+1), 'TOTAL DE DIAS' );
						$sheet->mergeCells('P'.($cab+1).':P'.($cab+2));
					$sheet->setCellValue('Q'.$cab,'Monto Asignado' );
					$sheet->mergeCells('Q'.$cab.':S'.$cab);					
						$sheet->setCellValue('Q'.($cab+1), 'Mov. Local' );
						$sheet->mergeCells('Q'.($cab+1).':Q'.($cab+2));
						$sheet->setCellValue('R'.($cab+1), 'Pasaje Traslado' );
						$sheet->mergeCells('R'.($cab+1).':R'.($cab+2));
						$sheet->setCellValue('S'.($cab+1), 'Gasto operativo' );
						$sheet->mergeCells('S'.($cab+1).':S'.($cab+2));
					$sheet->setCellValue('T'.$cab,'Asignación de Fondos' );
					$sheet->mergeCells('T'.$cab.':X'.$cab);						
						$sheet->setCellValue('T'.($cab+1), 'Mov. Local' );
						$sheet->mergeCells('T'.($cab+1).':T'.($cab+2));
						$sheet->setCellValue('U'.($cab+1), 'Pasaje Traslado' );
						$sheet->mergeCells('U'.($cab+1).':U'.($cab+2));
						$sheet->setCellValue('V'.($cab+1), 'Gastos Operativos' );
						$sheet->mergeCells('V'.($cab+1).':V'.($cab+2));
						$sheet->setCellValue('W'.($cab+1), 'Pasaje' );
						$sheet->mergeCells('W'.($cab+1).':W'.($cab+2));
						$sheet->setCellValue('X'.($cab+1), 'TOTAL' );
						$sheet->mergeCells('X'.($cab+1).':X'.($cab+2));
					$sheet->setCellValue('Y'.$cab, 'Codigos de Centros Poblados Convocados');
					$sheet->mergeCells('Y16:AU17');
						$sheet->setCellValue('Y'.($cab+2), '1' );
						//$sheet->mergeCells('Y'.($cab+1).':Y'.($cab+2));
						$sheet->setCellValue('Z'.($cab+2), '2' );
						//$sheet->mergeCells('Z'.($cab+1).':Z'.($cab+2));
						$sheet->setCellValue('AA'.($cab+2), '3' );
						//$sheet->mergeCells('AA'.($cab+1).':AA'.($cab+2));
						$sheet->setCellValue('AB'.($cab+2), '4' );
						//$sheet->mergeCells('AB'.($cab+1).':AB'.($cab+2));
						$sheet->setCellValue('AC'.($cab+2), '5' );
						//$sheet->mergeCells('AC'.($cab+1).':AC'.($cab+2));
						$sheet->setCellValue('AD'.($cab+2), '6' );
						//$sheet->mergeCells('AD'.($cab+1).':AD'.($cab+2));
						$sheet->setCellValue('AE'.($cab+2), '7' );
						//$sheet->mergeCells('AE'.($cab+1).':AE'.($cab+2));
						$sheet->setCellValue('AF'.($cab+2), '8' );
						//$sheet->mergeCells('AF'.($cab+1).':AF'.($cab+2));
						$sheet->setCellValue('AG'.($cab+2), '9' );
						//$sheet->mergeCells('AG'.($cab+1).':AG'.($cab+2));
						$sheet->setCellValue('AH'.($cab+2), '10' );
						//$sheet->mergeCells('AH'.($cab+1).':AH'.($cab+2));
						$sheet->setCellValue('AI'.($cab+2), '11' );
						//$sheet->mergeCells('AI'.($cab+1).':AI'.($cab+2));
						$sheet->setCellValue('AJ'.($cab+2), '12' );
						//$sheet->mergeCells('AJ'.($cab+1).':AJ'.($cab+2));
						$sheet->setCellValue('AK'.($cab+2), '13' );
						//$sheet->mergeCells('AK'.($cab+1).':AK'.($cab+2));
						$sheet->setCellValue('AL'.($cab+2), '14' );
						//$sheet->mergeCells('AL'.($cab+1).':AL'.($cab+2));
						$sheet->setCellValue('AM'.($cab+2), '15' );
						//$sheet->mergeCells('AM'.($cab+1).':AM'.($cab+2));
						$sheet->setCellValue('AN'.($cab+2), '16' );
						//$sheet->mergeCells('AN'.($cab+1).':AN'.($cab+2));
						$sheet->setCellValue('AO'.($cab+2), '17' );
						//$sheet->mergeCells('AO'.($cab+1).':AO'.($cab+2));
						$sheet->setCellValue('AP'.($cab+2), '18' );
						//$sheet->mergeCells('AP'.($cab+1).':AP'.($cab+2));
						$sheet->setCellValue('AQ'.($cab+2), '19' );
						//$sheet->mergeCells('AQ'.($cab+1).':AQ'.($cab+2));
						$sheet->setCellValue('AR'.($cab+2), '20' );
						//$sheet->mergeCells('AR'.($cab+1).':AR'.($cab+2));	
						$sheet->setCellValue('AS'.($cab+2), '21' );
						//$sheet->mergeCells('AS'.($cab+1).':AS'.($cab+2));	
						$sheet->setCellValue('AT'.($cab+2), '22' );
						//$sheet->mergeCells('AT'.($cab+1).':AT'.($cab+2));	
						$sheet->setCellValue('AU'.($cab+2), '23' );
						//$sheet->mergeCells('AU'.($cab+1).':AU'.($cab+2));																																				
			// NOMBRE CABECERAS
			// ESTILOS  CABECERAS
				$sheet->getStyle("B".$cab.":AU".($cab+2))->getAlignment()->setWrapText(true);// AJUSTA TEXTO A CELDA
				$sheet->getStyle("B".$cab.":AU".($cab+2))->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);						
				$sheet->getStyle("B".$cab.":AU".($cab+2))->getAlignment()->setVertical(PHPExcel_Style_Alignment::VERTICAL_CENTER);						
				$sheet->getStyle("B".$cab.":AU".($cab+2))->getFont()->getColor()->setARGB(PHPExcel_Style_Color::COLOR_WHITE);
				$sheet->getStyle("B".$cab.":AU".($cab+2))->getFont()->setname('Arial')->setSize(9);

		     	$headStyle = $this->phpexcel->getActiveSheet()->getStyle("B".$cab.":AU".($cab+2));
		        //$headStyle->getFill()->setFillType(PHPExcel_Style_Fill::FILL_SOLID)->getStartColor()->setARGB('#FF9900');
				$headStyle->applyFromArray($color_celda_cabeceras);

				$sheet->getStyle("B".$cab.":AU".($cab+2))->applyFromArray(array(
				'borders' => array(
							'allborders' => array(
											'style' => PHPExcel_Style_Border::BORDER_THIN)
						)
				));
				$sheet->getStyle('J16')->getFont()->setname('Arial Narrow')->setSize(9); // tamaño especial para esta celda
			// ESTILOS  CABECERAS
		// CABECERA

	    // CUERPO
			$total = $registros->num_rows() + ($cab+2);
			$numberStyle1 = $this->phpexcel->getActiveSheet(0)->getStyle('Q'.($cab+1).':X'.$total);
			$numberStyle1->getNumberFormat()->setFormatCode('0.00');

			$sheet->getStyle("A".($cab+1).":AU".$total)->getFont()->setname('Arial Narrow')->setSize(9);

			//bordes cuerpo
			$sheet->getStyle("B".($cab+1).":AU".$total)->applyFromArray(array(
			'borders' => array(
						'allborders' => array(
										'style' => PHPExcel_Style_Border::BORDER_THIN)
					)
			));

			// EXPORTACION A EXCEL
			$row = $cab+2;
			$col = 2;
			$num = 0;
			$cambio = FALSE;
			 foreach($registros->result() as $filas){
			    $row ++;
			    $num ++;
			    $sheet->getCellByColumnAndRow(1, $row)->setValue($num);// para numerar los registros
				foreach($filas as $cols){ // llena cada celda
			  		$sheet->getCellByColumnAndRow($col++, $row)->setValue($cols);
				}
				 $col = 2;
				 //dar formato de color intercalado a cada fila
				 if($cambio){
			     	$fila_color = $this->phpexcel->getActiveSheet()->getStyle("B".$row.":AU".$row);
			        //$fila_color->getFill()->setFillType(PHPExcel_Style_Fill::FILL_SOLID)->getStartColor()->setARGB('#CD5C5C');
					$fila_color->applyFromArray(
					    array(
					        'fill' => array(
					            'type' => PHPExcel_Style_Fill::FILL_SOLID,
					            'color' => array('rgb' => 'DCDCDC')
					        )
					    )
					);			        
			        $cambio = FALSE;	
				 }else{	$cambio = TRUE; }
				
			}
 		// CUERPO

		// PIE TOTALES
			$celda_s = $total+1 ; // inicio de pie de resumenes
			$sheet->setCellValue('B'.$celda_s,'TOTAL' );
			$sheet->mergeCells('B'.$celda_s.':K'.$celda_s);

			
			$inicio_s = $cab+3 ; // inicio suma  de resumenes	
			$fin_s = $total ; // fin suma de resumenes	

			$sheet->setCellValue('L'. $celda_s ,'=SUM(L'.$inicio_s.':L'.$fin_s.')');
			$sheet->setCellValue('M'. $celda_s ,'=SUM(M'.$inicio_s.':M'.$fin_s.')');
			$sheet->setCellValue('N'. $celda_s ,'=SUM(N'.$inicio_s.':N'.$fin_s.')');
			$sheet->setCellValue('O'. $celda_s ,'=SUM(O'.$inicio_s.':O'.$fin_s.')');
			$sheet->setCellValue('P'. $celda_s ,'=SUM(P'.$inicio_s.':P'.$fin_s.')');
			$sheet->setCellValue('T'. $celda_s ,'=SUM(T'.$inicio_s.':T'.$fin_s.')');
			$sheet->setCellValue('U'. $celda_s ,'=SUM(U'.$inicio_s.':U'.$fin_s.')');
			$sheet->setCellValue('V'. $celda_s ,'=SUM(V'.$inicio_s.':V'.$fin_s.')');
			$sheet->setCellValue('W'. $celda_s ,'=SUM(W'.$inicio_s.':W'.$fin_s.')');
			$sheet->setCellValue('X'. $celda_s ,'=SUM(X'.$inicio_s.':X'.$fin_s.')');

			$sheet->mergeCells('Q'.$celda_s.':S'.$celda_s);
			$sheet->mergeCells('Y'.$celda_s.':AU'.$celda_s);

	     	$sheet->getStyle('B'.$celda_s)->applyFromArray($color_celda_cabeceras);
	     	$sheet->getStyle('Q'.$celda_s)->applyFromArray($color_celda_cabeceras);
	     	$sheet->getStyle('Y'.$celda_s)->applyFromArray($color_celda_cabeceras);
	     	$sheet->getStyle('B'.$celda_s.':AU'.$celda_s)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);	
			$sheet->getStyle('B'.$celda_s)->getFont()->getColor()->setARGB(PHPExcel_Style_Color::COLOR_WHITE);

			$sheet->getStyle('B'.$celda_s.':AU'.$celda_s)->applyFromArray(array(
			'borders' => array(
						'allborders' => array(
										'style' => PHPExcel_Style_Border::BORDER_THIN)
					)
			));

			$numberStyle2 = $this->phpexcel->getActiveSheet(0)->getStyle('T'.$celda_s.':X'.$celda_s);
			$numberStyle2->getNumberFormat()->setFormatCode('0.00');
			$sheet->getStyle('T'.($total+2).':X'.($total+2))->getFont()->setname('Arial Narrow')->setSize(10);

			//fecha
			$sheet->setCellValue('B'.($celda_s +2),'IMPRESO:' );
			$sheet->mergeCells('B'.($celda_s +2).':C'.($celda_s +2));
	     	$sheet->getStyle('B'.($celda_s + 2))->applyFromArray($color_celda_cabeceras);
	     	$sheet->getStyle('B'.($celda_s + 2).':C'.($celda_s +2))->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);	
			$sheet->getStyle('B'.($celda_s + 2))->getFont()->getColor()->setARGB(PHPExcel_Style_Color::COLOR_WHITE);

			$sheet->setCellValue('D'.($celda_s +2), date('d/m/Y H:i:s') );
			//$sheet->getStyle('D'.($celda_s +2))->getNumberFormat()->setFormatCode(PHPExcel_Style_NumberFormat::FORMAT_DATE_DDMMYYYY); 
			$sheet->getStyle('D'.($celda_s +2))->getNumberFormat()->setFormatCode('dd/mm/yyyy hh:mm:ss'); 
			$sheet->getStyle('B'.($celda_s +2).':D'.($celda_s +2))->applyFromArray(array(
			'borders' => array(
						'allborders' => array(
										'style' => PHPExcel_Style_Border::BORDER_THIN)
					)
			));

		// PIE TOTALES


		// SALIDA EXCEL
			//$objPHPExcel->getActiveSheet()->setCellValueExplicitByColumnAndRow($numColum,$numRow,$products[$i][$colName], PHPExcel_Cell_DataType::TYPE_STRING);

			// Propiedades del archivo excel
				$sheet->setTitle("Programación-rutas-jefe_equipo");
				$this->phpexcel->getProperties()
				->setTitle("Programación  de rutas jefe_equipo")
				->setDescription("Programación  de rutas empadronador");

			header("Content-Type: application/vnd.ms-excel");
			$nombreArchivo = 'ProgramacionRutasJefeEquipo_'.date('YmdHis');
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