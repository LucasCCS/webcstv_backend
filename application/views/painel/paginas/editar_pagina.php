<?=$this->load->view('painel/default/head',[],TRUE);?>
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-block">
                <?=validation_errors();?>
                <form method="post">
                    <input type="checkbox" id="nav_menu" name="nav_menu" value="1" <?php if($pagina['nav_menu']): echo 'checked'; endif;?>><label for="nav_menu">Página Fixada</label>
                    <input class="form-control" type="text" name="titulo" value="<?=$pagina['titulo'];?>" placeholder="Título do Produto">
                    <textarea class="form-control" classic-editor name="conteudo" placeholder="Conteúdo"><?=$pagina['conteudo'];?></textarea>
                    <input class="form-control" type="text" id="slug" value="<?=$pagina['slug'];?>" name="slug" placeholder="Slug da Pagina">
                   <div class="text-right">
                        <input class="btn btn-primary btn-lg" type="submit" name="editar_pagina" value="Salvar Página">
                   </div>                
                </form>
            </div>
        </div>
    </div>
</div>
<?=$this->load->view('painel/default/footer',[],TRUE);?>