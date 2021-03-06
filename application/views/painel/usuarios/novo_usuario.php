<?=$this->load->view('painel/default/head',[],TRUE);?>
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-block">
                <?php 
                    if (validation_errors() != null) {
                        echo validation_errors('<div class="alert alert-danger"> <i class="mdi mdi-close"></i>','</div>');
                    }
                ?>
                <?php
                    if ($this->session->flashdata('success') !== null) {
                        echo '<div class="alert alert-success"><i class="mdi mdi-check"></i> '.$this->session->flashdata('success').'</div>';
                    }
                ?>
                <form method="post">
                    <div class="row">
                        <div class="col-sm-12 col-md-12 col-lg-6">
                            <label>Usuario</label>
                            <input class="form-control form-control-lg" type="text" name="usuario">
                           
                        </div>
                        <div class="col-sm-12 col-md-12 col-lg-6">
                            <label>Senha</label>
                            <input class="form-control form-control-lg" type="text" name="senha">
                        </div>
                    </div>              
                    <div class="text-right">
                        <input class="btn btn-primary btn-lg" type="submit" name="novo_usuario" value="Criar Usuário">
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<?=$this->load->view('painel/default/footer',[],TRUE);?>