<?php

if (!defined('URL')){
    header("location: /");
    exit();
}
?>

<div class="formCadLog">
    <div class="box">
        <div class="test">
        <span class="modalTit">Registrar-se<br></span>
        <span class="modalSub">Não se cadastrou ainda? Comece agora!<br></span>

        <?php
            if (!isset($this->dados['formRetorno'])){
                $nome = $dataNascimento = $sobrenome = $email = $senha = "";
            }else {
                extract($this->dados['formRetorno']);
            }
        ?>
        <form name="forUserCad" method="post" action="<?=URL;?>Usuario/cadastrar">
            <div class="form-group row">
                <div class="col-sm-5">
                    <input type="text" class="entrada" id="iNomeReg" name="nome" value="<?= $nome; ?>" placeholder="Nome" maxlength="40">
                </div>
                <div class="col-sm-7">
                    <input type="text" class="entrada" id="iSobreNomeReg" name="sobrenome" value="<?= $sobrenome; ?>" placeholder="Sobrenome" maxlength="60">
                </div>
            </div>
            <div class="form-group">                
                <!--<label class="sub" for="inputEmail">Email</label>-->
                <input type="email" class="entrada" id="iEmailReg" name="email" 
                value="<?= $email; ?>"placeholder="Email" maxlength="100">
            </div>
            <div class="form-group row">
                <div class="col-sm-6">
                    <input type="password" class="entrada" id="iPasswordReg" name="senha" 
                value=""placeholder="Senha">
                </div>
                <div class="col-sm-6">
                    <input type="password" class="entrada" id="iPasswordRegRepeat" name="senhaRepeat" 
                value=""placeholder="Repetir Senha">
                </div>
            </div>
            <div class="form-group">
                <label for="datepicker">Data de Nascimento</label>
                <input id="datepicker" name="dataNascimento" class="col-sm-5" type="date" placeholder="Nascimento" value="<?=$dataNascimento;?>">
            </div>
            <button class="btn btn-primary col mb-3" type="submit" value="Enviar" name="formAddUser">Registrar-se</button>
        </form>
        <hr>
        <div class="text-center">
            <a class="small" href="<?=URL;?>usuario/login">Já possui uma conta? Logar!</a>
        </div>
        </div>
    </div>
    

</div>