<?php
session_start();

if (!isset($_SESSION["username"])) {
    header("Location: ../../../index.php");
    exit;
}

require '../../config/db.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $title = htmlspecialchars($_POST['title']);
    $slug = strtolower(str_replace(' ', '-', $title));
    $content = htmlspecialchars($_POST['konten']);
    $created_by = $_SESSION['id'];

    $namaFile = $_FILES['image']['name'];
    $size = $_FILES['image']['size'];
    $error = $_FILES['image']['error'];
    $tmpName = $_FILES['image']['tmp_name'];

    $ekstesiGambarValid = ['jpg', 'jpeg', 'png'];
    $ekstensiGambar = explode('.', $namaFile);
    $ekstensiGambar = strtolower(end($ekstensiGambar));
    if (!in_array($ekstensiGambar, $ekstesiGambarValid)) {
        echo "<script>
        alert('Tipe gambar harus jpg, jpeg, png');
        </script>";
        return;
    }

    // cek jika ukuran terlalu besar 
    if ($size > 2000000) {
        echo "<script>
        alert('Ukuran tidak boleh lebih dari 2mb');
        </script>";
        return;
    }

    // lolos pengecekan gambar
    // generate nama file baru
    $namaFileBaru = uniqid();
    $namaFileBaru .= '.';
    $namaFileBaru .= $ekstensiGambar;
    $filePath = '../../public/img/' . $namaFileBaru;
    move_uploaded_file($tmpName, $filePath);

    $query = "INSERT INTO blog (judul,slug, konten, image, created_by) VALUES ('$title','$slug', '$content', '$namaFileBaru', '$created_by')";
    $result = mysqli_query($connect, $query);

    if ($result) {
        echo "
        <script>
            alert('Blog berhasil dibuat');
            document.location.href = '/blog';
        </script>
        ";
    } else {
        echo "
        <script>
            alert('Blog gagal dibuat');
            document.location.href = '/blog';
        </script>
        ";
    }
}

?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form Create Blog</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="../../assets/boot/bootstrap.min.css">
    <link rel="stylesheet" href="../../assets/css2/app.css">
</head>

<body>
    <!-- form buat blog -->
    <div class="container py-5">
        <div class="card bg-secondary mb-4 text-light">
            <div class="card-body" id="create-blog">
                <h2 class="card-title text-center">Buat Blog Baru</h2>
                <form action="/blog/create" method="post" enctype="multipart/form-data">
                    <div class="mb-3">
                        <label for="title" class="form-label">Judul Blog</label>
                        <input type="text" class="form-control" id="title" name="title" required>
                    </div>
                    <div class="mb-3">
                        <label for="konten" class="form-label">Deskripsi Konten Blog</label>
                        <textarea class="form-control" id="konten" name="konten" rows="5" required></textarea>
                    </div>
                    <div class="mb-3">
                        <label for="image" class="form-label">Unggah Gambar Blog</label>
                        <input type="file" class="form-control" id="image" name="image">
                    </div>
                    <button type="submit" name="submit" class="btn btn-primary">Buat Blog</button>
                    <a href="/blog" class="btn btn-warning">Kembali</a>
                </form>
            </div>
        </div>

    </div>



    <script src="../../assets/boot/bootstrap.bundle.min.js"></script>
</body>

</html>