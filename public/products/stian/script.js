var months = [
        'January',
        'February',
        'March',
        'April',
        'May',
        'June',
        'July',
        'August',
        'September',
        'October',
        'November',
        'December'
];

var weekday = [
        'Sunday',
        'Monday',
        'Tuesday',
        'Wednesday',
        'Thursday',
        'Friday',
        'Saturday'
];

var d = new Date(document.lastModified); 
d.setTime(d.getTime() + 60 * 60);

document.write("<i>Updated: " + weekday[d.getDay()] + ' ' + d.getDate() + ' ' + months[d.getMonth()] + ' \n' + d.getFullYear() + "</i>");