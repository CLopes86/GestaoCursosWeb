// Importações necessárias para gerenciamento de conexões SQL, execução de consultas e tratamento de exceções.
import java.sql.Connection;
import java.sql.DriverManager;
import java.sql.SQLException;
import java.sql.Statement;
import java.sql.ResultSet;

// Classe pública DatabaseManager que será utilizada por outras partes do código para interagir com o banco de dados.
public class DatabaseManager {
    // Constantes de configuração para a conexão com o banco de dados.
    private static final String DATABASE_URL = "jdbc:mysql://localhost:3306/CursoDB"; // URL de conexão inclui o endereço do servidor (localhost), a porta padrão de MySQL (3306) e o nome do banco de dados.
    private static final String DATABASE_USER = "root"; // Usuário padrão do XAMPP para MySQL.
    private static final String DATABASE_PASSWORD = ""; // Senha padrão do XAMPP para MySQL é vazia.

    /**
     * Método para abrir uma conexão com o banco de dados.
     * @return Connection Retorna um objeto de conexão se a conexão for bem-sucedida, caso contrário retorna null.
     */
    public static Connection abrirConexao() {
        try {
            // Carrega o driver JDBC do MySQL. Essencial para que a JVM possa gerenciar o banco de dados MySQL.
            Class.forName("com.mysql.cj.jdbc.Driver");
            // Retorna a conexão usando a URL, usuário e senha definidos anteriormente.
            return DriverManager.getConnection(DATABASE_URL, DATABASE_USER, DATABASE_PASSWORD);
        } catch (ClassNotFoundException | SQLException e) {
            // Imprime a pilha de exceção em caso de falha na conexão ou se o driver não for encontrado.
            e.printStackTrace();
            return null;
        }
    }

    /**
     * Método para fechar uma conexão com o banco de dados.
     * @param conn Objeto de conexão a ser fechado.
     */
    public static void fecharConexao(Connection conn) {
        if (conn != null) {
            try {
                // Fecha a conexão se ela ainda estiver aberta.
                conn.close();
            } catch (SQLException e) {
                // Imprime a pilha de exceção em caso de falha ao fechar a conexão.
                e.printStackTrace();
            }
        }
    }

    /**
     * Método para executar uma consulta SQL de seleção (SELECT).
     * @param query String Consulta SQL a ser executada.
     * @return ResultSet contendo os dados resultantes da consulta.
     */
    public static ResultSet executarConsulta(String query) {
        Connection conn = abrirConexao(); // Abre a conexão com o banco.
        try {
            Statement stmt = conn.createStatement(); // Cria um objeto Statement para enviar a consulta SQL.
            return stmt.executeQuery(query); // Executa a consulta e retorna o resultado.
        } catch (SQLException e) {
            // Imprime a pilha de exceção em caso de falha na consulta.
            e.printStackTrace();
            fecharConexao(conn); // Fecha a conexão antes de sair.
            return null;
        }
    }

    /**
     * Executa uma instrução SQL de atualização (INSERT, UPDATE, DELETE).
     * @param update String Instrução SQL a ser executada.
     */
    public static void executarUpdate(String update) {
        Connection conn = abrirConexao(); // Abre a conexão com o banco.
        try {
            Statement stmt = conn.createStatement(); // Cria um objeto Statement para enviar a instrução SQL.
            stmt.executeUpdate(update); // Executa a instrução SQL.
        } catch (SQLException e) {
            // Imprime a pilha de exceção em caso de falha ao executar a instrução.
            e.printStackTrace();
        } finally {
            fecharConexao(conn); // Garante que a conexão seja fechada após a execução da instrução.
        }
    }
}
