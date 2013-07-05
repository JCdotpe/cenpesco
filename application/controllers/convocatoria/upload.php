<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

/**
* 
*/
class Upload extends CI_Controller
{
	function __construct()
	{
		parent::__construct();
		$this->load->helper('url');
	}

	function index(){
    $verifyToken = md5('retrocedernuncarendirsejamasjaa' .  $this->input->post('timestamp'));
	    if ($this->input->post('token') == $verifyToken){

            //$config['upload_path'] = realpath(APPPATH . '../../../ppfiles');
	        $config['upload_path'] =realpath(APPPATH . '../files');
	        $config['allowed_types'] = 'doc|rtf';
	        $config['max_size']    = 512;   
	        $config['max_width']  = '0';
	        $config['max_height']  = '0';
	        $config['encrypt_name']  = FALSE;
	        $config['overwrite']  = FALSE;
            $config['file_name'] = 'cv_' . time();
                
        	$this->load->library('upload', $config);
            $flag = 0;
            $filename = null;
        	if(! $this->upload->do_upload('Filedata')){
                 $datos['fail'] = $this->upload->display_errors();
        		// echo $this->upload->display_errors(); 
        	}else{
                // $this->load->library('image_moo');
				//$this->image_moo->load($uploaded['full_path'])->resize_crop(100,100)->set_jpeg_quality(100)->save('./uploads/thumbs/'.$uploaded['file_name']);
                $flag = 1;
                $cvData = $this->upload->data();
                $filename =  $config['file_name'] . $cvData['file_ext'];
            }
           
            $datos['flag'] = $flag;
            $datos['file_name'] = $filename;
            //
            $data['datos'] = $datos;
            $this->load->view('backend/json/json_view', $data);        
         }else{
         	show_404();
         }

    } 


}