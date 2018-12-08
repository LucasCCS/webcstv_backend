<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Fale Conosco</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close" suporte-close>
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div contact-return></div>
        <form id="contact-form">
            <textarea class="form-control" rows="3" name="mensagem" placeholder="Mensagem" solicitar-suporte-mensagem></textarea>
            <div class="invl-contact-form-action">
                <div contact-form-status class="text-center"></div>
                <button class="btn btn-info btn-block btn-lg" type="button" solicitar-suporte solicitar-suporte-url="https://api.whatsapp.com/send?phone=55<?=str_replace('-','',str_replace(' ','',str_replace(')','',str_replace('(','',$this->site['whatsapp']))));?>&text=">Enviar Mensagem</button>
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
                    <input type="submit" class="btn btn-info btn-lg btn-block" name="enviar_comprovante" value="Enviar Comprovante">
                </form>
            </div>
        </div>
    </div>
</div>