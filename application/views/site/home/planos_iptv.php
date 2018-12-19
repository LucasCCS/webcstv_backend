<!-- invl-plans -->
<section class="invl-plans-iptv">
    <div class="container">
        <div class="invl-plans-header text-right">
            <h2>Os melhores planos<br>em IPTV</h2>
            <h3>Teste gratuitamente!</h3>
        </div>
        <div class="row justify-content-center">
           <div class="col-sm-12 col-md-12 col-lg-6">
                <div class="invl-plans-nav">
                    <ul class="invl-plans-nav-list nav nav-pills mb-3" id="pills-tab" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link active" id="pills-iptv-plano-mes-tab" data-toggle="pill" href="#pills-iptv-plano-mes" role="tab" aria-controls="pills-iptv-plano-mes" aria-selected="true">Plano Mensal</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="pills-iptv-plano-trimestral-tab" data-toggle="pill" href="#pills-iptv-plano-trimestral" role="tab" aria-controls="pills-iptv-plano-trimestral" aria-selected="false">Plano Trimestral</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="pills-iptv-plano-semestral-tab" data-toggle="pill" href="#pills-iptv-plano-semestral" role="tab" aria-controls="pills-iptv-plano-semestral" aria-selected="false">Plano Semestral</a>
                        </li>
                    </ul>
                </div>
           </div>
        </div>
        <div class="tab-content" id="pills-tabContent">
            <div class="tab-pane fade show active" id="pills-iptv-plano-mes" role="tabpanel" aria-labelledby="pills-iptv-plano-mes-tab">
                <div class="invl-plans-list">   
                    <div class="row">
                        <?php
                            if(isset($planos_iptv_mensal)):
                                foreach($planos_iptv_mensal as $iptv_mensal):
                        ?>
                        <div class="col-sm-12 col-md-6 col-lg-3">
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
            <div class="tab-pane fade" id="pills-iptv-plano-trimestral" role="tabpanel" aria-labelledby="pills-iptv-plano-trimestral-tab">
                <div class="invl-plans-list">   
                    <div class="row">
                        <?php
                            if(isset($planos_iptv_trimestral)):
                                foreach($planos_iptv_trimestral as $iptv_trimestral):
                        ?>
                        <div class="col-sm-12 col-md-6 col-lg-3">
                            <div class="invl-plans-list-item">
                                <div class="invl-plans-list-item-header">
                                    <h4><?=$iptv_trimestral->titulo;?></h4>
                                    <?php
                                        if(!empty($iptv_trimestral->subtitulo)) {
                                            echo '<p>'.$iptv_trimestral->subtitulo.'</p>';
                                        }
                                    ?> 
                                </div>
                                <div class="invl-plans-list-item-body">
                                    <div class="invl-plans-list-item-price">
                                        <span class="old-price">de R$ <?=$iptv_trimestral->valor_antigo;?></span>
                                        <div class="new-price">
                                            <?php
                                                $valor = explode(',',$iptv_trimestral->valor); 
                                            ?>
                                            <h4><?=$valor[0];?><span>,<?=$valor[1]?></span></h4>
                                            <p>por trimestre</p>
                                        </div>
                                    </div>
                                    <div class="invl-plans-list-item-action text-center">
                                        <a class="btn btn-info btn-plans btn-block" href="<?=base_url();?>cadastro" selectPlan="<?=$iptv_trimestral->id_plano;?>" selectPlanPer="<?=$iptv_trimestral->id_sub_plano;?>">Teste Grátis</a>
                                        <small class="text-muted mr-1 ml-1">Teste hoje mesmo, sem nenhum custo.</small>
                                    </div>
                                    <div class="invl-plans-list-item-features">
                                        <ul class="invl-plans-list-item-features-list">
                                            <?=$iptv_trimestral->descricao;?>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <?php endforeach; endif; ?>
                    </div>
                </div>
            </div>
            <div class="tab-pane fade" id="pills-iptv-plano-semestral" role="tabpanel" aria-labelledby="pills-iptv-plano-semestral-tab">
                <div class="invl-plans-list">   
                    <div class="row">
                        <?php
                            if(isset($planos_iptv_semestral)):
                                foreach($planos_iptv_semestral as $iptv_semestral):
                        ?>
                        <div class="col-sm-12 col-md-6 col-lg-3">
                            <div class="invl-plans-list-item">
                                <div class="invl-plans-list-item-header">
                                    <h4><?=$iptv_semestral->titulo;?></h4>
                                    <?php
                                        if(!empty($iptv_semestral->subtitulo)) {
                                            echo '<p>'.$iptv_semestral->subtitulo.'</p>';
                                        }
                                    ?> 
                                </div>
                                <div class="invl-plans-list-item-body">
                                    <div class="invl-plans-list-item-price">
                                        <span class="old-price">de R$ <?=$iptv_semestral->valor_antigo;?></span>
                                        <div class="new-price">
                                            <?php
                                                $valor = explode(',',$iptv_semestral->valor); 
                                            ?>
                                            <h4><?=$valor[0];?><span>,<?=$valor[1]?></span></h4>
                                            <p>por semestre</p>
                                        </div>
                                    </div>
                                    <div class="invl-plans-list-item-action text-center">
                                        <a class="btn btn-info btn-plans btn-block" href="<?=base_url();?>cadastro" selectPlan="<?=$iptv_semestral->id_plano;?>" selectPlanPer="<?=$iptv_semestral->id_sub_plano;?>">Teste Grátis</a>
                                        <small class="text-muted mr-1 ml-1">Teste hoje mesmo, sem nenhum custo.</small>
                                    </div>
                                    <div class="invl-plans-list-item-features">
                                        <ul class="invl-plans-list-item-features-list">
                                            <?=$iptv_semestral->descricao;?>
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