<!-- invl-contact -->
<section class="invl-contact">
    <div class="container">
        <div class="invl-contact-content">
            <div class="row d-flex">
                <div class="col-12 col-sm-12 col-md-12 col-lg-6">
                    <div class="invl-contact-form">
                        <div contact-return></div>
                        <h1>Envie-nos uma<br>mensagem</h1>
                        <form id="contact-form">
                            <input class="form-control" type="text" name="nome" placeholder="Seu nome">
                            <input class="form-control" type="text" name="telefone" placeholder="Telefone / Celular">
                            <input class="form-control" type="text" name="email" placeholder="E-mail">
                            <textarea class="form-control" rows="3" name="mensagem" placeholder="Mensagem"></textarea>
                            <div class="invl-contact-form-action">
                                <div contact-form-status class="text-center"></div>
                                <button class="invl-btn invl-btn-success invl-btn-block" type="button" contact-form="#contact-form" contact-url="<?=base_url();?>contato/enviar">Enviar Mensagem</button>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="col-12 col-sm-12 col-md-12 col-lg-5 ml-auto">
                    <div class="invl-contact-form mt-5">
                        <h1>Contatos</h1>
                        <ul>
                            <li><h2><i class="fas fa-phone"></i> <?=$this->site['contato'];?></h2></li>
                            <li><h3><i class="fab fa-whatsapp"></i> <?=$this->site['whatsapp'];?></h3></li>
                            <li id="email"><i class="fas fa-at"></i> <strong>E-mail:</strong> <?=$this->site['email'];?></li>
                        </ul>
                    </div>

                </div>
            </div>
        </div>
    </div>
</section>