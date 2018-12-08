<!-- invl-cadastro -->
<section class="invl-cadastro-form">
    <form method="post" id="form-cadastro">
        <div class="container">
            <!-- Dados do Usuário -->
            <div class="invl-cadastro-steps active" cadastro-step="1"> 
                <div class="invl-cadastro-header">
                    <h1>Dados do Usuário</h1>
                    <p>Informações de acesso</p>
                </div>
                <div class="invl-form-content">
                    <div class="invl-form-inputs">
                        <div class="row form-group">
                            <div class="col-12">
                                <input type="text" class="form-control input-lg" name="nome" placeholder="Seu Nome" name-input>
                            </div>
                        </div>
                        <div class="row form-group">
                            <div class="col-4">
                                <input type="text" class="form-control input-lg" name="telefone" placeholder="Telefone Celular" phone-input phone>
                            </div>
                            <div class="col-8">
                                <input type="text" class="form-control input-lg" name="email" placeholder="E-mail" mail-input>
                            </div>
                        </div>
                        <div class="row form-group">
                            <div class="col-6">
                                <input type="password" class="form-control input-lg" name="senha" placeholder="Senha" check-password>
                            </div>
                            <div class="col-6">
                                <input type="password" class="form-control input-lg" name="r_senha" placeholder="Repita sua Senha" check-password>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row form-group">
                    <div class="col-sm-12 col-md-12 col-lg-6 d-flex">
                        <small class="text-muted"><i class="fa fa-lock"></i> Respeitaremos sua privacidade.</small>
                    </div>
                    <div class="col-sm-12 col-md-12 col-lg-6 d-flex">
                        <button type="button" class="invl-btn invl-btn-primary btn-lg ml-auto mt-2" cadastro-next-step="2">Avançar</button>
                    </div>
                </div>
            </div>
            <!-- Planos -->
            <div class="invl-cadastro-steps" cadastro-step="2"> 
                <div class="invl-cadastro-header">
                    <h1>Planos</h1>
                    <p>Os melhores planos em CardSharing e IPTV</p>
                </div>
                <div class="invl-cadastro-content">
<<<<<<< HEAD
                    <div class="invl-cadastro-list" id="plans">
                        <div class="row">

                           <?php
                                if(isset($planos)):
                                    foreach($planos as $key):
                            ?>
                            <div class="col-12 col-sm-12 col-md-12 col-lg-3">
                                <div class="invl-cadastro-list-item" plan="<?=$key->id_plano?>" plan-limit="<?=$key->operadoras;?>" plan-type="<?=$key->tipo;?>">
                                    <div class="invl-cadastro-list-item-header">
                                        <div class="invl-cadastro-list-item-header-title">
                                            <h2><?=$key->titulo;?></h2>
                                        </div>
                                        <div class="invl-cadastro-list-item-header-price">
                                            <h3><small>R$</small> <?=$key->valor;?></h3>
=======
                        <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link active" id="pills-cs-tab" data-toggle="pill" href="#cs" role="tab" aria-controls="cs" aria-selected="true">CardSharing</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" id="pills-iptv-tab" data-toggle="pill" href="#iptv" role="tab" aria-controls="iptv" aria-selected="false">IPTV</a>
                            </li>
                        </ul>
                        <div class="tab-content" id="pills-tabContent">
                            <div class="tab-pane fade show active" id="cs" role="tabpanel" aria-labelledby="cs-tab">
                                <div class="invl-cadastro-list" id="plans">
                                    <div class="invl-plans-list">
                                        <div class="row">
                                            <?php
                                                if(isset($planos_cs)):
                                                    foreach($planos_cs as $key):
                                            ?>
                                            <div class="col-12 col-sm-12 col-md-12 col-lg-3">
                                                <div class="invl-cadastro-list-item" plan="<?=$key->id_plano?>" plan-limit="<?=$key->operadoras;?>">
                                                    <div class="invl-cadastro-list-item-header">
                                                        <div class="invl-cadastro-list-item-header-title">
                                                            <h2><?=$key->titulo;?></h2>
                                                        </div>
                                                        <div class="invl-cadastro-list-item-header-price">
                                                            <h3><small>R$</small> <?=$key->valor;?></h3>
                                                        </div>
                                                    </div>
                                                    <div class="invl-cadastro-list-item-content">
                                                        <ul class="invl-cadastro-list-item-content-list">
                                                            <?=$key->descricao;?>
                                                        </ul>
                                                    </div>
                                                </div>
                                            </div>
                                            <?php
                                                    endforeach;
                                                endif;
                                            ?>
