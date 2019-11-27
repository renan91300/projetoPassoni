<header>
    <nav class="navbar fixed-top navbar-expand-lg navbar-light"
    style="background-color: white; z-index:1;">
    <a class="navbar-brand" href="<?=URL;?>home"><img src="<?=URL;?>/assets/img/logos/passoniCut.png"
        width="150"></a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarMenu"
        aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse justify-content-between" id="navbarMenu">
        <ul class="navbar-nav">
        <?php
            $url = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
        ?>
            <li class="nav-item "><a class="nav-link" href="<?=URL;?>home"
                <?php
                    if($url == URL."home" || $url == URL){
                        echo "style='color: #FF6347;'";
                    }
                ?>
            >Início
            </a></li>
            <li class="nav-item"><a class="nav-link" href="<?=URL;?>montarBolo"
            <?php
                if($url == URL."montarBolo"){
                    echo "style='color: #FF6347;'";
                }
            ?>
            >Monte seu bolo</a></li>
            <li class="nav-item"><a class="nav-link" href="<?=URL;?>boloPote"
            <?php
                if($url == URL."boloPote"){
                    echo "style='color: #FF6347;'";
                }
            ?>
            >Bolo de pote</a></li>
            <li class="nav-item"><a class="nav-link" href="<?=URL;?>sobreNos"
            <?php
                if($url == URL."sobreNos"){
                    echo "style='color: #FF6347;'";
                }
            ?>
            >Sobre Nós</a></li>
        </ul>   
            <!--CLIENTE -->
            <div class="nav-item ml-auto" id="spBtnLogado" style="display: 
            <?php 
                if(isset($_SESSION['user'])){
                    echo 'block';
                }
                else{
                  echo 'none';  
                } 
            ?>">
                <a class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><?=$_SESSION['user'];?>                                      
                </a>
                <?php
                if(($_SESSION['nivel'] == 0)){?>
                    <div class="dropdown-menu dropdown-menu-right">
                        <a class="dropdown-item" href="<?=URL;?>carrinho">Carrinho</a>
                        <a class="dropdown-item" href="<?=URL;?>usuario/visualizar">Meus Dados</a>
                        <a class="dropdown-item" href="<?=URL;?>listarPedidosCliente">Meus Pedidos</a>
                        <a class="dropdown-item" href="<?=URL;?>listarEnderecos">Endereço</a>
                        <a class="dropdown-item" href="<?=URL;?>usuario/logout">Sair</a>
                    </div>
                <?php }
                else{?>
                    <div class="dropdown-menu dropdown-menu-right">
                        <a class="dropdown-item" href="<?=URL;?>listarClientes">Listar Usuários</a>
                        <a class="dropdown-item" href="<?=URL;?>listarPedidosAdmin">Listar Pedidos</a>
                        <a class="dropdown-item" href="<?=URL;?>usuario/logout">Sair</a>
                    </div>
                <?php }?>
                
            </div>

            <span class="navbar-text" id="spBtnLogin" style="display: 
            <?php 
                if(isset($_SESSION['user'])){
                    echo 'none';
                }
                else{
                  echo 'block';  
                } 
            ?>">
                <div id="navbarText">
                    <ul class="navbar-nav mr-auto">
                        <li class="nav-item"><a class="nav-link" id="btnLogin" href="<?=URL;?>usuario/login"><i class="fas fa-sign-in-alt"></i> Entrar</a></li>
                        <li class="nav-item"><a class="nav-link" id="btnLogin" href="<?=URL;?>usuario/cadastrar"><i class="fas fa-user-edit"></i> Cadastrar-se</a></li>
                    </ul>
                </div>
            </span> 
        </div>
    </nav>
</header>
<div style="margin-bottom: 70px;"></div>

<?php 
    if (isset($_SESSION['msg'])){
        echo $_SESSION['msg'];
        unset($_SESSION['msg']);
    }

?>