<?php require_once '../usuario-verifica.php'; ?>

<?php 
require_once "../classes/Filme.php";

$filme = new Filme();

$filme->titulo = $_POST['titulo'];
$filme->sinopse = $_POST['sinopse'];
$filme->ano_lancamento = $_POST['ano_lancamento'];
$filme->duracao = $_POST['duracao'];
$filme->nota_imdb = $_POST['nota_imdb'];
$filme->img_cartaz = $_FILES["imgcartaz"];
$filme->diretorId = $_POST['nome'];

$filme->inserir();
header('Location: filme-listar.php');
?>