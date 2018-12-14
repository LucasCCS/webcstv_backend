<aside class="left-sidebar">
    <!-- Sidebar scroll-->
    <div class="scroll-sidebar">
        <!-- Sidebar navigation-->
        <nav class="sidebar-nav">
            <ul id="sidebarnav">
                <li>
                    <a class="waves-effect waves-dark" href="<?=base_url();?>conta/principal" aria-expanded="false"><i class="mdi mdi-gauge"></i><span class="hide-menu">Minha Conta</span></a>
                </li>
                <li> 
                    <a class="waves-effect waves-dark" data-toggle="collapse" href="#menuConta"  aria-expanded="false"><i class="mdi mdi-account-box-outline"></i><span class="hide-menu">Conta</span></a>
                    <div class="collapse multi-collapse" id="menuConta">
                        <nav>
                            <ul>
                                <li> 
                                    <a class="waves-effect waves-dark" href="<?=base_url();?>conta/alterar/senha" aria-expanded="false"><i class="mdi mdi-lock"></i> <span class="hide-menu">Alterar Senha</span></a>
                                </li>
                                <li> 
                                    <a class="waves-effect waves-dark" href="<?=base_url();?>conta/alterar/email" aria-expanded="false"><i class="mdi mdi-email"></i> <span class="hide-menu">Alterar E-mail</span></a>
                                </li>
                            </ul>
                        </nav>
                    </div>
                </li>
                <li> 
                    <a class="waves-effect waves-dark" data-toggle="collapse" href="#menuPagamento"  aria-expanded="false"><i class="mdi mdi-credit-card"></i><span class="hide-menu">Pagamento</span></a>
                    <div class="collapse multi-collapse" id="menuPagamento">
                        <nav>
                            <ul>
                                <li> 
                                    <a class="waves-effect waves-dark" href="<?=base_url();?>conta/novo/pagamento" aria-expanded="false"><i class="mdi mdi-credit-card-plus"></i> <span class="hide-menu">Novo Pagamento</span></a>
                                </li>
                                <li> 
                                    <a class="waves-effect waves-dark" href="<?=base_url();?>conta/pagamentos/historico" aria-expanded="false"><i class="mdi mdi-history"></i> <span class="hide-menu">Histórico de Pagamentos</span></a>
                                </li>
                            </ul>
                        </nav>
                    </div>
                </li>
                <li> 
                    <a class="waves-effect waves-dark" data-toggle="collapse" href="#menuSuporte"  aria-expanded="false"><i class="mdi mdi-help-circle-outline"></i><span class="hide-menu">Suporte</span></a>
                    <div class="collapse multi-collapse" id="menuSuporte">
                        <nav>
                            <ul>
                                <li> 
                                    <a class="waves-effect waves-dark" href="<?=base_url();?>conta/guias/instalacao" aria-expanded="false"><i class="mdi mdi-folder"></i> <span class="hide-menu">Como Configurar</span></a>
                                </li>
                                <li> 
                                    <a class="waves-effect waves-dark" data-toggle="modal" data-target="#exampleModal"><i class="mdi mdi-help"></i> <span class="hide-menu">Solicitar Suporte</span></a>
                                </li>
                            </ul>
                        </nav>
                    </div>
                </li>
            </ul>
        </nav>
        <!-- End Sidebar navigation -->
    </div>
    <div class="sidebar-footer">
        <a href="<?=base_url();?>painel/logout" class="link" data-toggle="tooltip" title="Sair"><i class="mdi mdi-power"></i></a> </div>
</aside>