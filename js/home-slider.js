$(window).on('load', function() {
    $('.flexslider').flexslider({
        maxItems: 1,
        animation: "fade",
        start: function(slider) {
            $('body').removeClass('loading');
        }
    });
});