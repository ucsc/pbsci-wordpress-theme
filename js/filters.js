// remove accents before searching text
function removeAccents(str) {
    var accents    = 'ÀÁÂÃÄÅàáâãäåÒÓÔÕÕÖØòóôõöøÈÉÊËèéêëðÇçÐÌÍÎÏìíîïÙÚÛÜùúûüÑñŠšŸÿýŽž';
    var accentsOut = "AAAAAAaaaaaaOOOOOOOooooooEEEEeeeeeCcDIIIIiiiiUUUUuuuuNnSsYyyZz";
    str = str.split('');
    var i, x;
    for (i = 0; i < str.length; i++) {
      if ((x = accents.indexOf(str[i])) != -1) {
        str[i] = accentsOut[x];
      }
    }
    return str.join('');
}

// remove returns and white space from beginning and end of string
function cleanString(string) {
    return string.replace(/\r?\n|\r/g, "").replace(/\s+/g, " ").trim();
}

// lowercase, replace ampersands and punctuation, hyphens between words
function machineString(string) {
    return string.toLowerCase().replace(/&amp;/g, '').replace(/(^\s+|[^a-zA-Z0-9 ]+|\s+$)/g,"").replace(/\s+/g, "-");
}

/**
 * Returns a function, that, as long as it continues to be invoked, will not
 * be triggered. The function will be called after it stops being called for
 * N milliseconds. If `immediate` is passed, trigger the function on the
 * leading edge, instead of the trailing.
 *
 * @link https://davidwalsh.name/javascript-debounce-function
 *
 * @param func
 * @param wait
 * @param immediate
 * @returns {Function}
 */
function debounce(func, wait, immediate) {
  var timeout;
  return function() {
    var context = this, args = arguments;
    var later = function() {
      timeout = null;
      if (!immediate) func.apply(context, args);
    };
    var callNow = immediate && !timeout;
    clearTimeout(timeout);
    timeout = setTimeout(later, wait);
    if (callNow) func.apply(context, args);
  };
}

// flatten object by concatting values
function concatValues( obj ) {
    var value = '';
    for ( var prop in obj ) {
      value += obj[ prop ];
    }
    return value;
}

// Add an isotope layout mode that lets us do our own grid css
Isotope.Item.prototype._create = function() {
    // assign id, used for original-order sorting
    this.id = this.layout.itemGUID++;
    // transition objects
    this._transn = {
      ingProperties: {},
      clean: {},
      onEnd: {}
    };
    this.sortData = {};
};
Isotope.Item.prototype.layoutPosition = function() {
    this.emitEvent( 'layout', [ this ] );
};
Isotope.prototype.arrange = function( opts ) {
    // set any options pass
    this.option( opts );
    this._getIsInstant();
    // just filter
    this.filteredItems = this._filter( this.items );
    // flag for initalized
    this._isLayoutInited = true;
};
// layout mode that does not position items
Isotope.LayoutMode.create('none');



