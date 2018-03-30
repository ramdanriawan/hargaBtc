<?php

//initial data
$data["data"]["exchanger"] = array();

//dapatkan data dari coinbase
// $url  = __DIR__ . "./dataCoinbaseFile.json";
// $html = file_get_contents($url);
// $json = json_decode($html);
// $dataCoinbase["name"]        = "Coinbase";
// $dataCoinbase["website"]     = "http://www.coinbase.com";
// $dataCoinbase["rate"]["usd"] = $this->convert->formatToCurrency($json->last);
// $dataCoinbase["rate"]["idr"] = $this->convert->convertToIdr($json->last);
// $dataCoinbase["volume"]      = $this->convert->formatToCurrency($json->volume);
// $dataCoinbase["high"]        = $this->convert->formatToCurrency($json->high);
// $dataCoinbase["low"]         = $this->convert->formatToCurrency($json->low);

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

// dapatkan data dari livecoin
 $url  = "https://api.livecoin.net/exchange/ticker?currencyPair=BTC/USD";
 $html = file_get_contents($url);
 $json = json_decode($html);
 $dataLivecoin["name"]        = "livecoin";
 $dataLivecoin["website"]     = "http://www.bittrex.com";
 $dataLivecoin["rate"]["usd"] = $this->convert->formatToCurrency($json->last);
 $dataLivecoin["rate"]["idr"] = $this->convert->convertToIdr($json->last);
 $dataLivecoin["volume"]      = $this->convert->formatToCurrency($json->volume);
 $dataLivecoin["high"]        = $this->convert->formatToCurrency($json->high);
 $dataLivecoin["low"]         = $this->convert->formatToCurrency($json->low);

array_push($data["data"]["exchanger"], $dataLivecoin);

// dapatkan data dari bitfinex
 $url  = "https://api.bitfinex.com/v1/pubticker/btcusd";
 $html = file_get_contents($url);
 $json = json_decode($html);
 $dataBitfinex["name"]        = "bitfinex";
 $dataBitfinex["website"]     = "http://www.bitfinex.com";
 $dataBitfinex["rate"]["usd"] = $this->convert->formatToCurrency($json->last_price);
 $dataBitfinex["rate"]["idr"] = $this->convert->convertToIdr($json->last_price);
 $dataBitfinex["volume"]      = $this->convert->formatToCurrency($json->volume);
 $dataBitfinex["high"]        = $this->convert->formatToCurrency($json->high);
 $dataBitfinex["low"]         = $this->convert->formatToCurrency($json->low);

array_push($data["data"]["exchanger"], $dataBitfinex);

// dapatkan data dari hitbtc
 $url  = "https://api.hitbtc.com/api/2/public/ticker/BTCUSD";
 $html = file_get_contents($url);
 $json = json_decode($html);
 $dataHitbtc["name"]        = "hitbtc";
 $dataHitbtc["website"]     = "http://www.hitbtc.com";
 $dataHitbtc["rate"]["usd"] = $this->convert->formatToCurrency($json->last);
 $dataHitbtc["rate"]["idr"] = $this->convert->convertToIdr($json->last);
 $dataHitbtc["volume"]      = $this->convert->formatToCurrency($json->volume);
 $dataHitbtc["high"]        = $this->convert->formatToCurrency($json->high);
 $dataHitbtc["low"]         = $this->convert->formatToCurrency($json->low);

array_push($data["data"]["exchanger"], $dataHitbtc);

// dapatkan data dari bitstamp
 $url  = "https://www.bitstamp.net/api/ticker/";
 $html = file_get_contents($url);
 $json = json_decode($html);
 $dataBitstamp["name"]        = "bitstamp";
 $dataBitstamp["website"]     = "http://www.bitstamp.com";
 $dataBitstamp["rate"]["usd"] = $this->convert->formatToCurrency($json->last);
 $dataBitstamp["rate"]["idr"] = $this->convert->convertToIdr($json->last);
 $dataBitstamp["volume"]      = $this->convert->formatToCurrency($json->volume);
 $dataBitstamp["high"]        = $this->convert->formatToCurrency($json->high);
 $dataBitstamp["low"]         = $this->convert->formatToCurrency($json->low);

array_push($data["data"]["exchanger"], $dataBitstamp);


//untuk menampilkan data rata rata
$data["data"]["average"]["usd"]    = 0;
$data["data"]["average"]["idr"]    = 0;
$data["data"]["average"]["volume"] = 0;
$data["data"]["average"]["high"]   = 0;
$data["data"]["average"]["low"]    = 0;

foreach ($data["data"]["exchanger"] as $key => $value) {
   $data["data"]["average"]["usd"] += number_format(str_replace(",", ".", str_replace(".", "", $value["rate"]["usd"])), 2, ".", "");
   $data["data"]["average"]["idr"] += number_format(str_replace(",", ".", str_replace(".", "", $value["rate"]["idr"])), 2, ".", "");
   $data["data"]["average"]["volume"] += number_format(str_replace(",", ".", str_replace(".", "", $value["volume"])), 2, ".", "");
   $data["data"]["average"]["high"] += number_format(str_replace(",", ".", str_replace(".", "", $value["high"])), 2, ".", "");
   $data["data"]["average"]["low"] += number_format(str_replace(",", ".", str_replace(".", "", $value["low"])), 2, ".", "");
}

$data["data"]["average"]["usd"]    = (float) ($data["data"]["average"]["usd"] / count($data["data"]["exchanger"]));
$data["data"]["average"]["idr"]    = (float) ($data["data"]["average"]["idr"] / count($data["data"]["exchanger"]));
$data["data"]["average"]["volume"] = (float) ($data["data"]["average"]["volume"] / count($data["data"]["exchanger"]));
$data["data"]["average"]["low"]    = (float) ($data["data"]["average"]["low"] / count($data["data"]["exchanger"]));
$data["data"]["average"]["high"]   = (float) ($data["data"]["average"]["high"] / count($data["data"]["exchanger"]));

$data["data"]["average"]["usd"] = number_format($data["data"]["average"]["usd"], 2, ",", ".");
$data["data"]["average"]["idr"] = number_format($data["data"]["average"]["idr"], 2, ",", ".");
$data["data"]["average"]["volume"] = number_format($data["data"]["average"]["volume"], 2, ",", ".");
$data["data"]["average"]["low"] = number_format($data["data"]["average"]["low"], 2, ",", ".");
$data["data"]["average"]["high"] = number_format($data["data"]["average"]["high"], 2, ",", ".");

file_put_contents(__DIR__ . "./dataExchanger.json", json_encode($data));

 ?>
