<?php
session_start();
$menu = (isset($_GET['menu'])) ? $_GET['menu'] : "dashboard";

if (!isset($_SESSION["username"]) && $_SESSION["role"] != "admin") {
  header("Location: /login");
  exit;
}


?>
<?php include "../layouts/header.php"; ?>
<?php include "../layouts/components/sidebar.php"; ?>
<main class="main-content position-relative border-radius-lg ">
  <?php include "../layouts/components/navbar.php" ?>


  <?php include "../routers/router.php" ?>


</main>
<?php include "../layouts/footer.php" ?>