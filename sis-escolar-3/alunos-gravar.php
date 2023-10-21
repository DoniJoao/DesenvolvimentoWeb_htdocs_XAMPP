<?php
require_once "classes/Aluno.php";

$aluno = new Aluno();

$aluno->nome = $_POST['txtnome'];
$aluno->turma_id = $_POST['selturma'];

$aluno->inserir();
?>