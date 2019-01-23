<!-- invl-plans -->
<section class="invl-plans">
    <div class="container">
        <div class="invl-plans-header text-right">
            <h2>Os melhores planos<br>em CardSharing</h2>
            <h3>Teste gratuitamente!</h3>
        </div>
        <div class="row justify-content-center">
           <div class="col-sm-12 col-md-12 col-lg-6">
                <div class="invl-plans-nav">
                    <ul class="invl-plans-nav-list nav nav-pills mb-3" id="pills-tab" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link active" id="pills-plano-mes-tab" data-toggle="pill" href="#pills-plano-mes" role="tab" aria-controls="pills-plano-mes" aria-selected="true">Plano Mensal</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="pills-plano-trimestral-tab" data-toggle="pill" href="#pills-plano-trimestral" role="tab" aria-controls="pills-plano-trimestral" aria-selected="false">Plano Trimestral</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="pills-plano-semestral-tab" data-toggle="pill" href="#pills-plano-semestral" role="tab" aria-controls="pills-plano-semestral" aria-selected="false">Plano Semestral</a>
                        </li>
                    </ul>
                </div>
           </div>
        </div>
        <div class="tab-content" id="pills-tabContent">
            <div class="tab-pane fade show active" id="pills-plano-mes" role="tabpanel" aria-labelledby="pills-plano-mes-tab">
                <div class="invl-plans-list">   
                    <div class="row">
                        <?php
                            if(isset($planos_cs_mensal)):
                                foreach($planos_cs_mensal as $cs_mensal):
                        ?>
                        <div class="col-sm-12 col-md-6 col-lg-3"  
                        <?php
                            if($cs_mensal->status == PLANO_STATUS_DESATIVO) {
                                echo 'style="opacity: .8;"';
                            }
                        ?>>
                            <div class="invl-plans-list-item">
                                <div class="invl-plans-list-item-header">
                                    <h4><?=$cs_mensal->titulo;?></h4>
                                    <?php
                                        if(!empty($cs_mensal->subtitulo)) {
                                            echo '<p>'.$cs_mensal->subtitulo.'</p>';
                                        }
                                    ?> 
                                </div>
                                <div class="invl-plans-list-item-body">
                                    <div class="invl-plans-list-item-price">
                                        <span class="old-price">de R$ <?=$cs_mensal->valor_antigo;?></span>
                                        <div class="new-price">
                                            <?php
                                                $valor = explode(',',$cs_mensal->valor); 
                                            ?>
                                            <h4><?=$valor[0];?><span>,<?=$valor[1]?></span></h4>
                                            <p>por mês</p>
                                        </div>
                                    </div>
                                    <div class="invl-plans-list-item-action text-center">
                                        <?php if($cs_mensal->status == PLANO_STATUS_DESATIVO): ?>
                                        <a class="btn btn-primary btn-plans btn-block" href="#">Indisponível</a>
                                        <?php else: ?>
                                        <a class="btn btn-primary btn-plans btn-block" href="<?=base_url();?>cadastro" selectPlan="<?=$cs_mensal->id_plano;?>">Teste Grátis</a>
                                        <a class="btn btn-primary btn-plans btn-block" href="#" data-toggle="modal" data-target="#plano-cs-mensal-<?= $cs_mensal->id_plano ?>" selectPlan="<?=$cs_mensal->id_plano;?>">Comprar</a>
                                        <?php endif; ?>
                                        <small class="text-muted mr-1 ml-1">Teste hoje mesmo, sem nenhum custo.</small>
                                    </div>
                                    <div class="invl-plans-list-item-features">
                                        <ul class="invl-plans-list-item-features-list">
                                            <?=$cs_mensal->descricao;?>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- modal - pagamento (loop) -->
                        <div class="modal mt-5" tabindex="-1" role="dialog" id="plano-cs-mensal-<?= $cs_mensal->id_plano ?>">
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
                                                                    <td><?=$cs_mensal->titulo;?></td>
                                                                </tr>
                                                                <tr>
                                                                    <td>Duração:</td>
                                                                    <td><?=$cs_mensal->dias;?></td>
                                                                </tr>
                                                                <tr>
                                                                    <td>Valor Total:</td>
                                                                    <td>R$ <?=$cs_mensal->valor;?></td>
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
                                                                            $codigo_produto = $cs_mensal->mercadopago_codigo;
                                                                            break;
                                                                        case 'pagseguro':
                                                                            $codigo_produto = $cs_mensal->pagseguro_codigo;
                                                                            break;
                                                                        case 'paypal':
                                                                            $codigo_produto = $cs_mensal->paypal_codigo;
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
                        <?php endforeach; endif; ?>
                    </div>
                </div>
            </div>
            <div class="tab-pane fade" id="pills-plano-trimestral" role="tabpanel" aria-labelledby="pills-plano-trimestral-tab">
                <div class="invl-plans-list">   
                    <div class="row">
                        <?php
                            if(isset($planos_cs_trimestral)):
                                foreach($planos_cs_trimestral as $cs_trimestral):
                        ?>
                        <div class="col-sm-12 col-md-6 col-lg-3" 
                        <?php
                            if($cs_trimestral->status == PLANO_STATUS_DESATIVO) {
                                echo 'style="opacity: .8;"';
                            }
                        ?>
                        >
                            <div class="invl-plans-list-item">
                                <div class="invl-plans-list-item-header">
                                    <h4><?=$cs_trimestral->titulo;?></h4>
                                    <?php
                                        if(!empty($cs_trimestral->subtitulo)) {
                                            echo '<p>'.$cs_trimestral->subtitulo.'</p>';
                                        }
                                    ?> 
                                </div>
                                <div class="invl-plans-list-item-body">
                                    <div class="invl-plans-list-item-price">
                                        <span class="old-price">de R$ <?=$cs_trimestral->valor_antigo;?></span>
                                        <div class="new-price">
                                            <?php
                                                $valor = explode(',',$cs_trimestral->valor); 
                                            ?>
                                            <h4><?=$valor[0];?><span>,<?=$valor[1]?></span></h4>
                                            <p>por trimestre</p>
                                        </div>
                                    </div>
                                    <div class="invl-plans-list-item-action text-center">
                                        <?php if($cs_trimestral->status == PLANO_STATUS_DESATIVO): ?>
                                        <a class="btn btn-primary btn-plans btn-block" href="#">Indisponível</a>
                                        <?php else: ?>
                                        <a class="btn btn-primary btn-plans btn-block" href="<?=base_url();?>cadastro" selectPlan="<?=$cs_trimestral->id_plano;?>" selectPlanPer="<?=$cs_trimestral->id_sub_plano;?>">Teste Grátis</a>
                                        <a class="btn btn-primary btn-plans btn-block" href="#" data-toggle="modal" data-target="#plano-cs-<?= $cs_trimestral->id_sub_plano ?>" selectPlan="<?=$cs_trimestral->id_sub_plano;?>">Comprar</a>
                                        <?php endif; ?>
                                        <small class="text-muted mr-1 ml-1">Teste hoje mesmo, sem nenhum custo.</small>
                                    </div>
                                    <div class="invl-plans-list-item-features">
                                        <ul class="invl-plans-list-item-features-list">
                                            <?=$cs_trimestral->descricao;?>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- modal - pagamento (loop) -->
                        <div class="modal mt-5" tabindex="-1" role="dialog" id="plano-cs-<?= $cs_trimestral->id_sub_plano ?>">
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
                                                                    <td><?=$cs_trimestral->titulo;?></td>
                                                                </tr>
                                                                <tr>
                                                                    <td>Duração:</td>
                                                                    <td><?=$cs_trimestral->dias;?></td>
                                                                </tr>
                                                                <tr>
                                                                    <td>Valor Total:</td>
                                                                    <td>R$ <?=$cs_trimestral->valor;?></td>
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
                                                                            $codigo_produto = $cs_trimestral->mercadopago_codigo;
                                                                            break;
                                                                        case 'pagseguro':
                                                                            $codigo_produto = $cs_trimestral->pagseguro_codigo;
                                                                            break;
                                                                        case 'paypal':
                                                                            $codigo_produto = $cs_trimestral->paypal_codigo;
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
                        <?php endforeach; endif; ?>
                    </div>
                </div>
            </div>
            <div class="tab-pane fade" id="pills-plano-semestral" role="tabpanel" aria-labelledby="pills-plano-semestral-tab">
                <div class="invl-plans-list">   
                    <div class="row">
                        <?php
                            if(isset($planos_cs_semestral)):
                                foreach($planos_cs_semestral as $cs_semestral):
                        ?>
                        <div class="col-sm-12 col-md-6 col-lg-3" 
                        <?php
                            if($cs_semestral->status == PLANO_STATUS_DESATIVO) {
                                echo 'style="opacity: .8;"';
                            }
                        ?>
                        >
                            <div class="invl-plans-list-item">
                                <div class="invl-plans-list-item-header">
                                    <h4><?=$cs_semestral->titulo;?></h4>
                                    <?php
                                        if(!empty($cs_semestral->subtitulo)) {
                                            echo '<p>'.$cs_semestral->subtitulo.'</p>';
                                        }
                                    ?> 
                                </div>
                                <div class="invl-plans-list-item-body">
                                    <div class="invl-plans-list-item-price">
                                        <span class="old-price">de R$ <?=$cs_semestral->valor_antigo;?></span>
                                        <div class="new-price">
                                            <?php
                                                $valor = explode(',',$cs_semestral->valor); 
                                            ?>
                                            <h4><?=$valor[0];?><span>,<?=$valor[1]?></span></h4>
                                            <p>por semestre</p>
                                        </div>
                                    </div>
                                    <div class="invl-plans-list-item-action text-center">
                                        <?php if($cs_semestral->status == PLANO_STATUS_DESATIVO): ?>
                                        <a class="btn btn-primary btn-plans btn-block" href="#">Indisponível</a>
                                        <?php else: ?>
                                        <a class="btn btn-primary btn-plans btn-block" href="<?=base_url();?>cadastro" selectPlan="<?=$cs_semestral->id_plano;?>" selectPlanPer="<?=$cs_semestral->id_sub_plano;?>">Teste Grátis</a>
                                        <a class="btn btn-primary btn-plans btn-block" href="#" data-toggle="modal" data-target="#plano-cs-<?= $cs_semestral->id_sub_plano ?>" selectPlan="<?=$cs_semestral->id_sub_plano;?>">Comprar</a>
                                        <?php endif; ?>
                                        <small class="text-muted mr-1 ml-1">Teste hoje mesmo, sem nenhum custo.</small>
                                    </div>
                                    <div class="invl-plans-list-item-features">
                                        <ul class="invl-plans-list-item-features-list">
                                            <?=$cs_semestral->descricao;?>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- modal - pagamento (loop) -->
                        <div class="modal mt-5" tabindex="-1" role="dialog" id="plano-cs-<?= $cs_semestral->id_sub_plano ?>">
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
                                                                    <td><?=$cs_semestral->titulo;?></td>
                                                                </tr>
                                                                <tr>
                                                                    <td>Duração:</td>
                                                                    <td><?=$cs_semestral->dias;?></td>
                                                                </tr>
                                                                <tr>
                                                                    <td>Valor Total:</td>
                                                                    <td>R$ <?=$cs_semestral->valor;?></td>
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
                                                                            $codigo_produto = $cs_semestral->mercadopago_codigo;
                                                                            break;
                                                                        case 'pagseguro':
                                                                            $codigo_produto = $cs_semestral->pagseguro_codigo;
                                                                            break;
                                                                        case 'paypal':
                                                                            $codigo_produto = $cs_semestral->paypal_codigo;
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
                        <?php endforeach; endif; ?>
                    </div>
                </div>
            </div>
        </div>   
    </div>
</section>
<!-- /invl-plans -->
<section class="invl-plans">
    <div class="container">
        <div class="invl-plans-header">
            <h2>Pagamento Facilitado</h2>
            <h3>Pague utilizando plataformas seguras e com parcelamento.</h3>
        </div>
        <div class="invl-plans-digital-payments mt-5">
            <ul class="invl-plans-digital-payments-list">
                <li><img src="<?=base_url();?>public/images/pagseguro-icon.png"></li>
                <li><img src="<?=base_url();?>public/images/mercadopago-icon.png"></li>
                <li><img src="<?=base_url();?>public/images/paypal-icon.png"></li>
            </ul>
        </div>
    </div>
</section>