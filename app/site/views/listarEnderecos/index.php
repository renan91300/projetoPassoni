<?php

  if (!defined('URL')){
      header("location: /");
      exit();
  }
?>
<div class="container">
    
    <div class="row">
        <div class="col-md-8">
            <h2 class="mb-3">Endereço de entrega</h2>
        </div>

        <div class="col-md-4">
            <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#myModal">Adicionar
                Novo</button>
        </div>
        
    </div>
    <?php
        if (!isset($this->dados['formRetorno'])){
            $idEndereco = $cep = $bairro = $logradouro = $numero = $complemento = $pontoDeRef = $identificacao = "";
        }else {
            extract($this->dados['formRetorno']);
        }
    ?>
    <hr>


    <div class="container">
        <?php
            foreach ($this->dados['enderecos'] as $endereco){
                extract($endereco);?>
                <div class="listCard row">
                    <div class="col-md-4">
                        <h5><?=$identificacao;?></h5>
                        <p>Endereço: <?=$logradouro;?>, Nº: <?=$numero;?><br>
                        Bairro: <?=$bairro;?></p>

                    </div>
                    <div class="col-md-4">
                        <div class="actionsIcons">
                            <a href="<?=URL;?>listarEnderecos/visualizarEndereco/<?=$idEndereco;?>" class="text-primary icon"><i class="fa fa-eye"></i> Visualizar</a>
                            <a href="<?=URL;?>listarEnderecos/editarEndereco/<?=$idEndereco;?>" class="text-primary icon"><i class="fa fa-fw fa-edit"></i> Editar</a>
                            <a href="<?=URL;?>listarEnderecos/apagarEndereco/<?=$idEndereco;?>" class="text-danger icon" onClick="return confirm('Tem certeza que deseja exluir este endereco?');"><i class="fa fa-fw fa-trash"></i> Apagar</a>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <?php
                            if($padrao == 0){
                                echo "
                                    <a href='".URL."listarEnderecos/altEnderecoPadrao/". $idEndereco ."' class='text-warning icon'><i class='far fa-square'></i></i> Definir como endereço padrão</a>
                                ";
                            }
                            else{
                                echo "
                                    <span class='text-success icon'><i class='far fa-check-square'></i></i> Endereço padrão</span>
                                ";
                            }
                        ?>
                        
                    </div>
                </div> 
                <hr> 
            <?php
                }
                $$idEndereco = $cep = $bairro = $logradouro = $numero = $complemento = $pontoDeRef = $identificacao = "";

            ?> 
        
    </div>

    
    <!-- The Modal -->
    <div class="modal fade" id="myModal">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">

                <!-- Modal Header -->
                <div class="modal-header">
                    <h4 class="modal-title modalTit">Cadastrar Endereço</h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>

                <!-- Modal body -->
                <div class="modal-body">
                    
                    <form method="POST" action="<?=URL;?>listarEnderecos/addEndereco">
                        <div class="row">
                            <div class="col-5 mb-3">
                                <label for="cep">Digite seu CEP</label>
                                <input type="text" name="CEP" onblur="buscarCep()" class="form-control" id="cep" placeholder="CEP" value="<?=$cep;?>" maxlength="9" required>
                            </div>

                            <div class="col-sm-8 mb-3">
                                <label for="bairro">Bairro</label>
                                <input type="text" class="form-control" value="<?=$bairro;?>" id="bairro" name="bairro" placeholder="Digite o nome do seu bairro">
                                <div class="invalid-feedback">
                                    Por favor, insira seu endereço de entrega.
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-10 mb-3">
                                <label for="rua">Logradouro</label>
                                <input type="text" value="<?=$logradouro;?>" class="form-control" id="rua"
                                    placeholder="Rua, logradouro ou avenida" name="logradouro">
                                <div class="invalid-feedback">
                                    Por favor, insira seu endereço de entrega.
                                </div>
                            </div>

                            <div class="col-3 col-md-2 mb-3">
                                <label for="numero">Número</label>
                                <input type="number" name="numero" value="<?=$numero;?>" class="form-control" id="numero" placeholder="" required>
                                <div class="invalid-feedback">
                                    É obrigatório inserir um CEP.
                                </div>
                            </div>

                            <div class="col-md-5 col-9 col-5 mb-3">
                                <label for="comp">Complemento</label>
                                <input type="text" name="complemento" value="<?=$complemento;?>" class="form-control" id="comp"
                                    placeholder="Ex: Casa, Apt 300, entre outros">
                            </div>

                            <div class="col-md-7 mb-3">
                                <label for="ref">Ponto de Referência</label>
                                <input type="text" name="pontoDeRef" value="<?=$pontoDeRef;?>" class="form-control" id="ref" placeholder="Ex: Próximo a esquina"
                                    required>
                                <div class="invalid-feedback">
                                    Por favor, insira seu endereço de entrega.
                                </div>
                            </div>
                        </div>

                        <hr class="mb-4">

                        <div class="mb-3">
                            <label for="nomeEnd">Identicação do endereço (Como você gostaria de chamá-lo)</label>
                            <input type="text" class="form-control" value="<?=$identificacao;?>" name="identificacao" id="nomeEnd"
                                placeholder="Ex: Casa, Apartamento, Serviço" required>
                            <div class="invalid-feedback">
                                Por favor, insira seu endereço de entrega.
                            </div>
                        </div>
                        <div style="float: right;">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                            <button type="sumit" class="btn btn-primary" value="Enviar" name="btnFormAddEndereco">Cadastrar</button>
                        </div>
                    </form>
                </div>
                

            </div>
        </div>
    </div>

    <div class="modal fade" id="confirm">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">


                <!-- Modal body -->
                <div class="modal-body">
                    <p class="modal-title">Seus dados foram salvos!</p>

                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
                </div>

            </div>
        </div>
    </div>


</div>