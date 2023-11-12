<?php 
require_once "classes/Filme.php";

$filme = new Filme();

$filme->titulo = $_POST['titulo'];
$filme->sinopse = $_POST['sinopse'];
$filme->tipo = $_POST['ano_lancamento'];
$filme->numero = $_POST['duracao'];
$filme->nome = $_POST['nota_imdb'];
$filme->cpf = $_POST['img_cartaz'];
$filme->telefone = $_POST['fk_diretor_id'];
?>