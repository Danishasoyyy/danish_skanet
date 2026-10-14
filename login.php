<?php
session_start();
include "koneksi.php";

$error = "";

if (isset($_POST['login'])) {

    $username = mysqli_real_escape_string($koneksi, $_POST['username']);
    $password = mysqli_real_escape_string($koneksi, $_POST['password']);

    $query = mysqli_query($koneksi, "
        SELECT * FROM users
        WHERE username='$username'
        AND password='$password'
    ");

    $cek = mysqli_num_rows($query);

    if ($cek > 0) {

        $_SESSION['status'] = "sukses";
        $_SESSION['username'] = $username;

        header("Location: index.php");
        exit;

    } else {

        $error = "Username atau password salah!";

    }
}
?>

<!DOCTYPE html>
<html lang="id">

<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Login - Sistem Informasi Sekolah</title>

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

    </style>

</head>

<body class="min-h-screen flex items-center justify-center px-5">

    <!-- LOGIN CARD -->
    <div class="w-full max-w-md">

        <div class="bg-white rounded-3xl shadow-2xl
                    border border-blue-100 overflow-hidden">


            <!-- HEADER -->
            <div class="api px-8 py-8 text-center">

                <div class="w-16 h-16 bg-white/20
                            rounded-2xl mx-auto mb-4
                            flex items-center justify-center">

                    <svg class="w-9 h-9 text-white"
                         fill="none"
                         stroke="currentColor"
                         viewBox="0 0 24 24">

                        <path stroke-linecap="round"
                              stroke-linejoin="round"
                              stroke-width="2"
                              d="M12 15v2m-6 4h12a2 2 0 002-2v-6
                                 a2 2 0 00-2-2H6a2 2 0 00-2 2v6
                                 a2 2 0 002 2zm10-10V7
                                 a4 4 0 00-8 0v4h8z"/>

                    </svg>

                </div>

                <h1 class="text-2xl font-bold text-white">
                    Sistem Informasi Sekolah
                </h1>

                <p class="text-blue-100 text-sm mt-2">
                    Silakan login untuk melanjutkan
                </p>

            </div>


            <!-- FORM -->
            <div class="p-8">

                <?php if ($error != "") { ?>

                    <div class="mb-5 bg-red-50 border border-red-200
                                text-red-600 px-4 py-3 rounded-xl text-sm">

                        <?php echo $error; ?>

                    </div>

                <?php } ?>


                <form action="" method="POST">


                    <!-- USERNAME -->
                    <div class="mb-5">

                        <label class="block text-sm font-semibold
                                      text-blue-950 mb-2">

                            Username

                        </label>

                        <div class="relative">

                            <input
                                type="text"
                                name="username"
                                placeholder="Masukkan username"
                                required
                                class="w-full px-4 py-3
                                       border border-blue-200
                                       rounded-xl
                                       outline-none
                                       focus:ring-2
                                       focus:ring-blue-400
                                       focus:border-blue-400
                                       transition">

                        </div>

                    </div>


                    <!-- PASSWORD -->
                    <div class="mb-6">

                        <label class="block text-sm font-semibold
                                      text-blue-950 mb-2">

                            Password

                        </label>

                        <input
                            type="password"
                            name="password"
                            placeholder="Masukkan password"
                            required
                            class="w-full px-4 py-3
                                   border border-blue-200
                                   rounded-xl
                                   outline-none
                                   focus:ring-2
                                   focus:ring-blue-400
                                   focus:border-blue-400
                                   transition">

                    </div>


                    <!-- BUTTON -->
                    <button
                        type="submit"
                        name="login"
                        class="w-full api api-hover
                               text-white
                               font-semibold
                               py-3.5
                               rounded-xl
                               shadow-lg
                               shadow-blue-200
                               transition
                               duration-300
                               hover:-translate-y-0.5">

                        Login

                    </button>

                </form>

            </div>

        </div>


        <!-- FOOTER -->
        <div class="text-center mt-6">

            <p class="text-blue-700 text-sm">
                © <?php echo date('Y'); ?> Sistem Informasi Sekolah
            </p>

            <p class="text-blue-400 text-xs mt-1">
                Dashboard Akademik
            </p>

        </div>

    </div>

</body>

</html>