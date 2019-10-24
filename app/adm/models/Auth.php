<?php

namespace App\adm\models;

if (!defined('URL')){
    header("location: /");
    exit();
}

class Auth {

    private $dados;
    private $result;
    private $msg;
    private $rowCount;
    private $tabela = "usuarios";

    public function autenticar(array $dados) {
        $this->dados = $dados;
        $this->dados['senha'] = MD5($this->dados['senha']);
        $this->validar();
        if ($this->result){
            $validarAcesso = new \App\adm\models\helper\ModelsRead();
            $validarAcesso->exeReadEspecifico("SELECT u.idUsuario, u.nome, u.adm
                                        FROM {$this->tabela} as u
                                        WHERE u.email = \"{$this->dados['email']}\"
                                        AND u.senha = \"{$this->dados['senha']}\"");
            $this->result = $validarAcesso->getResult();

            if ($validarAcesso->getRowCount() == 1) {
                //var_dump($Visulizar->getResultado());
                $this->exeLogar();
            }else {
                $this->result = false;
                $this->msg = "
                        <div id='message_div' class='alert alert-danger' role='alert'>
                          Login e/ou senhas incorretos!
                        </div>
                        ";
            }
        }
    }

    public function validar(){
        $this->dados = array_map('strip_tags', $this->dados);
        $this->dados = array_map('trim', $this->dados);
        if (in_array('', $this->dados)){
            $this->result = false;
            $this->msg = "
                        <div id='message_div' class='alert alert-danger' role='alert'>
                          Login e/ou senhas incorretos!
                        </div>
                        ";
        }else{
            $this->result = true;
        }
    }

    private function exeLogar(){
			$_SESSION['user_data_criacao'] = $this->result[0]['data_criacao'];
			$_SESSION['id'] = $this->result[0]['idUsuario'];
            $_SESSION['user'] = $this->result[0]['nome'];
            $_SESSION['nivel'] = $this->result[0]['adm'];
    }

    function getResult() {
        return $this->result;
    }

    function getMsg() {
        return $this->msg;
    }

    function getRowCount() {
        return $this->rowCount;
    }

}
