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

        const $adminBar = $('#wpadminbar');
        const $alertBar = $('.alert-bar');
        const $header = $('.header');
        const $headerSibling = $('.header + *');
        let top = 0;
        let topNoAlert = 0;

        if ($adminBar.length) {
            top += $adminBar.height();
            topNoAlert = top;
        }
        if ($alertBar.length) {
            top += $alertBar.height();
        }

        let lastPosition = 0;
        $(window).scroll(function() {
            const position = $(window).scrollTop();

            // Scrolling up.
            if (position < lastPosition) {
                $header.css({
                    top: topNoAlert,
                    position: 'fixed',
                });
                $headerSibling.css('margin-top', top);
            }
            if (position <= top) {
                $header.css({
                    top: 0,
                    position: 'relative',
                });
                $headerSibling.css('margin-top', 0);
            }

            lastPosition = $(window).scrollTop();
        });
    });
})(jQuery);
