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
    <!-- AQUI VAI A TABELA COM A LISTA DE ALUNOS, OBTIDO NO BANCO DE DADOS -->
    <br>
    <a href="alunos-inserir.php">Novo Aluno</a>
    <table border="1">
        <tr>
            <th>Código</th>
            <th>Foto</th>
            <th>Nome</th>
            <th>Email</th>
            <th>Turma</th>
            <th>Ações</th>
        </tr>
        <?php foreach ($lista as $linha): ?>
        <tr>
            <td><?php echo $linha['id'] ?></td>
            <td><img src="img/<?php echo $linha['foto'] ?>" height="60"></td>
            <td><?php echo $linha['nome'] ?></td>
            <td><?php echo $linha['email'] ?></td>
            <td><?php echo $linha['descTurma'] ?></td>
            <td>
                <a href="alunos-atualizar.php">Atualizar</a>
                <a href="alunos-excluir.php">Excluir</a>
            </td>
        </tr>
        <?php endforeach ?>
    </table>
    <br><br>
    <a href="index2.php">Voltar a pagina inicial</a>
    <a href="usuario-logout.php">Sair</a>
</body>
</html>