<?php
include "../layouts/header.php";
session_start();
include "../config/db.php";
if (isset($_POST['login'])) {
  $email = $_POST['email'];
  $password = $_POST['password'];
  $query = mysqli_query($connect, "SELECT * FROM user WHERE email='$email' AND password='$password'");
  if (mysqli_num_rows($query) > 0) {
    $verif = mysqli_fetch_assoc($query);
    if ($verif['is_verifica'] == 1) {
      $_SESSION["id"] = $verif['id'];
      $_SESSION["username"] = $verif['username'];
      $_SESSION["role"] = $verif['role'];
      if ($verif['role'] == "admin") {
        $_SESSION["role"] = $verif['role'];
        header("location: ../pages/admin.php?menu=dashboard");
      } else {
        echo "<script>alert('login berhasil');</script>";
        header("Location: /");
      }
      exit;
    } else {
      echo "<script>alert('harap verifikasi akun anda')</script>";
    }
  } else {
    echo "<script>alert('email atau password salah')</script>";
  }
}

?>

<main class="main-content  mt-0">
  <section>
    <div class="page-header min-vh-100">
      <div class="container">
        <div class="row">
          <div class="col-xl-4 col-lg-5 col-md-7 d-flex flex-column mx-lg-0 mx-auto">
            <div class="card card-plain">
              <div class="card-header pb-0 text-start">
                <h4 class="font-weight-bolder">Sign In</h4>
                <p class="mb-0">Enter your email and password to sign in</p>
              </div>
              <div class="card-body">
                <form role="form" action="/login" method="post">
                  <div class="mb-3">
                    <input type="email" name="email" class="form-control form-control-lg" placeholder="Email" aria-label="Email">
                  </div>
                  <div class="mb-3">
                    <input type="password" name="password" class="form-control form-control-lg" placeholder="Password" aria-label="Password">
                  </div>
                  <div class="form-check form-switch">
                    <input class="form-check-input" type="checkbox" id="rememberMe">
                    <label class="form-check-label" for="rememberMe">Remember me</label>
                  </div>
                  <div class="text-center">
                    <button type="submit" name="login" class="btn btn-lg btn-primary btn-lg w-100 mt-4 mb-0">Sign in</button>
                  </div>
                </form>
              </div>
              <div class="card-footer text-center pt-0 px-lg-2 px-1">
                <p class="mb-4 text-sm mx-auto">
                  Don't have an account?
                  <a href="/register" class="text-primary text-gradient font-weight-bold">Sign up</a>
                </p>
              </div>
            </div>
          </div>
          <div class="col-6 d-lg-flex d-none h-100 my-auto pe-0 position-absolute top-0 end-0 text-center justify-content-center flex-column">
            <div class="position-relative bg-gradient-primary h-100 m-3 px-7 border-radius-lg d-flex flex-column justify-content-center overflow-hidden" style="background-image: url('https://raw.githubusercontent.com/creativetimofficial/public-assets/master/argon-dashboard-pro/assets/img/signin-ill.jpg');
          background-size: cover;">
              <span class="mask bg-gradient-primary opacity-6"></span>
              <h4 class="mt-5 text-white font-weight-bolder position-relative">"Coding seni berfikir"</h4>
              <p class="text-white position-relative">Pemrograman bukan tentang apa yang Anda ketahui; tetapi tentang apa yang dapat Anda pahami.</p>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
</main>
<?php include "../layouts/footer.php" ?>