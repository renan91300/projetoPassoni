<?php

namespace App\site\controllers;

if(!defined('URL')){
    header("location: /");
    exit();
}

class Usuario{
    private $dados;

    public function visualizar($id=null){
        if(isset($_SESSION['user']) && ($_SESSION['nivel']==0)){
            $this->idUser = $_SESSION['id'];
            $visualizarUser = new \Site\models\Usuario();
            $this->dados['usuario'] = $visualizarUser->visualizarUsuario($this->idUser);
            
            $carregarView = new \Config\ConfigView("usuario/visualizar", $this->dados);
            $carregarView->renderizar();
        }
        elseif(isset($_SESSION['user']) && ($_SESSION['nivel']==1)){
            $this->idUser = $id;
            $visualizarUser = new \Site\models\Usuario();
            $this->dados['usuario'] = $visualizarUser->visualizarUsuario($this->idUser);
            
            $carregarView = new \Config\ConfigView("usuario/visualizar", $this->dados);
            $carregarView->renderizar();
        }
        else{
            $urlDestino = URL . 'home/index';
            header("Location: $urlDestino");
        }
    }
    public function cadastrar(){
        $this->dados = filter_input_array(INPUT_POST, FILTER_DEFAULT);
        
        if(isset($_SESSION['user'])){
            $_SESSION['msg'] = "<div id='message_div' class='alert alert-danger container'>Usuário já logado!</div>";
            $urlDestino = URL . 'home/index';
            header("Location: $urlDestino");
        }
        else{
            if(!empty($this->dados['formAddUser'])) {
                unset($this->dados['formAddUser']);
                if($this->dados['senha'] == $this->dados['senhaRepeat']){
                    unset($this->dados['senhaRepeat']);
                    $addUsuario = new \Site\Models\Usuario();
                    $addUsuario->addUser($this->dados);
                    if (!$addUsuario->getResult()){
                        $this->dados['formRetorno'] = $this->dados;
                    }else{
                        $this->dados['formRetorno'] = null;
                        $carregarView = new \Config\ConfigView("usuario/login");
                        $carregarView->renderizar();
                    }
                }
                else{
                    $_SESSION['msg'] = "<div id='message_div' class='alert alert-danger container'>Senhas não conferem!</div>";
                }
                
            }
        }
        $carregarView = new \Config\ConfigView("usuario/cadastrar", $this->dados);
        $carregarView->renderizar();
    }

    public function login(){
        $this->dados = filter_input_array(INPUT_POST, FILTER_DEFAULT);
        if(isset($_SESSION['user'])){
            $_SESSION['msg'] = "<div id='message_div' class='alert alert-danger container'>Usuário já logado!</div>";
            $urlDestino = URL . 'home/index';
            header("Location: $urlDestino");
        }
        else{
            if (!empty($this->dados['formLogar'])) {
                unset($this->dados['formLogar']);
                $entrar = new \Site\Models\Usuario();
                $entrar ->logar($this->dados);
                if (!$entrar->getResult()){
                    $this->dados['formRetorno'] = $this->dados;
                    $carregarView = new \Config\ConfigView("usuario/login", $this->dados);
                    $carregarView->renderizar(); 
                }else{
                    $urlDestino = URL . 'home/index';
                    header("Location: $urlDestino");
                }
                
            }
            else{
                $carregarView = new \Config\ConfigView("usuario/login", $this->dados);
                $carregarView->renderizar();    
            }    
        }
        
    }

    public function editarUsuario($dadosId = null){
        $this->dados = filter_input_array(INPUT_POST, FILTER_DEFAULT);

        if(isset($_SESSION['user']) ){
            if(($_SESSION['nivel']==0)){
                $this->dadosId = $_SESSION['id'];
            }
            elseif(($_SESSION['nivel']==1)){
                $this->dadosId = $dadosId;
            }
            
            if(!empty($this->dados['formEditUser'])){
                unset($this->dados['formEditUser']);

                $this->dados['imagem_nova'] = ($_FILES['imagem_nova'] ? $_FILES['imagem_nova'] : null);

                $editarUsuario = new \Site\Models\Usuario();
                $editarUsuario->altUsuario($this->dados);

                $urlDestino = URL . 'usuario/visualizar/' . $this->dadosId;
                header("Location: $urlDestino");
            }
            else{
                if(!empty($this->dadosId)){
                    $verUsuario = new \Site\Models\Usuario();
                    $this->dados['usuario'] = $verUsuario->visualizarUsuario($this->dadosId);

                    $carregarView = new \Config\ConfigView("usuario/editarUsuario", $this->dados);
                    $carregarView->renderizar();
                }
                else{
                    $_SESSION['msg'] = "<div id='message_div' class='alert alert-danger'>Usuario não encontrado!</div>";
                    $urlDestino = URL . 'usuario/editarUsuario';
                    header("Location: $urlDestino");
                }
            }
        }
        else{
            $urlDestino = URL . 'home/index';
            header("Location: $urlDestino");
        }


    }

    public function delUsuario($id = null){
        $this->id = (int) $id;
        if (!empty($this->id)) {
            $apagarUsuario = new \Site\Models\Usuario();
            $apagarUsuario->apagarUsuario($this->id);
        } else {
            $_SESSION['msg'] = "<div class='alert alert-danger'>Erro: Necessário selecionar um usuário!</div>";
        }
        $urlDestino = URL . 'listarClientes';
        header("Location: $urlDestino");
    }

    

    public function logout(){
        if(isset($_SESSION['user'])){
            session_unset();
            session_destroy();
            header("Location: {$_SERVER['HTTP_REFERER']}"); 
        }
    }
    
}