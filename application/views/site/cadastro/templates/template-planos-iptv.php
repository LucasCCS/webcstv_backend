<!-- invl-plans -->
<section class="invl-plans">
    <div class="container">
        <div class="tab-content" id="pills-tabContent">
            <div class="tab-pane fade show active" id="pills-plano-iptv-mes" role="tabpanel" aria-labelledby="pills-plano-iptv-mes-tab">
                <div class="invl-plans-list" style="margin-top: 10px;">   
                    <div class="row">
                        <?php
                            if(isset($planos_iptv)):
                                foreach($planos_iptv as $iptv):
                        ?>
                        <div class="col-sm-12 col-md-6 col-lg-4">
                            <div class="invl-plans-list-item">
                                <div class="invl-plans-list-item-header">
                                    <h4><?=$iptv->titulo;?></h4>
                                    <?php
                                        if(!empty($iptv->subtitulo)) {
                                            echo '<p>'.$iptv->subtitulo.'</p>';
                                        }
                                    ?> 
                                </div>
                                <div class="invl-plans-list-item-body">
                                    <div class="invl-plans-list-item-price">
                                        <span class="old-price">de R$ <?=$iptv->valor_antigo;?></span>
                                        <div class="new-price">
                                            <?php
                                                $valor = explode(',',$iptv->valor); 
                                            ?>
                                            <h4><?=$valor[0];?><span>,<?=$valor[1]?></span></h4>
                                            <p>por <?php
                                                switch($iptv->periodicidade) {
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
                                        <button type="button" class="btn btn-primary btn-plans btn-block" selectPlan="<?=$iptv->id_plano;?>">Teste Grátis</button>
                                        <small class="text-muted mr-1 ml-1">Teste hoje mesmo, sem nenhum custo.</small>
                                    </div>
                                    <div class="invl-plans-list-item-features">
                                        <ul class="invl-plans-list-item-features-list">
                                            <?=$iptv->descricao;?>
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