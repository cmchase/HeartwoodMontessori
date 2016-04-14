"use strict"
var React = require('react');
var EventListItem = require('./eventListItem') 
var EventList = React.createClass({
  componentWillMount: function () {
    if (typeof window === 'undefined') {
        return;
    }
    window.eventListCallback = function() {
      var set = function(val) {
        this.setState({ events: val})
      }.bind(this);

      // Let's grab 10 events to give us a few extra to 
      // work with just in case some aren't valid
      this.setState({
          events: gapiClient.listUpcomingEvents(10, set)
      });
    }.bind(this);
  },
  getInitialState: function() {
    return {
      events: []
    }
  },
  render: function(){
    var events = this.state.events;
    var eventItems = [];
    if (typeof events === 'undefined' || events.length === 0) {
      return (<div className="loading-event-list"></div>);
    } else {
      for (var i = 0; i < events.length; i++){
        var event = events[i];

        // Let's only add items that have valid start dates
        if (Date.parse(event.start.dateTime)) { 
          eventItems.push(<EventListItem key={event.etag} event={event} />);
        };

        // If we've reach our limit, let's break out of our loop
        if (eventItems.length === 4) {
          break;
        };
      };
      return (
        <div>
          <ul className="activity-list">
            {eventItems}
          </ul>
          <a href="/parent-resources/event-calendar/" className="activity-more">
            <span className="icon"></span>View All Events
          </a>
        </div>
      );
    };    
  }
});


module.exports = EventList;