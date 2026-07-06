jQuery(function ($) {
  // この中であれば、通常通り「$」が使えます

  $(".hamburger").click(function () {
    $(this).toggleClass("active");
    $(".header nav").toggleClass("active");
  });

  $(".header nav a").click(function () {
    $(".header nav").removeClass("active");
    $(".hamburger").removeClass("active");
  });

});