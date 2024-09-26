<?php
include_once '../../config/db.php';

if (isset($_GET['id'])) {
    $blog_id = intval($_GET['id']);

    $query = mysqli_query($connect, "SELECT b.*, u.username FROM blog as b INNER JOIN user as u ON b.created_by = u.id WHERE b.id = $blog_id");
    if (mysqli_num_rows($query) > 0) {
        $blog = mysqli_fetch_assoc($query);
    } else {
        include "../404.php";
        exit();
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo htmlspecialchars($blog['judul']); ?></title>
    <link rel="stylesheet" href="../../assets/boot/bootstrap.min.css">
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark sticky-top">
        <div class="container">
            <a class="navbar-brand" href="#">Blog</a>
            <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                <li class="nav-item"><a class="btn btn-outline-light" href="index.php">Home</a></li>
            </ul>
        </div>
    </nav>
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card mb-4 shadow-sm">
                    <div class="card-body">
                        <h1 class="card-title"><?php echo htmlspecialchars($blog['judul']); ?></h1>
                        <p class="card-text text-muted"><?php echo date('F d, Y', strtotime($blog['created_at'])); ?> created by <?php echo htmlspecialchars($blog['username']); ?></p>
                    </div>
                    <img src="../../public/img/<?php echo htmlspecialchars($blog['image']); ?>" alt="Blog Image" class="card-img-top">
                    <div class="card-body">
                        <p class="card-text"><?php echo nl2br(htmlspecialchars($blog['konten'])); ?></p>
                        <a href="/blog" class="btn btn-primary">Back to Home</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="../../assets/boot/bootstrap.bundle.min.js"></script>
</body>

</html>