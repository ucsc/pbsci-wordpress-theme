// window.onscroll = function() {scrollStuck()};
const navBar = document.getElementById('site-navigation');
const menuContainer = document.getElementById('menu-container');
const navBarToggle = document.getElementById('js-navbar-toggle');
const sticky = 650;

navBarToggle.addEventListener('click', function() {
    menuContainer.classList.toggle('menu-active');
});

(function($) {
    $(document).ready(function() {
        $('#primary-menu > li > a').on('click', function(e) {
            const parent = $(this).parent('li');
            if ($(parent).hasClass('menu-item-has-children')) {
                e.preventDefault();
                $(this)
                    .parent('li')
                    .siblings('li')
                    .removeClass('show-submenu');
                $(this)
                    .parent('li')
                    .toggleClass('show-submenu');
                $(document).one('click', function closeMenu(e) {
                    if ($('#primary-menu').has(e.target).length === 0) {
                        $('#primary-menu')
                            .find('li')
                            .removeClass('show-submenu');
                    } else {
                        $(document).one('click', closeMenu);
                    }
                });
            }
        });
        $('#primary-menu > li > ul > li').click(function(e) {
            e.stopPropagation();
        });

        let c = 0;
        let currentScrollTop = 0;
        const navbar = $('.header');
        const alertHeight = $('.alert-bar').height() + $('#wpadminbar').height();
        const adminHeight = $('#wpadminbar').height();
        const b = $(navbar).height();

        $('#masthead').css('padding-top', b - 5);

        $(window).scroll(function() {
            const a = $(window).scrollTop();
            currentScrollTop = a;
            if (currentScrollTop < alertHeight) {
                $(navbar).css('top', alertHeight - currentScrollTop + 5);
            }
            if (c < currentScrollTop && a > b) {
                $(navbar).addClass('scrollUp');
            } else if (c > currentScrollTop && !(a <= b)) {
                $(navbar).removeClass('scrollUp');
                if (adminHeight > 0) {
                    $(navbar).css('top', adminHeight);
                } else {
                    $(navbar).css('top', 0);
                }
            }
            c = currentScrollTop;
        });
    });
})(jQuery);

// function scrollStuck() {
//   if (window.pageYOffset > sticky && window.matchMedia("(min-width: 48em)") ) {
//     navBar.classList.add("stuck");
//   } else {
//     navBar.classList.remove("stuck");
//   }
// }

// function myFunction(x) {
//   if (x.matches) { // If media query matches
//     navBar.classList.remove("stuck");
//   } else {
//     navBar.classList.add("stuck");
//   }
// }

// var x = window.matchMedia("(min-width: 47em)")
// myFunction(x) // Call listener function at run time
// x.addListener(myFunction) // Attach listener function on state changes
