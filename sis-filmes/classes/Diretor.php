<?php 

require_once "Conexao.php";
class Diretor
{
    public $conexao;
    public $id;
    public $nome;
    public $mini_bio;
    public $ano_nascimento;

    public function __construct($id = false)
    {
        if ($id) {
            $this->id = $id;
            $this->carregar();
        }
    }

    public function obterIdPorNome($nome)
    {
        $sql = "SELECT id FROM diretor WHERE nome='" . $nome . "'";

        $conexao = Conexao::Connection();

        $resultado = $conexao->query($sql);

        $linha = $resultado->fetch(PDO::FETCH_ASSOC);

        if ($linha) {
            return $linha['id'];
        } else {
            return null;
        }
    }

    public function inserir()
    {
        $sql = "INSERT INTO diretor (nome, mini_bio, ano_nascimento) VALUES (
            '" . $this->nome ."',
            '" . $this->mini_bio ."',
            '" . $this->ano_nascimento ."'
            )";

            $conexao = Conexao::Connection();

            $conexao->exec($sql);

            return $conexao->lastInsertId();
    }

    public function carregar()
    {
        $sql ="SELECT * FROM diretor WHERE id=" . $this->id;

        $conexao = Conexao::Connection();
        $resultado = $conexao->query($sql);
        $linha = $resultado->fetch();

        $this->nome = $linha["nome"];
        $this->mini_bio = $linha["mini_bio"];
        $this->ano_nascimento = $linha["ano_nascimento"];
    }

    public function listar()
    {
        $sql = "SELECT * FROM diretor";

        $conexao = Conexao::Connection();
        $resultado = $conexao->query($sql);
        $lista = $resultado->fetchAll();

        return $lista;
    }

    public function editar()
    {
        $sql = "UPDATE diretor SET
            nome = '$this->nome',
            mini_bio = '$this->mini_bio',
            ano_nascimento = '$this->ano_nascimento'

        WHERE id = $this->id";

        $conexao = Conexao::Connection();
        $conexao->exec($sql);
        echo "Registro gravado com sucesso!";
    }

    public function deletar()
    {
        $sql = "DELETE FROM diretor
        WHERE id=".$this->id;

        $conexao = Conexao::Connection();
        $conexao->exec($sql);
    }

}

?>