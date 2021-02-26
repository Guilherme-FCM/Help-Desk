<?php
    session_start();
    $arquivo = fopen('registros.hd', 'a');    
    foreach($_POST as $valor) {
        $texto = "$valor" . PHP_EOL;
        fwrite($arquivo, $texto);
    }
    fwrite($arquivo, $_SESSION['id'] . PHP_EOL);
    fwrite($arquivo, '||' . PHP_EOL);
    fclose($arquivo);
    header('location: ../abrir_chamado.php');
?>