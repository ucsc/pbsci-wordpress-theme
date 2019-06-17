$('#hero-chevron').on('click', function () {
    var body = $("html, body");
    body.stop().animate({ scrollTop: $('#primary').offset().top }, '250');
});
