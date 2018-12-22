<?=$this->load->view('site/conta/painel/default/head',[
    'titulo' => 'Guias de Instalação',
    'page_url' => base_url().'conta/guias/instalacao'
],TRUE);?>

<div class="row">
    <div class="col-12">
        <h3>Guias de Instalação</h3> 
    </div>
    <?php
        if(isset($guias_instalacao)):
            foreach($guias_instalacao as $key):
    ?>
    <div class="col-sm-12 col-md-12 col-lg-3">
        <a href="<?=$key->video_url;?>" target="_blank">
            <div class="invl-guia-instalacao-item">
                <img class="img-fluid" src="<?=$key->imagem_url;?>">
                <p><?=$key->titulo;?></p>
            </div>
        </a>
    </div>
    <?php endforeach; else: ?>
    <div class="col-12">
        <div class="text-center">
            <p>Nenhum guia encontrado.</p>
        </div>
    </div>
    <?php endif; ?>
</div>

<?=$this->load->view('site/conta/painel/default/footer',[],TRUE);?>