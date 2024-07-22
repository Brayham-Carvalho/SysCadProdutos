<?php
	//Iniciar  Sessão
	session_start();
	include_once 'protect.php';

	if (isset($_POST['btn-cadastrar'])):
		//Tranforma caracteres especiais em HTML
		$descricao=filter_input(INPUT_POST,'descricao',FILTER_SANITIZE_SPECIAL_CHARS);
		//Tranforma caracteres especiais em HTML
		$data=filter_input(INPUT_POST,'data',FILTER_SANITIZE_SPECIAL_CHARS);
		//Remove todos caracteres, exceto letras, números e !#$%&'*+-=?^_`{|}~@.[].
		$preco = filter_input(INPUT_POST,'preco',FILTER_SANITIZE_NUMBER_FLOAT, FILTER_FLAG_ALLOW_FRACTION);
		
		require_once 'banco.php';

		$sql = $mysqli->prepare("INSERT INTO produto(descricao, data, preco) VALUES ( ?, ?, ?);");
		$sql->bind_param("ssi", $descricao, $data, $preco);
		//echo $sql;
		if($sql->execute()):
			header('Location: consultar.php?sucesso');
		else:
			header('Location: consultar.php?erro');
		endif;
	endif;

?>