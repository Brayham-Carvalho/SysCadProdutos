<?php 

    if(!isset($_SESSION)) {
        session_start();
    }

    if(!isset($_SESSION['email'])) {
        echo '<div class="container mt-5 text-center">
            <div class="mx-auto">
                <p>Você precisa fazer login para acessar esta página.</p>
                <a href="index.php" class="btn btn-success mt-3">Entrar</a>
            </div>
          </div>';

        include_once 'footer.php';
        exit();
 
    }

   
?>
