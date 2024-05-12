<?php
require_once 'Usuario.php';

/**
 * Classe Docente que estende Usuario.
 * Representa um docente no sistema.
 */
class Docente extends Usuario {
    private $departamento; // Departamento acadêmico ao qual o docente está associado

    /**
     * Construtor da classe Docente.
     * @param int $id Identificador único do usuário.
     * @param string $nome Nome completo do usuário.
     * @param string $email Email do usuário.
     * @param string $departamento Departamento acadêmico do docente.
     */
    public function __construct($id, $nome, $email, $departamento) {
        parent::__construct($id, $nome, $email);
        $this->departamento = $departamento;
    }

    /**
     * Obtém o departamento do docente.
     * @return string Departamento acadêmico.
     */
    public function getDepartamento() {
        return $this->departamento;
    }

    /**
     * Representação em string do objeto Docente.
     * @return string Uma string representando o docente.
     */
    public function __toString() {
        return parent::__toString() . ", Departamento: {$this->departamento}";
    }
}
?>
