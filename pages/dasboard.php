<!-- start content -->
<?php
include "../config/db.php";
$jml = mysqli_query($connect, "SELECT count(*) as jml FROM user");
$jml_blog = mysqli_query($connect, "SELECT count(*) as jml FROM blog");
$noverifikasi = mysqli_query($connect, "SELECT COUNT(is_verifica) as noverif FROM user WHERE is_verifica = 0");
$verifikasi = mysqli_query($connect, "SELECT COUNT(is_verifica) as verif FROM user WHERE is_verifica = 1");

$result = mysqli_fetch_array($jml);
$result2 = mysqli_fetch_array($jml_blog);
$result3 = mysqli_fetch_array($noverifikasi);
$result4 = mysqli_fetch_array($verifikasi);

?>
<div class="container-fluid py-4">
  <div class="row">
    <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
      <div class="card">
        <div class="card-body p-3">
          <div class="row">
            <div class="col-8">
              <div class="numbers">
                <p class="text-sm mb-0 text-uppercase font-weight-bold">Member</p>
                <h5 class="font-weight-bolder">
                  <?= $result['jml'] ?> member
                </h5>
                <p class="mb-0">
                  <span class="text-success text-sm font-weight-bolder"></span>
                  active
                </p>
              </div>
            </div>
            <div class="col-4 text-end">
              <div class="icon icon-shape bg-gradient-primary shadow-primary text-center rounded-circle">
                <i class="ni ni-money-coins text-lg opacity-10" aria-hidden="true"></i>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
      <div class="card">
        <div class="card-body p-3">
          <div class="row">
            <div class="col-8">
              <div class="numbers">
                <p class="text-sm mb-0 text-uppercase font-weight-bold">Publis Blog</p>
                <h5 class="font-weight-bolder">
                  <?= $result2['jml'] ?> content
                </h5>
                <p class="mb-0">
                  <span class="text-success text-sm font-weight-bolder"></span>
                  active
                </p>
              </div>
            </div>
            <div class="col-4 text-end">
              <div class="icon icon-shape bg-gradient-danger shadow-danger text-center rounded-circle">
                <i class="ni ni-world text-lg opacity-10" aria-hidden="true"></i>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
      <div class="card">
        <div class="card-body p-3">
          <div class="row">
            <div class="col-8">
              <div class="numbers">
                <p class="text-sm mb-0 text-uppercase font-weight-bold">Pendaftar Baru</p>
                <h5 class="font-weight-bolder">
                <?= $result4['verif'] ?>
                </h5>
                <p class="mb-0">
                  <span class="text-danger text-sm font-weight-bolder"></span>
                  TerVerifikasi
                </p>
              </div>
            </div>
            <div class="col-4 text-end">
              <div class="icon icon-shape bg-gradient-success shadow-success text-center rounded-circle">
                <i class="ni ni-paper-diploma text-lg opacity-10" aria-hidden="true"></i>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="col-xl-3 col-sm-6">
      <div class="card">
        <div class="card-body p-3">
          <div class="row">
            <div class="col-8">
              <div class="numbers">
                <p class="text-sm mb-0 text-uppercase font-weight-bold">Pendaftar Baru</p>
                <h5 class="font-weight-bolder">
                  <?= $result3['noverif'] ?>
                </h5>
                <p class="mb-0">
                  <span class="text-success text-sm font-weight-bolder"></span> Belum TerVerifikasi
                </p>
              </div>
            </div>
            <div class="col-4 text-end">
              <div class="icon icon-shape bg-gradient-warning shadow-warning text-center rounded-circle">
                <i class="ni ni-cart text-lg opacity-10" aria-hidden="true"></i>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- end content -->
  <div class="row mt-4">
    <?php include "../layouts/components/trafik.php"; ?>
    <?php include "../layouts/components/category.php"; ?>
  </div>
  <!-- history update tahun depan -->