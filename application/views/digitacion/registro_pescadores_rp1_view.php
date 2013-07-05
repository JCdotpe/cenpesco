
<div class="row-fluid">
  <div class="span2">
        <?php $this->load->view('digitacion/includes/sidebar_view.php'); ?>
  </div><!--/span-->

  <div class="span10">

		<table border="1" class="table table-hover table-condensed" style="width: 100%;">
			<thead>
				<tr>
				<th class="span1">COD SEDE</th>
				<th class="span1">SEDE</th>
				<th class="span1">COD ODEI</th>
				<th class="span1">ODEI</th>
				<th class="span1">Departamento</th>
				<th class="span1">COD</th>
				<th class="span1">Provincia</th>
				<th class="span1">COD</th>
				<th>Distrito</th>
				<th>COD</th>
				<th class="span2">Centro Poblado</th>
				<th>COD</th>
				<th>Autoridad</th>
				<th>DNI N°</th>
				<th>Fecha</th>	
				<th>T. Filas</th>
				<th>T. Pes.</th>
				<th>T. Acui.</th>
				<th>T. Embar.</th>	
				<th>Empadronador</th>
				<th>DNI N°</th>	
				<th>Reg. N°</th>
				<th>Nombres</th>	
				<th>Sexo</th>
				<th>DNI N°</th>
				<th>Ocupacion</th>
				<th>T. Via</th>	
				<th>Nombre Via</th>
				<th>Puerta</th>
				<th>Block</th>	
				<th>Interior</th>
				<th>Piso</th>
				<th>Mz.</th>
				<th>Lote</th>	
				<th>KM.</th>
				<th>N° Embar.</th>															
				</tr>
			</thead>
			<tbody>
		<?php  
			$contador=0;
			$n = 0;
			foreach($registros->result() as $row){

				echo "<tr>";
				echo "<td>". $row->SEDE_COD ."</td>";
				echo "<td>". $row->NOM_SEDE ."</td>";
				echo "<td>". $row->ODEI_COD ."</td>";
				echo "<td>". $row->NOM_ODEI ."</td>";				
				echo "<td>". $row->NOM_DD ."</td>";
				echo "<td>". $row->CCDD ."</td>";
				echo "<td>". $row->NOM_PP ."</td>";
				echo "<td>". $row->CCPP ."</td>";
				echo "<td>". $row->NOM_DI ."</td>";
				echo "<td>". $row->CCDI ."</td>";	
				echo "<td>". $row->NOM_CCPP ."</td>";
				echo "<td>". $row->COD_CCPP ."</td>";
				echo "<td>". $row->NOM_AUT ."</td>";
				echo "<td>". $row->DNI_AUT ."</td>";
				echo "<td>". $row->F_D."/".$row->F_M."/".$row->F_A."</td>";
				echo "<td>". $row->T_F_D ."</td>";								
				echo "<td>". $row->T_PES ."</td>";	
				echo "<td>". $row->T_ACUI ."</td>";	
				echo "<td>". $row->T_EMB ."</td>";	
				echo "<td>". $row->NOM_EMP ."</td>";	
				echo "<td>". $row->DNI_EMP ."</td>";
				echo "<td>". $contador = $contador + 1 ."</td>";							
				echo "<td>". $row->P2 ."</td>";	
				echo "<td>". $row->P3 ."</td>";	
				echo "<td>". $row->P4 ."</td>";	
				echo "<td>". $row->P5 ."</td>";	
				echo "<td>". $row->P6 ."</td>";	
				echo "<td>". $row->P7."</td>";								
				echo "<td>". $row->P8 ."</td>";	
				echo "<td>". $row->P9 ."</td>";	
				echo "<td>". $row->P10 ."</td>";	
				echo "<td>". $row->P11 ."</td>";	
				echo "<td>". $row->P12 ."</td>";	
				echo "<td>". $row->P13 ."</td>";	
				echo "<td>". $row->P14 ."</td>";	
				echo "<td>". $row->P15 ."</td>";																
				echo "</tr>";  
			}
		?>
			</tbody>
		</table>




  </div>

</div>
