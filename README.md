<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo"></a></p>

<p align="center">
<a href="https://github.com/laravel/framework/actions"><img src="https://github.com/laravel/framework/workflows/tests/badge.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/dt/laravel/framework" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/l/laravel/framework" alt="License"></a>
</p>

<h1>Gerenciamento de Eventos
</h1>

<p>
Este é um projeto de gerenciamento de eventos desenvolvido em Laravel. A aplicação permite autenticação de usuários e oferece funcionalidades para criar, editar, excluir e confirmar presença em eventos.
</p>


<h1>Funcionalidades Principais</h1>
<li><b>Autenticação de Usuários:</b>Usuários podem se registrar, fazer login e acessar o sistema. Apenas usuários autenticados podem gerenciar eventos.</li>
<li><b>Cadastro de Eventos:</b>Permite adicionar novos eventos com informações como título, descrição, local, data e hora.</li>
<li><b>Edição de Eventos:</b>Possibilidade de atualizar os detalhes de eventos já cadastrados.</li>
<li><b>Exclusão de Eventos:</b>Remoção de eventos cadastrados do sistema.</li>
<li><b>Confirmação de Presença:</b>Os usuários podem confirmar presença nos eventos, permitindo maior controle dos participantes.</li>
<br>

<h1>Tecnologias Utilizadas</h1>
<li><strong>Laravel: </strong> Framework PHP utilizado para construir o backend e a API RESTful.</li>
<li><strong>PHP</strong> >= 8.0.</li>
<li><strong>Bootstrap: </strong>Framework CSS para design responsivo.</li>
<li><strong>Blade: </strong>Motor de templates do Laravel.</li>

<h1>Instruções de Instalação e Execução</h1>
<li><strong>PHP: </strong> >= 8.0</li>
<li><strong>Composer:</strong> Para gerenciar as dependências do Laravel</li>
<li><strong>Node.js e npm:</strong> Para o frontend React</li>
<li><strong>Banco de Dados: </strong> Configurado e acessível MySQL</li>



1. **Clone o repositório:**
   ```bash
     git clone https://github.com/seu-usuario/gerenciamento-eventos.git
    cd gerenciamento-eventos

2. **Instale as Dependências:**
   ```bash
     composer install


3. **Configure o Arquivo .env**
   ```bash
   cp .env.example .env

    DB_CONNECTION=mysql
    DB_HOST=127.0.0.1
    DB_PORT=3306
    DB_DATABASE=gerenciamento_eventos
    DB_USERNAME=root
    DB_PASSWORD=
 

4. **Gere a Chave da Aplicação:**
   ```bash
   php artisan key:generate

5. **Crie o Banco de Dados**
   ```bash
    npm install
    npm run dev

6. **Rode as Migrações**<br>
    ```bash    
    php artisan migrate


7. **Instale as Dependências do Frontend:**<br>
    ```bash    
   npm install
    npm run dev

    
8. **Inicie o Servidor**
   ```bash
    php artisan serve

