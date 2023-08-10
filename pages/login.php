<?php
session_start();

// cek apakah yang mengakses halaman ini sudah login
if (!empty($_SESSION['username'])) {
  header("location:index.php");
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Login</title>
  <link rel="stylesheet" href="../asets/output.css" />
  <link rel="stylesheet" href="../asets/style.css" />
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" />
</head>

<body class="bg-gray-200">
  <section class="container mx-auto flex-col flex items-center py-5 justify-center">
    <div class="bg-white w-full max-w-xl rounded-lg pb-5">
      <img class="m-auto w-[400px] h-[250px] object-contain" src="../asets/images/Login.jpg" alt="" />

      <div class="mb-3 text-center">
        <h3 class="font-semibold text-xl text-[#1F2937] md:text-2xl">
          welcome Back 🙌
        </h3>
      </div>
      <p class="mx-3 text-gray-600 text-sm md:text-base">
        Silahkan Masuk ke Akun Anda
      </p>
      <form action="cek-login.php" method="post">
        <div class="flex flex-col px-3 pt-2">
          <label for="" class="text-base text-inherit pb-2 font-medium">Username</label>
          <input required type="text" class="px-1 py-3 border border-gray-300 rounded-md text-sm focus:outline-none focus:ring focus:ring-blue-500 md:px-2 md:py-3 md:text-base" name="username" id="" placeholder="Masukan Username Anda" />
        </div>

        <div class="flex flex-col px-3 pt-2 relative">
          <label for="" class="text-base text-inherit pb-2 font-medium">Password</label>
          <input id="password" required type="password" class="px-1 py-3 border border-gray-300 rounded-md text-sm focus:outline-none focus:ring focus:ring-blue-500 md:px-2 md:py-3 md:text-base" name="password" id="" placeholder="Masukan Password Anda" />
          <i class="bi bi-eye-fill absolute right-[10%] top-[60%] cursor-pointer text-gray-400 md:right-[5%]" id="eye"></i>
        </div>

        <div class="flex flex-col px-3 pt-5 text-white font-medium">
          <button class="bg-[#1F2937] py-2 rounded-md cursor-pointer border border-[#1F2937] transition-all duration-150 ease-in-out hover:bg-slate-600" name="submit" type="submit">
            Login
          </button>
        </div>
      </form>

      <div class="flex items-center justify-center my-4">
        <p class="font-light text-xs mx-1 md:text-sm">Belum Punya Akun?</p>
        <a href="Register.php" class="text-xs font-bold text-blue-500 md:text-sm">Daftar</a>
      </div>
    </div>
  </section>
</body>
<script src="../asets/js/main.js"></script>

</html>