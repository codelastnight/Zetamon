
// swiper is the image gallary thing for the landing page
//initialize swiper when document ready
var menuitemlink = jQuery('.menu-item-home > a')
jQuery(document).ready(function($) {
    //$('html,body').scrollTop(0);
    var mySwiper = new Swiper ('.swiper-container', {
    // Optional parameters
        autoplay: {
        delay: 5000,
        },
        
        loop: true,
        allowTouchMove: false,
        effect: "fade",
       
        speed: 800,
    })
    
    $('.close-div ').on('click tap', function(event) {
     $(this).closest(".message-bar").remove();
    });
  menuitemlink.attr("href", "#trigger-menu").html("about");
  
  $(document).scroll(function() {
   if($(window).scrollTop() <= 300) {
     menuitemlink.attr("href", "#trigger-menu").html("about");
   }
   else {
        menuitemlink.html("home").attr("href", "#home");
    }
   
  });
  $('#gmap > iframe').attr("src", "https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d672.2916398599913!2d-122.11685113967444!3d47.62289350181041!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x54906dbdfa0f55b7%3A0x35a096d8775d8148!2sNorthup+Way+%26+168th+Ave+NE!5e0!3m2!1sen!2sus!4v1542588102080")
  return false;
});

// document.addEventListener('aos:in:about', (function( detail ){
    
    
// }));




//$('main').overlayScrollbars({ });
//});
// formatGoogleCalendar.init({
//   calendarUrl: [
//     //'https://www.googleapis.com/calendar/v3/calendars/saintsrobotics.com_31th07n6achakl2jof6th85dfs@group.calendar.google.com/events?key=AIzaSyBJJ13IeXcBSsy0-E1ls6YdCnrZkG6tmtI', 'https://www.googleapis.com/calendar/v3/calendars/saintsrobotics.com_2ha1cp70qh2dcb61rlkq1tlaas@group.calendar.google.com/events?key=AIzaSyBJJ13IeXcBSsy0-E1ls6YdCnrZkG6tmtI'
//   ],
//   past: false,
//   upcoming: true,
//   sameDayTimes: true,
//   dayNames: true,
//   pastTopN: -1,
//   upcomingTopN: 10,
//   itemsTagName: 'li',
//   upcomingSelector: '#events-upcoming',
//   recurringEvents: true,
//   upcomingHeading: '<h2>Upcoming events</h2>',
//
//   format: [
//     '*date*',
//     ': ',
//     '*summary*',
//     ' — ',
//     '*description*',
//     ' in ',
//     '*location*'
//   ]
//});
