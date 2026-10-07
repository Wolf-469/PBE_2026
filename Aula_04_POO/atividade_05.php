<?php

class Livro{
    public $titulo;
    public $autor;
    public $paginas;
    public $ano_publicacao;

    public function __construct($titulo, $autor, $paginas, $ano_publicacao){
        $this->titulo = $titulo;
        $this->autor = $autor;
        $this->paginas = $paginas;
        $this->ano_publicacao = $ano_publicacao;
    }

    public function exibirDetalhes(){
        echo "Título: $this->titulo, Autor: $this->autor, Páginas, Publicacao";
        echo "<hr>";
    }
}

$livro = new Livro("Programação", "Leonardo", 200, 2026);
$livro->exibirDetalhes();

$livro2 = new Livro("HTML", "Leonardo",10);
$livro2->exibirDetalhes();



?>