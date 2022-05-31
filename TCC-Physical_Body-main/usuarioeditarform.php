<?php
session_start();
//Verifica o acesso.
if($_SESSION['acesso']=="Admin"){

//Faz a leitura do dado passado pelo link.
$campoid = $_GET["id"];

//Faz a conexão com o BD.
require 'conexao.php';

//Cria o SQL (consulte tudo da tabela usuarios)
$sql = "SELECT * FROM usuarios WHERE Id = $campoid";

//Executa o SQL
$result = $conn->query($sql);

	//Se a consulta tiver resultados
	 if ($result->num_rows > 0) {

// Cria uma matriz com o resultado da consulta
 $row = $result->fetch_assoc();
?>
<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <link rel="stylesheet" href="css/editarecadastrar.css">
        <link rel="icon" href="images/TCC-logo.png"/>
        <title>Editar usuário</title>
    </head>
    <body>
        <form action="usuarioeditar.php" method="post">
            <h3>Editar Usuário Id: <?php echo $row["ID"]; ?></h3>
            <input type="hidden" name="id" value="<?php echo $row["ID"]; ?>">
            <input type="text" name="nome" value="<?php echo $row["Nome"]; ?>" placeholder="Seu nome..." required>		
            <input type="email" name="email" value="<?php echo $row["Email"]; ?>" placeholder="Seu e-mail..." required>	     
        <?php if ($row["Acesso"]=="Admin"){ ?>
            <input type="radio" name="acesso" value="Comum" required><label>Comum</label>
            <input type="radio" name="acesso" value="Personal"><label>Personal</label>  
            <input type="radio" name="acesso" value="Admin" checked="true"><label>Admin</label>        
        <?php }else{ ?>
            <input type="radio" name="acesso" value="Comum" required checked="true"><label>Comum</label>
            <input type="radio" name="acesso" value="Personal"><label>Personal</label> 
            <input type="radio" name="acesso" value="Admin"><label>Admin</label>        
        <?php } ?>      
            <input type="submit" value="Editar">
        </form>
    </body>
</html>
<?php
	//Se a consulta não tiver resultados  			
	} else {
		echo "<h1>Nenhum resultado foi encontrado.</h1>";
	}

	//Fecha a conexão.	
	$conn->close();
	
//Se o usuário não tem acesso.
} else {
    header('Location: index.html'); //Redireciona para o form
    exit; // Interrompe o Script
}

?> 