(function($) {
  // initialize isotope with no filters
  var $rows = $('.query');
  $rows.isotope({ 
      filter: '*',
      layoutMode: 'none',
  });

  var filterState = {};

  /**
   * Read the values of the select box filters and store them within the
   * filterState object.
   */
  function populateFiltersFromForm() {
    $('.select-filter').each(function(i,el) {
      var group = $(el).data('filter-group');
      var value = $(el).val();
      if (value !== 'reset') {
        filterState[group] = value; 
      } else {
        filterState[group] = ''; 
      }
    });
  }

  /**
   * Read the location hash and update both the filterState and form with
   * values found.
   */
  function populateFiltersFromURL() {
    // check for a hash in the URL
    var query = decodeURI(window.location.hash);
    if (query.charAt(0) === "#") {
      query = query.substr(1);
    }

    if (query) {
      // split into key/value pairs
      var filterStrings = query.split("&");

      filterStrings.forEach(function(string) {
        // split each pair into key and value
        var parts = string.split("=");
        //check to make sure the key is something we care about
        if (parts[1] && filterState.hasOwnProperty(parts[0])) {
          filterState[parts[0]] = parts[1];
          $(".select-filter[data-filter-group='"+parts[0]+"']").val(parts[1]);
        }
      });
    }
  }

  /**
   * Create a string from the filterState values and update the browser's
   * hash value.
   */
  function updateURLfromFilters() {
    var newHash = [];

    Object.keys(filterState).forEach(function(filterGroup) {
      if (filterState[filterGroup]) {
        newHash.push(filterGroup + "=" + filterState[filterGroup]);
      }
    });
    // If there aren't any parameters on the URL, remove the "#"
    // if there are params, append to the URL
    if (newHash.length > 0) {
      window.location.hash = newHash.join("&");
    } else {
      history.pushState("", document.title, window.location.pathname
      + window.location.search);
    }
  }

  /**
   * Convert the filterState into a string of CSS selectors. Return
   * comma-separated list for "OR" filter, and combined selectors string for
   * "AND" filtering.
   *
   * Example:
   *  - OR: ".something, .something else"
   *  - AND: ".something.that-is-something-else"
   *
   * @returns {string}
   */
  function computedFiltersValue() {
    var filterValue = "";

    Object.keys(filterState).forEach(function(filterGroup) {
      if (filterState[filterGroup]) {
        filterValue += "." + filterGroup + "--" + filterState[filterGroup];
      }
    });

    // When no filters are selected, default to show everything.
    if (!filterValue) {
      filterValue = "*";
    }

    return filterValue; 
  }

  /**
   * Pass this function into isotope as the value for "filter" whenever we
   * need to trigger filtering occur.
   *
   * @link https://github.com/metafizzy/isotope/issues/709
   *
   * @returns boolean
   */
  function filterStrategy() {
    // Within context, "this" is an individual row.
    // We need to test that it matches both select box and search filters.
    var $item = $(this);
    var itemText = cleanString($item.text());
    itemText = removeAccents(itemText);
    var searchText = $("#filter-search").val();
    if (searchText) {
      searchText = removeAccents(searchText);
    } else {
      searchText = '';
    }
    var searchExpression = new RegExp( searchText, "gi");
    var matchesFilters = $item.is(computedFiltersValue());
    var matchesSearch = searchText.trim() ? !!itemText.match(searchExpression) : true;
    return matchesFilters && matchesSearch;
  }

  // run isotope with filters
  function refreshIsotope() {
    $rows.isotope({ 
      filter: filterStrategy,
    });
  }

  // wait until typing seems done before starting the search
  var debouncedFilterResults = debounce(function() {
    $rows.isotope({ 
      filter: filterStrategy,
    });
  }, 350);
 
  /*
   * Initialize the filtering form.
   */
  populateFiltersFromForm();
  populateFiltersFromURL();
  refreshIsotope();

  // start the debouncer when typing starts on the search field
  $('#filter-search').keydown(function(event) {
    debouncedFilterResults();
  });

  // make the filters pretty by using Select2 library
  $('.select-filter').select2({
    minimumResultsForSearch: Infinity,
  });

  // Show a message if there are no results for the selected filters
  $rows.on('arrangeComplete', function(event,filteredItems) {
    if( filteredItems.length == 0 ) {
        $('#no-filter-results').addClass('show');
    } else {
        $('#no-filter-results').removeClass('show');
    }
  });

  // Reset everything and run isotope again
  $('#filter-reset').on('click', function() {
    $('#filter-search').val('');
    $('.select-filter').each(function() {
      $(this).val(null).trigger('change');
    });
    refreshIsotope();
  });

  // when a new filter is selected, update url and filter state, rerun isotope
  $('.select-filter').on('change',function() {
    populateFiltersFromForm();
    updateURLfromFilters();
    refreshIsotope();
  });


})(jQuery)