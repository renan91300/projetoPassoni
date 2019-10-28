<?php

namespace App\site\controllers;

if(!defined('URL')){
    header("location: /");
    exit();
}

class VisualizarBoloDePote{
	private $dados;
    public function index($idPedido){
        $this->idPedido = $idPedido;

        $visualizar_pedido = new \Site\models\Pedido();
        $this->dados['pedido'] = $visualizar_pedido->visualizar($this->idPedido);   
    
        $carregarView = new \Config\ConfigView("visualizarBoloDePote/index", $this->dados);
        $carregarView->renderizar();
    }
}