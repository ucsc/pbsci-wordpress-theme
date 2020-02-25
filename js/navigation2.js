// window.onscroll = function() {scrollStuck()};
var navBar = document.getElementById("site-navigation");
var menuContainer = document.getElementById("menu-container");
var navBarToggle = document.getElementById("js-navbar-toggle");
var sticky = 650;

navBarToggle.addEventListener("click", function() {
  menuContainer.classList.toggle("menu-active");
});

(function($) {
  $(document).ready(function() {
    $('#primary-menu > li > a').on('click', function(e) { 
      var parent = $(this).parent('li');
        if ($(parent).hasClass('menu-item-has-children')) {
          e.preventDefault();
          $(this).parent('li').siblings('li').removeClass('show-submenu'); 
          $(this).parent('li').toggleClass('show-submenu');
          $(document).one('click', function closeMenu (e){
            if($('#primary-menu').has(e.target).length === 0){
                $('#primary-menu').find('li').removeClass('show-submenu');
            } else {
                $(document).one('click', closeMenu);
            }
          });
        } 
    });
    $('#primary-menu > li > ul > li').click(function(e) {
        e.stopPropagation();  
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
