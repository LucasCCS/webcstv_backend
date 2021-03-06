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
                        <div class="col-12 text-center">
                             <input type="radio" name="plano_tipo" value="<?=PLANO_TIPO_CS?>" id="cs" <?=set_radio('plano_tipo',PLANO_TIPO_CS,$plano['plano_tipo'] == PLANO_TIPO_CS ? TRUE : FALSE);?>> <label for="cs" style="padding-left: 0px;">CardSharing</label> | <input type="radio" name="plano_tipo" value="<?=PLANO_TIPO_IPTV?>" id="iptv" <?=set_radio('plano_tipo',PLANO_TIPO_IPTV,$plano['plano_tipo'] == PLANO_TIPO_IPTV ? TRUE : FALSE);?>> <label for="iptv" style="padding-left: 0px;">IPTV</label>
                        </div>
                    </div>
                    <div class="row mt-4">
                        <div class="col-sm-12 col-md-12 col-lg-6">
                            <label>Título</label>
                            <input class="form-control form-control-lg" type="text" name="titulo" value="<?=$plano['titulo'];?>">
                           
                        </div>
                        <div class="col-sm-12 col-md-12 col-lg-6">
                            <label>Sub-Título</label>
                            <input class="form-control form-control-lg" type="text" name="subtitulo"  value="<?=$plano['subtitulo'];?>">   
                        </div>
                    </div>
                    <div class="row mt-2">
                        <div class="col-sm-12 col-md-12 col-lg-12">
                            <label>Duração do Plano (em dias)</label>
                            <input class="form-control form-control-lg" type="text" name="dias" value="<?=$plano['dias'];?>">
                        </div>
                        <div class="col-sm-12 col-md-12 col-lg-6">
                            <label>Valor do Plano</label>
                            <input class="form-control form-control-lg" type="text" name="valor" value="<?=$plano['valor'];?>">
                            <small>Não é necessário inserir o "$".</small>
                        </div>
                        <div class="col-sm-12 col-md-12 col-lg-12">
                            <label>Valor Antigo</label>
                            <input class="form-control form-control-lg" type="text" name="valor_antigo" placeholder="0,00" value="<?=$plano['valor_antigo'];?>">
                        </div>
                    </div>
                    <div class="row mt-2">
                        <div class="col-sm-12 col-md-12 col-lg-4">
                            <label>Código PagSeguro</label>
                            <input class="form-control form-control-lg" type="text" name="pagseguro_codigo" value="<?=$plano['pagseguro_codigo'];?>">
                           
                        </div>
                        <div class="col-sm-12 col-md-12 col-lg-4">
                            <label>Código MercadoPago</label>
                            <input class="form-control form-control-lg" type="text" name="mercadopago_codigo" value="<?=$plano['mercadopago_codigo'];?>">
                        </div>
                        <div class="col-sm-12 col-md-12 col-lg-4">
                            <label>Código Paypal</label>
                            <input class="form-control form-control-lg" type="text" name="paypal_codigo" value="<?=$plano['paypal_codigo'];?>">
                        </div>
                    </div>
                    <div class="row mt-2">
                        <div class="col-sm-12 col-md-12 col-lg-8">
                            <label>Url Gerador de Teste</label>
                            <input class="form-control form-control-lg" type="text" name="url_teste" value="<?=$plano['url_teste'];?>">                     
                        </div>
                        <div class="col-sm-12 col-md-12 col-lg-4">
                            <label>Duração do Teste</label>
                            <input class="form-control form-control-lg" type="text" name="duracao_teste" value="<?=$plano['duracao_teste'];?>">                     
                        </div>
                    </div>
                    <div class="row mt-2">
                        <div class="col-12">
                            <label>Descrição</label>
                           <textarea class="form-control" name="descricao" rows="4"><?=$plano['descricao'];?></textarea>
                            <small>Neste campo é permitido a utilização de tags html.</small>
                        </div>
                    </div>          
                    <div class="text-right">      
                        <input class="btn btn-primary btn-lg" type="submit" name="editar_plano" value="Concluir">
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<?=$this->load->view('painel/default/footer',[],TRUE);?>