function dynamic_calendar(x) {
  if (x.matches) { // if desktop
    $('#calendar').fullCalendar('option', 'aspectRatio', 1.8);
        $('#calendar').fullCalendar('changeView', 'month');
  } else { //if mobile
    $('#calendar').fullCalendar('option', 'aspectRatio', 1);
    $('#calendar').fullCalendar('changeView', 'listMonth');

  }
}
$(document).ready(function() {
  $('#calendar').fullCalendar({
    defaultView: 'month',
    themeSystem: 'bootstrap3',

    googleCalendarApiKey: 'AIzaSyDofFdP1H6o8vKfzpzzLF8fFQVdgg1FuTA',
    eventSources: [{
        googleCalendarId: 'saintsrobotics.com_c4bf0p7np7r1au0485a1pmdpcg@group.calendar.google.com'
      },
      {
        googleCalendarId: 'saintsrobotics.com_2ha1cp70qh2dcb61rlkq1tlaas@group.calendar.google.com',

      },
      {
        googleCalendarId: 'saintsrobotics.com_31th07n6achakl2jof6th85dfs@group.calendar.google.com',

      }
    ]
  });
  dynamic_calendar(x)
  x.addListener(dynamic_calendar)
});
