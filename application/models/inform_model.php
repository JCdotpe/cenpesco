<?php 
/**
* 
*/
class Inform_model extends CI_MODEL
{


	function consulta()
	{
		$this->db->where('INF_N',$a);
		$this->db->where('DNI_SUP',$b);
		$this->db->where('ODEI_COD',$c);
		$this->db->where('DEP_COD',$d);
		$this->db->where('PROV_COD',$d);
		$this->db->where('DIST_COD',$d);
		$this->db->where('CCPPCOD',$d);
		$q = $this->db->get('supervision_form');
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


}

