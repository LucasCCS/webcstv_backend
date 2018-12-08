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
                    <!-- <div class="row">
                        <div class="col-12">
                            CardSharing <input type="radio" name="plano_tipo" value="<?=PLANO_TIPO_CS?>"> | IPTV <input type="radio" name="plano_tipo" value="<?=PLANO_TIPO_IPTV?>">
                        </div>
                    </div> -->
                    <div class="row">
                        <div class="col-sm-12 col-md-12 col-lg-6">
                            <label>Título</label>
                            <input class="form-control form-control-lg" type="text" name="titulo">
                           
                        </div>
                        <div class="col-sm-12 col-md-12 col-lg-6">
                            <label>Valor</label>
                            <input class="form-control form-control-lg" type="text" name="valor">
                            <small>Não é necessário inserir o "$".</small>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-12 col-md-12 col-lg-6">
                            <label>Url PagSeguro</label>
                            <input class="form-control form-control-lg" type="text" name="pagseguro_codigo">
                           
                        </div>
                        <div class="col-sm-12 col-md-12 col-lg-6">
                            <label>Url MercadoPago</label>
                            <input class="form-control form-control-lg" type="text" name="mercadopago_codigo">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12">
                            <label>Descrição</label>
                           <textarea class="form-control" name="descricao" rows="4"></textarea>
                            <small>Neste campo é permitido a utilização de tags html.</small>
                        </div>
                    </div>  

                    <div class="text-right">
                        <input class="btn btn-primary btn-lg" type="submit" name="novo_plano" value="Criar Plano">
                    </div>                 
                </form>
            </div>
        </div>
    </div>
</div>
<?=$this->load->view('painel/default/footer',[],TRUE);?>