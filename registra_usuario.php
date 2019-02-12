<?php

    require_once('db.class.php');

    $usuario = $_POST['usuario'];
    $email = $_POST['email'];
    $senha = md5($_POST['senha']);

    $objectDb = new db();
    $link = $objectDb->conecta_mysql();

    $usuario_existe = false;
    $email_existe = false;

    $sql = " select * FROM usuarios where usuario = '$usuario' ";

    if ($result_id = mysqli_query($link, $sql)) {
       $dados_usuario =  mysqli_fetch_array($result_id);

        if (isset($dados_usuario['usuario'])) {
            $usuario_existe = true;
        }

    } else {
        echo 'Erro ao tentar localizar o registro de usuário';
    }

    $sql = " select * FROM usuarios where email = '$email' ";

    if ($result_id = mysqli_query($link, $sql)) {
       $dados_usuario =  mysqli_fetch_array($result_id);
       
        if (isset($dados_usuario['email'])) {
            $email_existe = true;
        } 

    } else {
        echo 'Erro ao tentar localizar o registro de email';
    }

    if ($usuario_existe || $email_existe) {
        $retorno_get = '';

        if ($usuario_existe) {
            $retorno_get.= "erro_usuario=1&";
        }

        if ($email_existe) {
            $retorno_get.= "erro_email=1&";
        }

        header('Location: inscrevase.php?'.$retorno_get);
        die();
    }

    $sql = " insert into usuarios(usuario, email, senha) values ('$usuario', '$email', '$senha') ";

    if(mysqli_query($link, $sql)) {
        echo "<script>alert('Usuário cadastrado com Sucesso!');";
        echo "javascript:window.location='index.php';</script>";
    } else {
        echo 'Erro ao Cadastrar Usuário!';
    }

?>