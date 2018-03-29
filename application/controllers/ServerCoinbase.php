<?php
/**
 *
 */
class ServerCoinbase extends CI_Controller
{

   function index()
   {
      $this->load->view("serverCoinbase");
   }

   function hargaCoinbase()
   {
      $this->load->view("hargaCoinbase");
   }
}


 ?>
