$(document).ready(function(){
    $(".panel-blurb").slideUp();
    $(".panel-toggle").click(function(){
        $(".panel-blurb").slideToggle("slow");
    });
});

// $(".panel-blurb").slideUp();
// $(".panel-toggle").click(function(){
//     $(this).next(".panel-blurb").slideToggle("slow");
//   });