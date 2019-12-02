<?php

if (!defined('URL')){
    header("location: /");
    exit();
}
    if(isset($_SESSION['ProdAdd'])){
        unset($_SESSION['ProdAdd']);
        echo "
            <script>
            var firstTime = true;
            $(document).ready(function() {
                if(firstTime){
                    $('#modalCarrinho').modal();    
                }
                firstTime = false;            
            });
                
            </script>
        ";
    }
?>


<div class="container">
    <h3>BOLO NO POTÃO</h3>
    <hr>
    <!-- Rows -->
    <div class="row product">
        <?php
            /*if(isset($_POST['sabor'])){
                $this->escolhaSabor = $_POST['sabor'];
                foreach ($this->dados['bolos'] as $bolos) {
                    if($bolos['sabor'] == $this->escolhaSabor){
                        extract($bolos);
                        $this->dados['boloDescricao'] = $descricao;
                    };
                }
            }
            else{
                extract($this->dados['bolos'][0]);
            }*/
        ?>

        <div class="col-md-5 imageCakepot">
            <!--<img id="cake_photo" src="<?=URL;?>assets/img/bolos/bolosdepote/<?=$idBoloDePote;?>/<?=$imagem;?>" class="imgproduct"
                alt="error">-->
                <img id="cake_photo" src="" class="imgproduct"
                alt="error">
        </div>
        <div class="col-md-7 brief">
            
            <label id="precoBolo" class="cake_price"></label>
            <label id="tamanhoBolo"></label>
            <br>
            <form action="<?=URL;?>carrinho/addProdCarrinho" method="POST" name="formProd">
                <input type="hidden" name="idBoloDePote" value="" />
                <input type="hidden" name="sabor" value="" />
                <input type="hidden" name="preco" value="" />
                <input type="hidden" name="imagem" value="" />

                <div class="nice-number quantity">
                    <input type="number" name="qtd" class="qtd" value="1" min="1" max="100" style="width: 1.5em;">
                </div>
            </form>
            
            
            <input type="hidden" name="idBolo" id="idBolo">


            <div class="flavors">              
                <p>Escolha um sabor</p>
                <form method="post" name="formFlavors" action="">
                </form>
            </div>


            <div class="productDescription">
                <p>
                    <h4 id="desc">
                        <?php
                            if(isset($this->dados['boloDescricao'])){
                                echo $this->dados['boloDescricao'];
                            }
                            else{
                                echo $this->dados['bolos'][0]['descricao'];
                            }
                        ?>
                    </h4>
                    <ul>
                        <li>
                            Massa caseira, macia e fofa, feita com ingredientes frescos.
                        </li>
                        <li>
                            Brigadeiro gourmet com chocolate meio amargo importado de alta qualidade.
                        </li>
                        <li>
                            Contém ovo, leite e glúten.
                        </li>
                    </ul>
                </p>
                <label>Armazenado no congelador tem prazo de validade de 60 dias.</label>

            </div>
            <div class="occasion-cart">
                <div class="snipcart-details top_brand_home_details item_add single-item hvr-outline-out">
                    <!--<form action="#" method="post">
                        <?php
                            /*if(!empty($this->escolhaSabor)){
                                foreach ($this->dados['bolos'] as $bolos) {
                                    if($bolos['sabor'] == $this->escolhaSabor){
                                        extract($bolos);
                                    };
                                }
                            }
                            else{
                                $idBoloDePote = $preco = $sabor = $imagem = " ";
                            }
                            */
                                
                        ?>
                        <input type="text" name="idBoloDePote" value="<?=$idBoloDePote;?>" />
                        <input type="text" name="sabor" value="<?=$sabor;?>" />
                        <input type="text" name="preco" value="<?=$preco;?>" />
                        <input type="text" name="imagem" value="<?=$imagem;?>" />
                        <input type="text" name="qtd" id="campoQtd" value="" />                        
                    </form>-->

                    <button data-toggle="modal" data-target="#modalCarrinho" class="buttonaddcart" type="button" id="btnAddCarrinho" onClick="formProd.submit()">
                            Adicionar ao carrinho</button>
                </div>
            </div>

        </div>
    </div>

    <!-- MODAL CARRINHO -->
    <div class="modal fade" id="modalCarrinho" tabindex="-1" role="dialog" aria-labelledby="TituloModalCentralizado"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">


                </div>
                <div class="modal-body">
                    <span>Produto adicionado ao carrinho! O que deseja fazer agora?</span>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-success" data-dismiss="modal">Continuar comprando!</button>
                    <a href="<?=URL;?>carrinho" class="btn btn-danger" >Ir para o carrinho</a>
                </div>
            </div>
        </div>
    </div>
</div>