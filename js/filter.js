// var degrees = JSON.parse($('#card-container').attr('data-degrees'));

// var departments = JSON.parse($('#card-container').attr('data-departments'));

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

$(function () {
    //search js
    var opportunityOptions = {
        valueNames: [
            'post-title',
            'itemtaxonomy',
            // { data: ['timestamp'] },
        ]
    }
    var opportunityList = new List('page-student-research-opportunities', opportunityOptions);
    console.log(opportunityList.items);
    $('#opportunity-search').on('keyup', function () {
        var searchString = $(this).val();
        opportunityList.fuzzySearch(searchString);
    });
    $('#student-opportunities-tax').change(function () {
        var selection = this.value;
        console.log(selection);
        if (selection != 'clear') {
            // opportunityList.filter(function (item) {
            //     return (item.values().itemtaxonomy == selection);

            // });
            opportunityList.fuzzySearch(selection);
        } else {
            opportunityList.filter();
            return false;
        }

    })
    $('#opportunity_clear').click(function () {
        // document.getElementById('degree-search').value = '';
        opportunityList.filter();
        return false;

    });
});