<!DOCTYPE HTML>
<html lang="pt-BR">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta author="Inovlab | Desenvolvimento Web">
    <title>Painel Administrativo | <?=$this->site['titulo'];?></title>
    <link rel="shortcut icon" href="<?=base_url();?>public/images/favicon.ico" type="image/x-icon">
    <link href="https://fonts.googleapis.com/css?family=Dosis:700,800|Open+Sans:400,600,700,800" rel="stylesheet">
    <link href="<?=base_url();?>public/admin/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="<?=base_url();?>public/slick/slick.css"/>
    <link rel="stylesheet" href="<?=base_url();?>public/css/jquery.flipster.min.css"/>
    <link rel="stylesheet" href="<?=base_url();?>public/css/lightbox.min.css"/>
    <link href="<?=base_url();?>public/admin/plugins/chartist-plugin-tooltip-master/dist/chartist-plugin-tooltip.css" rel="stylesheet">
    <link href="<?=base_url();?>public/admin/plugins/c3-master/c3.min.css" rel="stylesheet">
    <link href="<?=base_url();?>public/admin/css/style.css" rel="stylesheet">
    <link href="<?=base_url();?>public/admin/css/colors/orange.css" id="theme" rel="stylesheet">
    <link href="<?=base_url();?>public/admin/plugins/jquery-ui/jquery-ui.min.css" rel="stylesheet">
    <link href="<?=base_url();?>public/admin/js/ui/trumbowyg.css" rel="stylesheet"> 
</head>

<body class="fix-header fix-sidebar card-no-border">
    <!-- preloader -->
    <div class="preloader">
        <svg class="circular" viewBox="25 25 50 50">
            <circle class="path" cx="50" cy="50" r="20" fill="none" stroke-width="2" stroke-miterlimit="10" /> </svg>
    </div>
    <!-- preloader -->
    <?php if($this->uri->segment(2) != "login"): ?>
    <div id="main-wrapper">
        <?=$this->load->view('site/conta/painel/default/header',[],TRUE);?>
        <?php
            if($this->uri->segment(2) == "produto" && $this->uri->segment(3) != "novo") {
                echo $this->load->view('site/conta/painel/default/sidenav',[],TRUE);
            } else {
                echo $this->load->view('site/conta/painel/default/sidenav',[],TRUE);
            }
            
        ?>
        <div class="page-wrapper">
            <div class="container-fluid">
                <div class="row page-titles">
                    <div class="col-md-5 col-8 align-self-center">
                        <h3 class="text-themecolor">Principal</h3>
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="javascript:void(0)">Principal</a></li>
                            <li class="breadcrumb-item active">Visão Geral</li>
                        </ol>
                    </div>
                </div>
    <?php endif;?>