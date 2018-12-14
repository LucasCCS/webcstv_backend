<?=$this->load->view('site/conta/painel/default/head',[],TRUE);?>

<div class="row">
    <div class="col-12">
        <h3>Alterar Senha</h3>
        <p>Preencha os campos abaixo para mudar sua senha.</p>    
    </div>
    <div class="col-12">
        <div class="card">
            <div class="card-block">
                <?=validation_errors('<div class="alert alert-danger">','</div>');?>     
                <?php
                    if ($this->session->flashdata('codigo_error') !== null) {
                        echo '<div class="alert alert-danger">'.$this->session->flashdata('codigo_error').'</div>';
                    }
                ?>   
                <?php
                    if ($this->session->flashdata('codigo_erro') !== null) {
                        echo '<div class="alert alert-danger">'.$this->session->flashdata('codigo_erro').'</div>';
                    }
                ?>  
                <?php
                    if ($this->session->flashdata('codigo_sucesso') !== null) {
                        echo '<div class="alert alert-success">'.$this->session->flashdata('codigo_sucesso').'</div>';
                    } else {
                ?>   
                <form method="post">
                    <input type="password" class="form-control input-lg" name="senha_atual" placeholder="Senha Atual">   
                    <div class="row">
                        <div class="col-12 col-lg-6">
                            <input type="password" class="form-control input-lg" name="senha" placeholder="Nova Senha">
                        </div>
                        <div class="col-12 col-lg-6">
                            <input type="password" class="form-control input-lg" name="r_senha" placeholder="Repita a Senha">
                        </div>
                    </div>   
                    <div class="text-right">
                        <input type="submit" name="mudar_senha_conta" class="btn btn-primary btn-lg" value="Salvar">
                    </div>
                </form>
                <?php } ?>
            </div>
        </div>
    </div>
</div>

<?=$this->load->view('painel/default/footer',[],TRUE);?>