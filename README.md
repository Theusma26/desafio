# Visão Geral

Este projeto é uma aplicação completa de gerenciamento de transações financeiras, que inclui funcionalidades para listar, adicionar, editar e excluir transações. A aplicação foi desenvolvida com uma arquitetura moderna e boas práticas de desenvolvimento.

## Tecnologias Utilizadas

 - **Frontend**: Angular 17 com Node.js 18 e Tailwind CSS para estilização.
 - **Backend**: Laravel 11 com PHP 8.2.
 - **Servidor Local**: XAMPP para configurar o Apache.
 - **Banco de Dados**: PostgreSQL.

## Estrutura do Projeto

### Frontend

O frontend da aplicação foi desenvolvido usando Angular 17. A estilização foi realizada com Tailwind CSS.

### Componentes

 - **TransactionListComponent**: Lista todas as transações com opções para editar e excluir.
 - **TransactionFormComponent**: Formulário para adicionar ou editar transações.

### Serviços

 - **TransactionService**: Gerencia a comunicação com a API, incluindo operações CRUD para transações e tipos de transações.

### Roteamento
 - **HomeComponent**: Página inicial com um botão para acessar o formulário de adição de novas transações.
 - **TransactionListComponent**: Rota para listar todas as transações.
 - **TransactionFormComponent**: Rota para adicionar ou editar transações, com base no ID fornecido.

### Utilização de Signals

Utiliza a abordagem de Signals para gerenciamento de estado no Angular, reduzindo a complexidade do código e melhorando a performance.

## Backend

O backend foi desenvolvido com Laravel 11, utilizando PHP 8.2. O Laravel é um framework robusto para construção de aplicações web, com suporte para Eloquent ORM, migrações, e controle de rotas.

### Estrutura de Repositórios e Serviços

 - **TransactionRepository**: Interface e implementação para acesso e manipulação de dados de transações.
 - **TransactionService**: Serviço para lógica de negócios relacionada a transações.

### Rotas da API

 - **GET /transactions**: Lista todas as transações.
 - **POST /transactions**: Adiciona uma nova transação.
 - **PUT /transactions/{id}**: Atualiza uma transação existente.
 - **DELETE /transactions/{id}**: Remove uma transação existente.
 - **GET /transaction-types**: Lista todos os tipos de transações.

## Banco de Dados

O banco de dados PostgreSQL é utilizado para armazenar as informações de transações e tipos de transações.

### Estrutura do Banco de Dados

 - **Tabela transactions**: Armazena as transações com campos como id, amount, type e transaction_type_id.
 - **Tabela transaction_types**: Armazena os tipos de transações com campos como id e name.

## Configuração do Ambiente

1. **Frontend:**
   - Instale as dependências: `npm install`
   - Inicie o servidor de desenvolvimento: `ng serve`

2. **Backend:**
   - Configure o ambiente: `.env`
   - Execute as migrações: `php artisan migrate`
   - Inicie o servidor: `php artisan serve`

3. **Banco de Dados:**
   - Certifique-se de que o PostgreSQL está em execução.
   - Configure o acesso ao banco de dados no arquivo `.env` do Laravel.

## Instruções de Uso

 - Adicionar Transação: Navegue até o formulário de adição e preencha os campos necessários.
 - Editar Transação: Utilize o botão de edição na lista de transações e faça as alterações necessárias.
 - Excluir Transação: Clique no botão de excluir na lista de transações para remover uma entrada.

## Licença

Este projeto está licenciado sob a [MIT License](LICENSE).
