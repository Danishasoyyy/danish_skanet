<?php
include "koneksi.php";

$id_nilai = $_GET['id_nilai'];

/* Ambil data nilai berdasarkan id_nilai */
$query = mysqli_query($koneksi, "
    SELECT *
    FROM nilai
    WHERE id_nilai='$id_nilai'
");

$data = mysqli_fetch_array($query);

if (!$data) {
    echo "Data tidak ditemukan!";
    exit;
}

/* Ambil semua data siswa */
$data_siswa = mysqli_query($koneksi, "
    SELECT * FROM siswa
");

/* Ambil semua data mapel */
$data_mapel = mysqli_query($koneksi, "
    SELECT * FROM mapel
");

/* Ambil semua data guru */
$data_guru = mysqli_query($koneksi, "
    SELECT * FROM guru
");
?>

<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Data Nilai</title>
</head>

<body>

<h1>Edit Data Nilai</h1>

<form action="update.php" method="POST">

    <!-- ID Nilai -->
    <input type="hidden"
           name="id_nilai"
           value="<?php echo $data['id_nilai']; ?>">


    <!-- Nama Siswa -->
    <label>Nama Siswa</label>
    <br>

    <select name="nis">

        <?php
        while ($siswa = mysqli_fetch_array($data_siswa)) {
        ?>

            <option value="<?php echo $siswa['nis']; ?>"
                <?php
                if ($siswa['nis'] == $data['nis']) {
                    echo "selected";
                }
                ?>
            >
                <?php echo $siswa['nama']; ?>
            </option>

        <?php
        }
        ?>

    </select>

    <br><br>


    <!-- Mapel -->
    <label>Mapel</label>
    <br>

    <select name="id_mapel">

        <?php
        while ($mapel = mysqli_fetch_array($data_mapel)) {
        ?>

            <option value="<?php echo $mapel['id_mapel']; ?>"
                <?php
                if ($mapel['id_mapel'] == $data['id_mapel']) {
                    echo "selected";
                }
                ?>
            >
                <?php echo $mapel['mapel']; ?>
            </option>

        <?php
        }
        ?>

    </select>

    <br><br>


    <!-- Nama Guru -->
    <label>Nama Guru</label>
    <br>

    <select name="nip">

        <?php
        while ($guru = mysqli_fetch_array($data_guru)) {
        ?>

            <option value="<?php echo $guru['nip']; ?>"
                <?php
                if ($guru['nip'] == $data['nip']) {
                    echo "selected";
                }
                ?>
            >
                <?php echo $guru['nama']; ?>
            </option>

        <?php
        }
        ?>

    </select>

    <br><br>


    <!-- Nilai -->
    <label>Nilai</label>
    <br>

    <input type="number"
           name="nilai"
           value="<?php echo $data['nilai']; ?>">

    <br><br>

    <button type="submit">Simpan</button>

    <a href="index.php">Kembali</a>

</form>

</body>

</html>