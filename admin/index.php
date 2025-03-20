<?php

if (!isset($_SESSION)) {
  session_start();
}

?>

<!doctype html>
<html lang="pt-br">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="description" content="">
  <meta name="author" content="">
  <title>Yo Paris - Login</title>

  <!-- Bootstrap core CSS -->
  <link href="../css/bootstrap.min.css" rel="stylesheet">

  <!-- CDN Font-Awesome -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">

  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Kanit:wght@400;500;600&family=Poppins:wght@100;400;500&family=Yellowtail&display=swap" rel="stylesheet">

  <!-- Custom styles for this template -->
  <link href="../css/signin.css" rel="stylesheet">
  <link href="../css/style.css" rel="stylesheet">

</head>

<body class="text-center">
  <a href="../Projeto Figma/index.php" style="text-decoration: none">
  <div class="titulo-logo">
    <i><img src="../imagens/Icons/yoparis.png" alt="flor da logo"></i>
    <h1>Yo Paris</h1>
  </div>
  </a>
  <div class="container" id="container">
    <main class="form-signin">
      <div class="form-container sign-in">
        <form action="login.php" method="POST">
          <h2>Faça seu Login</h2>

          <div class="social-icons">
            <a href="#" class="icon"><i class="fa-brands fa-google-plus-g"></i></a>
            <a href="#" class="icon"><i class="fa-brands fa-facebook-f"></i></a>
            <a href="#" class="icon"><i class="fa-brands fa-twitter"></i></a>
            <a href="#" class="icon"><i class="fa-brands fa-linkedin-in"></i></a>
          </div>

          <input type="text" class="" name="usuario" placeholder="Usuário">

          <input type="password" class="" name="senha" placeholder="Senha">

          <button class="" type="submit">Login</button>
          <a href="#">Esqueceu a sua senha ?</a>
          <div>
            <?php
            if (isset($_SESSION['loginVazio'])) {
              echo $_SESSION['loginVazio'];
              unset($_SESSION['loginVazio']);
            }

            if (isset($_SESSION['loginErro'])) {
              echo $_SESSION['loginErro'];
              unset($_SESSION['loginErro']);
            }

            if (isset($_SESSION['naoAutorizado'])) {
              echo $_SESSION['naoAutorizado'];
              unset($_SESSION['naoAutorizado']);
            }

            if (isset($_SESSION['logOff'])) {
              echo $_SESSION['logOff'];
              unset($_SESSION['logOff']);
            }
            ?>
          </div>
          <p class="mt-2 text-muted">&copy; <?= date('Y') ?></p>
        </form>
      </div>
    </main>

    <div class="toggle-container">
      <div class="toggle">
        <div class="toggle-panel toggle-left">
          <h1>Bem vindo de Volta!</h1>
          <p>Insira seus dados pessoais para usar todos os recursos do site</p>
          <button class="hidden" id="login">Login</button>
        </div>
        <div class="toggle-panel toggle-right image-container">
          <img src="../Login Imagem/portrait-beautiful-female-model-with-natural-make-up.jpg" alt="Imagem 1">
          <img src="../Login Imagem/portrait-gorgeous-woman-applying-eyeshadow-with-make-up-brush.jpg" alt="Imagem 2">
          <img src="../Login Imagem/young-woman-eyeshadow.jpg" alt="Imagem 3">
        </div>
      </div>
    </div>
  </div>


  <script>
    document.addEventListener("DOMContentLoaded", function () {
            const images = document.querySelectorAll(".image-container img");
            let currentIndex = 0;
            let nextIndex = 1;

            function fadeToNextImage() {
                images[currentIndex].style.opacity = "0"; // Some com a imagem atual
                images[nextIndex].style.opacity = "1"; // Aparece a próxima imagem

                // Atualiza os índices para a próxima transição
                currentIndex = nextIndex;
                nextIndex = (nextIndex + 1) % images.length;
            }

            // ⏳ Pequeno atraso antes da primeira transição (100ms)
            setTimeout(() => {
                fadeToNextImage();

                // Depois, continuar trocando a cada 4 segundos
                setInterval(fadeToNextImage, 4000);
            }, 100);
        }); 
  </script>

</body>

</html>