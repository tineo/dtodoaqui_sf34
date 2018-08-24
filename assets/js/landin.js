window.$ =  window.jQuery = require('jquery');
require('jquery-backstretch');

$(function () {
  $.backstretch([
     "/img/outside.jpg"
     , "/img/garfield-interior.jpg"
     , "/img/cheers.jpg"
   ], {duration: 3000, fade: 750});
});
