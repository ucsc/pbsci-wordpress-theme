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
        $('.mobile-menu-toggle').on('click touch', function() {
            $('.mobile-menu-expandable').slideToggle('fast');
        })

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
        $('.news-navigation a').on('click touch', function(e) {
            e.preventDefault();
            const headerVisibility = $('.header').css('position');
            var offset;
            if (headerVisibility !== 'fixed') {
                offset = 50;
            } else {
                offset = $('.header').height() + 50;
            }
            $('html, body').animate({ scrollTop: $(this.hash).offset().top - offset }, 1000);
        });
        $(document.links)
            .filter(function() {
                return this.hostname !== window.location.hostname;
            })
            .parent('.entry-title')
            .find('a')
            .addClass('external')
            .attr('target', '_blank');
    });
})(jQuery);
