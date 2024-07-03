SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";

-- Criação do banco de dados e uso do mesmo
CREATE DATABASE IF NOT EXISTS GestaDeCursoPHP;
USE GestaDeCursoPHP;

-- Cria a tabela 'Perfis' com as definições de colunas para armazenar os tipos de usuário
CREATE TABLE Perfis (
    PerfilID INT PRIMARY KEY,  
    Descricao VARCHAR(100) NOT NULL 
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- Inserir dados na tabela 'Perfis'
INSERT INTO Perfis (PerfilID, Descricao) VALUES
    (1, 'Administrador'),
    (2, 'Docente'),
    (3, 'Aluno'),
    (4, 'Visitante');

-- Cria a tabela 'Usuarios' com as definições de colunas para armazenar informações dos usuários
CREATE TABLE Usuarios (
    UsuarioID INT PRIMARY KEY AUTO_INCREMENT,
    Email VARCHAR(50) UNIQUE NOT NULL,
    Senha VARCHAR(50) NOT NULL, 
    Nome VARCHAR(55) NOT NULL,
    Endereco TEXT,
    Telefone VARCHAR(15),
    PerfilID INT NOT NULL, -- Chave estrangeira que liga cada usuário a um perfil
    Ativo BOOLEAN NOT NULL DEFAULT FALSE, -- Indica se o usuário está ativo
    FOREIGN KEY (PerfilID) REFERENCES Perfis(PerfilID) -- Define a relação entre Usuarios e Perfis
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- Inserir dados na tabela 'Usuarios'
INSERT INTO Usuarios (Email, Senha, Nome, PerfilID, Ativo) VALUES 
    ('admin@exemplo.com', MD5('admin'), 'admin', 1, TRUE),
    ('docente@exemplo.com', MD5('docente'), 'docente', 2, TRUE),
    ('aluno@exemplo.com', MD5('aluno'), 'aluno', 3, TRUE);

-- Cria a tabela 'Cursos' com as definições de colunas para armazenar dados dos cursos oferecidos
CREATE TABLE Cursos (
    CursoID INT PRIMARY KEY AUTO_INCREMENT,
    NomeCurso VARCHAR(30) NOT NULL,
    Descricao TEXT, -- Descrição detalhada do curso
    DocenteID INT, -- Chave estrangeira que liga cada curso a um docente
    FOREIGN KEY (DocenteID) REFERENCES Usuarios(UsuarioID) -- Define a relação entre Cursos e Usuarios (docentes)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- Inserir dados na tabela 'Cursos'
INSERT INTO Cursos (NomeCurso, Descricao, DocenteID) VALUES
    ('Curso de PHP', 'Curso introdutório de PHP', 2),
    ('Curso de MySQL', 'Curso avançado de MySQL', 2),
    ('Curso de HTML', 'Curso básico de HTML', 2);

-- Cria a tabela 'Inscricoes' com as definições de colunas para armazenar as inscrições dos alunos nos cursos
CREATE TABLE Inscricoes (
    InscricaoID INT PRIMARY KEY AUTO_INCREMENT,
    CursoID INT NOT NULL, -- Chave estrangeira que liga a inscrição a um curso
    AlunoID INT NOT NULL, -- Chave estrangeira que liga a inscrição a um aluno
    DataInscricao DATE NOT NULL,
    Status ENUM('pendente', 'aprovado', 'reprovado', 'cancelado') NOT NULL,
    FOREIGN KEY (CursoID) REFERENCES Cursos(CursoID), -- Define a relação entre Inscricoes e Cursos
    FOREIGN KEY (AlunoID) REFERENCES Usuarios(UsuarioID) -- Define a relação entre Inscricoes e Usuarios (alunos)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

COMMIT;
