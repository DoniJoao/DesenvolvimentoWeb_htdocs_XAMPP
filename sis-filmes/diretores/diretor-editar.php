<?php

require_once "../classes/Diretor.php";

$id = $_GET['id'];
$diretor = new Diretor();

?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Sistema Filmes</title>
</head>
<body>
    <form action="./diretor-editar-gravar.php" method="post">
    <input type="hidden" name="id" value="<?= $diretor->id ?>">
      <label for="nome">Nome:</label>
      <input type="text" name="nome" value="<?=$diretor->nome ?>" />
      <br />
      <label for="mini_bio">Mini bio</label>
      <input type="textarea" name="mini_bio" value="<?=$diretor->mini_bio ?>" />
      <br />
      <label for="ano_nascimento">Ano de Nascimento</label>
      <input type="number" name="ano_nascimento" value="<?=$diretor->ano_nascimento ?>" />
      <br />
      <input type="submit" name="Gravar" />
    </form>
</body>
</html>