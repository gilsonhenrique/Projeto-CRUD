<!DOCTYPE html>
<html>

    <head>
        <meta charset="UTF-8" lang="pt-br"/>
        <meta name= "viewport" content= "width=device-width,initial scale= 1.0">
        <title> Cadastro </title>
        <link rel="stylesheet" type="text/css" href="estilo/style.css">
    </head>

    <body>
        <div id = "container"></div>
    	
    	<div class = "login-box"> 
         
         <h2>Cadastro</h2>

            <div class = "testbox">
         
            <form action="crud.php" method="POST">
            Nome:<br> <input type="text" autocomplete="off" name="nome" placeholder="Entre com seu nome" value="<?php echo '';?>" required><BR>
            Login:<br> <input type="text" autocomplete="off" name="login" placeholder="Entre com seu login" value="<?php echo '';?>" required><BR>
            Senha:<br> <input type="password" autocomplete="off" name="senha" placeholder="Entre com a senha" value="<?php echo '';?>" required><BR>
            <input type="hidden" name="operacao" value="cadastrar"><BR>
            <button type="submit">Enviar</button>
            <?php echo '<a href="index.php">Retornar</a>';?>

            </form>

        </div>

        </div>


    </body>

</html>
