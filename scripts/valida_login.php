<?php
    session_start();   
    $autenticado = false;
    $users = [
        ['id' => 1, 'email' => 'adm@teste.com', 'senha' => '1234', 'user' => 'administrador'],
        ['id' => 2, 'email' => 'user@teste.com', 'senha' => '1234', 'user' => 'administrador'],
        ['id' => 3, 'email' => 'joao@teste.com', 'senha' => '1234', 'user' => 'comum'],
        ['id' => 4, 'email' => 'mara@teste.com', 'senha' => '1234', 'user' => 'comum']
    ];

    foreach($users as $lista) {
        if ($lista['email'] == $_POST['email'] and $lista['senha'] == $_POST['senha']) {
            $user = $lista['user'];
            $id_user = $lista['id'];
            echo $id_user;
            $autenticado = true;
        }
    }
    
    if ($autenticado) {
        $_SESSION['autenticado'] = 'SIM';
        $_SESSION['user'] = $user;
        $_SESSION['id'] = $id_user;
        header('location: ../home.php');
    } else {
        header('location: ../index.php?login=erro');
        $_SESSION['autenticado'] = 'NAO';
    }
?>