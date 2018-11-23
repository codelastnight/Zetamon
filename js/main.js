function menuToggle(button) {
  //DISABLE dynamic header colors
  $(button).toggleClass("is-active");
  if ($( "#header-dynamic" ).hasClass( "header-disable-dynamic-color" )) {
      $('#header-dynamic').removeClass("header-disable-dynamic-color");
  } else {
      $('#header-dynamic').addClass("header-disable-dynamic-color");
  }


  //  $('body').toggleClass("no-scroll");

  var $listSort = $('.header-overlay');
  if ($listSort.attr('aria-hidden')) {
    $listSort.removeAttr('aria-hidden');
  } else {
    $listSort.attr('aria-hidden', true);
  }
}




// shows menu on desktops
function menuDesktop(x) {
  if (x.matches) { // if desktop
    $('.header-overlay').removeAttr('aria-hidden');
    $('.hamburger').removeClass("is-active");
  //  $('body').removeClass("no-scroll");
  } else { //if mobile
    $('.header-overlay').attr('aria-hidden', true);
    $(".header-overlay").on('click tap',function(e) {
      if (e.target !== this)
        return;

      $(this).attr('aria-hidden', true);
      $('.hamburger').removeClass("is-active");
      $('#header-dynamic').removeClass("header-disable-dynamic-color");
    //  $('body').removeClass("no-scroll");
    });


  }
}
var x = window.matchMedia("(min-width: 1280px)")
menuDesktop(x)
x.addListener(menuDesktop)

$(document).ready(function() {
  $('.current-menu-item .subheader, .current-menu-parent .subheader').removeAttr('aria-hidden');
  $('.current-menu-item ul, .current-menu-parent').attr('data-aos', 'menu-slide').attr('data-aos-anchor', '#trigger-menu');
  //  $('').attr('data-aos','menu-slide').attr('data-aos-anchor','#trigger-menu');
  //  $('').removeAttr('aria-hidden');
  
  //fancy animatinos
  AOS.init({
    easing: 'ease-out-sine',
    duration: 400,
    mirror: false
  });
  // replace home button with about us
  // fade in images
//   $("img").each(function() {
//     var src = $(this).data("src");
//     if (src) {
//         var img = new Image();
//         img.style.display = "none";
//         img.onload = function() {
//             $(this).fadeIn(400);
//         };
//         $(this).append(img);            
//         img.src = src;
//     }
// });
});

// document.addEventListener('aos:out:about', ({ detail }) => {
//   $('.menu-item-home > a').attr("href", "#trigger-menu");
//   //console.log('uwu');
// }

// );



