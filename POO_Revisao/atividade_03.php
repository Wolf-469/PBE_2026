<?php

class Filme{
    private $titulo;
    private $genero;
    private $duracao;
    private $assistido;

    public function __construct($titulo, $genero, $duracao,$assistido = false){
        $this->titulo = $titulo;
        $this->genero = $genero;
        $this->duracao = $duracao;
        $this->assistido = true;
    }

    public function MarcarComoAssistido(){
        $this->$assistido = true;
    }
    return "Não foi assistido";

    public function foiAssistido(){
        echo "O filme $this->titulo O filme  foi assistido $this->duracao";
    }
}
$filme1 = new Filme ('Matrix', 'Ficção', '145min',"Não");
echo "<pre>";
print_r($filme);
echo "<pre>";

$filme1 = "Não assistido";

$filme = new Filme('Harry Potter', 'Ficção', '200min','Sim');
echo "<pre>";
print_r($filme);
echo "<pre>";

$filme2 = "Assistido";
?>