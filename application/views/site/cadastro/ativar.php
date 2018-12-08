<!-- invl-cadastro -->
<section class="invl-cadastro-form">
    <form method="post">
        <div class="container">
            <!-- Checkout -->
            <div class="invl-cadastro-steps active"> 
                <div class="invl-form-content">
                    <div class="invl-form-inputs">
                        <div class="row form-group">
                            <div class="col-12 col-sm-12 col-md-12 col-lg-4 offset-md-4"> 
                                <?php
                                    if ($this->session->flashdata('codigo_sucesso') !== null):
                                ?>                   
                                        
                                <h1>Conta Ativada!</h1>
                                <div class="alert alert-success">
                                <strong>Usuário ativado com sucesso</strong><p>Os dados de acesso foram enviados para o e-mail(<strong><?=$this->cliente['email'];?></strong>) informado.</p><small>Em alguns casos o e-mail poderá levar <strong>5 minutos</strong> para ser entregue.</small><br><small>Verifique sua caixa de <strong>SPAM</strong> e <strong>Lixo Eletrônico</strong></small>
                                </div>
                                <?php else: ?> 
                                <h1>Ativar Conta</h1>
                                <p>O código de ativação foi encaminhado via SMS para o telefone celular informado em seu cadastro.</p>    
                                <?=validation_errors('<div class="alert alert-danger">','</div>');?>     
                                <?php
                                    if ($this->session->flashdata('codigo_error') !== null) {
                                        echo '<div class="alert alert-danger">'.$this->session->flashdata('codigo_error').'</div>';
                                    }
                                ?>           
                                <input type="text" class="form-control input-lg" name="codigo_ativacao" placeholder="Código de Ativação" name-input>
                                <input type="submit" name="ativar_cadastro" class="invl-btn invl-btn-primary invl-btn-block mt-4" value="Confirmar">
                                <?php endif; ?> 
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>
</section>