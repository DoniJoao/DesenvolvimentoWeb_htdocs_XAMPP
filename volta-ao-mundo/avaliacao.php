<?php 
    if ($_SERVER["REQUEST_METHOD"] == "POST") {

    require_once "classes/Feedback.php";
    $feedback = new Feedback();

    $feedback->nome = $_POST['nome'];
    $feedback->email = $_POST['email'];
    $feedback->nota = $_POST['nota'];
    $feedback->comentario = $_POST['comentario'];

    $logFile = "feedback.log";
    $logData = date("Y-m-d H:i:s") . " - Nome: {$feedback->nome}, Email: {$feedback->email}, Nota: {$feedback->nota}, Comentário: {$feedback->comentario}\n";
    file_put_contents($logFile, $logData, FILE_APPEND);
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" href="styles/styles.css">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>avaliacao</title>
</head>
<body class="container">
<a href="index.html">Retornar a pagina Principal</a>
</body>
</html>
