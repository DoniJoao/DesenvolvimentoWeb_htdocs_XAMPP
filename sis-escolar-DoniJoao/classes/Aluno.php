<?php
class Aluno
{
    public $id;
    public $nome;
    public $foto;
    public $email;
    public $turma_id;

    public $nomeFoto;
    public $caminhoFoto;

    public function __construct($id = false)
	{
		if ($id){
            $this->id = $id;                
            $this->carregar();
        }
	}
    //AQUI CRIAREMOS A FUNÇÃO  LISTAR()
    public function listar()
	{
        $sql = "SELECT a.id, a.nome, a.foto, a.email, a.fk_tb_turmas_id, t.descTurma
                FROM tb_alunos a JOIN tb_turmas t
                ON a.fk_tb_turmas_id = t.id
                ORDER BY a.id";

        include_once "classes/conexao.php";
        $resultado = $conexao->query($sql);
        $lista = $resultado->fetchAll();
        return $lista;
	}
    //AQUI CRIAMOS A FUNÇÃO INSERIR()
    public function inserir()
    {
        // a função do php "preg_match()", pega a extensão da imagem e carrega na variavel $ext
         preg_match("/.(gif|bmp|png|jpg|jpeg){1}$/i", $this->foto["name"], $ext);

         /* esta linha usa as funções php md5(), uniqid() e time()
         para gerar um nome unico para a imagem. depois concatena com a extensão extraida na linha acima */
         $this->nomeFoto = md5(uniqid(time())) . "." . $ext[1];

         //esta linha concatena o caminho da pasta que guardaremos as imagens com nome da imagem
         $this->caminhoFoto = 'img/' . $this->nomeFoto;

         //aqui utilizamos a função php move_upload_file() para salvar a imagem na pasta
         move_uploaded_file($this->foto["tmp_name"], $this->caminhoFoto);

         //aqui criamos o comando SQL para inserir os dados na tabela de alunos
        $sql = "INSERT INTO tb_alunos (nome, foto, email, fk_tb_turmas_id) VALUES (
                    '{$this->nome}',
                    '{$this->nomeFoto}',
                    '{$this->email}',
                    '{$this->turma_id}'
                    )";
        include_once "classes/conexao.php";
        $conexao->exec($sql);
        echo "Registro gravado com sucesso!";
    }
    //AQUI CRIAMOS A FUNÇÃO CARREGAR()
    public function carregar()
    {
        // query SQL para buscar o aluno no banco de dados pelo id
        $sql = "SELECT * FROM tb_alunos WHERE id=" . $this->id;
        include "classes/conexao.php";

        //execução da query e armazenamento do resultado em uma variavel
        $resultado = $conexao->query($sql);
        //recuperação da primeira linha do resultado como um array associativo
        $linha = $resultado->fetch();

        //Atribuição dos valores dos campos da turma recuperados do banco às prorpiedades do objeto
        $this->id = $linha['id'];
        $this->nome = $linha['nome'];
        $this->foto = $linha['foto'];
        $this->email = $linha['email'];
        $this->turma_id = $linha['fk_tb_turmas_id'];
    }
    //AQUI CRIAMOS A FUNÇÃO ATUALIZAR()
    public function atualizar()
{
    // a função do php "preg_match()", pega a extensão da imagem e carrega na variavel $ext
    preg_match("/.(gif|bmp|png|jpg|jpeg){1}$/i", $this->foto["name"], $ext);

    /* esta linha usa as funções php md5(), uniqid() e time()
    para gerar um nome unico para a imagem. depois concatena com a extensão extraida na linha acima */
    $this->nomeFoto = md5(uniqid(time())) . "." . $ext[1];

    // esta linha concatena o caminho da pasta que guardaremos as imagens com nome da imagem
    $this->caminhoFoto = 'img/' . $this->nomeFoto;

    // aqui utilizamos a função php move_upload_file() para salvar a imagem na pasta
    move_uploaded_file($this->foto["tmp_name"], $this->caminhoFoto);

    $sql = "UPDATE tb_alunos SET
               nome = '{$this->nome}',
               foto = '{$this->nomeFoto}',
               email = '{$this->email}',
               fk_tb_turmas_id = '{$this->turma_id}'
            WHERE id = {$this->id}";

    include_once "classes/conexao.php";
    $conexao->exec($sql);
    echo "Registro atualizado com sucesso!";
}

    //AQUI CRIAMOS A FUNÇÃO EXCLUIR()
    public function excluir()
    {
        include_once "classes/conexao.php";
        // Define a string de consulta SQL para deletar um registro
        $sql = "DELETE FROM tb_alunos WHERE id=".$this->id;
        // Executa a instrução SQL de exclusão utilizando o método
        // "exec" do objeto de conexão PDO criado acima
        $conexao->exec($sql);
    }
}
