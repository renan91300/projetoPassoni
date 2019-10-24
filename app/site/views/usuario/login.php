<?php

if (!defined('URL')){
    header("location: /");
    exit();
}
?>

<div class="formCadLog">
    <div class="box">
        <div class="test">
        <span class="modalTit">Entrar<br></span>
        <span class="modalSub">Já possui uma conta? Entre já!<br></span>
        <?php
            

            if (!isset($this->dados['formRetorno'])){
                $email = $senha = "";
            }
            else {
                extract($this->dados['formRetorno']);
            }
        ?>

        <form name="forUserLogin" method="post" action="<?=URL;?>Usuario/login">                        
            <div class="espaco"></div>                        

            <!--<label class="sub" for="inputEmail">Email</label>-->
            <input type="email" class="entrada" id="iEmailLog" name="email" placeholder="Email" value="<?=$email;?>">
            <!--<label class="sub" for="inputPassword">Senha</label>-->
            <input type="password" class="entrada" id="iPasswordLog" name="senha" placeholder="Senha" value="">
            <br>
            <a href="#" class="mb-3">Esqueci minha senha</a>
            
            <button class="btn btn-primary col mb-3" type="submit" value="Enviar" name="formLogar">Logar</button>
            
        </form>
        <hr>
      <div class="text-center">
        <a class="small" href="<?=URL;?>usuario/esqueceuSenha">Esqueceu a senha?</a>
      </div>
      <div class="text-center">
        <a class="small" href="<?=URL;?>usuario/cadastrar">Ainda não possui uma conta? Cadastre-se!</a>
      </div>
      </div>
    </div>
    

</div>