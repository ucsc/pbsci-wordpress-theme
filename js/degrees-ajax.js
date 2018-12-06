$ = jQuery;

var mafs = $("#ucsc-ajax-filter-search");
var mafsForm = mafs.find("form");

mafsForm.submit(function(e){
    e.preventDefault();

    console.log("form submitted");

    if(mafsForm.find("#search").val().length !== 0) {
        var search = mafsForm.find("#search").val();
    }
    if(mafsForm.find("#ba").val().length !== 0) {
        var ba = mafsForm.find("#ba").val();
    }
    if(mafsForm.find("#bs").val().length !== 0) {
        var bs = mafsForm.find("#bs").val();
    }
    if(mafsForm.find("#undergradminor").val().length !== 0) {
        var ugminor = mafsForm.find("#undergradminor").val();
    }
    if(mafsForm.find("#undergradhonors").val().length !== 0) {
        var ughonors = mafsForm.find("#undergradhonors").val();
    }
    if(mafsForm.find("#jointmajor").val().length !== 0) {
        var jointmajor = mafsForm.find("#jointmajor").val();
    }
    if(mafsForm.find("#ma").val().length !== 0) {
        var ma = mafsForm.find("#ma").val();
    }
    if(mafsForm.find("#ms").val().length !== 0) {
        var ms = mafsForm.find("#ms").val();
    }
    if(mafsForm.find("#gradminor").val().length !== 0) {
        var gradminor = mafsForm.find("#gradminor").val();
    }
    if(mafsForm.find("#gradhonors").val().length !== 0) {
        var gradhonors = mafsForm.find("#gradhonors").val();
    }
    if(mafsForm.find("#gradcert").val().length !== 0) {
        var gradcert = mafsForm.find("#gradcert").val();
    }
    if(mafsForm.find("#phd").val().length !== 0) {
        var phd = mafsForm.find("#phd").val();
    }

    var data = {
        action : "ucsc_ajax_filter_search",
        search : search,
        ba : ba,
        bs : bs,
        undergradminor : undergradminor,
        undergradhonors : undergradhonors,
        jointmajor : jointmajor,
        ma : ma,
        ms : ms,
        gradminor : gradminor,
        gradcert : gradcert,
        gradhonors : gradhonors,
        phd : phd,

    }

// we will add codes above this line later
});