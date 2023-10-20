<?php 
class usuario{
    private $nome;
    private $idade;
    private $email;

    

    public function __construct($nome, $idade=null, $email=null)
    {
        $this->nome = $nome;
        $this->idade = $idade;
        $this->email = $email;
    }
}
?>