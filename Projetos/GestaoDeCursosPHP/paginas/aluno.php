<?php
require_once 'Usuario.php';

/**
 * Classe Aluno que estende Usuario.
 * Representa um aluno específico no sistema.
 */
class Aluno extends Usuario {
    private $curso; // Nome do curso que o aluno está matriculado

    /**
     * Construtor da classe Aluno.
     * @param int $id Identificador único do usuário.
     * @param string $nome Nome completo do usuário.
     * @param string $email Email do usuário.
     * @param string $curso Nome do curso do aluno.
     */
    public function __construct($id, $nome, $email, $curso) {
        parent::__construct($id, $nome, $email);
        $this->curso = $curso;
    }

    /**
     * Obtém o nome do curso do aluno.
     * @return string Nome do curso.
     */
    public function getCurso() {
        return $this->curso;
    }

    /**
     * Representação em string do objeto Aluno.
     * @return string Uma string representando o aluno.
     */
    public function __toString() {
        return parent::__toString() . ", Curso: {$this->curso}";
    }
}
?>
