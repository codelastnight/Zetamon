$(document).ready(function() {
  // swiper is the image gallary thing for the landing page
  //initialize swiper when document ready

  var mySwiper = new Swiper('.swiper-container', {
    // Optional parameters
    direction: 'horizontal',
    loop: true,
    allowTouchMove: false,
    effect: "fade",
    spaceBetween: 30,
    speed: 1500,
    pagination: {
      el: '.swiper-pagination',
      clickable: true
    },
    autoplay: {
      delay: 4000,
      disableOnInteraction: false
    }
  });


  //$('main').overlayScrollbars({ });
});
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
});
