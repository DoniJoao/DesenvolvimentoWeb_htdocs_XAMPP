<?php
    require_once "classes/Disciplina.php";
    $id = $_GET['id'];
    $disciplina = new Disciplina($id);
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Sistema Acadêmico</title>
</head>
<body>
    <h1>Sistema Acadêmico</h1>
    <h3>Editar Disciplina</h3>
    <form action="disciplinas-gravar.php" method="POST">
      <label for="disciplina">Disciplina:</label>
      <input type="text" name="disciplina" />
      <br /><br />
      <label for="prof">Professor:</label>
      <input type="text" name="professor" />
      <br /><br />
      <label for="carga">carga horaria:</label>
      <input type="number" name="carga" />
      <br /><br />
      <input type="submit" id="Gravar" />
    </form>
</body>
</html>