<?php

  require_once('db.class.php');

  $usuario = $_POST['usuario'];
  $senha = $_POST['senha'];

  $sql = " SELECT * FROM usuarios WHERE usuario = '$usuario' AND senha = '$senha' ";

  $objectDb = new db();
  $link = $objectDb->conecta_mysql();

  $result_id = mysqli_query($link, $sql);

  if ($result_id) {
      
      $dados_usuario = mysqli_fetch_array($result_id);
      
      if (isset($dados_usuario['usuario'])) {
        echo 'Usuário Existe!';
      } else {
        header('Location: index.php?erro=1');
      }

  } else {

    echo 'Erro na execução da consulta, Favor entrar em contato.';

  }

?>