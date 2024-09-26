<?php
include "../../config/db.php";

$code = $_GET['code'];
$cek = mysqli_fetch_array(mysqli_query($connect, "SELECT is_verifica FROM user WHERE verification_code = '$code'"));
if($cek['is_verifica'] == 1){
?>


<script>alert("anda sudah verifikasi"); window.location = "../login.php"</script>

<?php
}else if(isset($_GET['code'])){
    $query = mysqli_query($connect,"SELECT * FROM user WHERE verification_code = '$code'");

    $result = mysqli_fetch_assoc($query);
    $query1 = mysqli_query($connect,"UPDATE user SET is_verifica=1 WHERE id = '".$result['id']."'");  
?>

<script>alert("verifikasi berhasil"); window.location = "/login";</script>


<?php
}



?>

