(function () {

  // store the slider in a local variable
  var $window = $(window),
    flexslider = { vars: {} };

  // tiny helper function to add breakpoints
  function getGridSize() {
    return (window.innerWidth < 600) ? 1 :
      (window.innerWidth < 900) ? 2 : 3;
  }

  // $(function() {
  //   SyntaxHighlighter.all();
  // });

  $window.load(function () {
    $('.flexslider').flexslider({
      animation: "slide",
      animationLoop: false,
      itemWidth: 350,
      itemMargin: 5,
      controlNav: false,
      minItems: getGridSize(), // use function to pull in initial value
      maxItems: getGridSize(), // use function to pull in initial value
      prevText: "",    //String: Set the text for the "previous" directionNav item
      nextText: "",        //String: Set the text for the "next" directionNav item
      directionNav: false, //
    });
  });

  // check grid size on resize event
  $window.resize(function () {
    var gridSize = getGridSize();

    flexslider.vars.minItems = gridSize;
    flexslider.vars.maxItems = gridSize;
  });
}());