<?php

if (!defined('URL')){
    header("location: /");
    exit();
}
?>

<div class="container">
  <div class="row">
      <div class="col-md-8">
          <h2 class="mb-3">Editar Pedido #574</h2>
      </div>
  </div>
  <hr>

  <div class="card">
			<div class="card-body">
				<div class="col-sm-12">
					<form method="get">
						<div class="row">
							<div class="col-sm-3">
                                    <div class="form-group">
                                        <label for="estado">Status</label>
                                        <select class="form-control" id="estado">
                                            <option>Entregue</option>
                                            <option>Em transporte</option>
                                            <option>Pendente</option>
                                            <option>Cancelado</option>
                                        </select>
                                    </div>
                            </div>
                            <div class="col-sm-3">
                                    <div class="form-group">
                                        <label for="stPagamento">Status Pagamento</label>
                                        <select class="form-control" id="stPagamento">
                                            <option>Pago</option>
                                            <option>Aguardando Pagamento</option>
                                        </select>
                                    </div>
                            </div>
                        </div>
                        <div class="row">
                        	<div class="col-sm-3">
								<div class="form-group">
									<label for="valorOrcamento">Valor Orçamento</label>
									<input type="text" style="background:white;" name="userfone" id="valorOrcamento" class="form-control" value="R$350,00" placeholder="Orçamento">
								</div>
							</div>
                        	<div class="col-sm-8">
								<div class="form-group">
									<label for="descricao">Descrição</label>
									<textarea style="background:white;" name="descricao" id="descricao" class="form-control" placeholder="Cor rosa com decoração de unicórnio"></textarea>
								</div>
							</div>

                        </div>
                        <div class="row">
                        	<div class="col-sm-2">
								<div class="form-group">
									<div><button type="submit" name="submit" value="buscar" id="submit" class="btn btn-danger"><i class="fa fa-fw fa-edit"></i> Editar</button></div>
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