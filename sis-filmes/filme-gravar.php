<?php 
require_once "classes/Filme.php";

$filme = new Filme();

$filme->titulo = $_POST['titulo'];
$filme->sinopse = $_POST['sinopse'];
$filme->ano_lancamento = $_POST['ano_lancamento'];
$filme->duracao = $_POST['duracao'];
$filme->nota_imdb = $_POST['nota_imdb'];
$filme->img_cartaz = $_FILES['img_cartaz'];
$filme->fk_diretor_id = $_POST['fk_diretor_id'];

$filme->inserir();

?>