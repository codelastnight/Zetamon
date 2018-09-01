$(document).ready(function () {
  //initialize swiper when document ready
  $('body').overlayScrollbars({ });
  var mySwiper = new Swiper ('.swiper-container', {
    // Optional parameters
    direction: 'vertical',
    loop: true,
    pagination: {
      el: '.swiper-pagination',
      clickable: true
    },
    autoplay: {
        delay: 3000,
        disableOnInteraction: false,
      },

  })
});

//AOS activation script - animate on scroll
AOS.init({
 duration: 400
});
