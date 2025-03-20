<?php

//pega url do site completa
$url_completa = "http://" . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];

//divindido a url do site em partes
$url_dividida = parse_url($url_completa);

//divide o caminho separadamente removendo as barras. (é isso que a função explode faz)
$caminho_url = explode("/", $url_dividida['path']);

$url = "http://" . $_SERVER['HTTP_HOST'] . "/" . $caminho_url[1] . "/" . $caminho_url[2] . "/";



if (!isset($_SESSION)) {
  session_start();
}


?>


<header class="navbar navbar-dark sticky-top flex-md-warp p-0 shadow Barra-Topo">
  <a class="navbar-brand col-md-3 col-lg-2 px-3 Topo-a" href="<?php echo $url ?>admin/admin.php">
    <i><img src="<?php echo $url . 'imagens/Icons/yoparis.png'; ?>" alt="Icon"></i>
    <span>Yo Paris</span>
  </a>
  <div class="Titulo">
    <h4>Painel Administrativo</h4>
  </div>
  <button class="navbar-toggler position-absolute d-md-none collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#sidebarMenu" aria-controls="sidebarMenu" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>

  </button>
  <div class="navbar-nav navega">
    <div class="usuario">
      <button class="btn-sino"><i class="bi bi-bell-fill"></i></button>
      <div class="foto"><img src="<?= $url . 'imagens/funcionarios/' . $_SESSION['PHOTO']; ?>" class="img-fluid" alt="<?= $_SESSION['NAME']; ?>"></div>
      <p><?php echo $_SESSION['NAME'] ?></p>
      <a class="nav-link px-3 btn-sair" href="<?php echo $url ?>admin/logoff.php">Sair</a>
    </div>
  </div>

</header>