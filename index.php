<?php
    require "./vendor/autoload.php";
require "./config/Config.php";

    use Config\ConfigController as Home;
    $url = new Home();
    $url->carregar();
