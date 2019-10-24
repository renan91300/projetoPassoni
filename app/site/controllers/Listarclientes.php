<?php

namespace App\site\controllers;

if(!defined('URL')){
    header("location: /");
    exit();
}

class Listarclientes{
    private $dados;

    public function index(){
        $this->dados = filter_input_array(INPUT_GET, FILTER_DEFAULT);

        if(isset($_SESSION['user']) && ($_SESSION['nivel']==1)){
            if(!empty($this->dados['btnFiltrarClientes'])){
                unset($this->dados['btnFiltrarClientes']);
                //CHAMADA DO MODELS USUARIO
                $listar_usuarios = new \Site\Models\Usuario();
                $this->dados['usuarios'] = $listar_usuarios->listar($this->dados);

                $carregarView = new \Config\ConfigView("listarClientes/index", $this->dados);
                $carregarView->renderizar();
            }
            else{
                //CHAMADA DO MODELS USUARIO
                $listar_usuarios = new \Site\Models\Usuario();
                $this->dados['usuarios'] = $listar_usuarios->listar();

                $carregarView = new \Config\ConfigView("listarClientes/index", $this->dados);
                $carregarView->renderizar();
            }
        }
        else{
            $urlDestino = URL . 'home/index';
            header("Location: $urlDestino");
        }    
    }
}