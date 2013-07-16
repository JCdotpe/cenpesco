				

<div class="row-fluid">

<h4>INFORME DE REVISION EN GAVINETE </4>


</div>
<div class="row-fluid" style="width: 1800px !important">
</div>

		<table border="1" class="table table-hover table-condensed" >
			<thead>
				<tr>
				<th style="width: 10px !important">N°</th>
				<th style="width: 160px !important">SEDE</th>
				<th style="width: 160px !important">ODEI</th>				
				<th style="width: 160px !important">Departamento</th>
				<th style="width: 160px !important">Provincia</th>
				<th style="width: 160px !important">Distrito</th>
				<th style="width: 180px !important">Centro Poblado</th>
				<th style="width: 20px !important">Día</th>
				<th style="width: 20px !important">Mes</th>
				<th style="width: 190px !important">Funcionario</th>
				<th style="width: 10px !important">Cargo </th>
				<th style ="text-align: center">Formulario Pescador</th>
				<th style ="text-align: center">Formulario Acuicultor</th>
				<th style ="text-align: center">Formulario Comunidades</th>
				<th style ="text-align: center">Seccion</th>
				<th style ="text-align: center">Pregunta</th>
				<th style ="text-align: center">Error de concepto</th>
				<th style ="text-align: center">Error de diligenciamiento</th>
				<th style ="text-align: center">Error de omision</th>
				<th style ="text-align: center">Descripccion del error</th>
				</tr>
			</thead>
			<tbody>
<?php 						
			$num = 1;
			foreach($tables as $row){
				echo "<tr>";
					echo "<td>". $num++ ."</td>";
					echo "<td>". $row->NOM_SEDE ."</td>";
					echo "<td>". $row->NOM_ODEI ."</td>";					
					echo "<td>". $row->NOM_DD ."</td>";
					echo "<td>". $row->NOM_PP ."</td>";
					echo "<td>". $row->NOM_DI ."</td>";
					echo "<td>". $row->NOM_CCPP ."</td>";
					echo "<td>". $row->F_D ."</td>";
					echo "<td>". $row->F_M ."</td>";
					echo "<td>". $row->NOM ."</td>";
					echo "<td>". $row->CARGO ."</td>";
					echo "<td>". $row->F_PES."</td>";
					echo "<td>". $row->F_ACU."</td>";
					echo "<td>". $row->F_COM."</td>";
					echo "<td>". $row->SEC."</td>";
					echo "<td>". $row->PREG_N."</td>";
					echo "<td>". $row->E_CONC."</td>";
					echo "<td>". $row->E_DILIG."</td>";
					echo "<td>". $row->E_OMI."</td>";
					echo "<td>". $row->DES_E."</td>";						
				echo "</tr>";  }
			echo '</tbody>';
		echo '</table>';

?>