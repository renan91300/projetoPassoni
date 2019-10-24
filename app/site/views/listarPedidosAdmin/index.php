<?php

  if (!defined('URL')){
      header("location: /");
      exit();
  }
?>

<div class="container">
		<div class="card">
			<div class="card-header"><i class="fa fa-fw fa-globe"></i> <strong>Listagem de pedidos</strong></div>
			<div class="card-body">
				<div class="col-sm-12">
					<h5 class="card-title"><i class="fa fa-fw fa-search"></i> Encontrar pedido</h5>
					<form method="get">
						<div class="row">
							<div class="col-sm-6">
								<div class="form-group">
									<label for="userName">Cliente</label>
									<input type="text" name="username" id="userName" class="form-control" value="" placeholder="Nome do cliente">
								</div>
							</div>
							<div class="col-sm-6">
								<div class="form-group">
									<label for="userEmail">Email</label>
									<input type="email" name="useremail" id="userEmail" class="form-control" value="" placeholder="Email">
								</div>
							</div>
							<div class="col-sm-3">
								<div class="form-group">
									<label for="userFone">Telefone</label>
									<input type="text" style="background:white;" name="userfone" id="userFone" class="form-control" value="" placeholder="Telefone">
								</div>
							</div>
							<div class="col-sm-3">
                                    <div class="form-group">
                                        <label for="estado">Status</label>
                                        <select class="form-control" id="estado">
                                            <option>Todos</option>
                                            <option>Entregue</option>
                                            <option>Em transporte</option>
                                            <option>Pendente</option>
                                            <option>Cancelado</option>
                                        </select>
                                    </div>
                            </div>
                            <div class="col-sm-3">
                                    <div class="form-group">
                                        <label for="produto">Produto</label>
                                        <select class="form-control" id="produto">
                                            <option>Todos</option>
                                            <option>Bolo de Pote</option>
                                            <option>Bolo Personalizado</option>
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
		<hr>
		
		<div class="container">
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
                           <a href="<?=URL;?>editarBoloPote/index/<?=$idPedido;?>" class="text-success"><i class="fa fa-fw fa-edit"></i> Editar</a>
                        </div>
                    </div>
                </div>
                <hr>
                <?php
					}
				?> 
			</div>
		
	</div>