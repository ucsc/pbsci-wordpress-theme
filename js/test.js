// var degrees = JSON.parse($('#card-container').attr('data-degrees'));
var degrees3 = $('#card-container').attr('data-degrees');
var departments = JSON.parse($('#card-container').attr('data-departments'));

var container = document.getElementById('#card-container');

var degreeSelect = $('#degreetype option:selected').text();
// var departments2 = container.getAttribute('data-departments');
// var degrees2 = container.getAttribute('data-degrees');

console.log(degreeSelect);
