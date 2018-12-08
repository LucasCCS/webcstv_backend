<?=$this->load->view('painel/default/head',[],TRUE);?>
<div class="row">
  <div class="col-12 d-flex">
    <div class="ml-auto">
      <a href="<?=base_url();?>painel/operadora/nova" class="btn btn-success btn-lg">Nova Operadora</a>
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
                  <th scope="col">Logo</th>
                  <th scope="col">Url</th>
                  <th scope="col">Porta</th>
                  <th scope="col">Perfil</th>
                  <th><i class="mdi mdi-settings"></i></th>
                </tr>
              </thead>
              <tbody>
                <?php
                    if (isset($operadoras)) {
                        foreach ($operadoras as $key) {   

                                echo '<tr>
                                    <td>'.$key->titulo.'</td>
                                    <td><img src="'.$key->imagem_logo.'" width="68";></td>
                                    <td>'.$key->url.'</td>
                                    <td>'.$key->porta.'</td>
                                    <td>'.$key->perfil.'</td>
                                    <td>
                                      <a href="'.base_url().'painel/operadora/editar/'.$key->id_operadora.'" class="btn btn-success btn-small"><i class="mdi mdi-pencil"></i></a>
                                      <a href="'.base_url().'painel/operadora/apagar/'.$key->id_operadora.'" class="btn btn-danger btn-small"><i class="mdi mdi-delete"></i></a>  
                                    </td>
                                </tr>';
                        }
                    } else {
                      echo '<tr>
                        <td colspan="6" class="text-center">Nenhuma operadora cadastrada.</td>
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