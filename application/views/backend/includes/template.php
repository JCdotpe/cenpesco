<?php $this->load->view('backend/includes/header'); ?>
<?php 
if(isset($nav)){
		$this->load->view('backend/includes/nav'); 
}else{
		if(isset($contclass)){
			echo '<div class="' . $contclass . '">';
		}else{
			echo '<div class="container-fluid">';	
		}
} 
?>
<?php $this->load->view($main_content); ?>
<?php 
if(!isset($static)){
	if(isset($sidebar)){
		$this->load->view('backend/includes/sidebar'); 
	}else{
		//echo '</div>';
	}
}
?>
<?php 
if(!isset($nofoot)){
$this->load->view('backend/includes/footer'); 
}
?>