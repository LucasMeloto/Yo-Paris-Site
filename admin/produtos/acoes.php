<?php 

    # CONEXÃO COM BANCO #

    require_once '../../conexao/conecta.php';

    if(!isset($_SESSION)) //A esclamação é dizendo se nao tem uma conexão
    {
        session_start();
    }



    # CADASTRO
        // Se chegar uma condição cadastrar e ela for igual a cadastrar_produto vai fazer oq esta no if
        if (isset($_POST['cadastrar']) &&   $_POST['cadastrar'] == 'cadastrar_produto' )
        {
            $nome = mysqli_real_escape_string($conexao, $_POST['nome']);
            $categoria = mysqli_real_escape_string($conexao, $_POST['categoria']);
            $marca = mysqli_real_escape_string($conexao, $_POST['marca']);
            $fornecedor = mysqli_real_escape_string($conexao, $_POST['fornecedor']);
            $preco_custo = str_replace(',', '.' ,  $_POST['preco_custo']);
            $lucro = str_replace(',', '.' ,  $_POST['lucro']);
            $preco_venda = str_replace(',', '.' ,  $_POST['preco_venda']);
            $qntd = mysqli_real_escape_string($conexao, $_POST['qtnd']);
            $promocao = mysqli_real_escape_string($conexao, $_POST['promocao']);
            $desconto = str_replace(',', '.' ,  $_POST['desconto']);
            $preco_promocao = str_replace(',', '.' ,  $_POST['preco_promocao']);
            $observacao = mysqli_real_escape_string($conexao, $_POST['observacao']);
            $descricao = mysqli_real_escape_string($conexao, $_POST['descricao']);
            $status = mysqli_real_escape_string($conexao, $_POST['status']);
    
                    # Enviando a imagem para o servidor #
    
            //Pegando o caminho da imagem
            $foto = basename($_FILES['foto']['name']);
    
            //SALVANDO UM CAMINHO TEMPORÁRIO NA PASTA TMP
            $tmp = $_FILES['foto']['tmp_name'];
            
            //CRIANDO o CAMINHO FINAL DA IMAGEM
            $final = "../../imagens/produtos/" . $foto;
    
            //MOVENDO O ARQUIVO DA PASTA TMP A PASTA IMAGES
            move_uploaded_file($tmp, $final);
    
            # Enviando a imagem para o servidor #
    
            $sql = "INSERT INTO produto VALUES (0,'$nome', '$lucro' , '$preco_custo', '$preco_venda' ,'$qntd', $promocao , '$desconto' , '$preco_promocao' , '$observacao' , '$descricao'  , '$foto' , 1 ,NOW(), '$marca', '$categoria' , '$fornecedor' )";
    
            
            if(mysqli_query($conexao, $sql))
            {
    
                //header('Location: listar.php'); (esse é quando a situação esta certa)
                $_SESSION['mensagem'] = "Produto cadastrado com sucesso!";
                header('Location: inserir.php');
    
            }
            else{
                //die("Erro: " . $sql . "<br>" . mysqli_error($conexao)); //Falar qual foi o erro da conexão (Mostrar error)
                $_SESSION['mensagem'] = "Erro ao cadastrar!";
                header('Location: inserir.php');
            }
    
        }


            # EDITAR

        // Se chegar uma condição cadastrar e ela for igual a cadastrar_produto vai fazer oq esta no if
    if (isset($_POST['atualizar']) &&   $_POST['atualizar'] == 'atualizar_produto' )
    {   
        $codigo = $_POST['cod_produto'];
        $status = $_POST['status'];
        $nome = mysqli_real_escape_string($conexao, $_POST['nome']);
        $categoria = mysqli_real_escape_string($conexao, $_POST['categoria']);
        $marca = mysqli_real_escape_string($conexao, $_POST['marca']);
        $fornecedor = mysqli_real_escape_string($conexao, $_POST['fornecedor']);
        $preco_custo = str_replace(',', '.' ,  $_POST['preco_custo']);
        $lucro = str_replace(',', '.' ,  $_POST['lucro']);
        $preco_venda = str_replace(',', '.' ,  $_POST['preco_venda']);
        $qntd = mysqli_real_escape_string($conexao, $_POST['qtnd']);
        $promocao = mysqli_real_escape_string($conexao, $_POST['promocao']);
        $desconto = str_replace(',', '.' ,  $_POST['desconto']);
        $preco_promocao = str_replace(',', '.' ,  $_POST['preco_promocao']);
        $observacao = mysqli_real_escape_string($conexao, $_POST['observacao']);
        $descricao = mysqli_real_escape_string($conexao, $_POST['descricao']);
        $status = mysqli_real_escape_string($conexao, $_POST['status']);

                # Enviando a imagem para o servidor #

        //Pegando o caminho da imagem
        $foto = basename($_FILES['foto']['name']);

        //SALVANDO UM CAMINHO TEMPORÁRIO NA PASTA TMP
        $tmp = $_FILES['foto']['tmp_name'];
        
        //CRIANDO o CAMINHO FINAL DA IMAGEM
        $final = "../../imagens/produtos/" . $foto;

        //MOVENDO O ARQUIVO DA PASTA TMP A PASTA IMAGES
        move_uploaded_file($tmp, $final);

        # Enviando a imagem para o servidor #

        $sql = "UPDATE produto SET nome_produto = '$nome', lucro = '$lucro' , preco_custo = '$preco_custo', preco_venda = '$preco_venda' ,qntd = '$qntd', promocao = $promocao , porc_promocao = '$desconto' , preco_promocao = '$preco_promocao' , observacao = '$observacao' , descricao = '$descricao' , status = $status, cod_marca = $marca, cod_categoria = $categoria , cod_fornecedor = $fornecedor";

        //VERIFICA SE O CAMPO DA FOTO ESTA VAZIO OU NÂO PARA BUSTITUIR A FOTO EXISTENTE OU MANTER A ATUAL
        if(!empty($foto)){
            $sql .= ", foto = '$foto'";
        }

        //WHERE DO UPDATE
        $sql .= " WHERE cod_produto = $codigo";

        
        if(mysqli_query($conexao, $sql))
        {

            //header('Location: listar.php'); (esse é quando a situação esta certa)
            $_SESSION['mensagem'] = "Produto atualizado com sucesso!";
            header('Location: listar.php');

        }
        else{
            // die("Erro: " . $sql . "<br>" . mysqli_error($conexao)); //Falar qual foi o erro da conexão (Mostrar error)
            $_SESSION['mensagem'] = "Erro ao cadastrar!";
            header('Location: inserir.php');
        }

    }


    if(isset($_POST['deletar_produto'])){

        $codigo = $_POST['deletar_produto'];

        $sql = "DELETE FROM produto WHERE cod_produto = $codigo";

        if(mysqli_query($conexao, $sql)){
            header('Location: listar.php');
        }
        else{
            die("Erro: ". $sql . "<br>" .mysqli_error($conexao));
        }
    }

?>