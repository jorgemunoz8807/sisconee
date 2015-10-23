$(document).ready(function () {
    /* $(".link-eliminar").click( function( event ) {
     alert('click delete');
     $("#link-popup-eliminar").attr("href", $(this).attr("data-url"));
     $("#text-descripcion-popup-eliminar").html($(this).attr("data-descripcion"));
     });*/

    $(document).on("click", ".link-eliminar", function () {
        $("#link-popup-eliminar").attr("href", $(this).attr("data-url"));
        $("#text-descripcion-popup-eliminar").html($(this).attr("data-descripcion"));
    });

    /*$("#planification-table-body").on("click", ".link-eliminar",  function() {
     $("#link-popup-eliminar").attr("href", $(this).attr("data-url"));
     $("#text-descripcion-popup-eliminar").html($(this).attr("data-descripcion"));
     });*/

    $("#admin-search-button").click(function () {
        $("#admin-search-form").submit();
    });

    $("#admin-page-list").change(function () {
        var url = $(this).attr('data-url');
        url = url.replace('ppage', $(this).val());

        window.location.href = url;
    });

    /*$("#planification-table").change()
     {
     alert("table change");
     }*/

    /* $( document ).ajaxComplete(function() {
     alert('ajax complete');
     $( ".log" ).text( "Triggered ajaxComplete handler." );
     });*/


    /**
     * Created by jorgem on 3/24/2015.
     */



    $.validator.addMethod("lettersSpecific", function (value, element) {
        return this.optional(element) || /^[a-z\sñÑáéíóú]+$/i.test(value);
    }, "Por favor, escribe sólo letras");

    $('#editPass-form').validate({
        rules: {
            'sisconee_appbundle_changepass[newPass][pass]': {required: true, ValidPassword: true}

        },
        messages: {
            'sisconee_appbundle_changepass[newPass][pass]': {
                required: "Este campo es obligatorio."
            },
            'sisconee_appbundle_changepass[oldPass]': {
                required: "Este campo es obligatorio."
            },
            'sisconee_appbundle_changepass[newPass][confirm]': {
                required: "Este campo es obligatorio."
            }
        }
    });


    $.validator.addMethod("ValidPassword", function (value, element) {
        return this.optional(element) || /(?=.*[A-Z])(?=.*[0-9])[#@£$-/:-?{-~!"^_`\[\]a-zA-Z0-9]{6,25}/i.test(value);
//            esta expresion regular requiere una al menos mayuscula y un numero
        /*
         Requires one upper and one number 6-25 chars
         Tom Dutton
         /(?=.*[A-Z])(?=.*[0-9])[#@£$-/:-?{-~!"^_`\[\]a-zA-Z0-9]{6,25}/g
         zFiw£@tJ2!D56pqdE8T#7&7ts // Pass %%%%%%A1 // Pass 1Password // Pass password234D3232332%$5454 // Pass aaaaa1 aaaaa1 AAAAAA…*/
    }, "Requiere entre 6 y 25 caracteres al menos una mayúscula y un número");

});