<?php
// Define a classe Curso
class Curso{
    private $id;
    private $titulo;
    private $descricao;
    private $cargaHoraria;

     // Construtor da classe
    // Inicializa um novo objeto Curso com os valores fornecidos
    public function __construct($id, $titulo, $descricao, $cargaHoraria){
        $this->id = $id;
        $this->titulo = $titulo;
        $this->descricao = $descricao;
        $this->cargaHoraria = $cargaHoraria;
    }
    
         // Métodos getter para acessar os valores das propriedades
    public function getId(){
        return $this -> id;
    }

    public function getTitulo(){
        return $this -> titulo;
    }

    public function getDescricao(){
        return $this -> descricao;
    }

    public function getCargaHoraria(){
        return $this -> cargaHoraria;
    }
    
}

?>