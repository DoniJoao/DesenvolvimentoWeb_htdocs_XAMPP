<?php

require_once 'classes/Filme.php';

$id = $_GET['id'];

$filme = new Filme($id);

$filme->excluir();

// Redireciona o usuário para a página "turmas-listar.php"
header('Location: filme-listar.php');
