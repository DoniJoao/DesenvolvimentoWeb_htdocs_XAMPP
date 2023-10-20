<!DOCTYPE html>
<html lang="pt-br">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Sistema Acadêmico</title>
  </head>
  <body>
    <?php 
        //verifica se o usuario tem SESSION de login
        require_once 'usuario-verifica.php';
    ?>

    <h1>Sistema Acadêmico</h1>
    <ul>
      <li><a href="#">Alunos</a></li>
      <li><a href="turmas-listar.php">Turmas</a></li>
      <li><a href="#">Disciplinas</a></li>
    </ul>
    <a href="index.html">sair</a>
  </body>
</html>
