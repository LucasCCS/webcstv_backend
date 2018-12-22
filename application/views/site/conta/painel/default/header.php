<header class="topbar">
    <nav class="navbar top-navbar navbar-toggleable-sm navbar-light">
        <style>
            @media (max-width: 767px) {
                .navbar-brand {
                    display: none; 
                }

                #site-back {
                    display: none;
                }
            }
        </style>
        <div class="container">
            <a class="navbar-brand" href="#" style="color: #fff; font-size: 12px;"><img class="img-fluid" src="<?=base_url('public/images/logo_a.png');?>" style="width: 120px;"> | Central do Cliente</a>
        </div>
        <div class="navbar-collapse">
            <ul class="navbar-nav mr-auto mt-md-0 ml-3">
                <!-- This is  -->
                <li class="nav-item"> <a class="nav-link nav-toggler hidden-md-up text-muted waves-effect waves-dark" href="javascript:void(0)"><i class="mdi mdi-menu"></i></a> </li>
            </ul>
            
            <ul class="navbar-nav my-lg-0" id="site-back">
                <li class="nav-item">
                    <a class="nav-link" href="<?=base_url();?>"><small><i class="mdi mdi-arrow-left-bold"></i> Voltar para o Site</small></a>
                </li>
            </ul>
            <ul class="navbar-nav my-lg-0">
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle text-muted waves-effect waves-dark" href="" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Olá, <?=$this->cliente['nome']?> <i class="mdi mdi-menu-down"></i></a>
                    <div class="dropdown-menu" aria-labelledby="dropdownMenuButton" style="margin-left: -50px;">
                        <a class="dropdown-item" href="<?=base_url();?>conta/sair">Sair</a>
                    </div>
                </li>
            </ul>
        </div>
    </nav>
</header>