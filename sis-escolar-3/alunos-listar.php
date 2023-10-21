<?php
    require_once "classes/Aluno.php";
    $aluno = new Aluno();
    $lista = $aluno->listar();
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Sistema Acadêmico</title>
</head>
<body>
    <h1>Sistema Acadêmico</h1>
    <h3>Listar Alunos</h3>
    <table border="1">
        <tr>
            <th>Código</th>
            <th>Nome</th>
            <th>Turma</th>
            <th>Ações</th>
        </tr>
        <?php foreach ($lista as $linha): ?>
        <tr>
            <td><?php echo $linha['id'] ?></td>
            <td><?php echo $linha['nome'] ?></td>
            <td><?php echo $linha['descTurma'] ?></td>
            <td>
                <a href="#">Atualizar</a>
                <a href="#">Excluir</a>
            </td>
        </tr>
        <?php endforeach ?>
    </table>
    <br><br>
    <a href="alunos-inserir.php">Novo Aluno</a>
</body>
</html>