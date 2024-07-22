# Sistema de Controle de Produtos

## Descrição
Este projeto é um sistema de controle de produtos desenvolvido para gerenciar produtos, suas inclusões, atualizações e exclusões. Utiliza tecnologias como HTML, PHP, MySQL, Bootstrap e JavaScript.

## Funcionalidades
- Autenticação de usuário
- Cadastro de novos produtos
- Atualização de produtos existentes
- Exclusão de produtos
- Consulta de produtos

## Tecnologias Utilizadas
- HTML
- PHP
- MySQL
- Bootstrap
- JavaScript

## Estrutura do Projeto
```plaintext
.
├── css/
│   └── styles.css
├── img/
│   └── logo.png
├── index.php
├── logout.php
├── header.php
├── footer.php
├── banco.php
├── adicionarproduto.php
├── consultar.php
├── editar.php
├── excluir.php
└── atualizar.php
```

## Configuração do Ambiente

### 1. Clonar o repositório:
```sh
git clone <url_do_repositorio>
```

### 2. Configurar o banco de dados MySQL:
```sql
CREATE DATABASE crud;
USE crud;

CREATE TABLE usuario (
    idUsuario INT AUTO_INCREMENT PRIMARY KEY,
    email VARCHAR(255) NOT NULL,
    senha VARCHAR(255) NOT NULL
);

CREATE TABLE produto (
    idProduto INT AUTO_INCREMENT PRIMARY KEY,
    descricao VARCHAR(255) NOT NULL,
    data DATE NOT NULL,
    preco DECIMAL(10, 2) NOT NULL
);

```

### 3. Configurar a conexão com o banco de dados no arquivo banco.php:
```php
<?php
$severName = "localhost";
$userName = "root";
$password = "";
$db_name = "crud";

$mysqli = new mysqli($severName, $userName, $password, $db_name);

if ($mysqli->connect_error) {
    die("Erro de conexão com o banco de dados: " . $mysqli->connect_error);
}
?>

```

## Uso
Acesse a página inicial (`index.php`) e faça login utilizando um email e senha cadastrados no banco de dados.
Após o login, você será redirecionado para a página de cadastro de produtos (`adicionarproduto.php`).
Utilize os formulários para adicionar, atualizar e excluir produtos.
Para consultar produtos, acesse a página de consulta (`consultar.php`).
## Licença
Todos os direitos reservados para Brayham.

© <?php echo date('Y'); ?> Todos os direitos reservados.
