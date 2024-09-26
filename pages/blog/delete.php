<?php
include_once '../../config/db.php';
session_start();

if (!isset($_SESSION['id'])) {
    echo "<script>alert('Anda harus login untuk mengakses halaman ini.');
    window.location='/';</script>";
    exit;
}

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $user_id = $_SESSION['id'];


    $cek_query = "SELECT * FROM blog WHERE id='$id' AND created_by='$user_id'";
    $cek_result = mysqli_query($connect, $cek_query);
    if (mysqli_num_rows($cek_result) > 0) {
        $fiks = mysqli_fetch_assoc($cek_result);
        $delete_query = "DELETE FROM blog WHERE id = $id";
        if (mysqli_query($connect, $delete_query)) {
            unlink("../../public/img/" . $fiks['image']);
            header('Location: /blog');
        } else {
            echo "<script>alert('Gagal menghapus blog.');window.location='/blog';</script>";
        }
    }
}
















//     } else {
//         echo "<script>alert('Anda tidak bisa menghapus blog ini.');window.location='index.php';</script>";
//     }
// } else {
//     echo "<script>alert('ID blog tidak ditemukan.');window.location='index.php';</script>";
// }
