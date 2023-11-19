<?php 
require_once "../classes/Diretor.php";

$id = $_POST['id'];
$diretor = new Diretor($id);

$diretor->nome = $_POST['nome'];
$diretor->mini_bio = $_POST['mini_bio'];
$diretor->ano_nascimento = $_POST['ano_nascimento'];

$diretor->editar();

header('Location: diretor-listar.php');
?>