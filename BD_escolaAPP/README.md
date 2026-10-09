# APP Scholar

## Sobre o projeto
O APP Scholar é uma aplicação destinada ao gerenciamento acadêmico mobile. O sistema realiza o controle de rotinas escolares e administrativas da instituição, permitindo o cadastro e a consulta ágil de dados de alunos, professores, coordenadores, cursos, disciplinas, turmas, matrículas, avaliações e boletins, integrados ao banco de dados "escola" via API externa.

## Funcionalidades
- Cadastro de alunos, professores, coordenadores, cursos, disciplinas e turmas
- Registro de matrículas, telefones e endereços estruturados por localidades (estados, cidades, bairros e ruas)
- Lançamento de avaliações pedagógicas e boletins acadêmicos com controle de médias e frequências
- Consulta de registros em tempo real com consumo de dados de servidor externo (MySQL)
- Navegação estruturada entre telas de formulários, relatórios e menus de controle
- Filtros de busca dinâmica integrados nas listagens por nome, sala ou ID do aluno

## Tecnologias utilizadas
- React Native
- JavaScript
- Expo
- React Navigation
- Git
- GitHub

## Estrutura do projeto
escolaapp/
├── assets/
├── components/
├── escolaAPP/
│   ├── api/
│   ├── CadastroAluno.js
│   ├── CadastroAvaliacao.js
│   ├── CadastroBairro.js
│   ├── CadastroBoletim.js
│   ├── CadastroCidade.js
│   ├── CadastroCoordenador.js
│   ├── CadastroCurso.js
│   ├── CadastroDisciplina.js
│   ├── CadastroEstado.js
│   ├── CadastroMatricula.js
│   ├── CadastroProfessor.js
│   ├── CadastroResponsavel.js
│   ├── CadastroRua.js
│   ├── CadastroTelefone.js
│   ├── CadastroTurma.js
│   ├── ConsultarAlunos.js
│   ├── ConsultarAvaliacoes.js
│   ├── ConsultarBairros.js
│   ├── ConsultarBoletins.js
│   ├── ConsultarCidades.js
│   ├── ConsultarCoordenadores.js
│   ├── ConsultarCursos.js
│   ├── ConsultarDisciplinas.js
│   ├── ConsultarEstados.js
│   ├── ConsultarMatriculas.js
│   ├── ConsultarProfessores.js
│   ├── ConsultarResponsaveis.js
│   ├── ConsultarRuas.js
│   ├── ConsultarTelefones.js
│   ├── ConsultarTurmas.js
│   ├── Home.js
│   ├── Menu.js
│   ├── PY.js
│   ├── Sobre.js
│   └── theme.js
├── App.js
├── app.json
├── index.js
├── package.json
└── .gitignore

## Como executar
1. Clone o repositório.
2. Acesse a pasta do projeto.
3. Instale as dependências.
4. Execute a aplicação.

```bash
git clone https://github.com
cd escolaapp
npm install
npm start
```

Autor: Brayan Henrique Dos Santos Ramos
Curso: Desenvolvimento de Sistemas  
Unidade: São José dos Campos  
