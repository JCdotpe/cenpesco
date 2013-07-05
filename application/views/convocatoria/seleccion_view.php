<?php 
  $label_class =  array('class' => 'control-label');
  $distArray = array(-1 => '-'); 
  $provArray = array(-1 => '-'); 
  $depaArray = array(-1 => 'Todos'); 
    foreach($odeis->result() as $filas)
    {
      $depaArray[$filas->COD_DEPARTAMENTO]=strtoupper($filas->DES_DISTRITO);
    }     
 ?>



<div class="row-fluid">
  <div class="row-fluid">
  <div id="ap-sidebar" class="span2">
  <?php $this->load->view('convocatoria/includes/sidebar_view.php'); ?>
  </div>

  <div id="ap-content" class="span10">

   <div class="row-fluid well top-conv">

  <div class="span1" id="LoadingImage" style="margin-top:30px">
  <img src="<?php echo base_url('img/indicator.gif') ?>">
  </div> 

     <div class="span3">
      <div class="control-group">
        <?php echo form_label('ODEI', 'departamento', $label_class); ?>
          <div class="controls">
            <?php echo form_dropdown('departamento', $depaArray, FALSE,'class="span10" id="departamento" autocomplete="off"'); ?>
         </div>  
       </div> 
     </div>

<!--      <div class="span3">
       <div class="control-group">
        <?php //echo form_label('Provincia', 'provincia', $label_class); ?>
         <div class="controls">
          <?php //echo form_dropdown('provincia', $provArray, FALSE,'class="span10" id="provincia"');  ?>
         </div> 
       </div>
      </div>  -->

<!--      <div class="span3">
        <div class="control-group">
          <?php //echo form_label('Distrito', 'distrito', $label_class); ?>
         <div class="controls">
          <?php //echo form_dropdown('distrito', $distArray, FALSE,'class="span10" id="distrito"');  ?>
          </div>
        </div>  
      </div>  -->

<!--      <div class="span1">
          <?php //echo form_button('car','Filtrar', 'class="btn btn-primary" id="car" style="margin-top:20px"'); ?>
      </div> -->
      <div class="span1">
      <?php echo form_button('ver','Visualizar','class="btn btn-primary" id="ver" style="margin-top:20px"'); ?>
      </div>

  </div>


<div class="row-fluid well top-conv" style="background-color:#A9DDFE;border: 1px solid #BEBEBE;">
  <div class="span3">
    <p><b>Pea a Capacitar</b></p>
    <div id="show_cap" style="font-size:18px;"></div>
  </div>
  
  <div class="span3 hide">
    <p><b>Inscritos</b></p>
     <div id="show_ins" style="font-size:18px;"></div>
  </div>

  <div class="span3">
    <p style="color:red;"><b>Capacitando</b></p>
     <div id="show_sel" style="font-size:18px;"></div>
  </div>

  <div class="span1 controles hide">
    <?php echo form_button('sel','Seleccionar', 'class="btn btn-success" id="sel" style="margin-top:5px"'); ?>
  </div>



</div>

