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
	public function texto()
	{
		$texto = $this->input->post('texto');
		$preg = $this->input->post('preg');
		$is_ajax = $this->input->post('ajax');
		if ($is_ajax) {
			if( !is_null($this->tabulados_model->get_texto(1,$preg)->row()->texto) ){
					$c_data['user_id'] = $this->tank_auth->get_user_id();
					$c_data['texto'] = $texto;
				$this->tabulados_model->update_texto(1,$preg,$c_data);	
			}else{
					$c_data['user_id'] = $this->tank_auth->get_user_id();
					$c_data['pregunta'] = $preg;
					$c_data['tipo'] = 1;
					$c_data['texto'] = $texto;				
				$this->tabulados_model->insert_texto($c_data);	
			}
		}else{
			show_404();;
		}			
	}


	public function index()
	{
			$u_id = $this->tank_auth->get_user_id();
			$data['restriccion'] = ( ($u_id == 259) || ($u_id == 266) || ($u_id == 269) ) ? FALSE : TRUE ;
			$data['nav'] = TRUE;
			$data['title'] = 'Tabulados';	
			$apesc = null;		
			$pesc = $this->tabulados_model->get_report1(1);
			foreach($pesc->result() as $p){
				$apesc[$p->CCDD] = $p->num; 
			} 
			$aacu =  null;
			$acu = $this->tabulados_model->get_report1(2); 
			foreach($acu->result() as $p){
				$aacu[$p->CCDD] = $p->num; 
			} 	
			$apc = null;		
			$pc = $this->tabulados_model->get_report1(3); 
			foreach($pc->result() as $p){
				$apc[$p->CCDD] = $p->num; 
			} 
			$NEP = null;		
			$pc = $this->tabulados_model->get_report1(9); 
			foreach($pc->result() as $p){
				$NEP[$p->CCDD] = $p->num; 
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
			$data['NEP'] = $NEP;
			$data['main_content'] = 'tabulados/pescador/reporte1_view';
			$prete = $this->tabulados_model->get_texto(1,$data['opcion']);
			$texto = '';
			if($prete->num_rows() > 0){
				$texto = $prete->row()->texto;
			}
			$data['texto'] =  $texto; 
			$this->load->view('backend/includes/template', $data);		
	}

	public function reporte2()
	{
			$u_id = $this->tank_auth->get_user_id();
			$data['restriccion'] = ( ($u_id == 259) || ($u_id == 266) || ($u_id == 269) ) ? FALSE : TRUE ;

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
				$t1[$i] = $this->tabulados_model->get_report2($i,1)->row()->num; 
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
			$prete = $this->tabulados_model->get_texto(1,$data['opcion']);
			$texto = '';
			if($prete->num_rows() > 0){
				$texto = $prete->row()->texto;
			}
			$data['texto'] =  $texto; 			
			$this->load->view('backend/includes/template', $data);		
	}


	public function reporte3()
	{
			$u_id = $this->tank_auth->get_user_id();// restriccion en los comentarios
			$data['restriccion'] = ( ($u_id == 259) || ($u_id == 266) || ($u_id == 269) ) ? FALSE : TRUE ;

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
			$prete = $this->tabulados_model->get_texto(1,$data['opcion']);
			$texto = '';
			if($prete->num_rows() > 0){
				$texto = $prete->row()->texto;
			}
			$data['texto'] =  $texto; 				
			$this->load->view('backend/includes/template', $data);		
	}

	public function reporte4()
	{
			$u_id = $this->tank_auth->get_user_id();
			$data['restriccion'] = ( ($u_id == 259) || ($u_id == 266) || ($u_id == 269) ) ? FALSE : TRUE ;
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
			$prete = $this->tabulados_model->get_texto(1,$data['opcion']);
			$texto = '';
			if($prete->num_rows() > 0){
				$texto = $prete->row()->texto;
			}
			$data['texto'] =  $texto; 				
			$this->load->view('backend/includes/template', $data);		
	}

	public function reporte5()
	{
			$u_id = $this->tank_auth->get_user_id();
			$data['restriccion'] = ( ($u_id == 259) || ($u_id == 266) || ($u_id == 269) ) ? FALSE : TRUE ;
			$dep = $this->tabulados_model->get_dptos();
			$vr = null;
			$tr = null;
			$total = 0;
			foreach($dep->result() as $d){
				$dd = 0;
				for($i=1; $i<=9; $i++){
					$vr[$d->CCDD][$i] = $this->tabulados_model->get_report5($i,$d->CCDD)->row()->num;
					$dd += $vr[$d->CCDD][$i]; 
				}
				$vt[$d->CCDD] = $dd; 
				$total += $dd;
			}
			for($i=1; $i<=9; $i++){
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
			$prete = $this->tabulados_model->get_texto(1,$data['opcion']);
			$texto = '';
			if($prete->num_rows() > 0){
				$texto = $prete->row()->texto;
			}
			$data['texto'] =  $texto; 				
			$this->load->view('backend/includes/template', $data);		
	}


	public function reporte6()
	{
			$u_id = $this->tank_auth->get_user_id();
			$data['restriccion'] = ( ($u_id == 259) || ($u_id == 266) || ($u_id == 269) ) ? FALSE : TRUE ;
			$dep = $this->tabulados_model->get_dptos();
			$vr = null;
			$tr = null;
			$total = 0;
			foreach($dep->result() as $d){
				$dd = 0;
				for($i=1; $i<=3; $i++){
					$k = ($i == 3) ? 9 : $i;
					$vr[$d->CCDD][$k] = $this->tabulados_model->get_report6($k,$d->CCDD)->row()->num;
					$dd += $vr[$d->CCDD][$k]; 
				}
				$vt[$d->CCDD] = $dd; 
				$total += $dd;
			}
			for($i=1; $i<=3; $i++){
				$k = ($i == 3) ? 9 : $i;
				$tr[$k] = $this->tabulados_model->get_report6($k)->row()->num; 
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
			$prete = $this->tabulados_model->get_texto(1,$data['opcion']);
			$texto = '';
			if($prete->num_rows() > 0){
				$texto = $prete->row()->texto;
			}
			$data['texto'] =  $texto; 				
			$this->load->view('backend/includes/template', $data);		
	}

	public function reporte7()
	{
			$u_id = $this->tank_auth->get_user_id();
			$data['restriccion'] = ( ($u_id == 259) || ($u_id == 266) || ($u_id == 269) ) ? FALSE : TRUE ;
			$dep = $this->tabulados_model->get_dptos();
			$vr = null;
			$tr = null;
			$total = 0;
			foreach($dep->result() as $d){
				$dd = 0;
				for($i=1; $i<=9; $i++){
					$vr[$d->CCDD][$i] = $this->tabulados_model->get_report7($i,$d->CCDD)->row()->num;
					//$dd += $vr[$d->CCDD][$i]; 
				}
				$vt[$d->CCDD] = $dd = $this->tabulados_model->get_report7(999,$d->CCDD)->row()->num;
				$total += $dd;
			}
			for($i=1; $i<=9; $i++){
				$tr[$i] = $this->tabulados_model->get_report7($i)->row()->num; 
			}
			$data['vr'] = $vr;//var_dump($vr);
			$data['vt'] = $vt;
			$data['tr'] = $tr;
			$data['total'] = $total;
			$data['dep'] = $dep;
			$data['nav'] = TRUE;
			$data['title'] = 'Tabulados';			
			$data['opcion'] = 7;
			$data['main_content'] = 'tabulados/pescador/reporte7_view';
			$prete = $this->tabulados_model->get_texto(1,$data['opcion']);
			$texto = '';
			if($prete->num_rows() > 0){
				$texto = $prete->row()->texto;
			}
			$data['texto'] =  $texto; 				
			$this->load->view('backend/includes/template', $data);		
	}

	public function reporte8()
	{
			$u_id = $this->tank_auth->get_user_id();
			$data['restriccion'] = ( ($u_id == 259) || ($u_id == 266) || ($u_id == 269) ) ? FALSE : TRUE ;
			$dep = $this->tabulados_model->get_dptos();
			$vr = null;
			$tr = null;
			$total = 0;
			foreach($dep->result() as $d){
				$dd = 0;
				for($i=1; $i<=5; $i++){
					$k = ($i == 5) ? 9 : $i;
					$vr[$d->CCDD][$k] = $this->tabulados_model->get_report8($k,$d->CCDD)->row()->num;
					$dd += $vr[$d->CCDD][$k]; 
				}
				$vt[$d->CCDD] = $dd; 
				$total += $dd;
			}
			for($i=1; $i<=5; $i++){
				$k = ($i == 5) ? 9 : $i;
				$tr[$k] = $this->tabulados_model->get_report8($k)->row()->num; 
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
			$prete = $this->tabulados_model->get_texto(1,$data['opcion']);
			$texto = '';
			if($prete->num_rows() > 0){
				$texto = $prete->row()->texto;
			}
			$data['texto'] =  $texto; 	//var_dump($vr);
			$this->load->view('backend/includes/template', $data);		
	}



	public function reporte9()
	{
			$u_id = $this->tank_auth->get_user_id();
			$data['restriccion'] = ( ($u_id == 259) || ($u_id == 266) || ($u_id == 269) ) ? FALSE : TRUE ;
			$dep = $this->tabulados_model->get_dptos();
			$vr = null;
			$tr = null;
			$total = 0;
			foreach($dep->result() as $d){
				$dd = 0;
				for($i=1; $i<=5; $i++){
					$vr[$d->CCDD][$i] = $this->tabulados_model->get_report9($i,$d->CCDD)->row()->num;
					$dd += $vr[$d->CCDD][$i]; 
				}
				$vt[$d->CCDD] = $dd; 
				$total += $dd;
			}
			for($i=1; $i<=5; $i++){
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
			$prete = $this->tabulados_model->get_texto(1,$data['opcion']);
			$texto = '';
			if($prete->num_rows() > 0){
				$texto = $prete->row()->texto;
			}
			$data['texto'] =  $texto;
			$this->load->view('backend/includes/template', $data);		
	}

	public function reporte10()
	{
			$u_id = $this->tank_auth->get_user_id();
			$data['restriccion'] = ( ($u_id == 259) || ($u_id == 266) || ($u_id == 269) ) ? FALSE : TRUE ;
			$dep = $this->tabulados_model->get_dptos();
			$vr = null;
			$tr = null;
			$total = 0;
			foreach($dep->result() as $d){
				$dd = 0;
				for($i=1; $i<=10; $i++){
					$vr[$d->CCDD][$i] = $this->tabulados_model->get_report10($i,$d->CCDD)->row()->num;
					//$dd += $vr[$d->CCDD][$i]; 
				}
				$vt[$d->CCDD] = $dd = $this->tabulados_model->get_report10(999,$d->CCDD)->row()->num; //total formulario consultados
				$total += $dd;
			}
			for($i=1; $i<=10; $i++){
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
			$prete = $this->tabulados_model->get_texto(1,$data['opcion']);
			$texto = '';
			if($prete->num_rows() > 0){
				$texto = $prete->row()->texto;
			}
			$data['texto'] =  $texto; 				
			$this->load->view('backend/includes/template', $data);		
	}


	public function reporte11()
	{
			$u_id = $this->tank_auth->get_user_id();
			$data['restriccion'] = ( ($u_id == 259) || ($u_id == 266) || ($u_id == 269) ) ? FALSE : TRUE ;
			$dep = $this->tabulados_model->get_dptos();
			$vr = null;
			$tr = null;
			$total = 0;
			foreach($dep->result() as $d){
				$dd = 0;
				for($i=1; $i<=7; $i++){
					$k = ($i == 7) ? 9 : $i;
					$vr[$d->CCDD][$k] = $this->tabulados_model->get_report11($k,$d->CCDD)->row()->num;
					$dd += $vr[$d->CCDD][$k]; 
				}
				$vt[$d->CCDD] = $dd; 
				$total += $dd;
			}
			for($i=1; $i<=7; $i++){
				$k = ($i == 7) ? 9 : $i;
				$tr[$k] = $this->tabulados_model->get_report11($k)->row()->num; 
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
			$prete = $this->tabulados_model->get_texto(1,$data['opcion']);
			$texto = '';
			if($prete->num_rows() > 0){
				$texto = $prete->row()->texto;
			}
			$data['texto'] =  $texto; 				
			$this->load->view('backend/includes/template', $data);		
	}

	public function reporte12()
	{
			$u_id = $this->tank_auth->get_user_id();
			$data['restriccion'] = ( ($u_id == 259) || ($u_id == 266) || ($u_id == 269) ) ? FALSE : TRUE ;
			$dep = $this->tabulados_model->get_dptos();
			$vr = null;
			$tr = null;
			$total = 0;
			foreach($dep->result() as $d){
				$dd = 0;
				for($i=1; $i<=9; $i++){
					$vr[$d->CCDD][$i] = $this->tabulados_model->get_report12($i,$d->CCDD)->row()->num;
					$dd += $vr[$d->CCDD][$i]; 
				}
				$vt[$d->CCDD] = $dd; 
				$total += $dd;
			}
			for($i=1; $i<=9; $i++){
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
			$prete = $this->tabulados_model->get_texto(1,$data['opcion']);
			$texto = '';
			if($prete->num_rows() > 0){
				$texto = $prete->row()->texto;
			}
			$data['texto'] =  $texto; 				
			$this->load->view('backend/includes/template', $data);		
	}

	public function reporte13()
	{
			$u_id = $this->tank_auth->get_user_id();
			$data['restriccion'] = ( ($u_id == 259) || ($u_id == 266) || ($u_id == 269) ) ? FALSE : TRUE ;
			$dep = $this->tabulados_model->get_dptos();
			$vr = null;
			$tr = null;
			$total = 0;
			foreach($dep->result() as $d){
				$dd = 0;
				for($i=1; $i<=10; $i++){
					$vr[$d->CCDD][$i] = $this->tabulados_model->get_report13($i,$d->CCDD)->row()->num;
					//$dd += $vr[$d->CCDD][$i]; 
				}
				$vt[$d->CCDD] = $dd = $vr[$d->CCDD][$i] = $this->tabulados_model->get_report13(999,$d->CCDD)->row()->num; 
				$total += $dd;
			}
			for($i=1; $i<=10; $i++){
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
			$prete = $this->tabulados_model->get_texto(1,$data['opcion']);
			$texto = '';
			if($prete->num_rows() > 0){
				$texto = $prete->row()->texto;
			}
			$data['texto'] =  $texto; 
			$this->load->view('backend/includes/template', $data);		
	}

	public function reporte14()
	{
			$u_id = $this->tank_auth->get_user_id();
			$data['restriccion'] = ( ($u_id == 259) || ($u_id == 266) || ($u_id == 269) ) ? FALSE : TRUE ;
			$dep = $this->tabulados_model->get_dptos();
			$vr = null;
			$tr = null;
			$total = 0;
			foreach($dep->result() as $d){
				$dd = 0;
				for($i=1; $i<=3; $i++){
					$k = ($i == 3) ? 9 : $i;
					$vr[$d->CCDD][$k] = $this->tabulados_model->get_report14($k,$d->CCDD)->row()->num;
					$dd += $vr[$d->CCDD][$k]; 
				}
				$vt[$d->CCDD] = $dd; 
				$total += $dd;
			}
			for($i=1; $i<=3; $i++){
				$k = ($i == 3) ? 9 : $i;
				$tr[$k] = $this->tabulados_model->get_report14($k)->row()->num; 
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
			$prete = $this->tabulados_model->get_texto(1,$data['opcion']);
			$texto = '';
			if($prete->num_rows() > 0){
				$texto = $prete->row()->texto;
			}
			$data['texto'] =  $texto; 				
			$this->load->view('backend/includes/template', $data);		
	}

	public function reporte15()
	{
			$u_id = $this->tank_auth->get_user_id();
			$data['restriccion'] = ( ($u_id == 259) || ($u_id == 266) || ($u_id == 269) ) ? FALSE : TRUE ;
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
			$prete = $this->tabulados_model->get_texto(1,$data['opcion']);
			$texto = '';
			if($prete->num_rows() > 0){
				$texto = $prete->row()->texto;
			}
			$data['texto'] =  $texto; 				
			$this->load->view('backend/includes/template', $data);		
	}



	public function reporte16()
	{
			$u_id = $this->tank_auth->get_user_id();
			$data['restriccion'] = ( ($u_id == 259) || ($u_id == 266) || ($u_id == 269) ) ? FALSE : TRUE ;
			$dep = $this->tabulados_model->get_dptos();
			$vr = null;
			$td = null;
			$ttt = 0;
			$ddm = 0;
			$ddf = 0;
			$ddNEP = 0;
			$total = 0;
			$male = null;
			$female = null;		
			$NEP = null;		
			foreach($dep->result() as $d){
				$vr[$d->CCDD] = $this->tabulados_model->get_report16($d->CCDD);	
				$male[$d->CCDD] = 0;				
				$female[$d->CCDD] = 0;				
				$NEP[$d->CCDD] = 0;				
				foreach($vr[$d->CCDD]->result() as $uv){			
					for($x=1; $x<=10; $x++){
							$a = 'S2_23_3_' . $x;
							if(!is_null($uv->$a)){
								if($uv->$a == 1){
									$male[$d->CCDD] += 1;
								}
								elseif($uv->$a == 2){
									$female[$d->CCDD] += 1; 		
								}	
								elseif($uv->$a == 9){
									$NEP[$d->CCDD] += 1; 		
								}									
							}
					}
				}
				$ddm += $male[$d->CCDD];
				$ddf += $female[$d->CCDD] ;		
				$ddNEP += $NEP[$d->CCDD] ;		
				$td[$d->CCDD] = $male[$d->CCDD] + $female[$d->CCDD] + $NEP[$d->CCDD];
				$ttt += $td[$d->CCDD];
			}
			$data['male'] = $male;
			$data['female'] = $female;
			$data['NEP'] = $NEP;
			$data['tm'] = $ddm;
			$data['tf'] = $ddf;
			$data['tNEP'] = $ddNEP;
			$data['td'] = $td;
			$data['ttt'] = $ttt;
			$data['dep'] = $dep;
			$data['nav'] = TRUE;
			$data['title'] = 'Tabulados';			
			$data['opcion'] = 16;
			$data['main_content'] = 'tabulados/pescador/reporte16_view';
			$prete = $this->tabulados_model->get_texto(1,$data['opcion']);
			$texto = '';
			if($prete->num_rows() > 0){
				$texto = $prete->row()->texto;
			}
			$data['texto'] =  $texto; 				
			$this->load->view('backend/includes/template', $data);		
	}

	public function reporte17()
	{
			$u_id = $this->tank_auth->get_user_id();
			$data['restriccion'] = ( ($u_id == 259) || ($u_id == 266) || ($u_id == 269) ) ? FALSE : TRUE ;
			$dep = $this->tabulados_model->get_dptos();
			$vr = null;
			$td = null;
			$ttt = 0;
			$dde1 = 0;
			$dde2 = 0;
			$dde3 = 0;
			$dde4 = 0;
			$dde5 = 0;
			$dde6 = 0;
			$e1 = null;
			$e2 = null;		
			$e3 = null;		
			$e4 = null;		
			$e5 = null;		
			$e6 = null;		
			foreach($dep->result() as $d){
				$vr[$d->CCDD] = $this->tabulados_model->get_report17($d->CCDD);	
				$e1[$d->CCDD] = 0;				
				$e2[$d->CCDD] = 0;				
				$e3[$d->CCDD] = 0;				
				$e4[$d->CCDD] = 0;				
				$e5[$d->CCDD] = 0;				
				$e6[$d->CCDD] = 0;				
				foreach($vr[$d->CCDD]->result() as $uv){			
					for($x=1; $x<=10; $x++){
							$a = 'S2_23_4_' . $x . 'A';
							if(!is_null($uv->$a) && $uv->$a < 1)
								$e1[$d->CCDD]++;
							elseif(!is_null($uv->$a) && $uv->$a >= 1 && $uv->$a <= 5)
								$e2[$d->CCDD]++; 	
							elseif(!is_null($uv->$a) && $uv->$a >= 6 && $uv->$a <= 10)
								$e3[$d->CCDD]++; 
							elseif(!is_null($uv->$a) && $uv->$a >= 11 && $uv->$a <= 15)
								$e4[$d->CCDD]++; 																	
							elseif(!is_null($uv->$a) && $uv->$a >= 16 && $uv->$a <= 20)
								$e5[$d->CCDD]++; 
							elseif(!is_null($uv->$a) && $uv->$a > 20)
								$e6[$d->CCDD]++; 															
					}
				}
				$dde1 += $e1[$d->CCDD];
				$dde2 += $e2[$d->CCDD] ;		
				$dde3 += $e3[$d->CCDD] ;		
				$dde4 += $e4[$d->CCDD] ;		
				$dde5 += $e5[$d->CCDD] ;		
				$dde6 += $e6[$d->CCDD] ;		
				$td[$d->CCDD] = $e1[$d->CCDD] + $e2[$d->CCDD] + $e3[$d->CCDD] + $e4[$d->CCDD] + $e5[$d->CCDD] + $e6[$d->CCDD];
				$ttt += $td[$d->CCDD];
			}
			$data['e1'] = $e1;
			$data['e2'] = $e2;
			$data['e3'] = $e3;
			$data['e4'] = $e4;
			$data['e5'] = $e5;
			$data['e6'] = $e6;

			$data['te1'] = $dde1;
			$data['te2'] = $dde2;
			$data['te3'] = $dde3;
			$data['te4'] = $dde4;
			$data['te5'] = $dde5;
			$data['te6'] = $dde6;

			$data['td'] = $td;
			$data['ttt'] = $ttt;
			$data['dep'] = $dep;
			$data['nav'] = TRUE;
			$data['title'] = 'Tabulados';			
			$data['opcion'] = 17;
			$data['main_content'] = 'tabulados/pescador/reporte17_view';
			$prete = $this->tabulados_model->get_texto(1,$data['opcion']);
			$texto = '';
			if($prete->num_rows() > 0){
				$texto = $prete->row()->texto;
			}
			$data['texto'] =  $texto; 				
			$this->load->view('backend/includes/template', $data);		
	}



	public function reporte18()
	{
			$u_id = $this->tank_auth->get_user_id();
			$data['restriccion'] = ( ($u_id == 259) || ($u_id == 266) || ($u_id == 269) ) ? FALSE : TRUE ;
			$dep = $this->tabulados_model->get_dptos();
			$vr = null;
			$td = null;
			$ttt = 0;
			$dde1 = 0;
			$dde2 = 0;
			$ddeNEP = 0;
			$total = 0;
			$e1 = null;
			$e2 = null;		
			$eNEP = null;		
			foreach($dep->result() as $d){
				$vr[$d->CCDD] = $this->tabulados_model->get_report18($d->CCDD);	
				$e1[$d->CCDD] = 0;				
				$e2[$d->CCDD] = 0;				
				$eNEP[$d->CCDD] = 0;				
				foreach($vr[$d->CCDD]->result() as $uv){			
					for($x=1; $x<=10; $x++){
							$a = 'S2_23_5_' . $x;
							if(!is_null($uv->$a) && $uv->$a == 1)
								$e1[$d->CCDD]++;
							elseif(!is_null($uv->$a) && $uv->$a == 2)
								$e2[$d->CCDD]++; 	
							elseif(!is_null($uv->$a) && $uv->$a == 9)
								$eNEP[$d->CCDD]++; 									
					}
				}
				$dde1 += $e1[$d->CCDD];
				$dde2 += $e2[$d->CCDD] ;		
				$ddeNEP += $eNEP[$d->CCDD] ;		
				$td[$d->CCDD] = $e1[$d->CCDD] + $e2[$d->CCDD] +  $eNEP[$d->CCDD];
				$ttt += $td[$d->CCDD];
			}
			$data['e1'] = $e1;
			$data['e2'] = $e2;
			$data['eNEP'] = $eNEP;
			$data['te1'] = $dde1;
			$data['te2'] = $dde2;
			$data['teNEP'] = $ddeNEP;
			$data['td'] = $td;
			$data['ttt'] = $ttt;
			$data['dep'] = $dep;
			$data['nav'] = TRUE;
			$data['title'] = 'Tabulados';			
			$data['opcion'] = 18;
			$data['main_content'] = 'tabulados/pescador/reporte18_view';
			$prete = $this->tabulados_model->get_texto(1,$data['opcion']);
			$texto = '';
			if($prete->num_rows() > 0){
				$texto = $prete->row()->texto;
			}
			$data['texto'] =  $texto; 				
			$this->load->view('backend/includes/template', $data);		
	}

	public function reporte19()
	{
			$u_id = $this->tank_auth->get_user_id();
			$data['restriccion'] = ( ($u_id == 259) || ($u_id == 266) || ($u_id == 269) ) ? FALSE : TRUE ;
			$dep = $this->tabulados_model->get_dptos();
			$vr = null;
			$td = null;
			$ttt = 0;
			$dde1 = 0;
			$dde2 = 0;
			$ddeNEP = 0;
			$total = 0;
			$e1 = null;
			$e2 = null;		
			$eNEP = null;		
			foreach($dep->result() as $d){
				$vr[$d->CCDD] = $this->tabulados_model->get_report19($d->CCDD);	
				$e1[$d->CCDD] = 0;				
				$e2[$d->CCDD] = 0;				
				$eNEP[$d->CCDD] = 0;				
				foreach($vr[$d->CCDD]->result() as $uv){			
					for($x=1; $x<=10; $x++){
							$a = 'S2_23_6_' . $x;
							if(!is_null($uv->$a) && $uv->$a == 1)
								$e1[$d->CCDD]++;
							elseif(!is_null($uv->$a) && $uv->$a == 2)
								$e2[$d->CCDD]++; 
							elseif(!is_null($uv->$a) && $uv->$a == 9)
								$eNEP[$d->CCDD]++; 		
					}
				}
				$dde1 += $e1[$d->CCDD];
				$dde2 += $e2[$d->CCDD] ;		
				$ddeNEP += $eNEP[$d->CCDD] ;		
				$td[$d->CCDD] = $e1[$d->CCDD] + $e2[$d->CCDD] + $eNEP[$d->CCDD];
				$ttt += $td[$d->CCDD];
			}
			$data['e1'] = $e1;
			$data['e2'] = $e2;
			$data['eNEP'] = $eNEP;
			$data['te1'] = $dde1;
			$data['te2'] = $dde2;
			$data['teNEP'] = $ddeNEP;
			$data['td'] = $td;
			$data['ttt'] = $ttt;
			$data['dep'] = $dep;
			$data['nav'] = TRUE;
			$data['title'] = 'Tabulados';			
			$data['opcion'] = 19;
			$data['main_content'] = 'tabulados/pescador/reporte19_view';
			$prete = $this->tabulados_model->get_texto(1,$data['opcion']);
			$texto = '';
			if($prete->num_rows() > 0){
				$texto = $prete->row()->texto;
			}
			$data['texto'] =  $texto; 				
			$this->load->view('backend/includes/template', $data);		
	}

	public function reporte20()
	{
			$u_id = $this->tank_auth->get_user_id();
			$data['restriccion'] = ( ($u_id == 259) || ($u_id == 266) || ($u_id == 269) ) ? FALSE : TRUE ;
			$dep = $this->tabulados_model->get_dptos();
			$vr = null;
			$td = null;
			$ttt = 0;
			$dde1 = 0;
			$dde2 = 0;
			$ddeNEP = 0;
			$total = 0;
			$e1 = null;
			$e2 = null;		
			$eNEP = null;		
			foreach($dep->result() as $d){
				$vr[$d->CCDD] = $this->tabulados_model->get_report20($d->CCDD);	
				$e1[$d->CCDD] = 0;				
				$e2[$d->CCDD] = 0;				
				$eNEP[$d->CCDD] = 0;				
				foreach($vr[$d->CCDD]->result() as $uv){			
					for($x=1; $x<=10; $x++){
							$a = 'S2_23_7_' . $x;
							if(!is_null($uv->$a) && $uv->$a == 1)
								$e1[$d->CCDD]++;
							elseif(!is_null($uv->$a) && $uv->$a == 2)
								$e2[$d->CCDD]++; 
							elseif(!is_null($uv->$a) && $uv->$a == 9)
								$eNEP[$d->CCDD]++; 	
					}
				}
				$dde1 += $e1[$d->CCDD];
				$dde2 += $e2[$d->CCDD] ;		
				$ddeNEP += $eNEP[$d->CCDD] ;		
				$td[$d->CCDD] = $e1[$d->CCDD] + $e2[$d->CCDD] + $eNEP[$d->CCDD];
				$ttt += $td[$d->CCDD];
			}
			$data['e1'] = $e1;
			$data['e2'] = $e2;
			$data['eNEP'] = $eNEP;
			$data['te1'] = $dde1;
			$data['te2'] = $dde2;
			$data['teNEP'] = $ddeNEP;
			$data['td'] = $td;
			$data['ttt'] = $ttt;
			$data['dep'] = $dep;
			$data['nav'] = TRUE;
			$data['title'] = 'Tabulados';			
			$data['opcion'] = 20;
			$data['main_content'] = 'tabulados/pescador/reporte20_view';
			$prete = $this->tabulados_model->get_texto(1,$data['opcion']);
			$texto = '';
			if($prete->num_rows() > 0){
				$texto = $prete->row()->texto;
			}
			$data['texto'] =  $texto; 				
			$this->load->view('backend/includes/template', $data);		
	}

	public function reporte21()
	{
			$u_id = $this->tank_auth->get_user_id();
			$data['restriccion'] = ( ($u_id == 259) || ($u_id == 266) || ($u_id == 269) ) ? FALSE : TRUE ;
			$dep = $this->tabulados_model->get_dptos();
			$vr = null;
			$td = null;
			$ttt = 0;
			$dde1 = 0;
			$dde2 = 0;
			$dde3 = 0;
			$dde4 = 0;
			$dde5 = 0;
			$dde6 = 0;
			$dde7 = 0;
			$dde8 = 0;
			$dde9 = 0;
			$dde10 = 0;
			$ddeNEP = 0;
			$e1 = null;
			$e2 = null;		
			$e3 = null;		
			$e4 = null;		
			$e5 = null;		
			$e6 = null;		
			$e7 = null;		
			$e8 = null;		
			$e9 = null;		
			$e10 = null;		
			$eNEP = null;		
			foreach($dep->result() as $d){
				$vr[$d->CCDD] = $this->tabulados_model->get_report21($d->CCDD);	
				$e1[$d->CCDD] = 0;				
				$e2[$d->CCDD] = 0;				
				$e3[$d->CCDD] = 0;				
				$e4[$d->CCDD] = 0;				
				$e5[$d->CCDD] = 0;				
				$e6[$d->CCDD] = 0;				
				$e7[$d->CCDD] = 0;				
				$e8[$d->CCDD] = 0;				
				$e9[$d->CCDD] = 0;				
				$e10[$d->CCDD] = 0;				
				$eNEP[$d->CCDD] = 0;				
				foreach($vr[$d->CCDD]->result() as $uv){			
					for($x=1; $x<=10; $x++){
							$a = 'S2_23_8_' . $x;
							if(!is_null($uv->$a) && $uv->$a == 1)
								$e1[$d->CCDD]++;
							elseif(!is_null($uv->$a) && $uv->$a == 2)
								$e2[$d->CCDD]++; 	
							elseif(!is_null($uv->$a) && $uv->$a == 3)
								$e3[$d->CCDD]++; 
							elseif(!is_null($uv->$a) && $uv->$a == 4)
								$e4[$d->CCDD]++; 																	
							elseif(!is_null($uv->$a) && $uv->$a == 5)
								$e5[$d->CCDD]++; 
							elseif(!is_null($uv->$a) && $uv->$a == 6)
								$e6[$d->CCDD]++; 	
							elseif(!is_null($uv->$a) && $uv->$a == 7)
								$e7[$d->CCDD]++; 	
							elseif(!is_null($uv->$a) && $uv->$a == 8)
								$e8[$d->CCDD]++; 	
							elseif(!is_null($uv->$a) && $uv->$a == 9)
								$e9[$d->CCDD]++; 	
							elseif(!is_null($uv->$a) && $uv->$a == 10)
								$e10[$d->CCDD]++; 
							elseif(!is_null($uv->$a) && $uv->$a == 99)
								$eNEP[$d->CCDD]++; 																																																								
					}
				}
				$dde1 += $e1[$d->CCDD];
				$dde2 += $e2[$d->CCDD] ;		
				$dde3 += $e3[$d->CCDD] ;		
				$dde4 += $e4[$d->CCDD] ;		
				$dde5 += $e5[$d->CCDD] ;		
				$dde6 += $e6[$d->CCDD] ;		
				$dde7 += $e7[$d->CCDD] ;		
				$dde8 += $e8[$d->CCDD] ;		
				$dde9 += $e9[$d->CCDD] ;		
				$dde10 += $e10[$d->CCDD] ;		
				$ddeNEP += $eNEP[$d->CCDD] ;		
				$td[$d->CCDD] = $e1[$d->CCDD] + $e2[$d->CCDD] + $e3[$d->CCDD] + $e4[$d->CCDD] + $e5[$d->CCDD] + $e6[$d->CCDD] + $e7[$d->CCDD] + $e8[$d->CCDD] + $e9[$d->CCDD] + $e10[$d->CCDD] + $eNEP[$d->CCDD];
				$ttt += $td[$d->CCDD];
			}
			$data['e1'] = $e1;
			$data['e2'] = $e2;
			$data['e3'] = $e3;
			$data['e4'] = $e4;
			$data['e5'] = $e5;
			$data['e6'] = $e6;
			$data['e7'] = $e7;
			$data['e8'] = $e8;
			$data['e9'] = $e9;
			$data['e10'] = $e10;
			$data['eNEP'] = $eNEP;

			$data['te1'] = $dde1;
			$data['te2'] = $dde2;
			$data['te3'] = $dde3;
			$data['te4'] = $dde4;
			$data['te5'] = $dde5;
			$data['te6'] = $dde6;
			$data['te7'] = $dde7;
			$data['te8'] = $dde8;
			$data['te9'] = $dde9;
			$data['te10'] = $dde10;
			$data['teNEP'] = $ddeNEP;

			$data['td'] = $td;
			$data['ttt'] = $ttt;
			$data['dep'] = $dep;
			$data['nav'] = TRUE;
			$data['title'] = 'Tabulados';			
			$data['opcion'] = 21;
			$data['main_content'] = 'tabulados/pescador/reporte21_view';
			$prete = $this->tabulados_model->get_texto(1,$data['opcion']);
			$texto = '';
			if($prete->num_rows() > 0){
				$texto = $prete->row()->texto;
			}
			$data['texto'] =  $texto; 				
			$this->load->view('backend/includes/template', $data);		
	}

	public function reporte22()
	{
			$u_id = $this->tank_auth->get_user_id();
			$data['restriccion'] = ( ($u_id == 259) || ($u_id == 266) || ($u_id == 269) ) ? FALSE : TRUE ;
			$dep = $this->tabulados_model->get_dptos();
			$vr = null;
			$td = null;
			$ttt = 0;
			$dde1 = 0;
			$dde2 = 0;
			$ddeNEP = 0;
			$total = 0;
			$e1 = null;
			$e2 = null;		
			$eNEP = null;		
			foreach($dep->result() as $d){
				$vr[$d->CCDD] = $this->tabulados_model->get_report22($d->CCDD);	
				$e1[$d->CCDD] = 0;				
				$e2[$d->CCDD] = 0;				
				$eNEP[$d->CCDD] = 0;				
				foreach($vr[$d->CCDD]->result() as $uv){			
					for($x=1; $x<=10; $x++){
							$a = 'S2_23_9_' . $x;
							if(!is_null($uv->$a) && $uv->$a == 1)
								$e1[$d->CCDD]++;
							elseif(!is_null($uv->$a) && $uv->$a == 2)
								$e2[$d->CCDD]++; 
							elseif(!is_null($uv->$a) && $uv->$a == 9)
								$eNEP[$d->CCDD]++; 									
					}
				}
				$dde1 += $e1[$d->CCDD];
				$dde2 += $e2[$d->CCDD];		
				$ddeNEP += $eNEP[$d->CCDD];		
				$td[$d->CCDD] = $e1[$d->CCDD] + $e2[$d->CCDD] +$eNEP[$d->CCDD];
				$ttt += $td[$d->CCDD];
			}
			$data['e1'] = $e1;
			$data['e2'] = $e2;
			$data['eNEP'] = $eNEP;
			$data['te1'] = $dde1;
			$data['te2'] = $dde2;
			$data['teNEP'] = $ddeNEP;
			$data['td'] = $td;
			$data['ttt'] = $ttt;
			$data['dep'] = $dep;
			$data['nav'] = TRUE;
			$data['title'] = 'Tabulados';			
			$data['opcion'] = 22;
			$data['main_content'] = 'tabulados/pescador/reporte22_view';
			$prete = $this->tabulados_model->get_texto(1,$data['opcion']);
			$texto = '';
			if($prete->num_rows() > 0){
				$texto = $prete->row()->texto;
			}
			$data['texto'] =  $texto; 				
			$this->load->view('backend/includes/template', $data);		
	}

	public function reporte23()
	{
			$u_id = $this->tank_auth->get_user_id();
			$data['restriccion'] = ( ($u_id == 259) || ($u_id == 266) || ($u_id == 269) ) ? FALSE : TRUE ;
			$dep = $this->tabulados_model->get_dptos();
			$vr = null;
			$td = null;
			$ttt = 0;
			$dde1 = 0;
			$dde2 = 0;
			$ddeNEP = 0;
			$total = 0;
			$e1 = null;
			$e2 = null;		
			$eNEP = null;		
			foreach($dep->result() as $d){
				$vr[$d->CCDD] = $this->tabulados_model->get_report23($d->CCDD);	
				$e1[$d->CCDD] = 0;				
				$e2[$d->CCDD] = 0;				
				$eNEP[$d->CCDD] = 0;				
				foreach($vr[$d->CCDD]->result() as $uv){			
					for($x=1; $x<=10; $x++){
							$a = 'S2_23_10_' . $x;
							if(!is_null($uv->$a) && $uv->$a == 1)
								$e1[$d->CCDD]++;
							elseif(!is_null($uv->$a) && $uv->$a == 2)
								$e2[$d->CCDD]++; 
							elseif(!is_null($uv->$a) && $uv->$a == 9)
								$eNEP[$d->CCDD]++; 		
					}
				}
				$dde1 += $e1[$d->CCDD];
				$dde2 += $e2[$d->CCDD] ;		
				$ddeNEP += $eNEP[$d->CCDD] ;		
				$td[$d->CCDD] = $e1[$d->CCDD] + $e2[$d->CCDD] + $eNEP[$d->CCDD];
				$ttt += $td[$d->CCDD];
			}
			$data['e1'] = $e1;
			$data['e2'] = $e2;
			$data['eNEP'] = $eNEP;
			$data['te1'] = $dde1;
			$data['te2'] = $dde2;
			$data['teNEP'] = $ddeNEP;
			$data['td'] = $td;
			$data['ttt'] = $ttt;
			$data['dep'] = $dep;
			$data['nav'] = TRUE;
			$data['title'] = 'Tabulados';			
			$data['opcion'] = 23;
			$data['main_content'] = 'tabulados/pescador/reporte23_view';
			$prete = $this->tabulados_model->get_texto(1,$data['opcion']);
			$texto = '';
			if($prete->num_rows() > 0){
				$texto = $prete->row()->texto;
			}
			$data['texto'] =  $texto; 				
			$this->load->view('backend/includes/template', $data);		
	}


	public function reporte24()
	{
			$u_id = $this->tank_auth->get_user_id();
			$data['restriccion'] = ( ($u_id == 259) || ($u_id == 266) || ($u_id == 269) ) ? FALSE : TRUE ;
			$dep = $this->tabulados_model->get_dptos();
			$vr = null;
			$td = null;
			$ttt = 0;
			$dde1 = 0;
			$dde2 = 0;
			$dde3 = 0;
			$dde4 = 0;
			$dde5 = 0;
			$dde6 = 0;
			$dde7 = 0;
			$dde8 = 0;
			$dde9 = 0;
			$e1 = null;
			$e2 = null;		
			$e3 = null;		
			$e4 = null;		
			$e5 = null;		
			$e6 = null;		
			$e7 = null;		
			$e8 = null;		
			$e9 = null;			
			foreach($dep->result() as $d){
				$vr[$d->CCDD] = $this->tabulados_model->get_report24($d->CCDD);	
				$e1[$d->CCDD] = 0;				
				$e2[$d->CCDD] = 0;				
				$e3[$d->CCDD] = 0;				
				$e4[$d->CCDD] = 0;				
				$e5[$d->CCDD] = 0;				
				$e6[$d->CCDD] = 0;				
				$e7[$d->CCDD] = 0;				
				$e8[$d->CCDD] = 0;				
				$e9[$d->CCDD] = 0;							
				foreach($vr[$d->CCDD]->result() as $uv){			
					for($x=1; $x<=10; $x++){
							$a = 'S2_23_11_' . $x;
							if(!is_null($uv->$a) && $uv->$a == 1)
								$e1[$d->CCDD]++;
							elseif(!is_null($uv->$a) && $uv->$a == 2)
								$e2[$d->CCDD]++; 	
							elseif(!is_null($uv->$a) && $uv->$a == 3)
								$e3[$d->CCDD]++; 
							elseif(!is_null($uv->$a) && $uv->$a == 4)
								$e4[$d->CCDD]++; 																	
							elseif(!is_null($uv->$a) && $uv->$a == 5)
								$e5[$d->CCDD]++; 
							elseif(!is_null($uv->$a) && $uv->$a == 6)
								$e6[$d->CCDD]++; 	
							elseif(!is_null($uv->$a) && $uv->$a == 7)
								$e7[$d->CCDD]++; 	
							elseif(!is_null($uv->$a) && $uv->$a == 8)
								$e8[$d->CCDD]++; 	
							elseif(!is_null($uv->$a) && $uv->$a == 9)
								$e9[$d->CCDD]++; 																																																
					}
				}
				$dde1 += $e1[$d->CCDD];
				$dde2 += $e2[$d->CCDD] ;		
				$dde3 += $e3[$d->CCDD] ;		
				$dde4 += $e4[$d->CCDD] ;		
				$dde5 += $e5[$d->CCDD] ;		
				$dde6 += $e6[$d->CCDD] ;		
				$dde7 += $e7[$d->CCDD] ;		
				$dde8 += $e8[$d->CCDD] ;		
				$dde9 += $e9[$d->CCDD] ;			
				$td[$d->CCDD] = $e1[$d->CCDD] + $e2[$d->CCDD] + $e3[$d->CCDD] + $e4[$d->CCDD] + $e5[$d->CCDD] + $e6[$d->CCDD] + $e7[$d->CCDD] + $e8[$d->CCDD] + $e9[$d->CCDD];
				$ttt += $td[$d->CCDD];
			}
			$data['e1'] = $e1;
			$data['e2'] = $e2;
			$data['e3'] = $e3;
			$data['e4'] = $e4;
			$data['e5'] = $e5;
			$data['e6'] = $e6;
			$data['e7'] = $e7;
			$data['e8'] = $e8;
			$data['e9'] = $e9;

			$data['te1'] = $dde1;
			$data['te2'] = $dde2;
			$data['te3'] = $dde3;
			$data['te4'] = $dde4;
			$data['te5'] = $dde5;
			$data['te6'] = $dde6;
			$data['te7'] = $dde7;
			$data['te8'] = $dde8;
			$data['te9'] = $dde9;

			$data['td'] = $td;
			$data['ttt'] = $ttt;
			$data['dep'] = $dep;
			$data['nav'] = TRUE;
			$data['title'] = 'Tabulados';			
			$data['opcion'] = 24;
			$data['main_content'] = 'tabulados/pescador/reporte24_view';
			$prete = $this->tabulados_model->get_texto(1,$data['opcion']);
			$texto = '';
			if($prete->num_rows() > 0){
				$texto = $prete->row()->texto;
			}
			$data['texto'] =  $texto; 				
			$this->load->view('backend/includes/template', $data);		
	}



	public function reporte25()
	{
			$u_id = $this->tank_auth->get_user_id();
			$data['restriccion'] = ( ($u_id == 259) || ($u_id == 266) || ($u_id == 269) ) ? FALSE : TRUE ;
			$dep = $this->tabulados_model->get_dptos();
			$vr = null;
			$tr = null;
			$total = 0;
			foreach($dep->result() as $d){
				$dd = 0;
				for($i=1; $i<=7; $i++){
					$k = ($i == 7) ? 9 : $i ;
					$vr[$d->CCDD][$k] = $this->tabulados_model->get_report25($k,$d->CCDD)->row()->num;
					$dd += $vr[$d->CCDD][$k]; 
				}
				$vt[$d->CCDD] = $dd; 
				$total += $dd;
			}
			for($i=1; $i<=7; $i++){
				$k = ($i == 7) ? 9 : $i ;
				$tr[$k] = $this->tabulados_model->get_report25($k)->row()->num; 
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
			$prete = $this->tabulados_model->get_texto(1,$data['opcion']);
			$texto = '';
			if($prete->num_rows() > 0){
				$texto = $prete->row()->texto;
			}
			$data['texto'] =  $texto; 				
			$this->load->view('backend/includes/template', $data);		
	}

	public function reporte26()
	{
			$u_id = $this->tank_auth->get_user_id();
			$data['restriccion'] = ( ($u_id == 259) || ($u_id == 266) || ($u_id == 269) ) ? FALSE : TRUE ;
			$dep = $this->tabulados_model->get_dptos();
			$vr = null;
			$tr = null;
			$total = 0;
			foreach($dep->result() as $d){
				$dd = 0;
				for($i=1; $i<=9; $i++){
					$vr[$d->CCDD][$i] = $this->tabulados_model->get_report26($i,$d->CCDD)->row()->num;
					$dd += $vr[$d->CCDD][$i]; 
				}
				$vt[$d->CCDD] = $dd; 
				$total += $dd;
			}
			for($i=1; $i<=9; $i++){
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
			$prete = $this->tabulados_model->get_texto(1,$data['opcion']);
			$texto = '';
			if($prete->num_rows() > 0){
				$texto = $prete->row()->texto;
			}
			$data['texto'] =  $texto; 				
			$this->load->view('backend/includes/template', $data);		
	}


	public function reporte27()
	{
			$u_id = $this->tank_auth->get_user_id();
			$data['restriccion'] = ( ($u_id == 259) || ($u_id == 266) || ($u_id == 269) ) ? FALSE : TRUE ;
			$dep = $this->tabulados_model->get_dptos();
			$vr = null;
			$tr = null;
			$total = 0;
			foreach($dep->result() as $d){
				$dd = 0;
				for($i=1; $i<=8; $i++){
					$k = ($i == 8) ? 9 : $i ;
					$vr[$d->CCDD][$k] = $this->tabulados_model->get_report27($k,$d->CCDD)->row()->num;
					$dd += $vr[$d->CCDD][$k]; 
				}
				$vt[$d->CCDD] = $dd; 
				$total += $dd;
			}
			for($i=1; $i<=8; $i++){
				$k = ($i == 8) ? 9 : $i ;
				$tr[$k] = $this->tabulados_model->get_report27($k)->row()->num; 
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
			$prete = $this->tabulados_model->get_texto(1,$data['opcion']);
			$texto = '';
			if($prete->num_rows() > 0){
				$texto = $prete->row()->texto;
			}
			$data['texto'] =  $texto; 				
			$this->load->view('backend/includes/template', $data);		
	}



	public function reporte28()
	{
			$u_id = $this->tank_auth->get_user_id();
			$data['restriccion'] = ( ($u_id == 259) || ($u_id == 266) || ($u_id == 269) ) ? FALSE : TRUE ;
			$dep = $this->tabulados_model->get_dptos();
			$vr = null;
			$tr = null;
			$total = 0;
			foreach($dep->result() as $d){
				$dd = 0;
				for($i=1; $i<=9; $i++){
					$vr[$d->CCDD][$i] = $this->tabulados_model->get_report28($i,$d->CCDD)->row()->num;
					$dd += $vr[$d->CCDD][$i]; 
				}
				$vt[$d->CCDD] = $dd; 
				$total += $dd;
			}
			for($i=1; $i<=9; $i++){
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
			$prete = $this->tabulados_model->get_texto(1,$data['opcion']);
			$texto = '';
			if($prete->num_rows() > 0){
				$texto = $prete->row()->texto;
			}
			$data['texto'] =  $texto; 				
			$this->load->view('backend/includes/template', $data);		
	}


	public function reporte29()
	{
			$u_id = $this->tank_auth->get_user_id();
			$data['restriccion'] = ( ($u_id == 259) || ($u_id == 266) || ($u_id == 269) ) ? FALSE : TRUE ;
			$dep = $this->tabulados_model->get_dptos();
			$vr = null;
			$tr = null;
			$total = 0;
			foreach($dep->result() as $d){
				$dd = 0;
				for($i=1; $i<=9; $i++){
					$vr[$d->CCDD][$i] = $this->tabulados_model->get_report29($i,$d->CCDD)->row()->num;
					$dd += $vr[$d->CCDD][$i]; 
				}
				$vt[$d->CCDD] = $dd; 
				$total += $dd;
			}
			for($i=1; $i<=9; $i++){
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
			$prete = $this->tabulados_model->get_texto(1,$data['opcion']);
			$texto = '';
			if($prete->num_rows() > 0){
				$texto = $prete->row()->texto;
			}
			$data['texto'] =  $texto; 				
			$this->load->view('backend/includes/template', $data);		
	}

	public function reporte30()
	{
			$u_id = $this->tank_auth->get_user_id();
			$data['restriccion'] = ( ($u_id == 259) || ($u_id == 266) || ($u_id == 269) ) ? FALSE : TRUE ;
			$dep = $this->tabulados_model->get_dptos();
			$vr = null;
			$tr = null;
			$total = 0;
			foreach($dep->result() as $d){
				$dd = 0;
				for($i=1; $i<=3; $i++){
					$k = ($i == 3) ? 9 : $i;
					$vr[$d->CCDD][$k] = $this->tabulados_model->get_report30($k,$d->CCDD)->row()->num;
					$dd += $vr[$d->CCDD][$k]; 
				}
				$vt[$d->CCDD] = $dd; 
				$total += $dd;
			}
			for($i=1; $i<=3; $i++){
				$k = ($i == 3) ? 9 : $i;
				$tr[$k] = $this->tabulados_model->get_report30($k)->row()->num; 
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
			$prete = $this->tabulados_model->get_texto(1,$data['opcion']);
			$texto = '';
			if($prete->num_rows() > 0){
				$texto = $prete->row()->texto;
			}
			$data['texto'] =  $texto; 				
			$this->load->view('backend/includes/template', $data);		
	}

	public function reporte31()
	{
			$u_id = $this->tank_auth->get_user_id();
			$data['restriccion'] = ( ($u_id == 259) || ($u_id == 266) || ($u_id == 269) ) ? FALSE : TRUE ;
			$dep = $this->tabulados_model->get_dptos();
			$vr = null;
			$tr = null;
			$total = 0;
			foreach($dep->result() as $d){
				$dd = 0;
				for($i=1; $i<=8; $i++){
					$k = ($i == 8) ? 9 : $i;
					$vr[$d->CCDD][$k] = $this->tabulados_model->get_report31($k,$d->CCDD)->row()->num;
					$dd += $vr[$d->CCDD][$k]; 
				}
				$vt[$d->CCDD] = $dd; 
				$total += $dd;
			}
			for($i=1; $i<=8; $i++){
				$k = ($i == 8) ? 9 : $i;
				$tr[$k] = $this->tabulados_model->get_report31($k)->row()->num; 
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
			$prete = $this->tabulados_model->get_texto(1,$data['opcion']);
			$texto = '';
			if($prete->num_rows() > 0){
				$texto = $prete->row()->texto;
			}
			$data['texto'] =  $texto; 				
			$this->load->view('backend/includes/template', $data);		
	}

	public function reporte32()
	{
			$u_id = $this->tank_auth->get_user_id();
			$data['restriccion'] = ( ($u_id == 259) || ($u_id == 266) || ($u_id == 269) ) ? FALSE : TRUE ;
			$dep = $this->tabulados_model->get_dptos();
			$vr = null;
			$tr = null;
			$total = 0;
			foreach($dep->result() as $d){
				$dd = 0;
				for($i=1; $i<=3; $i++){
					$k = ($i == 3) ? 9 : $i;
					$vr[$d->CCDD][$k] = $this->tabulados_model->get_report32($k,$d->CCDD)->row()->num;
					$dd += $vr[$d->CCDD][$k]; 
				}
				$vt[$d->CCDD] = $dd; 
				$total += $dd;
			}
			for($i=1; $i<=3; $i++){
				$k = ($i == 3) ? 9 : $i;
				$tr[$k] = $this->tabulados_model->get_report32($k)->row()->num; 
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
			$prete = $this->tabulados_model->get_texto(1,$data['opcion']);
			$texto = '';
			if($prete->num_rows() > 0){
				$texto = $prete->row()->texto;
			}
			$data['texto'] =  $texto; 				
			$this->load->view('backend/includes/template', $data);		
	}

	public function reporte33()
	{
			$u_id = $this->tank_auth->get_user_id();
			$data['restriccion'] = ( ($u_id == 259) || ($u_id == 266) || ($u_id == 269) ) ? FALSE : TRUE ;
			$dep = $this->tabulados_model->get_dptos();
			$vr = null;
			$tr = null;
			$total = 0;
			foreach($dep->result() as $d){
				$dd = 0;
				for($i=1; $i<=12; $i++){
					$vr[$d->CCDD][$i] = $this->tabulados_model->get_report33($i,$d->CCDD)->row()->num;
					//$dd += $vr[$d->CCDD][$i]; 
				}
				$vt[$d->CCDD] = $dd = $this->tabulados_model->get_report33(999,$d->CCDD)->row()->num; 
				$total += $dd;
			}
			for($i=1; $i<=12; $i++){
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
			$prete = $this->tabulados_model->get_texto(1,$data['opcion']);
			$texto = '';
			if($prete->num_rows() > 0){
				$texto = $prete->row()->texto;
			}
			$data['texto'] =  $texto; 				
			$this->load->view('backend/includes/template', $data);		
	}


	public function reporte34()
	{
			$u_id = $this->tank_auth->get_user_id();
			$data['restriccion'] = ( ($u_id == 259) || ($u_id == 266) || ($u_id == 269) ) ? FALSE : TRUE ;
			$dep = $this->tabulados_model->get_dptos();
			$vr = null;
			$tr = null;
			$total = 0;
			foreach($dep->result() as $d){
				$dd = 0;
				for($i=1; $i<=6; $i++){
					$vr[$d->CCDD][$i] = $this->tabulados_model->get_report34($i,$d->CCDD)->row()->num;
					//$dd += $vr[$d->CCDD][$k]; 
				}
				$vt[$d->CCDD] = $dd = $this->tabulados_model->get_report34(999,$d->CCDD)->row()->num; 
				$total += $dd;
			}
			for($i=1; $i<=6; $i++){
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
			$prete = $this->tabulados_model->get_texto(1,$data['opcion']);
			$texto = '';
			if($prete->num_rows() > 0){
				$texto = $prete->row()->texto;
			}
			$data['texto'] =  $texto; 			
			$this->load->view('backend/includes/template', $data);		
	}


	public function reporte35()
	{
			$u_id = $this->tank_auth->get_user_id();
			$data['restriccion'] = ( ($u_id == 259) || ($u_id == 266) || ($u_id == 269) ) ? FALSE : TRUE ;
			$dep = $this->tabulados_model->get_dptos();
			$vr = null;
			$tr = null;
			$total = 0;
			foreach($dep->result() as $d){
				$dd = 0;
				for($i=1; $i<=3; $i++){
					$k = ($i == 3) ? 9 : $i;
					$vr[$d->CCDD][$k] = $this->tabulados_model->get_report35($k,$d->CCDD)->row()->num;
					$dd += $vr[$d->CCDD][$k]; 
				}
				$vt[$d->CCDD] = $dd; 
				$total += $dd;
			}
			for($i=1; $i<=3; $i++){
				$k = ($i == 3) ? 9 : $i;
				$tr[$k] = $this->tabulados_model->get_report35($k)->row()->num; 
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
			$prete = $this->tabulados_model->get_texto(1,$data['opcion']);
			$texto = '';
			if($prete->num_rows() > 0){
				$texto = $prete->row()->texto;
			}
			$data['texto'] =  $texto; 				
			$this->load->view('backend/includes/template', $data);		
	}


	public function reporte36()
	{
			$u_id = $this->tank_auth->get_user_id();
			$data['restriccion'] = ( ($u_id == 259) || ($u_id == 266) || ($u_id == 269) ) ? FALSE : TRUE ;
			$dep = $this->tabulados_model->get_dptos();
			$vr = null;
			$tr = null;
			$total = 0;
			foreach($dep->result() as $d){
				$dd = 0;
				for($i=1; $i<=3; $i++){
					$k = ($i == 3) ? 9 : $i;
					$vr[$d->CCDD][$k] = $this->tabulados_model->get_report35($k,$d->CCDD)->row()->num;
					$dd += $vr[$d->CCDD][$k]; 
				}
				$vt[$d->CCDD] = $dd; 
				$total += $dd;
			}
			for($i=1; $i<=3; $i++){
				$k = ($i == 3) ? 9 : $i;
				$tr[$k] = $this->tabulados_model->get_report35($k)->row()->num; 
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
			$prete = $this->tabulados_model->get_texto(1,$data['opcion']);
			$texto = '';
			if($prete->num_rows() > 0){
				$texto = $prete->row()->texto;
			}
			$data['texto'] =  $texto; 				
			$this->load->view('backend/includes/template', $data);		
	}

	public function reporte37()
	{
			$u_id = $this->tank_auth->get_user_id();
			$data['restriccion'] = ( ($u_id == 259) || ($u_id == 266) || ($u_id == 269) ) ? FALSE : TRUE ;
			$dep = $this->tabulados_model->get_dptos();
			$vr = null;
			$tr = null;
			$total = 0;
			foreach($dep->result() as $d){
				$dd = 0;
				for($i=1; $i<=5; $i++){
					$vr[$d->CCDD][$i] = $this->tabulados_model->get_report37($i,$d->CCDD)->row()->num;
					//$dd += $vr[$d->CCDD][$i]; 
				}
				$vt[$d->CCDD] = $dd = $this->tabulados_model->get_report37(999,$d->CCDD)->row()->num; 
				$total += $dd;
			}
			for($i=1; $i<=5; $i++){
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
			$prete = $this->tabulados_model->get_texto(1,$data['opcion']);
			$texto = '';
			if($prete->num_rows() > 0){
				$texto = $prete->row()->texto;
			}
			$data['texto'] =  $texto; 				
			$this->load->view('backend/includes/template', $data);		
	}

	public function reporte38()
	{
			$u_id = $this->tank_auth->get_user_id();
			$data['restriccion'] = ( ($u_id == 259) || ($u_id == 266) || ($u_id == 269) ) ? FALSE : TRUE ;
			$dep = $this->tabulados_model->get_dptos();
			$vr = null;
			$tr = null;
			$total = 0;
			foreach($dep->result() as $d){
				$dd = 0;
				for($i=1; $i<=3; $i++){
					$k = ($i == 3) ? 9 : $i;
					$vr[$d->CCDD][$k] = $this->tabulados_model->get_report38($k,$d->CCDD)->row()->num;
					$dd += $vr[$d->CCDD][$k]; 
				}
				$vt[$d->CCDD] = $dd; 
				$total += $dd;
			}
			for($i=1; $i<=3; $i++){
				$k = ($i == 3) ? 9 : $i;
				$tr[$k] = $this->tabulados_model->get_report38($k)->row()->num; 
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
			$prete = $this->tabulados_model->get_texto(1,$data['opcion']);
			$texto = '';
			if($prete->num_rows() > 0){
				$texto = $prete->row()->texto;
			}
			$data['texto'] =  $texto; 				
			$this->load->view('backend/includes/template', $data);		
	}

	public function reporte39()
	{
			$u_id = $this->tank_auth->get_user_id();
			$data['restriccion'] = ( ($u_id == 259) || ($u_id == 266) || ($u_id == 269) ) ? FALSE : TRUE ;
			$dep = $this->tabulados_model->get_dptos();
			$vr = null;
			$tr = null;
			$total = 0;
			foreach($dep->result() as $d){
				$dd = 0;
				for($i=1; $i<=3; $i++){
					$k = ($i == 3) ? 9 : $i;
					$vr[$d->CCDD][$k] = $this->tabulados_model->get_report39($k,$d->CCDD)->row()->num;
					$dd += $vr[$d->CCDD][$k]; 
				}
				$vt[$d->CCDD] = $dd; 
				$total += $dd;
			}
			for($i=1; $i<=3; $i++){
				$k = ($i == 3) ? 9 : $i;
				$tr[$k] = $this->tabulados_model->get_report39($k)->row()->num; 
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
			$prete = $this->tabulados_model->get_texto(1,$data['opcion']);
			$texto = '';
			if($prete->num_rows() > 0){
				$texto = $prete->row()->texto;
			}
			$data['texto'] =  $texto; 				
			$this->load->view('backend/includes/template', $data);		
	}


	public function reporte40()
	{
			$u_id = $this->tank_auth->get_user_id();
			$data['restriccion'] = ( ($u_id == 259) || ($u_id == 266) || ($u_id == 269) ) ? FALSE : TRUE ;
			$dep = $this->tabulados_model->get_dptos();
			$vr = null;
			$tr = null;
			$total = 0;
			foreach($dep->result() as $d){
				$dd = 0;
				for($i=1; $i<=3; $i++){
					$k = ($i == 3) ? 9 : $i;
					$vr[$d->CCDD][$k] = $this->tabulados_model->get_report40($k,$d->CCDD)->row()->num;
					$dd += $vr[$d->CCDD][$k]; 
				}
				$vt[$d->CCDD] = $dd; 
				$total += $dd;
			}
			for($i=1; $i<=3; $i++){
				$k = ($i == 3) ? 9 : $i;
				$tr[$k] = $this->tabulados_model->get_report40($k)->row()->num; 
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
			$prete = $this->tabulados_model->get_texto(1,$data['opcion']);
			$texto = '';
			if($prete->num_rows() > 0){
				$texto = $prete->row()->texto;
			}
			$data['texto'] =  $texto; 				
			$this->load->view('backend/includes/template', $data);		
	}


	public function reporte41()
	{
			$u_id = $this->tank_auth->get_user_id();
			$data['restriccion'] = ( ($u_id == 259) || ($u_id == 266) || ($u_id == 269) ) ? FALSE : TRUE ;
			$dep = $this->tabulados_model->get_dptos();
			$vr = null;
			$tr = null;
			$total = 0;
			foreach($dep->result() as $d){
				$dd = 0;
				for($i=1; $i<=4; $i++){
					$vr[$d->CCDD][$i] = $this->tabulados_model->get_report41($i,$d->CCDD)->row()->num;
					//$dd += $vr[$d->CCDD][$i]; 
				}
				$vt[$d->CCDD] = $dd =  $this->tabulados_model->get_report41(999,$d->CCDD)->row()->num; 
				$total += $dd;
			}
			for($i=1; $i<=4; $i++){
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
			$prete = $this->tabulados_model->get_texto(1,$data['opcion']);
			$texto = '';
			if($prete->num_rows() > 0){
				$texto = $prete->row()->texto;
			}
			$data['texto'] =  $texto; 				
			$this->load->view('backend/includes/template', $data);		
	}

	public function reporte42()
	{
			$u_id = $this->tank_auth->get_user_id();
			$data['restriccion'] = ( ($u_id == 259) || ($u_id == 266) || ($u_id == 269) ) ? FALSE : TRUE ;
			$dep = $this->tabulados_model->get_dptos();
			$vr = null;
			$tr = null;
			$total = 0;
			foreach($dep->result() as $d){
				$dd = 0;
				for($i=1; $i<=3; $i++){
					$k = ($i == 3) ? 9 : $i;
					$vr[$d->CCDD][$k] = $this->tabulados_model->get_report42($k,$d->CCDD)->row()->num;
					$dd += $vr[$d->CCDD][$k]; 
				}
				$vt[$d->CCDD] = $dd; 
				$total += $dd;
			}
			for($i=1; $i<=3; $i++){
				$k = ($i == 3) ? 9 : $i;
				$tr[$k] = $this->tabulados_model->get_report42($k)->row()->num; 
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
			$prete = $this->tabulados_model->get_texto(1,$data['opcion']);
			$texto = '';
			if($prete->num_rows() > 0){
				$texto = $prete->row()->texto;
			}
			$data['texto'] =  $texto; 				
			$this->load->view('backend/includes/template', $data);		
	}

	public function reporte43()
	{
			$u_id = $this->tank_auth->get_user_id();
			$data['restriccion'] = ( ($u_id == 259) || ($u_id == 266) || ($u_id == 269) ) ? FALSE : TRUE ;
			$dep = $this->tabulados_model->get_dptos();
			$vr = null;
			$tr = null;
			$total = 0;
			foreach($dep->result() as $d){
				$dd = 0;
				for($i=1; $i<=3; $i++){
					$k = ($i == 3) ? 9 : $i;
					$vr[$d->CCDD][$k] = $this->tabulados_model->get_report43($k,$d->CCDD)->row()->num;
					$dd += $vr[$d->CCDD][$k]; 
				}
				$vt[$d->CCDD] = $dd; 
				$total += $dd;
			}
			for($i=1; $i<=3; $i++){
				$k = ($i == 3) ? 9 : $i;
				$tr[$k] = $this->tabulados_model->get_report43($k)->row()->num; 
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
			$prete = $this->tabulados_model->get_texto(1,$data['opcion']);
			$texto = '';
			if($prete->num_rows() > 0){
				$texto = $prete->row()->texto;
			}
			$data['texto'] =  $texto; 				
			$this->load->view('backend/includes/template', $data);		
	}

	public function reporte44()
	{
			$u_id = $this->tank_auth->get_user_id();
			$data['restriccion'] = ( ($u_id == 259) || ($u_id == 266) || ($u_id == 269) ) ? FALSE : TRUE ;
			$dep = $this->tabulados_model->get_dptos();
			$vr = null;
			$tr = null;
			$total = 0;
			foreach($dep->result() as $d){
				$dd = 0;
				for($i=1; $i<=7; $i++){
					$vr[$d->CCDD][$i] = $this->tabulados_model->get_report44($i,$d->CCDD)->row()->num;
					//$dd += $vr[$d->CCDD][$i]; 
				}
				$vt[$d->CCDD] = $dd = $this->tabulados_model->get_report44(999,$d->CCDD)->row()->num; 
				$total += $dd;
			}
			for($i=1; $i<=7; $i++){
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
			$prete = $this->tabulados_model->get_texto(1,$data['opcion']);
			$texto = '';
			if($prete->num_rows() > 0){
				$texto = $prete->row()->texto;
			}
			$data['texto'] =  $texto; 				
			$this->load->view('backend/includes/template', $data);		
	}


	public function reporte45()
	{
			$u_id = $this->tank_auth->get_user_id();
			$data['restriccion'] = ( ($u_id == 259) || ($u_id == 266) || ($u_id == 269) ) ? FALSE : TRUE ;
			$dep = $this->tabulados_model->get_dptos();
			$vr = null;
			$tr = null;
			$total = 0;
			foreach($dep->result() as $d){
				$dd = 0;
				for($i=1; $i<=9; $i++){
					$vr[$d->CCDD][$i] = $this->tabulados_model->get_report45($i,$d->CCDD)->row()->num;
					//$dd += $vr[$d->CCDD][$i]; 
				}
				$vt[$d->CCDD] = $dd = $this->tabulados_model->get_report44(999,$d->CCDD)->row()->num;  
				$total += $dd;
			}
			for($i=1; $i<=9; $i++){
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
			$prete = $this->tabulados_model->get_texto(1,$data['opcion']);
			$texto = '';
			if($prete->num_rows() > 0){
				$texto = $prete->row()->texto;
			}
			$data['texto'] =  $texto; 				
			$this->load->view('backend/includes/template', $data);		
	}

	public function reporte46()
	{
			$u_id = $this->tank_auth->get_user_id();
			$data['restriccion'] = ( ($u_id == 259) || ($u_id == 266) || ($u_id == 269) ) ? FALSE : TRUE ;
			$dep = $this->tabulados_model->get_dptos();
			$vr = null;
			$tr = null;
			$total = 0;
			foreach($dep->result() as $d){
				$dd = 0;
				for($i=1; $i<=3; $i++){
					$vr[$d->CCDD][$i] = $this->tabulados_model->get_report46($i,$d->CCDD)->row()->num;
					//$dd += $vr[$d->CCDD][$i]; 
				}
				$vt[$d->CCDD] = $dd = $this->tabulados_model->get_report46(999,$d->CCDD)->row()->num;; 
				$total += $dd;
			}
			for($i=1; $i<=3; $i++){
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
			$prete = $this->tabulados_model->get_texto(1,$data['opcion']);
			$texto = '';
			if($prete->num_rows() > 0){
				$texto = $prete->row()->texto;
			}
			$data['texto'] =  $texto; 				
			$this->load->view('backend/includes/template', $data);		
	}

	public function reporte47()
	{
			$u_id = $this->tank_auth->get_user_id();
			$data['restriccion'] = ( ($u_id == 259) || ($u_id == 266) || ($u_id == 269) ) ? FALSE : TRUE ;
			$dep = $this->tabulados_model->get_dptos();
			$vr = null;
			$tr = null;
			$total = 0;
			foreach($dep->result() as $d){
				$dd = 0;
				for($i=1; $i<=5; $i++){
					$k = ($i == 5) ? 9 : $i;
					$vr[$d->CCDD][$k] = $this->tabulados_model->get_report47($k,$d->CCDD)->row()->num;
					$dd += $vr[$d->CCDD][$k]; 
				}
				$vt[$d->CCDD] = $dd; 
				$total += $dd;
			}
			for($i=1; $i<=5; $i++){
				$k = ($i == 5) ? 9 : $i;
				$tr[$k] = $this->tabulados_model->get_report47($k)->row()->num; 
			}
			$data['vr'] = $vr;
			$data['vt'] = $vt;
			$data['tr'] = $tr;
			$data['total'] = $total;
			$data['dep'] = $dep;
			$data['nav'] = TRUE;
			$data['title'] = 'Tabulados';			
			$data['opcion'] = 47;
			$data['main_content'] = 'tabulados/pescador/reporte47_view';
			$prete = $this->tabulados_model->get_texto(1,$data['opcion']);
			$texto = '';
			if($prete->num_rows() > 0){
				$texto = $prete->row()->texto;
			}
			$data['texto'] =  $texto; 				
			$this->load->view('backend/includes/template', $data);		
	}

	public function reporte48()
	{
			$u_id = $this->tank_auth->get_user_id();
			$data['restriccion'] = ( ($u_id == 259) || ($u_id == 266) || ($u_id == 269) ) ? FALSE : TRUE ;
			$dep = $this->tabulados_model->get_dptos();
			$vr = null;
			$tr = null;
			$total = 0;
			foreach($dep->result() as $d){
				$dd = 0;
				for($i=1; $i<=5; $i++){
					$k = ($i == 5) ? 9 : $i;
					$vr[$d->CCDD][$k] = $this->tabulados_model->get_report48($k,$d->CCDD)->row()->num;
					$dd += $vr[$d->CCDD][$k]; 
				}
				$vt[$d->CCDD] = $dd; 
				$total += $dd;
			}
			for($i=1; $i<=5; $i++){
				$k = ($i == 5) ? 9 : $i;
				$tr[$k] = $this->tabulados_model->get_report48($k)->row()->num; 
			}
			$data['vr'] = $vr;
			$data['vt'] = $vt;
			$data['tr'] = $tr;
			$data['total'] = $total;
			$data['dep'] = $dep;
			$data['nav'] = TRUE;
			$data['title'] = 'Tabulados';			
			$data['opcion'] = 48;
			$data['main_content'] = 'tabulados/pescador/reporte48_view';
			$prete = $this->tabulados_model->get_texto(1,$data['opcion']);
			$texto = '';
			if($prete->num_rows() > 0){
				$texto = $prete->row()->texto;
			}
			$data['texto'] =  $texto; 				
			$this->load->view('backend/includes/template', $data);		
	}
	public function reporte49()
	{
			$u_id = $this->tank_auth->get_user_id();
			$data['restriccion'] = ( ($u_id == 259) || ($u_id == 266) || ($u_id == 269) ) ? FALSE : TRUE ;
			$dep = $this->tabulados_model->get_dptos();
			$vr = null;
			$tr = null;
			$total = 0;
			foreach($dep->result() as $d){
				$dd = 0;
				for($i=1; $i<=10; $i++){
					$vr[$d->CCDD][$i] = $this->tabulados_model->get_report49($i,$d->CCDD)->row()->num;
					//$dd += $vr[$d->CCDD][$i]; 
				}
				$vt[$d->CCDD] = $dd = $this->tabulados_model->get_report49(999,$d->CCDD)->row()->num; 
				$total += $dd;
			}
			for($i=1; $i<=10; $i++){
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
			$prete = $this->tabulados_model->get_texto(1,$data['opcion']);
			$texto = '';
			if($prete->num_rows() > 0){
				$texto = $prete->row()->texto;
			}
			$data['texto'] =  $texto; 				
			$this->load->view('backend/includes/template', $data);		
	}


	public function reporte50()
	{
			$u_id = $this->tank_auth->get_user_id();
			$data['restriccion'] = ( ($u_id == 259) || ($u_id == 266) || ($u_id == 269) ) ? FALSE : TRUE ;
			$dep = $this->tabulados_model->get_dptos();
			$vr = null;
			$tr = null;
			$total = 0;
			foreach($dep->result() as $d){
				$dd = 0;
				for($i=0; $i<=5; $i++){
					$vr[$d->CCDD][$i] = $this->tabulados_model->get_report50($i,$d->CCDD)->row()->num;
					//$dd += $vr[$d->CCDD][$i]; 
				}
				$vt[$d->CCDD] = $dd = $this->tabulados_model->get_report50(999,$d->CCDD)->row()->num; 
				$total += $dd;
			}
			for($i=0; $i<=5; $i++){
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
			$prete = $this->tabulados_model->get_texto(1,$data['opcion']);
			$texto = '';
			if($prete->num_rows() > 0){
				$texto = $prete->row()->texto;
			}
			$data['texto'] =  $texto; 				
			$this->load->view('backend/includes/template', $data);		
	}


	public function reporte51()
	{
			$u_id = $this->tank_auth->get_user_id();
			$data['restriccion'] = ( ($u_id == 259) || ($u_id == 266) || ($u_id == 269) ) ? FALSE : TRUE ;
			$dep = $this->tabulados_model->get_dptos();
			$vr = null;
			$tr = null;
			$total = 0;
			foreach($dep->result() as $d){
				$dd = 0;
				for($i=5; $i<=8; $i++){
					$vr[$d->CCDD][$i] = $this->tabulados_model->get_report51($i,$d->CCDD)->row()->num;
					//$dd += $vr[$d->CCDD][$i]; 
				}
				$vt[$d->CCDD] = $dd = $this->tabulados_model->get_report51(999,$d->CCDD)->row()->num; 
				$total += $dd;
			}
			for($i=5; $i<=8; $i++){
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
			$prete = $this->tabulados_model->get_texto(1,$data['opcion']);
			$texto = '';
			if($prete->num_rows() > 0){
				$texto = $prete->row()->texto;
			}
			$data['texto'] =  $texto; 				
			$this->load->view('backend/includes/template', $data);		
	}


	public function reporte52()
	{
			$u_id = $this->tank_auth->get_user_id();
			$data['restriccion'] = ( ($u_id == 259) || ($u_id == 266) || ($u_id == 269) ) ? FALSE : TRUE ;
			$dep = $this->tabulados_model->get_dptos();
			$vr = null;
			$tr = null;
			$total = 0;
			foreach($dep->result() as $d){
				$dd = 0;
				for($i=1; $i<=49; $i++){
					$vr[$d->CCDD][$i] = $this->tabulados_model->get_report52($i,$d->CCDD)->row()->num;
					$dd += $vr[$d->CCDD][$i]; 
				}
				$vt[$d->CCDD] = $dd; 
				$total += $dd;
			}
			for($i=1; $i<=49; $i++){
				$tr[$i] = $this->tabulados_model->get_report52($i)->row()->num; 
			}
			$data['vr'] = $vr;
			$data['vt'] = $vt;
			$data['tr'] = $tr;
			$data['total'] = $total;
			$data['dep'] = $dep;
			$data['nav'] = TRUE;
			$data['title'] = 'Tabulados';			
			$data['opcion'] = 52;
			$data['main_content'] = 'tabulados/pescador/reporte52_view';
			$prete = $this->tabulados_model->get_texto(1,$data['opcion']);
			$texto = '';
			if($prete->num_rows() > 0){
				$texto = $prete->row()->texto;
			}
			$data['texto'] =  $texto; 				
			$this->load->view('backend/includes/template', $data);		
	}


	public function reporte53()
	{
			$u_id = $this->tank_auth->get_user_id();
			$data['restriccion'] = ( ($u_id == 259) || ($u_id == 266) || ($u_id == 269) ) ? FALSE : TRUE ;
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
			$prete = $this->tabulados_model->get_texto(1,$data['opcion']);
			$texto = '';
			if($prete->num_rows() > 0){
				$texto = $prete->row()->texto;
			}
			$data['texto'] =  $texto; 				
			$this->load->view('backend/includes/template', $data);		
	}

	public function reporte54()
	{
			$u_id = $this->tank_auth->get_user_id();
			$data['restriccion'] = ( ($u_id == 259) || ($u_id == 266) || ($u_id == 269) ) ? FALSE : TRUE ;
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
			$prete = $this->tabulados_model->get_texto(1,$data['opcion']);
			$texto = '';
			if($prete->num_rows() > 0){
				$texto = $prete->row()->texto;
			}
			$data['texto'] =  $texto; 				
			$this->load->view('backend/includes/template', $data);		
	}

	public function reporte55()
	{
			$u_id = $this->tank_auth->get_user_id();
			$data['restriccion'] = ( ($u_id == 259) || ($u_id == 266) || ($u_id == 269) ) ? FALSE : TRUE ;
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
			$prete = $this->tabulados_model->get_texto(1,$data['opcion']);
			$texto = '';
			if($prete->num_rows() > 0){
				$texto = $prete->row()->texto;
			}
			$data['texto'] =  $texto; 				
			$this->load->view('backend/includes/template', $data);		
	}

	public function reporte56()
	{
			$u_id = $this->tank_auth->get_user_id();
			$data['restriccion'] = ( ($u_id == 259) || ($u_id == 266) || ($u_id == 269) ) ? FALSE : TRUE ;
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
			$prete = $this->tabulados_model->get_texto(1,$data['opcion']);
			$texto = '';
			if($prete->num_rows() > 0){
				$texto = $prete->row()->texto;
			}
			$data['texto'] =  $texto; 				
			$this->load->view('backend/includes/template', $data);		
	}


	public function reporte57()
	{
			$u_id = $this->tank_auth->get_user_id();
			$data['restriccion'] = ( ($u_id == 259) || ($u_id == 266) || ($u_id == 269) ) ? FALSE : TRUE ;
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
			$prete = $this->tabulados_model->get_texto(1,$data['opcion']);
			$texto = '';
			if($prete->num_rows() > 0){
				$texto = $prete->row()->texto;
			}
			$data['texto'] =  $texto; 				
			$this->load->view('backend/includes/template', $data);		
	}

	public function reporte58()
	{
			$u_id = $this->tank_auth->get_user_id();
			$data['restriccion'] = ( ($u_id == 259) || ($u_id == 266) || ($u_id == 269) ) ? FALSE : TRUE ;
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
			$prete = $this->tabulados_model->get_texto(1,$data['opcion']);
			$texto = '';
			if($prete->num_rows() > 0){
				$texto = $prete->row()->texto;
			}
			$data['texto'] =  $texto; 				
			$this->load->view('backend/includes/template', $data);		
	}

	public function reporte59()
	{
			$u_id = $this->tank_auth->get_user_id();
			$data['restriccion'] = ( ($u_id == 259) || ($u_id == 266) || ($u_id == 269) ) ? FALSE : TRUE ;
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
			$prete = $this->tabulados_model->get_texto(1,$data['opcion']);
			$texto = '';
			if($prete->num_rows() > 0){
				$texto = $prete->row()->texto;
			}
			$data['texto'] =  $texto; 				
			$this->load->view('backend/includes/template', $data);		
	}


	public function reporte60()
	{
			$u_id = $this->tank_auth->get_user_id();
			$data['restriccion'] = ( ($u_id == 259) || ($u_id == 266) || ($u_id == 269) ) ? FALSE : TRUE ;
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
			$prete = $this->tabulados_model->get_texto(1,$data['opcion']);
			$texto = '';
			if($prete->num_rows() > 0){
				$texto = $prete->row()->texto;
			}
			$data['texto'] =  $texto; 				
			$this->load->view('backend/includes/template', $data);		
	}

	public function reporte61()
	{
			$u_id = $this->tank_auth->get_user_id();
			$data['restriccion'] = ( ($u_id == 259) || ($u_id == 266) || ($u_id == 269) ) ? FALSE : TRUE ;
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
			$prete = $this->tabulados_model->get_texto(1,$data['opcion']);
			$texto = '';
			if($prete->num_rows() > 0){
				$texto = $prete->row()->texto;
			}
			$data['texto'] =  $texto; 				
			$this->load->view('backend/includes/template', $data);		
	}

	public function reporte62()
	{
			$u_id = $this->tank_auth->get_user_id();
			$data['restriccion'] = ( ($u_id == 259) || ($u_id == 266) || ($u_id == 269) ) ? FALSE : TRUE ;
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
			$prete = $this->tabulados_model->get_texto(1,$data['opcion']);
			$texto = '';
			if($prete->num_rows() > 0){
				$texto = $prete->row()->texto;
			}
			$data['texto'] =  $texto; 				
			$this->load->view('backend/includes/template', $data);		
	}

	public function reporte63()
	{
			$u_id = $this->tank_auth->get_user_id();
			$data['restriccion'] = ( ($u_id == 259) || ($u_id == 266) || ($u_id == 269) ) ? FALSE : TRUE ;
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
			$prete = $this->tabulados_model->get_texto(1,$data['opcion']);
			$texto = '';
			if($prete->num_rows() > 0){
				$texto = $prete->row()->texto;
			}
			$data['texto'] =  $texto; 				
			$this->load->view('backend/includes/template', $data);		
	}

	public function reporte64()
	{
			$u_id = $this->tank_auth->get_user_id();
			$data['restriccion'] = ( ($u_id == 259) || ($u_id == 266) || ($u_id == 269) ) ? FALSE : TRUE ;
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
			$prete = $this->tabulados_model->get_texto(1,$data['opcion']);
			$texto = '';
			if($prete->num_rows() > 0){
				$texto = $prete->row()->texto;
			}
			$data['texto'] =  $texto; 				
			$this->load->view('backend/includes/template', $data);		
	}

	public function reporte65()
	{
			$u_id = $this->tank_auth->get_user_id();
			$data['restriccion'] = ( ($u_id == 259) || ($u_id == 266) || ($u_id == 269) ) ? FALSE : TRUE ;
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
			$prete = $this->tabulados_model->get_texto(1,$data['opcion']);
			$texto = '';
			if($prete->num_rows() > 0){
				$texto = $prete->row()->texto;
			}
			$data['texto'] =  $texto; 				
			$this->load->view('backend/includes/template', $data);		
	}


	public function reporte66()
	{
			$u_id = $this->tank_auth->get_user_id();
			$data['restriccion'] = ( ($u_id == 259) || ($u_id == 266) || ($u_id == 269) ) ? FALSE : TRUE ;
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
			$prete = $this->tabulados_model->get_texto(1,$data['opcion']);
			$texto = '';
			if($prete->num_rows() > 0){
				$texto = $prete->row()->texto;
			}
			$data['texto'] =  $texto; 				
			$this->load->view('backend/includes/template', $data);		
	}

	public function reporte67()
	{
			$u_id = $this->tank_auth->get_user_id();
			$data['restriccion'] = ( ($u_id == 259) || ($u_id == 266) || ($u_id == 269) ) ? FALSE : TRUE ;
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
			$prete = $this->tabulados_model->get_texto(1,$data['opcion']);
			$texto = '';
			if($prete->num_rows() > 0){
				$texto = $prete->row()->texto;
			}
			$data['texto'] =  $texto; 				
			$this->load->view('backend/includes/template', $data);		
	}


	public function reporte69()
	{
			$u_id = $this->tank_auth->get_user_id();
			$data['restriccion'] = ( ($u_id == 259) || ($u_id == 266) || ($u_id == 269) ) ? FALSE : TRUE ;
			$dep = $this->tabulados_model->get_dptos();
			$vr = null;
			$tr = null;
			$total = 0;
			foreach($dep->result() as $d){
				$dd = 0;
				for($i=1; $i<=5; $i++){
					$vr[$d->CCDD][$i] = $this->tabulados_model->get_report69($i,$d->CCDD)->row()->num;
					$dd += $vr[$d->CCDD][$i]; 
				}
				$vt[$d->CCDD] = $dd; 
				$total += $dd;
			}
			for($i=1; $i<=5; $i++){
				$tr[$i] = $this->tabulados_model->get_report69($i)->row()->num; 
			}
			$data['vr'] = $vr;
			$data['vt'] = $vt;
			$data['tr'] = $tr;
			$data['total'] = $total;
			$data['dep'] = $dep;
			$data['nav'] = TRUE;
			$data['title'] = 'Tabulados';			
			$data['opcion'] = 69;
			$data['main_content'] = 'tabulados/pescador/reporte69_view';
			$prete = $this->tabulados_model->get_texto(1,$data['opcion']);
			$texto = '';
			if($prete->num_rows() > 0){
				$texto = $prete->row()->texto;
			}
			$data['texto'] =  $texto; 				
			$this->load->view('backend/includes/template', $data);		
	}



	public function reporte70()
	{
			$u_id = $this->tank_auth->get_user_id();
			$data['restriccion'] = ( ($u_id == 259) || ($u_id == 266) || ($u_id == 269) ) ? FALSE : TRUE ;
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
			$prete = $this->tabulados_model->get_texto(1,$data['opcion']);
			$texto = '';
			if($prete->num_rows() > 0){
				$texto = $prete->row()->texto;
			}
			$data['texto'] =  $texto; 				
			$this->load->view('backend/includes/template', $data);		
	}


	public function reporte71()
	{
			$u_id = $this->tank_auth->get_user_id();
			$data['restriccion'] = ( ($u_id == 259) || ($u_id == 266) || ($u_id == 269) ) ? FALSE : TRUE ;
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
			$prete = $this->tabulados_model->get_texto(1,$data['opcion']);
			$texto = '';
			if($prete->num_rows() > 0){
				$texto = $prete->row()->texto;
			}
			$data['texto'] =  $texto; 				
			$this->load->view('backend/includes/template', $data);		
	}


	public function reporte72()
	{
			$u_id = $this->tank_auth->get_user_id();
			$data['restriccion'] = ( ($u_id == 259) || ($u_id == 266) || ($u_id == 269) ) ? FALSE : TRUE ;
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
			$prete = $this->tabulados_model->get_texto(1,$data['opcion']);
			$texto = '';
			if($prete->num_rows() > 0){
				$texto = $prete->row()->texto;
			}
			$data['texto'] =  $texto; 				
			$this->load->view('backend/includes/template', $data);		
	}

	public function reporte73()
	{
			$u_id = $this->tank_auth->get_user_id();
			$data['restriccion'] = ( ($u_id == 259) || ($u_id == 266) || ($u_id == 269) ) ? FALSE : TRUE ;
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
			$prete = $this->tabulados_model->get_texto(1,$data['opcion']);
			$texto = '';
			if($prete->num_rows() > 0){
				$texto = $prete->row()->texto;
			}
			$data['texto'] =  $texto; 				
			$this->load->view('backend/includes/template', $data);		
	}

	public function reporte74()
	{
			$u_id = $this->tank_auth->get_user_id();
			$data['restriccion'] = ( ($u_id == 259) || ($u_id == 266) || ($u_id == 269) ) ? FALSE : TRUE ;
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
			$prete = $this->tabulados_model->get_texto(1,$data['opcion']);
			$texto = '';
			if($prete->num_rows() > 0){
				$texto = $prete->row()->texto;
			}
			$data['texto'] =  $texto; 				
			$this->load->view('backend/includes/template', $data);		
	}

	public function reporte75()
	{
			$u_id = $this->tank_auth->get_user_id();
			$data['restriccion'] = ( ($u_id == 259) || ($u_id == 266) || ($u_id == 269) ) ? FALSE : TRUE ;
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
			$prete = $this->tabulados_model->get_texto(1,$data['opcion']);
			$texto = '';
			if($prete->num_rows() > 0){
				$texto = $prete->row()->texto;
			}
			$data['texto'] =  $texto; 				
			$this->load->view('backend/includes/template', $data);		
	}

	public function reporte76()
	{
			$u_id = $this->tank_auth->get_user_id();
			$data['restriccion'] = ( ($u_id == 259) || ($u_id == 266) || ($u_id == 269) ) ? FALSE : TRUE ;
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
			$prete = $this->tabulados_model->get_texto(1,$data['opcion']);
			$texto = '';
			if($prete->num_rows() > 0){
				$texto = $prete->row()->texto;
			}
			$data['texto'] =  $texto; 				
			$this->load->view('backend/includes/template', $data);		
	}

	public function reporte77()
	{
			$u_id = $this->tank_auth->get_user_id();
			$data['restriccion'] = ( ($u_id == 259) || ($u_id == 266) || ($u_id == 269) ) ? FALSE : TRUE ;
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
			$prete = $this->tabulados_model->get_texto(1,$data['opcion']);
			$texto = '';
			if($prete->num_rows() > 0){
				$texto = $prete->row()->texto;
			}
			$data['texto'] =  $texto; 				
			$this->load->view('backend/includes/template', $data);		
	}

	public function reporte78()
	{
			$u_id = $this->tank_auth->get_user_id();
			$data['restriccion'] = ( ($u_id == 259) || ($u_id == 266) || ($u_id == 269) ) ? FALSE : TRUE ;
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
			$prete = $this->tabulados_model->get_texto(1,$data['opcion']);
			$texto = '';
			if($prete->num_rows() > 0){
				$texto = $prete->row()->texto;
			}
			$data['texto'] =  $texto; 				
			$this->load->view('backend/includes/template', $data);		
	}


	public function reporte79()
	{
			$u_id = $this->tank_auth->get_user_id();
			$data['restriccion'] = ( ($u_id == 259) || ($u_id == 266) || ($u_id == 269) ) ? FALSE : TRUE ;
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
			$prete = $this->tabulados_model->get_texto(1,$data['opcion']);
			$texto = '';
			if($prete->num_rows() > 0){
				$texto = $prete->row()->texto;
			}
			$data['texto'] =  $texto; 				
			$this->load->view('backend/includes/template', $data);		
	}

	public function reporte80()
	{
			$u_id = $this->tank_auth->get_user_id();
			$data['restriccion'] = ( ($u_id == 259) || ($u_id == 266) || ($u_id == 269) ) ? FALSE : TRUE ;
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
			$prete = $this->tabulados_model->get_texto(1,$data['opcion']);
			$texto = '';
			if($prete->num_rows() > 0){
				$texto = $prete->row()->texto;
			}
			$data['texto'] =  $texto; 				
			$this->load->view('backend/includes/template', $data);		
	}

	public function reporte81()
	{
			$u_id = $this->tank_auth->get_user_id();
			$data['restriccion'] = ( ($u_id == 259) || ($u_id == 266) || ($u_id == 269) ) ? FALSE : TRUE ;
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
			$prete = $this->tabulados_model->get_texto(1,$data['opcion']);
			$texto = '';
			if($prete->num_rows() > 0){
				$texto = $prete->row()->texto;
			}
			$data['texto'] =  $texto; 				
			$this->load->view('backend/includes/template', $data);		
	}

	public function reporte82()
	{
			$u_id = $this->tank_auth->get_user_id();
			$data['restriccion'] = ( ($u_id == 259) || ($u_id == 266) || ($u_id == 269) ) ? FALSE : TRUE ;
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
			$prete = $this->tabulados_model->get_texto(1,$data['opcion']);
			$texto = '';
			if($prete->num_rows() > 0){
				$texto = $prete->row()->texto;
			}
			$data['texto'] =  $texto; 				
			$this->load->view('backend/includes/template', $data);		
	}

	public function reporte83()
	{
			$u_id = $this->tank_auth->get_user_id();
			$data['restriccion'] = ( ($u_id == 259) || ($u_id == 266) || ($u_id == 269) ) ? FALSE : TRUE ;
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
			$prete = $this->tabulados_model->get_texto(1,$data['opcion']);
			$texto = '';
			if($prete->num_rows() > 0){
				$texto = $prete->row()->texto;
			}
			$data['texto'] =  $texto; 				
			$this->load->view('backend/includes/template', $data);		
	}

	public function reporte84()
	{
			$u_id = $this->tank_auth->get_user_id();
			$data['restriccion'] = ( ($u_id == 259) || ($u_id == 266) || ($u_id == 269) ) ? FALSE : TRUE ;
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
			$prete = $this->tabulados_model->get_texto(1,$data['opcion']);
			$texto = '';
			if($prete->num_rows() > 0){
				$texto = $prete->row()->texto;
			}
			$data['texto'] =  $texto; 				
			$this->load->view('backend/includes/template', $data);		
	}

	public function reporte85()
	{
			$u_id = $this->tank_auth->get_user_id();
			$data['restriccion'] = ( ($u_id == 259) || ($u_id == 266) || ($u_id == 269) ) ? FALSE : TRUE ;
			$dep = $this->tabulados_model->get_dptos();
			$vr = null;
			$tr = null;
			$total = 0;
			foreach($dep->result() as $d){
				$dd = 0;
				for($i=1; $i<=6; $i++){
					$vr[$d->CCDD][$i] = $this->tabulados_model->get_report85($i,$d->CCDD)->row()->num;
					$dd += $vr[$d->CCDD][$i]; 
				}
				$vt[$d->CCDD] = $dd; 
				$total += $dd;
			}
			for($i=1; $i<=6; $i++){
				$tr[$i] = $this->tabulados_model->get_report85($i)->row()->num; 
			}
			$data['vr'] = $vr;
			$data['vt'] = $vt;
			$data['tr'] = $tr;
			$data['total'] = $total;
			$data['dep'] = $dep;
			$data['nav'] = TRUE;
			$data['title'] = 'Tabulados';			
			$data['opcion'] = 85;
			$data['main_content'] = 'tabulados/pescador/reporte85_view';
			$prete = $this->tabulados_model->get_texto(1,$data['opcion']);
			$texto = '';
			if($prete->num_rows() > 0){
				$texto = $prete->row()->texto;
			}
			$data['texto'] =  $texto; 				
			$this->load->view('backend/includes/template', $data);		
	}


	public function reporte86()
	{
			$u_id = $this->tank_auth->get_user_id();
			$data['restriccion'] = ( ($u_id == 259) || ($u_id == 266) || ($u_id == 269) ) ? FALSE : TRUE ;
			$dep = $this->tabulados_model->get_dptos();
			$vr = null;
			$td = null;
			$ttt = 0;
			$dde1 = 0;
			$dde2 = 0;
			$dde3 = 0;
			$dde4 = 0;
			$dde5 = 0;

			$e1 = null;
			$e2 = null;		
			$e3 = null;		
			$e4 = null;		
			$e5 = null;		
			foreach($dep->result() as $d){
				$vr[$d->CCDD] = $this->tabulados_model->get_report86($d->CCDD);	
				$e1[$d->CCDD] = 0;				
				$e2[$d->CCDD] = 0;				
				$e3[$d->CCDD] = 0;				
				$e4[$d->CCDD] = 0;				
				$e5[$d->CCDD] = 0;						
				foreach($vr[$d->CCDD]->result() as $uv){			
					for($x=1; $x<=6; $x++){
							$a = 'S9_4_' . $x;
							if(!is_null($uv->$a) && $uv->$a == 1)
								$e1[$d->CCDD]++; 	
							elseif(!is_null($uv->$a) && $uv->$a == 2)
								$e2[$d->CCDD]++; 
							elseif(!is_null($uv->$a) && $uv->$a == 3)
								$e3[$d->CCDD]++; 																	
							elseif(!is_null($uv->$a) && $uv->$a == 4)
								$e4[$d->CCDD]++; 
							elseif(!is_null($uv->$a) && $uv->$a == 5)
								$e5[$d->CCDD]++; 															
					}
				}
				$dde1 += $e1[$d->CCDD];
				$dde2 += $e2[$d->CCDD] ;		
				$dde3 += $e3[$d->CCDD] ;		
				$dde4 += $e4[$d->CCDD] ;		
				$dde5 += $e5[$d->CCDD] ;		
				$td[$d->CCDD] = $e1[$d->CCDD] + $e2[$d->CCDD] + $e3[$d->CCDD] + $e4[$d->CCDD] + $e5[$d->CCDD];
				$ttt += $td[$d->CCDD];
			}
			$data['e1'] = $e1;
			$data['e2'] = $e2;
			$data['e3'] = $e3;
			$data['e4'] = $e4;
			$data['e5'] = $e5;

			$data['te1'] = $dde1;
			$data['te2'] = $dde2;
			$data['te3'] = $dde3;
			$data['te4'] = $dde4;
			$data['te5'] = $dde5;

			$data['td'] = $td;
			$data['ttt'] = $ttt;
			$data['dep'] = $dep;
			$data['nav'] = TRUE;
			$data['title'] = 'Tabulados';			
			$data['opcion'] = 86;
			$data['main_content'] = 'tabulados/pescador/reporte86_view';
			$prete = $this->tabulados_model->get_texto(1,$data['opcion']);
			$texto = '';
			if($prete->num_rows() > 0){
				$texto = $prete->row()->texto;
			}
			$data['texto'] =  $texto; 				
			$this->load->view('backend/includes/template', $data);		
	}


	public function reporte87()
	{
			$u_id = $this->tank_auth->get_user_id();
			$data['restriccion'] = ( ($u_id == 259) || ($u_id == 266) || ($u_id == 269) ) ? FALSE : TRUE ;
			$dep = $this->tabulados_model->get_dptos();
			$vr = null;
			$td = null;
			$ttt = 0;
			$dde1 = 0;
			$dde2 = 0;
			$dde3 = 0;
			$dde4 = 0;
			$dde5 = 0;
			$dde6 = 0;
			$dde7 = 0;

			$e1 = null;
			$e2 = null;		
			$e3 = null;		
			$e4 = null;		
			$e5 = null;		
			$e6 = null;		
			$e7 = null;		
			foreach($dep->result() as $d){
				$vr[$d->CCDD] = $this->tabulados_model->get_report87($d->CCDD);	
				$e1[$d->CCDD] = 0;				
				$e2[$d->CCDD] = 0;				
				$e3[$d->CCDD] = 0;				
				$e4[$d->CCDD] = 0;				
				$e5[$d->CCDD] = 0;						
				$e6[$d->CCDD] = 0;						
				$e7[$d->CCDD] = 0;						
				foreach($vr[$d->CCDD]->result() as $uv){			
					for($x=1; $x<=6; $x++){
							$a = 'S9_5_' . $x;
							if(!is_null($uv->$a) && $uv->$a == 1)
								$e1[$d->CCDD]++; 	
							elseif(!is_null($uv->$a) && $uv->$a == 2)
								$e2[$d->CCDD]++; 
							elseif(!is_null($uv->$a) && $uv->$a == 3)
								$e3[$d->CCDD]++; 																	
							elseif(!is_null($uv->$a) && $uv->$a == 4)
								$e4[$d->CCDD]++; 
							elseif(!is_null($uv->$a) && $uv->$a == 5)
								$e5[$d->CCDD]++; 	
							elseif(!is_null($uv->$a) && $uv->$a == 6)
								$e6[$d->CCDD]++; 	
							elseif(!is_null($uv->$a) && $uv->$a == 7)
								$e7[$d->CCDD]++; 																															
					}
				}
				$dde1 += $e1[$d->CCDD];
				$dde2 += $e2[$d->CCDD] ;		
				$dde3 += $e3[$d->CCDD] ;		
				$dde4 += $e4[$d->CCDD] ;		
				$dde5 += $e5[$d->CCDD] ;		
				$dde6 += $e6[$d->CCDD] ;		
				$dde7 += $e7[$d->CCDD] ;		
				$td[$d->CCDD] = $e1[$d->CCDD] + $e2[$d->CCDD] + $e3[$d->CCDD] + $e4[$d->CCDD] + $e5[$d->CCDD] + $e6[$d->CCDD] + $e7[$d->CCDD];
				$ttt += $td[$d->CCDD];
			}
			$data['e1'] = $e1;
			$data['e2'] = $e2;
			$data['e3'] = $e3;
			$data['e4'] = $e4;
			$data['e5'] = $e5;
			$data['e6'] = $e6;
			$data['e7'] = $e7;

			$data['te1'] = $dde1;
			$data['te2'] = $dde2;
			$data['te3'] = $dde3;
			$data['te4'] = $dde4;
			$data['te5'] = $dde5;
			$data['te6'] = $dde6;
			$data['te7'] = $dde7;

			$data['td'] = $td;
			$data['ttt'] = $ttt;
			$data['dep'] = $dep;
			$data['nav'] = TRUE;
			$data['title'] = 'Tabulados';			
			$data['opcion'] = 87;
			$data['main_content'] = 'tabulados/pescador/reporte87_view';
			$prete = $this->tabulados_model->get_texto(1,$data['opcion']);
			$texto = '';
			if($prete->num_rows() > 0){
				$texto = $prete->row()->texto;
			}
			$data['texto'] =  $texto; 				
			$this->load->view('backend/includes/template', $data);		
	}


	public function reporte88()
	{
			$u_id = $this->tank_auth->get_user_id();
			$data['restriccion'] = ( ($u_id == 259) || ($u_id == 266) || ($u_id == 269) ) ? FALSE : TRUE ;
			$dep = $this->tabulados_model->get_dptos();
			$vr = null;
			$td = null;
			$ttt = 0;
			$dde1 = 0;
			$dde2 = 0;
			$dde3 = 0;
			$dde4 = 0;
			$dde5 = 0;
			$dde6 = 0;
			$dde7 = 0;

			$e1 = null;
			$e2 = null;		
			$e3 = null;		
			$e4 = null;		
			$e5 = null;		
			$e6 = null;		
			$e7 = null;		
			foreach($dep->result() as $d){
				$vr[$d->CCDD] = $this->tabulados_model->get_report88($d->CCDD);	
				$e1[$d->CCDD] = 0;				
				$e2[$d->CCDD] = 0;				
				$e3[$d->CCDD] = 0;				
				$e4[$d->CCDD] = 0;				
				$e5[$d->CCDD] = 0;						
				$e6[$d->CCDD] = 0;						
				$e7[$d->CCDD] = 0;						
				foreach($vr[$d->CCDD]->result() as $uv){			
					for($x=1; $x<=6; $x++){
							$a = 'S9_6_' . $x;
							if(!is_null($uv->$a) && $uv->$a == 1)
								$e1[$d->CCDD]++; 	
							elseif(!is_null($uv->$a) && $uv->$a == 2)
								$e2[$d->CCDD]++; 
							elseif(!is_null($uv->$a) && $uv->$a == 3)
								$e3[$d->CCDD]++; 																	
							elseif(!is_null($uv->$a) && $uv->$a == 4)
								$e4[$d->CCDD]++; 
							elseif(!is_null($uv->$a) && $uv->$a == 5)
								$e5[$d->CCDD]++; 	
							elseif(!is_null($uv->$a) && $uv->$a == 6)
								$e6[$d->CCDD]++; 	
							elseif(!is_null($uv->$a) && $uv->$a == 7)
								$e7[$d->CCDD]++; 																															
					}
				}
				$dde1 += $e1[$d->CCDD];
				$dde2 += $e2[$d->CCDD] ;		
				$dde3 += $e3[$d->CCDD] ;		
				$dde4 += $e4[$d->CCDD] ;		
				$dde5 += $e5[$d->CCDD] ;		
				$dde6 += $e6[$d->CCDD] ;		
				$dde7 += $e7[$d->CCDD] ;		
				$td[$d->CCDD] = $e1[$d->CCDD] + $e2[$d->CCDD] + $e3[$d->CCDD] + $e4[$d->CCDD] + $e5[$d->CCDD] + $e6[$d->CCDD] + $e7[$d->CCDD];
				$ttt += $td[$d->CCDD];
			}
			$data['e1'] = $e1;
			$data['e2'] = $e2;
			$data['e3'] = $e3;
			$data['e4'] = $e4;
			$data['e5'] = $e5;
			$data['e6'] = $e6;
			$data['e7'] = $e7;

			$data['te1'] = $dde1;
			$data['te2'] = $dde2;
			$data['te3'] = $dde3;
			$data['te4'] = $dde4;
			$data['te5'] = $dde5;
			$data['te6'] = $dde6;
			$data['te7'] = $dde7;

			$data['td'] = $td;
			$data['ttt'] = $ttt;
			$data['dep'] = $dep;
			$data['nav'] = TRUE;
			$data['title'] = 'Tabulados';			
			$data['opcion'] = 88;
			$data['main_content'] = 'tabulados/pescador/reporte88_view';
			$prete = $this->tabulados_model->get_texto(1,$data['opcion']);
			$texto = '';
			if($prete->num_rows() > 0){
				$texto = $prete->row()->texto;
			}
			$data['texto'] =  $texto; 				
			$this->load->view('backend/includes/template', $data);		
	}

	public function reporte89()
	{
			$u_id = $this->tank_auth->get_user_id();
			$data['restriccion'] = ( ($u_id == 259) || ($u_id == 266) || ($u_id == 269) ) ? FALSE : TRUE ;
			$dep = $this->tabulados_model->get_dptos();
			$vr = null;
			$td = null;
			$ttt = 0;
			$dde1 = 0;
			$dde2 = 0;
			$dde3 = 0;
			$dde4 = 0;

			$e1 = null;
			$e2 = null;		
			$e3 = null;		
			$e4 = null;		

			foreach($dep->result() as $d){
				$vr[$d->CCDD] = $this->tabulados_model->get_report89($d->CCDD);	
				$e1[$d->CCDD] = 0;				
				$e2[$d->CCDD] = 0;				
				$e3[$d->CCDD] = 0;				
				$e4[$d->CCDD] = 0;				

				foreach($vr[$d->CCDD]->result() as $uv){			
					for($x=1; $x<=6; $x++){
							$a = 'S9_7_' . $x;
							if(!is_null($uv->$a) && $uv->$a == 1)
								$e1[$d->CCDD]++; 	
							elseif(!is_null($uv->$a) && $uv->$a == 2)
								$e2[$d->CCDD]++; 
							elseif(!is_null($uv->$a) && $uv->$a == 3)
								$e3[$d->CCDD]++; 																	
							elseif(!is_null($uv->$a) && $uv->$a == 4)
								$e4[$d->CCDD]++; 																													
					}
				}
				$dde1 += $e1[$d->CCDD];
				$dde2 += $e2[$d->CCDD] ;		
				$dde3 += $e3[$d->CCDD] ;		
				$dde4 += $e4[$d->CCDD] ;		
				$td[$d->CCDD] = $e1[$d->CCDD] + $e2[$d->CCDD] + $e3[$d->CCDD] + $e4[$d->CCDD];
				$ttt += $td[$d->CCDD];
			}
			$data['e1'] = $e1;
			$data['e2'] = $e2;
			$data['e3'] = $e3;
			$data['e4'] = $e4;

			$data['te1'] = $dde1;
			$data['te2'] = $dde2;
			$data['te3'] = $dde3;
			$data['te4'] = $dde4;

			$data['td'] = $td;
			$data['ttt'] = $ttt;
			$data['dep'] = $dep;
			$data['nav'] = TRUE;
			$data['title'] = 'Tabulados';			
			$data['opcion'] = 89;
			$data['main_content'] = 'tabulados/pescador/reporte89_view';
			$prete = $this->tabulados_model->get_texto(1,$data['opcion']);
			$texto = '';
			if($prete->num_rows() > 0){
				$texto = $prete->row()->texto;
			}
			$data['texto'] =  $texto; 				
			$this->load->view('backend/includes/template', $data);		
	}



	public function reporte90()
	{
			$u_id = $this->tank_auth->get_user_id();
			$data['restriccion'] = ( ($u_id == 259) || ($u_id == 266) || ($u_id == 269) ) ? FALSE : TRUE ;
			$dep = $this->tabulados_model->get_dptos();
			$vr = null;
			$td = null;
			$ttt = 0;
			$dde1 = 0;
			$dde2 = 0;
			$dde3 = 0;
			$dde4 = 0;
			$dde5 = 0;

			$e1 = null;
			$e2 = null;		
			$e3 = null;		
			$e4 = null;		
			$e5 = null;		
			foreach($dep->result() as $d){
				$vr[$d->CCDD] = $this->tabulados_model->get_report90($d->CCDD);	
				$e1[$d->CCDD] = 0;				
				$e2[$d->CCDD] = 0;				
				$e3[$d->CCDD] = 0;				
				$e4[$d->CCDD] = 0;				
				$e5[$d->CCDD] = 0;											
				foreach($vr[$d->CCDD]->result() as $uv){			
					for($x=1; $x<=6; $x++){
							$a = 'S9_9_' . $x . '_A';
							$b = 'S9_9_' . $x . '_M';
							if((is_null($uv->$a) || $uv->$a == 0) && (!is_null($uv->$b) && $uv->$b>0 && $uv->$b <=3))
								$e1[$d->CCDD]++; 	
							elseif((is_null($uv->$a) || $uv->$a == 0) && (!is_null($uv->$b) && $uv->$b>0 && $uv->$b <=6))
								$e2[$d->CCDD]++; 
							elseif(!is_null($uv->$a) && $uv->$a == 1 && ($uv->$b == 0 || is_null($uv->$b)) )
								$e3[$d->CCDD]++; 																	
							elseif(!is_null($uv->$a) && $uv->$a == 2 && ($uv->$b == 0 || is_null($uv->$b)) )
								$e4[$d->CCDD]++; 
							elseif(!is_null($uv->$a) && $uv->$a == 3 && ($uv->$b == 0 || is_null($uv->$b)) )
								$e5[$d->CCDD]++; 																															
					}
				}
				$dde1 += $e1[$d->CCDD];
				$dde2 += $e2[$d->CCDD] ;		
				$dde3 += $e3[$d->CCDD] ;		
				$dde4 += $e4[$d->CCDD] ;		
				$dde5 += $e5[$d->CCDD] ;			
				$td[$d->CCDD] = $e1[$d->CCDD] + $e2[$d->CCDD] + $e3[$d->CCDD] + $e4[$d->CCDD] + $e5[$d->CCDD];
				$ttt += $td[$d->CCDD];
			}
			$data['e1'] = $e1;
			$data['e2'] = $e2;
			$data['e3'] = $e3;
			$data['e4'] = $e4;
			$data['e5'] = $e5;

			$data['te1'] = $dde1;
			$data['te2'] = $dde2;
			$data['te3'] = $dde3;
			$data['te4'] = $dde4;
			$data['te5'] = $dde5;

			$data['td'] = $td;
			$data['ttt'] = $ttt;
			$data['dep'] = $dep;
			$data['nav'] = TRUE;
			$data['title'] = 'Tabulados';			
			$data['opcion'] = 90;
			$data['main_content'] = 'tabulados/pescador/reporte90_view';
			$prete = $this->tabulados_model->get_texto(1,$data['opcion']);
			$texto = '';
			if($prete->num_rows() > 0){
				$texto = $prete->row()->texto;
			}
			$data['texto'] =  $texto; 				
			$this->load->view('backend/includes/template', $data);		
	}


	public function reporte91()
	{
			$u_id = $this->tank_auth->get_user_id();
			$data['restriccion'] = ( ($u_id == 259) || ($u_id == 266) || ($u_id == 269) ) ? FALSE : TRUE ;
			$dep = $this->tabulados_model->get_dptos();
			$vr = null;
			$td = null;
			$ttt = 0;
			$dde1 = 0;
			$dde2 = 0;

			$e1 = null;
			$e2 = null;		

			foreach($dep->result() as $d){
				$vr[$d->CCDD] = $this->tabulados_model->get_report91($d->CCDD);	
				$e1[$d->CCDD] = 0;				
				$e2[$d->CCDD] = 0;				
										
				foreach($vr[$d->CCDD]->result() as $uv){			
					for($x=1; $x<=6; $x++){
							$a = 'S9_11_' . $x;
							if(!is_null($uv->$a) && $uv->$a == 1)
								$e1[$d->CCDD]++; 	
							elseif(!is_null($uv->$a) && $uv->$a == 2)
								$e2[$d->CCDD]++; 																
					}
				}
				$dde1 += $e1[$d->CCDD];
				$dde2 += $e2[$d->CCDD] ;		
	
				$td[$d->CCDD] = $e1[$d->CCDD] + $e2[$d->CCDD];
				$ttt += $td[$d->CCDD];
			}
			$data['e1'] = $e1;
			$data['e2'] = $e2;

			$data['te1'] = $dde1;
			$data['te2'] = $dde2;

			$data['td'] = $td;
			$data['ttt'] = $ttt;
			$data['dep'] = $dep;
			$data['nav'] = TRUE;
			$data['title'] = 'Tabulados';			
			$data['opcion'] = 91;
			$data['main_content'] = 'tabulados/pescador/reporte91_view';
			$prete = $this->tabulados_model->get_texto(1,$data['opcion']);
			$texto = '';
			if($prete->num_rows() > 0){
				$texto = $prete->row()->texto;
			}
			$data['texto'] =  $texto; 				
			$this->load->view('backend/includes/template', $data);		
	}


	public function reporte92()
	{
			$u_id = $this->tank_auth->get_user_id();
			$data['restriccion'] = ( ($u_id == 259) || ($u_id == 266) || ($u_id == 269) ) ? FALSE : TRUE ;
			$dep = $this->tabulados_model->get_dptos();
			$vr = null;
			$td = null;
			$ttt = 0;
			$dde1 = 0;
			$dde2 = 0;

			$e1 = null;
			$e2 = null;		

			foreach($dep->result() as $d){
				$vr[$d->CCDD] = $this->tabulados_model->get_report92($d->CCDD);	
				$e1[$d->CCDD] = 0;				
				$e2[$d->CCDD] = 0;				
										
				foreach($vr[$d->CCDD]->result() as $uv){			
					for($x=1; $x<=6; $x++){
							$a = 'S9_12_' . $x;
							if(!is_null($uv->$a) && $uv->$a == 1)
								$e1[$d->CCDD]++; 	
							elseif(!is_null($uv->$a) && $uv->$a == 2)
								$e2[$d->CCDD]++; 																
					}
				}
				$dde1 += $e1[$d->CCDD];
				$dde2 += $e2[$d->CCDD] ;		
	
				$td[$d->CCDD] = $e1[$d->CCDD] + $e2[$d->CCDD];
				$ttt += $td[$d->CCDD];
			}
			$data['e1'] = $e1;
			$data['e2'] = $e2;

			$data['te1'] = $dde1;
			$data['te2'] = $dde2;

			$data['td'] = $td;
			$data['ttt'] = $ttt;
			$data['dep'] = $dep;
			$data['nav'] = TRUE;
			$data['title'] = 'Tabulados';			
			$data['opcion'] = 92;
			$data['main_content'] = 'tabulados/pescador/reporte92_view';
			$prete = $this->tabulados_model->get_texto(1,$data['opcion']);
			$texto = '';
			if($prete->num_rows() > 0){
				$texto = $prete->row()->texto;
			}
			$data['texto'] =  $texto; 				
			$this->load->view('backend/includes/template', $data);		
	}

	public function reporte93()
	{
			$u_id = $this->tank_auth->get_user_id();
			$data['restriccion'] = ( ($u_id == 259) || ($u_id == 266) || ($u_id == 269) ) ? FALSE : TRUE ;
			$dep = $this->tabulados_model->get_dptos();
			$vr = null;
			$td = null;
			$ttt = 0;
			$dde1 = 0;
			$dde2 = 0;

			$e1 = null;
			$e2 = null;		

			foreach($dep->result() as $d){
				$vr[$d->CCDD] = $this->tabulados_model->get_report93($d->CCDD);	
				$e1[$d->CCDD] = 0;				
				$e2[$d->CCDD] = 0;				
										
				foreach($vr[$d->CCDD]->result() as $uv){			
					for($x=1; $x<=6; $x++){
							$a = 'S9_13_' . $x;
							if(!is_null($uv->$a) && $uv->$a == 1)
								$e1[$d->CCDD]++; 	
							elseif(!is_null($uv->$a) && $uv->$a == 2)
								$e2[$d->CCDD]++; 																
					}
				}
				$dde1 += $e1[$d->CCDD];
				$dde2 += $e2[$d->CCDD] ;		
	
				$td[$d->CCDD] = $e1[$d->CCDD] + $e2[$d->CCDD];
				$ttt += $td[$d->CCDD];
			}
			$data['e1'] = $e1;
			$data['e2'] = $e2;

			$data['te1'] = $dde1;
			$data['te2'] = $dde2;

			$data['td'] = $td;
			$data['ttt'] = $ttt;
			$data['dep'] = $dep;
			$data['nav'] = TRUE;
			$data['title'] = 'Tabulados';			
			$data['opcion'] = 93;
			$data['main_content'] = 'tabulados/pescador/reporte93_view';
			$prete = $this->tabulados_model->get_texto(1,$data['opcion']);
			$texto = '';
			if($prete->num_rows() > 0){
				$texto = $prete->row()->texto;
			}
			$data['texto'] =  $texto; 				
			$this->load->view('backend/includes/template', $data);		
	}

	public function reporte94()
	{
			$u_id = $this->tank_auth->get_user_id();
			$data['restriccion'] = ( ($u_id == 259) || ($u_id == 266) || ($u_id == 269) ) ? FALSE : TRUE ;
			$dep = $this->tabulados_model->get_dptos();
			$vr = null;
			$td = null;
			$ttt = 0;
			$dde1 = 0;
			$dde2 = 0;
			$dde3 = 0;

			$e1 = null;
			$e2 = null;		
			$e3 = null;		

			foreach($dep->result() as $d){
				$vr[$d->CCDD] = $this->tabulados_model->get_report94($d->CCDD);	
				$e1[$d->CCDD] = 0;				
				$e2[$d->CCDD] = 0;				
				$e3[$d->CCDD] = 0;							

				foreach($vr[$d->CCDD]->result() as $uv){			
					for($x=1; $x<=6; $x++){
							$a = 'S9_15_' . $x;
							if(!is_null($uv->$a) && $uv->$a == 1)
								$e1[$d->CCDD]++; 	
							elseif(!is_null($uv->$a) && $uv->$a == 2)
								$e2[$d->CCDD]++; 
							elseif(!is_null($uv->$a) && $uv->$a == 3)
								$e3[$d->CCDD]++; 																																													
					}
				}
				$dde1 += $e1[$d->CCDD];
				$dde2 += $e2[$d->CCDD] ;		
				$dde3 += $e3[$d->CCDD] ;			
				$td[$d->CCDD] = $e1[$d->CCDD] + $e2[$d->CCDD] + $e3[$d->CCDD];
				$ttt += $td[$d->CCDD];
			}
			$data['e1'] = $e1;
			$data['e2'] = $e2;
			$data['e3'] = $e3;

			$data['te1'] = $dde1;
			$data['te2'] = $dde2;
			$data['te3'] = $dde3;

			$data['td'] = $td;
			$data['ttt'] = $ttt;
			$data['dep'] = $dep;
			$data['nav'] = TRUE;
			$data['title'] = 'Tabulados';			
			$data['opcion'] = 94;
			$data['main_content'] = 'tabulados/pescador/reporte94_view';
			$prete = $this->tabulados_model->get_texto(1,$data['opcion']);
			$texto = '';
			if($prete->num_rows() > 0){
				$texto = $prete->row()->texto;
			}
			$data['texto'] =  $texto; 				
			$this->load->view('backend/includes/template', $data);		
	}


	public function reporte95()
	{
			$u_id = $this->tank_auth->get_user_id();
			$data['restriccion'] = ( ($u_id == 259) || ($u_id == 266) || ($u_id == 269) ) ? FALSE : TRUE ;
			$dep = $this->tabulados_model->get_dptos();
			$vr = null;
			$td = null;
			$ttt = 0;
			$dde1 = 0;
			$dde2 = 0;

			$e1 = null;
			$e2 = null;		

			foreach($dep->result() as $d){
				$vr[$d->CCDD] = $this->tabulados_model->get_report95($d->CCDD);	
				$e1[$d->CCDD] = 0;				
				$e2[$d->CCDD] = 0;				
										
				foreach($vr[$d->CCDD]->result() as $uv){			
					for($x=1; $x<=6; $x++){
							$a = 'S9_16_' . $x;
							if(!is_null($uv->$a) && $uv->$a == 1)
								$e1[$d->CCDD]++; 	
							elseif(!is_null($uv->$a) && $uv->$a == 2)
								$e2[$d->CCDD]++; 																
					}
				}
				$dde1 += $e1[$d->CCDD];
				$dde2 += $e2[$d->CCDD] ;		
	
				$td[$d->CCDD] = $e1[$d->CCDD] + $e2[$d->CCDD];
				$ttt += $td[$d->CCDD];
			}
			$data['e1'] = $e1;
			$data['e2'] = $e2;

			$data['te1'] = $dde1;
			$data['te2'] = $dde2;

			$data['td'] = $td;
			$data['ttt'] = $ttt;
			$data['dep'] = $dep;
			$data['nav'] = TRUE;
			$data['title'] = 'Tabulados';			
			$data['opcion'] = 95;
			$data['main_content'] = 'tabulados/pescador/reporte95_view';
			$prete = $this->tabulados_model->get_texto(1,$data['opcion']);
			$texto = '';
			if($prete->num_rows() > 0){
				$texto = $prete->row()->texto;
			}
			$data['texto'] =  $texto; 				
			$this->load->view('backend/includes/template', $data);		
	}



	public function reporte96()
	{
			$u_id = $this->tank_auth->get_user_id();
			$data['restriccion'] = ( ($u_id == 259) || ($u_id == 266) || ($u_id == 269) ) ? FALSE : TRUE ;
			$dep = $this->tabulados_model->get_dptos();
			$vr = null;
			$td = null;
			$ttt = 0;
			$dde1 = 0;
			$dde2 = 0;

			$e1 = null;
			$e2 = null;		

			foreach($dep->result() as $d){
				$vr[$d->CCDD] = $this->tabulados_model->get_report96($d->CCDD);	
				$e1[$d->CCDD] = 0;				
				$e2[$d->CCDD] = 0;				
										
				foreach($vr[$d->CCDD]->result() as $uv){			
					for($x=1; $x<=6; $x++){
							$a = 'S9_18_' . $x;
							if(!is_null($uv->$a) && $uv->$a == 1)
								$e1[$d->CCDD]++; 	
							elseif(!is_null($uv->$a) && $uv->$a == 2)
								$e2[$d->CCDD]++; 																
					}
				}
				$dde1 += $e1[$d->CCDD];
				$dde2 += $e2[$d->CCDD] ;		
	
				$td[$d->CCDD] = $e1[$d->CCDD] + $e2[$d->CCDD];
				$ttt += $td[$d->CCDD];
			}
			$data['e1'] = $e1;
			$data['e2'] = $e2;

			$data['te1'] = $dde1;
			$data['te2'] = $dde2;

			$data['td'] = $td;
			$data['ttt'] = $ttt;
			$data['dep'] = $dep;
			$data['nav'] = TRUE;
			$data['title'] = 'Tabulados';			
			$data['opcion'] = 96;
			$data['main_content'] = 'tabulados/pescador/reporte96_view';
			$prete = $this->tabulados_model->get_texto(1,$data['opcion']);
			$texto = '';
			if($prete->num_rows() > 0){
				$texto = $prete->row()->texto;
			}
			$data['texto'] =  $texto; 				
			$this->load->view('backend/includes/template', $data);		
	}


	public function reporte97()
	{
			$u_id = $this->tank_auth->get_user_id();
			$data['restriccion'] = ( ($u_id == 259) || ($u_id == 266) || ($u_id == 269) ) ? FALSE : TRUE ;
			$dep = $this->tabulados_model->get_dptos();
			$vr = null;
			$td = null;
			$ttt = 0;
			$dde1 = 0;
			$dde2 = 0;
			$dde3 = 0;
			$dde4 = 0;

			$e1 = null;
			$e2 = null;		
			$e3 = null;		
			$e4 = null;			
			foreach($dep->result() as $d){
				$vr[$d->CCDD] = $this->tabulados_model->get_report97($d->CCDD);	
				$e1[$d->CCDD] = 0;				
				$e2[$d->CCDD] = 0;				
				$e3[$d->CCDD] = 0;				
				$e4[$d->CCDD] = 0;													
				foreach($vr[$d->CCDD]->result() as $uv){			
					for($x=1; $x<=6; $x++){
							$a = 'S9_20_' . $x . '_T';
							if(!is_null($uv->$a) && $uv->$a == 1)
								$e1[$d->CCDD]++; 	
							elseif(!is_null($uv->$a) && $uv->$a == 2)
								$e2[$d->CCDD]++; 
							elseif(!is_null($uv->$a) && $uv->$a == 3)
								$e3[$d->CCDD]++; 																	
							elseif(!is_null($uv->$a) && $uv->$a == 4)
								$e4[$d->CCDD]++; 																														
					}
				}
				$dde1 += $e1[$d->CCDD];
				$dde2 += $e2[$d->CCDD] ;		
				$dde3 += $e3[$d->CCDD] ;		
				$dde4 += $e4[$d->CCDD] ;				
				$td[$d->CCDD] = $e1[$d->CCDD] + $e2[$d->CCDD] + $e3[$d->CCDD] + $e4[$d->CCDD];
				$ttt += $td[$d->CCDD];
			}
			$data['e1'] = $e1;
			$data['e2'] = $e2;
			$data['e3'] = $e3;
			$data['e4'] = $e4;

			$data['te1'] = $dde1;
			$data['te2'] = $dde2;
			$data['te3'] = $dde3;
			$data['te4'] = $dde4;

			$data['td'] = $td;
			$data['ttt'] = $ttt;
			$data['dep'] = $dep;
			$data['nav'] = TRUE;
			$data['title'] = 'Tabulados';			
			$data['opcion'] = 97;
			$data['main_content'] = 'tabulados/pescador/reporte97_view';
			$prete = $this->tabulados_model->get_texto(1,$data['opcion']);
			$texto = '';
			if($prete->num_rows() > 0){
				$texto = $prete->row()->texto;
			}
			$data['texto'] =  $texto; 				
			$this->load->view('backend/includes/template', $data);		
	}


	public function reporte98()
	{
			$u_id = $this->tank_auth->get_user_id();
			$data['restriccion'] = ( ($u_id == 259) || ($u_id == 266) || ($u_id == 269) ) ? FALSE : TRUE ;
			$dep = $this->tabulados_model->get_dptos();
			$vr = null;
			$td = null;
			$ttt = 0;
			$dde1 = 0;
			$dde2 = 0;

			$e1 = null;
			$e2 = null;		

			foreach($dep->result() as $d){
				$vr[$d->CCDD] = $this->tabulados_model->get_report98($d->CCDD);	
				$e1[$d->CCDD] = 0;				
				$e2[$d->CCDD] = 0;				
										
				foreach($vr[$d->CCDD]->result() as $uv){			
					for($x=1; $x<=6; $x++){
							$a = 'S9_21_' . $x;
							if(!is_null($uv->$a) && $uv->$a == 1)
								$e1[$d->CCDD]++; 	
							elseif(!is_null($uv->$a) && $uv->$a == 2)
								$e2[$d->CCDD]++; 																
					}
				}
				$dde1 += $e1[$d->CCDD];
				$dde2 += $e2[$d->CCDD] ;		
	
				$td[$d->CCDD] = $e1[$d->CCDD] + $e2[$d->CCDD];
				$ttt += $td[$d->CCDD];
			}
			$data['e1'] = $e1;
			$data['e2'] = $e2;

			$data['te1'] = $dde1;
			$data['te2'] = $dde2;

			$data['td'] = $td;
			$data['ttt'] = $ttt;
			$data['dep'] = $dep;
			$data['nav'] = TRUE;
			$data['title'] = 'Tabulados';			
			$data['opcion'] = 98;
			$data['main_content'] = 'tabulados/pescador/reporte98_view';
			$prete = $this->tabulados_model->get_texto(1,$data['opcion']);
			$texto = '';
			if($prete->num_rows() > 0){
				$texto = $prete->row()->texto;
			}
			$data['texto'] =  $texto; 				
			$this->load->view('backend/includes/template', $data);		
	}


	public function reporte99()
	{
			$u_id = $this->tank_auth->get_user_id();
			$data['restriccion'] = ( ($u_id == 259) || ($u_id == 266) || ($u_id == 269) ) ? FALSE : TRUE ;
			$dep = $this->tabulados_model->get_dptos();
			$vr = null;
			$td = null;
			$ttt = 0;
			$dde1 = 0;
			$dde2 = 0;
			$dde3 = 0;

			$e1 = null;
			$e2 = null;		
			$e3 = null;				
			foreach($dep->result() as $d){
				$vr[$d->CCDD] = $this->tabulados_model->get_report99($d->CCDD);	
				$e1[$d->CCDD] = 0;				
				$e2[$d->CCDD] = 0;				
				$e3[$d->CCDD] = 0;													
				foreach($vr[$d->CCDD]->result() as $uv){			
					for($x=1; $x<=6; $x++){
							$a = 'S9_23_' . $x;
							if(!is_null($uv->$a) && $uv->$a == 1)
								$e1[$d->CCDD]++; 	
							elseif(!is_null($uv->$a) && $uv->$a == 2)
								$e2[$d->CCDD]++; 
							elseif(!is_null($uv->$a) && $uv->$a == 3)
								$e3[$d->CCDD]++; 																																													
					}
				}
				$dde1 += $e1[$d->CCDD];
				$dde2 += $e2[$d->CCDD] ;		
				$dde3 += $e3[$d->CCDD] ;					
				$td[$d->CCDD] = $e1[$d->CCDD] + $e2[$d->CCDD] + $e3[$d->CCDD];
				$ttt += $td[$d->CCDD];
			}
			$data['e1'] = $e1;
			$data['e2'] = $e2;
			$data['e3'] = $e3;

			$data['te1'] = $dde1;
			$data['te2'] = $dde2;
			$data['te3'] = $dde3;

			$data['td'] = $td;
			$data['ttt'] = $ttt;
			$data['dep'] = $dep;
			$data['nav'] = TRUE;
			$data['title'] = 'Tabulados';			
			$data['opcion'] = 99;
			$data['main_content'] = 'tabulados/pescador/reporte99_view';
			$prete = $this->tabulados_model->get_texto(1,$data['opcion']);
			$texto = '';
			if($prete->num_rows() > 0){
				$texto = $prete->row()->texto;
			}
			$data['texto'] =  $texto; 				
			$this->load->view('backend/includes/template', $data);		
	}


}

