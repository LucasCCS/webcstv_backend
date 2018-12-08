<?=$this->load->view('site/conta/painel/default/head',[],TRUE);?>
<?php
    // comprovante_status
    if ($this->session->flashdata('comprovante_status') !== null) {
        echo '<div class="alert alert-success">'.$this->session->flashdata('comprovante_status').'</div>';
    }
    // comprovante_success
    if ($this->session->flashdata('comprovante_success') !== null) {
        echo '<div class="alert alert-success">'.$this->session->flashdata('comprovante_success').'</div>';
    }
    // comprovante_error
    if ($this->session->flashdata('comprovante_error') !== null) {
        echo '<div class="alert alert-danger">'.$this->session->flashdata('comprovante_error').'</div>';
    }
?>
<div class="row">
    <div class="col-12">
        <h3>Histórico de Pagamentos</h3> 
    </div>
    <div class="col-12">
        <div class="card">
            <div class="card-block">
                
                <table class="table">
                    <thead class="thead-light">
                        <tr>
                            <th scope="col">Data</th>
                            <th scope="col">Observações</th>
                            <th scope="col">Plano</th>
                            <th scope="col">Status</th>
                            <th scope="col"><i class="mdi mdi-settings"></i></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php if(isset($historico_pagamentos)): ?>
                            <?php foreach($historico_pagamentos as $key): 
                                switch($key->status) {
                                    case COMPROVANTE_EM_AVALIACAO: 
                                        echo '<tr class="bg-warning" style="color: #fff;">';
                                    break;
                                    case COMPROVANTE_APROVADO:
                                        echo '<tr class="bg-success">';
                                    break;
                                    case COMPROVANTE_REPROVADO:
                                        echo '<tr class="bg-danger" style="color: #fff;">';
                                    break;
                                    case COMPROVANTE_CANCELADO:
                                        echo '<tr style="color: #616161; background-color: #cacaca; opacity: .6;">';
                                    break;
                                    case COMPROVANTE_CANCELADO_USUARIO:
                                        echo '<tr style="color: #616161; background-color: #cacaca; opacity: .6;">';
                                    break;
                                }
                            ?>
                            
                                <td><?=date('d/m/Y - h:i:s',$key->data_pagamento);?></td>
                                <td><?=$key->observacoes;?></td>
                                <td><?=$key->titulo;?></td>
                                <td>
                                    <?php
                                        switch($key->status) {
                                            case COMPROVANTE_EM_AVALIACAO: 
                                                echo 'Avaliação Pendente';
                                            break;
                                            case COMPROVANTE_APROVADO:
                                                echo 'Aprovado';
                                            break;
                                            case COMPROVANTE_REPROVADO:
                                                echo 'Recusado';
                                            break;
                                            case COMPROVANTE_CANCELADO:
                                                echo 'Cancelado pelo Administrador';
                                            break;
                                            case COMPROVANTE_CANCELADO_USUARIO:
                                                echo 'Envio Cancelado';
                                            break;
                                        }
                                    ?>
                                </td>
                                <td>
                                    <form method="post">
                                        <a class="btn btn-info" href="<?=$key->comprovante_imagem;?>" target="_blank"><i class="mdi mdi-eye-outline"></i></a>
                                        <?php
                                            if($key->status == COMPROVANTE_EM_AVALIACAO) {
                                        ?>    
                                            <input type="hidden" name="cancel_historico_pagamento" value="<?=$key->id_cliente_historico_pagamento;?>">
                                            <button type="submit" class="btn btn-danger"><i class="mdi mdi-close-box"></i></button>
                                        <?php
                                            } else {
                                                echo '<button type="button" style="opacity: .5;" class="btn btn-secondary btn-disabled"><i class="mdi mdi-block-helper"></i></button>';
                                            }
                                        ?>
                                    </form>
                                </td>
                            </tr>
                            <?php endforeach; ?>
                        <?php else: ?>
                            <tr>
                                <td class="text-center" colspan="4"><p>Nenhum registro encontrado em sistema.</p></td>
                            </tr>
                        <?php endif; ?>
                    </tbody>
                </table>
                
                
            </div>
        </div>
    </div>
</div>

<?=$this->load->view('site/conta/painel/default/footer',[],TRUE);?>