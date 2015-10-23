$(document).ready(function()
{

var table =document.getElementById('planification-table');
var table_head =document.getElementById('planification-table-head');
var table_body =document.getElementById('planification-table-body');

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
     * Obtener servicios de la entidad seleccionada y los planes anuales de esa entidad
     */
    $("#parent_entities").change(
        function(){

            var self = $(this);
            var selected_entity_id = self.val();
            var selected_entity_name = $(self.children("option:selected")[0]).text();

            $('#info-empty-plans').html("No existen planes anuales creados para los servicios de la entidad " + selected_entity_name);
            $('#info-plans').html("Planes anuales de los servicios de la entidad " + selected_entity_name);

            $.ajax({
                url: urlServices, //'{{path("plananualentidad_load_subentities")}}'

                type: 'GET',

                data: {
                    'id' : selected_entity_id
                },

                success: function (data) {
                var servicesData=data['servicesData'];
                 var plansData=data['plansData'];
                    var ops=data['actions'];
                    var planData = data['plan'];
                    var remainingData = data['remaining'];

                    //updating services
                    var select = document.getElementsByClassName('services')[0];
                    //var select = $( ".sub_entities" );
                    //var select = document.getElementById('sisconee_appbundle_plananualentidad_entidad');

                    removeOptions(select);
                    for (var i = 0; i<servicesData.length; i++){
                        var opt = document.createElement('option');
                        opt.value = servicesData[i].id;
                        opt.innerHTML = servicesData[i].name;
                        select.appendChild(opt);
                    }
                    //updating table plans
                    removeRows(table_body);
                    for (var i = 0; i<plansData.length; i++){

                        var serviceName=plansData[i].serviceName;
                        var servicePlan=plansData[i].plan;
                        appendTableRow(table_body,[serviceName,servicePlan,ops]);
                    }

                    //updating reference and remaining plan label
                    $('#reference-plan').html(planData);
                    $('#remaining-plan').html(remainingData);
                }
            });


            //actualizar campo oculto padre del formulario
            $('#sisconee_appbundle_plananualservicio_parent').val(selected_entity_id);
        }

    );

    function removeRows(table){
        if(table!=null){
            if(table.rows !=null){

                var row;
                for(row=table.rows.length-1; row>=0; row--)
                table.deleteRow(row);
            }
        }
    }

    function removeOptions(select)
    {
        if(select.options != null) {
            var i;
            for (i = select.options.length - 1; i >= 0; i--)
                select.remove(i);
        }
    }

    /**
     * Agregar un nueno plan
     */
    $('.form_planification').submit(function(e)
    {
        var table_body = document.getElementById('planification-table-body');

        e.preventDefault();

        postPlanificationForm( $(this), function(response)
        {

            if(response != 'no valid'){
            var service_name = response['serviceName'];
            var plan = response['plan'];
            var actions = response['actions'];

           /* //    variables para la columna de operaciones----------------------------------------------------------------------------------------------------------------
            var editUrl = "/sisconee/web/app_dev.php/plananualservicio/"+id+"/edit";
            var editoption="<a href="+editUrl+"\><span class=\"glyphicon glyphicon-pencil\"></span>Editar</a>" ;
            var deleteUrl = "/sisconee/web/app_dev.php/plananualservicio/"+id+"/delete";

                //descripcion del servicio o nombre del mismo del q se va a eliminar
                var datadescription = service_name;
            var datatoggle="modal";
            var datatarget= "\"#modal-delete\"";
            var spanclass="\"glyphicon glyphicon-trash\"";
            var deleteoption=" <a class=\"link-eliminar\" href=\"javascript:void(0);\" data-url="+deleteUrl+" data-descripcion="+datadescription+" data-toggle="+datatoggle+" data-target="+datatarget+"><span class="+spanclass+"\></span>Eliminar</a>";
            //----------------------------------------------------------------------------------------------------------------------------------------------------------*/
            //alert("hola");
            appendTableRow(table_body, [service_name, plan, actions]);}
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
     * Agregar una fila a una tabla
     */
    function appendTableRow(table, rowData) {
        var lastRow = $('<tr/>').appendTo(table/*.find('tbody:last')*/);
        $.each(rowData, function(colIndex, c) {
            lastRow.append($('<td/>').html(c));
        });

        return lastRow;
    }


});

