<header class="topbar">
    <nav class="navbar top-navbar navbar-toggleable-sm navbar-light">
        <style>

            @media (max-width: 767px) {
                .navbar-brand {
                    display: none; 
                }
            }
        </style>
        <div class="container">
        <a class="navbar-brand" href="#" style="color: #fff; font-size: 12px;"><img class="img-fluid" src="<?=base_url('public/images/logo_a.png');?>" style="width: 120px;"> | Painel Administrativo</a>
        </div>
        <div class="navbar-collapse">
            <ul class="navbar-nav mr-auto mt-md-0 ml-3">
                <!-- This is  -->
                <li class="nav-item"> <a class="nav-link nav-toggler hidden-md-up text-muted waves-effect waves-dark" href="javascript:void(0)"><i class="mdi mdi-menu"></i></a> </li>
            </ul>
            <ul class="navbar-nav my-lg-0">
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle text-muted waves-effect waves-dark" href="" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Olá, <?=$this->userPanel['usuario']?></a>
                    <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                        <a class="dropdown-item" href="<?=base_url();?>painel/logout">Sair</a>
                    </div>
                </li>
            </ul>
        </div>
    </nav>
</header>