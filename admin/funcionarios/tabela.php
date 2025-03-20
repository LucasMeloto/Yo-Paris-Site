<?php

require_once('../../conexao/conecta.php');

// Filtro 
$sexo = $_POST['sexo'];
$status = $_POST['status'];
$cargo = $_POST['cargo'];

 # PESQUISA / CAMPO DE BUSCA #

 $pesquisa = mysqli_real_escape_string($conexao, $_POST['pesquisa']);


?>


<table class="table table-sm mb-0 align-items-center">
    <?php //SELECT PARA MOSTRAR NO LISTAR OS CAMPOS SELECIONADOS
    $sql = "SELECT funcionario.cod_funcionario , funcionario.nome , funcionario.nome_social, funcionario.sexo, funcionario.login, funcionario.tipo_acesso, funcionario.cod_cargo, funcionario.data_cadastro, funcionario.status, cargo.nome_cargo 'cargo' FROM funcionario JOIN cargo ON funcionario.cod_cargo = cargo.cod_cargo WHERE 1=1";


    // Caso receba filtro por sexo
    if (!empty($sexo)) {
        $sql .= " AND funcionario.sexo = '$sexo'";
    }

    // Caso receba filtro por status
    if ($status != '') {
        $sql .= " AND funcionario.status = $status";
    }

    if ($cargo != '') {
        $sql .= " AND funcionario.cod_cargo = $cargo";
    }

    if($pesquisa != ''){
        $sql .= " AND funcionario.nome LIKE '%$pesquisa%'";
    }


    $query = mysqli_query($conexao, $sql);

    if (mysqli_num_rows($query) > 0) {

    ?>


        <thead> <!-- cabeçalho da tabela -->
            <tr> <!--Table Row -->
                <th>Código</th> <!-- campos que vão mostrar -->
                <th>Nome</th>
                <th>Sexo</th>
                <th>Usuario</th>
                <th>Cargo</th>
                <th>Tipo de Acesso</th>
                <th>Status</th>
                <th>Data Cadastro</th>
                <th>Ações</th>
            </tr>
        </thead>

        <tbody> <!--    Corpo da Tabela -->

            <?php
            foreach ($query as $funcionario) {

            ?>

                <tr>
                    <td> <?php echo $funcionario['cod_funcionario'] ?> </td> <!--  Dados da Tabela -->

                    <td>

                        <?php if ($funcionario['nome_social'] != "") {
                            echo $funcionario['nome_social'];
                        } else {
                            echo $funcionario['nome'];
                        }

                        ?>

                    </td>
                    <td> <?php echo $funcionario['sexo'] ?> </td>
                    <td> <?php echo $funcionario['login'] ?></td>
                    <td> <?php echo $funcionario['cargo'] ?>

                    </td>
                    <td>

                        <?php if ($funcionario['tipo_acesso'] == 1) {
                            echo '<span class="badge badge-pill badge-danger">Admin</span>';
                        } else {
                            echo '<span class="badge badge-pill badge-light">Comum</span>';
                        }

                        ?>
                    </td>
                    <td> <?php // Muda a propriedade do Status de 0 e 1 para Ativo e Inativo
                            if ($funcionario['status'] == 1) {
                                echo '<span class="badge badge-success">Ativo</span';
                            } else {
                                echo '<span class="badge badge-danger">Inativo</span>';
                            } ?>
                    </td>
                    <td> <?php echo date('d/m/Y', strtotime($funcionario['data_cadastro']))  ?></td>
                    <td>
                        <a href="editar.php?cod_funcionario=<?php echo $funcionario['cod_funcionario'] ?>" class="btn btn-outline-success btn-sm" title="Editar">
                            <i class="bi bi-pencil"></i>
                        </a>

                        <!-- <a href="excluir.php?cod_funcionario=" >
                            <i class="bi bi-trash"></i>
                        </a> -->

                        <form action="acoes.php" method="post" class="d-inline">
                            <button type="submit" name="deletar_funcionario" value="<?php echo $funcionario['cod_funcionario'] ?>" class="btn btn-outline-danger btn-sm" title="Editar" onclick="return confirm('Tem certeza que deseja excluir ?')">
                            <i class="bi bi-trash"></i>
                            </button>
                        </form>
                    </td>
                </tr>

        <?php
            } //FECHANDO O FOREACH
        } //FECHANDO IF
        else {
            echo '<h5> Nenhum funcionário encontrado! </h5>';
        }
        ?>

        </tbody>
</table>