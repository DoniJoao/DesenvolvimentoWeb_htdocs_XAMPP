<?php

require_once "classes/Aluno.php";

$id = $_POST['id'];
$aluno = new Aluno($id);

$aluno->nome = $_POST['txtnome'];
$aluno->turma_id = $_POST['selturma'];
$aluno->email = $_POST['txtemail'];
$aluno->foto = $_FILES["imgfoto"];

$aluno->atualizar();

// Redireciona a página para a listagem de turmas
header('Location: alunos-listar.php');
?>
