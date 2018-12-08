<?=$this->load->view('painel/default/head',[],TRUE);?>
<?php
  if($this->session->flashdata('mensagem_sucesso') != null) {
    echo '<div class="alert alert-success">'.$this->session->flashdata('mensagem_sucesso').'</div>';
  }
?>
<!-- <div class="row">
  <div class="col-12 d-flex">
    <div class="ml-auto">
      <a href="<?=base_url();?>painel/historico/pagamentos/novo" class="btn btn-success btn-lg">Novo Histórico</a>
    </div>
  </div>
</div> -->
<!-- <div class="row">
  <div class="col-12">
    <input class="form-control form-control-lg" type="text" placeholder="Buscar Cliente">
  </div>
</div> -->
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-block">
            <table class="table">
              <thead>
                  <tr>
                      <th scope="col">Cliente</th>
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
                                echo '<tr class="bg-danger" style="color: #fff; opacity: .6;">';
                            break;
                            case COMPROVANTE_CANCELADO:
                                echo '<tr style="color: #616161; background-color: #cacaca; opacity: .6;">';
                            break;
                            case COMPROVANTE_CANCELADO_USUARIO:
                                echo '<tr style="color: #616161; background-color: #cacaca; opacity: .6;">';
                            break;
                        }
                    ?>
                        <td><?=$key->nome;?> (<?=$key->email;?>)</td>
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
                                <a class="btn btn-info" href="<?=$key->comprovante_imagem;?>" target="_blank"><i class="mdi mdi-eye-outline"></i> Ver</a>
                                <?php
                                    if($key->status == COMPROVANTE_EM_AVALIACAO) {
                                ?>    
                                    <form method="post">
                                      <input type="hidden" name="id_cliente_historico_pagamento" value="<?=$key->id_cliente_historico_pagamento;?>">
                                      <button type="submit" name="aceitar_historico_pagamento" class="btn btn-success"><i class="mdi mdi-check"></i> Aceitar</button>
                                    </form>
                                    <form method="post">
                                      <input type="hidden" name="id_cliente_historico_pagamento" value="<?=$key->id_cliente_historico_pagamento;?>">
                                      <button type="submit" name="recusar_historico_pagamento" class="btn btn-danger"><i class="mdi mdi-close"></i> Recusar</button>
                                    </form>
                                    
                                <?php
                                    } else {
                                ?>
                                    <form method="post">
                                      <input type="hidden" name="id_cliente_historico_pagamento" value="<?=$key->id_cliente_historico_pagamento;?>">
                                      <button type="submit" name="resetar_historico_pagamento" class="btn btn-secondary"><i class="mdi mdi-backup-restore"></i> Resetar</button>
                                    </form> 
                                <?php
                                    }
                                ?>
                                <a class="btn btn-danger" href="<?=base_url()?>painel/historico/pagamentos/apagar/<?=$key->id_cliente_historico_pagamento;?>"><i class="mdi mdi-delete"></i> Apagar</a>
                        </td>
                    </tr>
                    <?php endforeach; ?>
                <?php else: ?>
                    <tr>
                        <td class="text-center" colspan="6"><p>Nenhum registro encontrado em sistema.</p></td>
                    </tr>
                <?php endif; ?>
              </tbody>
            </table>
            </div>
        </div>
    </div>
</div>
<?=$this->load->view('painel/default/footer',[],TRUE);?>