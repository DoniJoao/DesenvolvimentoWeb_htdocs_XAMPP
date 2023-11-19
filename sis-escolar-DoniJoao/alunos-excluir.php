<?php
// Inclui o arquivo que contém a definição da classe
require_once 'classes/Aluno.php';

// Obtém o valor do parâmetro "id" da URL e armazena em variável
$id = $_GET['id'];

// Cria um novo objeto Aluno
$aluno = new Aluno($id);

// Chama o método "excluir" do objeto
$aluno->excluir();

// Redireciona o usuário para a página
header('Location: alunos-listar.php');
?>