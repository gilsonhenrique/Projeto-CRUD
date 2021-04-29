<?php

require 'conexao.php';


// Seleciona o Id enviado pelo "get" no BD

if(isset($_GET['id'])){
    
    $userid = $_GET['id'];
    $get_user = mysqli_query($conn,"SELECT * FROM `usuarios` WHERE id='$userid'");
    
    if(mysqli_num_rows($get_user) === 1){

// Retorna um array com registro deste id         
        $row = mysqli_fetch_assoc($get_user);
//  ------------------------------------------------------------------------------
?>
<!DOCTYPE html>
<head>
    <meta charset="UTF-8" lang="pt-br"/>
    <meta name= "viewport" content= "width=device-width,initial scale= 1.0">
    <title>Update data</title>
    <link rel="stylesheet" type="text/css" href="estilo/style.css">
</head>

<body>
        <div id = "container"></div>
      
       <!-- Formulario UPDATE DADOS -->
        <div class = "login-box"> 
            <h2>Update Data</h2>
        <div class = "testbox">

            <form action="" method="post">
                <strong>Nome</strong><br>
                <input type="text" autocomplete="off" name="nome" placeholder="Entre com seu nome" value="<?php echo $row['nome'];?>" required><br>
                <strong>Login</strong><br>
                <input type="text" autocomplete="off" name="login" placeholder="Entre com seu login" value="<?php echo $row['login'];?>" required><br>
                <input type="submit" value="Update">
            </form>
        </div>
        <!-- Final do Formulario UPDATE DADOS  -->

        </div>
</body>
</html>

<?php

    }else{
        // Erro se não existir id no BD
        http_response_code(404);
        echo "<h1>404 Page Not Found!</h1>";
    }
    
}else{
    // Erro se não capturar id
    http_response_code(404);
    echo "<h1>404 Page Not Found!</h1>";
}


/* ---------------------------------------------------------------------------
------------------------------------------------------------------------------ */


// ATUALIZANDO DADOS NO BD

if(isset($_POST['nome']) && isset($_POST['login'])){
    $username = mysqli_real_escape_string($conn, trim($_POST['nome']));
    $userlogin = mysqli_real_escape_string($conn,trim($_POST['login']));
    $user_id = mysqli_real_escape_string($conn,trim($_GET['id']));

    
// Check nome e login estão em branco
    if(!empty($username) && !empty($userlogin)){

// Check se Login já exite no BD, se existir alert !
        if ($userlogin) {

            $check_login = mysqli_query($conn, "SELECT `login` FROM `usuarios` WHERE login = '$userlogin' AND id != '$user_id'");
     
            if(mysqli_num_rows($check_login) === 1){    
                
                echo "<script>
                alert('Login já existe , entre com outro !');
                window.location.href = 'select.php';
                </script>";
                exit;

            }else{
                
//Se não existir UPDATE no BD            
                $update_query = mysqli_query($conn,"UPDATE `usuarios` SET nome='$username',login='$userlogin' WHERE id=$user_id");

                    if($update_query){
                        echo "<script>
                        alert('Atualizado com Sucesso !');
                        window.location.href = 'index.php';
                        </script>";
                    exit;
                    }
            }
        }

//Nome ou Login em branco retorna erro        
    }else{
        echo "<script>
        alert('Não Atualizado! Campos estão vazios!');
        window.location.href = 'select.php';
        </script>";
        exit;
    }

mysqli_close($conn);
}

?>