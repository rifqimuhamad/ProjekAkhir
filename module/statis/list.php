        <section class="live_update pad_top">
          <div class="container">
            <img class="bcgrounds" src="assets/img/map.png" alt="" />
            <div class="texts">
              <h5>LIVE UPDATE By KawalCorona.com</h5>
              <h2>Kasus Coronavirus di Indonesia yang Terkonfirmasi</h2>
              <p>Last updated: <?php echo $lastUpdate; ?></p>
            </div>
            <div class="row">
              <div class="col-lg-5 col-6 wow fadeIn" data-wow-delay="300">
                <div class="media">
                  <div class="d-flex">
                    <img src="assets/img/icon/corona-red-1.png" alt="" />
                  </div>
                  <div class="media-body">
                    <h2><?php echo $confirmed; ?></h2>
                    <p>Total Kasus</p>
                  </div>
                </div>
              </div>
              <div class="col-lg-4 col-6 wow fadeIn" data-wow-delay="400">
                <div class="media">
                  <div class="d-flex">
                    <img src="assets/img/icon/corona-black-1.png" alt="" />
                  </div>
                  <div class="media-body">
                    <h2><?php echo $deaths; ?></h2>
                    <p>Total Meninggal </p>
                  </div>
                </div>
              </div>
              <div class="col-lg-3 col-6 wow fadeIn" data-wow-delay="500">
                <div class="media">
                  <div class="d-flex">
                    <img src="assets/img/icon/corona-green-1.png" alt="" />
                  </div>
                  <div class="media-body">
                    <h2><?php echo $recovered; ?></h2>
                    <p>Total Sembuh</p>
                  </div>
                </div>
              </div>
          </div>
    </section>
    </div>
    <div class="wrapper">
        <!-- untuk tutors -->
        <section id="tutors">
            <div class="tengah">
                <div class="kolom">
                    <h2>Grafik Covid19 di Indonesi</h2>
                    <p>Grafik ini di ambil langsung dari situs KawalCorona.com</p>
                    <div style="display: block;width: 500px;margin-left: 306px;margin-right: 306px;">
                      <canvas id="myChart"></canvas>
                    </div>
                </div>
            </div>
        </section>
      </div>
<script>
    var ctx = document.getElementById("myChart").getContext('2d');
    var myChart = new Chart(ctx, {
      type: 'bar',
      data: {
        labels: ["Positif", "Sembuh", "Meninggal"],
        datasets: [{
          label: '',
          data: [
          <?php 
          echo $confirmed;
          ?>, 
          <?php 
          echo $recovered;
          ?>, 
          <?php 
          echo $deaths;
          ?>
          ],
          backgroundColor: [
          'rgba(255, 99, 132, 0.2)',
          'rgba(54, 162, 235, 0.2)',
          'rgba(255, 206, 86, 0.2)'
          ],
          borderColor: [
          'rgba(255,99,132,1)',
          'rgba(54, 162, 235, 1)',
          'rgba(255, 206, 86, 1)'
          ],
          borderWidth: 1
        }]
      },
      options: {
        scales: {
          yAxes: [{
            ticks: {
              beginAtZero:true
            }
          }]
        }
      }
    });
  </script>

  <div class="wrapper row-padding">
    <div class="tengah">
                <div class="kolom">
                    <h2>Tabel Covid19 Tingkat Provinsi</h2>
                    <p>Tabel di bawah ini kemungkinan data lama karna harus di update secara manual</p>
                </div>
            </div>

  <?php
    $queryKategori = mysqli_query($koneksi, "SELECT * FROM provinsi");
    
    if(mysqli_num_rows($queryKategori) == 0){
      echo "<h3>Saat ini belum ada nama kategori di dalam table kategori</h3>";
    }else{
    
      echo "<table class='table-list'>";
      
      echo "<tr class='baris-title'>
          <th class='kolom-nomor'>No</th>
          <th class='kiri'>Nama Provinsi</th>
          <th class='kiri'>Kasus Positif</th>
          <th class='tengah'>Kasus Sembuh</th>
          <th class='tengah'>Kasus Meninggal</th>
         </tr>";
         
      $no=1;
      while($row=mysqli_fetch_assoc($queryKategori)){
        
        echo "<tr>
            <td class='kolom-nomor'>$no</td>
            <td class='kiri'>$row[provinsi]</td>
            <td class='kiri'>$row[positif]</td>
            <td class='tengah'>$row[sembuh]</td>
            <td class='tengah'>$row[meninggal]</td>
            </tr>";
            
        $no++;
      }
      
      echo "</table>";
    
    }

  ?>
</div>
<div class="row-padding"></div> 