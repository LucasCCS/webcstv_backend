<?=$this->load->view('site/default/navbar-fixed',[],TRUE);?>
<!-- invl-header -->
<header class="invl-header">
    <?=$this->load->view('site/default/navbar',[],TRUE);?>
    <div id="carouselHeader" class="carousel slide" data-ride="carousel">
        <div class="carousel-inner">
            <div class="carousel-item active" style="background-image: url('public/images/header-bg-01.jpg');">
                <div class="container">
                    <div id="teste-gratuito">
                        <div class="row">
                            <div class="col-sm-12 col-md-12 col-lg-5">
                                <h1>Os melhores canais<br><span>Teste Gratuitamente</span></h1>
                                <a class="btn btn-primary btn-carousel btn-block mt-2" href="#">Teste Grátis</a>
                                <div class="text-center"><small>Teste durante 24 horas, sem custo.</small></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="carousel-item" style="background-image: url('public/images/header-bg-02.jpg');">
                <div class="container">
                    <div id="area-cliente">
                        <div class="row justify-content-end">
                            <div class="col-sm-12 col-md-12 col-lg-5">
                                <h1>Gerencie sua conta<br><span>Acesse o painel</span></h1>
                                <a class="btn btn-primary btn-carousel btn-block mt-2" href="#"><i class="far fa-user mr-2"></i> Área do Cliente</a>
                                <div class="text-center"><small>Teste durante 24 horas, sem custo.</small></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</header>