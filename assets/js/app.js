window.$ =  window.jQuery = require('jquery');
require('tooltipster');
require('corejs-typeahead/dist/typeahead.bundle');

window.Tether = require('tether/dist/js/tether')
require('bootstrap')

var Bloodhound = require('corejs-typeahead/dist/bloodhound');
var toastr = require('toastr');




$(document).ready(function() {
  $('.tooltip').tooltipster({
    theme: 'tooltipster-borderless'
  });

  toastr.options = {
    "closeButton": false,
    "debug": false,
    "newestOnTop": false,
    "progressBar": false,
    "positionClass": "toast-bottom-left",
    "preventDuplicates": false,
    "onclick": null,
    "showDuration": "300",
    "hideDuration": "1000",
    "timeOut": "5000",
    "extendedTimeOut": "4000",
    "showEasing": "swing",
    "hideEasing": "linear",
    "showMethod": "fadeIn",
    "hideMethod": "fadeOut"
  };

  toastr.warning('Dtodoaqui Version Alpha')

  //$('select').select2();


  $('#btn-invitation').click(function (evt) {

    if($('#email-invitaion').val()!=""){
      alert('sending');
    }else{
      alert('gokuuuuu')
    }
  })

  var productsearcher = new Bloodhound({
    datumTokenizer: function(word) {
      return Bloodhound.tokenizers.whitespace(word.value);
    },
    queryTokenizer: Bloodhound.tokenizers.whitespace,
    remote: {
      wildcard: '%QUERY',
      url: "/keywords?q=%QUERY",
      filter: function(response) {
        return response;
      }
    }
  });

  // initialize the bloodhound suggestion engine
  productsearcher.initialize();

  // instantiate the typeahead UI
  /*$('.typeahead').typeahead(null, {
    displayKey: 'value',
    source: productsearcher.ttAdapter()
  });*/

  var substringMatcher = function(strs) {
    return function findMatches(q, cb) {
      var matches, substringRegex;

      // an array that will be populated with substring matches
      matches = [];

      // regex used to determine if a string contains the substring `q`
      substrRegex = new RegExp(q, 'i');

      // iterate through the pool of strings and for any string that
      // contains the substring `q`, add it to the `matches` array
      $.each(strs, function(i, str) {
        if (substrRegex.test(str)) {
          matches.push(str);
        }
      });

      cb(matches);
    };
  };

  var states = ['Alabama', 'Alaska', 'Arizona', 'Arkansas', 'California',
    'Colorado', 'Connecticut', 'Delaware', 'Florida', 'Georgia', 'Hawaii',
    'Idaho', 'Illinois', 'Indiana', 'Iowa', 'Kansas', 'Kentucky', 'Louisiana',
    'Maine', 'Maryland', 'Massachusetts', 'Michigan', 'Minnesota',
    'Mississippi', 'Missouri', 'Montana', 'Nebraska', 'Nevada', 'New Hampshire',
    'New Jersey', 'New Mexico', 'New York', 'North Carolina', 'North Dakota',
    'Ohio', 'Oklahoma', 'Oregon', 'Pennsylvania', 'Rhode Island',
    'South Carolina', 'South Dakota', 'Tennessee', 'Texas', 'Utah', 'Vermont',
    'Virginia', 'Washington', 'West Virginia', 'Wisconsin', 'Wyoming'
  ];

  $('#tt-what .typeahead').typeahead({
        hint: true,
        highlight: true,
        minLength: 1
      },
      {
        name: 'best-pictures',
        displayKey: 'text',
        source: productsearcher.ttAdapter()
      });

  $('#tt-where .typeahead').typeahead({
        hint: true,
        highlight: true,
        minLength: 1
      },
      {
        name: 'states',
        source: substringMatcher(states)
      });


  $("#button-box").click(function () {
    var foo1 = $('#what-box .typeahead.tt-input').val();
    var foo2 = $('#where-box .typeahead.tt-input').val();
    //console.log(foo1);
    //console.log(foo2);
  });

});