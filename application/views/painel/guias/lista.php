<?=$this->load->view('painel/default/head',[],TRUE);?>
<div class="row">
  <div class="col-12 d-flex">
    <div class="ml-auto">
      <a href="<?=base_url();?>painel/guia/novo" class="btn btn-primary btn-lg">Novo Guia</a>
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
                  <th scope="col">Título</th>
                  <th scope="col">Thumbnail</th>
                  <th scope="col">Url</th>
                  <th><i class="mdi mdi-settings"></i></th>
                </tr>
              </thead>
              <tbody>
                <?php
                    if (isset($guias)) {
                        foreach ($guias as $key) {   

                                echo '<tr>
                                    <td>'.$key->id_guia_instalacao.'</td>
                                    <td>'.$key->titulo.'</td>
                                    <td><img width="200" src="'.$key->imagem_url.'"></td>
                                    <td>'.$key->video_url.'</td>
                                    <td>
                                      <a href="'.base_url().'painel/guia/editar/'.$key->id_guia_instalacao.'" class="btn btn-success btn-small"><i class="mdi mdi-pencil"></i></a>
                                      <a href="'.base_url().'painel/guia/apagar/'.$key->id_guia_instalacao.'" class="btn btn-danger btn-small"><i class="mdi mdi-delete"></i></a>                        
                                    </td>
                                </tr>';
                        }
                    } else {
                      echo '<tr>
                        <td colspan="6" class="text-center">Nenhum guia cadastrado.</td>
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