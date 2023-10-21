<?php
class Aluno
{
    public $id;
    public $nome;
    public $turma_id;

    public function __construct($id = false)
	{
		if ($id){
            $this->id = $id;                
            $this->carregar();
        }
	}

    public function inserir()
    {
        $sql = "INSERT INTO tb_alunos (nome, turma_id) VALUES (
                    '{$this->nome}',
                    '{$this->turma_id}')";
        include_once "classes/conexao.php";
        $conexao->exec($sql);
        echo "Registro gravado com sucesso!";
    }

    public function listar()
	{
        $sql = "SELECT a.id, a.nome, a.turma_id, t.descTurma
                FROM tb_alunos a JOIN tb_turmas t
                ON a.turma_id = t.id
                ORDER BY a.id";

        include_once "classes/conexao.php";
        $resultado = $conexao->query($sql);
        $lista = $resultado->fetchAll();
        return $lista;
	}

}
