<?php


require_once("../../conexao/conecta.php");

# VERIFICANDOSE EXISTE USUARIO LOGADO PARA PERMITIR ACESSO #
include_once '../user_comum.php';

#Filtros dos cargos #

if (isset($_GET['status']) && $_GET['status'] != '') {

    $status = $_GET['status'];

    $sql = "SELECT * FROM cargo WHERE status = $status";
} else if (isset($_GET['pesquisa']) && $_GET['pesquisa'] != '') {

    $pesquisa = $_GET['pesquisa'];

    $sql = "SELECT * FROM cargo WHERE nome_cargo LIKE '%$pesquisa%'";
} else {

    $sql = "SELECT * FROM cargo";
}

$query = mysqli_query($conexao, $sql);




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
                            <h4>Cargos</h4>

                            <a href="inserir.php" class="btn btn-info btn-sm ">
                                <i class="bi bi-plus-lg"></i>
                                Adicionar</a>
                        </div>

                        <div class="card-body pb-0">
                            <div class="row">
                                <!-- FILTRO POR STATUS -->
                                <div class="col-2">
                                    <form action="" method="get"> <!-- Adicionando o form para envio dos parâmetros -->
                                        <select name="status" id="status" class="form-control" onchange="form.submit()">
                                            <option value="">Status</option>
                                            <option value="1" <?php if (isset($status) && $status == '1') echo 'selected' ?>>Ativo</option>
                                            <option value="0" <?php if (isset($status) && $status == '0') echo 'selected' ?>>Inativo</option>
                                        </select>
                                    </form>
                                </div>

                                <!-- FILTRO POR BUSCA -->
                                <div class="col-4">
                                    <form action="" method="get"> <!-- Adicionando o form para envio dos parâmetros -->
                                        <input type="search" name="pesquisa" id="pesquisa" class="form-control" placeholder="Pesquise por Cargo...">
                                    </form>
                                </div>

                            </div>
                        </div>

                        <div class="card-body">
                            <table class="table table-sm mb-0">
                                <?php if (mysqli_num_rows($query) > 0) { ?>
                                    <thead> <!-- cabeçalho da tabela -->
                                        <tr> <!--Table Row -->
                                            <th>Código</th> <!-- campos que vão mostrar -->
                                            <th>Cargo</th>
                                            <th>Observação</th>
                                            <th>Status</th>
                                            <th>Data Cadastro</th>
                                            <th>Ações</th>
                                        </tr>
                                    </thead>

                                    <tbody>
                                        <?php



                                        //Faz a Contagem de linhas do banco se ela for maior que zero tras as informações


                                        foreach ($query as $cargo) {

                                        ?>
                                            <!--    Corpo da Tabela -->
                                            <tr>
                                                <td><?= $cargo['cod_cargo'] ?></td> <!--  Dados da Tabela -->
                                                <td><?= $cargo['nome_cargo'] ?></td>
                                                <td><?= $cargo['observacao'] ?></td>

                                                <td>
                                                    <?php // Muda a propriedade do Status de 0 e 1 para Ativo e Inativo
                                                    if ($cargo['status'] == 1) {
                                                        echo '<span class="badge badge-success">Ativo</span';
                                                    } else {
                                                        echo '<span class="badge badge-danger">Inativo</span>';
                                                    } ?>


                                                </td>

                                                <td>
                                                    <?php //converte a data do banco para a data normal

                                                    echo date('d/m/Y', strtotime($cargo['data_cadastro']))
                                                    ?>
                                                </td>
                                                <td>
                                                    <a href="editar.php?cod_cargo=<?= $cargo['cod_cargo'] ?>" class="btn btn-outline-success btn-sm" title="Editar">
                                                        <i class="bi bi-pencil"></i>
                                                    </a>
                                                    <?php if($_SESSION['TYPE'] == '1') { ?>
                                                    <form action="acoes.php" method="post" class="d-inline">
                                                        <button type="submit" name="deletar_cargo" value="<?php echo $cargo['cod_cargo'] ?>" class="btn btn-outline-danger btn-sm" title="Editar" onclick="return confirm('Tem certeza que deseja excluir ?')">
                                                            <i class="bi bi-trash"></i>
                                                        </button>
                                                    </form>
                                                    <?php }?>
                                                </td>
                                            </tr>



                                    <?php }
                                    } else {
                                        echo "<h5>Nenhum registro encontrado!</h5>";
                                    }

                                    ?>

                                    </tbody>
                            </table>
                        </div>
                    </div>
                </div>

            </main>
        </div>
    </div>
    <!-- Fechar a conexão do banco -->
    <?php mysqli_close($conexao); ?>

</body>

</html>