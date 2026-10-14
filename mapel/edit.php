<?php
include "koneksi.php";
$id_mapel = $_GET['id_mapel'];
$query = mysqli_query($koneksi, "select * from mapel where id_mapel='$id_mapel'");
$data = mysqli_fetch_array($query);
?>

<h1>Edit Data</h1>

<form action="update.php" method="POST">
    id_mapel : <input type="text" name="id_mapel" value="<?php echo $data['id_mapel'] ?>">
    <br>

    mapel : <input type="text" name="mapel" value="<?php echo $data['mapel'] ?>">
    <br>

    <button>Simpan</button>
</form>