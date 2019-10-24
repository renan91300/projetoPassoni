<?php
namespace App\site\controllers;

if(!defined('URL')){
    header("location: /");
    exit();
}

class Home{
	private $dados;
	
    public function index(){
    	$listar = new \Site\Models\Carousel();
    	$this->dados['carousel'] = $listar->listar();

        $carregarView = new \Config\ConfigView("home/index", $this->dados);
        $carregarView->renderizar();
    }
}