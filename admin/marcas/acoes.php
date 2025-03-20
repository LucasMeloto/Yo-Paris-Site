<?php

// Conexao do banco 
require_once '../../conexao/conecta.php';

// Inicia uma sessão 
if (!isset($_SESSION)) //A esclamação é dizendo se nao tem uma conexão
{
    session_start();
}

// CADASTRANDO UM NOVO marca
if (isset($_POST['cadastrar']) && $_POST['cadastrar'] == 'cadastrar_marca') {

    $marca = $_POST['marca'];
    $observacao = mysqli_real_escape_string($conexao, $_POST['observacao']); //faz a santização do dado , dados que o banco não aceita / filtra

    $sql = "INSERT INTO marca VALUES (0,'$marca','$observacao',1,NOW())";

    if (mysqli_query($conexao, $sql)) {

        //header('Location: listar.php'); (esse é quando a situação esta certa)
        $_SESSION['mensagem'] = "Marca cadastrado com sucesso!";
        header('Location: inserir.php');
    } else {
        //die("Erro: " . $sql . "<br>" . mysqli_error($conexao)); //Falar qual foi o erro da conexão (Mostrar error)
        $_SESSION['mensagem'] = "Erro ao cadastrar!";
        header('Location: inserir.php');
    }
}

// UPDATE
if (isset($_POST['atualizar']) && $_POST['atualizar'] == 'atualizar_marca') {

    $codigo = $_POST['cod_marca'];
    $marca = $_POST['marca'];
    $status = $_POST['status'];
    $observacao = mysqli_real_escape_string($conexao, $_POST['observacao']); //faz a santização do dado , dados que o banco não aceita / filtra

    $sql = "UPDATE marca SET nome_marca ='$marca', observacao = '$observacao',status = $status";

    $sql .= " WHERE cod_marca = $codigo";

    if (mysqli_query($conexao, $sql)) {

        //header('Location: listar.php'); (esse é quando a situação esta certa)
        $_SESSION['mensagem'] = "Marca cadastrado com sucesso!";
        header('Location: listar.php');
    } else {
        //die("Erro: " . $sql . "<br>" . mysqli_error($conexao)); //Falar qual foi o erro da conexão (Mostrar error)
        $_SESSION['mensagem'] = "Erro ao cadastrar!";
        header('Location: inserir.php');
    }
}

if (isset($_POST['deletar_marca'])) {

    $codigo = $_POST['deletar_marca'];

    $sql_compara = "SELECT cod_produto FROM produto WHERE cod_marca = $codigo";
    $query_compara = mysqli_query($conexao, $sql_compara);
    $contagem = mysqli_num_rows($query_compara);

    if ($contagem > 0) {
        $_SESSION['mensagem'] = "Essa marca não pode ser excluida por que existe(m)" . $contagem . " produtos vinculados a ela.";
        header('Location: listar.php');
    } else {

        $sql = "DELETE FROM marca WHERE cod_marca = $codigo";

        if (mysqli_query($conexao, $sql)) {
            $_SESSION['mensagem'] = "Marca excluido com sucesso!";
            header('Location: listar.php');
        }
    }
}
