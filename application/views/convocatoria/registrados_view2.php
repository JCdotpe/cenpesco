
<div class="row-fluid">
    <div id="ap-sidebar" class="span2">
  <?php $this->load->view('convocatoria/includes/sidebar_view.php'); ?>
  </div>
  <div id="ap-content" class="span10">
      <table id="t_regs" cellpadding="0" cellspacing="0" border="0" class="display" style="width: 100%;">
      </table>
  </div>
</div>
  <?php $this->load->view('convocatoria/includes/footer_view.php'); ?>
      <script type="text/javascript" charset="utf-8">
      
      $(function(){
      var regs = <?php echo json_encode($regs->result()); ?>;
      var f_regs = <?php echo json_encode($f_regs); ?>;
	
      //Preparando data para Datatable
      var adata = [];
      $.each(regs, function(i, obj) {
            var nums = f_regs.length;
            var innerdata = [];
            $.each(f_regs, function(property, value) {
              innerdata.push( obj[value] );
            });
          adata.push(innerdata);
      });

      //Preparando cabeceras para Datatable
	     var columns = [];
					$.each(f_regs, function(i, value){
	    			var obj = { sTitle: value };
	     			columns.push(obj);
			});


		$('#t_regs').dataTable({
		    // "sPaginationType": "full_numbers",
		    "aaData": adata,
		    "aoColumns": columns,
            "iDisplayLength":25,
            "sScrollX": "100%",
            //"sScrollXInner": "110%",
            "bScrollCollapse": true,          
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

                }		    
		});

      } );
    </script>