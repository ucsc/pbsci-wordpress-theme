$('.filter-list select').change(function() {
    $('.card-container').hide();
    // console.log("changed");
    const selectArray = [];

    $('.filter-list select').each(function(index, value) {
        const selection = this.value;
        if (selection != 'clear') {
            selectArray.push(selection);
            // console.log(selectArray);
        }
    });
    let items = $(`.card-container:contains(${selectArray[0]})`);
    for (i = 1; i < selectArray.length; i++) {
        items = $(items).filter(`.card-container:contains(${selectArray[i]})`);
    }
    $(items).show();
});

$('.filter-list .search').keyup(function(e) {
    // create the regular expression
    const regEx = new RegExp(
        $.map(
            $(this)
                .val()
                .trim()
                .split(' '),
            function(v) {
                return `(?=.*?${v})`;
            }
        ).join(''),
        'i'
    );

    // select all list items, hide and filter by the regex then show
    $('.card-container')
        .hide()
        .filter(function() {
            return regEx.exec($(this).text());
        })
        .show();
});
$('.filter-clear').click(function() {
    /* Clear textarea using Class */
    $('.search').val('');
    /* Reset Degree type Dropdown using Class */
    $('.filter-select').prop('selectedIndex', 0);
    $('.card-container').show();
});
