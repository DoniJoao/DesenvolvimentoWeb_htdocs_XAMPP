<?php 
class Filme
{
    public $id;
    public $titulo;
    public $sinopse;
    public $ano_lancamento;
    public $duracao;
    public $nota_imdb;
    public $img_cartaz;
    public $fk_diretor_id;

    public $nomeCartaz;
    public $caminhoCartaz;


    public function __construct($id = false)
    {
        if($id){
            $this->id = $id;
            $this->carregar();
        }
    }

    public function carregar()
    {
        $sql = "SELECT * FROM filme
        WHERE id=" . $this->id;
        include "classes/Filme.php";

        $resultado = $conexao->query($sql);
        $linha = $resultado->fetch();

        $this->id = $linha['id'];
        $this->titulo = $linha['titulo'];
        $this->sinopse = $linha['sinopse'];
        $this->ano_lancamento = $linha['ano_lancamento'];
        $this->duracao = $linha['duracao'];
        $this->nota_imdb = $linha['nota_imdb'];
        $this->img_cartaz = $linha['img_cartaz'];
        $this->fk_diretor_id = $linha['fk_diretor_id'];
    }

    public function inserir()
    {
        preg_match("/.(gif|bmp|png|jpg|jpeg){1}$/i", $this->img_cartaz["name"], $ext);
        $this->nomeCartaz = md5(uniqid(time())) . "." . $ext[1];
        $this->caminhoCartaz = 'img/' .
        $this->nomeCartaz;
        move_uploaded_file($this->img_cartaz["tmp_name"],
        $this->caminhoCartaz);
        $sql = "INSERT INTO filme
        (titulo, sinopse, ano_lancamento, duracao, nota_imdb, img_cartaz, fk_diretor_id) VALUES (
            '{$this->titulo}',
            '{$this->sinopse}',
            '{$this->ano_lancamento}',
            '{$this->duracao}',
            '{$this->nota_imdb}',
            '{$this->nomeCartaz}',
            '{$this->fk_diretor_id}',
            )";
        $conexao = new PDO('mysql:host=127.0.0.1;dbname=sis_filmes','root','');
        $conexao->exec($sql);

        echo "Filme Registrado com Sucesso";
    }

    public function listar()
    {
        $sql = "SELECT a.id, a.titulo, a.sinopse, a.ano_lancamento, a.duracao, a.nota_imdb, a.img_cartaz, a.fk_diretor_id
            FROM filme a JOIN diretor t
            ON a.fk_diretor_id = t.id
            ORDER BY a.id";
            
        include_once "classes/Conexao.php";
        $resultado = $conexao->query($sql);
        $lista = $resultado->fetchAll();
        return $lista;
    } 
    
    public function atualizar()
    {
        preg_match("/.(gif|bmp|png|jpg|jpeg){1}$/i", $this->img_cartaz["name"], $ext);
        $this->nomeCartaz = md5(uniqid(time())) . "." . $ext[1];
        $this->caminhoCartaz = 'img/' .
        $this->nomeCartaz;
        move_uploaded_file($this->img_cartaz["tmp_name"],
        $this->caminhoCartaz);

        $sql = "UPDATE filme (titulo, sinopse, ano_lancamento, duracao, nota_imdb, img_cartaz, fk_diretor_id) SET
             titulo= '{$this->titulo}'
             sinopse= '{$this->sinopse}'
             ano_lacamento= '{$this->ano_lancamento}'
             duracao= '{$this->duracao}'
             nota_imdb= '{$this->nota_imdb}'
             img_cartaz= '{$this->img_cartaz}'
             fk_diretor_id= '{$this->fk_diretor_id}'
        WHERE id = $this->id";
    include_once "classes/Conexao.php";
    $conexao->exec($sql);
    echo"Registro atualizado!";
    }
    public function excluir()
    {
        include_once "classes/conexao.php";
        $sql = "DELETE FROM filme
        WHERE id=".$this->id;
        $conexao->exec($sql);
    }
}
?>