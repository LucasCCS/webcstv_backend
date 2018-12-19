<?=$this->load->view('painel/default/head',[],TRUE);?>
<div class="row">
  <div class="col-12 d-flex">
    <div class="ml-auto">
      <a href="<?=base_url();?>painel/faq/novo" class="btn btn-primary btn-lg">Novo FAQ</a>
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
                  <th scope="col">Titulo</th>
                  <th><i class="mdi mdi-settings"></i></th>
                </tr>
              </thead>
              <tbody>
                <?php
                    if (isset($faqs)) {
                        foreach ($faqs as $key) {   

                                echo '<tr>
                                    <td>'.$key->titulo.'</td>
                                    <td>
                                      <a href="'.base_url().'painel/faq/editar/'.$key->id_faq.'" class="btn btn-primary btn-small"><i class="mdi mdi-pencil"></i></a>
                                     <a href="'.base_url().'painel/faq/apagar/'.$key->id_faq.'" class="btn btn-danger btn-small"><i class="mdi mdi-delete"></i></a>  
                                      </td>
                                </tr>';
                        }
                    } else {
                      echo '<tr>
                        <td colspan="6" class="text-center">Nenhum FAQ cadastrado.</td>
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