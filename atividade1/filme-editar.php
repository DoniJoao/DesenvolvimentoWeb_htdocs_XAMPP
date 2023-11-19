<?php
require_once "classes/Filme.php";

$id = $_GET['id'];

$filme = new Filme($id);
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link rel="stylesheet" href="style.css" />
  <title>TopFilmes</title>
</head>

<body>
  <h1>Atualizar filme</h1>
  <form action="filme-editar-gravar.php" method="POST" enctype="multipart/form-data">
    <input type="hidden" name="id" value="<?= $filme->id ?>">
    <label for="titulo">Titulo</label>
    <br />
    <input value="<?= $filme->titulo ?>" id="titulo" type="text" name="titulo" placeholder="Digite o titulo do filme" />
    <br /><br />
    <label for="titulo">Sinopse</label>
    <br />
    <input value="<?= $filme->sinopse ?>" id="sinopse" type="text" name="sinopse" placeholder="Digite o sinopse do filme" />
    <br /><br />
    <label for="titulo">Ano Lançamento</label>
    <br />
    <input value="<?= $filme->ano_lancamento ?>" id="ano_lancamento" type="datetime" name="ano_lancamento" placeholder="Digite o ano de lançamento do filme" />
    <br /><br />
    <label for="titulo">Duração</label>
    <br />
    <input value="<?= $filme->duracao ?>" id="duracao" type="number" name="duracao" placeholder="Digite a duração do filme" />
    <br /><br />
    <label for="titulo">Nota IMDB</label>
    <br />
    <input value="<?= $filme->nota_imdb ?>" id="nota_imdb" type="number" name="nota_imdb" step="0.1" placeholder="Digite a nota IMDB do filme" />
    <br /><br />
    <input type="submit" value="Atualizar" />
  </form>
</body>

</html>