<?php
include './include/function.php';

$agregado = 0;

if(isset($_POST['btnGuardar'])){

   $agregado = AgregarComentario($_POST['txtIdLibro'],$_POST['txtTexto']);

   if($agregado){

    header('Location: libros_guardados.php');
    exit;
   }
}


// var_dump($_POST);
// $libros = obtenerLibrosGuardados();
// var_dump($libros);



?>
<!DOCTYPE html>
<html lang="en">
<?php include './include/meta.php'; ?>
<body>
    <header class='mb-4'>
  <!-- Fixed navbar -->
  <nav class="navbar navbar-expand-md navbar-dark  bg-dark">
    <div class="container-fluid">
      <a class="navbar-brand" href="#">Libros</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarCollapse">
        <ul class="navbar-nav me-auto mb-2 mb-md-0">
          <li class="nav-item">
            <a class="nav-link" aria-current="page" href="./index.php">Inicio</a>
          </li>
          <li class="nav-item">
            <a class="nav-link active" href="#">Libros Guardados</a>
          </li>
        </ul>
        <!-- <form class="d-flex" method="post">
          <input class="form-control me-2" type="txt" placeholder="Buscar Libro" name="txtLibro" aria-label="Search">
          <button class="btn btn-outline-success" name="btnBuscar" type="submit">Buscar</button>
        </form> -->
      </div>
    </div>
  </nav>
</header>

<!-- Begin page content -->
<!-- <main class="flex-shrink-0"> -->
  <div class="container">
  <?php if($agregado){ ?>    
  
  <div class="alert alert-success" role="alert">
  Comentario agregado Exitosamente! 
  </div>

<?php } ?>
      <div class="row mt-3 mb-3">
    <div class="col-12 text-center">
      <h4>Agregar Comentario</h4>
    </div>
  </div>
  <div class="row mt-3 mb-3">
    <h5><?php echo $_POST['txtTitle']; ?></h5>
    <form method="POST" id="editar" name="editar" action="#" >
      <div class="col-6 text-center">
          <textarea name="txtTexto" class="form-control"></textarea>
      </div>
      <input type="text" name="txtIdLibro" hidden value="<?php echo $_POST['txtIdLibro'];?>" class="form-control" />
      <button type="submit" name="btnGuardar" class="mt-1 btn btn-primary">
                          Guardar
      </button>
      <a href="./libros_guardados.php" class="mt-1 btn btn-info">Volver</a>
    </form>
  </div>
  
  </div>
<!-- </main> -->


    
</body>
</html>
<script language="javascript" src="./include/function.js"></script>