<ul class="invl-navbar-navlist">
    <li><a href="<?=base_url();?>">Home</a></li>
    <li><a href="<?=base_url();?>planos">Planos</a></li>
    <li><a href="<?=base_url();?>duvidas-frequentes">Dúvidas Frequentes</a></li>
    <li><a href="<?=base_url();?>contato">Contato</a></li>
    <li><a class="btn btn-primary btn-hollow" href="#"><i class="fab fa-whatsapp mr-2"></i> Whatsapp</a></li>
    <?php if(!empty($this->cliente)): ?>
    <li><a class="btn btn-primary" href="<?=base_url();?>conta/principal"><i class="far fa-user mr-2"></i>Olá, <?=$this->cliente['nome'];?> </a></li>
    <?php else: ?>
    <li><a class="btn btn-primary" href="<?=base_url();?>conta/entrar"><i class="far fa-user mr-2"></i> Área do Cliente</a></li>
    <?php endif; ?>
</ul>