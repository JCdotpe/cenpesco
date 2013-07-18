				

<div class="row-fluid">
	<h4>AVANCE DE CAMPO </4>
</div>

<div class="row-fluid" style="padding-bottom: 20px !important">
	<div class="btn btn-success pull-left"><?php echo anchor('monitoreo/avance/export','Exportar Excel'); ?></div>
</div>

<div class="row-fluid" style="width: 1800px !important">



		<table border="1" class="table table-hover table-condensed" >
			<thead>
				<tr>
					<th rowspan="2" class="success">N°</th>
					<th rowspan="2">SEDE</th>
					<th rowspan="2">ODEI</th>				
					<th rowspan="2">DEPARTAMENTO</th>
					<th rowspan="2">PROVINCIA</th>
					<th rowspan="2">DISTRITO</th>
					<th rowspan="2">CENTRO POBLADO</th>
					<th rowspan="2">DÍA</th>
					<th rowspan="2">MES</th>
					<th rowspan="2" style ="width: 500">JEFE_DE_BRIGADA</th>
					<th colspan="4" style ="text-align: center">COMUNIDADES</th>
					<th colspan="4" style ="text-align: center">PESCADOR </th>
					<th rowspan="2" style ="text-align: center">EMBARCACIONES</th>					
					<th colspan="4" style ="text-align: center">ACUICULTOR </th>
					<th rowspan="2" style ="text-align: center">EMBARCACIONES</th>
				</tr>		
				<tr>
					<th>TOTAL </th>
					<th> COMPLETOS</th>
					<th> INCOMPLETOS</th>
					<th> RECHAZADOS</th>
					<th> TOTAL</th>
					<th> COMPLETOS</th>
					<th> INCOMPLETOS</th>
					<th> RECHAZADOS</th>
					<th> TOTAL</th>
					<th> COMPLETOS</th>
					<th> INCOMPLETOS</th>
					<th> RECHAZADOS</th>
					</tr>							
			</thead>
			<tbody>
<?php 						
			$num = 1;
			foreach($tables->result() as $row){
				echo "<tr>";
					echo "<td>". $num++ ."</td>";
					echo '<td>'. $row->NOM_SEDE ."</td>";
					echo "<td>". $row->NOM_ODEI ."</td>";					
					echo "<td>". $row->NOM_DD ."</td>";
					echo "<td>". $row->NOM_PP ."</td>";
					echo "<td>". $row->NOM_DI ."</td>";
					echo "<td>". $row->NOM_CCPP ."</td>";
					echo "<td>". $row->F_D ."</td>";
					echo "<td>". $row->F_M ."</td>";
					echo '<td width="400">'. $row->NOM_BRI ."</td>";

					echo '<td style ="text-align: center">'. $row->C_TOTAL."</td>";
					echo '<td style ="text-align: center">'. $row->C_COMP."</td>";
					echo '<td style ="text-align: center">'. $row->C_INC."</td>";
					echo '<td style ="text-align: center">'. $row->C_RECH."</td>";

					echo '<td style ="text-align: center">'. $row->P_TOTAL."</td>";
					echo '<td style ="text-align: center">'. $row->P_COMP."</td>";
					echo '<td style ="text-align: center">'. $row->P_INC."</td>";
					echo '<td style ="text-align: center">'. $row->P_RECH."</td>";
					echo '<td style ="text-align: center">'. $row->E_TOTAL_A."</td>";	

					echo '<td style ="text-align: center">'. $row->A_TOTAL."</td>";
					echo '<td style ="text-align: center">'. $row->A_COMP."</td>";						
					echo '<td style ="text-align: center">'. $row->A_INC."</td>";						
					echo '<td style ="text-align: center">'. $row->A_RECH."</td>";
					echo '<td style ="text-align: center">'. $row->E_TOTAL_P."</td>";	

				echo "</tr>";  }
			echo '</tbody>';
		echo '</table>';

?>

</div>