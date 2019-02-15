let mainNav = document.getElementById("primary-menu");
let navBarToggle = document.getElementById("js-navbar-toggle");

navBarToggle.addEventListener("click", function() {
  mainNav.classList.toggle("active");
});

// jQuery(document).ready(function($) {
//     var offset = 100;
//     var speed = 250;
//     var duration = 500;
//     $(window).scroll(function() {
//         if ($(this).scrollTop() < offset) {
//             $('.topbutton').fadeOut(duration);
//         } else {
//             $('.topbutton').fadeIn(duration);
//         }
//     });
//     $('.topbutton').on('click', function() {
//         $('html, body').animate({ scrollTop: 0 }, speed);
//         return false;
//     });
// });

