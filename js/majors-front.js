$(".tab-link").click(function(e) {
    e.preventDefault();
    $('.majorcontainers div').fadeOut('slow');
    $('#' + $(this).data('rel')).fadeIn('slow');
});