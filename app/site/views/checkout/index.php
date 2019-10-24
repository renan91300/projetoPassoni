<?php

  if (!defined('URL')){
      header("location: /");
      exit();
  }
?>
<div class="px-4 px-lg-0 cart">
  <div class="pt-2 pb-2">
     <div class="container pt-4 rounded pb-4" style="background-color: white;">
        <div class="row">
                <div class="col-md-4 order-md-2 mb-4">
                <h4 class="d-flex justify-content-between align-items-center mb-3">
                    <span class="text-muted">Seu carrinho</span>
                    <span class="badge badge-secondary badge-pill">
                        <?php
                            echo count($_SESSION['carrinho']);
                        ?>
                    </span>
                </h4>
                <ul class="list-group mb-3" id="prodCarrinho">
                    <?php
                        $this->valorTotal=0;
                        if(!isset($_SESSION['carrinho'])){
                            $imagem = $sabor = $preco = $qtd = $idBoloDePote = " ";
                        }
                        else{
                        foreach ($_SESSION['carrinho'] as $produto) {
                            extract($produto);
                            $this->valorTotal += $preco*$qtd;
                    ?>
                    <li class="list-group-item d-flex justify-content-between lh-condensed">
                      <div>
                          <h6 class="my-0">Bolo de pote de <?=$sabor;?></h6>
                          <small class="text-muted">Qtd: <?=$qtd;?></small>
                      </div>
                      <span class="text-muted">R$<?=$preco*$qtd;?></span>
                  </li>
                <?php
                    }
                }
                ?>
                <li class="list-group-item d-flex justify-content-between lh-condensed">
                  <div class="text-success">
                      <h6 class="my-0">Código de promoção</h6>
                      <small>CODIGOEXEMEPLO</small>
                  </div>
                  <span class="text-success">R$0</span>
              </li>
              <li class="list-group-item d-flex justify-content-between">
                <span>Total (BRL)</span>
                <strong>R$<?=$this->valorTotal;?></strong>
              </li>
                </ul>

                <form>
                    <div class="input-group mb-4 border rounded-pill p-2">
                      <input type="text" placeholder="Cód. Promoção" aria-describedby="button-addon3" class="form-control border-0">
                      <div class="input-group-append border-0">
                        <button id="button-addon3" type="button" class="btn btn-dark px-4 rounded-pill" style="z-index:0;"><i class="fa fa-gift mr-2"></i>Aplicar cupom</button>
                      </div>
                    </div>
                </form>
                </div>
                <div class="col-md-8 order-md-1">
                    <div class="bg-light rounded-pill px-4 py-3 text-uppercase font-weight-bold">Endereço de entrega</div>
                    <form method="POST" action="<?=URL;?>checkout/finalizarCompra/" novalidate>
                        
                            <div class="endereco p-4">
                                <?php
                                    if(isset($this->dados['endereco'][0])){
                                        extract($this->dados['endereco'][0]);
                                    ?>
                                    <div class="col-md-12">
                                        <h5><?=$identificacao;?></h5>
                                        <p>Endereço: <?=$logradouro;?>, Nº: <?=$numero;?><br>
                                        Bairro: <?=$bairro;?></p>

                                        <a href="<?=URL;?>listarEnderecos/index" class='text-primary'>Adicionar novo endereço/Alterar endereço padrão</a>
                                    </div>
                                    <?php
                                    }
                                    else{
                                        
                                        $identificacao = $logradouro = $numero = $bairro = 
                                        $padrao = $idEndereco = "";
                                        echo "<div class='alert alert-danger container'>Nenhum endereço cadastrado!<a href='".URL."listarEnderecos/index'> Clique aqui para adicionar um novo endereço.</a></div>";
                                    }
                                    ?>
                            </div>  

                        

                        <hr class="mb-4">
                        <input type="hidden" name="precoTotal" value="<?=$this->valorTotal;?>">

                        <div class="bg-light rounded-pill px-4 py-3 text-uppercase font-weight-bold">Observações</div>
                          <div class="p-4">
                            <p class="font-italic mb-4">Se você possui alguma informação adicional para o pedido ou entrega, descreva-a no campo abaixo.</p>
                            <textarea name="observacao" cols="30" rows="2" class="form-control"></textarea>
                          </div>
                        

                        <div class="bg-light rounded-pill px-4 py-3 text-uppercase font-weight-bold">Método de pagamento</div>
                        <div class="d-block p-4">
                            <div>
                                <input id="credito" name="formaPagamento" type="radio" value="Cartão" checked required>
                                <label for="credito">Cartão de crédito/débito no recebimento</label>
                            </div>
                            <div>
                                <input id="debito" name="formaPagamento" type="radio" value="Dinheiro" class="custom-control-input" required>
                                <label for="debito">Dinheiro no recebimento</label>
                            </div>
                        </div>
                        <hr class="mb-4">
                        <button class="btn btn-primary btn-lg btn-block" type="submit">Finalizar Pedido</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>