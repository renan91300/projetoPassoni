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
    <div class="card">
        <div class="card-header"><i class="fa fa-fw fa-globe"></i> <strong>Filtrar pedidos</strong></div>
        <div class="card-body">
            <div class="col-sm-12">
                <form method="POST">
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label for="userName">Cliente</label>
                                <input type="text" name="nome" id="userName" class="form-control" value="" placeholder="Nome do cliente">
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label for="userEmail">Email</label>
                                <input type="email" name="email" id="userEmail" class="form-control" value="" placeholder="Email">
                            </div>
                        </div>
                        <div class="col-sm-3">
                            <div class="form-group">
                                <label for="userFone">Telefone</label>
                                <input type="text" style="background:white;" name="telefone" id="userFone" class="form-control" value="" placeholder="Telefone">
                            </div>
                        </div>
                        <div class="col-sm-3">
                            <div class="form-group">
                                <label for="estado">Status</label>
                                <select class="form-control" id="estado" name="status">
                                    <option>Todos</option>
                                    <option>Entregue</option>
                                    <option>Em entrega</option>
                                    <option>Em andamento</option>
                                    <option>Recusado</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-sm-2">
                            <div class="form-group">
                                <label>&nbsp;</label>
                                <div><button type="submit" name="submit" value="buscar" id="submit" class="btn btn-primary"><i class="fa fa-fw fa-search"></i> Buscar</button></div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <form name="formResults" method="GET">
        <div class="qtdResults">
            <div>
                <select onChange="formResults.submit()" name="registros" aria-controls="table" class="custom-select custom-select-sm form-control form-control-sm">
                    <option value="5"
                        <?php
                            if($this->dados['registros'] == 5){
                                echo "selected";
                            }
                        ?>
                    >5</option>
                    <option value="10"
                        <?php
                            if($this->dados['registros'] == 10){
                                echo "selected";
                            }
                        ?>
                    >10</option>
                    <option value="25"
                        <?php
                            if($this->dados['registros'] == 25){
                                echo "selected";
                            }
                        ?>
                    >25</option>
                    <option value="50"
                        <?php
                            if($this->dados['registros'] == 50){
                                echo "selected";
                            }
                        ?>
                    >50</option>
                </select> 
            </div>
            <div>
                <label>
                    resultados por página
                </label>
            </div>
        </div>
    </form>
    
    <hr> 
    <?php
        foreach($this->dados['pedidos'] as $pedido){
            extract($pedido);
    ?>
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
    
    <div class="center">
        <div class="pagination">
            
            <?php 
                $num = $this->dados['qtdPedidos'][0]['qtd'];
                //$paginas = (substr((($num%100)/10), 0, 1 ) + 1);
                $numPaginas = ceil($num/$this->dados['registros']);
                $pagina = (isset($_GET['pagina']) && !empty($_GET['pagina']))? $_GET['pagina'] : 1; 
                
                if($pagina > 1){
                    echo "<a href='?pagina=". ($pagina-1) ."&registros=".$this->dados['registros']."'>&laquo;</a>";
                }

                for($i=1; $i<=$numPaginas; $i++){     
                    if($i == $pagina){
                        echo "<a href='?pagina=$i&registros=".$this->dados['registros']."' class='active'>".$i."</a>";
                    }
                    else{
                        echo "<a href='?pagina=$i&registros=".$this->dados['registros']."'>".$i."</a>";
                    }
                    
                }

                if($pagina < $numPaginas){
                    echo "<a href='?pagina=". ($pagina+1) ."&registros=".$this->dados['registros']."'>&raquo;</a>";
                }

            ?>
        </div>
    </div>