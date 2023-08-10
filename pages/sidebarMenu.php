<div class="px-2.5">
    <span class="text-white font-normal text-sm uppercase">menu</span>
</div>
<ul class="w-full mt-2 ">
    <li <?php if ($page == "Dashboard") echo "class='h-[48px] ml-2.5 rounded-2xl w-full text-white bg-transparent p-2 active'";
        else
            echo "class='h-[48px] ml-2.5 rounded-2xl w-full text-white bg-transparent p-2'"; ?>>
        <a href="index.php" class="w-full h-full flex font-medium p-2 bg-[#191B1F] items-center rounded-lg hover:bg-blue-500 duration-300 whitespace-nowrap">
            <i class="bi bi-grid-1x2-fill flex justify-center"></i>
            <span class="ml-5">Dashboard</span>
        </a>
    </li>
    <li <?php if ($page == "Home") echo "class='h-[48px] ml-2.5 rounded-2xl w-full text-white bg-transparent p-2 active'";
        else
            echo "class='h-[48px] ml-2.5 rounded-2xl w-full text-white bg-transparent p-2'"; ?>>
        <a href="home.php" class="w-full h-full flex font-medium p-2 bg-[#191B1F] items-center rounded-lg hover:bg-blue-500 duration-300 whitespace-nowrap">
            <i class="bi bi-houses-fill flex justify-center"></i>
            <span class="ml-5">Home</span>
        </a>
    </li>
    <li class="h-[48px] ml-2.5 rounded-2xl w-full text-white bg-transparent p-2 ">
        <a href="#" class="w-full h-full flex font-medium p-2 bg-[#191B1F] items-center rounded-lg hover:bg-blue-500 duration-300 whitespace-nowrap" onclick="dropdown()">
            <i class="bi bi-activity flex justify-center"></i>
            <div class="ml-5 flex justify-between w-full">
                <span>Action</span>
                <span id="arrow"></span>
                <i class="bi bi-chevron-down"></i>
            </div>
        </a>
    </li>
    <div class="text-left flex flex-col text-sm font-extralight mt-2 w-4/5 mx-auto text-white" id="submenu">
        <a href="addCharacter.php" <?php if ($page == 'addCharacter') echo "class = 'p-2 font-sans text-blue-500 whitespace-nowrap'";
                                    else echo "class='cursor-pointer p-2 font-sans whitespace-nowrap'"; ?>>Hero Character</a>
        <a href="#" class="cursor-pointer p-2 font-sans whitespace-nowrap">Hero Skill</a>
    </div>

    <div class="px-2.5">
        <span class="text-white font-normal text-sm uppercase">general</span>
    </div>

    <li <?php if ($page == "profile") {
            # code...
            echo "class='h-[48px] ml-2.5 rounded-2xl w-full text-white bg-transparent p-2 active'";
        } else {
            echo "class='h-[48px] ml-2.5 rounded-2xl w-full text-white bg-transparent p-2'";
        } ?>>
        <a href="profile.php" class="w-full h-full flex font-medium p-2 bg-[#191B1F] items-center rounded-lg hover:bg-blue-500 duration-300 whitespace-nowrap" ;>
            <i class="bi bi-person-fill flex justify-center"></i>
            <span class="ml-5">Profile</span>
        </a>
    </li>
    <li class="h-[48px] ml-2.5 rounded-2xl w-full text-white bg-transparent p-2" id="">
        <!-- <input type="checkbox" name="" id="modal-logout" class="peer fixed appearance-none opacity-0"> -->
        <button class="w-full h-full flex font-medium p-2 bg-[#191B1F] items-center rounded-lg hover:bg-blue-500 duration-300 whitespace-nowrap show-modal-logout">
            <i class="bi bi-box-arrow-right flex justify-center"></i>
            <span class="ml-5">Logout</span>
        </button>
    </li>
</ul>