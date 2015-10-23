/**
 * Created by celma on 03/02/2015.
 */
$(document).ready(function() {

    //$("label[for=cu1]"); //get element by for attribute
    var months = ['Enero', 'Febrero', 'Marzo', 'Abril', 'Mayo', 'Junio', 'Julio', 'Agosto', 'Septiembre', 'Octubre', 'Noviembre', 'Diciembre'];
    for(var i=1; i<=12; i++) {
        var plan = "label[for=sisconee_appbundle_planesmensuales_plans_"+i+"]";
        $(plan).text(months[i-1]);
    }
});
