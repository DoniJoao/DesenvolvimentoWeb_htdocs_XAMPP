<?php
require_once "classes/Conexao.php";

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
    public $nomeFoto;
    public $caminhoFoto;

    public function __construct($id = false)
    {
        if ($id) {
            $this->id = $id;
            $this->carregar();
        }
    }

    public function carregar()
    {
        $sql = "SELECT * FROM filme WHERE id=" . $this->id;
        $conexao = Conexao::Connection();

        $resultado = $conexao->query($sql);
        $linha = $resultado->fetch();

        $this->id = $linha['id'];
        $this->titulo = $linha['titulo'];
        $this->sinopse = $linha['sinopse'];
        $this->ano_lancamento = $linha['ano_lancamento'];
        $this->duracao = $linha['duracao'];
        $this->nota_imdb = $linha['nota_imdb'];
        $this->img_cartaz = $linha['img_cartaz'];
        $this->diretorId = $linha['fk_diretor_id'];
    }

    public function listar()
    {
        $sql = "SELECT f.id, f.titulo, f.sinopse, f.ano_lancamento, f.duracao, f.nota_imdb, f.img_cartaz, f.fk_diretor_id FROM filme f
        JOIN diretor d ON d.id = f.fk_diretor_id
        ORDER BY f.id";
        $conexao = Conexao::Connection();
        $resultado = $conexao->query($sql);
        $lista = $resultado->fetchAll();
        return $lista;
    }

    public function inserir()
    {
        preg_match("/.(gif|bmp|png|jpg|jpeg){1}$/i", $this->img_cartaz["name"], $ext);

        $this->nomeFoto = md5(uniqid(time())) . "." . $ext[1];
        $this->caminhoFoto = 'img/' . $this->nomeFoto;
        move_uploaded_file($this->img_cartaz["tmp_name"], $this->caminhoFoto);

        $sql = "INSERT INTO filme (titulo, sinopse, ano_lancamento, duracao, nota_imdb, img_cartaz, fk_diretor_id) VALUES (
            '{$this->titulo}',
            '{$this->sinopse}',
            '{$this->ano_lancamento}',
            '{$this->duracao}',
            '{$this->nota_imdb}',
            '{$this->caminhoFoto}',
            '{$this->diretorId}'
            )";

        $conexao = Conexao::Connection();
        $conexao->exec($sql);

        echo "Registro gravado com sucesso";

        header('Refresh: 2; URL=filme-listar.php');
    }

    public function excluir()
    {
        $sql = "DELETE FROM filme WHERE id=" . $this->id;

        $conexao = Conexao::Connection();
        $conexao->exec($sql);
    }

    public function atualizar()
    {
        $sql = "UPDATE filme SET
                    titulo = '$this->titulo' ,
                    sinopse = '$this->sinopse' ,
                    duracao = '$this->duracao' ,
                    nota_imdb = '$this->nota_imdb'
                WHERE id = $this->id ";
        $conexao = Conexao::Connection();
        $conexao->exec($sql);
    }
}
