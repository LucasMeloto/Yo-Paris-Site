<?php 

    # CONEXÃO COM BANCO #

    require_once '../../conexao/conecta.php';

    if(!isset($_SESSION)) //A esclamação é dizendo se nao tem uma conexão
    {
        session_start();
    }

    # ADICIONANDO UM NOVO FUNCIONARIO #
        // Se chegar uma condição cadastrar e ela for igual a cadastrar_funcionario vai fazer oq esta no if
    if (isset($_POST['cadastrar']) &&   $_POST['cadastrar'] == 'cadastrar_funcionario' )
    {
        $nome = mysqli_real_escape_string($conexao, $_POST['nome']);
        $nomeS = mysqli_real_escape_string($conexao, $_POST['nomeS']);
        $dataN = mysqli_real_escape_string($conexao, $_POST['dataN']);
        $cpf = mysqli_real_escape_string($conexao, $_POST['cpf']);
        $sexo = mysqli_real_escape_string($conexao, $_POST['sexo']);
        $rg = mysqli_real_escape_string($conexao, $_POST['rg']);
        $civil = mysqli_real_escape_string($conexao, $_POST['civil']);
        $cargo = mysqli_real_escape_string($conexao, $_POST['cargo']);

        $salario = str_replace(',', '.' ,  $_POST['salario']);

        $cep = mysqli_real_escape_string($conexao, $_POST['cep']);
        $endereco = mysqli_real_escape_string($conexao, $_POST['endereco']);
        $numero = mysqli_real_escape_string($conexao, $_POST['numero']);
        $complemento = mysqli_real_escape_string($conexao, $_POST['complemento']);
        $bairro = mysqli_real_escape_string($conexao, $_POST['bairro']);
        $cidade = mysqli_real_escape_string($conexao, $_POST['cidade']);
        $estado = mysqli_real_escape_string($conexao, $_POST['estado']);
        $celular = mysqli_real_escape_string($conexao, $_POST['celular']);
        $residencial = mysqli_real_escape_string($conexao, $_POST['residencial']);
        $email = mysqli_real_escape_string($conexao, $_POST['email']);
        $login = mysqli_real_escape_string($conexao, $_POST['login']);
        $senha = mysqli_real_escape_string($conexao, $_POST['senha']);
        $acesso = mysqli_real_escape_string($conexao, $_POST['acesso']);
        // $foto = mysqli_real_escape_string($conexao, $_POST['foto']);
        $status = mysqli_real_escape_string($conexao, $_POST['status']);

        # Enviando a imagem para o servidor #

        //Pegando o caminho da imagem
        $foto = basename($_FILES['foto']['name']);

        //SALVANDO UM CAMINHO TEMPORÁRIO NA PASTA TMP
        $tmp = $_FILES['foto']['tmp_name'];
        
        //CRIANDO o CAMINHO FINAL DA IMAGEM
        $final = "../../imagens/funcionarios/" . $foto;

        //MOVENDO O ARQUIVO DA PASTA TMP A PASTA IMAGES
        move_uploaded_file($tmp, $final);

        $sql = "INSERT INTO funcionario VALUES (0,'$nome', '$nomeS', '$dataN' , '$sexo' , '$civil' , '$cpf' , '$rg', '$salario' , '$endereco' , '$numero' , '$complemento' , '$bairro' , '$cidade', '$estado' , '$cep' , '$residencial', '$celular'  , '$email' , 1, NOW() , '$login', '$senha', $acesso , '$foto', $cargo)";

        
        if(mysqli_query($conexao, $sql))
        {

            //header('Location: listar.php'); (esse é quando a situação esta certa)
            $_SESSION['mensagem'] = "Funcionario cadastrado com sucesso!";
            header('Location: inserir.php');

        }
        else{
            //die("Erro: " . $sql . "<br>" . mysqli_error($conexao)); //Falar qual foi o erro da conexão (Mostrar error)
            $_SESSION['mensagem'] = "Erro ao cadastrar!";
            header('Location: inserir.php');
        }

    }

    # EDITANDO O FUNCIONARIO #
    if (isset($_POST['atualizar']) &&   $_POST['atualizar'] == 'atualizar_funcionario' )
    {
        $codigo = $_POST['cod_funcionario'];
        $status = $_POST['status'];
        $nome = mysqli_real_escape_string($conexao, $_POST['nome']);
        $nomeS = mysqli_real_escape_string($conexao, $_POST['nomeS']);
        $dataN = mysqli_real_escape_string($conexao, $_POST['dataN']);
        $cpf = mysqli_real_escape_string($conexao, $_POST['cpf']);
        $sexo = mysqli_real_escape_string($conexao, $_POST['sexo']);
        $rg = mysqli_real_escape_string($conexao, $_POST['rg']);
        $civil = mysqli_real_escape_string($conexao, $_POST['civil']);
        $cargo = mysqli_real_escape_string($conexao, $_POST['cargo']);

        $salario = str_replace(',', '.' ,  $_POST['salario']);

        $cep = mysqli_real_escape_string($conexao, $_POST['cep']);
        $endereco = mysqli_real_escape_string($conexao, $_POST['endereco']);
        $numero = mysqli_real_escape_string($conexao, $_POST['numero']);
        $complemento = mysqli_real_escape_string($conexao, $_POST['complemento']);
        $bairro = mysqli_real_escape_string($conexao, $_POST['bairro']);
        $cidade = mysqli_real_escape_string($conexao, $_POST['cidade']);
        $estado = mysqli_real_escape_string($conexao, $_POST['estado']);
        $celular = mysqli_real_escape_string($conexao, $_POST['celular']);
        $residencial = mysqli_real_escape_string($conexao, $_POST['residencial']);
        $email = mysqli_real_escape_string($conexao, $_POST['email']);
        $login = mysqli_real_escape_string($conexao, $_POST['login']);
        $senha = mysqli_real_escape_string($conexao, $_POST['senha']);
        $acesso = mysqli_real_escape_string($conexao, $_POST['acesso']);
        // $foto = mysqli_real_escape_string($conexao, $_POST['foto']);
        $status = mysqli_real_escape_string($conexao, $_POST['status']);

        # Enviando a imagem para o servidor #

        //Pegando o caminho da imagem
        $foto = basename($_FILES['foto']['name']);

        //SALVANDO UM CAMINHO TEMPORÁRIO NA PASTA TMP
        $tmp = $_FILES['foto']['tmp_name'];
        
        //CRIANDO o CAMINHO FINAL DA IMAGEM
        $final = "../../imagens/funcionarios/" . $foto;

        //MOVENDO O ARQUIVO DA PASTA TMP A PASTA IMAGES
        move_uploaded_file($tmp, $final);


        //UPDATE DO FUNCIONARIO
        $sql = " UPDATE funcionario SET nome = '$nome', nome_social = '$nomeS', data_nascimento = '$dataN' , sexo = '$sexo' , estado_civil = '$civil' , cpf = '$cpf' , rg = '$rg', salario = '$salario' , endereco = '$endereco' ,  numero = '$numero' , complemento = '$complemento' ,  bairro = '$bairro' , cidade = '$cidade', estado = '$estado' , cep = '$cep' , telefone_residencial = '$residencial', telefone_celular = '$celular'  , email = '$email' , status = $status, login = '$login', senha = '$senha', tipo_acesso = $acesso , cod_cargo = $cargo";

        //VERIFICA SE O CAMPO DA FOTO ESTA VAZIO OU NÂO PARA BUSTITUIR A FOTO EXISTENTE OU MANTER A ATUAL
        if(!empty($foto)){
            $sql .= ", foto '$foto'";
        }

        //WHERE DO UPDATE
        $sql .= " WHERE cod_funcionario = $codigo";

        
        if(mysqli_query($conexao, $sql))
        {

            //header('Location: listar.php'); (esse é quando a situação esta certa)
            $_SESSION['mensagem'] = "Funcionario cadastrado com sucesso!";
            header('Location: listar.php');

        }
        else{
            die("Erro: " . $sql . "<br>" . mysqli_error($conexao)); //Falar qual foi o erro da conexão (Mostrar error)
            // $_SESSION['mensagem'] = "Erro ao cadastrar!";
             header('Location: inserir.php');
        }

    }

    # EXCLUINDO FUNCIONARIO #

    if(isset($_POST['deletar_funcionario'])){

        $codigo = $_POST['deletar_funcionario'];

        $sql = "DELETE FROM funcionario WHERE cod_funcionario = $codigo";

        if(mysqli_query($conexao, $sql)){
            header('Location: listar.php');
        }
        else{
            die("Erro: ". $sql . "<br>" .mysqli_error($conexao));
        }
    }

?>