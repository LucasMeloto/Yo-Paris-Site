<?php

require_once('../../conexao/conecta.php');


$filtro_pesquisa = isset($_POST['pesquisa']) ? mysqli_real_escape_string($conexao, $_POST['pesquisa']) : '';
$filtro_categoria = isset($_POST['categoria']) ? intval($_POST['categoria']) : '';
$filtro_status = $_POST['status'];
$preco = isset($_POST['preco']) ? $_POST['preco'] : '';

// Inicia a consulta SQL com uma condição verdadeira para facilitar a adição dos filtros
$sql = "SELECT produto.cod_produto, produto.nome_produto, produto.preco_venda, produto.qntd, produto.promocao, produto.preco_promocao, produto.status, produto.data_cadastro, produto.cod_marca, produto.cod_categoria, marca.nome_marca 'marca', categoria.nome_categoria 'categoria' 
FROM produto 
JOIN marca ON produto.cod_marca = marca.cod_marca 
JOIN categoria ON produto.cod_categoria = categoria.cod_categoria 
WHERE 1=1"; // Condição verdadeira inicial para facilitar a concatenação de filtros

$sq1 = "";

if ($preco == 1) {
    $sq1 .= " AND (preco_venda < 20 OR preco_promocao < 20)";
} elseif ($preco == 2) {
    $sq1 .= " AND (preco_venda BETWEEN 20 AND 40 OR preco_promocao BETWEEN 20 AND 40)";
} elseif ($preco == 3) {
    $sq1 .= " AND (preco_venda BETWEEN 40 AND 60 OR preco_promocao BETWEEN 40 AND 60)";
} elseif ($preco == 4) {
    $sq1 .= " AND (preco_venda BETWEEN 60 AND 80 OR preco_promocao BETWEEN 60 AND 80)";
} elseif ($preco == 5) {
    $sq1 .= " AND (preco_venda BETWEEN 80 AND 100 OR preco_promocao BETWEEN 80 AND 100)";
} elseif ($preco == 6) {
    $sq1 .= " AND (preco_venda > 100 OR preco_promocao > 100)";
}

$sql .= $sq1; 

// Adiciona o filtro de nome, se fornecido
if ($filtro_pesquisa  !== '') {

    $sql .= " AND produto.nome_produto LIKE '%$filtro_pesquisa%'";
}

// Adiciona o filtro de categoria, se fornecido
if (!empty($filtro_categoria)) {

    $sql .= " AND produto.cod_categoria = $filtro_categoria";
}

// Adiciona o filtro de status, se fornecido
if ($filtro_status != '') { // Verifica se não está vazio (diferente de 0 ou 1)
    $sql .= " AND produto.status = $filtro_status";
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
                <th>Preço</th>
                <th>Quantidade</th>
                <th>Promoção</th>
                <th>Marca</th>
                <th>Categoria</th>
                <th>Status</th>
                <th>Data Cadastro</th>
                <th>Ações</th>
            </tr>
        </thead>

        <tbody> <!--    Corpo da Tabela -->

            <?php
            foreach ($query as $produto) {

            ?>

                <tr>
                    <td> <?php echo $produto['cod_produto'] ?> </td> <!--  Dados da Tabela -->

                    <td>
                        <?php echo $produto['nome_produto'] ?>
                    </td>

                    <td> <?php if ($produto['promocao'] == 0) {
                                echo $produto['preco_venda'];
                            } else {
                                echo $produto['preco_promocao'];
                            } ?>
                    </td>
                    <td> <?php echo $produto['qntd'] ?></td>

                    <td> <?php // Muda a propriedade do Status de 0 e 1 para Ativo e Inativo
                            if ($produto['promocao'] == 1) {
                                echo '<span class="badge badge-success">Ativo</span>';
                            } else {
                                echo '<span class="badge badge-danger">Inativo</span>';
                            } ?>
                    </td>

                    <td>
                        <?php echo $produto['marca'] ?>
                    </td>

                    <td>
                        <?php echo $produto['categoria'] ?>
                    </td>

                    <td> <?php // Muda a propriedade do Status de 0 e 1 para Ativo e Inativo
                            if ($produto['status'] == 1) {
                                echo '<span class="badge badge-success">Ativo</span';
                            } else {
                                echo '<span class="badge badge-danger">Inativo</span>';
                            } ?></td>
                    <td> <?php echo date('d/m/Y', strtotime($produto['data_cadastro']))  ?></td>

                    <td>
                        <a href="editar.php?cod_produto=<?php echo $produto['cod_produto'] ?>" class="btn btn-outline-success btn-sm" title="Editar">
                            <i class="bi bi-pencil"></i>
                        </a>
                        <form action="acoes.php" method="post" class="d-inline">
                            <button type="submit" name="deletar_produto" value="<?php echo $produto['cod_produto'] ?>" class="btn btn-outline-danger btn-sm" title="Editar" onclick="return confirm('Tem certeza que deseja excluir ?')">
                            <i class="bi bi-trash"></i>
                            </button>
                        </form>
                    </td>
                </tr>

        <?php
            } //FECHANDO O FOREACH
        } //FECHANDO IF
        else {
            echo '<h5> Nenhum Funcionário encontrado! </h5>';
        }
        ?>

        </tbody>
</table>