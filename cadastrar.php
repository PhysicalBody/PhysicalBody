<?php
if ((isset($_POST['email']))&&(!empty($_POST['email']))){

    //Conectando com o banco de dados
require "conexao.php";

//Pegando os dados inseridos
$acesso = 'Comum';
$nome = $_POST['nome']; 
$email = $_POST['email'];
$senha = $_POST['senha'];
$confirma_senha = $_POST['confirma_senha'];
$celular = $_POST['celular'];
$cpf = $_POST['cpf'];
$nascimento = $_POST['nascimento'];

//inserindo os dados
$sql = "INSERT INTO usuario (Acesso, Nome, Email, Senha, CPF, Celular, Nascimento) VALUES
('$acesso','$nome', '$email', '$senha', '$cpf', '$celular', '$nascimento')";

mysqli_query($conn,$sql) or die("Erro ao tentar cadastrar registro");
mysqli_close($conn);
echo "Cliente cadastrado com sucesso!";
}
?>