<?php 
Class Disciplina
{
    public $id;
    public $disciplina;
    public $carga;

    
    public function inserir()
    {
        //Define a string SQL de inserção de dados na tabela "tb_turmas"
        $sql = "INSERT INTO tb_disciplina(disciplina, carga) VALUES(
            '".$this->disciplina."' ,
            '".$this->carga."'
            )";
        //Cria uma nova conexão PDO com o banco de dados "sis-escolar"
        $conexao = new PDO('mysql:host=127.0.0.1;dbname=sis-disciplina','root','');
        //executa a
        $conexao->exec($sql);

        echo "Registro gravado com sucesso!";
    }
    public function listar()
    {
        //define a string SQL para selecionar todos os registros da tabela
        $sql = "SELECT * FROM tb_disciplina";

        //cria uma nova conexão PDO com o banco de dados "sis-escolar"
        $conexao = new PDO('mysql:host=127.0.0.1;dbname=sis-disciplina','root','');

        //executa a string SQL na conexão retornando um objeto de resultado
        $resultado = $conexao->query($sql);

        //extrai todos os registros do objeto e os armazena em um array
        $lista = $resultado->fetchAll();

        //retorna o array contendo todos os registros da tabela "tb_turmas"
        return $lista;
    }
} 
?>