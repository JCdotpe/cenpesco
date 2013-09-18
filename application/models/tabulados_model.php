<?php 
/**
* 
*/
class Tabulados_model extends CI_MODEL
{

function get_dptos (){
	$q = $this->db->query('
		SELECT distinct(DEPARTAMENTO),CCDD  FROM cenpesco.marco ORDER BY DEPARTAMENTO; 
    ');
    return $q;	 	
}   

function get_report1($a = null, $b = null){
    $this->db->select('p.CCDD,p.NOM_DD,COUNT(p.id) as num');
    $this->db->from('pescador p');
    if(!is_null($a)){
    	$this->db->where('p.TAC',$a);
    }
    if(is_null($b)){
    	$this->db->group_by('p.NOM_DD');
    }
    $q = $this->db->get();
    return $q;
}



//S2_3
function get_report2($a = null, $b = null){
	$this->db->select('p.CCDD,p.NOM_DD,COUNT(p2.S2_3) as num');
	$this->db->from('pescador p');
    $this->db->join('pesc_seccion2 p2','p.id = p2.pescador_id','left');
	if(!is_null($a)){
    	$this->db->where('p2.S2_3',$a);
    }
    if(is_null($b)){
    	$this->db->group_by('p.NOM_DD');
    }
    $q = $this->db->get();
    return $q;
}


function get_report3($a = null, $b = null){
	$this->db->select('COUNT(p.CCDD) as num');
	$this->db->from('pescador p');
    $this->db->join('pesc_seccion2 p2','p.id = p2.pescador_id','left');
    $this->db->where('p2.S2_10_DD_COD',$a);
    if(!is_null($b)){
    $this->db->where('p.CCDD',$b);
    }   
    $q = $this->db->get();
    return $q;
}

function get_report4($a = null, $b = null){
	$this->db->select('COUNT(p.CCDD) as num');
	$this->db->from('pescador p');
    $this->db->join('pesc_seccion2 p2','p.id = p2.pescador_id','left');
    $this->db->where('p2.S2_11_DD_COD',$a);
    if(!is_null($b)){
    $this->db->where('p.CCDD',$b);
    }   
    $q = $this->db->get();
    return $q;
}

function get_report5($a = null, $b = null){
	$this->db->select('COUNT(p.CCDD) as num');
	$this->db->from('pescador p');
    $this->db->join('pesc_seccion2 p2','p.id = p2.pescador_id','left');
    $this->db->where('p2.S2_12',$a);        
    if(!is_null($b)){
    $this->db->where('p.CCDD',$b);
    }   
    $q = $this->db->get();
    return $q;
}

function get_report6($a = null, $b = null){
    $this->db->select('COUNT(p.CCDD) as num');
    $this->db->from('pescador p');
    $this->db->join('pesc_seccion2 p2','p.id = p2.pescador_id','left');
    $this->db->where('p2.S2_13',$a);        
    if(!is_null($b)){
    $this->db->where('p.CCDD',$b);
    }   
    $q = $this->db->get();
    return $q;
}


function get_report7($a = null, $b = null){
    $this->db->select('COUNT(p.CCDD) as num');
    $this->db->from('pescador p');
    $this->db->join('pesc_seccion2 p2','p.id = p2.pescador_id','left');
    $this->db->where('p2.S2_14_' . $a,1);        
    if(!is_null($b)){
    $this->db->where('p.CCDD',$b);
    }   
    $q = $this->db->get();
    return $q;
}


function get_report8($a = null, $b = null){
    $this->db->select('COUNT(p.CCDD) as num');
    $this->db->from('pescador p');
    $this->db->join('pesc_seccion2 p2','p.id = p2.pescador_id','left');
    $this->db->where('p2.S2_15',$a);        
    if(!is_null($b)){
    $this->db->where('p.CCDD',$b);
    }   
    $q = $this->db->get();
    return $q;
}

function get_report9($a = null, $b = null){
    $this->db->select('COUNT(p.CCDD) as num');
    $this->db->from('pescador p');
    $this->db->join('pesc_seccion2 p2','p.id = p2.pescador_id','left'); 
    if($a == 1)
        $this->db->where('p2.S2_16',1); 
    if($a == 2){
        $this->db->where('p2.S2_16 >=',2);                  
        $this->db->where('p2.S2_16 <=',5);                  
    }
    if($a == 3){
        $this->db->where('p2.S2_16 >=',6);                  
        $this->db->where('p2.S2_16 <=',10);                  
    }   
    if($a == 4){               
        $this->db->where('p2.S2_16 >',10);                  
    }        
    if(!is_null($b)){
    $this->db->where('p.CCDD',$b);
    }   
    $q = $this->db->get();
    return $q;
}


function get_report10($a = null, $b = null){
    $this->db->select('COUNT(p.CCDD) as num');
    $this->db->from('pescador p');
    $this->db->join('pesc_seccion2 p2','p.id = p2.pescador_id','left');
    $this->db->where('p2.S2_17_' . $a,1);        
    if(!is_null($b)){
    $this->db->where('p.CCDD',$b);
    }   
    $q = $this->db->get();
    return $q;
}

function get_report11($a = null, $b = null){
    $this->db->select('COUNT(p.CCDD) as num');
    $this->db->from('pescador p');
    $this->db->join('pesc_seccion2 p2','p.id = p2.pescador_id','left');
    $this->db->where('p2.S2_18',$a);        
    if(!is_null($b)){
    $this->db->where('p.CCDD',$b);
    }   
    $q = $this->db->get();
    return $q;
}


function get_report12($a = null, $b = null){
    $this->db->select('COUNT(p.CCDD) as num');
    $this->db->from('pescador p');
    $this->db->join('pesc_seccion2 p2','p.id = p2.pescador_id','left');
    $this->db->where('p2.S2_19',$a);        
    if(!is_null($b)){
    $this->db->where('p.CCDD',$b);
    }   
    $q = $this->db->get();
    return $q;
}

function get_report13($a = null, $b = null){
    $this->db->select('COUNT(p.CCDD) as num');
    $this->db->from('pescador p');
    $this->db->join('pesc_seccion2 p2','p.id = p2.pescador_id','left');
    $this->db->where('p2.S2_20_' . $a,1);        
    if(!is_null($b)){
    $this->db->where('p.CCDD',$b);
    }   
    $q = $this->db->get();
    return $q;
}


function get_report14($a = null, $b = null){
    $this->db->select('COUNT(p.CCDD) as num');
    $this->db->from('pescador p');
    $this->db->join('pesc_seccion2 p2','p.id = p2.pescador_id','left');
    $this->db->where('p2.S2_21',$a);        
    if(!is_null($b)){
    $this->db->where('p.CCDD',$b);
    }   
    $q = $this->db->get();
    return $q;
}

function get_report15($a = null, $b = null){
    $this->db->select('COUNT(p.CCDD) as num');
    $this->db->from('pescador p');
    $this->db->join('pesc_seccion2 p2','p.id = p2.pescador_id','left');
    $this->db->where('p2.S2_22',$a);        
    if(!is_null($b)){
    $this->db->where('p.CCDD',$b);
    }   
    $q = $this->db->get();
    return $q;
}

function get_report16($a = null, $b = null){
    $this->db->select('COUNT(p.CCDD) as num');
    $this->db->from('pescador p');
    $this->db->join('pesc_seccion2 p2','p.id = p2.pescador_id','left');
    $this->db->where('p2.S2_22',$a);        
    if(!is_null($b)){
    $this->db->where('p.CCDD',$b);
    }   
    $q = $this->db->get();
    return $q;
}



function get_report25($a = null, $b = null){
    $this->db->select('COUNT(p.CCDD) as num');
    $this->db->from('pescador p');
    $this->db->join('pesc_seccion3 p3','p.id = p3.pescador_id','left');
    $this->db->where('p3.S3_100',$a);        
    if(!is_null($b)){
    $this->db->where('p.CCDD',$b);
    }   
    $q = $this->db->get();
    return $q;
}

function get_report26($a = null, $b = null){
    $this->db->select('COUNT(p.CCDD) as num');
    $this->db->from('pescador p');
    $this->db->join('pesc_seccion3 p3','p.id = p3.pescador_id','left');
    $this->db->where('p3.S3_200',$a);        
    if(!is_null($b)){
    $this->db->where('p.CCDD',$b);
    }   
    $q = $this->db->get();
    return $q;
}

function get_report27($a = null, $b = null){
    $this->db->select('COUNT(p.CCDD) as num');
    $this->db->from('pescador p');
    $this->db->join('pesc_seccion3 p3','p.id = p3.pescador_id','left');
    $this->db->where('p3.S3_300',$a);        
    if(!is_null($b)){
    $this->db->where('p.CCDD',$b);
    }   
    $q = $this->db->get();
    return $q;
}
function get_report28($a = null, $b = null){
    $this->db->select('COUNT(p.CCDD) as num');
    $this->db->from('pescador p');
    $this->db->join('pesc_seccion3 p3','p.id = p3.pescador_id','left');
    $this->db->where('p3.S3_400',$a);        
    if(!is_null($b)){
    $this->db->where('p.CCDD',$b);
    }   
    $q = $this->db->get();
    return $q;
}

function get_report29($a = null, $b = null){
    $this->db->select('COUNT(p.CCDD) as num');
    $this->db->from('pescador p');
    $this->db->join('pesc_seccion3 p3','p.id = p3.pescador_id','left');
    $this->db->where('p3.S3_500',$a);        
    if(!is_null($b)){
    $this->db->where('p.CCDD',$b);
    }   
    $q = $this->db->get();
    return $q;
}

function get_report30($a = null, $b = null){
    $this->db->select('COUNT(p.CCDD) as num');
    $this->db->from('pescador p');
    $this->db->join('pesc_seccion3 p3','p.id = p3.pescador_id','left');
    $this->db->where('p3.S3_600',$a);        
    if(!is_null($b)){
    $this->db->where('p.CCDD',$b);
    }   
    $q = $this->db->get();
    return $q;
}

function get_report31($a = null, $b = null){
    $this->db->select('COUNT(p.CCDD) as num');
    $this->db->from('pescador p');
    $this->db->join('pesc_seccion3 p3','p.id = p3.pescador_id','left');
    $this->db->where('p3.S3_700',$a);        
    if(!is_null($b)){
    $this->db->where('p.CCDD',$b);
    }   
    $q = $this->db->get();
    return $q;
}

function get_report32($a = null, $b = null){
    $this->db->select('COUNT(p.CCDD) as num');
    $this->db->from('pescador p');
    $this->db->join('pesc_seccion3 p3','p.id = p3.pescador_id','left');
    $this->db->where('p3.S3_800',$a);        
    if(!is_null($b)){
    $this->db->where('p.CCDD',$b);
    }   
    $q = $this->db->get();
    return $q;
}

function get_report33($a = null, $b = null){
    $aa = sprintf("%02d",$a);
    $this->db->select('COUNT(p.CCDD) as num');
    $this->db->from('pescador p');
    $this->db->join('pesc_seccion3 p3','p.id = p3.pescador_id','left');
    $this->db->where('p3.S3_9' . $aa,1);        
    if(!is_null($b)){
    $this->db->where('p.CCDD',$b);
    }   
    $q = $this->db->get();
    return $q;
}

function get_report34($a = null, $b = null){
    $aa = sprintf("%02d",$a);
    $this->db->select('COUNT(p.CCDD) as num');
    $this->db->from('pescador p');
    $this->db->join('pesc_seccion3 p3','p.id = p3.pescador_id','left');
    $this->db->where('p3.S3_10' . $aa,1);        
    if(!is_null($b)){
    $this->db->where('p.CCDD',$b);
    }   
    $q = $this->db->get();
    return $q;
}

function get_report35($a = null, $b = null){
    $this->db->select('COUNT(p.CCDD) as num');
    $this->db->from('pescador p');
    $this->db->join('pesc_seccion3 p3','p.id = p3.pescador_id','left');
    $this->db->where('p3.S3_1100',$a);        
    if(!is_null($b)){
    $this->db->where('p.CCDD',$b);
    }   
    $q = $this->db->get();
    return $q;
}

function get_report36($a = null, $b = null){
    $this->db->select('COUNT(p.CCDD) as num');
    $this->db->from('pescador p');
    $this->db->join('pesc_seccion4 p4','p.id = p4.pescador_id','left');
    $this->db->where('p4.S4_1',$a);        
    if(!is_null($b)){
    $this->db->where('p.CCDD',$b);
    }   
    $q = $this->db->get();
    return $q;
}

function get_report37($a = null, $b = null){
    $this->db->select('COUNT(p.CCDD) as num');
    $this->db->from('pescador p');
    $this->db->join('pesc_seccion4 p4','p.id = p4.pescador_id','left');
    $this->db->where('p4.S4_2_' . $a,1);        
    if(!is_null($b)){
    $this->db->where('p.CCDD',$b);
    }   
    $q = $this->db->get();
    return $q;
}

function get_report38($a = null, $b = null){
    $this->db->select('COUNT(p.CCDD) as num');
    $this->db->from('pescador p');
    $this->db->join('pesc_seccion4 p4','p.id = p4.pescador_id','left');
    $this->db->where('p4.S4_2_1',1);        
    $this->db->where('p4.S4_2_1_1',$a);        
    if(!is_null($b)){
    $this->db->where('p.CCDD',$b);
    }   
    $q = $this->db->get();
    return $q;
}

function get_report39($a = null, $b = null){
    $this->db->select('COUNT(p.CCDD) as num');
    $this->db->from('pescador p');
    $this->db->join('pesc_seccion4 p4','p.id = p4.pescador_id','left');
    $this->db->where('p4.S4_2_2',1);        
    $this->db->where('p4.S4_2_2_1',$a);        
    if(!is_null($b)){
    $this->db->where('p.CCDD',$b);
    }   
    $q = $this->db->get();
    return $q;
}

function get_report40($a = null, $b = null){
    $this->db->select('COUNT(p.CCDD) as num');
    $this->db->from('pescador p');
    $this->db->join('pesc_seccion4 p4','p.id = p4.pescador_id','left');
    $this->db->where('p4.S4_2_3',1);        
    $this->db->where('p4.S4_2_3_1',$a);        
    if(!is_null($b)){
    $this->db->where('p.CCDD',$b);
    }   
    $q = $this->db->get();
    return $q;
}



function get_report41($a = null, $b = null){
    $this->db->select('COUNT(p.CCDD) as num');
    $this->db->from('pescador p');
    $this->db->join('pesc_seccion4 p4','p.id = p4.pescador_id','left');
    $this->db->where('p4.S4_3_' . $a,1);        
    if(!is_null($b)){
    $this->db->where('p.CCDD',$b);
    }   
    $q = $this->db->get();
    return $q;
}

function get_report42($a = null, $b = null){
    $this->db->select('COUNT(p.CCDD) as num');
    $this->db->from('pescador p');
    $this->db->join('pesc_seccion4 p4','p.id = p4.pescador_id','left');     
    $this->db->where('p4.S4_4_1',$a);        
    if(!is_null($b)){
    $this->db->where('p.CCDD',$b);
    }   
    $q = $this->db->get();
    return $q;
}

function get_report43($a = null, $b = null){
    $this->db->select('COUNT(p.CCDD) as num');
    $this->db->from('pescador p');
    $this->db->join('pesc_seccion4 p4','p.id = p4.pescador_id','left');     
    $this->db->where('p4.S4_5_1',$a);        
    if(!is_null($b)){
    $this->db->where('p.CCDD',$b);
    }   
    $q = $this->db->get();
    return $q;
}



function get_report44($a = null, $b = null){
    $this->db->select('COUNT(p.CCDD) as num');
    $this->db->from('pescador p');
    $this->db->join('pesc_seccion4 p4','p.id = p4.pescador_id','left');
    $this->db->where('p4.S4_6_' . $a,1);        
    if(!is_null($b)){
    $this->db->where('p.CCDD',$b);
    }   
    $q = $this->db->get();
    return $q;
}


function get_report45($a = null, $b = null){
    $this->db->select('COUNT(p.CCDD) as num');
    $this->db->from('pescador p');
    $this->db->join('pesc_seccion5 p5','p.id = p5.pescador_id','left');
    $this->db->where('p5.S5_1_' . $a,1);        
    if(!is_null($b)){
    $this->db->where('p.CCDD',$b);
    }   
    $q = $this->db->get();
    return $q;
}

function get_report46($a = null, $b = null){
    $this->db->select('COUNT(p.CCDD) as num');
    $this->db->from('pescador p');
    $this->db->join('pesc_seccion5 p5','p.id = p5.pescador_id','left');
    $this->db->where('p5.S5_2_' . $a,1);        
    if(!is_null($b)){
    $this->db->where('p.CCDD',$b);
    }   
    $q = $this->db->get();
    return $q;
}

function get_report49($a = null, $b = null){
    $this->db->select('COUNT(p.CCDD) as num');
    $this->db->from('pescador p');
    $this->db->join('pesc_seccion5 p5','p.id = p5.pescador_id','left');
    $this->db->where('p5.S5_5_' . $a,1);        
    if(!is_null($b)){
    $this->db->where('p.CCDD',$b);
    }   
    $q = $this->db->get();
    return $q;
}

function get_report50($a = null, $b = null){
    $this->db->select('COUNT(p.CCDD) as num');
    $this->db->from('pescador p');
    $this->db->join('pesc_seccion5 p5','p.id = p5.pescador_id','left');
    $this->db->where('p5.S5_5_1' . $a,1);        
    if(!is_null($b)){
    $this->db->where('p.CCDD',$b);
    }   
    $q = $this->db->get();
    return $q;
}

function get_report51($a = null, $b = null){
    $this->db->select('COUNT(p.CCDD) as num');
    $this->db->from('pescador p');
    $this->db->join('pesc_seccion5 p5','p.id = p5.pescador_id','left');
    $this->db->where('p5.S5_5_1' . $a,1);        
    if(!is_null($b)){
    $this->db->where('p.CCDD',$b);
    }   
    $q = $this->db->get();
    return $q;
}


function get_report53($a = null, $b = null){
    $this->db->select('COUNT(p.CCDD) as num');
    $this->db->from('pescador p');
    $this->db->join('pesc_seccion5 p5','p.id = p5.pescador_id','left');
    $this->db->where('p5.S5_7' ,$a);        
    if(!is_null($b)){
    $this->db->where('p.CCDD',$b);
    }   
    $q = $this->db->get();
    return $q;
}


function get_report54($a = null, $b = null){
    $this->db->select('COUNT(p.CCDD) as num');
    $this->db->from('pescador p');
    $this->db->join('pesc_seccion5 p5','p.id = p5.pescador_id','left');
    $this->db->where('p5.S5_8_' . $a,1);        
    if(!is_null($b)){
    $this->db->where('p.CCDD',$b);
    }   
    $q = $this->db->get();
    return $q;
}

function get_report55($a = null, $b = null){
    $this->db->select('COUNT(p.CCDD) as num');
    $this->db->from('pescador p');
    $this->db->join('pesc_seccion5 p5','p.id = p5.pescador_id','left');
    $this->db->where('p5.S5_9_' . $a,1);        
    if(!is_null($b)){
    $this->db->where('p.CCDD',$b);
    }   
    $q = $this->db->get();
    return $q;
}

function get_report56($a = null, $b = null){
    $this->db->select('COUNT(p.CCDD) as num');
    $this->db->from('pescador p');
    $this->db->join('pesc_seccion5 p5','p.id = p5.pescador_id','left');
    $this->db->where('p5.S5_10_1' ,$a);        
    if(!is_null($b)){
    $this->db->where('p.CCDD',$b);
    }   
    $q = $this->db->get();
    return $q;
}


function get_report57($a = null, $b = null){
    $this->db->select('COUNT(p.CCDD) as num');
    $this->db->from('pescador p');
    $this->db->join('pesc_seccion5 p5','p.id = p5.pescador_id','left');
    $this->db->where('p5.S5_10_2' ,$a);        
    if(!is_null($b)){
    $this->db->where('p.CCDD',$b);
    }   
    $q = $this->db->get();
    return $q;
}


function get_report58($a = null, $b = null){
    $this->db->select('COUNT(p.CCDD) as num');
    $this->db->from('pescador p');
    $this->db->join('pesc_seccion5 p5','p.id = p5.pescador_id','left');
    $this->db->where('p5.S5_10_3' ,$a);        
    if(!is_null($b)){
    $this->db->where('p.CCDD',$b);
    }   
    $q = $this->db->get();
    return $q;
}

function get_report59($a = null, $b = null){
    $this->db->select('COUNT(p.CCDD) as num');
    $this->db->from('pescador p');
    $this->db->join('pesc_seccion6 p6','p.id = p6.pescador_id','left');
    $this->db->where('p6.S6_1' ,$a);        
    if(!is_null($b)){
    $this->db->where('p.CCDD',$b);
    }   
    $q = $this->db->get();
    return $q;
}

function get_report60($a = null, $b = null){
    $this->db->select('COUNT(p.CCDD) as num');
    $this->db->from('pescador p');
    $this->db->join('pesc_seccion6 p6','p.id = p6.pescador_id','left');
    $this->db->where('p6.S6_3_' . $a,1);        
    if(!is_null($b)){
    $this->db->where('p.CCDD',$b);
    }   
    $q = $this->db->get();
    return $q;
}

function get_report61($a = null, $b = null){
    $this->db->select('COUNT(p.CCDD) as num');
    $this->db->from('pescador p');
    $this->db->join('pesc_seccion6 p6','p.id = p6.pescador_id','left');
    $this->db->where('p6.S6_4',$a);        
    if(!is_null($b)){
    $this->db->where('p.CCDD',$b);
    }   
    $q = $this->db->get();
    return $q;
}


function get_report62($a = null, $b = null){
    $this->db->select('COUNT(p.CCDD) as num');
    $this->db->from('pescador p');
    $this->db->join('pesc_seccion6 p6','p.id = p6.pescador_id','left');
    $this->db->where('p6.S6_5',$a);        
    if(!is_null($b)){
    $this->db->where('p.CCDD',$b);
    }   
    $q = $this->db->get();
    return $q;
}


function get_report63($a = null, $b = null){
    $this->db->select('COUNT(p.CCDD) as num');
    $this->db->from('pescador p');
    $this->db->join('pesc_seccion6 p6','p.id = p6.pescador_id','left');
    $this->db->where('p6.S6_6',$a);        
    if(!is_null($b)){
    $this->db->where('p.CCDD',$b);
    }   
    $q = $this->db->get();
    return $q;
}

function get_report64($a = null, $b = null){
    $this->db->select('COUNT(p.CCDD) as num');
    $this->db->from('pescador p');
    $this->db->join('pesc_seccion7 p7','p.id = p7.pescador_id','left');
    $this->db->where('p7.S7_10' . $a,1);        
    if(!is_null($b)){
    $this->db->where('p.CCDD',$b);
    }   
    $q = $this->db->get();
    return $q;
}


function get_report65($a = null, $b = null){
    $this->db->select('COUNT(p.CCDD) as num');
    $this->db->from('pescador p');
    $this->db->join('pesc_seccion7 p7','p.id = p7.pescador_id','left');
    $this->db->where('p7.S7_101',1);        
    $this->db->where('p7.S7_20' . $a,1);        
    if(!is_null($b)){
    $this->db->where('p.CCDD',$b);
    }   
    $q = $this->db->get();
    return $q;
}


function get_report66($a = null, $b = null){
    $this->db->select('COUNT(p.CCDD) as num');
    $this->db->from('pescador p');
    $this->db->join('pesc_seccion7 p7','p.id = p7.pescador_id','left');     
    $this->db->where('p7.S7_3_' . $a,1);        
    if(!is_null($b)){
    $this->db->where('p.CCDD',$b);
    }   
    $q = $this->db->get();
    return $q;
}

function get_report67($a = null, $b = null){
    $this->db->select('COUNT(p.CCDD) as num');
    $this->db->from('pescador p');
    $this->db->join('pesc_seccion7 p7','p.id = p7.pescador_id','left');     
    $this->db->where('p7.S7_4_' . $a,1);        
    if(!is_null($b)){
    $this->db->where('p.CCDD',$b);
    }   
    $q = $this->db->get();
    return $q;
}

function get_report70($a = null, $b = null){
    $this->db->select('COUNT(p.CCDD) as num');
    $this->db->from('pescador p');
    $this->db->join('pesc_seccion7 p7','p.id = p7.pescador_id','left');     
    $this->db->where('p7.S7_7_' . $a,1);        
    if(!is_null($b)){
    $this->db->where('p.CCDD',$b);
    }   
    $q = $this->db->get();
    return $q;
}

function get_report71($a = null, $b = null){
    $this->db->select('COUNT(p.CCDD) as num');
    $this->db->from('pescador p');
    $this->db->join('pesc_seccion7 p7','p.id = p7.pescador_id','left');     
    $this->db->where('p7.S7_8_' . $a,1);        
    if(!is_null($b)){
    $this->db->where('p.CCDD',$b);
    }   
    $q = $this->db->get();
    return $q;
}

function get_report72($a = null, $b = null){
    $this->db->select('COUNT(p.CCDD) as num');
    $this->db->from('pescador p');
    $this->db->join('pesc_seccion7 p7','p.id = p7.pescador_id','left');     
    $this->db->where('p7.S7_9_' . $a,1);        
    if(!is_null($b)){
    $this->db->where('p.CCDD',$b);
    }   
    $q = $this->db->get();
    return $q;
}


function get_report73($a = null, $b = null){
    $this->db->select('COUNT(p.CCDD) as num');
    $this->db->from('pescador p');
    $this->db->join('pesc_seccion7 p7','p.id = p7.pescador_id','left');     
    $this->db->where('p7.S7_10_' . $a,1);        
    if(!is_null($b)){
    $this->db->where('p.CCDD',$b);
    }   
    $q = $this->db->get();
    return $q;
}

function get_report74($a = null, $b = null){
    $this->db->select('COUNT(p.CCDD) as num');
    $this->db->from('pescador p');
    $this->db->join('pesc_seccion8 p8','p.id = p8.pescador_id','left');     
    $this->db->where('p8.S8_1_' . $a,1);        
    if(!is_null($b)){
    $this->db->where('p.CCDD',$b);
    }   
    $q = $this->db->get();
    return $q;
}

function get_report75($a = null, $b = null){
    $this->db->select('COUNT(p.CCDD) as num');
    $this->db->from('pescador p');
    $this->db->join('pesc_seccion8 p8','p.id = p8.pescador_id','left');     
    $this->db->where('p8.S8_2', $a);        
    if(!is_null($b)){
    $this->db->where('p.CCDD',$b);
    }   
    $q = $this->db->get();
    return $q;
}

function get_report76($a = null, $b = null){
    $this->db->select('COUNT(p.CCDD) as num');
    $this->db->from('pescador p');
    $this->db->join('pesc_seccion8 p8','p.id = p8.pescador_id','left');     
    $this->db->where('p8.S8_3_' . $a, 1);        
    if(!is_null($b)){
    $this->db->where('p.CCDD',$b);
    }   
    $q = $this->db->get();
    return $q;
}

function get_report77($a = null, $b = null){
    $this->db->select('COUNT(p.CCDD) as num');
    $this->db->from('pescador p');
    $this->db->join('pesc_seccion8 p8','p.id = p8.pescador_id','left');     
    $this->db->where('p8.S8_4_' . $a, 1);        
    if(!is_null($b)){
    $this->db->where('p.CCDD',$b);
    }   
    $q = $this->db->get();
    return $q;
}

function get_report78($a = null, $b = null){
    $this->db->select('COUNT(p.CCDD) as num');
    $this->db->from('pescador p');
    $this->db->join('pesc_seccion8 p8','p.id = p8.pescador_id','left');     
    $this->db->where('p8.S8_6_1' , $a);        
    if(!is_null($b)){
    $this->db->where('p.CCDD',$b);
    }   
    $q = $this->db->get();
    return $q;
}

function get_report79($a = null, $b = null){
    $this->db->select('COUNT(p.CCDD) as num');
    $this->db->from('pescador p');
    $this->db->join('pesc_seccion8 p8','p.id = p8.pescador_id','left');     
    $this->db->where('p8.S8_6_2' , $a);        
    if(!is_null($b)){
    $this->db->where('p.CCDD',$b);
    }   
    $q = $this->db->get();
    return $q;
}

function get_report80($a = null, $b = null){
    $this->db->select('COUNT(p.CCDD) as num');
    $this->db->from('pescador p');
    $this->db->join('pesc_seccion8 p8','p.id = p8.pescador_id','left');     
    $this->db->where('p8.S8_6_3' , $a);        
    if(!is_null($b)){
    $this->db->where('p.CCDD',$b);
    }   
    $q = $this->db->get();
    return $q;
}


function get_report81($a = null, $b = null){
    $this->db->select('COUNT(p.CCDD) as num');
    $this->db->from('pescador p');
    $this->db->join('pesc_seccion8 p8','p.id = p8.pescador_id','left');     
    $this->db->where('p8.S8_6_4' , $a);        
    if(!is_null($b)){
    $this->db->where('p.CCDD',$b);
    }   
    $q = $this->db->get();
    return $q;
}

function get_report82($a = null, $b = null){
    $this->db->select('COUNT(p.CCDD) as num');
    $this->db->from('pescador p');
    $this->db->join('pesc_seccion8 p8','p.id = p8.pescador_id','left');     
    $this->db->where('p8.S8_6_5' , $a);        
    if(!is_null($b)){
    $this->db->where('p.CCDD',$b);
    }   
    $q = $this->db->get();
    return $q;
}

function get_report83($a = null, $b = null){
    $this->db->select('COUNT(p.CCDD) as num');
    $this->db->from('pescador p');
    $this->db->join('pesc_seccion8 p8','p.id = p8.pescador_id','left');     
    $this->db->where('p8.S8_6_6' , $a);        
    if(!is_null($b)){
    $this->db->where('p.CCDD',$b);
    }   
    $q = $this->db->get();
    return $q;
}

function get_report84($a = null, $b = null){
    $this->db->select('COUNT(p.CCDD) as num');
    $this->db->from('pescador p');
    $this->db->join('pesc_seccion9 p9','p.id = p9.pescador_id','left');     
    $this->db->where('p9.S9_1' , $a);        
    if(!is_null($b)){
    $this->db->where('p.CCDD',$b);
    }   
    $q = $this->db->get();
    return $q;
}


}
?>