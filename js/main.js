var headerDynamic = jQuery( "#header-dynamic" );
var headerOverlay = jQuery('.header-overlay');
var hamburger = jQuery('.hamburger');
function menuToggle(button) {
  //DISABLE dynamic header colors

  $(button).toggleClass("is-active");
  if (headerDynamic.hasClass( "header-disable-dynamic-color" )) {
      headerDynamic.removeClass("header-disable-dynamic-color");
  } else {
      headerDynamic.addClass("header-disable-dynamic-color");
  }

  var $listSort = headerOverlay;
  if ($listSort.attr('aria-hidden')) {
    $listSort.removeAttr('aria-hidden');
  } else {
    $listSort.attr('aria-hidden', true);
  }
  return false;
}


// shows menu on desktops
function menuDesktop(x) {
  if (x.matches && !(window.navigator.userAgent.indexOf("Edge") > -1)) { // if desktop
    headerOverlay.removeAttr('aria-hidden');
    hamburger.removeClass("is-active");

  } else { //if mobile
    headerOverlay.attr('aria-hidden', true);
    headerOverlay.on('click tap',function(e) {
      if (e.target !== this)
        return;

      headerOverlay.attr('aria-hidden', true);
      hamburger.removeClass("is-active");
      headerDynamic.removeClass("header-disable-dynamic-color");
      
    });


  }
  return false;
}

var x = window.matchMedia("(min-width: 1280px)")
menuDesktop(x)
x.addListener(menuDesktop)

jQuery(document).ready(function() {
  $('.current-menu-item .subheader, .current-menu-parent .subheader').removeAttr('aria-hidden');
  $('.current-menu-item ul, .current-menu-parent').attr('data-aos', 'menu-slide').attr('data-aos-anchor', '#trigger-menu');

  
  //fancy animatinos
  AOS.init({
    easing: 'ease-out-quad',
    duration: 400,
    mirror: false
  });

});



