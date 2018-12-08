<nav class="invl-navbar invl-navbar-sm" fixed-navbar>
    <div class="container d-flex ">
        <div class="invl-navbar-brand">
            <img class="img-fluid mb-2" src="public/images/logo.png">
        </div>
        <div class="invl-navbar-toggle ml-auto" invl-toggle-menu="#menu"><i class="fa fa-bars"></i></div>
        <div class="invl-navbar-nav invl-collapse-mb ml-auto">
            <?=$this->load->view('site/default/nav',[],TRUE);?>
        </div>
    </div>
</nav>
<!-- invl-navbar-sm -->
<div class="invl-navbar-nav-sm" id="menu">
    <?=$this->load->view('site/default/nav',[],TRUE);?>
</div>