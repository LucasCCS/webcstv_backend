<!-- invl-contact -->
<section class="invl-contact">
    <div class="container">
        <div class="invl-contact-content" style="padding-top: 80px;">
            <div class="row d-flex">
                <div class="col-12 col-sm-12 col-md-12 col-lg-6">
                    <div class="invl-contact-form">
                        <div contact-return></div>
                        <h1>Envie-nos uma<br><span style="color: #ff9820;">mensagem</span></h1>
                        <form id="contact-form">
                            <input class="form-control" type="text" name="nome" placeholder="Seu nome">
                            <input class="form-control" type="text" name="telefone" placeholder="Telefone / Celular">
                            <input class="form-control" type="text" name="email" placeholder="E-mail">
                            <textarea class="form-control" rows="3" name="mensagem" placeholder="Mensagem"></textarea>
                            <div class="invl-contact-form-action">
                                <div contact-form-status class="text-center"></div>
                                <button class="btn btn-primary btn-block btn-lg" type="button" contact-form="#contact-form" contact-url="<?=base_url();?>contato/enviar">Enviar Mensagem</button>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="col-12 col-sm-12 col-md-12 col-lg-5 ml-auto">
                    <div class="invl-contact-form mt-5">
                        <h1>Contatos</h1>
                        <ul>
                            <li><h2><span style="color: #ff9820;"><i class="fas fa-phone"></i></span> <?=$this->site['contato'];?></h2></li>
                            <li><h3><span style="color: #ff9820;"><i class="fab fa-whatsapp"></i></span> <?=$this->site['whatsapp'];?></h3></li>
                            <li id="email"><span style="color: #ff9820;"><i class="fas fa-at"></i></span> <strong>E-mail:</strong> <?=$this->site['email'];?></li>
                        </ul>
                    </div>

                </div>
            </div>
        </div>
    </div>
</section>