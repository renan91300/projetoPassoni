<?php

namespace App\adm\controllers;

if (!defined('URL')){
    header("location: /");
    exit();
}

class AdmUser {
    private $dados;
    private $id;

    public function index() {
        $this->dados = filter_input_array(INPUT_GET, FILTER_DEFAULT);

        $botao = ['cad_usuario' => true,
            'vis_usuario' => true,
            'edit_usuario' => true,
            'del_usuario' => true];

        $this->dados['botao'] = $botao;
        

        if(isset($_SESSION['user']) && ($_SESSION['nivel']==1)){
            if(!empty($this->dados['btnFiltrarClientes'])){
                unset($this->dados['btnFiltrarClientes']);
                //CHAMADA DO MODELS USUARIO
                $listarUsario = new \App\adm\models\User();
                $this->dados['listUser'] = $listarUsario->listarUsuario($this->dados);

                $carregarView = new \Config\ConfigView("user/index", $this->dados);
                $carregarView->renderizarAdm();
            }
            else{
                //CHAMADA DO MODELS USUARIO
                $listarUsario = new \App\adm\models\User();
                $this->dados['listUser'] = $listarUsario->listarUsuario();

                $carregarView = new \Config\ConfigView("user/index", $this->dados);
                $carregarView->renderizarAdm();
            }
        }
        else{
            $urlDestino = URL . 'home/index';
            header("Location: $urlDestino");
        }  
    }

    public function addUser(){
        $this->dados = filter_input_array(INPUT_POST, FILTER_DEFAULT);
        if (!empty($this->dados['formAddUser'])) {
            unset($this->dados['formAddUser']);
            $this->dados['imagem_nova'] = ($_FILES['imagem_nova'] ? $_FILES['imagem_nova'] : null);
            $cadUsuario = new \App\adm\Models\User();
            $cadUsuario->cadUsuario($this->dados);
            if ($cadUsuario->getResult()) {
                $urlDestino = URL . 'adm-user/index';
                header("Location: $urlDestino");
            } else {
                $this->dados['retorno'] = $this->dados;
                $carregarView = new \Config\ConfigView("user/addUser", $this->dados);
                $carregarView->renderizarAdm();
            }
        } else {
            $carregarView = new \Config\ConfigView("user/addUser");
            $carregarView->renderizarAdm();
        }
    }

    private function addUserVerPriv()
    {
        $listarSelect = new \App\adm\Models\User();
        $this->dados['select'] = $listarSelect->listarCadastrar();

        $botao = ['list_usuario' => true];        
        $this->dados['botao'] = $botao;
     
        $carregarView = new \Config\ConfigView("user/addUser", $this->dados);
        $carregarView->renderizarAdm();
    }


    public function upUser($dadosId = null)
    {
        $this->dados = filter_input_array(INPUT_POST, FILTER_DEFAULT);

        $this->dadosId = (int) $dadosId;

        if (!empty($this->dadosId)) {
            $this->upUserPriv();
        } else {
            $_SESSION['msg'] = "<div id='message_div' class='alert alert-danger'>Erro: Usuário não encontrado!</div>";
            $urlDestino = URL . 'adm-user/index';
            header("Location: $urlDestino");
        }
    }

    private function upUserPriv()
    {

        if (!empty($this->dados['formEditUser'])) {
            unset($this->dados['formEditUser']);
            $this->dados['imagem_nova'] = ($_FILES['imagem_nova'] ? $_FILES['imagem_nova'] : null);
            $editarUsuario = new \App\adm\models\User();
            $editarUsuario->altUsuario($this->dados);
            if ($editarUsuario->getResult()) {
                $_SESSION['msg'] = "<div id='message_div' class='alert alert-success'>Usuário editado com sucesso!</div>";
                $urlDestino = URL . 'adm-user/moreUser/' . $this->dados['idUsuario'];
                header("Location: $urlDestino");
            } else {
                $this->dados['retorno'] = $this->dados;
                $this->upUserViewPriv();
            }
        } else {
            $verUsuario = new \App\adm\models\User();
            $this->dados['form'] = $verUsuario->verUsuario($this->dadosId);
            $this->upUserViewPriv();
        }
    }

