$(document).ready(function($) {
    $("#overview").show();
    $('#overview-tab').addClass('active');
    $('#overview-tab a').attr('aria-selected', 'true');
    if (window.location.hash) {
        var hashTar = window.location.hash;
        if ($("a[href='" + hashTar + "']").length) {
            var elmTar = $("a[href='" + hashTar + "']");
            switchTabs(elmTar);

        }
    }

    $(".tab-link").click(function(e) {
        e.preventDefault();
        var elm = $(this);
        var newHash = $('#' + elm.data('rel')).selector;
        window.location.hash = newHash;
        switchTabs(elm);
    });

});

function switchTabs(tar) {
    $(tar).parent('li').addClass('active');
    $(tar).attr('aria-selected', 'true');
    $("#major-tabs li").not($(tar).parent('li')).removeClass("active");
    $("#major-tabs li a").not($(tar).parent('li')).attr("aria-selected", "false");
    $('.majorcontainers section').hide();
    $('#' + $(tar).data('rel')).show();
    setTimeout(function() { $(window).scrollTop(0); }, 100);
}