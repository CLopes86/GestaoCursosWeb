<?php
/**
 * Classe Visitante.
 * Permite que visitantes consultem informações básicas sobre cursos e docentes.
 */
class Visitante {
    /**
     * Método para obter a lista de cursos disponíveis.
     * @return array Lista de cursos disponíveis para consulta.
     */
    public function consultarCursos() {
        // Lógica para buscar e retornar uma lista de cursos disponíveis
        return ["Curso de PHP", "Curso de JavaScript"];
    }

    /**
     * Método para obter informações sobre um curso específico.
     * @param int $cursoId ID do curso a ser consultado.
     * @return string Detalhes do curso.
     */
    public function verDetalhesDoCurso($cursoId) {
        // Lógica para buscar e retornar detalhes de um curso específico
        return "Detalhes do Curso ID: {$cursoId}";
    }

    /**
     * Método para consultar informações sobre docentes.
     * @return array Lista de docentes.
     */
    public function consultarDocentes() {
        // Lógica para buscar e retornar uma lista de docentes
        return ["Docente A", "Docente B"];
    }
}
?>
