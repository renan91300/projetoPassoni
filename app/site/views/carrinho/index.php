<?php

  if (!defined('URL')){
      header("location: /");
      exit();
  }

?>

<div class="px-4 px-lg-0 cart">
  <div class="pb-5 pt-2">
    <div class="container">
      <div class="row">
        <div class="col-lg-12 p-5 bg-white rounded shadow-sm mb-5">

          <!-- Shopping cart table -->
          <div class="table-responsive">
            <table class="table shadow-sm">
              <thead>
                <tr>
                  <th scope="col" class="border-0 bg-light">
                    <div class="p-2 px-3 text-uppercase">Produto</div>
                  </th>
                  <th scope="col" class="border-0 bg-light">
                    <div class="py-2 text-uppercase">Preço</div>
                  </th>
                  <th scope="col" class="border-0 bg-light">
                    <div class="py-2 text-uppercase">Quantidade</div>
                  </th>
                  <th scope="col" class="border-0 bg-light">
                    <div class="py-2 text-uppercase">Remover</div>
                  </th>
                </tr>
              </thead>
              <tbody id="bolosCarrinho">
                <?php
                  if(!isset($_SESSION['carrinho'])){
                    $imagem = $sabor = $preco = $qtd = $idBoloDePote = " ";
                    $subTotal = 0;
                  }
                  else{
                    $subTotal = 0;
                    foreach ($_SESSION['carrinho'] as $produto) {
                      extract($produto);
                      $subTotal+=$preco*$qtd;
                ?>
                  <tr>
                    <td scope="row" class="border-0">
                      <div class="p-2">
                        <img src="/projetoPassoni/assets/img/bolos/bolosdepote/<?=$idBoloDePote;?>/<?=$imagem;?>" alt="" width="70" class="img-fluid rounded shadow-sm">
                        <div class="ml-3 d-inline-block align-middle">
                          <h5 class="mb-0"> <a href="#" class="text-dark d-inline-block align-middle">Bolo de Pote de <?=$sabor;?></a></h5><span class="text-muted font-weight-normal font-italic d-block">Sabor: <?=$sabor;?> | Tamanho: 2 Litros</span>
                        </div>
                      </div>
                    </td>
                    <td class="border-0 align-middle"><strong>R$<?=$preco*$qtd;?></strong></td>
                    <td class="border-0 align-middle">
                      <form method="POST" action="<?=URL;?>carrinho/upPreco/<?=$idBoloDePote;?>">
                        <div class="nice-number quantity">
                          <input type="number" name="qtd" class="qtd" value="<?=$qtd;?>" min="1" max="100" style="width: 1.5em">
                        </div>
                        <br>
                        <button style="margin-left: 1.5em; background: none; border: none; outline: none;" type="submit" class="text-warning">Atualizar Preco</button>
                      </form>
                    </td>
                    <td class="border-0 align-middle"><a href="<?=URL;?>carrinho/deletarBolo/<?=$idBoloDePote;?>" class="text-dark"><i class="fa fa-trash"></i></a></td>
                  </tr>
                <?php
                    }
                  }
                ?>
              </tbody>
            </table>
            
          </div>
          <div class="row container">
            <div class="col-lg-6" style="margin-left: auto;">
              <div class="d-flex justify-content-between py-3 border-bottom" id="subTotal">
                <strong class="text-muted">Subtotal</strong>
                <strong>R$<?=$subTotal;?>,00</strong>
              </div>
              <div class="mt-2">
                <a <?php
                    if(isset($_SESSION['user'])){?>
                      href="<?=URL;?>checkout"
                    <?php
                    }
                    else{?>
                      href="<?=URL;?>usuario/login"
                    <?php } ?>  
                      class="btn btn-dark rounded-pill py-2 btn-block">Continuar</a>  
              </div>
            </div>
          </div>
            
          <!-- End -->
        </div>
      </div>

    </div>
  </div>
</div>