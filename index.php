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

            <h2>Benvindo</h2>
        
            <div class = "testbox">
<!-- Formulario de login -->          
            <form action="crud.php" method="POST">
            Login:<br> <input type="text" name="login"><br>
            Senha:<br> <input type="password" name="senha"><br>
            <input type="hidden" name="operacao" value="verificar"><br>
            <button type="submit">Entrar</button>
            </form>

            </div>
<!-- Redirecionamentos -->
        <?php
        echo "<br>"."Novo por aqui,"."<a href='cadastrologin.php'>Cadastre-se</a><br><br>";
        echo "Listar usuários cadastrados"."<a href='select.php'>Aqui</a>";
        ?>
        </div>


    </body>

</html>
