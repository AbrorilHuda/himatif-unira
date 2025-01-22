<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Himatif</title>
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="assets/boot/bootstrap.min.css">
  <link rel="stylesheet" href="assets/icons-boostrapp/font/bootstrap-icons.min.css">
  <link rel="stylesheet" href="assets/css1/style.css">
  <script src="assets/js/typed.js"></script>
</head>

<body>
  <nav class="navbar navbar-expand-lg nav-bg navbar-dark sticky-top">
    <div class="container-fluid d-flex">
      <span class="navbar-brand h1 mb-0">
        <img src="assets/image/hima.png" alt="logo-hima" width="50px" class="d-inline-block align-text-center">
        HIMATIF</span>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse justify-content-end" id="navbarNavDropdown">
        <ul class="navbar-nav">
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="#">Home</a>
          </li>
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
              Tentang Kami
            </a>
            <ul class="dropdown-menu">
              <li><a class="dropdown-item" href="#profil">Profil</a></li>
              <li><a class="dropdown-item" href="#sejarah">Sejarah</a></li>
              <li><a class="dropdown-item" href="#struktur">Struktur Organisasi</a></li>
            </ul>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#proker">Proker</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">Contact</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="/blog">Blog</a>
          </li>
          <?php
          if (isset($_SESSION['username'])) {
          ?>
            <li class="nav-item dropdown" style="margin-right: 50px">
              <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                account
              </a>
              <ul class="dropdown-menu">
                <li><a class="dropdown-item fw-bold"><i class="bi bi-person-circle"></i> <?= $_SESSION['username'] ?></a></li>
                <li><a class="dropdown-item text-danger" href="auth/logout.php"><i class="bi bi-box-arrow-right"></i> logout</a></li>
              </ul>
            </li>
          <?php
          } else {
          ?>
            <li class="nav-item"><a class="nav-link btn btn-sm btn-primary" href="/login">Login</a></li>
          <?php
          }

          ?>


        </ul>
      </div>
    </div>
  </nav>
  <div class="container-fluid banner">
    <div class="container banner-content col-md-6 text-light">
      <div class="text-center text-shadow">
        <h1><span id="typed"></span></h1>
        <h3><span id="typed2"></span></h3>
        <!-- <form class="d-grid col-6 mx-auto"> -->
        <button class="btn btn-outline-secondary mt-3 btn-sm" data-bs-toggle="modal" data-bs-target="#exampleModal">See More</button>
        <!-- </form> -->
      </div>
    </div>
  </div>

  <!-- Modal -->
  <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content">
        <div class="modal-header">
          <h1 class="modal-title fs-5" id="exampleModalLabel">Pendaftaran Anggota Baru</h1>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <!-- Alert -->
        <div class="alert alert-modal alert-success mb-4 alert-dismissible" id="modalAlert">
          <!-- icon bootstrsp dan close alert-->
          <i class="bi bi-check-square"></i> Berhasil Dikirim dan Diproses tunggu notifikasi dari kami
          <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
        <!-- end of Alert -->
        <div class="modal-body">
          <p>Silahkan Isi Formnya</p>
          <form>
            <div class="mb-3">
              <label for="nama" class="form-label">Nim</label>
              <input type="text" class="form-control" id="nama">
            </div>
            <div class="mb-3">
              <label for="nama" class="form-label">Nama</label>
              <input type="text" class="form-control" id="nama">
            </div>
            <div class="mb-3">
              <label for="hp" class="form-label">No HP</label>
              <input type="text" class="form-control" id="hp">
            </div>
          </form>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Keluar</button>
          <button type="button" id="kirim" onclick="kirimProses()" class="btn btn-primary">Kirim</button>
          <button type="button" id="loading" class="btn btn-primary mt-2" disabled>
            <div class="spinner-border spinner-border-sm" role="status"></div>
          </button>
        </div>
      </div>
    </div>
  </div>


  <section class="bg-wave">
    <div class="container col-10 col-sm-9 col-md-8 col-lg-6">
      <h2 class="text-center pt-3 mb-3 about">Tentang Kami</h2>
      <div class="accordion" id="accordionExample">
        <div class="accordion-item">
          <h2 class="accordion-header">
            <button id="profil" class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
              Profil
            </button>
          </h2>
          <div id="collapseOne" class="accordion-collapse collapse" data-bs-parent="#accordionExample">
            <div class="accordion-body">
              Lorem ipsum dolor sit amet consectetur adipisicing elit. Distinctio ut hic deleniti qui praesentium dignissimos nisi temporibus architecto inventore eum consequuntur eligendi voluptas tenetur error assumenda laborum harum debitis, officiis reiciendis quaerat perspiciatis fugit. Soluta enim aut nisi tenetur ducimus aliquid accusantium explicabo debitis, consectetur ipsum eligendi fugit ex ad?
            </div>
          </div>
        </div>
        <div class="accordion-item">
          <h2 class="accordion-header">
            <button id="sejarah" class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
              Sejarah
            </button>
          </h2>
          <div id="collapseTwo" class="accordion-collapse collapse" data-bs-parent="#accordionExample">
            <div class="accordion-body">
              Lorem ipsum dolor sit amet consectetur, adipisicing elit. Repellendus ab nesciunt culpa quas quibusdam dolorum eligendi ipsam itaque, ad animi exercitationem mollitia reiciendis est perspiciatis qui debitis a. Ut fugit nisi explicabo, amet reprehenderit commodi, nulla omnis, officiis cumque recusandae tempore assumenda. Delectus sit harum autem porro reprehenderit veniam illo!
            </div>
          </div>
        </div>
        <div class="accordion-item">
          <h2 class="accordion-header">
            <button id="struktur" class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
              Struktur Organisasi
            </button>
          </h2>
          <div id="collapseThree" class="accordion-collapse collapse" data-bs-parent="#accordionExample">
            <div class="accordion-body">
              Lorem ipsum, dolor sit amet consectetur adipisicing elit. Maxime minus tenetur fuga perferendis dolores sint iste nam eligendi in at. Harum delectus labore, voluptatibus eligendi illum molestias, tempora magni debitis sapiente sint numquam quae voluptate provident odio enim nihil. Ut voluptatibus quasi deserunt ab eligendi adipisci quia nam architecto obcaecati.
            </div>
          </div>
        </div>
      </div>
  </section>


  <div class="container-fluid carousel-contain py-4">
    <div id="proker" class="container">
      <h2 class="text-center color-light mb-3">Program Kerja</h2>
      <div id="carouselExampleCaptions" class="carousel slide col-lg-8 offset-lg-2">
        <div id="carouselExampleAutoplaying" class="carousel slide" data-bs-ride="carousel">
          <div class="carousel-indicators">
            <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-target="#carouselExampleAutoplaying" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
            <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-target="#carouselExampleAutoplaying" data-bs-slide-to="1" aria-label="Slide 2"></button>
            <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-target="#carouselExampleAutoplaying" data-bs-slide-to="2" aria-label="Slide 3"></button>
          </div>
          <div class="carousel-inner">
            <div class="carousel-item active">
              <img src="assets/image/slide1.jpg" class="d-block w-100" alt="slide1">
              <div class="carousel-caption d-none d-md-block">
                <h5>Seminar Teknologi</h5>
                <p>Seminar Teknologi Informasi bertema meningkatkan mutu teknologi di masa depan</p>
              </div>
            </div>
            <div class="carousel-item">
              <img src="assets/image/slide2.jpg" class="d-block w-100" alt="slide2">
              <div class="carousel-caption d-none d-md-block">
                <h5>Dies Natalies Himatif</h5>
                <p>Mengadakan berbagai kegiatan lomba untuk memeriahkan acara dies natalies</p>
              </div>
            </div>
            <div class="carousel-item">
              <img src="assets/image/slide3.jpg" class="d-block w-100" alt="slide3">
              <div class="carousel-caption d-none d-md-block">
                <h5>Lomba Mascot Himatif</h5>
                <p>Lomba mascot himatif untuk sma/smk sederajat se madura</p>
              </div>
            </div>
          </div>
          <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions" data-bs-target="#carouselExampleAutoplaying" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
          </button>
          <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions" data-bs-target="#carouselExampleAutoplaying" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
          </button>
        </div>
      </div>
    </div>
  </div>

  <div class="container-fluid py-4">
    <div class="container ">
      <h2 class="text-center">Blog</h2>
      <div class="row offset-4 mt-4 text-center">
        <div class="col-3">
          <img src="assets/image/blog.jpg" class="img-fluid img-thumbnail" alt="">
          <a href="#">Ini Blog siapa</a>
        </div>
        <div class="col-3">
          <img src="assets/image/mintiraa.jpg" class="img-fluid img-thumbnail" alt="">
          <a href="#">Ini Blog Mintira</a>
        </div>
      </div>
    </div>
  </div>

  <!-- Blockquote -->
  <div class="container-fluid py-5 bg-dark text-light">
    <div class="container">
      <h2 class="text-center mb-5">Quotes dari Anggota Kami</h2>
      <div class="col-12 mb-4">
        <figure class="text-center text-md-start">
          <blockquote class="blockquote">
            <p>Hidup harus terus melangkah, jangan sampai berhenti di tengah jalan</p>
          </blockquote>
          <figcaption class="blockquote-footer">
            Ayekkk <i>Sang Ketua Himatif</i>
          </figcaption>
        </figure>
      </div>
      <div class="col-12 mb-4">
        <figure class="text-center text-md-end">
          <blockquote class="blockquote">
            <p>Ngoding Ae</p>
          </blockquote>
          <figcaption class="blockquote-footer">
            AbrorDc <cite title="Source Title">Lead DemtimCode</cite>
          </figcaption>
        </figure>
      </div>
      <div class="col-12 mb-4">
        <figure class="text-center text-md-start">
          <blockquote class="blockquote">
            <p>Anak Informatika Wajib Tau Ngoding, Bagaimanapun caranya</p>
          </blockquote>
          <figcaption class="blockquote-footer">
            Zuldev <i>Web Developer</i>
          </figcaption>
        </figure>
      </div>
      <div class="col-12 mb-4">
        <figure class="text-center text-md-end">
          <blockquote class="blockquote">
            <p>Betul Sekali</p>
          </blockquote>
          <figcaption class="blockquote-footer">
            Hasbul Sd <i>Sang Penakluk Syntax</i>
          </figcaption>
        </figure>
      </div>
    </div>
  </div>
  <!-- end of block quote -->

  <!-- card -->
  <div class="container-fluid py-5">
    <div class="container">
      <h2 class="text-center mb-4">Event Himatif</h2>
      <div class="row">
        <div class="col-lg-3 col-md-4 col-sm-6">
          <div class="card bg-dark text-light border-light">
            <img src="assets/image/mintiraa.jpg" class="card-img-top" alt="...">
            <div class="card-body">
              <h5 class="card-title">Dies Natalis 14</h5>
              <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
              <a href="#" class="btn btn-primary">Lihat selengkapnya</a>
            </div>
          </div>
        </div>
        <div class="col-lg-3 col-md-4 col-sm-6">
          <div class="card bg-dark text-light border-light">
            <img src="assets/image/mintiraa.jpg" class="card-img-top" alt="...">
            <div class="card-body">
              <h5 class="card-title">Dies Natalis 15</h5>
              <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
              <a href="#" class="btn btn-primary">Lihat selengkapnya</a>
            </div>
          </div>
        </div>
        <div class="col-lg-3 col-md-4 col-sm-6">
          <div class="card bg-dark text-light border-light">
            <img src="assets/image/mintiraa.jpg" class="card-img-top" alt="...">
            <div class="card-body">
              <h5 class="card-title">Dies Natalis 16</h5>
              <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
              <a href="#" class="btn btn-primary">Lihat selengkapnya</a>
            </div>
          </div>
        </div>
        <div class="col-lg-3 col-md-4 col-sm-6">
          <div class="card bg-dark text-light border-light">
            <img src="assets/image/mintiraa.jpg" class="card-img-top" alt="...">
            <div class="card-body">
              <h5 class="card-title">Judul Blog</h5>
              <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
              <a href="#" class="btn btn-primary">Lihat selengkapnya</a>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- end of card -->

  <!-- list group dengan card blog -->
  <div class="container-fluid py-5 bg-dark">
    <div class="container">
      <h2 class="text-center mb-4 text-light">Blog Dengan Kategori</h2>
      <div class="col-12">
        <div class="row">
          <div class="col-lg-3 col-md-4 mb-3">
            <h5 class="text-light text-center">
              Kategori Blog
              <!-- PopOver -->
              <span class="d-inline-block" tabindex="0" data-bs-toggle="popover" data-bs-trigger="hover focus" data-bs-placement="top" title="Info" data-bs-content="Klik Kategori dibawah untuk spesifikasinya">
                <button class="btn btn-danger" type="button" disabled>?</button>
              </span>
            </h5>
            <ul class="list-group">
              <li class="list-group-item active d-flex justify-content-between align-items-center" aria-current="true">
                Teknologi
                <span class="badge text-bg-primary rounded-pill">14</span>
              </li>
              <li class="list-group-item d-flex justify-content-between align-items-center">
                HTML CSS
                <span class="badge text-bg-primary rounded-pill">10</span>
              </li>
              <li class="list-group-item d-flex justify-content-between align-items-center">
                Web development
                <span class="badge text-bg-primary rounded-pill">7</span>
              </li>
              <li class="list-group-item d-flex justify-content-between align-items-center">
                AI
                <span class="badge text-bg-primary rounded-pill">11</span>
              </li>
              <li class="list-group-item d-flex justify-content-between align-items-center">
                Android development
                <span class="badge text-bg-primary rounded-pill">5</span>
              </li>
            </ul>
          </div>
          <div class="col-lg-9 col-md-8">
            <div class="row">
              <div class="col-lg-4 col-md-6 col-sm-6">
                <div class="card bg-light text-dark border-light">
                  <img src="assets/image/mintiraa.jpg" class="card-img-top" alt="...">
                  <div class="card-body">
                    <h5 class="card-title">Judul Blog</h5>
                    <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                    <a href="#" class="btn btn-primary">Lihat selengkapnya</a>
                  </div>
                </div>
              </div>
              <div class="col-lg-4 col-md-6 col-sm-6">
                <div class="card bg-light text-dark border-light">
                  <img src="assets/image/mintiraa.jpg" class="card-img-top" alt="...">
                  <div class="card-body">
                    <h5 class="card-title">Judul Blog</h5>
                    <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                    <a href="#" class="btn btn-primary">Lihat selengkapnya</a>
                  </div>
                </div>
              </div>
              <div class="col-lg-4 col-md-6 col-sm-6">
                <div class="card bg-light text-dark border-light">
                  <img src="assets/image/mintiraa.jpg" class="card-img-top" alt="...">
                  <div class="card-body">
                    <h5 class="card-title">Judul Blog</h5>
                    <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                    <a href="#" class="btn btn-primary">Lihat selengkapnya</a>
                  </div>
                </div>
              </div>
              <div class="col-lg-4 col-md-6 col-sm-6">
                <div class="card bg-light text-dark border-light">
                  <img src="assets/image/mintiraa.jpg" class="card-img-top" alt="...">
                  <div class="card-body">
                    <h5 class="card-title">Judul Blog</h5>
                    <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                    <a href="#" class="btn btn-primary">Lihat selengkapnya</a>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- end of list group with card blog -->

  <!-- table bootstrap -->
  <div class="container-fluid py-5">
    <div class="container">
      <h2 class="text-center mb-5">Top Tier Anggota
        <span class="d-inline-block" tabindex="0" data-bs-toggle="popover" data-bs-trigger="hover focus" data-bs-placement="top" title="Info" data-bs-content="top tier ini di nilai dari ke aktifan anggota dalam publikasi blog yang tentunya sudah lulus review dan disetujui untuk top tier akan otomatis berubah setiap minggunya sesuai dengan jumlah publikasi anggota">
          <button class="btn btn-warning" type="button" disabled>?</button>
        </span>
      </h2>
      <div class="table-responsive">
        <table class="table table-dark table-striped table-hover table-borderless table-bordered border-light">
          <thead>
            <tr>
              <th>No</th>
              <th>Nama</th>
              <th>Jabatan</th>
              <th>Publikasi Blog</th>
              <th>Sosial Media</th>
            </tr>
          </thead>
          <tbody>
            <tr>
              <th>1</th>
              <td>zulpekdev</td>
              <td>humas</td>
              <td>4</td>
              <td>
                <a href="https://github.com/zulpekdev"><i class="bi bi-github"></i></a>
              </td>
            </tr>
            <tr>
              <th>2</th>
              <td>hasbuldek</td>
              <td>humas</td>
              <td>2</td>
              <td>
                <a href="https://github.com/hasbuldek"><i class="bi bi-github"></i></a>
                <a href="https://instagram.com/hasbuldek"><i class="bi bi-instagram"></i></a>
              </td>
            </tr>
            <tr>
              <th>2</th>
              <td>miftadek</td>
              <td>kanfok</td>
              <td>1</td>
              <td>
                <a href="https://github.com/hasbuldek"><i class="bi bi-github"></i></a>
                <a href="https://instagram.com/hasbuldek"><i class="bi bi-instagram"></i></a>
                <a href="https://linkedin.com/in/miftadek"><i class="bi bi-linkedin"></i></a>
              </td>
            </tr>
          </tbody>
        </table>
      </div>
    </div>
  </div>
  <!-- end of table -->


  <!-- form -->
  <div class="container-fluid py-5 bg-secondary">
    <div class="container">
      <h2 class="text-center text-light mb-4">Kritik dan Saran</h2>

      <div class="col-lg-8 offset-lg-2 text-light">
        <!-- Alert -->
        <div class="alert alert-success mb-4 alert-dismissible" id="myAlert">
          <!-- icon bootstrsp dan close alert-->
          <i class="bi bi-check-square"></i> Form Kritik dan Saran Berhasil Dikirim
          <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
        <!-- end of Alert -->
        <form action="#">
          <div class="mb-3">
            <div class="row">
              <div class="col-lg-6">
                <label for="namadepan" class="form-label">Nama Depan</label>
                <input type="text" id="namadepan" class="form-control" autocomplete="off" placeholder="Nama Depan">
              </div>
              <div class="col-lg-6">
                <label for="namabelakang" class="form-label">Nama Belakang</label>
                <input type="text" id="namabelakang" class="form-control" autocomplete="off" placeholder="Nama Belakang">
              </div>
            </div>
          </div>

          <div class="mb-3">
            <div class="row">
              <div class="col-lg-6">
                <label for="email" class="form-label">Email</label>
                <input type="email" name="email" id="email" class="form-control" autocomplete="off" placeholder="Email">
                <label class="form-text">*email yang anda masukkan aman terkendali</label>
              </div>
              <div class="col-lg-6">
                <label for="hp" class="form-label">Nomer HP</label>
                <!-- input group -->
                <div class="input-group">
                  <span class="input-group-text">+62</span>
                  <input type="tel" name="telepon" id="hp" class="form-control" pattern="[1-9]{10,15}" autocomplete="off" required>
                </div>
                <label class="form-text">*Tidak dimulai dengan angka 0</label>
              </div>
            </div>
          </div>

          <div class="mb-3">
            <label for="tingkaturgensi" class="form-label">Tingkat Urgensi</label>
            <select class="form-select" name="#" id="tingkaturgensi">
              <option value="penting">Penting</option>
              <option value="normal" selected>Normal</option>
              <option value="diatas normal">Ubnormal</option>
            </select>
          </div>

          <div>
            <p>Tingkat Eling</p>
          </div>
          <div class="mb-3 form-check">
            <input type="radio" class="form-check-input" name="jenis" id="normal">
            <label for="normal" class="form-check-label">Normal</label>
          </div>
          <div class="mb-3 form-check">
            <input type="radio" class="form-check-input" name="jenis" id="upnormal" checked>
            <label for="upnormal" class="form-check-label">UpNormal</label>
          </div>

          <div class="mb-3">
            <label for="kritiksaran" class="form-label">Kritik dan Saran</label>
            <textarea name="saran" id="kritiksaran" class="form-control" cols="30px" rows="10" placeholder="Tulis Disini"></textarea>
          </div>

          <div class="mb-3">
            <button type="button" id="btnKirim" onclick="simpanProses()" class="btn btn-primary w-100">Kirim</button>
            <button type="button" id="btnLoading" class="btn btn-primary w-100 mt-2" disabled>
              <div class="spinner-border spinner-border-sm" role="status"></div>
            </button>
          </div>
        </form>
      </div>
    </div>
  </div>
  <!-- end of form -->
  <script>
    var typed = new Typed('#typed', {
      strings: ['Welcome To Our Website'],
      typeSpeed: 20,
      backSpeed: 60,
      startDelay: 100,
      backDelay: 3800,
      showCursor: false,
      loop: false

    });
    var typed2 = new Typed('#typed2', {
      strings: ['Himpunan Mahasiwa Informatika Universitas Madura', 'Abror DC'],
      typeSpeed: 30,
      backSpeed: 30,
      startDelay: 1000,
      backDelay: 800,
      loop: true,
    });
  </script>
  <script src="assets/boot/bootstrap.bundle.min.js"></script>
  <script>
    const popoverTriggerList = document.querySelectorAll('[data-bs-toggle="popover"]')
    const popoverList = [...popoverTriggerList].map(popoverTriggerEl => new bootstrap.Popover(popoverTriggerEl))

    var myAlert = document.getElementById('myAlert');

    myAlert.style.display = 'none';

    function myFunction() {
      myAlert.style.display = 'block';
    }

    var btnKirim = document.getElementById('btnKirim');
    var btnLoading = document.getElementById('btnLoading');

    btnLoading.style.display = 'none';

    function startProses() {
      btnLoading.style.display = 'block';
      btnKirim.style.display = 'none';
    }

    function endProses() {
      btnLoading.style.display = 'none';
      btnKirim.style.display = 'block';
    }

    function simpanProses() {
      startProses();

      setTimeout(function() {
        endProses();
        myFunction()
      }, 3000);
    }

    var modalAlert = document.getElementById('modalAlert');

    modalAlert.style.display = 'none';

    function tampilModal() {
      modalAlert.style.display = 'block';
      setTimeout(function() {
        modalAlert.style.display = 'none';
      }, 3000);
    }

    var kirim = document.getElementById('kirim');
    var loading = document.getElementById('loading');

    loading.style.display = 'none';

    function mulaiProses() {
      loading.style.display = 'block';
      kirim.style.display = 'none';
    }

    function akhirProses() {
      loading.style.display = 'none';
      kirim.style.display = 'block';
    }

    function kirimProses() {
      mulaiProses();

      setTimeout(function() {
        akhirProses();
        tampilModal()
      }, 2000);
    }
  </script>
</body>

</html>