<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Pescador extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		$this->load->helper(array('form', 'url'));
		$this->load->library('form_validation');
		$this->load->library('security');
		$this->load->library('tank_auth');
		$this->load->library('table');
		$this->lang->load('tank_auth');	
		$this->load->model('pescador_model');
		$this->load->model('marco_model');
		$this->load->helper('date');
		date_default_timezone_set('America/Lima');		
	    $tmpl = array ( 'table_open'  => '<table class="table table-bordered table-striped table-submit table-condensed" style="background-color:#fff">' );
	    $this->table->set_template($tmpl);
		if (!$this->tank_auth->is_logged_in()) {
			// redirect('/auth/login/');
			//No loging enviar a bienvenida cenpesco
			redirect('/auth/login/');
		}

		//Check user privileges 
		$roles = $this->tank_auth->get_roles();
		$flag = FALSE;
		foreach ($roles as $role) {
			if($role->role_id == 10 && $role->rolename == 'Consistencia'){
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
			$data['title'] = 'Consistencia';
			$data['user_id']	= $this->tank_auth->get_user_id();
			$data['username']	= $this->tank_auth->get_username();				
			$data['tables'] = $this->pescador_model->get_report1(); 
			$data['opcion'] = 1;
			$data['main_content'] = 'consistencia/pescador/reporte1_view';
			$this->load->view('backend/includes/template', $data);		
	}

	public function reporte2()
	{
			$data['nav'] = TRUE;
			$data['title'] = 'Consistencia';
			$data['user_id']	= $this->tank_auth->get_user_id();
			$data['username']	= $this->tank_auth->get_username();	
			$all = $this->pescador_model->get_report2();	
			$i = 0;			
			$ag = null;
			foreach($all->result() as $a){
				$ag[$i] = $this->pescador_model->get_report2_dni($a->S2_4);	
				$i++;
			}
			$data['all'] = $all;
			$data['tables'] = $ag;
			$data['opcion'] = 2;
			$data['main_content'] = 'consistencia/pescador/reporte2_view';
			$this->load->view('backend/includes/template', $data);		
	}


	public function reporte3()
	{
			$data['nav'] = TRUE;
			$data['title'] = 'Consistencia';
			$data['user_id']	= $this->tank_auth->get_user_id();
			$data['username']	= $this->tank_auth->get_username();	
			$all = $this->pescador_model->get_report3();	
			$i = 0;			
			$ag = null;
			foreach($all->result() as $a){
				$ag[$i] = $this->pescador_model->get_report3_ruc($a->S2_5);	
				$i++;
			}
			$data['all'] = $all;
			$data['tables'] = $ag;
			$data['opcion'] = 3;
			$data['main_content'] = 'consistencia/pescador/reporte3_view';
			$this->load->view('backend/includes/template', $data);		
	}

	public function reporte4()
	{
			$data['nav'] = TRUE;
			$data['title'] = 'Consistencia';
			$data['user_id']	= $this->tank_auth->get_user_id();
			$data['username']	= $this->tank_auth->get_username();				
			$data['tables'] = $this->pescador_model->get_report4(); 
			$data['opcion'] = 4;
			$data['main_content'] = 'consistencia/pescador/reporte4_view';
			$this->load->view('backend/includes/template', $data);		
	}
	public function reporte5()
	{
			$data['nav'] = TRUE;
			$data['title'] = 'Consistencia';
			$data['user_id']	= $this->tank_auth->get_user_id();
			$data['username']	= $this->tank_auth->get_username();				
			$data['tables'] = $this->pescador_model->get_report5(); 
			$data['opcion'] = 5;
			$data['main_content'] = 'consistencia/pescador/reporte5_view';
			$this->load->view('backend/includes/template', $data);		
	}

	public function reporte6()
	{
			$data['nav'] = TRUE;
			$data['title'] = 'Consistencia';
			$data['user_id']	= $this->tank_auth->get_user_id();
			$data['username']	= $this->tank_auth->get_username();				
			$data['tables'] = $this->pescador_model->get_report6(); 
			$data['opcion'] = 6;
			$data['main_content'] = 'consistencia/pescador/reporte6_view';
			$this->load->view('backend/includes/template', $data);		
	}
	
	public function reporte7()
	{
			$data['nav'] = TRUE;
			$data['title'] = 'Consistencia';
			$data['user_id']	= $this->tank_auth->get_user_id();
			$data['username']	= $this->tank_auth->get_username();				
			$data['tables'] = $this->pescador_model->get_report7(); 
			$data['opcion'] = 7;
			$data['main_content'] = 'consistencia/pescador/reporte7_view';
			$this->load->view('backend/includes/template', $data);		
	}

	public function reporte8()
	{
			$data['nav'] = TRUE;
			$data['title'] = 'Consistencia';
			$data['user_id']	= $this->tank_auth->get_user_id();
			$data['username']	= $this->tank_auth->get_username();				
			$data['tables'] = $this->pescador_model->get_report8(); 
			$data['opcion'] = 8;
			$data['main_content'] = 'consistencia/pescador/reporte8_view';
			$this->load->view('backend/includes/template', $data);		
	}

	public function reporte9()
	{
			$data['nav'] = TRUE;
			$data['title'] = 'Consistencia';
			$data['user_id']	= $this->tank_auth->get_user_id();
			$data['username']	= $this->tank_auth->get_username();				
			$data['tables'] = $this->pescador_model->get_report9(); 
			$data['opcion'] = 9;
			$data['main_content'] = 'consistencia/pescador/reporte9_view';
			$this->load->view('backend/includes/template', $data);		
	}

	public function reporte10()
	{
			$data['nav'] = TRUE;
			$data['title'] = 'Consistencia';
			$data['user_id']	= $this->tank_auth->get_user_id();
			$data['username']	= $this->tank_auth->get_username();				
			$data['tables'] = $this->pescador_model->get_report10(); 
			$data['opcion'] = 10;
			$data['main_content'] = 'consistencia/pescador/reporte10_view';
			$this->load->view('backend/includes/template', $data);		
	}

	public function reporte11()
	{
			$data['nav'] = TRUE;
			$data['title'] = 'Consistencia';
			$data['user_id']	= $this->tank_auth->get_user_id();
			$data['username']	= $this->tank_auth->get_username();				
			$cab = $this->pescador_model->get_report_cab(); 
			$this->table->set_heading('SEDE', 'DEPARTAMENTO','PROVINCIA','DISTRITO','CENTRO POBLADO','FORMULARIO N°','Numero de orden','¿Cuál es el último nivel de estudios aprobado?','EDAD');
			$son = null;
			foreach($cab->result() as $c){
				$son[$c->id] = $this->pescador_model->get_report11_son($c->id)->row_array(); 
				for($i = 1; $i<=10; $i++){
					$aa = 'S2_23_1_' . $i;
					$ab = 'S2_23_8_' . $i;
					$ac = 'S2_23_4_' . $i . 'A';
					if(!is_null($son[$c->id][$aa])){
						if( ($son[$c->id][$ab] == 2 && $son[$c->id][$ac] > 49) 
							|| ($son[$c->id][$ab] == 3 && $son[$c->id][$ac] < 5)
							|| ($son[$c->id][$ab] == 4 && $son[$c->id][$ac] < 10)
							|| ($son[$c->id][$ab] == 5 && $son[$c->id][$ac] < 11)
							|| ($son[$c->id][$ab] == 6 && $son[$c->id][$ac] < 16)
							|| ($son[$c->id][$ab] == 7 && $son[$c->id][$ac] < 16)
							|| ($son[$c->id][$ab] == 8 && $son[$c->id][$ac] < 18)
							|| ($son[$c->id][$ab] == 9 && $son[$c->id][$ac] < 16)
							|| ($son[$c->id][$ab] == 10 && $son[$c->id][$ac] < 21)){
							$this->table->add_row(
								$son[$c->id]['NOM_SEDE'],
								$son[$c->id]['NOM_DD'],
								$son[$c->id]['NOM_PP'],
								$son[$c->id]['NOM_DI'],
								$son[$c->id]['NOM_CCPP'],
								$son[$c->id]['NFORM'],
								$son[$c->id][$aa],
								$son[$c->id][$ab],
								$son[$c->id][$ac]
							);		
						}		
					}
				}
			}
			$data['son'] = $son;
			$data['opcion'] = 11;
			$data['main_content'] = 'consistencia/pescador/reporte11_view';
			$this->load->view('backend/includes/template', $data);		
	}

	public function reporte12()
	{
			$data['nav'] = TRUE;
			$data['title'] = 'Consistencia';
			$data['user_id']	= $this->tank_auth->get_user_id();
			$data['username']	= $this->tank_auth->get_username();				
			$cab = $this->pescador_model->get_report_cab(); 
			$this->table->set_heading('SEDE', 'DEPARTAMENTO','PROVINCIA','DISTRITO','CENTRO POBLADO','FORMULARIO N°','Numero de orden','Hijo Edad','EDAD');
			$son = null;
			foreach($cab->result() as $c){
				$son[$c->id] = $this->pescador_model->get_report12_son($c->id)->row_array(); 
				for($i = 1; $i<=10; $i++){
					$aa = 'S2_23_1_' . $i;
					$ac = 'S2_23_4_' . $i . 'A';
					if(!is_null($son[$c->id][$aa])){
						$edad = date('Y') - $son[$c->id]['S2_2A'];
						if( ($edad - $son[$c->id][$ac]) < 12 ){
							$this->table->add_row(
								$son[$c->id]['NOM_SEDE'],
								$son[$c->id]['NOM_DD'],
								$son[$c->id]['NOM_PP'],
								$son[$c->id]['NOM_DI'],
								$son[$c->id]['NOM_CCPP'],
								$son[$c->id]['NFORM'],
								$son[$c->id][$aa],
								$son[$c->id][$ac],
								$edad
							);		
						}		
					}
				}
			}
			$data['son'] = $son;
			$data['opcion'] = 12;
			$data['main_content'] = 'consistencia/pescador/reporte12_view';
			$this->load->view('backend/includes/template', $data);		
	}

	public function reporte13()
	{
			$data['nav'] = TRUE;
			$data['title'] = 'Consistencia';
			$data['user_id']	= $this->tank_auth->get_user_id();
			$data['username']	= $this->tank_auth->get_username();				
			$cab = $this->pescador_model->get_report_cab(); 
			$this->table->set_heading('SEDE', 'DEPARTAMENTO','PROVINCIA','DISTRITO','CENTRO POBLADO','FORMULARIO N°','Numero de orden','Su hijo depende economicamente de usted?','Hijo Edad');
			$son = null;
			foreach($cab->result() as $c){
				$son[$c->id] = $this->pescador_model->get_report13_son($c->id)->row_array(); 
				for($i = 1; $i<=10; $i++){
					$aa = 'S2_23_1_' . $i;
					$ab = 'S2_23_6_' . $i;
					$ac = 'S2_23_4_' . $i . 'A';
					if(!is_null($son[$c->id][$aa])){
						if( ($son[$c->id][$ab] == 2 && $son[$c->id][$ac] < 12) || ($son[$c->id][$ab] == 1 && $son[$c->id][$ac] > 30) ){
							$this->table->add_row(
								$son[$c->id]['NOM_SEDE'],
								$son[$c->id]['NOM_DD'],
								$son[$c->id]['NOM_PP'],
								$son[$c->id]['NOM_DI'],
								$son[$c->id]['NOM_CCPP'],
								$son[$c->id]['NFORM'],
								$son[$c->id][$aa],
								$son[$c->id][$ab],
								$son[$c->id][$ac]
							);		
						}		
					}
				}
			}
			$data['son'] = $son;
			$data['opcion'] = 13;
			$data['main_content'] = 'consistencia/pescador/reporte13_view';
			$this->load->view('backend/includes/template', $data);		
	}

	public function reporte14()
	{
			$data['nav'] = TRUE;
			$data['title'] = 'Consistencia';
			$data['user_id']	= $this->tank_auth->get_user_id();
			$data['username']	= $this->tank_auth->get_username();				
			$data['tables'] = $this->pescador_model->get_report14(); 
			$data['opcion'] = 14;
			$data['main_content'] = 'consistencia/pescador/reporte14_view';
			$this->load->view('backend/includes/template', $data);		
	}

	public function reporte15()
	{
			$data['nav'] = TRUE;
			$data['title'] = 'Consistencia';
			$data['user_id']	= $this->tank_auth->get_user_id();
			$data['username']	= $this->tank_auth->get_username();				
			$data['tables'] = $this->pescador_model->get_report15(); 
			$data['opcion'] = 15;
			$data['main_content'] = 'consistencia/pescador/reporte15_view';
			$this->load->view('backend/includes/template', $data);		
	}

	public function reporte16()
	{
			$data['nav'] = TRUE;
			$data['title'] = 'Consistencia';
			$data['user_id']	= $this->tank_auth->get_user_id();
			$data['username']	= $this->tank_auth->get_username();				
			$data['tables'] = $this->pescador_model->get_report16(); 
			$data['opcion'] = 16;
			$data['main_content'] = 'consistencia/pescador/reporte16_view';
			$this->load->view('backend/includes/template', $data);		
	}

	public function reporte17()
	{
			$data['nav'] = TRUE;
			$data['title'] = 'Consistencia';
			$data['user_id']	= $this->tank_auth->get_user_id();
			$data['username']	= $this->tank_auth->get_username();				
			$data['tables'] = $this->pescador_model->get_report17(); 
			$data['opcion'] = 17;
			$data['main_content'] = 'consistencia/pescador/reporte17_view';
			$this->load->view('backend/includes/template', $data);		
	}

	public function reporte18()
	{
			$data['nav'] = TRUE;
			$data['title'] = 'Consistencia';
			$data['user_id']	= $this->tank_auth->get_user_id();
			$data['username']	= $this->tank_auth->get_username();				
			$data['tables'] = $this->pescador_model->get_report18(); 
			$data['opcion'] = 18;
			$data['main_content'] = 'consistencia/pescador/reporte18_view';
			$this->load->view('backend/includes/template', $data);		
	}

	public function reporte19()
	{
			$data['nav'] = TRUE;
			$data['title'] = 'Consistencia';
			$data['user_id']	= $this->tank_auth->get_user_id();
			$data['username']	= $this->tank_auth->get_username();				
			$data['tables'] = $this->pescador_model->get_report19(); 
			$data['opcion'] = 19;
			$data['main_content'] = 'consistencia/pescador/reporte19_view';
			$this->load->view('backend/includes/template', $data);		
	}

	public function reporte20()
	{
			$data['nav'] = TRUE;
			$data['title'] = 'Consistencia';
			$data['user_id']	= $this->tank_auth->get_user_id();
			$data['username']	= $this->tank_auth->get_username();				
			$data['tables'] = $this->pescador_model->get_report20(); 
			$data['opcion'] = 20;
			$data['main_content'] = 'consistencia/pescador/reporte20_view';
			$this->load->view('backend/includes/template', $data);		
	}

	public function reporte21()
	{
			$data['nav'] = TRUE;
			$data['title'] = 'Consistencia';
			$data['user_id']	= $this->tank_auth->get_user_id();
			$data['username']	= $this->tank_auth->get_username();				
			$data['tables'] = $this->pescador_model->get_report21(); 
			$data['opcion'] = 21;
			$data['main_content'] = 'consistencia/pescador/reporte21_view';
			$this->load->view('backend/includes/template', $data);		
	}

	public function reporte22()
	{
			$data['nav'] = TRUE;
			$data['title'] = 'Consistencia';
			$data['user_id']	= $this->tank_auth->get_user_id();
			$data['username']	= $this->tank_auth->get_username();				
			$cab = $this->pescador_model->get_report_cab(); 
			$this->table->set_heading('SEDE', 'DEPARTAMENTO','PROVINCIA','DISTRITO','CENTRO POBLADO','FORMULARIO N°','En los ultimos 12 meses realizo su actividad de pesca','¿En que meses realizó su actividad de pesca? Agosto 2012 CANTIDAD');
			$son = null;
			foreach($cab->result() as $c){
				$son[$c->id] = $this->pescador_model->get_report22($c->id)->row_array(); 
				for($i = 1; $i<=12; $i++){
					$aa = 'S7_3_' . $i;
					$ab = 'S7_3_' . $i . '_C';
					if($son[$c->id][$aa]!=0 && !is_null($son[$c->id][$ab]) && $son[$c->id][$ab]!=99999){
						if($son[$c->id][$ab] < 10 || $son[$c->id][$ab] > 5000){
							$this->table->add_row(
								$son[$c->id]['NOM_SEDE'],
								$son[$c->id]['NOM_DD'],
								$son[$c->id]['NOM_PP'],
								$son[$c->id]['NOM_DI'],
								$son[$c->id]['NOM_CCPP'],
								$son[$c->id]['NFORM'],
								$son[$c->id][$aa],
								$son[$c->id][$ab]
							);		
						}		
					}
				}
			}
			$data['son'] = $son;
			$data['opcion'] = 22;
			$data['main_content'] = 'consistencia/pescador/reporte22_view';
			$this->load->view('backend/includes/template', $data);			
	}

	public function reporte23()
	{
			$data['nav'] = TRUE;
			$data['title'] = 'Consistencia';
			$data['user_id']	= $this->tank_auth->get_user_id();
			$data['username']	= $this->tank_auth->get_username();				
			$cab = $this->pescador_model->get_report_cab(); 
			$this->table->set_heading('SEDE', 'DEPARTAMENTO','PROVINCIA','DISTRITO','CENTRO POBLADO','FORMULARIO N°','Numero de embarcacion','La embarcacion que utiliza es:');
			$son = null;
			foreach($cab->result() as $c){
				$son[$c->id] = $this->pescador_model->get_report23($c->id)->row_array(); 
				for($i = 1; $i<=6; $i++){
					$aa = 'S9_3_' . $i;
					$ab = 'S9_9_' . $i . '_A';
					if(!is_null($son[$c->id][$aa])){
						if($son[$c->id][$ab] > 5){
							$this->table->add_row(
								$son[$c->id]['NOM_SEDE'],
								$son[$c->id]['NOM_DD'],
								$son[$c->id]['NOM_PP'],
								$son[$c->id]['NOM_DI'],
								$son[$c->id]['NOM_CCPP'],
								$son[$c->id]['NFORM'],
								$son[$c->id][$aa],
								$son[$c->id][$ab]
							);		
						}		
					}
				}
			}
			$data['son'] = $son;
			$data['opcion'] = 23;
			$data['main_content'] = 'consistencia/pescador/reporte23_view';
			$this->load->view('backend/includes/template', $data);			
	}

	public function reporte24()
	{
			$data['nav'] = TRUE;
			$data['title'] = 'Consistencia';
			$data['user_id']	= $this->tank_auth->get_user_id();
			$data['username']	= $this->tank_auth->get_username();				
			$cab = $this->pescador_model->get_report_cab(); 
			$this->table->set_heading('SEDE', 'DEPARTAMENTO','PROVINCIA','DISTRITO','CENTRO POBLADO','FORMULARIO N°','Numero de embarcacion','¿El tipo de bodega es: Capacidad');
			$son = null;
			foreach($cab->result() as $c){
				$son[$c->id] = $this->pescador_model->get_report24($c->id)->row_array(); 
				for($i = 1; $i<=6; $i++){
					$aa = 'S9_3_' . $i;
					$ab = 'S9_20_' . $i . '_C';
					if(!is_null($son[$c->id][$aa]) && $son[$c->id][$aa]!=0){
						if($son[$c->id][$ab] < 5 || $son[$c->id][$ab] > 500){
							$this->table->add_row(
								$son[$c->id]['NOM_SEDE'],
								$son[$c->id]['NOM_DD'],
								$son[$c->id]['NOM_PP'],
								$son[$c->id]['NOM_DI'],
								$son[$c->id]['NOM_CCPP'],
								$son[$c->id]['NFORM'],
								$son[$c->id][$aa],
								$son[$c->id][$ab]
							);		
						}		
					}
				}
			}
			$data['son'] = $son;
			$data['opcion'] = 24;
			$data['main_content'] = 'consistencia/pescador/reporte24_view';
			$this->load->view('backend/includes/template', $data);			
	}

	public function reporte25()
	{
			$data['nav'] = TRUE;
			$data['title'] = 'Consistencia';
			$data['user_id']	= $this->tank_auth->get_user_id();
			$data['username']	= $this->tank_auth->get_username();				
			$cab = $this->pescador_model->get_report_cab(); 
			$this->table->set_heading('SEDE', 'DEPARTAMENTO','PROVINCIA','DISTRITO','CENTRO POBLADO','FORMULARIO N°','Numero de embarcacion','UNIDAD DE MEDIDA DE LA EMBARCACION','medidas de la embarcacion largo', 'medidas de la embarcacion ancho','medidas de la embarcacion altura');
			$son = null;
			foreach($cab->result() as $c){
				$son[$c->id] = $this->pescador_model->get_report25($c->id)->row_array(); 
				for($i = 1; $i<=6; $i++){
					$aa = 'S9_3_' . $i;
					$ab = 'S9_10_' . $i . '_MED';
					$ac = 'S9_10_' . $i . '_1';
					$ad = 'S9_10_' . $i . '_2';
					$ae = 'S9_10_' . $i . '_3';
					if(!is_null($son[$c->id][$ab]) && $son[$c->id][$ab]==1){
						if(($son[$c->id][$ac] < 1 || $son[$c->id][$ac] > 7) || ($son[$c->id][$ad] < 1 || $son[$c->id][$ad] > 4) || ($son[$c->id][$ae] < 0.5 || $son[$c->id][$ae] > 1)){
							$this->table->add_row(
								$son[$c->id]['NOM_SEDE'],
								$son[$c->id]['NOM_DD'],
								$son[$c->id]['NOM_PP'],
								$son[$c->id]['NOM_DI'],
								$son[$c->id]['NOM_CCPP'],
								$son[$c->id]['NFORM'],
								$son[$c->id][$aa],
								$son[$c->id][$ab],
								$son[$c->id][$ac],
								$son[$c->id][$ad],
								$son[$c->id][$ae]
							);		
						}		
					}
				}
			}
			$data['son'] = $son;
			$data['opcion'] = 25;
			$data['main_content'] = 'consistencia/pescador/reporte25_view';
			$this->load->view('backend/includes/template', $data);			
	}


	public function reporte26()
	{
			$data['nav'] = TRUE;
			$data['title'] = 'Consistencia';
			$data['user_id']	= $this->tank_auth->get_user_id();
			$data['username']	= $this->tank_auth->get_username();				
			$cab = $this->pescador_model->get_report_cab(); 
			$this->table->set_heading('SEDE', 'DEPARTAMENTO','PROVINCIA','DISTRITO','CENTRO POBLADO','FORMULARIO N°','Numero de embarcacion','UNIDAD DE MEDIDA DE LA EMBARCACION','medidas de la embarcacion largo', 'medidas de la embarcacion ancho','medidas de la embarcacion altura');
			$son = null;
			foreach($cab->result() as $c){
				$son[$c->id] = $this->pescador_model->get_report25($c->id)->row_array(); 
				for($i = 1; $i<=6; $i++){
					$aa = 'S9_3_' . $i;
					$ab = 'S9_10_' . $i . '_MED';
					$ac = 'S9_10_' . $i . '_1';
					$ad = 'S9_10_' . $i . '_2';
					$ae = 'S9_10_' . $i . '_3';
					if(!is_null($son[$c->id][$ab]) && $son[$c->id][$ab]==2){
						if(($son[$c->id][$ac] < 4 || $son[$c->id][$ac] > 18) || ($son[$c->id][$ad] < 4 || $son[$c->id][$ad] > 14) || ($son[$c->id][$ae] < 1 || $son[$c->id][$ae] > 8)){
							$this->table->add_row(
								$son[$c->id]['NOM_SEDE'],
								$son[$c->id]['NOM_DD'],
								$son[$c->id]['NOM_PP'],
								$son[$c->id]['NOM_DI'],
								$son[$c->id]['NOM_CCPP'],
								$son[$c->id]['NFORM'],
								$son[$c->id][$aa],
								$son[$c->id][$ab],
								$son[$c->id][$ac],
								$son[$c->id][$ad],
								$son[$c->id][$ae]
							);		
						}		
					}
				}
			}
			$data['son'] = $son;
			$data['opcion'] = 26;
			$data['main_content'] = 'consistencia/pescador/reporte25_view';
			$this->load->view('backend/includes/template', $data);			
	}	


	public function reporte27()
	{
			$data['nav'] = TRUE;
			$data['title'] = 'Consistencia';
			$data['user_id']	= $this->tank_auth->get_user_id();
			$data['username']	= $this->tank_auth->get_username();				
			$cab = $this->pescador_model->get_report_cab(); 
			$this->table->set_heading('SEDE', 'DEPARTAMENTO','PROVINCIA','DISTRITO','CENTRO POBLADO','FORMULARIO N°','Numero de embarcacion','UNIDAD DE MEDIDA DE LA BODEGA','medidas de la bodega largo', 'medidas de la bodega ancho','medidas de la bodega altura');
			$son = null;
			foreach($cab->result() as $c){
				$son[$c->id] = $this->pescador_model->get_report27($c->id)->row_array(); 
				for($i = 1; $i<=6; $i++){
					$aa = 'S9_3_' . $i;
					$ab = 'S9_22_' . $i . '_MED';
					$ac = 'S9_22_' . $i . '_1';
					$ad = 'S9_22_' . $i . '_2';
					$ae = 'S9_22_' . $i . '_3';
					if(!is_null($son[$c->id][$ab]) && $son[$c->id][$ab]==1){
						if(($son[$c->id][$ac] < 1 || $son[$c->id][$ac] > 8) || ($son[$c->id][$ad] < 1 || $son[$c->id][$ad] > 6) || ($son[$c->id][$ae] < 0.5 || $son[$c->id][$ae] > 2)){
							$this->table->add_row(
								$son[$c->id]['NOM_SEDE'],
								$son[$c->id]['NOM_DD'],
								$son[$c->id]['NOM_PP'],
								$son[$c->id]['NOM_DI'],
								$son[$c->id]['NOM_CCPP'],
								$son[$c->id]['NFORM'],
								$son[$c->id][$aa],
								$son[$c->id][$ab],
								$son[$c->id][$ac],
								$son[$c->id][$ad],
								$son[$c->id][$ae]
							);		
						}		
					}
				}
			}
			$data['son'] = $son;
			$data['opcion'] = 27;
			$data['main_content'] = 'consistencia/pescador/reporte27_view';
			$this->load->view('backend/includes/template', $data);			
	}	

	public function reporte28()
	{
			$data['nav'] = TRUE;
			$data['title'] = 'Consistencia';
			$data['user_id']	= $this->tank_auth->get_user_id();
			$data['username']	= $this->tank_auth->get_username();				
			$cab = $this->pescador_model->get_report_cab(); 
			$this->table->set_heading('SEDE', 'DEPARTAMENTO','PROVINCIA','DISTRITO','CENTRO POBLADO','FORMULARIO N°','Numero de embarcacion','UNIDAD DE MEDIDA DE LA BODEGA','medidas de la bodega largo', 'medidas de la bodega ancho','medidas de la bodega altura');
			$son = null;
			foreach($cab->result() as $c){
				$son[$c->id] = $this->pescador_model->get_report27($c->id)->row_array(); 
				for($i = 1; $i<=6; $i++){
					$aa = 'S9_3_' . $i;
					$ab = 'S9_22_' . $i . '_MED';
					$ac = 'S9_22_' . $i . '_1';
					$ad = 'S9_22_' . $i . '_2';
					$ae = 'S9_22_' . $i . '_3';
					if(!is_null($son[$c->id][$ab]) && $son[$c->id][$ab]==2){
						if(($son[$c->id][$ac] < 2 || $son[$c->id][$ac] > 15) || ($son[$c->id][$ad] < 2 || $son[$c->id][$ad] > 8) || ($son[$c->id][$ae] < 1 || $son[$c->id][$ae] > 3)){
							$this->table->add_row(
								$son[$c->id]['NOM_SEDE'],
								$son[$c->id]['NOM_DD'],
								$son[$c->id]['NOM_PP'],
								$son[$c->id]['NOM_DI'],
								$son[$c->id]['NOM_CCPP'],
								$son[$c->id]['NFORM'],
								$son[$c->id][$aa],
								$son[$c->id][$ab],
								$son[$c->id][$ac],
								$son[$c->id][$ad],
								$son[$c->id][$ae]
							);		
						}		
					}
				}
			}
			$data['son'] = $son;
			$data['opcion'] = 28;
			$data['main_content'] = 'consistencia/pescador/reporte28_view';
			$this->load->view('backend/includes/template', $data);			
	}

	// function to_excel(){
	// 	$this->load->helper('excel');
 //        $query = $this->udra_comunidad_model->get_all_export();
 //        to_excel($query, 'Udra_Comunidad');
	// }


}