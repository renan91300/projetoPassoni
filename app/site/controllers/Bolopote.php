<?php

namespace App\site\controllers;

if(!defined('URL')){
    header("location: /");
    exit();
}

class BoloPote{
    private $dados;
    
    public function index(){
    	$listar_bolosdepote = new \Site\models\Produto();
	    $this->dados['bolos'] = $listar_bolosdepote->listar();

        $carregarView = new \Config\ConfigView("boloPote/index", $this->dados);
        $carregarView->renderizar();
    }

    public function getBolos(){
        $listar_bolosdepote = new \Site\models\Produto();
        $this->dados['bolos'] = $listar_bolosdepote->listar();
        
        echo json_encode($this->dados['bolos']);
    }

}