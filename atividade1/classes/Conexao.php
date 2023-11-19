<?php

class Conexao
{

  public static function Connection()
  {
    $conexao = new PDO('mysql:host=127.0.0.1;dbname=atividade1', 'root', '');
    return $conexao;
  }
}
