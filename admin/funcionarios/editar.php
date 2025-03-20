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
                    if (isset($_GET['cod_funcionario']) && $_GET['cod_funcionario'] != '') {


                        //IF para fazer o select * e receber o codigo do funcionario
                        //Nos input no value chamamos o echo com a variavel do if de rows e o nome do campo no banco
                        $codigo = $_GET['cod_funcionario'];

                        $sql = "SELECT * FROM funcionario WHERE cod_funcionario = $codigo";

                        $query = mysqli_query($conexao, $sql);

                        if (mysqli_num_rows($query) > 0) {

                            $funcionario = mysqli_fetch_assoc($query);

                    ?>


                            <div class="card">
                                <div class="card-header d-flex align-items-center justify-content-between">
                                    <h4>Atualizar Funcionario</h4>

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
                                            <div class="col-10 d-flex flex-wrap justify-content-start">
                                                <div class="col-6 pl-0">
                                                    <label for="nome">*Nome</label>
                                                    <input type="text" name="nome" id="nome" class="form-control" required maxlength="60" value="<?php echo $funcionario['nome'] ?>">
                                                </div>


                                                <div class="col-6 pl-0">
                                                    <label for="NomeS">Nome Social</label>
                                                    <input type="text" name="nomeS" id="nomeS" class="form-control" maxlength="60" value="<?php echo $funcionario['nome_social'] ?>">
                                                </div>

                                                <div class="col-2 pl-0">
                                                    <label for="status">*Status: </label>
                                                    <select name="status" id="status" class="form-control" required>
                                                        <option value="1" <?php if ($funcionario['status'] == '1') echo 'selected' ?>>Ativo</option>
                                                        <option value="0" <?php if ($funcionario['status'] == '0') echo 'selected' ?>>Inativo</option>
                                                    </select>
                                                </div>

                                                <div class="col-3 pl-0">
                                                    <label for="DataN">*Data de Nascimento:</label>
                                                    <input type="date" name="dataN" id="dataN" class="form-control" required value="<?php echo $funcionario['data_nascimento'] ?>">
                                                </div>

                                                <div class="col-7 pl-0">
                                                    <label for="foto">*Foto do Funcionario</label>
                                                    <input type="file" name="foto" id="foto" class="form-control" accept="image/*">
                                                    <!-- faz com que apenas seja mandado fotos -->
                                                </div>
                                            </div>
                                            <div class="col-2">

                                                <!-- na foto no local onde ela é mostrada é necessario fazer um if, ela vai puxar a foto que esta armazenada no banco/servidor e mostrar se não , vai mostrar a foto default -->
                                                <?php
                                                if ($funcionario['foto'] != '') {
                                                    echo '<img src="../../imagens/funcionarios/' . $funcionario['foto'] . '" class="img-fluid" alt="' . $funcionario['nome'] . '">';
                                                } else {
                                                    echo '<img src="../../admin/funcionarios/img/images.png" class="img-fluid" alt="Foto do Funcionário">';
                                                }
                                                ?>

                                            </div>
                                        </div>



                                        <div class="form-row mb-3">

                                            <div class="col-4">
                                                <label for="cpf">*CPF</label>
                                                <input type="text" name="cpf" id="cpf" class="form-control" required maxlength="14" value="<?php echo $funcionario['cpf'] ?>">
                                            </div>

                                            <div class="col-4">
                                                <label for="rg">RG</label>
                                                <input type="text" name="rg" id="rg" class="form-control" maxlength="12" value="<?php echo $funcionario['rg'] ?>">
                                            </div>

                                            <div class="col-4">
                                                <label for="sexo">*Sexo</label>
                                                <select name="sexo" id="sexo" class="form-control" required>
                                                    <option value="" selected>--Selecione--</option>
                                                    <option value="M" <?php if ($funcionario['sexo'] == 'F') echo 'selected' ?>>Masculino</option>
                                                    <option value="F" <?php if ($funcionario['sexo'] == 'M') echo 'selected' ?>>Feminino</option>
                                                    <option value="N" <?php if ($funcionario['sexo'] == 'N') echo 'selected' ?>>Não Informado</option>
                                                </select>
                                            </div>


                                            <div class="col-4">
                                                <label for="civil">*Estado Civíl: </label>
                                                <select name="civil" id="civil" class="form-control" required>
                                                    <option value="" selected>--Selecione--</option>
                                                    <option value="Solteiro" <?php if ($funcionario['estado_civil'] == 'Solteiro') echo 'selected' ?>>Solteiro</option>
                                                    <option value="Casado" <?php if ($funcionario['estado_civil'] == 'Casado') echo 'selected' ?>>Casado</option>
                                                    <option value="Divorciado" <?php if ($funcionario['estado_civil'] == 'Divorciado') echo 'selected' ?>>Divorciado</option>
                                                    <option value="Viuvo" <?php if ($funcionario['estado_civil'] == 'Viúvo') echo 'selected' ?>>Viúvo</option>
                                                </select>
                                            </div>




                                            <div class="col-4">
                                                <label for="cargo">*Cargo: </label>
                                                <select name="cargo" id="cargo" class="form-control" required>
                                                    <option value="" selected>--Selecione--</option>
                                                    <?php
                                                    $sql = 'SELECT cod_cargo , nome_cargo FROM cargo WHERE status = 1 ORDER BY nome_cargo';

                                                    $query = mysqli_query($conexao, $sql);

                                                    //   $cargo = mysqli_fetch_assoc($query); // Variavel que faz um array associativo

                                                    //     do{
                                                    //         echo '<option value="'. $cargo['codigo_cargo'] .'">'. $cargo['nome'] .'</option>';
                                                    //     } 
                                                    //     while($cargo = mysqli_fetch_assoc($query));

                                                    foreach ($query as $cargo) {
                                                    
                                                        
                                                    //necessario trazer o cod_ da tabela estrangeira e tambem da principal e imprimir o nome com base na tabela estrangeira
                                                    ?>
                                                        <option value=" <?php echo $cargo['cod_cargo'] ?>" <?php if($funcionario['cod_cargo'] == $cargo['cod_cargo']) echo 'selected' ?> ><?php echo $cargo['nome_cargo'] ?></option>
                                                    <?php
                                                    }
                                                    ?>

                                                </select>
                                            </div>

                                            <div class="col-4">
                                                <label for="salario">*Salario</label>
                                                <input type="text" name="salario" id="salario" class="form-control" required maxlength="7" value="<?php echo $funcionario['salario'] ?>">
                                            </div>
                                        </div>


                                        <div>
                                            <h4>Endereço</h4>
                                            <hr>
                                        </div>

                                        <div class="form-row mb-3 align-items-center">

                                            <div class="col-4">
                                                <label for="cep">*CEP</label>
                                                <input type="text" name="cep" id="cep" class="form-control" required " onblur=" pesquisacep(this.value);" maxlength=" 9" value="<?php echo $funcionario['cep'] ?>">
                                            </div>

                                            <div class="col-6">
                                                <label for="endereco">*Endereço</label>
                                                <input type="text" name="endereco" id="endereco" class="form-control" required maxlength="70" value="<?php echo $funcionario['endereco'] ?>">
                                            </div>

                                            <div class="col-2">
                                                <label for="numero">*Numero</label>
                                                <input type="text" name="numero" id="numero" class="form-control" required maxlength="4" value="<?php echo $funcionario['numero'] ?>">
                                            </div>


                                            <div class="col-4">
                                                <label for="complemento">Complemento</label>
                                                <input type="text" name="complemento" id="complemento" class="form-control" maxlength="40" value="<?php echo $funcionario['complemento'] ?>">
                                            </div>

                                            <div class="col-3">
                                                <label for="bairro">*Bairro</label>
                                                <input type="text" name="bairro" id="bairro" class="form-control" required maxlength="30" value="<?php echo $funcionario['bairro'] ?>">
                                            </div>

                                            <div class="col-3">
                                                <label for="cidade">*Cidade</label>
                                                <input type="text" name="cidade" id="cidade" class="form-control" required value="<?php echo $funcionario['cidade'] ?>">
                                            </div>

                                            <div class="col-2">
                                                <label for="estado">*Estado: </label>
                                                <select name="estado" id="estado" class="form-control" required>
                                                    <option value="AC" <?php if ($funcionario['estado'] == 'AC') echo 'selected' ?>>AC</option>
                                                    <option value="AL" <?php if ($funcionario['estado'] == 'AL') echo 'selected' ?>>AL</option>
                                                    <option value="AP" <?php if ($funcionario['estado'] == 'AP') echo 'selected' ?>>AP</option>
                                                    <option value="AM" <?php if ($funcionario['estado'] == 'AM') echo 'selected' ?>>AM</option>
                                                    <option value="BA" <?php if ($funcionario['estado'] == 'BA') echo 'selected' ?>>BA</option>
                                                    <option value="CE" <?php if ($funcionario['estado'] == 'CE') echo 'selected' ?>>CE</option>
                                                    <option value="DF" <?php if ($funcionario['estado'] == 'DF') echo 'selected' ?>>DF</option>
                                                    <option value="ES" <?php if ($funcionario['estado'] == 'ES') echo 'selected' ?>>ES</option>
                                                    <option value="GO" <?php if ($funcionario['estado'] == 'GO') echo 'selected' ?>>GO</option>
                                                    <option value="MA" <?php if ($funcionario['estado'] == 'MA') echo 'selected' ?>>MA</option>
                                                    <option value="MT" <?php if ($funcionario['estado'] == 'MT') echo 'selected' ?>>MT</option>
                                                    <option value="MS" <?php if ($funcionario['estado'] == 'MS') echo 'selected' ?>>MS</option>
                                                    <option value="MG" <?php if ($funcionario['estado'] == 'MG') echo 'selected' ?>>MG</option>
                                                    <option value="PA" <?php if ($funcionario['estado'] == 'PA') echo 'selected' ?>>PA</option>
                                                    <option value="PB" <?php if ($funcionario['estado'] == 'PB') echo 'selected' ?>>PB</option>
                                                    <option value="PR" <?php if ($funcionario['estado'] == 'PR') echo 'selected' ?>>PR</option>
                                                    <option value="PE" <?php if ($funcionario['estado'] == 'PE') echo 'selected' ?>>PE</option>
                                                    <option value="PI" <?php if ($funcionario['estado'] == 'PI') echo 'selected' ?>>PI</option>
                                                    <option value="RN" <?php if ($funcionario['estado'] == 'RN') echo 'selected' ?>>RN</option>
                                                    <option value="RS" <?php if ($funcionario['estado'] == 'RS') echo 'selected' ?>>RS</option>
                                                    <option value="RJ" <?php if ($funcionario['estado'] == 'RJ') echo 'selected' ?>>RJ</option>
                                                    <option value="RO" <?php if ($funcionario['estado'] == 'RO') echo 'selected' ?>>RO</option>
                                                    <option value="RR" <?php if ($funcionario['estado'] == 'RR') echo 'selected' ?>>RR</option>
                                                    <option value="SC" <?php if ($funcionario['estado'] == 'SC') echo 'selected' ?>>SC</option>
                                                    <option value="SP" <?php if ($funcionario['estado'] == 'SP') echo 'selected' ?>>SP</option>
                                                    <option value="SE" <?php if ($funcionario['estado'] == 'SE') echo 'selected' ?>>SE</option>
                                                    <option value="TO" <?php if ($funcionario['estado'] == 'TO') echo 'selected' ?>>TO</option>
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
                                                <input type="text" name="celular" id="celular" class="form-control" maxlength="14" value="<?php echo $funcionario['telefone_celular'] ?>">
                                            </div>

                                            <div class="col-4">
                                                <label for="residencial">Telefone Residencial</label>
                                                <input type="text" name="residencial" id="residencial" class="form-control" maxlength="13" value="<?php echo $funcionario['telefone_residencial'] ?>">
                                            </div>

                                            <div class="col-4">
                                                <label for="email">Email</label>
                                                <input type="email" name="email" id="email" class="form-control" maxlength="50" value="<?php echo $funcionario['email'] ?>">
                                            </div>
                                        </div>

                                        <div>
                                            <h4>Acesso</h4>
                                            <hr>
                                        </div>
                                        <div class="form-row mb-3 align-items-center">
                                            <div class="col-4">
                                                <label for="login">*Usuário</label>
                                                <input type="text" name="login" id="login" class="form-control" required maxlength="20" value="<?php echo $funcionario['login'] ?>">
                                            </div>

                                            <div class="col-4">
                                                <label for="senha">*Senha</label>
                                                <input type="password" name="senha" id="senha" class="form-control" required maxlength="8" value="<?php echo $funcionario['senha'] ?>">
                                            </div>

                                            <div class="col-4">
                                                <label for="acesso">*Tipo de acesso: </label>
                                                <select name="acesso" id="acesso" class="form-control" required>
                                                    <option value="1" <?php if ($funcionario['tipo_acesso'] == '1') echo 'selected'  ?>>Admin</option>
                                                    <option value="0" <?php if ($funcionario['tipo_acesso'] == '0')  echo 'selected' ?>>Comum</option>
                                                </select>
                                            </div>
                                        </div>

                                     <!-- necessario mudar o input para atualizar e tbm criar um input para a chave primaria da tabela no value desse input; -->
                                        <input type="hidden" name="atualizar" value="atualizar_funcionario">
                                        <input type="hidden" name="cod_funcionario" value="<?php echo $codigo ?>">
                                        <input type="submit" value="Atualizar" class="btn btn-primary">
                                    </form>
                                </div>
                            </div>

                    <?php
                        } else {
                            echo '<h5>Nenhum Funcionário encontrado com este código!</h5>';
                        }
                    } else {
                        echo '<h5>Nenhum Funcionário encontrado!</h5>';
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
    <script src="../../script/carregarfoto.js"></script>

</body>

</html>