<table id="t_regs" cellpadding="0" cellspacing="0" border="0" class="display" style="width: 100%;">
    <thead>
    <tr>
      <th>ID</th>
      <th>Elegido</th>
      <th>DNI</th>
      <th>Departamento</th>   
       <th>ODEI</th>      
      <th>Cargo</th>   
       <th>CV</th>
      <th>Primer nombre</th>
      <th>Segundo nombre</th>
      <th>Ap.paterno</th>
      <th>Ap.materno</th>     
      <th>Sexo</th>
      <th>Dpto. Nac</th>
      <th>Prov. Nac</th>
      <th>Dist. Nac</th>
      <th>Fecha Nac</th>
      <th>RUC</th>
      <th>Est. civil</th>
      <th>Teléfono</th>
      <th>Celular</th>
      <th>Email</th>
      <th>Dpto. domicilio</th>
      <th>Prov. domicilio</th>
      <th>Dist. domicilio</th>
      <th>Tipo vía</th>
      <th>Nombre vía</th>
      <th>Nro</th>
      <th>Km</th>
      <th>Mz</th>
      <th>Lote</th>
      <th>Interior</th>
      <th>dpto</th>
      <th>piso</th>
      <th>Tipo zona</th>
      <th>Nombre zona</th>
      <th>Nivel Instrucción</th>
      <th>Grado Alcanzado</th>
      <th>Periodo Alcanzado</th>
      <th>Tipo Periodo</th>
      <th>Ocupación</th>
      <th>Universidad</th>
      <th>Centro Estudios</th>
      <th>EXP_GEN_A</th>
      <th>EXP_GEN_M</th>
      <th>EXP_TRAB_A</th>
      <th>EXP_TRAB_M</th> 
      <th>EXP_GRUP_A</th>
      <th>EXP_GRUP_M</th>  
      <th>Ofimática</th>      
      <th>Velocidad PC</th>              
      <th>Participó INEI</th>
      <th>Último año INEI</th>
      <th>Proyecto INEI</th>
      <th>Cargo INEI</th>
      <th>Impedimento</th>
      <th>Disposición tiempo</th>
      <th>IP</th> 
      <th>User Agent</th> 
      <th>Estado</th>
      <th>Activo</th>      
    </tr>
  </thead>
    <tfoot>
    <!-- <tr>
      <th><input type="text" name="" value="ID" class="search_init input-small" /></th>
      <th><input type="text" name="" value="DNI" class="search_init input-small" /></th>
      <th><input type="text" name="" value="Departamento" class="search_init input-small" /></th>
      <th><input type="text" name="" value="Primer nombre" class="search_init input-small" /></th>
      <th><input type="text" name="" value="Segundo nombre" class="search_init input-small" /></th>
      <th><input type="text" name="" value="Ap.paterno" class="search_init input-small" /></th>
      <th><input type="text" name="" value="Ap.materno" class="search_init input-small" /></th>
      <th><input type="text" name="" value="Sexo" class="search_init input-small" /></th>
      <th><input type="text" name="" value="Dpto. Nac" class="search_init input-small" /></th>
      <th><input type="text" name="" value="Prov. Nac" class="search_init input-small" /></th>
      <th><input type="text" name="" value="Dist. Nac" class="search_init input-small" /></th>
      <th><input type="text" name="" value="Fecha Nac" class="search_init input-small" /></th>
      <th><input type="text" name="" value="RUC" class="search_init input-small" /></th>
      <th><input type="text" name="" value="Est. civil" class="search_init input-small" /></th>
      <th><input type="text" name="" value="Teléfono" class="search_init input-small" /></th>
      <th><input type="text" name="" value="Celular" class="search_init input-small" /></th>
      <th><input type="text" name="" value="Email" class="search_init input-small" /></th>
      <th><input type="text" name="" value="Prov. domicilio" class="search_init input-small" /></th>
      <th><input type="text" name="" value="Dist. domicilio" class="search_init input-small" /></th>
      <th><input type="text" name="" value="Fecha domicilio" class="search_init input-small" /></th>      
      <th><input type="text" name="" value="Tipo vía" class="search_init input-small" /></th>      
      <th><input type="text" name="" value="Nombre vía" class="search_init input-small" /></th>      
      <th><input type="text" name="" value="Nro" class="search_init input-small" /></th>      
      <th><input type="text" name="" value="Km" class="search_init input-small" /></th>      
      <th><input type="text" name="" value="Mz" class="search_init input-small" /></th>      
      <th><input type="text" name="" value="Lote" class="search_init input-small" /></th>      
      <th><input type="text" name="" value="Interior" class="search_init input-small" /></th>      
      <th><input type="text" name="" value="dpto" class="search_init input-small" /></th>      
      <th><input type="text" name="" value="piso" class="search_init input-small" /></th>   
      <th><input type="text" name="" value="Tipo zona" class="search_init input-small" /></th>      
      <th><input type="text" name="" value="Nombre zona" class="search_init input-small" /></th>   
      <th><input type="text" name="" value="Nivel Instrucción" class="search_init input-small" /></th>   
      <th><input type="text" name="" value="Grado Alcanzado" class="search_init input-small" /></th>   
      <th><input type="text" name="" value="Periodo Alcanzado" class="search_init input-small" /></th>   
      <th><input type="text" name="" value="Tipo Periodo" class="search_init input-small" /></th>   
      <th><input type="text" name="" value="Ocupación" class="search_init input-small" /></th>   
      <th><input type="text" name="" value="Universidad" class="search_init input-small" /></th>   
      <th><input type="text" name="" value="Centro Estudios" class="search_init input-small" /></th>   
      <th><input type="text" name="" value="EXP_GEN_A" class="search_init input-small" /></th>   
      <th><input type="text" name="" value="EXP_GEN_M" class="search_init input-small" /></th>   
      <th><input type="text" name="" value="EXP_TRAB_A" class="search_init input-small" /></th>   
      <th><input type="text" name="" value="EXP_TRAB_M" class="search_init input-small" /></th>   
      <th><input type="text" name="" value="EXP_GRUP_A" class="search_init input-small" /></th>   
      <th><input type="text" name="" value="EXP_GRUP_M" class="search_init input-small" /></th>   
      <th><input type="text" name="" value="Participó INEI" class="search_init input-small" /></th>   
      <th><input type="text" name="" value="Último año INEI" class="search_init input-small" /></th>   
      <th><input type="text" name="" value="Proyecto INEI" class="search_init input-small" /></th>   
      <th><input type="text" name="" value="Cargo INEI" class="search_init input-small" /></th>   
      <th><input type="text" name="" value="Disposición tiempo" class="search_init input-small" /></th>  
      <th><input type="text" name="" value="IP" class="search_init input-small" /></th>    
      <th><input type="text" name="" value="User Agent" class="search_init input-small" /></th>    
      <th><input type="text" name="" value="Estado" class="search_init input-small" /></th>   
      <th><input type="text" name="" value="Activo" class="search_init input-small" /></th>   
    </tr> -->
  </tfoot>
  <tbody></tbody>
  </table>



