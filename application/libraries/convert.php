<?php

class convert
{
   protected $ci;

   function __construct(){
      $this->ci =& get_instance();
   }

   function getRateUsd()
   {
      $this->ci->load->view("phpQuery/phpQuery");

      $urlRateUsd = "http://www.xe.com/currencyconverter/convert/?Amount=1&From=USD&To=IDR";
      $rateUsd = file_get_contents($urlRateUsd);

      $dom = phpQuery::newDocument($rateUsd);
      $listRateUsd = pq("#ucc-container");
      $rateUsd = $listRateUsd->find(".uccResultAmount")->text();

      $tandaGanti = array("," => "");

      $rateUsd = strtr($rateUsd, $tandaGanti);

      return $rateUsd;
   }

   function convertToUsd($idr)
   {

      $rateUsd = $idr / $this->getRateUsd();

      return number_format($rateUsd, 2, ",", ".");
   }

   function convertToIdr($usd)
   {
      return number_format($usd * $this->getRateUsd(), 2, ",", ".");
   }
}


 ?>
