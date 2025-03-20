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
                    <div class="card">
                        <div class="card-header d-flex align-items-center justify-content-between">
                            <h4>Funcionario</h4>

                            <a href="inserir.php" class="btn btn-info btn-sm ">
                                <i class="bi bi-plus-lg"></i>
                                Adicionar</a>
                        </div>

                        <div class="card-body">
                            <div class="row">
                                <!-- FILTRO POR SEXO  -->
                                <div class="col-3">                                   <!--  (quando tiver mudanças 'onchange') -->
                                    <select name="sexo" id="sexo" class="form-control" onchange="buscar()" >
                                        <option value="">Sexo</option>
                                        <option value="F">Feminino</option>
                                        <option value="M">Masculino</option>
                                        <option value="N">Não Informado</option>
                                    </select>
                                </div>

                                <!-- FILTRO POR STATUS -->
                                <div class="col-2">
                                    <select name="status" id="status" class="form-control" onchange="buscar()">
                                        <option value="">Status</option>
                                        <option value="1">Ativo</option>
                                        <option value="0">Inativo</option>
                                    </select>
                                </div>

                                <!-- FILTRO POR Cargo -->
                                <div class="col-3">
                                    <select name="cargo" id="cargo" class="form-control" onchange="buscar()">
                                        <option value="">Cargo</option>
                                        <?php
                                        $sql = 'SELECT cod_cargo , nome_cargo FROM cargo WHERE status = 1 ORDER BY nome_cargo';

                                        $query = mysqli_query($conexao, $sql);

                                        foreach ($query as $cargo) {
                                            echo '<option value="' . $cargo['cod_cargo'] . '">' . $cargo['nome_cargo'] . '</option>';
                                        }


                                        ?>
                                    </select>
                                </div>

                                <!-- FILTRO POR BUSCA -->
                                <div class="col-4">
                                    <input type="search" name="pesquisa" id="pesquisa" class="form-control" placeholder="Pesuise por nome...">
                                </div>
                            </div>
                        </div>

                        <div class="card-body pt-0">
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

    <!-- jquery CDN  -->
    <script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>

    <!-- FILTROS -->
    <script>
        $(document).ready(function() {
            listar();

            $('#pesquisa').keyup(function(){
                var pesquisa = $(this).val();

                listar('','','',pesquisa);
            })
        })


        //Função para listar funcionarios
        function listar(sexo, status, cargo, pesquisa) {
            $('#listar').text('Carregando...');

            $.ajax({
                url: 'tabela.php',
                method: 'POST',
                data: {
                    sexo,
                    status,
                    cargo,
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
            var sexo = $('#sexo').val();
            var status = $('#status').val();
            var cargo = $('#cargo').val();

            listar(sexo, status, cargo);

        }
    </script>
</body>

</html>