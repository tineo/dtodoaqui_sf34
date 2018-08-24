var Dropzone = require("dropzone");

var map;
var marker;

function initMap(){

  var latitude = parseFloat($("#map_latitude").val());
  var longitude = parseFloat($("#map_longitude").val());

  console.log(latitude);
  console.log(longitude);

  var punto = {lat: latitude , lng: longitude };
  map = new google.maps.Map(document.getElementById('map'), {
    zoom: 16,
    center: punto,
    disableDefaultUI: true,
  });
  marker = new google.maps.Marker({
    position: punto,
    map: map
  })

  var boxText = document.createElement("div");
  boxText.style.cssText = "border: 1px solid black; margin-top: 8px; background: yellow; padding: 5px;";
  boxText.innerHTML = "City Hall, Sechelt<br>British Columbia<br>Canada";
  var myOptions = {
    content: boxText
    ,disableAutoPan: false
    ,maxWidth: 0
    ,pixelOffset: new google.maps.Size(-140, 0)
    ,zIndex: null
    ,boxStyle: {
      //background: "url('tipbox.gif') no-repeat"
      //,
      opacity: 0.75
      ,width: "280px"
    }
    ,closeBoxMargin: "10px 2px 2px 2px"
    ,closeBoxURL: "https://www.google.com/intl/en_us/mapfiles/close.gif"
    ,infoBoxClearance: new google.maps.Size(1, 1)
    ,isHidden: false
    ,pane: "floatPane"
    ,enableEventPropagation: false
  };
  google.maps.event.addListener(marker, "click", function (e) {
    ib.open(map, this);
  });
  var ib = new InfoBox(myOptions);
  ib.open(map, marker);

}

$( document ).ready(function() {
  // Handler for .ready() called.
  initMap();

  /*Dropzone.options.myAwesomeDropzone = {
    paramName: "file", // The name that will be used to transfer the file
    maxFilesize: 5, // MB
    accept: function(file, done) {
      if (file.name == "justinbieber.jpg") {
        done("Naha, you don't.");
      }
      else { done(); }
    },
    previewTemplate: $('#preview-template').html(),

    init: function() {
      alert("init")
      this.on("addedfile", function(file) { alert("Added file."); });
    }

  }*/

  var myDropzone = new Dropzone("div#droparea",
      { url: "/upload",
        maxFilesize: 2,
        autoProcessQueue: false,
        previewTemplate: document.getElementById("template-preview").innerHTML,
        previewsContainer: "#previewsContainer",
        init: function() {
          $('.progress-bar').hide();

          this.on("processing",function () {
            $('.progress-bar').show();
          });
          this.on("complete", function(file) {
            myDropzone.removeFile(file);
          });
          this.on("queuecomplete", function() {
            myDropzone.options.autoProcessQueue = false;

            setTimeout(function () {
              $('.progress-bar').fadeOut();
            },300);
          });
          this.on("addedfile", function(file) {

            console.log(file);
            console.log(file.size);
            if(file.size >= 2*1024*1024){
              alert(file.name);
            }
            //document.getElementById("dropzoner2").style.background = "none";
          });  //will remove background after file added
          /*var myDropzone = this;

          // First change the button to actually tell Dropzone to process the queue.
          this.element.querySelector("input[type=submit]").addEventListener("click", function(e) {
            // Make sure that the form isn't actually being sent.
            e.preventDefault();
            e.stopPropagation();
            myDropzone.processQueue();
          });*/

          // Listen to the sendingmultiple event. In this case, it's the sendingmultiple event instead
          // of the sending event because uploadMultiple is set to true.
          this.on("sendingmultiple", function() {
            // Gets triggered when the form is actually being sent.
            // Hide the success button or the complete form.

          });
          this.on("successmultiple", function(files, response) {
            // Gets triggered when the files have successfully been sent.
            // Redirect user or notify of success.
          });
          this.on("errormultiple", function(files, response) {
            // Gets triggered when there was an error sending the files.
            // Maybe show form again, and notify user of error
          });
          this.on("totaluploadprogress",function (uploadProgress, totalBytes, totalBytesSent) {
            console.log(uploadProgress);
            $('.progress-bar').show();
            $('.progress-bar').css({'width': uploadProgress+"%"})
            $('.progress-bar').attr("aria-valuenow", uploadProgress)
            /*if (a.previewElement) {
              var progressElement = file.previewElement.querySelector("[data-dz-uploadprogress]");
              progressElement.style.width = progress + "%";
              progressElement.querySelector(".progress-text").textContent = progress + "%";
            }*/
          });
        },

        dictFileTooBig: "Shown when the file is too big. {{filesize}} and {{maxFilesize}} will be replaced.",
      });


  $('#btn-upload').click(function () {
    //alert(222);
    myDropzone.options.autoProcessQueue = true;
    myDropzone.processQueue();
  });

  $('#droparea .media').click(function () {
    $("#droparea").trigger("click");
  });

});