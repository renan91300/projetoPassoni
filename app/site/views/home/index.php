<?php

if (!defined('URL')){
    header("location: /");
    exit();
}
?>


<div class="principal"></div>
<!-- CARDS -->

<div class="container-fluid bloco1">
    <img src="<?=URL;?>assets/img/bolos/bolo5.jpg" class="img1  anima_left" />
    <div class="bodyCard anima_right">
        <p class="title"><b>Faça seu bolo dos sonhos conosco!</b></p>
        <p class="subtext">Crie e personalize o formato, o sabor, a cobertura e a decoração.<br>
            Tenha um bolo único e exclusivo para sua festa!</p>
        <a class="btn btn-primary botaoMonteBolo" href="montarbolos.html">Monte seu bolo agora</a>
    </div>
</div>
<hr>
<div class="container-fluid bloco1">
    <img src="<?=URL;?>assets/img/bolos/boloo.jpg" class="img1 anima_left" />
    <div class="bodyCard anima_right">

        <p class="title"><b>Vai um bolo no potão aí?</b></p>
        <p class="subtext">O sabor dos nossos bolos sempre deixa saudade!<br>
            O potão tem a qualidade de um bolo de festa e a<br>maior praticidade possível: você pode até congelar<br> e
            comer sempre que quiser!</p>

        <a class="btn btn-primary botaoMonteBolo" href="montarbolos.html">Monte seu bolo agora</a>
    </div>

</div>
</main>