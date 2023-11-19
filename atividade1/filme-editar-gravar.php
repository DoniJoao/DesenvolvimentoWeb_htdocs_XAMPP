<?php
require_once "classes/Filme.php";

$id = $_POST['id'];
$filme = new Filme($id);


$filme->titulo = $_POST['titulo'];
$filme->sinopse = $_POST['sinopse'];
$filme->duracao = $_POST['duracao'];
$filme->nota_imdb = $_POST['nota_imdb'];

$filme->atualizar();

header('Location: filme-listar.php');
