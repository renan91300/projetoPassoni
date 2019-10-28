<?php

namespace App\site\controllers;

if(!defined('URL')){
    header("location: /");
    exit();
}

class Checkout{
    public function index(){
	    if(isset($_SESSION['user'])){
	    	if(!empty($_SESSION['carrinho'])){
		    	$verEndereco = new \Site\models\Endereco();
		        $this->dados['endereco'] = $verEndereco->verEndereco("", true);

		        $carregarView = new \Config\ConfigView("checkout/index", $this->dados);
		        $carregarView->renderizar();
		    }
	        else{
				$_SESSION['msg'] = "<div id='message_div' class='alert alert-danger container'>Não ha produtos no carrinho!</div>";
				$urlDestino = URL . 'carrinho/index';
        		header("Location: $urlDestino");	
			}
	    }
	    else{
	    	$urlDestino = URL . 'carrinho/index';
        	header("Location: $urlDestino");
	    	echo '<script>
	    			$(function () {
			            document.getElementById("loginModal").style.display="block";
			        });
			    </script>';
			$carregarView = new \Config\ConfigView("checkout/index");
	        $carregarView->renderizar();
	    }
	}
	public function finalizarCompra(){
		$this->dados = filter_input_array(INPUT_POST, FILTER_DEFAULT);

		if(isset($_SESSION['user'])){
			$verEndereco = new \Site\models\Endereco();
	        $this->dados['endereco'] = $verEndereco->verEndereco("", true);

	        $this->dados['idEndereco'] = $this->dados['endereco'][0]['idEndereco'];
	        unset($this->dados['endereco'], $this->dados['paymentMethod']);

	        $addPedido = new \Site\models\Pedido($this->dados);
            $addPedido->addPedido($this->dados);

            $urlDestino = URL . 'listarPedidosCliente/index';
        	header("Location: $urlDestino");	
		


	    }
	    else{
	    	$urlDestino = URL . 'home/index';
        	header("Location: $urlDestino");
	    }
	}
}