<?php
include_once '../../config/db.php';
session_start();

if (!isset($_SESSION['id'])) {
    header('Location: /');
    exit;
}

$user_id = $_SESSION['id'];

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $blog_id = mysqli_query($connect, "SELECT * FROM blog WHERE id = $id AND created_by = $user_id");
    $b_r = mysqli_fetch_assoc($blog_id);

    if (!$b_r) {
        echo "Anda tidak bisa mengedit blog ini.";
        exit;
    }
}


if (isset($_POST['edit'])) {
    $judul = htmlspecialchars($_POST['judul']);
    $slug = strtolower(str_replace(' ', '-', $judul));
    $konten = htmlspecialchars($_POST['konten']);
    $imageLama = htmlspecialchars($_POST['imageLama']);


    $image = $_FILES['image']['name'];
    $tmp = $_FILES['image']['tmp_name'];
    $size = $_FILES['image']['size'];

    if ($image != "") {
        if ($size > 2 * 1024 * 1024) {
            echo "Gambar tidak boleh lebih dari 2mb";
            exit;
        }

        $ext = pathinfo($image, PATHINFO_EXTENSION);
        $imageBaru = date('dmYHis') . "$ext";
        $path = "../../public/img/" . $imageBaru;


        if (move_uploaded_file($tmp, $path)) {
            if (file_exists("../../public/img/" . $imageLama)) {
                unlink("../../public/img/" . $imageLama);
            }
            $image = $imageBaru;
        }
        // } else {
        //     echo "Gagal mengupload gambar.";
        //     exit;
        // }
    } else {
        $image = $imageLama;
    }

    $query = "UPDATE blog SET judul = '$judul',slug = '$slug', konten = '$konten', image = '$image'
                WHERE id = $id AND created_by = $user_id";
    $sukses = mysqli_query($connect, $query);

    if ($sukses) {
        echo "
        <script>
            alert('Blog berhasil diubah');
            document.location.href = '/blog';
        </script>
        ";
    } else {
        echo "
        <script>
            alert('Blog gagal diubah');
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
    <div class="container py-5">
        <div class="card bg-secondary mb-4 text-light">
            <div class="card-body" id="">
                <h2 class="card-title text-center">Edit Blog</h2>
                <form action="" method="post" enctype="multipart/form-data">
                    <div class="mb-3">
                        <label for="title" class="form-label">Judul Blog</label>
                        <input type="text" class="form-control" id="judul" name="judul" required value="<?= $b_r['judul'] ?>">
                    </div>
                    <div class="mb-3">
                        <label for="konten" class="form-label">Deskripsi Konten Blog</label>
                        <textarea class="form-control" id="konten" name="konten" rows="5" required><?= $b_r['konten'] ?></textarea>
                    </div>
                    <div class="mb-3">
                        <label for="image" class="form-label">Edit Gambar Blog</label>
                        <input type="file" class="form-control" id="image" name="image">
                        <br>
                        <img src="../../public/img/<?= $b_r['image'] ?>" alt="" width="200">
                        <br>
                        <input type="hidden" name="imageLama" value="<?= $b_r["image"]; ?>">
                    </div>
                    <button type="submit" name="edit" class="btn btn-primary">Edit Blog</button>
                    <a href="/blog" class="btn btn-warning">Batal</a>
                </form>
            </div>
        </div>

    </div>



    <script src="../../assets/boot/bootstrap.bundle.min.js"></script>
</body>

</html>