<!-- Modal -->
<div class="modal fade" id="cplanosModal" tabindex="-1" role="dialog" aria-labelledby="cplanosModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document" style="max-width: 1200px;">
    <div class="modal-content" style="background-color: transparent; box-shadow: none;">
        <div class="text-center">
            <h3 style="font-family: 'Ubuntu Bold'; color: rgba(255,255,255,.6);">Selecione um plano</h3>
        </div>
        <ul class="nav nav-tabs" id="planosTab" role="tablist">
            <li class="nav-item">
                <a class="nav-link active" id="cs-tab" data-toggle="tab" href="#cs" role="tab" aria-controls="cs" aria-selected="true">Planos CardSharing</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" id="iptv-tab" data-toggle="tab" href="#iptv" role="tab" aria-controls="iptv" aria-selected="false">Planos IPTV</a>
            </li>
        </ul>
        <div class="tab-content" id="planosContent" style="background-color: #fff; border-bottom-left-radius: 6px; border-bottom-right-radius: 6px;border-top-right-radius: 6px;">
            <div class="tab-pane fade show active" id="cs" role="tabpanel" aria-labelledby="cs-tab">
                <?=$this->load->view('site/cadastro/templates/template-planos-cs',[],TRUE); ?>
            </div>
            <div class="tab-pane fade" id="iptv" role="tabpanel" aria-labelledby="iptv-tab">
                <?=$this->load->view('site/cadastro/templates/template-planos-iptv',[],TRUE); ?>
            </div>
        </div>
    </div>
  </div>
</div>

<div class="row">
    <div class="col-sm-12 col-md-12 col-lg-4">
        <!-- invl-cadastro -->
        <section class="invl-cadastro-form">
            <form method="post" action="<?=base_url();?>cadastro/finalizar" id="form-cadastro">
                <input type="hidden" name="id_plano">
                <input type="hidden" name="id_subplano">
                <div class="container">
                    <!-- Dados do Usuário -->
                    <div class="invl-cadastro-steps active"> 
                        <div class="invl-cadastro-header text-center">
                            <h1>Crie sua conta</h1>
                            <p>Inicie um teste <strong>gratuito</strong> hoje mesmo!</p>
                        </div>
                        <div class="invl-form-content">
                            <?php
                                if($this->session->flashdata('validation_errors') !== NULL) {
                                    echo '<div class="alert alert-danger">'.$this->session->flashdata('validation_errors').'</div>';
                                }
                            ?>
                            <div class="invl-form-inputs">
                                <div class="row form-group">
                                    <div class="col-12">
                                        <input type="text" class="form-control input-lg" name="email" placeholder="Digite seu Email" name-input>
                                    </div>
                                </div>
                                <div class="row form-group">
                                    <div class="col-12">
                                        <input type="text" class="form-control input-lg" name="nome" placeholder="Seu Nome" name-input>
                                    </div>
                                </div>
                                <div class="row form-group">
                                    <div class="col-12">
                                        <input type="text" class="form-control input-lg" name="telefone" placeholder="(00) 0 0000-0000" phone-input phone>
                                    </div>       
                                </div>
                                <div class="row form-group">
                                    <div class="col-12">
                                        <input type="password" class="form-control input-lg" name="senha" placeholder="Senha" check-password>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row form-group">    
                            <div class="col-sm-12 col-md-12 col-lg-12">
                                <button type="submit" class="btn btn-primary btn-lg btn-block">Avançar</button>
                                <h4 class="text-center mt-3"><small><span>Já tem uma conta?</span> <a href="<?=base_url();?>conta/entrar" class="btn btn-primary btn-cadastro">Entrar agora</a></small></h4>
                            </div>
                        </div>
                    </div>      
                </div>
            </form>
        </section>
    </div>
    <div class="col-sm-12 col-md-12 col-lg-8 hidden-xs hidden-sm">
        <div class="invl-cadastro-imagem">
            <div class="row">
                <div class="col-lg-8 p-4 ml-5 mt-4">
                    <div class="invl-cadastro-imagem-logo">
                        <img src="<?=base_url();?>public/images/logo-lg.png" width="600px">
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>