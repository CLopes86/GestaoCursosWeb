<?php
require_once 'Usuario.php';

/**
 * Classe Administrador que estende Usuario.
 * Representa um administrador no sistema, capaz de realizar operações de gestão.
 */
class Administrador extends Usuario {
    /**
     * Construtor da classe Administrador.
     * @param int $id Identificador único do usuário.
     * @param string $nome Nome completo do usuário.
     * @param string $email Email do usuário.
     */
    public function __construct($id, $nome, $email) {
        parent::__construct($id, $nome, $email);
    }

    /**
     * Método para resetar a senha de um usuário.
     * @param Usuario $usuario O usuário cuja senha será resetada.
     */
    public function resetarSenhaUsuario($usuario) {
        // Lógica para resetar senha
        echo "Senha resetada para o usuário: " . $usuario->getNome();
    }

    /**
     * Representação em string do objeto Administrador.
     * @return string Uma string representando o administrador.
     */
    public function __toString() {
        return parent::__toString() . ", Função: Administrador";
    }
}
?>
