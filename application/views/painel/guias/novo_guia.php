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
                            <label>Header Titulo</label>
                            <input class="form-control form-control-lg" type="text" name="header_titulo">                         
                        </div>
                    </div>   
                    <div class="row">
                        <div class="col-sm-12 col-md-12 col-lg-6">
                            <label>Url Thumbnail</label>
                            <input class="form-control form-control-lg" type="text" name="imagem_url">                         
                        </div>
                        <div class="col-sm-12 col-md-12 col-lg-6">
                            <label>Url Guia</label>
                            <input class="form-control form-control-lg" type="text" name="video_url">
                        </div>
                    </div>      
                    <div class="row">
                        <div class="col-sm-12 col-md-12 col-lg-12">
                            <label>Descrição</label>
                            <textarea name="descricao" class="form-control" rows="3"></textarea>
                        </div>
                    </div>      
                    <div class="text-right">
                        <input class="btn btn-primary btn-lg" type="submit" name="novo_guia" value="Criar Guia">
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<?=$this->load->view('painel/default/footer',[],TRUE);?>