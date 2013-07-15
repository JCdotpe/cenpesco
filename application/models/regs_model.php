<?php
class Regs_model extends CI_Model{

    function insert_reg($data){
		$this->db->insert('regs', $data);
  //       $flag = 0;
		// if($this->db->affected_rows() > 0)
  //           $flag = $this->db->insert_id();
  //       return $flag;
        return $this->db->affected_rows() > 0;
    }    

  //   function get_regs(){
  //   	$q = $this->db->get('regs');
		// return $q;
  //   }   

    function get_fields_regs(){
        $q = $this->db->list_fields('regs');
        return $q;
    }

    //En el formulario de registro
    function check_dni($dni){
    	$this->db->where('dni',$dni);
        // $this->db->where('estado',1);
        // $this->db->where('activo',1);        
    	$q = $this->db->get('regs');
		return $q->num_rows();
    }   

    //Modulo de consulta
    function consulta_dni($dni){
        $this->db->select('estado');
        $this->db->select('cargo');
        $this->db->where('dni',$dni);
        $this->db->where('activo',1);        
        $q = $this->db->get('regs');
        return $q;
    }

    function get_regs($st){
        $this->db->select('*');
        $this->db->select('regs.id as myid');
        $this->db->select('u.detalle as unidesc');
        $this->db->join('cargo_funcional cf','regs.cargos_inei = cf.COD','left');
        $this->db->join('proyectos_inei pi','regs.proyectos_inei = pi.SECU_FUNC_SFU','left');
        $this->db->join('universidades u','regs.universidad = u.id','left');
        $this->db->join('ocupacion o','regs.ocupacion = o.codigo','left');
        if($st!=0)
        $this->db->where('estado',$st);
        $this->db->where('activo',1);
        $q = $this->db->get('regs');
        return $q;
    }  

    function get_regs_by_dep($dep,$st){
        $this->db->select('*');
        $this->db->select('regs.id as myid');
        $this->db->select('u.detalle as unidesc');
        // $this->db->where('cod_dist',$dist);
        // $this->db->where('cod_prov',$prov);
        $this->db->where('cod_dep',$dep);
        $this->db->join('cargo_funcional cf','regs.cargos_inei = cf.COD','left');
        $this->db->join('proyectos_inei pi','regs.proyectos_inei = pi.SECU_FUNC_SFU','left');
        $this->db->join('universidades u','regs.universidad = u.id','left');
        $this->db->join('ocupacion o','regs.ocupacion = o.codigo','left');
        if($st!=0)
        $this->db->where('regs.estado',$st);
        $this->db->where('regs.activo',1);
        $q = $this->db->get('regs');
        return $q;
    }      

    function get_nro_regs_by_dep($dep,$st,$cargo = null){
        $this->db->select('COUNT(id) as numero');
        if($dep != -1)
        $this->db->where('cod_odei',$dep);
        if($st != 0)
        $this->db->where('estado',$st);
        if(!is_null($cargo))
        $this->db->where('cargo',$cargo);   
        $this->db->where('activo',1);
        $q = $this->db->get('regs');
        return $q;
    }      

    function cambio_estado($id,$st,$oldst){
        $this->db->set('estado', $st);
        $this->db->where('id', $id);
        $this->db->where('estado', $oldst);
        $this->db->update('regs');
        return $this->db->affected_rows() > 0;  
    } 

     function get_regs_by_state($dep){
        $this->db->select('dni');
        $this->db->select('ap_paterno');
        $this->db->select('ap_materno');
        $this->db->select('nombre1');
        $this->db->select('nombre2');
        $this->db->select('ap_paterno');
        $this->db->select('estado');
        $this->db->where('cod_dep',$dep);
        $this->db->where('activo',1);
        $this->db->order_by('estado','desc');
        $this->db->order_by('order_n','asc');
        $q = $this->db->get('regs');
        return $q;
    }   
     function get_regs_by_state_odei($dep){
        $this->db->select('dni');
        $this->db->select('UPPER(ap_paterno) as ap_paterno');
        $this->db->select('UPPER(ap_materno) as ap_materno');
        $this->db->select('UPPER(nombre1) as nombre1');
        $this->db->select('UPPER(nombre2) as nombre2');
        // $this->db->select('ap_paterno');
        $this->db->select('estado');
        $this->db->where('cod_odei',$dep);
        $this->db->where('activo',1);
        $this->db->order_by('estado','desc');
        $this->db->order_by('order_n','asc');
        $q = $this->db->get('regs');
        return $q;
    }  
    function validate_file_download($id){
        $this->db->select('cv');
        $this->db->where('id',$id);
        $q = $this->db->get('regs');
        return $q;       
    }


 }