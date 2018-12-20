<!DOCTYPE HTML>
<html lang="pt-BR">

<head>
<meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="shortcut icon" href="<?=base_url()?>public/images/favicon.png">
    <link rel="stylesheet" href="<?=base_url()?>public/css/styles.css">
    <link rel="stylesheet" href="<?=base_url()?>public/slick/slick.css">
    <link rel="stylesheet" href="<?=base_url()?>public/css/animate.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css" integrity="sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU" crossorigin="anonymous">
    <title><?=$titulo[0];?> | <?=$titulo[1];?></title>
</head>

<body class="<?php if(isset($body_class)): echo $body_class; endif;?>">
<?=$this->load->view('site/default/modal',[],TRUE);?>
<?php if($this->uri->segment(1) != 'conta' && $this->uri->segment(1) != 'cadastro'): ?>
<div class="invl-top-menu hidden-sm-down">
    <div class="container">
        <ul class="invl-top-menu-list">
            <li class="dropdown">
                <a class="dropdown-toggle" href="#" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Guias de Instalação</a>
                <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">             
                    <?php
                        if (isset($this->guiasInstalacao)) {
                            foreach ($this->guiasInstalacao as $guia) {
                                echo '<a class="dropdown-item" href="'.base_url().'guias/'.$guia->guia_slug.'">'.$guia->titulo.'</a>';
                            }
                        }
                    ?>
                </div>
            </li>
            <li>
                <a href="<?=base_url();?>duvidas-frequentes">Dúvidas Frequentes</a>
            </li>
            <li><a href="<?=base_url();?>sobre">Sobre Nós</a></li>
        </ul>
    </div>
</div>
<?php endif; ?>