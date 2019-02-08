<?php

    require_once('db.class.php');

    $usuario = $_POST['usuario'];
    $email = $_POST['email'];
    $senha = $_POST['senha'];

    $objectDb = new db();
    $link = $objectDb->conecta_mysql();

    $sql = " insert into usuarios(usuario, email, senha) values ('$usuario', '$email', '$senha') ";

    if(mysqli_query($link, $sql)) {
       echo 'Usuário Cadastrado com Sucesso!'; 
    } else {
        echo 'Erro ao Cadastrar Usuário!';
    }

?>