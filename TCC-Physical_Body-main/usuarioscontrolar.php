<?php session_start();

//Cria variáveis com a sessão.
$logado=$_SESSION['nome'];

//Verifica o acesso.
if($_SESSION['acesso']=="Admin") {

    //Faz a conexão com o BD.
    require 'conexao.php';

    //Cria o SQL (consulte tudo da tabela usuarios)
    $sql="SELECT * FROM usuarios";

    //Executa o SQL
    $result=$conn->query($sql);

    //Se a consulta tiver resultados
    if ($result->num_rows > 0) {
        ?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
  <title>Usuario controlar</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="css/tabela.css">
  <link rel="stylesheet" href="css/main_usuarioscontrolar.css">
  <link rel="icon" href="images/TCC-logo.png" />
</head>

<body>
  <nav class="topnav">
    <ul>
      <li><a href="principal.php">Principal</a></li>
      <li><a href="#">Treinos</a></li>
      <li><a href="#">Aulas coletivas</a></li>
      <?php
  //Menu só aparece para os administradores.
if($_SESSION['acesso']=="Admin"){
  echo "<li class='dropdown'><a href='javascript:void(0)' class='dropbtn'>Administração do Site</a>";
  echo "<div class='dropdown-content'><a href='usuarioscontrolar.php'>Controlar Usuários</a><a href='usuariocadastrartela.php'>Cadastrar Usuário</a></div></li>";
}  
?>
      <li class="dropdown" style="float:right">
        <a href="javascript:void(0)" class="dropbtn"><?php echo $logado;?></a>
        <div class="dropdown-content">
          <a href="deslogar.php">Deslogar</a>
        </div>
      </li>
    </ul>
</nav>

  </div>
  <div class="content">
    <h1>Lista de usuários</h1>
    <table>
      <tr>
        <th>Id</th>
        <th>Nome</th>
        <th>Email</th>
        <th>Senha</th>
        <th>Acesso</th>
        <th colspan="2">Ações</td>
      </tr><?php while($row=$result->fetch_assoc()) {
            echo "<tr><td>". $row["ID"] . "</td><td>". $row["Nome"] . "</td><td>". $row["Email"] . "</td><td>". $row["Senha"] . "</td><td>". $row["Acesso"] . "</td>";
            echo "<td><a href='usuarioeditarform.php?id=". $row["ID"] . "'><img src='images/editar.svg' alt='Editar Usuário'></a></td><td><a href='usuarioexcluir.php?id=". $row["ID"] . "'><img src='images/excluir.svg' alt='Excluir Usuário'></a></td></tr>";
        }

        ?>
    </table>
    <br><a href="usuariocadastrartela.php"><img src='images/adicionar.svg' alt='Adicionar Usuário'></a>
  </div>
</body>

</html><?php //Se a consulta não tiver resultados  			
    }

    else {
        echo "<h1>Nenhum resultado foi encontrado.</h1>";
    }

    //Fecha a conexão.	
    $conn->close();

    //Se o usuário não usou o formulário
}

else {
    header('Location: index.html'); //Redireciona para o form
    exit; // Interrompe o Script
}

?>