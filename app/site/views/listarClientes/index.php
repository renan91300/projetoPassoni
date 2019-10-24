<?php
	if (!defined('URL')){
		header("location: /");
		exit();
	}
  	//echo "<br />View HOME <br />";
	//var_dump($this->dados['usuarios']);	
?>

<div class="container">
		<div class="card">
			<div class="card-header"><i class="fa fa-fw fa-globe"></i> <strong>Listagem de usuários</strong> <a href="#" class="float-right btn btn-primary btn-sm"><i class="fa fa-fw fa-plus-circle"></i> Adicionar usuário</a></div>
			<div class="card-body">
				<div class="col-sm-12">
					<h5 class="card-title"><i class="fa fa-fw fa-search"></i> Encontrar Usuário</h5>
					<form method="get" action="<?=URL;?>listarClientes">
						<div class="row">
							<div class="col-sm-3">
								<div class="form-group">
									<label>Nome</label>
									<input type="text" name="nome" id="username" class="form-control" value="" placeholder="Nome">
								</div>
							</div>
							<div class="col-sm-4">
								<div class="form-group">
									<label>Email</label>
									<input type="email" name="email" id="useremail" class="form-control" value="" placeholder="Email">
								</div>
							</div>
							<div class="col-sm-3">
								<div class="form-group">
									<label>Telefone</label>
									<input type="text" style="background:white;" name="telefone" id="userphone" class="form-control" value="" placeholder="Telefone">
								</div>
							</div>
							<div class="col-sm-2">
								<div class="form-group">
									<label>&nbsp;</label>
									<div><button type="submit" name="btnFiltrarClientes" value="buscar" id="submit" class="btn btn-dark"><i class="fa fa-fw fa-search"></i> Buscar</button></div>
								</div>
							</div>
						</div>
					</form>
				</div>
			</div>
		</div>
		<hr>  		
	</div>

	<main role="main" class="container px-4">		
		<table class="table table-striped table-action">
			<thead>
				<tr>
				  <th scope="col">Nome</th>
				  <th scope="col">Email</th>
				  <th scope="col">Nível</th>
				  <th scope="col">Ação</th>
				</tr>
			</thead>
			<tbody>
			<?php
				foreach ($this->dados['usuarios'] as $usuarios){
					extract($usuarios);?>
					<tr>
						<td><?= $nome;?></td>
						<td><?= $email;?></td>
						<td>
							<?php
								if($adm==1){
									echo "Administrador";
								}
								else{
									echo "Cliente";
								}
							?>
						</td>
						<td style="vertical-align: center;">
							<div class="actionsIconsClientes">
							<a href="<?=URL;?>usuario/visualizar/<?=$idUsuario;?>" class="text-primary"><i class="fa fa-eye"></i></a>
							<a href="<?=URL;?>usuario/editarUsuario/<?=$idUsuario;?>" class="text-primary"><i class="fa fa-fw fa-edit"></i></a>
							<a href="<?=URL;?>usuario/delUsuario/<?=$idUsuario;?>" class="text-danger" onClick="return confirm('Are you sure to delete this user?');"><i class="fa fa-fw fa-trash"></i></a>
							</div>
						</td>
					</tr>  
				<?php
					} 
				?>


			</tbody>
		</table>
      
    </main>