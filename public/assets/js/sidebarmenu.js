$(function () {
  "use strict";
  var url = window.location.href;
  var path = url.replace(
    window.location.protocol + "//" + window.location.host + "/",
    ""
  );

  // Bersihkan semua elemen 'active' sebelumnya
  $("#sidebarnav a").removeClass("active");
  $("#sidebarnav li").removeClass("selected");

  // Cari elemen sidebar yang cocok dengan URL
  var element = $("ul#sidebarnav a").filter(function () {
    // Hapus parameter query dari URL elemen dan URL saat ini
    var elementUrlPath = new URL(this.href).pathname;
    var currentUrlPath = new URL(url).pathname;
    var currentPathPath = new URL(path, location.origin).pathname;

    return (
      elementUrlPath === currentUrlPath ||
      elementUrlPath === currentPathPath ||
      (currentPathPath.startsWith("/roles/") && elementUrlPath.includes("/roles")) ||
      (currentPathPath.startsWith("/menus/") && elementUrlPath.includes("/menus")) ||
      (currentPathPath.startsWith("/role_menus/") && elementUrlPath.includes("/role_menus")) ||
      (currentPathPath.startsWith("/users/") && elementUrlPath.includes("/users"))
      // Tambahkan aturan tambahan jika diperlukan
    );
  });

  // Jika ada elemen yang cocok, aktifkan hanya elemen tersebut
  if (element.length > 0) {
    element.parents("li").each(function () {
      $(this).addClass("selected");
      $(this).children("a").addClass("active");
    });

    // Tambahkan kelas 'active' pada elemen yang cocok
    element.addClass("active");
  }

  $("#sidebarnav a").on("click", function (e) {
    // Hapus kelas 'active' dari elemen lain sebelum menambahkan ke yang baru
    $("#sidebarnav a").removeClass("active");
    $("#sidebarnav li").removeClass("selected");

    if (!$(this).hasClass("active")) {
      // Sembunyikan menu terbuka lainnya dan hapus semua kelas
      $("ul", $(this).parents("ul:first")).removeClass("in");
      $("a", $(this).parents("ul:first")).removeClass("active");

      // Buka menu baru dan tambahkan kelas aktif
      $(this).next("ul").addClass("in");
      $(this).addClass("active");
    } else if ($(this).hasClass("active")) {
      $(this).removeClass("active");
      $(this).parents("ul:first").removeClass("active");
      $(this).next("ul").removeClass("in");
    }
  });

  $("#sidebarnav >li >a.has-arrow").on("click", function (e) {
    e.preventDefault();
  });
});
