<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');



class Pescador_report extends CI_Controller
{
	function __construct()
	{
		parent::__construct();
		$this->load->library(array('table','form_validation'));
		$this->load->helper(array('form','url','my'));	
		$this->load->model("udra_pescador_model");	
        // Starting the PHPExcel library
        // $this->load->library('PHPExcel');
        // $this->load->library('PHPExcel/PHPExcel_IOFactory');		
	}
	

	function index()
	{
		$query  = $this->udra_pescador_model->get_todo();
		$this->my->to_excel($query,'exportacion');

	}
}















