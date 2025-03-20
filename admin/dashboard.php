<?php

require_once('../conexao/conecta.php');

//Contagem de funcionarios
$sql_funcionario = "SELECT COUNT(venda.cod_funcionario) AS qntd , funcionario.nome FROM venda JOIN funcionario ON venda.cod_funcionario = funcionario.cod_funcionario WHERE funcionario.status = 1 GROUP BY funcionario.nome ORDER BY qntd DESC 
LIMIT 1";
$query_funcionario = mysqli_query($conexao, $sql_funcionario);
$funcionarios = mysqli_fetch_assoc($query_funcionario);

//Contagem de clientes
$sql_cliente = "SELECT COUNT(venda.cod_cliente) AS qntd , cliente.nome FROM venda JOIN cliente ON venda.cod_cliente = cliente.cod_cliente WHERE cliente.status = 1 GROUP BY cliente.nome ORDER BY qntd DESC 
LIMIT 1";
$query_cliente = mysqli_query($conexao, $sql_cliente);
$clientes = mysqli_fetch_assoc($query_cliente);

//Contagem de vendas
$sql_vendashj = "SELECT COUNT(*) AS total_vendas FROM venda WHERE DATE(data_venda) = CURDATE()";
$query_vendahj = mysqli_query($conexao, $sql_vendashj);
$vendashj = mysqli_fetch_assoc($query_vendahj)['total_vendas'];


//Produto mais vendido
$sql_produto = "SELECT produto.nome_produto, SUM(itens_venda.qtde) AS quantidade FROM itens_venda JOIN produto ON itens_venda.cod_produto = produto.cod_produto
GROUP BY itens_venda.cod_produto
ORDER BY SUM(itens_venda.qtde) DESC
LIMIT 1;";
$query_produto = mysqli_query($conexao, $sql_produto);
$produto = mysqli_fetch_assoc($query_produto);

// Produto com menos estoque
$sql_produto_estoque = "SELECT produto.nome_produto, produto.qntd 
FROM produto 
ORDER BY produto.qntd ASC 
LIMIT 1;";

$query_produto_estoque = mysqli_query($conexao, $sql_produto_estoque);
$produto_estoque = mysqli_fetch_assoc($query_produto_estoque);

//Ultimas vendas
$sql_vendasRT = "SELECT venda.cod_venda ,venda.data_venda, venda.venda_total , funcionario.nome , funcionario.nome_social FROM venda JOIN funcionario ON venda.cod_funcionario = funcionario.cod_funcionario ORDER BY venda.data_venda DESC
LIMIT 5;";
$query_vendasRT = mysqli_query($conexao, $sql_vendasRT);

?>

<main class="dashboard">
    <div class="dash-container">
        <div class="dash-header">Dashboard</div>
        <div class="dash-content">
            <div class="dash-box users">

                <h3>Top vendedor: <?php echo $funcionarios['nome']?></h3>
                <h5>Nº de vendas: <?php echo $funcionarios['qntd']?></h5>
            </div>
            <div class="dash-box pages">
                    <h3>Top cliente: <?php echo $clientes['nome']?></h3>
                 <h5>Nº de compras:<?php echo $clientes['qntd']?></h5>
                
               
            </div>
            <div class="dash-box posts">

                <h3>Vendas Realizadas Hoje</h3>
                <h5>Nº de vendas:<?php echo $vendashj ?></h5>
                
            </div>
            <div class="dash-box visitors">     
                <h3>Produto Mais Vendido</h3>  
                <h5><?php echo $produto['nome_produto'] . " (" . $produto['quantidade'] . " vendidos)"; ?></h5>
            </div>
        </div>
    </div>

    <div class="table-container">
        <div class="table-header">Ultimas Vendas</div>
        <table>
            <thead>
                <tr>
                    <th>Nº da Venda</th>
                    <th>Funcionario</th>
                    <th>Data Realizada</th>
                    <th>Valor Total</th>
                </tr>
            </thead>
            <tbody>
                <?php while ($vendasRT = mysqli_fetch_assoc($query_vendasRT)) { ?>
                    <tr>
                        <td><?php echo $vendasRT['cod_venda']; ?></td>
                        <td>
                            <?php
                            if ($vendasRT['nome_social'] != "") {
                                echo $vendasRT['nome_social'];
                            } else {
                                echo $vendasRT['nome'];
                            }
                            ?>
                        </td>
                        <td><?php echo date('d/m/Y', strtotime($vendasRT['data_venda'])); ?></td>
                        <td><?php echo 'R$ ' . number_format($vendasRT['venda_total'], 2, ',', '.'); ?></td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>
</main>