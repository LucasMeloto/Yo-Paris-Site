<?php

require_once '../../conexao/conecta.php';

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
    <link href="../../css/dash.css" rel="stylesheet">
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
                    <!-- FAZER A MENSAGEM APARECER -->

                    <?php
                    include('../../mensagem.php');
                    ?>


                    <?php
                    if (isset($_GET['cod_cargo']) && $_GET['cod_cargo'] != '') {


                        //IF para fazer o select * e receber o codigo do funcionario
                        //Nos input no value chamamos o echo com a variavel do if de rows e o nome do campo no banco
                        $codigo = $_GET['cod_cargo'];

                        $sql = "SELECT * FROM cargo WHERE cod_cargo = $codigo";

                        $query = mysqli_query($conexao, $sql);

                        if (mysqli_num_rows($query) > 0) {

                            $cargo = mysqli_fetch_assoc($query);

                    ?>

                            <div class="card">
                                <div class="card-header d-flex align-items-center justify-content-between">
                                    <h4>Editar Cargo</h4>

                                    <a href="listar.php" class="btn btn-secondary btn-sm ">
                                        <i class="bi bi-arrow-left-circle"></i>
                                        Voltar</a>
                                </div>

                                <div class="card-body">
                                    <form action="acoes.php" method="post">
                                        <div class="form-row mb-3">
                                            <div class="col-6">
                                                <label for="cargo">Cargo</label>
                                                <input type="text" name="cargo" id="cargo" class="form-control" require value="<?php echo $cargo['nome_cargo'] ?>">
                                            </div>
                                            <div class="col-6">
                                                <label for="status">Status: </label>
                                                <select name="status" id="status" class="form-control">
                                                    <option value="1" <?php if ($cargo['status'] == 1) echo 'selected' ?> >Ativo</option>
                                                    <option value="0" <?php if ($cargo['status'] == 0) echo 'selected' ?> >Inativo</option>
                                                </select>
                                            </div>
                                        </div>

                                        <label for="observacao">Observação</label>
                                        <textarea name="observacao" id="observacao" class="form-control mb-3" ><?php echo $cargo['observacao'] ?></textarea>

                                        <input type="hidden" name="atualizar" value="atualizar_cargo">
                                        <input type="hidden" name="cod_cargo" value="<?php echo $codigo ?>">
                                        <input type="submit" value="Atualizar" class="btn btn-primary">
                                    </form>
                                </div>
                            </div>
                    <?php
                        } else {
                            echo '<h5>Nenhum Cargo encontrado com este código!</h5>';
                        }
                    } else {
                        echo '<h5>Nenhum Cargo encontrado!</h5>';
                    }
                    ?>
                </div>

            </main>

        </div>
    </div>



    <!-- JS BOOTSTRAP -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>

</body>

</html>