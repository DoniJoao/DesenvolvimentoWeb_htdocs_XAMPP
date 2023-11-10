<?php

    require_once 'classes/Disciplina.php';

    $id = $_GET['id'];

    $disciplina = new Disciplina($id);

    $disciplina->excluir();

    header('Location: disciplinas-listar.php');

?>