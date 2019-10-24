<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="utf-8" />
    <title>Bem vindo!</title>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="icon" href="<?= URL; ?>assets/img/icon/cake.ico" />
    <!-- Bootstrap core CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
    <link rel="stylesheet" href="<?= URL;?>assets/css/signin.css" />
</head>
<body class="text-center">
<div class="container">
    <form class="form-signin" method="post" action="">
        <img class="mb-4" src="<?=URL;?>/assets/img/logos/passoni.svg" alt="" width="150" height="70">
        <h1 class="h3 mb-3 font-weight-normal">Área Administrativa</h1>
        <?php
        if (isset($_SESSION['msg'])) {
            echo $_SESSION['msg'];
            unset($_SESSION['msg']);
        }
        if (!isset($this->dados['formRetorno'])){
            $email = "";
        }else {
            extract($this->dados['formRetorno']);
        }
        ?>
        <label for="iUser" class="sr-only">Email:</label>
        <input type="text" class="form-control mb-2" name="email" id="iUser" value="<?= $email; ?>"
               placeholder="Digite seu email" required autofocus>
        <label for="iSenha" class="sr-only">Senha:</label>
        <input type="password" class="form-control" name="senha" id="iSenha"
               placeholder="Digite sua senha" required>
        <button class="btn btn-lg btn-primary btn-block" name="sendLogin" type="submit">Logar</button>
        <p class="text-center">Esqueceu a senha?</p>
    </form>

    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
    <!-- Just to make our placeholder images work. Don't actually copy the next line! -->
    <script src="<?= URL; ?>assets/js/holder.min.js"></script>
    <script src="<?= URL; ?>assets/js/scrollreveal.min.js"></script>
    <script src="<?= URL; ?>assets/js/personalizado.js"></script>
</div>
</body>
</html>
