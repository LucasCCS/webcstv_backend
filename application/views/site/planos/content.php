<!-- invl-plans -->
<section class="invl-plans invl-plans-page">
    <div class="container">
        <div class="invl-plans-header">
            <h1>Planos</h1>
            <p>Planos que cabem no seu bolso</p>
        </div>
        <div class="invl-plans-content">
            <div class="invl-plans-list">
                <div class="row">

                    <?php
                        if(isset($planos)):
                            foreach($planos as $key):
                    ?>

                    <div class="col-12 col-sm-12 col-md-12 col-lg-3">
                        <div class="invl-plans-list-item">
                            <div class="invl-plans-list-item-header">
                                <div class="invl-plans-list-item-header-title">
                                    <h2><?=$key->titulo;?></h2>
                                </div>
                                <div class="invl-plans-list-item-header-price">
                                    <h3><small>R$</small> <?=$key->valor;?></h3>
                                </div>
                            </div>
                            <div class="invl-plans-list-item-content">
                                <ul class="invl-plans-list-item-content-list">
                                    <?=$key->descricao;?>
                                    <li>
                                        <a class="invl-btn invl-btn-secondary" href="<?=base_url();?>cadastro">Selecionar Plano</a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <?php
                            endforeach;
                        endif;
                    ?>

                </div>
            </div>
        </div>
    </div>
</section>