$(function() {
    $('[operadora]').on('click', function() {
        var operadora = $(this).attr('operadora'),
            plan_limit = $('[plan-limit]').attr('plan-limit');
        if (typeof plan_limit === "undefined") plan_limit = 0;
        if ($('[operadora="' + operadora + '"]').hasClass('active')) {
            $('[operadora="' + operadora + '"]').removeClass('active');
            $('[operadora-input="' + operadora + '"]').prop('checked', false);
        } else {
            if ($('[operadora-input]:checked').length < plan_limit) {
                $('[operadora="' + operadora + '"]').addClass('active');
                $('[operadora-input="' + operadora + '"]').prop('checked', true);
            } else {
                $.notify({
                    title: '<strong>Ops..</strong>',
                    message: 'Você selecionou o número máximo de operadoras para este plano.'
                }, {
                    type: 'danger'
                });
            }
        }
    });

    /**
     * [solicitar-suporte]
     */
    $('[solicitar-suporte]').on('click', function() {
        var url = $('[solicitar-suporte-url]').attr('solicitar-suporte-url'),
            text = $('[solicitar-suporte-mensagem]').val();
        if (text.length > 0) {
            $('[contact-return]').html('<div class="alert alert-success">Mensagem enviada com sucesso.</div>');
            $('[solicitar-suporte-mensagem]').val('');
            window.open(url + text);
        } else {
            $('[contact-return]').html('<div class="alert alert-danger">Você deve preencher o campo <strong>Mensagem</strong>.</div>');
        }

    });
    /**
     * [suporte-close]
     */
    $('[suporte-close]').on('click', function() {
        $('[solicitar-suporte-mensagem]').val('');
        $('[contact-return]').html('');
    });
});