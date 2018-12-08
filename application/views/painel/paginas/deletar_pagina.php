<?=$this->load->view('painel/default/head',[],TRUE);?>
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-block text-center">
                <h3>Deseja apagar esta pagina?</h3>
                <form method="post">
                    <input type="submit" class="btn btn-danger" name="deletar_pagina" value="Apagar">
                    <a href="<?=base_url();?>painel/paginas" class="btn btn-warning">Voltar</a>
                </form>
            </div>
        </div>
    </div>
</div>
<?=$this->load->view('painel/default/footer',[],TRUE);?>