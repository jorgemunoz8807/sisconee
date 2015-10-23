/**
 * Created by CelMa on 3/15/2015.
 */
$(document).ready(function () {
    $('#sisconee_appbundle_configuracion_periodoTrabajo').change(
        function(){
            var self = $(this);
            var selected_value = $(self.children("option:selected")[0]).val();

            $.ajax({
                url: getConfigurationUrl, 

                type: 'GET',

                data: {
                    'year': selected_value
                },

                success: function (data) {

                    $('#sisconee_appbundle_configuracion_plan').val(data['plan']);
                    var closeOpenBtn = $('#closeOpenConfig');

                    if (data['cerrado']==true)
                        closeOpenBtn.text("Abrir");
                    else
                        closeOpenBtn.text("Cerrar");

                }
            });
        }
    );

    /*$('form[name=sisconee_appbundle_configuracion]').submit(
        function(e){

            e.preventDefault();

            var self = $(this);
            var selection = $('#sisconee_appbundle_configuracion_periodoTrabajo');
            var selected_value = $(selection.children("option:selected")[0]).val();

            $.ajax({
                url: self.attr('action'),

                type: 'GET',

                data: {
                    'year': selected_value,
                    'plan':
                },

                success: function (data) {

                    $('#sisconee_appbundle_configuracion_plan').val(data['plan']);
                    var closeOpenBtn = $('#closeOpenConfig');

                    if (data['cerrado']==true)
                        closeOpenBtn.text("Abrir");
                    else
                        closeOpenBtn.text("Cerrar");

                }
            });
        }
    );*/

    $('#closeOpenConfig').click(
        function(e){

            e.preventDefault();

            var selection = $('#sisconee_appbundle_configuracion_periodoTrabajo');
            var selected_value = $(selection.children("option:selected")[0]).val();
            var self = $(this);

            if (self.text() == "Abrir")
                self.text("Cerrar");
            else
                self.text("Abrir");

            $.ajax({
                url: self.attr('href'),

                type: 'GET',

                data: {
                    'year': selected_value
                },
                success: function (data) {
                }
            });
        }
    );

});