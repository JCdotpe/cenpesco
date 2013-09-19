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
		$this->load->model('tabulados_model');
		$this->load->model('marco_model');
		$this->load->model('ubigeo_model');
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
			if($role->role_id == 6 && $role->rolename == 'Tabulados'){
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
			$data['title'] = 'Tabulados';			
			$pesc = $this->tabulados_model->get_report1(1);
			foreach($pesc->result() as $p){
				$apesc[$p->CCDD] = $p->num; 
			} 
			$acu = $this->tabulados_model->get_report1(2); 
			foreach($acu->result() as $p){
				$aacu[$p->CCDD] = $p->num; 
			} 			
			$pc = $this->tabulados_model->get_report1(3); 
			foreach($pc->result() as $p){
				$apc[$p->CCDD] = $p->num; 
			} 			
			//total
			$total = 0;
			$t1 = null;
			for($i=1; $i<=3; $i++){
				$t1[$i] = $this->tabulados_model->get_report1($i,1)->row()->num; 
				$total += $t1[$i];
			}


			$data['opcion'] = 1;
			$data['total'] = $total; 
			$data['totales'] = $t1; 
			$data['dep'] = $this->tabulados_model->get_dptos();
			$data['apesc'] = $apesc;
			$data['aacu'] = $aacu;
			$data['apc'] = $apc;
			$data['main_content'] = 'tabulados/pescador/reporte1_view';
			$this->load->view('backend/includes/template', $data);		
	}

	public function reporte2()
	{
			$h = $this->tabulados_model->get_report2(1);
			foreach($h->result() as $p){
				$ah[$p->CCDD] = $p->num; 
			} 			 
			$m = $this->tabulados_model->get_report2(2); 
			foreach($m->result() as $p){
				$am[$p->CCDD] = $p->num; 
			} 	

			//total
			$total = 0;
			$t1 = null;
			for($i=1; $i<=2; $i++){
				$t1[$i] = $this->tabulados_model->get_report1($i,1)->row()->num; 
				$total += $t1[$i];
			}

			$data['h'] = $ah;
			$data['m'] = $am;
			$data['total'] = $total; 
			$data['totales'] = $t1; 			
			$data['dep'] = $this->tabulados_model->get_dptos();
			$data['all'] = $this->tabulados_model->get_report2(); 
			$data['nav'] = TRUE;
			$data['title'] = 'Tabulados';			
			$data['opcion'] = 2;
			$data['main_content'] = 'tabulados/pescador/reporte2_view';
			$this->load->view('backend/includes/template', $data);		
	}


	public function reporte3()
	{
			$deps = null;
			$tdeps = null;
			$dep = $this->tabulados_model->get_dptos();

			$totald = 0;
			foreach($dep->result() as $d){
				foreach($dep->result() as $id){
					$deps[$d->CCDD][$id->CCDD] = $this->tabulados_model->get_report3($id->CCDD, $d->CCDD)->row()->num;
				}
				$tdeps[$d->CCDD] = $this->tabulados_model->get_report3($d->CCDD)->row()->num;
				$totald += $tdeps[$d->CCDD];
			}

			$data['deps'] = $deps;
			$data['tdeps'] = $tdeps;
			$data['totald'] = $totald;
			$data['dep'] = $dep;
			$data['nav'] = TRUE;
			$data['title'] = 'Tabulados';			
			$data['opcion'] = 3;
			$data['main_content'] = 'tabulados/pescador/reporte3_view';
			$this->load->view('backend/includes/template', $data);		
	}

	public function reporte4()
	{
			$deps = null;
			$tdeps = null;
			$dep = $this->tabulados_model->get_dptos();
			$totald = 0;
			foreach($dep->result() as $d){
				foreach($dep->result() as $id){
					$deps[$d->CCDD][$id->CCDD] = $this->tabulados_model->get_report4($id->CCDD, $d->CCDD)->row()->num;
				}
				$tdeps[$d->CCDD] = $this->tabulados_model->get_report4($d->CCDD)->row()->num;
				$totald += $tdeps[$d->CCDD];
			}

			$data['deps'] = $deps;
			$data['tdeps'] = $tdeps;
			$data['totald'] = $totald;
			$data['dep'] = $dep;
			$data['nav'] = TRUE;
			$data['title'] = 'Tabulados';			
			$data['opcion'] = 4;
			$data['main_content'] = 'tabulados/pescador/reporte4_view';
			$this->load->view('backend/includes/template', $data);		
	}

	public function reporte5()
	{
			$dep = $this->tabulados_model->get_dptos();
			$vr = null;
			$tr = null;
			$total = 0;
			foreach($dep->result() as $d){
				$dd = 0;
				for($i=1; $i<=8; $i++){
					$vr[$d->CCDD][$i] = $this->tabulados_model->get_report5($i,$d->CCDD)->row()->num;
					$dd += $vr[$d->CCDD][$i]; 
				}
				$vt[$d->CCDD] = $dd; 
				$total += $dd;
			}
			for($i=1; $i<=8; $i++){
				$tr[$i] = $this->tabulados_model->get_report5($i)->row()->num; 
			}
			$data['vr'] = $vr;
			$data['vt'] = $vt;
			$data['tr'] = $tr;
			$data['total'] = $total;
			$data['dep'] = $dep;
			$data['nav'] = TRUE;
			$data['title'] = 'Tabulados';			
			$data['opcion'] = 5;
			$data['main_content'] = 'tabulados/pescador/reporte5_view';
			$this->load->view('backend/includes/template', $data);		
	}


	public function reporte6()
	{
			$dep = $this->tabulados_model->get_dptos();
			$vr = null;
			$tr = null;
			$total = 0;
			foreach($dep->result() as $d){
				$dd = 0;
				for($i=1; $i<=2; $i++){
					$vr[$d->CCDD][$i] = $this->tabulados_model->get_report6($i,$d->CCDD)->row()->num;
					$dd += $vr[$d->CCDD][$i]; 
				}
				$vt[$d->CCDD] = $dd; 
				$total += $dd;
			}
			for($i=1; $i<=2; $i++){
				$tr[$i] = $this->tabulados_model->get_report6($i)->row()->num; 
			}
			$data['vr'] = $vr;
			$data['vt'] = $vt;
			$data['tr'] = $tr;
			$data['total'] = $total;
			$data['dep'] = $dep;
			$data['nav'] = TRUE;
			$data['title'] = 'Tabulados';			
			$data['opcion'] = 6;
			$data['main_content'] = 'tabulados/pescador/reporte6_view';
			$this->load->view('backend/includes/template', $data);		
	}

	public function reporte7()
	{
			$dep = $this->tabulados_model->get_dptos();
			$vr = null;
			$tr = null;
			$total = 0;
			foreach($dep->result() as $d){
				$dd = 0;
				for($i=1; $i<=8; $i++){
					$vr[$d->CCDD][$i] = $this->tabulados_model->get_report7($i,$d->CCDD)->row()->num;
					$dd += $vr[$d->CCDD][$i]; 
				}
				$vt[$d->CCDD] = $dd; 
				$total += $dd;
			}
			for($i=1; $i<=8; $i++){
				$tr[$i] = $this->tabulados_model->get_report7($i)->row()->num; 
			}
			$data['vr'] = $vr;
			$data['vt'] = $vt;
			$data['tr'] = $tr;
			$data['total'] = $total;
			$data['dep'] = $dep;
			$data['nav'] = TRUE;
			$data['title'] = 'Tabulados';			
			$data['opcion'] = 7;
			$data['main_content'] = 'tabulados/pescador/reporte7_view';
			$this->load->view('backend/includes/template', $data);		
	}

	public function reporte8()
	{
			$dep = $this->tabulados_model->get_dptos();
			$vr = null;
			$tr = null;
			$total = 0;
			foreach($dep->result() as $d){
				$dd = 0;
				for($i=1; $i<=4; $i++){
					$vr[$d->CCDD][$i] = $this->tabulados_model->get_report8($i,$d->CCDD)->row()->num;
					$dd += $vr[$d->CCDD][$i]; 
				}
				$vt[$d->CCDD] = $dd; 
				$total += $dd;
			}
			for($i=1; $i<=4; $i++){
				$tr[$i] = $this->tabulados_model->get_report8($i)->row()->num; 
			}
			$data['vr'] = $vr;
			$data['vt'] = $vt;
			$data['tr'] = $tr;
			$data['total'] = $total;
			$data['dep'] = $dep;
			$data['nav'] = TRUE;
			$data['title'] = 'Tabulados';			
			$data['opcion'] = 8;
			$data['main_content'] = 'tabulados/pescador/reporte8_view';
			$this->load->view('backend/includes/template', $data);		
	}



	public function reporte9()
	{
			$dep = $this->tabulados_model->get_dptos();
			$vr = null;
			$tr = null;
			$total = 0;
			foreach($dep->result() as $d){
				$dd = 0;
				for($i=1; $i<=4; $i++){
					$vr[$d->CCDD][$i] = $this->tabulados_model->get_report9($i,$d->CCDD)->row()->num;
					$dd += $vr[$d->CCDD][$i]; 
				}
				$vt[$d->CCDD] = $dd; 
				$total += $dd;
			}
			for($i=1; $i<=4; $i++){
				$tr[$i] = $this->tabulados_model->get_report9($i)->row()->num; 
			}
			$data['vr'] = $vr;
			$data['vt'] = $vt;
			$data['tr'] = $tr;
			$data['total'] = $total;
			$data['dep'] = $dep;
			$data['nav'] = TRUE;
			$data['title'] = 'Tabulados';			
			$data['opcion'] = 9;
			$data['main_content'] = 'tabulados/pescador/reporte9_view';
			$this->load->view('backend/includes/template', $data);		
	}

	public function reporte10()
	{
			$dep = $this->tabulados_model->get_dptos();
			$vr = null;
			$tr = null;
			$total = 0;
			foreach($dep->result() as $d){
				$dd = 0;
				for($i=1; $i<=9; $i++){
					$vr[$d->CCDD][$i] = $this->tabulados_model->get_report10($i,$d->CCDD)->row()->num;
					$dd += $vr[$d->CCDD][$i]; 
				}
				$vt[$d->CCDD] = $dd; 
				$total += $dd;
			}
			for($i=1; $i<=9; $i++){
				$tr[$i] = $this->tabulados_model->get_report10($i)->row()->num; 
			}
			$data['vr'] = $vr;
			$data['vt'] = $vt;
			$data['tr'] = $tr;
			$data['total'] = $total;
			$data['dep'] = $dep;
			$data['nav'] = TRUE;
			$data['title'] = 'Tabulados';			
			$data['opcion'] = 10;
			$data['main_content'] = 'tabulados/pescador/reporte10_view';
			$this->load->view('backend/includes/template', $data);		
	}


	public function reporte11()
	{
			$dep = $this->tabulados_model->get_dptos();
			$vr = null;
			$tr = null;
			$total = 0;
			foreach($dep->result() as $d){
				$dd = 0;
				for($i=1; $i<=6; $i++){
					$vr[$d->CCDD][$i] = $this->tabulados_model->get_report11($i,$d->CCDD)->row()->num;
					$dd += $vr[$d->CCDD][$i]; 
				}
				$vt[$d->CCDD] = $dd; 
				$total += $dd;
			}
			for($i=1; $i<=6; $i++){
				$tr[$i] = $this->tabulados_model->get_report11($i)->row()->num; 
			}
			$data['vr'] = $vr;
			$data['vt'] = $vt;
			$data['tr'] = $tr;
			$data['total'] = $total;
			$data['dep'] = $dep;
			$data['nav'] = TRUE;
			$data['title'] = 'Tabulados';			
			$data['opcion'] = 11;
			$data['main_content'] = 'tabulados/pescador/reporte11_view';
			$this->load->view('backend/includes/template', $data);		
	}

	public function reporte12()
	{
			$dep = $this->tabulados_model->get_dptos();
			$vr = null;
			$tr = null;
			$total = 0;
			foreach($dep->result() as $d){
				$dd = 0;
				for($i=1; $i<=8; $i++){
					$vr[$d->CCDD][$i] = $this->tabulados_model->get_report12($i,$d->CCDD)->row()->num;
					$dd += $vr[$d->CCDD][$i]; 
				}
				$vt[$d->CCDD] = $dd; 
				$total += $dd;
			}
			for($i=1; $i<=8; $i++){
				$tr[$i] = $this->tabulados_model->get_report12($i)->row()->num; 
			}
			$data['vr'] = $vr;
			$data['vt'] = $vt;
			$data['tr'] = $tr;
			$data['total'] = $total;
			$data['dep'] = $dep;
			$data['nav'] = TRUE;
			$data['title'] = 'Tabulados';			
			$data['opcion'] = 12;
			$data['main_content'] = 'tabulados/pescador/reporte12_view';
			$this->load->view('backend/includes/template', $data);		
	}

	public function reporte13()
	{
			$dep = $this->tabulados_model->get_dptos();
			$vr = null;
			$tr = null;
			$total = 0;
			foreach($dep->result() as $d){
				$dd = 0;
				for($i=1; $i<=8; $i++){
					$vr[$d->CCDD][$i] = $this->tabulados_model->get_report13($i,$d->CCDD)->row()->num;
					$dd += $vr[$d->CCDD][$i]; 
				}
				$vt[$d->CCDD] = $dd; 
				$total += $dd;
			}
			for($i=1; $i<=8; $i++){
				$tr[$i] = $this->tabulados_model->get_report13($i)->row()->num; 
			}
			$data['vr'] = $vr;
			$data['vt'] = $vt;
			$data['tr'] = $tr;
			$data['total'] = $total;
			$data['dep'] = $dep;
			$data['nav'] = TRUE;
			$data['title'] = 'Tabulados';			
			$data['opcion'] = 13;
			$data['main_content'] = 'tabulados/pescador/reporte13_view';
			$this->load->view('backend/includes/template', $data);		
	}

	public function reporte14()
	{
			$dep = $this->tabulados_model->get_dptos();
			$vr = null;
			$tr = null;
			$total = 0;
			foreach($dep->result() as $d){
				$dd = 0;
				for($i=1; $i<=2; $i++){
					$vr[$d->CCDD][$i] = $this->tabulados_model->get_report14($i,$d->CCDD)->row()->num;
					$dd += $vr[$d->CCDD][$i]; 
				}
				$vt[$d->CCDD] = $dd; 
				$total += $dd;
			}
			for($i=1; $i<=2; $i++){
				$tr[$i] = $this->tabulados_model->get_report14($i)->row()->num; 
			}
			$data['vr'] = $vr;
			$data['vt'] = $vt;
			$data['tr'] = $tr;
			$data['total'] = $total;
			$data['dep'] = $dep;
			$data['nav'] = TRUE;
			$data['title'] = 'Tabulados';			
			$data['opcion'] = 14;
			$data['main_content'] = 'tabulados/pescador/reporte14_view';
			$this->load->view('backend/includes/template', $data);		
	}

	public function reporte15()
	{
			$dep = $this->tabulados_model->get_dptos();
			$vr = null;
			$tr = null;
			$total = 0;
			foreach($dep->result() as $d){
				$dd = 0;
				for($i=1; $i<=10; $i++){
					$vr[$d->CCDD][$i] = $this->tabulados_model->get_report15($i,$d->CCDD)->row()->num;
					$dd += $vr[$d->CCDD][$i]; 
				}
				$vt[$d->CCDD] = $dd; 
				$total += $dd;
			}
			for($i=1; $i<=10; $i++){
				$tr[$i] = $this->tabulados_model->get_report15($i)->row()->num; 
			}
			$data['vr'] = $vr;
			$data['vt'] = $vt;
			$data['tr'] = $tr;
			$data['total'] = $total;
			$data['dep'] = $dep;
			$data['nav'] = TRUE;
			$data['title'] = 'Tabulados';			
			$data['opcion'] = 15;
			$data['main_content'] = 'tabulados/pescador/reporte15_view';
			$this->load->view('backend/includes/template', $data);		
	}



	public function reporte16()
	{
			$dep = $this->tabulados_model->get_dptos();
			$vr = null;
			$td = null;
			$ttt = 0;
			$ddm = 0;
			$ddf = 0;
			$total = 0;
			$male = null;
			$female = null;		
			foreach($dep->result() as $d){
				$vr[$d->CCDD] = $this->tabulados_model->get_report16($d->CCDD);	
				$male[$d->CCDD] = 0;				
				$female[$d->CCDD] = 0;				
				foreach($vr[$d->CCDD]->result() as $uv){			
					for($x=1; $x<=10; $x++){
							$a = 'S2_23_3_' . $x;
							if(!is_null($uv->$a) && $uv->$a == 1)
								$male[$d->CCDD]++;
							elseif(!is_null($uv->$a) && $uv->$a == 2)
								$female[$d->CCDD]++; 		
					}
				}
				$ddm += $male[$d->CCDD];
				$ddf += $female[$d->CCDD] ;		
				$td[$d->CCDD] = $male[$d->CCDD] + $female[$d->CCDD];
				$ttt += $td[$d->CCDD];
			}
			$data['male'] = $male;
			$data['female'] = $female;
			$data['tm'] = $ddm;
			$data['tf'] = $ddf;
			$data['td'] = $td;
			$data['ttt'] = $ttt;
			$data['dep'] = $dep;
			$data['nav'] = TRUE;
			$data['title'] = 'Tabulados';			
			$data['opcion'] = 16;
			$data['main_content'] = 'tabulados/pescador/reporte16_view';
			$this->load->view('backend/includes/template', $data);		
	}



	public function reporte25()
	{
			$dep = $this->tabulados_model->get_dptos();
			$vr = null;
			$tr = null;
			$total = 0;
			foreach($dep->result() as $d){
				$dd = 0;
				for($i=1; $i<=6; $i++){
					$vr[$d->CCDD][$i] = $this->tabulados_model->get_report25($i,$d->CCDD)->row()->num;
					$dd += $vr[$d->CCDD][$i]; 
				}
				$vt[$d->CCDD] = $dd; 
				$total += $dd;
			}
			for($i=1; $i<=6; $i++){
				$tr[$i] = $this->tabulados_model->get_report25($i)->row()->num; 
			}
			$data['vr'] = $vr;
			$data['vt'] = $vt;
			$data['tr'] = $tr;
			$data['total'] = $total;
			$data['dep'] = $dep;
			$data['nav'] = TRUE;
			$data['title'] = 'Tabulados';			
			$data['opcion'] = 25;
			$data['main_content'] = 'tabulados/pescador/reporte25_view';
			$this->load->view('backend/includes/template', $data);		
	}

	public function reporte26()
	{
			$dep = $this->tabulados_model->get_dptos();
			$vr = null;
			$tr = null;
			$total = 0;
			foreach($dep->result() as $d){
				$dd = 0;
				for($i=1; $i<=8; $i++){
					$vr[$d->CCDD][$i] = $this->tabulados_model->get_report26($i,$d->CCDD)->row()->num;
					$dd += $vr[$d->CCDD][$i]; 
				}
				$vt[$d->CCDD] = $dd; 
				$total += $dd;
			}
			for($i=1; $i<=8; $i++){
				$tr[$i] = $this->tabulados_model->get_report26($i)->row()->num; 
			}
			$data['vr'] = $vr;
			$data['vt'] = $vt;
			$data['tr'] = $tr;
			$data['total'] = $total;
			$data['dep'] = $dep;
			$data['nav'] = TRUE;
			$data['title'] = 'Tabulados';			
			$data['opcion'] = 26;
			$data['main_content'] = 'tabulados/pescador/reporte26_view';
			$this->load->view('backend/includes/template', $data);		
	}


	public function reporte27()
	{
			$dep = $this->tabulados_model->get_dptos();
			$vr = null;
			$tr = null;
			$total = 0;
			foreach($dep->result() as $d){
				$dd = 0;
				for($i=1; $i<=7; $i++){
					$vr[$d->CCDD][$i] = $this->tabulados_model->get_report27($i,$d->CCDD)->row()->num;
					$dd += $vr[$d->CCDD][$i]; 
				}
				$vt[$d->CCDD] = $dd; 
				$total += $dd;
			}
			for($i=1; $i<=7; $i++){
				$tr[$i] = $this->tabulados_model->get_report27($i)->row()->num; 
			}
			$data['vr'] = $vr;
			$data['vt'] = $vt;
			$data['tr'] = $tr;
			$data['total'] = $total;
			$data['dep'] = $dep;
			$data['nav'] = TRUE;
			$data['title'] = 'Tabulados';			
			$data['opcion'] = 27;
			$data['main_content'] = 'tabulados/pescador/reporte27_view';
			$this->load->view('backend/includes/template', $data);		
	}



	public function reporte28()
	{
			$dep = $this->tabulados_model->get_dptos();
			$vr = null;
			$tr = null;
			$total = 0;
			foreach($dep->result() as $d){
				$dd = 0;
				for($i=1; $i<=7; $i++){
					$vr[$d->CCDD][$i] = $this->tabulados_model->get_report28($i,$d->CCDD)->row()->num;
					$dd += $vr[$d->CCDD][$i]; 
				}
				$vt[$d->CCDD] = $dd; 
				$total += $dd;
			}
			for($i=1; $i<=7; $i++){
				$tr[$i] = $this->tabulados_model->get_report28($i)->row()->num; 
			}
			$data['vr'] = $vr;
			$data['vt'] = $vt;
			$data['tr'] = $tr;
			$data['total'] = $total;
			$data['dep'] = $dep;
			$data['nav'] = TRUE;
			$data['title'] = 'Tabulados';			
			$data['opcion'] = 28;
			$data['main_content'] = 'tabulados/pescador/reporte28_view';
			$this->load->view('backend/includes/template', $data);		
	}


	public function reporte29()
	{
			$dep = $this->tabulados_model->get_dptos();
			$vr = null;
			$tr = null;
			$total = 0;
			foreach($dep->result() as $d){
				$dd = 0;
				for($i=1; $i<=8; $i++){
					$vr[$d->CCDD][$i] = $this->tabulados_model->get_report29($i,$d->CCDD)->row()->num;
					$dd += $vr[$d->CCDD][$i]; 
				}
				$vt[$d->CCDD] = $dd; 
				$total += $dd;
			}
			for($i=1; $i<=8; $i++){
				$tr[$i] = $this->tabulados_model->get_report29($i)->row()->num; 
			}
			$data['vr'] = $vr;
			$data['vt'] = $vt;
			$data['tr'] = $tr;
			$data['total'] = $total;
			$data['dep'] = $dep;
			$data['nav'] = TRUE;
			$data['title'] = 'Tabulados';			
			$data['opcion'] = 29;
			$data['main_content'] = 'tabulados/pescador/reporte29_view';
			$this->load->view('backend/includes/template', $data);		
	}

	public function reporte30()
	{
			$dep = $this->tabulados_model->get_dptos();
			$vr = null;
			$tr = null;
			$total = 0;
			foreach($dep->result() as $d){
				$dd = 0;
				for($i=1; $i<=2; $i++){
					$vr[$d->CCDD][$i] = $this->tabulados_model->get_report30($i,$d->CCDD)->row()->num;
					$dd += $vr[$d->CCDD][$i]; 
				}
				$vt[$d->CCDD] = $dd; 
				$total += $dd;
			}
			for($i=1; $i<=2; $i++){
				$tr[$i] = $this->tabulados_model->get_report30($i)->row()->num; 
			}
			$data['vr'] = $vr;
			$data['vt'] = $vt;
			$data['tr'] = $tr;
			$data['total'] = $total;
			$data['dep'] = $dep;
			$data['nav'] = TRUE;
			$data['title'] = 'Tabulados';			
			$data['opcion'] = 30;
			$data['main_content'] = 'tabulados/pescador/reporte30_view';
			$this->load->view('backend/includes/template', $data);		
	}

	public function reporte31()
	{
			$dep = $this->tabulados_model->get_dptos();
			$vr = null;
			$tr = null;
			$total = 0;
			foreach($dep->result() as $d){
				$dd = 0;
				for($i=1; $i<=7; $i++){
					$vr[$d->CCDD][$i] = $this->tabulados_model->get_report31($i,$d->CCDD)->row()->num;
					$dd += $vr[$d->CCDD][$i]; 
				}
				$vt[$d->CCDD] = $dd; 
				$total += $dd;
			}
			for($i=1; $i<=7; $i++){
				$tr[$i] = $this->tabulados_model->get_report31($i)->row()->num; 
			}
			$data['vr'] = $vr;
			$data['vt'] = $vt;
			$data['tr'] = $tr;
			$data['total'] = $total;
			$data['dep'] = $dep;
			$data['nav'] = TRUE;
			$data['title'] = 'Tabulados';			
			$data['opcion'] = 31;
			$data['main_content'] = 'tabulados/pescador/reporte31_view';
			$this->load->view('backend/includes/template', $data);		
	}

	public function reporte32()
	{
			$dep = $this->tabulados_model->get_dptos();
			$vr = null;
			$tr = null;
			$total = 0;
			foreach($dep->result() as $d){
				$dd = 0;
				for($i=1; $i<=2; $i++){
					$vr[$d->CCDD][$i] = $this->tabulados_model->get_report32($i,$d->CCDD)->row()->num;
					$dd += $vr[$d->CCDD][$i]; 
				}
				$vt[$d->CCDD] = $dd; 
				$total += $dd;
			}
			for($i=1; $i<=2; $i++){
				$tr[$i] = $this->tabulados_model->get_report32($i)->row()->num; 
			}
			$data['vr'] = $vr;
			$data['vt'] = $vt;
			$data['tr'] = $tr;
			$data['total'] = $total;
			$data['dep'] = $dep;
			$data['nav'] = TRUE;
			$data['title'] = 'Tabulados';			
			$data['opcion'] = 32;
			$data['main_content'] = 'tabulados/pescador/reporte32_view';
			$this->load->view('backend/includes/template', $data);		
	}

	public function reporte33()
	{
			$dep = $this->tabulados_model->get_dptos();
			$vr = null;
			$tr = null;
			$total = 0;
			foreach($dep->result() as $d){
				$dd = 0;
				for($i=1; $i<=11; $i++){
					$vr[$d->CCDD][$i] = $this->tabulados_model->get_report33($i,$d->CCDD)->row()->num;
					$dd += $vr[$d->CCDD][$i]; 
				}
				$vt[$d->CCDD] = $dd; 
				$total += $dd;
			}
			for($i=1; $i<=11; $i++){
				$tr[$i] = $this->tabulados_model->get_report33($i)->row()->num; 
			}
			$data['vr'] = $vr;
			$data['vt'] = $vt;
			$data['tr'] = $tr;
			$data['total'] = $total;
			$data['dep'] = $dep;
			$data['nav'] = TRUE;
			$data['title'] = 'Tabulados';			
			$data['opcion'] = 33;
			$data['main_content'] = 'tabulados/pescador/reporte33_view';
			$this->load->view('backend/includes/template', $data);		
	}


	public function reporte34()
	{
			$dep = $this->tabulados_model->get_dptos();
			$vr = null;
			$tr = null;
			$total = 0;
			foreach($dep->result() as $d){
				$dd = 0;
				for($i=1; $i<=5; $i++){
					$vr[$d->CCDD][$i] = $this->tabulados_model->get_report34($i,$d->CCDD)->row()->num;
					$dd += $vr[$d->CCDD][$i]; 
				}
				$vt[$d->CCDD] = $dd; 
				$total += $dd;
			}
			for($i=1; $i<=5; $i++){
				$tr[$i] = $this->tabulados_model->get_report34($i)->row()->num; 
			}
			$data['vr'] = $vr;
			$data['vt'] = $vt;
			$data['tr'] = $tr;
			$data['total'] = $total;
			$data['dep'] = $dep;
			$data['nav'] = TRUE;
			$data['title'] = 'Tabulados';			
			$data['opcion'] = 34;
			$data['main_content'] = 'tabulados/pescador/reporte34_view';
			$this->load->view('backend/includes/template', $data);		
	}


	public function reporte35()
	{
			$dep = $this->tabulados_model->get_dptos();
			$vr = null;
			$tr = null;
			$total = 0;
			foreach($dep->result() as $d){
				$dd = 0;
				for($i=1; $i<=2; $i++){
					$vr[$d->CCDD][$i] = $this->tabulados_model->get_report35($i,$d->CCDD)->row()->num;
					$dd += $vr[$d->CCDD][$i]; 
				}
				$vt[$d->CCDD] = $dd; 
				$total += $dd;
			}
			for($i=1; $i<=2; $i++){
				$tr[$i] = $this->tabulados_model->get_report35($i)->row()->num; 
			}
			$data['vr'] = $vr;
			$data['vt'] = $vt;
			$data['tr'] = $tr;
			$data['total'] = $total;
			$data['dep'] = $dep;
			$data['nav'] = TRUE;
			$data['title'] = 'Tabulados';			
			$data['opcion'] = 35;
			$data['main_content'] = 'tabulados/pescador/reporte35_view';
			$this->load->view('backend/includes/template', $data);		
	}


	public function reporte36()
	{
			$dep = $this->tabulados_model->get_dptos();
			$vr = null;
			$tr = null;
			$total = 0;
			foreach($dep->result() as $d){
				$dd = 0;
				for($i=1; $i<=2; $i++){
					$vr[$d->CCDD][$i] = $this->tabulados_model->get_report36($i,$d->CCDD)->row()->num;
					$dd += $vr[$d->CCDD][$i]; 
				}
				$vt[$d->CCDD] = $dd; 
				$total += $dd;
			}
			for($i=1; $i<=2; $i++){
				$tr[$i] = $this->tabulados_model->get_report36($i)->row()->num; 
			}
			$data['vr'] = $vr;
			$data['vt'] = $vt;
			$data['tr'] = $tr;
			$data['total'] = $total;
			$data['dep'] = $dep;
			$data['nav'] = TRUE;
			$data['title'] = 'Tabulados';			
			$data['opcion'] = 36;
			$data['main_content'] = 'tabulados/pescador/reporte36_view';
			$this->load->view('backend/includes/template', $data);		
	}

	public function reporte37()
	{
			$dep = $this->tabulados_model->get_dptos();
			$vr = null;
			$tr = null;
			$total = 0;
			foreach($dep->result() as $d){
				$dd = 0;
				for($i=1; $i<=4; $i++){
					$vr[$d->CCDD][$i] = $this->tabulados_model->get_report37($i,$d->CCDD)->row()->num;
					$dd += $vr[$d->CCDD][$i]; 
				}
				$vt[$d->CCDD] = $dd; 
				$total += $dd;
			}
			for($i=1; $i<=4; $i++){
				$tr[$i] = $this->tabulados_model->get_report37($i)->row()->num; 
			}
			$data['vr'] = $vr;
			$data['vt'] = $vt;
			$data['tr'] = $tr;
			$data['total'] = $total;
			$data['dep'] = $dep;
			$data['nav'] = TRUE;
			$data['title'] = 'Tabulados';			
			$data['opcion'] = 37;
			$data['main_content'] = 'tabulados/pescador/reporte37_view';
			$this->load->view('backend/includes/template', $data);		
	}

	public function reporte38()
	{
			$dep = $this->tabulados_model->get_dptos();
			$vr = null;
			$tr = null;
			$total = 0;
			foreach($dep->result() as $d){
				$dd = 0;
				for($i=1; $i<=2; $i++){
					$vr[$d->CCDD][$i] = $this->tabulados_model->get_report38($i,$d->CCDD)->row()->num;
					$dd += $vr[$d->CCDD][$i]; 
				}
				$vt[$d->CCDD] = $dd; 
				$total += $dd;
			}
			for($i=1; $i<=2; $i++){
				$tr[$i] = $this->tabulados_model->get_report38($i)->row()->num; 
			}
			$data['vr'] = $vr;
			$data['vt'] = $vt;
			$data['tr'] = $tr;
			$data['total'] = $total;
			$data['dep'] = $dep;
			$data['nav'] = TRUE;
			$data['title'] = 'Tabulados';			
			$data['opcion'] = 38;
			$data['main_content'] = 'tabulados/pescador/reporte38_view';
			$this->load->view('backend/includes/template', $data);		
	}

	public function reporte39()
	{
			$dep = $this->tabulados_model->get_dptos();
			$vr = null;
			$tr = null;
			$total = 0;
			foreach($dep->result() as $d){
				$dd = 0;
				for($i=1; $i<=2; $i++){
					$vr[$d->CCDD][$i] = $this->tabulados_model->get_report39($i,$d->CCDD)->row()->num;
					$dd += $vr[$d->CCDD][$i]; 
				}
				$vt[$d->CCDD] = $dd; 
				$total += $dd;
			}
			for($i=1; $i<=2; $i++){
				$tr[$i] = $this->tabulados_model->get_report39($i)->row()->num; 
			}
			$data['vr'] = $vr;
			$data['vt'] = $vt;
			$data['tr'] = $tr;
			$data['total'] = $total;
			$data['dep'] = $dep;
			$data['nav'] = TRUE;
			$data['title'] = 'Tabulados';			
			$data['opcion'] = 39;
			$data['main_content'] = 'tabulados/pescador/reporte39_view';
			$this->load->view('backend/includes/template', $data);		
	}


	public function reporte40()
	{
			$dep = $this->tabulados_model->get_dptos();
			$vr = null;
			$tr = null;
			$total = 0;
			foreach($dep->result() as $d){
				$dd = 0;
				for($i=1; $i<=2; $i++){
					$vr[$d->CCDD][$i] = $this->tabulados_model->get_report40($i,$d->CCDD)->row()->num;
					$dd += $vr[$d->CCDD][$i]; 
				}
				$vt[$d->CCDD] = $dd; 
				$total += $dd;
			}
			for($i=1; $i<=2; $i++){
				$tr[$i] = $this->tabulados_model->get_report40($i)->row()->num; 
			}
			$data['vr'] = $vr;
			$data['vt'] = $vt;
			$data['tr'] = $tr;
			$data['total'] = $total;
			$data['dep'] = $dep;
			$data['nav'] = TRUE;
			$data['title'] = 'Tabulados';			
			$data['opcion'] = 40;
			$data['main_content'] = 'tabulados/pescador/reporte40_view';
			$this->load->view('backend/includes/template', $data);		
	}


	public function reporte41()
	{
			$dep = $this->tabulados_model->get_dptos();
			$vr = null;
			$tr = null;
			$total = 0;
			foreach($dep->result() as $d){
				$dd = 0;
				for($i=1; $i<=3; $i++){
					$vr[$d->CCDD][$i] = $this->tabulados_model->get_report41($i,$d->CCDD)->row()->num;
					$dd += $vr[$d->CCDD][$i]; 
				}
				$vt[$d->CCDD] = $dd; 
				$total += $dd;
			}
			for($i=1; $i<=3; $i++){
				$tr[$i] = $this->tabulados_model->get_report41($i)->row()->num; 
			}
			$data['vr'] = $vr;
			$data['vt'] = $vt;
			$data['tr'] = $tr;
			$data['total'] = $total;
			$data['dep'] = $dep;
			$data['nav'] = TRUE;
			$data['title'] = 'Tabulados';			
			$data['opcion'] = 41;
			$data['main_content'] = 'tabulados/pescador/reporte41_view';
			$this->load->view('backend/includes/template', $data);		
	}

	public function reporte42()
	{
			$dep = $this->tabulados_model->get_dptos();
			$vr = null;
			$tr = null;
			$total = 0;
			foreach($dep->result() as $d){
				$dd = 0;
				for($i=1; $i<=2; $i++){
					$vr[$d->CCDD][$i] = $this->tabulados_model->get_report42($i,$d->CCDD)->row()->num;
					$dd += $vr[$d->CCDD][$i]; 
				}
				$vt[$d->CCDD] = $dd; 
				$total += $dd;
			}
			for($i=1; $i<=2; $i++){
				$tr[$i] = $this->tabulados_model->get_report42($i)->row()->num; 
			}
			$data['vr'] = $vr;
			$data['vt'] = $vt;
			$data['tr'] = $tr;
			$data['total'] = $total;
			$data['dep'] = $dep;
			$data['nav'] = TRUE;
			$data['title'] = 'Tabulados';			
			$data['opcion'] = 42;
			$data['main_content'] = 'tabulados/pescador/reporte42_view';
			$this->load->view('backend/includes/template', $data);		
	}

	public function reporte43()
	{
			$dep = $this->tabulados_model->get_dptos();
			$vr = null;
			$tr = null;
			$total = 0;
			foreach($dep->result() as $d){
				$dd = 0;
				for($i=1; $i<=2; $i++){
					$vr[$d->CCDD][$i] = $this->tabulados_model->get_report43($i,$d->CCDD)->row()->num;
					$dd += $vr[$d->CCDD][$i]; 
				}
				$vt[$d->CCDD] = $dd; 
				$total += $dd;
			}
			for($i=1; $i<=2; $i++){
				$tr[$i] = $this->tabulados_model->get_report43($i)->row()->num; 
			}
			$data['vr'] = $vr;
			$data['vt'] = $vt;
			$data['tr'] = $tr;
			$data['total'] = $total;
			$data['dep'] = $dep;
			$data['nav'] = TRUE;
			$data['title'] = 'Tabulados';			
			$data['opcion'] = 43;
			$data['main_content'] = 'tabulados/pescador/reporte43_view';
			$this->load->view('backend/includes/template', $data);		
	}

	public function reporte44()
	{
			$dep = $this->tabulados_model->get_dptos();
			$vr = null;
			$tr = null;
			$total = 0;
			foreach($dep->result() as $d){
				$dd = 0;
				for($i=1; $i<=6; $i++){
					$vr[$d->CCDD][$i] = $this->tabulados_model->get_report44($i,$d->CCDD)->row()->num;
					$dd += $vr[$d->CCDD][$i]; 
				}
				$vt[$d->CCDD] = $dd; 
				$total += $dd;
			}
			for($i=1; $i<=6; $i++){
				$tr[$i] = $this->tabulados_model->get_report44($i)->row()->num; 
			}
			$data['vr'] = $vr;
			$data['vt'] = $vt;
			$data['tr'] = $tr;
			$data['total'] = $total;
			$data['dep'] = $dep;
			$data['nav'] = TRUE;
			$data['title'] = 'Tabulados';			
			$data['opcion'] = 44;
			$data['main_content'] = 'tabulados/pescador/reporte44_view';
			$this->load->view('backend/includes/template', $data);		
	}


	public function reporte45()
	{
			$dep = $this->tabulados_model->get_dptos();
			$vr = null;
			$tr = null;
			$total = 0;
			foreach($dep->result() as $d){
				$dd = 0;
				for($i=1; $i<=8; $i++){
					$vr[$d->CCDD][$i] = $this->tabulados_model->get_report45($i,$d->CCDD)->row()->num;
					$dd += $vr[$d->CCDD][$i]; 
				}
				$vt[$d->CCDD] = $dd; 
				$total += $dd;
			}
			for($i=1; $i<=8; $i++){
				$tr[$i] = $this->tabulados_model->get_report45($i)->row()->num; 
			}
			$data['vr'] = $vr;
			$data['vt'] = $vt;
			$data['tr'] = $tr;
			$data['total'] = $total;
			$data['dep'] = $dep;
			$data['nav'] = TRUE;
			$data['title'] = 'Tabulados';			
			$data['opcion'] = 45;
			$data['main_content'] = 'tabulados/pescador/reporte45_view';
			$this->load->view('backend/includes/template', $data);		
	}

	public function reporte46()
	{
			$dep = $this->tabulados_model->get_dptos();
			$vr = null;
			$tr = null;
			$total = 0;
			foreach($dep->result() as $d){
				$dd = 0;
				for($i=1; $i<=2; $i++){
					$vr[$d->CCDD][$i] = $this->tabulados_model->get_report46($i,$d->CCDD)->row()->num;
					$dd += $vr[$d->CCDD][$i]; 
				}
				$vt[$d->CCDD] = $dd; 
				$total += $dd;
			}
			for($i=1; $i<=2; $i++){
				$tr[$i] = $this->tabulados_model->get_report46($i)->row()->num; 
			}
			$data['vr'] = $vr;
			$data['vt'] = $vt;
			$data['tr'] = $tr;
			$data['total'] = $total;
			$data['dep'] = $dep;
			$data['nav'] = TRUE;
			$data['title'] = 'Tabulados';			
			$data['opcion'] = 46;
			$data['main_content'] = 'tabulados/pescador/reporte46_view';
			$this->load->view('backend/includes/template', $data);		
	}


	public function reporte49()
	{
			$dep = $this->tabulados_model->get_dptos();
			$vr = null;
			$tr = null;
			$total = 0;
			foreach($dep->result() as $d){
				$dd = 0;
				for($i=1; $i<=9; $i++){
					$vr[$d->CCDD][$i] = $this->tabulados_model->get_report49($i,$d->CCDD)->row()->num;
					$dd += $vr[$d->CCDD][$i]; 
				}
				$vt[$d->CCDD] = $dd; 
				$total += $dd;
			}
			for($i=1; $i<=9; $i++){
				$tr[$i] = $this->tabulados_model->get_report49($i)->row()->num; 
			}
			$data['vr'] = $vr;
			$data['vt'] = $vt;
			$data['tr'] = $tr;
			$data['total'] = $total;
			$data['dep'] = $dep;
			$data['nav'] = TRUE;
			$data['title'] = 'Tabulados';			
			$data['opcion'] = 49;
			$data['main_content'] = 'tabulados/pescador/reporte49_view';
			$this->load->view('backend/includes/template', $data);		
	}


	public function reporte50()
	{
			$dep = $this->tabulados_model->get_dptos();
			$vr = null;
			$tr = null;
			$total = 0;
			foreach($dep->result() as $d){
				$dd = 0;
				for($i=0; $i<=4; $i++){
					$vr[$d->CCDD][$i] = $this->tabulados_model->get_report50($i,$d->CCDD)->row()->num;
					$dd += $vr[$d->CCDD][$i]; 
				}
				$vt[$d->CCDD] = $dd; 
				$total += $dd;
			}
			for($i=0; $i<=4; $i++){
				$tr[$i] = $this->tabulados_model->get_report50($i)->row()->num; 
			}
			$data['vr'] = $vr;
			$data['vt'] = $vt;
			$data['tr'] = $tr;
			$data['total'] = $total;
			$data['dep'] = $dep;
			$data['nav'] = TRUE;
			$data['title'] = 'Tabulados';			
			$data['opcion'] = 50;
			$data['main_content'] = 'tabulados/pescador/reporte50_view';
			$this->load->view('backend/includes/template', $data);		
	}


	public function reporte51()
	{
			$dep = $this->tabulados_model->get_dptos();
			$vr = null;
			$tr = null;
			$total = 0;
			foreach($dep->result() as $d){
				$dd = 0;
				for($i=5; $i<=7; $i++){
					$vr[$d->CCDD][$i] = $this->tabulados_model->get_report51($i,$d->CCDD)->row()->num;
					$dd += $vr[$d->CCDD][$i]; 
				}
				$vt[$d->CCDD] = $dd; 
				$total += $dd;
			}
			for($i=5; $i<=7; $i++){
				$tr[$i] = $this->tabulados_model->get_report51($i)->row()->num; 
			}
			$data['vr'] = $vr;
			$data['vt'] = $vt;
			$data['tr'] = $tr;
			$data['total'] = $total;
			$data['dep'] = $dep;
			$data['nav'] = TRUE;
			$data['title'] = 'Tabulados';			
			$data['opcion'] = 51;
			$data['main_content'] = 'tabulados/pescador/reporte51_view';
			$this->load->view('backend/includes/template', $data);		
	}


	public function reporte53()
	{
			$dep = $this->tabulados_model->get_dptos();
			$vr = null;
			$tr = null;
			$total = 0;
			foreach($dep->result() as $d){
				$dd = 0;
				for($i=1; $i<=2; $i++){
					$vr[$d->CCDD][$i] = $this->tabulados_model->get_report53($i,$d->CCDD)->row()->num;
					$dd += $vr[$d->CCDD][$i]; 
				}
				$vt[$d->CCDD] = $dd; 
				$total += $dd;
			}
			for($i=1; $i<=2; $i++){
				$tr[$i] = $this->tabulados_model->get_report53($i)->row()->num; 
			}
			$data['vr'] = $vr;
			$data['vt'] = $vt;
			$data['tr'] = $tr;
			$data['total'] = $total;
			$data['dep'] = $dep;
			$data['nav'] = TRUE;
			$data['title'] = 'Tabulados';			
			$data['opcion'] = 53;
			$data['main_content'] = 'tabulados/pescador/reporte53_view';
			$this->load->view('backend/includes/template', $data);		
	}

	public function reporte54()
	{
			$dep = $this->tabulados_model->get_dptos();
			$vr = null;
			$tr = null;
			$total = 0;
			foreach($dep->result() as $d){
				$dd = 0;
				for($i=1; $i<=4; $i++){
					$vr[$d->CCDD][$i] = $this->tabulados_model->get_report54($i,$d->CCDD)->row()->num;
					$dd += $vr[$d->CCDD][$i]; 
				}
				$vt[$d->CCDD] = $dd; 
				$total += $dd;
			}
			for($i=1; $i<=4; $i++){
				$tr[$i] = $this->tabulados_model->get_report54($i)->row()->num; 
			}
			$data['vr'] = $vr;
			$data['vt'] = $vt;
			$data['tr'] = $tr;
			$data['total'] = $total;
			$data['dep'] = $dep;
			$data['nav'] = TRUE;
			$data['title'] = 'Tabulados';			
			$data['opcion'] = 54;
			$data['main_content'] = 'tabulados/pescador/reporte54_view';
			$this->load->view('backend/includes/template', $data);		
	}

	public function reporte55()
	{
			$dep = $this->tabulados_model->get_dptos();
			$vr = null;
			$tr = null;
			$total = 0;
			foreach($dep->result() as $d){
				$dd = 0;
				for($i=1; $i<=15; $i++){
					$vr[$d->CCDD][$i] = $this->tabulados_model->get_report55($i,$d->CCDD)->row()->num;
					$dd += $vr[$d->CCDD][$i]; 
				}
				$vt[$d->CCDD] = $dd; 
				$total += $dd;
			}
			for($i=1; $i<=15; $i++){
				$tr[$i] = $this->tabulados_model->get_report55($i)->row()->num; 
			}
			$data['vr'] = $vr;
			$data['vt'] = $vt;
			$data['tr'] = $tr;
			$data['total'] = $total;
			$data['dep'] = $dep;
			$data['nav'] = TRUE;
			$data['title'] = 'Tabulados';			
			$data['opcion'] = 55;
			$data['main_content'] = 'tabulados/pescador/reporte55_view';
			$this->load->view('backend/includes/template', $data);		
	}

	public function reporte56()
	{
			$dep = $this->tabulados_model->get_dptos();
			$vr = null;
			$tr = null;
			$total = 0;
			foreach($dep->result() as $d){
				$dd = 0;
				for($i=1; $i<=3; $i++){
					$vr[$d->CCDD][$i] = $this->tabulados_model->get_report56($i,$d->CCDD)->row()->num;
					$dd += $vr[$d->CCDD][$i]; 
				}
				$vt[$d->CCDD] = $dd; 
				$total += $dd;
			}
			for($i=1; $i<=3; $i++){
				$tr[$i] = $this->tabulados_model->get_report56($i)->row()->num; 
			}
			$data['vr'] = $vr;
			$data['vt'] = $vt;
			$data['tr'] = $tr;
			$data['total'] = $total;
			$data['dep'] = $dep;
			$data['nav'] = TRUE;
			$data['title'] = 'Tabulados';			
			$data['opcion'] = 56;
			$data['main_content'] = 'tabulados/pescador/reporte56_view';
			$this->load->view('backend/includes/template', $data);		
	}


	public function reporte57()
	{
			$dep = $this->tabulados_model->get_dptos();
			$vr = null;
			$tr = null;
			$total = 0;
			foreach($dep->result() as $d){
				$dd = 0;
				for($i=1; $i<=3; $i++){
					$vr[$d->CCDD][$i] = $this->tabulados_model->get_report57($i,$d->CCDD)->row()->num;
					$dd += $vr[$d->CCDD][$i]; 
				}
				$vt[$d->CCDD] = $dd; 
				$total += $dd;
			}
			for($i=1; $i<=3; $i++){
				$tr[$i] = $this->tabulados_model->get_report57($i)->row()->num; 
			}
			$data['vr'] = $vr;
			$data['vt'] = $vt;
			$data['tr'] = $tr;
			$data['total'] = $total;
			$data['dep'] = $dep;
			$data['nav'] = TRUE;
			$data['title'] = 'Tabulados';			
			$data['opcion'] = 57;
			$data['main_content'] = 'tabulados/pescador/reporte57_view';
			$this->load->view('backend/includes/template', $data);		
	}

	public function reporte58()
	{
			$dep = $this->tabulados_model->get_dptos();
			$vr = null;
			$tr = null;
			$total = 0;
			foreach($dep->result() as $d){
				$dd = 0;
				for($i=1; $i<=3; $i++){
					$vr[$d->CCDD][$i] = $this->tabulados_model->get_report58($i,$d->CCDD)->row()->num;
					$dd += $vr[$d->CCDD][$i]; 
				}
				$vt[$d->CCDD] = $dd; 
				$total += $dd;
			}
			for($i=1; $i<=3; $i++){
				$tr[$i] = $this->tabulados_model->get_report58($i)->row()->num; 
			}
			$data['vr'] = $vr;
			$data['vt'] = $vt;
			$data['tr'] = $tr;
			$data['total'] = $total;
			$data['dep'] = $dep;
			$data['nav'] = TRUE;
			$data['title'] = 'Tabulados';			
			$data['opcion'] = 58;
			$data['main_content'] = 'tabulados/pescador/reporte58_view';
			$this->load->view('backend/includes/template', $data);		
	}

	public function reporte59()
	{
			$dep = $this->tabulados_model->get_dptos();
			$vr = null;
			$tr = null;
			$total = 0;
			foreach($dep->result() as $d){
				$dd = 0;
				for($i=1; $i<=2; $i++){
					$vr[$d->CCDD][$i] = $this->tabulados_model->get_report59($i,$d->CCDD)->row()->num;
					$dd += $vr[$d->CCDD][$i]; 
				}
				$vt[$d->CCDD] = $dd; 
				$total += $dd;
			}
			for($i=1; $i<=2; $i++){
				$tr[$i] = $this->tabulados_model->get_report59($i)->row()->num; 
			}
			$data['vr'] = $vr;
			$data['vt'] = $vt;
			$data['tr'] = $tr;
			$data['total'] = $total;
			$data['dep'] = $dep;
			$data['nav'] = TRUE;
			$data['title'] = 'Tabulados';			
			$data['opcion'] = 59;
			$data['main_content'] = 'tabulados/pescador/reporte59_view';
			$this->load->view('backend/includes/template', $data);		
	}


	public function reporte60()
	{
			$dep = $this->tabulados_model->get_dptos();
			$vr = null;
			$tr = null;
			$total = 0;
			foreach($dep->result() as $d){
				$dd = 0;
				for($i=1; $i<=6; $i++){
					$vr[$d->CCDD][$i] = $this->tabulados_model->get_report60($i,$d->CCDD)->row()->num;
					$dd += $vr[$d->CCDD][$i]; 
				}
				$vt[$d->CCDD] = $dd; 
				$total += $dd;
			}
			for($i=1; $i<=6; $i++){
				$tr[$i] = $this->tabulados_model->get_report60($i)->row()->num; 
			}
			$data['vr'] = $vr;
			$data['vt'] = $vt;
			$data['tr'] = $tr;
			$data['total'] = $total;
			$data['dep'] = $dep;
			$data['nav'] = TRUE;
			$data['title'] = 'Tabulados';			
			$data['opcion'] = 60;
			$data['main_content'] = 'tabulados/pescador/reporte60_view';
			$this->load->view('backend/includes/template', $data);		
	}

	public function reporte61()
	{
			$dep = $this->tabulados_model->get_dptos();
			$vr = null;
			$tr = null;
			$total = 0;
			foreach($dep->result() as $d){
				$dd = 0;
				for($i=1; $i<=2; $i++){
					$vr[$d->CCDD][$i] = $this->tabulados_model->get_report61($i,$d->CCDD)->row()->num;
					$dd += $vr[$d->CCDD][$i]; 
				}
				$vt[$d->CCDD] = $dd; 
				$total += $dd;
			}
			for($i=1; $i<=2; $i++){
				$tr[$i] = $this->tabulados_model->get_report61($i)->row()->num; 
			}
			$data['vr'] = $vr;
			$data['vt'] = $vt;
			$data['tr'] = $tr;
			$data['total'] = $total;
			$data['dep'] = $dep;
			$data['nav'] = TRUE;
			$data['title'] = 'Tabulados';			
			$data['opcion'] = 61;
			$data['main_content'] = 'tabulados/pescador/reporte61_view';
			$this->load->view('backend/includes/template', $data);		
	}

	public function reporte62()
	{
			$dep = $this->tabulados_model->get_dptos();
			$vr = null;
			$tr = null;
			$total = 0;
			foreach($dep->result() as $d){
				$dd = 0;
				for($i=1; $i<=2; $i++){
					$vr[$d->CCDD][$i] = $this->tabulados_model->get_report62($i,$d->CCDD)->row()->num;
					$dd += $vr[$d->CCDD][$i]; 
				}
				$vt[$d->CCDD] = $dd; 
				$total += $dd;
			}
			for($i=1; $i<=2; $i++){
				$tr[$i] = $this->tabulados_model->get_report62($i)->row()->num; 
			}
			$data['vr'] = $vr;
			$data['vt'] = $vt;
			$data['tr'] = $tr;
			$data['total'] = $total;
			$data['dep'] = $dep;
			$data['nav'] = TRUE;
			$data['title'] = 'Tabulados';			
			$data['opcion'] = 62;
			$data['main_content'] = 'tabulados/pescador/reporte62_view';
			$this->load->view('backend/includes/template', $data);		
	}

	public function reporte63()
	{
			$dep = $this->tabulados_model->get_dptos();
			$vr = null;
			$tr = null;
			$total = 0;
			foreach($dep->result() as $d){
				$dd = 0;
				for($i=1; $i<=2; $i++){
					$vr[$d->CCDD][$i] = $this->tabulados_model->get_report63($i,$d->CCDD)->row()->num;
					$dd += $vr[$d->CCDD][$i]; 
				}
				$vt[$d->CCDD] = $dd; 
				$total += $dd;
			}
			for($i=1; $i<=2; $i++){
				$tr[$i] = $this->tabulados_model->get_report63($i)->row()->num; 
			}
			$data['vr'] = $vr;
			$data['vt'] = $vt;
			$data['tr'] = $tr;
			$data['total'] = $total;
			$data['dep'] = $dep;
			$data['nav'] = TRUE;
			$data['title'] = 'Tabulados';			
			$data['opcion'] = 63;
			$data['main_content'] = 'tabulados/pescador/reporte63_view';
			$this->load->view('backend/includes/template', $data);		
	}

	public function reporte64()
	{
			$dep = $this->tabulados_model->get_dptos();
			$vr = null;
			$tr = null;
			$total = 0;
			foreach($dep->result() as $d){
				$dd = 0;
				for($i=1; $i<=4; $i++){
					$vr[$d->CCDD][$i] = $this->tabulados_model->get_report64($i,$d->CCDD)->row()->num;
					$dd += $vr[$d->CCDD][$i]; 
				}
				$vt[$d->CCDD] = $dd; 
				$total += $dd;
			}
			for($i=1; $i<=4; $i++){
				$tr[$i] = $this->tabulados_model->get_report64($i)->row()->num; 
			}
			$data['vr'] = $vr;
			$data['vt'] = $vt;
			$data['tr'] = $tr;
			$data['total'] = $total;
			$data['dep'] = $dep;
			$data['nav'] = TRUE;
			$data['title'] = 'Tabulados';			
			$data['opcion'] = 64;
			$data['main_content'] = 'tabulados/pescador/reporte64_view';
			$this->load->view('backend/includes/template', $data);		
	}

	public function reporte65()
	{
			$dep = $this->tabulados_model->get_dptos();
			$vr = null;
			$tr = null;
			$total = 0;
			foreach($dep->result() as $d){
				$dd = 0;
				for($i=1; $i<=6; $i++){
					$vr[$d->CCDD][$i] = $this->tabulados_model->get_report65($i,$d->CCDD)->row()->num;
					$dd += $vr[$d->CCDD][$i]; 
				}
				$vt[$d->CCDD] = $dd; 
				$total += $dd;
			}
			for($i=1; $i<=6; $i++){
				$tr[$i] = $this->tabulados_model->get_report65($i)->row()->num; 
			}
			$data['vr'] = $vr;
			$data['vt'] = $vt;
			$data['tr'] = $tr;
			$data['total'] = $total;
			$data['dep'] = $dep;
			$data['nav'] = TRUE;
			$data['title'] = 'Tabulados';			
			$data['opcion'] = 65;
			$data['main_content'] = 'tabulados/pescador/reporte65_view';
			$this->load->view('backend/includes/template', $data);		
	}


	public function reporte66()
	{
			$dep = $this->tabulados_model->get_dptos();
			$vr = null;
			$tr = null;
			$total = 0;
			foreach($dep->result() as $d){
				$dd = 0;
				for($i=1; $i<=12; $i++){
					$vr[$d->CCDD][$i] = $this->tabulados_model->get_report66($i,$d->CCDD)->row()->num;
					$dd += $vr[$d->CCDD][$i]; 
				}
				$vt[$d->CCDD] = $dd; 
				$total += $dd;
			}
			for($i=1; $i<=12; $i++){
				$tr[$i] = $this->tabulados_model->get_report66($i)->row()->num; 
			}
			$data['vr'] = $vr;
			$data['vt'] = $vt;
			$data['tr'] = $tr;
			$data['total'] = $total;
			$data['dep'] = $dep;
			$data['nav'] = TRUE;
			$data['title'] = 'Tabulados';			
			$data['opcion'] = 66;
			$data['main_content'] = 'tabulados/pescador/reporte66_view';
			$this->load->view('backend/includes/template', $data);		
	}

	public function reporte67()
	{
			$dep = $this->tabulados_model->get_dptos();
			$vr = null;
			$tr = null;
			$total = 0;
			foreach($dep->result() as $d){
				$dd = 0;
				for($i=1; $i<=4; $i++){
					$vr[$d->CCDD][$i] = $this->tabulados_model->get_report67($i,$d->CCDD)->row()->num;
					$dd += $vr[$d->CCDD][$i]; 
				}
				$vt[$d->CCDD] = $dd; 
				$total += $dd;
			}
			for($i=1; $i<=4; $i++){
				$tr[$i] = $this->tabulados_model->get_report67($i)->row()->num; 
			}
			$data['vr'] = $vr;
			$data['vt'] = $vt;
			$data['tr'] = $tr;
			$data['total'] = $total;
			$data['dep'] = $dep;
			$data['nav'] = TRUE;
			$data['title'] = 'Tabulados';			
			$data['opcion'] = 67;
			$data['main_content'] = 'tabulados/pescador/reporte67_view';
			$this->load->view('backend/includes/template', $data);		
	}

	public function reporte70()
	{
			$dep = $this->tabulados_model->get_dptos();
			$vr = null;
			$tr = null;
			$total = 0;
			foreach($dep->result() as $d){
				$dd = 0;
				for($i=1; $i<=4; $i++){
					$vr[$d->CCDD][$i] = $this->tabulados_model->get_report70($i,$d->CCDD)->row()->num;
					$dd += $vr[$d->CCDD][$i]; 
				}
				$vt[$d->CCDD] = $dd; 
				$total += $dd;
			}
			for($i=1; $i<=4; $i++){
				$tr[$i] = $this->tabulados_model->get_report70($i)->row()->num; 
			}
			$data['vr'] = $vr;
			$data['vt'] = $vt;
			$data['tr'] = $tr;
			$data['total'] = $total;
			$data['dep'] = $dep;
			$data['nav'] = TRUE;
			$data['title'] = 'Tabulados';			
			$data['opcion'] = 70;
			$data['main_content'] = 'tabulados/pescador/reporte70_view';
			$this->load->view('backend/includes/template', $data);		
	}


	public function reporte71()
	{
			$dep = $this->tabulados_model->get_dptos();
			$vr = null;
			$tr = null;
			$total = 0;
			foreach($dep->result() as $d){
				$dd = 0;
				for($i=1; $i<=6; $i++){
					$vr[$d->CCDD][$i] = $this->tabulados_model->get_report71($i,$d->CCDD)->row()->num;
					$dd += $vr[$d->CCDD][$i]; 
				}
				$vt[$d->CCDD] = $dd; 
				$total += $dd;
			}
			for($i=1; $i<=6; $i++){
				$tr[$i] = $this->tabulados_model->get_report71($i)->row()->num; 
			}
			$data['vr'] = $vr;
			$data['vt'] = $vt;
			$data['tr'] = $tr;
			$data['total'] = $total;
			$data['dep'] = $dep;
			$data['nav'] = TRUE;
			$data['title'] = 'Tabulados';			
			$data['opcion'] = 71;
			$data['main_content'] = 'tabulados/pescador/reporte71_view';
			$this->load->view('backend/includes/template', $data);		
	}


	public function reporte72()
	{
			$dep = $this->tabulados_model->get_dptos();
			$vr = null;
			$tr = null;
			$total = 0;
			foreach($dep->result() as $d){
				$dd = 0;
				for($i=1; $i<=4; $i++){
					$vr[$d->CCDD][$i] = $this->tabulados_model->get_report72($i,$d->CCDD)->row()->num;
					$dd += $vr[$d->CCDD][$i]; 
				}
				$vt[$d->CCDD] = $dd; 
				$total += $dd;
			}
			for($i=1; $i<=4; $i++){
				$tr[$i] = $this->tabulados_model->get_report72($i)->row()->num; 
			}
			$data['vr'] = $vr;
			$data['vt'] = $vt;
			$data['tr'] = $tr;
			$data['total'] = $total;
			$data['dep'] = $dep;
			$data['nav'] = TRUE;
			$data['title'] = 'Tabulados';			
			$data['opcion'] = 72;
			$data['main_content'] = 'tabulados/pescador/reporte72_view';
			$this->load->view('backend/includes/template', $data);		
	}

	public function reporte73()
	{
			$dep = $this->tabulados_model->get_dptos();
			$vr = null;
			$tr = null;
			$total = 0;
			foreach($dep->result() as $d){
				$dd = 0;
				for($i=1; $i<=4; $i++){
					$vr[$d->CCDD][$i] = $this->tabulados_model->get_report73($i,$d->CCDD)->row()->num;
					$dd += $vr[$d->CCDD][$i]; 
				}
				$vt[$d->CCDD] = $dd; 
				$total += $dd;
			}
			for($i=1; $i<=4; $i++){
				$tr[$i] = $this->tabulados_model->get_report73($i)->row()->num; 
			}
			$data['vr'] = $vr;
			$data['vt'] = $vt;
			$data['tr'] = $tr;
			$data['total'] = $total;
			$data['dep'] = $dep;
			$data['nav'] = TRUE;
			$data['title'] = 'Tabulados';			
			$data['opcion'] = 73;
			$data['main_content'] = 'tabulados/pescador/reporte73_view';
			$this->load->view('backend/includes/template', $data);		
	}

	public function reporte74()
	{
			$dep = $this->tabulados_model->get_dptos();
			$vr = null;
			$tr = null;
			$total = 0;
			foreach($dep->result() as $d){
				$dd = 0;
				for($i=1; $i<=9; $i++){
					$vr[$d->CCDD][$i] = $this->tabulados_model->get_report74($i,$d->CCDD)->row()->num;
					$dd += $vr[$d->CCDD][$i]; 
				}
				$vt[$d->CCDD] = $dd; 
				$total += $dd;
			}
			for($i=1; $i<=9; $i++){
				$tr[$i] = $this->tabulados_model->get_report74($i)->row()->num; 
			}
			$data['vr'] = $vr;
			$data['vt'] = $vt;
			$data['tr'] = $tr;
			$data['total'] = $total;
			$data['dep'] = $dep;
			$data['nav'] = TRUE;
			$data['title'] = 'Tabulados';			
			$data['opcion'] = 74;
			$data['main_content'] = 'tabulados/pescador/reporte74_view';
			$this->load->view('backend/includes/template', $data);		
	}

	public function reporte75()
	{
			$dep = $this->tabulados_model->get_dptos();
			$vr = null;
			$tr = null;
			$total = 0;
			foreach($dep->result() as $d){
				$dd = 0;
				for($i=1; $i<=2; $i++){
					$vr[$d->CCDD][$i] = $this->tabulados_model->get_report75($i,$d->CCDD)->row()->num;
					$dd += $vr[$d->CCDD][$i]; 
				}
				$vt[$d->CCDD] = $dd; 
				$total += $dd;
			}
			for($i=1; $i<=2; $i++){
				$tr[$i] = $this->tabulados_model->get_report75($i)->row()->num; 
			}
			$data['vr'] = $vr;
			$data['vt'] = $vt;
			$data['tr'] = $tr;
			$data['total'] = $total;
			$data['dep'] = $dep;
			$data['nav'] = TRUE;
			$data['title'] = 'Tabulados';			
			$data['opcion'] = 75;
			$data['main_content'] = 'tabulados/pescador/reporte75_view';
			$this->load->view('backend/includes/template', $data);		
	}

	public function reporte76()
	{
			$dep = $this->tabulados_model->get_dptos();
			$vr = null;
			$tr = null;
			$total = 0;
			foreach($dep->result() as $d){
				$dd = 0;
				for($i=1; $i<=10; $i++){
					$vr[$d->CCDD][$i] = $this->tabulados_model->get_report76($i,$d->CCDD)->row()->num;
					$dd += $vr[$d->CCDD][$i]; 
				}
				$vt[$d->CCDD] = $dd; 
				$total += $dd;
			}
			for($i=1; $i<=10; $i++){
				$tr[$i] = $this->tabulados_model->get_report76($i)->row()->num; 
			}
			$data['vr'] = $vr;
			$data['vt'] = $vt;
			$data['tr'] = $tr;
			$data['total'] = $total;
			$data['dep'] = $dep;
			$data['nav'] = TRUE;
			$data['title'] = 'Tabulados';			
			$data['opcion'] = 76;
			$data['main_content'] = 'tabulados/pescador/reporte76_view';
			$this->load->view('backend/includes/template', $data);		
	}

	public function reporte77()
	{
			$dep = $this->tabulados_model->get_dptos();
			$vr = null;
			$tr = null;
			$total = 0;
			foreach($dep->result() as $d){
				$dd = 0;
				for($i=1; $i<=9; $i++){
					$vr[$d->CCDD][$i] = $this->tabulados_model->get_report77($i,$d->CCDD)->row()->num;
					$dd += $vr[$d->CCDD][$i]; 
				}
				$vt[$d->CCDD] = $dd; 
				$total += $dd;
			}
			for($i=1; $i<=9; $i++){
				$tr[$i] = $this->tabulados_model->get_report77($i)->row()->num; 
			}
			$data['vr'] = $vr;
			$data['vt'] = $vt;
			$data['tr'] = $tr;
			$data['total'] = $total;
			$data['dep'] = $dep;
			$data['nav'] = TRUE;
			$data['title'] = 'Tabulados';			
			$data['opcion'] = 77;
			$data['main_content'] = 'tabulados/pescador/reporte77_view';
			$this->load->view('backend/includes/template', $data);		
	}

	public function reporte78()
	{
			$dep = $this->tabulados_model->get_dptos();
			$vr = null;
			$tr = null;
			$total = 0;
			foreach($dep->result() as $d){
				$dd = 0;
				for($i=1; $i<=5; $i++){
					$vr[$d->CCDD][$i] = $this->tabulados_model->get_report78($i,$d->CCDD)->row()->num;
					$dd += $vr[$d->CCDD][$i]; 
				}
				$vt[$d->CCDD] = $dd; 
				$total += $dd;
			}
			for($i=1; $i<=5; $i++){
				$tr[$i] = $this->tabulados_model->get_report78($i)->row()->num; 
			}
			$data['vr'] = $vr;
			$data['vt'] = $vt;
			$data['tr'] = $tr;
			$data['total'] = $total;
			$data['dep'] = $dep;
			$data['nav'] = TRUE;
			$data['title'] = 'Tabulados';			
			$data['opcion'] = 78;
			$data['main_content'] = 'tabulados/pescador/reporte78_view';
			$this->load->view('backend/includes/template', $data);		
	}


	public function reporte79()
	{
			$dep = $this->tabulados_model->get_dptos();
			$vr = null;
			$tr = null;
			$total = 0;
			foreach($dep->result() as $d){
				$dd = 0;
				for($i=1; $i<=5; $i++){
					$vr[$d->CCDD][$i] = $this->tabulados_model->get_report79($i,$d->CCDD)->row()->num;
					$dd += $vr[$d->CCDD][$i]; 
				}
				$vt[$d->CCDD] = $dd; 
				$total += $dd;
			}
			for($i=1; $i<=5; $i++){
				$tr[$i] = $this->tabulados_model->get_report79($i)->row()->num; 
			}
			$data['vr'] = $vr;
			$data['vt'] = $vt;
			$data['tr'] = $tr;
			$data['total'] = $total;
			$data['dep'] = $dep;
			$data['nav'] = TRUE;
			$data['title'] = 'Tabulados';			
			$data['opcion'] = 79;
			$data['main_content'] = 'tabulados/pescador/reporte79_view';
			$this->load->view('backend/includes/template', $data);		
	}

	public function reporte80()
	{
			$dep = $this->tabulados_model->get_dptos();
			$vr = null;
			$tr = null;
			$total = 0;
			foreach($dep->result() as $d){
				$dd = 0;
				for($i=1; $i<=5; $i++){
					$vr[$d->CCDD][$i] = $this->tabulados_model->get_report80($i,$d->CCDD)->row()->num;
					$dd += $vr[$d->CCDD][$i]; 
				}
				$vt[$d->CCDD] = $dd; 
				$total += $dd;
			}
			for($i=1; $i<=5; $i++){
				$tr[$i] = $this->tabulados_model->get_report80($i)->row()->num; 
			}
			$data['vr'] = $vr;
			$data['vt'] = $vt;
			$data['tr'] = $tr;
			$data['total'] = $total;
			$data['dep'] = $dep;
			$data['nav'] = TRUE;
			$data['title'] = 'Tabulados';			
			$data['opcion'] = 80;
			$data['main_content'] = 'tabulados/pescador/reporte80_view';
			$this->load->view('backend/includes/template', $data);		
	}

	public function reporte81()
	{
			$dep = $this->tabulados_model->get_dptos();
			$vr = null;
			$tr = null;
			$total = 0;
			foreach($dep->result() as $d){
				$dd = 0;
				for($i=1; $i<=5; $i++){
					$vr[$d->CCDD][$i] = $this->tabulados_model->get_report81($i,$d->CCDD)->row()->num;
					$dd += $vr[$d->CCDD][$i]; 
				}
				$vt[$d->CCDD] = $dd; 
				$total += $dd;
			}
			for($i=1; $i<=5; $i++){
				$tr[$i] = $this->tabulados_model->get_report81($i)->row()->num; 
			}
			$data['vr'] = $vr;
			$data['vt'] = $vt;
			$data['tr'] = $tr;
			$data['total'] = $total;
			$data['dep'] = $dep;
			$data['nav'] = TRUE;
			$data['title'] = 'Tabulados';			
			$data['opcion'] = 81;
			$data['main_content'] = 'tabulados/pescador/reporte81_view';
			$this->load->view('backend/includes/template', $data);		
	}

	public function reporte82()
	{
			$dep = $this->tabulados_model->get_dptos();
			$vr = null;
			$tr = null;
			$total = 0;
			foreach($dep->result() as $d){
				$dd = 0;
				for($i=1; $i<=5; $i++){
					$vr[$d->CCDD][$i] = $this->tabulados_model->get_report82($i,$d->CCDD)->row()->num;
					$dd += $vr[$d->CCDD][$i]; 
				}
				$vt[$d->CCDD] = $dd; 
				$total += $dd;
			}
			for($i=1; $i<=5; $i++){
				$tr[$i] = $this->tabulados_model->get_report82($i)->row()->num; 
			}
			$data['vr'] = $vr;
			$data['vt'] = $vt;
			$data['tr'] = $tr;
			$data['total'] = $total;
			$data['dep'] = $dep;
			$data['nav'] = TRUE;
			$data['title'] = 'Tabulados';			
			$data['opcion'] = 82;
			$data['main_content'] = 'tabulados/pescador/reporte82_view';
			$this->load->view('backend/includes/template', $data);		
	}

	public function reporte83()
	{
			$dep = $this->tabulados_model->get_dptos();
			$vr = null;
			$tr = null;
			$total = 0;
			foreach($dep->result() as $d){
				$dd = 0;
				for($i=1; $i<=5; $i++){
					$vr[$d->CCDD][$i] = $this->tabulados_model->get_report83($i,$d->CCDD)->row()->num;
					$dd += $vr[$d->CCDD][$i]; 
				}
				$vt[$d->CCDD] = $dd; 
				$total += $dd;
			}
			for($i=1; $i<=5; $i++){
				$tr[$i] = $this->tabulados_model->get_report83($i)->row()->num; 
			}
			$data['vr'] = $vr;
			$data['vt'] = $vt;
			$data['tr'] = $tr;
			$data['total'] = $total;
			$data['dep'] = $dep;
			$data['nav'] = TRUE;
			$data['title'] = 'Tabulados';			
			$data['opcion'] = 83;
			$data['main_content'] = 'tabulados/pescador/reporte83_view';
			$this->load->view('backend/includes/template', $data);		
	}

	public function reporte84()
	{
			$dep = $this->tabulados_model->get_dptos();
			$vr = null;
			$tr = null;
			$total = 0;
			foreach($dep->result() as $d){
				$dd = 0;
				for($i=1; $i<=2; $i++){
					$vr[$d->CCDD][$i] = $this->tabulados_model->get_report84($i,$d->CCDD)->row()->num;
					$dd += $vr[$d->CCDD][$i]; 
				}
				$vt[$d->CCDD] = $dd; 
				$total += $dd;
			}
			for($i=1; $i<=2; $i++){
				$tr[$i] = $this->tabulados_model->get_report84($i)->row()->num; 
			}
			$data['vr'] = $vr;
			$data['vt'] = $vt;
			$data['tr'] = $tr;
			$data['total'] = $total;
			$data['dep'] = $dep;
			$data['nav'] = TRUE;
			$data['title'] = 'Tabulados';			
			$data['opcion'] = 84;
			$data['main_content'] = 'tabulados/pescador/reporte84_view';
			$this->load->view('backend/includes/template', $data);		
	}


}