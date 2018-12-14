<div class="row">
    <div class="col-sm-12 col-md-12 col-lg-4">
        <section class="invl-cadastro-form">
            <form method="post">
                <div class="container">
                    <div class="invl-cadastro-steps active"> 
                        <div class="invl-form-content">
                            <div class="invl-form-inputs">                                                    
                                <div class="text-center"><h1>Recuperar Conta</h1>
                                <p>O procedimento de recuperacão será encaminhado para o e-mail informado.</p>    </div>
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
                                <input type="submit" name="recuperar_conta" class="btn btn-primary btn-block mt-4" value="Recuperar">                   
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