<?php

    if (!defined('URL')){
        header("location: /");
        exit();
    }
    
    extract($this->dados['usuario'][0]);
?>
<div class="container">
    <div class="conteudo">
        <div style="text-align: center">
           <h2>Informações cadastrais</h2>
           <hr>    
        </div>
            <form method="POST" action="<?=URL;?>usuario/editarUsuario/<?=$idUsuario;?>">
                <div class="form-row">
                    <div class="col-md-4">
                        <?php
                            if (!empty($imagem)) {
                                echo "<img src='" . URL . "assets/img/usuario/" . $idUsuario . "/" . $imagem . "' witdh='150' height='150'>";
                            } else {
                                echo "<img src='" . URL . "assets/img/usuario/icone_usuario.png' witdh='150' height='150'>";
                            }
                        ?>
                    </div>
                    <div class="col-md-4">
                        <div class="form-row">
                            <div>
                                <input type="int" name="idUsuario" value="<?=$idUsuario;?>" hidden>
                                <h5>Nome</h5>
                                <p><?=$nome.' '.$sobrenome;?></p>
                            </div>
                        </div>

                        <div class="form-row">
                            <div>
                                <h5>Email</h5>
                                <p><?=$email;?></p>
                            </div>                        
                                
                        </div>

                        <div class="form-row">
                            <div>
                                <h5>Telefone</h5>
                                <p>
                                    <?php
                                        if(!empty($telefone)){
                                             echo $telefone;
                                        }
                                        else{
                                            echo "Não informado";
                                        }
                                    ?>
                                        
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-row">
                            <div>
                                <h5>Data de Nascimento</h5>
                                <p>
                                    <?php
                                        if(!empty($dataNascimento)){
                                            echo date("d/m/Y", strtotime($dataNascimento));
                                        }
                                        else{
                                            echo "Não informado";
                                        }
                                    ?>
                                        
                                </p>   
                            </div>
                        </div>
                        <div class="form-row">
                            <div>
                                <h5>Gênero</h5>
                                <p>
                                    <?php
                                        if($genero == 'm'){
                                            echo "Masculino";
                                        }
                                        elseif($genero == 'f'){
                                            echo "Feminino";
                                        }
                                        else{
                                            echo "Outro";
                                        }
                                    ?>
                                        
                                </p>
                            </div>
                        </div>
                    </div>

                    <a name="editar" value="Editar" class="btn btn-warning" href="<?=URL;?>usuario/editarUsuario/<?=$idUsuario;?>" style="margin-left: auto;">Editar</a>

                    <?php
                        if($_SESSION['nivel']==1){?>
                            <a name="listar" value="Listar" class="btn btn-success" href="<?=URL;?>listarClientes?>" style="margin-left: 0.25rem;">Listar</a>
                            <a name="apagar" value="Apagar" class="btn btn-danger" href="<?=URL;?>usuario/delUsuario/<?=$idUsuario;?>" style="margin-left: 0.25rem;">Apagar</a>

                        <?php }
                    ?>

                </div>                
            </form>
    </div>
</div>