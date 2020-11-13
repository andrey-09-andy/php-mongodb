<?php session_start();
   require 'config.php';
   if (isset($_GET['id'])) {
      $mhs = $collection->findOne(['_id' => new MongoDB\BSON\ObjectID($_GET['id'])]);
   }
   if(isset($_POST['submit'])){
      $collection->updateOne(
          ['_id' => new MongoDB\BSON\ObjectID($_GET['id'])],
          ['$set' => ['titulo' => $_POST['titulo'],
           'descripcion' => $_POST['descripcion'],
           'respuesta'=>$_POST['respuesta'],]]
      );
      $_SESSION['success'] = "Pregunta Respondida con exito con exito";
      header("Location: ver.php?id=$mhs->_id");
   }
?>
<?php require_once('include/header.php');?>     
      
         <br>
         <CENTER><h1>Responder Pregunta</h1></CENTER>
         <hr class="colorgraph">
         <div class="container">
        <div class="row">
            <div class="col-xs col-sm-8 col-md-6 col-sm-offset-2 col-md-offset-3">
      <table class="table">
				<thead class="thead-dark">
					<tr>
						<!--<th scope="col">id</th>-->
						<th scope="col">Titulo</th>
						<th scope="col">Descripcion</th>
						
					</tr>
				</thead>
				<?php
					
						echo "<tr>";
						//echo "<th scope='row'>".$mhs->id."</th>";
						echo "<td>".$mhs->titulo."</td>";
						echo "<td>".$mhs->descripcion."</td>";
						
					
				?>
			</table>
		</div>
      </div>


         <form method="POST">
            <div class="form-group">
               <input type="hidden" value="<?php echo "$mhs->titulo"; ?>" class="form-control" name="titulo">
               <input type="hidden" value="<?php echo "$mhs->descripcion"; ?>" class="form-control" name="descripcion">
               <h7>Incluye toda la información necesitaría para responder a esta pregunta</h7>
                <textarea class="form-control input-lg" name="respuesta" placeholder="respuesta" ></textarea>
                <br>
               <?php echo "<a href='ver.php?id=".$mhs->_id."' class='btn btn-primary'>Atras</a>"; ?>
               <button type="submit" name="submit" class="btn btn-success">Responder</button>
               
            </div>
         </form>
      </div>
      </div>
      </div>
      </div>
   </body>
</html>