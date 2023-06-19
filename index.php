<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "sensortes";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT * FROM testing WHERE nama = 'Lora'  ORDER BY id DESC LIMIT 1";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
  $row = $result->fetch_assoc();
} else {
  echo "0 results";
}
$conn->close();
?>
<?php include "header.php" ?>
<style>
  .info-modal:hover {
    background-image:url("./assets/info.png");
    background-repeat:no-repeat;
 background-position: right;
 background-size:10%;
    font-size:large;
    background-color:rgba(173, 161, 161, 0.62);
    /* transform: scale(1); */
    color: whitesmoke;
  }
  .info-modal{
      transition:0.6s;
     font-size: large;}

  .info-icon {
    position: static;
    margin-left: 2%;
  }
.content-modal{
  justify-content: center;
 
  
  }
</style>
<div id="layoutSidenav_content">
  <main>
    <header class="page-header page-header-dark bg-gradient-primary-to-secondary pb-10">
      <div class="container-xl px-4">
        <div class="page-header-content pt-4">
          <div class="row align-items-center justify-content-between">
            <div class="col-auto mt-4">
              <h1 class="page-header-title">
                <div class="page-header-icon"><i class="fas fa-tachometer-alt"></i></div>
                Dashboard Pemantauan Realtime
              </h1>
              <div class="page-header-subtitle">Pemantauan Lahan Secara Realtime</div>
            </div>
          </div>
        </div>
    </header>
    <!-- Main page content-->
    <!-- Section 1 -->
    <div class="container-xl px-4 mt-n10">
      <div class="rows">
        <div class="card card-collapsable">
          <a class="card-header" href="#collapseCardExample" data-bs-toggle="collapse" role="button"
            aria-expanded="true" aria-controls="collapseCardExample">Realtime Monitoring Lahan 1
            <div class="card-collapsable-arrow">
              <i class="fas fa-chevron-down"></i>
            </div>
          </a>
          <div class="collapse show" id="collapseCardExample">
            <br>
            <div class="container">
              <div class="row">
                <div class="col-lg-3 col-xl-3 mb-3">
                  <div class="card bg-teal text-white h-100">
                    <div class="card-body">
                      <div class="d-flex justify-content-between align-items-center">
                        <div class="me-3">
                          <div class="text-white-75 lager">Kelembaban</div>
                          <div class="text-lg fw-bold" id="kelembaban"></span> &percnt;</span></div>
                        </div>
                        <i class="fas fa-wind fa-2xl"></i>
                      </div>
                    </div>
                    <button type="button" class="btn btn-teal info-modal" data-bs-toggle="modal"
                      data-bs-target="#hum">
                      Informasi
                    </button>
                    <div class="modal fade" id="hum" data-bs-backdrop="static" data-bs-keyboard="false"
                      tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                      <div class="modal-dialog modal-lg modal-dialog-scrollable">
                        <div class="modal-content">
                          <div class="modal-header">
                            <h5 class="modal-title" id="staticBackdropLabel">KELEMBABAN</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                          </div>
                          <div class="modal-body">
                            <p class="content-modal">
                            Indikator ini menunjukkan hasil baca dari sensor pH dalam mengukur tingkat pH tanah.
            PH tanah dapat dinotasikan mulai dari 0-14, dimana 0-4,5 Sangat Masam, 5,5-6,5 Agak Masam,
            6,6-7,5 Netral, 7,6-8,5 Agak alkalis, > 8,5 Alkalis
                            </p>
                            <hr>
                            <p class="head-artikel">Penjelasan</p>
                            <p class="content-modal">Tingkat kemasaman tanah (pH) yang sesuai untuk budidaya tomat ialah berkisar
            5,0-7,0.
            Akar tanaman tomat rentan terhadap kekurangan oksigen. Oleh karena itu, tanaman tomat tidak boleh
            tergenangi
            oleh air. Dalam pembudidayaan tanaman tomat, sebaiknya dipilih lokasi yang topografi tanahnya datar,
            sehingga
            tidak perlu dibuat teras-teras dan tanggul (Leovini, 2012). </p>
                            </p>
                          </div>
                          <div class="modal-footer">
                            <button type="button" class="btn btn-info" data-bs-dismiss="modal">Close</button>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="col-lg-3 col-xl-3 mb-3">
                  <div class="card bg-warning text-white h-100">
                    <div class="card-body">
                      <div class="d-flex justify-content-between align-items-center">
                        <div class="me-3">
                          <div class="text-white-75 lager">Nitrogen</div>
                          <div class="text-lg fw-bold" id="sensor_n"></span> &percnt;</span></div>
                        </div>
                        <i class="fas fa-leaf fa-2xl"></i>
                      </div>
                    </div>
                    <!-- sec -->
                     <button type="button" class="btn btn-warning info-modal" data-bs-toggle="modal"
                      data-bs-target="#nitro">
                      Informasi
                    </button>
                    <div class="modal fade" id="nitro" data-bs-backdrop="static" data-bs-keyboard="false"
                      tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                      <div class="modal-dialog modal-dialog-scrollable">
                        <div class="modal-content">
                          <div class="modal-header">
                            <h5 class="modal-title" id="staticBackdropLabel">Nitrogen</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                          </div>
                          <div class="modal-body">
                            <p class="content-modal">
                  Indikator bar ini menampilkan berapa nilai kadar Nitrogen yang ada pada tanah yang diukur
            menggunakan sensor NPK RS485.Pembacaan nilai kadar ini dilakukan sekali baca sehingga apabila sewaktu-waktu
            ada perubahan kondisi setelah pemberian pupuk/nutrisi kita dapat melihat perubahan kadar Nitrogen tersebut
            dengan cara menekan button reset yang terdapat pada sisi box. Nilai kadar Nitrogen pada tanah sendiri
            umumnya
            berkisar antara 0-255ppm, yang mana nilai tersebut dapat dibagi menjadi beberapa kriteria. Kriteria tersebut
            diindikasikan dengan perubahan warna, warna yang sama digunakan untuk menunjukkan kategori tingkat tanah
            dalam kondisi rendah, sedang, tinggi. Penggolongan nilai range tersebut adalah 0-50ppm Rendah, 51- 130ppm
            sedang, dan
            131-ppm Tinggi
                            </p>
                            <hr>
                            <p class="head-artikel">Penjelasan</p>
                            <p class="content-modal">Nitrogen bagi tanaman berperan dalam proses penyerapan cahaya melalui pembentukan
          klorofil (Suminarti, 2011). Nitrogen diperlukan tanaman untuk pembentukan dan pertumbuhan bagian vegetatif
          tanaman seperti akar, batang dan daun. Selain itu, nitrogen berperan dalam sintesi klorofil (Harjoko, 2005).
          Fungsi Nitrogen yang selengkapnya bagi tanaman adalah sebagai berikut: untuk meningkatkan pertumbuhan tanaman,
          dapat menyehatkan pertumbuhan daun, meningkatkan kadar protein dalam tubuh tanaman, meningkatkan kualitas
          tanaman
          penghasil daun, meningkatkan perkembangan mikroorganisme dalam tanah (Kartasapoetra dan Sutedja, 2000).
                            </p>
                          </div>
                          <div class="modal-footer">
                            <button type="button" class="btn btn-info" data-bs-dismiss="modal">Close</button>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>

                <div class="col-lg-3 col-xl-3 mb-3">
                  <div class="card bg-purple text-white h-100">
                    <div class="card-body">
                      <div class="d-flex justify-content-between align-items-center">
                        <div class="me-3">
                          <div class="text-white-75 large">Phospor</div>
                          <div class="text-lg fw-bold" id="sensor_p"></span> &percnt;</span></div>
                        </div>
                        <i class="fas fa-leaf fa-2xl"></i>
                      </div>
                    </div>
                       <button type="button" class="btn btn-purple info-modal" data-bs-toggle="modal"
                      data-bs-target="#phos">
                      Informasi
                    </button>
                    <div class="modal fade" id="phos" data-bs-backdrop="static" data-bs-keyboard="false"
                      tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                      <div class="modal-dialog modal-dialog-scrollable">
                        <div class="modal-content">
                          <div class="modal-header">
                            <h5 class="modal-title" id="staticBackdropLabel">Phospor</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                          </div>
                          <div class="modal-body">
                            <p class="content-modal">
               Indikator bar ini menampilkan berapa nilai kadar Phospor yang ada pada tanah yang diukur
            menggunakan sensor NPK RS485.Pembacaan nilai kadar ini dilakukan sekali baca sehingga apabila sewaktu-waktu
            ada perubahan kondisi setelah pemberian pupuk/nutrisi kita dapat melihat perubahan kadar Phospor tersebut
            dengan cara menekan button reset yang terdapat pada sisi box. Nilai kadar Phospor pada tanah sendiri umumnya
            berkisar antara 0-255ppm, yang mana nilai tersebut dapat dibagi menjadi beberapa kriteria. Kriteria tersebut
            diindikasikan dengan perubahan warna, warna yang sama digunakan untuk menunjukkan kategori tingkat tanah
            dalam kondisi rendah, sedang, tinggi. Penggolongan nilai range tersebut adalah 0-50ppm Rendah, 51- 130ppm
            sedang, dan
            131-ppm Tinggi
                            </p>
                            <hr>
                            <p class="head-artikel">Penjelasan</p>
                            <p class="content-modal">Fungsi penting unsur P pada tanaman yaitu berperan dalam proses fotosintesis, respirasi,
        transfer dan penyimpanan energi, pembelahan dan pembesaran sel serta proses-proses di dalam tanaman lainnya.
        Unsur P sangat penting dalam pembentukan biji, membantu mempercepat perkembangan akar dan perkecambahan,
        dapat meningkatkan efisiensi penggunaan air, meningkatkan daya tahan terhadap penyakit yang akhirnya
        meningkatkan
        kualitas hasil panen (Irwanto, 2014), mempercepat pembungaan serta pemasakan buah dan biji
        (Walid dan Susylowati, 2016)
                            </p>
                          </div>
                          <div class="modal-footer">
                            <button type="button" class="btn btn-info" data-bs-dismiss="modal">Close</button>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>

                <!--  -->
                <div class="col-lg-3 col-xl-3 mb-3">
                  <div class="card bg-orange text-white h-100">
                    <div class="card-body">
                      <div class="d-flex justify-content-between align-items-center">
                        <div class="me-3">
                          <div class="text-white-75 small">Kalium</div>
                          <div class="text-lg fw-bold" id="sensor_k"></span> &percnt;</span></div>
                        </div>
                        <i class="fas fa-leaf fa-2xl"></i>
                      </div>
                    </div>
                      <button type="button" class="btn btn-orange info-modal" data-bs-toggle="modal"
                      data-bs-target="#kal">
                      Informasi
                    </button>
                    <div class="modal fade" id="kal" data-bs-backdrop="static" data-bs-keyboard="false"
                      tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                      <div class="modal-dialog modal-dialog-scrollable">
                        <div class="modal-content">
                          <div class="modal-header">
                            <h5 class="modal-title" id="staticBackdropLabel">Kalium</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                          </div>
                          <div class="modal-body">
                            <p class="content-modal">
            Indikator bar ini menampilkan berapa nilai kadar Kalium yang ada pada tanah yang diukur
            menggunakan sensor NPK RS485.Pembacaan nilai kadar ini dilakukan sekali baca sehingga apabila sewaktu-waktu
            ada perubahan kondisi setelah pemberian pupuk/nutrisi kita dapat melihat perubahan kadar Kalium tersebut
            dengan cara menekan button reset yang terdapat pada sisi box. Nilai kadar Kalium pada tanah sendiri umumnya
            berkisar antara 0-255ppm, yang mana nilai tersebut dapat dibagi menjadi beberapa kriteria. Kriteria tersebut
            diindikasikan dengan perubahan warna, warna yang sama digunakan untuk menunjukkan kategori tingkat tanah
            dalam kondisi rendah, sedang, tinggi. Penggolongan nilai range tersebut adalah 0-50ppm Rendah, 51- 130ppm
            sedang, dan 131-ppm Tinggi
                            </p>
                            <hr>
                            <p class="head-artikel">Penjelasan</p>
                            <p class="content-modal">Kalium memegang peranan penting didalam metabolisme tanaman (Farhad et al., 2010),
            membantu pembentukan protein, karbohidrat, aktivitas enzim, regulasi osmotik, efisiensi penggunaan air,
            translokasi fotosintat (McKenzie, 2001), merangsang perkembangan akar dan meningkatkan ukuran buah
            (Marsono dan Sigit, 2001). Pemberian Kalium dapat meningkatkan terbentuknya senyawa lignin yang lebih tebal,
            sehingga dinding sel menjadi lebih kuat yang pada akkhirnya dinding sel menjadi lebih kuat dan dapat
            melindungi
            tanaman dari gangguan patogen (Fageria et al., 2009)
                            </p>
                          </div>
                          <div class="modal-footer">
                            <button type="button" class="btn btn-info" data-bs-dismiss="modal">Close</button>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="col-lg-3 col-xl-3 mb-3">
                  <div class="card bg-primary text-white h-90">
                    <div class="card-body">
                      <div class="d-flex justify-content-between align-items-center">
                        <div class="me-3">
                          <div class="text-white-75 lager">pH</div>
                          <div class="text-lg fw-bold" id="sensor_ph"></span> &percnt;</span></div>
                        </div>
                        <i class="fas fa-tree fa-2xl"></i>
                      </div>
                    </div>
                          <button type="button" class="btn btn-blue info-modal" data-bs-toggle="modal"
                      data-bs-target="#ph">
                      Informasi
                    </button>
                    <div class="modal fade" id="ph" data-bs-backdrop="static" data-bs-keyboard="false"
                      tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                      <div class="modal-dialog modal-dialog-scrollable">
                        <div class="modal-content">
                          <div class="modal-header">
                            <h5 class="modal-title" id="staticBackdropLabel">pH</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                          </div>
                          <div class="modal-body">
                            <p class="content-modal">
              Indikator ini menunjukkan hasil baca dari sensor pH dalam mengukur tingkat pH tanah.
            PH tanah dapat dinotasikan mulai dari 0-14, dimana 0-4,5 Sangat Masam, 5,5-6,5 Agak Masam,
            6,6-7,5 Netral, 7,6-8,5 Agak alkalis, > 8,5 Alkalis
                            </p>
                            <hr>
                            <p class="head-artikel">Penjelasan</p>
                            <p class="content-modal">Tingkat kemasaman tanah (pH) yang sesuai untuk budidaya tomat ialah berkisar
            5,0-7,0.
            Akar tanaman tomat rentan terhadap kekurangan oksigen. Oleh karena itu, tanaman tomat tidak boleh
            tergenangi
            oleh air. Dalam pembudidayaan tanaman tomat, sebaiknya dipilih lokasi yang topografi tanahnya datar,
            sehingga
            tidak perlu dibuat teras-teras dan tanggul (Leovini, 2012).
                            </p>
                          </div>
                          <div class="modal-footer">
                            <button type="button" class="btn btn-info" data-bs-dismiss="modal">Close</button>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <!-- 2 -->

          </div>

        </div>
        <br>
        <div class="card card-collapsable">
          <a class="card-header" href="#collapseCardExample2" data-bs-toggle="collapse" role="button"
            aria-expanded="true" aria-controls="collapseCardExample2">Realtime Monitoring Lahan 2
            <div class="card-collapsable-arrow">
              <i class="fas fa-chevron-down"></i>
            </div>
          </a>
          <div class="collapse show" id="collapseCardExample2">
            <br>
            <div class="container">
              <div class="row">
                <div class="col-lg-3 col-xl-3 mb-3">
                  <div class="card bg-teal text-white h-100">
                    <div class="card-body">
                      <div class="d-flex justify-content-between align-items-center">
                        <div class="me-3">
                          <div class="text-white-75 lager">Kelembaban</div>
                          <div class="text-lg fw-bold" id="kelembaban"></span> &percnt;</span></div>
                        </div>
                        <i class="fas fa-wind fa-2xl"></i>
                      </div>
                    </div>
                    <div class="card-footer d-flex align-items-center justify-content-between small">
                      <a class="text-white stretched-link" href="lahan1.php">View Update</a>
                      <div class="text-white"><i class="fas fa-angle-right"></i></div>
                    </div>
                  </div>
                </div>
                <div class="col-lg-3 col-xl-3 mb-3">
                  <div class="card bg-warning text-white h-100">
                    <div class="card-body">
                      <div class="d-flex justify-content-between align-items-center">
                        <div class="me-3">
                          <div class="text-white-75 lager">Natrium</div>
                          <div class="text-lg fw-bold" id="sensor_n"></span> &percnt;</span></div>
                        </div>
                        <i class="fas fa-leaf fa-2xl"></i>
                      </div>
                    </div>
                    <div class="card-footer d-flex align-items-center justify-content-between small">
                      <a class="text-white stretched-link" href="lahan1.php">View Update</a>
                      <div class="text-white"><i class="fas fa-angle-right"></i></div>
                    </div>
                  </div>
                </div>

                <div class="col-lg-3 col-xl-3 mb-3">
                  <div class="card bg-purple text-white h-100">
                    <div class="card-body">
                      <div class="d-flex justify-content-between align-items-center">
                        <div class="me-3">
                          <div class="text-white-75 large">Phosphat</div>
                          <div class="text-lg fw-bold" id="sensor_p"></span> &percnt;</span></div>
                        </div>
                        <i class="fas fa-leaf fa-2xl"></i>
                      </div>
                    </div>
                    <div class="card-footer d-flex align-items-center justify-content-between small">
                      <a class="text-white stretched-link" href="lahan1.php">View Update</a>
                      <div class="text-white"><i class="fas fa-angle-right"></i></div>
                    </div>
                  </div>
                </div>
                <div class="col-lg-3 col-xl-3 mb-3">
                  <div class="card bg-orange text-white h-100">
                    <div class="card-body">
                      <div class="d-flex justify-content-between align-items-center">
                        <div class="me-3">
                          <div class="text-white-75 small">Kalium</div>
                          <div class="text-lg fw-bold" id="sensor_k"></span> &percnt;</span></div>
                        </div>
                        <i class="fas fa-leaf fa-2xl"></i>
                      </div>
                    </div>
                    <div class="card-footer d-flex align-items-center justify-content-between small">
                      <a class="text-white stretched-link" href="lahan1.php">View Update</a>
                      <div class="text-white"><i class="fas fa-angle-right"></i></div>
                    </div>

                  </div>

                </div>
                <div class="col-lg-3 col-xl-3 mb-3">
                  <div class="card bg-primary text-white h-90">
                    <div class="card-body">
                      <div class="d-flex justify-content-between align-items-center">
                        <div class="me-3">
                          <div class="text-white-75 lager">pH</div>
                          <div class="text-lg fw-bold" id="sensor_ph"></span> &percnt;</span></div>
                        </div>
                        <i class="fas fa-tree fa-2xl"></i>
                      </div>
                    </div>
                    <div class="card-footer d-flex align-items-center justify-content-between small">
                      <a class="text-white stretched-link" href="lahan1.php">View Update</a>
                      <div class="text-white"><i class="fas fa-angle-right"></i></div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <!-- 3 -->

          </div>
        </div>
        <br>
        <div class="card card-collapsable">
          <a class="card-header" href="#collapseCardExample3" data-bs-toggle="collapse" role="button"
            aria-expanded="true" aria-controls="collapseCardExample3">Realtime Monitoring Lahan 3
            <div class="card-collapsable-arrow">
              <i class="fas fa-chevron-down"></i>
            </div>
          </a>
          <div class="collapse show" id="collapseCardExample3">
            <br>
            <div class="container">
              <div class="row">
                <div class="col-lg-3 col-xl-3 mb-3">
                  <div class="card bg-teal text-white h-100">
                    <div class="card-body">
                      <div class="d-flex justify-content-between align-items-center">
                        <div class="me-3">
                          <div class="text-white-75 lager">Kelembaban</div>
                          <div class="text-lg fw-bold" id="kelembaban"></span> &percnt;</span></div>
                        </div>
                        <i class="fas fa-wind fa-2xl"></i>
                      </div>
                    </div>
                    <div class="card-footer d-flex align-items-center justify-content-between small">
                      <a class="text-white stretched-link" href="lahan1.php">View Update</a>
                      <div class="text-white"><i class="fas fa-angle-right"></i></div>
                    </div>
                  </div>
                </div>
                <div class="col-lg-3 col-xl-3 mb-3">
                  <div class="card bg-warning text-white h-100">
                    <div class="card-body">
                      <div class="d-flex justify-content-between align-items-center">
                        <div class="me-3">
                          <div class="text-white-75 lager">Natrium</div>
                          <div class="text-lg fw-bold" id="sensor_n"></span> &percnt;</span></div>
                        </div>
                        <i class="fas fa-leaf fa-2xl"></i>
                      </div>
                    </div>
                    <div class="card-footer d-flex align-items-center justify-content-between small">
                      <a class="text-white stretched-link" href="lahan1.php">View Update</a>
                      <div class="text-white"><i class="fas fa-angle-right"></i></div>
                    </div>
                  </div>
                </div>

                <div class="col-lg-3 col-xl-3 mb-3">
                  <div class="card bg-purple text-white h-100">
                    <div class="card-body">
                      <div class="d-flex justify-content-between align-items-center">
                        <div class="me-3">
                          <div class="text-white-75 large">Phosphat</div>
                          <div class="text-lg fw-bold" id="sensor_p"></span> &percnt;</span></div>
                        </div>
                        <i class="fas fa-leaf fa-2xl"></i>
                      </div>
                    </div>
                    <div class="card-footer d-flex align-items-center justify-content-between small">
                      <a class="text-white stretched-link" href="lahan1.php">View Update</a>
                      <div class="text-white"><i class="fas fa-angle-right"></i></div>
                    </div>
                  </div>
                </div>
                <div class="col-lg-3 col-xl-3 mb-3">
                  <div class="card bg-orange text-white h-100">
                    <div class="card-body">
                      <div class="d-flex justify-content-between align-items-center">
                        <div class="me-3">
                          <div class="text-white-75 small">Kalium</div>
                          <div class="text-lg fw-bold" id="sensor_k"></span> &percnt;</span></div>
                        </div>
                        <i class="fas fa-leaf fa-2xl"></i>
                      </div>
                    </div>
                    <div class="card-footer d-flex align-items-center justify-content-between small">
                      <a class="text-white stretched-link" href="lahan1.php">View Update</a>
                      <div class="text-white"><i class="fas fa-angle-right"></i></div>
                    </div>

                  </div>

                </div>
                <div class="col-lg-3 col-xl-3 mb-3">
                  <div class="card bg-primary text-white h-90">
                    <div class="card-body">
                      <div class="d-flex justify-content-between align-items-center">
                        <div class="me-3">
                          <div class="text-white-75 lager">pH</div>
                          <div class="text-lg fw-bold" id="sensor_ph"></span> &percnt;</span></div>
                        </div>
                        <i class="fas fa-tree fa-2xl"></i>
                      </div>
                    </div>
                    <div class="card-footer d-flex align-items-center justify-content-between small">
                      <a class="text-white stretched-link" href="lahan1.php">View Update</a>
                      <div class="text-white"><i class="fas fa-angle-right"></i></div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
  </main>

  <?php include "footer.php" ?>
</div>
</div>

<!-- Javascript  -->
<script>
  $(document).ready(function () {
    setInterval(function () {
      $.ajax({
        url: "dataupdate.php",
        dataType: "json",
        success: function (result) {
          // Update data pada halaman
          $("#kelembaban").text(result.sensor_kelembaban + " %");
          $("#sensor_n").text(result.sensor_n + " ");
          $("#sensor_p").text(result.sensor_p + " ");
          $("#sensor_k").text(result.sensor_k + " ");
          $("#sensor_ph").text(result.sensor_ph + " ");
        }
      });
    }, 100); // Mengupdate data setiap 5 detik
  });
</script>
</body>

</html>