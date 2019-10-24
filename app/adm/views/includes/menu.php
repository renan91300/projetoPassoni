<!-- MENU -->

<div class="sidebar" data-color="purple" data-image="<?= URL; ?>assetsT/img/sidebar-5.jpg">
    <!--

        Tip 1: you can change the color of the sidebar using: data-color="blue | azure | green | orange | red | purple"
        Tip 2: you can also add an image using data-image tag

    -->
    <div class="sidebar-wrapper">
        <div class="logo">
            <a href="<?=URL;?>admhome">
                <img src="<?=URL;?>/assets/img/logos/passoniCutWhite.png" width="200">
            </a>
        </div>

        <ul class="nav">
            <li class="nav-item">
                <a class="nav-link" href="<?=URL;?>admhome">
                    <i class="nc-icon nc-chart-pie-35"></i>
                    <p>Dashboard</p>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="<?= URL ?>adm-user/index">
                    <i class="nc-icon nc-circle-09"></i>
                    <p>Listar Usuários</p>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="<?=URL;?>admuser/addUser">
                    <i class="nc-icon nc-simple-add"></i>
                    <p>Inserir Usuário</p>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="<?=URL;?>pedido/listarPedidos">
                    <i class="nc-icon nc-notes"></i>
                    <p>Listar Pedidos</p>
                </a>
            </li>
        </ul>
    </div>
</div>
<div class="main-panel">
        <nav class="navbar navbar-expand-lg " color-on-scroll="500">
            <div class="container-fluid">
                <a class="navbar-brand" href="#pablo"> Dashboard </a>
                <button href="" class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" aria-controls="navigation-index" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-bar burger-lines"></span>
                    <span class="navbar-toggler-bar burger-lines"></span>
                    <span class="navbar-toggler-bar burger-lines"></span>
                </button>
                <div class="collapse navbar-collapse justify-content-end" id="navigation">
                        <ul class="nav navbar-nav mr-auto">
                            <li class="nav-item">
                                <a href="#" class="nav-link">
                                    <i class="nc-icon nc-zoom-split"></i>
                                    <span class="d-lg-block">&nbsp;Pesquisar</span>
                                </a>
                            </li>
                        </ul>
                        <ul class="navbar-nav ml-auto">
                            <li class="nav-item">
                                <a class="nav-link" href="<?=URL;?>admauth/logout">
                                    <i class="nc-icon nc-button-power"></i>
                                    <span class="d-lg-block">&nbsp;Sair</span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
            </nav>

        <div class="content">
            <div class="container-fluid">
            

<!-- FIM DO MENU -->

<!--
    <nav class="col-md-2 d-none d-md-block bg-light sidebar">
    <div class="sidebar-sticky">
        <ul class="nav flex-column">
            <li class="nav-item">
                <a class="nav-link active" href="<?=URL;?>admhome">
                    <span data-feather="home"></span>
                    Dashboard <span class="sr-only">(current)</span>
                </a>
            </li>

            <li class="nav-item">
                <a class="nav-link" href="<?= URL ?>adm-user/index">
                    <span data-feather="users"></span>
                    Listar Usuários
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="<?= URL ?>adm-user/addUser">
                    <span data-feather="users"></span>
                    Inserir Usuários
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#">
                    <span data-feather="users"></span>
                    Customers
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#">
                    <span data-feather="bar-chart-2"></span>
                    Reports
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#">
                    <span data-feather="layers"></span>
                    Integrations
                </a>
            </li>
        </ul>
    </div>
</nav>
-->