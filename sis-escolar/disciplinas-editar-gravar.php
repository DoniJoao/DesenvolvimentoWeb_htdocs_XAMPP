<?php

require_once "classes/Disciplinas.php";

$id = $_POST['id'];
$disciplina = new Disciplina($id);

$disciplina->disciplina = $_POST['disciplina'];
$disciplina->professor = $_POST['prof'];
$disciplina->carga = $_POST['carga'];

$aluno->atualizar();

// Redireciona a página para a listagem de turmas
header('Location: alunos-listar.php');
?>
