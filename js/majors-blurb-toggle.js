 $(document).ready(function() {
   $('#panelblurb').hide();

   $('.panel-toggle').click(function() {
           var id = $(this).attr('id');
           var elem = $('#' + id).text();
           if (elem == "More"){
              $('#' + id).text("Less");
              $('#panelblurb' + id).slideDown();
           } else {
            $('#' + id).text("More");
            $('#panelblurb' + id).slideUp();
           }


         //   alert(elem);
      //   return false;
        });

   });