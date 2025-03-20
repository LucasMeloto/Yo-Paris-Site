<?php 

if(!isset($_SESSION))
{
    session_start();
} 


# VERIFICAR SE EXISTE USUARIO LOGADO È DO TIPO ADMINISTRADOR (1) #

 if($_SESSION['TYPE'] != '1')
 {
    $_SESSION['naoADM'] = "Apenas usuários Administradores porem acessar esta área!";
    header('Location: ../admin.php');
 }

?>