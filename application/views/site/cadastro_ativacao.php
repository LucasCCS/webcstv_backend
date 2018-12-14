<?=$this->load->view('site/default/head',['body_class' => 'invl-cadastro'],TRUE);?>
<?=$this->load->view('site/cadastro/ativar',[],TRUE);?>
<?=$this->load->view('site/cadastro/footer',[],TRUE);?>
<script>
    $(function() {
        sessionStorage.removeItem('plan');
    });
</script>