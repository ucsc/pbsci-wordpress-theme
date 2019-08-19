// var degrees = JSON.parse($('#card-container').attr('data-degrees'));

// var departments = JSON.parse($('#card-container').attr('data-departments'));

// console.log(degreeSelect);
// var checkboxes = document.getElementsByClassName('filter');
// for (var index in checkboxes) {
//     checkboxes[index].onchange = checkValue;
// }
// function checkValue(
//     var val = this.value;
// if (this.checked) {
//     alert($(this).val());
// }
// )


//search js
var options = {
    valueNames: [
        'card-title',
        // 'ba',
        // 'bs',
        // 'ma',
        // 'ms',
        // 'phd',
        'program',
        // 'department',
        'depts',
        // item: 'card_container',
        // { data: ['degrees'] },
        // { data: ['departments'] },
    ]
}
var degreeList = new List('degree_cards', options);
console.log(degreeList.items);
$('#degreetype-select').change(function () {
    // alert($(this).val());
    var selection = this.value;
    console.log(selection);
    if (selection != 'clear') {
        // degreeList.filter(function (item) {
        //     return (item.values().program == selection);
        // });
        degreeList.fuzzySearch(selection);
    } else {
        degreeList.filter();
        return false;
    }
});

$('#department-select').change(function () {
    var selection = this.value;
    console.log(selection);
    if (selection != 'clear') {
        // degreeList.filter(function (item) {
        //     return (item.values().departments == selection);

        // });
        degreeList.fuzzySearch(selection);
    } else {
        // degreeList.clear();
        return false;
    }

})

$('#degree-search').on('keyup', function () {
    var searchString = $(this).val();
    degreeList.fuzzySearch(searchString);
});

$('#filter-clear').click(function () {
    document.getElementById('degree-search').value = '';
    // degreeList.filter();
    // return false;

});

