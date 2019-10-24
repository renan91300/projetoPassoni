<?php

namespace App\site\controllers;

if(!defined('URL')){
    header("location: /");
    exit();
}

class EditarBoloPersonalizado{
    public function index(){
        $carregarView = new \Config\ConfigView("editarBoloPersonalizado/index");
        $carregarView->renderizar();
    }
}