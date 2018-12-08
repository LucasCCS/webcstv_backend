<?=$this->load->view('painel/default/head',[],TRUE);?>
<div class="row">
  <div class="col-12 d-flex">
    <div class="ml-auto">
      <a href="<?=base_url();?>painel/cliente/novo" class="btn btn-success btn-lg">Novo Cliente</a>
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
                  <th scope="col">E-mail</th>
                  <th scope="col">Nome</th>
                  <th scope="col">Telefone</th>
                  <th scope="col">Status</th>
                  <th scope="col">Plano</th>
                  <th scope="col">Método de Pagamento</th>
                  <th><i class="mdi mdi-settings"></i></th>
                </tr>
              </thead>
              <tbody>
                <?php
                    if (isset($clientes)) {
                        foreach ($clientes as $key) {   
                          switch($key->status) {
                              case CLIENTE_INATIVO:
                                echo '<tr class="table-danger">';
                              break;
                              default:
                                echo '<tr>'; 
                              break;
                          }
                                echo '
                                    <td>'.$key->email.'</td>
                                    <td>'.$key->nome.'</td>
                                    <td>'.$key->telefone.'</td>
                                    <td>'.$this->clientestatus->getStatusCliente($key->status).'</td>
                                    <td>'.$key->cliente_plano_titulo.'</td>
                                    <td>'.$key->cliente_metodo_pagamento_titulo.'</td>
                                    <td>
                                      <a href="'.base_url().'painel/cliente/editar/'.$key->id_cliente.'" class="btn btn-success btn-small"><i class="mdi mdi-pencil"></i></a>
                                      <a href="'.base_url().'painel/cliente/apagar/'.$key->id_cliente.'" class="btn btn-danger btn-small"><i class="mdi mdi-delete"></i></a>
                                    </td>
                                </tr>';
                        }
                    } else {
                      echo '<tr>
                        <td colspan="6" class="text-center">Nenhum cliente cadastrado.</td>
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