<!-- invl-header -->
<header class="invl-header">
    <?=$this->load->view('site/default/header-top',[],TRUE);?>
    <div class="invl-header-top-full">
        <div class="container">
            <?=$this->load->view('site/default/navbar',[],TRUE);?>
        </div>
    </div>
    <div class="invl-cadastro-stephead">
        <div class="container">
            <ul class="invl-cadastro-stephead-list">
                <li class="invl-cadastro-stephead-list-item active" cadastro-next-step="1" cadastro-header-step="1">
                    <div class="d-flex">
                        <a class="invl-cadastro-stephead-list-item-number">1</a>
                        <span class="invl-cadastro-stephead-list-item-title">Gerar Teste</span>
                    </div>
                </li>
            </ul>
        </div>
    </div>
</header>
