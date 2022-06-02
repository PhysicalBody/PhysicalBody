<?php
session_start();
//Só administrador pode acessar o programa.
if($_SESSION['acesso']=="Admin"){

// Dados do Formulário
$camponome = $_POST["nome"];
$campoemail = $_POST["email"];
$camposenha = $_POST["senha"];
$campoacesso = $_POST["acesso"];

//Faz a conexão com o BD.
require 'conexao.php';

//Insere na tabela os valores dos campos
$sql = "INSERT INTO usuario(nome, email, senha, acesso) VALUES('$camponome', '$campoemail', '$camposenha', '$campoacesso')";

//Executa o SQL e faz tratamento de erros
if ($conn->query($sql) === TRUE) {
  header( "refresh:3;url=usuarioscontrolar.php" );	
  echo "Gravado com sucesso.";
  
  //Abre o arquivo log.txt, a opção "a" é para adicionar 
  $log = fopen("log.txt", "a") or die("Não abriu");
  
  //Como será a String gravada no log
  $txt = $_SESSION['nome'] . " - $sql - " . 
  date("d/m/Y") . " - " . date("H:i:s") . "\n";

  //Escreve a String no objeto que representa o arquivo
  fwrite($log, $txt);
  
  //Fecha o objeto
  fclose($log);

} else {
  header( "refresh:5;url=principal.php" );	
  echo "Error: " . $sql . "<br>" . $conn->error;
}

//Fecha a conexão.
$conn->close();
 
}else{
    header('Location: index.html'); //Redireciona para o form
    exit; // Interrompe o Script
}

?>