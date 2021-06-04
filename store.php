<?php 
  $url = "https://api.kawalcorona.com/";
  $client = curl_init($url);
  curl_setopt($client, CURLOPT_RETURNTRANSFER, true);
  $response = curl_exec($client);
  $result = json_decode($response, true); // print_r($result); echo "<br>";
  $countryRegion = $result[17]['attributes']['Country_Region'];
  $confirmed = $result[17]['attributes']['Confirmed']; 
  $deaths = $result[17]['attributes']['Deaths'];
  $recovered = $result[17]['attributes']['Recovered'];
  $dateTimeString = $result[17]['attributes']['Last_Update'] / 1000; 
  $lastUpdate = date("l, d F Y H:i:s", $dateTimeString);
  session_start();

  include_once 'assets/function/helper.php';
  include_once("assets/function/koneksi.php");
  
  $page = isset($_GET['page']) ? $_GET['page'] : false;
  $kategori_id = isset($_GET['kategori_id']) ? $_GET['kategori_id'] : false;
  
  $user_id = isset($_SESSION['user_id']) ? $_SESSION['user_id'] : false;
  $nama = isset($_SESSION['nama']) ? $_SESSION['nama'] : false;
  $phone = isset($_SESSION['phone']) ? $_SESSION['phone'] : false;
  $alamat = isset($_SESSION['alamat']) ? $_SESSION['alamat'] : false;
  $level = isset($_SESSION['level']) ? $_SESSION['level'] : false;
  $keranjang = isset($_SESSION['keranjang']) ? $_SESSION['keranjang'] : array();
    $totalBarang = count($keranjang);
 
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edu Covid19 | Store</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css">
    <link rel="stylesheet" href="assets/css/style.css">
    <link rel="stylesheet" href="assets/css/store.css">
    <link rel="stylesheet" href="assets/css/banner.css">
    <script src="assets/js/Slides-SlidesJS-3/source/jquery.slides.min.js"; ?>"></script>

</head>
<body>
            <?php
            if($user_id){
              $module = isset($_GET['module']) ? $_GET['module'] : false;
              $action = isset($_GET['action']) ? $_GET['action'] : false;
              $mode = isset($_GET['mode']) ? $_GET['mode'] : false;
              if ($level == "Penulis") {
                $file = "module/$module/$action.php";
               echo "";
                  if(file_exists($file)){
                    include_once($file);
                  }else{
                    echo "tidak ada data";
                  }
              }elseif ($level == "Pegawai"){
                $file = "module/$module/$action.php";
                 echo "<nav>
                        <div class='wrapper'>
                            <div class='logo'><a href='' style='text-decoration:none'>Edu Covid19 | Panel</a></div>
                            <div class='menu'>
                                <ul>
                                    <li><a href='".base_urls."?page=main' style='text-decoration:none'>Home</a></li>
                                    <li><a href='".base_urls."?module=kategori&action=list' style='text-decoration:none'>Kategori</a></li>
                                    <li><a href='".base_urls."?module=barang&action=list' style='text-decoration:none'>Barang</a></li>
                                    <li><a href='".base_urls."?module=kota&action=list' style='text-decoration:none'>Kota</a></li>
                                    <li><a href='".base_urls."?module=user&action=list' style='text-decoration:none'>User</a></li>
                                    <li><a href='".base_url."logout.php' style='text-decoration:none'>Logout</a></li>
                                    ";
                echo "          </ul>
                            </div>
                        </div>
                      </nav>";
                  if(file_exists($file)){
                    include_once($file);
                  }else{
                    echo "tidak ada data";
                  }
              }else{

                $file = "module/$module/$action.php";
                 echo "<nav>
                        <div class='wrapper'>
                            <div class='logo'><a href='' style='text-decoration:none'>Edu Covid19 | StorePanel</a></div>
                            <div class='menu'>
                                <ul>
                                    <li><a href='".base_url."?page=main' style='text-decoration:none'>Home</a></li>
                                    <li><a href='".base_urls."?page=mainstore' style='text-decoration:none'>Store</a></li>
                                    <li><a href='".base_urls."?module=pesanan&action=list' style='text-decoration:none'>PesananKu</a></li>
                                    <li><a href='".base_url."logout.php' style='text-decoration:none'>Logout</a></li>
                                    <li>
                                        <a href='".base_url."?page=keranjang' id='button-keranjang'>
                                            <img src='".base_url."/assets/img/icon/cart.png' />";
                                                if($totalBarang != 0){
                                                    echo "<span class='total-barang'>$totalBarang</span>";
                                                }
                echo "                  </a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                      </nav>";
                  if(file_exists($file)){
                    include_once($file);
                  }else{
                    include_once("mainstore.php");
                  }
              }
            }else{
                echo "<nav>
                        <div class='wrapper'>
                            <div class='logo'><a href='' style='text-decoration:none'>Edu-Covid19</a></div>
                            <div class='menu'>
                                <ul>
                                    <li><a href='".base_url."?page=main' style='text-decoration:none'>Home</a></li>
                                    <li><a href='".base_url."?page=store' style='text-decoration:none'>About Me</a></li>
                                    <li><a href='".base_url."store.php' style='text-decoration:none'>Store</a></li>
                                    <li><a href='".base_url."?page=mainstore' style='text-decoration:none'>Blog</a></li>
                                    <li><a href='".base_url."?page=store' style='text-decoration:none'>Kontak</a></li>
                                    <li>
                                        <a href='".base_urls."store.php?page=keranjang' id='button-keranjang'>
                                            <img src='".base_url."/assets/img/icon/cart.png' />";
                                                if($totalBarang != 0){
                                                    echo "<span class='total-barang'>$totalBarang</span>";
                                                }
                echo "                 
                                    <li><a href='".base_url."?page=login' class='tbl-biru' style='text-decoration:none'>Sign In</a></li>
                                </ul>
                            </div>
                        </div>
                      </nav>";

                $filename = "$page.php";
                if(file_exists($filename)){
                  include_once($filename);
                }else{
                  include_once("mainstore.php");
                }
            } 
        ?>
    <!-- <div id="contact">
        <div class="wrapper">
                <div class="footer-section">
                </div>
                <div class="footer-section">
                </div>
                <div class="footer-section">
                </div>
            </div>
        </div>
    </div> -->
    <div class="row-padding"></div>
    <div id="copyright">

        <div class="wrapper">
            <div class="text-center">
                <a class="btn btn-outline-light btn-floating m-1" href="https://www.youtube.com/channel/UCr9ueGVQRoURF9uGsDdBwZQ" target="_blank" role="button"><i class="fab fa-youtube"></i></a>
                <a class="btn btn-outline-light btn-floating m-1" href= "https://trello.com/b/esiVG2Qw/dpw-proyek-akhir" target="_blank" role="button"><i class="fab fa-trello"></i></a>
                <a class="btn btn-outline-light btn-floating m-1" href="https://github.com/Randi18/1402019089_Tugas3" target="_blank" role="button"><i class="fab fa-github"></i></a>
            </div>
            &copy; 2021. <b>Edu Covid19.</b> All Rights Reserved.
        </div>
    </div>
    
</body>

</html>