$(".hamburger").click(function () {
  $(this).toggleClass("active");
  $(".header nav").toggleClass("active");
});
$(".header nav a").click(function () {
  $(".header nav").removeClass("active");
  $(".hamburger").removeClass("active");
});
