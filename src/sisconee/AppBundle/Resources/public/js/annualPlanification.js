/**
 * Created by celma on 19/02/2015.
 */
$(document).ready(function () {

    /**
     * Validating plans form
     */

    //restricciones de validacion
    var constraints = {
    };
    constraints['min'] = 0;
    constraints['max']= parseInt($('#remaining-plan').text());

    //mensajes de validacion
    var constraintsMessages = {
    };

    constraintsMessages['min']= 'El plan debe ser positivo';
    constraintsMessages['max']= 'El plan no puede exceder del restante';

    var rules = {};
    rules[formPlanFieldName] = constraints;
    var messages = {};
    messages[formPlanFieldName] = constraintsMessages;

    var planValidateConfig = {};
    planValidateConfig['rules'] = rules;
    planValidateConfig['messages'] = messages;
    planValidateConfig['submitHandler'] =
        function (form, e) {
            e.preventDefault();
            addNewPlan(form);
            //return false;
        };

    $('#' + formId).validate(planValidateConfig);

    var table = document.getElementById('planification-table');
    var table_body = document.getElementById('planification-table-body');

    /**
     * Mostrar y ocultar formulario de creacion de planes
     */
    $(".addplan-btn").click(function () {

        var form = $("#addplan-form");
        form.toggleClass('myhidden');
        var addplan_btn = $('.addplan-btn');

        if (form.hasClass('myhidden'))
            setAddBtn(addplan_btn);
        else
            setHideBtn(addplan_btn);
    });

    function setAddBtn(addplan_btn) {
        var textspan = addplan_btn.children("#btntext");
        var imgspan = addplan_btn.children(".glyphicon");
        textspan.text(addplan_btn.data('textadd'));
        imgspan.addClass('glyphicon-plus-sign');
        imgspan.removeClass('glyphicon-minus-sign');
        //self.html('<span class="glyphicon glyphicon-plus-sign"></span>' + self.data('textclose'));
    }

    function setHideBtn(addplan_btn) {
        var textspan = addplan_btn.children("#btntext");
        var imgspan = addplan_btn.children(".glyphicon");
        textspan.text(addplan_btn.data('texthidd'));
        imgspan.addClass('glyphicon-minus-sign');
        imgspan.removeClass('glyphicon-plus-sign');
        //self.html('<span class="glyphicon glyphicon-minus-sign"></span>' + self.data('textopen'));
    }


    /* */
    /**
     * Obtener entidades o servicios subordinados a la entidad padre seleccionada, los planes asignados a ellos, el plan de referencia y el que resta por repartir.
     */
    $("#parent_entities").change(
        function () {
            var self = $(this);
            var selected_parententity_id = self.val();
            var selected_parententity_name = $(self.children("option:selected")[0]).text();

            $.ajax({
                url: loadDataUrl, //'{{path("plananualentidad_load_data")}}'

                type: 'GET',

                data: {
                    'id': selected_parententity_id
                },

                success: function (data) {
                    //getting data
                    var subentitiesData = data['subordinates'];
                    var annualplansData = data['annualPlans'];
                    var planData = data['plan'];
                    var remainingData = data['remaining'];

                    //updating subentities
                    var select = document.getElementsByClassName('subordinates')[0];
                    removeOptions(select);
                    for (var i = 0; i < subentitiesData.length; i++) {
                        var opt = document.createElement('option');
                        opt.value = subentitiesData[i].id;
                        opt.innerHTML = subentitiesData[i].entityName;
                        select.appendChild(opt);
                    }

                    //updating add-button
                    var addplan_btn = $('.addplan-btn');
                    if (subentitiesData.length > 0) {
                        $('.addplan-btn').removeClass('myhidden');
                        setAddBtn(addplan_btn);
                        $('#addplan-form').addClass('myhidden');
                    }
                    else {
                        $('#addplan-form').addClass('myhidden');
                        $('.addplan-btn').addClass('myhidden');
                        //setHideBtn(addplan_btn);
                    }

                    //updating plans list
                    removeRows(table_body);
                    for (var i = 0; i < annualplansData.length; i++) //adding plans
                    {
                        var entityName = annualplansData[i].entityName;
                        var plan = annualplansData[i].plan;
                        var options = annualplansData[i].options;

                        appendRow(table_body, [entityName, plan, options]);
                    }

                    //updating plans info
                    if (annualplansData.length == 0) {
                        //$('#info-plans-entity').html("No existen planes anuales creados para las entidades subordinadas a " + selected_parententity_name);
                        //$('#info-plans-service').html("No existen planes anuales creados para los servicios de " + selected_parententity_name);
                        $('#info-plans').html(emptyInfo + selected_parententity_name);
                    }
                    else {
                        /*$('#info-plans-entity').html("Planes anuales de las entidades subordinadas a " + selected_parententity_name);
                         $('#info-plans').html("Planes anuales de las entidades subordinadas a " + selected_parententity_name);
                         $('#info-plans-service').html("Planes anuales de los servicios de " + selected_parententity_name);*/
                        $('#info-plans').html(plansInfo + selected_parententity_name);
                    }

                    //updating reference and remaining plan label
                    var referencePlan = $('#reference-plan');
                    var remainingPlan = $('#remaining-plan');

                    if (planData == null) {
                        referencePlan.html("--no definido--");
                        referencePlan.css('color', 'red');
                        remainingPlan.html("-");
                        remainingPlan.css('color', 'red');
                    }
                    else {
                        referencePlan.html(planData);
                        referencePlan.css('color', '#333');
                        remainingPlan.html(remainingData);
                        remainingPlan.css('color', '#333');
                    }

                }
            });

            //actualizar campo oculto padre del formulario
            $('#sisconee_appbundle_plananualentidad_parent').val(selected_parententity_id);
            $('#sisconee_appbundle_plananualservicio_parent').val(selected_parententity_id);

        }
    );
    function removeOptions(select) {
        if (select.options != null) {
            var i;
            for (i = select.options.length - 1; i >= 0; i--)
                select.remove(i);
        }
    }

    function removeRows(table) {
        if (table != null) {
            if (table.rows != null) {
                var row;
                for (row = table.rows.length - 1; row >= 0; row--)
                    //table.remove(row);
                    table.deleteRow(row);
            }
        }
    }


    /**
     * Agregar un nueno plan
     */
        //$('.form_planification').submit(function (e) {
    function addNewPlan(form) {

        //var parentEntities = $('#parent_entities');
        //var selected_parententity_name = $(parentEntities.children("option:selected")[0]).text();
        //var $this = $('.form_planification');

        //e.preventDefault();

        //alert('addnewplan');

        postPlanificationForm(($(form)), function (response) {
            //getting data
            var success = response['success'];
            var errorDescription = response['errorDescription'];
            var responseData = response['responseData'];

            if (success) {
                var entity_name = responseData['entityName'];
                var plan = responseData['plan'];
                var options = responseData['options'];

                appendRow(table_body, [entity_name, plan, options]);

                //update subordinates combo
                $(".subordinates option").filter(function () {
                    return entity_name === $(this).text();
                }).remove();

                if ($('.subordinates option').length == 0) {
                    $('#addplan-form').addClass('myhidden');
                    $('.addplan-btn').addClass('myhidden');
                }

                // Substract plan from remaining
                var remainingPlan = $('#remaining-plan');
                var remainingPlanValue = remainingPlan.text() - plan;
                remainingPlan.text(remainingPlanValue);
            }
            else
                alert(errorDescription);
        });

        return false;
    }

    function postPlanificationForm($form, callback) {

        //Coger los datos del formulario
        var values = {};
        $.each($form.serializeArray(), function (i, field) {
            values[field.name] = field.value;
        });

        //llamado ajax al servidor
        $.ajax({
            type: $form.attr('method'),
            url: $form.attr('action'),
            data: values,
            /*data: {
             'parentEntityId' : parent_entity_id,
             'formData': values
             },*/
            success: function (data) {
                callback(data);
            }
        });
    }

    /**
     * Agregar una fila a una tabla
     */
    function appendRow(table_body, rowData) {
        var lastRow = $('<tr/>').appendTo(table_body/*.find('tbody:last')*/);
        $.each(rowData, function (colIndex, c) {
            lastRow.append($('<td/>').html(c));
        });

        return lastRow;
    }

    function setHeadRow(table_Head, headRowData) {
        var headRow = $('<tr/>').appendTo(table_Head/*.find('tbody:last')*/);
        $.each(headRowData, function (colIndex, c) {
            headRow.append($('<th/>').text(c));
        });

        return headRow;
    }

    $('.edit-plans').click(function (e) {
        var $self = $(this);
        e.preventDefault();
        // $self.css('background-color', 'red');
        $self.addClass("newClass");
    })
});

