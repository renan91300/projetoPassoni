<?php

namespace App\site\controllers;

if(!defined('URL')){
    header("location: /");
    exit();
}

class SobreNos{
    public function index(){
        $carregarView = new \Config\ConfigView("sobreNos/index");
        $carregarView->renderizar();
    }
}