    private function upUserViewPriv()
    {
        if (isset($this->dados['form'])){
            $carregarView = new \Config\ConfigView("user/upUser", $this->dados);
            $carregarView->renderizarAdm();
        } 
        elseif(isset($this->dados['retorno'])){
            $carregarView = new \Config\ConfigView("user/upUser", $this->dados);
            $carregarView->renderizarAdm();
        }
        else{
            $_SESSION['msg'] = "<div id='message_div' class='alert alert-danger'>Erro: Usuário não encontrado!</div>";
            $UrlDestino = URL . 'user/index';
            header("Location: $UrlDestino");
        }
    }

    public function delUser($id = null){
        $this->id = (int) $id;
        if (!empty($this->id)) {
            $apagarUsuario = new \App\adm\Models\User();
            $apagarUsuario->apagarUsuario($this->id);
        } else {
            $_SESSION['msg'] = "<div id='message_div' class='alert alert-danger'>Erro: Necessário selecionar um usuário!</div>";
        }
        $urlDestino = URL . 'adm-user/index';
        header("Location: $urlDestino");
    }


    public function moreUser($id = null)
    {

        $this->id = (int) $id;
        if (!empty($this->id)) {
            $verUsuario = new \App\adm\Models\User();
            $this->dados['dados_usuario'] = $verUsuario->verUsuario($this->id);

            $botao = ['list_usuario' => true,
                'edit_usuario' => true,
                'edit_senha' => true,
                'del_usuario' => true];            
            $this->dados['botao'] = $botao;           

            $carregarView = new \Config\ConfigView("user/moreUser", $this->dados);
            $carregarView->renderizarAdm();
        } else {
            $_SESSION['msg'] = "<div id='message_div' class='alert alert-danger'>Erro: Usuário não encontrado!</div>";
            $urlDestino = URL . 'adm-user/index';
            header("Location: $urlDestino");
        }
    }
	
	public function upUserPass($dadosId = null){
        $this->dados = filter_input_array(INPUT_POST, FILTER_DEFAULT);
        $this->dadosId = (int) $dadosId;
        if (!empty($this->dadosId)) {
            $validaUsuario = new \App\adm\models\ModelsUpPass();
            $validaUsuario->valUsuario($this->dadosId);
            if ($validaUsuario->getResult()) {
                $this->upPassPriv();
            } else {
                $urlDestino = URL . 'adm-user/index';
                header("Location: $urlDestino");
            }
        } else {
            $_SESSION['msg'] = "<div id='message_div' class='alert alert-danger'>Erro: Usuário não encontrado!</div>";
            $UrlDestino = URL . 'adm-user/index';
            header("Location: $UrlDestino");
        }
    }

    private function upPassPriv(){
        if (!empty($this->dados['EditSenha'])) {
            unset($this->dados['EditSenha']);
            $editarSenha = new \App\adm\Models\ModelsUpPass();
            $editarSenha->editSenha($this->dados);
            if ($editarSenha->getResult()) {
                $_SESSION['msg'] = "<div id='message_div' class='alert alert-success'>Senha editada com sucesso!</div>";
                $urlDestino = URL . 'adm-user/moreUser/' . $this->dados['id'];
                header("Location: $urlDestino");
            } else {
                $this->dados['form'] = $this->dados['id'];
                $this->upPassViewPriv();
            }
        } else {
            $this->dados['form'] = $this->dadosId;
            $this->upPassViewPriv();
        }
    }

    private function upPassViewPriv()
    {
        if ($this->dados['form']) {
            $botao = ['vis_usuario' => true];            
            $this->dados['botao'] = $botao;


            $carregarView = new \Config\ConfigView("user/upUserPass", $this->dados);
            $carregarView->renderizarAdm();
        } else {
            $_SESSION['msg'] = "<div id='message_div' class='alert alert-danger'>Erro: Usuário não encontrado!</div>";
            $urlDestino = URL . 'adm-user/index';
            header("Location: $urlDestino");
        }
    }

}
