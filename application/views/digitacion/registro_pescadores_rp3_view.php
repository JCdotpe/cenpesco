
<?php 
 		
		echo '<div class="row-fluid">';

			echo '<div class="span12">';

				echo '<table border="1" class="table table-hover table-condensed">';
					echo '<thead>';
						echo '<tr>';
						echo '<th>N°</th>';
						echo '<th>Apellidos y Nombres</th>';
						echo '<th>Sexo</th>';
						echo '<th>DNI N°</th>';
						echo '<th>Ocupación</th>';
						echo '<th>Tipo de vía</th>';
						echo '<th>Nombre de Vía</th>';
						echo '<th>N° de Puerta</th>';
						echo '<th>Block</th>';
						echo '<th>Interior N°</th>';
						echo '<th>Piso N°</th>';
						echo '<th>Mz</th>';
						echo '<th>Lote</th>';
						echo '<th>Km</th>';
						echo '<th>N° Embarcaciones</th>';
						echo '</tr>';
					echo '</thead>';
					echo '<tbody>';
					foreach($tables as $row){
						echo "<tr>";
						echo "<td><div class='input_edit' id='P1_". $row->id_reg . "_". $row->id_dat ."' name='P1_". $row->id_reg . "_". $row->id_dat ."' >". $row->P1 ."</div></td>";
						echo "<td><div class='input_edit' id='P2_". $row->id_reg . "_". $row->id_dat ."' name='P2_". $row->id_reg . "_". $row->id_dat ."' >". $row->P2 ."</div></td>";
						echo "<td><div class='input_edit' id='P3_". $row->id_reg . "_". $row->id_dat ."' name='P3_". $row->id_reg . "_". $row->id_dat ."' >". $row->P3 ."</div></td>";
						echo "<td><div class='input_edit' id='P4_". $row->id_reg . "_". $row->id_dat ."' name='P4_". $row->id_reg . "_". $row->id_dat ."' >". $row->P4 ."</div></td>";
						echo "<td><div class='input_edit' id='P5_". $row->id_reg . "_". $row->id_dat ."' name='P5_". $row->id_reg . "_". $row->id_dat ."' >". $row->P5 ."</div></td>";
						echo "<td><div class='input_edit' id='P6_". $row->id_reg . "_". $row->id_dat ."' name='P6_". $row->id_reg . "_". $row->id_dat ."' >". $row->P6 ."</div></td>";
						echo "<td><div class='input_edit' id='P7_". $row->id_reg . "_". $row->id_dat ."' name='P7_". $row->id_reg . "_". $row->id_dat ."' >". $row->P7 ."</div></td>";
						echo "<td><div class='input_edit' id='P8_". $row->id_reg . "_". $row->id_dat ."' name='P8_". $row->id_reg . "_". $row->id_dat ."' >". $row->P8 ."</div></td>";
						echo "<td><div class='input_edit' id='P9_". $row->id_reg . "_". $row->id_dat ."' name='P9_". $row->id_reg . "_". $row->id_dat ."' >". $row->P9 ."</div></td>";
						echo "<td><div class='input_edit' id='P10_". $row->id_reg . "_". $row->id_dat ."' name='P10_". $row->id_reg . "_". $row->id_dat ."' >". $row->P10 ."</div></td>";
						echo "<td><div class='input_edit' id='P11_". $row->id_reg . "_". $row->id_dat ."' name='P11_". $row->id_reg . "_". $row->id_dat ."' >". $row->P11 ."</div></td>";
						echo "<td><div class='input_edit' id='P12_". $row->id_reg . "_". $row->id_dat ."' name='P12_". $row->id_reg . "_". $row->id_dat ."' >". $row->P12 ."</div></td>";
						echo "<td><div class='input_edit' id='P13_". $row->id_reg . "_". $row->id_dat ."' name='P13_". $row->id_reg . "_". $row->id_dat ."' >". $row->P13 ."</div></td>";
						echo "<td><div class='input_edit' id='P14_". $row->id_reg . "_". $row->id_dat ."' name='P14_". $row->id_reg . "_". $row->id_dat ."' >". $row->P14 ."</div></td>";
						echo "<td><div class='input_edit' id='P15_". $row->id_reg . "_". $row->id_dat ."' name='P15_". $row->id_reg . "_". $row->id_dat ."' >". $row->P15 ."</div></td>";
						echo "</tr>";  }
					echo '</tbody>';
				echo '</table>';

			echo '</div>'; 	

		echo '</div>'; 

?>		

<script type="text/javascript">

$(function () {

//$(".input_edit").editable( CI.base_url + "digitacion/registro_pescadores/edit_detalle/" );


$(".input_edit").editable( function(value, settings) {
        selectedId = $(this).attr("id");
        $.ajax({
            url: CI.base_url + "digitacion/registro_pescadores/edit_detalle/" + $.now(),
            type:'post',
            data:{
                    //requestType: "Trans",
                    id : $(this).attr("id"),
                    value:  value,
                    csrf_token_c: CI.cct,
                },
            success: function(data) {
                if (data != "Error")
                    {
                        //$("#"+selectedId).html(data);
                        alert(data);
                    }
            },
            error: function(req) {
                alert("Error in request. Por favor intentelo luego.");
            }
        });
        return value; //need the return
    },{
         indicator : 'Guardando...',
         tooltip   : 'Click para editar'
});





})
</script>