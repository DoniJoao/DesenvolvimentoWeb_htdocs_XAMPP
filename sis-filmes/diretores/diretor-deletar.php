<?php

require_once '../classes/Diretor.php';

$id = $_GET['id'];

$diretor = new Diretor($id);

$diretor->deletar();

header('Location: diretor-listar-html.php');
?>
