<?php
include "koneksi.php";

$id_mapel = $_POST['id_mapel'];
$mapel = $_POST['mapel'];

$query = mysqli_query($koneksi, "INSERT INTO mapel(id_mapel, mapel) VALUES('$id_mapel', '$mapel')");

if ($query) {
    header("Location: index.php");
    exit;
} else {
    echo "Gagal menambahkan data: " . mysqli_error($koneksi);
}
?>