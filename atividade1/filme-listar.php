<?php
require_once "classes/Filme.php";

$filme = new Filme();

$lista = $filme->listar();
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>TopFilmes</title>
</head>

<style>
  img {
    width: 80px;
  }
</style>

<body>
  <h1>Listar Filmes</h1>
  <table border="1">
    <tr>
      <th>Código</th>
      <th>Titulo</th>
      <th>Sinopse</th>
      <th>Ano Lançamento</th>
      <th>Duração</th>
      <th>Nota IMDB</th>
      <th>Imagem</th>
      <th>Diretor Id</th>
      <th>Ações</th>
    </tr>
    <?php foreach ($lista as $linha) : ?>
      <tr>
        <td><?php echo $linha['id'] ?></td>
        <td><?php echo $linha['titulo'] ?></td>
        <td><?php echo $linha['sinopse'] ?></td>
        <td><?php echo $linha['ano_lancamento'] ?></td>
        <td><?php echo $linha['duracao'] ?></td>
        <td><?php echo $linha['nota_imdb'] ?></td>
        <td><img src="<?php echo $linha['img_cartaz'] ?>"></td>
        <td><?php echo $linha['fk_diretor_id'] ?></td>
        <td>
          <a href="filme-editar.php?id=<?= $linha['id'] ?>">Atualizar</a>
          <a href="filme-excluir.php?id=<?= $linha['id'] ?>">Excluir</a>
        </td>
      </tr>
    <?php endforeach ?>
  </table>
  <br><br>
  <a href=".">Novo filme</a>
</body>

</html>