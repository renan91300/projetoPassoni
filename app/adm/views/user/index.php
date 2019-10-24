<?php

if (!defined('URL')){
    header("location: /");
    exit();
            
}?>
    <div style="margin-bottom: 10px;">
        <h1 class="h2">Listagem de usuários</h1>
        <div>
            <a href="<?=URL;?>admuser/addUser" class="btn btn-primary btn-sm mb-3">
                <i class="fa fa-fw fa-plus-circle"></i> Adicionar usuário
            </a>
        </div>
    </div>
    <?php
        if (isset($_SESSION['msg'])) {
            echo $_SESSION['msg'];
            unset($_SESSION['msg']);
        }
    ?>  
    <div class="table-responsive">
        <table id="table" class="table table-striped">
            <thead>
                <tr>
                  <th scope="col">Nome</th>
                  <th scope="col">Email</th>
                  <th scope="col">Nível</th>
                  <th scope="col">Ação</th>
                </tr>
            </thead>
            <tbody>
            <?php
                foreach ($this->dados['listUser'] as $usuarios){
                    extract($usuarios);?>
                    <tr>
                        <td><?= $nome;?></td>
                        <td><?= $email;?></td>
                        <td>
                            <?php
                                if($adm==1){
                                    echo "Administrador";
                                }
                                else{
                                    echo "Cliente";
                                }
                            ?>
                        </td>
                        <td>
                            <div class="actionsIconsClientes">
                                <a href="<?=URL;?>AdmUser/moreUser/<?=$idUsuario;?>" class="text-primary"><i class="fa fa-eye"></i></a>
                                <a href="<?=URL;?>AdmUser/upUser/<?=$idUsuario;?>" class="text-primary"><i class="fa fa-fw fa-edit"></i></a>
                                <a href="<?=URL;?>AdmUser/delUser/<?=$idUsuario;?>" class="text-danger" onClick="return confirm('Are you sure to delete this user?');"><i class="fa fa-fw fa-trash"></i></a>
                            </div>
                        </td>
                    </tr>
                      
                <?php
                    } 
                ?>
            </tbody>
        </table>
        </div>   
    </div>