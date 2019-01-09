<?=$this->load->view('site/default/navbar-fixed',[],TRUE);?>
<!-- invl-header -->
<header class="invl-header">
    <?=$this->load->view('site/default/navbar',[],TRUE);?>
    <div id="carouselHeader" class="carousel slide" data-ride="carousel">
        <div class="carousel-inner">
            <div class="carousel-item active" style="background-image: url('public/images/header-bg-03.jpg');">
                <div class="container">
                    <div id="teste-gratuito">
                        <div class="row">
                            <div class="col-sm-12 col-md-12 col-lg-5">
                                <h1>Os melhores canais<br><span>Teste Gratuitamente</span></h1>
                                <a class="btn btn-primary btn-carousel btn-block mt-2" href="<?=base_url();?>cadastro">Teste Grátis</a>
                                <div class="text-center"><small>Teste hoje mesmo, sem custo.</small></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="carousel-item" style="background-image: url('public/images/header-bg-05.jpg');">
                <div class="container">
                    <div id="area-cliente">
                        <div class="row justify-content-end">
                            <div class="col-sm-12 col-md-12 col-lg-5">
                                <h1>Tenha acesso<br><span>aos melhores filmes</span></h1>
                                <a class="btn btn-primary btn-carousel btn-block mt-2" href="<?=base_url();?>cadastro">Teste Gratuitamente</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="carousel-item" style="background-image: url('public/images/header-bg-06.jpg');">
                <div class="container">
                    <div id="teste-gratuito">
                        <div class="row">
                            <div class="col-sm-12 col-md-12 col-lg-5">
                                <h1>O melhor em IPTV e CardSharing<br><span>para sua família</span></h1>
                                <a class="btn btn-primary btn-carousel btn-block mt-2" href="<?=base_url();?>planos">Conhecer planos</a>
                                <div class="text-center"><small>Teste hoje mesmo, sem custo.</small></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
             <div class="carousel-item" style="background-image: url('public/images/header-bg-04.jpg');">
                <div class="container">
                    <div id="teste-gratuito">
                        <div class="row">
                            <div class="col-sm-12 col-md-12 col-lg-5">
                                <h1>Acompanhe sua<br><span>série com o melhor CardSharing</span></h1>
                                <a class="btn btn-primary btn-carousel btn-block mt-2" href="<?=base_url();?>planos">Conhecer planos</a>
                                <div class="text-center"><small>Teste hoje mesmo, sem custo.</small></div>
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
                                <a class="btn btn-primary btn-carousel btn-block mt-2" href="<?=base_url();?>conta/entrar"><i class="far fa-user mr-2"></i> Área do Cliente</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <a class="carousel-control-prev" href="#carouselHeader" role="button" data-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
        </a>
        <a class="carousel-control-next" href="#carouselHeader" role="button" data-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
        </a>
    </div>
</header>