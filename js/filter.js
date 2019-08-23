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
        var selection = this.value;
        // console.log(selection);
        if (selection != 'clear') {
            degreeList.fuzzySearch(selection);
        } else {
            degreeList.search();
        }
    });

    $('#department-select').change(function () {
        var selection = this.value;
        // console.log(selection);
        if (selection != 'clear') {
            degreeList.fuzzySearch(selection);
        } else {
            degreeList.search();
        }

    })

    $('#degree-search').on('keyup', function () {
        var searchString = $(this).val();
        degreeList.fuzzySearch(searchString);
    });

    $('#degree-clear').click(function () {
        /*Clear textarea using ID */
        $('#degree-search').val('');
        degreeList.search();
        /* Reset Degree type Dropdown using Class*/
        $('.filter-select').prop('selectedIndex', 0);
    });

});

$(function () {
    //search js
    var labOptions = {
        valueNames: [
            'post-title',
            'itemtaxonomy1',
            // { data: ['researcher_faculty_labs'] },
        ]
    }
    var labList = new List('page-faculty-researchers', labOptions);
    // console.log(labList.items);
    $('#lab-search').on('keyup', function () {
        var searchString = $(this).val();
        labList.fuzzySearch(searchString);
    });
    $('#researcher-faculty-labs-tax').change(function () {
        var selection = this.value;
        // console.log(selection);
        if (selection != 'clear') {
            labList.fuzzySearch(selection);
        } else {
            labList.search();
        }

    })
    $('#lab-clear').click(function () {
        /*Clear textarea using ID */
        $('#lab-search').val('');
        labList.search();
        /* Reset Degree type Dropdown*/
        $('.filter-select').prop('selectedIndex', 0);
    });
});

$(function () {
    //search js
    var opportunityOptions = {
        valueNames: [
            'post-title',
            'itemtaxonomy1',
            'itemtaxonomy2',
            'itemtaxonomy3',
            'depts',
        ]
    }
    var opportunityList = new List('page-student-research-opportunities', opportunityOptions);
    // console.log(opportunityList.items);
    $('#opportunity-search').on('keyup', function () {
        var searchString = $(this).val();
        opportunityList.fuzzySearch(searchString);
    });
    $('#student-opportunities-tax').change(function () {
        var selection = this.value;
        // console.log(selection);
        if (selection != 'clear') {
            opportunityList.fuzzySearch(selection);
        } else {
            opportunityList.search();
        }

    })
    $('#student-opp-eligib-tax').change(function () {
        var selection = this.value;
        // console.log(selection);
        if (selection != 'clear') {
            opportunityList.fuzzySearch(selection);
        } else {
            opportunityList.search();
        }

    })
    $('#student-opp-avail-tax').change(function () {
        var selection = this.value;
        // console.log(selection);
        if (selection != 'clear') {
            opportunityList.fuzzySearch(selection);
        } else {
            opportunityList.search();
        }

    })
    $('#studentopportunities-department-select').change(function () {
        var selection = this.value;
        // console.log(selection);
        if (selection != 'clear') {
            opportunityList.fuzzySearch(selection);
        } else {
            opportunityList.search();
        }

    })
    $('#opportunity-clear').click(function () {
        /*Clear textarea using class */
        $('#opportunity-search').val('');
        opportunityList.search();
        /* Reset Degree type Dropdown*/
        $('.filter-select').prop('selectedIndex', 0);
    });
});