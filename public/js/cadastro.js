$(function() {
    $(document).on("contextmenu", function() {
        return false;
    });
    checkSelectedPlan();
    // ----------------------------------------------selectPlan---------------------------------------------
    $('[selectPlan]').on('click', function() {
        var planId = $(this).attr('selectPlan'),
            planPeriodo = $(this).attr('selectPlanPer');
        $('[name="id_plano"]').val(planId);
        $('[name="id_subplano"]').val(planPeriodo);
        var data = { id_plano: planId, id_subplano: planPeriodo };
        sessionStorage.setItem('plan', JSON.stringify(data));
        $('#cplanosModal').modal('hide');
    });
    // ----------------------------------------------checkSelectedPlan---------------------------------------------
    function checkSelectedPlan() {
        var plan = JSON.parse(sessionStorage.getItem('plan'));
        if (plan == undefined) {
            $('#cplanosModal').modal('show');
        } else {
            if (typeof plan.id_plano != undefined) {
                $('[name="id_plano"]').val(plan.id_plano);
            }
            if (typeof plan.id_subplano != undefined) {
                $('[name="id_subplano"]').val(plan.id_subplano);
            }
        }
    }
    // ----------------------------------------------encriptyIframe---------------------------------------------
    encriptyIframe();

    function encriptyIframe() {
        var param = $('[iframe-teste]').attr('iframe-teste');
        $.ajax({
            type: 'GET',
            url: 'http://localhost/inovlab/workana/webcstv_backend/gerador/teste/' + param,
            success: function(r) {
                $('[iframe-teste]').html(r.template);
                console.log(r);
            }
        });
    }
})