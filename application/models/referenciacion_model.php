<?php 
/**
* 
*/
class Referenciacion_model extends CI_MODEL
{

	function get_pes_acu_by_dep()
	{
		$q = $this->db->query("
					select  DEP.CCDD, DEPARTAMENTO, ( coalesce(c1.t,0) + coalesce(c2.t,0) + coalesce( C3.t,0)) TOTAL,  coalesce(c1.t,0) PESCADOR, (coalesce(c2.t,0) -  coalesce(C3.t,0) ) ACUICULTOR, coalesce(C3.t,0) AMBOS 
			        from (select  distinct(departamento), ccdd from marco order by departamento) as DEP
			        left join (select ccdd, count(*) as t from pescador p inner join  pesc_info s on p.id = s.pescador_id where  tac=1 and res!=3 group by ccdd) as C1 on DEP.ccdd = C1.ccdd
			        left join (select ccdd, count(*) as t from acu_seccion1 group by ccdd) as C2  on DEP.ccdd = C2.ccdd     
			        left join (select ccdd, count(*) as t from pescador p inner join  pesc_info s on p.id = s.pescador_id where  tac=3 and res!=3 group by ccdd) as C3 on DEP.ccdd = C3.ccdd;
			");
		return $q;
	}

	function get_pes_acu_by_prov($dep)
	{
		$q = $this->db->query("
					select  DEP.CCDD, DEPARTAMENTO, DEP.CCPP, PROVINCIA ,  ( coalesce(c1.t,0) + coalesce(c2.t,0) + coalesce( C3.t,0)) TOTAL,  coalesce(c1.t,0) PESCADOR, (coalesce(c2.t,0) -  coalesce(C3.t,0) ) ACUICULTOR, coalesce(C3.t,0) AMBOS 
			        from (select  ccdd, departamento, ccpp, provincia from marco group by ccdd, ccpp order by ccdd, ccpp) as DEP
			        left join (select ccdd,ccpp, count(*) as t from pescador p inner join  pesc_info s on p.id = s.pescador_id where  tac=1 and res!=3 group by ccdd, ccpp) as C1 on DEP.ccdd = C1.ccdd and DEP.ccpp COLLATE utf8_unicode_ci  = C1.ccpp 
			        left join (select ccdd,ccpp, count(*) as t from acu_seccion1 group by ccdd, ccpp) as C2  on DEP.ccdd = C2.ccdd and DEP.ccpp = C2.ccpp  
			        left join (select ccdd,ccpp, count(*) as t from pescador p inner join  pesc_info s on p.id = s.pescador_id where  tac=3 and res!=3 group by ccdd, ccpp) as C3 on DEP.ccdd = C3.ccdd and  DEP.ccpp COLLATE utf8_unicode_ci = C3.ccpp 
			        WHERE DEP.CCDD ='".$dep."';
			");
		return $q;
	}
	function get_pes_acu_by_dist($dep, $prov)
	{
		$q = $this->db->query("
					select  DEP.CCDD, DEPARTAMENTO, DEP.CCPP, PROVINCIA , DEP. CCDI, DISTRITO, ( coalesce(c1.t,0) + coalesce(c2.t,0) + coalesce( C3.t,0)) TOTAL,  coalesce(c1.t,0) PESCADOR, (coalesce(c2.t,0) -  coalesce(C3.t,0) ) ACUICULTOR, coalesce(C3.t,0) AMBOS 
			        from (select  ccdd, departamento, ccpp, provincia,ccdi, distrito from marco group by ccdd, ccpp,ccdi order by ccdd, ccpp,ccdi) as DEP
			        left join (select ccdd,ccpp,ccdi, count(*) as t from pescador p inner join  pesc_info s on p.id = s.pescador_id where  tac=1 and res!=3 group by ccdd, ccpp,ccdi) as C1 on DEP.ccdd = C1.ccdd and DEP.ccpp COLLATE utf8_unicode_ci  = C1.ccpp and DEP.ccdi COLLATE utf8_unicode_ci  = C1.ccdi 
			        left join (select ccdd,ccpp,ccdi, count(*) as t from acu_seccion1 group by ccdd, ccpp,ccdi) as C2  on DEP.ccdd = C2.ccdd and DEP.ccpp = C2.ccpp  and DEP.ccdi = C2.ccdi
			        left join (select ccdd,ccpp,ccdi, count(*) as t from pescador p inner join  pesc_info s on p.id = s.pescador_id where  tac=3 and res!=3 group by ccdd, ccpp,ccdi) as C3 on DEP.ccdd = C3.ccdd and  DEP.ccpp COLLATE utf8_unicode_ci = C3.ccpp and DEP.ccdi COLLATE utf8_unicode_ci  = C3.ccdi  
					WHERE DEP.CCDD ='".$dep."' and DEP.CCPP = '". $prov ."'  ;
			");
		return $q;
	}

	function get_pes_acu_by_ccpp($dep, $prov, $dist)
	{
		$q = $this->db->query("
					select  DEP.CCDD, DEPARTAMENTO, DEP.CCPP, PROVINCIA , DEP. CCDI, DISTRITO, DEP.CODCCPP, CENTRO_POBLADO, ( coalesce(c1.t,0) + coalesce(c2.t,0) + coalesce( C3.t,0)) TOTAL,  coalesce(c1.t,0) PESCADOR, (coalesce(c2.t,0) -  coalesce(C3.t,0) ) ACUICULTOR, coalesce(C3.t,0) AMBOS 
			        from (select  ccdd, departamento, ccpp, provincia,ccdi, distrito, codccpp, centro_poblado from marco group by ccdd, ccpp,ccdi,codccpp order by ccdd, ccpp,ccdi,codccpp) as DEP
			        left join (select ccdd,ccpp,ccdi,cod_ccpp, count(*) as t from pescador p inner join  pesc_info s on p.id = s.pescador_id where  tac=1 and res!=3 group by ccdd, ccpp,ccdi) as C1 on DEP.ccdd = C1.ccdd and DEP.ccpp COLLATE utf8_unicode_ci  = C1.ccpp and DEP.ccdi COLLATE utf8_unicode_ci  = C1.ccdi  and DEP.codccpp COLLATE utf8_unicode_ci  = C1.cod_ccpp 
			        left join (select ccdd,ccpp,ccdi,cod_ccpp, count(*) as t from acu_seccion1 group by ccdd, ccpp,ccdi,cod_ccpp) as C2  on DEP.ccdd = C2.ccdd and DEP.ccpp = C2.ccpp  and DEP.ccdi = C2.ccdi   and DEP.codccpp = C2.cod_ccpp
					left join (select ccdd,ccpp,ccdi,cod_ccpp, count(*) as t from pescador p inner join  pesc_info s on p.id = s.pescador_id where  tac=3 and res!=3 group by ccdd, ccpp,ccdi,cod_ccpp) as C3 on DEP.ccdd = C3.ccdd and  DEP.ccpp COLLATE utf8_unicode_ci = C3.ccpp and DEP.ccdi COLLATE utf8_unicode_ci  = C3.ccdi and DEP.codccpp COLLATE utf8_unicode_ci  = C3.cod_ccpp
					WHERE DEP.CCDD ='".$dep."' and DEP.CCPP = '". $prov ."' and DEP.CCDI = '".$dist."' 
					HAVING total>0;
			");
		return $q;
	}





}

?>