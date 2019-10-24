<?php
namespace App\site\controllers;

if(!defined('URL')){
    header("location: /");
    exit();
}

class Carrinho{
    public function index(){
        $carregarView = new \Config\ConfigView("carrinho/index");
        $carregarView->renderizar();

    }

    public function addProdCarrinho(){
    	$this->dados = filter_input_array(INPUT_POST, FILTER_DEFAULT);      
    	//unset($_SESSION['carrinho']);
    	if(!isset($_SESSION['carrinho'])){
    		$_SESSION['carrinho'] = array();
    		array_push($_SESSION['carrinho'], $this->dados);
    	}
    	else{
    		$existe = false;
    		$len = count($_SESSION['carrinho']);
    		for($i=0; $i<$len; $i++){
    			if($this->dados['idBoloDePote'] == $_SESSION['carrinho'][$i]['idBoloDePote']){
	    			$existe = true;
	    			$_SESSION['carrinho'][$i]['idBoloDePote'] = $this->dados['idBoloDePote'];
	    			$_SESSION['carrinho'][$i]['sabor'] = $this->dados['sabor'];
	    			$_SESSION['carrinho'][$i]['preco'] = $this->dados['preco'];
	    			$_SESSION['carrinho'][$i]['qtd'] += $this->dados['qtd'];
	    			$_SESSION['carrinho'][$i]['imagem'] = $this->dados['imagem'];
	    		}
    		}
    		if(!$existe){
    			array_push($_SESSION['carrinho'], $this->dados);
    		}
    	}

    	$_SESSION['ProdAdd'] = true;

	    $urlDestino = URL . 'boloPote/index';
        header("Location: $urlDestino");

    }

    public function deletarBolo($id){
    	$this->id = $id;
		//unset($_SESSION['carrinho']);
    	$len = count($_SESSION['carrinho']);
    	$j = 0;
		for($i=0; $i<$len; $i++){
			$j++;
			if($this->id == $_SESSION['carrinho'][$i]['idBoloDePote']){
				//Verifica se o elemento a ser removido é o último do Array
				if($j == $len){
					array_splice($_SESSION['carrinho'], $i);	
				}
				else{
					array_splice($_SESSION['carrinho'], $i, (-($len)+$j));
				}
			}
		}

    	$urlDestino = URL . 'carrinho/index';
        header("Location: $urlDestino");
    }

    public function upPreco($id){
    	$this->dados = filter_input_array(INPUT_POST, FILTER_DEFAULT);      
    	$this->id = $id;
    	$len = count($_SESSION['carrinho']);
    	$j = 0;
		for($i=0; $i<$len; $i++){
			$j++;
			if($this->id == $_SESSION['carrinho'][$i]['idBoloDePote']){
				$_SESSION['carrinho'][$i]['qtd'] = $this->dados['qtd'];
			}
		}

    	$urlDestino = URL . 'carrinho/index';
        header("Location: $urlDestino");

    }
}