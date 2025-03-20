<?php

require_once '../conexao/conecta.php';

$pesquisa = isset($_GET['pesquisa']) ? $_GET['pesquisa'] : '';


$pesquisa = mysqli_real_escape_string($conexao, $pesquisa);

$sql = "SELECT produto.cod_produto, produto.nome_produto, produto.preco_venda, produto.foto , produto.promocao, produto.preco_promocao
        FROM Produto 
        LEFT JOIN Categoria ON produto.cod_categoria = Categoria.cod_categoria
        WHERE produto.status = 1 AND Produto.nome_produto LIKE '%$pesquisa%'";

$query = mysqli_query($conexao, $sql);


?>


<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Yo Paris</title>

    <meta name="author" content="Lucas Meloto">

    <!-- FontAwesome CDN -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css"
        integrity="sha512-Kc323vGBEqzTmouAECnVceyQqyqdsSiqLQISBL29aUW4U/M7pSPA/gEUZQqv1cwx4OnYxTxve5UMg5GT6L4JJg=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />


    <!-- Google Fonts -->

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Kanit:wght@400;500;600&family=Poppins:wght@100;400;500&family=Yellowtail&display=swap"
        rel="stylesheet">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-..." crossorigin="anonymous">


    <!-- CSS -->
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="produto.css">

    <!-- icon -->
    <link rel="shortcut icon" href="/imgs/favicon.ico" type="image/x-icon">

    <script defer src="script.js"></script>


