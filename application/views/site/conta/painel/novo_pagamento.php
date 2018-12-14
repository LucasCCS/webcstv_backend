<?=$this->load->view('site/conta/painel/default/head',[],TRUE);?>

<div class="row">
    <div class="col-12">
        <h3>Novo Pagamento</h3>
        <p>Não fique sem os seus canais favoritos, renove a sua assinatura!</p>  
    </div>
    <div class="col-12">
        <div class="card">
            <div class="card-block">
                <?php
                    if ($this->session->flashdata('codigo_erro') !== null) {
                        echo '<div class="alert alert-danger">'.$this->session->flashdata('codigo_erro').'</div>';
                    }
                ?>  
                <?php
                    if ($this->session->flashdata('codigo_sucesso') !== null) {
                        echo '<div class="alert alert-success">'.$this->session->flashdata('codigo_sucesso').'</div>';
                    } 
                ?> 
                <div class="invl-plans"> 
                <div class="invl-plans-list"> 
                <div class="row">                  
                    
                    <!-- <div class="col-sm-12 col-md-12 col-lg-8 mt-5">
                        <div class="invl-form-metodo-pagamento text-left">
                            <ul class="invl-form-metodo-pagamento-list">
                                <?php
                                    if (isset($metodos_pagamento)):
                                        foreach($metodos_pagamento as $key):
                                            $codigo_produto = '';
                                            switch(strtolower($key->titulo)) {
                                                case 'mercadopago':
                                                    $codigo_produto = $this->cliente['mercadopago_codigo'];
                                                break;
                                                case 'pagseguro':
                                                    $codigo_produto = $this->cliente['pagseguro_codigo'];
                                                break;
                                            }
                                ?>
                                <li>
                                    <a href="<?=$key->checkout_url.$codigo_produto;?>" target="_blank"><img class="img-fluid" src="<?=$key->imagem_logo?>"></a>
                                </li>
                                <?php                                   
                                        endforeach;
                                    endif;
                                ?>
                            </ul>
                            <small>Selecione o método de pagamento desejado, você será enviado para a página de pagamento.</small>
                        </div>
                    </div> -->
                    <?php
                        // $valor_dia = intval($this->cliente['valor']) / intval($this->cliente['dias']);
                        $col = 12 / (1+count($sub_planos));
                    ?>
                    
                    <div class="col-sm-12 col-md-12 col-lg-<?=$col;?>">
                        <div class="invl-plans-list-item">
                            <div class="invl-plans-list-item-header">
                                <h4><?=$this->cliente['titulo'];?></h4>
                                <?php
                                    if(!empty($this->cliente['subtitulo'])) {
                                        echo '<p>'.$this->cliente['subtitulo'].'</p>';
                                    }
                                ?> 
                            </div>
                            <div class="invl-plans-list-item-body">
                                <div class="invl-plans-list-item-price">
                                    <span class="old-price">de R$ <?=$this->cliente['subtitulo'];?></span>
                                    <div class="new-price">
                                        <?php
                                            $valor = explode(',',$this->cliente['valor']); 
                                        ?>
                                        <h4><?=$valor[0];?><span>,<?=$valor[1]?></span></h4>
                                        <p>por mês</p>
                                    </div>
                                </div>
                                <div class="invl-plans-list-item-action text-center">
                                    <a class="btn btn-primary btn-plans btn-block" href="#"  data-toggle="modal" data-target="#plano-default">Comprar</a>
                                    <small class="text-muted mr-1 ml-1">Teste hoje mesmo, sem nenhum custo.</small>
                                </div>
                                <div class="invl-plans-list-item-features">
                                    <ul class="invl-plans-list-item-features-list">
                                        <?=$this->cliente['descricao'];?>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- modal - pagamento  -->
                    <div class="modal mt-5" tabindex="-1" role="dialog" id="plano-default">
                        <div class="modal-dialog modal-lg" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <p class="modal-title">Checkout</p>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                                </button>
                                </div>
                                <div class="modal-body invl-modal-form">
                                    <div class="row" style="margin-bottom: -20px;">
                                        <div class="col-sm-12 col-md-12 col-lg-7">
                                            <div class="card">
                                                <div class="card-header">
                                                    Detalhes da Compra
                                                </div>
                                                <div class="card-body p-2">
                                                    <table class="table">
                                                        <tbody>
                                                            <tr>
                                                                <td>Plano:</td>
                                                                <td><?=$this->cliente['titulo'];?></td>
                                                            </tr>
                                                            <tr>
                                                                <td>Duração:</td>
                                                                <td><?=$this->cliente['dias'];?></td>
                                                            </tr>
                                                            <tr>
                                                                <td>Operadora(s):</td>
                                                                <td><?php
                                                                        if (isset($cliente_operadoras)) {
                                                                            foreach($cliente_operadoras as $key) {
                                                                                echo '<span class="badge badge-default">'.$key->titulo.'</span> ';
                                                                            }
                                                                        }
                                                                    ?>
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td>Valor Total:</td>
                                                                <td>R$ <?=$this->cliente['valor'];?></td>
                                                            </tr>
                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-sm-12 col-md-12 col-lg-5">
                                            <div class="card">
                                                <div class="card-header">
                                                    Formas de Pagamento
                                                </div>
                                                <div class="card-body p-2">

                                                    <div class="col-sm-12 col-md-12 col-lg-12">
                                                        <div class="invl-form-metodo-pagamento text-center">
                                                            <ul class="invl-form-metodo-pagamento-list">
                                                                <?php
                                                                    if (isset($metodos_pagamento)):
                                                                        foreach($metodos_pagamento as $key):
                                                                            $codigo_produto = '';
                                                                            switch(strtolower($key->titulo)) {
                                                                                case 'mercadopago':
                                                                                    $codigo_produto = $this->cliente['mercadopago_codigo'];
                                                                                break;
                                                                                case 'pagseguro':
                                                                                    $codigo_produto = $this->cliente['pagseguro_codigo'];
                                                                                break;
                                                                            }
                                                                ?>
                                                                <li>
                                                                    <a href="<?=$key->checkout_url.$codigo_produto;?>" target="_blank"><img class="img-fluid" src="<?=$key->imagem_logo?>"></a>
                                                                </li>
                                                                <?php                                   
                                                                        endforeach;
                                                                    endif;
                                                                ?>
                                                            </ul>
                                                           
                                                        </div>
                                                    </div>

                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <small>Selecione o método de pagamento desejado, você será enviado para a página de pagamento.</small>
                                </div>
                                
                            </div>
                        </div>
                    </div>
                    <?php
                        if (isset($sub_planos)):
                            foreach($sub_planos as $key):
                                $valor_dia_sub = intval($key->valor) / intval($key->dias);
                    ?>    
                            <div class="col-sm-12 col-md-6 col-lg-<?=$col;?>">
                                <div class="invl-plans-list-item">
                                    <div class="invl-plans-list-item-header">
                                        <h4><?=$key->titulo;?></h4>
                                        <?php
                                            if(!empty($key->subtitulo)) {
                                                echo '<p>'.$key->subtitulo.'</p>';
                                            }
                                        ?> 
                                    </div>
                                    <div class="invl-plans-list-item-body">
                                        <div class="invl-plans-list-item-price">
                                            <span class="old-price">de R$ <?=$key->valor_antigo;?></span>
                                            <div class="new-price">
                                                <?php
                                                    $valor = explode(',',$key->valor); 
                                                ?>
                                                <h4><?=$valor[0];?><span>,<?=$valor[1]?></span></h4>
                                                <p>por trimestre</p>
                                            </div>
                                        </div>
                                        <div class="invl-plans-list-item-action text-center">
                                            <a class="btn btn-primary btn-plans btn-block" href="#" data-toggle="modal" data-target="#plano-<?=$key->id_sub_plano?>">Comprar</a>
                                            <small class="text-muted mr-1 ml-1">Teste hoje mesmo, sem nenhum custo.</small>
                                        </div>
                                        <div class="invl-plans-list-item-features">
                                            <ul class="invl-plans-list-item-features-list">
                                                <?=$key->descricao;?>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>

                    
                    <!-- modal - pagamento (loop) -->
                    <div class="modal mt-5" tabindex="-1" role="dialog" id="plano-<?=$key->id_sub_plano?>">
                        <div class="modal-dialog modal-lg" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <p class="modal-title">Checkout</p>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                                </button>
                                </div>
                                <div class="modal-body invl-modal-form">
                                    <div class="row" style="margin-bottom: -20px;">
                                        <div class="col-sm-12 col-md-12 col-lg-7">
                                            <div class="card">
                                                <div class="card-header">
                                                    Detalhes da Compra
                                                </div>
                                                <div class="card-body p-2">
                                                    <table class="table">
                                                        <tbody>
                                                            <tr>
                                                                <td>Plano:</td>
                                                                <td><?=$this->cliente['titulo'];?></td>
                                                            </tr>
                                                            <tr>
                                                                <td>Duração:</td>
                                                                <td><?=$key->dias;?></td>
                                                            </tr>
                                                            <tr>
                                                                <td>Operadora(s):</td>
                                                                <td><?php
                                                                        if (isset($cliente_operadoras)) {
                                                                            foreach($cliente_operadoras as $cliente_operadoras_key) {
                                                                                echo '<span class="badge badge-default">'.$cliente_operadoras_key->titulo.'</span> ';
                                                                            }
                                                                        }
                                                                    ?>
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td>Valor Total:</td>
                                                                <td>R$ <?=$key->valor;?></td>
                                                            </tr>
                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-sm-12 col-md-12 col-lg-5">
                                            <div class="card">
                                                <div class="card-header">
                                                    Formas de Pagamento
                                                </div>
                                                <div class="card-body p-2">

                                                    <div class="col-sm-12 col-md-12 col-lg-12">
                                                        <div class="invl-form-metodo-pagamento text-center">
                                                            <ul class="invl-form-metodo-pagamento-list">
                                                                <?php
                                                                    if (isset($metodos_pagamento)):
                                                                        foreach($metodos_pagamento as $metodo_pagamento_key):
                                                                            $codigo_produto = '';
                                                                            switch(strtolower($metodo_pagamento_key->titulo)) {
                                                                                case 'mercadopago':
                                                                                    $codigo_produto = $key->mercadopago_codigo;
                                                                                break;
                                                                                case 'pagseguro':
                                                                                    $codigo_produto = $key->pagseguro_codigo;
                                                                                break;
                                                                            }
                                                                ?>
                                                                <li>
                                                                    <a href="<?=$metodo_pagamento_key->checkout_url.$codigo_produto;?>" target="_blank"><img class="img-fluid" src="<?=$metodo_pagamento_key->imagem_logo?>"></a>
                                                                </li>
                                                                <?php                                   
                                                                        endforeach;
                                                                    endif;
                                                                ?>
                                                            </ul>
                                                           
                                                        </div>
                                                    </div>

                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <small>Selecione o método de pagamento desejado, você será enviado para a página de pagamento.</small>
                                </div>
                                
                            </div>
                        </div>
                    </div>
                    <?php
                        endforeach; endif;
                        
                    ?>
                    <!-- <div class="col-12 col-sm-12 col-md-12 col-lg-4">
                        <div class="invl-plans-list-item">
                            <div class="invl-plans-list-item-header">
                                <div class="invl-plans-list-item-header-title">
                                    <h2>30 dia(s)</h2>
                                </div>
                                <div class="invl-plans-list-item-header-price">
                                    <h3><small>R$</small> <?=$this->cliente['valor'];?></h3>
                                </div>
                            </div>
                            <div class="invl-plans-list-item-content">
                                <ul class="invl-plans-list-item-content-list">
                                    <?=$this->cliente['descricao'];?>
                                </ul>
                            </div>
                        </div>
                    </div> -->

                </div>
                </div>
                </div>
                
            </div>
        </div>
    </div>
</div>

<?=$this->load->view('site/conta/painel/default/footer',[],TRUE);?>