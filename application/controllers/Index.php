<?php

/**
 *
 */
class Index extends CI_Controller
{

   function home()
   {
      $timezone_identifier = "Asia/Jakarta";
      date_default_timezone_set($timezone_identifier);
      $this->load->view("home");
   }
}


 ?>
