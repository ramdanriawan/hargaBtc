<?php

class convert
{
   protected $ci;

   function __construct(){
      $this->ci =& get_instance();
   }

   function getRateUsd()
   {
      $this->ci->load->view("phpQueryLoad");

      $urlRateUsd = "http://www.xe.com/currencyconverter/convert/?Amount=1&From=USD&To=IDR";
      $rateUsd = file_get_contents($urlRateUsd);

      $dom = phpQuery::newDocument($rateUsd);
      $listRateUsd = pq("#ucc-container");
      $rateUsd = $listRateUsd->find(".uccResultAmount")->text();

      $tandaGanti = array("," => "");

      $rateUsd = strtr($rateUsd, $tandaGanti);

      return $rateUsd;
   }

   function formatToCurrency($number)
   {
      return number_format($number, 2, ",", ".");
   }

   function convertToUsd($idr)
   {

      $rateUsd = $idr / $this->getRateUsd();

      return $this->formatToCurrency($rateUsd);
   }

   function convertToIdr($usd)
   {
      return $this->formatToCurrency($usd * $this->getRateUsd());
   }
}


 ?>
