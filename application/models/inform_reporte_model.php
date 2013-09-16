<?php 
/**
* 
*/
class Inform_reporte_model extends CI_MODEL
{


	function get_deps()
	{
		$q = $this->db->query("
			select * from (
			select  ' TOTAL' as DEPARTAMENTO ,99 as ccdd
			union 
			select distinct(DEPARTAMENTO), ccdd from marco ) as op
			order by DEPARTAMENTO
			" );
		return $q;
	}


	function get_report_by_dep()
	{
		$q = $this->db->query('
			select  DEP_COD, dep, P14 as TFORM, (sum(P18) + sum(P19) + sum(P20) + sum(P21)+sum(P22)) AS TOTAL,
			sum(P18) as CONCEP, sum(P19) as DILIG, sum(P20) as PREG, sum(P21) as SONDEO, sum(P22)  as OMISION from supervision_form f inner join supervision_error e on f.id = e.supervision_form_id
			group by dep, P14 ORDER BY dep, TFORM;
			');
		return $q;
	}


	function get_report_by_sec()
	{
		$q = $this->db->query('
			select P14 as TFORM, P16 as SECCION, (sum(P18) + sum(P19) + sum(P20) + sum(P21)+sum(P22)) AS TOTAL,
			sum(P18) as CONCEP, sum(P19) as DILIG, sum(P20) as PREG, sum(P21) as SONDEO, sum(P22)  as OMISION from supervision_error  where P14= 14 group by p14,p16 
			UNION 
			select P14 as TFORM, P16 as SECCION, (sum(P18) + sum(P19) + sum(P20) + sum(P21)+sum(P22)) AS TOTAL,
			sum(P18) as CONCEP, sum(P19) as DILIG, sum(P20) as PREG, sum(P21) as SONDEO, sum(P22)  as OMISION from supervision_error  where P14= 12 group by p14,p16 
			UNION
			select P14 as TFORM, P16 as SECCION, (sum(P18) + sum(P19) + sum(P20) + sum(P21)+sum(P22)) AS TOTAL,
			sum(P18) as CONCEP, sum(P19) as DILIG, sum(P20) as PREG, sum(P21) as SONDEO, sum(P22)  as OMISION from supervision_error  where P14= 13 group by p14,p16 
			');
		return $q;
	}

	function get_report_com_by_preg() // comunidades (14)
	{
		$q = $this->db->query('
			select P14 as TFORM, P16 as SECCION, P17 as PREGUNTA,  (sum(P18) + sum(P19) + sum(P20) + sum(P21)+sum(P22)) AS TOTAL,
			sum(P18) as CONCEP, sum(P19) as DILIG, sum(P20) as PREG, sum(P21) as SONDEO, sum(P22)  as OMISION from supervision_error  where P14= 14 group by p14,p16,p17;
			');
		return $q;
	}


	function get_report_pes_by_preg()  // pescador (12)
	{
		$q = $this->db->query('
			select P14 as TFORM, P16 as SECCION, P17 as PREGUNTA,  (sum(P18) + sum(P19) + sum(P20) + sum(P21)+sum(P22)) AS TOTAL,
			sum(P18) as CONCEP, sum(P19) as DILIG, sum(P20) as PREG, sum(P21) as SONDEO, sum(P22)  as OMISION from supervision_error  where P14= 12 group by p14,p16,p17;
			');
		return $q;
	}

	function get_report_acui_by_preg() // acuicultor (13)
	{
		$q = $this->db->query('
			select P14 as TFORM, P16 as SECCION, P17 as PREGUNTA,  (sum(P18) + sum(P19) + sum(P20) + sum(P21)+sum(P22)) AS TOTAL,
			sum(P18) as CONCEP, sum(P19) as DILIG, sum(P20) as PREG, sum(P21) as SONDEO, sum(P22)  as OMISION from supervision_error  where P14= 13 group by p14,p16,p17;
			');
		return $q;
	}


}

