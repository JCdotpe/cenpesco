<div>

<table border="2" class="table table-striped box-header" id="tabla_avance_fijo">


									<caption><h3>
													AVANCE DE CAMPO DE LA ETAPA DE CONTROL FINAL
													<br><strong>
													AL 19/12/2013 </strong>
									     </h3></caption>

<thead style="font-size:15px">
<tr><strong>
	<td style="vertical-align:middle;text-align:center" rowspan="2">N°</td>
	<td style="vertical-align:middle;text-align:center" rowspan="2">Departamento</td>
	<td style="vertical-align:middle;text-align:center" rowspan="2">Provincias</td>
	<td style="vertical-align:middle;text-align:center" rowspan="2">Distritos</td>
	<td style="vertical-align:middle;text-align:center" rowspan="2">Centros Poblados</td>
	<td style="vertical-align:middle;text-align:center" colspan="5" >Meta estimada</td>
	<td style="vertical-align:middle;text-align:center" rowspan="2">Avance de CC.PP.</td>
	<td style="vertical-align:middle;text-align:center;background-color: #95ECAE" rowspan="2">TOTAL</td>
	<td style="vertical-align:middle;text-align:center" colspan="5">Pescadores empadronados</td>
	<td style="vertical-align:middle;text-align:center" colspan="5">Acuicultores empadronados</td>
	<td style="vertical-align:middle;text-align:center" rowspan="2">F.Comunidad</td>
</tr></strong>
<tr>

<td style="background-color: #95ECAE">Total</td>	
<td>Del 09 al 11</td>	
<td>Del 12 al 14</td>	
<td>Del 15 al 17</td>	
<td>Del 18 al 20</td>
<td>Total</td>	
<td>Del 09 al 11</td>	
<td>Del 12 al 14</td>	
<td>Del 15 al 17</td>	
<td>Del 18 al 20</td>
<td>Total</td>	
<td>Del 09 al 11</td>	
<td>Del 12 al 14</td>	
<td>Del 15 al 17</td>	
<td>Del 18 al 20</td>

</tr>

</thead>
<tbody>
<?php 
	foreach ($tables->result() as $key => $fila) {
		echo '<tr>';
		foreach ($fila as $celda) {
			
			echo '<td>'. $celda .'</td>';
		}
		echo '</tr>';
		
	}


?>
</tbody>
</table>



</div>