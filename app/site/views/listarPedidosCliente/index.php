	<?php

	  if (!defined('URL')){
	      header("location: /");
	      exit();
	  }
	?>

	<div class="container">
		<div class="row">
	        <div class="col-md-8">
	            <h2 class="mb-3">Meus Pedidos</h2>
	        </div>	        
	    </div>
	    <hr>			
			<div class="container">
				<?php
					foreach($this->dados['pedidos'] as $pedido){
						extract($pedido);?>
				<div class="listCard row">
                    <div class="col-md-4">
                        <h5>ID: #<?=$idPedido;?></h5>
                        <p>Valor do Pedido: R$<?=$precoTotal;?>,00<br>
                        	Quantidade de bolos: <?=$qtdBolos;?>
                        	<br>Status:
                        	<span class="
								<?php
									if($status == "Finalizado"){
										echo "text-success";
									}
									elseif($status == "Recusado"){
										echo "text-danger";
									}
									else{
										echo "text-warning";
									}?>
								">&#x2605;</span> <?=$status;?></td>
                        </p>

                    </div>
                    <div class="col-md-4">
                    	<h5>Endereço de entrega:</h5>
                    	<p><?=$logradouro;?>, <?=$numero;?> -
                    	<br><?=$bairro;?></p>
                    </div>
                    <div class="col-md-4">
                        <div class="actionsIcons">
                           <a href="<?=URL;?>visualizarBoloDePote/index/<?=$idPedido;?>" class="text-primary"><i class="fa fa-eye"></i> Mais Detalhes</a>
                        </div>
                    </div>
                </div>
                <hr>
                <?php
					}
				?> 
			</div>
		</div>