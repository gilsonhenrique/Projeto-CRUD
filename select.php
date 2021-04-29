<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8" lang="pt-br"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nossa Loja</title>
    <link rel="stylesheet" type="text/css" href="estilo/style.css">
</head>

<body>

    <div id = "titulo"><h1>Loja PHP<h1></div>

    <div id = "container"></div>

    <div class="login-box">
      
    <h2>Clientes Cadastrados</h2>

<?php

require 'conexao.php';


// Monta tabela (nome, login, id) com todos usuários cadastrados

$get_data = mysqli_query($conn,"SELECT * FROM usuarios");

if(mysqli_num_rows($get_data) > 0){
    echo '<table>
    <tr>
    <th>Nome</th>
    <th>Login</th> 
    <th>Acão</th> 
    </tr>';

// Dentro da tabela , passa o id pela url
    
    while($row = mysqli_fetch_assoc($get_data)){
           
       echo '<tr>
       <td>'.$row['nome'].'</td>
       <td>'.$row['login'].'</td>
       <td>
       <a href="update.php?id='.$row['id'].'">Editar</a> |
       <a href="delete.php?id='.$row['id'].'">Deletar</a>
       </td>
       </tr>';

        }
        echo '</table>';

        mysqli_close($conn);
    }

else{
        echo "<h3>Nenhum Cliente cadastrado!</h3>";
    }

echo '<a href="index.php">Retornar</a>';

?>

    </div>

</body>

</html>