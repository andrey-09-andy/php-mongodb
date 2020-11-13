<?php session_start();
   require '../conection/config.php';
   if (isset($_GET['id'])) {
      $mhs = $collection->findOne(['_id' => new MongoDB\BSON\ObjectID($_GET['id'])]);
   }
   if(isset($_POST['submit'])){
      $collection->updateOne(
          ['_id' => new MongoDB\BSON\ObjectID($_GET['id'])],
          ['$set' => ['titulo' => $_POST['titulo'], 'descripcion' => $_POST['descripcion'],]]
      );
      $_SESSION['success'] = "Pregunta actualizada con exito";
      header("Location: ../index.php");
   }
?>
<!DOCTYPE html>
<html>
   <head>
      <title>Actualizar Pregunta</title>
      <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
   </head>
   <body>

   <div class="well well-sm text-right">
    <a href="index.php" class="btn btn-info">Inicio</a>
    <a class="btn btn-info" href="create.php">Hacer una Pregunta</a>
	<a href="" class="btn btn-info">Salir del sistema</a>
    
</div>

      <div class="container">
        
         <CENTER><h1>Pregunta a actualizar</h1></CENTER>
         <hr class="colorgraph">
         <div class="container">
        <div class="row">
            <div class="col-xs col-sm-8 col-md-6 col-sm-offset-2 col-md-offset-3">
         <form method="POST">
            <div class="form-group">
               <strong>titulo:</strong>
               <input type="text" value="<?php echo "$mhs->titulo"; ?>" class="form-control input-lg" name="titulo" required="" placeholder="titulo">
               <strong>descripcion:</strong>
            
               <textarea  class="form-control input-lg " name="descripcion" placeholder="Descripcion" ><?php echo "$mhs->descripcion"; ?></textarea>

               <br>
               <button type="submit" name="submit" class="btn btn-success">Actualizar</button>
            </div>
         </form>
      </div>
   </body>
</html>