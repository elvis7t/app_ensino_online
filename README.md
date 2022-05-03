# app_ensino_online

Resposta do Teste prático https://github.com/leonardo-soustruznik-match/teste-pratico-dev-php-pleno

Cenário
Criação de uma plataforma para ensino online. Nesta plataforma, os usuários terão a possibilidade de cadastrar cursos e realizar a matrícula de alunos. Esta aplicação será construída em React, por isso é necessário um backend headless.

Requisitos
Um aluno pode ser matriculado em mais de um curso.
Não pode permitir matriculas em cursos em andamento ou encerrados.
Não pode permitir matricula de alunos inativos.
Não pode permitir cadastro de alunos menores de 16 anos.
É limitado a 10 alunos por curso.
Somente usuários administradores terão acesso ao sistema. Não é necessário prever acesso de alunos.
Cursos
Deve ser possível inserir, editar, deletar, visualizar e listar os cursos, sendo que por padrão devem ser listados primeiro os cursos em andamento ou que serão iniciados.

Atributos

Id
Título
Descrição
Data de início
Data de fim
Alunos
Deve ser possível inserir, editar, deletar, visualizar e listar os alunos.

Atributos

Id
Nome
E-mail
Data de nascimento
Status
Matrículas
Deve ser possível inserir, editar, deletar, visualizar e listar as mutrículas.

Atributos

Id
Id Curso
Id Aluno
Id Usuário
Data da matrícula
Usuários
Deve ser possível inserir, editar, deletar, visualizar e listar as usuários.

Atributos

Id
Nome
E-mail
Status

Instruções

Deve ser utilizado o MySQL como banco de dados.
Crie um README com orientações para a instalação e execução de comandos.
Disponibilizar dados iniciais
Usar um ambiente com Docker e disponibilizar um Dockerfile ou docker-compose.yml
Não é obrigatório, mas seria interessante se você:
Programar em inglês

## Para acessar a aplicação favor seguir os passos abaixo:

1 ° Clone o repositorio

git clone https://github.com/elvis7t/app_ensino_online.git  


2 ° Na pasta app_enssino_online, rodar o comando docker-compose up -d


3 ° Acesse o sistema pelo link http://localhost:85/view/login.php com usuario admin@ensino.online.com senha 102030

