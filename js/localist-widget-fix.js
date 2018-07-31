(function() {
    var date = document.querySelector('.lw_event_item_dates').innerHTML;
    var split = date.split(" ");
    var days = ["01", "02", "02", "04", "05", "06", "07", "08", "09", "10", "11", "12", "13", "14", "15", "16", "17", "18", "19", "20", "21", "22", "23", "24", "25", "26", "27", "28", "29", "30", "31"];

    for (var i = 0; i < split.length; i++) {
        for (var j = 0; j < days.length; j++) {
            if (split[i] == days[j]) {
                split[i] = "<span>" + split[i] + "</span>";
            }
        }
    }

    var newDate = split.join(' ');

    document.querySelector('.lw_event_item_dates').innerHTML = newDate;
    console.log(split);
})();