>>>>>>> 85c58725f07c17a43e7ae9bb8918d4654edbaf2e
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane fade" id="iptv" role="tabpanel" aria-labelledby="iptv-tab">
                                <div class="invl-cadastro-list" id="plans">
                                    <div class="invl-plans-list">
                                        <div class="row">
                                            <?php
                                                if(isset($planos_iptv)):
                                                    foreach($planos_iptv as $key):
                                            ?>
                                            <div class="col-12 col-sm-12 col-md-12 col-lg-3">
                                                <div class="invl-cadastro-list-item" plan="<?=$key->id_plano?>" plan-limit="<?=$key->operadoras;?>">
                                                    <div class="invl-cadastro-list-item-header">
                                                        <div class="invl-cadastro-list-item-header-title">
                                                            <h2><?=$key->titulo;?></h2>
                                                        </div>
                                                        <div class="invl-cadastro-list-item-header-price">
                                                            <h3><small>R$</small> <?=$key->valor;?></h3>
                                                        </div>
                                                    </div>
                                                    <div class="invl-cadastro-list-item-content">
                                                        <ul class="invl-cadastro-list-item-content-list">
                                                            <?=$key->descricao;?>
                                                        </ul>
                                                    </div>
                                                </div>
                                            </div>
                                            <?php
                                                    endforeach;
                                                endif;
                                            ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>               
                        <input type="hidden" name="id_plano" plan-input>
                    <!--  -->
                </div>
                <div class="row form-group">
                    <div class="col-sm-12 col-md-12 col-lg-6 d-flex">
                        <small class="text-muted"><i class="fas fa-exclamation-circle"></i> Você não será cobrado durante sua fase de avaliação.</small>
                    </div>
                    <div class="col-sm-12 col-md-12 col-lg-6 d-flex">
                        <button type="button" class="invl-btn invl-btn-primary btn-lg ml-auto mt-2" cadastro-next-step="3">Avançar</button>
                    </div>
                </div>
            </div>
            <!-- Forma de Pagamento -->
            <div class="invl-cadastro-steps" cadastro-step="3"> 
                <div class="invl-cadastro-header">
                    <h1>Operadoras</h1>
                    <p>Selecione a(s) operadora(s) para sua assinatura</p>
                </div>
                <div class="invl-form-content">
                    <div class="invl-form-payments">
                        <div class="row">
                            <div class="col-12 text-center mt-3">
                                <ul class="invl-form-payments-list">
                                    <?php
                                        if (isset($operadoras)):
                                            foreach($operadoras as $key):
                                    ?>
                                    <li>
                                        <img class="img-fluid" src="<?=$key->imagem_logo?>" operadora="<?=$key->id_operadora;?>">
                                        <input type="checkbox" name="operadora[]" value="<?=$key->id_operadora;?>" operadora-input="<?=$key->id_operadora;?>">
                                    </li>
                                    <?php 
                                            endforeach;
                                        endif;
                                    ?>
                                </ul>
                            </div>
                        </div>
                        <div class="row form-group">
                            <div class="col-12 text-center">
                                <small class="text-muted"><i class="fa fa-lock"></i> Você será redirecionado para o sistema de checkout da paltaforma de pagamento desejada.</small>
                            </div>
                            <div class="col-12 d-flex">
                                <button type="button" class="invl-btn invl-btn-primary btn-lg ml-auto mt-2" cadastro-next-step="4">Avançar</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
                <!-- Checkout -->
                <div class="invl-cadastro-steps" cadastro-step="4"> 
                    <div class="invl-cadastro-header">
                        <h1>Checkout</h1>
                        <p>Confira os dados de cadastro antes de prosseguir</p>
                    </div>
                    <div class="invl-form-content">
                        <div class="invl-form-payments">
                            <div class="row">
                                <div class="col-sm-12 col-md-12 col-lg-9 mt-3">
                                    <table class="table">
                                        <tbody>
                                            <tr>
                                                <td>Nome: <span name></span></td>
                                            </tr>
                                            <tr>
                                                <td>E-mail:  <span mail></span></td>
                                            </tr>
                                            <tr>
                                                <td>Celular:  <span phone></span><br>
                                                <small class="text-muted"><i class="fas fa-exclamation-circle"></i> A confirmação de seu acesso será encaminhada via SMS para o telefone informado.</small>
                                                </td>                                        
                                            </tr>                                    
                                        </tbody>
                                    </table>
                                    <div class="row form-group mt-5">
                                        <div class="col-12 d-flex">
                                            <button  type="button" class="invl-btn invl-btn-primary btn-lg invl-btn-block mt-2" submit-cadastro="#form-cadastro" submit-cadastro-url="<?=base_url();?>cadastro/finalizar">Concluir</button>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-12 col-sm-12 col-md-12 col-lg-3 invl-cadastro-plan-checkout">
                                    <div class="invl-cadastro-content">
                                        <div class="invl-cadastro-list">
                                            <div class="invl-cadastro-list-item active" plan-checkout> 
                                                <div class="invl-cadastro-list-item-header">
                                                    <div class="invl-cadastro-list-item-header-title">
                                                        <h2>Net</h2>
                                                    </div>
                                                    <div class="invl-cadastro-list-item-header-price">
                                                        <h3><small>R$</small> 20,00</h3>
                                                    </div>
                                                </div>
                                                <div class="invl-cadastro-list-item-content">
                                                    <ul class="invl-cadastro-list-item-content-list">
                                                        <li>3 operadoras a escolha</li>
                                                        <li>Mais de 254 canais</li>
                                                        <li>Servidor dedicado protegido</li>
                                                        <li>01 acesso(s)</li>
                                                        <li>Login para apenas 1 aparelho</li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>
</section>