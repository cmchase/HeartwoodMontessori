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

      this.setState({
          events: gapiClient.listUpcomingEvents(4, set)
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
        eventItems.push(<EventListItem key={event.etag} event={event} />);
      }
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