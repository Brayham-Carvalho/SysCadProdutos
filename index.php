
<?php
// Header
	include_once 'header.php';
	include 'banco.php';

	$mensagemerro = "";
	//Cria login e senha
	/*$resultado = $mysqli->prepare("INSERT INTO usuario (email, senha) VALUES (?, ?)");
	$email = 'exemplo@email.com';
	$senha = MD5('12345');

	if (!$resultado) {
		die("Erro na preparação da consulta: " . $mysqli->error);
	}

	$resultado->bind_param("ss", $email, $senha);

	if ($resultado->execute()) {
		//echo "Inserção bem-sucedida!";
	} else {
		$mensagemerro = "Erro na execução da consulta: " . $resultado->error;
	}*/
	
	if (isset($_POST['btlogin'])) {
		$email = $_POST['txtemail'];
		$senha = $_POST['txtsenha'];

		// Consulta para verificar o login
		$query = "SELECT * FROM usuario WHERE email = ? AND senha = ?";
		
		$stmt = $mysqli->prepare($query);
		$senhaCriptografada = md5($senha);
		$stmt->bind_param("ss", $email, $senhaCriptografada);
		$stmt->execute();

		$result = $stmt->get_result();

		if ($result->num_rows == 1) {

			
			if(!isset($_SESSION)) {
				session_start();
			} 
			$usuario = $result->fetch_assoc(); // Obtenha os dados do usuário

			$_SESSION['id'] = $usuario['idUsuario'];
			$_SESSION['email'] = $usuario['email'];
			// Login válido, redirecione para adicionarprodutos.php VERIFICAR QUAL PÁGINA
			header("Location: adicionarproduto.php");
			exit();

		} else {
			// Login inválido
			$mensagemerro = "Login inválido.";
		}
	}
?>
<link rel="stylesheet" href="css/login.css">
<div class="container">
	<div class="global-container"> 
		<div class="card login-form">
			<div class="card-body">
				<h3 class="card-title text-center">Autenticação do usuário</h3>
				<div class="card-text">
					
					<form action="index.php" method="post">
						<div class="error-message">
							<span class="badge bg-danger"><?php echo $mensagemerro; ?></span>
						</div>
						<div class="form-group">
							<label for="exampleInputEmail1">Email:</label>
							<input type="email" class="form-control form-control-sm" name="txtemail" >
						</div>
						<div class="form-group">
							<label for="exampleInputPassword1">Senha:</label>					
							<input type="password" class="form-control form-control-sm" name="txtsenha">
						</div>
						
						<button type="submit" class="btn btn-dark btn-block" name="btlogin">Login</button>
				
					</form>
				</div>
			</div>
		</div>
	</div> 
</div>

<?php include_once 'footer.php';?>

   