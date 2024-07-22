<?php
    include_once 'protect.php';
    if (isset($_POST['btn-atualizar'])) {
        $descricao = filter_var($_POST['descricao'], FILTER_SANITIZE_STRING);
        $data = filter_var($_POST['data'], FILTER_SANITIZE_STRING);
        $preco = filter_var($_POST['preco'], FILTER_SANITIZE_NUMBER_FLOAT, FILTER_FLAG_ALLOW_FRACTION);
        
        if (isset($_POST['idProduto'])) {
            $id = filter_var($_POST['idProduto'], FILTER_SANITIZE_NUMBER_INT);
            
            // Conexão com o banco de dados
            require_once 'banco.php';

            // Consulta SQL para atualizar o produto
            $sql = "UPDATE produto SET descricao = ?, data = ?, preco = ? WHERE idProduto = ?";
            $stmt = $mysqli->prepare($sql);
            $stmt->bind_param("ssdi", $descricao, $data, $preco, $id);
            if ($stmt->execute()) {
                header('Location: consultar.php?atualiza=ok');
            } else {
                header('Location: consultar.php?atualiza=erro');
            }
        }
    }
?>
