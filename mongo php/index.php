<?php session_start(); ?>
<!DOCTYPE html>
<html>
	<head>
		<title>Foro que no Funciona</title>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
	</head>
	<body>

    <div class="well well-sm text-right">
    <a href="index.php" class="btn btn-info">Inicio</a>
    <a class="btn btn-info" href="view/create.php">Hacer una Pregunta</a>
	<a class="btn btn-info" href="view/modificar.php">Modificar una Pregunta</a>
	<a href="" class="btn btn-info">Salir del sistema</a>
    
</div>
		<div class="container">
			<br>
			<CENTER><h1>Preguntas Principales</h1></CENTER>
			
			<?php
                if (isset($_SESSION['success'])) {
                    echo "<div type='button' class='alert alert-success alert-dismissible' class='close'>
                    <a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
                    ".$_SESSION['success']."</div>";
                }
            ?>

 <div >

 <table class="table center">
				
				<?php
					require 'conection/config.php';
					$lista = $collection->find();
					foreach ($lista as $mhs) {
                        echo "<tr>";
                        
						echo "
                        <section class='Faq-answers'>
                        <article class='Faq-answers-item'>
                    
                    <div class='Faq-answers-item-answer Cms-content'>
                        <div class='Markdown-content'>
                        <a href='view/ver.php?id=$mhs->_id'>".$mhs->titulo."</a>
                        </div>
                               
                    </article>  
                      <div class='center'>
                        $mhs->fecha
                        
                      </div>
                      <hr class='colorgraph'>
                      </div>
                    </section>
                    ";
                       
						echo "</td>";
						echo "</tr>";
					}
				?>
			</table>

	</body>
</html>