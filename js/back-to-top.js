/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 * @link https://premium.wpmudev.org/blog/back-to-top-button-wordpress/
 */

jQuery(document).ready(function($) {
    const offset = 100;
    const speed = 250;
    const duration = 500;
    $(window).scroll(function() {
        if ($(this).scrollTop() < offset) {
            $('.topbutton').fadeOut(duration);
        } else {
            $('.topbutton').fadeIn(duration);
        }
    });
    $('.topbutton').on('click', function() {
        $('html, body').animate({ scrollTop: 0 }, speed);
        return false;
    });
});
