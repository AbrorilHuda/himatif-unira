<?php
require "../../config/db.php";
// require "../../config/functions.php";


$keyword = $_GET["keyword"];

$query = "SELECT * FROM blog
            WHERE 
            judul LIKE '%$keyword%',
            konten LIKE '%$keyword%',
            created_at LIKE '%$keyword%',
            created_by LIKE '%$keyword%',
            update_at LIKE '%$keyword%'
            ";
$blog = kuery($query);
?>

<div class="row">
    <!-- Blog entries-->
    <?php $i = 1; ?>
    <?php foreach ($blog as $b) : ?>
        <div class="col-lg-6">
            <div class="card mb-4">
                <a href="detail_blog.php?id=<?= $b['id']; ?>"><img class="card-img-top" src="../../public/img/<?= htmlspecialchars($b['image']) ?>" alt="Gambar Blog" /></a>
                <div class="card-body">
                    <div class="small text-muted">
                        <?= date('F d, Y', strtotime($b['created_at'])); ?> by <?php echo htmlspecialchars($b['username']); ?>
                    </div>
                    <h2 class="card-title"><?= htmlspecialchars($b['judul']) ?></h2>
                    <p class="card-text"><?= htmlspecialchars(substr($b['konten'], 0, 150)) ?>...</p>
                    <a class="btn btn-primary" href="detail_blog.php?id<?= $b['id']; ?>">Selengkapnya →</a>
                </div>
            </div>
        </div>
        <?php $i++; ?>
    <?php endforeach; ?>
</div>