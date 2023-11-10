<?php 
class Diretor
{
    public $id;
    public $nome;
    public $mini_bio;
    public $ano_nascimento;

    public function __construct($id, $nome, $mini_bio, $ano_nascimento)
    {
        $this->id = $id;
        $this->carregar();
    }
    public function inserir()
    {
        $sql = "INSERT INTO tb_alunos (nome, foto, email, fk_tb_turmas_id) VALUES (
            '{$this->nome}',
            '{$this->mini_bio}',
            '{$this->ano_nascimento}',
            )";
include_once "classes/conexao.php";
$conexao->exec($sql);
echo "Registro gravado com sucesso!";
    }
    public function carregar()
    {
        $sql ="SELECT*FROM diretor WHERE id=" . $this->id;
        include "classes/Conexao.php";
        $resultado = $conexao->query($sql);
        $linha = $resultado->fetch();
        $this->id = $linha["id"];
        $this->nome = $linha["nome"];
        $this->mini_bio = $linha["mini_bio"];
        $this->ano_nascimento = $linha["ano_nascimento"];
    }
    public function atualizar()
    {
        $sql = "UPDATE diretor (nome, mini_bio, ano_nascimento) SET
                   nome = '{$this->nome}',
                   foto = '{$this->mini_bio}',
                   email = '{$this->ano_nascimento}'
                WHERE id = $this->id ";
       include_once "classes/conexao.php";
       $conexao->exec($sql);
       echo "Registro gravado com sucesso!";
    }
    public function excluir()
    {
        include_once "classes/conexao.php";
        $sql = "DELETE FROM diretor
        WHERE id=".$this->id;
        $conexao->exec($sql);
    }
}
?>