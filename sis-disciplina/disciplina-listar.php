<?php 

    //inclui o arquivo que contem a classe turma
    require_once "classes/Disciplina.php";

    //cria um novo objeto Turma
    $turma = new Disciplina();

    //chama o metodo "listar" e armazena o resultado em uma variavel
    $lista = $disciplina->listar();
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>disciplina-listar</title>
</head>
<body>
    <h1>Sistema Disciplina</h1>
    <h3>Listar Disciplinas</h3>
    <table border="1">
        <tr>
            <th>Código</th>
            <th>disciplina</th>
            <th>carga</th>
            <th>Ações</th>
        </tr>


<?php foreach ($lista as $linha): ?>
    <tr>
        <td><?php echo $linha['id'] ?></td>
        <td><?php echo $linha['disciplina'] ?></td>
        <td><?php echo $linha['carga'] ?></td>
        <td>
            <a href="#">Atualizar</a>
            <a href="#">Excluir</a>
        </td>
    </tr>
    <?php endforeach ?>
    </table>
</body>
</html>