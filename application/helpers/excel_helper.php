<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

/*
* Excel library for Code Igniter applications
* Author: Derek Allard, Dark Horse Consulting, www.darkhorse.to, April 2006
* Updated by Wes Johnson, www.wesquire.ca, November 2011
*/

if(!function_exists('to_excel')) {
    function to_excel($query, $filename='exceloutput')
    {
         //$headers = ''; // just creating the var for field headers to append to below
         $headers = '';
         $data = ''; // just creating the var for field data to append to below
         $char_encoding = 'ISO-8859-1//TRANSLIT//IGNORE'; 
         //$char_encoding = 'UTF-16LE//IGNORE';
         $obj =& get_instance();

         $fields = $query->list_fields();
         if ($query->num_rows() == 0) {
              echo '<p>The table appears to have no data.</p>';
         } else {

              foreach ($fields as $field) {
                 $headers .= $field . "\t,";
              }
              $i = 0;
              foreach ($query->result() as $row) {
                   $line = '';
                   foreach($row as $value) {                                            
                        if ((!isset($value)) OR ($value == "")) {
                             $value = ",\t";
                        } else {
                             $value = str_replace('"', '""', $value);
                             $value = '' . $value . ',' . "\t" ;
                            $value = iconv(mb_detect_encoding($value),$char_encoding,$value);
                        }
                        $line .= $value;
                   }
                   $data .= trim($line)."\n";
              }

              $data = str_replace("\r","",$data);

              header("Content-type: application/x-msdownload");
              header("Content-Disposition: attachment; filename=$filename.csv");
              echo "$headers\n$data";  
         }
    }
}
/* End of file excel_helper.php */
/* Location: ./application/helpers/excel_helper.php */ 