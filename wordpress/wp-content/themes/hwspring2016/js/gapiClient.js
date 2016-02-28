
function gapiOnLoadCallback() {
	gapi.client.setApiKey('AIzaSyDtszoE6zAROJye9g5ejxi-5wR9ylpKNyM');
	gapi.client.load('calendar', 'v3', function() {
		console.log('calendar ready')
	});
}

var gapiClient = {
	listUpcomingEvents: function(maxResults) {
		var request = gapi.client.calendar.events.list({
		  'calendarId': 'heartwoodmontessori.com_5m7fci1sql1nmfsp1dc3lk69n0@group.calendar.google.com',
		  'timeMin': (new Date()).toISOString(),
		  'showDeleted': false,
		  'singleEvents': true,
		  'maxResults': maxResults,
		  'orderBy': 'startTime'
		});

		request.execute(function(resp) {
		  var events = resp.items;
		  if (events.length > 0) {
		    for (i = 0; i < events.length; i++) {
		      var event = events[i];
		      var when = event.start.dateTime;
		      if (!when) {
		        when = event.start.date;
		      }
		      console.log(event)
		    }
		  } else {
		    console.log('No upcoming events found.');
		  }

		});
	}
}