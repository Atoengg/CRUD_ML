<?php
session_start();

// cek apakah yang mengakses halaman ini sudah login
if (empty($_SESSION['username'])) {
    header("location:login.php");
}
$page = "addCharacter";

include "../config/koneksi.php";

$id_character = "";
$namaHero = "";
$roleHero = "";
$deskripsiHero = "";
$gambarHero = "";
$idUser = "";
if (isset($_GET['edit'])) {
    $id_character = $_GET['edit'];
    $query = "SELECT * FROM tbl_character WHERE id_character ='$id_character'";
    $sql = mysqli_query($koneksi, $query);
    $data = mysqli_fetch_array($sql);
    $namaHero = $data['nama_hero'];
    $roleHero = $data['role'];
    $deskripsiHero = $data['deskripsi'];
    $gambarHero = $data['gambar'];
    $idUser = $data['id'];
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../asets/output.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
    <title>Edit Character</title>
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
                    <input type="search" class="grow py-0 px-4 h-full border-none outline-none bg-gray-300 rounded-l-lg w-full text-[#191B1F] max-[576px]:hidden" search">
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

        <!-- main -->
        <main class="w-full py-7 px-4 font-sans">
            <div class="flex items-center gap-4 flex-wrap justify-between">
                <div>
                    <h2 class="text-4xl font-bold mb-2">Edit Character</h2>
                    <ul class="flex items-center gap-2">
                        <li>
                            <a href="#" class="text-gray-400 text-base pointer-events-none">Menu</a>
                        </li>
                        <li><i class="bi bi-arrow-right-short"></i></li>
                        <li>
                            <a href="#" class="text-gray-400 text-base active">Hero Character</a>
                        </li>
                    </ul>
                </div>
                <a href="#" class="h-9 py-0 px-4 rounded-full bg-blue-500 text-white flex items-center justify-center gap-2 font-semibold">
                    <i class="bi bi-person-circle"></i>
                    <?php
                    $id_user = $_SESSION['id'];
                    $query = mysqli_query($koneksi, "SELECT * FROM user where id = '$id_user'");
                    $data = mysqli_fetch_array($query);
                    ?>
                    <span>Hello <?php echo $data['username']; ?></span>
                </a>
            </div>

            <?php
            if (isset($_GET['pesan'])) {
                # code...
                if ($_GET['pesan'] == 'berhasil') {
                    # code...
                    echo "<div class='p-4 mb-4 text-sm text-green-800 rounded-lg bg-green-50'>
                        <span class='font-medium'>Success alert!</span> Character Hero Berhasil Di Edit.
                      </div>";
                } elseif ($_GET['pesan'] == 'gagal') {
                    # code...
                    echo "<div class='p-4 mb-4 text-sm text-green-800 rounded-lg bg-green-50'>
                        <span class='font-medium'>Success alert!</span>Character Hero Gagal Di Edit.
                      </div>";
                }
            }
            ?>

            <div class="bg-white shadow-lg mt-7 max-w-xl container mx-auto w-full shadow-slate-400 rounded-md pb-5">
                <form action="cek-editCharacter.php" method="post" enctype="multipart/form-data">
                    <div class="flex flex-col px-3 py-2">
                        <input type="hidden" name="idUser" value="<?php echo $_SESSION['id']; ?>">
                        <input type="hidden" name="id_character" value="<?php echo $data['id_character']; ?>">
                        <label for="nama_hero" class="text-base text-inherit pb-2 font-medium">Nama Hero:</label>
                        <input required name="nama_hero" type="text" class="px-1 py-3 border border-gray-300 rounded-md text-sm focus:outline-none focus:ring focus:ring-blue-500 md:px-2 md:py-3 md:text-base" id="" value="<?php echo $namaHero ?>" />
                    </div>
                    <div class="flex flex-col px-3 py-2">
                        <label for="role" class="text-base text-inherit pb-2 font-medium">Role Hero:</label>
                        <input required name="role" type="text" class="px-1 py-3 border border-gray-300 rounded-md text-sm focus:outline-none focus:ring focus:ring-blue-500 md:px-2 md:py-3 md:text-base" id="" value="<?php echo $roleHero ?>" />
                    </div>
                    <div class="flex flex-col px-3 py-2">
                        <label for="deskripsi" class="text-base text-inherit pb-2 font-medium">Deskripsi Hero:</label>
                        <input required name="deskripsi" type="text" class="px-1 py-3 border border-gray-300 rounded-md text-sm focus:outline-none focus:ring focus:ring-blue-500 md:px-2 md:py-3 md:text-base" id="" value="<?php echo $deskripsiHero ?>" />
                    </div>
                    <div class="flex flex-col px-3 py-2">
                        <label for="gambar" class="text-base text-inherit pb-2 font-medium">Gambar Hero:</label>
                        <input name="gambar" type="file" class="px-1 py-3 border border-gray-300 rounded-md text-sm focus:outline-none focus:ring focus:ring-blue-500 md:px-2 md:py-3 md:text-base" id="" multiple value="<?php echo $gambarHero ?>" />
                    </div>
                    <div class="flex flex-col px-3 py-4 pt-5 text-white font-medium">
                        <button class="bg-[#1F2937] px-4 py-2 rounded-md cursor-pointer border border-[#1F2937] transition-all duration-150 ease-in-out hover:bg-slate-600" type="submit" name="edit">
                            Edit
                        </button>
                        <!-- <button class="bg-slate-300 ml-4 px-4 py-2 rounded-md cursor-pointer transition-all duration-150 ease-in-out hover:bg-red-500" type="reset" name="reset">
                            Reset
                        </button> -->
                    </div>
                </form>
            </div>


        </main>
        <!-- end main -->

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

    <!-- javascript -->
    <script type="text/javascript" src="../asets/js/index.js"></script>


</body>

</html>