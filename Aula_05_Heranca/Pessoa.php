<?php

class Pessoa{
    protected $nome;
    protected $email;

    public function __construct($nome,$email){
        $this->nome = $nome;
        $this->email = $email;
    }
    // metodo que busca e retorna o nome do objeto
    public function getNome(){
        return $this->nome;
    }

    // metodo que atualiza o nome
    public function stNome($nome){
        $this->nome = $nome;
    }

    // metodo que busca e retorna o email do objeto
    public function getEmail($email){
        return $this->email;
    }

    // metodo para atualizar o email
    public function stEmail($email){
        $this->email = $email;
    }

    //metodo para exibir todos os dados
    // normalmente chamado de toString()
    public function exibirDadosPessoa(){
        echo "Nome: $this->nome <br> Email: $this->email <br>";
    }
}
?>