<?php
session_start();
//Verifica se o usuário logou.
if(!isset ($_SESSION['nome']) || !isset ($_SESSION['acesso']))
{
  unset($_SESSION['nome']);
  unset($_SESSION['acesso']);
  header('location:index.html');
  exit;
}

//Cria variáveis com a sessão.
$logado = $_SESSION['nome'];
$acesso = $_SESSION['acesso'];
?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
  <title>Tela Principal</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="css/html_principal.css">
  <link rel="stylesheet" href="css/main_principal.css">
  <link rel="icon" href="images/TCC-logo.png" />
</head>

<body>

  <nav class="topnav">
    <ul>
      <li><a href="principal.php">Principal</a></li>
      <li><a href="#treinos">Treinos</a></li>
      <li><a href="#aulas">Aulas coletivas</a></li>
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

  <div class="content">
    <h3>"Quem não segue com atenção os movimentos de sua própria alma, forçosamente será infeliz"</h3>
    <p>Marco Aurélio, Meditações, Livro II, 8</p>

  </div>
  <?php
	//Coloca o rodapé que está no arquivo
	//include 'rodape.php';
?>
</body>

</html>