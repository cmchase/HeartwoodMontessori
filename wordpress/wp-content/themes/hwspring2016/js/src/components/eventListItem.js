var React = require('react')
var EventListItem = React.createClass({
  render: function(){
    var event = this.props.event;
    var start = new Date(event.start.dateTime),
        end = new Date(event.end.dateTime),
        summary = event.summary,
        description = event.description;

    return (
      <li className="activity-item">
        <a href="#" className="activity-link">
          <span className="activity-date">
            <span className="day">{hw.daysAbbr[start.getDay()]}</span>
            <span className="month">{hw.monthsAbbr[start.getMonth()]}</span>
            <span className="date">{start.getDate()}</span>
          </span>
          <span className="activity-title">{summary}</span>
          <span className="activity-time">{hw.getTime(start)} - {hw.getTime(end)}</span>
        </a>
      </li>
    )
  }
});

module.exports = EventListItem; 