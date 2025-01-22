<?php
session_start();
include_once "../../config/db.php";





?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>Blog Himatif</title>
    <!-- Favicon-->
    <link rel="icon" type="image/x-icon" href="../pages/assets/image/favicon.ico" />
    <!-- Core theme CSS (includes Bootstrap)-->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="../../assets/sweatalert/sweetalert2.min.css">
    <link rel="stylesheet" href="../../assets/boot/bootstrap.min.css">
    <link rel="stylesheet" href="../../assets/icons-boostrapp/font/bootstrap-icons.min.css">
    <link rel="stylesheet" href="../../assets/css2/app.css">
</head>

<body>
    <!-- Responsive navbar-->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark sticky-top">
        <div class="container">
            <a class="navbar-brand" href="/">Blog HIMATIF</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                    <li class="nav-item"><a class="nav-link" href="#about">About</a></li>
                    <li class="nav-item <?= (empty($_SESSION['username']) ? "d-inline" : "d-none") ?>"><a class="nav-link" href="/login">login</a></li>
                    <li class="nav-item <?= (empty($_SESSION['username']) ? "d-none" : "d-inline") ?>"><a class="nav-link" href="blog/create">Buat Blog</a></li>
                    <li class="nav-item  dropdown <?= (empty($_SESSION['username']) ? "d-none" : "d-inline") ?>">
                        <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">Hello, <i class="bi bi-person-circle"></i> <?= $_SESSION['username'] ?>
                        </a>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item text-danger" href="auth/logout.php"><i class="bi bi-box-arrow-right"></i> logout</a></li>
                        </ul>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- Page header with logo and tagline-->
    <header class="py-4 border-bottom mb-3" style="background-color: whitesmoke; height: 70vh;">
        <div class="container rounded d-flex bg-secondary">
            <div class="text-center text-white my-5">
                <h1 class="fw-bolder">Selamat Datang di Blog Himatif</h1>
                <p class="lead mb-0">Sebuah blog untuk menampung aspirasi rakyat Himatif</p>
            </div>
            <!-- <img src="../../assets/image/banner-background.svg" alt="background-svg" style="width: 600px"> -->
            <img src="../../assets/image/banner.png" alt="" width="500">
        </div>
    </header>
    <!-- Page content-->
    <div class="container">
        <div class="row">
            <!-- Blog entries-->
            <div class="col-lg-8">
                <!-- Featured blog post-->
                <div class="card mb-4 p-3">
                    <?php include 'show_blog.php'; ?>
                </div>
            </div>
            <!-- Side widgets-->
            <!-- <div class="row"> -->
            <div class="col-lg-4">
                <!-- Search widget-->
                <div class="card mb-4">
                    <div class="card-header bg-primary text-light">Search</div>
                    <div class="card-body">
                        <form action="" method="post">
                            <div class="input-group">
                                <input class="form-control" type="search" name="keyword" id="keyword" placeholder="Masukkan Keyword Pencarian" aria-label="Masukkan Keyword Pencarian" aria-describedby="button-search" autofocus autocomplete="off" />
                                <button class="btn btn-primary" name="button-search" id="button-search" type="submit"><i class="bi bi-search"></i></button>
                            </div>
                        </form>
                    </div>
                </div>
                <!-- Categories widget-->
                <div class="card mb-4">
                    <div class="card-header bg-primary text-light">Kategori</div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-sm-6">
                                <ul class="list-unstyled mb-0">
                                    <li><a href="#!">Web Design</a></li>
                                    <li><a href="#!">HTML</a></li>
                                    <li><a href="#!">Freebies</a></li>
                                </ul>
                            </div>
                            <div class="col-sm-6">
                                <ul class="list-unstyled mb-0">
                                    <li><a href="#!">JavaScript</a></li>
                                    <li><a href="#!">CSS</a></li>
                                    <li><a href="#!">Tutorials</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Side widget-->
                <div class="card mb-4">
                    <div class="card-header bg-primary text-light">informasi</div>
                    <div class="card-body">Lorem ipsum dolor sit amet consectetur adipisicing elit. Molestiae corporis nihil sequi inventore ea consectetur quia at numquam, corrupti minima doloribus consequuntur. Totam similique veritatis ullam inventore quibusdam necessitatibus quidem?</div>
                </div>
                <!-- </div> -->
            </div>
        </div>
        <!-- about -->
        <!-- About 1 - Bootstrap Brain Component -->
        <section class="py-3 py-md-5">
            <div class="container">
                <div class="row gy-3 gy-md-4 gy-lg-0 align-items-lg-center">
                    <div class="col-12 col-lg-6 col-xl-5">
                        <img class="img-fluid rounded" loading="lazy" src="../../assets/image/himatif.jpeg" alt="About 1">
                    </div>
                    <div class="col-12 col-lg-6 col-xl-7" id="about">
                        <div class="row justify-content-xl-center">
                            <div class="col-12 col-xl-11">
                                <h2 class="mb-3">About Us</h2>
                                <p class="lead fs-4 text-secondary mb-3">Blog Himpunan adalah platform yang didedikasikan untuk berbagi pengetahuan, pengalaman, dan inovasi di bidang informatika. Kami berusaha untuk menyediakan konten yang inspiratif dan edukatif bagi seluruh anggota dan pembaca kami.</p>
                                <p class="mb-5">Kami adalah komunitas yang dinamis, selalu berusaha untuk memberikan informasi yang bermanfaat dan relevan. Kami percaya pada kolaborasi, inovasi, dan keterlibatan aktif dari semua anggota. Melalui blog ini, kami terus mencari cara-cara baru untuk mendukung pengembangan pengetahuan dan keterampilan di bidang informatika.</p>
                                <div class="row gy-4 gy-md-0 gx-xxl-5X">
                                    <div class="col-12 col-md-6">
                                        <div class="d-flex">
                                            <div class="me-4 text-primary">
                                                <span><i class="bi bi-camera2 fs-2"></i></span>
                                            </div>
                                            <div>
                                                <h2 class="h4 mb-3">Konten Serbaguna</h2>
                                                <p class="text-secondary mb-0">Kami menciptakan artikel, tutorial, dan ulasan yang dapat diaplikasikan di berbagai bidang teknologi dan media digital.</p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-12 col-md-6">
                                        <div class="d-flex">
                                            <div class="me-4 text-primary">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" fill="currentColor" class="bi bi-fire" viewBox="0 0 16 16">
                                                    <path d="M8 16c3.314 0 6-2 6-5.5 0-1.5-.5-4-2.5-6 .25 1.5-1.25 2-1.25 2C11 4 9 .5 6 0c.357 2 .5 4-2 6-1.25 1-2 2.729-2 4.5C2 14 4.686 16 8 16Zm0-1c-1.657 0-3-1-3-2.75 0-.75.25-2 1.25-3C6.125 10 7 10.5 7 10.5c-.375-1.25.5-3.25 2-3.5-.179 1-.25 2 1 3 .625.5 1 1.364 1 2.25C11 14 9.657 15 8 15Z" />
                                                </svg>
                                            </div>
                                            <div>
                                                <h2 class="h4 mb-3">Komunitas Digital</h2>
                                                <p class="text-secondary mb-0">Kami percaya pada inovasi dengan menggabungkan ide-ide utama dengan konsep-konsep canggih untuk memajukan pengetahuan dan keterampilan di bidang informatika.
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- Footer-->
        <footer class="bg-dark text-white text-center text-lg-start">
            <div class="container p-4">
                <div class="row">
                    <div class="col-lg-4">
                        <h3 class="mb-4">Komunitas</h3>
                        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Voluptatibus, doloribus, eveniet iusto tempora rerum eaque, voluptate eligendi debitis quasi laborum possimus numquam nisi ratione earum consectetur consequatur sit commodi excepturi!</p>
                    </div>
                    <div class="col-lg-3 ms-5">
                        <ul class="list-unstyled float-start">
                            <h3>Link</h3>
                            <li>
                                <a href="#">About Us</a>
                            </li>
                            <li>
                                <a href="#">Project</a>
                            </li>
                            <li>
                                <a href="#">Portfolio</a>
                            </li>
                            <li>
                                <a href="#">Community</a>
                            </li>
                        </ul>
                        <ul class="list-unstyled float-end">
                            <h3>Kegiatan</h3>
                            <li>
                                <a href="#">Ngoding</a>
                            </li>
                            <li>
                                <a href="#">Ngoding</a>
                            </li>
                            <li>
                                <a href="#">Ngoding</a>
                            </li>
                            <li>
                                <a href="#">Ngoding</a>
                            </li>
                        </ul>
                    </div>
                    <div class="col-lg-4 text-center">
                        <div class="mb-4">
                            <h3>Hubungi Kami</h3>
                            <p class="te">
                                <a href="#">
                                    <span><i class="bi bi-instagram"></i></span>
                                </a>
                                <a href="#">
                                    <span><i class="bi bi-tiktok"></i></span>
                                </a>
                                <a href="#">
                                    <span><i class="bi bi-twitter"></i></span>
                                </a>
                                <a href="#">
                                    <span><i class="bi bi-facebook"></i></span>
                                </a>
                                <a href="#">
                                    <span><i class="bi bi-github"></i></span>
                                </a>
                            </p>
                        </div>
                    </div>
                </div>
            </div>
            <!-- <div class="row"> -->
            <div class="text-center p-3" style="background-color: rgba(0, 0, 0, 0.2);">
                <p class="m-0 text-center text-white">Copyright &copy; 2024 All Right Reserve
                    <i class="bi bi-heart-fill text-danger"></i>
                    <a href="github.com/Demtimcode">DC Community</a>
                </p>
            </div>
            <!-- </div> -->
        </footer>
        <script src="../../assets/sweetalert/sweetalert2.all.min.js"></script>
        <script src="../../assets/boot/bootstrap.bundle.min.js"></script>


        <script>
            // Validasi formulir sebelum mengirimkan data
            document.addEventListener('DOMContentLoaded', function() {
                var form = document.getElementById('blogForm');
                form.addEventListener('submit', function(event) {
                    var title = document.getElementById('title').value.trim();
                    var content = document.getElementById('content').value.trim();

                    if (title === '' || content === '') {
                        alert('Judul dan konten blog tidak boleh kosong.');
                        event.preventDefault(); // Menghentikan pengiriman formulir jika tidak valid
                    }
                });
            });

            function confirmDelete(id) {
                Swal.fire({
                    title: "Apakah Anda Yakin?",
                    text: "Content ini akan di hapus secara permanen!",
                    icon: "warning",
                    showCancelButton: true,
                    confirmButtonColor: "#3085d6",
                    cancelButtonColor: "#d33",
                    confirmButtonText: "ya, hapus!"
                }).then((result) => {
                    if (result.isConfirmed) {
                        Swal.fire({
                            title: "dihapus",
                            text: "content telah berhasil di hapus",
                            icon: "success"
                        }).then(() => {
                            window.location.href = "blog/delete/" + id;
                        });
                    }
                });
            }
        </script>
</body>

</html>