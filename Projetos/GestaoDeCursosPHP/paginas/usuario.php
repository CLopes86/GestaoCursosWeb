<?php
/**
 * Classe base para representar um usuário genérico no sistema.
 * Contém propriedades e métodos comuns a todos os tipos de usuários.
 */
class Usuario {
    protected $id;      // Identificador único do usuário
    protected $nome;    // Nome completo do usuário
    protected $email;   // Email do usuário

    /**
     * Construtor da classe Usuario.
     * @param int $id Identificador único do usuário.
     * @param string $nome Nome completo do usuário.
     * @param string $email Email do usuário.
     */
    public function __construct($id, $nome, $email) {
        $this->id = $id;
        $this->nome = $nome;
        $this->email = $email;
    }

    // Métodos 'getters' para acessar os dados do usuário
    public function getId() {
        return $this->id;
    }

    public function getNome() {
        return $this->nome;
    }

    public function getEmail() {
        return $this->email;
    }

    /**
     * Representação em string do objeto Usuario.
     * @return string Uma string representando o usuário.
     */
    public function __toString() {
        return "ID: {$this->id}, Nome: {$this->nome}, Email: {$this->email}";
    }
}
?>
