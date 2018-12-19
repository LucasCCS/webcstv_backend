<?=$this->load->view('painel/default/head',[],TRUE);?>
<div class="container text-center" style="margin-top: 100px;">
<h1>Olá, <?=$this->userPanel['usuario']?> seja bem-vindo(a)!</h1>
<a class="btn btn-primary btn-lg" href="<?=base_url();?>">Visualizar Site</a>
</div>
<?=$this->load->view('painel/default/footer',[],TRUE);?>