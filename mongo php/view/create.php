<?php session_start();
   if(isset($_POST['submit'])){
      require '../conection/config.php';
      $insertOneResult = $collection->insertOne([
          'fecha' => $_POST['fecha'],
          'titulo' => $_POST['titulo'],
          'descripcion' => $_POST['descripcion'],
          'respuesta' => $_POST['respuesta'],
          'archivo' => $_POST['archivo'],
      ]);
      $_SESSION['success'] = "Pregunta Publicada con exito";
      header("Location: ../index.php");
   }
?>
<?php require_once('../include/header.php');?>     
         <br>
         <CENTER><h2>Ingresa tu Pregunta</h2></CENTER>
         <hr class="colorgraph">
         <div class="container">
        <div class="row">
            <div class="col-xs col-sm-8 col-md-6 col-sm-offset-2 col-md-offset-3">
         <form method="POST">
            <div class="form-group">
            <input type="hidden" name="fecha"  value="<?php echo date("d-m-y");?>">
               <strong></strong>
               <h4> <b>Titulo</b> </h4>
               <h7>Sé específico e imagina que estás haciendo la pregunta a otra persona</h7>
               
               <input type="text" class="form-control input-lg" name="titulo" placeholder="titulo" autocomplete="off">
               <h4> <b> Cuerpo</b></h4>
                <h7>Incluye toda la información que alguien necesitaría para responder tu pregunta</h7>
                <textarea class="form-control input-lg" name="descripcion" placeholder="Descripcion" ></textarea>

                <input type="file" src="imagenes" name="archivo" value="image/*">

                <input type="hidden" class="form-control input-lg" name="respuesta" placeholder="titulo" value="">
               <br>
               <a href="index.php" class="btn btn-primary">Atras</a>
               <button type="submit" name="submit" class="btn btn-success">Publicar</button>
            </div>
         </form>
      </div>
      </div>
      </div>
      </div>
   </body>
</html>