// $(window).on('load', function() {
//     $('.flexslider').flexslider({
//         maxItems: 1,
//         animation: "fade",
//         start: function(slider) {
//             $('body').removeClass('loading');
//         },
//         directionNav: false,
//         slideshowSpeed: 5000,
//         pauseOnHover: true,
//     });
// });

$(window).on('load', function() {
    $('.flexslider').flexslider({
        maxItems: 1,
        animation: flexslider_vars.animation,
        start: function(slider) {
            $('body').removeClass('loading');
        },
        directionNav: false,
        slideshowSpeed: 5000,
        pauseOnHover: true,
    });
});