<!-- /invl-plans -->
<section class="invl-plans" style="padding-bottom: 80px;">
    <div class="container">
        <div class="invl-plans-header text-right">
            <h2>Depósito Bancário</h2>
            <h3>Pagamento sem taxas extras.</h3>
        </div>
        <div class="invl-plans-payments mt-5">
            <ul class="invl-plans-payments-list">
                <li><img src="<?=base_url();?>public/images/caixa-icon.webp"></li>
                <li><img src="<?=base_url();?>public/images/bradesco-icon.png"></li>
                <li><img src="<?=base_url();?>public/images/santander-icon.png"></li>
                <li><img src="<?=base_url();?>public/images/bancobrasil-icon.png"></li>
                <li><img style="width: 60px;" src="<?=base_url();?>public/images/itau-icon.png"></li>
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
                            if(isset($planos_iptv_mensal)):
                                foreach($planos_iptv_mensal as $iptv_mensal):
                        ?>
                        <div class="col-sm-12 col-md-6 col-lg-4">
                            <div class="invl-plans-list-item">
                                <div class="invl-plans-list-item-header">
                                    <h4><?=$iptv_mensal->titulo;?></h4>
                                    <?php
                                        if(!empty($iptv_mensal->subtitulo)) {
                                            echo '<p>'.$iptv_mensal->subtitulo.'</p>';
                                        }
                                    ?> 
                                </div>
                                <div class="invl-plans-list-item-body">
                                    <div class="invl-plans-list-item-price">
                                        <span class="old-price">de R$ <?=$iptv_mensal->valor_antigo;?></span>
                                        <div class="new-price">
                                            <?php
                                                $valor = explode(',',$iptv_mensal->valor); 
                                            ?>
                                            <h4><?=$valor[0];?><span>,<?=$valor[1]?></span></h4>
                                            <p>por mês</p>
                                        </div>
                                    </div>
                                    <div class="invl-plans-list-item-action text-center">
                                        <a class="btn btn-info btn-plans btn-block" href="<?=base_url();?>cadastro" selectPlan="<?=$iptv_mensal->id_plano;?>">Teste Grátis</a>
                                        <small class="text-muted mr-1 ml-1">Teste hoje mesmo, sem nenhum custo.</small>
                                    </div>
                                    <div class="invl-plans-list-item-features">
                                        <ul class="invl-plans-list-item-features-list">
                                            <?=$iptv_mensal->descricao;?>
                                        </ul>
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