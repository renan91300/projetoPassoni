<?php

if (!defined('URL')){
    header("location: /");
    exit();
}
?>

<div class="container">
  <?php
    if(isset($this->dados['pedido'])){
      //var_dump($this->dados['pedido']['pedido']);
      extract($this->dados['pedido']['pedido'][0]);
    }
  ?>
  <div class="row">
      <div class="col-md-8">
          <h2>Pedido #<?=$idPedido?></h2>
          
      </div>
      <div class="col-md-4">
        <a name="editar" value="Editar" class="btn btn-warning" href="<?=URL;?>pedido/editar/<?=$idPedido;?>" style="margin-left: auto;">Editar</a>
          <a name="listar" value="Listar" class="btn btn-success" href="<?=URL;?>pedido/listarPedidos" style="margin-left: 0.25rem;">Listar</a>
          <a name="apagar" value="Apagar" class="btn btn-danger" href="<?=URL;?>pedido/apagar/<?=$idPedido;?>" style="margin-left: 0.25rem;">Apagar</a>
      </div>
  </div>
  <hr>

  <div>
      <p class="font-italic">
      <strong>Status pedido: <span class="
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
        ">&#x2605;&nbsp;<?=$status;?></span></strong>
      <br><strong>Data do Pedido: </strong><?=date("d/m/Y", strtotime($dataPedido));?>
      <br><strong>Data de Entrega: </strong><?=date("d/m/Y", strtotime($dataEntrega));?>         
      <br><strong>Forma de entrega: </strong> <?=$formaEntrega;?>
      <br><strong>Método de pagamento: </strong> <?=$formaPagamento;?>
      <br><strong>Observacao: </strong> <?=$observacao;?>
      <br><br><strong>Valor Total: </strong> R$<?=$precoTotal;?>,00</p>
      <h5>Itens:</h5><br>
        <div>
            <?php
              foreach ($this->dados['pedido']['bolos'] as $bolo) {
                extract($bolo);
                ?>
                <div class="row" style="padding-left:1em;">
                  <div class="mr-5">
                    <img src="/projetoPassoni/assets/img/bolos/bolosdepote/<?=$idBoloDePote;?>/<?=$imagem;?>" alt="" width="70" class="img-fluid rounded shadow-sm">    
                  </div>
                  
                  <div class="">
                    <h5>
                      <a href="#" class="text-dark ">Bolo de Pote de <?=$sabor;?></a>
                    </h5>
                    <p class="text-muted font-weight-normal font-italic">
                      Sabor: <?=$sabor;?>
                      <br>Tamanho: <?=$tamanho;?>
                      <br>Quantidade: <?=$quantidade;?>                        
                      </p>
                  </div>
                </div>
                <hr>
                
          <?php
            }
          ?>
        </div>
     </div>


      
  </div>
  <!--/.col-sm-12-->

</div>