<div class="row">
    <div class="col-sm-12 col-md-12 col-lg-4">
        <!-- invl-cadastro -->
        <section class="invl-cadastro-form">
            <form method="post" action="<?=base_url();?>conta/autenticar" id="form-cadastro">
                <div class="container">
                    <!-- Dados do Usuário -->
                    <div class="invl-cadastro-steps active" cadastro-step="1"> 
                        <div class="invl-cadastro-header text-center">
                            <h1>Acessar sua Conta</h1>
                        </div>
                        <div class="invl-form-content">
                            <?php
                                if($this->session->flashdata('validation_errors') !== NULL) {
                                    echo '<div class="alert alert-danger">'.$this->session->flashdata('validation_errors').'</div>';
                                }
                            ?>
                            <div class="invl-form-inputs">
                                <div class="row form-group">
                                    <div class="col-12">
                                        <input type="text" class="form-control input-lg" name="email" placeholder="Digite seu Email" name-input>
                                    </div>
                                </div>
                                <div class="row form-group">
                                    <div class="col-12">
                                        <input type="password" class="form-control input-lg" name="senha" placeholder="Senha" check-password>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row form-group">    
                            <div class="col-sm-12 col-md-12 col-lg-12">
                                <button type="submit" class="btn btn-primary btn-lg btn-block" cadastro-next-step="2">Avançar</button>
                                <h4 class="text-center mt-3"><small><span><a href="<?=base_url()?>conta/recuperar">Esqueceu sua senha?</a></span></small></h4>
                                <h4 class="text-center mt-5"><small><span>Não possui cadastro?</span> <a href="<?=base_url()?>cadastro" class="btn btn-primary btn-cadastro">Cadastre-se</a></small></h4>
                            </div>
                        </div>
                    </div>      
                </div>
            </form>
        </section>
    </div>
    <div class="col-sm-12 col-md-12 col-lg-8 hidden-xs hidden-sm">
        <div class="invl-cadastro-imagem" style="background-image: url('<?=base_url();?>public/images/header-bg-01.jpg');">
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