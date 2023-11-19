<?php 
require_once "../classes/Diretor.php";

$diretor = new Diretor();

$diretor->nome = $_POST['nome'];
$diretor->mini_bio = $_POST['mini_bio'];
$diretor->ano_nascimento = $_POST['ano_nascimento'];

$diretor->inserir();
header('Location: diretor-listar.php');
?>