<!-- invl-footer -->
    <footer class="invl-footer">
        <div class="invl-footer-top">
            <div class="container">
                <div class="row justify-content-around">
                    <div class="col-sm-12 col-md-12 col-lg-3" id="desc">
                        <img class="img-fluid" src="public/images/logo.png">
                        <p><?=$this->site['descricao_footer'];?></p>
                    </div>
                    <div class="col-sm-12 col-md-12 col-lg-2">
                        <h4>A Empresa</h4>
                        <ul class="invl-footer-list">
                            <li><a href="<?=base_url();?>sobre">Sobre</a></li>
                            <li><a href="<?=base_url();?>planos">Planos</a></li>
                            <li><a href="<?=base_url();?>duvidas-frequentes">Dúvidas Frequentes</a></li>
                            <li><a href="<?=base_url();?>contato">Canais de Atendimento</a></li>
                        </ul>
                    </div>
                    <div class="col-sm-12 col-md-12 col-lg-2">
                        <h4>Acesso Rápido</h4>
                        <ul class="invl-footer-list">
                            <li><a href="<?=base_url();?>conta/entrar">Central do Cliente</a></li>
                            <li><a href="<?=base_url();?>cadastro">Teste Grátis</a></li>
                        </ul>
                    </div>
                    <div class="col-sm-12 col-md-12 col-lg-3">
                        <h4>Acompanhe-nos</h4>
                        <ul class="invl-footer-social-list">
                            <li><a href="#"><i class="fab fa-facebook-f"></i></a></li>
                            <li><a href="#"><i class="fab fa-instagram"></i></a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <div class="invl-footer-bottom">
            <div class="container">
                <div class="text-center">
                    <p>2019 - Todos os direitos reservados</p>
                </div>
            </div>
        </div>
    </footer>
    <!-- scripts -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="<?=base_url();?>public/slick/slick.min.js"></script>
    <script src="<?=base_url();?>public/js/app.js"></script>
</body>

</html>