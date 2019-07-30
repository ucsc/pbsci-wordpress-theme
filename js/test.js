var data = JSON.parse($('#card-container').attr('data-degrees'));

console.log(data);

//Vue.js stuff here
( function() {
    new Vue({
     el: document.querySelector('#app'),
     template: "WP Vue Theme",
     mounted: function(){
      console.log("WP Vue Theme!");
    }
   });
   })();
