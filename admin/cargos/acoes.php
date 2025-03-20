<?php

// Conexao do banco 
require_once '../../conexao/conecta.php';

// Inicia uma sessão 
if (!isset($_SESSION)) //A esclamação é dizendo se nao tem uma conexão
{
    session_start();
}

// CADASTRANDO UM NOVO CARGO
if (isset($_POST['cadastrar']) && $_POST['cadastrar'] == 'cadastrar_cargo') {

    $cargo = $_POST['cargo'];
    $observacao = mysqli_real_escape_string($conexao, $_POST['observacao']); //faz a santização do dado , dados que o banco não aceita / filtra

    $sql = "INSERT INTO cargo VALUES (0,'$cargo','$observacao',1,NOW())";

    if (mysqli_query($conexao, $sql)) {

        //header('Location: listar.php'); (esse é quando a situação esta certa)
        $_SESSION['mensagem'] = "Cargo cadastrado com sucesso!";
        header('Location: inserir.php');
    } else {
        //die("Erro: " . $sql . "<br>" . mysqli_error($conexao)); //Falar qual foi o erro da conexão (Mostrar error)
        $_SESSION['mensagem'] = "Erro ao cadastrar!";
        header('Location: inserir.php');
    }
}

// CADASTRANDO UM NOVO CARGO
if (isset($_POST['atualizar']) && $_POST['atualizar'] == 'atualizar_cargo') {
    $codigo = $_POST['cod_cargo'];
    $cargo = $_POST['cargo'];
    $status = $_POST['status'];
    $observacao = mysqli_real_escape_string($conexao, $_POST['observacao']); //faz a santização do dado , dados que o banco não aceita / filtra

    $sql = "UPDATE cargo SET nome_cargo ='$cargo', observacao ='$observacao',status = $status";

    $sql .= "WHERE cod_cargo = $codigo";

    if (mysqli_query($conexao, $sql)) {

        //header('Location: listar.php'); (esse é quando a situação esta certa)
        $_SESSION['mensagem'] = "Cargo cadastrado com sucesso!";
        header('Location: listar.php');
    } else {
        //die("Erro: " . $sql . "<br>" . mysqli_error($conexao)); //Falar qual foi o erro da conexão (Mostrar error)
        $_SESSION['mensagem'] = "Erro ao cadastrar!";
        header('Location: inserir.php');
    }
}

if (isset($_POST['deletar_cargo'])) {

    $codigo = $_POST['deletar_cargo'];

    $sql_compara = "SELECT cod_funcionario FROM funcionario WHERE cod_cargo = $codigo";
    $query_compara = mysqli_query($conexao, $sql_compara);
    $contagem = mysqli_num_rows($query_compara);

    if ($contagem > 0) {
        $_SESSION['mensagem'] = "Esse cargo não pode ser excluido por que existe(m)" . $contagem . " funcionario(s) vinculados a ele.";
        header('Location: listar.php');
    } 
    else 
    {
        $sql = "DELETE FROM cargo WHERE cod_cargo = $codigo";

        if (mysqli_query($conexao, $sql)) {
            $_SESSION['mensagem'] = "Cargo excluido com sucesso!";
            header('Location: listar.php');
        } 
    }
}
