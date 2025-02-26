<?php

$hostname = "localhost";
$username = "root";
$pass = "";
$dbname = "himatif_test";

// $hostname = "sql103.infinityfree.com";
// $username = "if0_38152781";
// $pass = "himatif2024";
// $dbname = "if0_38152781_himatif";

$connect = mysqli_connect($hostname, $username, $pass, $dbname);


function kuery($query)
{
    global $connect;
    $result = mysqli_query($connect, $query);
    $rows = [];
    while ($row = mysqli_fetch_assoc($result)) {
        $rows[] = $row;
    }

    return $rows;
}

function search($keyword)
{
    $query = "SELECT b.judul, b.konten, b.created_by, u.username FROM blog b JOIN user u ON b.created_by = u.id
    WHERE b.judul LIKE '%$keyword%'OR
          b.konten LIKE '%$keyword%'OR
          b.created_by LIKE '%$keyword%'
          ";
    return kuery($query);
}
