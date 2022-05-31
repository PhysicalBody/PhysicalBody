<?php
// Parâmetros para criar a conexão
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "physicalbody";

// Criando a conexão
$conn = new mysqli($servername, $username, $password, $dbname);

// Checando a conexão
if ($conn->connect_error) {
  die("Você se deu mal: " . $conn->connect_error);
}
?>