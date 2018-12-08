<nav class="invl-navbar">
    <div class="container d-flex">
        <div class="invl-navbar-brand">
            <img class="img-fluid" src="<?=base_url();?>public/images/logo.png">
        </div>
        <div class="invl-navbar-toggle ml-auto" invl-toggle-menu="#menu"><i class="fa fa-bars"></i></div>
        <div class="invl-navbar-nav invl-collapse-mb ml-auto">
            <?=$this->load->view('site/default/nav',[],TRUE);?>
        </div>
    </div>
</nav>