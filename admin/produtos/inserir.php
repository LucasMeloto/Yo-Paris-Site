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

    <script defer src="../../script/conta.js"></script>
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
                            <h4>Cadastrar Novo Produto</h4>

                            <a href="listar.php" class="btn btn-secondary btn-sm ">
                                <i class="bi bi-arrow-left-circle"></i>
                                Voltar</a>
                        </div>

                        <div class="card-body">
                            <form action="acoes.php" method="POST" enctype="multipart/form-data"> <!--fala para o formulario que vai ter um envio de arquivo -->
                                <div>
                                    <h4>Dados do Produto</h4>
                                    <hr>
                                </div>
                                <div class="form-row mb-3">
                                    <div class="col-10 d-flex flex-wrap justify-content-start">
                                        <div class="col-10 pl-0">
                                            <label for="nome">*Nome do Produto</label>
                                            <input type="text" name="nome" id="nome" class="form-control" required maxlength="60">
                                        </div>

                                        <div class="col-2 pl-0">
                                            <label for="status">*Status: </label>
                                            <select name="status" id="status" class="form-control" style="pointer-events:none" aria-disabled="true" readonly required>
                                                <option value="1" selected>Ativo</option>
                                                <option value="0">Inativo</option>
                                            </select>
                                        </div>

                                        <div class="col-10 pl-0">
                                            <label for="foto">*Foto do Produto</label>
                                            <input type="file" name="foto" id="foto" class="form-control" accept="image/*">
                                            <!-- faz com que apenas seja mandado fotos -->
                                        </div>
                                    </div>
                                    <div class="col-2 d-flex justify-content-center align-items-center">
                                        <input type="image" id="preview" src="../../admin/produtos/img/carregarimagem.jpg" class="img-fluid" alt="Foto do Funcionario">
                                    </div>
                                </div>



                                <div class="form-row mb-3">

                                    <div class="col-4">
                                        <label for="categoria">*Categoria: </label>
                                        <select name="categoria" id="categoria" class="form-control" required>
                                            <option value="" selected>--Selecione--</option>
                                            <?php
                                            $sql = 'SELECT cod_categoria , nome_categoria FROM categoria WHERE status = 1 ORDER BY nome_categoria';

                                            $query = mysqli_query($conexao, $sql);

                                            foreach ($query as $categoria) {
                                                echo '<option value="' . $categoria['cod_categoria'] . '">' . $categoria['nome_categoria'] . '</option>';
                                            }


                                            ?>

                                        </select>
                                    </div>

                                    <div class="col-4">
                                        <label for="marca">*Marca: </label>
                                        <select name="marca" id="marca" class="form-control" required>
                                            <option value="" selected>--Selecione--</option>
                                            <?php
                                            $sql = 'SELECT cod_marca , nome_marca FROM marca WHERE status = 1 ORDER BY nome_marca';

                                            $query = mysqli_query($conexao, $sql);

                                            foreach ($query as $marca) {
                                                echo '<option value="' . $marca['cod_marca'] . '">' . $marca['nome_marca'] . '</option>';
                                            }


                                            ?>

                                        </select>
                                    </div>

                                    <div class="col-4">
                                        <label for="fornecedor">*Fornecedor: </label>
                                        <select name="fornecedor" id="fornecedor" class="form-control" required>
                                            <option value="" selected>--Selecione--</option>
                                            <?php
                                            $sql = 'SELECT cod_fornecedor , nome FROM fornecedor WHERE status = 1 ORDER BY nome';

                                            $query = mysqli_query($conexao, $sql);

                                            foreach ($query as $fornecedor) {
                                                echo '<option value="' . $fornecedor['cod_fornecedor'] . '">' . $fornecedor['nome'] . '</option>';
                                            }


                                            ?>

                                        </select>
                                    </div>
                                </div>


                                <div>
                                    <h4>Preços</h4>
                                    <hr>
                                </div>

                                <div class="form-row mb-3 align-items-center">
                                    <!-- Realiza uma função quando o usuario interage com o campo (oninput) -->
                                    <div class="col-4">
                                        <label for="preco_custo">*Preço de Custo</label>
                                        <input type="text" name="preco_custo" id="preco_custo" class="form-control" oninput="calcularvenda()" required maxlength=" 9">
                                    </div>

                                    <div class="col-2">
                                        <label for="lucro">*Lucro</label>
                                        <input type="text" name="lucro" id="lucro" class="form-control" required oninput="calcularvenda()" maxlength=" 9">
                                    </div>

                                    <div class="col-4">
                                        <label for="preco_venda">*Preço de Venda</label>
                                        <input type="text" name="preco_venda" id="preco_venda" class="form-control" required readonly maxlength=" 9">
                                    </div>

                                    <div class="col-2">
                                        <label for="qtnd">*Quantidade</label>
                                        <input type="text" name="qtnd" id="qtnd" class="form-control" required maxlength=" 9">
                                    </div>
                                </div>


                                <div class="mt-3">
                                    <h4>Promoção</h4>
                                </div>

                                <div class="form-check">
                                    <!-- Onclick = realiza a função quando o evento click é acionado  -->
                                    <input class="form-check-input" type="radio" name="promocao" id="desativado" value="0" onclick="AtivarCampos()" checked>
                                    <label class="form-check-label" for="exampleRadios1">
                                        Desativado
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="promocao" id="ativado" value="1" onclick="AtivarCampos()">
                                    <label class="form-check-label" for="exampleRadios2">
                                        Ativado
                                    </label>
                                </div>


                                <div class="form mb-3 mt-3 d-flex flex-wrap justify-content-start">

                                    <div class="col-2 pl-0">
                                        <label for="desconto">% Desconto</label>
                                        <input type="text" name="desconto" id="desconto" class="form-control ativar_campos" required oninput="calcularpromocao()" maxlength=" 9" disabled>
                                    </div>

                                    <div class="col-4 pl-0">
                                        <label for="preco_promocao">Preço da Promoção</label>
                                        <input type="text" name="preco_promocao" id="preco_promocao" class="form-control ativar_campos" oninput="calcularpromocao()" required readonly maxlength=" 9" disabled>
                                    </div>


                                </div>
                                
                                
                                <label for="descricao">Descrição</label>
                                <textarea name="descricao" id="descricao" class="form-control mb-3"></textarea>

                                <label for="observacao">Observação</label>
                                <textarea name="observacao" id="observacao" class="form-control mb-3"></textarea>

                                

                                <!-- È uma maneira de segurança para cadastrar, quando realizou o cadastro , ai é verificado se o hidden chegou para poder ir adiante no processo -->
                                <input type="hidden" name="cadastrar" value="cadastrar_produto">
                                <input type="submit" value="Cadastrar" class="btn btn-primary">
                            </form>
                        </div>
                    </div>
                </div>
            </main>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>

    <!-- MASCARAS DO INPUTS -->
    <script src="../../script/jquery.mask.js"></script>
    <script src="../../script/carregarfoto.js"></script>

</body>

</html>