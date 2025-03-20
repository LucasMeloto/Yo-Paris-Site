<?php 

  //pega url do site completa
 $url_completa = "http://" . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];
 
 //divindido a url do site em partes
 $url_dividida = parse_url($url_completa);

  //divide o caminho separadamente removendo as barras. (é isso que a função explode faz)
 $caminho_url = explode("/", $url_dividida['path']);

 $url = "http://" . $_SERVER['HTTP_HOST'] . "/" . $caminho_url[1] . "/" . $caminho_url[2] . "/" ;




?>
<nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block bg-light sidebar collapse">
  <div class="position-sticky pt-3">
    <h6 class="sidebar-heading d-flex justify-content-between align-items-center px-3 mt-4 mb-1 text-muted">
    </h6>
    
    <ul class="nav flex-column menunav">
      <li class="nav-item">
        <a class="nav-link" href="<?php echo $url ?>admin/admin.php">
          <i class="bi bi-house-door-fill"></i>
          <span>Início</span>
        </a>
      </li>

      <li class="nav-item">
        <a class="nav-link" href="<?php echo $url ?>admin/cargos/listar.php">
          <i class="bi bi-people-fill"></i>
          <span>Cargos</span>
        </a>
      </li>

      <li class="nav-item">
        <a class="nav-link" href="<?php echo $url ?>admin/funcionarios/listar.php">
          <i class="bi bi-people-fill"></i>
          <span>Funcionários</span>
        </a>
      </li>
      
      <li class="nav-item">
        <a class="nav-link" href="<?php echo $url ?>admin/categorias/listar.php">
          <i class="bi bi-stack"></i>
          <span>Categorias</span>
        </a>
      </li>

      <li class="nav-item">
        <a class="nav-link" href="<?php echo $url ?>admin/marcas/listar.php">
          <i class="bi bi-bag-fill"></i>
          <span>Marcas</span>
        </a>
      </li>
      
      <li class="nav-item">
        <a class="nav-link" href="<?php echo $url ?>admin/produtos/listar.php">
          <i class="bi bi-archive-fill"></i>
          <span>Produtos</span>
        </a>
      </li>

      <li class="nav-item"> 
        <a class="nav-link" href="<?php echo $url ?>admin/fornecedores/listar.php">
          <i class="bi bi-building-fill"></i>
          <span>Fornecedores</span>
        </a>
      </li>

    </ul>
  </div>
</nav>