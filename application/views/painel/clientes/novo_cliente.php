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
                            <label>Nome</label>
                            <input class="form-control form-control-lg" type="text" name="nome">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-12 col-md-12 col-lg-6">
                            <label>E-mail</label>
                            <input class="form-control form-control-lg" type="text" name="email">
                            <small>Utilizado como usuário de acesso do cliente.</small>
                        </div>
                        <div class="col-sm-12 col-md-12 col-lg-6">
                            <label>Telefone</label>
                            <input class="form-control form-control-lg" type="text" name="telefone">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12">
                            <label>Senha</label>
                            <input class="form-control form-control-lg" type="text" name="senha">
                            <small>Caso não deseja alterar a senha do usuário, deixe este campo em branco.</small>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-12 col-md-12 col-lg-12">
                            <label>Status</label>
                            <select class="form-control form-control-lg" name="status">
                                <option value="">Selecione um Status</option>
                                <?=$this->load->view('painel/clientes/templates/options_input_status',['selected' => $cliente['status']],TRUE);?>
                            </select>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-12 col-md-12 col-lg-6">
                            <label>Plano</label>
                            <select class="form-control form-control-lg" name="id_plano">
                                <option value="">Selecione um Plano</option>
                                <?php
                                    if (isset($planos)) {
                                        foreach ($planos as $key) {
                                ?>
                                <option value="<?=$key->id_plano;?>"><?=$key->titulo;?></option>
                                <?php                                          
                                        }
                                    }
                                ?>
                            </select>
                        </div>
                        <div class="col-sm-12 col-md-12 col-lg-6">
                            <label>Método de Pagamento</label>
                            <select class="form-control form-control-lg" name="id_metodo_pagamento">
                                <option value="">Selecione um Método de Pagamento</option>
                                <?php
                                    if (isset($metodos_pagamento)) {
                                        foreach ($metodos_pagamento as $key) {
                                ?>
                                <option value="<?=$key->id_metodo_pagamento;?>"><?=$key->titulo;?></option>
                                <?php
                                        }
                                    }
                                ?>
                            </select>
                        </div>
                    </div>
                    <input class="btn btn-success" type="submit" name="novo_cliente" value="Concluir">
                </form>
            </div>
        </div>
    </div>
</div>
<?=$this->load->view('painel/default/footer',[],TRUE);?>