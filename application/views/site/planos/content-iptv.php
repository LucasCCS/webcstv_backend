<!-- /invl-plans -->
<section class="invl-plans" style="padding-bottom: 80px;">
    <div class="container">
        <div class="invl-plans-header text-right">
            <h2>Depósito Bancário</h2>
            <h3>Pagamento sem taxas extras.</h3>
        </div>
        <div class="invl-plans-payments mt-5">
            <ul class="invl-plans-payments-list">
                <li><img src="<?= base_url(); ?>public/images/caixa-icon.webp"></li>
                <li><img src="<?= base_url(); ?>public/images/bradesco-icon.png"></li>
                <li><img src="<?= base_url(); ?>public/images/santander-icon.png"></li>
                <li><img src="<?= base_url(); ?>public/images/bancobrasil-icon.png"></li>
                <li><img style="width: 60px;" src="<?= base_url(); ?>public/images/itau-icon.png"></li>
            </ul>
            PAGAMENTOS VIA DEPÓSITO OU TRANSFERÊNCIA BANCÁRIA:
ENTRAR EM CONTATO PELO WHATSAPP.
        </div>
    </div>
</section>
<!-- invl-plans -->
<section class="invl-plans-iptv">
    <div class="container">
        <div class="invl-plans-header text-left">
            <h2>Os melhores planos<br>em IPTV</h2>
            <h3>Teste gratuitamente!</h3>
        </div>
        <div class="tab-content" id="pills-tabContent">
            <div class="tab-pane fade show active" id="pills-iptv-plano-mes" role="tabpanel" aria-labelledby="pills-iptv-plano-mes-tab">
                <div class="invl-plans-list">   
                    <div class="row">
                        <?php
                        if (isset($planos_iptv)) :
                            foreach ($planos_iptv as $iptv) :
                        ?>
                        <div class="col-sm-12 col-md-6 col-lg-4">
                            <div class="invl-plans-list-item">
                                <div class="invl-plans-list-item-header">
                                    <h4><?= $iptv->titulo; ?></h4>
                                    <?php
                                    if (!empty($iptv->subtitulo)) {
                                        echo '<p>' . $iptv->subtitulo . '</p>';
                                    }
                                    ?> 
                                </div>
                                <div class="invl-plans-list-item-body">
                                    <div class="invl-plans-list-item-price">
                                        <span class="old-price">de R$ <?= $iptv->valor_antigo; ?></span>
                                        <div class="new-price">
                                            <?php
                                            $valor = explode(',', $iptv->valor);
                                            ?>
                                            <h4><?= $valor[0]; ?><span>,<?= $valor[1] ?></span></h4>
                                            <p>por <?php
                                                    switch ($iptv->periodicidade) {
                                                        case PERIODICIDADE_MENSAL:
                                                            echo 'mês';
                                                            break;
                                                        case PERIODICIDADE_TRIMESTRAL:
                                                            echo 'trimestre';
                                                            break;
                                                        case PERIODICIDADE_SEMESTRAL:
                                                            echo 'semestre';
                                                            break;
                                                    }
                                                    ?></p>
                                        </div>
                                    </div>
                                    <div class="invl-plans-list-item-action text-center">
                                        <a class="btn btn-info btn-plans btn-block" href="<?= base_url(); ?>cadastro" selectPlan="<?= $iptv->id_plano; ?>">Teste Grátis</a>
                                        <a class="btn btn-info btn-plans btn-block" href="#" data-toggle="modal" data-target="#plano-iptv-<?=$iptv->id_plano?>" selectPlan="<?= $iptv->id_plano; ?>">Comprar</a>
                                        <small class="text-muted mr-1 ml-1">Teste hoje mesmo, sem nenhum custo.</small>
                                    </div>
                                    <div class="invl-plans-list-item-features">
                                        <ul class="invl-plans-list-item-features-list">
                                            <?= $iptv->descricao; ?>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- modal - pagamento (loop) -->
                        <div class="modal mt-5" tabindex="-1" role="dialog" id="plano-iptv-<?= $iptv->id_plano ?>">
                            <div class="modal-dialog modal-lg" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <p class="modal-title">Checkout</p>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                    </button>
                                    </div>
                                    <div class="modal-body invl-modal-form">
                                        <div class="row" style="margin-bottom: -20px;">
                                            <div class="col-sm-12 col-md-12 col-lg-7">
                                                <div class="card">
                                                    <div class="card-header">
                                                        Detalhes da Compra
                                                    </div>
                                                    <div class="card-body p-2">
                                                        <table class="table">
                                                            <tbody>
                                                                <tr>
                                                                    <td>Plano:</td>
                                                                    <td><?= $this->cliente['titulo']; ?></td>
                                                                </tr>
                                                                <tr>
                                                                    <td>Duração:</td>
                                                                    <td><?= $iptv->dias; ?></td>
                                                                </tr>
                                                                <tr>
                                                                    <td>Valor Total:</td>
                                                                    <td>R$ <?= $iptv->valor; ?></td>
                                                                </tr>
                                                            </tbody>
                                                        </table>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-sm-12 col-md-12 col-lg-5">
                                                <div class="card">
                                                    <div class="card-header">
                                                        Formas de Pagamento
                                                    </div>
                                                    <div class="card-body p-2">

                                                        <div class="col-sm-12 col-md-12 col-lg-12">
                                                            <div class="invl-form-metodo-pagamento text-center">
                                                                <ul class="invl-form-metodo-pagamento-list">
                                                                    <?php
                                                                    if (isset($this->metodos_pagamento)) :
                                                                        
                                                                        foreach ($this->metodos_pagamento as $metodo_pagamento_key) :
                                                                        $codigo_produto = '';
                                                                    switch (strtolower($metodo_pagamento_key->titulo)) {
                                                                        case 'mercadopago':
                                                                            $codigo_produto = $iptv->mercadopago_codigo;
                                                                            break;
                                                                        case 'pagseguro':
                                                                            $codigo_produto = $iptv->pagseguro_codigo;
                                                                            break;
                                                                        case 'paypal':
                                                                            $codigo_produto = $iptv->paypal_codigo;
                                                                            break;
                                                                    }
                                                                    ?>
                                                                    <li>
                                                                        <?php
                                                                        if (strtolower($metodo_pagamento_key->titulo) == 'paypal') :
                                                                        ?>
                                                                        <form action="https://www.paypal.com/cgi-bin/webscr" method="post" target="_blank">
                                                                            <input type="hidden" name="cmd" value="_s-xclick">
                                                                            <input type="hidden" name="hosted_button_id" value="<?= $codigo_produto; ?>">
                                                                            <input type="image" src="<?= $metodo_pagamento_key->imagem_logo ?>" width="230" border="0" name="submit" alt="PayPal - A maneira fácil e segura de enviar pagamentos online!">
                                                                        </form>
                                                                        <?php else : ?>
                                                                        <a href="<?= $metodo_pagamento_key->checkout_url . $codigo_produto; ?>" target="_blank"><img class="img-fluid" src="<?= $metodo_pagamento_key->imagem_logo ?>"></a>
                                                                        <?php endif; ?>
                                                                    </li>
                                                                    <?php 
                                                                    endforeach;
                                                                    endif;
                                                                    ?>
                                                                </ul>
                                                            
                                                            </div>
                                                        </div>

                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <small>Selecione o método de pagamento desejado, você será enviado para a página de pagamento.</small>
                                    </div>
                                    
                                </div>
                            </div>
                        </div>
                        <?php endforeach;
                        endif; ?>
                    </div>
                </div>
            </div>
        </div>   
    </div>
</section>
<!-- /invl-plans -->