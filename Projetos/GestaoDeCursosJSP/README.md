# Sistema de Gestão de Cursos de Formação

Este projeto é um sistema de gestão de cursos de formação desenvolvido em Java Server Pages (JSP) com banco de dados MySQL. O sistema permite gerenciar cursos, inscrições, usuários e mais, oferecendo diferentes funcionalidades dependendo do tipo de usuário (administrador, docente, aluno, visitante).

## Funcionalidades

- **Visitante**
  - Consultar informações dos cursos.
  - Registrar-se como aluno.

- **Aluno**
  - Inscrever-se em cursos.
  - Gerenciar inscrições.
  - Consultar notas e feedback.

- **Docente**
  - Gerenciar cursos que ministra.
  - Inserir e gerenciar notas dos alunos.

- **Administrador**
  - Gerenciar registros dos cursos.
  - Gerenciar usuários (criar, editar, inativar).
  - Aprovar ou rejeitar inscrições dos cursos.

## Tecnologias Utilizadas

- **Frontend**: HTML, CSS, JavaScript
- **Backend**: Java Server Pages (JSP), JDBC
- **Database**: MySQL

## Pré-requisitos

Antes de iniciar, você precisará ter as seguintes ferramentas instaladas em sua máquina:
- [Git](https://git-scm.com)
- [Apache Tomcat](http://tomcat.apache.org/) (ou qualquer outro container web que suporte JSP)
- [MySQL](https://www.mysql.com/)
- [Java JDK](https://www.oracle.com/java/technologies/javase-jdk11-downloads.html)

Além disto, é bom ter um editor para trabalhar com o código como [VSCode](https://code.visualstudio.com/) ou [IntelliJ IDEA](https://www.jetbrains.com/idea/).

## Configuração do Ambiente

### Configurando o Banco de Dados

1. Inicie o MySQL e crie um banco de dados usando o script `criar_bd.sql` localizado na pasta `basedados`.
2. Certifique-se de configurar o usuário e senha conforme definido no seu ambiente de desenvolvimento.

### Deploy da Aplicação

1. Compile o projeto e faça o deploy do arquivo WAR gerado no seu container web/Tomcat.
2. Acesse o projeto pelo navegador utilizando a URL configurada no seu servidor.



## Licença

Este projeto está sob a licença MIT. Veja o arquivo [LICENSE](LICENSE.md) para mais detalhes.

---

Feito com ❤️ por Cesaltino Lopes
