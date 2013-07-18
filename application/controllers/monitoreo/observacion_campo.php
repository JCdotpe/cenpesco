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
		$this->load->library('phpexcel');		

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
					
					if($revision >= 1){
						$datos['operacion'] = 0; // ya existe el centro poblado
					}else{
						$filas = $this->observacion_campo_model->insertar($registro);
						if ($filas ==1) {
							$datos['operacion'] = 1;	// guardado exitosamente				
						}else {
							$datos['operacion'] = 8; // no se guardo		
						}
					}
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
		
		//regular
		$registros = $this->observacion_campo_model->get_todo($odei);    	

		// Propiedades del archivo excel
			$this->phpexcel->getProperties()
			->setTitle("Observacion de campo")
			->setDescription("Observacion");

		// Setiar la solapa que queda actia al abrir el excel
		$this->phpexcel->setActiveSheetIndex(0);

		// Solapa excel para trabajar con PHP
		$sheet = $this->phpexcel->getActiveSheet(0);
		$sheet->setTitle("Observacion de campo");
		$sheet->getColumnDimension('A')->setWidth(10);
		$sheet->getColumnDimension('B')->setWidth(25);
		$sheet->getColumnDimension('D')->setWidth(25);
		$sheet->getColumnDimension('F')->setWidth(25);
		$sheet->getColumnDimension('H')->setWidth(25);
		$sheet->getColumnDimension('J')->setWidth(25);
		$sheet->getColumnDimension('L')->setWidth(25);
		$sheet->getColumnDimension('O')->setWidth(35);
		$sheet->getColumnDimension('X')->setWidth(15);
		$sheet->getColumnDimension('AA')->setWidth(50);


		//NOMBRE CELDAS
				$sheet->setCellValue('A2','SEDE_COD');
				$sheet->setCellValue('B2','SEDE');
				$sheet->setCellValue('C2','ODEI' );
				$sheet->setCellValue('D2','ODEI_COD' );
				$sheet->setCellValue('E2','CCDD' );
				$sheet->setCellValue('F2','DEPARTAMENTO' );
				$sheet->setCellValue('G2','CCPP' );
				$sheet->setCellValue('H2','PROVINCIA' );
				$sheet->setCellValue('I2','CCDI' );
				$sheet->setCellValue('J2','DISTRITO' );
				$sheet->setCellValue('K2','COD_CCPP' );
				$sheet->setCellValue('L2','CENTRO POBLADO' );
				$sheet->setCellValue('M2','DIA ' );
				$sheet->setCellValue('N2', 'MES' );
				$sheet->setCellValue('O2', 'NOMBRES Y APELLIDOS' );
				$sheet->setCellValue('P2', 'CARGO' );
				$sheet->setCellValue('Q2', 'F. PESCADOR.' );
				$sheet->setCellValue('R2', 'F. ACUICULTOR.' );
				$sheet->setCellValue('S2', 'F. COMUNIDAD.' );
				$sheet->setCellValue('T2', 'SECCION' );
				$sheet->setCellValue('U2', 'PREGUNTA.' );
				$sheet->setCellValue('V2', 'E_CONC.' );
				$sheet->setCellValue('W2', 'E_DILIG.' );
				$sheet->setCellValue('X2','E_PREG ');
				$sheet->setCellValue('Y2',' E_SOND');
				$sheet->setCellValue('Z2',' E_OMI.');
				$sheet->setCellValue('AA2',' DESCRIPCIÓN DEL ERROR');

		//CELDAS

     	$headStyle = $this->phpexcel->getActiveSheet()->getStyle('A2:AA2');
        $headStyle->getFill()->setFillType(PHPExcel_Style_Fill::FILL_SOLID)->getStartColor()->setARGB('#FF9900');


		$total = $registros->num_rows()+2;
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
				$row = 2;
				$col = 0;
				 foreach($registros->result() as $filas){
				    $row ++;
				    //$rec = 0;
					 foreach($filas as $cols){
				  		$sheet->getCellByColumnAndRow($col++, $row)->setValue($cols);
					 }
					 $col =0;
				}
		// Salida
		header("Content-Type: application/vnd.ms-excel");
		$nombreArchivo = 'ObservacionCampo_'.date('YmdHis');
		header("Content-Disposition: attachment; filename=\"$nombreArchivo.xls\"");
		header("Cache-Control: max-age=0");
		// Genera Excel

		$writer = PHPExcel_IOFactory::createWriter($this->phpexcel, "Excel5");
		//$writer = new PHPExcel_Writer_Excel2007($this->phpexcel);

		$writer->save('php://output');
		exit;
 	}





}




/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */