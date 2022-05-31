<?php
  session_start();
  unset($_SESSION['nome']);
  unset($_SESSION['senha']);
  session_destroy();
  header('location:index.html');
?>