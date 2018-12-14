<!-- invl-plans -->
<section class="invl-plans mb-5">
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
                        <div class="col-sm-12 col-md-6 col-lg-3">
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
                                        <a class="btn btn-primary btn-plans btn-block" href="#">Teste Grátis</a>
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
                        <?php endforeach; endif; ?>

                        <!-- <div class="col-sm-12 col-md-6 col-lg-3">
                            <div class="invl-plans-list-item destaque">
                                <div class="invl-plans-list-item-header-destaque">
                                    A melhor opção
                                </div>
                                <div class="invl-plans-list-item-header">
                                    <h4>Prata</h4>
                                    <p>Satélite Duplo</p>
                                </div>
                                <div class="invl-plans-list-item-body">
                                    <div class="invl-plans-list-item-price">
                                        <span class="old-price">de R$ 90,00</span>
                                        <div class="new-price">
                                            <h4>60<span>,00</span></h4>
                                            <p>por mês</p>
                                        </div>
                                    </div>
                                    <div class="invl-plans-list-item-action text-center">
                                        <a class="btn btn-primary btn-plans btn-block" href="#">Teste Grátis</a>
                                        <small class="text-muted mr-1 ml-1">Teste hoje mesmo, sem nenhum custo.</small>
                                    </div>
                                    <div class="invl-plans-list-item-features">
                                        <ul class="invl-plans-list-item-features-list">
                                            <li class="invl-plans-list-item-features-list-item">
                                                <strong>+200</strong> canais em HD
                                            </li>
                                            <li class="invl-plans-list-item-features-list-item">
                                                <strong><i>Suporte 24 horas</i></strong>
                                            </li>
                                            <li class="invl-plans-list-item-features-list-item">
                                                <strong><i>1</i></strong> operadora
                                            </li>
                                            <li class="invl-plans-list-item-features-list-item">
                                                Servidor dedicado
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>          

                        <div class="col-sm-12 col-md-6 col-lg-3">
                            <div class="invl-plans-list-item">
                                <div class="invl-plans-list-item-header">
                                    <h4>Ouro</h4>
                                    <p>Satélite Triplo</p>
                                </div>
                                <div class="invl-plans-list-item-body">
                                    <div class="invl-plans-list-item-price">
                                        <span class="old-price">de R$ 90,00</span>
                                        <div class="new-price">
                                            <h4>00<span>,00</span></h4>
                                            <p>por mês</p>
                                        </div>
                                    </div>
                                    <div class="invl-plans-list-item-action text-center">
                                        <button class="btn btn-primary btn-plans btn-block" disabled>Indisponível</button>
                                        <small class="text-muted mr-1 ml-1">Teste hoje mesmo, sem nenhum custo.</small>
                                    </div>
                                    <div class="invl-plans-list-item-features">
                                        <ul class="invl-plans-list-item-features-list">
                                            <li class="invl-plans-list-item-features-list-item">
                                                <strong>+200</strong> canais em HD
                                            </li>
                                            <li class="invl-plans-list-item-features-list-item">
                                                <strong><i>Suporte 24 horas</i></strong>
                                            </li>
                                            <li class="invl-plans-list-item-features-list-item">
                                                <strong><i>1</i></strong> operadora
                                            </li>
                                            <li class="invl-plans-list-item-features-list-item">
                                                Servidor dedicado
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-sm-12 col-md-6 col-lg-3">
                            <div class="invl-plans-list-item">
                                <div class="invl-plans-list-item-header">
                                    <h4>Plano Net</h4>
                                </div>
                                <div class="invl-plans-list-item-body">
                                    <div class="invl-plans-list-item-price">
                                        <span class="old-price">de R$ 90,00</span>
                                        <div class="new-price">
                                            <h4>60<span>,00</span></h4>
                                            <p>por mês</p>
                                        </div>
                                    </div>
                                    <div class="invl-plans-list-item-action text-center">
                                        <a class="btn btn-primary btn-plans btn-block" href="#">Teste Grátis</a>
                                        <small class="text-muted mr-1 ml-1">Teste hoje mesmo, sem nenhum custo.</small>
                                    </div>
                                    <div class="invl-plans-list-item-features">
                                        <ul class="invl-plans-list-item-features-list">
                                            <li class="invl-plans-list-item-features-list-item">
                                                <strong>+200</strong> canais em HD
                                            </li>
                                            <li class="invl-plans-list-item-features-list-item">
                                                <strong><i>Suporte 24 horas</i></strong>
                                            </li>
                                            <li class="invl-plans-list-item-features-list-item">
                                                <strong><i>1</i></strong> operadora
                                            </li>
                                            <li class="invl-plans-list-item-features-list-item">
                                                Servidor dedicado
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div> -->

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
                        <div class="col-sm-12 col-md-6 col-lg-3">
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
                                        <a class="btn btn-primary btn-plans btn-block" href="#">Teste Grátis</a>
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
                        <div class="col-sm-12 col-md-6 col-lg-3">
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
                                        <a class="btn btn-primary btn-plans btn-block" href="#">Teste Grátis</a>
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
                        <?php endforeach; endif; ?>
                    </div>
                </div>
            </div>
        </div>   
    </div>
</section>
<!-- /invl-plans -->