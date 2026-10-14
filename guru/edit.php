<?php
include "koneksi.php";
$nip = $_GET['nip'];
$query = mysqli_query($koneksi, "select * from guru where nip='$nip'");
$data = mysqli_fetch_array($query);
?>

<h1>Edit Data</h1>

<form action="update.php" method="POST">
    Nip : <input type="text" name="nip" value="<?php echo $data['nip'] ?>">
    <br>

    Nama : <input type="text" name="nama" value="<?php echo $data['nama'] ?>">
    <br>

    Alamat : <input type="text" name="alamat" value="<?php echo $data['alamat'] ?>">
    <br>

    <button>Simpan</button>
</form>