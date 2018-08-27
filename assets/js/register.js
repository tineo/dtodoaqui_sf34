//var Dropzone = require("dropzone");
require("select2");
require("select2/dist/js/i18n/es");
require("parsleyjs");
require("jquery-cropper");
//require("dropzone");
import Dropzone from 'dropzone';

const axios = require('axios');
var toastr = require('toastr');


$.fn.select2.defaults.set('language', 'es');
$.fn.select2.defaults.set('theme', 'bootstrap');

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

$(document).ready(function() {


    function readURL(input) {

        if (input.files && input.files[0]) {
            var reader = new FileReader();

            reader.onload = function(e) {
                $('#blah').attr('src', e.target.result);
            }

            reader.readAsDataURL(input.files[0]);
        }
    }

    $("#imgInp").change(function() {
        readURL(this);
    });



  $('.js-example-basic-multiple').select2({
    //theme: "bootstrap",
    //containerCssClass: "form-control"
    //dropdownAutoWidth: true
  });



    var instance = $('#nombrecomercial').parsley();
    var instanceAt = $("#inputEmail").parsley();


    $("#ddpais").select2({
        placeholder: 'Pais',
        ajax: {
            url: '/ajax/countries',
            processResults: function (res) {
                //console.log(res)
                //console.log(JSON.parse(res))
                // Tranforms the top-level key of the response object from 'items' to 'results'
                let hashmap  = JSON.parse(res)
                let results = []
                Object.keys(hashmap).forEach(function(key) {
                    results.push({id : hashmap[key].id, text: hashmap[key].name, disabled: false})
                });

                //console.log(results);
                return {
                    results: results
                };
            }
        }
    });

    $('#ddpais').on('select2:select', function (e) {
        var data = e.params.data;
        //console.log(data);
        $("#ddciudad").prop("disabled", false).val(null).trigger('change.select2');
        $("#dddistrito").prop("disabled", true).val(null).trigger('change.select2');
    });

    $('#ddciudad').on('select2:select', function (e) {
        var data = e.params.data;
        //console.log(data);
        $("#dddistrito").prop("disabled", false).val(null).trigger('change.select2');
    });


    $("#ddciudad").select2({
        placeholder: 'Ciudad',
        disabled: true,
        ajax: {
            url: function (params) {
                return '/ajax/cities?c='+$("#ddpais").val();
            },
            //url: '/ajax/cities?c='+$("#ddpais").val(),
            processResults: function (res) {
                //console.log(res)
                //console.log(JSON.parse(res))
                // Tranforms the top-level key of the response object from 'items' to 'results'
                let hashmap  = JSON.parse(res)
                let results = []
                Object.keys(hashmap).forEach(function(key) {
                    results.push({id : hashmap[key].id, text: hashmap[key].name, disabled: false})
                });

                //console.log(results);
                return {
                    results: results
                };
            }
        }
    });

    $("#dddistrito").select2({
        placeholder: 'Distrito',
        disabled: true,
        ajax: {
            url: function (params) {
                return '/ajax/districts?c='+$("#ddciudad").val();
            },
            //url: '/ajax/districts?c='+$("#ddciudad").val(),
            processResults: function (res) {
                //console.log(res)
                //console.log(JSON.parse(res))
                // Tranforms the top-level key of the response object from 'items' to 'results'
                let hashmap  = JSON.parse(res)
                let results = []
                Object.keys(hashmap).forEach(function(key) {
                    results.push({id : hashmap[key].id, text: hashmap[key].name, disabled: false})
                });

                //console.log(results);
                return {
                    results: results
                };
            }
        }
    });


    /*axios.get('/ajax/countries')
        .then(function (response) {
            // handle success
            //console.log(response);
            console.log(response.data);
            $("#ddpais").select2({
                data: response.data,
                //theme: "bootstrap"
            });
        })
        .catch(function (error) {
            // handle error
            console.log(error);
        })
        .then(function () {
            // always executed
        });*/

    $( "#new-register" ).click(function( event ) {
        event.preventDefault();
        //console.log(instance.isValid());
        //console.log(instance);
        //console.log("At");
        //console.log(instanceAt.isValid());
        //console.log(instanceAt);
        //console.log($("#inputAddress").val());

        if(!instance.isValid()){
            $(instance.element).focus();
            toastr.error('Nombre incompleto', 'Nombre comercial')
        }
        else if($("#subcategorias").val().length < 1){
            $("#subcategorias").focus();
            toastr.error('Al menos elige una categoria', 'Subcategorias')
        }
        else if($("#ddpais").val() === null ){
            $("#ddpais").focus();
            toastr.error('Elige un pais', 'Pais')
        }
        else if($("#ddciudad").val() === null ){
            $("#ddciudad").focus();
            toastr.error('Elige una ciudad', 'Ciudad')
        }
        else if($("#dddistrito").val() === null ){
            $("#dddistrito").focus();
            toastr.error('Elige un distrito', 'Distrito')
        }
        else if($("#inputAddress").val() == "" ){
            $("#inputAddress").focus();
            toastr.error('La direccion no puede estar vacio', 'Dirección')
        }
        else if($("#inputPhone").val() == "" && !$("#inputPhone").parsley().isValid()){
            $("#inputPhone").focus();
            toastr.error('El numero no es valido', 'Telefono')
        }
        else if(!$("#inputEmail").parsley().isValid()){
            $("#inputEmail").focus();
            toastr.error('El email no es valido', 'Email')
        }
        else if(!$("#chk-open").prop('checked') && !$("#open-time").val()){
            $("#open-time").focus();
            toastr.error('Ingresar una hora', 'Hora de apertura')
        }
        else if(!$("#chk-open").prop('checked') && !$("#close-time").val()){
            $("#close-time").focus();
            toastr.error('Ingresar una hora', 'Hora de cierre')
        }
        /*else if($("#chk-open").prop('checked')){



        } */else {

            //console.log($("#chk-open").val());
            //console.log($("#chk-open").prop('checked'));
            //alert("todo es valido");
            var data = {
                nombrecomercial : $("#nombrecomercial").val(),
                subcategorias : $("#subcategorias").val(),
                ddpais : $("#ddpais").val(),
                ddciudad : $("#ddciudad").val(),
                dddistrito : $("#dddistrito").val(),
                inputAddress : $("#inputAddress").val(),
                inputPagweb : $("#inputPagweb").val(),
                inputPhone : $("#inputPhone").val(),
                inputEmail : $("#inputEmail").val(),
                close_time : $("#close-time").val(),
                open_time : $("#open-time").val(),
                lat : $("#lat").val(),
                lng : $("#lng").val(),
                chk_open : $("#chk-open").prop('checked')
            };
            console.log(data);
            axios.post('/ajax/newplace', data)
                .then(function (response) {
                    // handle success
                    console.log(response);
                    let ide = response.data;
                    window.location.href = "/e/"+ide;
                })
                .catch(function (error) {
                    // handle error
                    console.log(error);
                })
                .then(function () {
                    // always executed
                });

        }
        //data-parsley-trigger="change"
        //data-parsley-type-message="must be a valid email address"
        //console.log($("#subcategorias").val().length);
        //console.log($("#ddpais").val());
        //$( "<div>" )
        //    .append( "default " + event.type + " prevented" )
        //    .appendTo( "#demo" );
    });









    function positionDenied(){ }
    function revealPosition(){ }

    function handlePermission() {
        navigator.permissions.query({name:'geolocation'}).then(function(result) {
            if (result.state == 'granted') {
                report(result.state);
                //geoBtn.style.display = 'none';
            } else if (result.state == 'prompt') {
                report(result.state);
                //geoBtn.style.display = 'none';
                navigator.geolocation.getCurrentPosition(revealPosition,positionDenied);
            } else if (result.state == 'denied') {
                report(result.state);
                //geoBtn.style.display = 'inline';
            }
            result.onchange = function() {
                report(result.state);
            }
        });
    }

    function report(state) {
        //console.log('Permission ' + state);
    }

    handlePermission();



    var map;
    var marker;

    function initMap() {
        var uluru = {lat: -25.363, lng: 131.044};
        map = new google.maps.Map(document.getElementById('map'), {
            zoom: 15,
            center: uluru
        });

        return map;
    }



    $( document ).ready(function() {
        // Handler for .ready() called.

        navigator.geolocation.watchPosition(function(position) {
                //console.log("i'm tracking you!");
                //console.log(position);
                //setPosition(position);
            },
            function (error) {
                if (error.code == error.PERMISSION_DENIED)
                    console.log("you denied me :-(");
            });


        getLocation();

        initMap();



    });

    var x = document.getElementById("demo");
    function getLocation() {
        if (navigator.geolocation) {
            navigator.geolocation.getCurrentPosition(setPosition);
        } else {
            x.innerHTML = "Geolocation is not supported by this browser.";
            alert("Geolocation is not supported by this browser.")
        }
    }
    function showPosition(position) {
        x.innerHTML = "Latitude: " + position.coords.latitude +
            "<br>Longitude: " + position.coords.longitude;
    }

    function setPosition(position) {
        //console.log("position");
        //console.log(position);
        if(map === undefined){

            var punto = {lat: position.coords.latitude, lng:  position.coords.longitude};
            map = new google.maps.Map(document.getElementById('map'), {
                zoom: 15,
                center: punto
            });
            console.log(punto)
        }

        map.setCenter(
            new google.maps.LatLng(
                position.coords.latitude,
                position.coords.longitude ) );
        console.log(position.coords)
        $("#latlng").val(position.coords.latitude+","+position.coords.longitude);
        $("#lat").val(position.coords.latitude);
        $("#lng").val(position.coords.longitude);
    }



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