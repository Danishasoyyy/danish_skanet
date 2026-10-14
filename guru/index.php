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

    <title>Data Guru - Sistem Informasi Sekolah</title>

    <script src="https://cdn.tailwindcss.com"></script>

    <style>

        body {
            background: linear-gradient(
                135deg,
                #eff6ff,
                #dbeafe,
                #93c5fd
            );
            overflow-x: hidden;
        }

        .laut {
            background: linear-gradient(
                135deg,
                #1e3a8a,
                #2563eb,
                #38bdf8
            );
        }

        .laut-hover:hover {
            background: linear-gradient(
                135deg,
                #1e40af,
                #1d4ed8,
                #0284c7
            );
        }

        .table-row:hover {
            background-color: #eff6ff;
        }

        /* PAUS */

        .paus {
            position: fixed;
            font-size: 70px;
            opacity: 0.12;
            z-index: -1;
            animation: berenang 18s linear infinite;
        }

        .paus1 {
            top: 18%;
            left: -100px;
        }

        .paus2 {
            top: 55%;
            left: -150px;
            font-size: 50px;
            animation-duration: 23s;
            animation-delay: 5s;
        }

        .paus3 {
            top: 78%;
            left: -120px;
            font-size: 90px;
            animation-duration: 28s;
            animation-delay: 10s;
        }

        @keyframes berenang {

            0% {
                transform: translateX(-150px);
            }

            100% {
                transform: translateX(110vw);
            }

        }

    </style>

</head>


<body class="min-h-screen">


    <!-- PAUS BACKGROUND -->

    <div class="paus paus1">
        🐋
    </div>

    <div class="paus paus2">
        🐋
    </div>

    <div class="paus paus3">
        🐋
    </div>


    <!-- NAVBAR -->

    <nav class="laut shadow-lg">

        <div class="max-w-6xl mx-auto px-6 py-5">

            <div class="flex items-center justify-between">

                <div>

                    <h1 class="text-2xl font-bold text-white">
                        Sistem Informasi Sekolah
                    </h1>

                    <p class="text-blue-100 text-sm mt-1">
                        Data Guru
                    </p>

                </div>


                <a href="../index.php"
                   class="bg-white text-blue-700
                          px-5 py-2.5
                          rounded-xl
                          font-semibold
                          shadow-md
                          hover:bg-blue-50
                          transition">

                    Menu Utama

                </a>

            </div>

        </div>

    </nav>


    <!-- KONTEN -->

    <main class="max-w-6xl mx-auto px-6 py-10">


        <!-- JUDUL -->

        <div class="flex flex-col sm:flex-row
                    sm:items-center
                    sm:justify-between
                    gap-4 mb-8">

            <div>

                <span class="inline-block
                             bg-blue-600
                             text-white
                             px-4 py-1.5
                             rounded-full
                             text-sm
                             font-medium
                             mb-3">

                    Data Akademik

                </span>


                <h2 class="text-3xl font-bold text-blue-950">

                    Data Guru

                </h2>


                <p class="text-blue-700 mt-1">

                    Daftar guru yang terdaftar dalam sistem.

                </p>

            </div>


            <!-- TAMBAH -->

            <a href="tambah.php"
               class="laut laut-hover
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

        <div class="bg-white/95
                    rounded-2xl
                    border border-blue-100
                    shadow-xl
                    overflow-hidden">

            <div class="overflow-x-auto">

                <table class="w-full">


                    <!-- HEADER -->

                    <thead>

                        <tr class="laut text-white">

                            <th class="px-6 py-4
                                       text-left
                                       text-sm
                                       font-semibold">

                                NIP

                            </th>


                            <th class="px-6 py-4
                                       text-left
                                       text-sm
                                       font-semibold">

                                Nama

                            </th>


                            <th class="px-6 py-4
                                       text-left
                                       text-sm
                                       font-semibold">

                                Alamat

                            </th>


                            <th class="px-6 py-4
                                       text-center
                                       text-sm
                                       font-semibold">

                                Aksi

                            </th>

                        </tr>

                    </thead>


                    <!-- DATA -->

                    <tbody class="divide-y divide-blue-100">

                        <?php

                        $query = mysqli_query(
                            $koneksi,
                            "SELECT * FROM guru"
                        );

                        while ($data = mysqli_fetch_array($query)) {

                        ?>

                        <tr class="table-row transition">


                            <!-- NIP -->

                            <td class="px-6 py-4
                                       text-gray-700
                                       font-medium">

                                <?php echo $data['nip']; ?>

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

                                <div class="flex
                                            items-center
                                            justify-center
                                            gap-2">


                                    <!-- EDIT -->

                                    <a href="edit.php?nip=<?php echo $data['nip']; ?>"
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

                                    <a href="hapus.php?nip=<?php echo $data['nip']; ?>"
                                       onclick="return confirm('Yakin ingin menghapus data guru ini?')"
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

                🐋 Sistem Akademik Sekolah 🐋

            </p>

        </div>

    </main>

</body>

</html>