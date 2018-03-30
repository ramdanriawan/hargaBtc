<?php

/**
 *
 */
class Server extends CI_Controller
{

   function index()
   {
      $this->load->view("server");
   }

   function dataExchanger()
   {
      $this->load->view("dataExchanger");
   }
}


 ?>
