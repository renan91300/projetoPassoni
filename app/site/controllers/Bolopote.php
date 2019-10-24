<?php

namespace App\site\controllers;

if(!defined('URL')){
    header("location: /");
    exit();
}

class BoloPote{
	private $dados;
	
    public function index(){
    	$listar_bolosdepote = new \Site\Models\Produto();
	    $this->dados['bolos'] = $listar_bolosdepote->listar();

        $carregarView = new \Config\ConfigView("boloPote/index", $this->dados);
        $carregarView->renderizar();
    }
}