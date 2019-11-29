<?php

namespace App\adm\controllers;

if(!defined('URL')){
    header("location: /");
    exit();
}

class Pedido{
    private $dados;
    public function listarPedidos(){
        $this->dados = filter_input_array(INPUT_POST, FILTER_DEFAULT);
        $this->registros = filter_input_array(INPUT_GET, FILTER_DEFAULT);
        $pagina = (isset($_GET['pagina']))? $_GET['pagina'] : 1; 
        if(isset($this->registros['registros'])){
            $this->registros['tamanho'] = $this->registros['registros'];
            $this->registros['inicio'] = ($this->registros['tamanho']*$pagina)-$this->registros['tamanho']; 
            //echo $this->registros['tamanho'];
            //echo $this->registros['inicio'];
            //echo $pagina;
            //exit;
            
        }
        else{
            $this->registros['tamanho'] = 5;
            $this->registros['inicio'] = ($this->registros['tamanho']*$pagina)-$this->registros['tamanho']; 
        }
        
    	if(isset($_SESSION['user']) && ($_SESSION['nivel']==1)){
    		$listar_pedido = new \Site\models\Pedido();
            $this->dados = $listar_pedido->listar($this->dados, $this->registros);

            $this->dados['registros'] = $this->registros['tamanho'];
	        $carregarView = new \Config\ConfigView("pedido/index", $this->dados);
	        $carregarView->renderizarAdm();	
    	}
    	else{
    		$urlDestino = URL . 'Admauth/auth';
            header("Location: $urlDestino");
    	}        
    }
    public function visualizar($idPedido){
            $this->idPedido = $idPedido;

            $visualizar_pedido = new \Site\models\Pedido();
            $this->dados['pedido'] = $visualizar_pedido->visualizar($this->idPedido);   
        
            $carregarView = new \Config\ConfigView("visualizarPedido/index", $this->dados);
            $carregarView->renderizarAdm();
    }

    public function editar($idPedido=null){
            $this->dados = filter_input_array(INPUT_POST, FILTER_DEFAULT);

            if(isset($_SESSION['user']) ){
                $this->idPedido = $this->dados['idPedido'];
                if(!empty($this->dados['formEditPedido'])){
                    unset($this->dados['formEditPedido']);

                    $editarPedido = new \Site\models\Pedido();
                    $editarPedido->altPedido($this->dados);

                    $urlDestino = URL . 'Pedido/visualizar/' . $this->idPedido;
                    header("Location: $urlDestino");
                }
                else{
                        $this->idPedido = $idPedido;
                        $visualizar_pedido = new \Site\models\Pedido();
                        $this->dados['pedido'] = $visualizar_pedido->visualizar($this->idPedido);

                        $carregarView = new \Config\ConfigView("editarPedido/index", $this->dados);
                        $carregarView->renderizarAdm();
                }
            }
            else{
                $urlDestino = URLADM . 'home/index';
                header("Location: $urlDestino");
            }
    }
}