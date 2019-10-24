<?php

namespace App\site\controllers;

if(!defined('URL')){
    header("location: /");
    exit();
}

class VisualizarBoloMontado{
    public function index(){
        $carregarView = new \Config\ConfigView("visualizarBoloMontado/index");
        $carregarView->renderizar();
    }
}