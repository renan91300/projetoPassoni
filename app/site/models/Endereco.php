<?php

namespace Site\models;

if (!defined('URL')){
    header("location: /");
    exit();
}


class Endereco{

    private $result = false;
    private $tabela = 'endereco';

    public function addEndereco(array $dados){
        $this->dados = $dados;
        $this->dados['idCliente'] = $_SESSION['id'];
        //$this->validarDados();
 
        $this->exeAddEndereco();

    }

    private function validarDados(){
        $this->dados = array_map('strip_tags', $this->dados);
        $this->dados = array_map('trim', $this->dados);
        if (in_array('', $this->dados)){
            $_SESSION['msg'] = "
                        <div class='alert alert-danger' role='alert'>
                          <strong>Erro ao enviar:</strong> Os campos obrigatórios não foram preenchidos!
                        </div>";
        }else{
            if (filter_var($this->dados['email'], FILTER_VALIDATE_EMAIL)){
                $this->result = true;
            }else{
                $_SESSION['msg'] = "
                        <div class='alert alert-danger' role='alert'>
                          <strong>Erro ao enviar:</strong> O campo e-mail é inválido!
                        </div>";
            }
        }
    }

    private function exeAddEndereco(){
        $inserir = new \Site\models\helper\ModelsCreate();
        $inserir->exeCreate($this->tabela, $this->dados);
        if ($inserir->getResult()){
            $this->result = true;
            $_SESSION['msg'] ="<div id=\"message_div\" class=\"alert alert-success\" role=\"alert\">
                                    Endereço salvo com sucesso!
                                </div>";  
        }else{
            $_SESSION['msg'] = "<div id=\"message_div\" class=\"alert alert-danger\" role=\"alert\">
                                    Erro ao salvar endereço! Erro: {$inserir->getMsg()}
                                </div>";
        }
    }

    public function listar(){
        $listar = $listar = new \Site\models\helper\ModelsRead();
        $listar->exeReadEspecifico("SELECT e.idEndereco, e.identificacao, e.bairro, e.logradouro, e.numero, 
                                    e.cep, e.padrao
                                    FROM {$this->tabela} as e
                                    WHERE e.idCliente = {$_SESSION['id']}
                                    ORDER BY e.idEndereco ASC");
        
        $this->result['enderecos'] = $listar->getResult();
        return $this->result['enderecos'];
    }

    public function verEndereco($id=null, $padrao=null){
        if($padrao){
            $verAdress = new \Site\models\helper\ModelsRead();
            $verAdress->exeReadEspecifico("SELECT e.idEndereco, e.identificacao, e.bairro, e.logradouro, 
                                            e.numero, e.cep, e.padrao
                                            FROM {$this->tabela} as e
                                            WHERE e.idCliente = {$_SESSION['id']} 
                                            AND e.padrao = 1 
                                            ORDER BY e.idEndereco ASC LIMIT :limit", "limit=1");
        }
        else{
            $this->id = (int) $id;        
            $verAdress = new \Site\models\helper\ModelsRead();
            $verAdress->exeReadEspecifico("SELECT e.idEndereco, e.identificacao, e.bairro, e.logradouro, 
                                        e.numero, e.cep, e.complemento, e.pontoDeRef, e.padrao
                                        FROM {$this->tabela} as e
                                        WHERE e.idCliente = {$_SESSION['id']} 
                                        AND e.idEndereco = {$this->id} 
                                        ORDER BY e.idEndereco ASC LIMIT :limit", "limit=1");
        }
        $this->result['endereco'] = $verAdress->getResult();
        return $this->result['endereco'];
    }

    public function altEndereco(array $dados){
        $this->dados = $dados;

        if(isset($this->dados['idEndereco'])){
            $this->id = $this->dados['idEndereco'];
        }
        elseif(isset($this->dados['enderecos'][0]['idEndereco'])){
            $this->id = $this->dados['enderecos'][0]['idEndereco'];
        }
        

        $upEndereco = new \Site\models\helper\ModelsUpdate();
        $upEndereco->exeUpdate("endereco", $this->dados, "WHERE idEndereco =:id", "id=" . $this->id);

        if ($upEndereco->getResult()) {
            $_SESSION['msg'] = "<div id='message_div' class='alert alert-success'>Endereço atualizado com sucesso!</div>";
            $this->result = true;
        } else {
            $_SESSION['msg'] = "<div id='message_div' class='alert alert-danger'>Erro: O endereço não foi atualizado!</div>";
            $this->result = false;
        }
    }

    public function alterarEnderecoPadrao(array $dados){
        $this->dados = $dados['endereco'][0];

        $upEndereco = new \Site\models\helper\ModelsUpdate();
        $upEndereco->exeUpdateEspecifico("
            UPDATE endereco e
            SET e.padrao = CASE e.idEndereco
                    WHEN {$this->dados['idEndereco']} THEN 1
                    ELSE 0 
                    END");

        if ($upEndereco->getResult()) {
            $_SESSION['msg'] = "<div id=\"message_div\" class=\"alert alert-success container \" role=\"alert\">Endereço atualizado com sucesso!</div>";
            $this->result = true;
        } else {
            $_SESSION['msg'] = "<div id='message_div' class='alert alert-danger'>Erro: O endereço não foi atualizado!</div>";
            $this->result = false;
        }
    }

    public function delEndereco($id = null){
        $this->id = (int) $id;
        $apagarEndereco = new \Site\models\helper\ModelsDelete();
        $apagarEndereco->exeDelete("endereco", "WHERE idEndereco =:id", "id={$this->id}");
        if ($apagarEndereco->getResult()) {
            $_SESSION['msg'] = "<div id='message_div' class='alert alert-success'>Endereço excluído com sucesso!</div>";
            $this->result = true;
        } else {
            $_SESSION['msg'] = "<div id='message_div' class='alert alert-danger'>Erro: Endereço não foi apagado!</div>";
            $this->result = false;
        }
    }

    public function getResult(){
        return $this->result;
    }
}

