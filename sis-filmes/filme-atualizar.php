<?php 
require_once "classes/Filme.php";

$id = $_GET['id'];
$filme = new Filme();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h3>Alterar filme</h3>
    <form action="filme-atualizar-gravar.php">
    <label for="titulo">Titulo:</label>
        <input type="text" name="titulo" value="<?php $filme->titulo ?>">
        <br>
        <label for="sinopse">Sinopse:</label>
        <input type="text" name="sinopse" value="<?php $filme->sinopse ?>">
        <br>
        <label for="ano_lancamento">Ano de Lançamento:</label>
        <input type="number" name="ano_lancamento" value="<?php $filme->ano_lancamento ?>">
        <br>
        <label for="duracao">Duração:</label>
        <input type="text" name="duracao" value="<?php $filme->duracao ?>">
        <br>
        <label for="nota_imdb">Nota IMDB:</label>
        <input type="text" name="nota_imdb" value="<?php $filme->nota_imdb ?>">
        <br>
        <label for="img_cartaz">Cartaz:</label>
        <input type="file" name="img_cartaz" value="<?php $filme->img_cartaz ?>">
        <br>
        <label for="fk_diretor_id">Diretor:</label>
        <input type="text" name="fk_diretor_id" value="<?php $filme->fk_diretor_id ?>">
        <br>
        <input type="submit" value="gravar">
    </form>
</body>
</html>