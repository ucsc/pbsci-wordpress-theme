// window.onscroll = function() {scrollStuck()};
var navBar = document.getElementById("site-navigation");
var mainNav = document.getElementById("primary-menu");
var navBarToggle = document.getElementById("js-navbar-toggle");
var sticky = 650;

navBarToggle.addEventListener("click", function() {
  mainNav.classList.toggle("active");
});

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
