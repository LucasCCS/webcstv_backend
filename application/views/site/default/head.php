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