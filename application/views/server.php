<?php
//
// data{
//    exchanger:{
//          {
//          name: "indodax",
//          website: "https://indodax.com",
//          rate: {
//             usd: 9386.20,
//             idr: 135000000
//          } ,
//          volume: 2500,
//          high: 300,
//          low: 400,
//          change: "-5%"
//       }
//    }
// }

//dapatkan data dari indodax
$url = "https://vip.bitcoin.co.id/api/btc_idr/ticker";
$html = file_get_contents($url);
$json = json_decode($html);
$dataIndodax["name"] = "indodax";
$dataIndodax["website"] = "https://indodax.com";
$dataIndodax["rate"]["usd"] = $this->convert->convertToUsd($json->ticker->last);
$dataIndodax["rate"]["idr"] = $json->ticker->last;
$dataIndodax["volume"] = $json->ticker->vol_btc;
$dataIndodax["high"] = $json->ticker->high;
$dataIndodax["low"] = $json->ticker->low;
// $dataIndodax["change"] = $json->ticker->low;
echo date("h", 1522208485);

 ?>
