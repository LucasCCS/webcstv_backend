<?=$this->load->view('site/conta/painel/default/head',[],TRUE);?>

<div class="row">
    <div class="col-12">
        <h3>Dados da Assinatura</h3>
        <p>Todas as informações de seu Plano de Assinatura</p>  
    </div>
    <div class="col-12">
        <div class="card">
            <div class="card-block">
                <div class="row">
                    <div class="col-sm-12 col-md-12 col-lg-3 text-center">
                        <img class="img-fluid" src="<?=base_url();?>public/images/default_user.png">
                    </div>
                    <div class="col-sm-12 col-md-12 col-lg-9">
                        <div class="invl-panel-table">
                            <table class="table">
                                <tbody>
                                    <tr>
                                        <td>Situação:</td>
                                        <td>Ativo</td>
                                    </tr>
                                    <tr>
                                        <td>Vencimento:</td>
                                        <td><?=date('d/m/Y - h:i:s',$this->cliente_servidor_principal['data_premio']);?></td>
                                    </tr>
                                    <tr>
                                        <td>Status:</td>
                                        <td>
                                            <?php
                                                $date1 = time();
                                                $date2 = $this->cliente_servidor_principal['data_premio'];
                                                $tempo = $date2 - $date1;
                                                echo round($tempo / (60 * 60 * 24)).' dia(s) restante(s)';
                                            ?>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Plano:</td>
                                        <td><?=$this->cliente['titulo'];?></td>
                                    </tr>
                                    <tr>
                                        <td>Mensalidade:</td>
                                        <td><?=$this->cliente['valor'];?></td>
                                    </tr>
                                    <tr>
                                        <td>Operadora(s):</td>
                                        <td>
                                            <?php
                                                if($this->cliente['tipo'] == PLANO_NET) {
                                                    echo $this->cliente['titulo'];
                                                } else {
                                                    if (isset($cliente_operadoras)) {
                                                        foreach($cliente_operadoras as $key) {
                                                            echo $key->titulo.' ';
                                                        }
                                                    }
                                                }                                             
                                            ?>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td colspan="2" class="text-center"><strong>Dados de Conexão</strong></td>
                                    </tr>
                                    <tr>
                                        <td>URL(s):</td>
                                        <td>
                                            <?php
                                                if (isset($cliente_operadoras)) {
                                                    foreach($cliente_operadoras as $key) {
                                                        echo '<span class="badge badge-default">'.$key->titulo.'</span>: '.$key->url.'<br>';
                                                    }
                                                }
                                            ?>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Porta(s):</td>
                                        <td>
                                            <?php
                                                if (isset($cliente_operadoras)) {
                                                    foreach($cliente_operadoras as $key) {
                                                        echo '<span class="badge badge-default">'.$key->titulo.'</span>: '.$key->porta.'<br>';
                                                    }
                                                }
                                            ?>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Chave DES:</td>
                                        <td><?=$this->cliente['chave_des'];?></td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?=$this->load->view('site/conta/painel/default/footer',[],TRUE);?>