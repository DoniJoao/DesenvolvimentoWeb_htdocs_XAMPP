<?php 
require "Conexao.php";
class Filme
{
    public $id;
    public $titulo;
    public $sinopse;
    public $ano_lancamento;
    public $duracao;
    public $nota_imdb;
    public $img_cartaz;
    public $diretorId;

    public $nomeCartaz;
    public $caminhoCartaz;


    public function __construct($id = false)
    {
        if($id){
            $this->id = $id;
            $this->carregar();
        }
    }

    public function inserir()
    {
        preg_match("/.(gif|bmp|png|jpg|jpeg){1}$/i", $this->img_cartaz["name"], $ext);

        $this->nomeCartaz = md5(uniqid(time())) . "." . $ext[1];

        $this->caminhoCartaz = '../img/' . $this->nomeCartaz;

        move_uploaded_file($this->img_cartaz["tmp_name"], $this->caminhoCartaz);
        
        $sql = "INSERT INTO filme
        (img_cartaz, titulo, sinopse, ano_lancamento,nota_imdb, duracao, fk_diretor_id) VALUES (
            '{$this->nomeCartaz}',
            '{$this->titulo}',
            '{$this->sinopse}',
            '{$this->ano_lancamento}',
            '{$this->duracao}',
            '{$this->nota_imdb}',
            '{$this->diretorId}'
            )";
        $conexao = Conexao::Connection();

        $conexao->exec($sql);

        echo "Filme Registrado com Sucesso";
        header("refresh:3; URL= alunos-listar.php");
    }

    public function carregar()
    {
        $sql = "SELECT * FROM filme WHERE id=" . $this->id;
        $conexao = Conexao::Connection();

        $resultado = $conexao->query($sql);

        $linha = $resultado->fetch();

        $this->id = $linha['id'];
        $this->img_cartaz = $linha['img_cartaz'];
        $this->titulo = $linha['titulo'];
        $this->sinopse = $linha['sinopse'];
        $this->ano_lancamento = $linha['ano_lancamento'];
        $this->nota_imdb = $linha['nota_imdb'];
        $this->duracao = $linha['duracao'];
        $this->diretorId = $linha['fk_diretor_id'];
    }

    public function listar()
    {
        $sql = "SELECT a.id, a.img_cartaz, a.titulo, a.sinopse, a.ano_lancamento, a.nota_imdb, a.duracao, a.fk_diretor_id, t.nome
            FROM filme a JOIN diretor t
            ON a.fk_diretor_id = t.id
            ORDER BY a.id";
            
        $conexao = Conexao::Connection();
        $resultado = $conexao->query($sql);
        $lista = $resultado->fetchAll();
        return $lista;

    } 
    
    public function atualizar()
    {
        $sql = "UPDATE filme SET
             titulo= '$this->titulo',
             sinopse= '$this->sinopse',
             ano_lancamento= '$this->ano_lancamento',
             nota_imdb= '$this->nota_imdb',
             duracao= '$this->duracao',
        WHERE id = $this->id";

    $conexao = Conexao::Connection();
    $conexao->exec($sql);
    echo"Registro atualizado!";
    }

    public function excluir()
    {
        $this->carregar();

        $sql = "DELETE FROM filme
        WHERE id=" . $this->id;

        $conexao = Conexao::Connection();
        
        $conexao->exec($sql);
    }

}
?>