</div>
  </div>

<?php echo form_hidden('hidedep', '-1'); ?>
</div>
  <?php $this->load->view('convocatoria/includes/footer_view.php'); ?>


      <script type="text/javascript" charset="utf-8">
      var oTable;
      $(document).ready(function() {


          var ecivil = <?php echo json_encode($ecivil); ?>;
          var nivel = <?php echo json_encode($nivel); ?>;
          var grado = <?php echo json_encode($grado); ?>;
          var tvia = <?php echo json_encode($tvia); ?>;
          var tzona = <?php echo json_encode($tzona); ?>;
          var sino = <?php echo json_encode($sino); ?>;
          var cargos = <?php echo json_encode($cargos); ?>;
          var periodo = <?php echo json_encode($periodo); ?>;
          var ocupacion = <?php echo json_encode($ocupacion->result_array()); ?>;
          var universidades = <?php echo json_encode($universidad->result_array()); ?>;       
          var cargos_f = <?php echo json_encode($cargos_f->result_array()); ?>;
          var proyectos = <?php echo json_encode($proyectos->result_array()); ?>;
      oTable = $('#t_regs').dataTable({
        "sScrollY": "400px",
        "sScrollX": "100%",
        //"sScrollXInner": "110%",
        "bScrollCollapse": true,     
        // "fnInitComplete": function(){this.fnSetFilteringDelay(700);},//this is callback function
        "fnDrawCallback" : function(){$("#LoadingImage").hide();},             
        "oLanguage": {
            "sProcessing": "Procesando",
            "sLengthMenu": "Mostrar _MENU_ registros por página",
            "sZeroRecords": "No se encontraron registros",
            "sInfo": "Mostrando _START_ - _END_ de _TOTAL_ registros",
            "sInfoEmpty": "Mostrando 0 to 0 of 0 records",
            "sInfoFiltered": "(Filtrado de _MAX_ registros en total)",                 
            "sSearch": "Buscar:", 
            "oPaginate": {
                "sNext": "Siguiente", 
                "sPrevious": "Anterior"
              }               

        },   
        "sDom": 'T<"clear">lfrtip',
        "oTableTools": {
            "sSwfPath": CI.site_url + "extra/copy_csv_xls.swf",
            "aButtons": [
                  "copy",
                  "xls"
            ]          
        },         
        "bProcessing": true,
              "bServerSide": true,
              "sServerMethod": "POST",
              "sAjaxSource": '<?php echo site_url('convocatoria/seleccion/getTable') ?>',
      "fnServerParams": function ( aoData ) {
            aoData.push( 
               { "name": "csrf_token_c", "value": CI.cct },
              { "name": "dep", "value": $('#departamento').val() } 
              );
        },                
              "iDisplayLength": 10,
              "aLengthMenu": [[10, 25, 50, -1], [10, 25, 50, "Todos"]],
              "aaSorting": [[0, 'asc']],
        
              // "aoColumnDefs": [
              //    {
              //         "aTargets": [1],
              //         "mData": 1,
              //         "mRender": function (data, type, full) {
              //             return '<input type="checkbox" name="acept[]" value="' + data + '" id="acept' + data + '">';
              //         }
              //     }
              //  ],

              "aoColumns": [

          { "bVisible": true, "bSearchable": true, "bSortable": true},
          { "bSortable": true, "bSearchable": true,
            "mRender": function(data, type, full) {
              return '<input type="checkbox" name="acept[]" value="' + data + '" id="acept' + data + '">';
            }
          },
          { "bVisible": true, "bSearchable": true, "bSortable": true},
          { "bVisible": true, "bSearchable": true, "bSortable": true},
          { "bVisible": true, "bSearchable": true, "bSortable": true},
          { "bSortable": true, "bSearchable": true,
            "mRender": function(data, type, full) {
              return cargos[data];
            }
          },
          { "bSortable": true, "bSearchable": true, 
            "mRender": function(data, type, full) {
              return '<a href="<?php echo base_url("convocatoria/registrados/download/'+ data +'") ?>">CV</a>';
            }
          },           
          { "bVisible": true, "bSearchable": true, "bSortable": true },
          { "bVisible": true, "bSearchable": true, "bSortable": true },
          { "bVisible": true, "bSearchable": true, "bSortable": true },
          { "bVisible": true, "bSearchable": true, "bSortable": true },
          { "bVisible": true, "bSearchable": true, "bSortable": true },
          { "bVisible": true, "bSearchable": true, "bSortable": true },

          { "bVisible": true, "bSearchable": true, "bSortable": true },
          { "bVisible": true, "bSearchable": true, "bSortable": true },
          { "bVisible": true, "bSearchable": true, "bSortable": true },
          { "bVisible": true, "bSearchable": true, "bSortable": true },
          { "bSortable": true, "bSearchable": true, 
            "mRender": function(data, type, full) {
              return ecivil[data];
            }
          },
          { "bVisible": true, "bSearchable": true, "bSortable": true },
          { "bVisible": true, "bSearchable": true, "bSortable": true },
          { "bVisible": true, "bSearchable": true, "bSortable": true },
          { "bVisible": true, "bSearchable": true, "bSortable": true },
          { "bVisible": true, "bSearchable": true, "bSortable": true }, 

          { "bVisible": true, "bSearchable": true, "bSortable": true },
          { "bSortable": true, "bSearchable": true, 
            "mRender": function(data, type, full) {
              return tvia[data];
            }
          },
          { "bVisible": true, "bSearchable": true, "bSortable": true },
          { "bVisible": true, "bSearchable": true, "bSortable": true },
          { "bVisible": true, "bSearchable": true, "bSortable": true },
          { "bVisible": true, "bSearchable": true, "bSortable": true },
          { "bVisible": true, "bSearchable": true, "bSortable": true },
          { "bVisible": true, "bSearchable": true, "bSortable": true },
          { "bVisible": true, "bSearchable": true, "bSortable": true },
          { "bVisible": true, "bSearchable": true, "bSortable": true },

          { "bSortable": true, "bSearchable": true, 
            "mRender": function(data, type, full) {
              return tzona[data];
            }
          },
          { "bVisible": true, "bSearchable": true, "bSortable": true },
          { "bSortable": true, "bSearchable": true, 
            "mRender": function(data, type, full) {
              return nivel[data];
            }
          },
          { "bSortable": true, "bSearchable": true, 
            "mRender": function(data, type, full) {
              return grado[data];
            }
          },
          { "bVisible": true, "bSearchable": true, "bSortable": true },
          { "bSortable": true, "bSearchable": true, 
            "mRender": function(data, type, full) {
              return periodo[data];
            }
          },
          { "bSortable": true, "bSearchable": true, 
            "mRender": function(data, type, full) {
              return getObjects(ocupacion,'codigo',data)[0].detalle;
            }
          },
          { "bSortable": true, "bSearchable": true, 
            "mRender": function(data, type, full) {
              var univ = 0;
              if(data != 0){
                   univ = getObjects(universidades,'id',data)[0].detalle;
              }
              return univ;

            }
          },
          { "bVisible": true, "bSearchable": true, "bSortable": true },
          { "bVisible": true, "bSearchable": true, "bSortable": true },

          { "bVisible": true, "bSearchable": true, "bSortable": true },
          { "bVisible": true, "bSearchable": true, "bSortable": true },
          { "bVisible": true, "bSearchable": true, "bSortable": true },
          { "bVisible": true, "bSearchable": true, "bSortable": true },
          { "bVisible": true, "bSearchable": true, "bSortable": true },
          { "bSortable": true, "bSearchable": true, 
            "mRender": function(data, type, full) {
              return sino[data];
            }
          },
          { "bSortable": true, "bSearchable": true, 
            "mRender": function(data, type, full) {
              return sino[data];
            }
          },
          { "bSortable": true, "bSearchable": true, 
            "mRender": function(data, type, full) {
              return sino[data];
            }
          },
          { "bVisible": true, "bSearchable": true, "bSortable": true },
          { "bSortable": true, "bSearchable": true, 
            "mRender": function(data, type, full) {
              if(data != 0){
                return getObjects(proyectos,'SECU_FUNC_SFU',data)[0].DESC_META_SFU;
              }else{
                return data;
              }
            }
          },
          { "bSortable": true, "bSearchable": true, 
            "mRender": function(data, type, full) {
              if(data != 0){
                return getObjects(cargos_f,'COD',data)[0].CARGO;
              }else{
                return data;
              }        
            }
          },
          { "bSortable": true, "bSearchable": true, 
            "mRender": function(data, type, full) {
              return sino[data];
            }
          },
          { "bSortable": true, "bSearchable": true, 
            "mRender": function(data, type, full) {
              return sino[data];
            }
          },
          { "bVisible": true, "bSearchable": true, "bSortable": true },   
          { "bVisible": true, "bSearchable": true, "bSortable": true },
          { "bVisible": true, "bSearchable": true, "bSortable": true },
          { "bVisible": true, "bSearchable": true, "bSortable": true }
              ]




      });
        //.fnSetFilteringDelay(700)

        // var asInitVals = new Array();

        //   $("input.search_init").keyup( function () {
        //     /* Filter on the column (the index) of this element */
        //     oTable.fnFilter($(this).val(), $("input.search_init").index(this));
        //   } );
          
        //   $("input.search_init").each( function (i) {
        //     asInitVals[i] = $(this).val();
        //   } );
          
        //   $("input.search_init").focus( function () {
        //       $(this).val('');
        //   } );
          
        //   $("input.search_init").blur( function (i) {
        //       if ( $(this).val() == '' ){
        //         $(this).val(asInitVals[$("input.search_init").index(this)]);
        //       }
        //   } );

        $("#show_ins").text(<?php echo $totalregs; ?>);
        $("#show_sel").text(<?php echo $totalcap; ?>);


       $('#ver').click(function() {

          $("#LoadingImage").show();

          var pea = getObjects(<?php echo json_encode($pea->result()); ?>, 'SEDE_COD', $('#departamento').val())
          //console.log(pea);
          //pea[0].ubigeo
          $('input[name=hidedep]').val($('#departamento').val());
          //Llenar score pea a capacitar
          if(pea.length > 0)
              $("#show_cap").text(pea[0].pea_capacitar);
          else
              $("#show_cap").text(<?php print_r($peatotal->row()->pea_capacitar) ; ?>);
          
          if( $('#departamento').val() != -1)
            $(".controles").show();
          else
            $(".controles").hide();

           var form_data = {
                          cod_dep: $('#departamento').val(),
                          csrf_token_c: CI.cct,
                          ajax:1
          };       

          $.ajax({
              url: CI.base_url + "convocatoria/seleccion/get_nro_capacitando/",
              type:'POST',
              data:form_data,
              dataType:'json',
              success:function(json){
                  $("#show_sel").text(json.nrocap);
                  $("#show_ins").text(json.nroins);
              } 
          });  

          oTable.fnReloadAjax();     
         });

        //First static information on datatable
         $("#show_cap").text(<?php print_r($peatotal->row()->pea_capacitar) ; ?>);



        $('#sel').click(function() {
                $("#LoadingImage").show();
                        var form_data = {
                          cod_dep: $('input[name=hidedep]').val(),
                          csrf_token_c: CI.cct,
                          ajax:1
                        };                
                        $.ajax({
                            url: CI.base_url + "convocatoria/seleccion/get_nro_capacitando/",
                            type:'POST',
                            data:form_data,
                            dataType:'json',
                            success:function(json){
                                var nro_cap = $("[type='checkbox']:checked").length;
                                var acap = parseInt($("#show_cap").text())
                                $("#LoadingImage").hide();
                                //$("#show_sel").text(json);
                                if(parseInt($("#show_ins").text()) >= acap){
                                    if(parseInt(json.nrocap) < acap){
                                      if(nro_cap == 0){
                                          alert('Seleccione las personas a capacitar');
                                      }else{
                                        if(nro_cap > acap || (acap-parseInt(json.nrocap)) < nro_cap){
                                            alert('El número de personas seleccionadas supera el número de vacantes a capacitar. Revise e intente de nuevo.');
                                        }else{
                                              var pers = []
                                              $("input[name='acept[]']:checked").each(function ()
                                              {
                                                  pers.push(parseInt($(this).val()));
                                                  //alert($(this).val());
                                              });       
                                              var persto = JSON.stringify(pers);
                                              var pers_data = {
                                                pers: persto,
                                                cod_dep: $('input[name=hidedep]').val(),
                                                csrf_token_c: CI.cct,
                                                ajax:1
                                              };   

                                              $.ajax({
                                              url: CI.base_url + "convocatoria/seleccion/capacitar_pers/",
                                              type:'POST',
                                              data:pers_data,
                                              dataType:'json',
                                              success:function(json){
                                                    $('#ver').trigger('click');
                                                    alert(json.msg)
                                                    //$("#show_sel").text(json);
                                                } 
                                               });                                                                                    
                                        }

                                      }

                                    }else{
                                      alert('El número de personas a capacitar coincide con la PEA');
                                    }
                                 }else{
                                      alert('Aún no hay suficientes personas inscritas para cubrir el requerimiento');
                                 }  


                            } 
                        });                  
        });




      } );
    </script>