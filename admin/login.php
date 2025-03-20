<?php 

 #CONEXÂO COM O BANCO#
require_once '../conexao/conecta.php';

if(!isset($_SESSION))
{
    session_start();
}

#VERIFICANDO SE CHEGOU USUARIO E SENHA PARA COMPARAR COM AS INFORMAÇÔES DO BANCO #
if(isset($_POST['usuario']) && $_POST['usuario'] != '' && isset ($_POST['senha']) && $_POST['senha'] !='')
{
    $usuario = mysqli_real_escape_string($conexao,$_POST['usuario']);
    $senha = mysqli_real_escape_string($conexao,$_POST['senha']);

    $sql = "SELECT cod_funcionario, nome , tipo_acesso , login , foto FROM funcionario WHERE login = '$usuario' AND senha = '$senha'";

    $query = mysqli_query($conexao, $sql);

    $funcionario = mysqli_fetch_assoc($query);

    //echo $funcionario['login'];

    if(isset($funcionario))
    {
        $_SESSION['ID'] = $funcionario['cod_funcionario'];
        $_SESSION['USER'] = $funcionario['login'];
        $_SESSION['TYPE'] = $funcionario['tipo_acesso'];
        $_SESSION['NAME'] = $funcionario['nome'];
        $_SESSION['PHOTO'] = $funcionario['foto'];

        header('Location: admin.php');
    }
    else
    {
        $_SESSION['loginErro'] = "Usuário ou senha incorretos!";
        header('Location: index.php');
    }
}
else
{
    $_SESSION['loginVazio'] = "Informe usuário e senha";
    header('Location: index.php');
}
?>