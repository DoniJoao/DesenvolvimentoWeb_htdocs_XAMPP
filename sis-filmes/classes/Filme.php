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
            '{$this->img_cartaz}',
            '{$this->fk_diretor_id}',
            )";
        include_once"classes/Conexao.php";
        $conexao->exec($sql);
        echo "Filme Registrado com Sucesso";
    }
    public function carregar()
    {

    }


}
?>