    var date = document.getElementsByClassName('lw_event_item_dates');

    var days = ["1", "2", "2", "4", "5", "6", "7", "8", "9", "10", "11", "12", "13", "14", "15", "16", "17", "18", "19", "20", "21", "22", "23", "24", "25", "26", "27", "28", "29", "30", "31"];
    for (var i=0; i<date.length; i++) {
       var text = date[i].innerHTML.split(" ");

       text[2]= "<br><span>" + text[2] + "</span>";
       console.log(text[2]);
       var output = text.join('');
       date[i].innerHTML = output;
    }