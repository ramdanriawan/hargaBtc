<?php

//initial data
$data["data"]["exchanger"] = array();

//dapatkan data dari coinbase
$url  = __DIR__ . "./dataCoinbaseFile.json";
$html = file_get_contents($url);
$json = json_decode($html);
$dataCoinbase["name"]        = "Coinbase";
$dataCoinbase["website"]     = "http://www.coinbase.com";
$dataCoinbase["rate"]["usd"] = $this->convert->formatToCurrency($json->last);
$dataCoinbase["rate"]["idr"] = $this->convert->convertToIdr($json->last);
$dataCoinbase["volume"]      = $this->convert->formatToCurrency($json->volume);
$dataCoinbase["high"]        = $this->convert->formatToCurrency($json->high);
$dataCoinbase["low"]         = $this->convert->formatToCurrency($json->low);

array_push($data["data"]["exchanger"], $dataCoinbase);

// dapatkan data dari indodax
 $url  = "https://vip.bitcoin.co.id/api/btc_idr/ticker";
 $html = file_get_contents($url);
 $json = json_decode($html);
 $dataIndodax["name"]        = "indodax";
 $dataIndodax["website"]     = "http://www.indodax.com";
 $dataIndodax["rate"]["usd"] = $this->convert->convertToUsd($json->ticker->last);
 $dataIndodax["rate"]["idr"] = $this->convert->formatToCurrency($json->ticker->last);
 $dataIndodax["volume"]      = $this->convert->formatToCurrency($json->ticker->vol_btc);
 $dataIndodax["high"]        = $this->convert->convertToUsd($json->ticker->high);
 $dataIndodax["low"]         = $this->convert->convertToUsd($json->ticker->low);

 array_push($data["data"]["exchanger"], $dataIndodax);

// dapatkan data dari bittrex
 $url  = "https://bittrex.com/api/v1.1/public/getmarketsummary?market=usdt-btc";
 $html = file_get_contents($url);
 $json = json_decode($html);
 $dataBittrex["name"]        = "bittrex";
 $dataBittrex["website"]     = "http://www.bittrex.com";
 $dataBittrex["rate"]["usd"] = $this->convert->formatToCurrency($json->result[0]->Last);
 $dataBittrex["rate"]["idr"] = $this->convert->convertToIdr($json->result[0]->Last);
 $dataBittrex["volume"]      = $this->convert->formatToCurrency($json->result[0]->Volume);
 $dataBittrex["high"]        = $this->convert->formatToCurrency($json->result[0]->High);
 $dataBittrex["low"]         = $this->convert->formatToCurrency($json->result[0]->Low);

array_push($data["data"]["exchanger"], $dataBittrex);

$data["data"]["average"]["usd"]    = 0;
$data["data"]["average"]["idr"]    = 0;
$data["data"]["average"]["volume"] = 0;
$data["data"]["average"]["high"]   = 0;
$data["data"]["average"]["low"]    = 0;

foreach ($data["data"]["exchanger"] as $key => $value) {
   $data["data"]["average"]["usd"] += number_format($value["rate"]["usd"], 2, ".", "") / count($data["data"]["exchanger"]);
   $data["data"]["average"]["idr"] += number_format($value["rate"]["idr"], 2, ".", "") / count($data["data"]["exchanger"]);
   $data["data"]["average"]["volume"] += number_format($value["rate"]["volume"], 2, ".", "") / count($data["data"]["exchanger"]);
   $data["data"]["average"]["high"] += number_format($value["rate"]["high"], 2, ".", "") / count($data["data"]["exchanger"]);
   $data["data"]["average"]["low"] += number_format($value["rate"]["low"], 2, ".", "") / count($data["data"]["exchanger"]);
}

echo json_encode($data);

 ?>
