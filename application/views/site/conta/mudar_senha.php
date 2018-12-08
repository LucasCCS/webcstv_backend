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
                                <h1>Mudar Senha</h1>
                                <p>Preencha os campos abaixo para mudar sua senha.</p>    
                                <?=validation_errors('<div class="alert alert-danger">','</div>');?>     
                                <?php
                                    if ($this->session->flashdata('codigo_error') !== null) {
                                        echo '<div class="alert alert-danger">'.$this->session->flashdata('codigo_error').'</div>';
                                    }
                                ?>   
                                <?php
                                    if ($this->session->flashdata('codigo_sucesso') !== null) {
                                        echo '<div class="alert alert-success">'.$this->session->flashdata('codigo_sucesso').'</div>';
                                    } else {
                                ?>         
                                <input type="text" class="form-control input-lg" name="senha" placeholder="Nova Senha">
                                <input type="text" class="form-control input-lg" name="r_senha" placeholder="Repita a Senha">
                                <input type="submit" name="mudar_senha_conta" class="invl-btn invl-btn-primary invl-btn-block mt-4" value="Mudar">
                                <?php } ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>
</section>