/**
 * Created by celma on 18/02/2015.
 */

$(document).ready(function () {

    /**
     * Validating plans form
     */
    function escapeBrackets(text)
    {
        return text.replace('[', '\\[').replace(']','\\]');

    }

    $.validator.methods.smallerThan = function(value, element,param){
        var target = $( param );
        return (this.optional( element )|| parseInt(value) <= parseInt(target.val()));
    };

    var rules= {};
    var messages = {};
    for(var i=1; i<=fieldsCount; i++)
    {
        var planAttr = planFieldsCommonName+'['+i+']';
        var hpPlanAttr = hpPlanFieldsCommonName+'['+i+']';
        rules[planAttr] = {};
        rules[hpPlanAttr] = {};
        messages[planAttr] = {};
        messages[hpPlanAttr] = {};

        //validation constraints
        rules[planAttr]['min'] = 0;
        rules[planAttr]['max'] =  parseInt($('#remaining-plan').text());
        rules[hpPlanAttr]['min'] = 0;
        //var name = "sisconee_appbundle_planesmensuales\\[plans\\]\\[" + i + "\\]";
        //var planValue = parseInt($('input[name='+name+']').val());
        var name = escapeBrackets(planFieldsCommonName) +"\\[" + i + "\\]";
        rules[hpPlanAttr]['smallerThan'] =  'input[name='+name+']';

        //validation messages
        messages[planAttr]['min'] = messages[hpPlanAttr]['min'] = 'El plan debe ser positivo' ;
        messages[planAttr]['max'] =  'El plan no puede exceder el restante';
        messages[hpPlanAttr]['smallerThan'] =  'El plan del horario pico no puede exceder el general';
    }

    console.log(rules);
    console.log(messages);

    var planValidateConfig = {};
    planValidateConfig['rules']= rules;
    planValidateConfig['messages']=messages;

    $('#'+formId).validate(planValidateConfig);


//Actualizando la pagina al cambiar la entidad padre
    $("#parent_entities").change(
        function () {
            var self = $(this);
            var selected_parententity_id = self.val();

            window.location.assign(redirectTo + '/' + selected_parententity_id);
            //location.search = selected_parententity_id;

            //actualizar campo oculto servicio del formulario
            $('#sisconee_appbundle_plananualentidad_parent').val(selected_parententity_id);
        });

//Actualizando la pagina al cambiar el servicio
    $("#services").change(
        function () {

            var selected_parententity_id = $('#parent_entities').val();

            var self = $(this);
            var selected_service_id = self.val();

            window.location.assign(redirectTo + '/' + selected_parententity_id + '/' + selected_service_id);
        }
    );


});