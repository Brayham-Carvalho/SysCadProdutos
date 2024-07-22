<?php
	//Conexão
	require_once 'banco.php';

	if (isset($_GET['id'])) {
		$id = filter_input(INPUT_GET, 'id', FILTER_SANITIZE_NUMBER_INT);

		$sql = "DELETE FROM produto WHERE idProduto = ?";
		$resultado = $mysqli->prepare($sql);
		$resultado->bind_param("i", $id);

		if ($resultado->execute()) {
			header('Location: consultar.php?excluir=ok');
		} else {
			header('Location: consultar.php?excluir=erro');
		}
	}
?>