const allSideMenu = document.querySelectorAll("#sidebar ul li a");

allSideMenu.forEach((item) => {
  //   console.log("cek");
  const li = item.parentElement;

  item.addEventListener("click", function () {
    allSideMenu.forEach((i) => {
      i.parentElement.classList.remove("active");
    });
    li.classList.add("active");
  });
});

function dropdown() {
  document.querySelector("#submenu").classList.toggle("hidden");
  document.querySelector("#arrow").classList.toggle("rotate-0");
}
dropdown();

const menuBar = document.querySelector("#content nav .bi.bi-list");
const sidebar = document.querySelector("#sidebar");

menuBar.addEventListener("click", function () {
  // console.log("klik");
  sidebar.classList.toggle("hide");
});

const searchBtn = document.querySelector("#content nav form button");
const searchBtnIcon = document.querySelector("#content nav form button .bi");
const searchForm = document.querySelector("#content nav form");

// searchForm.addEventListener("click", function () {
//   console.log("form");
// });

searchBtn.addEventListener("click", function (e) {
  if (window.innerWidth < 576) {
    // console.log("ini adalah btn search");
    e.preventDefault();
    searchForm.classList.toggle("show");
    if (searchForm.classList.contains("show")) {
      searchBtnIcon.classList.replace("bi-search", "bi-x");
    } else {
      searchBtnIcon.classList.replace("bi-x", "bi-search");
    }
  }
});

if (window.innerWidth < 768) {
  sidebar.classList.add("hide");
} else if (window.innerWidth > 576) {
  searchBtnIcon.classList.replace("bi-x", "bi-search");
  searchForm.classList.remove("show");
}

window.addEventListener("resize", function () {
  if (this.innerWidth > 576) {
    searchBtnIcon.classList.replace("bi-x", "bi-search");
    searchForm.classList.remove("show");
  }
});

// Logout modal
const logoutModal = document.querySelector(".modal-logout");
const showLogoutModal = document.querySelector(".show-modal-logout");
const btnCloseModal = document.querySelector(".btn-close-modal");
const btnCloseModal2 = document.querySelector(".bi-x");

showLogoutModal.addEventListener("click", function () {
  // console.log("ini tombol logout");
  logoutModal.classList.remove("hidden");
});

btnCloseModal.addEventListener("click", function () {
  // console.log("ini tombol logout");
  logoutModal.classList.add("hidden");
});

btnCloseModal2.addEventListener("click", function () {
  // console.log("ini tombol logout");
  logoutModal.classList.add("hidden");
});

// delete modal
const deleteModal = document.querySelector(".modal-delete");
const showDeleteModal = document.querySelector(".show-modal-delete");
const btnCloseDelete = document.querySelector(".btn-close-delete");

showDeleteModal.addEventListener("click", function () {
  deleteModal.classList.remove("hidden");
});

btnCloseModal.addEventListener("click", function () {
  // console.log("ini tombol logout");
  deleteModal.classList.add("hidden");
});

btnCloseModal2.addEventListener("click", function () {
  // console.log("ini tombol logout");
  deleteModal.classList.add("hidden");
});
