<?=$this->load->view('site/default/navbar-fixed',[],TRUE);?>
<!-- invl-header -->
<header class="invl-header">
    <?=$this->load->view('site/default/navbar',[],TRUE);?>

    <div class="header-page" style="background-image: url('<?=base_url();?>public/images/bg-duvidas.jpg'); background-position: center;">
        <div class="container">
            <div class="header-page-content">
                <div class="row">
                    <div class="col-sm-12 col-md-12 col-lg-12">
                        <h1><?=$guia['header_titulo'];?></h1>
                    </div>
                </div>
            </div>
        </div>
    </div>
      
</header>