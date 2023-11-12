<?php 
class Feedback
{
    public $id;
    public $nome;
    public $email;
    public $nota;
    public $comentario;

    public function __construct($id = false)
    {
        if ($id) {
            $this->id = $id;
            $this->carregar();
        }
    }
    public function inserir()
    {
        $sql = "INSERT INTO feedback
        (nome, email, nota, comentario) VALUES (
            '{$this->nome}',
            '{$this->email}',
            '{$this->nota}',
            '{$this->comentario}'
        )";
        include_once "classes/conexao.php";
        $conexao->exec($sql);
        echo "Nota gravada com sucesso!";
    }

    public function carregar()
    {
        $sql = "SELECT * FROM feedback
        WHERE id=" . $this->id;
        include "classes/conexao.php";

        $resultado = $conexao->query($sql);
        $linha = $resultado->fetch();
        $this->id = $linha['id'];
        $this->nome = $linha['nome'];
        $this->email = $linha['email'];
        $this->nota = $linha['nota'];
        $this->comentario = $linha['comentario'];
    }

    public function atualizar()
    {
        $sql = "UPDATE feeedback (
            nome, email, nota, comentario
        ) SET
        nome = '{$this->nome}',
        email = '{$this->email}',
        nota = '{$this->nota}',
        comentario = '{$this->comentario}'
        WHERE id = $this->id";
        include_once "classes/conexao.php";
        $conexao->exec($sql);
        echo"Nota Atualizado";
    }
    public function excluir()
    {
        include_once "classes/conexao.php";
        $sql = "DELETE FROM feedback
        WHERE id=".$this->id;
        $conexao->exec($sql);
    }
}
?>