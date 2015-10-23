/**
 * Created by jorgem on 2/10/2015.
 */

$(document).ready(function () {

    for (var i = 1; i < 8; i++) {
        var plan = "label[for=sisconee_appbundle_lecturadiariaservicio_plans_" + i + "]";
        var day = i;
        $(plan).text('Día: ' + day);
    }

    setDaysLabel();
    febraryMonth();
    longMonth();

/**
 * Set Day label
 */
$("#week_selected").change(function () {

    var selected_parententity_id = $('#parent_entities').val();
    var selected_service_id = $('#services').val();
    var selected_week = $("#week_selected").select().val();
    var selected_month = $("#month_selected").select().val();

    //window.location.assign(redirectTo+'/'+selected_parententity_id+'/'+selected_service_id+'/'+selected_month+'/'+selected_week);

    for (var s=1;s<=5;s++)
        if(s != selected_week)
            $('.week'+s).css('display','none');
        else
            $('.week'+s).css('display','block');

    setDaysLabel();

});
/**
 * Recargar la pagina cdo cambie el mes
 */
$("#month_selected").change(function () {
    var selected_parententity_id = $('#parent_entities').val();
    var selected_service_id = $('#services').val();
    var selected_month = $("#month_selected").select().val();

    window.location.assign(redirectTo+'/'+selected_parententity_id+'/'+selected_service_id+'/'+selected_month);
});
/**
 * Year Bisiesto
 *
 * @param year
 * @returns {boolean}
 */
function bisiesto(year) {
    if (
        ( year % 100 != 0)
        &&
        (
            (year % 4 == 0)
            ||
            (year % 400 == 0)
        )
    ) {
        return true;
    }
    else {
        return false;
    }
}
/**
 * Validate febrary month
 */
function febraryMonth() {
    var month_selected = $("#month_selected").select().val();

    if (month_selected == 2 && !bisiesto($('#sisconee_appbundle_lecturadiariaservicio_year').val())) {
        $("#week5").hide();
    } else {
        $("#week5").show();
    }

    setDaysLabel();
}

function setDaysLabel()
{
    var selected_week = $("#week_selected").select().val();

    if (selected_week == 1) {

        for (var i = 1; i <= 7; i++) {
            var plan = "label[for=sisconee_appbundle_lecturadiariaservicio_plans_" + i + "]";
            var day = i;
            $(plan).text('Día: ' + day);
        }
        showDays();
    }
    $iter = 1;
    if (selected_week == 2) {

        for (var i = 8; i <= 14; i++) {
            var plan = "label[for=sisconee_appbundle_lecturadiariaservicio_plans_" + /*$iter*/i + "]";
            var day = i;
            $(plan).text('Día: ' + day);
            $iter++;
        }
        showDays();
    }

    if (selected_week == 3) {

        for (var i = 15; i <= 21; i++) {
            var plan = "label[for=sisconee_appbundle_lecturadiariaservicio_plans_" + /*$iter*/ i+ "]";
            var day = i ;
            $(plan).text('Día: ' + day);
            $iter++;
        }
        showDays();
    }

    if (selected_week == 4) {

        for (var i = 22; i <= 28; i++) {
            var plan = "label[for=sisconee_appbundle_lecturadiariaservicio_plans_" +/* $iter*/ i + "]";
            var day = i ;
            $(plan).text('Día: ' + day);
            $iter++;
        }
        showDays();
    }



    if (selected_week == 5) {
        var end = (selected_week==2) && bisiesto($('#sisconee_appbundle_lecturadiariaservicio_year'))? 29:31;
        for (var i = 29; i <= end; i++) {
            var plan = "label[for=sisconee_appbundle_lecturadiariaservicio_plans_" + /*$iter*/ i + "]";
            var day = i ;
            $(plan).text('Dia: ' + day);
            $iter++;
        }
        //hideDays();
    }
}
/**
 * Validate 30 and 31 day in month
 */
function longMonth() {
    var month_selected = $("#month_selected").select().val();
    var week_select = $("#week_selected").select().val();

    if (month_selected == 4 || month_selected == 6 || month_selected == 9 || month_selected == 11) {
        if (week_select == 5) {
            $("#plan_day31").hide();
        } else {
            $("#plan_day31").show();
        }
    }
    if ((month_selected == 1 || month_selected == 3 || month_selected == 5 || month_selected == 7 || month_selected == 8 || month_selected == 10 || month_selected == 12)) {
        $("#plan_day31").show();
    }
    if(month_selected == 2)
    {
        $("#plan_day30").hide();
        $("#plan_day31").hide();
    }

}
/**
 * Hide 31 and highest day with subform
 */
function hideDays() {
    $("#plan_day4").hide();
    $("#plan_day5").hide();
    $("#plan_day6").hide();
    $("#plan_day7").hide();


}
/**
 * Show 31 and highest day with subform
 */
function showDays() {
    $("#plan_day4").show();
    $("#plan_day5").show();
    $("#plan_day6").show();
    $("#plan_day7").show();

}

/**
 * Set hidden values to month and services, into the form.
 */
$("#sisconee_appbundle_lecturadiariaservicio_save").click(function () {

    var selected_month = $("#month_selected").select().val();
    $("#sisconee_appbundle_lecturadiariaservicio_month").val(selected_month);

    var selected_service = $("#services").select().val();
    $("#sisconee_appbundle_lecturadiariaservicio_services").val(selected_service);

    var selected_week = $("#week_selected").select().val();
    $("#sisconee_appbundle_lecturadiariaservicio_week").val(selected_week);

    $("#form_plans_day").submit();

});


});