<body>

    <header id="topo">
        <nav class="cabecalho">
            <div class="container">
                <!-- Menu mobile -->

                <div id="logotipo" class="d-flex justify-content-between">
                    <div class="d-lg-none">
                        <button class="hamburger">
                            <i class="fa-solid fa-bars"></i>
                        </button>
                    </div>
                    <div>
                        <a href="index.php" class="Logo">
                            <i><img src="imgs/yoparis.png" alt="Icon"></i>
                            <span>Yo Paris</span>
                        </a>
                    </div>
                    <div>
                        <a href="#" class="carrinho"><i class="fa-solid fa-cart-shopping"></i></a>

                        <a href="#" class="login"><i class="fa-solid fa-user-large"></i></a>
                    </div>
                </div>



                <nav class="nav-burg">

                    <ul class="nav-list">
                        <li>
                            <p>
                                <a href="produtos.php?categoria=batom">
                                    <i><img src="imgs/Icones/batom.png" alt="batom"></i>Baton
                                </a>
                            </p>
                        </li>
                        <li>
                            <p>
                                <a href="produtos.php?categoria=perfume">
                                    <i><img src="imgs/Icones/perfume.png" alt=""></i>Perfume
                                </a>
                            </p>
                        </li>
                        <li>
                            <p>
                                <a href="produtos.php?categoria=sombra">
                                    <i><img src="imgs/Icones/paleta-de-sombras-com-pincel.png" alt=""></i> Sombra
                                </a>
                            </p>
                        </li>
                        <li>
                            <p>
                                <a href="produtos.php?categoria=Sérum">
                                    <i><img src="imgs/Icones/serum (2).png" alt=""></i>Sérum
                                </a>
                            </p>
                        </li>
                        <li>
                            <p>
                                <a href="produtos.php?categoria=lapis">
                                    <i><img src="imgs/Icones/lapis-de-olho (1).png" alt=""></i>Lapis
                                </a>
                            </p>
                        </li>
                        <li>
                            <p>
                                <a href="produtos.php?categoria=rimel">

                                    <i><img src="imgs/Icones/maquilhagem-de-rimel-para-os-olhos.png" alt=""></i>Rimel
                                </a>
                            </p>
                        </li>
                        <li>
                            <p><a href="produtos.php?categoria=creme">
                                    <i><img src="imgs/Icones/creme (1).png" alt=""></i>Creme
                                </a></p>
                        </li>
                        <li>
                            <p>
                                <a href="produtos.php?categoria=pincel">
                                    <i><img src="imgs/Icones/pinceis-de-maquiagem-para-blush-e-batom.png"
                                            alt=""></i>Pincel
                                </a>
                            </p>
                        </li>
                    </ul>

                </nav>



                <form action="" method="get" class="campoform">
                    <div id="Busca">
                        <input type="text" id="Busca-Produtos" name="pesquisa" class="pesquisa" placeholder="O que está buscando hoje ?" />
                        <button class="lupa"><i class="fa-solid fa-magnifying-glass"></i></button>
                </form>
            </div>
        </nav>

        <!-- carrossel -->

        <div id="carouselExampleIndicators" class="carousel slide carousel-fade" data-ride="carousel">
            <ol class="carousel-indicators">
                <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
                <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
                <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
            </ol>
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <img class="d-block w-100" src="imgs/Carrossel/Batom 2.jpg" alt="Primeiro Slide">
                </div>
                <div class="carousel-item">
                    <img class="d-block w-100" src="imgs/Carrossel/Creme.png" alt="Segundo Slide">
                </div>
                <div class="carousel-item">
                    <img class="d-block w-100" src="imgs/Carrossel/PerfumeFloral 2.jpg" alt="Terceiro Slide">
                </div>
                <div class="carousel-item">
                    <img class="d-block w-100" src="imgs/Carrossel/Perfumederosas.jpg" alt="Quarto Slide">
                </div>
                <div class="carousel-item">
                    <img class="d-block w-100" src="imgs/Carrossel/Maquiagem.jpg" alt="Quinto Slide">
                </div>

            </div>
            <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
                <span class="carousel-control-prev-icon text-dark" aria-hidden="true"></span>
                <span class="sr-only">Anterior</span>
            </a>
            <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                <span class="carousel-control-next-icon text-dark" aria-hidden="true"></span>
                <span class="sr-only">Próximo</span>
            </a>
        </div>
    </header>

    <section class="Conteudo">
        <div class="container">
            <div class="titulo">
                <h1><?php echo ucfirst($pesquisa); ?></h1>
            </div>
            <div class="conteudo-principal d-flex flex-wrap justify-content-center">
                <div class="produto-box">
                    <?php
                    $produtos = mysqli_fetch_all($query, MYSQLI_ASSOC); // Converte o resultado em um array associativo
                    if (!empty($produtos)) {
                        foreach ($produtos as $produto) { ?>
                            <div class="produto-itens">
                                <?php if ($produto['promocao'] == '1')
                                    echo '<span class="badge badge-success text-uppercase">Promocão</span>';
                                ?>

                                <a href="produto-selecionado.php?cod_produto=<?php echo $produto['cod_produto'] ?>">
                                    <div class="produto-imagem">
                                        <?php if ($produto['foto'] != '') {
                                            echo '<img src="../imagens/produtos/' . $produto['foto'] . '" class="img-fluid" alt="' . $produto['nome_produto'] . '">';
                                        } else {
                                            echo '<img src="../imagens/produtos/carregarimagem.jpg" class="img-fluid" alt="Foto do Produto">';
                                        } ?>
                                    </div>
                                </a>
                                <p><?php echo mb_strimwidth($produto['nome_produto'], 0, 20, "..."); ?></p>
                                <div class="preco">
                                    <?php if ($produto['promocao'] == 1) { ?>
                                        <p style="text-decoration: line-through; color: red;">
                                            R$: <?php echo str_replace('.', ',', $produto['preco_venda']); ?>
                                        </p>
                                        <p><strong>Promoção:</strong> R$: <?php echo str_replace('.', ',', $produto['preco_promocao']); ?></p>
                                    <?php } else { ?>
                                        <p>R$: <?php echo str_replace('.', ',', $produto['preco_venda']); ?></p>
                                        <p style="visibility: hidden;">R$ 0,00</p> <!-- Linha oculta para manter o espaço -->
                                    <?php } ?>
                                    <a href="produto-selecionado.php?cod_produto=<?php echo $produto['cod_produto']; ?>" class="btn-produto">Comprar</a>
                                </div>


                            </div>

                    <?php }
                    } else {
                        echo '<h5>Nenhum produto encontrado para esta categoria!</h5>';
                    }
                    ?>
                </div>
            </div>
        </div>
    </section>


    <!-- paginação  -->

    <!-- Rodapé -->

    <footer id="rodape">

        <div class="titulo-rodape">
            <a href="index.php" class="Logo-rodape">
                <i><img src="imgs/yoparis.png" alt="Icon"></i>
                <span>Yo Paris</span>
            </a>
        </div>
        <div class="container">


            <div class="rodape-sobre">
                <h4>A Yo Paris</h4>
                <nav>
                    <li><a href="#">Iniciativas</a></li>
                    <li><a href="#">Trabelhe Conosco</a></li>
                    <li><a href="#">Ajuda</a></li>
                    <li><a href="#">Consultoras Yo Paris</a></li>
                </nav>
            </div>

            <div class="rodape-contato">
                <h4>Entre em Contato</h4>

                <p><i class="fa-solid fa-phone"></i>
                    (19) 2105-0199</p>

                <p><i class="fa-solid fa-envelope"></i>
                    contato@yoparis.com.br</p>

                <p><i class="fa-solid fa-location-dot"></i>
                    Rua Santa Cruz, 1148 - Alto</p>
                <p><i class="fa-solid fa-clock"></i>
                    Seg. à Sex. das 8H às 17H</p>
            </div>

            <div class="suporte-rodape">
                <h4>Suporte</h4>

                <nav>
                    <ul>
                        <li><a href="#">Politicas de Compra</a></li>
                        <li><a href="#">Privacidade</a></li>
                        <li><a href="#">Trocas e Devoluçoes</a></li>
                    </ul>
                </nav>

            </div>

            <div class="pagamento">
                <h4>Meios de Pagamento</h4>

                <div class="metodos">
                    <img src="imgs/Pagamentos/visa.png" alt="Bandeira de Cartão Visa">
                    <img src="imgs/Pagamentos/mastercard.png" alt="Bandeira de Cartão Visa">
                    <img src="imgs/Pagamentos/american-express.png" alt="Bandeira de Cartão Visa">
                    <img src="imgs/Pagamentos/diners-club.png" alt="Bandeira de Cartão Visa">
                    <img src="imgs/Pagamentos/boleto.png" alt="Bandeira de Cartão Visa">
                    <img src="imgs/Pagamentos/Pix.png" alt="Bandeira de Cartão Visa">
                </div>
            </div>
        </div>
        <div class="sociais-rodape">
            <nav>
                <ul>
                    <li><a href="#" class=""><i class="fa-brands fa-facebook-f"></i></a>
                    </li>
                    <li><a href="#" class=""><i class="fa-brands fa-x-twitter"></i></a>
                    </li>
                    <li><a href="#" class=""><i class="fa-brands fa-instagram"></i></a>
                    </li>
                    <li><a href="#" class=""><i class="fa-brands fa-linkedin-in"></i></a>
                    </li>
                </ul>
            </nav>
        </div>

        <div class="copydev">
            <p>&copy; Copyright 2024 - Yo Paris - Todos os direitos reservados</p>
            <p>Desenvolvido por <span class="gradientsocial">Lucas Meloto</span></p>
        </div>

    </footer>


    <!-- bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
        integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo"
        crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"
        integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49"
        crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"
        integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy"
        crossorigin="anonymous"></script>
</body>

</html>

</html>