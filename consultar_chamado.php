<?php require_once "scripts/acesso.php" ?>
<?php
  $arquivo = fopen('scripts/registros.hd', 'r');
  $chamados = [];
  $dados_chamado = [];
  while (!feof($arquivo)) {
    $linha = fgets($arquivo);
    if ($linha == '||'. PHP_EOL) {
      array_push($chamados, $dados_chamado);
      $dados_chamado = array();
      continue;
    }
    array_push($dados_chamado, $linha);
  }
  if ($_SESSION['user'] == 'comum'){
    foreach($chamados as $idx => $lista) {
      if ($lista[3] != $_SESSION['id']) {
        unset($chamados[$idx]);
      }
    }
  }
  
?>
<html>
  <head>
    <meta charset="utf-8" />
    <title>App Help Desk</title>

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <style>
      .card-consultar-chamado {
        padding: 30px 0 0 0;
        width: 100%;
        margin: 0 auto;
      }
    </style>
  </head>

  <body>

    <nav class="navbar navbar-dark bg-dark">
      <a class="navbar-brand" href="#">
        <img src="imagens/logo.png" width="30" height="30" class="d-inline-block align-top" alt="">
        App Help Desk
      </a>
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link" href="scripts/logoff.php">SAIR</a>
        </li>
      </ul>
    </nav>

    <div class="container">    
      <div class="row">

        <div class="card-consultar-chamado">
          <div class="card">
            <div class="card-header">
              Consulta de chamado
            </div>
            
            <div class="card-body">
              <?php
                foreach($chamados as $valores) {
              ?>
                <div class="card mb-3 bg-light">
                  <div class="card-body">
                    <h5 class="card-title"><?= $valores[0] ?></h5>
                    <h6 class="card-subtitle mb-2 text-muted"><?= $valores[1] ?></h6>
                    <p class="card-text"><?= $valores[2] ?></p>
                  </div>
                </div>
              <?php } ?>

              <div class="row mt-5">
                <div class="col-6">
                  <a class="btn btn-lg btn-warning btn-block" href="home.php">Voltar</a>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </body>
</html>