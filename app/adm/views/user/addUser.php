<?php
if (!defined('URL')) {
    header("Location: /");
    exit();
}?>
    <div style="text-align: center;">
        <h1 class="h2">Cadastrar Usuário</h1>
    </div>
    <?php
        if(isset($this->dados['retorno'])){
            var_dump($this->dados['retorno']);
            extract($this->dados['retorno']);
        }
        else{
           $adm = $nome = $sobrenome = $dataNascimento = $email = $genero = $telefone = "";
        }
    ?>
    <div class="list-group-item">
        <?php
            if (isset($_SESSION['msg'])) {
                echo $_SESSION['msg'];
                unset($_SESSION['msg']);
            }

        ?>

        <form method="POST" action="<?=URL;?>Admuser/addUser" enctype="multipart/form-data"> 
            <div class="form-row">
                <div class="form-group col-md-6">
                    <label>Foto (150x150)</label>
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
                <div class="form-group col-md-6">
                    <label for="inputName"><span class="text-danger">*</span> Nome</label>
                    <input type="text"  id="inputName" name="nome" placeholder="Nome" maxlength="40" value="<?=$nome;?>">
                </div>
                <div class="form-group col-md-6">
                    <label for="inputSecondName"><span class="text-danger">*</span> Sobrenome</label>
                    <input type="text"  id="inputSecondName" name="sobrenome" placeholder="Sobrenome" value="<?=$sobrenome;?>" maxlength="60">
                </div>
            </div>
            <div class="form-row">
                <div class="form-group col-md-5">
                    <label for="inputEmail"><span class="text-danger">*</span> E-mail</label>
                    <input type="email"  id="inputEmail" name="email" placeholder="Email" value="<?=$email;?>" maxlength="100">
                </div>
                <div class="col-sm-4">
                    <label class="sub" for="nivel"><span class="text-danger">*</span> Nível de Acesso</label>
                    <select name="adm" id="nivel" class="">
                        <?php
                            if(empty($adm)){
                                echo
                                "<option value='' select>Selecione</option>
                                <option value='1'>Administrador</option>
                                <option value='0'>Cliente</option>";
                            }
                            elseif($adm==1){
                                echo 
                                "<option value=''>Selecione</option>
                                <option value='1'select>Administrador</option>
                                <option value='0'>Cliente</option>";
                            }
                            elseif($adm==0){
                                echo 
                                "<option value='>Selecione</option>
                                <option value='1'>Administrador</option>
                                <option value='0' select>Cliente</option>";
                            }
                        ?>
                    </select>
                </div>
                <div class="form-group col-md-3">
                    <label class="sub" for="inputSenha"><span class="text-danger">*</span> Senha</label>
                    <input type="password" id="inputSenha" name="senha" placeholder="Senha">
                </div>
            </div>
            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="inputTel"><span class="text-danger">*</span> Telefone</label>
                    <input type="text"  id="inputTel" name="telefone" placeholder="Telefone" value="<?=$telefone;?>">
                </div>
                <div class="form-group col-md-6">
                    <label for="datepicker"><span class="text-danger">*</span> Data de Nascimento</label>
                    <input id="datepicker" name="dataNascimento" type="date" placeholder="Nascimento" value="<?=$dataNascimento;?>">
                </div>
            </div>

            <div class="form-row">
                <div class="col-sm-12"  style="margin-bottom: 20px;">   
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

            <div class="form-row">
                <a value="Cancelar" class="btn btn-danger" href="<?=URL;?>Admuser/index">
                Cancelar
                </a>
                <button type="submit" name="formAddUser" value="Enviar" class="btn btn-success">
                    Cadastrar
                </button>    
            </div>       
        </form>
    </div>
</div>
