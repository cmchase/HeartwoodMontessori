var React = require('react')
var EventListItem = React.createClass({
  render: function(){
    var event = this.props.event,
        start = new Date(event.start.dateTime),
        end = new Date(event.end.dateTime),
        summary = event.summary,
        description = event.description,
        timeRange;
        
    // If our start and end times are the same, 
    // let's just show the Start
    if (hw.getTime(start) === hw.getTime(end)) {
      timeRange = hw.getTime(start);
    } else {
      timeRange = hw.getTime(start) + " - " + hw.getTime(end); 
    };

    return (
      <li className="activity-item">
        <div className="activity-wrapper">
          <span className="activity-date">
            <span className="day">{hw.daysAbbr[start.getDay()]}</span>
            <span className="month">{hw.monthsAbbr[start.getMonth()]}</span>
            <span className="date">{start.getDate()}</span>
          </span>
          <span className="activity-title">{summary}</span>
          <span className="activity-time">{timeRange}</span>
        </div>
      </li>
    )
  }
});

module.exports = EventListItem; 