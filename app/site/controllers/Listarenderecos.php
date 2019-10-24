<?php

namespace App\site\controllers;

if(!defined('URL')){
    header("location: /");
    exit();
}

class ListarEnderecos{
	private $dados;

    public function index(){
    	if(isset($_SESSION['user'])){
    		$listar_enderecos = new \Site\Models\Endereco();
    		$this->dados['enderecos'] = $listar_enderecos->listar();

	        $carregarView = new \Config\ConfigView("listarEnderecos/index", $this->dados);
	        $carregarView->renderizar();
	    }
	    else{
	    	$urlDestino = URL . 'home/index';
            header("Location: $urlDestino");
	    }
    }

    public function addEndereco(){
        $this->dados = filter_input_array(INPUT_POST, FILTER_DEFAULT);

        $listar_enderecos = new \Site\Models\Endereco();
        $this->dados['enderecos'] = $listar_enderecos->listar();

        if(empty($this->dados['enderecos'])){
            $this->dados['padrao'] = 1;
        }
        else{
            $this->dados['padrao'] = 0;   
        }
        unset($this->dados['enderecos']);

        if (!empty($this->dados['btnFormAddEndereco'])) {
            unset($this->dados['btnFormAddEndereco']);
            $addEndereco = new \Site\Models\Endereco();
            $addEndereco->addEndereco($this->dados);
        }
        $urlDestino = URL . 'listarEnderecos/index';
        header("Location: $urlDestino");
    }

    

    public function editarEndereco($dadosId = null){
    	$this->dados = filter_input_array(INPUT_POST, FILTER_DEFAULT);
        $this->dadosId = $dadosId;

        if(!empty($this->dados['fomEditarEnd'])){
        	unset($this->dados['fomEditarEnd']);
    		$editarEndereco = new \Site\Models\Endereco();
    		$editarEndereco->altEndereco($this->dados);

    		$urlDestino = URL . 'listarEnderecos/index';
	        header("Location: $urlDestino");
        }
        else{
        	if(!empty($this->dadosId)){
        		$verEndereco = new \Site\Models\Endereco();
	            $this->dados['endereco'] = $verEndereco->verEndereco($this->dadosId);

	            $carregarView = new \Config\ConfigView("listarEnderecos/editarEndereco", $this->dados);
		        $carregarView->renderizar();
        	}
        	else{
        		$_SESSION['msg'] = "<div id='message_div' class='alert alert-danger'>Erro: Endereço não encontrado!</div>";
	            $urlDestino = URL . 'listarEnderecos/index';
	            header("Location: $urlDestino");
        	}
        }
    }

    public function altEnderecoPadrao($dadosId = null){
        $this->dadosId = $dadosId;

        if(isset($_SESSION['user'])){
            $verEndereco = new \Site\Models\Endereco();
            $this->dados['endereco'] = $verEndereco->verEndereco($this->dadosId);
            if($this->dados['endereco'][0]['padrao']==0){
                $this->dados['endereco'][0]['padrao'] = 1;
            }
            else{
                $this->dados['endereco'][0]['padrao'] = 0;
            }

            $editarEndereco = new \Site\Models\Endereco();
            $editarEndereco->alterarEnderecoPadrao($this->dados);            

            $urlDestino = URL . 'listarEnderecos/index';
            header("Location: $urlDestino");
        }
        else{
            $urlDestino = URL . 'home/index';
            header("Location: $urlDestino");
        }
    }

    public function apagarEndereco($id = null){
        $this->id = $id;

        $verEndereco = new \Site\Models\Endereco();
        $this->dados['endereco'] = $verEndereco->verEndereco($this->id);
        if($this->dados['endereco'][0]['padrao']==1){
            $this->padrao = true;
        }

        if (!empty($this->id)) {
            $apagarEndereco = new \Site\Models\Endereco();
            $apagarEndereco->delEndereco($this->id);

            if($apagarEndereco->getResult()){
                $listar_enderecos = new \Site\Models\Endereco();
                $this->dados['enderecos'] = $listar_enderecos->listar();

                if(!empty($this->dados['enderecos']) AND $this->padrao){
                    $this->dados['enderecos'][0]['padrao'] = 1;
                    $editarEndereco = new \Site\Models\Endereco();
                    $editarEndereco->altEndereco($this->dados['enderecos'][0]);
                }
            }
        } else {
            $_SESSION['msg'] = "<div class='alert alert-danger'>Erro: Necessário selecionar um endereco!</div>";
        }
        $urlDestino = URL . 'listarEnderecos/index';
        header("Location: $urlDestino");

    }


}