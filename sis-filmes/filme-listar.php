<?php 
    require_once "Classes/Filme.php";
    $filme = new  Filme();
    $lista = $filme->listar();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sistema Filmes</title>
</head>
<body>
    <h1>Sistema Filmes</h1>
    <h2>Seus Filmes</h2>
    <br>
    <a href="filme-inserir.php">Novo Filme</a>
    <table border="1">
        <tr>
            <th>Titulo</th>
            <th>Sinopse</th>
            <th>Ano lançamento</th>
            <th>Duração</th>
            <th>Nota imdb</th>
            <th>Imgem Cartaz</th>
            <th>Diretor</th>
        </tr>
        <?php foreach ( $lista as $linha) : ?>
        <tr>
            <td><?php echo $linha['id'] ?></td>
            <td><img src="img/<?php echo $linha['img_cartaz'] ?>" height="85"></td>
            <td><?php echo $linha ['titulo']?></td>
            <td><?php echo $linha ['sinopse'] ?></td>
            <td><?php echo $linha ['ano_lancamento'] ?></td>
            <td><?php echo $linha ['duracao'] ?></td>
            <td><?php echo $linha ['nota_imdb'] ?></td>
            <td><?php echo $linha ['img)cartaz'] ?></td>
            <td><?php echo $linha ['diretor'] ?></td>
            <td>
                <a href="filme-alterar.php">Alterar</a>
                <a href="filme-deletar.php">Deletar</a>
            </td>
        </tr>
        <?php endforeach ?>
    </table>
    <br><br>
    <a href="index2.php">Voltar a Pagina Principal</a>
    <a href="index.php">Sair</a>
</body>
</html>