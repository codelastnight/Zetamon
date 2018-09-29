//AOS activation script - animate on scroll
AOS.init({
 duration: 500
});

function menuToggle(button){
  $(button).toggleClass("is-active");
  $(".header-overlay").toggleClass("header-overlay-toggle")
}
