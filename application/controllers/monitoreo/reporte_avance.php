<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Reporte_avance extends CI_Controller {

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

		$this->load->model('marco_model');	
		$this->load->model('avance_campo_model');	
		$this->load->model('ccpp_model');	

	}


	public function index()
	{

		if($this->tank_auth->get_ubigeo() == 99){
			$data['nav'] = TRUE;
			//regular
			//$data['departamentos'] = $this->ubigeo_piloto_model->get_dptos();
			$data['title'] = 'Revision';

			//cabecera
			foreach ($this->marco_model->get_odei($this->tank_auth->get_ubigeo())->result() as $key ) {
				$odei[] = $key->ODEI_COD;
			}
			$data['pea_marco'] = $this->avance_campo_model->get_pea_marco(); // obtiene la PEA MARCO
			$data['avance_campo'] = $this->avance_campo_model->get_reporte_avance(); // avance de PEA CAMPO
			
			//regular
			//$data['tables'] = $this->avance_campo_model->get_todo($odei);
			$data['main_content'] = 'monitoreo/reporte_avance_view';
			$data['option'] = 4;
			$data['reporte'] = $this->tank_auth->get_ubigeo();
	        $this->load->view('backend/includes/template', $data);
	    }else{
	    	redirect('monitoreo/monitoreo');
	    }
	}

	public function grabar()
	{
		$is_ajax = $this->input->post('ajax');
		if($is_ajax){

			$od = $this->marco_model->get_odei_by_sede_dep($this->tank_auth->get_ubigeo(),$this->input->post('CCDD'));
			
				$ODEI_COD = $od->row('ODEI_COD');// para sacar nombre de la SEDE y ODEI
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
					'NOM_BRI' => $this->input->post('NOM_BRI'),

					'C_TOTAL' => $this->input->post('C_TOTAL'),
					'C_COMP' => $this->input->post('C_COMP'),
					'C_INC' => $this->input->post('C_INC'),
					'C_RECH' => $this->input->post('C_RECH'),

					'P_TOTAL' => $this->input->post('P_TOTAL'),
					'P_COMP' => $this->input->post('P_COMP'),
					'P_INC' => $this->input->post('P_INC'),
					'P_RECH' => $this->input->post('P_RECH'),
					'E_TOTAL_P' => $this->input->post('E_TOTAL_P'),

					'A_TOTAL' => $this->input->post('A_TOTAL'),
					'A_COMP' => $this->input->post('A_COMP'),
					'A_INC' => $this->input->post('A_INC'),
					'A_RECH' => $this->input->post('A_RECH'),
					'E_TOTAL_A' => $this->input->post('E_TOTAL_A'),

					'activo'=>1,
					'user_id'=>$this->tank_auth->get_user_id(),
					'created'=> date('Y-m-d H:i:s'),
					'last_ip' => $this->input->ip_address(),
					'user_agent' => $this->agent->agent_string(),
					);
				

			if ($this->tank_auth->get_ubigeo()<99) {

				if ($od->num_rows() == 1){//filtra si existe odei

					$revision = $this->avance_campo_model->consulta_ccpp($CCDD,$CCPP,$CCDI,$COD_CCPP);
					if($revision >= 1){// consulta si existe el centro poblado en la tabla
						$datos['operacion'] = 0; // ya existe el centro poblado
					}else{
						$filas = $this->avance_campo_model->insertar($registro);
						if ($filas ==1) {
							$datos['operacion'] = 1;	// guardado exitosamente				
						}else {
							$datos['operacion'] = 8; // no se guardo		
						}
					}
				}else {
					$datos['operacion'] = 7; //ODEI en doble ubigeo
				}

			}else{
					$datos['operacion'] = 99; // no usuario piloto
			}	


			// $datos['secciones'] = $udra;	
			$data['datos'] = $datos;
			$this->load->view('backend/json/json_view', $data);		
			//redirect('digitacion/revision');

		}else{
			show_404();;
		}
	}



	function get_todo(){
			//$data['nav'] = TRUE;
		//cabecera
		foreach ($this->marco_model->get_odei($this->tank_auth->get_ubigeo())->result() as $key ) {
			$odei[] = $key->ODEI_COD;
		}
		
		//regular
		$data['tables'] = $this->avance_campo_model->get_todo($odei);
		$data['main_content'] = 'monitoreo/avance_tabla_view';
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
		$pea_marco = $this->avance_campo_model->get_pea_marco();    
		$avance_campo= $this->avance_campo_model->get_reporte_avance(); // avance de PEA CAMPO	

		// pestaña
		$sheet = $this->phpexcel->getActiveSheet(0);
		
		// formato de la hoja
			// Set Orientation, size and scaling
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
			$sheet->getColumnDimension('A')->setWidth(4);
			$sheet->getColumnDimension('B')->setWidth(6);
			$sheet->getColumnDimension('C')->setWidth(20);
			$sheet->getColumnDimension('D')->setWidth(20);
			$sheet->getColumnDimension('E')->setWidth(20);
			$sheet->getColumnDimension('F')->setWidth(20);


			$sheet->getRowDimension(4)->setRowHeight(2);
			$sheet->getRowDimension(6)->setRowHeight(2);
			$sheet->getRowDimension(17)->setRowHeight(60);
		// ANCHO Y ALTURA DE COLUMNAS DEL FILE

		// TITULOS
			$sheet->setCellValue('A3','INSTITUTO NACIONAL DE ESTADÍSTICA E INFORMATICA');
			$sheet->mergeCells('A3:G3');
			$sheet->setCellValue('A5','PRIMER CENSO NACIONAL DE PESCA CONTINENTAL' );
			$sheet->mergeCells('A5:G5');
			$sheet->setCellValue('A9','REPORTE DE AVANCE DE CAMPO' );
			$sheet->mergeCells('A9:G9');	
					
			$sheet->getStyle('A3:G9')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);	
			$sheet->getStyle('A3:G9')->getFont()->getColor()->setARGB(PHPExcel_Style_Color::COLOR_BLACK);
			$sheet->getStyle('A3:G9')->getFont()->setname('Arial black')->setSize(15);	
			$sheet->getStyle('A5:G9')->getFont()->setname('Arial ')->setSize(12);	
			$sheet->getStyle('A9')->getFont()->setname('Arial black')->setSize(13);	



			// LOGO
	          $objDrawing = new PHPExcel_Worksheet_Drawing();
	          $objDrawing->setWorksheet($sheet);
	          $objDrawing->setName("inei");
	          $objDrawing->setDescription("Inei");
	          $objDrawing->setPath("img/inei.jpeg");
	          $objDrawing->setCoordinates('B7');
	          $objDrawing->setHeight(60);
	          $objDrawing->setOffsetX(1);
	          $objDrawing->setOffsetY(5);

	          $objDrawing2 = new PHPExcel_Worksheet_Drawing();
	          $objDrawing2->setWorksheet($sheet);
	          $objDrawing2->setName("CENPESCO");
	          $objDrawing2->setDescription("CENPESCO");
	          $objDrawing2->setPath("img/cenpesco.jpg");
	          $objDrawing2->setCoordinates('G7');
	          $objDrawing2->setHeight(60);
	          $objDrawing2->setWidth(100);
	          $objDrawing2->setOffsetX(1);
	          $objDrawing2->setOffsetY(10);
		// TITULOS


		// CABECERA
			// INICIO DE LA  cabecera
			$cab = 16;	
				
			// NOMBRE CABECERAS

					$sheet->setCellValue('B'.$cab,'CCDD');
					$sheet->mergeCells('B'.$cab.':B'.($cab+2));
					$sheet->setCellValue('C'.$cab,'DEPARTAMENTO' );
					$sheet->mergeCells('C'.$cab.':C'.($cab+2));

					$sheet->setCellValue('D'.$cab,'PEA MARCO' );
					$sheet->mergeCells('D'.$cab.':D'.($cab+2));
					$sheet->setCellValue('E'.$cab,'PEA CAMPO' );
					$sheet->mergeCells('E'.$cab.':E'.($cab+2));
					$sheet->setCellValue('F'.$cab,'% COMPARACION' );
					$sheet->mergeCells('F'.$cab.':F'.($cab+2));

																																			
			// NOMBRE CABECERAS

			// ESTILOS  CABECERAS
				$sheet->getStyle("B".$cab.":F".($cab+2))->getAlignment()->setWrapText(true);// AJUSTA TEXTO A CELDA
				$sheet->getStyle("B".$cab.":F".($cab+2))->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);						
				$sheet->getStyle("B".$cab.":F".($cab+2))->getAlignment()->setVertical(PHPExcel_Style_Alignment::VERTICAL_CENTER);						
				$sheet->getStyle("B".$cab.":F".($cab+2))->getFont()->getColor()->setARGB(PHPExcel_Style_Color::COLOR_WHITE);
				$sheet->getStyle("B".$cab.":F".($cab+2))->getFont()->setname('Arial')->setSize(9);

		     	$headStyle = $this->phpexcel->getActiveSheet()->getStyle("B".$cab.":F".($cab+2));
		        //$headStyle->getFill()->setFillType(PHPExcel_Style_Fill::FILL_SOLID)->getStartColor()->setARGB('#FF9900');
				$headStyle->applyFromArray($color_celda_cabeceras);

				$sheet->getStyle("B".$cab.":F".($cab+2))->applyFromArray(array(
				'borders' => array(
							'allborders' => array(
											'style' => PHPExcel_Style_Border::BORDER_THIN)
						)
				));
				//$sheet->getStyle('J16')->getFont()->setname('Arial Narrow')->setSize(9); // tamaño especial para esta celda
			// ESTILOS  CABECERAS
		// CABECERA

	    // CUERPO
			$total = $pea_marco->num_rows()+ ($cab+3); // total del cuerpo


			$sheet->getStyle("A".($cab+3).":F".$total)->getFont()->setname('Arial ')->setSize(10);

			//bordes cuerpo
			$sheet->getStyle("B".($cab+3).":F".$total)->applyFromArray(array(
			'borders' => array(
						'allborders' => array(
										'style' => PHPExcel_Style_Border::BORDER_THIN)
					)
			));

			// EXPORTACION A EXCEL

			$total = 0;
			foreach($pea_marco->result() as $row){
				$total = $total + $row->PEA_MARCO;
			}
			$sheet->setCellValue('C'.($cab+3),'TOTAL NACIONAL');
			$sheet->setCellValue('D'.($cab+3),$total);
			$total_campo = 0;
			foreach($avance_campo->result() as $row){
				$total_campo = $total_campo + $row->PEA_CAMPO;
			}
			$sheet->setCellValue('E'.($cab+3),$total_campo);
			$sheet->setCellValue('F'.($cab+3), number_format( (($total_campo * 100 )/$total), 1, '.',' ') );
			$sheet->getStyle("B".$cab.":F".($cab+3))->getFont()->setname('Arial black')->setSize(9);

			$row = $cab+3;// inicio de la fila del cuerpo
			$col = 1; // inicio del column
			$num = 0; // para numerar
			$cambio = FALSE; // para intercarlar colores registros
			$pea = null;

			//  foreach($pea_marco->result() as $filas){
			//     $row ++;
			// 	foreach($filas as  $cols){ // llena cada celda


			//   					$sheet->getCellByColumnAndRow($col++, $row)->setValue($cols[2]);

			// 					foreach ($avance_campo->result() as  $value) {
			// 						if ($cols[0] == $value->CCDD){
			// 							$pea = $value->PEA_CAMPO ; 
			// 							break;
			// 						}
			// 					}
			// 					// if (is_numeric($pea)){
			// 					// 	echo "<td>". $pea ."</td>";
			// 					// 	echo "<td><strong>". number_format(((($pea)*100)/($row->PEA_MARCO )) ,1,'.',' ')."%</strong></td>";
			// 					// }else{
			// 					// 	echo "<td>". 0 ."</td>";
			// 					// 	echo "<td>". 0 ."%</td>";
			// 					// }
			// 					$pea = null;

			// 	}
			// 	 $col = 1;
			// 	 //dar formato de color intercalado a cada fila
			// 	 if($cambio){
			//      	$fila_color = $this->phpexcel->getActiveSheet()->getStyle("B".$row.":F".$row);
			//         //$fila_color->getFill()->setFillType(PHPExcel_Style_Fill::FILL_SOLID)->getStartColor()->setARGB('#CD5C5C');
			// 		$fila_color->applyFromArray(
			// 		    array(
			// 		        'fill' => array(
			// 		            'type' => PHPExcel_Style_Fill::FILL_SOLID,
			// 		            'color' => array('rgb' => 'DCDCDC')
			// 		        )
			// 		    )
			// 		);			        
			//         $cambio = FALSE;	
			// 	 }else{	$cambio = TRUE; }
				
			// }
			foreach($pea_marco->result() as $celda){
				$row++;
				$sheet->setCellValue('B'.$row,$celda->CCDD);
				$sheet->setCellValue('C'.$row,$celda->DEPARTAMENTO);
				$sheet->setCellValue('D'.$row,$celda->PEA_MARCO);
				foreach ($avance_campo->result() as  $value) {
					if ($celda->CCDD == $value->CCDD){
						$pea = $value->PEA_CAMPO  ; break;
					}
				}
				if (is_numeric($pea)){
					$sheet->setCellValue('E'.$row, $pea);
					$sheet->setCellValue('F'.$row, number_format(((($pea)*100)/($celda->PEA_MARCO )) ,1,'.',' '));
					$sheet->getStyle("F".$row.":F".$row)->getFont()->setname('Arial black')->setSize(9);
				}else{
					$sheet->setCellValue('E'.$row, 0 );
					$sheet->setCellValue('F'.$row, 0);
				}
				$pea = null;
			}

			$sheet->getStyle('B'.($cab+2).':B'.$row)->getNumberFormat()->setFormatCode('00'); 
			$sheet->getStyle('B'.($cab+2).':B'.$row)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);	

			$sheet->getStyle('B'.($cab+2).':F'.$row)->getAlignment()->setVertical(PHPExcel_Style_Alignment::VERTICAL_CENTER);	
			$sheet->getStyle('C'.($cab+2).':B'.$row)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);				
 		// CUERPO



		// SALIDA EXCEL
			//$objPHPExcel->getActiveSheet()->setCellValueExplicitByColumnAndRow($numColum,$numRow,$products[$i][$colName], PHPExcel_Cell_DataType::TYPE_STRING);
			// Propiedades del archivo excel
				$sheet->setTitle("Reporte-avance-campo");
				$this->phpexcel->getProperties()
				->setTitle("Reporte de Avance ce campo")
				->setDescription("Reporte de Avance ce campo");

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
}




/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */