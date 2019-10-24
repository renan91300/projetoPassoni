<?php

if (!defined('URL')){
    header("location: /");
    exit();
}

extract($this->dados['usuario'][0]);
?>
<div class="container">
    <div class="conteudo">
        <div>
           <h2>Modificar Cadastro</h2>
           <hr>    
        </div>
        <form method="POST" enctype="multipart/form-data" action="<?=URL;?>usuario/editarUsuario/<?=$idUsuario;?>">
            <?php
                if (isset($_SESSION['msg'])){
                    echo $_SESSION['msg'];
                    unset($_SESSION['msg']);
                }
            ?>
            <!--<img src="<?//=URL .'/assets/img/bolos/selfie.jpeg'; ?>" class="photo_client">-->
            <div class="form-row">
                <div class="form-group col-md-6">
                    <input name="imagem_antiga" type="hidden" value="<?php
                    if (isset($imagem_antiga)) {
                        echo $imagem_antiga;
                    }
                    elseif(isset($imagem)){
                        echo $imagem;
                    }
                    ?>">

                    <label><span class="text-danger">*</span> Foto (150x150)</label>
                    <input name="imagem_nova" type="file" class="filestyle" onchange="previewImagem();">
                </div>
                <div class="form-group col-md-6">
                    <?php
                    if (isset($imagem) AND !empty($imagem)) {
                        $this->imagem_antiga = URL . 'assets/img/usuario/' . $idUsuario . '/' . $imagem;
                    } elseif (isset($imagem_antiga) AND ! empty($imagem_antiga)) {
                        $this->imagem_antiga = URL . 'assets/img/usuario/' . $idUsuario . '/' . $imagem_antiga;
                    } else {
                        $this->imagem_antiga = URL . 'assets/img/usuario/preview_img.png';
                    }
                    ?>
                    <img src="<?php echo $this->imagem_antiga; ?>" alt="Imagem do Usuário" id="preview-user" class="img-thumbnail" style="width: 150px; height: 150px;">
                </div>
            </div>

            <div class="form-row">
                <div class="col-sm-4">
                    <input type="int" name="idUsuario" value="<?=$idUsuario;?>" hidden>
                    <label for="inputName">Nome</label>
                    <input type="text" class="entrada" id="inputName" name="nome" placeholder="Nome" maxlength="40" value="<?=$nome;?>">
                </div>
                <div class="col-sm-5">      
                    <label for="inputSecondName">Sobrenome</label>
                    <input type="text" class="entrada" id="inputSecondName" name="sobrenome" placeholder="Sobrenome" value="<?=$sobrenome;?>" maxlength="60">                  
                </div>
            </div>

            <div class="form-row">
                <div class="col-sm-5">
                    <label class="sub" for="inputEmail">Email</label>
                    <input type="email" class="entrada" id="inputEmail" name="email" placeholder="Email" value="<?=$email;?>" maxlength="100">
                </div>
                <div class="col-sm-4">
                    <label class="sub" for="inputTel">Telefone</label>
                    <input type="text" class="entrada" id="inputTel" name="telefone" placeholder="Telefone" value="<?=$telefone;?>">
                </div>

            </div>



            <div class="form-row"> 
                <div class="col-sm-3">
                    <label for="datepicker">Data de Nascimento</label>
                    <input id="datepicker" name="dataNascimento" type="date" placeholder="Nascimento" value="<?=$dataNascimento;?>">
                </div>  
                <div class="col-sm-6">   
                    <label class="sub" for="female">Gênero:</label><br>

                    <input type="radio" id="female" name="genero" value="f"
                    <?php if($genero == 'f') echo "checked";?>>
                    <label for="female">Feminino</label>

                    <input type="radio" id="male" name="genero" value="m"
                    <?php if($genero == 'm') echo "checked";?>>
                    <label for="male">Masculino</label>

                    <input type="radio" id="other" name="genero" value="o"
                    <?php if($genero == 'o') echo "checked";?>>
                    <label for="other">Outro</label>
                </div>
            </div>
            <br>
                <a value="Cancelar" class="btn btn-danger" href="<?=URL;?>usuario/visualizar/<?=$idUsuario;?>">
                    Cancelar
                </a>
                <button type="submit" name="formEditUser" value="Enviar" class="btn btn-success">
                    Salvar alterações
                </button>
        </div>                
        </form>
</div>
</div>