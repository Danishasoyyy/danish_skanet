<?php
session_start();

if ($_SESSION['status'] <> "sukses") {
    header('location:logout.php');
    exit;
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Menu Utama - Sistem Sekolah</title>

    <script src="https://cdn.tailwindcss.com"></script>

    <style>
        body {
            background: linear-gradient(135deg, #eff6ff, #dbeafe, #bfdbfe);
        }

        .api {
            background: linear-gradient(135deg, #1d4ed8, #2563eb, #38bdf8);
        }

        .api-hover:hover {
            background: linear-gradient(135deg, #1e40af, #2563eb, #0284c7);
        }

        .card-hover {
            transition: all 0.3s ease;
        }

        .card-hover:hover {
            transform: translateY(-6px);
            box-shadow: 0 20px 35px rgba(30, 64, 175, 0.20);
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
                        Dashboard Administrasi Sekolah
                    </p>
                </div>

                <a href="logout.php"
                   class="bg-white text-blue-700 px-5 py-2.5 rounded-xl
                          font-semibold shadow-md
                          hover:bg-blue-50 transition">
                    Logout
                </a>

            </div>

        </div>
    </nav>


    <!-- KONTEN -->
    <main class="max-w-6xl mx-auto px-6 py-12">

        <div class="mb-10">

            <span class="inline-block bg-blue-600 text-white
                         px-4 py-1.5 rounded-full text-sm font-medium mb-3">
                Dashboard
            </span>

            <h2 class="text-4xl font-bold text-blue-950">
                Menu Utama
            </h2>

            <p class="text-blue-700 mt-2">
                Silakan pilih data yang ingin kamu kelola.
            </p>

        </div>


        <!-- MENU CARD -->
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6">


            <!-- SISWA -->
            <a href="siswa"
               class="card-hover bg-white rounded-2xl
                      border border-blue-100 p-6">

                <div class="w-14 h-14 api rounded-2xl
                            flex items-center justify-center mb-5 shadow-lg">

                    <svg class="w-7 h-7 text-white"
                         fill="none"
                         stroke="currentColor"
                         viewBox="0 0 24 24">

                        <path stroke-linecap="round"
                              stroke-linejoin="round"
                              stroke-width="2"
                              d="M17 20h5v-2a4 4 0 00-4-4h-1
                                 M9 20H4v-2a4 4 0 014-4h1
                                 m4-10a4 4 0 110 8 4 4 0 000-8z
                                 m6 4a3 3 0 11-6 0 3 3 0 016 0z"/>
                    </svg>

                </div>

                <h3 class="text-xl font-bold text-blue-950">
                    Data Siswa
                </h3>

                <p class="text-gray-500 text-sm mt-2">
                    Kelola data siswa sekolah.
                </p>

                <div class="mt-6 text-blue-600 font-semibold">
                    Buka Data →
                </div>

            </a>


            <!-- GURU -->
            <a href="guru"
               class="card-hover bg-white rounded-2xl
                      border border-blue-100 p-6">

                <div class="w-14 h-14 api rounded-2xl
                            flex items-center justify-center mb-5 shadow-lg">

                    <svg class="w-7 h-7 text-white"
                         fill="none"
                         stroke="currentColor"
                         viewBox="0 0 24 24">

                        <path stroke-linecap="round"
                              stroke-linejoin="round"
                              stroke-width="2"
                              d="M12 14l9-5-9-5-9 5 9 5zm0 0v6
                                 m-7-9v5a2 2 0 001 1.73l5 2.89
                                 a2 2 0 002 0l5-2.89A2 2 0 0019 16v-5"/>
                    </svg>

                </div>

                <h3 class="text-xl font-bold text-blue-950">
                    Data Guru
                </h3>

                <p class="text-gray-500 text-sm mt-2">
                    Kelola data guru sekolah.
                </p>

                <div class="mt-6 text-blue-600 font-semibold">
                    Buka Data →
                </div>

            </a>


            <!-- NILAI -->
            <a href="nilai"
               class="card-hover bg-white rounded-2xl
                      border border-blue-100 p-6">

                <div class="w-14 h-14 api rounded-2xl
                            flex items-center justify-center mb-5 shadow-lg">

                    <svg class="w-7 h-7 text-white"
                         fill="none"
                         stroke="currentColor"
                         viewBox="0 0 24 24">

                        <path stroke-linecap="round"
                              stroke-linejoin="round"
                              stroke-width="2"
                              d="M9 17v-2m3 2v-4m3 4v-6
                                 m2 10H7a2 2 0 01-2-2V5
                                 a2 2 0 012-2h7l5 5v11a2 2 0 01-2 2z"/>
                    </svg>

                </div>

                <h3 class="text-xl font-bold text-blue-950">
                    Data Nilai
                </h3>

                <p class="text-gray-500 text-sm mt-2">
                    Kelola nilai siswa.
                </p>

                <div class="mt-6 text-blue-600 font-semibold">
                    Buka Data →
                </div>

            </a>


            <!-- MAPEL -->
            <a href="mapel"
               class="card-hover bg-white rounded-2xl
                      border border-blue-100 p-6">

                <div class="w-14 h-14 api rounded-2xl
                            flex items-center justify-center mb-5 shadow-lg">

                    <svg class="w-7 h-7 text-white"
                         fill="none"
                         stroke="currentColor"
                         viewBox="0 0 24 24">

                        <path stroke-linecap="round"
                              stroke-linejoin="round"
                              stroke-width="2"
                              d="M12 6.253v13
                                 m0-13C10.832 5.477 9.246 5 7.5 5
                                 S4.168 5.477 3 6.253v13
                                 C4.168 18.477 5.754 18 7.5 18
                                 s3.332.477 4.5 1.253
                                 m0-13C13.168 5.477 14.754 5 16.5 5
                                 S19.832 5.477 21 6.253v13
                                 C19.832 18.477 18.246 18 16.5 18
                                 s-3.332.477-4.5 1.253"/>
                    </svg>

                </div>

                <h3 class="text-xl font-bold text-blue-950">
                    Data Mapel
                </h3>

                <p class="text-gray-500 text-sm mt-2">
                    Kelola mata pelajaran.
                </p>

                <div class="mt-6 text-blue-600 font-semibold">
                    Buka Data →
                </div>

            </a>

        </div>


        <!-- FOOTER -->
        <div class="mt-14 text-center">

            <p class="text-blue-700 text-sm">
                © <?php echo date('Y'); ?> Sistem Informasi Sekolah
            </p>

            <p class="text-blue-400 text-xs mt-1">
                Dashboard Akademik
            </p>

        </div>

    </main>

</body>
</html>