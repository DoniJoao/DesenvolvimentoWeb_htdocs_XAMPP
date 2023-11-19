<?php
require_once "classes/Aluno.php";

$aluno = new Aluno();

$aluno->nome = $_POST['txtnome'];
$aluno->turma_id = $_POST['selturma'];
$aluno->email = $_POST['txtemail'];
$aluno->foto = $_FILES["imgfoto"];

$aluno->inserir();

?>