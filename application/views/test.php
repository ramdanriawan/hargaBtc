<?php
require_once "phpQuery/phpQuery.php";
//harga btc indodax
   // $url = "http://indodax.com";
   // $html = file_get_contents($url);
   // $dom = phpQuery::newDocument($html);
   //
   // $listHargaBtcIndodax  = pq(".header-right");
   //
   // //harga btc indodax
   // $hargaBtcIndodax = $listHargaBtcIndodax->find(".text-white.alt-font.home-price")->text();
   // $hargaBtcIndodax = substr($hargaBtcIndodax, 8, 10);
   //
   // echo $hargaBtcIndodax;

//rate dollar ke usd
   //
   // $urlRateUsd = "http://www.xe.com/currencyconverter/convert/?Amount=1&From=USD&To=IDR";
   // $rateUsd = file_get_contents($urlRateUsd);
   //
   // $dom = phpQuery::newDocument($rateUsd);
   // $listRateUsd = pq("#ucc-container");
   // $rateUsd = $listRateUsd->find(".uccResultAmount")->text();
   //
   // print_r($rateUsd);

//harga btc coinbase
   // $url = "https://www.coinbase.com/api/v2/prices/USD/spot?";
   // $html = file_get_contents($url);
   //
   // $hargaBtcCoinbase = json_decode($html);
   // echo $hargaBtcCoinbase->data[0]->amount;


//bittrex
// $url = "https://bittrex.com/api/v1.1/public/getmarketsummary?market=usdt-btc";
// $html = file_get_contents($url);
//
// $hargaBtcBittrex = json_decode($html);
//
// echo "<pre>";
// print_r($hargaBtcBittrex);

//cex.io
// $url = "https://api.livecoin.net/exchange/ticker?currencyPair=BTC/USD";
// $html = file_get_contents($url);
// $dom = phpQuery::newDocument($html);
//
// $hargaBtcLivecoin = json_decode($html);
//
// echo $hargaBtcLivecoin->last;

//okex
// $url = "https://www.okex.com/v2/market/index/kLine?limit=1&since=0&symbol=f_usd_btc&type=1min";
// $html = file_get_contents($url);
//
// // $listHargaBtcPoloniex = pq();
//
// $hargaBtcOkex = json_decode($html);
//
// echo $hargaBtcOkex->data[0][4];

//bitfinex
// $url = "https://api.bitfinex.com/v1/pubticker/btcusd";
// $html = file_get_contents($url);
//
// $hargaBtcBitfinex = json_decode($html);
//
// echo $hargaBtcBitfinex->last_price;

// //hitbtc
// $url = "https://api.hitbtc.com/api/2/public/ticker/BTCUSD";
// $html = file_get_contents($url);
//
// $hargaBtchitbtc = json_decode($html);
//
// echo $hargaBtchitbtc->last;

// //bitstamp
// $url = "https://www.bitstamp.net/api/ticker/";
// $html = file_get_contents($url);
//
// $hargaBtcBitstamp = json_decode($html);
// echo $hargaBtcBitstamp->last;

//coindesk
// $url = "https://api.coindesk.com/site/chartandheaderdata?currency=BTC";
// $html = file_get_contents($url);
//
// $hargaBtcCoindesk = json_decode($html);
// echo array_reverse($hargaBtcCoindesk->BTC->graph_data->d)[0];

//okcoin
// $url = "https://www.okcoin.com/api/v1/ticker.do?symbol=btc_usd";
// $html = file_get_contents($url);
//
// $hargaBtcOkcoin = json_decode($html);
// echo $hargaBtcOkcoin->ticker->last;


 ?>
