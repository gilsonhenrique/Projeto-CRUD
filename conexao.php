<?php

//Conexão
$host = "localhost";
$user = "root";
$pass = "";
$data = "meuapp1";

$conn = mysqli_connect($host,$user,$pass,$data);

// codificação conexão utf8
mysqli_set_charset($conn, "utf8");

//Checar Conexão
if (!$conn) {
  die("Connection failed: " . mysqli_connect_error());
}
?>