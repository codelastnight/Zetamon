function calendarevents(url) {
  this.url = url;

  this.data; 
  this.fetchy = function () {
    $.getJSON(url, function(jd) {
      this.data = jd;
      console.log(this.data);
    });
  }


 // fetch json from google calendar api

}
