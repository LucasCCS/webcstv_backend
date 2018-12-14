<div class="row">
    <div class="col-sm-12 col-md-12 col-lg-4">
        <!-- invl-cadastro -->
        <section class="invl-cadastro-form">
            <form method="post">
                <div class="container">
                    <!-- Checkout -->
                    <div class="invl-cadastro-steps active"> 
                        <div class="invl-form-content">
                            <div class="invl-form-inputs">
                                <?php
                                    if ($this->session->flashdata('codigo_sucesso') !== null):
                                ?>  
                                <div class="text-center">                                     
                                    <h1>Conta Ativada!</h1>
                                 </div> 
                                <div class="alert alert-success">
                                <strong>Usuário ativado com sucesso</strong><p>Os dados de acesso foram enviados para o e-mail(<strong><?=$this->cliente['email'];?></strong>) informado.</p><small>Em alguns casos o e-mail poderá levar <strong>5 minutos</strong> para ser entregue.</small><br><small>Verifique sua caixa de <strong>SPAM</strong> e <strong>Lixo Eletrônico</strong></small>
                                </div>
                                <?php else: ?> 
                                <div class="text-center">
                                    <h1>Ativar Conta</h1>
                                    <p>O código de ativação foi encaminhado via SMS para o telefone celular informado em seu cadastro.</p>
                                </div>    
                                <?=validation_errors('<div class="alert alert-danger">','</div>');?>     
                                <?php
                                    if ($this->session->flashdata('codigo_error') !== null) {
                                        echo '<div class="alert alert-danger">'.$this->session->flashdata('codigo_error').'</div>';
                                    }
                                ?>           
                                <input type="text" class="form-control input-lg" name="codigo_ativacao" placeholder="Código de Ativação" name-input>
                                <input type="submit" name="ativar_cadastro" class="btn btn-primary btn-block mt-4" value="Confirmar">
                                <?php endif; ?>                          
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </section>
    </div>
    <div class="col-sm-12 col-md-12 col-lg-8 hidden-xs hidden-sm">
        <div class="invl-cadastro-imagem">
            <div class="row">
                <div class="col-lg-8 p-4 ml-5 mt-4">
                    <div class="invl-cadastro-imagem-logo">
                        <img src="<?=base_url();?>public/images/logo-lg.png" width="600px">
                    </div>
                </div>
            </div>
        </div>
    </div> 
</div>
