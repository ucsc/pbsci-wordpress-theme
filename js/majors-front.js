$("#overview").fadeIn('fast');
$('#overview-tab').addClass('active');
$('#overview-tab a').attr('aria-selected','true');

$(document).ready(function($){
    $(".tab-link").click(function(e) {
    e.preventDefault();
    $(this).parent('li').addClass('active');
    $(this).attr('aria-selected','true');
    $("#major-tabs li").not($(this).parent('li')).removeClass("active");
    $("#major-tabs li a").not($(this).parent('li')).attr("aria-selected","false");
    $('.majorcontainers div').fadeOut('fast');
    $('#' + $(this).data('rel')).fadeIn('fast');
});
});