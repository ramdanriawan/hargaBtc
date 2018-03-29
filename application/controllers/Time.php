<?php /**
 *
 */
class Time extends CI_Controller
{

   function getTimeIndonesia()
   {
      $timezone_identifier = "Asia/Jakarta";
      date_default_timezone_set($timezone_identifier);
      echo date("d M H:i:s", time()) . " WIB";
   }
}
 ?>
