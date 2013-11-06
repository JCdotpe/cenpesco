<?php	if ( ! defined('BASEPATH')) exit('No direct script access allowed');


/**
* 
*/
class Export extends CI_Controller
{
	
	function __construct()
	{
		parent::__construct();
		$this->load->helper('security');
		//$this->load->library('PHPExcel');
	}

	public function index()
	{	
		$opcion = $this->input->post('reporte_n');
		if ($opcion >=1 && $opcion <= 99 ) {
			$filename = "pescador_";
		} else if(($opcion >=100 && $opcion <= 199 )){
			$filename = "acuicultor_";
		} else if(($opcion >=200 && $opcion <= 260 )){
			$filename = "comunidad_";
		}
		
		//header("Content-type: application/octet-stream"); 
		header("Content-type: application/vnd.ms-excel; name='excel'");
		header("Content-Disposition: attachment; filename=". $filename . $this->input->post("reporte_n").".xls;");
		header("Cache-Control: max-age=0");
		header("Pragma: no-cache");
		header("Expires: 0");
		//echo "</br></br>";

		echo utf8_decode( $this->input->post("excel_div") );	
		echo utf8_decode("<strong>Fuente: Instituto Nacional de Estadística e Informática - Primer Censo Nacional de Pesca Continental 2013.</strong>");		
		echo "<br><br>";
		echo utf8_decode( $this->input->post("textn"));

	}
}

?>