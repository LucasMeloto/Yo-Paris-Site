<?php

require_once('../../conexao/conecta.php');

# VERIFICANDOSE EXISTE USUARIO LOGADO PARA PERMITIR ACESSO #
include_once '../user_comum.php';
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
    <link href="../../css/bootstrap.min.css" rel="stylesheet">

    <!-- Bootstrap icons-->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Yellowtail&display=swap" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="../../css/dashboard.css" rel="stylesheet">
    <link href="../../css/painel.css" rel="stylesheet">
    <link href="../../css/topo.css" rel="stylesheet">

    <script defer src="../../script/filtropreco.js"></script>
</head>

<body>

    <?php
    #Início TOPO
    include('../topo.php');
    #Final TOPO
    ?>

    <div class="container-fluid">
        <div class="row">
            <?php
            #Início MENU
            include('../navegacao.php');
            #Final MENU
            ?>

            <main class="ml-auto col-lg-10 px-md-4">
                <div class="container mt-5">
                    <?php
                    include('../../mensagem.php');
                    ?>
                    <div class="card">
                        <div class="card-header d-flex align-items-center justify-content-between">
                            <h4>Produtos</h4>

                            <a href="inserir.php" class="btn btn-info btn-sm ">
                                <i class="bi bi-plus-lg"></i>
                                Adicionar</a>
                        </div>


                        <div class="card-body pb-0">
                            <div class="row">
                                <!-- FILTRO POR STATUS -->
                                <div class="col-2">
                                    <select name="status" id="status" class="form-control" onchange="buscar()">
                                        <option value="">Status</option>
                                        <option value="1">Ativo</option>
                                        <option value="0">Inativo</option>
                                    </select>
                                </div>

                                <!-- FILTRO POR BUSCA -->
                                <div class="col-4">

                                    <input type="search" name="pesquisa" id="pesquisa" class="form-control" placeholder="Pesquise por Produto...">
                                </div>

                                <!-- FILTRO POR BUSCA -->
                                <div class="col-2">

                                    <select name="categoria" id="categoria" class="form-control" onchange="buscar()">
                                        <option value="">Categoria</option>
                                        <?php
                                        $sql_categoria = 'SELECT DISTINCT cod_categoria , nome_categoria FROM categoria WHERE status = 1 ORDER BY nome_categoria';

                                        $query_categoria = mysqli_query($conexao, $sql_categoria);

                                        foreach ($query_categoria as $categoria) {
                                            echo '<option value="' . $categoria['cod_categoria'] . '">' . $categoria['nome_categoria'] . '</option>';
                                        }
                                        ?>
                                    </select>
                                </div>


                                <!-- FILTRO POR PREÇO -->
                                <div class="col-3"> <select name="preco" id="preco" class="form-control" onchange="buscar()">
                                        <option value="">Preço</option>
                                        <option value="1">Até R$ 20.00</option>
                                        <option value="2">R$ 20.00 a R$ 40.00</option>
                                        <option value="3">R$ 40.00 a R$ 60.00</option>
                                        <option value="4">R$ 60.00 a R$ 80.00</option>
                                        <option value="5">R$ 80.00 a R$ 100.00</option>
                                        <option value="6">Acima de R$ 100.00</option>
                                    </select>
                                </div>

                            </div>
                        </div>


                        <div class="card-body">
                            <div id="listar">

                            </div>
                        </div>
                    </div>
                </div>

            </main>
        </div>
    </div>
    <!-- FECHANDO A CONEXAO COM O BANCO -->
    <?php mysqli_close($conexao);

    ?>

    <script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>

    <script>
        $(document).ready(function() {
            listar();

            $('#pesquisa').keyup(function() {
                var pesquisa = $(this).val();

                listar('', '', '', pesquisa);
            })
        })


        // Função para listar os fornecedores
        function listar(status, categoria, preco, pesquisa) {
            $('#listar').text('Carregando...');

            $.ajax({
                url: 'tabela.php',
                method: 'POST',
                data: {
                    status,
                    categoria,
                    preco,
                    pesquisa
                },
                dataType: 'html',
                success: function(resp) {
                    $('#listar').html(resp)
                }
            })
        }

        //Função para listar funcionarios aplicando os filtros (SELECTS)

        function buscar() {
            var status = $('#status').val();
            var categoria = $('#categoria').val();
            var preco = $('#preco').val();
            var pesquisa = $('#pesquisa').val();
            console.log("Chamando listar com:", status, categoria, preco, pesquisa); // Debug

            listar(status, categoria, preco);
        }
    </script>
</body>

</html>