<?=$this->load->view('site/conta/painel/default/head',[],TRUE);?>

<div class="row">
    <div class="col-12">
        <h3>Alterar Operadora</h3>
        <p>Selecione a(s) operadora(s) para sua assinatura</p>  
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
                <?php if($this->cliente['tipo'] == PLANO_NET): ?>
                <div class="text-center">
                    <h4>Você não possui operadoras disponíveis para seleção.</h4>
                </div>
                <?php else:?>
                <form method="post">
                    <div class="invl-form-operadoras text-center">
                        <ul class="invl-form-operadoras-list" plan-limit="<?=$this->cliente['operadoras'];?>">
                            <?php
                                if (isset($operadoras)):
                                    foreach($operadoras as $key):
                                        $status = false;
                                        if(isset($cliente_operadoras)) {
                                            foreach($cliente_operadoras as $ckey):
                                                if($ckey->id_operadora == $key->id_operadora) $status = true;
                                            endforeach;
                                        }
                                        
                            ?>
                            <li>
                                <img class="img-fluid<?php if($status) echo ' active'; ?>" src="<?=$key->imagem_logo?>" operadora="<?=$key->id_operadora;?>">
                                <input type="checkbox" <?php if($status) echo 'checked'; ?> name="operadora[]" value="<?=$key->id_operadora;?>" operadora-input="<?=$key->id_operadora;?>">
                            </li>
                            <?php                                   
                                    endforeach;
                                endif;
                            ?>
                        </ul>
                        <small>Você deverá selecionar <strong><?=$this->cliente['operadoras'];?></strong> operadora(s).</small>
                    </div>
                    <input type="submit" name="mudar_operadora_conta" class="btn btn-info" value="Salvar">
                </form>
                <?php endif; ?>
            </div>
        </div>
    </div>
</div>

<?=$this->load->view('site/conta/painel/default/footer',[],TRUE);?>