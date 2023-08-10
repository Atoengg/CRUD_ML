<?php
session_start();

//cek apakah yang mengakses halaman ini sudah login
if (!empty($_SESSION['username'])) {
  header("location:index.php");
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Register</title>
  <link rel="stylesheet" href="../asets/output.css" />
  <link rel="stylesheet" href="../asets/style.css" />
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" />
</head>

<body class="bg-gray-200">
  <section class="container mx-auto flex-col flex items-center py-5 justify-center">
    <div class="bg-white w-full max-w-xl rounded-lg pb-5">
      <img class="m-auto w-[400px] h-[250px] object-contain" src="../asets/images/welcome.jpg" alt="" />
      <!-- <div class="">
        </div> -->
      <div class="mb-3 text-center">
        <h3 class="font-semibold text-xl text-[#1F2937] md:text-2xl">
          Create Your Account✍️
        </h3>
      </div>
      <form action="cek-register.php" method="post">
        <div class="flex flex-col px-3">
          <label for="" class="text-base text-inherit pb-2 font-medium">Nama</label>
          <input required name="nama" type="text" class="px-1 py-3 border border-gray-300 rounded-md text-sm focus:outline-none focus:ring focus:ring-blue-500 md:px-2 md:py-3 md:text-base" name="" id="" placeholder="Masukan Nama Anda" />
        </div>
        <div class="flex flex-col px-3 pt-2">
          <label for="" class="text-base text-inherit pb-2 font-medium">Username</label>
          <input required type="text" name="username" class="px-1 py-3 border border-gray-300 rounded-md text-sm focus:outline-none focus:ring focus:ring-blue-500 md:px-2 md:py-3 md:text-base" name="" id="" placeholder="Masukan Username Anda" />
        </div>

        <div class="flex flex-col px-3 pt-2 relative">
          <label for="password" class="text-base text-inherit pb-2 font-medium">Password</label>
          <input id="password" name="password1" required type="password" class="password px-1 py-3 border border-gray-300 rounded-md text-sm focus:outline-none focus:ring focus:ring-blue-500 md:px-2 md:py-3 md:text-base" id="" placeholder="Ex:Atoeng@_123" />
          <i class="bi bi-eye-fill absolute right-[10%] top-[30%] cursor-pointer text-gray-400 md:right-[5%]" id="eye"></i>

          <ul class="helper-text pt-3 text-xs font-serif text-gray-400 md:text-sm">
            <li class="length">
              <i>panjang minimal 8 karakter</i>
            </li>
            <li class="lowercase">
              <i>berisi huruf kecil</i>
            </li>
            <li class="Uppercase">
              <i>harus berisi huruf besar</i>
            </li>
            <li class="spesial">
              <i>harus berisi nomer dan karakter spesial</i>
            </li>
          </ul>
        </div>
        <div class="flex flex-col px-3 pt-2 relative">
          <label for="password" class="text-base text-inherit pb-2 font-medium">Ulangi Password</label>
          <input id="password2" name="password2" required type="password" class="password px-1 py-3 border border-gray-300 rounded-md text-sm focus:outline-none focus:ring focus:ring-blue-500 md:px-2 md:py-3 md:text-base" id="" placeholder="Ulangi Password Anda" />
          <i class="bi bi-eye-fill absolute right-[10%] top-[60%] cursor-pointer text-gray-400 md:right-[5%]" id="eye2"></i>
        </div>
        <div class="flex flex-col px-3 pt-5 text-white font-medium">
          <button class="bg-[#1F2937] py-2 rounded-md cursor-pointer border border-[#1F2937] transition-all duration-150 ease-in-out hover:bg-slate-600" type="submit" name="submit">
            Daftar
          </button>
        </div>
      </form>

      <div class="flex items-center justify-center my-4">
        <p class="font-light text-xs mx-1 md:text-sm">Sudah Punya Akun?</p>
        <a href="login.php" class="text-xs font-bold text-blue-500 md:text-sm">Masuk</a>
      </div>
    </div>
  </section>
</body>
<script src="../asets/js/main.js"></script>

</html>