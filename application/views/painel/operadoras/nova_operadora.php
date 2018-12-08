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
                            <label>Titulo</label>
                            <input class="form-control form-control-lg" type="text" name="titulo">
                           
                        </div>
                        <div class="col-sm-12 col-md-12 col-lg-6">
                            <label>Imagem Logo Url</label>
                            <input class="form-control form-control-lg" type="text" name="imagem_logo">
                        </div>
                    </div>  
                    <div class="row">
                        <div class="col-sm-12 col-md-12 col-lg-4">
                            <label>Url Servidor</label>
                            <input class="form-control form-control-lg" type="text" name="url">
                           
                        </div>
                        <div class="col-sm-12 col-md-12 col-lg-4">
                            <label>Porta Servidor</label>
                            <input class="form-control form-control-lg" type="text" name="porta">
                        </div>
                        <div class="col-sm-12 col-md-12 col-lg-4">
                            <label>Perfil Servidor</label>
                            <input class="form-control form-control-lg" type="text" name="perfil">
                        </div>
                    </div>            
                    <input class="btn btn-success" type="submit" name="nova_operadora" value="Concluir">
                </form>
            </div>
        </div>
    </div>
</div>
<?=$this->load->view('painel/default/footer',[],TRUE);?>