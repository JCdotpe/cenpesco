<?php 
/**
* 
*/
class Tabulados_model extends CI_MODEL
{

    function get_texto ($tipo,$preg){
        $this->db->select('texto');
        $this->db->where('tipo', $tipo);
        $this->db->where('pregunta', $preg);
        $q = $this->db->get('tabulados');
        return $q;   
    }   

    function insert_texto($d)
    {     
        $q = $this->db->insert('tabulados', $d);
        return $this->db->affected_rows() > 0;
    }

    function update_texto($tipo,$preg,$texto)
    {
        $this->db->where('tipo', $tipo);
        $this->db->where('pregunta', $preg);        
        $this->db->update('tabulados', $texto);
        return $this->db->affected_rows() > 0;
    }


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
        if ($a>=1 && $a<=8) {
    $this->db->where('p2.S2_14_' . $a,1); }
        else if($a==9){ 
    $this->db->where('p2.S2_14_1',9);}
        else if($a==999){ 
    $this->db->where('p2.S2_14_1 is not null');}           
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
        $this->db->where('p2.S2_16',2);                  
        //$this->db->where('p2.S2_16 <=',5);                  
    }
    if($a == 3){
        $this->db->where('p2.S2_16 ',3);                  
        //$this->db->where('p2.S2_16 <=',10);                  
    }   
    if($a == 4){               
        $this->db->where('p2.S2_16',4);                  
    }     
    if($a == 5){               
        $this->db->where('p2.S2_16',9);                  
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
        if ($a>=1 && $a<=9) {
    $this->db->where('p2.S2_17_' . $a,1); }
        else if($a==10){ 
    $this->db->where('p2.S2_17_1',9);}  
        else if($a==999){ 
    $this->db->where('p2.S2_17_1 is not null');}       
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
        if ($a>=1 && $a<=9) {
    $this->db->where('p2.S2_20_' . $a,1); }
        else if($a==10){ 
    $this->db->where('p2.S2_20_1',9);}  
        else if($a==999){ 
    $this->db->where('p2.S2_20_1 is not null');}      
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

function get_report16($a = null){
    $this->db->select('p2.S2_23_3_1,p2.S2_23_3_2,p2.S2_23_3_3,p2.S2_23_3_4,p2.S2_23_3_5,p2.S2_23_3_6,p2.S2_23_3_7,p2.S2_23_3_8,p2.S2_23_3_9,p2.S2_23_3_10');
    $this->db->from('pescador p');
    $this->db->join('pesc_seccion2 p2','p.id = p2.pescador_id','left');     
    if(!is_null($a)){
    $this->db->where('p.CCDD',$a);
    }   
    $q = $this->db->get();
    return $q;
}

function get_report17($a = null){
    $this->db->select('p2.S2_23_4_1A,p2.S2_23_4_2A,p2.S2_23_4_3A,p2.S2_23_4_4A,p2.S2_23_4_5A,p2.S2_23_4_6A,p2.S2_23_4_7A,p2.S2_23_4_8A,p2.S2_23_4_9A,p2.S2_23_4_10A');
    $this->db->from('pescador p');
    $this->db->join('pesc_seccion2 p2','p.id = p2.pescador_id','left');     
    if(!is_null($a)){
    $this->db->where('p.CCDD',$a);
    }   
    $q = $this->db->get();
    return $q;
}

function get_report18($a = null){
    $this->db->select('p2.S2_23_5_1,p2.S2_23_5_2,p2.S2_23_5_3,p2.S2_23_5_4,p2.S2_23_5_5,p2.S2_23_5_6,p2.S2_23_5_7,p2.S2_23_5_8,p2.S2_23_5_9,p2.S2_23_5_10');
    $this->db->from('pescador p');
    $this->db->join('pesc_seccion2 p2','p.id = p2.pescador_id','left');     
    if(!is_null($a)){
    $this->db->where('p.CCDD',$a);
    }   
    $q = $this->db->get();
    return $q;
}

function get_report19($a = null){
    $this->db->select('p2.S2_23_6_1,p2.S2_23_6_2,p2.S2_23_6_3,p2.S2_23_6_4,p2.S2_23_6_5,p2.S2_23_6_6,p2.S2_23_6_7,p2.S2_23_6_8,p2.S2_23_6_9,p2.S2_23_6_10');
    $this->db->from('pescador p');
    $this->db->join('pesc_seccion2 p2','p.id = p2.pescador_id','left');     
    if(!is_null($a)){
    $this->db->where('p.CCDD',$a);
    }   
    $q = $this->db->get();
    return $q;
}

function get_report20($a = null){
    $this->db->select('p2.S2_23_7_1,p2.S2_23_7_2,p2.S2_23_7_3,p2.S2_23_7_4,p2.S2_23_7_5,p2.S2_23_7_6,p2.S2_23_7_7,p2.S2_23_7_8,p2.S2_23_7_9,p2.S2_23_7_10');
    $this->db->from('pescador p');
    $this->db->join('pesc_seccion2 p2','p.id = p2.pescador_id','left');     
    if(!is_null($a)){
    $this->db->where('p.CCDD',$a);
    }   
    $q = $this->db->get();
    return $q;
}

function get_report21($a = null){
    $this->db->select('p2.S2_23_8_1,p2.S2_23_8_2,p2.S2_23_8_3,p2.S2_23_8_4,p2.S2_23_8_5,p2.S2_23_8_6,p2.S2_23_8_7,p2.S2_23_8_8,p2.S2_23_8_9,p2.S2_23_8_10');
    $this->db->from('pescador p');
    $this->db->join('pesc_seccion2 p2','p.id = p2.pescador_id','left');     
    if(!is_null($a)){
    $this->db->where('p.CCDD',$a);
    }   
    $q = $this->db->get();
    return $q;
}

function get_report22($a = null){
    $this->db->select('p2.S2_23_9_1,p2.S2_23_9_2,p2.S2_23_9_3,p2.S2_23_9_4,p2.S2_23_9_5,p2.S2_23_9_6,p2.S2_23_9_7,p2.S2_23_9_8,p2.S2_23_9_9,p2.S2_23_9_10');
    $this->db->from('pescador p');
    $this->db->join('pesc_seccion2 p2','p.id = p2.pescador_id','left');     
    if(!is_null($a)){
    $this->db->where('p.CCDD',$a);
    }   
    $q = $this->db->get();
    return $q;
}

function get_report23($a = null){
    $this->db->select('p2.S2_23_10_1,p2.S2_23_10_2,p2.S2_23_10_3,p2.S2_23_10_4,p2.S2_23_10_5,p2.S2_23_10_6,p2.S2_23_10_7,p2.S2_23_10_8,p2.S2_23_10_9,p2.S2_23_10_10');
    $this->db->from('pescador p');
    $this->db->join('pesc_seccion2 p2','p.id = p2.pescador_id','left');     
    if(!is_null($a)){
    $this->db->where('p.CCDD',$a);
    }   
    $q = $this->db->get();
    return $q;
}

function get_report24($a = null){
    $this->db->select('p2.S2_23_11_1,p2.S2_23_11_2,p2.S2_23_11_3,p2.S2_23_11_4,p2.S2_23_11_5,p2.S2_23_11_6,p2.S2_23_11_7,p2.S2_23_11_8,p2.S2_23_11_9,p2.S2_23_11_10');
    $this->db->from('pescador p');
    $this->db->join('pesc_seccion2 p2','p.id = p2.pescador_id','left');     
    if(!is_null($a)){
    $this->db->where('p.CCDD',$a);
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
        if ($a>=1 && $a<=11) {    
    $this->db->where('p3.S3_9' . $aa,1);  }
        else if ($a==12) {    
    $this->db->where('p3.S3_901',9);  } 
        else if ($a==999) {    
    $this->db->where('p3.S3_901 is not null');  }     
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
        if ($a>=1 && $a<=5) {   
    $this->db->where('p3.S3_10' . $aa,1);  } 
        else if ($a==6) {    
    $this->db->where('p3.S3_1001',9);  } 
        else if ($a==999) {  
    $this->db->where('p3.S3_1001 is not null');  }         
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
        if ($a>=1 && $a<=4) {   
    $this->db->where('p4.S4_2_' . $a,1);   }  
        else if ($a==5) {   
    $this->db->where('p4.S4_2_1',9);   } 
        else if ($a==999) {   
    $this->db->where('p4.S4_2_1 is not null');   }   
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


function get_report47($a = null, $b = null){
    $this->db->select('COUNT(p.CCDD) as num');
    $this->db->from('pescador p');
    $this->db->join('pesc_seccion5 p5','p.id = p5.pescador_id','left');     
    $this->db->where('p5.S5_3',$a);      
    if(!is_null($b)){
    $this->db->where('p.CCDD',$b);
    }   
    $q = $this->db->get();
    return $q;
}


function get_report48($a = null, $b = null){
    $this->db->select('COUNT(p.CCDD) as num');
    $this->db->from('pescador p');
    $this->db->join('pesc_seccion5 p5','p.id = p5.pescador_id','left');     
    $this->db->where('p5.S5_4',$a);      
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


function get_report52($a = null, $b = null){
    $this->db->select('COUNT(p.CCDD) as num');
    $this->db->from('pescador p');
    $this->db->join('pesc_seccion5 p5','p.id = p5.pescador_id','left');
    $this->db->where('p5.S5_6_' . $a,1);        
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

function get_report69($a = null, $b = null){
    $this->db->select('COUNT(p.CCDD) as num');
    $this->db->from('pescador p');
    $this->db->join('pesc_seccion7 p7','p.id = p7.pescador_id','left');     
    $this->db->where('p7.S7_6_1',$a);        
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

function get_report85($a = null, $b = null){
    $this->db->select('COUNT(p.CCDD) as num');
    $this->db->from('pescador p');
    $this->db->join('pesc_seccion9 p9','p.id = p9.pescador_id','left');     
    $this->db->where('p9.S9_2' , $a);        
    if(!is_null($b)){
    $this->db->where('p.CCDD',$b);
    }   
    $q = $this->db->get();
    return $q;
}

function get_report86($a = null){
    $this->db->select('p9.S9_4_1,p9.S9_4_2,p9.S9_4_3,p9.S9_4_4,p9.S9_4_5,p9.S9_4_6');
    $this->db->from('pescador p');
    $this->db->join('pesc_seccion9 p9','p.id = p9.pescador_id','left');     
    if(!is_null($a)){
    $this->db->where('p.CCDD',$a);
    }   
    $q = $this->db->get();
    return $q;
}

function get_report87($a = null){
    $this->db->select('p9.S9_5_1,p9.S9_5_2,p9.S9_5_3,p9.S9_5_4,p9.S9_5_5,p9.S9_5_6');
    $this->db->from('pescador p');
    $this->db->join('pesc_seccion9 p9','p.id = p9.pescador_id','left');     
    if(!is_null($a)){
    $this->db->where('p.CCDD',$a);
    }   
    $q = $this->db->get();
    return $q;
}

function get_report88($a = null){
    $this->db->select('p9.S9_6_1,p9.S9_6_2,p9.S9_6_3,p9.S9_6_4,p9.S9_6_5,p9.S9_6_6');
    $this->db->from('pescador p');
    $this->db->join('pesc_seccion9 p9','p.id = p9.pescador_id','left');     
    if(!is_null($a)){
    $this->db->where('p.CCDD',$a);
    }   
    $q = $this->db->get();
    return $q;
}

function get_report89($a = null){
    $this->db->select('p9.S9_7_1,p9.S9_7_2,p9.S9_7_3,p9.S9_7_4,p9.S9_7_5,p9.S9_7_6');
    $this->db->from('pescador p');
    $this->db->join('pesc_seccion9 p9','p.id = p9.pescador_id','left');     
    if(!is_null($a)){
    $this->db->where('p.CCDD',$a);
    }   
    $q = $this->db->get();
    return $q;
}


function get_report90($a = null){
    $this->db->select('p9.S9_9_1_A,p9.S9_9_1_M,p9.S9_9_2_A,p9.S9_9_2_M,p9.S9_9_3_A,p9.S9_9_3_M,p9.S9_9_4_A,p9.S9_9_4_M,p9.S9_9_5_A,p9.S9_9_5_M,p9.S9_9_6_A,p9.S9_9_6_M');
    $this->db->from('pescador p');
    $this->db->join('pesc_seccion9 p9','p.id = p9.pescador_id','left');     
    if(!is_null($a)){
    $this->db->where('p.CCDD',$a);
    }   
    $q = $this->db->get();
    return $q;
}

function get_report91($a = null){
        $this->db->select('p9.S9_11_1,p9.S9_11_2,p9.S9_11_3,p9.S9_11_4,p9.S9_11_5,p9.S9_11_6');
    $this->db->from('pescador p');
    $this->db->join('pesc_seccion9 p9','p.id = p9.pescador_id','left');     
    if(!is_null($a)){
    $this->db->where('p.CCDD',$a);
    }   
    $q = $this->db->get();
    return $q;
}

function get_report92($a = null){
        $this->db->select('p9.S9_12_1,p9.S9_12_2,p9.S9_12_3,p9.S9_12_4,p9.S9_12_5,p9.S9_12_6');
    $this->db->from('pescador p');
    $this->db->join('pesc_seccion9 p9','p.id = p9.pescador_id','left');     
    if(!is_null($a)){
    $this->db->where('p.CCDD',$a);
    }   
    $q = $this->db->get();
    return $q;
}


function get_report93($a = null){
        $this->db->select('p9.S9_13_1,p9.S9_13_2,p9.S9_13_3,p9.S9_13_4,p9.S9_13_5,p9.S9_13_6');
    $this->db->from('pescador p');
    $this->db->join('pesc_seccion9 p9','p.id = p9.pescador_id','left');     
    if(!is_null($a)){
    $this->db->where('p.CCDD',$a);
    }   
    $q = $this->db->get();
    return $q;
}


function get_report94($a = null){
        $this->db->select('p9.S9_15_1,p9.S9_15_2,p9.S9_15_3,p9.S9_15_4,p9.S9_15_5,p9.S9_15_6');
    $this->db->from('pescador p');
    $this->db->join('pesc_seccion9 p9','p.id = p9.pescador_id','left');     
    if(!is_null($a)){
    $this->db->where('p.CCDD',$a);
    }   
    $q = $this->db->get();
    return $q;
}

function get_report95($a = null){
        $this->db->select('p9.S9_16_1,p9.S9_16_2,p9.S9_16_3,p9.S9_16_4,p9.S9_16_5,p9.S9_16_6');
    $this->db->from('pescador p');
    $this->db->join('pesc_seccion9 p9','p.id = p9.pescador_id','left');     
    if(!is_null($a)){
    $this->db->where('p.CCDD',$a);
    }   
    $q = $this->db->get();
    return $q;
}


function get_report96($a = null){
        $this->db->select('p9.S9_18_1,p9.S9_18_2,p9.S9_18_3,p9.S9_18_4,p9.S9_18_5,p9.S9_18_6');
    $this->db->from('pescador p');
    $this->db->join('pesc_seccion9 p9','p.id = p9.pescador_id','left');     
    if(!is_null($a)){
    $this->db->where('p.CCDD',$a);
    }   
    $q = $this->db->get();
    return $q;
}

function get_report97($a = null){
        $this->db->select('p9.S9_20_1_T,p9.S9_20_2_T,p9.S9_20_3_T,p9.S9_20_4_T,p9.S9_20_5_T,p9.S9_20_6_T');
    $this->db->from('pescador p');
    $this->db->join('pesc_seccion9 p9','p.id = p9.pescador_id','left');     
    if(!is_null($a)){
    $this->db->where('p.CCDD',$a);
    }   
    $q = $this->db->get();
    return $q;
}

function get_report98($a = null){
        $this->db->select('p9.S9_21_1,p9.S9_21_2,p9.S9_21_3,p9.S9_21_4,p9.S9_21_5,p9.S9_21_6');
    $this->db->from('pescador p');
    $this->db->join('pesc_seccion9 p9','p.id = p9.pescador_id','left');     
    if(!is_null($a)){
    $this->db->where('p.CCDD',$a);
    }   
    $q = $this->db->get();
    return $q;
}

function get_report99($a = null){
        $this->db->select('p9.S9_23_1,p9.S9_23_2,p9.S9_23_3,p9.S9_23_4,p9.S9_23_5,p9.S9_23_6');
    $this->db->from('pescador p');
    $this->db->join('pesc_seccion9 p9','p.id = p9.pescador_id','left');     
    if(!is_null($a)){
    $this->db->where('p.CCDD',$a);
    }   
    $q = $this->db->get();
    return $q;
}
}
?>