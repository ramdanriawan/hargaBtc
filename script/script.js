$(document).ready(function() {
   //digunakan untuk mensortir data
   $("#sortirData").change(function(){
      var value = $(this).val();
      var table = $("#tableData");

      if(value == "asc")
      {
         for (var i = 1; i < $("#tableData tr").length - 1; i++) {
            for (var j = i+1; j < $("#tableData tr").length; j++) {
               if($(`#tableData tr:eq(${i}) td:eq(1)`).text() > $(`#tableData tr:eq(${j}) td:eq(1)`).text())
               {
                  for (var k = 1; k < $(`#tableData tr:eq(${i}) td`).length; k++) {
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
         for (var i = 1; i < $("#tableData tr").length - 1; i++) {
            for (var j = i+1; j < $("#tableData tr").length; j++) {
               if($(`#tableData tr:eq(${i}) td:eq(1)`).text() < $(`#tableData tr:eq(${j}) td:eq(1)`).text())
               {
                  for (var k = 1; k < $(`#tableData tr:eq(${i}) td`).length; k++) {
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
         for (var i = 1; i < $("#tableData tr").length - 1; i++) {
            for (var j = i+1; j < $("#tableData tr").length; j++) {
               if(parseInt($(`#tableData tr:eq(${i}) td:eq(2)`).text().replace(".", "")) < parseInt($(`#tableData tr:eq(${j}) td:eq(2)`).text().replace(".", "")))
               {
                  for (var k = 1; k < $(`#tableData tr:eq(${i}) td`).length; k++) {
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

         for (var i = 1; i < $("#tableData tr").length - 1; i++) {
            for (var j = i+1; j < $("#tableData tr").length; j++) {
               if(parseInt($(`#tableData tr:eq(${i}) td:eq(2)`).text().replace(".", "")) > parseInt($(`#tableData tr:eq(${j}) td:eq(2)`).text().replace(".", "")))
               {
                  for (var k = 1; k < $(`#tableData tr:eq(${i}) td`).length; k++) {
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

         for (var i = 1; i < $("#tableData tr").length - 1; i++) {
            for (var j = i+1; j < $("#tableData tr").length; j++) {
               if(parseInt($(`#tableData tr:eq(${i}) td:eq(5)`).text().replace(".", "")) < parseInt($(`#tableData tr:eq(${j}) td:eq(5)`).text().replace(".", "")))
               {
                  for (var k = 1; k < $(`#tableData tr:eq(${i}) td`).length; k++) {
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

         for (var i = 1; i < $("#tableData tr").length - 1; i++) {
            for (var j = i+1; j < $("#tableData tr").length; j++) {
               if(parseInt($(`#tableData tr:eq(${i}) td:eq(6)`).text().replace(".", "")) > parseInt($(`#tableData tr:eq(${j}) td:eq(6)`).text().replace(".", "")))
               {
                  for (var k = 1; k < $(`#tableData tr:eq(${i}) td`).length; k++) {
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
});
