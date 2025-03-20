<?php

require_once('../../conexao/conecta.php');

# VERIFICANDOSE EXISTE USUARIO LOGADO PARA PERMITIR ACESSO #
include_once '../user_adm.php';

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
                            <h4>Fornecedor</h4>

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
                                        <option value="1" <?php if (isset($status) && $status == '1') echo 'selected' ?>>Ativo</option>
                                        <option value="0" <?php if (isset($status) && $status == '0') echo 'selected' ?>>Inativo</option>
                                    </select>
                                </div>

                                <!-- FILTRO POR BUSCA -->
                                <div class="col-4">
                                    <input type="search" name="pesquisa" id="pesquisa" class="form-control" placeholder="Pesquise por Fornecedor...">
                                </div>

                                <div class="col-3">
                                    <select name="estado" id="estado" class="form-control" onchange="buscar()">
                                        <option value="">Estado</option>
                                        <?php
                                        $sql_estado = 'SELECT DISTINCT estado FROM fornecedor WHERE status = 1 ORDER BY estado';

                                        $query_estado = mysqli_query($conexao, $sql_estado);

                                        foreach ($query_estado as $estado) {
                                            echo '<option value="' . $estado['estado'] . '">' . $estado['estado'] . '</option>';
                                        }
                                        ?>
                                    </select>
                                </div>

                                <div class="col-3">
                                    <select name="cidade" id="cidade" class="form-control" onchange="buscar()">
                                        <option value="">Cidade</option>
                                        <?php
                                        $sql_cidade = 'SELECT DISTINCT cidade FROM fornecedor WHERE status = 1 ORDER BY cidade';

                                        $query_cidade = mysqli_query($conexao, $sql_cidade);

                                        foreach ($query_cidade as $cidade) {
                                            echo '<option value="' . $cidade['cidade'] . '">' . $cidade['cidade'] . '</option>';
                                        }
                                        ?>
                                    </select>
                                </div>

                            </div>
                        </div>

                        <div class="card-body">
                            <div id="listar"></div>
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
        function listar(status, estado, cidade, pesquisa) {
            $('#listar').text('Carregando...');

            $.ajax({
                url: 'tabela.php',
                method: 'POST',
                data: {
                    status,
                    estado,
                    cidade,
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
            var estado = $('#estado').val();
            var cidade = $('#cidade').val();

            listar(status, estado, cidade);
        }
    </script>
</body>

</html>