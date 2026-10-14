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

    <title>Data Mapel - Sistem Informasi Sekolah</title>

    <script src="https://cdn.tailwindcss.com"></script>

    <style>

        /* =========================
           BACKGROUND LAUT
        ========================= */

        body {
            margin: 0;
            background: linear-gradient(
                180deg,
                #dff6ff 0%,
                #bae6fd 35%,
                #7dd3fc 70%,
                #38bdf8 100%
            );

            overflow-x: hidden;
        }


        /* =========================
           NAVBAR
        ========================= */

        .laut {
            background: linear-gradient(
                135deg,
                #075985,
                #0284c7,
                #0ea5e9
            );
        }

        .laut-hover:hover {
            background: linear-gradient(
                135deg,
                #0369a1,
                #0284c7,
                #075985
            );
        }


        /* =========================
           ANIMASI HEWAN LAUT
        ========================= */

        .hewan-laut {
            position: fixed;
            z-index: 0;
            pointer-events: none;
            user-select: none;
        }


        /* PAUS */

        .paus {
            font-size: 80px;
            opacity: 0.18;
            left: -150px;
            top: 18%;

            animation:
                pausRenang 24s linear infinite;
        }

        @keyframes pausRenang {

            0% {
                transform: translateX(-180px) rotate(2deg);
            }

            50% {
                transform: translateX(55vw) rotate(-2deg);
            }

            100% {
                transform: translateX(115vw) rotate(2deg);
            }

        }


        /* HIU */

        .hiu {
            font-size: 65px;
            opacity: 0.15;
            left: -150px;
            top: 48%;

            animation:
                hiuRenang 20s linear infinite;
            animation-delay: 4s;
        }

        @keyframes hiuRenang {

            0% {
                transform: translateX(-180px);
            }

            50% {
                transform: translateX(50vw) translateY(-20px);
            }

            100% {
                transform: translateX(115vw) translateY(10px);
            }

        }


        /* KUDA LAUT */

        .kuda-laut {
            font-size: 55px;
            opacity: 0.18;
            right: -100px;
            top: 70%;

            animation:
                kudaRenang 18s linear infinite;
        }

        @keyframes kudaRenang {

            0% {
                transform: translateX(100px) translateY(20px);
            }

            50% {
                transform: translateX(-50vw) translateY(-30px);
            }

            100% {
                transform: translateX(-115vw) translateY(20px);
            }

        }


        /* HEWAN TAMBAHAN */

        .paus-kecil {
            font-size: 45px;
            opacity: 0.12;
            left: -100px;
            top: 82%;

            animation:
                pausKecil 30s linear infinite;
            animation-delay: 8s;
        }

        @keyframes pausKecil {

            0% {
                transform: translateX(-100px);
            }

            100% {
                transform: translateX(115vw);
            }

        }


        /* =========================
           GELEMBUNG
        ========================= */

        .gelembung {
            position: fixed;
            bottom: -50px;
            border-radius: 50%;
            background: rgba(255,255,255,0.35);
            pointer-events: none;
            z-index: 0;
            animation: naik 10s linear infinite;
        }

        .b1 {
            width: 15px;
            height: 15px;
            left: 10%;
            animation-delay: 1s;
        }

        .b2 {
            width: 10px;
            height: 10px;
            left: 30%;
            animation-delay: 4s;
        }

        .b3 {
            width: 20px;
            height: 20px;
            left: 70%;
            animation-delay: 2s;
        }

        .b4 {
            width: 12px;
            height: 12px;
            left: 85%;
            animation-delay: 6s;
        }

        @keyframes naik {

            0% {
                transform: translateY(0);
                opacity: 0;
            }

            30% {
                opacity: 0.5;
            }

            100% {
                transform: translateY(-110vh);
                opacity: 0;
            }

        }


        /* =========================
           CARD
        ========================= */

        .konten {
            position: relative;
            z-index: 2;
        }

        .table-row {
            transition: 0.3s;
        }

        .table-row:hover {
            background-color: #e0f2fe;
        }

    </style>

</head>


