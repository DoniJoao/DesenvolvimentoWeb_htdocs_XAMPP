<?php 
Class Disciplina
{
    public $id;
    public $disciplina;
    public $prof;
    public $carga;

    public function __construct($id = false)
    {
        if ($id){
            $this->id = $id;
            $this->carregar();
        }
        
    }

    public function carregar(){
    
        $sql ="SELECT * FROM tb_disciplinas WHERE id=" .
        $this->id;
        $conexao = new PDO('mysql:host=127.0.0.1;dbname=sis-escolar2','root','');
        $resultado = $conexao->query($sql);
        $lista = $resultado->fetchAll();
    }

    public function inserir()
    {
        $sql = "INSERT INTO tb_disciplinas(disciplina, prof, carga) VALUES(
            '{$this->disciplina}',
            '{$this->prof}',
            '{$this->carga}'
            )";
        $conexao = new PDO('mysql:host=127.0.0.1;dbname=sis-escolar2','root','');
        $conexao->exec($sql);

        echo "Registro gravado com sucesso!";
    }

    public function listar()
    {
        $sql = "SELECT * FROM tb_disciplinas";

        $conexao = new PDO('mysql:host=127.0.0.1;dbname=sis-escolar2','root','');
        $resultado = $conexao->query($sql);
        $lista = $resultado->fetchAll();
        return $lista;
    }
    
    public function atualizar()
    {
        $sql = "UPDATE tb_disciplinas SET 
            disciplina = '$this->disciplina',
            prof = '$this->prof',
            carga = '$this->carga'                   
        WHERE id = $this->id ";

        $conexao = new PDO('mysql:host=127.0.0.1;dbname=sis-escolar2', 'root', '');
        $conexao->exec($sql);
    }

    public function excluir()
    {
        $sql = "DELETE FROM tb_disciplinas WHERE id=".$this->id;

        $conexao = new PDO('mysql:host=127.0.0.1;dbname=sis-escolar2','root','');

        $conexao->exec($sql);
    }
} 
?>