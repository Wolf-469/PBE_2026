<?php

class Aluno {
    private string $nome;
    private string $turma;
    private float $nota1;
    private float $nota2;
    private float $nota3;
    private int $faltas;

    public function __construct(string $nome, string $turma, float $nota1, float $nota2, float $nota3, int $faltas) {
        $this->nome = $nome;
        $this->turma = $turma;
        $this->nota1 = $nota1;
        $this->nota2 = $nota2;
        $this->nota3 = $nota3;
        $this->faltas = $faltas;
    }

    // Getters
    public function getNome(): string {
        return $this->nome;
    }

    public function getTurma(): string {
        return $this->turma;
    }

    public function getNota1(): float {
        return $this->nota1;
    }

    public function getNota2(): float {
        return $this->nota2;
    }

    public function getNota3(): float {
        return $this->nota3;
    }

    public function getFaltas(): int {
        return $this->faltas;
    }

    // Métodos de cálculo
    public function calcularMedia(): float {
        return ($this->nota1 + $this->nota2 + $this->nota3) / 3;
    }

    public function calcularFrequencia(): float {
        return ((80 - $this->faltas) / 80) * 100;
    }

    public function verificarSituacao(): string {
        $frequencia = $this->calcularFrequencia();
        $media = $this->calcularMedia();

        // Regra 1: Frequência menor que 75% reprova direto
        if ($frequencia < 75) {
            return "Reprovado por falta";
        }

        // Regra 2: Média maior ou igual a 7
        if ($media >= 7) {
            return "Aprovado";
        }

        // Regra 3: Média maior ou igual a 5
        if ($media >= 5) {
            return "Recuperação";
        }

        // Regra 4: Média menor que 5
        return "Reprovado";
    }
}
