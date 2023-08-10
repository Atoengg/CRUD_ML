<?php
session_start();

// cek apakah yang mengakses halaman ini sudah login
if (empty($_SESSION['username'])) {
    header("location:login.php");
}
$page = "Home";

include "../config/koneksi.php";
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../asets/output.css" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
    <title>Home</title>
</head>

<body>
    <!-- SideBar -->
    <section id="sidebar" class="fixed top-0 left-0 w-[280px] h-full bg-[#191B1F] z-[1000] font-sans duration-300 ease-in-out overflow-x-hidden">
        <a href="#" class="text-xl font-bold p-2.5 h-[56px] flex items-center text-white whitespace-nowrap">
            CRUD ML
        </a>
        <?php include "sidebarMenu.php" ?>
    </section>
    <!-- end SideBar -->

    <!-- CONTENT -->
    <section id="content" class="relative w-content left-[280px] duration-300 ease-in-out max-[768px]:w-md">

        <!-- Navbar -->
        <nav class="h-[56px] bg-[#191B1F] py-0 px-4 flex items-center gap-6 sticky top-0 left-0 z-[1000]">
            <i class="bi bi-list text-white cursor-pointer"></i>

            <form action="" class="max-w-sm w-full mr-auto">
                <div class="flex items-center h-9">
                    <input type="search" class="grow py-0 px-4 h-full border-none outline-none bg-gray-300 rounded-l-lg w-full text-[#191B1F] max-[576px]:hidden" placeholder="search">
                    <button type="submit" class="w-9 h-full flex justify-center items-center bg-blue-500 text-gray-300 text-lg border-none outline-none rounded-r-lg cursor-pointer max-[576px]:w-auto max-[576px]:h-auto max-[576px]:bg-transparent max-[576px]:rounded-none">
                        <i class="bi bi-search"></i>
                    </button>
                </div>
            </form>

            <input type="checkbox" id="switch-mode" hidden>
            <label for="switch-mode"></label>
            <a href="#" class="text-white text-xl relative notifikasi">
                <i class="bi bi-bell-fill"></i>
                <span class="absolute -top-[6px] -right-[6px] w-5 h-5 rounded-full border-2 border-[#191B1F] bg-red-500/100 text-white font-bold text-xs flex justify-center items-center">8</span>
            </a>
            <a href="#" class="profile">
                <img class="w-9 h-9 object-cover rounded-[50%]" src=" ../asets/images/person.jpeg" alt="profile">
            </a>
        </nav>
        <!-- End Navbar -->

        <!-- MAIN -->
        <main class="w-full font-sans">

            <!-- banner -->
            <div class="bg-bgBanner brightness-90 shadow-inner pt-[180px] px-0 pb-[100px] bg-cover text-center">
                <div class="m-auto w-full">
                    <h1 class="text-amber-200 text-6xl mb-[10px] tracking-[5px] font-bold">Mobile Lejends.</h1>
                    <h1 class="text-amber-200 text-6xl mb-[10px] tracking-[5px] font-bold">Temukan Hero favorit anda.</h1>
                    <p class=" font-normal text-base mb-[3px] text-white">Lorem ipsum dolor sit amet consectetur adipisicing elit.</p>
                    <p class=" font-normal text-base mb-[3px] text-white">Lorem ipsum dolor sit amet consectetur adipisicing elit. Totam consectetur odio molestias blanditiis.</p>
                </div>
            </div>
            <!-- End banner -->

            <!-- Character -->
            <div class="w-full flex items-center justify-between my-5 px-3">
                <p class="font-medium text-[18px] text-[#191B1F]">Character</p>
                <a href="addCharacter.php" class="font-medium text-[18px] text-[#191B1F]">
                    Add
                    <i class="bi bi-plus"></i>
                </a>
            </div>
            <div class="grid px-3 gap-2 pb-2 sm:grid-cols-2 md:grid-cols-4 lg:gap-10">
                <?php
                $idUser = $_SESSION['id'];
                $query = mysqli_query($koneksi, "SELECT * FROM tbl_character WHERE id='$idUser'");
                while ($data = mysqli_fetch_array($query)) {

                ?>
                    <div class="group relative h-60 cursor-pointer overflow-hidden rounded-lg">
                        <img src="../asets/images/<?php echo $data['gambar']; ?>" class="absolute object-cover duration-200
                            group-hover:scale-105" alt="">
                        <div class="absolute -bottom-60 flex w-full items-center justify-between bg-gradient-to-t from-slate-800 px-3 pb-4 pt-10 duration-200 group-hover:-bottom-0">
                            <p class="font-semibold text-sm text-white"><?php echo $data['nama_hero']; ?>
                                <span class="text-xs font-medium text-slate-300 block"><?php echo $data['role'] ?></span>

                            </p>
                            <span>
                                <a href="editCharacter.php?edit=<?php echo $data['id_character']; ?>" class="text-white">
                                    <i class="bi bi-pencil-fill"></i>
                                </a>

                                <button class="text-white ml-2 show-modal-delete">
                                    <i class="bi bi-trash3-fill"></i>
                                </button>
                            </span>
                        </div>
                        <!-- MODAL konfrimasi hapus -->
                        <div class="fixed top-0 left-0 right-0 flex justify-center items-center z-50 p-4 overflow-x-hidden overflow-y-auto md:inset-0 h-[calc(100%-1rem)] bg-gray-500 bg-opacity-50 hidden max-h-full modal-delete" id="">
                            <div class="relative w-full max-w-md max-h-full">
                                <div class="relative bg-white rounded-lg shadow">
                                    <button type="button" class="absolute top-3 right-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ml-auto inline-flex justify-center items-center">
                                        <i class="bi bi-x"></i>
                                    </button>
                                    <div class="p-6 text-center">
                                        <i class="bi bi-exclamation-triangle"></i>
                                        <h3 class="mb-5 text-lg font-normal text-gray-500 font-sans">Yakin Menghapus Character?</h3>
                                        <a href="cek-addCharacter.php?hapus=<?php echo $data['id_character']; ?>" class="text-white bg-red-600 hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-red-300 font-medium rounded-lg text-sm inline-flex items-center px-5 py-2.5 text-center mr-2">hapus</a>
                                        <button class="text-gray-500 bg-white hover:bg-gray-100 focus:ring-4 focus:outline-none focus:ring-gray-200 rounded-lg border border-gray-200 text-sm font-medium px-5 py-2.5 hover:text-gray-900 focus:z-10 btn-close-modal">Batal</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- END konfrimasi hapus -->
                    </div>
                <?php
                }
                ?>
            </div>
            <!-- End Character -->

        </main>
        <!-- END MAIN -->

    </section>
    <!-- END CONTENT -->



    <!-- MODAL LOGOUT -->
    <div class="fixed top-0 left-0 right-0 flex justify-center items-center z-50 p-4 overflow-x-hidden overflow-y-auto md:inset-0 h-[calc(100%-1rem)] bg-gray-500 bg-opacity-50 hidden max-h-full modal-logout" id="">
        <div class="relative w-full max-w-md max-h-full">
            <div class="relative bg-white rounded-lg shadow">
                <button type="button" class="absolute top-3 right-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ml-auto inline-flex justify-center items-center">
                    <i class="bi bi-x"></i>
                </button>
                <div class="p-6 text-center">
                    <i class="bi bi-exclamation-triangle"></i>
                    <h3 class="mb-5 text-lg font-normal text-gray-500 font-sans">Yakin Untuk Logout?</h3>
                    <a href="logout.php" class="text-white bg-red-600 hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-red-300 font-medium rounded-lg text-sm inline-flex items-center px-5 py-2.5 text-center mr-2">Logout</a>
                    <button href="#" class="text-gray-500 bg-white hover:bg-gray-100 focus:ring-4 focus:outline-none focus:ring-gray-200 rounded-lg border border-gray-200 text-sm font-medium px-5 py-2.5 hover:text-gray-900 focus:z-10 btn-close-modal">Batal</button>
                </div>
            </div>
        </div>
    </div>
    <!-- END MODAL LOGOUT -->

    <script type="text/javascript" src="../asets/js/index.js">
    </script>
</body>

</html>