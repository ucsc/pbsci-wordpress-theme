var panelHead = document.querySelectorAll('.panel-heading h2');
  for (var i=0; i < panelHead.length; i++){
    panelHead[i].innerHTML = panelHead[i].innerHTML.replace(/^\s*\w+/, '<span>$&</span>');
    panelHead[i].innerHTML = panelHead[i].innerHTML.replace(/[>]\s/g,'>');
    //console.log(panelHead[i]);
}
