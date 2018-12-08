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
                                <h1>Recuperar Conta</h1>
                                <p>O procedimento de recuperacão será encaminhado para o e-mail informado.</p>    
                                <?=validation_errors('<div class="alert alert-danger">','</div>');?>     
                                <?php
                                    if ($this->session->flashdata('codigo_error') !== null) {
                                        echo '<div class="alert alert-danger">'.$this->session->flashdata('codigo_error').'</div>';
                                    }
                                ?>   
                                <?php
                                    if ($this->session->flashdata('codigo_sucesso') !== null) {
                                        echo '<div class="alert alert-success">'.$this->session->flashdata('codigo_sucesso').'</div>';
                                    }
                                ?>         
                                <input type="text" class="form-control input-lg" name="email" placeholder="E-mail Cadastrado" name-input>
                                <input type="submit" name="recuperar_conta" class="invl-btn invl-btn-primary invl-btn-block mt-4" value="Recuperar">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>
</section>