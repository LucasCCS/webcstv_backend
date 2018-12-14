<section class="invl-faq">
    <div class="container">
        <div class="invl-faq-content">
            <ul class="invl-faq-list">
                <?php if (isset($faq)): $i = 1; foreach ($faq as $key): ?>
                <li class="invl-faq-list-item" data-toggle="collapse" href="#collapse-faq-<?=$i;?>" role="button" aria-expanded="false" aria-controls="collapse-faq-<?=$i;?>"><h3><?=$key->titulo;?></h3>
                <div class="collapse" id="collapse-faq-<?=$i;?>">
                    <div class="card card-body">
                        <?=$key->descricao;?>
                    </div>
                </div>
                </li>
                
                <?php $i++; endforeach; endif;?>           
            </ul>
        </div>        
    </div>
</section>