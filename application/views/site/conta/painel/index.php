<?=$this->load->view('site/conta/painel/default/head',[],TRUE);?>

<div class="row">
    <!-- clientes ativos -->
    <div class="col-sm-12 col-md-12 col-lg-12">
        <div class="card card-inverse card-primary mb-3 text-center">
            <div class="card-block">
                <h1 style="color: #fff;"><i class="mdi mdi-calendar-clock"></i></h1><p> 
                <?php
                    $date1 = time();
                    $date2 = $this->cliente_servidor_principal['data_premio'];
                    $tempo = $date2 - $date1;
                    echo round($tempo / (60 * 60 * 24)).' Dia(s) Restante(s)';
                ?></p>
            </div>
        </div>
    </div>
</div>

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