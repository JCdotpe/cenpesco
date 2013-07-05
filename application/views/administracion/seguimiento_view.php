<link rel="stylesheet" href="<?php echo base_url('css/smoothness/jquery-ui-1.10.2.custom.min.css'); ?>">
<script src="<?php echo base_url('js/vendor/jquery-ui-1.10.2.custom.min.js'); ?>"></script>


<div class="row-fluid">
  <div class="span12">

   <div id="addreq">
      <?php echo form_open($this->uri->uri_string());  ?>
      <div class="form-actions">
        <h4>Requerimiento</h4>
        <input type="text" id="requerimiento" name="requerimiento" maxlength="45" />
        <button type="submit" class="btn btn-primary dtadd">Agregar</button>
      </div>
     <?php echo form_close();  ?>
</div>
    
<table id="t_regs2" cellpadding="0" cellspacing="0" border="0" class="display" style="width: 100%;">
    <thead>
      <tr>
  <!--       <th>Edit</th> -->
        <th>ID</th>
        <th>Requerimiento</th>
        <th>Fecha de Solicitado</th>
        <th>Autorizado OTED</th>
        <th>Nro de Oficio</th>      
        <th>Fecha de Oficio</th>
        <th>Actividad</th>
        <th>Partida</th>
        <th>Monto S/.</th>     
        <th>Fecha Sec. General</th>
        <th>Fecha OTPP</th>
        <th>Fecha OTA</th>
        <th>Fecha Personal</th>
        <th>Fecha Abastecimiento</th>
        <th>Fecha Financiera</th>
        <th>Fecha Tesoreria</th>
        <th>Fecha Pagaduría</th>
        <th>Porcentaje</th>
        <th>Demora</th>
        <th>Fecha Req. Concluido</th>
        <th>Observaciones</th>  
        <th>&nbsp;</th>  
      </tr>
  </thead>
  <tfoot>
  </tfoot>
  <tbody>
    <td colspan="4" class="dataTables_empty">Cargando...</td>
  </tbody>
</table> 

  </div>
</div>

