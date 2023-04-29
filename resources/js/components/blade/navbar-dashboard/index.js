
const menuToggle = document.getElementById("menu-toggle");
const sidebar = document.getElementById("sidebar");

menuToggle.addEventListener("click", () => {

  const navTexts = document.querySelectorAll(".text-nav");

  navTexts.forEach((item) => {
    item.classList.toggle("hidden");
  });

  //minimize sidebar
  sidebar.classList.toggle("w-64");
});