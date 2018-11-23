
// swiper is the image gallary thing for the landing page
//initialize swiper when document ready

jQuery(document).ready(function($) {
    var mySwiper = new Swiper ('.swiper-container', {
    // Optional parameters
        autoplay: {
        delay: 5000,
        },
        direction: 'horizontal',
        loop: true,
        allowTouchMove: false,
        effect: "fade",
       
        speed: 800,
    })
    
    $('.close-div ').on('click tap', function(event) {
     $(this).closest(".message-bar").remove();
    });
  $('.menu-item-home > a').attr("href", "#trigger-menu").html("about");
  
  $(document).scroll(function() {
   if($(window).scrollTop() <= 40) {
     $('.menu-item-home > a').attr("href", "#trigger-menu").html("about");
   }
  });
})
document.addEventListener('aos:in:about', (function( detail ){
  if($(window).scrollTop() >= 40) {
  jQuery('.menu-item-home > a').html("home").attr("href", "#home");
}
}));



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
