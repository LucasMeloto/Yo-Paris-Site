<?php 

if(!isset($_SESSION))
{
    session_start();
} 


# VERIFICAR SE EXISTE USUARIO LOGADO PARA PERMITIR O ACESSO#

 if(!$_SESSION['USER'])
 {
    $_SESSION['naoAutorizado'] = "Apenas usuários cadastrados porem acessar esta área!";
    header('Location: ../index.php');
 }

?>