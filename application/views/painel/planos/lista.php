<?=$this->load->view('painel/default/head',[],TRUE);?>
<?php
  if($this->session->flashdata('sub_plano_adicionado') != null) {
    echo '<div class="alert alert-success">'.$this->session->flashdata('sub_plano_adicionado').'</div>';
  }
?>
<div class="row">
  <div class="col-12 d-flex">
    <div class="ml-auto">
      <a href="<?=base_url();?>painel/plano/novo" class="btn btn-primary btn-lg">Novo Plano</a>
    </div>
  </div>
</div>
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
                  <th scope="col">Título</th>
                  <th scope="col">Valor</th>
                  <th scope="col">Duração</th>
                  <th scope="col">Descrição</th>
                  <th><i class="mdi mdi-settings"></i></th>
                </tr>
              </thead>
              <tbody>
                <?php
                    if (isset($planos)) {
                        foreach ($planos as $key) {   

                                echo '<tr>
                                    <td>'.$key->titulo.'</td>
                                    <td>'.$key->valor.'</td>
                                    <td>'.$key->dias.' dia(s)</td>
                                    <td>'.$key->descricao.'</td>
                                    <td>
                                      <a href="'.base_url().'painel/plano/editar/'.$key->id_plano.'" class="btn btn-primary btn-small"><i class="mdi mdi-pencil"></i></a>
                                      <a href="'.base_url().'painel/plano/apagar/'.$key->id_plano.'" class="btn btn-danger btn-small"><i class="mdi mdi-delete"></i></a>
                                      <a data-toggle="collapse" href="#subPlanos-'.$key->id_plano.'" role="button" aria-expanded="false" aria-controls="subPlanos-'.$key->id_plano.'" class="btn btn-secondary btn-small"><i class="mdi mdi-file-tree"></i></a>
                                    </td>
                                    
                                </tr>
                                <tr style="background-color: #eee;" class="collapse" id="subPlanos-'.$key->id_plano.'">
                                    <td colspan="45">
                                      <div class="float-right">Adicionar Sub-Plano 
                                        <a class="btn btn-primary btn-sm" invl-modal-toggle="#adicionar_sub_plano_'.$key->id_plano.'" href="#adicionar_sub_plano_'.$key->id_plano.'">
                                          <i class="mdi mdi-plus"></i>
                                        </a>
                                      </div>
                                      <div class="invl-modal" id="adicionar_sub_plano_'.$key->id_plano.'">
                                          <div class="float-right" invl-modal-hide="#adicionar_sub_plano_'.$key->id_plano.'" style="cursor: pointer;">
                                            <i class="mdi mdi-close"></i>
                                          </div>
                                          <form method="post" style="margin-top: 10px;">
                                            <input type="hidden" name="id_plano" value="'.$key->id_plano.'">
                                            <label>Duração em dia(s)</label>
                                            <input class="form-control" type="number" name="dias" placeholder="0" required>
                                            <div class="row">
                                              <div class="col-sm-12 col-md-12 col-lg-6">
                                                <label>Valor</label>
                                                <input class="form-control" type="text" name="valor" placeholder="0,00" required>
                                              </div>
                                              <div class="col-sm-12 col-md-12 col-lg-6">
                                                <label>Valor Antigo</label>
                                                <input class="form-control" type="text" name="valor_antigo" placeholder="0,00" required>
                                              </div>
                                            </div>
                                            <label>Código PagSeguro</label>
                                            <input class="form-control" type="text" name="pagseguro_codigo" required>
                                            <label>Código MercadoPago</label>
                                            <input class="form-control" type="text" name="mercadopago_codigo" required>
                                            <small>Código informado ao gerar o plano de pagamento na plataforma.</small><br>
                                            <div class="text-right">
                                              <input class="btn btn-primary btn-lg" type="submit" name="adicionar_sub_plano" value="Adicionar">
                                            </div>
                                            </form>
                                      </div>
                                      ';
                                
                              // sub_planos
                              if(isset($sub_planos)) {
                                echo '
                                <table class="table">
                                  <thead>
                                    <tr>
                                      <th scope="col">Duração</th>
                                      <th scope="col">Valor</th>
                                      <th><i class="mdi mdi-settings"></i></th>
                                    </tr>
                                  </thead>
                                  <tbody>';
                                foreach ($sub_planos as $s_key) {
                                    if($key->id_plano == $s_key->id_plano) {
                                    echo '
                                    
                                        <tr>
                                          <td>'.$s_key->dias.' dia(s)</td>
                                          <td>R$ '.$s_key->valor.'</td>
                                          <td>
                                            <a href="'.base_url().'painel/sub/plano/apagar/'.$s_key->id_sub_plano.'" class="btn btn-danger btn-small"><i class="mdi mdi-delete"></i></a>
                                          </td>
                                        </tr>

                                    ';
                                    }
                                  }
                                  echo '                                      
                                    </tbody>
                                  </table>';
                                }
                                echo '</td>
                                </tr>';
                        }
                    } else {
                      echo '<tr>
                        <td colspan="6" class="text-center">Nenhum plano cadastrado.</td>
                      </tr>';
                    }
                ?>
              </tbody>
            </table>
            </div>
        </div>
    </div>
</div>
<?=$this->load->view('painel/default/footer',[],TRUE);?>