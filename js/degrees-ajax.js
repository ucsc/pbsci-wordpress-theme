$ = jQuery;

var mafs = $("#ucsc-ajax-filter-search");
var mafsForm = mafs.find("form");
var degreesoffered = [];
var clearBtn = $("#reset");
mafsForm.submit(function(e){
    e.preventDefault();
    $('input[name="degreesoffered"]:checked').each(function(){
        degreesoffered.push(this.value);
    });

    //debug
    console.log("form submitted");
    alert("Number of degrees checked: "+degreesoffered.length+"\n"+"And, they are: "+degreesoffered);
    //end debug

    var data = {
        action : "ucsc_ajax_filter_search",
        search : search,
        degreesoffered : degreesoffered,
    }

    $.ajax({
        url : ajax_url,
        data : data,
        success : function(response) {
            mafs.find("ul").empty();
            if(response) {
                for(var i = 0 ;  i < response.length ; i++) {
                     var html  = "<li id='movie-" + response[i].id + "'>";
                         html += "  <a href='" + response[i].permalink + "' title='" + response[i].title + "'>";
                         html += "      <img src='" + response[i].poster + "' alt='" + response[i].title + "' />";
                         html += "      <div class='movie-info'>";
                         html += "          <h4>" + response[i].title + "</h4>";
                         html += "          <p>Year: " + response[i].year + "</p>";
                         html += "          <p>Rating: " + response[i].rating + "</p>";
                         html += "          <p>Language: " + response[i].language + "</p>";
                         html += "          <p>Director: " + response[i].director + "</p>";
                         html += "          <p>Genre: " + response[i].genre + "</p>";
                         html += "      </div>";
                         html += "  </a>";
                         html += "</li>";
                     mafs.find("ul").append(html);
                }
            } else {
                var html  = "<li class='no-result'>No matching movies found. Try a different filter or search keyword</li>";
                mafs.find("ul").append(html);
            }
        }
    });

// we will add codes above this line later
});

clearBtn.onclick = function(){
    // e.preventDefault();
    mafsForm.reset();
    degreesOffered.value = "";
    //debug
    // console.log("form submitted");
    // console.log("Number of degrees checked: "+degreesOffered.length+"\n"+"And, they are: "+degreesOffered);
    //end debug

}

