$(document).ready(function()
{
    var table = document.getElementById('planification-table');
    var table_head = document.getElementById('planification-table-head');
    var table_body = document.getElementById('planification-table-body');

    /**
     * Mostrar y ocultar formulario de creacion de planes
     */
    $(".addplan-btn").click(function() {
        //$("#plansCreationForm").css('display','block');

        var self= $(this);
        var form = $("#addplan-form");
        var textspan = self.children("#btntext");
        var imgspan = self.children(".glyphicon");

        form.toggleClass('myhidden');

        if(form.hasClass('myhidden')) {
            //self.html('<span class="glyphicon glyphicon-plus-sign"></span>' + self.data('textclose'));
            textspan.text(self.data('textadd'));
            imgspan.removeClass('glyphicon-minus-sign');
            imgspan.addClass('glyphicon-plus-sign')
        }
        else{
            //self.html('<span class="glyphicon glyphicon-minus-sign"></span>' + self.data('textopen'));
            textspan.text(self.data('texthidd'));
            imgspan.removeClass('glyphicon-plus-sign');
            imgspan.addClass('glyphicon-minus-sign')
        }
    });

    /**
     * Obtener entidades subordinadas a la seleccionada y los planes anuales asignados a las mismas.
     */
    $("#parent_entities").change(
        function(){

            var self = $(this);
            var selected_parententity_id = self.val();
            var selected_parententity_name = $(self.children("option:selected")[0]).text();

            /*$('#info-empty-plans').html("No existen planes anuales creados para las entidades subordinadas a " + selected_parententity_name);
            $('#info-plans').html("Planes anuales de las entidades subordinadas a " + selected_parententity_name);*/

            $.ajax({
               url: loadDataUrl, //'{{path("plananualentidad_load_subentities")}}'

                type: 'GET',

                data: {
                    'id' : selected_parententity_id
                },

                success: function (data) {
                    //getting data
                    var subentitiesData = data['subentities'];
                    var annualplansData = data['annualPlans'];
                    var planData = data['plan'];
                    var remainingData = data['remaining'];

                    //updating subentities
                    var select = document.getElementsByClassName('sub_entities')[0];
                    removeOptions(select);
                    for (var i = 0; i<subentitiesData.length; i++){
                        var opt = document.createElement('option');
                        opt.value = subentitiesData[i].id;
                        opt.innerHTML = subentitiesData[i].entityName;
                        select.appendChild(opt);
                    }

                    if(subentitiesData.length>0) {
                        alert('show addicionar');
                        var textspan = self.children("#btntext");
                        var imgspan = self.children(".glyphicon");
                        textspan.text('HOLA');
                        imgspan.addClass('glyphicon-minus-sign');
                        imgspan.removeClass('glyphicon-plus-sign');
                        $('.addplan-btn').removeClass('myhidden');
                        $('#addplan-form').removeClass('myhidden');

                        //self.html('<span class="glyphicon glyphicon-plus-sign"></span>' + self.data('textclose'));

                            /*//self.html('<span class="glyphicon glyphicon-minus-sign"></span>' + self.data('textopen'));
                            textspan.text(self.data('texthidd'));
                            imgspan.removeClass('glyphicon-plus-sign');
                            imgspan.addClass('glyphicon-minus-sign')*/
                    }

                    //updating plans list and plans info
                    removeRows(table_body);
                    for(var i=0; i<annualplansData.length; i++) //adding plans
                    {
                        var entityName = annualplansData[i].entityName;
                        var plan = annualplansData[i].plan;
                        var options = annualplansData[i].options;

                        appendRow(table_body, [entityName, plan, options] );
                    }
                    if(annualplansData.length==0){ //if no plans remove table
                        /*table.parentNode.removeChild(table);
                        table = null;*/
                        $('#info-plans').html("No existen planes anuales creados para las entidades subordinadas a " + selected_parententity_name);
                    }
                    else
                        $('#info-plans').html("Planes anuales de las entidades subordinadas a " + selected_parententity_name);

                    //updating reference and remaining plan label
                    $('#reference-plan').html(planData);
                    $('#remaining-plan').html(remainingData);
                }
            });


            //actualizar campo oculto padre del formulario
            $('#sisconee_appbundle_plananualentidad_parent').val(selected_parententity_id);
        }

    );
    function removeOptions(select)
    {
        if(select.options != null) {
            var i;
            for (i = select.options.length - 1; i >= 0; i--)
                select.remove(i);
        }
    }

    function removeRows(table)
    {
        if(table!=null) {
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
    $('.form_planification').submit(function(e)
    {
        var parentEntities = $('#parent_entities');
        var selected_parententity_name = $(parentEntities.children("option:selected")[0]).text();

        e.preventDefault();

        postPlanificationForm( $(this), function(response)
        {
            //getting data
            var success = response['success'];
            var errorDescription = response['errorDescription'];
            var responseData = response['responseData'];

            if(success){
            var entity_name = responseData['entityName'];
            var plan = responseData['plan'];
            var options = responseData['options'];

            appendRow(table_body, [entity_name, plan, options]);

            //update subentities combo
            $(".sub_entities option").filter(function(){
                return entity_name === $(this).text();
            }).remove();

            if($('.sub_entities option').length == 0){
                $('#addplan-form').addClass('myhidden');
                $('.addplan-btn').addClass('myhidden');
            }

            }
            else
                alert(errorDescription);
        });

        return false;
    });

    function postPlanificationForm( $form, callback){

        //Coger los datos del formulario
        var values = {};
        $.each( $form.serializeArray(), function(i, field) {
            values[field.name] = field.value;
        });

        /*//Coger la entidad padre
         var parent_entity_id = $('select[name=select_parent_entities]').val(); //$(document.getElementById('#parent_entities'));*/

        //llamado ajax al servidor
        $.ajax({
            type        : $form.attr( 'method' ),
            url         : $form.attr( 'action' ),
            data        : values,
            /*data: {
             'parentEntityId' : parent_entity_id,
             'formData': values
             },*/
            success     : function(data) {
                callback(data);
            }
        });
    }

    /**
     * Crea una nueva tabla para listar los planes y la guarda globalmente
     */
    function assignNewTable()
    {
        table_head = document.createElement('thead');
        table_head.setAttribute('id','planification-table-head');
        setHeadRow(table_head, ['Entidad', 'Plan', 'Acciones']);

        table_body = document.createElement('tbody');
        table_body.setAttribute('id','planification-table-body');

        table = document.createElement('table');
        table.setAttribute('class','table table-striped table-bordered table-hover');
        table.setAttribute('id','planification-table');
        table.appendChild(table_head);
        table.appendChild(table_body);
    }

    /**
     * Agregar una fila a una tabla
     */
    function appendRow(table_body, rowData) {
        var lastRow = $('<tr/>').appendTo(table_body/*.find('tbody:last')*/);
        $.each(rowData, function(colIndex, c) {
            lastRow.append($('<td/>').html(c));
        });

        return lastRow;
    }

    function setHeadRow(table_Head, headRowData)
    {
        var headRow = $('<tr/>').appendTo(table_Head/*.find('tbody:last')*/);
        $.each(headRowData, function(colIndex, c) {
            headRow.append($('<th/>').text(c));
        });

        return headRow;
    }

    $('.edit-plans').click(function(e){
        var $self = $(this);
        e.preventDefault();
       // $self.css('background-color', 'red');
        $self.addClass("newClass");
    })

    //$(".form_planification").submit(

    /*$(".add-plan-btn").click(
        function()
        {
            //coger los datos del formulario
            //alert('sub form');

            var newanualplan_entityid = $(document.getElementById('sisconee_appbundle_plananualentidad_entidad')).val();
            var newanualplan_plan = $(document.getElementById('sisconee_appbundle_plananualentidad_plan')).val();
            var last_remaining = $(document.getElementById('remaining-plan')).text();
            //alert('last_remaining'+' '+last_remaining);
            var table_body = document.getElementById('planification-table-body');

            var current_remaining = last_remaining - newanualplan_plan;
            *//*var self = $(this);
            var selected_entity_id = self.val();
            var selected_entity_name = $(self.children("option:selected")[0]).text();*//*

           // var entity = document.sisconee_appbundle_plananualentidad.sisconee_appbundle_plananualentidad_entidad.value();


            //alert(entity_id);

            $.ajax({
                url: formSubmit, //'{{path("plananualentidad_create")}}'

                type: 'GET',

                data: {
                    'entityid' : newanualplan_entityid,
                    'plan':newanualplan_plan
                },

                success: function () {
                    *//*alert('name' + data['name']);
                     alert('plan' + data['plan']);
                     alert('dif' + current_remaining);*//*

                    alert(table_body);
                    var row = document.createElement("tr");
                    var cellEnt = document.createElement("td");
                    cellEnt.appendChild(document.createTextNode(newanualplan_entityid));
                    var cellPlan = document.createElement("td");
                    cellPlan.appendChild(document.createTextNode(newanualplan_plan));
                    var cellOp = document.createElement("td");
                    cellOp.appendChild(document.createTextNode('ops'));
                    row.appendChild(cellEnt);
                    row.appendChild(cellPlan);
                    row.appendChild(cellOp);
                    table_body.appendChild(row);
                }
            });
        }
    );*/



});