<body class="min-h-screen">


    <!-- =========================
         ANIMASI LAUT
    ========================= -->

    <div class="hewan-laut paus">
        🐋
    </div>

    <div class="hewan-laut hiu">
        🦈
    </div>

    <div class="hewan-laut kuda-laut">
        🐴
    </div>

    <div class="hewan-laut paus-kecil">
        🐋
    </div>


    <!-- GELEMBUNG -->

    <div class="gelembung b1"></div>
    <div class="gelembung b2"></div>
    <div class="gelembung b3"></div>
    <div class="gelembung b4"></div>


    <!-- =========================
         NAVBAR
    ========================= -->

    <nav class="laut shadow-xl relative z-10">

        <div class="max-w-6xl mx-auto px-6 py-5">

            <div class="flex items-center justify-between">

                <div>

                    <h1 class="text-2xl font-bold text-white">
                        Sistem Informasi Sekolah
                    </h1>

                    <p class="text-blue-100 text-sm mt-1">
                        Data Mata Pelajaran
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


    <!-- =========================
         KONTEN
    ========================= -->

    <main class="konten max-w-6xl mx-auto px-6 py-10">


        <!-- JUDUL -->

        <div class="flex flex-col sm:flex-row
                    sm:items-center
                    sm:justify-between
                    gap-4 mb-8">


            <div>

                <span class="inline-block
                             bg-sky-600
                             text-white
                             px-4 py-1.5
                             rounded-full
                             text-sm
                             font-medium
                             mb-3">

                    🌊 Data Akademik

                </span>


                <h2 class="text-3xl font-bold text-sky-950">

                    Data Mapel

                </h2>


                <p class="text-sky-800 mt-1">

                    Daftar mata pelajaran yang tersedia.

                </p>

            </div>


            <!-- TAMBAH DATA -->

            <a href="tambah.php"
               class="laut laut-hover
                      text-white
                      px-5 py-3
                      rounded-xl
                      font-semibold
                      shadow-lg
                      transition
                      hover:-translate-y-0.5">

                + Tambah Data Mapel

            </a>

        </div>


        <!-- =========================
             TABEL
        ========================= -->

        <div class="bg-white/95
                    rounded-2xl
                    border border-sky-100
                    shadow-2xl
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

                                No

                            </th>


                            <th class="px-6 py-4
                                       text-left
                                       text-sm
                                       font-semibold">

                                Nama Mapel

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

                    <tbody class="divide-y divide-sky-100">

                        <?php

                        $query = mysqli_query(
                            $koneksi,
                            "SELECT * FROM mapel"
                        );

                        while ($data = mysqli_fetch_array($query)) {

                        ?>

                        <tr class="table-row">


                            <!-- ID MAPEL -->

                            <td class="px-6 py-4
                                       text-gray-700
                                       font-medium">

                                <?php echo $data['id_mapel']; ?>

                            </td>


                            <!-- NAMA MAPEL -->

                            <td class="px-6 py-4
                                       text-gray-800
                                       font-semibold">

                                📘
                                <?php echo $data['mapel']; ?>

                            </td>


                            <!-- AKSI -->

                            <td class="px-6 py-4">

                                <div class="flex
                                            items-center
                                            justify-center
                                            gap-2">


                                    <!-- EDIT -->

                                    <a href="edit.php?id_mapel=<?php echo $data['id_mapel']; ?>"
                                       class="px-4 py-2
                                              rounded-lg
                                              bg-sky-100
                                              text-sky-700
                                              text-sm
                                              font-semibold
                                              hover:bg-sky-200
                                              transition">

                                        Edit

                                    </a>


                                    <!-- HAPUS -->

                                    <a href="hapus.php?id_mapel=<?php echo $data['id_mapel']; ?>"
                                       onclick="return confirm('Yakin ingin menghapus mata pelajaran ini?')"
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
               class="text-sky-700
                      font-semibold
                      hover:text-sky-900
                      transition">

                ← Kembali ke Menu Utama

            </a>

        </div>


        <!-- FOOTER -->

        <div class="text-center mt-12">

            <p class="text-sky-800 text-sm">

                © <?php echo date('Y'); ?>
                Sistem Informasi Sekolah

            </p>

            <p class="text-sky-600 text-xs mt-1">

                🐋 🦈 🌊 Kelas Digital Sekolah 🌊 🦈 🐋

            </p>

        </div>

    </main>

</body>

</html>