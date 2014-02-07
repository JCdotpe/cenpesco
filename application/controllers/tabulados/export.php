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
		$this->load->library('PHPExcel');
	}

	public function index()
	{	
/*
		$objReader = PHPExcel_IOFactory::createReader('HTML');
		$objPHPExcel = $objReader->load($this->input->post("excel_div"));

		$objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel2007');
		$objWriter->save("myExcelFile.xlsx");
	*/
		


		$opcion = $this->input->post('reporte_n');
		if ($opcion >=1 && $opcion <= 99 ) {
			$filename = "pescador_";
		} else if(($opcion >=100 && $opcion <= 197 )){
			$filename = "acuicultor_";
		} else if(($opcion >=198 && $opcion <= 260 )){
			$filename = "comunidad_";
		}
		
		//header("Content-type: application/octet-stream"); 
		header("Content-type: application/vnd.ms-excel; name='excel'");
		header("Content-Disposition: attachment; filename=". $filename . $this->input->post("reporte_n").".xls;");
		header("Cache-Control: max-age=0");
		header("Pragma: no-cache");
		header("Expires: 0");

		$cantidad_var =  ( ($this->input->post("cantidad_var")*2) + (  ($this->input->post("nombre_var") == 'Si' || $this->input->post("nombre_var") == 'SI' ) ? 1 : 0  ) );
		//echo "</br></br>";<img src="http://192.168.201.217/cenpesco/img/cenpesco.jpg" style="margin-top: 6.5px;">
		echo  '<table><tr><td width="63px" rowspan="4" colspan="'. ( ($this->input->post("cantidad_var")*2) + (  ($this->input->post("nombre_var") == 'Si' || $this->input->post("nombre_var") == 'SI' ) ? 1 : 0  ) ).'">
				<img src="'. base_url('img/inei_2.jpeg') .'"  width="140" height="90" />
  			</td>';
		echo '<td width="20%" rowspan="4" colspan="2">
				<img src="'. base_url('img/cenpesco.png') .'"  width="90" height="90" />
  			</td></tr></table>';
		//echo '<img style="margin-top: 6.5px;" src=" '. base_url('img/inei.png') .'"/>';
		
		echo utf8_decode( $this->input->post("excel_div") );	
		echo "<tr><td colspan='".$cantidad_var."'><strong>". utf8_decode('Fuente: Instituto Nacional de Estadística e Informática - Primer Censo Nacional de Pesca Continental 2013.'). "</strong></td></tr>";	
	
		echo "<br><h3>COMENTARIOS</h3><hr>";
		echo '<table><tr><td colspan="'.($cantidad_var+1).'" >'. utf8_decode( $this->input->post("textn")) . '</td></tr>';
		echo '<tr><td colspan="'.($cantidad_var+1).'" >'. utf8_decode( $this->input->post("textn_2")) . '</td></tr></table>';
		//echo utf8_decode( $this->input->post("metadata_div") );	

		echo '<h3>METADATOS</h3><hr>';
		echo '<table id="tab_meta" name="tab_meta" >
			<tr>
				<td width="30px" style="vertical-align:middle;"><h5>TABULADO </h5></td><td colspan="'.$cantidad_var.'" style="padding-left:2em;vertical-align:middle;">'. utf8_decode($this->input->post("txt_tabulado") ). '</td>
			</tr>
			<tr>
				<td width="30px" style="vertical-align:middle;"><h5>CONTENIDO </h5></td><td colspan="'.$cantidad_var.'" style="padding-left:2em;vertical-align:middle;">' . utf8_decode($this->input->post("txt_contenido") ). '</td>
			</tr>
			<tr>
				<td width="30px" style="vertical-align:middle;"><h5>CASOS </h5></td><td colspan="'.$cantidad_var.'" style="padding-left:2em;vertical-align:middle;">' . utf8_decode($this->input->post("txt_casos") ). '</td>
			</tr>
			<tr>
				<td width="30px" style="vertical-align:middle;"><h5>VARIABLES </h5></td><td colspan="'.$cantidad_var.'" style="padding-left:2em;vertical-align:middle;">' . utf8_decode($this->input->post("txt_variables") ). '</td>
			</tr>
			<tr>
				<td width="30px" style="vertical-align:middle;"><h5>ALTERNATIVAS </h5></td><td colspan="'.$cantidad_var.'" style="padding-left:2em;vertical-align:middle;">' . utf8_decode($this->input->post("txt_alternativas") ). '</td>
			</tr>
			<tr>
				<td width="30px" style="vertical-align:middle;"><h5>OTRO </h5></td><td colspan="'.$cantidad_var.'" style="padding-left:2em;vertical-align:middle;">' . utf8_decode($this->input->post("txt_otro") ). '</td>
			</tr>		
			<tr>
				<td width="30px" style="vertical-align:middle;"><h5>DATOS FALTANTES </h5></td><td colspan="'.$cantidad_var.'" style="padding-left:2em;vertical-align:middle;">' .utf8_decode( $this->input->post("txt_faltantes") ). '</td>
			</tr>
			<tr>
				<td width="30px" style="vertical-align:middle;"><h5>INSTITUCION </h5></td><td colspan="'.$cantidad_var.'" style="padding-left:2em;vertical-align:middle;">' . utf8_decode($this->input->post("txt_productor") ).  '</td>
			</tr>		
			<tr>
				<td width="30px" style="vertical-align:middle;"><h5>DEFINICIONES </h5></td><td colspan="'.$cantidad_var.'" style="padding-left:2em;vertical-align:middle;">' . str_replace("\r\n","<br/>",utf8_decode($this->input->post("txt_definiciones") )). '</td>
			</tr>
		</table>';

		echo '<br><br>';
		echo "<tr><td colspan='".$cantidad_var."'><strong>". utf8_decode('Fuente: Instituto Nacional de Estadística e Informática - Primer Censo Nacional de Pesca Continental 2013.'). "</strong></td></tr>";


	}
}

?>