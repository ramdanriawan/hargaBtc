<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Harga Btc</title>

    <!-- Bootstrap -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="<?php echo base_url() . "style/style.css"; ?>">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.2/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>
  <body>

     <header class="cointainer-fluid warna-header">
        <div class="container">
           <div class="row">
             <div class="col-6">
                <h4 class="logo">HargaBtc</h4>
             </div>
             <div class="col-6">
                <h4>
                   <p class="text-right logo">
                      1 USD = 13000 IDR
                   </p>
                </h4>
             </div>
          </div>
        </div>
     </header>

     <main>
        <div class="container">
           <div class="card">
             <div class="card-header  warna-header">
                <div class="row">
                   <div class="col-4">
                      <select class="form-control" name="coin">
                         <option value="btc">btc</option>
                         <option value="eth">bch</option>
                         <option value="btg">btg</option>
                         <option value="eth">eth</option>
                         <option value="etc">etc</option>
                         <option value="ignis">ignis</option>
                         <option value="ltc">ltc</option>
                         <option value="nxt">nxt</option>
                         <option value="ten">ten</option>
                         <option value="wave">wave</option>
                         <option value="str">str</option>
                         <option value="xrp">xrp</option>
                         <option value="xzc">xzc</option>
                      </select>
                   </div>

                   <!--  urutkan data berdasakan -->
                   <div class="col-4">
                      <select id="sortirData" class="form-control" name="sortir">
                         <option value="asc">asc</option>
                         <option value="desc">desc</option>
                         <option value="hargaTerendah">harga terendah</option>
                         <option value="hargaTertinggi">harga tertinggi</option>
                         <option value="high">high</option>
                         <option value="low">low</option>
                      </select>
                   </div>

                   <!--  digunakan untuk memfilter table data berdasarkan input-->
                   <div class="col-4">
                     <input id="filterTable" class="form-control filter" placeholder="Filter table data...">
                  </div>

                </div>
             </div>
             <div class="card-body">
                <div class='table-responsive'>
                  <table id="tableData" class='table table-striped table-bordered table-hover table-condensed table-sm'>
                    <thead class="thead-dark">
                      <tr>
                        <th scope="col">#</th>
                        <th scope="col">exchanger</th>
                        <th scope="col">usd</th>
                        <th scope="col">idr</th>
                        <th scope="col">volume</th>
                        <th scope="col">high</th>
                        <th scope="col">low</th>
                      </tr>
                    </thead>
                    <tbody>
                      <tr class="thead-dark">
                        <th>1.</th>
                        <td>indodax</td>
                        <td>1000</td>
                        <td>1000000</td>
                        <td>1000000</td>
                        <td>1000009</td>
                        <td>1000008</td>
                      </tr>
                      <tr class="thead-dark">
                        <th>2.</th>
                        <td>yobit</td>
                        <td>2000</td>
                        <td>3000000</td>
                        <td>3000000</td>
                        <td>4000009</td>
                        <td>5000008</td>
                      </tr>
                      <tr class="thead-dark">
                        <th>3.</th>
                        <td>coibase</td>
                        <td>3000</td>
                        <td>4000000</td>
                        <td>4000000</td>
                        <td>5000009</td>
                        <td>6000008</td>
                      </tr>
                      <tr class="bg-secondary">
                         <th colspan="2" class="text-center">average</th>
                         <th>3000    </th>
                         <th>30000000</th>
                         <th>4000000 </th>
                         <th>5000009 </th>
                         <th>6000008 </th>
                      </tr>
                    </tbody>
                  </table>
                </div>
             </div>
          </div>
        </div>
     </main>

     <footer class="container-fluid warna-header">
        <div class="container">
           <div class="row">
              <div class="col-12 col-sm-6">
                 <ul class="sosialMedia">
                    <li><a href="http://www.fb.com/ramdan.riawan2" class="fa fa-facebook"></a></li>
                    <li><a href="http://www.instagram.com/ramdanriawan" class="fa fa-instagram"></a></li>
                    <li><a href="https://api.whatsapp.com/send?phone=6282282692489&text=hai" class="fa fa-whatsapp"></a></li>
                 </ul>
              </div>

              <div class="col-12 col-sm-6">
                 <p class="copy">&copy; <?php echo date("Y"); ?></p>
              </div>
           </div>
        </div>
     </footer>

    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
   <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
   <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>

   <script src="<?php echo base_url() . "script/script.js" ?>" charset="utf-8"></script>
  </body>
</html>