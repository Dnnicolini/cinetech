# Projeto CINETECH

Projeto com PHP puro para avaliação da faculdade, usando MVC POO PDO. Trata-se de um crud de filmes, com relacionamento com gêneros e autenticação.

## 📌 Pré-requisitos

Antes de rodar o projeto, certifique-se de ter instalado:

- [PHP 8.4](https://www.php.net/downloads.php)
- [Composer](https://getcomposer.org/)
- [MySQL](https://www.mysql.com/) ou outro banco de dados compatível
- [Docker](https://www.docker.com/) (opcional, para rodar via container)

---

## 🚀 Rodando o projeto sem Docker

### 1️⃣ Clonar o repositório
```sh
git clone (https://github.com/Dnnicolini/cinetech.git
cd cinetech
```

### 2️⃣ Instalar dependências
```sh
composer install
```

### 3️⃣ Configurar o banco de dados
- Crie um banco de dados no MySQL o arquivo sql está no repositório com o nome 'database.sql'
  
- Configure a conexão no arquivo `app/config/database.php`:
  ```php
    private static $host = ""; 
    private static $dbname = "filmes_db";
    private static $user = "user";
    private static $pass = "password";
    private static $conn;
  ```

### 4️⃣ Rodar o servidor embutido do PHP
```sh
php -S localhost:8000 -t public/
```
Acesse o projeto em: [http://localhost:8000](http://localhost:8000)

---

## 🐳 Rodando o projeto com Docker

### 1️⃣ Clonar o repositório
```sh
git clone (https://github.com/Dnnicolini/cinetech.git
cd cinetech
```

### 2️⃣ Subir os containers
```sh
docker-compose up -d
```
Isso irá iniciar os containers do PHP, MySQL e phpMyAdmin.

### 3️⃣ Configurar o banco de dados
No arquivo `app/config/database.php`, altere `DB_HOST` para `mysql`:
```php
    private static $host = ""; 
    private static $dbname = "filmes_db";
    private static $user = "user";
    private static $pass = "password";
    private static $conn;
```

### 4️⃣ Acessar o projeto
- Aplicação: [http://localhost:8080](http://localhost:8080)

### 5️⃣ Parar os containers
```sh
docker-compose down
```

---


Se precisar de mais alguma coisa, só avisar! 🚀
