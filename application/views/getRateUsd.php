<?php
include "phpQuery/phpQuery.php";

   $urlRateUsd = "http://www.xe.com/currencyconverter/convert/?Amount=1&From=USD&To=IDR";
   $rateUsd = file_get_contents($urlRateUsd);

   $dom = phpQuery::newDocument($rateUsd);
   $listRateUsd = pq("#ucc-container");
   $rateUsd = str_replace(",", "", $listRateUsd->find(".uccResultAmount")->text());

   echo $this->convert->formatToCurrency($rateUsd);

 ?>
