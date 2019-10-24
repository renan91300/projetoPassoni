<?php

namespace App\site\controllers;

if(!defined('URL')){
    header("location: /");
    exit();
}

class EditarBoloPote{
    public function index($idPedido){
        $this->dados = filter_input_array(INPUT_POST, FILTER_DEFAULT);

        if(isset($_SESSION['user']) ){
        	$this->idPedido = $idPedido;
            if(!empty($this->dados['formEditPedido'])){
                unset($this->dados['formEditPedido']);


                $editarPedido = new \Site\Models\Pedido();
                $editarPedido->altPedido($this->dados);

                $urlDestino = URL . 'visualizarBoloDePote/index/' . $this->idPedido;
                header("Location: $urlDestino");
            }
            else{
                    $visualizar_pedido = new \Site\Models\Pedido();
        			$this->dados['pedido'] = $visualizar_pedido->visualizar($this->idPedido);

                    $carregarView = new \Config\ConfigView("editarBoloPote/index", $this->dados);
                    $carregarView->renderizar();
            }
        }
        else{
            $urlDestino = URL . 'home/index';
            header("Location: $urlDestino");
        }


    }
}