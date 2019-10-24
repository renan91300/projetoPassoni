<?php

namespace App\adm\controllers;

if (!defined('URL')){
    header("location: /");
    exit();
}

class AdmHome {
    private $dados;

    public function index() {
    	if(isset($_SESSION['user']) && ($_SESSION['nivel']==1)){
	        $carregarView = new \Config\ConfigView("home/index", $this->dados);
	        $carregarView->renderizarAdm();
	    }
        else{
            $urlDestino = URL . 'home/index';
            header("Location: $urlDestino");
        }
    }

}
