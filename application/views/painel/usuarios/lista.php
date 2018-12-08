<?=$this->load->view('painel/default/head',[],TRUE);?>
<div class="row">
  <div class="col-12 d-flex">
    <div class="ml-auto">
      <a href="<?=base_url();?>painel/usuario/novo" class="btn btn-primary btn-lg">Novo Usuário</a>
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
                  <th scope="col">#</th>
                  <th scope="col">Usuário</th>
                  <th><i class="mdi mdi-settings"></i></th>
                </tr>
              </thead>
              <tbody>
                <?php
                    if (isset($usuarios)) {
                        foreach ($usuarios as $key) {   

                                echo '<tr>
                                    <td>'.$key->id_usuario.'</td>
                                    <td>'.$key->usuario.'</td>
                                    <td>
                                      <a href="'.base_url().'painel/usuario/editar/'.$key->id_usuario.'" class="btn btn-success btn-small"><i class="mdi mdi-pencil"></i></a>
                                  ';  
                                  if(count($usuarios) > 1) {
                                    echo ' <a href="'.base_url().'painel/usuario/apagar/'.$key->id_usuario.'" class="btn btn-danger btn-small"><i class="mdi mdi-delete"></i></a>';
                                  }
                                echo '   
                                      </td>
                                </tr>';
                        }
                    } else {
                      echo '<tr>
                        <td colspan="6" class="text-center">Nenhum usuário cadastrado.</td>
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