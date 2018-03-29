$(document).ready(function() {

   //digunakan untuk mengubah waktu
   function getTimeIndonesia()
   {
      $.ajax({
         url: "Time/getTimeIndonesia",
         success: function(data)
         {
            $("#time").text(data);
         }
      })
   }
   setInterval(getTimeIndonesia, 1000);

   //datausdCoinbase
   function hargaCoinbase()
   {
      $.ajax({
            url: "ServerCoinbase/hargaCoinbase",
            success: function(data)
            {
               $("#tableData").attr("data-usd-coinbase", data);
            }

      })
   }
   hargaCoinbase();
   setInterval(hargaCoinbase, 3000);

   //untuk mendapatkan rate usd sekarang
   function getRateUsd()
   {
      $.ajax({
         url: "GetRateUsd",
         success: function(data)
         {
            $("#rateUsd").text(data.replace(",", "")).text(data);
            $("#rateUsd").attr("data-rate-usd", data.replace(",", "")).text(data);
         }
      })
   }
   getRateUsd();
   setInterval(getRateUsd, 3000);

   //untuk menconversi ke idr
   function convertToIdr(usd)
   {
      return usd * parseFloat($("#rateUsd").attr("data-rate-usd"));
   }

   //untuk menconversi ke usd
   function convertToUsd(idr)
   {
      return idr / parseFloat($("#rateUsd").attr("data-rate-usd"));
   }

   //untuk mengisi data di baris coinbase
   function getDataCoinbase()
   {
      $.ajax({
         url: "https://api.gdax.com/products/btc-usd/candles/",
         success: function(data)
         {
            var data = {
                  last: $("#tableData").attr("data-usd-coinbase"),
                  volume: data[0][5],
                  high  : data[0][2],
                  low   : data[0][1]
            };

            $.ajax({
               url: "serverCoinbase",
               method: "GET",
               data: "dataCoinbase=" + JSON.stringify(data),
               success: function(){}
            });
         }
      })
   }

   getDataCoinbase();
   setInterval(getDataCoinbase, 3000);

   function getDataTicker()
   {
      $.ajax({
         url: "Server",
         success: function(data)
         {
            var data = $.parseJSON(data);
            $("#tableData tbody").empty();

            $.each(data.data.exchanger, function(index, val) {
               val.no       = `<th>${index+1}.</td>`;
               val.name     = `<td>${val.name}</td>`;
               val.rate.usd = `<td>${val.rate.usd}</td>`;
               val.rate.idr = `<td>${val.rate.idr}</td>`;
               val.volume   = `<td>${val.volume}</td>`;
               val.high     = `<td>${val.high}</td>`;
               val.low      = `<td>${val.low}</td>`;
               var dataHtml = `<tr>${val.no + val.name + val.rate.usd + val.rate.idr + val.volume + val.high + val.low}</tr>`;

               $("#tableData tbody").append(dataHtml);
            });
         }
      })
   }

   getDataTicker();
   setInterval(getDataTicker, 3000);

   //digunakan untuk mensortir data
   $("#sortirData").change(function(){
      var value = $(this).val();
      var table = $("#tableData");

      if(value == "asc")
      {
         for (var i = 1; i < $("#tableData tr").length - 2; i++) {
            for (var j = i+1; j < $("#tableData tr").length - 1; j++) {
               if($(`#tableData tr:eq(${i}) td:eq(0)`).text() > $(`#tableData tr:eq(${j}) td:eq(0)`).text())
               {
                  for (var k = 0; k < $(`#tableData tr:eq(${i}) td`).length; k++) {
                     var tablePrev = $(`#tableData tr:eq(${i}) td:eq(${k})`).text();
                     var tableNext = $(`#tableData tr:eq(${j}) td:eq(${k})`).text();

                     $(`#tableData tr:eq(${i}) td:eq(${k})`).text(tableNext);
                     $(`#tableData tr:eq(${j}) td:eq(${k})`).text(tablePrev);

                  }
               }
            }
         }
      }else if(value == "desc")
      {
         for (var i = 1; i < $("#tableData tr").length - 2; i++) {
            for (var j = i+1; j < $("#tableData tr").length - 1; j++) {
               if($(`#tableData tr:eq(${i}) td:eq(0)`).text() < $(`#tableData tr:eq(${j}) td:eq(0)`).text())
               {
                  for (var k = 0; k < $(`#tableData tr:eq(${i}) td`).length; k++) {
                     var tablePrev = $(`#tableData tr:eq(${i}) td:eq(${k})`).text();
                     var tableNext = $(`#tableData tr:eq(${j}) td:eq(${k})`).text();

                     $(`#tableData tr:eq(${i}) td:eq(${k})`).text(tableNext);
                     $(`#tableData tr:eq(${j}) td:eq(${k})`).text(tablePrev);

                  }
               }
            }
         }
      }else if(value == "hargaTertinggi")
      {
         for (var i = 1; i < $("#tableData tr").length - 2; i++) {
            for (var j = i+1; j < $("#tableData tr").length - 1; j++) {
               if(parseFloat($(`#tableData tr:eq(${i}) td:eq(1)`).text().replace(".", "")) < parseFloat($(`#tableData tr:eq(${j}) td:eq(1)`).text().replace(".", "")))
               {
                  for (var k = 0; k < $(`#tableData tr:eq(${i}) td`).length; k++) {
                     var tablePrev = $(`#tableData tr:eq(${i}) td:eq(${k})`).text();
                     var tableNext = $(`#tableData tr:eq(${j}) td:eq(${k})`).text();

                     $(`#tableData tr:eq(${i}) td:eq(${k})`).text(tableNext);
                     $(`#tableData tr:eq(${j}) td:eq(${k})`).text(tablePrev);

                  }
               }
            }
         }
      }else if(value == "hargaTerendah")
      {

         for (var i = 1; i < $("#tableData tr").length - 2; i++) {
            for (var j = i+1; j < $("#tableData tr").length - 1; j++) {
               if(parseFloat($(`#tableData tr:eq(${i}) td:eq(1)`).text().replace(".", "")) > parseFloat($(`#tableData tr:eq(${j}) td:eq(1)`).text().replace(".", "")))
               {
                  for (var k = 0; k < $(`#tableData tr:eq(${i}) td`).length; k++) {
                     var tablePrev = $(`#tableData tr:eq(${i}) td:eq(${k})`).text();
                     var tableNext = $(`#tableData tr:eq(${j}) td:eq(${k})`).text();

                     $(`#tableData tr:eq(${i}) td:eq(${k})`).text(tableNext);
                     $(`#tableData tr:eq(${j}) td:eq(${k})`).text(tablePrev);

                  }
               }
            }
         }
      }else if(value == "high")
      {

         for (var i = 1; i < $("#tableData tr").length - 2; i++) {
            for (var j = i+1; j < $("#tableData tr").length - 1; j++) {
               if(parseFloat($(`#tableData tr:eq(${i}) td:eq(4)`).text().replace(".", "")) < parseFloat($(`#tableData tr:eq(${j}) td:eq(4)`).text().replace(".", "")))
               {
                  for (var k = 0; k < $(`#tableData tr:eq(${i}) td`).length; k++) {
                     var tablePrev = $(`#tableData tr:eq(${i}) td:eq(${k})`).text();
                     var tableNext = $(`#tableData tr:eq(${j}) td:eq(${k})`).text();

                     $(`#tableData tr:eq(${i}) td:eq(${k})`).text(tableNext);
                     $(`#tableData tr:eq(${j}) td:eq(${k})`).text(tablePrev);

                  }
               }
            }
         }
      }else if(value == "low")
      {

         for (var i = 1; i < $("#tableData tr").length - 2; i++) {
            for (var j = i+1; j < $("#tableData tr").length - 1; j++) {
               if(parseFloat($(`#tableData tr:eq(${i}) td:eq(5)`).text().replace(".", "")) > parseFloat($(`#tableData tr:eq(${j}) td:eq(5)`).text().replace(".", "")))
               {
                  for (var k = 0; k < $(`#tableData tr:eq(${i}) td`).length; k++) {
                     var tablePrev = $(`#tableData tr:eq(${i}) td:eq(${k})`).text();
                     var tableNext = $(`#tableData tr:eq(${j}) td:eq(${k})`).text();

                     $(`#tableData tr:eq(${i}) td:eq(${k})`).text(tableNext);
                     $(`#tableData tr:eq(${j}) td:eq(${k})`).text(tablePrev);

                  }
               }
            }
         }
      }
   });

   //digunakan untuk memfilter table dari input
   $("#filterTable").keyup(function(){
      for (var i = 1; i < $("#tableData tr").length; i++) {
         if($(`#tableData tr:eq(${i})`).text().toLowerCase().indexOf($(this).val()) < 0)
         {
            $(`#tableData tr:eq(${i})`).hide();
         }else
         {
            $(`#tableData tr:eq(${i})`).show();

         }
      }
   })

   function average()
   {
      $.each($("#tableData tbody tr"), function(index, val) {
         for (var i = 0; i < array.length; i++) {
            array[i]
         }
      });
   }
});
