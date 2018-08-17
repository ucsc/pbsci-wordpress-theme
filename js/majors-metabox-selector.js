(function($) {
    $(document).ready(function() {
        $(".major-overview").hide();
        $(".major-bachelors").hide();
        $(".major-minor").hide();
        $(".major-masters").hide();
        $(".major-doctoral").hide();
        $(".major-faculty").hide();
        $(".major-courses").hide();

        // lets add the interactivity by adding an event listener
        $("#_ucsc_major_components_multicheckbox1").bind("change", function() {

            if ($(this).prop('checked')) {
                $(".major-overview").show(500);
            } else {
                $(".major-overview").hide(500);
            }
        });

        $("#_ucsc_major_components_multicheckbox2").bind("change", function() {

            if ($(this).prop('checked')) {
                $(".major-bachelors").show(500);
            } else {
                $(".major-bachelors").hide(500);
            }
        });

        $("#_ucsc_major_components_multicheckbox3").bind("change", function() {

            if ($(this).prop('checked')) {
                $(".major-minor").show(500);
            } else {
                $(".major-minor").hide(500);
            }
        });

        $("#_ucsc_major_components_multicheckbox4").bind("change", function() {

            if ($(this).prop('checked')) {
                $(".major-masters").show(500);
            } else {
                $(".major-masters").hide(500);
            }
        });

        $("#_ucsc_major_components_multicheckbox5").bind("change", function() {

            if ($(this).prop('checked')) {
                $(".major-doctoral").show(500);
            } else {
                $(".major-doctoral").hide(500);
            }
        });

        $("#_ucsc_major_components_multicheckbox6").bind("change", function() {

            if ($(this).prop('checked')) {
                $(".major-faculty").show(500);
            } else {
                $(".major-faculty").hide(500);
            }
        });

        $("#_ucsc_major_components_multicheckbox7").bind("change", function() {

            if ($(this).prop('checked')) {
                $(".major-courses").show(500);
            } else {
                $(".major-courses").hide(500);
            }
        });

        //make sure that these metaboxes appear properly in profession edit screen
        // if ($("#_mytheme_profession_type").val() == 1) //photographer
        // $("#profession_photographer").show();
        // else if ($("#_mytheme_profession_type").val() == 2) //programmer
        // $("#profession_programmer").show();

    })
})(jQuery);

(function($) {
    $(document).ready(function() {
        $("#profession_photographer").hide();
        $("#profession_programmer").hide();

        //lets add the interactivity by adding an event listener
        $("#_mytheme_profession_type").bind("change", function() {
            if ($(this).val() == 1) {
                // photographer
                $("#profession_photographer").show();
                $("#profession_programmer").hide();
            } else if ($(this).val() == 2) {
                //programmer
                $("#profession_photographer").hide();
                $("#profession_programmer").show();
            } else {
                //still confused, hasn’t selected any
                $("#profession_photographer").hide();
                $("#profession_programmer").hide();
            }
        });

        //make sure that these metaboxes appear properly in profession edit screen
        if ($("#_mytheme_profession_type").val() == 1) //photographer
            $("#profession_photographer").show();
        else if ($("#_mytheme_profession_type").val() == 2) //programmer
            $("#profession_programmer").show();

    })
})(jQuery);