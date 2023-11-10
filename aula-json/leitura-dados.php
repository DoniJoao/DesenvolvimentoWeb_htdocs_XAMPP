<?php 

$url = 'dados.json';
//define a url do arquivo json

$json = file_get_contents($url);
//obtem o conteudo do arquivo json como uma string

$data = json_decode($json, true);
// decodifica a string json em um array associativo
// do php e o resultado é armazenado na variavel $data

foreach ($data as $aluno) {
    echo "<h4>- - - - - - - - - - - - - - - - - - - - - - - -</h4>";
    echo "<h4>Aluno</h4>";
    echo "Nome: {$aluno['nome']} <br>";
    echo "Turma: {$aluno['turma']} <br>";
    echo "<h4>Disciplinas:</h4>";
    
    foreach ($aluno['disciplinas'] as $disciplina) {
        echo "{$disciplina['nome']} - ";
        echo "{$disciplina['professor']} <br>";
    }
}
?>