<?php 
/**
* 
*/
class Inform_model extends CI_MODEL
{


	function consulta($a,$b,$c,$d,$e,$f,$g)
	{
		$this->db->where('INF_N',$a);
		$this->db->where('DNI_SUP',$b);
		$this->db->where('ODEI_COD',$c);
		$this->db->where('DEP_COD',$d);
		$this->db->where('PROV_COD',$e);
		$this->db->where('DIST_COD',$f);
		$this->db->where('CCPPCOD',$g);
		$this->db->where('active',1);
		$q = $this->db->get('supervision_form');
		return $q;
	}

	function inserta($d)
	{
    	$q = $this->db->insert('supervision_form', $d);
		return $this->db->affected_rows() > 0;
	}

	function actualiza($i,$d)
	{
        $this->db->where('id',$i);
        $this->db->update('supervision_form', $d);
		return $this->db->affected_rows();
	}

	function inserta_error($d)
	{
    	$q = $this->db->insert('supervision_error', $d);
		return $this->db->affected_rows() > 0;
	}

	function actualiza_error($i,$d)
	{
        $this->db->where('id',$i);
        $this->db->update('supervision_error', $d);
		return $this->db->affected_rows();
	}

    function get_fields(){
        $q = $this->db->list_fields('supervision_form');
        return $q;
    }   



	function get_errors($i)
	{
		$this->db->where('supervision_form_id',$i);
		$this->db->where('active',1);
		$q = $this->db->get('supervision_error');
		return $q;
	}


	function get_isup($a,$b,$c,$d,$e)
	{
		$this->db->where('ODEI_COD',$a);
		$this->db->where('DEP_COD',$b);
		$this->db->where('PROV_COD',$c);
		$this->db->where('DI_COD',$d);
		$this->db->where('CCPPCOD',$e);		
		$q = $this->db->get('isupervision');
		return $q;
	}


	function get_odei()
	{
		$this->db->select('distinct(ODEI_COD) as odei_cod, ODEI as nombre');
		$this->db->order_by('ODEI','asc');
		$q = $this->db->get('isupervision');
		return $q;
	}

	function get_dep($s)
	{
		$this->db->select('distinct(DEP_COD) as dep_cod, DEPARTAMENTO as nombre');
		$this->db->where('ODEI_COD',$s);
		$this->db->order_by('DEPARTAMENTO','asc');
		$q = $this->db->get('isupervision');
		return $q;
	}

	function get_prov($s,$t)
	{
		$this->db->select('distinct(PROV_COD) as prov_cod, PROVINCIA as nombre');
		$this->db->where('ODEI_COD',$s);
		$this->db->where('DEP_COD',$t);
		$this->db->order_by('PROVINCIA','asc');
		$q = $this->db->get('isupervision');
		return $q;
	}

	function get_dist($s,$t,$u)
	{
		$this->db->select('distinct(DI_COD) as di_cod, DISTRITO as nombre');
		$this->db->where('ODEI_COD',$s);
		$this->db->where('DEP_COD',$t);
		$this->db->where('PROV_COD',$u);
		$this->db->order_by('DISTRITO','asc');
		$q = $this->db->get('isupervision');
		return $q;
	}

	function get_ccpp($s,$t,$u,$v)
	{
		$this->db->select('distinct(CCPPCOD) as ccpp_cod, CCPP as nombre');
		$this->db->where('ODEI_COD',$s);
		$this->db->where('DEP_COD',$t);
		$this->db->where('PROV_COD',$u);
		$this->db->where('DI_COD',$v);
		$this->db->order_by('CCPP','asc');
		$q = $this->db->get('isupervision');
		return $q;
	}


	function get_a()
	{
		$this->db->select('class as val, text as nombre');
		$this->db->where_in('class',array('12','13','14'));
		$this->db->where('object',0);
		$this->db->where('feature',0);
		$this->db->order_by('text','asc');
		$q = $this->db->get('class');
		return $q;
	}

	function get_b($c)
	{
		$this->db->select('object as val, text as nombre');
		$this->db->where('class',$c);
		$this->db->where('feature',0);
		$this->db->where('active',1);
		$this->db->order_by('order_n','asc');
		$q = $this->db->get('class');
		return $q;
	}	

	function get_c($c,$d)
	{
		$this->db->select('feature as val, text as nombre');
		$this->db->where('class',$c);
		$this->db->where('object',$d);
		$this->db->where('feature !=',0);
		$this->db->where('active',1);
		// $this->db->order_by('order_n','asc');
		$q = $this->db->get('class');
		return $q;
	}	





function get_print(){
       $q = $this->db->query('
SELECT
`supervision_form`.`id`,
`supervision_form`.`INF_N`,
`supervision_form`.`N_SUP`,
`supervision_form`.`DNI_SUP`,
`supervision_form`.`F_DIA`,
`supervision_form`.`F_MES`,
`supervision_form`.`ODEI`,
`supervision_form`.`ODEI_COD`,
`supervision_form`.`DEP`,
`supervision_form`.`DEP_COD`,
`supervision_form`.`PROV`,
`supervision_form`.`PROV_COD`,
`supervision_form`.`DIST`,
`supervision_form`.`DIST_COD`,
`supervision_form`.`CCPP`,
`supervision_form`.`CCPPCOD`,
`supervision_form`.`P1`,
`supervision_form`.`P2`,
`supervision_form`.`P3`,
`supervision_form`.`P4`,
`supervision_form`.`P5`,
`supervision_form`.`P6`,
`supervision_form`.`P7`,
`supervision_form`.`P8`,
`supervision_form`.`P9`,
`supervision_form`.`P10`,
`supervision_form`.`P11`,
`supervision_form`.`P12`,
`supervision_form`.`P13`,
`supervision_form`.`OBS_1`,
`supervision_form`.`active`,
`supervision_form`.`user_id`,
`supervision_form`.`last_ip`,
`supervision_form`.`user_agent`,
`supervision_form`.`created`,
`supervision_form`.`modified`
FROM `cenpesco`.`supervision_form`
WHERE active = 1;
');
       return $q; 
}

function get_print_error(){
       $q = $this->db->query('
SELECT
`supervision_error`.`id`,
`supervision_error`.`supervision_form_id`,
`supervision_error`.`P14`,
`supervision_error`.`P15`,
`supervision_error`.`P16`,
`supervision_error`.`P17`,
`supervision_error`.`P18`,
`supervision_error`.`P19`,
`supervision_error`.`P20`,
`supervision_error`.`P21`,
`supervision_error`.`P22`,
`supervision_error`.`OBS_2`,
`supervision_error`.`active`
FROM `cenpesco`.`supervision_error`
WHERE active = 1;
');
       return $q; 
}







}

