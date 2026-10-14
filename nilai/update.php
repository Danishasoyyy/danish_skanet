<?php

include "koneksi.php";

$id_nilai = $_POST['id_nilai'];
$nis      = $_POST['nis'];
$id_mapel = $_POST['id_mapel'];
$nip      = $_POST['nip'];
$nilai    = $_POST['nilai'];

$query = mysqli_query($koneksi, "
    UPDATE nilai SET
        nis='$nis',
        id_mapel='$id_mapel',
        nip='$nip',
        nilai='$nilai'
    WHERE id_nilai='$id_nilai'
");

if ($query) {

    header("Location: index.php");
    exit;

} else {

    echo "Gagal mengubah data!";
    echo "<br>";
    echo mysqli_error($koneksi);

}

?>