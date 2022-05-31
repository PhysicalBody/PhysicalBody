<?php
session_start();
if (isset($_POST['senha'])){
// Dados do Formulário
$campoemail = $_POST["email"];
$camposenha = $_POST["senha"];

//Faz a conexão com o BD.
require 'conexao.php';

//Cria o SQL (consulte tudo na tabela usuarios com o email digitado no form)
$sql = "SELECT * FROM usuarios WHERE email='$campoemail'";

//Executa o SQL
$result = $conn->query($sql);

// Cria uma matriz com o resultado da consulta
 $row = $result->fetch_assoc();
 
	//Se a consulta tiver resultados
	if ($result->num_rows > 0) {
		
			if($camposenha == $row["Senha"]){
				$_SESSION['nome'] = $row["Nome"];
				$_SESSION['acesso'] = $row["Acesso"];
				header('Location: principal.php');
				exit;
			}else{
			  header( "refresh:4;url=login.html" );
				echo 'Senha Inválida';  
				exit;  
			}
	//Se a consulta não tiver resultados  			
	} else {
		header('Location: login.html'); //Redireciona para o form
		exit; // Interrompe o Script
	}
//Se o usuário não usou o formulário
} else {
    header('Location: login.html'); //Redireciona para o form
    exit; // Interrompe o Script
}

//Fecha a conexão.
$conn->close();
?> 