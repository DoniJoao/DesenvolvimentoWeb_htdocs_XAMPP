<?php

require_once "../classes/Diretor.php";

$diretor = new Diretor();
$lista = $diretor->listar();

require_once "../classes/Filme.php";

$id = $_GET['id'];
$filme = new Filme($id);
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h3>Alterar filme</h3>
    <form enctype="multipart/form-data" action="filme-atualizar-gravar.php" method="POST">
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
        <input type="text" name="duracao" id="">
        <br>
        <label for="nota_imdb">Nota IMDB:</label>
        <input type="text" name="nota_imdb" id="">
        <br>
        <label for="img_cartaz">Cartaz:</label>
        <input type="file" name="img_cartaz" id="">
        <br>
        <label for="">Diretor:</label>
        <select name="nome">
            <option value=''>
                Selecione
            </option>
            <?php 
            foreach ($lista as $linha):
                echo "<option value='{$linha['id']}'> {$linha['nome']} </option>";
            endforeach
             ?>
        </select>
        <br>
        <input type="submit" value="gravar">
    </form>
</body>
</html>