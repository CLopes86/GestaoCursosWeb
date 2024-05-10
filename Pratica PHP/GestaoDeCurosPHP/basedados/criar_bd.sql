-- Cria um novo banco de dados chamado 'CursoDB' se ele ainda não existir
CREATE DATABASE IF NOT EXISTS CursoDB;


-- Seleciona o banco de dados 'CursoDB' para realizar operações nele
USE CursoDB;


-- Cria a tabela 'Perfis' com as definições de colunas para armazenar os tipos de usuário
CREATE TABLE IF NOT EXISTS Perfis(
    PerfilID INT AUTO_INCREMENT PRIMARY KEY,  -- Um ID único para cada perfil, que autoincrementa
    Descricao VARCHAR(100) NOT NULL --Descrição do perfil (ex: Administrador, Docente, Aluno)
)ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;


-- Cria a tabela 'Usuarios' com as definições de colunas para armazenar informações dos usuários
CREATE TABLE IF NOT EXISTS Usuarios (
    UsuarioID INT AUTO_INCREMENT PRIMARY KEY,
    Email VARCHAR(255) UNIQUE NOT NULL,
    Senha VARCHAR(255) NOT NULL, Senha do usuário, armazenada como texto por enquanto
    Nome VARCHAR(255) NOT NULL,
    Endereco TEXT,
    Telefone VARCHAR(15),
    DataCadastro DATE NOT NULL,
    PerfilID int NOT NULL, -- Chave estrangeira que liga cada usuário a um perfil
    FOREIGN KEY (PerfilID) REFERENCES Perfis(PerfilID) -- Define a relação entre Usuarios e Perfis
)ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;


-- Cria a tabela 'Cursos' com as definições de colunas para armazenar dados dos cursos oferecidos
CREATE TABLE IF NOT EXISTS Cursos(
    CursoID INT AUTO_INCREMENT PRIMARY KEY,
    NomeCurso VARCHAR(255) NOT NULL,
    Descricao TEXT,-- Descrição detalhada do curso
    CargaHoraria INT NOT NULL,
    Preco DECIMAL(10, 2) NOT NULL,
    DocenteID INT, -- Chave estrangeira que liga cada curso a um docente
    FOREIGN  KEY (DocenteID) REFERENCES Usuarios(UsuarioID) -- Define a relação entre Cursos e Usuarios (docentes)
)ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;


-- Cria a tabela 'Inscricoes' com as definições de colunas para armazenar as inscrições dos alunos nos cursos
CREATE TABLE IF NOT EXISTS Inscricoes(
    IncricaoID INT AUTO_INCREMENT PRIMARY KEY,
    CursoID INT NOT NULL, -- Chave estrangeira que liga a inscrição a um curso
    AlunoID INT NOT NULL,  -- Chave estrangeira que liga a inscrição a um aluno
    DataInscricao DATE NOT NULL,
    Status VARCHAR(50) NOT NULL,
    FOREIGN KEY (CursoID) REFERENCES Cursos(CursoID),-- Define a relação entre Inscricoes e Cursos
    FOREIGN KEY (AlunoID) REFERENCES Usuarios(UsuarioID) -- Define a relação entre Inscricoes e Usuarios (alunos)

)ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;


-- Insere os três perfis de usuário na tabela 'Perfis'
INSERT INTO Perfis(Descricao) VALUES ('Administrador'), ('Docente'), ('Aluno');


-- Insere três usuários de exemplo nas tabela 'Usuarios', cada um com um perfil específico
INSERT INTO Usuarios(Email, Senha, Nome, DataCadastro,PerfilID)
VALUES
('admin@admin.gmail.com', 'admin', 'Administrador', CURDATE(), (SELECT PerfilID FROM Perfis WHERE Descricao = 'Administrador')),
('docente@docente.gmailcom', 'docente', 'Docente', CURDATE(), (SELECT PerfilID FROM Perfis WHERE Descricao = 'Docente')),
('aluno@aluno.gmail.com', 'aluno', 'Aluno', CURDATE(), (SELECT PerfilID FROM Perfis WHERE Descricao = 'Aluno'));
