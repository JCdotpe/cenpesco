<?php
class Test extends CI_Model{
    function create_email($data){
    	$query = $this->db->insert('email_alert', $data);
		return $query;
    }
    function valid_email($email){
    	$this->db->where('email', $email);
    	$this->db->where('active',1);
    	$q = $this->db->get('email_alert');
		return $q;
    }    

    //Upload files********************************************************
    function get_tocmails_num()
    {
        $this->db->select('id');
        $this->db->where('active',1);
        $query = $this->db->get('email_alert')->num_rows();
        return $query;
    }

    function get_tocmails()
    {
        $this->db->where('active',1);
        $query = $this->db->get('email_alert');
        return $query;
    }

    function get_tocmails_pag($a,$b)
    {
        $this->db->where('active',1);
        $this->db->limit($a, $b);
        $this->db->order_by('id');
        $query = $this->db->get('email_alert');
        return $query;
    }
}