<?php

if (!defined('URL')){
    header("location: /");
    exit();
            
}?>
    <div>
        <h1 class="h2">Pedidos</h1>
    </div>
    <?php
        if (isset($_SESSION['msg'])) {
            echo $_SESSION['msg'];
            unset($_SESSION['msg']);
        }
    ?>  
    <?php
                    foreach($this->dados['pedidos'] as $pedido){
                        extract($pedido);?>
                <div class="listCard row">
                    <div class="col-md-4">
                        <h5>ID: #<?=$idPedido;?></h5>
                        <p>Cliente: <?=$nome." ".$sobrenome;?>
                            <br>Valor do Pedido: R$<?=$precoTotal;?>,00
                            <br>Quantidade de bolos: <?=$qtdBolos;?>
                            <br>Status:
                            <span class="
                                <?php
                                    if($status == "Entregue"){
                                        echo "text-success";
                                    }
                                    elseif($status == "Recusado"){
                                        echo "text-danger";
                                    }
                                    else{
                                        echo "text-warning";
                                    }?>
                                ">&#x2605;<?=$status;?>
                            </span></td>
                        </p>

                    </div>
                    <div class="col-md-4">
                        <h5>Endereço de entrega:</h5>
                        <p><?=$logradouro;?>, <?=$numero;?> -
                        <br><?=$bairro;?></p>
                    </div>
                    <div class="col-md-4">
                        <div class="actionsIcons">
                           <a href="<?=URL;?>pedido/visualizar/<?=$idPedido;?>" class="text-primary mr-3"><i class="fa fa-eye"></i> Mais Detalhes</a> 
                           <a href="<?=URL;?>pedido/editar/<?=$idPedido;?>" class="text-success"><i class="fa fa-fw fa-edit"></i> Editar</a>
                        </div>
                    </div>
                </div>
                <hr>
                <?php
                    }
                ?>
    </div>