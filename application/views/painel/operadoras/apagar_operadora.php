<?=$this->load->view('painel/default/head',[],TRUE);?>
<div class="row justify-content-lg-center">
    <div class="col-sm-12 col-md-12 col-lg-6">
        <div class="card mt-5">
            <div class="card-block text-center">

                <form method="post">
                    <h3>Deseja apagar esta Operadora?</h3>
                    <a class="btn btn-warning btn-lg" href="<?=base_url();?>painel/operadoras">Cancelar</a> <input class="btn btn-danger btn-lg" type="submit" name="apagar_operadora" value="Apagar">
                </form>
                   
            </div>
        </div>
    </div>
</div>
<?=$this->load->view('painel/default/footer',[],TRUE);?>