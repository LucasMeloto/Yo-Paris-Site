<?php 

require_once('../../conexao/conecta.php');

// Filtro 
$cidade = $_POST['cidade'];
$status = $_POST['status'];
$estado = $_POST['estado'];

 # PESQUISA / CAMPO DE BUSCA #

 $pesquisa = mysqli_real_escape_string($conexao, $_POST['pesquisa']);

 $sql = "SELECT cod_fornecedor, nome, cnpj, email, status, data_cadastro FROM fornecedor WHERE 1=1";

    // Caso receba filtro por sexo
    if ($cidade != '') {
        $sql .= " AND cidade = '$cidade'";
    }

    // Caso receba filtro por status
    if ($status != '') {
        $sql .= " AND status = $status";
    }

    if ($estado != '') {
        $sql .= " AND estado = '$estado'";
    }

    if($pesquisa != ''){
        $sql .= " AND nome LIKE '%$pesquisa%'";
    }

    

$query = mysqli_query($conexao, $sql);

?>

<table class="table table-sm mb-0 align-items-center">
                                <?php

                                if (mysqli_num_rows($query) > 0) {

                                ?>


                                    <thead> <!-- cabeçalho da tabela -->
                                        <tr> <!--Table Row -->
                                            <th>Código</th> <!-- campos que vão mostrar -->
                                            <th>Nome</th>
                                            <th>Cnpj</th>
                                            <th>Email</th>
                                            <th>Status</th>
                                            <th>Data Cadastro</th>
                                            <th>Ações</th>
                                        </tr>
                                    </thead>

                                    <tbody> <!--    Corpo da Tabela -->

                                        <?php
                                        foreach ($query as $fornecedor) {

                                        ?>

                                            <tr>
                                                <td> <?php echo $fornecedor['cod_fornecedor'] ?> </td> <!--  Dados da Tabela -->

                                                <td>
                                                    <?php echo $fornecedor['nome'] ?>
                                                </td>
                                                <td> <?php echo $fornecedor['cnpj'] ?> </td>
                                                <td> <?php echo $fornecedor['email'] ?></td>
                                                <td> <?php // Muda a propriedade do Status de 0 e 1 para Ativo e Inativo
                                                        if ($fornecedor['status'] == 1) {
                                                            echo '<span class="badge badge-success">Ativo</span';
                                                        } else {
                                                            echo '<span class="badge badge-danger">Inativo</span>';
                                                        } ?></td>
                                                <td> <?php echo date('d/m/Y', strtotime($fornecedor['data_cadastro']))  ?></td>
                                                <td>
                                                    <a href="editar.php?cod_fornecedor=<?php echo $fornecedor['cod_fornecedor'] ?>" class="btn btn-outline-success btn-sm" title="Editar">
                                                        <i class="bi bi-pencil"></i>
                                                    </a>

                                                    <form action="acoes.php" method="post" class="d-inline">
                                                        <button type="submit" name="deletar_fornecedor" value="<?php echo $fornecedor['cod_fornecedor'] ?>" class="btn btn-outline-danger btn-sm" title="Editar" onclick="return confirm('Tem certeza que deseja excluir ?')">
                                                            <i class="bi bi-trash"></i>
                                                        </button>
                                                    </form>
                                                </td>
                                            </tr>

                                    <?php
                                        } //FECHANDO O FOREACH
                                    } //FECHANDO IF
                                    else {
                                        echo '<h5> Nenhum Fornecedor encontrado! </h5>';
                                    }
                                    ?>

                                    </tbody>
                            </table>