<?php
//Header
include_once 'header.php';
include_once 'protect.php';

//Select com o id que veio da URL
if(isset($_GET['id'])):
	
	//Conexão
	include_once 'banco.php';
	$id = filter_var($_GET['id'],FILTER_SANITIZE_STRING);
	
	$sql = "SELECT * FROM produto WHERE idProduto = ?";
    $stmt = $mysqli->prepare($sql);
    $stmt->bind_param("i", $id);
    $stmt->execute();

    $resultado = $stmt->get_result();
    $dados = $resultado->fetch_array();
endif;
 
 ?>

<div class="row">
<div class="container my-3">
	
		<form action="atualizar.php" method="POST">

		<div class="row mx-3 g-2">
			<h1 class="display-5 mx-3 ">Atualizar Produto</h1>
			<input type="hidden" name="idProduto" value="<?php echo $dados['idProduto']; ?>">

			<div class="input-field col-3 s1">
				<label for="descricao"> Descrição:</label>
				<input type="text" name="descricao" id="descricao" value="<?php echo $dados['descricao']; ?>">
				
			</div>
		
			<div class="input-field col-3 s1">
				<label for="data">Data de Inclusão:</label>
				<input type="text" class="col-4" name="data" id="data" value="<?php echo $dados['data']; ?>">
				
			</div>
			
			<div class="input-field col-3 s1">
				<label for="preco">Preço:</label>
				<input type="number" class="col-3" name="preco" id="preco" value="<?php echo $dados['preco']; ?>" >
				
			</div>
				
			<div class="row mx-3 my-3 g-2">
				<div class="col-3">
					<button type="submit" name="btn-atualizar"  class="btn btn-success">Atualizar</button>
					<a href="consultar.php" type="submit" class="btn btn-secondary">Lista de Produtos</a>
					
				</div>
			</div>
		</div>
		</form>
		
	</div>
</div>


<?php include_once 'footer.php';?>

     
 
