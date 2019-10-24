<?php

  if (!defined('URL')){
      header("location: /");
      exit();
  }
?>

<div class="container">
    <?php
        if (isset($_SESSION['msg'])){
            echo $_SESSION['msg'];
            unset($_SESSION['msg']);
        }
        if (!isset($this->dados['endereco'])){
            $idEndereco = $cep = $bairro = $logradouro = $numero = $complemento = $pontoDeRef = $identificacao = "";
        }else {
            extract($this->dados['endereco'][0]);
        }
    ?>

    <div class="row">
        <div class="col-md-8">
            <h2 class="mb-3">Modificar Endereço</h2>
        </div>
        
    </div>
    <hr>

    <form method="POST" action="<?=URL;?>listarEnderecos/editarEndereco">
        <div class="row">
            <input type="int" name="idEndereco" value="<?=$idEndereco;?>" hidden>
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
            <input type="text" class="form-control" name="identificacao" value="<?=$identificacao;?>" id="nomeEnd"
                placeholder="Ex: Casa, Apartamento, Serviço" required>
            <div class="invalid-feedback">
                Por favor, insira seu endereço de entrega.
            </div>
        </div>
        <div style="float: right;">
            <a class="btn btn-secondary" href="<?=URL;?>listarEnderecos/index">Cancelar</a>
            <button type="sumit" class="btn btn-primary" value="Editar" name="fomEditarEnd">Alterar</button>
        </div>
    </form>