<?php

namespace App\adm\controllers;

if(!defined('URL')){
    header("location: /");
    exit();
}

class visualizar{
	private $dados;
    public function index($idPedido){
        $this->idPedido = $idPedido;

        $visualizar_pedido = new \Site\Models\Pedido();
        $this->dados['pedido'] = $visualizar_pedido->visualizar($this->idPedido);   
    
        $carregarView = new \Config\ConfigView("visualizarBoloDePote/index", $this->dados);
        $carregarView->renderizarAdm();
    }
}

class editar{
    public function index($idPedido){
        $this->dados = filter_input_array(INPUT_POST, FILTER_DEFAULT);

        if(isset($_SESSION['user']) ){
            $this->idPedido = $idPedido;
            if(!empty($this->dados['formEditPedido'])){
                unset($this->dados['formEditPedido']);


                $editarPedido = new \Site\Models\Pedido();
                $editarPedido->altPedido($this->dados);

                $urlDestino = URLADM . 'visualizarBoloDePote/index/' . $this->idPedido;
                header("Location: $urlDestino");
            }
            else{
                    $visualizar_pedido = new \Site\Models\Pedido();
                    $this->dados['pedido'] = $visualizar_pedido->visualizar($this->idPedido);

                    $carregarView = new \Config\ConfigView("editarBoloPote/index", $this->dados);
                    $carregarView->renderizarAdm();
            }
        }
        else{
            $urlDestino = URLADM . 'home/index';
            header("Location: $urlDestino");
        }


    }
}