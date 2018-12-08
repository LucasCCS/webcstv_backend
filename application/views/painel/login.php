<?=$this->load->view('painel/default/head',[],TRUE);?>
<section id="wrapper" class="login-page">
    <div class="container">
        <div class="row justify-content-lg-center">
            <div class="col-sm-12 col-md-12 col-lg-3">
                <?=validation_errors();?>
                <?php
                    if (isset($error_message) && count($error_message) > 0) {
                        foreach($error_message as $key => $value) {
                            echo $error_message[$key];
                        }
                    }
                ?>
                <div class="text-center">
                    <img class="mb-2" src="<?=base_url();?>/public/images/logo.png" width="180px">
                </div>
                <form method="post">
                    <input class="form-control" name="usuario" type="text" placeholder="Nome de Usuário">
                    <input class="form-control" name="senha" type="password" placeholder="Sua Senha">
                    <input type="submit" name="login" class="btn btn-primary btn-block" value="Entrar"> 
                </form>
                <div class="text-center mt-3">
                    <a href="<?=base_url();?>">Voltar para o Site</a>
                </div>
            </div>
        </div>
    </div>
<?=$this->load->view('painel/default/footer',[],TRUE);?>