<?php

    require_once('db.class.php');

    $usuario = $_POST['usuario'];
    $email = $_POST['email'];
    $senha = md5($_POST['senha']);

    $objectDb = new db();
    $link = $objectDb->conecta_mysql();

    $sql = " insert into usuarios(usuario, email, senha) values ('$usuario', '$email', '$senha') ";

    if(mysqli_query($link, $sql)) {
        echo "<script>alert('Usuário cadastrado com Sucesso!');";
        echo "javascript:window.location='index.php';</script>";
    } else {
        echo 'Erro ao Cadastrar Usuário!';
    }

?>