
<?php
include "koneksi.php";
$nis = $_GET['nis'];
$query = mysqli_query($koneksi, "select * from siswa where nis='$nis'");
$data = mysqli_fetch_array($query);
?>

<h1>Edit Data</h1>

<form action="update.php" method="POST">
    Nis : <input type="text" name="nis" value="<?php echo $data['nis'] ?>">
    <br>

    Nama : <input type="text" name="nama" value="<?php echo $data['nama'] ?>">
    <br>

    Alamat : <input type="text" name="alamat" value="<?php echo $data['alamat'] ?>">
    <br>

    <button>Simpan</button>
</form>