/**
 * Created by jorgem on 3/24/2015.
 */

$.validator.addMethod("ValidPassword", function (value, element) {
    return this.optional(element) || /(?=.*[A-Z])(?=.*[0-9])[#@£$-/:-?{-~!"^_`\[\]a-zA-Z0-9]{6,25}/i.test(value);
//            esta expresion regular requiere una al menos mayuscula y un numero
    /*

     Requires one upper and one number 6-25 chars

     Tom Dutton
     /(?=.*[A-Z])(?=.*[0-9])[#@£$-/:-?{-~!"^_`\[\]a-zA-Z0-9]{6,25}/g
     zFiw£@tJ2!D56pqdE8T#7&7ts // Pass %%%%%%A1 // Pass 1Password // Pass password234D3232332%$5454 // Pass aaaaa1 aaaaa1 AAAAAA…*/
}, "Su contraseña debe contener de entre 6 y 25 caracteres al menos una mayúscula y un número)");