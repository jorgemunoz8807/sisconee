/**
 * Created by celma on 04/03/2015.
 */
/**
 * Crear reglas de validacion para todos los campos de un formulario cuyos nombres tengan prefijos comunes
 * @param constraints restricciones de las reglas
 * @param constraintsMessages mensajes de validacion
 * @param commonFieldsNames prefijos comunes
 * @param count cantidad de campos
 * @returns {{}} json con las reglas de validacion de la forma:
 *      {
                rules: {},
                messages: {}
                }
 */
function createValidationRulesForAllCommonFields(constraints, constraintsMessages, commonFieldsNames, count)
{
    var rules = createJSON(constraints, commonFieldsNames, count);
    var messages = createJSON(constraintsMessages, commonFieldsNames, count);

    var planValidateConfig = {};
    planValidateConfig['rules']= rules;
    planValidateConfig['messages']=messages;

    return planValidateConfig;

}

function createJSON(values, commonFieldsNames, count) {

    var json = {};

    for (name in commonFieldsNames) {

        for (var i = 1; i <= count; i++) {

            var valuesClon = jQuery.extend({}, values);

            //var attr = 'sisconee_appbundle_planesmensuales[plans][' + i + ']';
            var attr = commonFieldsNames[name] + '[' + i + ']';
            json[attr] = valuesClon;
        }
    }

    return json;

}