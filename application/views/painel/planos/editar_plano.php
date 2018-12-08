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
                        <div class="col-12">
                            CardSharing <input type="radio" name="plano_tipo"  value="<?=PLANO_TIPO_CS;?>" <?=set_radio('tipo',PLANO_TIPO_CS,$plano['tipo'] == PLANO_TIPO_CS ? TRUE : FALSE);?>> | IPTV <input type="radio" name="plano_tipo" value="<?=PLANO_TIPO_IPTV;?>" <?=set_radio('tipo',PLANO_TIPO_IPTV,$plano['tipo'] == PLANO_TIPO_IPTV ? TRUE : FALSE);?>>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-12 col-md-12 col-lg-6">
                            <label>Título</label>
                            <input class="form-control form-control-lg" type="text" name="titulo" value="<?=$plano['titulo'];?>">
                           
                        </div>
                        <div class="col-sm-12 col-md-12 col-lg-6">
                            <label>Valor</label>
                            <input class="form-control form-control-lg" type="text" name="valor" value="<?=$plano['valor'];?>">
                            <small>Não é necessário inserir o "$".</small>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-12 col-md-12 col-lg-6">
                            <label>Número de Operadoras</label>
                            <input class="form-control form-control-lg" type="text" name="operadoras" value="<?=$plano['operadoras'];?>">
                            <small>Número de operadoras limite.</small>
                        </div>
                        <div class="col-sm-12 col-md-12 col-lg-6">
                            <label>Número de Conexões</label>
                            <input class="form-control form-control-lg" type="text" name="conexoes" value="<?=$plano['conexoes'];?>">
                            <small>Número de conexões limite.</small>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12">
                            <label>Duração</label>
                            <input class="form-control form-control-lg" type="text" name="dias" value="<?=$plano['dias'];?>">
                            <small>Duração padrão do plano em dia(s).</small>
                        </div>
                    </div>  
                    <div class="row">
                        <div class="col-sm-12 col-md-12 col-lg-6">
                            <label>Código PagSeguro</label>
                            <input class="form-control form-control-lg" type="text" name="pagseguro_codigo" value="<?=$plano['pagseguro_codigo'];?>">
                           
                        </div>
                        <div class="col-sm-12 col-md-12 col-lg-6">
                            <label>Código MercadoPago</label>
                            <input class="form-control form-control-lg" type="text" name="mercadopago_codigo" value="<?=$plano['mercadopago_codigo'];?>">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12">
                            <label>Descrição</label>
                           <textarea class="form-control" name="descricao" rows="4"><?=$plano['descricao'];?></textarea>
                            <small>Neste campo é permitido a utilização de tags html.</small>
                        </div>
                    </div>     
                    <div class="row">
                        <div class="col-12">
                            <label>Chave DES</label>
                            <input class="form-control form-control-lg" type="text" name="chave_des" <?=$plano['chave_des'];?>>
                        </div>
                    </div>   
                    <div class="row">
                        <div class="col-12">
                            <label>Tipo</label><br>
                            Servidor Normal <input type="radio" name="tipo" value="<?=PLANO_NORMAL;?>" <?php echo set_value('tipo', $plano['tipo']) == PLANO_NORMAL ? "checked" : "";?>> Servidor Net <input type="radio" name="tipo" value="<?=PLANO_NET;?>" <?php echo set_value('tipo', $plano['tipo']) == PLANO_NET ? "checked" : "";?>>
                        </div>
                    </div>              
                    <input class="btn btn-success" type="submit" name="editar_plano" value="Concluir">
                </form>
            </div>
        </div>
    </div>
</div>
<?=$this->load->view('painel/default/footer',[],TRUE);?>