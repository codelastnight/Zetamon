//Get JSON, parse it, transform into list items and append it to past or upcoming events list
var googleApiURL = 'https://www.googleapis.com/calendar/v3/calendars/milan.kacurak@gmail.com/events?key=AIzaSyCR3-ptjHE-_douJsn8o20oRwkxt-zHStY'

var request = new XMLHttpRequest();
request.open('GET', googleApiURL, true);

request.onload = function () {
    if (request.status >= 200 && request.status < 400) {
        var data = JSON.parse(request.responseText);
        console.log(data);
    } else {
        console.error(err);
    }
};

request.onerror = function () {
    console.error(err);
};

request.send();
