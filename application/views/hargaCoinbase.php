<?php

//harga btc coinbase
   $url = "https://www.coinbase.com/api/v2/prices/USD/spot?";
   $html = file_get_contents($url);

   $hargaBtcCoinbase = json_decode($html);
   echo $hargaBtcCoinbase->data[0]->amount;

 ?>
