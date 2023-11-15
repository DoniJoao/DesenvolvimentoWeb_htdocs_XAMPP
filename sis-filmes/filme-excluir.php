<?php 
require_once 'classes/Filme.php';
$id = $_GET['id'];
$filme = new Filme($id);
$aluno->excluir();
header('Location: alunos-listar.php');
?>