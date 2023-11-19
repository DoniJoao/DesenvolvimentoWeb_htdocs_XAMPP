<?php require_once 'usuario-verifica.php'; ?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sistema Filmes</title>
</head>
<session>
    <body>
        <h1>Sistema Filmes</h1>
            <ul>
                <li>
                    <a href="filmes/filme-listar.php">Filmes</a>
                </li>
                <li>
                    <a href="diretores/diretor-listar.php">Diretores</a>
                </li>
                <li>
                    <a href="contato.html">Enviar uma Mensagem ao Desenvolvedor</a>
                </li>
            </ul>

        <a href="usuario-logout.php">Sair</a>
    </body>
</session>
</html>