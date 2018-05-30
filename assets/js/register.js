//var Dropzone = require("dropzone");
require("select2");


$(document).ready(function() {
  $('.js-example-basic-multiple').select2({
    theme: "bootstrap",
    //containerCssClass: "form-control"
    //dropdownAutoWidth: true
  });
});
/*
Dropzone.autoDiscover = false;

Dropzone.options.dropzoneArea = {
  paramName: "file", // The name that will be used to transfer the file
  //maxFilesize: 1, // MB
  maxFiles: 1,
  accept: function(file, done) {
    if (file.name == "justinbieber.jpg") {
      done("Naha, you don't.");
    }
    else { done(); }
  }
};


$(function () {

  //$("#dropzone-area").dropzone({
  //    url: "/file/upload",
  //});


  //je récupère l'action où sera traité l'upload en PHP
  var _actionToDropZone = $("#dropzone-area").attr('action');

//je définis ma zone de drop grâce à l'ID de ma div citée plus haut.

  var myDropzone = new Dropzone("#dropzone-area", {
    url: _actionToDropZone,
    clickable:'#dropzone-area',
    dictDefaultMessage: "Arrastra imagenes aqui o hacer click para seleccionar imagenes a subir.",
    acceptedFiles: 'image/*',
    //addRemoveLinks: true,
  });

  myDropzone.on("addedfile", function(file) {
    //alert('nouveau fichier reçu');

    file.previewElement.addEventListener("click", function() {
      myDropzone.removeFile(file);
    });

    $(".dz-details").html("<span class='advice'>Haz click para reemplazar la imagen</span>");
  });
});
*/