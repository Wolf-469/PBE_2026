<?php

class Funcionario{
    private $nome;
    private $salario;

    public function __construct ($nome, $salario = 1000){
        $this->nome = $nome;
        $this->salario = $salario;
  }

    public function aumentoSalario($percentual){
        if($percentual > 0 && $percentual <= 10){
            $total_aumento = $this->salario * ($percentual/100);
            $this ->salario = $this->salario + $total_aumento;
        }else{
            echo "Percentual de aumento incorreto, o valor precisa estar entre 0 e 10";
        }
    }
    
    public function exibirSalario(){
        echo "Funcionário : $this->nome - Salário R$".
            number_format($this->salario,2,' ,','.');
    }
}

$func = new Funcionario("Carlos",300);
$func->aumentoSalario(10);
$func->exibirSalario();
?>