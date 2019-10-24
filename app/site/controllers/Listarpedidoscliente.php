<?php

namespace App\site\controllers;

if(!defined('URL')){
    header("location: /");
    exit();
}

class ListarPedidosCliente{
	private $dados;
    public function index(){
	    if(isset($_SESSION['user'])){

	    	$listar_pedidos = new \Site\Models\Pedido();
    		$this->dados['pedidos'] = $listar_pedidos->listar();


	    	$carregarView = new \Config\ConfigView("ListarPedidosCliente/index", $this->dados);
	        $carregarView->renderizar();
	    }
	    else{
	    	$urlDestino = URL . 'home/index';
            header("Location: $urlDestino");
	    }
    }
}