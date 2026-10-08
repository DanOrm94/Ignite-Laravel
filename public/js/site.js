/* Ignite Talent Group — site interactivity (ported from app.js).
   The page is fully server-rendered; this only adds progressive
   enhancement for the mobile menu. */
(function () {
  "use strict";

  var menuButton = document.querySelector(".menu-button");
  var primaryNav = document.querySelector(".primary-nav");

  if (menuButton && primaryNav) {
    menuButton.addEventListener("click", function () {
      var isOpen = menuButton.getAttribute("aria-expanded") === "true";
      menuButton.setAttribute("aria-expanded", String(!isOpen));
      primaryNav.classList.toggle("open", !isOpen);
    });

    primaryNav.querySelectorAll("a").forEach(function (link) {
      link.addEventListener("click", function () {
        menuButton.setAttribute("aria-expanded", "false");
        primaryNav.classList.remove("open");
      });
    });
  }
})();