<script type="text/javascript" charset="utf-8">
$(function(){
      //Agregar datepicker - datatable
      $.editable.addInputType( 'datepicker', {

          /* create input element */
          element: function( settings, original ) {
            var form = $( this ),
                input = $( '<input />' );
            input.attr( 'autocomplete','off' );
            form.append( input );
            return input;
          },
          
          /* attach jquery.ui.datepicker to the input element */
          plugin: function( settings, original ) {
            var form = this,
                input = form.find( "input" );

            // Don't cancel inline editing onblur to allow clicking datepicker
             settings.onblur = 'nothing';

            datepicker = {
              dateFormat: 'yy-mm-dd',
              onSelect: function() {
                // clicking specific day in the calendar should
                // submit the form and close the input field
                form.submit();
              },
              
              onClose: function() {
                setTimeout( function() {
                  if ( !input.is( ':focus' ) ) {
                    // input has NO focus after 150ms which means
                    // calendar was closed due to click outside of it
                    // so let's close the input field without saving
                    original.reset( form );
                  } else {
                    // input still HAS focus after 150ms which means
                    // calendar was closed due to Enter in the input field
                    // so lets submit the form and close the input field
                    form.submit();
                  }
                  
                  // the delay is necessary; calendar must be already
                  // closed for the above :focus checking to work properly;
                  // without a delay the form is submitted in all scenarios, which is wrong
                }, 150 );
              }
            };
          
            if (settings.datepicker) {
             $.extend(datepicker, settings.datepicker);
            }

            input.datepicker(datepicker);
          }
      } );



    var productTable = $("#t_regs2").dataTable({
      "sDom": 'T<"clear">lfrtip',
      "oTableTools": {
            "sSwfPath": CI.base_url + "extra/copy_csv_xls.swf",
            "aButtons": [
                "copy",
                "xls"
            ]          
        },
      "iDisplayLength":25,
      "sScrollX": "100%",
      "bScrollCollapse": true,       
      //"bJQueryUI": true,
      "bSortClasses": false,
      "bProcessing": false,
      "bServerSide": true,          
      "sAjaxSource": CI.base_url + "administracion/seguimiento/get",
      "aoColumns": [
          { "sClass": "num", "mData": 0},
          { "sClass": "requerimiento", "mData": 1 , "bSearchable": true},
          { "sClass": "fecha_sol", "mData": 2 },
          { "sClass": "auto_oted", "mData": 3 },
          { "sClass": "n_oficio", "mData": 4 },
          { "sClass": "f_oficio", "mData": 5 },
          { "sClass": "actividad", "mData": 6 },
          { "sClass": "partida", "mData": 7 },
          { "sClass": "monto", "mData": 8 },
          { "sClass": "secretaria", "mData": 9 },
          { "sClass": "otpp", "mData": 10 },
          { "sClass": "ota", "mData": 11 },
          { "sClass": "personal", "mData": 12 },
          { "sClass": "abastecimiento", "mData": 13 },
          { "sClass": "financiera", "mData": 14 },
          { "sClass": "tesoreria", "mData": 15 },
          { "sClass": "pagaduria", "mData": 16 },
          { "sClass": "porcentaje", "mData": 17 },
          { "sClass": "demora", "mData": 18 },
          { "sClass": "fecha_concluido", "mData": 19 },
          { "sClass": "observaciones", "mData": 20 },
          { "sClass": "center", "bSortable": false, "bSearchable": false, "sWidth": "70px", "mData": "DT_RowId", 
            "mRender": function(data, type, full) {
              return "<button class='btn btn-danger dtdelete' id='" + data + "'>Eliminar</button>";
            }
          }
    ],
     "oLanguage": {
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
      
      "fnDrawCallback": function(oSettings) {
            // Initialize inplace editors
            $("#t_regs2 tbody td.requerimiento, #t_regs2 tbody td.auto_oted, #t_regs2 tbody td.n_oficio, #t_regs2 tbody td.actividad, #t_regs2 tbody td.partida, #t_regs2 tbody td.monto, #t_regs2 tbody td.porcentaje, #t_regs2 tbody td.demora, #t_regs2 tbody td.observaciones").editable(function(value, settings) {
              
              var submitdata = {
                "csrf_token_c": CI.cct,
                "code": $(this).parent("tr").attr("id"),
                "columnname": $(this).attr("class"),
                "value": value
              };
              $.post(CI.base_url + "administracion/seguimiento/edit", submitdata);
              return value;
            }, {
              "tooltip": "",
              "placeholder" : "..."
            });

            //picker inputs
            $("#t_regs2 tbody td.fecha_sol, #t_regs2 tbody td.f_oficio, #t_regs2 tbody td.secretaria, #t_regs2 tbody td.otpp, #t_regs2 tbody td.ota, #t_regs2 tbody td.personal, #t_regs2 tbody td.abastecimiento, #t_regs2 tbody td.financiera, #t_regs2 tbody td.tesoreria, #t_regs2 tbody td.pagaduria, #t_regs2 tbody td.fecha_concluido").editable(function(value, settings) {
              var submitdata = {
                "csrf_token_c": CI.cct,
                "code": $(this).parent("tr").attr("id"),
                "columnname": $(this).attr("class"),
                "value": value
              };
              $.post(CI.base_url + "administracion/seguimiento/edit", submitdata);
              return value;
            }, {
              "placeholder" : "...",
              "cssclass": "jdate",
              "type": "datepicker",
              "tooltip": "",
            });

          }
    }); //end datatable


  // Borrar 
  $("button.dtdelete").live("click", function(e) {
    /* NOTE: For simplicity sake, we are deleting data WITHOUT any confirmation dialog. */
    $.post(CI.base_url + "administracion/seguimiento/delete", { "code": $(this).attr("id"),"csrf_token_c": CI.cct }, function() {
      productTable.fnDraw(true);
    });
  });

  //Agregar
  $("#addreq form").validate({
       rules: {
           requerimiento:{
               required: true,
            },         
       },

      errorPlacement: function(error, element) {
           $(element).next().after(error);
       }, 

      submitHandler: function(form) {
           var bsub = $(".dtadd");
           bsub.attr("disabled", "disabled");
           // Add 
             // $("#addreq form").submit(function(e) {
             //   e.preventDefault();
               $form = $("#addreq form");
               /* NOTE: Once again, for simplicity sake, we are submitting WITHOUT any validation or progress indicator. */
               $.post(CI.base_url + "administracion/seguimiento/save", $form.serialize(), function(result) {
                 bsub.removeAttr('disabled');  
                 $("#requerimiento" ).val('');
                 productTable.fnDraw();
                 $form[0].reset();
               });
             // });
       }
    }); 

});
    </script>