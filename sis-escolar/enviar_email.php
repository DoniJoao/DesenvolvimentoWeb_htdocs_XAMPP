<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nome = $_POST["nome"];
    $email = $_POST["email"];
    $mensagem = $_POST["mensagem"];

    $destinatario = "jpedrow1@outlook.com";
    $assunto = "Nova mensagem do site de $nome";

    $headers = "De: $email\r\n";

    PHPMailer ::mail($assunto, $mensagem, $headers);

    mail($destinatario, $assunto, $mensagem, $headers);

    // Redirecionar para uma página de confirmação, por exemplo:
    header("Location: confirmacao.html");
}
?>
