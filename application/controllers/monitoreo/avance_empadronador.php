<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Avance_empadronador extends CI_Controller {

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
		$this->load->model('monitoreo_especial_model');	
		$this->load->model('avance_campo_subrutas_model');	
		$this->load->model('avance_campo_subrutas_model');	
		$this->load->model('ccpp_model');	

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
			//$data['main_content'] = 'monitoreo/avance_empadronador_view';
			$data['main_content'] = 'monitoreo/forms/avance_empadronador_form';
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
			$prov 	= $this->input->post('CCPP');
			$dist 	= $this->input->post('CCDI');
			$cc_ccpp = $this->input->post('CC_CCPP');		
			$equipo = $this->input->post('EQP');
			$ruta 	= $this->input->post('RUTA');
			$sub_ruta = $this->input->post('SUB_R');
	

			$lista =  $this->avance_campo_subrutas_model->get_fields();

			foreach ($lista as $campo ) {
				if (!in_array($campo, array('user_id','last_ip','user_agent','created','modified','user_id_m','COD_REG','activo','id'))) {
					$data_reg[$campo] = ($this->input->post($campo) == '') ? NULL : $this->input->post($campo);
					$cont++;
				}
			}

			$consulta = $this->avance_campo_subrutas_model->consulta($sede,$dep,$prov,$dist,$cc_ccpp,$equipo,$ruta,$sub_ruta);

			if ($consulta->num_rows() == 0 ){ // inserta en la tabla

				// if ($this->tank_auth->get_ubigeo()==99) {

					$data_reg['COD_REG'] = ($sede.$dep.$prov.$dist.$cc_ccpp.$equipo.$ruta.$sub_ruta);
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

					$guardado = $this->avance_campo_subrutas_model->update_sub_ruta($sede,$dep,$prov,$dist,$cc_ccpp,$equipo,$ruta,$sub_ruta,$data_reg);

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


	function get_ajax_equipo()
	{
		$sede = $this->input->post('sede');
		$dep = $this->input->post('dep');

		// $equipo = 
		// $datos = $equipo->result();
		$datos = $this->monitoreo_especial_model->get_equipo($sede, $dep)->result();// envia array de equipos
		$data['datos'] = $datos;
		$this->load->view('backend/json/json_view',$data);
	}

	function get_ajax_ruta()
	{
		$sede = $this->input->post('sede');
		$dep = $this->input->post('dep');
		$equipo =  $this->input->post('equipo');

		$datos = $this->monitoreo_especial_model->get_ruta($sede, $dep,$equipo)->result(); //  array de rutas
		$data['datos'] = $datos;
		$this->load->view('backend/json/json_view',$data);
	}

	function get_ajax_sub_ruta()
	{
		$sede = $this->input->post('sede');
		$dep = $this->input->post('dep');
		$equipo =  $this->input->post('equipo');
		$ruta =  $this->input->post('ruta');

		$datos = $this->monitoreo_especial_model->get_sub_ruta($sede, $dep, $equipo, $ruta)->result(); //  array de sub_rutas
		$data['datos'] = $datos;
		$this->load->view('backend/json/json_view',$data);
	}	


	function get_ajax_all($opcion){
		$sede = $this->input->post('sede');
		$dep = $this->input->post('dep');
		$equipo = $this->input->post('equipo');
		$ruta =  $this->input->post('ruta');
		$sub_ruta =  $this->input->post('sub_ruta');
		if ($opcion == 1){
			$data['datos'] = $this->monitoreo_especial_model->get_all($sede,$dep,$equipo,$ruta,$sub_ruta)->result(); // envia la consulta_ccpp
		}else if($opcion == 2){
			$data['datos'] = $this->avance_campo_subrutas_model->get_all($sede,$dep,$equipo,$ruta,$sub_ruta)->result(); // de la tabla AVANCE CAMPO SUBRATOS
		}

		$this->load->view('backend/json/json_view', $data);	

	}

	function get_ajax_ccpp_by_sub_ruta(){
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
		$data['main_content'] = 'monitoreo/avance_tabla_view';
        $this->load->view('backend/includes/template', $data);

	}




    public function export(){

		foreach ($this->marco_model->get_odei($this->tank_auth->get_ubigeo())->result() as $key ) {
			$odei[] = $key->ODEI_COD;
		}
		
		$registros = $this->avance_campo_subrutas_model->get_todo($odei);  

		// pestaña
		$sheet = $this->phpexcel->getActiveSheet(0);
		

		// ANCHO Y ALTURA DE COLUMNAS DEL FILE
			$sheet->getColumnDimension('B')->setWidth(25);
			$sheet->getColumnDimension('D')->setWidth(25);
			$sheet->getColumnDimension('F')->setWidth(25);
			$sheet->getColumnDimension('H')->setWidth(25);
			$sheet->getColumnDimension('J')->setWidth(25);
			$sheet->getColumnDimension('K')->setWidth(15);
			$sheet->getColumnDimension('L')->setWidth(25);
			$sheet->getColumnDimension('O')->setWidth(35);
			$sheet->getColumnDimension('X')->setWidth(18);
			$sheet->getColumnDimension('AC')->setWidth(18);
			$sheet->getRowDimension(5)->setRowHeight(20);
			$sheet->getRowDimension(6)->setRowHeight(20);
		// ANCHO Y ALTURA DE COLUMNAS DEL FILE

		// TITULOS
			$sheet->setCellValue('A2','INSTITUTO NACIONAL DE ESTADÍSTICA E INFORMATICA');
			$sheet->mergeCells('A2:AC2');
			$sheet->setCellValue('A3','PRIMER CENSO NACIONAL DE PESCA CONTINENTAL' );
			$sheet->mergeCells('A3:AC3');
			$sheet->setCellValue('A4','REPORTE DE AVANCE DE CAMPO ' );
			$sheet->mergeCells('A4:AC4');
			$sheet->getStyle('A2:AC4')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);	
			$sheet->getStyle('A2:AC4')->getFont()->getColor()->setARGB(PHPExcel_Style_Color::COLOR_BLACK);
			$sheet->getStyle('A2:AC2')->getFont()->setname('Arial black')->setSize(16);	
			$sheet->getStyle('A3:AC4')->getFont()->setname('Arial')->setSize(16);	

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
			$sheet->setCellValue('P5','COMUNIDADES');
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
			));
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
					$sheet->setCellValue('O'.$cab, 'JEFE DE BRIGADA' );
					$sheet->setCellValue('P'.$cab, 'TOTAL' );
					$sheet->setCellValue('Q'.$cab, 'COMP.' );
					$sheet->setCellValue('R'.$cab, 'INCO.' );
					$sheet->setCellValue('S'.$cab, 'RECHZ.' );
					$sheet->setCellValue('T'.$cab, 'TOTAL' );
					$sheet->setCellValue('U'.$cab, 'COMP.' );
					$sheet->setCellValue('V'.$cab, 'INCO.' );
					$sheet->setCellValue('W'.$cab, 'RECHZ.' );
					$sheet->setCellValue('X'.$cab,'EMBARCACION');
					$sheet->setCellValue('Y'.$cab,' TOTAL');
					$sheet->setCellValue('Z'.$cab,' COMP.');
					$sheet->setCellValue('AA'.$cab,' INCO.');
					$sheet->setCellValue('AB'.$cab,' RECHZ.');
					$sheet->setCellValue('AC'.$cab,' EMBARCACION');
			// NOMBRE CABECERAS

			// ESTILOS  CABECERAS
				$sheet->getStyle("A".$cab.":AC".$cab)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);	
				$sheet->getStyle("A".$cab.":AC".$cab)->getFont()->getColor()->setARGB(PHPExcel_Style_Color::COLOR_RED);
				$sheet->getStyle("A".$cab.":AC".$cab)->getFont()->setname('Arial')->setSize(11);
		     	$headStyle = $this->phpexcel->getActiveSheet()->getStyle("A".$cab.":AC".$cab);
		        $headStyle->getFill()->setFillType(PHPExcel_Style_Fill::FILL_SOLID)->getStartColor()->setARGB('#FF9900');

				$sheet->getStyle("A".$cab.":AC".$cab)->applyFromArray(array(
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
			$sheet->getStyle("A".($cab+1).":AC".$total)->applyFromArray(array(
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
				$sheet->setTitle("Avance de campo");
				$this->phpexcel->getProperties()
				->setTitle("Avance de campo")
				->setDescription("Avance");

			header("Content-Type: application/vnd.ms-excel");
			$nombreArchivo = 'AvanceCampo_'.date('YmdHis');
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