<?php 
    require_once "classe/Filme.php";
    $filme = new Filme();
    $lista = $filme->listar();
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sistema Filmes</title>
</head>
<body>
    <h1>Seus Filmes</h1>
    <h2>Novo Filme</h2>
    <br>
    <form enctype="multipart/form-data" action="filme-gravar.php" method="POST">
        <label for="titulo">Titulo:</label>
        <input type="text" name="titulo">
        <br>
        <label for="sinopse">Sinopse:</label>
        <input type="text" name="sinopse" id="">
        <br>
        <label for="ano_lancamento">Ano de Lançamento:</label>
        <input type="number" name="ano_lancamento" id="">
        <br>
        <label for="duracao">Duração:</label>
        <input type="number" name="duracao" id="">
        <br>
        <label for="nota_imdb">Nota IMDB:</label>
        <input type="number" name="nota_imdb" id="">
        <br>
        <label for="img_cartaz">Cartaz:</label>
        <input type="file" name="img_cartaz" id="">
        <br>
        <label for="fk_diretor_id">Diretor:</label>
        <input type="text" name="fk_diretor_id" id="">
        <br>
        <input type="submit" value="gravar">
    </form>
    <br>
    <a href="index2.php">Voltar a Pagina inicial</a>
</body>
</html>