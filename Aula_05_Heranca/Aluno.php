<?php

require_once "Pessoa.php";
class Aluno extends Pessoa{
    private $matricula;
    private $notas = []; // notas é um array(lista)
    // lista de notas já irá iniciar vazia

    public function __construct($nome, $email, $matricula){
        // construtor da classe Pessoa
        parent:: __construct($nome, $email);
        $this->matricula = $matricula;
    }

    // adiciona a nota(numero) a lista de notas 
    public function adicionarNota($nota){
        $this->notas[] = $nota;
    }

    public function calcularMedia(){
        // verifica a quantidade de notas. Se for 0, já para a execução
        // e sai do método, não fazendo a conta
        if(count($this->notas) == 0) return 0;
        // só é calculado se tiver quantidade de notas > 0
        return array_sum($this->notas) / count($this->notas);
        // array_sum = soma todos os itens da lista de notas
        // count = pega a quantidade de itens da lista
    }

    public function verificarSituacao(){
        return $this->calcularMedia()>=7 ? "Aprovado" : "Reprovado";
        /*
            $media = $this->calcularMedia();
            if($media >=7){
                return "Aprovado";
            }else{
                return "Reprovado";
                }
        */
        // verifica se a média calculada é maior ou igual a 7
        // Se sim, retorna "Aprovado"
        // Se não "Reprovado"
    }
    
    public function exibirDadosAluno(){
        parent::exibirDadosPessoa();
        echo "Matricula: {$this->matricula} <br>";
        echo "Média: ".number_format($this->calcularMedia(), 2) . "<br>";
        echo "Situação: ".$this->verificarSituacao() . "<br><hr>";
    }
}

?>