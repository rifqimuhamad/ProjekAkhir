    


    <div class="homes">
        <!-- untuk home -->
        <section id="home">
            <img src="assets/img/icon1.png" style="width: 426px;margin-left: 100px;margin-right: 100px;">
            <div class="kolom">
                <p class="deskripsi" style="
                    padding-bottom: 0px;
                    padding-top: 90px;
                    margin-bottom: 0px;
                    margin-top: 0px;
                ">What Is</p>
                <h2>CORONAVIRUS</h2>
                <p style="padding-top: 0px;margin-top: 0px;padding-bottom: 0px;">and how to protect yourself?</p>
                <p><a href="?page=blog" class="tbl-pink">More</a></p>
            </div>
        </section>        
    </div>


    <div class="wrapper">
        <!-- untuk tutors -->
        <section id="tutors">
            <div class="tengah">
                <div class="kolom">
                    <h2 class="animatedBox">Apa itu 3M?</h2>
                    <p>Perilaku disiplin 3M termasuk dalam kampanye #ingatpesanibu untuk menekan penyebaran virus Covid-19. Penerapan 3M untuk pencegahan Covid-19 dapat dilakukan dengan:</p>
                </div>

                <div class="tutor-list">
                    <div class="kartu">
                        <img src="assets/img/masker.png"/>
                        <p>Memakai masker</p>
                    </div>
                    <div class="kartu">
                        <img src="assets/img/cuci.png"/>
                        <p>Mencuci tangan</p>
                    </div>
                    <div class="kartu">
                        <img src="assets/img/jarak.png"/>
                        <p>Menjaga jarak</p>
                    </div>
                </div>
            </div>
        </section>
        <section class="live_update pad_top">
          <div class="container">
            <img class="bcgrounds" src="assets/img/map.png" alt="" />
            <div class="texts">
              <h5>LIVE UPDATE</h5>
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