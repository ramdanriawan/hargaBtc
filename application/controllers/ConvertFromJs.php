<?php /**
 *
 */
class ConvertFromJs extends CI_Controller
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

      echo $rateUsd;
   }

   function formatToCurrency()
   {
      echo number_format($this->uri->segment(2), 2, ",", ".");
   }

   function convertToUsd()
   {

      $rateUsd = $this->uri->segment(2) / $this->getRateUsd();

      echo $this->formatToCurrency($rateUsd);
   }

   function convertToIdr()
   {
      echo $this->formatToCurrency($this->uri->segment(2) * $this->getRateUsd());
   }
}
 ?>
