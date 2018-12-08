<?=$this->load->view('painel/default/head',[],TRUE);?>
<div class="row">
  <div class="col-12 d-flex">
    <div class="ml-auto">
      <a href="<?=base_url();?>painel/pagina/nova" class="btn btn-primary btn-lg">Nova Página</a>
    </div>
  </div>
</div>
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-block">
            <table class="table">
              <thead>
                <tr>
                  <th></th>
                  <th scope="col">Slug</th>
                  <th scope="col">Título</th>
                  <th scope="col">Opções</th>
                </tr>
              </thead>
              <tbody data-sortable="<?=base_url();?>atualizar/posicao/paginas">
                <?php
                    if (isset($paginas)) {
                        foreach ($paginas as $key) {
                ?>
                  <tr id="page_<?=$key->id_page;?>" item-id="<?=$key->id_page;?>">
                      <td><i class="mdi mdi-menu"></i></td>
                      <td><?=$key->slug;?></td>
                      <td><?=$key->titulo;?></td>
                      <td>
                        <a href="<?=base_url();?>painel/pagina/editar/<?=$key->id_page;?>"><i class="fas fa-pen-square"></i></a>
                        <a href="<?=base_url();?>painel/pagina/apagar/<?=$key->id_page;?>"><i class="fas fa-trash"></i></a>
                      </td>
                  </tr>
                <?php
                        }
                    }
                ?>
              </tbody>
            </table>
          </div>
        </div>
    </div>
</div>    
<?=$this->load->view('painel/default/footer',[],TRUE);?>