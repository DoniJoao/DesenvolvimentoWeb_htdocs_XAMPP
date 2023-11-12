<?php 
    $usuario = $_POST["usuario"];

    $sql = "SELECT * FROM usuarios WHERE
    usuario='{$usuario}'";

$conexao = new PDO('mysql:host=127.0.0.1;dbname=sis_filmes', 'root', '');
$resultado = $conexao->query($sql);
$linha = $resultado->fetch();
$usuario_logado = $linha['usuario'];

if ($usuario_logado == null) {
    header('Location: usuario-erro.php');
}
else {
    session_start();
    $_SESSION['usuario_logado'] = $usuario_logado;
    header('Location: index2.php');
}
?>

