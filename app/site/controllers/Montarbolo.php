<?php

namespace App\site\controllers;

if(!defined('URL')){
    header("location: /");
    exit();
}

class MontarBolo{
    private $dados;
    public function index(){
        $carregarView = new \Config\ConfigView("montarBolo/index");
        $carregarView->renderizar();
    }
}