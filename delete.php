<?php

require 'conexao.php';

// id capturado pela url, checado e deletado.
if(isset($_GET['id']) && is_numeric($_GET['id'])){
    
    $userid = $_GET['id'];
    $delete_user = mysqli_query($conn,"DELETE FROM usuarios WHERE id='$userid'");
    
    if($delete_user){
        echo "<script>
        alert('Ítem deletado com sucesso !');
        window.location.href = 'index.php';
        </script>";
        exit;
    }else{
       echo "Opps não foi possível deletar !"; 
    }
mysqli_close($conn);    
}else{
    // Erro se não capturar id
    http_response_code(404);
    echo "<h1>404 Page Not Found!</h1>";
}
?>