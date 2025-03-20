<?php

# CONEXÃO COM BANCO #

require_once '../../conexao/conecta.php';

if (!isset($_SESSION)) //A esclamação é dizendo se nao tem uma conexão
{
    session_start();
}

# ADICIONANDO UM NOVO fornecedor #
// Se chegar uma condição cadastrar e ela for igual a cadastrar_fornecedor vai fazer oq esta no if
if (isset($_POST['cadastrar']) &&   $_POST['cadastrar'] == 'cadastrar_fornecedor') {
    $nome = mysqli_real_escape_string($conexao, $_POST['nome']);
    $cnpj = mysqli_real_escape_string($conexao, $_POST['cnpj']);
    $cep = mysqli_real_escape_string($conexao, $_POST['cep']);
    $endereco = mysqli_real_escape_string($conexao, $_POST['endereco']);
    $numero = mysqli_real_escape_string($conexao, $_POST['numero']);
    $complemento = mysqli_real_escape_string($conexao, $_POST['complemento']);
    $observacao = mysqli_real_escape_string($conexao, $_POST['observacao']);
    $bairro = mysqli_real_escape_string($conexao, $_POST['bairro']);
    $cidade = mysqli_real_escape_string($conexao, $_POST['cidade']);
    $estado = mysqli_real_escape_string($conexao, $_POST['estado']);
    $celular = mysqli_real_escape_string($conexao, $_POST['celular']);
    $residencial = mysqli_real_escape_string($conexao, $_POST['residencial']);
    $email = mysqli_real_escape_string($conexao, $_POST['email']);
    $status = mysqli_real_escape_string($conexao, $_POST['status']);

    # Enviando a imagem para o servidor #

    $sql = "INSERT INTO fornecedor VALUES (0,'$nome', '$cnpj' , '$email', '$residencial' ,'$celular', '$cep' , '$endereco' ,'$numero' , '$bairro' , '$cidade' , '$estado' , '$complemento' , '$observacao' ,  NOW(), 1)";


    if (mysqli_query($conexao, $sql)) {

        //header('Location: listar.php'); (esse é quando a situação esta certa)
        $_SESSION['mensagem'] = "Fornecedor cadastrado com sucesso!";
        header('Location: inserir.php');
    } else {
        //die("Erro: " . $sql . "<br>" . mysqli_error($conexao)); //Falar qual foi o erro da conexão (Mostrar error)
        $_SESSION['mensagem'] = "Erro ao cadastrar!";
        header('Location: inserir.php');
    }
}


#ATUALIZANDO FUNCIONARIO
if (isset($_POST['atualizar']) &&   $_POST['atualizar'] == 'atualizar_fornecedor') {

    $codigo = $_POST['cod_fornecedor'];
    $status = $_POST['status'];
    $nome = mysqli_real_escape_string($conexao, $_POST['nome']);
    $cnpj = mysqli_real_escape_string($conexao, $_POST['cnpj']);
    $cep = mysqli_real_escape_string($conexao, $_POST['cep']);
    $endereco = mysqli_real_escape_string($conexao, $_POST['endereco']);
    $numero = mysqli_real_escape_string($conexao, $_POST['numero']);
    $complemento = mysqli_real_escape_string($conexao, $_POST['complemento']);
    $observacao = mysqli_real_escape_string($conexao, $_POST['observacao']);
    $bairro = mysqli_real_escape_string($conexao, $_POST['bairro']);
    $cidade = mysqli_real_escape_string($conexao, $_POST['cidade']);
    $estado = mysqli_real_escape_string($conexao, $_POST['estado']);
    $celular = mysqli_real_escape_string($conexao, $_POST['celular']);
    $residencial = mysqli_real_escape_string($conexao, $_POST['residencial']);
    $email = mysqli_real_escape_string($conexao, $_POST['email']);
    $status = mysqli_real_escape_string($conexao, $_POST['status']);

    # Enviando a imagem para o servidor #

    $sql = "UPDATE fornecedor SET nome = '$nome', cnpj = '$cnpj' , email = '$email', telefone_residencial = '$residencial' , telefone_celular = '$celular', cep = '$cep' , endereco = '$endereco' , numero = '$numero' , bairro ='$bairro' , cidade = '$cidade' , estado = '$estado' , complemento = '$complemento' , status = $status";

    $sql .= " WHERE cod_fornecedor = $codigo";


    if (mysqli_query($conexao, $sql)) {

        //header('Location: listar.php'); (esse é quando a situação esta certa)
        $_SESSION['mensagem'] = "Fornecedor cadastrado com sucesso!";
        header('Location: listar.php');
    } else {
        die("Erro: " . $sql . "<br>" . mysqli_error($conexao)); //Falar qual foi o erro da conexão (Mostrar error)
        $_SESSION['mensagem'] = "Erro ao cadastrar!";
        header('Location: inserir.php');
    }
}

if (isset($_POST['deletar_fornecedor'])) {

    $codigo = $_POST['deletar_fornecedor'];

    $sql_compara = "SELECT cod_produto FROM produto WHERE cod_fornecedor = $codigo";
    $query_compara = mysqli_query($conexao, $sql_compara);
    $contagem = mysqli_num_rows($query_compara);

    if ($contagem > 0) {
        $_SESSION['mensagem'] = "Esse fornecedor(a) não pode ser excluida por que existe(m)" . $contagem . " produtos vinculados a ele(a).";
        header('Location: listar.php');
    } else{

        $sql = "DELETE FROM fornecedor WHERE cod_fornecedor = $codigo";

    if (mysqli_query($conexao, $sql)) {
        $_SESSION['mensagem'] = "Fornecedor excluido com sucesso!";
        header('Location: listar.php');
    } }
}

