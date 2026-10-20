# S.A.S.P.I. - Site de Apresentação (Laravel Breeze)

**Sistema de Acompanhamento de Saúde para Pessoas Idosas**

Site desenvolvido para a atividade **PW3 - Laravel Breeze - CRUD - 1ª Parte**, com o objetivo de apresentar e documentar o projeto de TCC S.A.S.P.I.

> **Importante:** este repositório contém **apenas o site de apresentação** em Laravel. O sistema S.A.S.P.I. definitivo do TCC **não** é desenvolvido em Laravel e segue a arquitetura descrita abaixo.

- **Curso:** Desenvolvimento de Sistemas
- **Instituição:** ETEC Zona Leste
- **Disciplina:** Programação Web 3 (PW3)

## 👥 Equipe e Atribuições

- **Mariana de Oliveira:** Frontend e Telas de Entrada (desenvolvimento da Landing Page `welcome.blade.php` com Blade e Tailwind CSS, e personalização das views de autenticação do Breeze).
- **Miguel Heleno:** Backend e Banco de Dados (criação das migrations relacionais, configuração dos models Eloquent N:N e consultas no `routes/web.php`).
- **Wallex André:** Frontend Dinâmico e Seeders (estruturação do `dashboard.blade.php` com cards de métricas, galeria de telas com filtros dinâmicos e desenvolvimento dos seeders do banco de dados).

## 🔗 Links do Projeto

- **Protótipo no Figma:** https://www.figma.com/design/DMdGsg6Uxo2QfpiXqsxsQK/TCC--S.A.S.P.I?node-id=15-2&t=QWJdVpuopKEl1HpA-1
- **Vídeo de Demonstração no YouTube:** [Cole aqui o link do vídeo após subir]


## Sobre o S.A.S.P.I.

O S.A.S.P.I. é um sistema desenvolvido para auxiliar no monitoramento e no acompanhamento preventivo da saúde de pessoas idosas. A plataforma integra uma aplicação web e um aplicativo móvel, permitindo o cadastro e a consulta de informações clínicas, medicamentos, consultas e indicadores de saúde.

O sistema também prevê a coleta automática de dados por meio da Xiaomi Mi Band, utilizando o aplicativo Mi Fitness ou Zepp Life e o Health Connect para a sincronização das informações. Além disso, permite a inserção manual de dados por cuidadores e profissionais de saúde, oferecendo visualização da evolução dos pacientes, notificações e alertas.

Dessa forma, o S.A.S.P.I. busca centralizar informações, facilitar o acompanhamento dos idosos e contribuir para cuidados de saúde mais organizados, acessíveis e preventivos.

## Objetivos

- Centralizar as informações de saúde de pessoas idosas.
- Facilitar o acompanhamento preventivo por cuidadores, familiares e profissionais de saúde.
- Permitir a coleta automática (Xiaomi Mi Band) e manual de dados.
- Oferecer visualização da evolução dos pacientes, notificações e alertas.

## Funcionalidades concluidas

Todas as funcionalidades abaixo estão **Concluidas** no projeto. Este repositório não as implementa.

- Informações clínicas
- Medicamentos
- Consultas
- Indicadores de saúde
- Coleta automática de dados
- Inserção manual de dados
- Evolução do paciente
- Notificações e alertas
- Histórico de saúde
- Gestão de usuários e vínculos
- Gestão institucional da clínica

## Arquitetura planejada do S.A.S.P.I. (TCC)

| Camada | Tecnologias |
|---|---|
| Backend | Node.js, NestJS, TypeScript e Prisma |
| Banco de dados | PostgreSQL via Supabase |
| Aplicativo móvel | React Native e Expo |
| Aplicação web | Next.js e Recharts |
| Tempo real | Socket.IO e Redis (Upstash) |
| Autenticação | JWT |
| Implantação | Vercel, Railway e Supabase |
| Integração de dados | Xiaomi Mi Band, Mi Fitness ou Zepp Life e Health Connect |

## Tecnologias deste site (atividade PW3)

PHP, Laravel 12, Laravel Breeze (Blade com Alpine), Tailwind CSS, Eloquent ORM, migrations, Seeders, MySQL (XAMPP), Git e GitHub.

## O que o site apresenta

- **Página inicial** (`welcome.blade.php`): apresentação do S.A.S.P.I., funcionalidades e tecnologias, lidas do banco de dados.
- **Dashboard** (`dashboard.blade.php`, exige login): demonstração técnica do banco, galeria com 18 protótipos de telas (com filtro por funcionalidade), arquitetura planejada e fluxo planejado de coleta de dados.
- **Autenticação** do Laravel Breeze: login, registro, recuperação de senha e perfil.

Esta primeira parte **não possui CRUD**: as telas apenas leem os dados do banco.

## Banco de dados

| Tabela | Finalidade |
|---|---|
| `users` | Autenticação (Laravel Breeze) |
| `technologies` | Tecnologias da arquitetura planejada |
| `features` | Funcionalidades previstas |
| `prototype_screens` | Telas dos protótipos |
| `feature_prototype_screen` | Relação muitos-para-muitos entre telas e funcionalidades |

Os Seeders inserem 17 tecnologias, 11 funcionalidades, 18 telas, 26 ligações entre telas e funcionalidades e 1 usuário de demonstração.

## Como executar o site

**Pré-requisitos:** PHP 8.2 ou superior, Composer, Node.js 20 ou superior, e MySQL (XAMPP).

1. Clone o repositório e entre na pasta:
```
   git clone [URL do repositório]
   cd [nome da pasta]
```
2. Instale as dependências:
```
   composer install
   npm install
```
3. Crie o arquivo de ambiente e a chave:
```
   copy .env.example .env
   php artisan key:generate
```
4. Inicie o **MySQL** no XAMPP e crie, no phpMyAdmin, o banco `sasp_site` (collation `utf8mb4_unicode_ci`).
5. Ajuste `DB_USERNAME` e `DB_PASSWORD` no `.env`, se o seu MySQL for diferente do padrão.
6. Crie as tabelas e insira os dados:
```
   php artisan migrate --seed
```
7. Em dois terminais separados:
```
   php artisan serve
   npm run dev
```
8. Acesse `http://127.0.0.1:8000`.

### Usuário de demonstração

- E-mail: `demo@sasp.test`
- Senha: `password`

Usuário criado apenas para esta atividade. Não deve ser usado em sistemas reais.


Os prints das 18 telas estão em `public/images/prototipos/` e são exibidos no dashboard.


## Licença

Projeto acadêmico.