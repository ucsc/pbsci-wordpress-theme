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
$(function () {
    //search js
    var degreeOptions = {
        valueNames: [
            'card-title',
            'program',
            'depts',
        ]
    }
    var degreeList = new List('degree_cards', degreeOptions);
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
});

$(function () {
    //search js
    var labOptions = {
        valueNames: [
            'post-title',
            'itemtaxonomy',
            // { data: ['researcher_faculty_labs'] },
            // { data: ['timestamp'] },
        ]
    }
    var labList = new List('page-faculty-researchers', labOptions);
    console.log(labList.items);
    $('#lab-search').on('keyup', function () {
        var searchString = $(this).val();
        labList.fuzzySearch(searchString);
    });
    $('#researcher-faculty-labs-tax').change(function () {
        var selection = this.value;
        console.log(selection);
        if (selection != 'clear') {
            // labList.filter(function (item) {
            //     return (item.values().itemtaxonomy == selection);

            // });
            labList.fuzzySearch(selection);
        } else {
            labList.filter();
            return false;
        }

    })
    $('#lab_clear').click(function () {
        // document.getElementById('degree-search').value = '';
        labList.filter();
        return false;

    });
});