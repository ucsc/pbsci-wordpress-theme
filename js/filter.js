$('.filter-list select').change(function() {
    $(".card-container").hide();
    // console.log("changed");
    var selectArray = [];

    $('.filter-list select').each(function(index, value) {
        var selection = this.value;
        if (selection != 'clear') {
            selectArray.push(selection);
            // console.log(selectArray);
        }

    })
    var items = $(".card-container:contains(" + selectArray[0] + ")");
    for (i = 1; i < selectArray.length; i++) {
        items = $(items).filter(".card-container:contains(" + selectArray[i] + ")");
    }
    $(items).show();
});

$('.filter-list .search').on('keyup', function() {
    var searchString = $(this).val();
    $(".card-container").hide();
    $(".card-container:contains(" + searchString + ")").show();
});

$(".filter-clear").click(function() {
    /*Clear textarea using Class */
    $('.search').val('');
    /* Reset Degree type Dropdown using Class*/
    $('.filter-select').prop('selectedIndex', 0);
    $(".card-container").show();
});