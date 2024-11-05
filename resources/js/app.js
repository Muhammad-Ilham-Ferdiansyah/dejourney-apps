import "./bootstrap";

import Alpine from "alpinejs";

window.Alpine = Alpine;

Alpine.start();

// DARK MODE TOGGLE BUTTON
// Elemen ikon toggle
var themeToggleLightIcon = document.getElementById("theme-toggle-light-icon");
var themeToggleDarkIcon = document.getElementById("theme-toggle-dark-icon");

// Set ikon sesuai tema saat ini
if (
    localStorage.getItem("color-theme") === "dark" ||
    (!("color-theme" in localStorage) && window.matchMedia("(prefers-color-scheme: dark)").matches)
) {
    themeToggleLightIcon.classList.remove("hidden");
} else {
    themeToggleDarkIcon.classList.remove("hidden");
}

// Event listener untuk tombol toggle tema
var themeToggleBtn = document.getElementById("theme-toggle");
themeToggleBtn.addEventListener("click", function () {
    themeToggleDarkIcon.classList.toggle("hidden");
    themeToggleLightIcon.classList.toggle("hidden");

    // Periksa dan toggle antara tema light dan dark
    if (localStorage.getItem("color-theme")) {
        if (localStorage.getItem("color-theme") === "light") {
            document.documentElement.classList.add("dark");
            localStorage.setItem("color-theme", "dark");
        } else {
            document.documentElement.classList.remove("dark");
            localStorage.setItem("color-theme", "light");
        }
    } else {
        if (document.documentElement.classList.contains("dark")) {
            document.documentElement.classList.remove("dark");
            localStorage.setItem("color-theme", "light");
        } else {
            document.documentElement.classList.add("dark");
            localStorage.setItem("color-theme", "dark");
        }
    }
});
