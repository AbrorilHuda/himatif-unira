<?php
include_once '../../config/db.php';
// session_start();
$user_id = $_SESSION['id'] ?? null;



$result = mysqli_query($connect, 'SELECT b.*, u.username FROM blog b JOIN user u ON b.created_by = u.id ORDER BY b.created_at DESC');

// Ambil keyword dari parameter URL
$keyword = isset($_POST['keyword']) ? $_POST['keyword'] : (isset($_GET['keyword']) ? $_GET['keyword'] : '');

// Query pencarian
$whereClause = '';
if ($keyword != '') {
    $whereClause = "WHERE b.judul LIKE '%$keyword%' OR b.konten LIKE '%$keyword%' OR b.created_by LIKE '%$keyword%'";
}



// pagination
$jumlahDataPerHalaman = 4;
$jumlahDataQuery = mysqli_query($connect, "SELECT * FROM blog b JOIN user u ON b.created_by = u.id $whereClause");
$jumlahData = mysqli_num_rows($jumlahDataQuery);
$jumlahHalaman = ceil($jumlahData / $jumlahDataPerHalaman);
$halamanAktif = (isset($_GET["halaman"])) ? $_GET["halaman"] : 1;
$awalData = ($jumlahDataPerHalaman * $halamanAktif) - $jumlahDataPerHalaman;
$blog = mysqli_query($connect, "SELECT b.*, u.username FROM blog b JOIN user u ON b.created_by = u.id $whereClause ORDER BY b.created_at DESC LIMIT $awalData, $jumlahDataPerHalaman");

// if ($keyword != $blog) {
//     include "../404.php";
// }






?>
<!-- Page content-->
<div class="row">
    <!-- Blog entries-->
    <?php $i = 1; ?>
    <?php foreach ($blog as $b) : ?>
        <div class="col-lg-6">
            <div class="card border-primary mb-4">
                <a href="blog/detail/<?= $b['slug']; ?>"><img class="card-img-top" src="../../public/img/<?= htmlspecialchars($b['image']) ?>" alt="Gambar Blog" style="width: 100%; height: 200px; object-fit: cover;" /></a>
                <div class="card-body">
                    <div class="small text-muted">
                        <?= date('F d, Y', strtotime($b['created_at'])); ?> by <?php echo htmlspecialchars($b['username']); ?>
                    </div>
                    <h2 class="card-title"><?= htmlspecialchars($b['judul']) ?></h2>
                    <p class="card-text"><?= htmlspecialchars(substr($b['konten'], 0, 30)) ?>...</p>
                    <a class="btn btn-primary" href="blog/detail/<?= $b['slug']; ?>">Selengkapnya →</a>
                    <?php if ($b['created_by'] == $user_id) : ?>
                        <a class="btn btn-warning" href="blog/edit/<?= $b['id']; ?>">Edit</a>
                    <?php endif; ?>
                    <?php if ($b['created_by'] == $user_id) : ?>
                        <a class="btn btn-danger" href="#" onclick="confirmDelete(<?= $b['id']; ?>)">Hapus</a>
                    <?php endif; ?>
                </div>
            </div>
        </div>
        <?php $i++; ?>
    <?php endforeach; ?>
</div>
<nav aria-label="Pagination">
    <hr class="my-0" />
    <ul class="pagination justify-content-center my-4">
        <?php if ($halamanAktif <= 1) { ?>
            <li class="page-item disabled"><a class="page-link" href="?halaman=<?= $halamanAktif - 1 ?>" tabindex="-1" aria-disabled="true">Prev</a></li>
        <?php } else { ?>
            <li class="page-item"><a class="page-link" href="?halaman=<?= $halamanAktif - 1 ?>" tabindex="-1" aria-disabled="true">Prev</a></li>
        <?php } ?>
        <?php for ($i = 1; $i <= $jumlahHalaman; $i++) : ?>
            <?php if ($i == $halamanAktif) : ?>
                <li class="page-item" aria-current="page"><a class="page-link" href="?halaman=<?= $i; ?>" style="font-weight: bold; color: white; background-color: blue"><?= $i; ?></a></li>
            <?php else : ?>
                <li class="page-item"><a class="page-link" href="?halaman=<?= $i; ?>"><?= $i; ?></a></li>
            <?php endif; ?>
        <?php endfor; ?>
        <!-- <li class="page-item" aria-current="page"><a class="page-link" href="#!">1</a></li> -->
        <?php if ($halamanAktif >= $jumlahHalaman) { ?>
            <li class="page-item disabled"><a class="page-link" href="?halaman=<?= $halamanAktif + 1 ?>">Next</a></li>
        <?php } else { ?>
            <li class="page-item"><a class="page-link" href="?halaman=<?= $halamanAktif + 1 ?>">Next</a></li>
        <?php } ?>
    </ul>
</nav>