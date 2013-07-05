

<div class="row">

<!-- 			<div class="span4 offset2">
			 <h2>Heading</h2>
			              <p>Donec id elit non mi porta gravida at eget metus. Fusce dapibus, tellus ac cursus commodo, tortor mauris condimentum nibh, ut fermentum massa justo sit amet risus. Etiam porta sem malesuada magna mollis euismod. Donec sed odio dui. </p>
			              <p><a class="btn" href="#">View details &raquo;</a></p>
			</div>	 -->		
			<div class="span4 offset4">
			  	 <?php $this->load->view('convocatoria/forms/consulta_form'); ?>
			</div >


<script type="text/javascript">
$(function(){
$("#conv_consulta").validate({
    rules: {
        dni:{
            required: true,
            digits: true,
            exactlength: 8,
         },
        recaptcha_response_field:{
            required: true,
         },         
    },
    messages: {
        dni:{
            required: "Ingrese dni",
            exactlength: "dni: 8 digitos",
         },
     },  
   errorPlacement: function(error, element) {
        $(element).next().after(error);
    }, 
 });   


 });   	
</script>

</div>