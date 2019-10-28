<?php

namespace App\site\controllers;

if(!defined('URL')){
    header("location: /");
    exit();
}

class ListarPedidosAdmin{
    private $dados;
    public function index(){
    	if(isset($_SESSION['user']) && ($_SESSION['nivel']==1)){
    		$listar_pedido = new \Site\models\Pedido();
	        $this->dados['pedidos'] = $listar_pedido->listar();

	        $carregarView = new \Config\ConfigView("ListarPedidosAdmin/index", $this->dados);
	        $carregarView->renderizar();	
    	}
    	else{
    		$urlDestino = URL . 'home/index';
            header("Location: $urlDestino");
    	}        
    }
}