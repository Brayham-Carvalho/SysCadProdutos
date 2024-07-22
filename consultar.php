<?php 
// Conexão com o banco de dados
    include_once 'banco.php';

    // Header
    include_once 'header.php';

    include_once 'protect.php';

   
    $filtro = "";

    if (isset($_POST['btn-consultar'])) {
        $descricao = $_POST['txtdescricao'];
        if (!empty($descricao)) {
            $filtro = "%" . mysqli_real_escape_string($mysqli, $descricao) . "%";
        }
    }
    
    $sql = "SELECT * FROM produto";
    
    if (!empty($filtro)) {
        $sql .= " WHERE descricao LIKE ?";
    }
    
    $stmt = mysqli_prepare($mysqli, $sql);
    
    if (!empty($filtro)) {
        mysqli_stmt_bind_param($stmt, "s", $filtro);
    }
    
    mysqli_stmt_execute($stmt);
    
    $resultado = mysqli_stmt_get_result($stmt);
?>

    <div class="col-md-6 mx-auto my-2 mt-5">     
        <fieldset class="border p-2">
            <legend class="control-label">Consultar Produtos</legend>        
            <form action="consultar.php" method="POST">
                <div class="row mx-3 g-2">
                    <div class="col-7 mt-2">
                        <label for="nome" class="form-label">Descrição</label>
                        <input type="text" class="form-control mt-2" id="descricao" name="txtdescricao" placeholder="Digite a consulta" required>
                    </div>
                    <div class="col-5 mt-5">    
                        <button type="submit" name="btn-consultar" class="btn btn-success">Consultar</button>
                        <a href="adicionarproduto.php" class="btn btn-secondary">Cadastrar</a>
                    </div>
                </div>
            </form>    
        </fieldset>
    </div> 

    <div class="m-5 " id="tabela">
        <div class="fs-1 mb-5 ">
            <h1>Lista de Produtos</h1>
        </div>
        <div class="table-responsive col-8">
            <table class="table table-hover table-dark">
                <thead>
                    <tr>
                        <th scope="col">Código</th>
                        <th scope="col">Descrição</th>
                        <th scope="col">Data Inclusão</th>
                        <th scope="col">Preço</th>                   
                        <th scope="col"></th>
                    </tr>
                </thead>
                <tbody class="table-group-divider">
                    <?php
                    if (mysqli_num_rows($resultado) > 0):                            
                        while ($linha = mysqli_fetch_array($resultado)):
                    ?>                            
                        <tr>
                            <td> <?php echo $linha['idProduto']; ?> </td>
                            <td> <?php echo $linha['descricao']; ?> </td>
                            <td> <?php echo $linha['data']; ?> </td>
                            <td> R$ <?php echo $linha['preco']; ?>  </td>                            
                            <td>    
                                <a href='editar.php?id=<?php echo $linha['idProduto'];?>' class="btn btn-sm btn-warning"> 
                                    <i class="bi bi-pencil"></i>
                                </a>
                                
                                <a href='excluir.php?id=<?php echo $linha['idProduto'];?>' class="btn btn-sm btn-light"  data-bs-toggle='modal' data-bs-target="#exampleModal<?php echo $linha['idProduto'];?>"> 
                                    <i class="bi bi-trash-fill"></i>
                                </a>                              
                            </td>
                        </tr>

                        <!-- Modal -->
                        <div class='modal fade' id="exampleModal<?php echo $linha['idProduto'];?>" tabindex='-1' aria-labelledby='exampleModalLabel' aria-hidden='true'>
                            <div class='modal-dialog modal-dialog-centered'>
                                <div class='modal-content'>
                                    <div class='modal-header bg-danger text-white'>
                                        <h1 class='modal-title fs-5' id='exampleModalLabel'>ATENÇÃO!</h1>
                                        <button type='button' class='btn-close btn-close-white' data-bs-dismiss='modal' aria-label='Close'></button>
                                    </div>
                                    <div class='modal-body mb-3 mt-3'>
                                        Tem certeza que deseja <b>EXCLUIR</b> o usuário <?php echo $linha['descricao'];?>?
                                    </div>
                                    <div class='modal-footer'>
                                        <button type='button' class='btn btn-secondary' data-bs-dismiss='modal'>Voltar</button>
                                        <a href="excluir.php?id=<?php echo $linha['idProduto'];?>" type='button' class='btn btn-danger'>Sim, quero!</a>
                                    </div>
                                </div>
                            </div>
                        </div>  
                    <?php 
                    endwhile; 
                    else:
                    ?>
                    <tr>
                        <td>-</td>
                        <td>-</td>
                        <td>-</td>
                        <td>-</td>
                    </tr>
                    <?php
                    endif;
                    ?>                  
                </tbody> 
            </table>
        </div>
    </div>
    

<?php include_once 'footer.php';?>
