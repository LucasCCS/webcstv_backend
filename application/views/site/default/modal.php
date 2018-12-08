<!-- modal: login -->
<div class="modal mt-5" tabindex="-1" role="dialog" id="loginForm">
    <div class="modal-dialog modal-sm" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <p class="modal-title">Acesse sua Conta</p>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
            </div>
            <div class="modal-body invl-modal-form">
                <div alerts></div>
                <form method="post" id="loginform">
                    <input type="text" name="email" class="form-control" placeholder="Nome de Usuário ou E-mail">
                    <input type="password" name="senha" class="form-control" placeholder="Senha">
                    <div class="row invl-modal-form-footer">
                        
                        <div class="col-12 col-sm-12 col-md-12 col-lg-12 ml-auto">
                            <button type="button" class="btn btn-primary btn-block btn-sm" login-form="#loginform" login-form-url="<?=base_url();?>conta/autenticar">Entrar</button>
                        </div>
                        <div class="col-12 col-sm-12 col-md-12 col-lg-12 invl-modal-form-options text-center mt-2">
                            <ul>
                                <li><a href="<?=base_url();?>conta/recuperar">Esqueceu a senha?</a></li>
                            </ul>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<!-- modal: enviar comprovante -->
<div class="modal mt-5" tabindex="-1" role="dialog" id="comprovanteForm">
    <div class="modal-dialog modal-md" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <p class="modal-title">Informar Pagamento</p>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
            </div>
            <div class="modal-body invl-modal-form">
                <?php echo form_open_multipart('conta/enviar/comprovante/pagamento');?>
                    <textarea class="form-control" name="observacoes" placeholder="Observações"></textarea>
                    <br>
                    <h4>Imagem do Comprovante</h4>
                    <input type="file" name="userfile" required>
                    <br><br>
                    <input type="submit" class="invl-btn invl-btn-primary invl-btn-block" name="enviar_comprovante" value="Enviar Comprovante">
                </form>
            </div>
        </div>
    </div>
</div>