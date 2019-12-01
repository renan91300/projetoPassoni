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
        //var_dump($this->dados['bolos']);
        //exit;

        echo json_encode(
            array(
                "idBoloDePote" => $this->dados['bolos'][0]['idBoloDePote'], 
                "sabor" => $this->dados['bolos'][0]['sabor'], 
                )
        );
        
        
        $carregarView = new \Config\ConfigView("boloPote/index", $this->dados);
        $carregarView->renderizar();
    }
}