<?php

if (!defined('URL')){
    header("location: /");
    exit();
}
?>

<div class="container">
    <div class="row">
        <div class="col-md-8">
            <h2 class="mb-3">Pedido #574</h2>
        </div>
    </div>
    <hr>

    <div>
        <table class="table table-striped table-bordered">
            <thead>
                <tr class="bg-primary text-white">
                    <th>Código</th>
                    <th>Cliente</th>
                    <th>Data do pedido</th>
                    <th>Nome produto</th>
                    <th>Formato</th>
                    <th>Qtd Camadas</th>
                    <th>Descrição</th>
                    <th>Imagem</th>
                    <th>Quantidade</th>
                    

                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>#574</td>
                    <td>Josué</td>
                    <td>10/05/2019 10:02:01</td>
                    <td>Bolo personalizado</td>
                    <td>Redondo</td>
                    <td>4</td>
                    <td>Cor rosa com decoração de unicórnio</td>
                    <td>link</td>
                    <td>1</td>
                    

                </tr>
            </tbody>
    </table>
    <table class="table table-striped table-bordered">
            <thead>
                <tr class="bg-primary text-white">
                    <th>Endereço de entrega</th>
                    <th>Taxa de entrega</th>
                    <th>Status pedido</th>
                    <th>Valor Orçamento</th>
                    <th>Valor Total</th>
                    <th>Forma de pagamento</th>
                    <th>Status de pagamento</th>

                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>Rua dos bobos</td>
                    <td>R$2,00</td>
                    <td><span class="text-warning">&#x2605;</span> Aguardando aprovação</td>
                    <td>R$350,00</td>
                    <td>R$352,00</td>
                    <td>Cartão de crédito</td>
                    <td>Pago</td>
                </tr>
            </tbody>

        </table>
    </div>
    <!--/.col-sm-12-->

</div>