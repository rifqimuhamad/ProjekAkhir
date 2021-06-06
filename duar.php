<?php
    include("assets/function/koneksi.php");   
    include("assets/function/helper.php");    
     
         function http_request($url){
             // CURL...
            $ch = curl_init();
            //set
            curl_setopt($ch, CURLOPT_URL, $url);
            // fungsi tf nilai string
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
            // setting
            curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
            curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
            // TAMPUNG
            $output = curl_exec($ch);

            curl_close($ch);
            return $output;

         }
         // panggil bree
        $data = http_request("https://api.kawalcorona.com/indonesia/provinsi/");
        // format json

        $data = json_decode($data, TRUE);
        $jumlah = count($data);
        $no = 1;
        for ($i=0; $i < $jumlah; $i++) { 
            $hasil = $data[$i]['attributes'];
            $pr=$hasil[Provinsi];
            $pr1=$hasil[Kasus_Posi];
            $pr2=$hasil[Kasus_Semb];
            $pr3=$hasil[Kasus_Meni];
            mysqli_query($koneksi, "INSERT INTO updates (Provinsi, Kasus_Posi, Kasus_Semb, Kasus_Meni) VALUES('$pr', '$pr1', '$pr2', '$pr3')");
        }
        /*echo "<prev>";
        print_r($data);
        echo "</prev>";*/
?>  