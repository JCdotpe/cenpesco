<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Avance extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		$this->output->nocache();
		$this->load->library('form_validation');
		$this->load->library('security');
		$this->load->library('tank_auth');
		$this->load->library('phpexcel');
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
			$data['nav'] = TRUE;
			//regular
			//$data['departamentos'] = $this->ubigeo_piloto_model->get_dptos();
			$data['title'] = 'Revision';

			//cabecera
			foreach ($this->marco_model->get_odei($this->tank_auth->get_ubigeo())->result() as $key ) {
				$odei[] = $key->ODEI_COD;
			}
			$data['departamento'] = $this->marco_model->get_dpto_by_odei($odei); 
			
			//regular
			//$data['tables'] = $this->avance_campo_model->get_todo($odei);
			$data['main_content'] = 'monitoreo/avance_view';
			$data['option'] = 1;
	        $this->load->view('backend/includes/template', $data);

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

		foreach ($this->marco_model->get_odei($this->tank_auth->get_ubigeo())->result() as $key ) {
			$odei[] = $key->ODEI_COD;
		}
		
		//regular
		$registros = $this->avance_campo_model->get_todo($odei);    	

		// Propiedades del archivo excel
			$this->phpexcel->getProperties()
			->setTitle("Avance de campo")
			->setDescription("Avance");

		// Setiar la solapa que queda actia al abrir el excel
		$this->phpexcel->setActiveSheetIndex(0);

		// Solapa excel para trabajar con PHP
		$sheet = $this->phpexcel->getActiveSheet(0);
		$sheet->setTitle("Avance de campo");
		$sheet->getColumnDimension('A')->setWidth(10);
		$sheet->getColumnDimension('B')->setWidth(25);
		$sheet->getColumnDimension('D')->setWidth(25);
		$sheet->getColumnDimension('F')->setWidth(25);
		$sheet->getColumnDimension('H')->setWidth(25);
		$sheet->getColumnDimension('J')->setWidth(25);
		$sheet->getColumnDimension('L')->setWidth(25);
		$sheet->getColumnDimension('O')->setWidth(35);
		$sheet->getColumnDimension('X')->setWidth(15);
		$sheet->getColumnDimension('AC')->setWidth(15);


		//NOMBRE CELDAS
				$sheet->setCellValue('P1','COMUNIDADES' );
				$sheet->setCellValue('T1','PESCADOR ' );
				$sheet->setCellValue('Y1','ACUICULTOR ' );
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
				$sheet->setCellValue('O2', 'JEFE DE BRIGADA' );
				$sheet->setCellValue('P2', 'TOTAL' );
				$sheet->setCellValue('Q2', 'COMP.' );
				$sheet->setCellValue('R2', 'INCO.' );
				$sheet->setCellValue('S2', 'RECHZ.' );
				$sheet->setCellValue('T2', 'TOTAL' );
				$sheet->setCellValue('U2', 'COMP.' );
				$sheet->setCellValue('V2', 'INCO.' );
				$sheet->setCellValue('W2', 'RECHZ.' );
				$sheet->setCellValue('X2','EMBARCACIONES ');
				$sheet->setCellValue('Y2',' TOTAL');
				$sheet->setCellValue('Z2',' COMP.');
				$sheet->setCellValue('AA2',' INCO.');
				$sheet->setCellValue('AB2',' RECHZ.');
				$sheet->setCellValue('AC2',' EMBARCACIONES');
		//CELDAS

     	$headStyle = $this->phpexcel->getActiveSheet()->getStyle('A2:AC2');
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
		$nombreArchivo = 'AvanceCampo_'.date('YmdHis');
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