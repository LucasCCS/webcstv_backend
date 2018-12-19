<?=$this->load->view('painel/default/head',[],TRUE);?>
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-block">
                <?=validation_errors();?>
                <form method="post">
                    <div>
                        <h4>Informações do Site</h4>
                        <label>Título do Site</label>
                        <input class="form-control" type="text" name="titulo" value="<?=$site['titulo'];?>">
                        <label>Slogan</label>
                        <input class="form-control" type="text" name="slogan" value="<?=$site['slogan'];?>">
                        <label>Descrição do Rodapé</label>
                        <textarea class="form-control" name="descricao_footer"><?=$site['descricao_footer'];?></textarea>
                    </div>
                    <div class="mt-5">
                        <h4>Informações de Contato</h4>
                        <label>Contato</label>
                        <input class="form-control" type="text" name="contato" value="<?=$site['contato'];?>">
                        <label>Whatsapp</label>
                        <input class="form-control" type="text" name="whatsapp" value="<?=$site['whatsapp'];?>">
                        <label>E-mail</label>
                        <input class="form-control" type="text" name="email" value="<?=$site['email'];?>">
                        <label>E-mail Formulários de Contato</label>
                        <input class="form-control" type="text" name="email_formularios" placeholder="E-mail Formulários" value="<?=$site['email_formularios'];?>">
                    </div>
                    <div class="mt-5">
                        <h4>Redes Sociais</h4>
                        <label>Facebook Url</label>
                        <input class="form-control" type="text" name="facebook" value="<?=$site['facebook'];?>">
                    </div>
                    <div class="text-right">
                        <input class="btn btn-primary btn-lg" type="submit" name="configuracoes_submit" value="Salvar">
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<?=$this->load->view('painel/default/footer',[],TRUE);?>