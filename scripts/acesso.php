<?php
  session_start();
  if(! isset($_SESSION['autenticado']) or $_SESSION == 'NAO') {
    header('location: ../index.php?login=erro2');
  }
?>