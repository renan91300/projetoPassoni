<?php

if (!defined('URL')){
    header("location: /");
    exit();
}
?>

<div class="container">
  <?php
    if(isset($this->dados['pedido'])){
      var_dump($this->dados['pedido']['pedido']);
      extract($this->dados['pedido']['pedido'][0]);
    }
  ?>
  <div class="row">
      <div class="col-md-8">
          <h2 class="mb-3">Editar Pedido #<?=$idPedido?></h2>
      </div>
  </div>
  <hr>

  <div class="card">
			<div class="card-body">
				<div class="col-sm-12">
					<form method="POST" action="<?=URL;?>pedido/editar">
            <input type="hidden" name="idPedido" value="<?=$idPedido;?>">
						<div class="row">
							<div class="col-sm-3">
                <div class="form-group">
                    <label for="status">Status</label>
                    <select name="status" class="form-control" id="status">                      
                        <option value="Entregue" <?php if($status=='Entregue') echo 'selected';?>>
                          Entregue
                        </option>
                        <option value="Em andamento" <?php if($status=='Em andamento') echo 'selected';?>>
                          Em andamento
                        </option>
                        <option value="Em entrega" <?php if($status=='Em entrega') echo 'selected';?>>
                          Em entrega
                        </option>
                        <option value="Recusado" <?php if($status=='Recusado') echo 'selected';?>>
                          Recusado
                        </option>
                        
                    </select>
                </div>
              </div>
              <div class="col-sm-3">
                <div class="form-group">
                    <label for="statusP">Status Pagamento</label>
                    <select name="statusPagamento" class="form-control" id="statusP">                      
                        <option value="Aguardando Pagamento" <?php if($statusPagamento=='Aguardando Pagamento') echo 'selected';?>>
                          Aguardando Pagamento
                        </option>
                        <option value="Pagamento Efetuado" <?php if($statusPagamento=='Pagamento Efetuado') echo 'selected';?>>
                          Pagamento Efetuado
                        </option>
                    </select>
                </div>
              </div>
              <div class="col-sm-2">
                      <div class="form-group">
                          <label for="entrega">Forma de entrega</label>
                          <select name="formaEntrega" class="form-control" id="entrega">
                              <option value="Retirar" <?php if($formaEntrega=='Retirar') echo 'selected';?>>Retirar</option>
                              <option value="Delivery" <?php if($formaEntrega=='Delivery') echo 'selected';?>>Delivery</option>
                          </select>
                      </div>
              </div>
            </div>
            <div class="row">
              <div class="col-sm-3">
                <div class="form-group">
                    <label for="formaP">Método de Pagamento</label>
                    <select name="formaPagamento" class="form-control" id="formaP">                      
                        <option value="Dinheiro" <?php if($formaPagamento=='Dinheiro') echo 'selected';?>>
                          Dinheiro
                        </option>
                        <option value="Cartão" <?php if($formaPagamento=='Cartão') echo 'selected';?>>
                          Cartão
                        </option>
                    </select>
                </div>
              </div>
            </div>
            <div class="row">
            	<div class="col-sm-8">
  							<div class="form-group">
  								<label for="observacao">Observação</label>
  								<textarea style="background:white; height: 150px" name="observacao" id="observacao" class="form-control" placeholder="Observação" maxlength="500"><?=$observacao;?></textarea>
  							</div>
  						</div>
            </div>
            <div class="row">
            	<div class="col-sm-2">
  							<div class="form-group">
  								<div><button style="cursor: pointer;" type="submit" name="formEditPedido" value="buscar" id="submit" class="btn btn-danger"><i class="fa fa-fw fa-edit"></i> Editar</button></div>
  							</div>
  						</div>
            </div>
					</form>
				</div>
			</div>
		</div>
		<hr>	

  <div>
      
  </div>
  <!--/.col-sm-12-->

</div>