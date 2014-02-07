<?php 
/**
* 
*/
class Referenciacion_model extends CI_MODEL
{

	function get_pes_acu_by_dep()
	{
		$q = $this->db->query("
					select  DEP.CCDD, DEPARTAMENTO, ( coalesce(C1.t,0) + coalesce(C2.t,0) + coalesce( C3.t,0)) TOTAL,  coalesce(C1.t,0) PESCADOR, (coalesce(C2.t,0) -  coalesce(C3.t,0) ) ACUICULTOR, coalesce(C3.t,0) AMBOS 
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
					select  DEP.CCDD, DEPARTAMENTO, DEP.CCPP, PROVINCIA ,  ( coalesce(C1.t,0) + coalesce(C2.t,0) + coalesce( C3.t,0)) TOTAL,  coalesce(C1.t,0) PESCADOR, (coalesce(C2.t,0) -  coalesce(C3.t,0) ) ACUICULTOR, coalesce(C3.t,0) AMBOS 
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
					select  DEP.CCDD, DEPARTAMENTO, DEP.CCPP, PROVINCIA , DEP. CCDI, DISTRITO, ( coalesce(C1.t,0) + coalesce(C2.t,0) + coalesce( C3.t,0)) TOTAL,  coalesce(C1.t,0) PESCADOR, (coalesce(C2.t,0) -  coalesce(C3.t,0) ) ACUICULTOR, coalesce(C3.t,0) AMBOS 
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
					select  DEP.CCDD, DEPARTAMENTO, DEP.CCPP, PROVINCIA , DEP. CCDI, DISTRITO, DEP.CODCCPP, CENTRO_POBLADO, ( coalesce(C1.t,0) + coalesce(C2.t,0) + coalesce( C3.t,0)) TOTAL,  coalesce(C1.t,0) PESCADOR, (coalesce(C2.t,0) -  coalesce(C3.t,0) ) ACUICULTOR, coalesce(C3.t,0) AMBOS,
					t1_h,t1_m,t2_h,t2_m, t3_h,t3_m,t4_h, t4_m,t5_h,t5_m,t6_h,t6_m,t7_h, t7_m,t8_h,t8_m,t9_h,t9_m,total_h,total_m
			        from (select  ccdd, departamento, ccpp, provincia,ccdi, distrito, codccpp, centro_poblado from marco group by ccdd, ccpp,ccdi,codccpp order by ccdd, ccpp,ccdi,codccpp) as DEP
			        left join (select ccdd,ccpp,ccdi,cod_ccpp, count(*) as t from pescador p inner join  pesc_info s on p.id = s.pescador_id where  tac=1 and res!=3 group by ccdd, ccpp,ccdi,cod_ccpp) as C1 on DEP.ccdd = C1.ccdd and DEP.ccpp COLLATE utf8_unicode_ci  = C1.ccpp and DEP.ccdi COLLATE utf8_unicode_ci  = C1.ccdi  and DEP.codccpp COLLATE utf8_unicode_ci  = C1.cod_ccpp 
			        left join (select ccdd,ccpp,ccdi,cod_ccpp, count(*) as t from acu_seccion1 group by ccdd, ccpp,ccdi,cod_ccpp) as C2  on DEP.ccdd = C2.ccdd and DEP.ccpp = C2.ccpp  and DEP.ccdi = C2.ccdi   and DEP.codccpp = C2.cod_ccpp
					left join (select ccdd,ccpp,ccdi,cod_ccpp, count(*) as t from pescador p inner join  pesc_info s on p.id = s.pescador_id where  tac=3 and res!=3 group by ccdd, ccpp,ccdi,cod_ccpp) as C3 on DEP.ccdd = C3.ccdd and  DEP.ccpp COLLATE utf8_unicode_ci = C3.ccpp and DEP.ccdi COLLATE utf8_unicode_ci  = C3.ccdi and DEP.codccpp COLLATE utf8_unicode_ci  = C3.cod_ccpp
					left join (select *,
								(coalesce(t1_h,0) + coalesce(t2_h,0) + coalesce(t3_h,0) + coalesce(t4_h,0) + coalesce(t5_h,0) + coalesce(t6_h,0) + coalesce(t7_h,0) + coalesce(t8_h,0) + coalesce(t9_h,0)) as total_h , 
								(coalesce(t1_m,0) + coalesce(t2_m,0) + coalesce(t3_m,0) + coalesce(t4_m,0) + coalesce(t5_m,0) + coalesce(t6_m,0) + coalesce(t7_m,0) + coalesce(t8_m,0) + coalesce(t9_m,0)) as total_m
								from (select  ccdd,ccpp,ccdi,cod_ccpp,
								case when s3_21_1_1_h = 99 then null else s3_21_1_1_h end as t1_h, 
								case when s3_21_2_1_m = 99 then null else s3_21_2_1_m end as t1_m, 
								case when s3_21_1_2_h = 99 then null else s3_21_1_2_h end as t2_h, 
								case when s3_21_2_2_m = 99 then null else s3_21_2_2_m end as t2_m, 
								case when s3_21_1_3_h = 99 then null else s3_21_1_3_h end as t3_h, 
								case when s3_21_2_3_m = 99 then null else s3_21_2_3_m end as t3_m, 
								case when s3_21_1_4_h = 99 then null else s3_21_1_4_h end as t4_h, 
								case when s3_21_2_4_m = 99 then null else s3_21_2_4_m end as t4_m,
								case when s3_21_1_5_h = 99 then null else s3_21_1_5_h end as t5_h, 
								case when s3_21_2_5_m = 99 then null else s3_21_2_5_m end as t5_m,
								case when s3_21_1_6_h = 99 then null else s3_21_1_6_h end as t6_h, 
								case when s3_21_2_6_m = 99 then null else s3_21_2_6_m end as t6_m,
								case when s3_21_1_7_h = 99 then null else s3_21_1_7_h end as t7_h, 
								case when s3_21_2_7_m = 99 then null else s3_21_2_7_m end as t7_m,
								case when s3_21_1_8_h = 99 then null else s3_21_1_8_h end as t8_h, 
								case when s3_21_2_8_m = 99 then null else s3_21_2_8_m end as t8_m,
								case when s3_21_1_9_h = 99 then null else s3_21_1_9_h end as t9_h, 
								case when s3_21_2_9_m = 99 then null else s3_21_2_9_m end as t9_m
								from comunidad_seccion3 s inner join comunidad c on s.comunidad_id = c.id )  as table1
						) as C4 on DEP.ccdd = C4.ccdd and  DEP.ccpp COLLATE utf8_unicode_ci = C4.ccpp and DEP.ccdi COLLATE utf8_unicode_ci  = C4.ccdi and DEP.codccpp COLLATE utf8_unicode_ci  = C4.cod_ccpp
					WHERE DEP.CCDD ='".$dep."' and DEP.CCPP = '". $prov ."' and DEP.CCDI = '".$dist."' 
					HAVING total>0;
			");
		return $q;
	}





}

?>