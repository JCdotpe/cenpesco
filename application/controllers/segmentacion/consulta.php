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


	public function index()
	{
			//$data['nav'] = TRUE;
			//$data['onload'] = 'init()';
			//$data['fluid'] = TRUE;
			$data['title'] = 'Rutas y Segmentación';
			$data['nofoot'] = TRUE;	
			$data['contclass'] = 'map_container';	
			$data['sede'] = $this->marco_model->get_sede(); 
			$data['dptos'] = $this->ubigeo_model->get_dptos();
			$data['main_content'] = 'segmentacion/consulta_view';
			//$data['main_content'] = 'segmentacion/leaf_view';
	        $this->load->view('backend/includes/template', $data);
	        //$this->load->view('segmentacion/openlayers_view', $data);

	}

    public function export($sede, $dep, $equi, $ruta){

		$filtros = $this->segmentacion_model->get_empadronador($sede, $dep, $equi, $ruta);    	
		$registros = $this->segmentacion_model->get_all_empadronador($sede, $dep, $equi, $ruta);    	

		// pestaña
		$sheet = $this->phpexcel->getActiveSheet(0);
		
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
			$sheet->getColumnDimension('L')->setWidth(7);
			$sheet->getColumnDimension('L')->setWidth(7);
			$sheet->getColumnDimension('L')->setWidth(7);
			$sheet->getColumnDimension('O')->setWidth(7);
			$sheet->getColumnDimension('P')->setWidth(7);
			$sheet->getColumnDimension('Q')->setWidth(7);
			$sheet->getColumnDimension('R')->setWidth(7);
			$sheet->getColumnDimension('S')->setWidth(7);
			$sheet->getColumnDimension('V')->setWidth(7);
			$sheet->getColumnDimension('W')->setWidth(7);
			$sheet->getColumnDimension('X')->setWidth(7);
			$sheet->getColumnDimension('Y')->setWidth(7);
			$sheet->getColumnDimension('Z')->setWidth(7);
			$sheet->getColumnDimension('AA')->setWidth(7);
			$sheet->getColumnDimension('AB')->setWidth(7);
			$sheet->getColumnDimension('AC')->setWidth(7);
			$sheet->getColumnDimension('AD')->setWidth(7);
			$sheet->getColumnDimension('AE')->setWidth(7);
			$sheet->getColumnDimension('AF')->setWidth(7);
			$sheet->getColumnDimension('AG')->setWidth(7);
			$sheet->getColumnDimension('AH')->setWidth(7);
			$sheet->getColumnDimension('AI')->setWidth(7);
			$sheet->getColumnDimension('AJ')->setWidth(7);
			$sheet->getColumnDimension('AK')->setWidth(7);
			$sheet->getColumnDimension('AL')->setWidth(7);
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
	          $objDrawing2->setName("produce");
	          $objDrawing2->setDescription("Produce");
	          $objDrawing2->setPath("img/produce.jpg");
	          $objDrawing2->setCoordinates('AQ2');
	          $objDrawing2->setHeight(73);
	          $objDrawing2->setOffsetX(1);
	          $objDrawing2->setOffsetY(5);
		// TITULOS

		// CABECERA ESPECIAL
					$sheet->setCellValue('B9','SEDE OPERATIVA:');
					$sheet->mergeCells('B9:C9');
					$sheet->setCellValue('B10','DEPARTAMENTO:');
					$sheet->mergeCells('B10:C10');
					$sheet->setCellValue('B11','EQUIPO:');
					$sheet->mergeCells('B11:C11');
					$sheet->setCellValue('B12','RUTA:');
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
			     	$sheet->getStyle("B9:C12")->getFill()->setFillType(PHPExcel_Style_Fill::FILL_SOLID)->getStartColor()->setARGB('#FF9900');
			     	$sheet->getStyle("D9:E12")->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);	
					$sheet->getStyle("B9:C12")->getFont()->getColor()->setARGB(PHPExcel_Style_Color::COLOR_RED);

					$sheet->getStyle("B9:E12")->applyFromArray(array(
					'borders' => array(
								'allborders' => array(
												'style' => PHPExcel_Style_Border::BORDER_THIN)
							)
					));

					$sheet->setCellValue('Y10','NOMBRE Y APELLIDOS DEL EMPADRONADOR');
					$sheet->mergeCells('Y10:AU10');
					$sheet->setCellValue('Y11',$filtros->row('NOMBRE_Y_APELLIDOS_DEL_EMPADRONADOR'));
					$sheet->mergeCells('Y11:AU11');

			     	$sheet->getStyle("Y10:AU10")->getFill()->setFillType(PHPExcel_Style_Fill::FILL_SOLID)->getStartColor()->setARGB('#FF9900');
			     	$sheet->getStyle("Y10:AU11")->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
					$sheet->getStyle("Y10:AU10")->getFont()->getColor()->setARGB(PHPExcel_Style_Color::COLOR_RED);

					$sheet->getStyle("Y10:AU11")->applyFromArray(array(
					'borders' => array(
								'allborders' => array(
												'style' => PHPExcel_Style_Border::BORDER_THIN)
							)
					));

					$sheet->getStyle('B9:AU12')->getFont()->setname('Arial')->setSize(12);	

		// CABECERA ESPECIAL

		// CABECERA
			// INICIO DE LA  cabecera
			$cab = 16;	
				
			// NOMBRE CABECERAS

					$sheet->setCellValue('B'.$cab,'N°');
					$sheet->mergeCells('B'.$cab.':B'.($cab+1));
					$sheet->setCellValue('C'.$cab,'Departamento' );
					$sheet->mergeCells('C'.$cab.':C'.($cab+1));

					$sheet->setCellValue('D'.$cab,'Provincia' );
					$sheet->mergeCells('D'.$cab.':D'.($cab+1));
					$sheet->setCellValue('E'.$cab,'Distrito' );
					$sheet->mergeCells('E'.$cab.':E'.($cab+1));
					$sheet->setCellValue('F'.$cab,'Centro Poblado' );
					$sheet->mergeCells('F'.$cab.':F'.($cab+1));
					$sheet->setCellValue('G'.$cab,'Población Estimada' );
					$sheet->mergeCells('G'.$cab.':G'.($cab+1));
					$sheet->setCellValue('H'.$cab,'Tipo de Empadronamiento' );
					$sheet->mergeCells('H'.$cab.':H'.($cab+1));
					$sheet->setCellValue('I'.$cab,'Periodo de trabajo' );
					$sheet->mergeCells('I'.$cab.':J'.$cab);
					$sheet->setCellValue('I'.($cab+1),'Fecha Inicio' );
					$sheet->setCellValue('J'.($cab+1),'Fecha Final' );
					$sheet->setCellValue('K'.$cab,'Días de Operación de Campo' );
					$sheet->mergeCells('K'.$cab.':O'.$cab);
					$sheet->setCellValue('K'.($cab+1),'Traslado' );
					$sheet->setCellValue('L'.($cab+1),'Trabajo' );
					$sheet->setCellValue('M'.($cab+1),'Viaje Sede ODEI ' );
					$sheet->setCellValue('N'.($cab+1), 'Retroalimentaciòn' );
					$sheet->setCellValue('O'.($cab+1), 'TOTAL DE DIAS' );
					$sheet->setCellValue('P'.$cab,'Monto Asignado' );
					$sheet->mergeCells('P'.$cab.':R'.$cab);					
					$sheet->setCellValue('P'.($cab+1), 'Mov. Local' );
					$sheet->setCellValue('Q'.($cab+1), 'Pasaje Traslado' );
					$sheet->setCellValue('R'.($cab+1), 'Gasto operativo' );
					$sheet->setCellValue('S'.$cab,'Asignación de Fondos' );
					$sheet->mergeCells('S'.$cab.':W'.$cab);						
					$sheet->setCellValue('S'.($cab+1), 'Mov. Local' );
					$sheet->setCellValue('T'.($cab+1), 'Pasaje Traslado' );
					$sheet->setCellValue('U'.($cab+1), 'Gastos Operativos' );
					$sheet->setCellValue('V'.($cab+1), 'Pasaje' );
					$sheet->setCellValue('W'.($cab+1), 'TOTAL' );
					$sheet->setCellValue('X'.$cab, 'Cod. Punto de Concentracion');
					$sheet->mergeCells('X'.$cab.':X'.($cab+1));	
					$sheet->setCellValue('Y'.$cab, 'Codigos de Centros Poblados Convocados');
					$sheet->mergeCells('Y16:AU17');

			// NOMBRE CABECERAS

			// ESTILOS  CABECERAS

				$sheet->getStyle("B".$cab.":AU".($cab+1))->getAlignment()->setWrapText(true);// AJUSTA TEXTO A CELDA
				$sheet->getStyle("B".$cab.":AU".($cab+1))->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);						
				$sheet->getStyle("B".$cab.":AU".($cab+1))->getAlignment()->setVertical(PHPExcel_Style_Alignment::VERTICAL_CENTER);						
				$sheet->getStyle("B".$cab.":AU".($cab+1))->getFont()->getColor()->setARGB(PHPExcel_Style_Color::COLOR_RED);
				$sheet->getStyle("B".$cab.":AU".($cab+1))->getFont()->setname('Arial')->setSize(9);

		     	$headStyle = $this->phpexcel->getActiveSheet()->getStyle("B".$cab.":AU".($cab+1));
		        $headStyle->getFill()->setFillType(PHPExcel_Style_Fill::FILL_SOLID)->getStartColor()->setARGB('#FF9900');

				$sheet->getStyle("B".$cab.":AU".($cab+1))->applyFromArray(array(
				'borders' => array(
							'allborders' => array(
											'style' => PHPExcel_Style_Border::BORDER_THIN)
						)
				));
			// ESTILOS  CABECERAS
		// CABECERA

	    // CUERPO
			$total = $registros->num_rows()+ ($cab+1);
			$numberStyle1 = $this->phpexcel->getActiveSheet(0)->getStyle('P'.($cab+1).':W'.$total);
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
	 			
			$row = $cab+1;
			$col = 1;
			 foreach($registros->result() as $filas){
			    $row ++;
				 foreach($filas as $cols){
			  		$sheet->getCellByColumnAndRow($col++, $row)->setValue($cols);
				 }
				 $col =1;
			}
 		// CUERPO

		// PIE TOTALES
			$sheet->setCellValue('B'.($total+1),'TOTAL' );
			$sheet->mergeCells('B'.($total+1).':J'.($total+1));
			$sheet->setCellValue('K'.($total+1),'=SUM(K'.($cab+2).':K'.$total.')');
			$sheet->setCellValue('L'.($total+1),'=SUM(L'.($cab+2).':L'.$total.')');
			$sheet->setCellValue('M'.($total+1),'=SUM(M'.($cab+2).':M'.$total.')');
			$sheet->setCellValue('N'.($total+1),'=SUM(N'.($cab+2).':N'.$total.')');
			$sheet->setCellValue('O'.($total+1),'=SUM(O'.($cab+2).':O'.$total.')');
			$sheet->setCellValue('S'.($total+1),'=SUM(S'.($cab+2).':S'.$total.')');
			$sheet->setCellValue('T'.($total+1),'=SUM(T'.($cab+2).':T'.$total.')');
			$sheet->setCellValue('U'.($total+1),'=SUM(U'.($cab+2).':U'.$total.')');
			$sheet->setCellValue('V'.($total+1),'=SUM(V'.($cab+2).':V'.$total.')');
			$sheet->setCellValue('W'.($total+1),'=SUM(W'.($cab+2).':W'.$total.')');

			$sheet->mergeCells('P'.($total+1).':R'.($total+1));
			$sheet->mergeCells('X'.($total+1).':AU'.($total+1));
	     	$sheet->getStyle('B'.($total+1))->getFill()->setFillType(PHPExcel_Style_Fill::FILL_SOLID)->getStartColor()->setARGB('#FF9900');
	     	$sheet->getStyle('P'.($total+1))->getFill()->setFillType(PHPExcel_Style_Fill::FILL_SOLID)->getStartColor()->setARGB('#FF9900');
	     	$sheet->getStyle('X'.($total+1))->getFill()->setFillType(PHPExcel_Style_Fill::FILL_SOLID)->getStartColor()->setARGB('#FF9900');
	     	$sheet->getStyle('B'.($total+1).':AU'.($total+1))->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);	
			$sheet->getStyle('B'.($total+1))->getFont()->getColor()->setARGB(PHPExcel_Style_Color::COLOR_RED);

			$sheet->getStyle('B'.($total+1).':AU'.($total+1))->applyFromArray(array(
			'borders' => array(
						'allborders' => array(
										'style' => PHPExcel_Style_Border::BORDER_THIN)
					)
			));


			$numberStyle2 = $this->phpexcel->getActiveSheet(0)->getStyle('S'.($total+1).':W'.($total+1));
			$numberStyle2->getNumberFormat()->setFormatCode('0.00');
			$sheet->getStyle('K'.($total+1).':W'.($total+1))->getFont()->setname('Arial Narrow')->setSize(10);

		// PIE TOTALES



		// SALIDA EXCEL
			//$objPHPExcel->getActiveSheet()->setCellValueExplicitByColumnAndRow($numColum,$numRow,$products[$i][$colName], PHPExcel_Cell_DataType::TYPE_STRING);

			// Propiedades del archivo excel
				$sheet->setTitle("Programación-rutas-empadronador");
				$this->phpexcel->getProperties()
				->setTitle("Programación  de rutas empadronador")
				->setDescription("Programación  de rutas empadronador");

			header("Content-Type: application/vnd.ms-excel");
			$nombreArchivo = 'ProgramacionRutasEmpadronador_'.date('YmdHis');
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