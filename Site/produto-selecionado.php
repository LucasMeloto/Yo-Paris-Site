<?php 

require_once '../conexao/conecta.php';

$cod_produto = isset($_GET['cod_produto']) ? $_GET['cod_produto'] : 0;

$sql = "SELECT produto.nome_produto, produto.descricao, produto.preco_venda, produto.cod_categoria, produto.promocao, produto.preco_promocao, produto.cod_marca , produto.cod_fornecedor, produto.foto , marca.nome_marca 'marca' , fornecedor.nome 'fornecedor' FROM produto 
 JOIN marca ON produto.cod_marca = marca.cod_marca
 JOIN fornecedor ON produto.cod_fornecedor = fornecedor.cod_fornecedor WHERE produto.status = 1 AND produto.cod_produto = $cod_produto"; 

$query = mysqli_query($conexao, $sql);
$produto = mysqli_fetch_assoc($query);

//Array dos Beneficios dos produtos
$beneficios = [
    1 => [ // Perfume
        "Fragrância marcante e envolvente",
        "Ideal para homens sofisticados e confiantes",
        "Perfumação duradoura e intensa"
    ],
    2 => [ // Batom
        "Hidratação intensa para os lábios",
        "Alta fixação e pigmentação",
        "Textura cremosa e confortável"
    ],
    3 => [ // Sombras
        "Cores vibrantes e intensas",
        "Fácil aplicação e longa duração",
        "Acabamento matte e cintilante"
    ],
    4 => [ // Seruns
        "Hidrata e revitaliza a pele",
        "Reduz sinais de envelhecimento",
        "Textura leve e rápida absorção"
    ],
    5 => [ // Lápis de Olho
        "Traço preciso e pigmentado",
        "À prova d'água",
        "Fácil de esfumar"
    ],
    6 => [ // Rímel
        "Volume e alongamento imediato",
        "Não borra e não escorre",
        "Efeito cílios postiços"
    ],
    7 => [ // Cremes
        "Nutrição profunda",
        "Previne o ressecamento",
        "Pele macia e sedosa"
    ],
    8 => [ // Pincéis
        "Cerdas macias e resistentes",
        "Aplicação uniforme",
        "Ideal para diferentes texturas de maquiagem"
    ],
];

?>

<!DOCTYPE html>

<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Yo Paris Produtos-Selecionado</title>

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

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css">

    <!-- CSS -->
    <link rel="stylesheet" href="style.css">

    <link rel="stylesheet" href="produto-selecionado.css">

    <link rel="stylesheet" href="produto.css">
    <!-- icon -->
    <link rel="shortcut icon" href="/imgs/favicon.ico" type="image/x-icon">

    <!-- JavaScript -->

    <script defer src="script.js"></script>

</head>

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
    </header>


    <section class="Produto-Selecionado">
        <div class="container">
            <div class="produto-imagem">
            <img src="../imagens/produtos/<?php echo $produto['foto']; ?>" alt="<?php echo $produto['nome_produto']; ?>">
            </div>

            <div class="produto-detalhes">
                <h2><?php echo $produto['nome_produto']?></h2>
                <i class="fa-regular fa-star"></i>
                <i class="fa-regular fa-star"></i>
                <i class="fa-regular fa-star"></i>
                <i class="fa-regular fa-star"></i>
                <i class="fa-regular fa-star"></i>

                <div class="categorias">
                    <a href="#">
                        <p><?php echo $produto['marca']?></p>
                    </a>
                    <a href="#">    
                    <p><?php echo $produto['fornecedor']?></p>
                    </a>
                </div>

                <div id="filtros-box">
                    <div class="filtros" data-target="#list-itens1">
                        <span class="btn-text">Beneficios</span>
                        <span class="arrow-dwn">
                            <i class="fa-solid fa-chevron-down"></i>
                        </span>
                    </div>

                    <ul id="list-itens1" class="list-itens">
                        <li class="item">

                            <span class="item-text">
                                fragrância marcante e envolvente</span>
                        </li>
                        <li class="item">

                            <span class="item-text">ideal para homens sofisticados e confiantes</span>
                        </li>
                        <li class="item">
                            <span class="item-text">perfumação duradoura e intensa.</span>
                        </li>
                    </ul>

                <div class="preco">
                    <?php if ($produto['promocao'] == 1) {?>
                        <h4>
                            R$: <?php echo str_replace('.', ',' , $produto['preco_venda']);?>
                        </h4>
                        <h3>
                        R$: <?php echo str_replace('.', ',', $produto['preco_promocao']);?>
                        </h3>
                        <?php } else { ?>
                            <h3> R$: <?php echo str_replace('.', ',' , $produto['preco_venda']);?> </h3>
                        <?php } ?>
                        <a href="#"><button class="btn-produto">Comprar</button></a>
                </div>
            </div>
        </div>
    </section>


    <section class="Descricao">
        <div class="container">
            <div class="descricao-itens">

                <h3 class="titulo-D">Descrição do Produto</h3>

                <p><?php echo $produto['descricao']?></p>
            </div>
        </div>
    </section>

    <section class="Perguntas-frequentes">
        <div class="container">
            <nav class="Perguntas">
                <a href="#">O que significa uma fragancia refrescante</a>
                <a href="#">Quais são as notas principais do Perfume</a>
                <a href="#">Em que ocasião usar o perfume</a>
                <a href="#">O Perfume Bon Voyage é adequado para todas as idades ?</a>
            </nav>
        </div>
    </section>



    <section class="Comentarios">
        <div class="container">
            <div class="titulo-comentarios">
                <h3 class="Titulo-C">Avaliações</h3>
                <i class="fa-regular fa-star"></i>
                <i class="fa-regular fa-star"></i>
                <i class="fa-regular fa-star"></i>
                <i class="fa-regular fa-star"></i>
                <i class="fa-regular fa-star"></i>
            </div>
        </div>

        <div class="comentario-area">
            <div class="container">
                <div class="comentario-box">
                    <h4>Carlos</h4>
                    <i class="fa-regular fa-star"></i>
                    <i class="fa-regular fa-star"></i>
                    <i class="fa-regular fa-star"></i>
                    <i class="fa-regular fa-star"></i>
                    <i class="fa-regular fa-star"></i>
                    <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Eos perspiciatis aut tenetur quo
                        deleniti iure voluptates incidunt illo soluta rem.</p>
                </div>

                <div class="comentario-box">
                    <h4>Anderson</h4>
                    <i class="fa-regular fa-star"></i>
                    <i class="fa-regular fa-star"></i>
                    <i class="fa-regular fa-star"></i>
                    <i class="fa-regular fa-star"></i>
                    <i class="fa-regular fa-star"></i>
                    <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Eos perspiciatis aut tenetur quo
                        deleniti iure voluptates incidunt illo soluta rem.</p>
                </div>

                <div class="comentario-box">
                    <h4>Guilherme</h4>
                    <i class="fa-regular fa-star"></i>
                    <i class="fa-regular fa-star"></i>
                    <i class="fa-regular fa-star"></i>
                    <i class="fa-regular fa-star"></i>
                    <i class="fa-regular fa-star"></i>
                    <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Eos perspiciatis aut tenetur quo
                        deleniti iure voluptates incidunt illo soluta rem.</p>
                </div>
            </div>
        </div>
    </section>

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
    <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
</body>

</html>