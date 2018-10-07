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
      disableOnInteraction: false,
    },

  });

  $('#calendar').fullCalendar({
    // put your options and callbacks here
    defaultView: 'listMonth',
    googleCalendarApiKey: 'AIzaSyBJJ13IeXcBSsy0-E1ls6YdCnrZkG6tmtI',
    eventSources: [
      {
        googleCalendarId: 'saintsrobotics.com_2ha1cp70qh2dcb61rlkq1tlaas@group.calendar.google.com'
      },
      {
        googleCalendarId: 'saintsrobotics.com_2ha1cp70qh2dcb61rlkq1tlaas@group.calendar.google.com'

      },
      {
        googleCalendarId: 'saintsrobotics.com_31th07n6achakl2jof6th85dfs@group.calendar.google.com'

      }

    ],


  });
  //$('main').overlayScrollbars({ });
});
