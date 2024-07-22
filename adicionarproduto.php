<?php 
	include_once 'header.php';
	include_once 'protect.php';
?>

	<div class="row">
		<div class="container my-3">               
		<!--(2) Exemplo de formulario-->
			<h1 class="display-3 mx-3 ">Novo Produto</h1>
			<form action="incluir.php" method="POST">
				<div class="row mx-3 g-2">
					<div class="col-3">
						<!--(3) adicionar o atributo required ao campo text-->
						<label for="descricao" class="form-label">Descrição</label>
						<input type="text" class="form-control" id="descricao" name="descricao" required>
					</div>
					<div class="col-2">
						<label for="data" class="form-label">Data Inclusão</label>
						<input type="text" class="form-control" id="data" name="data">
					</div>
				
					<div class="col-4">
						<div class="col-3">
							<label for="preco" class="form-label">Preço</label>
							<input type="number" class="form-control" id="preco" name="preco" min="10" max="120">
						</div>
					</div>
					
				</div>
				<div class="row mx-3 my-3 g-2">
					<div class="col-4">
						<button type="submit" name="btn-cadastrar" class="btn btn-success"> Cadastrar</button>
						<a href="consultar.php" type="submit" name="btn-cadastrar" class="btn btn-secondary"> Lista de produtos</a>
					</div>
				</div>
			</form>
		</div>		    
	</div>


<?php include_once 'footer.php';?>
