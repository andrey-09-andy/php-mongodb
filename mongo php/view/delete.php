<?php session_start();
   require '../conection/config.php';
   if (isset($_GET['id'])) {
      $mhs = $collection->findOne(['_id' => new MongoDB\BSON\ObjectID($_GET['id'])]);
   }
   if(isset($_POST['submit'])){
         require '../conection/config.php';
   $collection->deleteOne(['_id' => new MongoDB\BSON\ObjectID($_GET['id'])]);
   $_SESSION['success'] = "Publicacion eliminada con exito";
   header("Location: ../index.php");
   }
?>
<?php require_once('../include/header.php');?>      
         <br>
         <CENTER><h1>Responder Pregunta</h1></CENTER>
         <hr class="colorgraph">
        <div class="container">
        <div class="row">
        <div class="col-xs col-sm-8 col-md-6 col-sm-offset-2 col-md-offset-3">
   
      
     <table class="table table-striped table-bordered">

<tbody>
  <tr>
    <th>Titulo</th>
  </tr>
  <tr>
     <td><?php echo "$mhs->titulo"; ?></td>
  </tr>
</tbody>

<tbody>
  <tr>
    <th >Descripcion</th>
  </tr>
  <tr>
    <td><?php echo "$mhs->descripcion";?></td>
  </tr>
</tbody>

<tbody>
  <tr>
    <th >Respuestas</th>
  </tr>
  <tr>
    <td><?php echo ($mhs->respuesta);?></td>
  </tr>
</table>
<form method="POST">
            <div class="form-group">
               <input type="hidden" value="<?php echo "$mhs->titulo"; ?>" class="form-control" name="titulo">
               <a href="../index.php" class="btn btn-primary">Atras</a>
               <button type="submit" name="submit" class="btn btn-danger">Eliminar</button>
            </div>
         </form>
		
      </div>
      </div>
      </div>
   </body>
</html>
