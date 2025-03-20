<?php

require_once '../../conexao/conecta.php';

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
    <link href="../../css/dash.css" rel="stylesheet">
    <link href="../../css/topo.css" rel="stylesheet">

    <script src="../../script/viacep.js"></script>


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
                    <?php
                    if (isset($_GET['cod_fornecedor']) && $_GET['cod_fornecedor'] != '') {


                        //IF para fazer o select * e receber o codigo do fornecedor
                        //Nos input no value chamamos o echo com a variavel do if de rows e o nome do campo no banco
                        $codigo = $_GET['cod_fornecedor'];

                        $sql = "SELECT * FROM fornecedor WHERE cod_fornecedor = $codigo";

                        $query = mysqli_query($conexao, $sql);

                        if (mysqli_num_rows($query) > 0) {

                            $fornecedor = mysqli_fetch_assoc($query);

                    ?>

                            <div class="card">
                                <div class="card-header d-flex align-items-center justify-content-between">
                                    <h4>Atualizando Fornecedor</h4>

                                    <a href="listar.php" class="btn btn-secondary btn-sm ">
                                        <i class="bi bi-arrow-left-circle"></i>
                                        Voltar</a>
                                </div>

                                <div class="card-body">
                                    <form action="acoes.php" method="POST" enctype="multipart/form-data"> <!--fala para o formulario que vai ter um envio de arquivo -->
                                        <div>
                                            <h4>Dados Pessoais</h4>
                                            <hr>
                                        </div>
                                        <div class="form-row mb-3">
                                            <div class="col-12 d-flex flex-wrap justify-content-start">
                                                <div class="col-6 pl-0">
                                                    <label for="cargo">*Nome</label>
                                                    <input type="text" name="nome" id="nome" class="form-control" required maxlength="60" value="<?php echo $fornecedor['nome'] ?>">
                                                </div>

                                                <div class="col-4 pl-0">
                                                    <label for="cnpj">*CNPJ</label>
                                                    <input type="text" name="cnpj" id="cnpj" class="form-control" required maxlength="14" value="<?php echo $fornecedor['cnpj'] ?>">
                                                </div>

                                                <div class="col-2 pl-0">
                                                    <label for="status">*Status: </label>
                                                    <select name="status" id="status" class="form-control" required>
                                                        <option value="1" <?php if ($fornecedor['status']  == 1) echo 'selected' ?>>Ativo</option>
                                                        <option value="0" <?php if ($fornecedor['status']  == 0) echo 'selected' ?>>Inativo</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>


                                        <div>
                                            <h4>Endereço</h4>
                                            <hr>
                                        </div>

                                        <div class="form-row mb-3 align-items-center">

                                            <div class="col-4">
                                                <label for="cep">*CEP</label>
                                                <input type="text" name="cep" id="cep" class="form-control" required " onblur=" pesquisacep(this.value);" maxlength=" 9" value="<?php echo $fornecedor['cep'] ?>">
                                            </div>

                                            <div class="col-6">
                                                <label for="endereco">*Endereço</label>
                                                <input type="text" name="endereco" id="endereco" class="form-control" required maxlength="70" value="<?php echo $fornecedor['endereco'] ?>">
                                            </div>

                                            <div class="col-2">
                                                <label for="numero">*Numero</label>
                                                <input type="text" name="numero" id="numero" class="form-control" required maxlength="4" value="<?php echo $fornecedor['numero'] ?>">
                                            </div>


                                            <div class="col-4">
                                                <label for="complemento">Complemento</label>
                                                <input type="text" name="complemento" id="complemento" class="form-control" maxlength="40" value="<?php echo $fornecedor['complemento'] ?>">
                                            </div>

                                            <div class="col-3">
                                                <label for="bairro">*Bairro</label>
                                                <input type="text" name="bairro" id="bairro" class="form-control" required maxlength="30" value="<?php echo $fornecedor['bairro'] ?>" >
                                            </div>

                                            <div class="col-3">
                                                <label for="cidade">*Cidade</label>
                                                <input type="text" name="cidade" id="cidade" class="form-control" required value="<?php echo $fornecedor['cidade'] ?>">
                                            </div>

                                            <div class="col-2">
                                                <label for="estado">*Estado: </label>
                                                <select name="estado" id="estado" class="form-control" required>
                                                    <option value="AC" <?php if ($fornecedor['estado'] == 'AC') echo 'selected' ?>>AC</option>
                                                    <option value="AL" <?php if ($fornecedor['estado'] == 'AL') echo 'selected' ?>>AL</option>
                                                    <option value="AP" <?php if ($fornecedor['estado'] == 'AP') echo 'selected' ?>>AP</option>
                                                    <option value="AM" <?php if ($fornecedor['estado'] == 'AM') echo 'selected' ?>>AM</option>
                                                    <option value="BA" <?php if ($fornecedor['estado'] == 'BA') echo 'selected' ?>>BA</option>
                                                    <option value="CE" <?php if ($fornecedor['estado'] == 'CE') echo 'selected' ?>>CE</option>
                                                    <option value="DF" <?php if ($fornecedor['estado'] == 'DF') echo 'selected' ?>>DF</option>
                                                    <option value="ES" <?php if ($fornecedor['estado'] == 'ES') echo 'selected' ?>>ES</option>
                                                    <option value="GO" <?php if ($fornecedor['estado'] == 'GO') echo 'selected' ?>>GO</option>
                                                    <option value="MA" <?php if ($fornecedor['estado'] == 'MA') echo 'selected' ?>>MA</option>
                                                    <option value="MT" <?php if ($fornecedor['estado'] == 'MT') echo 'selected' ?>>MT</option>
                                                    <option value="MS" <?php if ($fornecedor['estado'] == 'MS') echo 'selected' ?>>MS</option>
                                                    <option value="MG" <?php if ($fornecedor['estado'] == 'MG') echo 'selected' ?>>MG</option>
                                                    <option value="PA" <?php if ($fornecedor['estado'] == 'PA') echo 'selected' ?>>PA</option>
                                                    <option value="PB" <?php if ($fornecedor['estado'] == 'PB') echo 'selected' ?>>PB</option>
                                                    <option value="PR" <?php if ($fornecedor['estado'] == 'PR') echo 'selected' ?>>PR</option>
                                                    <option value="PE" <?php if ($fornecedor['estado'] == 'PE') echo 'selected' ?>>PE</option>
                                                    <option value="PI" <?php if ($fornecedor['estado'] == 'PI') echo 'selected' ?>>PI</option>
                                                    <option value="RN" <?php if ($fornecedor['estado'] == 'RN') echo 'selected' ?>>RN</option>
                                                    <option value="RS" <?php if ($fornecedor['estado'] == 'RS') echo 'selected' ?>>RS</option>
                                                    <option value="RJ" <?php if ($fornecedor['estado'] == 'RJ') echo 'selected' ?>>RJ</option>
                                                    <option value="RO" <?php if ($fornecedor['estado'] == 'RO') echo 'selected' ?>>RO</option>
                                                    <option value="RR" <?php if ($fornecedor['estado'] == 'RR') echo 'selected' ?>>RR</option>
                                                    <option value="SC" <?php if ($fornecedor['estado'] == 'SC') echo 'selected' ?>>SC</option>
                                                    <option value="SP" <?php if ($fornecedor['estado'] == 'SP') echo 'selected' ?>>SP</option>
                                                    <option value="SE" <?php if ($fornecedor['estado'] == 'SE') echo 'selected' ?>>SE</option>
                                                    <option value="TO" <?php if ($fornecedor['estado'] == 'TO') echo 'selected' ?>>TO</option>
                                                </select>
                                            </div>
                                        </div>

                                        <div>
                                            <h4>Contatos</h4>
                                            <hr>
                                        </div>

                                        <div class="form-row mb-3 align-items-center">
                                            <div class="col-4">
                                                <label for="celular">Telefone Celular</label>
                                                <input type="text" name="celular" id="celular" class="form-control" maxlength="14" value="<?php echo $fornecedor['telefone_celular'] ?>">
                                            </div>

                                            <div class="col-4">
                                                <label for="residencial">Telefone Residencial</label>
                                                <input type="text" name="residencial" id="residencial" class="form-control" maxlength="13" value="<?php echo $fornecedor['telefone_residencial'] ?>">
                                            </div>

                                            <div class="col-4">
                                                <label for="email">Email</label>
                                                <input type="email" name="email" id="email" class="form-control" maxlength="50" value="<?php echo $fornecedor['email'] ?>" >
                                            </div>
                                        </div>

                                        <input type="hidden" name="atualizar" value="atualizar_fornecedor">
                                        <input type="hidden" name="cod_fornecedor" value="<?php echo $codigo ?>">
                                        <input type="submit" value="Atualizar" class="btn btn-primary">
                                    </form>
                                </div>
                            </div>

                    <?php
                        } else {
                            echo '<h5>Nenhum Fornecedor encontrado com este código!</h5>';
                        }
                    } else {
                        echo '<h5>Nenhum Fornecedor encontrado!</h5>';
                    }
                    ?>
                </div>
            </main>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>

    <!-- MASCARAS DO INPUTS -->
    <script src="../../script/jquery.mask.js"></script>
    <script src="../../script/mask.js"></script>


</body>