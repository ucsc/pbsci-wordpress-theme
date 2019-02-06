
var heading = document.querySelectorAll('.panel-heading h2').innerHTML;
addspan = heading.replace(/^\s*\w+/, '<span>$&</span>');
nospace = addspan.replace(/[>]\s/g,'>');
document.querySelector('.panel-heading h2').innerHTML = nospace;
console.log(nospace);
