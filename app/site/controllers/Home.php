<?php
namespace App\site\controllers;

if(!defined('URL')){
    header("location: /");
    exit();
}

class Home{
	private $dados;
	
    public function index(){
    	
        $carregarView = new \Config\ConfigView("home/index", $this->dados);
        $carregarView->renderizar();
    }
}
