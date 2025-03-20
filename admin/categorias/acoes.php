<?php

// Conexao do banco 
require_once '../../conexao/conecta.php';

// Inicia uma sessão 
if (!isset($_SESSION)) //A esclamação é dizendo se nao tem uma conexão
{
    session_start();
}

// CADASTRANDO UM NOVO categoria
if (isset($_POST['cadastrar']) && $_POST['cadastrar'] == 'cadastrar_categoria') {

    $categoria = $_POST['categoria'];
    $observacao = mysqli_real_escape_string($conexao, $_POST['observacao']); //faz a santização do dado , dados que o banco não aceita / filtra

    $sql = "INSERT INTO categoria VALUES (0,'$categoria','$observacao',1,NOW())";

    if (mysqli_query($conexao, $sql)) {

        //header('Location: listar.php'); (esse é quando a situação esta certa)
        $_SESSION['mensagem'] = "Categoria cadastrado com sucesso!";
        header('Location: inserir.php');
    } else {
        //die("Erro: " . $sql . "<br>" . mysqli_error($conexao)); //Falar qual foi o erro da conexão (Mostrar error)
        $_SESSION['mensagem'] = "Erro ao cadastrar!";
        header('Location: inserir.php');
    }
}

// EDITANDO CATEGORIO
if (isset($_POST['atualizar']) && $_POST['atualizar'] == 'atualizar_categoria') {
    $status = $_POST['status'];
    $categoria = $_POST['categoria'];
    $observacao = mysqli_real_escape_string($conexao, $_POST['observacao']); //faz a santização do dado , dados que o banco não aceita / filtra
    $codigo = $_POST['cod_categoria'];

    $sql = "UPDATE categoria SET nome_categoria ='$categoria', observacao ='$observacao',status = $status";

    $sql .= " WHERE cod_categoria = $codigo";

    if (mysqli_query($conexao, $sql)) {

        //header('Location: listar.php'); (esse é quando a situação esta certa)
        $_SESSION['mensagem'] = "Categoria cadastrado com sucesso!";
        header('Location: listar.php');
    } else {
        //die("Erro: " . $sql . "<br>" . mysqli_error($conexao)); //Falar qual foi o erro da conexão (Mostrar error)
        $_SESSION['mensagem'] = "Erro ao cadastrar!";
        header('Location: inserir.php');
    }
}

if (isset($_POST['deletar_categoria'])) {

    $codigo = $_POST['deletar_categoria'];
    $sql_compara = "SELECT cod_produto FROM produto WHERE cod_categoria = $codigo";
    $query_compara = mysqli_query($conexao, $sql_compara);
    $contagem = mysqli_num_rows($query_compara);

    if ($contagem > 0) {
        $_SESSION['mensagem'] = "Essa categoria não pode ser excluida por que existe(m)" . $contagem . " produtos vinculados a ele.";
        header('Location: listar.php');
    } else {

        $sql = "DELETE FROM categoria WHERE cod_categoria = $codigo";

        if (mysqli_query($conexao, $sql)) {
            $_SESSION['mensagem'] = "Categoria excluido com sucesso!";
            header('Location: listar.php');
        } else {
            //die("Erro: " . $sql . "<br>" . mysqli_error($conexao));
        }
    }
}
