<?php
require_once "classes/Diretor.php";
require_once "classes/Filme.php";

$diretor = new Diretor();
$filme = new Filme();

$diretor->nome = $_POST['nome_diretor'];
$diretor->minibio = $_POST['minibio_diretor'];
$diretor->ano_nascimento = $_POST['ano_nascimento_diretor'];

$filme->titulo = $_POST["titulo"];
$filme->sinopse = $_POST["sinopse"];
$filme->ano_lancamento = $_POST["ano_lancamento"];
$filme->duracao = $_POST["duracao"];
$filme->nota_imdb = $_POST["nota_imdb"];
$filme->img_cartaz = $_FILES["img_cartaz"];

$diretorId = $diretor->obterIdPorNome($_POST['nome_diretor']);

if (!$diretorId) {
  $diretorId = $diretor->inserir();
}

$filme->diretorId = $diretorId;
$filme->inserir();
