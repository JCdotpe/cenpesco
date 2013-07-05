<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Seleccion extends CI_Controller {

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
			if($role->role_id == 1 && $role->rolename == 'Convocatoria'){
				$flag = TRUE;
				break;
			}
		}

		//If not author is the maintenance guy!
		if (!$flag) {
			show_404();
			die();
		}
		$this->load->model('cargos_model');
		$this->load->model('ocupacion_model');
		//$this->load->model('pais_model');
		$this->load->model('universidades_model');
		$this->load->model('proyectos_inei_model');			
		$this->load->model('regs_model');
		$this->load->model('ubigeo_model');	
		$this->load->model('pea_model');
	}


	public function index(){
			$data['option'] = 3;
			$data['nav'] = TRUE;
			// $data['fluid'] = TRUE;
			$data['title'] = 'Convocatoria';
			// $data['departamento']=$this->ubigeo_model->get_dptos();
			$data['regs'] = $this->regs_model->get_regs(1);
			$data['odeis']=$this->ubigeo_model->get_odeis();
			$data['pea'] = $this->pea_model->get_pea();
			$data['totalregs'] = $this->regs_model->get_nro_regs_by_dep(0,0)->row()->numero;
			$data['totalcap'] = $this->regs_model->get_nro_regs_by_dep(-1,2)->row()->numero;
			$data['peatotal'] = $this->pea_model->num_pea_capacitar();
			//$data['f_regs'] = $this->regs_model->get_fields_regs();
			$data['ecivil'] = $this->config->item('c_ecivil');
			$data['cargos'] = $this->config->item('c_cargos');
			$data['nivel'] = $this->config->item('c_nivel');
			$data['grado']= $this->config->item('c_grado');
			$data['tvia'] = $this->config->item('c_tvia');
			$data['tzona'] = $this->config->item('c_tzona');
			$data['sino'] = $this->config->item('c_sino');
			$data['periodo'] = $this->config->item('c_periodo');	
			$data['ocupacion']=$this->ocupacion_model->select_ocupa();
			$data['universidad']=$this->universidades_model->select_uni();
			$data['proyectos']=$this->proyectos_inei_model->select_proj();
			$data['cargos_f']=$this->cargos_model->select_cargo();
			

			//$data['main_content'] = 'convocatoria/vista_view';
			
			$data['main_content'] = 'convocatoria/seleccion_view';
	        $this->load->view('backend/includes/template', $data);		
	}


	public function getTable()
    {
        /* Array of database columns which should be read and sent back to DataTables. Use a space where
         * you want to insert a non-database field (for example a counter or static image)
         */
        $aColumns = array('id', 'id', 'dni', 'nom_dep','nom_odei', 'cargo', 'id', 'nombre1', 'nombre2', 'ap_paterno', 'ap_materno', 'sexo', 'nom_dep_nac', 'nom_prov_nac', 'nom_dist_nac', 'fecha_nac', 'ruc', 'estado_civil', 'nro_tel', 'nro_cel', 'email', 'nom_dep_dom', 'nom_prov_dom', 'nom_dist_dom', 't_via', 'nombre_via', 'nro', 'km', 'mz', 'lote', 'interior', 'dpto', 'piso', 't_zona', 'nombre_zona', 'nivel_instruccion', 'grado_alcanzado', 'periodo_alcanzado', 't_periodo', 'ocupacion', 'universidad', 'centro_estudios', 'expe_gen_a', 'expe_gen_m', 'expe_trab_a', 'expe_trab_m', 'expe_manejo_a', 'expe_manejo_m', 'ofimatica', 'velocidadpc', 'participo', 'ultimo_ano', 'proyectos_inei', 'cargos_inei', 'impedimento', 'disposicion', 'ipclient', 'useragent','estado', 'activo');
        
        // DB table to use
        $sTable = 'regs';
        //
    
        $iDisplayStart = $this->input->get_post('iDisplayStart', true);
        $iDisplayLength = $this->input->get_post('iDisplayLength', true);
        $iSortCol_0 = $this->input->get_post('iSortCol_0', true);
        $iSortingCols = $this->input->get_post('iSortingCols', true);
        $sSearch = $this->input->get_post('sSearch', true);
        $sEcho = $this->input->get_post('sEcho', true);
        $dep = $this->input->get_post('dep', true);
    
        // Paging
        if(isset($iDisplayStart) && $iDisplayLength != '-1')
        {
            $this->db->limit($this->db->escape_str($iDisplayLength), $this->db->escape_str($iDisplayStart));
        }
        
        // Ordering
        if(isset($iSortCol_0))
        {
            for($i=0; $i<intval($iSortingCols); $i++)
            {
                $iSortCol = $this->input->get_post('iSortCol_'.$i, true);
                $bSortable = $this->input->get_post('bSortable_'.intval($iSortCol), true);
                $sSortDir = $this->input->get_post('sSortDir_'.$i, true);
    
                if($bSortable == 'true')
                {
                    $this->db->order_by($aColumns[intval($this->db->escape_str($iSortCol))], $this->db->escape_str($sSortDir));
                }
            }
        }
        
        /* 
         * Filtering
         * NOTE this does not match the built-in DataTables filtering which does it
         * word by word on any field. It's possible to do here, but concerned about efficiency
         * on very large tables, and MySQL's regex functionality is very limited
         */
        if(isset($sSearch) && !empty($sSearch))
        {
            for($i=0; $i<count($aColumns); $i++)
            {
                $bSearchable = $this->input->get_post('bSearchable_'.$i, true);
                
                // Individual column filtering
                if(isset($bSearchable) && $bSearchable == 'true')
                {
                    $this->db->or_like($aColumns[$i], $this->db->escape_like_str($sSearch));
                }
            }
        }
        
        // Select Data
        $this->db->select('SQL_CALC_FOUND_ROWS '.str_replace(' , ', ' ', implode(', ', $aColumns)), false);
   		if(isset($dep) && $dep != -1) {
 			$this->db->where('cod_odei',$dep);		
 		}        
 		$this->db->where('activo',1);
 		$this->db->where('estado',1);	
        $rResult = $this->db->get($sTable);

        // Data set length after filtering
        $this->db->select('FOUND_ROWS() AS found_rows');
        $iFilteredTotal = $this->db->get()->row()->found_rows;
    
        // Total data set length
        $iTotal = $this->db->count_all($sTable);
    
        // Output
        $output = array(
            'sEcho' => intval($sEcho),
            'iTotalRecords' => $iTotal,
            'iTotalDisplayRecords' => $iFilteredTotal,
            'aaData' => array()
        );
        
        foreach($rResult->result_array() as $aRow)
        {
            $row = array();
            
            foreach($aColumns as $col)
            {
                $row[] = $aRow[$col];
            }
    
            $output['aaData'][] = $row;
        }
    
    	$data['datos'] = $output;
    	$this->load->view('backend/json/json_view', $data);
    }



	public function get_nro_capacitando()
	{
		$is_ajax = $this->input->post('ajax');
		$cod_dep = $this->input->post('cod_dep');
		$datos = null;
		if($is_ajax){
			$datos['nrocap'] = $this->regs_model->get_nro_regs_by_dep($cod_dep,2)->row()->numero;
			$datos['nroins'] = $this->regs_model->get_nro_regs_by_dep($cod_dep,0)->row()->numero;			
			$data['datos'] = $datos;
			$this->load->view('backend/json/json_view', $data);	
		}else{
			show_404();;
		}
	}		


	public function capacitar_pers()
	{
		$inscrito = 1;
		$acapacitar = 2;
		$is_ajax = $this->input->post('ajax');
		$cod_dep = $this->input->post('cod_dep');
		$pers = $this->input->post('pers');
		$datos = null;
		$flag = true;
		if($is_ajax){
			$ps = json_decode($pers);
			foreach ($ps as &$valor) {
			     $vfl = $this->regs_model->cambio_estado($valor,$acapacitar,$inscrito);
			     if(!$vfl){
			     	$flag = false;
			     	$msg = $valor . ' - ';
			     }
			}		

			$datos['msg'] = 'Se ha realizado la seleccion con éxito.';
			$datos['flag'] = $flag;

			$data['datos'] = $datos;
			$this->load->view('backend/json/json_view', $data);	
		}else{
			show_404();;
		}
	}	


	public function edit()
	{
		$code = $this->input->post('code');
		$attr = $this->input->post('columnname');
		$newval = $this->input->post('value');
		$this->seguimiento_adm_model->update($code, $attr, $newval);
	}

	public function get_regs()
	{
		$is_ajax = $this->input->post('ajax');
		if($is_ajax){
			$data['datos'] = $this->regs_model->get_regs(1)->result();
			$this->load->view('backend/json/json_view', $data);	
		}else{
			show_404();;
		}
	}


	public function get_regs_by_dist()
	{
		$is_ajax = $this->input->post('ajax');
		// $cod_dist = $this->input->post('cod_dist');
		// $cod_prov = $this->input->post('cod_prov');
		$cod_dep = $this->input->post('cod_dep');
		if($is_ajax){
			//$data['datos'] = $this->regs_model->get_regs_by_dist($cod_dep,$cod_prov, $cod_dist)->result();
			$data['datos'] = $this->regs_model->get_regs_by_dep($cod_dep,1)->result();
			$this->load->view('backend/json/json_view', $data);	
		}else{
			show_404();;
		}
	}	
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */