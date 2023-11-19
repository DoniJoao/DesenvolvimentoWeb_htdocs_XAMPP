<?php 
require_once '../usuario-verifica.php';

require_once "../classes/Diretor.php";
$diretor = new Diretor();
$lista = $diretor->listar();
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h3>Listando Diretores</h3>
    <table border="1">
        <tr>
            <th>Id</th>
            <th>nome</th>
            <th>miniBio</th>
            <th>ano de nascimento</th>
            <th>Ações</th>
        </tr>
        <?php foreach ($lista as $linha): ?>
            <tr>
                <td><?php echo $linha['id'] ?></td>
                <td><?php echo $linha ['nome'] ?></td>
                <td><?php echo $linha ['mini_bio'] ?></td>
                <td><?php echo $linha ['ano_nascimento'] ?></td>
                <td>
                    <a href="./diretor-editar.php?id=<?= $linha['id'] ?>">Editar</a>
                    <a href="./diretor-deletar.php?id=<?= $linha ['id'] ?>">Deletar</a>
                </td>
            </tr>
            <?php endforeach ?>
    </table>
    <a href="./diretor-inserir.html">Adicionar diretor</a>
    <br>
    <a href="../index2.php">Voltar a pagina principal</a>
</body>
</html>