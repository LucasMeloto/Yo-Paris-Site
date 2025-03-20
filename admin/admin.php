<?php

if (!isset($_SESSION)) {
  session_start();
}


# VERIFICAR SE EXISTE USUARIO LOGADO PARA PERMITIR O ACESSO#

if (!$_SESSION['USER']) {
  $_SESSION['naoAutorizado'] = "Apenas usuários cadastrados porem acessar esta área!";
  header('Location: index.php');
}

?>
<!doctype html>
<html lang="pt-br">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="description" content="">
  <meta name="author" content="">
  <title>Yo Paris - Painel</title>

  <!-- Bootstrap core CSS -->
  <link href="../css/bootstrap.min.css" rel="stylesheet">

  <!-- Bootstrap icons-->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
  <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Sharp:opsz,wght,FILL,GRAD@48,400,0,0" />
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Yellowtail&display=swap" rel="stylesheet">

  <!-- Custom styles for this template -->
  <link href="../css/dashboard.css" rel="stylesheet">
  <link href="../css/painel.css" rel="stylesheet">
  <link href="../css/dash.css" rel="stylesheet">
  <link href="../css/topo.css" rel="stylesheet">
</head>

<body>

  <?php
  #Início TOPO
  include('topo.php');
  #Final TOPO
  ?>

  <div class="container-fluid">
    <div class="row">
      <?php
      #Início MENU
      include('navegacao.php');
      #Final MENU
      ?>

      <main class="ml-auto col-lg-10 px-md-4">
        <?php
        #Início Dash
        include('dashboard.php');
        #Final Dash
        ?>

      </main>
    </div>
  </div>




</body>

</html>