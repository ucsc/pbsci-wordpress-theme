// ISSUE: there are two fields (classes) with multiple values,
// programHidden and depts. The values in these fields are separated
// by a "space" &nbsp; . The Drop-downs for "Program" and "Department" contain
// one of the possible values in each drop-down option. The problem is that
// listjs only allows for a single value per field/class (eg., "Name:John" not
// "Name:John, Sally, Mary, Rob"). The problem is that we need to convert the
// multiple-values fields into arrays and loop through them. There are various
// attempts in this code to solve this issue

// RESOURCES:
// https://stackoverflow.com/questions/36725580/list-js-filter-with-multiple-values-in-data-attribute/36727838#36727838
// https://stackoverflow.com/questions/31304796/i-cant-seem-to-get-list-js-to-filter-items-with-multiple-categories
// https://codepen.io/bjornmeansbear/pen/RPywzN

$(function () {
    //search js
    var degreeOptions = {
        valueNames: [
            'card-title',
            'program',
            'programHidden',
            'depts',
            // 'dept',
            // 'name',
            // 'phd',
            // 'ma',
            // 'ms',
            // 'designatedemphasis',
            // 'contig',
            // 'ba',
            // 'bs',
            // 'undergradminor',
            // 'designatedemphasis',
        ]
    }
    var degreeList = new List('degree_cards', degreeOptions);
    // console.log(degreeList.items);
    $('#degreetype-select').change(function () {
        // this sets the selection term
        // based on value of the <option>
        var selection = this.value;
        // console.log(selection);
        if (selection != 'clear') {
            // degreeList.fuzzySearch(selection);
            // degreeList.search(selection, ['programHidden']);
            degreeList.filter(function (item) {
                if (
                    item.values().programHidden.indexOf(selection) >= 0
                ) {
                    return true;
                } else {
                    return false;

                }
                // runs a filter on the list

                // looks for something with class
                // of "programHidden"
                // var toBeSplit = item.values().programHidden;
                // this turns multiple entries separated
                // by a space into different
                // elements in an array
                // var alreadySplit = toBeSplit.split(' ');
                // console.log(alreadySplit);
                // we then loop through the array
                // for (var i = 0, j = alreadySplit.length; i < j; i++) {
                // this checks each possible "programHidden"
                // against the selection
                // and filters the list based on the
                // one that matches
                // console.log(alreadySplit[i]);
                // if (alreadySplit[i].includes(selection)) {
                // return true;
                // return (alreadySplit[i]);
                // console.log(alreadySplit[i]);
                // } else {
                // return false;
                // }
                // }

            });
        } else {
            degreeList.filter();
        }

    });

    $('#department-select').change(function () {
        var selection = this.value;
        //  console.log(selection);
        if (selection != 'clear') {
            // degreeList.fuzzySearch(selection);
            degreeList.search(selection, ['depts']);
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
        degreeList.filter();
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
            'itemtaxonomy2',
            'depts',
            'card-blurb'

        ]
    }
    var labList = new List('page-faculty-researchers', labOptions);
    // console.log(labList.items);
    $('#researcher-faculty-labs-tax').change(function () {
        var selection = this.value;
        // console.log(selection);
        if (selection != 'clear') {
            // degreeList.fuzzySearch(selection);
            labList.search(selection, ['itemtaxonomy1']);
        } else {
            labList.search();
        }
    })
    $('#resesarch-area-expertise-tax').change(function () {
        var selection = this.value;
        // console.log(selection);
        if (selection != 'clear') {
            // degreeList.fuzzySearch(selection);
            labList.search(selection, ['itemtaxonomy2']);
        } else {
            labList.search();
        }
    })
    $('#researcher-faculty-department-select2').change(function () {
        var selection = this.value;
        // console.log(selection);
        if (selection != 'clear') {
            labList.search(selection, ['depts']);
        } else {
            labList.search();
        }
    })
    $('#lab-search').on('keyup', function () {
        var searchString = $(this).val();
        labList.fuzzySearch(searchString);
    });
    $('#lab-clear').click(function () {
        /*Clear textarea using ID */
        $('#lab-search').val('');
        labList.search();
        labList.filter();
        /* Reset Degree type Dropdown*/
        $('.filter-select').prop('selectedIndex', 0);
    });
});

$(function () {
    //search js
    var instituteOptions = {
        valueNames: [
            'post-title',
            'itemtaxonomy1',
            'itemtaxonomy2',
            'card-blurb',
            'depts'
        ]
    }
    var instituteList = new List('page-research-groups-facilities', instituteOptions);
    // console.log(instituteList.items);

    $('#research-group-location').change(function () {
        var selection = this.value;
        // console.log(selection);
        if (selection != 'clear') {
            instituteList.search(selection, ['itemtaxonomy1']);
        } else {
            instituteList.search();
        }
    })
    $('#research-group-expertise').change(function () {
        var selection = this.value;
        // console.log(selection);
        if (selection != 'clear') {
            instituteList.search(selection, ['itemtaxonomy2']);
        } else {
            instituteList.search();
        }
    })
    $('#researcher-faculty-department-select3').change(function () {
        var selection = this.value;
        // console.log(selection);
        if (selection != 'clear') {
            instituteList.search(selection, ['depts']);
        } else {
            instituteList.search();
        }
    })
    $('#res-grp-search').on('keyup', function () {
        var searchString = $(this).val();
        instituteList.fuzzySearch(searchString);
        instituteList.search(searchString, ['card-blurb']);
    });
    $('#res-grp-clear').click(function () {
        /*Clear textarea using ID */
        $('#res-grp-search').val('');
        instituteList.search();
        instituteList.filter();
        /* Reset Dropdowns*/
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
            'card-blurb',
            'depts',
        ]
    }
    var opportunityList = new List('page-student-research-opportunities', opportunityOptions);
    // console.log(opportunityList.items);

    $('#student-opportunities-tax').change(function () {
        var selection = this.value;
        var stringSelection = String(selection);
        // console.log(stringSelection);
        if (selection != 'clear') {
            opportunityList.search(stringSelection, ['itemtaxonomy1']);
        } else {
            opportunityList.search();
        }

    })
    $('#student-opp-eligib-tax').change(function () {
        var selection = this.value;
        // console.log(selection);
        if (selection != 'clear') {
            opportunityList.search(selection, ['itemtaxonomy2']);
        } else {
            opportunityList.search();
        }

    })
    $('#student-opp-avail-tax').change(function () {
        var selection = this.value;
        // console.log(selection);
        if (selection != 'clear') {
            opportunityList.search(selection, ['itemtaxonomy3']);
        } else {
            opportunityList.search();
        }

    })
    $('#studentopportunities-department-select').change(function () {
        var selection = this.value;
        // console.log(selection);
        if (selection != 'clear') {
            opportunityList.search(selection, ['depts']);
        } else {
            opportunityList.search();
        }
    })
    $('#opportunity-search').on('keyup', function () {
        var searchString = $(this).val();
        opportunityList.fuzzySearch(searchString);
        // opportunityList.search(searchString, ['post-title']);
        // opportunityList.search(searchString, ['itemtaxonomy1']);
        // opportunityList.search(searchString, ['itemtaxonomy2']);
        // opportunityList.search(searchString, ['itemtaxonomy3']);
        // opportunityList.search(searchString, ['depts']);
        opportunityList.search(searchString, ['card-blurb']);
    });
    $('#opportunity-clear').click(function () {
        /*Clear textarea using class */
        $('#opportunity-search').val('');
        opportunityList.search();
        opportunityList.filter();
        /* Reset Degree type Dropdown*/
        $('.filter-select').prop('selectedIndex', 0);
    });
});


$(function () {
    //search js
    var supportOptions = {
        valueNames: [
            'post-title',
            'itemtaxonomy1',
            'itemtaxonomy2',
            'itemtaxonomy3',
            'card-blurb',
            'depts',
        ]
    }
    var supportList = new List('page-student-support', supportOptions);
    // console.log(supportList.items);
    $('#student-support-tax').change(function () {
        var selection = this.value;
        // console.log(selection);
        if (selection != 'clear') {
            supportList.search(selection, ['itemtaxonomy1']);
        } else {
            supportList.search();
        }

    })
    $('#student-supp-eligib-tax').change(function () {
        var selection = this.value;
        // console.log(selection);
        if (selection != 'clear') {
            supportList.search(selection, ['itemtaxonomy2']);
        } else {
            supportList.search();
        }

    })
    $('#student-supp-avail-tax').change(function () {
        var selection = this.value;
        // console.log(selection);
        if (selection != 'clear') {
            supportList.search(selection, ['itemtaxonomy3']);
        } else {
            supportList.search();
        }

    })
    $('#studentsupport-department-select').change(function () {
        var selection = this.value;
        // console.log(selection);
        if (selection != 'clear') {
            supportList.search(selection, ['depts']);
        } else {
            supportList.search();
        }

    })
    $('#support-search').on('keyup', function () {
        var searchString = $(this).val();
        supportList.fuzzySearch(searchString);
        supportList.search(searchString, ['card-blurb']);
    });
    $('#support-clear').click(function () {
        /*Clear textarea using class */
        $('#support-search').val('');
        supportList.search();
        supportList.filter();
        /* Reset Degree type Dropdown*/
        $('.filter-select').prop('selectedIndex', 0);
    });
});