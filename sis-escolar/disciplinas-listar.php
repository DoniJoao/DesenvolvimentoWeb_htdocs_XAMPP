<?php 
require_once 'usuario-verifica.php';
?>
<?php 
    require_once "classes/Disciplina.php";
    $disciplina = new Disciplina();
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
    <div id="disciplinas">

    </div>
    <table border="1">
        <tr>
            <th>Código</th>
            <th>disciplina</th>
            <th>professor</th>
            <th>carga</th>
            <th>Ações</th>
        </tr>

        <tbody>
            <?php foreach ($lista as $linha): ?>
            <tr>
                <td><?php echo $linha['id'] ?></td>
                <td><?php echo $linha['disciplina'] ?></td>
                <td><?php echo $linha['prof'] ?></td>
                <td><?php echo $linha['carga'] ?></td>
                <td>
                    <a href="disciplinas-editar.php?id=<?=$linha['id'] ?>">Atualizar</a>
                    <a href="disciplinas-excluir.php?id=<?=$linha['id'] ?>">Excluir</a>
                </td>
            </tr>
            
            <?php endforeach ?>
        </tbody>
    </table>
    <br>
    <div>
        <input type="file" id="jsonFile" accept=".json">
        <button id="importButton">Importar JSON</button>
    </div>
    <div>
        <form action="upload.php" method="post" enctype="multipart/form-data">
        

            <label for="file">Choose a file to upload:</label>
            <input type="file" id="fileInput" accept=".json">
            <input type="submit" value="Upload File">
        </form>
    </div>

    <div>
        <a href="disciplinas-inserir.html">Nova Disciplina</a>
        <br>
        <a href="index2.php">Voltar</a>
    </div>

    <script>
        
    </script>
</body>
</html>