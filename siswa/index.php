<?php

include "koneksi.php";

session_start();

if ($_SESSION['status'] <> "sukses") {
    header('location:../logout.php');
    exit;
}

?>

<!DOCTYPE html>
<html lang="id">

<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Data Siswa - Sistem Informasi Sekolah</title>

    <script src="https://cdn.tailwindcss.com"></script>

    <style>

        body {
            background: linear-gradient(
                135deg,
                #eff6ff,
                #dbeafe,
                #bfdbfe
            );
        }

        .api {
            background: linear-gradient(
                135deg,
                #1d4ed8,
                #2563eb,
                #38bdf8
            );
        }

        .api-hover:hover {
            background: linear-gradient(
                135deg,
                #1e40af,
                #2563eb,
                #0284c7
            );
        }

        .table-row:hover {
            background-color: #eff6ff;
        }

    </style>

</head>

<body class="min-h-screen">


    <!-- NAVBAR -->

    <nav class="api shadow-lg">

        <div class="max-w-6xl mx-auto px-6 py-5">

            <div class="flex items-center justify-between">

                <div>

                    <h1 class="text-2xl font-bold text-white">
                        Sistem Informasi Sekolah
                    </h1>

                    <p class="text-blue-100 text-sm mt-1">
                        Data Siswa
                    </p>

                </div>

                <a href="../index.php"
                   class="bg-white text-blue-700 px-5 py-2.5
                          rounded-xl font-semibold shadow-md
                          hover:bg-blue-50 transition">

                    Menu Utama

                </a>

            </div>

        </div>

    </nav>


    <!-- KONTEN -->

    <main class="max-w-6xl mx-auto px-6 py-10">


        <!-- JUDUL -->

        <div class="flex flex-col sm:flex-row
                    sm:items-center sm:justify-between
                    gap-4 mb-8">

            <div>

                <span class="inline-block
                             bg-blue-600 text-white
                             px-4 py-1.5 rounded-full
                             text-sm font-medium mb-3">

                    Data Akademik

                </span>

                <h2 class="text-3xl font-bold text-blue-950">
                    Data Siswa
                </h2>

                <p class="text-blue-700 mt-1">
                    Daftar siswa yang terdaftar dalam sistem.
                </p>

            </div>


            <!-- TAMBAH -->

            <a href="tambah.php"
               class="api api-hover
                      text-white
                      px-5 py-3
                      rounded-xl
                      font-semibold
                      shadow-lg
                      transition
                      hover:-translate-y-0.5">

                + Tambah Data

            </a>

        </div>


        <!-- TABEL -->

        <div class="bg-white rounded-2xl
                    border border-blue-100
                    shadow-xl overflow-hidden">

            <div class="overflow-x-auto">

                <table class="w-full">

                    <thead>

                        <tr class="api text-white">

                            <th class="px-6 py-4 text-left
                                       text-sm font-semibold">
                                NIS
                            </th>

                            <th class="px-6 py-4 text-left
                                       text-sm font-semibold">
                                Nama
                            </th>

                            <th class="px-6 py-4 text-left
                                       text-sm font-semibold">
                                Alamat
                            </th>

                            <th class="px-6 py-4 text-center
                                       text-sm font-semibold">
                                Aksi
                            </th>

                        </tr>

                    </thead>


                    <tbody class="divide-y divide-blue-100">

                        <?php

                        $query = mysqli_query(
                            $koneksi,
                            "SELECT * FROM siswa"
                        );

                        while ($data = mysqli_fetch_array($query)) {

                        ?>

                        <tr class="table-row transition">


                            <!-- NIS -->

                            <td class="px-6 py-4
                                       text-gray-700
                                       font-medium">

                                <?php echo $data['nis']; ?>

                            </td>


                            <!-- NAMA -->

                            <td class="px-6 py-4
                                       text-gray-800
                                       font-semibold">

                                <?php echo $data['nama']; ?>

                            </td>


                            <!-- ALAMAT -->

                            <td class="px-6 py-4
                                       text-gray-600">

                                <?php echo $data['alamat']; ?>

                            </td>


                            <!-- AKSI -->

                            <td class="px-6 py-4">

                                <div class="flex items-center
                                            justify-center gap-2">


                                    <!-- EDIT -->

                                    <a href="edit.php?nis=<?php echo $data['nis']; ?>"
                                       class="px-4 py-2
                                              rounded-lg
                                              bg-blue-100
                                              text-blue-700
                                              text-sm
                                              font-semibold
                                              hover:bg-blue-200
                                              transition">

                                        Edit

                                    </a>


                                    <!-- HAPUS -->

                                    <a href="hapus.php?nis=<?php echo $data['nis']; ?>"
                                       onclick="return confirm('Yakin ingin menghapus data siswa ini?')"
                                       class="px-4 py-2
                                              rounded-lg
                                              bg-red-100
                                              text-red-600
                                              text-sm
                                              font-semibold
                                              hover:bg-red-200
                                              transition">

                                        Hapus

                                    </a>

                                </div>

                            </td>

                        </tr>

                        <?php

                        }

                        ?>

                    </tbody>

                </table>

            </div>

        </div>


        <!-- KEMBALI -->

        <div class="mt-6">

            <a href="../index.php"
               class="text-blue-600
                      font-semibold
                      hover:text-blue-800
                      transition">

                ← Kembali ke Menu Utama

            </a>

        </div>


        <!-- FOOTER -->

        <div class="text-center mt-12">

            <p class="text-blue-700 text-sm">

                © <?php echo date('Y'); ?>
                Sistem Informasi Sekolah

            </p>

            <p class="text-blue-400 text-xs mt-1">

                Dashboard Akademik

            </p>

        </div>

    </main>

</body>

</html>