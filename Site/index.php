<?php


require_once '../conexao/conecta.php';


$sql = "SELECT produto.cod_produto, produto.nome_produto , produto.preco_venda , produto.foto, produto.promocao, produto.preco_promocao FROM Produto WHERE produto.status =1 LIMIT 7";

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





</head>

<body>

    <!-- Inicio do cabeçalho -->

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

                        <a href="../admin/index.php" class="login"><i class="fa-solid fa-user-large"></i></a>
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



                <form action="buscar.php" method="get" class="campoform">
                    <div id="Busca">
                        <input type="text" id="Busca-Produto" name="pesquisa" class="pesquisa" placeholder="O que está buscando hoje ?" />
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
                    <img class="d-block w-100" src="imgs/Carrossel/Batom 2.jpg  " alt="Primeiro Slide">
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

    <!-- Lançamentos -->

    <section>
        <div id="cCarousel">
            <div class="container">
                <div class="arrow" id="c-prev"><i class="fa-solid fa-chevron-left"></i></div>
                <div class="arrow" id="c-next"><i class="fa-solid fa-chevron-right"></i></div>

                <?php

                if (mysqli_num_rows($query) > 0) {

                ?>

                    <div id="ccarousel-vp">

                        <div id="cCarousel-inner">
                            <?php
                            foreach ($query as $produto) {

                            ?>

                                <article class="cCarousel-item">
                                    <form action="produto-selecionado.php?cod_produto=<?php echo $produto['cod_produto'] ?>" method="get">
                                        <div class="produto-itens">

                                            <a href="produto-selecionado.php?cod_produto=<?php echo $produto['cod_produto'] ?>">
                                                <?php if ($produto['promocao'] == '1')
                                                    echo '<span class="badge badge-success text-uppercase">Promocão</span>';
                                                ?>
                                                <?php if ($produto['foto'] != '') {
                                                    echo '<img src="../imagens/produtos/' . $produto['foto'] . '" class="img-fluid" alt="' . $produto['nome_produto'] . '">';
                                                } else {
                                                    echo '<img src="../imagens/produtos/carregarimagem.jpg" class="img-fluid" alt="Foto do Produto">';
                                                }
                                                ?>
                                            </a>
                                            <h6><?php echo mb_strimwidth($produto['nome_produto'], 0, 20, "..."); ?></h6>
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
                                    </form>
                                </article> <?php
                                        } //FECHANDO O FOREACH

                                    } //FECHANDO IF
                                    else {
                                        echo '<h5> Nenhum produto encontrado! </h5>';
                                    }
                                            ?>
                        </div>
                    </div>
            </div>
        </div>
    </section>


    <!-- Sobre Nós -->

    <section id="sobre">
        <div class="container">

            <div class="sobre-box">
                <div class="titulo-sobre">
                    <h3>Sobre Nós</h3>
                    <p>Transformamos a beleza em arte. Nossos produtos são desenvolvidos para todas as pessoas,
                        realçando a singularidade e a confiança em cada um.</p>
                </div>

                <div id="carrossel-sobre" class="carousel carrossel-sobre carousel-fade" data-ride="carousel">
                    <ol class="carousel-indicators">
                        <li data-target="#carrossel-sobre" data-slide-to="0" class="active"></li>
                        <li data-target="#carrossel-sobre" data-slide-to="1"></li>
                        <li data-target="#carrossel-sobre" data-slide-to="2"></li>
                    </ol>
                    <div class="carousel-inner carousel-sobre">
                        <div class="carousel-item active">
                            <img class="d-block w-100" src="imgs/Carrossel/Moças1.jpg" alt="Primeiro Slide">
                        </div>
                        <div class="carousel-item">
                            <img class="d-block w-100" src="imgs/Carrossel/Moças2.jpg" alt="Segundo Slide">
                        </div>
                        <div class="carousel-item">
                            <img class="d-block w-100" src="imgs/Carrossel/Fabrica.jpg" alt="Terceiro Slide">
                        </div>

                    </div>
                    <a class="carousel-control-prev" href="#carrossel-sobre" role="button" data-slide="prev">
                        <span class="carousel-control-prev-icon text-dark" aria-hidden="true"></span>
                        <span class="sr-only">Anterior</span>
                    </a>
                    <a class="carousel-control-next" href="#carrossel-sobre" role="button" data-slide="next">
                        <span class="carousel-control-next-icon text-dark" aria-hidden="true"></span>
                        <span class="sr-only">Próximo</span>
                    </a>
                </div>
            </div>
        </div>
    </section>

    <!-- Nosso Jeito de dazer produtos -->

    <section id="jeito-fazer">
        <div class="container">

            <div class="titulo-jeito">
                <h3>Nosso jeito de fazer produtos</h3>
            </div>

            <div class="fazer-box">
                <div class="fazeritens">
                    <i class="fa-brands fa-envira"></i>
                    <p class="tooltiptext">Ingredientes Naturais</p>
                </div>

                <div class="fazeritens">
                    <i class="fa-solid fa-shield-dog"></i>
                    <p class="tooltiptext">Sem Testes em Animais</p>
                </div>

                <div class="fazeritens">
                    <i class="fa-solid fa-cloud"></i>
                    <p class="tooltiptext">Cuidado com o Clima</p>
                </div>

                <div class="fazeritens">
                    <i class="fa-solid fa-recycle"></i>
                    <p class="tooltiptext">Embalagem Eco-lógica</p>
                </div>
            </div>
        </div>
    </section>


    <section id="contato">
        <div class="container">

            <div class="card-textos">
                <h3>Contato</h3>
                <p>Revendedora</p>
            </div>


            <div class="cards">

                <!-- Abas -->
                <div class="equipe-card">

                    <img src="imgs/Contato/Ellipse 11.png" alt="Amelia Desenvolvedora FullStack">
                    <h4>Maria Souza</h4>

                    <p>Revendedora</p>

                    <ul>
                        <li><a href="#" class="sociais gradientsocial"><i class="fa-brands fa-facebook-f"></i></a>
                        </li>
                        <li><a href="#" class="sociais gradientsocial"><i class="fa-brands fa-x-twitter"></i></a>
                        </li>
                        <li><a href="#" class="sociais gradientsocial"><i class="fa-brands fa-instagram"></i></a>
                        </li>
                        <li><a href="#" class="sociais gradientsocial"><i class="fa-brands fa-whatsapp"></i></a>
                        </li>
                    </ul>

                </div>

                <div class="equipe-card">

                    <img src="imgs/Contato/Ellipse 12.png" alt="George Social Midia">
                    <h4>Clara Lima</h4>

                    <p>Revendedora</p>

                    <ul>
                        <li><a href="#" class="sociais gradientsocial"><i class="fa-brands fa-facebook-f"></i></a>
                        </li>
                        <li><a href="#" class="sociais gradientsocial"><i class="fa-brands fa-x-twitter"></i></a>
                        </li>
                        <li><a href="#" class="sociais gradientsocial"><i class="fa-brands fa-instagram"></i></a>
                        </li>
                        <li><a href="#" class="sociais gradientsocial"><i class="fa-brands fa-whatsapp"></i></a>
                        </li>

                    </ul>
                </div>

                <div class="equipe-card">

                    <img src="imgs/Contato/Ellipse 13.png" alt="Mark Designer UI/UX">
                    <h4>Fernanda Silva</h4>

                    <p>Revendedora</p>

                    <ul>
                        <li><a href="#" class="sociais gradientsocial"><i class="fa-brands fa-facebook-f"></i></a>
                        </li>
                        <li><a href="#" class="sociais gradientsocial"><i class="fa-brands fa-x-twitter"></i></a>
                        </li>
                        <li><a href="#" class="sociais gradientsocial"><i class="fa-brands fa-instagram"></i></a>
                        </li>
                        <li><a href="#" class="sociais gradientsocial"><i class="fa-brands fa-whatsapp"></i></a>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="titulo-contato">
                <h3>Locais de Venda</h3>
            </div>

            <div class="mapa">
                <iframe
                    src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3679.9923818932098!2d-47.64816212381169!3d-22.728524531526197!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x94c631a09ac7b2e1%3A0x197834b105f878e3!2sSenac%20Piracicaba!5e0!3m2!1spt-BR!2sbr!4v1728603681107!5m2!1spt-BR!2sbr"" allowfullscreen="" loading="
                    lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
            </div>
        </div>
    </section>


    <section id="revendendora">
        <div class="container">
            <div class="revendedora-conteudo">
                <h3>Quer se tornar uma Revendedora?
                </h3>
                <p>Faça parte do nosso time de sucesso! Torne-se uma revendedora e leve a beleza e a confiança dos
                    nossos produtos de maquiagem para todas as mulheres. Junte-se a nós e transforme vidas com sua
                    paixão pela beleza!</p>
                <a href="#" class="btn">Saiba Mais</a>
            </div>

            <div class="img-reven">
                <img src="imgs/Contato/Moçasorridente.jpg" alt="Moça Sorridente">
            </div>
        </div>
    </section>

    <!-- Rodapé -->

    <footer id="rodape">

        <div class="titulo-rodape">
            <a href="index.html" class="Logo-rodape">
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

    <!-- JavaScript -->

    <script src="Carrosel.js"></script>
    <script src="script.js"></script>


</body>

</html>