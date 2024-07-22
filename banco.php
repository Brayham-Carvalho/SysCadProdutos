<?php
    $severName = "localhost";
    $userName = "root";
    $password = "";
    $db_name = "crud";
    
    // Crie uma instância da classe MySQLi para a conexão
    $mysqli = new mysqli($severName, $userName, $password, $db_name);
    
    // Verificar se a conexão foi bem-sucedida
    if ($mysqli->connect_error) {
        die("Erro de conexão com o banco de dados: " . $mysqli->connect_error);
    }
    function validaLogin($email, $senha) {
        global $mysqli;

        // Verifique se o email é válido
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            return false;
        }

        // Consulta para verificar o login
        $senhaCriptografada = md5($senha); // Criptografa a senha para comparar com o banco de dados
        $query = "SELECT * FROM usuario WHERE email = '$email' AND senha = '$senhaCriptografada'";

        $result = $mysqli->query($query);

        if ($result->num_rows == 1) {
            return true; // Login válido
        } else {
            return false; // Login inválido
        }
    }
?>
