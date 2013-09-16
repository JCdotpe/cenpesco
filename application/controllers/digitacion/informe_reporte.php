<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Informe_reporte extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		$this->load->library('form_validation');
		$this->load->library('security');
		$this->load->library('tank_auth');
		$this->lang->load('tank_auth');		

		//User is logged in
		if (!$this->tank_auth->is_logged_in()) {
			redirect('/auth/login/');
		}

		//Check user privileges 
		$roles = $this->tank_auth->get_roles();
		$flag = FALSE;
		foreach ($roles as $role) {
			if($role->role_id == 9 && $role->rolename == 'Informe de supervisión'){
				$flag = TRUE;
				break;
			}
		}

		//If not author is the maintenance guy!
		if (!$flag) {
			show_404();
			die();
		}

		$this->load->model('pais_model');	
		$this->load->model('pesca_piloto_model');	
		$this->load->model('ubigeo_model');	
		$this->load->model('marco_model');	
		$this->load->model('ubigeo_piloto_model');	
		$this->load->model('empadronador_model');	
		$this->load->model('supervisor_model');	
		$this->load->model('inform_model');	
		$this->load->model('inform_reporte_model');	
		$this->load->library('PHPExcel');
	}


	public function index()
	{	

			$romanos = array(
				'I' 	=> 1,
				'II'	=> 2,
				'III'	=> 3,
				'IV'	=> 4,
				'V'		=> 5,
				'VI'	=> 6,
				'VII'	=> 7,
				'VIII'	=> 8,
				'IX'	=> 9,
				'X'		=> 10,
				'XI'	=> 11 	);

	    	//colores
	    		//$color_celda_cabeceras = '27408B';

			$color_celda_cabeceras =   array(
				        'fill' => array(
				            'type' => PHPExcel_Style_Fill::FILL_SOLID,
				            'color' => array('rgb' => '27408B')
				        )
				    ); 

			$color_celda_cabeceras2 =   array( //AZUL electrico
				        'fill' => array(
				            'type' => PHPExcel_Style_Fill::FILL_SOLID,
				            'color' => array('rgb' => '0000FF')
				        )
				    ); 
			$color_celda_cabeceras3 =   array( //VERDE pastel
				        'fill' => array(
				            'type' => PHPExcel_Style_Fill::FILL_SOLID,
				            'color' => array('rgb' => '00868B')
				        )
				    ); 
			$color_celda_cabeceras4 =   array( //PLOMO
				        'fill' => array(
				            'type' => PHPExcel_Style_Fill::FILL_SOLID,
				            'color' => array('rgb' => 'A6A6A6')
				        )
				    ); 
			$color_celda_cabeceras5 =   array( //verde palta
				        'fill' => array(
				            'type' => PHPExcel_Style_Fill::FILL_SOLID,
				            'color' => array('rgb' => '698B22')
				        )
				    ); 

			$color_celda_cabeceras6 =   array( //CELESTE claro
				        'fill' => array(
				            'type' => PHPExcel_Style_Fill::FILL_SOLID,
				            'color' => array('rgb' => '98F5FF')
				        )
				    ); 
			$color_celda_cabeceras7 =   array( //PASTEL claro
				        'fill' => array(
				            'type' => PHPExcel_Style_Fill::FILL_SOLID,
				            'color' => array('rgb' => 'D1EEEE')
				        )
				    ); 
			$color_celda_cabeceras8 =   array( //PLOMO claro
				        'fill' => array(
				            'type' => PHPExcel_Style_Fill::FILL_SOLID,
				            'color' => array('rgb' => 'F2F2F2')
				        )
				    ); 
			$color_celda_cabeceras9 =   array( //VERDE claro
				        'fill' => array(
				            'type' => PHPExcel_Style_Fill::FILL_SOLID,
				            'color' => array('rgb' => 'EBF1DE')
				        )
				    ); 

			$color_celda_cabeceras10 =   array( //VIOLETA claro
				        'fill' => array(
				            'type' => PHPExcel_Style_Fill::FILL_SOLID,
				            'color' => array('rgb' => 'C5D9F1')
				        )
				    ); 


		/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
		///////////  H O J A   1 ////////////////////////////////////////////////////////////////////////////////////////////////////////
		/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
			
			$departamentos		= $this->inform_reporte_model->get_deps();	// DEPS, y su data de META MARCO
			$reporte_by_dep		= $this->inform_reporte_model->get_report_by_dep();	// DEPS, y su data de META MARCO
		
			// pestaña
			$sheet_1 = $this->phpexcel->createSheet(0);	
			//$sheet2 = $this->phpexcel->setActiveSheetIndex(1);55
			//$sheet = $this->phpexcel->getActiveSheet(1);
			
			// formato de la hoja
				// Set Orientation, size and scaling
				//$objPHPExcel->setActiveSheetIndex(0);
				//$sheet_1->getPageSetup()->setOrientation(PHPExcel_Worksheet_PageSetup::ORIENTATION_LANDSCAPE);// horizontal
				$sheet_1->getPageSetup()->setOrientation(PHPExcel_Worksheet_PageSetup::ORIENTATION_PORTRAIT); // vertical
				$sheet_1->getPageSetup()->setPaperSize(PHPExcel_Worksheet_PageSetup::PAPERSIZE_A4);
				$sheet_1->getPageSetup()->setFitToPage(false); // ajustar pagina
				$sheet_1->getPageSetup()->setFitToWidth(1);
				$sheet_1->getPageSetup()->setFitToHeight(0);		
				$sheet_1->setShowGridlines(false);// oculta lineas de cuadricula		

				// margin is set in inches (0.5cm)
				$margin = 0.5 / 2.54;
				//$sheet_1->getPageMargins->setTop($margin);
				//$sheet_1->getPageMargins->setBottom($margin);
				$sheet_1->getPageMargins()->setLeft($margin);
				$sheet_1->getPageMargins()->setRight($margin);


			// formato de la hoja

			// ANCHO Y ALTURA DE COLUMNAS DEL FILE
				$sheet_1->getColumnDimension('A')->setWidth(5);
				$sheet_1->getColumnDimension('B')->setWidth(20);
				$sheet_1->getColumnDimension('C')->setWidth(40);
		
				$sheet_1->getRowDimension(1)->setRowHeight(2);
				$sheet_1->getRowDimension(2)->setRowHeight(2);
				$sheet_1->getRowDimension(3)->setRowHeight(2);
				$sheet_1->getRowDimension(4)->setRowHeight(2);
				$sheet_1->getRowDimension(6)->setRowHeight(10);
				$sheet_1->getRowDimension(7)->setRowHeight(10);
				$sheet_1->getRowDimension(8)->setRowHeight(30);
				$sheet_1->getRowDimension(9)->setRowHeight(10);
				$sheet_1->getRowDimension(10)->setRowHeight(15);
				$sheet_1->getRowDimension(11)->setRowHeight(35);
				$sheet_1->getRowDimension(12)->setRowHeight(15);
				$sheet_1->getRowDimension(13)->setRowHeight(5);
		
			// ANCHO Y ALTURA DE COLUMNAS DEL FILE

			// TITULOS
				$sheet_1->setCellValue('A3','INSTITUTO NACIONAL DE ESTADÍSTICA E INFORMATICA');
				$sheet_1->mergeCells('A3:O3');
				$sheet_1->setCellValue('A5','PRIMER CENSO NACIONAL DE PESCA CONTINENTAL' );
				$sheet_1->mergeCells('A5:O5');
				$sheet_1->setCellValue('A8','PRIMERA SUPERVISIÓN: TOTAL DE ERRORES POR TIPO, SEGÚN DEPARTAMENTO Y TIPO DE FORMULARIO' );
				$sheet_1->mergeCells('A8:O8');	
						
				$sheet_1->getStyle('A3:O9')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);	
				$sheet_1->getStyle('A3:O9')->getFont()->getColor()->setARGB(PHPExcel_Style_Color::COLOR_BLACK);
				$sheet_1->getStyle('A3:O9')->getFont()->setname('Arial black')->setSize(30);	
				$sheet_1->getStyle('A5:O9')->getFont()->setname('Arial ')->setSize(20);	
				$sheet_1->getStyle('A8')->getFont()->setname('Arial black')->setSize(12);	

				// LOGO
		          $objDrawing = new PHPExcel_Worksheet_Drawing();
		          $objDrawing->setWorksheet($sheet_1);
		          $objDrawing->setName("inei");
		          $objDrawing->setDescription("Inei");
		          $objDrawing->setPath("img/inei.jpeg");
		          $objDrawing->setCoordinates('A5');
		          $objDrawing->setHeight(80);
		          $objDrawing->setWidth(120);
		          $objDrawing->setOffsetX(10);
		          $objDrawing->setOffsetY(30);

		          $objDrawing2 = new PHPExcel_Worksheet_Drawing();
		          $objDrawing2->setWorksheet($sheet_1);
		          $objDrawing2->setName("CENPESCO");
		          $objDrawing2->setDescription("CENPESCO");
		          $objDrawing2->setPath("img/cenpesco.jpg");
		          $objDrawing2->setCoordinates('N5');
		          $objDrawing2->setHeight(60);
		          $objDrawing2->setWidth(90);
		          $objDrawing2->setOffsetX(280);
		          $objDrawing2->setOffsetY(20);
			// TITULOS


			// CABECERA
				// INICIO DE LA  cabecera
				$cab = 10;	
					
				// NOMBRE CABECERAS

						$sheet_1->setCellValue('A'.$cab,'DEPARTAMENTO');
						$sheet_1->mergeCells('A'.$cab.':B'.($cab+2));
						$sheet_1->setCellValue('C'.$cab,'TIPO FORMULARIO' );
							$sheet_1->mergeCells('C'.$cab.':C'.($cab+2));
						$sheet_1->setCellValue('D'.$cab,'TOTAL' );
						$sheet_1->mergeCells('D'.$cab.':E'.($cab+1));
							$sheet_1->setCellValue('D'.($cab+2),'Abs.' );
							$sheet_1->setCellValue('E'.($cab+2),'%' );
						$sheet_1->setCellValue('F'.$cab,'TIPO DE ERROR' );
						$sheet_1->mergeCells('F'.$cab.':O'.($cab));
							$sheet_1->setCellValue('F'.($cab+1),'CONCEPTO' );
							$sheet_1->mergeCells('F'.($cab+1).':G'.($cab+1));
								$sheet_1->setCellValue('F'.($cab+2),'Abs.' );
								$sheet_1->setCellValue('G'.($cab+2),'%' );
							$sheet_1->setCellValue('H'.($cab+1),'DELIGENCIAMIENTO' );
							$sheet_1->mergeCells('H'.($cab+1).':I'.($cab+1));
								$sheet_1->setCellValue('H'.($cab+2),'Abs.' );
								$sheet_1->setCellValue('I'.($cab+2),'%' );
							$sheet_1->setCellValue('J'.($cab+1),'FORMULACION' );
							$sheet_1->mergeCells('J'.($cab+1).':K'.($cab+1));
								$sheet_1->setCellValue('J'.($cab+2),'Abs.' );
								$sheet_1->setCellValue('K'.($cab+2),'%' );
							$sheet_1->setCellValue('L'.($cab+1),'SONDEO' );
							$sheet_1->mergeCells('L'.($cab+1).':M'.($cab+1));
								$sheet_1->setCellValue('L'.($cab+2),'Abs.' );
								$sheet_1->setCellValue('M'.($cab+2),'%' );
							$sheet_1->setCellValue('N'.($cab+1),'OMISIÓN' );
							$sheet_1->mergeCells('N'.($cab+1).':O'.($cab+1));
								$sheet_1->setCellValue('N'.($cab+2),'Abs.' );
								$sheet_1->setCellValue('O'.($cab+2),'%' );

				// NOMBRE CABECERAS

				// ESTILOS  CABECERAS
					$sheet_1->getStyle("A".$cab.":BI".($cab+2))->getAlignment()->setWrapText(true);// AJUSTA TEXTO A CELDA
					$sheet_1->getStyle("A".$cab.":BI".($cab+2))->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);						
					$sheet_1->getStyle("A".$cab.":BI".($cab+2))->getAlignment()->setVertical(PHPExcel_Style_Alignment::VERTICAL_CENTER);						
					$sheet_1->getStyle("A".$cab.":BI".($cab+2))->getFont()->getColor()->setARGB(PHPExcel_Style_Color::COLOR_WHITE);
					$sheet_1->getStyle("A".$cab.":BI".($cab+2))->getFont()->setname('Arial')->setSize(11);

					$sheet_1->getStyle("A".$cab.":O".($cab+2) )->applyFromArray($color_celda_cabeceras); // AZUL DEFECTO

					$sheet_1->getStyle('H11')->getFont()->setname('Arial ')->setSize(9); // tamaño especial para esta celda

					$sheet_1->getStyle("A".$cab.":O".($cab+2) )->applyFromArray(array(
					'borders' => array(
								'allborders' => array(
												'style' => PHPExcel_Style_Border::BORDER_THIN)
							)
					));


				// ESTILOS  CABECERAS
			// CABECERA

		    // CUERPO

				//FORMATO DE FUENTE
				
				// **************************************************************************
				$inicio_cuerpo = $row = $cab + 4;// inicio de la fila del cuerpo
	
				$cambio = FALSE; // para intercarlar colores registros

				$ini = 0;
				$form_contador = 0;
				$com_total =  0;
				$com_concep = 0;
				$com_dilig 	= 0;
				$com_preg 	= 0;
				$com_sondeo = 0;
				$com_omision= 0;				
				$pes_total 	= 0;
				$pes_concep = 0;
				$pes_dilig 	= 0;
				$pes_preg 	= 0;
				$pes_sondeo = 0;
				$pes_omision= 0;				
				$acui_total = 0;
				$acui_concep = 0;
				$acui_dilig  = 0;
				$acui_preg 	 = 0;
				$acui_sondeo = 0;
				$acui_omision= 0;	
				$totales = TRUE;			
				$tot_total 	= 0;
				$tot_concep = 0;
				$tot_dilig 	= 0;
				$tot_preg 	=0;
				$tot_sondeo = 0;
				$tot_omision= 0;

				foreach ($departamentos->result() as $celda) {

					//$sheet_1->setCellValue('A'.$ini, $celda->DEPARTAMENTO);
					if ($totales) {
						$sheet_1->setCellValue('A'.$row, 'TOTAL');
					} else {
						$sheet_1->setCellValue('A'.$row, $celda->DEPARTAMENTO);
					}
					

					foreach ($reporte_by_dep->result() as $key) {
						if ($totales) {
							if ($key->TFORM == 14) {  
								$com_total 	= $com_total + $key->TOTAL;
								$com_concep = $com_concep + $key->CONCEP;
								$com_dilig 	= $com_dilig + $key->DILIG;
								$com_preg 	= $com_preg + $key->PREG;
								$com_sondeo = $com_sondeo + $key->SONDEO;
								$com_omision= $com_omision + $key->OMISION;
							}
							if ($key->TFORM == 12) {
								$pes_total 	= $pes_total + $key->TOTAL;
								$pes_concep = $pes_concep + $key->CONCEP;
								$pes_dilig 	= $pes_dilig + $key->DILIG;
								$pes_preg 	= $pes_preg + $key->PREG;
								$pes_sondeo = $pes_sondeo + $key->SONDEO;
								$pes_omision= $pes_omision + $key->OMISION;
							}	
							if ($key->TFORM == 13) { 
								$acui_total  = $acui_total + $key->TOTAL;
								$acui_concep = $acui_concep + $key->CONCEP;
								$acui_dilig  = $acui_dilig + $key->DILIG;
								$acui_preg 	 = $acui_preg + $key->PREG;
								$acui_sondeo = $acui_sondeo + $key->SONDEO;
								$acui_omision= $acui_omision + $key->OMISION;
							}

						}else if ($key->DEP_COD == $celda->ccdd) {
							if ($key->TFORM == 14) {  
								$com_total 	= $key->TOTAL;
								$com_concep = $key->CONCEP;
								$com_dilig 	= $key->DILIG;
								$com_preg 	= $key->PREG;
								$com_sondeo = $key->SONDEO;
								$com_omision= $key->OMISION;
							}
							if ($key->TFORM == 12) {
								$pes_total 	= $key->TOTAL;
								$pes_concep = $key->CONCEP;
								$pes_dilig 	= $key->DILIG;
								$pes_preg 	= $key->PREG;
								$pes_sondeo = $key->SONDEO;
								$pes_omision= $key->OMISION;
							}	
							if ($key->TFORM == 13) { 
								$acui_total  = $key->TOTAL;
								$acui_concep = $key->CONCEP;
								$acui_dilig  = $key->DILIG;
								$acui_preg 	 = $key->PREG;
								$acui_sondeo = $key->SONDEO;
								$acui_omision= $key->OMISION;
							}	
						}
					}

	
					$sheet_1->setCellValue('C'. ($row ), 'COMUNIDAD');
					$sheet_1->setCellValue('D'. ($row ), $com_total );
					$sheet_1->setCellValue('E'. ($row ), ($com_total >0) ? 100 : 0 );
					$sheet_1->setCellValue('F'. ($row ), $com_concep );
					$sheet_1->setCellValue('G'. ($row ), ($com_total >0) ? ( $com_concep*100)/$com_total : 0 );
					$sheet_1->setCellValue('H'. ($row ), $com_dilig );
					$sheet_1->setCellValue('I'. ($row ), ($com_total >0) ? ($com_dilig*100)/$com_total  : 0 );
					$sheet_1->setCellValue('J'. ($row ), $com_preg );
					$sheet_1->setCellValue('K'. ($row ), ($com_total >0) ? ($com_preg*100)/$com_total : 0 );
					$sheet_1->setCellValue('L'. ($row ), $com_sondeo );
					$sheet_1->setCellValue('M'. ($row ), ($com_total >0) ? ($com_sondeo*100)/$com_total : 0 );
					$sheet_1->setCellValue('N'. ($row ), $com_omision );
					$sheet_1->setCellValue('O'. ($row ), ($com_total >0) ? ($com_omision*100)/$com_total : 0 );

					$sheet_1->setCellValue('C'. ($row + 1), 'PESCADOR Y EMBARCACIONES PESQUERAS');
					$sheet_1->setCellValue('D'. ($row + 1), $pes_total );
					$sheet_1->setCellValue('E'. ($row + 1), ($pes_total >0) ? 100 : 0 );
					$sheet_1->setCellValue('F'. ($row + 1), $pes_concep );
					$sheet_1->setCellValue('G'. ($row + 1), ($pes_total >0) ? ( $pes_concep*100)/$pes_total : 0 );
					$sheet_1->setCellValue('H'. ($row + 1), $pes_dilig );
					$sheet_1->setCellValue('I'. ($row + 1), ($pes_total >0) ? ($pes_dilig*100)/$pes_total  : 0 );
					$sheet_1->setCellValue('J'. ($row + 1), $pes_preg );
					$sheet_1->setCellValue('K'. ($row + 1), ($pes_total >0) ? ($pes_preg*100)/$pes_total : 0 );
					$sheet_1->setCellValue('L'. ($row + 1), $pes_sondeo );
					$sheet_1->setCellValue('M'. ($row + 1), ($pes_total >0) ? ($pes_sondeo*100)/$pes_total : 0 );
					$sheet_1->setCellValue('N'. ($row + 1), $pes_omision );
					$sheet_1->setCellValue('O'. ($row + 1), ($pes_total >0) ? ($pes_omision*100)/$pes_total : 0 );

					$sheet_1->setCellValue('C'. ($row + 2), 'ACUICULTURA');
					$sheet_1->setCellValue('D'. ($row + 2), $acui_total );
					$sheet_1->setCellValue('E'. ($row + 2), ($acui_total >0) ? 100 : 0 );
					$sheet_1->setCellValue('F'. ($row + 2), $acui_concep );
					$sheet_1->setCellValue('G'. ($row + 2), ($acui_total >0) ? ( $acui_concep*100)/$acui_total : 0 );
					$sheet_1->setCellValue('H'. ($row + 2), $acui_dilig );
					$sheet_1->setCellValue('I'. ($row + 2), ($acui_total >0) ? ($acui_dilig*100)/$acui_total  : 0 );
					$sheet_1->setCellValue('J'. ($row + 2), $acui_preg );
					$sheet_1->setCellValue('K'. ($row + 2), ($acui_total >0) ? ($acui_preg*100)/$acui_total : 0 );
					$sheet_1->setCellValue('L'. ($row + 2), $acui_sondeo );
					$sheet_1->setCellValue('M'. ($row + 2), ($acui_total >0) ? ($acui_sondeo*100)/$acui_total : 0 );
					$sheet_1->setCellValue('N'. ($row + 2), $acui_omision );
					$sheet_1->setCellValue('O'. ($row + 2), ($acui_total >0) ? ($acui_omision*100)/$acui_total : 0 );
					
					$sheet_1->mergeCells('A'.$row.':'.'B'. ($row + 2) );// combina celdas de departamento
					$row = $row + 3; // siguiente fila , (departamento )
					if ($totales) {
						$sheet_1->getRowDimension($row)->setRowHeight(5); $sheet_1->mergeCells('A'.$row.':'.'O'. $row );//formato especial a columna vacia
						$row = $row + 1; }	//creando fila vacia para despues de totales					
					//}

					$totales = FALSE; //negamos totales					

					//reiniciadores
					$form_contador = 0;		
					$com_total  =  0;
					$com_concep = 0;
					$com_dilig 	= 0;
					$com_preg 	= 0;
					$com_sondeo = 0;
					$com_omision= 0;				
					$pes_total 	= 0;
					$pes_concep = 0;
					$pes_dilig 	= 0;
					$pes_preg 	= 0;
					$pes_sondeo = 0;
					$pes_omision= 0;				
					$acui_total = 0;
					$acui_concep = 0;
					$acui_dilig  = 0;
					$acui_preg 	 = 0;
					$acui_sondeo = 0;
					$acui_omision= 0;	

				}
				$fin_cuerpo = ($row - 1);
				$sheet_1->getStyle("A".$inicio_cuerpo.":O".($fin_cuerpo ) )->applyFromArray(array(
				'borders' => array(
							'allborders' => array(
											'style' => PHPExcel_Style_Border::BORDER_THIN)
						)
				));

				//ALINEAR DEPARTAMENTOS
				$sheet_1->getStyle("A".$inicio_cuerpo.":A".$fin_cuerpo)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);						
				$sheet_1->getStyle("A".$inicio_cuerpo.":A".$fin_cuerpo)->getAlignment()->setVertical(PHPExcel_Style_Alignment::VERTICAL_CENTER);		

				// FORMATO PORCENTAJES
				$sheet_1->getStyle('E'.$inicio_cuerpo.':E'.$fin_cuerpo)->getNumberFormat()->setFormatCode('0.00');// formato para codigo col A,
				$sheet_1->getStyle('G'.$inicio_cuerpo.':G'.$fin_cuerpo)->getNumberFormat()->setFormatCode('0.00');// formato para codigo col A,
				$sheet_1->getStyle('I'.$inicio_cuerpo.':I'.$fin_cuerpo)->getNumberFormat()->setFormatCode('0.00');// formato para codigo col A,
				$sheet_1->getStyle('K'.$inicio_cuerpo.':K'.$fin_cuerpo)->getNumberFormat()->setFormatCode('0.00');// formato para codigo col A,
				$sheet_1->getStyle('M'.$inicio_cuerpo.':M'.$fin_cuerpo)->getNumberFormat()->setFormatCode('0.00');// formato para codigo col A,
				$sheet_1->getStyle('O'.$inicio_cuerpo.':O'.$fin_cuerpo)->getNumberFormat()->setFormatCode('0.00');// formato para codigo col A,

				// COLOR A PORCENTAJES
				$sheet_1->getStyle('E'.$inicio_cuerpo.':E'.$fin_cuerpo)->getFont()->getColor()->setARGB(PHPExcel_Style_Color::COLOR_DARKBLUE);
				$sheet_1->getStyle('G'.$inicio_cuerpo.':G'.$fin_cuerpo)->getFont()->getColor()->setARGB(PHPExcel_Style_Color::COLOR_DARKBLUE);
				$sheet_1->getStyle('I'.$inicio_cuerpo.':I'.$fin_cuerpo)->getFont()->getColor()->setARGB(PHPExcel_Style_Color::COLOR_DARKBLUE);
				$sheet_1->getStyle('K'.$inicio_cuerpo.':K'.$fin_cuerpo)->getFont()->getColor()->setARGB(PHPExcel_Style_Color::COLOR_DARKBLUE);
				$sheet_1->getStyle('M'.$inicio_cuerpo.':M'.$fin_cuerpo)->getFont()->getColor()->setARGB(PHPExcel_Style_Color::COLOR_DARKBLUE);
				$sheet_1->getStyle('O'.$inicio_cuerpo.':O'.$fin_cuerpo)->getFont()->getColor()->setARGB(PHPExcel_Style_Color::COLOR_DARKBLUE);

				$sheet_1->getStyle('A9')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);	//opcional 

	 		// CUERPO

		/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
		///////////  H O J A   1 ////////////////////////////////////////////////////////////////////////////////////////////////////////
		/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////


		/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
		///////////  H O J A   2 ////////////////////////////////////////////////////////////////////////////////////////////////////////
		/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
			
			$reporte_by_sec		= $this->inform_reporte_model->get_report_by_sec();	// DEPS, y su data de META MARCO
		
			// pestaña
			$sheet_2 = $this->phpexcel->createSheet(1);	
			//$sheet2 = $this->phpexcel->setActiveSheetIndex(1);55
			//$sheet = $this->phpexcel->getActiveSheet(1);
			
			// formato de la hoja
				// Set Orientation, size and scaling
				//$objPHPExcel->setActiveSheetIndex(0);
				//$sheet_2->getPageSetup()->setOrientation(PHPExcel_Worksheet_PageSetup::ORIENTATION_LANDSCAPE);// horizontal
				$sheet_2->getPageSetup()->setOrientation(PHPExcel_Worksheet_PageSetup::ORIENTATION_PORTRAIT); // vertical
				$sheet_2->getPageSetup()->setPaperSize(PHPExcel_Worksheet_PageSetup::PAPERSIZE_A4);
				$sheet_2->getPageSetup()->setFitToPage(false); // ajustar pagina
				$sheet_2->getPageSetup()->setFitToWidth(1);
				$sheet_2->getPageSetup()->setFitToHeight(0);		
				$sheet_2->setShowGridlines(false);// oculta lineas de cuadricula		

				// margin is set in inches (0.5cm)
				$margin = 0.5 / 2.54;
				//$sheet_2->getPageMargins->setTop($margin);
				//$sheet_2->getPageMargins->setBottom($margin);
				$sheet_2->getPageMargins()->setLeft($margin);
				$sheet_2->getPageMargins()->setRight($margin);


			// formato de la hoja

			// ANCHO Y ALTURA DE COLUMNAS DEL FILE
				$sheet_2->getColumnDimension('A')->setWidth(5);
				$sheet_2->getColumnDimension('B')->setWidth(45);
				$sheet_2->getColumnDimension('C')->setWidth(15);
		
				$sheet_2->getRowDimension(1)->setRowHeight(2);
				$sheet_2->getRowDimension(2)->setRowHeight(2);
				$sheet_2->getRowDimension(3)->setRowHeight(2);
				$sheet_2->getRowDimension(4)->setRowHeight(2);
				$sheet_2->getRowDimension(6)->setRowHeight(10);
				$sheet_2->getRowDimension(7)->setRowHeight(10);
				$sheet_2->getRowDimension(8)->setRowHeight(30);
				$sheet_2->getRowDimension(9)->setRowHeight(10);
				$sheet_2->getRowDimension(10)->setRowHeight(15);
				$sheet_2->getRowDimension(11)->setRowHeight(35);
				$sheet_2->getRowDimension(12)->setRowHeight(15);
				$sheet_2->getRowDimension(13)->setRowHeight(5);
		
			// ANCHO Y ALTURA DE COLUMNAS DEL FILE

			// TITULOS
				$sheet_2->setCellValue('A3','INSTITUTO NACIONAL DE ESTADÍSTICA E INFORMATICA');
				$sheet_2->mergeCells('A3:O3');
				$sheet_2->setCellValue('A5','PRIMER CENSO NACIONAL DE PESCA CONTINENTAL' );
				$sheet_2->mergeCells('A5:O5');
				$sheet_2->setCellValue('A8','PRIMERA SUPERVISIÓN: TOTAL DE ERRORES POR TIPO, SEGÚN TIPO DE FORMULARIO Y SECCIÓN' );
				$sheet_2->mergeCells('A8:O8');	
						
				$sheet_2->getStyle('A3:O9')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);	
				$sheet_2->getStyle('A3:O9')->getFont()->getColor()->setARGB(PHPExcel_Style_Color::COLOR_BLACK);
				$sheet_2->getStyle('A3:O9')->getFont()->setname('Arial black')->setSize(30);	
				$sheet_2->getStyle('A5:O9')->getFont()->setname('Arial ')->setSize(20);	
				$sheet_2->getStyle('A8')->getFont()->setname('Arial black')->setSize(12);	

				// LOGO
		          $objDrawing = new PHPExcel_Worksheet_Drawing();
		          $objDrawing->setWorksheet($sheet_2);
		          $objDrawing->setName("inei");
		          $objDrawing->setDescription("Inei");
		          $objDrawing->setPath("img/inei.jpeg");
		          $objDrawing->setCoordinates('A5');
		          $objDrawing->setHeight(80);
		          $objDrawing->setWidth(120);
		          $objDrawing->setOffsetX(10);
		          $objDrawing->setOffsetY(30);

		          $objDrawing2 = new PHPExcel_Worksheet_Drawing();
		          $objDrawing2->setWorksheet($sheet_2);
		          $objDrawing2->setName("CENPESCO");
		          $objDrawing2->setDescription("CENPESCO");
		          $objDrawing2->setPath("img/cenpesco.jpg");
		          $objDrawing2->setCoordinates('N5');
		          $objDrawing2->setHeight(60);
		          $objDrawing2->setWidth(90);
		          $objDrawing2->setOffsetX(280);
		          $objDrawing2->setOffsetY(20);
			// TITULOS


			// CABECERA
				// INICIO DE LA  cabecera
				$cab = 10;	
					
				// NOMBRE CABECERAS

						$sheet_2->setCellValue('A'.$cab,'TIPO FORMULARIO');
						$sheet_2->mergeCells('A'.$cab.':B'.($cab+2));
						$sheet_2->setCellValue('C'.$cab,'SECCIÓN' );
							$sheet_2->mergeCells('C'.$cab.':C'.($cab+2));
						$sheet_2->setCellValue('D'.$cab,'TOTAL' );
						$sheet_2->mergeCells('D'.$cab.':E'.($cab+1));
							$sheet_2->setCellValue('D'.($cab+2),'Abs.' );
							$sheet_2->setCellValue('E'.($cab+2),'%' );
						$sheet_2->setCellValue('F'.$cab,'TIPO DE ERROR' );
						$sheet_2->mergeCells('F'.$cab.':O'.($cab));
							$sheet_2->setCellValue('F'.($cab+1),'CONCEPTO' );
							$sheet_2->mergeCells('F'.($cab+1).':G'.($cab+1));
								$sheet_2->setCellValue('F'.($cab+2),'Abs.' );
								$sheet_2->setCellValue('G'.($cab+2),'%' );
							$sheet_2->setCellValue('H'.($cab+1),'DELIGENCIAMIENTO' );
							$sheet_2->mergeCells('H'.($cab+1).':I'.($cab+1));
								$sheet_2->setCellValue('H'.($cab+2),'Abs.' );
								$sheet_2->setCellValue('I'.($cab+2),'%' );
							$sheet_2->setCellValue('J'.($cab+1),'FORMULACION' );
							$sheet_2->mergeCells('J'.($cab+1).':K'.($cab+1));
								$sheet_2->setCellValue('J'.($cab+2),'Abs.' );
								$sheet_2->setCellValue('K'.($cab+2),'%' );
							$sheet_2->setCellValue('L'.($cab+1),'SONDEO' );
							$sheet_2->mergeCells('L'.($cab+1).':M'.($cab+1));
								$sheet_2->setCellValue('L'.($cab+2),'Abs.' );
								$sheet_2->setCellValue('M'.($cab+2),'%' );
							$sheet_2->setCellValue('N'.($cab+1),'OMISIÓN' );
							$sheet_2->mergeCells('N'.($cab+1).':O'.($cab+1));
								$sheet_2->setCellValue('N'.($cab+2),'Abs.' );
								$sheet_2->setCellValue('O'.($cab+2),'%' );

				// NOMBRE CABECERAS

				// ESTILOS  CABECERAS
					$sheet_2->getStyle("A".$cab.":BI".($cab+2))->getAlignment()->setWrapText(true);// AJUSTA TEXTO A CELDA
					$sheet_2->getStyle("A".$cab.":BI".($cab+2))->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);						
					$sheet_2->getStyle("A".$cab.":BI".($cab+2))->getAlignment()->setVertical(PHPExcel_Style_Alignment::VERTICAL_CENTER);						
					$sheet_2->getStyle("A".$cab.":BI".($cab+2))->getFont()->getColor()->setARGB(PHPExcel_Style_Color::COLOR_WHITE);
					$sheet_2->getStyle("A".$cab.":BI".($cab+2))->getFont()->setname('Arial')->setSize(11);

					$sheet_2->getStyle("A".$cab.":O".($cab+2) )->applyFromArray($color_celda_cabeceras); // AZUL DEFECTO

					$sheet_2->getStyle('H11')->getFont()->setname('Arial ')->setSize(9); // tamaño especial para esta celda

					$sheet_2->getStyle("A".$cab.":O".($cab+2) )->applyFromArray(array(
					'borders' => array(
								'allborders' => array(
												'style' => PHPExcel_Style_Border::BORDER_THIN)
							)
					));


				// ESTILOS  CABECERAS
			// CABECERA

		    // CUERPO

				//FORMATO DE FUENTE

				// **************************************************************************
				$inicio_cuerpo = $row = $cab + 4;// inicio de la fila del cuerpo
	
				$cambio = FALSE; // para intercarlar colores registros

				$ini = 0;
				$nom_form = NULL;
				$form_contador = 0;		
				$sec_total  =  0;
				$sec_concep = 0;
				$sec_dilig 	= 0;
				$sec_preg 	= 0;
				$sec_sondeo = 0;
				$sec_omision= 0;
				$cont_com = 0;	
				$cont_pes = 0;	
				$cont_acui = 0;	
				$contador = 0;

				foreach ($reporte_by_sec ->result() as $key) {

						$contador = $contador + 1;
						if ($key->TFORM == 14) {  

							
							$sheet_2->setCellValue('A'. $row , 'FORMULARIO DE LA COMUNIDAD');
							$cont_com++;						
						}
						if ($key->TFORM == 12) {
							if ( $cont_pes == 0 ) {// incia  ingreso 	
								$sheet_2->mergeCells('A'. ($row -  $cont_com ).':B'. ($row - 1) );// combina celdas de form pescador				
								$sheet_2->mergeCells('A'.$row.':O'.$row); $sheet_2->getRowDimension($row)->setRowHeight(5);  //generar fila vacia al incio y combinada;
								$row = $row + 1;  // la siguiente fila
								$sheet_2->setCellValue('A'. ($row ), 'FORMULARIO DEL PESCADOR Y EMBARCACIONES PESQUERAS');
							} 						
							
							$cont_pes++;
						}
						if ($key->TFORM == 13) { 
							if ( $cont_acui == 0 ) { // incia  ingreso 
								$sheet_2->mergeCells('A'.($row - $cont_pes).':B'. ($row - 1) );// combina celdas de form pescador
								$sheet_2->mergeCells('A'.$row.':O'.$row); $sheet_2->getRowDimension($row)->setRowHeight(5); //generar fila vacia al incio y combinada;
								$row = $row + 1;  // la siguiente fila
								$sheet_2->setCellValue('A'. ($row ), 'FORMULARIO DE ACUICULTURA');
							} 	
							if ( $reporte_by_sec ->num_rows() == $contador ){
								$sheet_2->mergeCells('A'.($row - $cont_acui) .':B'. $row  );// combina celdas de form
							}
							$cont_acui++;							
						}	

						$sec_num	=  array_search($key->SECCION, $romanos);// convierte a romanos
						$sec_total 	= $key->TOTAL;
						$sec_concep = $key->CONCEP;
						$sec_dilig 	= $key->DILIG;
						$sec_preg 	= $key->PREG;
						$sec_sondeo = $key->SONDEO;
						$sec_omision= $key->OMISION;					

						$sheet_2->setCellValue('C'. ($row ), $sec_num);
						$sheet_2->setCellValue('D'. ($row ), $sec_total );
						$sheet_2->setCellValue('E'. ($row ), ($sec_total >0) ? 100 : 0 );
						$sheet_2->setCellValue('F'. ($row ), $sec_concep );
						$sheet_2->setCellValue('G'. ($row ), ($sec_total >0) ? ( $sec_concep*100)/$sec_total : 0 );
						$sheet_2->setCellValue('H'. ($row ), $sec_dilig );
						$sheet_2->setCellValue('I'. ($row ), ($sec_total >0) ? ($sec_dilig*100)/$sec_total  : 0 );
						$sheet_2->setCellValue('J'. ($row ), $sec_preg );
						$sheet_2->setCellValue('K'. ($row ), ($sec_total >0) ? ($sec_preg*100)/$sec_total : 0 );
						$sheet_2->setCellValue('L'. ($row ), $sec_sondeo );
						$sheet_2->setCellValue('M'. ($row ), ($sec_total >0) ? ($sec_sondeo*100)/$sec_total : 0 );
						$sheet_2->setCellValue('N'. ($row ), $sec_omision );
						$sheet_2->setCellValue('O'. ($row ), ($sec_total >0) ? ($sec_omision*100)/$sec_total : 0 );
						
						$row = $row + 1; // siguiente fila , (departamento )
						
						//reiniciadores
						$nom_form = NULL;
						$form_contador = 0;		
						$sec_total  =  0;
						$sec_concep = 0;
						$sec_dilig 	= 0;
						$sec_preg 	= 0;
						$sec_sondeo = 0;
						$sec_omision= 0;		

				}
				// $sheet_2->setCellValue('A14', 'FORMULARIO DE LA COMUNIDAD');
				// $sheet_2->mergeCells('A14:B20');
				// $sheet_2->mergeCells('A14:B21');
				$fin_cuerpo = ($row - 1);
				$sheet_2->getStyle("A".$inicio_cuerpo.":O".($fin_cuerpo ) )->applyFromArray(array(
				'borders' => array(
							'allborders' => array(
											'style' => PHPExcel_Style_Border::BORDER_THIN)
						)
				));

				//ALINEAR DEPARTAMENTOS

				$sheet_2->getStyle("A".$inicio_cuerpo.":C".$fin_cuerpo)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);						
				$sheet_2->getStyle("A".$inicio_cuerpo.":C".$fin_cuerpo)->getAlignment()->setVertical(PHPExcel_Style_Alignment::VERTICAL_CENTER);		
				$sheet_2->getStyle("A".$inicio_cuerpo.":C".$fin_cuerpo)->getAlignment()->setWrapText(true);// AJUSTA TEXTO A CELDA

				// FORMATO PORCENTAJES
				$sheet_2->getStyle('E'.$inicio_cuerpo.':E'.$fin_cuerpo)->getNumberFormat()->setFormatCode('0.00');// formato para codigo col A,
				$sheet_2->getStyle('G'.$inicio_cuerpo.':G'.$fin_cuerpo)->getNumberFormat()->setFormatCode('0.00');// formato para codigo col A,
				$sheet_2->getStyle('I'.$inicio_cuerpo.':I'.$fin_cuerpo)->getNumberFormat()->setFormatCode('0.00');// formato para codigo col A,
				$sheet_2->getStyle('K'.$inicio_cuerpo.':K'.$fin_cuerpo)->getNumberFormat()->setFormatCode('0.00');// formato para codigo col A,
				$sheet_2->getStyle('M'.$inicio_cuerpo.':M'.$fin_cuerpo)->getNumberFormat()->setFormatCode('0.00');// formato para codigo col A,
				$sheet_2->getStyle('O'.$inicio_cuerpo.':O'.$fin_cuerpo)->getNumberFormat()->setFormatCode('0.00');// formato para codigo col A,

				// COLOR A PORCENTAJES
				$sheet_2->getStyle('E'.$inicio_cuerpo.':E'.$fin_cuerpo)->getFont()->getColor()->setARGB(PHPExcel_Style_Color::COLOR_DARKBLUE);
				$sheet_2->getStyle('G'.$inicio_cuerpo.':G'.$fin_cuerpo)->getFont()->getColor()->setARGB(PHPExcel_Style_Color::COLOR_DARKBLUE);
				$sheet_2->getStyle('I'.$inicio_cuerpo.':I'.$fin_cuerpo)->getFont()->getColor()->setARGB(PHPExcel_Style_Color::COLOR_DARKBLUE);
				$sheet_2->getStyle('K'.$inicio_cuerpo.':K'.$fin_cuerpo)->getFont()->getColor()->setARGB(PHPExcel_Style_Color::COLOR_DARKBLUE);
				$sheet_2->getStyle('M'.$inicio_cuerpo.':M'.$fin_cuerpo)->getFont()->getColor()->setARGB(PHPExcel_Style_Color::COLOR_DARKBLUE);
				$sheet_2->getStyle('O'.$inicio_cuerpo.':O'.$fin_cuerpo)->getFont()->getColor()->setARGB(PHPExcel_Style_Color::COLOR_DARKBLUE);

				$sheet_2->getStyle('A9')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);	//opcional 

	 		// CUERPO

		/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
		///////////  H O J A   2 ////////////////////////////////////////////////////////////////////////////////////////////////////////
		/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////


		/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
		///////////  H O J A   3 ////////////////////////////////////////////////////////////////////////////////////////////////////////
		/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
			
			$reporte_com_by_preg		= $this->inform_reporte_model->get_report_com_by_preg();	// DEPS, y su data de META MARCO
		
			// pestaña
			$sheet_3 = $this->phpexcel->createSheet(2);	
			//$sheet2 = $this->phpexcel->setActiveSheetIndex(1);55
			//$sheet = $this->phpexcel->getActiveSheet(1);
			
			// formato de la hoja
				// Set Orientation, size and scaling
				//$objPHPExcel->setActiveSheetIndex(0);
				//$sheet_3->getPageSetup()->setOrientation(PHPExcel_Worksheet_PageSetup::ORIENTATION_LANDSCAPE);// horizontal
				$sheet_3->getPageSetup()->setOrientation(PHPExcel_Worksheet_PageSetup::ORIENTATION_PORTRAIT); // vertical
				$sheet_3->getPageSetup()->setPaperSize(PHPExcel_Worksheet_PageSetup::PAPERSIZE_A4);
				$sheet_3->getPageSetup()->setFitToPage(false); // ajustar pagina
				$sheet_3->getPageSetup()->setFitToWidth(1);
				$sheet_3->getPageSetup()->setFitToHeight(0);		
				$sheet_3->setShowGridlines(false);// oculta lineas de cuadricula		

				// margin is set in inches (0.5cm)
				$margin = 0.5 / 2.54;
				//$sheet_3->getPageMargins->setTop($margin);
				//$sheet_3->getPageMargins->setBottom($margin);
				$sheet_3->getPageMargins()->setLeft($margin);
				$sheet_3->getPageMargins()->setRight($margin);


			// formato de la hoja

			// ANCHO Y ALTURA DE COLUMNAS DEL FILE
				$sheet_3->getColumnDimension('A')->setWidth(5);
				$sheet_3->getColumnDimension('B')->setWidth(45);
				$sheet_3->getColumnDimension('C')->setWidth(15);
				$sheet_3->getColumnDimension('D')->setWidth(15);
		
				$sheet_3->getRowDimension(1)->setRowHeight(2);
				$sheet_3->getRowDimension(2)->setRowHeight(2);
				$sheet_3->getRowDimension(3)->setRowHeight(2);
				$sheet_3->getRowDimension(4)->setRowHeight(2);
				$sheet_3->getRowDimension(6)->setRowHeight(10);
				$sheet_3->getRowDimension(7)->setRowHeight(10);
				$sheet_3->getRowDimension(8)->setRowHeight(30);
				$sheet_3->getRowDimension(9)->setRowHeight(10);
				$sheet_3->getRowDimension(10)->setRowHeight(15);
				$sheet_3->getRowDimension(11)->setRowHeight(35);
				$sheet_3->getRowDimension(12)->setRowHeight(15);
				$sheet_3->getRowDimension(13)->setRowHeight(5);
		
			// ANCHO Y ALTURA DE COLUMNAS DEL FILE

			// TITULOS
				$sheet_3->setCellValue('A3','INSTITUTO NACIONAL DE ESTADÍSTICA E INFORMATICA');
				$sheet_3->mergeCells('A3:O3');
				$sheet_3->setCellValue('A5','PRIMER CENSO NACIONAL DE PESCA CONTINENTAL' );
				$sheet_3->mergeCells('A5:O5');
				$sheet_3->setCellValue('A8','FORMULARIO DE LA COMUNIDAD: TOTAL DE ERRORES POR TIPO, SEGÚN SECCIÓN Y PREGUNTA' );
				$sheet_3->mergeCells('A8:O8');	
						
				$sheet_3->getStyle('A3:O9')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);	
				$sheet_3->getStyle('A3:O9')->getFont()->getColor()->setARGB(PHPExcel_Style_Color::COLOR_BLACK);
				$sheet_3->getStyle('A3:O9')->getFont()->setname('Arial black')->setSize(30);	
				$sheet_3->getStyle('A5:O9')->getFont()->setname('Arial ')->setSize(20);	
				$sheet_3->getStyle('A8')->getFont()->setname('Arial black')->setSize(12);	

				// LOGO
		          $objDrawing = new PHPExcel_Worksheet_Drawing();
		          $objDrawing->setWorksheet($sheet_3);
		          $objDrawing->setName("inei");
		          $objDrawing->setDescription("Inei");
		          $objDrawing->setPath("img/inei.jpeg");
		          $objDrawing->setCoordinates('A5');
		          $objDrawing->setHeight(80);
		          $objDrawing->setWidth(120);
		          $objDrawing->setOffsetX(10);
		          $objDrawing->setOffsetY(30);

		          $objDrawing2 = new PHPExcel_Worksheet_Drawing();
		          $objDrawing2->setWorksheet($sheet_3);
		          $objDrawing2->setName("CENPESCO");
		          $objDrawing2->setDescription("CENPESCO");
		          $objDrawing2->setPath("img/cenpesco.jpg");
		          $objDrawing2->setCoordinates('O5');
		          $objDrawing2->setHeight(60);
		          $objDrawing2->setWidth(90);
		          $objDrawing2->setOffsetX(280);
		          $objDrawing2->setOffsetY(20);
			// TITULOS


			// CABECERA
				// INICIO DE LA  cabecera
				$cab = 10;	
					
				// NOMBRE CABECERAS

						$sheet_3->setCellValue('A'.$cab,'TIPO FORMULARIO');
						$sheet_3->mergeCells('A'.$cab.':B'.($cab+2));
						$sheet_3->setCellValue('C'.$cab,'SECCIÓN' );
							$sheet_3->mergeCells('C'.$cab.':C'.($cab+2));
						$sheet_3->setCellValue('D'.$cab,'PREGUNTA' );
							$sheet_3->mergeCells('D'.$cab.':D'.($cab+2));							
						$sheet_3->setCellValue('E'.$cab,'TOTAL' );
						$sheet_3->mergeCells('E'.$cab.':F'.($cab+1));
							$sheet_3->setCellValue('E'.($cab+2),'Abs.' );
							$sheet_3->setCellValue('F'.($cab+2),'%' );
						$sheet_3->setCellValue('G'.$cab,'TIPO DE ERROR' );
						$sheet_3->mergeCells('G'.$cab.':P'.($cab));
							$sheet_3->setCellValue('G'.($cab+1),'CONCEPTO' );
							$sheet_3->mergeCells('G'.($cab+1).':H'.($cab+1));
								$sheet_3->setCellValue('G'.($cab+2),'Abs.' );
								$sheet_3->setCellValue('H'.($cab+2),'%' );
							$sheet_3->setCellValue('I'.($cab+1),'DELIGENCIAMIENTO' );
							$sheet_3->mergeCells('I'.($cab+1).':J'.($cab+1));
								$sheet_3->setCellValue('I'.($cab+2),'Abs.' );
								$sheet_3->setCellValue('J'.($cab+2),'%' );
							$sheet_3->setCellValue('K'.($cab+1),'FORMULACION' );
							$sheet_3->mergeCells('K'.($cab+1).':L'.($cab+1));
								$sheet_3->setCellValue('K'.($cab+2),'Abs.' );
								$sheet_3->setCellValue('L'.($cab+2),'%' );
							$sheet_3->setCellValue('M'.($cab+1),'SONDEO' );
							$sheet_3->mergeCells('M'.($cab+1).':N'.($cab+1));
								$sheet_3->setCellValue('M'.($cab+2),'Abs.' );
								$sheet_3->setCellValue('N'.($cab+2),'%' );
							$sheet_3->setCellValue('O'.($cab+1),'OMISIÓN' );
							$sheet_3->mergeCells('O'.($cab+1).':P'.($cab+1));
								$sheet_3->setCellValue('O'.($cab+2),'Abs.' );
								$sheet_3->setCellValue('P'.($cab+2),'%' );

				// NOMBRE CABECERAS

				// ESTILOS  CABECERAS
					$sheet_3->getStyle("A".$cab.":P".($cab+2))->getAlignment()->setWrapText(true);// AJUSTA TEXTO A CELDA
					$sheet_3->getStyle("A".$cab.":P".($cab+2))->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);						
					$sheet_3->getStyle("A".$cab.":P".($cab+2))->getAlignment()->setVertical(PHPExcel_Style_Alignment::VERTICAL_CENTER);						
					$sheet_3->getStyle("A".$cab.":P".($cab+2))->getFont()->getColor()->setARGB(PHPExcel_Style_Color::COLOR_WHITE);
					$sheet_3->getStyle("A".$cab.":P".($cab+2))->getFont()->setname('Arial')->setSize(11);

					$sheet_3->getStyle("A".$cab.":P".($cab+2) )->applyFromArray($color_celda_cabeceras); // AZUL DEFECTO

					$sheet_3->getStyle('I11')->getFont()->setname('Arial ')->setSize(9); // tamaño especial para esta celda

					$sheet_3->getStyle("A".$cab.":P".($cab+2) )->applyFromArray(array(
					'borders' => array(
								'allborders' => array(
												'style' => PHPExcel_Style_Border::BORDER_THIN)
							)
					));

				// ESTILOS  CABECERAS
			// CABECERA

		    // CUERPO

				//FORMATO DE FUENTE

				// **************************************************************************
				$inicio_cuerpo = $row = $cab + 4;// inicio de la fila del cuerpo
	
				$cambio = FALSE; // para intercarlar colores registros

				$ini = 0;
				$form_contador 	= 0;		
				$preg_sec  		= 0;
				$preg_num  		= 0;
				$preg_total		= 0;
				$preg_concep 	= 0;
				$preg_dilig 	= 0;
				$preg_preg 		= 0;
				$preg_sondeo 	= 0;
				$preg_omision	= 0;
				$pregt_com 		= 0;	
				$pregt_pes 		= 0;	

				$seccion_actual = 0;
				$acumulador_s 	= 0; 	
				$contador 		= 0;

				foreach ($reporte_com_by_preg ->result() as $key) {
					$contador =  $contador + 1;
						if ( $seccion_actual <> $key->SECCION ) {
							$seccion_actual = $key->SECCION;

							$preg_sec		= array_search($key->SECCION, $romanos); // convierte a romanos
							$sheet_3->setCellValue('C'. ($row ), $preg_sec);

							if ($acumulador_s > 1){
								$sheet_3->mergeCells('C' . ($row - $acumulador_s) . ':C' . ($row - 1) );// merge para la seccion anterior
							}
							$acumulador_s 	= 1; // reinicia el acumulador
						}else{							
							if ( $contador == $reporte_com_by_preg->num_rows()) {//ultimo registro
								$sheet_3->mergeCells('C' . ($row - $acumulador_s) . ':C' . ($row ) );// merge para la ultima seccion
							}	
							$acumulador_s =  $acumulador_s + 1;							
							
						}//echo  $contador . ' - ' . $reporte_com_by_preg->num_rows() . '<br>';

						$preg_num		= $key->PREGUNTA;// convierte a romanos
						$preg_total 	= $key->TOTAL;
						$preg_concep 	= $key->CONCEP;
						$preg_dilig 	= $key->DILIG;
						$preg_preg 		= $key->PREG;
						$preg_sondeo 	= $key->SONDEO;
						$preg_omision	= $key->OMISION;					
						
						
						$sheet_3->setCellValue('D'. ($row ), $preg_num);
						$sheet_3->setCellValue('E'. ($row ), $preg_total );
						$sheet_3->setCellValue('F'. ($row ), ($preg_total >0) ? 100 : 0 );
						$sheet_3->setCellValue('G'. ($row ), $preg_concep );
						$sheet_3->setCellValue('H'. ($row ), ($preg_total >0) ? ( $preg_concep*100)/$preg_total : 0 );
						$sheet_3->setCellValue('I'. ($row ), $preg_dilig );
						$sheet_3->setCellValue('J'. ($row ), ($preg_total >0) ? ($preg_dilig*100)/$preg_total  : 0 );
						$sheet_3->setCellValue('K'. ($row ), $preg_preg );
						$sheet_3->setCellValue('L'. ($row ), ($preg_total >0) ? ($preg_preg*100)/$preg_total : 0 );
						$sheet_3->setCellValue('M'. ($row ), $preg_sondeo );
						$sheet_3->setCellValue('N'. ($row ), ($preg_total >0) ? ($preg_sondeo*100)/$preg_total : 0 );
						$sheet_3->setCellValue('O'. ($row ), $preg_omision );
						$sheet_3->setCellValue('P'. ($row ), ($preg_total >0) ? ($preg_omision*100)/$preg_total : 0 );
						
						$row = $row + 1; // siguiente fila , (departamento )
						
						//reiniciadores
						$preg_num  		= 0;
						$preg_total		= 0;
						$preg_concep 	= 0;
						$preg_dilig 	= 0;
						$preg_preg 		= 0;
						$preg_sondeo 	= 0;
						$preg_omision	= 0;		
				}

				$fin_cuerpo = ($row - 1);

				$sheet_3->setCellValue('A'. $inicio_cuerpo, 'FORMULARIO DE LA COMUNIDAD');
				$sheet_3->mergeCells('A'. $inicio_cuerpo . ':B' . $fin_cuerpo);
				$sheet_3->getStyle('A'. $inicio_cuerpo)->getAlignment()->setWrapText(true);// AJUSTA TEXTO A CELDA
				//$sheet_3->mergeCells('A14:B21');
				
				$sheet_3->getStyle("A".$inicio_cuerpo.":P".($fin_cuerpo ) )->applyFromArray(array(
				'borders' => array(
							'allborders' => array(
											'style' => PHPExcel_Style_Border::BORDER_THIN)
						)
				));

				//ALINEAR DEPARTAMENTOS

				$sheet_3->getStyle("A".$inicio_cuerpo.":C".$fin_cuerpo)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);						
				$sheet_3->getStyle("A".$inicio_cuerpo.":C".$fin_cuerpo)->getAlignment()->setVertical(PHPExcel_Style_Alignment::VERTICAL_CENTER);		

				// FORMATO PORCENTAJES
				$sheet_3->getStyle('F'.$inicio_cuerpo.':F'.$fin_cuerpo)->getNumberFormat()->setFormatCode('0.00');// formato para codigo col A,
				$sheet_3->getStyle('H'.$inicio_cuerpo.':H'.$fin_cuerpo)->getNumberFormat()->setFormatCode('0.00');// formato para codigo col A,
				$sheet_3->getStyle('J'.$inicio_cuerpo.':J'.$fin_cuerpo)->getNumberFormat()->setFormatCode('0.00');// formato para codigo col A,
				$sheet_3->getStyle('L'.$inicio_cuerpo.':L'.$fin_cuerpo)->getNumberFormat()->setFormatCode('0.00');// formato para codigo col A,
				$sheet_3->getStyle('N'.$inicio_cuerpo.':N'.$fin_cuerpo)->getNumberFormat()->setFormatCode('0.00');// formato para codigo col A,
				$sheet_3->getStyle('P'.$inicio_cuerpo.':P'.$fin_cuerpo)->getNumberFormat()->setFormatCode('0.00');// formato para codigo col A,

				// COLOR A PORCENTAJES
				$sheet_3->getStyle('F'.$inicio_cuerpo.':F'.$fin_cuerpo)->getFont()->getColor()->setARGB(PHPExcel_Style_Color::COLOR_DARKBLUE);
				$sheet_3->getStyle('H'.$inicio_cuerpo.':H'.$fin_cuerpo)->getFont()->getColor()->setARGB(PHPExcel_Style_Color::COLOR_DARKBLUE);
				$sheet_3->getStyle('J'.$inicio_cuerpo.':J'.$fin_cuerpo)->getFont()->getColor()->setARGB(PHPExcel_Style_Color::COLOR_DARKBLUE);
				$sheet_3->getStyle('L'.$inicio_cuerpo.':L'.$fin_cuerpo)->getFont()->getColor()->setARGB(PHPExcel_Style_Color::COLOR_DARKBLUE);
				$sheet_3->getStyle('N'.$inicio_cuerpo.':N'.$fin_cuerpo)->getFont()->getColor()->setARGB(PHPExcel_Style_Color::COLOR_DARKBLUE);
				$sheet_3->getStyle('P'.$inicio_cuerpo.':P'.$fin_cuerpo)->getFont()->getColor()->setARGB(PHPExcel_Style_Color::COLOR_DARKBLUE);

				$sheet_3->getStyle('A9')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);	//opcional 

	 		// CUERPO

		/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
		///////////  H O J A   3 ////////////////////////////////////////////////////////////////////////////////////////////////////////
		/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

		/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
		///////////  H O J A   4 ////////////////////////////////////////////////////////////////////////////////////////////////////////
		/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
			
			$reporte_pes_by_preg		= $this->inform_reporte_model->get_report_pes_by_preg();	// 
		
			// pestaña
			$sheet_4 = $this->phpexcel->createSheet(3);	

			
			// formato de la hoja
				// Set Orientation, size and scaling
				//$objPHPExcel->setActiveSheetIndex(0);
				//$sheet_4->getPageSetup()->setOrientation(PHPExcel_Worksheet_PageSetup::ORIENTATION_LANDSCAPE);// horizontal
				$sheet_4->getPageSetup()->setOrientation(PHPExcel_Worksheet_PageSetup::ORIENTATION_PORTRAIT); // vertical
				$sheet_4->getPageSetup()->setPaperSize(PHPExcel_Worksheet_PageSetup::PAPERSIZE_A4);
				$sheet_4->getPageSetup()->setFitToPage(false); // ajustar pagina
				$sheet_4->getPageSetup()->setFitToWidth(1);
				$sheet_4->getPageSetup()->setFitToHeight(0);		
				$sheet_4->setShowGridlines(false);// oculta lineas de cuadricula		

				// margin is set in inches (0.5cm)
				$margin = 0.5 / 2.54;
				//$sheet_4->getPageMargins->setTop($margin);
				//$sheet_4->getPageMargins->setBottom($margin);
				$sheet_4->getPageMargins()->setLeft($margin);
				$sheet_4->getPageMargins()->setRight($margin);


			// formato de la hoja

			// ANCHO Y ALTURA DE COLUMNAS DEL FILE
				$sheet_4->getColumnDimension('A')->setWidth(5);
				$sheet_4->getColumnDimension('B')->setWidth(45);
				$sheet_4->getColumnDimension('C')->setWidth(15);
				$sheet_4->getColumnDimension('D')->setWidth(15);
		
				$sheet_4->getRowDimension(1)->setRowHeight(2);
				$sheet_4->getRowDimension(2)->setRowHeight(2);
				$sheet_4->getRowDimension(3)->setRowHeight(2);
				$sheet_4->getRowDimension(4)->setRowHeight(2);
				$sheet_4->getRowDimension(6)->setRowHeight(10);
				$sheet_4->getRowDimension(7)->setRowHeight(10);
				$sheet_4->getRowDimension(8)->setRowHeight(30);
				$sheet_4->getRowDimension(9)->setRowHeight(10);
				$sheet_4->getRowDimension(10)->setRowHeight(15);
				$sheet_4->getRowDimension(11)->setRowHeight(35);
				$sheet_4->getRowDimension(12)->setRowHeight(15);
				$sheet_4->getRowDimension(13)->setRowHeight(5);
		
			// ANCHO Y ALTURA DE COLUMNAS DEL FILE

			// TITULOS
				$sheet_4->setCellValue('A3','INSTITUTO NACIONAL DE ESTADÍSTICA E INFORMATICA');
				$sheet_4->mergeCells('A3:O3');
				$sheet_4->setCellValue('A5','PRIMER CENSO NACIONAL DE PESCA CONTINENTAL' );
				$sheet_4->mergeCells('A5:O5');
				$sheet_4->setCellValue('A8','FORMULARIO DEL PESCADOR Y EMBARCACIONES PESQUERAS: TOTAL DE ERRORES POR TIPO, SEGÚN SECCIÓN Y PREGUNTA' );
				$sheet_4->mergeCells('A8:O8');	
						
				$sheet_4->getStyle('A3:O9')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);	
				$sheet_4->getStyle('A3:O9')->getFont()->getColor()->setARGB(PHPExcel_Style_Color::COLOR_BLACK);
				$sheet_4->getStyle('A3:O9')->getFont()->setname('Arial black')->setSize(30);	
				$sheet_4->getStyle('A5:O9')->getFont()->setname('Arial ')->setSize(20);	
				$sheet_4->getStyle('A8')->getFont()->setname('Arial black')->setSize(12);	

				// LOGO
		          $objDrawing = new PHPExcel_Worksheet_Drawing();
		          $objDrawing->setWorksheet($sheet_4);
		          $objDrawing->setName("inei");
		          $objDrawing->setDescription("Inei");
		          $objDrawing->setPath("img/inei.jpeg");
		          $objDrawing->setCoordinates('A5');
		          $objDrawing->setHeight(80);
		          $objDrawing->setWidth(120);
		          $objDrawing->setOffsetX(10);
		          $objDrawing->setOffsetY(30);

		          $objDrawing2 = new PHPExcel_Worksheet_Drawing();
		          $objDrawing2->setWorksheet($sheet_4);
		          $objDrawing2->setName("CENPESCO");
		          $objDrawing2->setDescription("CENPESCO");
		          $objDrawing2->setPath("img/cenpesco.jpg");
		          $objDrawing2->setCoordinates('O5');
		          $objDrawing2->setHeight(60);
		          $objDrawing2->setWidth(90);
		          $objDrawing2->setOffsetX(280);
		          $objDrawing2->setOffsetY(20);
			// TITULOS


			// CABECERA
				// INICIO DE LA  cabecera
				$cab = 10;	
					
				// NOMBRE CABECERAS

						$sheet_4->setCellValue('A'.$cab,'TIPO FORMULARIO');
						$sheet_4->mergeCells('A'.$cab.':B'.($cab+2));
						$sheet_4->setCellValue('C'.$cab,'SECCIÓN' );
							$sheet_4->mergeCells('C'.$cab.':C'.($cab+2));
						$sheet_4->setCellValue('D'.$cab,'PREGUNTA' );
							$sheet_4->mergeCells('D'.$cab.':D'.($cab+2));							
						$sheet_4->setCellValue('E'.$cab,'TOTAL' );
						$sheet_4->mergeCells('E'.$cab.':F'.($cab+1));
							$sheet_4->setCellValue('E'.($cab+2),'Abs.' );
							$sheet_4->setCellValue('F'.($cab+2),'%' );
						$sheet_4->setCellValue('G'.$cab,'TIPO DE ERROR' );
						$sheet_4->mergeCells('G'.$cab.':P'.($cab));
							$sheet_4->setCellValue('G'.($cab+1),'CONCEPTO' );
							$sheet_4->mergeCells('G'.($cab+1).':H'.($cab+1));
								$sheet_4->setCellValue('G'.($cab+2),'Abs.' );
								$sheet_4->setCellValue('H'.($cab+2),'%' );
							$sheet_4->setCellValue('I'.($cab+1),'DELIGENCIAMIENTO' );
							$sheet_4->mergeCells('I'.($cab+1).':J'.($cab+1));
								$sheet_4->setCellValue('I'.($cab+2),'Abs.' );
								$sheet_4->setCellValue('J'.($cab+2),'%' );
							$sheet_4->setCellValue('K'.($cab+1),'FORMULACION' );
							$sheet_4->mergeCells('K'.($cab+1).':L'.($cab+1));
								$sheet_4->setCellValue('K'.($cab+2),'Abs.' );
								$sheet_4->setCellValue('L'.($cab+2),'%' );
							$sheet_4->setCellValue('M'.($cab+1),'SONDEO' );
							$sheet_4->mergeCells('M'.($cab+1).':N'.($cab+1));
								$sheet_4->setCellValue('M'.($cab+2),'Abs.' );
								$sheet_4->setCellValue('N'.($cab+2),'%' );
							$sheet_4->setCellValue('O'.($cab+1),'OMISIÓN' );
							$sheet_4->mergeCells('O'.($cab+1).':P'.($cab+1));
								$sheet_4->setCellValue('O'.($cab+2),'Abs.' );
								$sheet_4->setCellValue('P'.($cab+2),'%' );

				// NOMBRE CABECERAS

				// ESTILOS  CABECERAS
					$sheet_4->getStyle("A".$cab.":P".($cab+2))->getAlignment()->setWrapText(true);// AJUSTA TEXTO A CELDA
					$sheet_4->getStyle("A".$cab.":P".($cab+2))->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);						
					$sheet_4->getStyle("A".$cab.":P".($cab+2))->getAlignment()->setVertical(PHPExcel_Style_Alignment::VERTICAL_CENTER);						
					$sheet_4->getStyle("A".$cab.":P".($cab+2))->getFont()->getColor()->setARGB(PHPExcel_Style_Color::COLOR_WHITE);
					$sheet_4->getStyle("A".$cab.":P".($cab+2))->getFont()->setname('Arial')->setSize(11);

					$sheet_4->getStyle("A".$cab.":P".($cab+2) )->applyFromArray($color_celda_cabeceras); // AZUL DEFECTO

					$sheet_4->getStyle('I11')->getFont()->setname('Arial ')->setSize(9); // tamaño especial para esta celda

					$sheet_4->getStyle("A".$cab.":P".($cab+2) )->applyFromArray(array(
					'borders' => array(
								'allborders' => array(
												'style' => PHPExcel_Style_Border::BORDER_THIN)
							)
					));

				// ESTILOS  CABECERAS
			// CABECERA

		    // CUERPO

				//FORMATO DE FUENTE

				// **************************************************************************
				$inicio_cuerpo = $row = $cab + 4;// inicio de la fila del cuerpo
	
				$cambio = FALSE; // para intercarlar colores registros

				$ini = 0;
				$form_contador 	= 0;		
				$preg_sec  		= 0;
				$preg_num  		= 0;
				$preg_total		= 0;
				$preg_concep 	= 0;
				$preg_dilig 	= 0;
				$preg_preg 		= 0;
				$preg_sondeo 	= 0;
				$preg_omision	= 0;
				$pregt_com 		= 0;	
				$pregt_pes 		= 0;	

				$seccion_actual = 0;
				$acumulador_s 	= 0; 	
				$contador 		= 0;

				foreach ($reporte_pes_by_preg ->result() as $key) {
					$contador =  $contador + 1;
						if ( $seccion_actual <> $key->SECCION ) {
							$seccion_actual = $key->SECCION;

							$preg_sec		= array_search($key->SECCION, $romanos); // convierte a romanos
							$sheet_4->setCellValue('C'. ($row ), $preg_sec);

							if ($acumulador_s > 1){
								$sheet_4->mergeCells('C' . ($row - $acumulador_s) . ':C' . ($row - 1) );// merge para la seccion anterior
							}
							$acumulador_s 	= 1; // reinicia el acumulador
						}else{							
							if ( $contador == $reporte_pes_by_preg->num_rows()) {//ultimo registro
								$sheet_4->mergeCells('C' . ($row - $acumulador_s) . ':C' . ($row ) );// merge para la ultima seccion
							}	
							$acumulador_s =  $acumulador_s + 1;							
							
						}//echo  $contador . ' - ' . $reporte_com_by_preg->num_rows() . '<br>';

						$preg_num		= $key->PREGUNTA;
						$preg_total 	= $key->TOTAL;
						$preg_concep 	= $key->CONCEP;
						$preg_dilig 	= $key->DILIG;
						$preg_preg 		= $key->PREG;
						$preg_sondeo 	= $key->SONDEO;
						$preg_omision	= $key->OMISION;					
						
						
						$sheet_4->setCellValue('D'. ($row ), $preg_num);
						$sheet_4->setCellValue('E'. ($row ), $preg_total );
						$sheet_4->setCellValue('F'. ($row ), ($preg_total >0) ? 100 : 0 );
						$sheet_4->setCellValue('G'. ($row ), $preg_concep );
						$sheet_4->setCellValue('H'. ($row ), ($preg_total >0) ? ( $preg_concep*100)/$preg_total : 0 );
						$sheet_4->setCellValue('I'. ($row ), $preg_dilig );
						$sheet_4->setCellValue('J'. ($row ), ($preg_total >0) ? ($preg_dilig*100)/$preg_total  : 0 );
						$sheet_4->setCellValue('K'. ($row ), $preg_preg );
						$sheet_4->setCellValue('L'. ($row ), ($preg_total >0) ? ($preg_preg*100)/$preg_total : 0 );
						$sheet_4->setCellValue('M'. ($row ), $preg_sondeo );
						$sheet_4->setCellValue('N'. ($row ), ($preg_total >0) ? ($preg_sondeo*100)/$preg_total : 0 );
						$sheet_4->setCellValue('O'. ($row ), $preg_omision );
						$sheet_4->setCellValue('P'. ($row ), ($preg_total >0) ? ($preg_omision*100)/$preg_total : 0 );
						
						$row = $row + 1; // siguiente fila , (departamento )
						
						//reiniciadores
						$preg_num  		= 0;
						$preg_total		= 0;
						$preg_concep 	= 0;
						$preg_dilig 	= 0;
						$preg_preg 		= 0;
						$preg_sondeo 	= 0;
						$preg_omision	= 0;		
				}

				$fin_cuerpo = ($row - 1);

				$sheet_4->setCellValue('A'. $inicio_cuerpo, 'FORMULARIO DEL PESCADOR Y EMBARCACIONES PESQUERAS');
				$sheet_4->getStyle('A'. $inicio_cuerpo)->getAlignment()->setWrapText(true);// AJUSTA TEXTO A CELDA
				$sheet_4->mergeCells('A'. $inicio_cuerpo . ':B' . $fin_cuerpo);
				//$sheet_4->mergeCells('A14:B21');
				
				$sheet_4->getStyle("A".$inicio_cuerpo.":P".($fin_cuerpo ) )->applyFromArray(array(
				'borders' => array(
							'allborders' => array(
											'style' => PHPExcel_Style_Border::BORDER_THIN)
						)
				));

				//ALINEAR DEPARTAMENTOS

				$sheet_4->getStyle("A".$inicio_cuerpo.":C".$fin_cuerpo)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);						
				$sheet_4->getStyle("A".$inicio_cuerpo.":C".$fin_cuerpo)->getAlignment()->setVertical(PHPExcel_Style_Alignment::VERTICAL_CENTER);		

				// FORMATO PORCENTAJES
				$sheet_4->getStyle('F'.$inicio_cuerpo.':F'.$fin_cuerpo)->getNumberFormat()->setFormatCode('0.00');// formato para codigo col A,
				$sheet_4->getStyle('H'.$inicio_cuerpo.':H'.$fin_cuerpo)->getNumberFormat()->setFormatCode('0.00');// formato para codigo col A,
				$sheet_4->getStyle('J'.$inicio_cuerpo.':J'.$fin_cuerpo)->getNumberFormat()->setFormatCode('0.00');// formato para codigo col A,
				$sheet_4->getStyle('L'.$inicio_cuerpo.':L'.$fin_cuerpo)->getNumberFormat()->setFormatCode('0.00');// formato para codigo col A,
				$sheet_4->getStyle('N'.$inicio_cuerpo.':N'.$fin_cuerpo)->getNumberFormat()->setFormatCode('0.00');// formato para codigo col A,
				$sheet_4->getStyle('P'.$inicio_cuerpo.':P'.$fin_cuerpo)->getNumberFormat()->setFormatCode('0.00');// formato para codigo col A,

				// COLOR A PORCENTAJES
				$sheet_4->getStyle('F'.$inicio_cuerpo.':F'.$fin_cuerpo)->getFont()->getColor()->setARGB(PHPExcel_Style_Color::COLOR_DARKBLUE);
				$sheet_4->getStyle('H'.$inicio_cuerpo.':H'.$fin_cuerpo)->getFont()->getColor()->setARGB(PHPExcel_Style_Color::COLOR_DARKBLUE);
				$sheet_4->getStyle('J'.$inicio_cuerpo.':J'.$fin_cuerpo)->getFont()->getColor()->setARGB(PHPExcel_Style_Color::COLOR_DARKBLUE);
				$sheet_4->getStyle('L'.$inicio_cuerpo.':L'.$fin_cuerpo)->getFont()->getColor()->setARGB(PHPExcel_Style_Color::COLOR_DARKBLUE);
				$sheet_4->getStyle('N'.$inicio_cuerpo.':N'.$fin_cuerpo)->getFont()->getColor()->setARGB(PHPExcel_Style_Color::COLOR_DARKBLUE);
				$sheet_4->getStyle('P'.$inicio_cuerpo.':P'.$fin_cuerpo)->getFont()->getColor()->setARGB(PHPExcel_Style_Color::COLOR_DARKBLUE);

				$sheet_4->getStyle('A9')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);	//opcional 

	 		// CUERPO

		/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
		///////////  H O J A   4 ////////////////////////////////////////////////////////////////////////////////////////////////////////
		/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////


		/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
		///////////  H O J A   5 ////////////////////////////////////////////////////////////////////////////////////////////////////////
		/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
			
			$reporte_acui_by_preg		= $this->inform_reporte_model->get_report_acui_by_preg();	// 
		
			// pestaña
			$sheet_5 = $this->phpexcel->createSheet(4);	

			
			// formato de la hoja
				// Set Orientation, size and scaling
				//$objPHPExcel->setActiveSheetIndex(0);
				//$sheet_5->getPageSetup()->setOrientation(PHPExcel_Worksheet_PageSetup::ORIENTATION_LANDSCAPE);// horizontal
				$sheet_5->getPageSetup()->setOrientation(PHPExcel_Worksheet_PageSetup::ORIENTATION_PORTRAIT); // vertical
				$sheet_5->getPageSetup()->setPaperSize(PHPExcel_Worksheet_PageSetup::PAPERSIZE_A4);
				$sheet_5->getPageSetup()->setFitToPage(false); // ajustar pagina
				$sheet_5->getPageSetup()->setFitToWidth(1);
				$sheet_5->getPageSetup()->setFitToHeight(0);		
				$sheet_5->setShowGridlines(false);// oculta lineas de cuadricula		

				// margin is set in inches (0.5cm)
				$margin = 0.5 / 2.54;
				//$sheet_5->getPageMargins->setTop($margin);
				//$sheet_5->getPageMargins->setBottom($margin);
				$sheet_5->getPageMargins()->setLeft($margin);
				$sheet_5->getPageMargins()->setRight($margin);


			// formato de la hoja

			// ANCHO Y ALTURA DE COLUMNAS DEL FILE
				$sheet_5->getColumnDimension('A')->setWidth(5);
				$sheet_5->getColumnDimension('B')->setWidth(45);
				$sheet_5->getColumnDimension('C')->setWidth(15);
				$sheet_5->getColumnDimension('D')->setWidth(15);
		
				$sheet_5->getRowDimension(1)->setRowHeight(2);
				$sheet_5->getRowDimension(2)->setRowHeight(2);
				$sheet_5->getRowDimension(3)->setRowHeight(2);
				$sheet_5->getRowDimension(4)->setRowHeight(2);
				$sheet_5->getRowDimension(6)->setRowHeight(10);
				$sheet_5->getRowDimension(7)->setRowHeight(10);
				$sheet_5->getRowDimension(8)->setRowHeight(30);
				$sheet_5->getRowDimension(9)->setRowHeight(10);
				$sheet_5->getRowDimension(10)->setRowHeight(15);
				$sheet_5->getRowDimension(11)->setRowHeight(35);
				$sheet_5->getRowDimension(12)->setRowHeight(15);
				$sheet_5->getRowDimension(13)->setRowHeight(5);
		
			// ANCHO Y ALTURA DE COLUMNAS DEL FILE

			// TITULOS
				$sheet_5->setCellValue('A3','INSTITUTO NACIONAL DE ESTADÍSTICA E INFORMATICA');
				$sheet_5->mergeCells('A3:O3');
				$sheet_5->setCellValue('A5','PRIMER CENSO NACIONAL DE PESCA CONTINENTAL' );
				$sheet_5->mergeCells('A5:O5');
				$sheet_5->setCellValue('A8','FORMULARIO DE ACUICULTURA: TOTAL DE ERRORES POR TIPO, SEGÚN SECCIÓN Y PREGUNTA' );
				$sheet_5->mergeCells('A8:O8');	
						
				$sheet_5->getStyle('A3:O9')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);	
				$sheet_5->getStyle('A3:O9')->getFont()->getColor()->setARGB(PHPExcel_Style_Color::COLOR_BLACK);
				$sheet_5->getStyle('A3:O9')->getFont()->setname('Arial black')->setSize(30);	
				$sheet_5->getStyle('A5:O9')->getFont()->setname('Arial ')->setSize(20);	
				$sheet_5->getStyle('A8')->getFont()->setname('Arial black')->setSize(12);	

				// LOGO
		          $objDrawing = new PHPExcel_Worksheet_Drawing();
		          $objDrawing->setWorksheet($sheet_5);
		          $objDrawing->setName("inei");
		          $objDrawing->setDescription("Inei");
		          $objDrawing->setPath("img/inei.jpeg");
		          $objDrawing->setCoordinates('A5');
		          $objDrawing->setHeight(80);
		          $objDrawing->setWidth(120);
		          $objDrawing->setOffsetX(10);
		          $objDrawing->setOffsetY(30);

		          $objDrawing2 = new PHPExcel_Worksheet_Drawing();
		          $objDrawing2->setWorksheet($sheet_5);
		          $objDrawing2->setName("CENPESCO");
		          $objDrawing2->setDescription("CENPESCO");
		          $objDrawing2->setPath("img/cenpesco.jpg");
		          $objDrawing2->setCoordinates('O5');
		          $objDrawing2->setHeight(60);
		          $objDrawing2->setWidth(90);
		          $objDrawing2->setOffsetX(280);
		          $objDrawing2->setOffsetY(20);
			// TITULOS


			// CABECERA
				// INICIO DE LA  cabecera
				$cab = 10;	
					
				// NOMBRE CABECERAS

						$sheet_5->setCellValue('A'.$cab,'TIPO FORMULARIO');
						$sheet_5->mergeCells('A'.$cab.':B'.($cab+2));
						$sheet_5->setCellValue('C'.$cab,'SECCIÓN' );
							$sheet_5->mergeCells('C'.$cab.':C'.($cab+2));
						$sheet_5->setCellValue('D'.$cab,'PREGUNTA' );
							$sheet_5->mergeCells('D'.$cab.':D'.($cab+2));							
						$sheet_5->setCellValue('E'.$cab,'TOTAL' );
						$sheet_5->mergeCells('E'.$cab.':F'.($cab+1));
							$sheet_5->setCellValue('E'.($cab+2),'Abs.' );
							$sheet_5->setCellValue('F'.($cab+2),'%' );
						$sheet_5->setCellValue('G'.$cab,'TIPO DE ERROR' );
						$sheet_5->mergeCells('G'.$cab.':P'.($cab));
							$sheet_5->setCellValue('G'.($cab+1),'CONCEPTO' );
							$sheet_5->mergeCells('G'.($cab+1).':H'.($cab+1));
								$sheet_5->setCellValue('G'.($cab+2),'Abs.' );
								$sheet_5->setCellValue('H'.($cab+2),'%' );
							$sheet_5->setCellValue('I'.($cab+1),'DELIGENCIAMIENTO' );
							$sheet_5->mergeCells('I'.($cab+1).':J'.($cab+1));
								$sheet_5->setCellValue('I'.($cab+2),'Abs.' );
								$sheet_5->setCellValue('J'.($cab+2),'%' );
							$sheet_5->setCellValue('K'.($cab+1),'FORMULACION' );
							$sheet_5->mergeCells('K'.($cab+1).':L'.($cab+1));
								$sheet_5->setCellValue('K'.($cab+2),'Abs.' );
								$sheet_5->setCellValue('L'.($cab+2),'%' );
							$sheet_5->setCellValue('M'.($cab+1),'SONDEO' );
							$sheet_5->mergeCells('M'.($cab+1).':N'.($cab+1));
								$sheet_5->setCellValue('M'.($cab+2),'Abs.' );
								$sheet_5->setCellValue('N'.($cab+2),'%' );
							$sheet_5->setCellValue('O'.($cab+1),'OMISIÓN' );
							$sheet_5->mergeCells('O'.($cab+1).':P'.($cab+1));
								$sheet_5->setCellValue('O'.($cab+2),'Abs.' );
								$sheet_5->setCellValue('P'.($cab+2),'%' );

				// NOMBRE CABECERAS

				// ESTILOS  CABECERAS
					$sheet_5->getStyle("A".$cab.":P".($cab+2))->getAlignment()->setWrapText(true);// AJUSTA TEXTO A CELDA
					$sheet_5->getStyle("A".$cab.":P".($cab+2))->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);						
					$sheet_5->getStyle("A".$cab.":P".($cab+2))->getAlignment()->setVertical(PHPExcel_Style_Alignment::VERTICAL_CENTER);						
					$sheet_5->getStyle("A".$cab.":P".($cab+2))->getFont()->getColor()->setARGB(PHPExcel_Style_Color::COLOR_WHITE);
					$sheet_5->getStyle("A".$cab.":P".($cab+2))->getFont()->setname('Arial')->setSize(11);

					$sheet_5->getStyle("A".$cab.":P".($cab+2) )->applyFromArray($color_celda_cabeceras); // AZUL DEFECTO

					$sheet_5->getStyle('I11')->getFont()->setname('Arial ')->setSize(9); // tamaño especial para esta celda

					$sheet_5->getStyle("A".$cab.":P".($cab+2) )->applyFromArray(array(
					'borders' => array(
								'allborders' => array(
												'style' => PHPExcel_Style_Border::BORDER_THIN)
							)
					));

				// ESTILOS  CABECERAS
			// CABECERA

		    // CUERPO

				//FORMATO DE FUENTE

				// **************************************************************************
				$inicio_cuerpo = $row = $cab + 4;// inicio de la fila del cuerpo
	
				$cambio = FALSE; // para intercarlar colores registros

				$ini = 0;
				$form_contador 	= 0;		
				$preg_sec  		= 0;
				$preg_num  		= 0;
				$preg_total		= 0;
				$preg_concep 	= 0;
				$preg_dilig 	= 0;
				$preg_preg 		= 0;
				$preg_sondeo 	= 0;
				$preg_omision	= 0;
				$pregt_com 		= 0;	
				$pregt_pes 		= 0;	

				$seccion_actual = 0;
				$acumulador_s 	= 0; 	
				$contador 		= 0;

				foreach ($reporte_acui_by_preg ->result() as $key) {
					$contador =  $contador + 1;
						if ( $seccion_actual <> $key->SECCION ) {
							$seccion_actual = $key->SECCION;

							$preg_sec		= array_search($key->SECCION, $romanos); // convierte a romanos
							$sheet_5->setCellValue('C'. ($row ), $preg_sec);

							if ($acumulador_s > 1){
								$sheet_5->mergeCells('C' . ($row - $acumulador_s) . ':C' . ($row - 1) );// merge para la seccion anterior
							}
							$acumulador_s 	= 1; // reinicia el acumulador
						}else{							
							if ( $contador == $reporte_acui_by_preg->num_rows()) {//ultimo registro
								$sheet_5->mergeCells('C' . ($row - $acumulador_s) . ':C' . ($row ) );// merge para la ultima seccion
							}	
							$acumulador_s =  $acumulador_s + 1;							
							
						}//echo  $contador . ' - ' . $reporte_com_by_preg->num_rows() . '<br>';

						$preg_num		= $key->PREGUNTA;
						$preg_total 	= $key->TOTAL;
						$preg_concep 	= $key->CONCEP;
						$preg_dilig 	= $key->DILIG;
						$preg_preg 		= $key->PREG;
						$preg_sondeo 	= $key->SONDEO;
						$preg_omision	= $key->OMISION;					
						
						
						$sheet_5->setCellValue('D'. ($row ), $preg_num);
						$sheet_5->setCellValue('E'. ($row ), $preg_total );
						$sheet_5->setCellValue('F'. ($row ), ($preg_total >0) ? 100 : 0 );
						$sheet_5->setCellValue('G'. ($row ), $preg_concep );
						$sheet_5->setCellValue('H'. ($row ), ($preg_total >0) ? ( $preg_concep*100)/$preg_total : 0 );
						$sheet_5->setCellValue('I'. ($row ), $preg_dilig );
						$sheet_5->setCellValue('J'. ($row ), ($preg_total >0) ? ($preg_dilig*100)/$preg_total  : 0 );
						$sheet_5->setCellValue('K'. ($row ), $preg_preg );
						$sheet_5->setCellValue('L'. ($row ), ($preg_total >0) ? ($preg_preg*100)/$preg_total : 0 );
						$sheet_5->setCellValue('M'. ($row ), $preg_sondeo );
						$sheet_5->setCellValue('N'. ($row ), ($preg_total >0) ? ($preg_sondeo*100)/$preg_total : 0 );
						$sheet_5->setCellValue('O'. ($row ), $preg_omision );
						$sheet_5->setCellValue('P'. ($row ), ($preg_total >0) ? ($preg_omision*100)/$preg_total : 0 );
						
						$row = $row + 1; // siguiente fila , (departamento )
						
						//reiniciadores
						$preg_num  		= 0;
						$preg_total		= 0;
						$preg_concep 	= 0;
						$preg_dilig 	= 0;
						$preg_preg 		= 0;
						$preg_sondeo 	= 0;
						$preg_omision	= 0;		
				}

				$fin_cuerpo = ($row - 1);

				$sheet_5->setCellValue('A'. $inicio_cuerpo, 'FORMULARIO DE ACUICULTURA');
				$sheet_5->getStyle('A'. $inicio_cuerpo)->getAlignment()->setWrapText(true);// AJUSTA TEXTO A CELDA
				$sheet_5->mergeCells('A'. $inicio_cuerpo . ':B' . $fin_cuerpo);
				//$sheet_5->mergeCells('A14:B21');
				
				$sheet_5->getStyle("A".$inicio_cuerpo.":P".($fin_cuerpo ) )->applyFromArray(array(
				'borders' => array(
							'allborders' => array(
											'style' => PHPExcel_Style_Border::BORDER_THIN)
						)
				));

				//ALINEAR DEPARTAMENTOS

				$sheet_5->getStyle("A".$inicio_cuerpo.":C".$fin_cuerpo)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);						
				$sheet_5->getStyle("A".$inicio_cuerpo.":C".$fin_cuerpo)->getAlignment()->setVertical(PHPExcel_Style_Alignment::VERTICAL_CENTER);		

				// FORMATO PORCENTAJES
				$sheet_5->getStyle('F'.$inicio_cuerpo.':F'.$fin_cuerpo)->getNumberFormat()->setFormatCode('0.00');// formato para codigo col A,
				$sheet_5->getStyle('H'.$inicio_cuerpo.':H'.$fin_cuerpo)->getNumberFormat()->setFormatCode('0.00');// formato para codigo col A,
				$sheet_5->getStyle('J'.$inicio_cuerpo.':J'.$fin_cuerpo)->getNumberFormat()->setFormatCode('0.00');// formato para codigo col A,
				$sheet_5->getStyle('L'.$inicio_cuerpo.':L'.$fin_cuerpo)->getNumberFormat()->setFormatCode('0.00');// formato para codigo col A,
				$sheet_5->getStyle('N'.$inicio_cuerpo.':N'.$fin_cuerpo)->getNumberFormat()->setFormatCode('0.00');// formato para codigo col A,
				$sheet_5->getStyle('P'.$inicio_cuerpo.':P'.$fin_cuerpo)->getNumberFormat()->setFormatCode('0.00');// formato para codigo col A,

				// COLOR A PORCENTAJES
				$sheet_5->getStyle('F'.$inicio_cuerpo.':F'.$fin_cuerpo)->getFont()->getColor()->setARGB(PHPExcel_Style_Color::COLOR_DARKBLUE);
				$sheet_5->getStyle('H'.$inicio_cuerpo.':H'.$fin_cuerpo)->getFont()->getColor()->setARGB(PHPExcel_Style_Color::COLOR_DARKBLUE);
				$sheet_5->getStyle('J'.$inicio_cuerpo.':J'.$fin_cuerpo)->getFont()->getColor()->setARGB(PHPExcel_Style_Color::COLOR_DARKBLUE);
				$sheet_5->getStyle('L'.$inicio_cuerpo.':L'.$fin_cuerpo)->getFont()->getColor()->setARGB(PHPExcel_Style_Color::COLOR_DARKBLUE);
				$sheet_5->getStyle('N'.$inicio_cuerpo.':N'.$fin_cuerpo)->getFont()->getColor()->setARGB(PHPExcel_Style_Color::COLOR_DARKBLUE);
				$sheet_5->getStyle('P'.$inicio_cuerpo.':P'.$fin_cuerpo)->getFont()->getColor()->setARGB(PHPExcel_Style_Color::COLOR_DARKBLUE);

				$sheet_5->getStyle('A9')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);	//opcional 

	 		// CUERPO

		/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
		///////////  H O J A   5 ////////////////////////////////////////////////////////////////////////////////////////////////////////
		/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////


			// SALIDA EXCEL
				//$objPHPExcel->getActiveSheet()->setCellValueExplicitByColumnAndRow($numColum,$numRow,$products[$i][$colName], PHPExcel_Cell_DataType::TYPE_STRING);
				// Propiedades del archivo excel
					$sheet_1->setTitle("Formulario");
					$sheet_2->setTitle("Sección");
					$sheet_3->setTitle("Comunidad");
					$sheet_4->setTitle("Pescador");
					$sheet_5->setTitle("Acuicultor");
					$this->phpexcel->getProperties()
					->setTitle("Formulario")
					->setDescription("Informe supervisión - Formulario");

				header("Content-Type: application/vnd.ms-excel");
				$nombreArchivo = 'Informe-Supervision_'.date('YmdHis');
				header("Content-Disposition: attachment; filename=\"$nombreArchivo.xls\""); //EXCEL
				header("Cache-Control: max-age=0");
				//header("Pragma: no-cache");
				//header("Expires: 0");
				
				// Genera Excel
				$writer = PHPExcel_IOFactory::createWriter($this->phpexcel, "Excel5");
				//$writer = new PHPExcel_Writer_Excel2007($this->phpexcel);

				$writer->save('php://output');
				exit;
			// SALIDA EXCEL

	 	//}



	}






}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */