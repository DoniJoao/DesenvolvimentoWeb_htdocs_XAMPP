<?php 
//Inclui o arquivo que contém a definição da classe Turma
require_once "Classes/Disciplina.php";
//Cria um novo objeto Turma
$disciplina = new Disciplina();

//Define as propriedades descTurma e ano do objeto Turma
//com os valores enviados pelo formulário
$disciplina->disciplina = $_POST['disciplina'];
$disciplina->prof = $_POST['professor'];
$disciplina->carga = $_POST['carga'];


//Chama o metodo inserir() novo objeto Turma para inserir
//os dados da nova turma no banco de dados
$disciplina->inserir();
?>