<?php session_start();
   require '../conection/config.php';
   if (isset($_GET['id'])) {
      $mhs = $collection->findOne(['_id' => new MongoDB\BSON\ObjectID($_GET['id'])]);
   }
   if(isset($_POST['submit'])){
      $collection->updateOne(
          ['_id' => new MongoDB\BSON\ObjectID($_GET['id'])],
          ['$set' => ['titulo' => $_POST['titulo'], 'descripcion' => $_POST['descripcion'],'respuesta'=>$_POST['respuesta'],]]
      );
      $_SESSION['success'] = "Pregunta Respondida con exito con exito";
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
    <td><?php echo "$mhs->descripcion";
    echo "<br>";
    echo "<img src='$mhs->archivo' border='1' width='400' height='300'>";
    
    ?></td>
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
 <?php echo "<a href ='respuesta.php?id=".$mhs->_id."' class='btn btn-primary'><dw-button>Aportar una respuesta</dw-button></a> ";?>
		
      </div>
      </div>
      </div>
   </body>
</html>