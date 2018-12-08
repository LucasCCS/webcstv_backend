<?=$this->load->view('painel/default/head',[],TRUE);?>
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-block">
                <?=validation_errors();?>
                <form method="post">
                    <input type="checkbox" id="nav_menu" name="nav_menu" value="1" checked><label for="nav_menu">Página Fixada</label>
                    <input class="form-control" type="text" name="titulo" value="<?php echo set_value('titulo'); ?>" placeholder="Título do Página" data-slug-titulo="#slug">
                    <textarea height="300px;" class="form-control" classic-editor name="conteudo" placeholder="Conteúdo da Página"><?php echo set_value('conteudo'); ?></textarea>
                    <input class="form-control" type="text" id="slug" value="<?php echo set_value('slug'); ?>" name="slug" placeholder="Slug da Página">                   
                   <div class="text-right">
                        <input class="btn btn-primary btn-lg" type="submit" name="nova_pagina" value="Criar Página">
                   </div>
                </form>
            </div>
        </div>
    </div>
</div>
<?=$this->load->view('painel/default/footer',[],TRUE);?>