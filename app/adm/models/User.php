<?php

namespace App\adm\models;

if (!defined('URL')) {
    header("Location: /");
    exit();
}

class User{

    private $result;
    private $limiteResultado = 40;
    private $id;
    private $dados;
    private $tabela = "usuarios";

    
    public function listarUsuario(array $dados=null){
        $this->dados = $dados;
        $listar = new \App\adm\models\helper\ModelsRead();
        $listar->exeReadEspecifico("SELECT u.idUsuario, u.nome, u.email, u.adm,u.telefone
                                    FROM {$this->tabela} as u
                                    WHERE u.nome LIKE '%{$this->dados['nome']}%'
                                    AND u.email LIKE '%{$this->dados['email']}%'
                                    AND u.telefone LIKE '%{$this->dados['telefone']}%'
                                    ORDER BY u.idUsuario ASC");
        $this->result['usuarios'] = $listar->getResult();
        return $this->result['usuarios'];
    }

    public function verUsuario($id){
        $this->id = (int) $id;
        $verPerfil = new \App\adm\Models\helper\ModelsRead();
        $verPerfil->exeReadEspecifico("SELECT user.*
                                        FROM usuarios as user
                WHERE user.idUsuario =:id LIMIT :limit", "id=".$this->id."&limit=1");
        $this->result= $verPerfil->getResult();
        return $this->result;
    }

    function getResult()
    {
        return $this->result;
    }

    public function confirmarUser(){
        $verUsuario = new \App\adm\Models\helper\ModelsRead();
        $verUsuario->exeReadEspecifico("SELECT u.imagem FROM usuarios AS u
                WHERE u.idUsuario =:id LIMIT :limit", "id=" . $this->id."&limit=1");
        $this->dados = $verUsuario->getResult();
    }

    public function apagarUsuario($id = null)
    {
        
        $this->id = (int) $id;
        $this->confirmarUser();
        if ($this->dados) {
            $apagarUsuario = new \App\adm\Models\helper\ModelsDelete();
            $apagarUsuario->exeDelete("usuarios", "WHERE idUsuario =:id", "id={$this->id}");
            if ($apagarUsuario->getResult()) {
                $apagarImg = new \App\adm\Models\helper\ModelsDelete();

                $apagarImg->apagarImg('assets/img/usuario/' . $this->id . '/' . $this->dados[0]['imagem'], 'assets/img/usuario/' . $this->id);
                $_SESSION['msg'] = "<div id='message_div' class='alert alert-success'>Usuário excluído com sucesso!</div>";
                $this->result = true;
            } else {
                $_SESSION['msg'] = "<div id='message_div' class='alert alert-danger'>Erro: Usuário não foi apagado!</div>";
                $this->result = false;
            }
        } else {
            $_SESSION['msg'] = "<div id='message_div' class='alert alert-danger'>Erro: Usuário não foi apagado!</div>";
            $this->result = false;
        }
    }


    public function cadUsuario(array $dados)
    {
        $this->dados = $dados;
        
        $this->foto = $this->dados['imagem_nova'];
        unset($this->dados['imagem_nova']);

        $valCampoVazio = new \App\adm\models\helper\ModelsCampoVazio();
        $valCampoVazio->validarDados($this->dados);

        if ($valCampoVazio->getResult()) {
            $this->valCampos();
        } else {
            $this->result = false;
        }
    }

    private function valCampos()
    {   

        $valEmail = new \App\adm\models\helper\ModelsEmail();
        $valEmail->valEmail($this->dados['email']);

        $valEmailUnico = new \App\adm\Models\helper\ModelsEmailUnico();
        $valEmailUnico->valEmailUnico($this->dados['email']);

        $valUsuario = new \App\adm\models\helper\ModelsValUsuario();
        $valUsuario->valUsuario($this->dados['nome']);

        $valSenha = new \App\adm\models\helper\ModelsValSenha();
        $valSenha->valSenha($this->dados['senha']);


        if (($valSenha->getResult()) AND ( $valUsuario->getResult()) AND ( $valEmailUnico->getResult()) AND ( $valEmail->getResult())) {
            $this->inserirUsuario();
        } else {
            $this->result = false;
        }
    }

    private function inserirUsuario()
    {
        $this->dados['senha'] = md5($this->dados['senha']);
        $this->dados['data_criacao'] = date("Y-m-d H:i:s");
        $slugImg = new \App\adm\Models\helper\ModelsSlug();
        $this->dados['imagem'] = $slugImg->nomeSlug($this->foto['name']);

        $cadUsuario = new \App\adm\models\helper\ModelsCreate();
        //var_dump($this->dados);
        //exit;
        
        $cadUsuario->exeCreate("usuarios", $this->dados);
        if ($cadUsuario->getResult()) {
            if (empty($this->foto['name'])) {
                $_SESSION['msg'] = "<div id='message_div' class='alert alert-success'>Usuário cadastrado com sucesso!</div>";
                $this->result = true;
            } else {
                $this->dados['id'] = $cadUsuario->getResult();
                $this->valFoto();
            }
        } else {
            $_SESSION['msg'] = "<div id='message_div' class='alert alert-danger'>Erro: O usuario não foi cadastrado!</div>";
            $this->result = false;
        }
    }

    private function valFoto()
    {
        $uploadImg = new \App\adm\models\helper\ModelsUploadImgRed();
        $uploadImg->uploadImagem($this->foto, 'assets/img/usuario/' . $this->dados['id'] . '/', $this->dados['imagem'], 150, 150);
        if ($uploadImg->getResult()) {
            $_SESSION['msg'] = "<div id='message_div' class='alert alert-success'>Usuário cadastrado com sucesso!</div>";
            $this->result = true;
        } else {
            $_SESSION['msg'] = "<div id='message_div' class='alert alert-danger'>Erro: O usuario não foi cadastrado!</div>";
            $this->result = false;
        }
    }
    
    public function verFormCadUsuario()
    {
        $verFormCadUsuario = new \App\adm\models\helper\ModelsRead();
        $verFormCadUsuario->exeReadEspecifico("SELECT * FROM user
                WHERE id =:id LIMIT :limit", "id=1&limit=1");
        $this->result = $verFormCadUsuario->getResult();
        return $this->result;
    }

    public function altUsuario(array $dados)
    {
        $this->dados = $dados;

        //var_dump($this->Dados);
        $this->foto = $this->dados['imagem_nova'];
        $this->imgAntiga = $this->dados['imagem_antiga'];
        unset($this->dados['imagem_nova'], $this->dados['imagem_antiga']);

        $valCampoVazio = new \App\adm\models\helper\ModelsCampoVazio();
        $valCampoVazio->validarDados($this->dados);

        if ($valCampoVazio->getResult()) {
            $this->valCamposAlterar();
        } else {
            $this->result = false;
        }
    }

    private function valCamposAlterar()
    {

        $valEmail = new \App\adm\models\helper\ModelsEmail();
        $valEmail->valEmail($this->dados['email']);

        $valEmailUnico = new \App\adm\models\helper\ModelsEmailUnico();
        $editarUnico = true;
        $valEmailUnico->valEmailUnico($this->dados['email'], $editarUnico, $this->dados['idUsuario']);

        $valUsuario = new \App\adm\models\helper\ModelsValUsuario();
        $valUsuario->valUsuario($this->dados['nome'], $editarUnico, $this->dados['idUsuario']);


        $valSenha = new \App\adm\models\helper\ModelsValSenha();
        $valSenha->valSenha($this->dados['senha']);

        if (($valSenha->getResult()) AND ( $valUsuario->getResult()) AND ( $valEmailUnico->getResult()) AND ( $valEmail->getResult())) {

            $this->valFotoAlterar();
        } else {
            $this->result = false;
        }
    }

    private function valFotoAlterar()
    {   
        if (empty($this->foto['name'])) {
            $this->updateEditUsuario();
        } else {
            $slugImg = new \App\adm\models\helper\ModelsSlug();
            $this->dados['imagem'] = $slugImg->nomeSlug($this->foto['name']);

            $uploadImg = new \App\adm\models\helper\ModelsUploadImgRed();
            $uploadImg->uploadImagem($this->foto, 'assets/img/usuario/' . $this->dados['idUsuario'] . '/', $this->dados['imagem'], 150, 150);
            if ($uploadImg->getResult()) {
                $apagarImg = new \App\adm\models\helper\ModelsApagarImg();
                $apagarImg->apagarImg('assets/img/usuario/' . $this->dados['idUsuario'] . '/' . $this->imgAntiga);
                $this->updateEditUsuario();
            } else {
                $this->result = false;
            }
        }
    }

    private function updateEditUsuario()
    {
        $this->dados['senha'] = md5($this->dados['senha']);
        $upAltSenha = new \App\adm\Models\helper\ModelsUpdate();
        $upAltSenha->exeUpdate("usuarios", $this->dados, "WHERE idUsuario =:id", "id=" . $this->dados['idUsuario']);
        if ($upAltSenha->getResult()) {
            $_SESSION['msg'] = "<div id='message_div' class='alert alert-success'>Usuário atualizado com sucesso!</div>";
            $this->result = true;
        } else {
            $_SESSION['msg'] = "<div id='message_div' class='alert alert-danger'>Erro: O usuario não foi atualizado!</div>";
            $this->result = false;
        }
    }


}
