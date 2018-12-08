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
                    <div class="col-6 d-flex">
                        <small class="text-muted"><i class="fa fa-lock"></i> Respeitaremos sua privacidade.</small>
                    </div>
                    <div class="col-6 d-flex">
                        <button type="button" class="invl-btn invl-btn-primary btn-lg ml-auto mt-2" cadastro-next-step="2">Avançar</button>
                    </div>
                </div>
            </div>
            <!-- Planos -->
            <div class="invl-cadastro-steps" cadastro-step="2"> 
                <div class="invl-cadastro-header">
                    <h1>Planos</h1>
                    <p>Planos que cabem no seu bolso</p>
                </div>
                <div class="invl-cadastro-content">
                    <div class="invl-cadastro-list">
                        <div class="row">

                           <?php
                                if(isset($planos)):
                                    foreach($planos as $key):
                            ?>
                            <div class="col-12 col-sm-12 col-md-12 col-lg-3">
                                <div class="invl-cadastro-list-item" plan="<?=$key->id_plano?>">
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
                            <input type="hidden" name="id_plano" plan-input>

                        </div>
                    </div>
                </div>
                <div class="row form-group">
                    <div class="col-6 d-flex">
                        <small class="text-muted"><i class="fas fa-exclamation-circle"></i> Você não será cobrado durante sua fase de avaliação.</small>
                    </div>
                    <div class="col-6 d-flex">
                        <button type="button" class="invl-btn invl-btn-primary btn-lg ml-auto mt-2" cadastro-next-step="3">Avançar</button>
                    </div>
                </div>
            </div>
            <!-- Forma de Pagamento -->
            <div class="invl-cadastro-steps" cadastro-step="3"> 
                <div class="invl-cadastro-header">
                    <h1>Forma de Pagamento</h1>
                    <p>Selecione a melhor forma de pagamento para sua assinatura</p>
                </div>
                <div class="invl-form-content">
                    <div class="invl-form-payments">
                        <div class="row">
                            <div class="col-12 text-center mt-3">
                                <ul class="invl-form-payments-list">
                                    <?php
                                        if (isset($metodos_pagamento)):
                                            foreach($metodos_pagamento as $key):
                                    ?>
                                    <li>
                                        <img class="img-fluid" src="<?=base_url();?><?=$key->imagem_logo?>" payment-method="<?=$key->id_metodo_pagamento;?>">
                                    </li>
                                    <?php 
                                            endforeach;
                                        endif;
                                    ?>
                                </ul>
                                <input type="hidden" name="id_metodo_pagamento" payment-input>
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
                                <div class="col-9 mt-3">
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
                                            <tr>
                                                <td>Plataforma de Pagamento:  <span payment></span></td>
                                            </tr>                                
                                        </tbody>
                                    </table>
                                    <div class="row form-group mt-5">
                                        <div class="col-12 d-flex">
                                            <button  type="button" class="invl-btn invl-btn-primary btn-lg invl-btn-block mt-2" submit-cadastro="#form-cadastro" submit-cadastro-url="<?=base_url();?>cadastro/finalizar">Concluir</button>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-12 col-sm-12 col-md-12 col-lg-3">
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