<!DOCTYPE html>
<html>

    <head>
        <meta charset="UTF-8" lang="pt-br"/>
        <meta name= "viewport" content= "width=device-width,initial scale= 1.0">
        <title> Nossa Loja </title>
        <link rel="stylesheet" type="text/css" href="estilo/style.css">
    </head>
       
    <body>

        <div id = "titulo"><h1>Loja PHP<h1></div>

        <div id = "container"></div>
       
        <div class = "login-box">
 
            <div class = "testbox">
            
<?php
require 'conexao.php';

//===================================================================================

//Variáveis Post "logar"

$operacao = $_POST['operacao'];
$login = mysqli_real_escape_string($conn, trim($_POST['login']));
$senha = mysqli_real_escape_string($conn, trim($_POST['senha']));
$senhamd5 = md5($senha);

//==================================================================================

// Verificar Usuario cadastrado (logar)

if($operacao =='verificar'){
    $cmd = "SELECT * FROM usuarios WHERE login = '$login' AND senha = '$senhamd5'";
    $result = mysqli_query($conn, $cmd);
    mysqli_close($conn);

        if(mysqli_num_rows($result) === 1){
            echo "<h3>Logado com sucesso!</h3>";
            echo "Acessar a loja => ";
            echo "<a href='loja.php'>Aqui</a><br><br>";
            echo "Atualizar dados => ";
            echo "<a href='select.php'>Aqui</a><br><br>";
            
   
        }else{
            echo "<h2>Erro: Usuário/senha inválido</h2>";
            echo "<a href='index.php'>Retornar</a>". "<br><br>";
            echo "<a href='cadastrologin.php'>Cadastre aqui</a>";
        }

}            
//==================================================================================

// Cadastrar um novo usuário

if($operacao == 'cadastrar'){
//$nome fica aqui, pois logar não precisa nome
$nome = mysqli_escape_string($conn, trim($_POST['nome']));

// Check nome e login estão em branco
    if(!empty($nome) && !empty($login)){
        $verif_nome = mysqli_query($conn, "SELECT * FROM usuarios WHERE nome = '$nome'");
// Check se Login já exite no BD, se existir alert !            
            if(mysqli_num_rows($verif_nome) === 1){
                echo "<script>
                    alert('Usuário já existe. porfavor use outro nome!');
                    window.location.href = 'cadastrologin.php';
                    </script>";
//Se não existir INSERT no BD                                
            }else{
                $cmd = "INSERT INTO usuarios (nome,login,senha) VALUES ('$nome','$login', '$senhamd5')";
                $result = mysqli_query($conn,$cmd);
                mysqli_close($conn);
                echo "<script>
                    alert('Cadastrado com sucesso ! Login para continuar...');
                    window.location.href = 'index.php';
                    </script>";
            }
//Nome ou Login em branco retorna erro                    
    }else{
     echo "<script>
          alert('Não Cadastrado! Preencha todos campos!');
          window.location.href = 'cadastrologin.php';
          </script>";
          exit;
    }    

mysqli_close($conn);

}
?>

            </div>

        </div>


    </body>

</html>
