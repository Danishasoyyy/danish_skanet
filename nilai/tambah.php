<?php
include "koneksi.php";
?>

<h1>Tambah Data Nilai</h1>
<form action="simpan.php" method="post">
nama :
<select name="nis" id="">
    <?php
    $query = mysqli_query($koneksi, "select * from siswa");
    while ($data = mysqli_fetch_array($query)) {
    ?>

    <option value="<?php echo $data['nis'] ?>"><?php echo $data['nama'] ?></option>

    <?php
    }
    ?>
</select>
<br>
Guru :
<select name="nip" id="">
    <?php
    $query = mysqli_query($koneksi, "select * from guru");
    while ($data = mysqli_fetch_array($query)) {
    ?>

    <option value="<?php echo $data['nip'] ?>"><?php echo $data['nama'] ?></option>

    <?php
    }
    ?>
</select>
<br>
Mapel :
<select name="id_mapel" id="">
    <?php
    $query = mysqli_query($koneksi, "select * from mapel");
    while ($data = mysqli_fetch_array($query)) {
    ?>

    <option value="<?php echo $data['id_mapel'] ?>"><?php echo $data['mapel'] ?></option>

    <?php
    }
    ?>
</select>
<br>
Nilai : <input type="text" name="nilai">
<br>
<button>Simpan</button>
</form>
